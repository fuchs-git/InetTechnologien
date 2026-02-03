<?php
// quiz_core.php
// Erwartet: $level (beginner|medium|expert) und $questionsFile (z.B. beginner.txt)

if (!isset($level, $questionsFile)) {
    http_response_code(500);
    exit("quiz_core.php requires \$level and \$questionsFile");
}

$lines = file($questionsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Fragen parsen: nr;type;frage;opt1;opt2;opt3;opt4;correct
$questions = [];
foreach ($lines as $line) {
    $parts = explode(";", $line, 8);
    if (count($parts) < 8) continue;

    [$nr, $type, $frage, $opt1, $opt2, $opt3, $opt4, $correct] = $parts;

    $nr = (int)trim($nr);
    $questions[$nr] = [
        'nr' => $nr,
        'type' => trim($type), // rb / cb
        'frage' => trim($frage),
        'options' => [trim($opt1), trim($opt2), trim($opt3), trim($opt4)],
        'correct_raw' => trim($correct), // rb: "1" (1-basiert), cb: "1,2"
    ];
}

ksort($questions);
$nrList = array_keys($questions);
$total = count($nrList);

if ($total === 0) {
    exit("No questions found in " . htmlspecialchars($questionsFile));
}

// Nutzer-ID (stabil, wenn Login vorhanden)
$userId = $_SESSION['name'] ?? null;
if ($userId === null) {
    // Fallback: pro Browser-Session (nicht dauerhaft pro Person)
    $userId = 'guest_' . session_id();
}

// level-spezifische Session-Keys
$kOrder = "order_$level";
$kIdx   = "idx_$level";
$kScore = "score_$level";
$kSaved = "saved_$level";

// NEU: option-order pro Frage speichern (damit Reload nicht neu mischt)
$kOptOrder = "optorder_$level"; // array: [nr => [ids...]]


if (isset($_GET['reset'])) {
    unset($_SESSION[$kOrder], $_SESSION[$kIdx], $_SESSION[$kScore], $_SESSION[$kSaved], $_SESSION[$kOptOrder]);
    header("Location: " . basename($_SERVER['PHP_SELF']));
    exit;
}

if (!isset($_SESSION[$kOrder])) {
    $order = $nrList;
    shuffle($order);               // zufällige Frage-Reihenfolge pro Start
    $_SESSION[$kOrder] = $order;
    $_SESSION[$kIdx]   = 0;
    $_SESSION[$kScore] = 0;
    $_SESSION[$kSaved] = false;
    $_SESSION[$kOptOrder] = [];
}

function parseCorrect(string $raw): array {
    $raw = trim($raw);
    if ($raw === '') return [];
    $parts = array_map('trim', explode(',', $raw));
    $nums = [];
    foreach ($parts as $p) {
        if ($p === '') continue;
        $nums[] = (int)$p; // 1..4
    }
    sort($nums);
    return $nums;
}

// Speichern: pro Nutzer+Level nur einmal
function saveScoreOnce(string $scoreFile, string $userId, string $level, int $score, int $total): bool {
    $userId = str_replace(["\n", "\r", ";"], ["", "", "_"], $userId);
    $level  = str_replace(["\n", "\r", ";"], ["", "", "_"], $level);

    if (file_exists($scoreFile)) {
        $existing = file($scoreFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($existing as $line) {
            $p = explode(";", $line);
            if (count($p) < 5) continue;
            $u = $p[1] ?? '';
            $l = $p[2] ?? '';
            if ($u === $userId && $l === $level) {
                return false; // schon vorhanden
            }
        }
    }

    $timestamp = date('Y-m-d H:i:s');
    $entry = $timestamp . ";" . $userId . ";" . $level . ";" . $score . ";" . $total . PHP_EOL;
    file_put_contents($scoreFile, $entry, FILE_APPEND | LOCK_EX);
    return true;
}

// POST: auswerten
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postedNr = (int)($_POST['nr'] ?? 0);

    if (isset($questions[$postedNr])) {
        $q = $questions[$postedNr];
        $correct = parseCorrect($q['correct_raw']);

        if ($q['type'] === 'rb') {
            $ans = (int)($_POST['answer'] ?? 0); // 1..4
            if ($ans !== 0 && $ans === ($correct[0] ?? -999)) {
                $_SESSION[$kScore]++;
            }
        } elseif ($q['type'] === 'cb') {
            $ansArr = $_POST['answer'] ?? [];
            if (!is_array($ansArr)) $ansArr = [];
            $ansNums = array_map('intval', $ansArr);
            sort($ansNums);

            if ($ansNums === $correct) {
                $_SESSION[$kScore]++;
            }
        }
    }

    $_SESSION[$kIdx]++;

    header("Location: " . basename($_SERVER['PHP_SELF']));
    exit;
}

// Status holen
$idx = (int)$_SESSION[$kIdx];
$order = $_SESSION[$kOrder];

// Fertig?
if ($idx >= $total) {
    $score = (int)$_SESSION[$kScore];

    if (!$_SESSION[$kSaved]) {
        saveScoreOnce("score.txt", $userId, $level, $score, $total);
        $_SESSION[$kSaved] = true;
    }
    ?>
    <div class="frage">
        <h1>Ergebnis (<?= htmlspecialchars($level) ?>)</h1>
        <p>Du hast <strong><?= $score ?></strong> von <strong><?= $total ?></strong> richtig.</p>
        <a href="?reset=1">Nochmal starten</a>
    </div>
    <?php
    return;
}

// Aktuelle Frage
$currentNr = (int)$order[$idx];
$q = $questions[$currentNr];

// Optionen als ID=>Text (IDs bleiben 1..4 passend zu correct)
$optMap = [
    1 => $q['options'][0],
    2 => $q['options'][1],
    3 => $q['options'][2],
    4 => $q['options'][3],
];

// Option-Reihenfolge pro Frage einmalig mischen und in Session speichern
if (!isset($_SESSION[$kOptOrder][$currentNr])) {
    $ids = array_keys($optMap);
    shuffle($ids);
    $_SESSION[$kOptOrder][$currentNr] = $ids;
}
$ids = $_SESSION[$kOptOrder][$currentNr];

// gemischte Optionen in stabiler Reihenfolge (pro Frage)
$shuffledOptions = [];
foreach ($ids as $id) {
    $shuffledOptions[$id] = $optMap[$id];
}

$buttonText = ($idx < $total - 1) ? "Weiter" : "Quiz abgeben";
?>
<div class="frage">
    <h1><?= htmlspecialchars($q['frage']) ?></h1>

    <form method="post">
        <input type="hidden" name="nr" value="<?= (int)$currentNr ?>">

        <?php if ($q['type'] === 'rb'): ?>
            <?php foreach ($shuffledOptions as $id => $text): ?>
                <label>
                    <input type="radio" name="answer" value="<?= (int)$id ?>" required>
                    <?= htmlspecialchars($text) ?>
                </label><br>
            <?php endforeach; ?>

        <?php elseif ($q['type'] === 'cb'): ?>
            <?php foreach ($shuffledOptions as $id => $text): ?>
                <label>
                    <input type="checkbox" name="answer[]" value="<?= (int)$id ?>">
                    <?= htmlspecialchars($text) ?>
                </label><br>
            <?php endforeach; ?>
            <p><small>Mehrfachauswahl möglich.</small></p>
        <?php endif; ?>

        <br><input type="submit" value="<?= htmlspecialchars($buttonText) ?>">
        <p><br>Frage <?= $idx + 1 ?> von <?= $total ?></p>
    </form>

</div>

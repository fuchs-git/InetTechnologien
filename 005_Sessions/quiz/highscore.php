<?php
include("nav.php");

$allowed = ['beginner', 'medium', 'expert'];

$level = $_GET['level'] ?? 'beginner';
$level = strtolower(trim($level));
if (!in_array($level, $allowed, true)) $level = 'beginner';

$scoreFile = "score.txt";
$entries = [];

if (file_exists($scoreFile)) {
    $lines = file($scoreFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $p = explode(";", $line);
        if (count($p) < 5) continue;

        [$ts, $user, $lvl, $score, $total] = $p;

        $lvl = strtolower(trim($lvl));
        if ($lvl !== $level) continue;

        $entries[] = [
            'ts' => trim($ts),
            'user' => trim($user),
            'score' => (int)trim($score),
            'total' => (int)trim($total),
        ];
    }
}

usort($entries, function($a, $b) {
    if ($a['score'] !== $b['score']) return $b['score'] <=> $a['score'];
    return strcmp($b['ts'], $a['ts']); // neu -> alt
});

$entries = array_slice($entries, 0, 10);

function tabClass(string $cur, string $tab): string {
    return $cur === $tab ? "hs-tab active" : "hs-tab";
}
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Highscore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="hs-wrap">
    <div class="hs-card">
        <div class="hs-head">
            <h1 class="hs-title">Highscore</h1>
            <div class="hs-subtitle"><?= htmlspecialchars(ucfirst($level)) ?></div>
        </div>

        <div class="hs-tabs">
            <a class="<?= tabClass($level, 'beginner') ?>" href="highscore.php?level=beginner">Beginner</a>
            <a class="<?= tabClass($level, 'medium') ?>" href="highscore.php?level=medium">Medium</a>
            <a class="<?= tabClass($level, 'expert') ?>" href="highscore.php?level=expert">Expert</a>
        </div>

        <?php if (empty($entries)): ?>
            <div class="hs-empty">
                Noch keine Scores für dieses Level.
            </div>
        <?php else: ?>
            <div class="hs-table-wrap">
                <table class="hs-table">
                    <thead>
                    <tr>
                        <th class="col-rank">#</th>
                        <th>Nutzer</th>
                        <th class="col-score">Score</th>
                        <th class="col-date">Datum</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($entries as $i => $e): ?>
                        <tr>
                            <td class="col-rank">
                                <span class="hs-rank"><?= $i + 1 ?></span>
                            </td>
                            <td class="hs-user"><?= htmlspecialchars($e['user']) ?></td>
                            <td class="col-score">
                                <span class="hs-score"><?= (int)$e['score'] ?></span>
                                <span class="hs-total">/ <?= (int)$e['total'] ?></span>
                            </td>
                            <td class="col-date"><?= htmlspecialchars($e['ts']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <div class="hs-foot">
            <a class="hs-btn" href="index.php">Zurück</a>
        </div>
    </div>
</div>

</body>
</html>

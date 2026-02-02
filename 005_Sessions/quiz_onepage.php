<?php
session_name('quiz');
session_start();

$questions = [
    0 => [
        'question' => 'Welches Tier ist ein Säugetier?',
        'answers'  => ['Hai', 'Delfin', 'Forelle', 'Goldfisch'],
        'correct'  => 1
    ],
    1 => [
        'question' => 'Welches Tier kann fliegen?',
        'answers'  => ['Pinguin', 'Strauß', 'Adler', 'Känguru'],
        'correct'  => 2
    ],
    2 => [
        'question' => 'Welches Tier ist ein Insekt?',
        'answers'  => ['Spinne', 'Biene', 'Krabbe', 'Schlange'],
        'correct'  => 1
    ],
    3 => [
        'question' => 'Welches Tier lebt überwiegend im Wasser?',
        'answers'  => ['Katze', 'Hund', 'Delfin', 'Pferd'],
        'correct'  => 2
    ],
    4 => [
        'question' => 'Welches Tier legt Eier?',
        'answers'  => ['Kuh', 'Schaf', 'Huhn', 'Ziege'],
        'correct'  => 2
    ],
];

$totalQuestions = count($questions);

if (isset($_POST['restart'])) {
    session_destroy();
    header('Location: quiz.php');
    exit;
}

if (!isset($_SESSION['current_index'])) {
    $_SESSION['current_index'] = 0;
    $_SESSION['answers'] = array_fill(0, $totalQuestions, null);
}

$currentIndex = $_SESSION['current_index'];
$userAnswers = $_SESSION['answers'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['answer'])) {
        $userAnswers[$currentIndex] = (int)$_POST['answer'];
        $_SESSION['answers'] = $userAnswers;
    }

    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'next' && $currentIndex < $totalQuestions - 1) {
            $_SESSION['current_index']++;
        } elseif ($_POST['action'] === 'prev' && $currentIndex > 0) {
            $_SESSION['current_index']--;
        } elseif ($_POST['action'] === 'submit') {
            $_SESSION['show_result'] = true;
        }
    }
    $currentIndex = $_SESSION['current_index'];
}

if (isset($_SESSION['show_result']) && $_SESSION['show_result'] === true) {
    $correct = 0;
    foreach ($questions as $idx => $q) {
        if (isset($userAnswers[$idx]) && $userAnswers[$idx] === $q['correct']) {
            $correct++;
        }
    }
    $wrong = $totalQuestions - $correct;
    ?>
    <!doctype html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Quiz Ergebnis</title>
    </head>
    <body>
    <h1>Quiz beendet!</h1>

    <?php if ($correct >= 4): ?>
        <h2>Erfolgreich! Du hast <?php echo $correct; ?> von <?php echo $totalQuestions; ?> Fragen richtig!</h2>
    <?php elseif ($wrong >= 2): ?>
        <h2>Versuch's noch mal! Du hast nur <?php echo $correct; ?> von <?php echo $totalQuestions; ?> richtig.</h2>
    <?php else: ?>
        <h2>Gar nicht schlecht! <?php echo $correct; ?> von <?php echo $totalQuestions; ?> richtig.</h2>
    <?php endif; ?>

    <h3>Deine Antworten:</h3>
    <?php foreach ($questions as $idx => $q): ?>
        <p>
            <strong>Frage <?php echo $idx+1; ?>:</strong> <?php echo htmlspecialchars($q['question']); ?>

            Deine Antwort:
            <?php echo ($userAnswers[$idx] !== null) ? htmlspecialchars($q['answers'][$userAnswers[$idx]]) : 'Keine Antwort'; ?>

            Richtig: <?php echo htmlspecialchars($q['answers'][$q['correct']]); ?>
        </p>
    <?php endforeach; ?>

    <form method="post">
        <button type="submit" name="restart" value="1">Nochmal spielen</button>
    </form>
    </body>
    </html>
    <?php
    exit;
}

$question = $questions[$currentIndex];
$selectedAnswer = $userAnswers[$currentIndex];
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Tier-Quiz</title>
</head>
<body>
<h1>Tier-Quiz</h1>
<p>Frage <?php echo $currentIndex + 1; ?> von <?php echo $totalQuestions; ?></p>

<form method="post">
    <p><?php echo htmlspecialchars($question['question']); ?></p>

    <?php foreach ($question['answers'] as $idx => $answerText): ?>
        <label>
            <input type="radio" name="answer" value="<?php echo $idx; ?>"
                <?php echo ($selectedAnswer !== null && $selectedAnswer == $idx) ? 'checked' : ''; ?>>
            <?php echo htmlspecialchars($answerText); ?>
        </label>

    <?php endforeach; ?>

    <?php if ($currentIndex > 0): ?>
        <button type="submit" name="action" value="prev">Zurück</button>
    <?php endif; ?>

    <?php if ($currentIndex < $totalQuestions - 1): ?>
        <button type="submit" name="action" value="next">Weiter</button>
    <?php else: ?>
        <button type="submit" name="action" value="submit">Quiz abgeben!</button>
    <?php endif; ?>
</form>
</body>
</html>

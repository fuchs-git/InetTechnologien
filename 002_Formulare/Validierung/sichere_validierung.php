<?php
$registrierung = false;
$errors = [];
$name = '';
$email = '';

// Überprüfen, ob die erwarteten Felder gesetzt sind
if (isset($_POST['name'], $_POST['email'], $_POST['password1'], $_POST['password2'])) {
    // Eingaben erfassen und trimmen
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);

    // Beispielhafte Validierung: Überprüfen, ob die Felder ausgefüllt sind
    if (empty($name)) {
        $errors[] = "Bitte geben Sie Ihren Namen ein.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Bitte geben Sie eine gültige E-Mail-Adresse ein.";
    }

    // Validierung der Passwörter: Längencheck und Übereinstimmung
    if (strlen($password1) < 8 || strlen($password1) > 30) {
        $errors[] = "Das Passwort muss zwischen 8 und 30 Zeichen lang sein.";
    }
    if ($password1 !== $password2) {
        $errors[] = "Die Passwörter stimmen nicht überein.";
    }

    // Wenn keine Fehler, Registrierung erfolgreich
    if (empty($errors)) {
        $registrierung = true;
    }
} else {
    $errors[] = "Bitte füllen Sie alle Felder aus.";
}

// Ergebnis anzeigen oder Formular erneut ausgeben
if ($registrierung) {
    $sichererBenutzername = htmlspecialchars($name);
    echo "<strong>$sichererBenutzername, Ihre Registrierung war erfolgreich.</strong>";
    # Hier könnte der Code zur Datenbankverbindung und Speicherung der Daten stehen
} else {
    // Fehlerausgabe
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
    }
    ?>
    <form method="post">
        <h2>Registrierung</h2>
        <input type="text" name="name" placeholder="Name eingeben" value="<?= htmlspecialchars($name) ?>"><br>
        <input type="email" name="email" placeholder="E-Mail eingeben" value="<?= htmlspecialchars($email) ?>"><br>
        <input type="password" name="password1" placeholder="Passwort eingeben"><br>
        <input type="password" name="password2" placeholder="Passwort wiederholen"><br>
        <button type="submit">Absenden</button>
    </form>
    <?php
}
?>
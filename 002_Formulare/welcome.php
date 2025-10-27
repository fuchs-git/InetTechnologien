<?php
if (isset($_POST['login'], $_POST['password'])) {
// Zuweisung der Werte zu Variablen, falls die Daten existieren
    $kennung = $_POST['login'];
    $passwort = $_POST['password'];

// Weitere Prüfung und Verarbeitung der Zugangsdaten ...
} else {
// Fehlermeldung, falls die erwarteten Daten nicht vorhanden sind
    echo "Bitte füllen Sie beide Felder aus.";
}

echo "Login = $kennung<br>Password = $passwort";
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
<h1>Willkommen <?=$kennung?>!</h1>

</body>
</html>

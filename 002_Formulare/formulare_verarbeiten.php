<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularerstellung in HTML</title>
</head>
<body>
<h1>Beispiel für ein Anmeldeformular (POST)</h1>

<form action="http://localhost:8000/" method="post">
    <input type="text" placeholder="Kennung" name="login"><br>
    <input type="password" placeholder="Passwort" name="password"><br>
    <button type="submit">Anmelden</button>
</form>

<h1>Verarbeitung von Formulardaten</h1>
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

</body>
</html>

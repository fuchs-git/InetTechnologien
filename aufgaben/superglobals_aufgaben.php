<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Superglobals Aufgaben</title>
</head>
<body>
<h1>Superglobals Aufgaben</h1>

<h2>Informationen ausgeben</h2>
Erstellen Sie ein PHP-Skript, das verschiedene Superglobals verwendet, um Benutzer- und Serverinformationen anzuzeigen.
Das Skript soll:

<ol>
    <li style="list-style-type: '[+] '"> Die IP-Adresse des Benutzers anzeigen, der die Seite besucht.</li>
    <li style="list-style-type: '[+] '">Die angefragte URL anzeigen, die verwendet wurde, um die Seite aufzurufen.</li>
    <li style="list-style-type: '[+] '">Die Request-Methode (GET oder POST) anzeigen, die für den Zugriff auf die Seite
        verwendet wurde.
    </li>
    <li style="list-style-type: '[+] '">Überprüfen, ob ein GET-Parameter namens username über die URL übergeben wurde,
        und diesen anzeigen.
        Falls er nicht vorhanden ist, soll eine Meldung wie "Kein Benutzername übergeben" ausgegeben werden.
    </li>
</ol>
Verwenden Sie die Superglobals $_SERVER, $_GET und $_POST
<h3>Informationen</h3>
<?php
echo
"IP-Adresse vom Benutzer/Client: {$_SERVER['REMOTE_ADDR']}<br>
         Angefragte URL: {$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}<br>
         Request-Methode: {$_SERVER['REQUEST_METHOD']}<br>";
if (isset($_GET['username'])) echo "GET-Parameter['username']: {$_GET['username']}<br>";
else echo "Kein Benutzername übergeben<br>";
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    print_r($_POST);
}
?>

<!-- curl Befehle
# Post Request
curl --request POST --data 'hello world' localhost/InetTechnologien/aufgaben/superglobals_aufgaben.php

-->
</body>
</html>
<?php

?>
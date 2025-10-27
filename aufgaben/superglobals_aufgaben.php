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
    if (isset($_GET['username']))
        echo "GET-Parameter['username']: {$_GET['username']}<br>";
    else echo "Kein Benutzername übergeben<br>";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        print_r($_POST);
    }
?>

<!-- curl Befehle
# Post Request
curl --request POST --data 'hello world' localhost/InetTechnologien/aufgaben/superglobals_aufgaben.php
-->

<h2>"User Agent" - auslesen</h2>
Ein Webbrowser sendet bei jeder Anfrage an den Webserver eine Kennung im sogenannten User Agent-Header mit. Diese
Kennung gibt Auskunft darüber, welchen Browser der Benutzer verwendet. Schreiben Sie ein PHP-Skript, das beim Aufruf
erkennt, ob der Benutzer Google Chrome, Firefox oder Edge verwendet, und den erkannten Browsernamen auf der Seite ausgibt.

<h3>User Agent</h3>
<?php
    echo "User Agent: {$_SERVER['HTTP_USER_AGENT']}<br>";
    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";
    if (str_contains($_SERVER['HTTP_USER_AGENT'], 'Chrome')) {echo "Browser ist Google Chrome.";}
    if (str_contains($_SERVER['HTTP_USER_AGENT'], 'Mozilla')) {echo "Browser ist Firefox.";}
    if (str_contains($_SERVER['HTTP_USER_AGENT'], 'Apple')) {echo "Browser ist Safari.";}
?>

<h2>"User Agent" - als Browserweiche geeignet?</h2>
Eine Browserweiche ist eine Technik, mit der unterschiedlicher HTML-, CSS- oder JavaScript-Code an verschiedene
Webbrowser ausgeliefert wird, um deren unterschiedliche Fähigkeiten zu berücksichtigen. Recherchieren Sie im Web, ob der
User Agent-Header heutzutage noch das bevorzugte Mittel für die Implementierung von Browserweichen ist. Berücksichtigen
Sie dabei aktuelle Alternativen und bewerten Sie deren Vor- und Nachteile im Vergleich zur Erkennung des User Agents.<br><br>

Gemini
<p>
    Der User-Agent (UA) Header ist heutzutage nicht mehr das bevorzugte Mittel zur Implementierung von Browserweichen (Browser Sniffing).
    Die Webentwicklungs-Community betrachtet die User-Agent-Erkennung als unzuverlässige und schlechte Praxis.
    Stattdessen wird die Funktionserkennung (Feature Detection) als aktueller Standard und Best Practice empfohlen.<br><br>
</p>
ChatGPT
<p>
    Kurzfassung: Nein—der klassische User-Agent-Header (UA) ist heute nicht das bevorzugte Mittel für Browserweichen.
    Best Practice ist Feature Detection (Progressive Enhancement) und – falls wirklich agent-spezifische Serverlogik
    nötig ist – User-Agent Client Hints (UA-CH) als moderner, strukturierter Ersatz. UA-Sniffing gilt als fehleranfällig
    und wird zusätzlich durch die User-Agent-Reduction in Chrome ausgehöhlt.
</p>

</body>
</html>

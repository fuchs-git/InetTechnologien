<!doctype html>
<html lang="de" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MD5-Hashwert</title>
</head>
<body>
<h1>Berechnung eines MD5-Hashwertes</h1>
Im folgenden Beispiel wird der MD5-Hashwert eines beliebigen Ausgangstext mit Hilfe von PHP berechnet. Zur Eingabe wird
das textarea-Element verwendet und der eingegebene Text als Wert mit dem Key ausgangstext per GET übertragen. Neben der
Berechnung und Ausgabe des Hashwertes wird der Ausgangstext mit Hilfe der Kurzform des PHP-Tags im textarea-Element
ausgegeben. Würde man dies nicht tun, wäre der eingegeben Text durch das Neuladen der Webseite verlorengegangen gewesen.
<br>

<?php
$text = $_GET['ausgangstext'] ?? '';
?>

<form>
    <textarea name="ausgangstext" cols="40" rows="10"><?= $text ?></textarea>
    <br>
    <button type="submit">MD5-Hashwert berechnen</button>
</form>
<br>

<?php
if ($text) {
    echo "Hashwert: " . md5($text);
}
?>

<p>Praxisteil - XSS Angriff<br>
    Entfernen Sie im obigen Beispiel zur Berechnung des MD5-Hashwertes die Funktion htmlspecialchars() und geben Sie im
    Textfeld eine Zeichenkette ein, die JavaScript ausführt und ein alert() auslöst.</p>
<?= htmlspecialchars("text</textarea><script>alert(1)</script>") ?>
</body>
</html>

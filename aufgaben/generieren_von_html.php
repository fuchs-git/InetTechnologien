<!doctype html>
<html lang="de">
<head>
    <title>Generieren von HTML-Code</title>
</head>
<body>
<h1>Generieren von HTML-Code</h1>
Durch die Ausgabe von Strings, die HTML-Tags beinhalten, kann man mit PHP HTML-Code generieren. Erzeugen Sie per PHP
eine Ausgabe vom Buchstaben "o" ähnlich im in der ersten Abbildung, wobei jede zweite Zeile die Farbe Rot aufweist.

Zusatzaufgabe
Erzeugen Sie eine Ausgabe wie im zweiten Bild (Hinweis: Man kann in HTML auch Leerzeichen mit &nbsp; erzwingen).

</body>
</html>

<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Dreiecke aus o (ohne Plateau)</title>
    <style>
        body { font-family: ui-monospace, Menlo, Consolas, monospace; }
        table { border-collapse: collapse; }
        td { padding: 2px 6px; font-size: 22px; text-align: center; }
        .row-black td.o { color:#000; }
        .row-red   td.o { color:#d00; }
        .gap { width: 5px; }          /* Abstand zwischen den Dreiecken */
        .s { color: transparent; }     /* unsichtbarer Platzhalter */
    </style>
</head>
<body>

<table>
    <?php
    $max = 5;                      // Höhe/Breite der Dreiecke (anpassbar)
    $rows = [];

    // Aufwärts
    for ($i = 1; $i <= $max; $i++) $rows[] = $i;
    // Abwärts (ohne Plateau)
    for ($i = $max - 1; $i >= 1; $i--) $rows[] = $i;

    foreach ($rows as $r => $n) {
        $cls = ($r % 2) ? 'row-red' : 'row-black';
        echo "<tr class=\"$cls\">";

        // Linkes Dreieck (links bündig)
        for ($i = 0; $i < $n; $i++) echo '<td class="o">o</td>';
        for ($i = 0; $i < $max - $n; $i++) echo '<td class="s">&nbsp;</td>';

        echo '<td class="gap"></td>'; // Abstand

        // Rechtes Dreieck (gespiegelt, rechts bündig)
        for ($i = 0; $i < $max - $n; $i++) echo '<td class="s">&nbsp;</td>';
        for ($i = 0; $i < $n; $i++) echo '<td class="o">o</td>';

        echo "</tr>\n";
    }
    ?>
</table>

</body>
</html>

<?php
/* ---------------------------------------------------------
   Familie Maier – Autos
   - ein gemeinsames, menschenlesbares Array
   - Ausgabe als verschachtelte HTML-Liste via Funktion
   --------------------------------------------------------- */

// 1) Datenstruktur (ein einziges Array, nach Personen gruppiert)
$familie = [
    'Alfred Maier' => [
        ['marke' => 'Audi', 'modell' => 'A4',   'ps' => 180, 'farbe' => 'schwarz', 'alter' => 2],
    ],
    'Ingrid Maier' => [
        ['marke' => 'VW',   'modell' => 'Käfer','ps' => 110, 'farbe' => 'gelb',    'alter' => 6],
    ],
    'Lisa Maier' => [
        ['marke' => 'VW',   'modell' => 'up!',  'ps' => 90,  'farbe' => 'rot',     'alter' => 0], // „neu“
    ],
];

function renderFamilienAutos(array $daten): string
{
    // für saubere Ausgabe in einen String rendern
    ob_start();
    echo "<ul>\n";
    foreach ($daten as $person => $autos) {
        echo "  <li><strong>" . htmlspecialchars($person) . "</strong>\n";
        echo "    <ul>\n";
        foreach ($autos as $a) {
            $alter = (int)$a['alter'];
            $alterText = $alter === 0 ? 'neu' : ($alter === 1 ? '1 Jahr alt' : $alter . ' Jahre alt');

            printf(
                "      <li>%s %s %s – %s, %d&nbsp;PS</li>\n",
                htmlspecialchars($a['farbe']),
                htmlspecialchars($a['marke']),
                htmlspecialchars($a['modell']),
                $alterText,
                (int)$a['ps']
            );
        }
        echo "    </ul>\n";
        echo "  </li>\n";
    }
    echo "</ul>\n";
    return ob_get_clean();
}
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Familie Maier – Autos</title>
    <style>
        body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Arial,sans-serif; line-height:1.35}
        ul{margin:.25rem 0 .25rem 1.2rem}
        li{margin:.15rem 0}
    </style>
</head>
<body>

<h1>Familie Maier – Autos</h1>

<h2>1) Daten (menschenlesbar)</h2>
<pre><?= json_encode($familie, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) ?></pre>

<h2>2) Ausgabe als verschachtelte HTML-Liste</h2>
<?= renderFamilienAutos($familie) ?>

<?php
// 3) Alfred gewinnt im Lotto: neuer weißer Porsche mit 460 PS
$familie['Alfred Maier'][] = ['marke' => 'Porsche', 'modell' => '911', 'ps' => 460, 'farbe' => 'weiß', 'alter' => 0];
?>

<h2>3) Nach dem Lottogewinn (gleicher Ausgabecode)</h2>
<?= renderFamilienAutos($familie) ?>

</body>
</html>
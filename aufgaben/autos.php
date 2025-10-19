// <?php
//    $auto_arr['Audi A4'] = ['Halter' => 'Alfred Maier', 'Leistung' => 180, 'Übernahmejahr' => '2023', 'Farbe' => 'schwarz'];
//    $auto_arr['VW Käfer'] = ['Halter' => 'Ingrid Maier', 'Leistung' => 110,'Übernahmejahr' => '2019', 'Farbe' => 'gelb'];
//    $auto_arr['VW up!'] = ['Halter' => 'Lisa Maier', 'Leistung' => 90,'Übernahmejahr' => '2025', 'Farbe' => 'rot'];
// ?>


<?php
    $auto_arr['Alfred Maier'] = ['Marke' => 'Audi','Modell' => 'A4', 'Leistung' => 180, 'Übernahmejahr' => '2023', 'Farbe' => 'schwarz'];
    $auto_arr['Ingrid Maier'] = ['marke' => 'VW','Modell' => 'Käfer', 'Leistung' => 110,'Übernahmejahr' => '2019', 'Farbe' => 'gelb'];
    $auto_arr['Lisa Maier'] = ['Marke' => 'VW','Modell' => 'up!', 'Leistung' => 90,'Übernahmejahr' => '2025', 'Farbe' => 'rot'];
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Familie Meier - Autos</title>
</head>
<body>
<h1>Familie Meier - Autos</h1>
<div>
    Familie Maier besitzt drei Autos. Vater Alfred fährt einen 2 Jahre alten schwarzen Audi A4 mit 180PS.
    Mutter Ingrid benutzt immer den 6 Jahre alten gelben VW Käfer mit 110PS und die
    Tochter Lisa hat gestern einen neuen roten VW up! mit 90 PS geschenkt bekommen.
    <ol>
        <li>
            Speichern Sie die Informationen, wer welches Auto besitzt in einem einzigen Array.
            Erfassen Sie dabei auch alle Daten zu den einzelnen Autos. Die dabei erzeugte Struktur sollte menschenlesbar
            (der Mensch muss kein Programmierer sein!) sein, d.h. es ist auf einen Blick zu erkennen,
            wer welches Auto besitzt und welche Daten ein Auto hat.
            <pre>
                <?=print_r($auto_arr)?>
                <?= json_encode($auto_arr, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)?>
            </pre>
        </li>
        <li>
            Generieren Sie anschließen eine Ausgabe Mitglieder der Familie Maier und deren Autos in Form einer
            verschachtelten HTML-Liste.<br>
            <ol>
            <?php
                foreach ($auto_arr as $modell => $info) {
                    echo "<li>" . $info['Halter'] . ' fährt seid '.$info['Übernahmejahr'] ." das Auto \"$modell\". Der $modell hat "
                        . $info['Leistung'] . " PS.</li>";
            }
            ?>
            </ol>
        </li>
        <li>
            Alfred gewinnt im Lotto und kauft sich zusätzlich einen neuen weißen Porsche mit 460PS.
            Fügen Sie diese Information nachträglich dem Array hinzu und lassen sich sich die HTML-Liste erneut
            ausgeben (Der Code dazu sollte sich nicht ändern, weshalb hier einfach Copy/Paste anzuwenden ist; Sie
            können aber auch eine Funktion verwenden).
            <?php $auto_arr['Porsche 123'] = ['Halter' => 'Alfred Maier', 'Leistung' => 460,'Übernahmejahr' => '2025', 'Farbe' => 'weiß']; ?>
            <ol>
                <?php
                foreach ($auto_arr as $modell => $info) {
                    echo "<li>" . $info['Halter'] . ' fährt seid '.$info['Übernahmejahr'] ." das Auto \"$modell\". Der $modell hat "
                        . $info['Leistung'] . " PS.</li>";
                }
                ?>
            </ol>
        </li>
    </ol>

</div>
</body>
</html>
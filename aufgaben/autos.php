<?php
    $array = ['person' => 'Alfred Maier', 'Marke' => 'Audi', 'Model' => 'A4', 'Leistung' => '180PS'];
    $array['person'] = ['person' => 'Alfred Maier', 'Marke' => 'Audi', 'Model' => 'A4', 'Leistung' => '180PS'];

    $auto_arr = ['Auto', 'Model', 'Leistung', 'Halter'];
    $auto_arr['Audi A4'] = ['Halter' => 'Alfred Maier', 'Leistung' => '180PS'];
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
    <pre>
        <?=print_r($auto_arr)?>;?>
    </pre>
</div>
</body>
</html>
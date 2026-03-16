<?php

function speichern()
{

    $data = json_decode(file_get_contents("php://input"), true);
    if ($data) {
        $index = 0;
        if (file_exists('contacts.csv')) {
            $zeilen = file("contacts.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $index = count($zeilen) + 1;
        }

        foreach ($data as $key => $value) {
            $zeile .= str_replace(';', ',', $value) . ';';
        }
        $zeile = substr($zeile, 0, -1) . PHP_EOL;

//        $zeile =
//            $index . ',' .
//            $data['nachname'] . ',' . $data['vorname'] . ',' .
//            $data['strasse'] . ',' . $data['stadt'] . ',' .
//            $data['plz'] . ',' . $data['email'] . PHP_EOL;
        $erg = file_put_contents('contacts.csv', $zeile, FILE_APPEND | LOCK_EX);
        if ($erg) {
            echo 'Hat geklappt';
        } else echo 'Hat nicht geklappt';
    }
}

function namensausgabe()
{

    $data = json_decode(file_get_contents("php://input"), true);
    $alles = file_get_contents('contacts.csv');
    if ($alles === false) {
        echo json_encode('Hat nicht geklappt');
    }
    $namen = [];
    foreach (explode("\n", $alles) as $zeile) {
        $data = explode(';', $zeile);
        $namen [] = $data[0] . $data[1];
}
    echo json_encode($namen);
}


if (isset($_GET['neuer_kontakt'])) {
    speichern();
}

if (isset($_GET['neuer_kontakt'])) {
    namensausgabe();
}
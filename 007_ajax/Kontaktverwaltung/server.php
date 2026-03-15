<?php

function speichern()
{

    $data = json_decode(file_get_contents("php://input"), true);
    if ($data) {
        $index = 0;
        if (file_exists('contacts.csv')) {
            $zeilen = file("contacts.csv", FILE_IGNORE_NEW_LINES| FILE_SKIP_EMPTY_LINES);
            $index = count($zeilen) + 1;
        }

        $zeile =
            $index . ',' .
            $data['nachname'] . ',' . $data['vorname'] . ',' .
            $data['strasse'] . ',' . $data['stadt'] . ',' .
            $data['plz'] . ',' . $data['email'] . PHP_EOL;
        file_put_contents('contacts.csv', $zeile, FILE_APPEND | LOCK_EX);
    }
}

if (isset($_GET['neuer_kontakt'])) {
    speichern();
}


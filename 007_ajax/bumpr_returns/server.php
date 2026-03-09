<?php

$lines = file("bumpr_returns_adressbuch.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if (isset($_GET['suche'])) {

    $suchwort = trim($_GET['suche']);
    $treffer = [];

    if (strlen($suchwort) < 3) {
        echo json_encode(["antwort" => []]);
        exit;
    }

    foreach ($lines as $line) {

        $data = str_getcsv($line, ",");

        if (
            stripos($data[0], $suchwort) !== false ||
            stripos($data[1], $suchwort) !== false
        ) {

            $treffer[] =
                $data[0] . " - " .
                $data[1] . " | " .
                $data[2] . " | " .
                $data[3];

            // maximal 9 Treffer
            if (count($treffer) >= 9) {
                break;
            }

        }

    }

    echo json_encode(["antwort" => $treffer]);
}
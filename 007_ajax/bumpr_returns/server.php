<?php

$lines = file("bumpr_returns_adressbuch.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if (isset($_GET['suche'])) {

    $suchwort = trim($_GET['suche']);
    $treffer = [];

    foreach ($lines as $line) {
        $data = str_getcsv($line, ",");
        if (stripos($line, $suchwort) !== false) {
            $treffer[] = $data[0] . " - " . $data[1];
        }

    }
    echo json_encode(["antwort" => $treffer]);
}
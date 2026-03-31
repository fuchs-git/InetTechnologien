<?php

if (isset($_GET['suche'])) {

    $gesuchtes_land = strtolower(htmlspecialchars(trim($_GET['suche'])));


    $embassy_data = json_decode(file_get_contents('data.json'));
    $possible_hits = [];

    foreach ($embassy_data as $key => $country_entries) {
        if (str_starts_with(strtolower($key), $gesuchtes_land)) {
            $possible_hits[] = $key;
        }
    }
    usort($possible_hits, function ($a, $b) {
        return strcmp($a[1], $b[1]);
    });
    echo json_encode($possible_hits);
    return;
}


if (isset($_GET['gebe_daten'])) {
    $country = strtolower(htmlspecialchars($_GET['gebe_daten']));

    $result = [];

    $embassy_data = json_decode(file_get_contents('data.json'), true);
    foreach ($embassy_data as $key => $country_entries) {
        foreach ($country_entries as $one_entry) {
            if (strtolower($key) === $country) {
                $result[] = $one_entry;
            }
        }
    }
    echo json_encode($result);
    return;
}
<?php
if (isset($_GET['suche'])) {
    $gesuchtes_land = strtolower(htmlspecialchars(trim($_GET['suche'])));
    $embassy_data = json_decode(file_get_contents('data.json'));
    $possible_hits = [];
    foreach ($embassy_data as $key => $country_enties) {
        if (str_starts_with(strtolower($key), $gesuchtes_land)) {
            $possible_hits[] = $key;
        }
    }
    usort($possible_hits, function ($a, $b) {
        return strcmp($a, $b);
    });
    echo json_encode($possible_hits);
    return;
}

if (isset($_GET['gebe_daten'])) {
    $country = strtolower(trim($_GET['gebe_daten']));
    $embassy_data = json_decode(file_get_contents('data.json'), true);
    $result = [];
    foreach ($embassy_data as $key => $entries) {
        if (strtolower($key) === $country) {
            $result = $entries;
            break;
        }
    }
    echo json_encode($result);
    exit;
}
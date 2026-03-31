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
//                $resultEntry = [];
//                if (isset($one_entry['leader'])) {
//                    $resultEntry["leader"] = $one_entry["leader"];
//                } else {
//                    $resultEntry["leader"] = "-";
//                }
//                if (isset($one_entry["country"])) {
//                    $resultEntry["country"] = $one_entry["country"];
//                } else {
//                    $resultEntry["country"] = "-";
//                }
//                if (isset($one_entry['city'])) {
//                    $resultEntry["city"] = $one_entry["city"];
//                } else {
//                    $resultEntry["city"] = "-";
//                }
//                if (isset($one_entry['postal'])) {
//                    $resultEntry["postal"] = $one_entry["postal"];
//                } else {
//                    $resultEntry["postal"] = "-";
//                }
//                if (isset($one_entry['phone'])) {
//                    $resultEntry["phone"] = $one_entry["phone"];
//                } else {
//                    $resultEntry["phone"] = "-";
//                }
//                if (isset($one_entry['open'])) {
//                    $resultEntry["open"] = $one_entry["open"];
//                } else {
//                    $resultEntry["open"] = "-";
//                }
//                if (isset($one_entry['misc'])) {
//                    $resultEntry["misc"] = $one_entry["misc"];
//                } else {
//                    $resultEntry["misc"] = "-";
//                }
//                if (isset($one_entry['website'][0])) {
//                    $resultEntry["website"] = $one_entry['website'][0];
//                } else {
//                    $resultEntry["website"] = "-";
//                }

                $result[] = $one_entry;
            }
        }
    }


    echo json_encode($result);
    return;
}

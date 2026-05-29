<?php

if (isset($_GET['get_ortsnamen'])){
    $data = json_decode(file_get_contents('data.json'), true);
    $ortsnamen = [];
    foreach ($data as $ort){
        $ortsnamen[] = $ort['ort'];
    }
    echo json_encode($ortsnamen);
}

else if (isset($_GET['get_wetter'])){
    $data = json_decode(file_get_contents('data.json'), true);
    foreach ($data as $wetter){
        if ($wetter['ort'] === $_GET['get_wetter']) {
            echo json_encode($wetter['vorhersage']);
            break;
        }
    }
}
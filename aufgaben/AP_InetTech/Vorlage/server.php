<?php
session_name('periodensystem');
session_start();

if (isset($_GET['update_vorhanden'])) {
    $data = json_decode(file_get_contents("php://input"), true);
    $_SESSION['sammlung'][$data['index']]['vorhanden'] = $data['vorhanden'];
    file_put_contents('periodensystem.json', json_encode($_SESSION['sammlung']), JSON_PRETTY_PRINT);
}

if (isset($_GET['neue_kosten'])) {
    $data = json_decode(file_get_contents("php://input"), true);
    if ($data['kosten'] === '0' || $data['kosten'] === '') {
        unset($_SESSION['sammlung'][$data['index']]['kosten']);
        echo json_encode(['text' => '', 'ok' => true]);
    } elseif (is_numeric($data['kosten'])) {
        $_SESSION['sammlung'][$data['index']]['kosten'] = +$data['kosten'];
        echo json_encode(['text' => +$data['kosten'], 'ok' => true]);
    } else
        unset($_SESSION['sammlung'][$data['index']]['kosten']);
        echo json_encode(['text' => $data['kosten'], 'ok' => false]);
    file_put_contents('periodensystem.json', json_encode($_SESSION['sammlung']), JSON_PRETTY_PRINT);
}

elseif (isset($_GET['informationen'])) {
    $_SESSION['index'] = $_GET['informationen'];
    $element = $_SESSION['sammlung'][$_GET['informationen']];
    echo json_encode([
        'bild' => "bilder_elemente/" . $element['bild'],
        'name' => $element['name'],
        'dichte' => $element['dichte'],
        'schmelztemperatur' => $element['schmelztemperatur'],
        'siedetemperatur' => $element['siedetemperatur'],
        'beschreibung' => $element['beschreibung'],
    ]);
}

else if(isset($_GET['load_index'])){
    if (isset($_SESSION['index'])) {
        echo json_encode(['status' => 'ok', 'index' => $_SESSION['index']]);
    }
    else
        echo json_encode(['status' => 'false', 'index' => -1]);

}
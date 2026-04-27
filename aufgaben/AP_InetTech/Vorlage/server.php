<?php
session_name('periodensystem');
session_start();

if (isset($_GET['update_vorhanden'])) {
    $data = json_decode(file_get_contents("php://input"),true);
    $_SESSION['sammlung'][$data['index']]['vorhanden'] = $data['vorhanden'];
    file_put_contents('periodensystem.json', json_encode($_SESSION['sammlung']), JSON_PRETTY_PRINT);
}

if (isset($_GET['neue_kosten'])) {
    $data = json_decode(file_get_contents("php://input"),true);
    $_SESSION['sammlung'][$data['index']]['kosten'] = $data['vorhanden'];

}
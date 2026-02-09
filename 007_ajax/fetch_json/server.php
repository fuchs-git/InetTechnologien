<?php

$namen = ['petra', 'alice', 'bob'];

if (isset($_GET['nutzername']) && in_array($_GET['nutzername'], $namen)) {
    echo json_encode(["antwort" => 'schon vorhanden']);
}
else {
    echo json_encode(['antwort' => 'nicht vorhanden']);
}
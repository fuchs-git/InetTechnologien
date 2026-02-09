<?php

$namen = ['petra', 'alice', 'bob'];

if (isset($_GET['nutzername']) && in_array($_GET['nutzername'], $namen)) {
    echo 'schon vorhanden';
}
else {
    echo 'nicht vorhanden';
}
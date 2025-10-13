<?php

    // array_merge()
    $farben1 = ["rot", "grün"];
    $farben2 = ["blau", "gelb"];
    $alleFarben = array_merge($farben1, $farben2);
    print_r($alleFarben);  // Ausgabe: Array([0] => rot [1] => grün [2] => blau [3] => gelb)
?>

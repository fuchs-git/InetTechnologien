<?php
    // Eine Variable im Hauptskript definieren
    $haupt_variable = "Dies ist eine Variable aus dem Hauptskript.";

    // Eine externe Datei einbinden
    require 'datei.php';

    // Die Variable aus der eingebundenen Datei verwenden
    echo $datei_variable; // Ausgabe der Variable aus der eingebundenen Datei
?>
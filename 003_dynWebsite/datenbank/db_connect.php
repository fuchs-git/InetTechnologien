<?php
// Einbinden der Konfigurationsdatei
require 'config.php';

try {
    // Datenbankverbindung herstellen
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_passwort);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Verbindung zur Datenbank erfolgreich!";
} catch (PDOException $e) {
    // Fehlerbehandlung, falls die Verbindung fehlschlägt
    echo "Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage();
}
?>
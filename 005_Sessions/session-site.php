<?php
session_name('bumpr');  // Name der Session-ID (Cookie-Name)
session_start();        // Session starten bzw. wiederaufnehmen
?>

Daten in Sessions speichern
<?php
    $_SESSION['browser'] = 'Chrome';  // sich den Browser merken
    $_SESSION['anzahl'] = 200;        // sich die Anzahl merken
?>

Daten lesen
<?php
$browser = $_SESSION['browser'];
echo "Sie benutzen den Browser: $browser";

$anzahl =  $_SESSION['anzahl'];
echo "Sie haben $anzahl Schokoladenhasen im Warenkorb.";
?>

Session beenden
<?php
session_start();          // Session muss zuerst wiederaufgenommen werden

// .....
// .....

session_destroy();        // Session beenden

// Optional die Webseite neu laden mit bereinigter URL
header('Location: ./');
?>

Um einen einzelnen Key in $_SESSION zu löschen, kann man unset() verwenden.
<?php
unset($_SESSION['browser']);  // den Key browser löschen
?>


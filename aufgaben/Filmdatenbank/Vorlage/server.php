
<?php
$titel = htmlspecialchars($_POST['titel']);
$erscheinungsjahr = htmlspecialchars($_POST['erscheinungsjahr']);
$dauer = htmlspecialchars($_POST['dauer']);
$genre = htmlspecialchars($_POST['genre']);
$gesehen = "-";
if (isset($_POST["gesehen"])){
    $gesehen = "+";
}

$text = "\n$titel#$erscheinungsjahr#$dauer#$genre#$gesehen";
file_put_contents("filme.txt", $text, FILE_APPEND);
//header("Location: index.php");

//  Filme mit Arrays
$rohdaten = [
    "Matrix#1999#136#Action#+",
    "Avatar#2009#162#Fantasy#+",
    "Titanic#1997#195#Drama#-"
];

$filme = [];

foreach ($rohdaten as $eintrag) {

    list($titel, $jahr, $dauer, $genre, $gesehen) = explode("#", $eintrag);

    $filme[$titel] = [
        "titel" => $titel,
        "jahr" => $jahr,
        "dauer" => $dauer,
        "genre" => $genre,
        "gesehen" => ($gesehen === "+") ? 1 : 0
    ];
}

// Daten hinzufügen
$neuerTitel  = "Alien";
$neuesJahr   = 1979;
$neueDauer   = 117;
$neuesGenre  = "SciFi";
$neuGesehen  = "+";

$filme[$neuerTitel] = [
    "titel" => $neuerTitel,
    "jahr" => $neuesJahr,
    "dauer" => $neueDauer,
    "genre" => $neuesGenre,
    "gesehen" => ($neuGesehen === "+") ? 1 : 0
];


?>

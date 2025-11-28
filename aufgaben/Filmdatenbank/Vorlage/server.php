
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
header("Location: index.php");
?>
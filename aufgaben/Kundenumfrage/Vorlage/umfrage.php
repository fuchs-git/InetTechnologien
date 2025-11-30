<?php
$id = $_POST['id'];
$aktFrage = $_POST["aktFrage"] + 1;
header("Location: index.php?id=$id&aktFrage=$aktFrage");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daten Lesen</title>
</head>
<body>
<h1>Web-Notebook</h1>
<!-- Nutzer soll Daten anlegen, anzeigen, bearbeiten können -->


<?php
if (isset($_GET['files'])) {
    $files = glob('./files/*');
    foreach ($files as $file) {
        echo $file."\n";
    }
}

?>


</body>
</html>
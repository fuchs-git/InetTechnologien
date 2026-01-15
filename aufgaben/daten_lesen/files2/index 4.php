<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Dateizugriffe</title>
</head>
<body>

<?php

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

if (isset($_POST['action'], $_POST['text'], $_POST['filename']) && $_POST['action'] == 'save') {
    $content = $_POST['text'];

    $filename = $_POST['filename'];
    file_put_contents($filename, $content);
    echo "<p style='color:green;'>Datei erfolgreich gespeichert!</p>";

    echo "<a href='index.php'>zur Startseite</a>";
} elseif (isset($_POST['action'], $_POST['directory'], $_POST['filename']) && $_POST['action'] == 'create') {
    $filename = $_POST['directory'] . '/' . $_POST['filename'];

    if (!file_exists($filename)) {
        file_put_contents($filename, "");
        echo "<p style='color:green;'>Datei erfolgreich erstellt.</p>";
    } else {
        echo "<p style='color:red;'>Datei existiert bereits!</p>";
    }

    echo "<a href='index.php'>zur Startseite</a>";
} elseif (isset($_POST['action'], $_POST['filename']) && $_POST['action'] == 'delete') {
    $filename = $_POST['filename'];

    if (is_file($filename)) {
        if (unlink($filename)) {
            echo "<p style='color:green;'>Datei erfolgreich gelöscht!</p>";
        } else {
            echo "<p style='color:red;'>Fehler beim Löschen der Datei!</p>";
        }
    }
    else {
        echo "<p style='color:red;'>Verzeichnisse können nicht gelöscht werden!</p>"; // rekursives Löschen von Verzeichnis und Inhalt ...
    }

    echo "<a href='index.php'>zur Startseite</a>";
} else {
    if (!isset($_POST['filename'])) {
        $filename = "./files";
        $files = glob($filename . '/*');

        require "browse.php";
    } else {
        $filename = $_POST['filename'];

        if (is_file($filename)) {
            require "edit.php";
        } elseif (is_dir($filename)) {
            $files = glob($filename . '/*');

            if ( $filename != "./files" )
              array_unshift($files, "..");

            require "browse.php";
        }
    }
}
?>

</body>
</html>
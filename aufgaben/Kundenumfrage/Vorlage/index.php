<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kundenservice</title>
</head>
<body>
<header>
    <?php
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";


    $id = $_GET['id'];
    $aktFrage = $_GET['aktFrage'] ?? 0;

    function stelleFrage($frage_nr)
    {
        $fragen = file("fragen.txt", FILE_IGNORE_NEW_LINES);
        if ($frage_nr < 0 || $frage_nr > (count($fragen) - 1)) {
            echo "Vielen Dank und auf Wiedersehen!";
            return false;
        }
        foreach ($fragen as $i => $line) {
            if ($frage_nr == $i) {
                foreach (explode(';;', $line) as $key => $value) {
                    if ($key === 0) {
                        echo $value;
                    } else {
                        echo "<form method='POST' action='umfrage.php'>";
                        echo "<input type='hidden' name='aktFrage' value=$frage_nr>";
                        echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
                        foreach (explode(',', $value) as $frage_id => $frage) {
                            echo "<input type='radio' name='antwort_$frage_nr' value=$frage_id> $frage<br>";
                        }
                        echo "<input type='submit' name='weiter' value='weiter'>";
                        echo "</form>";
                    }
                }
            }

        }
        return true;
    }


    if (strlen($id) == 4) {
        echo "<h1>Kundenservice Zufriedenheitsbefragung</h1>";
        stelleFrage($aktFrage);
    } else {
        echo "<h2>UMF- Wir führen im Auftrag von Unternehmen  Umfragen durch</h2>";
    }
    ?>
</header>


</body>
</html
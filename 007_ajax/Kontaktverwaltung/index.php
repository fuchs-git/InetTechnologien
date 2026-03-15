<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bumpr returns!</title>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require("nav.php");
?>
<main>
    <h1>Kontaktverwaltung</h1>
    <div id="Kontaktverwaltung">
        <div id="formular">
            <h2>Dateneingabe</h2>
            <form>
                <input type="text" placeholder="Nachname" name="Nachname"><br>
                <input type="text" placeholder="Vorname" name="Vorname"><br>
                <input type="text" placeholder="Straße" name="strasse"><br>
                <input type="text" placeholder="Stadt" name="stadt"><br>
                <input type="text" placeholder="PLZ" name="plz"><br>
                <input type="text" placeholder="EMail" name="email"><br>
                <button disabled>Übertragen</button><button>Zurücksetzen</button>

            </form>
        </div>
        <hr>
        <div id="uebersicht">
            <h2>Übersicht</h2>
        </div>

    </div>

</main>
</body>
</html>
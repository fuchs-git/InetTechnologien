<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0,
               maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="script.js"></script>
    <title>Filmdatenbank</title>
</head>
<body>

<h1>Filmdatenbank</h1>

<?php
$filedata = explode("\n", file_get_contents('filme.txt'));

echo "<div>";
echo "<table style='border: 1px solid black;'>";
echo "<tr><th>Film</th><th>Jahr</th><th>Dauer</th><th>Kategorie</th><th>gesehen</th></tr>";
foreach ($filedata as $line) {
    echo "<tr>";
    foreach (explode("#", $line) as $key => $value) {
        echo "<td style='border: 1px solid black'>$value</td>";
    }
    echo "</tr>";
}
echo "</div>";

?>

<div style="margin-bottom: 30px">
    <h2> Film hinzufügen</h2>
    <form method="POST" action="server.php">
        <input id="titel" type="text" name="titel" placeholder="Titel">
        <span id="nameError"></span><br>
        <input id="jahr" type="text" name="erscheinungsjahr" placeholder="Erscheinungsjahr">
        <span id="jahrError"></span> <br>
        <input type="text" name="dauer" placeholder="Länge in Minuten"><br>
        <b>Genre: </b> <select id="genre_id" name="genre">
            <option value="" disabled selected>Bitte ausählen</option>
            <option value="Action">Action</option>
            <option value="Komoedie">Komödie</option>
            <option value="Liebesfilm">Liebesfilm</option>
            <option value="Drama">Drama</option>
            <option value="Fantasy">Fantasy</option>
        </select>
        <input type="checkbox" name=gesehen value="1"> gesehen<br><br>
        <input type="submit" value="eintragen">

    </form>
</div>
</body>
</html>
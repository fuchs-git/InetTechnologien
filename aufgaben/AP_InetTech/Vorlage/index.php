<?php
session_name('periodensystem');
session_start();
$_SESSION['sammlung'] = json_decode(file_get_contents("periodensystem.json"), true);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <title>Element-Sammlung</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>

<main>
    <table>
        <caption></caption>
        <thead>
        <tr>
            <th>Z</th>
            <th>Symbol</th>
            <th>Name</th>
            <th>Vorhanden</th>
            <th>Kosten</th>
        </tr>
        </thead>
        <tbody id="tbody">
        <?php
        foreach ($_SESSION['sammlung'] as $key => $value) {
            echo "<tr id='" . $key . "'>";
            echo "<td>" . $value['ordnungszahl'] . "</td>";
            echo "<td>" . $value["symbol"] . "</td>";
            echo "<td>" . $value["name"] . "</td>";
            echo "<td><input id =index_'". $key ."' type='checkbox' " . (isset($value['vorhanden']) && $value['vorhanden'] ?'checked':'') . "></td>";
            echo "<td id =kosten_". $key ." contenteditable>" . ($value["kosten"] ?? '') ."</td>";
            echo "</tr>";
        }
        ?>

        </tbody>
        <tfoot>
        <tr>
            <th colspan="4">Gesamtkosten</th>
            <th id="summe"></th>
        </tr>
        </tfoot>
    </table>

    <div id="info"></div>
</main>

</body>
</html>

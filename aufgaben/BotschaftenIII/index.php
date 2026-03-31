<?php
session_name("botschaft");
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Auslandsvertretungen</title>
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
<?php
if (!isset($_SESSION['accept'])) {
    require 'banner.php';
}
?>

<main>
    <h1>Deutsche Vertretung im Ausland</h1>
    <h2></h2>
    <input list="laender" id="input">
    <datalist id="laender">
        <option value="Test"></option>
    </datalist>
    <div id="result"></div>
</main>

</body>
</html>

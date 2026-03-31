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
<!--Banner ist vorgegeben-->
<?php
if (!isset($_SESSION['accept']))
    require('banner.php');
?>

<!-- Hier fehlt der Inhalt -->

</body>
</html>

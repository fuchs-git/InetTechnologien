<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bumpr</title>
    <script defer src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include './header.php';
?>
<main>
    <?php
    if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
        include './intern.php';
    }
    else {
        include './anmeldeformular.php';
    }
    ?>
</main>

<footer>

</footer>

</body>
</html>
<?php
session_name('bumpr');
session_start();

if (!isset($_SESSION['lustig'])) {
    $_SESSION['lustig'] = 'Ein Witz!';
}
else {
    $_SESSION['lustig'] = 'Ein anderer Witz! ' . random_int(0, 100);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bumpr</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include './header.php';
?>
<main>
    <?php
    if (isset($_SESSION['auth'])) {
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
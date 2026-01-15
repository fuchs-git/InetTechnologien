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
<header>
    <div>
        <h1>bumpr</h1>
    </div>
</header>
<main>
<form action="" method="post">
    <input type="text" name="username" id="username" placeholder="Benutzername"><br>
    <input type="password" name="password" id="password" placeholder="Password"><br>
    <input type="submit" value="Anmelden">
</form>
</main>

<footer>
    <form action="logout.php">
        <input type="submit" value="Session beenden">
    </form>

    <pre>
    <?php
    print_r($_SESSION);
    #print_r($_SERVER);
    ?>
    </pre>
</footer>

</body>
</html>
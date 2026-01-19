<?php
session_name('bumpr');
session_start();
$username = trim(htmlspecialchars($_POST['username']));
$password = trim(htmlspecialchars($_POST['password']));
$_SESSION['auth'] = false;

    $creds = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach($creds as $line) {
        [$user, $pass] = explode(":", $line, 2);
        if ($username == $user && md5($password) == $pass) {
            $_SESSION['user'] = $username;
            $_SESSION['auth'] = true;
            header('Location: index.php');
        }
    }
header('Location: index.php');
?>
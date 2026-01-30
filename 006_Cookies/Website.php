<?php
setcookie('username', 'Homer', time() + (3600 * 24 * 365));   // username=Homer; 1 Jahr Lebensdauer


if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    echo "Willkommen $username!";
}
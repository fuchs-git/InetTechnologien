<?php
session_name('botschaft');
session_start();
$_SESSION['accept'] = true;
header('Location:index.php');
exit();
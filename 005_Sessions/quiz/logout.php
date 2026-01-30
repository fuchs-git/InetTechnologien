<?php
session_name('quiz');
session_start();
session_destroy();
header("Location: index.php");
?>
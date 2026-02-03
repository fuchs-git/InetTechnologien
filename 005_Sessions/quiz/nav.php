<?php
session_name('quiz');
session_start();
?>
<nav>
<link rel="stylesheet" href="style.css">
<div class="logo">
    ACL Quiz
</div>
    <?php
    if (isset($_SESSION['auth'])) {
        echo <<<END
<div class="menu">
    <a href="index.php">Home</a>
    <a href="highscore.php">Scoreboard</a>
    <a href="logout.php">Logout</a>
</div>
END;
    }
    else {
        echo <<<END
<div class="menu">
    <a href="index.php">Home</a>
    <a href="highscore.php">Scoreboard</a>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
</div>
END;
    }
    ?>
</nav>
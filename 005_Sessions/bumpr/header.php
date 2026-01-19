<?php
session_name('bumpr');
session_start();
?>

<header>
<div class="logo"><h1>bumper</h1></div>
<div class="nutzer">
    <?php
        if (isset($_SESSION['user'])) {
            echo "<a href='logout.php'>" .$_SESSION['user'] ."</a>";
        }
    ?>
</div>

</header>

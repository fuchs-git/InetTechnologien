
<form action="function.php" method="post">
    <input type="text" name="username" id="username" placeholder="Benutzername"><br>
    <input type="password" name="password" id="password" placeholder="Password"><br>
    <input type="submit" value="Anmelden">
    <?php
    if (isset($_SESSION['auth']) && $_SESSION['auth'] === false) {
        echo '<p style="color: #dd0000">Anmeldung fehlgeschlagen!</p>';
        unset($_SESSION['auth']);
    }
    ?>
</form>

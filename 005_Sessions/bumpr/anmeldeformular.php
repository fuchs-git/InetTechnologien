<?php
session_name('bumpr');
session_start();
?>
<form action="function.php" method="post">
    <input type="text" name="username" id="username" placeholder="Benutzername"><br>
    <input type="password" name="password" id="password" placeholder="Password"><br>
    <input type="submit" value="Anmelden">
</form>

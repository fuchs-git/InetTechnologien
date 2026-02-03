<?php
require("nav.php");
$name = null;
$pass = null;
$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["name"]) && !empty($_POST["pass"]) && !str_contains($_POST["pass"], ";") && !str_contains($_POST["name"], ";")) {
        $name = trim($_POST["name"]);
        $pass = $_POST["pass"];
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

        $line = $name . ';' . $pass_hash . PHP_EOL;

        file_put_contents("users.txt", $line, FILE_APPEND);
        $_SESSION["auth"] = true;
        $_SESSION["name"] = $name;
        header("Location: index.php");
    }
    else {
        $name = trim($_POST["name"]);
        $error = "Hallo $name, bitte alle Felder ausfüllen :-) Und verwende auch kein ';' sonst kracht hier alles zusammen!";
    }
}
?>
<body>


<?php if ($error): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<div>
    <form method="post" id="register">
        <input type="text" name="name" id="name" placeholder="Name"><br>
        <input type="password" name="pass" id="pass" placeholder="Password"><br>
        <input type="submit" name="submit" id="submit" value="Registrieren">
    </form>
</div>
</body>
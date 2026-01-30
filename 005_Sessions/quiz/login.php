<?php
require("nav.php");
$name = null;
$pass = null;
$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["name"]) && !empty($_POST["pass"]) && !str_contains($_POST["pass"], ";") && !str_contains($_POST["name"], ";")) {
        $name = trim($_POST["name"]);
        $eingabe_pass = $_POST["pass"];

        $creds = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($creds as $line) {
            [$user, $pass] = explode(";", $line, 2);
            if ($name == $user && password_verify($eingabe_pass, $pass)) {
                $_SESSION["auth"] = true;
                $_SESSION["name"] = $user;
                header("Location: index.php");
            }
            else {
                $name = trim($_POST["name"]);
                $error = "Hallo $name, es scheint so als könntest du dir nichts merken!";
            }
        }
        $_SESSION["auth"] = true;
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
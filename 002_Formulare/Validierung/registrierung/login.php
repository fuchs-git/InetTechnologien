<!doctype html>
<html lang="de">
<head>
    <title>Interner Bereich</title>
</head>
<body>

<h1>Interner Bereich</h1>

<h1>$_POST</h1>
<pre>
    <?php
    print_r($_POST);
    ?>
</pre>
<!--Nutzerdaten-->
<?php
$users = [
    'john' => [
        'password' => 'pass123',
        'email' => 'john@abc.de'
    ],
    'jack' => [
        'password' => 'pass321',
        'email' => 'jack@abc.de']
];
?>

<?php
// Passwortprüfung
function komplex($zeichenkette){
    $kompl = false;
    // Prüfe ob in Zeichenkette mindestens eine Ziffer ist
    foreach (str_split('0123456789') as $zeichen )
        if (str_contains($zeichenkette,$zeichen)) {
            $kompl = true;
            break;
        }
    if (!$kompl) return false;

    // Prüfe ob in der Zeichenkette mindestens ein Buchstabe ist
    foreach (str_split('qwertzuiopüasdfghjklöäyxcvbnm') as $zeichen )
        if (str_contains(strtolower($zeichenkette),$zeichen)) {
            $kompl = true;
            break;
        }
    if (!$kompl) return false;

    // Prüfe ob in der Zeichenkette mindestens ein Sonderzeichen ist
    foreach (str_split('-_.:,;<>|!"§$%&/()=?`´^°#~@€µ[]{}\"\\\'') as $zeichen )
        if (str_contains($zeichenkette,$zeichen)) {
            $kompl = true;
            break;
        }
    return $kompl;
}
{

}

?>



<?php
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'login') {
        if (isset($_POST['name'], $_POST['password']) &&
                isset($users[$_POST['name']]) &&
                $_POST['password'] == $users[$_POST['name']]['password']) {
            echo "<h1>Login erfolgreich</h1>\n";
        }
        else {
            echo "<h1>Login fehlgeschlagen</h1>\n";
        }
    }

    else if ($_GET['type'] == 'register') {
        if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['password2']) &&
                strlen($_POST['name']) >3  &&

                strlen($_POST['password']) >7  &&
                komplex($_POST['password']) &&

                $_POST['password'] == $_POST['password2']) {
            echo "<h1>Erfolgreich registriert</h1>\n";
        }
        else {
            echo "<h1>Registrierung fehlgeschlagen</h1>\n";
        }
    }
}
?>

</body>
</html>
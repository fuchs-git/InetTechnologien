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

    }
}
?>

</body>
</html>
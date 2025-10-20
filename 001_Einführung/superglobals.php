Superglobals sind spezielle vordefinierte Variablen in PHP, die immer und überall im Code zugänglich sind <br>
<?php
session_start();
if (!isset($_SESSION['sitzungen']))
    $_SESSION['sitzungen'] = [];
$_SESSION['sitzungen'][] = 'ein Eintrag';

?>


<pre>
<?php
echo $_SERVER['SERVER_NAME']; // Gibt den Namen des Servers aus<br/>
echo $_SERVER['REMOTE_ADDR']; // Gibt die IP-Adresse des Clients aus
?>
</pre>

<h1>$_SERVER</h1>
<pre>
    <?php
    print_r($_SERVER);
    ?>
</pre>




<h1>$_GET</h1>
<pre>
    <?php
    echo $_GET['name']; // Gibt "John" aus
    echo $_GET['age'];  // Gibt "30" aus
    print_r($_GET);
    ?>
</pre>


<h1>$_POST</h1>
<pre>
    <?php
    echo $_COOKIE['user'];  // Gibt den Wert des 'user'-Cookies aus);
    ?>
</pre>


<h1>$_COOKIE</h1>
<pre>
    <?php
    print_r($_COOKIE);
    ?>
</pre>

<h1>$_SESSION</h1>
<pre>
    <?php
    session_start(); // Startet die Sitzung<br/>
    echo $_SESSION['user_id'];  // Gibt die 'user_id'-Session-Variable aus
    print_r($_SESSION);

    // letztes element
    echo end($_SESSION['sitzungen']);

    ?>
</pre>

<h1>$_ENV</h1>
<pre>
    <?php
    print_r($_ENV);
    ?>
</pre>
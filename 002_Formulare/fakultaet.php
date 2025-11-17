<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fakultaet</title>
</head>
<body>
<?php
$zahl = $_GET['zahl'] ?? '';
?>

<form action="">
    <input type="text" name="zahl" value=<?= htmlspecialchars($zahl) ?> >
    <br>
    <button type="submit">Fakultät berechnen</button>
</form>
<br>

<?php

function fakulty($zahl): int
{
    if ($zahl <=1)
        return 1;
    return $zahl*fakulty($zahl-1);
}

if ($zahl !== '') {
    echo "Fakultät: " . fakulty(+$zahl);
}
?>

</body>
</html>
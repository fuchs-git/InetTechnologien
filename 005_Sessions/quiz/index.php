<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>ACL Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require("nav.php");
if ($_SESSION['auth']){
    echo <<<END
<div id="tabelle">
<table>
<tr>
<td><img src="img/Beginner.png">\nBeginner</td>
<td><img src="img/Medium.png">\nMedium</td>
<td><img src="img/Expert.png">\nWell done!</tr>
</tr>
</table>
</div>
END;


} else {
    echo <<<END
<article>
<h1>Willkommen beim ACL-Quiz.</h1>
Access Control Lists gehören zu den Themen, bei denen man meint, man hätte sie verstanden –<br>
bis die erste Regel plötzlich alles blockiert. Oder nichts. Oder beides.<br>
<br>
<h2>Achtung Korrekturfaktor:</h2>
Als unangemeldeter Nutzer kannst du das Quiz leider nicht durchführen.
Melden dich an, um dein Wissen zu testen und finde heraus,<br>
<strong>ob du ACLs wirklich beherrschst – oder sie dich.</strong>
</article>
END;
}

?>
</body>
</html>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>ACL Quiz</title>
</head>
<body>
<?php
require("nav.php");
if ($_SESSION['auth']){

} else {
    echo <<<END
<article>
<h1>Willkommen beim ACL-Quiz.</h1>
Access Control Lists gehören zu den Themen, bei denen man meint, man hätte sie verstanden –
bis die erste Regel plötzlich alles blockiert. Oder nichts. Oder beides.<br>
Dieses Quiz richtet sich an alle, die wissen wollen, ob ihr ACL-Wissen wirklich sitzt oder ob sie bislang nur davon ausgegangen sind, dass „deny any“ schon irgendwie regelt, was geregelt werden muss.
<br><br>
<h2>Achtung Korrekturfaktor:</h2>
Als unangemeldeter Nutzer kannst du das Quiz leider nicht durchführen.
Melden dich an, um dein Wissen zu testen und finde heraus,
ob du ACLs wirklich beherrschst – oder sie dich.
</article>
END;
}

?>
</body>
</html>
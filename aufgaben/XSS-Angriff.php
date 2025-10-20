<?php

// echo "hallo " . $_GET['name'];
// http://localhost/InetTechnologien/aufgaben/XSS-Angriff.php?name=%3Cscript%3Ealert(1)%3C/script%3E

echo "hallo " . htmlspecialchars($_GET['name']);

?>

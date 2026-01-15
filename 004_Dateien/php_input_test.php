<form action="" method="post">
    <input type="text" name="key_1" value="Testdaten_1">
    <input type="text" name="key_2" value="Testdaten_2">
    <button>Senden</button>
</form>

<?php
// Wurde das Formular abgesendet, erhält man eine Ausgabe
echo file_get_contents('php://input'); // Ausgabe von: key_1=Testdaten_1&key_2=Testdaten_2


echo "<br><br><pre>";
print_r($_POST);
echo "</pre>";
?>
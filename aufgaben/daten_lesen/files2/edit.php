<?php
echo "<h2>" . basename($filename) . "</h2>";

$filedata = file_get_contents($filename);
?>

<form method="POST" action="index.php">
    <textarea name="text" rows="20" cols="150"><?php echo $filedata; ?></textarea><br>
    <input type="hidden" value="<?php echo $filename; ?>" name="filename">
    <button type="submit" name="action" value="save">Speichern</button>
    <a href="index.php" style="margin-left: 10px;">Abbrechen</a>
</form>
<h2>Dateien im Verzeichnis</h2>

<div style="margin-bottom: 20px; border: 1px solid black;  width: 350px; box-shadow: rgba(30, 30, 30, 50%) 5px 5px 5px; padding: 5px;">

    <form method="POST" action="">
        <?php
        foreach ($files as $key => $file) {
            if ($file === "..")
                echo "<input type='radio' id='{$key}' name='filename' value='" . dirname($filename) . "' >";
            else
                echo "<input type='radio' id='{$key}' name='filename' value='{$file}' >";

            if (is_file($file))
                echo "<label for='{$key}' style='font-weight: bold; color: #0056b3;' >📄" . basename($file) . "</label><br>";
            elseif ($file === "..")
                echo "<label for='{$key}' style='font-weight: bold; color: #030303;'>↗️" . basename($file) . "</label><br>";
            else
                echo "<label for='{$key}' style='font-weight: bold; color: #030303;'>📁" . basename($file) . "</label><br>";
        }
        ?>

        <br>
        <button type="submit" name="action" value="open">Öffnen</button>
        <button type="submit" name="action" value="delete">Löschen</button>
    </form>

</div>

<hr>

<div style="margin-top: 20px; border: 1px dashed #060606; width: 350px; padding: 10px; background-color: #eef;">
    <b>Neue Datei anlegen</b>
    <form method="POST" action="index.php">
        <input type="text" name="filename" placeholder="Dateiname" required>
        <input type="hidden" name="directory" value="<?php echo $filename; ?>">
        <button type="submit" name="action" value="create">Anlegen</button>
    </form>
</div>
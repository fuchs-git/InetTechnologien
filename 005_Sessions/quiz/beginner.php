<?php
include("nav.php");
$fragen = file('beginner.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$akt_frage = 1;
$options = [];
foreach ($fragen as $line) {
    [$nr, $type, $frage, $opt1, $opt2, $opt3, $opt4, $correct] = explode(";", $line, 8);
    $options = [$opt1, $opt2, $opt3, $opt4];
}
?>


<div class="frage">

    <?php
    foreach ($fragen as $line) {
        [$nr, $type, $frage, $opt1, $opt2, $opt3, $opt4, $correct] = explode(";", $line, 8);
           if ((int)$nr == $akt_frage) {
               echo "<h1>$frage</h1>\n";
               echo "<form method='post'>";
               if ($type == 'rb'){
                   for ($i = 0; $i < 4; $i++) {
                       echo "<input type='radio' name='opt1' value='$i'>$options[$i]<br>";

                   }

               }
           }
    }
    ?>

</form>
</div>




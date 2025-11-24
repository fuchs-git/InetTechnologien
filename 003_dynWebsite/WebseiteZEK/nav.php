<?php
$page = $_GET["page"] ?? '';
$seiten = ['zuckerwerk', 'eis', 'kuchen', 'geschäft', 'unternehmen'];

echo '<nav>';
echo '<ul>';
foreach ($seiten as $seite) {
    if ($page == $seite) {
        $label = ucfirst($seite);
        echo "<li><a href='?page=$seite' class='active'>$label</a></li>";
    }
    else {
        $label = ucfirst($seite);
        echo "<li><a href='?page=$seite'>$label</a></li>";
    }
}
echo '</ul>';
echo '</nav>';
?>
<?php
$page = $_GET["page"] ?? '';
$seiten = ['zuckerwerk', 'eis', 'kuchen', 'geschäft', 'unternehmen'];
?>

<nav>
    <ul>
        <?php
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
        ?>
</ul>
</nav>

<main>
    <?php
    $page = $_GET['page'] ?? '';

    switch ($page) {
        case 'erde':
            require 'inhalte/erde.html';
            break;
        case 'mars':
            require 'inhalte/mars.html';
            break;
        default:
            # Auch bei unsinnigem Query-Strings
            # wird die Startseite eingebunden
            require 'inhalte/sonnensystem.html';
    }
    ?>
</main>
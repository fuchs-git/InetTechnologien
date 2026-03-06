<?php



if (isset($_GET['suche'])) {

    echo json_encode(["antwort" => $_GET['suche']]);

}
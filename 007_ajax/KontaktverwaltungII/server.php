<?php
if (isset($_GET['neuer_kontakt'])) {
    $data = json_decode(file_get_contents('php://input'), true);

//    $line = $data['nachname'] . ';' . $data['vorname'];

    $newContact = '';
    foreach ($data as $key => $value) {
        $newContact .= str_replace(';', ',', $value) . ';';
    }
    $newContact .= substr($newContact, 0, -1) . "\r\n";

    $result = file_put_contents('contacts.csv', $newContact, FILE_APPEND | LOCK_EX);

    if ($result) {
        echo json_encode(["success" => true]);
    } else
        echo json_encode(["success" => false]);
} elseif (isset($_GET['name_abrufen'])) {
    $data = file_get_contents('contacts.csv');

    if ($data === false) {
        echo json_encode(["success" => false]);
        return;
    } else {
        $namen = [];

        foreach (explode("\n", $data) as $line) {
            if ($line == '')
                continue;

            $contact = explode(';', $line);
            $namen[] = [$contact[0], $contact[1]];
        }

        echo json_encode($namen);
    }
} elseif (isset($_GET['details_abrufen'])) {
    $data = file_get_contents('contacts.csv');
    $name = $_GET['details_abrufen'];

    if ($data === false) {
        echo json_encode(["success" => false]);
        return;
    } else {
        $details = [];

        foreach (explode("\n", $data) as $line) {
            if ($line == '')
                continue;

            $contact = explode(';', $line);

            if ( $name == $contact[0] . ' ' . $contact[1] ) {
                $details[] = [$contact[0], $contact[1], $contact[2], $contact[3], $contact[4], $contact[5]];
                echo json_encode($details);
                return;
            }
        }

        echo json_encode(["not found" => true]);
    }
}
?>
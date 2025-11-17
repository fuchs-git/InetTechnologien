<?php
// Beispiel 1: Validierung einer Ganzzahl (Integer)
$wert1 = "42";
if (filter_var($wert1, FILTER_VALIDATE_INT) !== false) {
    echo "Beispiel 1: '$wert1' ist eine gültige Ganzzahl.<br>";
} else {
    echo "Beispiel 1: '$wert1' ist keine gültige Ganzzahl.<br>";
}

// Beispiel 2: Validierung einer Float-Zahl
$float = "15.5";
if (filter_var($float, FILTER_VALIDATE_FLOAT) !== false) {
    echo "Beispiel 2: '$float' ist eine gültige Float-Zahl.<br>";
} else {
    echo "Beispiel 2: '$float' ist keine gültige Float-Zahl.<br>";
}

// Beispiel 3: Verwendung von Optionen und Flags für Ganzzahlen
$intValue = "25";
// Prüft, ob der Wert eine Ganzzahl ist und im Bereich von 10 bis 50 liegt
$options = array(
    "options" => array(
        "min_range" => 10,
        "max_range" => 50
    )
);
if (filter_var($intValue, FILTER_VALIDATE_INT, $options) !== false) {
    echo "Beispiel 3: '$intValue' ist eine gültige Ganzzahl im Bereich von 10 bis 50.<br>";
} else {
    echo "Beispiel 3: '$intValue' ist keine gültige Ganzzahl im Bereich von 10 bis 50.<br>";
}

// Beispiel 4: Validierung einer E-Mail-Adresse
$email = "user@example.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
    echo "Beispiel 4: '$email' ist eine gültige E-Mail-Adresse.<br>";
} else {
    echo "Beispiel 4: '$email' ist keine gültige E-Mail-Adresse.<br>";
}

// Beispiel 5: Validierung einer URL
$url = "https://www.example.com";
if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
    echo "Beispiel 5: '$url' ist eine gültige URL.<br>";
} else {
    echo "Beispiel 5: '$url' ist keine gültige URL.<br>";
}

// Beispiel 6: Validierung einer IP-Adresse (IPv4)
$ip = "192.168.1.1";
if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false) {
    echo "Beispiel 6: '$ip' ist eine gültige IPv4-Adresse.<br>";
} else {
    echo "Beispiel 6: '$ip' ist keine gültige IPv4-Adresse.<br>";
}

// Beispiel 7: Validierung einer IP-Adresse (IPv6)
$ip6 = "2001:0db8:85a3:0000:0000:8a2e:0370:7334";
if (filter_var($ip6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false) {
    echo "Beispiel 7: '$ip6' ist eine gültige IPv6-Adresse.<br>";
} else {
    echo "Beispiel 7: '$ip6' ist keine gültige IPv6-Adresse.<br>";
}

// Beispiel 8: Validierung einer URL mit spezifischen Flags
$url2 = "https://example.com"; // Ohne Pfad
if (filter_var($url2, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED) !== false) {
    echo "Beispiel 8: '$url2' ist eine gültige URL mit einem Pfad.<br>";
} else {
    echo "Beispiel 8: '$url2' ist keine gültige URL mit einem Pfad.<br>";
}
?>
<?php
// Überprüfung, ob die Benutzername und Passwort über Basic Authentication gesetzt wurden und Authentifizierungsaufforderung gesendet

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {

    header('WWW-Authenticate: Basic realm="Mein geschützter Bereich"');
    header('HTTP/1.0 401 Unauthorized'); //ohne gültige Daten verweigern
    exit;
} else {
    // Wenn die Benutzerdaten vorhanden sind, überprüfen, ob sie den erwarteten Werten entsprechen
    if ($_SERVER["PHP_AUTH_USER"] !== 'Admin' || $_SERVER["PHP_AUTH_PW"] !== 'Admin') {
        header('Location: Fehler.php');
        exit;
    }
}
?>
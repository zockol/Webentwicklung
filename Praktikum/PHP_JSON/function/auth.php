<?php
function authenticate($username, $password) {
    $file = '../json/user.json';

    // Überprüfe, ob die Datei existiert
    if (!file_exists($file)) {
        return false; // Datei existiert nicht
    }

    // Lade und dekodiere die JSON-Daten
    $json_data = file_get_contents($file);
    $users = json_decode($json_data, true);

    // Überprüfe, ob die Dekodierung erfolgreich war
    if ($users === null) {
        return false; // Fehler beim Dekodieren
    }

    // Überprüfe die Benutzerinformationen
    foreach ($users as $user) {
        if ($user['email'] === $username && $user['pass'] === $password) {
            return true; // Benutzername und Passwort stimmen überein
        }
    }

    return false; // Kein Benutzer gefunden
}
?>

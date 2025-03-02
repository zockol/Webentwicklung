<?php
session_start();

require 'auth.php'; // Authentifizierungslogik

$error = '';

// Verarbeite Registrierung
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reg_username']) && isset($_POST['reg_password'])) {
    $username = $_POST['reg_username'];
    $password = $_POST['reg_password'];

    $file = '../json/user.json';

    // Erstellen der JSON-Datei, falls sie nicht existiert
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([]));
    }

    // Überprüfe, ob die Datei existiert
    if (!file_exists($file)) {
        return false; // Datei existiert nicht
    }

    // Lade und dekodiere die JSON-Daten
    $json_data = file_get_contents($file);
    $users = json_decode($json_data, true);

    foreach ($users as $user) {
        if ($user['email'] === $username) {
            echo "Email bereits registriert";
            exit;
        }
    }

    // Neuen Benutzer zur Liste hinzufügen
    $new_user = [
        'email' => $username,
        'pass' => $password  // Du solltest hier eigentlich `password_hash()` verwenden
    ];

    $users[] = $new_user; // Füge den neuen Benutzer zur bestehenden Benutzerliste hinzu

    // Speichere die aktualisierte Liste zurück in die JSON-Datei
    $new_json_data = json_encode($users, JSON_PRETTY_PRINT);
    
    if (file_put_contents($file, $new_json_data)) {
        echo "Registrierung erfolgreich!";
        header("Location: login.php");
    } else {
        echo "Fehler beim Speichern des Benutzers.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrieren</title>
</head>
<body>
    <?php if ($error) echo "<p>$error</p>"; ?>

    <!-- Registrierungsformular -->
    <h2>Registrierung</h2>
    <form method="post">
        <label for="reg_username">Email:</label>
        <input type="email" id="reg_username" name="reg_username" required>
        <br>
        <label for="reg_password">Passwort:</label>
        <input type="password" id="reg_password" name="reg_password" required>
        <br>
        <input type="submit" name="register" value="Registrieren">
    </form>
    
    <p><a href="login.php">Zurück zum Login</a></p>
</body>
</html>

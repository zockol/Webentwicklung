
<?php

// Verarbeite Registrierung
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    $username = $_POST['email'] ?? '';
    $password = $_POST['pass'] ?? '';

    $file = '../json/user.json';

    // Überprüfe, ob die Datei existiert
    if (!file_exists($file)) {
        return false; // Datei existiert nicht
    }

    // Lade und dekodiere die JSON-Daten
    $json_data = file_get_contents($file);
    $users = json_decode($json_data, true);

    foreach ($users as &$user) {
        if ($user['email'] === $username) {
            $user['pass'] = $password;  // Du solltest hier eigentlich `password_hash()` verwenden
            $email_found = true;
            break; // Beende die Schleife, wenn der Benutzer gefunden wurde
        }
    }

    // Wenn die E-Mail gefunden wurde, aktualisiere die JSON-Datei
    if ($email_found) {
        // Speichere die aktualisierte Benutzerliste zurück in die JSON-Datei
        $new_json_data = json_encode($users, JSON_PRETTY_PRINT);
        
        if (file_put_contents($file, $new_json_data)) {
            echo "Passwort erfolgreich zurückgesetzt.";
            header("Location: login.php");
            exit;
        } else {
            echo "Fehler beim Speichern der Daten.";
        }
    } else {
        echo "Email wurde nicht gefunden.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Passwort vergessen</title>
</head>
<body>
    <h2>Passwort vergessen</h2>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Neues Passwort:</label>
        <input type="password" id="pass" name="pass" required>
        <br>
        <input type="submit" name="reset" value="Passwort zurücksetzen">
    </form>
    
    <p><a href="login.php">Zurück zum Login</a></p>
</body>
</html>

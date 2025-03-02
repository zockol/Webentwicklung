<?php
session_start();

require 'auth.php'; // Authentifizierungslogik

// Wenn der Benutzer bereits eingeloggt ist, weiterleiten
if (isset($_SESSION['user_id'])) {
    header('Location: index.php'); // Weiterleitung zur Hauptseite
    exit();
}

$error = '';

// Verarbeite Login-Anfrage
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (authenticate($username, $password)) {
        $_SESSION['user_id'] = $username;
        header('Location: ../index.php');
        exit();
    } else {
        $error = "Falscher Benutzername oder Passwort.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php if ($error) echo "<p>$error</p>"; ?>

    <!-- Login-Formular -->
    <h2>Login</h2>
    <form method="post">
        <label for="username">Email:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Passwort:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" name="login" value="Anmelden">
    </form>

    <!-- Links für Registrierung und Passwort vergessen -->
    <p><a href="register.php">Registrieren</a></p>
    <p><a href="forgot_password.php">Passwort vergessen?</a></p>
</body>
</html>

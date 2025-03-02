<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ./function/login.php'); // Weiterleitung zur Login-Seite, wenn nicht eingeloggt
    exit();
}
?>

<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    // Redirect to the login page if not authenticated
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Index</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/stylesheet.css">
    </head>
    <header>Index</header>
    <body>
        <nav>
        <li><a href="MeineAntraege.php">1.Meine Antraege</a>
        <li><a href="NeuerAntrag.php">2.Neuer Antrag</a></li>
        <li><a href="index.php">3.Index</a></li>
        </nav>
        <main>
        Welcome to the Hompage
        </main>
        <script src="" async defer></script>
    </body>
    <footer>footer</footer>
</html>
<?php require("./function/session_check.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="alternate stylesheet" href="alternativ.css" title="Alternativ">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/locales/de.js'></script>
    <script src="./function/calender.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./abwesenheitsantraege.php">Abwesenheitsanträge</a></li>
                <li><a href="./Berichtsheft.php">Berichtsheft</a></li>
                <li><a href="./Berichtsheftgenerator.php">Berichtsheftgenerator</a></li>
                <li><a href="./Berufsschule.php">Berufsschule</a></li>
                <li><a href="./Taetigkeiten.php">Tätigkeiten</a></li>
                <li><a href="./function/logout.php">Logout</a></li>
              </ul>
        </nav>
    </header>
    <div class="content">
        <div id='calendar'></div>
    </div>


</body>
</html>
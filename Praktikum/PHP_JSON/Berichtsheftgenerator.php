
<?php require("./function/login.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <title>Berichtsheftgenerator</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="alternate stylesheet" href="alternativ.css" title="Alternativ">
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
    <form id="benutzerdaten">
        <label for="name">Vor- und Nachname</label>
        <input type="text" required="true" id="name">
        <label for="ausbildungsbezeichnung">Ausbildungsberufsbezeichnung</label>
        <input type="text" required="true" id="ausbildungsbezeichnung">
        <label for="ausbildungsabteilung">Ausbildungsabteilung</label>
        <input type="text" required="true" id="ausbildungsabteilung">
        <label for="startdatum">Startdatum</label>
        <input type="date" required="true" id="startdatum">
        <label for="enddatum">Enddatum</label>
        <input type="date" required="true" id="enddatum">
        <label for="firma">Firma</label>
        <input type="text" required="true" id="firma">
        <label for="ausbilder">Ausbilder</label>
        <input type="text" required="true" id="ausbilder">
        <button type="submit" form="benutzerdaten">Absenden</button>
        <button type="reset" form="benutzerdaten">Löschen</button>
    </form>
</body>
</html>
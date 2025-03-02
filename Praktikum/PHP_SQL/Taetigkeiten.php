<?php require("./function/login.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <title>Tätigkeiten</title>
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="alternate stylesheet" href="alternativ.css" title="Alternativ">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./abwesenheitsantraege.php">Abwesenheitsanträge</a></li>
                <li><a href="./Berichtsheft.php">Berichtsheft</a></li>
                <li>
                    <a href="./Berichtsheftgenerator.php">Berichtsheftgenerator</a>
                </li>
                <li><a href="./Berufsschule.php">Berufsschule</a></li>
                <li><a href="./Taetigkeiten.php">Tätigkeiten</a></li>
            </ul>
        </nav>
    </header>
    <form id="taetigkeiten">
        <label for="bezeichnung">Bezeichnung der Tätigkeit</label>
        <input type="text" required="true" id="bezeichnung" />
        <div id="activeinactive">
            <label><input type="radio" name="aktivoderinaktiv" /><span>Aktiv</span></label>
            <label><input type="radio" name="aktivoderinaktiv" /><span>Inaktiv</span></label>
        </div>
        <label for="Ranking">Ranking</label>
        <input type="ranking" id="ranking" />
        <label for="beginn">Beginn</label>
        <input type="date" id="beginn" />
        <label for="ende">Ende</label>
        <input type="date" id="ende" />
        <button type="submit" form="taetigkeiten">Absenden</button>
        <button type="reset" form="taetigkeiten">Löschen</button>
    </form>
</body>

</html>
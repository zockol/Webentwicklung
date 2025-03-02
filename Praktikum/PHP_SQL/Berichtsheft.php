<?php require("./function/login.php"); ?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <link href="./styles/print.css" media="print" rel="stylesheet" />
    <title>Berichtsheft</title>
    <link rel="stylesheet" href="./styles/style.css">
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
            </ul>
        </nav>
    </header>
    <div class="container">
        <header class="header">
            <h1>Ausbildungsnachweis</h1>
        </header>

        <div class="page-break"></div>

        <section class="personal_info">
            <h2>Persönliche Daten</h2>
            <div class="info">
                <p>Name: <span>xxx</span></p>
                <p>Ausbildungsabteilung: <span>IT-Abteilung</span></p>
                <p>Ausbildungsnachweis Nr.: <span>22</span> vom <span>xx.xx.xxxx</span> bis <span>xx.xx.xxxx</span></p>
                <p>Ausbildungsjahr: <span>3</span></p>
            </div>
        </section>

        <div class="page-break"></div>

        <section class="work_activities">
            <h2>Betriebliche Tätigkeiten</h2>
            <ul>
                <li>Installation eines SQL Adaptive Server Enterprise 11.3 für Testzwecke</li>
            </ul>
        </section>

        <div class="page-break"></div>

        <section class="Anweisungen">
            <h2>Unterweisungen, Lehrgespräche, betrieblicher Unterricht, sonstige Schulungen</h2>
            <ul>
                <li>Einrichtung einer USV, Datenschutz und Urheberrecht</li>
            </ul>
        </section>

        <div class="page-break"></div>

        <section class="Schule">
            <h2>Berufsschule (Unterrichtsthemen)</h2>
            <ul>
                <li>IT-Systeme: Hardwarekomponenten, elektrotechnische Grundkenntnisse</li>
            </ul>
        </section>

        <div class="page-break"></div>

        <footer class="footer">
            <div class="signatures">
                <p>Durch die nachfolgenden Unterschriften wird die Richtigkeit und Vollständigkeit der oben genannten
                    Angaben bestätigt.</p>
                <p>Datum: <span>xx.xx.xxxx</span></p>
                <p>Ausbildende/-r: <span>Unterschrift</span></p>
                <p>Ausbilder/-in: <span>Unterschrift</span></p>
                <p>Gesetzliche/-r Vertreter/-in: <span>Unterschrift</span></p>
            </div>
        </footer>
    </div>
</body>

</html>
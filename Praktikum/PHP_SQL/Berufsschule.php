<?php require("./function/login.php"); ?>
<?php require "./function/berufsschultabelle.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <title>Berufsschule</title>
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
              </ul>
        </nav>
    </header>
    <form id="berufsschule">
        <label>Beginn <input type="date" required="true" id="beginn"></label>
        <label>Ende <input type="date" required="true" id="ende"></label>
        <label>Unterrichtsthemen <input type="text" required="true" id="unterrichtsthemen"></label>
        <label id="schultage">Schultage</label>
        <div class="checkboxes">
            <label><input type="checkbox"><span>Montag</span></label>
            <label><input type="checkbox"><span>Dienstag</span></label>
            <label><input type="checkbox"><span>Mittwoch</span></label>
            <label><input type="checkbox"><span>Donnerstag</span></label>
            <label><input type="checkbox"><span>Freitag</span></label>
        </div>
        <button type="submit" form="berufsschule">Absenden</button>
        <button type="reset" form="berufsschule">Löschen</button>
    </form>

    <table>
        <tr>
            <th colspan="8">Berufsschule</th>
        </tr>
        <tr>
            <th>Beginn</th>
            <th>Ende</th>
            <th>Unterrichtsthemen</th>
            <th>Montag</th>
            <th>Dienstag</th>
            <th>Mittwoch</th>
            <th>Donnerstag</th>
            <th>Freitag</th>
        </tr>
        
        <tr>
        <?php foreach ($berufsschultabelle as $data): ?>
            <td><?php echo htmlspecialchars($data[0]); ?></td>
            <td><?php echo htmlspecialchars($data[1]); ?></td>
            <td><?php echo htmlspecialchars($data[2]); ?></td>
            <td><?php echo htmlspecialchars($data[3]); ?></td>
            <td><?php echo htmlspecialchars($data[4]); ?></td>
            <td><?php echo htmlspecialchars($data[5]); ?></td>
            <td><?php echo htmlspecialchars($data[6]); ?></td>
            <td><?php echo htmlspecialchars($data[7]); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
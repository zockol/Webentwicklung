<?php require './function/session_check.php'; ?>
<?php require("./function/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <title>Abwesenheit oder Urlaub</title>
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
    <form id="abwesenheit" action="./function/abwesenheitentabelle.php" method="post">
        <label for="name">Vor- und Nachname</label>
        <input type="text" required="true" name="name">
        <label for="typus">Abwesenheit/Urlaub</label>
        <select name="abwesenheit" name="abwesenheit">
            <option value="Krankheit">Krankheit</option>
            <option value="Urlaub">Urlaub</option>
            <option value="Sonstiges">Sonstiges</option>
        </select>
        <label for="beginn">Beginn</label>
        <input type="date" required="true" name="beginn">
        <label for="ende">Ende</label>
        <input type="date" required="true" name="ende">
        <label for="bezeichnung">Bezeichnung</label>
        <input type="text" required="true" name="bezeichnung">
        <button type="submit" name="submit" form="abwesenheit">Absenden</button>
        <button type="reset" form="abwesenheit">Löschen</button>
    </form>
    <table>
        <tr>
            <th colspan="6">Abwesenheitsliste</th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Typ</th>
            <th>Beginn</th>
            <th>Ende</th>
            <th>Bezeichnung</th>
            <th>Aktion</th>
        </tr>
        
        <?php
$jsonFilePath = './json/abwesenheitentabelle.json';
// Überprüfen, ob die JSON-Datei existiert
if (file_exists($jsonFilePath)) {
    // Lesen des Inhalts der JSON-Datei
    $jsonData = file_get_contents($jsonFilePath);
    $abwesenheiten = json_decode($jsonData, true);
    
    // Sortieren nach ID in absteigender Reihenfolge
    usort($abwesenheiten, function($a, $b) {
        return $b['id'] - $a['id'];
    });
    
    // Anzeigen der Einträge
    if (!empty($abwesenheiten)) {
        foreach ($abwesenheiten as $entry) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($entry["name"]) . '</td>';
            echo '<td>' . htmlspecialchars($entry["abwesenheit"]) . '</td>';
            echo '<td>' . htmlspecialchars($entry["beginn"]) . '</td>';
            echo '<td>' . htmlspecialchars($entry["ende"]) . '</td>';
            echo '<td>' . htmlspecialchars($entry["bezeichnung"]) . '</td>';
            echo '<td>
                    <form method="POST" name="delete" action="./function/abwesenheitentabelle.php" style="display:inline;">
                        <input type="hidden" name="id" value="' . htmlspecialchars($entry["id"]) . '">
                        <input type="submit" name="delete" value="Löschen">
                    </form>
                  </td>';
            echo '</tr>';
        }
    }
}
?>

</body>
</html>
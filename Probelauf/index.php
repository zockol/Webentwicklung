<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title>BMI Berechner</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="./index.html">Home</a></li>
            </ul>
        </nav>
    </header>
    <div class="formularbereich">
        <div class="akzenteins"><h1>Eingabebereich</h1></div>
        <form action="./berechnung.php" method="post" id="formular">
            <label for="name">Name</label>
            <input type="text" required="true" name="name">

            <label for="groeße">Größe in CM</label>
            <input type="number" required="true" name="groeße" step="1" min="0" max="250">
            
            <label for="gewicht">Gewicht in KG</label>
            <input type="number" required="true" name="gewicht" step="1" min="0" max="600">

            <select name="geschlecht">
                <option value="Männlich">Männlich</option>
                <option value="Weiblich">Weiblich</option>
            </select>
            
            <button type="submit" name="submit" form="formular">Absenden</button>
        </form>
    </div>

    <div class="akzenteins"><h1>Ergebnisbereich</h1></div>
    <table>
        <tr>
            <th>Name</th>
            <th>Größe</th>
            <th>Gewicht</th>
            <th>Geschlecht</th>
            <th>BMI</th>
            <th>Auswertung</th>
        </tr>

<?php
$jsonFilePath = './werte.json';
// Überprüfen, ob die JSON-Datei existiert
if (file_exists($jsonFilePath)) {
    // Lesen des Inhalts der JSON-Datei
    $jsonData = file_get_contents($jsonFilePath);
    $user = json_decode($jsonData, true);
    
    // Sortieren nach ID in absteigender Reihenfolge
    usort($user, function($a, $b) {
        return $b['id'] - $a['id'];
    });
    
    // Anzeigen der Einträge
    if (!empty($user)) {
        foreach ($user as $entry) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($entry["name"]) . '</td>';
            echo '<td>' . htmlspecialchars($entry["groeße"]) . '</td>';
            echo '<td>' . htmlspecialchars($entry["gewicht"]) . '</td>';
            echo '<td>' . htmlspecialchars($entry["geschlecht"]) . '</td>';
            echo '<td>' . htmlspecialchars($entry["bmi"]) . '</td>';
            echo '<td>' . htmlspecialchars($entry["auswertung"]) . '</td>';
            echo '<td>
                    <form method="POST" name="delete" action="./berechnung.php" style="display:inline;">
                        <input type="hidden" name="id" value="' . htmlspecialchars($entry["id"]) . '">
                        <input type="submit" name="delete" value="Löschen">
                    </form>
                  </td>';
            echo '</tr>';
        }
    }
}
?>
    </table>

    <div class="akzenteins"><h1>Statistikbereich</h1></div>
    <table>
        <tr>
            <td></td>
            <td>BMI männlich</td>
            <td>BMI weiblich</td>
        </tr>
        <tr>
            <td>Untergewicht</td>
            <td>Unter 20</td>
            <td>Unter 19</td>
        </tr>
        <tr>
            <td>Normalgewicht</td>
            <td>20-25</td>
            <td>19-24</td>
        </tr>
        <tr>
            <td>Übergewicht</td>
            <td>26-30</td>
            <td>25-30</td>
        </tr>
        <tr>
            <td>Adipositas</td>
            <td>31-40</td>
            <td>31-40</td>
        </tr>
        <tr>
            <td>starke Adipositas</td>
            <td>größer 40</td>
            <td>größer 40</td>
        </tr>
    </table>

    <div class="akzentzwei"><h1>Infobereich</h1></div>
    <div class="infobereich">
        <ul>
            <li>Der BMI wird berechnet durch BMI = (Körpergewicht)/(Körpergröße²)</li>
            <li>Das hier ist Absatz 2, Lorem Ipsum und sowas könnte hier stehen</li>
            <li>Also ich empfinde diese Klausur als schwer</li>
            <li><img src="./image.png" alt="bild"></li>
        </ul>
    </div>



    <footer>Webentwicklung I. Alle Rechte vorbehalten</footer>
</body>
</html>
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

    <div class="main-container">
        <div class="left-column">
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
            
        </div>

        <div class="left-column">
        <h1 class="akzenteins">Statistikbereich</h1>
        <table>
            <tr>
                <td></td>
                <td>BMI männlich</td>
                <td>BMI weiblich</td>
            </tr>
            <?php
            // Initialisierung der Zählvariablen
            $maleUnderweight = $femaleUnderweight = 0;
            $maleNormal = $femaleNormal = 0;
            $maleOverweight = $femaleOverweight = 0;
            $maleObese = $femaleObese = 0;
            $maleSeverelyObese = $femaleSeverelyObese = 0;

            if (file_exists($jsonFilePath)) {
                $jsonData = file_get_contents($jsonFilePath);
                $user = json_decode($jsonData, true);

                foreach ($user as $entry) {
                    $bmi = $entry["bmi"];
                    $geschlecht = $entry["geschlecht"];

                    if ($geschlecht == "Männlich") {
                        if ($bmi < 20) $maleUnderweight++;
                        elseif ($bmi >= 20 && $bmi <= 25) $maleNormal++;
                        elseif ($bmi >= 26 && $bmi <= 30) $maleOverweight++;
                        elseif ($bmi >= 31 && $bmi <= 40) $maleObese++;
                        else $maleSeverelyObese++;
                    } elseif ($geschlecht == "Weiblich") {
                        if ($bmi < 19) $femaleUnderweight++;
                        elseif ($bmi >= 19 && $bmi <= 24) $femaleNormal++;
                        elseif ($bmi >= 25 && $bmi <= 30) $femaleOverweight++;
                        elseif ($bmi >= 31 && $bmi <= 40) $femaleObese++;
                        else $femaleSeverelyObese++;
                    }
                }
            }

            echo '<tr>
                    <td>Untergewicht</td>
                    <td>Unter 20: ' . $maleUnderweight . '</td>
                    <td>Unter 19: ' . $femaleUnderweight . '</td>
                  </tr>';
            echo '<tr>
                    <td>Normalgewicht</td>
                    <td>20-25: ' . $maleNormal . '</td>
                    <td>19-24: ' . $femaleNormal . '</td>
                  </tr>';
            echo '<tr>
                    <td>Übergewicht</td>
                    <td>26-30: ' . $maleOverweight . '</td>
                    <td>25-30: ' . $femaleOverweight . '</td>
                  </tr>';
            echo '<tr>
                    <td>Adipositas</td>
                    <td>31-40: ' . $maleObese . '</td>
                    <td>31-40: ' . $femaleObese . '</td>
                  </tr>';
            echo '<tr>
                    <td>starke Adipositas</td>
                    <td>größer 40: ' . $maleSeverelyObese . '</td>
                    <td>größer 40: ' . $femaleSeverelyObese . '</td>
                  </tr>';
            ?>
        </table>
        </div>
        
        <div class="infobereich">
            <h1 class="akzentzwei">Infobereich</h1>
                <ul>
                    <li>Der BMI wird berechnet durch BMI = (Körpergewicht)/(Körpergröße²)</li>
                    <li>Das hier ist Absatz 2, Lorem Ipsum und sowas könnte hier stehen</li>
                    <li>Also ich empfinde diese Klausur als schwer</li>
                    <li><img src="./image.png" alt="bild"></li>
                </ul>
        </div>

    </div>

    <footer>Webentwicklung I. Alle Rechte vorbehalten</footer>
</body>
</html>
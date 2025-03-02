<?php
$jsonFilePath = './werte.json';
// Hier wird das Formular verarbeitet

function berechnung($groeße, $gewicht, $geschlecht) {

    $BMI = floor($gewicht / ($groeße/100 * $groeße/100));

    if ($geschlecht == "Männlich") {
        switch ($BMI) {
            case $BMI < 20:
                return [$BMI, "Untergewichtig"];
            case $BMI >= 20 && $BMI < 26:
                return [$BMI, "Normalgewicht"];
            case $BMI >= 26 && $BMI < 31:
                return [$BMI, "Übergewicht"];
            case $BMI >= 31 && $BMI < 41:
                return [$BMI, "Adipositas"];
            case $BMI >= 41:
                return [$BMI, "starke Adipositas"];
        }
    } else {
        switch ($BMI) {
            case $BMI < 19:
                return [$BMI, "Untergewichtig"];
            case $BMI >= 19 && $BMI < 24:
                return [$BMI, "Normalgewicht"];
            case $BMI >= 24 && $BMI < 31:
                return [$BMI, "Übergewicht"];
            case $BMI >= 31 && $BMI < 41:
                return [$BMI, "Adipositas"];
            case $BMI >= 41:
                return [$BMI, "starke Adipositas"];
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    
    // Erstellen der JSON-Datei, falls sie nicht existiert
    if (!file_exists($jsonFilePath)) {
        file_put_contents($jsonFilePath, json_encode([]));
    }
    
    // Lesen des aktuellen Inhalts der JSON-Datei
    $jsonData = file_get_contents($jsonFilePath);
    $Nutzer = json_decode($jsonData, true);

    $newId = count($Nutzer) > 0 ? max(array_column($Nutzer, 'id')) + 1 : 0;
    
    // Neue Einträge hinzufügen
    if (isset($_POST["name"]) && isset($_POST["groeße"]) && isset($_POST["gewicht"]) && isset($_POST["geschlecht"])) {

        $ergebnis = berechnung($_POST['groeße'], $_POST['gewicht'], $_POST['geschlecht']);

        $newEntry = [
            'id' => $newId,
            'name' => $_POST["name"],
            'groeße' => $_POST["groeße"],
            'gewicht' => $_POST["gewicht"],
            'geschlecht' => $_POST['geschlecht'],
            'bmi' => $ergebnis[0],
            'auswertung' => $ergebnis[1]
        ];
        
        $Nutzer[] = $newEntry;
        
        // JSON-Datei aktualisieren
        file_put_contents($jsonFilePath, json_encode($Nutzer));
        header("Location: ./index.php");
    } else {
        echo "Fehlende Eingabefelder";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    // Lesen des aktuellen Inhalts der JSON-Datei
    $jsonData = file_get_contents($jsonFilePath);
    $user = json_decode($jsonData, true);
    
    // ID des zu löschenden Eintrags
    $idToDelete = $_POST["id"];
    
    // Eintrag mit der angegebenen ID entfernen
    $user = array_filter($user, function($item) use ($idToDelete) {
        return $item['id'] != $idToDelete;
    });
    
    // Um sicherzustellen, dass die IDs im JSON-Dokument aufeinander folgen, können wir das Array neu indizieren
    $user = array_values($user);
    
    // JSON-Datei aktualisieren
    file_put_contents($jsonFilePath, json_encode($user));
    header("Location: ./index.php");
} else {
    echo "dramatic fail";
}
?>

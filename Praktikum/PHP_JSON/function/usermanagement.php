<?php
$jsonFilePath = '../json/user.json';
// Hier wird das Formular verarbeitet
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $jsonFilePath = '../json/user.json';
    
    // Erstellen der JSON-Datei, falls sie nicht existiert
    if (!file_exists($jsonFilePath)) {
        file_put_contents($jsonFilePath, json_encode([]));
    }
    
    // Lesen des aktuellen Inhalts der JSON-Datei
    $jsonData = file_get_contents($jsonFilePath);
    $user = json_decode($jsonData, true);

    $newId = count($user) > 0 ? max(array_column($user, 'id')) + 1 : 0;
    
    // Neue Einträge hinzufügen
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $newEntry = [
            'id' => $newId,
            'email' => $_POST["email"],
            'password' => $_POST["password"],
        ];
        
        $$user[] = $newEntry;
        
        // JSON-Datei aktualisieren
        file_put_contents($jsonFilePath, json_encode($user));
        header("Location: ../login.php");
    } else {
        echo "Fehlende Eingabefelder";
    }
}
?>

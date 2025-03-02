<?php
$jsonFilePath = '../json/abwesenheitentabelle.json';
// Hier wird das Formular verarbeitet
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $jsonFilePath = '../json/abwesenheitentabelle.json';
    
    // Erstellen der JSON-Datei, falls sie nicht existiert
    if (!file_exists($jsonFilePath)) {
        file_put_contents($jsonFilePath, json_encode([]));
    }
    
    // Lesen des aktuellen Inhalts der JSON-Datei
    $jsonData = file_get_contents($jsonFilePath);
    $abwesenheiten = json_decode($jsonData, true);

    $newId = count($abwesenheiten) > 0 ? max(array_column($abwesenheiten, 'id')) + 1 : 0;
    
    // Neue Einträge hinzufügen
    if (isset($_POST["name"]) && isset($_POST["abwesenheit"]) && isset($_POST["beginn"]) && isset($_POST["ende"]) && isset($_POST["bezeichnung"])) {
        $newEntry = [
            'id' => $newId,
            'name' => $_POST["name"],
            'abwesenheit' => $_POST["abwesenheit"],
            'beginn' => date_format(date_create($_POST["beginn"]),"d.m.Y"),
            'ende' => date_format(date_create($_POST["ende"]),"d.m.Y"),
            'bezeichnung' => $_POST["bezeichnung"]
        ];
        
        $abwesenheiten[] = $newEntry;
        
        // JSON-Datei aktualisieren
        file_put_contents($jsonFilePath, json_encode($abwesenheiten));
        header("Location: ../abwesenheitsantraege.php");
    } else {
        echo "Fehlende Eingabefelder";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    // Lesen des aktuellen Inhalts der JSON-Datei
    $jsonData = file_get_contents($jsonFilePath);
    $abwesenheiten = json_decode($jsonData, true);
    
    // ID des zu löschenden Eintrags
    $idToDelete = $_POST["id"];
    
    // Eintrag mit der angegebenen ID entfernen
    $abwesenheiten = array_filter($abwesenheiten, function($item) use ($idToDelete) {
        return $item['id'] != $idToDelete;
    });
    
    // Um sicherzustellen, dass die IDs im JSON-Dokument aufeinander folgen, können wir das Array neu indizieren
    $abwesenheiten = array_values($abwesenheiten);
    
    // JSON-Datei aktualisieren
    file_put_contents($jsonFilePath, json_encode($abwesenheiten));
    header("Location: ../abwesenheitsantraege.php");
}
?>

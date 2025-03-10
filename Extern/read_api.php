<?php 
header("Content-Type: application/json");
$path = __DIR__.'/data.json'; // Ensure the path points correctly to your data file

// Check if the data file exists and is readable
if (file_exists($path)) {
    $data = file_get_contents($path);
    $jsonData = json_decode($data, true);

    // Return the data as JSON
    echo json_encode($jsonData);
} else {
    // Return an error if the file does not exist
    echo json_encode(["error" => "Keine Daten verfügbar"]);
}
?>
<?php 
  $path = __DIR__ . '/data.json';
  $arr = [];

  // Retrieve POST data
  $startzeit = $_POST['start'] ?? '';
  $endzeit = $_POST['end'] ?? '';
  $bezeichnung = $_POST['title'] ?? '';
  $id = $_POST['id'] ?? ''; // Ensure the event ID is received

  if (file_exists($path)) {
      $text = file_get_contents($path);
      $arr = json_decode($text, true);
  }

  // Check if the event ID exists in the array
  $eventFound = false;
  foreach ($arr as &$event) {
      if ($event['id'] == $id) {
          $event['Startzeit'] = $startzeit;
          $event['Endzeit'] = $endzeit;
          $event['Bezeichnung'] = $bezeichnung;
          $eventFound = true;
          break;
      }
  }

  if (!$eventFound) {
      // If event not found, add it as a new event
      $newArr = [
          'id' => $id, // Include an ID for new event
          'Startzeit' => $startzeit,
          'Endzeit' => $endzeit,
          'Bezeichnung' => $bezeichnung
      ];
      $arr[] = $newArr;
  }

  file_put_contents($path, json_encode($arr, JSON_PRETTY_PRINT));
  echo json_encode($arr); // Return the updated array
?>
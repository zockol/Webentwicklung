<?php 
header("Content-Type: application/json");

$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case "POST":
        // Fetching the raw input data
        $rawData = trim(file_get_contents("php://input"));
        $arr = json_decode($rawData, true);

        // Checking if required fields are set
        if (isset($arr["startauszeit"]) && isset($arr["endauszeit"]) && isset($arr["bezeichnung"])) {
            $start = $arr["startauszeit"];
            $end = $arr["endauszeit"];
            $bez = $arr["bezeichnung"];
            $id = $arr["ID"];

            // Saving data to JSON and returning the response
            $response = put_data_in_json($start,$end,$bez,$id);
            echo $response;
        } else {
            // If required fields are missing
            echo json_encode(["error" => "Falsche Eingabedaten. Bitte stellen Sie sicher, dass alle erforderlichen Felder übergeben werden."]);
        }
        break;
    default:
        echo json_encode(["error" => "Falsche Eingabe oder falsches Formular!"]);
}

?>
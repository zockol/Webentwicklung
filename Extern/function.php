<?php 

function urlaubOrKrank($var){
    $var = intval($var);
    switch($var){
        case 1:
            return "Urlaub";
            break;
        case 2:
            return "Krank";
            break;
        case 3:
            return "Zeitausgleich";
            break;
        default:
        break;
    }
}

function put_data_in_json($startzeit,$endzeit,$bezeichnung,$id){
    $path = __DIR__ . '/data.json';
    $arr = [];

    if(file_exists($path)){
        $text = file_get_contents($path,true);
        $arr = json_decode($text);
    }

    $newArr = [
        'Startzeit' => $startzeit,
        'Endzeit' => $endzeit,
        'Bezeichnung' => $bezeichnung,
        'ID' => $id
    ];

    if(empty($arr)){
        $arr = [];
    }

    array_push($arr,$newArr);
    file_put_contents($path,json_encode($arr,JSON_PRETTY_PRINT));
    return json_encode($newArr);

}
?>
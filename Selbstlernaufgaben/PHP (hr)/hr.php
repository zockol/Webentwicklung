<?php

    function getGenderSymbol($gender) {
        switch($gender) {
            case 'm':
                return '&#128104;'; // Mann
            case 'w':
                return '&#128105;'; // Frau
            case 'd':
                return '🚁'; // Divers
            default:
                return 'Nicht angegeben'; // Kein Symbol verfügbar
            }
    }

    $person_a = ["Patrick", "Zockol", "20.03.2001", "m"];
    $person_b = ["Felix", "Grüning", "07.08.2000", "w"];
    $person_c = ["Wisam", "Faiun", "01.10.2001", "d"];
    $person_d = ["Moritz", "Scheck", "20.03.2003", ""];
    $array = [$person_a, $person_b, $person_c, $person_d];
?>
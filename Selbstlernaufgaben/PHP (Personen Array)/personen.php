

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Test</title>
</head>
<body>
    <?php
    $person_a = ["Patrick", "Zockol", "20.03.2001", "m"];
    $person_b = ["Felix", "Grüning", "07.08.2000", "w"];
    $person_c = ["Wisam", "Faiun", "01.10.2001", "d"];
    $person_d = ["Moritz", "Scheck", "20.03.2003", ""];
    $array = [$person_a, $person_b, $person_c, $person_d];

    //1 für nachname, 0 für vornamen sortierung
    // function sort_by_lastname($a, $b) {
    //     return strcmp($a[1], $b[1]);
    // }

    // uasort($array, 'sort_by_lastname');

    uasort($array, function($a, $b) {
        $tz  = new DateTimeZone('Europe/Brussels');
        $age_a = DateTime::createFromFormat('d.m.Y', $a[2], $tz)
                ->diff(new DateTime('now', $tz))
                ->y;
        $age_b = DateTime::createFromFormat('d.m.Y', $b[2], $tz)
                ->diff(new DateTime('now', $tz))
                ->y;

        return $age_b - $age_a;
    });

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

    ?>

    <?php if (empty($array)): ?>
        <p>Keine Personen vorhanden</p>
    <?php else:?>

    <table border="1">
        <tr>
            <td>Vorname</td>
            <td>Nachname</td>
            <td>Geburtstag</td>
            <td>Geschlecht</td>
        </tr>
        <?php foreach ($array as $person): ?>
        <tr>
            <td><?php echo htmlspecialchars($person[0]); ?></td>
            <td><?php echo htmlspecialchars($person[1]); ?></td>
            <td><?php echo htmlspecialchars($person[2]); ?></td>
            <td><?php echo getGenderSymbol(htmlspecialchars($person[3])); ?></td>
        </tr>
        
        <?php endforeach; ?>

    </table>
    <?php endif; ?>
    
</body>
</html>
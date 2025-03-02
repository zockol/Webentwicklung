

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Test</title>
</head>
<body>
    <?php

    require_once "./hr.php";

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

    ?>

    <?php if (empty($array)): ?>
        <p>Keine Personen vorhanden</p>
    <?php else:?>
        <?php include "./personendetails.php"?>
    <?php endif; ?>
    
    <?php include_once './komponenten/footer.php'; ?>
</body>
</html>
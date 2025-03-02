<?php require("./function/login.php"); ?>
<?php require("./function/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <title>Abwesenheit oder Urlaub</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="alternate stylesheet" href="alternativ.css" title="Alternativ">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./abwesenheitsantraege.php">Abwesenheitsanträge</a></li>
                <li><a href="./Berichtsheft.php">Berichtsheft</a></li>
                <li><a href="./Berichtsheftgenerator.php">Berichtsheftgenerator</a></li>
                <li><a href="./Berufsschule.php">Berufsschule</a></li>
                <li><a href="./Taetigkeiten.php">Tätigkeiten</a></li>
              </ul>
        </nav>
    </header>
    <form id="abwesenheit" action="./function/abwesenheitentabelle.php" method="post">
        <label for="name">Vor- und Nachname</label>
        <input type="text" required="true" name="name">
        <label for="typus">Abwesenheit/Urlaub</label>
        <select name="abwesenheit" name="abwesenheit">
            <option value="Krankheit">Krankheit</option>
            <option value="Urlaub">Urlaub</option>
            <option value="Sonstiges">Sonstiges</option>
        </select>
        <label for="beginn">Beginn</label>
        <input type="date" required="true" name="beginn">
        <label for="ende">Ende</label>
        <input type="date" required="true" name="ende">
        <label for="bezeichnung">Bezeichnung</label>
        <input type="text" required="true" name="bezeichnung">
        <button type="submit" name="submit" form="abwesenheit">Absenden</button>
        <button type="reset" form="abwesenheit">Löschen</button>
    </form>
    <table>
        <tr>
            <th colspan="6">Abwesenheitsliste</th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Typ</th>
            <th>Beginn</th>
            <th>Ende</th>
            <th>Bezeichnung</th>
            <th>Aktion</th>
        </tr>
        
        <?php
        $conn = getDbConnection();

        $sql = "SELECT `id`, `name`,`abwesenheit`,`beginn`,`ende`,`bezeichnung` FROM `abwesenheitsantraege` ORDER BY `ID` DESC";
        $result = mysqli_query($conn, $sql);


        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row["name"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["abwesenheit"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["beginn"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["ende"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["bezeichnung"]) . '</td>';
                    echo '<td><form method="POST" name="delete" action="./function/abwesenheitentabelle.php" style="display:inline;">
                    <input type="hidden" name="id" value="' . $row["id"] . '">
                    <input type="submit" name="delete" value="Löschen">
                  </form></td>';
                    echo '</tr>';
                }
            } else {
            }
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>
</body>
</html>
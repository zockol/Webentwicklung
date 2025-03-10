<?php
session_start();
// Check if the user is authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect to the login page if not authenticated
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Neuer Antrag</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/stylesheet.css">
</head>
<header>Neuer Antrag erstellen</header>

<body>
    <nav>
        <li><a href="MeineAntraege.php">1.Meine Antraege</a>
        <li><a href="NeuerAntrag.php">2.Neuer Antrag</a></li>
        <li><a href="index.php">3.Index</a></li>
    </nav>
    <main>
        <form action="NeuerAntrag.php" method="POST">
            <div class="Start-zeit-field">
                <label for="auszeit">Start: </label>
                <input type="date" name="startauszeit" id="startauszeit" required />
            </div>
            <div class="Ende-zeit-field">
                <label for="auszeit">Ende: </label>
                <input type="date" name="endauszeit" id="endauszeit" required />
            </div>
            <div class="Bezeichnung-field">
                <label for="bezeichnung">Urlaub oder Krank: </label>
                <select name="bezeichnung" id="bezeichnung">
                    <option value="1"> Urlaub </option>
                    <option value="2"> Krank </option>
                    <option value="3"> Zeitausgleich</option>
                </select>
            </div>
            <input class="button" type="submit" value="Senden">
        </form>

        <?php 
        include(__DIR__ . '/function.php');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['startauszeit']) &&  isset($_POST['endauszeit']) && isset($_POST['bezeichnung'])) {
                $primaryKey = !empty($existingData) ? max(array_keys($existingData)) + 1 : 1;
                $startZeit = $_POST['startauszeit'];
                $endZeit = $_POST['endauszeit'];
                $bezeichnung = $_POST['bezeichnung'];
                $bezeichnung = urlaubOrKrank($bezeichnung);
                put_data_in_json($startZeit,$endZeit,$bezeichnung,$primaryKey);
            }
        } else {
            $startZeit = " ";
            $endZeit = " ";
            $bezeichnung = " ";
        }
        ?>

        <table>
    <caption>
      <?php echo "tabelle"; ?>
    </caption>
    <thead>
      <tr>
        <th scope="col"> <?php echo "Bezeichnung"; ?></th>
        <th scope="col"> <?php echo "Zeitraum"; ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $bezeichnung ?></td>
        <td><?php echo "Vom " . $startZeit . " bis zum " . $endZeit ?></td>
      </tr>
    </tbody>
  </table>

    </main>
    <script src="" async defer></script>
    <footer>footer</footer>
</body>

</html>
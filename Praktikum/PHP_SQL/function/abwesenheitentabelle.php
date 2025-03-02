<?php
// Anfangswerte
    // $person_a = ["Patrick Zockol", "Urlaub", "30.07.2024", "08.08.2024", "türkei bro"];
    // $person_b = ["Felix Grüning", "Wunschfrei", "23.09.2024", "23.09.2024", "Tag vorher Linkin Park Konzert"];
    // $person_c = ["Wisam Faiun", "Urlaub", "01.01.2024", "01.01.2025", "Erholen von Klausurenphase"];

    // $abwesenheiten = [$person_a, $person_b, $person_c];
?>
<?php require("./config.php"); ?>
<?php
// Hier wird das Formular verarbeitet
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $conn = getDbConnection();
    if(isset($_POST["name"]) && isset($_POST["abwesenheit"]) && isset($_POST["beginn"]) && isset($_POST["ende"]) && isset($_POST["bezeichnung"])){
        $name = $_POST["name"];
        $abwesenheit = $_POST["abwesenheit"];
        $beginn = $_POST["beginn"];
        $ende = $_POST["ende"];
        $bezeichnung = $_POST["bezeichnung"];

        $sql = "INSERT INTO `abwesenheitsantraege`( `name`,`abwesenheit`,`beginn`,`ende`,`bezeichnung`) VALUES ('$name','$abwesenheit','$beginn','$ende', '$bezeichnung')";
        $query = mysqli_query($conn, $sql);
        if($query){
            header("Location: ../abwesenheitsantraege.php");
        }
        else{
            echo "Entry Failed" . mysqli_error($conn);;
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $conn = getDbConnection();

    $id = $_POST["id"];
    $sql = "DELETE FROM `abwesenheitsantraege` WHERE `id` = $id";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("Location: ../abwesenheitsantraege.php");
    }
    else{
        echo "Entry Failed" . mysqli_error($conn);;
    }
    
}
?>
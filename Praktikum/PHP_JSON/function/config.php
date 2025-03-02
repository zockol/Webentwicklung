<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'webentwicklung');
define('DB_USER', 'root');
define('DB_PASS', '');

function getDbConnection() {
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $connection;
}

function ensureTableExiststaetigkeit($dbconn) {
    $createTableSQL = "
    CREATE TABLE IF NOT EXISTS `tätigkeitentabelle2` (
        `ID` int(11) NOT NULL AUTO_INCREMENT,
        `Bezeichnung` varchar(255) NOT NULL,
        `Aktiv` tinyint(1) NOT NULL,
        `Ranking` int(11) NOT NULL,
        `Beginn` date NOT NULL,
        `Ende` date NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";

    if (!mysqli_query($dbconn, $createTableSQL)) {
        die("Error creating table: " . mysqli_error($dbconn));
    }
}

function ensureTableExistsabwesenheit($dbconn) {
    $createTableSQL = "
    CREATE TABLE IF NOT EXISTS `abwesenheitszeiten` (
        `ID` int(11) NOT NULL AUTO_INCREMENT,
        `Beginn` date NOT NULL,
        `Ende` date NOT NULL,
        `Bezeichnung` varchar(255) NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";

    if (!mysqli_query($dbconn, $createTableSQL)) {
        die("Error creating table: " . mysqli_error($dbconn));
    }
}
function ensureTableExistsberufschule($dbconn) {
    $createTableSQL = "
    CREATE TABLE IF NOT EXISTS `berufschultabelle` (
        `ID` int(11) NOT NULL AUTO_INCREMENT,
        `Schul_Beginn` date NOT NULL,
        `Schul_Ende` date NOT NULL,
        `Themen` varchar(256) NOT NULL,
        `Montag` tinyint(1) NOT NULL,
        `Dienstag` tinyint(1) NOT NULL,
        `Mittwoch` tinyint(1) NOT NULL,
        `Donnerstag` tinyint(1) NOT NULL,
        `Freitag` tinyint(1) NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";

    if (!mysqli_query($dbconn, $createTableSQL)) {
        die("Error creating table: " . mysqli_error($dbconn));
    }
}
function ensureTableExistspersonen($dbconn) {
    $createTableSQL = "
    CREATE TABLE IF NOT EXISTS `berichtsheftstabelle` (
        `ID` int(11) NOT NULL AUTO_INCREMENT,
        `Name` varchar(255) NOT NULL,
        `Abteilung` varchar(255) NOT NULL,
        `Ausbildungsberufsbezeichnung` varchar(255) NOT NULL,
        `Firma` varchar(255) NOT NULL,
        `Ausbilder*in` varchar(255) NOT NULL,
        `Start` date NOT NULL,
        `Ende` date NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";

    if (!mysqli_query($dbconn, $createTableSQL)) {
        die("Error creating table: " . mysqli_error($dbconn));
    }
}
?>

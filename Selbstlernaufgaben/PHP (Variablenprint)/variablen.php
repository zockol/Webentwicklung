<?php
// Variablen-Deklaration und Initialisierung je Datentyp

$integer = 42;          // Integer
$float = 3.14;          // Float
$string = "Hallo Welt"; // String
$boolean = true;        // Boolean
$array = [1, 2, 3];     // Array

// Ausgabe der Variablen mit print()
print("Integer: $integer<br>");
print("Float: $float<br>");
print("String: $string<br>");
print("Boolean: $boolean<br>");
print("Array: " . implode(", ", $array) . "<br>");

// Addition
$sum = $integer + $float;
var_dump($sum); // Ausgabe: float(45.14)
echo("<br>");

// Multiplikation
$product = $integer * 2;
var_dump($product); // Ausgabe: int(84)
echo("<br>");
// Modulo
$remainder = $integer % 5;
var_dump($remainder); // Ausgabe: int(2)
echo("<br>");

$uninitialisiert;
print("$uninitialisiert<br>");

var_dump("$uninitialisiert<br>");

?>

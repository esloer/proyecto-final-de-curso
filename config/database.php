<?php
// config/database.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "allonevideo";
// $servername = "localhost";
// $username = "d";
// $password = "1";
// $database = "allonevideo";
// $servername = "192.168.1.6";
// $username = "remoto";
// $password = "12345678";
// $database = "allonevideo";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
    die();
}
?>

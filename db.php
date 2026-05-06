<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "my_database";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
    die("Chyba pripojenia: " . $conn->connect_error);
}

$conn->set_charset("utf8");

echo "Pripojenie bolo úspěšné!";
?>

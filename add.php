<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nazov = $_POST['nazov'];
    $autor = $_POST['autor'];
    $pocet_stran = $_POST['pocet_stran'];
    $hodnotenie = $_POST['hodnotenie'];
    $stav = $_POST['stav'];
    $kategoria_id = $_POST['kategoria_id'];

    $sql = "INSERT INTO knihy (nazov, autor, pocet_stran, hodnotenie, stav, kategoria_id) VALUES ('$nazov', '$autor', $pocet_stran, $hodnotenie, '$stav', $kategoria_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Kniha bola úspešne přidána.";
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;
    }
}else {
    echo "Prosím, vyplňte všetky požadované polia správne.";
}
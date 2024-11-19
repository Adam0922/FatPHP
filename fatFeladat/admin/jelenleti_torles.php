<?php

// ID lekérése a GET paraméterből
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id >= 0) {
    // Lekérdezzük az adott ID-hoz tartozó vevő adatait
    $sql = "DELETE FROM jelenletiiv WHERE jelenleti_id = $id";
    $result = $conn->query($sql);
    echo"<br> Jelenléti ív sikeresen kitörölve!";
       }?>


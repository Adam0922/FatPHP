<?php
require_once('../includes/connect.php');
include('../includes/header.php');
include('../includes/menu.php');

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $Nev = $_POST['Nev'];
    $Leiras = $_POST['leiras'];
    

    $sql = "INSERT INTO munkakor (Nev, Leiras) VALUES ('$Nev', '$Leiras')";

    if($conn->query($sql) === TRUE) {
    echo ("Munkakör feltöltve!");
    }else{
    echo "Hiba:".$sql."<br>".$conn->error;}}
$conn->close();
?>
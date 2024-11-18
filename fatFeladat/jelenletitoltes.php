<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $Ev = $_POST['ev'];
    $Honap = $_POST['honap'];
    $Nap = $_POST['nap'];
    $Erkezes = $_POST['erkezes'];
    $Tavozas = $_POST['tavozas'];   
    $Szunet = $_POST['szunet'];
    $Megjegyzes = $_POST['megjegyzes'];

    $sql = "INSERT INTO jelenletiiv (ev, honap, nap, erkezes, tavozas, szunet, megjegyzes) VALUES ('$Ev', '$Honap', '$Nap', '$Erkezes', '$Tavozas', '$Szunet', '$Megjegyzes')";

    if($conn->query($sql) === TRUE) {
    echo ("Jelenlétiív feltöltve!");
    }else{
    echo "Hiba:".$sql."<br>".$conn->error;}}
$conn->close();
?>
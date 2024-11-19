<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $felhasznalonev = $_POST['Felhasznalonev'];
    $jelszo = $_POST['Jelszo'];
    $email = $_POST['email'];
    $telefonszam = $_POST['Telefonszam'];
    $nev = $_POST['Nev'];
    $lakcim = $_POST['Lakcim'];
    $adoszam = $_POST['Adoszam'];
    $taj = $_POST['Taj'];
    $anyjaneve = $_POST['Anyja_neve'];
    $szuletesiido = $_POST['Szuletesi_ido'];
    $szuletesihely = $_POST['Szuletesi_hely'];
    $szuletesinev = $_POST['Szuletesi_nev'];
    $bankszamla = $_POST['Bankszamla'];
    $szepkartya = $_POST['Szepkartya'];
    $magannyugdij = $_POST['Magannyugdij'];
    $egeszsegpenztar = $_POST['Egeszsegpenztar'];
    $gyerekek = $_POST['Gyerekek'];
    $gyerekekutanjaroszabadsag = $_POST['Gyerekek_utan_jaro_szabadsag'];
    $munkakor = $_POST['Munkakor'];
    $foglalkoztatasiforma = $_POST['Foglalkoztatasi_forma'];
    $felettes = $_POST['Felettes'];
    $fizetes = $_POST['Fizetes'];
    $vegzettseg = $_POST['Vegzettseg'];
    $munkaviszonykezdete = $_POST['Munkaviszony_kezdete'];
    $munkavegzethelye = $_POST['Munkavegzes_helye'];
    $munkaszerzodesekkelte = $_POST['Munkaszerzodesek_kelte'];

    $sql = "INSERT INTO munkavallalo (Felhasznalonev, Jelszo, email, Telefonszam, Nev, Lakcim, Adoszam, Taj, Anyja_neve, szuletesi_ido, szuletesi_hely, szuletesi_nev, bankszamla, szepkartya, magannyugdij, egeszsegpenztar, gyerekek, gyerekek_utan_jaro_szabadsag, munkakor, foglalkoztatasi_forma, felettes, fizetes, vegzettseg, munkaviszony_kezdete, munkavegzes_helye, munkaszerzodesek_kelte) VALUES ('$felhasznalonev', '$jelszo', '$email', '$telefonszam', '$nev', '$lakcim', '$adoszam', '$taj', '$anyjaneve', '$szuletesiido', '$szuletesihely', '$szuletesinev', '$bankszamla', '$szepkartya', '$magannyugdij', '$egeszsegpenztar', '$gyerekek', '$gyerekekutanjaroszabadsag', '$munkakor', '$foglalkoztatasiforma', '$felettes', '$fizetes', '$vegzettseg', '$munkaviszonykezdete', '$munkavegzethelye', '$munkaszerzodesekkelte')";

    if($conn->query($sql) === TRUE) {
    echo ("Új munkavallalo sikeresen hozzáadva!");
    }else{
    echo "Hiba:".$sql."<br>".$conn->error;}}
$conn->close();
?>
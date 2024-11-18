<?php

include("connect.php");

// SQL lekérdezés
$sql="SELECT Azonosito, Felhasznalonev, email, Telefonszam, Nev, Lakcim, Adoszam, Taj, Anyja_neve, szuletesi_ido, Gyerekek, Munkakor, Fizetes, Munkaviszony_kezdete FROM munkavallalo";

$result = $conn->query($sql);

// Táblázat megjelenítése
if ($result->num_rows > 0) {
    echo "<div class='container mt-4'>";
    echo "<table class='table table-striped table-bordered'>";
    echo "<thead class='thead-dark'>
            <tr>
                <th>Azonosító</th>
                <th>Felhasználónév</th>
                <th>Email</th>
                <th>Telefonszám</th>
                <th>Név</th>
                <th>Lakcím</th>
                <th>Adószám</th>
                <th>Taj szám</th>
                <th>Anyja neve</th>
                <th>Születési idő</th>
                <th>Gyerekek száma</th>
                <th>Munkakör</th>
                <th>Fizetés</th>
                <th>Munkaviszony kezdete</th>
                <th>Módosítások</th>
            </tr>
        </thead>
        <tbody>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['Azonosito'] . "</td>
                <td>" . $row['Felhasznalonev'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['Telefonszam'] . "</td>
                <td>" . $row['Nev'] . "</td>
                <td>" . $row['Lakcim'] . "</td>
                <td>" . $row['Adoszam'] . "</td>
                <td>" . $row['Taj'] . "</td>
                <td>" . $row['Anyja_neve'] . "</td>
                <td>" . $row['szuletesi_ido'] . "</td>
                <td>" . $row['Gyerekek'] . "</td>
                <td>" . $row['Munkakor'] . "</td>
                <td>" . $row['Fizetes'] . "</td>
                <td>" . $row['Munkaviszony_kezdete'] . "</td>
                <td>
                    <a class='btn btn-warning btn-sm' href='index.php?p=munkavall_modosit&id=" . $row['Azonosito'] . "'>Módosítás</a>
                    <a class='btn btn-danger btn-sm' href='index.php?p=munkavall_torles&id=" . $row['Azonosito'] . "'>Törlés</a>
                </td>
            </tr>";
    }

    echo "</tbody></table></div>";
}
?>

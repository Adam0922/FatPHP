<?php

include("connect.php");

$searchAzonosito = isset($_POST['searchAzonosito']) ? $_POST['searchAzonosito'] : '';
$searchFelhasznalonev = isset($_POST['searchFelhasznalonev']) ? $_POST['searchFelhasznalonev'] : '';
$searchEmail = isset($_POST['searchEmail']) ? $_POST['searchEmail'] : '';
$searchNev = isset($_POST['searchNev']) ? $_POST['searchNev'] : '';
$searchAdoszam = isset($_POST['searchAdoszam']) ? $_POST['searchAdoszam'] : '';
$searchSzuletesiIdo = isset($_POST['searchSzuletesiIdo']) ? $_POST['searchSzuletesiIdo'] : '';
$searchMunkakor = isset($_POST['searchMunkakor']) ? $_POST['searchMunkakor'] : '';
$searchMunkaviszonyKezdete = isset($_POST['searchMunkaviszonyKezdete']) ? $_POST['searchMunkaviszonyKezdete'] : '';

$sql = "SELECT Azonosito, Felhasznalonev, email, Telefonszam, Nev, Lakcim, Adoszam, Taj, Anyja_neve, szuletesi_ido, Gyerekek, Munkakor, Fizetes, Munkaviszony_kezdete FROM munkavallalo";

$conditions = [];
if ($searchAzonosito !== '') {
    $conditions[] = "Azonosito LIKE '%" . $conn->real_escape_string($searchAzonosito) . "%'";
}
if ($searchFelhasznalonev !== '') {
    $conditions[] = "Felhasznalonev LIKE '%" . $conn->real_escape_string($searchFelhasznalonev) . "%'";
}
if ($searchEmail !== '') {
    $conditions[] = "email LIKE '%" . $conn->real_escape_string($searchEmail) . "%'";
}
if ($searchNev !== '') {
    $conditions[] = "Nev LIKE '%" . $conn->real_escape_string($searchNev) . "%'";
}
if ($searchAdoszam !== '') {
    $conditions[] = "Adoszam LIKE '%" . $conn->real_escape_string($searchAdoszam) . "%'";
}
if ($searchSzuletesiIdo !== '') {
    $conditions[] = "szuletesi_ido LIKE '%" . $conn->real_escape_string($searchSzuletesiIdo) . "%'";
}
if ($searchMunkakor !== '') {
    $conditions[] = "Munkakor LIKE '%" . $conn->real_escape_string($searchMunkakor) . "%'";
}
if ($searchMunkaviszonyKezdete !== '') {
    $conditions[] = "Munkaviszony_kezdete LIKE '%" . $conn->real_escape_string($searchMunkaviszonyKezdete) . "%'";
}

if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

$result = $conn->query($sql);

?>

<div class='container mt-4'>
    <form method="POST" class="mb-4">
        <div class="form-row align-items-end">
            <div class="col-auto">
                <label for="searchAzonosito">Azonosító:</label>
                <input type="text" name="searchAzonosito" id="searchAzonosito" class="form-control" value="<?php echo htmlspecialchars($searchAzonosito); ?>">
            </div>
            <div class="col-auto">
                <label for="searchFelhasznalonev">Felhasználónév:</label>
                <input type="text" name="searchFelhasznalonev" id="searchFelhasznalonev" class="form-control" value="<?php echo htmlspecialchars($searchFelhasznalonev); ?>">
            </div>
            <div class="col-auto">
                <label for="searchEmail">Email:</label>
                <input type="text" name="searchEmail" id="searchEmail" class="form-control" value="<?php echo htmlspecialchars($searchEmail); ?>">
            </div>
            <div class="col-auto">
                <label for="searchNev">Név:</label>
                <input type="text" name="searchNev" id="searchNev" class="form-control" value="<?php echo htmlspecialchars($searchNev); ?>">
            </div>
            <div class="col-auto">
                <label for="searchAdoszam">Adószám:</label>
                <input type="text" name="searchAdoszam" id="searchAdoszam" class="form-control" value="<?php echo htmlspecialchars($searchAdoszam); ?>">
            </div>
            <div class="col-auto">
                <label for="searchSzuletesiIdo">Születési idő:</label>
                <input type="text" name="searchSzuletesiIdo" id="searchSzuletesiIdo" class="form-control" value="<?php echo htmlspecialchars($searchSzuletesiIdo); ?>">
            </div>
            <div class="col-auto">
                <label for="searchMunkakor">Munkakör:</label>
                <input type="text" name="searchMunkakor" id="searchMunkakor" class="form-control" value="<?php echo htmlspecialchars($searchMunkakor); ?>">
            </div>
            <div class="col-auto">
                <label for="searchMunkaviszonyKezdete">Munkaviszony kezdete:</label>
                <input type="text" name="searchMunkaviszonyKezdete" id="searchMunkaviszonyKezdete" class="form-control" value="<?php echo htmlspecialchars($searchMunkaviszonyKezdete); ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <div class='table-responsive'>
        <table class='table table-striped table-bordered'>
            <thead class='thead-dark'>
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
            <tbody>

            <?php
            if ($result->num_rows > 0) {
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
            } else {
                echo "<tr><td colspan='15' class='text-center'>No records found</td></tr>";
         }
            ?>

            </tbody>
        </table>
    </div>
</div>

<?php
?>

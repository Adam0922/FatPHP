<?php

include("../common/connect.php");

$searchAzonosito = isset($_POST['searchAzonosito']) ? $_POST['searchAzonosito'] : '';
$searchFelhasznalonev = isset($_POST['searchFelhasznalonev']) ? $_POST['searchFelhasznalonev'] : '';
$searchEmail = isset($_POST['searchEmail']) ? $_POST['searchEmail'] : '';
$searchNev = isset($_POST['searchNev']) ? $_POST['searchNev'] : '';
$searchAdoszam = isset($_POST['searchAdoszam']) ? $_POST['searchAdoszam'] : '';
$searchSzuletesiIdo = isset($_POST['searchSzuletesiIdo']) ? $_POST['searchSzuletesiIdo'] : '';
$searchMunkakor = isset($_POST['searchMunkakor']) ? $_POST['searchMunkakor'] : '';
$searchMunkaviszonyKezdete = isset($_POST['searchMunkaviszonyKezdete']) ? $_POST['searchMunkaviszonyKezdete'] : '';

$sql = "SELECT m.Azonosito, m.Felhasznalonev, m.email, m.Telefonszam, m.Nev, m.Lakcim, m.Adoszam, m.Taj, m.Anyja_neve, m.szuletesi_ido, m.Gyerekek, mk.Nev AS Munkakor_nev, m.Fizetes, m.Munkaviszony_kezdete
        FROM munkavallalo m
        LEFT JOIN munkakor mk ON m.Munkakor = mk.Azonosito";

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
    $conditions[] = "mk.Nev LIKE '%" . $conn->real_escape_string($searchMunkakor) . "%'";
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
        <div class="row g-3">
            <div class="col-md-3">
                <label for="searchAzonosito" class="form-label">Azonosító:</label>
                <input type="text" name="searchAzonosito" id="searchAzonosito" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchAzonosito); ?>">
            </div>
            <div class="col-md-3">
                <label for="searchFelhasznalonev" class="form-label">Felhasználónév:</label>
                <input type="text" name="searchFelhasznalonev" id="searchFelhasznalonev" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchFelhasznalonev); ?>">
            </div>
            <div class="col-md-3">
                <label for="searchEmail" class="form-label">Email:</label>
                <input type="text" name="searchEmail" id="searchEmail" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchEmail); ?>">
            </div>
            <div class="col-md-3">
                <label for="searchNev" class="form-label">Név:</label>
                <input type="text" name="searchNev" id="searchNev" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchNev); ?>">
            </div>
            <div class="col-md-3">
                <label for="searchAdoszam" class="form-label">Adószám:</label>
                <input type="text" name="searchAdoszam" id="searchAdoszam" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchAdoszam); ?>">
            </div>
            <div class="col-md-3">
                <label for="searchSzuletesiIdo" class="form-label">Születési idő:</label>
                <input type="text" name="searchSzuletesiIdo" id="searchSzuletesiIdo" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchSzuletesiIdo); ?>">
            </div>
            <div class="col-md-3">
                <label for="searchMunkakor" class="form-label">Munkakör:</label>
                <input type="text" name="searchMunkakor" id="searchMunkakor" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchMunkakor); ?>">
            </div>
            <div class="col-md-3">
                <label for="searchMunkaviszonyKezdete" class="form-label">Munkaviszony kezdete:</label>
                <input type="text" name="searchMunkaviszonyKezdete" id="searchMunkaviszonyKezdete" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchMunkaviszonyKezdete); ?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-search"></i> Keresés
                </button>
            </div>
        </div>
    </form>

    <div class='table-responsive'>
        <table class='table table-striped table-bordered'>
            <thead class='thead-dark'>
                <tr>
                    <th>Azonosító</th>
                    <th>Felhasználónév</th>
                    <th>Kép</th>
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
                    <th>Kép műveletek</th>
                    <th>Módosítások</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imagePath = '../pics/' . $row['Azonosito'] . '.*';
                    $imageFiles = glob($imagePath);

                    echo "<tr>
                            <td>" . $row['Azonosito'] . "</td>
                            <td>" . $row['Felhasznalonev'] . "</td>
                            <td>";
                    if (!empty($imageFiles)) {
                        echo "<img src='" . $imageFiles[0] . "' alt='Kép' style='max-width: 100px; max-height: 100px;'>";
                    } else {
                        echo "Nincs kép";
                    }
                    echo "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['Telefonszam'] . "</td>
                            <td>" . $row['Nev'] . "</td>
                            <td>" . $row['Lakcim'] . "</td>
                            <td>" . $row['Adoszam'] . "</td>
                            <td>" . $row['Taj'] . "</td>
                            <td>" . $row['Anyja_neve'] . "</td>
                            <td>" . $row['szuletesi_ido'] . "</td>
                            <td>" . $row['Gyerekek'] . "</td>
                            <td>" . $row['Munkakor_nev'] . "</td>
                            <td>" . $row['Fizetes'] . "</td>
                            <td>" . $row['Munkaviszony_kezdete'] . "</td>
                            <td>
                                <form method='POST' enctype='multipart/form-data' class='mb-2'>
                                    <input type='hidden' name='azonosito' value='" . $row['Azonosito'] . "'>
                                    <input type='file' name='image' class='form-control-file'>
                                    <button type='submit' name='upload' class='btn btn-primary btn-sm mt-1'>Feltöltés</button>
                                </form>
                            </td>
                            <td>
                                <a class='btn btn-warning btn-sm' href='index.php?p=munkavall_modosit&id=" . $row['Azonosito'] . "' title='Módosítás'><i class='fas fa-edit'></i></a>
                                <a class='btn btn-danger btn-sm' href='index.php?p=munkavall_torles&id=" . $row['Azonosito'] . "' title='Törlés'><i class='fas fa-trash-alt'></i></a>";
                    if (!empty($imageFiles)) {
                        echo "<form method='POST' class='d-inline ms-1'>
                                <input type='hidden' name='azonosito' value='" . $row['Azonosito'] . "'>
                                <button type='submit' name='delete_image' class='btn btn-danger btn-sm' title='Kép törlése'>
                                    <i class='fas fa-image'></i>
                                </button>
                              </form>";
                    }
                    echo "</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='17' class='text-center'>No records found</td></tr>";
            }

            // Kép feltöltés kezelése
            if(isset($_POST['upload']) && isset($_FILES['image'])) {
                $azonosito = $_POST['azonosito'];
                $uploadDir = '../pics/';
                $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $newFileName = $azonosito . '.' . $fileExtension;
                $uploadFile = $uploadDir . $newFileName;

                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                if(in_array(strtolower($fileExtension), $allowedExtensions)) {
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                        echo "<div class='alert alert-success'>A kép sikeresen feltöltve.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Hiba történt a kép feltöltése során.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Csak JPG, JPEG, PNG és GIF fájlok engedélyezettek.</div>";
                }
            }

            // Kép törlés kezelése
            if(isset($_POST['delete_image'])) {
                $azonosito = $_POST['azonosito'];
                $imagePath = '../pics/' . $azonosito . '.*';
                $imageFiles = glob($imagePath);

                if(!empty($imageFiles)) {
                    foreach($imageFiles as $file) {
                        if(unlink($file)) {
                            echo "<div class='alert alert-success'>A kép sikeresen törölve.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Hiba történt a kép törlése során.</div>";
                        }
                    }
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


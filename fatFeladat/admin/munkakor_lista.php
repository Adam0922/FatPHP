<?php

include("../common/connect.php");

// Initialize search variables for each field
$searchAzonosito = isset($_POST['searchAzonosito']) ? $_POST['searchAzonosito'] : '';
$searchNev = isset($_POST['searchNev']) ? $_POST['searchNev'] : '';
$searchLeiras = isset($_POST['searchLeiras']) ? $_POST['searchLeiras'] : '';

// Start the base SQL query
$sql = "SELECT Azonosito, Nev, Leiras FROM munkakor";

// Build the WHERE clause dynamically based on non-empty search fields
$conditions = [];
if ($searchAzonosito !== '') {
    $conditions[] = "Azonosito LIKE '%" . $conn->real_escape_string($searchAzonosito) . "%'";
}
if ($searchNev !== '') {
    $conditions[] = "Nev LIKE '%" . $conn->real_escape_string($searchNev) . "%'";
}
if ($searchLeiras !== '') {
    $conditions[] = "Leiras LIKE '%" . $conn->real_escape_string($searchLeiras) . "%'";
}

// Append conditions to SQL query if any exist
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
                <label for="searchNev">Név:</label>
                <input type="text" name="searchNev" id="searchNev" class="form-control" value="<?php echo htmlspecialchars($searchNev); ?>">
            </div>
            <div class="col-auto">
                <label for="searchLeiras">Leírás:</label>
                <input type="text" name="searchLeiras" id="searchLeiras" class="form-control" value="<?php echo htmlspecialchars($searchLeiras); ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <?php
    if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead class='thead-dark'>
                    <tr>
                        <th>Azonosító</th>
                        <th>Név</th>
                        <th>Leírás</th>
                        <th>Kép</th>
                        <th>Kép feltöltés</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>";

            while ($row = $result->fetch_assoc()) {
                $imagePath = '../pics/' . $row['Azonosito'] . '.*';
                $imageFiles = glob($imagePath);

                echo "<tr>
                        <td>" . $row['Azonosito'] . "</td>
                        <td>" . $row['Nev'] . "</td>
                        <td>" . $row['Leiras'] . "</td>
                        <td>";
                if (!empty($imageFiles)) {
                    echo "<img src='" . $imageFiles[0] . "' alt='Kép' style='max-width: 100px; max-height: 100px;'>";
                } else {
                    echo "Nincs kép";
                }
                echo "</td>
                        <td>
                            <form method='POST' enctype='multipart/form-data'>
                                <input type='hidden' name='azonosito' value='" . $row['Azonosito'] . "'>
                                <input type='file' name='image' class='form-control-file'>
                                <button type='submit' name='upload' class='btn btn-primary btn-sm mt-1'>Feltöltés</button>
                            </form>
                        </td>
                        <td>
                           <a class='btn btn-warning btn-sm' href='index.php?p=munkakor_modosit&id=" . $row['Azonosito'] . "' title='Módosítás'><i class='fas fa-edit'></i></a>
                           <a class='btn btn-danger btn-sm' href='index.php?p=munkakor_torles&id=" . $row['Azonosito'] . "' title='Törlés'><i class='fas fa-trash-alt'></i></a>";
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

            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning'>Nincsenek találatok.</div>";
        }

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

</div>

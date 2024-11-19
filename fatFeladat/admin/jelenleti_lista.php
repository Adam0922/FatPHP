<?php

include("../common/connect.php");

// Initialize search variables for each field
$searchId = isset($_POST['searchId']) ? $_POST['searchId'] : '';
$searchEv = isset($_POST['searchEv']) ? $_POST['searchEv'] : '';
$searchHonap = isset($_POST['searchHonap']) ? $_POST['searchHonap'] : '';
$searchNap = isset($_POST['searchNap']) ? $_POST['searchNap'] : '';
$searchErkezes = isset($_POST['searchErkezes']) ? $_POST['searchErkezes'] : '';
$searchTavozas = isset($_POST['searchTavozas']) ? $_POST['searchTavozas'] : '';
$searchSzunet = isset($_POST['searchSzunet']) ? $_POST['searchSzunet'] : '';
$searchMegjegyzes = isset($_POST['searchMegjegyzes']) ? $_POST['searchMegjegyzes'] : '';

// Start the base SQL query
$sql = "SELECT jelenleti_id, ev, honap, nap, erkezes, tavozas, szunet, megjegyzes FROM jelenletiiv";

// Build the WHERE clause dynamically based on non-empty search fields
$conditions = [];
if ($searchId !== '') {
    $conditions[] = "jelenleti_id LIKE '%" . $conn->real_escape_string($searchId) . "%'";
}
if ($searchEv !== '') {
    $conditions[] = "ev LIKE '%" . $conn->real_escape_string($searchEv) . "%'";
}
if ($searchHonap !== '') {
    $conditions[] = "honap LIKE '%" . $conn->real_escape_string($searchHonap) . "%'";
}
if ($searchNap !== '') {
    $conditions[] = "nap LIKE '%" . $conn->real_escape_string($searchNap) . "%'";
}
if ($searchErkezes !== '') {
    $conditions[] = "erkezes LIKE '%" . $conn->real_escape_string($searchErkezes) . "%'";
}
if ($searchTavozas !== '') {
    $conditions[] = "tavozas LIKE '%" . $conn->real_escape_string($searchTavozas) . "%'";
}

// Append conditions to SQL query if any exist
if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

$result = $conn->query($sql);

?>

<div class='container mt-4'>
    <form method="POST" class="mb-4">
        <div class="row g-3">
            <div class="col-md-2">
                <label for="searchId" class="form-label">ID:</label>
                <input type="text" name="searchId" id="searchId" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchId); ?>">
            </div>
            <div class="col-md-2">
                <label for="searchEv" class="form-label">Év:</label>
                <input type="text" name="searchEv" id="searchEv" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchEv); ?>">
            </div>
            <div class="col-md-2">
                <label for="searchHonap" class="form-label">Hónap:</label>
                <input type="text" name="searchHonap" id="searchHonap" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchHonap); ?>">
            </div>
            <div class="col-md-2">
                <label for="searchNap" class="form-label">Nap:</label>
                <input type="text" name="searchNap" id="searchNap" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchNap); ?>">
            </div>
            <div class="col-md-2">
                <label for="searchErkezes" class="form-label">Érkezés:</label>
                <input type="text" name="searchErkezes" id="searchErkezes" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchErkezes); ?>">
            </div>
            <div class="col-md-2">
                <label for="searchTavozas" class="form-label">Távozás:</label>
                <input type="text" name="searchTavozas" id="searchTavozas" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchTavozas); ?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-search"></i> Keresés
                </button>
            </div>
        </div>
    </form>

    <?php
    if ($result->num_rows > 0) {
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead class='thead-dark'>
                <tr>
                    <th>ID</th>
                    <th>Év</th>
                    <th>Hónap</th>
                    <th>Nap</th>
                    <th>Érkezés</th>
                    <th>Távozás</th>
                    <th>Szünet</th>
                    <th>Megjegyzés</th>
                    <th>Módosítások</th>
                </tr>
            </thead>
            <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['jelenleti_id'] . "</td>
                    <td>" . $row['ev'] . "</td>
                    <td>" . $row['honap'] . "</td>
                    <td>" . $row['nap'] . "</td>
                    <td>" . $row['erkezes'] . "</td>
                    <td>" . $row['tavozas'] . "</td>
                    <td>" . $row['szunet'] . "</td>
                    <td>" . $row['megjegyzes'] . "</td>
                    <td>
                        <a class='btn btn-warning btn-sm' href='index.php?p=jelenleti_modosit&id=" . $row['jelenleti_id'] . "' title='Módosítás'><i class='fas fa-edit'></i></a>
                                                                    <a class='btn btn-danger btn-sm' href='index.php?p=jelenleti_torles&id=" . $row['jelenleti_id'] . "' title='Törlés'><i class='fas fa-trash-alt'></i></a>
                                                                </td>
                </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning'>Nincsenek találatok.</div>";
    }
    ?>

</div>

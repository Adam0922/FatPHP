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
        <div class="row g-3">
            <div class="col-md-3">
                <label for="searchAzonosito" class="form-label">Azonosító:</label>
                <input type="text" name="searchAzonosito" id="searchAzonosito" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchAzonosito); ?>">
            </div>
            <div class="col-md-3">
                <label for="searchNev" class="form-label">Név:</label>
                <input type="text" name="searchNev" id="searchNev" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchNev); ?>">
            </div>
            <div class="col-md-3">
                <label for="searchLeiras" class="form-label">Leírás:</label>
                <input type="text" name="searchLeiras" id="searchLeiras" class="form-control form-control-sm" value="<?php echo htmlspecialchars($searchLeiras); ?>">
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
                    <th>Azonosító</th>
                    <th>Név</th>
                    <th>Leírás</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['Azonosito'] . "</td>
                    <td>" . $row['Nev'] . "</td>
                    <td>" . $row['Leiras'] . "</td>
                    <td>
                       <a class='btn btn-warning btn-sm' href='index.php?p=munkakor_modosit&id=" . $row['Azonosito'] . "' title='Módosítás'><i class='fas fa-edit'></i></a>
                       <a class='btn btn-danger btn-sm' href='index.php?p=munkakor_torles&id=" . $row['Azonosito'] . "' title='Törlés'><i class='fas fa-trash-alt'></i></a>
                    </td>
                </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning'>Nincsenek találatok.</div>";
    }
    ?>
</div>
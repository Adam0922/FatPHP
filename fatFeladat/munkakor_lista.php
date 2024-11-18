<?php

include("connect.php");

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
    // Display the table if results are found
    if ($result->num_rows > 0) {
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead class='thead-dark'>
                <tr>
                    <th>Azonosító</th>
                    <th>Név</th>
                    <th>Leírás</th>
                    <th>Módosítások</th>
                </tr>
            </thead>
            <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['Azonosito'] . "</td>
                    <td>" . $row['Nev'] . "</td>
                    <td>" . $row['Leiras'] . "</td>
                    <td>
                        <a class='btn btn-warning btn-sm' href='index.php?p=munkakor_modosit&id=" . $row['Azonosito'] . "'>Módosítás</a>
                        <a class='btn btn-danger btn-sm' href='index.php?p=munkakor_torles&id=" . $row['Azonosito'] . "'>Törlés</a>
                    </td>
                </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning'>Nincsenek találatok.</div>";
    }
    ?>

</div>

<?php
include 'connect.php';

$sql = "SELECT Azonosito, Nev FROM munkakor ORDER BY Nev";
$result = $conn->query($sql);

$selected_munkakor = isset($_POST['Munkakor']) ? $_POST['Munkakor'] : '';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $selected = ($row["Azonosito"] == $selected_munkakor) ? 'selected' : '';
        echo '<option value="' . $row["Azonosito"] . '" ' . $selected . '>' . htmlspecialchars($row["Nev"]) . '</option>';
    }
} else {
    echo '<option value="">Nincs elérhető munkakör</option>';
}
?>
<?php

// ID lekérése a GET paraméterből
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id >= 0) {
    // Lekérdezzük az adott ID-hoz tartozó vevő adatait
    $sql = "SELECT * FROM jelenletiiv WHERE jelenleti_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Adatok megjelenítése az űrlapban
        ?>

<div class="container my-5">
			<form action="index.php?p=jelenleti_modosit&id=<?php echo $id; ?>" method="POST">
				<div class="card">
					<div class="card-header bg-primary text-white">
						<h4>Jelenlétiív</h4>
					</div>
					<div class="card-body">
						<div class="row g-3">
							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="ev" class="form-label">Év</label>
									<input type="number" class="form-control" id="ev" name="Ev" value="<?php echo $row['Ev']; ?>" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="honap" class="form-label">Hónap</label>
									<input type="number" class="form-control" id="honap" name="Honap" value="<?php echo $row['Honap']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="nap" class="form-label">Nap</label>
									<input type="number" class="form-control" id="nap" name="Nap" value="<?php echo $row['Nap']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="erkezes" class="form-label">Érkezés</label>
									<input type="time" class="form-control" id="erkezes" name="Erkezes" value="<?php echo $row['Erkezes']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="tavozas" class="form-label">Távozás</label>
									<input type="time" class="form-control" id="tavozas" name="tavozas" value="<?php echo $row['Tavozas']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="szunet" class="form-label">Szünet</label>
									<input type="text" class="form-control" id="szunet" name="szunet" value="<?php echo $row['Szunet']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-12">
								<div class="mb-3">
									<label for="megjegyzes" class="form-label">Megjegyzés</label>
									<textarea
										class="form-control"
										id="megjegyzes"
										name="megjegyzes"
										rows="3"
										required><?php echo $row['Megjegyzes']; ?></textarea>
								</div>
							</div>
						</div>

						<div class="d-flex justify-content-between mt-4">
							<button type="submit">Módosítás</button>
						</div>
					</div>
				</div>
			</form>
		</div>
        <?php
    } else {
        echo "Nincs ilyen azonosítóval rendelkező jelenlétiív.";
    }
}

// Ha az űrlap elküldésre került, frissítjük az adatokat
if ($_SERVER["REQUEST_METHOD"] == "POST" && $id > 0) {
    $Ev = $_POST['Ev'];
	$Honap = $_POST['Honap'];
	$Nap = $_POST['Nap'];
	$Erkezes = $_POST['Erkezes'];
	$Tavozas = $_POST['tavozas'];
	$Szunet = $_POST['szunet'];
	$Megjegyzes = $_POST['megjegyzes'];


    $sql = "UPDATE jelenletiiv SET 
        ev = '$Ev', 
        honap = '$Honap', 
        nap = '$Nap', 
        erkezes = '$Erkezes', 
        tavozas = '$Tavozas', 
        szunet = '$Szunet', 
        Megjegyzes = '$Megjegyzes' 
        WHERE jelenleti_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
               setTimeout(function() {
            window.location.href = 'index.php?p=jelenleti_lista';
         }, 1); 
    </script>";
    } else {
        echo "Hiba a vevő frissítése során: " . $conn->error;
    }
}

$conn->close();
?>

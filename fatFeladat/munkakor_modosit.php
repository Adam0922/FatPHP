<?php

// ID lekérése a GET paraméterből
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id >= 0) {
    // Lekérdezzük az adott ID-hoz tartozó vevő adatait
    $sql = "SELECT * FROM munkakor WHERE Azonosito = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Adatok megjelenítése az űrlapban
        ?>

<div class="container my-5">
			<form action="index.php?p=munkakor_modosit&id=<?php echo $id; ?>" method="POST">
				<div class="card shadow-sm">
					<div class="card-header bg-primary text-white">
						<h4 class="mb-0">Munkakör adatok módosítása</h4>
					</div>
					<div class="card-body">
						<div class="row g-3">
							<!-- Name -->
							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Nev" class="form-label">Név</label>
									<input type="text" class="form-control" id="Nev" name="Nev" placeholder="Név" value="<?php echo $row['Nev']; ?>" required>
								</div>
							</div>

							<!-- Description -->
							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="leiras" class="form-label">Leírás</label>
									<textarea
										class="form-control"
										id="leiras"
										name="leiras"
										rows="3"
										placeholder="Leírás"
										required><?php echo $row['Leiras']; ?></textarea>
								</div>
							</div>
						</div>

						<!-- Action buttons -->
						<div class="d-flex justify-content-between mt-4">
                            <input type="submit" value="Módosítás">
						</div>
					</div>
				</div>
			</form>
		</div>
        <?php
    } else {
        echo "Nincs ilyen azonosítóval rendelkező munkakor.";
    }
}
// Ha az űrlap elküldésre került, frissítjük az adatokat
if ($_SERVER["REQUEST_METHOD"] == "POST" && $id > 0) {
    $Nev = $_POST['Nev'];
    $Leiras = $_POST['leiras'];
    
    $sql = "UPDATE munkakor SET 
            Nev = '$Nev', 
            leiras = '$Leiras' 
            WHERE Azonosito = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
               setTimeout(function() {
            window.location.href = 'index.php?p=munkakor_lista';
         }, 1); 
    </script>";
    } else {
        echo "Hiba a munkakor frissítése során: " . $conn->error;
    }
}

$conn->close();
?>

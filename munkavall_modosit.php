<?php

// ID lekérése a GET paraméterből
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id >= 0) {
    // Lekérdezzük az adott ID-hoz tartozó vevő adatait
    $sql = "SELECT * FROM munkavallalo WHERE Azonosito = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Adatok megjelenítése az űrlapban
        ?>

<div class="container my-5">
			<form action="index.php?p=munkavall_modosit&id=<?php echo $id; ?>" method="POST">
				<div class="card shadow-sm">
					<div class="card-header bg-primary text-white">
						<h4 class="mb-0">Vevő adatainak módosítása</h4>
					</div>
					<div class="card-body">
						<div class="row g-3">
							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Felhasznalonev" class="form-label">Felhasználónév</label>
									<input type="text" class="form-control" id="Felhasznalonev" name="Felhasznalonev" value="<?php echo $row['Felhasznalonev']; ?>" required>
								</div>
							</div>
							
							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="email" class="form-label">E-mail</label>
									<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required> 
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Telefonszam" class="form-label">Telefonszám</label>
									<input type="tel" class="form-control" id="Telefonszam" name="Telefonszam" value="<?php echo $row['Telefonszam']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Nev" class="form-label">Név</label>
									<input type="text" class="form-control" id="Nev" name="Nev" value="<?php echo $row['Nev']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Lakcim" class="form-label">Lakcím</label>
									<input type="text" class="form-control" id="Lakcim" name="Lakcim" value="<?php echo $row['Lakcim']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Adoszam" class="form-label">Adószám</label>
									<input type="text" class="form-control" id="Adoszam" name="Adoszam" value="<?php echo $row['Adoszam']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Taj" class="form-label">Tajszám</label>
									<input type="text" class="form-control" id="Taj" name="Taj" value="<?php echo $row['Taj']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Anyja_neve" class="form-label">Anyja neve</label>
									<input type="text" class="form-control" id="Anyja_neve" name="Anyja_neve" value="<?php echo $row['Anyja_neve']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Szuletesi_ido" class="form-label">Születési idő</label>
									<input type="date" class="form-control" id="Szuletesi_ido" name="Szuletesi_ido" value="<?php echo $row['Szuletesi_ido']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Gyerekek" class="form-label">Gyerekek száma</label>
									<input type="number" class="form-control" id="Gyerekek" name="Gyerekek" value="<?php echo $row['Gyerekek']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Munkakor" class="form-label">Munkakör</label>
									<input type="text" class="form-control" id="Munkakor" name="Munkakor" value="<?php echo $row['Munkakor']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Fizetes" class="form-label">Fizetés</label>
									<input type="number" class="form-control" id="Fizetes" name="Fizetes" value="<?php echo $row['Fizetes']; ?>" required>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Munkaviszony_kezdete" class="form-label">Munkavállalás kezdete</label>
									<input
										type="date"
										class="form-control"
										id="Munkaviszony_kezdete"
										name="Munkaviszony_kezdete"
                                        value="<?php echo $row['Munkaviszony_kezdete']; ?>" required>
                                        
								</div>
							</div>
						</div>

						<div class="d-flex justify-content-between mt-4">
							<input type="submit" value="Módosítás">
						</div>
					</div>
				</div>
			</form>
		</div>
        <?php
    } else {
        echo "Nincs ilyen azonosítóval rendelkező vevő.";
    }
}

// Ha az űrlap elküldésre került, frissítjük az adatokat
if ($_SERVER["REQUEST_METHOD"] == "POST" && $id > 0) {
    $felhasznalonev = $_POST['Felhasznalonev'];
    $email = $_POST['email'];
    $telefonszam = $_POST['Telefonszam'];
    $nev = $_POST['Nev'];
    $lakcim = $_POST['Lakcim'];
    $adoszam = $_POST['Adoszam'];
    $taj = $_POST['Taj'];
    $anyjaneve = $_POST['Anyja_neve'];
    $szuletesiido = $_POST['Szuletesi_ido'];
    $gyerekek = $_POST['Gyerekek'];
    $munkakor = $_POST['Munkakor'];
    $fizetes = $_POST['Fizetes'];
    $munkaviszonykezdete = $_POST['Munkaviszony_kezdete'];

    $sql = "UPDATE munkavallalo SET 
            Felhasznalonev = '$felhasznalonev', 
            email = '$email', 
            Telefonszam = '$telefonszam', 
            Nev = '$nev', 
            Lakcim = '$lakcim', 
            Adoszam = '$adoszam', 
            Taj = '$taj', 
            Anyja_neve = '$anyjaneve', 
            Szuletesi_ido = '$szuletesiido', 
            Gyerekek = '$gyerekek', 
            Munkakor = '$munkakor', 
            Fizetes = '$fizetes', 
            Munkaviszony_kezdete = '$munkaviszonykezdete' 
            WHERE Azonosito = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
               setTimeout(function() {
            window.location.href = 'index.php?p=munkavall_lista';
         }, 1); 
    </script>";
    } else {
        echo "Hiba a vevő frissítése során: " . $conn->error;
    }
}

$conn->close();
?>
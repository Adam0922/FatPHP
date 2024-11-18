
		<div class="container my-5">
			<form action="index.php?p=munkakor_toltes" method="POST">
				<div class="card shadow-sm">
					<div class="card-header bg-primary text-white">
						<h4 class="mb-0">Munkakör adatok</h4>
					</div>
					<div class="card-body">
						<div class="row g-3">
							<!-- Name -->
							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Nev" class="form-label">Név</label>
									<input type="text" class="form-control" id="Nev" name="Nev" placeholder="Név" required />
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
										required></textarea>
								</div>
							</div>
						</div>

						<!-- Action buttons -->
						<div class="d-flex justify-content-between mt-4">
							<div>
								<a href="index.php?p=munkavall" class="btn btn-outline-primary">Munkavállaló</a>
								<a href="#" class="btn btn-outline-primary">Munkakör</a>
								<a href="jelenleti.html" class="btn btn-outline-primary">Jelenlétiív</a>
							</div>

							<button type="submit" class="btn btn-danger">Mentés</button>
						</div>
					</div>
				</div>
			</form>
		</div>


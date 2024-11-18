
		<div class="container my-5">
			<form action="index.php?p=jelenletitoltes" method="POST">
				<div class="card">
					<div class="card-header bg-primary text-white">
						<h4>Jelenlétiív</h4>
					</div>
					<div class="card-body">
						<div class="row g-3">
							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="ev" class="form-label">Év</label>
									<input type="number" class="form-control" id="ev" name="ev" />
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="honap" class="form-label">Hónap</label>
									<input type="month" class="form-control" id="honap" name="honap" />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="nap" class="form-label">Nap</label>
									<input type="text" class="form-control" id="nap" name="nap" />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="erkezes" class="form-label">Érkezés</label>
									<input type="time" class="form-control" id="erkezes" name="erkezes" />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="tavozas" class="form-label">Távozás</label>
									<input type="time" class="form-control" id="tavozas" name="tavozas" />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="szunet" class="form-label">Szünet</label>
									<input type="text" class="form-control" id="szunet" name="szunet" />
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
										placeholder="Megjegyzés"
										required></textarea>
								</div>
							</div>
						</div>

						<div class="d-flex justify-content-between mt-4">
							<div>
								<a href="formstart.html" class="btn btn-outline-primary">Munkavállaló</a>
								<a href="munkakor.html" class="btn btn-outline-primary">Munkakör</a>
								<a href="#" class="btn btn-outline-primary">Jelenlétiív</a>
							</div>

							<button type="submit" class="btn btn-danger">Mentés</button>
						</div>
					</div>
				</div>
			</form>
		</div>


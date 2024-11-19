
		<div class="container my-5">
			<form action="munkavall_toltes.php" method="POST">
				<div class="card shadow-sm">
					<div class="card-header bg-primary text-white">
						<h4 class="mb-0">Munkavállalói adatok</h4>
					</div>
					<div class="card-body">
						<div class="row g-3">
							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Felhasznalonev" class="form-label">Felhasználónév</label>
                                    <input type="text" class="form-control" id="Felhasznalonev" name="Felhasznalonev"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Jelszo" class="form-label">Jelszó</label>
									<input type="password" class="form-control" id="Jelszo" name="Jelszo"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="email" class="form-label">E-mail</label>
									<input type="email" class="form-control" id="email" name="email"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Telefonszam" class="form-label">Telefonszám</label>
									<input type="tel" class="form-control" id="Telefonszam" name="Telefonszam"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Nev" class="form-label">Név</label>
									<input type="text" class="form-control" id="Nev" name="Nev"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Lakcim" class="form-label">Lakcím</label>
									<input type="text" class="form-control" id="Lakcim" name="Lakcim"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Adoszam" class="form-label">Adószám</label>
									<input type="text" class="form-control" id="Adoszam" name="Adoszam"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Taj" class="form-label">Tajszám</label>
									<input type="text" class="form-control" id="Taj" name="Taj"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Anyja_neve" class="form-label">Anyja neve</label>
									<input type="text" class="form-control" id="Anyja_neve" name="Anyja_neve"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Szuletesi_ido" class="form-label">Születési idő</label>
									<input type="date" class="form-control" id="Szuletesi_ido" name="Szuletesi_ido"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Szuletesi_hely" class="form-label">Születési hely</label>
									<input type="text" class="form-control" id="Szuletesi_hely" name="Szuletesi_hel6y"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Szuletesi_nev" class="form-label">Születési név</label>
									<input type="text" class="form-control" id="Szuletesi_nev" name="Szuletesi_nev"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Bankszamla" class="form-label">Bankszámla</label>
									<input type="text" class="form-control" id="Bankszamla" name="Bankszamla"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Szepkartya" class="form-label">Szépkártya</label>
									<input type="text" class="form-control" id="Szepkartya" name="Szepkartya"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Magannyugdij" class="form-label">Magánnyugdíj</label>
									<input type="text" class="form-control" id="Magannyugdij" name="Magannyugdij"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Egeszsegpenztar" class="form-label">Egészségpénztár</label>
									<input type="text" class="form-control" id="Egeszsegpenztar" name="Egeszsegpenztar"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Gyerekek" class="form-label">Gyerekek száma</label>
									<input type="number" class="form-control" id="Gyerekek" name="Gyerekek"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Gyerekek_utan_jaro_szabadsag" class="form-label">Gyerekek után járó szabadság</label>
									<input
										type="number"
										class="form-control"
										id="Gyerekek_utan_jaro_szabadsag"
										name="Gyerekek_utan_jaro_szabadsag"
										  />
								</div>
							</div>

							<div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="Munkakor" class="form-label">Munkakör</label>
                                    <select class="form-control" id="Munkakor" name="Munkakor">
                                        <option value="">Válasszon munkakört</option>
                                        <?php include 'get_munkakorok.php'; ?>
                                    </select>
                                </div>
                            </div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Foglalkoztatasi_forma" class="form-label">Foglalkoztatási forma</label>
									<input
										type="text"
										class="form-control"
										id="Foglalkoztatasi_forma"
										name="Foglalkoztatasi_forma"
										  />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Felettes" class="form-label">Felettes</label>
									<input type="text" class="form-control" id="Felettes" name="Felettes"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Fizetes" class="form-label">Fizetés</label>
									<input type="number" class="form-control" id="Fizetes" name="Fizetes"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Vegzettseg" class="form-label">Végzettség</label>
									<input type="text" class="form-control" id="Vegzettseg" name="Vegzettseg"   />
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
										  />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Munkavegzes_helye" class="form-label">Munkahely</label>
									<input type="text" class="form-control" id="Munkavegzes_helye" name="Munkavegzes_helye"   />
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="mb-3">
									<label for="Munkaszerzodesek_kelte" class="form-label">Munkaszerzodes kezdete</label>
									<input
										type="date"
										class="form-control"
										id="Munkaszerzodesek_kelte"
										name="Munkaszerzodesek_kelte"
										  />
								</div>
							</div>
						</div>

						<div class="d-flex justify-content-between mt-4">
							<div>
								<a href="#" class="btn btn-outline-primary">Munkavállaló</a>
								<a href="index.php?p=munkakor" class="btn btn-outline-primary">Munkakör</a>
								<a href="index.php?p=jelenleti" class="btn btn-outline-primary">Jelenlétiív</a>
							</div>

							<button type="submit" class="btn btn-danger">Mentés</button>
						</div>
					</div>
				</div>
			</form>
		</div>

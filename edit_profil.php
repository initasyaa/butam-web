<?php include 'sidebar.php'; ?>
<link rel="stylesheet" href="add.css">

<style>
	input {
		border: none;
		outline: none;
		background: none;
		font-family: "Open Sans", Helvetica, Arial, sans-serif;
		display: block;
		width: 500px;
		margin-top: 18px;
		padding-bottom: 5px;
		font-size: 16px;
		border-bottom: 1px solid rgba(0, 0, 0, 0.4);
		text-align: left;
	}

	/* Responsive styles for mobile landscape mode */
	@media (max-width: 768px) and (orientation: landscape) {
		input {
			width: 100%;
			/* Full width for landscape mode on mobile devices */
			margin-top: 10px;
			/* Adjust margin if needed */
		}
	}

	/* Responsive styles for mobile portrait mode */
	@media (max-width: 768px) and (orientation: portrait) {
		input {
			width: 100%;
			/* Full width for portrait mode */
			margin-top: 10px;
			/* Adjust margin if needed */
		}
	}

	.btn-submit {
		height: 36px;
		padding: 0 16px;
		border-radius: 36px;
		background: var(--blue);
		color: var(--light);
		display: flex;
		justify-content: center;
		align-items: center;
		grid-gap: 10px;
		font-weight: 500;
		border: none;
		/* Remove default button border */
		cursor: pointer;
		/* Change cursor to pointer */
		font-size: 16px;
		/* Adjust font size if needed */
		text-align: center;
		/* Center text alignment */
	}

	.btn-submit:focus {
		outline: none;
		/* Remove default focus outline */
	}

	.btn-submit i {
		font-size: 18px;
		/* Adjust icon size if needed */
	}

	.btn-submit .text {
		margin-left: 8px;
		/* Adjust spacing between icon and text */
	}
</style>

<!-- MAIN -->
<main>
	<?php
	// Check if the user is logged in
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$q = $mysqli->query("SELECT * FROM admin WHERE username = '$username'");

		if ($q) {
			if ($q->num_rows > 0) {
				while ($dt = $q->fetch_assoc()) :
	?>

					<form action="update_profil.php" method="post">
						<div class="head-title">
							<div class="left">
								<h1>Edit Data Profile Admin</h1>
							</div>
							<button type="submit" name="submit" class="btn-submit">
								<i class='bx bxs-save'></i>
								<span class="text">Simpan Data</span>
							</button>
						</div>

						<div style="display: flex; justify-content: center; align-items: center;">
							<ul class='box-info' style="width: fit-content;">
								<li>
									<span>
										<div class="justify-content-center">
											<input type="hidden" name="id" value="<?php echo $dt['id']; ?>" />
											<label>
												<span>Nama Lengkap</span>
												<input type="name" name="nama" value="<?php echo $dt['nama']; ?>" />
												<br>
											</label>
											<label>
												<span>Username</span>
												<input type="name" name="username" value="<?php echo $dt['username']; ?>" />
												<br>
											</label>
											<label>
												<span>NIP</span>
												<input type="tex" name="nip" value="<?php echo $dt['nip']; ?>" />
												<br>
											</label>
											<label>
												<span>Password</span>
												<input type="typePasswordX" name="password" value="<?php echo $dt['password']; ?>" />
											</label>
										</div>
									</span>
								</li>
							</ul>
						</div>
					</form>
	<?php
				endwhile;
			} else {
				echo "<p>Data tidak ditemukan.</p>";
			}
		} else {
			echo "<p>Terjadi kesalahan pada query: " . $mysqli->error . "</p>";
		}
	} else {
		echo "<p>Anda belum login.</p>";
	}
	?>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="script.js"></script>
</body>

</html>
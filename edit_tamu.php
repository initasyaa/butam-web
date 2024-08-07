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
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$q = $mysqli->query("SELECT * FROM tamu WHERE id = '$id'");
		foreach ($q as $dt) :
	?>

	<form action="update_tamu.php" method="post">
		<div class="head-title">
			<div class="left">
				<h1>Edit Data Tamu</h1>
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
								<span>Nama</span>
								<input type="text" name="nama" value="<?php echo $dt['nama']; ?>" />
								<br>
							</label>
							<label>
								<span>Alamat</span>
								<input type="text" name="alamat" value="<?php echo $dt['alamat']; ?>" />
								<br>
							</label>
							<label>
								<span>Telepon</span>
								<input type="tel" name="phone" value="<?php echo $dt['phone']; ?>" />
								<br>
							</label>
							<label>
								<span>Keperluan</span>
								<input type="text" name="keperluan" value="<?php echo $dt['keperluan']; ?>" />
							</label>
						</div>
					</span>
				</li>
			</ul>
		</div>
	</form>
	<?php
  endforeach;
} ?>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="script.js"></script>
</body>

</html>
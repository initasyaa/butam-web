<?php include 'sidebar.php'; ?>
<link rel="stylesheet" href="add.css">

<style>

</style>
<!-- MAIN -->
<main>
	<form action="add_act.php" method="post" enctype="multipart/form-data">
		<div class="head-title">
			<div class="left">
				<h1>Tambah Data Tamu</h1>
			</div>
			<button type="submit" class="btn-submit">
				<i class='bx bxs-save'></i>
				<span class="text">Simpan Data</span>
			</button>
		</div>


		<div style="display: flex; justify-content: center; align-items: center;">
			<ul class='box-info' style="width: fit-content;">
				<li>
					<span>
						<div class="justify-content-center">
							<label>
								<span>Nama</span>
								<input type="text" name="nama" />
								<br>
							</label>
							<label>
								<span>Alamat</span>
								<input type="text" name="alamat" />
								<br>
							</label>
							<label>
								<span>Telepon</span>
								<input type="tel" name="phone" />
								<br>
							</label>
							<label>
								<span>Keperluan</span>
								<input type="text" name="keperluan" />
							</label>
						</div>
					</span>
				</li>
			</ul>
		</div>
	</form>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="script.js"></script>
</body>

</html>
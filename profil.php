<?php include 'sidebar.php'; ?>

<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Profile Admin</h1>
		</div>
		<a href="edit_profil.php" class="btn-download">
			<i class='bx bxs-edit'></i>
			<span class="text">Edit Profile</span>
		</a>
	</div>

	<?php

	// Ambil username dari sesi
	$username = $_SESSION['username'];

	$sql = "SELECT * FROM admin WHERE username = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('s', $username);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		// Output data dari baris yang ditemukan
		while ($row = $result->fetch_assoc()) {
			echo "
        <ul class='box-info'>
            <li>
                <span class='text'>
                    <h4>Nama Lengkap</h4>
                    <p>{$row['nama']}</p>
                    <br>
                    <h4>NIP</h4>
                    <p>{$row['nip']}</p>
                    <br>
                    <hr>
                    <h4>Username</h4>
                    <p>{$row['username']}</p>
                    <br>
                    <h4>Password</h4>
                    <p>{$row['password']}</p>
                </span>
            </li>
        </ul>";
		}
	} else {
		echo "No data found for the logged-in user.";
	}

	$stmt->close();
	$mysqli->close();
	?>


</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
</body>

</html>
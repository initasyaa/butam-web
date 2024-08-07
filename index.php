<?php include 'sidebar.php'; 

// Query untuk menghitung total tamu yang hadir hari ini
$today = date('Y-m-d'); // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
// Query untuk menghitung total tamu yang hadir hari ini
$result_today = $mysqli->query("SELECT COUNT(*) AS total_tamu_hari_ini FROM tamu WHERE DATE(created_at) = '$today'");

// Mendapatkan hasil query
$row_today = $result_today->fetch_assoc();
$total_tamu_hari_ini = $row_today['total_tamu_hari_ini'];

// Query untuk menghitung total tamu keseluruhan
$result_total = $mysqli->query("SELECT COUNT(*) AS total_tamu FROM tamu");

// Mendapatkan hasil query
$row_total = $result_total->fetch_assoc();
$total_tamu = $row_total['total_tamu'];

// Query untuk menghitung total admin
$result_admin = $mysqli->query("SELECT COUNT(*) AS total_admin FROM admin");

// Mendapatkan hasil query
$row_admin = $result_admin->fetch_assoc();
$total_admin = $row_admin['total_admin'];
?>


<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard</h1>
		</div>
	</div>

	<ul class="box-info">
		<li>
			<i class='bx bxs-calendar-check'></i>
			<span class="text">
				<h3><?php echo $total_tamu_hari_ini; ?></h3>
				<p>Tamu Hari Ini</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-group'></i>
			<span class="text">
				<h3><?php echo $total_tamu; ?></h3>
				<p>Total Tamu</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-user'></i>
			<span class="text">
				<h3><?php echo $total_admin; ?></h3>
				<p>Admin</p>
			</span>
		</li>
	</ul>

	<div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Tamu Terakhir</h3>
                <!-- <i class='bx bx-search'></i> -->
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Keperluan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch user data from the database
                    $sql = "SELECT * FROM tamu ORDER BY updated_at DESC, created_at DESC";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "
                        <tr>
                            <td>{$row['nama']}</td>
                            <td>{$row['alamat']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['keperluan']}</td>
                            <td>{$row['created_at']}</td>
                            
                        </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>0 results</td></tr>";
                    }

                    $mysqli->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
	
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
</body>

</html>
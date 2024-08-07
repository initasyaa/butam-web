<?php include 'sidebar.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="button.css">

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Buku Tamu</h1>
        </div>
        <a href="add.php" class="btn-download">
            <i class='bx bxs-plus-circle'></i>
            <span class="text">Tambah Tamu</span>
        </a>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Daftar Tamu</h3>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch user data from the database
                    $sql = "SELECT * FROM tamu ORDER BY created_at DESC";
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
                <td>
                    <a href='edit_tamu.php?id={$row['id']}' class='btn-edit' title='Edit'>
                        <i class='fas fa-edit'></i>
                    </a>
                    <a href='javascript:void(0);' class='btn-delete' title='Delete' onclick='confirmDelete({$row['id']});'>
                        <i class='fas fa-trash-alt'></i>
                    </a>
                </td>
            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>0 results</td></tr>";
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

<script>
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = 'delete_tamu.php?id=' + id;
        }
    }
</script>
</body>

</html>
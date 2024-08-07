<?php
require_once 'config.php';

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $phone = $_POST['phone'];
    $keperluan = $_POST['keperluan'];

    // Query untuk memperbarui data Tamu
    $q = $mysqli->query("UPDATE tamu SET nama = '$nama', alamat = '$alamat', phone = '$phone', keperluan = '$keperluan' WHERE id = '$id'");

    if ($q) {
        // Pesan jika data berhasil diubah
        echo "<script>alert('Data Tamu berhasil diubah'); window.location.href='buku_tamu.php'</script>";
    } else {
        // Pesan jika data gagal diubah
        echo "<script>alert('Data Tamu gagal diubah'); window.location.href='edit_tamu.php'</script>";
    }
} else {
    // Jika coba akses langsung halaman ini akan diredirect ke halaman Tamu
    header('Location: buku_tamu.php');
}
?>

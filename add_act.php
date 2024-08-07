<?php 
include 'config.php';

// Ambil data dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$phone = $_POST['phone'];
$keperluan = $_POST['keperluan'];

// Query untuk menyimpan data ke database
$query = "INSERT INTO tamu (nama, alamat, phone, keperluan) VALUES ('$nama', '$alamat', '$phone', '$keperluan')";

// Eksekusi query
if (mysqli_query($mysqli, $query)) {
    // Redirect ke halaman tamu dengan pesan sukses
    header("Location: buku_tamu.php?alert=berhasil");
} else {
    // Redirect ke halaman tamu dengan pesan gagal
    header("Location: add.php?alert=gagal");
}

// Tutup koneksi
mysqli_close($mysqli);
?>

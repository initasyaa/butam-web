<?php
session_start(); // Mulai sesi
require_once 'config.php';

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $password = $_POST['password'];

    // Ambil username dari sesi
    if (isset($_SESSION['username'])) {
        $current_username = $_SESSION['username'];

        // Query untuk memperbarui data Admin
        $q = $mysqli->query("UPDATE admin SET nama = '$nama', username = '$username', nip = '$nip', password = '$password' WHERE username = '$current_username'");

        if ($q) {
            // Perbarui username di sesi jika username berhasil diubah
            $_SESSION['username'] = $username;

            // Pesan jika data berhasil diubah
            echo "<script>alert('Data Admin berhasil diubah'); window.location.href='profil.php'</script>";
        } else {
            // Pesan jika data gagal diubah
            echo "<script>alert('Data Admin gagal diubah'); window.location.href='edit_profil.php'</script>";
        }
    } else {
        // Jika username tidak ditemukan di sesi, arahkan ke halaman login
        echo "<script>alert('Anda belum login.'); window.location.href='login.php'</script>";
    }
} else {
    // Jika coba akses langsung halaman ini akan diredirect ke halaman Admin
    header('Location: profil.php');
}
?>

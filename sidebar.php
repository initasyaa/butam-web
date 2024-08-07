<?php
// Mulai sesi
session_start();
include_once("config.php");
// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, alihkan ke halaman login
    header("Location: login.php");
    exit();
}

// Daftar halaman yang harus dianggap aktif
$tamu_pages = ['buku_tamu.php', 'add.php', 'edit_tamu.php'];
$admin_pages = ['profil.php', 'edit_profil.php'];
// Mendapatkan nama file saat ini
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">


    <title>BuTam Pengadilan Agama</title>
</head>

<body>

    <section id="sidebar">
        <a href="index.php" class="brand">
            <img src="img/logo.png" alt="Logo" style="width: auto; height: 70px; object-fit: cover; margin-top: 25px;">
            <span class="text" style="margin-top: 25px;">BukuTamu</span>
        </a>
        <ul class="side-menu top">
            <li class="<?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
                <a href="index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="<?php echo in_array($current_page, $tamu_pages) ? 'active' : ''; ?>">
                <a href="buku_tamu.php">
                    <i class='bx bxs-book'></i>
                    <span class="text">Buku Tamu</span>
                </a>
            </li>
            <li class="<?php echo in_array($current_page, $admin_pages) ? 'active' : ''; ?>">
                <a href="profil.php">
                    <i class='bx bxs-user'></i>
                    <span class="text">Profile Admin</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li class="<?php echo $current_page == 'settings.php' ? 'active' : ''; ?>">
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="index.php" class="text">Pengadilan Agama</a>

            <div style="display: flex; align-items: center; margin-left: auto;">
                <form action="#" hidden>
                    <div class="form-input">
                        <input type="search" placeholder="Search...">
                        <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                    </div>
                </form>
                <!-- <input type="checkbox" id="switch-mode" >
                <label for="switch-mode" class="switch-mode"></label> -->
            </div>
            <a href="profil.php" class="profile">
                <i class='bx bxs-user' style="font-size: 24px;"></i></a>
            <?php
            if (isset($_SESSION['username'])) {
                echo $_SESSION['username'];
            }
            ?>
        </nav>
        <!-- NAVBAR -->
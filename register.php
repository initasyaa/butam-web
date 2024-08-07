<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
  header("Location: index.php");
}

if (isset($_POST['register'])) {
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $nip = $_POST['nip'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if ($password == $cpassword) {
    $sql = "SELECT * FROM admin WHERE username='$username'";
    $result = mysqli_query($mysqli, $sql);
    if ($result && $result->num_rows == 0) {
      $sql = "INSERT INTO admin (nama, username, nip, password)
                    VALUES ('$nama','$username', '$nip', '$password')";
      $result = mysqli_query($mysqli, $sql);
      if ($result) {
        echo "<script>alert('Selamat, registrasi berhasil!')</script>";
        $nama = "";
        $username = "";
        $nip = "";
        $_POST['password'] = "";
        // Mengalihkan halaman kembali ke login.php
        header("location:login.php");
      } else {
        echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
      }
    } else {
      echo "<script>alert('Woops! nip Sudah Terdaftar.')</script>";
    }
  } else {
    echo "<script>alert('Password Tidak Sesuai')</script>";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Signin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .gradient-custom {
      /* fallback for old browsers */
      background: #6a11cb;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
  </style>
</head>

<body class="gradient-custom">
  <section>
    <form action="" method="POST">
      <div class="container py-4 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-4 text-center">

                <div class="mb-md-3 mt-md-4">

                  <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                  <p class="text-white-50 mb-5">Buku Tamu Pengadilan Agama</p>

                  <div data-mdb-input-init class="form-outline form-white mb-3">
                    <input type="name" id="nama" class="form-control form-control-lg" placeholder="Nama Lengkap" name="nama" required />
                  </div>


                  <div data-mdb-input-init class="form-outline form-white mb-3">
                    <input type="name" id="username" class="form-control form-control-lg" placeholder="Username" name="username" required />
                  </div>

                  <div data-mdb-input-init class="form-outline form-white mb-3">
                    <input type="text" id="nip" class="form-control form-control-lg" placeholder="nip" name="nip" required />
                  </div>

                  <div data-mdb-input-init class="form-outline form-white mb-3">
                    <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Password" name="password" required />
                  </div>

                  <div data-mdb-input-init class="form-outline form-white mb-3">
                    <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Confirm Password" name="cpassword" required />
                  </div>

                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="register">Register</button>

                </div>

                <div>
                  <p class="mb-0">Already have an account? <a href="login.php" class="text-white-50 fw-bold">Sign Up</a>
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</body>

</html>
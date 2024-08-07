<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
  header("Location:index.php");
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = ($_POST['password']);

  $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $result = mysqli_query($mysqli, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: index.php");
  } else {
    echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
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
      <div class="container mt-5 py-4 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-2">
                  <!-- <h2 class="fw-bold mb-2 text-uppercase">Login</h2> -->
                  <img src="img/logo.png" alt="Logo" style="width: 30%;">
                  <p class="text-white-50 mb-5">Buku Tamu Pengadilan Agama</p>

                  <div data-mdb-input-init class="form-outline form-white mb-4">
                    <input type="name" id="name" class="form-control form-control-lg" placeholder="Username" name="username" required />
                  </div>

                  <div data-mdb-input-init class="form-outline form-white mb-4">
                    <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Password" name="password" required />
                  </div>

                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login</button>
                </div>

                <div>
                  <p class="mb-0">Don't have an account? <a href="register.php" class="text-white-50 fw-bold" name="register">Sign Up</a>
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
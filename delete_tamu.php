<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
// Create database connection using config file
include_once("config.php");
if(isset($_GET['id'])):
     $stmt = $mysqli->prepare("DELETE FROM tamu WHERE id=?");
     $stmt->bind_param('s', $id);
 
     $id = $_GET['id'];
 
     if($stmt->execute()):
          echo "<script>location.href='buku_tamu.php'</script>";
     else:
          echo "<script>alert('".$stmt->error."')</script>";
     endif;
endif;
?>
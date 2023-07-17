<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="sudah_login"){
//melakukan pengalihan
header("location:frormlogin.php");
} 
?>
<!DOCTYPE html>
<html>
<head>
   <title>Halaman Admin SIMRS</title>
</head>
<body>
   <h3>Selamat datang : <?php echo $_SESSION['nama']; ?></h3>

   <br>
   <a href="logout.php">Logout</a>
</body>
</html>
<?php
// Check if form submitted, insert form data into users table
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Include database connection file
    include_once("config.php");

    // Insert user data into table
    $result = mysqli_query($koneksi, "INSERT INTO users (nama, username, password) VALUES ('$nama', '$username', '$password')");

    // Show message when user added
    if ($result) {
        $message = 'Data berhasil dimasukkan. Klik <a href="?url=user">di sini</a> untuk menuju ke tabel.';
        echo '<div class="notification">' . $message . '</div>';
        $url = '?url=user';
        echo '<script>setTimeout(function() { window.location.href = "' . $url . '"; }, 3000)</script>';
    } else {
        echo '<script>alert("Terjadi kesalahan dalam memasukkan data. Silakan coba lagi.")</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah User</title>
</head>
<style>
.notification {
    position: fixed;
    top: 70px; /* Sesuaikan dengan tinggi navbar Anda */
    left: 55%;
    transform: translateX(-50%);
    padding: 10px 20px;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    z-index: 9999;
}
</style>
<body>
    <form action="?url=register" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Username</label>
            <input class="form-control" type="text" name="username">
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Password</label>
            <input class="form-control" type="password" name="password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="?url=user" class="btn btn-danger btn-icon-split">
            <span class="text">Cancel</span>
        </a>
</div>
    </form>


</body>
</html>


<?php
// Check if form submitted, insert form data into users table
if (isset($_POST['submit'])) {
    $jenjang = $_POST['jenjang'];
    $nama_prodi= $_POST['nama_prodi'];

    // Include database connection file
    include_once("config.php");

    // Insert user data into table
    $result = mysqli_query($koneksi, "INSERT INTO prodi (jenjang, nama_prodi) VALUES ('$jenjang', '$nama_prodi')");

    // Show message when user added
    if ($result) {
        $message = 'Data berhasil dimasukkan. Klik <a href="?url=prodi">di sini</a> untuk menuju ke tabel.';
        echo '<div class="notification">' . $message . '</div>';
        $url = '?url=prodi';
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
    <title>Tambah Prodi</title>
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
    <form action="?url=tambah_prodi" method="post">
    <div class="mb-3">
            <label for="formFileSm" class="form-label">Jenjang</label>
            <input class="form-control" type="text" name="jenjang">
        </div>
        

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prodi</label>
            <input type="text" class="form-control" name="nama_prodi" aria-describedby="emailHelp">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="?url=prodi" class="btn btn-danger btn-icon-split">
            <span class="text">Cancel</span>
        </a>
</div>
    </form>

</body>
</html>

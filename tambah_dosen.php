<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nip= $_POST['nip'];
        $nama= $_POST['nama'];
        $hp = $_POST['hp'];
        $lulusan= $_POST['lulusan'];
        $alamat= $_POST['alamat'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result= mysqli_query($koneksi, "INSERT INTO dosen (nip,nama,hp,lulusan,alamat) VALUES('$nip','$nama','$hp','$lulusan','$alamat')");

        // Show message when user added
        if ($result) {
            $message = 'Data berhasil dimasukkan. Klik <a href="?url=dosen">di sini</a> untuk menuju ke tabel.';
            echo '<div class="notification">' . $message . '</div>';
            $url = '?url=dosen';
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
    <title>Tambah Dosen</title>
    
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
    <form action="?url=tambah_dosen" method="post">
        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" class="form-control" name="nip">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>

        <div class="mb-3">
            <label class="form-label">No.Hp</label>
            <input type="text" class="form-control" name="hp">
        </div>

        <div class="mb-3">
            <label class="form-label">Lulusan</label>
            <input type="text" class="form-control" name="lulusan">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" rows="3"></textarea>
        </div>

        <button type="Submit" name="Submit" class="btn btn-primary">Submit</button>
        <a href="?url=dosen" class="btn btn-danger btn-icon-split">
            <span class="text">Cancel</span>
        </a>
</div>
    </form>




</body>
</html>

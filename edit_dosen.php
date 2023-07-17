<?php


// include database connection file
include("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $nip= $_POST['nip'];
    $nama= $_POST['nama'];
    $hp = $_POST['hp'];
    $lulusan= $_POST['lulusan'];
    $alamat= $_POST['alamat'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE dosen SET nama='$nama', hp='$hp', lulusan='$lulusan', alamat='$alamat' WHERE nip='$nip'");


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


<?php
// Display selected user data based on id
// Getting id from url
if (isset($_GET['nip'])) {
$nip = $_GET['nip'];

// Fetch user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nip='$nip'");

 if ($result && mysqli_num_rows($result) > 0) {
  while($user_data = mysqli_fetch_array($result))
{   
    $nama= $user_data['nama'];
    $hp= $user_data['hp'];
    $lulusan= $user_data['lulusan'];
    $alamat= $user_data['alamat'];
}
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
    <form action="?url=edit_dosen" method="post" >
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>

        <div class="mb-3">
            <label  class="form-label">No.Hp</label>
            <input type="text" class="form-control" name="hp">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Lulusan</label>
            <input type="text" class="form-control" name="lulusan">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" rows="3"></textarea>
        </div>

        <input type="hidden" name="nip" value=<?php echo $nip;?>>
      <button type="Submit" name="update" class="btn btn-primary">Update</button>
      <a href="?url=dosen" class="btn btn-danger btn-icon-split">
        <span class="text">Cancel</span>
    </a>
    </div>
    
</form>
            




</body>
</html>
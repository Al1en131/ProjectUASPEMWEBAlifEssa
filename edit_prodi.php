<?php


// include database connection file
include("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id= $_POST['id'];
    $jenjang = $_POST['jenjang'];
    $nama_prodi= $_POST['nama_prodi'];
  

    // update user data
    $result = mysqli_query($koneksi, "UPDATE prodi SET  jenjang='$jenjang' , nama_prodi='$nama_prodi' WHERE id='$id'");


    // Redirect to homepage to display updated user in list
   
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


<?php
// Display selected user data based on id
// Getting id from url
if (isset($_GET['id'])) {
$id = $_GET['id'];

// Fetch user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM prodi WHERE id='$id'");

 if ($result && mysqli_num_rows($result) > 0) {
  while($user_data = mysqli_fetch_array($result))
{   
    $jenjang= $user_data['jenjang'];
    $nama_prodi= $user_data['nama_prodi'];
    
   
}
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
    <form action="?url=edit_prodi" method="post">
    <div class="mb-3">
            <label for="formFileSm" class="form-label">Jenjang</label>
            <input class="form-control" type="text" name="jenjang">
        </div>
        

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prodi</label>
            <input type="text" class="form-control" name="nama_prodi" aria-describedby="emailHelp">
        </div>
        
        <input type="hidden" name="id" value=<?php echo $id;?>>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="?url=prodi" class="btn btn-danger btn-icon-split">
            <span class="text">Cancel</span>
        </a>
</div>
    </form>


</body>
</html>

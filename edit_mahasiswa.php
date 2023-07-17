<?php


// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $nim= $_POST['nim'];
    $nama= $_POST['nama'];
    $prodi = $_POST['prodi'];
    $alamat= $_POST['alamat'];
    $foto= $_FILES['berkas']['name'];
    $namaFile = $_FILES['berkas']['name'];
    $namaSementara = $_FILES['berkas']['tmp_name'];
    // tentukan lokasi file akan dipindahkan
    $dirUpload = "uploads/";

// pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    if ($terupload) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
    } else {
        echo "Upload Gagal!";
    }
    include_once("config.php");


    // update user data
    $result = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', prodi='$prodi', alamat='$alamat', foto='$foto' WHERE nim='$nim'");


    // Redirect to homepage to display updated user in list
   
    
    if ($result) {
        $message = 'Data berhasil dimasukkan. Klik <a href="?url=mahasiswa">di sini</a> untuk menuju ke tabel.';
        echo '<div class="notification">' . $message . '</div>';
        $url = '?url=mahasiswa';
        echo '<script>setTimeout(function() { window.location.href = "' . $url . '"; }, 3000)</script>';
    } else {
        echo '<script>alert("Terjadi kesalahan dalam memasukkan data. Silakan coba lagi.")</script>';
    }
}
?>


<?php
// Display selected user data based on id
// Getting id from url
if (isset($_GET['nim'])) {
$nim = $_GET['nim'];

// Fetch user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim ='$nim'");

 if ($result && mysqli_num_rows($result) > 0) {
  while($user_data = mysqli_fetch_array($result))
{   
   $nim= $user_data['nim'];
    $nama= $user_data['nama'];
    $prodi= $user_data['prodi'];
    $alamat= $user_data['alamat'];
    $foto = $user_data['foto'];
}
}
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>


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
    <form action="?url=edit_mahasiswa" method="post" enctype="multipart/form-data">
    
        <div class="mb-3">
            <label  class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>

        <?php 
        include_once("config.php");
        $sql = mysqli_query($koneksi, "SELECT * FROM  prodi ORDER BY id ASC");
        ?>
        <div class="mb-3">
          <label class="form-label">Pilih Prodi</label>
          <select class="form-control" name="prodi">
            <option>Prodi</option>
            <?php
                // use a while loop to fetch data
                // from the $all_categories variable
                // and individually display as an option
            while ($category = mysqli_fetch_array(
                $sql,MYSQLI_ASSOC)):;
                ?>
                <option value="<?php echo $category["id"];?>">
                    <?php echo $category["jenjang"];?>
                    <?php echo $category["nama_prodi"];?>              
                    <?php
                endwhile; ?>
            </select>
        </div>


        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" rows="3" ></textarea>

        </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label">Foto</label>
          <input class="form-control" type="file" id="formFile"  name="berkas" >
            </div>
            <input type="hidden" name="nim" value="<?php echo  $nim;?>">
      

      <button type="Submit" name="update" class="btn btn-primary">Update</button>
      <a href="?url=mahasiswa" class="btn btn-danger btn-icon-split">
        <span class="text">Cancel</span>
    </a>
            </div>
    
</form>
        



</body>
</html>


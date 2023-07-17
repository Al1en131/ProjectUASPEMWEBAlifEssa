<?php

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
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


    // include database connection file
    include_once("config.php");

    // Insert user data into table
    $result= mysqli_query($koneksi, "INSERT INTO mahasiswa(nim,nama,prodi,alamat,foto) VALUES('$nim','$nama','$prodi','$alamat','$foto')");

    // Show message when user added
     
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mahasiswa</title>
   

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
    <form action="?url=tambah_mahasiswa" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nim</label>
            <input type="text" class="form-control" name="nim" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama</label>
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
            <textarea class="form-control" name="alamat" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label">Foto</label>
          <input class="form-control" type="file" id="formFile"  name="berkas"/ >
      </div>

      <button type="Submit" name="Submit" class="btn btn-primary">Submit</button>
      <a href="?url=mahasiswa" class="btn btn-danger btn-icon-split">
        <span class="text">Cancel</span>
    </a>
    </div>
    
</form>
            




</body>
</html>
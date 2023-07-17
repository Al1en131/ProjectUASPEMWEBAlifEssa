
<?php

include_once("config.php");


$result = mysqli_query($koneksi, "SELECT * FROM  mahasiswa INNER JOIN prodi ON prodi.id=mahasiswa.prodi");

?>

<html>
<head>
    <title>Data User</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <a href="?url=tambah_mahasiswa" class="btn btn-primary btn-icon-split">
        <span class="text">Tambah Data</span>
    </a><br><br>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tr>
                        <th>Nim</th><th>Nama</th> <th>Prodi</th> <th>Alamat</th> <th>Foto</th> <th>Aksi</th>
                    </tr>
                    <?php
                    while($user_data = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['nim']."</td>";
                        echo "<td>".$user_data['nama']."</td>";
                        echo "<td>".$user_data['nama_prodi']."</td>";
                        echo "<td>".$user_data['alamat']."</td>";
                        echo "<td align='center'><img src='uploads/$user_data[foto]' class='img-rounded' width='70' height='90'></td>";
                        echo "<td><a href='?url=edit_mahasiswa&nim=$user_data[nim]' class='btn btn-warning btn-icon-split'><span class='text'>Edit</span></a> | <a href='hapus_mahasiswa.php?nim=$user_data[nim]' class='btn btn-danger btn-icon-split'><span class='text'>Delete</span></a></td></tr>";
                        
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>

</html>

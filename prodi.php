
<?php

include_once("config.php");


$result = mysqli_query($koneksi, "SELECT * FROM  prodi ORDER BY nama_prodi ASC");
?>

<html>
<head>
    <title>Data Prodi</title>
</head>


<body>

<a href="?url=tambah_prodi" class="btn btn-primary btn-icon-split">
        <span class="text">Tambah Data</span>
    </a><br><br>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Prodi</h6>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

    <tr>
        <th>No</th> <th>Jenjang</th> <th>Nama Prodi</th> <th>Aksi</th>
    </tr>
    <?php
    include_once("config.php");
    $i=1;
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$user_data['jenjang']."</td>";
        echo "<td>".$user_data['nama_prodi']."</td>";
        echo "<td><a href='?url=edit_prodi&id=$user_data[id]' class='btn btn-warning btn-icon-split'><span class='text'>Edit</span></a> | <a href='hapus_prodi.php?id=$user_data[id]' class='btn btn-danger btn-icon-split'><span class='text'>Delete</span></a></td></tr>";
        $i++;
    }
    ?>
</table>
</div>
</div>
</div>
</div>
</body>

</html>


<?php

include_once("config.php");


$result = mysqli_query($koneksi, "SELECT * FROM  dosen ORDER BY nip ASC");
?>

<html>
<head>
    <title>Data Dosen</title>
</head>

<body>
<a href="?url=tambah_dosen" class="btn btn-primary btn-icon-split">
        <span class="text">Tambah Data</span>
    </a><br><br>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

    <tr>
        <th>No</th> <th>NIP</th> <th>Nama</th> <th>No.Hp</th> <th>Alamat</th> <th>Lulusan</th> <th>Aksi</th>
    </tr>
    <?php
    $i=1;
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$user_data['nip']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['hp']."</td>";
        echo "<td>".$user_data['alamat']."</td>";
        echo "<td>".$user_data['lulusan']."</td>";
        echo "<td><a href='?url=edit_dosen&nip=$user_data[nip]' class='btn btn-warning btn-icon-split'><span class='text'>Edit</span></a> | <a href='hapus_dosen.php?nip=$user_data[nip]' class='btn btn-danger btn-icon-split'><span class='text'>Delete</span></a></td></tr>";
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

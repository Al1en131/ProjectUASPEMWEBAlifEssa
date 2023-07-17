
<?php

include_once("config.php");


$result = mysqli_query($koneksi, "SELECT * FROM  users ORDER BY nama ASC");
?>

<html>
<head>
    <title>Data User</title>
</head>

<body>
<a href="?url=register" class="btn btn-primary btn-icon-split">
        <span class="text">Tambah Data</span>
    </a><br><br>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

    <tr>
        <th>No</th><th>Nama</th> <th>Username</th> <th>Password</th> <th>Aksi</th>
    </tr>
    <?php
    $i=1;
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['username']."</td>";
        echo "<td>".$user_data['password']."</td>";
        echo "<td><a href='?url=edit_user&id=$user_data[id]' class='btn btn-warning btn-icon-split'><span class='text'>Edit</span></a> | <a href='hapus_user.php?id=$user_data[id]' class='btn btn-danger btn-icon-split'><span class='text'>Delete</span></a></td></tr>";
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

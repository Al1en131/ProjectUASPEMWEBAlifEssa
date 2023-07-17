<?php
// include database connection file
include_once("config.php");


$nip = $_GET['nip'];

// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM dosen WHERE nip='$nip'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php?url=dosen");
?>
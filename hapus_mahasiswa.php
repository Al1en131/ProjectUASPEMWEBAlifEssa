<?php
// include database connection file
include_once("config.php");


$nim = $_GET['nim'];

// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim=$nim");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php?url=mahasiswa");
?>
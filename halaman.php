<?php

if(isset($_GET['url']))
{
    $url = $_GET['url'];
    switch($url){

        case 'user';
            include 'user.php';
            break;

        case 'mahasiswa';
        include 'mahasiswa.php';
        break;

        case 'tambah_mahasiswa';
        include 'tambah_mahasiswa.php';
        break;

        case 'edit_mahasiswa';
        include 'edit_mahasiswa.php';
        break;

        case 'register';
        include 'register.php';
        break;

        case 'edit_user';
        include 'edit_user.php';
        break;

        case 'prodi';
        include 'prodi.php';
        break;

        case 'tambah_prodi';
        include 'tambah_prodi.php';
        break;


        case 'edit_prodi';
        include 'edit_prodi.php';
        break;

        case 'dosen';
        include 'dosen.php';
        break;

        case 'tambah_dosen';
        include 'tambah_dosen.php';
        break;

        case 'edit_dosen';
        include 'edit_dosen.php';
        break;


    }
}
else
{
    ?>
   <?php include 'home.php';?>
    <?php
}



?>
<?php

if (isset($_POST['submit'])){
        
        session_start();
        include '../koneksi.php';
        include '../library/library.php';
        
        
        $idUser = $_POST['idUser'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $status = $_POST['status'];
         print_r($_POST);
         
         $edit = mysqli_query($koneksi, "UPDATE user SET nama_user='".$nama."',username='".$username."', password='".$password."', status='".$status."'WHERE id_user = '".$idUser."'");
        
        
         if ($edit){
            header('location: data_user.php');

        }
        else{
            echo '<h1>Input gagal</h1>';
         header('location: data_user.php?Message=' . urlencode("Gagal Edit"));
        }
    }
        ?>


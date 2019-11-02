<?php

if (isset($_POST['submit'])){
        
        session_start();
        include '../koneksi.php';
        include '../library/library.php';
        
        
        $idPetugas = $_POST[idPetugas];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $no_telp = $_POST['no_telp'];
        $poliklinik = $_POST['poliklinik'];
        $status = $_POST['status'];
         print_r($_POST);
         
         $edit = mysql_query("UPDATE petugas_kesehatan SET nama_petugas='".$nama."',alamat_petugas='".$alamat."', tempat_lahir='".$tempat_lahir."', tgl_lahir_petugas='".$tgl_lahir."', no_telp='".$no_telp."', poliklinik='".$poliklinik."', status='".$status."' WHERE id_petugas = '".$idPetugas."'");
        
        
         if ($edit){
            header('location: data_petugas.php');

        }
        else{
            echo '<h1>Input gagal</h1>';
         header('location: data_petugas.php?Message=' . urlencode("Gagal Edit"));
        }
    }
        ?>

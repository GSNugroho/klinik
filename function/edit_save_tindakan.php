<?php

if (isset($_POST['submit'])){
        
        session_start();
        include '../koneksi.php';
        include '../library/library.php';
        
        
        $idTindakan = $_POST[idTindakan];
        $namaTindakan = $_POST['namaTindakan'];
        $harga = $_POST['harga'];
        
        
         print_r($_POST);
         
         $edit = mysql_query("UPDATE daftar_tindakan SET nama_tindakan='".$namaTindakan."',harga_tindakan='".$harga."' WHERE id_tindakan = '".$idTindakan."'");
        
        
         if ($edit){
            header('location: data_tindakan.php');

        }
        else{
            echo '<h1>Input gagal</h1>';
         header('location: data_tindakan.php?Message=' . urlencode("Gagal Edit"));
        }
    }
        ?>

<?php


        
        session_start();
        include '../koneksi.php';
        include '../library/library.php';
        
        
        $idPetugas = $_POST['id'];
        $nama = $_POST['nmpe'];
        $alamat = $_POST['alpe'];
        $tempat_lahir = $_POST['tmlh'];
        $tgl_lahir = date('Y-m-d', strtotime($_POST['tllh']));
        $no_telp = $_POST['notl'];
        $poliklinik = $_POST['poli'];
        $status = $_POST['stpe'];
        //  print_r($_POST);
         
         $edit = mysqli_query($koneksi, "UPDATE petugas_kesehatan SET nama_petugas='".$nama."',alamat_petugas='".$alamat."', tempat_lahir='".$tempat_lahir."', tgl_lahir_petugas='".$tgl_lahir."', no_telp='".$no_telp."', poliklinik='".$poliklinik."', status='".$status."' WHERE id_petugas = '".$idPetugas."'");
        
        
         if ($edit){
            header('location: data_petugas.php');

        }
        else{
            echo '<h1>Input gagal</h1>';
         header('location: data_petugas.php?Message=' . urlencode("Gagal Edit"));
        }

        ?>

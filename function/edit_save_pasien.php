<?php

    if (isset($_POST['submit'])){
        
        session_start();
        include '../koneksi.php';
        include '../library/library.php';

        $norm = $_POST['norm'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $umur = $_POST['umur'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        print_r($_POST);

        $edit = mysql_query("UPDATE pasien SET nama_pasien='".$nama."',alamat_pasien='".$alamat."', tempat_lahir='".$tempat_lahir."', tgl_lahir_pasien='".$tgl_lahir."', umur='".$umur."', jk_pasien='".$jenis_kelamin."' WHERE no_rm = '".$norm."'");
        
//        $input= mysql_query("INSERT INTO pasien (no_rm, nama_pasien, alamat_pasien, 
//                                                tempat_lahir, tgl_lahir_pasien, umur, jk_pasien, tgl_daftar, id_user) 
//                                                VALUES ('$norm','$nama','$alamat','$tempat_lahir','$tgl_lahir','$umur',
//                                                    '$jenis_kelamin','$tgl_daftar','$id_user')") or die(mysql_error());
        if ($edit){
            header('location: data_pasien.php');

        }
        else{
            echo '<h1>Input gagal</h1>';
         header('location: data_pasien.php?Message=' . urlencode("Gagal Edit"));
        }
    }

?>

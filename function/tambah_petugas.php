<?php

session_start();
include '../koneksi.php';
include '../library/library.php';

$id_user = $_SESSION['id_user'];
$idPetugas = buatKode("petugas_kesehatan", "P");
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

$tempat_lahir = $_POST['tempat_lahir'];

$tgl_lahir = $_POST['tgl_lahir'];
$no_telp = $_POST['no_telp'];
$poliklinik = $_POST['poliklinik'];
$status = $_POST['status'];


$input= mysql_query("INSERT INTO petugas_kesehatan (id_petugas, nama_petugas, alamat_petugas, 
					tempat_lahir, tgl_lahir_petugas, no_telp, poliklinik, id_user, status) 
					VALUES ('$idPetugas','$nama','$alamat','$tempat_lahir','$tgl_lahir','$no_telp',
                                            '$poliklinik','$id_user', '$status')") or die(mysql_error());
if ($input){
    header('location: data_petugas.php');
    
}
else{
    echo '<h1>Input gagal</h1>';
 header('location: penambahan_petugas.php?Message=' . urlencode("Gagal Input"));
}
?>

<?php

session_start();
include '../koneksi.php';
include '../library/library.php';

$id_user = $_SESSION['id_user'];
$idTindakan = buatKode("daftar_tindakan", "T");
$namaTindakan = $_POST['namaTindakan'];
$harga = $_POST['harga'];



$input= mysqli_query($koneksi, "INSERT INTO daftar_tindakan (id_tindakan, nama_tindakan, harga_tindakan) 
					VALUES ('$idTindakan','$namaTindakan','$harga')") or die(mysqli_error($koneksi));
if ($input){
    header('location: data_tindakan.php');
    
}
else{
    echo '<h1>Input gagal</h1>';
 header('location: penambahan_tindakan.php?Message=' . urlencode("Gagal Input Data"));
}
?>

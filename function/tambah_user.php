<?php

//session_start();
include '../koneksi.php';
include '../library/library.php';

//$id_user = $_SESSION['id_user'];
$idUser = buatKode("user", "U");
$nama = $_POST['nama'];
$username = $_POST['username'];

$password = md5($_POST['password']);

$level = $_POST['level'];
$cabang = $_POST['cabang'];
$status = $_POST['status'];



$input= mysqli_query($koneksi, "INSERT INTO user (id_user, nama_user, username, 
					password, level, cabang, status) 
					VALUES ('$idUser','$nama','$username','$password','$level','$cabang', '$status')") or die(mysqli_error($koneksi));
if ($input){
    header('location: data_user.php');
    
}
else{
    echo '<h1>Input gagal</h1>';
 header('location: penambahan_user.php?Message=' . urlencode("Gagal Input"));
}
?>


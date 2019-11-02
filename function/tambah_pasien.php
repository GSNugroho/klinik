<?php
session_start();
include '../koneksi.php';
include '../library/library.php';

$id_user = $_SESSION['id_user'];
$norm = buatKode("pasien", "RM");
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$tmpt_lahir = $_POST['t_lahir'];
$nik = $_POST['nik'];
$tgl_lahir = $_POST['tgl_lahir'];
$agama = $_POST['agama'];
$negara = $_POST['negara'];
$sts_kawin = $_POST['st_kawin'];
$pendidikan = $_POST['pndd'];
$pekerjaan = $_POST['pkrj'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$hp = $_POST['hp'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kt_kab'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];
$pegrs = $_POST['pegrs'];
$tinggi = $_POST['tinggi'];
$berat = $_POST['berat'];
$lingkarp = $_POST['lingkarp'];
$imp = $_POST['imt'];
$sistole = $_POST['sistole'];
$diastole = $_POST['diastole'];
$r_rate = $_POST['r_rate'];
$h_rate = $_POST['h_rate'];
$nm_wali = $_POST['nm_wali'];
$hub_wali = $_POST['hub_wali'];
$nm_ortu = $_POST['nm_ortu'];
$pkrj_wali = $_POST['pkrj_wali'];
$tgl_dftr = $_POST['tgl_dftr'];


$input= mysqli_query($koneksi, "INSERT INTO pasien (no_rm, nama_pasien, alamat_pasien, 
					tempat_lahir, tgl_lahir_pasien, umur, jk_pasien, tgl_daftar, id_user) 
					VALUES ('$norm','$nama','$alamat','$tempat_lahir','$tgl_lahir','$umur',
                                            '$jenis_kelamin','$tgl_daftar','$id_user')") or die(mysql_error());
if ($input){
    header('location: data_pasien.php');
    
}
else{
    echo '<h1>Input gagal</h1>';
 header('location: penambahan_pasien.php?Message=' . urlencode("Gagal Input"));
}
?>

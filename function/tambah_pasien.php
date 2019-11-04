<?php
session_start();
include '../koneksi.php';
include '../library/library.php';

$id_user = $_SESSION['id_user'];
$norm = buatKode("pasien_b", "RM");
$nm_pasien = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$tmpt_lahir = date('Y-m-d', strtotime($_POST['t_lahir']));
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
$tgl_dftr = date('Y-m-d', strtotime($_POST['tgl_dftr']));
$umur = $tgl_dftr-$tgl_lahir;
echo $umur;
// $input= mysqli_query($koneksi, "INSERT INTO pasien (no_rm, nama_pasien, alamat_pasien, 
// 					tempat_lahir, tgl_lahir_pasien, umur, jk_pasien, tgl_daftar, id_user) 
// 					VALUES ('$norm','$nama','$alamat','$tempat_lahir','$tgl_lahir','$umur',
//                                             '$jenis_kelamin','$tgl_daftar','$id_user')") or die(mysql_error());
                                            
$input= mysqli_query($koneksi, "INSERT INTO pasien_b (no_rm, nm_pasien, jk_pasien, tmpt_lahir,
                    nik, tgl_lahir, agm_pasien, neg_pasien, sts_kwn, pend_pasien, pkrj_pasien, alamat_pasien,
                    tlp_pasien, hp_pasien, prov_pasien, kot_pasien, kec_pasien, kel_pasien, rt_pasien, rw_pasien,
                    peg_rs, tinggi_pasien, berat_pasien, lp_pasien, imp_pasien, sis_pasien, dia_pasien, rr_pasien,
                    hr_pasien, nm_wali, hub_wali, nm_ortu, pkrj_wali, tgl_daftar_pasien, id_user) 
                    
VALUES ('$norm','$nm_pasien','$kelamin','$tmpt_lahir','$nik','$tgl_lahir','$agama',
        '$negara','$sts_kawin','$pendidikan','$pekerjaan','$alamat','$telpon',
        '$hp','$provinsi','$kota','$kecamatan','$kelurahan','$rt','$rw','$pegrs',
        '$tinggi','$berat','$lingkarp','$imp','$sistole','$diastole','$r_rate','$h_rate',
        '$nm_wali','$hub_wali','$nm_ortu','$pkrj_wali','$tgl_dftr','$id_user')") or die(mysqli_error($koneksi));
if ($input){
    header('location: data_pasien.php');
    
}
else{
    echo '<h1>Input gagal</h1>';
 header('location: penambahan_pasien.php?Message=' . urlencode("Gagal Input"));
}
?>

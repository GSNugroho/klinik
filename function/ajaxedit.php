<?php
include '../koneksi.php';
 
$query = mysqli_query($koneksi, "SELECT no_rm, nm_pasien, jk_pasien, tmpt_lahir, nik, DATE_FORMAT(tgl_lahir, '%d-%m-%Y') as tgl_lahir, 
agm_pasien, neg_pasien, sts_kwn, pend_pasien, pkrj_pasien, alamat_pasien, tlp_pasien, hp_pasien, prov_pasien, kot_pasien, kec_pasien, 
kel_pasien, rt_pasien, rw_pasien, peg_rs, tinggi_pasien, berat_pasien, lp_pasien, imp_pasien, sis_pasien, dia_pasien, rr_pasien, 
hr_pasien, nm_wali, hub_wali, nm_ortu, pkrj_wali FROM pasien_b WHERE no_rm ='".mysqli_escape_string($koneksi, $_GET['id'])."'");
$data = mysqli_fetch_array($query);
 
echo json_encode($data);
?>
<?php
include '../koneksi.php';
 
$query = mysqli_query($koneksi, "SELECT pasien_b.no_rm as no_rm, nm_pasien, jk_pasien, tmpt_lahir, nik, DATE_FORMAT(tgl_lahir, '%d-%m-%Y') as tgl_lahir, 
agm_pasien, neg_pasien, sts_kwn, pend_pasien, pkrj_pasien, alamat_pasien, tlp_pasien, hp_pasien, prov_pasien, kot_pasien, kec_pasien, 
kel_pasien, rt_pasien, rw_pasien, peg_rs, tinggi_pasien, berat_pasien, lp_pasien, imp_pasien, sis_pasien, dia_pasien, rr_pasien, 
hr_pasien, nm_wali, hub_wali, nm_ortu, pkrj_wali, no_bpjs, DATE_FORMAT(tgl_periksa, '%d-%m-%Y') as tgl_periksa, poliklinik, nama_indonesia, id_kunjungan
FROM pasien_b LEFT JOIN pasien_bpjs ON pasien_b.no_rm = pasien_bpjs.no_rm_bpjs 
LEFT JOIN kunjungan ON pasien_b.no_rm = kunjungan.no_rm
LEFT JOIN diagnosis ON kunjungan.id_diagnosis = diagnosis.id_diagnosis
WHERE pasien_b.no_rm='".mysqli_escape_string($koneksi, $_POST['dtrm'])."'");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
 
echo json_encode($data);
?>
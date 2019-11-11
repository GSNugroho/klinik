<?php
include '../koneksi.php';

$query = mysqli_query($koneksi, "SELECT id_kunjungan, kunjungan.no_rm as rm, nm_pasien, cabang, tgl_periksa, biaya_periksa, poliklinik, nama_indonesia FROM kunjungan 
INNER JOIN user on kunjungan.id_user = user.id_user 
LEFT JOIN pasien_b on kunjungan.no_rm = pasien_b.no_rm 
INNER JOIN diagnosis on kunjungan.id_diagnosis = diagnosis.id_diagnosis
WHERE id_kunjungan = '".mysqli_escape_string($koneksi, $_GET['id'])."'");

$data = mysqli_fetch_array($query);

echo json_encode($data);
?>
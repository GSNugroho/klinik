<?php
include "../koneksi.php";

$query = mysqli_query($koneksi, "SELECT kunjungan.id_kunjungan as id_kunjungan, kunjungan.no_rm as rm, nm_pasien, cabang, tgl_periksa, total_tindakan, nama_petugas, nama_indonesia, id_resep FROM kunjungan 
INNER JOIN user on kunjungan.id_user = user.id_user 
LEFT JOIN pasien_b on kunjungan.no_rm = pasien_b.no_rm 
INNER JOIN diagnosis on kunjungan.id_diagnosis = diagnosis.id_diagnosis
INNER JOIN petugas_kesehatan on kunjungan.id_petugas = petugas_kesehatan.id_petugas 
LEFT JOIN resep on kunjungan.id_kunjungan = resep.id_kunjungan 
WHERE kunjungan.id_kunjungan = '".mysqli_escape_string($koneksi, $_GET['id'])."'");

$data = mysqli_fetch_array($query);

echo json_encode($data);
?>
<?php

session_start();
include '../koneksi.php';
include '../library/library.php';


if (isset($_POST['tambah'])) {
    $id_kunjungan = $_POST['idku'];
    $id_petugas = $_POST['pers'];
    $poliklinik = $_POST['poli'];
    $diagnosis = $_POST['diag'];
    $id_tindakan = $_POST['tind'];
    $jmlh_tind = $_POST['jmlh'];
    $user = $_POST['usin'];
    $query_diagnosis = mysqli_query($koneksi, "SELECT id_diagnosis FROM diagnosis WHERE nama_indonesia = '$diagnosis'");
    $cari_diagnosis = mysqli_fetch_array($query_diagnosis);
    $id_diagnosis = $cari_diagnosis['id_diagnosis'];
    $query = "INSERT INTO tmp_tindakan_medis (id_kunjungan, poliklinik, id_diagnosis, id_tindakan, id_petugas, jmlh_tind, id_user) 
    VALUES ('$id_kunjungan','$poliklinik', '$id_diagnosis', '$id_tindakan', '$id_petugas', '$jmlh_tind', '$user')";

    $input_tindakan = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    // header('location: add_rawatjalan.php?rm=' . $_SESSION['rm']);
}

if ($_GET['id']) {

    $diskon = $_GET['dskn'];
    $query = "SELECT tmp_tindakan_medis.id_kunjungan AS kunjungan ,tmp_tindakan_medis.poliklinik AS poli ,tmp_tindakan_medis.id_diagnosis AS diag ,tmp_tindakan_medis.id_tindakan AS tindakan ,tmp_tindakan_medis.id_petugas AS petugas ,daftar_tindakan.harga_tindakan AS total, tmp_tindakan_medis.jmlh_tind AS jmlh FROM tmp_tindakan_medis 
    INNER JOIN daftar_tindakan ON tmp_tindakan_medis.id_tindakan = daftar_tindakan.id_tindakan WHERE tmp_tindakan_medis.id_kunjungan = '" . $_GET['id'] . "'";
    $date = date('Y-m-d');
    $load = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    $total = 0;

    while ($hasil = mysqli_fetch_array($load)) {
        $total = $total + ($hasil['total'] * $hasil['jmlh']);
        $poli = $hasil['poli'];
        $diag = $hasil['diag'];
        $id_tin = $hasil['tindakan'];
        $pet = $hasil['petugas'];
        $jmlh = $hasil['jmlh'];

        $id = $_GET['id'];

        $query = "INSERT INTO tindakan_medis (poliklinik, id_diagnosis, id_tindakan, id_petugas, id_kunjungan, jmlh_tind) VALUES ('$poli', '$diag', '$id_tin', '$pet', '$id', '$jmlh')";
        $input_tindakan = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    }
    $total_bayar = $total - $diskon;
    $update = mysqli_query($koneksi, "UPDATE kunjungan SET biaya_periksa ='$total', diskon_tindakan = '$diskon', total_tindakan = '$total_bayar' WHERE id_kunjungan = '" . $_GET['id'] . "'") or die(mysqli_error($koneksi));


    $delete = "DELETE FROM tmp_tindakan_medis where id_kunjungan='" . $_GET['id'] . "'";
    $die = mysqli_query($koneksi, $delete) or die(mysqli_error($koneksi));
    $id_kuitansi = buatKode("kuitansi", "K");


    $insert_kuitansi = mysqli_query($koneksi, "INSERT INTO kuitansi (id_kuitansi, id_kunjungan, id_user, biaya_periksa, biaya_resep, total_bayar) 
    VALUES 
    ('" . $id_kuitansi . "', '" . $_GET['id'] . "', '" . $_SESSION['id_user'] . "', '" . $total . "', '0', '" . $total . "')");

    header('location: data_rawatjalan.php');
}

if (isset($_GET['delete'])) {
    $query = "Delete from tmp_tindakan_medis where id_tmp_tm = " . $_GET['id'];

    $jipot = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    header('location: add_rawatjalan.php?rm=' . $_SESSION['rm']);
}

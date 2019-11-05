<?php

session_start();
include '../koneksi.php';
include '../library/library.php';
if (!isset($_SESSION['level'])) {
    header('location:../../index.php');
}
$id_user = $_SESSION['id_user'];
if (isset($_GET['i'])) {
    $id_kunjungan = $_GET['i'];

    $query_resep = mysqli_query($koneksi, "SELECT id_kunjungan FROM resep WHERE id_kunjungan ='" . $id_kunjungan . "'");
    $cb = mysqli_fetch_array($query_resep);

    if ($cb['id_kunjungan'] == $_GET['i']) {

        $query = mysqli_query($koneksi, "SELECT * FROM kunjungan k INNER JOIN resep r on k.id_kunjungan = r.id_kunjungan where k.id_kunjungan = '" . $id_kunjungan . "'");
        while ($hasil = mysql_fetch_array($query)) {
            $id_kuitansi = buatKode("kuitansi", "K");
            $id_resep = $hasil['id_resep'];
            $biaya_periksa = $hasil['biaya_periksa'];
            $biaya_resep = $hasil['biaya_resep'];
            $total_bayar = $biaya_periksa + $biaya_resep;
            $insert_kuitansi = mysqli_query($koneksi, "INSERT INTO kuitansi (id_kuitansi, id_kunjungan, id_user, id_resep, biaya_periksa, biaya_resep, total_bayar) VALUES 
                ('".$id_kuitansi."', '".$id_kunjungan."', '".$id_user."', '".$id_resep."', '".$biaya_periksa."', '".$biaya_resep."', '".$total_bayar."')");
            
        }
    } else {
        $query = mysqli_query($koneksi, "SELECT * FROM kunjungan k where k.id_kunjungan = '" . $id_kunjungan . "'");
        while ($hasil = mysqli_fetch_array($query)) {
            $id_kuitansi = buatKode("kuitansi", "K");
//            $id_resep = $hasil['id_resep'];
            $biaya_periksa = $hasil['biaya_periksa'];
//            $biaya_resep = $hasil['biaya_resep'];
            $total_bayar = $biaya_periksa;
            $insert_kuitansi = mysqli_query($koneksi, "INSERT INTO kuitansi (id_kuitansi, id_kunjungan, id_user, biaya_periksa, biaya_resep, total_bayar) VALUES 
                ('".$id_kuitansi."', '".$id_kunjungan."', '".$id_user."', '".$biaya_periksa."', '0', '".$total_bayar."')");
        }
    }
    
}
?>


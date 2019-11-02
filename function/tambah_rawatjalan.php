<?php

session_start();
include '../koneksi.php';
include '../library/library.php';


if (isset($_POST['btntambah'])) {
    $id_kunjungan = buatKode("kunjungan", "RJ");
//$no_rm = $_POST['no_rm'];
//$id_user = $_SESSION['id_user'];
//$tgl_periksa = $_POST['tgl_periksa'];
////$biaya_periksa = $
//$id_tm = buatKode("tindakan_medis", "TM");
    $id_kunjungan = $_POST['id_kunjungan'];
    $id_petugas = $_POST['pilihPetugas'];
    $poliklinik = $_POST['poliklinik'];
    $diagnosis = $_POST['diagnosis'];
    $id_tindakan = $_POST['daftarTindakan'];
    $query_diagnosis = mysql_query("SELECT id_diagnosis FROM diagnosis WHERE nama_indonesia = '$diagnosis'");
    $cari_diagnosis = mysql_fetch_array($query_diagnosis);
    $id_diagnosis = $cari_diagnosis['id_diagnosis'];
    $query = "INSERT INTO tmp_tindakan_medis (id_kunjungan,poliklinik, id_diagnosis, id_tindakan, id_petugas) VALUES ('$id_kunjungan','$poliklinik', '$id_diagnosis', '$id_tindakan', '$id_petugas')";

    $input_tindakan = mysql_query($query) or die(mysql_error());
    header('location: add_rawatjalan.php?rm=' . $_SESSION['rm']);
}

if ($_GET['id']) {

//$id_tm = buatKode("tindakan_medis", "TM");
    $query = "select distinct p.poliklinik as poli, p.id_diagnosis as diag,p.id_tindakan as tin,p.id_petugas as pet,u.harga_tindakan as total
from tmp_tindakan_medis p INNER JOIN daftar_tindakan u ON p.id_tindakan = u.id_tindakan where p.id_kunjungan = '" . $_GET['id'] . "'";
    $date = date('Y-m-d');
    $load = mysql_query($query) or die(mysql_error());
    $total = 0;
    $masuk = mysql_query("INSERT INTO kunjungan (id_kunjungan, no_rm, id_user, tgl_periksa)
                    VALUES ('" . $_GET['id'] . "', '" . $_SESSION['rm'] . "', '" . $_SESSION['id_user'] . "', '$date')") or die(mysql_error());

    while ($hasil = mysql_fetch_array($load)) {
        $total = $total + $hasil['total'];
        $poli = $hasil['poli'];
        $diag = $hasil['diag'];
        $id_tin = $hasil['tin'];
        $pet = $hasil['pet'];

        $id = $_GET['id'];

        $query = "INSERT INTO tindakan_medis (poliklinik, id_diagnosis, id_tindakan, id_petugas,id_kunjungan) VALUES ('$poli', '$diag', '$id_tin', '$pet','$id')";
        $input_tindakan = mysql_query($query) or die(mysql_error());
    }
    $update = mysql_query("UPDATE kunjungan SET biaya_periksa ='$total' WHERE id_kunjungan = '" . $_GET['id'] . "'") or die(mysql_error());


    $delete = "DELETE FROM tmp_tindakan_medis where id_kunjungan='" . $_GET['id'] . "'";
    $die = mysql_query($delete) or die(mysql_error());
    $id_kuitansi = buatKode("kuitansi", "K");


    $insert_kuitansi = mysql_query("INSERT INTO kuitansi (id_kuitansi, id_kunjungan, id_user, biaya_periksa, biaya_resep, total_bayar) VALUES 
                ('" . $id_kuitansi . "', '" . $_GET['id'] . "', '" . $_SESSION['id_user'] . "', '" . $total . "', '0', '" . $total . "')");

    header('location: data_rawatjalan.php');
}

if (isset($_GET['delete'])) {
    $query = "Delete from tmp_tindakan_medis where id_tmp_tm = " . $_GET['delete'];

    $jipot = mysql_query($query) or die(mysql_error());
    header('location: add_rawatjalan.php?rm=' . $_SESSION['rm']);
}


//$input = mysql_query("INSERT INTO kunjungan (id_kunjungan, no_rm, id_user, tgl_periksa, biaya_periksa)
//                    VALUES ('$id_kunjungan', '$no_rm', '$id_user', '$tgl_periksa', '$biaya_periksa')") or die(mysql_error());
//}
//if ($input){
//    header('location: data_rawatjalan.php');
//    
//}
//else{
//    echo '<h1>Input gagal</h1>';
// header('location: data_rawatjalan.php?Message=' . urlencode("Gagal Input"));
//}
//
//$input_tindakan = mysql_query("INSERT INTO tindakan_medis (id_tm, id_kunjungan, id_petugas, poliklinik, diagosis, id_tindakan)
//                            VALUES ('$id_tm', '$id_kunjungan', '$pilihPetugas', '$poliklinik', '$diagnosis', '$daftarTindakan')") or die(mysql_error());
//if ($input_tindakan){
//    header('location: add_rawatjalan.php');
//    
//}
//else{
//    echo '<h1>Input gagal</h1>';
// header('location: add_rawatjalan.php?Message=' . urlencode("Gagal Input"));
//}
?>

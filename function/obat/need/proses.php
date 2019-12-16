<?php

session_start();
include '../../../koneksi.php';
include '../../../library/library.php';

if (isset($_POST['aksi'])) {
    $id_user = $_SESSION['id_user'];
    $id_obat = buatKode("obat", "O");

    $idob = $_POST['id'];
    $nmob = $_POST['nmob'];
    $nmdg = $_POST['nmdg'];
    $hrbl = $_POST['hrbl'];
    $hrjl = $_POST['hrjl'];
    $jmob = $_POST['jmob'];

    //proses membuat obat
    if ($_POST['aksi'] == 'tambah') {

        $query = mysqli_query($koneksi, "INSERT INTO obat (id_obat, id_user, nama_obat, nama_dagang, "
                . "harga_beli, harga_jual, stok) VALUES ('" . $id_obat . "','" . $id_user . "','" . $nmob . "','" . $nmdg . "','" . $hrbl . "','" . $hrjl . "','" . $jmob . "')");
        
        header('location:../data_obat.php');
    }
    //proses mengedit data obat
    if ($_POST['aksi'] == 'editObat') {

        $query1 = mysqli_query($koneksi, "UPDATE obat SET nama_obat = '" . $nmob . "' , nama_dagang = '" . $nmdg . "', harga_beli ='" . $hrbl . "', harga_jual ='" . $hrjl . "', stok = '" . $jmob . "' WHERE id_obat = '" . $idob . "' ");

        // header('location:../data_obat.php');
    }
}

//proses dalam membuat resep
if ($_POST['btnt'] == 'tambaho') {
    //masukkan ke temp_detail_resep /keranjang
    $id_resep = $_POST['idrp'];
    // if($id_resep == ''){
    //     $id_resep = buatKode("resep", "R");
    // }
    $id_obat = $_POST['idob'];
    $petugas = $_POST['ptob'];
    $query_petugas = mysqli_query($koneksi, "SELECT id_petugas FROM petugas_kesehatan WHERE nama_petugas = '$petugas'");
    $cari_petugas = mysqli_fetch_array($query_petugas);
    $id_petugas = $cari_petugas['id_petugas'];
    $id_kunjungan = $_POST['idku'];
    $jumlah = $_POST['jmob'];
    $aturan_pakai = $_POST['atpi'];
    $date = date('Y-m-d');

    $q = mysqli_query($koneksi, "SELECT id_resep FROM resep WHERE id_resep = '".$id_resep."'");
    $cek = mysqli_fetch_array($q);
    if($cek == FALSE){
        $query_roku = mysqli_query($koneksi, "INSERT INTO resep (id_resep, id_kunjungan, id_user) VALUE ('".$id_resep."', '".$id_kunjungan."', '".$_SESSION['id_user']."')");
    }

    $qsobat = mysqli_query($koneksi, "SELECT * FROM obat WHERE id_obat='".$id_obat."'");
    while($row = mysqli_fetch_array($qsobat)){
        $stok = $row['stok'];
        $sisa = $stok-($jumlah);

        $stok_obat = mysqli_query($koneksi, "UPDATE obat SET stok='".$sisa."' WHERE id_obat='".$id_obat."'");
    }
    //masukkan nilai dalam form ke dalam temp_detail_resep
    $query = "INSERT INTO tmp_detail_resep (id_resep, id_obat, jumlah_obat, aturan_pakai, id_petugas, id_rajal) VALUES ('" . $id_resep . "', '" . $id_obat . "', '" . $jumlah . "', '" . $aturan_pakai . "','" . $id_petugas . "','" . $id_kunjungan . "')";
    $input_detail = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    header('location: ../buat_resep.php?id_kunjungan=' . $id_kunjungan);
} elseif ($_POST['btns'] == 'simpano') {
    //insert resep
    $id_resep = $_POST['idrp'];
    // $id_obat = $_POST['pilihObat'];
    // $id_petugas = $_POST['pilihPetugas'];
    $id_kunjungan = $_POST['idku'];
    // $jumlah = $_POST['jumlah_obat'];
    // $aturan_pakai = $_POST['aturan'];
    $diskon = $_POST['dskn'];

    //masukkan nilai statis dari kedalam resep
    // $query = mysqli_query($koneksi, "INSERT INTO resep (id_resep, id_kunjungan, id_user) VALUES ('$id_resep', '$id_kunjungan', '" . $_SESSION['id_user'] . "' )");
    $biaya_resep = 0;
    //ambil data dari temp_detail_resep yang digunakan untuk menghitung biaya resep dan disimpan di detail_resep
    $detail_resep = mysqli_query($koneksi, "SELECT * FROM tmp_detail_resep tmp INNER JOIN obat o WHERE tmp.id_obat = o.id_obat");

    while ($hasil = mysqli_fetch_array($detail_resep)) {

        $id_resep = $hasil['id_resep'];
        $id_obat = $hasil['id_obat'];
        $jumlah_obat = $hasil['jumlah_obat'];
        $biaya_resep += ($hasil['harga_jual'] * $jumlah_obat);
        $stok = $hasil['stok'];
        $sisa = $stok - $jumlah_obat;
        $aturan_pakai = $hasil['aturan_pakai'];
        $id_petugas = $hasil['id_petugas'];

        //masukkan nilai dari temp_detail_resep ke dalam detail_resep
        $input_detail = mysqli_query($koneksi, "INSERT INTO detail_resep (id_resep, id_obat, jumlah_obat, aturan_pakai, id_petugas) "
                . "VALUES ('".$id_resep."', '".$id_obat."', '".$jumlah_obat."', '".$aturan_pakai."', '".$id_petugas."')") or die(mysqli_error($koneksi));

        //update nilai stok dari tabel obat
        // $update_stok = mysqli_query($koneksi, "UPDATE obat SET stok = '$sisa' WHERE id_obat = '$id_obat'");
    }
    //masukkan nilai biaya resep yang dihitung dari detail resep
    $total_resep = $biaya_resep - $diskon;
    $update_resep = mysqli_query($koneksi, "UPDATE resep SET biaya_resep = '$biaya_resep', diskon_resep = '$diskon', total_resep = '$total_resep' WHERE id_resep ='" . $id_resep . "'");

    //masukkan nilai id_resep dan biaya yang diupdate kedalam kuitansi
    $get_bayar = mysqli_query($koneksi, "SELECT * FROM kuitansi WHERE id_kunjungan = '$id_kunjungan'");

    while ($ambil = mysqli_fetch_array($get_bayar)) {
        $id_kuitansi = $ambil['id_kuitansi'];
        $biaya_periksa = $ambil['biaya_periksa'];
        $biaya = $ambil['biaya_resep'];
        $biaya_resepN = $biaya + $biaya_resep;
        $total_bayar = $biaya_periksa + $biaya_resepN;
    }
    //mengupdate tabel kuitansi dengan mengam
    $update_kuitansi = mysqli_query($koneksi, "UPDATE kuitansi SET id_resep = '$id_resep', biaya_resep = '$biaya_resepN', "
            . "total_bayar = '$total_bayar' WHERE id_kuitansi = '$id_kuitansi'");
    //hapus temp
    $delete_tmp = mysqli_query($koneksi, "DELETE FROM tmp_detail_resep WHERE id_resep='" . $id_resep . "' ");
    header('location:../../data_rawatjalan.php');
} elseif (isset($_GET['delete'])) {
    $id_kunjungan = $_POST['id_kunjungan'];
    $query = "DELETE FROM tmp_detail_resep WHERE id_tmp_dr =" . $_GET['delete'];
    $result = mysqli_query($koneksi, $query);
    header('location: ../buat_resep.php?id_kunjungan=' . $_SESSION['id_kunjungan']);
}


if (!isset($_SESSION['level'])) {
    header('location:../../index.php');
}

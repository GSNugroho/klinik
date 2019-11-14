<?php

session_start();
include '../../../koneksi.php';
include '../../../library/library.php';

if (isset($_GET['aksi'])) {
    $id_user = $_SESSION['id_user'];
    $id_obat = buatKode("obat", "O");
    $id_obatD = $_POST['idObat'];
    $nama_obat = $_POST['namaObat'];
    $nama_dagang = $_POST['namaDagang'];
    $harga_beli = $_POST['hargaBeli'];
    $harga_jual = $_POST['hargaJual'];
    $stok = $_POST['stok'];

    //proses membuat obat
    if ($_GET['aksi'] == 'tambah') {

        $query = mysqli_query($koneksi, "INSERT INTO obat (id_obat, id_user, nama_obat, nama_dagang, "
                . "harga_beli, harga_jual, stok) VALUES ('" . $id_obat . "','" . $id_user . "','" . $nama_obat . "','" . $nama_dagang . "','" . $harga_beli . "','" . $harga_jual . "','" . $stok . "')");
        
        header('location:../data_obat.php');
    }
    //proses mengedit data obat
    if ($_GET['aksi'] == 'editObat') {

        $query1 = mysqli_query($koneksi, "UPDATE obat SET nama_obat = '" . $nama_obat . "' , nama_dagang = '" . $nama_dagang . "', harga_beli ='" . $harga_beli . "', harga_jual ='" . $harga_jual . "', stok = '" . $stok . "' WHERE id_obat = '" . $id_obatD . "' ");

        header('location:../data_obat.php');
    }
}

//proses dalam membuat resep
if ($_POST['btnt'] == 'tambaho') {
    //masukkan ke temp_detail_resep /keranjang
    $id_resep = $_POST['idrp'];
    $id_obat = $_POST['idob'];
    $petugas = $_POST['ptob'];
    $query_petugas = mysqli_query($koneksi, "SELECT id_petugas FROM petugas_kesehatan WHERE nama_petugas = '$petugas'");
    $cari_petugas = mysqli_fetch_array($query_petugas);
    $id_petugas = $cari_petugas['id_petugas'];
    $id_kunjungan = $_POST['idku'];
    $jumlah = $_POST['jmob'];
    $aturan_pakai = $_POST['atpi'];
    $date = date('Y-m-d');

    //masukkan nilai dalam form ke dalam temp_detail_resep
    $query = "INSERT INTO tmp_detail_resep (id_resep, id_obat, jumlah_obat, aturan_pakai, id_petugas) VALUES ('" . $id_resep . "', '" . $id_obat . "', '" . $jumlah . "', '" . $aturan_pakai . "','" . $id_petugas . "')";
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

    //masukkan nilai statis dari kedalam resep
    $query = mysqli_query($koneksi, "INSERT INTO resep (id_resep, id_kunjungan, id_user) VALUES ('$id_resep', '$id_kunjungan', '" . $_SESSION['id_user'] . "' )");
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
                . "VALUES ('".$id_resep."', '".$id_obat."', '".$jumlah_obat."', '".$aturan_pakai."', '".$id_petugas."')") or die(mysql_error());

        //update nilai stok dari tabel obat
        $update_stok = mysqli_query($koneksi, "UPDATE obat SET stok = '$sisa' WHERE id_obat = '$id_obat'");
    }
    //masukkan nilai biaya resep yang dihitung dari detail resep
    $update_resep = mysqli_query($koneksi, "UPDATE resep SET biaya_resep = '$biaya_resep' WHERE id_resep ='" . $id_resep . "'");

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
    $result = mysql_query($query);
    header('location: ../buat_resep.php?id_kunjungan=' . $_SESSION['id_kunjungan']);
}


if (!isset($_SESSION['level'])) {
    header('location:../../index.php');
}

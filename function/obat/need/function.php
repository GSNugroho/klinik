<?php
//mengambil harga
function ambilObat($id_obat) {
    // $result = array();
    include '../../../koneksi.php';
    $query = mysqli_query($koneksi, "SELECT harga_jual, stok FROM obat WHERE id_obat='" . $id_obat . "'");
    while ($result = mysqli_fetch_array($query))
        return $result;
}
//mengambil stok
function ambilStok($id_o) {
    include '../../../koneksi.php';
    $query = mysqli_query($koneksi, "SELECT stok FROM obat WHERE id_obat='" . $id_o . "'");
    while ($result = mysqli_fetch_array($query))
        return $result['stok'];
}
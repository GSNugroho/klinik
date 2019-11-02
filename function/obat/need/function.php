<?php
//mengambil harga
function ambilObat($id_obat) {
    include '../../../koneksi.php';
    $query = mysql_query("SELECT harga_jual FROM obat WHERE id_obat='" . $id_obat . "'");
    while ($result = mysql_fetch_array($query))
        return $result['harga_jual'];
}
//mengambil stok
function ambilStok($id_o) {
    include '../../../koneksi.php';
    $query = mysql_query("SELECT stok FROM obat WHERE id_obat='" . $id_o . "'");
    while ($result = mysql_fetch_array($query))
        return $result['stok'];
}
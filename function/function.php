<?php

include_once '../koneksi.php';

function get_nama_by_rm($rm) {
    include '../koneksi.php';
    $query = "SELECT nm_pasien FROM pasien_b WHERE no_rm='$rm';";
    $statement = mysqli_query($koneksi, $query);
    
    $result = mysqli_fetch_array($statement);
    
    if(count($result) > 0) {
        return $result['nm_pasien'];
    }
    
    return '';
}

function get_harga_by_id_tindakan($id_tindakan){
    include '../koneksi.php';
    $query = "SELECT harga_tindakan FROM daftar_tindakan WHERE id_tindakan='$id_tindakan';";
    $statement = mysqli_query($koneksi, $query);
    
    $result = mysqli_fetch_array($statement);
    
    if(count($result) > 0) {
        return $result['harga_tindakan'];
    }
    
    return 'gagal';
}

function get_list_tindakan_by_kunjungan($id_kunjungan) {
    include '../koneksi.php';
//    $query = "SELECT id_tindakan FROM tmp_tindakan_medis WHERE id_kunjungan='$id_kunjungan';";
    $query = "SELECT tmp.id_tindakan, daftar.harga_tindakan FROM tmp_tindakan_medis AS tmp 
        LEFT JOIN daftar_tindakan AS daftar ON tmp.id_tindakan=daftar.id_tindakan WHERE tmp.id_kunjungan='$id_kunjungan';";
    
    $statement = mysqli_query($koneksi, $query);
    
//    mysql_fetch_row($result)
    $hasil = 0;
    while($result = mysqli_fetch_array($statement, MYSQLI_ASSOC)) {
        print_r($result);
        $hasil+= $result['harga_tindakan'];
        echo '<br>';
    }
    echo $hasil;
//    var_dump(mysql_error());
}

?>

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../koneksi.php';

$term = trim(strip_tags($_GET['term']));

$qstring = "SELECT vc_n_png FROM pubpng WHERE vc_n_png LIKE '" . $term . "%'";
//query database untuk mengecek tabel anime 
$result = mysqli_query($koneksi, $qstring);

while ($row = mysqli_fetch_array($result)) {
    $row['value'] = htmlentities(stripslashes($row['vc_n_png']));
//    $row['id']=htmlentities(stripslashes($row['id_obat']));
//buat array yang nantinya akan di konversi ke json
    $row_set[] = $row['value'];
}
//data hasil query yang dikirim kembali dalam format json
echo json_encode($row_set);
?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../koneksi.php';
$returnData = array();
$term = trim(strip_tags($_GET['term']));

$qstring = "SELECT nama_tindakan, harga_tindakan FROM daftar_tindakan WHERE nama_tindakan LIKE '%" . $term . "%'";
//query database untuk mengecek tabel anime 
$result = mysqli_query($koneksi, $qstring);

// while ($row = mysqli_fetch_array($result)) {
//     $row['value'] = htmlentities(stripslashes($row['nama_indonesia']));

//     $row_set[] = $row['value'];
// }

// echo json_encode($row_set);

if(!empty($result)){
    foreach ($result as $row){
        $data['nama'] = $row['nama_tindakan'];
        $data['harga'] = $row['harga_tindakan'];
        array_push($returnData, $data);
    }
}

// Return results as json encoded array
echo json_encode($returnData);die;
?>
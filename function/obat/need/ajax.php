<?php

// include_once './function.php';
include '../../../koneksi.php';

// if (isset($_POST['id_obat'])) {
    $id_obat = $_GET['id'];
//     // echo (ambilObat($id_obat));
//     foreach(ambilObat($id_obat) as $result){
//         echo $result[0];
//     }
// }
// if (isset($_POST['id_o'])) {
//     $id_o = $_POST['id_o'];
//     echo ambilStok($id_o);
// }

$query = mysqli_query($koneksi, "SELECT harga_jual, stok FROM obat WHERE id_obat='" . $id_obat . "'");
$data = mysqli_fetch_array($query);
 
echo json_encode($data);
?>
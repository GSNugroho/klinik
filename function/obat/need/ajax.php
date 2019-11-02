<?php

include_once './function.php';

if (isset($_POST['id_obat'])) {
    $id_obat = $_POST['id_obat'];
    echo ambilObat($id_obat);
}
if (isset($_POST['id_o'])) {
    $id_o = $_POST['id_o'];
    echo ambilStok($id_o);
}
?>
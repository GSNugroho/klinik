<?php
    include "../koneksi.php";

    $id = $_POST['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM daftar_tindakan WHERE id_tindakan = '".$id."'");
    $data = mysqli_fetch_array($query);

    echo json_encode($data);
?>
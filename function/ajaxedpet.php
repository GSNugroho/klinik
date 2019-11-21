<?php
    include "../koneksi.php";

    $query = mysqli_query($koneksi, "SELECT * FROM petugas_kesehatan WHERE id_petugas='".mysqli_escape_string($koneksi, $_GET['id'])."'");

    $data = mysqli_fetch_array($query);

    echo json_encode($data);
?>
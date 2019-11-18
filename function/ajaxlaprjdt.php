<?php
    include "../koneksi.php";

    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM tindakan_medis p INNER JOIN petugas_kesehatan u ON p.id_petugas = u.id_petugas 
    INNER JOIN diagnosis t ON p.id_diagnosis = t.id_diagnosis
    inner JOIN daftar_tindakan s ON p.id_tindakan = s.id_tindakan WHERE p.id_kunjungan = '".$id);

    $data = mysqli_fetch_array($query);

    echo json_encode($data);
?>
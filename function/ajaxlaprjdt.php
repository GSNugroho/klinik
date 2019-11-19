<?php
    include "../koneksi.php";

    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT p.poliklinik as poliklinik, nama_petugas, nama_indonesia, nama_tindakan, jmlh_tind, harga_tindakan FROM tindakan_medis p INNER JOIN petugas_kesehatan u ON p.id_petugas = u.id_petugas 
    INNER JOIN diagnosis t ON p.id_diagnosis = t.id_diagnosis
    INNER JOIN daftar_tindakan s ON p.id_tindakan = s.id_tindakan WHERE p.id_kunjungan = '".$id."'");

    $data = '<table class="table table-bordered">
                    <tr>
                        <th>Poliklinik</th>
                        <th>Petugas Kesehatan</th>
                        <th>Diagnosis</th>
                        <th>Tindakan</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>';
    while ($row = mysqli_fetch_array($query)){
        $data .= '<tr>
                        <td>'.$row['poliklinik'].'</td>
                        <td>'.$row['nama_petugas'].'</td>
                        <td>'.$row['nama_indonesia'].'</td>
                        <td>'.$row['nama_tindakan'].'</td>
                        <td>'.$row['jmlh_tind'].'</td>
                        <td>'.$row['harga_tindakan'].'</td>
                    </tr>';
    }

    $callback = array('detail'=>$data); 
                echo json_encode($callback)
?>
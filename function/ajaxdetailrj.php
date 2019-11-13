<?php
include "../koneksi.php";

$id = $_POST['id'];

$query = mysqli_query($koneksi, "SELECT * from tindakan_medis p INNER JOIN petugas_kesehatan u ON p.id_petugas = u.id_petugas 
LEFT JOIN diagnosis t ON p.id_diagnosis = t.id_diagnosis
LEFT JOIN daftar_tindakan s ON p.id_tindakan = s.id_tindakan WHERE p.id_kunjungan = '".$id."'");

$data = '<tr>
            <td>Kunjungan</td>
            <td>Poliklinik</td>
            <td>Petugas Kesehatan</td>
            <td>Diagnosis</td>
            <td>Tindakan</td>
            <td>Harga</td>
            <td>Jumlah</td>
        </tr>';

$no = 0;
while ($hasil = mysqli_fetch_array($query)) {
$data .= "<tr>
    <td>" . $hasil['id_kunjungan'] . "</td>    
    <td>" . $hasil['poliklinik'] . "</td>
    <td>" . $hasil['nama_petugas'] . "</td>
    <td>" . $hasil['nama_indonesia'] . "</td>                
    <td>" . $hasil['nama_tindakan'] . "</td>
    <td>" . $hasil['harga_tindakan'] . "</td>
    <td>" . $hasil['jmlh_tind'] . "</td>                           
    </tr>";
}

$callback = array('detail'=>$data); 
            echo json_encode($callback)
?>
<?php
include "../../koneksi.php";

$id = $_POST['id'];

$query = mysqli_query($koneksi, "SELECT * FROM resep r LEFT JOIN detail_resep dr ON r.id_resep = dr.id_resep 
LEFT JOIN obat o ON dr.id_obat = o.id_obat 
LEFT JOIN kunjungan k ON r.id_kunjungan = k.id_kunjungan 
LEFT JOIN pasien_b p ON k.no_rm = p.no_rm WHERE r.id_resep = '".$id."'");

$data = '<tr>
            <td>No Resep</td>
            <td>No RM</td>
            <td>Nama Pasien</td>
            <td>Id Obat</td>
            <td>Nama Obat</td>
            <td>Jumlah</td>
            <td>Aturan Pakai</td>
            <td>Harga</td>
        </tr>';

$no = 0;
while ($hasil = mysqli_fetch_array($query)) {
$harga = $hasil['jumlah_obat'] * $hasil['harga_jual'];
$data .= "<tr>
    <td>" . $hasil['id_resep'] . "</td>    
    <td>" . $hasil['no_rm'] . "</td>
    <td>" . $hasil['nm_pasien'] . "</td>
    <td>" . $hasil['id_obat'] . "</td>                
    <td>" . $hasil['nama_dagang'] . "</td>
    <td>" . $hasil['jumlah_obat'] . "</td>
    <td>" . $hasil['aturan_pakai'] . "</td>                      
    <td>Rp " . $harga . "</td>                      
    </tr>";
}

$callback = array('detail'=>$data); 
            echo json_encode($callback)
?>
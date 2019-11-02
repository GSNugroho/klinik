<?php

//menggunakan class phpExcelReader
include "excel_reader2.php";

//koneksi ke db mysql
mysql_connect("localhost", "root", "");
mysql_select_db("rspw_klinik");

//membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
//membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index = 0);

//nilai awal counter jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

//import data excel dari baris kedua, karena baris pertama adalah nama kolom
for ($i = 1; $i <= $baris; $i++) {
    //membaca data nip (kolom ke-1)
    //
 //digunakan untuk obat
// $id_obat = $data->val($i,1);
// //membaca data nama depan (kolom ke-2)
// $id_user = $data->val($i,2);
// //membaca data nama belakang (kolom ke-3)
// $nama_obat = $data->val($i,3);
// $nama_dagang = $data->val($i,4);
// $harga_beli = $data->val($i,5);
// $harga_jual = $data->val($i,6);
// $stok = $data->val($i,7);
//setelah data dibaca, sisipkan ke dalam tabel pegawai
    
    //digunakan untuk diagnosis
    $id_diagnosis = $data->val($i,1);
    $nama_latin = $data->val($i,2);
    $nama_indonesia = $data->val($i,3);
    $query = "INSERT INTO diagnosis values ('$id_diagnosis', '$nama_latin', '$nama_indonesia')";
    $hasil = mysql_query($query);

//menambah counter jika berhasil atau gagal
    if ($hasil)
        $sukses++;
    else
        $gagal++;
}
//tampilkan report hasil import
echo "<h3> Proses Import Data Pegawai Selesai</h3>";
echo "<p>Jumlah data sukses diimport : " . $sukses . "<br>";
echo "Jumlah data gagal diimport : " . $gagal . "<p>";
?>
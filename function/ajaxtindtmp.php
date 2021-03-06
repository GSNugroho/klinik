<?php
include '../koneksi.php';

$draw = $_POST['draw'];
$baris = $_POST['start'];
$rowperpage = $_POST['length'];
$columnIndex = $_POST['order'][0]['column'];
$columnName = $_POST['columns'][$columnIndex]['data'];
$columnSortOrder = $_POST['order'][0]['dir'];
$searchValue = $_POST['search']['value'];
$kunj = $_POST['Idkunj'];

$searchQuery = " ";
if($searchValue != ''){
    $searchQuery = " and (tmp_tindakan_medis.poliklinik like '%".$searchValue."%' or 
    nama_petugas like '%".$searchValue."%' or 
    nama_indonesia like '%".$searchValue."%' or 
    nama_tindakan like '%".$searchValue."%' or 
    harga_tindakan like'%".$searchValue."%' ) ";
}

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount from tmp_tindakan_medis 
        INNER JOIN daftar_tindakan ON tmp_tindakan_medis.id_tindakan = daftar_tindakan.id_tindakan
        INNER JOIN petugas_kesehatan ON tmp_tindakan_medis.id_petugas = petugas_kesehatan.id_petugas
        INNER JOIN diagnosis ON tmp_tindakan_medis.id_diagnosis = diagnosis.id_diagnosis 
        INNER JOIN user ON tmp_tindakan_medis.id_user = user.id_user
        WHERE tmp_tindakan_medis.id_kunjungan = '".$kunj."' ");
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecords = $row;
}

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount from tmp_tindakan_medis 
        INNER JOIN daftar_tindakan ON tmp_tindakan_medis.id_tindakan = daftar_tindakan.id_tindakan
        INNER JOIN petugas_kesehatan ON tmp_tindakan_medis.id_petugas = petugas_kesehatan.id_petugas 
        INNER JOIN diagnosis ON tmp_tindakan_medis.id_diagnosis = diagnosis.id_diagnosis 
        INNER JOIN user ON tmp_tindakan_medis.id_user = user.id_user WHERE 1=1 AND tmp_tindakan_medis.id_kunjungan = '".$kunj."' ".$searchQuery);
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecordwithFilter = $row;
}

$empQuery = mysqli_query($koneksi, "SELECT id_tmp_tm, tmp_tindakan_medis.poliklinik as poli, nama_petugas, nama_indonesia, nama_tindakan, harga_tindakan, jmlh_tind, nama_user from tmp_tindakan_medis 
INNER JOIN daftar_tindakan ON tmp_tindakan_medis.id_tindakan = daftar_tindakan.id_tindakan
INNER JOIN petugas_kesehatan ON tmp_tindakan_medis.id_petugas = petugas_kesehatan.id_petugas 
INNER JOIN diagnosis ON tmp_tindakan_medis.id_diagnosis = diagnosis.id_diagnosis 
INNER JOIN user ON tmp_tindakan_medis.id_user = user.id_user WHERE 1=1 AND tmp_tindakan_medis.id_kunjungan = '".$kunj."' ".$searchQuery." ORDER BY ".$columnName." "
.$columnSortOrder." LIMIT ".$rowperpage);
$empRecords = mysqli_fetch_all($empQuery, MYSQLI_ASSOC);

$data = array();
foreach($empRecords as $row){
    $harga = $row['harga_tindakan']*$row['jmlh_tind'];
    $delete = '<a class="btn btn-danger" id="inputDelete" value="delete" onclick="hapus('.$row['id_tmp_tm'].')">Delete</a>';


    // if($row['biaya_periksa'] == ''){
    //     $biaya = 'Rp 0';
    // }else{
    //     $biaya = 'Rp '.$row['biaya_periksa'];
    // }

    $data[] = array( 
        // "poliklinik" => $row['tmp_tindakan_medis.poliklinik'],
        // "nama_petugas" => $row['nama_petugas'],
        // "nama_indonesia" => $row['nama_indonesia'],
        "nama_user" => $row['nama_user'],
        "nama_tindakan" => $row['nama_tindakan'],
        "harga_tindakan" => $row['harga_tindakan'],
        "jmlh_tind" => $row['jmlh_tind'],
        "harga_total" => $harga
        // "delete" => $delete,
    );
}

$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);
echo json_encode($response);
?>
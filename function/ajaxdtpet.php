<?php
include '../koneksi.php';

$draw = $_POST['draw'];
$baris = $_POST['start'];
$rowperpage = $_POST['length'];
$columnIndex = $_POST['order'][0]['column'];
$columnName = $_POST['columns'][$columnIndex]['data'];
$columnSortOrder = $_POST['order'][0]['dir'];
$searchValue = $_POST['search']['value'];

$searchQuery = " ";
if($searchValue != ''){
    $searchQuery = " and (kunjungan.no_rm like '%".$searchValue."%' or 
    nm_pasien like '%".$searchValue."%' or 
    id_kunjungan like '%".$searchValue."%' or 
    cabang like '%".$searchValue."%' or 
    tgl_periksa like'%".$searchValue."%' ) ";
}

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM petugas_kesehatan 
LEFT JOIN user ON petugas_kesehatan.id_user = user.id_user");
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecords = $row;
}

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM petugas_kesehatan 
LEFT JOIN user ON petugas_kesehatan.id_user = user.id_user WHERE 1=1 ".$searchQuery);
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecordwithFilter = $row;
}

$empQuery = mysqli_query($koneksi, "SELECT id_petugas, nama_petugas, alamat_petugas, tempat_lahir, DATE_FORMAT(tgl_lahir_petugas, '%d-%m-%Y') AS tgl_lahir_petugas, no_telp, poliklinik, username FROM petugas_kesehatan 
LEFT JOIN user ON petugas_kesehatan.id_user = user.id_user
 WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
.$columnSortOrder." LIMIT ".$baris.", ".$rowperpage);
$empRecords = mysqli_fetch_all($empQuery, MYSQLI_ASSOC);

$data = array();
foreach($empRecords as $row){
    $edit = "<a class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' data-whatever='".$row['id_petugas']."'>Edit</a>";

    $data[] = array( 
        "id_petugas" => $row['id_petugas'],
        "nama_petugas" => $row['nama_petugas'],
        "alamat_petugas" => $row['alamat_petugas'],
        "tempat_lahir" => $row['tempat_lahir'],
        "tgl_lahir_petugas" => $row['tgl_lahir_petugas'],
        "no_telp" => $row['no_telp'],
        "poliklinik" => $row['poliklinik'],
        "username" => $row['username'],
        "edit" => $edit
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
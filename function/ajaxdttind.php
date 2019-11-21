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
    $searchQuery = " and (id_tindakan like '%".$searchValue."%' or 
    nama_tindakan like '%".$searchValue."%' or 
    harga_tindakan like '%".$searchValue."%' ) ";
}

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM daftar_tindakan");
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecords = $row;
}

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM daftar_tindakan WHERE 1=1 ".$searchQuery);
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecordwithFilter = $row;
}

$empQuery = mysqli_query($koneksi, "SELECT * FROM daftar_tindakan
 WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
.$columnSortOrder." LIMIT ".$baris.", ".$rowperpage);
$empRecords = mysqli_fetch_all($empQuery, MYSQLI_ASSOC);

$data = array();
foreach($empRecords as $row){
    $aksi = '<a class="btn btn-warning" data-toggle="modal" data-target="#editTindakan" data-whatever="'.$row["id_tindakan"].'">Edit</a>';

    $data[] = array( 
        "id_tindakan" => $row['id_tindakan'],
        "nama_tindakan" => $row['nama_tindakan'],
        "harga_tindakan" => $row['harga_tindakan'],
        "aksi" => $aksi
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
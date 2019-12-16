<?php
include '../../koneksi.php';

$draw = $_POST['draw'];
$baris = $_POST['start'];
$rowperpage = $_POST['length'];
$columnIndex = $_POST['order'][0]['column'];
$columnName = $_POST['columns'][$columnIndex]['data'];
$columnSortOrder = $_POST['order'][0]['dir'];
$searchValue = $_POST['search']['value'];

$searchQuery = " ";

if($searchValue != ''){
    $searchQuery .= " AND (id_obat like '%".$searchValue."%' or 
    nama_obat like '%".$searchValue."%' or 
    nama_dagang like '%".$searchValue."%' or 
    harga_beli like '%".$searchValue."%' or 
    harga_jual like'%".$searchValue."%' ) ";
}

$sel = mysqli_query($koneksi, "SELECT count(*) FROM obat o LEFT JOIN user u ON o.id_user = u.id_user");
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecords = $row;
}

$sel = mysqli_query($koneksi, "SELECT count(*) FROM obat o LEFT JOIN user u ON o.id_user = u.id_user WHERE 1=1 ".$searchQuery);
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecordwithFilter = $row;
}

$empQuery = mysqli_query($koneksi, "SELECT id_obat, cabang, nama_obat, nama_dagang, harga_beli, harga_jual, stok FROM obat o LEFT JOIN user u ON o.id_user = u.id_user WHERE 1=1 ".$searchQuery." 
ORDER BY ".$columnName." ".$columnSortOrder." LIMIT ".$baris.", ".$rowperpage);
$empRecords = mysqli_fetch_all($empQuery, MYSQLI_ASSOC);

$data = array();
foreach($empRecords as $row){

    $edit = '<a class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit" data-whatever="'.$row["id_obat"].'">Edit</a>';

    $data[] = array( 
        "id_obat" => $row['id_obat'],
        "cabang" => $row['cabang'],
        "nama_obat" => $row['nama_obat'],
        "nama_dagang" => $row['nama_dagang'],
        "harga_beli" => $row['harga_beli'],
        "harga_jual" => $row['harga_jual'],
        "stok" => $row['stok'],
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
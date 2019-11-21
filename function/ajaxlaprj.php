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

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM kunjungan p 
INNER JOIN user u ON p. id_user = u.id_user 
INNER JOIN pasien_b s ON p.no_rm = s.no_rm");
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecords = $row;
}

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM kunjungan p 
INNER JOIN user u ON p. id_user = u.id_user 
INNER JOIN pasien_b s ON p.no_rm = s.no_rm ".$searchQuery);
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecordwithFilter = $row;
}

$empQuery = mysqli_query($koneksi, "SELECT p.id_kunjungan, cabang, DATE_FORMAT(tgl_periksa, '%d%-%m%-%Y') as tgl_periksa, s.no_rm as no_rm, nm_pasien FROM kunjungan p 
INNER JOIN user u ON p. id_user = u.id_user 
INNER JOIN pasien_b s ON p.no_rm = s.no_rm ".$searchQuery." ORDER BY ".$columnName." "
.$columnSortOrder." LIMIT ".$baris.", ".$rowperpage);
$empRecords = mysqli_fetch_all($empQuery, MYSQLI_ASSOC);

$data = array();
foreach($empRecords as $row){

    $data[] = array( 
        "id_kunjungan" => $row['id_kunjungan'],
        "cabang" => $row['cabang'],
        "tgl_periksa" => $row['tgl_periksa'],
        "no_rm" => $row['no_rm'],
        "nm_pasien" => $row['nm_pasien']
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
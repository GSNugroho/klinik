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
// if(($_POST['searchByAwal'] != '') && ($_POST['searchByAkhir'] != '')){
//     $searchByAwal = date('Y-m-d', strtotime($_POST['searchByAwal']));
//     $searchByAkhir = date('Y-m-d', strtotime(($_POST['searchByAkhir'])));
//     $searchQuery .= " AND (tgl_periksa BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
// }

if($searchValue != ''){
    $searchQuery = " AND (pasien_b.no_rm like '%".$searchValue."%' or 
    id_resep like '%".$searchValue."%' or 
    kunjungan.id_kunjungan like '%".$searchValue."%' or 
    nm_pasien like '%".$searchValue."%' or 
    tgl_periksa like'%".$searchValue."%' ) ";
}

$sel = mysqli_query($koneksi, "SELECT count(*) FROM resep LEFT JOIN kunjungan ON resep.id_kunjungan = kunjungan.id_kunjungan 
LEFT JOIN pasien_b ON kunjungan.no_rm = pasien_b.no_rm 
LEFT JOIN user ON kunjungan.id_user = user.id_user");
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecords = $row;
}

$sel = mysqli_query($koneksi, "SELECT count(*) FROM resep LEFT JOIN kunjungan ON resep.id_kunjungan = kunjungan.id_kunjungan 
LEFT JOIN pasien_b ON kunjungan.no_rm = pasien_b.no_rm 
LEFT JOIN user ON kunjungan.id_user = user.id_user WHERE 1=1 ".$searchQuery);
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecordwithFilter = $row;
}

$empQuery = mysqli_query($koneksi, "SELECT id_resep, kunjungan.id_kunjungan as id_kunjungan, pasien_b.no_rm as no_rm, nm_pasien, username, biaya_resep, diskon_resep, total_resep, tgl_trs FROM resep LEFT JOIN kunjungan ON resep.id_kunjungan = kunjungan.id_kunjungan 
LEFT JOIN pasien_b ON kunjungan.no_rm = pasien_b.no_rm 
LEFT JOIN user ON kunjungan.id_user = user.id_user
 WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
.$columnSortOrder." LIMIT ".$baris.", ".$rowperpage);
$empRecords = mysqli_fetch_all($empQuery, MYSQLI_ASSOC);

$data = array();
foreach($empRecords as $row){
    $detail = '<a class="btn btn-info" data-toggle="modal" data-target="#ModalDetail" data-whatever="'.$row["id_resep"].'">Detail</a>';
    $cetak = '<a class="btn btn-success" href="need/cetak_resep.php?id_resep='.$row['id_resep'].'" target="_blank">Kuitansi</a>';

    $data[] = array( 
        "id_resep" => $row['id_resep'],
        "id_kunjungan" => $row['id_kunjungan'],
        "no_rm" => $row['no_rm'],
        "nm_pasien" => $row['nm_pasien'],
        "username" => $row['username'],
        "tgl_trs" => date('d-m-Y', strtotime($row['tgl_trs'])),
        "biaya_resep" => $row['biaya_resep'],
        "diskon_resep" => $row['diskon_resep'],
        "total_resep" => $row['total_resep'],
        "detail" => $detail,
        "cetak" => $cetak
    );
}

$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);
echo json_encode($response);

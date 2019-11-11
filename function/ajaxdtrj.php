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

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM kunjungan INNER JOIN user on kunjungan.id_user = user.id_user LEFT JOIN pasien_b on kunjungan.no_rm = pasien_b.no_rm");
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecords = $row;
}

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM kunjungan INNER JOIN user on kunjungan.id_user = user.id_user LEFT JOIN pasien_b on kunjungan.no_rm = pasien_b.no_rm WHERE 1=1 ".$searchQuery);
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecordwithFilter = $row;
}

$empQuery = mysqli_query($koneksi, "SELECT id_kunjungan, kunjungan.no_rm as rm, nm_pasien, cabang, tgl_periksa, biaya_periksa FROM kunjungan 
INNER JOIN user on kunjungan.id_user = user.id_user 
LEFT JOIN pasien_b on kunjungan.no_rm = pasien_b.no_rm WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
.$columnSortOrder." LIMIT ".$rowperpage);
$empRecords = mysqli_fetch_all($empQuery, MYSQLI_ASSOC);

$data = array();
foreach($empRecords as $row){
    $tindakan = '<a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row["id_kunjungan"].'">Tindakan</a>';
    $detail = '<a class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row["id_kunjungan"].'">Detail</a>';
    $resep = '<a class="btn btn-primary" href="obat/buat_resep.php?id_kunjungan='.$row['id_kunjungan'].'">Resep</a>';
    $kuitansi = '<a class="btn btn-success" href="cetak/cetak_kuitansi.php?i='.$row['id_kunjungan'].'" target="_blank">Kuitansi</a>';


    if($row['biaya_periksa'] == ''){
        $biaya = 'Rp 0';
    }else{
        $biaya = 'Rp '.$row['biaya_periksa'];
    }

    $data[] = array( 
        "id_kunjungan" => $row['id_kunjungan'],
        "rm" => $row['rm'],
        "tgl_periksa" => date('d-m-Y', strtotime($row['tgl_periksa'])),
        "nm_pasien" => $row['nm_pasien'],
        "cabang" => $row['cabang'],
        "biaya_periksa" => $biaya,
        "tindakan" => $tindakan,
        "detail" => $detail,
        "resep" => $resep,
        "kuitansi" => $kuitansi
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
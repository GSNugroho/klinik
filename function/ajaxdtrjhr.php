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

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM kunjungan 
INNER JOIN user on kunjungan.id_user = user.id_user 
LEFT JOIN resep on kunjungan.id_kunjungan = resep.id_kunjungan
LEFT JOIN pasien_b on kunjungan.no_rm = pasien_b.no_rm WHERE tgl_periksa = DATE(NOW())");
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecords = $row;
}

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM kunjungan 
INNER JOIN user on kunjungan.id_user = user.id_user 
LEFT JOIN resep on kunjungan.id_kunjungan = resep.id_kunjungan
LEFT JOIN pasien_b on kunjungan.no_rm = pasien_b.no_rm WHERE 1=1 AND tgl_periksa = DATE(NOW()) ".$searchQuery);
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecordwithFilter = $row;
}

$empQuery = mysqli_query($koneksi, "SELECT kunjungan.id_kunjungan as id_kunjungan, kunjungan.no_rm as rm, nm_pasien, cabang, tgl_periksa, biaya_periksa, biaya_resep, (biaya_periksa+biaya_resep) as biaya_total FROM kunjungan 
INNER JOIN user on kunjungan.id_user = user.id_user 
LEFT JOIN resep on kunjungan.id_kunjungan = resep.id_kunjungan
LEFT JOIN pasien_b on kunjungan.no_rm = pasien_b.no_rm
 WHERE 1=1 AND tgl_periksa = DATE(NOW()) ".$searchQuery." ORDER BY ".$columnName." "
.$columnSortOrder." LIMIT ".$baris.", ".$rowperpage);
$empRecords = mysqli_fetch_all($empQuery, MYSQLI_ASSOC);

$data = array();
foreach($empRecords as $row){
    if ($row['biaya_periksa'] == '') {
        $tindakan = '<button value="'.$row["id_kunjungan"].'" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false" data-whatever="'.$row["id_kunjungan"].'" onclick="load(this.value)">Tindakan</button>';
    }else{
        $tindakan = '<a class="btn btn-warning" data-toggle="modal" data-whatever="'.$row["id_kunjungan"].'" disabled>Tindakan</a>';
    }
    
    $detail = '<a class="btn btn-info" data-toggle="modal" data-target="#ModalDetail" data-whatever="'.$row["id_kunjungan"].'">Detail</a>';

    if (($row['biaya_resep'] == '') || ($row['biaya_resep'] == NULL)){
        $bresep = '<a class="btn btn-primary" data-toggle="modal" data-target="#modalResep" data-backdrop="static" data-keyboard="false" data-whatever="'.$row["id_kunjungan"].'" onclick="resep()">Resep</a>';
    }else{
        $bresep = '<a class="btn btn-primary" data-toggle="modal" data-whatever="'.$row["id_kunjungan"].'" disabled>Resep</a>';
    }

    $kuitansi = '<a class="btn btn-success" href="cetak/cetak_kuitansi.php?i='.$row['id_kunjungan'].'" target="_blank">Kuitansi</a>';


    if($row['biaya_periksa'] == ''){
        $biaya = 'Rp 0';
    }else{
        $biaya = 'Rp '.$row['biaya_periksa'];
    }
    if(($row['biaya_resep'] == '') || ($row['biaya_resep'] == NULL)){
        $resep = 'Rp 0';
    }else{
        $resep = 'Rp '.$row['biaya_resep'];
    }

    $bp = (int)$row['biaya_periksa'];
    $br = (int)$row['biaya_resep'];
    $jmlh_total = $bp+$br;
    $total = 'Rp '.$jmlh_total;
    $data[] = array( 
        "id_kunjungan" => $row['id_kunjungan'],
        "rm" => $row['rm'],
        "tgl_periksa" => date('d-m-Y', strtotime($row['tgl_periksa'])),
        "nm_pasien" => $row['nm_pasien'],
        "cabang" => $row['cabang'],
        "biaya_periksa" => $biaya,
        "biaya_resep" => $resep,
        "biaya_total" => $total,
        "tindakan" => $tindakan,
        "detail" => $detail,
        "resep" => $bresep,
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
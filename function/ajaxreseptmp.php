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
    $searchQuery = " and (tmp.id_obat like '%".$searchValue."%' or 
    nama_dagang like '%".$searchValue."%' or 
    jumlah_obat like '%".$searchValue."%' or 
    aturan_pakai like '%".$searchValue."%' ) ";
}

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM tmp_detail_resep tmp 
INNER JOIN obat o ON tmp.id_obat = o.id_obat 
WHERE id_rajal = '".$kunj."'");
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecords = $row;
}

$sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM tmp_detail_resep tmp 
INNER JOIN obat o ON tmp.id_obat = o.id_obat WHERE 1=1 AND id_rajal = '".$kunj."' ".$searchQuery);
$records = mysqli_fetch_all($sel);
foreach($records as $row){
    $totalRecordwithFilter = $row;
}

$empQuery = mysqli_query($koneksi, "SELECT tmp.id_obat as obatid, nama_dagang, jumlah_obat, aturan_pakai, harga_jual, (harga_jual*jumlah_obat) as total FROM tmp_detail_resep tmp 
INNER JOIN obat o ON tmp.id_obat = o.id_obat WHERE 1=1 AND id_rajal = '".$kunj."' ".$searchQuery." ORDER BY ".$columnName." "
.$columnSortOrder." LIMIT ".$rowperpage);
$empRecords = mysqli_fetch_all($empQuery, MYSQLI_ASSOC);

$data = array();
foreach ($empRecords as $row) {
    $data[] = array(
        "nama_dagang" => $row['nama_dagang'],
        "aturan_pakai" => $row['aturan_pakai'],
        "jumlah_obat" => $row['jumlah_obat'],
        "harga_jual" => $row['harga_jual'],
        "total_bayar" => $row['total'],
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
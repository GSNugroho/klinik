<?php
    include "../koneksi.php";

    $draw = $_POST['draw'];
    $baris = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $searchValue = $_POST['search']['value']; // Search value

    ## Search 
    $searchQuery = " ";
    if($searchValue != ''){
    $searchQuery = " and (no_rm like '%".$searchValue."%' or 
    nm_pasien like '%".$searchValue."%' or 
    alamat_pasien like '%".$searchValue."%' or 
    umur_pasien like'%".$searchValue."%' or
    tmpt_lahir like'%".$searchValue."%' or
    jk_pasien like'%".$searchValue."%' or
    cabang like'%".$searchValue."%' ) ";
    }

    ## Total number of records without filtering
    $sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM pasien_b JOIN user on pasien_b.id_user = user.id_user");
    $records = mysqli_fetch_all($sel);
    foreach($records as $row){
        $totalRecords = $row;
    }
    

    ## Total number of record with filtering
    $sel = mysqli_query($koneksi, "SELECT count(*) as allcount FROM pasien_b JOIN user on pasien_b.id_user = user.id_user WHERE 1=1 ".$searchQuery);
    $records = mysqli_fetch_all($sel);
    foreach($records as $row){
        $totalRecordwithFilter = $row;
    }
    

    ## Fetch records
    $empQuery = mysqli_query($koneksi, "SELECT * FROM pasien_b JOIN user on pasien_b.id_user = user.id_user WHERE 1=1 ".$searchQuery
    ."ORDER BY ".$columnName." ".$columnSortOrder." LIMIT ".$rowperpage);
    $empRecords = mysqli_fetch_all($empQuery, MYSQLI_ASSOC);

    $data = array();

    foreach($empRecords as $row){
    $button = ' 
                <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row["no_rm"].'">Edit</a>
                ';

    $data[] = array( 
        "no_rm" =>$row['no_rm'],
        "nm_pasien" =>$row['nm_pasien'],
        "alamat_pasien" =>$row['alamat_pasien'],
        "umur_pasien" =>$row['umur_pasien'],
        "tmpt_lahir" =>$row['tmpt_lahir'],
        "tgl_lahir"=>date('d-m-Y', strtotime($row['tgl_lahir'])),
        "jk_pasien"=>$row['jk_pasien'],
        "tgl_daftar_pasien"=>date('d-m-Y', strtotime($row['tgl_daftar_pasien'])),
        "cabang"=>$row['cabang'],
        "action"=>$button
    );
    }

    ## Response
    $response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
    );

    echo json_encode($response);
?>
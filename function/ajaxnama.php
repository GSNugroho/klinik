<?php

include_once './function.php';

    if(isset($_POST['noRM'])) {
        $noRM = $_POST['noRM'];
        $nama = get_nama_by_rm($noRM);
        echo json_encode($nama);
    }
?>
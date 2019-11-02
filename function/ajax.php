<?php

include_once './function.php';

    if(isset($_POST['id_tindakan'])) {
        $id_tindakan = $_POST['id_tindakan'];
        echo get_harga_by_id_tindakan($id_tindakan);
    }
?>
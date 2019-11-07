<?php

    
        
        session_start();
        include '../koneksi.php';
        include '../library/library.php';
        
        $id_user = $_SESSION['id_user'];
        $no_rm = $_POST['no_rm'];
        $nm_pasien = $_POST['nm_pasien'];
        $jk_pasien = $_POST['jk_pasien'];
        $tmpt_lahir = $_POST['tmpt_lahir'];
        $nik = $_POST['nik'];
        $tgl_lahir = date('Y-m-d', strtotime($_POST['tgl_lahir']));
        $agm_pasien = $_POST['agm_pasien'];
        $neg_pasien = $_POST['neg_pasien'];
        $sts_kwn = $_POST['sts_kwn'];
        $pend_pasien = $_POST['pend_pasien'];
        $pkrj_pasien = $_POST['pkrj_pasien'];
        $alamat_pasien = $_POST['alamat_pasien'];
        $tlp_pasien = $_POST['tlp_pasien'];
        $hp_pasien = $_POST['hp_pasien'];
        $prov_pasien = $_POST['prov_pasien'];
        $kot_pasien = $_POST['kot_pasien'];
        $kec_pasien = $_POST['kec_pasien'];
        $kel_pasien = $_POST['kel_pasien'];
        $rt_pasien = $_POST['rt_pasien'];
        $rw_pasien = $_POST['rw_pasien'];
        $peg_rs = $_POST['peg_rs'];
        $tinggi_pasien = $_POST['tinggi_pasien'];
        $berat_pasien = $_POST['berat_pasien'];
        $lp_pasien = $_POST['lp_pasien'];
        $imp_pasien = $_POST['imp_pasien'];
        $sis_pasien = $_POST['sis_pasien'];
        $dia_pasien = $_POST['dia_pasien'];
        $rr_pasien = $_POST['rr_pasien'];
        $hr_pasien = $_POST['hr_pasien'];
        $nm_wali = $_POST['nm_wali'];
        $hub_wali = $_POST['hub_wali'];
        $nm_ortu = $_POST['nm_ortu'];
        $pkrj_wali = $_POST['pkrj_wali'];
        // $tgl_dftr = date('Y-m-d', strtotime($_POST['tgl_dftr']));
        $tgl_dftr = date('Y-m-d');

        $edit = mysqli_query($koneksi, "UPDATE pasien_b SET nm_pasien='".$nm_pasien."',jk_pasien='".$jk_pasien."', tmpt_lahir='".$tmpt_lahir."', nik='".$nik."', tgl_lahir='".$tgl_lahir."', agm_pasien='".$agm_pasien."', 
        neg_pasien='".$neg_pasien."', sts_kwn='".$sts_kwn."', pend_pasien='".$pend_pasien."', pkrj_pasien='".$pkrj_pasien."', alamat_pasien='".$alamat_pasien."', tlp_pasien='".$tlp_pasien."', hp_pasien='".$hp_pasien."',
        prov_pasien='".$prov_pasien."', kot_pasien='".$kot_pasien."', kec_pasien='".$kec_pasien."', kel_pasien='".$kel_pasien."', rt_pasien='".$rt_pasien."', rw_pasien='".$rw_pasien."', peg_rs='".$peg_rs."', tinggi_pasien='".$tinggi_pasien."',
        berat_pasien='".$berat_pasien."', lp_pasien='".$lp_pasien."', imp_pasien='".$imp_pasien."', sis_pasien='".$sis_pasien."', dia_pasien='".$dia_pasien."', rr_pasien='".$rr_pasien."', hr_pasien='".$hr_pasien."', nm_wali='".$nm_wali."',
        hub_wali='".$hub_wali."', nm_ortu='".$nm_ortu."', pkrj_wali='".$pkrj_wali."' WHERE no_rm = '".$no_rm."'");
        
        if ($edit){
            header('location: data_pasien.php');

        }
        else{
            echo '<h1>Input gagal</h1>';
         header('location: data_pasien.php?Message=' . urlencode("Gagal Edit"));
        }
    

?>

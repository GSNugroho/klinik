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
    $tgl_dftr = date('Y-m-d');


if($_POST['no_rm'] == ''){
    $koderm = buatKode('pasien_b', 'RM');
}else{
    $cek = mysqli_query($koneksi, "SELECT no_rm, nm_pasien, jk_pasien, tmpt_lahir, nik, DATE_FORMAT(tgl_lahir, '%d-%m-%Y') as tgl_lahir, 
    agm_pasien, neg_pasien, sts_kwn, pend_pasien, pkrj_pasien, alamat_pasien, tlp_pasien, hp_pasien, prov_pasien, kot_pasien, kec_pasien, 
    kel_pasien, rt_pasien, rw_pasien, peg_rs, tinggi_pasien, berat_pasien, lp_pasien, imp_pasien, sis_pasien, dia_pasien, rr_pasien, 
    hr_pasien, nm_wali, hub_wali, nm_ortu, pkrj_wali FROM pasien_b WHERE no_rm='".$_POST['no_rm']."'");
    $data = mysqli_fetch_row($cek);
    if($data == FALSE){
        $koderm = $_POST['no_rm'];
    }
}

if($koderm != ''){
    $no_rm = $koderm;
    $input= mysqli_query($koneksi, "INSERT INTO pasien_b (no_rm, nm_pasien, jk_pasien, tmpt_lahir,
                        nik, tgl_lahir, agm_pasien, neg_pasien, sts_kwn, pend_pasien, pkrj_pasien, alamat_pasien,
                        tlp_pasien, hp_pasien, prov_pasien, kot_pasien, kec_pasien, kel_pasien, rt_pasien, rw_pasien,
                        peg_rs, tinggi_pasien, berat_pasien, lp_pasien, imp_pasien, sis_pasien, dia_pasien, rr_pasien,
                        hr_pasien, nm_wali, hub_wali, nm_ortu, pkrj_wali, tgl_daftar_pasien, id_user) 
                        
    VALUES ('$no_rm','$nm_pasien','$jk_pasien','$tmpt_lahir','$nik','$tgl_lahir','$agm_pasien',
            '$neg_pasien','$sts_kwn','$pend_pasien','$pkrj_pasien','$alamat_pasien','$tlp_pasien',
            '$hp_pasien','$prov_pasien','$kot_pasien','$kec_pasien','$kel_pasien','$rt_pasien','$rw_pasien','$peg_rs',
            '$tinggi_pasien','$berat_pasien','$lp_pasien','$imp_pasien','$sis_pasien','$dia_pasien','$rr_pasien','$hr_pasien',
            '$nm_wali','$hub_wali','$nm_ortu','$pkrj_wali','$tgl_dftr','$id_user')");
}

if($_POST['no_bpjs'] != ''){
    $no_bpjs = $_POST['no_bpjs'];

    mysqli_query($koneksi, "INSERT INTO pasien_bpjs (no_bpjs, no_rm_bpjs) 
    VALUES ('$no_bpjs','$no_rm')");
}

// if($_POST['poli'] != ' '){
    $jns_rwt = $_POST['jns_rwt'];
    $kls_rwt = $_POST['kls_rwt'];
    $fks_rwt = $_POST['fks_rwt'];
    $tgl_ruj = $_POST['tgl_ruj'];
    $no_ruj = $_POST['no_ruj'];
    $no_kon = $_POST['no_kon'];
    $poli = $_POST['poli'];
    $pet_rs = $_POST['pet_rs'];
    $diagnosis = $_POST['diag'];
    $query_diagnosis = mysqli_query($koneksi, "SELECT id_diagnosis FROM diagnosis WHERE nama_indonesia = '$diagnosis'");
    $cari_diagnosis = mysqli_fetch_array($query_diagnosis, MYSQLI_ASSOC);
    $diag = $cari_diagnosis['id_diagnosis'];
    $cata = $_POST['cata'];
    $asur = $_POST['asur'];
    $query_asur = mysqli_query($koneksi, "SELECT vc_k_png FROM pubpng WHERE vc_n_png = '$asur'");
    $cari_asur = mysqli_fetch_array($query_asur, MYSQLI_ASSOC);
    $asuransi = $cari_asur['vc_k_png'];
    $id_kunjungan = buatKode('kunjungan', 'RJ');
    $tgl_periksa = date('Y-m-d');

    $cek = mysqli_query($koneksi, "INSERT INTO kunjungan (id_kunjungan, no_rm, id_user, tgl_periksa, id_petugas, poliklinik, id_diagnosis, jns_asuransi)
    VALUES ('$id_kunjungan','$no_rm','$id_user', '$tgl_periksa', '$pet_rs', '$poli', '$diag', '$asuransi')");

// }
// if ($cek){
//     header('location: penambahan_pasien.php');

// }

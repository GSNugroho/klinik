<?php
$arrActive['tambahPasien'] = 'active';
session_start();
include '../koneksi.php';
include '../library/library.php';
if (!isset($_SESSION['level'])) {
    header('location:../index.php');
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title><?=namaKlinik()?></title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
        <!-- <link rel="stylesheet" type="text/css" href="../datepicker/css/bootstrap.min.css"> -->
        <link rel="stylesheet" type="text/css" href="../datepicker/css/ilmudetil.css">
        <link rel="stylesheet" type="text/css" href="../datepicker/css/bootstrap-datetimepicker.css">
        <link rel="stylesheet" type="text/css" href="../js/jquery-ui-1.11.4/jquery-ui-1.11.4/jquery-ui.min.css"> 
        
        <script src="../datepicker/js/jquery-1.11.3.min.js"></script>
        <script src="../datepicker/js/bootstrap.min.js"></script>
        <script src="../datepicker/js/moment-with-locales.js"></script>
        <script src="../datepicker/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.11.4/jquery-ui-1.11.4/jquery-ui.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">

            <div class="container-fluid" style="background-color:#5bc0de">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color:white"><?=namaKlinik()?></a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><?php echo $_SESSION['cabang']; ?></a></li>
                        <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
                        <li><a href="../login.php?aksi=logout">Log Out</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <?php
//                session_start();
//                error_reporting(0);
//                if (isset($_SESSION['level'])) {
//                    if ($_SESSION['level'] == 'admin') {
//                        include 'menu.php';
//                    } else {
//                        include 'menu_user.php;';
//                    }
//                }
//                ?>
<!--                          <div class="col-sm-3  sidebar">
                                    <ul class="nav nav-sidebar ">
                                        <li><a href="../home.php">Home</a></li>
                                        <li class="active"><a href="penambahan_pasien.php">Penambahan Pasien<span class="sr-only">(current)</span></a></li>
                                        <li><a href="data_pasien.php">Data Pasien</a></li>
                                        <li><a href="add_rawatjalan.php">Rawat Jalan</a></li>
                                        <li><a href="data_rawatjalan.php">Data Rawat Jalan</a></li>
                                        <li><a href="penambahan_petugas.php">Penambahan Petugas Kesehatan</a></li>
                                        <li><a href="data_petugas.php">Data Petugas Kesehatan</a></li>
                                        <li><a href="penambahan_user.php">Penambahan User</a></li>
                                        <li><a href="data_user.php">Data User</a></li>
                                        <li><a href="laporan_transaksi.php">Laporan Rawat Jalan</a></li>
                                        <li><a href="laporan_kuitansi.php">Laporan Kuitansi</a></li>

                                    </ul>
                                </div>-->
                <?php
                if($_SESSION['level'] == 'admin'){
                    include './sidebar.php';
                } else {
                    include './sidebaru.php';
                }
                ?>

                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main" style="margin-left: 20%;">
                    <h1 class="page-header">Pendaftaran Pasien</h1>
                    <h2 class="sub-header">Data Pasien</h2>
                    <form class="form-horizontal" name="addPasien" action="tambah_pasien.php" method="post" >
                        <!-- <div class="form-group">
                            <label for="inputTgl_dftr" class="col-sm-2 control-label">Tgl. Daftar</label>
                            <div class="col-sm-2">
                                <input type="text" name="tgl_dftr" class="form-control" id="inputTgl_dftr" value="<?php //echo date('d/m/Y')?>" readonly> 
                            </div>
                        </div> -->
                        
                        <div class="form-group">
                            <?php
//                            include '../koneksi.php';
//                            $no = mysql_query("select no_rm from pasien order by no_rm desc limit 1")or die(mysql_error());
//                            $no_rm = mysql_fetch_array($no) or die(mysql_error());
//
//                            $no_rmm = $no_rm[0] + 1;



                            ?>
                            <?php
//                            include '../koneksi.php';
//                            include '../library/library.php';
                            $dataKode	= buatKode("pasien_b", "RM");
                            ?>
                            <label for="inputNoRM" class="col-sm-2 control-label">No. RM</label>
                            <div class="col-sm-2">
                                <input type="text" name="norm" class="form-control" id="inputNoRM" value="<?php echo $dataKode;?>" placeholder="No. RM">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-3">
                                <input type="text" name="nama" class="form-control" id="inputNama" required="">
                            </div>
                            <label for="inputKln" class="col-sm-3 control-label">Kelamin</label>
                            <div class="col-sm-1">
                                <input type="text" name="kelamin" class="form-control" id="inputKln" required="" placeholder="L/ P">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTlahir" class="col-sm-2 control-label">Tempat Lahir</label>
                            <div class="col-sm-3">
                                <input type="text" name="t_lahir" class="form-control" id="inputTlahir" required="">
                            </div>
                            <label for="inputNik" class="col-sm-3 control-label">NIK</label>
                            <div class="col-sm-3">
                                <input type="text" name="nik" class="form-control" id="inputNik" required="" placeholder="NIK">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTanggalLahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                            <div class="col-sm-2">
                                <input type="text" name="tgl_lahir" class="form-control" id="inputTanggalLahir" required="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAgama" class="col-sm-2 control-label">Agama</label>
                            <div class="col-sm-2">
                                <select name="agama" id="inputAgama" class="form-control">
                                    <option></option>
                                    <option>Islam</option>
                                    <option>Protestan</option>
                                    <option>Katolik</option>
                                    <option>Hindu</option>
                                    <option>Budha</option>
                                    <option>Konghucu</option>
                                </select>
                            </div>
                            <label for="inputNegara" class="col-sm-4 control-label">Negara</label>
                            <div class="col-sm-2">
                                <select name="negara" id="inputNegara" class="form-control">
                                    <option></option>
                                    <option>Indonesia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStkw" class="col-sm-2 control-label">St. Kawin</label>
                            <div class="col-sm-2">
                            <select name="st_kawin" id="inputStkw" class="form-control">
                                <option></option>
                                <option>Sudah Kawin</option>
                                <option>Belum Kawin</option>
                                <option>Tidak Kawin</option>
                            </select>
                            </div>
                            <label for="inputPndd" class="col-sm-4 control-label">Pendidikan</label>
                            <div class="col-sm-2">
                                <select name="pndd" id="inputPndd" class="form-control">
                                    <option></option>
                                    <option>SMA</option>
                                    <option>D III</option>
                                    <option>S1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPkrj" class="col-sm-2 control-label">Pekerjaan</label>
                            <div class="col-sm-3">
                                <select name="pkrj" id="inputPkrj" class="form-control">
                                    <option></option>
                                    <option>Pegawai Negeri</option>
                                    <option>Karyawan Swasta</option>
                                    <option>Wirausaha</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="inputAlamat" required="" placeholder="Alamat Pasien">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTelp" class="col-sm-2 control-label">Telepon</label>
                            <div class="col-sm-2">
                                <input type="text" name="telpon" class="form-control" id="inputTelp" required="">
                            </div>
                            <label for="inputHP" class="col-sm-4 control-label">HP</label>
                            <div class="col-sm-2">
                                <input type="text" name="hp" class="form-control" id="inputHP" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputProv" class="col-sm-2 control-label">Provinsi</label>
                            <div class="col-sm-2">
                                <select name="provinsi" id="inputProv" class="form-control">
                                    <option></option>
                                    <option>Jawa Tengah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKt" class="col-sm-2 control-label">Kota/ Kab</label>
                            <div class="col-sm-2">
                                <select name="kt_kab" id="inputKt" class="form-control">
                                    <option></option>
                                    <option>Surakarta</option>
                                    <option>Karanganyar</option>
                                    <option>Sragen</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKec" class="col-sm-2 control-label">Kecamatan</label>
                            <div class="col-sm-2">
                            <select name="kecamatan" id="inputKec" class="form-control">
                                    <option></option>
                                    <option>Banjarsari</option>
                                    <option>Jebres</option>
                                    <option>Laweyan</option>
                                    <option>Pasar Kliwon</option>
                                    <option>Serengan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKel" class="col-sm-2 control-label">Kelurahan</label>
                            <div class="col-sm-2">
                                <select name="kelurahan" id="inputKel" class="form-control">
                                    <option></option>
                                    <option>Jebres</option>
                                    <option>Mojosongo</option>
                                </select>
                            </div>
                            <label for="inputRt" class="col-sm-4 control-label">RT</label>
                            <div class="col-sm-1">
                                <input type="text" name="rt" id="inputRt" class="form-control">
                            </div>
                            <label for="inputRw" class="col-sm-1 control-label">RW</label>
                            <div class="col-sm-1">
                                <input type="text" name="rw" id="inputRw" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPrs" class="col-sm-2 control-label">Pegawai RS</label>
                            <div class="col-sm-1">
                                <input type="text" name="pegrs" id="inputPrs" class="form-control" placeholder="Y/T">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTb" class="col-sm-2 control-label">Tinggi Badan</label>
                            <div class="col-sm-1">
                                <input type="text" name="tinggi" class="form-control" id="inputTb" required="">
                            </div>
                            <label for="inputBb" class="col-sm-2 control-label">Berat Badan</label>
                            <div class="col-sm-1">
                                <input type="text" name="berat" class="form-control" id="inputBb" required="">
                            </div>
                            <label for="inputLp" class="col-sm-2 control-label">Lingkar Perut</label>
                            <div class="col-sm-1">
                                <input type="text" name="lingkarp" class="form-control" id="inputLp">
                            </div>
                            <label for="inputImt" class="col-sm-1 control-label">IMT</label>
                            <div class="col-sm-1">
                                <input type="text" name="imt" class="form-control" id="inputImt">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSt" class="col-sm-2 control-label">Sistole</label>
                            <div class="col-sm-1">
                                <input type="text" name="sistole" class="form-control" id="inputSt" required="">
                            </div>
                            <label for="inputDt" class="col-sm-2 control-label">Diastole</label>
                            <div class="col-sm-1">
                                <input type="text" name="diastole" class="form-control" id="inputDt" required="">
                            </div>
                            <label for="inputRr" class="col-sm-2 control-label">Respiratory Rate</label>
                            <div class="col-sm-1">
                                <input type="text" name="r_rate" class="form-control" id="inputRr">
                            </div>
                            <label for="inputHr" class="col-sm-1 control-label">Heart Rate</label>
                            <div class="col-sm-1">
                                <input type="text" name="h_rate" class="form-control" id="inputHr">
                            </div>
                        </div>
                        
                        <h2 class="sub-header"></h2>
                        <div class="form-group">
                            <label for="inputWal" class="col-sm-2 control-label">Nama Wali</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="nm_wali" id="inputWal" required="">
                            </div>
                            <label for="inputHub" class="col-sm-3 control-label">Hub. Dgn. Pasien</label>
                            <div class="col-sm-3">
                                <select name="hub_wali" class="form-control" id="inputHub">
                                    <option></option>
                                    <option>Orang Tua Kandung</option>
                                    <option>Orang Tua Angkat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputOrtu" class="col-sm-2 control-label">Nama Ortu</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="nm_ortu" id="inputOrtu" required="">
                            </div>
                            <label for="inputPkrWal" class="col-sm-3 control-label">Pekerjaan Wali</label>
                            <div class="col-sm-3">
                                <select name="pkrj_wali" class="form-control" id="inputPkrWal">
                                    <option></option>
                                    <option>Pegawai Negeri</option>
                                    <option>Karyawan Swasta</option>
                                    <option>Wirausaha</option>
                                </select>
                            </div>
                        </div>
                        <h2 class="sub-header"></h2>
                        <div class="form-group">
                            <label for="inputAl" class="col-sm-2 control-label">Alergi Thd.</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="alergi" id="inputAl" required="">
                            </div>
                            <label for="inputUrk" class="col-sm-3 control-label">No. Urut Klinik</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="no_urk" id="inputUrk" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputIns" class="col-sm-2 control-label">Instansi</label>
                            <div class="col-sm-3">
                                <select name="instansi" class="form-control" id="inputIns">
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                            <label for="inputSmp" class="col-sm-3 control-label">Sumber Pasien</label>
                            <div class="col-sm-3">
                                <select name="sm_psn" class="form-control" id="inputSmp">
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStsp" class="col-sm-2 control-label">Status Pasien</label>
                            <div class="col-sm-1">
                                <input type="text" name="sts_psn" class="form-control" id="inputStsp" placeholder="B/ L">
                            </div>
                            <label for="inputPng" class="col-sm-5 control-label">NIK PNG</label>
                            <div class="col-sm-3">
                                <select name="nik_png" class="form-control" id="inputPng">
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKba" class="col-sm-2 control-label">Kartu Baru</label>
                            <div class="col-sm-1">
                                <input type="text" name="kr_b" class="form-control" id="inputKba">
                            </div>
                            <label for="inputNurd" class="col-sm-5 control-label">No. Urut Dokter</label>
                            <div class="col-sm-1">
                                <input type="text" name="no_urd" class="form-control" id="inputNurd" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button class="btn btn-primary" type="submit">Tambahkan</button>
                            </div>
                        </div>

                        <h2 class="sub-header">Peserta BPJS</h2>
                        <div class="form-group">
                            <label for="inputNokartu" class="col-sm-1 control-label">No. Kartu</label>
                            <div class="col-sm-2">
                                <input type="text" name="no_kartu" class="form-control" id="inputNokartu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNmbpjs" class="col-sm-1 control-label">Nama</label>
                            <div class="col-sm-3">
                                <input type="text" name="nm_bpjs" class="form-control" id="inputNmbpjs" readonly>
                            </div>
                            <label for="inputJkbpjs" class="col-sm-2 control-label">Jk</label>
                            <div class="col-sm-1">
                                <input type="text" name="jk_bpjs" class="form-control" id="inputJkbpjs" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTglbpjs" class="col-sm-1 control-label">Tgl. Lahir</label>
                            <div class="col-sm-2">
                                <input type="text" name="tgl_bpjs" class="form-control" id="inputTglbpjs" readonly>
                            </div>
                            <label for="inputPstbpjs" class="col-sm-1 control-label">PISAT</label>
                            <div class="col-sm-2">
                                <input type="text" name="pst_bpjs" class="form-control" id="inputPstbpjs" readonly>
                            </div>
                            <label for="inputKlsbpjs" class="col-sm-1 control-label">Kelas</label>
                            <div class="col-sm-2">
                                <input type="text" name="kls_bpjs" class="form-control" id="inputKlsbpjs" readonly>
                            </div>
                            <label for="inputPsrbpjs" class="col-sm-1 control-label">Peserta</label>
                            <div class="col-sm-2">
                                <input type="text" name="psr_bpjs" class="form-control" id="inputPsrbpjs" readonly>
                            </div>
                        </div>
                        <h2 class="sub-header">Poliklinik</h2>
                        <div class="form-group">
                            <label for="inputJnsrawat" class="col-sm-2 control-label">Jenis Rawat</label>
                            <div class="col-sm-2">
                                <select name="jnsrwt_bpjs" class="form-control" id="inputJnsrawat">
                                    <option>Jns. Rawat</option>
                                    <option>Rawat Jalan</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select name="klsrwt_bpjs" class="form-control" id="inputKlsrwt" readonly>
                                    <option>Kelas I</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select name="fksrwt_bpjs" class="form-control" id="inputFksrwt">
                                    <option>Faskes 1</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTglruj" class="col-sm-2 control-label">Tgl. Rujukan</label>
                            <div class="col-sm-2">
                                <input type="text" name="tglruj_bpjs" class="form-control" id="inputTglruj">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNoruj" class="col-sm-2 control-label">No Rujukan</label>
                            <div class="col-sm-2">
                                <input type="text" name="noruj_bpjs" class="form-control" id="inputNoruj">
                            </div>
                            <label for="inputNokon" class="col-sm-2 control-label">No. Kontrol</label>
                            <div class="col-sm-2">
                                <input type="text" name="nokon_bpjs" class="form-control" id="inputNokon">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPoli" class="col-sm-2 control-label">Poli Tujuan</label>
                            <div class="col-sm-2">
                                <select name="poli7an_bpjs" class="form-control" id="inputPoli">
                                    <option></option>
                                    <option>Umum</option>
                                    <option>Gigi</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDrrs" class="col-sm-2 control-label">Petugas Kesehatan</label>
                            <div class="col-sm-2">
                                <select name="drrs_bpjs" class="form-control" id="inputDrrs">
                                    <option value=""></option>
                                    <?php
                                        $dataPetugas = isset($_POST['pilihPetugas']) ? $_POST['pilihPetugas'] :"";
                                        $sql = mysqli_query($koneksi, "SELECT id_petugas, nama_petugas FROM petugas_kesehatan ORDER BY id_petugas");
                                        
                                        while($row = mysqli_fetch_array($sql))
                                        {
                                            if($row['id_petugas'] == $dataPetugas) {
                                                $pilih = "selected";
                                            }else{
                                                $pilih ="";
                                            }
                                            echo "<option value='".$row['id_petugas']."' ".$pilih.">".$row['nama_petugas']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <label for="inputPrks" class="col-sm-2 control-label">Periksa</label>
                            <div class="col-sm-2">
                                <select name="prks_bpjs" class="form-control" id="inputPrks">
                                    <option>P/S</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <select name="dr_bpjs" class="form-control" id="inputDrbpjs">
                                    <option></option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select name="drsbl_bpjs" class="form-control" id="inputDrsbl">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDiag" class="col-sm-2 control-label">Diagnosa</label>
                            <div class="col-sm-4">
                                <!-- <select name="diag_bpjs" class="form-control" id="inputDiag">
                                    <option></option>
                                </select> -->
                                <input type="text" name="diag_bpjs" class="form-control" id="inputDiag">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTind" class="col-sm-2 control-label">Tindakan</label>
                            <div class="col-sm-3">
                                <select name="tind_bpjs" class="form-control" id="inputTind">
                                    <option></option>
                                    <?php
                                        $daftarTindakan = isset($_POST['tind_bpjs']) ? $_POST['tind_bpjs'] : "";
                                        $sql = mysqli_query($koneksi, "SELECT id_tindakan, nama_tindakan FROM daftar_tindakan ORDER BY id_tindakan asc");
                                        while($row = mysqli_fetch_array($sql))
                                        {
                                            if($row['id_tindakan'] == $daftarTindakan){
                                                $pilih = " selected";
                                            }else{
                                                $pilih = "";
                                            }
                                            echo "<option value='".$row['id_tindakan']."'> [".$row['id_tindakan']."] ".$row['nama_tindakan']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCat" class="col-sm-2 control-label">Catatan</label>
                            <div class="col-sm-4">
                                <input type="text" name="catat_bpjs" class="form-control" id="inputCat">
                            </div>
                        </div>
                        <!-- <div class="form-group" style="margin-left: 10px">
                            <label for="inputKhs"  style="background-color:greenyellow">Khusus</label>
                                <input type="checkbox" name="khs_bpjs" id="inputKhs">
                            <label for="inputCito" style="background-color:#ff5959">Cito</label>
                                <input type="checkbox" name="cito_bpjs" id="inputCito">
                            <label for="inputInden" style="background-color:teal">Inden</label>
                                <input type="checkbox" name="inden_bpjs" id="inputInden">
                            <label for="inputKec" style="background-color:orange">Kecelakaan</label>
                                <input type="checkbox" name="kec_bpjs" id="inputKec">
                            <label for="inputMan" style="background-color:green">Manual</label>
                                <input type="checkbox" name="man_bpjs" id="inputMan">
                            <label for="inputKat" style="background-color:pink">Katarak</label>
                                <input type="checkbox" name="kat_bpjs" id="inputKat">
                            <label for="inputFas" style="background-color:red">Fast Track</label>
                                <input type="checkbox" name="fas_bpjs" id="inputFas">
                        </div> -->
                        <div class="form-group">
                            <label for="inputCsep" class="col-sm-2 control-label">Cari No. SEP</label>
                            <div class="col-sm-4">
                                <input type="text" name="csep_bpjs" class="form-control" id="inputCsep">
                            </div>
                            <div class="col-sm-1">
                            <button class="form-control" style="background-color:#05deff; color: white; border-radius: 5px 5px; border: none;">Cari</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <button class="form-control" style="background-color:red; color:white; border-radius: 5px 5px;">Tambah</button>
                            </div>
                            <div class="col-sm-2">
                                <button class="form-control" style="background-color:#05deff; color:white; border-radius: 5px 5px;">Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <script>
            function getAge() {
	var date = document.getElementById('birthday').value;
 
	if(date === ""){
		alert("Please complete the required field!");
    }else{
		var today = new Date();
		var birthday = new Date(date);
		var year = 0;
		if (today.getMonth() < birthday.getMonth()) {
			year = 1;
		} else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
			year = 1;
		}
		var age = today.getFullYear() - birthday.getFullYear() - year;
 
		if(age < 0){
			age = 0;
		}
		document.getElementById('result').innerHTML = age;
	}
}
        $(function() {
            $('#inputTanggalLahir').datetimepicker({locale: 'id', format: "DD-MM-YYYY"});
        });

        $(function() {
            $('#inputTglruj').datetimepicker({locale: 'id', format: "DD-MM-YYYY"});
        });

        $(function() {
            $('#inputDiag').autocomplete({
                source: "data.php",
                minLength: 1,
            });
        });
        </script>
    </body>
</html>

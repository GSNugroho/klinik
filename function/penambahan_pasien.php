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
        <script type="text/javascript" src="../js/sweetalert.min.js"></script>
        <style>
            table {
                display: block;
                height: 200px;
                overflow-y: auto;
            }
        </style>
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

                <div class="main">
                    <h6 class="sub-header">Data Pasien</h6>
                    <form class="form-horizontal" name="addPasien" action="" method="post" id="pendaftaran" autocomplete="off">
                        <div class="form-group">
                            <label for="inputTgl_dftr" class="col-sm-1 control-label">Tgl. Daftar</label>
                            <div class="col-sm-2">
                                <input type="text" name="tglDaftar" class="form-control" id="tglDaftar" value="<?php echo date('d/m/Y')?>" readonly> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputNoRM" class="col-sm-1 control-label">No. RM</label>
                            <div class="col-sm-2">
                                <input type="text" name="norm" class="form-control" id="inputNoRM">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-1 control-label">Nama</label>
                            <div class="col-sm-2">
                                <input type="text" name="nama" class="form-control" id="inputNama" required="">
                            </div>
                            <label for="inputKln" class="col-sm-1 control-label">Kelamin</label>                            
                            <div class="col-sm-2">
                            <input type="text" name="kelamin" class="form-control" id="inputKln" required="" placeholder="L/ P">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTlahir" class="col-sm-1 control-label">Tempat Lahir</label>
                            <div class="col-sm-2">
                                <input type="text" name="t_lahir" class="form-control" id="inputTlahir" required="">
                            </div>
                            <label for="inputNik" class="col-sm-1 control-label">NIK</label>
                            <div class="col-sm-2">
                                <input type="text" name="nik" class="form-control" id="inputNik" required="" placeholder="NIK">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTanggalLahir" class="col-sm-1 control-label">Tanggal Lahir</label>
                            <div class="col-sm-2">
                                <input type="text" name="tgl_lahir" class="form-control" id="inputTanggalLahir" required="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAgama" class="col-sm-1 control-label">Agama</label>
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
                            <label for="inputNegara" class="col-sm-1 control-label">Negara</label>
                            <div class="col-sm-2">
                                <select name="negara" id="inputNegara" class="form-control">
                                    <option></option>
                                    <option>Indonesia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStkw" class="col-sm-1 control-label">St. Kawin</label>
                            <div class="col-sm-2">
                            <select name="st_kawin" id="inputStkw" class="form-control">
                                <option></option>
                                <option>Sudah Kawin</option>
                                <option>Belum Kawin</option>
                                <option>Tidak Kawin</option>
                            </select>
                            </div>
                            <label for="inputPndd" class="col-sm-1 control-label">Pendidikan</label>
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
                            <label for="inputPkrj" class="col-sm-1 control-label">Pekerjaan</label>
                            <div class="col-sm-2">
                                <select name="pkrj" id="inputPkrj" class="form-control">
                                    <option></option>
                                    <option>Pegawai Negeri</option>
                                    <option>Karyawan Swasta</option>
                                    <option>Wirausaha</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAlamat" class="col-sm-1 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="inputAlamat" required="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTelp" class="col-sm-1 control-label">Telepon</label>
                            <div class="col-sm-2">
                                <input type="text" name="telpon" class="form-control" id="inputTelp" required="">
                            </div>
                            <label for="inputHP" class="col-sm-1 control-label">HP</label>
                            <div class="col-sm-2">
                                <input type="text" name="hp" class="form-control" id="inputHP" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputProv" class="col-sm-1 control-label">Provinsi</label>
                            <div class="col-sm-2">
                                <select name="provinsi" id="inputProv" class="form-control">
                                    <option></option>
                                    <option>Jawa Tengah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKt" class="col-sm-1 control-label">Kota/ Kab</label>
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
                            <label for="inputKec" class="col-sm-1 control-label">Kecamatan</label>
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
                            <label for="inputKel" class="col-sm-1 control-label">Kelurahan</label>
                            <div class="col-sm-2">
                                <select name="kelurahan" id="inputKel" class="form-control">
                                    <option></option>
                                    <option>Jebres</option>
                                    <option>Mojosongo</option>
                                </select>
                            </div>
                            <label for="inputRt" class="col-sm-1 control-label">RT</label>
                            <div class="col-sm-2">
                                <input type="text" name="rt" id="inputRt" class="form-control" style="width:40%;">
                            </div>
                            <label for="inputRw" class="col-sm-1 control-label">RW</label>
                            <div class="col-sm-2">
                                <input type="text" name="rw" id="inputRw" class="form-control" style="width:40%;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPrs" class="col-sm-1 control-label">Pegawai RS</label>
                            <div class="col-sm-2">
                                <input type="text" name="pegrs" id="inputPrs" class="form-control" placeholder="Y/T" style="width:40%;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTb" class="col-sm-1 control-label">Tinggi Badan</label>
                            <div class="col-sm-2">
                                <input type="text" name="tinggiBadan" class="form-control" id="inputTb" required="" style="width:40%;">
                            </div>
                            <label for="inputBb" class="col-sm-1 control-label">Berat Badan</label>
                            <div class="col-sm-2">
                                <input type="text" name="beratBadan" class="form-control" id="inputBb" required="" style="width:40%;">
                            </div>
                            <label for="inputLp" class="col-sm-1 control-label">Lingkar Perut</label>
                            <div class="col-sm-2">
                                <input type="text" name="lingkarp" class="form-control" id="inputLp" style="width:40%;">
                            </div>
                            <label for="inputImt" class="col-sm-1 control-label">IMT</label>
                            <div class="col-sm-2">
                                <input type="text" name="imt" class="form-control" id="inputImt" style="width:40%;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSt" class="col-sm-1 control-label">Sistole</label>
                            <div class="col-sm-2">
                                <input type="text" name="sistole" class="form-control" id="inputSt" required="" style="width:40%;">
                            </div>
                            <label for="inputDt" class="col-sm-1 control-label">Diastole</label>
                            <div class="col-sm-2">
                                <input type="text" name="diastole" class="form-control" id="inputDt" required="" style="width:40%;">
                            </div>
                            <label for="inputRr" class="col-sm-1 control-label">Respiratory Rate</label>
                            <div class="col-sm-2">
                                <input type="text" name="respRate" class="form-control" id="inputRr" style="width:40%;">
                            </div>
                            <label for="inputHr" class="col-sm-1 control-label">Heart Rate</label>
                            <div class="col-sm-2">
                                <input type="text" name="heartRate" class="form-control" id="inputHr" style="width:40%;">
                            </div>
                        </div>
                        
                        <h2 class="sub-header"></h2>
                        <div class="form-group">
                            <label for="inputWal" class="col-sm-1 control-label">Nama Wali</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="nm_wali" id="inputWal" required="">
                            </div>
                            <label for="inputHub" class="col-sm-1 control-label">Hub. Dgn. Pasien</label>
                            <div class="col-sm-3">
                                <select name="hub_wali" class="form-control" id="inputHub">
                                    <option></option>
                                    <option>Orang Tua Kandung</option>
                                    <option>Orang Tua Angkat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputOrtu" class="col-sm-1 control-label">Nama Ortu</label>
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
                        <!-- <h2 class="sub-header"></h2>
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
                        </div> -->
                        <!-- <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button class="btn btn-primary" type="submit">Tambahkan</button>
                            </div>
                        </div> -->

                        <h2 class="sub-header">Peserta BPJS</h2>
                        <div class="form-group">
                            <label for="inputNokartu" class="col-sm-1 control-label">No. Kartu</label>
                            <div class="col-sm-2">
                                <input type="text" name="noKartu" class="form-control" id="inputNokartu">
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
                        <h2 class="sub-header">Riwayat</h2>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <table border="1" id="inputRiwrs" class="table table-bordered">
                                <thead style="width:auto;">
                                    <th style="width:26%">Kunjungan</th>
                                    <th>Tgl. Periksa</th>
                                    <th>Poliklinik</th>
                                    <th>Diagnosis</th>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <table border="1" id="inputRiwbpjs" class="table table-bordered" style="overflow-y:auto;">
                                <thead style="width:auto;">
                                    <th style="width:26%">Kunjungan</th>
                                    <th>Tgl. Periksa</th>
                                    <th>No. BPJS</th>
                                    <th>Diagnosis</th>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
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
                                <select name="kdPoli" class="form-control" id="inputPoli">
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
                                    <option value=''></option>
                                    <?php
                                        // $dataPetugas = isset($_POST['pilihPetugas']) ? $_POST['pilihPetugas'] :"";
                                        $sql = mysqli_query($koneksi, "SELECT id_petugas, nama_petugas FROM petugas_kesehatan WHERE status != 'tidak aktif' ORDER BY id_petugas");
                                        
                                        while($row = mysqli_fetch_array($sql))
                                        {

                                            echo "<option value='".$row['id_petugas']."'>".$row['nama_petugas']."</option>";
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
                                <input type="text" name="diag_bpjs" class="form-control" id="inputDiag">
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
                                <!-- <button class="form-control" style="background-color:red; color:white; border-radius: 5px 5px;" onclick="tambah()">Tambah</button> -->
                                <a href="#" class="btn btn-danger" style="background-color:red; color:white; border-radius: 5px 5px;" onclick="tambah()">Bersihkan</a>
                            </div>
                            <div class="col-sm-2">
                                <!-- <button class="form-control" style="background-color:#05deff; color:white; border-radius: 5px 5px;">Simpan</button> -->
                                <input type="button" name="submit" class="form-control" id="submit" value="Simpan" style="background-color:#05deff; color:white; border-radius: 5px 5px;">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <script>

        function tambah()
        {
            document.getElementById('inputNoRM').value = "";
            document.getElementById('inputNama').value = "";
            document.getElementById('inputKln').value = "";
            document.getElementById('inputTlahir').value = "";
            document.getElementById('inputNik').value = "";
            document.getElementById('inputTanggalLahir').value = "";
            document.getElementById('inputAgama').value = "";
            document.getElementById('inputNegara').value = "";
            document.getElementById('inputStkw').value = "";
            document.getElementById('inputPndd').value = "";
            document.getElementById('inputPkrj').value = "";
            document.getElementById('inputAlamat').value = "";
            document.getElementById('inputTelp').value = "";
            document.getElementById('inputHP').value = "";
            document.getElementById('inputProv').value = "";
            document.getElementById('inputKt').value = "";
            document.getElementById('inputKec').value = "";
            document.getElementById('inputKel').value = "";
            document.getElementById('inputRt').value = "";
            document.getElementById('inputRw').value = "";
            document.getElementById('inputPrs').value = "";
            document.getElementById('inputTb').value = "";
            document.getElementById('inputBb').value = "";
            document.getElementById('inputLp').value = "";
            document.getElementById('inputImt').value = "";
            document.getElementById('inputSt').value = "";
            document.getElementById('inputDt').value = "";
            document.getElementById('inputRr').value = "";
            document.getElementById('inputHr').value = "";
            document.getElementById('inputWal').value = "";
            document.getElementById('inputHub').value = "";
            document.getElementById('inputOrtu').value = "";
            document.getElementById('inputPkrWal').value = "";
            document.getElementById('inputNokartu').value = "";
            document.getElementById('inputNmbpjs').value = "";
            document.getElementById('inputJkbpjs').value = "";
            document.getElementById('inputTglbpjs').value = "";
            document.getElementById('inputPstbpjs').value = "";
            document.getElementById('inputKlsbpjs').value = "";
            document.getElementById('inputPsrbpjs').value = "";
            $('#inputRiwrs tbody').remove();
            var trHtml = '';
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

        $(function() {
			$("#inputNoRM").on('keyup', function(){
            var dtrm = $('#inputNoRM').val();
            $.ajax({
                type: "POST",      
                dataType: "json",
                url: "ajaxrm.php",    
                data: { 'dtrm': dtrm},
                success: function(data){
                    var trHTML = '';
                    $.each(data, function (a, b) {
                    $('#inputNama').val(b.nm_pasien);
                    $('#inputKln').val(b.jk_pasien);
                    $('#inputTlahir').val(b.tmpt_lahir);
                    $('#inputNik').val(b.nik);
                    $('#inputTanggalLahir').val(b.tgl_lahir);
                    $('#inputAgama').val(b.agm_pasien);
                    $('#inputNegara').val(b.neg_pasien);
                    $('#inputStkw').val(b.sts_kwn);
                    $('#inputPndd').val(b.pend_pasien);
                    $('#inputPkrj').val(b.pkrj_pasien);
                    $('#inputAlamat').val(b.alamat_pasien);
                    $('#inputTelp').val(b.tlp_pasien);
                    $('#inputHP').val(b.hp_pasien);
                    $('#inputProv').val(b.prov_pasien);
                    $('#inputKt').val(b.kot_pasien);
                    $('#inputKec').val(b.kec_pasien);
                    $('#inputKel').val(b.kel_pasien);
                    $('#inputRt').val(b.rt_pasien);
                    $('#inputRw').val(b.rw_pasien);
                    $('#inputPrs').val(b.peg_rs);
                    $('#inputTb').val(b.tinggi_pasien);
                    $('#inputBb').val(b.berat_pasien);
                    $('#inputLp').val(b.lp_pasien);
                    $('#inputImt').val(b.imp_pasien);
                    $('#inputSt').val(b.sis_pasien);
                    $('#inputDt').val(b.dia_pasien);
                    $('#inputRr').val(b.rr_pasien);
                    $('#inputHr').val(b.hr_pasien);
                    $('#inputWal').val(b.nm_wali);
                    $('#inputHub').val(b.hub_wali);
                    $('#inputOrtu').val(b.nm_ortu);
                    $('#inputPkrWal').val(b.pkrj_wali);
                    $('#inputNokartu').val(b.no_bpjs);

                    if(b.id_kunjungan != null) {
                        trHTML += '<tr><td>' + b.id_kunjungan +
                            '</td><td>' + b.tgl_periksa +
                            '</td><td>' + b.poliklinik +
                            '</td><td>' + b.nama_indonesia +
                            '</td></tr>';
                    }
                    });

                    $('#inputRiwrs').append(trHTML);

                    if($('#inputNokartu').val() != ''){
                    var bpjs = $('#inputNokartu').val();
                    var nokartu = "nokartu="+bpjs;

                    $.ajax({
                        type: "get",
                        dataType: "json",
                        url: "http://api.bpjs-kesehatan.go.id/pcare-rest-v3.0/kunjungan/peserta/"+bpjs,
                        // data: nokartu,
                        success: function(response){
                                // $.each(data, function(a, b)){
                                //     bpHtml = '<tr><td>'+b.+'</td></tr>'
                                // }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            // alert('Error: '+e);
                            swal({
                                title: "Error",
                                text: "Koneksi Gagal",
                                icon: "error"
                            });
                        }  
                    })

                    $.ajax({
                        type: "get",
                        dataType: "json",
                        url: "http://api.bpjs-kesehatan.go.id/pcare-rest-v3.0/peserta/"+bpjs,
                        success: function(response){
                            $('#inputNmbpjs').val(response.nama);
                            $('#inputJkbpjs').val(response.sex);
                            $('#inputTglbpjs').val(response.tglLahir);
                            $('#inputKlsbpjs').val(response.jnsKelas['nama']);
                            $('#inputPsrbpjs').val(response.jnsPeserta['nama']);
                        }
                    })
                }
                }
                });
            });
	    });

        $(function() {
            $('#submit').click(function(){
                var norm = $('#inputNoRM').val();
                // if(norm == '')
                // {
                //     $('#inputNoRM').focus();
                //     return false;
                // }
                var nmpas = $('#inputNama').val();
                if(nmpas == '')
                {
                    $('#inputNama').focus();
                    return false;
                }
                var jk = $('#inputKln').val();
                if(jk == '')
                {
                    $('#inputKln').focus();
                    return false;
                }
                var tlahir = $('#inputTlahir').val();
                if(tlahir == '')
                {
                    $('#inputTlahir').focus();
                    return false;
                }
                var nik = $('#inputNik').val();
                if(nik == '')
                {
                    $('#inputNik').focus();
                    return false;
                }
                var tgll = $('#inputTanggalLahir').val();
                if(tgll == '')
                {
                    $('#inputTanggalLahir').focus();
                    return false;
                }
                var agm = $('#inputAgama').val();
                if(agm == '')
                {
                    $('#inputAgama').focus();
                    return false;
                }
                var neg = $('#inputNegara').val();
                if(neg == '')
                {
                    $('#inputNegara').val();
                    return false;
                }
                var stkw = $('#inputStkw').val();
                if(stkw == '')
                {
                    $('#inputStkw').focus();
                    return false;
                }
                var pndd = $('#inputPndd').val();
                if(pndd == '')
                {
                    $('#inputPndd').focus();   
                    return false;
                }
                var pkrj = $('#inputPkrj').val();
                if(pkrj == '')
                {
                    $('#inputPkrj').focus();
                    return false;
                }
                var almt = $('#inputAlamat').val();
                if(almt == '')
                {
                    $('#inputAlamat').focus();
                    return false;
                }
                var tlp = $('#inputTelp').val();
                if(tlp == '')
                {
                    $('#inputTelp').focus();
                    return false;
                }
                var hp = $('#inputHP').val();
                if(hp == '')
                {
                    $('#inputHP').focus();
                    return false;
                }
                var prov = $('#inputProv').val();
                if(prov == '')
                {
                    $('#inputProv').focus();
                    return false;
                }
                var kot = $('#inputKt').val();
                if(kot == '')
                {
                    $('#inputKt').focus();
                    return false;
                }
                var kec = $('#inputKec').val();
                if(kec == '')
                {
                    $('#inputKec').focus();
                    return false;
                }
                var kel = $('#inputKel').val()
                if(kel == '')
                {
                    $('#inputKel').focus();
                    return false;
                }
                var rt = $('#inputRt').val();
                if(rt == '')
                {
                    $('#inputRt').focus();
                    return false;
                }
                var rw = $('#inputRw').val();
                if(rw == '')
                {
                    $('#inputRw').focus();
                    return false;
                }
                var prs = $('#inputPrs').val();
                if(prs == '')
                {
                    $('#inputPrs').focus();
                    return false;
                }
                var tb = $('#inputTb').val();
                if(tb == '')
                {
                    $('#inputTb').focus();
                    return false;
                }
                var bb = $('#inputBb').val();
                if(bb == '')
                {
                    $('#inputBb').focus();
                    return false;
                }
                var lp = $('#inputBb').val();
                if(lp == '')
                {
                    $('#inputBb').focus();
                    return false;
                }
                var imt = $('#inputImt').val();
                if(imt == '')
                {
                    $('#inputImt').focus();
                    return false;
                }
                var st = $('#inputSt').val();
                if(st == '')
                {
                    $('#inputSt').focus();
                    return false;
                }
                var ds = $('#inputDt').val();
                if(ds == '')
                {
                    $('#inputDt').focus();
                    return false;
                }
                var rr = $('#inputRr').val();
                if(rr == '')
                {
                    $('#inputRr').focus();
                    return false;
                }
                var hr = $('#inputHr').val();
                if(hr == '')
                {
                    $('#inputHr').focus();
                    return false;
                }
                var nmwl = $('#inputWal').val();
                if(nmwl == '')
                {
                    $('#inputWal').focus();
                    return false;
                }
                var hbwl = $('#inputHub').val();
                if(hbwl == '')
                {
                    $('#inputHub').focus();
                    return false;
                }
                var orwl = $('#inputOrtu').val();
                if(orwl == '')
                {
                    $('#inputOrtu').focus();
                    return false;
                }
                var prwl = $('#inputPkrWal').val();
                if(prwl == '')
                {
                    $('#inputPkrWal').focus();
                    return false;
                }
                var nobpjs = $('#inputNokartu').val();
                var jnswrt = $('#inputKlsrwt').val();
                var klsrwt = $('#inputKlsrwt').val();
                var fksrwt = $('#inputFksrwt').val();
                var tglruj = $('#inputTglruj').val();
                var noruj = $('#inputNoruj').val();
                var nokon = $('#inputNokon').val();
                var poli7a = $('#inputPoli option:selected').val();
                var petrs = $('#inputDrrs option:selected').val();
                var diag = $('#inputDiag').val();
                var cata = $('#inputCat').val();
                
                var dataString = 'no_rm='+ norm + '&nm_pasien=' + nmpas + '&jk_pasien=' + jk + '&tmpt_lahir=' + tlahir 
                + '&nik=' + nik + '&tgl_lahir=' + tgll + '&agm_pasien=' + agm + '&neg_pasien=' + neg + '&sts_kwn=' + stkw
                + '&pend_pasien=' + pndd + '&pkrj_pasien=' + pkrj + '&alamat_pasien=' + almt + '&tlp_pasien=' + tlp 
                + '&hp_pasien=' + hp + '&prov_pasien=' + prov + '&kot_pasien=' + kot + '&kec_pasien=' + kec + '&kel_pasien=' + kel
                + '&rt_pasien=' + rt + '&rw_pasien=' + rw + '&peg_rs=' + prs + '&tinggi_pasien=' + tb + '&berat_pasien=' + bb 
                + '&lp_pasien=' + lp + '&imp_pasien=' + imt + '&sis_pasien=' + st + '&dia_pasien=' + ds + '&rr_pasien=' + rr 
                + '&hr_pasien=' + hr + '&nm_wali=' + nmwl + '&hub_wali=' + hbwl + '&nm_ortu=' + orwl + '&pkrj_wali=' + prwl
                + '&no_bpjs=' + nobpjs + '&jns_rwt=' + jnswrt + '&kls_rwt=' + klsrwt + '&fks_rwt=' + fksrwt + '&tgl_ruj=' + tglruj
                + '&no_ruj=' + noruj + '&no_kon=' + nokon + '&poli=' + poli7a + '&pet_rs=' + petrs + '&diag=' + diag + '&cata=' + cata;

                var dataForm = $('#pendaftaran').serialize();
                $.ajax({
                    type: 'post',
                    url: 'tambah_pasien.php',
                    data: dataString,
                    success: function() {
                        swal("", "Pendaftaran Pasien Berhasil", "success");
                        $('#inputRiwrs tbody').remove();

                        $.ajax({
                            type: 'post',
                            dataType: 'json',
                            url: 'http://api.bpjs-kesehatan.go.id/pcare-rest-v3.0/kunjungan',
                            data : $('#pendaftaran').serialize(),
                            success: function(response) {
                                console.log('sukses');
                            }
                        })
                        },
                    error: function(e){
                        swal({
                            title: "Error",
                            text: e,
                            icon: "error"
                        })
                    }
                });
            });
        });
        </script>
    </body>
</html>

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

                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main" style="margin-left:15%;">
                    <h1 class="page-header">Penambahan Pasien</h1>
                    <form class="form-horizontal" name="addPasien" action="tambah_pasien.php" method="post" >
                        <div class="form-group">
                            <label for="inputTgl_dftr" class="col-sm-2 control-label">Tgl. Daftar</label>
                            <div class="col-sm-2">
                                <input type="text" name="tgl_dftr" class="form-control" id="inputTgl_dftr" value="<?php echo date('d/m/Y')?>" readonly> <!--<span id="waktu"></span>-->
                            </div>
                        </div>
                        
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
                            $dataKode	= buatKode("pasien", "RM");
                            ?>
                            <label for="inputNoRM" class="col-sm-2 control-label">No. RM</label>
                            <div class="col-sm-2">
                                <input type="text" name="norm" class="form-control" id="inputNoRM" value="<?php echo $dataKode;?>" placeholder="No. RM">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-3">
                                <input type="text" name="nama" class="form-control" id="inputNama" required="" placeholder="Nama Pasien">
                            </div>
                            <label for="inputKln" class="col-sm-2 control-label">Kelamin</label>
                            <div class="col-sm-1">
                                <input type="text" name="kelamin" class="form-control" id="inputKln" required="" placeholder="L/ P">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTlahir" class="col-sm-2 control-label">Tempat Lahir</label>
                            <div class="col-sm-3">
                                <input type="text" name="t_lahir" class="form-control" id="inputTlahir" required="" placeholder="Tempat Lahir">
                            </div>
                            <label for="inputNik" class="col-sm-2 control-label">NIK</label>
                            <div class="col-sm-3">
                                <input type="text" name="nik" class="form-control" id="inputNik" required="" placeholder="NIK">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTanggalLahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                            <div class="col-sm-2">
                                <input type="date" name="tgl_lahir" class="form-control" id="inputTanggalLahir" required="" placeholder="Tahun-Bulan-tanggal">
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
                            <label for="inputNegara" class="col-sm-3 control-label">Negara</label>
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
                            <label for="inputPndd" class="col-sm-3 control-label">Pendidikan</label>
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
                            <div class="col-sm-8">
                                <input type="text" name="alamat" class="form-control" id="inputAlamat" required="" placeholder="Alamat Pasien">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTelp" class="col-sm-2 control-label">Telepon</label>
                            <div class="col-sm-2">
                                <input type="text" name="telpon" class="form-control" id="inputTelp" required="">
                            </div>
                            <label for="inputHP" class="col-sm-3 control-label">HP</label>
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
                            <label for="inputRt" class="col-sm-3 control-label">RT</label>
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
                                <input type="text" name="pegrs" id="inputPrs" class="form-control" placeholder="Y/ T">
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
                        <div class="form-group">
                            <label for="inputWal" class="col-sm-2 control-label">Nama Wali</label>
                            <div class="col-sm-2">
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
                            <div class="col-sm-2">
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
                        <!-- <div class="form-group">
                            <label for="inputAl" class="col-sm-2 control-label">Alergi Thd.</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="alergi" id="inputAl" required="">
                            </div>
                            <label for="inputUrk" class="col-sm-2 control-label">No. Urut Klinik</label>
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
                            <label for="inputSmp" class="col-sm-2 control-label">Sumber Pasien</label>
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
                            <label for="inputPng" class="col-sm-4 control-label">NIK PNG</label>
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
                            <label for="inputNurd" class="col-sm-4 control-label">No. Urut Dokter</label>
                            <div class="col-sm-1">
                                <input type="text" name="no_urd" class="form-control" id="inputNurd" readonly>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button class="btn btn-primary" type="submit">Tambahkan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <script>
            var timeDisplay = document.getElementById("waktu");
            function refreshTime() {
            var dateString = new Date().toLocaleString("en-US", {timeZone: "Asia/Jakarta"});
            var formattedString = dateString.replace(", ", " - ");
            timeDisplay.innerHTML = formattedString;
            }

            setInterval(refreshTime, 1000);
        </script>
    </body>
</html>

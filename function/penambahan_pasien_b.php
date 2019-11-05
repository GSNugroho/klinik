<?php
$arrActive['tambahPasienb'] = 'active';
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

                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main" style="margin-left: 20%">
                    <h1 class="page-header">Penambahan Pasien Umum</h1>
                    <form class="form-horizontal" name="addPasien" action="tambah_pasien.php" method="post" >
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
                            <label for="inputNoRM" class="col-sm-3 control-label">No. RM</label>
                            <div class="col-sm-9">
                                <input type="text" name="norm" class="form-control" id="inputNoRM" value="<?php echo $dataKode;?>" placeholder="No. RM">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputNama" required="" placeholder="Nama Pasien">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAlamat" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="inputAlamat" required="" placeholder="Alamat Pasien">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUmur" class="col-sm-3 control-label">Umur</label>
                            <div class="col-sm-9">
                                <input type="text" name="umur" class="form-control" id="inputUmur" required="" placeholder="Umur Pasien">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTempatLahir" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tempat_lahir" class="form-control" id="inputTempatLahir" required="" placeholder="Tempat Lahir Pasien">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTanggalLahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_lahir" class="form-control" id="inputTanggalLahir" required="" placeholder="Tahun-Bulan-tanggal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputJenisKelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select name="jenis_kelamin" class="form-control">
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                        </div>
<!--                        <div class="form-group">
                            <label for="inputTanggalDaftar" class="col-sm-3 control-label">Tanggal daftar</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_daftar" class="form-control" id="inputTanggalDaftar" placeholder="Tahun-Bulan-tanggal">
                            </div>
                        </div>-->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button class="btn btn-primary" type="submit">Tambahkan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

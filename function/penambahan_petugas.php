<?php
$arrActive['tambahPetugas'] = 'active';
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
        <link rel="stylesheet" type="text/css" href="../datepicker/css/ilmudetil.css">
        <link rel="stylesheet" type="text/css" href="../datepicker/css/bootstrap-datetimepicker.css">
        <link rel="stylesheet" type="text/css" href="../js/jquery-ui-1.11.4/jquery-ui-1.11.4/jquery-ui.min.css"> 
        
        <script src="../datepicker/js/jquery-1.11.3.min.js"></script>
        <script src="../datepicker/js/bootstrap.min.js"></script>
        <script src="../datepicker/js/moment-with-locales.js"></script>
        <script src="../datepicker/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.11.4/jquery-ui-1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" src="../js/sweetalert.min.js"></script>
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
<!--                <div class="col-sm-3  sidebar">
                    <ul class="nav nav-sidebar ">               
                        <li><a href="../home.php">Home</a></li>
                        <li><a href="penambahan_pasien.php">Penambahan Pasien</a></li>
                        <li><a href="data_pasien.php">Data Pasien</a></li>
                        <li><a href="add_rawatjalan.php">Rawat Jalan</a></li>
                        <li><a href="data_rawatjalan.php">Data Rawat Jalan</a></li>
                        <li class="active"><a href="penambahan_petugas.php">Penambahan Petugas Kesehatan<span class="sr-only">(current)</span></a></li>
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
                    <h1 class="page-header">Penambahan Petugas Kesehatan</h1>
                    <form class="form-horizontal" name="addPetugas" action="tambah_petugas.php" method="post" >
                        <div class="form-group">
                            <?php
//                            include '../koneksi.php';
//                            include '../library/library.php';
                            $dataKode	= buatKode("petugas_kesehatan", "P");
                            ?>
                            <label for="inputIdPetugas" class="col-sm-3 control-label">Id Petugas</label>
                            <div class="col-sm-9">
                                <input type="text" name="idPetugas" class="form-control" readonly id="inputIdPetugas" value="<?php echo $dataKode;?>" placeholder="Id Petugas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputNama" required="" placeholder="Nama Petugas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAlamat" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="inputAlamat" required="" placeholder="Alamat Petugas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTempatLahir" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tempat_lahir" class="form-control" id="inputTempatLahir" required="" placeholder="Tempat Lahir Petugas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTanggalLahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tgl_lahir" class="form-control" id="inputTanggalLahir" required="" placeholder="dd-mm-yyyy">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNoTelp" class="col-sm-3 control-label">No. Telp / HP</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_telp" class="form-control" id="inputNoTelp" required="" placeholder="No. Telp / HP">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPoliklinik" class="col-sm-3 control-label">Poliklinik</label>
                            <div class="col-sm-9">
                                <select name="poliklinik" class="form-control">
                                    <option>Umum</option>
                                    <option>Gigi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control">
                                    <option>aktif</option>
                                    <option>tidak aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button class="btn btn-primary" type="submit">Tambahkan</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <script>
            $(function() {
                $('#inputTanggalLahir').datetimepicker({locale: 'id', format: "DD-MM-YYYY"});
            });
        </script>
    </body>
</html>

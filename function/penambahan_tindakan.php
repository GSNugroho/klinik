<?php
$arrActive['tambahTindakan'] = 'active';
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
                    <h1 class="page-header">Penambahan Tindakan</h1>
                    <form class="form-horizontal" name="addTindakan" action="tambah_tindakan.php" method="post" >
                        <div class="form-group">
                            <?php
//                            include '../koneksi.php';
//                            include '../library/library.php';
                            $dataKode	= buatKode("daftar_tindakan", "T");
                            ?>
                            <label for="inputIdTindakan" class="col-sm-3 control-label">Id Tindakan</label>
                            <div class="col-sm-9">
                                <input type="text" name="idTindakan" class="form-control" readonly id="inputIdTindakan" value="<?php echo $dataKode;?>" placeholder="Id Tindakan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNamaTindakan" class="col-sm-3 control-label">Nama Tindakan</label>
                            <div class="col-sm-9">
                                <input type="text" name="namaTindakan" class="form-control" id="inputNamaTindakan" required="" placeholder="Nama Tindakan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputHarga" class="col-sm-3 control-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="text" name="harga" class="form-control" id="inputHarga" required="" placeholder="Harga">
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
    </body>
</html>


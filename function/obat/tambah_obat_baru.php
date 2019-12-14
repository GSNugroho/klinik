<?php
$arrActive['tambah_obat'] = 'active';
session_start();
include '../../koneksi.php';
include '../../library/library.php';
$dataKode = buatKode("obat", "O");
if (!isset($_SESSION['level']))
{
	header('location:../../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?=namaKlinik2()?></title>
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">

            <div class="container-fluid" style="background-color:#5bc0de">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color:white"><?=namaKlinik2()?></a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><?php echo $_SESSION['cabang']; ?></a></li>
                        <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
                        <li><a href="../../login.php?aksi=logout">Log Out</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                    <?php include './need/sidebar.php';?>
                
                <div class="main">
                    <h4 class="page-header">Penambahan Obat Baru</h4>
                    <form class="form-horizontal" action="./need/proses.php?aksi=tambah" method="post" >
                        <div class="form-group">
                            <label for="inputIdObat" class="col-sm-3 control-label">Id Obat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="idObat" id="inputIdObat" disabled="" placeholder="Nama Obat" value="<?php echo $dataKode;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNamaObat" class="col-sm-3 control-label">Nama Obat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="namaObat" id="inputNamaObat" placeholder="Nama Obat" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNamaDagang" class="col-sm-3 control-label">Nama Dagang</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="namaDagang" id="inputNamaDagang" placeholder="Nama Dagang Obat" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputHargaBeli" class="col-sm-3 control-label">Harga Beli</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="hargaBeli" id="inputHargaBeli" placeholder="Harga Beli /box" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputHargaJual" class="col-sm-3 control-label">Harga Jual</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="hargaJual" id="inputHargaJual" placeholder="Harga Jual /@biji" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStok" class="col-sm-3 control-label">Jumlah Obat</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="stok" id="inputJumlahObat" placeholder="Jumlah Obat/Stok" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <button class="btn btn-primary" type="submit">Tambahkan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

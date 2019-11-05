<?php
session_start();
include '../../../koneksi.php';
include '../../../library/library.php';
$id_obat = $_GET['id_obat'];
if (!isset($_SESSION['level'])) {
    header('location:../../../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?=namaKlinik3()?></title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../css/dashboard.css">
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">

            <div class="container-fluid" style="background-color:#5bc0de">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color:white"><?=namaKlinik3()?></a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><?php echo $_SESSION['cabang']; ?></a></li>
                        <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
                        <li><a href="../../../login.php?aksi=logout">Log Out</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 main">
                    <h1 class="page-header">Edit Data Obat</h1>
                    <div>
                        <a href="../data_obat.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</a>
                    </div>
                    <form class="form-horizontal" action="proses.php?aksi=editObat" method="POST" >
                        <?php
                        $query = mysqli_query($koneksi, "select * from obat where id_obat ='" . $id_obat . "'");
                        while ($hasil = mysqli_fetch_array($query)) {
                            ?>

                            <div class="form-group">
                                <label for="idObat" class="col-sm-3 control-label">Id Obat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="idObat" id="inputIdObat" placeholder="Id Obat" value="<?php echo $hasil['id_obat']; ?>" readonly  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNamaObat" class="col-sm-3 control-label">Nama Obat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="namaObat" id="inputNamaObat" placeholder="Nama Obat" value="<?php echo $hasil['nama_obat']; ?>"  required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNamaDagang" class="col-sm-3 control-label">Nama Dagang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="namaDagang" id="inputNamaDagang" placeholder="Nama Dagang Obat" value="<?php echo $hasil['nama_dagang']; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputHargaBeli" class="col-sm-3 control-label">Harga Beli</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="hargaBeli" id="inputHargaBeli" placeholder="Harga Beli /box" value="<?php echo $hasil['harga_beli']; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputHargaJual" class="col-sm-3 control-label">Harga Jual</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="hargaJual" id="inputHargaJual" placeholder="Harga Jual /biji" value="<?php echo $hasil['harga_jual']; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStok" class="col-sm-3 control-label">Jumlah Obat</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="stok" id="inputJumlahObat" placeholder="Jumlah Obat/Stok" value="<?php echo $hasil['stok']; ?>" required />
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

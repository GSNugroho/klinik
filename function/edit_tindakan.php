<?php
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



                <div class="main">
                    <?php 
                        
                                      
                        $id_tindakan;
                        if (isset($_GET['i'])){
                                $id_tindakan =  $_GET['i'];
                            } else {
                                echo 'asdasd';
                            }
                            ?>
                    <h1 class="page-header">Edit Tindakan</h1>
                    <form class="form-horizontal" name="editTindakan" action="edit_save_tindakan.php" method="post" >
                       <?php
//                            include '../koneksi.php';
//                            include '../library/library.php';
                            $query = mysql_query("SELECT * FROM daftar_tindakan WHERE id_tindakan ='".$id_tindakan."'");
                            $no = 0;
                            while ($hasil = mysql_fetch_array($query)) {
                            ?>
                        
                        <div class="form-group">
                            <label for="inputIdTindakan" class="col-sm-3 control-label">Id Tindakan</label>
                            <div class="col-sm-9">
                                <input type="text" name="idTindakan" class="form-control" readonly id="inputIdTindakan" value="<?php echo $hasil['id_tindakan'];?>" placeholder="Id Tindakan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNamaTindakan" class="col-sm-3 control-label">Nama Tindakan</label>
                            <div class="col-sm-9">
                                <input type="text" name="namaTindakan" class="form-control" id="inputNamaTindakan" required="" value="<?php echo $hasil['nama_tindakan'];?>"placeholder="Nama Tindakan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputHarga" class="col-sm-3 control-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="text" name="harga" class="form-control" id="inputHarga" required="" value="<?php echo $hasil['harga_tindakan'];?>"placeholder="Harga">
                            </div>
                        </div>
                         <?php
                            }
                            
                            ?>
<!--                        <div class="form-group">
                            <label for="inputTanggalDaftar" class="col-sm-3 control-label">Tanggal daftar</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_daftar" class="form-control" id="inputTanggalDaftar" placeholder="Tahun-Bulan-tanggal">
                            </div>
                        </div>-->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button class="btn btn-primary" name="submit" type="submit">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

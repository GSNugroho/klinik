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
                        
                                      
                        $no_rm;
                        if (isset($_GET['i'])){
                                $no_rm =  $_GET['i'];
                            } else {
                                echo 'asdasd';
                            }
                            ?>
                    <h1 class="page-header">Edit Pasien</h1>
                    <form class="form-horizontal" name="editPasien" action="edit_save_pasien.php" method="post" >
                        <?php
//                            include '../koneksi.php';
//                            include '../library/library.php';
                            $query = mysql_query("SELECT * FROM pasien WHERE no_rm ='".$no_rm."'");
                            $no = 0;
                            while ($hasil = mysql_fetch_array($query)) {
                                ?>
                        <div class="form-group">
                            
                            <label for="inputNoRM" class="col-sm-3 control-label">No. RM</label>
                            <div class="col-sm-9">
                                <input type="text" name="norm" class="form-control" readonly id="inputNoRM" value="<?php echo $hasil['no_rm'];?>" placeholder="No. RM">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputNama" value="<?php echo $hasil['nama_pasien'];?>" placeholder="Nama Pasien">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAlamat" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" value="<?php echo $hasil['alamat_pasien'];?>" id="inputAlamat" placeholder="Alamat Pasien">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUmur" class="col-sm-3 control-label">Umur</label>
                            <div class="col-sm-9">
                                <input type="text" name="umur" class="form-control" value="<?php echo $hasil['umur'];?>" id="inputUmur" placeholder="Umur Pasien">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTempatLahir" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tempat_lahir" value="<?php echo $hasil['tempat_lahir'];?>" class="form-control" id="inputTempatLahir" placeholder="Tempat Lahir Pasien">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTanggalLahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $hasil['tgl_lahir_pasien'];?>" id="inputTanggalLahir" placeholder="Tahun-Bulan-tanggal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputJenisKelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select name="jenis_kelamin" class="form-control" >
                                    <option><?php echo $hasil['jk_pasien'];?></option>
                                    <option><?php if($hasil['jk_pasien'] == 'laki-laki') echo 'perempuan'; else echo 'laki-laki';?></option>
<!--                                    <option>Perempuan</option>-->
                                </select>
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
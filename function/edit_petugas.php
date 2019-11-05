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
                        
                                      
                        $id_petugas;
                        if (isset($_GET['i'])){
                                $id_petugas =  $_GET['i'];
                            } else {
                                echo 'asdasd';
                            }
                            ?>
                    <h1 class="page-header">Edit Petugas</h1>
                    <form class="form-horizontal" name="editPetugas" action="edit_save_petugas.php" method="post" >
                       <?php
//                            include '../koneksi.php';
//                            include '../library/library.php';
                            $query = mysqli_query($koneksi, "SELECT * FROM petugas_kesehatan WHERE id_petugas ='".$id_petugas."'");
                            $no = 0;
                            while ($hasil = mysqli_fetch_array($query)) {
                            ?>
                        
                        <div class="form-group">
                            <label for="inputIdPetugas" class="col-sm-3 control-label">Id Petugas</label>
                            <div class="col-sm-9">
                                <input type="text" name="idPetugas" class="form-control" readonly id="inputIdPetugas" value="<?php echo $hasil['id_petugas'];?>" placeholder="Id Petugas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputNama" value="<?php echo $hasil['nama_petugas'];?>" placeholder="Nama Petugas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAlamat" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="inputAlamat" value="<?php echo $hasil['alamat_petugas'];?>" placeholder="Alamat Petugas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTempatLahir" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tempat_lahir" class="form-control" id="inputTempatLahir" value="<?php echo $hasil['tempat_lahir'];?>" placeholder="Tempat Lahir Petugas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTanggalLahir" class="col-sm-3 control-label">Tanggal Lahir</label> 
                            <div class="col-sm-9">
                                <input type="date" name="tgl_lahir" class="form-control" id="inputTanggalLahir" value="<?php echo $hasil['tgl_lahir_petugas'];?>" placeholder="Tahun-Bulan-tanggal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNoTelp" class="col-sm-3 control-label">No. Telp / HP</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_telp" class="form-control" id="inputNoTelp" value="<?php echo $hasil['no_telp'];?>"placeholder="No. Telp / HP">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPoliklinik" class="col-sm-3 control-label">Poliklinik</label>
                            <div class="col-sm-9">
                                <select name="poliklinik" class="form-control">
                                    <option><?php echo $hasil['poliklinik'];?></option>
                                    <option><?php if($hasil['poliklinik'] == 'umum') echo 'gigi'; else echo 'umum';?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inpuStatus" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control" >
                                    <option><?php echo $hasil['status'];?></option>
                                    <option><?php if($hasil['status'] == 'aktif') echo 'tidak aktif'; else echo 'aktif';?></option>
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
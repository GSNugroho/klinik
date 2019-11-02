<?php
session_start();
include '../koneksi.php';
include '../library/library.php';
if (!isset($_SESSION['level'])) {
    header('location:../index.php');
}
?>
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
                                
                        $id_user;
                        if (isset($_GET['i'])){
                                $id_user =  $_GET['i'];
                            } else {
                                echo 'asdasd';
                            }
                            ?>
                    <h1 class="page-header">Edit User</h1>
                    <form class="form-horizontal" name="editUser" action="edit_save_user.php" method="post" >
                       <?php
//                            include '../koneksi.php';
//                            include '../library/library.php';
                            $query = mysql_query("SELECT * FROM user WHERE id_user ='".$id_user."'");
                            $no = 0;
                            while ($hasil = mysql_fetch_array($query)) {
                            ?>
                        
                        <div class="form-group">
                            <label for="inputIdUser" class="col-sm-3 control-label">Id User</label>
                            <div class="col-sm-9">
                                <input type="text" name="idUser" class="form-control" readonly id="inputIdUser" value="<?php echo $hasil['id_user'];?>" placeholder="Id User">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputNama" value="<?php echo $hasil['nama_user'];?>" placeholder="Nama User">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUsername" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" id="inputUsername" value="<?php echo $hasil['username'];?>" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="inputPassword" value="<?php echo $hasil['password'];?>" placeholder="Password">
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
<?php
$arrActive['tambahUser'] = 'active';
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

<!--        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3  sidebar">
                    <ul class="nav nav-sidebar ">
                        <li><a href="../home.php">Home</a></li>
                        <li><a href="penambahan_pasien.php">Penambahan Pasien</a></li>
                        <li><a href="data_pasien.php">Data Pasien</a></li>
                        <li><a href="add_rawatjalan.php">Rawat Jalan</a></li>
                        <li><a href="data_rawatjalan.php">Data Rawat Jalan</a></li>
                        <li><a href="penambahan_petugas.php">Penambahan Petugas Kesehatan</a></li>
                        <li><a href="data_petugas.php">Data Petugas Kesehatan</a></li>
                        <li class="active"><a href="penambahan_user.php">Penambahan User<span class="sr-only">(current)</span></a></li>
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

                <div class="main">
                    <h4 class="page-header">Penambahan User</h4>
                    <form class="form-horizontal" name="addUser" action="tambah_user.php" method="post" >
                        <div class="form-group">
                            <?php
//                            include '../koneksi.php';
//                            include '../library/library.php';
                            $dataKode	= buatKode("user", "U");
                            ?>
                            <label for="inputIdUser" class="col-sm-3 control-label">Id User</label>
                            <div class="col-sm-9">
                                <input type="text" name="idUser" class="form-control" readonly id="inputIdUser" value="<?php echo $dataKode;?>" placeholder="Id User">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputNama" required="" placeholder="Nama User">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUsername" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" id="inputUsername" required="" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="inputPassword" required="" placeholder="Password">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputLevel" class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-9">
                                <select name="level" class="form-control">
                                    <option>Admin</option>
                                    <option>User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCabang" class="col-sm-3 control-label">Cabang</label>
                            <div class="col-sm-9">
                                <select name="cabang" class="form-control">
                                    <option>Pusat</option>
                                    <option>Pratama</option>
                                    <option>Pedan</option>
                                    <option>Juwiring</option>
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
    </body>
</html>

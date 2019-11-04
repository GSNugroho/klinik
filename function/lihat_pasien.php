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
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css"> 
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>

        <script type="text/javascript" src="../js/jquery.min.js"></script>
<!--        <script type="text/javascript" src="../js/cobapagi.js"></script>-->
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
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
                <!--<div class="col-sm-3 sidebar">-->

<!--                    <ul class="nav nav-sidebar ">               
                        <li><a href="../home.php">Home</a></li>
                        <li><a href="penambahan_pasien.php">Penambahan Pasien</a></li>
                        <li class="active"><a href="data_pasien.php">Data Pasien<span class="sr-only">(current)</span></a></li>
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

                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main">
                    <h1 class="page-header">Data Pasien</h1>

                    <div class="row">
                        <div class="table" >
                            <table id="tabelku" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. RM</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Umur</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>JK</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Cabang Klinik</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    include_once '../koneksi.php';
                                    // $query = mysqli_query($koneksi, "select * from pasien p INNER JOIN user u ON p.id_user = u.id_user");
                                    $query = mysqli_query($koneksi, "select pasien_b.no_rm, pasien_b.nm_pasien, pasien_b.alamat_pasien, pasien_b.umur_pasien, pasien_b.tmpt_lahir, pasien_b.tgl_lahir, pasien_b.jk_pasien, pasien_b.tgl_daftar_pasien, user.cabang
                                                            from pasien_b 
                                                            LEFT JOIN user ON pasien_b.id_user = user.id_user 
                                                            ORDER BY pasien_b.no_rm ASC");
                                    $no = 0;
                                    while ($hasil = mysqli_fetch_array($query)) {
                                        $no++;
                                        echo "<tr>
                                        <td>" . $no . "</td>
                                        <td>" . $hasil['no_rm'] . "</td>
                                        <td>" . $hasil['nm_pasien'] . "</td>
                                        <td>" . $hasil['alamat_pasien'] . "</td>
                                        <td>" . $hasil['umur_pasien'] . "</td>
                                        <td>" . $hasil['tmpt_lahir'] . "</td>
                                        <td>" . date('d-m-Y', strtotime($hasil['tgl_lahir'])) . "</td>
                                        <td>" . $hasil['jk_pasien'] . "</td>
                                        <td>" . date('d-m-Y', strtotime($hasil['tgl_daftar_pasien'])) . "</td>
                                        <td>" . $hasil['cabang'] . "</td>
                                        <td><a href='add_rawatjalan.php?rm=".$hasil['no_rm']."'>Pilih</a></td>
                                    </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
<!--                        <div class="form-group">
                            <div class="col-sm-offset-11 col-sm-3">
                                <button class="btn btn-primary" type="submit">Cetak</button>
                            </div>
                        </div>-->
                    </div>
                    <script type="text/javascript" >
                        $(document).ready(function() {
                            $('#tabelku').dataTable();
                        });

                    </script>

                </div>
            </div>
        </div>
    </body>
</html>
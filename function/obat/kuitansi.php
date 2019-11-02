<!DOCTYPE html>
<html>
    <head>
        <title><?=namaKlinik2()?></title>
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="../../css/dataTables.bootstrap.css">
        <script type="text/javascript" src="../../js/bootstrap.min.js"></script>

        <script type="text/javascript" src="../../js/jquery.min.js"></script>
<!--        <script type="text/javascript" src="../js/cobapagi.js"></script>-->
        <script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../js/dataTables.bootstrap.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">

            <div class="container-fluid" style="background-color:#5bc0de">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color:white"><?=namaKlinik2()?></a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Cabang</a></li>
                        <li><a href="#">User</a></li>
                        <li><a href="#">Log Out</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 sidebar">
                    <ul class="nav nav-sidebar ">
                        <li><a href="../../home.php">Home</a></li>
                        <li><a href="buat_resep.php">Buat Resep</a></li>
                        <li><a href="data_obat.php">Data Obat</a></li>
                        <li><a href="tambah_obat_baru.php">Tambah Obat Baru</a></li>
                        <li><a href="data_resep.php">Data Resep</a></li>
                        <li class="active"><a href="kuitansi.php">kuitansi<span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Laporan</a></li>
                    </ul>
                </div>


                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main">
                    <h1 class="page-header">Data Obat & Stok</h1>

                    <div class="row">
                        <div class="table" >
                            <table id="kepet" class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No RM</th>
                                        <th>Id Kuitansi</th>
                                        <th>Id Kunjungan</th>
                                        <th>Nama Pasien</th>
                                        <th>Nama User</th>
                                        <th>Nama Petugas</th>
                                        <th>Id Resep</th>
                                        <th>Total Bayar</th>
                                        <th>Cetak</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    include_once '../../db/koneksi.php';
                                    $query = mysql_query("select * from obat");
                                    $no = 0;
                                    while ($hasil = mysql_fetch_array($query)) {
                                        $no++;
                                        echo "<tr>
                                        <td>" . $no . "</td>
                                        <td>" . $hasil['id_obat'] . "</td>
                                        <td>" . $hasil['nama_obat'] . "</td>
                                        <td>" . $hasil['nama_dagang'] . "</td>
                                        <td>" . $hasil['harga_beli'] . "</td>
                                        <td>" . $hasil['harga_jual'] . "</td>
                                        <td>" . $hasil['stok'] . "</td>
                                        <td><a>tambah stok</a></td>
                                        <td>" . $hasil['harga_beli'] . "</td>
                                        <td><a>Cetak</a></td>
                                    </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 text-center">
                            <ul id="myPager" class="pagination pagination-lg pager" ></ul>
                        </div>
                    </div>
                    <script type="text/javascript" >
                        $(document).ready(function() {
                            $('#kepet').dataTable();
                        });
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>

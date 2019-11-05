<?php
$arrActive['data_resep'] = 'active';
session_start();
include __DIR__ . '../../../koneksi.php';
include __DIR__ . '../../../library/library.php';
if (!isset($_SESSION['level'])) {
    header('location:../../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?=namaKlinik2()?></title>
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="../../css/dataTables.tableTools.css">
        <link rel="stylesheet" type="text/css" href="../../css/dataTables.colVis.css">
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <script type="text/javascript" src="../../js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="../../js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../../js/dataTables.tableTools.js"></script>
        <script type="text/javascript" src="../../js/dataTables.colVis.js"></script>
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
                <div class="col-sm-3 sidebar">
                    <?php include './need/sidebar.php'; ?>
                </div>


                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main">
                    <h1 class="page-header">Data Resep</h1>

                    <div class="row">
                        <div class="table" >
                            <table id="data" class="table hover display responsive compact">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>No Resep</th>
                                        <th>No Kunjungan</th>
                                        <th>No RM</th>
                                        <th>Nama Pasien</th>
                                        <th>Nama User</th>
                                        <th>Harga Total</th>
                                        <th>Detail</th>
                                        <th>Cetak</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    include_once '../../koneksi.php';

//                                    if ($_SESSION['level'] == 'admin') {
//                                        $query = mysql_query("SELECT * FROM resep r LEFT JOIN kunjungan k ON r.id_kunjungan = k.id_kunjungan "
//                                                . "LEFT JOIN pasien p ON p.no_rm = k.no_rm "
//                                                . "LEFT JOIN user u ON u.id_user = k.id_user ORDER BY r.id_resep DESC") or die(mysql_error());
//                                    } else {
//                                        $query = mysql_query("SELECT * FROM resep r LEFT JOIN kunjungan k ON r.id_kunjungan = k.id_kunjungan "
//                                                . "LEFT JOIN pasien p ON p.no_rm = k.no_rm "
//                                                . "LEFT JOIN user u ON u.id_user = k.id_user WHERE cabang='" . $_SESSION['cabang'] . "' ORDER BY r.id_resep DESC") or die(mysql_error());
//                                    }
                                    $query = mysqli_query($koneksi, "SELECT * FROM resep r LEFT JOIN kunjungan k ON r.id_kunjungan = k.id_kunjungan "
                                            . "LEFT JOIN pasien_b p ON p.no_rm = k.no_rm "
                                            . "LEFT JOIN user u ON u.id_user = k.id_user ORDER BY r.id_resep DESC") or die(mysqli_error($koneksi));
                                    $no = 0;

                                    while ($hasil = mysqli_fetch_array($query)) {
                                        $no++;
                                        echo "<tr>
                                        <td>" . $no . "</td>
                                        <td>" . $hasil['id_resep'] . "</td>
                                        <td>" . $hasil['id_kunjungan'] . "</td>
                                        <td>" . $hasil['no_rm'] . "</td>
                                        <td>" . $hasil['nm_pasien'] . "</td>
                                        <td>" . $hasil['username'] . "</td>
                                        <td>" . $hasil['biaya_resep'] . "</td>
                                        <td><a class = 'btn btn-success' href = 'need/detailResep.php?id_resep=" . $hasil['id_resep'] . "'>Detail</a></td>
                                        <td><a class = 'btn btn-success' href = 'need/cetak_resep.php?id_resep=" . $hasil['id_resep'] . "' target='_blank'>Cetak</a></td>
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
                            var table = $('#data').dataTable();
                            var tt = new $.fn.dataTable.TableTools(table, {
                                sRowSelect: 'double',
                                responsive: true,
                                aButtons: [{
                                        "sExtends": "print",
                                        "sButtonText": "Print"
                                    }]
                            });

                            $(tt.fnContainer()).insertBefore('div.table');
                            var colvis = new $.fn.dataTable.ColVis(table, {
                                buttonText: 'Select columns'
                            });

                            $(colvis.button()).insertBefore('div.table');
                        });



                    </script>

                </div>
            </div>
        </div>
    </body>
</html>

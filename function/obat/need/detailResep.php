<?php
session_start();
include __DIR__ . '../../../../koneksi.php';
include __DIR__ . '../../../../library/library.php';
if (!isset($_SESSION['level'])) {
    header('location:../../../index.php');
}
if (isset($_GET['id_resep'])) {
    $id_resep = $_GET['id_resep'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?=namaKlinik3()?></title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="../../../css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="../../../css/dataTables.tableTools.css">
        <link rel="stylesheet" type="text/css" href="../../../css/dataTables.colVis.css">
        <script type="text/javascript" src="../../../js/jquery.js"></script>
        <script type="text/javascript" src="../../../js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="../../../js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../../../js/dataTables.tableTools.js"></script>
        <script type="text/javascript" src="../../../js/dataTables.colVis.js"></script>


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


                <div class="col-sm-offset-1 col-sm-10 col-md-10 center main responsive">

                    <h1 class="page-header">Data Resep</h1>

                    <div class="row">
                        <div class="table" >
                            <table id="data" class="table hover display responsive compact">
                                <thead>
                                    <tr>
                                        <th style="width: 3%">No</th>
                                        <th>No Resep</th>
                                        <th>No RM</th>
                                        <th>Nama Pasien</th>
                                        <th>Id Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Jumlah</th>
                                        <th>Aturan Pakai</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    include_once '../../../koneksi.php';
                                    $query = mysqli_query($koneksi, "SELECT * FROM resep r "
                                            . "LEFT JOIN detail_resep dr ON r.id_resep = dr.id_resep LEFT JOIN obat o ON dr.id_obat = o.id_obat "
                                            . "LEFT JOIN kunjungan k ON r.id_kunjungan = k.id_kunjungan LEFT JOIN pasien_b p ON "
                                            . "k.no_rm = p.no_rm WHERE r.id_resep = '$id_resep'");
                                    $no = 0;
                                    $harga = 0;

                                    while ($hasil = mysqli_fetch_array($query)) {
                                        $no++;
                                        $harga = $hasil['jumlah_obat'] * $hasil['harga_jual'];
                                        echo "<tr>
                                        <td>" . $no . "</td>
                                        <td>" . $hasil['id_resep'] . "</td>
                                        <td>" . $hasil['no_rm'] . "</td>
                                        <td>" . $hasil['nm_pasien'] . "</td>
                                        <td>" . $hasil['id_obat'] . "</td>
                                        <td>" . $hasil['nama_dagang'] . "</td>
                                        <td>" . $hasil['jumlah_obat'] . "</td>
                                        <td>" . $hasil['aturan_pakai'] . "</td>
                                        <td>" . $harga . "</td>
                                    </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <a href="../data_resep.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</a>
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

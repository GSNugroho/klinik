<?php
$arrActive['data_obat'] = 'active';
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
                        <li><a href="#"><?php echo $_SESSION['level']; ?></a></li>
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
                    <h1 class="page-header">Data Obat & Stok</h1>

                    <div class="row">
                        <div class="table" >
                            <table id="data" class="table table-hover display compact">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Id Obat</th>
                                        <th>Cabang</th>
                                        <th>Nama Obat</th>
                                        <th>Nama Dagang</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>

                                <tbody id="myTable">
                                    <?php
                                    include_once '../../koneksi.php';
//                                    bila ingin menggunakan multi-cabang dan admin
//                                        if ($_SESSION['level'] == 'admin') {
//                                            $query = mysql_query("SELECT * FROM obat o LEFT JOIN user u ON o.id_user = u.id_user ORDER BY id_obat DESC");
//                                        } else {
//                                            $query = mysql_query("SELECT * FROM obat o LEFT JOIN user u ON o.id_user = u.id_user WHERE cabang = '" . $_SESSION['cabang'] . "' ORDER BY id_obat DESC");
//                                        }

                                    $query = mysqli_query($koneksi, "SELECT * FROM obat o LEFT JOIN user u ON o.id_user = u.id_user ORDER BY id_obat DESC");

                                    $no = 0;
                                    while ($hasil = mysqli_fetch_array($query)) {
                                        $no++;
                                        echo "<tr>
                                        <td>" . $no . "</td>
                                        <td>" . $hasil['id_obat'] . "</td>
                                        <td>" . $hasil['cabang'] . "</td>
                                        <td>" . $hasil['nama_obat'] . "</td>
                                        <td>" . $hasil['nama_dagang'] . "</td>
                                        <td>" . $hasil['harga_beli'] . "</td>
                                        <td>" . $hasil['harga_jual'] . "</td>
                                        <td>" . $hasil['stok'] . "</td>
                                        <td><a class = 'btn btn-success' href = 'need/editDataObat.php?id_obat=" . $hasil['id_obat'] . "'>edit</a></td>
                                    </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script type="text/javascript" >
//                        $(document).ready(function() {
//                            $('#data').dataTable();
//                        });
//
//                        $(document).ready(function() {
//                            $('#data').DataTable({
//                                "dom": 'T<"clear">lfrtip',
//                                "tableTools": {
//                                    "aButtons": [
//                                        {
//                                            "sExtends": "print",
//                                            "sButtonText": "Print"
//                                        }
//                                    ]
//                                }
//                            });
//                        });
//
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

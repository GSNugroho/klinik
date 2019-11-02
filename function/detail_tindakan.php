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
        <!--<link rel="stylesheet" type="text/css" href="../../css/dataTables.bootstrap.css">--> 
        <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="../css/dataTables.tableTools.css">
        <link rel="stylesheet" type="text/css" href="../css/dataTables.colVis.css">
        <!--<link rel="stylesheet" type="text/css" href="../../css/dataTables.responsive.css">-->
<!--        <script type="text/javascript" src="../../js/bootstrap.min.js"></script>-->

        <!--<script type="text/javascript" src="../../js/jquery.min.js"></script>-->
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../js/dataTables.tableTools.js"></script>
        <script type="text/javascript" src="../js/dataTables.colVis.js"></script>

<!--        <script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>-->

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
<!--                <div class="col-sm-3 sidebar">
                    <ul class="nav nav-sidebar ">               
                        <li><a href="../home.php">Home</a></li>
                        <li><a href="penambahan_pasien.php">Penambahan Pasien</a></li>
                        <li><a href="data_pasien.php">Data Pasien</a></li>
                        <li><a href="add_rawatjalan.php">Rawat Jalan</a></li>
                        <li  class="active"><a href="data_rawatjalan.php">Data Rawat Jalan<span class="sr-only">(current)</span></a></li>
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
                    <?php 
                        
                                      
                        $id_kunjungan;
                        if (isset($_GET['i'])){
                                $id_kunjungan =  $_GET['i'];
                            } else {
                                echo 'asdasd';
                            }
                            ?>
                    <h1 class="page-header">Detail Tindakan</h1>

                    <div class="row">
                        <div class="table" >
                            <table id="tabelku" class="table table-hover display responsive compact"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width : 5%">No.</th>
                                        <th>Id Tindakan Medis</th>
                                        <th>Id Kunjungan</th>
                                        <th>Poliklinik</th>
                                        <th>Petugas Kesehatan</th>
                                        <th>Diagnosis</th>
                                        <th>Tindakan</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>

                               

                                <tbody id="myTable">
                                    <?php
                                    include_once '../koneksi.php';
//                                    $query = mysql_query("select * from pasien");
//                                    $query = mysql_query("select * from kunjungan p INNER JOIN user u ON p.id_user = u.id_user");
  //                                  $query = mysql_query("select * from kunjungan p INNER JOIN user u ON p. id_user = u.id_user LEFT JOIN pasien s ON p.no_rm = s.no_rm");
                                    $query = mysql_query("select * from tindakan_medis p INNER JOIN petugas_kesehatan u ON p.id_petugas = u.id_petugas 
                                                        LEFT JOIN diagnosis t ON p.id_diagnosis = t.id_diagnosis
                                                        LEFT JOIN daftar_tindakan s ON p.id_tindakan = s.id_tindakan WHERE p.id_kunjungan = '".$id_kunjungan."'");
                                    $no = 0;
                                    while ($hasil = mysql_fetch_array($query)) {
                                        $no++;
                                        echo "<tr>
                                        <td>" . $no . "</td>
                                        <td>" . $hasil['id_tm'] . "</td>
                                        <td>" . $hasil['id_kunjungan'] . "</td>    
                                        <td>" . $hasil['poliklinik'] . "</td>
                                        <td>" . $hasil['nama_petugas'] . "</td>
                                        <td>" . $hasil['nama_indonesia'] . "</td>
     
                                        <td>" . $hasil['nama_tindakan'] . "</td>
                                        <td>" . $hasil['harga_tindakan'] . "</td>
                                       
                                        
                                    </tr>";
                                    }
                                    ?>
                                </tbody>
                                    
                            </table>
                            <div class="form-group">
                            <div class="col-sm-offset-11 col-sm-3">
                                <a href='data_rawatjalan.php'>Back</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <script type="text/javascript" >
//                        $(document).ready(function() {
//                            $('#kepet').dataTable();
//                        });
//                        
//                        $(document).ready(function() {
//                            $('#kepet').DataTable({
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
                            var table = $('#tabelku').dataTable();
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
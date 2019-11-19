<?php
$arrActive['laporanRawatJalan'] = 'active';
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
        <link rel="stylesheet" type="text/css" href="../css/buttons.dataTables.min.css">

        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
        <!-- <script type="text/javascript" src="../js/dataTables.tableTools.js"></script>
        <script type="text/javascript" src="../js/dataTables.colVis.js"></script> -->
        <script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="../js/jszip.min.js"></script>
        <script type="text/javascript" src="../js/pdfmake.min.js"></script>
        <script type="text/javascript" src="../js/vfs_fonts.js"></script>
        <script type="text/javascript" src="../js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="../js/buttons.html5.min.js"></script>

        <style>
            td.details-control {
                background: url('../assets/img/plus.png') no-repeat center center;
                background-size: 40%;
                cursor: pointer;
            }
            tr.shown td.details-control {
                background: url('../assets/img/minus.png') no-repeat center center;
                background-size: 40%;
            }
        </style>
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
                        <li><a href="data_rawatjalan.php">Data Rawat Jalan</a></li>
                        <li><a href="penambahan_petugas.php">Penambahan Petugas Kesehatan</a></li>
                        <li><a href="data_petugas.php">Data Petugas Kesehatan</a></li>
                        <li><a href="penambahan_user.php">Penambahan User</a></li>
                        <li><a href="data_user.php">Data User</a></li>
                        <li class="active"><a href="laporan_transaksi.php">Laporan Rawat Jalan<span class="sr-only">(current)</span></a></li>
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

                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main" style="margin-left: 20%">
                    <h1 class="page-header">Laporan Rawat Jalan</h1>

                    <div class="row">
                        <div class="table" >
                            <table id="tabelku" class="table table-hover display responsive compact"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 20px; !important;"></th>
                                        <th>Id Kunjungan</th>
                                        <th>Cabang</th>
                                        <th>Tanggal Periksa</th>
                                        <th>No. RM</th>
                                        <th>Nama Pasien</th>
                                        <!-- <th>Biaya Periksa</th>
                                        <th style="width : 30%">Detail Tindakan</th> -->
                                    </tr>
                                </thead>



                                <tbody id="myTable">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script type="text/javascript" >
                        function format (rowData) {
                            var div = $('<table id="detailrj" class="table table-bordered">')
                                // .addClass( 'loading' )
                                // .text( 'Loading...' );
                        
                            $.ajax( {
                                url: 'ajaxlaprjdt.php',
                                data: {
                                    id: rowData.id_kunjungan
                                },
                                type: "GET",
                                beforeSend: function(e) {
                                            if(e && e.overrideMimeType) {
                                                e.overrideMimeType("application/json;charset=UTF-8");
                                            }
                                            },
                                success: function ( response ) {
                                    $("#detailrj").html(response.detail).show();
                                        // .removeClass( 'loading' );
                                }
                            } );
                        
                            return div;
                        }
                        
                        $(document).ready(function() {
                            var table = $('#tabelku').DataTable( {
                                dom: 'lBfrtip',
                                buttons: [
                                    {
                                        extend : 'excelHtml5',
                                        text : 'Export Excel',
                                        title : 'Laporan Rawat Jalan',
                                        exportOptions : {
                                            columns: [0, 1, 2, 3, 4, 5]
                                        },
                                        // action : function( e, dt, button, config ) {
                                        //     dt_print( e, dt, button, config, true )
                                        // }
                                        },
                                    ],
                                language: {
                                    "sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
                                    "sProcessing":   "Sedang memproses...",
                                    "sLengthMenu":   "Tampilkan _MENU_ entri",
                                    "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                                    "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                                    "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                                    "sInfoPostFix":  "",
                                    "sSearch":       "Cari:",
                                    "sUrl":          "",
                                    "oPaginate": {
                                        "sFirst":    "Pertama",
                                        "sPrevious": "Sebelumnya",
                                        "sNext":     "Selanjutnya",
                                        "sLast":     "Terakhir"
                                }
                                },
                                "ajax": {"url":"ajaxlaprj.php"},
                                "processing" : true,
                                "serverSide" : true,
                                "serverMethod" : "post",
                                "columns": [
                                    {
                                        "className":      'details-control',
                                        "orderable":      false,
                                        "data":           null,
                                        "defaultContent": ''
                                    },
                                    { "data": "id_kunjungan" },
                                    { "data": "cabang" },
                                    { "data": "tgl_periksa" },
                                    { "data": "no_rm" },
                                    { "data": "nm_pasien" },
                                ],
                                "order": [[1, 'asc']]
                            } );
                            
                            // Add event listener for opening and closing details
                            $('#tabelku tbody').on('click', 'td.details-control', function () {
                                var tr = $(this).closest('tr');
                                var row = table.row( tr );
                        
                                if ( row.child.isShown() ) {
                                    // This row is already open - close it
                                    row.child.hide();
                                    tr.removeClass('shown');
                                }
                                else {
                                    // Open this row
                                    row.child( format(row.data()) ).show();
                                    tr.addClass('shown');
                                }
                            } );
                        } );
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
$arrActive['dataTindakan'] = 'active';
session_start();
include '../koneksi.php';
include '../library/library.php';
if (!isset($_SESSION['level'])) {
    header('location:../index.php');
}
$level = $_SESSION['level'];
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
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
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
                        <li><a href="data_rawatjalan.php">Data Rawat Jalan</a></li>
                        <li><a href="penambahan_petugas.php">Penambahan Petugas Kesehatan</a></li>
                        <li class="active"><a href="data_petugas.php">Data Petugas Kesehatan<span class="sr-only">(current)</span></a></li>
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
                <div class="main">
                    <h4 class="page-header">Data Tindakan</h4>

                    <div class="row">
                        <div class="table" >
                            <table id="tabelku" class="table table-hover display responsive compact"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <!-- <th style="width : 5%">No.</th> -->
                                        <th style="width : 15%">Id Tindakan</th>
                                        <th style="width : 50%">Nama Tindakan</th>
                                        <th>Harga</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>



                                <tbody id="myTable">
                                    
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <script type="text/javascript" >

                        $(document).ready(function(){
                        $('#tabelku').DataTable({
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
                        'order': [[ 0, "asc" ]],
                        'processing': true,
                        'serverSide': true,
                        'serverMethod': 'post',
                        'ajax': {
                            'url':'ajaxdttind.php'
                        },
                        'columns': [
                            { data: 'id_tindakan' },
                            { data: 'nama_tindakan' },
                            { data: 'harga_tindakan' },
                            { data: 'aksi' }
                        ]
                        });
                        });

                    </script>
                </div>
            </div>
                    <div class="modal fade" id="editTindakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" onclick="tutup()" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="modal-title" id="exampleModalLabel">Edit Tindakan</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputIdTindakan">Id Tindakan</label>
                                        <div>
                                            <input type="text" name="idTindakan" class="form-control" readonly id="inputIdTindakan" placeholder="Id Tindakan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNamaTindakan">Nama Tindakan</label>
                                        <div>
                                            <input type="text" name="namaTindakan" class="form-control" id="inputNamaTindakan" required="" placeholder="Nama Tindakan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputHarga">Harga</label>
                                        <div>
                                            <input type="text" name="harga" class="form-control" id="inputHarga" required="" placeholder="Harga">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="tutup()">Batal</button>
                                    <button type="button" class="btn btn-primary" id="submit">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#editTindakan').on('show.bs.modal', function(event) {
                            var button = $(event.relatedTarget) // Button that triggered the modal
                            var recipient = button.data('whatever') // Extract info from data-* attributes
                            var modal = $(this);
                            var dataString = 'id=' + recipient;

                            $.ajax({
                                type: 'post',
                                url: 'ajaxetin.php',
                                dataType: 'json',
                                data: dataString,
                                success: function (data){
                                    $("#inputIdTindakan").val(data['id_tindakan']);
                                    $("#inputNamaTindakan").val(data['nama_tindakan']);
                                    $("#inputHarga").val(data['harga_tindakan']);
                                }
                            })
                        })

                        function tutup(){
                            $('#editTindakan').modal('hide');
                        }

                        $('#submit').click(function() {
                            var nmti = $('#inputNamaTindakan').val();
                            var harga = $('#inputHarga').val();
                            var id = $('#inputIdTindakan').val();
                            var dataString = 'id='+id+'&harga='+harga+'&nmti='+nmti;

                            $.ajax({
                                type: 'post',
                                url: 'edit_save_tindakan.php',
                                data: dataString,
                                success: function(data){
                                    $('#editTindakan').modal('hide');
                                    $('#tabelku').DataTable().ajax.reload();
                                }
                            })
                        })
                    </script>
        </div>
    </body>
</html>

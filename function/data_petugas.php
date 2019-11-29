<?php
$arrActive['dataPetugas'] = 'active';
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
        <link rel="stylesheet" type="text/css" href="../datepicker/css/ilmudetil.css">
        <link rel="stylesheet" type="text/css" href="../datepicker/css/bootstrap-datetimepicker.css">
        <link rel="stylesheet" type="text/css" href="../js/jquery-ui-1.11.4/jquery-ui-1.11.4/jquery-ui.min.css"> 
       
        <!--<script type="text/javascript" src="../../js/jquery.min.js"></script>-->
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="../js/dataTables.tableTools.js"></script>
        <script type="text/javascript" src="../js/dataTables.colVis.js"></script>
        <script type="text/javascript" src="../js/sweetalert.min.js"></script>
        <script src="../datepicker/js/moment-with-locales.js"></script>
        <script src="../datepicker/js/bootstrap-datetimepicker.js"></script>

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
                    <h4 class="page-header">Data Petugas Kesehatan</h4>

                    <div class="row">
                        <a class="btn btn-info" data-toggle="modal" data-target="#tambahPetugas">Tambah</a>
                        <br>
                        <br>
                        <div class="table" >
                            <table id="tabelku" class="table table-hover display responsive compact"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Id Petugas</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>No. Telp / HP</th>
                                        <th>Poliklinik</th>
                                        <th style="width:5%">User</th>
                                        <th style="width:7%">Update</th>
                                    </tr>
                                </thead>
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
                            'url':'ajaxdtpet.php'
                        },
                        'columns': [
                            { data: 'id_petugas' },
                            { data: 'nama_petugas' },
                            { data: 'alamat_petugas' },
                            { data: 'tempat_lahir' },
                            { data: 'tgl_lahir_petugas' },
                            { data: 'no_telp' },
                            { data: 'poliklinik' },
                            { data: 'username' },
                            { data: 'edit' }
                        ]
                        });
                        });

                    </script>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" onclick="tutup()" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title" id="exampleModalLabel">Edit Petugas</h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputIdPetugas" class="col-sm-3 control-label">Id Petugas</label>
                                    <input type="text" name="idPetugas" class="form-control" readonly id="inputIdPetugas">
                            </div>
                            <div class="form-group">
                                <label for="inputNama" class="col-sm-3 control-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="inputNama" placeholder="Nama Petugas">
                            </div>
                            <div class="form-group">
                                <label for="inputAlamat" class="col-sm-3 control-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="Alamat Petugas">
                            </div>
                            <div class="form-group">
                                <label for="inputTempatLahir" class="col-sm-3 control-label">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" id="inputTempatLahir" placeholder="Tempat Lahir Petugas">
                            </div>
                            <div class="form-group">
                                <label for="inputTanggalLahir" class="col-sm-3 control-label">Tanggal Lahir</label> 
                                    <input type="date" name="tgl_lahir" class="form-control" id="inputTanggalLahir"  placeholder="Tahun-Bulan-tanggal">
                            </div>
                            <div class="form-group">
                                <label for="inputNoTelp" class="col-sm-3 control-label">No. Telp / HP</label>
                                    <input type="text" name="no_telp" class="form-control" id="inputNoTelp" placeholder="No. Telp / HP">
                            </div>
                            <div class="form-group">
                                <label for="inputPoliklinik" class="col-sm-3 control-label">Poliklinik</label>
                                
                                    <select id="inputPoliklinik" name="poliklinik" class="form-control">
                                        <option>umum</option>
                                        <option>gigi</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="inpuStatus" class="col-sm-3 control-label">Status</label>                                
                                    <select id="inputStatus" name="status" class="form-control" >
                                        <option>aktif</option>
                                        <option>tidak aktif</option>
                                    </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="tutup()">Batal</button>
                            <button type="button" class="btn btn-primary" id="submit">Simpan</button>
                        </div>
                        <script>
                                $('#exampleModal').on('show.bs.modal', function (event) {
                                    var button = $(event.relatedTarget) 
                                    var recipient = button.data('whatever') 
                                    var modal = $(this);
                                    var dataString = 'id=' + recipient;
                            
                                        $.ajax({
                                            type: "GET",
                                            url: "ajaxedpet.php",
                                            dataType: "json",
                                            data: dataString,
                                            success: function (data) {
                                                $('#inputIdPetugas').val(data['id_petugas']);
                                                $('#inputNama').val(data['nama_petugas']);
                                                $('#inputAlamat').val(data['alamat_petugas']);
                                                $('#inputTempatLahir').val(data['tempat_lahir']);
                                                $('#inputTanggalLahir').val(data['tgl_lahir_petugas']);
                                                $('#inputNoTelp').val(data['no_telp']);
                                                $('#inputPoliklinik').val(data['poliklinik']);
                                                $('#inputStatus').val(data['status']);
                                            },
                                            error: function(err) {
                                                console.log(err);
                                            }
                                        });  
                                    });

                                function tutup(){
                                    $('#exampleModal').modal('hide');
                                }

                                $('#submit').click(function() {
                                    var nmpe = $('#inputNama').val();
                                    var alpe = $('#inputAlamat').val();
                                    var tmlh = $('#inputTempatLahir').val();
                                    var tllh = $('#inputTanggalLahir').val();
                                    var notl = $('#inputNoTelp').val();
                                    var poli = $('#inputPoliklinik option:selected').val();
                                    var stpe = $('#inputStatus option:selected').val();
                                    var id = $('#inputIdPetugas').val();

                                    var dataString = 'nmpe='+nmpe+'&alpe='+alpe+'&tmlh='+tmlh+'&tllh='+tllh+'&notl='+notl+
                                        '&poli='+poli+'&stpe='+stpe+'&id='+id;

                                    $.ajax({
                                        type: "POST",
                                        url: "edit_save_petugas.php",
                                        data: dataString,
                                        success: function() {
                                            swal("", "Edit Data Petugas Berhasil", "success");
                                            $('#exampleModal').modal('hide');
                                        }
                                    })
                                })
                        </script>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="tambahPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" onclick="ttp()" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title" id="exampleModalLabel">Tambah Petugas</h3>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" name="addPetugas" id="addPetugas" method="post" >
                                <div class="form-group">
                                    <?php
        //                            include '../koneksi.php';
        //                            include '../library/library.php';
                                    $dataKode	= buatKode("petugas_kesehatan", "P");
                                    ?>
                                    <label for="inputIdPetugas" class="col-sm-3 control-label">Id Petugas</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="idPetugas" class="form-control" readonly id="inputIdPetugas" value="<?php echo $dataKode;?>" placeholder="Id Petugas">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="inputNama" class="col-sm-3 control-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="inputNama" placeholder="Nama Petugas">
                                </div>
                                <div class="form-group">
                                    <label for="inputAlamat" class="col-sm-3 control-label">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="Alamat Petugas">
                                </div>
                                <div class="form-group">
                                    <label for="inputTempatLahir" class="col-sm-3 control-label">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" id="inputTempatLahir" placeholder="Tempat Lahir Petugas">
                                </div>
                                <div class="form-group">
                                    <label for="inputTanggalLahir" class="col-sm-3 control-label">Tanggal Lahir</label> 
                                        <input type="date" name="tgl_lahir" class="form-control" id="inputTanggalLahir"  placeholder="Tahun-Bulan-tanggal">
                                </div>
                                <div class="form-group">
                                    <label for="inputNoTelp" class="col-sm-3 control-label">No. Telp / HP</label>
                                        <input type="text" name="no_telp" class="form-control" id="inputNoTelp" placeholder="No. Telp / HP">
                                </div>
                                <div class="form-group">
                                    <label for="inputPoliklinik" class="col-sm-3 control-label">Poliklinik</label>
                                    
                                        <select id="inputPoliklinik" name="poliklinik" class="form-control">
                                            <option>umum</option>
                                            <option>gigi</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="inpuStatus" class="col-sm-3 control-label">Status</label>                                
                                        <select id="inputStatus" name="status" class="form-control" >
                                            <option>aktif</option>
                                            <option>tidak aktif</option>
                                        </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="ttp()">Batal</button>
                            <button type="button" class="btn btn-primary" id="simpanpetugas">Simpan</button>
                        </div>
                    </div>
                    </div>
                </div>
                <script>
                    $('#simpanpetugas').click(function() {
                        var dataString = $('#addPetugas').serialize();

                        $.ajax({
                            type: 'post',
                            url: 'tambah_petugas.php',
                            data: dataString,
                            success: function(data){
                                console.log('sukses');
                                $('#addPetugas').trigger("reset");
                                $('#tambahPetugas').modal('hide');
                                $('#tabelku').DataTable().ajax.reload();
                            }
                        })
                    })

                    function ttp(){
                        $('#tambahPetugas').modal('hide');
                    }
                    // $(function() {
                    //     $('#inputTgll').datetimepicker({locale: 'id', format: "DD-MM-YYYY"});
                    // });
                </script>
            </div>
        </div>
    </body>
</html>
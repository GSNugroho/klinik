<?php
$arrActive['dataRawatJalan'] = 'active';
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
        <link rel="stylesheet" type="text/css" href="../../css/dataTables.bootstrap.css"> 
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">

        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="../js/sweetalert.min.js"></script>
        <!-- <script type="text/javascript" src="../js/dataTables.tableTools.js"></script>
        <script type="text/javascript" src="../js/dataTables.colVis.js"></script> -->

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

                <div class="main">
                    <h4 class="page-header">Data Rawat Jalan</h4>

                    <div class="row">
                        <div class="table" >
                            <table id="tabelku" class="table table-hover display responsive compact"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <!-- <th style="width : 5%">No.</th> -->
                                        <th style="width : 15%">Kunjungan</th>
                                        <th>No. RM</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Nama Pasien</th>
                                        <th>Cabang</th>
                                        <th>Biaya Periksa</th>
                                        <th>Biaya Resep</th>
                                        <th>Biaya Total</th>
                                        <th>Tambah Tindakan</th>
                                        <th>Detail Tindakan</th>
                                        <th>Buat Resep</th>
                                        <th>Kuitansi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <script type="text/javascript" >
                        $(document).ready(function(){
                        $('#tabelku').DataTable({
                            columnDefs: [{
                                orderable: false,
                                targets: [7, 8, 9, 10, 11]
                            }],
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
                            'url':'ajaxdtrj.php'
                        },
                        'columns': [
                            { data: 'id_kunjungan' },
                            { data: 'rm' },
                            { data: 'tgl_periksa' },
                            { data: 'nm_pasien' },
                            { data: 'cabang' },
                            { data: 'biaya_periksa' },
                            { data: 'biaya_resep' },
                            { data: 'biaya_total' },
                            { data: 'tindakan' },
                            { data: 'detail' },
                            // { data: 'lihat' },
                            { data: 'resep' },
                            { data: 'kuitansi'}
                        ]
                        });
                        });
                    </script>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><!-- Tindakan popup -->
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" onclick="tutup()" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title" id="exampleModalLabel">Tambah Tindakan</h3>
                                </div>
                                <div class="modal-body">
                                    <form id="tindakanPasien" class="form-horisontal">
                                    <div class="form-group" style="height:26px;">
                                    <label for="inputPoliklinik" class="col-sm-3 control-label">Poliklinik</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputPoliklinik" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group" style="height:26px;">
                                    <label for="inputDiagnosis" class="col-sm-3 control-label">Diagnosis</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputDiagnosis" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group" style="height:26px;">
                                    <label for="inputTindakan" class="col-sm-3 control-label">Tindakan</label>
                                    <div class="col-sm-9">
                                        <select id="daftarTindakan" name="kdTindakan" class="form-control">
                                            <option value="">......</option>
                                            <?php
                                            $daftarTindakan = isset($_POST['daftarTindakan']) ? $_POST['daftarTindakan'] : '';
                                            $bacaSql = mysqli_query($koneksi, "SELECT * FROM daftar_tindakan ORDER BY id_tindakan");

                                            while ($bacaData = mysqli_fetch_array($bacaSql)) {
                                                if ($bacaData['id_tindakan'] == $daftarTindakan) {
                                                    $cek = " selected";
                                                } else {
                                                    $cek = "";
                                                }
                                            echo "<option value='$bacaData[id_tindakan]' $cek>[ $bacaData[id_tindakan] ]  $bacaData[nama_tindakan]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="height:26px;">
                                <label for="inputHarga" class="col-sm-3 control-label">Harga</label>
                                <div class="col-sm-5">
                                    <?php
                                    include_once './function.php';

                                    $harga = '';
                                    ?>

                                    <input type="text" name="biaya" class="form-control" id="inputHarga" placeholder="Harga" value="<?php echo $harga; ?>" readonly>
                                </div>
                                </div>
                                <div class="form-group" style="height:26px;">
                                <label for="inputJmltind" class="col-sm-3 control-label">Jumlah</label>
                                <div class="col-sm-2">
                                    <input type="text" name="jmlh_tindakan" class="form-control" id="inputJmltind" value="1">
                                </div>
                                <div class="col-sm-4">
                                    <!--<a href="#" role="button" id="tambahbtn"class="btn btn-info">Tambah Tindakan</a>-->
                                    <!-- <input name="btntambah" type="submit" style="cursor:pointer;" class="btn btn-info" value=" Tambah Tindakan " /> -->
                                    <input type="hidden" class="form-control" id="inputIdkunj" name="id_kunjungan">
                                    <input type="hidden" class="form-control" id="inputPetrs" name="petugas_rs">
                                    <button type="button" class="btn btn-info" id="tambah" value="tambah">Tambah Tindakan</button>
                                </div>
                                </div>
                                <div>
                                <h4 class="sub-header">Daftar Tindakan</h4>
                                <div class="table">
                                    <table id="tabeltindakan" class="table table-hover table-bordered" >
                                        <thead >
                                            <tr>
                                                <!-- <th>No.</th> -->
                                                <!-- <th>Poliklinik</th> -->
                                                <th>Petugas Kesehatan</th>
                                                <th>Diagnosis</th>
                                                <th>Tindakan</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <!-- <th>Hapus</th> -->
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                </div>
                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="tutup()">Batal</button>
                                    <button type="button" class="btn btn-primary" id="submit">Simpan</button>
                                </div>
                                <script>
                                    function load() {
                                        table = $('#tabeltindakan').DataTable({
                                            "bLengthChange": false,
                                            "bFilter": false,
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
                                            // 'order': [[ 2, "desc" ]],
                                            'processing': true,
                                            'serverSide': true,
                                            'serverMethod': 'post',
                                            'ajax': {
                                                'url':'ajaxtindtmp.php'
                                            },
                                            'columns': [
                                                // { data: 'poliklinik' },
                                                { data: 'nama_petugas' },
                                                { data: 'nama_indonesia' },
                                                { data: 'nama_tindakan' },
                                                { data: 'harga_tindakan' },
                                                { data: 'jmlh_tind' }
                                                // { data: 'delete' }
                                            ]
                                        });
                                    };


                                    $('#daftarTindakan').change(function() {
                                        // var daftar = document.getElementById('daftarTIndakan');
                                        var harga = document.getElementById('inputHarga');
                                        var daftar = $('#daftarTindakan option:selected').val()
                                        // id = daftar.options[daftar.selectedIndex].value();
                                        $.ajax({
                                            url: 'ajax.php',
                                            type: 'POST',
                                            data: {
                                                id_tindakan: daftar,
                                            },
                                            success: function(result) {
                                                harga.value = result;
                                            }
                                        });
                                    });

                                    $('#exampleModal').on('show.bs.modal', function (event) {
                                    var button = $(event.relatedTarget) 
                                    var recipient = button.data('whatever') 
                                    var modal = $(this);
                                    var dataString = 'id=' + recipient;
                            
                                        $.ajax({
                                            type: "GET",
                                            url: "ajaxtind.php",
                                            dataType: "json",
                                            data: dataString,
                                            success: function (data) {
                                                $('#inputPoliklinik').val(data['poliklinik']);
                                                $('#inputDiagnosis').val(data['nama_indonesia']);
                                                $('#inputIdkunj').val(data['id_kunjungan']);
                                                $('#inputPetrs').val(data['id_petugas']);
                                            },
                                            error: function(err) {
                                                console.log(err);
                                            }
                                        });  
                                    });

                                    function tutup(){
                                        document.getElementById('inputPoliklinik').value = "";
                                        document.getElementById('inputDiagnosis').value = "";
                                        document.getElementById('daftarTindakan').value = "";
                                        document.getElementById('inputHarga').value = "";
                                        table.destroy();
                                        $('#exampleModal').modal('hide');
                                    }

                                    $(function() {
                                        $('#tambah').click(function() {
                                            var poli = $('#inputPoliklinik').val();
                                            var diag = $('#inputDiagnosis').val();
                                            var tind = $('#daftarTindakan option:selected').val();
                                            var harg = $('#inputHarga').val();
                                            var idku = $('#inputIdkunj').val();
                                            var pers = $('#inputPetrs').val();
                                            var jmlh = $('#inputJmltind').val();
                                            var tambah = $('#tambah').val();
                                            var dataBpjs = $('#tindakanPasien').serialize();

                                            var dataString = 'poli='+ poli +'&diag='+ diag +'&tind='+tind+'&harg='+harg
                                            +'&idku='+idku+'&pers='+pers+'&jmlh='+jmlh+'&tambah='+tambah;

                                            $.ajax({
                                                type: 'post',
                                                url: 'tambah_rawatjalan.php',
                                                data: dataString,
                                                success: function() {
                                                    $('#tabeltindakan').DataTable().ajax.reload();
                                                    document.getElementById('daftarTindakan').value = "";
                                                    document.getElementById('inputHarga').value = "";
                                                    document.getElementById('inputJmltind').value ="1";
                                                    if(jmlh > 0) {
                                                        $.ajax({
                                                            type: "post",
                                                            dataType: "json",
                                                            url: "http://api.bpjs-kesehatan.go.id/pcare-rest-v3.0/tindakan",
                                                            data: dataBpjs,
                                                            success: function(response){
                                                                console.log('sukses');
                                                            }
                                                        });
                                                    } else {
                                                        $.ajax({
                                                            type: "delete",
                                                            dataType: "json",
                                                            url: "http://api.bpjs-kesehatan.go.id/tindakan/199/kunjungan/1301U0070815Y000005",
                                                            success: function(response){
                                                                console.log('ok');
                                                            }
                                                        });
                                                    }

                                                }
                                            });
                                        })
                                    });
                                    $(function() {
                                        $('#submit').click(function() {
                                            var idku = $('#inputIdkunj').val();
                                            var dataString = 'id='+idku;
                                            var databpjs = $('#tindakanPasien').serialize();
                                            $.ajax({
                                                type: 'get',
                                                url: 'tambah_rawatjalan.php',
                                                data: dataString,
                                                success: function() {
                                                    $.ajax({
                                                        type: 'post',
                                                        dataType: 'json',
                                                        url: 'http://api.bpjs-kesehatan.go.id/pcare-rest-v3.0/tindakan',
                                                        data: dataString,
                                                        success: function(response) {
                                                            console.log('sukses');
                                                        }
                                                    })
                                                    $('#tabelku').DataTable().ajax.reload();
                                                    $('#exampleModal').modal('hide');
                                                    table.destroy();
                                                }
                                            })
                                        })
                                    });

                                    function hapus(id_hapus){
                                        var deletes = $('#inputDelete').val();
                                        dataString = 'delete='+deletes+'&id='+id_hapus;
                                        $.ajax({
                                            type: 'get',
                                            url: 'tambah_rawatjalan.php',
                                            data: dataString,
                                            success: function() {
                                                $('#tabeltindakan').DataTable().ajax.reload();
                                                document.getElementById('daftarTindakan').value = "";
                                                document.getElementById('inputHarga').value = "";
                                            }
                                        })
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" onclick="ttpdetail()" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="modal-title" id="ModalDetailLabel">Detail Tindakan</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="table">
                                        <table id="tabelDetail" class="table table-hover-bordered">

                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="ttpdetail()">Tutup</button>
                                </div>
                                <script>
                                    $('#ModalDetail').on('show.bs.modal', function(event) {
                                        var button = $(event.relatedTarget)
                                        var recipient = button.data('whatever')
                                        var modal = $(this);
                                        var dataString = 'id='+recipient;

                                        $.ajax({
                                            type: 'post',
                                            url: 'ajaxdetailrj.php',
                                            data: dataString,
                                            beforeSend: function(e) {
                                            if(e && e.overrideMimeType) {
                                                e.overrideMimeType("application/json;charset=UTF-8");
                                            }
                                            },
                                            success: function (response){
                                                $("#tabelDetail").html(response.detail).show();
                                            }
                                        })
                                    })

                                    function ttpdetail(){
                                        $('#ModalDetail').modal('hide');
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalResep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" onclick="ttpresep()" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="modal-title" id="ModalResepLabel">Resep Obat</h3>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" name="addResep" action="need/proses.php" method="post"  id="buatResep">
                                        <!--bagian kunjungan-->
                                        <?php
                                        $noResep = buatKode("resep", "R");
                                        ?>
                                        <!--input data dari kunjungan-->
                                        <div class="form-group" style="height:26px;">
                                            <label for="inputNoResep" class="col-sm-3 control-label">No Resep</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="inputNoResep" placeholder="No Resep" readonly="" name="id_resep" value="<?php echo $noResep; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group form-horizontal" style="height:26px;">
                                            <label for="inputIdKunjungan" class="col-sm-3 control-label">No Kunjungan</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="inputIdKunjungan" placeholder="No Kunjungan" name="id_kunjungan" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-group" style="height:26px;">
                                            <label for="inputNama" class="col-sm-3 control-label">Nama Pasien</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="inputNama" readonly name="nama_pasien">
                                            </div>
                                        </div>
                                        <div class="form-group" style="height:26px;">
                                            <label for="inputDiagOb" class="col-sm-3 control-label">Diagnosis</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="inputDiagOb" readonly>
                                            </div>
                                        </div>
                                        <!--memilih obat untuk resep-->
                                        <h3 class="sub-header"></h3>
                                        <!--memilih petugas sesuai dengan saat rawat jalan-->
                                        <div class="form-group" style="height:26px;">
                                            <label for="inputPetugas" class="col-sm-3 control-label">Petugas Kesehatan</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="pilihPetugas" class="form-control" id="inputPetrso" readonly>
                                            </div>
                                        </div>
                                        <!--mengambil obat yang ada didatabase-->
                                        <div class="form-group" style="height:26px;">
                                            <label for="inputObat" class="col-sm-3 control-label">Nama Obat</label>
                                            <div class="col-sm-7">
                                                <!--memilih obat serta diambil untuk harga dan stok-->
                                                <select id="daftarObat" name="pilihObat" class="form-control" required="">
                                                    <option value="KOSONG">......</option>
                                                    <?php
                                                    $daftarObat = isset($_POST['daftarObat']) ? $_POST['daftarObat'] : '';
                                                    $bacaSql = mysqli_query($koneksi, "SELECT * FROM obat ORDER BY nama_obat");

                                                    while ($bacaData = mysqli_fetch_array($bacaSql)) {
                                                        if ($bacaData['id_obat'] == $daftarObat) {
                                                            $cek = " selected";
                                                        } else {
                                                            $cek = "";
                                                        }

                                                        echo "<option value='$bacaData[id_obat]' $cek>$bacaData[nama_dagang] [ $bacaData[id_obat] ]</option>";
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                        <!--harga dan stok-->
                                        <div class="form-group" style="height:26px;">
                                            <label for="inputHargaO" class="col-sm-3 control-label">Harga</label>
                                            <?php
                                            include 'obat/need/function.php';
                                            $stok = '';
                                            ?>
                                            <div class="col-sm-3 form-horizontal">
                                                <input type="text" name="harga_jual" class="form-control" id="inputHargaO" placeholder="Harga" readonly>
                                            </div>
                                            <label for="inputStok" class="col-sm-1 control-label">Stok</label>
                                            <div class="col-sm-3">
                                                <input type="text" name="stok" class="form-control" id="stok" placeholder="Stok" readonly>

                                            </div>
                                        </div>
                                        <!--mengambil obat dari stok (sementara sebelum klik buat resep)-->
                                        <div class="form-group" style="height:26px;">
                                            <label for="inputJumlahObat" class="col-sm-3 control-label">Jumlah Obat</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="jumlah_obat" id="inputJumlahObat" placeholder="Jumlah Obat">
                                            </div>
                                        </div>
                                        <!--drop down aturan pakai-->
                                        <div class="form-group" style="height:26px;">
                                            <label for="inputAturan" class="col-sm-3 control-label" required="">Aturan Pakai</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="aturan" id="inputAturan">
                                                    <option>1 kali sehari sebelum makan</option>
                                                    <option>2 kali sehari sebelum makan</option>
                                                    <option>3 kali sehari sebelum makan</option>
                                                    <option>1 kali sehari sesudah makan</option>
                                                    <option>2 kali sehari sesudah makan</option>
                                                    <option>3 kali sehari sesudah makan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--tombol tambahkan dan buat resep-->
                                        <div class="form-group" style="height:26px;">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <!-- <input id="btntambaho" name="btntambaho" type="submit" style="cursor:pointer;" class="btn btn-info" value=" Tambahkan Obat " /> -->
                                                <button type="button" class="btn btn-info" id="btntambaho" name="btntambaho" value="tambaho">Tambah Obat</button>
                                                <!-- <input id="btnsimpano" name="btnsimpan" type="submit" style="cursor:pointer;" class="btn btn-primary" value=" buat resep " /> -->
                                                
                                            </div>
                                        </div>
                                    </form>
                                    <h5 class="sub-header">Detail Resep</h5>
                                    
                                        <div class="table" >
                                            <table id="dataObat" class="table table-hover table-bordered" >
                                                <thead >
                                                    <tr>
                                                        <!-- <th>No.</th> -->
                                                        <!-- <th>Id Obat</th> -->
                                                        <th>Nama Obat</th>
                                                        <th>Jumlah Obat</th>
                                                        <th>Aturan Pakai</th>
                                                        <!-- <th>Delete</th> -->
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="ttpresep()">Batal</button>
                                <button type="button" class="btn btn-primary" id="btnsimpano" name="btnsimpano" value="simpano">Simpan Resep</button>
                            </div>
                        </div>
                        <script>
                            function resep() {
                                        table = $('#dataObat').DataTable({
                                            "bLengthChange": false,
                                            "bFilter": false,
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
                                            // 'order': [[ 0, "asc" ]],
                                            'processing': true,
                                            'serverSide': true,
                                            'serverMethod': 'post',
                                            'ajax': {
                                                'url':'ajaxreseptmp.php'
                                            },
                                            'columns': [
                                                // { data: 'poliklinik' },
                                                // { data: 'id_obat' },
                                                { data: 'nama_dagang' },
                                                { data: 'jumlah_obat' },
                                                { data: 'aturan_pakai' }
                                                // { data: 'jmlh_tind' }
                                                // { data: 'delete' }
                                            ]
                                        });
                                    };

                            $('#modalResep').on('show.bs.modal', function (event) {
                                var button = $(event.relatedTarget)
                                var recipient = button.data('whatever')
                                var modal = $(this)
                                var dataString = 'id='+recipient

                                $.ajax({
                                    type: 'get',
                                    url: 'ajaxrsobat.php',
                                    dataType: 'json',
                                    data: dataString,
                                    success: function (data){
                                        $('#inputIdKunjungan').val(data['id_kunjungan']);
                                        $('#inputNama').val(data['nm_pasien']);
                                        $('#inputPetrso').val(data['nama_petugas']);
                                        $('#inputDiagOb').val(data['nama_indonesia']);
                                    }
                                })
                            });

                            $('#daftarObat').change(function() {
                                var daftar = document.getElementById('daftarObat');
                                var harga = document.getElementById('inputHargaO');

                                id = daftar.options[daftar.selectedIndex].value;
                                $.ajax({
                                    url: 'obat/need/ajax.php',
                                    type: 'POST',
                                    data: {
                                        id_obat: id,
                                    },
                                    success: function(result) {
                                        harga.value = result;
                                    }
                                });
                            });

                            $('#daftarObat').change(function() {
                                var daftar = document.getElementById('daftarObat');
                                var stok = document.getElementById('stok');
                                var jml = document.getElementById('inputJumlahObat');
                                
                                id = daftar.options[daftar.selectedIndex].value;
                                $.ajax({
                                    url: 'obat/need/ajax.php',
                                    type: 'POST',
                                    data: {
                                        id_o: id,
                                    },
                                    success: function(result){
                                        stok.value = result;
                                        jml.max = result;
                                    }
                                })
                            })

                            $('#btntambaho').click(function() {
                                var idku = $('#inputIdKunjungan').val();
                                var idrp = $('#inputNoResep').val();
                                var idob = $('#daftarObat option:selected').val();
                                var jmob = $('#inputJumlahObat').val();
                                var maxs = document.getElementById('inputJumlahObat').max;
                                if(jmob > maxs){
                                    $('#inputJumlahObat').focus();
                                    swal("", "Jumlah Obat Tidak Sesuai Stok!", "warning");
                                    return false;
                                }
                                var atpi = $('#inputAturan').val();
                                var ptob = $('#inputPetrso').val();
                                var btnt = $('#btntambaho').val();

                                var dataString = 'idku='+idku+'&idrp='+idrp+'&idob='+idob+'&jmob='+jmob+'&atpi='+atpi+'&ptob='+ptob+'&btnt='+btnt;

                                $.ajax({
                                    type: 'post',
                                    url: 'obat/need/proses.php',
                                    data: dataString,
                                    success: function() {
                                        $('#dataObat').DataTable().ajax.reload();
                                        document.getElementById('daftarObat').value = "";
                                        document.getElementById('inputHargaO').value = "";
                                        document.getElementById('stok').value = "";
                                        document.getElementById('inputJumlahObat').value = "";
                                    }
                                });
                            });

                            $('#btnsimpano').click(function() {
                                var idrp = $('#inputNoResep').val();
                                var idku = $('#inputIdKunjungan').val();
                                var btns = $('#btnsimpano').val();

                                var dataString = 'idku='+idku+'&idrp='+idrp+'&btns='+btns;

                                $.ajax({
                                    type: 'post',
                                    url: 'obat/need/proses.php',
                                    data: dataString,
                                    success: function(){
                                        swal("", "Simpan Resep Obat Berhasil", "success");
                                        $('#tabelku').DataTable().ajax.reload();
                                        $('#modalResep').modal('hide');
                                        table.destroy();
                                    }
                                })
                            });

                            function ttpresep(){
                                table.destroy();
                                $('#modalResep').modal('hide');
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

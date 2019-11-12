<?php
$arrActive['dataPasien'] = 'active';
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
        <!-- <link rel="stylesheet" type="text/css" href="../css/dataTables.tableTools.css"> -->
        <!-- <link rel="stylesheet" type="text/css" href="../css/dataTables.colVis.css"> -->
        <!-- <link rel="stylesheet" type="text/css" href="../../css/dataTables.responsive.css"> -->
<!--        <script type="text/javascript" src="../../js/bootstrap.min.js"></script>-->

        <!--<script type="text/javascript" src="../../js/jquery.min.js"></script>-->
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
        <!-- <script type="text/javascript" src="../js/dataTables.tableTools.js"></script> -->
        <!-- <script type="text/javascript" src="../js/dataTables.colVis.js"></script> -->

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


                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main" style="margin-left: 20%">
                    <h1 class="page-header">Data Pasien</h1>

                    <div class="row">
                        <div class="table" >
                            <table id="tabelku" class="table table-hover display responsive compact"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <!-- <th style="width : 5%">No.</th> -->
                                        <th>No. RM</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Umur</th>
                                        <th>Tmpt. Lahir</th>
                                        <th>Tgl. Lahir</th>
                                        <th style="width : 5%">JK</th>
                                        <th>Tgl. Daftar</th>
                                        <th>Cabang</th>
                                        <th>Aksi</th>
                                        <!-- <th>Rawat</th> -->
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
                            'url':'ajaxdtpasien.php'
                        },
                        'columns': [
                            { data: 'no_rm' },
                            { data: 'nm_pasien' },
                            { data: 'alamat_pasien' },
                            { data: 'umur_pasien' },
                            { data: 'tmpt_lahir' },
                            { data: 'tgl_lahir'},
                            { data: 'jk_pasien' },
                            { data: 'tgl_daftar_pasien' },
                            { data: 'cabang' },
                            { data: 'action'}
                        ]
                        });
                        });
                    </script>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalLabel">Edit Data Pasien</h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" name="addPasien" action="" method="post" id="pendaftaran">
                            <div class="form-group">
                                <label for="inputNoRM" class="col-sm-2 control-label">No. RM</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="norm" class="form-control" id="inputNoRM" readonly >
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNama" class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="nama" class="form-control" id="inputNama" required="">
                                    </div>
                                <label for="inputKln" class="col-sm-3 control-label">Kelamin</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="kelamin" class="form-control" id="inputKln" required="" placeholder="L/ P">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTlahir" class="col-sm-2 control-label">Tempat Lahir</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="t_lahir" class="form-control" id="inputTlahir" required="">
                                    </div>
                                <label for="inputNik" class="col-sm-3 control-label">NIK</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="nik" class="form-control" id="inputNik" required="" placeholder="NIK">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTanggalLahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="tgl_lahir" class="form-control" id="inputTanggalLahir" required="" >
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAgama" class="col-sm-2 control-label">Agama</label>
                                    <div class="col-sm-2">
                                        <select name="agama" id="inputAgama" class="form-control">
                                            <option></option>
                                            <option>Islam</option>
                                            <option>Protestan</option>
                                            <option>Katolik</option>
                                            <option>Hindu</option>
                                            <option>Budha</option>
                                            <option>Konghucu</option>
                                        </select>
                                    </div>
                                <label for="inputNegara" class="col-sm-4 control-label">Negara</label>
                                    <div class="col-sm-2">
                                        <select name="negara" id="inputNegara" class="form-control">
                                            <option></option>
                                            <option>Indonesia</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStkw" class="col-sm-2 control-label">St. Kawin</label>
                                    <div class="col-sm-2">
                                        <select name="st_kawin" id="inputStkw" class="form-control">
                                            <option></option>
                                            <option>Sudah Kawin</option>
                                            <option>Belum Kawin</option>
                                            <option>Tidak Kawin</option>
                                        </select>
                                    </div>
                                <label for="inputPndd" class="col-sm-4 control-label">Pendidikan</label>
                                    <div class="col-sm-2">
                                        <select name="pndd" id="inputPndd" class="form-control">
                                            <option></option>
                                            <option>SMA</option>
                                            <option>D III</option>
                                            <option>S1</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPkrj" class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-3">
                                        <select name="pkrj" id="inputPkrj" class="form-control">
                                            <option></option>
                                            <option>Pegawai Negeri</option>
                                            <option>Karyawan Swasta</option>
                                            <option>Wirausaha</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="alamat" class="form-control" id="inputAlamat" required="" >
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTelp" class="col-sm-2 control-label">Telepon</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="telpon" class="form-control" id="inputTelp" required="">
                                    </div>
                                <label for="inputHP" class="col-sm-4 control-label">HP</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="hp" class="form-control" id="inputHP" required="">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputProv" class="col-sm-2 control-label">Provinsi</label>
                                    <div class="col-sm-2">
                                        <select name="provinsi" id="inputProv" class="form-control">
                                            <option></option>
                                            <option>Jawa Tengah</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputKt" class="col-sm-2 control-label">Kota/ Kab</label>
                                    <div class="col-sm-2">
                                        <select name="kt_kab" id="inputKt" class="form-control">
                                            <option></option>
                                            <option>Surakarta</option>
                                            <option>Karanganyar</option>
                                            <option>Sragen</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputKec" class="col-sm-2 control-label">Kecamatan</label>
                                    <div class="col-sm-2">
                                        <select name="kecamatan" id="inputKec" class="form-control">
                                            <option></option>
                                            <option>Banjarsari</option>
                                            <option>Jebres</option>
                                            <option>Laweyan</option>
                                            <option>Pasar Kliwon</option>
                                            <option>Serengan</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputKel" class="col-sm-2 control-label">Kelurahan</label>
                                    <div class="col-sm-2">
                                        <select name="kelurahan" id="inputKel" class="form-control">
                                            <option></option>
                                            <option>Jebres</option>
                                            <option>Mojosongo</option>
                                        </select>
                                    </div>
                                <label for="inputRt" class="col-sm-4 control-label">RT</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="rt" id="inputRt" class="form-control">
                                    </div>
                                <label for="inputRw" class="col-sm-1 control-label">RW</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="rw" id="inputRw" class="form-control">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPrs" class="col-sm-2 control-label">Pegawai RS</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="pegrs" id="inputPrs" class="form-control" placeholder="Y/T">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTb" class="col-sm-2 control-label">Tinggi Badan</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="tinggi" class="form-control" id="inputTb" required="">
                                    </div>
                                <label for="inputBb" class="col-sm-2 control-label">Berat Badan</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="berat" class="form-control" id="inputBb" required="">
                                    </div>
                                <label for="inputLp" class="col-sm-2 control-label">Lingkar Perut</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="lingkarp" class="form-control" id="inputLp">
                                    </div>
                                <label for="inputImt" class="col-sm-1 control-label">IMT</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="imt" class="form-control" id="inputImt">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSt" class="col-sm-2 control-label">Sistole</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="sistole" class="form-control" id="inputSt" required="">
                                    </div>
                                <label for="inputDt" class="col-sm-2 control-label">Diastole</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="diastole" class="form-control" id="inputDt" required="">
                                    </div>
                                <label for="inputRr" class="col-sm-2 control-label">Respiratory Rate</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="r_rate" class="form-control" id="inputRr">
                                    </div>
                                <label for="inputHr" class="col-sm-1 control-label">Heart Rate</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="h_rate" class="form-control" id="inputHr">
                                    </div>
                            </div>
                                            
                        <h2 class="sub-header"></h2>
                            <div class="form-group">
                                <label for="inputWal" class="col-sm-2 control-label">Nama Wali</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="nm_wali" id="inputWal" required="">
                                    </div>
                                <label for="inputHub" class="col-sm-3 control-label">Hub. Dgn. Pasien</label>
                                    <div class="col-sm-3">
                                        <select name="hub_wali" class="form-control" id="inputHub">
                                            <option></option>
                                            <option>Orang Tua Kandung</option>
                                            <option>Orang Tua Angkat</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputOrtu" class="col-sm-2 control-label">Nama Ortu</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="nm_ortu" id="inputOrtu" required="">
                                    </div>
                                <label for="inputPkrWal" class="col-sm-3 control-label">Pekerjaan Wali</label>
                                    <div class="col-sm-3">
                                        <select name="pkrj_wali" class="form-control" id="inputPkrWal">
                                            <option></option>
                                            <option>Pegawai Negeri</option>
                                            <option>Karyawan Swasta</option>
                                            <option>Wirausaha</option>
                                        </select>
                                    </div>
                            </div>
                        <!-- <h2 class="sub-header"></h2>
                                <div class="form-group">
                                    <label for="inputAl" class="col-sm-2 control-label">Alergi Thd.</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="alergi" id="inputAl" required="">
                                        </div>
                                    <label for="inputUrk" class="col-sm-3 control-label">No. Urut Klinik</label>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" name="no_urk" id="inputUrk" readonly>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputIns" class="col-sm-2 control-label">Instansi</label>
                                        <div class="col-sm-3">
                                            <select name="instansi" class="form-control" id="inputIns">
                                                <option></option>
                                                <option></option>
                                            </select>
                                        </div>
                                    <label for="inputSmp" class="col-sm-3 control-label">Sumber Pasien</label>
                                        <div class="col-sm-3">
                                            <select name="sm_psn" class="form-control" id="inputSmp">
                                                <option></option>
                                                <option></option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputStsp" class="col-sm-2 control-label">Status Pasien</label>
                                        <div class="col-sm-1">
                                            <input type="text" name="sts_psn" class="form-control" id="inputStsp" placeholder="B/ L">
                                        </div>
                                    <label for="inputPng" class="col-sm-5 control-label">NIK PNG</label>
                                        <div class="col-sm-3">
                                            <select name="nik_png" class="form-control" id="inputPng">
                                                <option></option>
                                                <option></option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                                <label for="inputKba" class="col-sm-2 control-label">Kartu Baru</label>
                                                <div class="col-sm-1">
                                                    <input type="text" name="kr_b" class="form-control" id="inputKba">
                                                </div>
                                                <label for="inputNurd" class="col-sm-5 control-label">No. Urut Dokter</label>
                                                <div class="col-sm-1">
                                                    <input type="text" name="no_urd" class="form-control" id="inputNurd" readonly>
                                                </div>
                                            </div> -->
                                            <!-- <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-9">
                                                    <button class="btn btn-primary" type="submit">Tambahkan</button>
                                                </div>
                                            </div> -->

                                            <!-- <h2 class="sub-header">Peserta BPJS</h2>
                                            <div class="form-group">
                                                <label for="inputNokartu" class="col-sm-1 control-label">No. Kartu</label>
                                                <div class="col-sm-2">
                                                    <input type="text" name="no_kartu" class="form-control" id="inputNokartu">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputNmbpjs" class="col-sm-1 control-label">Nama</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="nm_bpjs" class="form-control" id="inputNmbpjs" readonly>
                                                </div>
                                                <label for="inputJkbpjs" class="col-sm-2 control-label">Jk</label>
                                                <div class="col-sm-1">
                                                    <input type="text" name="jk_bpjs" class="form-control" id="inputJkbpjs" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputTglbpjs" class="col-sm-1 control-label">Tgl. Lahir</label>
                                                <div class="col-sm-2">
                                                    <input type="text" name="tgl_bpjs" class="form-control" id="inputTglbpjs" readonly>
                                                </div>
                                                <label for="inputPstbpjs" class="col-sm-1 control-label">PISAT</label>
                                                <div class="col-sm-2">
                                                    <input type="text" name="pst_bpjs" class="form-control" id="inputPstbpjs" readonly>
                                                </div>
                                                <label for="inputKlsbpjs" class="col-sm-1 control-label">Kelas</label>
                                                <div class="col-sm-2">
                                                    <input type="text" name="kls_bpjs" class="form-control" id="inputKlsbpjs" readonly>
                                                </div>
                                                <label for="inputPsrbpjs" class="col-sm-1 control-label">Peserta</label>
                                                <div class="col-sm-2">
                                                    <input type="text" name="psr_bpjs" class="form-control" id="inputPsrbpjs" readonly>
                                                </div>
                                            </div> -->
                                            <!-- <div class="form-group">
                                                <div class="col-sm-2">
                                                    <a href="#" class="btn btn-danger" style="background-color:red; color:white; border-radius: 5px 5px;" onclick="tambah()">Bersihkan</a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="submit" name="submit" class="form-control" id="submit" value="Simpan" style="background-color:#05deff; color:white; border-radius: 5px 5px;">
                                                </div>
                                            </div> -->
                                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" id="submit">Simpan</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;
        
                    $.ajax({
                        type: "GET",
                        url: "ajaxedit.php",
                        dataType: "json",
                        data: dataString,
                        success: function (data) {
                            $('#inputNoRM').val(data['no_rm']);
                            $('#inputNama').val(data['nm_pasien']);
                            $('#inputKln').val(data['jk_pasien']);
                            $('#inputTlahir').val(data['tmpt_lahir']);
                            $('#inputNik').val(data['nik']);
                            $('#inputTanggalLahir').val(data['tgl_lahir']);
                            $('#inputAgama').val(data['agm_pasien']);
                            $('#inputNegara').val(data['neg_pasien']);
                            $('#inputStkw').val(data['sts_kwn']);
                            $('#inputPndd').val(data['pend_pasien']);
                            $('#inputPkrj').val(data['pkrj_pasien']);
                            $('#inputAlamat').val(data['alamat_pasien']);
                            $('#inputTelp').val(data['tlp_pasien']);
                            $('#inputHP').val(data['hp_pasien']);
                            $('#inputProv').val(data['prov_pasien']);
                            $('#inputKt').val(data['kot_pasien']);
                            $('#inputKec').val(data['kec_pasien']);
                            $('#inputKel').val(data['kel_pasien']);
                            $('#inputRt').val(data['rt_pasien']);
                            $('#inputRw').val(data['rw_pasien']);
                            $('#inputPrs').val(data['peg_rs']);
                            $('#inputTb').val(data['tinggi_pasien']);
                            $('#inputBb').val(data['berat_pasien']);
                            $('#inputLp').val(data['lp_pasien']);
                            $('#inputImt').val(data['imp_pasien']);
                            $('#inputSt').val(data['sis_pasien']);
                            $('#inputDt').val(data['dia_pasien']);
                            $('#inputRr').val(data['rr_pasien']);
                            $('#inputHr').val(data['hr_pasien']);
                            $('#inputWal').val(data['nm_wali']);
                            $('#inputHub').val(data['hub_wali']);
                            $('#inputOrtu').val(data['nm_ortu']);
                            $('#inputPkrWal').val(data['pkrj_wali']);
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });  
            })
            $(function() {
            $('#submit').click(function(){
                var norm = $('#inputNoRM').val();
                if(norm == '')
                {
                    $('#inputNoRM').focus();
                    return false;
                }
                var nmpas = $('#inputNama').val();
                if(nmpas == '')
                {
                    $('#inputNama').focus();
                    return false;
                }
                var jk = $('#inputKln').val();
                if(jk == '')
                {
                    $('#inputKln').focus();
                    return false;
                }
                var tlahir = $('#inputTlahir').val();
                if(tlahir == '')
                {
                    $('#inputTlahir').focus();
                    return false;
                }
                var nik = $('#inputNik').val();
                if(nik == '')
                {
                    $('#inputNik').focus();
                    return false;
                }
                var tgll = $('#inputTanggalLahir').val();
                if(tgll == '')
                {
                    $('#inputTanggalLahir').focus();
                    return false;
                }
                var agm = $('#inputAgama').val();
                if(agm == '')
                {
                    $('#inputAgama').focus();
                    return false;
                }
                var neg = $('#inputNegara').val();
                if(neg == '')
                {
                    $('#inputNegara').val();
                    return false;
                }
                var stkw = $('#inputStkw').val();
                if(stkw == '')
                {
                    $('#inputStkw').focus();
                    return false;
                }
                var pndd = $('#inputPndd').val();
                if(pndd == '')
                {
                    $('#inputPndd').focus();   
                    return false;
                }
                var pkrj = $('#inputPkrj').val();
                if(pkrj == '')
                {
                    $('#inputPkrj').focus();
                    return false;
                }
                var almt = $('#inputAlamat').val();
                if(almt == '')
                {
                    $('#inputAlamat').focus();
                    return false;
                }
                var tlp = $('#inputTelp').val();
                if(tlp == '')
                {
                    $('#inputTelp').focus();
                    return false;
                }
                var hp = $('#inputHP').val();
                if(hp == '')
                {
                    $('#inputHP').focus();
                    return false;
                }
                var prov = $('#inputProv').val();
                if(prov == '')
                {
                    $('#inputProv').focus();
                    return false;
                }
                var kot = $('#inputKt').val();
                if(kot == '')
                {
                    $('#inputKt').focus();
                    return false;
                }
                var kec = $('#inputKec').val();
                if(kec == '')
                {
                    $('#inputKec').focus();
                    return false;
                }
                var kel = $('#inputKel').val()
                if(kel == '')
                {
                    $('#inputKel').focus();
                    return false;
                }
                var rt = $('#inputRt').val();
                if(rt == '')
                {
                    $('#inputRt').focus();
                    return false;
                }
                var rw = $('#inputRw').val();
                if(rw == '')
                {
                    $('#inputRw').focus();
                    return false;
                }
                var prs = $('#inputPrs').val();
                if(prs == '')
                {
                    $('#inputPrs').focus();
                    return false;
                }
                var tb = $('#inputTb').val();
                if(tb == '')
                {
                    $('#inputTb').focus();
                    return false;
                }
                var bb = $('#inputBb').val();
                if(bb == '')
                {
                    $('#inputBb').focus();
                    return false;
                }
                var lp = $('#inputBb').val();
                if(lp == '')
                {
                    $('#inputBb').focus();
                    return false;
                }
                var imt = $('#inputImt').val();
                if(imt == '')
                {
                    $('#inputImt').focus();
                    return false;
                }
                var st = $('#inputSt').val();
                if(st == '')
                {
                    $('#inputSt').focus();
                    return false;
                }
                var ds = $('#inputDt').val();
                if(ds == '')
                {
                    $('#inputDt').focus();
                    return false;
                }
                var rr = $('#inputRr').val();
                if(rr == '')
                {
                    $('#inputRr').focus();
                    return false;
                }
                var hr = $('#inputHr').val();
                if(hr == '')
                {
                    $('#inputHr').focus();
                    return false;
                }
                var nmwl = $('#inputWal').val();
                if(nmwl == '')
                {
                    $('#inputWal').focus();
                    return false;
                }
                var hbwl = $('#inputHub').val();
                if(hbwl == '')
                {
                    $('#inputHub').focus();
                    return false;
                }
                var orwl = $('#inputOrtu').val();
                if(orwl == '')
                {
                    $('#inputOrtu').focus();
                    return false;
                }
                var prwl = $('#inputPkrWal').val();
                if(prwl == '')
                {
                    $('#inputPkrWal').focus();
                    return false;
                }
                var dataString = 'no_rm='+ norm + '&nm_pasien=' + nmpas + '&jk_pasien=' + jk + '&tmpt_lahir=' + tlahir 
                + '&nik=' + nik + '&tgl_lahir=' + tgll + '&agm_pasien=' + agm + '&neg_pasien=' + neg + '&sts_kwn=' + stkw
                + '&pend_pasien=' + pndd + '&pkrj_pasien=' + pkrj + '&alamat_pasien=' + almt + '&tlp_pasien=' + tlp 
                + '&hp_pasien=' + hp + '&prov_pasien=' + prov + '&kot_pasien=' + kot + '&kec_pasien=' + kec + '&kel_pasien=' + kel
                + '&rt_pasien=' + rt + '&rw_pasien=' + rw + '&peg_rs=' + prs + '&tinggi_pasien=' + tb + '&berat_pasien=' + bb 
                + '&lp_pasien=' + lp + '&imp_pasien=' + imt + '&sis_pasien=' + st + '&dia_pasien=' + ds + '&rr_pasien=' + rr 
                + '&hr_pasien=' + hr + '&nm_wali=' + nmwl + '&hub_wali=' + hbwl + '&nm_ortu=' + orwl + '&pkrj_wali=' + prwl;

                $.ajax({
                    type: 'post',
                    url: 'edit_save_pasien.php',
                    data: dataString,
                    success: function() {
                        $('#tabelku').DataTable().ajax.reload();
                        $('#exampleModal').modal('hide');
                        }
                });
            });
        });
        </script>
    </body>
</html>

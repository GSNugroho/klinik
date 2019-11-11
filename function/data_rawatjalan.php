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
        <!-- <link rel="stylesheet" type="text/css" href="../css/dataTables.tableTools.css">
        <link rel="stylesheet" type="text/css" href="../css/dataTables.colVis.css"> -->
        <!--<link rel="stylesheet" type="text/css" href="../../css/dataTables.responsive.css">-->
<!--        <script type="text/javascript" src="../../js/bootstrap.min.js"></script>-->

        <!--<script type="text/javascript" src="../../js/jquery.min.js"></script>-->
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
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

                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main" style="margin-left: 20%">
                    <h1 class="page-header">Data Rawat Jalan</h1>

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
                                        <th>Tambah Tindakan</th>
                                        <th>Detail Tindakan</th>
                                        <th>Buat Resep</th>
                                        <th>Kuitansi</th>
                                    </tr>
                                </thead>
<!-- 
                               

                                <tbody id="myTable">
                                    <?php
                                    // include_once '../koneksi.php';
//                                    $query = mysql_query("select * from pasien");
//                                    $query = mysql_query("select * from kunjungan p INNER JOIN user u ON p.id_user = u.id_user");
                                    // $query = mysqli_query($koneksi, "select * from kunjungan p INNER JOIN user u ON p. id_user = u.id_user LEFT JOIN pasien_b s ON p.no_rm = s.no_rm ORDER BY id_kunjungan DESC");
//                                        if ($_SESSION['level'] == 'admin'){
//                                            $query = mysql_query("select * from kunjungan p LEFT JOIN pasien s ON p.no_rm = s.no_rm
//                                                                LEFT JOIN user u ON p. id_user = u.id_user") or die(mysql_error());
//                                        } else { 
//                                             $query = mysql_query("select * from kunjungan p LEFT JOIN pasien s ON p.no_rm = s.no_rm
//                                                                LEFT JOIN user u ON p. id_user = u.id_user WHERE cabang = ' " . $_SESSION['cabang'] . " ' ") or die(mysql_error());
//                                        }
                                        
                                    // $no = 0;
                                    
                                    // while ($hasil = mysqli_fetch_array($query)) {
                                    //      $query_cekresep = mysqli_query ($koneksi, "SELECT id_resep FROM kuitansi WHERE id_kunjungan = '$hasil[0]'")or die(mysql_error());
                                    //      $a = mysqli_fetch_array($query_cekresep);
                                        
                                    //     $no++;
                                    //     echo "<tr>
                                    //     <td>" . $no . "</td>
                                    //     <td>" . $hasil['id_kunjungan'] . "</td>
                                    //     <td>" . $hasil['cabang'] . "</td>
                                    //     <td>" . $hasil['tgl_periksa'] . "</td>
                                    //     <td>" . $hasil['no_rm'] . "</td>
                                    //     <td>" . $hasil['nm_pasien'] . "</td>
                                    //     <td>" . $hasil['biaya_periksa'] . "</td>
                                    //     <td><a href='detail_tindakan.php?i=".$hasil['id_kunjungan']."'>Lihat</a></td>
                                    //     <td><a href='cetak/cetak_transaksi.php?i=".$hasil['id_kunjungan']."' target='_blank' >Cetak</a></td>
                                        
                                            
                                    //     <td>";
                                    //     if(empty($a[0])){
                                    //        echo" <a href='obat/buat_resep.php?id_kunjungan=".$hasil['id_kunjungan']."'>Buat Resep</a>";
                                    //            } else {
                                    //                echo "Sudah";
                                    //            }
                                    //       echo "</td>
                                    //     <td><a href='cetak/cetak_kuitansi.php?i=".$hasil['id_kunjungan']."' target='_blank'>Cetak</a></td>   
                                        
                                    // </tr>";
                                    // }
                                    ?>
                                </tbody> -->
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
                            'url':'ajaxdtrj.php'
                        },
                        'columns': [
                            { data: 'id_kunjungan' },
                            { data: 'rm' },
                            { data: 'tgl_periksa' },
                            { data: 'nm_pasien' },
                            { data: 'cabang' },
                            { data: 'biaya_periksa' },
                            { data: 'tindakan' },
                            { data: 'detail' },
                            { data: 'resep' },
                            { data: 'kuitansi'}
                        ]
                        });
                        });
                    </script>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLabel">Tambah Tindakan</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                    <label for="inputPoliklinik" class="col-sm-3 control-label">Poliklinik</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputPoliklinik" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                    <label for="inputDiagnosis" class="col-sm-3 control-label">Diagnosis</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputDiagnosis" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                    <label for="inputTindakan" class="col-sm-3 control-label">Tindakan</label>
                                    <div class="col-sm-9">
                                        <select id="daftarTindakan" name="daftarTindakan" class="form-control">
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
                                <br>
                                <br>
                                <div class="form-group">
                                <label for="inputHarga" class="col-sm-3 control-label">Harga</label>
                                <div class="col-sm-5">
                                    <?php
                                    include_once './function.php';

                                    $harga = '';
                                    ?>

                                    <input type="text" name="harga_tindakan" class="form-control" id="inputHarga" placeholder="Harga" value="<?php echo $harga; ?>">
                                </div>
                                <div class="col-sm-4">
                                    <!--<a href="#" role="button" id="tambahbtn"class="btn btn-info">Tambah Tindakan</a>-->
                                    <input name="btntambah" type="submit" style="cursor:pointer;" class="btn btn-info" value=" Tambah Tindakan " />
                                </div>
                                </div>

                                <div>
                                <h2 class="sub-header">Daftar Tindakan</h2>
                                <div class="table" >
                                    <table id="tabeltindakan" class="table table-hover table-bordered" >
                                        <thead >
                                            <tr>
                                                <th>No.</th>
                                                <th>Poliklinik</th>
                                                <th>Petugas Kesehatan</th>
                                                <th>Tindakan</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <!--<td>".$hasil['aturan_pakai']."</td>-->
                                        <tbody id="myTable">

                                            <?php
                                            $query = mysqli_query($koneksi, "select * from tmp_tindakan_medis  p INNER JOIN daftar_tindakan u ON p.id_tindakan = u.id_tindakan");
                                            $no = 0;
                                            while ($hasil = mysqli_fetch_array($query)) {
                                                $no++;
            //                                    $jumlah = $_POST['jumlahObat'];
            //                                    $jumlah = 10;
            //                                    $harga_total = $hasil['harga_jual']*10;                                    
                                                echo "<tr>
                                                    <td>" . $no . "</td>
                                                    <td>" . $hasil['poliklinik'] . "</td>
                                                    <td>" . $hasil['id_petugas'] . "</td>
                                                    <td>" . $hasil['id_tindakan'] . "</td>
                                                    <td>" . $hasil['harga_tindakan'] . "</td>
                                                    <td><a href='tambah_rawatjalan.php?delete=" . $hasil['id_tmp_tm'] . "'>Delete</a></td>    

                                                </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" id="submit">Simpan</button>
                                </div>
                                <script>
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
                                    $(document).ready(function() {
                                        $('#tabelku').dataTable();
                                    });
                                    
                                    $('#exampleModal').on('show.bs.modal', function (event) {
                                    var button = $(event.relatedTarget) // Button that triggered the modal
                                    var recipient = button.data('whatever') // Extract info from data-* attributes
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
                                            },
                                            error: function(err) {
                                                console.log(err);
                                            }
                                        });  
                                    });

                                    function clear(){
                                        document.getElementById('inputPoliklinik').value = "";
                                        document.getElementById('inputDiagnosis').value = "";
                                        document.getElementById('daftarTindakan').value = "";
                                        document.getElementById('inputHarga').value = "";
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
$arrActive['rawatJalan'] = 'active';
session_start();
include '../koneksi.php';
include '../library/library.php';
if (!isset($_SESSION['level'])) {
    header('location:../index.php');
}
error_reporting(0);
$_SESSION['rm'] = $_GET['rm'];

?>

<!DOCTYPE html>
<html>
    <head>
        <title><?=namaKlinik()?></title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css"> 
        <link rel="stylesheet" type="text/css" href="../js/jquery-ui-1.11.4/jquery-ui-1.11.4/jquery-ui.min.css"> 

        <script type="text/javascript" src="../js/jquery-1.11.0.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!--        <script type="text/javascript" src="../js/cobapagi.js"></script>-->
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
         <script type="text/javascript" src="../js/jquery-ui-1.11.4/jquery-ui-1.11.4/jquery-ui.js"></script>
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

        <!--        <nav class="navbar navbar-inverse navbar-fixed-top">
        
                    <div class="container-fluid" style="background-color:#5bc0de">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#" style="color:white"><?=namaKlinik()?></a>
                        </div>
        
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                               
                                <li><a href="#">Cabang</a></li>
                                <li><a href="#">User</a></li>
                                <li><a href="#">Log Out</a></li>            
                            </ul>
                        </div>
        
                    </div>
                </nav>-->

        <div class="container-fluid">
            <div class="row">
<!--                <div class="col-sm-3  sidebar">
                    <ul class="nav nav-sidebar ">               
                        <li><a href="../home.php">Home</a></li>
                        <li><a href="penambahan_pasien.php">Penambahan Pasien</a></li>
                        <li><a href="data_pasien.php">Data Pasien</a></li>
                        <li class="active"><a href="add_rawatjalan.php">Rawat Jalan<span class="sr-only">(current)</span></a></li>
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


                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main">
                    <h1 class="page-header">Rawat Jalan Pasien</h1>
                    <form class="form-horizontal" name="addRawatjalan" action="tambah_rawatjalan.php" method="post" >
                        <h2 class="sub-header">Data Kunjungan</h2>
                        <div class="form-group">
                            <?php
                            $dataKodek = buatKode("kunjungan", "RJ");
                            ?>
                            <label for="inputIdKunjungan" class="col-sm-3 control-label">Id Kunjungan</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_kunjungan" class="form-control" id="inputIdKunjungan" readonly value="<?php echo $dataKodek; ?>" placeholder="Id Kunjungan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTglPeriksa" class="col-sm-3 control-label">Tanggal Periksa</label>
                            <div class="col-sm-9">
                                <input type="text" name="tgl_periksa" class="form-control" id="inputTglPeriksa" readonly required="" placeholder="Tgl Periksa" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="form-group form-horizontal">
                            <label for="inputNoRM" class="col-sm-3 control-label">No RM</label>
                            <div class="col-sm-5">
                                <input type="text" name="no_rm" class="form-control" id="inputNoRM"  readonly placeholder="No RM" value="<?php echo isset($_GET['rm']) ? $_GET['rm'] : ''; ?>">
                            </div>
                            <div class="col-sm-4">
                                <a href="lihat_pasien.php" role="button" class="btn btn-info">Lihat Pasien</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-3 control-label">Nama Pasien</label>
                            <div class="col-sm-9">
                                <?php
                                include_once './function.php';

                                $nama = '';
                                if (isset($_GET['rm'])) {
                                    $nama = get_nama_by_rm($_GET['rm']);
                                }
                                ?>
                                <input type="text" name="nama_pasien" class="form-control" id="inputNama" readonly placeholder="Nama Pasien" value="<?php echo $nama; ?>">
                            </div>
                        </div>

                        <h2 class="sub-header">Data Tindakan</h2>
<!--                        <div class="form-group">
                            <?php
                            $dataKode = buatKode("tindakan_medis", "TM");
                            ?>
                            <label for="inputIdTindakan" class="col-sm-3 control-label">Id Tindakan</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_tm" class="form-control" id="inputIdTindakan" readonly value="<?php echo $dataKode; ?>" placeholder="Id Tindakan">
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="inputPoliklinik" class="col-sm-3 control-label">Poliklinik</label>
                            <div class="col-sm-9">
                                <select name="poliklinik" class="form-control">
                                    <option>umum</option>
                                    <option>gigi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPetugas" class="col-sm-3 control-label">Petugas Kesehatan</label>
                            <div class="col-sm-9">
<!--                                <input type="text" class="form-control" id="inputPetugas" placeholder="Nama Petugas Kesehatan">--> 
                                <select name="pilihPetugas" class="form-control">
                                    <option value="KOSONG">......</option>
                                    <?php
                                    $dataPetugas = isset($_POST['pilihPetugas']) ? $_POST['pilihPetugas'] : '';
                                    $bacaSql = mysql_query("SELECT * FROM petugas_kesehatan ORDER BY id_petugas");

                                    while ($bacaData = mysql_fetch_array($bacaSql)) {
                                        if ($bacaData['id_petugas'] == $dataPetugas) {
                                            $cek = " selected";
                                        } else {
                                            $cek = "";
                                        }

                                        echo "<option value='$bacaData[id_petugas]' $cek>[ $bacaData[id_petugas] ]  $bacaData[nama_petugas]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDiagnosis" class="col-sm-3 control-label">Diagnosis</label>
                            <div class="col-sm-9">
                                <input type="text" name="diagnosis" class="form-control" id="inputDiagnosis" placeholder="Diagnosis">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTindakan" class="col-sm-3 control-label">Tindakan</label>
                            <div class="col-sm-9">

<!--                                <input type="text" class="form-control" id="inputTindakan" placeholder="Tindakan">--> 
                                <select id="daftarTindakan" name="daftarTindakan" class="form-control">
                                    <option value="KOSONG">......</option>
                                    <?php
                                    $daftarTindakan = isset($_POST['daftarTindakan']) ? $_POST['daftarTindakan'] : '';
                                    $bacaSql = mysql_query("SELECT * FROM daftar_tindakan ORDER BY id_tindakan");

                                    while ($bacaData = mysql_fetch_array($bacaSql)) {
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
                        <div class="form-group">
                            <label for="inputHarga" class="col-sm-3 control-label">Harga</label>
                            <div class="col-sm-5">
                                <?php
                                include_once './function.php';

                                $harga = '';
//if (isset($_GET['namaT'])) {
//    $harga = get_harga_by_namaT($_GET['namaT']);
//}
//                                $pilih = $_POST['pilihTindakan'];
//                                if(isset($_POST['pilihTindakan'])) {
//                                    $harga = get_harga_by_idT($pilih);
//                                }
                                ?>

                                <input type="text" name="harga_tindakan" class="form-control" id="inputHarga" placeholder="Harga" value="<?php echo $harga; ?>">
                            </div>
                            <div class="col-sm-4">
                                <!--<a href="#" role="button" id="tambahbtn"class="btn btn-info">Tambah Tindakan</a>-->
                                <input name="btntambah" type="submit" style="cursor:pointer;" class="btn btn-info" value=" Tambah Tindakan " />

                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                </div>




                </form>
                <div class="col-sm-offset-3 col-sm-9">

                    <a href='tambah_rawatjalan.php?id=<?php echo $dataKodek;?>'class="btn btn-info">Simpan</a>

                </div>

                <div class="row col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3">
                    <h2 class="sub-header">Daftar Tindakan</h2>
                    <div class="table" >
                        <table id="tabelku" class="table table-hover table-bordered" >
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
                                $query = mysql_query("select * from tmp_tindakan_medis  p INNER JOIN daftar_tindakan u ON p.id_tindakan = u.id_tindakan");
                                $no = 0;
                                while ($hasil = mysql_fetch_array($query)) {
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
                <script type="text/javascript" >
                    $(document).ready(function() {
                        $('#tabelku').dataTable();
                    });
                    
                    //auto complete diagnosis, minLength = minimal user mengetik 
                    $(function() {
                        $("#inputDiagnosis").autocomplete({
                            source: "data.php",
                            minLength: 1,
                        });
                    });

                    $('#daftarTindakan').change(function() {
                        var daftar = document.getElementById('daftarTindakan');
                        var harga = document.getElementById('inputHarga');
                        id = daftar.options[daftar.selectedIndex].value;
                        $.ajax({
                            url: 'ajax.php',
                            type: 'POST',
                            data: {
                                id_tindakan: id,
                            },
                            success: function(result) {
                                harga.value = result;
                            }
                        });
                    });

                    $('#inputNoRM').keyup(function() {
                        var noRM = $(this).val();

                        $.ajax({
                            url: 'ajaxnama.php',
                            type: 'POST',
                            data: {
                                noRM: noRM,
                            },
                            success: function(result) {
                                var nama = JSON.parse(result);
                                if (nama != '') {
                                    $('#inputNama').val(nama);
                                }
                            }
                        });
                    });

                </script>

            </div>
        </div>
    </div>
</body>
</html>


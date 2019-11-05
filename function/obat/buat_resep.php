<?php
$arrActive['buat_resep'] = 'active';
session_start();
include '../../koneksi.php';
require '../../library/library.php';
if (!isset($_SESSION['level'])) {
    header('location:../../index.php');
}
if (isset($_GET['id_kunjungan'])) {
    $id_kunjungan = $_GET['id_kunjungan'];
    $_SESSION['id_kunjungan'] = $_GET['id_kunjungan'];
} else {
    $id_kunjungan = '';
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title><?=namaKlinik2()?></title>
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="../../css/dataTables.bootstrap.css">
        <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../js/dataTables.bootstrap.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">

            <div class="container-fluid" style="background-color:#5bc0de">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color:white"><?=namaKlinik2()?></a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><?php echo $_SESSION['cabang']; ?></a></li>
                        <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
                        <li><a href="../../login.php?aksi=logout">Log Out</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <!--sidebar-->
                <div class="col-sm-3  sidebar">
                    <?php include './need/sidebar.php'; ?>
                </div>

                <!--main body-->
                <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 main">
                    <h1 class="page-header">Pembuatan Resep</h1>
                    <form class="form-horizontal" name="addResep" action="need/proses.php" method="post"  >
                        <!--bagian kunjungan-->
                        <h2 class="sub-header">Kunjungan</h2>
                        <?php
                        $noResep = buatKode("resep", "R");
                        $query = mysqli_query($koneksi, "SELECT kunjungan.no_rm, pasien_b.nm_pasien FROM kunjungan INNER JOIN pasien_b ON kunjungan.no_rm = pasien_b.no_rm WHERE kunjungan.id_kunjungan = '$id_kunjungan'");
                        while ($result = mysqli_fetch_array($query)) {
                            $no_rm = $result['no_rm'];
                            $nama = $result['nm_pasien'];
                        }
                        ?>
                        <!--input data dari kunjungan-->
                        <div class="form-group">
                            <label for="inputNoResep" class="col-sm-3 control-label">No Resep</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputNoResep" placeholder="No Resep" readonly="" name="id_resep" value="<?php echo $noResep; ?>">
                            </div>
                        </div>
                        <div class="form-group form-horizontal">
                            <label for="inputIdKunjungan" class="col-sm-3 control-label">No Kunjungan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputIdKunjungan" placeholder="No Kunjungan" name="id_kunjungan" readonly="" value="<?php echo isset($id_kunjungan) ? $id_kunjungan : ''; ?>">
                            </div>
                            <div class="col-sm-4">
                                <a href="../data_rawatjalan.php" role="button" class="btn btn-info">Data Kunjungan</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="col-sm-3 control-label">Nama Pasien</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputNama" placeholder="Nama Pasien" readonly="" name="nama_pasien" value="<?php echo isset($nama) ? $nama : ''; ?>">
                            </div>

                        </div>

                        <!--memilih obat untuk resep-->
                        <h2 class="sub-header">Pilih Obat</h2>
                        <!--memilih petugas sesuai dengan saat rawat jalan-->
                        <div class="form-group">
                            <label for="inputPetugas" class="col-sm-3 control-label">Petugas Kesehatan</label>
                            <div class="col-sm-9">

                                <select name="pilihPetugas" class="form-control">
                                    <option value="KOSONG">......</option>
                                    <?php
                                    $dataPetugas = isset($_POST['pilihPetugas']) ? $_POST['pilihPetugas'] : '';
                                    $bacaSql = mysqli_query($koneksi, "SELECT * FROM tindakan_medis tm LEFT JOIN petugas_kesehatan pk ON pk.id_petugas = tm.id_petugas WHERE tm.id_kunjungan = '$id_kunjungan'");

                                    while ($bacaData = mysqli_fetch_array($bacaSql)) {
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
                        <!--mengambil obat yang ada didatabase-->
                        <div class="form-group">
                            <label for="inputObat" class="col-sm-3 control-label">Nama Obat</label>
                            <div class="col-sm-9">
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
                        <div class="form-group">
                            <label for="inputHarga" class="col-sm-3 control-label">Harga</label>
                            <?php
                            include './need/function.php';
                            $stok = '';
                            ?>
                            <div class="col-sm-5 form-horizontal">
                                <input type="text" name="harga_jual" class="form-control" id="inputHarga" placeholder="Harga" readonly="" value="">
                            </div>
                            <label for="inputStok" class="col-sm-1 control-label">Stok</label>
                            <div class="col-sm-3">
                                <input type="text" name="stok" class="form-control" id="stok" placeholder="Stok" readonly="" value="">

                            </div>
                        </div>
                        <!--mengambil obat dari stok (sementara sebelum klik buat resep)-->
                        <div class="form-group">
                            <label for="inputJumlahObat" class="col-sm-3 control-label">Jumlah Obat</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="jumlah_obat" id="inputJumlahObat" placeholder="Jumlah Obat" min="1">
                            </div>
                        </div>
                        <!--drop down aturan pakai-->
                        <div class="form-group">
                            <label for="inputAturan" class="col-sm-3 control-label" required="">Aturan Pakai</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="aturan">
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
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input id="btntambah" name="btntambah" type="submit" style="cursor:pointer;" class="btn btn-info" value=" Tambahkan Obat " />

                                <input id="btnsimpan" name="btnsimpan" type="submit" style="cursor:pointer;" class="btn btn-primary" value=" buat resep " />
                            </div>
                        </div>
                    </form>
                    <!--bagian detail resep (simpanan sementara sebelum dibuat fix resep)-->
                    <h2 class="sub-header">Detail Resep</h2>
                    <div class="row">
                        <div class="table" >
                            <table id="data" class="table display responsive compact" >
                                <thead >
                                    <tr>
                                        <th>No.</th>
                                        <th>Id Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Jumlah Obat</th>
                                        <th>Aturan Pakai</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <!--isi detail dari obat yang ditambahkan-->
                                <tbody id="myTable">
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM tmp_detail_resep tmp INNER JOIN obat o ON tmp.id_obat = o.id_obat");
                                    $no = 0;
                                    $harga = 0;
                                    while ($hasil = mysqli_fetch_array($query)) {
                                        $no++;
                                        echo "<tr>
                                        <td>" . $no . "</td>
                                        <td>" . $hasil['id_obat'] . "</td>
                                        <td>" . $hasil['nama_dagang'] . "</td>
                                        <td>" . $hasil['jumlah_obat'] . "</td>
                                        <td>" . $hasil['aturan_pakai'] . "</td>
                                        <td><a href='need/proses.php?delete=" . $hasil['id_tmp_dr'] . "'>Delete</a></td>
                                    </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script type="text/javascript" >
                        //buat tabel agar menjadi seperti di data
//                        $(document).ready(function() {
//                            var table = $('#data').DataTable();
//                            new $.fn.dataTable.AutoFill(table);
//
                        //                        });

                        // ambil harga
                        $('#daftarObat').change(function() {
                            var daftar = document.getElementById('daftarObat');
                            var harga = document.getElementById('inputHarga');


                            id = daftar.options[daftar.selectedIndex].value;
                            $.ajax({
                                url: 'need/ajax.php',
                                type: 'POST',
                                data: {
                                    id_obat: id,
                                },
                                success: function(result) {
                                    harga.value = result;

                                }
                            });
                        });

                        //ambil stok
                        $('#daftarObat').change(function() {
                            var daftar = document.getElementById('daftarObat');
                            var stok = document.getElementById('stok');
                            var jml = document.getElementById('inputJumlahObat');
                            id = daftar.options[daftar.selectedIndex].value;
                            $.ajax({
                                url: 'need/ajax.php',
                                type: 'POST',
                                data: {
                                    id_o: id,
                                },
                                success: function(result) {
                                    stok.value = result;
                                    jml.max = result;
                                }
                            });
                        });

                    </script>
                </div>
            </div>
        </div>
    </body>
</html>

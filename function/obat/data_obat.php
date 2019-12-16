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
    <title><?= namaKlinik2() ?></title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../../css/dataTables.tableTools.css">
    <link rel="stylesheet" type="text/css" href="../../css/dataTables.colVis.css">
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../../js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="../../js/dataTables.tableTools.js"></script>
    <script type="text/javascript" src="../../js/dataTables.colVis.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">

        <div class="container-fluid" style="background-color:#5bc0de">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color:white"><?= namaKlinik2() ?></a>
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
            <?php include './need/sidebar.php'; ?>

            <div class="main">
                <h4 class="page-header">Data Obat & Stok</h4>

                <div class="row">
                    <a class="btn btn-info" data-toggle="modal" data-target="#ModalTambah">Tambah</a>
                    <div class="table">
                        <table id="data" class="table table-hover display responsive compact" cellspacing="0" width="100%">
                            <thead>
                                <tr>
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

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        var table = $('#data').DataTable({
                            columnDefs: [{
                                orderable: false,
                                targets: [7]
                            }],
                            language: {
                                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                                "sProcessing": "Sedang memproses...",
                                "sLengthMenu": "Tampilkan _MENU_ entri",
                                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                                "sInfoPostFix": "",
                                "sSearch": "Cari:",
                                "sUrl": "",
                                "oPaginate": {
                                    "sFirst": "Pertama",
                                    "sPrevious": "Sebelumnya",
                                    "sNext": "Selanjutnya",
                                    "sLast": "Terakhir"
                                }
                            },
                            'order': [
                                [1, "desc"]
                            ],
                            'processing': true,
                            'serverSide': true,
                            'serverMethod': 'post',
                            'ajax': {
                                'url': 'ajaxdtob.php',
                            },
                            'columns': [{
                                    data: 'id_obat'
                                },
                                {
                                    data: 'cabang'
                                },
                                {
                                    data: 'nama_obat'
                                },
                                {
                                    data: 'nama_dagang'
                                },
                                {
                                    data: 'harga_beli',
                                    render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                },
                                {
                                    data: 'harga_jual',
                                    render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                },
                                {
                                    data: 'stok',
                                },
                                {
                                    data: 'edit',
                                }
                            ]
                        });

                        $('#tgl2').on('dp.change', function() {
                            table.draw(true);
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="tutup()" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="exampleModalLabel">Edit Obat</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="height: 26px;">
                        <label for="idObat" class="col-sm-3 control-label">Id Obat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="idObat" id="inputIdObat" placeholder="Id Obat" value="" readonly />
                        </div>
                    </div>
                    <div class="form-group" style="height: 26px;">
                        <label for="inputNamaObat" class="col-sm-3 control-label">Nama Obat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="namaObat" id="inputNamaObat" placeholder="Nama Obat" value="" required />
                        </div>
                    </div>
                    <div class="form-group" style="height: 26px;">
                        <label for="inputNamaDagang" class="col-sm-3 control-label">Nama Dagang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="namaDagang" id="inputNamaDagang" placeholder="Nama Dagang Obat" value="" required />
                        </div>
                    </div>
                    <div class="form-group" style="height: 26px;">
                        <label for="inputHargaBeli" class="col-sm-3 control-label">Harga Beli</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="hargaBeli" id="inputHargaBeli" placeholder="Harga Beli /box" value="" required />
                        </div>
                    </div>
                    <div class="form-group" style="height: 26px;">
                        <label for="inputHargaJual" class="col-sm-3 control-label">Harga Jual</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="hargaJual" id="inputHargaJual" placeholder="Harga Jual /biji" value="" required />
                        </div>
                    </div>
                    <div class="form-group" style="height: 26px;">
                        <label for="inputStok" class="col-sm-3 control-label">Jumlah Obat</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="stok" id="inputJumlahObat" placeholder="Jumlah Obat/Stok" value="" required />
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
        $('#ModalEdit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this);
            var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "ajaxeo.php",
                dataType: "json",
                data: dataString,
                success: function(data) {
                    $('#inputIdObat').val(data['id_obat']);
                    $('#inputNamaObat').val(data['nama_obat']);
                    $('#inputNamaDagang').val(data['nama_dagang']);
                    $('#inputHargaBeli').val(data['harga_beli']);
                    $('#inputHargaJual').val(data['harga_jual']);
                    $('#inputJumlahObat').val(data['stok']);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });

        $('#submit').click(function() {
            var idob = $('#inputIdObat').val();
            var nmob = $('#inputNamaObat').val();
            var nmdg = $('#inputNamaDagang').val();
            var hrbl = $('#inputHargaBeli').val();
            var hrjl = $('#inputHargaJual').val();
            var jmob = $('#inputJumlahObat').val();
            var aksi = 'editObat';

            var dataString = 'id=' + idob + '&nmob=' + nmob + '&nmdg=' + nmdg + '&hrbl=' + hrbl + '&hrjl=' + hrjl + '&jmob=' + jmob + '&aksi=' + aksi;
            $.ajax({
                type: 'post',
                url: 'need/proses.php',
                data: dataString,
                success: function(data) {
                    console.log('update_sukses');
                    $('#data').DataTable().ajax.reload();
                    $('#ModalEdit').modal('hide');
                }
            })
        });

        function tutup() {
            $('#ModalEdit').modal('hide');
        }
    </script>
    <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="tutup()" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="exampleModalLabel">Tambah Obat</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="height: 26px;">
                        <label for="idObat" class="col-sm-3 control-label">Id Obat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="idObat" id="inputIdObatT" placeholder="Id Obat" value="" readonly />
                        </div>
                    </div>
                    <div class="form-group" style="height: 26px;">
                        <label for="inputNamaObat" class="col-sm-3 control-label">Nama Obat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="namaObat" id="inputNamaObatT" placeholder="Nama Obat" value="" required />
                        </div>
                    </div>
                    <div class="form-group" style="height: 26px;">
                        <label for="inputNamaDagang" class="col-sm-3 control-label">Nama Dagang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="namaDagang" id="inputNamaDagangT" placeholder="Nama Dagang Obat" value="" required />
                        </div>
                    </div>
                    <div class="form-group" style="height: 26px;">
                        <label for="inputHargaBeli" class="col-sm-3 control-label">Harga Beli</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="hargaBeli" id="inputHargaBeliT" placeholder="Harga Beli /box" value="" required />
                        </div>
                    </div>
                    <div class="form-group" style="height: 26px;">
                        <label for="inputHargaJual" class="col-sm-3 control-label">Harga Jual</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="hargaJual" id="inputHargaJualT" placeholder="Harga Jual /biji" value="" required />
                        </div>
                    </div>
                    <div class="form-group" style="height: 26px;">
                        <label for="inputStok" class="col-sm-3 control-label">Jumlah Obat</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="stok" id="inputJumlahObatT" placeholder="Jumlah Obat/Stok" value="" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="ttp()">Batal</button>
                    <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#simpan').click(function() {
            var idob = $('#inputIdObatT').val();
            var nmob = $('#inputNamaObatT').val();
            var nmdg = $('#inputNamaDagangT').val();
            var hrbl = $('#inputHargaBeliT').val();
            var hrjl = $('#inputHargaJualT').val();
            var jmob = $('#inputJumlahObatT').val();
            var aksi = 'tambah';

            var dataString = 'id=' + idob + '&nmob=' + nmob + '&nmdg=' + nmdg + '&hrbl=' + hrbl + '&hrjl=' + hrjl + '&jmob=' + jmob + '&aksi=' + aksi;

            $.ajax({
                type: 'post',
                url: 'need/proses.php',
                data: dataString,
                success: function(data) {
                    console.log('Simpan data berhasil');
                    $('#data').DataTable().ajax.reload();
                    $('#ModalTambah').modal('hide');
                }
            })
        })

        function ttp() {
            $('#ModalTambah').modal('hide');
        }
    </script>
</body>

</html>
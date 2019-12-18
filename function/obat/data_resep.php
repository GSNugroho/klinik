<?php
$arrActive['data_resep'] = 'active';
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
    <link rel="stylesheet" type="text/css" href="../../datepicker/css/ilmudetil.css">
    <link rel="stylesheet" type="text/css" href="../../datepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="../../../css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../../css/dataTables.tableTools.css">
    <link rel="stylesheet" type="text/css" href="../../css/dataTables.colVis.css">

    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script src="../../datepicker/js/moment-with-locales.js"></script>
    <script src="../../datepicker/js/bootstrap-datetimepicker.js"></script>
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
                <h4 class="page-header">Data Resep</h4>

                <div class="row">
                    <table style="position: relative;">
                        <tr>
                            <td>
                                <input type="text" name="tgl1" id="tgl1" class="form-control" placeholder="dd-mm-yyyy">
                            </td>
                            <td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
                            <td>
                                <input type="text" name="tgl2" id="tgl2" class="form-control" placeholder="dd-mm-yyyy">
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div class="table">
                        <table id="datare" class="table hover display responsive compact" cellspace="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No Resep</th>
                                    <th>No Kunjungan</th>
                                    <th>No RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Nama User</th>
                                    <th>Tanggal Resep</th>
                                    <th>Harga Resep</th>
                                    <th>Diskon Harga</th>
                                    <th>Total Harga</th>
                                    <th>Detail</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        var table = $('#datare').DataTable({
                            columnDefs: [{
                                orderable: false,
                                targets: [8, 9]
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
                            'processing': true,
                            'serverSide': true,
                            'serverMethod': 'post',
                            'ajax': {
                                'url': 'ajaxdtre.php',
                                'data': function(data) {
                                    var awal = $('#tgl1').val();
                                    var akhir = $('#tgl2').val();

                                    data.searchByAwal = awal;
                                    data.searchByAkhir = akhir;
                                }
                            },
                            'order':[
                                [1, "desc"]
                            ],
                            'columns': [
                                {
                                    data: 'id_resep'
                                },
                                {
                                    data: 'id_kunjungan'
                                },
                                {
                                    data: 'no_rm'
                                },
                                {
                                    data: 'nm_pasien'
                                },
                                {
                                    data: 'username'
                                },
                                {
                                    data: 'tgl_trs'
                                },
                                {
                                    data: 'biaya_resep',
                                    render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                },
                                {
                                    data: 'diskon_resep',
                                    render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                },
                                {
                                    data: 'total_resep',
                                    render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
                                },
                                {
                                    data: 'detail'
                                },
                                {
                                    data: 'cetak'
                                }
                            ]
                        });
                        $('#tgl2').on('dp.change', function() {
                            table.draw(true);
                        });
                    });

                    $('#tgl1').datetimepicker({locale: 'id', format: 'DD-MM-YYYY'});
                    $('#tgl2').datetimepicker({locale: 'id', format: 'DD-MM-YYYY'});
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
                                    var dataString = 'id=' + recipient;

                                    $.ajax({
                                        type: 'post',
                                        url: 'ajaxdtlre.php',
                                        data: dataString,
                                        beforeSend: function(e) {
                                            if (e && e.overrideMimeType) {
                                                e.overrideMimeType("application/json;charset=UTF-8");
                                            }
                                        },
                                        success: function(response) {
                                            $("#tabelDetail").html(response.detail).show();
                                        }
                                    })
                                })

                                function ttpdetail() {
                                    $('#ModalDetail').modal('hide');
                                }
                            </script>
                        </div>
                    </div>
                </div>
</body>

</html>
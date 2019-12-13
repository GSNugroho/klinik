<?php
session_start();
include 'koneksi.php';
include 'library/library.php';
if (!isset($_SESSION['level'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>

<html>

<head>
    <title><?= nmKlinik() ?></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <script src="assets/highchart/highcharts.js"></script>
    <script src="assets/highchart/themes/my_theme.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">

        <div class="container-fluid" style="background-color:#5bc0de">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" style="color:white">Klinik Pratama Panti Waluyo Surakarta</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><?php echo $_SESSION['cabang']; ?></a></li>
                    <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="login.php?aksi=logout">Log Out</a></li>
                </ul>
            </div>

        </div>
    </nav>
    <div class="container-fluid">
        <div class="col-md-12 main">
            <div class="col-sm-9 col-sm-offset-1 center">
                <h3 class="page-header" style="text-align: center">Selamat bekerja <?php echo $_SESSION['username']; ?> <span class="glyphicon glyphicon-thumbs-up"></span></h3>
            </div>
            <div class="col-sm-9 col-sm-offset-1 center">
                <div class="center">
                    <?php
                    // memulai session
                    //session_start();
                    error_reporting(0);
                    if (isset($_SESSION['level'])) { { ?>
                            <a href="function/data_rawatjalan_hr.php"><button type="button" class="btn btn-primary">Rawat Jalan</button></a>
                            <a href="function/obat/data_resep.php"><button type="button" class="btn btn-default">Penjualan Obat</button></a>
                            
                    <?php }
                    }
                    if (!isset($_SESSION['level'])) {
                        header('location:index.php');
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title" style="text-align: center">Grafik Kunjungan Harian</div>
                        </div>
                        <div class="panel-body">
                            <div id="hariChart" style="min-width: 315px; height: 400px; max-width:600px; margin:0 auto"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title" style="text-align: center">Grafik Kunjungan Bulanan</div>
                        </div>
                        <div class="panel-body">
                            <div id="bulanChart" style="min-width: 315px; height:400px; max-width: 600px; margin:0 auto"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                Highcharts.chart('hariChart', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.y}</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    legend: {
                        enabled: true,
                        align: 'center',
                        // width: '800px',
                        verticalAlign: 'bottom',
                        // margin: 130,
                        // useHTML: true,
                        float: 'left',
                        labelFormatter: function() {
                            return ' ' + this.name + ' : ' + this.percentage.toFixed(1) + '% (' + this.y + ')';
                        }
                    },
                    series: [{
                        name: 'Jumlah Kunjungan',
                        colorByPoint: true,
                        data: [
                            <?php
                            $query = mysqli_query($koneksi, "SELECT DISTINCT poliklinik, COUNT(*) as total FROM kunjungan WHERE DAY(tgl_periksa) = DAY(NOW()) AND MONTH(tgl_periksa) = MONTH(NOW()) GROUP BY poliklinik");
                            while ($data = mysqli_fetch_array($query)) {
                                echo "{name: '" . $data['poliklinik'] . "', y: " . $data['total'] . "},";
                            }
                            ?>
                        ]
                    }]
                });

                Highcharts.chart('bulanChart', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: ''
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.y}</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    legend: {
                        enabled: true,
                        align: 'center',
                        // width: '800px',
                        verticalAlign: 'bottom',
                        // margin: 130,
                        // useHTML: true,
                        float: 'left',
                        labelFormatter: function() {
                            return ' ' + this.name + ' : ' + this.percentage.toFixed(1) + '% (' + this.y + ')';
                        }
                    },
                    series: [{
                        name: 'Jumlah Kunjungan',
                        colorByPoint: true,
                        data: [
                            <?php
                            $query = mysqli_query($koneksi, "SELECT DISTINCT poliklinik, COUNT(*) as total FROM kunjungan WHERE MONTH(tgl_periksa) = MONTH(NOW()) GROUP BY poliklinik");
                            while ($data = mysqli_fetch_array($query)) {
                                echo "{name: '" . $data['poliklinik'] . "', y: " . $data['total'] . "},";
                            }
                            ?>
                        ]
                    }]
                });
            </script>
        </div>
    </div>
</body>

</html>
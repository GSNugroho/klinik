<?php
session_start();
include '../../../koneksi.php';
include '../../../library/library.php';
if (!isset($_SESSION['level'])) {
    header('location:../../../../index.php');
}
$id_kunjungan;
if (isset($_GET['id_resep'])) {
    $id_resep = $_GET['id_resep'];
} else {
//    $id_resep = $_GET['id_resep'];
    header('location:../data_resep.php');
}

$query = mysqli_query($koneksi, "SELECT * FROM resep r "
        . "LEFT JOIN detail_resep dr ON r.id_resep = dr.id_resep "
        . "LEFT JOIN obat o ON dr.id_obat = o.id_obat "
        . "LEFT JOIN kunjungan k ON r.id_kunjungan = k.id_kunjungan "
        . "LEFT JOIN user u ON k.id_user = u.id_user "
        . "LEFT JOIN petugas_kesehatan pk ON dr.id_petugas = pk.id_petugas "
        . "LEFT JOIN pasien_b p ON k.no_rm = p.no_rm WHERE r.id_resep = '$id_resep'") or die(mysqli_error($koneksi));
$hasil = mysqli_fetch_array($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Cetak Detail Resep - <?=namaKlinik3()?></title>
        <link href="../../../css/styles_cetak.css" rel="stylesheet" type="text/css">
            <script type="text/javascript">
                window.print();
                window.onfocus = function() {
                    window.close();
                }
            </script>
    </head>
    <body onLoad="window.print()">
        <table class="table-list" width="520" border="0" cellspacing="0" cellpadding="2">
            <tr>
                <td height="87" colspan="6" align="center"><p><strong><?=namaKlinik3()?></strong><br />
                        <br />
                        Rincian Resep Pelayanan Rawat Jalan</p>    </td>
            </tr>
            <tr>
                <td width="62"><strong>Id Kunjungan </strong></td>
                <td width="13">:</td>
                <td><?php echo $hasil['id_kunjungan']; ?></td>
                <td colspan="4" align="right">Surakarta, <?php echo IndonesiaTgl($hasil['tgl_periksa']); ?></td>
            </tr>
            <tr>
                <td width="62"><strong>Id Resep </strong></td>
                <td width="13">:</td>
                <td><?php echo $hasil['id_resep']; ?></td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>No. RM </td>
                <td>:</td>
                <td><?php echo $hasil['no_rm']; ?></td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="6">Pasien   : <?php echo $hasil['nm_pasien']; ?></td>
            </tr>
            <tr>
                <td colspan="6">User     : <?php echo $hasil['username']; ?></td>
            </tr>
            <tr>
                <td colspan="6">Cabang   : <?php echo $hasil['cabang']; ?><br /></td>
            </tr>

            <tr>
                <td colspan="1"  bgcolor="#F5F5F5"><strong>No</strong></td>
                <td width="226" bgcolor="#F5F5F5"><strong>Petugas Kesehatan</strong></td>
                <td width="266" bgcolor="#F5F5F5"><strong>Daftar Obat </strong></td>
                <td width="100" bgcolor="#F5F5F5"><strong>Jumlah Obat </strong></td>
                <td width="100" align="right" bgcolor="#F5F5F5"><strong>Harga</strong></td>
                <td width="100" align="right" bgcolor="#F5F5F5"><strong>Total Harga</strong></td>
            </tr>
            <?php

            $query = mysqli_query($koneksi, "SELECT * FROM resep r "
                    . "LEFT JOIN detail_resep dr ON r.id_resep = dr.id_resep "
                    . "LEFT JOIN obat o ON dr.id_obat = o.id_obat "
                    . "LEFT JOIN petugas_kesehatan pk ON dr.id_petugas = pk.id_petugas "
                    . "LEFT JOIN kunjungan k ON r.id_kunjungan = k.id_kunjungan "
                    . "LEFT JOIN pasien_b p ON k.no_rm = p.no_rm WHERE r.id_resep = '$id_resep'") or die(mysqli_error($koneksi));
            $no = 0;
            while ($detail = mysqli_fetch_array($query)) {
                $no++;
                $biaya_resep = $detail['biaya_resep']
                ?>
                <tr>
                    <td colspan="1"><?php echo $no; ?></td>
                    <td><?php echo $detail['nama_petugas']; ?></td>
                    <td><?php echo $detail['nama_dagang']; ?></td>
                    <td><?php echo $detail['jumlah_obat']; ?></td>
                    <td align="right"><?php echo format_angka($detail['harga_jual']); ?></td>
                    <td align="right"><?php echo format_angka(($detail['harga_jual'] * $detail['jumlah_obat'])); ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="5" align="right"><strong>Total Biaya Resep (Rp) : </strong></td>
                <td align="right"><?php echo format_angka($biaya_resep); ?></td>
            </tr>


        </table>
    </body>
</html>

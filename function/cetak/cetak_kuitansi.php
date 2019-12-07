<?php
session_start();
include '../../koneksi.php';
include '../../library/library.php';
if (!isset($_SESSION['level'])) {
    header('location:../../../index.php');
}
$id_kunjungan;
if (isset($_GET['i'])) {
    $id_kunjungan = $_GET['i'];
} else {
    echo 'asdasd';
}

$query = mysqli_query($koneksi, "SELECT kuitansi.*, kunjungan.*, user.* FROM kuitansi
                    LEFT JOIN kunjungan ON kuitansi.id_kunjungan = kunjungan.id_kunjungan
                    LEFT JOIN user ON kuitansi.id_user = user.id_user
                    WHERE kunjungan.id_kunjungan = '".$id_kunjungan."'") or die(mysqli_error($koneksi));
$kolomData = mysqli_fetch_array($query);
$no_rm = $kolomData['no_rm'];
$query_pasien = mysqli_query($koneksi, "SELECT nm_pasien FROM pasien_b where no_rm='$no_rm'");
$data = mysqli_fetch_array($query_pasien);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Cetak Kuitansi Rawat Jalan - <?=namaKlinik2()?></title>
 <link href="../../css/styles_cetak.css" rel="stylesheet" type="text/css">
            <script type="text/javascript">
                window.print();
                window.onfocus = function() {
                    window.close();
                }
            </script>
    </head>
    <body onLoad="window.print()">
        <table class="table-list" width="216px" border="0" cellspacing="0" cellpadding="2">
            <tr>
                <td height="87" colspan="5" align="center"><p><strong><?=namaKlinik2()?> </strong><br />
                        <br />
                        Kuitansi Pelayanan Rawat Jalan</p>    </td>
            </tr>
            <tr>
                <td><strong>No. Kuitansi </strong></td>
                <td>:</td>
                <td><?php echo $kolomData['id_kuitansi']; ?></td>
                <td colspan="2" align="right">Surakarta, <?php echo IndonesiaTgl($kolomData['tgl_periksa']); ?></td>
            </tr>
            <tr>
                <td>Id Kunjungan </td>
                <td>:</td>
                <td colspan="3"><?php echo $kolomData['id_kunjungan']; ?></td>
                
            </tr>
            <tr>
                <td>Id Resep </td>
                <td>:</td>
                <td colspan="3"><?php echo $kolomData['id_resep']; ?></td>
            </tr>
            <tr>
                <td>No. RM </td>
                <td>:</td>
                <td colspan="3"><?php echo $kolomData['no_rm']; ?></td>
            </tr>
           <tr>
                <td>Pasien </td>
                <td>:</td>
                <td colspan="3"><?php echo $data['nm_pasien']; ?></td>
            </tr>
            <tr>
                <td>User </td>
                <td>:</td>
                <td colspan="3"><?php echo $kolomData['nama_user']; ?></td>
            </tr>
            <tr>
                <td>Cabang </td>
                <td>:</td>
                <td colspan="3"><?php echo $kolomData['cabang']; ?></td>
            </tr> 
           
               
            <tr>
                <td bgcolor="#F5F5F5"><strong><br/>No.</strong></td>
                <td colspan="3" bgcolor="#F5F5F5"><strong><br/>Pelayanan</strong></td>
                <td align="right" bgcolor="#F5F5F5"><strong><br/>Harga</strong></td>
            </tr>
            <?php
# Baca variabel
//            $totalBayar = 0;
//            $uangKembali = 0;

            $query = mysqli_query($koneksi, "SELECT kunjungan.no_rm, kunjungan.biaya_periksa, resep.biaya_resep, (kunjungan.diskon_tindakan+resep.diskon_resep) as total_diskon, (kunjungan.total_tindakan+resep.total_resep) as total_bayar FROM kunjungan
            JOIN resep ON kunjungan.id_kunjungan = resep.id_kunjungan WHERE kunjungan.id_kunjungan = '".$id_kunjungan."'") or die(mysqli_error($koneksi));
            $hasil = mysqli_fetch_array($query);
            ?>
            <tr>
                <td bgcolor="#F5F5F5">1.</td>
                <td colspan="3" bgcolor="#F5F5F5">Tindakan</td>
                <td  align="right" bgcolor="#F5F5F5"><?php echo format_angka($hasil['biaya_periksa']);?></td>
            </tr>
            <tr>
                <td bgcolor="#F5F5F5">2.</td>
                <td colspan="3" bgcolor="#F5F5F5">Resep</td>
                <td  align="right" bgcolor="#F5F5F5"><?php echo format_angka($hasil['biaya_resep']);?></td>
            </tr>
            <tr>
                <td bgcolor="#F5F5F5">3.</td>
                <td colspan="3" bgcolor="#F5F5F5">Total Diskon</td>
                <td  align="right" bgcolor="#F5F5F5"><?php echo format_angka($hasil['total_diskon']);?></td>
            </tr>
            <tr>
                <td colspan="4" align="right"><strong>Total Biaya (Rp) : </strong></td>
                <td align="right" bgcolor="#F5F5F5"><?php echo  format_angka($hasil['total_bayar']); ?></td>
            </tr>
            
            
        </table>
    </body>
</html>
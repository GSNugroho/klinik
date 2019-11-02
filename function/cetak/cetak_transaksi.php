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

$query = mysql_query("SELECT kunjungan.*, user.*, pasien.nama_pasien FROM kunjungan
                    LEFT JOIN user ON kunjungan.id_user = user.id_user
                    LEFT JOIN pasien ON kunjungan.no_rm = pasien.no_rm
                    WHERE kunjungan.id_kunjungan = '".$id_kunjungan."'") or die(mysql_error());
$kolomData = mysql_fetch_array($query);
//if(isset($_GET['id'])){
//    $idKunjungan = $_GET['id'];
//    
//    $query = mysql_query("select * from kunjungan p INNER JOIN user q ON p. id_user = q.id_user 
//        LEFT JOIN pasien s ON p.no_rm = s.no_rm
//        LEFT JOIN tindakan_medis p ON p.id_tm = t.id_tm
//        LEFT JOIN petugas u ON p.id_petugas = u.id_tm
//        LEFT JOIN daftar_tindakan p ON p.id_tindakan = v.id_tindakan
//        WHERE p.id_kunjungan = '".$id_kunjungan."');
//    
//}
//else{
//   
//    exit;
//}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Cetak Detail Tindakan Medis - <?=namaKlinik2()?></title>
 <link href="../../css/styles_cetak.css" rel="stylesheet" type="text/css">
            <script type="text/javascript">
                window.print();
                window.onfocus = function() {
                    window.close();
                }
            </script>
    </head>
    <body onLoad="window.print()">
        <table class="table-list" width="714" border="0" cellspacing="0" cellpadding="2">
            <tr>
                <td height="87" colspan="5" align="center"><p><strong><?=namaKlinik2()?> </strong><br />
                        <br />
                        Rincian Tindakan Pelayanan Rawat Jalan</p>    </td>
            </tr>
            <tr>
                <td><strong>Id Kunjungan </strong></td>
                <td>:</td>
                <td><?php echo $kolomData['id_kunjungan']; ?></td>
                <td colspan="2" align="right">Surakarta, <?php echo IndonesiaTgl($kolomData['tgl_periksa']); ?></td>
            </tr>
            <tr>
                <td>No. RM </td>
                <td>:</td>
                <td colspan="3"><?php echo $kolomData['no_rm']; ?></td>
            </tr>
            <tr>
                <td>Pasien </td>
                <td>:</td>
                <td colspan="3"><?php echo $kolomData['nama_pasien']; ?></td>
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
                <td colspan="2" bgcolor="#F5F5F5"><strong><br/>No</strong></td>
                <td width="266" bgcolor="#F5F5F5"><strong><br/>Daftar Tindakan </strong></td>
                <td width="226" bgcolor="#F5F5F5"><strong><br/>Petugas Kesehatan</strong></td>
                <td width="127" align="right" bgcolor="#F5F5F5"><strong>Harga</strong></td>
            </tr>
            <?php
# Baca variabel
//            $totalBayar = 0;
//            $uangKembali = 0;

            $query = mysql_query("SELECT tindakan_medis.*, petugas_kesehatan.nama_petugas, daftar_tindakan.* FROM tindakan_medis
                    LEFT JOIN petugas_kesehatan ON tindakan_medis.id_petugas = petugas_kesehatan.id_petugas
                    LEFT JOIN daftar_tindakan ON tindakan_medis.id_tindakan = daftar_tindakan.id_tindakan
                    WHERE tindakan_medis.id_kunjungan = '".$id_kunjungan."'") or die(mysql_error());
            $no = 0;
            while ($hasil = mysql_fetch_array($query)) {
                $no++;
                
                ?>
                <tr>
                    <td colspan="2"><?php echo $no; ?></td>
                    <td><?php echo $hasil['nama_tindakan']; ?></td>
                    <td><?php echo $hasil['nama_petugas']; ?></td>
                    <td align="right"><?php echo format_angka($hasil['harga_tindakan']); ?></td>
                </tr>
<?php } ?>
            <tr>
                <td colspan="4" align="right"><strong>Total Biaya Tindakan (Rp) : </strong></td>
                <td align="right" bgcolor="#F5F5F5"><?php echo  format_angka($kolomData['biaya_periksa']); ?></td>
            </tr>
            
            
        </table>
    </body>
</html>
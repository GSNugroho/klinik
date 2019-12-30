<nav>
    <ul id="menu">
        <li class="home"><a href="../home.php">Beranda</a></li>
        <li><a href="penambahan_pasien.php">Pendaftaran Pasien</a></li>
        <li><a href="data_pasien.php">Data Pasien</a></li>
        <li><a>Rawat Jalan
            <ul class="menus">
                <li class='has-submenu'><a href="data_rawatjalan_hr.php">Rawat Jalan Hari Ini</a></li>
                <li class='has-submenu'><a href="data_rawatjalan.php">Data Rawat Jalan</a></li>    
            </ul>
        </a></li>
        <li class="prem"><a>Laporan
            <ul class="menus">
                <li class="<?= $arrActive['laporanRawatJalan'] ?>"><a href="laporan_transaksi.php">Laporan Rawat Jalan</a></li>
                <li class="<?= $arrActive['laporanKuitansi'] ?>"><a href="laporan_kuitansi.php">Laporan Kuitansi</a></li>
            </ul>
        </a></li>
    </ul> 
</nav>
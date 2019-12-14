
<nav>
    <ul id="menu">
        <li class="home"><a href="../home.php">Beranda</a></li>
        <li><a href="penambahan_pasien.php">Pendaftaran Pasien</a></li>
        <!-- <li class="= //$arrActive['tambahPasienb'] "><a href="penambahan_pasien_b.php">Penambahan Pasien Umum</a></li> -->
        <li><a href="data_pasien.php">Data Pasien</a></li>
        <li><a>Rawat Jalan
            <ul class="menus">
                <li class='has-submenu'><a href="data_rawatjalan_hr.php">Rawat Jalan</a></li>
                <li class='has-submenu'><a href="data_rawatjalan.php">Data Rawat Jalan</a></li>    
            </ul>
        </a></li>
        <li class="prem"><a>Master
            <ul class="menus">
                <li class='has-submenu'><a class='prem' href='#' title='Dropdown 1'>Tindakan</a>
                    <ul class='submenu'>
                        <!-- <li class="<?php //$arrActive['tambahTindakan'] ?>"><a href="penambahan_tindakan.php">Penambahan Tindakan</a></li> -->
                        <li class="<?= $arrActive['dataTindakan'] ?>"><a href="data_tindakan.php">Data Tindakan</a></li>
                    </ul>
                </li>
                <li class='has-submenu'><a class='prem' href='#' title='Dropdown 1'>Petugas</a>
                    <ul class='submenu'>
                        <!-- <li class="<?php //$arrActive['tambahPetugas'] ?>"><a href="penambahan_petugas.php">Penambahan Petugas Kesehatan</a></li> -->
                        <li class="<?= $arrActive['dataPetugas'] ?>"><a href="data_petugas.php">Data Petugas Kesehatan</a></li>
                    </ul>
                </li>
                <li class='has-submenu'><a class='prem' href='#' title='Dropdown 1'>User</a>
                    <ul class='submenu'>
                        <li class="<?= $arrActive['tambahUser'] ?>"><a href="penambahan_user.php">Penambahan User</a></li>
                        <li class="<?= $arrActive['dataUser'] ?>"><a href="data_user.php">Data User</a></li>
                    </ul>
                </li>
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
-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2017 at 11:31 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balaipengobatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_tindakan`
--

CREATE TABLE `daftar_tindakan` (
  `id_tindakan` varchar(4) NOT NULL,
  `nama_tindakan` varchar(100) NOT NULL,
  `harga_tindakan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_tindakan`
--

INSERT INTO `daftar_tindakan` (`id_tindakan`, `nama_tindakan`, `harga_tindakan`) VALUES
('T001', 'Periksa', '8000'),
('T002', 'Medikasi Kecil', '15000'),
('T003', 'Medikasi Sedang', '20000'),
('T004', 'Medikasi Besar', '30000'),
('T005', 'KB Suntik 3 bulan', '17000'),
('T006', 'KB Suntik 1 bulan', '20000'),
('T007', 'Tumpatan gigi tetap SIK', '50000'),
('T008', 'Tumpatan gigi tetap RC', '70000'),
('T009', 'Pengobatan periodontal / tanpa tindakan', '10000'),
('T010', 'Pencabutan gigi tetap', '70000'),
('T011', 'Tumpatan gigi sulung', '50000'),
('T012', 'Tumpatan sementara', '30000'),
('T013', 'Pengobatan pulpa', '30000'),
('T014', 'Pencabutan gigi sulung dengan CE', '30000'),
('T015', 'Pencabutan gigi sulung dengan injeksi infiltrasi', '40000'),
('T016', 'Pengobatan abses / Trepanasi', '15000'),
('T017', 'Scaling', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id_detail_resep` int(11) NOT NULL,
  `id_obat` varchar(5) NOT NULL,
  `jumlah_obat` int(3) NOT NULL,
  `aturan_pakai` enum('1 kali sehari sebelum makan','2 kali sehari sebelum makan','3 kali sehari sebelum makan','1 kali sehari sesudah makan','2 kali sehari sesudah makan','3 kali sehari sesudah makan') NOT NULL,
  `id_resep` varchar(6) NOT NULL,
  `id_petugas` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id_diagnosis` varchar(8) NOT NULL,
  `nama_latin` varchar(200) NOT NULL,
  `nama_indonesia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id_diagnosis`, `nama_latin`, `nama_indonesia`) VALUES
('A 02.0  ', 'Salmonella enteritis                                                                                ', 'Gastroententis akut'),
('A 03.0  ', 'Shigollosis due to shigella Dysenteriae                                                             ', 'disentri'),
('B 01.9  ', 'Varicella without complication                                                                      ', 'varicela zooster'),
('B 02.9  ', 'Herpes Zoster without complication                                                                  ', 'herpes zooster'),
('E 14.9  ', 'DM, Unsp/Unspecified diabetes mellitus.                                                             ', 'diabetes mellitus'),
('E 75.9  ', 'DISLIPIDEMIA                                                                                        ', 'dislipidemia'),
('G 44.3  ', 'Chronic post traumatic headache/cephalgia post traumatic                                            ', 'observasi cephalgia'),
('I 10    ', 'Hypertension essential / Hipertensi', 'hipertensi'),
('I 95.0  ', 'Idiophatic hypotension                                                                              ', 'hipotensi'),
('J 00    ', 'Common cold/CC/Nasopharyngitis acute/rhinopharyngitis/ Influenza', 'ISPA'),
('K 02.1  ', 'Caries of dentine', 'karies gigi'),
('K 04.0', 'Pulpitis', 'pulpitis'),
('K 05.4', 'Periodontosis', 'periodontosis'),
('K 05.5', 'Other periodontal diseases', 'periodontal'),
('K 05.6', 'Periodontal disease, unspecified', 'sakit gigi'),
('K 25.9  ', 'Gastric ulcer unspecified as acute chronic, without haemorrhage or perforation                      ', 'dispepsia'),
('K 61.0  ', 'Abscess perianal/Anal abscess', 'abses gigi'),
('L 02.0  ', 'Cutaneous abscess,furuncle and carbuncle of face                                                    ', 'abses'),
('L 23.9  ', 'DKA/Allergic contact dermatitis,unsp./Atopy                                                         ', 'dermatitis kontak alergi'),
('M 19.9  ', 'Osteoarthrosis/Arthrosis,unsp.                                                                      ', 'osteoarthritis'),
('M 25.5  ', 'Arthralgia/Pain in joint                                                                            ', 'arteuralgia'),
('M 79.1  ', 'Myalgia                                                                                             ', 'myalgia'),
('N 91.0  ', 'Primary amenorhoe                                                                                   ', 'amenorhea'),
('R 06.0  ', 'Dyspnoea                                                                                            ', 'observasi dyspnew'),
('R 11    ', 'Vomiting/Nausea                                                                                     ', 'observasi vomities'),
('R 42    ', 'Vertigo/ pusing (Dizzines and giddines)/Cephalgia                                                   ', 'vertigo'),
('R 50.9  ', 'Fever,unsp./Febris                                                                                  ', 'observasi febris'),
('S 39.9  ', 'Unspecified injury of abdomen, lower back and pelvis/vertebra                                       ', 'low back  pain'),
('T 14.1  ', 'Vulnus Laceration                                                                                   ', 'vulnus laserasi');

-- --------------------------------------------------------

--
-- Table structure for table `kuitansi`
--

CREATE TABLE `kuitansi` (
  `id_kuitansi` varchar(7) NOT NULL,
  `id_kunjungan` varchar(8) NOT NULL,
  `id_user` varchar(4) NOT NULL,
  `id_resep` varchar(6) DEFAULT NULL,
  `biaya_periksa` varchar(10) NOT NULL,
  `biaya_resep` varchar(10) DEFAULT NULL,
  `total_bayar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` varchar(8) NOT NULL,
  `no_rm` varchar(8) NOT NULL,
  `id_user` varchar(4) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `biaya_periksa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nama_klinik`
--

CREATE TABLE `nama_klinik` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nama_klinik`
--

INSERT INTO `nama_klinik` (`id`, `nama`) VALUES
(1, 'Klinik Pratama Panti Waluyo Surakarta');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(5) NOT NULL,
  `id_user` varchar(4) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `nama_dagang` varchar(50) NOT NULL,
  `harga_beli` varchar(10) NOT NULL,
  `harga_jual` varchar(10) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `id_user`, `nama_obat`, `nama_dagang`, `harga_beli`, `harga_jual`, `stok`) VALUES
('O0001', 'U001', 'allopurinol', 'allopurinol', '24000', '300', 100),
('O0002', 'U001', 'acyclovir tablet', 'acyclovir tablet', '80000', '1000', 100),
('O0003', 'U001', 'ambroxol', 'ambroxol', '28000', '350', 90),
('O0004', 'U001', 'amplodipne 10mg', 'amplodipne 10mg', '144000', '1800', 100),
('O0005', 'U001', 'amplodipne 5mg', 'amplodipne 5mg', '80000', '1000', 100),
('O0006', 'U001', 'clindamycin 300mg', 'clindamycin 300mg', '52000', '1300', 50),
('O0007', 'U001', 'alprazolam tablet 0,5mg', 'alprazolam tablet 0,5mg', '80000', '1000', 100),
('O0008', 'U001', 'asam asetilsalisilat', 'aspilets', '64000', '800', 100),
('O0009', 'U001', 'parasetamol', 'itamol', '28000', '350', 100),
('O0010', 'U001', 'amoxicillin', 'dexymox forte', '60000', '750', 80),
('O0011', 'U001', 'antalgin 500mg', 'infalgin', '28000', '350', 100),
('O0012', 'U001', 'asam mefenamat', 'asam mefenamat', '28000', '350', 80),
('O0013', 'U001', 'methampyrone, diazepam', 'analsik', '120000', '1500', 100),
('O0014', 'U001', 'acyclovir 5% cream', 'acyclovir 5% cream', '40000', '5000', 9),
('O0015', 'U001', 'gentamycin 0,1%', 'gentamycin 0,1%', '8000', '5000', 10),
('O0016', 'U001', 'cefadroxil 500mg', 'cefadroxil 500mg', '88000', '1100', 100),
('O0017', 'U001', 'citerizin', 'citerizin', '52000', '650', 100),
('O0018', 'U001', 'domperidon', 'domperidon', '60000', '750', 100),
('O0019', 'U001', 'diltiazem', 'diltiazem', '28000', '350', 100),
('O0020', 'U001', 'dexamethasone', 'dexamethasone', '20000', '250', 90),
('O0021', 'U001', 'digoxin 0,25mg', 'digoxin 0,25mg', '28000', '350', 100),
('O0022', 'U001', 'activated attaplgite', 'diatabs', '60000', '750', 100),
('O0023', 'U001', 'asetaminofen, gliseril guaiacolat, fenilpropanlamin HCl, dekstrometorfan HBr, CTM', 'flucadex', '44000', '550', 100),
('O0024', 'U001', 'paracetamol, pseudoephedrine HCl, chlorphenamine maleate', 'demacolin', '44000', '550', 100),
('O0025', 'U001', 'curcuma', 'curcuma', '80000', '1000', 100),
('O0026', 'U001', 'paracetamol guaifenesin, CTM', 'anacetine', '26000', '6500', 5),
('O0027', 'U001', 'paracetamol', 'itamol sirup', '22000', '5500', 5),
('O0028', 'U001', 'cefixime', 'helixim kapsul', '36000', '1500', 30),
('O0029', 'U001', 'ibuprofen 400', 'ibuprofen 400', '24000', '300', 100),
('O0030', 'U001', 'captopril 25mg', 'farmoten 25', '28000', '350', 90),
('O0031', 'U001', 'omeprazole 20mg ', 'omeprazole 20mg ', '18000', '750', 30),
('O0032', 'U001', 'ibuprofen 400', 'farsifen', '26000', '6500', 5),
('O0033', 'U001', 'kaolin, pektin', 'guanistrep', '22000', '5500', 5),
('O0034', 'U001', 'Al hydroxide, Mg hidroxide, dimethicone', 'berlosid', '26000', '6500', 5),
('O0035', 'U001', 'amoxilin', 'yusimox', '26000', '6500', 5),
('O0036', 'U001', 'simvastatin', 'simvastatin', '44000', '550', 100),
('O0037', 'U001', 'spiramycin', 'spiramycin', '84000', '2100', 50),
('O0038', 'U001', 'methylpred', 'methylpred', '44000', '550', 100),
('O0039', 'U001', 'inalgestan', 'inalgestan', '108000', '1350', 100),
('O0040', 'U001', 'chlorpheniramine 4mg', 'chlorpheniramine 4mg', '80000', '100', 1000),
('O0041', 'U001', 'dexamethasone', 'jfidex 0,5', '80000', '100', 1000),
('O0042', 'U001', 'hydrocortisone', 'hydrocortisone', '20000', '5000', 5),
('O0043', 'U001', 'miconazole', 'miconazole', '20000', '5000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `no_rm` varchar(8) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `alamat_pasien` varchar(40) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir_pasien` date NOT NULL,
  `umur` int(3) NOT NULL,
  `jk_pasien` enum('laki-laki','perempuan') NOT NULL,
  `tgl_daftar` date NOT NULL,
  `id_user` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petugas_kesehatan`
--

CREATE TABLE `petugas_kesehatan` (
  `id_petugas` varchar(4) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `alamat_petugas` varchar(40) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir_petugas` date NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `poliklinik` enum('umum','gigi') NOT NULL,
  `id_user` varchar(4) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas_kesehatan`
--

INSERT INTO `petugas_kesehatan` (`id_petugas`, `nama_petugas`, `alamat_petugas`, `tempat_lahir`, `tgl_lahir_petugas`, `no_telp`, `poliklinik`, `id_user`, `status`) VALUES
('P001', 'dr. Alva Sinung Anindita', 'Surakarta', 'Surakarta', '1986-11-23', '085728545514', 'umum', 'U002', 'aktif'),
('P002', 'drg. Justina', 'Sumber Nayu', 'Surakarta', '1988-03-22', '085728545513', 'gigi', 'U002', 'aktif'),
('P003', 'Paryatun, AMKeb', 'Gulon', 'Surakarta', '1985-09-09', '085678567832', 'umum', 'U002', 'tidak aktif'),
('P004', 'Anastasia Dewi., AMKG', 'Bibis Luhur', 'Surakarta', '1988-03-20', '089432543698', 'gigi', 'U002', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` varchar(6) NOT NULL,
  `id_kunjungan` varchar(8) NOT NULL,
  `id_user` varchar(4) NOT NULL,
  `biaya_resep` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan_medis`
--

CREATE TABLE `tindakan_medis` (
  `id_tm` int(11) NOT NULL,
  `id_kunjungan` varchar(8) NOT NULL,
  `id_petugas` varchar(4) NOT NULL,
  `poliklinik` enum('umum','gigi') NOT NULL,
  `id_diagnosis` varchar(8) DEFAULT NULL,
  `id_tindakan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detail_resep`
--

CREATE TABLE `tmp_detail_resep` (
  `id_tmp_dr` int(11) NOT NULL,
  `id_resep` varchar(6) NOT NULL,
  `id_obat` varchar(5) NOT NULL,
  `jumlah_obat` int(3) NOT NULL,
  `aturan_pakai` enum('1 kali sehari sebelum makan','2 kali sehari sebelum makan','3 kali sehari sebelum makan','1 kali sehari sesudah makan','2 kali sehari sesudah makan','3 kali sehari sesudah makan') NOT NULL,
  `id_petugas` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_tindakan_medis`
--

CREATE TABLE `tmp_tindakan_medis` (
  `id_tmp_tm` int(11) NOT NULL,
  `poliklinik` enum('umum','gigi') NOT NULL,
  `id_diagnosis` varchar(8) DEFAULT NULL,
  `id_tindakan` varchar(4) NOT NULL,
  `id_petugas` varchar(4) NOT NULL,
  `id_kunjungan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(4) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `cabang` enum('Pusat','Pratama','Pedan','Juwiring') NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`, `cabang`, `status`) VALUES
('U001', 'yuli suprapto', 'yuli', '4a01a05a350e1c7710c989f1211245a8', 'admin', '', 'aktif'),
('U002', 'Mirra', 'mirra', '8e38239a2820c104db8107f7a06381e6', 'admin', 'Pusat', 'aktif'),
('U003', 'Paryatun', 'paryatun', '2c0bd9ca4565de4a7cb8e5c515da00f7', 'user', 'Pratama', 'aktif'),
('U004', 'Suprapto', 'suprapto', 'beb204ded84ba984ee5b74f4f4bcf9f2', 'user', '', 'tidak aktif'),
('U005', 'Prasasti', 'prasasti', '05069b3973f7702c336c9ca8af398732', 'user', '', 'aktif'),
('U006', 'Ditya', 'ditya', '16538ef92f6534e91c6ad23179d5583a', 'admin', 'Pusat', 'aktif'),
('U007', 'Desmon', 'desmon', '19a02ca47d39bf836b9d8f6c7d387aba', 'admin', 'Pusat', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_tindakan`
--
ALTER TABLE `daftar_tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indexes for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id_detail_resep`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_resep` (`id_resep`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id_diagnosis`);

--
-- Indexes for table `kuitansi`
--
ALTER TABLE `kuitansi`
  ADD PRIMARY KEY (`id_kuitansi`),
  ADD KEY `id_kunjungan` (`id_kunjungan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_resep` (`id_resep`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `no_rm` (`no_rm`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `nama_klinik`
--
ALTER TABLE `nama_klinik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_rm`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `petugas_kesehatan`
--
ALTER TABLE `petugas_kesehatan`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_kunjungan` (`id_kunjungan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_resep` (`id_resep`);

--
-- Indexes for table `tindakan_medis`
--
ALTER TABLE `tindakan_medis`
  ADD PRIMARY KEY (`id_tm`),
  ADD KEY `id_kunjungan` (`id_kunjungan`),
  ADD KEY `id_tindakan` (`id_tindakan`),
  ADD KEY `id_diagnosis` (`id_diagnosis`),
  ADD KEY `id_diagnosis_2` (`id_diagnosis`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tmp_detail_resep`
--
ALTER TABLE `tmp_detail_resep`
  ADD PRIMARY KEY (`id_tmp_dr`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tmp_tindakan_medis`
--
ALTER TABLE `tmp_tindakan_medis`
  ADD PRIMARY KEY (`id_tmp_tm`),
  ADD KEY `id_tindakan` (`id_tindakan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id_detail_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `nama_klinik`
--
ALTER TABLE `nama_klinik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tindakan_medis`
--
ALTER TABLE `tindakan_medis`
  MODIFY `id_tm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tmp_detail_resep`
--
ALTER TABLE `tmp_detail_resep`
  MODIFY `id_tmp_dr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_tindakan_medis`
--
ALTER TABLE `tmp_tindakan_medis`
  MODIFY `id_tmp_tm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_resep_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas_kesehatan` (`id_petugas`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `kuitansi`
--
ALTER TABLE `kuitansi`
  ADD CONSTRAINT `kuitansi_ibfk_1` FOREIGN KEY (`id_kunjungan`) REFERENCES `kunjungan` (`id_kunjungan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kuitansi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kuitansi_ibfk_3` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`no_rm`) REFERENCES `pasien` (`no_rm`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kunjungan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `petugas_kesehatan`
--
ALTER TABLE `petugas_kesehatan`
  ADD CONSTRAINT `petugas_kesehatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_kunjungan`) REFERENCES `kunjungan` (`id_kunjungan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tindakan_medis`
--
ALTER TABLE `tindakan_medis`
  ADD CONSTRAINT `tindakan_medis_ibfk_1` FOREIGN KEY (`id_tindakan`) REFERENCES `daftar_tindakan` (`id_tindakan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_medis_ibfk_2` FOREIGN KEY (`id_kunjungan`) REFERENCES `kunjungan` (`id_kunjungan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_medis_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas_kesehatan` (`id_petugas`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_medis_ibfk_4` FOREIGN KEY (`id_diagnosis`) REFERENCES `diagnosis` (`id_diagnosis`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tmp_detail_resep`
--
ALTER TABLE `tmp_detail_resep`
  ADD CONSTRAINT `tmp_detail_resep_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tmp_tindakan_medis`
--
ALTER TABLE `tmp_tindakan_medis`
  ADD CONSTRAINT `tmp_tindakan_medis_ibfk_1` FOREIGN KEY (`id_tindakan`) REFERENCES `daftar_tindakan` (`id_tindakan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tmp_tindakan_medis_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas_kesehatan` (`id_petugas`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : balaipengobatan

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 05/01/2020 21:09:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for daftar_tindakan
-- ----------------------------
DROP TABLE IF EXISTS `daftar_tindakan`;
CREATE TABLE `daftar_tindakan`  (
  `id_tindakan` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_tindakan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_tindakan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_tindakan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of daftar_tindakan
-- ----------------------------
INSERT INTO `daftar_tindakan` VALUES ('T001', 'Periksa', '8000');
INSERT INTO `daftar_tindakan` VALUES ('T002', 'Medikasi Kecil', '15000');
INSERT INTO `daftar_tindakan` VALUES ('T003', 'Medikasi Sedang', '20000');
INSERT INTO `daftar_tindakan` VALUES ('T004', 'Medikasi Besar', '30000');
INSERT INTO `daftar_tindakan` VALUES ('T005', 'KB Suntik 3 bulan', '17000');
INSERT INTO `daftar_tindakan` VALUES ('T006', 'KB Suntik 1 bulan', '20000');
INSERT INTO `daftar_tindakan` VALUES ('T007', 'Tumpatan gigi tetap SIK', '50000');
INSERT INTO `daftar_tindakan` VALUES ('T008', 'Tumpatan gigi tetap RC', '70000');
INSERT INTO `daftar_tindakan` VALUES ('T009', 'Pengobatan periodontal / tanpa tindakan', '10000');
INSERT INTO `daftar_tindakan` VALUES ('T010', 'Pencabutan gigi tetap', '70000');
INSERT INTO `daftar_tindakan` VALUES ('T011', 'Tumpatan gigi sulung', '50000');
INSERT INTO `daftar_tindakan` VALUES ('T012', 'Tumpatan sementara', '30000');
INSERT INTO `daftar_tindakan` VALUES ('T013', 'Pengobatan pulpa', '30000');
INSERT INTO `daftar_tindakan` VALUES ('T014', 'Pencabutan gigi sulung dengan CE', '30000');
INSERT INTO `daftar_tindakan` VALUES ('T015', 'Pencabutan gigi sulung dengan injeksi infiltrasi', '40000');
INSERT INTO `daftar_tindakan` VALUES ('T016', 'Pengobatan abses / Trepanasi', '15000');
INSERT INTO `daftar_tindakan` VALUES ('T017', 'Scaling', '100000');

-- ----------------------------
-- Table structure for detail_resep
-- ----------------------------
DROP TABLE IF EXISTS `detail_resep`;
CREATE TABLE `detail_resep`  (
  `id_detail_resep` int(11) NOT NULL AUTO_INCREMENT,
  `id_obat` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_obat` int(3) NOT NULL,
  `aturan_pakai` enum('1 kali sehari sebelum makan','2 kali sehari sebelum makan','3 kali sehari sebelum makan','1 kali sehari sesudah makan','2 kali sehari sesudah makan','3 kali sehari sesudah makan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_resep` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_petugas` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_detail_resep`) USING BTREE,
  INDEX `id_obat`(`id_obat`) USING BTREE,
  INDEX `id_resep`(`id_resep`) USING BTREE,
  INDEX `id_petugas`(`id_petugas`) USING BTREE,
  CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `detail_resep_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas_kesehatan` (`id_petugas`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_resep
-- ----------------------------
INSERT INTO `detail_resep` VALUES (9, 'O0006', 1, '1 kali sehari sebelum makan', 'R00001', 'P001');
INSERT INTO `detail_resep` VALUES (10, 'O0008', 1, '1 kali sehari sebelum makan', 'R00001', 'P001');
INSERT INTO `detail_resep` VALUES (15, 'O0005', 3, '1 kali sehari sesudah makan', 'R00003', 'P001');
INSERT INTO `detail_resep` VALUES (16, 'O0005', 1, '1 kali sehari sesudah makan', 'R00004', 'P001');
INSERT INTO `detail_resep` VALUES (17, 'O0005', -1, '1 kali sehari sesudah makan', 'R00004', 'P001');
INSERT INTO `detail_resep` VALUES (18, 'O0036', 15, '3 kali sehari sesudah makan', 'R00004', 'P001');
INSERT INTO `detail_resep` VALUES (19, 'O0033', 6, '1 kali sehari sebelum makan', 'R00005', 'P004');
INSERT INTO `detail_resep` VALUES (20, 'O0033', -1, '1 kali sehari sebelum makan', 'R00005', 'P004');
INSERT INTO `detail_resep` VALUES (22, 'O0026', 1, '1 kali sehari sebelum makan', 'R00007', 'P004');
INSERT INTO `detail_resep` VALUES (23, 'O0026', -1, '1 kali sehari sebelum makan', 'R00007', 'P004');
INSERT INTO `detail_resep` VALUES (24, 'O0012', 10, '3 kali sehari sebelum makan', 'R00007', 'P004');
INSERT INTO `detail_resep` VALUES (25, 'O0033', 3, '1 kali sehari sebelum makan', 'R00008', 'P004');
INSERT INTO `detail_resep` VALUES (26, 'O0033', -3, '1 kali sehari sebelum makan', 'R00008', 'P004');
INSERT INTO `detail_resep` VALUES (27, 'O0009', 10, '2 kali sehari sesudah makan', 'R00008', 'P004');
INSERT INTO `detail_resep` VALUES (28, 'O0029', 10, '3 kali sehari sesudah makan', 'R00009', 'P004');
INSERT INTO `detail_resep` VALUES (29, 'O0013', 10, '3 kali sehari sesudah makan', 'R00010', 'P001');
INSERT INTO `detail_resep` VALUES (30, 'O0004', 10, '2 kali sehari sesudah makan', 'R00011', 'P001');
INSERT INTO `detail_resep` VALUES (31, 'O0003', 10, '3 kali sehari sesudah makan', 'R00011', 'P001');
INSERT INTO `detail_resep` VALUES (32, 'O0004', 10, '3 kali sehari sesudah makan', 'R00012', 'P001');
INSERT INTO `detail_resep` VALUES (33, 'O0017', 10, '3 kali sehari sesudah makan', 'R00013', 'P001');
INSERT INTO `detail_resep` VALUES (34, 'O0037', 10, '3 kali sehari sesudah makan', 'R00013', 'P001');
INSERT INTO `detail_resep` VALUES (35, 'O0015', 10, '3 kali sehari sesudah makan', 'R00013', 'P004');
INSERT INTO `detail_resep` VALUES (36, 'O0022', 10, '2 kali sehari sebelum makan', 'R00014', 'P001');
INSERT INTO `detail_resep` VALUES (37, 'O0022', 10, '1 kali sehari sebelum makan', 'R00015', 'P004');
INSERT INTO `detail_resep` VALUES (38, 'O0011', 10, '1 kali sehari sebelum makan', 'R00015', 'P004');
INSERT INTO `detail_resep` VALUES (39, 'O0034', 3, '1 kali sehari sebelum makan', 'R00015', 'P004');
INSERT INTO `detail_resep` VALUES (40, 'O0036', 10, '3 kali sehari sesudah makan', 'R00015', 'P004');
INSERT INTO `detail_resep` VALUES (46, 'O0004', 5, '1 kali sehari sebelum makan', 'R00016', 'P001');

-- ----------------------------
-- Table structure for diagnosis
-- ----------------------------
DROP TABLE IF EXISTS `diagnosis`;
CREATE TABLE `diagnosis`  (
  `id_diagnosis` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_latin` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_indonesia` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_diagnosis`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of diagnosis
-- ----------------------------
INSERT INTO `diagnosis` VALUES ('A 02.0', 'Salmonella enteritis                                                                                ', 'Gastroententis akut');
INSERT INTO `diagnosis` VALUES ('A 03.0  ', 'Shigollosis due to shigella Dysenteriae                                                             ', 'disentri');
INSERT INTO `diagnosis` VALUES ('B 01.9  ', 'Varicella without complication                                                                      ', 'varicela zooster');
INSERT INTO `diagnosis` VALUES ('B 02.9  ', 'Herpes Zoster without complication                                                                  ', 'herpes zooster');
INSERT INTO `diagnosis` VALUES ('E 14.9  ', 'DM, Unsp/Unspecified diabetes mellitus.                                                             ', 'diabetes mellitus');
INSERT INTO `diagnosis` VALUES ('E 75.9  ', 'DISLIPIDEMIA                                                                                        ', 'dislipidemia');
INSERT INTO `diagnosis` VALUES ('G 44.3  ', 'Chronic post traumatic headache/cephalgia post traumatic                                            ', 'observasi cephalgia');
INSERT INTO `diagnosis` VALUES ('I 10    ', 'Hypertension essential / Hipertensi', 'hipertensi');
INSERT INTO `diagnosis` VALUES ('I 95.0  ', 'Idiophatic hypotension                                                                              ', 'hipotensi');
INSERT INTO `diagnosis` VALUES ('J 00    ', 'Common cold/CC/Nasopharyngitis acute/rhinopharyngitis/ Influenza', 'ISPA');
INSERT INTO `diagnosis` VALUES ('K 02.1  ', 'Caries of dentine', 'karies gigi');
INSERT INTO `diagnosis` VALUES ('K 04.0', 'Pulpitis', 'pulpitis');
INSERT INTO `diagnosis` VALUES ('K 05.4', 'Periodontosis', 'periodontosis');
INSERT INTO `diagnosis` VALUES ('K 05.5', 'Other periodontal diseases', 'periodontal');
INSERT INTO `diagnosis` VALUES ('K 05.6', 'Periodontal disease, unspecified', 'sakit gigi');
INSERT INTO `diagnosis` VALUES ('K 25.9  ', 'Gastric ulcer unspecified as acute chronic, without haemorrhage or perforation                      ', 'dispepsia');
INSERT INTO `diagnosis` VALUES ('K 61.0  ', 'Abscess perianal/Anal abscess', 'abses gigi');
INSERT INTO `diagnosis` VALUES ('L 02.0  ', 'Cutaneous abscess,furuncle and carbuncle of face                                                    ', 'abses');
INSERT INTO `diagnosis` VALUES ('L 23.9  ', 'DKA/Allergic contact dermatitis,unsp./Atopy                                                         ', 'dermatitis kontak alergi');
INSERT INTO `diagnosis` VALUES ('M 19.9  ', 'Osteoarthrosis/Arthrosis,unsp.                                                                      ', 'osteoarthritis');
INSERT INTO `diagnosis` VALUES ('M 25.5  ', 'Arthralgia/Pain in joint                                                                            ', 'arteuralgia');
INSERT INTO `diagnosis` VALUES ('M 79.1  ', 'Myalgia                                                                                             ', 'myalgia');
INSERT INTO `diagnosis` VALUES ('N 91.0  ', 'Primary amenorhoe                                                                                   ', 'amenorhea');
INSERT INTO `diagnosis` VALUES ('R 06.0  ', 'Dyspnoea                                                                                            ', 'observasi dyspnew');
INSERT INTO `diagnosis` VALUES ('R 11    ', 'Vomiting/Nausea                                                                                     ', 'observasi vomities');
INSERT INTO `diagnosis` VALUES ('R 42    ', 'Vertigo/ pusing (Dizzines and giddines)/Cephalgia                                                   ', 'vertigo');
INSERT INTO `diagnosis` VALUES ('R 50.9  ', 'Fever,unsp./Febris                                                                                  ', 'observasi febris');
INSERT INTO `diagnosis` VALUES ('S 39.9  ', 'Unspecified injury of abdomen, lower back and pelvis/vertebra                                       ', 'low back  pain');
INSERT INTO `diagnosis` VALUES ('T 14.1  ', 'Vulnus Laceration                                                                                   ', 'vulnus laserasi');

-- ----------------------------
-- Table structure for kuitansi
-- ----------------------------
DROP TABLE IF EXISTS `kuitansi`;
CREATE TABLE `kuitansi`  (
  `id_kuitansi` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kunjungan` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_resep` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `biaya_periksa` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `biaya_resep` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total_bayar` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kuitansi`) USING BTREE,
  INDEX `id_kunjungan`(`id_kunjungan`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  INDEX `id_resep`(`id_resep`) USING BTREE,
  CONSTRAINT `kuitansi_ibfk_1` FOREIGN KEY (`id_kunjungan`) REFERENCES `kunjungan` (`id_kunjungan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `kuitansi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `kuitansi_ibfk_3` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kuitansi
-- ----------------------------
INSERT INTO `kuitansi` VALUES ('K002', 'RJ000002', 'U008', NULL, '40000', '0', '40000');
INSERT INTO `kuitansi` VALUES ('K003', 'RJ000003', 'U008', 'R00001', '50000', '2100', '52100');
INSERT INTO `kuitansi` VALUES ('K004', 'RJ000004', 'U008', NULL, '100000', '0', '100000');
INSERT INTO `kuitansi` VALUES ('K005', 'RJ000005', 'U008', NULL, '8000', '0', '8000');
INSERT INTO `kuitansi` VALUES ('K006', 'RJ000006', 'U008', NULL, '8000', '0', '8000');
INSERT INTO `kuitansi` VALUES ('K007', 'RJ000007', 'U008', NULL, '80000', '0', '80000');
INSERT INTO `kuitansi` VALUES ('K008', 'RJ000008', 'U008', NULL, '85000', '0', '85000');
INSERT INTO `kuitansi` VALUES ('K009', 'RJ000009', 'U008', 'R00003', '8000', '3000', '11000');
INSERT INTO `kuitansi` VALUES ('K010', 'RJ000010', 'U008', 'R00004', '8000', '15250', '23250');
INSERT INTO `kuitansi` VALUES ('K011', 'RJ000011', 'U008', 'R00005', '30000', '27500', '57500');
INSERT INTO `kuitansi` VALUES ('K012', 'RJ000001', 'U008', 'R00007', '70000', '9000', '79000');
INSERT INTO `kuitansi` VALUES ('K013', 'RJ000002', 'U008', NULL, '40000', '0', '40000');
INSERT INTO `kuitansi` VALUES ('K014', 'RJ000012', 'U008', NULL, '100000', '0', '100000');
INSERT INTO `kuitansi` VALUES ('K015', 'RJ000013', 'U008', NULL, '15000', '0', '15000');
INSERT INTO `kuitansi` VALUES ('K016', 'RJ000014', 'U008', 'R00008', '140000', '3500', '143500');
INSERT INTO `kuitansi` VALUES ('K017', 'RJ000017', 'U008', 'R00009', '100000', '3000', '103000');
INSERT INTO `kuitansi` VALUES ('K018', 'RJ000019', 'U008', NULL, '20000', '0', '20000');
INSERT INTO `kuitansi` VALUES ('K019', 'RJ000018', 'U008', NULL, '108000', '0', '108000');
INSERT INTO `kuitansi` VALUES ('K020', 'RJ000015', 'U008', 'R00010', '108000', '15000', '123000');
INSERT INTO `kuitansi` VALUES ('K021', 'RJ000021', 'U008', 'R00011', '108000', '21500', '129500');
INSERT INTO `kuitansi` VALUES ('K022', 'RJ000016', 'U008', NULL, '100000', '0', '100000');
INSERT INTO `kuitansi` VALUES ('K023', 'RJ000024', 'U008', 'R00012', '148000', '18000', '166000');
INSERT INTO `kuitansi` VALUES ('K024', 'RJ000025', 'U008', NULL, '148000', '0', '148000');
INSERT INTO `kuitansi` VALUES ('K025', 'RJ000026', 'U008', NULL, '108000', '0', '108000');
INSERT INTO `kuitansi` VALUES ('K026', 'RJ000027', 'U008', 'R00013', '150000', '77500', '227500');
INSERT INTO `kuitansi` VALUES ('K027', 'RJ000028', 'U008', 'R00014', '8000', '7500', '15500');
INSERT INTO `kuitansi` VALUES ('K028', 'RJ000022', 'U008', NULL, '115000', '0', '115000');
INSERT INTO `kuitansi` VALUES ('K029', 'RJ000020', 'U008', 'R00015', '186000', '36000', '222000');
INSERT INTO `kuitansi` VALUES ('K030', 'RJ000029', 'U008', NULL, '38000', '0', '38000');
INSERT INTO `kuitansi` VALUES ('K031', 'RJ000029', 'U008', NULL, '108000', '0', '108000');
INSERT INTO `kuitansi` VALUES ('K032', 'RJ000030', 'U008', 'R00016', '108000', '9000', '117000');

-- ----------------------------
-- Table structure for kunjungan
-- ----------------------------
DROP TABLE IF EXISTS `kunjungan`;
CREATE TABLE `kunjungan`  (
  `id_kunjungan` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_rm` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_periksa` date NOT NULL,
  `id_petugas` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `poliklinik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_diagnosis` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `biaya_periksa` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_tindakan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diskon_tindakan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jns_asuransi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kunjungan`) USING BTREE,
  INDEX `no_rm`(`no_rm`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`no_rm`) REFERENCES `pasien_b` (`no_rm`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `kunjungan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kunjungan
-- ----------------------------
INSERT INTO `kunjungan` VALUES ('RJ000001', 'RM000001', 'U008', '2019-11-04', 'P004', 'gigi', 'K 02.1', '70000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000002', 'RM000002', 'U008', '2019-11-04', 'P004', 'Umum', 'K 02.1', '40000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000003', 'RM000002', 'U008', '2019-11-04', 'P001', 'Umum', 'B 02.9 ', '50000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000004', 'RM000001', 'U008', '2019-11-05', 'P001', 'Umum', 'B 02.9 ', '100000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000005', 'RM000003', 'U008', '2019-11-05', 'P001', 'Umum', 'B 02.9 ', '8000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000006', 'RM000001', 'U008', '2019-11-05', 'P001', 'Umum', 'B 02.9 ', '8000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000007', 'RM000006', 'U008', '2019-11-08', 'P001', 'Umum', 'B 02.9 ', '80000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000008', 'RM000008', 'U008', '2019-11-08', 'P001', 'Umum', 'B 02.9 ', '85000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000009', 'RM000010', 'U008', '2019-11-08', 'P001', 'Umum', 'I 10', '8000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000010', 'RM000011', 'U008', '2019-11-12', 'P001', 'Umum', 'I 10', '8000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000011', 'RM000007', 'U008', '2019-11-13', 'P004', 'Gigi', 'K 02.1  ', '30000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000012', 'RM000006', 'U008', '2019-11-15', 'P004', 'Gigi', 'K 02.1  ', '100000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000013', 'RM000005', 'U008', '2019-11-15', 'P004', 'Gigi', 'K 61.0  ', '15000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000014', 'RM000011', 'U008', '2019-11-16', 'P004', 'Gigi', 'K 02.1  ', '140000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000015', 'RM000004', 'U008', '2019-11-16', 'P001', 'Umum', 'B 02.9 ', '108000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000016', 'RM000010', 'U008', '2019-11-16', 'P001', 'Umum', 'M 25.5  ', '100000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000017', 'RM000010', 'U008', '2019-11-18', 'P004', 'Gigi', 'K 05.6', '100000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000018', 'RM000010', 'U009', '2019-11-20', 'P001', 'Umum', 'A 02.0  ', '108000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000019', 'RM000009', 'U008', '2019-11-22', 'P001', 'Umum', 'K 04.0', '20000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000020', 'RM000007', 'U008', '2019-11-23', 'P004', 'Gigi', 'A 03.0  ', '186000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000021', 'RM000006', 'U008', '2019-11-27', 'P001', 'Umum', 'I 10    ', '108000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000022', 'RM000005', 'U008', '2019-11-28', 'P001', 'Umum', 'B 02.9  ', '115000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000023', 'RM000003', 'U008', '2019-11-30', 'P001', 'Umum', 'I 10    ', '', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000024', 'RM000010', 'U008', '2019-11-30', 'P001', 'Umum', 'B 02.9  ', '148000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000025', 'RM000003', 'U008', '2019-12-02', 'P001', 'Umum', 'B 02.9  ', '148000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000026', 'RM000007', 'U008', '2019-12-02', 'P001', 'Umum', 'B 02.9  ', '108000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000027', 'RM000011', 'U008', '2019-12-02', 'P004', 'Gigi', 'K 02.1  ', '150000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000028', 'RM000004', 'U008', '2019-12-03', 'P001', 'Umum', 'B 02.9  ', '8000', NULL, NULL, NULL);
INSERT INTO `kunjungan` VALUES ('RJ000029', 'RM000009', 'U008', '2019-12-05', 'P001', 'Umum', 'K 04.0', '108000', '98000', '10000', NULL);
INSERT INTO `kunjungan` VALUES ('RJ000030', 'RM000011', 'U008', '2020-01-04', 'P001', 'Umum', 'I 10    ', '108000', '97200', '10800', '31O');

-- ----------------------------
-- Table structure for nama_klinik
-- ----------------------------
DROP TABLE IF EXISTS `nama_klinik`;
CREATE TABLE `nama_klinik`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nama_klinik
-- ----------------------------
INSERT INTO `nama_klinik` VALUES (1, 'Klinik Pratama Panti Waluyo Surakarta');

-- ----------------------------
-- Table structure for obat
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat`  (
  `id_obat` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_obat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_dagang` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_beli` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_jual` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stok` int(3) NOT NULL,
  PRIMARY KEY (`id_obat`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obat
-- ----------------------------
INSERT INTO `obat` VALUES ('O0001', 'U001', 'allopurinol', 'allopurinol', '24000', '300', 100);
INSERT INTO `obat` VALUES ('O0002', 'U001', 'acyclovir tablet', 'acyclovir tablet', '80000', '1000', 100);
INSERT INTO `obat` VALUES ('O0003', 'U001', 'ambroxol', 'ambroxol', '28000', '350', 80);
INSERT INTO `obat` VALUES ('O0004', 'U001', 'amplodipne 10mg', 'amplodipne 10mg', '144000', '1800', 50);
INSERT INTO `obat` VALUES ('O0005', 'U001', 'amplodipne 5mg', 'amplodipne 5mg', '80000', '1000', 100);
INSERT INTO `obat` VALUES ('O0006', 'U001', 'clindamycin 300mg', 'clindamycin 300mg', '52000', '1300', 49);
INSERT INTO `obat` VALUES ('O0007', 'U001', 'alprazolam tablet 0,5mg', 'alprazolam tablet 0,5mg', '80000', '1000', 100);
INSERT INTO `obat` VALUES ('O0008', 'U001', 'asam asetilsalisilat', 'aspilets', '64000', '800', 99);
INSERT INTO `obat` VALUES ('O0009', 'U001', 'parasetamol', 'itamol', '28000', '350', 90);
INSERT INTO `obat` VALUES ('O0010', 'U001', 'amoxicillin', 'dexymox forte', '60000', '750', 80);
INSERT INTO `obat` VALUES ('O0011', 'U001', 'antalgin 500mg', 'infalgin', '28000', '350', 90);
INSERT INTO `obat` VALUES ('O0012', 'U001', 'asam mefenamat', 'asam mefenamat', '28000', '350', 70);
INSERT INTO `obat` VALUES ('O0013', 'U001', 'methampyrone, diazepam', 'analsik', '120000', '1500', 90);
INSERT INTO `obat` VALUES ('O0014', 'U001', 'acyclovir 5% cream', 'acyclovir 5% cream', '40000', '5000', 9);
INSERT INTO `obat` VALUES ('O0015', 'U001', 'gentamycin 0,1%', 'gentamycin 0,1%', '8000', '5000', 0);
INSERT INTO `obat` VALUES ('O0016', 'U001', 'cefadroxil 500mg', 'cefadroxil 500mg', '88000', '1100', 100);
INSERT INTO `obat` VALUES ('O0017', 'U001', 'citerizin', 'citerizin', '52000', '650', 90);
INSERT INTO `obat` VALUES ('O0018', 'U001', 'domperidon', 'domperidon', '60000', '750', 100);
INSERT INTO `obat` VALUES ('O0019', 'U001', 'diltiazem', 'diltiazem', '28000', '350', 100);
INSERT INTO `obat` VALUES ('O0020', 'U001', 'dexamethasone', 'dexamethasone', '20000', '250', 90);
INSERT INTO `obat` VALUES ('O0021', 'U001', 'digoxin 0,25mg', 'digoxin 0,25mg', '28000', '350', 100);
INSERT INTO `obat` VALUES ('O0022', 'U001', 'activated attaplgite', 'diatabs', '60000', '750', 80);
INSERT INTO `obat` VALUES ('O0023', 'U001', 'asetaminofen, gliseril guaiacolat, fenilpropanlamin HCl, dekstrometorfan HBr, CTM', 'flucadex', '44000', '550', 90);
INSERT INTO `obat` VALUES ('O0024', 'U001', 'paracetamol, pseudoephedrine HCl, chlorphenamine maleate', 'demacolin', '44000', '550', 100);
INSERT INTO `obat` VALUES ('O0025', 'U001', 'curcuma', 'curcuma', '80000', '1000', 100);
INSERT INTO `obat` VALUES ('O0026', 'U001', 'paracetamol guaifenesin, CTM', 'anacetine', '26000', '6500', 5);
INSERT INTO `obat` VALUES ('O0027', 'U001', 'paracetamol', 'itamol sirup', '22000', '5500', 5);
INSERT INTO `obat` VALUES ('O0028', 'U001', 'cefixime', 'helixim kapsul', '36000', '1500', 28);
INSERT INTO `obat` VALUES ('O0029', 'U001', 'ibuprofen 400', 'ibuprofen 400', '24000', '300', 90);
INSERT INTO `obat` VALUES ('O0030', 'U001', 'captopril 25mg', 'farmoten 25', '28000', '350', 90);
INSERT INTO `obat` VALUES ('O0031', 'U001', 'omeprazole 20mg ', 'omeprazole 20mg ', '18000', '750', 30);
INSERT INTO `obat` VALUES ('O0032', 'U001', 'ibuprofen 400', 'farsifen', '26000', '6500', 5);
INSERT INTO `obat` VALUES ('O0033', 'U001', 'kaolin, pektin', 'guanistrep', '22000', '5500', 5);
INSERT INTO `obat` VALUES ('O0034', 'U001', 'Al hydroxide, Mg hidroxide, dimethicone', 'berlosid', '26000', '6500', 2);
INSERT INTO `obat` VALUES ('O0035', 'U001', 'amoxilin', 'yusimox', '26000', '6500', 5);
INSERT INTO `obat` VALUES ('O0036', 'U001', 'simvastatin', 'simvastatin', '44000', '550', 65);
INSERT INTO `obat` VALUES ('O0037', 'U001', 'spiramycin', 'spiramycin', '84000', '2100', 40);
INSERT INTO `obat` VALUES ('O0038', 'U001', 'methylpred', 'methylpred', '44000', '550', 100);
INSERT INTO `obat` VALUES ('O0039', 'U001', 'inalgestan', 'inalgestan', '108000', '1350', 100);
INSERT INTO `obat` VALUES ('O0040', 'U001', 'chlorpheniramine 4mg', 'chlorpheniramine 4mg', '80000', '100', 1000);
INSERT INTO `obat` VALUES ('O0041', 'U001', 'dexamethasone', 'jfidex 0,5', '80000', '100', 1000);
INSERT INTO `obat` VALUES ('O0042', 'U001', 'hydrocortisone', 'hydrocortisone', '20000', '5000', 5);
INSERT INTO `obat` VALUES ('O0043', 'U001', 'miconazole', 'miconazole', '20000', '5000', 5);

-- ----------------------------
-- Table structure for pasien
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien`  (
  `no_rm` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pasien` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_pasien` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat_lahir` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_lahir_pasien` date NOT NULL,
  `umur` int(3) NOT NULL,
  `jk_pasien` enum('laki-laki','perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_daftar` date NOT NULL,
  `id_user` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`no_rm`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pasien_b
-- ----------------------------
DROP TABLE IF EXISTS `pasien_b`;
CREATE TABLE `pasien_b`  (
  `no_rm` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_pasien` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jk_pasien` enum('L','P') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tmpt_lahir` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_lahir` datetime(0) NOT NULL,
  `umur_pasien` int(3) NULL DEFAULT NULL,
  `agm_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `neg_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sts_kwn` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pend_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pkrj_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_pasien` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tlp_pasien` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hp_pasien` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prov_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kot_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kec_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kel_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rt_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rw_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `peg_rs` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tinggi_pasien` int(8) NULL DEFAULT NULL,
  `berat_pasien` int(8) NULL DEFAULT NULL,
  `lp_pasien` int(8) NULL DEFAULT NULL,
  `imp_pasien` int(8) NULL DEFAULT NULL,
  `sis_pasien` int(8) NULL DEFAULT NULL,
  `dia_pasien` int(8) NULL DEFAULT NULL,
  `rr_pasien` int(8) NULL DEFAULT NULL,
  `hr_pasien` int(8) NULL DEFAULT NULL,
  `nm_wali` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hub_wali` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nm_ortu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pkrj_wali` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_daftar_pasien` datetime(0) NOT NULL,
  `id_user` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`no_rm`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pasien_b
-- ----------------------------
INSERT INTO `pasien_b` VALUES ('RM000001', 'Saya', 'L', 'Surakarta', '3379232147483647', '1997-12-03 00:00:00', NULL, 'Protestan', 'Indonesia', 'Belum Kawin', 'D III', 'Karyawan Swasta', 'Jalan Tengah TakBerujung 2 No 55', '271863777', '2147483647', 'Jawa Tengah', 'Surakarta', 'Jebres', 'Mojosongo', '02', '51', 'Y', 178, 90, 0, 123, 100, 100, 100, 100, 'Kamu', 'Orang Tua Kandung', 'Dia', 'Pegawai Negeri', '2019-11-04 00:00:00', 'U008');
INSERT INTO `pasien_b` VALUES ('RM000002', 'Kami', 'L', 'Surakarta', '338292147483647', '1991-02-02 00:00:00', NULL, 'Konghucu', 'Indonesia', 'Sudah Kawin', 'D III', 'Wirausaha', 'Jalan Looping Forever 12 No 8', '271895263', '2147483647', 'Jawa Tengah', 'Surakarta', 'Jebres', 'Jebres', '01', '30', 'T', 180, 100, 150, 156, 100, 100, 100, 100, 'Mereka', 'Orang Tua Angkat', 'Shedan', 'Wirausaha', '2019-11-04 00:00:00', 'U008');
INSERT INTO `pasien_b` VALUES ('RM000003', 'Helo', 'P', 'Surakarta', '4538752147483647', '1986-02-13 00:00:00', NULL, 'Budha', 'Indonesia', 'Belum Kawin', 'S1', 'Karyawan Swasta', 'Jalan Royale No 2', '271', '2147483647', 'Jawa Tengah', 'Surakarta', 'Jebres', 'Mojosongo', '5', '10', 'T', 180, 100, 150, 156, 100, 100, 100, 100, 'Kamu', 'Orang Tua Kandung', 'Asgard', 'Wirausaha', '2019-11-05 00:00:00', 'U008');
INSERT INTO `pasien_b` VALUES ('RM000004', 'Teh Tong Ji', 'L', 'Surakarta', '3379232147483647', '1997-12-03 00:00:00', NULL, 'Protestan', 'Indonesia', 'Belum Kawin', 'D III', 'Karyawan Swasta', 'Jalan Tengah TakBerujung 2 No 55', '271863777', '2147483647', 'Jawa Tengah', 'Surakarta', 'Jebres', 'Mojosongo', '02', '51', 'Y', 178, 90, 90, 123, 100, 100, 100, 100, 'Kamu', 'Orang Tua Kandung', 'Dia', 'Pegawai Negeri', '2019-11-07 00:00:00', 'U008');
INSERT INTO `pasien_b` VALUES ('RM000005', 'Teh Gopek', 'L', 'Surakarta', '3379232147483647', '1997-12-03 00:00:00', NULL, 'Protestan', 'Indonesia', 'Belum Kawin', 'D III', 'Karyawan Swasta', 'Jalan Tengah TakBerujung 2 No 55', '271863777', '2147483647', 'Jawa Tengah', 'Surakarta', 'Jebres', 'Mojosongo', '02', '51', 'Y', 178, 90, 90, 123, 100, 100, 100, 100, 'Kamu', 'Orang Tua Kandung', 'Dia', 'Pegawai Negeri', '2019-11-07 00:00:00', 'U008');
INSERT INTO `pasien_b` VALUES ('RM000006', 'Michael Wulandari', 'P', 'Jakarta', '3379232147483647', '1986-07-25 00:00:00', NULL, 'Katolik', 'Indonesia', 'Belum Kawin', 'S1', 'Karyawan Swasta', 'Jalan Berlin Timur Nomor 2', '0271 948576', '085963245578', 'Jawa Tengah', 'Surakarta', 'Pasar Kliwon', 'Mojosongo', '88', '51', 'T', 0, 0, 0, 0, 0, 0, 0, 0, 'Khana Diaz', 'Orang Tua Kandung', 'Khana Diaz', 'Wirausaha', '2019-11-07 00:00:00', 'U008');
INSERT INTO `pasien_b` VALUES ('RM000007', 'John Cena', 'L', 'Surakarta', '3375981562140256', '1989-07-21 00:00:00', NULL, 'Katolik', 'Indonesia', 'Sudah Kawin', 'S1', 'Karyawan Swasta', 'Jalan Berlin Timur Nomor 25', '0271895263', '087526541892', 'Jawa Tengah', 'Surakarta', 'Jebres', 'Jebres', '5', '1', 'T', 180, 80, 80, 100, 100, 100, 100, 100, 'Ceno', 'Orang Tua Angkat', 'John', 'Karyawan Swasta', '2019-11-07 00:00:00', 'U008');
INSERT INTO `pasien_b` VALUES ('RM000008', 'Xayah', 'P', 'Belanda', '1234567891234567', '1997-03-06 00:00:00', NULL, 'Protestan', 'Indonesia', 'Belum Kawin', 'S1', 'Karyawan Swasta', 'Jalan Berlin Timur Nomor 2', '027158963212', '05123645789100', 'Jawa Tengah', 'Surakarta', 'Laweyan', 'Mojosongo', '5', '1', 'T', 180, 90, 90, 100, 100, 100, 100, 100, 'Jhin', 'Orang Tua Kandung', 'Jhin', 'Pegawai Negeri', '2019-11-08 00:00:00', 'U008');
INSERT INTO `pasien_b` VALUES ('RM000009', 'coba', 'P', 'Surakarta', '3379232147483647', '2019-11-07 00:00:00', NULL, 'Budha', 'Indonesia', 'Belum Kawin', 'S1', 'Pegawai Negeri', 'Jalan Berlin Timur Nomor 25', '027158963212', '085963245578', 'Jawa Tengah', 'Karanganyar', 'Pasar Kliwon', 'Jebres', '5', '56', 'T', 171, 90, 90, 123, 100, 100, 100, 100, 'Jhin', 'Orang Tua Kandung', 'Jhin', 'Karyawan Swasta', '2019-11-08 00:00:00', 'U008');
INSERT INTO `pasien_b` VALUES ('RM000010', 'Fiddle', 'L', 'Belanda', '9876543219876541', '2019-11-07 00:00:00', NULL, 'Katolik', 'Indonesia', 'Tidak Kawin', 'D III', 'Karyawan Swasta', 'Jalan Looping Forever 12 No 8', '271863777', '051236457891', 'Jawa Tengah', 'Karanganyar', 'Laweyan', 'Mojosongo', '88', '30', 'Y', 171, 55, 55, 123, 100, 100, 100, 100, 'Khana Diaz', 'Orang Tua Kandung', 'Khana Diaz', 'Pegawai Negeri', '2019-11-08 00:00:00', 'U008');
INSERT INTO `pasien_b` VALUES ('RM000011', 'Phanteon', 'L', 'Surakarta', '3370451236542159', '1998-03-20 00:00:00', NULL, 'Protestan', 'Indonesia', 'Belum Kawin', 'S1', 'Karyawan Swasta', 'Jalan Berlin Timur Nomor 25', '027158963212', '087526541892', 'Jawa Tengah', 'Surakarta', 'Jebres', 'Mojosongo', '02', '30', 'Y', 180, 70, 70, 100, 100, 100, 100, 100, 'Khana Diaz', 'Orang Tua Kandung', 'Khana Diaz', 'Karyawan Swasta', '2019-11-12 00:00:00', 'U008');
INSERT INTO `pasien_b` VALUES ('RM000012', 'a', 'L', 'a', '978', '2020-01-04 00:00:00', NULL, 'Islam', 'Indonesia', 'Sudah Kawin', 'SMA', 'Pegawai Negeri', '67j', '787878', '787778', 'Jawa Tengah', 'Surakarta', 'Jebres', 'Mojosongo', '1', '2', 'T', 1, 1, 1, 1, 1, 1, 1, 1, 'wt', 'Orang Tua Kandung', 'wret', 'Pegawai Negeri', '2020-01-04 00:00:00', 'U008');

-- ----------------------------
-- Table structure for pasien_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `pasien_bpjs`;
CREATE TABLE `pasien_bpjs`  (
  `no_bpjs` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_rm_bpjs` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nm_pasien_bpjs` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jk_bpjs` enum('L','P') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir_bpjs` datetime(0) NULL DEFAULT NULL,
  `pisat_bpjs` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelas_bpjs` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `peserta_bpjs` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`no_bpjs`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pasien_bpjs
-- ----------------------------
INSERT INTO `pasien_bpjs` VALUES ('0000029247423', 'RM000010', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pasien_bpjs` VALUES ('1234567891', 'RM000011', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for petugas_kesehatan
-- ----------------------------
DROP TABLE IF EXISTS `petugas_kesehatan`;
CREATE TABLE `petugas_kesehatan`  (
  `id_petugas` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_petugas` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_petugas` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat_lahir` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_lahir_petugas` date NOT NULL,
  `no_telp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `poliklinik` enum('umum','gigi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('aktif','tidak aktif') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_petugas`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `petugas_kesehatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of petugas_kesehatan
-- ----------------------------
INSERT INTO `petugas_kesehatan` VALUES ('P001', 'dr. Alva Sinung Anindita', 'Surakarta', 'Surakarta', '1986-11-23', '085728545514', 'umum', 'U002', 'aktif');
INSERT INTO `petugas_kesehatan` VALUES ('P002', 'drg. Justina', 'Sumber Nayu', 'Surakarta', '1988-03-22', '085728545513', 'gigi', 'U002', 'aktif');
INSERT INTO `petugas_kesehatan` VALUES ('P003', 'Paryatun, AMKeb', 'Gulon', 'Surakarta', '1985-09-09', '085678567832', 'umum', 'U002', 'tidak aktif');
INSERT INTO `petugas_kesehatan` VALUES ('P004', 'Anastasia Dewi., AMKG', 'Bibis Luhur', 'Surakarta', '1988-03-20', '089432543698', 'gigi', 'U002', 'aktif');
INSERT INTO `petugas_kesehatan` VALUES ('P005', 'John Cena', 'Jalan Berlin Timur Nomor 25', 'coba', '2019-11-28', '084898494989', 'umum', 'U008', 'aktif');

-- ----------------------------
-- Table structure for pubpng
-- ----------------------------
DROP TABLE IF EXISTS `pubpng`;
CREATE TABLE `pubpng`  (
  `vc_k_png` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `vc_n_png` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `vc_map_dinkes` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `vc_no_tlp` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `vc_fax` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `vc_alamat` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `vc_kota` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `vc_email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `vc_ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `vc_kel` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dt_create_date` datetime(0) NULL DEFAULT NULL,
  `dt_berlaku` datetime(0) NULL DEFAULT NULL,
  `dt_sberlaku` datetime(0) NULL DEFAULT NULL,
  `vc_create_by` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bt_aktif` tinyint(4) NULL DEFAULT NULL,
  `vc_piut_cair` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`vc_k_png`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pubpng
-- ----------------------------
INSERT INTO `pubpng` VALUES ('101', 'Karyawan Medik ', '2.2', '', '', '', '', '', '', '1', '2008-10-17 00:00:00', NULL, NULL, '', 1, '0');
INSERT INTO `pubpng` VALUES ('102', 'Paramed.Perawat', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 1, '0');
INSERT INTO `pubpng` VALUES ('103', 'Paramed.Non Perawat', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 1, '0');
INSERT INTO `pubpng` VALUES ('104', 'Non Medik / Umum', '2.2', '0271-712077', '0271-729125', 'jl.A.Yani no.1 ', 'Solo', '-', '-', '1', '2013-04-01 00:00:00', NULL, NULL, '0211', 1, '0');
INSERT INTO `pubpng` VALUES ('105', 'Pekarya/Pocokan', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 1, '0');
INSERT INTO `pubpng` VALUES ('106', 'Pensiunan', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 1, '0');
INSERT INTO `pubpng` VALUES ('201', 'Karyawan Medik ( Keluarga )', '2.2', '', '', '', '', '', '', '2', '2010-03-13 00:00:00', NULL, NULL, '0062', 1, '0');
INSERT INTO `pubpng` VALUES ('202', 'Paramed.Perawat ( keluarga )', '2.2', '', '', '', '', '', '', '2', '2010-03-13 00:00:00', NULL, NULL, '0062', 1, '0');
INSERT INTO `pubpng` VALUES ('203', 'Paramed.Non Perawat ( keluarga )', '2.2', '', '', '', '', '', '', '2', '2010-03-13 00:00:00', NULL, NULL, '0062', 1, '0');
INSERT INTO `pubpng` VALUES ('204', 'Non Medik/Umum ( Keluarga )', '2.2', '', '', '', '', '', '', '2', '2010-03-13 00:00:00', NULL, NULL, '0062', 1, '0');
INSERT INTO `pubpng` VALUES ('205', 'BPJS KARYAWAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('206', 'Pensiunan ( keluarga )', '2.2', '', '', '', '', '', '', '2', '2010-03-13 00:00:00', NULL, NULL, '0062', 1, '0');
INSERT INTO `pubpng` VALUES ('207', 'ORANG TUA/ MERTUA KARYAWAN', '3', NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, 1, '1');
INSERT INTO `pubpng` VALUES ('301', 'PPA SOLAGRACIA', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('302', 'AVRIST', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('303', 'RS PANTI WILASA CITARUM', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('304', 'SMP Batik Surakarta', '2.2', '0271-712944', '-', 'Jl. Brigjen Slamet Riyadi No. 447', 'Solo', '-', 'Berlaku untuk murid dan keluarga, karyawan, guru beserta keluarga', '4', '2009-08-27 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('305', 'TK Kristen Manahan', '2.2', '0271-717466', '-', 'Jl. MT. Haryono No.10', 'Solo', '-', 'Berlaku untuk murid dan keluarga,karyawan,guru beserta keluarga', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('306', 'SD Kristen Manahan', '2.2', '0271-716819', '-', 'Jl. MT. Haryono No.12', 'Solo', '-', 'berlaku untuk siswa dan keluarga, karyawan, guru beserta keluarga', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('307', 'SMA Kristen 1', '2.2', '0271-636238', '-', 'Jl. Honggowongso No. 135 Sidokare', 'Solo', '-', 'berlaku untuk siswa dan keluarga, karyawan, guru beserta keluarga', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('308', 'SMA Kristen 2 Surakarta', '2.2', '0271-648542', '-', 'Jl. Abdul Muis No.45', 'Solo', '-', 'Berlaku untuk siswa,karyawan,guru', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('309', 'Sekolah Pelita Nusantara', '2.2', '0271-633285', '0271-632142', 'Jl. surya No. 54-56', 'Solo', '-', 'Berlaku untuk siswa, karyawan, guru', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('30A', 'CJDW NETWORK', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30B', 'MACANAN JAYA, PT', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30C', 'PERUM PERHUTANI', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30D', 'ASTRA, PT', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30E', 'HOKA HOKA BENTO', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30F', 'IN HEALTH, PT', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 1, '2');
INSERT INTO `pubpng` VALUES ('30G', 'FAJAR PARMATA, PT', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30H', 'CENTER POINT SOLO', '2.2', '081317699559     (Bp.Agus)', '-', 'Jl.Slamet Riyadi Surakarta', 'Surakarta', '-', 'Pelayanan Kesehatan Akibat Kecelakaan Kerja ', '3', '2015-01-16 00:00:00', NULL, NULL, '0444', 0, '3');
INSERT INTO `pubpng` VALUES ('30I', 'YAYASAN WINAYA BAKTI', '2.2', '0271 719626     ', '-', 'Jl.Adi Sucipto No.45 Surakarta 57143', 'Surakarta', '-', 'Pelayanan Kesehatan Rawat Jalan bagi Siswa Siswi\r\nPelayanan Kesehatan Rawat Inap bagi Karyawan ', '3', '2015-01-16 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('30J', 'COMMON WEALTH', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30K', 'PPA BETLEHEM', '2.2', ' (0271) 780 132', '-', 'Jl.Slamet Riyadi No.22 Kartasura', 'Sukoharjo', '-', 'Pelayanan Kesehatan Rawat Inap \r\n(disc 5 %)', '3', '2015-01-16 00:00:00', NULL, NULL, '0444', 0, '3');
INSERT INTO `pubpng` VALUES ('30L', 'Enseval, PT.', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30M', 'SMILE TRAIN', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30N', 'GKI KABANGAN', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30O', 'Indo Acidatama, PT.', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30P', 'BANK JATENG', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30Q', 'GARDA MEDIKA', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30R', 'BANK BTN', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30S', 'POS INDONESIA, PT.', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30T', 'IN HEALTH PLATINUM', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 1, '2');
INSERT INTO `pubpng` VALUES ('30U', 'IN HEALTH DIAMOND', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 1, '2');
INSERT INTO `pubpng` VALUES ('30V', 'JAYA PROTEKSI ADMEDIKA', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30W', 'PG RAJAWALI, PT.', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30X', 'WIJAYA KARYA, PT', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30Y', 'GKJ MARGOYUDAN', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('30Z', 'BANK MANDIRI', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('310', 'SMK TECHNO-SA', '2.2', '-', '-', 'Jl.Pakel No.66 Sumber ', 'Surakarta', '-', 'Tagihan Langsung ditagihkan pada pasien ssetelah selesai menjalani pemeriksaan ', '4', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('311', 'Grand Orchid Hotel', '2.2', '0271-731888', '0271-712233', 'Jl. Slamet Riyadi 392', 'Solo', '-', 'Berlaku untuk Karyawan, Staf beserta keluarga', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('312', 'Diamond Hotel', '2.2', '0271-733888', '0271-715343', 'Jl.Slamet Riyadi 392', 'Solo', '-', 'Berlaku untuk karyawan & staff ', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('313', 'Baron Indah ', '2.2', '0271-729071', '', 'Jl.Dr.Radjiman 392', 'Solo', '', 'Berlaku untuk seluruh karyawan', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('314', 'Novotel ', '2.2', '0271-724555', '', 'jl.Slamet Riyadi 272', 'Solo', '', 'Berlaku untuk karyawan dan staff', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('315', 'SKEMA INDAH', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('316', 'IBIS Hotel', '2.2', '0271-724555', '-', 'Jl.Gajah Mada', 'Solo', '', 'Berlaku untuk karyawan &  Staff', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('317', 'Narita Hotel', '2.2', '0271-721000', '-', 'Jl.Laksda Adi Sucipto 4 ', 'Surakarta', '', 'Berlaku untuk karyawan dan staff', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('318', 'Solo Paragon Apartemen & Mall', '2.2', '0271-727306', '', 'Jl.Yosodipuro No 133 ', 'Solo', '', 'Berlaku untuk karyawan dan staff beserta keluarga ', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('319', 'Indah Palace hotel', '2.2', '0271-711011', '0271-724368', 'jl.Veteran No 284 ', 'Solo', '-', 'Berlaku untuk Tamu Hotel, Karyawan dan staff', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('31A', 'HILON FELT, PT', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('31B', 'ATMI', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('31C', 'MEDIA HEALTH CARE', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('31D', 'HALO DOKTER', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('31E', 'Keluarga Pendeta', '3', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '1');
INSERT INTO `pubpng` VALUES ('31F', 'TUGU MANDIRI', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('31G', 'FINANSIA MULTI FINANCE, PT', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('31H', 'MULTI ARTHA GUNA ASURANSI, PT ', '2.2', '0221 29299999/ 021 68839684/ 021 29299900 (DINA) / 021 29299900 (DEKA)', '021 57944226', 'Komplek Permata Senayan Rukan E No. 59-60\r\nJl.Tentara Pelajar Kebayoran Lama - Jakarta Selatan 12210', 'Jakarta Selatan', 'provider@mag.co.id / hotline@mag.co.id', 'Fasilitas Rawat Inap & One Day Surgery ', '3', '2014-10-22 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('31I', 'Pama Persada, PT.', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('31J', 'PT. NUSANTARA MEDIKA UTAMA', '2.2', '0321 328557 ', '0321 390988', 'Jl. Hayam Wuruk 88 Mojokerto 61321', 'Mojokerto', 'nusameditama@yahoo.co.id ', 'Pelayanan Kesehatan untuk peserta dari PTPN X (Persero) yaitu karyawan dan pensiunan beserta keluarga', '4', '2013-11-19 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('31K', 'WIDJAYA KUSUMA CONTRACTOR, PT', '2.2', ' 085319779751 , 081383255063', ' -', 'Jl. Slamet Riyadi No. 562 ', 'Surakarta', ' -', 'Pelayanan Kesehatan  akibat kecelakaan kerja untuk karyawan ( Rawat Inap & Rawat Jalan )', '4', '2013-11-19 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('31L', 'INDOFOOD, PT', '2.2', '024 8664555', '024 8665353', 'Jl.Tambak Aji II / 8 ', 'Semarang', ' -', 'Pelayanan Kesehatan Rawat Jalan & Rawat Inap untuk Karyawan dan Keluarga ', '4', '2013-11-19 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('31M', 'MEDIFARMA LABORATORIES, PT', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('31N', 'NUSANTARA MEDIKA UTAMA, PT', '2.2', '0321 328557', '0321 390988', 'Jl. Hayam Wuruk 88 ', 'Mojokerto', '-', 'Pelayanan untuk Karyawan & Pensiunan beserta keluarga PTPN X (Persero)', '4', '2013-11-19 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('31O', 'Jaminan Kesehatan Nasional', '2.1', NULL, NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL, 1, '2');
INSERT INTO `pubpng` VALUES ('31P', 'RS. Mardi Waluyo Yakkum', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('31Q', 'NUSA RAYA CIPTA, PT', '2.2', '085725885129 / 085647274624 ', ' -', 'Jl.Tentara Pelajar No. 9 Sanggrahan Grogol Sukoharjo', 'Surakarta', ' -', 'Rawat Jalan , Rawat Inap, IGD', '3', '2014-09-26 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('31R', 'PPA TRESNO PUTRO (GSJA SUMPINGAN)', '2.2', '0271 735 282 / 0271 743313', '', 'Sumpingan RT 04 / 05 Kadipiro Banjarsari Surakarta ', 'Surakarta', '', 'Pelayanan Rawat Inap dan Rawat Jalan beserta fasilitas penunjang  (Laboratorium, Radiologi, Rehabilitasi Medik, Obat-obatan sesuai DOEN) ', '4', '2014-04-08 00:00:00', NULL, NULL, '0444', 1, '1');
INSERT INTO `pubpng` VALUES ('31S', 'MNC LIFE INSURANCE', '2.2', '021 3983 7005 / 021 3983 7006', ' 021 3983 7011', 'MNC Tower 6-7th Floor Jl.Kebon Sirih Kav.17-19 Jakarta 10340', 'Jakarta', '', 'Pelayanan Rawat Jalan, Rawat Inap. Layanan Gawat Darurat, Pemeriksaan Gigi\r\n( diskon 5 % )', '3', '2015-01-16 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('31T', 'COB JKN-INHEALTH (Managed Care)', NULL, '024 8445957/ 0271 731956', '', 'Jl. S. Parman No. 1 A Semarang/ Jl. Adi Sucipto No. 67 Blok F, Kerten Surakarta', 'Surakarta', '', '', NULL, '2017-05-27 00:00:00', NULL, NULL, '', 0, '2');
INSERT INTO `pubpng` VALUES ('31U', 'BKMKS', NULL, '-', '-', '-', '-', '-', 'Pemerintah Kota Solo', NULL, '2017-01-05 00:00:00', NULL, NULL, '0334', 1, '3');
INSERT INTO `pubpng` VALUES ('31V', 'NAYAKA', NULL, '-', '-', '-', '-', '-', '-', NULL, '2017-01-05 00:00:00', NULL, NULL, '0334', 1, '3');
INSERT INTO `pubpng` VALUES ('31W', 'RAMAYANA', NULL, '-', '-', '-', '-', '-', '', NULL, '2017-01-05 00:00:00', NULL, NULL, '0334', 1, '3');
INSERT INTO `pubpng` VALUES ('31Y', 'JR-BPJS', '2.2', '', '', '', '', '', '', '3', '2016-09-23 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('31Z', 'INHEALTH INDEMNITY', NULL, '024 8445957/ 0271 731956', '', 'Jl. S. Parman No. 1 A Semarang/ Jl. Adi Sucipto No. 67 Blok F, Kerten Surakarta', '', 'Surakarta', '', NULL, '2017-05-27 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('320', 'Diamond Restaurant', '2.2', '0271-733888', '0271-715343', 'Jl.Slamet Riyadi 392', 'Solo', '-', 'Berlaku untuk Karyawan, staff dan keluarga ', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('321', 'Orient Restaurant', '2.2', '', '', 'Jl.Slamet Riyadi 397 ', 'Solo', '-', 'Berlaku untuk karyawan, staff & keluarga', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('322', 'RM.Padang Sederhana', NULL, '0271 739859', '', 'Jl. Slamet Riyadi No. 469 surakarta', 'Surakarta', '-', 'diskon resto 5% pelayanan menu keluarga pasien', NULL, '2017-05-27 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('323', 'Sun City Restaurant', '2.2', '0271-7651533', '0271-7651632', 'Solo Square 2nd Floor Kav.00B Jl.Slamet Riyadi No 451-456', 'Solo', '-', 'Berlaku untuk karyawan tetap dan keluarga', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('324', 'Eka Duta , PT', '2.2', '0271-721838', '-', '-', 'Solo', '-', 'Karyawan beserta keluarga', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('325', 'Dewi Samudera Kusuma , PT', '2.2', '-', '-', '-', 'Solo', '', 'berlaku untuk karyawan dan keluarga', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('326', 'GKI Coyudan', '2.2', '-', '-', 'Jl.Dr.Radjiman 125 ', 'Solo', '-', 'Berlaku untuk Karyawan,  Majelis, Jemaat GKI Coyudan', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('327', 'Joglosemar', '2.2', '0271-719126313', '-', 'Jl.Setia Budi', 'Solo', '-', 'Berlaku untuk Karyawan, staf dan keluarga ', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('328', 'Prima Putra Bengawan, CV', '2.2', '-', '-', '-', 'Solo', '-', 'Untuk Rawat jalan terdapat paket Rp 30.000 ( Dokter Umum, Obat-obat, Suntik ) ', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('329', 'GBIS Sambeng', '2.2', '-', '-', 'Jl. Cocak 2/42 Sambeng', 'Solo', '', 'Berlaku untuk anak-anak PPA', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32A', 'The Amrani Hotel', NULL, '0271 719443', '', 'Jl. Slamet Riyadi 534 Kerten, Laweyan', 'Surakarta', '', '', NULL, '2016-10-04 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32B', 'PT. Kereta Api Indonesia (KAI)', NULL, '08156527139, 082138739404, 082138739405', '', 'Jl. Wongsodirjan No. 8 ', 'Yogyakarta', 'muk6yogyakarta@yahoo.co.id', '', NULL, '2016-10-24 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32C', 'PT. NAYAKA ERA HUSADA CABANG SEMARANG', NULL, '024 7605621 , 70046006', '024 7612749', 'Ruko Siliwangi Plasa Blok D2 ,\r\nJl. Jend Sudirman  \r\nNo. 187 – 189  \r\n', 'Semarang', 'nayakasmg@gmail.com,\r\n pury_anti@yahoo.com\r\n', '', NULL, '2016-10-24 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32D', 'PT. Eka Bogainti', NULL, '', '(021) 8700444', 'Jl. Raya Poncol No. 2 Ciracas', 'Jakarta Timur', '', '', NULL, '2016-11-15 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32E', 'PT. BNI Life Insurance', NULL, '021 29539999\r\n021 29539999\r\n021 29539999\r\n021 29539999', '021 29539998', 'Jl. Jend. Sudirman No. 1 Jakarta. The Landmark Center 21st Floor', 'Jakarta', 'provider.relation@bni-life.co.id', 'Perawatan dan berobat langganan', NULL, '2016-11-23 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32F', 'PT. Asuransi Ramayana, Tbk', NULL, '021 391 3864', '021 391 1790', 'Jl. kebon Sirih No. 49 Jakarta Pusat 10340', 'Jakarta Pusat', 'provider@ramayanains.com', '', NULL, '2016-12-27 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32G', 'Yayasan Kesejahteraan Pegawai Otoritas Jasa Keuangan (YKP-OJK)', NULL, '021 29600000. ext. 8966/ 1091', '', 'Jl. Lapangan Banteng Timur No. 2-4', 'Jakarta Pusat 10710', '', '', NULL, '2017-01-03 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32H', 'Mie Surabaya Purwosari', NULL, '0271 715864', '', 'Jl. Perintis Kemerdekaan No. 30', 'Surakarta', '', 'Kerjasama Pelayanan Menu Keluarga Pasien Rawat Inap Kelas Utama, Kelas I, VIP, VVIP, Super VIP ', NULL, '2017-01-16 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32I', 'Mie Surabaya Purwosari', NULL, '0271 715864', '', 'Jl. Perintis Kemerdekaan No. 30', 'Surakarta', '', 'Pelayanan kesehatan karyawan', NULL, '2017-01-16 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32J', 'Abata Donuts', NULL, '0271 7463131', '', 'Jl. Yosodipuro 52D ', 'Surakarta', 'abatadonuts@gmail.com', 'pelayanan menu keluarga pasien', NULL, '2017-01-16 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32K', 'Abata Donuts', NULL, '0271 7463131', '', 'Jl. Yosodipuro 52 D', 'Surakarta', 'abatadonuts@gmail.com', 'pelayanan kesehatan karyawan', NULL, '2017-01-16 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32L', 'RM. Malioboro', NULL, '0271 725498', '', 'Jl. RM Said 138', 'Surakarta', '', 'pelayanan menu keluarga pasien', NULL, '2017-01-16 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32M', 'PT. Pan Pasific Insurance', NULL, '021 83704309', '021 8370 4264', 'Graha Pratama Lt. 6. Jl. M.T. Haryono Kav.15', 'Jakarta 12810', 'provider_relation@panfic.com', 'pelayanan perawatan dan pengobatan', NULL, '2017-01-17 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32N', 'Mc Donald Slamet Riyadi', NULL, '0271 632085', '', 'Jl. Slamet Riyadi 112-114 ', 'Surakarta', '', 'Pelayanan menu keluarga pasien', NULL, '2017-01-17 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32O', 'Popipop Noodle Soup', NULL, '08812817426', '', 'Jl. Adi Sumarmo No. 110 Komplang, Kadipiro', 'Surakarta', '', 'Pelayanan menu keluarga pasien', NULL, '2017-01-17 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32P', 'Popipop Noodle Soup', NULL, '08812817426', '', 'Jl. Adi Sumarmo No. 110 Komplang, Kadipiro', 'Surakarta', '', 'Pelayanan kesehatan karyawan', NULL, '2017-01-17 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32Q', 'BALAI BESAR KESEHATAN PARU MASYARAKAT (BBKPM) SURAKARTA', NULL, '0271 713055', '', 'Jl. Prof. Dr. Soeharso No. 28 ', 'Surakarta', 'bbkpm_surakarta@yahoo.com\r\n', '', NULL, '2017-02-11 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32R', 'PT. TEKNOLOGI RISET GLOBAL INVESTAMA', NULL, '', '', 'Gedung Menara MTH Lt. 12. Jl. Let.jend MT. Haryono Kav 23 ', 'Jakarta Selatan 12820', '', '', NULL, '2017-02-11 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32S', 'Griya Dahareco Resto', NULL, '0271 711116', '', 'Jl. Sidorejo No. 8 Sambeng ', 'Surakarta', 'griyadahareco@gmail.com', '', NULL, '2017-02-11 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('32T', 'Shirokuma Aikido Dojo', NULL, '0271 625482', '', 'Jl. Ir. Soekarno AA 22 mainimaxi Tower 3rd Floor Langenharjo', 'Sukoharjo', 'shirokumaikodojo@gmail.com', 'Kiddos Card', NULL, '2017-03-21 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('32U', 'Wafels n Co', NULL, '082 136 569 824', '', 'Jl. Kenanga No. 33 Badran, Kotabarat, Surakarta', 'Surakarta', 'wafelsnco@gmail.com', 'Kiddos Card', NULL, '2017-03-21 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('32V', 'Wafels n Co', NULL, '082 136 569 824', '', 'Jl. Kenanga No. 33 Badran, Kotabarat, Surakarta', 'Surakarta', 'wafelsnco@gmail.com', 'Pelayanan menu keluarga pasien', NULL, '2017-03-21 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('32W', 'Pusat Buku Sekawan Group', NULL, '0271 656090/ 0271713413', '', 'Jl. Kartini No. 4 Surakarta', 'Surakarta', '', 'Kiddos Card', NULL, '2017-03-21 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('32X', 'Pusat Buku Sekawan Group', NULL, '0271 656090/ 0271713413', '', 'Jl. Kartini No. 4 Surakarta', 'Surakarta', '', 'Pelayanan Kesehatan', NULL, '2017-03-21 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('32Y', 'Erigo Coffee and Resto', NULL, '0271 714074', '', 'Jl. Kebangkitan Nasional No. 19 Surakarta', 'Surakarta', '', 'Kiddos Card', NULL, '2017-03-21 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('32Z', 'Factory Sunny Gelato', NULL, '0271 7461387', '', 'Jl. Setiabudi No. 82 Gilingan Banjarsari', 'Surakarta', '', 'Kiddos Card', NULL, '2017-03-22 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('330', 'Coca Cola , CV', '2.2', '029-8523333', '-', 'Jl. Soekarno Hatta Km.30 Ungaran', 'Semarang', '-', 'Berlaku Untuk karyawan dan keluarga', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('331', 'Yayasan Kalam Kudus', '2.2', '0271-633018', '-', '-', 'Solo', '-', 'Berlaku untuk seluruh siswa dan karyawan', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('332', 'Indah Jati, CV', '2.2', '-', '-', 'Ngandonsari RT 02/VI Wiragunan', 'Kartosuro, Solo', '-', 'Berlaku untuk karyawan dan staff   Rawat Inap maksimal 3 hari atau maksimal 1juta', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('333', 'PLN, PT', '2.2', '-', '-', 'Jl. Slamet Riyadi 468', 'Solo', '-', 'Berlaku untuk karyawan', '4', '2009-09-05 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('334', 'Toyota Nasmoco', '2.2', '-', '-', 'Jl. Slamet Riyadi 558', 'Solo', '-', 'Berlaku untuk karyawan dan staff', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('335', 'Teras Adhi Karisma, PT', '2.2', '-', '-', 'Jl. Raya Solo-Boyolali No. 142', 'Boyolali', '', 'Berlaku untuk karyawan dan staff', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('336', 'Perkebunan, PT', '2.2', '0272-321806 / 322236 / 321252', '0272-322203', 'Jl. Pemuda Selatan No. 59 ', 'Klaten', '-', 'Untuk pasien rawat jalan (IGD & Gigi) blangko diisikan dokter  Untuk Pasien dokter spesialis harus membawa surat keterngan dari perusahaan yang di tandatangani dokter klinik.', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('337', 'Ritra Cargo Indonesia, PT', '2.2', '0271-780957', '-', 'Jl. LU. Adi Sucipto no. 112 Colomadu', 'Karanganyar', '-', 'Berlaku untuk karyawan dan keluarga', '4', '2009-07-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('338', 'Indosat, PT', '2.2', '0271-731816', '0271-731815', 'Jl. Slamet Riyadi No.417-419 ', 'Solo 57142', '-', 'Kamar Super VIP harga Rp. 400.000  Kamar VIP harga Rp. 240.000  Rawat Inap bayi  VIP harga Rp. 40.000 / Rp. 36.000  Konsultasi dokter spesialis Rp. 50.000 (pagi), Rp. 80.000 (sore)  Konsultasi dokter umum/emergency Rp. 17.500  Biaya administrasi rawat jalan gratis', '4', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('339', 'TASPEN ( PERSERO ), PT', '2.2', '( 0271 ) 714189', '( 0271 ) 711751', 'Jl.Veteran 305', 'Surakarta', '-', '* Berlaku untuk Karyawan dan pensiunan   * Jika pasien dirujuk dalam satu lingkup yayasan kesehatan Panti Kosala, maka pasien tidak perlu membayar biaya pelayanan Rumah Sakit.', '4', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('33A', 'Factory Sunny Gelato', NULL, '0271 7461387', '', 'Jl. Setiabudi No. 82 Gilingan Banjarsari', 'Surakarta', '', 'Pelayanan Kesehatan Karyawan', NULL, '2017-03-22 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33B', 'RM Malioboro', NULL, '0271 725 498', '', 'Jl. RM Said 138 Surakarta', 'Surakarta', '', 'Kiddos Card', NULL, '2017-03-22 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33C', 'Oasis Developing Center', NULL, '0271 6726179', '', 'Jl. Melati Raya BF 11 Solobaru 57552', 'Sukoharjo', '', 'Kiddos Card', NULL, '2017-03-22 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33D', 'PT. Darya-Varia Laboratoria Tbk', NULL, '021 22768000', '', 'South Quarter Tower C 18-19 th Floor Jl. RA Kartini Kav 8', 'Jakarta 12430', '', 'Surat Jaminan', NULL, '2017-03-31 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('33E', 'PPA IO 942 GBIS', NULL, '0271 740810', '', 'Jl. Cocak II/42 Sambeng, Solo 57139', 'Surakarta', 'io_942@yahoo.co.id', 'pemeriksaan kesehatan rutin anggota PPA IO 942 GBIS dan fasilitas potongan harga 5% pelayanan kesehatan di RSPW', NULL, '2017-05-27 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('33F', 'Popipop Noodles Soup', NULL, '0857 2742 9443', '', 'Jl. Adi Sumarmo No. 110 Komplang, Kadipiro, Surakarta', 'Surakarta', 'popipopnusukan@gmail.com', 'Kiddos card', NULL, '2017-05-27 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33G', 'STT INTHEOS', NULL, '0271 854051', '', 'Jl. Letjen Sutoyo RT 03 RW XIV Kadipiro, Surakarta', 'Surakarta', 'infosttintheos@ac.id', 'Pelayanan Kesehatan karyawan dan mahasiswa', NULL, '2017-05-27 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33H', 'Kedainya Mbokdhe', NULL, '08985458883', '', 'Jl Nias II/2 RT 02 RW 14 Gilingan Solo', 'Surakarta', '', 'Kiddos Card', NULL, '2017-05-27 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33I', 'PT. ASURANSI RAMAYANA Tbk (Admedika)', NULL, '021 3913864', '', 'Jl. Kebon Sirih No.49 Jakarta Pusat 10340', 'Jakarta', 'provider@ramayanains.com', '', NULL, '2017-05-27 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33J', 'Toko Buku Kristen Sion', NULL, '', '', 'Jl. Mr. Moh. Yamin No. 1 Kratonan Serengan Surakarta', 'Surakarta', '', 'Kiddos Card', NULL, '2017-05-27 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33K', 'PT. HANJAYA MANDALA SAMPOERNA Tbk.', NULL, '031 8431699', '', 'Jl. Rungkut Industri Raya 18 Surabaya', 'Surabaya', 'yourHR.Asia@pmi.com', 'pelayanan khusus rawat inap', NULL, '2017-05-29 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('33L', 'PT. PHILIP MORRIS INDONESIA', NULL, '031 8431699', '', 'Jl. Rungkut Industri Raya 18 Surabaya', 'Surabaya', 'yourHR.Asia@pmi.com', 'Rawat Inap', NULL, '2017-05-30 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33M', 'PT. SAMPOERNA INDONESIA SEMBILAN', NULL, '031 8431699', '', 'Jl. Rungkut Industri Raya 18 Surabaya', 'Surabaya', 'yourHR.Asia@pmi.com', 'Rawat Inap', NULL, '2017-05-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('33N', 'SD Kristen Widya Wacana Jamsaren', NULL, '0271 652144', '', 'Jl. Veteran 174-176 Surakarta', 'Surakarta', '', 'Pemeriksaan umum dan kiddos card', NULL, '2017-05-30 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33O', 'JR-BPJSTK', NULL, '', '', '', '', '', '', NULL, '2018-04-24 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('33P', 'JKN Jamkes', NULL, '', '', '', '', '', '', NULL, '2018-04-30 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33Q', 'AA International (Medlinx)', NULL, '021-2927 9600', ' 021-5275 523 / 5275 524', 'TIFA Building, 10th floor, Room 1003. Jl.Kuningan Barat I No. 26, Mampang Prapatan, \r\n', 'Jakarta Selatan 12710, Indonesia', 'provider-networks@aa-international.co.id', '', NULL, '2018-07-12 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('33R', 'PT. Surya Gilang Perkasa ', NULL, '0271 7229570', '021 7229574', 'Apartemen Dharmawangsa J Damrmawangsa VIII Keluarahan Pulo Kebayoran Baru', 'Jakarta Selatan', 'general@ptsgp.co.id ; aa4455992@gmail.com', '', NULL, '2018-10-08 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('33S', 'KSO Adhi Penta', NULL, '0271 7788189', '', 'Jl. Adi Sucipto manahan Banjarsari', 'Surakarta', 'adhi.manahansolo@gmail.com', 'Semua perawatan dengan kelengkapan : Surat pengantar dan identitas', NULL, '2018-12-19 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('33T', 'Dewhirst Group Menswear Limited', NULL, '021 57948108', '', 'Menara Pertiwi 27th Floor Jl. Mega Kuningan Barat III Kav 10.1  No. 3 Kawasan Mega Kuningan', 'Jakarta Selatan 12950', '', 'Kerjasama Medical Check Up', NULL, '2018-12-19 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('341', 'Blue Dot  ( PT. INSAN DHARMA NUSA ) Jakarta- Asuransi ', '2.2', '( 021 ) 2556800', '( 021 ) 56982499', 'Blue Dot Centre - Blok K,L,M Jl.Gelongan Baru Utara Np 5-8 Tomang, Jakrta Barat 11440', 'Jakarta Barat', '-', 'Memiliki 5 Rekanan Asuransi ( Sinar Niaga, AXA, BTPN, Bumiputera ) ', '3', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('342', 'TIRTA MEDICAL CENTRE, PT', '2.2', '021 5377479', '', 'Kawasan Niaga Villa Melati Mas Square,Jl.Raya Serpong ', 'Tangerang ', '', 'pELAYANAN rAWAT jALAN & rAWAT iNAP', '3', '2013-12-05 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('343', 'Gesa Assistance-Asuransi', '2.2', '( 021 ) 3160033', '( 021 )31901036', 'Menara Kebon Sirih Lantai 17 jl.Kebon sirih No.17-19 ', 'Jakarta Pusat', '-', 'Memiliki rekanan asuransi ( Rama Satria Wibawa, AIA, AIG, Syariah Mubarakah, Reliance, Bringin Life, Expacare, Takaful Keluarga, Bumida, Bintang, Raksa ) ', '3', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('344', 'GLOBAL Assistance - Asuransi', '2.2', '( 021 ) 7828868', '( 021 ) 7829332', 'Graha Simatupang Tower 1D 18th Floor Jl.Letjen T.B. Simatupang Kav.38', 'Jakarta-12540', 'provider.services@Global-Asssistance.net', 'Memiliki rekanan asuransi (  Rama Satria Wibawa, AIA, AIG, Syariah Mubarakah, Reliance, Bringin Lofe, Expacare, Takaful Keluarga, BUMIDA, Bintang, Raksa ', '3', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('345', 'ADMEDIKA', '2.2', '( 021 ) 57933290', '( 021 ) 579 33288', 'Arthaloka Building 15th Floor, Suite 1508 Jl.Jendral Sudirman Kav 2', 'Jakarta 10220', 'provider_team@admedika.co.id    Customer Service_service@admedika.co.id', 'memiliki asuransi rekanan : Winterthue, Manulife, Allianz, Asuransi Jiwa Recapital, Pacific, Lippo General, Bakrie Life, Reliance, XA, AIA, Takaful Keluaraga, Equity, Medipro, Megalife, AJ.Sinar Mas, ABDA, BNI Life, PT.Pindo Deli, AIG, CIU, Generali Indonesia', '3', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('346', 'Astra Buana', '2.2', '( 021 ) 75900800 ext. 6060-6062', '( 021 ) 7660005', 'Grha Asuransi Astra Jalan TB Simatupang Kav.15 Cilandak Barat Jakarta 12430', 'Jakarta', 'sandrawati@asuransi.astra.co.id  spurbasari@auransi.astra.co.id', '', '3', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('347', 'Megalife- Insurance', '2.2', '( 021 ) 79175577', '( 021 ) 79193700', 'Jl.Kapten Tendean Kav.12-14A ', 'Jakarta Selatan 12790', 'yuliana@megalife.co.id', 'Untuk pasien Rawat Inap jika telah mencapai 5000000 segera memberitahukan kepada pihak asuransi dengan melampirkan rincian dan diagnosa sementara   Jika pasien Rawat Jalan telah mencapai 500000  maka pihak Rumah Sakit memberitahukan pihak asuransi dengan melampirkan perincian dan diagnosa sementara', '3', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('348', 'EASCO MEDICAL - Asuransi', '2.2', '( 021 ) 2521031 / ( 021 ) 5228145', '( 021 ) 5225652', 'Century Tower Lt.9, Jl.H.R Rasuna Said Kav. X-2 No.4 Jakarta 12950', '12950', 'nea@easco-medical.com  iskandar@easco-medical.com', '', '3', '2009-09-05 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('349', 'MEDIPRO', '2.2', '( 021 ) 2514638', '( 021 ) 2514632', 'Wisma Sudirman Lt.3, Jl. Jend.Sudirman Kav 34, Jakarta 10220', 'Jakarta', '', 'discount 5% dari besarnya nilai nominal tagihan  Apabila biaya perawatan lebih dari 3000000 dan kelipatannya maka pihak Rumah Sakit wajib memberitahukan kepada asuransi ', '3', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('350', 'AJ.Sinar Mas', '2.2', '( 021 ) 6257808', '( 021 ) 6257837', 'Wisma Eka Jiwa Lt.8 Jl.Mangga Dua Raya ', 'Jakarta 10370', '', '', '3', '2010-03-13 00:00:00', NULL, NULL, '0062', 1, '3');
INSERT INTO `pubpng` VALUES ('351', 'BNI Life', '2.2', '( 021 ) 5366-7676  ( 021 ) 5366-7666', '( 021 ) 53667656', 'Jl.AIPDA Ks.Tubun No.67 Petamburan- ', 'Jakarta 10260', '', '', '3', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('352', 'Bringin Life', '2.2', '( 021 ) 5261260', '( 021 ) 52907235', 'Jl.HR.Rasuna Said Blok X-1 Kav.1&2 ', 'Jakarta Selatan', '', 'Untuk pensiunan BRI \r\nJika Pasin tidak termasuk Pasien BRI, Sistem Rembruistment', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('353', 'Bumiputeramuda', '2.2', '(  0271 ) 725487', '( 0271 ) 738282', 'Jl. letjen Suprapto No.15', 'Solo', '', '', '4', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('354', 'CAR-Asuransi', '2.2', '021-56968998', '( 021 ) 56961939', 'Wisma CAR Life Insurance, Blok A-C Jl.Gedong Baru Utara Kav.5 - 8 Tomang ', 'Jakarta Barat 11440', '', '', '3', '2009-09-05 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('355', 'CIU-Asuransi ( Citra International Underwriter )', '2.2', '( 021 ) 3915354', '( 021 ) 3929941', '9th Floor Menara Kebun Sirih 17-19 Jakarta 10340 ', 'Jakarta', '', 'Rawat Inap & Rawat Jalan', '3', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('356', 'Allianz-Asuransi ', '2.2', '( 021 ) 52998888', '( 021 ) 30003400 ', 'Summitmas II, 20th Floor Jl.Jendral Sudirman Kav 61-62 ', 'Jakarta 12190', 'contactus@allianz.co.id', 'segala pelayanan peserta tertera pada kartu', '3', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('357', 'Sinar Mas', '2.2', '( 021 ) 6257687', '( 021 ) 6257589', 'Wisma Eka Jiwa Lt.9 Jl.Mangga Dua Raya', 'Jakarta 10730', '', '', '3', '2009-07-30 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('358', 'Sinar Mas ( Admedika ) ', '2.2', '( 021 ) 6257687', '( 021 ) 6257589', 'Wisma Asuransi Sinar Mas, Jl.Fachrudin No.18 ', 'Jakarta Pusat', '', '* Mendapat potongan 10% untuk biaya pengobatan dari pasien \r\n* Penagihan dilakukan setiap 3 bulan  ( Rawat Jalan )\r\n', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('359', 'ASKES SOSIAL', '2.2', '', '', '', '', '', '3 grup', '6', '2010-03-13 00:00:00', NULL, NULL, '0062', 1, '3');
INSERT INTO `pubpng` VALUES ('360', 'Bank BNI', '2.2', '090909', '000000', 'Jl.D', 'Solo', 'ww.', '', '4', '2009-08-27 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('361', 'AVIVA (Admedika)', '2.2', '( 021 ) 5221850', '( 021 ) 5225281', 'Gdg Asuransi Wahana Tata Jl.HR.Rasuna Said Kav.C4 Jakarta 12920', 'Jakarta', '-', 'Klaim dikirimkan ke Admedika', '3', '2014-01-07 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('362', 'Manulife ( Admedika )', '2.2', '021-2555 7788', '021-2555 2233', 'Sampoerna Startegic square, south tower. Jl.Jendral Sudirman Kav.45 ', 'Jakarta', '', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('363', 'Allianz ( Admedika )', '2.2', '021-300 03456', '021-300 03457', 'Summits II Lt.19 Jl.Jendral Sudirman Kav.61-62', 'Jakarta 12190', '-', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('364', 'Asuransi Jiwa Recapital', '2.2', '021-725 6272', '021-725 3858', 'Recapital Building Lt.7 Jl.Adityawarman No.53,55,57 ', 'Jakarta', '', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('366', 'Medipro Advice', '2.2', '021-573 9288', '021-570 0672', 'Wisma Sudirman 3rd Floor\r\nJl.Jendral Sudirman Kav 34', 'Jakarta, 10220', '-', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('367', 'Megalife ( Admedika )', '2.2', '021-83702557', '021-83706162, 83706251, 83706421', 'Rukan Royal Palace Blok C6/C7/C31\r\nJl.Dr.Soepomo No.178A-Tebet', 'Jakarta Selatan', '-', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('368', 'Asuransi Jiwa Sinar Mas ( Admedika )', '2.2', '021-6257808', '021-6257837', 'Wisma Eka Jiwa Lt.8 \r\nJl.Mangga Dua Raya ', 'Jakarta 10730', '-', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('369', 'Pacific ( Admedika )', '2.2', '021-515 5252', '021-515 5757', 'Plaza ABDA Lt.8 Suite D Jl.Jend.Sudirman Kav.59 ', 'Jakarta 12190', '', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('370', 'Lippo General ( Admedika )', '2.2', '021-5579 0672', '021-5579 0679', 'Karawaci Office Park Blok I No.30-35\r\nLippo Karawaci', 'Tangerang', '-', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('371', 'Bakrie Life ( Admedika )', '2.2', '021-5155501', '021-5155404', 'Artha Graha Building 7th Floor \r\nSudirman Central Business Distric ', 'Jakarta 12190', '', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('372', 'Reliance', '2.2', '021-57930018', '021-579930019', 'Menara Batavia 27th Floor\r\nJl.KH.Mas Mansyur Kav.126', 'Jakarta 10220', '', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('373', 'AXA Financial ( Admedika )', '2.2', '021-72783888', '021-7267234', 'AXA Centre, Ratu Plaza Office Building 2nd Floor\r\nJl.Jendral Sudirman No.9', 'Jakarta 10270', '', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('374', 'AIA Indonesia ( Admedika )', '2.2', '021-5789 8188', '021-574 1738', 'Gd.Bank Panin Senayan Lt.8\r\nJl.Jendral Sudirman', 'Jakarta 10270', '', 'Pengiriman klaim ke Admedika ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('375', 'AIA Indonesia ( Admedika )', '2.2', '021-5789 8188', '021-574 1738', 'Gd.Bank Panin Senayan Lt.8 \r\nJl.Jendral Sudirman', 'Jakarta 10270', '', 'Pengiriman klaim ke AIA', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('376', 'ABDA ( Admedika )', NULL, '021-51401688', '021-51401680 / 30188686 ( 24 jam )', 'Plaza ABDA, 27th Floor\r\nJl.Jendral Sudirman Kav 59', 'Jakarta 12190', 'provider_ah@abdainsurance.co.id', 'Konfirmasi ke ABDA, Pengiriman klaim ke ABDA', NULL, '2017-11-01 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('377', 'Takaful ( Admedika )', '2.2', '021-7991234 / 7992345', '021-7901435', 'Jl.Mampang Prapatan Raya No.100', 'Jakarta 12790', '-', 'Pengiriman Klaim ke Asuransi Takaful Langsung', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('379', 'CIU ( Admedika )', '2.2', '021-3915354', '021-3929941', '9th Floor Menara Kebun Sirih\r\nJl.Kebun Sirih 17-19', 'Jakarta 10340', '', 'pengiriman klaim langsung ke CIU', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('380', 'AIG ( Admedika ), PT', '2.2', '021-5789 8188', '021-574 1738', 'Gedung Bank Panin Senayan Lt.3\r\nJl.Jendral Sudirman', 'Jakarta 10270', '-', 'pengiriman klaim langsung ke AIG', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('381', 'Pindo Deli, PT', '2.2', '021-30068011, 30068401', '0267-440839', 'Desa Kuta Mekar BTB 6-9, Karawang 41361\r\n', 'Jawa Barat', '', 'pengiriman klaim langsung ke PT.Pindo Deli', '4', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('382', 'BNI Life Insurance, PT', '2.2', '021-53667676', '021-53667677', 'Gedung BNI Life Insurance\r\nJl.Aipda K.S Tubun No.67', 'Jakarta Pusat 10260', '', 'pengiriman klaim langsung ke BNI Life Insurance ', '3', '2009-08-29 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('383', 'Equity Life Rawat Inap (Individu)', NULL, '021-5739288', '021-5734865', 'Sahid Sudirman Center Lt.20 & Lt.25\r\nJl. Jend. Sudirman No. 86 ', 'Jakarta 10220', 'customer.care@admedika.co.id // equity@admedika.co.id', 'Pengiriman klaim ke Admedika', NULL, '2017-11-01 00:00:00', NULL, NULL, '', 1, NULL);
INSERT INTO `pubpng` VALUES ('384', 'Equity ( Admedika )', NULL, '021-2960 3232', '021- 351 0886', 'Sahid Sudirman Center Lt. 20 & Lt. 25\r\nJl. Jend Sudirman No. 86\r\n', 'Jakarta 10220', 'customer.care@admedika.co.id // equity@admedika.co.id', 'Rawat inap dan Rawat Jalan. Konfirmasi penjaminan ke Admedika. Pengiriman klaim ke Equity', NULL, '2017-11-01 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('385', 'AVIVA ( AEA ) ', '2.2', '021-\r\n021-5221851', '021-5224875', 'Jl.HR.Rasuna Said Kav.C4', 'Jakarta 12920', 'customer.id@winterthur.co.id', 'Semua Pengiriman klaim ditujukan ke AEA, dan menggunakan formulir AEA ', '3', '2014-01-07 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('386', 'MAA ( AEA )', '2.2', '021-75902223', '021-7506002 /03', 'Jl.Puri Sakti 10 Cipete ', 'Jakarta 12410', '-', 'Pengiriman klaim ke AEA ', '3', '2009-08-31 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('387', 'Dayin Mitra (  AEA )', '2.2', '021-7658706', '021-7506002/03', 'Jl.Puri Sakti 10 Cipete ', 'Jakarta 12410', '-', 'Pengiriman klaim ke AEA', '3', '2009-08-31 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('388', 'PPA BANARAN', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('390', 'Cifor Pacific Int. - AEA', '2.2', '021-7505998', '021-7506002 / 03', 'Jl.Puri Sakti 10 Cipete ', 'Jakarta 12410', '-', 'Pengiriman klaim ke AEA', '3', '2009-08-31 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('391', 'Freeport - AEA', '2.2', '021-7659163', '021-7506002 / 03', 'Jl.Puri Sakti 10 Cipete ', 'Jakarta 12410', '', 'Pengiriman klaim ke AEA', '3', '2009-08-31 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('392', 'Newmont-AEA', '2.2', '021-7696619', '021-7506002 / 03', 'Jl.Puri Sakti 10 Cipete', 'Jakarta 12410', '-', 'Pengiriman klaim ke AEA', '3', '2009-08-31 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('393', 'Gesa Assistance', '2.2', '021-3160033 / 08001402919', '021-31901036', 'Jl.Menara Kebon Sirih No.17-19 Lantai 17', 'Jakarta 10340', '-', 'Memiliki Rekanan Perusahaan Asuransi, adalah : Rama Satria Wibawa, AIA, AIG, Syariah Mubarakah, Reliance, Bringin Life, Expacare, Takaful Keluarga, Bumida, Bintang, Raksa   ', '3', '2009-08-31 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('396', 'AIA-Gesa Asistance', '2.2', '021-57898188', '0215741738', 'jl.Jendral Sudirman ', 'Jakarta 10270', '-', 'Pengiriman klaim ke Gesa Assistance', '3', '2009-08-31 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('397', 'AIG-Gesa Assistance', '2.2', '021-3160033 / Gesa Assistance', '021-31901036 / Gesa Assistance', 'Jl.Menara Kebon Sirih No.17-19 Lantai 17 ', ' Jakarta 1034', '', 'Pengiriman klaim ke Gesa Assistance dan untuk Formulir menggunakan Gesa Assistance   ', '3', '2009-08-31 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('398', 'Syariah Mubarakah - Gesa Assistance', '2.2', '021-3160033 / Gesa Assistance', '021-31901036', 'Jl.Menara Kebon Sirih No.17-19 Lantai 17', 'Jakarta 10340', '-', 'Pengiriman klaim ke Gesa Assistance dan untuk Formulir menggunakan Gesa Assistance   ', '3', '2009-08-31 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('399', 'Reliance ( Gesa Assistance ) )', '2.2', '-', '-', 'Menara Batavia Lt.27\r\nJl.KH.Mas Mansyur Kav.126', 'Jakarta 10220', '-', 'Pengiriman klaim ke Gessa Assisance  Dan menggunakan formulir  Gessa Assistance', '3', '2009-09-02 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('400', 'Bringin Life ( Gesa Assistance )', '2.2', '021-526 1260, 021-526 1261', '021-526 1258, 021-527 5676', 'Graha Irama, Lantai 5 & 15 \r\nJl.H.R Rasuna Sais Blok X-1, Kav.1&2', 'Jakarta 12950', '', 'Untuk Pengiriman klaim, dikirimkan di Gesa Assistance dan formulir menggunakan Gesa Assistance ', '3', '2009-09-02 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('401', 'Expacare ( Gesa Assistance )', '2.2', '021-3160033 ( Gesa Insurance ) ', '021-31901036', 'Jl.Menara Kebon Sirih No.17-19 Lantai 17', 'Jakarta 10340', '-', 'Pengiriman klaim ke Gessa  Dan menggunakan formulir  Gessa ', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('403', 'Takaful Keluarga ( Gesa Assistance )', '2.2', '( 021 ) 7991234 ext 109', '-', 'Graha Takaful Indonesia, Jalan Mampang Prapatan Raya Nomor 100 Jakarta Selatan', 'Jakarta Selatan', '-', 'Pengiriman klaim ke Gesa Assistnace Dan menggunakan formulir Gesa Assistance', '3', '2010-03-13 00:00:00', NULL, NULL, '0062', 1, '3');
INSERT INTO `pubpng` VALUES ('404', 'Bumida ( Gesa Assistance )', '2.2', '0271-725487 ( Bumida )\r\n021-3160033 ( Gesa Assiatnace ) ', '0271-738282 ( Bumida )\r\n021-31901036 ( Gesa Assistance )', 'Jl.Letjen Suprapto No.15 Solo ( Bumida )\r\nJl.Menara Kebon Sirih No.17-19, Lantai', 'Jakarta 1034', '-', 'Pengiriman klaim ke Gesa Assistance Dan menggunakan formulir Gesa Assistance', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('405', 'Bintang ( Gesa Assistance )', '2.2', '021-3160033 ( Gesa Assistance )', '021-31901036 ( Gesa Assistance )', 'Gesa Assistance ; Jl.Menara Kebon Sirih No.17-19 Lantai 17', 'Jakarta 10340', '-', 'Pengiriman klaim ke  Gesa Assistance  Dan menggunakan formulir Gesa Assistance ', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('406', 'Raksa ( Gesa Assistance ) ', '2.2', '021-3160033 ( Gesa Assistance )', '021-31901036 ( Gesa Assistance )', 'Gesa Assistance : JL.Menara Kebon Sirih No.17-19, Lantai 17', 'Jakarta ', '-', 'Pengiriman klaim ke Gesa Assistance  Dan menggunakan formulir Gesa Assistance', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('407', 'Sinar Niaga ( Blue Dot ) ', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Blue Dot Dan menggunakan formulir Blue Dot\r\n2) Untuk data perusahaan, Melalui Blue Dot \r\n', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('408', 'AXA ( Blue Dot )', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Blue Dot Dan menggunakan formulir Blue Dot\r\n2) Untuk data perusahaan, Melalui Blue Dot\r\n', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('409', 'MAA ( Blue Dot )', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Blue Dot Dan menggunakan formulir Blue Dot\r\n2) Untuk data perusahaan, Melalui Blue Dot\r\n\r\n', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('40A', 'Darya-Varia Lab PT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('410', 'BTPN ( Blue Dot )', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Blue Dot Dan menggunakan formulir Blue Dot\r\n2) Untuk data perusahaan, Melalui Blue Dot\r\n\r\n', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('411', 'Bumiputera ( BLUE DOT )', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Blue Dot Dan menggunakan formulir Blue Dot\r\n2) Untuk data perusahaan, Melalui Blue Dot\r\n\r\n', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('412', 'AJ.Nusantara ( BLUE DOT )', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Blue Dot Dan menggunakan formulir Blue Dot\r\n2) Untuk data perusahaan, Melalui Blue Dot\r\n\r\n', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('413', 'Jaya Proteksi ( Blue Dot )', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Blue Dot Dan menggunakan formulir Blue Dot\r\n2) Untuk data perusahaan, Melalui Blue Dot\r\n\r\n', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('414', 'Managecare ( Bludot )', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Blue Dot Dan menggunakan formulir Blue Dot\r\n2) Untuk data perusahaan, Melalui Blue Dot\r\n\r\n', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('415', 'Pacific Insurance ( Blue Dot )', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Blue Dot Dan menggunakan formulir Blue Dot\r\n2) Untuk data perusahaan, Melalui Blue Dot\r\n\r\n', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('416', 'Mayapada Life - Blue Dot', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Blue Dot Dan menggunakan formulir Blue Dot\r\n2) Untuk data perusahaan, Melalui Blue Dot\r\n\r\n', '3', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('417', 'Relife ( Blue Dot )', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Blue Dot Dan menggunakan formulir Blue Dot\r\n2) Untuk data perusahaan, Melalui Blue Dot\r\n\r\n', '4', '2009-09-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('419', 'Danliris , PT', '2.2', '0271-714400', '-', 'Selatan Laweyan Banaran Grogol ', 'Sukoharjo-Solo', '-', 'Dijamin PT. Haedlent Medika Husada ', '4', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('420', 'Tyfountex, PT', '2.2', '0271-716888', '-', 'Gumpang Kartasura Sukoharjo PO BOX 212', 'Solo', '-', 'Menggunakan ASKES ALBA ( Rawat Inap dan Rawat Jalan )\r\nMenggunakan JAMSOSTEK ( Kecelakaan Kerja )', '4', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('421', 'Ambassador, PT', '2.2', '0271-731418', '-', 'Banaran Cemani Grogol Sukoharjo', 'Solo', '-', 'Dijamin PT.Hardlent Medika Husada', '4', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('422', 'Global Assistance', '2.2', '021-782 8868', '021-782 9332', 'Graha Simatupang Tower 1D 8th Floor Jl.Letjen T.B Simatupang Kav.38', 'Jakarta 12540', 'Provider.Services@Global-Assistance.net', 'Memiliki  Rekanan Perusahaan : Rama Satria Wibawa, AIA, AIG, Syariah Mubarakah, Reliance, Bringin Life, Expacare, Takaful Keluarga, Bumida, Bintang, Raksa ', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('423', 'Rama Satria Wibawa ( Global Assistance )', '2.2', '-', '-', '-', '-', '-', '\r\n1)Pengiriman klaim ke Global Assistance  Dan menggunakan formulir Global Assistance\r\n2) Untuk data perusahaan, Melalui Global Assistance \r\n\r\n\r\n', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('424', 'AIA-Global Assistance', '2.2', '021-5789 8188', '021-574 1783 / 739 7116', 'Gd.Bank Panin Senayan Lt.3. Jl.Jenral Sudirman Jakarta 1270', 'Jakarta 1270', '-', '1)Pengiriman klaim ke Global Assistance Dan menggunakan formulir  Global Assistance', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('425', 'AIG-Global Assistance ', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Global Assistance Dan menggunakan formulir Global Assistance\r\n2) Untuk data perusahaan, Melalui Global Assistance\r\n\r\n\r\n\r\n', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('426', 'Syariah Mubarakah ( Global Assistance )', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Global Assistance Dan menggunakan formulir Global Assistance\r\n2) Untuk data perusahaan, Melalui Global Assistance\r\n', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('427', 'Reliance-Global Assistance', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Global Assistance Dan menggunakan formulir Global Assistance\r\n2) Untuk data perusahaan, Melalui Global Assistance\r\n', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('428', 'Bringin Life ( Global Assistance )', '2.2', '021-526 1260, 021-526 1261', '021-526 1258, 021-527 5676', 'Graha IramaLantai 5 Jl.HR.Rasuna Said Blok X-1, Kav. 1&2 ', 'Jakarta 12950', '-', '1)Pengiriman klaim ke Global Assistance Dan menggunakan formulir Global Assistance\r\n2) Untuk data perusahaan, Melalui Global Assistance\r\n\r\n', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('429', 'Expacare- Global Assistance', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Global Assistance Dan menggunakan formulir Global Assistance\r\n2) Untuk data perusahaan, Melalui Global Assistance\r\n\r\n', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('430', 'Takaful Keluarga-Global Assistance', '2.2', '021-7991234 / 021-7992345', '-', 'Graha Takaful Indonesia, Jalan Mampang Prapatan Raya Nomor 100 ', 'Jakarta Selatan', '-', '1)Pengiriman klaim ke Global Assistance Dan menggunakan formulir Global Assistance\r\n2) Untuk data perusahaan, Melalui Global Assistance\r\n', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('431', 'Bumida ( Global Assistance )', '2.2', '0271-725487 ( Bumida ) / 021-7828868 ( Global Assistance )\r\n', '0271-738282 - Bumida / 021-7829332', 'Bumida : Jl.Letjen Suprapto No.15  solo\r\nGlobal Asistance : Graha Simtupan Tower 1D 8th Floor, Jl.Letjen T.B Simatupang Kav.38 Jakarta 12540', '', '-', '1)Pengiriman klaim ke Global Assistance Dan menggunakan formulir Global Assistance\r\n2) Untuk data perusahaan, Melalui Global Assistance\r\n', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('432', 'Bintang-Global Assistance', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Global Assistance Dan menggunakan formulir Global Assistance\r\n2) Untuk data perusahaan, Melalui Global Assistance\r\n', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('433', 'Raksa-Global Assistance', '2.2', '-', '-', '-', '-', '-', '1)Pengiriman klaim ke Global Assistance Dan menggunakan formulir Global Assistance\r\n2) Untuk data perusahaan, Melalui Global Assistance\r\n\r\n', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('434', 'Bumi Asih Jaya ', '2.2', '021-2800700', '021-8509667, 021-8509669', 'Wisma Bumi Asih Jaya 1967, Jl.Mataram Raya No.165-167 Jakarta 13140', 'Jakarta', '-', '-', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('435', 'Takaful Keluarga', '2.2', '021-7991234 / 021-7992345', '-', 'Graha Takaful Indonesia, Jalan Mampang Prapatan Raya Nomor 100 ', 'Jakarta Selatan', 'marlia@takaful.com', '-', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('436', 'Lippo General', '2.2', '021-55790672, 021-55790683', '021-55790682, 021-55790679', 'Karawaci Office Park Blok I/30-35 Karawaci, Tangerang 15139', 'Tangerang', '-', '-', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('437', 'Wanaartha Assistance Healthcare', '2.2', '021-79196322 , ( 021 ) 7985179 Ext.333', '021-7995107', 'Jl.Mampang Raya No.76', 'Jakarta Selatang 12790', 'health.assistance@wanaarthalife.com', 'Klaim Rawat Jaln dilakukan 2x atau lebih dalam setiap bulan ', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('438', 'Mayapada Life', '2.2', '021-5262626', '021-5212131', 'Jl.Jendral Sudirman Kav.28 Jakarta 12920', 'Jakarta', '-', 'Terdapat Potongan 5% untuk tagihan rawat jalan dan Rawat Inap', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('439', 'AJ.Generali Indonesia, PT', '2.2', '021-3524009 / 021-3859824', '021-3502258', '-', 'Jakarta', 'cs@generali.co.id', 'diskon 5% untuk Rawat Inap', '3', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('440', 'BPJS KETENAGAKERJAAN', '2.1', '0271-736637', '0271-716261', 'Jl.Bayangkara 42 ', 'Solo', '-', 'Hanya Untk Kecelakaan Kerja', '6', '2016-04-01 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('441', 'HMO ( PT.Mitra Keluarga Piranti Sehat )', NULL, '021-6545002, 6545003, 6545006', '021-654005', 'Jl.Landas Pacu Timur Kemayoran Jakarta 10630', 'Jakarta', '-', '', NULL, '2017-01-05 00:00:00', NULL, NULL, '0334', 0, '3');
INSERT INTO `pubpng` VALUES ('442', 'Hardlent Medika Husada, PT', '2.2', '0271-648828', '', 'Jl.Arifi No.87A Kepatihan Kulon', 'Surakarta', 'hmhsolo@telkom.net, hmh.solo@yahoo.co.id', 'Terdapat 3 Paket Perawatan\r\n1) Mawar : Rajal dan Ranap ( sistem Rembruistment )\r\n2) Melati : Rajal dan Ranap di kelas III\r\n3)Anggrek: Rajal dan Ranap di kelas II', '4', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('443', 'Pertamina Indonesia, PT', '2.2', '024-3545341 ( Semarang ), 0271-780388 ( Solo )', '024-3568980', 'Semarang : Jl.Pemuda No.114 Semarang\r\nSolo : Jl.Panasan Baru  Ngresep ', 'Semarang', '-', 'peserta PERTAMINA Surakarta membawa :ID Card Pertamina, Surat Pengantar dari Dokter pribadi Pertamin, formulir \r\npeserta PERTAMINA diluar unit Surakarta membawa :ID Card, FASKES ( Fasilitas Kesehatan ) , Surat Pengantar dari Dokter pribadi Pertamina, Formulir\r\n                \r\n', '4', '2009-09-04 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('444', 'Takeda Indonesia, PT', '2.2', '0274-583504, 021-5267656', '-', 'Plaza DM Lt.15 Jl.Jendral Sudirman Kav.25 ', 'Jakarta 12920', '-', 'Bagi setiap petugas yang menerima pasien, wajib mengubungi Bp Ellen ( 08129908786 / 0274-583504 ) Untuk mendapatkan surat jaminan ', '4', '2009-09-05 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('445', 'Pandawa Water World', '2.2', '021-626955', '-', 'Jl.Cemara Raya Kompleks Pandawa Solo Baru', 'Solo', '-', '-', '4', '2009-09-05 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('446', 'Yayasan Kesehatan Mandiri', '2.2', '021-79199633', '021-79199634, 021-79199635', 'Gedung Bank Mandiri Lt.2, Jl.Mampang  Prapatan Raya No.61', 'Jakarta Selatan 12790', 'layananinformasi@yakesmandiri.co.id', '-Harus menyerahkan surat rujukan yang ditandatangani oleh dokter YAKES MANDIRI, kecuali dalam keadaan darurat\r\n', '4', '2009-09-05 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('448', 'JAMKESMAS', '2.1', '-', '-', '-', '-', '-', '3 grup', '4', '2010-03-13 00:00:00', NULL, NULL, '0062', 1, '2');
INSERT INTO `pubpng` VALUES ('449', 'Kantor  YAKKUM', '2.2', '', '', 'tohudan,colomadu', 'Karanganyar', '', '', '4', '2009-10-06 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('450', 'Yekatria Husada Farma', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', '2009-09-05 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('451', 'Yekatria Farma', '2.2', NULL, NULL, NULL, NULL, NULL, NULL, '4', '2009-09-05 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('452', 'SINODE GKJ', '2.2', '0298 326684 ', '0298 323985', 'Jl. Dr. Sumardi No. 8 & 10, Salatiga ', 'Salatiga', 'sinode@gkj.or.id', 'Pelayanan Rawat Inap & Rawat Jalan ', '3', '2015-09-07 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('453', 'Iskandar Textil Printing, PT.', NULL, '0271', '-', '-', '-', '-', '-', '4', '2009-09-08 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('454', 'Indoveneer, PT.', NULL, '-', '-', '-', '-', '-', '-', '4', '2009-09-08 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('460', 'Gramedia Asri Media, PT.', NULL, '0271-741888', '-', 'Jl.Brigjen Slamet Riyadi No.284', 'Solo', 'gam53@gramedia.com', 'Rawat Inap, Rawat Jalan, Pemeriksaan Gigi', NULL, '2016-09-23 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('461', 'Indo Veener, CV / CV.Indo Jati', NULL, '-', '-', 'Jl.Adi Sucipto ', 'Surakarta', '-', 'Menggunakan Jamsostek ( kecelakaan kerja ) dan ditanggung perusahaan ', '4', '2009-09-11 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('462', 'Solo Murni , PT', NULL, '-', '-', 'Jln.Jend.A.Yani,Kerten ', 'Surakarta', '-', 'menggunakan jamsostek', '4', '2009-09-11 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('463', 'DJITOE, PT / PT.ASIA OFFSET', NULL, '-', '-', 'Jl.LU.Adi Sucipto ', 'Surakarta', '-', 'Menggunakan Jamsostek ( kecelakaan kerja ) dan ditanggung perusahaan', '4', '2009-09-11 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('464', 'MUTU GADING TEXTILE, PT', NULL, '-', '-', 'Jl.Raya Solo-Purwodadi, Gondanganrejo ', 'Karanganyar', '-', 'Menggunakan Jamsostek ( kecelakaan kerja ) dan ditanggung perusahaan Dan Asuransi CAR ', '4', '2009-09-11 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('465', 'Menara, PT.', NULL, '-', '-', 'Jl.Raya Solo-Purwodadi, Ds.Gondangrejo', 'Karanganyar', '-', 'Menggunakan Jamsostek ( kecelakaan kerja ) dan ditanggung perusahaan', '4', '2009-09-11 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('466', 'TRIANGGA DEWI, PT.', NULL, '-', '-', 'Jl.Adi Sucipto ', 'Surakarta', '-', 'Menggunakan Jamsostek ( kecelakaan kerja ) dan ditanggung perusahaan', '4', '2009-09-11 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('467', 'GKI Sangkrah', NULL, '-', '-', '-', 'Solo', '-', '-', '4', '2009-09-15 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('468', 'JASA RAHARJA, PT ', NULL, '0271 719320', '0271 719320', 'Jl. Slamet Riyadi No. 307', 'Surakarta ', '', 'Kerja Sama Pelayanan Kesehatan akibat Kecelakaan ', '4', '2014-02-14 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('469', 'AIRNAV INDONESIA, PT', NULL, '02717889203/783694', '02717889203/783694', 'PRIMKOPAU Permai 1 Ds Tanjungsari Ds.Kaliwungu Kec Ngesrep\r\nKab Boyolali ', 'Boyolali', '', 'Layanan Rawat Inap meliputi \r\n (Ruangan / Pemeriksaan Dokter Umum atau Spesialis/ Penunjang Medis / Obat/ Layanan Gawat Darurat/ Ambulance)\r\n \r\nSyarat Penggunaan Layanan : Surat Pengantar & Kartu Identitas Karyawan ', '4', '2016-03-17 00:00:00', NULL, NULL, '0444', 1, '3');
INSERT INTO `pubpng` VALUES ('470', 'Bank Indonesia', NULL, '0271-647755', '0271-647132', 'Jl.Jendral Sudirman No.4 Solo', 'Solo', '-', 'berlaku untuk pegawai dan pensiunan', '4', '2009-09-28 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('471', 'Cokro Bersaudara ( Bengkel )', NULL, '-', '-', '-', 'solo', '-', '-', '4', '2009-10-03 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('472', 'BFI ', NULL, '-', '-', '-', '-', '-', '-', '4', '2009-10-08 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('473', 'KASIH IBU, RS.', NULL, '( 0271) 714422', '( 0271 ) 717722', 'Jl.Slamet Riyadi no 404', 'Solo', '-', '-', '4', '2009-10-12 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('474', 'Manunggal, PT.', NULL, '-', '-', 'Jl.Solo-sragen kebak kramat', 'Karanganyar', '-', '-', '4', '2009-12-08 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('475', 'BUMITANA GUNAJAYA AGRO, PT.', NULL, '-', '-', 'jl.pasanah RT 24 Kel Sidoarjo, Pangkalan Bun Kalimantan', 'Kalimantan', '-', '-', '4', '2009-12-11 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('476', 'ALFAMART', NULL, '024-8660999', '024-8660888', 'JL.Raya Randu Garut Km 12,5 ', 'Semarang', '-', '-', '4', '2010-01-05 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('477', 'BENGKEL MO-RO', NULL, '085102200052', '-', 'Jalan A Yani 381', 'Surakarta', '-', 'Penagihan maksimal 14 hari', NULL, '2016-09-23 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('478', 'Tjokro Bersaudara', NULL, '', '-', 'Jl. A. Yani 40 Surakarta', 'Surakarta', 'tjokrobersaudara.solo@gmail.com', 'pelayanan kesehatan karyawan', NULL, '2017-01-17 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('479', 'Inhealth Alba', NULL, '', '', '', '', '', '', '3', '2010-01-19 00:00:00', NULL, NULL, '1917', 1, '2');
INSERT INTO `pubpng` VALUES ('480', 'Inhealth Blue', NULL, '', '', '', '', '', '', '3', '2010-01-19 00:00:00', NULL, NULL, '1917', 1, '2');
INSERT INTO `pubpng` VALUES ('481', 'Inhealth Silver', NULL, '', '', '', '', '', '', '3', '2010-01-19 00:00:00', NULL, NULL, '1917', 1, '2');
INSERT INTO `pubpng` VALUES ('482', 'Inhealth Gold', NULL, '', '', '', '', '', '', '3', '2010-01-19 00:00:00', NULL, NULL, '1917', 1, '2');
INSERT INTO `pubpng` VALUES ('483', 'Sumber Tirta', NULL, '', '', '', '', '', '', '4', '2010-01-19 00:00:00', NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('484', 'PKMS GOLD', NULL, '-', '-', '-', '-', '-', '3 grup', NULL, '2017-01-05 00:00:00', NULL, NULL, '0334', 0, '3');
INSERT INTO `pubpng` VALUES ('485', 'PKMS SILVER', NULL, '-', '-', '-', '-', '-', '-', NULL, '2017-01-05 00:00:00', NULL, NULL, '0334', 0, '3');
INSERT INTO `pubpng` VALUES ('486', 'BANK BCA', NULL, '-', '-', '-', '-', '-', '-', '4', '2010-03-31 00:00:00', NULL, NULL, '0062', 1, '3');
INSERT INTO `pubpng` VALUES ('487', 'ANGKASA PURA, PT.', NULL, '(0271) 780400. 780715.781164 ', '784123', 'Bandar Udara Internasional Adi Soemarmo ', 'Solo', 'rosienormancandra@gmail.com', 'Penagihan 14 hari', NULL, '2016-09-23 00:00:00', NULL, NULL, '', 1, '3');
INSERT INTO `pubpng` VALUES ('488', 'Aventis Pharma ( SANOFI AVENTIS ), PT.', NULL, '021-47899802', '021-47899640', 'JL.Jend.A.Yani Pulo Mas Jakarta 13210', 'Jakarta', '-', '-', '4', '2010-04-09 00:00:00', NULL, NULL, '0062', 1, '3');
INSERT INTO `pubpng` VALUES ('489', 'BETHESDA, RS', NULL, '', '', 'YOGYAKARTA', '', '', '', '4', '2010-05-08 00:00:00', NULL, NULL, '0062', 1, '3');
INSERT INTO `pubpng` VALUES ('490', 'Panin Life', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('491', 'Prudential', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, '1917', 1, '3');
INSERT INTO `pubpng` VALUES ('492', 'Widya Raya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('493', 'BANK BRI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('494', 'SOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('495', 'Im Care 177 - Blue Dot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('496', 'GKJ MANAHAN', NULL, NULL, NULL, 'MANAHAN', NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('497', 'Jasindo Health Care', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('498', 'Roemahkoe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('499', 'RS PKU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, '3');
INSERT INTO `pubpng` VALUES ('501', 'Perorangan', '1', '', '', '', '', '', '', '5', '2013-04-02 00:00:00', NULL, NULL, '0211', 1, '1');
INSERT INTO `pubpng` VALUES ('502', 'Paket Persalinan', '1', NULL, NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, 1, '1');
INSERT INTO `pubpng` VALUES ('555', 'Pendeta', '1', NULL, NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, 1, '1');

-- ----------------------------
-- Table structure for resep
-- ----------------------------
DROP TABLE IF EXISTS `resep`;
CREATE TABLE `resep`  (
  `id_resep` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kunjungan` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `biaya_resep` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_resep` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diskon_resep` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_trs` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_resep`) USING BTREE,
  INDEX `id_kunjungan`(`id_kunjungan`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  INDEX `id_resep`(`id_resep`) USING BTREE,
  CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_kunjungan`) REFERENCES `kunjungan` (`id_kunjungan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `resep_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resep
-- ----------------------------
INSERT INTO `resep` VALUES ('R00001', 'RJ000003', 'U008', '2100', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00003', 'RJ000009', 'U008', '3000', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00004', 'RJ000010', 'U008', '8250', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00005', 'RJ000011', 'U008', '27500', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00007', 'RJ000001', 'U009', '3500', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00008', 'RJ000014', 'U008', '3500', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00009', 'RJ000017', 'U008', '3000', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00010', 'RJ000015', 'U008', '15000', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00011', 'RJ000021', 'U008', '21500', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00012', 'RJ000024', 'U008', '18000', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00013', 'RJ000027', 'U008', '77500', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00014', 'RJ000028', 'U008', '7500', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00015', 'RJ000020', 'U008', '36000', NULL, NULL, NULL);
INSERT INTO `resep` VALUES ('R00016', 'RJ000030', 'U008', '9000', '9000', '0', '2020-01-04 00:00:00');
INSERT INTO `resep` VALUES ('R00017', 'RJ000029', 'U008', '', NULL, NULL, '2020-01-05 00:00:00');

-- ----------------------------
-- Table structure for tindakan_medis
-- ----------------------------
DROP TABLE IF EXISTS `tindakan_medis`;
CREATE TABLE `tindakan_medis`  (
  `id_tm` int(11) NOT NULL AUTO_INCREMENT,
  `id_kunjungan` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_petugas` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `poliklinik` enum('umum','gigi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_diagnosis` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_tindakan` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jmlh_tind` int(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tm`) USING BTREE,
  INDEX `id_kunjungan`(`id_kunjungan`) USING BTREE,
  INDEX `id_tindakan`(`id_tindakan`) USING BTREE,
  INDEX `id_diagnosis`(`id_diagnosis`) USING BTREE,
  INDEX `id_diagnosis_2`(`id_diagnosis`) USING BTREE,
  INDEX `id_petugas`(`id_petugas`) USING BTREE,
  CONSTRAINT `tindakan_medis_ibfk_1` FOREIGN KEY (`id_tindakan`) REFERENCES `daftar_tindakan` (`id_tindakan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tindakan_medis_ibfk_2` FOREIGN KEY (`id_kunjungan`) REFERENCES `kunjungan` (`id_kunjungan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tindakan_medis_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas_kesehatan` (`id_petugas`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tindakan_medis_ibfk_4` FOREIGN KEY (`id_diagnosis`) REFERENCES `diagnosis` (`id_diagnosis`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 75 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tindakan_medis
-- ----------------------------
INSERT INTO `tindakan_medis` VALUES (14, 'RJ000003', 'P001', 'gigi', 'K 61.0  ', 'T007', 1);
INSERT INTO `tindakan_medis` VALUES (15, 'RJ000004', 'P004', 'umum', 'N 91.0  ', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (16, 'RJ000005', 'P001', 'umum', 'I 10    ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (17, 'RJ000006', 'P003', 'umum', 'I 10    ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (18, 'RJ000007', 'P002', 'umum', 'I 10    ', 'T011', 1);
INSERT INTO `tindakan_medis` VALUES (19, 'RJ000007', 'P001', 'umum', 'I 10    ', 'T014', 1);
INSERT INTO `tindakan_medis` VALUES (20, 'RJ000008', 'P001', 'umum', 'B 02.9  ', 'T002', 1);
INSERT INTO `tindakan_medis` VALUES (21, 'RJ000008', 'P002', 'gigi', 'I 10    ', 'T007', 1);
INSERT INTO `tindakan_medis` VALUES (22, 'RJ000008', 'P002', 'umum', 'I 95.0  ', 'T006', 1);
INSERT INTO `tindakan_medis` VALUES (23, 'RJ000009', 'P001', 'umum', 'I 10    ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (24, 'RJ000010', 'P001', 'umum', 'I 10    ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (25, 'RJ000010', 'P001', 'umum', 'I 10    ', 'T001', -1);
INSERT INTO `tindakan_medis` VALUES (26, 'RJ000010', 'P001', 'umum', 'I 10    ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (27, 'RJ000011', 'P004', 'gigi', 'K 02.1  ', 'T012', 1);
INSERT INTO `tindakan_medis` VALUES (28, 'RJ000001', 'P003', 'gigi', 'K 02.1  ', 'T010', 1);
INSERT INTO `tindakan_medis` VALUES (29, 'RJ000002', 'P004', 'umum', 'K 02.1  ', 'T015', 1);
INSERT INTO `tindakan_medis` VALUES (30, 'RJ000012', 'P004', 'gigi', 'K 02.1  ', 'T012', 1);
INSERT INTO `tindakan_medis` VALUES (31, 'RJ000012', 'P004', 'gigi', 'K 02.1  ', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (32, 'RJ000012', 'P004', 'gigi', 'K 02.1  ', 'T012', -1);
INSERT INTO `tindakan_medis` VALUES (33, 'RJ000013', 'P004', 'gigi', 'K 61.0  ', 'T016', 1);
INSERT INTO `tindakan_medis` VALUES (34, 'RJ000014', 'P004', 'gigi', 'K 02.1  ', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (35, 'RJ000014', 'P004', 'gigi', 'K 02.1  ', 'T015', 1);
INSERT INTO `tindakan_medis` VALUES (36, 'RJ000017', 'P004', 'gigi', 'K 05.6', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (37, 'RJ000019', 'P001', 'umum', 'K 04.0', 'T003', 1);
INSERT INTO `tindakan_medis` VALUES (38, 'RJ000018', 'P001', 'umum', 'A 02.0', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (39, 'RJ000018', 'P001', 'umum', 'A 02.0', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (40, 'RJ000015', 'P001', 'umum', 'B 02.9  ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (41, 'RJ000015', 'P001', 'umum', 'B 02.9  ', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (42, 'RJ000021', 'P001', 'umum', 'I 10    ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (43, 'RJ000021', 'P001', 'umum', 'I 10    ', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (44, 'RJ000016', 'P001', 'umum', 'M 25.5  ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (45, 'RJ000016', 'P001', 'umum', 'M 25.5  ', 'T001', -1);
INSERT INTO `tindakan_medis` VALUES (46, 'RJ000016', 'P001', 'umum', 'M 25.5  ', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (47, 'RJ000024', 'P001', 'umum', 'B 02.9  ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (48, 'RJ000024', 'P001', 'umum', 'B 02.9  ', 'T010', 2);
INSERT INTO `tindakan_medis` VALUES (49, 'RJ000025', 'P001', 'umum', 'B 02.9  ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (50, 'RJ000025', 'P001', 'umum', 'B 02.9  ', 'T010', 2);
INSERT INTO `tindakan_medis` VALUES (51, 'RJ000026', 'P001', 'umum', 'B 02.9  ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (52, 'RJ000026', 'P001', 'umum', 'B 02.9  ', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (53, 'RJ000027', 'P004', 'gigi', 'K 02.1  ', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (54, 'RJ000027', 'P004', 'gigi', 'K 02.1  ', 'T012', 1);
INSERT INTO `tindakan_medis` VALUES (55, 'RJ000027', 'P004', 'gigi', 'K 02.1  ', 'T012', -1);
INSERT INTO `tindakan_medis` VALUES (56, 'RJ000027', 'P004', 'gigi', 'K 02.1  ', 'T011', 1);
INSERT INTO `tindakan_medis` VALUES (57, 'RJ000028', 'P001', 'umum', 'B 02.9  ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (58, 'RJ000022', 'P001', 'umum', 'B 02.9  ', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (59, 'RJ000022', 'P001', 'umum', 'B 02.9  ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (60, 'RJ000022', 'P001', 'umum', 'B 02.9  ', 'T001', -1);
INSERT INTO `tindakan_medis` VALUES (61, 'RJ000022', 'P001', 'umum', 'B 02.9  ', 'T016', 1);
INSERT INTO `tindakan_medis` VALUES (62, 'RJ000020', 'P004', 'gigi', 'A 03.0  ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (63, 'RJ000020', 'P004', 'gigi', 'A 03.0  ', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (64, 'RJ000020', 'P004', 'gigi', 'A 03.0  ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (65, 'RJ000020', 'P004', 'gigi', 'A 03.0  ', 'T010', 1);
INSERT INTO `tindakan_medis` VALUES (66, 'RJ000029', 'P001', 'umum', 'K 04.0', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (67, 'RJ000029', 'P001', 'umum', 'K 04.0', 'T013', 1);
INSERT INTO `tindakan_medis` VALUES (68, 'RJ000029', 'P001', 'umum', 'K 04.0', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (69, 'RJ000029', 'P001', 'umum', 'K 04.0', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (70, 'RJ000029', 'P001', 'umum', 'K 04.0', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (71, 'RJ000029', 'P001', 'umum', 'K 04.0', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (72, 'RJ000029', 'P001', 'umum', 'K 04.0', 'T017', 1);
INSERT INTO `tindakan_medis` VALUES (73, 'RJ000030', 'P001', 'umum', 'I 10    ', 'T001', 1);
INSERT INTO `tindakan_medis` VALUES (74, 'RJ000030', 'P001', 'umum', 'I 10    ', 'T017', 1);

-- ----------------------------
-- Table structure for tmp_detail_resep
-- ----------------------------
DROP TABLE IF EXISTS `tmp_detail_resep`;
CREATE TABLE `tmp_detail_resep`  (
  `id_tmp_dr` int(11) NOT NULL AUTO_INCREMENT,
  `id_resep` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_obat` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_obat` int(3) NOT NULL,
  `aturan_pakai` enum('1 kali sehari sebelum makan','2 kali sehari sebelum makan','3 kali sehari sebelum makan','1 kali sehari sesudah makan','2 kali sehari sesudah makan','3 kali sehari sesudah makan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_petugas` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_rajal` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tmp_dr`) USING BTREE,
  INDEX `id_obat`(`id_obat`) USING BTREE,
  CONSTRAINT `tmp_detail_resep_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tmp_detail_resep
-- ----------------------------
INSERT INTO `tmp_detail_resep` VALUES (45, 'R00017', 'O0004', 5, '1 kali sehari sebelum makan', 'P001', 'RJ000029');

-- ----------------------------
-- Table structure for tmp_tindakan_medis
-- ----------------------------
DROP TABLE IF EXISTS `tmp_tindakan_medis`;
CREATE TABLE `tmp_tindakan_medis`  (
  `id_tmp_tm` int(11) NOT NULL AUTO_INCREMENT,
  `poliklinik` enum('umum','gigi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_diagnosis` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_tindakan` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_petugas` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kunjungan` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jmlh_tind` int(4) NULL DEFAULT NULL,
  `id_user` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tmp_tm`) USING BTREE,
  INDEX `id_tindakan`(`id_tindakan`) USING BTREE,
  INDEX `id_petugas`(`id_petugas`) USING BTREE,
  CONSTRAINT `tmp_tindakan_medis_ibfk_1` FOREIGN KEY (`id_tindakan`) REFERENCES `daftar_tindakan` (`id_tindakan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tmp_tindakan_medis_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas_kesehatan` (`id_petugas`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 113 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tmp_tindakan_medis
-- ----------------------------
INSERT INTO `tmp_tindakan_medis` VALUES (79, 'umum', 'I 10    ', 'T001', 'P001', 'RJ000023', 1, 'U008');
INSERT INTO `tmp_tindakan_medis` VALUES (91, 'umum', 'I 10    ', 'T001', 'P001', 'RJ000023', 1, '');
INSERT INTO `tmp_tindakan_medis` VALUES (92, 'umum', 'I 10    ', 'T001', 'P001', 'RJ000023', 1, '');
INSERT INTO `tmp_tindakan_medis` VALUES (93, 'umum', 'I 10    ', 'T001', 'P001', 'RJ000023', -1, '');
INSERT INTO `tmp_tindakan_medis` VALUES (94, 'umum', 'I 10    ', 'T001', 'P001', 'RJ000023', -1, '');
INSERT INTO `tmp_tindakan_medis` VALUES (95, 'umum', 'I 10    ', 'T005', 'P001', 'RJ000023', 1, '');
INSERT INTO `tmp_tindakan_medis` VALUES (97, 'umum', 'I 10    ', 'T001', 'P001', 'RJ000023', 1, '');
INSERT INTO `tmp_tindakan_medis` VALUES (98, 'umum', 'I 10    ', 'T017', 'P001', 'RJ000023', 1, '');
INSERT INTO `tmp_tindakan_medis` VALUES (99, 'umum', 'I 10    ', 'T017', 'P001', 'RJ000023', 1, '');
INSERT INTO `tmp_tindakan_medis` VALUES (100, 'umum', 'I 10    ', 'T017', 'P001', 'RJ000023', 1, '');
INSERT INTO `tmp_tindakan_medis` VALUES (104, 'umum', 'I 10    ', 'T001', 'P001', 'RJ000023', -1, 'U008');
INSERT INTO `tmp_tindakan_medis` VALUES (105, 'umum', 'I 10    ', 'T017', 'P001', 'RJ000023', 1, 'U008');
INSERT INTO `tmp_tindakan_medis` VALUES (112, 'umum', 'B 02.9  ', 'T001', 'P001', 'RJ000028', 1, 'U008');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_user` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` enum('admin','user') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cabang` enum('Pusat','Pratama','Pedan','Juwiring') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('aktif','tidak aktif') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('U001', 'yuli suprapto', 'yuli', '4a01a05a350e1c7710c989f1211245a8', 'admin', '', 'aktif');
INSERT INTO `user` VALUES ('U002', 'Mirra', 'mirra', '8e38239a2820c104db8107f7a06381e6', 'admin', 'Pusat', 'aktif');
INSERT INTO `user` VALUES ('U003', 'Paryatun', 'paryatun', '2c0bd9ca4565de4a7cb8e5c515da00f7', 'user', 'Pratama', 'aktif');
INSERT INTO `user` VALUES ('U004', 'Suprapto', 'suprapto', 'beb204ded84ba984ee5b74f4f4bcf9f2', 'user', '', 'tidak aktif');
INSERT INTO `user` VALUES ('U005', 'Prasasti', 'prasasti', '05069b3973f7702c336c9ca8af398732', 'user', '', 'aktif');
INSERT INTO `user` VALUES ('U006', 'Ditya', 'ditya', '16538ef92f6534e91c6ad23179d5583a', 'admin', 'Pusat', 'aktif');
INSERT INTO `user` VALUES ('U007', 'Desmon', 'desmon', '19a02ca47d39bf836b9d8f6c7d387aba', 'admin', 'Pusat', 'aktif');
INSERT INTO `user` VALUES ('U008', 'Galih', 'galih', '027dc74f0bbf09a61a36ec7f0d9e08ca', 'admin', 'Pusat', 'aktif');
INSERT INTO `user` VALUES ('U009', 'coba', 'coba', 'c3ec0f7b054e729c5a716c8125839829', 'user', 'Pratama', 'aktif');

SET FOREIGN_KEY_CHECKS = 1;

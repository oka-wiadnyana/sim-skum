-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table skum.auth
CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table skum.auth: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth` DISABLE KEYS */;
INSERT INTO `auth` (`id`, `nama`, `email`, `password`) VALUES
	(1, 'Oka', 'onsdee86@gmail.com', '$2y$10$In6tRs8LGhXMfXpLIcLFEuKpCbtYtLCpSSnnu5WuBAPHWwGD.Ptd.'),
	(2, 'Vio', 'vio@gmail.com', '$2y$10$.kprXvX2AseiCZIxrQj4dOaGW81lGLRH6TaAwv2KpGsUhsy3h3Zju');
/*!40000 ALTER TABLE `auth` ENABLE KEYS */;

-- Dumping structure for table skum.kasir
CREATE TABLE IF NOT EXISTS `kasir` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table skum.kasir: ~0 rows (approximately)
/*!40000 ALTER TABLE `kasir` DISABLE KEYS */;
INSERT INTO `kasir` (`id`, `nama`, `nip`) VALUES
	(1, 'Rif\'an Fadli, S.Hi', '1985');
/*!40000 ALTER TABLE `kasir` ENABLE KEYS */;

-- Dumping structure for table skum.main_skum
CREATE TABLE IF NOT EXISTS `main_skum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_skum` varchar(50) DEFAULT NULL,
  `tanggal_skum` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `nomor_telepon` varchar(50) DEFAULT NULL,
  `atk` int(11) DEFAULT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `materai` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `pnbp_panggilan_pertama` int(11) DEFAULT NULL,
  `pnbp_pemberitahuan_putusan` int(11) DEFAULT NULL,
  `sumpah` int(11) DEFAULT NULL,
  `panggilan_penggugat` int(11) DEFAULT NULL,
  `panggilan_tergugat` int(11) DEFAULT NULL,
  `pemb_putusan_penggugat` int(11) DEFAULT NULL,
  `pemb_putusan_tergugat` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table skum.main_skum: ~1 rows (approximately)
/*!40000 ALTER TABLE `main_skum` DISABLE KEYS */;
INSERT INTO `main_skum` (`id`, `nomor_skum`, `tanggal_skum`, `nama`, `alamat`, `nomor_telepon`, `atk`, `pendaftaran`, `materai`, `redaksi`, `pnbp_panggilan_pertama`, `pnbp_pemberitahuan_putusan`, `sumpah`, `panggilan_penggugat`, `panggilan_tergugat`, `pemb_putusan_penggugat`, `pemb_putusan_tergugat`, `jumlah`) VALUES
	(2, 'SKUM-002-2022', '2022-05-02', 'NI KOMANG AYU KARTINI', 'Lingkungan Pendem, Kelurahan Pendem, Kecamatan Jembrana, Kabupaten jembrana', '081338830855', 50000, 30000, 10000, 10000, 20000, 20000, 0, 300000, 400000, 100000, 100000, 1040000),
	(5, 'SKUM-101-2022', '2022-06-13', 'I GEDE AGUS ADI YASA', 'Banjar Kaleran Kauh, Desa Yehembang, Kecamatan Mendoyo, Kabupaten Jembrana', '087783153436', 50000, 30000, 10000, 10000, 20000, 20000, 0, 375000, 500000, 125000, 125000, 1265000),
	(6, 'SKUM-102-2022', '2022-06-25', 'dsfa', 'fdas', 'fda', 50000, 30000, 10000, 10000, 30000, 30000, 0, 300000, 6400000, 100000, 1600000, 8560000);
/*!40000 ALTER TABLE `main_skum` ENABLE KEYS */;

-- Dumping structure for table skum.main_skum_banding
CREATE TABLE IF NOT EXISTS `main_skum_banding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_skum` varchar(50) DEFAULT NULL,
  `tanggal_skum` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `nomor_telepon` varchar(50) DEFAULT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `pnbp_penyerahan_akta` int(11) DEFAULT NULL,
  `pemberitahuan_banding` int(11) DEFAULT NULL,
  `pnbp_pemberitahuan_banding` int(11) DEFAULT NULL,
  `penyerahan_memori` int(11) DEFAULT NULL,
  `penyerahan_kontra` int(11) DEFAULT NULL,
  `pnbp_penyerahan_memori_kontra` int(11) DEFAULT NULL,
  `pemberitahuan_inzage_pembanding` int(11) DEFAULT NULL,
  `pemberitahuan_inzage_terbanding` int(11) DEFAULT NULL,
  `pnbp_inzage` int(11) DEFAULT NULL,
  `pemberitahuan_putusan_pembanding` int(11) DEFAULT NULL,
  `pemberitahuan_putusan_terbanding` int(11) DEFAULT NULL,
  `pnbp_putusan` int(11) DEFAULT NULL,
  `biaya_banding` int(11) DEFAULT NULL,
  `pengiriman_berkas` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table skum.main_skum_banding: ~3 rows (approximately)
/*!40000 ALTER TABLE `main_skum_banding` DISABLE KEYS */;
INSERT INTO `main_skum_banding` (`id`, `nomor_skum`, `tanggal_skum`, `nama`, `alamat`, `nomor_telepon`, `pendaftaran`, `redaksi`, `pnbp_penyerahan_akta`, `pemberitahuan_banding`, `pnbp_pemberitahuan_banding`, `penyerahan_memori`, `penyerahan_kontra`, `pnbp_penyerahan_memori_kontra`, `pemberitahuan_inzage_pembanding`, `pemberitahuan_inzage_terbanding`, `pnbp_inzage`, `pemberitahuan_putusan_pembanding`, `pemberitahuan_putusan_terbanding`, `pnbp_putusan`, `biaya_banding`, `pengiriman_berkas`, `jumlah`) VALUES
	(3, 'SKUM-BND-001-2022', '2022-06-04', 'vio', 'Mendoyo', '000', 50000, 10000, 10000, 100000, 10000, 100000, 100000, 20000, 100000, 100000, 20000, 100000, 100000, 20000, 150000, NULL, 990000),
	(4, 'SKUM-BND-002-2022', '2022-06-04', 'jjjl', 'jioio', '090', 50000, 10000, 20000, 100000, 10000, 100000, 225000, 30000, 225000, 100000, 30000, 225000, 100000, 30000, 150000, NULL, 1405000),
	(5, 'SKUM-BND-003-2022', '2022-06-04', 'sd', 'vds', 'dfds', 50000, 10000, 10000, 100000, 10000, 100000, 100000, 20000, 100000, 100000, 20000, 100000, 100000, 20000, 150000, 150000, 1140000),
	(6, 'SKUM-BND-004-2022', '2022-06-09', 'sadfas', 'fdsa', 'fdsa', 50000, 10000, 10000, 100000, 10000, 100000, 100000, 20000, 100000, 100000, 20000, 100000, 100000, 20000, 150000, 150000, 1140000);
/*!40000 ALTER TABLE `main_skum_banding` ENABLE KEYS */;

-- Dumping structure for table skum.main_skum_gs
CREATE TABLE IF NOT EXISTS `main_skum_gs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_skum` varchar(50) DEFAULT NULL,
  `tanggal_skum` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `nomor_telepon` varchar(50) DEFAULT NULL,
  `atk` int(11) DEFAULT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `materai` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `pnbp_panggilan_pertama` int(11) DEFAULT NULL,
  `pnbp_pemberitahuan_putusan` int(11) DEFAULT NULL,
  `sumpah` int(11) DEFAULT NULL,
  `panggilan_penggugat` int(11) DEFAULT NULL,
  `panggilan_tergugat` int(11) DEFAULT NULL,
  `pemb_putusan_penggugat` int(11) DEFAULT NULL,
  `pemb_putusan_tergugat` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table skum.main_skum_gs: ~2 rows (approximately)
/*!40000 ALTER TABLE `main_skum_gs` DISABLE KEYS */;
INSERT INTO `main_skum_gs` (`id`, `nomor_skum`, `tanggal_skum`, `nama`, `alamat`, `nomor_telepon`, `atk`, `pendaftaran`, `materai`, `redaksi`, `pnbp_panggilan_pertama`, `pnbp_pemberitahuan_putusan`, `sumpah`, `panggilan_penggugat`, `panggilan_tergugat`, `pemb_putusan_penggugat`, `pemb_putusan_tergugat`, `jumlah`) VALUES
	(2, 'SKUMGS-001-2022', '2022-06-12', 'fad', 'fdsaf44', '44', 50000, 30000, 10000, 10000, 20000, 20000, 0, 100000, 200000, 100000, 100000, 640000),
	(3, 'SKUMGS-010-2022', '2022-06-12', 'sa', 'sasa', '33', 50000, 30000, 10000, 10000, 20000, 20000, 0, 100000, 200000, 100000, 100000, 640000),
	(4, 'SKUMGS-011-2022', '2022-06-25', 'vdsa', 'vdas', 'vda', 50000, 30000, 10000, 10000, 20000, 20000, 0, 150000, 1600000, 150000, 800000, 2840000);
/*!40000 ALTER TABLE `main_skum_gs` ENABLE KEYS */;

-- Dumping structure for table skum.main_skum_kasasi
CREATE TABLE IF NOT EXISTS `main_skum_kasasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_skum` varchar(50) DEFAULT NULL,
  `tanggal_skum` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `nomor_telepon` varchar(50) DEFAULT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `pnbp_penyerahan_akta` int(11) DEFAULT NULL,
  `pemberitahuan_kasasi` int(11) DEFAULT NULL,
  `pnbp_pemberitahuan_kasasi` int(11) DEFAULT NULL,
  `penyerahan_memori` int(11) DEFAULT NULL,
  `penyerahan_kontra` int(11) DEFAULT NULL,
  `pnbp_penyerahan_memori_kontra` int(11) DEFAULT NULL,
  `pemberitahuan_putusan_pemohon` int(11) DEFAULT NULL,
  `pemberitahuan_putusan_termohon` int(11) DEFAULT NULL,
  `pnbp_putusan` int(11) DEFAULT NULL,
  `biaya_kasasi` int(11) DEFAULT NULL,
  `pengiriman_berkas` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table skum.main_skum_kasasi: ~4 rows (approximately)
/*!40000 ALTER TABLE `main_skum_kasasi` DISABLE KEYS */;
INSERT INTO `main_skum_kasasi` (`id`, `nomor_skum`, `tanggal_skum`, `nama`, `alamat`, `nomor_telepon`, `pendaftaran`, `redaksi`, `pnbp_penyerahan_akta`, `pemberitahuan_kasasi`, `pnbp_pemberitahuan_kasasi`, `penyerahan_memori`, `penyerahan_kontra`, `pnbp_penyerahan_memori_kontra`, `pemberitahuan_putusan_pemohon`, `pemberitahuan_putusan_termohon`, `pnbp_putusan`, `biaya_kasasi`, `pengiriman_berkas`, `jumlah`) VALUES
	(1, 'SKUM-KAS-001-2022', '2022-05-31', 'fda', 'fda', 'fda', 50000, 10000, 10000, 350000, 10000, 350000, 150000, 20000, 150000, 350000, 20000, 500000, 200000, 2170000),
	(3, 'SKUM-KAS-004-2022', '2022-06-07', 'vbdsg', 'gfsd', 'gfs', 50000, 10000, 10000, 150000, 10000, 150000, 500000, 20000, 500000, 150000, 20000, 500000, 200000, 2270000),
	(4, 'SKUM-KAS-005-2022', '2022-06-05', 'dfasf', 'fdas', 'fdas', 50000, 10000, 10000, 175000, 10000, 175000, 350000, 20000, 350000, 175000, 20000, 500000, 200000, 2045000),
	(5, 'SKUM-KAS-006-2022', '0000-00-00', '', '', '', 50000, 10000, 20000, 100000, 10000, 100000, 200000, 30000, 200000, 100000, 30000, 500000, 200000, 1550000);
/*!40000 ALTER TABLE `main_skum_kasasi` ENABLE KEYS */;

-- Dumping structure for table skum.main_skum_permohonan
CREATE TABLE IF NOT EXISTS `main_skum_permohonan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_skum` varchar(50) DEFAULT NULL,
  `tanggal_skum` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `nomor_telepon` varchar(50) DEFAULT NULL,
  `atk` int(11) DEFAULT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `materai` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `pnbp_panggilan_pertama` int(11) DEFAULT NULL,
  `pnbp_pemberitahuan_putusan` int(11) DEFAULT NULL,
  `sumpah` int(11) DEFAULT NULL,
  `panggilan_pemohon` int(11) DEFAULT NULL,
  `pemb_putusan` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table skum.main_skum_permohonan: ~2 rows (approximately)
/*!40000 ALTER TABLE `main_skum_permohonan` DISABLE KEYS */;
INSERT INTO `main_skum_permohonan` (`id`, `nomor_skum`, `tanggal_skum`, `nama`, `alamat`, `nomor_telepon`, `atk`, `pendaftaran`, `materai`, `redaksi`, `pnbp_panggilan_pertama`, `pnbp_pemberitahuan_putusan`, `sumpah`, `panggilan_pemohon`, `pemb_putusan`, `jumlah`) VALUES
	(3, 'SKUMP-079-2022', '2022-06-13', 'I Ketut Wiyadi', 'Jalan Dahlia Klp. 1, Lingkungan Kebon, Kelurahan B.B. Agung, Kecamatan Negara, Kabupaten Jembrana', '081936427006', 50000, 30000, 10000, 10000, 10000, 10000, 0, 200000, 100000, 420000);
/*!40000 ALTER TABLE `main_skum_permohonan` ENABLE KEYS */;

-- Dumping structure for table skum.main_skum_pk
CREATE TABLE IF NOT EXISTS `main_skum_pk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_skum` varchar(50) DEFAULT NULL,
  `tanggal_skum` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `nomor_telepon` varchar(50) DEFAULT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `pnbp_penyerahan_akta` int(11) DEFAULT NULL,
  `pemberitahuan_pk_memori` int(11) DEFAULT NULL,
  `pnbp_pemberitahuan_pk_memori` int(11) DEFAULT NULL,
  `penyerahan_kontra` int(11) DEFAULT NULL,
  `pnbp_penyerahan_kontra` int(11) DEFAULT NULL,
  `pemberitahuan_putusan_pemohon` int(11) DEFAULT NULL,
  `pemberitahuan_putusan_termohon` int(11) DEFAULT NULL,
  `pnbp_putusan` int(11) DEFAULT NULL,
  `pnbp_novum` int(11) DEFAULT NULL,
  `biaya_pk` int(11) DEFAULT NULL,
  `pengiriman_berkas` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table skum.main_skum_pk: ~2 rows (approximately)
/*!40000 ALTER TABLE `main_skum_pk` DISABLE KEYS */;
INSERT INTO `main_skum_pk` (`id`, `nomor_skum`, `tanggal_skum`, `nama`, `alamat`, `nomor_telepon`, `pendaftaran`, `redaksi`, `pnbp_penyerahan_akta`, `pemberitahuan_pk_memori`, `pnbp_pemberitahuan_pk_memori`, `penyerahan_kontra`, `pnbp_penyerahan_kontra`, `pemberitahuan_putusan_pemohon`, `pemberitahuan_putusan_termohon`, `pnbp_putusan`, `pnbp_novum`, `biaya_pk`, `pengiriman_berkas`, `jumlah`) VALUES
	(1, 'SKUM-PK-001-2022', '2022-06-05', 'fdsa', 'fdas', 'fdas', 50000, 10000, 10000, 100000, 10000, 100000, NULL, 100000, 100000, 20000, 10000, 2500000, 300000, 3320000),
	(3, 'SKUM-PK-002-2022', '2022-06-05', 'gfdsg', 'gfdsg', 'gfs', 50000, 10000, 10000, 100000, 10000, 100000, 10000, 100000, 100000, 20000, 10000, 2500000, 300000, 3320000);
/*!40000 ALTER TABLE `main_skum_pk` ENABLE KEYS */;

-- Dumping structure for table skum.page_counter
CREATE TABLE IF NOT EXISTS `page_counter` (
  `jml_kunjungan` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table skum.page_counter: ~0 rows (approximately)
/*!40000 ALTER TABLE `page_counter` DISABLE KEYS */;
INSERT INTO `page_counter` (`jml_kunjungan`) VALUES
	(11);
/*!40000 ALTER TABLE `page_counter` ENABLE KEYS */;

-- Dumping structure for table skum.pejabat
CREATE TABLE IF NOT EXISTS `pejabat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table skum.pejabat: ~0 rows (approximately)
/*!40000 ALTER TABLE `pejabat` DISABLE KEYS */;
INSERT INTO `pejabat` (`id`, `nama`, `jabatan`, `nip`) VALUES
	(1, 'Rif\'an Fadli, S.Hi', 'kasir', '198512032011011012');
/*!40000 ALTER TABLE `pejabat` ENABLE KEYS */;

-- Dumping structure for table skum.referensi_biaya
CREATE TABLE IF NOT EXISTS `referensi_biaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atk` int(11) DEFAULT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `pnbp_panggilan` int(11) DEFAULT NULL,
  `pnbp_putusan` int(11) DEFAULT NULL,
  `materai` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `sumpah` int(11) DEFAULT NULL,
  `panggilan_tidak_diketahui` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table skum.referensi_biaya: ~1 rows (approximately)
/*!40000 ALTER TABLE `referensi_biaya` DISABLE KEYS */;
INSERT INTO `referensi_biaya` (`id`, `atk`, `pendaftaran`, `pnbp_panggilan`, `pnbp_putusan`, `materai`, `redaksi`, `sumpah`, `panggilan_tidak_diketahui`) VALUES
	(2, 50000, 30000, 10000, 10000, 10000, 10000, 0, 800000);
/*!40000 ALTER TABLE `referensi_biaya` ENABLE KEYS */;

-- Dumping structure for table skum.referensi_biaya_banding
CREATE TABLE IF NOT EXISTS `referensi_biaya_banding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftaran` int(11) DEFAULT NULL,
  `penyerahan_akta` int(11) DEFAULT NULL,
  `biaya_banding` int(11) DEFAULT NULL,
  `relas_pemberitahuan_pernyataan` int(11) DEFAULT NULL,
  `relas_penyerahan_memori_kontra` int(11) DEFAULT NULL,
  `relas_inzage` int(11) DEFAULT NULL,
  `relas_putusan_sela` int(11) DEFAULT NULL,
  `relas_panggilan_sela` int(11) DEFAULT NULL,
  `relas_putusan` int(11) DEFAULT NULL,
  `pencabutan` int(11) DEFAULT NULL,
  `relas_pemberitahuan_pencabutan` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `pengiriman_berkas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table skum.referensi_biaya_banding: ~1 rows (approximately)
/*!40000 ALTER TABLE `referensi_biaya_banding` DISABLE KEYS */;
INSERT INTO `referensi_biaya_banding` (`id`, `pendaftaran`, `penyerahan_akta`, `biaya_banding`, `relas_pemberitahuan_pernyataan`, `relas_penyerahan_memori_kontra`, `relas_inzage`, `relas_putusan_sela`, `relas_panggilan_sela`, `relas_putusan`, `pencabutan`, `relas_pemberitahuan_pencabutan`, `redaksi`, `pengiriman_berkas`) VALUES
	(1, 50000, 10000, 150000, 10000, 10000, 10000, 10000, 10000, 10000, 10000, 10000, 10000, 150000);
/*!40000 ALTER TABLE `referensi_biaya_banding` ENABLE KEYS */;

-- Dumping structure for table skum.referensi_biaya_ecourt
CREATE TABLE IF NOT EXISTS `referensi_biaya_ecourt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pnbp_kuasa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table skum.referensi_biaya_ecourt: ~0 rows (approximately)
/*!40000 ALTER TABLE `referensi_biaya_ecourt` DISABLE KEYS */;
INSERT INTO `referensi_biaya_ecourt` (`id`, `pnbp_kuasa`) VALUES
	(1, 10000);
/*!40000 ALTER TABLE `referensi_biaya_ecourt` ENABLE KEYS */;

-- Dumping structure for table skum.referensi_biaya_kasasi
CREATE TABLE IF NOT EXISTS `referensi_biaya_kasasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftaran` int(11) DEFAULT NULL,
  `penyerahan_akta` int(11) DEFAULT NULL,
  `biaya_kasasi` int(11) DEFAULT NULL,
  `relas_penyerahan_memori_kontra` int(11) DEFAULT NULL,
  `relas_pemberitahuan_pernyataan` int(11) DEFAULT NULL,
  `relas_putusan` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `pengiriman_berkas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table skum.referensi_biaya_kasasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `referensi_biaya_kasasi` DISABLE KEYS */;
INSERT INTO `referensi_biaya_kasasi` (`id`, `pendaftaran`, `penyerahan_akta`, `biaya_kasasi`, `relas_penyerahan_memori_kontra`, `relas_pemberitahuan_pernyataan`, `relas_putusan`, `redaksi`, `pengiriman_berkas`) VALUES
	(1, 50000, 10000, 500000, 10000, 10000, 10000, 10000, 200000);
/*!40000 ALTER TABLE `referensi_biaya_kasasi` ENABLE KEYS */;

-- Dumping structure for table skum.referensi_biaya_permohonan
CREATE TABLE IF NOT EXISTS `referensi_biaya_permohonan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atk` int(11) DEFAULT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `pnbp_panggilan` int(11) DEFAULT NULL,
  `pnbp_putusan` int(11) DEFAULT NULL,
  `materai` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `sumpah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table skum.referensi_biaya_permohonan: ~0 rows (approximately)
/*!40000 ALTER TABLE `referensi_biaya_permohonan` DISABLE KEYS */;
INSERT INTO `referensi_biaya_permohonan` (`id`, `atk`, `pendaftaran`, `pnbp_panggilan`, `pnbp_putusan`, `materai`, `redaksi`, `sumpah`) VALUES
	(2, 50000, 30000, 10000, 10000, 10000, 10000, 0);
/*!40000 ALTER TABLE `referensi_biaya_permohonan` ENABLE KEYS */;

-- Dumping structure for table skum.referensi_biaya_pk
CREATE TABLE IF NOT EXISTS `referensi_biaya_pk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftaran` int(11) DEFAULT NULL,
  `penyerahan_akta` int(11) DEFAULT NULL,
  `biaya_pk` int(11) DEFAULT NULL,
  `relas_pemberitahuan_pernyataan` int(11) DEFAULT NULL,
  `relas_penyerahan_kontra` int(11) DEFAULT NULL,
  `relas_putusan` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `novum` int(11) DEFAULT NULL,
  `pengiriman_berkas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table skum.referensi_biaya_pk: ~1 rows (approximately)
/*!40000 ALTER TABLE `referensi_biaya_pk` DISABLE KEYS */;
INSERT INTO `referensi_biaya_pk` (`id`, `pendaftaran`, `penyerahan_akta`, `biaya_pk`, `relas_pemberitahuan_pernyataan`, `relas_penyerahan_kontra`, `relas_putusan`, `redaksi`, `novum`, `pengiriman_berkas`) VALUES
	(1, 50000, 10000, 2500000, 10000, 10000, 10000, 10000, 10000, 300000);
/*!40000 ALTER TABLE `referensi_biaya_pk` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

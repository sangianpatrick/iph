-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 01 Des 2016 pada 12.34
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `abc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(100) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_publisher` varchar(50) NOT NULL,
  `book_cat` enum('Healthy','Religy') NOT NULL,
  `book_isbn` varchar(50) DEFAULT NULL,
  `book_img` varchar(20) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `book_author`, `book_publisher`, `book_cat`, `book_isbn`, `book_img`) VALUES
(1, 'Makanan Penyembuh Ajaib', 'Bleceda Miranda Varon, E.N.D., MPH,  David Arsulo ', 'Iph', 'Healthy', NULL, '1401730826'),
(2, 'Petunjuk Modern Kepada Kesehatan', 'Clifford R. Anderson, M.D.', 'Iph', 'Healthy', NULL, '1202623788'),
(3, 'Ginjal Sipenyaring Ajaib', 'Des Cummings, Jr., Ph.D. & Hazel-Chua Pangunsang, ', 'Iph', 'Healthy', NULL, '1188427148'),
(5, 'Sehat Tanpa Daging Dan Vegetaris', 'Dr. Abednego Bangun, SH, MHA & J. B. Banjarnahor, ', 'iph', 'Healthy', NULL, '1492024554'),
(6, 'ENSLIKOPEDIA Jus Buah Dan Sayur Untuk Penyembuhan', 'Dr. Abednego Bangun, SH, MHA ', 'Iph', 'Healthy', NULL, '292192205'),
(7, 'ENSLIKOPEDIA Tanaman Obat Indonesia', 'Dr. Abednego Bangun, SH, MHA ', 'Iph', 'Healthy', NULL, '1810399917'),
(8, 'Sehat Dan Bugar Hingga Lansia', 'Dr. Abednego Bangun, SH, MHA ', 'Iph', 'Healthy', NULL, '1900538439'),
(9, 'Pengobatan Ajaib Untuk Rematik Dan Asam Urat', 'Dr. Abednego Bangun, SH, MHA 3', 'Iph', 'Healthy', NULL, '718656048'),
(10, 'Dari Alam Untuk Kecantikan', 'Dr. Abednego Bangun, SH, MHA', 'Iph', 'Healthy', NULL, '99952305'),
(11, 'Sehat Prima', 'Dr. Clemency Mitchell', 'Iph', 'Healthy', NULL, '2103122910'),
(12, 'Jantung Kuat Bernapas Lega', 'Dr. John F. Knight ', 'Iph', 'Healthy', NULL, '39586074'),
(13, 'Hidup Yang Dinamis', 'Aileen Ludington, M.D. & Hans Diehl, DrShc, MPH', 'Iph', 'Religy', NULL, '1489685376'),
(14, 'Ada Apa Dibalik Music Rock', 'Joshua L. Tobing, Ph.D & Keith A. Snyder', 'Iph', 'Religy', NULL, '1226303696'),
(15, 'Amanat Kepada Orang Muda', 'Ellen G. White', 'Iph', 'Religy', NULL, '569825236'),
(16, 'Seruan Nyaring', 'E. Gultom', 'Iph', 'Religy', NULL, '748189845'),
(17, 'Hidup Yang Terbaik', 'Ellen G. White', 'Iph', 'Religy', NULL, '1513083223'),
(18, 'Pelayan Injil', 'Ellen G. White', 'Iph', 'Religy', NULL, '780277133'),
(19, 'Peristiwa-Peristiwa Akhir Zaman', 'Ellen G. White ', 'Iph', 'Religy', NULL, '336533509'),
(20, 'Suara Hati Nurani', 'Ellen G. White', 'Iph', 'Religy', NULL, '996056794'),
(21, 'Pikiran Karakter & Kepribadian 1', 'Ellen G. White', 'Iph', 'Religy', NULL, '2027085682'),
(22, 'Pikiran Karakter & Kepribadian 2', 'Ellen G. White', 'Iph', 'Religy', NULL, '1868567118'),
(23, 'Penunun Alat Peraga Baru', 'Frank Breaden', 'Iph', 'Religy', NULL, '105298649'),
(24, 'Sehat, Senang, Suci', 'J. R. Robert Spangler & Leo R. Van Dolson', 'Iph', 'Religy', NULL, '1469751954'),
(25, 'Bebas Dari Belenggu Narkoba', 'Cheri Peters', 'Iph', 'Healthy', NULL, '2140516204');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(20) NOT NULL,
  `cart_date` date NOT NULL,
  `order_code` varchar(20) DEFAULT NULL,
  `cd_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`cart_id`, `item_code`, `cart_date`, `order_code`, `cd_id`) VALUES
(1, '6AEAJ', '2016-10-16', '9S3-AVF-ZSD', 1),
(2, '6AEAJ', '2016-10-16', '9S3-AVF-ZSD', 1),
(3, '6AEAJ', '2016-10-16', '9S3-AVF-ZSD', 1),
(4, '6AEAJ', '2016-10-16', 'FOX-9VX-JIR', 1),
(5, '6AEAJ', '2016-10-16', 'FOX-9VX-JIR', 1),
(6, 'VSV2W', '2016-10-23', '822-2L4-U7P', 2),
(7, 'VSV2W', '2016-10-23', '822-2L4-U7P', 2),
(8, '6AEAJ', '2016-10-27', '7MY-4OX-H2O', 3),
(11, '3QOPO', '2016-10-27', 'OZ7-HD8-QOM', 3),
(12, '6AEAJ', '2016-11-01', 'OJO-JOC-3W2', 3),
(13, '6AEAJ', '2016-11-02', 'OJO-JOC-3W2', 3),
(14, 'CW3WV', '2016-11-02', 'OJO-JOC-3W2', 3),
(15, 'WB0VW', '2016-11-02', 'OJO-JOC-3W2', 3),
(16, 'CW3WV', '2016-11-07', 'OJO-JOC-3W2', 3),
(17, 'CW3WV', '2016-11-07', 'OJO-JOC-3W2', 3),
(18, 'CW3WV', '2016-11-07', 'OJO-JOC-3W2', 3),
(19, 'CW3WV', '2016-11-07', 'OJO-JOC-3W2', 3),
(20, 'CW3WV', '2016-11-07', 'OJO-JOC-3W2', 3),
(21, 'CW3WV', '2016-11-07', 'OJO-JOC-3W2', 3),
(22, 'CW3WV', '2016-11-07', 'OJO-JOC-3W2', 3),
(23, 'CW3WV', '2016-11-07', '4CS-8JS-3VJ', 3),
(24, 'CW3WV', '2016-11-07', '4CS-8JS-3VJ', 3),
(25, 'CW3WV', '2016-11-07', '4CS-8JS-3VJ', 3),
(26, '6AEAJ', '2016-11-07', 'Y4R-WLN-WHS', 4),
(27, 'EIUUP', '2016-11-07', 'Y4R-WLN-WHS', 4),
(28, 'VSV2W', '2016-11-08', '7JI-KS3-994', 3),
(29, 'VSV2W', '2016-11-13', '4NW-ZY5-BXF', 3),
(30, '9IN5I', '2016-11-18', 'DKL-3BK-K56', 3),
(31, '9IN5I', '2016-11-18', 'DKL-3BK-K56', 3),
(32, '9IN5I', '2016-11-18', 'DKL-3BK-K56', 3),
(33, '9IN5I', '2016-11-18', 'DKL-3BK-K56', 3),
(34, '6AEAJ', '2016-11-18', '9EE-PYK-W4I', 3),
(49, 'VSV2W', '2016-11-18', '9V1-ILC-QED', 3),
(50, 'VSV2W', '2016-11-18', '9V1-ILC-QED', 3),
(51, 'VSV2W', '2016-11-18', '9V1-ILC-QED', 3),
(52, 'VSV2W', '2016-11-18', '9V1-ILC-QED', 3),
(53, 'VSV2W', '2016-11-18', 'LIB-SGC-UK9', 3),
(54, 'IPZO4', '2016-11-18', 'Q2W-WLK-JOF', 3),
(55, 'VSV2W', '2016-11-23', 'AS2-29Y-ZEL', 3),
(56, 'WB0VW', '2016-11-23', 'AS2-29Y-ZEL', 3),
(57, 'VSV2W', '2016-11-23', 'AS2-29Y-ZEL', 3),
(59, 'VSV2W', '2016-11-23', 'BWT-RIH-SXW', 5),
(60, 'VSV2W', '2016-11-24', '4DS-I3V-KYK', 5),
(61, 'GD1Y4', '2016-11-24', '73S-FCY-QZR', 5),
(62, 'GD1Y4', '2016-11-24', 'AZ3-FNB-3T4', 5),
(63, 'VSV2W', '2016-11-24', 'LOP-DHN-SM1', 3),
(64, 'VSV2W', '2016-11-24', 'LOP-DHN-SM1', 3),
(65, 'VSV2W', '2016-11-24', 'LOP-DHN-SM1', 3),
(66, 'WB0VW', '2016-11-24', 'LOP-DHN-SM1', 3),
(67, 'VSV2W', '2016-11-24', 'DUY-RW3-7MU', 5),
(68, 'WB0VW', '2016-11-24', 'DUY-RW3-7MU', 5),
(69, 'GD1Y4', '2016-11-24', 'DUY-RW3-7MU', 5),
(70, '9IN5I', '2016-11-24', 'UN4-L0G-X71', 6),
(73, '6AEAJ', '2016-11-24', 'UN4-L0G-X71', 6),
(74, '4X5PF', '2016-11-24', '1OP-2X3-70K', 6),
(75, '4X5PF', '2016-11-24', '1OP-2X3-70K', 6),
(76, '4X5PF', '2016-11-24', '1OP-2X3-70K', 6),
(77, '4X5PF', '2016-11-24', '1OP-2X3-70K', 6),
(78, '4X5PF', '2016-11-24', '1OP-2X3-70K', 6),
(79, '4X5PF', '2016-11-24', '1OP-2X3-70K', 6),
(80, '4X5PF', '2016-11-24', '1OP-2X3-70K', 6),
(81, '4X5PF', '2016-11-24', '1OP-2X3-70K', 6),
(82, 'VSV2W', '2016-11-28', 'SG1-WAW-M9H', 3),
(83, '4X5PF', '2016-12-01', 'TZL-W7G-OPV', 3),
(84, '4X5PF', '2016-12-01', 'TZL-W7G-OPV', 3),
(85, '4X5PF', '2016-12-01', 'TZL-W7G-OPV', 3),
(86, '4X5PF', '2016-12-01', 'TZL-W7G-OPV', 3),
(87, '4X5PF', '2016-12-01', 'TZL-W7G-OPV', 3),
(88, '4X5PF', '2016-12-01', 'TZL-W7G-OPV', 3),
(89, '4X5PF', '2016-12-01', 'TZL-W7G-OPV', 3),
(90, '4X5PF', '2016-12-01', 'TZL-W7G-OPV', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_detail`
--

CREATE TABLE IF NOT EXISTS `customer_detail` (
  `cd_id` int(11) NOT NULL AUTO_INCREMENT,
  `cd_fullname` varchar(50) NOT NULL,
  `cd_email` varchar(100) NOT NULL,
  `cd_password` varchar(50) NOT NULL,
  `cd_phone` varchar(15) NOT NULL,
  `cd_address` text NOT NULL,
  `cd_postal_code` varchar(20) NOT NULL,
  PRIMARY KEY (`cd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `customer_detail`
--

INSERT INTO `customer_detail` (`cd_id`, `cd_fullname`, `cd_email`, `cd_password`, `cd_phone`, `cd_address`, `cd_postal_code`) VALUES
(1, 'Hendry Radja', 'hendry@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '098765434', 'Tuminting', '555432'),
(2, 'theo', 'theo@yahoo.com', '01cfcd4f6b8770febfb40cb906715822', '5634737347', 'papua', '9051'),
(3, 'Sergie', 'spanyol@gmail.com', 'c6a822d737b2fb0960a40c0d4a8e4ae6', '12345', 'barcelona', '12345'),
(4, 'ferty', 'ferty@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '123456789', 'unklab', '123456789'),
(5, 'didin', 'didin@yahoo.com', '80f0ca7f9c9bf51dea99162632e351aa', '08124447789', 'papua', '764458'),
(6, 'andrew', '1234@xxx.xx', '202cb962ac59075b964b07152d234b70', '', 'unklab', '95371'),
(7, 'andrew', '1234@xxx.xx', '202cb962ac59075b964b07152d234b70', '', 'unklab', '95371'),
(8, 'opo', 'opo@xxx.xx', 'fa5d7f86abfb67640f3e082ff8aa1768', '453545', 'sanger', '12345'),
(9, 'ytuytuytuyt', 'hhhhhh@jhjhj', '3d16e39d60edf4e94e24e7e6d5655231', '78787', '7878787', '7878787'),
(10, 'ytuytuytuyt', 'hhhhhh@jhjhj', '3d16e39d60edf4e94e24e7e6d5655231', '78787', '7878787', '7878787');

-- --------------------------------------------------------

--
-- Struktur dari tabel `internal_user`
--

CREATE TABLE IF NOT EXISTS `internal_user` (
  `iu_id` int(11) NOT NULL AUTO_INCREMENT,
  `iu_username` varchar(50) NOT NULL,
  `iu_password` varchar(32) NOT NULL,
  `iu_level` enum('A','O') NOT NULL,
  PRIMARY KEY (`iu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `internal_user`
--

INSERT INTO `internal_user` (`iu_id`, `iu_username`, `iu_password`, `iu_level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'A'),
(2, '161016124', '5f4dcc3b5aa765d61d8327deb882cf99', 'O'),
(3, '161016386', '5f4dcc3b5aa765d61d8327deb882cf99', 'O'),
(4, '161027835', '5f4dcc3b5aa765d61d8327deb882cf99', 'O'),
(5, '161027932', '9817e41ff85cc7e0289ac9c50735e246', 'O'),
(6, '161123297', '5f4dcc3b5aa765d61d8327deb882cf99', 'O'),
(7, '161124243', '5f4dcc3b5aa765d61d8327deb882cf99', 'O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_stock`
--

CREATE TABLE IF NOT EXISTS `item_stock` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(20) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `item_stock`
--

INSERT INTO `item_stock` (`item_id`, `item_code`, `item_qty`, `item_price`) VALUES
(1, '6AEAJ', 42, 201400),
(2, 'EIUUP', 44, 254600),
(3, 'IPZO4', 33, 126800),
(4, 'CW3WV', 694, 60500),
(5, 'VSV2W', 83, 207100),
(6, 'TU1T5', 50, 265300),
(7, 'WB0VW', 86, 276000),
(8, '4X5PF', 0, 248900),
(9, 'BVEZA', 40, 250000),
(10, '9IN5I', 68, 178200),
(11, '29RZ8', 44, 212100),
(12, 'T7BER', 56, 277400),
(13, '4VCJ8', 55, 56100),
(14, 'R3ZP1', 65, 8800),
(15, 'B7OAC', 35, 60900),
(16, 'GD1Y4', 92, 11300),
(17, 'AFB1E', 39, 56100),
(18, '25I5Z', 93, 26200),
(19, 'OFIUN', 74, 12100),
(20, '4ZP8E', 76, 35700),
(21, 'I57OL', 39, 44400),
(22, 'BQQ5Q', 39, 44400),
(23, '6NHOD', 71, 46300),
(24, '3QOPO', 30, 25000),
(25, 'C9ZL3', 39, 60500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iu_detail`
--

CREATE TABLE IF NOT EXISTS `iu_detail` (
  `iu_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `iu_emp_num` varchar(12) NOT NULL,
  `iu_firstname` varchar(50) NOT NULL,
  `iu_lastname` varchar(50) NOT NULL,
  `iu_gender` enum('M','F') NOT NULL,
  `iu_pob` varchar(50) NOT NULL,
  `iu_dob` date NOT NULL,
  `iu_phone` varchar(15) NOT NULL,
  `iu_address` text NOT NULL,
  `iu_job_stts` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iu_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `iu_detail`
--

INSERT INTO `iu_detail` (`iu_detail_id`, `iu_emp_num`, `iu_firstname`, `iu_lastname`, `iu_gender`, `iu_pob`, `iu_dob`, `iu_phone`, `iu_address`, `iu_job_stts`) VALUES
(1, 'admin', 'Ferti', 'Samberaung', 'M', 'Sanger', '1993-07-22', '082177436', 'Asrama Crystal', 1),
(2, '161016124', 'Adnan', 'Rakmeni', 'M', 'Bandung', '1990-06-01', '0812445566778', 'Aermadidi', 0),
(3, '161016386', 'Patrick', 'Sangian', 'M', 'Lembean', '2016-10-11', '34528934328', 'Kaasar', 0),
(4, '161027835', 'Rakmeni', 'Adnan', 'M', 'Bandung', '1993-08-15', '081255406817', 'Aermadidi', 0),
(5, '161027932', 'tomy', 'mambu', 'M', 'merauke', '2016-08-15', '12345', 'airmadidi', 0),
(6, '161123297', 'Adnan', 'rakmeni', 'M', 'Bandung', '2016-11-24', '08123456789', 'aermadidi', 0),
(7, '161124243', 'Adnan', 'Rakmeni', 'M', 'ambon', '2016-11-08', '345667', 'aermadidi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(20) NOT NULL,
  `order_date` date NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `cd_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`order_id`, `order_code`, `order_date`, `payment_status`, `cd_id`) VALUES
(1, '9S3-AVF-ZSD', '2016-10-16', 1, 1),
(2, 'FOX-9VX-JIR', '2016-10-16', 1, 1),
(3, '822-2L4-U7P', '2016-10-23', 1, 2),
(4, '7MY-4OX-H2O', '2016-10-27', 1, 3),
(9, 'OZ7-HD8-QOM', '2016-10-27', 1, 3),
(10, 'KGM-KCC-IIR', '2016-10-31', 1, 4),
(11, 'OJO-JOC-3W2', '2016-11-07', 1, 3),
(12, '4CS-8JS-3VJ', '2016-11-07', 1, 3),
(13, 'Y4R-WLN-WHS', '2016-11-07', 1, 4),
(14, '7JI-KS3-994', '2016-11-08', 1, 3),
(15, '4NW-ZY5-BXF', '2016-11-13', 1, 3),
(16, 'DKL-3BK-K56', '2016-11-18', 1, 3),
(17, '9EE-PYK-W4I', '2016-11-18', 1, 3),
(21, '9V1-ILC-QED', '2016-11-18', 1, 3),
(22, 'LIB-SGC-UK9', '2016-11-18', 1, 3),
(23, 'Q2W-WLK-JOF', '2016-11-18', 1, 3),
(24, 'AS2-29Y-ZEL', '2016-11-23', 1, 3),
(26, 'BWT-RIH-SXW', '2016-11-23', 1, 5),
(27, '4DS-I3V-KYK', '2016-11-24', 1, 5),
(28, '73S-FCY-QZR', '2016-11-24', 1, 5),
(29, 'AZ3-FNB-3T4', '2016-11-24', 1, 5),
(30, 'LOP-DHN-SM1', '2016-11-24', 1, 3),
(31, 'DUY-RW3-7MU', '2016-11-24', 1, 5),
(32, 'UN4-L0G-X71', '2016-11-24', 1, 6),
(33, '1OP-2X3-70K', '2016-11-24', 1, 6),
(34, 'SG1-WAW-M9H', '2016-11-28', 1, 3),
(35, 'TZL-W7G-OPV', '2016-12-01', 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_date` date NOT NULL,
  `bank` varchar(50) NOT NULL,
  `bank_acc_num` varchar(50) NOT NULL,
  `bank_acc_name` varchar(50) NOT NULL,
  `payment_receipt` varchar(50) DEFAULT NULL,
  `order_code` varchar(20) NOT NULL,
  `confirm_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_date`, `bank`, `bank_acc_num`, `bank_acc_name`, `payment_receipt`, `order_code`, `confirm_by`) VALUES
(1, '2016-10-16', 'Mandiri', '34567843235', 'Hendry', '1768926123.jpg', '9S3-AVF-ZSD', 2),
(2, '2016-10-16', 'Mandiri', '8326483245', 'Hendry', '481821422.jpg', 'FOX-9VX-JIR', 3),
(3, '2016-10-23', 'BNI', '123456789', 'theo', '1043791545.jpg', '822-2L4-U7P', 3),
(4, '2016-10-27', 'Mandiri', '123456789', 'sergie', '141719150.jpg', '7MY-4OX-H2O', 5),
(5, '2016-10-27', 'BCA', '123456789', 'sergie', '1508069292.jpg', 'OZ7-HD8-QOM', 5),
(7, '2016-11-07', 'BNI', '123456789', 'adnan', '1043107725.jpg', 'OJO-JOC-3W2', 4),
(8, '2016-11-07', 'BNI', '34567843235', 'Hendry', '2070314442.jpg', '4CS-8JS-3VJ', 4),
(9, '2016-11-07', 'BCA', '123456789', 'ferty', '100296785.jpg', 'Y4R-WLN-WHS', 4),
(10, '2016-11-08', 'BNI', '532452345234', 'opo', '1781850438.jpg', '7JI-KS3-994', 4),
(11, '2016-11-13', 'BNI', '23', 'oo', '207438615.jpg', '4NW-ZY5-BXF', 4),
(12, '2016-11-18', 'Mandiri', '123456789', 'opo', '1319628078.jpg', 'DKL-3BK-K56', 4),
(13, '2016-11-18', 'BNI', 'qwetefgfdgdf', 'asd', '1902684289.jpg', '9V1-ILC-QED', 4),
(14, '2016-11-18', 'BNI', '1234', 'as', '647463393.jpg', '9EE-PYK-W4I', 4),
(15, '2016-11-18', 'Mandiri', '1235', 'op', '2143610623.jpg', 'LIB-SGC-UK9', 4),
(16, '2016-11-18', 'BNI', '545', 'aa', '1896689123.jpg', 'Q2W-WLK-JOF', 4),
(17, '2016-11-23', 'BNI', '2134213423', 'alo', '2062941221.jpg', 'AS2-29Y-ZEL', 4),
(18, '2016-11-23', 'BNI', '52345452', 'didin', '1339840357.jpg', 'BWT-RIH-SXW', 6),
(19, '2016-11-24', 'BNI', '2341567', 'aaadf', '272618879.jpg', '4DS-I3V-KYK', 6),
(20, '2016-11-24', 'BNI', '12345678910', 'aadc', '2131791400.jpg', '73S-FCY-QZR', 6),
(21, '2016-11-24', 'BNI', '66555444', 'oop', '824179403.jpg', 'AZ3-FNB-3T4', 6),
(22, '2016-11-24', 'Mandiri', '1234567899', 'alan', '655365847.jpg', 'LOP-DHN-SM1', 6),
(23, '2016-11-24', 'BNI', '098765', 'asdc', '1920896845.jpg', 'DUY-RW3-7MU', 6),
(24, '2016-11-24', 'BNI', '123', 'andrew', '532474002.jpg', 'UN4-L0G-X71', 7),
(25, '2016-11-24', 'Mandiri', '1234', 'andrew', '1796433792.jpg', '1OP-2X3-70K', 7),
(26, '2016-11-28', 'BNI', '134134', 'spanyol', '826623679.jpg', 'SG1-WAW-M9H', NULL),
(27, '2016-12-01', 'BNI', '343434', 'opopop', '670858131.jpg', 'TZL-W7G-OPV', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
  `shipment_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_code` varchar(20) NOT NULL,
  `shipment_date` datetime NOT NULL,
  `shipment_service` enum('JNE','POS','TIKI') NOT NULL,
  `shipment_receipt` varchar(20) NOT NULL,
  `sa_id` int(11) NOT NULL,
  PRIMARY KEY (`shipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipment_address`
--

CREATE TABLE IF NOT EXISTS `shipment_address` (
  `sa_id` int(11) NOT NULL AUTO_INCREMENT,
  `sa_province` varchar(50) NOT NULL,
  `sa_city` varchar(50) NOT NULL,
  `sa_street` text NOT NULL,
  `sa_postal_code` varchar(20) NOT NULL,
  `order_code` varchar(20) NOT NULL,
  PRIMARY KEY (`sa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_activity`
--

CREATE TABLE IF NOT EXISTS `stock_activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_date` datetime NOT NULL,
  `activity_type` enum('I','O') NOT NULL,
  `activity_desc` text NOT NULL,
  `activity_by` int(11) NOT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data untuk tabel `stock_activity`
--

INSERT INTO `stock_activity` (`activity_id`, `activity_date`, `activity_type`, `activity_desc`, `activity_by`) VALUES
(1, '2016-10-16 08:43:55', 'I', '5 new incomimg item with code 6AEAJ', 1),
(2, '2016-10-16 08:57:32', 'O', '3 item(s) with code 6AEAJ has purchased on 9S3-AVF-ZSD', 2),
(3, '2016-10-16 09:35:40', 'I', '45 new incomimg item with code EIUUP', 1),
(4, '2016-10-16 09:39:04', 'I', '34 new incomimg item with code IPZO4', 1),
(5, '2016-10-16 09:42:00', 'I', '555 new incomimg item with code CW3WV', 1),
(6, '2016-10-23 12:48:15', 'O', '2 item(s) with code 6AEAJ has purchased on FOX-9VX-JIR', 3),
(7, '2016-10-23 12:48:17', 'O', '2 item(s) with code 6AEAJ has purchased on FOX-9VX-JIR', 3),
(8, '2016-10-23 12:56:50', 'I', '100 new incomimg item with code VSV2W', 1),
(9, '2016-10-23 13:02:17', 'O', '2 item(s) with code VSV2W has purchased on 822-2L4-U7P', 3),
(10, '2016-10-27 07:42:51', 'I', ' new incomimg item with code TU1T5', 1),
(11, '2016-10-27 07:46:42', 'I', ' new incomimg item with code WB0VW', 1),
(12, '2016-10-27 07:49:13', 'I', '50 new incomimg item with code 4X5PF', 1),
(13, '2016-10-27 07:54:20', 'I', '40 new incomimg item with code BVEZA', 1),
(14, '2016-10-27 07:56:03', 'I', '73 new incomimg item with code 9IN5I', 1),
(15, '2016-10-27 07:58:29', 'I', '44 new incomimg item with code 29RZ8', 1),
(16, '2016-10-27 08:00:05', 'I', '56 new incomimg item with code T7BER', 1),
(17, '2016-10-27 08:04:32', 'I', '55 new incomimg item with code 4VCJ8', 1),
(18, '2016-10-27 08:06:54', 'I', '65 new incomimg item with code R3ZP1', 1),
(19, '2016-10-27 08:08:42', 'I', '35 new incomimg item with code B7OAC', 1),
(20, '2016-10-27 08:10:18', 'I', '95 new incomimg item with code GD1Y4', 1),
(21, '2016-10-27 08:11:56', 'I', '39 new incomimg item with code AFB1E', 1),
(22, '2016-10-27 08:14:23', 'I', '88 new incomimg item with code 25I5Z', 1),
(23, '2016-10-27 08:16:30', 'I', '74 new incomimg item with code OFIUN', 1),
(24, '2016-10-27 08:17:24', 'I', '76 new incomimg item with code 4ZP8E', 1),
(25, '2016-10-27 08:20:38', 'I', '39 new incomimg item with code I57OL', 1),
(26, '2016-10-27 08:21:31', 'I', '39 new incomimg item with code BQQ5Q', 1),
(27, '2016-10-27 08:25:51', 'I', '71 new incomimg item with code 6NHOD', 1),
(28, '2016-10-27 08:27:45', 'I', '27 new incomimg item with code 3QOPO', 1),
(29, '2016-10-27 08:53:39', 'O', '1 item(s) with code 6AEAJ has purchased on 7MY-4OX-H2O', 5),
(30, '2016-10-27 09:00:30', 'O', '1 item(s) with code 3QOPO has purchased on OZ7-HD8-QOM', 5),
(31, '2016-11-07 03:17:56', 'O', '2 item(s) with code 6AEAJ has purchased on OJO-JOC-3W2', 4),
(32, '2016-11-07 03:17:56', 'O', '8 item(s) with code CW3WV has purchased on OJO-JOC-3W2', 4),
(33, '2016-11-07 03:17:57', 'O', '1 item(s) with code WB0VW has purchased on OJO-JOC-3W2', 4),
(34, '2016-11-07 03:24:59', 'O', '3 item(s) with code CW3WV has purchased on 4CS-8JS-3VJ', 4),
(35, '2016-11-07 03:30:41', 'I', '39 new incomimg item with code C9ZL3', 1),
(36, '2016-11-07 06:37:32', 'O', '1 item(s) with code 6AEAJ has purchased on Y4R-WLN-WHS', 4),
(37, '2016-11-07 06:37:32', 'O', '1 item(s) with code EIUUP has purchased on Y4R-WLN-WHS', 4),
(38, '2016-11-08 03:36:53', 'O', '1 item(s) with code VSV2W has purchased on 7JI-KS3-994', 4),
(39, '2016-11-13 16:26:16', 'O', '1 item(s) with code VSV2W has purchased on 4NW-ZY5-BXF', 4),
(40, '2016-11-18 09:58:54', 'O', '4 item(s) with code 9IN5I has purchased on DKL-3BK-K56', 4),
(41, '2016-11-18 10:28:20', 'O', '1 item(s) with code 6AEAJ has purchased on 9EE-PYK-W4I', 4),
(42, '2016-11-18 10:28:38', 'O', '4 item(s) with code VSV2W has purchased on 9V1-ILC-QED', 4),
(43, '2016-11-18 10:35:54', 'O', '1 item(s) with code VSV2W has purchased on LIB-SGC-UK9', 4),
(44, '2016-11-18 10:36:03', 'O', '1 item(s) with code IPZO4 has purchased on Q2W-WLK-JOF', 4),
(45, '2016-11-23 07:45:33', 'O', '2 item(s) with code VSV2W has purchased on AS2-29Y-ZEL', 4),
(46, '2016-11-23 07:45:33', 'O', '1 item(s) with code WB0VW has purchased on AS2-29Y-ZEL', 4),
(47, '2016-11-23 23:47:14', 'O', '1 item(s) with code VSV2W has purchased on BWT-RIH-SXW', 6),
(48, '2016-11-24 00:33:20', 'O', '1 item(s) with code VSV2W has purchased on 4DS-I3V-KYK', 6),
(49, '2016-11-24 00:38:23', 'O', '1 item(s) with code GD1Y4 has purchased on 73S-FCY-QZR', 6),
(50, '2016-11-24 00:55:35', 'O', '1 item(s) with code GD1Y4 has purchased on AZ3-FNB-3T4', 6),
(51, '2016-11-24 04:48:24', 'O', '1 item(s) with code VSV2W has purchased on DUY-RW3-7MU', 6),
(52, '2016-11-24 04:48:24', 'O', '1 item(s) with code WB0VW has purchased on DUY-RW3-7MU', 6),
(53, '2016-11-24 04:48:24', 'O', '1 item(s) with code GD1Y4 has purchased on DUY-RW3-7MU', 6),
(54, '2016-11-24 04:48:33', 'O', '3 item(s) with code VSV2W has purchased on LOP-DHN-SM1', 6),
(55, '2016-11-24 04:48:33', 'O', '1 item(s) with code WB0VW has purchased on LOP-DHN-SM1', 6),
(56, '2016-11-24 07:51:36', 'O', '1 item(s) with code 9IN5I has purchased on UN4-L0G-X71', 7),
(57, '2016-11-24 07:51:36', 'O', '1 item(s) with code 6AEAJ has purchased on UN4-L0G-X71', 7),
(58, '2016-11-24 08:32:27', 'O', '8 item(s) with code 4X5PF has purchased on 1OP-2X3-70K', 7),
(59, '2016-12-01 12:21:33', 'O', '8 item(s) with code 4X5PF has purchased on TZL-W7G-OPV', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_code` varchar(20) NOT NULL,
  `trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `trans_cost` int(11) NOT NULL,
  `trans_stts` tinyint(1) NOT NULL,
  `payment_id` int(11) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

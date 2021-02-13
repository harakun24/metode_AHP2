-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2021 at 02:29 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahp_dico`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(30) NOT NULL,
  `admin_uname` varchar(30) NOT NULL,
  `admin_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_uname`, `admin_pass`) VALUES
(1, 'Admin park', 'admin', 'admin'),
(2, 'Abista VD', 'dimas', 'dimas'),
(3, '#ROOT12', 'root', '123'),
(5, 'Bill Gombalgambil', 'bil', '123'),
(6, 'Uzumaki Naruto', 'naruto', 'hinata');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `hasil_id` int(11) NOT NULL,
  `peserta` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`hasil_id`, `peserta`, `jurusan`, `total`) VALUES
(1, 1, 1, 0.2043),
(2, 1, 1, 0.2043),
(3, 1, 1, 0.2043),
(4, 1, 1, 0.2043);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(11) NOT NULL,
  `jurusan_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `jurusan_nama`) VALUES
(1, 'TKJ'),
(2, 'TP'),
(3, 'TKR'),
(4, 'TSM'),
(5, 'TGB'),
(6, 'TAV'),
(7, 'TITL'),
(8, 'Farmasi');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `kriteria_nama`) VALUES
(1, 'UN'),
(2, 'MINAT'),
(4, 'PRESTASI');

-- --------------------------------------------------------

--
-- Table structure for table `matrik_jurusan`
--

CREATE TABLE `matrik_jurusan` (
  `matrik_id` int(11) NOT NULL,
  `sub` int(11) NOT NULL,
  `jurusan1` int(11) NOT NULL,
  `jurusan2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matrik_jurusan`
--

INSERT INTO `matrik_jurusan` (`matrik_id`, `sub`, `jurusan1`, `jurusan2`, `nilai`) VALUES
(1, 3, 2, 1, 3),
(2, 3, 3, 1, 1),
(3, 3, 3, 2, 1),
(4, 3, 4, 1, 1),
(5, 3, 4, 2, 1),
(6, 3, 4, 3, 1),
(7, 3, 5, 1, 1),
(8, 3, 5, 2, 1),
(9, 3, 5, 3, 1),
(10, 3, 5, 4, 1),
(11, 3, 6, 1, 1),
(12, 3, 6, 2, 0.166667),
(13, 3, 6, 3, 1),
(14, 3, 6, 4, 1),
(15, 3, 6, 5, 1),
(16, 3, 7, 1, 1),
(17, 3, 7, 2, 1),
(18, 3, 7, 3, 1),
(19, 3, 7, 4, 1),
(20, 3, 7, 5, 1),
(21, 3, 7, 6, 1),
(22, 3, 8, 1, 1),
(23, 3, 8, 2, 1),
(24, 3, 8, 3, 1),
(25, 3, 8, 4, 1),
(26, 3, 8, 5, 1),
(27, 3, 8, 6, 1),
(28, 3, 8, 7, 1),
(29, 5, 2, 1, 1),
(30, 5, 3, 1, 1),
(31, 5, 3, 2, 1),
(32, 5, 4, 1, 1),
(33, 5, 4, 2, 1),
(34, 5, 4, 3, 1),
(35, 5, 5, 1, 1),
(36, 5, 5, 2, 1),
(37, 5, 5, 3, 1),
(38, 5, 5, 4, 1),
(39, 5, 6, 1, 1),
(40, 5, 6, 2, 1),
(41, 5, 6, 3, 1),
(42, 5, 6, 4, 1),
(43, 5, 6, 5, 1),
(44, 5, 7, 1, 1),
(45, 5, 7, 2, 1),
(46, 5, 7, 3, 1),
(47, 5, 7, 4, 1),
(48, 5, 7, 5, 1),
(49, 5, 7, 6, 1),
(50, 5, 8, 1, 1),
(51, 5, 8, 2, 1),
(52, 5, 8, 3, 1),
(53, 5, 8, 4, 1),
(54, 5, 8, 5, 1),
(55, 5, 8, 6, 1),
(56, 5, 8, 7, 1),
(57, 4, 2, 1, 1),
(58, 4, 3, 1, 1),
(59, 4, 3, 2, 1),
(60, 4, 4, 1, 1),
(61, 4, 4, 2, 1),
(62, 4, 4, 3, 1),
(63, 4, 5, 1, 1),
(64, 4, 5, 2, 1),
(65, 4, 5, 3, 1),
(66, 4, 5, 4, 1),
(67, 4, 6, 1, 1),
(68, 4, 6, 2, 1),
(69, 4, 6, 3, 1),
(70, 4, 6, 4, 1),
(71, 4, 6, 5, 1),
(72, 4, 7, 1, 1),
(73, 4, 7, 2, 1),
(74, 4, 7, 3, 1),
(75, 4, 7, 4, 1),
(76, 4, 7, 5, 1),
(77, 4, 7, 6, 1),
(78, 4, 8, 1, 1),
(79, 4, 8, 2, 1),
(80, 4, 8, 3, 1),
(81, 4, 8, 4, 1),
(82, 4, 8, 5, 1),
(83, 4, 8, 6, 1),
(84, 4, 8, 7, 1),
(85, 6, 2, 1, 1),
(86, 6, 3, 1, 1),
(87, 6, 3, 2, 1),
(88, 6, 4, 1, 1),
(89, 6, 4, 2, 1),
(90, 6, 4, 3, 1),
(91, 6, 5, 1, 1),
(92, 6, 5, 2, 1),
(93, 6, 5, 3, 1),
(94, 6, 5, 4, 1),
(95, 6, 6, 1, 1),
(96, 6, 6, 2, 1),
(97, 6, 6, 3, 1),
(98, 6, 6, 4, 1),
(99, 6, 6, 5, 1),
(100, 6, 7, 1, 1),
(101, 6, 7, 2, 1),
(102, 6, 7, 3, 1),
(103, 6, 7, 4, 1),
(104, 6, 7, 5, 1),
(105, 6, 7, 6, 1),
(106, 6, 8, 1, 1),
(107, 6, 8, 2, 1),
(108, 6, 8, 3, 1),
(109, 6, 8, 4, 1),
(110, 6, 8, 5, 1),
(111, 6, 8, 6, 1),
(112, 6, 8, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `matrik_kriteria`
--

CREATE TABLE `matrik_kriteria` (
  `matrik_id` int(11) NOT NULL,
  `k1` int(11) NOT NULL,
  `k2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matrik_kriteria`
--

INSERT INTO `matrik_kriteria` (`matrik_id`, `k1`, `k2`, `nilai`) VALUES
(7, 2, 1, 1),
(8, 4, 1, 2),
(9, 4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `matrik_sub`
--

CREATE TABLE `matrik_sub` (
  `matrik_id` int(11) NOT NULL,
  `sub1` int(11) NOT NULL,
  `sub2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matrik_sub`
--

INSERT INTO `matrik_sub` (`matrik_id`, `sub1`, `sub2`, `nilai`) VALUES
(1, 4, 3, 2),
(2, 5, 3, 1),
(3, 5, 4, 1),
(4, 6, 3, 1),
(5, 6, 4, 1),
(6, 6, 5, 1),
(7, 8, 7, 0.3),
(8, 9, 7, 0.2),
(9, 9, 8, 0.3),
(10, 10, 7, 0.142857),
(11, 10, 8, 0.2),
(12, 10, 9, 0.3),
(13, 14, 7, 0.11),
(14, 14, 8, 0.142857),
(15, 14, 9, 0.2),
(16, 14, 10, 0.3),
(17, 15, 12, 1),
(18, 16, 12, 1),
(19, 16, 15, 1),
(20, 17, 12, 1),
(21, 17, 15, 1),
(22, 17, 16, 1),
(23, 18, 12, 1),
(24, 18, 15, 1),
(25, 18, 16, 1),
(26, 18, 17, 1),
(27, 19, 12, 1),
(28, 19, 15, 1),
(29, 19, 16, 1),
(30, 19, 17, 1),
(31, 19, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_jurusan`
--

CREATE TABLE `nilai_jurusan` (
  `nilai_id` int(11) NOT NULL,
  `peserta` int(11) NOT NULL,
  `kriteria` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_jurusan`
--

INSERT INTO `nilai_jurusan` (`nilai_id`, `peserta`, `kriteria`, `jurusan`, `nilai`) VALUES
(1, 1, 4, 1, 15),
(2, 1, 4, 2, 12),
(3, 1, 4, 3, 18),
(4, 1, 4, 4, 12),
(5, 1, 4, 5, 12),
(6, 1, 4, 6, 12),
(7, 1, 4, 7, 12),
(8, 1, 4, 8, 12),
(9, 1, 2, 1, 7),
(10, 1, 2, 2, 14),
(11, 1, 2, 3, 14),
(12, 1, 2, 4, 14),
(13, 1, 2, 5, 14),
(14, 1, 2, 6, 10),
(15, 1, 2, 7, 14),
(16, 1, 2, 8, 14),
(17, 1, 2, 1, 7),
(18, 1, 2, 2, 14),
(19, 1, 2, 3, 14),
(20, 1, 2, 4, 14),
(21, 1, 2, 5, 14),
(22, 1, 2, 6, 10),
(23, 1, 2, 7, 14),
(24, 1, 2, 8, 14),
(25, 1, 2, 1, 7),
(26, 1, 2, 2, 14),
(27, 1, 2, 3, 14),
(28, 1, 2, 4, 14),
(29, 1, 2, 5, 14),
(30, 1, 2, 6, 10),
(31, 1, 2, 7, 14),
(32, 1, 2, 8, 14),
(33, 1, 2, 1, 7),
(34, 1, 2, 2, 14),
(35, 1, 2, 3, 14),
(36, 1, 2, 4, 14),
(37, 1, 2, 5, 14),
(38, 1, 2, 6, 10),
(39, 1, 2, 7, 14),
(40, 1, 2, 8, 14),
(41, 1, 2, 1, 7),
(42, 1, 2, 2, 14),
(43, 1, 2, 3, 14),
(44, 1, 2, 4, 14),
(45, 1, 2, 5, 14),
(46, 1, 2, 6, 10),
(47, 1, 2, 7, 14),
(48, 1, 2, 8, 14),
(49, 1, 2, 1, 7),
(50, 1, 2, 2, 14),
(51, 1, 2, 3, 14),
(52, 1, 2, 4, 14),
(53, 1, 2, 5, 14),
(54, 1, 2, 6, 10),
(55, 1, 2, 7, 14),
(56, 1, 2, 8, 14);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_un`
--

CREATE TABLE `nilai_un` (
  `nilai_id` int(11) NOT NULL,
  `sub` int(11) NOT NULL,
  `peserta` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_un`
--

INSERT INTO `nilai_un` (`nilai_id`, `sub`, `peserta`, `nilai`) VALUES
(1, 3, 1, 2),
(2, 4, 1, 0),
(3, 5, 1, 0),
(4, 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `pertanyaan_id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`pertanyaan_id`, `pertanyaan`) VALUES
(1, 'Pekerjaan mana yang menurut anda lebih menarik?'),
(2, 'aktivitas apa yang anda sukai?'),
(3, 'seberapa mahirkah tingkatan anda dalam mengoprasikan perangkat computer?'),
(4, 'seberapa tinggi kah pengetahuan anda dalam reparasi perangkat elektronik?'),
(5, 'seberapa tinggi kah pengetahuan anda tentang tentang otomotif mobil?'),
(6, 'seberapa tinggi kah pengetahuan anda tentang tentang otomotif motor'),
(7, 'seberapa tinggi kah pengetahuan anda tentang permesianan industry?'),
(8, 'seberapa tinggi kah pengetahuan anda tentang arsitektur?'),
(9, 'seberapa tinggi kah pengetahuan anda tentang arus listrik?'),
(10, 'seberapa tinggi kah pengetahuan anda tentang ilmu kimia?');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `peserta_id` int(11) NOT NULL,
  `peserta_nisn` varchar(30) NOT NULL,
  `peserta_nama` varchar(50) NOT NULL,
  `peserta_jk` varchar(10) NOT NULL,
  `peserta_alamat` text NOT NULL,
  `minat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`peserta_id`, `peserta_nisn`, `peserta_nama`, `peserta_jk`, `peserta_alamat`, `minat`) VALUES
(1, '032', 'dimas abista', 'laki-laki', 'baleharjo, gunungkidul', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `pilihan_id` int(11) NOT NULL,
  `pertanyaan` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `pilihan` text NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`pilihan_id`, `pertanyaan`, `jurusan`, `pilihan`, `nilai`) VALUES
(2, 1, 1, 'teknologi komputer', 10),
(3, 1, 6, 'multimedia', 10),
(4, 1, 4, 'otomotif mobil', 10),
(5, 1, 3, 'otomotif motor', 10),
(6, 1, 2, 'pabrik', 10),
(7, 1, 5, 'arsitektur', 10),
(8, 1, 7, 'electrician', 10),
(9, 1, 8, 'kesehatan', 10),
(10, 2, 1, 'mengopras ikan perangkat komputer', 10),
(11, 2, 6, 'memperba iki perangkat elektronik', 10),
(12, 2, 4, 'mempelaja ri bidang otomotif mobil', 10),
(13, 2, 3, 'mempelaja ri bidang otomotif motor', 10),
(14, 2, 2, 'mempelajari tentang permesianan industri', 10),
(15, 2, 5, 'mengg ambar arsitek tur', 10),
(16, 2, 7, 'mempelaj ari tentang alur listrik', 10),
(17, 2, 8, 'mempel ajari tentang kimia', 10),
(18, 3, 1, '1', 12),
(19, 3, 1, '2', 20),
(20, 3, 1, '3', 25),
(21, 3, 1, '4', 30),
(22, 3, 1, '5', 60),
(23, 4, 6, '1', 12),
(24, 4, 6, '2', 20),
(25, 4, 6, '3', 25),
(26, 4, 6, '4', 30),
(27, 4, 6, '5', 60),
(28, 5, 4, '1', 12),
(29, 5, 4, '2', 20),
(30, 5, 4, '3', 25),
(31, 5, 4, '4', 30),
(32, 5, 4, '5', 60),
(33, 6, 3, '1', 12),
(34, 6, 3, '2', 20),
(35, 6, 3, '3', 25),
(36, 6, 3, '4', 30),
(37, 6, 3, '5', 60),
(38, 7, 2, '1', 12),
(39, 7, 2, '2', 20),
(40, 7, 2, '3', 25),
(41, 7, 2, '4', 30),
(42, 7, 2, '5', 60),
(43, 8, 5, '1', 12),
(44, 8, 5, '2', 20),
(45, 8, 5, '3', 25),
(46, 8, 5, '4', 30),
(47, 8, 5, '5', 60),
(48, 9, 7, '1', 12),
(49, 9, 7, '2', 20),
(50, 9, 7, '3', 25),
(51, 9, 7, '4', 30),
(52, 9, 7, '5', 60),
(53, 10, 8, '1', 12),
(54, 10, 8, '2', 20),
(55, 10, 8, '3', 25),
(56, 10, 8, '4', 30),
(57, 10, 8, '5', 60);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `sub_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `sub_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`sub_id`, `kriteria_id`, `sub_nama`) VALUES
(3, 1, 'matematika'),
(4, 1, 'bahasa indonesia'),
(5, 1, 'ipa'),
(6, 1, 'bahasa inggris'),
(7, 2, 'A1'),
(8, 2, 'A2'),
(9, 2, 'A3'),
(10, 2, 'A4'),
(12, 4, 'B1'),
(14, 2, 'A5'),
(15, 4, 'B2'),
(16, 4, 'B3'),
(17, 4, 'B3'),
(18, 4, 'B4'),
(19, 4, 'B5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`hasil_id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `matrik_jurusan`
--
ALTER TABLE `matrik_jurusan`
  ADD PRIMARY KEY (`matrik_id`);

--
-- Indexes for table `matrik_kriteria`
--
ALTER TABLE `matrik_kriteria`
  ADD PRIMARY KEY (`matrik_id`);

--
-- Indexes for table `matrik_sub`
--
ALTER TABLE `matrik_sub`
  ADD PRIMARY KEY (`matrik_id`);

--
-- Indexes for table `nilai_jurusan`
--
ALTER TABLE `nilai_jurusan`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `nilai_un`
--
ALTER TABLE `nilai_un`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`peserta_id`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`pilihan_id`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `hasil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `matrik_jurusan`
--
ALTER TABLE `matrik_jurusan`
  MODIFY `matrik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `matrik_kriteria`
--
ALTER TABLE `matrik_kriteria`
  MODIFY `matrik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `matrik_sub`
--
ALTER TABLE `matrik_sub`
  MODIFY `matrik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nilai_jurusan`
--
ALTER TABLE `nilai_jurusan`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `nilai_un`
--
ALTER TABLE `nilai_un`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `peserta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `pilihan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

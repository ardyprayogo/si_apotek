-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 08:59 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suakainsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `alamat`, `spesialis`, `telp`) VALUES
(1, 'sebastian', 'jakarta selatan', 'umum', '12356'),
(2, 'anto sepitiadis', 'jakarta selatans', 'hatis', '1235678s'),
(3, 'indra gunawan', 'jakarta selatan', 'anak', '422424'),
(5, 'faisal akbar', 'kebon jeruk', 'umum', '111'),
(9, 'faisal gunawan', 'kebayoran', 'tht', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE IF NOT EXISTS `jadwal_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_kerja` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id_jadwal`, `id_dokter`, `hari`, `jam_kerja`) VALUES
(1, 1, 'senin', '10.00-14.00'),
(2, 3, 'rabu', '12.00-17.00'),
(3, 3, 'jumat', '12.00-15.00'),
(4, 9, 'kamis', '12.00-15.00');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `kd_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nama_obat`) VALUES
('2', 'parasetampol'),
('a123', 'oskadon'),
('basd', 'tramadol');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tmptlhr` varchar(50) NOT NULL,
  `tgllhr` date NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `email`, `tmptlhr`, `tgllhr`, `telp`, `alamat`, `jk`, `foto`) VALUES
(2, 'ardy prayogo', 'ardy@yahoo.com', 'jkt', '2018-03-03', '11111', 'jkt', 'p', 'upload/pasien/1521992189201369.jpg'),
(4, 'ardy prayogo', 'rahmat1.somat@yandex.com', 'bdg', '2018-03-02', '11111', '1', 'l', 'upload/pasien/1521992582wallhaven-454968.jpg'),
(7, 'paijo', 'rahmat.somat@outloosk.com', 'bdg', '2018-03-01', '1', '1', 'l', 'upload/pasien/1521992781star-wars-wallpaper-38.jpg'),
(9, 'paijo', 'rahmat.somat@osutloosk.com', 'bdg', '2018-03-01', '1', '1', 'l', 'upload/pasien/1521992804star-wars-wallpaper-38.jpg'),
(10, 'anto septiadi', 'rahmat11.somat@yandex.com', 'jkt', '2018-03-02', '1', 'jku', 'l', 'upload/pasien/1522055499peaceofmind01_by_andreasro'),
(12, 'ardy prayogo', 'ardy.prayogo@yahoo.com', 'jakarta', '2018-03-09', '08', 'jakarta', 'l', 'upload/pasien/1522049275wallhaven-454968.jpg'),
(13, 'ardy prayogo', 'ardy.prayogo1@yahoo.com', 'jkt', '2018-03-01', '08', 'jakarta', '', 'upload/pasien/15220556351920x1080_Wall-Wallpaper-1'),
(14, 'ardy prayogo', 'ardy.prayogo2@yahoo.com', 'jakarta', '2018-03-01', '1', '1', 'l', 'upload/pasien/1522055538kitty_12-wallpaper-1600x90'),
(15, 'ardy prayogo', 'ardy.prayogo@yahoo.com3', 'jakarta', '2018-03-01', '1', '1', '', 'upload/pasien/1522057796q.jpg'),
(17, 'aaaa', 'aaaa@yahoo.com', '11', '2018-03-01', '11', '11', 'l', 'upload/pasien/1522070336google_inspired_wallpaper_'),
(18, 'mo salah', 'ardy.prayogo1@2yahoo.com', 'asdasd', '2018-03-01', '1', '111', 'l', 'upload/pasien/1522070412google_inspired_wallpaper_'),
(19, 'fiki', 'fiki@gmail.com', 'surabaya', '2000-11-11', '123', 'aa', 'l', 'upload/pasien/1522135742q.jpg'),
(20, 'mo.salah', 'mo.salah@gmail.com', 'mesir', '2018-04-01', '123', 'jakarta', 'l', 'upload/pasien/1522982967WhatsApp Image 2017-05-02 '),
(21, 'test', 'ddd@gmail.com', '123', '2018-04-01', '123', 'jkt', 'l', 'upload/pasien/1523206031Drawing1 - Copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE IF NOT EXISTS `periksa` (
  `kd_periksa` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tglperiksa` date NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`kd_periksa`, `id_pasien`, `id_dokter`, `tglperiksa`, `biaya`) VALUES
(1, 10, 5, '2018-03-23', 100000),
(2, 9, 5, '2018-03-08', 80000),
(3, 10, 2, '2018-03-27', 120000),
(4, 18, 3, '2018-04-02', 200000),
(5, 19, 5, '2018-04-05', 50000),
(6, 17, 5, '2018-04-06', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE IF NOT EXISTS `resep` (
  `kd_resep` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `kd_obat` varchar(10) NOT NULL,
  `banyak` int(11) NOT NULL,
  `aturan_pakai` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`kd_resep`, `id_pasien`, `kd_obat`, `banyak`, `aturan_pakai`) VALUES
(5, 10, 'basd', 11, 'jangan banyak banyak'),
(6, 18, '2', 11, 'tampol'),
(9, 19, 'basd', 12, 'pake sampe mavok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`kd_periksa`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`kd_resep`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `kd_obat` (`kd_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `kd_periksa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `kd_resep` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `jadwal_dokter_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`kd_obat`) REFERENCES `obat` (`kd_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

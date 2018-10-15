-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2017 at 02:05 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE IF NOT EXISTS `tbl_anggota` (
  `nrp` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `alamat` longtext,
  `Foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`nrp`, `nama`, `jk`, `hp`, `alamat`, `Foto`) VALUES
('11', 'Ibra', 'Laki-laki', '08904932323', '<p>surabaya</p>', 'gambar_anggota/Desert.jpg'),
('12', 'Messi', 'Perempuan', '09859838343', '<p>sby</p>', 'gambar_anggota/Hydrangeas.jpg'),
('13', 'Aguero', 'Laki-laki', '08978783843', '<p>jkt</p>', 'gambar_anggota/Jellyfish.jpg'),
('14', 'Ozil', 'Laki-laki', '09887989842', '<p>jkt</p>', 'gambar_anggota/Koala.jpg'),
('15', 'Ronaldo', 'Laki-laki', '0977498383', '<p>jkt</p>', 'gambar_anggota/Lighthouse.jpg'),
('16', 'Suarez', 'Laki-laki', '08989928424', '<p>bdg</p>', 'gambar_anggota/Jellyfish.jpg'),
('19', 'kompany', 'L', '08789899900', '<p>Belgium 5</p>', 'gambar_anggota/Desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE IF NOT EXISTS `tbl_buku` (
  `idBuku` varchar(20) NOT NULL,
  `Judul` varchar(50) DEFAULT NULL,
  `Pengarang` varchar(50) DEFAULT NULL,
  `Penerbit` varchar(50) DEFAULT NULL,
  `thnTerbit` varchar(5) DEFAULT NULL,
  `idJenis` varchar(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `idRak` varchar(20) DEFAULT NULL,
  `tglInput` varchar(50) DEFAULT NULL,
  `Foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idBuku`),
  KEY `idJenis` (`idJenis`),
  KEY `idRak` (`idRak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`idBuku`, `Judul`, `Pengarang`, `Penerbit`, `thnTerbit`, `idJenis`, `stok`, `idRak`, `tglInput`, `Foto`) VALUES
('B001', 'Buku A', 'Mourinho', 'MU', '2013', 'J0002', 10, 'R0001', '01/06/2017', 'gambar_anggota/Chrysanthemum.jpg'),
('B002', 'Buku B', 'Pep', 'City', '2010', 'J0001', 10, 'R0001', '01/06/2017', 'gambar_anggota/Koala.jpg'),
('B003', 'Buku C', 'Enrique', 'Barca', '2012', 'J0001', 10, 'R0002', '01/06/2017', 'gambar_anggota/Koala.jpg'),
('B004', 'Buku D', 'Allegri', 'Juve', '2010', 'J0001', 12, 'R0001', '01/22/2017', 'gambar_anggota/Tulips.jpg'),
('B005', 'Buku E', 'Zidane', 'real', '2010', 'J0001', 6, 'R0001', '01/22/2017', 'gambar_anggota/Hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_buku`
--

CREATE TABLE IF NOT EXISTS `tbl_jenis_buku` (
  `idJenis` varchar(20) NOT NULL,
  `NamaJenis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idJenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_buku`
--

INSERT INTO `tbl_jenis_buku` (`idJenis`, `NamaJenis`) VALUES
('J0001', 'Buku utama rujukan'),
('J0002', 'Buku pendukung'),
('J0003', 'Buku ensiklopedia'),
('J0004', 'Buku filsafat'),
('J0005', 'Buku luar negeri');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengunjung`
--

CREATE TABLE IF NOT EXISTS `tbl_pengunjung` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nrp` varchar(15) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `keperluan` varchar(20) DEFAULT NULL,
  `saran` longtext,
  `tgl` varchar(15) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id`, `nrp`, `jk`, `keperluan`, `saran`, `tgl`, `jam`) VALUES
(33, '11', 'Laki-laki', 'baca', '', '2017/02/15', '20:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE IF NOT EXISTS `tbl_rak` (
  `idRak` varchar(20) NOT NULL,
  `NamaRak` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idRak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`idRak`, `NamaRak`) VALUES
('R0001', 'Rak 1'),
('R0002', 'Rak 2'),
('R0003', 'Rak 3'),
('R0004', 'Rak 4'),
('R0005', 'Rak 5'),
('R0006', 'Rak 6'),
('R0010', 'Rak 10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `idTrans` varchar(20) NOT NULL,
  `idBuku` varchar(20) DEFAULT NULL,
  `nrp` varchar(20) DEFAULT NULL,
  `tglPinjam` varchar(15) DEFAULT NULL,
  `tglKembali` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idTrans`),
  KEY `nrp` (`nrp`),
  KEY `idBuku` (`idBuku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`idTrans`, `idBuku`, `nrp`, `tglPinjam`, `tglKembali`, `status`) VALUES
('T0001', 'B001', '11', '15-02-2017', '01-03-2017', 'Kembali'),
('T0002', 'B001', '12', '15-02-2017', '22-02-2017', 'Kembali');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'Administrator'),
(2, 'user1', 'user1', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD CONSTRAINT `tbl_buku_ibfk_1` FOREIGN KEY (`idJenis`) REFERENCES `tbl_jenis_buku` (`idJenis`),
  ADD CONSTRAINT `tbl_buku_ibfk_2` FOREIGN KEY (`idRak`) REFERENCES `tbl_rak` (`idRak`);

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `tbl_anggota` (`nrp`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`idBuku`) REFERENCES `tbl_buku` (`idBuku`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

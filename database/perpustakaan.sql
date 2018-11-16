-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Nov 2018 pada 12.05
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

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
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE IF NOT EXISTS `tbl_anggota` (
  `nrp` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `alamat` longtext,
  `Foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_anggota`
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
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE IF NOT EXISTS `tbl_buku` (
  `idBuku` varchar(20) NOT NULL,
  `isbn` int(15) NOT NULL,
  `Judul` varchar(50) DEFAULT NULL,
  `Pengarang` varchar(50) DEFAULT NULL,
  `Penerbit` int(11) DEFAULT NULL,
  `thnTerbit` varchar(5) DEFAULT NULL,
  `idJenis` varchar(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `idRak` varchar(20) DEFAULT NULL,
  `tglInput` varchar(50) DEFAULT NULL,
  `Foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`idBuku`, `isbn`, `Judul`, `Pengarang`, `Penerbit`, `thnTerbit`, `idJenis`, `stok`, `idRak`, `tglInput`, `Foto`) VALUES
('B001', 0, 'Buku A', 'Mourinho', 0, '2013', 'J0002', 10, 'R0001', '01/06/2017', 'gambar_anggota/Chrysanthemum.jpg'),
('B002', 0, 'Buku B', 'Pep', 0, '2010', 'J0001', 10, 'R0001', '01/06/2017', 'gambar_anggota/Koala.jpg'),
('B003', 0, 'Buku C', 'Enrique', 0, '2012', 'J0001', 10, 'R0002', '01/06/2017', 'gambar_anggota/Koala.jpg'),
('B004', 0, 'Buku D', 'Allegri', 0, '2010', 'J0001', 12, 'R0001', '01/22/2017', 'gambar_anggota/Tulips.jpg'),
('B005', 0, 'Buku E', 'Zidane', 0, '2010', 'J0001', 6, 'R0001', '01/22/2017', 'gambar_anggota/Hydrangeas.jpg'),
('B006', 2147483647, 'A Wrinkle In Time', 'Madeleine L`Engle', 3, '2018', 'J0001', 3, 'R0001', '09/13/2018', 'gambar_anggota/wrinkleintime.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_buku`
--

CREATE TABLE IF NOT EXISTS `tbl_jenis_buku` (
  `idJenis` varchar(20) NOT NULL,
  `NamaJenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jenis_buku`
--

INSERT INTO `tbl_jenis_buku` (`idJenis`, `NamaJenis`) VALUES
('J0001', 'Buku utama rujukan'),
('J0002', 'Buku pendukung'),
('J0003', 'Buku ensiklopedia'),
('J0004', 'Buku filsafat'),
('J0005', 'Buku luar negeri'),
('J0006', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_anggota`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori_anggota` (
  `id_kategori_anggota` varchar(11) NOT NULL,
  `kategori_anggota` varchar(20) NOT NULL,
  `max_buku_pinjam` int(11) NOT NULL,
  `max_hari_pinjam` int(11) NOT NULL,
  `perpanjangan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori_anggota`
--

INSERT INTO `tbl_kategori_anggota` (`id_kategori_anggota`, `kategori_anggota`, `max_buku_pinjam`, `max_hari_pinjam`, `perpanjangan`) VALUES
('K0001', 'Mahasiswa', 4, 7, 7),
('K0002', 'Dosen', 10, 20, 20),
('K0003', 'Karyawan', 5, 7, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penerbit`
--

CREATE TABLE IF NOT EXISTS `tbl_penerbit` (
`id_penerbit` int(4) NOT NULL,
  `penerbit` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id_penerbit`, `penerbit`, `alamat`, `telepon`) VALUES
(2, 'Erlangga', 'jalan ', '0232'),
(3, 'Noura Book Publising ', 'Jl. Jagakarsa Raya No. 40 RT 007/004, Jagakarsa, J', '(021) 7888');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengunjung`
--

CREATE TABLE IF NOT EXISTS `tbl_pengunjung` (
`id` int(10) NOT NULL,
  `nrp` varchar(15) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `keperluan` varchar(20) DEFAULT NULL,
  `saran` longtext,
  `tgl` varchar(15) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data untuk tabel `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id`, `nrp`, `jk`, `keperluan`, `saran`, `tgl`, `jam`) VALUES
(33, '11', 'Laki-laki', 'baca', '', '2017/02/15', '20:04:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rak`
--

CREATE TABLE IF NOT EXISTS `tbl_rak` (
  `idRak` varchar(20) NOT NULL,
  `NamaRak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rak`
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
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `idTrans` varchar(20) NOT NULL,
  `idBuku` varchar(20) DEFAULT NULL,
  `nrp` varchar(20) DEFAULT NULL,
  `tglPinjam` varchar(15) DEFAULT NULL,
  `tglKembali` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`idTrans`, `idBuku`, `nrp`, `tglPinjam`, `tglKembali`, `status`) VALUES
('T0001', 'B001', '11', '15-02-2017', '01-03-2017', 'Kembali'),
('T0002', 'B001', '12', '15-02-2017', '22-02-2017', 'Kembali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'Administrator'),
(2, 'user1', 'user1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
 ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
 ADD PRIMARY KEY (`idBuku`), ADD KEY `idJenis` (`idJenis`), ADD KEY `idRak` (`idRak`);

--
-- Indexes for table `tbl_jenis_buku`
--
ALTER TABLE `tbl_jenis_buku`
 ADD PRIMARY KEY (`idJenis`);

--
-- Indexes for table `tbl_kategori_anggota`
--
ALTER TABLE `tbl_kategori_anggota`
 ADD PRIMARY KEY (`id_kategori_anggota`);

--
-- Indexes for table `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
 ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
 ADD PRIMARY KEY (`idRak`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
 ADD PRIMARY KEY (`idTrans`), ADD KEY `nrp` (`nrp`), ADD KEY `idBuku` (`idBuku`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
MODIFY `id_penerbit` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
ADD CONSTRAINT `tbl_buku_ibfk_1` FOREIGN KEY (`idJenis`) REFERENCES `tbl_jenis_buku` (`idJenis`),
ADD CONSTRAINT `tbl_buku_ibfk_2` FOREIGN KEY (`idRak`) REFERENCES `tbl_rak` (`idRak`);

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `tbl_anggota` (`nrp`),
ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`idBuku`) REFERENCES `tbl_buku` (`idBuku`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

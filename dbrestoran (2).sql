-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2020 pada 02.08
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrestoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblkategori`
--

CREATE TABLE `tblkategori` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblkategori`
--

INSERT INTO `tblkategori` (`idkategori`, `kategori`) VALUES
(14, 'makanan'),
(15, 'minuman'),
(17, 'Jajan'),
(18, 'buah'),
(20, 'Yeahs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmenu`
--

CREATE TABLE `tblmenu` (
  `idmenu` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblmenu`
--

INSERT INTO `tblmenu` (`idmenu`, `idkategori`, `menu`, `gambar`, `harga`) VALUES
(49, 14, 'Telur Dadar', 'telur.jpg', 10000),
(51, 14, 'Spaghetti', 'spaghetti.jpg', 5000),
(52, 15, 'Es Buah', 'es buah.jpg', 5000),
(60, 15, 'Soda', 'pepsi.jpg', 5000),
(61, 14, 'Sate', 'chopstick.jpg', 10000),
(62, 14, 'Ayam Bakar', 'ayam.jpg', 15000),
(63, 15, 'Jus Blueberry', 'blueberry.jpg', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblorder`
--

CREATE TABLE `tblorder` (
  `idorder` int(11) NOT NULL,
  `idpelanggan` int(11) NOT NULL,
  `tglorder` date NOT NULL,
  `total` float NOT NULL DEFAULT 0,
  `bayar` float NOT NULL DEFAULT 0,
  `kembali` float NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblorder`
--

INSERT INTO `tblorder` (`idorder`, `idpelanggan`, `tglorder`, `total`, `bayar`, `kembali`, `status`) VALUES
(62, 1, '2020-09-07', 21000, 25000, 4000, 1),
(63, 6, '2020-09-07', 11000, 0, 0, 0),
(64, 10, '2020-11-04', 20000, 0, 0, 0),
(68, 12, '2020-11-04', 20000, 0, 0, 0),
(69, 12, '2020-11-05', 40000, 0, 0, 0),
(70, 12, '2020-11-05', 10000, 0, 0, 0),
(71, 12, '2020-11-05', 20000, 20000, 0, 1),
(72, 2, '2020-11-05', 20000, 0, 0, 0),
(73, 1, '2020-11-23', 75000, 100000, 25000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblordetail`
--

CREATE TABLE `tblordetail` (
  `idordetail` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargajual` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblordetail`
--

INSERT INTO `tblordetail` (`idordetail`, `idorder`, `idmenu`, `jumlah`, `hargajual`) VALUES
(40, 62, 49, 1, 10000),
(41, 62, 50, 1, 6000),
(42, 62, 52, 1, 5000),
(43, 63, 50, 1, 6000),
(44, 63, 51, 1, 5000),
(45, 64, 62, 1, 15000),
(46, 64, 63, 1, 5000),
(49, 68, 49, 1, 10000),
(50, 68, 61, 1, 10000),
(51, 69, 63, 2, 5000),
(52, 69, 62, 2, 15000),
(53, 70, 51, 2, 5000),
(54, 71, 61, 2, 10000),
(55, 72, 51, 2, 5000),
(56, 72, 60, 2, 5000),
(57, 73, 49, 4, 10000),
(58, 73, 61, 2, 10000),
(59, 73, 60, 3, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpelanggan`
--

CREATE TABLE `tblpelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblpelanggan`
--

INSERT INTO `tblpelanggan` (`idpelanggan`, `pelanggan`, `alamat`, `telp`, `email`, `password`, `aktif`) VALUES
(1, 'joni', 'surabaya', '09886217', 'joni@gmail.com', '$2y$10$zrZtgkOiWt52nF1PC84M8.FdnWEKX5MY0lbwPyoMhT5v/AWsBHV6K', 1),
(2, 'samsul', 'suarabaya', '08781278271', 'arif@gmail', '$2y$10$zrZtgkOiWt52nF1PC84M8.FdnWEKX5MY0lbwPyoMhT5v/AWsBHV6K', 1),
(6, 'udin', 'surabaya', '09886217', 'pelanggan@gmail.com', '$2y$10$zrZtgkOiWt52nF1PC84M8.FdnWEKX5MY0lbwPyoMhT5v/AWsBHV6K', 1),
(8, 'saifudin', 'surabaya', '09886217', 'arif14.sw@gmail.com', '$2y$10$zrZtgkOiWt52nF1PC84M8.FdnWEKX5MY0lbwPyoMhT5v/AWsBHV6K', 1),
(9, 'saifudin', 'surabaya', '09886217', 'arif14.sw@gmail.com', '$2y$10$zrZtgkOiWt52nF1PC84M8.FdnWEKX5MY0lbwPyoMhT5v/AWsBHV6K', 1),
(10, 'sulis', 'Jombang', '09886217', 'sulis@gmail.com', '123', 1),
(12, 'Jono', 'Surabaya', '09872346234', 'jono@gmail.com', '$2y$10$PI2bRyGBTDM/NFYDGaJ9a.Iiz6MzUAGXUUwJAy9ApZrZ.BUHsv8hC', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbluser`
--

CREATE TABLE `tbluser` (
  `iduser` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `aktif_user` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbluser`
--

INSERT INTO `tbluser` (`iduser`, `user`, `email`, `password`, `level`, `aktif_user`) VALUES
(10, 'admin', 'admin@gmail.com', '$2y$10$zrZtgkOiWt52nF1PC84M8.FdnWEKX5MY0lbwPyoMhT5v/AWsBHV6K', 'Admin', 1),
(11, 'koki', 'koki@gmail.com', '$2y$10$zrZtgkOiWt52nF1PC84M8.FdnWEKX5MY0lbwPyoMhT5v/AWsBHV6K', 'Koki', 1),
(12, 'kasir', 'kasir@gmail.com', '$2y$10$zrZtgkOiWt52nF1PC84M8.FdnWEKX5MY0lbwPyoMhT5v/AWsBHV6K', 'Kasir', 1),
(17, 'Coba', 'coba@gmail.com', '$2y$10$zrZtgkOiWt52nF1PC84M8.FdnWEKX5MY0lbwPyoMhT5v/AWsBHV6K', 'Admin', 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vorder`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vorder` (
`idorder` int(11)
,`idpelanggan` int(11)
,`tglorder` date
,`total` float
,`bayar` float
,`kembali` float
,`status` int(11)
,`pelanggan` varchar(100)
,`alamat` varchar(200)
,`telp` varchar(200)
,`email` varchar(150)
,`password` varchar(255)
,`aktif` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vordetail`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vordetail` (
`idordetail` int(11)
,`idorder` int(11)
,`idmenu` int(11)
,`jumlah` int(11)
,`hargajual` float
,`idkategori` int(11)
,`menu` varchar(100)
,`gambar` varchar(100)
,`harga` float
,`kategori` varchar(100)
,`idpelanggan` int(11)
,`tglorder` date
,`total` float
,`bayar` float
,`kembali` float
,`status` int(11)
,`pelanggan` varchar(100)
,`alamat` varchar(200)
,`telp` varchar(200)
,`email` varchar(150)
,`password` varchar(255)
,`aktif` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vorder`
--
DROP TABLE IF EXISTS `vorder`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vorder`  AS  select `tblorder`.`idorder` AS `idorder`,`tblorder`.`idpelanggan` AS `idpelanggan`,`tblorder`.`tglorder` AS `tglorder`,`tblorder`.`total` AS `total`,`tblorder`.`bayar` AS `bayar`,`tblorder`.`kembali` AS `kembali`,`tblorder`.`status` AS `status`,`tblpelanggan`.`pelanggan` AS `pelanggan`,`tblpelanggan`.`alamat` AS `alamat`,`tblpelanggan`.`telp` AS `telp`,`tblpelanggan`.`email` AS `email`,`tblpelanggan`.`password` AS `password`,`tblpelanggan`.`aktif` AS `aktif` from (`tblpelanggan` join `tblorder` on(`tblpelanggan`.`idpelanggan` = `tblorder`.`idpelanggan`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vordetail`
--
DROP TABLE IF EXISTS `vordetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vordetail`  AS  select `tblordetail`.`idordetail` AS `idordetail`,`tblordetail`.`idorder` AS `idorder`,`tblordetail`.`idmenu` AS `idmenu`,`tblordetail`.`jumlah` AS `jumlah`,`tblordetail`.`hargajual` AS `hargajual`,`tblmenu`.`idkategori` AS `idkategori`,`tblmenu`.`menu` AS `menu`,`tblmenu`.`gambar` AS `gambar`,`tblmenu`.`harga` AS `harga`,`tblkategori`.`kategori` AS `kategori`,`tblorder`.`idpelanggan` AS `idpelanggan`,`tblorder`.`tglorder` AS `tglorder`,`tblorder`.`total` AS `total`,`tblorder`.`bayar` AS `bayar`,`tblorder`.`kembali` AS `kembali`,`tblorder`.`status` AS `status`,`tblpelanggan`.`pelanggan` AS `pelanggan`,`tblpelanggan`.`alamat` AS `alamat`,`tblpelanggan`.`telp` AS `telp`,`tblpelanggan`.`email` AS `email`,`tblpelanggan`.`password` AS `password`,`tblpelanggan`.`aktif` AS `aktif` from ((((`tblordetail` join `tblorder` on(`tblordetail`.`idorder` = `tblorder`.`idorder`)) join `tblpelanggan` on(`tblorder`.`idpelanggan` = `tblpelanggan`.`idpelanggan`)) join `tblmenu` on(`tblordetail`.`idmenu` = `tblmenu`.`idmenu`)) join `tblkategori` on(`tblmenu`.`idkategori` = `tblkategori`.`idkategori`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblkategori`
--
ALTER TABLE `tblkategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indeks untuk tabel `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`idorder`);

--
-- Indeks untuk tabel `tblordetail`
--
ALTER TABLE `tblordetail`
  ADD PRIMARY KEY (`idordetail`);

--
-- Indeks untuk tabel `tblpelanggan`
--
ALTER TABLE `tblpelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indeks untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblkategori`
--
ALTER TABLE `tblkategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `tblordetail`
--
ALTER TABLE `tblordetail`
  MODIFY `idordetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tblpelanggan`
--
ALTER TABLE `tblpelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 01:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemtokoalmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar_produsen`
--

CREATE TABLE `bayar_produsen` (
  `id_bayar_produsen` int(20) NOT NULL,
  `id_pesan` int(20) NOT NULL,
  `id_produsen` int(20) NOT NULL,
  `kode_obat` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `id_owner` int(20) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faktur_penjualan`
--

CREATE TABLE `faktur_penjualan` (
  `no_transaksi` int(20) NOT NULL,
  `kode_obat` int(20) NOT NULL,
  `id_jenis` int(20) NOT NULL,
  `id_harga` int(20) NOT NULL,
  `quantity_jual` int(20) NOT NULL,
  `jumlah_pembayaran` int(20) NOT NULL,
  `id_konsumen` int(20) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_produsen` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(20) NOT NULL,
  `harga_obat` int(20) NOT NULL,
  `kode_obat` int(20) NOT NULL,
  `nama_obat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `harga_obat`, `kode_obat`, `nama_obat`) VALUES
(1, 35000, 1, 'Acarbose'),
(2, 4000, 2, 'Antasid'),
(3, 29000, 3, 'Paracetamol'),
(4, 3000, 4, 'Neozep Forte'),
(5, 2500, 5, 'Paramex'),
(6, 2000, 6, 'Decolgen'),
(7, 25000, 7, 'Loratadine'),
(8, 200000, 8, 'Inlacin');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(20) NOT NULL,
  `jenis_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `harga_obat` int(20) NOT NULL,
  `kode_obat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis_obat`, `nama_obat`, `harga_obat`, `kode_obat`) VALUES
(1, 'Antidiabetes', 'Acarbose', 35000, 1),
(2, 'Obat Bebas', 'Antasid', 4000, 2),
(3, 'Obat Bebas', 'Paracetamol', 29000, 3),
(4, 'Obat Bebas Terbatas', 'Neozep Forte', 3000, 4),
(5, 'Obat Bebas Terbatas', 'Paramex', 2500, 5),
(6, 'Obat Bebas Terbatas', 'Decolgen', 2000, 6),
(7, 'Obat Keras', 'Loratadine', 25000, 7),
(8, 'Obat Fitotarmaka', 'Inlacin', 200000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(20) NOT NULL,
  `nama_konsumen` varchar(20) NOT NULL,
  `nomor_telp_konsumen` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nama_konsumen`, `nomor_telp_konsumen`) VALUES
(1, 'Novi', 24698067),
(2, 'Akbar', 28920483),
(3, 'Sarah', 26781099),
(4, 'Rafa', 20802017),
(5, 'Salsa', 28195462),
(6, 'Gibran', 28108767),
(7, 'Alya', 23456789),
(8, 'Benny', 27864333),
(9, 'Zaki', 23781020),
(10, 'Rara', 29891245);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` int(20) NOT NULL,
  `nomor_produksi_obat` int(20) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `brand_obat` varchar(20) NOT NULL,
  `expired_obat` date NOT NULL,
  `manufactured_obat` date NOT NULL,
  `jenis_obat` varchar(20) NOT NULL,
  `stok_obat` int(20) NOT NULL,
  `harga_obat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nomor_produksi_obat`, `nama_obat`, `brand_obat`, `expired_obat`, `manufactured_obat`, `jenis_obat`, `stok_obat`, `harga_obat`) VALUES
(1, 89910368, 'Acarbose', 'Acrios', '2021-12-08', '2020-12-08', 'Antidiabetes', 65, 35000),
(2, 89302839, 'Antasid', 'Promag', '2021-08-06', '2020-08-06', 'Obat Bebas', 62, 4000),
(3, 98401933, 'Paracetamol', 'Paramol', '2021-12-12', '2020-12-12', 'Obat Bebas', 66, 29000),
(4, 13579055, 'Neozep Forte', 'Neozep', '2021-11-09', '2020-11-09', 'Obat Bebas Terbatas', 47, 3000),
(5, 42121345, 'Paramex', 'Paramex', '2021-12-20', '2020-12-20', 'Obat Bebas Terbatas', 43, 2500),
(6, 23213411, 'Decolgen', 'Decolgen', '2021-09-09', '2020-09-09', 'Obat Bebas Terbatas', 44, 2000),
(7, 86907774, 'Loratadine', 'Novapharin', '2021-12-09', '2020-12-09', 'Obat Keras', 28, 25000),
(8, 90840280, 'Inlacin', 'Dexa Medica', '2021-11-09', '2020-11-09', 'Obat Fitotarmaka', 29, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id_owner` int(20) NOT NULL,
  `nama_owner` varchar(20) NOT NULL,
  `nomor_telp_owner` int(20) NOT NULL,
  `id_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(20) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `nomor_telp_pegawai` int(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `id_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesan_obat`
--

CREATE TABLE `pesan_obat` (
  `id_pesan` int(20) NOT NULL,
  `id_produsen` int(20) NOT NULL,
  `kode_obat` int(20) NOT NULL,
  `id_jenis` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `id_stok` int(20) NOT NULL,
  `id_owner` int(20) NOT NULL,
  `nomor_produksi_obat` int(20) NOT NULL,
  `tanggal_pemesanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produsen`
--

CREATE TABLE `produsen` (
  `id_produsen` int(20) NOT NULL,
  `nomor_produksi_obat` int(20) NOT NULL,
  `brand_obat` varchar(20) NOT NULL,
  `id_jenis` int(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `kode_obat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produsen`
--

INSERT INTO `produsen` (`id_produsen`, `nomor_produksi_obat`, `brand_obat`, `id_jenis`, `alamat`, `no_telp`, `kode_obat`) VALUES
(1, 89910368, 'Acrios', 1, 'Jakarta', 20903089, 1),
(2, 89302839, 'Promag', 2, 'Jakarta', 28917834, 2),
(3, 98401933, 'Paramol', 3, 'Bogor', 21872231, 3),
(4, 13579055, 'Neozep', 4, 'Bogor', 29108227, 4),
(5, 42121345, 'Paramex', 5, 'Surabaya', 29018734, 5),
(6, 23213411, 'Decolgen', 6, 'Bandung', 21928839, 6),
(7, 86907774, 'Novapharin', 7, 'Jakarta', 28917756, 7),
(8, 90840280, 'Dexa Medica', 8, 'Surabaya', 29197887, 8);

-- --------------------------------------------------------

--
-- Table structure for table `stok_obat`
--

CREATE TABLE `stok_obat` (
  `id_stok` int(20) NOT NULL,
  `stok_obat_masuk` int(20) NOT NULL,
  `stok_obat_keluar` int(20) NOT NULL,
  `kode_obat` int(20) NOT NULL,
  `nama_obat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_obat`
--

INSERT INTO `stok_obat` (`id_stok`, `stok_obat_masuk`, `stok_obat_keluar`, `kode_obat`, `nama_obat`) VALUES
(1, 75, 10, 1, 'Acarbose'),
(2, 75, 13, 2, 'Antasid'),
(3, 75, 9, 3, 'Paracetamol'),
(4, 50, 3, 4, 'Neozep Forte'),
(5, 50, 7, 5, 'Paramex'),
(6, 50, 6, 6, 'Decolgen'),
(7, 30, 2, 7, 'Loratadine'),
(8, 30, 1, 8, 'Inlacin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar_produsen`
--
ALTER TABLE `bayar_produsen`
  ADD PRIMARY KEY (`id_bayar_produsen`),
  ADD KEY `idpesan` (`id_pesan`),
  ADD KEY `idprodusen` (`id_produsen`),
  ADD KEY `kodeobat` (`kode_obat`),
  ADD KEY `idowner` (`id_owner`);

--
-- Indexes for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `id_produsen` (`id_produsen`),
  ADD KEY `id_harga` (`id_harga`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_owner`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `iduser` (`id_user`);

--
-- Indexes for table `pesan_obat`
--
ALTER TABLE `pesan_obat`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `produsenid` (`id_produsen`),
  ADD KEY `obatkode` (`kode_obat`),
  ADD KEY `jenisid` (`id_jenis`),
  ADD KEY `stokid` (`id_stok`),
  ADD KEY `ownerid` (`id_owner`);

--
-- Indexes for table `produsen`
--
ALTER TABLE `produsen`
  ADD PRIMARY KEY (`id_produsen`);

--
-- Indexes for table `stok_obat`
--
ALTER TABLE `stok_obat`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar_produsen`
--
ALTER TABLE `bayar_produsen`
  MODIFY `id_bayar_produsen` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  MODIFY `no_transaksi` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `kode_obat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id_owner` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan_obat`
--
ALTER TABLE `pesan_obat`
  MODIFY `id_pesan` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produsen`
--
ALTER TABLE `produsen`
  MODIFY `id_produsen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stok_obat`
--
ALTER TABLE `stok_obat`
  MODIFY `id_stok` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayar_produsen`
--
ALTER TABLE `bayar_produsen`
  ADD CONSTRAINT `idowner` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id_owner`),
  ADD CONSTRAINT `idpesan` FOREIGN KEY (`id_pesan`) REFERENCES `pesan_obat` (`id_pesan`),
  ADD CONSTRAINT `idprodusen` FOREIGN KEY (`id_produsen`) REFERENCES `produsen` (`id_produsen`),
  ADD CONSTRAINT `kodeobat` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);

--
-- Constraints for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  ADD CONSTRAINT `id_harga` FOREIGN KEY (`id_harga`) REFERENCES `harga` (`id_harga`),
  ADD CONSTRAINT `id_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `id_konsumen` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`),
  ADD CONSTRAINT `id_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `id_produsen` FOREIGN KEY (`id_produsen`) REFERENCES `produsen` (`id_produsen`),
  ADD CONSTRAINT `kode_obat` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `iduser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pesan_obat`
--
ALTER TABLE `pesan_obat`
  ADD CONSTRAINT `jenisid` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `obatkode` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`),
  ADD CONSTRAINT `ownerid` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id_owner`),
  ADD CONSTRAINT `produsenid` FOREIGN KEY (`id_produsen`) REFERENCES `produsen` (`id_produsen`),
  ADD CONSTRAINT `stokid` FOREIGN KEY (`id_stok`) REFERENCES `stok_obat` (`id_stok`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

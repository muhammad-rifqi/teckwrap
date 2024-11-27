-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 06:42 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techwrap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_autonumber`
--

CREATE TABLE `tb_autonumber` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_autonumber`
--

INSERT INTO `tb_autonumber` (`id`, `no`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_backup_master_barang`
--

CREATE TABLE `tb_backup_master_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `kode_barcode` varchar(255) NOT NULL,
  `thnbln` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `kode_barcode` varchar(255) NOT NULL,
  `thnbln` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barcode`
--

CREATE TABLE `tb_barcode` (
  `id_barcode` int(11) NOT NULL,
  `autonumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barcode`
--

INSERT INTO `tb_barcode` (`id_barcode`, `autonumber`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `id_inventory` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `generate_code` varchar(255) NOT NULL,
  `kode_barcode` int(11) NOT NULL,
  `thnbln` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inventory`
--

INSERT INTO `tb_inventory` (`id_inventory`, `kode_barang`, `generate_code`, `kode_barcode`, `thnbln`, `tanggal`) VALUES
(58, 'ECHS', '1808TIGECHS5', 5, '1808', '2018-08-19 00:53:17'),
(117, 'ABCD1234', '1808ABCD12340002', 0, '1808', '2018-08-20 13:43:17'),
(118, 'ABC123', '1808ABC1230003', 0, '1808', '2018-08-20 13:44:39'),
(119, 'ABC123', '1808ABC1230004', 0, '1808', '2018-08-20 14:10:57'),
(120, 'ECHSV888', '1808ECHSV8880001', 0, '1808', '2018-08-20 14:12:56'),
(121, 'ECHSV888', '1808ECHSV8880003', 0, '1808', '2018-08-20 14:13:31'),
(122, 'AAAA111', '1808AAAA1110001', 0, '1808', '2018-08-20 14:27:29'),
(123, 'ABCD456', '2411ABCD4560001', 0, '2411', '2024-11-26 09:49:20'),
(124, 'ABC123', '2411ABC1230006', 0, '2411', '2024-11-26 09:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_barang`
--

CREATE TABLE `tb_jenis_barang` (
  `id` int(11) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_barang`
--

INSERT INTO `tb_jenis_barang` (`id`, `jenis_barang`) VALUES
(5, 'Pakaian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_barang`
--

CREATE TABLE `tb_master_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `harga` int(11) NOT NULL,
  `jenis_barang` int(11) NOT NULL,
  `kode_barcode` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_barang`
--

INSERT INTO `tb_master_barang` (`id_barang`, `kode_barang`, `nama_barang`, `qty`, `harga`, `jenis_barang`, `kode_barcode`) VALUES
(16, 'AAA123', 'Handphone', 10, 3000000, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_printer_code`
--

CREATE TABLE `tb_printer_code` (
  `id` int(11) NOT NULL,
  `string` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_printer_code`
--

INSERT INTO `tb_printer_code` (`id`, `string`) VALUES
(1, '^Q46,3,0+'),
(2, '^W73'),
(3, '^H10'),
(4, '^P5'),
(5, '^S2'),
(6, '^AD'),
(7, '^C12'),
(8, '^R5'),
(9, '~Q+5'),
(10, '^O0'),
(11, '^D0'),
(12, '^E35'),
(13, '~R200'),
(14, '^L'),
(15, 'Dy2-me-dd'),
(16, 'Th:m:s'),
(17, 'C0,0006,+1,Prompt'),
(18, 'BA,20,100,2,5,200,0,3,2411ABC123^C0'),
(19, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('admin','gudang','supervisi') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'gudang', '827ccb0eea8a706c4c34a16891f84e7b', 'gudang'),
(3, 'supervisi', 'af77689acde7c44e0bbad8acb95e8401', 'supervisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_autonumber`
--
ALTER TABLE `tb_autonumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_backup_master_barang`
--
ALTER TABLE `tb_backup_master_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barcode`
--
ALTER TABLE `tb_barcode`
  ADD PRIMARY KEY (`id_barcode`);

--
-- Indexes for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`id_inventory`);

--
-- Indexes for table `tb_jenis_barang`
--
ALTER TABLE `tb_jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_barang`
--
ALTER TABLE `tb_master_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_printer_code`
--
ALTER TABLE `tb_printer_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_autonumber`
--
ALTER TABLE `tb_autonumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_backup_master_barang`
--
ALTER TABLE `tb_backup_master_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_barcode`
--
ALTER TABLE `tb_barcode`
  MODIFY `id_barcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `id_inventory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tb_jenis_barang`
--
ALTER TABLE `tb_jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_master_barang`
--
ALTER TABLE `tb_master_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_printer_code`
--
ALTER TABLE `tb_printer_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

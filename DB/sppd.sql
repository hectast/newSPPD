-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 03:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppd`
--

-- --------------------------------------------------------

--
-- Table structure for table `adspd`
--

CREATE TABLE `adspd` (
  `id` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `namadmin` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adspd`
--

INSERT INTO `adspd` (`id`, `username`, `password`, `namadmin`) VALUES
(1, 'admin', '7e5eda6bf14848cbf99552bcd25d4abe', 'administrator ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bendahara`
--

CREATE TABLE `tbl_bendahara` (
  `id` int(5) NOT NULL,
  `namabendahara` varchar(50) NOT NULL,
  `nipbendahara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bendahara`
--

INSERT INTO `tbl_bendahara` (`id`, `namabendahara`, `nipbendahara`) VALUES
(1, 'Hanabi', '723489234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kepbalai`
--

CREATE TABLE `tbl_kepbalai` (
  `id` int(5) NOT NULL,
  `namakepbalai` varchar(50) NOT NULL,
  `nipkepbalai` varchar(50) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `tempat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kepbalai`
--

INSERT INTO `tbl_kepbalai` (`id`, `namakepbalai`, `nipkepbalai`, `unit`, `tempat`) VALUES
(14, 'hbvjjhjhjkhhj', '4563354345354', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laksanaspd`
--

CREATE TABLE `tbl_laksanaspd` (
  `id` int(5) NOT NULL,
  `laksanaspd` varchar(50) NOT NULL,
  `niplaksanaspd` varchar(50) NOT NULL,
  `pangkatgol` varchar(50) NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  `tingkat` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_laksanaspd`
--

INSERT INTO `tbl_laksanaspd` (`id`, `laksanaspd`, `niplaksanaspd`, `pangkatgol`, `jabatan`, `tingkat`) VALUES
(1, 'Ir. Muhammad Sahrir, MM', '196502231991031001', 'Pembina, IV/a', 'Kepala Balai', 'C'),
(4, 'Azwar Botutihe', '1119283132323', 'Pembina Utama Muda,IV/c', 'Divisi Programming', 'C'),
(5, 'Ichaq Rahim', '1231231312313', 'Pembina Utama, IV/e', 'Ketua Umum', 'C'),
(6, 'Axel Septian', '645653242', 'Pembina Utama Muda,IV/c', 'Kabid Properti', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pjspd`
--

CREATE TABLE `tbl_pjspd` (
  `id` int(5) NOT NULL,
  `namapjspd` varchar(50) NOT NULL,
  `nippjspd` varchar(50) NOT NULL,
  `jabatanpj` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pjspd`
--

INSERT INTO `tbl_pjspd` (`id`, `namapjspd`, `nippjspd`, `jabatanpj`) VALUES
(69, 'Ir. MUHAMMAD SAHRIR, MM', '196502231991031001', 'Kepala'),
(74, 'KURNIATY, SE', '98675432', 'Ka Sub Bagian Tata Usaha'),
(75, 'Rahman', '6453524', 'Kepala LAB INFORMATIKA'),
(76, 'Thohir', '998762', 'Kepala IT Networking');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ppk`
--

CREATE TABLE `tbl_ppk` (
  `id` int(5) NOT NULL,
  `namappk` varchar(50) NOT NULL,
  `nipppk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ppk`
--

INSERT INTO `tbl_ppk` (`id`, `namappk`, `nipppk`) VALUES
(2, 'Muhammad Yasin', '823742349');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riil`
--

CREATE TABLE `tbl_riil` (
  `id` int(5) NOT NULL,
  `laksanaspd` varchar(50) NOT NULL,
  `niplaksanaspd` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tglspd` varchar(100) NOT NULL,
  `nospd` varchar(100) NOT NULL,
  `uraian1` varchar(50) NOT NULL,
  `banyak1` varchar(1) NOT NULL,
  `satuan1` varchar(10) NOT NULL,
  `hargasatuan1` varchar(15) NOT NULL,
  `jumlah1` varchar(15) NOT NULL,
  `uraian2` varchar(50) NOT NULL,
  `banyak2` varchar(1) NOT NULL,
  `satuan2` varchar(10) NOT NULL,
  `hargasatuan2` varchar(15) NOT NULL,
  `jumlah2` varchar(15) NOT NULL,
  `uraian3` varchar(50) NOT NULL,
  `banyak3` varchar(1) NOT NULL,
  `satuan3` varchar(10) NOT NULL,
  `hargasatuan3` varchar(15) NOT NULL,
  `jumlah3` varchar(15) NOT NULL,
  `uraian4` varchar(50) NOT NULL,
  `banyak4` varchar(1) NOT NULL,
  `satuan4` varchar(10) NOT NULL,
  `hargasatuan4` varchar(15) NOT NULL,
  `jumlah4` varchar(15) NOT NULL,
  `uraian5` varchar(50) NOT NULL,
  `banyak5` varchar(1) NOT NULL,
  `satuan5` varchar(10) NOT NULL,
  `hargasatuan5` varchar(15) NOT NULL,
  `jumlah5` varchar(15) NOT NULL,
  `uraian6` varchar(50) NOT NULL,
  `banyak6` varchar(1) NOT NULL,
  `satuan6` varchar(10) NOT NULL,
  `hargasatuan6` varchar(15) NOT NULL,
  `jumlah6` varchar(15) NOT NULL,
  `uraian7` varchar(50) NOT NULL,
  `banyak7` varchar(1) NOT NULL,
  `satuan7` varchar(10) NOT NULL,
  `hargasatuan7` varchar(15) NOT NULL,
  `jumlah7` varchar(15) NOT NULL,
  `uraian8` varchar(50) NOT NULL,
  `banyak8` varchar(1) NOT NULL,
  `satuan8` varchar(10) NOT NULL,
  `hargasatuan8` varchar(15) NOT NULL,
  `jumlah8` varchar(15) NOT NULL,
  `total` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riil`
--

INSERT INTO `tbl_riil` (`id`, `laksanaspd`, `niplaksanaspd`, `jabatan`, `tglspd`, `nospd`, `uraian1`, `banyak1`, `satuan1`, `hargasatuan1`, `jumlah1`, `uraian2`, `banyak2`, `satuan2`, `hargasatuan2`, `jumlah2`, `uraian3`, `banyak3`, `satuan3`, `hargasatuan3`, `jumlah3`, `uraian4`, `banyak4`, `satuan4`, `hargasatuan4`, `jumlah4`, `uraian5`, `banyak5`, `satuan5`, `hargasatuan5`, `jumlah5`, `uraian6`, `banyak6`, `satuan6`, `hargasatuan6`, `jumlah6`, `uraian7`, `banyak7`, `satuan7`, `hargasatuan7`, `jumlah7`, `uraian8`, `banyak8`, `satuan8`, `hargasatuan8`, `jumlah8`, `total`) VALUES
(1, 'Azwar Botutihe', '1119283132323', 'Divisi Programming BBKP Makassar', '25 Februari 2021', '/TU.040/K.10.A/02/2021  ', 'Hotel (Penginapan)', '1', 'Hari', ' 1000000', '1000000', 'Uang Harian', '3', 'Kali', ' 500000', '1500000', 'Transpor Makassar-Yogyakarta', '3', 'Hari', ' -', '0', 'Transpor Yogyakarta-Makassar', '2', 'Hari', ' -', '0', 'Transpor Yogyakarta-Makassar', '4', 'Malam', ' -', '0', 'Transpor ke Bandara Slt Hasanuddin', '3', 'Hari', ' -', '0', 'Transpor dari Bandara ke Tujuan', '6', 'Hari', ' -', '0', 'Uang Representatif', '6', 'Hari', '-', '0', '2500000'),
(2, 'Ichaq Rahim', '1231231312313', 'Ketua Umum BBKP Makassar', '27 Februari 2021', '/TU.041/K.11.A/02/2021  ', 'Hotel (Penginapan)', '7', 'Hari', ' 2500000', '17500000', 'Uang Harian', '1', 'Hari', ' 700000', '700000', 'Sewa Kendaraan', '7', 'Kali', ' 500000', '3500000', '-', '-', '-', ' -', '0', '-', '-', '-', ' -', '0', '-', '-', '-', ' -', '0', '-', '-', '-', ' -', '0', '-', '-', '-', '-', '0', '21700000'),
(4, 'Axel Septian', '645653242', 'Kabid Properti', '28 Februari 2021', '/TU.042/K.12.A/02/2021  ', 'Hotel (Penginapan)', '6', 'Malam', '2500000', '15000000', 'Uang Harian', '5', 'Hari', '1000000', '5000000', 'Transpor dari Bandara ke Tujuan', '1', 'Kali', '-', '50000', '-', '-', '-', ' -', '0', '-', '-', '-', ' -', '0', '-', '-', '-', ' -', '0', '-', '-', '-', ' -', '0', '-', '-', '-', '-', '0', '20050000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rinciriil`
--

CREATE TABLE `tbl_rinciriil` (
  `id` int(5) NOT NULL,
  `laksanaspd` varchar(100) NOT NULL,
  `niplaksanaspd` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nospd` varchar(100) NOT NULL,
  `tglspd` varchar(100) NOT NULL,
  `maksud` varchar(350) NOT NULL,
  `akun` varchar(100) NOT NULL,
  `uraian1` varchar(100) NOT NULL,
  `banyak1` varchar(1) NOT NULL,
  `satuan1` varchar(10) NOT NULL,
  `hargasatuan1` varchar(15) NOT NULL,
  `persen1` varchar(5) NOT NULL,
  `jumlah1` varchar(15) NOT NULL,
  `uraian2` varchar(100) NOT NULL,
  `banyak2` varchar(1) NOT NULL,
  `satuan2` varchar(10) NOT NULL,
  `hargasatuan2` varchar(15) NOT NULL,
  `persen2` varchar(5) NOT NULL,
  `jumlah2` varchar(15) NOT NULL,
  `uraian3` varchar(100) NOT NULL,
  `banyak3` varchar(1) NOT NULL,
  `satuan3` varchar(10) NOT NULL,
  `hargasatuan3` varchar(15) NOT NULL,
  `persen3` varchar(5) NOT NULL,
  `jumlah3` varchar(15) NOT NULL,
  `uraian4` varchar(100) NOT NULL,
  `banyak4` varchar(1) NOT NULL,
  `satuan4` varchar(10) NOT NULL,
  `hargasatuan4` varchar(15) NOT NULL,
  `persen4` varchar(5) NOT NULL,
  `jumlah4` varchar(15) NOT NULL,
  `uraian5` varchar(100) NOT NULL,
  `banyak5` varchar(1) NOT NULL,
  `satuan5` varchar(10) NOT NULL,
  `hargasatuan5` varchar(15) NOT NULL,
  `persen5` varchar(5) NOT NULL,
  `jumlah5` varchar(15) NOT NULL,
  `uraian6` varchar(100) NOT NULL,
  `banyak6` varchar(1) NOT NULL,
  `satuan6` varchar(10) NOT NULL,
  `hargasatuan6` varchar(15) NOT NULL,
  `persen6` varchar(5) NOT NULL,
  `jumlah6` varchar(15) NOT NULL,
  `uraian7` varchar(100) NOT NULL,
  `banyak7` varchar(1) NOT NULL,
  `satuan7` varchar(10) NOT NULL,
  `hargasatuan7` varchar(15) NOT NULL,
  `persen7` varchar(5) NOT NULL,
  `jumlah7` varchar(15) NOT NULL,
  `uraian8` varchar(100) NOT NULL,
  `banyak8` varchar(1) NOT NULL,
  `satuan8` varchar(10) NOT NULL,
  `hargasatuan8` varchar(15) NOT NULL,
  `persen8` varchar(5) NOT NULL,
  `jumlah8` varchar(15) NOT NULL,
  `total` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rinciriil`
--

INSERT INTO `tbl_rinciriil` (`id`, `laksanaspd`, `niplaksanaspd`, `jabatan`, `nospd`, `tglspd`, `maksud`, `akun`, `uraian1`, `banyak1`, `satuan1`, `hargasatuan1`, `persen1`, `jumlah1`, `uraian2`, `banyak2`, `satuan2`, `hargasatuan2`, `persen2`, `jumlah2`, `uraian3`, `banyak3`, `satuan3`, `hargasatuan3`, `persen3`, `jumlah3`, `uraian4`, `banyak4`, `satuan4`, `hargasatuan4`, `persen4`, `jumlah4`, `uraian5`, `banyak5`, `satuan5`, `hargasatuan5`, `persen5`, `jumlah5`, `uraian6`, `banyak6`, `satuan6`, `hargasatuan6`, `persen6`, `jumlah6`, `uraian7`, `banyak7`, `satuan7`, `hargasatuan7`, `persen7`, `jumlah7`, `uraian8`, `banyak8`, `satuan8`, `hargasatuan8`, `persen8`, `jumlah8`, `total`) VALUES
(8, 'Ichaq Rahim', '1231231312313', 'Ketua Umum', '001/TU.040/K.10.A/02/2021', '2021-02-28', 'Jalan Jalan', 'PemProv', 'Hotel (Penginapan)', '1', 'Malam', ' 100000', '1', '100000', '-', '-', '-', '-', '1', '0', '-', '-', '-', '-', '1', '0', '-', '-', '-', '-', '1', '0', '-', '-', '-', '-', '1', '0', '-', '-', '-', ' -', '1', '0', '-', '-', '-', ' -', '1', '0', '-', '-', '-', ' -', '1', '0', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spd`
--

CREATE TABLE `tbl_spd` (
  `id` int(5) NOT NULL,
  `namapjspd` varchar(50) NOT NULL,
  `nippjspd` varchar(50) NOT NULL,
  `jabatanpj` varchar(150) NOT NULL,
  `laksanaspd` varchar(50) NOT NULL,
  `niplaksanaspd` varchar(50) NOT NULL,
  `pangkatgol` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tingkat` varchar(1) NOT NULL,
  `maksud` varchar(350) NOT NULL,
  `angkut` varchar(60) NOT NULL,
  `berangkat` varchar(60) NOT NULL,
  `tujuan` varchar(60) NOT NULL,
  `lama` varchar(50) NOT NULL,
  `tglberangkat` varchar(50) NOT NULL,
  `tglkembali` varchar(50) NOT NULL,
  `akun` varchar(100) NOT NULL,
  `nospt` varchar(100) NOT NULL,
  `tglspt` varchar(50) NOT NULL,
  `nospd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_spd`
--

INSERT INTO `tbl_spd` (`id`, `namapjspd`, `nippjspd`, `jabatanpj`, `laksanaspd`, `niplaksanaspd`, `pangkatgol`, `jabatan`, `tingkat`, `maksud`, `angkut`, `berangkat`, `tujuan`, `lama`, `tglberangkat`, `tglkembali`, `akun`, `nospt`, `tglspt`, `nospd`) VALUES
(8, 'KURNIATY, SE', '98675432', 'Ka Sub Bagian Tata Usaha', 'Ichaq Rahim', '1231231312313', 'Pembina Utama, IV/e', 'Ketua Umum', 'C', 'Jalan Jalan', 'Pesawat dan Kendaraan Umum Lainnya', 'Gorontalo', 'Makassar', '3 (tiga) hari', '2021-02-28', '2021-03-03', 'PemProv', '001/TU.040/K.10.A/02/2021', '2021-02-28', '001/TU.040/K.10.A/02/2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_token`
--

INSERT INTO `tbl_token` (`id`, `token`, `username`) VALUES
(17, 'wkJaIu8DEZ', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adspd`
--
ALTER TABLE `adspd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bendahara`
--
ALTER TABLE `tbl_bendahara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kepbalai`
--
ALTER TABLE `tbl_kepbalai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_laksanaspd`
--
ALTER TABLE `tbl_laksanaspd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pjspd`
--
ALTER TABLE `tbl_pjspd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ppk`
--
ALTER TABLE `tbl_ppk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_riil`
--
ALTER TABLE `tbl_riil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rinciriil`
--
ALTER TABLE `tbl_rinciriil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_spd`
--
ALTER TABLE `tbl_spd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adspd`
--
ALTER TABLE `adspd`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_bendahara`
--
ALTER TABLE `tbl_bendahara`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kepbalai`
--
ALTER TABLE `tbl_kepbalai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_laksanaspd`
--
ALTER TABLE `tbl_laksanaspd`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pjspd`
--
ALTER TABLE `tbl_pjspd`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_ppk`
--
ALTER TABLE `tbl_ppk`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_riil`
--
ALTER TABLE `tbl_riil`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_spd`
--
ALTER TABLE `tbl_spd`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

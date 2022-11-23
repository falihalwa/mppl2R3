-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 01:23 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kapas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `IDpasien` double NOT NULL,
  `NIK` double NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` varchar(250) NOT NULL,
  `Usia` int(11) NOT NULL,
  `Golongandarah` set('A','B','O','AB','-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`IDpasien`, `NIK`, `Nama`, `Alamat`, `Usia`, `Golongandarah`) VALUES
(1, 666666666666666, 'admin', 'admin', 22, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `Idkeluhan` double NOT NULL,
  `NIK` double NOT NULL,
  `TekananDarah` varchar(100) DEFAULT NULL,
  `beratbadan` int(11) DEFAULT NULL,
  `tinggibadan` int(11) DEFAULT NULL,
  `suhutubuh` decimal(5,1) DEFAULT NULL,
  `keluhan` varchar(100) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `diagnosis` varchar(600) NOT NULL,
  `resepobat` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`Idkeluhan`, `NIK`, `TekananDarah`, `beratbadan`, `tinggibadan`, `suhutubuh`, `keluhan`, `jam`, `tanggal`, `diagnosis`, `resepobat`) VALUES
(2, 666666666666666, '69/69', 420, 169, '42.0', 'MUAK', '23:59:59', '2022-11-20', 'Mabok', 'Baygon');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `ID` double NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `job` set('Dokter','Perawat','Apoteker') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`ID`, `password`, `username`, `nama`, `job`) VALUES
(1, 'admin', 'admin', 'admin', 'Perawat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`IDpasien`),
  ADD UNIQUE KEY `NIK` (`NIK`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`Idkeluhan`),
  ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `IDpasien` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `Idkeluhan` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `ID` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 09:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppa`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `idakun` int(11) NOT NULL,
  `idlevel` int(11) NOT NULL,
  `iddepartemen` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `NRP` varchar(8) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`idakun`, `idlevel`, `iddepartemen`, `nama`, `NRP`, `dept`, `password`) VALUES
(1, 9, 1, 'Rizki Ramadhan', '91011121', 'Center of Exellence', '$2y$10$OUrDD1UEGgLJm/VFD1fBleJAhV8z/3aslEB30T9.GBSOR3al3tffC'),
(2, 1, 1, 'regina', '12345678', 'HCGA', '$2y$10$TlUy6unE8jMFH53mFYtCqO4qzBU1r6v/vSVO4.Q3oAjeUkELeak3q'),
(29, 10, 1, 'ubay', '12312312', 'Center of Exellence', '$2y$10$oV2EntNkKL.tl74LQTYWpu.IbxB7mdHnp3DfAscoGUe.pjx8T9xf6');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `iddepartemen` int(11) NOT NULL,
  `namadepartemen` varchar(50) NOT NULL,
  `devisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`iddepartemen`, `namadepartemen`, `devisi`) VALUES
(1, 'Center Of Excellent', 'SS6'),
(2, 'Center Of Excellent', 'ICT'),
(3, 'HCGA', 'HC'),
(4, 'HCGA', 'GA'),
(5, 'Center Of Excellent', 'CCR');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_laporan`
--

CREATE TABLE `jenis_laporan` (
  `idjenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_laporan`
--

INSERT INTO `jenis_laporan` (`idjenis`, `nama_jenis`) VALUES
(1, 'RKB'),
(2, 'RAB'),
(3, 'TCAR'),
(4, 'RKP'),
(5, 'PVP'),
(6, 'Usulan Peserta');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `idlaporan` int(11) NOT NULL,
  `idakun` int(11) NOT NULL,
  `idjenis` int(11) NOT NULL,
  `kode_surat` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(40) NOT NULL,
  `rincian` varchar(100) NOT NULL,
  `agenda` varchar(50) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `NRP` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`idlaporan`, `idakun`, `idjenis`, `kode_surat`, `nama_barang`, `jumlah`, `rincian`, `agenda`, `tanggal_agenda`, `NRP`) VALUES
(3, 2, 1, '50/HCGA/PPA-GRYA/RKB/XI/2023', 'Minuman', 2, 'dus/hari', 'P5M', '2023-11-29', 12345678),
(4, 29, 1, '12745732487', 'nasi kuning', 2, 'kotak/hari', 'P5M', '2023-12-17', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `idlevel` int(11) NOT NULL,
  `level_k` enum('admin','group leader','section head','master') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`idlevel`, `level_k`) VALUES
(1, 'admin'),
(2, 'section head'),
(9, 'group leader'),
(10, 'master');

-- --------------------------------------------------------

--
-- Table structure for table `list_item`
--

CREATE TABLE `list_item` (
  `id` int(11) NOT NULL,
  `id_permohonan` varchar(40) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `satuan` varchar(40) NOT NULL,
  `agenda` varchar(150) NOT NULL,
  `agenda_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_item`
--

INSERT INTO `list_item` (`id`, `id_permohonan`, `nama_barang`, `kuantitas`, `satuan`, `agenda`, `agenda_date`) VALUES
(1, '1', 'Nasi Kuning Telur', 100, 'Kotak/Hari', 'Monthly Meeting HCGA', '2023-12-17'),
(7, '4', 'Air Mineral ', 20, 'Dus ', 'Stok Main Office', '0000-00-00'),
(8, '4', 'Gula Pasir', 20, 'Kg', 'Stok Main Office', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `list_status`
--

CREATE TABLE `list_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_status`
--

INSERT INTO `list_status` (`id_status`, `status`) VALUES
(1, 'Menunggu'),
(2, 'Disetujui'),
(3, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id` int(30) NOT NULL,
  `no_surat` varchar(40) NOT NULL,
  `nrp` varchar(15) NOT NULL,
  `created_date` date NOT NULL,
  `catatan` varchar(150) NOT NULL,
  `status` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id`, `no_surat`, `nrp`, `created_date`, `catatan`, `status`) VALUES
(1, '50/HCGA/PPA-GRYA/RKB/XI/2023', '91011121', '2023-12-17', 'Diantar ke Main Office', '1'),
(4, '2/HCGA/PPA-GRYA/RKB/XII/2023', '12345678', '2023-12-17', 'Barang diantar ke Main Office', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`),
  ADD KEY `idlevel` (`idlevel`),
  ADD KEY `iddepartemen` (`iddepartemen`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`iddepartemen`);

--
-- Indexes for table `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idlaporan`),
  ADD KEY `idakun` (`idakun`),
  ADD KEY `idjenis` (`idjenis`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`idlevel`);

--
-- Indexes for table `list_item`
--
ALTER TABLE `list_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_status`
--
ALTER TABLE `list_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `idakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `iddepartemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  MODIFY `idjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `idlaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `idlevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `list_item`
--
ALTER TABLE `list_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `list_status`
--
ALTER TABLE `list_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`idlevel`) REFERENCES `level` (`idlevel`),
  ADD CONSTRAINT `akun_ibfk_2` FOREIGN KEY (`iddepartemen`) REFERENCES `departemen` (`iddepartemen`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`idakun`) REFERENCES `akun` (`idakun`),
  ADD CONSTRAINT `laporan_ibfk_3` FOREIGN KEY (`idjenis`) REFERENCES `jenis_laporan` (`idjenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

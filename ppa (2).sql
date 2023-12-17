-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2023 pada 04.57
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

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
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `idakun` int(11) NOT NULL,
  `idlevel` int(11) NOT NULL,
  `iddepartemen` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `NRP` varchar(8) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`idakun`, `idlevel`, `iddepartemen`, `nama`, `NRP`, `password`) VALUES
(1, 9, 1, 'annisa', '91011121', '$2y$10$OUrDD1UEGgLJm/VFD1fBleJAhV8z/3aslEB30T9.GBSOR3al3tffC'),
(2, 1, 1, 'regina', '12345678', '$2y$10$TlUy6unE8jMFH53mFYtCqO4qzBU1r6v/vSVO4.Q3oAjeUkELeak3q');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `iddepartemen` int(11) NOT NULL,
  `namadepartemen` varchar(50) NOT NULL,
  `devisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`iddepartemen`, `namadepartemen`, `devisi`) VALUES
(1, 'Center Of Excellent', 'SS6'),
(2, 'Center Of Excellent', 'ICT'),
(3, 'HCGA', 'HC'),
(4, 'HCGA', 'GA'),
(5, 'Center Of Excellent', 'CCR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_laporan`
--

CREATE TABLE `jenis_laporan` (
  `idjenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_laporan`
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
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `idlaporan` int(11) NOT NULL,
  `idakun` int(11) NOT NULL,
  `idjenis` int(11) NOT NULL,
  `kode_surat` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `rincian` varchar(50) NOT NULL,
  `agenda` varchar(100) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `NRP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`idlaporan`, `idakun`, `idjenis`, `kode_surat`, `nama_barang`, `jumlah`, `rincian`, `agenda`, `tanggal_agenda`, `NRP`) VALUES
(32, 2, 3, '78654', 'nasi kotak', 2, 'kotak/hari', 'P5M', '2023-11-30', '1234678'),
(33, 1, 1, '434565', 'minuman', 45, 'gelas/hari', 'P5M', '2023-11-29', '13579246'),
(34, 2, 1, '1234', 'MINUMAN', 2, 'kotak/hari', 'acara keluarga', '2023-11-30', '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `idlevel` int(11) NOT NULL,
  `level_k` enum('admin','group leader','section head','master') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`idlevel`, `level_k`) VALUES
(1, 'admin'),
(2, 'section head'),
(9, 'group leader'),
(10, 'master');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`),
  ADD KEY `idlevel` (`idlevel`),
  ADD KEY `iddepartemen` (`iddepartemen`);

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`iddepartemen`);

--
-- Indeks untuk tabel `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idlaporan`),
  ADD KEY `idakun_2` (`idakun`),
  ADD KEY `idakun_3` (`idakun`),
  ADD KEY `idjenis_2` (`idjenis`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`idlevel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `idakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `iddepartemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  MODIFY `idjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `idlaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `idlevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`idlevel`) REFERENCES `level` (`idlevel`),
  ADD CONSTRAINT `akun_ibfk_2` FOREIGN KEY (`iddepartemen`) REFERENCES `departemen` (`iddepartemen`);

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`idakun`) REFERENCES `akun` (`idakun`),
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`idjenis`) REFERENCES `jenis_laporan` (`idjenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

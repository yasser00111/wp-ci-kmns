-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2021 pada 11.33
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kmeans`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tpa`
--

CREATE TABLE `tb_tpa` (
  `ID` int(11) NOT NULL,
  `nama_tpa` varchar(120) NOT NULL,
  `biaya_daftar` float NOT NULL,
  `spp` float NOT NULL,
  `biaya_perjam` float NOT NULL,
  `formulir` float NOT NULL,
  `set_sementara` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tpa`
--

INSERT INTO `tb_tpa` (`ID`, `nama_tpa`, `biaya_daftar`, `spp`, `biaya_perjam`, `formulir`, `set_sementara`) VALUES
(1, 'TPA AMANAT', 3000000, 300000, 5000, 100000, 'C1'),
(2, 'Khalifa 5', 3950000, 350000, 30000, 200000, 'C3'),
(3, 'Resky syafaat', 2500000, 300000, 10000, 100000, 'C2'),
(4, 'cahaya ateka', 4000000, 300000, 15000, 100000, 'C3'),
(5, 'Al-abrar', 4500000, 400000, 20000, 200000, 'C3'),
(6, 'TPA melati aisyah', 3000000, 350000, 7000, 100000, 'C1'),
(7, 'Athira', 5000000, 500000, 25000, 200000, 'C4'),
(8, 'TPA buah hati', 4500000, 400000, 20000, 200000, 'C3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_tpa`
--
ALTER TABLE `tb_tpa`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_tpa`
--
ALTER TABLE `tb_tpa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

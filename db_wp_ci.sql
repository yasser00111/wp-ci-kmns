-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2021 pada 18.22
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
-- Database: `db_wp_ci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dashboard`
--

CREATE TABLE `dashboard` (
  `das` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dashboard`
--

INSERT INTO `dashboard` (`das`) VALUES
('logobesar.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(35) NOT NULL,
  `nama_alternatif` varchar(55) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode_alternatif`, `nama_alternatif`, `keterangan`) VALUES
('123', 'Taman Penitipan Anak Amanat Aisyiyah', NULL),
('A02', 'TPA Athira', 'terdapat polygroup'),
('A06', 'Taman Penitipan Anak Amanat ', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(35) NOT NULL,
  `nama_kriteria` varchar(55) DEFAULT NULL,
  `atribut` varchar(55) DEFAULT NULL,
  `bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `atribut`, `bobot`) VALUES
('B-PD', 'Biaya pendaftaran', 'Cost', 2),
('B-SP', 'biaya spp', 'Cost', 3),
('F-TPA', 'fasilitas tempat penitipan anak', 'Benefit', 4),
('K-TPA', 'Kondisi tempat anak', 'Benefit', 5),
('R-PS', 'rasio pengasuh', 'Cost', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rel_alternatif`
--

CREATE TABLE `tb_rel_alternatif` (
  `id` int(11) NOT NULL,
  `kode_alternatif` varchar(35) DEFAULT NULL,
  `kode_kriteria` varchar(35) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rel_alternatif`
--

INSERT INTO `tb_rel_alternatif` (`id`, `kode_alternatif`, `kode_kriteria`, `nilai`) VALUES
(81, '123', 'B-PD', 0),
(82, 'A02', 'B-PD', 0),
(83, '123', 'B-SP', 0),
(84, 'A02', 'B-SP', 0),
(86, '123', 'F-TPA', 0),
(87, 'A02', 'F-TPA', 0),
(89, '123', 'K-TPA', 0),
(90, 'A02', 'K-TPA', 0),
(92, '123', 'R-PS', 0),
(93, 'A02', 'R-PS', 0),
(94, 'A06', 'B-PD', 0),
(95, 'A06', 'B-SP', 0),
(96, 'A06', 'F-TPA', 0),
(97, 'A06', 'K-TPA', 0),
(98, 'A06', 'R-PS', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tpa`
--

CREATE TABLE `tb_tpa` (
  `id_tpa` varchar(45) NOT NULL,
  `nama_tpa` varchar(45) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `biaya_daftar` int(5) NOT NULL,
  `spp` int(4) NOT NULL,
  `fasilitas` text NOT NULL,
  `kondisi` text NOT NULL,
  `rasio` int(6) NOT NULL,
  `gambar` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tpa`
--

INSERT INTO `tb_tpa` (`id_tpa`, `nama_tpa`, `alamat`, `keterangan`, `biaya_daftar`, `spp`, `fasilitas`, `kondisi`, `rasio`, `gambar`) VALUES
('011', 'tpa sasmlas', 'ksnksabadga', 'dsanjdsus', 2500000, 200, '2882', 'aduaa', 123, '1.jpg'),
('A06', 'Taman Penitipan Anak Amanat ', 'asd', 'asd', 123, 123, 'asd', 'asd', 0, 'laptop.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indeks untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indeks untuk tabel `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tpa`
--
ALTER TABLE `tb_tpa`
  ADD PRIMARY KEY (`id_tpa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

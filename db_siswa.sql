-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Nov 2020 pada 02.55
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
-- Database: `db_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `classes`
--

CREATE TABLE `classes` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `classes`
--

INSERT INTO `classes` (`id`, `name`) VALUES
(1, '12-RPL'),
(2, '12-TKJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(12) NOT NULL,
  `nis` varchar(16) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(64) NOT NULL,
  `class_id` varchar(16) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `birth_date`, `gender`, `class_id`, `phone`, `address`) VALUES
(28, '11806713', 'Aldi', '1970-01-01', 'laki - laki', '12 RPL', '081287289212', 'Bogor Kota'),
(30, '123456', 'Hafid', '1970-01-01', 'laki - laki', 'Test', '081287289204', 'Alone');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

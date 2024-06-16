-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2024 pada 08.56
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `time` time NOT NULL,
  `tanggal` date NOT NULL DEFAULT curdate(),
  `id_user` int(11) DEFAULT NULL,
  `keterlambatan` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `username`, `type`, `time`, `tanggal`, `id_user`, `keterlambatan`) VALUES
(235, 'rohim', 'masuk', '08:59:52', '2024-04-01', NULL, NULL),
(236, 'rohim', 'pulang', '16:32:21', '2024-04-01', NULL, NULL),
(237, 'rohim', 'masuk', '09:16:03', '2024-04-02', NULL, NULL),
(238, 'rohim', 'pulang', '16:05:07', '2024-04-02', NULL, NULL),
(239, 'rohim', 'masuk', '07:23:11', '2024-04-03', NULL, NULL),
(240, 'rohim', 'pulang', '16:04:19', '2024-04-03', NULL, NULL),
(241, 'rohim', 'masuk', '07:34:02', '2024-04-08', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_karyawan`
--

CREATE TABLE `foto_karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto_karyawan`
--

INSERT INTO `foto_karyawan` (`id`, `nama`, `foto`) VALUES
(13, 'Foto Karyawan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user1` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user1`, `nama`, `username`, `password`, `level`, `latitude`, `longitude`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 0.00000000, NULL),
(2, 'fara annisa', 'pegawai', 'pegawai', 'pegawai', 0.00000000, NULL),
(3, 'Jamaludin', 'jamaludin', 'jamaludin123', 'pengurus', 0.00000000, NULL),
(4, 'rohim', 'rohim', 'rohim', 'pegawai', 0.00000000, NULL),
(5, 'VikaLOVE', 'vika', 'vika', 'pegawai', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indeks untuk tabel `foto_karyawan`
--
ALTER TABLE `foto_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user1`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT untuk tabel `foto_karyawan`
--
ALTER TABLE `foto_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user1`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Okt 2022 pada 15.05
-- Versi server: 5.7.24
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_ahp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nilai_prioritas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_perbandingan`
--

CREATE TABLE `nilai_perbandingan` (
  `prodi_kode_prodi` varchar(10) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `tahun_id` varchar(5) NOT NULL,
  `nilai` float(4,2) DEFAULT NULL,
  `kriteria_id1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `prodicol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi_has_kriteria`
--

CREATE TABLE `prodi_has_kriteria` (
  `kode_prodi` varchar(10) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` varchar(5) NOT NULL,
  `tahun_akademik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'administration@gmail.com', '$2y$10$CUGOPparpM4I9b8GJaSdMuU3mLvO2UpNAUkzMLiAELbgXbBHjm1G2', 'NHWtdKOCyNfL5NnrgpnP29P7cIIFNlugnBqKScZYeL3vlZdGsdap91FoHOmt', '2022-10-29 15:02:46', '2022-10-29 15:02:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_perbandingan`
--
ALTER TABLE `nilai_perbandingan`
  ADD PRIMARY KEY (`prodi_kode_prodi`,`kriteria_id`,`tahun_id`,`kriteria_id1`),
  ADD KEY `fk_prodi_has_kriteria1_kriteria1_idx` (`kriteria_id`),
  ADD KEY `fk_prodi_has_kriteria1_prodi1_idx` (`prodi_kode_prodi`),
  ADD KEY `fk_nilai_perbandingan_tahun1_idx` (`tahun_id`),
  ADD KEY `fk_nilai_perbandingan_kriteria1_idx` (`kriteria_id1`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indeks untuk tabel `prodi_has_kriteria`
--
ALTER TABLE `prodi_has_kriteria`
  ADD PRIMARY KEY (`kode_prodi`,`kriteria_id`),
  ADD KEY `fk_prodi_has_kriteria_kriteria1_idx` (`kriteria_id`),
  ADD KEY `fk_prodi_has_kriteria_prodi1_idx` (`kode_prodi`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`),
  ADD UNIQUE KEY `tahun_akademik_UNIQUE` (`tahun_akademik`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai_perbandingan`
--
ALTER TABLE `nilai_perbandingan`
  ADD CONSTRAINT `fk_nilai_perbandingan_kriteria1` FOREIGN KEY (`kriteria_id1`) REFERENCES `kriteria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nilai_perbandingan_tahun1` FOREIGN KEY (`tahun_id`) REFERENCES `tahun` (`id_tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prodi_has_kriteria1_kriteria1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prodi_has_kriteria1_prodi1` FOREIGN KEY (`prodi_kode_prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `prodi_has_kriteria`
--
ALTER TABLE `prodi_has_kriteria`
  ADD CONSTRAINT `fk_prodi_has_kriteria_kriteria1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prodi_has_kriteria_prodi1` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

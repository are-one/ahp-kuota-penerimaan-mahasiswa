-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 06:55 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama_kriteria`) VALUES
(1, 'Kapasitas Ruangan'),
(2, 'Jumlah Ruangan'),
(3, 'Dosen Aktif'),
(4, 'Mahasiswa Tingkat Akhir'),
(5, 'Mahasiswa Aktif'),
(6, 'Mahasiswa Pasif sekali');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_perbandingan`
--

CREATE TABLE `nilai_perbandingan` (
  `kode_prodi` varchar(10) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `tahun_id` varchar(5) NOT NULL,
  `nilai` float(4,2) DEFAULT NULL,
  `kriteria_id1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nilai_perbandingan`
--

INSERT INTO `nilai_perbandingan` (`kode_prodi`, `kriteria_id`, `tahun_id`, `nilai`, `kriteria_id1`) VALUES
('F1A1', 1, '2018', 2.00, 2),
('F1A1', 1, '2018', 2.00, 3),
('F1A1', 1, '2018', 4.00, 4),
('F1A1', 1, '2018', 4.00, 5),
('F1A1', 1, '2018', 3.00, 6),
('F1A1', 2, '2018', 3.00, 3),
('F1A1', 2, '2018', 3.00, 4),
('F1A1', 2, '2018', 3.00, 5),
('F1A1', 2, '2018', 3.00, 6),
('F1A1', 3, '2018', 3.00, 4),
('F1A1', 3, '2018', 3.00, 5),
('F1A1', 3, '2018', 3.00, 6),
('F1A1', 4, '2018', 3.00, 5),
('F1A1', 4, '2018', 3.00, 6),
('F1A1', 5, '2018', 3.00, 6);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kode_prodi`, `nama_prodi`) VALUES
('F1A1', 'STATISTIKA'),
('F1A2', 'MATEMATIKA'),
('F1A3', 'ILMU KOMPUTER');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_has_kriteria`
--

CREATE TABLE `prodi_has_kriteria` (
  `kode_prodi` varchar(10) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tahun_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prodi_has_kriteria`
--

INSERT INTO `prodi_has_kriteria` (`kode_prodi`, `kriteria_id`, `nilai`, `tahun_id`) VALUES
('F1A1', 1, 1, '2018'),
('F1A1', 2, 0, '2018'),
('F1A1', 3, 0, '2018'),
('F1A1', 4, 0, '2018'),
('F1A1', 5, 0, '2018'),
('F1A1', 6, 0, '2018');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` varchar(5) NOT NULL,
  `tahun_akademik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `tahun_akademik`) VALUES
('2018', '20182'),
('2022', '20221');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'administration@gmail.com', '$2y$10$CUGOPparpM4I9b8GJaSdMuU3mLvO2UpNAUkzMLiAELbgXbBHjm1G2', 'evg6w4Ttj4ZmPGmWoB7QsvROOdU4zfCCZXsYlEWiz8UpFeFt32EhyFX3V9jK', '2022-10-29 23:02:46', '2022-10-29 23:02:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_perbandingan`
--
ALTER TABLE `nilai_perbandingan`
  ADD PRIMARY KEY (`kriteria_id`,`tahun_id`,`kriteria_id1`,`kode_prodi`),
  ADD KEY `fk_prodi_has_kriteria1_kriteria1_idx` (`kriteria_id`),
  ADD KEY `fk_prodi_has_kriteria1_prodi1_idx` (`kode_prodi`),
  ADD KEY `fk_nilai_perbandingan_tahun1_idx` (`tahun_id`),
  ADD KEY `fk_nilai_perbandingan_kriteria1_idx` (`kriteria_id1`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indexes for table `prodi_has_kriteria`
--
ALTER TABLE `prodi_has_kriteria`
  ADD PRIMARY KEY (`kode_prodi`,`kriteria_id`,`tahun_id`),
  ADD KEY `fk_prodi_has_kriteria_kriteria1_idx` (`kriteria_id`),
  ADD KEY `fk_prodi_has_kriteria_prodi1_idx` (`kode_prodi`),
  ADD KEY `fk_prodi_has_kriteria_tahun1_idx` (`tahun_id`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`),
  ADD UNIQUE KEY `tahun_akademik_UNIQUE` (`tahun_akademik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_perbandingan`
--
ALTER TABLE `nilai_perbandingan`
  ADD CONSTRAINT `fk_nilai_perbandingan_kriteria1` FOREIGN KEY (`kriteria_id1`) REFERENCES `kriteria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nilai_perbandingan_tahun1` FOREIGN KEY (`tahun_id`) REFERENCES `tahun` (`id_tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prodi_has_kriteria1_kriteria1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prodi_has_kriteria1_prodi1` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prodi_has_kriteria`
--
ALTER TABLE `prodi_has_kriteria`
  ADD CONSTRAINT `fk_prodi_has_kriteria_kriteria1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prodi_has_kriteria_prodi1` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prodi_has_kriteria_tahun1` FOREIGN KEY (`tahun_id`) REFERENCES `tahun` (`id_tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

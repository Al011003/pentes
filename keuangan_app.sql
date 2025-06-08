-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2025 pada 17.23
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
-- Database: `keuangan_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `jabatan`, `gaji`) VALUES
(3, 'Citra Dewi', 'Staf Administrasi', 5000000),
(4, 'Dewi Lestari', 'Staf IT', 7000000),
(5, 'Eko Prasetyo', 'HRD', 8500000),
(6, 'Fajar Nugroho', 'Marketing', 6000000),
(7, 'Galih Rahman', 'Finance', 7500000),
(8, 'Hana Putri', 'Customer Service', 4500000),
(9, 'Indra Wijaya', 'Staf Produksi', 5200000),
(10, 'Joko Susilo', 'Teknisi', 6800000),
(11, 'Kiki Ramadhani', 'Staf Administrasi', 4800000),
(12, 'Lia Kartika', 'Marketing', 6200000),
(13, 'Mira Sari', 'HRD', 8300000),
(14, 'Nanda Putra', 'Teknisi', 6700000),
(15, 'Oki Pratama', 'Finance', 7400000),
(16, 'Putu Widiantara', 'Staf IT', 7100000),
(17, 'Qori Nur', 'Supervisor', 8800000),
(18, 'Rani Maharani', 'Customer Service', 4600000),
(19, 'Sari Dewi', 'Manajer', 12500000),
(20, 'Tono Susanto', 'Staf Produksi', 5400000),
(22, 'InjectedXSS', 'Penusuk', 99999),
(23, 'InjectedXSS', 'Penusuk', 99999);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `deskripsi`, `jumlah`, `tanggal`) VALUES
(1, 'Pembelian software akuntansi', 15000000, '2024-10-10'),
(2, 'Gaji karyawan Oktober', 12000000, '2024-10-31'),
(3, 'Pendapatan jasa konsultasi', 22000000, '2024-11-05'),
(4, NULL, 3106620, '2025-04-20'),
(5, NULL, 3089244, '2025-05-15'),
(6, NULL, 436067, '2025-02-27'),
(7, NULL, 4082075, '2025-01-31'),
(8, NULL, 4134813, '2025-03-10'),
(9, NULL, 1722780, '2025-04-25'),
(10, NULL, 4419508, '2025-02-26'),
(11, NULL, 3865628, '2025-02-12'),
(12, NULL, 3371359, '2025-05-31'),
(13, NULL, 3865178, '2025-02-23'),
(14, NULL, 2996143, '2025-04-28'),
(15, NULL, 1640111, '2025-04-04'),
(16, NULL, 3296829, '2025-04-19'),
(17, NULL, 2878753, '2025-01-16'),
(18, NULL, 4524842, '2025-03-20'),
(19, NULL, 363212, '2025-05-24'),
(20, NULL, 4477473, '2025-03-04'),
(21, NULL, 2503065, '2025-02-05'),
(22, NULL, 1460991, '2025-04-24'),
(23, NULL, 4331243, '2025-01-22'),
(24, NULL, 4544694, '2025-05-16'),
(25, NULL, 2367987, '2025-05-07'),
(26, NULL, 3189508, '2025-05-02'),
(27, NULL, 4088770, '2025-04-22'),
(28, NULL, 3981065, '2025-05-08'),
(29, NULL, 3641294, '2025-03-05'),
(30, NULL, 3055009, '2025-02-23'),
(31, NULL, 4773528, '2025-05-24'),
(32, NULL, 3501952, '2025-05-18'),
(33, NULL, 3075329, '2025-04-22'),
(34, NULL, 1513687, '2025-05-05'),
(35, NULL, 182089, '2025-05-28'),
(36, NULL, 3636523, '2025-01-24'),
(37, NULL, 2855122, '2025-01-22'),
(38, NULL, 1018616, '2025-02-26'),
(39, NULL, 2557605, '2025-05-03'),
(40, NULL, 4226953, '2025-01-11'),
(41, NULL, 2493658, '2025-01-01'),
(42, NULL, 3536935, '2025-03-07'),
(43, NULL, 4658845, '2025-02-01'),
(44, NULL, 1885635, '2025-01-05'),
(45, NULL, 2797468, '2025-04-21'),
(46, NULL, 981184, '2025-03-27'),
(47, NULL, 2365283, '2025-01-31'),
(48, NULL, 909726, '2025-04-18'),
(49, NULL, 4897250, '2025-04-15'),
(50, NULL, 660209, '2025-05-03'),
(51, NULL, 1868736, '2025-01-22'),
(52, NULL, 4164107, '2025-02-27'),
(53, NULL, 2599394, '2025-05-31'),
(54, NULL, 1211527, '2025-03-25'),
(55, NULL, 3624475, '2025-03-14'),
(56, NULL, 3161271, '2025-01-24'),
(57, NULL, 2043885, '2025-04-09'),
(58, NULL, 4582370, '2025-01-04'),
(59, NULL, 4070066, '2025-03-19'),
(60, NULL, 889920, '2025-03-20'),
(61, NULL, 3877901, '2025-02-07'),
(62, NULL, 1070823, '2025-01-16'),
(63, NULL, 4144533, '2025-04-14'),
(64, NULL, 4508709, '2025-01-12'),
(65, NULL, 3364675, '2025-02-11'),
(66, NULL, 2850444, '2025-03-19'),
(67, NULL, 3376372, '2025-02-10'),
(68, NULL, 3297070, '2025-03-22'),
(69, NULL, 1956980, '2025-04-11'),
(70, NULL, 1709000, '2025-05-15'),
(71, NULL, 4158179, '2025-05-26'),
(72, NULL, 3924387, '2025-02-08'),
(73, NULL, 1939750, '2025-01-22'),
(74, NULL, 635775, '2025-03-09'),
(75, NULL, 3521974, '2025-01-31'),
(76, NULL, 1495526, '2025-05-13'),
(77, NULL, 717231, '2025-05-01'),
(78, NULL, 4167656, '2025-02-06'),
(79, NULL, 3230378, '2025-03-06'),
(80, NULL, 3368272, '2025-05-19'),
(81, NULL, 4623771, '2025-03-30'),
(82, NULL, 2737198, '2025-05-11'),
(83, NULL, 4592828, '2025-01-17'),
(84, NULL, 2928939, '2025-02-10'),
(85, NULL, 3614386, '2025-01-14'),
(86, NULL, 2212883, '2025-02-17'),
(87, NULL, 3715312, '2025-02-01'),
(88, NULL, 774978, '2025-01-11'),
(89, NULL, 4886791, '2025-03-14'),
(90, NULL, 1674213, '2025-03-10'),
(91, NULL, 1628927, '2025-02-08'),
(92, NULL, 281710, '2025-04-30'),
(93, NULL, 4492147, '2025-05-02'),
(94, NULL, 3515387, '2025-01-12'),
(95, NULL, 963039, '2025-02-08'),
(96, NULL, 459267, '2025-01-19'),
(97, NULL, 4058728, '2025-01-01'),
(98, NULL, 3482418, '2025-01-04'),
(99, NULL, 4237397, '2025-02-27'),
(100, NULL, 4168781, '2025-01-11'),
(101, NULL, 970258, '2025-05-21'),
(102, NULL, 4515877, '2025-01-14'),
(103, NULL, 2669342, '2025-02-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(2, 'user1', 'user123', 'user'),
(3, 'admin_al', 'admin123', 'admin'),
(4, 'admin_erin', 'admin123', 'admin'),
(5, 'admin_anju', 'admin123', 'admin'),
(6, 'admin_fahri', 'admin123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2025 pada 20.03
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
-- Database: `upt_sdn_035_tb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id` int(11) NOT NULL,
  `nama_pelanggaran` varchar(100) DEFAULT NULL,
  `poin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`id`, `nama_pelanggaran`, `poin`) VALUES
(1, 'Terlambat', 5),
(2, 'Merokok', 50),
(3, 'Tidak memakai seragam', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran_siswa`
--

CREATE TABLE `pelanggaran_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `pelanggaran_id` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggaran_siswa`
--

INSERT INTO `pelanggaran_siswa` (`id`, `siswa_id`, `pelanggaran_id`, `tanggal`) VALUES
(49, 1, 2, '2016-09-08 20:46:43'),
(50, 4, 2, '2025-09-02 00:49:00'),
(51, 1, 2, '2018-09-14 00:58:08'),
(52, 2, 1, '2025-09-02 00:09:25'),
(53, 3, 1, '2025-09-02 21:05:40'),
(54, 4, 1, '2025-09-02 21:06:19'),
(55, 3, 2, '2025-09-02 21:41:02'),
(56, 4, 3, '2034-09-14 21:56:09'),
(57, 4, 3, '2025-09-02 21:56:29'),
(58, 6, 1, '2025-09-02 22:34:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`) VALUES
(1, 'create_post'),
(3, 'delete_post'),
(2, 'edit_post');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'guru'),
(3, 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `nomor_hp` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `kelas`, `email`, `password`, `nama_ortu`, `nomor_hp`, `alamat`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '', 'Budi', '10A', '', '', '', '', '', 0, '2025-09-02 11:44:38', '2025-09-02 11:46:02'),
(2, '', 'Siti', '10A', '', '', '', '', '', 0, '2025-09-02 11:44:38', '2025-09-02 11:46:02'),
(3, '', 'Andi', '10B', '', '', '', '', '', 0, '2025-09-02 11:44:38', '2025-09-02 11:46:02'),
(4, '', 'Andika Mahesa Gilang Pradana', '1A', '', '', '', '', '', 0, '2025-09-02 12:33:07', '2025-09-02 12:33:07'),
(6, '', 'ginting', '2A', '', '', '', '', '', 0, '2025-09-02 15:34:34', '2025-09-02 15:34:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `pelanggaran_id` (`pelanggaran_id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_name` (`permission_name`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indeks untuk tabel `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  ADD CONSTRAINT `pelanggaran_siswa_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pelanggaran_siswa_ibfk_2` FOREIGN KEY (`pelanggaran_id`) REFERENCES `pelanggaran` (`id`);

--
-- Ketidakleluasaan untuk tabel `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2025 at 07:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `kode_jabatan` varchar(16) DEFAULT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `status_kelas` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `kode_jabatan`, `nama_jabatan`, `status_kelas`, `created_at`, `updated_at`) VALUES
(23, 'KJ-001', 'Kepala Sekolah', '-', '2025-09-14 14:16:21', '2025-09-14 14:16:21'),
(24, 'KJ-002', 'Wakil Kepala Sekolah', '-', '2025-09-14 14:16:31', '2025-09-14 14:16:31'),
(25, 'KJ-003', 'Guru Kelas', '1A', '2025-09-14 14:25:34', '2025-09-14 14:25:34'),
(26, 'KJ-004', 'Guru Kelas', '1B', '2025-09-14 14:18:28', '2025-09-14 14:18:28'),
(27, 'KJ-005', 'Guru Kelas', '1C', '2025-09-14 14:18:40', '2025-09-14 14:18:40'),
(28, 'KJ-006', 'Guru Kelas', '2A', '2025-09-14 14:22:57', '2025-09-14 14:22:57'),
(29, 'KJ-007', 'Guru Kelas', '2B', '2025-09-14 14:23:10', '2025-09-14 14:23:10'),
(30, 'KJ-008', 'Guru Kelas', '2C', '2025-09-14 14:23:21', '2025-09-14 14:23:21'),
(31, 'KJ-009', 'Guru Kelas', '3A', '2025-09-14 14:23:34', '2025-09-14 14:23:34'),
(32, 'KJ-010', 'Guru Kelas', '3B', '2025-09-14 14:24:04', '2025-09-14 14:24:04'),
(33, 'KJ-011', 'Guru Kelas', '3C', '2025-09-14 14:24:16', '2025-09-14 14:24:16'),
(34, 'KJ-012', 'Guru Kelas', '4A', '2025-09-14 14:24:24', '2025-09-14 14:24:24'),
(35, 'KJ-013', 'Guru Kelas', '4B', '2025-09-14 14:24:43', '2025-09-14 14:24:43'),
(36, 'KJ-014', 'Guru Kelas', '4C', '2025-09-14 14:24:52', '2025-09-14 14:24:52'),
(37, 'KJ-015', 'Guru Kelas', '5A', '2025-09-14 14:25:02', '2025-09-14 14:25:02'),
(38, 'KJ-016', 'Guru Kelas', '5B', '2025-09-14 14:25:11', '2025-09-14 14:25:11'),
(39, 'KJ-017', 'Guru Kelas', '5C', '2025-09-14 14:26:16', '2025-09-14 14:26:16'),
(40, 'KJ-018', 'Guru Kelas', '6A', '2025-09-14 14:26:25', '2025-09-14 14:26:25'),
(41, 'KJ-019', 'Guru Kelas', '6B', '2025-09-14 14:26:37', '2025-09-14 14:26:37'),
(42, 'KJ-020', 'Operator Sekolah', '-', '2025-09-14 14:26:44', '2025-09-14 14:26:44'),
(43, 'KJ-021', 'Pengelola Pustaka', '-', '2025-09-14 14:26:50', '2025-09-14 14:26:50'),
(44, 'KJ-022', 'Tata Usaha', '-', '2025-09-14 14:26:56', '2025-09-14 14:26:56'),
(45, 'KJ-023', 'Tenaga Kebersihan', '-', '2025-09-14 14:27:03', '2025-09-14 14:27:03'),
(46, 'KJ-024', 'Guru PJOK', '-', '2025-09-14 14:27:25', '2025-09-14 14:27:25'),
(47, 'KJ-025', 'Guru BMR', '-', '2025-09-14 14:27:31', '2025-09-14 14:27:31'),
(48, 'KJ-026', 'Guru PAI', '-', '2025-09-14 14:27:36', '2025-09-14 14:27:36'),
(49, 'KJ-027', 'Guru BDR', '-', '2025-09-14 14:27:50', '2025-09-14 14:27:50'),
(50, 'KJ-028', 'Ketua Kelas', '-', '2025-09-14 14:31:27', '2025-09-14 14:31:27'),
(51, 'KJ-029', 'Anggota Kelas', '-', '2025-09-14 14:31:32', '2025-09-14 14:31:32'),
(52, 'KJ-030', 'Siswa', '-', '2025-09-14 14:31:42', '2025-09-14 14:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_piket`
--

CREATE TABLE `jadwal_piket` (
  `id` int(11) NOT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `hari_piket` varchar(15) DEFAULT NULL,
  `tanggal_piket` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_piket`
--

INSERT INTO `jadwal_piket` (`id`, `guru_id`, `hari_piket`, `tanggal_piket`) VALUES
(1, NULL, 'senin', '2025-09-01'),
(2, NULL, 'selasa', NULL),
(3, NULL, 'rabu', NULL),
(4, NULL, 'kamis', NULL),
(5, NULL, 'jumat', NULL),
(6, NULL, 'sabtu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id` int(11) NOT NULL,
  `nama_pelanggaran` varchar(100) DEFAULT NULL,
  `poin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`id`, `nama_pelanggaran`, `poin`) VALUES
(115, 'Terlambat datang ke sekeolah lebih dari 5 menit sebanyak 3 kali berturut-turut', 1),
(116, 'Berkelahi', 5),
(117, 'Tidak Membawa Topi', 1),
(118, 'Membawa Komik Yang Berisi Hal-Hal Negatif', 1),
(119, 'Membawa Mainan', 1),
(120, 'Membawa benda tajam', 5),
(121, 'Berada di luar kelas tanpa keperluan dan ini, saat KBM', 1),
(122, 'Bermain ketika shalat Dhuha berjama\'ah', 3),
(123, 'Meninggalkan sekolah tanpa izin pada jam sekolah', 5),
(124, 'Mencoret atau Mengotori dengan sengaja sarana prasarana sekolah', 5),
(125, 'Membuang sampah sembarangan', 2),
(126, 'Tidak membawa Buku pelajaran', 1),
(127, 'Berkata kotor dan kasar', 5),
(128, 'Tidak melaksanakan piket di kelas 3,4,5 dan 6', 2),
(129, 'Menulis gambar dan kata yang tidak senonoh', 5),
(130, 'Membawa dan Merokok', 5),
(131, 'Mencuri, Merampas barang orang lain', 5),
(132, 'Bercampur baur dan bersenda gurau dengan lawan jenis', 5),
(133, 'Makan pada jam pelajaran tanpa izin', 1),
(134, 'Bersikap Tidak Sopan Santun', 3),
(135, 'Membully*', 5),
(136, 'Bernanyi ', 3),
(137, 'Mewarnai Rambut bagi laki-laki', 5),
(138, 'Rambut Panjang bagi Laki-Laki', 5),
(139, 'Tidak memakai Seragam sesuai Jadwal', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_siswa`
--

CREATE TABLE `pelanggaran_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `pelanggaran_id` int(11) DEFAULT NULL,
  `guru_piket` varchar(50) NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggaran_siswa`
--

INSERT INTO `pelanggaran_siswa` (`id`, `siswa_id`, `pelanggaran_id`, `guru_piket`, `tanggal`) VALUES
(118, 48, 121, 'Nurdian Aprilianto', '2025-09-14 23:15:11'),
(119, 16, 135, 'Nurdian Aprilianto', '2025-09-14 23:17:47'),
(120, 386, 116, '@kepsek88', '2025-09-14 23:36:26'),
(121, 5, 120, '@kepsek88', '2025-09-15 00:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`) VALUES
(1, 'create_post'),
(3, 'delete_post'),
(2, 'edit_post');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'guru'),
(3, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `nomor_hp` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jadwal_piket_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `username`, `nisn`, `nip`, `nama`, `kelas`, `email`, `password`, `jabatan_id`, `nama_ortu`, `nomor_hp`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `role_id`, `jadwal_piket_id`, `created_at`, `updated_at`) VALUES
(2, '1471131601190001', '@afnan1601', '', '', 'AFNAN AZIZ', '1A', '', '$2y$10$99miN.84exlHp9BHjrOaOOmj8gB1zwCyYweqaMaA.K0lhiZ9mNg3m', 52, '', '085296768698', 'Jl. Suka Karya Perum. Puri Indah Kualu', 'Padang Lawas', '2019-01-16', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(3, '1401031007180002', '@ahmad1007', '', '', 'AHMAD HABIB PRATAMA', '1A', '', '$2y$10$/gtKpF.y1q25yEvb96urs.uGyaQF5XI7OKWsQx1HRa3YV6PVe/PjO', 52, '', '083865827123', 'Jl. Suka Karya Perum. Wisma Kualu Permai', 'Andilan', '10-07-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(4, '1401030210180001', '@atharva0210', '3183291645', '', 'ATHARVA ZAIDAN RIFQI', '1A', '', '$2y$10$9oZy8ieirJLphRNxxKoGXOdQxqT2ABtaRkJi7mNrLCg2hhmzxwlF6', 52, '', '081378899860', 'Jl. Arafah', 'Pekanbaru', '02-10-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(5, '1205136303180002', '@attika2303', '', '', 'ATTIKA ZAHRA RATIFFA', '1A', '', '$2y$10$fXOeopoOmZ/3PvT3WTZR6.z7dv6UmLQQZq/gE6OBYq8y9UgEksEUW', 52, '', '082341373611', 'Jl. Masa Karya Gg Al-Makmur', 'Pekanbaru', '23-03-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(6, '1471096107180002', '@azura2107', '', '', 'AZURA RAHIMA SHAKILA', '1A', '', '$2y$10$dCphHfBRVpmjGdhCG6PM0OK7diYj87iUz/fb9qrLKdZ/vwcdytvWq', 52, '', '082124529672', 'Jl. Suka Karya Tarai Bangun', 'Kubang Raya', '21-07-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(7, '1116082912180002', '@deevan2912', '', '', 'DEEVAN ALFARIZKI', '1A', '', '$2y$10$3a4BtPAWjgeZmogqtouZQ.iBjVXwgdTrzoDxsvJNU3vwdd5Vi.Kni', 52, '', '085262419306', 'Jl. Suka Karya Perum Tuah Karya Blok C 3', 'Kabupaten Aceh Tamiang', '29-12-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(8, '1401031101190001', '@fais1101', '3192158238', '', 'FAIS IRFANDI', '1A', '', '$2y$10$IfYUlsXgT/5WaLe/Vp4hVeHRD2HKI2NTOg0MTzxW3xfmR6HDTqygO', 52, '', '089510519378', 'Perumahan Wisma Kualu', 'Pekanbaru', '11-01-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(9, '1471134204180003', '@marta0204', '', '', 'MARTA SELVINA TELEUMBANUA', '1A', '', '$2y$10$ernIuVte6NReQlCVtNPyrO6m3mb6kWWuEw6eidI7tbZmgckamEhla', 52, '', '081371497420', 'Jl. Suka Karya Perum Grb Blok K 12', 'Langkat', '02-04-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(10, '1471082406180005', '@bintang2406', '', '', 'MUHAMMAD BINTANG PRATAMA', '1A', '', '$2y$10$98iDGXl34yFaR3kjZlYO/.wf27TLjcjT8DxcQXchDQu6CqBYgnTBu', 52, '', '082391174345', 'Perum Wisma Kualu Permai Blok U. 11', 'Bukittinggi', '24-06-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(11, '1471090706180004', '@juno0706', '3182587647', '', 'MUHAMMAD JUNO ATHALA', '1A', '', '$2y$10$6KFUTmB1MLamq/bspuSvGup9WJ5arQj4edA9IOjPc/cMjq9LLG5WS', 52, '', '082390888500', 'Perumahan Taman Mutiara Ii', 'Bengkalis', '07-06-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(12, '1274050301190003', '@zein0301', '3196428616', '', 'MUHAMMAD ZEIN PUTRA ANANDA', '1A', '', '$2y$10$IEvaIu.6fpFheCb.O6ZZj.FzUnIIz6M2ijloz6DvYFpzO2YGc4t5a', 52, '', '', 'Kampung Padang', 'Tanjungbalai', '03-01-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(14, '1401034310180003', '@najma0310', '3186852722', '', 'NAJMA SHAQILA UFAIRAH', '1A', '', '$2y$10$0O.0QVh.uR9tzlIWWNiBQOFtsMDSYrXAQDncK3Mw3CDSD5yYNR5PK', 52, '', '081371222328', 'Perum. Wisma Kualu Permai Blok Ag No. 22', 'Pekanbaru', '2018-10-03', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(15, '1471080710180006', '@ravid0710', '3184396360', '', 'RAVID MAULANA', '1A', '', '$2y$10$By/t9kC5j/ZgZ/AiOPzA7eI7EyOjof5oeohCVJEdftbomo8mhL45O', 52, '', '08386479262', 'Perumahan Wisma Kualu Blok L No. 10', 'Pekanbaru', '07-10-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(16, '1471085507190009', '@sahida1507', '', '', 'SAHIDA AQILLA', '1A', '', '$2y$10$pJdzbjKqAHwbuC2aMRR5S.o0OSx4IycBZX5URXa1KRooM461e1lz.', 52, '', '082171849756', 'Jl. Taman Karya Perum Mutiara Blok B 2', 'Pekanbaru', '15-07-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(17, '1401030209180004', '@satria0209', '3182773514', '', 'SATRIA SAPTA PRAMANA', '1A', '', '$2y$10$vbk7vaxh/NLQwHISEi67OeSdocwqeInlJrcY0aK.ON3uvWHwcUlTi', 52, '', '', 'Perum Karya Abadi', 'Pekanbaru', '02-09-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(18, '1471136012180001', '@sauqiah2012', '', '', 'SAUQIAH MAHARANI', '1A', '', '$2y$10$5gDk.w1RcQbAi4SFZEaUze92aVG.MNRSFkQp7P0E7DyLSAuTpDW0m', 52, '', '088708349764', 'Jl. Masa Karya Perum. Raysa Sentosa 1 Blok C 12', 'Pekanbaru', '20-12-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(19, '1471131101190001', '@zean1101', '3199775870', '', 'ZEAN MALIQ PARESTU', '1A', 'maliqzean@gmail.com', '$2y$10$Jjm11GPV/V3Dup/vbd.gYOMHSJauTXm/RHmpl2fAMz92n1RncOgmW', 52, '', '082286557200', 'Jl. Suka Karya Perumahan Graha Bintungan V', 'Pekanbaru', '11-01-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(20, '1471110207180005', '@abdurrahman0207', '', '', 'ABDURRAHMAN AZ ZUHRI', '1B', '', '$2y$10$9.xjTGVNjhCOSCXhvLQyN.WS6Stf3uOmyEMAPoOlb3zi0QtTlUy/y', 52, '', '0895334470779', 'Jl. Suka Karya Perum Wisma Kualu Permai Blok Ag 17', 'Pekanbaru', '02-07-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(21, '1471061706190004', '@adam1706', '3193285230', '', 'ADAM ALZHAFRAN', '1B', '', '$2y$10$WcN048xAGuKwSA2Hu/LZsuU0U.cT3UNd3lkU.6CX9AT.f.0ei3UXW', 52, '', '', 'Jl Taman Karya Ujung Gg Murni', 'Pekanbaru', '17-06-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(22, '1471082201180001', '@adam2201', '3189914261', '', 'ADAM MAULANA AL-HAFIZ', '1B', '', '$2y$10$gMMLM4ikHAaLagqw9dKHyOqWWxsqPy0ufVAFMgH6d/bnimfdcE3dm', 52, '', '', 'Jl.Suka Karya Perum Graha Rawa Bangun Blok Ad 10', 'Pekanbaru', '22-01-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(23, '1213011004180002', '@ahmad1004', '', '', 'AHMAD ALFAJRI LUBIS', '1B', '', '$2y$10$2lOLf4Nl652QWrExUkcnLe6MkuWHccGZvoNqRYDTXqVo49rVZs2yC', 52, '', '083846845145', 'Wisma Kualu', 'Kampung Padang', '10-04-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(24, '1308131805170003', '@aldi1805', '3176101671', '', 'ALDI SAPUTRA', '1B', '', '$2y$10$fCG4Ivn/Q9hOn1opk8eTF..d4HE6IQJ123XG8CNeRswknShWfKTSe', 52, '', '', 'Koto Sapan, Jr. Kp. Kajai', 'Ladang Panjang', '18-05-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(25, '1213036604170002', '@alisha2604', '3173950349', '', 'ALISHA FARHANA NASUTION', '1B', '', '$2y$10$R.J1E1CBnAh6nIwg5qa.Ye6Szhgk47Aj9U9EQxwaJm/CLUsGMBxAe', 52, '', '081344858158', 'Jl. Suka Karya Wisma Kualu Permai Gg. Cendrawasih Blok L 27', 'Kampung Padang', '26-04-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(26, '1401036709180003', '@aqilla2709', '', '', 'AQILLA RAHMI PUTRI', '1B', '', '$2y$10$JuyyrYSjqmgVOSfwt5cOo.To3WIXDhpuM5No7vYPTLCpZbikpvJTC', 52, '', '082172030471', 'Wisma Kualu Blok X No. 9', 'Pekanbaru', '27-09-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(27, '1401030305180002', '@azril0305', '', '', 'AZRIL ALI', '1B', '', '$2y$10$Yra4y4U5AfMy5./t8T.60eWlio0tsd/edaOPi2urzNeAu/4STpFau', 52, '', '087873428950', 'Perum Graha Bangun Permai', 'Pekanbaru', '03-05-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(28, '1401034701190006', '@berlian0701', '3196489294', '', 'BERLIAN QINATA NAJIAH', '1B', '', '$2y$10$0sFlHmfv26/gCQb6lcHAFuCPEzqwTSJUycVd0g.8DOFVj6c0QgG6e', 52, '', '', 'Masa Karya Ii', 'Tarai Bangun', '07-01-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(29, '1401032608180002', '@dafa2608', '', '', 'DAFA ARYA PRADINATA', '1B', '', '$2y$10$KKFN1NMCVtupg7/O8Ug6mODj/yJ/.UFyJ1cAxEGkt43.ZBbh39Gqu', 52, '', '089509137966', 'Taman Karya Gg Sakinah', 'Pekanbaru', '26-08-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(30, '1471080705180005', '@gibran0705', '3187684576', '', 'GIBRAN AL-FATIH', '1B', '', '$2y$10$cEIxpmivd8brwsl1GkRA6O2KqvK3sE7vQoSaBy.Rfn9lIW9q1cCfm', 52, '', '082172061772', 'Jl. Suka Karya Perum Wisma Kualu', 'Pekanbaru', '07-05-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(31, '1471024404180001', '@kartika0405', '3182148552', '', 'KARTIKA MAYNI JULYO', '1B', '', '$2y$10$1l9yEtRcr/Wr6V7ZX3Kok.gXcqQBQUSSBKDv7Ga48VcwB3d7igZSa', 52, '', '081398200306', 'Jl. Suka Karya Perum. Wisma Kualu Permai Blok F. 14', 'Pekanbaru', '04-05-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(32, '1471136106190002', '@kayla2106', '3192874272', '', 'KAYLA AYNINDIA PUTRI', '1B', '', '$2y$10$DzZpgW/KKSctebzErd8/zeyDp5c3FNnP5LH3xT0TGbbw0jAOV3H/G', 52, '', '', 'Jl. Suka Karya Perum Wisma Kuala Blok L 25', 'Pekanbaru', '21-06-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(33, '1401032101190002', '@m.2101', '3196210296', '', 'M. KENZIE ALFARIZI', '1B', '', '$2y$10$FEK0PlvujSlf7WdpCP4z7Od4KvnslYUvKQ3oa/327PfO7oK3GfE9O', 52, '', '', 'Jl. Masa Karya Ii', 'Tarai Bangun', '21-01-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(34, '1401032209180006', '@m.2209', '3182824432', '', 'M. YUKHA SANDY SASTRA', '1B', '', '$2y$10$vGCd5Epo7mIgNykUhxH8I.TagC1MrJ5J9aSZgxVlowMHseNUmsoHW', 52, '', '', 'Jl.Masa Karya Ii', 'Pekanbaru', '22-09-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(35, '1218035506170001', '@melisa1506', '3176931941', '', 'MELISA SIHOMBING', '1B', '', '$2y$10$MddYviXvMkb9yshAydQZuOI.ng8NuzOJYNbst05AJWFj/GAY.if7a', 52, '', '081364825631', 'Jl. Suka Karya Perum. Graha Rawa Bangun', 'Sialang Buah', '15-06-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(36, '1210010304180004', '@hafiz0304', '3185223169', '', 'MUHAMMAD HAFIZ AKBAR NASUTION', '1B', '', '$2y$10$wRYenlJVHRdRYpOwbRKX2u7Jwaj63Cdppig93nm2ji0ae5cDYhkUW', 52, '', '', 'Tarai Bangun', 'Medan', '03-04-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(37, '1401032807180004', '@raja2807', '', '', 'MUHAMMAD RAJA PRATAMA', '1B', '', '$2y$10$eSiGVI7tSP3hOiku7SipuexM6wyfObw6j3xJ4TFDpAjU0VZPoVfDG', 52, '', '088708345465', 'Dusun Ii Tarab Mandiri', 'Tarai Bangun', '28-07-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(38, '2171106603170012', '@nashwa2603', '', '', 'NASHWA APRIYANTO', '1B', '', '$2y$10$UUbxNHXBPBkXfqrsCSTZmOzE0vupf/MFji7RyCLWdCU/LaV2dJVEm', 52, '', '085355243347', 'Perum Graha Rawa Bangun Blok D 15', 'Kota Batam', '26-03-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(39, '1471087005180005', '@zahra3005', '3183030262', '', 'ZAHRA RAMAHDANI HARAHAP', '1B', '', '$2y$10$x6Kz1yGR.3.GsZtA3PJ3VuR7NihNfA2l4g1924J1zSK3WGVueFlL.', 52, '', '082276273174', 'Perumahan Wisma Kualu', 'Pekanbaru', '30-05-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(40, '1471130608180001', '@abdila0608', '', '', 'ABDILA DIRGA PRATAMA', '1C', '', '$2y$10$OhV106/VJB6dwAKeAoDDb.C3Gw7hCndYymXWi/RZ7hCogi98iG5QG', 52, '', '087865327474', 'Jl. Suka Karya Perumahan Karya Abadi Blok G 13', 'Pekanbaru', '06-08-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(41, '1401034311180002', '@adelia0311', '', '', 'ADELIA ZAHRA', '1C', '', '$2y$10$JGsmwiRpBsnX2KjZa.VsyevRm/KmRHvZ3UyXTweKJyBjinTIrCOLW', 52, '', '082391490015', 'Perumahan Karya Abadi', 'Tarai Bangun', '03-11-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(42, '1401036602180002', '@adinda2602', '3187124320', '', 'ADINDA ZAHRANI PUTRI', '1C', 'sdntaraibangun35@gmail.com', '$2y$10$4lyOf5cyjyfOH/9QOLLx6.AJdW1mpVR3..IFIgfasd9nPBIXrhESm', 52, '', '081371211957', 'Perum. Wisma Kualu Gg. Cendrawasih Blok M', 'Pekanbaru', '26-02-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(43, '1404106510170001', '@aisyah2510', '3171864263', '', 'AISYAH HUMAYRAH', '1C', '', '$2y$10$bdsIZooj.8giGzZBR8uW6uE6oJIgWa2Eb2qFE6jf6UKhmm3Ok18xu', 52, '', '', 'Jl. Yossudarso', 'Tembilahan', '25-10-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(44, '1401032806180001', '@akhtar2806', '3188624948', '', 'AKHTAR RIZKY RAHMAN', '1C', '', '$2y$10$IWkJZXm9IWeoG.MAR51lE.9gPjzulBaY0HYoKZWKs2sljYAYLlCVW', 52, '', '081268710519', 'Perum Taman Mutiara Ii Blok C No. 5', 'Pekanbaru', '28-06-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(45, '1401031307180003', '@al1307', '', '', 'AL SYAPUTRA PRATAMA', '1C', '', '$2y$10$7pbg554KYUQjHKEa0wbJAuMwFZ7kJuLgFE6n89CVJPi/rM/Pd9D4K', 52, '', '0895612783900', 'Wisma Kualu', 'Pekanbaru', '13-07-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(46, '1371062109140002', '@alvin2109', '3145946801', '', 'ALVIN ALFIAN', '1C', '', '$2y$10$kd.shM7D.Dxb29n7XO77re0qzvHCQAMvezK4A1v4sCy6611/mq7qi', 52, '', '083128592226', 'Jl. Karya Indah', 'Painan', '21-09-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(47, '1471084808180005', '@annisa0808', '', '', 'ANNISA TIARA AZHARI', '1C', '', '$2y$10$MQb90C4icwdJp0vcL2dLgeT3dd5D0X.SJoRsQoRT0/ss6uuN9quAC', 52, '', '082387731788', 'Jl. Suka Karya Perum Fajar Kualu Damai I Blok C 3', 'Pekanbaru', '08-08-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(48, '1401035609190002', '@azurra1609', '', '', 'AZURRA KHAIRA', '1C', '', '$2y$10$sHPVMAvlNGCKolUkbkSJPOgsl8dF1gAi8Q2w/HIRMlBQhq7N82f7O', 52, '', '', 'Jl. Masa Karya Gg Tower', 'Pekanbaru', '16-09-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(49, '1472026909180001', '@dianti2909', '3180395364', '', 'DIANTI EKA PUTRI', '1C', '', '$2y$10$hHcEyq/nYbUVHU2.qUKn4.QRka1JwxDUdJHbl3QjKrcjNf1/sOUVS', 52, '', '081539494695', 'Jl. Jend Sudirman', 'Padang', '29-09-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(50, '1401034308180006', '@ester0308', '', '', 'ESTER MARISKA SILITONGA', '1C', '', '$2y$10$Kp7l2RSebTdhxwu331nflu5j9VsVtBq7UdDxcWDTC9gkVSLCOhmuW', 52, '', '082173546281', 'Jl. Masa Karya Gg Karya Makmur', 'Pekanbaru', '03-08-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(51, '1401032904180002', '@farriz2904', '', '', 'FARRIZ AL FARIZI', '1C', '', '$2y$10$vweKpNF2w6LHRpgtCg3Y3.2ygWLbV/iqLkAW4iDolhMWkNrYDStda', 52, '', '089505343385', 'Perum. Mutiara Darul Sakinah', 'Pekanbaru', '29-04-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(52, '1471054901190002', '@khaira0901', '3199964927', '', 'KHAIRA ALZAHRA', '1C', '', '$2y$10$aLoXy6tvUcO.dRJbxHr.eOJeG4fECYlWjPt1ba/qfIfEuCDY5jgim', 52, '', '', 'Wisma Kualu Permai', 'Pekanbaru', '09-01-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(53, '1401032609180004', '@m.2609', '', '', 'M. ILHAM SYAHREN GUNAWAN', '1C', '', '$2y$10$nKfqbprCdAOzgQVMD1Z00e1Noiie6yfSYnvvwgOXxf6cfv5.DMaWu', 52, '', '085265222118', 'Jl. Karya Indah', 'Pekanbaru', '26-09-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(54, '1401031307190001', '@chairil1307', '', '', 'MUHAMMAD CHAIRIL AFNAN', '1C', '', '$2y$10$40JknoUl759COTt6SWLJYu/yiJA5Y95yAjkiix1LFJ09h78NER.jm', 52, '', '08126186231', 'Perum. Mutiara Darul Sakinah Blok C 10', 'Tanjung Balai Karimun', '13-07-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(55, '1401031010180002', '@nauval1010', '3182385516', '', 'MUHAMMAD NAUVAL', '1C', '', '$2y$10$hedqVbpvjYK33f.zyvMfqeGRr4UK60KP90iQ3pHUQlTa6Lfgjv2E2', 52, '', '082382313890', 'Perumahan Bintungan 5 Blok A3 No. 4', 'Pekanbaru', '10-10-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(56, '1471081502190004', '@raziq1502', '', '', 'MUHAMMAD RAZIQ ALHABSYI', '1C', '', '$2y$10$mYFNvXhrBk3VxgdB9XBb8.C./HN3YsNCdLV.MNvPXn7Jrf9RiANti', 52, '', '081371666262', 'Jl. Suka Karya-Karya Mandiri I No. 1', 'Pekanbaru', '15-02-2019', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(57, '1312054101180003', '@naura0101', '', '', 'NAURA SALSA BILA', '1C', '', '$2y$10$smko6lRQtVFX3/..YGpaR.chilfKA48yCZ6Nue6sEQKzSvYkS3RIe', 52, '', '089528757586', 'Perumahan Erce Mandiri', 'Pekanbaru', '01-01-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(58, '1302111010180002', '@raditya1010', '', '', 'RADITYA PUTRA', '1C', '', '$2y$10$8gCJj2cuSDbF0kUQM5yIgOKtA9SXh4.BV/FwfCbg8TXeK7Yx44Gs2', 52, '', '085346043473', 'Wisma Kualu Blok P 27', 'Kota Solok', '10-10-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(59, '1401036307180002', '@zulnis2307', '', '', 'ZULNIS ONITA GULO', '1C', '', '$2y$10$PsTzzrOOVBeVIdlTXksxJuI8rDZe1sJ.ayjDQk9BIBS/x2j0MLVlW', 52, '', '082180787133', 'Graha Rawa Bangun', 'Pekanbaru', '23-07-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(60, '1401032107170001', '@abid2107', '3174386611', '', 'ABID PRANAJA', '2A', 'sdntaraibangun35@gmail.com', '$2y$10$47ruziOHpltDLgwStbkRtuPHFnN1m1xHznnxqdvCwEkZjlrRmrq2K', 52, '', '081275616688', 'Perum. Karya Abadi No. 2 C Dusun Ii Tarab Mandiri', 'Kampar', '21-07-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(61, '1301030702180001', '@agra0702', '3182002667', '', 'AGRA BILFAHQI HAFIZAN', '2A', '', '$2y$10$5JnXHLcSqrg9wknLfIMo3.Sz6i5hH0l3BXv4IuvfCZ2/UuGJKI6sm', 52, '', '', 'Pasar Gompong', 'Pasar Kambang', '07-02-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(62, '1371113004170002', '@ahmad3004', '3170242015', '', 'AHMAD ALFAREEZ', '2A', 'sdntaraibangun35@gmail.com', '$2y$10$ofsflh4EBuPkFLM2r2iB8ebLnAlXhqlmTncfA.jwBAsqiYXXN34sK', 52, '', '081266564459', 'Jl. Karya Mandiri Blok P. 6 Wisma Kualu Permai', 'Padang', '30-04-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(63, '1401035811170002', '@arsyila1811', '3176097284', '', 'ARSYILA KABSYA SAHIDA', '2A', '', '$2y$10$4HYb6rSChkxfNytRgMmEE.nve0jqDzB2lf5nWHnVbq26Ah2GIg0ru', 52, '', '', 'Masa Karya', 'Pekanbaru', '18-11-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(64, '1471062409170001', '@farhan2409', '3175697499', '', 'FARHAN AFRIAN', '2A', '', '$2y$10$/o5amNRQnGv3siQ8DYgQhuN6NNjL39oWxgFlvHa0ge2P2DRU./Z5i', 52, '', '', 'Jl Tengku Kasim Perkasa', 'Pekanbaru', '24-09-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(65, '1671155701170005', '@fauzia1701', '3176135902', '', 'FAUZIA ISLAMI', '2A', '', '$2y$10$QxK/SQ1Jd0OyJUo.9es64uuAnyHhMCZirCuFfRmRQw/dJgEg/7Kaa', 52, '', '081266564459', 'Jl. Suka Karya Perum. Graha Rawa Bangun Blok K 2', 'Palembang', '17-01-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(66, '1401036312170001', '@hafizah2312', '3178789832', '', 'HAFIZAH KHUMAIROH', '2A', '', '$2y$10$aQvDBrk7cL/iUxYWKnoMLuu53GRCKYOqorYnGaFoHzR8wFQIh8fpC', 52, '', '083131855790', 'Jl. Masa Karya Perum. Taman Karya Ujung No. A7', 'Pekanbaru', '23-12-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(67, '1401025903180001', '@khansa1903', '3187233955', '', 'KHANSA KAYYISAH NAIFAH', '2A', '', '$2y$10$eQWdKHxkcQiDiwBRnb3HuuIZfqJ/WlPYzJ1xT.3qy5rPBZwNctz8S', 52, '', '085265136562', 'Jl. Suka Karya Perum Graha Rawa Bangun Blok P No.09', 'Pekanbaru', '19-03-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(68, '1471086405170008', '@meika2405', '3178725691', '', 'MEIKA ARILA PUTRI', '2A', '', '$2y$10$c1bOg8aScQqO50l.TtkbGeo1sbOi/vYAmrB/qCy9UKTZ4jeT7xp1C', 52, '', '083879960450', 'Jl. Masa Karya Gg. Karya Makmur', 'Pekanbaru', '24-05-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(69, '1312044807160002', '@mikayla0807', '3168960859', '', 'MIKAYLA HUMAIRA', '2A', '', '$2y$10$eySaNnAd4shfVGuf.T.1se1t3kf2In7dcKYAmWkl.UkOgpywIDVwm', 52, '', '082172061772', 'Jl. Suka Karya / Perum Taman Mutiara Ii', 'Kajai', '08-07-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(70, '1471072808170002', '@erdogan2808', '3177855263', '', 'MUHAMMAD ERDOGAN  ZONI JUNIOR', '2A', 'sdntaraibangun35@gmail.com', '$2y$10$PTex3zHDbXY/tLSXDLGqsugqomzXnUdQyxvjpet9cBUHCO9bB9YnW', 52, '', '081249215880', 'Jln. Suka Karya Perum Rasa Sentosa 3 Blok H-10', 'Pekanbaru', '28-08-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(71, '1401032603180001', '@rafael2603', '3185649010', '', 'MUHAMMAD RAFAEL', '2A', 'sdn035taraibangun@gmail.go.id', '$2y$10$tztayc0wEtZ4xJUalzsmxutfRrtffdAK4F1szB/OmOWsZjst9nKzC', 52, '', '082285228925', 'Jl. Suka Karya Perum. Wisma Kualu Blok E No. 12', 'Pekanbaru', '26-03-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(72, '1471023005170003', '@wildan3005', '3175503480', '', 'MUHAMMAD WILDAN ILMAN', '2A', '', '$2y$10$uvDQhuGBPDn.3ruzLcmBJOOsP6fG6hoZMpK2AbA5wCklH/YNey8Ky', 52, '', '082172133768', 'Jl. Suka Karya Komplek Graha Rawa Bangun Blok J 5', 'Pekanbaru', '30-05-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(73, '1402046103170003', '@najla2103', '3174960979', '', 'NAJLA ZAHIDAH QURRATUAIN', '2A', '', '$2y$10$KOUfnH/Sr8yBVGM8NVRsBuuOu4a/n2j0u3fdyLid2NyG/QB.Rhcv6', 52, '', '085265783757', 'Jl. Taman Karya Perum. Taman Mutiara Blok A/Ii', 'Air Molek', '21-03-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(74, '1471080804170008', '@oka0804', '3176808118', '', 'OKA BALDEV PARESTU', '2A', 'sdntaraibangun35@gmail.com', '$2y$10$u2uJgBaeByHEASYnq35DT.dhfKnhem7oQ2J6mdE/AkoKPGF7GpB0K', 52, '', '082286557200', 'Jl. Suka Karya Perum. Graha Bintungan5Blok C 8 No. 18', 'Pekanbaru', '08-04-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(75, '1471084805170001', '@ratu0805', '3173180612', '', 'RATU AERILYN BELLVANIA BIANKA', '2A', 'sdntaraibangun35@gmail.com', '$2y$10$OPlIwX/YRRUvXq7NFps4mufcPnSBIVqp6sglFbHn53C33EN8sxQe.', 52, '', '082284000510', 'Jl. Masa Karya Ii', 'Pekanbaru', '08-05-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(76, '1471132307160001', '@riki2307', '3162205842', '', 'RIKI JULIKA TELEUMBANUA', '2A', 'sdntaraibangun35@gmail.com', '$2y$10$7vvvbcLjKgrUO.zT5tQt3ulYYVaLuRhh1w18J4NnnUcLImd44bhP.', 52, '', '', 'Jl. Suka Karya Perum. Graha Bintungan Blok K No. 12', 'Langkat', '23-07-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(77, '1371061107170003', '@valdo1107', '3171695093', '', 'VALDO PUTRA RAMADHAN', '2A', '', '$2y$10$JkrMYn2JSWn.vKljsVknyeZ.og/n93OWCoZTXEBDhEWF8CTfUm7Fi', 52, '', '083136878750', 'Jl. Masa Karya Ii', 'Padang', '11-07-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(78, '1471131406170002', '@yoel1406', '3171079598', '', 'YOEL PANJAITAN', '2A', 'tettisumarnipku@gmail.com', '$2y$10$8JlNT2mf364xzB0poHjAne3bQ11thQb6Az..PsmFDXYLEq/dlaoCK', 52, '', '081275760258', 'Jl. Suka Karya Komp. Grb Blok L-11', 'Pekanbaru', '14-06-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(79, '1401030508170002', '@ahmad0508', '3173789863', '', 'Ahmad Muzammil Yusuf', '2B', '', '$2y$10$YMdms4DxRFbwrgJCDFiV/.Y06EEpXaX3JVgDjLx21q9uQsDalEKba', 52, '', '', 'Masa Karya', 'Pekanbaru', '05-08-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(80, '1471025510170002', '@aisyah1510', '3171528351', '', 'AISYAH OKTAVIANI FITRI', '2B', 'sdntaraibangun35@gmail.com', '$2y$10$Ntuh2M3Im8QMQupUB22sMOyFSHCdmGIVNDUhKl3WEUULQu90uA9lW', 52, '', '082346032414', 'Jl. Suka Karya Perum. Wisma Kualu Permai Blok G No 7', 'Pekanbaru', '15-10-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(81, '1471125903170002', '@alesha1903', '3174940245', '', 'ALESHA MALAYEKA NURULLAH', '2B', 'sdntaraibangun35@gmail.com', '$2y$10$gjeg0MDqAEGdP/3bukQs2.oSr1v.GlwLOho1FQpCEWGwvHc7spm5O', 52, '', '', 'Jl. Suka Karya Perum. Wisma Kulau Blok Ac No. 4', 'Pekanbaru', '19-03-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(82, '1401036405170002', '@asyifa2405', '3171812392', '', 'ASYIFA KHUMAIRAH', '2B', '', '$2y$10$/NWC4ja.iHwCX0kUg26C4OVv6PcxZEECg.l1/OQS4neKzCg4.r.V6', 52, '', '081275126242', 'Jl. Suka Karya Perum. Mahkota Riau Blok E 2 No 6', 'Pekanbaru', '24-05-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(83, '1401130708170001', '@azim0708', '3173069556', '', 'AZIM ALFARIZI', '2B', 'sdntaraibangun35@gmail.com', '$2y$10$tUhpDCIt0JyZEkfliwkbcuxJXkX.Rde74yVBiS5TlbLINilzkHDnG', 52, '', '085263257556', 'Jl. Karya Mandiri Blok P. 6 Wisma Kualu Permai', 'Pekanbaru', '07-08-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(84, '1401030110170003', '@bintang0110', '3175961165', '', 'BINTANG RAFAEL SILITONGA', '2B', '', '$2y$10$3DQ8zkI2kpJvJxVGtqd84erNdvveZsYJZjOJ93NkcUn78beXkfbpK', 52, '', '082293659714', 'Jl. Masa Karya Gg. Karya Makmur', 'Pekanbaru', '01-10-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(85, '1401031806170002', '@gibran1806', '3176639554', '', 'GIBRAN ALIF RHASKAN', '2B', '', '$2y$10$DAuihshSnPvLOfVa5Li3X.cISZdswaInbRUD1z4E/XdnQPApVblPe', 52, '', '083181719134', 'Jl. Suka Karya Perum. Karya Abadi', 'Tarai Bangun', '18-06-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(86, '1501054603180001', '@hanifa0603', '3186159069', '', 'HANIFA HUMAIRA', '2B', '', '$2y$10$XNHxVI.q6G4d2s3sawKLROiTVVIErZyl/iViFOucmN1jNrlsBbgEi', 52, '', '', 'Muara Semerah', 'Muara Semerah', '06-03-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(87, '1401034405180002', '@hilya0405', '3184844000', '', 'HILYA NURUL ASKIA', '2B', 'sdntaraibangun35@gmail.com', '$2y$10$Nt7vyB6sd1Wu9HEpGCma6OmueWtFuXtDOtOgbS46iLIT/kaJSYJha', 52, '', '083122684426', 'Jl. Karya Bersama No. 41 Dusun Ii Tarab Mandiri', 'Tarusan', '04-05-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(88, '1471115712170001', '@keyla1712', '3176884056', '', 'KEYLA ALEXSIA', '2B', '', '$2y$10$PJnswMDYZmAF.ya3PS/gNu5wHl.0CCoYUajlt2mC5Nq/jjczZbxhC', 52, '', '', 'Jl Suka Karya Perumahan Puri Indah Kualu Gg Asoka No.135', 'Pekanbaru', '17-12-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(89, '1401035803180002', '@kiarani1803', '3188017403', '', 'KIARANI SALSABILA', '2B', '', '$2y$10$Q07eBtCGeQwvuEU.5VixcebA8ZQlgDN3XgATHqQqb/NkL.gN2hNTu', 52, '', '081267090005', 'Jl. Suka Karya Dusun Sialangmunggu', 'Pekanbaru', '18-03-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(90, '1471086611170003', '@lathifah2611', '3172927274', '', 'LATHIFAH ZAHRA', '2B', '', '$2y$10$4.5rl8Vh9ZmIJHpjEixYE.LRwGCT8OZAesXbx0V8HFM6x2Vi7ui.G', 52, '', '082350226920', 'Jl. Suka Karya Perum. Puri Indah Kualu', 'Pekanbaru', '26-11-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(91, '1401036206170002', '@maisya2206', '3177368275', '', 'MAISYA NANDYRA PUTRI', '2B', '', '$2y$10$uxfg.v9.Xqurg9sIq.A/juqTwLlPQ64bNwKxUgJdUOG7ptrk.CTte', 52, '', '', 'Masa Karya', 'Pekanbaru', '22-06-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(92, '1205134911170005', '@millata0911', '3175504246', '', 'MILLATA IBRAHIMA HANIFA', '2B', '', '$2y$10$6LNXWNkhQsR1jYtUUUCPRe28plAo8AO68toamB/333weov8lVy33K', 52, '', '', 'Dsn Iii Tengah', 'Langkat', '09-11-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(93, '1401030607160004', '@yasin0607', '3164942133', '', 'MUHAMAD YASIN', '2B', '', '$2y$10$blqagWLZi7DcGaVcnCkqTOgV/Zu5pZ0ZgGXs2wAlmxkH9ozVJ7VUe', 52, '', '', 'Jl. Suka Karya Perum Suka Karya Indah Blok. F No. 14', 'Pekanbaru', '06-07-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(94, '1401032112170001', '@rafli2112', '3179769563', '', 'MUHAMMAD RAFLI YADLIN RISQI', '2B', 'sdntaraibangun35@gmail.com', '$2y$10$iGp2lU8O8NgaY.lH6tWzH.bkeq0dPPhQy3mcmTpS3gJDa.ZimyUCK', 52, '', '082169915990', 'Jl. Suka Karya Perum. Karya Abadi / Rc Mandiri Blok A No. 5', 'Pekanbaru', '21-12-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(95, '1471083009170005', '@mustakim3009', '3173592668', '', 'MUSTAKIM PAKPAHAN', '2B', '', '$2y$10$/ZNQstmgLoKmVFrAl7aJ6OLgso0n32jL5GuQ/mOLkOpVCeZZfMwQ.', 52, '', '', 'Jl Taman Karya Perum Permata Bunda Blok Ff No 3', 'Pekanbaru', '30-09-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(96, '1401184807170002', '@nashwa0807', '3170850232', '', 'NASHWA MAHREEN', '2B', 'sdntaraibangun35@gmail.com', '$2y$10$e5q97.7OvKWxjheOCuggk.4NMIMT2IMBPDFBYokA3sS8Oww8P2iXy', 52, '', '081363903070', 'Jl. Suka Karya Perum. Wisma Kualu Blok E No. 13', 'Air Tiris', '08-07-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(97, '1471056303170002', '@pelangi2303', '3176210693', '', 'Pelangi Raisahayu Afrizal', '2B', '', '$2y$10$cNGunyJTp4lQi8CduleYMOwQAaOMogcChL7iA6SGqpLCLk/hm/fSG', 52, '', '', 'Suka Karya', 'Pekanbaru', '23-03-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(98, '1401032611170006', '@rafi2611', '3179630750', '', 'RAFI ALFANDI', '2B', 'sdntaraibangun35@gmail.com', '$2y$10$iGw2J/IpTI5XDHQdOU9Uzu41heXgw7iofszTpWyL/M9u.DyyEhB16', 52, '', '081243391366', 'Jl. Suka Karya Perum Wisma Kualu Blok Ad 01', 'Kota Pekanbaru', '26-11-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(99, '1471095104170004', '@raudhatul1104', '3179398894', '', 'RAUDHATUL ARSYLIA', '2B', '', '$2y$10$ui8dIZ8NkcvxK9Eiq6MpH.T.MD8RklpOJBXtqjzHi1kpIDIi86Rce', 52, '', '', 'Jl Taman Karya Ujung Perumahan Pesona Arrafah No D 01', 'Pekanbaru', '11-04-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(100, '1471094910170004', '@shanika0910', '3175911114', '', 'SHANIKA ADZKIYA', '2B', '', '$2y$10$9v7cPe5HX7r6XAm27LOqm.4n/4dD9tESfEY0RIoQia8JGOKjlovo2', 52, '', '085364631281', 'Jl. Suka Karya Ujung Perum. Putra Kualu Sejahtera', 'Pekanbaru', '09-10-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(101, '1471084607180001', '@shareena0607', '3181738085', '', 'SHAREENA SHEZA AZZAHRA', '2B', '', '$2y$10$KsDtVUDlIcUmlIaqYUuUPeaxw2/LzoiVS1p8Tulmx78qpaTn67.By', 52, '', '085278460166', 'Jl. Sarana Utama Perum, Puri Mayangasri2', 'Pekanbaru', '06-07-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(102, '1471130607180001', '@varlan0607', '3188747430', '', 'VARLAN WIJAYA', '2B', '', '$2y$10$rlZPLq40abqRVA8H/HkDUeKyRy./wc96LG2eTHwphq3J6bJ.mWPla', 52, '', '085272677370', 'Jl. Suka Karya Perum . Wisma Kualu Permai Blok H 18', 'Pekanbaru', '06-07-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(103, '1471014306170005', '@aisyah0306', '3174247063', '', 'AISYAH JUANDA RAMADHANI', '2C', 'sdntaraibangun35@gmail.com', '$2y$10$4bR/dIVf7cEazd6gr6m96e5XI6dbiUxQN4uV5CLYcgwV8df7LuGl6', 52, '', '082350226880', 'Perumahan Wisma Kualu Permai Blok O No. 1', 'Pekanbaru', '03-06-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(104, '1305096305170002', '@alika2305', '3171708344', '', 'ALIKA NAYLA PUTRY CHANIA', '2C', 'sdntaraibangun35@gmail.com', '$2y$10$gmGeywK4bWzKxFTgX7l7B.u7ucV5MZOC0jj8QVkBdCIhy.BeHxhYS', 52, '', '089509567198', 'Jln Suka Karya Gang Nurul Huda Dusun Ii Tarabmandiri', 'Pariaman', '23-05-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(105, '1471115111170005', '@amanda1111', '3174083105', '', 'AMANDA DELISA CANTIKA', '2C', 'sdntaraibangun35@gmail.com', '$2y$10$7Bo2yJnOu.Iz3wXK1s.wLO/qk0PMrvR0cmRcVR1Vw7nhy5VxDnqAa', 52, '', '081333261445', 'Jl. Masa Karya Ii Perum Taman Karya Blok C4', 'Pekanbaru', '11-11-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(106, '1471085207170002', '@anissa1207', '3175339797', '', 'ANISSA SAFITRI RIDWAN', '2C', '', '$2y$10$AquXNGbBZVtggNYQ/MsdweU7jKsIimB3HXcwU5xLNlH/m5mGGJYy6', 52, '', '082169493159', 'Jl. Suka Karya Perum Wisma Kualu Tahap 2', 'Pekanbaru', '12-07-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(107, '1471090502180006', '@atha0502', '3185847214', '', 'ATHA MAULANA YUSUF', '2C', '', '$2y$10$ztLNOVDfd.nvEE0kFmj0pOEcB.gnIGeU9IqfqITmXSOBuXr6uC5M2', 52, '', '085278727285', 'Jl. Masa Karya Ii', 'Pekanbaru', '05-02-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(108, '1401032202180001', '@bagas2202', '3182494996', '', 'BAGAS ZAKY PERDANA', '2C', '', '$2y$10$dzA.58NnD3Lz/kU8hSg.G.coohYtqkB1F39G54Ju/4jAtwU.KIuX2', 52, '', '085265489720', 'Jl. Masa Karya, Gg. Karya Makmur', 'Pekanbaru', '22-02-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(109, '1471086112160003', '@gita2112', '3168776570', '', 'GITA ANANDA PUTRI', '2C', '', '$2y$10$pa/KzLsOiw8WpoWxId8skuflEtUB9NWwIi4r0FdOedeQosNCQ/uFO', 52, '', '081276134564', 'Jl. Suka Karya Prum. Graha Bangun Permai', 'Pekanbaru', '21-12-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(110, '1302100302170001', '@ilham0302', '3175773874', '', 'ILHAM WAHYU HIDAYAT', '2C', '', '$2y$10$qo6ofQECN8LXMI2OXv644eV29qWZVgp53TM5b0r6Tl8ALctSqseW6', 52, '', '', 'Jln. Suka Karya', 'Solok', '03-02-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(111, '1401034507180003', '@juliana0507', '3181860470', '', 'JULIANA RAHMA FITRI', '2C', '', '$2y$10$odoj/zS/0UzC4GXpb6Lhu.pDFXy4hKiLsyUH3xCzcbOO0sgsklQiK', 52, '', '088270986625', 'Jl. Suka Karya Perum Puri Indah Kualu Gg. Lili No 157', 'Kampar', '05-07-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(112, '1471020612170002', '@keel4athaya0612', '3179800525', '', 'KEEL4ATHAYA RAMADAN', '2C', 'sdntaraibangun35@gmail.com', '$2y$10$Et18OvqqPdPcTLqNg.2zJO0COzBRZs.wZ0ELLoSVr3J39Xt.YQgNm', 52, '', '088279823848', 'Jl. Suka Karya Perum. Taman Mutiara Ii Blok E No. 5', 'Pekanbaru', '06-12-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(113, '1471086311170003', '@khania2311', '3172365954', '', 'KHANIA NOVITA', '2C', '', '$2y$10$cnftjiz2q/gyRtK1QyIt.uqJBSHQG5jG7qRFsJ1IY2N7Ngy1NpaMS', 52, '', '08988141043', 'Jl. Suka Karya Perum. Taman Mutiara Ii Blok C. 8', 'Pekanbaru', '23-11-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(114, '1401031408170004', '@al-fatih1408', '3171357418', '', 'MUHAMMAD AL-FATIH PINOV', '2C', '', '$2y$10$7f5KazocA4E4.SLV1BW9h.uH4lSIAY6.mKFwggqGpwCargHLIFiLe', 52, '', '081266495090', 'Jl. Masa Karya Gang Pribadi', 'Pekanbaru', '14-08-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(115, '1271042311170003', '@rafa2311', '3171892462', '', 'MUHAMMAD RAFA AZKA PUTRA', '2C', '', '$2y$10$0lnd1KsKxiNpXE8q1wMpyeoaosvYU3dSHsBxv21Ziq/Y5r.SwPa/y', 52, '', '', 'Jl.Suka Karya', 'Medan', '23-11-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(116, '1305081509170001', '@wahyu1509', '3173433728', '', 'MUHAMMAD WAHYU', '2C', '', '$2y$10$.Umx9ramyYTwJ6.Y0jvEK.es/rmlfHRcaWxHC.kw4yVfOYqI9jEme', 52, '', '082287423368', 'Jl. Suka Karya Perum. Permata Bunda Blok F-5 Tuahkarya', 'Sungai Limau', '15-09-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(117, '1471054802180003', '@nadhira0802', '3180815822', '', 'NADHIRA THAFANA PUTRI', '2C', 'sdntaraibangun35@gmail.com', '$2y$10$IQzYf.l34HzkU/0SepeMiumaCayVeJm89j/U99MgVCEr.ewUniB6q', 52, '', '081364557479', 'Jl. Suka Karya Perum Wisma Kualu Permai', 'Pekanbaru', '08-02-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(118, '1401030907170006', '@noval0907', '3178825429', '', 'NOVAL ADITYA RAYHAN', '2C', '', '$2y$10$qAGMhAs1LHYofa0hiMLHjObFtsO/Q7Zdghgb92nTaCsfDXK.GLxqi', 52, '', '085263025900', 'Jl. Suka Karya Perumahan Wisma Kualu Blok X No. 5', 'Pekanbaru', '09-07-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(119, '1471132301170001', '@rendra2301', '3178841964', '', 'RENDRA ALFARO', '2C', '', '$2y$10$lItDztbUk9IGjvB5jkkKdOCETUxZAxe32OY5.gXpz/q6Hidhj3lTi', 52, '', '085272677370', 'Jl. Suka Karya Perum . Wisma Kualu Permai Blok H 18', 'Pekanbaru', '23-01-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(120, '1304075801180001', '@shezan1801', '3182807788', '', 'SHEZAN NAFISA LUKMAN', '2C', 'pkuayutifeni1989@gmail.com', '$2y$10$Vwj7UYUa9QN25bnbo3iB0ezBwVnAkUFd3rEFYDe51GOrBdKy9gD6G', 52, '', '085218387545', 'Jl. Suka Karya Perum. Sukma Karya Asri No. B. 3', 'Pekanbaru', '18-01-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(121, '1471016906170001', '@yara2906', '3178585398', '', 'YARA HUSWI NASUTION', '2C', 'sdntaraibangun35@gmail.com', '$2y$10$aBnnhEkDBxoO34jjX/R0UOMp89ChZzKpYUzoG7OCpXHsDYFi2.q4C', 52, '', '085263344876', 'Jln Suka Karya Perumahan Wisma Kualu Permai Blok R 2', 'Pasir Pengaraian', '29-06-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(122, '1401051611160002', '@abyan1611', '3169279054', '', 'ABYAN ALZIKRA', '3A', '', '$2y$10$zDl2LVYs.hQVNXhi/GTkI.c/VcECWn7zrXIT3IwMB6y5m6aMgTPLO', 52, '', '', 'Jl. Suka Karya Perum. Wisma Kualu Permai Blok U 13 Rt/Rw: 001/003', 'Pekanbaru', '16-11-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(123, '1471087103170003', '@aisyah3103', '3176041430', '', 'AISYAH RAHIM', '3A', '', '$2y$10$9BnNH6d0C.VJ64XjuT5SK.5zcYCtdM/PkEB4MB4DQh5armG7WvJUq', 52, '', '', 'Jl. Suka Karya Perum. Asta Karya', 'Pekanbaru', '31-03-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(124, '1471082101170004', '@alfino2101', '3170174786', '', 'ALFINO ADI PUTRA', '3A', '', '$2y$10$rOW0Ef.D.r4BWafB4MzmmOZvso7eI4fVFHRDmrypbnRinuwQWKPyC', 52, '', '', 'Jl. Suka Karya Perum Wisma Kualu', 'Pekanbaru', '21-01-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(125, '1471114408170003', '@amani0408', '3176856240', '', 'Amani Shaliatunnisa Arily', '3A', '', '$2y$10$e7bfRTLuG1KpweaQbq5MaOV/3hKt2nhufhjw5YCuSYijRTJh/L1oC', 52, '', '', 'Jl. Karya Masa', 'Pekanbaru', '04-08-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(126, '1471086701160001', '@anastasia2701', '3157708157', '', 'ANASTASIA BERLIANA', '3A', '', '$2y$10$R8ORb/SX6vouMiKLcvQiI.U80I6WB1C9Zl6tTrnJgpi6aSFlvJ.AO', 52, '', '', 'Jl. Karya Mandiri Perumahan Taman Mutiara Ii Blok D 1S', 'Pekanbaru', '27-01-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(127, '1401032408160001', '@arvino2408', '3166451314', '', 'ARVINO SAYID', '3A', '', '$2y$10$COLvr3UaDJ7PGNJQwFvE6Oru3AnURDO8WZog5kt6LnT7bmRW5CakC', 52, '', '', 'Jl. Suka Karya Perum. Bintungan 5 Blok A3 No. 4', 'Pekanbaru', '24-08-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(128, '1471061108160001', '@daffa1108', '3166358322', '', 'DAFFA IBNU HAFIDZ', '3A', '', '$2y$10$IBKMF4Z7kOVsvDe5reDnEe.vYcKz/e0io69TMi8eqeaaWj0S9z7aS', 52, '', '', 'Kota Lama', 'Pekanbaru', '11-08-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(129, '1401034412160001', '@dian0412', '3164265042', '', 'DIAN NOVIANTY ARISYA', '3A', '', '$2y$10$Om79bhicL9/LffNaq11QwugXcnGZXrBWXJGDkBBAqajMoelvrI4QG', 52, '', '', 'Jl. Suka Karya Dusun Ii Tarab Mandiri', 'Pekanbaru', '04-12-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(130, '1401035507160004', '@hidayatul1507', '3166515000', '', 'HIDAYATUL RAHMI', '3A', '', '$2y$10$Uza2DvUz8tdP/1EFjOqa0eiqjkrMrxqJUYoE71L.ARJVebhbZky6i', 52, '', '', 'Jl. Suka Karya Perum. Karya Abadi Blok A.11', 'Kualu Nenas', '15-07-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(131, '1471051304160001', '@keymouri1304', '', '', 'KEYMOURI NOAH', '3A', '', '$2y$10$UKGrO5.M7HXrMr6lW4Fi7OGOI/LZYpjKZhdmaEp7CTCTG9rmGYB5a', 52, '', '', 'Jl. Suka Karya Perum Wisma Kualu Permai', 'Pekanbaru', '13-04-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(132, '1401034503170002', '@kinaya0503', '3177691061', '', 'KINAYA TALITA AZURA', '3A', '', '$2y$10$8KZZpUPuVhMRFT8MK/4Ji.lTQh8V.RH1eOpbqhhEkuDij8YGFxJrS', 52, '', '082133411235', 'Perumahan Puri Indah Kualu', 'Pekanbaru', '05-03-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(133, '1401032802160005', '@fikri2802', '3167683189', '', 'MUHAMMAD FIKRI ABDILLAH', '3A', '', '$2y$10$H/XuEiqWvCHAO5hVY7lV2.cuNWvSce0COqQ0NK84r13Za1z6eesbG', 52, '', '', 'Jl. Karya Bersama', 'Kampar', '28-02-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(134, '1401031106160001', '@ilham1106', '3161348388', '', 'MUHAMMAD ILHAM RAHMADANI', '3A', '', '$2y$10$dCy5MBXc0WczNwHFUNyKwurHSiIogwnxcC.pZyjMtF2kp5FOeVy7K', 52, '', '', 'Jl. Suka Karya Perum Wisma Kualu Blok H. 17', 'Pekanbaru', '11-06-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(135, '1302062011160001', '@rizki2011', '3165600620', '', 'MUHAMMAD RIZKI', '3A', '', '$2y$10$/YL2ThWYmFTq2PLm4grGHegwqmWJ7eJpeNQvcnSs.9RZ3h0Y4HArS', 52, '', '', 'Jln. Raya Koto Laweh - Bukit Sileh', 'Solok', '20-11-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(136, '1471036509140002', '@naura2509', '3144703610', '', 'NAURA HASNAH HUMAIROH', '3A', '', '$2y$10$HDdf0NYwLH042NX4PEdxOOtT.H863vYmTIWkW.HVtjWQx.xUuV/8y', 52, '', '085284202024', 'Perum Wisma Kualu Permai', 'Pekanbaru', '25-09-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(137, '1401036911160003', '@novalia2911', '3163444674', '', 'NOVALIA FAUZIA', '3A', '', '$2y$10$8rajDxAVrBWSCcaBDMXVbOXIQy.2OmB85iq1NAfAHNNztzn17Yxpe', 52, '', '', 'Jl. Masa Karya', 'Pekanbaru', '29-11-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(138, '1471120110150004', '@ramah0110', '3157147896', '', 'RAMAH SAID FAUZAN', '3A', '', '$2y$10$QV4xFyyJrYoActjpKgEsgegz19E2cFm0TwQ.i6iTPYVNzEoPYugaG', 52, '', '', 'Jl. Suka Karya Perum. Graha Rawa Bangun', 'Pekanbaru', '01-10-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(139, '1401030112150001', '@refal0112', '3154147172', '', 'REFAL STEVEN RINALDI', '3A', 'sdntaraibangun35@gmail.com', '$2y$10$L8ceMb5QfDr5BR5me8pZDuW214NKSNApfSNHNplOWTFtKM4E8hltu', 52, '', '082384415209', 'Jl. Suka Karya', 'Aur Sati', '01-12-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(140, '1401100406160002', '@restu0406', '3167403230', '', 'RESTU RAMADHAN', '3A', '', '$2y$10$GNntZjxvOyoqad28bL2K8O9M/nQIzYG8EDrYpRmIpYimskxvKb.C2', 52, '', '', 'Jalan Masa Karya Blok V No. 16', 'Sungai Putih', '04-06-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(141, '1405052305150001', '@salman2305', '3158987900', '', 'Salman Alfarizi', '3A', '', '$2y$10$8azKgmI0n4BSPjRrKwO4XeuVb3lDNdRR9Qz7juIw6qvT0PfVm2X9G', 52, '', '085392120983', 'Jl. Karya Masa Perum. Griya Tarai Asri', 'Pelalawan', '23-05-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(142, '1401035402160002', '@veli1402', '3161927251', '', 'Veli Ferliyanti', '3A', '', '$2y$10$q61z7Yku4Yk6akEol65MQOG4OvZNqtGmaiOr1TpaH.q7sscNz98ny', 52, '', '', 'Perum Graha Bangun Permai', 'Pekanbaru', '14-02-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(143, '1471082212160003', '@ahmad2212', '3161936119', '', 'AHMAD HAFIZ PUTRA ANANTA', '3B', '', '$2y$10$0SmZkMk.ZLNr42WVOMxlzu/FXaO.CXn.SQdIf.M4w9Pz/zcRXsRTW', 52, '', '', 'Jl. Masa Karya Dusun Ii Rt/Rw: 01/07 Desa Tarai Bangun Kecamatan Tambang Kabupat', 'Pekanbaru', '22-12-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(144, '1308054709160001', '@alhijjah0709', '3168995109', '', 'ALHIJJAH MUTIARA NAJWA', '3B', '', '$2y$10$Ut3z4e9BSFaAszJTra/sueHsFMOyGqmP7fdkHktt4jhxJgqAuT.te', 52, '', '', 'Jalan Suka Karya Perum Wisma Kualu Blok P. No. 11', 'Lubuk Sikaping', '07-09-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(145, '1471084111160005', '@alina0111', '3164493773', '', 'ALINA ZAHRA', '3B', '', '$2y$10$0/BMrXeqwc8zntRFmTA7FO51vVZq9xu1eaJGfPb0E/NfOHQcDDMV6', 52, '', '085375721993', 'Jl. Kubang Raya Km. 2', 'Pekanbaru', '01-11-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(146, '1401031708160002', '@alvin1708', '3162297818', '', 'Alvin Dirgantara Rahman', '3B', 'sdntaraibangun35@gmail.com', '$2y$10$L8ewUAanKRuV4d8rLckGaOc8FIBvQwjo/dXtO/xFf4UItbFHBrE3m', 52, '', '', 'Jln. Masa Karya', 'Pekanbaru', '17-08-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(147, '1306016404160001', '@aulia2404', '3169518848', '', 'AULIA NUR AFRISKA', '3B', '', '$2y$10$7u1EQSSWNA0iLHjiJHq33uc67qkqBKzwmBW3E0TruV2J8WFIXJ04e', 52, '', '085265747073', 'Jl. Taman Karya Ujung', 'Tiku', '24-04-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(148, '1471051411160001', '@farhan1411', '3161684787', '', 'FARHAN AL ALIMU RAFIF', '3B', '', '$2y$10$oU1kNHTAaFoaSkh0eoODFeN4Tmw8.Tt7TzBY.TBH2tTwlRev6EVG.', 52, '', '085265743673', 'Jl. Suka Karya Perum. Taman Mutiara 2 Blok C No. 18', 'Pekanbaru', '14-11-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(149, '1471096602170006', '@ibnatu2602', '3174615031', '', 'IBNATU SANUM ARSYILA', '3B', '', '$2y$10$xs0O/y.uzG6oX.waYfZXV.M2QuUSRmVQ2WYS89K1V2U4z88VECI4y', 52, '', '', 'Jl. Suka Karya Perum Taman Mutiara Ii', 'Pekanbaru', '26-02-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(150, '1471094804170003', '@khanaya0804', '3173545606', '', 'KHANAYA ASSYIFATU HAIFA', '3B', '', '$2y$10$BBgTkH/8GVJFpcPkQ7fX9ut/4Rq21TCXeb4/uXoiz6ngtU9f3WSIC', 52, '', '', 'Jl. Tuah Karya', 'Pekanbaru', '08-04-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(151, '1471072803160004', '@m2803', '3162691072', '', 'M DASTHAN MARTIYUS JUNIOR', '3B', '', '$2y$10$tSsuXZWSxy8uHgMa0mEGPuFIQYnnWIbVQQZEz82yKlzDXhnfCTKKe', 52, '', '085310356934', 'Perum. Raisa Sentosa 3 Blok H 10', 'Pekanbaru', '28-03-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(152, '1401030905160002', '@m.0905', '3165026311', '', 'M. DEBRIANSYAH', '3B', '', '$2y$10$0ZTebdhX8wuHZOc3SuTKoealgSZ9Z4usZJC6C4aCXGZpoThR.rznS', 52, '', '082324996156', 'Jl. Suka Karya Perum Laucih', 'Pekanbaru', '09-05-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(153, '1401032910160002', '@mhd.2910', '3162606227', '', 'MHD. KHAIRULLNIKSAH AMAR FIRMANSYAH', '3B', '', '$2y$10$3./JPpmv5Egd8LU5z2yCxulKwORMDBLkXyeMHjnO.WLyi2dDmZrfm', 52, '', '', 'Jalan Suka Karya Perum. Wisma Kualu Blok S. No 9', 'Pekanbaru', '29-10-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(154, '1401032707160004', '@hakim2707', '3163298357', '', 'MUHAMMAD HAKIM AL HAFIZ', '3B', '', '$2y$10$dQ0sm4l427pt8Pq4jt6iEOAI36y.P71xBG4dtXXvQGOc7V3KET06C', 52, '', '', 'Jl. Suka Karya Perum Taman Mutiara Ii D. X', 'Pekanbaru', '27-07-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(155, '1401032810160003', '@subhan2810', '3167086598', '', 'MUHAMMAD SUBHAN ELFINO', '3B', '', '$2y$10$QXnjP3nab9uWI9MN00yF8eGoyAPhYpS47HROzGJ0AVImzyu59nrOG', 52, '', '', 'Jl. Suka Karya Perum Wisma Kualu Blok W. No. 11', 'Pekanbaru', '28-10-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(156, '1401035410140003', '@nayya1410', '3147873208', '', 'NAYYA KHANIFTA', '3B', '', '$2y$10$HjVdx1Uy7d7sd1MiKE3oKuRSIFqGNyAE8hMQz9RiboVoIVvXSNuyy', 52, '', '', 'Jl. Karya Iman Gg Karya Indah', 'Pekanbaru', '14-10-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(157, '1401032001160001', '@nazhirul2001', '3168446978', '', 'NAZHIRUL ASROFI', '3B', '', '$2y$10$DrFgapuKXNH2LAOKnSBqSeInmnx9SUXTCI75EjjXWg4q1ctWgeP1C', 52, '', '', 'Jalan Taman Karya', 'Pekanbaru', '20-01-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(158, '1371045701170002', '@niswatul1701', '3171171215', '', 'NISWATUL KAYRA', '3B', '', '$2y$10$oRpvPNGsKPFY6y09jZhfUOxJxA3VVeCvMUbI6J7a3OuqZPJRg4a8.', 52, '', '081374042255', 'Jln. Taman Karya Perum Permata Bunda Tahap Ii', 'Padang', '17-01-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(159, '1403134912180004', '@rindu0912', '3184059150', '', 'RINDU WILONA', '3B', '', '$2y$10$dOvkppAoI95RdIRZQ8rmme0kRxj6fv7xVEJ3.Id0jBntSDSJ4n6Pa', 52, '', '081322441774', 'Jl. Suka Karya Taraibangun', 'Duri', '09-12-2018', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(160, '1471082203170004', '@rizky2203', '3177320007', '', 'RIZKY NAVIS ALFATTAH', '3B', '', '$2y$10$i4O58AougjP/uLmgmP1OCu8UAzWOZ/SOnudv6RIAZfQSL42QzcDuK', 52, '', '', 'Jl. Lobak Gg. Awal', 'Pekanbaru', '22-03-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(161, '1312046704140001', '@zahira2704', '3143572752', '', 'ZAHIRA LUTFIYA KAYYISA', '3B', '', '$2y$10$IJSTsgbtEo5iIUpnLe73y.MtYdqUpkVQT5bhZiZIp5UPX4JVDa9OG', 52, '', '081371736471', 'Jln. Suka Karya Perum. Taman Mutiara Ii Blok F-7', 'Kajai', '27-04-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(162, '1218031507150001', '@alfin1507', '3159117097', '', 'ALFIN SIHOMBING', '3C', '', '$2y$10$tul2LiEDEYnPFyw/QfUJ3uAIZJsdUL8vkVoTtWljydiQmnzBJkywS', 52, '', '', 'Jl. Suka Karya Perumahan Graha Rawa Bangun', 'Sialang Buah', '15-07-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(163, '3212086610170004', '@anindya2610', '3172114751', '', 'ANINDYA KESYA AN VARISHA', '3C', '', '$2y$10$bX7841vHCZbE7MCbKxwNJ.P09DUrRdXsvQ4GztGW7QheHM7KRPd4.', 52, '', '', 'Jl. Suka Karya Dusun Ii Tarabmandiri', 'Indramayu', '26-10-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(164, '1401031711160004', '@arka1711', '3169468696', '', 'ARKA HABIB MAULANA', '3C', '', '$2y$10$exB8Jv0.RbfDUQwD0GwMy.q86tIudMN7zO58ey7nT4JKrYVvcbLUC', 52, '', '', 'Jl. Suka Karya Perum Wisma Kualu Gg. Cemara Blok D. No. 10', 'Pekanbaru', '17-11-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(165, '1471014906160002', '@aurel0906', '3168624094', '', 'AUREL RAMAYA EFFENDI', '3C', '', '$2y$10$Awu5kA7qeLVjG6Meb1R.mucZ8CRV0tvEAafl7rJ/2CTrswR79Mp4i', 52, '', '', 'Jl. Suka Karya Perum Mutiara Ii Blok D No. 2', 'Pekanbaru', '09-06-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(166, '1401036308160001', '@ayu2308', '3162997597', '', 'AYU HILDA INAYA', '3C', '', '$2y$10$Qo5GU9YaCz8Iqah4HOaer.sJ5bvRemr1gxeQmE/YRfg.7vMY1ggb.', 52, '', '', 'Jalan Taman Karya Perum. Permata Bunda I Blok E No. 12', 'Pekanbaru', '23-08-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(167, '1401031306160005', '@bail1306', '3164347187', '', 'BAIL AZMI', '3C', '', '$2y$10$O6Xnv3kGiwKHX0QyS/Inxe.iWMl/5JkOEiSvW8U7KZZiKSxhKI4bC', 52, '', '', 'Jl. Suka Karya Perum. Karya Abadi', 'Parit Baru', '13-06-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(168, '1304091605160001', '@daffa1605', '3160612886', '', 'DAFFA MUBAROQ', '3C', '', '$2y$10$RoBizlLwz.j1mjkFfORc1e7CMX6fVcY6ADGFv3oyzjLpG5OrPRS0K', 52, '', '081268898401', 'Jl. Suka Karya Perum. Wisma Kualu Blok N. No 7', 'Pekanbaru', '16-05-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(169, '1471054411150001', '@hafshah0411', '3152470314', '', 'HAFSHAH ULFIAH', '3C', '', '$2y$10$vH4PxZccf.jP.By2NxIB4.JZv9BSDYovW5uuKu1wbt9lWNmfunOOq', 52, '', '085265743673', 'Jl. Suka Karya Perum. Taman Mutiara 2 Blok C. No. 18', 'Pekanbaru', '04-11-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(170, '1471021805160001', '@keenan1805', '3168005740', '', 'KEENAN ATHAYA RAMADAN', '3C', '', '$2y$10$uMu9PHJAjvds0GWo5FMEpuuCNOOEtQjGJS70WKmLeamEa4dp1h5t6', 52, '', '082284252847', 'Perumahan Taman Mutiara Blok E 5', 'Pekanbaru', '18-05-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(171, '1401026810160001', '@khayla2810', '3167993613', '', 'KHAYLA ALMIRA MARITZA', '3C', '', '$2y$10$SNmTYCNLTXN/yenJ9ipA3.snFLebGX8rJej/jIKAWkjX2aL0Fd8A6', 52, '', '', 'Jl. Suka Karya Perum. Graha Rawa Bangun Blok P No. 9', 'Pekanbaru', '28-10-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11');
INSERT INTO `users` (`id`, `nik`, `username`, `nisn`, `nip`, `nama`, `kelas`, `email`, `password`, `jabatan_id`, `nama_ortu`, `nomor_hp`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `role_id`, `jadwal_piket_id`, `created_at`, `updated_at`) VALUES
(172, '1471082210160003', '@m.2210', '3166734326', '', 'M. ABDURRAHMAN AL HUDZAIFI', '3C', '', '$2y$10$1dmme0oZI0hIkNHvAlNbgu7oNmdYaObvLhtdAe3w.rUSJT7SmYK0q', 52, '', '081363114511', 'Jl. Suka Karya Perum. Wisma Kualu Permai Blok P-15', 'Pekanbaru', '22-10-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(173, '1471085812160001', '@mahira1812', '3166276774', '', 'Mahira Wayan Ardiningrum', '3C', '', '$2y$10$QImaOe7NrW6wB6H9PS2L2uj19WaTOULvrE/74xsK5ukJWHHMOcKGO', 52, '', '', 'Jl. Masa Karya', 'Pekanbaru', '18-12-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(174, '1471080210160002', '@mufatih0210', '3167373278', '', 'MUFATIH RAFIQ ASSHAUQI', '3C', '', '$2y$10$Xda94u8cSltwTfI2jODTMe25S81G8Tqtkwz4o7nPbC84tMg0kuCr.', 52, '', '', 'Jl. Suka Karya Dusun Ii Tarab Mandiri', 'Pekanbaru', '02-10-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(175, '1401030607160003', '@yusuf0607', '3163536943', '', 'MUHAMAD YUSUF', '3C', '', '$2y$10$VULpBgSC8oli2W.BdNtlM.wRtNzPbBN1gShIiVeQkvS4NHcOKdrP6', 52, '', '', 'Jl. Suka Karya Perum Suka Karya Indah Blok. F No. 14', 'Pekanbaru', '06-07-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(176, '1403100912160002', '@arifin0912', '3161456208', '', 'Muhammad Arifin Surya Putra', '3C', '', '$2y$10$/gwedMvbXhbMkMks8D7agufPb5QPkq/eNIEpvqgQOXwXZAwRfGZiK', 52, '', '081276154144', 'Jl. Suka Karya, Perum Byru Asri Blok D No.13', 'Pekanbaru', '09-12-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(177, '1471082104160005', '@azzam2104', '3164442960', '', 'MUHAMMAD AZZAM LINGGOM', '3C', '', '$2y$10$FMWQuzpadw/9nlPav4WXguHMLGeygSU4egws03X.7j2Wa.IsC94JC', 52, '', '', 'Jl. Masa Karya Perum Raysha Sentosa 3 Blok. F No. 1', 'Kampar', '21-04-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(178, '1401030511160003', '@hayyun0511', '3160949090', '', 'MUHAMMAD HAYYUN SABILIY', '3C', '', '$2y$10$krSfjQgZEQ3Lz/xK26AnleGN8aq2OiostxRax3Kq2sBXPfhbXLD3q', 52, '', '', 'Jl. Suka Karya Perum Taman Mutiara Ii D. 16', 'Pekanbaru', '05-11-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(179, '1401035812160002', '@najwa1812', '3166955877', '', 'NAJWA KHAIRA NASDI', '3C', '', '$2y$10$LByxmBW2mHxwMxkCzrw.r.GQPlu.7QHXwE6bT4exiyOW9UrpqJl.u', 52, '', '', 'Jl. Suka Karya Perum. Karya Abadi', 'Pekanbaru', '18-12-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(180, '1471065111150004', '@olivia1111', '3152856201', '', 'OLIVIA KARTIKA PUTRI', '3C', '', '$2y$10$BV3yG1ZUTKszGKc4l04q9eYK.24uIavNQroko/UnglDEOdrqlNNHi', 52, '', '', 'Jl. Suka Kaeya Perum. Wisma Kualu', 'Pekanbaru', '11-11-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(181, '1471087101170002', '@raisya3101', '3170775465', '', 'RAISYA PUTRI SADIRA', '3C', '', '$2y$10$8Aop5QGzdLccO2hRB8gpouuuvgX7aD6275t0F/rooKAe3hgHvUPRy', 52, '', '', 'Jl. Suka Karya Perum. Wisma Kualu Permai', 'Pekanbaru', '31-01-2017', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(182, '1471080310160006', '@rasya0310', '3161849664', '', 'RASYA ATHAYA PRADIPTA', '3C', '', '$2y$10$J7YBdqeQ.wA.UOdjWOtc9.KZWnbVGnI4EvYRxy74kj3sbYJkCM9tG', 52, '', '', 'Jl. Suka Karya Perum. Wisma Kualu Permai Blok A No. 23', 'Pekanbaru', '03-10-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(183, '1471115307150007', '@rasya1307', '3150698036', '', 'RASYA SYAFITRI', '3C', '', '$2y$10$2QPMy9EwrrPZRX99hTBDreZJTGMWcPeTfkfjRiG.ze4pD6Cwvn8KO', 52, '', '', 'Jl. Suka Karya Perum. Wisma Kualu Blok C No. 10', 'Pekanbaru', '13-07-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(184, '1471085004160004', '@rizka1004', '3161879413', '', 'RIZKA AMALIA', '3C', '', '$2y$10$CroHEVao6vGooRPWtkTg7e9XLRG6HnnUiW5G.xtdJZTe1M.yc7PYO', 52, '', '', 'Jl. Suka Karya Perum. Wisma Kualu Permai Blok T No. 13', 'Pekanbaru', '10-04-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(185, '1471096908160003', '@tasya2908', '3169160904', '', 'TASYA KAMILA', '3C', 'tasyaawisifa@gmail.com', '$2y$10$OELzMxPz8ZWqzTT2bRJaN.bz87EqknHmK7oZJZ3MGlsNO0U8f3Co.', 52, '', '085831630835', 'Jl. Suka Karya Perumahan Nraisa Sentosa 3Blok D No. 3', 'Pekanbaru', '29-08-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(186, '1401100906150004', '@alfiatur0906', '3156575955', '', 'ALFIATUR RAHIM', '4A', '', '$2y$10$gyQd8tyQ3RArxIFVH.l4o.ySOesFp43waPrLSVj43V1ixLP6hfrGm', 52, '', '085374086425', 'Jl. Masa Karya', 'Tapung', '09-06-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(187, '1401032008150008', '@alvian2008', '3159843563', '', 'ALVIAN AKBAR ARDANI', '4A', '', '$2y$10$pwj1oc/yyQc9TSStVzr2nulZel82eRxScN5wdiiG9Nnxi4/lnGdsu', 52, '', '082174434979', 'Perum. Mutiara Darul Sakinah', 'Pekanbaru', '20-08-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(188, '1471134307150001', '@anindira0307', '3151045751', '', 'ANINDIRA RAMADHANI', '4A', '', '$2y$10$.AMKa06B3bnZxd4XkYb1hOcEXn4c70dx1/qRudhs/Dkx.Qp/KjMlu', 52, '', '082361757283', 'Jl. Karya Mandiri 3. No 3. 35', 'Pekanbaru', '03-07-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(189, '1305082509150002', '@arga2509', '3158935862', '', 'ARGA SAPUTRA PRATAMA', '4A', '', '$2y$10$2PdG1FxebuaQ/BLKk0r2jewpyLKsoMa6h6bkB4sLfcWK2tMr1Y7zS', 52, '', '082287423368', 'Perum. Permata Bunda', 'Duku', '25-09-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(190, '1471115806150002', '@aura1806', '3153706855', '', 'AURA RAMADHANA', '4A', '', '$2y$10$C0G/Zm5kpoqar032jexq4OufuCq0TYEoB4iLGXvh2zh6OWx2ZKFtO', 52, '', '082174447797', 'Jl. Masa Karya', 'Pekanbaru', '18-06-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(191, '1306065008140002', '@azzahra1008', '3146586556', '', 'AZZAHRA FITRI', '4A', '', '$2y$10$le4DBZ4rNXbAVM.Y4tqCJepCj0whQNXzc6S58Zt./Qq4.MPA1xqMy', 52, '', '082285509009', 'Perum. Graha Rawa Bangun Blok K No. 2', 'Pekanbaru', '10-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(192, '1471086404160001', '@bilqis2404', '3161669273', '', 'BILQIS NAURAH ZILNI', '4A', '', '$2y$10$OijJq1K4XPAE4YfNEuFko.TA6K9ENmU1uWj1FEzbs.uaSjP7WpmBO', 52, '', '085312495933', 'Perum. Graha Rawa Bangun Blok V No. 4', 'Pekanbaru', '24-04-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(193, '1401035305130003', '@dina1305', '3137688547', '', 'DINA MARIANA', '4A', '', '$2y$10$Ovk0eK0yGDpZNtkkCX5cU.niGckx262jJFv7nggdcpBJzMNDeWYo6', 52, '', '082173597984', 'Jl. Masa Karya', 'Pekanbaru', '13-05-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(194, '1471093108150003', '@fikri3108', '3153340539', '', 'FIKRI ALFAJRI', '4A', '', '$2y$10$J8tRp0usNqfCD59Bc2Rz2O7ua3AfJh99tdCdFP6WFap6pEY/7CnpS', 52, '', '085263202847', 'Jl.Massa Karya', 'Pekanbaru', '31-08-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(195, '1471100512140007', '@galih0512', '3145337957', '', 'GALIH SAADRI FA\'IS', '4A', '', '$2y$10$fU9jiljPu7UVKbIDX0CwxubaO5pas/6X75vkEI7GQlV1R3UaFKijy', 52, '', '081268957945', 'Jl. Lintas Kubang Perum. Gaza Al Hadi', 'Tiku', '05-12-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(196, '1471116704150001', '@hanifa2704', '3155824544', '', 'HANIFA SOLEHA', '4A', '', '$2y$10$TbzAxEOT9Luu/3Fl8U0JQ.DN6oLSr/4aOvLUbCbgaYR87D4D3fH2q', 52, '', '082285757932', 'Jln. Taman Karya Perum. Alamanda Ii Blok C-5', 'Pekanbaru', '27-04-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(197, '1471135808140001', '@izani1808', '3145805674', '', 'IZANI MAGHFIROH PUTRI', '4A', '', '$2y$10$OW4cl0sjH/wX8L/kDSsA3O9jh1TByn1YQ20AT15zd0MVBh3qodsIi', 52, '', '082361757283', 'Jl. Suka Karya No. 01', 'Pekanbaru', '18-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(198, '1471020308150002', '@kelvin0308', '3152742820', '', 'KELVIN GUSLIANO', '4A', '', '$2y$10$WgszXPLAB2VKVPaIN6nBl.6xT1L19gCENzb1/QZOqVHLvU2mQsRPq', 52, '', '081261220207', 'Jl. Suka Karya Perum. Wisma Kualu', 'Pekanbaru', '03-08-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(199, '1401030403150003', '@kenziro0403', '3150254829', '', 'KENZIRO LA ABRAR', '4A', '', '$2y$10$uGyR8dMN0Qm4r1VaVbiRb.7et0oQTg.Dq5AdDVjm7OUt9ui4nwJGK', 52, '', '081267090005', 'Jl. Suka Karya', 'Pekanbaru', '04-03-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(200, '1471080503150006', '@marcellino0503', '3151128482', '', 'MARCELLINO SYAHPUTRA', '4A', '', '$2y$10$eZE47L2UIWl1O.O0SPiHKOMs7keUkNiJuFCiB1ZmJiJ/1GRq4LNvy', 52, '', '081364402249', 'Perum. Karya Abadi Blok B2', 'Pekanbaru', '05-03-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(201, '1471083103150009', '@rafa3103', '3151659812', '', 'MUHAMMAD RAFA AL HAKIM', '4A', '', '$2y$10$pPMwSwe9vagIxxkbeMA.7Ok.pg79a0ErkFKvB2TcRsrER.2GwtU.W', 52, '', '085463134364', 'Jl. Suka Karya', 'Pekanbaru', '31-03-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(202, '1306071109150001', '@rafiq1109', '3154474306', '', 'MUHAMMAD RAFIQ', '4A', '', '$2y$10$PSmAfo.k1mHhSZI6gFpshuJFJT06yQGFp7WmxIZuWfBlxQWUxaEZO', 52, '', '', 'Jl. Karya Mandiri I', 'Lurah', '11-09-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(203, '1471085510150003', '@mutia1510', '3156545042', '', 'MUTIA KHUMAERAH', '4A', '', '$2y$10$emUMsSHiQWpKlDVvVpeW7e/i6yrhvpa9OcgyDTXgskW.glu4noXP2', 52, '', '0895320325747', 'Perum. Wisma Kualu Permai Blok X No. 4', 'Rantau Berangin', '15-10-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(204, '1401036312150002', '@navia2312', '3152905610', '', 'NAVIA KANZA WIRANDI', '4A', '', '$2y$10$Gx/Ms6IdTL/Ky5EKovym5.tXyGteQFhmmf1g3S99Jwwsav/83vlki', 52, '', '082283173053', 'Jl. Masa Karya', 'Ampang Gadang', '23-12-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(205, '1471081906150001', '@ramadhan1906', '3156070792', '', 'RAMADHAN ALFIYAN', '4A', '', '$2y$10$xzBZJ4rVHkKrGqAViQbc4OAqim7z7.qmQziNbAniQNcv3ws4WdYSO', 52, '', '082171231178', 'Perum. Karya Abadi', 'Pekanbaru', '19-06-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(206, '1471082208140002', '@rizky2208', '3143820395', '', 'RIZKY NUR CHOLIS', '4A', '', '$2y$10$BWzs/u54NPTeZpxbkGO0mOfJNykoscVeV9sl3iiOYvN8P6apF8A/6', 52, '', '081371043902', 'Jln. Suka Karya Perum. Wisma Kualu', 'Pekanbaru', '22-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(207, '1471104312150003', '@selfy0312', '3153782891', '', 'SELFY DESMITA PUTRI', '4A', '', '$2y$10$bZhIV93x3HglMiQUcJXLy.kxEJqPbkVtx6lNDKZq32FqKbEg3/rGy', 52, '', '082399542325', 'Perum. Graha Rawa Bangun', 'Pekanbaru', '03-12-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(208, '1218046707150002', '@siti2707', '3159021894', '', 'SITI KHADIJAH', '4A', '', '$2y$10$q6QEI2UPOHpaYf8kh5TB..bWHFaPrw2X6g5.1Uid5s5GnpSDY3E/e', 52, '', '', 'Perum. Graha Rawa Bangun', 'Firdaus', '27-07-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(209, '1471085811150002', '@tiara1811', '3156632990', '', 'TIARA RAHMADANI', '4A', '', '$2y$10$STLkxuVdsfmHjUHQMOspYuOy683Sr/3KlIRacqycjVX9jVVOOIeUG', 52, '', '081225392641', 'Jl. Suka Karya Blok F No. 6', 'Pekanbaru', '18-11-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(210, '1201035009150003', '@ulfa1009', '3157678141', '', 'ULFA KHAIRUNNISA HAREFA', '4A', '', '$2y$10$95t/mO9IZxhYhOMoSrtCFOUnY0c85B.F2g885EgYwqOvTR.EtKeiq', 52, '', '', 'Jln. Suka Karya Perumahan Wisma Kualu Blok Ac-11', 'Muara Nibung', '10-09-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(211, '1401034705160003', '@zhelyn0705', '3168090095', '', 'ZHELYN MEYSA NAUFALINA', '4A', '', '$2y$10$lSGbhUJr/BvcJQSYb2w1kuTwHljMnxsIdYp7PV2p6xNOgeqwp.TKm', 52, '', '081298576931', 'Perum. Karya Abadi', 'Pekanbaru', '07-05-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(212, '1401031708150007', '@ammar1708', '3152275615', '', 'AMMAR RISKI', '4B', '', '$2y$10$bObdpTuhCnAOugGVwt8KtO2IDYzhOXusj/1WZGKsn3BTVAYxG6W8G', 52, '', '0895328304152', 'Perum. Graha Rawa Bangun Permai I No. 11', 'Pekanbaru', '17-08-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(213, '1471084709150005', '@angelina0709', '3158372287', '', 'ANGELINA PRATIWI BR MANALU', '4B', '', '$2y$10$bbaN8B.zFGujjGSJglhEzOe0fLkSRQzHKOy9IzW0e7vSrkrZI9YcS', 52, '', '082382269455', 'Perum. Puri Indah Kualu', 'Tapung Hilir Kampar', '07-09-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(214, '1471086807150008', '@anindita2807', '3155768343', '', 'ANINDITA ARSYFA', '4B', '', '$2y$10$ZqSYghUlUefysTRSRLqqSuGh34v6vsyJUCR/m7zkGQ9lGjVPxc.rq', 52, '', '081364219110', 'Jl.Suka Karya Perum. Wisma Kualu', 'Pekanbaru', '28-07-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(215, '1471085603160003', '@aqila1603', '3166300068', '', 'AQILA PUTRI', '4B', '', '$2y$10$iPus0Eg2iVXCOvuBwCz19OclLYDaZuXor3i8ZkWL8a3S0KgPWSetS', 52, '', '085271551278', 'Jl. Karya Tani', 'Pekanbaru', '16-03-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(216, '1471084212140002', '@aqilah0212', '3141861560', '', 'AQILAH SAZAJA THALITA AHMAD', '4B', '', '$2y$10$FShGCmeBEDn.9ZvCWNTnheMOkgLbdOb2eRsYCN4Avf3waigtNqWre', 52, '', '081275226121', 'Jl. Suka Karya Gg. Azuri', 'Pekanbaru', '02-12-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(217, '1401035207130002', '@asyifa1207', '3138834659', '', 'ASYIFA PUTRI RAMADHANI', '4B', '', '$2y$10$4/QrTDiYDa3MR0n7Znz.4ug.QCPRuWKwctI4oNz3MsEH2DrGgeyFC', 52, '', '0895328303760', 'Arafah No. 28', 'Pekanbaru', '12-07-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(218, '1471066811110004', '@aurel2811', '3127508638', '', 'AUREL AULIA NURSAFITRI', '4B', '', '$2y$10$ixzy.QZyk9THpy5MavNd7.wT.u0SOOvGazJrCeaK4ldgPA8/anl3G', 52, '', '0895328303761', 'Perum. Wisma Kualu Permai Blok L No. 16', 'Pekanbaru', '28-11-2011', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(219, '1471106208160002', '@azra2208', '', '', 'AZRA DZAKIYAH NURJANNAH', '4B', '', '$2y$10$0xdzdkVxAOBVZzm7Dw5qEO1YxPcdfcjaBa7KwRBZbvEjc9lI.Dyey', 52, '', '08127665786', 'Perum. Kampung Dalam Lestari Blok Hh. 4', 'Pekanbaru', '22-08-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(220, '1401191410150002', '@bhanett1410', '3155510008', '', 'BHANETT GIEBRAN WIE DARKO', '4B', '', '$2y$10$zqMOr9n4uF4W0J1.ZyyoKO9SFg89Y0127dYyHg2kuJue8gMmWGj/.', 52, '', '085762614522', 'Perum. Maysha Sentosa 3 Blok A.4', 'Pekanbaru', '14-10-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(221, '3204282407140009', '@doni2407', '3145490555', '', 'Doni Nuri Rohendi', '4B', '', '$2y$10$frdFMufeJKja7C21hOOHpex0tjyv0ueqBvuGcSixkDO0yUx/4Af7q', 52, '', '085263933522', 'Perum Darul Saninah', 'Bandung', '24-07-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(222, '1471092211150001', '@farel2211', '3155538161', '', 'FAREL ALGAZALI RIZAL', '4B', '', '$2y$10$i6AhplCxsI88Y.mNuczgD.YKUTciotD/W8zuXxNkRfNQne2H5z/v.', 52, '', '082388073860', 'Perum. Raysha 3 Blok B.5', 'Pekanbaru', '22-11-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(223, '1401032504140005', '@faturahman2504', '3143303812', '', 'FATURAHMAN ZAKI', '4B', '', '$2y$10$YFZMbWZQbatrN.o1hrnhhuMXhI5NnypQ1CuatD8/GU5FJ2MJNsceW', 52, '', '081276573929', 'Jln.Perum Wisma Kualu', 'Pekanbaru', '25-04-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(224, '1401032009120003', '@halfa2009', '3127664478', '', 'HALFA UTAMI SAPUTRA', '4B', '', '$2y$10$847TtaWeCv6huKuH9g7fzeWvIZIsVwzrZ0MohYTKfPYNvXnWST/V2', 52, '', '0895328303832', 'Jl Masa Karya', 'Taraibangun', '20-09-2012', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(225, '1471050907150001', '@hamka0907', '3157370572', '', 'HAMKA RAMADHAN', '4B', '', '$2y$10$g3qh1qv2SzpYeetEUG/23u.YHwzO1CFqwSdO0xxIvMZHwsQknSu3e', 52, '', '083801470566', 'Jl. Suka Karya', 'Pekanbaru', '09-07-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(226, '3212080608150002', '@ibra0608', '3153085741', '', 'IBRA ROFIF AN NABIL', '4B', '', '$2y$10$E4Cr5yPFKR.pz13Zr7vKIOh5vNHqCXByBtagrUpUDAunUWJBDX5wC', 52, '', '089661092967', 'Jl. Suka Karya Perum. Malay Asri 2', 'Indramayu', '06-08-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(227, '1471095210150001', '@jihan1210', '3152762337', '', 'JIHAN AMANDA OKTAVIA', '4B', '', '$2y$10$0eR/KtbNCtXhatwsw3QcQO04J0FONBj.J0r8qJ5jrLOjxyo4G3awS', 52, '', '085265223148', 'Perum. Mawaddah 3Blok S.17', 'Pekanbaru', '12-10-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(228, '1401032109150008', '@m.2109', '3150245957', '', 'M. ARFTA SANDY SATRIA', '4B', '', '$2y$10$0Z5TYBTp2iQvT22PARAPJeKV1FNxZQ4uZgU5brLs/UBn1GjWSggA.', 52, '', '081277330396', 'Jl. Masa Karya Ii', 'Kampar', '21-09-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(229, '1308050502160002', '@febrian0502', '3165628910', '', 'MUHAMMAD FEBRIAN', '4B', '', '$2y$10$hwhJFWcFKb3ETnsCfAWL4u.7aL8B7ZhIWWy6PFLnXGq.KbMmu0HiC', 52, '', '', 'Jl. Suka Karya', 'Induring', '05-02-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(230, '1471082102160003', '@ihsan2102', '3164817557', '', 'MUHAMMAD IHSAN', '4B', '', '$2y$10$miL.1mburB67S9fjhgvqLesP.2QUd/0qAUK9xACrFHh7VJGLm3FAy', 52, '', '085374082721', 'Jl. Suka Karya', 'Pekanbaru', '21-02-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(231, '1401032807150002', '@yusuf2807', '3154784660', '', 'MUHAMMAD YUSUF MIRZA', '4B', '', '$2y$10$Lv.Ae3./k2IsMwyUSqQp7uw.nDNQ1wggPEIQBJDB31XEq33B0qTma', 52, '', '085382449404', 'Perum. Wisma Kualu Permai', 'Pekanbaru', '28-07-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(232, '1401037009150004', '@nazla3009', '3156467674', '', 'NAZLA KURIAMAN', '4B', '', '$2y$10$I8DY8wTmehTj9N1GvqGlyuEd57EoQ1vkIdXBz4MNilesH4TdHuUsi', 52, '', '082173800759', 'Perum. Karya Abadi', 'Pekanbaru', '30-09-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(233, '1401182611150001', '@nizra2611', '3155880776', '', 'NIZRA SHAKILA', '4B', '', '$2y$10$ckRigfn5zFRsEgk3CuHEdOHCnRK3C9MuXrJl7GXgciQRB4/FiAWaC', 52, '', '08995693186', 'Wisma Kualu', 'Balai Jering', '26-11-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(234, '1502025709130001', '@queenaya1709', '3131869046', '', 'QUEENAYA SOFIA ANGELA', '4B', '', '$2y$10$yPlNPDIHqVyOu78c4GwNUOVCDsy3tlqDf0dNRNUcjZ0jIzzQUeCB.', 52, '', '081364207751', 'Perum. Karya Abadi Desa Taraibangun', 'Bangko', '17-09-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(235, '1471090609150004', '@rafi0609', '3156700415', '', 'RAFI ANGGARA DWITAMA', '4B', '', '$2y$10$DpnjebR6QVOqaQM6ZCXDpOfyM1KHrwDMXZK.pYc0sSXYfhukR7/jC', 52, '', '085376746062', 'Karya Bersama', 'Pekanbaru', '06-09-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(236, '1471130909140001', '@regi0909', '3146031607', '', 'REGI SYAHPUTRA', '4B', '', '$2y$10$fiLcCYG1yCHaaACau5O1Pe0YPkSGJs9s8giJobMzMggktAdsqrh6S', 52, '', '083164939186', 'Jl. Suka Karya Perum. Wisma Kualu Blok F 13', 'Pekanbaru', '09-09-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(237, '1471080311150007', '@utsman0311', '3154944630', '', 'UTSMAN AZHARI', '4B', '', '$2y$10$EN1vIc8c3J2KhU./w/vBQ.eMUzLb/NR5Czsm8gXWLJX73MgpXS8Ja', 52, '', '082387731788', 'Jl. Suka Karya Perum. Graha Rawa Bangun Blok K. 13', 'Pekanbaru', '03-11-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(238, '1471080109150004', '@zikra0109', '3151064569', '', 'ZIKRA ELYUNUS', '4B', '', '$2y$10$99etH9e5PkY2ggB7H51ECuDxJI28TSTBP4dL.DXT/Mku/M2pXYe6e', 52, '', '089661010400', 'Jl. Cipta Karya', 'Pekanbaru', '01-09-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(239, '1305091303150001', '@adam1303', '0151267908', '', 'ADAM AL FARISY', '4C', '', '$2y$10$Q2FEaxNckasXONWSgo2qOu/Ps5VyvMTvb0XAdCXfe.AQ/CnHGJm2K', 52, '', '', 'Jl. Suka Karya', 'Batu Basa', '13-03-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(240, '1471025410150002', '@adinda1410', '3150003859', '', 'ADINDA BERLIANA', '4C', '', '$2y$10$hi1/yC7pwbLiY3I7ypiSiePEBIkUGxuwva1P6kXjF3pj77ym5Pao2', 52, '', '', 'Jl. Suka Karya Perum. Asta Karya 3 Blok E3', 'Pekanbaru', '14-10-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(241, '1471085210150008', '@aulia1210', '3158145603', '', 'AULIA ZIDNI ANDRIAS', '4C', '', '$2y$10$SJ4OyLk/Cz./iG/8arf80ue5L/r2RimQFokPrB.7s2bhpmu8LBNG2', 52, '', '', 'Taman Mutiara Ii', 'Pekanbaru', '12-10-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(242, '1407024804160004', '@azzahra0804', '3161319575', '', 'AZZAHRA KHILAFAH ASSAJDAH', '4C', 'im.muslim1984@gmail.com', '$2y$10$EGCfoZJkQUn8Ry51WNkpUuHP8Cd70w3nR5jw/pOMpC.9Vb1sXHJX2', 52, '', '085278108095', 'Perum. Taman Mutiara Ii Blok F', 'Tanjung Balai Karimun', '08-04-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(243, '1401030410150001', '@bastian0410', '3152771738', '', 'BASTIAN RAMADHAN NAINGGOLAN', '4C', '', '$2y$10$hGY5Q3JdGNBmgZIrJWy4SO9DNj1Vh8DvdsdRSJtmXEFmbMFYvD5PK', 52, '', '081276083507', 'Dusun Ii Tarab Mandiri', 'Tarai Bangun', '04-10-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(244, '1471085605140005', '@christine1605', '3147474453', '', 'Christine Immanuel Lawrence', '4C', '', '$2y$10$3RGD1KJPJ0RUjIm/xFv6o.0FYL2wi71r98CI.s95lyuK32vQXJIsO', 52, '', '085264329953', 'Jln. Masa Karya Gg. Karya Makmur', 'Pekanbaru', '16-05-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(245, '1471086106150005', '@ditha2106', '3159972072', '', 'DITHA AWALIA RAMADANI', '4C', '', '$2y$10$amGFVHnLysQD536IWu0KouALNdgwVF1sj44rIrZSUiitt1w8dvHNq', 52, '', '', 'Jl. Taman Karya/Alamanda', 'Pekanbaru', '21-06-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(246, '1471031112150002', '@ikbal1112', '3156361329', '', 'IKBAL RIVALDO', '4C', '', '$2y$10$rZXLi3bBUgdaLpRJedXjYOoCEe50R.PZfhtjw4beavy5fk.GTCWYG', 52, '', '082384766658', 'Jl. Suka Karya', 'Pekanbaru', '11-12-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(247, '1471056911150001', '@jennaira2911', '3151731415', '', 'JENNAIRA MAYSUN FEBRIANDI', '4C', '', '$2y$10$es5eoBVsWse6Qs81w2fD6eJOIar52D9Lh0oaTARHLku/uB6SRTrBy', 52, '', '085376746067', 'Perum. Raisya Sentosa 3 Blok C No. 3', 'Pekanbaru', '29-11-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(248, '1305095701150001', '@karmila1701', '3152778093', '', 'KARMILA IKA PUTRY CHANIA', '4C', '', '$2y$10$XtzjnRhO/9IKIvk4U06uPeop/4nB/tbVStaAoUnMW5DSuudRBRTv.', 52, '', '085274010736', 'Perumahan Karya Abadi', 'Malaysia', '17-01-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(249, '1471080309150003', '@krishna0309', '3159909749', '', 'KRISHNA AL FATIH NUGRAHA', '4C', '', '$2y$10$GH8wD7fw.fBAmbKU30WWOuwqz8TW5as0xc/.zw.lnKnbGz/.IImcy', 52, '', '085264393073', 'Perum.Raysa Sentosa 3Blok H.9', 'Pekanbaru', '03-09-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(250, '1401030111150001', '@\'abdur0111', '3155458191', '', 'MUHAMMAD \'ABDUR ROZZAQ', '4C', '', '$2y$10$CCMdGvWNCSWx0dJYkkmZdOz8RXpNdnjI3raukV/nhAK.Pwk9Q.4ci', 52, '', '083167490613', 'Perum. Karya Abadi Blok F.10', 'Pekanbaru', '01-11-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(251, '1271041707150002', '@aidil1707', '3153200187', '', 'MUHAMMAD AIDIL', '4C', '', '$2y$10$lAfcD5WX7vy8fOis5S9s6.pfm5BftxK0Se1o2xDIzl1bbHZlbUdre', 52, '', '081350668535', 'Jl. Masa Karya', 'Medan', '17-07-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(252, '1471081705160009', '@arsya1705', '3161337899', '', 'MUHAMMAD ARSYA ALZIKRI', '4C', '', '$2y$10$IKuaYZhicQOIAiYJiy3gf.KBluQDC7RWw4fUDVWsnH6nt5JRT44/O', 52, '', '082389796265', 'Wisma Kualu', 'Pekanbaru', '17-05-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(253, '1471080409150002', '@rifqi0409', '3155886779', '', 'MUHAMMAD RIFQI AL HABSYI', '4C', '', '$2y$10$9Vxwa4AvJ5rWQE2cEasZiO8nPFY5rX2fe7bdZjIiUq9GTdt1.LGmq', 52, '', '081371294636', 'Jl. Masa Karya', 'Pekanbaru', '04-09-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(254, '1401035410150002', '@naziha1410', '3157808454', '', 'NAZIHA SYAFNIA MUHARA', '4C', '', '$2y$10$23Q6peuc.lhHIjy8lOx9v.aJUchVXk8vccAe8UJM8rQ.hm54P1VWi', 52, '', '082285228925', 'Jl. Wisma Kualu', 'Pekanbaru', '14-10-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(255, '1471084812150001', '@nur0812', '3150901261', '', 'NUR RAHIMAH DESVI AZKADINA', '4C', '', '$2y$10$Daymd4JbQLxZ0PQGiHNTW.SYwicITfY2erLO4r58eJJ2K1rYch52i', 52, '', '081275196038', 'Wisma Kualu Permai', 'Pekanbaru', '08-12-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(256, '1401104803160002', '@ratifa0803', '3168327288', '', 'Ratifa Misha Shafana', '4C', '', '$2y$10$QBtO6Wcw439I8mjnargLgOdzHCpXVO1BHSXZU4BTyQL6jzLfzV.ie', 52, '', '085264489849', 'Jl. Garuda Sakti Km.12', 'Pekanbaru', '08-03-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(257, '1471096610150004', '@raudhatul2610', '3150958996', '', 'RAUDHATUL HUMAYROH', '4C', '', '$2y$10$avrXXNY4npKN8Xd/th5yMecjHzSd0tOVWUYVof/Eaot9Z6mS0kuFi', 52, '', '088270959580', 'Jl. Arafah Perumahan Pesona Arafah Taman Karya', 'Pekanbaru', '26-10-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(258, '1471087004150004', '@rere3004', '3155374595', '', 'RERE ALIFAH', '4C', '', '$2y$10$JXNj9tI/q4Ihhf.XOf0rjur87/F1K4Squg6o6xvYjFuxY3VDUwD0S', 52, '', '081298565745', 'Jln. Suka Karya Perum Wisma Kualu Permai', 'Pekanbaru', '30-04-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(259, '1471024411150002', '@salsabila0411', '3150969655', '', 'SALSABILA AHIMSA ARDHANI', '4C', '', '$2y$10$YdrV8ySxT1zi32RzUBxZ4uBUB0T4lAPoB72C.r0lwfP/VVMAGsVdS', 52, '', '081266954487', 'Perumahan Wisma Kualu', 'Pekanbaru', '04-11-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(260, '1401106004150002', '@siti2004', '3159695272', '', 'SITI HAWA KAYLA UTAMI', '4C', '', '$2y$10$iqXl9Mks7z3tsFNhqanmTOwm7sqhROyPXjWWmVwaxdW71fkKZEMgW', 52, '', '082287306464', 'Per. Bsd. Rumah Petak 4 Ocu', 'Pekanbaru', '20-04-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(261, '1401034301150002', '@tamara0301', '3156883095', '', 'TAMARA FLARIA', '4C', '', '$2y$10$KafzI2QPihPZfcKldmemVOQGBikaKOgIfGf58VaQ6EZ0ufYD2E34C', 52, '', '083182005003', 'Jln. Masa Karya', 'Mulyaguna', '03-01-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(262, '1401030906150004', '@zacki0906', '3150799794', '', 'ZACKI MIRZA', '4C', '', '$2y$10$IJL1TT1ydTYxccF3ZaDJI./e8EuA3WwWzsa/2FKwPSjJDdnbshFra', 52, '', '085374929978', 'Jl. Masa Karya', 'Pekanbaru', '09-06-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(263, '1471080705160001', '@zlatan0705', '3161494042', '', 'ZLATAN ALFATIH SYAH AMIN GINTING', '4C', '', '$2y$10$upY6xc4Kkym.yp6x9AopAe5y628xYOpLHgNkSZPPQBV/iys7h4CVu', 52, '', '082376747294', 'Perum. Permata Kualu Indah', 'Pekanbaru', '07-05-2016', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(264, '1471011901150001', '@abdul1901', '3156431485', '', 'ABDUL RASYID', '5A', '', '$2y$10$Slrrwws0nw7v0NFILfGlp.EzYZzURz9Em5lpZGWWBL/QkyaERUAQ2', 52, '', '082284108356', 'Jln. Masa Karya Ii Rt 02 Rw 02 Desa Tarai Bangun', 'Pekanbaru', '19-01-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(265, '1471090108140003', '@abiyu0108', '3146376106', '', 'ABIYU ZAYAN AKTAM', '5A', 'DARAMUSTIKA47@GMAIL.COM', '$2y$10$kqNXdt535bnaHOjewd2KCuRYj35cO8kfI.hsJEZBGqnZd2HC2cBce', 52, '', '081371423037', 'Perum. Taman Mutiara Ii', 'Pekanbaru', '01-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(266, '1305075808140001', '@adelin1808', '3145465660', '', 'ADELIN NESYA AGUSTIN', '5A', '', '$2y$10$9QPylo6X6feVXCXQ3lIQwuKo9IJ4e6SulblDiqRr89AHMi7e/S13e', 52, '', '081276144520', 'Jln. Suka Karya', 'Sungai Geringging', '18-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(267, '1408034504130001', '@afiza0504', '0134668720', '', 'AFIZA', '5A', '', '$2y$10$m1XFGRXATQuWJrYhul0JPORGHFZXmNOdNc/enyKjFS2FtYmadFs96', 52, '', '083186982757', 'Jln. Masa Karya Gg. Durian', 'Minas', '05-04-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(268, '1408024308140002', '@aqila0308', '3144390896', '', 'AQILA AMELIA', '5A', '', '$2y$10$CVuWu0F66TIe2Gtpr5fAcOCAoXadhqdIVT6bxWZJgw19rAwfs5D.O', 52, '', '081270471415', 'Jln. Suka Karya', 'Pekanbaru', '03-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(269, '1401033008140003', '@arka3008', '3145927036', '', 'ARKA BAGAS SATRIO', '5A', '', '$2y$10$p6XTm7FkKyjMD.6Z/ghCXOzoXGIPIZDRJdwCpf0CEDPH6AaiFXc5m', 52, '', '085355136951', 'Jln. Masa Karya', 'Pekanbaru', '30-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(270, '1401036311140002', '@balqis2311', '3147925812', '', 'BALQIS AULIA ZHEHIRA', '5A', '', '$2y$10$bE3ihPqayFjf7d9ILSYM6uSVCZq6cJpsWwsaq.txZAzEI7UNYgP46', 52, '', '081298576931', 'Jln. Suka Karya', 'Pekanbaru', '23-11-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(271, '1305080312140001', '@edho0312', '3141158174', '', 'EDHO PRAYOGA', '5A', '', '$2y$10$MXb8InzD6PcNiehfWtWUnOspSOIi5.pVXkngySkbfPk6yYnRk5cKi', 52, '', '0895328303682', 'Perum Mutiara Kualu', 'Sungai Sirah', '03-12-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(272, '1175010511140001', '@juandi0511', '3143144193', '', 'JUANDI HERI', '5A', '', '$2y$10$y.kIX/y1tOvCMalpjDogKOEeD/NUW/BM2DxhKNpenUb2vuBoOuWHC', 52, '', '085211203672', 'Jln. Suka Karya Perum. Grb', 'Buluh Dori', '05-11-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(273, '1404015901150002', '@lesta1901', '3150292146', '', 'LESTA WIMALDA', '5A', '', '$2y$10$b7M873Vkw1gYKAFAlVxKKOkOdoFTObOug5YbThepCiqM94fiMxiqi', 52, '', '082384446619', 'Jln. Suka Karya', 'Pulau Kijang', '19-01-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(274, '1304030308140001', '@luthfie0308', '3149798280', '', 'LUTHFIE SAKHI ZAIDAN', '5A', '', '$2y$10$eH2wTm9YeUiGfoC9iaG.ieyBiuuKwF1YTQdPbMc4eV/rYlUd0wt3u', 52, '', '085271554090', 'Jln. Suka Karya Perum. Raisa Sentosa 3 Blok A-7', 'Pekanbaru', '03-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(275, '1471081201150007', '@mhd.1201', '3156850573', '', 'MHD. ZIDAN ARBIZAM BAHRI', '5A', '', '$2y$10$dzkc68ZZnsvb5VJjN.ACu.HxrWkqT2LDT9KDTJpjrO6NBdG6uEmeG', 52, '', '082381892210', 'Jln. Karya Abadi Perum. Karya Abadi Blok A-4', 'Pekanbaru', '12-01-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(276, '1401032406130003', '@firdaus2406', '3133014098', '', 'MUHAMMAD FIRDAUS FIRMANSYAH', '5A', '', '$2y$10$8Ds/asCPjYzZvg3N8cjhwOHVDzhtopAMgrNrtiA6O/ALRMQcX7YhO', 52, '', '0895328303707', 'Perum. Wisma Kualu Blok. S 9', 'Pekanbaru', '24-06-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(277, '1471080110140008', '@ismail0110', '3140534792', '', 'MUHAMMAD ISMAIL AL RASYID', '5A', '', '$2y$10$V2WkryxxiQUqsjdQPEkRC.t7Js5DvCgA3Km1XVMxe2YfP4aKTLrHS', 52, '', '082371460169', 'Jln. Karya Mandiri I', 'Pekanbaru', '01-10-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(278, '1302063101140004', '@revan3101', '3146088195', '', 'MUHAMMAD REVAN', '5A', '', '$2y$10$WeGf.QrL2Rn3W4UrfAmcSOcePWFIQYwPX.pkpSfohCqPsLu3eKT6y', 52, '', '', 'Sungai Aro', 'Solok', '31-01-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(279, '1401034612130004', '@nafisha0612', '3138427697', '', 'NAFISHA NURJANAH', '5A', '', '$2y$10$yzL0Ix1thKL49bpNXY6gledaXzgJEVj31Cz4weIc1hQwBT.nrqNmC', 52, '', '081319513396', 'Jln. Suka Karya Perum. Wisma Kualu', 'Tarai Bangun', '06-12-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(280, '1471101812100004', '@raffi1812', '0101377407', '', 'RAFFI ERDIAN PUTRA', '5A', '', '$2y$10$CWrrcNeQZyorgwWXwhluQumehUaWJyZ2u7NNJz6vc.nmkg2622BU2', 52, '', '088279787912', 'Massa Karya', 'Pekanbaru', '18-12-2010', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(281, '1401032708140001', '@rafi2708', '3147844686', '', 'RAFI ARDIANSYAH', '5A', '', '$2y$10$4klPiIoIwbjSfpRcr.plfO2ANQny4wvL3a7wnfT8XcScGDOvegVCO', 52, '', '081363563381', 'Jln. Suka Karya Dusun Iii', 'Pekanbaru', '27-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(282, '1401032210120006', '@raka2210', '3125402120', '', 'RAKA WAHYU PRATAMA', '5A', '', '$2y$10$ftFysjpF7ZDKHGe0egv44u.x1t.O0z7lqjC2VrdFAypykqjP3Qqq6', 52, '', '0895328303859', 'Jl. Masa Karya', 'Taraibangun', '22-10-2012', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(283, '1271092312120001', '@yazid2312', '0153110103', '', 'YAZID FADHLURRAHMAN', '5A', '', '$2y$10$1fdKdAY9NxsTmCZt.5h0H.nLMbCiULDCJAqEkKMtj9RHZMuC0O9ze', 52, '', '081281879647', 'Jln. Suka Karya Perum. Wisma Kualu Blok F-10', 'Medan', '23-12-2012', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(284, '1471086105130007', '@zakira2105', '3133119805', '', 'ZAKIRA NOVITA PUTRI', '5A', '', '$2y$10$SFi.eyXbF4.onl0atw6KtudwU8AFVEQvkpryf.txrs5F8vMb4Mb9W', 52, '', '0895328303868', 'Wisma Kualu Permai Blok A No. 24', 'Pekanbaru', '21-05-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(285, '1471082201150003', '@affan2201', '3152310469', '', 'AFFAN RIZKI MUBARAK', '5B', '', '$2y$10$wF5rHlzl/IBLQK0JCrK4FeuvTwnqWNABtJ6P446vgEnP6yuIJwE5i', 52, '', '085264648793', 'Jln.Suka Karya Prum Wisma Kualu', 'Pekanbaru', '22-01-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(286, '1220073101150001', '@ahmad3101', '3154508064', '', 'AHMAD KHOIRUL AZAM HARAHAP', '5B', '', '$2y$10$ybXuUpVEBfobtFr8QkFC5OZAKswm3z155z0HaOeBIe.oCPR/Vtldq', 52, '', '', 'Jln.Suka Karya', 'Pekanbaru', '31-01-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(287, '1401036001150002', '@aisyah2001', '3153371533', '', 'AISYAH FIRMAN', '5B', '', '$2y$10$l2LIcfau6DN/qqiA74Ukk.zMGL9dDKj9R1uSDpoGdUR8ESFNrVOIW', 52, '', '085263063946', 'Jln. Suka Karya Perum Wisma Kualu', 'Pekanbaru', '20-01-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(288, '1408070803150001', '@aldi0803', '3153053083', '', 'Aldi Mahendra', '5B', '', '$2y$10$mmxu8kQkFOk97yRK/UXEPuKSb6mscSnGnIMNnzRauhYuAIOwseh0q', 52, '', '083801054106', 'Jl. Poros', 'Pelalawan', '08-03-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(289, '1305071106140002', '@alfian1106', '3142463397', '', 'ALFIAN RISKI PRATAMA', '5B', '', '$2y$10$KY5LJWqRoEyHaj8ptlimYue9tqYKEtbyJUyQKfzdb9MVjgcNn.2hi', 52, '', '083180039925', 'Jln Masa Karya', 'Sungai Geringging', '11-06-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(290, '1401035108140002', '@delisa1108', '3145335790', '', 'DELISA OWENA AYUNDA', '5B', '', '$2y$10$Pa.7WN8vzMCxmi8k3ZDolOROZdlz7yeE4G0lrAL6YJWwLoTrJtLFK', 52, '', '082383090513', 'Jln. Taman Karya Perum Permata Bunda I Blok E-12', 'Pekanbaru', '11-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(291, '1401034304150003', '@febriani0304', '3153819452', '', 'FEBRIANI', '5B', '', '$2y$10$l2FgiWrTczake2.Ut66Xce3RBHM1sSfy7wOHcBItpdqtryYcpttJy', 52, '', '082268404126', 'Jln Suka Karya Perum Bintungan V', 'Pekanbaru', '03-04-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(292, '1471080805140004', '@m.ziham0805', '3147869972', '', 'M.ZIHAM AL MUQSITH', '5B', '', '$2y$10$R0hmFJUjU1Rncrb6pd3IBu7KuUMKdtyvP6cbeJo30PhgEZRdmfwue', 52, '', '08136565731207', 'Jln.Perum Wisma Kualu Permai Blok P. 15', 'Pekanbaru', '08-05-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(293, '1401035301150002', '@mahdiyah1301', '3159732761', '', 'Mahdiyah Nur Aisyah', '5B', '', '$2y$10$Peg/XN8sG7WETnHkWd4sR.IbOpGxSwSZKQZefEwdoBrrsm2IkY0x2', 52, '', '082389059652', 'Jln. Karya Indah Gg.Karya', 'Pekanbaru', '13-01-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(294, '1471055106140001', '@nabila1106', '3143225949', '', 'NABILA HASNA AMIRA', '5B', '', '$2y$10$YbNlRridm9FDLTo2A4eiOuGs4.AloR95vj1opDh9cbR52d2RcBeVe', 52, '', '085271659122', 'Jln. Perum Wisma Kualu Blok A6/23', 'Pekanbaru', '11-06-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(295, '1401185110140001', '@naura1110', '3141088181', '', 'NAURA DIVA LOVELIA', '5B', '', '$2y$10$JUsz74wTFEngKmfZVHXGF.As0i/bMCPSKRifwWP5QC2z6sDnku7M2', 52, '', '082268682363', 'Jln. Balai Jering', 'Balai Jering', '11-10-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(296, '1471024105140001', '@nazmiati0105', '3145528463', '', 'NAZMIATI', '5B', '', '$2y$10$7GuuzWeOpYS38TCAbb9Cmu.qJYaNdg2qVBYubpdzsoSA.HbgBtbnm', 52, '', '081365292462', 'Jln. Suka Karya Perum. Biru Asri Blok B-08', 'Pekanbaru', '01-05-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(297, '1471086112140004', '@queenzi2112', '3149867307', '', 'Queenzi Luthfia Rizqah', '5B', '', '$2y$10$V.x/KtMt91JO2Ba384DW2eEqrZAxFPg6sYNCJN.Dvr6PCP5/oSaPG', 52, '', '082170651100', 'Jln.Suka Karya Prum Wisma Kualu Blok A No. 31', 'Pekanbaru', '21-12-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(298, '1471080612140007', '@razaqi0612', '3143152907', '', 'RAZAQI ALAM SYAH', '5B', '', '$2y$10$0sWgj8lIS7uYnn7mg27zgOpVzYZJkfIqbyZgv8D.IToaBDLAoqkbm', 52, '', '081268926201', 'Jln.Suka Karya Prum Asta Karya Iii', 'Pekanbaru', '06-12-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(299, '1401030305140003', '@ryan0305', '3148647752', '', 'RYAN ARDIANSYAH PUTRA', '5B', '', '$2y$10$lrSBAbfqFPQcGOM/iP9zJub6jcfsPb5/IXKEfmyRUfwKoDHSWcNea', 52, '', '082174434979', 'Jln. Prum Mutiara Darul Sakinah', 'Pekanbaru', '03-05-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(300, '1471080302150002', '@yudha0302', '3155844493', '', 'YUDHA PRADIPTA YUSUF', '5B', '', '$2y$10$UYLvHyGQyndNIuev0gspie5bZsDEt6b3ERNZmeQrTkYBakLgFwJzK', 52, '', '082384886315', 'Jln Arafah', 'Pekanbaru', '03-02-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(301, '1407085009140002', '@zaira1009', '0141245591', '', 'ZAIRA SHAQILA ALAQSA', '5B', '', '$2y$10$QXVg6R18RL.WCaPP332HrO88hfBcN9AWi8yXwxtUQZvzCiCydLvQm', 52, '', '', 'Jl. Tecong Pulau Baru', 'Duri', '10-09-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(302, '1401032208140002', '@alham2208', '0148194819', '', 'ALHAM ALFAYYADH', '5C', '', '$2y$10$ZgzcgIebjLYuca44cRVCa.JPmTa5Ewq90CWL7JLpeVVYGt45jHWKq', 52, '', '082171382296', 'Perum Permata Kualu Blok A.2', 'Pekanbaru', '22-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(303, '1471086206140002', '@ameliana2206', '3142124353', '', 'AMELIANA HIDAYANTI', '5C', '', '$2y$10$DUVOb8Va2Q13joVuK2SxgefpePcW9Izvcc2FkQwdslQbFGyWzVgUm', 52, '', '085210321522', 'Jln. Taman Karya Ujung', 'Pekanbaru', '22-06-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(304, '1308052301110001', '@andika2301', '3118726758', '', 'ANDIKA PRATAMA', '5C', '', '$2y$10$5HlGTfoierc0eJbRvGI/0OoMtARWtVz/lKuqo3uJkgPsjjNau5BxO', 52, '', '', 'Jl. Suka Karya Perum. The Cendana Clauster Blok D7', 'Induring', '23-01-2011', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(305, '1304125005140003', '@aristi1005', '3144307063', '', 'ARISTI ZAYLA PUTRI', '5C', '', '$2y$10$5llJHriYD1HqlGeKplOdsOj6D/r20tJ5ZMTjwKt2C1S4gv5hPKzDe', 52, '', '081372173644', 'Wisma Kualu Permai Blok M', 'Tanah Datar', '10-05-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(306, '1401162910140001', '@arjuna2910', '3149192334', '', 'ARJUNA FAYYADH KHALFANI', '5C', '', '$2y$10$F5YJxfhzxgwpNa8Ue/rmD.3M535YbiirZA7v//Qy119TW0U0HVkcG', 52, '', '082391523104', 'Jln. Suka Karya Perum Asta Karya 3Blok F 1', 'Kampung Pinang', '29-10-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(307, '1312036810140002', '@bilqis2810', '3146720460', '', 'BILQIS PUTRI EFENDI', '5C', '', '$2y$10$.Bvl4sI5Oo9UhBs3CYEm0Onucg1lYCnJnusj9LZ/utRMlyTLk6UEO', 52, '', '082150162281', 'Jln. Suka Karya Perm.Graha Rawa Bangun Blok K-5', 'Simpang Empat', '28-10-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(308, '1471101504140006', '@dirgam1504', '3144775603', '', 'DIRGAM ARHAP', '5C', '', '$2y$10$JRN2w50DugqW297YWvOAsOCKw1GuBp3Psc5hnyHgYjPT2QnafDX.u', 52, '', '081276255668', 'Jln. Suka Karya', 'Pekanbaru', '15-04-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(309, '3275082807130007', '@fatihah2507', '3139337162', '', 'FATIHAH ALFIRDAUS RAMADHAN', '5C', '', '$2y$10$UG8Kmd2E1KHy.FFAgCA0F.aCg03n3/q7WWoRR2X4/FEvyZ3TfFgh2', 52, '', '', 'Jl. Suka Karya', 'Pekanbaru', '25-07-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(310, '1406082703140002', '@fransischo2703', '0148476917', '', 'FRANSISCHO ERLANDO HULU', '5C', '', '$2y$10$9VX0YIyPqEgXlWxs83f48uspwgusdKxjQ0BkE8VCsRjp7bgpGQ.4O', 52, '', '085290409894', 'Jalan Raya Aur Betung', 'Muara Rumbai', '27-03-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(311, '1371011005150001', '@habib1005', '3159466290', '', 'HABIB PUTRA LUCINDA', '5C', '', '$2y$10$M5CajBsVyjHswlpggmQV5uqktLHHSfUvasTIRq.JDFk6bFAUM2gkm', 52, '', '085264976426', 'Jl. Pemancungan', 'Padang', '10-05-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(312, '1401031811140003', '@ihsan1811', '3143595662', '', 'IHSAN SAPUTRA', '5C', '', '$2y$10$vZZOf3Pi.Yz507DHPdqUSufQG8xOnoaUR3jnVzqtkDzjPHeWhairS', 52, '', '', 'Perum Wisma Kualu Permai F 27', 'Pekanbaru', '18-11-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(313, '1401035201150002', '@lucyselena1201', '3152247208', '', 'LUCYSELENA KARTIKA', '5C', '', '$2y$10$ty6fIiUWbsjRWYytVL8Jsu3IpUn2WCNZTEYTfyqJ9dsbWlVXjS5Fi', 52, '', '082312123389', 'Perum Wisma Kualu Permai Blok X 7', 'Duri', '12-01-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(314, '1401031003150001', '@m.1003', '0152111509', '', 'M. ZAFA WANGSA', '5C', '', '$2y$10$3yJwO9DZWz4aXgyXyZDBXuR/QYXDvJB4OO0szM6c/BCLI3EBFTDui', 52, '', '081328264781', 'Jln. Flamboyan I', 'Pekanbaru', '10-03-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(315, '1471096210140008', '@nadira2210', '3146680767', '', 'NADIRA MUSYANA UTAMI', '5C', '', '$2y$10$0dxEPBL0evKiAYuecOq8ie.ZswB.5wVvUwQSW3BGRYoTm88BXl7Dy', 52, '', '082383970188', 'Perum Wisma Kualu', 'Pariaman', '22-10-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(316, '1471085307140001', '@nazwa1307', '3141069616', '', 'NAZWA ZAHIRA RAMADHANI', '5C', '', '$2y$10$rXtYeFPmDO5.oPhuNndED.9Nl07S9eV1txmHYQgc.bbMBL4WMKqUC', 52, '', '085278702203', 'Jln. Suka Karya Perum Wisma Kualu Permai', 'Pekanbaru', '13-07-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(317, '1401031706140003', '@ridha1706', '3145100389', '', 'RIDHA PRAMADAN NASDEL', '5C', '', '$2y$10$yqb9X15enoMFlBLmR15JOeMnDyBLbcEoBg7i8cURCE8/uR6fNohiy', 52, '', '', 'Jln. Plamboyan I', 'Pekanbaru', '17-06-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(318, '1471086010140005', '@rizki2010', '3145736641', '', 'RIZKI ANDINI', '5C', '', '$2y$10$fTl5M0gxbhciXsohsYiJZuGYyBRDcPfMslQ/bXgLhwzTtE.I/i5Me', 52, '', '081277732866', 'Jln. Suka Karya', 'Pekanbaru', '20-10-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(319, '1401030809140002', '@safaraz0809', '3149430250', '', 'SAFARAZ AKMA FADILAH', '5C', '', '$2y$10$pXmWg9ZqcKj1nSGNPfNlF.AJK7huQFy.ZwEouEsMGD85it3A9uevi', 52, '', '085374995509', 'Jln.Perum Karya Abadi Blok F No. 9', 'Pekanbaru', '08-09-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(320, '1209190503150001', '@tegu0503', '3156866847', '', 'Tegu Alfa Rezi Sitorus Pane', '5C', '', '$2y$10$Ew6g6QQg4Ak7dtVE6wq8..aMEPRuM0z8J7W/XX9G9apTHs6P3gSOK', 52, '', '081372173644', 'Jln.Wisma Kualu Permai Blok D. No. 17', 'Pekanbaru', '05-03-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(321, '1271095301150001', '@zulfa1301', '3133558419', '', 'Zulfa Alisa Siregar', '5C', '', '$2y$10$ccJbBT5H7Lvqm7AUmZ9S2uhDasC8yhvSB/QzHYmqzoLcnzralKLi6', 52, '', '081361169212', 'Jl. Garu Ii A', 'Medan', '13-01-2015', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(322, '3275032307140005', '@abdullah2307', '0142426706', '', 'ABDULLAH GOTZE', '6A', '', '$2y$10$nq5Ol035ZaAOOl6GYDCTb.wWkAuNLxjRBvsQiaMqozB2aqR6cPvyu', 52, '', '', 'Jl Inpres', 'Bekasi', '23-07-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(323, '1471082710130003', '@adrian2710', '3137444605', '', 'ADRIAN ALPUTRA', '6A', '', '$2y$10$MTe96lBSDQFyJSHfFMKbWuIfGmxDMbqG7VJbQHRIdocJEvxvH4jwK', 52, '', '0895328303753', 'Perum. Wisma Kualu Permai Blok G-08', 'Pekanbaru', '27-10-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(324, '1471084906130013', '@aiwina0906', '3131589031', '', 'AIWINA REFI', '6A', '', '$2y$10$dOyIHKPTMtxOnIE.R/6nH.OUdkihq0iul59yfBj.VCSyWGTirIWoe', 52, '', '0895328303754', 'Perum. Permata Bunda F No. 06', 'Pekanbaru', '09-06-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(325, '1401032905130001', '@alif2905', '3135162705', '', 'ALIF YADLIN RISQI', '6A', '', '$2y$10$nDyj7kW2YiRQNEl3G115fuK/Cfzij6.W.ITz9XJGGPRx8OcR5o1iy', 52, '', '0895328303756', 'Suka Karya', 'Pekanbaru', '29-05-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(326, '1371111401140002', '@azka1401', '0144253504', '', 'AZKA EL SAFARAZ', '6A', '', '$2y$10$hH2YD.CDTXlo0zvYMsLDsOEX4TBiBPA6eBSTfw1E1JYJHoJMRBmI2', 52, '', '081371916487', 'Jl. Dadok Indah 1', 'Padang', '14-01-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(327, '1472075407130003', '@balqis1407', '3135133175', '', 'BALQIS ADZRA RAMADANI', '6A', '', '$2y$10$mlYlJ.HLifA4H4invQTT.OkWUMniu4CRBGEvDQUO/2yi9tsbDNH6.', 52, '', '0895328303815', 'Perum. Wisma Kualu Permai Blok Ag/8', 'Dumai', '14-07-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(328, '1401036711130001', '@cinta2711', '0133157526', '', 'CINTA ANUGRAH ARILA', '6A', '', '$2y$10$lV7NhEItmcjUU3LewVc5NeaUuljtCACJHtux8NqeqMKaxRfrsb2RK', 52, '', '0895328303818', 'Bupati', 'Pekanbaru', '27-11-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(329, '1401034602140003', '@ervianti0602', '3147283134', '', 'ERVIANTI PUTRI', '6A', '', '$2y$10$9wvzavCt8qiA1uHp0nFvA.Ymj7I.19W5S81XG6HVxkQIRqSqTrtLu', 52, '', '', 'Perum Raisya Sentosa', 'Tasik Malaya', '06-02-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(330, '1471022203130001', '@falah2203', '3135947197', '', 'FALAH SAID RAHMAT', '6A', '', '$2y$10$c0aasWX.8w6AKkGPku4hjeB8HDI5cO7zM7tm2vN.Y5tCwvpSVM4Ie', 52, '', '0895328303823', 'Massa Karya Perum. Raisha Sentosa I Blok C 6', 'Pekanbaru', '22-03-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(331, '1401036001140001', '@fatimah2001', '3149452407', '', 'FATIMAH AZZAHRA', '6A', '', '$2y$10$X4oiMHu3qrLi4TSCUmmTUekhhe4j2CSJVferpxAiTw0ulK/7Um656', 52, '', '0895328303825', 'Perum. Taman Mutiara Ii D. 16', 'Pekanbaru', '20-01-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(332, '1471021111130002', '@fauzan1111', '3136457964', '', 'FAUZAN PRATAMA', '6A', '', '$2y$10$YamNHm.i3n.vmaQsxZVjL.YgSj3o8mnKTNJNI6F2Rll.fHczOadQS', 52, '', '0895328303826', 'Suka Karya Perum. Wisma Kualu G No. 7', 'Pekanbaru', '11-11-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(333, '1402065708130001', '@fezylla1708', '3139805306', '', 'FEZYLLA GUSTRI SYAFITRI', '6A', '', '$2y$10$T6r7aWDRdQmAxoIJTmpxk.jzMJLlRi1Z4.7sA3LgOsp//4CxsXiL.', 52, '', '083143500171', 'Perumahan Graha Rawa Bangun Blok A No 6', 'Belilas', '17-08-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(334, '1471084809130007', '@fitri0809', '3139187406', '', 'FITRI YULIA', '6A', '', '$2y$10$VUxlVbpyjr76v6b5zeS43e6NWWITKZ2ESybZ55AOfvHzPs8ry8Gni', 52, '', '0895328303829', 'Perum. Graha Rawa Bangun Blok O. 20', 'Pekanbaru', '08-09-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(335, '1471091708130003', '@habibie1708', '3134740887', '', 'HABIBIE ARDHIWINATA', '6A', '', '$2y$10$hzNj.9ev8/uekjYMBEMDPuBzIKlL6yDXtxjnWWc.mG9LE0h4Txuka', 52, '', '0895328303830', 'Masa Karya 2', 'Pekanbaru', '17-08-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(336, '1471066110130002', '@hanifa2110', '3135184764', '', 'HANIFA RASYIDA', '6A', '', '$2y$10$7rrZP1VaM5lPXUz/..isJOzyZoUdZA3Nd9r85wMWiOiNGDvmQ9EVS', 52, '', '088279789322', 'Perum Wisma Kualu Blok Ag/15', 'Pekanbaru', '21-10-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(337, '1471024204130002', '@kayla0204', '3138204483', '', 'KAYLA DIAN AZZAHRA', '6A', '', '$2y$10$nYbavQH2UmhfdekFlJLPl.sWrDeeS6CInYMgg2Yprf7lfJ/KziATu', 52, '', '0895328303837', 'Suka Karya', 'Pekanbaru', '02-04-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(338, '1471041405130004', '@malvin1405', '3136900280', '', 'MALVIN ASHARI', '6A', '', '$2y$10$TsnNqD8Mu.He7jRyXh48j.sP3AtnMxNaQssyiNpyQZgonBWSXuDja', 52, '', '0895328303841', 'Suka Karya Perum. Wisma Kualu Blok Ai No. 4', 'Pekanbaru', '14-05-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(339, '1471081508130002', '@al1508', '3134502544', '', 'MUHAMMAD AL FATIH AS SIDDIQI', '6A', '', '$2y$10$G.0/LA4.l78VokqhCXRaw.pQk38qr1PhxI8NPXZAGiEvl9VLzfD0S', 52, '', '0895328303844', 'Perum. Wisma Kualu Permai Blok Ad-10', 'Pekanbaru', '15-08-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(340, '1471112606130002', '@golib2606', '3134649227', '', 'MUHAMMAD GOLIB', '6A', '', '$2y$10$8/OiD.t1ng54As54ea8VSehJ2tn3cRN0Plk3AYreOEIPM1We67VKa', 52, '', '0895328303847', 'Pemudi No. 72', 'Pekanbaru', '26-06-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(341, '1471060710120009', '@nazriel0710', '3125238198', '', 'Muhammad Nazriel Handrian', '6A', '', '$2y$10$O5SgKbGyRlOIjS2TdNiKjO.ExyO64QmVn8l6sHclRqAnA3QiB9hQ2', 52, '', '082284448558', 'Jl. Swakarya Gg. Gembira', 'Pekanbaru', '07-10-2012', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(342, '1401136708140001', '@muttya2708', '0149264062', '', 'MUTTYA ELYSA', '6A', '', '$2y$10$7dfV6YV/VzCIFhhEdB3pC.4qF3nGwq4SXwsyKMrvfr2ebiFH47fXy', 52, '', '083825128238', 'Koto Bangun', 'Bangkinang', '27-08-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(343, '1401034611130001', '@nayla0611', '3137596761', '', 'NAYLA SYIDQIA', '6A', '', '$2y$10$48OQS9p9441iPAVldOlVk.aRX.51X7Qm2CNkQbbXV0MzdKEVvcqRi', 52, '', '0895328303851', 'Wisma Kualu Permai Blok A/7', 'Pekanbaru', '06-11-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(344, '1471024407130001', '@putri0407', '0137430547', '', 'PUTRI HUMAIRA', '6A', '', '$2y$10$VzxGkkB5zVJmMlH6TILbh.sQ2w5GRGrK/8J/esMnjg0DzNwkMwxPC', 52, '', '0895328303853', 'Perum. Raysa Sentosa', 'Pekanbaru', '04-07-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(345, '1471075504130003', '@raniah1504', '3133285913', '', 'RANIAH PERMATA NINGRUM', '6A', '', '$2y$10$Pp5NKHH/Sjy2aXMX9OvePuBzf7VFh2k4Ftt4dJRtXnA4l8evrInia', 52, '', '0895328303856', 'Suka Karya', 'Pekanbaru', '15-04-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11');
INSERT INTO `users` (`id`, `nik`, `username`, `nisn`, `nip`, `nama`, `kelas`, `email`, `password`, `jabatan_id`, `nama_ortu`, `nomor_hp`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `role_id`, `jadwal_piket_id`, `created_at`, `updated_at`) VALUES
(346, '1401030301140004', '@rehan0301', '0143182914', '', 'REHAN SYAPUTRA', '6A', '', '$2y$10$CjaOWSqu.MgI564aIpelUuKDPxhhznkLJVockOoEORtqTYYwuIqbi', 52, '', '088279788633', 'Suka Karya', 'Pekanbaru', '03-01-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(347, '1207265606140019', '@selvi1606', '3149125021', '', 'SELVI ZAHRANI SIREGAR', '6A', '', '$2y$10$1myKKDJma12WyFTsELHkweg9tBV2IbT7g2v21dCSQBBU.5MgkBHUO', 52, '', '', 'Bandar Setia', 'Batang Toru', '16-06-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(348, '1471095504140004', '@vila1504', '0145686855', '', 'VILA APRILIE NALDY', '6A', '', '$2y$10$v3pNX6nMprCgeDsh6jJV3.F1TQqOtOI5BW8SPtDTGbfdbTxEBWX6e', 52, '', '0895328303866', 'Massa Karya Gg. Nenas', 'Pekanbaru', '15-04-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(349, '1471092707130008', '@wirawardana2707', '3138332602', '', 'WIRAWARDANA RAMADHAN', '6A', '', '$2y$10$YR6fVOAL7g75tYZdfk0aUuKMe6Ht3zKY1UJtChgwKyv8KoX2zjtI2', 52, '', '0895328303867', 'Perum. Wisma Kualu Permai Blok A No. 09', 'Pekanbaru', '27-07-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(350, '1305074406140001', '@zaskia0406', '3148314727', '', 'Zaskia Adelia Meka', '6A', '', '$2y$10$pZdl/eyO7X6Yap527.WIueS2beUDOiIVCADeqFmH4YhJjiwp.2/PS', 52, '', '082385767933', 'Koto Tinggi', 'Koto Tinggi', '04-06-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(351, '1271215807130002', '@annisa1807', '3137801263', '', 'ANNISA KHAIRA RAMADHANI P.', '6B', '', '$2y$10$LAlILqU7T48Zxw6NrbxtMeqlmMXLwDYj.MJb94UocQG3UNt2ktMNC', 52, '', '0895328303757', 'Karya Bersama', 'Medan', '18-07-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(352, '1401036111130001', '@annisa2111', '0132613411', '', 'ANNISA KHUMAIROH LUMBAN GAOL', '6B', '', '$2y$10$u4T8SRMk7SjLKwyy2NmcVO1pcLkZArje6x2lbsltgyu2IINO0WnYu', 52, '', '0895328303758', 'Tarai Indah Perum. Surya Mandiri Blok B No. 14', 'Tarai Bangun', '21-11-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(353, '1108171003140001', '@baihaqi1003', '3147869409', '', 'BAIHAQI KHAIZAN', '6B', '', '$2y$10$Jnzkp80RW0Z/z.af3dxIWeabqNHWVDXMooGnJN2UgLqM3CZb/NgYu', 52, '', '0895328303814', 'Masa Karya', 'Lhokseumawe', '10-03-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(354, '1401036012130001', '@dila2012', '0139949610', '', 'DILA SAPUTRI HARAHAP', '6B', '', '$2y$10$6Av0tbHcJCj/rpNgBqplAOsrukOHPcz656CmFNyyJAC5W6t.2plMO', 52, '', '0895328303822', 'Suka Karya Perum. Griya Tarai Asri Vetra Jaya Blok B5', 'Pekanbaru', '20-12-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(355, '1471080702140002', '@fikri0702', '0143521180', '', 'FIKRI FEBRIANDI', '6B', '', '$2y$10$a0pg2sPt8e1WskfGJA43COocQXn756Ftcs4oq55/UykjaZ/7FISuK', 52, '', '0895328303828', 'Suka Karya', 'Pekanbaru', '07-02-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(356, '1401031507130001', '@haeckal1507', '3138410180', '', 'HAECKAL IKHSAN RAMADHAN', '6B', '', '$2y$10$hLPOk7ZVu9vx6fthkqaqhesv.SVVUUohDi.sy.QGveto8VWDESAOy', 52, '', '0895328303831', 'Wisma Kualu Permai T. 14', 'Pekanbaru', '15-07-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(357, '1471084207140007', '@hafizah0207', '3148386668', '', 'HAFIZAH AL FATUNNISA RAHMADANI', '6B', '', '$2y$10$0OUoFnKuOeugMyBkGUDzfOt7nu4AJn7zhP9mQwr1dCi.zQhxu6E6W', 52, '', '088279856303', 'Jalan Wisma Kualu Permai Blok M-27', 'Pekanbaru', '02-07-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(358, '1471066110130001', '@hasnah2110', '3133239843', '', 'HASNAH NABILLA', '6B', '', '$2y$10$T6ic9rZSKxZds0Ne8zQHWOQhqjVIZf3Hn6d9EmzT8LzAfiIcsEwqy', 52, '', '088279789331', 'Perum. Wisma Kualu Blok Ag/15', 'Pekanbaru', '21-10-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(359, '1401062602130002', '@ibnu2602', '3132748544', '', 'Ibnu Asraf Al-Abian', '6B', '', '$2y$10$HZNSCrbDpCrrGR/0SXqRB.F/1TIjXIZdpGIyplrwxdwhN3.hp3LyO', 52, '', '082382688288', 'Teratak Buluh', 'Teratak Buluh', '26-02-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(360, '1401030801140004', '@irsyad0801', '0145125952', '', 'IRSYAD ALSIAN', '6B', '', '$2y$10$mcVXn4zYK6y6YQ79AkET6Os1cdrPB3ejVzAKRMCXMwQcfyFnfxl1K', 52, '', '0895328303833', 'Perum. Mutiara Darul', 'Geragahan', '08-01-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(361, '1471085704140003', '@jernita1704', '0141178380', '', 'JERNITA APRILLYA BR SILALAHI', '6B', '', '$2y$10$SbmHFCUaMnZkEX1nC/vqyuw0p3zl2YTaFtpUPVuuDUN5Y4wa.7V.e', 52, '', '0895328303834', 'Perum. Wisma Kualu Permai Blok I No. 26', 'Pekanbaru', '17-04-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(362, '1471050209120004', '@jihan0209', '3126396289', '', 'JIHAN RAHEZAH', '6B', '', '$2y$10$XD1e9NzSMqBbxGtlcQeh8u0tcJtko9I1qYoWb/wbJzAi9qUZNkSey', 52, '', '0895328303835', 'Jl Suka Karya Perum Wisma Kualu Permai', 'Pekanbaru', '02-09-2012', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(363, '1471085303140004', '@kalila1303', '3147528032', '', 'KALILA RIFDA PUTRI', '6B', '', '$2y$10$krtUzXf9Jx8BgziY1f6GKey9BGJ.6N58hE8qun19vwRx5aoLzS8IG', 52, '', '0895328303836', 'Suka Karya', 'Pekanbaru', '13-03-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(364, '1302064803140002', '@marsya0803', '0144237437', '', 'MARSYA RASILA', '6B', '', '$2y$10$ut/s7SnwFmHsLKOWQpayouvZpkMcOboG/OtT56f4VD4Gg0XSezl/C', 52, '', '', 'Jl. Koto Laweh-Bukit Sileh', 'Solok', '08-03-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(365, '1471081408130007', '@abizar1408', '3134022467', '', 'MUHAMMAD ABIZAR ALGIFAHRI', '6B', '', '$2y$10$cuULAaHpnCGCSWVVn7WCWeiCHbWaZQFRb9gPAYq7soh4YMtWas1WO', 52, '', '0895328303843', 'Perum. Wisma Kualu Blok W/8', 'Pekanbaru', '14-08-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(366, '1401031605130002', '@arif1605', '3131122837', '', 'MUHAMMAD ARIF JAILANI', '6B', '', '$2y$10$J5TFSAlDAgetFi3cnxMk.u4QdpK8JQwkX5isPuRT5vIELyq2c0xD.', 52, '', '0895328303845', 'Perum. Wisma Kualu Blok H. 17', 'Tarai Bangun', '16-05-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(367, '1401030608130004', '@rayhan0608', '0135141528', '', 'MUHAMMAD RAYHAN ARDHANI', '6B', '', '$2y$10$Tcu28JZUVKZX/Xk4oDZOxOniTyLdG/5aDhL7odKcjQBxRVE9MFt7.', 52, '', '0895328303848', 'Masa Karya', 'Tarai Bangun', '06-08-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(368, '1401031711130001', '@rifqi1711', '3132358177', '', 'MUHAMMAD RIFQI HABIBULLAH', '6B', '', '$2y$10$LcxCZ9MnM7dmng4iunmXre8pvMI3lZFk5vKYQQw5R7ZdL2lOisx.q', 52, '', '0895328303849', 'Perum. Kualu Permai Blok Ag 9', 'Bangkinang', '17-11-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(369, '1471084301140001', '@nadine0301', '0147114831', '', 'Nadine Dwi Putri', '6B', '', '$2y$10$AijUhp7lwlllzhXqBV14/euJL/oMPkgsyoXU/h3eLrfyvwW2sbv4W', 52, '', '0895328303850', 'Suka Karya', 'Pekanbaru', '03-01-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(370, '1472025210130001', '@nala1210', '3131545575', '', 'Nala Dzakirah', '6B', 'sdntaraibangun35@gmail.com', '$2y$10$PFA3bFsn1zsKVKusbUqnFOBRZoHonRm1wFHYMt3X/8t4CjaGLycWy', 52, '', '', 'Kp. Hangus', 'Dumai', '12-10-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(371, '1401036804140003', '@putri2804', '3146973059', '', 'PUTRI ASSYIFA', '6B', '', '$2y$10$J9suipDE4/YjEfXWrdBXaOlxf.xPLSjuagnksYp3szkEKvqcPKUAy', 52, '', '0895328303852', 'Massa Karya Iii', 'Pekanbaru', '28-04-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(372, '1402015301140001', '@sakina1301', '0145379067', '', 'SAKINA MUTIARA', '6B', '', '$2y$10$4KAJi4HtBP0TBLzSuAKBvudvk5KqQsp3/UHd6anaHexk1ZwmJX46.', 52, '', '0895328303861', 'Jl. Taman Karya Perum. Permata Bunda Blok Ff', 'Rengat', '13-01-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(373, '3204286707130004', '@sindi2707', '0131893325', '', 'SINDI ROHENDI', '6B', '', '$2y$10$kDox8wNUgm6XLj88cznPDO3SYGOYweFnMyGLsxN5y0mIry9/4Awpa', 52, '', '0895328303863', 'Perum. Darul Sakinah Blok C No. 11', 'Bandung', '27-07-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(374, '1471085412130002', '@thalita1412', '3134213471', '', 'Thalita Zahra Ronni', '6B', '', '$2y$10$O6CxsbOV4C2Okylda7fhe.tVrjL/nm1ixnz.uXO285gSTp1WewnGq', 52, '', '0895328303864', 'Perum Wisma Kualu Permai Blok L-03', 'Pekanbaru', '14-12-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(375, '1401035012130003', '@zata1012', '3134431310', '', 'ZATA YUMNI ADANIA', '6B', '', '$2y$10$i7A/jwaQFtSt9.w6LpZtyeqqJRc3S3lH41/3g1meQNnsitOHG4YcK', 52, '', '0895328303869', 'Perum.Taman Mutiara Ii D. X', 'Pekanbaru', '10-12-2013', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(376, '1308045501140001', '@zivani1501', '3148594401', '', 'ZIVANI PUTRI DONIA', '6B', '', '$2y$10$XGAVv4wxBvUsXorP9G6RX.VAZ/Sxznp6Dzfh72in9RCeBjKUoK5gW', 52, '', '0895328303870', 'Jl. Suka Karya Gg. Ceria', 'Koto Kaciok', '15-01-2014', 3, 1, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(378, '14711004970001', '@ceker', '', '-', '@ceker', '6C', '-', '$2y$10$5rnzju61eFJDP.1NbcqV8.80pmBtBhnVQP/1019KoWMPaNQbAygvy', 41, '', '08137829522', 'JL. Patin', 'Pekanbaru', '1997-04-10', 1, 6, '2025-09-14 17:34:59', '2025-09-14 17:34:59'),
(382, '', '@hacker2', NULL, NULL, '@hacker2', '5C', '', '$2y$10$3cLP.BeVf/ONnb8/D2CSKuLSNAdWkZmkaJYV63AHaB4us404BwE0e', 52, '', '', '', '', '', 3, NULL, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(383, '', '@hacker100', NULL, NULL, '@hacker100', '6B', '', '$2y$10$bsF8ZaBZ9U6z3EwIX7cwI.Pb9IGYSggVfvBJQRXTp3OTxFnYC2iqG', 52, '', '', '', '', '', 3, NULL, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(384, '', '@hacker1001', NULL, NULL, '@hacker1001', '6B', '', '$2y$10$X4Lce2eLskFcsJ.3P3hWFOikOEImCct67hFFZg5cxMmHVUmif8pdK', 52, '', '', '', '', '', 3, NULL, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(386, '1471120208180002', '@abil0208', '3180585627', '', 'ABIL SIDDIQ ARSALAAN', '1A', '', '$2y$10$uLnYSZpMGJsdPPaGw19V/ejt1wgenFnIiVfkiByPt/cY6GAjPaIsq', 52, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-02', 3, 2, '2025-09-14 15:11:11', '2025-09-14 15:11:11'),
(388, '1471120208180002', '@ahmad0408', '3180585629', '', 'Ahmad Fauzana', '4B', '', '$2y$10$uTXpA6l8L/t/BCLW8S4s1up.UAx3.0RBUJOoDiCDG408EUALHTxgu', 35, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-04', 2, 1, '2025-09-14 14:58:29', '2025-09-14 14:58:29'),
(389, '1471120208180002', '@budi0508', '3180585630', '', 'Budi Prasetyo', '1B', '', '$2y$10$y7fIA9QM/K1fEoCuFk2eq.AI.vYVqPM1BMXiQLzkwnMqGagJm2rqi', 26, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-05', 2, 2, '2025-09-14 14:43:00', '2025-09-14 14:43:00'),
(390, '1471120208180002', '@clara0608', '3180585631', '', 'Clara Azzahra', '-', '', '$2y$10$WrMx.ZkzHQCP8Q4AtmNOf.4PcnL14ja5rgYyTaYC3jecWfgzBa38a', 46, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-06', 2, 2, '2025-09-14 17:36:33', '2025-09-14 17:36:33'),
(391, '1471120208180002', '@dita0708', '3180585632', '', 'Dita Maharani', '1C', '', '$2y$10$dTBGSaK3DRyxc3e.UfKIv.aqHNLnqsOBmEwIG366FwaQ3iBi649jy', 27, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-07', 2, 2, '2025-09-14 15:03:10', '2025-09-14 15:03:10'),
(392, '1471120208180002', '@eko0808', '3180585633', '', 'Eko Saputra', '3C', '', '$2y$10$euK36D7hfjSBZYSxmj5Z5eykoCPwFXyW2RdqbcZMf5lZUK.OWDkF.', 26, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-08', 2, 2, '2025-09-14 15:04:13', '2025-09-14 15:04:13'),
(393, '1471120208180002', '@fira0908', '3180585634', '', 'Fira Anjani', '3B', '', '$2y$10$6.urSO7jp2TDNjfki3ATRONxDwleblBNINYBUUXeO6l0irfZE44y6', 32, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-09', 2, 2, '2025-09-14 14:46:32', '2025-09-14 14:46:32'),
(394, '1471120208180002', '@gilang1008', '3180585635', '', 'Gilang Ramadhan', '4A', '', '$2y$10$qRPbUGeOkVLMfDWm8PVYYeQIk49.9bjYciRkB7xoV2GrxtPqXMTfe', 26, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-10', 2, 2, '2025-09-14 15:03:58', '2025-09-14 15:03:58'),
(395, '1471120208180002', '@hana1108', '3180585636', '', 'Hana Meilani', '-', '', '$2y$10$8sMCn3zJfsZu.pXDpX2b7.Bb01f4expyWcclfojdvG36RrbkGQCyS', 42, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-11', 2, 2, '2025-09-14 15:07:53', '2025-09-14 15:07:53'),
(397, '1471120208180002', '@joko1308', '3180585638', '', 'Joko Santoso', '-', '', '$2y$10$gki0gkzIrwu/aF4r1A1KjOwwZaOTVrdEss0RH6Rx7dnvSTSSdwbbu', 48, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-13', 2, 2, '2025-09-14 15:12:35', '2025-09-14 15:12:35'),
(398, '1471120208180002', '@kirana1408', '3180585639', '', 'Kirana Putri', '2B', '', '$2y$10$4f0nszen0zq1GE0.2zoo8.mj.Ybm/tviEu3EMQIvn12XwTouhcnty', 26, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-14', 2, 2, '2025-09-14 15:07:10', '2025-09-14 15:07:10'),
(399, '1471120208180002', '@lutfi1508', '3180585640', '', 'Lutfi Hakim', '-', '', '$2y$10$Qy4Rgvl5XIlWfftjWx/Nie8V.ArkV2ykr6CkrcF/y06T3.YgL5obW', 44, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-15', 2, 2, '2025-09-14 15:19:19', '2025-09-14 15:19:19'),
(400, '1471120208180002', '@mega1608', '3180585641', '', 'Mega Sari', '5B', '', '$2y$10$LIX.LeLwKHFEDW.gbWney.Z5lwpkj/Bjq1HMCvF5.rxgJQoyFbw4C', 26, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-16', 2, 2, '2025-09-14 15:05:55', '2025-09-14 15:05:55'),
(401, '1471120208180002', '@naufal1708', '3180585642', '', 'Naufal Rizky', '-', '', '$2y$10$jyqD8XE2Ks4YGyN5.gWx9ubkwLXJFJU3d3n.Y62vC3nYUOSpTb7G2', 47, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-17', 2, 2, '2025-09-14 15:19:41', '2025-09-14 15:19:41'),
(402, '1471120208180002', '@olivia1808', '3180585643', '', 'Olivia Salsabila', '-', '', '$2y$10$MCvtK/VTbJsf8okX2NCskuIIMYz8z/0rXcH80D674PDwWj7Pn8U3G', 48, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-18', 2, 2, '2025-09-14 15:19:58', '2025-09-14 15:19:58'),
(403, '1471120208180002', '@putra1908', '3180585644', '', 'Putra Wijaya', '5C', '', '$2y$10$Bwe9YWFzA.gn1O1dy5bVNOCiabIdnAXkJtjlSR7Ss.3PuktvnLHJm', 26, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-19', 2, 2, '2025-09-14 15:06:05', '2025-09-14 15:06:05'),
(404, '1471120208180002', '@qonita2008', '3180585645', '', 'Qonita Zahra', '2A', '', '$2y$10$f0aXyo00OJQnvw5TpDflK.wO5UUHubSggVC/VFiIRuHyLBE.8H50S', 26, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-20', 2, 2, '2025-09-14 15:07:02', '2025-09-14 15:07:02'),
(405, '1471120208180002', '@rama2108', '3180585646', '', 'Rama Dwi', '-', '', '$2y$10$GlR6fin2/oSIlVCwR8lvP.3CESTbWwZ5bT55tZYCkX.MUia86ZNK2', 46, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-21', 2, 6, '2025-09-14 16:23:20', '2025-09-14 16:23:20'),
(406, '1471120208180002', '@sinta2208', '3180585647', '', 'Sinta Lestari', '5A', '', '$2y$10$nBk7WSf9LE3woWQOshfnK.InVXXlPZqexDYJvB5d0/ztINJQd1Aze', 26, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-22', 2, 2, '2025-09-14 15:05:45', '2025-09-14 15:05:45'),
(407, '1471120208180002', '@tegar2308', '3180585648', '', 'Tegar Firmansyah', '2C', '', '$2y$10$8Z.72OcxrOuQHpHX8sO3h.NMpEK1Hs6hCIt.wJ.3QeSzrS3fAO2GG', 26, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-23', 2, 2, '2025-09-14 15:07:22', '2025-09-14 15:07:22'),
(408, '1471120208180002', '@ulya2408', '3180585649', '', 'Ulya Hidayati', '1A', '', '$2y$10$k3zq9TkHfjpaiOBe20YngeWOGYVS63zbeBMwk.w55SgwgiLPU3N.W', 26, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '24-08-2018', 2, 3, '2025-09-14 17:33:02', '2025-09-14 17:33:02'),
(409, '1471120208180002', '@vino2508', '3180585650', '', 'Vino Arya', '4C', '', '$2y$10$l7LYwXIUrZSpTISt7tpmr.RMljJAF18VevKOHNh4SuMeAESF6WZJe', 38, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-25', 2, 2, '2025-09-14 15:04:50', '2025-09-14 15:04:50'),
(410, '1471120208180002', '@wulan2608', '3180585651', '', 'Wulan Cahyani', '6B', '', '$2y$10$NbBBghQJGzX5L0Ct9greFO3Zv6rxTTYKDUC.1qe7NksC.WgpW/vL2', 39, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-26', 2, 2, '2025-09-14 15:05:10', '2025-09-14 15:05:10'),
(411, '1471120208180002', '@xena2708', '3180585652', '', 'Xena Rahmawati', '6A', '', '$2y$10$DcpNr2Msyju0xLOJbBbPDOqPnovtR7CVXzWk4wyWnBr5Oe1hsORca', 40, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-27', 2, 2, '2025-09-14 14:44:31', '2025-09-14 14:44:31'),
(412, '1471120208180002', '@yusuf2808', '3180585653', '', 'Yusuf Hilmi', '3A', '', '$2y$10$XsntxbzkS/ZocNJZcHp0uufDgvwDdKfo76UDVZ6d6htB6Tyus30nO', 41, '', '085363234317', 'Perum. Wisma Kualu Blok Ac', 'Pekanbaru', '2018-08-28', 2, 2, '2025-09-14 15:06:24', '2025-09-14 15:06:24'),
(763, '', '@wakepsek88', '', '', '@wakepsek88', '1A', '', '$2y$10$Q0QfwNPfzmHUG2Qa/EuMq.g.MmpXwBpJir0Rtqnw.ceQqS/6aFb4G', 24, '', '', '', '', '', 1, 2, '2025-09-14 15:23:30', '2025-09-14 15:23:30'),
(764, '', '@kepsek88', '', '', '@kepsek88', '-', '', '$2y$10$o6SlXUEJnaeVwSVqXRNOluy3xwHMfjW3BRTq6O5acSNponqOY6Cj6', 23, '', '', '', '', '', 1, 3, '2025-09-14 16:21:08', '2025-09-14 16:21:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_jabatan` (`kode_jabatan`);

--
-- Indexes for table `jadwal_piket`
--
ALTER TABLE `jadwal_piket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `pelanggaran_id` (`pelanggaran_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_name` (`permission_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_jabatan` (`jabatan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `jadwal_piket`
--
ALTER TABLE `jadwal_piket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=768;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_piket`
--
ALTER TABLE `jadwal_piket`
  ADD CONSTRAINT `jadwal_piket_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  ADD CONSTRAINT `pelanggaran_siswa_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pelanggaran_siswa_ibfk_2` FOREIGN KEY (`pelanggaran_id`) REFERENCES `pelanggaran` (`id`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

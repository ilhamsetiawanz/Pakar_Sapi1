-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 03:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakar_sapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturans`
--

CREATE TABLE `aturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_gejala` bigint(20) UNSIGNED NOT NULL,
  `id_penyakit` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aturans`
--

INSERT INTO `aturans` (`id`, `id_gejala`, `id_penyakit`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 4, 1, NULL, NULL),
(3, 9, 1, NULL, NULL),
(4, 11, 1, NULL, NULL),
(5, 14, 1, NULL, NULL),
(6, 18, 1, NULL, NULL),
(7, 20, 1, NULL, NULL),
(8, 21, 1, NULL, NULL),
(9, 43, 1, NULL, NULL),
(10, 5, 2, NULL, NULL),
(11, 6, 2, NULL, NULL),
(12, 7, 2, NULL, NULL),
(13, 8, 2, NULL, NULL),
(14, 2, 2, NULL, NULL),
(15, 42, 2, NULL, NULL),
(16, 53, 2, NULL, NULL),
(17, 1, 3, NULL, NULL),
(18, 9, 3, NULL, NULL),
(19, 8, 3, NULL, NULL),
(20, 10, 3, NULL, NULL),
(21, 11, 4, NULL, NULL),
(22, 1, 4, NULL, NULL),
(23, 9, 4, NULL, NULL),
(24, 12, 4, NULL, NULL),
(25, 4, 4, NULL, NULL),
(26, 48, 4, NULL, NULL),
(27, 50, 4, NULL, NULL),
(28, 13, 5, NULL, NULL),
(29, 14, 5, NULL, NULL),
(30, 15, 5, NULL, NULL),
(31, 33, 5, NULL, NULL),
(32, 52, 5, NULL, NULL),
(33, 12, 6, NULL, NULL),
(34, 17, 6, NULL, NULL),
(35, 2, 6, NULL, NULL),
(36, 16, 6, NULL, NULL),
(37, 20, 7, NULL, NULL),
(38, 22, 7, NULL, NULL),
(39, 41, 7, NULL, NULL),
(40, 46, 7, NULL, NULL),
(41, 51, 7, NULL, NULL),
(42, 1, 8, NULL, NULL),
(43, 24, 8, NULL, NULL),
(44, 25, 8, NULL, NULL),
(45, 20, 8, NULL, NULL),
(46, 4, 8, NULL, NULL),
(47, 49, 8, NULL, NULL),
(48, 26, 9, NULL, NULL),
(49, 45, 9, NULL, NULL),
(50, 27, 9, NULL, NULL),
(51, 8, 10, NULL, NULL),
(52, 17, 10, NULL, NULL),
(53, 28, 10, NULL, NULL),
(54, 29, 10, NULL, NULL),
(55, 12, 11, NULL, NULL),
(56, 30, 11, NULL, NULL),
(57, 44, 11, NULL, NULL),
(58, 47, 11, NULL, NULL),
(59, 31, 12, NULL, NULL),
(60, 32, 12, NULL, NULL),
(61, 19, 13, NULL, NULL),
(62, 34, 13, NULL, NULL),
(63, 35, 13, NULL, NULL),
(64, 39, 13, NULL, NULL),
(65, 22, 14, NULL, NULL),
(66, 36, 14, NULL, NULL),
(67, 38, 14, NULL, NULL),
(68, 40, 14, NULL, NULL),
(69, 23, 15, NULL, NULL),
(70, 3, 15, NULL, NULL),
(71, 1, 15, NULL, NULL),
(72, 37, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_gejalas`
--

CREATE TABLE `data_gejalas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `KodeGejala` varchar(255) NOT NULL,
  `NamaGejala` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_gejalas`
--

INSERT INTO `data_gejalas` (`id`, `KodeGejala`, `NamaGejala`, `created_at`, `updated_at`) VALUES
(1, 'G01', 'Demam', NULL, NULL),
(2, 'G02', 'Adanya Leleran Hidung', NULL, NULL),
(3, 'G03', 'Kehilangan Nafsu Makan', NULL, NULL),
(4, 'G04', 'Sesak Nafas', NULL, NULL),
(5, 'G05', 'Gerakan Rumen Menurun', NULL, NULL),
(6, 'G06', 'Terjadi Konjungtivitas', NULL, NULL),
(7, 'G07', 'Air Mata dan Hidung Selalu Keluar Leleran Air', NULL, NULL),
(8, 'G08', 'Diare', NULL, NULL),
(9, 'G09', 'Keguguran', NULL, NULL),
(10, 'G10', 'Susu Berhenti', NULL, NULL),
(11, 'G11', 'Radang Hidung', NULL, NULL),
(12, 'G12', 'Lesu', NULL, NULL),
(13, 'G13', 'Mata Lembab', NULL, NULL),
(14, 'G14', 'Adanya Sedikit Konstriksi pada Pupil', NULL, NULL),
(15, 'G15', 'Photophobia', NULL, NULL),
(16, 'G16', 'Kembung', NULL, NULL),
(17, 'G17', 'Bulu Kusam dan Kasar', NULL, NULL),
(18, 'G18', 'Glambir Membengkak', NULL, NULL),
(19, 'G19', 'Mengalami Kesulitan dalam Lahiran', NULL, NULL),
(20, 'G20', 'Berat Badan Menurun dan Kurus', NULL, NULL),
(21, 'G21', 'Produksi Air Mata Meningkat', NULL, NULL),
(22, 'G22', 'Gatal', NULL, NULL),
(23, 'G23', 'Terdapat Darah pada Urin', NULL, NULL),
(24, 'G24', 'Leleran di Hidung', NULL, NULL),
(25, 'G25', 'Ngorok', NULL, NULL),
(26, 'G26', 'Air Susu Encer Bercampur Nanah', NULL, NULL),
(27, 'G27', 'Kelenjar Air Susu Membengkak', NULL, NULL),
(28, 'G28', 'Kurus', NULL, NULL),
(29, 'G29', 'Anorexia', NULL, NULL),
(30, 'G30', 'Kaki Pincang', NULL, NULL),
(31, 'G31', 'Luka Berdarah', NULL, NULL),
(32, 'G32', 'Muncul Belatung pada Luka', NULL, NULL),
(33, 'G33', 'Radang Mata', NULL, NULL),
(34, 'G34', 'Keluarnya Air Ketuban Tanpa Adanya Janin', NULL, NULL),
(35, 'G35', 'Kontraksi Tidak Efektif', NULL, NULL),
(36, 'G36', 'Kehilangan Bulu', NULL, NULL),
(37, 'G37', 'Urin yang Dikeluarkan Selalu Sedikit', NULL, NULL),
(38, 'G38', 'Mengalami Iritasi pada Kulit', NULL, NULL),
(39, 'G39', 'Janin Terlihat Tapi Tidak Bisa Keluar', NULL, NULL),
(40, 'G40', 'Infeksi Sekunder', NULL, NULL),
(41, 'G41', 'Bulu Rontok', NULL, NULL),
(42, 'G42', 'Kesulitan Bergerak', NULL, NULL),
(43, 'G43', 'Air Liur Berlebihan', NULL, NULL),
(44, 'G44', 'Kesulitan Berjalan atau Pincang', NULL, NULL),
(45, 'G45', 'Penurunan Produksi Susu', NULL, NULL),
(46, 'G46', 'Kulit Merah dan Meradang', NULL, NULL),
(47, 'G47', 'Pembengkakan pada Sendi', NULL, NULL),
(48, 'G48', 'Hidung dan Daerah Wajah Membengkak', NULL, NULL),
(49, 'G49', 'Membran Mukosa Pucat atau Kebiruan', NULL, NULL),
(50, 'G50', 'Batuk', NULL, NULL),
(51, 'G51', 'Kulit Berkerak', NULL, NULL),
(52, 'G52', 'Mata Berair', NULL, NULL),
(53, 'G53', 'Diare Berdarah', NULL, NULL),
(54, 'G54', 'Meriang', '2024-08-25 00:57:19', '2024-08-25 00:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `laporan__bulanans`
--

CREATE TABLE `laporan__bulanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_peternak` varchar(255) NOT NULL,
  `kdPenyakit` bigint(20) UNSIGNED DEFAULT NULL,
  `Tanggal_Diagnosa` date NOT NULL,
  `gejala` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gejala`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan__bulanans`
--

INSERT INTO `laporan__bulanans` (`id`, `nama_peternak`, `kdPenyakit`, `Tanggal_Diagnosa`, `gejala`, `created_at`, `updated_at`) VALUES
(106, 'Saldi', 10, '2023-04-10', '[\"8\",\"17\",\"28\",\"29\"]', '2024-10-17 20:36:25', '2024-10-17 20:36:25'),
(107, 'La Ati', 11, '2023-04-14', '[\"12\",\"30\"]', '2024-10-17 20:41:55', '2024-10-17 20:41:55'),
(108, 'La Ati', 10, '2023-04-12', '[\"8\",\"17\",\"29\"]', '2024-10-17 20:44:24', '2024-10-17 20:44:24'),
(109, 'Anton', 10, '2023-04-13', '[\"17\",\"28\"]', '2024-10-17 20:46:21', '2024-10-17 20:46:21'),
(110, 'Udin', 10, '2023-04-14', '[\"17\",\"28\"]', '2024-10-17 20:52:43', '2024-10-17 20:52:43'),
(111, 'Mustari', 10, '2023-04-14', '[\"17\",\"28\"]', '2024-10-17 20:53:40', '2024-10-17 20:53:40'),
(112, 'Hariana', 12, '2023-04-17', '[\"31\",\"32\"]', '2024-10-17 20:55:45', '2024-10-17 20:55:45'),
(113, 'Hasnawati', 10, '2023-04-17', '[\"17\",\"28\"]', '2024-10-17 20:56:42', '2024-10-17 20:56:42'),
(114, 'Wa Ode Siti', 10, '2023-04-17', '[\"17\",\"28\"]', '2024-10-17 20:57:38', '2024-10-17 20:57:38'),
(115, 'Teguh', 4, '2023-05-02', '[\"1\",\"12\"]', '2024-10-17 20:59:19', '2024-10-17 20:59:19'),
(116, 'Darwis', 5, '2023-05-03', '[\"13\",\"33\",\"52\"]', '2024-10-17 21:01:34', '2024-10-17 21:01:34'),
(117, 'Nurbaya', 10, '2023-05-03', '[\"17\",\"28\"]', '2024-10-17 21:02:48', '2024-10-17 21:02:48'),
(118, 'Rahmilen', 5, '2023-05-04', '[\"13\",\"33\",\"52\"]', '2024-10-17 21:03:36', '2024-10-17 21:03:36'),
(119, 'Rahmilen', 10, '2023-05-04', '[\"17\",\"28\"]', '2024-10-17 21:04:29', '2024-10-17 21:04:29'),
(120, 'Indar', 10, '2023-05-04', '[\"17\",\"28\"]', '2024-10-17 21:05:26', '2024-10-17 21:05:26'),
(121, 'Siti Karnia', 10, '2023-05-15', '[\"17\",\"28\"]', '2024-10-17 21:05:56', '2024-10-17 21:05:56'),
(122, 'Abdul Maulid', 10, '2023-05-15', '[\"17\",\"28\"]', '2024-10-17 21:06:45', '2024-10-17 21:06:45'),
(123, 'La Ode Suhardin', 10, '2023-05-15', '[\"17\",\"28\"]', '2024-10-17 21:07:41', '2024-10-17 21:07:41'),
(124, 'La Ode Ghalib', 10, '2023-05-15', '[\"17\",\"28\"]', '2024-10-17 21:08:38', '2024-10-17 21:08:38'),
(125, 'Baharudin', 10, '2023-05-19', '[\"17\",\"28\"]', '2024-10-17 21:09:15', '2024-10-17 21:09:15'),
(126, 'Baharudin', 5, '2023-05-19', '[\"13\",\"33\",\"52\"]', '2024-10-17 21:09:55', '2024-10-17 21:09:55'),
(127, 'Baharudin', 6, '2023-05-19', '[\"12\",\"16\"]', '2024-10-17 21:11:06', '2024-10-17 21:11:06'),
(128, 'Baharudin', 7, '2023-05-19', '[\"22\",\"38\",\"46\",\"51\"]', '2024-10-17 21:13:02', '2024-10-17 21:13:02'),
(129, 'Faisal', 5, '2023-05-22', '[\"13\",\"33\",\"52\"]', '2024-10-17 21:14:10', '2024-10-17 21:14:10'),
(130, 'Faisal', 10, '2023-05-22', '[\"17\",\"28\"]', '2024-10-17 21:15:17', '2024-10-17 21:15:17'),
(131, 'Arif', 10, '2023-05-30', '[\"17\",\"28\"]', '2024-10-17 21:15:48', '2024-10-17 21:15:48'),
(132, 'Arif', 12, '2023-05-30', '[\"31\",\"32\"]', '2024-10-17 21:16:42', '2024-10-17 21:16:42'),
(133, 'Arif', 5, '2023-04-05', '[\"13\",\"33\",\"52\"]', '2024-10-17 21:17:50', '2024-10-17 21:17:50'),
(134, 'Arif', 6, '2023-05-30', '[\"12\",\"16\"]', '2024-10-17 21:18:44', '2024-10-17 21:18:44'),
(135, 'Arif', 4, '2023-05-30', '[\"1\",\"12\",\"29\"]', '2024-10-17 21:19:50', '2024-10-17 21:19:50'),
(136, 'Arif', 5, '2023-05-30', '[\"13\",\"33\",\"52\"]', '2024-10-17 21:23:25', '2024-10-17 21:23:25'),
(137, 'Arif', 7, '2023-05-30', '[\"22\",\"33\",\"51\"]', '2024-10-17 21:26:05', '2024-10-17 21:26:05'),
(138, 'Mangi', 5, '2023-06-08', '[\"13\",\"33\",\"52\"]', '2024-10-17 21:27:27', '2024-10-17 21:27:27'),
(139, 'Mangi', 10, '2023-06-08', '[\"17\",\"28\"]', '2024-10-17 21:28:21', '2024-10-17 21:28:21'),
(140, 'Jamaludin', 10, '2023-06-09', '[\"17\",\"28\"]', '2024-10-17 21:28:58', '2024-10-17 21:28:58'),
(141, 'Rusli', 10, '2023-06-12', '[\"17\",\"28\"]', '2024-10-17 21:33:17', '2024-10-17 21:33:17'),
(142, 'Poktan Lampareng', 4, '2023-07-13', '[\"1\",\"12\"]', '2024-10-17 21:35:00', '2024-10-17 21:35:00'),
(143, 'Poktan Lampareng', 10, '2023-07-13', '[\"8\",\"17\",\"28\"]', '2024-10-17 21:37:03', '2024-10-17 21:37:03'),
(144, 'Poktan Lampareng', 7, '2023-06-14', '[\"22\",\"46\",\"51\"]', '2024-10-17 21:38:35', '2024-10-17 21:38:35'),
(145, 'Poktan Tunas Baru', 10, '2023-07-16', '[\"8\",\"17\",\"28\"]', '2024-10-17 21:40:28', '2024-10-17 21:40:28'),
(146, 'Alifin', 4, '2023-07-16', '[\"9\",\"12\"]', '2024-10-17 21:41:44', '2024-10-17 21:41:44'),
(147, 'Alifin', 10, '2023-07-16', '[\"8\",\"17\",\"28\"]', '2024-10-17 21:43:51', '2024-10-17 21:43:51'),
(148, 'Mulyati', 10, '2023-07-18', '[\"8\",\"17\",\"28\"]', '2024-10-17 21:44:30', '2024-10-17 21:44:30'),
(149, 'La Iru', 10, '2023-07-23', '[\"8\",\"17\",\"28\",\"29\"]', '2024-10-17 21:45:22', '2024-10-17 21:45:22'),
(150, 'Poktan Wanggu Utama', 7, '2023-07-31', '[\"22\",\"46\",\"51\"]', '2024-10-17 21:46:28', '2024-10-17 21:46:28'),
(151, 'Poktan Wanggu Utama', 10, '2023-07-31', '[\"8\",\"17\",\"28\"]', '2024-10-17 21:47:53', '2024-10-17 21:47:53'),
(152, 'Poktan Wanggu Utama', 7, '2023-07-31', '[\"46\",\"51\"]', '2024-10-17 21:50:07', '2024-10-17 21:50:07'),
(153, 'Harun', 10, '2023-08-01', '[\"8\",\"17\",\"28\",\"41\"]', '2024-10-17 21:51:23', '2024-10-17 21:51:23'),
(154, 'Saleh', 10, '2023-08-01', '[\"8\",\"17\",\"28\",\"41\"]', '2024-10-17 21:52:20', '2024-10-17 21:52:20'),
(155, 'Arif', 7, '2023-08-01', '[\"22\",\"46\",\"51\"]', '2024-10-17 21:53:14', '2024-10-17 21:53:14'),
(156, 'Burhan', 10, '2023-08-02', '[\"8\",\"17\",\"28\",\"41\"]', '2024-10-17 21:55:24', '2024-10-17 21:55:24'),
(157, 'Hatta', 4, '2023-08-02', '[\"1\",\"12\",\"29\"]', '2024-10-17 22:24:04', '2024-10-17 22:24:04'),
(158, 'Karim', 10, '2023-08-03', '[\"8\",\"17\",\"28\",\"41\"]', '2024-10-17 22:25:19', '2024-10-17 22:25:19'),
(159, 'Jaslan', 4, '2023-08-03', '[\"1\",\"12\",\"29\"]', '2024-10-17 22:26:26', '2024-10-17 22:26:26'),
(160, 'Trinita', 10, '2023-09-01', '[\"8\",\"17\",\"28\"]', '2024-10-17 22:27:05', '2024-10-17 22:27:05'),
(161, 'La Ode Galip', 10, '2023-09-12', '[\"8\",\"17\",\"28\"]', '2024-10-17 22:27:41', '2024-10-17 22:27:41'),
(163, 'Anton', NULL, '2024-10-21', '[\"1\",\"8\",\"16\",\"28\"]', '2024-10-20 16:34:09', '2024-10-20 16:34:09'),
(164, 'Arif', 10, '2024-10-21', '[\"8\",\"28\"]', '2024-10-20 16:38:49', '2024-10-20 16:38:49'),
(165, 'adam', 2, '2012-02-20', '[\"2\",\"5\",\"49\"]', '2024-12-29 01:24:23', '2024-12-29 01:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_01_124319_create_data_gejalas_table', 1),
(5, '2024_08_01_132535_create_penyakits_table', 1),
(6, '2024_08_01_132606_create_aturans_table', 1),
(7, '2024_08_01_132618_create_laporan__bulanans_table', 1),
(8, '2024_08_01_133719_create_solusis_table', 1),
(9, '2024_08_08_125436_add_image_and_deskripsi_to_penyakit_table', 1),
(10, '2024_09_17_233828_add_role_to_user', 2),
(11, '2024_10_17_064630_add_gejala_to_laporan_bulanan_table', 3),
(12, '2024_10_17_065336_add_timestamp_to_laporan_bulanan_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `penyakits`
--

CREATE TABLE `penyakits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Penyakit` varchar(255) NOT NULL,
  `KodePenyakit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyakits`
--

INSERT INTO `penyakits` (`id`, `Penyakit`, `KodePenyakit`, `created_at`, `updated_at`, `image`, `deskripsi`) VALUES
(1, 'Bovine Ephemeral fever', 'P01', NULL, '2024-08-24 18:16:50', 'iM4PUYiodWGxZYSoU608LEP46lcJrrCKWiXq1dsY.jpg', 'Bovine Ephemeral Fever (BEF) atau Demam Tiga Hari adalah penyakit viral pada sapi dan kerbau yang disebabkan oleh virus Ephemerovirus. Penyakit ini ditandai dengan demam tinggi, kekakuan otot, dan kelemahan yang biasanya berlangsung selama tiga hari. BEF ditularkan melalui vektor seperti nyamuk dan dapat menyebabkan penurunan produktivitas pada ternak.'),
(2, 'Bovine Viral Diare', 'P02', NULL, '2024-08-24 18:18:00', 'vYEKALp3ZQ9ZVgRgWJHI5lZUqCScjwWLuP7DJsk4.jpg', 'Bovine Viral Diarrhea (BVD) adalah penyakit menular pada sapi yang disebabkan oleh virus Bovine Viral Diarrhea Virus (BVDV) dari keluarga Flaviviridae. Penyakit ini dapat menyebabkan diare, penurunan produksi, gangguan reproduksi, hingga kematian, terutama pada sapi muda. BVD juga bisa menyebabkan infeksi kronis dan masalah imunosupresi yang membuat sapi rentan terhadap penyakit lain.'),
(3, 'Salmonellosis', 'P03', NULL, '2024-08-24 18:21:37', '1eCmQn4IWS00DCTOpSx0sEsDRrlZVzTSFw5obrIe.jpg', 'Salmonellosis adalah penyakit bakteri pada sapi yang disebabkan oleh bakteri Salmonella. Penyakit ini dapat menyebabkan diare parah, demam, dehidrasi, penurunan berat badan, dan bahkan kematian, terutama pada anak sapi. Salmonellosis juga bisa menular ke manusia melalui kontak langsung atau konsumsi produk hewani yang terkontaminasi.'),
(4, 'Infectious Bovine Rhinotracheitis', 'P04', NULL, '2024-08-24 18:28:18', 'zYhKypOuHiGWPtQdFYmYYiaJHz9xm7IHwGuijssd.jpg', 'Infectious Bovine Rhinotracheitis (IBR) adalah penyakit menular pada sapi yang disebabkan oleh Bovine Herpesvirus-1 (BHV-1). IBR menyerang saluran pernapasan dan ditandai dengan demam, batuk, keluarnya cairan dari hidung, dan peradangan pada saluran pernapasan. Selain itu, penyakit ini juga dapat menyebabkan gangguan reproduksi, seperti abortus pada sapi bunting.'),
(5, 'Pink eye', 'P05', NULL, '2024-08-28 20:47:37', 'GG29m6NXJFwGWOQvJp7lcSIJJk1tQpSgFvow3C7U.jpg', 'Pink eye adalah penyakit mata menular pada ternak, terutama sapi, kerbau, domba, dan kambing. Gejala klinis yang dapat dikenali berupa kemerahan dan peradangan pada konjungtiva serta kekeruhan pada kornea. Penyakit ini ditemukan hampir di seluruh dunia dan menimbulkan kerugian ekonomi yang signiﬁkan terutama pada industri peternakan.'),
(6, 'Tympany', 'P06', NULL, '2024-08-28 20:51:25', 'o9IxdMyzmKL1FLJxTETUl2NLRBCJ7WxydNOJSHa2.jpg', 'Kembung sering juga disebut tympani atau bloat adalah terjadinya penumpukan gas yang berlebihan pada perut bagian kiri sehingga kelihatan lebih menonjol. Keadaan ini membuat ternak tidak nyaman. Kembung pada ternak ruminansia bila tidak cepat ditangani bisa menyebabkan kematian pada ternak.'),
(7, 'Scabies', 'P07', NULL, '2024-08-28 20:52:06', 'RzMijjS4xoX5BgqT5PwtdheAkBhZdCAPBlQ3XO4i.jpg', 'Scabies atau kudis adalah penyakit yang ditandai dengan munculnya ruam seperti kulit berjerawat, bersisik, dan terasa gatal yang disebabkan oleh tungau bernama Sarcoptes Scabiei. Scabies adalah penyakit kulit yang menular. Sehingga, apabila seseorang melakukan kontak langsung dengan penderitanya, ada kemungkinan tungau penyebab kudis berpindah dan menjangkiti orang tersebut.'),
(8, 'Septichaemia Efizootica', 'P08', NULL, '2024-08-28 20:52:51', 'dB3bqshoOm6iEDdgrD6bxXMaovRkWl4L9iTULnmX.jpg', 'Penyakit Ngorok (tagere) atau nama lainnya penyakit Septicaemia Epizootica (SE) merupakan penyakit yang sering menyerang hewan/ternak ruminansia khususnya sapi dan kerbau yang sifatnya akut atau fatal.\r\nPenyakit ini sering terjadi terutama saat musim hujan tiba. Apabila sapi belum memiliki daya kekebalan tubuh terhadap penyakit SE dan dalam kondisi ketahanan tubuh yang menurun, maka dapat menyebabkan terjadinya serangan penyakit SE yang menyebabkan kematian pada ternak sapi'),
(9, 'Mastitis', 'P09', NULL, '2024-08-28 20:54:04', '1Zhv5dQF4wR838uszFhgp5kExjT9nqGm9kltbUic.jpg', 'Mastitis adalah peradangan yang terjadi pada payudara selama ibu menyusui (busui). Jika tidak teratasi dengan baik, penyakit ini dapat memicu infeksi yang menyebabkan rasa tidak nyaman dan nyeri selama menyusui.'),
(10, 'Helminthiasis', 'P10', NULL, '2024-08-28 20:54:44', 'aHTBrfAcvYDzpvEExWjfLDTVxX0Bk6FaKtsSb7rh.jpg', 'Helminthiasis pada sapi adalah kondisi yang disebabkan oleh infeksi parasit cacing, yang dikenal sebagai cacing nematoda/round worm (cacing gelang/gilig), cacing cestoda/tape worm (cacing pita) atau cacing trematoda/flat worm (cacing hisap/pipih)'),
(11, 'Artritis', 'P11', NULL, '2024-08-28 20:56:02', 'j7fXyNc8LpegunVksGj25MtseuQmIm1kKR1XcMBd.jpg', 'Artritis pada sapi adalah kondisi peradangan pada sendi yang menyebabkan rasa sakit, pembengkakan, dan penurunan mobilitas. Penyakit ini dapat disebabkan oleh berbagai faktor, termasuk infeksi, cedera, atau masalah degeneratif. Artritis dapat mempengaruhi satu atau lebih sendi pada sapi dan bisa bersifat akut (tiba-tiba) atau kronis (berkembang secara perlahan).'),
(12, 'Myasis', 'P12', NULL, '2024-08-28 20:56:54', 'kbHy2h1LbAu5akRd0RvxAs4PohPtrXtbR3bxzFhW.jpg', 'Myiasis diawali dengan adanya kelukaan pada tubuh hewan ternak. Kelukaan tersebut dapat disebabkan oleh berbagai macam faktor seperti gigitan serangga, operasi kastrasi, abses, kawat atau logam dan perkelahian antar ternak sehingga menjadi tempat untuk infestasi larva.'),
(13, 'Distokia', 'P13', NULL, '2024-08-28 20:57:46', 'VO8ReqA0SzYcE69ZEIHIVbWt8zAQExefGGOrHnK1.jpg', 'Distokia merupakan kejadian parturisi berkepanjangan yang disebabkan oleh gangguan atau kelainan pada komponen utama proses kelahiran. Komponen tersebut terdiri dari 3P yaitu kekuatan induk mengejan (power), kecukupan saluran kelahiran (passageway), serta ukuran dan posisi fetus (passenger)'),
(14, 'Infestasi Kutu', 'P14', NULL, '2024-08-28 20:58:29', 'hB4nMhwOOp6spDfIUDgOUeTGhWYyuOAUwmgbTTDf.jpg', 'Kutu merupakan masalah umum di musim dingin dan serangan berat serangga kecil bertubuh pipih ini dapat mengakibatkan kerugian ekonomi karena berkurangnya pertambahan berat badan dan \"ketidakhematan\" ternak yang terinfeksi. Pada anak sapi, serangan kutu sedang hingga berat telah menyebabkan penurunan pertambahan berat badan sebanyak 0,21 pon/hari, menurut sebuah studi dari University of Nebraska-Lincoln.'),
(15, 'Cystitis', 'P15', NULL, '2024-08-28 20:59:05', 'JZWpst1pagxiogcTAjP5mmAR493XmufE4WCUektv.jpg', 'Cystitis pada sapi adalah kondisi peradangan yang terjadi di kandung kemih. Gejala klinis sapi yang terkena cystitis meliputi anoreksia, demam tinggi, produksi susu menurun, hematuria (darah dalam urine), dan pyuria (nanah dalam urine).');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('a77f87mtx22ypVFVo9ZTo36lrCKcI64Or3zg8jfz', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibmRTdGJvaWw2bExXM0hFNlc2ZnFoZ0Iyd09qRlc3UEE0bzFORnJMNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQ/dGFodW49MjAyMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1735580411),
('KlLhvAvj1AAmnVQstS4K2vcEpb8eG9WIAQEVMPSG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1JMOEQyaThyNDhHQzhScEFOT29xV3BxRFVhbWVLamlEM3BJWG82YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735577130),
('mHMxwyAUiO1Qt7tFn8IsnaqWJ3qes0jFbYftc8FF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNE9tNTN4dGJrUHM5NE1oa3RFclBTMnc0MnhRNm1jdkVvYks2Nkc5dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9MYXBvcmFuLUJ1bGFuYW4/c2VhcmNoPWFyaWYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1735781666);

-- --------------------------------------------------------

--
-- Table structure for table `solusis`
--

CREATE TABLE `solusis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `solusi` varchar(1000) NOT NULL,
  `Pencegahan` varchar(1000) NOT NULL,
  `kd_penyakit` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `solusis`
--

INSERT INTO `solusis` (`id`, `solusi`, `Pencegahan`, `kd_penyakit`, `created_at`, `updated_at`) VALUES
(1, 'Penanganan Bovine Ephemeral Fever (BEF) melibatkan pemberian obat untuk meredakan gejala, istirahat dan nutrisi yang baik, serta pengendalian vektor seperti nyamuk. Vaksinasi bisa dilakukan untuk pencegahan, sementara kebersihan kandang juga penting untuk mengurangi risiko penularan.', '1. Peningkatan imunitas tubuh ternak,\r\n2. Vaksinasi, \r\n3. Menjaga sanitasi, \r\n4. Lingkungan dengan melakukan drainase yang bagus\r\n5. kondisi rumput dan semak di bersihkan, \r\n6. serta melakukan karantina pada hewan yang terinveksi.\r\n7. Mengontrol populsi nyamuk vektor.', 1, '2024-08-24 12:38:13', '2024-08-24 18:16:50'),
(2, 'Solusinya meliputi vaksinasi sebagai tindakan pencegahan, serta isolasi dan pengendalian hewan yang terinfeksi untuk mencegah penyebaran. Kebersihan dan manajemen peternakan yang baik juga penting dalam mengurangi risiko. Bagi hewan yang terinfeksi, perawatan simptomatis dan menjaga nutrisi dapat membantu pemulihan.', '	Manajemen pakan harus di perbaiki,\r\n	Minuman menggunakan air bersih, \r\n	Biosikuriti ternak dan kandang\r\n	serta melakukan karantina pada hewan yang terinveksi.', 2, '2024-08-24 18:18:00', '2024-08-24 18:18:00'),
(3, 'Solusinya melibatkan pemberian antibiotik yang sesuai, meskipun pencegahan lebih diutamakan melalui vaksinasi, manajemen kebersihan kandang, dan isolasi hewan yang terinfeksi. Penting juga untuk menjaga sanitasi dan kualitas pakan agar mengurangi risiko infeksi.', 'Vaksinasi, tindakan sanitasi terhadap kandang, peralatan dan lingkungan peternakan, serta fumigasi penetasan telur ayam, pencegahan masuknya hewan carrier atau hewan terinfeksi, pemberantasan vektor seperti burung-burung liar, rodensia, atau serangga di sekitar peternakan, rotasi tempat penggembalaan, pakan bernutrisi dan multivitamin.', 3, '2024-08-24 18:21:37', '2024-08-24 18:21:37'),
(4, 'Solusi untuk IBR meliputi vaksinasi sebagai langkah pencegahan utama. Isolasi sapi yang terinfeksi sangat penting untuk mencegah penyebaran. Perawatan simptomatis, seperti pemberian antibiotik sekunder untuk mencegah infeksi bakteri tambahan, dan menjaga kebersihan kandang juga membantu mengendalikan penyakit ini.', 'Vaksinasi dan Sanitasi Kandang', 4, '2024-08-24 18:28:18', '2024-08-24 18:28:18'),
(7, '	Menjaga kebersihan kandang dan lingkungan, \r\n	Menjaga kualitas pakan, \r\n	Menjaga populasi kandang tidak terlalu padat,\r\n	Pemberantasan vektor,\r\n	Karantina hewan sakit,\r\n	Pada kasus parah hindari dari paparan sinar matahari secara langsung', '	Menjaga kebersihan kandang dan lingkungan, \r\n	Menjaga kualitas pakan, \r\n	Menjaga populasi kandang tidak terlalu padat,\r\n	Pemberantasan vektor,\r\n	Karantina hewan sakit,\r\n	Pada kasus parah hindari dari paparan sinar matahari secara langsung', 5, '2024-08-28 18:36:02', '2024-08-28 18:55:58'),
(8, '	Menjaga kebersihan kandang dan lingkungan, \r\n	Menjaga kualitas pakan, \r\n	Menjaga populasi kandang tidak terlalu padat,\r\n	Pemberantasan vektor,\r\n	Karantina hewan sakit,\r\n	Pada kasus parah hindari dari paparan sinar matahari secara langsung', '	Menjaga kebersihan kandang dan lingkungan, \r\n	Menjaga kualitas pakan, \r\n	Menjaga populasi kandang tidak terlalu padat,\r\n	Pemberantasan vektor,\r\n	Karantina hewan sakit,\r\n	Pada kasus parah hindari dari paparan sinar matahari secara langsung', 6, '2024-08-28 18:40:28', '2024-08-28 20:51:25'),
(9, '	Menjaga sanitasi kandang dan pemberian pakan yang baik,\r\n	Ternak yang baru datang harus diisolasi (jangan langsung dicampur) selama beberapa minggu sampai dipastikan benar – benar sehat,\r\n	Hewan tertular dikarantina, \r\n	Kandang tercemar dibersihkan dan didesinfektan', '	Menjaga sanitasi kandang dan pemberian pakan yang baik,\r\n	Ternak yang baru datang harus diisolasi (jangan langsung dicampur) selama beberapa minggu sampai dipastikan benar – benar sehat,\r\n	Hewan tertular dikarantina, \r\n	Kandang tercemar dibersihkan dan didesinfektan', 7, '2024-08-28 18:41:01', '2024-08-28 18:54:45'),
(10, '	Perketat lalu lintas ternak,\r\n	Hewan suspek dikarantina', '	Perketat lalu lintas ternak,\r\n	Hewan suspek dikarantina', 8, '2024-08-28 18:41:36', '2024-08-28 18:54:17'),
(11, '	Kandang harus bersih,\r\n	Kandang diupayakan kering\r\n	Ambing diupayakan tidak langsung menelpel pada lantai kandang kotor,\r\n	Upayakan perah susu saat pedet tidak mau menyusui\r\n	Bantu menyusui pedet secara merata pada semua ambing (jangan salah satu ambing saja)', '	Kandang harus bersih,\r\n	Kandang diupayakan kering\r\n	Ambing diupayakan tidak langsung menelpel pada lantai kandang kotor,\r\n	Upayakan perah susu saat pedet tidak mau menyusui\r\n	Bantu menyusui pedet secara merata pada semua ambing (jangan salah satu ambing saja', 9, '2024-08-28 18:42:16', '2024-08-28 20:54:04'),
(12, '	Menjaga kebersihan kandang,\r\n	Hindari menggembala terlalu pagi saat masih berembun\r\n	Pemberian obat cacing berkala', '	Menjaga kebersihan kandang,\r\n	Hindari menggembala terlalu pagi saat masih berembun\r\n	Pemberian obat cacing berkala', 10, '2024-08-28 18:42:43', '2024-08-28 20:54:44'),
(13, '	menjaga hewan tetap kering, \r\n	membersihkan luka, \r\n	menjaga kebersihan kandang', '	menjaga hewan tetap kering, \r\n	membersihkan luka, \r\n	menjaga kebersihan kandang', 11, '2024-08-28 18:43:20', '2024-08-28 18:52:36'),
(14, '	Menjaga kebersihan kandang\r\n	Luka segera diobati,\r\n	Luka terhindar dari terkena kotoran\r\n	Berantas lalat agar tidak bertelur', '	Menjaga kebersihan kandang\r\n	Luka segera diobati,\r\n	Luka terhindar dari terkena kotoran\r\n	Berantas lalat agar tidak bertelur', 12, '2024-08-28 18:43:46', '2024-08-28 18:52:08'),
(15, '	Pengaturan manajemen pakan yang baik sebelum dan saat kebuntingan.\r\n	Sapi tidak di IB dengan semen ras yang ukuran badan lebih besar,\r\n	Pencegahan penyakit reproduksi sapi seperti Salmonellosis dan Brucellosis.\r\n	Exercise yang cukup pada sapi bunting,\r\n	Pengawasan kebuntingan sejak dini\r\n	Pemeriksaanorganreproduksi', '	Pengaturan manajemen pakan yang baik sebelum dan saat kebuntingan.\r\n	Sapi tidak di IB dengan semen ras yang ukuran badan lebih besar,\r\n	Pencegahan penyakit reproduksi sapi seperti Salmonellosis dan Brucellosis.\r\n	Exercise yang cukup pada sapi bunting,\r\n	Pengawasan kebuntingan sejak dini\r\n	Pemeriksaanorganreproduksi', 13, '2024-08-28 18:44:19', '2024-08-28 20:57:46'),
(16, '	Kandang harus bersih\r\n	Rutin pembersihan kandang,\r\n	Desinfeksi kandang\r\n	Mandikan ternak secara rutin', '	Kandang harus bersih\r\n	Rutin pembersihan kandang,\r\n	Desinfeksi kandang\r\n	Mandikan ternak secara rutin', 14, '2024-08-28 18:44:50', '2024-08-28 18:50:56'),
(17, '	Beri pakan berkualitas, \r\n	Biosecuriti lingkungan sekitar', '	Beri pakan berkualitas, \r\n	Biosecuriti lingkungan sekitar', 15, '2024-08-28 18:47:04', '2024-08-28 18:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Test User', 'test@example.com', NULL, '$2y$12$LVW6SIHt/PfGvMLl0zj0b.g46GnppAiV53F.oE8EpFLggUX2C8kc6', NULL, '2024-08-14 21:05:14', '2024-08-14 21:05:14', 'admin'),
(2, 'Sapi', 'sapi@gmail.com', NULL, '$2y$12$RM5EXVoC8LVZbsIfKRv2RelDAHxNVy5L9L5c8uUcQ21vGISJDbs.u', NULL, '2024-09-17 16:12:03', '2024-09-17 16:12:03', 'user'),
(3, 'Mildawati', 'mildawati@gmail.com', NULL, '$2y$12$yKTWanhgq8pppDigqKORLOZvBtl/c15ZBFG4Mv4Fc8nM.qNdDZtma', NULL, '2024-09-17 16:27:12', '2024-09-17 16:27:12', 'user'),
(4, 'Mails', 'iyokune.gamingyt@gmail.com', NULL, '$2y$12$ZGbOhcRvEoxTfRyXlEGdIejzFze3DrlLFdpOlK3rvDZVaE.DGAjmO', NULL, '2024-09-18 22:33:38', '2024-09-18 22:33:38', 'user'),
(5, 'Mildawati', 'milda@gmail.com', NULL, '$2y$12$QDaQlzvaeXc/FfEDWqIhGOGBmHbrdyYGvVU2ki5UQRXXNZoXEl7kS', NULL, '2024-09-19 18:11:40', '2024-09-19 18:11:40', 'user'),
(6, 'Users111', 'usersmails@gmail.com', NULL, '$2y$12$1jgrv8KKQOfQyULf.m3aeOQna4Jyi9DdMIkJPKUlIahgqt5QQTLfu', NULL, '2024-09-22 13:53:19', '2024-09-22 13:53:19', 'user'),
(7, 'iis dahlia', 'kamisama79.hamok@gmail.com', NULL, '$2y$12$i.cHCm.gp3Ugkw1fFy0tMOSzbE9uoZBBZFYmdGUr3iB/QKD/GpR.C', NULL, '2024-10-01 00:34:12', '2024-10-01 00:34:12', 'user'),
(8, 'iis dahlia', 'ilham.wpt021@gmail.com', NULL, '$2y$12$nNjFO0oniCoy4AvbCcnmaO3n5MwACVY67mkj3IOq9ywXPXyAXTV2W', NULL, '2024-10-04 22:01:07', '2024-10-04 22:01:07', 'user'),
(9, 'Mildawati', 'milda222@gmail.com', NULL, '$2y$12$nrURsVA8tw8B7U4iAiT/Ke5cmeIZNDczmpIZP.ZEuQpqruJD3UhgS', NULL, '2024-10-08 01:02:14', '2024-10-08 01:02:14', 'user'),
(10, 'testingcesk', 'tesss@gmai.com', NULL, '$2y$12$3IABDw/ulhXmnzNZnlyp7uDw.BmURZ6WgZPwo/kw.YD9yLdgmgISm', NULL, '2024-10-12 02:42:16', '2024-10-12 02:42:16', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturans`
--
ALTER TABLE `aturans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aturans_id_gejala_foreign` (`id_gejala`),
  ADD KEY `aturans_id_penyakit_foreign` (`id_penyakit`);

--
-- Indexes for table `data_gejalas`
--
ALTER TABLE `data_gejalas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan__bulanans`
--
ALTER TABLE `laporan__bulanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan__bulanans_kdpenyakit_foreign` (`kdPenyakit`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakits`
--
ALTER TABLE `penyakits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `solusis`
--
ALTER TABLE `solusis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solusis_kd_penyakit_foreign` (`kd_penyakit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturans`
--
ALTER TABLE `aturans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `data_gejalas`
--
ALTER TABLE `data_gejalas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `laporan__bulanans`
--
ALTER TABLE `laporan__bulanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penyakits`
--
ALTER TABLE `penyakits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `solusis`
--
ALTER TABLE `solusis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aturans`
--
ALTER TABLE `aturans`
  ADD CONSTRAINT `aturans_id_gejala_foreign` FOREIGN KEY (`id_gejala`) REFERENCES `data_gejalas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aturans_id_penyakit_foreign` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakits` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laporan__bulanans`
--
ALTER TABLE `laporan__bulanans`
  ADD CONSTRAINT `laporan__bulanans_kdpenyakit_foreign` FOREIGN KEY (`kdPenyakit`) REFERENCES `penyakits` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `solusis`
--
ALTER TABLE `solusis`
  ADD CONSTRAINT `solusis_kd_penyakit_foreign` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakits` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 11:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantshop.id`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(5, 'Admin', 'admin@admin', '2021-01-24 03:30:49', '$2y$10$wrndHL9.fer.5b1wI/QaQ.BXPUrNgR9egyjKitnhGuyqrtmhUgMTG', NULL, NULL, NULL, NULL, NULL, '2021-01-24 03:30:53', '2021-01-24 03:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `bankdata`
--

CREATE TABLE `bankdata` (
  `id_bankdata` int(11) NOT NULL,
  `nama_tanaman` varchar(50) DEFAULT NULL,
  `nama_latin` varchar(50) DEFAULT NULL,
  `foto_sampul` text DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_jenisTanaman` int(11) DEFAULT NULL,
  `spesifikasi` text DEFAULT NULL,
  `hastag` text DEFAULT NULL,
  `caraPerawatan` varchar(50) DEFAULT NULL,
  `kebutuhanSinar` varchar(50) DEFAULT NULL,
  `kebutuhanAir` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `hargaMax` int(11) DEFAULT NULL,
  `hargaMin` int(11) DEFAULT NULL,
  `idMediaTanam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankdata`
--

INSERT INTO `bankdata` (`id_bankdata`, `nama_tanaman`, `nama_latin`, `foto_sampul`, `id_kategori`, `id_jenisTanaman`, `spesifikasi`, `hastag`, `caraPerawatan`, `kebutuhanSinar`, `kebutuhanAir`, `created_at`, `updated_at`, `deleted_at`, `hargaMax`, `hargaMin`, `idMediaTanam`) VALUES
(32, 'Sansevieria Hahnii', 'Sansevieria Trifasciata Hahnii', '1611654813_117379062_2376386379332918_4363005099424012626_n.jpg', 521, 1, 'Kenapa sanseviera?*\r\n1. menyerap polusi udara sekitar, jadi udara sekitarmu akan lebih bersih.\r\n2. menetralisir racun-racun di lingkunganmu, pas bngt ya untuk kondisi pandemi gini, paling tdk bs menjaga agar lingkungan lebih sehat\r\n3. menghasilkan oksigen kualitas bagus, nah lho itu penting bngt buat kita hirup setiap detik\r\n4. untuk spot green decor ruang kerja, supaya makin kece makin semangat, jd mood boster kan\r\n5. bukti cinta lingkungan, klo cinta dibuktikan kan ga hanya diomongkan hehe, mari tebwrkan racun-racun cinta tanaman.', '#plantshop.id', 'indoor', 'low', 'low', '2021-01-26 02:53:33', '2021-01-26 02:53:33', NULL, 200000, 20000, 17),
(33, 'Ketapang Biola', 'Ficus Lyrata', '1611656420_119889653_709974516398259_8577975425226781378_n.jpg', 525, 1, 'Pohon ketapang biola adalah salah satu jenis pohon ketapang yang cukup unik dan tentu saja berbeda dari jenis lainnya. Jenis ini cukup berbeda, sebab jenis ketapang lainnya biasa cepat tumbuh hingga setingga bermeter-meter dan selalu dimanfaatkan menjadi perindang dan peneduh rumah. Pohon ketapang biola biasa dijadikan tanaman hias karena tingginya yang bisa dikontrol dan memiliki daun yang indah.', '#plantshop.id', 'indoor', 'low', 'medium', '2021-01-26 03:20:20', '2021-01-26 03:20:20', NULL, 300000, 60000, 17),
(34, 'Monstera Borsigiana', 'Monstrous', '1611658051_120579909_637060663622150_5110623854905112780_n.jpg', 523, 1, 'klo yg merambat itu jenisnya namanya monstera borsigiana, klo sdh merambat cakep bngt dikasih turus penyangga. Kudu sabar menanti dia bs merambat dan nikmati prosesnya aja.', '#plantshop.id', 'indoor', 'low', 'low', '2021-01-26 03:47:31', '2021-01-26 03:47:31', NULL, 1500000, 250, 17),
(35, 'Monstera Deliciosa', 'Monstrous', '1611658873_116157093_2914103962196514_7811536604181121945_n.jpg', 523, 1, 'Monstera deliciosa adalah tanaman yang sekarang ini menjadi idola untuk menghiasi bagian eksterior maupun interior rumah. Jenis tanaman hias ini terkenal susah-susah gampang untuk dirawat.', '#plantshop.id', 'indoor', 'low', 'low', '2021-01-26 04:01:13', '2021-01-26 04:01:13', NULL, 1000000, 50000, 17),
(36, 'Kaktus Koboi', 'Cereus Peruvianus', '1611659926_106256583_319988779159318_1846119799306041766_n.jpg', 524, 1, 'merupakan jenis kaktus yang paling banyak diminati karena memiliki bentuk  yang unik.\r\nBentuknya simple, memajang vertikal dan ada juga yang memiliki cabang.\r\nKaktus jenis ini cocok ditanam di tanah yang kering.\r\nSelain di outdoor, kaktus koboi juga bisa bertahan di dalam ruangan.', '#plantshop.id', 'indoor', 'low', 'low', '2021-01-26 04:18:46', '2021-01-26 04:18:46', NULL, 1200000, 15000, 17),
(37, 'qe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-29 18:42:43', '2021-01-29 18:42:43', NULL, NULL, NULL, NULL),
(38, 'Test', 'Latin test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-02 03:14:22', '2021-02-02 03:14:22', NULL, NULL, NULL, NULL),
(39, 'tanaman hias antorium gelombang cinta', 'lalala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-02 03:19:05', '2021-02-02 03:19:05', NULL, NULL, NULL, NULL),
(40, 'Lidah Mertua', 'Lidah Mertua\'s', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-02 03:22:54', '2021-02-02 03:22:54', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_latin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `Created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_sampul` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hargaAwal` int(11) DEFAULT NULL,
  `hargaJual` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `panjang` int(11) DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `id_subKategori` int(11) DEFAULT NULL,
  `id_induk` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `hargaReseler` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `deskripsi`, `kode`, `nama_barang`, `nama_latin`, `created_at`, `updated_at`, `id_kategori`, `berat`, `deleted_at`, `Created_by`, `gambar_sampul`, `hargaAwal`, `hargaJual`, `diskon`, `panjang`, `lebar`, `tinggi`, `id_subKategori`, `id_induk`, `status`, `hargaReseler`) VALUES
(258, 'Keterangan', 'S1', 'tanaman hias antorium gelombang cinta', 'lalala', '2021-02-02 03:19:05', '2021-02-04 06:47:12', 521, 10, NULL, NULL, '1612261145_logo.jpg', 90000, 90000, 0, 1, 2, 1, 38, 1, NULL, NULL),
(259, 'Keterangan', 'K1', 'Lidah Mertua', 'Lidah Mertua\'s', '2021-02-02 03:22:54', '2021-02-07 11:37:43', 524, 90, NULL, NULL, '1612261374_531c8cf1c00fccf123489baefb5ec421.jfif', 9000, 90000, 0, 3, 1, 9, 41, 4, 0, NULL),
(261, 'Keterangan', '[1', 'Pupuk Gandum', NULL, '2021-02-07 11:54:50', '2021-02-07 12:00:57', NULL, NULL, '2021-02-06 17:00:00', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 38, 3, NULL, NULL),
(262, 'Keterangan', '2', 'pupuk', NULL, '2021-02-07 12:01:36', '2021-02-07 12:01:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dekor`
--

CREATE TABLE `dekor` (
  `id_dekor` int(11) NOT NULL,
  `identitas` int(11) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `id_jenisDekor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dekor`
--

INSERT INTO `dekor` (`id_dekor`, `identitas`, `judul`, `foto`, `id_jenisDekor`) VALUES
(27, 1, '#plantshop.id', '1611458756_png-clipart-default-profile-united-states-computer-icons-desktop-free-high-quality-person-icon-miscellaneous-silhouette-thumbnail.png', 1),
(28, 1, '#plantshop.id', '1611458756_sepatu.jpg', 1),
(29, 1, '#plantshop.id', '1611458756_universitas-internasional-semen-indonesia.png', 2),
(30, 2, '#plantshop.id', '1611458769_png-clipart-default-profile-united-states-computer-icons-desktop-free-high-quality-person-icon-miscellaneous-silhouette-thumbnail.png', 2),
(31, 2, '#plantshop.id', '1611458770_sepatu.jpg', 1),
(32, 2, '#plantshop.id', '1611458770_universitas-internasional-semen-indonesia.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_bankdata`
--

CREATE TABLE `detail_bankdata` (
  `id_detailtanaman` int(11) NOT NULL,
  `id_bankdata` int(11) NOT NULL,
  `foto` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` text NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_barang`
--

INSERT INTO `detail_barang` (`id`, `created_at`, `updated_at`, `foto`, `id_barang`, `deleted_at`, `created_by`) VALUES
(225, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611636344_117379062_2376386379332918_4363005099424012626_n.jpg', 220, NULL, NULL),
(226, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611636605_118091674_909233746230081_1573917350019232619_n.jpg', 221, NULL, NULL),
(227, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611637562_119889653_709974516398259_8577975425226781378_n.jpg', 222, NULL, NULL),
(228, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611638267_120102062_355905712266042_5397813795843920030_n.jpg', 223, NULL, NULL),
(229, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611655313_117379062_2376386379332918_4363005099424012626_n.jpg', 243, NULL, NULL),
(230, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611656542_119889653_709974516398259_8577975425226781378_n.jpg', 244, NULL, NULL),
(231, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611656740_129734233_854592102034668_7858834716499248668_n.jpg', 245, NULL, NULL),
(232, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611656896_129737438_387323682540448_3925901212232588583_n.jpg', 246, NULL, NULL),
(233, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611658192_120579909_637060663622150_5110623854905112780_n.jpg', 247, NULL, NULL),
(234, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611658192_120577724_113297587076195_3503733777487342630_n.jpg', 247, NULL, NULL),
(235, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611658377_120742205_2039730862829125_622413524865851647_n.jpg', 248, NULL, NULL),
(236, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611658377_120808417_334395967980308_1892147404817921297_n.jpg', 248, NULL, NULL),
(237, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611658924_116157093_2914103962196514_7811536604181121945_n.jpg', 249, NULL, NULL),
(238, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611660017_106256583_319988779159318_1846119799306041766_n.jpg', 250, NULL, NULL),
(239, '2021-01-25 17:00:00', '2021-01-25 17:00:00', '1611660117_115911241_100390238424428_5888136177139201410_n.jpg', 251, NULL, NULL),
(240, '2021-01-30 17:00:00', '2021-01-30 17:00:00', '1612058281_123363396_721320501832637_4738528543747095526_n.jpg', 256, NULL, NULL),
(241, '2021-01-30 17:00:00', '2021-01-30 17:00:00', '1612058281_129550008_2937493509829323_8661066100202004706_n.jpg', 256, NULL, NULL),
(242, '2021-01-30 17:00:00', '2021-01-30 17:00:00', '1612058281_130072607_194336605573909_2852214673840981442_n.jpg', 256, NULL, NULL),
(243, '2021-02-01 17:00:00', '2021-02-01 17:00:00', '1612260862_123363396_721320501832637_4738528543747095526_n.jpg', 257, NULL, NULL),
(244, '2021-02-01 17:00:00', '2021-02-01 17:00:00', '1612260862_129550008_2937493509829323_8661066100202004706_n.jpg', 257, NULL, NULL),
(245, '2021-02-01 17:00:00', '2021-02-01 17:00:00', '1612260862_130072607_194336605573909_2852214673840981442_n.jpg', 257, NULL, NULL),
(246, '2021-02-01 17:00:00', '2021-02-01 17:00:00', '1612261145_123363396_721320501832637_4738528543747095526_n.jpg', 258, NULL, NULL),
(247, '2021-02-01 17:00:00', '2021-02-01 17:00:00', '1612261145_129550008_2937493509829323_8661066100202004706_n.jpg', 258, NULL, NULL),
(248, '2021-02-01 17:00:00', '2021-02-01 17:00:00', '1612261145_130072607_194336605573909_2852214673840981442_n.jpg', 258, NULL, NULL),
(249, '2021-02-01 17:00:00', '2021-02-01 17:00:00', '1612261374_2018_09_21T13_31_31_07_00.jpg', 259, NULL, NULL),
(250, '2021-02-01 17:00:00', '2021-02-01 17:00:00', '1612261374_558751e78713f56f5d73c618633d63cf.jpg', 259, NULL, NULL),
(251, '2021-02-01 17:00:00', '2021-02-01 17:00:00', '1612261374_tanaman-hias-daun-2-Wikipedia.jpg', 259, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(11) NOT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hargaPenjualan` int(11) DEFAULT NULL,
  `diskonpenjualan` int(11) DEFAULT NULL,
  `deskripsiDiskon` text DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `id_penjualan`, `id_barang`, `created_at`, `updated_at`, `hargaPenjualan`, `diskonpenjualan`, `deskripsiDiskon`, `admin_id`) VALUES
(203, 174, 259, '2021-02-07 11:37:43', '2021-02-07 11:37:43', 90000, 0, 'Rupiah', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `induk_kategori`
--

CREATE TABLE `induk_kategori` (
  `id_indukKategori` int(11) NOT NULL,
  `nama_indukKategori` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `induk_kategori`
--

INSERT INTO `induk_kategori` (`id_indukKategori`, `nama_indukKategori`, `updated_at`, `created_at`) VALUES
(1, 'Tanaman', NULL, NULL),
(3, 'Pupuk', '2021-02-07 18:29:39', '2021-02-07 18:29:39'),
(4, 'Vas', '2021-02-07 18:29:48', '2021-02-07 18:29:48'),
(5, 'Rotan', '2021-02-07 18:29:58', '2021-02-07 18:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `jenisdekor`
--

CREATE TABLE `jenisdekor` (
  `id_jenisDekor` int(11) NOT NULL,
  `nama_jenisDekor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenisdekor`
--

INSERT INTO `jenisdekor` (`id_jenisDekor`, `nama_jenisDekor`) VALUES
(1, 'green dekor'),
(2, 'home dekor');

-- --------------------------------------------------------

--
-- Table structure for table `jenistanaman`
--

CREATE TABLE `jenistanaman` (
  `id_jenisTanaman` int(11) NOT NULL,
  `nama_jenisTanaman` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenistanaman`
--

INSERT INTO `jenistanaman` (`id_jenisTanaman`, `nama_jenisTanaman`, `created_at`, `updated_at`) VALUES
(1, 'kering', '2021-01-23 11:38:59', '2021-01-23 04:54:52'),
(2, 'basah', '2021-01-23 04:46:47', '2021-01-23 04:46:47'),
(3, 'tes daftar', '2021-01-23 05:25:54', '2021-01-23 05:42:21'),
(4, 'wer2', '2021-01-23 10:18:53', '2021-01-23 10:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(521, 'Sansevieria', '2021-01-24 04:27:58', '2021-01-26 01:37:00'),
(523, 'Monstera', '2021-01-26 01:30:44', '2021-01-26 01:37:07'),
(524, 'Kaktus', '2021-01-26 01:39:32', '2021-01-26 01:39:32'),
(525, 'Ketapang', '2021-01-26 10:16:46', '2021-01-26 10:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_users`, `id_barang`, `created_at`, `updated_at`) VALUES
(28, 3, 243, '2021-01-29 03:50:14', '2021-01-29 03:50:14'),
(29, 3, 244, '2021-01-29 03:50:20', '2021-01-29 03:50:20'),
(30, 3, 245, '2021-01-29 06:01:14', '2021-01-29 06:01:14'),
(31, 3, 247, '2021-01-29 06:02:27', '2021-01-29 06:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `mediatanam`
--

CREATE TABLE `mediatanam` (
  `id_mediaTanam` int(11) NOT NULL,
  `nama_mediaTanam` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mediatanam`
--

INSERT INTO `mediatanam` (`id_mediaTanam`, `nama_mediaTanam`, `created_at`, `updated_at`) VALUES
(17, 'Tanah', '2021-01-24 08:04:47', '2021-01-24 08:04:48'),
(18, 'Kapas Basah', '2021-01-24 01:11:49', '2021-01-24 01:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_12_03_085310_create_sessions_table', 1),
(9, '2020_12_10_051852_modul_table', 2),
(10, '2020_12_10_052053_sub_modul_table', 2),
(11, '2020_12_11_052103_barang_table', 3),
(12, '2016_06_01_000001_create_oauth_auth_codes_table', 4),
(13, '2016_06_01_000002_create_oauth_access_tokens_table', 4),
(14, '2016_06_01_000003_create_oauth_refresh_tokens_table', 4),
(15, '2016_06_01_000004_create_oauth_clients_table', 4),
(16, '2016_06_01_000005_create_oauth_personal_access_clients_table', 4),
(17, '2020_12_13_064926_penjualan_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(10) UNSIGNED NOT NULL,
  `modul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `modul`, `icon`, `created_at`, `updated_at`, `no_urut`) VALUES
(1, 'Master', 'fa-archive', '2020-12-10 05:38:50', '2020-12-10 05:38:51', 1),
(2, 'Transaksi', 'fa-shopping-cart', '2020-12-20 01:52:29', '2020-12-19 19:30:33', 2),
(3, 'Artikel', 'fa-forumbee', '2020-12-20 01:52:29', '2021-01-23 07:37:12', 3),
(91, 'Settings', 'fa fa-cog', NULL, '2021-01-22 12:13:26', 5),
(92, 'Bank Data', 'fa-table', NULL, '2021-01-23 07:36:37', 4);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0e9a8b1d51a9fef37f7bb4e9b4b1bd181663044c863ac85b293be008d36c06bb1a02fd3f455ea0a4', 3, 1, 'Token', '[]', 0, '2021-01-13 06:10:25', '2021-01-13 06:10:25', '2021-01-20 13:10:25'),
('c01c61c8eb42eb1af0a9236bb6e2cd33f17f16fda51346b9b05dd18ba9aa21f0fd59b4d29a340e3b', 3, 1, 'Token', '[]', 0, '2021-01-25 23:18:48', '2021-01-25 23:18:48', '2021-02-02 06:18:48'),
('d6dd96b8dbad3f004ed51ca8b0e707fed3f5c73d876bc3b8a6a19d6a271f575057b10b4ea9a95c8f', 3, 1, 'nApp', '[]', 0, '2021-01-13 05:31:26', '2021-01-13 05:31:26', '2021-01-20 12:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'plantshop.id Personal Access Client', 'O0VtuUwH9w1DudLs94Gq7SroqdFapSQktDl7NIR4', NULL, 'http://localhost', 1, 0, 0, '2021-01-13 04:08:44', '2021-01-13 04:08:44'),
(2, NULL, 'plantshop.id Password Grant Client', 'fMDS5ASGRrWPHPx8iZzLv9sE2AZvHJBmrXWMcojx', 'users', 'http://localhost', 0, 1, 0, '2021-01-13 04:08:44', '2021-01-13 04:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-13 04:08:44', '2021-01-13 04:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_status_penjualan` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `catatan` varchar(50) NOT NULL DEFAULT '0',
  `nama_users` varchar(50) DEFAULT NULL,
  `alamat_users` text DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `no_invoice` varchar(50) DEFAULT NULL,
  `tgl_penjualan` date DEFAULT NULL,
  `qr` text DEFAULT NULL,
  `jenis_customer` text DEFAULT NULL,
  `totalHarga` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status_baca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_status_penjualan`, `id_users`, `catatan`, `nama_users`, `alamat_users`, `jumlah`, `total`, `no_invoice`, `tgl_penjualan`, `qr`, `jenis_customer`, `totalHarga`, `updated_at`, `created_at`, `deleted_at`, `status_baca`) VALUES
(174, 1, NULL, '#plantshop.id', 'Test tanaman', 'gresik', NULL, 90000, 'PL1', '2021-01-02', 'PL1.svg', 'biasa', NULL, '2021-02-07 11:37:42', '2021-02-07 11:37:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3Df6NWbmCSu4L4MeiQhsmfEJYmNNZZ0pTnUusCIK', 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36 OPR/74.0.3911.107', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicmZDUXJjdnN4NEJzZlRoYm1pQU5CSVFVbGRlMHVYV0dFM3pybzFGTyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0OjgwMDEvdGVzdHQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkbzJ3ZkZhTWN3S2p5TDduTG1BMEk0ZTNCWlc4LksvQkhveFh2QlhGWGJrZkRNRWRZbGhRWHEiO30=', 1613556605),
('b89CQYJZLs4n3yXq7JxPqJQBXmVG2CoazZTbRheA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.192 Safari/537.36 OPR/74.0.3911.218', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHF3cTZxVmE3SWhWNFZKNTNxVU9XN29QY2U4czl4S1N1b2VQWmxRSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1617352848),
('E1b2JzQu5SxOlNur0dYx1uRpKKM0mx8liFXZysIo', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36 OPR/73.0.3856.344', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoib25BZG1MRVA4eUhQc0RUTlpVcFE4MjJLYmJuMXBmUm42emFtcUlnOCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYmFua2RkYXRhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJG8yd2ZGYU1jd0tqeUw3bkxtQTBJNGUzQlpXOC5LL0JIb3hYdkJYRlhia2ZETUVkWWxoUVhxIjt9', 1612861016),
('HCBZyKgQrOecHuXJe3uM15XDI9q8qIQFZVulbatr', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.192 Safari/537.36 OPR/74.0.3911.218', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOVB1eW5TdTF4QnRmZ1RjeVpKNFlYZFo1cTNpYVdBTkJ4S21VaWt6aiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90ZXN0Ijt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ0SGdKUGh1VXNNM2N3aGp6djR2NzRlcFRlSXo4am5mZ1lxNVd4eWY0eXNqUHhhRmZBeHduNiI7fQ==', 1617353221),
('Pg1oHaiETKOedpsJXeux8PmQGvZ4hJzarknvnanL', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36 OPR/73.0.3856.344', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNXJSZVd0WlF0dFlZbFRIU3hnOWxyS0p3ancwNElORldUUEIwTkI5OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRvMndmRmFNY3dLanlMN25MbUEwSTRlM0JaVzguSy9CSG94WHZCWEZYYmtmRE1FZFlsaFFYcSI7fQ==', 1612725836),
('VtVRBKvCf6zih1PLUwNPI3w7xDL5SezEwRKWHZ7j', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36 OPR/74.0.3911.107', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXpxeGRFZFJaeGIzWEhCZjFhMWs1RkM5Q0xwT2lhNUw0aUtCNHdYWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1613556481);

-- --------------------------------------------------------

--
-- Table structure for table `status_penjualan`
--

CREATE TABLE `status_penjualan` (
  `id_status` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_penjualan`
--

INSERT INTO `status_penjualan` (`id_status`, `keterangan`) VALUES
(1, 'Dibayar'),
(2, 'Proses'),
(3, 'Packing'),
(4, 'Kirim'),
(5, 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `id_subKategori` int(11) NOT NULL,
  `nama_subKategori` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_subKategori`, `nama_subKategori`, `created_at`, `updated_at`) VALUES
(37, 'ter', '2021-01-24 07:23:42', '2021-01-24 07:23:42'),
(38, 'Hahnii', NULL, NULL),
(39, 'Biola', NULL, NULL),
(40, 'Borsigiana', NULL, NULL),
(41, 'Deliciosa', NULL, NULL),
(42, 'Koboi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submodul`
--

CREATE TABLE `submodul` (
  `id_subModul` int(10) UNSIGNED NOT NULL,
  `id_Modul` int(11) NOT NULL,
  `SubModul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submodul`
--

INSERT INTO `submodul` (`id_subModul`, `id_Modul`, `SubModul`, `link`, `created_at`, `updated_at`) VALUES
(8, 91, 'Modul', '/modul', '2020-12-10 09:53:35', '2020-12-10 09:53:36'),
(10, 91, 'Restore', '/restore', NULL, NULL),
(12, 2, 'Penjualan', '/penjualan', NULL, '2021-01-13 08:59:46'),
(20, 1, 'Kategori', '/kategori', NULL, NULL),
(21, 91, 'Toko', '/toko', NULL, NULL),
(23, 12, 'Tanaman', '/trikTanaman', NULL, NULL),
(24, 1, 'Jenis Tanaman', '/dataJenisTanaman', NULL, NULL),
(26, 3, 'Tips', '/tipss', NULL, NULL),
(28, 92, 'Bank Data Tanaman', '/bankddata', NULL, '2021-01-23 07:36:50'),
(29, 92, 'Gren Dekor', '/greendekor', NULL, NULL),
(30, 92, 'Home Dekor', '/homedekor', NULL, NULL),
(31, 1, 'Media Tanam', '/mediatanam', NULL, NULL),
(32, 1, 'Sub Kategori', '/subKategori', NULL, NULL),
(33, 2, 'Tanaman', '/barang', NULL, '2021-01-13 08:59:46'),
(34, 2, 'Non Tanaman', '/nonTanaman', NULL, NULL),
(35, 1, 'Induk Kategori', '/indukkategories', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id_tips` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `foto_tips` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `hastag` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id_tips`, `judul`, `isi`, `foto_tips`, `created_at`, `updated_at`, `deleted_at`, `id_kategori`, `hastag`, `id_user`) VALUES
(7, 'ini test artikel', '<p>klasd</p>', '1611336580_sepatu.jpg', '2021-01-22 10:29:40', '2021-01-22 10:29:40', NULL, 2, '#plantshop.id', NULL),
(8, 'test2', '<p>kjasdljas</p>', '1611336626_image_2021-01-23_003021.png', '2021-01-22 10:30:26', '2021-01-22 10:30:26', NULL, 1, '#plantshop.id', NULL),
(9, 'test3', '<p>;lkr;lsad</p>', '1611338088_png-clipart-default-profile-united-states-computer-icons-desktop-free-high-quality-person-icon-miscellaneous-silhouette-thumbnail.png', '2021-01-22 10:54:48', '2021-01-22 10:54:48', NULL, 2, '#plantshop.id', NULL),
(10, 'klasdj', '<p>;maLD</p>', '1611338115_png-clipart-default-profile-united-states-computer-icons-desktop-free-high-quality-person-icon-miscellaneous-silhouette-thumbnail.png', '2021-01-22 10:55:15', '2021-01-22 10:55:15', NULL, 2, '#plantshop.id', NULL),
(11, 'aksdhkajh', '<p>;lkasd;al</p>', '1611338185_png-clipart-default-profile-united-states-computer-icons-desktop-free-high-quality-person-icon-miscellaneous-silhouette-thumbnail.png', '2021-01-22 10:56:25', '2021-01-22 10:56:25', NULL, 2, '#plantshop.id', NULL),
(12, 'asdhkaj', '<p>asdasd</p>', '1611343064_sepatu.jpg', '2021-01-22 10:59:03', '2021-01-22 12:17:44', NULL, 2, '#plantshop.id', NULL),
(13, 'test edit2', '<p>test isi edit</p>', '1611356984_Screenshot_2021-01-22-20-57-44-787_com.mi.globalbrowser.jpg', '2021-01-22 11:00:28', '2021-01-22 16:09:44', NULL, 1, '#plantshop.id 3#testhastag', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `alamat`, `no_wa`) VALUES
(1, 'Yoki Hidayatur Rohman', 'yokihidayaturr13@gmail.com', NULL, '$2y$10$9HGi3ylOR89rVj0Po.n4guHrPCTzzreZCO3p397lBsLBOHm7eQdbK', NULL, NULL, NULL, NULL, NULL, '2020-12-03 02:11:37', '2020-12-03 02:11:37', NULL, NULL),
(2, 'Yoki Hidayatur Rohman', 'admin@gmail.com', NULL, '$2y$10$wrndHL9.fer.5b1wI/QaQ.BXPUrNgR9egyjKitnhGuyqrtmhUgMTG', NULL, NULL, NULL, NULL, NULL, '2020-12-09 05:03:26', '2020-12-09 05:03:26', NULL, NULL),
(3, 'vallenzi', 'vallenzi@mail.com', NULL, '$2y$10$sqy0ffyRqnyx.wLd9bIsgO52g9fsqPmkhwQpHb1iCBZtQw2sfqA7O', NULL, NULL, NULL, NULL, NULL, '2021-01-13 04:29:15', '2021-01-13 04:29:15', NULL, NULL),
(4, 'admin', 'admin@admin', NULL, '$2y$10$o2wfFaMcwKjyL7nLmA0I4e3BZW8.K/BHoxXvBXFXbkfDMEdYlhQXq', NULL, NULL, NULL, NULL, NULL, '2021-01-22 09:41:24', '2021-01-22 09:41:24', NULL, NULL),
(5, 'yoki', 'yokihidayaturr16@gmail.com', NULL, '$2y$10$4HgJPhuUsM3cwhjzv4v74epTeIz8jnfgYq5Wxyf4ysjPxaFfAxwn6', NULL, NULL, NULL, NULL, NULL, '2021-04-02 01:41:33', '2021-04-02 01:41:33', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- Indexes for table `bankdata`
--
ALTER TABLE `bankdata`
  ADD PRIMARY KEY (`id_bankdata`) USING BTREE;

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `dekor`
--
ALTER TABLE `dekor`
  ADD PRIMARY KEY (`id_dekor`) USING BTREE;

--
-- Indexes for table `detail_bankdata`
--
ALTER TABLE `detail_bankdata`
  ADD PRIMARY KEY (`id_detailtanaman`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `induk_kategori`
--
ALTER TABLE `induk_kategori`
  ADD PRIMARY KEY (`id_indukKategori`);

--
-- Indexes for table `jenisdekor`
--
ALTER TABLE `jenisdekor`
  ADD PRIMARY KEY (`id_jenisDekor`) USING BTREE;

--
-- Indexes for table `jenistanaman`
--
ALTER TABLE `jenistanaman`
  ADD PRIMARY KEY (`id_jenisTanaman`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `mediatanam`
--
ALTER TABLE `mediatanam`
  ADD PRIMARY KEY (`id_mediaTanam`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `status_penjualan`
--
ALTER TABLE `status_penjualan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id_subKategori`) USING BTREE;

--
-- Indexes for table `submodul`
--
ALTER TABLE `submodul`
  ADD PRIMARY KEY (`id_subModul`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id_tips`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bankdata`
--
ALTER TABLE `bankdata`
  MODIFY `id_bankdata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `dekor`
--
ALTER TABLE `dekor`
  MODIFY `id_dekor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `detail_bankdata`
--
ALTER TABLE `detail_bankdata`
  MODIFY `id_detailtanaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `induk_kategori`
--
ALTER TABLE `induk_kategori`
  MODIFY `id_indukKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenisdekor`
--
ALTER TABLE `jenisdekor`
  MODIFY `id_jenisDekor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jenistanaman`
--
ALTER TABLE `jenistanaman`
  MODIFY `id_jenisTanaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=526;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mediatanam`
--
ALTER TABLE `mediatanam`
  MODIFY `id_mediaTanam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_penjualan`
--
ALTER TABLE `status_penjualan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id_subKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `submodul`
--
ALTER TABLE `submodul`
  MODIFY `id_subModul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `id_tips` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

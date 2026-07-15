-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2026 at 05:00 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_pro_cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_17_011914_create_kategori_soals_table', 1),
(5, '2021_07_17_020434_create_mapels_table', 1),
(6, '2021_07_17_020639_create_sub_mapels_table', 1),
(7, '2021_07_17_022444_create_soals_table', 1),
(8, '2021_07_17_022936_create_soal_skors_table', 1),
(9, '2021_07_22_083820_create_admins_table', 1),
(10, '2021_07_26_033556_create_user_models_table', 1),
(11, '2021_07_27_033924_create_token_models_table', 1),
(12, '2021_08_07_105228_create_mulaiujians_table', 1),
(13, '2021_08_07_105433_create_mulaiujiandetails_table', 1),
(14, '2021_08_14_110326_create_setting_soals_table', 2);

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
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_notelp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_notelp`, `admin_alamat`, `admin_level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$yDdS2tVqzYd/cAOPG2UuOehDSRCetRSySNRW5.yIus.rW3cW6QU/G', NULL, NULL, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_soal`
--

CREATE TABLE `tb_kategori_soal` (
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kategori_soal`
--

INSERT INTO `tb_kategori_soal` (`kategori_id`, `kategori_soal`) VALUES
(1, 'TIU'),
(2, 'TKP'),
(3, 'TWK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`mapel_id`, `mapel_kategori`) VALUES
(1, 'IPA'),
(2, 'IPS'),
(3, 'MATEMATIKA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_soal`
--

CREATE TABLE `tb_master_soal` (
  `soal_id` bigint(20) UNSIGNED NOT NULL,
  `soal_kategori_id` int(11) NOT NULL,
  `soal_mapel_id` int(11) DEFAULT 0,
  `soal_submapel_id` int(11) DEFAULT 0,
  `soal_ujian_tipe` enum('text','file','audio') COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_ujian` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soal_pilihan_tipe` enum('text','file') COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_a` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soal_b` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soal_c` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soal_d` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soal_e` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_master_soal`
--

INSERT INTO `tb_master_soal` (`soal_id`, `soal_kategori_id`, `soal_mapel_id`, `soal_submapel_id`, `soal_ujian_tipe`, `soal_ujian`, `soal_pilihan_tipe`, `soal_a`, `soal_b`, `soal_c`, `soal_d`, `soal_e`) VALUES
(1, 1, 1, 3, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Sari dan Ratih memiliki suatu pekerjaan. Waktu yang dibutuhkan oleh Sari dalam menghasilkan uang adalah 21 menit, sedangkan Ratih membutuhkan waktu 42 menit. Jika Sari dan Ratih bekerja bersama-sama untuk menghasilkan uang, waktu yang dibutuhkan adalah …</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">14 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">21 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">28 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">35 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">42 menit</span><br></p>'),
(2, 1, 2, 6, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Prestasi Intan lebih tinggi dari Dini dan lebih rendah dari Tina. Prestasi Cantik lebih lebih rendah dari Intan, tetapi lebih tinggi dari Dini. Prestasi Dani lebih tinggi dari Dini dan Cantik. Tiga orang berprestasi terbaik adalah …</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Dani, Intan, Tina</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Dani, Dini, Tina</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Intan, Tina, Cantik</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Intan, Dani, Cantik</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Tina, Cantik, Dini</span><br></p>'),
(3, 1, 1, 2, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Afrika Selatan : Pretoria = ... : ...</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">&nbsp;Kanada : Canberra.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Ekuador : Quito.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Kamerun: Astana.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Maroko : Cetinje.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Nigeria : Wellington.</span><br></p>'),
(4, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Hak asasi manusia pada dasarnya mempunyai kemerdekaan atau kebebasan sejak manusia lahir sebagai ...</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">milik bersama seluruh bangsa didunia</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">keseimbangan hidup di alara seraesta</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;anugerah dari Tuhan Yang Maha Esa</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">pemberian negara dimana manusia tinggal</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">kebebasan manusia secara mutlak</span><br></p>'),
(5, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;Indonesia memiliki relatif banyak tenaga kerja sedangkan modalnya relative sedikit, maka sebaiknya Indonesia .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan barang yang relatif padat modal</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan dan mengimpor barang - barang yang relatif padat karya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;mengimpor alat - alat teknologi canggih</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan dan mengekspor barang - barang yang padat karya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mengimpor barang - barang yang relatif padat karya</span><br></p>'),
(6, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Efek tarif yang menyebabkan terjadinya transfer kesejahteraan dari konsumen dalam negeri ke produsen dalam negeri disebut efek</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Kuaota</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Retribusi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Redistribusi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Penerimaan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Protektif</span><br></p>'),
(7, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Karena kondisi keuangan, perusahaan menunda pemberian bonus tahunan. Akibatnya banyak karyawan yang mogok kerja. Melihat kondisi tersebut yang Anda lakukan sebagai atasan adalah ....</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Menenangkan karyawan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Mengundurkan diri</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Memberi bonus dari tabungan pribadi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Mencari jalan agar karyawan tetap mendapat bonus tahunan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Ikut mogok kerja</span><br></p>'),
(8, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Apa tujuan Anda dalam bekerja . . . .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">ingin menjadi biasa-biasa saja</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">terserah putusan atasan/pimpinan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mencari kawan dan relasi sebanyak-banyaknya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">terus berkreasi dan produktif dalam tiap aspek pekerjaan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mengikuti arus yang mengalir</span><br></p>'),
(9, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Pada hari Minggu tetangga Anda meminta bantuan karena akan pindah rumah, sementara Anda berencana pergi ke rumah saudara. Sikap Anda . .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">membantu smemampunya kemudian pergi ke rumah saudara</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">meminta maaf karena harus pergi ke rumah saudara karena ada kepentingan yang mendesak</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">memberitahu saudara bahwa akan datang lain waktu saja</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghindar dan pergi diam-diam</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menuruh pembantu Anda untuk memberi bantuan.</span><br></p>'),
(10, 1, 1, 3, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Sari dan Ratih memiliki suatu pekerjaan. Waktu yang dibutuhkan oleh Sari dalam menghasilkan uang adalah 21 menit, sedangkan Ratih membutuhkan waktu 42 menit. Jika Sari dan Ratih bekerja bersama-sama untuk menghasilkan uang, waktu yang dibutuhkan adalah …</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">14 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">21 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">28 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">35 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">42 menit</span><br></p>'),
(11, 1, 2, 6, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Prestasi Intan lebih tinggi dari Dini dan lebih rendah dari Tina. Prestasi Cantik lebih lebih rendah dari Intan, tetapi lebih tinggi dari Dini. Prestasi Dani lebih tinggi dari Dini dan Cantik. Tiga orang berprestasi terbaik adalah …</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Dani, Intan, Tina</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Dani, Dini, Tina</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Intan, Tina, Cantik</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Intan, Dani, Cantik</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Tina, Cantik, Dini</span><br></p>'),
(12, 1, 1, 2, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Afrika Selatan : Pretoria = ... : ...</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">&nbsp;Kanada : Canberra.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Ekuador : Quito.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Kamerun: Astana.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Maroko : Cetinje.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Nigeria : Wellington.</span><br></p>'),
(13, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Hak asasi manusia pada dasarnya mempunyai kemerdekaan atau kebebasan sejak manusia lahir sebagai ...</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">milik bersama seluruh bangsa didunia</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">keseimbangan hidup di alara seraesta</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;anugerah dari Tuhan Yang Maha Esa</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">pemberian negara dimana manusia tinggal</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">kebebasan manusia secara mutlak</span><br></p>'),
(14, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;Indonesia memiliki relatif banyak tenaga kerja sedangkan modalnya relative sedikit, maka sebaiknya Indonesia .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan barang yang relatif padat modal</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan dan mengimpor barang - barang yang relatif padat karya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;mengimpor alat - alat teknologi canggih</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan dan mengekspor barang - barang yang padat karya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mengimpor barang - barang yang relatif padat karya</span><br></p>'),
(15, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Efek tarif yang menyebabkan terjadinya transfer kesejahteraan dari konsumen dalam negeri ke produsen dalam negeri disebut efek</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Kuaota</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Retribusi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Redistribusi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Penerimaan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Protektif</span><br></p>'),
(16, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Karena kondisi keuangan, perusahaan menunda pemberian bonus tahunan. Akibatnya banyak karyawan yang mogok kerja. Melihat kondisi tersebut yang Anda lakukan sebagai atasan adalah ....</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Menenangkan karyawan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Mengundurkan diri</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Memberi bonus dari tabungan pribadi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Mencari jalan agar karyawan tetap mendapat bonus tahunan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Ikut mogok kerja</span><br></p>'),
(17, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Apa tujuan Anda dalam bekerja . . . .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">ingin menjadi biasa-biasa saja</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">terserah putusan atasan/pimpinan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mencari kawan dan relasi sebanyak-banyaknya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">terus berkreasi dan produktif dalam tiap aspek pekerjaan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mengikuti arus yang mengalir</span><br></p>'),
(18, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Pada hari Minggu tetangga Anda meminta bantuan karena akan pindah rumah, sementara Anda berencana pergi ke rumah saudara. Sikap Anda . .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">membantu smemampunya kemudian pergi ke rumah saudara</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">meminta maaf karena harus pergi ke rumah saudara karena ada kepentingan yang mendesak</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">memberitahu saudara bahwa akan datang lain waktu saja</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghindar dan pergi diam-diam</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menuruh pembantu Anda untuk memberi bantuan.</span><br></p>'),
(19, 1, 1, 3, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Sari dan Ratih memiliki suatu pekerjaan. Waktu yang dibutuhkan oleh Sari dalam menghasilkan uang adalah 21 menit, sedangkan Ratih membutuhkan waktu 42 menit. Jika Sari dan Ratih bekerja bersama-sama untuk menghasilkan uang, waktu yang dibutuhkan adalah …</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">14 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">21 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">28 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">35 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">42 menit</span><br></p>'),
(20, 1, 2, 6, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Prestasi Intan lebih tinggi dari Dini dan lebih rendah dari Tina. Prestasi Cantik lebih lebih rendah dari Intan, tetapi lebih tinggi dari Dini. Prestasi Dani lebih tinggi dari Dini dan Cantik. Tiga orang berprestasi terbaik adalah …</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Dani, Intan, Tina</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Dani, Dini, Tina</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Intan, Tina, Cantik</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Intan, Dani, Cantik</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Tina, Cantik, Dini</span><br></p>'),
(21, 1, 1, 2, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Afrika Selatan : Pretoria = ... : ...</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">&nbsp;Kanada : Canberra.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Ekuador : Quito.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Kamerun: Astana.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Maroko : Cetinje.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Nigeria : Wellington.</span><br></p>'),
(22, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Hak asasi manusia pada dasarnya mempunyai kemerdekaan atau kebebasan sejak manusia lahir sebagai ...</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">milik bersama seluruh bangsa didunia</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">keseimbangan hidup di alara seraesta</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;anugerah dari Tuhan Yang Maha Esa</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">pemberian negara dimana manusia tinggal</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">kebebasan manusia secara mutlak</span><br></p>'),
(23, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;Indonesia memiliki relatif banyak tenaga kerja sedangkan modalnya relative sedikit, maka sebaiknya Indonesia .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan barang yang relatif padat modal</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan dan mengimpor barang - barang yang relatif padat karya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;mengimpor alat - alat teknologi canggih</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan dan mengekspor barang - barang yang padat karya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mengimpor barang - barang yang relatif padat karya</span><br></p>'),
(24, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Efek tarif yang menyebabkan terjadinya transfer kesejahteraan dari konsumen dalam negeri ke produsen dalam negeri disebut efek</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Kuaota</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Retribusi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Redistribusi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Penerimaan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Protektif</span><br></p>'),
(25, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Karena kondisi keuangan, perusahaan menunda pemberian bonus tahunan. Akibatnya banyak karyawan yang mogok kerja. Melihat kondisi tersebut yang Anda lakukan sebagai atasan adalah ....</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Menenangkan karyawan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Mengundurkan diri</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Memberi bonus dari tabungan pribadi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Mencari jalan agar karyawan tetap mendapat bonus tahunan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Ikut mogok kerja</span><br></p>'),
(26, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Apa tujuan Anda dalam bekerja . . . .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">ingin menjadi biasa-biasa saja</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">terserah putusan atasan/pimpinan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mencari kawan dan relasi sebanyak-banyaknya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">terus berkreasi dan produktif dalam tiap aspek pekerjaan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mengikuti arus yang mengalir</span><br></p>'),
(27, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Pada hari Minggu tetangga Anda meminta bantuan karena akan pindah rumah, sementara Anda berencana pergi ke rumah saudara. Sikap Anda . .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">membantu smemampunya kemudian pergi ke rumah saudara</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">meminta maaf karena harus pergi ke rumah saudara karena ada kepentingan yang mendesak</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">memberitahu saudara bahwa akan datang lain waktu saja</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghindar dan pergi diam-diam</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menuruh pembantu Anda untuk memberi bantuan.</span><br></p>'),
(28, 1, 1, 3, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Sari dan Ratih memiliki suatu pekerjaan. Waktu yang dibutuhkan oleh Sari dalam menghasilkan uang adalah 21 menit, sedangkan Ratih membutuhkan waktu 42 menit. Jika Sari dan Ratih bekerja bersama-sama untuk menghasilkan uang, waktu yang dibutuhkan adalah …</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">14 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">21 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">28 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">35 menit</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">42 menit</span><br></p>'),
(29, 1, 2, 6, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Prestasi Intan lebih tinggi dari Dini dan lebih rendah dari Tina. Prestasi Cantik lebih lebih rendah dari Intan, tetapi lebih tinggi dari Dini. Prestasi Dani lebih tinggi dari Dini dan Cantik. Tiga orang berprestasi terbaik adalah …</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Dani, Intan, Tina</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Dani, Dini, Tina</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Intan, Tina, Cantik</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Intan, Dani, Cantik</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Tina, Cantik, Dini</span><br></p>'),
(30, 1, 1, 2, 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Afrika Selatan : Pretoria = ... : ...</span><br></p>', 'text', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">&nbsp;Kanada : Canberra.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Ekuador : Quito.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Kamerun: Astana.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Maroko : Cetinje.</span><br></p>', '<p><span style=\"color: rgb(31, 68, 87); font-family: Nunitosans, sans-serif;\">Nigeria : Wellington.</span><br></p>'),
(31, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Hak asasi manusia pada dasarnya mempunyai kemerdekaan atau kebebasan sejak manusia lahir sebagai ...</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">milik bersama seluruh bangsa didunia</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">keseimbangan hidup di alara seraesta</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;anugerah dari Tuhan Yang Maha Esa</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">pemberian negara dimana manusia tinggal</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">kebebasan manusia secara mutlak</span><br></p>'),
(32, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;Indonesia memiliki relatif banyak tenaga kerja sedangkan modalnya relative sedikit, maka sebaiknya Indonesia .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan barang yang relatif padat modal</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan dan mengimpor barang - barang yang relatif padat karya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">&nbsp;mengimpor alat - alat teknologi canggih</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghasilkan dan mengekspor barang - barang yang padat karya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mengimpor barang - barang yang relatif padat karya</span><br></p>'),
(33, 3, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Efek tarif yang menyebabkan terjadinya transfer kesejahteraan dari konsumen dalam negeri ke produsen dalam negeri disebut efek</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Kuaota</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Retribusi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Redistribusi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Penerimaan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Protektif</span><br></p>'),
(34, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Karena kondisi keuangan, perusahaan menunda pemberian bonus tahunan. Akibatnya banyak karyawan yang mogok kerja. Melihat kondisi tersebut yang Anda lakukan sebagai atasan adalah ....</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Menenangkan karyawan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Mengundurkan diri</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Memberi bonus dari tabungan pribadi</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Mencari jalan agar karyawan tetap mendapat bonus tahunan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">Ikut mogok kerja</span><br></p>'),
(35, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Apa tujuan Anda dalam bekerja . . . .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">ingin menjadi biasa-biasa saja</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">terserah putusan atasan/pimpinan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mencari kawan dan relasi sebanyak-banyaknya</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">terus berkreasi dan produktif dalam tiap aspek pekerjaan</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">mengikuti arus yang mengalir</span><br></p>'),
(36, 2, 0, 0, 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">Pada hari Minggu tetangga Anda meminta bantuan karena akan pindah rumah, sementara Anda berencana pergi ke rumah saudara. Sikap Anda . .</span><br></p>', 'text', '<p><span style=\"font-family: Roboto, sans-serif;\">membantu smemampunya kemudian pergi ke rumah saudara</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">meminta maaf karena harus pergi ke rumah saudara karena ada kepentingan yang mendesak</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">memberitahu saudara bahwa akan datang lain waktu saja</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menghindar dan pergi diam-diam</span><br></p>', '<p><span style=\"font-family: Roboto, sans-serif;\">menuruh pembantu Anda untuk memberi bantuan.</span><br></p>'),
(37, 1, 1, 1, 'audio', '1629707078-soal.mp3', 'text', 'asd', 'ad', 'asd', 'asd', 'asd'),
(38, 1, 1, 1, 'file', '1629710024-soal.jpg', 'text', 'asd', 'asd', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mulai_ujian`
--

CREATE TABLE `tb_mulai_ujian` (
  `mulai_ujian_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `mulai_ujian_tanggal` date NOT NULL,
  `mulai_ujian_start` time NOT NULL,
  `mulai_ujian_end` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_mulai_ujian`
--

INSERT INTO `tb_mulai_ujian` (`mulai_ujian_id`, `user_id`, `mulai_ujian_tanggal`, `mulai_ujian_start`, `mulai_ujian_end`) VALUES
(1, 1, '2021-08-09', '10:31:12', NULL),
(2, 1, '2021-08-14', '09:47:08', NULL),
(3, 1, '2021-08-23', '10:06:54', NULL),
(4, 2, '2021-09-26', '13:48:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mulai_ujian_detail`
--

CREATE TABLE `tb_mulai_ujian_detail` (
  `mulai_ujian_detail_id` bigint(20) UNSIGNED NOT NULL,
  `mulai_ujian_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `mulai_ujian_detail_jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai_ujian_detail_ragu_ragu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_mulai_ujian_detail`
--

INSERT INTO `tb_mulai_ujian_detail` (`mulai_ujian_detail_id`, `mulai_ujian_id`, `soal_id`, `mulai_ujian_detail_jawaban`, `mulai_ujian_detail_ragu_ragu`) VALUES
(1, 2, 1, 'b', '0'),
(2, 2, 2, 'd', '0'),
(3, 2, 3, 'd', '0'),
(4, 2, 4, 'a', '0'),
(5, 2, 5, 'a', '1'),
(6, 2, 6, 'e', '1'),
(7, 2, 9, 'a', '0'),
(8, 2, 7, 'd', '0'),
(9, 2, 8, 'c', '1'),
(10, 3, 1, 'a', '0'),
(11, 3, 2, 'b', '1'),
(12, 3, 3, 'b', '1'),
(13, 3, 4, 'b', '1'),
(14, 3, 5, 'b', '1'),
(15, 3, 6, 'c', '1'),
(16, 4, 1, 'c', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting_soal`
--

CREATE TABLE `tb_setting_soal` (
  `setting_soal_id` bigint(20) UNSIGNED NOT NULL,
  `token_id` int(11) NOT NULL,
  `kategori_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_soal_jumlah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_setting_soal`
--

INSERT INTO `tb_setting_soal` (`setting_soal_id`, `token_id`, `kategori_id`, `setting_soal_jumlah`) VALUES
(1, 1, '1,2,3', '50,35,35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_skorsoal`
--

CREATE TABLE `tb_skorsoal` (
  `skorsoal_id` bigint(20) UNSIGNED NOT NULL,
  `skorsoal_soal_id` int(11) NOT NULL,
  `skorsoal_a` int(11) NOT NULL,
  `skorsoal_b` int(11) NOT NULL,
  `skorsoal_c` int(11) NOT NULL,
  `skorsoal_d` int(11) NOT NULL,
  `skorsoal_e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_skorsoal`
--

INSERT INTO `tb_skorsoal` (`skorsoal_id`, `skorsoal_soal_id`, `skorsoal_a`, `skorsoal_b`, `skorsoal_c`, `skorsoal_d`, `skorsoal_e`) VALUES
(1, 1, 1, 0, 0, 0, 0),
(2, 2, 0, 1, 0, 0, 0),
(3, 3, 0, 0, 1, 0, 0),
(4, 4, 1, 2, 3, 4, 5),
(5, 5, 1, 2, 3, 4, 5),
(6, 6, 1, 2, 3, 4, 5),
(7, 7, 5, 0, 0, 0, 0),
(8, 8, 5, 0, 0, 0, 0),
(9, 9, 5, 0, 0, 0, 0),
(10, 10, 1, 0, 0, 0, 0),
(11, 11, 0, 1, 0, 0, 0),
(12, 12, 0, 0, 1, 0, 0),
(13, 13, 1, 2, 3, 4, 5),
(14, 14, 1, 2, 3, 4, 5),
(15, 15, 1, 2, 3, 4, 5),
(16, 16, 5, 0, 0, 0, 0),
(17, 17, 5, 0, 0, 0, 0),
(18, 18, 5, 0, 0, 0, 0),
(19, 19, 1, 0, 0, 0, 0),
(20, 20, 0, 1, 0, 0, 0),
(21, 21, 0, 0, 1, 0, 0),
(22, 22, 1, 2, 3, 4, 5),
(23, 23, 1, 2, 3, 4, 5),
(24, 24, 1, 2, 3, 4, 5),
(25, 25, 5, 0, 0, 0, 0),
(26, 26, 5, 0, 0, 0, 0),
(27, 27, 5, 0, 0, 0, 0),
(28, 28, 1, 0, 0, 0, 0),
(29, 29, 0, 1, 0, 0, 0),
(30, 30, 0, 0, 1, 0, 0),
(31, 31, 1, 2, 3, 4, 5),
(32, 32, 1, 2, 3, 4, 5),
(33, 33, 1, 2, 3, 4, 5),
(34, 34, 5, 0, 0, 0, 0),
(35, 35, 5, 0, 0, 0, 0),
(36, 36, 5, 0, 0, 0, 0),
(37, 37, 1, 1, 1, 1, 1),
(38, 38, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_submapel`
--

CREATE TABLE `tb_submapel` (
  `submapel_id` bigint(20) UNSIGNED NOT NULL,
  `submapel_mapel_id` int(11) NOT NULL,
  `submapel_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_submapel`
--

INSERT INTO `tb_submapel` (`submapel_id`, `submapel_mapel_id`, `submapel_kategori`) VALUES
(1, 1, 'Fisika'),
(2, 1, 'Kimia'),
(3, 1, 'Biologi'),
(4, 2, 'Sosiologi'),
(5, 2, 'Sejarah'),
(6, 2, 'Geografi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_token`
--

CREATE TABLE `tb_token` (
  `token_id` bigint(20) UNSIGNED NOT NULL,
  `token_tanggal` date NOT NULL,
  `token_jam_mulai` time NOT NULL,
  `token_jam_selesai` time NOT NULL,
  `token_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_token`
--

INSERT INTO `tb_token` (`token_id`, `token_tanggal`, `token_jam_mulai`, `token_jam_selesai`, `token_key`) VALUES
(1, '2021-09-26', '12:00:00', '15:00:00', 'bkqKPoNa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_nik`, `user_nama`, `user_no_hp`, `user_email`, `user_password`, `user_password1`) VALUES
(2, '12', 'Ducimus illum et q', '12', '12@12', '58009f7680194d3049f6a66bb2c553b5f866c645dbd5c7d671be0b3106b553e97a96aa7c659f2ce978784634cec84b73e8ac7120d5ce45181c65d0d2832baf69', '12');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_kategori_soal`
--
ALTER TABLE `tb_kategori_soal`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `tb_master_soal`
--
ALTER TABLE `tb_master_soal`
  ADD PRIMARY KEY (`soal_id`);

--
-- Indexes for table `tb_mulai_ujian`
--
ALTER TABLE `tb_mulai_ujian`
  ADD PRIMARY KEY (`mulai_ujian_id`);

--
-- Indexes for table `tb_mulai_ujian_detail`
--
ALTER TABLE `tb_mulai_ujian_detail`
  ADD PRIMARY KEY (`mulai_ujian_detail_id`);

--
-- Indexes for table `tb_setting_soal`
--
ALTER TABLE `tb_setting_soal`
  ADD PRIMARY KEY (`setting_soal_id`);

--
-- Indexes for table `tb_skorsoal`
--
ALTER TABLE `tb_skorsoal`
  ADD PRIMARY KEY (`skorsoal_id`);

--
-- Indexes for table `tb_submapel`
--
ALTER TABLE `tb_submapel`
  ADD PRIMARY KEY (`submapel_id`);

--
-- Indexes for table `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori_soal`
--
ALTER TABLE `tb_kategori_soal`
  MODIFY `kategori_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `mapel_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_master_soal`
--
ALTER TABLE `tb_master_soal`
  MODIFY `soal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_mulai_ujian`
--
ALTER TABLE `tb_mulai_ujian`
  MODIFY `mulai_ujian_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mulai_ujian_detail`
--
ALTER TABLE `tb_mulai_ujian_detail`
  MODIFY `mulai_ujian_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_setting_soal`
--
ALTER TABLE `tb_setting_soal`
  MODIFY `setting_soal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_skorsoal`
--
ALTER TABLE `tb_skorsoal`
  MODIFY `skorsoal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_submapel`
--
ALTER TABLE `tb_submapel`
  MODIFY `submapel_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `token_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

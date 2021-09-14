-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2021 pada 13.06
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
(12, '2021_08_07_105228_create_mulaiujians_table', 2),
(13, '2021_08_07_105433_create_mulaiujiandetails_table', 2),
(14, '2021_08_14_110326_create_setting_soals_table', 3);

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
-- Struktur dari tabel `tb_admin`
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
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_notelp`, `admin_alamat`, `admin_level`, `created_at`, `updated_at`) VALUES
(1, 'gema fajar', 'gemafajar09', '$2y$10$3zPWcuSQLRLkTLHitgxabuN/w1gYoR8TsC/nDNMKCLhaBry0ErmyS', NULL, NULL, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_soal`
--

CREATE TABLE `tb_kategori_soal` (
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_kategori_soal`
--

INSERT INTO `tb_kategori_soal` (`kategori_id`, `kategori_soal`) VALUES
(1, 'TIU'),
(2, 'TWK'),
(3, 'TKP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`mapel_id`, `mapel_kategori`) VALUES
(4, 'IPA'),
(5, 'IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_soal`
--

CREATE TABLE `tb_master_soal` (
  `soal_id` bigint(20) UNSIGNED NOT NULL,
  `soal_kategori_id` int(11) NOT NULL,
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
-- Dumping data untuk tabel `tb_master_soal`
--

INSERT INTO `tb_master_soal` (`soal_id`, `soal_kategori_id`, `soal_ujian_tipe`, `soal_ujian`, `soal_pilihan_tipe`, `soal_a`, `soal_b`, `soal_c`, `soal_d`, `soal_e`) VALUES
(1, 1, 'text', 'DUKTUS', 'text', 'pembuluh', 'kain pembalut', 'mual', 'duafa', 'dumping'),
(2, 1, 'text', 'PARADOKS', 'text', 'kerangka pikir', 'seolah-olah berlawanan', 'paradise', 'parallelogram', 'parameter'),
(3, 1, 'text', 'BONANZA', 'text', 'judul film', 'kemakmuran', 'kobo', 'kesedihan', 'kebahagiaan'),
(4, 1, 'text', 'SPIROMETER', 'text', 'alat untuk mengukur kandungan spiritus', 'alat untuk mengukur penyakit jiwa', 'alat untuk mengukur napas', 'alat untuk mengukur pendengaran', 'alat untuk mengukur kecepatan kenda-raan'),
(5, 1, 'text', 'SELOKA', 'text', 'bejana', 'kendi', 'seloki', 'sajak', 'lagu'),
(6, 1, 'text', 'NADIR', 'text', 'luar biasa', 'cerdas', 'tinggi sekali', 'rajin', 'jujur'),
(7, 1, 'text', 'YOJANA', 'text', 'mainan anak-anak', 'jarak', 'ahli yoga', 'sejenis susu', 'peradilan'),
(8, 1, 'text', 'MUTATIS MUTANDIS', 'text', 'proses penggarapan keputusan', 'keputusan forum tanpa kuorum', 'perubahan seperlunya', 'pemanasan zat tubuh', 'model pemilihan pimpinan dewan'),
(9, 1, 'text', 'QASAR', 'text', 'pemendekan', 'kasar', 'kanibal', 'kamuflase', 'kamsia'),
(10, 1, 'text', 'AGIL', 'text', 'ragil', 'pandai', 'curang', 'bodoh', 'lihai'),
(11, 1, 'text', 'JELU', 'text', 'jeluntung', 'jeluang', 'kesal hati', 'gembira', 'angkuh'),
(12, 1, 'text', 'ENIGMA', 'text', 'ensambel', 'enologi', 'enzim', 'teka-teki', 'energik'),
(13, 1, 'text', 'KOMPLEMENTER', 'text', 'komplit', 'perjuangan parlemen', 'sesuai kebutuhan', 'bersifat isi-mengisi', 'saling merapat'),
(14, 1, 'text', 'PATRINOMIUM', 'text', 'warisan', 'solder', 'patriot', 'pola pakaian', 'partun'),
(15, 1, 'text', 'KUASI', 'text', 'kuasa', 'semu', 'kuasan', 'kru', 'krusial'),
(16, 1, 'text', 'CUAK', 'text', 'cuek', 'kecewa', 'curang', 'takut', 'lepas'),
(17, 1, 'text', 'ORTODIDAKTIK', 'text', 'maju dengan belajar sendiri', 'cara mengajar anak tuna grahita', 'pendidikan luar biasa', 'cara belajar siswa aktif', 'rehabilitasi kerusakan tulang'),
(18, 1, 'text', 'WREDA', 'text', 'senior', 'nasihat', 'wibawa', 'tutur kata', 'wiladah'),
(19, 1, 'text', 'PRESEDEN', 'text', 'presiden', 'pendahulu', 'persepsi', 'jenis obat', 'kesimpulan'),
(20, 1, 'text', 'DOSIR', 'text', 'dokumen', 'gendering', 'naga', 'dosin', 'bohlam'),
(21, 1, 'text', 'DUKAN', 'text', 'warung', 'uang tembaga', 'alur sekrup', 'dorang', 'dongok'),
(22, 1, 'text', 'URSTED', 'text', 'satuan muatan listrik', 'satuan kuat medan magnet', 'satuan energi atom', 'satuan kandungan nitrogen dalam pupuk', 'satuan kekuatan cahaya'),
(23, 1, 'text', 'BERBALAH', 'text', 'berat hati', 'mengusir', 'berkelahi', 'memangkas', 'berdebat'),
(24, 1, 'text', 'FLEGMATIS', 'text', 'bertemperamen lamban', 'pragmatis', 'fleksibel', 'berbau getah bening', 'hipotetis'),
(25, 1, 'text', 'SIJIL', 'text', 'ganjil', 'ijazah', 'satu', 'piagam', 'genap'),
(26, 1, 'text', 'INTERIM', 'text', 'internal', 'antar pribadi', 'selingan', 'sementara', 'wawancara'),
(27, 1, 'text', 'LATIF', 'text', 'indah', 'lembut', 'hamba', 'bunga', 'menarik'),
(28, 1, 'text', 'EKLIPS', 'text', 'lonjong', 'gerhana', 'penjepit', 'khatulistiwa', 'radang'),
(29, 1, 'text', 'PORTO', 'text', 'busana', 'buana', 'buaya', 'biaya', 'biasa'),
(30, 1, 'text', 'KONVENSI', 'text', 'kejelasan', 'keterangan', 'kesepakatan', 'berunding', 'berdamai'),
(31, 1, 'text', 'SERASAH', 'text', 'basah', 'serasi', 'jeram', 'tajam', 'tumpul'),
(32, 1, 'text', 'INSINUASI', 'text', 'dicela', 'sindiran', 'didustai', 'dihina', 'dilecehkan'),
(33, 1, 'text', 'DEFLEKSI', 'text', 'penerimaan', 'penyimpangan', 'destruksi', 'induksi', 'fleksibel'),
(34, 1, 'text', 'MIMETIK', 'text', 'meniru', 'plagiasi', 'kinetik', 'misteris', 'ketakpedulian'),
(35, 1, 'text', 'ABSURD', 'text', 'Ceroboh', 'Nekat', 'Nakal', 'Sulit', 'Masuk Akal'),
(36, 1, 'text', 'ANGGARA', 'text', 'Bahagia', 'Harmonis', 'Sengsara', 'Seimbang', 'Sombong'),
(37, 1, 'text', 'TAKZIM', 'text', 'Lazim', 'Yakin', 'Patuh', 'Hormat', 'Acuh'),
(38, 1, 'text', 'SEKULER', 'text', 'Kedua', 'Duniawi', 'Keagamaan', 'Telepon', 'Paham'),
(39, 1, 'text', 'EKLEKTIK', 'text', 'Radikan', 'Spiritual', 'Konklusif', 'Cemerlang', 'Tak pilih-pilih'),
(40, 1, 'text', 'NOMADIK', 'text', 'Menetap', 'Mapan', 'Sesuai norma', 'Anomali', 'Tak teratur'),
(41, 1, 'text', 'DEMES', 'text', 'Mancung', 'Pesek', 'Pipih', 'Rata', 'Bengkok'),
(42, 1, 'text', 'KABAT', 'text', 'Ikat', 'Ketat', 'Kuat', 'Longgar', 'Teratur'),
(43, 1, 'text', 'MILITANSI', 'text', 'Kemudahan', 'Kesulitan', 'Hambatan', 'Kelancaran', 'Kecepatan'),
(44, 1, 'text', 'EPILOG', 'text', 'Hipolog', 'Dialog', 'Monolog', 'Analog', 'Prolog'),
(45, 1, 'text', 'KONTINUITAS', 'text', 'Diskontinuitas', 'Permanen', 'Sementara', 'Terus-menerus', 'Berlanjut'),
(46, 1, 'text', 'APRIORI', 'text', 'Unggulan', 'Tidak istimewa', 'Proporsi', 'Aposteriori', 'Prioritas'),
(47, 1, 'text', 'KREDITUR', 'text', 'Nasabah', 'Penabung', 'Debitur', 'Penyetor', 'Penagih'),
(48, 1, 'text', 'EKSPORTIR', 'text', 'Importer', 'Rentenir', 'Pengirim', 'Pemberi', 'Penampung'),
(49, 1, 'text', 'GEGAI', 'text', 'Kuat', 'Keras', 'Kencang', 'Kendor', 'Gegar otak'),
(50, 1, 'text', 'INTERIM', 'text', 'internal', 'antar pribadi', 'selingan', 'sementara', 'wawancara'),
(140, 2, 'text', 'Menghargai hasil karya orang lain adalah wujud pengamalan Pancasila, yaitu sila...', 'text', 'Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima'),
(141, 2, 'text', 'Mempersoalkan kembali Pancasila sebagai asas negara berarti....', 'text', 'Memberikan kebebasan kepada warga negara melaksanakan haknya', 'Mewujudkan transparansi dalam penyelenggaraan negara', 'Menghormati hak asasi manusia', 'Memastikan reformasi pembangunan berjalan dengan baik', 'Mementahkan kembali kesepakatan nasional'),
(142, 2, 'text', 'Usul pemberhentian Presiden dan/atau Wakil Presiden dapat diajukan oleh DPR kepada MPR hanya dengan ... untuk memeriksa, mengadili, dan memu tuskan pendapat DPR bahwa presiden/ wakil presiden telah melanggar hukum dan sebagainya', 'text', 'Terlebih dahulu mengajukan permintaan kepada Mahkamah Konstitusi', 'Terlebih dahulu mengajukan permintaan kepada Mahkamah Agung', 'Terlebih dahulu mengajukan permintaan kepada Mahkamah Konstitusi dan Mahkamah Agung', 'Terlebih dahulu mengajukan permintaan kepada Mahkamah Konstitusi dan MPR', 'Terlebih dahulu mengajukan permintaan kepada Mahkamah Agung dan MPR'),
(143, 2, 'text', 'Sesuai dengan UUD 1945 pasal 1 ayat 2 yang menyatakan negara RI menganut sistem konstitusional bahwa kekuasaan tertinggi di tangan ...', 'text', 'MPR', 'DPR dan MPR', 'MPR dan DPD', 'Rakyat', 'Rakyat dan MPR'),
(144, 2, 'text', 'Dalam sejarah ketatanegaraan Indonesia, pada tanggal 16 Oktober 1945 diterbitkan maklumat wakil presiden No.X tahun 1945 untuk memberikan penguatan terhadap langkah-langkah demokratisasi pemerintah setelah Proklamasi Kemerdekaan 17 Agustus 1945. Isi dari maklumat tersebut antara lain...', 'text', 'KNIP diserahi kekuasaan legislatif dan ikut serta membuat/ menetapkan GBHN sebelum terbentuk DPR dan MPR', 'Menetapkan DPRGR (Dewan Perwakilan Rakyat Gotong-Royong)', 'Menetapkan MPRS (Majelis Permusyawaratan Rakyat Sementara)', 'Pembentukan delapan Provinsi', 'Kembali Kepada UUD 1945'),
(145, 2, 'text', 'Di bawah ini merupakan pokok kajian hukum tata negara, kecuali ....', 'text', 'Bentuk dan penyusunan alat-alat perlengkapan negara', 'Wewenang, Fungsi, tugas, dan tanggung jawab dari masing masing alat perlengkapan negara', 'Hubungan antara alat perlengkapan negara, baik yang bersifat horizontal maupun vertikal', 'Hubungan antara warga negara dengan negara termasuk hak-hak asasi dari warga negara', 'Prinsip-prinsip hukum mengenai pelaksanaan dari tugas, wewenang, dan kewajiban negara'),
(146, 2, 'text', 'Sesudah tiga hari berturut-turut anggota-anggota Dokuritsu Zyunbi Tyoosakai mengeluarkan pendapat-pendapatnya, maka sekarang saya mendapat kehormatan dari Paduka Tuan Ketua yang mulia untuk mengemukakan pendapat saya. Saya akan menepati permintaan Paduka Tuan Ketua yang mulia. Apakah permintaan Paduka Tuan Ketua yang mulia? Paduka Tuan Ketua yang mulia minta kepada sidang Dokuritsu Zyunbi Tyoosakai untuk mengemukakan dasar Indonesia Merdeka. Dasar inilah nanti akan saya kemukakan di dalam pidato saya ini,\" begitu kata Bung Karno mengawali pidatonya seperti dikutip dari http://www.academia.edu, Rabu (1/6/2016). Dalam pidatonya di sidang BPUPKI Bung Karno telah menyampaikan  prinsip dasar negara yakni:', 'text', 'Kebangsaan Indonesia; Internasionalisme atau perikemanusiaan; Mufakat atau demokrasi; Perdamaian abadi', 'Peri Kebangsaan, Peri Kemanusiaan, Peri keTuhanan, Peri Kerakyatan, dan Mufakat', 'Kebangsaan Indonesia; Internasionalisme atau perikemanusiaan;Mufakat atau demokrasi; Kesejahteraan sosial. Ketuhanan yang berkebudayaan.', 'Peri Kebangsaan, Peri Kemanusiaan, Peri keTuhanan, Peri Kerakyatan, dan Kesejahteraan Rakyat', 'Ketuhanan YME  . Peri Kemanusiaan   Kebangsaan   Kerakyatan  Keadilan Sosial'),
(147, 2, 'text', 'Ekonomi kerakyatan adalah sistem ekonomi yang berbasis pada kekuatan ekonomi rakyat.Dimana ekonomi rakyat sendiri adalah sebagai kegiatan ekonomi atau usaha yang dilakukan oleh rakyat kebanyakan (popular) yang dengan secara swadaya mengelola sumberdaya ekonomi apa saja yang dapat diusahakan dan dikuasainya, yang selanjutnya disebut sebagai Usaha Kecil dan Menengah (UKM) terutama meliputi sektor pertanian, peternakan, kerajinan, makanan, dsb, yang ditujukan terutama untuk memenuhi kebutuhan dasarnya dan keluarganya tanpa harus mengorbankan kepentingan masyarakat lainnya.Pembangunan ekonomi kerakyatan memiliki peranan dalam menciptakan kemakmuran dan kesejahteraan rakyat. Hal tersebut sesuai dengan bunyi UUD 1945 pasal 33 ayat 1 yang berbunyi.', 'text', 'Cabang-cabang produksi yang penting bagi negara dan yang menguasai hajat hidup orang banyak dikuasai oleh negara', 'Perekonomian disusun sebagai usaha bersama berdasar atas asas kekeluargaan', 'Perekonomian nasional diselenggarakan berdasarkan atas demokrasi ekonomi dengan prinsip kebersamaan, efisiensi keadilan, keberlanjutan, wawasan lingkungan, kemandirian, serta dengan menjaga keseimbangan kemajuan dan kesatuan ekonomi nasional', 'Cabang-cabang produksi boleh dikuasai oleh perseorangan atau Negara', 'Bumi dan air dan kekayaan alam yang terkandung di dalamnya dikuasai oleh negara dan dipergunakan untuk sebesar-besarnya kemakmuran rakyat'),
(148, 2, 'text', 'Perundingan antara Indonesia dan Belanda yang dilakukan pada tanggal 10 November 1945. Dalam perundingan ini, Indonesia diwakili oleh Perdana menteri Sutan Syahrir, sedangkan Belanda diwakili oleh Prof. Schermerhorn. Perundingan ini adalah', 'text', 'Renville', 'Linggarjati', 'Roem Royen', 'Giyanti', 'Bongaya'),
(149, 2, 'text', 'Lambang Negara Indonesia adalah Garuda dengan semboyan Bhinneka Tunggal Ika, sebagaimana tercantum dalam UUD 1945 Pasal 36 A yang merupakan hasil amandemen....', 'text', 'kesatu', 'kedua', 'ketiga', 'keempat', 'kelima'),
(150, 2, 'text', 'Keterkaitan antara hubungan pokok pikiran pertama pembukaan UUD 1945 terhadap pembangunan nasional adalah...', 'text', 'Pembnagunan nasional didasarkan pada kekuatan spiritual yang luhur', 'Pembangunan nasional harus dilakukan oleh segenap rakyat Indonesia', 'Keberhasilan pembangunan harus didasarkan pada keadilan sosial', 'Mengepankan musyawarah mufakat dalam perumusan rencana pembangunan nasional', 'Adanya kesadaran bahwa keberhasilan pembangunan nasional dilakukan oleh seluruh warga negara'),
(151, 2, 'text', 'Keragaman masyarakat Indonesia berdasarkan keagamaan ditandai dengan..', 'text', 'terjadinya konflik antarumat beragama', 'terdapat kebebasan dalam kegiatan dakwah atau ceramah keagamaan', 'diakuinya berbagai agama dan para pemeluknya', 'terdapat salah satu agama mayoritas di tengah-tengah masyarakat', 'munculnya aliran kepercayaan yang beragam di dalam masyarakat'),
(152, 2, 'text', '0', 'text', 'Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima'),
(153, 2, 'text', '0', 'text', 'Budaya', 'Bahasa', 'Pendidikan', 'Lagu Kebangsaan', 'Sosial'),
(154, 2, 'text', 'Pancasila sebagai ideologi terbuka mengandung tiga nilai fleksibilitas salah satunya adalah memiliki nilai dasar. Yang menjadi nilai dasar Pancasila adalah..', 'text', 'UUD 1945', 'Proklamasi', 'PP', 'Tap MPR', 'Kebudayaan'),
(155, 2, 'text', 'Perilaku berikut ini yang mencerminkan Pancasila sila pertama adalah.....', 'text', 'membantu korban bencana alam', 'menghormati kebudayaan suku lain', 'selalu membeli produk-produk dalam negeri', 'mengikuti kegiatan siskamling', 'menghormati teman yang berbeda agama dan keyakinan'),
(156, 2, 'text', 'Berani berkorban untuk kepentingan bangsa dan negara merupakan wujud perilaku yang mencerminkan Pancasila sila .....', 'text', 'pertama', 'kedua', 'ketiga', 'keempat', 'kelima'),
(157, 2, 'text', '0', 'text', 'monopoli perdagangan', 'persaingan bebas', 'pengembangan kreativitas', 'pengawasan dari pemerintah secara mutlak', 'ketidakadilan dalam berusaha'),
(158, 2, 'text', 'Pancasila sebagai ideologi terbuka harus bersifat.....', 'text', 'reformatif dan dinamis', 'kaku dan egaliter', 'statis dan egaliter', 'terbatas dan memaksa', 'otoriter dan tertutup'),
(159, 2, 'text', 'Kondisi masyarakat Indonesia yang terdiri atas beragam suku bangsa dapat menyebabkan konflik antarsuku bangsa yang didorong oleh etnosentrisme. Hal tersebut akibat dari perbedaan ....', 'text', 'budaya', 'keturunan', 'pekerjaan', 'agama', 'ekonomi'),
(160, 2, 'text', 'Apabila di dalam masyarakat terjadi konflik yang tidak dapat teratasi, maka pada puncaknya akan terjadi...', 'text', 'akulturasi', 'asimilasi', 'koersi', 'disintegrasi', 'akomodasi'),
(161, 2, 'text', 'Pemahaman atheisme dilarang berkembang di Indonesia karena bertentangan dengan Pancasila, terutama sila...', 'text', 'Ketuhanan Yang Maha Esa', 'Kemanusiaan yang adil dan beradab', 'Persatuan Indonesia', 'Kerakyatan yang dipimpin oleh hikmat kebijaksanaan dalam permusyawaratan dan perwakilan', 'Keadilan sosial bagi seluruh rakyat Indonesia'),
(162, 2, 'text', 'Menempatkan manusia sesuai hakikatnya sebagai makhluk Tuhan merupakan pencerminan dari Pancasila sila ke....', 'text', '5', '4', '3', '2', '1'),
(163, 2, 'text', '0', 'text', 'bersikap adil terhadap sesame', 'berteman dengan teman yang berbeda suku', 'mengedepankan musyawarah dalam mengambil keputusan bersama', 'memberi kesempatan orang lain untuk beribadah', 'memperlakukan orang lain sesuai hak dan kewajibannya'),
(164, 2, 'text', 'Pak Tono adalah orang yang sombong, la selalu menilai orang dari kekayaan dan kedudukannya. Sikap Pak Tono bertentangan dengan sila....', 'text', 'Ketuhanan Yang Maha Esa', 'Kemanusiaan yang adil dan beradab', 'Persatuan Indonesia', 'Kerakyatan yang dipimpin oleh hikmat kebijaksanaan dalam permusyawaratan dan perwakilan', 'Keadilan sosial bagi seluruh rakyat Indonesia'),
(165, 2, 'text', 'Warga Negara Indonesia yang kurang mampu mendapatkan perlindungan kesehatan dari negara berupa program Kartu Indonesia Sehat. Hal ini sesuai dengan penerapan Pancasila terutama sila ke .....', 'text', 'pertama', 'kedua', 'ketiga', 'keempat', 'kelima'),
(166, 2, 'text', '0', 'text', 'Pembukaan UUD 1945', 'Batang Tubuh UUD 1945', 'Piagam Jakarta', 'Kitab Sutasoma', 'Kitab Negara Kertagama'),
(167, 2, 'text', '0', 'text', 'Membayar pajak tepat pada waktunya', 'Melakukan pekerjaan yang tidak melanggar hukum', 'Membeli produk buatan dalam negeri', 'Menggunakan hak pilih dalam pemilu', 'Memiliki toleransi tinggi terhadap orang yang berbeda keyakinan'),
(168, 2, 'text', 'Perhatikan pernyataan di bawah ini! (1) Bubarkan PKI beserta ormas-ormasnya\n(2) Bersihkan kabinet Dwikora dari unsur-unsur PKI\n(3)Turunkan harga\nKetiga Pernyataan di atas adalah isi dari.', 'text', 'A. Trikora', 'Tritura', 'Tugu rakyat', 'Dwikora', 'Tripitaka'),
(169, 3, 'text', ' Menjelang jam istirahat kantor, anda dan rekan anda berjanji untuk makan siang di luar kantor. Akan tetapi bos anda memanggil dan minta tolong anda menangani klien prioritas yang akan datang di jam istirahat dan transaksi klien tersebut akan sangat berpengaruh pada penambahan modal perusahaan anda, apa yang akan anda lakukan?', 'text', 'Menolak permintaan bos dengan sopan karena jam istirahat adalah hak karyawan', 'Mengatakan pada bos bahwa anda sudah memiliki janji dan akan segera kembali untuk melayani klien', 'Meminta bantuan teman untuk menangani klien selama anda pergi dan akan segera membantu setelah anda kembali', 'Menerima permintaan bos untuk melayani klien dan membatalkan janji dengan teman', '. Makan siang di kantor sambil mempersiapkan beberapa hal sambil menunggu klien'),
(170, 3, 'text', ' Anda meminta bantuan teman anda untuk mengerjakan sebuah proyek, namun di tengah proses kelihatannya teman anda kurang bersemangat mengerjakannya, apa yang anda lakukan?', 'text', 'Menanyakan hal yang membuatnya tidak bersemangat', 'Mengamati dan mencari tahu akar permasalahannya', 'Menyemangati teman untuk mengerjakannya', 'Mengobrol dan mengingatkan teman akan target pengerjaan seharusnya', 'Mencari cara agar proyek tersebut dapat diselesaikan tepat waktu'),
(171, 3, 'text', 'Anda adalah PNS melalui jalur CPNS resmi suatu instansi yang di kepalai kerabat Anda. Belakangan diketahui bahwa ternyata Anda tidak lulus dan orang tua menggunakan jalur belakang untuk meluluskan Anda. Padahal selama ini Anda selalu aktif memerangi KKN, sikap Anda?', 'text', 'Menyesali perbuatan dengan bersedekah membantu korban bencana dan aktif di organisasi kemanusiaan', 'Menasehati orang tua dan melaporkan pada pihak berwenang', 'Mengakui kecurangan di depan semua orang, melapor ke pihak berwenang dan menunggu keputusan instansi', '. Menyesali perbuatan, tetap tenang dan tidak gegabah karena sulit memecat PNS', 'Meminta maaf dan melapor ke pihak berwenang'),
(172, 3, 'text', 'Saat jam istirahat di kantor, semua rekan-rekan anda berkumpul di kantin untuk makan siang, tiba-tiba salah satu teman anda berbicara dalam bahasa daerah yang membuat semua rekan anda menertawakan teman anda tersebut. Bagaimana sikap anda menanggapi hal ini?', 'text', '. langsungmengalihkan pembicaraan lain yang tidak berhubungan dengan candaan teman anda tersebut', 'Ikut menertawakan hal tersebut bersama rekan yang lain', 'menemui rekan tersebut dibelakang secara personal dan menghiburnya', 'mengajak ngobrol rekan dan menyampaikan jika candaan tersebut tidak perlu ditanggapi', 'melaporkan hal ini kepada atasan'),
(173, 3, 'text', 'Saya diutus untuk menghadiri seminar menggantikan atasan saya. Pada saat yang bersamaan saya sedang mengerjakan laporan yang tidak terlalu mendesak...', 'text', 'Saya akan selesaikan terlebih dahulu laporan tersebut, sebab bisa saja diminta oleh atasan sewaktu-waktu.', 'Laporan tersebut akan menjadi merepotkan kalau tertunda', 'Saya akan menghadiri seminar tersebut agar dapat menghindar dari tugas laporan.', 'Saya akan menghadiri seminar tersebut karena laporan belum harus segera diserahkan kepada atasan.', 'Saya bisa menghadiri seminar dan mengerjakan laporannya nanti saja.'),
(174, 3, 'text', 'Salah satu anggota tim anda melakukan kesalahan fatal dalam tugasnya karna kurangnya pemahaman dia tentang teknologi informasi. Sebagai ketua tim apa yang anda lakukan....', 'text', 'Mengumpulkan semua anggota tim dan membahas serta mencari jalan keluar dari permasalahan tim.', 'Mengundang ahli IT untuk memberikan pengetahuan kepada tim tentang cara penggunaan teknologi informasi.', 'Mengundang ahli IT untuk memberikan pengetahuan kepada tim tentang pentingnya teknologi informasi dan pelatihan cara penggunaan teknologi informasi', 'Mengumpulkan anggota tim dan membahas permasalahan anggota tim yang bermasalah tersebut.', 'Mengeluarkannya dari tim'),
(175, 3, 'text', 'Atasan anda menugaskan anda membuat sebuah tim untuk menyelesaikan sebuah masalah pekerjaan di kantor anda, tetapi di kantor anda terdiri dari orang-orang dari berbagai macam latar belakang suku yang berbeda dengan anda. Bagaimana sikap anda...', 'text', '. Membuat sebuah kelompok yang solid dari orang-orang yang sepemahaman dengan saya karena kekompakan itu penting.', 'Memilih orang-orang dari berbagai latar belakang agar tidak ada kecemburuan sosial', 'Memilih orang-orang dari berbagai latar belakang yang berbeda agar dapat memperoleh bermacam saran dan masukan', 'Membuka kesempatan bagi siapapun yang memiliki kemauan dan kemampuan bekerja tim.', 'Membuka kesempatan bagi siapapun yg memiliki kemauan dan kemampuan bekerja tim tanpa membedakan latar belakang.'),
(176, 3, 'text', 'Pada saat anda sedang mengerjakan sebuah pekerjaan penting, tiba-tiba anda menemukan sebuah kejanggalan pada sistem informasi yang anda gunakan dan bisa berakibat bocornya data perusahaan ke publik. Bagaimana sikap anda...', 'text', 'Menyuruh semua rekan kerja untuk menghentikan penggunaan sistem itu.', 'Saat itu juga anda menghentikan penggunaan sistem itu.', 'Melaporkan kepada atasan apakah harus berhenti menggunakan sistem itu.', 'Menyelesaikan pekerjaan penting tersebut lebih dulu kemudian menghentikan penggunaan sistem itu.', 'Menyelesaikan pekerjaan penting tersebut lebih dulu kemudian melaporkan ke atasan tentang masalah pada sistem itu'),
(177, 3, 'text', 'Perusahaan anda mengalami penurunan financial tahun ini, apa yang anda lakukan?', 'text', 'Tetap bekerja dengan baik seperti tahun lalu', 'Membuat strategi baru untuk meningkatkan hasil kinerja kerja', 'Mempelajari hal mungkin jadi penyebab penurunan tersebut', 'Sebagai karyawan saya akan mengikuti arahan dan atasan', 'Tetap mendukung atasan, penurunan hanya terjadi di tahun ini'),
(178, 3, 'text', '0', 'text', 'senang menfollow akun-akun selebgram terkenal berikut berita terbarunya', 'menggunakan fasilitas internet sebagai sarana untuk menghasilkan uang', 'ikut bergabung dengan beberapa grup di media sosial untuk menjalin silaturrahmi', 'bisa memperoleh informasi yang dibutuhkan lewat kolom pencarian dan hanya dengan satu kali klik', 'sering membuka situs mengenai informasi terbaru dan membagikannya darimanapun sumbernya'),
(179, 3, 'text', 'Bos ada selalu mengagung-agungkan kinerja rekan kerja anda karena selalu menggunakan teknologi yang ada di setiap kesempatan, apakah yang anda lakukan?', 'text', 'Diam saja dan mendengarkan bos', 'Ikut menggunakan teknologi juga sesuai dengan kemampuan yang saya bisa', 'Mempelajari teknologi secara diam-diam', 'Setiap karyawan punya cara sendiri asalkan semua pekerjaan bisa diselesaikan dengan baik', 'Bersama-sama dengan rekan kerja yang lain meminta bos untuk menghargai kinerja mereka juga'),
(180, 3, 'text', 'Anda memiliki seorang teman yang bercerita kepada anda dan mengeluhkan suaminya yang pecandu narkoba. Dan memohon bantuan karena dia sudah kehabisan cara menghadapi suaminya. Anda sangat prihatin melihat teman anda yang sangat tertekan itu. Anda memiliki sahabat yang bekerja di Lembaga yang merehabilitasi pecandu narkotika, maka tindakan anda...', 'text', 'memberi nomor telepon teman, agar dia segera mendaftarkan suaminya di rehabilitasi', 'Memberi nomor teman dan memperkenalkan teman anda yang bermasalah kepada teman anda yang jadi petugas', 'Menelpon teman dan memintanya mendaftarkan suami teman yang harus di rehabilitasi', 'menyarankannya agar segera mendaftar di lembaga rehabilitasi tersebut.', 'Tidak melakukan apapun karena dia harus nya tau sendiri tempat merehabilitasi dimana'),
(181, 3, 'text', 'Di tempat anda bekerja, bagian HRD kesulitan ketika menyeleksi pegawai baru karena sistem lama yang masih manual. Jika Anda seorang praktisi IT, Apa yang hal anda lakukan untuk mengatasi tersebut..', 'text', 'Menyewa konsultan IT dan membangun sistem untuk mempermudah proses seleksi', 'Mempelajari permasalahannya lalu membuat sistem mandiri', 'Membuat kemampuan sistem mandiri seadanya sesuai', 'Meminta teman anda yang ahli IT untik membuat sistem mandiri', 'Membeli sistem dari perusahaan lain yang sudah jadi'),
(182, 3, 'text', 'Anda dan dua teman anda diundang oleh teman anda yang berbeda keyakinan ke acara pernikahannya. Sehari sebelum acara dimulai anda diminta menggunakan pakaian khusus yang tidak biasa digunakan oleh agama anda. Apa yang akan anda lakukan?', 'text', 'Menolaknya dengan tegas dan sopan', 'Menyetujui tetapi hanya memakainya saat itu saja', 'Menyetujuinya setelah merundingkannya dengan kedua teman terlebih dahulu agar pakaian ada sedikit perubahan', 'Menolaknya lalu pura-pura sakit', 'Menyetujuinya dan bersedia melakukan apa saja sesuai agama dan adat istiadat teman'),
(183, 3, 'text', 'Pimpinan di perusahaan anda adalah orang yang sudah cukup berumur dan sudah sering mejadi ketua di perusahaan tersebut dengan kinerja yang sangat baik, akan tetapi menurut rekan kerja anda, pimpinan tersebut tidak memiliki pengetahuan IT yang baik padahal sekarang ini disetiap pekerjaan kita tidak bisa terlepas dari teknologi, menanggapi hal ini apa yang anda lakukan?', 'text', 'menawarkan secara pribadi kepada pimpinan tersebut untuk membantu mengetahui IT', 'mendiskusikan masalah ini di dalam rapat', 'membiarkannya saja karena beliau sudah memiliki kinerja yang baik dan IT bukan pekerjaan utamanya', 'membantunya dan mendorongnya untuk memahami IT', 'mengajak rekan-rekan yang lain untuk turut membantu beliau memahami IT'),
(184, 3, 'text', 'Anda seorang resepsionis di suatu kantor yang bergerak dalam bidang pelayanan. Banyak keluhan yang ditujukan pada instansi tempat anda bekerja. Padahal di instansi anda tersebut terdapat fasilitas untuk keluhan online. Sikap anda...', 'text', 'Menerima keluhan para konsumen sembari mengajarkan cara menyampaikan keluhan secara online', 'Menerima dan menanggapi keluhan sembari mengajarkan cara menyampaikan keluhan secara online', 'Menerima dan menyelesaikan keluhan konsumen sambil menanyakan apakah ada kesulitan saat menyampaikan keluhan secara online', 'Menyelesaikan keluhan konsumen sambil menanyakan apakah ada kesulitan saat menyampaikan keluhan secara online', 'Mendengarkan keluh kesah konsumen tentang masalahnya dan mengajarkan cara menyampaikan keluhan secara online'),
(185, 3, 'text', 'Anda adalah orang tua dari anak yang gemar jajan. Jika tidak diberi jajan maka anak anda akan merengek. apa yang akan anda lakukan?', 'text', 'Menegurnya dan tidak memberikan jajan', 'Tetap memberikan jajan karena sayang padanya', 'Mengajaknya memasak bersama', 'Tidak memberikan uang jajan agar ia tidak jajan sembarangan', 'Memberikannya penjelasan mengenai pentingnya menghemat uang jajan'),
(186, 3, 'text', 'Anda termasuk ke dalam salah satu dari 3 kandidat karyawan terbaik yang akan dipromosikan untuk naik jabatan di perusahaan anda. Untuk memutuskan siapa yang layak diantara kandidat yang ada, pimpinan perusahaan memberikan tugas yang sebelumnya tidak pernah kamu kerjakan, bagaimana kamu mengatasinya', 'text', 'Bekerja sama dengan dua kandidat yang lain untuk saling membantu', 'Membaca berbagai referensi yang mendukung penyelesaian tugas tersebut', 'Membeli buku buku penunjang di gramedia untuk memudahkan dalam pemahaman terhadap tugas', 'Mencari referensi di google dan jurnal jurnal online dan memakainya untuk penyelesaian tugas agar hasilnya maksimal', 'Meminta bantuan dan pencerahan kepada atasan untuk menjelaskan bagaimana cara mengerjakannya'),
(187, 3, 'text', 'Anda baru saja pulang liburan dari sebuah pulau. Ketika hendak mengambil barang anda di pengambilan bagasi ternyata koper anda yang berisi oleh oleh buat keluarga anda tidak ada. Sikap anda', 'text', 'Meminta pertanggung jawaban dari pihak maskapai penerbangan', 'Melapor kepada petugas yang berwenang', 'Menanyakan kenapa barang anda tidak ada kepada petugas', 'Meminta pihak bandara bertanggung jawab dan mengganti barang anda', 'Mengurus koper yang hilang dengan membayar asuransi perjalanan'),
(188, 3, 'text', 'Ketika anda sedang mengambil beberapa dokumen di meja CS, tiba-tiba datang seorang pelanggan yang marah pada anda karena pelayanan yang kurang baik bahkan sampai mencaci anda, yang anda lakukan', 'text', 'Menahan emosi dan menjawab pertanyaannya karena sudah tugas saya melayani', 'Tetap tersenyum dan mendengarkan keluhannya', 'Menasehatinya agar tidak boleh berkata kasar', 'Meminta maaf dan mendengarkan keluhannya', 'Berusaha tidak marah meskipun dicaci dan tetap melayani keluhannya'),
(189, 3, 'text', 'Anda merupakan seorang kurir yang setiap hari bertugas mengantarkan kiriman barang kerumah pelanggan. Anda tidak tahu isi dari barang yang anda antar tersebut, tugas anda hanya mengantarkan ke alamat. Suatu hari anda dikomplain karena barang yang anda antar keliru. Bagaimana sikap anda', 'text', 'Mendengarkan dan menjelaskan bahwa anda hanya kurir yang tugasnya hanya mengantar barang saja.', 'Mendengarkan dan memberikan solusi supaya kejadian ini tidak berulang', 'Mendengarkan dan minta maaf serta bersedia untuk mengantarkan barang yang tepat secepatnya', 'Mendengarkan saja supaya dia merasa dipahami setelah itu tidak perlu melakukan apapun', 'Minta maaf, Mendengarkan dan memberitahu ke atasan anda jika ada barang yang keliru via telefon'),
(190, 3, 'text', 'Anda akan ditugaskan oleh atasan anda untuk menjadi panitia pameran yang akan memperkenalkan produk produk perusahaan, termasuk menjual beberapa produk untuk melihat respon pembeli. Pameran tersebut akan diikuti oleh banyak perusahaan yang juga memperkenalkan produk meraka ada yang setipe dengan anda dan ada juga yang berbeda, untuk menarik pengunjung apa yang anda lakukan', 'text', 'Memperagakan produk yang berkualitas di estalase agar banyak yang tertarik', 'Membuat pengunjung nyaman dengan stand anda dengan menyediakan tempat duduk dll', 'Selalu bersikap ramah terhadap pengunjung yang lewat dan mempersilakan untuk mampir', 'Membuat konsep stand pameran yang menarik', 'Membuat stand pameran yang besar agar semua pengunjung bisa muat di stand anda'),
(191, 3, 'text', 'Anda merupakan karyawan baru pada sebuah perusahaan. Karena masih dalam masa percobaan gaji yang diberikan oleh perusahaan kepada anda biasanya sangat pas pasan untuk kebutuhan sehari hari. Belum lagi setiap minggunya pacar anda sering mengajak untuk nonton. Kondisi ini diperburuk lagi anda termasuk orang yang lumayan boros sehingga terkadang, pengeluaran anda lebih besar dari pemasukannya, sikap anda', 'text', 'Berusaha sekuat tenaga untuk berhemat agar gaji cukup untuk tiap bukan', 'Mengurangi aktivitas nonton bersama pacar anda dan nonton televise saja yang murah', 'Menghemat pengeluaran dan membeli hal yang dibutuhkan saja', 'Membuat perencanaan, untuk mengontrol keuangan', 'Berhemat dan menabung setiap habis gajian'),
(192, 3, 'text', 'Anda bekerja sebagai juru masak di sebuah restoran besar di ibu kota.Ketika restoran sedang ramai, tiba-tiba saudara anda datang meminta tolong kepada anda untuk mengantarkan ke bandara, karena tidak ada yang bisa mengantarkannya, Sikap anda,', 'text', 'Meminta izin pemilik restoran untuk mengantar saudara Anda ke bandara', 'Meminta izin pemilik restoran untuk mengantar saudara anda ke bandara karena tidak ada yg bisa mengantarkan', 'Menyarankan saudara Anda untuk naik angkutan umum menuju bandara karena restoran sedang ramai', 'Meminta saudara Anda untuk menunggu karena restoran ramai dan mengantarkan ke bandara setelah restoran sepi', 'Meminta teman untuk mengantarkan saudara anda ke bandara karena restoran ramai sehingga anda tidak dapat mengantarkan sendiri'),
(193, 3, 'text', 'Anda baru saja menyelesaikan pendidikan sarjana anda disebuah universitas luar negeri. Setelah lulus anda berkeinginan untuk membuka usaha sendiri di bidang properti. Namun setelah anda mengutarakan dan meyakinkan hal tersebut kepada keluarga anda berkali kali mereka tidak memberikan dukungan dan meminta anda untuk mencoba melamar di perusahaan sedangkan anda sendiri lebih suka pekerjaan yang bebas tanpa harus diatur orang dan pekerjaan yang tidak bersifat rutinitas setiap harinya, sikap anda', 'text', 'Mengikuti saran orang tua dan mengurungkan niat anda untuk berwirausaha', 'Meminta orang tua mau mendukung keinginan anda', 'Meyakinkan orang tua jika anda bisa sukses dengan berwirausaha', 'Tetap fokus dengan keinginan karena anda menyukainya dan sesuai passion anda', 'Memantapkan diri Anda sendiri dan fokuslah mengelola bisnis dengan Baik'),
(194, 3, 'text', 'Di divisi tempat anda bekerja sedang terjadi sebuah masalah yang dapat mempengaruhi kinerja karyawan dalam menyelesaikan tugasnya. Anda sebagai atasan sudah mencoba untuk berfikir dan memandang masalah tersebut secarah objektif dan menganalisis setiap karyawan yang dapat terpengaruh atas masalah tersebut, kemudian yang anda lakukan', 'text', 'Meminta mereka untuk berpartisipasi lebih baik lagi dan patuh terhadap semua kebijakan yang akan di ambil', 'Menyuruh mereka mematuhi semua kebijakan dan meminta penyelesaian dari masalah tersebut', 'Meminta masukkan dari mereka dan membuat keputusan secepatnya agar dipatuhi semua karyawan divisi', 'Membuat keputusan secepatnya dan memberitahu karyawan divisi akan hal tersebut, agar tidak kaget', 'Meminta masukan dari mereka, melakukan revisi seperlunya, dan kemudian mengajak mereka turut mengimplementasikan rencana yang telah disepakati bersama.'),
(195, 3, 'text', 'Anda diminta atasan anda untuk menyelesaikan sebuah masalah di dalam pekerjaan karena atasan anda menilai anda karyawan yang paling mampu mengatasinya dengan baik dan efektif. Namun ketika di tengah jalan penyelesaian yang anda berikan terhadap permasalahan tersebut sedikit kurang optimal untuk memberikan solusi terbaik seperti yang diharapkan perusahaan, yang anda lakukan', 'text', 'Saya akan merubah semua solusi yang ada dan membuat penyelesaian baru', 'Saya meminta atasan untuk memberikan saya waktu lebih untuk memikirkannya', 'Saya melakukan modifikasi atas keputusan tersebut, terkadang modifikasi kecil sudah cukup', 'Mengembalikan tugas tersebut kepada atasan untuk di limpahkan kapada karyawan lain', 'Memikirkan cara yang paling efektif dari penyelesaian sebelumnya'),
(196, 3, 'text', 'Anda telah bekerja sesuai dengan SOP yang perusahaan berikan kepada setiap karyawan dengan jelas, sudah terdokumentasi sebagai panduan bagi setiap karyawan dalam bekerja dan telah menerapkannya setiap hari dengan baik, namun terkadang ada kondisi dimana sebuah masalah yang timbul tidak ijelaskan bahkan tidak ada di dalam SOP yang perusahaan berikan, yang akan anda lakukan', 'text', 'Tetap mengikuti sop yang ada meskipun pekerjaan selesai jadi sangat lama dan mengganggu kinerja', 'Meminta bantuan kepada rekan karyawan yang lain untuk dicarikan solusi terbaik', 'Melihat dari kondisi yang ada dan saya sesuaikan dengan misi perusahaan agar pekerjaan cepat terselesaikan', 'Menyuruh atasan untuk meriview kembali sop yang ada agar karyawan dapat bekerja dengan baik', 'Memikirkan penyelesaian yang sekira cocok dan bisa saya kerjakan sesuai kemampuan saya dan misi perusahaan'),
(197, 3, 'text', 'Anda baru saja di mutasi ke sebuah cabang baru dari perusahaan anda yang berlokasi diluar kota, anda diberikan tanggung jawab yang lebih besar dari sebelumnya untuk mengontrol dan mewujudkan tujuan perusahaan di kantor cabang baru tersebut, dan memajukan perusahaan. Namun cabang baru tersebut di isi oleh karyawan karyawan baru dari daerah dan belum berpengalaman, yang anda lakukan', 'text', 'Memberitahukan kepada karyawan baru tersebut terkait pekerjaan yang harus mereka kerjakan', 'Menyuruh mereka untuk lebih berinisiatif untuk mengimprovisasi diri dan meningkatkan kualitas dalam bekerja', 'Menyuruh mereka membaca semua tugas mereka dan menerapkannya dalam setiap pekerjaan', 'Meminta untuk bekerja maksimal dan loyal terhadap perusahaan', 'Mengkomunikasikan sasaran perusahaan dan memotivasi staf saya untuk mencapainya'),
(198, 3, 'text', 'Beberapa tahun lagi anda akan memasuki usia pensiun dari salah satu instansi pemerintahan tempat anda bekerja selama ini. Tanggung jawab anda untuk mengabdi bagi negarapun telah selesai. Sekarang anda memasuki babak baru dimana tidak lagi terikat dengan pekerjaan dan pengabdian terhadap negara. Hal apa yang akan anda rencanakan untuk selanjutnya ketika waktu itu telah tiba', 'text', 'Saya membuka usaha kecil-kecilan dirumah sambil menghabiskan hari tua saya dengan anak dan cucu-cucu saya', 'Memiliki tanah di berbagai tempat strategis untuk investasi masa tua saya dan keluarga', 'Membuka lapangan kerja buat orang terdekat dan yang membutuhkan pekerjaan karena zaman sekarang sulit mendapatkan pekerjaan', 'Memiliki warisan harta yang berguna bagi anak dan cucu saya kelak ketika waktu tersebut sudah tiba', 'Beristirahat saja setiap hari di rumah menikmati hari hari tua saya bersama keluarga'),
(199, 3, 'text', 'Ikan A hidup di air tawar. Ikan C hidup di air laut.\n     Kesimpulan yang tepat tentang tempat hidup kedua ikan adalah...', 'text', 'Ikan C ada di tempat hidup ikan A', 'Ikan C ada di tempat hidup bukan ikan C', 'Ikan A ada di tempat hidup bukan ikan A', ' Ikan A ada di tempat hidup bukan ikan C', 'Ikan A ada di tempat hidup ikan C'),
(200, 3, 'text', '0', 'text', 'Semua karyawan Perusahaan A mendapat Tunjangan Hari Raya dan bingkisan Hari Raya', 'Karyawan  Perusahaan  A  yang  mendapat  Tunjangan  Hari  Raya  selalu  mendapat bingkisan Hari Raya', 'Sebagian karyawan Perusahaan A mendapat Tunjangan Hari Raya selalu mendapat bingkisan Hari Raya', 'Karyawan Perusahaan A yang mendapat gaji, tidak mendapat bingkisan Hari Raya', 'Karyawan Perusahaan A tidak mendapat Tunjangan Hari Raya dan bingkisan Hari Raya'),
(201, 3, 'text', '0', 'text', 'K dan J', 'J dan K', 'M dan N', 'N dan M', 'I dan H'),
(202, 3, 'text', 'Dalam pemilihan ketua kelas VI, perolehan suara Ahmad tidak kurang dari Conie dan tidak lebih dari Eka. Perolehan suara Beta sama dengan Ahmad dan tidak lebih dari Eka. Perolehan suara Doddy tidak lebih dari Beta dan kurang dari Conie. Siapakah yang terpilih sebagai ketua kelas?', 'text', 'Ahmad', 'Conie', 'Eka', 'Dody', 'Beta'),
(203, 3, 'text', 'WALAKIN =', 'text', 'Tetapi', 'Kumat', 'Andai', 'Kacau', 'Juga'),
(204, 3, 'text', '0', 'text', '56', '48', '42', '40', '28'),
(205, 3, 'text', '0', 'text', '45 pasang', '75 pasang', '80 pasang', '90 pasang', '100 pasang'),
(206, 3, 'text', '0', 'text', '40', '32', '24', '16', '25'),
(207, 3, 'text', ' Seorang presenter acara hiburan harus membaca surat yang dikirim pada para pemirsa. Surat A dibaca menjelang akhir acara. Surat B dibaca lebih dahulu dari surat A, tetapi bukan sebagai surat pembuka. Surat C dan D dibacakan berurutan di antara surat E dan B. Surat siapakah yang dibaca paling awal?', 'text', 'Surat A', 'Surat B', 'Surat C', 'Surat D', 'Surat E'),
(208, 3, 'text', 'TANGKAI : KELOPAK : BUNGA=', 'text', 'Tubuh : tangan : kepala', 'Tanah : laut : air', 'Tahun : bulan : hari', 'Pelepah : tangkai : daun', 'Langit : tanah : magma'),
(209, 3, 'text', 'OPAS >< ...', 'text', 'Pimpinan', 'Pesuruh', 'Komandan', 'Prajurit', 'Porter'),
(210, 3, 'text', ' JENGGALA = ...', 'text', 'Lebat', 'Bukti', 'Gurun', 'Hutan', 'Sabana'),
(211, 3, 'text', '0', 'text', 'Salju - Jaket', 'Beku - Panas', 'Pendingin - Payung', 'Minuman - Hujan', '0'),
(212, 3, 'text', 'Jika 5% dari suatu bilangan adalah 6, maka 20% dari bilangan tersebut adalah ...', 'text', '1,2', '4,8', '24', '120', '600'),
(213, 3, 'text', 'Jika 2 < x < 4, 3 < y < 5, dan w = x + y, maka nilai w berada antara nilai ...', 'text', '5 dan 7', '4 dan 9', '5 dan 8', '5 dan 9', '4 dan 8'),
(214, 3, 'text', ' ULTIMA >< ...', 'text', 'Final', 'Kesan', 'Biasa', 'Akhir', 'Awal'),
(215, 3, 'text', 'AGITATOR = ...', 'text', 'Penghasut', 'Pembela', 'Pemerhati', 'Ahli Pidato', 'Orator'),
(216, 3, 'text', ' ... :SEPAK BOLA = BERBISIK : ...', 'text', 'Kompetisi - Suara', 'Kiper - Komunikasi', 'Liga - Berjalan', 'Futsal - Berbicara', 'Lapangan - Rasa Takut'),
(217, 3, 'text', '0', 'text', 'Responden', 'Rangsangan', 'Tantangan', 'Kesimpulan', 'Respon'),
(218, 3, 'text', '0', 'text', '-3', '436', '1', '2', '876'),
(219, 3, 'text', '0', 'text', '(x -y)2 > 10', 'Hubungan x dan y tidak dapat ditentukan', '(x -y)2 < 10', '(x -y)2 > (10)2', '(x -y)2 = 10'),
(220, 3, 'text', '0', 'text', '0.17', '0.87', '1.37', '0.37', '1.07'),
(221, 3, 'text', ' Sebuah komputer mengalami penurunan harga secara berturut-turut 40% dan 20%. Berapa penurunan total harga komputer tersebut?', 'text', '0.86', '0.52', '0.3', '0.24', '0.64'),
(222, 3, 'text', '0', 'text', '5p5q5', '5p2q5r', '5p5qr', '5p2q5r5', '5p3q5r'),
(223, 3, 'text', '0', 'text', '20 orang', '24 orang', '27 orang', '31 orang', '41 orang'),
(224, 3, 'text', '0', 'text', 'Jika laba tinggi maka karyawan tidak sejahtera', 'Jika laba rendah maka karyawan tidak sejahtera', 'Jika laba rendah maka karyawan sejahtera', 'Jika karyawan sejahtera maka laba tinggi', 'Jika karyawan tidak sejahtera maka laba tidak tinggi'),
(225, 3, 'text', '0', 'text', '2', '3', '4', '5', '6'),
(226, 3, 'text', '0', 'text', '20 orang', '24 orang', '27 orang', '31 orang', '41'),
(227, 3, 'text', 'Petinju:... = Pembalap: ....', 'text', 'Ring : Sirkuit', 'Atlet : Medali', 'Ronde : Mobil', 'Kuat : Helm', 'Juara : Pemenang'),
(228, 3, 'text', ' Hewan:... = Makanan : Soto', 'text', 'Lapar', 'Tumbuhan', 'Ayam goreng', 'Ubur-ubur', 'Haus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mulai_ujian`
--

CREATE TABLE `tb_mulai_ujian` (
  `mulai_ujian_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `mulai_ujian_tanggal` date NOT NULL,
  `mulai_ujian_start` time NOT NULL,
  `mulai_ujian_end` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_mulai_ujian`
--

INSERT INTO `tb_mulai_ujian` (`mulai_ujian_id`, `user_id`, `mulai_ujian_tanggal`, `mulai_ujian_start`, `mulai_ujian_end`) VALUES
(1, 1, '2021-08-20', '12:13:39', NULL),
(2, 1, '2021-08-23', '15:15:54', NULL),
(3, 1, '2021-08-25', '10:48:12', NULL),
(4, 1, '2021-08-27', '22:46:44', NULL),
(5, 1, '2021-08-30', '09:46:45', NULL),
(6, 1, '2021-09-09', '10:16:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mulai_ujian_detail`
--

CREATE TABLE `tb_mulai_ujian_detail` (
  `mulai_ujian_detail_id` bigint(20) UNSIGNED NOT NULL,
  `mulai_ujian_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `mulai_ujian_detail_jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai_ujian_detail_ragu_ragu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_mulai_ujian_detail`
--

INSERT INTO `tb_mulai_ujian_detail` (`mulai_ujian_detail_id`, `mulai_ujian_id`, `soal_id`, `mulai_ujian_detail_jawaban`, `mulai_ujian_detail_ragu_ragu`) VALUES
(1, 1, 1, 'a', '0'),
(2, 1, 2, 'b', '0'),
(3, 1, 3, 'c', '1'),
(4, 1, 4, 'e', '0'),
(5, 1, 6, 'c', '0'),
(6, 1, 8, 'c', '1'),
(7, 2, 1, 'b', '0'),
(8, 2, 7, 'b', '1'),
(9, 3, 1, 'a', '0'),
(10, 3, 2, 'c', '0'),
(11, 3, 3, 'c', '0'),
(12, 3, 4, 'd', '0'),
(13, 3, 5, 'e', '0'),
(14, 3, 6, 'b', '0'),
(15, 3, 7, 'd', '0'),
(16, 3, 9, 'c', '0'),
(17, 3, 8, 'b', '0'),
(18, 3, 10, 'b', '0'),
(19, 4, 1, 'b', '0'),
(20, 4, 2, 'b', '0'),
(21, 4, 8, 'b', '0'),
(22, 6, 1, 'a', '1'),
(23, 6, 2, 'b', '0'),
(24, 6, 3, 'c', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setting_soal`
--

CREATE TABLE `tb_setting_soal` (
  `setting_soal_id` bigint(20) UNSIGNED NOT NULL,
  `token_id` int(11) NOT NULL,
  `kategori_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_soal_jumlah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_setting_soal`
--

INSERT INTO `tb_setting_soal` (`setting_soal_id`, `token_id`, `kategori_id`, `setting_soal_jumlah`) VALUES
(1, 1, '1,2,3', '36,0,0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_skorsoal`
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
-- Dumping data untuk tabel `tb_skorsoal`
--

INSERT INTO `tb_skorsoal` (`skorsoal_id`, `skorsoal_soal_id`, `skorsoal_a`, `skorsoal_b`, `skorsoal_c`, `skorsoal_d`, `skorsoal_e`) VALUES
(1, 1, 1, 0, 0, 0, 0),
(2, 2, 0, 1, 0, 0, 0),
(3, 3, 0, 1, 0, 0, 0),
(4, 4, 0, 0, 1, 0, 0),
(5, 5, 0, 0, 0, 1, 0),
(6, 6, 1, 0, 0, 0, 0),
(7, 7, 1, 0, 0, 0, 0),
(8, 8, 0, 0, 1, 0, 0),
(9, 9, 1, 0, 0, 0, 0),
(10, 10, 0, 1, 0, 0, 0),
(11, 11, 0, 0, 1, 0, 0),
(12, 12, 0, 0, 0, 1, 0),
(13, 13, 0, 0, 0, 1, 0),
(14, 14, 1, 0, 0, 0, 0),
(15, 15, 0, 1, 0, 0, 0),
(16, 16, 0, 0, 0, 1, 0),
(17, 17, 1, 0, 0, 0, 0),
(18, 18, 0, 1, 0, 0, 0),
(19, 19, 1, 0, 0, 0, 0),
(20, 20, 0, 1, 0, 0, 0),
(21, 21, 1, 0, 0, 0, 0),
(22, 22, 1, 0, 0, 0, 0),
(23, 23, 0, 0, 1, 0, 0),
(24, 24, 0, 0, 0, 0, 1),
(25, 25, 1, 0, 0, 0, 0),
(26, 26, 0, 1, 0, 0, 0),
(27, 27, 0, 0, 0, 1, 0),
(28, 28, 1, 0, 0, 0, 0),
(29, 29, 0, 1, 0, 0, 0),
(30, 30, 0, 0, 0, 1, 0),
(31, 31, 0, 0, 1, 0, 0),
(32, 32, 0, 0, 1, 0, 0),
(33, 33, 0, 1, 0, 0, 0),
(34, 34, 0, 1, 0, 0, 0),
(35, 35, 1, 0, 0, 0, 0),
(36, 36, 0, 0, 0, 0, 1),
(37, 37, 0, 0, 1, 0, 0),
(38, 38, 0, 0, 0, 0, 1),
(39, 39, 0, 0, 1, 0, 0),
(40, 40, 0, 0, 0, 0, 1),
(41, 41, 1, 0, 0, 0, 0),
(42, 42, 1, 0, 0, 0, 0),
(43, 43, 0, 0, 0, 1, 0),
(44, 44, 1, 0, 0, 0, 0),
(45, 45, 0, 0, 0, 0, 1),
(46, 46, 1, 0, 0, 0, 0),
(47, 47, 0, 0, 0, 1, 0),
(48, 48, 0, 0, 1, 0, 0),
(49, 49, 1, 0, 0, 0, 0),
(50, 50, 1, 0, 0, 0, 0),
(51, 51, 0, 0, 0, 0, 5),
(52, 52, 0, 0, 0, 0, 5),
(53, 53, 5, 0, 0, 0, 0),
(54, 54, 0, 0, 0, 5, 0),
(55, 55, 5, 0, 0, 0, 0),
(56, 56, 0, 0, 0, 0, 5),
(57, 57, 0, 0, 5, 0, 0),
(58, 58, 0, 5, 0, 0, 0),
(59, 59, 0, 5, 0, 0, 0),
(60, 60, 0, 5, 0, 0, 0),
(61, 61, 0, 0, 0, 0, 5),
(62, 62, 0, 0, 5, 0, 0),
(63, 63, 0, 0, 5, 0, 0),
(64, 64, 0, 5, 0, 0, 0),
(65, 65, 0, 0, 0, 0, 5),
(66, 66, 0, 0, 0, 0, 5),
(67, 67, 0, 0, 5, 0, 0),
(68, 68, 0, 0, 5, 0, 0),
(69, 69, 5, 0, 0, 0, 0),
(70, 70, 5, 0, 0, 0, 0),
(71, 71, 0, 0, 0, 5, 0),
(72, 72, 5, 0, 0, 0, 0),
(73, 73, 0, 0, 0, 5, 0),
(74, 74, 0, 0, 5, 0, 0),
(75, 75, 0, 5, 0, 0, 0),
(76, 76, 0, 0, 0, 0, 5),
(77, 77, 0, 0, 0, 0, 5),
(78, 78, 5, 0, 0, 0, 0),
(79, 79, 0, 5, 0, 0, 0),
(80, 80, 0, 0, 0, 5, 0),
(81, 81, 0, 0, 0, 0, 5),
(82, 82, 0, 0, 0, 5, 0),
(83, 83, 0, 0, 0, 5, 0),
(84, 84, 5, 0, 0, 0, 0),
(85, 85, 0, 0, 0, 5, 0),
(86, 86, 0, 0, 5, 0, 0),
(87, 87, 0, 0, 5, 0, 0),
(88, 88, 0, 5, 0, 0, 0),
(89, 89, 0, 0, 0, 0, 5),
(90, 90, 0, 5, 0, 0, 0),
(91, 91, 0, 0, 0, 5, 0),
(92, 92, 0, 5, 0, 0, 0),
(93, 93, 0, 0, 5, 0, 0),
(94, 94, 5, 0, 0, 0, 0),
(95, 95, 0, 5, 0, 0, 0),
(96, 96, 0, 0, 0, 0, 5),
(97, 97, 0, 5, 0, 0, 0),
(98, 98, 0, 5, 0, 0, 0),
(99, 99, 0, 0, 0, 5, 0),
(100, 100, 0, 0, 0, 0, 5),
(101, 101, 0, 0, 0, 5, 0),
(102, 102, 0, 0, 0, 5, 0),
(103, 103, 0, 0, 5, 0, 0),
(104, 104, 0, 0, 0, 0, 5),
(105, 105, 0, 0, 0, 0, 5),
(106, 106, 0, 0, 5, 0, 0),
(107, 107, 0, 0, 5, 0, 0),
(108, 108, 0, 0, 0, 0, 5),
(109, 109, 5, 0, 0, 0, 0),
(110, 110, 0, 0, 0, 5, 0),
(111, 111, 0, 0, 5, 0, 0),
(112, 112, 5, 0, 0, 0, 0),
(113, 113, 0, 0, 5, 0, 0),
(114, 114, 5, 0, 0, 0, 0),
(115, 115, 0, 0, 5, 0, 0),
(116, 116, 0, 0, 5, 0, 0),
(117, 117, 5, 0, 0, 0, 0),
(118, 118, 0, 0, 0, 0, 5),
(119, 119, 0, 0, 0, 5, 0),
(120, 120, 5, 0, 0, 0, 0),
(121, 121, 0, 0, 0, 5, 0),
(122, 122, 0, 0, 5, 0, 0),
(123, 123, 0, 0, 5, 0, 0),
(124, 124, 0, 0, 0, 5, 0),
(125, 125, 0, 0, 0, 0, 5),
(126, 126, 5, 0, 0, 0, 0),
(127, 127, 0, 0, 0, 5, 0),
(128, 128, 0, 0, 0, 0, 5),
(129, 129, 0, 0, 0, 5, 0),
(130, 130, 0, 0, 0, 0, 5),
(131, 131, 0, 0, 0, 5, 0),
(132, 132, 0, 5, 0, 0, 0),
(133, 133, 0, 0, 0, 0, 5),
(134, 134, 0, 0, 0, 0, 5),
(135, 135, 0, 0, 0, 0, 5),
(136, 136, 0, 5, 0, 0, 0),
(137, 137, 0, 0, 0, 0, 5),
(138, 138, 5, 0, 0, 0, 0),
(139, 139, 0, 0, 0, 5, 0),
(140, 140, 0, 0, 0, 0, 5),
(141, 141, 0, 0, 0, 0, 5),
(142, 142, 5, 0, 0, 0, 0),
(143, 143, 0, 0, 0, 5, 0),
(144, 144, 5, 0, 0, 0, 0),
(145, 145, 0, 0, 0, 0, 5),
(146, 146, 0, 0, 5, 0, 0),
(147, 147, 0, 5, 0, 0, 0),
(148, 148, 0, 5, 0, 0, 0),
(149, 149, 0, 5, 0, 0, 0),
(150, 150, 0, 0, 0, 0, 5),
(151, 151, 0, 0, 5, 0, 0),
(152, 152, 0, 0, 5, 0, 0),
(153, 153, 0, 5, 0, 0, 0),
(154, 154, 0, 0, 0, 0, 5),
(155, 155, 0, 0, 0, 0, 5),
(156, 156, 0, 0, 5, 0, 0),
(157, 157, 0, 0, 5, 0, 0),
(158, 158, 5, 0, 0, 0, 0),
(159, 159, 5, 0, 0, 0, 0),
(160, 160, 0, 0, 0, 5, 0),
(161, 161, 5, 0, 0, 0, 0),
(162, 162, 0, 0, 0, 5, 0),
(163, 163, 0, 0, 5, 0, 0),
(164, 164, 0, 5, 0, 0, 0),
(165, 165, 0, 0, 0, 0, 5),
(166, 166, 0, 0, 0, 0, 5),
(167, 167, 5, 0, 0, 0, 0),
(168, 168, 0, 5, 0, 0, 0),
(169, 169, 0, 0, 0, 5, 0),
(170, 170, 0, 0, 0, 0, 5),
(171, 171, 0, 0, 0, 5, 0),
(172, 172, 0, 0, 0, 5, 0),
(173, 173, 5, 0, 0, 0, 0),
(174, 174, 0, 0, 0, 5, 0),
(175, 175, 0, 0, 5, 0, 0),
(176, 176, 0, 0, 5, 0, 0),
(177, 177, 0, 5, 0, 0, 0),
(178, 178, 0, 0, 0, 0, 5),
(179, 179, 0, 5, 0, 0, 0),
(180, 180, 0, 0, 0, 5, 0),
(181, 181, 0, 5, 0, 0, 0),
(182, 182, 0, 0, 5, 0, 0),
(183, 183, 5, 0, 0, 0, 0),
(184, 184, 0, 5, 0, 0, 0),
(185, 185, 0, 0, 0, 0, 5),
(186, 186, 0, 5, 0, 0, 0),
(187, 187, 0, 5, 0, 0, 0),
(188, 188, 0, 0, 0, 5, 0),
(189, 189, 0, 0, 0, 0, 5),
(190, 190, 0, 0, 0, 5, 0),
(191, 191, 0, 0, 0, 5, 0),
(192, 192, 0, 0, 5, 0, 0),
(193, 193, 0, 0, 0, 0, 5),
(194, 194, 0, 0, 0, 0, 5),
(195, 195, 0, 0, 5, 0, 0),
(196, 196, 0, 0, 5, 0, 0),
(197, 197, 0, 0, 0, 0, 5),
(198, 198, 5, 0, 0, 0, 0),
(199, 199, 0, 0, 0, 5, 0),
(200, 200, 0, 0, 5, 0, 0),
(201, 201, 5, 0, 0, 0, 0),
(202, 202, 0, 0, 5, 0, 0),
(203, 203, 5, 0, 0, 0, 0),
(204, 204, 0, 0, 5, 0, 0),
(205, 205, 0, 0, 5, 0, 0),
(206, 206, 5, 0, 0, 0, 0),
(207, 207, 0, 0, 0, 0, 5),
(208, 208, 0, 0, 0, 5, 0),
(209, 209, 5, 0, 0, 0, 0),
(210, 210, 0, 0, 0, 5, 0),
(211, 211, 0, 0, 5, 0, 0),
(212, 212, 0, 0, 5, 0, 0),
(213, 213, 0, 0, 0, 5, 0),
(214, 214, 0, 0, 0, 0, 5),
(215, 215, 5, 0, 0, 0, 0),
(216, 216, 0, 0, 0, 5, 0),
(217, 217, 0, 0, 0, 0, 5),
(218, 218, 0, 0, 0, 5, 0),
(219, 219, 0, 0, 0, 0, 5),
(220, 220, 0, 0, 0, 5, 0),
(221, 221, 0, 5, 0, 0, 0),
(222, 222, 0, 0, 0, 0, 5),
(223, 223, 0, 0, 0, 0, 5),
(224, 224, 0, 0, 0, 0, 5),
(225, 225, 0, 5, 0, 0, 0),
(226, 226, 0, 0, 0, 0, 5),
(227, 227, 5, 0, 0, 0, 0),
(228, 228, 0, 0, 0, 5, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_submapel`
--

CREATE TABLE `tb_submapel` (
  `submapel_id` bigint(20) UNSIGNED NOT NULL,
  `submapel_mapel_id` int(11) NOT NULL,
  `submapel_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_submapel`
--

INSERT INTO `tb_submapel` (`submapel_id`, `submapel_mapel_id`, `submapel_kategori`) VALUES
(1, 4, 'Biologi'),
(2, 4, 'Kimia'),
(3, 4, 'Matematika'),
(4, 4, 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_token`
--

CREATE TABLE `tb_token` (
  `token_id` bigint(20) UNSIGNED NOT NULL,
  `token_tanggal` date NOT NULL,
  `token_jam_mulai` time NOT NULL,
  `token_jam_selesai` time NOT NULL,
  `token_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_token`
--

INSERT INTO `tb_token` (`token_id`, `token_tanggal`, `token_jam_mulai`, `token_jam_selesai`, `token_key`) VALUES
(1, '2021-09-09', '10:00:00', '12:00:00', 'gpDVvufQ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
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
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_nik`, `user_nama`, `user_no_hp`, `user_email`, `user_password`, `user_password1`) VALUES
(1, '1371110402960004', 'Gema Fajar Ramadhan', '082122855458', 'gemafajar09@gmail.com', '183e4d7feef17895e4dc1ae151ee91165e8526870838c71afe756e58b046d4ecf5accc3cd60412b86d529772e9d70e5325ca50ebe5b419c84979c95b3ff975b7', 'fajar123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_kategori_soal`
--
ALTER TABLE `tb_kategori_soal`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indeks untuk tabel `tb_master_soal`
--
ALTER TABLE `tb_master_soal`
  ADD PRIMARY KEY (`soal_id`);

--
-- Indeks untuk tabel `tb_mulai_ujian`
--
ALTER TABLE `tb_mulai_ujian`
  ADD PRIMARY KEY (`mulai_ujian_id`);

--
-- Indeks untuk tabel `tb_mulai_ujian_detail`
--
ALTER TABLE `tb_mulai_ujian_detail`
  ADD PRIMARY KEY (`mulai_ujian_detail_id`);

--
-- Indeks untuk tabel `tb_setting_soal`
--
ALTER TABLE `tb_setting_soal`
  ADD PRIMARY KEY (`setting_soal_id`);

--
-- Indeks untuk tabel `tb_skorsoal`
--
ALTER TABLE `tb_skorsoal`
  ADD PRIMARY KEY (`skorsoal_id`);

--
-- Indeks untuk tabel `tb_submapel`
--
ALTER TABLE `tb_submapel`
  ADD PRIMARY KEY (`submapel_id`);

--
-- Indeks untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`token_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_soal`
--
ALTER TABLE `tb_kategori_soal`
  MODIFY `kategori_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `mapel_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_master_soal`
--
ALTER TABLE `tb_master_soal`
  MODIFY `soal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT untuk tabel `tb_mulai_ujian`
--
ALTER TABLE `tb_mulai_ujian`
  MODIFY `mulai_ujian_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_mulai_ujian_detail`
--
ALTER TABLE `tb_mulai_ujian_detail`
  MODIFY `mulai_ujian_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_setting_soal`
--
ALTER TABLE `tb_setting_soal`
  MODIFY `setting_soal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_skorsoal`
--
ALTER TABLE `tb_skorsoal`
  MODIFY `skorsoal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT untuk tabel `tb_submapel`
--
ALTER TABLE `tb_submapel`
  MODIFY `submapel_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `token_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

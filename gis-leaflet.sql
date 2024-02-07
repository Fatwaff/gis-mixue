-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 11:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis-leaflet`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_06_081752_create_sekolah_table', 2),
(6, '2023_10_15_165434_create_mixue_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mixue`
--

CREATE TABLE `mixue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namacabang` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jam_operasional` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mixue`
--

INSERT INTO `mixue` (`id`, `namacabang`, `alamat`, `jam_operasional`, `no_telp`, `fasilitas`, `foto`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Mixue Sarimanahh', 'Jl. Sarimanah No.43, Sarijadi, Kec. Sukasari', '10.00–21.00', '081217967288', 'Tempat parkir, Wifi Gratis,  Toilet', 'foto-mixue/KuGXWILwebjELQw90Jinx2jUDRq3gIFXOhzGE5By.jpg', '-6.878739967885872', '107.576937', NULL, '2024-01-18 13:20:44'),
(2, 'Mixue Gerlong Hilir', 'Jl. Gegerkalong Hilir No.169, Sarijadi, Kec. Sukasari', '09.00–22.00', '082115215777', 'Tempat parkir', 'foto-mixue/Ca5Odq5q3XFa7K3rhvOcBPpu3nUvqlx4BeSQ9CrE.jpg', '-6.8678243148416085', '107.58087821534328', NULL, '2024-01-11 01:31:17'),
(3, 'Mixue - Dakota', 'Gg. Dakota Raya No.109, Sukaraja, Kec. Cicendo', '10.00–21.00', '082134560585', 'Wi-Fi Gratis, Tempat duduk, Tempat parkir', 'foto-mixue/dFmO8Bi7Hyu3tosjkoM1Wi0fRoAWMUG8Uc1RUp5G.jpg', '-6.891409181491638', '107.5720422', '2023-10-19 18:26:56', '2024-01-11 02:04:26'),
(6, 'Mixue pvj', 'Mall, Paris Van Java, Cipedes, Kec. Sukajadi, Kota Bandung, Jawa Barat 40161', '10.00–22.00', '087816105352', 'Toilet netral gender, Wi-Fi Gratis', 'foto-mixue/1y0tz2cRlk2bZ8SVMQspRuLKWn50qjrxRVc6MiYH.jpg', '-6.88889388070057', '107.59599119814928', '2023-10-19 20:48:30', '2024-01-11 01:45:37'),
(13, 'Mixue Antapani', 'Jl. Terusan Jakarta No.92, Antapani Tengah, Kec. Antapani, Kota Bandung, Jawa Barat 40291', '10.00–22.00', '087816105352', 'Wi-Fi Gratis, Tempat duduk, Tempat parkir', 'foto-mixue/MabE84UrjoIHnJS6VnumzSTmPzttoJHko2OMA7Dy.jpg', '-6.9095569358235505', '107.65386262215227', '2024-02-02 00:06:52', '2024-02-02 00:06:52'),
(14, 'MIXUE Cihampelas', 'Jl. Cihampelas No.58 A, Tamansari, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40116', '10.00–21.00', '082134560585', 'Wi-Fi Gratis, Tempat duduk, Tempat parkir', 'foto-mixue/PwqfjJaYm6oIpGYK5qp3bUd4B5iw0WP4MdbWHlq3.jpg', '-6.897626922081318', '107.60518312112386', '2024-02-02 00:07:52', '2024-02-02 00:07:52'),
(15, 'MIXUE UPI GERLONG', 'Jl. Gegerkalong Girang No.27, Gegerkalong, Kec. Sukasari, Kota Bandung, Jawa Barat 40153', '09.00–22.00', '087818118777', 'Toilet, tempat parkir', 'foto-mixue/AYEYzaUCghGDKVNHJn9aCragSlRVcZv3TGrWQ4Kl.jpg', '-6.863201046606352', '107.591965195686', '2024-02-02 00:08:47', '2024-02-02 00:08:47'),
(16, 'MIXUE Cijerah', 'Jl. Melong Asih No.20, Cijerah, Kec. Bandung Kulon, Kota Bandung, Jawa Barat 40213', '10.00–21.00', '087818118777', 'Wi-Fi Gratis, Tempat duduk, Tempat parkir', 'foto-mixue/JOQmLUsk4dyz7CoaQwUSLLf5kv6R6DviggK5oiXg.jpg', '-6.916031810000201', '107.56879091082742', '2024-02-02 00:09:38', '2024-02-02 00:09:38'),
(17, 'Mixue Pajajaran', 'Jl. Pajajaran No.122B, Pajajaran, Kec. Cicendo, Kota Bandung, Jawa Barat 40172', '10.00–21.00', '087886487152', 'Wi-Fi Gratis, Tempat duduk, Tempat parkir', 'foto-mixue/2gSiRvYnhHfLPYWMPf5kT9q1HTljBwok8O1DWP3u.png', '-6.902228211186512', '107.586643693237', '2024-02-02 00:11:29', '2024-02-02 00:11:29'),
(18, 'MIXUE Cihanjuang', 'Jl. Cihanjuang No.9a, Cibabat, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40172', '10.00–22.00', '08999768889', 'Toilet, tempat parkir', 'foto-mixue/rinDWRmOQVMcFWMQuEq70dvs33isJwx77oQmzCBe.jpg', '-6.867632239572692', '107.55316972530345', '2024-02-02 00:12:36', '2024-02-02 00:12:36'),
(19, 'Mixue Pasir Koja', 'Jl. Terusan Pasirkoja No.112, Jamika, Kec. Bojongloa Kaler, Kota Bandung, Jawa Barat 40231', '10.00–22.00', '081901100441', 'Wi-Fi Gratis, Tempat duduk, Tempat parkir', 'foto-mixue/pveOW4EQckhNaOh7MIY7NRrNeimIci3KhvGXv7fV.jpg', '-6.921825793343761', '107.59007692093626', '2024-02-02 00:14:43', '2024-02-02 00:14:43'),
(20, 'Mixue Cijagra Buah Batu', 'Jl. Cijagra No.14 A, Cijagra, Kec. Buahbatu, Kota Bandung, Jawa Barat 40265', '09.00–22.00', '087883388880', 'Wi-Fi Gratis, Tempat duduk, Tempat parkir', 'foto-mixue/uVspGAJFNCkd3dSWerIvNKnh2ifdULNa4nlu4tuD.jpg', '-6.93988893076928', '107.62526750164746', '2024-02-02 00:16:02', '2024-02-02 00:16:02'),
(21, 'Mixue Setiabudi', 'Jl. Dr. Setiabudi No.170d, Hegarmanah, Kec. Cidadap, Kota Bandung, Jawa Barat 40141', '10.00–22.00', '087816105352', 'Toilet, tempat parkir', 'foto-mixue/jwkNdYOt2lem3XhEAqaQMp6wnflrj9S8DbHutDE1.jpg', '-6.867693839653515', '107.59607917102657', '2024-02-02 00:17:54', '2024-02-02 00:17:54'),
(22, 'Mixue Batununggal', 'Jl. Batununggal Indah Raya No.43, Batununggal, Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40266', '09.00–22.00', '087776888880', 'Toilet, tempat parkir', 'foto-mixue/vRl39qQYQRf4ubweWi1P20mWqV7vew6W00VGkIhQ.jpg', '-6.948470628043085', '107.62354499197245', '2024-02-02 00:19:25', '2024-02-02 00:19:25'),
(23, 'Mixue Paskal23', 'Paskal Hyper Square, Ruko, Kebon Jeruk, Andir, Bandung City, West Java 40181', '09.00–22.00', '081901100441', 'Wi-Fi Gratis, Tempat duduk, Tempat parkir', 'foto-mixue/cv32eXMf47f6UMIdAnnscd8ab3KIikQW3Ipd3Yls.jpg', '-6.911206987039028', '107.5949692692791', '2024-02-02 00:21:44', '2024-02-02 00:21:44'),
(24, 'Mixue Ciumbuleuit', 'Jl. Ciumbuleuit No.91, Hegarmanah, Kec. Cidadap, Kota Bandung, Jawa Barat 40141', '09.00–22.00', '082126028124', 'Wi-Fi Gratis, Tempat duduk, Tempat parkir', 'foto-mixue/uMbbIYg5zzRAjRGCFyTTfwuwqq6WJUatugaq7n9G.jpg', '-6.879541845277834', '107.603439463142', '2024-02-02 00:23:40', '2024-02-02 00:23:40'),
(25, 'Mixue Ujung Berung', 'Jl. Raya Ujung Berung No.55c, Cigending, Kec. Ujung Berung, Kota Bandung, Jawa Barat 40611', '09.00–22.00', '087790006836', 'Wi-Fi Gratis, Tempat duduk, Tempat parkir', 'foto-mixue/PCQN5kCRVuniC5unLJmunmbomHAfkezvTWtV1mqV.jpg', '-6.912995532375365', '107.6943987607956', '2024-02-02 00:47:34', '2024-02-02 00:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polygon`
--

CREATE TABLE `polygon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marker_id` bigint(20) UNSIGNED NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polygon`
--

INSERT INTO `polygon` (`id`, `marker_id`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(5, 1, '107.57691556072', '-6.8788848610216', '2024-01-11 15:20:29', '2024-01-11 15:20:29'),
(6, 1, '107.57700945398', '-6.8789248045388', '2024-01-11 15:20:29', '2024-01-11 15:20:29'),
(7, 1, '107.57693433937', '-6.8791005559749', '2024-01-11 15:20:29', '2024-01-11 15:20:29'),
(8, 1, '107.57680825413', '-6.8790552866718', '2024-01-11 15:20:29', '2024-01-11 15:20:29'),
(9, 1, '107.5768484941', '-6.8789780625566', '2024-01-11 15:20:29', '2024-01-11 15:20:29'),
(10, 1, '107.57687800341', '-6.8789807254574', '2024-01-11 15:20:29', '2024-01-11 15:20:29'),
(23, 19, '107.58974701166', '-6.9220778141052', '2024-02-02 00:25:19', '2024-02-02 00:25:19'),
(24, 19, '107.5898462534', '-6.9220804767635', '2024-02-02 00:25:19', '2024-02-02 00:25:19'),
(25, 19, '107.58983284235', '-6.9222189349755', '2024-02-02 00:25:19', '2024-02-02 00:25:19'),
(26, 19, '107.58976042271', '-6.9222029590301', '2024-02-02 00:25:19', '2024-02-02 00:25:19'),
(27, 19, '107.58973628283', '-6.9222029590301', '2024-02-02 00:25:19', '2024-02-02 00:25:19'),
(28, 25, '107.6943987608', '-6.9129048670582', '2024-02-02 00:48:39', '2024-02-02 00:48:39'),
(29, 25, '107.69454628229', '-6.912976760224', '2024-02-02 00:48:39', '2024-02-02 00:48:39'),
(30, 25, '107.69448190928', '-6.913131197358', '2024-02-02 00:48:39', '2024-02-02 00:48:39'),
(31, 25, '107.69436389208', '-6.9130513160881', '2024-02-02 00:48:39', '2024-02-02 00:48:39'),
(32, 25, '107.69435048103', '-6.9130433279604', '2024-02-02 00:48:39', '2024-02-02 00:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namasekolah` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `namasekolah`, `alamat`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'SMA NEGERI 1 BAUBAU', 'Jl. Pahlawan No. 2', '-287474555', '-3737464', NULL, NULL),
(2, 'SMA NEGERI 2 BANDUNG', 'Jl. Gegerkalong No. 3', '4536475896', '2573689', NULL, NULL),
(3, 'SMA 3 CIREBON', 'JL. SULTAN HASANUDDIN', '-943845', '-3824962', '2023-10-20 01:36:22', '2023-10-20 01:36:22'),
(4, 'cdv', 'vd', 'sd', 'd', '2023-10-20 01:38:25', '2023-10-20 01:38:25'),
(5, 'thrhtn', 'thsr', 'dvafgh', 'sgbbnn', '2023-10-20 01:39:15', '2023-10-20 01:39:15');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fatwa Fatahillah Fatah', 'fatwafatahillah.f@gmail.com', NULL, '$2y$10$sZrawtsrlSLMWY7fxpMH3OdH9jUTqGrRDIBuFag17vpdLuKSyW5Q.', '2JK1msIWn6GsRQl40wJXevZFVRibYFejToEHW4OsEh8AnJ6gvlhogDcy8CvI', '2023-10-06 01:09:10', '2023-10-06 01:09:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mixue`
--
ALTER TABLE `mixue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polygon`
--
ALTER TABLE `polygon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marker_id` (`marker_id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mixue`
--
ALTER TABLE `mixue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polygon`
--
ALTER TABLE `polygon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `polygon`
--
ALTER TABLE `polygon`
  ADD CONSTRAINT `polygon_ibfk_1` FOREIGN KEY (`marker_id`) REFERENCES `mixue` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

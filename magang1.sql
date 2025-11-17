-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2025 at 03:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang1`
--

-- --------------------------------------------------------

--
-- Table structure for table `beranda_items`
--

CREATE TABLE `beranda_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2025_09_22_124115_tbl_pembelian', 1),
(6, '2025_09_24_152713_add_status_to_pembelians_table', 2),
(7, '2025_09_29_112411_tbl_barang-create=tbl_barang', 3),
(8, '2025_10_16_132105_add_status_to_pembelian_table', 4),
(9, '2025_10_22_023629_add_role_to_users_table', 5),
(10, '2025_11_03_134045_create_beranda_items_table', 6);

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
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(255) NOT NULL,
  `material` text NOT NULL,
  `harga` double NOT NULL,
  `gambar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `grade`, `material`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'K200', 'BAHAN BAKU BETON COR', 810000, '1759156301_K200.png', '2025-09-29 07:31:41', '2025-09-29 07:31:41'),
(4, 'K175', 'BAHAN BAKU BETON COR', 790000, '1759156428_K175.png', '2025-09-29 07:33:48', '2025-09-29 07:33:48'),
(5, 'K250', 'BAHAN BAKU BETON COR', 865000, '1759156476_K250.png', '2025-09-29 07:34:36', '2025-09-29 07:34:36'),
(6, 'K225', 'BAHAN BAKU BETON COR', 840000, '1759156653_K225.png', '2025-09-29 07:37:33', '2025-09-29 07:37:33'),
(7, 'K300', 'BAHAN BAKU BETON COR', 915000, '1759156720_K300.png', '2025-09-29 07:38:40', '2025-09-29 07:38:40'),
(8, 'K350', 'BAHAN BAKU BETON COR', 965000, '1759156749_K350.png', '2025-09-29 07:39:10', '2025-09-29 07:39:10'),
(9, 'K275', 'BAHAN BAKU BETON COR', 890000, '1759156773_K275.png', '2025-09-29 07:39:33', '2025-09-29 07:39:33'),
(10, 'Pompa Beton Standar', 'Untuk volume 1-30 m³', 4000000, '1760618356_standar.png', '2025-10-16 05:39:16', '2025-10-16 05:39:16'),
(11, 'Pompa Beton Long Boom', 'Untuk jangkauan 1-15 meter', 7000000, '1760618440_longboom.png', '2025-10-16 05:40:40', '2025-10-16 05:40:40'),
(12, 'Vibrator Beton', 'Sewa Per 8 Jam untuk jenis Vibrator Listrik atau Bensin', 500000, '1760618699_vibra.png', '2025-10-16 05:44:59', '2025-10-16 05:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_cust` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `grade` text NOT NULL,
  `harga` double NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `tgl_antar` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id`, `nm_cust`, `alamat`, `quantity`, `grade`, `harga`, `total_harga`, `tgl_antar`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(14, 'BP. KOSWARA', 'Cirebon Timur, Lebakwangi', 6, 'K200', 795000, 4770000, '2025-10-15', 'Proyek Rumah Tinggal', 'Paid', '2025-10-14 07:31:48', '2025-10-14 07:33:26');

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
(1, 'Shavia', 'shavia@example.com', NULL, '$2y$10$ICTvKFzlc90VgHkd5SsPXeX0jqILJziv6mJat2xT.8jvH2TdxqMh6', NULL, NULL, NULL, 'user'),
(2, 'Indri', 'Indri@gmail.com', NULL, '$2y$10$Snq0d6h1NfXSGNkMs5s79OGM2ajjHpiOhY/LzAo32dbTJ3UhegOFG', NULL, '2025-10-07 07:46:35', '2025-10-07 07:46:35', 'user'),
(5, 'Admin Sistem', 'admin@example.com', NULL, '$2y$10$6Um3x2xt8nqAawqNqSY84.GY9CGsJ8az.PRf6wvdOGZt/5sQGgUwC', NULL, '2025-10-21 20:07:31', '2025-10-21 20:07:31', 'admin'),
(6, 'Shavia User', 'user@example.com', NULL, '$2y$10$5wybiCiFoWqsNox66uJgFeOGmdztxHvpE93kPml5.UY5ebkaU5wAi', NULL, '2025-10-21 20:07:31', '2025-10-21 20:07:31', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beranda_items`
--
ALTER TABLE `beranda_items`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
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
-- AUTO_INCREMENT for table `beranda_items`
--
ALTER TABLE `beranda_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

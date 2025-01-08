-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 10:24 PM
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
-- Database: `jobfriend`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatars`
--

CREATE TABLE `avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_url` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avatars`
--

INSERT INTO `avatars` (`id`, `name`, `profile_url`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Harimurti Maryadi Thamrin M.TI.', 'assets/avatar1.jpg', 99755, '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(2, 'Rahayu Suryatmi M.Farm', 'assets/avatar2.jpg', 44180, '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(3, 'Kezia Wijayanti', 'assets/avatar3.jpg', 26665, '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(4, 'Estiawan Napitupulu', 'assets/avatar4.jpg', 97376, '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(5, 'Langgeng Mandala', 'assets/avatar5.jpg', 39603, '2025-01-08 13:53:38', '2025-01-08 13:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
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
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friend_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 11, 0, '2025-01-08 14:21:31', '2025-01-08 14:21:31'),
(3, 11, 1, '2025-01-08 14:21:33', '2025-01-08 14:21:33'),
(4, 11, 1, '2025-01-08 14:21:36', '2025-01-08 14:21:36'),
(5, 11, 0, '2025-01-08 14:21:54', '2025-01-08 14:21:54'),
(6, 11, 0, '2025-01-08 14:21:57', '2025-01-08 14:21:57'),
(11, 1, 0, '2025-01-08 14:21:49', '2025-01-08 14:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_01_113822_create_avatars_table', 1),
(5, '2025_01_01_113930_create_works_table', 1),
(6, '2025_01_01_114000_create_transaction_table', 1),
(7, '2025_01_08_151537_create_friends_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('A7jqfcdvatM1jg0VMgFHULMf1z8kWN8IhAqs3c4Z', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRWN3NDVEYkhnQnBkZ0tUMUVvUm9vT0lVZlN6d0tlRXNRYUxWOXA1bSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTczNjM3MDMwODt9fQ==', 1736371310),
('WPbbobN0wSPxuCqctBTnZuzQ2aUZcPhDFPk5VnG5', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaklSNU9Zb2pGeENKWVRTY1hFSlB2alhKcWhYazlrbGxsUGVXM2UyciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MzYzNjk4NjY7fX0=', 1736371381);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`user_id`, `avatar_id`, `created_at`, `updated_at`) VALUES
(11, 2, '2025-01-08 14:13:42', '2025-01-08 14:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `registration_price` int(11) NOT NULL,
  `coins` int(11) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `profession` varchar(255) NOT NULL DEFAULT 'Unemployed',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `linkedin`, `mobile_number`, `registration_price`, `coins`, `profile_picture`, `profession`, `is_active`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Oliva Hilda Fujiati', 'suwarno.winda@gmail.co.id', 'Female', 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265', '(+62) 642 8492 8913', 114620, 2457, 'assets/person1.jpg', 'Pensiunan', 1, NULL, '$2y$12$TOaq1PH2fJkoGoUSrRL0auqXQgalDNoqiAAx770MQvetglypzYs92', NULL, '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(2, 'Puput Amelia Purnawati', 'upalastri@winarsih.co', 'Female', 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265', '(+62) 741 0834 621', 100017, 7260, 'assets/person2.jpg', 'Transportasi', 1, NULL, '$2y$12$g4xwFTWW9FMrEHCL1rVDkOnIK5QZ9Zq7safAcYgX5tNS3BlRhmCDm', NULL, '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(3, 'Dipa Nugroho S.Sos', 'farhunnisa.puspasari@nainggolan.info', 'Male', 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265', '0746 9352 082', 119014, 9039, 'assets/person3.jpg', 'Jaksa', 1, NULL, '$2y$12$WTRurBS713g1IWb7Qd.4WukcLYNAh0l.zqKfGZdZaVB1av7r4dSBG', NULL, '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(4, 'Ilyas Budiman S.IP', 'ulva.laksmiwati@rahimah.biz.id', 'Female', 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265', '0701 3497 5625', 109512, 8978, 'assets/person4.jpg', 'Kondektur', 1, NULL, '$2y$12$ELc/bCaC5YQoGwv81tvOgOibpdttN9/9.k4ngq3r10XGzV51r9Ol2', NULL, '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(5, 'Darimin Dimas Iswahyudi S.E.I', 'ella40@prasetyo.go.id', 'Female', 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265', '(+62) 22 0845 1354', 119949, 3404, 'assets/person5.jpg', 'Sopir', 1, NULL, '$2y$12$FK8ZODvXxhN224a/gIlfnO7BFtH651oCSWdSB1SCDe9LcEBm5/Xna', NULL, '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(6, 'Hana Melani M.Ak', 'putri78@usada.desa.id', 'Female', 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265', '0939 2225 7271', 108271, 7145, 'assets/person6.jpg', 'Mengurus Rumah Tangga', 1, NULL, '$2y$12$ECREHovia5tl4ptqNuyICODmJTsYKPILi0Nh/ok1OVqcWC.dYN0fK', NULL, '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(7, 'Garda Narpati', 'lpermata@gunarto.biz.id', 'Male', 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265', '(+62) 800 6945 174', 100333, 244, 'assets/person7.jpg', 'Tabib', 1, NULL, '$2y$12$wPTJ3o18HcJuq3WMq.OYkuwdS2tfGVdLtqulr6qoWscT7ivINIxwG', NULL, '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(8, 'Tari Permata', 'rhariyah@mandala.web.id', 'Female', 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265', '0843 0089 981', 105740, 1423, 'assets/person8.jpg', 'Sopir', 1, NULL, '$2y$12$soPC2T3b1e0I0GdXUoiv7ORZphcAjsQT2RGAR3byk2UelB7uahm9q', NULL, '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(9, 'Melinda Elisa Haryanti M.Farm', 'yuniar.fitriani@sudiati.co', 'Male', 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265', '(+62) 289 4623 443', 119357, 7651, 'assets/person9.jpg', 'Penambang', 1, NULL, '$2y$12$gkcYfXE7FXQApI1swLKoteAmX2waCV8ZnuS7SHe/STDl8q7fWdlqC', NULL, '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(10, 'Mahfud Dadap Narpati', 'hpadmasari@saptono.in', 'Female', 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265', '(+62) 935 5107 424', 104514, 7165, 'assets/person10.jpg', 'Pelaut', 1, NULL, '$2y$12$w2hbxAlPj6QlqclTjvot3.6GvECQQ9onVyTbC0EJrmmdMmMxgOxmC', NULL, '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(11, 'Vincent Oliver Limarus', 'vincentlimarus27@gmail.com', 'Male', 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265', '0895401360072', 111173, 44937, 'assets/default.jpg', 'Unemployed', 1, NULL, '$2y$12$Kx8Ovx.uCkAq80AJZSGHSuND6bW6EaarqzjAZ/MatHKp/Xq5wXSuK', NULL, '2025-01-08 13:54:10', '2025-01-08 14:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Juru Masak', '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(2, 1, 'Apoteker', '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(3, 1, 'Pemandu Wisata', '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(4, 2, 'Akuntan', '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(5, 2, 'Penyelam', '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(6, 2, 'Mekanik', '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(7, 3, 'Pemandu Wisata', '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(8, 3, 'Karyawan BUMD', '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(9, 3, 'Programmer', '2025-01-08 13:53:36', '2025-01-08 13:53:36'),
(10, 4, 'Peternak', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(11, 4, 'Presiden', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(12, 4, 'Penata Rambut', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(13, 5, 'Tukang Gigi', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(14, 5, 'Tentara Nasional Indonesia (TNI)', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(15, 5, 'Industri', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(16, 6, 'Peneliti', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(17, 6, 'Konsultan', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(18, 6, 'Peneliti', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(19, 7, 'Penyelam', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(20, 7, 'Penata Busana', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(21, 7, 'Satpam', '2025-01-08 13:53:37', '2025-01-08 13:53:37'),
(22, 8, 'Pilot', '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(23, 8, 'Industri', '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(24, 8, 'Penyiar Televisi', '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(25, 9, 'Pedagang', '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(26, 9, 'Transportasi', '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(27, 9, 'Nahkoda', '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(28, 10, 'Penata Busana', '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(29, 10, 'Paraji', '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(30, 10, 'Psikiater / Psikolog', '2025-01-08 13:53:38', '2025-01-08 13:53:38'),
(31, 11, 'Software Engineering', '2025-01-08 13:54:10', '2025-01-08 13:54:10'),
(32, 11, 'Backend Engineer', '2025-01-08 13:54:10', '2025-01-08 13:54:10'),
(33, 11, 'Data Engineer', '2025-01-08 13:54:10', '2025-01-08 13:54:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friend_id`,`user_id`),
  ADD KEY `friends_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD KEY `transaction_user_id_foreign` (`user_id`),
  ADD KEY `transaction_avatar_id_foreign` (`avatar_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `works_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_friend_id_foreign` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friends_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2026 at 08:33 PM
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
-- Database: `ecom_db`
--

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
(4, '2025_10_27_054713_add_role_to_users_table', 1),
(5, '2025_10_28_042146_create_products_table', 1),
(6, '2025_12_09_184244_add_id_to_users_table', 2);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Coffee Mug', 'public/images/Products/coffeecup1.jpg,public/images/Products/coffeecup2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 499.00, 5, '2026-06-10 05:08:01', NULL),
(2, 'Premium Charcoal Facewash', 'public/images/Products/facewash.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 449.00, 10, '2026-06-10 05:08:31', NULL),
(3, 'Flower Vase', 'public/images/Products/flowervase.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 350.00, 25, '2026-06-10 05:08:49', NULL),
(4, 'Headset', 'public/images/Products/headset.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 5010.00, 1, '2026-06-10 05:10:42', NULL),
(5, 'Men\'s Shaving Kit', 'public/images/Products/Mgroom3.jpg,public/images/Products/Mgroom2.jpg,public/images/Products/Mgroom1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 750.00, 2, '2026-06-10 05:12:33', NULL),
(6, 'Mobile case', 'public/images/Products/mobilecase.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 150.00, 25, '2026-06-10 05:18:17', NULL),
(7, 'Face Cream', 'public/images/Products/facecream.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 650.00, 15, '2026-06-10 05:19:24', NULL),
(8, 'All In One Cosmetic Set', 'public/images/Products/allinoneset.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 1450.00, 10, '2026-06-10 05:33:32', NULL),
(9, 'Aloe Vera Skin care set', 'public/images/Products/aloevera.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 2200.00, 2, '2026-06-10 05:34:36', NULL),
(10, 'Mini Home Speaker', 'public/images/Products/minihomespeaker.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 999.00, 0, '2026-06-10 05:36:21', NULL),
(11, 'Trimmer', 'public/images/Products/trimmer1.jpg,public/images/Products/trimmer2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 1499.00, 5, '2026-06-10 05:37:35', NULL),
(12, 'Sneakers', 'public/images/Products/sneaker9.png,public/images/Products/sneaker5.png,public/images/Products/sneaker3.png,public/images/Products/sneaker8.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 6910.00, 1, '2026-06-13 06:48:04', NULL),
(13, 'Earbuds', 'public/images/Products/earbuds.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 4450.00, 10, '2026-06-14 17:37:48', NULL),
(14, 'Perfume Set', 'public/images/Products/perfume.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 650.00, 9, '2026-06-14 17:39:55', NULL),
(15, 'Smartwatch', 'public/images/Products/smartwatch.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu magna ullamcorper, imperdiet.', 4990.00, 2, '2026-06-14 17:41:01', NULL);

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
('IlqhsQ8Fxw7B2I1Zg2SU1jmipxcWtgvIq1aOMMFq', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidzZmdkxieGxLM1VUd3JyT1JmZzRrU1pNUURycDFGZHpQZU5iZ1g5VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1781588386);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `phone`, `gender`, `dob`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Souparna Dey', 'admin', 'admin@gmail.com', '9876543210', 'male', '2003-07-10', '$2y$12$vHi1NZ7xcveK/Cv9xn59zu1Q7lxvaHDM0D.Wu9FcJl/Jj05nvw97y', NULL, '2025-12-09 13:14:36', '2025-12-09 13:14:36'),
(2, 'Bruce Wayne', 'user', 'batman@gmail.com', '1234567890', 'male', '2025-12-10', '$2y$12$ocUpXTwbYDfsTn7cH9AFGexKTkOq647WJrRnF2jb6X7DsCUaySUWi', NULL, '2025-12-09 13:21:06', '2025-12-09 13:21:06'),
(3, 'Vladimir Putin', 'user', 'putin@gmail.com', '0987654321', 'male', '2025-12-10', '$2y$12$5zSMIFc6cn3r/Kact3IwsuJBfh36kHbUMLK.SwJ7c/jqcuSHnx2hC', NULL, '2025-12-09 13:22:56', '2025-12-09 13:22:56'),
(4, 'Virat Kohli', 'user', 'vk18@gmail.com', '1818181818', 'male', '2020-11-05', '$2y$12$uxfTcaTa3OFxn.fGJYKpUOx6M4rfy4gGzmTTVXBAKvLdA0tUfGHhm', NULL, '2026-06-14 13:27:37', '2026-06-14 13:27:37'),
(5, 'Cristiano Ronaldo', 'user', 'cronaldo7@gmail.com', '7777777777', 'male', '2020-07-07', '$2y$12$iJdHuElvlNl3uD30gTYaCOB06uOaVU7mCDgUD7LUhJBfZiuXcU.ZG', NULL, '2026-06-14 13:29:44', '2026-06-14 13:29:44');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

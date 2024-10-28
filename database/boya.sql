-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2024 at 02:11 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boya`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `pid` varchar(255) DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `executor_id` int DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount` float DEFAULT '0',
  `total` float DEFAULT NULL,
  `status_id` int DEFAULT '1',
  `paid` float DEFAULT '0',
  `debt` float DEFAULT '0',
  `notes` longtext,
  `cancel_explanation` longtext,
  `cancelled_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `price` float DEFAULT NULL,
  `total` float DEFAULT '0',
  `receipt` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_logs`
--

CREATE TABLE `order_logs` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `executor_id` int NOT NULL,
  `info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Hazırlanır'),
(2, 'Hazırdır'),
(3, 'Təhvil verildi'),
(4, 'Ləğv edildi');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `pid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `executor_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `type_id` int DEFAULT NULL,
  `action_id` int DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_cancelled` int DEFAULT '0',
  `cancelled_by` int DEFAULT NULL,
  `explanation` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_actions`
--

CREATE TABLE `payment_actions` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment_actions`
--

INSERT INTO `payment_actions` (`id`, `name`) VALUES
(1, 'Artım'),
(2, 'Azalma');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_manual` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `is_manual`) VALUES
(1, 'Öncədən olan borc', 1),
(2, 'Balans', 1),
(3, 'Tədarükçü borcu', 1),
(4, 'Satış borcu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `user_id`, `item`) VALUES
(1, 1, '084-713-17-17'),
(2, 2, '053-662-88-12'),
(3, 3, '067-618-56-06'),
(4, 4, '085-280-15-22'),
(5, 5, '055-382-46-23'),
(6, 6, '003-938-24-63'),
(7, 7, '046-755-19-52'),
(8, 8, '006-385-36-72'),
(9, 9, '028-586-35-57'),
(10, 10, '023-797-06-63'),
(11, 11, '002-092-81-95'),
(12, 12, '066-248-01-01'),
(13, 13, '037-685-40-03'),
(14, 14, '055-706-11-08'),
(15, 15, '025-509-40-74'),
(16, 16, '021-298-71-03'),
(17, 17, '014-448-11-64'),
(18, 18, '045-736-63-79'),
(19, 19, '037-949-52-06'),
(20, 20, '076-115-28-97'),
(21, 21, '042-369-18-50'),
(22, 22, '058-759-18-49'),
(23, 23, '046-488-13-22'),
(24, 24, '043-486-91-46'),
(25, 25, '031-259-77-86'),
(26, 26, '004-037-29-12'),
(27, 27, '051-903-52-66'),
(28, 28, '005-207-02-21'),
(29, 29, '010-880-79-70'),
(30, 30, '084-090-13-23'),
(31, 31, '002-717-19-20'),
(32, 32, '019-671-17-62'),
(33, 33, '045-689-77-76'),
(34, 34, '018-750-38-91'),
(35, 35, '073-063-16-94'),
(36, 36, '077-868-62-56'),
(37, 37, '099-970-36-65'),
(38, 38, '043-612-65-40'),
(39, 39, '081-707-97-49'),
(40, 40, '009-639-03-47'),
(41, 41, '041-413-66-37'),
(42, 42, '071-091-25-03'),
(43, 43, '099-598-74-44'),
(44, 44, '072-021-39-69'),
(45, 45, '019-958-66-89'),
(46, 46, '084-983-69-96'),
(47, 47, '045-560-16-46'),
(48, 48, '047-088-89-93'),
(49, 49, '030-576-64-05'),
(50, 50, '040-017-82-53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `pid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` longtext,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `visible` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pid`, `name`, `note`, `created_at`, `updated_at`, `visible`) VALUES
(1, 'PROD00000127102024', 'Sun emulsiya daxili 18 lt', 'Minimal satış qiyməti 30 AZN', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(2, 'PROD00000227102024', 'Sun emulsiya daxili 7.5 lt', 'Minimal satış qiyməti 13 AZN', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(3, 'PROD00000327102024', 'Sun emulsiya daxili 2.5 lt', 'Minimal satış qiyməti 7 AZN', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(4, 'PROD00000427102024', 'Sun emulsiya fasad 18 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(5, 'PROD00000527102024', 'Sun emulsiya fasad 7.5 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(6, 'PROD00000627102024', 'Sun emulsiya fasad 2.5 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(7, 'PROD00000727102024', 'Naturel super fasad 18 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(8, 'PROD00000827102024', 'Naturel super fasad 7.5 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(9, 'PROD00000927102024', 'Naturel super fasad 2.5 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(10, 'PROD00001027102024', 'Akerlik macun 4 kq', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(11, 'PROD00001127102024', 'Akerlik macun 10 kq', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(12, 'PROD00001227102024', 'Akerlik macun 22 kq', 'Sint tenetur omnis ullam facere esse et quisquam. Quae vero repellendus temporibus ducimus sapiente eveniet omnis. Molestiae corrupti dignissimos recusandae dicta est.', '2024-10-24 13:05:17', '2024-10-27 10:38:49', 1),
(13, 'PROD00001327102024', 'Torsovka 4 kq', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(14, 'PROD00001427102024', 'Torsovka 10 kq', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(15, 'PROD00001527102024', 'Torsovka 22 kq', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(16, 'PROD00001627102024', 'Binder 1 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(17, 'PROD00001727102024', 'Binder 4 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(18, 'PROD00001827102024', 'Naturel moy 18 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(19, 'PROD00001927102024', 'Naturel moy 7.5 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(20, 'PROD00002027102024', 'Naturel moy 2.5 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(21, 'PROD00002127102024', 'Astar 18 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(22, 'PROD00002227102024', 'Astar silikonlu 18 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(23, 'PROD00002327102024', 'Su tut 18 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(24, 'PROD00002427102024', 'Naturel parlaq fasad 18 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(25, 'PROD00002527102024', 'Naturel parlaq fasad 7.5 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(26, 'PROD00002627102024', 'Naturel parlaq fasad 2.5 lt', '', '2024-10-24 13:05:17', '2024-10-27 08:39:52', 1),
(29, 'PROD00002927102024', 'Test məhsul', NULL, '2024-10-27 08:33:56', '2024-10-27 10:39:14', 0),
(30, 'PROD00003028102024', 'atque cupiditate dignissimos', 'Qui perspiciatis quam autem ipsam delectus laboriosam nemo pariatur. Ratione soluta nisi. Facere vero adipisci architecto earum.', '2024-10-28 05:58:04', '2024-10-28 05:58:04', 1),
(31, 'PROD00003128102024', 'Savannah87', 'Earum ullam maxime. Perferendis porro nihil pariatur odit dolorem. Reiciendis debitis minus mollitia reprehenderit sequi sunt.', '2024-10-28 05:59:19', '2024-10-28 05:59:19', 1),
(32, 'PROD00003228102024', 'Test mehsul', NULL, '2024-10-28 06:01:45', '2024-10-28 06:01:45', 1),
(33, 'PROD00003328102024', 'Tempora non iste quos.', NULL, '2024-10-28 06:02:53', '2024-10-28 06:02:53', 1),
(34, 'PROD00003428102024', 'Ea ratione repudiandae omnis sit perspiciatis iure ipsa.', NULL, '2024-10-28 06:03:58', '2024-10-28 06:03:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'İcraçı'),
(2, 'Müştəri'),
(3, 'Tədarükçü');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Pr7PaAdg0BMj50ByH0g1Fxk7kCSZIxmF0gJWt5de', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY0tvS0M1M2d6MTc4U1J3cm9jcE5wR2x3MFlTOFlHWVVHY0hJUE5pOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9vcmRlci9kYXNoYm9hcmQiO319', 1730124553);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `pid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role_id` int DEFAULT '2',
  `remember_token` varchar(255) DEFAULT NULL,
  `debt` float DEFAULT '0',
  `current_debt` float DEFAULT NULL,
  `old_debt` float DEFAULT '0',
  `remnant` float DEFAULT '0',
  `balance` float DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_logs`
--
ALTER TABLE `order_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_actions`
--
ALTER TABLE `payment_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_logs`
--
ALTER TABLE `order_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_actions`
--
ALTER TABLE `payment_actions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

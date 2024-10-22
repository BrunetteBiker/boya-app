-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2024 at 02:10 PM
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
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pid`, `customer_id`, `executor_id`, `amount`, `discount`, `total`, `status_id`, `paid`, `debt`, `notes`, `cancel_explanation`, `cancelled_by`, `created_at`, `updated_at`) VALUES
(1, 'SFR18102024000001', 5, 1, 10.6, 0, 10.6, 4, 10.6, 0, '', 'test ləğv', 1, '2024-10-18 11:07:37', '2024-10-18 11:19:56'),
(2, 'SFR18102024000002', 4, 1, 0, 0, 0, 1, 0, 0, '', NULL, NULL, '2024-10-07 11:56:10', '2024-10-18 11:56:10'),
(3, 'SFR18102024000003', 3, 1, 60, 0, 60, 4, 28, 0, '', 'test terkib', 1, '2024-10-18 11:59:34', '2024-10-18 12:09:59'),
(4, 'SFR18102024000004', 5, 1, 48.6, 0, 48.6, 1, 0, 48.6, '', NULL, NULL, '2024-10-18 12:12:55', '2024-10-18 12:12:55'),
(5, 'SFR18102024000005', 5, 1, 48.6, 0, 48.6, 1, 8.6, 0, '', NULL, NULL, '2024-10-18 12:13:49', '2024-10-18 12:25:42'),
(6, 'SFR18102024000006', 4, 1, 10.3, 0, 10.3, 1, 5.3, 0, '', NULL, NULL, '2024-10-18 12:28:28', '2024-10-18 12:31:10'),
(7, 'SFR18102024000007', 4, 1, 30, 0, 30, 1, 30, 0, '', NULL, NULL, '2024-10-18 12:32:26', '2024-10-18 12:32:49'),
(8, 'SFR21102024000008', 4, 1, 250, 50, 200, 4, 0, 200, 'test qeyd', 'Voluptatum aliquid rerum ad fuga. Quo esse assumenda assumenda. Quidem necessitatibus veniam explicabo suscipit nesciunt necessitatibus laboriosam cumque.', 1, '2024-10-21 11:33:29', '2024-10-21 11:34:23'),
(9, 'SFR21102024000009', 5, 1, 150, 10, 140, 4, 100, 40, 'Numquam aspernatur et ratione asperiores aliquid officiis ipsam. Ut tenetur molestiae quis ullam fugiat quaerat maxime. Sint laudantium nostrum occaecati perspiciatis perferendis quis ducimus autem recusandae.', 'Necessitatibus neque veniam natus aliquam distinctio. Minima deleniti quasi ab. Laboriosam facilis ut quam delectus nemo consectetur amet autem.', 1, '2024-10-21 11:35:29', '2024-10-21 11:38:02'),
(10, 'SFR21102024000010', 5, 1, 100, 0, 100, 4, 100, 0, '', 'Tenetur provident sequi est aliquid. Perferendis labore quam quod inventore temporibus saepe doloremque. Sunt quia ad.', 1, '2024-10-21 12:15:57', '2024-10-21 12:21:05');

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

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `amount`, `price`, `total`, `receipt`) VALUES
(1, 1, 23, 2, 5.3, 10.6, NULL),
(2, 2, 7, 0, 0, 0, NULL),
(3, 3, 26, 2, 30, 60, NULL),
(4, 5, 7, 2, 24.3, 48.6, 'test terkib'),
(5, 6, 7, 1, 10.3, 10.3, 'tets terkib'),
(6, 7, 26, 1, 30, 30, 'test '),
(7, 8, 9, 1, 100, 100, 'test terkib'),
(8, 8, 7, 1, 150, 150, 'test '),
(9, 9, 8, 1, 100, 100, 'Jamaica'),
(10, 9, 20, 1, 50, 50, 'Ghana'),
(11, 10, 9, 1, 100, 100, 'Jamaica');

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
  `pid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `executor_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `type_id` int DEFAULT NULL,
  `action_id` int DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_cancelled` int DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `pid`, `executor_id`, `order_id`, `customer_id`, `type_id`, `action_id`, `amount`, `note`, `is_cancelled`, `created_at`, `updated_at`) VALUES
(1, 'ÖDN18102024000001', 1, 1, 5, 4, 1, 5, '', 1, '2024-10-18 11:09:35', '2024-10-21 13:56:22'),
(2, 'ÖDN18102024000002', 1, 1, 5, 4, 1, 5.6, '', 1, '2024-10-18 11:10:10', '2024-10-21 13:56:22'),
(3, 'ÖDN18102024000003', 1, 1, 5, 4, 1, 10.6, '', 1, '2024-10-18 11:12:52', '2024-10-21 13:56:22'),
(4, NULL, 1, 3, 3, 4, 1, 60, '', 1, '2024-10-18 12:03:28', '2024-10-18 12:09:59'),
(5, NULL, 1, 3, 3, 4, 1, 28, '', 1, '2024-10-18 12:03:42', '2024-10-18 12:09:59'),
(6, NULL, 1, NULL, 3, 2, 1, 88, 'SFR18102024000003 kodlu sifarişin ləğvindən gələn artım.', 0, '2024-10-18 12:09:59', '2024-10-18 12:09:59'),
(7, 'ÖDN18102024000007', 1, 5, 5, 4, 1, 20, '', 0, '2024-10-18 12:24:23', '2024-10-21 13:56:22'),
(8, 'ÖDN18102024000008', 1, 5, 5, 4, 1, 28.6, '', 0, '2024-10-18 12:25:23', '2024-10-21 13:56:22'),
(9, 'ÖDN18102024000009', 1, 5, 5, 4, 1, 8.6, '', 0, '2024-10-18 12:25:42', '2024-10-21 13:56:22'),
(10, NULL, 1, 6, 4, 4, 1, 5, '', 0, '2024-10-18 12:31:02', '2024-10-18 12:31:02'),
(11, NULL, 1, 6, 4, 4, 1, 5.3, '', 0, '2024-10-18 12:31:10', '2024-10-18 12:31:10'),
(12, NULL, 1, 7, 4, 4, 1, 10, '', 0, '2024-10-18 12:32:41', '2024-10-18 12:32:41'),
(13, NULL, 1, 7, 4, 4, 1, 5, '', 0, '2024-10-18 12:32:44', '2024-10-18 12:32:44'),
(14, NULL, 1, 7, 4, 4, 1, 15, '', 0, '2024-10-18 12:32:49', '2024-10-18 12:32:49'),
(15, NULL, 1, NULL, 4, 3, 2, 600, '', 0, '2024-10-18 14:12:09', '2024-10-18 14:12:09'),
(16, NULL, 1, NULL, 4, 2, 1, 0, 'SFR21102024000008 kodlu sifarişin ləğvindən gələn artım.', 0, '2024-10-21 11:34:23', '2024-10-21 11:34:23'),
(17, 'ÖDN21102024000017', 1, 9, 5, 4, 1, 40, '', 1, '2024-10-21 11:36:14', '2024-10-21 13:56:22'),
(18, 'ÖDN21102024000018', 1, NULL, 5, 2, 1, 100, '', 0, '2024-10-21 11:36:56', '2024-10-21 13:56:22'),
(19, 'ÖDN21102024000019', 1, 9, 5, 4, 1, 60, '', 1, '2024-10-21 11:37:08', '2024-10-21 13:56:22'),
(20, 'ÖDN21102024000020', 1, NULL, 5, 2, 1, 100, 'SFR21102024000009 kodlu sifarişin ləğvindən gələn artım.', 0, '2024-10-21 11:38:02', '2024-10-21 13:56:22'),
(21, 'ÖDN21102024000021', 1, 10, 5, 4, 1, 11.2, '', 1, '2024-10-21 12:16:15', '2024-10-21 13:56:22'),
(22, 'ÖDN21102024000022', 1, 10, 5, 4, 1, 20, '', 1, '2024-10-21 12:18:56', '2024-10-21 13:56:23'),
(23, 'ÖDN21102024000023', 1, 10, 5, 4, 1, 10, '', 1, '2024-10-21 12:20:02', '2024-10-21 13:56:23'),
(24, 'ÖDN21102024000024', 1, 10, 5, 4, 1, 10, '', 1, '2024-10-21 12:20:29', '2024-10-21 13:56:23'),
(25, 'ÖDN21102024000025', 1, 10, 5, 4, 1, 48.8, '', 1, '2024-10-21 12:20:41', '2024-10-21 13:56:23'),
(26, 'ÖDN21102024000026', 1, NULL, 5, 2, 1, 100, 'SFR21102024000010 kodlu sifarişin ləğvindən gələn artım.', 0, '2024-10-21 12:21:05', '2024-10-21 13:56:23'),
(27, 'ÖDN21102024000027', 1, NULL, 5, 2, 1, 20, '', 0, '2024-10-21 13:52:34', '2024-10-21 13:56:23'),
(28, 'ÖDN21102024000028', 1, NULL, 5, 2, 2, 10, '', 0, '2024-10-21 13:52:41', '2024-10-21 13:56:23'),
(29, 'ÖDN21102024000029', 1, NULL, 5, 1, 1, 100, '', 0, '2024-10-21 13:52:53', '2024-10-21 13:56:23'),
(30, 'ÖDN21102024000030', 1, NULL, 5, 1, 1, 50, '', 0, '2024-10-21 13:52:58', '2024-10-21 13:56:23'),
(31, 'ÖDN21102024000031', 1, NULL, 5, 1, 2, 50, '', 0, '2024-10-21 13:53:01', '2024-10-21 13:56:23'),
(32, 'ÖDN21102024000032', 1, NULL, 5, 3, 1, 50, '', 0, '2024-10-21 13:53:38', '2024-10-21 13:56:23'),
(33, 'ÖDN21102024000033', 1, NULL, 5, 3, 1, 20, '', 0, '2024-10-21 13:53:43', '2024-10-21 13:56:23'),
(34, 'ÖDN21102024000034', 1, NULL, 5, 3, 2, 20, '', 0, '2024-10-21 13:53:46', '2024-10-21 13:56:23'),
(35, 'ÖDN22102024000035', 5, NULL, 3, 2, 1, 150, '', 0, '2024-10-22 13:18:41', '2024-10-22 13:18:41');

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
(1, 1, '055-945-85-85'),
(23, 3, '090-239-40-29'),
(24, 4, '044-242-42-44'),
(25, 4, '070-545-45-45'),
(35, 5, '023-454-54-24'),
(36, 5, '023-323-44-32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` longtext,
  `visible` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `note`, `visible`) VALUES
(1, 'Sun emulsiya daxili 18 lt', 'Minimal satış qiyməti 30 AZN', 1),
(2, 'Sun emulsiya daxili 7.5 lt', 'Minimal satış qiyməti 13 AZN', 1),
(3, 'Sun emulsiya daxili 2.5 lt', 'Minimal satış qiyməti 7 AZN', 1),
(4, 'Sun emulsiya fasad 18 lt', '', 1),
(5, 'Sun emulsiya fasad 7.5 lt', '', 1),
(6, 'Sun emulsiya fasad 2.5 lt', '', 1),
(7, 'Naturel super fasad 18 lt', '', 1),
(8, 'Naturel super fasad 7.5 lt', '', 1),
(9, 'Naturel super fasad 2.5 lt', '', 1),
(10, 'Akerlik macun 4 kq', '', 1),
(11, 'Akerlik macun 10 kq', '', 1),
(12, 'Akerlik macun 22 kq', '', 1),
(13, 'Torsovka 4 kq', '', 1),
(14, 'Torsovka 10 kq', '', 1),
(15, 'Torsovka 22 kq', '', 1),
(16, 'Binder 1 lt', '', 1),
(17, 'Binder 4 lt', '', 1),
(18, 'Naturel moy 18 lt', '', 1),
(19, 'Naturel moy 7.5 lt', '', 1),
(20, 'Naturel moy 2.5 lt', '', 1),
(21, 'Astar 18 lt', '', 1),
(22, 'Astar silikonlu 18 lt', '', 1),
(23, 'Su tut 18 lt', '', 1),
(24, 'Naturel parlaq fasad 18 lt', '', 1),
(25, 'Naturel parlaq fasad 7.5 lt', '', 1),
(26, 'Naturel parlaq fasad 2.5 lt', '', 1),
(27, 'Test məhsul', 'Suscipit quia vero voluptas doloribus illo exercitationem deleniti aut. Voluptatum consequuntur deserunt sapiente cumque. Odit natus et repellendus animi placeat fugit.', 1),
(28, 'Test məhsul', 'Asperiores maxime minima enim. Laborum temporibus laborum. Numquam molestias eaque quas laboriosam rem doloribus dignissimos.', 0);

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
('Cohvse2iimXO9Yd5bLM6A1LONIZILQC0ekMuBBAi', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT3F4VlNVejcxRXZmNVN4UzVBVmNjMVBBOXlmU2c3QnpkZWc4aGJzNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wYXltZW50L2Rhc2hib2FyZD9wYWdlPTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O30=', 1729605674),
('fFnlnSQTDszTrwCimma50vLJ55OANmbkp3ph8vJO', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSGVaZjNzYWN3Sm1NVmJlZWdGWjdwc29mZ2J0M0R4ekphR3lmbllvSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9ib3lhLWFwcC50ZXN0L3BheW1lbnQvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1729605674);

-- --------------------------------------------------------

--
-- Table structure for table `update_logs`
--

CREATE TABLE `update_logs` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `payment_id` int DEFAULT NULL,
  `note` longtext,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `update_logs`
--

INSERT INTO `update_logs` (`id`, `user_id`, `order_id`, `payment_id`, `note`, `created_at`) VALUES
(1, 5, NULL, NULL, 'Ədalət Məmmədli tərəfindən şəxsi məlumatlar üzərində düzəliş edildi.', '2024-10-21 12:56:39'),
(2, 5, NULL, NULL, 'Ədalət Məmmədli tərəfindən şəxsi məlumatlar üzərində düzəliş edildi.', '2024-10-21 13:47:37'),
(3, 5, NULL, NULL, 'Ədalət Məmmədli tərəfindən şəxsi məlumatlar üzərində düzəliş edildi.', '2024-10-21 13:47:58'),
(4, 5, NULL, NULL, 'Ədalət Məmmədli tərəfindən şəxsi məlumatlar üzərində düzəliş edildi.', '2024-10-21 13:48:10'),
(5, 5, NULL, NULL, 'Ədalət Məmmədli tərəfindən şəxsi məlumatlar üzərində düzəliş edildi.', '2024-10-21 13:48:16'),
(6, 5, NULL, NULL, 'Ədalət Məmmədli tərəfindən şəxsi məlumatlar üzərində düzəliş edildi.', '2024-10-21 13:49:28'),
(7, 5, NULL, NULL, 'Ədalət Məmmədli tərəfindən şəxsi məlumatlar üzərində düzəliş edildi.', '2024-10-21 13:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `pid` varchar(255) NOT NULL,
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pid`, `name`, `role_id`, `remember_token`, `debt`, `current_debt`, `old_debt`, `remnant`, `balance`, `created_at`, `updated_at`) VALUES
(1, 'USR18011976000001', 'Ədalət Məmmədli', 1, NULL, 0, 0, 0, 0, 150, '1976-01-17 20:00:00', '2024-10-21 12:43:57'),
(3, 'USR19031998000003', 'Ülvi Hüseynov', 2, NULL, 300, 0, 300, 0, 403.4, '1998-03-18 20:00:00', '2024-10-22 13:18:41'),
(4, 'USR18011993000004', 'Pərviz Əliyarov', 3, NULL, 0, 0, 0, 300, 20, '1993-01-17 20:00:00', '2024-10-21 12:43:57'),
(5, 'USR30041985000005', 'Elşən Həmidovv', 1, NULL, 148.6, 48.6, 100, 50, 261.2, '1985-04-29 20:00:00', '2024-10-21 13:53:46');

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

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
-- Indexes for table `update_logs`
--
ALTER TABLE `update_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `update_logs`
--
ALTER TABLE `update_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

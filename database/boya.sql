-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2024 at 07:08 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.10

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
(10, 'SFR21102024000010', 5, 1, 100, 0, 100, 4, 100, 0, '', 'Tenetur provident sequi est aliquid. Perferendis labore quam quod inventore temporibus saepe doloremque. Sunt quia ad.', 1, '2024-10-21 12:15:57', '2024-10-21 12:21:05'),
(11, 'SFR23102024000011', 3, 1, 38.4, 0, 38.4, 4, 15, 23.4, '', NULL, NULL, '2024-10-23 10:17:21', '2024-10-26 18:53:12'),
(12, 'SFR26102024000012', 4, 5, 48, 8, 40, 4, 20, 20, '', NULL, NULL, '2024-10-26 19:02:06', '2024-10-26 19:03:51'),
(13, 'SFR26102024000013', 4, 5, 120, 0, 120, 4, 110, 10, '', NULL, NULL, '2024-10-26 19:06:23', '2024-10-26 20:02:47'),
(14, 'SFR27102024000014', 3, 5, 60, 0, 60, 4, 0, 60, '', NULL, NULL, '2024-10-26 20:06:36', '2024-10-26 20:07:06'),
(15, 'SFR27102024000015', 3, 5, 20, 0, 20, 1, 20, 0, '', NULL, NULL, '2024-10-26 20:08:59', '2024-10-26 20:09:34'),
(16, 'SFR27102024000016', 3, 5, 10, 0, 10, 1, 10, 0, '', NULL, NULL, '2024-10-26 20:11:01', '2024-10-26 20:11:15'),
(17, 'SFR27102024000017', 3, 5, 40, 0, 40, 4, 0, 40, '', NULL, NULL, '2024-10-26 20:12:49', '2024-10-27 18:27:54');

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
(11, 10, 9, 1, 100, 100, 'Jamaica'),
(12, 11, 9, 2, 24, 38.4, 'magnam corporis aliquid'),
(13, 12, 8, 2, 24, 48, 'Neque sint nisi facere aperiam id. Veritatis reprehenderit at harum assumenda temporibus necessitatibus. Voluptatibus adipisci voluptatem quisquam necessitatibus culpa dignissimos.'),
(14, 13, 9, 2, 60, 120, 'Deserunt temporibus magni ea. Fuga provident quos temporibus sint quia maiores necessitatibus. Sit velit sit.'),
(15, 14, 9, 2, 30, 60, 'Ireland'),
(16, 15, 25, 2, 10, 20, 'Redondo Beach'),
(17, 16, 26, 1, 10, 10, 'Roberts - Luettgen'),
(18, 17, 9, 2, 20, 40, 'International Applications Strategist');

-- --------------------------------------------------------

--
-- Table structure for table `order_logs`
--

CREATE TABLE `order_logs` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `executor_id` int NOT NULL,
  `info` longtext COLLATE utf8mb4_unicode_ci,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_logs`
--

INSERT INTO `order_logs` (`id`, `order_id`, `executor_id`, `info`, `note`, `created_at`) VALUES
(1, 11, 5, 'Sifarişin statusu hazırlandı olaraq dəyişdirildi', '', '2024-10-26 18:25:21'),
(2, 11, 5, 'Sifarişin statusu TƏHVİL VERİLDİ olaraq dəyişdirildi', '', '2024-10-26 18:33:59'),
(3, 11, 5, 'Sifarişin statusu LƏĞV EDİLDİ olaraq dəyişdirildi', 'Cumque esse nisi est. Labore at suscipit itaque animi qui possimus soluta velit atque. Dolorem accusamus quis vitae cumque odio fugiat non reprehenderit iste.', '2024-10-26 18:53:13'),
(4, 12, 5, 'Sifarişin statusu LƏĞV EDİLDİ olaraq dəyişdirildi', 'Consequuntur minus ea temporibus asperiores in ut. Voluptatum maiores numquam consequuntur architecto nam corporis eligendi. Magni a ipsa nihil fugiat eveniet adipisci reiciendis vero.', '2024-10-26 19:03:51'),
(5, 13, 5, 'Sifarişin statusu LƏĞV EDİLDİ olaraq dəyişdirildi', 'Exercitationem aspernatur minus at deleniti excepturi repudiandae suscipit. Corporis inventore amet libero provident tempora deleniti iste at. Velit recusandae vero veritatis modi voluptates laboriosam cum nobis.', '2024-10-26 20:03:08'),
(6, 14, 5, 'Sifarişin statusu LƏĞV EDİLDİ olaraq dəyişdirildi', 'Ipsam doloremque saepe totam iste corrupti. Eum quo sequi modi occaecati amet iusto deserunt impedit. Omnis eius consequuntur quidem sint possimus quisquam ducimus tempore ducimus.', '2024-10-26 20:07:06'),
(7, 17, 5, 'Sifarişin statusu LƏĞV EDİLDİ olaraq dəyişdirildi', 'Cupiditate nam corporis fuga. Sequi harum temporibus totam numquam atque. Ut laboriosam maiores.', '2024-10-27 18:27:55');

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

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `pid`, `executor_id`, `order_id`, `customer_id`, `type_id`, `action_id`, `amount`, `note`, `is_cancelled`, `cancelled_by`, `explanation`, `created_at`, `updated_at`) VALUES
(1, 'ÖDN18102024000001', 1, 1, 5, 4, 1, 5, '', 1, 1, NULL, '2024-10-18 11:09:35', '2024-10-21 13:56:22'),
(2, 'ÖDN18102024000002', 1, 1, 5, 4, 1, 5.6, '', 1, 1, NULL, '2024-10-18 11:10:10', '2024-10-21 13:56:22'),
(3, 'ÖDN18102024000003', 1, 1, 5, 4, 1, 10.6, '', 1, 1, NULL, '2024-10-18 11:12:52', '2024-10-21 13:56:22'),
(4, NULL, 1, 3, 3, 4, 1, 60, '', 1, 1, NULL, '2024-10-18 12:03:28', '2024-10-18 12:09:59'),
(5, NULL, 1, 3, 3, 4, 1, 28, '', 1, 1, NULL, '2024-10-18 12:03:42', '2024-10-18 12:09:59'),
(6, NULL, 1, NULL, 3, 2, 1, 88, 'SFR18102024000003 kodlu sifarişin ləğvindən gələn artım.', 0, NULL, NULL, '2024-10-18 12:09:59', '2024-10-18 12:09:59'),
(7, 'ÖDN18102024000007', 1, 5, 5, 4, 1, 20, '', 1, 1, 'Aliquam quidem ea natus earum atque doloribus. Magnam quae deserunt. Cupiditate animi expedita earum veniam repellat fugiat.', '2024-10-18 12:24:23', '2024-10-23 10:13:10'),
(8, 'ÖDN18102024000008', 1, 5, 5, 4, 1, 28.6, '', 0, NULL, NULL, '2024-10-18 12:25:23', '2024-10-21 13:56:22'),
(9, 'ÖDN18102024000009', 1, 5, 5, 4, 1, 8.6, '', 1, 1, 'Facere assumenda praesentium corrupti saepe assumenda possimus. Exercitationem eum expedita omnis laborum. Rem officiis modi laboriosam repudiandae asperiores consectetur.', '2024-10-18 12:25:42', '2024-10-23 05:36:14'),
(10, NULL, 1, 6, 4, 4, 1, 5, '', 0, NULL, NULL, '2024-10-18 12:31:02', '2024-10-18 12:31:02'),
(11, NULL, 1, 6, 4, 4, 1, 5.3, '', 0, NULL, NULL, '2024-10-18 12:31:10', '2024-10-18 12:31:10'),
(12, NULL, 1, 7, 4, 4, 1, 10, '', 0, NULL, NULL, '2024-10-18 12:32:41', '2024-10-18 12:32:41'),
(13, NULL, 1, 7, 4, 4, 1, 5, '', 1, 1, 'Praesentium odit delectus. Tempore distinctio animi voluptatibus provident culpa. Nulla ab consectetur quidem molestiae.', '2024-10-18 12:32:44', '2024-10-23 05:39:00'),
(14, NULL, 1, 7, 4, 4, 1, 15, '', 1, 1, 'Culpa minima quidem exercitationem repudiandae qui deserunt.', '2024-10-18 12:32:49', '2024-10-23 05:36:47'),
(15, NULL, 1, NULL, 4, 3, 2, 600, '', 0, NULL, NULL, '2024-10-18 14:12:09', '2024-10-18 14:12:09'),
(16, NULL, 1, NULL, 4, 2, 1, 0, 'SFR21102024000008 kodlu sifarişin ləğvindən gələn artım.', 0, NULL, NULL, '2024-10-21 11:34:23', '2024-10-21 11:34:23'),
(17, 'ÖDN21102024000017', 1, 9, 5, 4, 1, 40, '', 1, 1, NULL, '2024-10-21 11:36:14', '2024-10-21 13:56:22'),
(18, 'ÖDN21102024000018', 1, NULL, 5, 2, 1, 100, '', 0, NULL, NULL, '2024-10-21 11:36:56', '2024-10-21 13:56:22'),
(19, 'ÖDN21102024000019', 1, 9, 5, 4, 1, 60, '', 1, 1, NULL, '2024-10-21 11:37:08', '2024-10-21 13:56:22'),
(20, 'ÖDN21102024000020', 1, NULL, 5, 2, 1, 100, 'SFR21102024000009 kodlu sifarişin ləğvindən gələn artım.', 0, NULL, NULL, '2024-10-21 11:38:02', '2024-10-21 13:56:22'),
(21, 'ÖDN21102024000021', 1, 10, 5, 4, 1, 11.2, '', 1, 1, NULL, '2024-10-21 12:16:15', '2024-10-21 13:56:22'),
(22, 'ÖDN21102024000022', 1, 10, 5, 4, 1, 20, '', 1, 1, NULL, '2024-10-21 12:18:56', '2024-10-21 13:56:23'),
(23, 'ÖDN21102024000023', 1, 10, 5, 4, 1, 10, '', 1, 1, NULL, '2024-10-21 12:20:02', '2024-10-21 13:56:23'),
(24, 'ÖDN21102024000024', 1, 10, 5, 4, 1, 10, '', 1, 1, NULL, '2024-10-21 12:20:29', '2024-10-21 13:56:23'),
(25, 'ÖDN21102024000025', 1, 10, 5, 4, 1, 48.8, '', 1, 1, NULL, '2024-10-21 12:20:41', '2024-10-21 13:56:23'),
(26, 'ÖDN21102024000026', 1, NULL, 5, 2, 1, 100, 'SFR21102024000010 kodlu sifarişin ləğvindən gələn artım.', 0, NULL, NULL, '2024-10-21 12:21:05', '2024-10-21 13:56:23'),
(27, 'ÖDN21102024000027', 1, NULL, 5, 2, 1, 20, '', 0, NULL, NULL, '2024-10-21 13:52:34', '2024-10-21 13:56:23'),
(28, 'ÖDN21102024000028', 1, NULL, 5, 2, 2, 10, '', 0, NULL, NULL, '2024-10-21 13:52:41', '2024-10-21 13:56:23'),
(29, 'ÖDN21102024000029', 1, NULL, 5, 1, 1, 100, '', 0, NULL, NULL, '2024-10-21 13:52:53', '2024-10-21 13:56:23'),
(30, 'ÖDN21102024000030', 1, NULL, 5, 1, 1, 50, '', 0, NULL, NULL, '2024-10-21 13:52:58', '2024-10-21 13:56:23'),
(31, 'ÖDN21102024000031', 1, NULL, 5, 1, 2, 50, '', 0, NULL, NULL, '2024-10-21 13:53:01', '2024-10-21 13:56:23'),
(32, 'ÖDN21102024000032', 1, NULL, 5, 3, 1, 50, '', 0, NULL, NULL, '2024-10-21 13:53:38', '2024-10-21 13:56:23'),
(33, 'ÖDN21102024000033', 1, NULL, 5, 3, 1, 20, '', 0, NULL, NULL, '2024-10-21 13:53:43', '2024-10-21 13:56:23'),
(34, 'ÖDN21102024000034', 1, NULL, 5, 3, 2, 20, '', 0, NULL, NULL, '2024-10-21 13:53:46', '2024-10-21 13:56:23'),
(35, 'ÖDN22102024000035', 5, NULL, 3, 2, 1, 150, '', 0, NULL, NULL, '2024-10-22 13:18:41', '2024-10-22 13:18:41'),
(36, 'ÖDN23102024000036', 1, NULL, 4, 2, 1, 5, ' kodlu ödənişin ləğvindən gələn artım', 0, NULL, NULL, '2024-10-23 05:39:00', '2024-10-23 05:39:01'),
(37, 'ÖDN23102024000037', 1, NULL, 4, 2, 2, 5, '', 0, NULL, NULL, '2024-10-23 05:39:55', '2024-10-23 05:39:55'),
(38, 'ÖDN23102024000038', 1, NULL, 5, 2, 1, 20, 'ÖDN18102024000007 kodlu ödənişin ləğvindən gələn artım', 0, NULL, NULL, '2024-10-23 10:13:10', '2024-10-23 10:13:10'),
(39, 'ÖDN23102024000039', 1, 11, 3, 4, 1, 10, '', 1, 1, 'Aut delectus voluptas corrupti aperiam dignissimos. Alias nisi tempore nam. Quibusdam assumenda enim.', '2024-10-23 10:17:31', '2024-10-26 18:53:12'),
(40, 'ÖDN23102024000040', 1, NULL, 3, 2, 1, 10, 'ÖDN23102024000039 kodlu ödənişin ləğvindən gələn artım', 0, NULL, NULL, '2024-10-23 10:17:53', '2024-10-23 10:17:53'),
(41, 'ÖDN23102024000041', 1, 11, 3, 4, 1, 5, '', 1, 1, 'Eligendi dolores suscipit ab at animi fugiat doloremque. Consequatur delectus minima fugit aliquid alias aliquid odio. Consequatur quam perferendis ut vero natus fugit deserunt commodi.', '2024-10-23 10:19:04', '2024-10-26 18:53:12'),
(42, 'ÖDN23102024000042', 1, NULL, 3, 2, 1, 5, 'ÖDN23102024000041 kodlu ödənişin ləğvindən gələn artım', 0, NULL, NULL, '2024-10-23 10:19:18', '2024-10-23 10:19:18'),
(43, 'ÖDN26102024000043', 5, NULL, 3, 2, 1, 15, 'SFR23102024000011 kodlu sifarişin ləğvindən gələn artım.', 0, NULL, NULL, '2024-10-26 18:53:12', '2024-10-26 18:53:13'),
(44, 'ÖDN26102024000044', 5, 12, 4, 4, 1, 20, '', 1, NULL, NULL, '2024-10-26 19:03:17', '2024-10-26 19:03:51'),
(45, 'ÖDN26102024000045', 5, NULL, 4, 2, 1, 20, 'SFR26102024000012 kodlu sifarişin ləğvindən gələn artım.', 0, NULL, NULL, '2024-10-26 19:03:51', '2024-10-26 19:03:51'),
(46, 'ÖDN26102024000046', 5, 13, 4, 4, 1, 50, '', 1, NULL, NULL, '2024-10-26 19:06:44', '2024-10-26 20:03:08'),
(47, 'ÖDN26102024000047', 5, 13, 4, 4, 1, 30, '', 1, NULL, NULL, '2024-10-26 19:06:52', '2024-10-26 20:03:08'),
(48, 'ÖDN26102024000048', 5, 13, 4, 4, 1, 30, '', 1, NULL, NULL, '2024-10-26 19:07:05', '2024-10-26 20:03:08'),
(49, 'ÖDN27102024000049', 5, NULL, 4, 2, 1, 110, 'SFR26102024000013 kodlu sifarişin ləğvindən gələn artım.', 0, NULL, NULL, '2024-10-26 20:02:47', '2024-10-26 20:02:47'),
(50, 'ÖDN27102024000050', 5, NULL, 4, 2, 1, 110, 'SFR26102024000013 kodlu sifarişin ləğvindən gələn artım.', 0, NULL, NULL, '2024-10-26 20:03:08', '2024-10-26 20:03:08'),
(51, 'ÖDN27102024000051', 5, 14, 3, 4, 1, 10, '', 1, NULL, NULL, '2024-10-26 20:06:50', '2024-10-26 20:07:06'),
(52, 'ÖDN27102024000052', 5, NULL, 3, 2, 1, 10, 'SFR27102024000014 kodlu sifarişin ləğvindən gələn artım.', 0, NULL, NULL, '2024-10-26 20:07:06', '2024-10-26 20:07:06'),
(53, 'ÖDN27102024000053', 5, 15, 3, 4, 1, 10, '', 0, NULL, NULL, '2024-10-26 20:09:13', '2024-10-26 20:09:13'),
(54, 'ÖDN27102024000054', 5, 15, 3, 4, 1, 5, '', 0, NULL, NULL, '2024-10-26 20:09:25', '2024-10-26 20:09:25'),
(55, 'ÖDN27102024000055', 5, 15, 3, 4, 1, 5, '', 0, NULL, NULL, '2024-10-26 20:09:34', '2024-10-26 20:09:34'),
(56, 'ÖDN27102024000056', 5, 16, 3, 4, 1, 10, '', 1, 1, 'Accusamus consectetur sequi soluta ipsam fuga nobis ipsa libero. Nostrum laudantium nisi. Ducimus qui inventore quibusdam optio harum debitis sapiente beatae.', '2024-10-26 20:11:15', '2024-10-27 07:27:40'),
(57, 'ÖDN27102024000057', 5, 17, 3, 4, 1, 40, '', 1, 1, 'Praesentium alias aut expedita quis. Hic animi animi quas nobis vitae labore provident unde ab. Itaque accusamus odit sed nostrum.', '2024-10-26 20:13:24', '2024-10-27 18:27:54'),
(58, 'ÖDN27102024000058', 1, NULL, 3, 2, 1, 40, 'ÖDN27102024000057 kodlu ödənişin ləğvindən yaranmış artım.', 0, NULL, NULL, '2024-10-27 07:25:16', '2024-10-27 07:25:16'),
(59, 'ÖDN27102024000059', 1, NULL, 3, 2, 1, 1.6, '', 0, NULL, NULL, '2024-10-27 07:26:47', '2024-10-27 07:26:47'),
(60, 'ÖDN27102024000060', 1, NULL, 3, 2, 1, 10, 'ÖDN27102024000056 kodlu ödənişin ləğvindən yaranmış artım.', 0, NULL, NULL, '2024-10-27 07:27:40', '2024-10-27 07:27:40'),
(61, 'ÖDN27102024000061', 5, NULL, 3, 2, 1, 40, 'SFR27102024000017 kodlu sifarişin ləğvindən gələn artım.', 0, NULL, NULL, '2024-10-27 18:27:54', '2024-10-27 18:27:54');

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
(29, 'PROD00002927102024', 'Test məhsul', NULL, '2024-10-27 08:33:56', '2024-10-27 10:39:14', 0);

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
('A4mo05lgdCPpN0MSmv40COxVaQVuMbj7i8YUbHEw', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMUVzaXFiS0RGcXR6VVpzTnRTS1VWVDVDNmxJREVFRm5iejNQeXBYWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL29yZGVyL2xvZ3MiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3VzZXIvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1730056083),
('IMl9M6eZgrYay3O1rDJnAXMBEsG5DUqxSbi1Wvif', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMVBUSXVrcU1LQll3V25ReHFVdVNKdlc4R2c3eXZVUTVmbmxHODBmbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730053022),
('jGEbduE3dUPfChp0IcGi96NEVWZ5o4PJML6tDG3y', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNDlqeTdaRnJiQkowV0swcTJqUmhNeUk3b2U1ZmpFMU9zYkhHRlBwNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730053022);

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
(3, 'USR19031998000003', 'Ülvi Hüseynov', 2, NULL, 300, 0, 300, 0, 450, '1998-03-18 20:00:00', '2024-10-27 18:27:54'),
(4, 'USR18011993000004', 'Pərviz Əliyarov', 3, NULL, 0, 0, 0, 300, 245, '1993-01-17 20:00:00', '2024-10-26 20:03:08'),
(5, 'USR30041985000005', 'Elşən Həmidovv', 1, NULL, 148.6, 48.6, 100, 50, 289.8, '1985-04-29 20:00:00', '2024-10-23 10:13:10');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_logs`
--
ALTER TABLE `order_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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

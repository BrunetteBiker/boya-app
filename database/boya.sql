-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2024 at 06:54 PM
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
  `customer_id` int DEFAULT NULL,
  `executor_id` int DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount` float DEFAULT '0',
  `total` float DEFAULT NULL,
  `status_id` int DEFAULT '1',
  `debt` float DEFAULT '0',
  `paid` float DEFAULT '0',
  `notes` longtext,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `executor_id`, `amount`, `discount`, `total`, `status_id`, `debt`, `paid`, `notes`, `created_at`, `updated_at`) VALUES
(1, 24, 97, 406.39, 0, 406.39, 1, 406.39, 0, 'Quod modi eos sunt. Sapiente alias tenetur voluptas voluptatem eius. Qui quasi incidunt perferendis provident et accusamus. Odit est fugit aut odio quisquam.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(2, 40, 97, 615.05, 0, 615.05, 1, 615.05, 0, 'Qui inventore exercitationem dolorem qui quia libero velit fugit. Et voluptas itaque non quia impedit fugit laudantium. Voluptatibus accusantium quasi inventore ut maiores quia. Dolor perferendis et tempore voluptas.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(3, 24, 97, 318.56, 0, 318.56, 1, 318.56, 0, 'Reprehenderit quo dolorem ipsum. Earum ipsum laudantium maxime animi. Hic voluptates magni doloremque autem nostrum. Nostrum quis dolorem veritatis quod. Delectus harum ad sit pariatur aut.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(4, 52, 97, 67.02, 0, 67.02, 1, 67.02, 0, 'Qui eos et facere. Quod recusandae fugit vel sunt sed. Nostrum qui nihil odit aspernatur ea reiciendis voluptates.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(5, 87, 97, 421.66, 0, 421.66, 1, 421.66, 0, 'Distinctio non maxime odio sunt. Velit enim nobis nihil aspernatur. Sint pariatur sint qui ipsam error omnis.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(6, 52, 97, 87.24, 0, 87.24, 1, 87.24, 0, 'Voluptas consequatur qui autem omnis occaecati maxime eos officiis. Facilis ullam ut doloremque nobis voluptatem. Voluptas aut sunt aliquam deserunt fugit voluptatibus. Est aut dolorem eveniet.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(7, 74, 97, 520.63, 0, 520.63, 1, 520.63, 0, 'Atque doloribus odit blanditiis et pariatur dolore. Maiores vero ex saepe impedit consequatur illo corrupti. Eos mollitia nihil cumque ut facilis nemo.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(8, 102, 97, 137.16, 0, 137.16, 1, 137.16, 0, 'Vitae rerum aut ea. Omnis eum vel earum impedit suscipit qui exercitationem.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(9, 4, 97, 249.75, 0, 249.75, 1, 249.75, 0, 'Voluptatem et animi maxime. Sit ut et eligendi totam provident facere et ea. Et a officiis et molestiae.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(10, 76, 97, 412.93, 0, 412.93, 1, 412.93, 0, 'Quasi quod nulla ipsum expedita porro. Asperiores magni doloribus animi vero occaecati veritatis. Dolore dolor culpa illum aut esse quos officia.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(11, 19, 97, 171.58, 0, 171.58, 1, 171.58, 0, 'Est ducimus labore mollitia et ratione occaecati. Qui ut dolor tempora adipisci. Illum veniam adipisci vitae nemo aut exercitationem atque.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(12, 4, 97, 198.72, 0, 198.72, 1, 198.72, 0, 'Sed laboriosam mollitia possimus animi incidunt. Enim necessitatibus repudiandae fugiat accusamus odit error qui. Aliquam expedita debitis deleniti vero.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(13, 87, 97, 169.29, 0, 169.29, 1, 169.29, 0, 'Expedita autem aspernatur laboriosam odit omnis minima. Laudantium sit qui officia sit. Nemo enim doloremque illum. Dignissimos impedit similique odit laboriosam sit molestiae aspernatur.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(14, 100, 97, 61.28, 0, 61.28, 1, 61.28, 0, 'A temporibus porro iusto occaecati. Ratione quas neque deserunt molestiae rerum. Maxime non quo nostrum quidem.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(15, 16, 97, 124.29, 0, 124.29, 1, 124.29, 0, 'Molestiae enim aspernatur ipsa dolorem iure sunt quibusdam. Et a ullam sed ea rerum rem. Odit natus sequi repellendus assumenda quisquam quibusdam aliquam. Cum libero fuga consequatur labore quia ipsa.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(16, 85, 97, 277.98, 0, 277.98, 1, 277.98, 0, 'Ipsa odio ea et vitae sunt architecto. Tempore accusamus molestiae aut blanditiis aliquam. Quo unde quia vitae nobis nihil neque.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(17, 59, 97, 381.53, 0, 381.53, 1, 381.53, 0, 'Labore voluptates sit quasi cum eius autem accusamus. Quia at assumenda ullam vitae est porro quia.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(18, 51, 97, 394.09, 0, 394.09, 1, 394.09, 0, 'Eum omnis est aut sapiente. Tempora reiciendis in possimus omnis ipsa et. Facilis similique totam facere occaecati fugit praesentium. Aut earum numquam ad quia autem sit dolore debitis.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(19, 51, 97, 271.89, 0, 271.89, 1, 271.89, 0, 'Id nobis qui libero iusto autem illo magnam commodi. Sit expedita vitae dignissimos illum reiciendis. Aut sit labore at natus. Ab et repudiandae voluptas qui sed rerum.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(20, 24, 97, 385.31, 0, 385.31, 1, 385.31, 0, 'Et quaerat laborum laboriosam est rerum. Facere rerum omnis id nemo eos ullam. Adipisci laudantium beatae et autem.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(21, 102, 97, 259.57, 0, 259.57, 1, 259.57, 0, 'Velit vero natus repudiandae nobis. Ea in non dicta ullam. Aut amet porro veniam. Unde aspernatur corporis qui aperiam rerum facere delectus.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(22, 18, 97, 86.3, 0, 86.3, 1, 86.3, 0, 'Atque tempore ut commodi sunt reiciendis voluptates. In illo in odit blanditiis ducimus. Dolore unde doloremque aut aspernatur hic eos.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(23, 6, 97, 112.28, 0, 112.28, 1, 112.28, 0, 'Voluptatibus assumenda et ullam facilis nulla. Odit impedit omnis deleniti dolores ut. Maiores quis mollitia reiciendis nisi adipisci. Quam vel ut culpa cupiditate ut voluptas ullam.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(24, 63, 97, 419.63, 0, 419.63, 1, 419.63, 0, 'Nemo natus illum in veniam dignissimos. Hic corporis aut sapiente aspernatur a autem. Praesentium molestias nobis impedit quasi consectetur distinctio. Sed deleniti blanditiis et est ut aut vero.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(25, 54, 97, 25.52, 0, 25.52, 1, 25.52, 0, 'Dolorem eius deserunt et sint iste quia dolorem. Voluptatem quod voluptatibus ea quia et. Totam voluptatem tenetur sit quas fugiat optio consequatur ab.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(26, 83, 97, 43.13, 0, 43.13, 1, 43.13, 0, 'Voluptas incidunt saepe facilis. Aliquid animi est ipsam aut. Facere modi nemo et omnis.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(27, 76, 97, 169.95, 0, 169.95, 1, 169.95, 0, 'Molestias consequuntur id sed est est magnam voluptatum. Nisi atque ducimus quod voluptatem. Totam dolores qui cupiditate aut eos.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(28, 26, 97, 24.13, 0, 24.13, 1, 24.13, 0, 'Soluta a ut odit. Ut iusto non labore. Perspiciatis quia non id corporis laboriosam aut. Eum sit illo consequatur eum impedit aut aut architecto.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(29, 102, 97, 90.16, 0, 90.16, 1, 90.16, 0, 'Consectetur rerum quia maiores et quae rem. Omnis aut voluptatem eius perspiciatis consequuntur id. Ratione omnis sint suscipit.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(30, 52, 97, 534.39, 0, 534.39, 1, 534.39, 0, 'Qui eos optio est ea. Praesentium eligendi aut delectus perferendis eos dolorum. Necessitatibus inventore voluptatem dolorum nisi rem quia. Dolore qui rem rerum alias blanditiis est.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(31, 54, 97, 194.32, 0, 194.32, 1, 194.32, 0, 'Temporibus excepturi reiciendis explicabo sunt corrupti. Nulla nisi maxime exercitationem incidunt non saepe. Ea quae consequuntur minima eaque quo nesciunt. In sequi mollitia sit ea aliquid saepe soluta.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(32, 52, 97, 102.3, 0, 102.3, 1, 102.3, 0, 'Amet deserunt quas maiores magnam molestias consequatur iste vitae. Dolore fugiat voluptas esse deleniti sed. Sunt quos magni eveniet similique itaque aut. Eligendi et et at explicabo dolore fugiat maiores.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(33, 26, 97, 850.52, 0, 850.52, 1, 850.52, 0, 'Eos sapiente in autem dolores vitae sit. Accusamus a iure reiciendis temporibus soluta ut. Fugit quos sunt voluptatibus id.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(34, 81, 97, 415.82, 0, 415.82, 1, 415.82, 0, 'Omnis dignissimos iusto eos qui quis fugiat eos ratione. Ab cum ut et quia rem. Quas et necessitatibus praesentium excepturi officia est occaecati.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(35, 24, 97, 538.2, 0, 538.2, 1, 538.2, 0, 'Voluptate minima tempore amet dolor natus eaque. Fugiat perferendis nobis magni est. Perferendis consequatur accusamus commodi consequatur.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(36, 40, 97, 438.47, 0, 438.47, 1, 438.47, 0, 'Illo eos quia ea. Aspernatur ex consectetur sit repellat nisi. Qui ipsam consequatur sapiente repellat neque est quasi.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(37, 19, 97, 250.58, 0, 250.58, 1, 250.58, 0, 'Aut voluptatem explicabo voluptatem ab cupiditate repellat molestiae. Et ipsum sunt aut voluptatum. Dolores sed unde cumque animi itaque consequatur.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(38, 26, 97, 693.1, 0, 693.1, 1, 693.1, 0, 'Ipsum qui laudantium omnis ea omnis et. Porro nobis nam delectus aperiam corporis non. Dolorem animi ullam et quibusdam et ea.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(39, 19, 97, 62.1, 0, 62.1, 1, 62.1, 0, 'Et voluptas est ducimus sit. Ab cumque voluptatibus sit accusantium voluptatem praesentium aut. Tempore perspiciatis dolor quisquam nobis nihil enim aliquam. Reprehenderit itaque quisquam laudantium.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(40, 54, 97, 635, 0, 635, 1, 635, 0, 'Dignissimos aut cupiditate velit et quas molestias commodi. Ut autem eius perspiciatis fuga rem.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(41, 43, 97, 270.9, 0, 270.9, 1, 270.9, 0, 'Officiis ducimus provident enim quam voluptatibus est repudiandae. Corrupti libero repellat qui veniam sapiente. Aut omnis mollitia expedita et odit quidem.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(42, 82, 97, 175.81, 0, 175.81, 1, 175.81, 0, 'Consequatur veritatis aut ab sint. Rerum aut ab ut est quisquam assumenda earum. Dolorem autem fuga error voluptate earum quam nostrum. Ipsam sed architecto laudantium.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(43, 85, 97, 274.5, 0, 274.5, 1, 274.5, 0, 'Quia voluptatem ratione eos. Eaque et ea ratione rerum doloremque. Autem quia fuga nihil animi quo voluptas perspiciatis labore. Labore corrupti qui voluptas dignissimos.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(44, 51, 97, 797.63, 0, 797.63, 1, 797.63, 0, 'Vitae quidem dignissimos modi similique. Necessitatibus est aliquam magnam et.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(45, 43, 97, 534.75, 0, 534.75, 1, 534.75, 0, 'Dolores in dolor debitis. Modi nesciunt tempora ex aut impedit recusandae omnis. Beatae iure sed voluptate voluptas quasi. In recusandae optio beatae illo molestiae recusandae.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(46, 83, 97, 135.88, 0, 135.88, 1, 135.88, 0, 'Quidem vel sequi magni est et maiores. Corrupti officiis nihil libero ducimus. Delectus id dolorum recusandae voluptatem. Et pariatur iste tempora et. Maxime maxime quia dolores et sint.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(47, 75, 97, 193.62, 0, 193.62, 1, 193.62, 0, 'Dolor porro voluptatem asperiores sit consequatur earum. Non atque quibusdam soluta voluptatum quidem. Ducimus repellat odio sapiente suscipit cum nemo. Et id et facere quis sit nam error autem. Est suscipit libero commodi harum sed sunt.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(48, 24, 97, 461.39, 0, 461.39, 1, 461.39, 0, 'Sed saepe sit totam quia. Qui asperiores velit expedita qui quae incidunt maiores itaque. Modi cupiditate temporibus eveniet quis. Corrupti debitis pariatur ab dolorem. Quos omnis nulla molestias.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(49, 29, 97, 135.44, 0, 135.44, 1, 135.44, 0, 'Dolor doloremque et quia accusamus. Et quia facilis sit consequatur ut sint quos. Tempora totam rem id est ea quas.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(50, 85, 97, 385.33, 0, 385.33, 1, 385.33, 0, 'Debitis sunt voluptatum temporibus sit qui et error nostrum. Quod vel sed quo consequatur velit eius. Quod voluptatem earum et repudiandae et quo et.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(51, 16, 97, 427.65, 0, 427.65, 1, 427.65, 0, 'Culpa cum nobis sit consequatur est eos. Est dolore amet sunt enim id. Adipisci tempora quos in vel. Est natus cum quae architecto ex ipsa quo.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(52, 102, 97, 441.49, 0, 441.49, 1, 441.49, 0, 'Corporis aut qui necessitatibus suscipit maxime odio voluptatem. Temporibus dolorem quae similique aut dolorem. Non ipsa dolorem vero amet voluptatem voluptatem autem.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(53, 65, 97, 495.37, 0, 495.37, 1, 495.37, 0, 'Laborum rerum doloremque voluptatem qui. Vel qui tempora ipsa dolore.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(54, 65, 97, 411, 0, 411, 1, 411, 0, 'Esse quo magni laudantium voluptatibus nam qui. Adipisci molestias at voluptatem et aut laboriosam voluptatibus quia. Aut blanditiis at recusandae ab molestiae id.', '2024-10-13 07:51:06', '2024-10-13 07:53:47'),
(55, 82, 97, 467.65, 0, 467.65, 1, 467.65, 0, 'Excepturi accusamus nesciunt rerum deleniti neque est. Ut eos sed nulla vel est est perferendis. Et omnis aut ut explicabo autem voluptates sit dolor.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(56, 87, 97, 229.97, 0, 229.97, 1, 229.97, 0, 'Quis voluptatum voluptatum deserunt perferendis expedita. Autem quia nam ut cum quam dolorem sunt. Aut ad quis dolores est. Cupiditate ullam et quidem similique.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(57, 29, 97, 285.63, 0, 285.63, 1, 285.63, 0, 'Ipsum alias necessitatibus aut laborum esse repudiandae blanditiis. Quo quia harum libero autem rerum dolorem. Unde cum illum dolorem voluptate cum voluptatem ut.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(58, 26, 97, 557.88, 0, 557.88, 1, 557.88, 0, 'Temporibus quod debitis at pariatur incidunt laboriosam ex a. Expedita provident illum ducimus iste. Odio doloremque amet sapiente occaecati modi voluptatem cupiditate. Et iste quo in.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(59, 18, 97, 176.99, 0, 176.99, 1, 176.99, 0, 'Aut quod reiciendis iste quibusdam. Voluptatem et eligendi quas hic reiciendis. Recusandae sint cum minus sunt molestiae sint.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(60, 44, 97, 354.03, 0, 354.03, 1, 354.03, 0, 'Provident quo et molestiae non labore sed. Non deleniti libero et voluptatem et sapiente adipisci. Ut velit velit deserunt vero corrupti molestias modi expedita. Asperiores odit est totam. Possimus ea ea quia neque animi error.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(61, 75, 97, 171.94, 0, 171.94, 1, 171.94, 0, 'Sed voluptates officiis voluptatem et ipsa. Et saepe perferendis aspernatur cumque blanditiis repellat. Quidem enim reprehenderit est ut officiis. Est odio sint nihil provident ducimus recusandae.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(62, 76, 97, 554.37, 0, 554.37, 1, 554.37, 0, 'Qui eveniet vero quo sint. Nemo sed aperiam doloremque est debitis. Aut ut rerum veniam adipisci.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(63, 52, 97, 87.85, 0, 87.85, 1, 87.85, 0, 'Est ut sunt delectus id aut dolore sit sunt. Soluta at molestias saepe sint nihil perspiciatis temporibus. Facere sint fugit aut earum consequatur.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(64, 43, 97, 518.99, 0, 518.99, 1, 518.99, 0, 'Laudantium tempora id nisi rerum iste sit delectus aspernatur. Necessitatibus id adipisci maiores numquam asperiores. Veniam voluptas velit tempore commodi porro itaque fugiat.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(65, 18, 97, 580.07, 0, 580.07, 1, 580.07, 0, 'Qui maxime exercitationem in ut voluptas. Voluptatum quos sed ea. Explicabo qui earum nobis sunt sit et. Perferendis officiis at dolores distinctio est.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(66, 52, 97, 339.2, 0, 339.2, 1, 339.2, 0, 'Magni in eius voluptates consequuntur iste reprehenderit. Consequuntur esse architecto in error occaecati in eaque fugiat.', '2024-10-13 07:51:07', '2024-10-13 07:53:47'),
(67, 84, 97, 508.33, 0, 508.33, 1, 508.33, 0, 'Quaerat repellendus iure rerum eligendi aut aut. Voluptatem repellat perspiciatis et ea voluptatem distinctio. Tempora sapiente aut voluptas.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(68, 44, 97, 788.6, 0, 788.6, 1, 788.6, 0, 'Consectetur tempora voluptatem magni. Aliquam voluptatem aliquam omnis et. Ipsum accusantium reprehenderit illo enim nulla in. Iusto odio et placeat eveniet. Maiores animi nobis sed aut facilis.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(69, 83, 97, 336.25, 0, 336.25, 1, 336.25, 0, 'Nostrum ipsam temporibus molestias tempore rerum. Enim et sit corrupti maxime rerum et consequatur corrupti. Et enim nostrum sit placeat eos dolorem vel numquam.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(70, 18, 97, 252.2, 0, 252.2, 1, 252.2, 0, 'Soluta eum consequatur unde et quasi. Expedita at enim nam itaque quibusdam. Perferendis quo eos rem blanditiis eveniet.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(71, 82, 97, 363.05, 0, 363.05, 1, 363.05, 0, 'Vero iure nihil maxime ratione. Qui excepturi et dolores saepe quia. Nobis corrupti ut praesentium in et. Possimus voluptatum quae quo quisquam sed.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(72, 81, 97, 137.49, 0, 137.49, 1, 137.49, 0, 'Odio possimus dolorem repellendus molestiae quaerat voluptatem. Autem et ut et aut aut corporis. Eum vel perspiciatis ut vero. Quos dolores et qui ut.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(73, 65, 97, 624.44, 0, 624.44, 1, 624.44, 0, 'Ad est dolorum id a sunt. Quia doloremque omnis autem omnis sit natus porro nam. Omnis et aliquid illo ullam qui a distinctio aut.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(74, 87, 97, 460.68, 0, 460.68, 1, 460.68, 0, 'Suscipit eaque omnis sit recusandae ipsa accusantium. Corporis voluptatem perspiciatis aspernatur rerum impedit voluptate sed. Esse doloribus reprehenderit minima consequatur non eum impedit ea.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(75, 54, 97, 302.15, 0, 302.15, 1, 302.15, 0, 'Totam eaque labore sit atque repellendus. Explicabo voluptatem qui similique maiores. Voluptatum vel rerum ab earum expedita aut voluptas. Ab minima culpa nesciunt ad officiis. Eum sit sint iusto minus modi.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(76, 82, 97, 34.72, 0, 34.72, 1, 34.72, 0, 'Consequatur consequuntur sapiente est. Voluptatibus repellat ut quos illum a suscipit dolores nostrum.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(77, 51, 97, 419.14, 0, 419.14, 1, 419.14, 0, 'Eum aut qui itaque quibusdam veritatis ea quis animi. Eaque atque deleniti ex in sint nisi sequi.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(78, 85, 97, 213.32, 0, 213.32, 1, 213.32, 0, 'Reiciendis ullam reprehenderit numquam dolorum ut. Explicabo impedit unde doloremque cupiditate et sint. Provident qui nihil voluptatibus ut facere.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(79, 16, 97, 396.54, 0, 396.54, 1, 396.54, 0, 'Velit repudiandae in est unde dolores. Unde unde aut et aperiam quod et. Qui ipsum dolor quia molestias eveniet debitis qui assumenda. Doloremque accusantium sunt iure error sed.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(80, 65, 97, 85.52, 0, 85.52, 1, 85.52, 0, 'Eos vel repellendus et dignissimos mollitia. Magnam praesentium vero sint. Minima iste aut aut inventore quam consequatur.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(81, 44, 97, 401.75, 0, 401.75, 1, 401.75, 0, 'Rerum est sed nihil iusto dolor repellendus. Qui est ut aut voluptatem neque. Voluptas temporibus consequatur quis ab quibusdam possimus. Repudiandae quaerat inventore pariatur et vitae voluptates.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(82, 54, 97, 142.67, 0, 142.67, 1, 142.67, 0, 'Perferendis nihil eos doloribus eius aut id possimus. Sed quasi itaque quo ut.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(83, 4, 97, 185.35, 0, 185.35, 1, 185.35, 0, 'Repellendus error qui nam sed in sed deleniti asperiores. Odio dignissimos accusamus fugit molestiae adipisci iure. Sit explicabo voluptates sunt ad maxime praesentium quod. Qui et quaerat ut quibusdam cum.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(84, 54, 97, 4.94, 0, 4.94, 1, 4.94, 0, 'Dolor ab porro quaerat quam dolorum laboriosam iusto. Quos labore quisquam recusandae voluptatem consequuntur totam. Distinctio et dolorem quaerat consequatur molestiae.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(85, 16, 97, 354.99, 0, 354.99, 1, 354.99, 0, 'Quia iste et velit fugit neque iure maxime praesentium. Voluptates dolore pariatur qui ut ipsam voluptas. Consectetur ex sit eum voluptas fuga. Dolore temporibus porro modi enim iusto nihil.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(86, 29, 97, 171.08, 0, 171.08, 1, 171.08, 0, 'Delectus laboriosam libero iste soluta natus quibusdam suscipit nisi. Est et ratione enim error iusto sit velit. Et id tempore adipisci officiis repudiandae. Est qui commodi velit minus qui. Molestias nihil modi qui dolores nihil rem.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(87, 4, 97, 300.51, 0, 300.51, 1, 300.51, 0, 'Et similique a id non ullam. In id aut sapiente ipsum. Eveniet quod quis et pariatur voluptatibus. Illum distinctio est vitae deserunt eaque.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(88, 63, 97, 651.84, 0, 651.84, 1, 651.84, 0, 'Iusto dolores porro optio ut hic. Debitis voluptatem qui dolore fugit. Quos iusto modi sit et distinctio. Eos temporibus quidem sapiente ratione est.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(89, 85, 97, 241.12, 0, 241.12, 1, 241.12, 0, 'Voluptas fugit reprehenderit dolores dolores molestiae iure consequatur. Totam doloribus quis beatae minima dolor. Deserunt quaerat natus voluptas et.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(90, 43, 97, 661.3, 0, 661.3, 1, 661.3, 0, 'Autem excepturi earum eveniet error nemo. Aut reiciendis voluptatem laborum et dignissimos. Dicta blanditiis asperiores molestias omnis saepe iure quos. Labore et consequatur voluptatibus ea.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(91, 43, 97, 229.58, 0, 229.58, 1, 229.58, 0, 'Quam consectetur nemo culpa blanditiis consequatur. Pariatur aliquam nisi atque sapiente sed ut molestias. Molestias consequuntur odit quos voluptatibus eius molestiae voluptatum. Accusamus ea et in provident.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(92, 65, 97, 270.51, 0, 270.51, 1, 270.51, 0, 'Voluptas reiciendis harum natus quo nobis. Non sunt officiis maiores molestiae. Nemo dolores et sed.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(93, 16, 97, 804.32, 0, 804.32, 1, 804.32, 0, 'Nemo et sunt est suscipit sint. Eligendi cupiditate ipsam officiis doloribus. Cumque esse quidem occaecati eum. Ut reiciendis pariatur ratione nulla id temporibus.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(94, 76, 97, 463.46, 0, 463.46, 1, 463.46, 0, 'Aut quo dolorem rerum asperiores voluptatum aspernatur. Error mollitia sapiente unde cupiditate quia dolores. Quo esse et nam.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(95, 54, 97, 145.23, 0, 145.23, 1, 145.23, 0, 'Ea autem qui soluta tempore. Commodi id quo odit reprehenderit voluptas velit. Iusto iste ducimus in eum voluptates. Totam dignissimos quas est provident.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(96, 4, 97, 229.52, 0, 229.52, 1, 229.52, 0, 'Facilis maiores nesciunt sed. Et possimus eos dolorem quisquam. Non qui aliquam asperiores blanditiis est ea autem inventore.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(97, 81, 97, 678.23, 0, 678.23, 1, 678.23, 0, 'Debitis voluptas ex est. Sit voluptas dolor qui sed voluptas qui voluptas.', '2024-10-13 07:51:07', '2024-10-13 07:53:48'),
(98, 54, 97, 174.3, 0, 174.3, 1, 174.3, 0, 'Fugit est laboriosam fugiat ducimus aut. Et doloremque fuga ab. Qui voluptatem maiores voluptas alias consequatur laboriosam. Et pariatur porro enim provident voluptatem.', '2024-10-13 07:51:08', '2024-10-13 07:53:48'),
(99, 74, 97, 16.28, 0, 16.28, 1, 0, 0, 'Nihil in ut dolores tenetur laboriosam distinctio. Nihil quia aliquid aliquid aut reprehenderit sit amet repellendus. Nihil nostrum sunt consequatur sunt ut ut qui exercitationem.', '2024-10-13 07:51:08', '2024-10-13 10:12:26'),
(100, 74, 97, 56, 0, 56, 1, 0, 0, 'Sed incidunt non beatae error sed. Pariatur iste veniam praesentium sequi esse doloribus. Dolorem placeat nisi veniam sapiente. Repellendus pariatur est aut omnis tempora maiores.', '2024-10-13 07:51:08', '2024-10-13 10:09:20');

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
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `amount`, `price`, `total`, `created_at`) VALUES
(1, 1, 28, 8, 5.59, 44.72, '2024-10-13 07:51:06'),
(2, 1, 18, 8, 6.88, 55.04, '2024-10-13 07:51:06'),
(3, 1, 27, 4, 17.14, 68.56, '2024-10-13 07:51:06'),
(4, 1, 13, 1, 5.08, 5.08, '2024-10-13 07:51:06'),
(5, 1, 23, 5, 12.36, 61.8, '2024-10-13 07:51:06'),
(6, 1, 25, 4, 11.68, 46.72, '2024-10-13 07:51:06'),
(7, 1, 23, 6, 1.8, 10.8, '2024-10-13 07:51:06'),
(8, 1, 27, 9, 12.63, 113.67, '2024-10-13 07:51:06'),
(9, 2, 9, 2, 15.67, 31.34, '2024-10-13 07:51:06'),
(10, 2, 25, 8, 7.83, 62.64, '2024-10-13 07:51:06'),
(11, 2, 20, 6, 12.98, 77.88, '2024-10-13 07:51:06'),
(12, 2, 12, 3, 18.88, 56.64, '2024-10-13 07:51:06'),
(13, 2, 21, 7, 18.99, 132.93, '2024-10-13 07:51:06'),
(14, 2, 17, 10, 11.29, 112.9, '2024-10-13 07:51:06'),
(15, 2, 12, 6, 13.32, 79.92, '2024-10-13 07:51:06'),
(16, 2, 1, 8, 7.6, 60.8, '2024-10-13 07:51:06'),
(17, 3, 22, 7, 6.75, 47.25, '2024-10-13 07:51:06'),
(18, 3, 24, 9, 11.18, 100.62, '2024-10-13 07:51:06'),
(19, 3, 4, 9, 6.2, 55.8, '2024-10-13 07:51:06'),
(20, 3, 15, 1, 15.01, 15.01, '2024-10-13 07:51:06'),
(21, 3, 15, 6, 12.25, 73.5, '2024-10-13 07:51:06'),
(22, 3, 9, 2, 8.45, 16.9, '2024-10-13 07:51:06'),
(23, 3, 21, 6, 1.58, 9.48, '2024-10-13 07:51:06'),
(24, 4, 36, 2, 1.1, 2.2, '2024-10-13 07:51:06'),
(25, 4, 26, 4, 12.16, 48.64, '2024-10-13 07:51:06'),
(26, 4, 28, 1, 7.12, 7.12, '2024-10-13 07:51:06'),
(27, 4, 24, 6, 1.51, 9.06, '2024-10-13 07:51:06'),
(28, 5, 5, 4, 8.93, 35.72, '2024-10-13 07:51:06'),
(29, 5, 36, 3, 15.26, 45.78, '2024-10-13 07:51:06'),
(30, 5, 4, 2, 10.74, 21.48, '2024-10-13 07:51:06'),
(31, 5, 24, 10, 13.84, 138.4, '2024-10-13 07:51:06'),
(32, 5, 36, 2, 5.84, 11.68, '2024-10-13 07:51:06'),
(33, 5, 26, 10, 16.86, 168.6, '2024-10-13 07:51:06'),
(34, 6, 8, 1, 8.2, 8.2, '2024-10-13 07:51:06'),
(35, 6, 10, 8, 5.99, 47.92, '2024-10-13 07:51:06'),
(36, 6, 20, 8, 3.89, 31.12, '2024-10-13 07:51:06'),
(37, 7, 29, 10, 15, 150, '2024-10-13 07:51:06'),
(38, 7, 33, 7, 4.83, 33.81, '2024-10-13 07:51:06'),
(39, 7, 23, 1, 17.88, 17.88, '2024-10-13 07:51:06'),
(40, 7, 1, 5, 13.54, 67.7, '2024-10-13 07:51:06'),
(41, 7, 16, 7, 1.52, 10.64, '2024-10-13 07:51:06'),
(42, 7, 9, 9, 9.22, 82.98, '2024-10-13 07:51:06'),
(43, 7, 17, 5, 9.14, 45.7, '2024-10-13 07:51:06'),
(44, 7, 13, 8, 11.86, 94.88, '2024-10-13 07:51:06'),
(45, 7, 30, 8, 2.13, 17.04, '2024-10-13 07:51:06'),
(46, 8, 36, 5, 6.32, 31.6, '2024-10-13 07:51:06'),
(47, 8, 11, 7, 15.08, 105.56, '2024-10-13 07:51:06'),
(48, 9, 28, 9, 12, 108, '2024-10-13 07:51:06'),
(49, 9, 30, 7, 18.96, 132.72, '2024-10-13 07:51:06'),
(50, 9, 13, 3, 3.01, 9.03, '2024-10-13 07:51:06'),
(51, 10, 15, 5, 19.17, 95.85, '2024-10-13 07:51:06'),
(52, 10, 28, 1, 7.26, 7.26, '2024-10-13 07:51:06'),
(53, 10, 18, 5, 9.44, 47.2, '2024-10-13 07:51:06'),
(54, 10, 22, 8, 16.76, 134.08, '2024-10-13 07:51:06'),
(55, 10, 7, 3, 9.47, 28.41, '2024-10-13 07:51:06'),
(56, 10, 11, 5, 6.84, 34.2, '2024-10-13 07:51:06'),
(57, 10, 10, 8, 2.71, 21.68, '2024-10-13 07:51:06'),
(58, 10, 30, 3, 14.75, 44.25, '2024-10-13 07:51:06'),
(59, 11, 33, 9, 8.18, 73.62, '2024-10-13 07:51:06'),
(60, 11, 30, 10, 3.24, 32.4, '2024-10-13 07:51:06'),
(61, 11, 19, 6, 8.37, 50.22, '2024-10-13 07:51:06'),
(62, 11, 11, 1, 15.34, 15.34, '2024-10-13 07:51:06'),
(63, 12, 2, 3, 15.88, 47.64, '2024-10-13 07:51:06'),
(64, 12, 21, 10, 7.82, 78.2, '2024-10-13 07:51:06'),
(65, 12, 33, 8, 9.11, 72.88, '2024-10-13 07:51:06'),
(66, 13, 28, 6, 18.38, 110.28, '2024-10-13 07:51:06'),
(67, 13, 3, 3, 19.67, 59.01, '2024-10-13 07:51:06'),
(68, 14, 15, 1, 12.38, 12.38, '2024-10-13 07:51:06'),
(69, 14, 20, 6, 8.15, 48.9, '2024-10-13 07:51:06'),
(70, 15, 1, 9, 13.81, 124.29, '2024-10-13 07:51:06'),
(71, 16, 28, 10, 3.73, 37.3, '2024-10-13 07:51:06'),
(72, 16, 32, 5, 7.04, 35.2, '2024-10-13 07:51:06'),
(73, 16, 9, 6, 7.33, 43.98, '2024-10-13 07:51:06'),
(74, 16, 22, 4, 18.13, 72.52, '2024-10-13 07:51:06'),
(75, 16, 18, 9, 3.59, 32.31, '2024-10-13 07:51:06'),
(76, 16, 25, 3, 18.89, 56.67, '2024-10-13 07:51:06'),
(77, 17, 17, 5, 6.54, 32.7, '2024-10-13 07:51:06'),
(78, 17, 11, 8, 1.59, 12.72, '2024-10-13 07:51:06'),
(79, 17, 18, 5, 12.83, 64.15, '2024-10-13 07:51:06'),
(80, 17, 5, 8, 19.93, 159.44, '2024-10-13 07:51:06'),
(81, 17, 3, 6, 11.38, 68.28, '2024-10-13 07:51:06'),
(82, 17, 5, 2, 16.83, 33.66, '2024-10-13 07:51:06'),
(83, 17, 22, 1, 8.7, 8.7, '2024-10-13 07:51:06'),
(84, 17, 5, 1, 1.88, 1.88, '2024-10-13 07:51:06'),
(85, 18, 15, 1, 12.99, 12.99, '2024-10-13 07:51:06'),
(86, 18, 17, 9, 15.37, 138.33, '2024-10-13 07:51:06'),
(87, 18, 6, 7, 8.5, 59.5, '2024-10-13 07:51:06'),
(88, 18, 3, 1, 6.55, 6.55, '2024-10-13 07:51:06'),
(89, 18, 19, 1, 18.64, 18.64, '2024-10-13 07:51:06'),
(90, 18, 5, 8, 19.76, 158.08, '2024-10-13 07:51:06'),
(91, 19, 24, 7, 17.29, 121.03, '2024-10-13 07:51:06'),
(92, 19, 21, 6, 17.62, 105.72, '2024-10-13 07:51:06'),
(93, 19, 9, 1, 19.13, 19.13, '2024-10-13 07:51:06'),
(94, 19, 13, 9, 2.89, 26.01, '2024-10-13 07:51:06'),
(95, 20, 27, 6, 9.22, 55.32, '2024-10-13 07:51:06'),
(96, 20, 14, 10, 16.25, 162.5, '2024-10-13 07:51:06'),
(97, 20, 1, 9, 17.16, 154.44, '2024-10-13 07:51:06'),
(98, 20, 19, 9, 1.45, 13.05, '2024-10-13 07:51:06'),
(99, 21, 4, 8, 4.16, 33.28, '2024-10-13 07:51:06'),
(100, 21, 16, 2, 3.65, 7.3, '2024-10-13 07:51:06'),
(101, 21, 31, 4, 1.67, 6.68, '2024-10-13 07:51:06'),
(102, 21, 30, 9, 1.3, 11.7, '2024-10-13 07:51:06'),
(103, 21, 23, 9, 17.54, 157.86, '2024-10-13 07:51:06'),
(104, 21, 23, 3, 14.25, 42.75, '2024-10-13 07:51:06'),
(105, 22, 10, 5, 12.12, 60.6, '2024-10-13 07:51:06'),
(106, 22, 2, 2, 12.85, 25.7, '2024-10-13 07:51:06'),
(107, 23, 29, 8, 9.51, 76.08, '2024-10-13 07:51:06'),
(108, 23, 36, 2, 18.1, 36.2, '2024-10-13 07:51:06'),
(109, 24, 25, 9, 11.13, 100.17, '2024-10-13 07:51:06'),
(110, 24, 29, 7, 12.88, 90.16, '2024-10-13 07:51:06'),
(111, 24, 15, 10, 15.21, 152.1, '2024-10-13 07:51:06'),
(112, 24, 17, 4, 17.08, 68.32, '2024-10-13 07:51:06'),
(113, 24, 11, 2, 4.44, 8.88, '2024-10-13 07:51:06'),
(114, 25, 36, 1, 11, 11, '2024-10-13 07:51:06'),
(115, 25, 19, 1, 14.52, 14.52, '2024-10-13 07:51:06'),
(116, 26, 5, 4, 7.24, 28.96, '2024-10-13 07:51:06'),
(117, 26, 6, 1, 14.17, 14.17, '2024-10-13 07:51:06'),
(118, 27, 37, 6, 10.69, 64.14, '2024-10-13 07:51:06'),
(119, 27, 33, 7, 6.59, 46.13, '2024-10-13 07:51:06'),
(120, 27, 12, 2, 3.14, 6.28, '2024-10-13 07:51:06'),
(121, 27, 18, 10, 5.34, 53.4, '2024-10-13 07:51:06'),
(122, 28, 36, 4, 3.82, 15.28, '2024-10-13 07:51:06'),
(123, 28, 15, 3, 2.95, 8.85, '2024-10-13 07:51:06'),
(124, 29, 7, 8, 8.01, 64.08, '2024-10-13 07:51:06'),
(125, 29, 8, 8, 2.14, 17.12, '2024-10-13 07:51:06'),
(126, 29, 26, 8, 1.12, 8.96, '2024-10-13 07:51:06'),
(127, 30, 28, 2, 13.8, 27.6, '2024-10-13 07:51:06'),
(128, 30, 29, 6, 17.39, 104.34, '2024-10-13 07:51:06'),
(129, 30, 3, 3, 13.49, 40.47, '2024-10-13 07:51:06'),
(130, 30, 8, 4, 16.78, 67.12, '2024-10-13 07:51:06'),
(131, 30, 4, 5, 5.97, 29.85, '2024-10-13 07:51:06'),
(132, 30, 35, 6, 5.8, 34.8, '2024-10-13 07:51:06'),
(133, 30, 22, 5, 6.55, 32.75, '2024-10-13 07:51:06'),
(134, 30, 25, 6, 13.77, 82.62, '2024-10-13 07:51:06'),
(135, 30, 28, 9, 12.76, 114.84, '2024-10-13 07:51:06'),
(136, 31, 12, 2, 14.56, 29.12, '2024-10-13 07:51:06'),
(137, 31, 9, 5, 16.62, 83.1, '2024-10-13 07:51:06'),
(138, 31, 26, 10, 5.21, 52.1, '2024-10-13 07:51:06'),
(139, 31, 29, 6, 3.66, 21.96, '2024-10-13 07:51:06'),
(140, 31, 15, 1, 8.04, 8.04, '2024-10-13 07:51:06'),
(141, 32, 7, 5, 10.89, 54.45, '2024-10-13 07:51:06'),
(142, 32, 14, 1, 19.81, 19.81, '2024-10-13 07:51:06'),
(143, 32, 5, 2, 14.02, 28.04, '2024-10-13 07:51:06'),
(144, 33, 14, 8, 12.23, 97.84, '2024-10-13 07:51:06'),
(145, 33, 2, 10, 12.41, 124.1, '2024-10-13 07:51:06'),
(146, 33, 35, 9, 17.96, 161.64, '2024-10-13 07:51:06'),
(147, 33, 3, 2, 9.91, 19.82, '2024-10-13 07:51:06'),
(148, 33, 31, 8, 18.07, 144.56, '2024-10-13 07:51:06'),
(149, 33, 27, 9, 13.66, 122.94, '2024-10-13 07:51:06'),
(150, 33, 26, 7, 13.6, 95.2, '2024-10-13 07:51:06'),
(151, 33, 37, 7, 12.06, 84.42, '2024-10-13 07:51:06'),
(152, 34, 25, 2, 17.89, 35.78, '2024-10-13 07:51:06'),
(153, 34, 24, 10, 3.66, 36.6, '2024-10-13 07:51:06'),
(154, 34, 1, 2, 18.33, 36.66, '2024-10-13 07:51:06'),
(155, 34, 3, 7, 10.56, 73.92, '2024-10-13 07:51:06'),
(156, 34, 11, 3, 17.61, 52.83, '2024-10-13 07:51:06'),
(157, 34, 25, 4, 14.41, 57.64, '2024-10-13 07:51:06'),
(158, 34, 18, 6, 6.67, 40.02, '2024-10-13 07:51:06'),
(159, 34, 11, 1, 4.27, 4.27, '2024-10-13 07:51:06'),
(160, 34, 10, 10, 5.89, 58.9, '2024-10-13 07:51:06'),
(161, 34, 5, 8, 2.4, 19.2, '2024-10-13 07:51:06'),
(162, 35, 1, 8, 15.56, 124.48, '2024-10-13 07:51:06'),
(163, 35, 23, 4, 8.67, 34.68, '2024-10-13 07:51:06'),
(164, 35, 15, 2, 1.44, 2.88, '2024-10-13 07:51:06'),
(165, 35, 33, 2, 3.39, 6.78, '2024-10-13 07:51:06'),
(166, 35, 5, 6, 11.59, 69.54, '2024-10-13 07:51:06'),
(167, 35, 16, 4, 10.93, 43.72, '2024-10-13 07:51:06'),
(168, 35, 14, 10, 18.66, 186.6, '2024-10-13 07:51:06'),
(169, 35, 7, 2, 8.92, 17.84, '2024-10-13 07:51:06'),
(170, 35, 10, 4, 12.92, 51.68, '2024-10-13 07:51:06'),
(171, 36, 31, 9, 9.05, 81.45, '2024-10-13 07:51:06'),
(172, 36, 7, 5, 6.44, 32.2, '2024-10-13 07:51:06'),
(173, 36, 35, 2, 10.02, 20.04, '2024-10-13 07:51:06'),
(174, 36, 8, 10, 4.44, 44.4, '2024-10-13 07:51:06'),
(175, 36, 32, 6, 5.86, 35.16, '2024-10-13 07:51:06'),
(176, 36, 13, 5, 4.64, 23.2, '2024-10-13 07:51:06'),
(177, 36, 6, 6, 10.77, 64.62, '2024-10-13 07:51:06'),
(178, 36, 14, 3, 19.92, 59.76, '2024-10-13 07:51:06'),
(179, 36, 32, 3, 19.24, 57.72, '2024-10-13 07:51:06'),
(180, 36, 20, 2, 9.96, 19.92, '2024-10-13 07:51:06'),
(181, 37, 7, 7, 15.66, 109.62, '2024-10-13 07:51:06'),
(182, 37, 12, 8, 6.04, 48.32, '2024-10-13 07:51:06'),
(183, 37, 2, 1, 18.24, 18.24, '2024-10-13 07:51:06'),
(184, 37, 1, 6, 10.24, 61.44, '2024-10-13 07:51:06'),
(185, 37, 21, 4, 3.24, 12.96, '2024-10-13 07:51:06'),
(186, 38, 11, 9, 15.77, 141.93, '2024-10-13 07:51:06'),
(187, 38, 25, 6, 1.9, 11.4, '2024-10-13 07:51:06'),
(188, 38, 21, 7, 12.26, 85.82, '2024-10-13 07:51:06'),
(189, 38, 3, 10, 15.44, 154.4, '2024-10-13 07:51:06'),
(190, 38, 15, 8, 12.43, 99.44, '2024-10-13 07:51:06'),
(191, 38, 28, 8, 13.82, 110.56, '2024-10-13 07:51:06'),
(192, 38, 37, 4, 3.9, 15.6, '2024-10-13 07:51:06'),
(193, 38, 29, 3, 16.45, 49.35, '2024-10-13 07:51:06'),
(194, 38, 11, 5, 4.92, 24.6, '2024-10-13 07:51:06'),
(195, 39, 5, 6, 10.35, 62.1, '2024-10-13 07:51:06'),
(196, 40, 5, 3, 7.26, 21.78, '2024-10-13 07:51:06'),
(197, 40, 6, 7, 19.1, 133.7, '2024-10-13 07:51:06'),
(198, 40, 29, 4, 12.05, 48.2, '2024-10-13 07:51:06'),
(199, 40, 13, 4, 11.52, 46.08, '2024-10-13 07:51:06'),
(200, 40, 27, 1, 13.58, 13.58, '2024-10-13 07:51:06'),
(201, 40, 8, 10, 18.82, 188.2, '2024-10-13 07:51:06'),
(202, 40, 36, 6, 12.18, 73.08, '2024-10-13 07:51:06'),
(203, 40, 21, 3, 2.26, 6.78, '2024-10-13 07:51:06'),
(204, 40, 36, 7, 14.8, 103.6, '2024-10-13 07:51:06'),
(205, 41, 33, 7, 7.07, 49.49, '2024-10-13 07:51:06'),
(206, 41, 11, 8, 3.14, 25.12, '2024-10-13 07:51:06'),
(207, 41, 29, 4, 18.8, 75.2, '2024-10-13 07:51:06'),
(208, 41, 29, 3, 9.47, 28.41, '2024-10-13 07:51:06'),
(209, 41, 7, 4, 5.04, 20.16, '2024-10-13 07:51:06'),
(210, 41, 26, 4, 18.13, 72.52, '2024-10-13 07:51:06'),
(211, 42, 7, 4, 16.78, 67.12, '2024-10-13 07:51:06'),
(212, 42, 34, 9, 9.67, 87.03, '2024-10-13 07:51:06'),
(213, 42, 5, 3, 7.22, 21.66, '2024-10-13 07:51:06'),
(214, 43, 22, 6, 3.4, 20.4, '2024-10-13 07:51:06'),
(215, 43, 12, 2, 19.41, 38.82, '2024-10-13 07:51:06'),
(216, 43, 13, 10, 5.2, 52, '2024-10-13 07:51:06'),
(217, 43, 35, 5, 15.24, 76.2, '2024-10-13 07:51:06'),
(218, 43, 19, 8, 10.28, 82.24, '2024-10-13 07:51:06'),
(219, 43, 21, 2, 2.42, 4.84, '2024-10-13 07:51:06'),
(220, 44, 29, 2, 9.26, 18.52, '2024-10-13 07:51:06'),
(221, 44, 32, 5, 14.7, 73.5, '2024-10-13 07:51:06'),
(222, 44, 12, 4, 18.58, 74.32, '2024-10-13 07:51:06'),
(223, 44, 12, 7, 10.74, 75.18, '2024-10-13 07:51:06'),
(224, 44, 6, 7, 19.53, 136.71, '2024-10-13 07:51:06'),
(225, 44, 13, 8, 4.72, 37.76, '2024-10-13 07:51:06'),
(226, 44, 20, 10, 16.39, 163.9, '2024-10-13 07:51:06'),
(227, 44, 25, 10, 9.59, 95.9, '2024-10-13 07:51:06'),
(228, 44, 26, 10, 2.51, 25.1, '2024-10-13 07:51:06'),
(229, 44, 19, 7, 13.82, 96.74, '2024-10-13 07:51:06'),
(230, 45, 3, 5, 11.09, 55.45, '2024-10-13 07:51:06'),
(231, 45, 3, 8, 13.67, 109.36, '2024-10-13 07:51:06'),
(232, 45, 26, 5, 1.01, 5.05, '2024-10-13 07:51:06'),
(233, 45, 23, 9, 4.71, 42.39, '2024-10-13 07:51:06'),
(234, 45, 4, 3, 17.72, 53.16, '2024-10-13 07:51:06'),
(235, 45, 12, 8, 1.76, 14.08, '2024-10-13 07:51:06'),
(236, 45, 26, 7, 7.73, 54.11, '2024-10-13 07:51:06'),
(237, 45, 27, 9, 18.89, 170.01, '2024-10-13 07:51:06'),
(238, 45, 4, 2, 15.57, 31.14, '2024-10-13 07:51:06'),
(239, 46, 6, 2, 7.68, 15.36, '2024-10-13 07:51:06'),
(240, 46, 29, 9, 7.16, 64.44, '2024-10-13 07:51:06'),
(241, 46, 11, 8, 7.01, 56.08, '2024-10-13 07:51:06'),
(242, 47, 33, 10, 15.06, 150.6, '2024-10-13 07:51:06'),
(243, 47, 8, 4, 4.56, 18.24, '2024-10-13 07:51:06'),
(244, 47, 9, 6, 4.13, 24.78, '2024-10-13 07:51:06'),
(245, 48, 14, 1, 11.77, 11.77, '2024-10-13 07:51:06'),
(246, 48, 35, 10, 11.66, 116.6, '2024-10-13 07:51:06'),
(247, 48, 12, 2, 8.52, 17.04, '2024-10-13 07:51:06'),
(248, 48, 34, 5, 7.1, 35.5, '2024-10-13 07:51:06'),
(249, 48, 4, 9, 5.03, 45.27, '2024-10-13 07:51:06'),
(250, 48, 5, 4, 12.59, 50.36, '2024-10-13 07:51:06'),
(251, 48, 28, 9, 3.97, 35.73, '2024-10-13 07:51:06'),
(252, 48, 1, 7, 18.68, 130.76, '2024-10-13 07:51:06'),
(253, 48, 10, 2, 9.18, 18.36, '2024-10-13 07:51:06'),
(254, 49, 10, 8, 16.93, 135.44, '2024-10-13 07:51:06'),
(255, 50, 37, 4, 13.74, 54.96, '2024-10-13 07:51:06'),
(256, 50, 32, 6, 12.21, 73.26, '2024-10-13 07:51:06'),
(257, 50, 11, 8, 7.81, 62.48, '2024-10-13 07:51:06'),
(258, 50, 5, 6, 2.77, 16.62, '2024-10-13 07:51:06'),
(259, 50, 11, 1, 13.45, 13.45, '2024-10-13 07:51:06'),
(260, 50, 16, 3, 17.36, 52.08, '2024-10-13 07:51:06'),
(261, 50, 35, 9, 3.35, 30.15, '2024-10-13 07:51:06'),
(262, 50, 13, 3, 15.66, 46.98, '2024-10-13 07:51:06'),
(263, 50, 23, 5, 7.07, 35.35, '2024-10-13 07:51:06'),
(264, 51, 21, 10, 8.12, 81.2, '2024-10-13 07:51:06'),
(265, 51, 8, 3, 11.34, 34.02, '2024-10-13 07:51:06'),
(266, 51, 35, 7, 15.62, 109.34, '2024-10-13 07:51:06'),
(267, 51, 10, 3, 14.87, 44.61, '2024-10-13 07:51:06'),
(268, 51, 16, 8, 13.46, 107.68, '2024-10-13 07:51:06'),
(269, 51, 26, 5, 10.16, 50.8, '2024-10-13 07:51:06'),
(270, 52, 32, 8, 2.06, 16.48, '2024-10-13 07:51:06'),
(271, 52, 20, 7, 3.3, 23.1, '2024-10-13 07:51:06'),
(272, 52, 20, 1, 10.1, 10.1, '2024-10-13 07:51:06'),
(273, 52, 7, 3, 11.21, 33.63, '2024-10-13 07:51:06'),
(274, 52, 8, 6, 17.26, 103.56, '2024-10-13 07:51:06'),
(275, 52, 18, 8, 14.93, 119.44, '2024-10-13 07:51:06'),
(276, 52, 17, 9, 15.02, 135.18, '2024-10-13 07:51:06'),
(277, 53, 26, 8, 13.48, 107.84, '2024-10-13 07:51:06'),
(278, 53, 12, 4, 19, 76, '2024-10-13 07:51:06'),
(279, 53, 20, 6, 9.64, 57.84, '2024-10-13 07:51:06'),
(280, 53, 3, 8, 5.19, 41.52, '2024-10-13 07:51:06'),
(281, 53, 7, 4, 7.11, 28.44, '2024-10-13 07:51:06'),
(282, 53, 25, 8, 3.53, 28.24, '2024-10-13 07:51:06'),
(283, 53, 24, 7, 7.26, 50.82, '2024-10-13 07:51:06'),
(284, 53, 2, 9, 11.63, 104.67, '2024-10-13 07:51:06'),
(285, 54, 28, 2, 9.78, 19.56, '2024-10-13 07:51:06'),
(286, 54, 1, 1, 12.85, 12.85, '2024-10-13 07:51:06'),
(287, 54, 9, 2, 2.89, 5.78, '2024-10-13 07:51:06'),
(288, 54, 6, 4, 3.19, 12.76, '2024-10-13 07:51:06'),
(289, 54, 8, 10, 13.25, 132.5, '2024-10-13 07:51:06'),
(290, 54, 35, 3, 18.8, 56.4, '2024-10-13 07:51:06'),
(291, 54, 29, 7, 6.77, 47.39, '2024-10-13 07:51:06'),
(292, 54, 19, 8, 15.47, 123.76, '2024-10-13 07:51:06'),
(293, 55, 19, 9, 14.65, 131.85, '2024-10-13 07:51:07'),
(294, 55, 1, 3, 11.27, 33.81, '2024-10-13 07:51:07'),
(295, 55, 24, 5, 3.22, 16.1, '2024-10-13 07:51:07'),
(296, 55, 8, 2, 17.97, 35.94, '2024-10-13 07:51:07'),
(297, 55, 34, 5, 19.58, 97.9, '2024-10-13 07:51:07'),
(298, 55, 13, 9, 15.24, 137.16, '2024-10-13 07:51:07'),
(299, 55, 21, 1, 14.89, 14.89, '2024-10-13 07:51:07'),
(300, 56, 7, 6, 14.6, 87.6, '2024-10-13 07:51:07'),
(301, 56, 21, 8, 4.26, 34.08, '2024-10-13 07:51:07'),
(302, 56, 25, 1, 15.07, 15.07, '2024-10-13 07:51:07'),
(303, 56, 21, 7, 11.06, 77.42, '2024-10-13 07:51:07'),
(304, 56, 1, 1, 15.8, 15.8, '2024-10-13 07:51:07'),
(305, 57, 32, 2, 12.83, 25.66, '2024-10-13 07:51:07'),
(306, 57, 27, 6, 14.73, 88.38, '2024-10-13 07:51:07'),
(307, 57, 20, 5, 9.29, 46.45, '2024-10-13 07:51:07'),
(308, 57, 29, 6, 15.59, 93.54, '2024-10-13 07:51:07'),
(309, 57, 1, 10, 1.24, 12.4, '2024-10-13 07:51:07'),
(310, 57, 25, 8, 2.4, 19.2, '2024-10-13 07:51:07'),
(311, 58, 32, 10, 6.49, 64.9, '2024-10-13 07:51:07'),
(312, 58, 25, 3, 8.56, 25.68, '2024-10-13 07:51:07'),
(313, 58, 14, 9, 15.52, 139.68, '2024-10-13 07:51:07'),
(314, 58, 17, 4, 1.3, 5.2, '2024-10-13 07:51:07'),
(315, 58, 25, 10, 6.73, 67.3, '2024-10-13 07:51:07'),
(316, 58, 29, 6, 16.18, 97.08, '2024-10-13 07:51:07'),
(317, 58, 37, 9, 1.36, 12.24, '2024-10-13 07:51:07'),
(318, 58, 2, 6, 13, 78, '2024-10-13 07:51:07'),
(319, 58, 35, 4, 16.95, 67.8, '2024-10-13 07:51:07'),
(320, 59, 32, 7, 9.03, 63.21, '2024-10-13 07:51:07'),
(321, 59, 27, 2, 7.14, 14.28, '2024-10-13 07:51:07'),
(322, 59, 25, 2, 16.7, 33.4, '2024-10-13 07:51:07'),
(323, 59, 18, 2, 7.35, 14.7, '2024-10-13 07:51:07'),
(324, 59, 23, 3, 8.36, 25.08, '2024-10-13 07:51:07'),
(325, 59, 16, 4, 6.58, 26.32, '2024-10-13 07:51:07'),
(326, 60, 14, 7, 2.76, 19.32, '2024-10-13 07:51:07'),
(327, 60, 14, 4, 3.33, 13.32, '2024-10-13 07:51:07'),
(328, 60, 12, 9, 8.34, 75.06, '2024-10-13 07:51:07'),
(329, 60, 26, 3, 11.05, 33.15, '2024-10-13 07:51:07'),
(330, 60, 8, 1, 11.91, 11.91, '2024-10-13 07:51:07'),
(331, 60, 33, 10, 3.08, 30.8, '2024-10-13 07:51:07'),
(332, 60, 4, 9, 12.43, 111.87, '2024-10-13 07:51:07'),
(333, 60, 34, 1, 14.29, 14.29, '2024-10-13 07:51:07'),
(334, 60, 9, 3, 14.77, 44.31, '2024-10-13 07:51:07'),
(335, 61, 32, 6, 7.29, 43.74, '2024-10-13 07:51:07'),
(336, 61, 36, 10, 12.82, 128.2, '2024-10-13 07:51:07'),
(337, 62, 16, 3, 18.43, 55.29, '2024-10-13 07:51:07'),
(338, 62, 7, 9, 8.88, 79.92, '2024-10-13 07:51:07'),
(339, 62, 29, 8, 6.3, 50.4, '2024-10-13 07:51:07'),
(340, 62, 16, 6, 2.66, 15.96, '2024-10-13 07:51:07'),
(341, 62, 32, 9, 19.43, 174.87, '2024-10-13 07:51:07'),
(342, 62, 6, 9, 9.92, 89.28, '2024-10-13 07:51:07'),
(343, 62, 27, 9, 9.85, 88.65, '2024-10-13 07:51:07'),
(344, 63, 26, 5, 17.57, 87.85, '2024-10-13 07:51:07'),
(345, 64, 22, 2, 16.52, 33.04, '2024-10-13 07:51:07'),
(346, 64, 5, 3, 1.01, 3.03, '2024-10-13 07:51:07'),
(347, 64, 9, 8, 9.88, 79.04, '2024-10-13 07:51:07'),
(348, 64, 6, 6, 16.28, 97.68, '2024-10-13 07:51:07'),
(349, 64, 2, 4, 8.03, 32.12, '2024-10-13 07:51:07'),
(350, 64, 10, 8, 13.31, 106.48, '2024-10-13 07:51:07'),
(351, 64, 28, 4, 10.57, 42.28, '2024-10-13 07:51:07'),
(352, 64, 8, 6, 4.47, 26.82, '2024-10-13 07:51:07'),
(353, 64, 19, 9, 2.42, 21.78, '2024-10-13 07:51:07'),
(354, 64, 20, 8, 9.59, 76.72, '2024-10-13 07:51:07'),
(355, 65, 29, 4, 19.09, 76.36, '2024-10-13 07:51:07'),
(356, 65, 25, 5, 12.87, 64.35, '2024-10-13 07:51:07'),
(357, 65, 4, 8, 13.19, 105.52, '2024-10-13 07:51:07'),
(358, 65, 15, 6, 10.26, 61.56, '2024-10-13 07:51:07'),
(359, 65, 7, 3, 7.79, 23.37, '2024-10-13 07:51:07'),
(360, 65, 22, 7, 11.94, 83.58, '2024-10-13 07:51:07'),
(361, 65, 16, 2, 13, 26, '2024-10-13 07:51:07'),
(362, 65, 37, 7, 9.29, 65.03, '2024-10-13 07:51:07'),
(363, 65, 6, 5, 14.86, 74.3, '2024-10-13 07:51:07'),
(364, 66, 25, 10, 3.81, 38.1, '2024-10-13 07:51:07'),
(365, 66, 15, 9, 18.18, 163.62, '2024-10-13 07:51:07'),
(366, 66, 33, 3, 1.16, 3.48, '2024-10-13 07:51:07'),
(367, 66, 12, 6, 3.17, 19.02, '2024-10-13 07:51:07'),
(368, 66, 5, 2, 9.29, 18.58, '2024-10-13 07:51:07'),
(369, 66, 9, 3, 6.48, 19.44, '2024-10-13 07:51:07'),
(370, 66, 18, 3, 6.32, 18.96, '2024-10-13 07:51:07'),
(371, 66, 12, 6, 7.18, 43.08, '2024-10-13 07:51:07'),
(372, 66, 21, 3, 1.72, 5.16, '2024-10-13 07:51:07'),
(373, 66, 17, 2, 4.88, 9.76, '2024-10-13 07:51:07'),
(374, 67, 30, 2, 12.81, 25.62, '2024-10-13 07:51:07'),
(375, 67, 19, 7, 16.14, 112.98, '2024-10-13 07:51:07'),
(376, 67, 9, 2, 6.58, 13.16, '2024-10-13 07:51:07'),
(377, 67, 5, 8, 10.2, 81.6, '2024-10-13 07:51:07'),
(378, 67, 13, 3, 6.34, 19.02, '2024-10-13 07:51:07'),
(379, 67, 22, 5, 8.46, 42.3, '2024-10-13 07:51:07'),
(380, 67, 8, 7, 7.22, 50.54, '2024-10-13 07:51:07'),
(381, 67, 17, 5, 19.27, 96.35, '2024-10-13 07:51:07'),
(382, 67, 11, 4, 16.69, 66.76, '2024-10-13 07:51:07'),
(383, 68, 21, 8, 13.09, 104.72, '2024-10-13 07:51:07'),
(384, 68, 11, 9, 13.65, 122.85, '2024-10-13 07:51:07'),
(385, 68, 36, 10, 18.61, 186.1, '2024-10-13 07:51:07'),
(386, 68, 5, 3, 7.84, 23.52, '2024-10-13 07:51:07'),
(387, 68, 17, 4, 6.57, 26.28, '2024-10-13 07:51:07'),
(388, 68, 12, 1, 13.89, 13.89, '2024-10-13 07:51:07'),
(389, 68, 36, 3, 13.62, 40.86, '2024-10-13 07:51:07'),
(390, 68, 15, 8, 14.95, 119.6, '2024-10-13 07:51:07'),
(391, 68, 16, 8, 15.3, 122.4, '2024-10-13 07:51:07'),
(392, 68, 1, 6, 4.73, 28.38, '2024-10-13 07:51:07'),
(393, 69, 36, 8, 3.17, 25.36, '2024-10-13 07:51:07'),
(394, 69, 24, 4, 1.61, 6.44, '2024-10-13 07:51:07'),
(395, 69, 4, 8, 11.04, 88.32, '2024-10-13 07:51:07'),
(396, 69, 29, 1, 19.93, 19.93, '2024-10-13 07:51:07'),
(397, 69, 17, 3, 13.52, 40.56, '2024-10-13 07:51:07'),
(398, 69, 19, 8, 11.25, 90, '2024-10-13 07:51:07'),
(399, 69, 13, 6, 10.94, 65.64, '2024-10-13 07:51:07'),
(400, 70, 4, 1, 11.78, 11.78, '2024-10-13 07:51:07'),
(401, 70, 2, 2, 9.73, 19.46, '2024-10-13 07:51:07'),
(402, 70, 13, 10, 16.21, 162.1, '2024-10-13 07:51:07'),
(403, 70, 12, 2, 19.44, 38.88, '2024-10-13 07:51:07'),
(404, 70, 25, 2, 9.99, 19.98, '2024-10-13 07:51:07'),
(405, 71, 31, 5, 6.08, 30.4, '2024-10-13 07:51:07'),
(406, 71, 30, 3, 8.45, 25.35, '2024-10-13 07:51:07'),
(407, 71, 18, 4, 16.13, 64.52, '2024-10-13 07:51:07'),
(408, 71, 17, 6, 10.99, 65.94, '2024-10-13 07:51:07'),
(409, 71, 32, 10, 16.37, 163.7, '2024-10-13 07:51:07'),
(410, 71, 35, 2, 6.57, 13.14, '2024-10-13 07:51:07'),
(411, 72, 11, 6, 3.36, 20.16, '2024-10-13 07:51:07'),
(412, 72, 11, 3, 2.99, 8.97, '2024-10-13 07:51:07'),
(413, 72, 11, 7, 15.48, 108.36, '2024-10-13 07:51:07'),
(414, 73, 6, 3, 12.43, 37.29, '2024-10-13 07:51:07'),
(415, 73, 32, 8, 5.04, 40.32, '2024-10-13 07:51:07'),
(416, 73, 6, 6, 4.27, 25.62, '2024-10-13 07:51:07'),
(417, 73, 4, 6, 10.18, 61.08, '2024-10-13 07:51:07'),
(418, 73, 19, 10, 7.8, 78, '2024-10-13 07:51:07'),
(419, 73, 12, 8, 13.32, 106.56, '2024-10-13 07:51:07'),
(420, 73, 26, 8, 4.74, 37.92, '2024-10-13 07:51:07'),
(421, 73, 5, 5, 13.59, 67.95, '2024-10-13 07:51:07'),
(422, 73, 14, 10, 16.97, 169.7, '2024-10-13 07:51:07'),
(423, 74, 28, 6, 15.81, 94.86, '2024-10-13 07:51:07'),
(424, 74, 24, 9, 1.13, 10.17, '2024-10-13 07:51:07'),
(425, 74, 34, 7, 6.21, 43.47, '2024-10-13 07:51:07'),
(426, 74, 25, 9, 10.33, 92.97, '2024-10-13 07:51:07'),
(427, 74, 32, 1, 9.88, 9.88, '2024-10-13 07:51:07'),
(428, 74, 12, 3, 15.08, 45.24, '2024-10-13 07:51:07'),
(429, 74, 5, 2, 3.56, 7.12, '2024-10-13 07:51:07'),
(430, 74, 35, 1, 1.77, 1.77, '2024-10-13 07:51:07'),
(431, 74, 19, 10, 11.95, 119.5, '2024-10-13 07:51:07'),
(432, 74, 17, 2, 17.85, 35.7, '2024-10-13 07:51:07'),
(433, 75, 2, 9, 17.13, 154.17, '2024-10-13 07:51:07'),
(434, 75, 3, 4, 6.27, 25.08, '2024-10-13 07:51:07'),
(435, 75, 1, 10, 12.29, 122.9, '2024-10-13 07:51:07'),
(436, 76, 16, 1, 13.07, 13.07, '2024-10-13 07:51:07'),
(437, 76, 25, 5, 4.33, 21.65, '2024-10-13 07:51:07'),
(438, 77, 25, 7, 3.61, 25.27, '2024-10-13 07:51:07'),
(439, 77, 18, 5, 1.61, 8.05, '2024-10-13 07:51:07'),
(440, 77, 22, 10, 13.9, 139, '2024-10-13 07:51:07'),
(441, 77, 21, 8, 1.49, 11.92, '2024-10-13 07:51:07'),
(442, 77, 30, 2, 10.03, 20.06, '2024-10-13 07:51:07'),
(443, 77, 10, 3, 1.9, 5.7, '2024-10-13 07:51:07'),
(444, 77, 25, 8, 2.3, 18.4, '2024-10-13 07:51:07'),
(445, 77, 1, 4, 15.7, 62.8, '2024-10-13 07:51:07'),
(446, 77, 29, 8, 9.67, 77.36, '2024-10-13 07:51:07'),
(447, 77, 22, 3, 16.86, 50.58, '2024-10-13 07:51:07'),
(448, 78, 28, 4, 10.48, 41.92, '2024-10-13 07:51:07'),
(449, 78, 9, 7, 3.74, 26.18, '2024-10-13 07:51:07'),
(450, 78, 35, 9, 13.48, 121.32, '2024-10-13 07:51:07'),
(451, 78, 3, 5, 4.78, 23.9, '2024-10-13 07:51:07'),
(452, 79, 6, 6, 3.97, 23.82, '2024-10-13 07:51:07'),
(453, 79, 27, 8, 3.61, 28.88, '2024-10-13 07:51:07'),
(454, 79, 32, 6, 19.23, 115.38, '2024-10-13 07:51:07'),
(455, 79, 1, 2, 10.38, 20.76, '2024-10-13 07:51:07'),
(456, 79, 5, 4, 4.46, 17.84, '2024-10-13 07:51:07'),
(457, 79, 3, 1, 4.21, 4.21, '2024-10-13 07:51:07'),
(458, 79, 13, 3, 6.76, 20.28, '2024-10-13 07:51:07'),
(459, 79, 4, 8, 7.54, 60.32, '2024-10-13 07:51:07'),
(460, 79, 34, 5, 10.13, 50.65, '2024-10-13 07:51:07'),
(461, 79, 35, 10, 5.44, 54.4, '2024-10-13 07:51:07'),
(462, 80, 10, 9, 5.78, 52.02, '2024-10-13 07:51:07'),
(463, 80, 36, 2, 16.75, 33.5, '2024-10-13 07:51:07'),
(464, 81, 34, 7, 8.17, 57.19, '2024-10-13 07:51:07'),
(465, 81, 29, 5, 8.47, 42.35, '2024-10-13 07:51:07'),
(466, 81, 22, 3, 15.53, 46.59, '2024-10-13 07:51:07'),
(467, 81, 8, 4, 8.67, 34.68, '2024-10-13 07:51:07'),
(468, 81, 6, 7, 16.82, 117.74, '2024-10-13 07:51:07'),
(469, 81, 34, 8, 12.9, 103.2, '2024-10-13 07:51:07'),
(470, 82, 13, 1, 5.34, 5.34, '2024-10-13 07:51:07'),
(471, 82, 8, 3, 1.4, 4.2, '2024-10-13 07:51:07'),
(472, 82, 33, 7, 18.08, 126.56, '2024-10-13 07:51:07'),
(473, 82, 23, 3, 2.19, 6.57, '2024-10-13 07:51:07'),
(474, 83, 31, 4, 18.25, 73, '2024-10-13 07:51:07'),
(475, 83, 20, 6, 7.59, 45.54, '2024-10-13 07:51:07'),
(476, 83, 9, 9, 6.17, 55.53, '2024-10-13 07:51:07'),
(477, 83, 19, 6, 1.88, 11.28, '2024-10-13 07:51:07'),
(478, 84, 32, 1, 4.94, 4.94, '2024-10-13 07:51:07'),
(479, 85, 10, 8, 12.99, 103.92, '2024-10-13 07:51:07'),
(480, 85, 7, 10, 2.72, 27.2, '2024-10-13 07:51:07'),
(481, 85, 25, 10, 3.91, 39.1, '2024-10-13 07:51:07'),
(482, 85, 28, 9, 7.7, 69.3, '2024-10-13 07:51:07'),
(483, 85, 18, 5, 8.16, 40.8, '2024-10-13 07:51:07'),
(484, 85, 4, 2, 15.78, 31.56, '2024-10-13 07:51:07'),
(485, 85, 22, 2, 12.48, 24.96, '2024-10-13 07:51:07'),
(486, 85, 29, 1, 18.15, 18.15, '2024-10-13 07:51:07'),
(487, 86, 19, 3, 18.95, 56.85, '2024-10-13 07:51:07'),
(488, 86, 36, 7, 5.44, 38.08, '2024-10-13 07:51:07'),
(489, 86, 33, 5, 15.23, 76.15, '2024-10-13 07:51:07'),
(490, 87, 4, 5, 8.6, 43, '2024-10-13 07:51:07'),
(491, 87, 30, 1, 16.38, 16.38, '2024-10-13 07:51:07'),
(492, 87, 2, 1, 8.57, 8.57, '2024-10-13 07:51:07'),
(493, 87, 18, 4, 3.39, 13.56, '2024-10-13 07:51:07'),
(494, 87, 30, 4, 14.01, 56.04, '2024-10-13 07:51:07'),
(495, 87, 36, 4, 16.54, 66.16, '2024-10-13 07:51:07'),
(496, 87, 14, 6, 3.44, 20.64, '2024-10-13 07:51:07'),
(497, 87, 3, 8, 9.52, 76.16, '2024-10-13 07:51:07'),
(498, 88, 27, 8, 17.69, 141.52, '2024-10-13 07:51:07'),
(499, 88, 5, 3, 2.99, 8.97, '2024-10-13 07:51:07'),
(500, 88, 10, 2, 11.2, 22.4, '2024-10-13 07:51:07'),
(501, 88, 23, 5, 19.02, 95.1, '2024-10-13 07:51:07'),
(502, 88, 19, 7, 16, 112, '2024-10-13 07:51:07'),
(503, 88, 31, 10, 12.32, 123.2, '2024-10-13 07:51:07'),
(504, 88, 22, 9, 4.97, 44.73, '2024-10-13 07:51:07'),
(505, 88, 11, 8, 12.99, 103.92, '2024-10-13 07:51:07'),
(506, 89, 37, 2, 5.99, 11.98, '2024-10-13 07:51:07'),
(507, 89, 36, 2, 17.97, 35.94, '2024-10-13 07:51:07'),
(508, 89, 13, 6, 16.72, 100.32, '2024-10-13 07:51:07'),
(509, 89, 32, 8, 11.61, 92.88, '2024-10-13 07:51:07'),
(510, 90, 20, 3, 5.47, 16.41, '2024-10-13 07:51:07'),
(511, 90, 19, 8, 13.1, 104.8, '2024-10-13 07:51:07'),
(512, 90, 3, 8, 6.15, 49.2, '2024-10-13 07:51:07'),
(513, 90, 26, 10, 17.96, 179.6, '2024-10-13 07:51:07'),
(514, 90, 21, 3, 8.65, 25.95, '2024-10-13 07:51:07'),
(515, 90, 22, 8, 13.73, 109.84, '2024-10-13 07:51:07'),
(516, 90, 2, 6, 17.36, 104.16, '2024-10-13 07:51:07'),
(517, 90, 31, 6, 11.89, 71.34, '2024-10-13 07:51:07'),
(518, 91, 10, 9, 2.56, 23.04, '2024-10-13 07:51:07'),
(519, 91, 16, 4, 2.18, 8.72, '2024-10-13 07:51:07'),
(520, 91, 13, 5, 12.83, 64.15, '2024-10-13 07:51:07'),
(521, 91, 25, 3, 2.3, 6.9, '2024-10-13 07:51:07'),
(522, 91, 28, 5, 18.01, 90.05, '2024-10-13 07:51:07'),
(523, 91, 30, 9, 4.08, 36.72, '2024-10-13 07:51:07'),
(524, 92, 3, 9, 1.93, 17.37, '2024-10-13 07:51:07'),
(525, 92, 31, 5, 8.7, 43.5, '2024-10-13 07:51:07'),
(526, 92, 7, 3, 10.71, 32.13, '2024-10-13 07:51:07'),
(527, 92, 21, 4, 5.9, 23.6, '2024-10-13 07:51:07'),
(528, 92, 16, 2, 17.61, 35.22, '2024-10-13 07:51:07'),
(529, 92, 33, 2, 1.7, 3.4, '2024-10-13 07:51:07'),
(530, 92, 1, 7, 9.27, 64.89, '2024-10-13 07:51:07'),
(531, 92, 16, 7, 7.2, 50.4, '2024-10-13 07:51:07'),
(532, 93, 17, 7, 18.78, 131.46, '2024-10-13 07:51:07'),
(533, 93, 30, 9, 2.75, 24.75, '2024-10-13 07:51:07'),
(534, 93, 35, 10, 16.54, 165.4, '2024-10-13 07:51:07'),
(535, 93, 32, 9, 12.92, 116.28, '2024-10-13 07:51:07'),
(536, 93, 22, 6, 13.16, 78.96, '2024-10-13 07:51:07'),
(537, 93, 1, 6, 13.15, 78.9, '2024-10-13 07:51:07'),
(538, 93, 2, 5, 8.35, 41.75, '2024-10-13 07:51:07'),
(539, 93, 37, 9, 3.4, 30.6, '2024-10-13 07:51:07'),
(540, 93, 33, 7, 19.46, 136.22, '2024-10-13 07:51:07'),
(541, 94, 20, 8, 4.56, 36.48, '2024-10-13 07:51:07'),
(542, 94, 9, 6, 17.85, 107.1, '2024-10-13 07:51:07'),
(543, 94, 19, 10, 3.06, 30.6, '2024-10-13 07:51:07'),
(544, 94, 20, 10, 18.68, 186.8, '2024-10-13 07:51:07'),
(545, 94, 17, 7, 14.64, 102.48, '2024-10-13 07:51:07'),
(546, 95, 9, 1, 3.32, 3.32, '2024-10-13 07:51:07'),
(547, 95, 1, 4, 12.99, 51.96, '2024-10-13 07:51:07'),
(548, 95, 20, 6, 1.02, 6.12, '2024-10-13 07:51:07'),
(549, 95, 12, 8, 7.86, 62.88, '2024-10-13 07:51:07'),
(550, 95, 28, 2, 8.27, 16.54, '2024-10-13 07:51:07'),
(551, 95, 31, 1, 4.41, 4.41, '2024-10-13 07:51:07'),
(552, 96, 34, 8, 8.74, 69.92, '2024-10-13 07:51:07'),
(553, 96, 16, 10, 15.96, 159.6, '2024-10-13 07:51:07'),
(554, 97, 18, 5, 18.26, 91.3, '2024-10-13 07:51:07'),
(555, 97, 20, 8, 16.23, 129.84, '2024-10-13 07:51:07'),
(556, 97, 17, 5, 13.72, 68.6, '2024-10-13 07:51:07'),
(557, 97, 15, 5, 4.45, 22.25, '2024-10-13 07:51:07'),
(558, 97, 31, 6, 11.88, 71.28, '2024-10-13 07:51:07'),
(559, 97, 34, 7, 19.64, 137.48, '2024-10-13 07:51:07'),
(560, 97, 22, 4, 11.35, 45.4, '2024-10-13 07:51:07'),
(561, 97, 9, 6, 18.68, 112.08, '2024-10-13 07:51:08'),
(562, 98, 25, 2, 7.95, 15.9, '2024-10-13 07:51:08'),
(563, 98, 33, 1, 16.42, 16.42, '2024-10-13 07:51:08'),
(564, 98, 26, 5, 13.38, 66.9, '2024-10-13 07:51:08'),
(565, 98, 4, 2, 8.14, 16.28, '2024-10-13 07:51:08'),
(566, 98, 14, 7, 8.4, 58.8, '2024-10-13 07:51:08'),
(567, 99, 31, 4, 4.07, 16.28, '2024-10-13 07:51:08'),
(568, 100, 34, 10, 5.6, 56, '2024-10-13 07:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Qəbul edildi'),
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
  `executor_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `type_id` int DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `executor_id`, `order_id`, `customer_id`, `type_id`, `amount`, `note`, `created_at`) VALUES
(1, 97, 100, 74, 1, 10, 'Borc ödəniş edildi.', '2024-10-13 10:08:44'),
(2, 97, 100, 74, 1, 10, 'Borc ödənişi edildi. Borc sıfırlandı.', '2024-10-13 10:09:20'),
(3, 97, NULL, 74, 2, 4, 'SFR13102024000100 kodlu sifariş ödənişindən artıq qalan vəsait.', '2024-10-13 10:09:20'),
(4, 97, 99, 74, 1, 20, 'Borc ödənişi edildi. Borc sıfırlandı.', '2024-10-13 10:12:26'),
(5, 97, NULL, 74, 2, 3.72, 'SFR13102024000099 kodlu sifariş ödənişindən artıq qalan vəsait.', '2024-10-13 10:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`) VALUES
(1, 'Borc ödənişi'),
(2, 'Balans artımı'),
(3, 'Balansdan çıxarış'),
(4, 'Tədarükçü ödənişi');

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
(1, 4, '097-997-12-13'),
(2, 4, '060-647-07-95'),
(3, 4, '004-343-48-47'),
(4, 4, '049-227-40-80'),
(5, 4, '069-290-52-10'),
(6, 5, '038-222-24-66'),
(7, 5, '090-324-11-49'),
(8, 6, '092-347-81-26'),
(9, 6, '004-137-43-55'),
(10, 6, '009-881-20-59'),
(11, 6, '029-505-72-19'),
(12, 6, '051-008-37-19'),
(13, 7, '010-729-02-54'),
(14, 7, '035-881-45-38'),
(15, 8, '004-722-27-67'),
(16, 8, '062-788-77-63'),
(17, 8, '037-227-62-31'),
(18, 8, '039-419-67-03'),
(19, 8, '079-891-78-44'),
(20, 9, '086-736-42-98'),
(21, 9, '024-170-51-23'),
(22, 9, '047-953-12-38'),
(23, 10, '092-709-74-48'),
(24, 10, '098-575-07-14'),
(25, 10, '071-915-51-98'),
(26, 11, '029-302-70-70'),
(27, 11, '044-142-04-24'),
(28, 11, '074-937-18-68'),
(29, 11, '056-129-30-98'),
(30, 11, '068-090-81-79'),
(31, 12, '058-848-49-79'),
(32, 12, '014-942-03-86'),
(33, 12, '066-287-97-09'),
(34, 13, '071-969-80-07'),
(35, 14, '051-983-78-70'),
(36, 14, '029-898-57-16'),
(37, 14, '056-716-14-42'),
(38, 14, '006-687-39-40'),
(39, 14, '068-763-91-54'),
(40, 15, '012-840-19-21'),
(41, 16, '014-058-62-60'),
(42, 17, '068-113-46-81'),
(43, 17, '011-575-33-12'),
(44, 17, '052-629-26-23'),
(45, 17, '021-474-33-27'),
(46, 17, '081-903-64-10'),
(47, 18, '092-069-73-43'),
(48, 18, '073-354-08-68'),
(49, 19, '020-331-19-61'),
(50, 19, '025-948-97-47'),
(51, 20, '020-559-98-48'),
(52, 20, '058-369-76-51'),
(53, 20, '069-144-50-72'),
(54, 21, '000-587-75-62'),
(55, 21, '002-013-30-45'),
(56, 21, '061-786-90-85'),
(57, 21, '020-396-04-93'),
(58, 21, '030-097-79-09'),
(59, 22, '093-305-22-31'),
(60, 22, '085-580-48-87'),
(61, 23, '036-069-73-10'),
(62, 23, '024-727-91-20'),
(63, 23, '088-098-41-83'),
(64, 23, '080-848-01-95'),
(65, 23, '084-590-12-98'),
(66, 24, '082-503-79-60'),
(67, 24, '042-610-54-21'),
(68, 25, '040-782-48-10'),
(69, 25, '023-908-83-46'),
(70, 25, '049-883-57-97'),
(71, 26, '009-354-34-67'),
(72, 26, '063-452-35-31'),
(73, 26, '045-331-32-52'),
(74, 26, '062-540-34-58'),
(75, 26, '089-792-36-93'),
(76, 27, '021-625-68-33'),
(77, 27, '013-929-63-68'),
(78, 27, '064-789-49-04'),
(79, 28, '012-817-68-73'),
(80, 28, '044-564-12-98'),
(81, 29, '093-572-28-39'),
(82, 29, '053-818-79-32'),
(83, 29, '088-584-32-16'),
(84, 29, '095-552-29-70'),
(85, 29, '058-054-02-88'),
(86, 30, '018-306-73-38'),
(87, 30, '058-403-71-54'),
(88, 30, '038-033-64-56'),
(89, 30, '005-962-96-84'),
(90, 31, '083-350-99-92'),
(91, 31, '006-729-46-01'),
(92, 31, '091-573-28-32'),
(93, 32, '070-238-93-22'),
(94, 33, '091-520-11-78'),
(95, 33, '022-872-10-69'),
(96, 34, '010-108-88-01'),
(97, 34, '034-931-13-46'),
(98, 34, '043-443-79-43'),
(99, 34, '038-045-48-42'),
(100, 35, '083-822-93-25'),
(101, 35, '071-078-07-46'),
(102, 35, '041-411-65-69'),
(103, 35, '038-804-70-22'),
(104, 35, '049-245-99-98'),
(105, 36, '028-783-80-54'),
(106, 36, '001-360-35-71'),
(107, 36, '047-084-64-04'),
(108, 37, '038-339-66-28'),
(109, 37, '022-358-52-46'),
(110, 37, '065-330-99-77'),
(111, 38, '076-849-18-62'),
(112, 38, '032-419-18-78'),
(113, 38, '007-791-90-09'),
(114, 38, '052-332-37-96'),
(115, 39, '019-987-98-30'),
(116, 39, '091-612-89-21'),
(117, 39, '090-550-18-31'),
(118, 40, '025-441-17-87'),
(119, 40, '035-530-60-95'),
(120, 41, '076-477-15-47'),
(121, 41, '030-223-52-02'),
(122, 41, '078-572-44-03'),
(123, 41, '094-102-76-43'),
(124, 42, '008-891-94-47'),
(125, 42, '086-692-15-14'),
(126, 42, '040-890-24-65'),
(127, 43, '061-351-16-43'),
(128, 43, '073-579-82-61'),
(129, 44, '034-504-28-41'),
(130, 44, '021-552-17-44'),
(131, 45, '038-559-12-33'),
(132, 45, '030-538-96-12'),
(133, 45, '047-986-64-63'),
(134, 46, '064-379-51-64'),
(135, 46, '066-363-88-62'),
(136, 47, '039-065-92-36'),
(137, 47, '003-309-77-43'),
(138, 47, '063-937-20-87'),
(139, 47, '083-091-72-27'),
(140, 48, '011-358-63-52'),
(141, 49, '075-927-23-58'),
(142, 49, '070-827-55-91'),
(143, 50, '047-451-19-63'),
(144, 50, '055-818-83-70'),
(145, 50, '074-600-08-08'),
(146, 50, '003-151-60-29'),
(147, 50, '056-299-78-23'),
(148, 51, '008-758-46-40'),
(149, 51, '063-118-30-84'),
(150, 51, '039-611-42-10'),
(151, 51, '094-780-88-88'),
(152, 52, '036-648-67-18'),
(153, 52, '034-082-10-96'),
(154, 52, '022-158-07-39'),
(155, 52, '022-918-01-00'),
(156, 53, '044-410-88-38'),
(157, 53, '049-117-48-19'),
(158, 53, '071-829-95-06'),
(159, 54, '022-581-84-18'),
(160, 54, '090-189-48-36'),
(161, 54, '078-370-90-83'),
(162, 54, '057-031-77-40'),
(163, 55, '008-190-32-62'),
(164, 55, '000-509-97-27'),
(165, 56, '002-721-05-06'),
(166, 57, '073-409-68-80'),
(167, 57, '090-549-02-42'),
(168, 57, '012-199-12-85'),
(169, 57, '044-437-78-36'),
(170, 57, '012-905-19-02'),
(171, 58, '019-875-05-54'),
(172, 58, '060-473-70-93'),
(173, 59, '044-747-92-97'),
(174, 59, '078-520-99-28'),
(175, 59, '021-091-76-76'),
(176, 59, '008-624-10-52'),
(177, 60, '007-574-96-98'),
(178, 60, '004-569-64-69'),
(179, 60, '027-773-17-78'),
(180, 60, '088-295-28-17'),
(181, 61, '068-847-32-72'),
(182, 61, '009-102-62-25'),
(183, 61, '031-456-82-78'),
(184, 61, '028-252-63-24'),
(185, 61, '036-848-58-67'),
(186, 62, '002-395-09-48'),
(187, 62, '046-516-27-84'),
(188, 63, '026-414-03-64'),
(189, 63, '062-390-73-83'),
(190, 63, '026-994-14-36'),
(191, 64, '087-070-50-49'),
(192, 65, '022-605-64-21'),
(193, 65, '037-542-53-43'),
(194, 65, '077-704-39-69'),
(195, 65, '094-416-43-21'),
(196, 65, '005-405-24-49'),
(197, 66, '061-905-19-05'),
(198, 66, '005-103-63-17'),
(199, 66, '054-211-48-05'),
(200, 66, '086-749-30-84'),
(201, 66, '059-617-59-45'),
(202, 67, '041-006-85-87'),
(203, 67, '031-130-34-97'),
(204, 68, '020-858-35-07'),
(205, 68, '035-494-06-79'),
(206, 68, '023-970-44-70'),
(207, 69, '077-001-14-99'),
(208, 69, '064-357-04-65'),
(209, 70, '047-697-79-20'),
(210, 71, '020-589-30-48'),
(211, 71, '092-514-83-25'),
(212, 71, '078-729-62-10'),
(213, 72, '079-620-08-48'),
(214, 72, '080-518-82-32'),
(215, 72, '058-379-96-21'),
(216, 73, '087-837-81-06'),
(217, 73, '068-593-44-83'),
(218, 73, '022-798-36-34'),
(219, 73, '099-591-75-75'),
(220, 74, '096-145-41-06'),
(221, 74, '063-877-32-61'),
(222, 74, '091-742-63-77'),
(223, 74, '027-352-56-81'),
(224, 75, '085-474-03-53'),
(225, 75, '053-853-92-87'),
(226, 76, '045-441-72-42'),
(227, 77, '029-899-79-80'),
(228, 77, '023-487-02-27'),
(229, 77, '056-148-27-31'),
(230, 77, '099-335-51-84'),
(231, 78, '078-822-15-63'),
(232, 79, '072-234-78-63'),
(233, 80, '058-841-15-05'),
(234, 80, '000-094-97-28'),
(235, 81, '018-587-05-03'),
(236, 81, '033-886-83-71'),
(237, 82, '089-897-47-44'),
(238, 83, '094-850-04-71'),
(239, 83, '038-866-72-88'),
(240, 84, '034-172-15-98'),
(241, 84, '020-335-01-08'),
(242, 84, '002-008-01-82'),
(243, 85, '011-907-69-97'),
(244, 85, '058-246-84-27'),
(245, 85, '021-686-53-21'),
(246, 85, '010-386-45-12'),
(247, 86, '051-903-16-33'),
(248, 86, '037-380-81-28'),
(249, 86, '035-309-61-24'),
(250, 87, '029-728-04-72'),
(251, 87, '099-708-98-21'),
(252, 87, '016-173-31-23'),
(253, 87, '075-384-94-00'),
(254, 87, '037-300-77-15'),
(255, 88, '053-710-51-22'),
(256, 88, '096-879-05-58'),
(257, 89, '050-883-94-71'),
(258, 89, '087-740-14-75'),
(259, 89, '099-662-57-78'),
(260, 90, '093-674-25-13'),
(261, 90, '001-178-14-40'),
(262, 91, '034-854-54-41'),
(263, 91, '054-271-58-42'),
(264, 91, '015-511-08-47'),
(265, 91, '002-271-80-82'),
(266, 91, '056-743-64-15'),
(267, 92, '059-318-37-77'),
(268, 92, '073-608-16-68'),
(269, 92, '065-460-90-44'),
(270, 93, '035-998-90-61'),
(271, 93, '052-875-31-17'),
(272, 93, '023-318-78-41'),
(273, 93, '008-278-92-63'),
(274, 94, '041-413-83-46'),
(275, 94, '035-755-90-08'),
(276, 94, '079-964-28-86'),
(277, 94, '076-006-59-45'),
(278, 94, '070-403-24-58'),
(279, 95, '042-138-19-88'),
(280, 96, '010-361-39-71'),
(281, 96, '025-233-51-47'),
(282, 96, '022-999-23-70'),
(283, 97, '062-506-36-55'),
(284, 97, '069-336-85-14'),
(285, 97, '038-997-65-23'),
(286, 97, '043-774-02-81'),
(287, 98, '073-860-13-36'),
(288, 98, '049-149-58-32'),
(289, 98, '081-588-36-83'),
(290, 98, '015-119-95-25'),
(291, 99, '019-026-88-50'),
(292, 99, '099-118-55-95'),
(293, 99, '024-645-08-34'),
(294, 99, '047-048-13-86'),
(295, 99, '081-977-98-69'),
(296, 100, '058-432-18-99'),
(297, 100, '073-403-98-57'),
(298, 100, '024-645-38-12'),
(299, 101, '048-875-04-72'),
(300, 101, '053-724-77-10'),
(301, 101, '085-645-69-52'),
(302, 101, '007-550-82-10'),
(303, 102, '045-074-35-64'),
(304, 102, '020-112-93-59'),
(305, 102, '064-905-89-81'),
(306, 103, '084-406-97-19'),
(307, 103, '045-945-91-17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `min_price` float DEFAULT NULL,
  `max_price` float DEFAULT NULL,
  `visible` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `min_price`, `max_price`, `visible`) VALUES
(1, 'Məhsul 1', 2, 5, 1),
(2, 'Mehsul test 2', 15, 25, 0),
(3, 'Mehsul test 2', 15, 25, 1),
(4, 'Mehsul test 2', 15, 25, 1),
(5, 'Mehsul test 234adasd', 15, 25, 0),
(6, 'Mehsul test 2', 15, 25, 1),
(7, 'Mehsul test 2', 15, 25, 1),
(8, 'Mehsul test 2', 15, 25, 0),
(9, 'Mehsul test 2', 15, 25, 1),
(10, 'Mehsul test 2', 15, 25, 1),
(11, 'Mehsul test 2', 15, 25, 1),
(12, 'Mehsul test 2', 15, 25, 1),
(13, 'Mehsul test 2', 15, 25, 1),
(14, 'Mehsul test 2', 15, 25, 1),
(15, 'Mehsul test 2', 15, 25, 1),
(16, 'Mehsul test 2', 15, 25, 1),
(17, 'Mehsul test 2', 15, 25, 1),
(18, 'Mehsul test 2', 15, 25, 1),
(19, 'Mehsul test 2', 15, 25, 1),
(20, 'Mehsul test 2', 15, 25, 1),
(21, 'Mehsul test 2', 15, 25, 1),
(22, 'Mehsul test 2', 15, 25, 1),
(23, 'Mehsul test 2', 15, 25, 1),
(24, 'Mehsul test 2', 15, 25, 1),
(25, 'Mehsul test 2', 15, 25, 1),
(26, 'Mehsul test 2', 15, 25, 1),
(27, 'Mehsul test 2', 15, 25, 1),
(28, 'Mehsul test 2', 15, 25, 1),
(29, 'Mehsul test 2', 15, 25, 1),
(30, 'Mehsul test 2', 15, 25, 1),
(31, 'Mehsul test 2', 15, 25, 1),
(32, 'Mehsul test 2', 15, 25, 1),
(33, 'Mehsul test 2', 15, 25, 1),
(34, 'Mehsul test 2', 15, 25, 1),
(35, 'Mehsul test 2', 15, 25, 1),
(36, 'Mehsul test 2', 15, 25, 1),
(37, 'Mehsul test 2', 15, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
('7QQRahHbnTWBmeYg9b75GV2af4tW2J0cthsG6yKd', 97, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibjJWYUNDTWdZQTFhR1U5ZmxVNUtUcmZoYjRGTFhTMWVlWXVIOEdTTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VyL2Rhc2hib2FyZD9wYWdlPTMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5Nzt9', 1728822484);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role_id` int DEFAULT '2',
  `remember_token` varchar(255) DEFAULT NULL,
  `debt` float DEFAULT '0',
  `remnant` float DEFAULT '0',
  `balance` float DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `remember_token`, `debt`, `remnant`, `balance`, `created_at`, `updated_at`) VALUES
(1, 'Ədalət Məmmədli', 1, NULL, 0, 0, 0, '2024-10-11 02:33:29', NULL),
(4, 'Dr. Marc Luettgen', 2, NULL, 1164.13, 0, 305.77, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(5, 'Dr. Daija Turcotte', 3, NULL, 0, 755.46, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(6, 'Lyla O\'Reilly', 2, NULL, 326.36, 0, 270.93, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(7, 'Mr. Anthony McDermott I', 3, NULL, 0, 253.88, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(8, 'Ms. Marge Deckow IV', 3, NULL, 0, 58.97, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(9, 'Susanna Von', 3, NULL, 0, 515.92, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(10, 'Ellen Bosco I', 3, NULL, 0, 402.1, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(11, 'Antwon McLaughlin Jr.', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(12, 'Mrs. Bria Borer', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(13, 'Betty Stroman', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(14, 'Miss Ernestina Hahn MD', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(15, 'Karley Gleichner', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(16, 'Jamie Mraz', 2, NULL, 2205.35, 0, 289.54, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(17, 'Dee Kassulke DDS', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(18, 'Petra Larkin', 2, NULL, 1223.12, 0, 18.32, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(19, 'Prof. Izabella Runolfsdottir', 2, NULL, 846.44, 0, 294, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(20, 'Dominic Kunze', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(21, 'Brionna Harvey', 3, NULL, 0, 367.86, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(22, 'Brown Cartwright', 3, NULL, 0, 319.41, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(23, 'Jeramy Schuppe', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(24, 'Linda Kovacek', 2, NULL, 2473, 0, 362.32, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(25, 'Kyleigh Spinka', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(26, 'Zander Russel', 2, NULL, 2406.28, 0, 157.95, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(27, 'Alexzander Parker MD', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(28, 'Ray Reynolds', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(29, 'Mrs. Hettie Friesen', 2, NULL, 830.92, 0, 93, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(30, 'Miss Annabell Hermiston DVM', 3, NULL, 0, 793.97, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(31, 'Johann Howe', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(32, 'Maximus Purdy', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(33, 'Wilmer Braun', 3, NULL, 0, 824.24, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(34, 'Reva Reilly', 3, NULL, 0, 783.4, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(35, 'Francisco Cronin IV', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(36, 'Kraig Dickens V', 3, NULL, 0, 350.76, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(37, 'Eliane Hettinger', 3, NULL, 0, 842.33, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(38, 'Deon Bins', 3, NULL, 0, 951.69, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(39, 'Hershel Larson', 2, NULL, 396.58, 0, 329.01, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(40, 'Lue Langosh', 2, NULL, 1297.3, 0, 13.93, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(41, 'Mr. Deron Adams Jr.', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(42, 'Prof. Evie Gusikowski', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(43, 'Ella Grant', 2, NULL, 2602.97, 0, 36.18, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(44, 'Mrs. Sarah Watsica', 2, NULL, 1730.17, 0, 74.14, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(45, 'Clifford Hansen', 3, NULL, 0, 355.89, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(46, 'Beau Schuster', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(47, 'Clifton O\'Conner', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(48, 'Kyle Mertz', 3, NULL, 0, 631.62, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(49, 'Lenore Bartell Jr.', 3, NULL, 0, 397.01, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(50, 'Lucinda Senger', 3, NULL, 0, 766.06, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(51, 'Kavon McGlynn', 2, NULL, 2201.74, 0, 310.59, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(52, 'Courtney Moen MD', 2, NULL, 1270.49, 0, 162.92, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(53, 'Casandra Hayes', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(54, 'Luciano Paucek II', 2, NULL, 1685.2, 0, 111.59, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(55, 'Cary Watsica', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(56, 'Rowan Mills', 3, NULL, 0, 152.34, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(57, 'Hugh Jacobs', 3, NULL, 0, 678.16, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(58, 'Prof. Josue Rice I', 3, NULL, 0, 640.32, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(59, 'Dr. Reynold Ritchie II', 2, NULL, 597.56, 0, 148.92, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(60, 'Hazel O\'Reilly', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(61, 'Conner Streich', 3, NULL, 0, 674, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(62, 'Benton Welch', 3, NULL, 0, 668.69, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(63, 'Jordyn Schmeler', 2, NULL, 1459.05, 0, 160.85, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(64, 'Carlo Simonis', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(65, 'Vickie Daniel', 2, NULL, 1998.4, 0, 328.23, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(66, 'Jaunita Crona', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(67, 'Pierce Swaniawski', 3, NULL, 0, 194.64, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(68, 'Oran Purdy', 3, NULL, 0, 457.05, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(69, 'Sheldon Walsh III', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(70, 'Eric Osinski', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(71, 'Reggie McLaughlin', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(72, 'Keshaun Renner', 3, NULL, 0, 852.4, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(73, 'Annette Quitzon DVM', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(74, 'Jarod Towne Sr.', 2, NULL, 667.01, 0, 314.66, '2024-10-12 17:34:57', '2024-10-13 10:12:26'),
(75, 'Shana Cremin', 2, NULL, 474.85, 0, 356.48, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(76, 'Julio Larson', 2, NULL, 1918.29, 0, 171.95, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(77, 'Mustafa Brakus', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(78, 'Dr. Nedra Bartoletti PhD', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(79, 'Dr. Makenzie Rice I', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(80, 'Van Satterfield', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(81, 'Armani O\'Kon', 2, NULL, 1236.35, 0, 117.64, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(82, 'Ms. Theodora Haley', 2, NULL, 1208.96, 0, 336.11, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(83, 'Prof. Antwan Howe', 2, NULL, 529.34, 0, 125.77, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(84, 'Mr. Cruz Haag DVM', 2, NULL, 875.14, 0, 287.65, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(85, 'Guy Heidenreich', 2, NULL, 1607.32, 0, 148.15, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(86, 'Prof. William Marks III', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(87, 'Dario Terry', 2, NULL, 1667.25, 0, 173.2, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(88, 'Hassie Mills', 3, NULL, 0, 340.23, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(89, 'Therese Predovic', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(90, 'Joan Schmidt', 3, NULL, 0, 954.36, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(91, 'Jaeden Cruickshank', 3, NULL, 0, 754.73, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(92, 'Julio Ryan DVM', 3, NULL, 0, 211.51, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(93, 'Miss Bettie Stoltenberg PhD', 3, NULL, 0, 195.58, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(94, 'Judson Mitchell III', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(95, 'Aida Kulas', 3, NULL, 0, 685.23, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(96, 'Godfrey Bins', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(97, 'Evangeline Yundt V', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(98, 'Prof. Aiden Kovacek', 3, NULL, 0, 477.05, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(99, 'Hellen Stokes', 3, NULL, 0, 9.31, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(100, 'Clotilde Stark', 2, NULL, 109.34, 0, 38.84, '2024-10-12 17:34:57', '2024-10-13 07:55:07'),
(101, 'Shirley Altenwerth Jr.', 1, NULL, 0, 0, 0, '2024-10-12 17:34:57', '2024-10-12 17:34:57'),
(102, 'Prof. Daniella Kuhn V', 2, NULL, 1233.17, 0, 192.15, '2024-10-12 17:34:58', '2024-10-13 07:55:07'),
(103, 'Ryan Ankunding', 1, NULL, 0, 0, 0, '2024-10-12 17:34:58', '2024-10-12 17:34:58');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

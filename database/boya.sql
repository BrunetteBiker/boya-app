-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2024 at 02:22 PM
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
-- Table structure for table `modify_logs`
--

CREATE TABLE `modify_logs` (
  `id` int NOT NULL,
  `executor_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `payment_id` int DEFAULT NULL,
  `note` longtext,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `modify_logs`
--

INSERT INTO `modify_logs` (`id`, `executor_id`, `user_id`, `order_id`, `payment_id`, `note`, `created_at`) VALUES
(1, 1, 6, NULL, NULL, 'İstifadəçi məlumatları üzərində düzəliş edildi', '2024-10-14 11:51:34'),
(2, 1, 6, NULL, NULL, 'İstifadəçi məlumatları üzərində düzəliş edildi', '2024-10-14 11:52:11'),
(3, 1, 3, NULL, NULL, 'İstifadəçi məlumatları üzərində düzəliş edildi', '2024-10-14 14:08:58'),
(4, 1, 3, NULL, NULL, 'İstifadəçi məlumatları üzərində düzəliş edildi', '2024-10-14 14:09:14'),
(5, 1, 3, NULL, NULL, 'İstifadəçi məlumatları üzərində düzəliş edildi', '2024-10-14 14:10:28'),
(6, 1, 3, NULL, NULL, 'İstifadəçi məlumatları üzərində düzəliş edildi', '2024-10-14 14:10:36'),
(7, 1, 3, NULL, NULL, 'İstifadəçi məlumatları üzərində düzəliş edildi', '2024-10-14 14:10:44');

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
(1, 1, 3, NULL, 0, NULL, 1, 100, 0, NULL, '2024-10-14 12:05:50', '2024-10-14 12:05:50'),
(2, 1, 3, NULL, 0, NULL, 1, 400, 0, NULL, '2024-10-14 12:05:50', '2024-10-14 12:05:50'),
(3, 1, 3, NULL, 0, NULL, 1, 250, 0, NULL, '2024-10-14 12:05:50', '2024-10-14 12:05:50'),
(4, 1, 3, NULL, 0, NULL, 1, 30, 0, NULL, '2024-10-14 12:05:50', '2024-10-14 12:05:50');

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
  `note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `executor_id`, `order_id`, `customer_id`, `type_id`, `amount`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 6, NULL, NULL, NULL, '2024-10-14 11:55:41', '2024-10-14 11:55:41'),
(2, 1, NULL, 6, 2, 1000, NULL, '2024-10-14 12:01:42', '2024-10-14 12:01:42'),
(3, 1, NULL, 6, 3, 200, NULL, '2024-10-14 12:01:53', '2024-10-14 12:01:53'),
(4, 1, NULL, 6, 4, 1300, NULL, '2024-10-14 12:02:04', '2024-10-14 12:02:04'),
(5, 1, NULL, 6, 5, 1200, NULL, '2024-10-14 12:04:19', '2024-10-14 12:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`) VALUES
(1, 'Borc ödənişi'),
(2, 'Balans artımı'),
(3, 'Balansdan çıxarış'),
(4, 'Tədarükçü ödənişi'),
(5, 'Digər borc artımı');

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
(6, 5, '038-222-24-66'),
(7, 5, '090-324-11-49'),
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
(307, 103, '045-945-91-17'),
(313, 4, '054-542-42-77'),
(314, 4, '012-457-22-22'),
(315, 2, '056-454-21-24'),
(317, 4, '056-545-45-45'),
(318, 5, '033-532-15-42'),
(336, 6, '092-347-81-26'),
(337, 6, '004-137-43-55'),
(342, 3, '054-542-12-42');

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
(1, 'Test məhsul 1', 10, 20, 1);

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
('mOsUwRTLk1WvPI0GK0LSIZLdEUwP8L580g9b0S2R', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicURxREdzaFVEWHhRTzZySVg4eHN5bnFvcHpCOWJldVUxVFl4c2RJTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VyL2RldGFpbHMvMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3VzZXIvZGFzaGJvYXJkIjt9fQ==', 1728915723);

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
  `remnant_currency` varchar(255) DEFAULT NULL,
  `balance` float DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `remember_token`, `debt`, `remnant`, `remnant_currency`, `balance`, `created_at`, `updated_at`) VALUES
(1, 'Ədalət Məmmədli', 1, NULL, 0, 0, NULL, 0, '2024-10-14 08:33:55', '2024-10-14 08:33:57'),
(2, 'Ülvi Hüseynov', 2, NULL, 0, 0, NULL, 0, '2024-10-14 09:16:03', '2024-10-14 09:16:03'),
(3, 'Əliyev Rəhim', 3, NULL, 0, 1200, 'USD', 0, '2024-10-14 10:40:19', '2024-10-14 14:10:44'),
(4, 'Əliyarov Pərviz', 2, NULL, 0, 0, NULL, 0, '2024-10-14 10:42:11', '2024-10-14 10:42:11'),
(5, 'Anar Şükürov', 3, NULL, 0, 1200, 'AZN\"\"', 0, '2024-10-14 10:57:00', '2024-10-14 10:57:00'),
(6, 'Elşən Həmidov', 3, NULL, 1200, 500, 'AZN', 800, '2024-10-14 11:04:34', '2024-10-14 12:04:19');

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
-- Indexes for table `modify_logs`
--
ALTER TABLE `modify_logs`
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
-- AUTO_INCREMENT for table `modify_logs`
--
ALTER TABLE `modify_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

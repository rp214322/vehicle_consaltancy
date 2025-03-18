-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2025 at 12:44 PM
-- Server version: 8.0.41-0ubuntu0.22.04.1
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hvac_old`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'TATA', 'tata', NULL, 1, '2023-03-28 08:32:23', '2023-03-28 22:40:48', NULL),
(2, 3, 'HYUNDAI', 'hyundai', NULL, 1, '2023-03-28 08:33:42', '2025-03-11 02:24:13', NULL),
(3, 3, 'HONDA', 'honda', NULL, 1, '2023-03-28 08:57:46', '2023-03-28 22:41:14', NULL),
(4, 3, 'MARUTI SUZUKI', 'maruti-suzuki', NULL, 1, '2023-03-28 22:43:35', '2023-03-28 22:43:35', NULL),
(5, 3, 'TOYOTA', 'toyota', NULL, 1, '2023-03-28 22:44:01', '2023-03-28 22:44:13', NULL),
(6, 3, 'MAHINDRA', 'mahindra', NULL, 1, '2023-03-28 22:44:36', '2023-03-28 22:44:36', NULL),
(7, 3, 'VOLKSWAGEN', 'volkswagen', NULL, 1, '2023-03-28 22:44:57', '2023-03-28 22:44:57', NULL),
(8, 3, 'FORD', 'ford', NULL, 1, '2023-03-28 22:45:21', '2023-03-28 22:45:21', NULL),
(9, 3, 'KIA', 'kia', NULL, 1, '2023-03-28 22:45:35', '2023-03-28 22:45:35', NULL),
(10, 3, 'SKODA', 'skoda', NULL, 1, '2023-03-28 22:45:55', '2023-03-28 22:45:55', NULL),
(11, 1, 'BAJAJ', 'bajaj', NULL, 1, '2023-03-28 22:46:32', '2023-03-28 22:46:32', NULL),
(12, 1, 'HONDA', 'honda-1', NULL, 1, '2023-03-28 22:46:45', '2023-03-28 22:46:45', NULL),
(13, 1, 'HERO', 'hero', NULL, 1, '2023-03-28 22:47:02', '2023-03-28 22:47:02', NULL),
(14, 1, 'SUZUKI', 'suzuki', NULL, 1, '2023-03-28 22:47:17', '2023-03-28 22:47:17', NULL),
(15, 1, 'YAMAHA', 'yamaha', NULL, 1, '2023-03-28 22:47:53', '2023-03-28 22:47:53', NULL),
(17, 1, 'TVS', 'tvs', NULL, 1, '2023-03-29 07:06:29', '2023-03-29 07:08:02', NULL),
(20, 1, 'ROYAL ENFIELD', 'royal-enfield', NULL, 1, '2023-03-29 07:08:40', '2023-03-29 07:08:40', NULL),
(21, 1, 'KTM', 'ktm', NULL, 1, '2023-03-29 07:08:58', '2023-03-29 07:08:58', NULL),
(22, 1, 'BMW', 'bmw', NULL, 1, '2023-03-29 23:20:13', '2025-03-11 02:29:36', NULL),
(23, 1, 'JUPITER', 'jupiter-123', NULL, 1, '2024-05-31 10:18:20', '2025-03-11 02:21:53', '2025-03-11 02:21:53'),
(25, 1, 'Test', 'test', NULL, 1, '2025-03-11 01:08:33', '2025-03-11 02:21:47', '2025-03-11 02:21:47'),
(26, 3, 'test', 'test-2', NULL, 1, '2025-03-11 01:12:07', '2025-03-11 02:21:43', '2025-03-11 02:21:43'),
(27, 3, 'Test Test', 'test-3', NULL, 1, '2025-03-11 01:18:38', '2025-03-11 02:21:40', '2025-03-11 02:21:40'),
(28, 3, 'Test Test', 'test-test', NULL, 1, '2025-03-11 02:13:38', '2025-03-11 02:21:36', '2025-03-11 02:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2 Wheeler', '2-wheeler', 1, NULL, '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(3, '4 Wheeler', '4-wheeler', 1, NULL, '2023-03-28 08:18:44', '2023-03-28 08:18:44'),
(10, '3 Wheels', '3-wheels', 1, '2025-03-06 05:54:16', '2025-02-18 18:30:00', '2025-03-06 05:54:16');

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
-- Table structure for table `favourite_vehicals`
--

CREATE TABLE `favourite_vehicals` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `vehical_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint UNSIGNED NOT NULL,
  `vehical_id` bigint UNSIGNED DEFAULT NULL,
  `type` enum('buy','sell') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'buy',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_01_090419_create_categories_table', 1),
(6, '2023_03_01_113234_create_brands_table', 1),
(7, '2023_03_02_11053_create_models_table', 1),
(8, '2023_03_03_055628_create_vehicals_table', 1),
(9, '2023_03_03_055648_create_vehical_galleries_table', 1),
(12, '2023_03_30_055747_create_favourite_vehicals_table', 2),
(13, '2025_02_19_073650_add_missing_fields_to_users_table', 3),
(14, '2025_02_19_100630_update_categories_table_add_status_softdeletes', 3),
(17, '2023_03_03_155854_create_inquries_table', 4),
(18, '2025_02_21_091433_remove_slug_from_users_table', 5),
(19, '2025_02_21_092237_remove_slug_from_categories_table', 6),
(22, '2025_03_05_115243_modify_last_name_nullable', 7),
(23, '2025_03_05_130105_update_category_id_on_brands_table', 8),
(24, '2025_03_05_131832_update_brands_category_id_foreign', 9),
(25, '2025_03_06_063914_add_slug_to_categories_table', 10),
(26, '2025_03_06_072740_add_slug_to_brands_table', 10),
(27, '2025_03_06_103453_update_models_table', 10),
(28, '2025_03_11_111940_create_jobs_table', 11),
(29, '2025_03_13_074325_update_vehicals_table', 12),
(30, '2025_03_13_080622_update_slug_unique_in_vehicals_table', 13),
(31, '2025_03_13_080849_update_color_mileage_not_null_in_vehicals_table', 14),
(32, '2025_03_17_125332_add_soft_deletes_to_vehical_galleries', 15),
(33, '2025_03_18_062828_add_foreign_keys_to_favourite_vehicals_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `brand_id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 'HARRIER', 'harrier', 1, '2023-03-28 22:51:09', '2023-03-28 22:51:09', NULL),
(4, 1, 'PUNCH', 'punch', 1, '2023-03-28 22:51:21', '2023-03-28 22:51:21', NULL),
(5, 1, 'NEXON', 'nexon', 1, '2023-03-28 22:51:42', '2023-03-28 22:51:42', NULL),
(6, 1, 'TIAGO', 'tiago', 0, '2023-03-28 22:51:54', '2023-03-28 22:51:54', NULL),
(7, 1, 'SAFARI', 'safari', 1, '2023-03-28 22:52:11', '2023-03-28 22:52:11', NULL),
(8, 1, 'ALTROZ', 'altroz', 1, '2023-03-28 22:52:28', '2023-03-28 22:52:28', NULL),
(9, 1, 'HEXA', 'hexa', 1, '2023-03-28 22:52:41', '2023-03-28 22:52:41', NULL),
(10, 2, 'VARNA', 'varna', 1, '2023-03-28 22:59:34', '2023-03-28 22:59:34', NULL),
(11, 2, 'I12', 'i12', 1, '2023-03-28 23:00:06', '2023-03-28 23:00:06', NULL),
(12, 2, 'I10', 'i10', 1, '2023-03-28 23:00:21', '2023-03-28 23:00:21', NULL),
(13, 2, 'ALCZAR', 'alczar', 1, '2023-03-28 23:00:39', '2023-03-28 23:00:39', NULL),
(14, 2, 'VANUE', 'vanue', 1, '2023-03-28 23:00:56', '2023-03-28 23:00:56', NULL),
(15, 2, 'AURA', 'aura', 1, '2023-03-28 23:01:19', '2023-03-28 23:01:19', NULL),
(16, 2, 'NSX', 'nsx', 1, '2023-03-28 23:01:36', '2023-03-28 23:01:36', NULL),
(17, 2, 'ACCENT', 'accent', 1, '2023-03-28 23:01:53', '2023-03-28 23:01:53', NULL),
(18, 2, 'XENT', 'xent', 1, '2023-03-28 23:02:10', '2023-03-28 23:02:10', NULL),
(19, 3, 'CITY', 'city', 1, '2023-03-28 23:02:28', '2023-03-28 23:02:28', NULL),
(20, 3, 'CIVIC', 'civic', 1, '2023-03-28 23:02:44', '2023-03-28 23:02:44', NULL),
(21, 3, 'AMAZE', 'amaze', 1, '2023-03-28 23:03:00', '2023-03-28 23:03:00', NULL),
(22, 3, 'JAZZ', 'jazz', 1, '2023-03-28 23:03:12', '2023-03-28 23:03:12', NULL),
(23, 3, 'WR-V', 'wr-v', 1, '2023-03-28 23:03:27', '2023-03-28 23:03:27', NULL),
(24, 3, 'BR-V', 'br-v', 0, '2023-03-28 23:03:43', '2023-03-28 23:03:43', NULL),
(25, 4, 'BREZZA', 'brezza', 1, '2023-03-28 23:04:07', '2023-03-28 23:04:07', NULL),
(26, 4, 'ALTO', 'alto', 1, '2023-03-28 23:04:23', '2023-03-28 23:04:23', NULL),
(27, 4, 'SWIFT', 'swift', 1, '2023-03-28 23:04:45', '2023-03-28 23:04:45', NULL),
(28, 4, 'SWIFT DZIRE', 'swift-dzire', 1, '2023-03-28 23:05:06', '2023-03-28 23:05:06', NULL),
(29, 4, 'SX4', 'sx4', 0, '2023-03-28 23:05:17', '2023-03-28 23:05:17', NULL),
(30, 4, 'CIZE', 'cize', 1, '2023-03-28 23:05:33', '2023-03-28 23:05:33', NULL),
(31, 4, 'BALENO', 'baleno', 1, '2023-03-28 23:05:55', '2023-03-28 23:05:55', NULL),
(32, 5, 'FORTUNER', 'fortuner', 1, '2023-03-28 23:06:23', '2023-03-28 23:06:23', NULL),
(33, 5, 'VELLFIRE', 'vellfire', 1, '2023-03-28 23:06:41', '2023-03-28 23:06:41', NULL),
(34, 5, 'INNOVA', 'innova', 1, '2023-03-28 23:07:00', '2023-03-28 23:07:00', NULL),
(35, 5, 'GLANZA', 'glanza', 1, '2023-03-28 23:07:22', '2023-03-28 23:07:22', NULL),
(36, 6, 'SCORPIO', 'scorpio', 1, '2023-03-28 23:07:48', '2023-03-28 23:07:48', NULL),
(37, 6, 'BOLERO NEO', 'bolero-neo', 1, '2023-03-28 23:08:15', '2023-03-28 23:08:15', NULL),
(38, 6, 'XUV500', 'xuv500', 0, '2023-03-28 23:08:36', '2023-03-28 23:08:36', NULL),
(39, 6, 'XUV300', 'xuv300', 1, '2023-03-28 23:09:01', '2023-03-28 23:09:01', NULL),
(40, 6, 'THAR', 'thar', 1, '2023-03-28 23:09:18', '2023-03-28 23:09:18', NULL),
(41, 6, 'MARAZZO', 'marazzo', 1, '2023-03-28 23:09:37', '2023-03-28 23:09:37', NULL),
(42, 7, 'POLO', 'polo', 1, '2023-03-28 23:09:58', '2023-03-28 23:09:58', NULL),
(43, 7, 'VENTO', 'vento', 1, '2023-03-28 23:10:24', '2023-03-28 23:10:24', NULL),
(44, 7, 'TIGUAN', 'tiguan', 1, '2023-03-28 23:10:47', '2023-03-28 23:10:47', NULL),
(45, 7, 'AMEO', 'ameo', 1, '2023-03-28 23:11:05', '2023-03-28 23:11:05', NULL),
(46, 8, 'ECOSPORT', 'ecosport', 1, '2023-03-28 23:11:35', '2023-03-28 23:11:35', NULL),
(47, 8, 'FREESTYLE', 'freestyle', 1, '2023-03-28 23:11:59', '2023-03-28 23:11:59', NULL),
(48, 8, 'MUSTANG', 'mustang', 1, '2023-03-28 23:12:22', '2023-03-28 23:12:22', NULL),
(49, 8, 'ASPIRE', 'aspire', 1, '2023-03-28 23:12:41', '2023-03-28 23:12:41', NULL),
(50, 8, 'GT40', 'gt40', 1, '2023-03-28 23:12:58', '2023-03-28 23:12:58', NULL),
(51, 8, 'FOCUS', 'focus', 1, '2023-03-28 23:13:13', '2023-03-28 23:13:13', NULL),
(52, 8, 'FIESTA', 'fiesta', 1, '2023-03-28 23:13:32', '2023-03-28 23:13:32', NULL),
(53, 8, 'FIGO', 'figo', 1, '2023-03-28 23:13:45', '2023-03-28 23:13:45', NULL),
(54, 8, 'THUNDERBIRD', 'thunderbird', 1, '2023-03-28 23:14:17', '2023-03-28 23:14:17', NULL),
(55, 9, 'SELTOS', 'seltos', 1, '2023-03-28 23:14:40', '2023-03-28 23:14:40', NULL),
(56, 9, 'CARNIVAL', 'carnival', 1, '2023-03-28 23:14:59', '2023-03-28 23:14:59', NULL),
(57, 9, 'EV6', 'ev6', 1, '2023-03-28 23:15:13', '2023-03-28 23:15:13', NULL),
(58, 9, 'SONET', 'sonet', 1, '2023-03-28 23:15:30', '2023-03-28 23:15:30', NULL),
(59, 9, 'STINGER', 'stinger', 1, '2023-03-28 23:15:50', '2023-03-28 23:15:50', NULL),
(60, 9, 'CARENS', 'carens', 1, '2023-03-28 23:16:14', '2023-03-28 23:16:14', NULL),
(61, 10, 'OCTAVIA', 'octavia', 1, '2023-03-28 23:16:34', '2023-03-28 23:16:34', NULL),
(62, 10, 'SUPERB', 'superb', 1, '2023-03-28 23:16:54', '2023-03-28 23:16:54', NULL),
(63, 10, 'SLAVIA', 'slavia', 1, '2023-03-28 23:17:10', '2023-03-28 23:17:10', NULL),
(64, 10, 'KUSHAQ', 'kushaq', 1, '2023-03-28 23:17:27', '2023-03-28 23:17:27', NULL),
(65, 10, 'KODIAQ', 'kodiaq', 1, '2023-03-28 23:17:45', '2023-03-28 23:17:45', NULL),
(66, 12, 'LIVO', 'livo', 0, '2023-03-28 23:18:47', '2023-03-28 23:22:39', NULL),
(67, 11, 'RIDER', 'rider', 1, '2023-03-28 23:19:08', '2023-03-28 23:19:08', NULL),
(68, 11, 'PULSAR NS 220', 'pulsar-ns-220', 1, '2023-03-28 23:19:33', '2023-03-28 23:19:33', NULL),
(69, 12, 'SHINE SP', 'shine-sp', 1, '2023-03-28 23:19:55', '2023-03-28 23:19:55', NULL),
(70, 13, 'GLAMOUR', 'glamour', 1, '2023-03-28 23:20:21', '2023-03-28 23:20:21', NULL),
(71, 13, 'SPLENDOR', 'splendor', 1, '2023-03-28 23:20:50', '2023-03-28 23:20:50', NULL),
(72, 14, 'ACCESS 125', 'access-125', 1, '2023-03-28 23:21:17', '2023-03-28 23:21:17', NULL),
(73, 15, 'MT', 'mt', 1, '2023-03-28 23:21:33', '2023-03-28 23:21:33', NULL),
(74, 15, 'R15', 'r15', 0, '2023-03-28 23:21:48', '2023-03-28 23:21:48', NULL),
(75, 15, 'FZ-5', 'fz-5', 1, '2023-03-28 23:22:12', '2023-03-28 23:22:12', NULL),
(76, 17, 'JUPITER 125', 'jupiter-125', 0, '2023-03-29 07:12:47', '2023-03-29 07:12:47', NULL),
(77, 17, 'ROHIN', 'rohin', 1, '2023-03-29 07:14:27', '2023-03-29 07:14:27', NULL),
(78, 20, 'HUNTER', 'hunter', 1, '2023-03-29 07:15:21', '2023-03-29 07:15:21', NULL),
(79, 20, 'CLASSIC 350', 'classic-350', 1, '2023-03-29 07:15:48', '2023-03-29 07:15:48', NULL),
(80, 20, 'CONTINENTAL GT 650', 'continental-gt-650', 0, '2023-03-29 07:16:22', '2023-03-29 07:16:22', NULL),
(81, 20, 'HIMALAYAN', 'himalayan', 0, '2023-03-29 07:16:48', '2023-03-29 07:16:48', NULL),
(82, 13, 'PASSION PRO', 'passion-pro', 1, '2023-03-29 07:17:32', '2023-03-29 07:17:32', NULL),
(83, 11, 'PULSAR 125', 'pulsar-125', 0, '2023-03-29 07:27:01', '2023-03-29 07:27:01', NULL),
(84, 12, 'DIO', 'dio', 0, '2023-03-29 23:15:12', '2023-03-29 23:15:12', NULL),
(86, 21, 'DUKE 350', 'duke-350', 0, '2023-03-29 23:16:55', '2023-03-29 23:16:55', NULL),
(87, 17, 'NTORQ', 'ntorq', 0, '2023-03-29 23:17:35', '2023-03-29 23:17:35', NULL),
(88, 12, 'UNICORN', 'unicorn', 0, '2023-03-29 23:18:38', '2023-03-29 23:18:38', NULL),
(89, 12, 'ACTIVA 3G', 'activa-3g', 1, '2023-03-29 23:19:15', '2023-03-29 23:19:15', NULL),
(90, 22, 'G 310 R', 'g-310-r', 0, '2023-03-29 23:22:20', '2023-03-29 23:22:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@example.com', '$2y$10$SqiCE1yMbGz5C/YyHnVoHuDsieMUIEO89ML/cNwFkVr4bNnaD8M76', '2025-02-19 05:55:19'),
('ronakp2912@gmail.com', '$2y$10$3k2luPyXi5Hqm2STe8fUeOECq0PqMyDXiAakym9uRxMI0Rpp4LdEu', '2025-02-19 05:57:08'),
('sstark@example.org', '$2y$10$YnGdUpWlLEaQbDWORYm1K.AFCW2Sq0ZKr44SGHL4z0AUTA.fa0mHG', '2025-03-05 01:31:34'),
('rp214322@gmail.com', '$2y$10$aja8.q4sNfld.hUzMgIzfexvC2qTXAJ4oc1s2tjdpNhqIBkB9KjS2', '2025-03-05 01:34:35'),
('rohanf22@gmail.com', '$2y$10$xtjLJnFM/eNaCVa4J5U0RO2ZPSiauQuPySt5v3Ej6khEfPL8UJxWC', '2025-03-07 05:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 60, 'auth_token', '86c93b74075d1eb26e145d06b006ca2ad6eec8285596e068a4562e6f81b4ad8e', '[\"*\"]', NULL, '2025-02-19 07:57:50', '2025-02-19 07:57:50'),
(2, 'App\\Models\\User', 60, 'auth_token', '1b59aa419599dbffd1cf973f94cab77c35303589d0179fba39f08879cd2866e6', '[\"*\"]', NULL, '2025-02-19 07:58:04', '2025-02-19 07:58:04'),
(3, 'App\\Models\\User', 60, 'auth_token', '2e1afb72738f2e9ab3a7f0af9be4ec4b393f1f4993eaf23abcf45a80d4cefc57', '[\"*\"]', NULL, '2025-02-19 07:58:05', '2025-02-19 07:58:05'),
(4, 'App\\Models\\User', 60, 'auth_token', '2e61c5317055735f278c732e8398e12e3e2b56da6c43b73c15ac81f6ebd3e021', '[\"*\"]', NULL, '2025-02-19 07:58:24', '2025-02-19 07:58:24'),
(6, 'App\\Models\\User', 62, 'auth_token', '98df757d4e9edd7abe0caaa7b67760b26ab2dee728c5db7430f008997e08066b', '[\"*\"]', '2025-02-19 08:48:35', '2025-02-19 08:46:49', '2025-02-19 08:48:35'),
(7, 'App\\Models\\User', 62, 'auth_token', '3e5573a420722448fe6142015401acbe6be8887591cd18bdf4e6a376cd7c8998', '[\"*\"]', '2025-02-20 00:35:00', '2025-02-20 00:29:07', '2025-02-20 00:35:00'),
(8, 'App\\Models\\User', 63, 'auth_token', '50238317b8db543e10d8217534cc1587e8b5a8a944c97a40596f5cecd9749506', '[\"*\"]', NULL, '2025-02-20 00:51:13', '2025-02-20 00:51:13'),
(9, 'App\\Models\\User', 63, 'auth_token', '410efe7a0f3458b7e8af916a19c71730216c8088726bebc4ceaf2934ddae819a', '[\"*\"]', NULL, '2025-02-20 00:51:25', '2025-02-20 00:51:25'),
(10, 'App\\Models\\User', 63, 'auth_token', 'ff78ab353bfa94c2ab73fb7b3f8c4292700a09112fe3744b99826648fabbdb44', '[\"*\"]', NULL, '2025-02-20 00:52:39', '2025-02-20 00:52:39'),
(11, 'App\\Models\\User', 63, 'auth_token', 'efdb13f02896dde346b0d9287b60fd83c35052409613a940101c78df280ec040', '[\"*\"]', NULL, '2025-02-20 00:53:45', '2025-02-20 00:53:45'),
(12, 'App\\Models\\User', 62, 'auth_token', '236d522a602b28c595a18a1396e384985e978ce2b0f53c17c8b2344c22a5d008', '[\"*\"]', '2025-02-20 02:17:55', '2025-02-20 01:38:01', '2025-02-20 02:17:55'),
(13, 'App\\Models\\User', 62, 'auth_token', '7a278a11e2b6aea6dc125013220808b56af47881f58d53dd556dd739f2176477', '[\"*\"]', NULL, '2025-02-20 02:16:58', '2025-02-20 02:16:58'),
(14, 'App\\Models\\User', 62, 'auth_token', '3e3e4ea7de7e4d01d01fa1b247cef5d4b384b6b00a19af510732682f1135e9a2', '[\"*\"]', NULL, '2025-02-20 02:16:59', '2025-02-20 02:16:59'),
(15, 'App\\Models\\User', 62, 'auth_token', '90b4dece22800a40313705ce6bff49893d83c794ba91338d2528519811676137', '[\"*\"]', NULL, '2025-02-20 02:17:00', '2025-02-20 02:17:00'),
(16, 'App\\Models\\User', 62, 'auth_token', '03ee770ff752b9bc32939826575c0ea6d28bb708d8c56f57e409256e6c493eef', '[\"*\"]', NULL, '2025-02-20 02:17:00', '2025-02-20 02:17:00'),
(17, 'App\\Models\\User', 62, 'auth_token', 'a567bab8de8c3360399ff78a58f60dac5abc90cdac7ea8a62210fa73e0000032', '[\"*\"]', '2025-02-20 02:25:50', '2025-02-20 02:17:35', '2025-02-20 02:25:50'),
(19, 'App\\Models\\User', 62, 'auth_token', 'a95fc3e951123a8e0afc5d6c91035cf1e4f4441c849619434c808e085a15af86', '[\"*\"]', '2025-02-25 23:35:50', '2025-02-20 02:28:01', '2025-02-25 23:35:50'),
(20, 'App\\Models\\User', 62, 'auth_token', '21925dd60da8aa4868e858840d1923f302948d5bdd5182e069f8f064f1287c6b', '[\"*\"]', NULL, '2025-02-20 06:55:40', '2025-02-20 06:55:40'),
(21, 'App\\Models\\User', 62, 'auth_token', '0ac279dc56b488093266f15e3fcc174a6ccd1765dbd7822905a5cf17c8fe28e4', '[\"*\"]', NULL, '2025-02-20 07:00:40', '2025-02-20 07:00:40'),
(22, 'App\\Models\\User', 62, 'auth_token', '4fbc125f1111826e57d36308472c40a1679a49474b39ad166432f51840189a1f', '[\"*\"]', NULL, '2025-02-20 07:00:40', '2025-02-20 07:00:40'),
(23, 'App\\Models\\User', 62, 'auth_token', 'fb12303243a5d02bd94d3452fb2d8d0ea326a528b9a13841fbf60ca8aa0117c8', '[\"*\"]', NULL, '2025-02-20 07:00:41', '2025-02-20 07:00:41'),
(24, 'App\\Models\\User', 62, 'auth_token', 'd033f7fc405fbe90ec3d1f22b7b866671f36eef1b98b123b07e0877e4b9841ba', '[\"*\"]', NULL, '2025-02-20 07:00:41', '2025-02-20 07:00:41'),
(25, 'App\\Models\\User', 62, 'auth_token', '1fce40768be4aa4acd9e0ec8f75a838f8527ea21005c8560da6fc2032bcf5302', '[\"*\"]', NULL, '2025-02-20 07:00:41', '2025-02-20 07:00:41'),
(26, 'App\\Models\\User', 62, 'auth_token', '22b20cc6fe04752b7f2b0b19626645b2de26d0491122fe82072c318e5c2ed4f9', '[\"*\"]', NULL, '2025-02-20 07:00:41', '2025-02-20 07:00:41'),
(27, 'App\\Models\\User', 62, 'auth_token', 'c6abfbfdaa7f7b2e69337006b4a53f54c9872850b63e106597b0b7d4b3d29163', '[\"*\"]', NULL, '2025-02-20 07:00:41', '2025-02-20 07:00:41'),
(28, 'App\\Models\\User', 62, 'auth_token', '5c8516de070868c5f8f0d9fc1bceed43e37f0b0f65d2b5c27e67d4fb3c74b4b5', '[\"*\"]', NULL, '2025-02-20 07:00:42', '2025-02-20 07:00:42'),
(29, 'App\\Models\\User', 62, 'auth_token', '843f2295168aa3605aed4fb7006fd8685699d2d82d9af33a4f27081c79efc627', '[\"*\"]', NULL, '2025-02-20 07:00:42', '2025-02-20 07:00:42'),
(30, 'App\\Models\\User', 62, 'auth_token', '2d4dd08071ff83d804a1bc37ff744dba05b311261c0246a83232e62c3573c27e', '[\"*\"]', NULL, '2025-02-20 07:00:42', '2025-02-20 07:00:42'),
(31, 'App\\Models\\User', 62, 'auth_token', '7a1c3f3d7b66fd365d6a4d14f039e8655d0acfd9d7a3874fb9528d35029d692e', '[\"*\"]', NULL, '2025-02-20 07:00:42', '2025-02-20 07:00:42'),
(32, 'App\\Models\\User', 62, 'auth_token', '518eeb6ab6346169fe2b9fc0b5eee4f799c596cfc34a9ce1cc31d6c86b98346f', '[\"*\"]', NULL, '2025-02-20 07:00:42', '2025-02-20 07:00:42'),
(33, 'App\\Models\\User', 62, 'auth_token', '6cbb1fd32e9e75bea110f61efdac76b47d795dee69f44338017ebecf1f90bf5a', '[\"*\"]', NULL, '2025-02-20 07:00:43', '2025-02-20 07:00:43'),
(34, 'App\\Models\\User', 62, 'auth_token', '53a7c8100e0322995e721dcf14283e2c84d42e4e16efd03e751fe31e11920767', '[\"*\"]', NULL, '2025-02-20 07:00:43', '2025-02-20 07:00:43'),
(35, 'App\\Models\\User', 62, 'auth_token', '116aa408ba0471a7c41b54bd6bab212b16f00c9482d77c15527a1a48622f7a42', '[\"*\"]', NULL, '2025-02-20 07:00:43', '2025-02-20 07:00:43'),
(36, 'App\\Models\\User', 62, 'auth_token', 'c6da7ec52c1428b392df5ff08061d36f9e683d900889759dd21d8228822ee8f1', '[\"*\"]', NULL, '2025-02-20 07:00:43', '2025-02-20 07:00:43'),
(37, 'App\\Models\\User', 62, 'auth_token', 'de2fd488b5a1bf1e5e946f30c313de11f665236411238ee426b4fb6563790fac', '[\"*\"]', NULL, '2025-02-20 07:00:44', '2025-02-20 07:00:44'),
(38, 'App\\Models\\User', 62, 'auth_token', '00730bb95cf5c37fff4aed9b66ad08acc2b65e9976386cc42da46697c634fdde', '[\"*\"]', NULL, '2025-02-20 07:00:45', '2025-02-20 07:00:45'),
(39, 'App\\Models\\User', 62, 'auth_token', '1d91675388d2a4875d0f77c3a562a5407cc875b4086cc383407fa52af9df7651', '[\"*\"]', NULL, '2025-02-20 07:00:45', '2025-02-20 07:00:45'),
(40, 'App\\Models\\User', 62, 'auth_token', '2c446102746c05817629278d05e359ccbd59e510c2151d7fe546a1da6aa41c6e', '[\"*\"]', NULL, '2025-02-20 07:00:45', '2025-02-20 07:00:45'),
(41, 'App\\Models\\User', 62, 'auth_token', 'd2b657e6773a128bdf8211a53a95efb27db7e9a8f54998a71f2d5960fc32d63d', '[\"*\"]', NULL, '2025-02-20 07:00:45', '2025-02-20 07:00:45'),
(42, 'App\\Models\\User', 62, 'auth_token', '978aed4f0bdebe52107896fc51772ef41f59ffe361977e5ec53b7ce9e0a30471', '[\"*\"]', NULL, '2025-02-20 07:00:46', '2025-02-20 07:00:46'),
(43, 'App\\Models\\User', 62, 'auth_token', 'd9783ac35cb8138f00abf4644b4c96c3b25d4d0d29ee1826f79142d864a85372', '[\"*\"]', NULL, '2025-02-20 07:00:46', '2025-02-20 07:00:46'),
(44, 'App\\Models\\User', 62, 'auth_token', 'bec9d352b8214a61b70f4d10d9cbe81c4562ea5eff1bcde175615f583f1d9d19', '[\"*\"]', NULL, '2025-02-20 07:00:46', '2025-02-20 07:00:46'),
(45, 'App\\Models\\User', 62, 'auth_token', '085a0c61f69029462df9888567d2462fc458fbcfb4598cfea06af0f7ee67777d', '[\"*\"]', NULL, '2025-02-20 07:00:46', '2025-02-20 07:00:46'),
(46, 'App\\Models\\User', 62, 'auth_token', '036e68a0cc2ad769acb509b4bb27cf56737540b67ecd7bc1115ee4e976594f4a', '[\"*\"]', NULL, '2025-02-20 07:00:46', '2025-02-20 07:00:46'),
(47, 'App\\Models\\User', 62, 'auth_token', '5bc31e7fe390b082eab6b0bba62c1c23ba4ee417f4eac2a1b2b95167f72f919b', '[\"*\"]', NULL, '2025-02-20 07:00:47', '2025-02-20 07:00:47'),
(48, 'App\\Models\\User', 62, 'auth_token', '129a1546cf82d972c407769f9ad02add56640db1794eedf8df6c765a8a4cb584', '[\"*\"]', NULL, '2025-02-20 07:00:47', '2025-02-20 07:00:47'),
(49, 'App\\Models\\User', 62, 'auth_token', 'd7413ee1905cb4f790782238395f017e2992fe3d209c8bd8034d5c4bbc4442e8', '[\"*\"]', NULL, '2025-02-20 07:00:48', '2025-02-20 07:00:48'),
(50, 'App\\Models\\User', 62, 'auth_token', '707799ec0db31c2656caa7acf778249af42aee3b43a38b5e2929e5ebf60a3902', '[\"*\"]', NULL, '2025-02-20 07:00:48', '2025-02-20 07:00:48'),
(51, 'App\\Models\\User', 62, 'auth_token', '298295e121a2dd9fbb7ff45657b3840271d61eff9d6e9a0f7fc3751870c6cc13', '[\"*\"]', NULL, '2025-02-20 07:00:48', '2025-02-20 07:00:48'),
(52, 'App\\Models\\User', 62, 'auth_token', 'badfc8fab1efef8773d33e1967072e3aeb9a283e0b6886dcf72604ce245dfea4', '[\"*\"]', NULL, '2025-02-20 07:00:48', '2025-02-20 07:00:48'),
(53, 'App\\Models\\User', 62, 'auth_token', '63baa7ba383378d4a1c77967cb6e62950467656802ba79ac86140205fb657114', '[\"*\"]', NULL, '2025-02-20 07:00:49', '2025-02-20 07:00:49'),
(54, 'App\\Models\\User', 62, 'auth_token', 'c574f8e9cd058ece203285a0596d287a3d6d9d389bcf047090eab57383553b0c', '[\"*\"]', NULL, '2025-02-20 07:00:49', '2025-02-20 07:00:49'),
(55, 'App\\Models\\User', 62, 'auth_token', '4c9d22b9ab8911edce0fbd390b047afdf3e9d04e371e0eb5fb59c5085101ab66', '[\"*\"]', NULL, '2025-02-20 07:00:49', '2025-02-20 07:00:49'),
(56, 'App\\Models\\User', 62, 'auth_token', 'fd6a002c58e46f7053f12959d230875d8fc98b7fbce8eedbf40007ea1fb757f8', '[\"*\"]', NULL, '2025-02-20 07:00:49', '2025-02-20 07:00:49'),
(57, 'App\\Models\\User', 62, 'auth_token', '935d0352ff632e25a229276a8045269ab8d8b51bdc0af5130e10d169576e0179', '[\"*\"]', NULL, '2025-02-20 07:00:50', '2025-02-20 07:00:50'),
(58, 'App\\Models\\User', 62, 'auth_token', '56ada6ff8fa74692524b11ed956591058365d0cc5de0226e753dc20f92473933', '[\"*\"]', NULL, '2025-02-20 07:00:50', '2025-02-20 07:00:50'),
(59, 'App\\Models\\User', 62, 'auth_token', '74a6d3f6c2fd2e02e59bacc01ce74148a7d81b62e14a7b2c373a654c225440c0', '[\"*\"]', NULL, '2025-02-20 07:00:50', '2025-02-20 07:00:50'),
(60, 'App\\Models\\User', 62, 'auth_token', '919066ae2970bc01e8e58141cce02221efa634927823be76f4607d38be67f430', '[\"*\"]', NULL, '2025-02-20 07:00:50', '2025-02-20 07:00:50'),
(61, 'App\\Models\\User', 62, 'auth_token', 'f33c6fc1dfc988e9f42388e6e8d3c6df21db050a2d2d8a8ed6a7508568e95da2', '[\"*\"]', NULL, '2025-02-20 07:00:51', '2025-02-20 07:00:51'),
(62, 'App\\Models\\User', 62, 'auth_token', '08b51dd4a6c03e54b62d92f4668fc52fe412c5af1bc5e390c22f7f0b71a6eb04', '[\"*\"]', NULL, '2025-02-25 00:59:57', '2025-02-25 00:59:57'),
(64, 'App\\Models\\User', 62, 'auth_token', '22d6ca6246593d7b48c8108884f87e885dfdbfdd0b30781c16242857b41d957a', '[\"*\"]', '2025-02-25 01:20:54', '2025-02-25 01:20:23', '2025-02-25 01:20:54'),
(65, 'App\\Models\\User', 62, 'auth_token', '085ad4112f4bdaa8650cada45478a342cb88dee13bc18213b69671f302273e80', '[\"*\"]', '2025-02-25 01:31:57', '2025-02-25 01:26:42', '2025-02-25 01:31:57'),
(66, 'App\\Models\\User', 62, 'auth_token', 'db0f63f7f6a27d907560edf18f3525cc52bd93513cbbeb93734219ec7a936039', '[\"*\"]', '2025-02-25 23:36:50', '2025-02-25 03:52:10', '2025-02-25 23:36:50'),
(67, 'App\\Models\\User', 62, 'auth_token', '4371d2efb431de0d06a8e028eab62d5911d42235f5259cc75cac084dda44f466', '[\"*\"]', '2025-02-25 03:58:07', '2025-02-25 03:57:45', '2025-02-25 03:58:07'),
(68, 'App\\Models\\User', 66, 'auth_token', '23a67ebf311f653d327e6cff78d2fac659b47a71025d41cda89a00e2f575758e', '[\"*\"]', '2025-02-25 23:42:14', '2025-02-25 23:31:40', '2025-02-25 23:42:14'),
(69, 'App\\Models\\User', 67, 'auth_token', 'b625205ebf25e0f7c7c2260a0df96c6f3320d56892f3b86a85e9c4cf1b3fdbbc', '[\"*\"]', NULL, '2025-02-26 02:25:56', '2025-02-26 02:25:56'),
(70, 'App\\Models\\User', 67, 'auth_token', '63dd630a3f6d2d54a2a61ee5ca2a186c53e611380fc3b28b3b636d79f9d11c4a', '[\"*\"]', NULL, '2025-02-26 05:05:27', '2025-02-26 05:05:27'),
(71, 'App\\Models\\User', 67, 'auth_token', '058f6d9a34af9a9be930d9ae8be5defbc9ac02795c4898c2c24541e48a05058b', '[\"*\"]', NULL, '2025-02-26 05:05:28', '2025-02-26 05:05:28'),
(72, 'App\\Models\\User', 67, 'auth_token', 'cdaccb94cca4bf41536b0515660a41b345a6aa4309329a9ac0cbd8b88c8d1389', '[\"*\"]', NULL, '2025-02-26 05:05:28', '2025-02-26 05:05:28'),
(73, 'App\\Models\\User', 67, 'auth_token', 'ce00c6cb00b3eb6e3aa60218df402c123c47dd5331ac44c24dc0c9fedabe5515', '[\"*\"]', NULL, '2025-02-26 05:05:29', '2025-02-26 05:05:29'),
(74, 'App\\Models\\User', 67, 'auth_token', '5d903a3ebd9470c121f6a23eb2541aaade273702a0729fb760ea9315595f4f04', '[\"*\"]', NULL, '2025-02-26 05:05:29', '2025-02-26 05:05:29'),
(75, 'App\\Models\\User', 67, 'auth_token', '58a1f85b671d469afa1e8d818d37a4c824efedae2b01da2a382df5ac6ce9cc64', '[\"*\"]', NULL, '2025-02-26 05:05:29', '2025-02-26 05:05:29'),
(76, 'App\\Models\\User', 67, 'auth_token', 'ad92e3783f5c587c37f9faf065e8737d0fab2a8b2648304382fa0f234668e034', '[\"*\"]', NULL, '2025-02-26 05:05:29', '2025-02-26 05:05:29'),
(77, 'App\\Models\\User', 67, 'auth_token', '0f28e317cca2bf74a6bce87553c7cc9cf5aed9b38d4dfaca96a7a5a6eb73c1e5', '[\"*\"]', NULL, '2025-02-26 05:05:29', '2025-02-26 05:05:29'),
(78, 'App\\Models\\User', 67, 'auth_token', '50e1705768f44545905a9e8e830a215afab475bcf244f94eb95f4ddc8e03513d', '[\"*\"]', NULL, '2025-02-26 05:05:30', '2025-02-26 05:05:30'),
(79, 'App\\Models\\User', 67, 'auth_token', '6191875c1bf3df085fcde4e1eed667c638f17a7bbffb759c2eaf09f2dcce970e', '[\"*\"]', NULL, '2025-02-26 05:05:30', '2025-02-26 05:05:30'),
(80, 'App\\Models\\User', 67, 'auth_token', 'e63e47758695acbd28f92af44d2e144fc5c949c3849a003881ad78e65455057b', '[\"*\"]', NULL, '2025-02-26 05:05:30', '2025-02-26 05:05:30'),
(82, 'App\\Models\\User', 67, 'auth_token', '2f590b8b2a8c1db8dafce90a16e90049a5e4e1554e540ebfc62b9b2b99a1a3d4', '[\"*\"]', '2025-03-05 05:02:01', '2025-03-05 04:26:25', '2025-03-05 05:02:01'),
(83, 'App\\Models\\User', 67, 'auth_token', 'da6b3421bee8888ae8f74a48305bb35b29fbf98720554b16845c43402673a4eb', '[\"*\"]', NULL, '2025-03-06 22:48:46', '2025-03-06 22:48:46'),
(84, 'App\\Models\\User', 67, 'auth_token', '8f8f884d0c3c5cf73f690f08244b44d6c0511ab527a12b6e1350d523cb1962b9', '[\"*\"]', NULL, '2025-03-06 22:49:43', '2025-03-06 22:49:43'),
(85, 'App\\Models\\User', 67, 'auth_token', '47dd132cbc6ce95bcf05e7bcf354ad9d96c293d54797eacd915d5b21200d58f5', '[\"*\"]', NULL, '2025-03-06 23:29:35', '2025-03-06 23:29:35'),
(86, 'App\\Models\\User', 67, 'auth_token', 'd9ca3e51ff92da8a9bf2243c1a6fcc3d97ab04cc7c3848eb0079d3b5aee2325e', '[\"*\"]', '2025-03-06 23:37:36', '2025-03-06 23:36:13', '2025-03-06 23:37:36'),
(87, 'App\\Models\\User', 67, 'auth_token', 'be957aa52b8b5d056114afe6a7a6498225f54e996e1878770ebc247ed6ee3a3a', '[\"*\"]', '2025-03-06 23:43:37', '2025-03-06 23:40:55', '2025-03-06 23:43:37'),
(88, 'App\\Models\\User', 67, 'auth_token', 'f4b3100101d60409c5464187f1a6e5ffbcd9744f0e26f96cff00077c47e8c513', '[\"*\"]', NULL, '2025-03-06 23:44:10', '2025-03-06 23:44:10'),
(89, 'App\\Models\\User', 67, 'auth_token', '9c6467340cb04c6d3e8f2d1b8ff59b938248e35410032bb0b5812a15c3e93d80', '[\"*\"]', '2025-03-07 00:18:45', '2025-03-07 00:15:18', '2025-03-07 00:18:45'),
(90, 'App\\Models\\User', 67, 'auth_token', '897c318acf0fcf1e9bd578cfd347539082230c491ce39348df2fdb93b4386d0f', '[\"*\"]', NULL, '2025-03-07 00:26:54', '2025-03-07 00:26:54'),
(91, 'App\\Models\\User', 67, 'auth_token', '47653699c7136f8cc5ba41ca145335f6e5893e59dcab019864c6ec8472a51342', '[\"*\"]', NULL, '2025-03-07 02:41:24', '2025-03-07 02:41:24'),
(92, 'App\\Models\\User', 67, 'auth_token', 'd6a50cf14dd8b0647936ad875bd16db110f11f9eff705c6192e0aa9e68e7b835', '[\"*\"]', NULL, '2025-03-10 05:34:27', '2025-03-10 05:34:27'),
(93, 'App\\Models\\User', 67, 'auth_token', 'd0e2543cf3b9c6945bcc949dc0b177a16a64209598450a0ad72534b5e8c2e54b', '[\"*\"]', NULL, '2025-03-10 22:50:03', '2025-03-10 22:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role` enum('admin','customer') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `phone`, `email`, `email_verified_at`, `password`, `dob`, `country`, `state`, `address`, `image`, `status`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(71, 'admin', 'Admin', NULL, NULL, 'ritesh.patel@shivlab.com', '2025-03-18 01:41:17', '$2y$10$hGIqHXfTgW3Uy.czpGgp1OMW1qOsRLl0mCH4tP1wwOOQ3dUIm1dzu', NULL, NULL, NULL, NULL, NULL, 1, 'BMxalTtx55', NULL, '2025-03-18 01:41:17', '2025-03-18 01:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `vehicals`
--

CREATE TABLE `vehicals` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `fuel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'petrol',
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mileage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(16,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `technical` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_option` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicals`
--

INSERT INTO `vehicals` (`id`, `category_id`, `brand_id`, `model_id`, `title`, `slug`, `year`, `fuel`, `color`, `mileage`, `price`, `status`, `created_at`, `updated_at`, `technical`, `feature_option`, `deleted_at`) VALUES
(17, 1, 11, 68, 'Pluser 220', 'pluser-220', 2018, 'petrol', 'Black', '15', '50000.00', 0, '2023-03-30 09:03:58', '2023-03-30 09:03:58', '', '', NULL),
(18, 3, 2, 34, 'Innova 556', 'innova-556', 2014, 'diesal', 'black', '50', '90000.00', 0, '2023-03-30 09:05:52', '2025-02-20 23:02:48', '', '', NULL),
(20, 1, 12, 69, 'SHINE SP', 'dream-yuga', 2012, 'petrol', 'red', '60', '16000.00', 1, '2023-03-30 09:09:36', '2025-02-20 23:03:19', '', '', NULL),
(21, 1, 14, 72, 'Giser 36', 'giser-36', 2016, 'petrol', 'red', '30', '36000.00', 0, '2023-03-30 09:12:38', '2023-03-30 09:12:38', '', '', NULL),
(22, 3, 6, 40, 'Thar', 'thar', 2020, 'petrol', 'red', '35', '540000.00', 0, '2023-03-30 09:13:54', '2025-02-21 00:14:10', '', '', NULL),
(23, 3, 3, 19, 'Honda City', 'city', 2019, 'diesal', 'white', '30', '1600000.00', 0, '2023-03-30 09:14:46', '2025-02-21 00:14:38', '', '', NULL),
(24, 1, 20, 80, 'Royal Enfield', 'royal-enfield', 2016, 'petrol', 'BLACK', '15', '40000.00', 0, '2023-03-30 09:16:06', '2025-02-21 00:14:55', '', '', NULL),
(25, 3, 3, 23, 'WR-V', 'wr-v', 2018, 'petrol', 'white', '25', '650000.00', 0, '2023-03-30 11:31:21', '2023-03-30 20:56:44', '', '', NULL),
(26, 1, 13, 71, 'SPLENDOR', 'splendor', 2017, 'petrol', 'black', '15', '15000.00', 0, '2023-03-30 11:40:53', '2025-02-20 23:05:38', '', '', NULL),
(29, 3, 1, 5, 'Tata Nexon EV', 'nexon', 2019, 'electric', 'green', '25', '500000.00', 0, '2023-04-20 05:09:43', '2025-02-21 00:15:37', '', '', NULL),
(34, 1, 12, 66, 'livo', 'livo', 2017, 'petrol', 'BLACK', '35', '65000.00', 0, '2023-04-20 09:30:56', '2025-02-20 01:50:38', '', '', NULL),
(35, 1, 15, 75, 'fz-s', 'fz-s', 2017, 'petrol', 'black', '45', '55000.00', 0, '2023-04-20 09:33:00', '2025-02-26 02:20:19', '', '', NULL),
(36, 3, 9, 55, 'SELTOS', 'seltos', 2020, 'petrol', 'black', '35', '650000.00', 0, '2023-04-20 09:37:01', '2023-04-20 09:37:01', '', '', NULL),
(37, 3, 5, 32, 'FORTUNER', 'fortuner', 2021, 'petrol', 'White', '45', '3500000.00', 0, '2023-04-20 09:40:49', '2025-02-20 23:07:14', '', '', NULL),
(40, 3, 1, 3, 'test', 'test', 2022, 'petrol+cng', 'Black', '25', '350000.00', 0, '2025-03-13 02:45:50', '2025-03-13 02:54:45', '<ul>\r\n	<li>dgfdg</li>\r\n	<li>fghfh</li>\r\n	<li>ffgfg</li>\r\n	<li>fgfd</li>\r\n	<li>gfdgfdg</li>\r\n</ul>', '<ul>\r\n	<li>dgfd</li>\r\n	<li>fg</li>\r\n	<li>f</li>\r\n	<li>fh</li>\r\n	<li>f</li>\r\n	<li>hd</li>\r\n	<li>fh</li>\r\n</ul>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehical_galleries`
--

CREATE TABLE `vehical_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `vehical_id` bigint UNSIGNED NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehical_galleries`
--

INSERT INTO `vehical_galleries` (`id`, `vehical_id`, `file`, `file_type`, `is_featured`, `created_at`, `updated_at`, `deleted_at`) VALUES
(97, 37, 'gallery/fortuner/1740660071_WhatsApp Image 2023-03-30 at 6.20.02 PM (1).jpeg', 'image/jpeg', 1, '2025-02-27 07:11:11', '2025-02-27 07:11:15', NULL),
(98, 36, 'gallery/seltos/1740717559_WhatsApp Image 2023-03-30 at 6.07.54 PM.jpeg', 'image/jpeg', 1, '2025-02-27 23:09:19', '2025-02-27 23:09:23', NULL),
(99, 35, 'gallery/fz-s/1740717598_fz-s.jpeg', 'image/jpeg', 1, '2025-02-27 23:09:58', '2025-02-27 23:10:02', NULL),
(100, 34, 'gallery/livo/1740717618_livo.jpeg', 'image/jpeg', 1, '2025-02-27 23:10:18', '2025-02-27 23:10:22', NULL),
(101, 29, 'gallery/nexon/1740717656_WhatsApp Image 2023-03-30 at 6.24.19 PM.jpeg', 'image/jpeg', 0, '2025-02-27 23:10:56', '2025-02-27 23:11:03', NULL),
(102, 29, 'gallery/nexon/1740717656_WhatsApp Image 2023-03-30 at 6.24.20 PM.jpeg', 'image/jpeg', 1, '2025-02-27 23:10:56', '2025-02-27 23:11:03', NULL),
(103, 26, 'gallery/splendor/1740717796_splendor plus.jpeg', 'image/jpeg', 1, '2025-02-27 23:13:16', '2025-02-27 23:13:20', NULL),
(104, 25, 'gallery/wr-v/1740717836_WhatsApp Image 2023-03-30 at 6.19.21 PM.jpeg', 'image/jpeg', 1, '2025-02-27 23:13:56', '2025-02-27 23:14:00', NULL),
(105, 24, 'gallery/royal-enfield/1740717864_classic 350(1).jpeg', 'image/jpeg', 0, '2025-02-27 23:14:24', '2025-02-27 23:14:31', NULL),
(106, 24, 'gallery/royal-enfield/1740717864_classic 350.jpeg', 'image/jpeg', 1, '2025-02-27 23:14:24', '2025-02-27 23:14:31', NULL),
(107, 23, 'gallery/city/1740717887_city.jpg', 'image/jpeg', 1, '2025-02-27 23:14:47', '2025-02-27 23:14:51', NULL),
(108, 22, 'gallery/thar/1740717916_WhatsApp Image 2023-03-30 at 6.27.52 PM.jpeg', 'image/jpeg', 0, '2025-02-27 23:15:16', '2025-02-27 23:15:25', NULL),
(109, 22, 'gallery/thar/1740717916_WhatsApp Image 2023-03-30 at 6.27.51 PM.jpeg', 'image/jpeg', 1, '2025-02-27 23:15:16', '2025-02-27 23:15:25', NULL),
(110, 21, 'gallery/giser-36/1740717959_access125.jpeg', 'image/jpeg', 1, '2025-02-27 23:15:59', '2025-02-27 23:16:08', NULL),
(111, 21, 'gallery/giser-36/1740717959_access125(1).jpeg', 'image/jpeg', 0, '2025-02-27 23:15:59', '2025-02-27 23:16:08', NULL),
(112, 20, 'gallery/dream-yuga/1740717994_shine sp(1).jpeg', 'image/jpeg', 1, '2025-02-27 23:16:34', '2025-02-27 23:16:45', NULL),
(113, 20, 'gallery/dream-yuga/1740717994_shine sp.jpeg', 'image/jpeg', 0, '2025-02-27 23:16:34', '2025-02-27 23:16:45', NULL),
(114, 18, 'gallery/innova-556/1740718034_WhatsApp Image 2023-03-30 at 6.20.02 PM (1).jpeg', 'image/jpeg', 1, '2025-02-27 23:17:14', '2025-02-27 23:17:18', NULL),
(115, 17, 'gallery/pluser-220/1740718134_plusar 125.jpeg', 'image/jpeg', 1, '2025-02-27 23:18:54', '2025-02-27 23:18:58', NULL),
(117, 40, 'gallery/test/1741853954_Screenshot from 2025-03-05 18-44-05.png', 'image/png', 1, '2025-03-13 02:49:14', '2025-03-13 02:49:18', NULL),
(118, 40, 'gallery/test/1741853954_Screenshot from 2025-03-06 11-28-48.png', 'image/png', 0, '2025-03-13 02:49:14', '2025-03-13 02:49:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`),
  ADD KEY `brands_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourite_vehicals`
--
ALTER TABLE `favourite_vehicals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourite_vehicals_vehical_id_foreign` (`vehical_id`),
  ADD KEY `favourite_vehicals_user_id_foreign` (`user_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiries_vehical_id_foreign` (`vehical_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `models_slug_unique` (`slug`),
  ADD KEY `models_brand_id_foreign` (`brand_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `vehicals`
--
ALTER TABLE `vehicals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicals_slug_unique` (`slug`),
  ADD KEY `vehicals_category_id_foreign` (`category_id`),
  ADD KEY `vehicals_brand_id_foreign` (`brand_id`),
  ADD KEY `vehicals_model_id_foreign` (`model_id`);

--
-- Indexes for table `vehical_galleries`
--
ALTER TABLE `vehical_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehical_galleries_vehical_id_foreign` (`vehical_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_vehicals`
--
ALTER TABLE `favourite_vehicals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `vehicals`
--
ALTER TABLE `vehicals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `vehical_galleries`
--
ALTER TABLE `vehical_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favourite_vehicals`
--
ALTER TABLE `favourite_vehicals`
  ADD CONSTRAINT `favourite_vehicals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourite_vehicals_vehical_id_foreign` FOREIGN KEY (`vehical_id`) REFERENCES `vehicals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_vehical_id_foreign` FOREIGN KEY (`vehical_id`) REFERENCES `vehicals` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicals`
--
ALTER TABLE `vehicals`
  ADD CONSTRAINT `vehicals_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicals_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicals_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehical_galleries`
--
ALTER TABLE `vehical_galleries`
  ADD CONSTRAINT `vehical_galleries_vehical_id_foreign` FOREIGN KEY (`vehical_id`) REFERENCES `vehicals` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

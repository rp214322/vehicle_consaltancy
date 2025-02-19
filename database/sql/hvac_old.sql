-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2025 at 11:55 AM
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
  `category_id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'TATA', 1, '2023-03-28 08:32:23', '2023-03-28 22:40:48'),
(2, 3, 'HYUNDAI', 1, '2023-03-28 08:33:42', '2023-03-28 22:43:01'),
(3, 3, 'HONDA', 1, '2023-03-28 08:57:46', '2023-03-28 22:41:14'),
(4, 3, 'MARUTI SUZUKI', 1, '2023-03-28 22:43:35', '2023-03-28 22:43:35'),
(5, 3, 'TOYOTA', 1, '2023-03-28 22:44:01', '2023-03-28 22:44:13'),
(6, 3, 'MAHINDRA', 0, '2023-03-28 22:44:36', '2023-03-28 22:44:36'),
(7, 3, 'VOLKSWAGEN', 1, '2023-03-28 22:44:57', '2023-03-28 22:44:57'),
(8, 3, 'FORD', 1, '2023-03-28 22:45:21', '2023-03-28 22:45:21'),
(9, 3, 'KIA', 1, '2023-03-28 22:45:35', '2023-03-28 22:45:35'),
(10, 3, 'SKODA', 1, '2023-03-28 22:45:55', '2023-03-28 22:45:55'),
(11, 1, 'BAJAJ', 1, '2023-03-28 22:46:32', '2023-03-28 22:46:32'),
(12, 1, 'HONDA', 1, '2023-03-28 22:46:45', '2023-03-28 22:46:45'),
(13, 1, 'HERO', 1, '2023-03-28 22:47:02', '2023-03-28 22:47:02'),
(14, 1, 'SUZUKI', 1, '2023-03-28 22:47:17', '2023-03-28 22:47:17'),
(15, 1, 'YAMAHA', 1, '2023-03-28 22:47:53', '2023-03-28 22:47:53'),
(17, 1, 'TVS', 0, '2023-03-29 07:06:29', '2023-03-29 07:08:02'),
(20, 1, 'ROYAL ENFIELD', 0, '2023-03-29 07:08:40', '2023-03-29 07:08:40'),
(21, 1, 'KTM', 0, '2023-03-29 07:08:58', '2023-03-29 07:08:58'),
(22, 1, 'BMW', 0, '2023-03-29 23:20:13', '2023-03-29 23:20:13'),
(23, 1, 'JUPITER 123', 1, '2024-05-31 10:18:20', '2024-05-31 10:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, '2 Wheeler', '2-wheeler', '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(3, '4 Wheeler', '4-wheeler', '2023-03-28 08:18:44', '2023-03-28 08:18:44');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourite_vehicals`
--

INSERT INTO `favourite_vehicals` (`id`, `user_id`, `vehical_id`, `created_at`, `updated_at`) VALUES
(2, 1, 13, '2023-03-30 08:42:55', '2023-03-30 08:42:55'),
(6, 1, 22, '2023-04-02 05:22:54', '2023-04-02 05:22:54'),
(7, 1, 16, '2023-04-02 05:23:34', '2023-04-02 05:23:34'),
(9, 36, 37, '2023-04-20 09:49:04', '2023-04-20 09:49:04'),
(10, 36, 13, '2023-04-20 09:49:14', '2023-04-20 09:49:14'),
(11, 36, 22, '2023-04-20 09:49:16', '2023-04-20 09:49:16'),
(12, 36, 16, '2023-04-20 09:49:35', '2023-04-20 09:49:35'),
(13, 36, 15, '2023-04-20 09:49:49', '2023-04-20 09:49:49'),
(14, 51, 23, '2023-10-11 08:15:33', '2023-10-11 08:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `description`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 'i recently visite the \"hvsc\" site, i found it to very friendly and it hed some great features.it is a best management system site .', '5', 1, '2023-04-03 07:59:28', '2023-04-03 07:59:28'),
(3, 24, 'it is a good and help full site.', '4.5', 1, '2023-04-19 23:52:43', '2023-04-19 23:52:43'),
(4, 49, 'it is a very very usefull site', '5', 1, '2023-04-20 10:02:30', '2023-04-20 10:02:30'),
(5, 48, 'it is a good responce to site', '4.5', 1, '2023-04-20 10:05:35', '2023-04-20 10:05:35'),
(6, 50, 'thanks for a good reply and best selling site', '4.5', 1, '2023-04-20 10:07:26', '2023-04-20 10:07:26'),
(7, 49, 'ef', '2.5', 1, '2023-04-20 22:51:40', '2023-04-20 22:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `vehical_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `user_id`, `vehical_id`, `category_id`, `name`, `email`, `phone`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 24, NULL, 'yash', 'yash@gmail.com', '9632587412', 'nice', 1, '2023-03-30 21:08:13', '2023-03-30 21:08:13'),
(5, NULL, NULL, NULL, 'shivani', 'rmking@123', '98745632145', NULL, 1, '2023-03-30 21:09:03', '2023-04-02 05:59:53'),
(9, NULL, 28, NULL, 'kavi', 'kavi1292@gmail.com', '7490838141', NULL, 1, '2023-04-20 00:04:47', '2023-04-20 00:04:47'),
(10, 28, 23, NULL, 'Audie Trantow Stella Kertzmann', 'eve25@example.net', '646', 'asdas', 1, '2023-04-20 06:07:57', '2023-04-20 06:09:56'),
(11, 48, 35, NULL, 'kavita patel', 'kavi1292@gmail.com', '9157541292', NULL, 0, '2023-04-20 10:04:57', '2023-04-20 10:04:57'),
(12, 50, 37, NULL, 'shivay patel', 'shivu81222@gmail.com', '9909365298', NULL, 0, '2023-04-20 10:06:30', '2023-04-20 10:06:30'),
(13, 36, 37, NULL, 'Administrator', 'admin@example.com', '9157541292', NULL, 0, '2023-04-21 01:22:23', '2023-04-21 01:22:23'),
(14, 36, 16, NULL, 'Administrator', 'admin@example.com', '78945612332', NULL, 0, '2023-04-21 01:24:08', '2023-04-21 01:24:08'),
(15, NULL, NULL, NULL, 'yash', 'yash1292@gmail.com', '654654', NULL, 0, '2023-10-11 08:09:52', '2023-10-11 08:09:52'),
(16, NULL, NULL, NULL, 'yash', 'shivu81222@gmail.com', '6546546455', NULL, 0, '2023-10-11 08:10:13', '2023-10-11 08:10:13'),
(17, 51, 15, NULL, 'dsf dfsdfdsfs', 'dsf@fgdg.com', '3656563256', 'nathin lwcy', 0, '2023-10-11 08:16:39', '2023-10-11 08:16:39');

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
(10, '2023_03_03_155854_create_inquries_table', 1),
(11, '2023_03_03_155915_create_feedbacks_table', 1),
(12, '2023_03_30_055747_create_favourite_vehicals_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `brand_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'HARRIER', 1, '2023-03-28 22:51:09', '2023-03-28 22:51:09'),
(4, 1, 'PUNCH', 1, '2023-03-28 22:51:21', '2023-03-28 22:51:21'),
(5, 1, 'NEXON', 1, '2023-03-28 22:51:42', '2023-03-28 22:51:42'),
(6, 1, 'TIAGO', 0, '2023-03-28 22:51:54', '2023-03-28 22:51:54'),
(7, 1, 'SAFARI', 1, '2023-03-28 22:52:11', '2023-03-28 22:52:11'),
(8, 1, 'ALTROZ', 1, '2023-03-28 22:52:28', '2023-03-28 22:52:28'),
(9, 1, 'HEXA', 1, '2023-03-28 22:52:41', '2023-03-28 22:52:41'),
(10, 2, 'VARNA', 1, '2023-03-28 22:59:34', '2023-03-28 22:59:34'),
(11, 2, 'I12', 1, '2023-03-28 23:00:06', '2023-03-28 23:00:06'),
(12, 2, 'I10', 1, '2023-03-28 23:00:21', '2023-03-28 23:00:21'),
(13, 2, 'ALCZAR', 1, '2023-03-28 23:00:39', '2023-03-28 23:00:39'),
(14, 2, 'VANUE', 1, '2023-03-28 23:00:56', '2023-03-28 23:00:56'),
(15, 2, 'AURA', 1, '2023-03-28 23:01:19', '2023-03-28 23:01:19'),
(16, 2, 'NSX', 1, '2023-03-28 23:01:36', '2023-03-28 23:01:36'),
(17, 2, 'ACCENT', 1, '2023-03-28 23:01:53', '2023-03-28 23:01:53'),
(18, 2, 'XENT', 1, '2023-03-28 23:02:10', '2023-03-28 23:02:10'),
(19, 3, 'CITY', 1, '2023-03-28 23:02:28', '2023-03-28 23:02:28'),
(20, 3, 'CIVIC', 1, '2023-03-28 23:02:44', '2023-03-28 23:02:44'),
(21, 3, 'AMAZE', 1, '2023-03-28 23:03:00', '2023-03-28 23:03:00'),
(22, 3, 'JAZZ', 1, '2023-03-28 23:03:12', '2023-03-28 23:03:12'),
(23, 3, 'WR-V', 1, '2023-03-28 23:03:27', '2023-03-28 23:03:27'),
(24, 3, 'BR-V', 0, '2023-03-28 23:03:43', '2023-03-28 23:03:43'),
(25, 4, 'BREZZA', 1, '2023-03-28 23:04:07', '2023-03-28 23:04:07'),
(26, 4, 'ALTO', 1, '2023-03-28 23:04:23', '2023-03-28 23:04:23'),
(27, 4, 'SWIFT', 1, '2023-03-28 23:04:45', '2023-03-28 23:04:45'),
(28, 4, 'SWIFT DZIRE', 1, '2023-03-28 23:05:06', '2023-03-28 23:05:06'),
(29, 4, 'SX4', 0, '2023-03-28 23:05:17', '2023-03-28 23:05:17'),
(30, 4, 'CIZE', 1, '2023-03-28 23:05:33', '2023-03-28 23:05:33'),
(31, 4, 'BALENO', 1, '2023-03-28 23:05:55', '2023-03-28 23:05:55'),
(32, 5, 'FORTUNER', 1, '2023-03-28 23:06:23', '2023-03-28 23:06:23'),
(33, 5, 'VELLFIRE', 1, '2023-03-28 23:06:41', '2023-03-28 23:06:41'),
(34, 5, 'INNOVA', 1, '2023-03-28 23:07:00', '2023-03-28 23:07:00'),
(35, 5, 'GLANZA', 1, '2023-03-28 23:07:22', '2023-03-28 23:07:22'),
(36, 6, 'SCORPIO', 1, '2023-03-28 23:07:48', '2023-03-28 23:07:48'),
(37, 6, 'BOLERO NEO', 1, '2023-03-28 23:08:15', '2023-03-28 23:08:15'),
(38, 6, 'XUV500', 0, '2023-03-28 23:08:36', '2023-03-28 23:08:36'),
(39, 6, 'XUV300', 1, '2023-03-28 23:09:01', '2023-03-28 23:09:01'),
(40, 6, 'THAR', 1, '2023-03-28 23:09:18', '2023-03-28 23:09:18'),
(41, 6, 'MARAZZO', 1, '2023-03-28 23:09:37', '2023-03-28 23:09:37'),
(42, 7, 'POLO', 1, '2023-03-28 23:09:58', '2023-03-28 23:09:58'),
(43, 7, 'VENTO', 1, '2023-03-28 23:10:24', '2023-03-28 23:10:24'),
(44, 7, 'TIGUAN', 1, '2023-03-28 23:10:47', '2023-03-28 23:10:47'),
(45, 7, 'AMEO', 1, '2023-03-28 23:11:05', '2023-03-28 23:11:05'),
(46, 8, 'ECOSPORT', 1, '2023-03-28 23:11:35', '2023-03-28 23:11:35'),
(47, 8, 'FREESTYLE', 1, '2023-03-28 23:11:59', '2023-03-28 23:11:59'),
(48, 8, 'MUSTANG', 1, '2023-03-28 23:12:22', '2023-03-28 23:12:22'),
(49, 8, 'ASPIRE', 1, '2023-03-28 23:12:41', '2023-03-28 23:12:41'),
(50, 8, 'GT40', 1, '2023-03-28 23:12:58', '2023-03-28 23:12:58'),
(51, 8, 'FOCUS', 1, '2023-03-28 23:13:13', '2023-03-28 23:13:13'),
(52, 8, 'FIESTA', 1, '2023-03-28 23:13:32', '2023-03-28 23:13:32'),
(53, 8, 'FIGO', 1, '2023-03-28 23:13:45', '2023-03-28 23:13:45'),
(54, 8, 'THUNDERBIRD', 1, '2023-03-28 23:14:17', '2023-03-28 23:14:17'),
(55, 9, 'SELTOS', 1, '2023-03-28 23:14:40', '2023-03-28 23:14:40'),
(56, 9, 'CARNIVAL', 1, '2023-03-28 23:14:59', '2023-03-28 23:14:59'),
(57, 9, 'EV6', 1, '2023-03-28 23:15:13', '2023-03-28 23:15:13'),
(58, 9, 'SONET', 1, '2023-03-28 23:15:30', '2023-03-28 23:15:30'),
(59, 9, 'STINGER', 1, '2023-03-28 23:15:50', '2023-03-28 23:15:50'),
(60, 9, 'CARENS', 1, '2023-03-28 23:16:14', '2023-03-28 23:16:14'),
(61, 10, 'OCTAVIA', 1, '2023-03-28 23:16:34', '2023-03-28 23:16:34'),
(62, 10, 'SUPERB', 1, '2023-03-28 23:16:54', '2023-03-28 23:16:54'),
(63, 10, 'SLAVIA', 1, '2023-03-28 23:17:10', '2023-03-28 23:17:10'),
(64, 10, 'KUSHAQ', 1, '2023-03-28 23:17:27', '2023-03-28 23:17:27'),
(65, 10, 'KODIAQ', 1, '2023-03-28 23:17:45', '2023-03-28 23:17:45'),
(66, 12, 'LIVO', 0, '2023-03-28 23:18:47', '2023-03-28 23:22:39'),
(67, 11, 'RIDER', 1, '2023-03-28 23:19:08', '2023-03-28 23:19:08'),
(68, 11, 'PULSAR NS 220', 1, '2023-03-28 23:19:33', '2023-03-28 23:19:33'),
(69, 12, 'SHINE SP', 1, '2023-03-28 23:19:55', '2023-03-28 23:19:55'),
(70, 13, 'GLAMOUR', 1, '2023-03-28 23:20:21', '2023-03-28 23:20:21'),
(71, 13, 'SPLENDOR', 1, '2023-03-28 23:20:50', '2023-03-28 23:20:50'),
(72, 14, 'ACCESS 125', 1, '2023-03-28 23:21:17', '2023-03-28 23:21:17'),
(73, 15, 'MT', 1, '2023-03-28 23:21:33', '2023-03-28 23:21:33'),
(74, 15, 'R15', 0, '2023-03-28 23:21:48', '2023-03-28 23:21:48'),
(75, 15, 'FZ-5', 1, '2023-03-28 23:22:12', '2023-03-28 23:22:12'),
(76, 17, 'JUPITER 125', 0, '2023-03-29 07:12:47', '2023-03-29 07:12:47'),
(77, 17, 'ROHIN', 1, '2023-03-29 07:14:27', '2023-03-29 07:14:27'),
(78, 20, 'HUNTER', 1, '2023-03-29 07:15:21', '2023-03-29 07:15:21'),
(79, 20, 'CLASSIC 350', 1, '2023-03-29 07:15:48', '2023-03-29 07:15:48'),
(80, 20, 'CONTINENTAL GT 650', 0, '2023-03-29 07:16:22', '2023-03-29 07:16:22'),
(81, 20, 'HIMALAYAN', 0, '2023-03-29 07:16:48', '2023-03-29 07:16:48'),
(82, 13, 'PASSION PRO', 1, '2023-03-29 07:17:32', '2023-03-29 07:17:32'),
(83, 11, 'PULSAR 125', 0, '2023-03-29 07:27:01', '2023-03-29 07:27:01'),
(84, 12, 'DIO', 0, '2023-03-29 23:15:12', '2023-03-29 23:15:12'),
(86, 21, 'DUKE 350', 0, '2023-03-29 23:16:55', '2023-03-29 23:16:55'),
(87, 17, 'NTORQ', 0, '2023-03-29 23:17:35', '2023-03-29 23:17:35'),
(88, 12, 'UNICORN', 0, '2023-03-29 23:18:38', '2023-03-29 23:18:38'),
(89, 12, 'ACTIVA 3G', 1, '2023-03-29 23:19:15', '2023-03-29 23:19:15'),
(90, 22, 'G 310 R', 0, '2023-03-29 23:22:20', '2023-03-29 23:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role` enum('admin','customer') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'customer', 'Helga Fadel', 'Cindy Johnston IV', NULL, 'calista35@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'z0MTdUug2l', '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(3, 'customer', 'Marcelo Stiedemann', 'Lenny Torp', NULL, 'lhessel@example.org', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YwmkhPtdLU', '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(4, 'customer', 'Delilah Kozey', 'Mr. Mckenzie Tromp', NULL, 'sstark@example.org', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TuerWfDVik', '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(5, 'customer', 'Marcellus Towne', 'Prof. Steve Grant IV', NULL, 'cleveland.macejkovic@example.org', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IaaWL9TRNK', '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(6, 'customer', 'Leone Reinger I', 'Adah Collier I', NULL, 'nathan47@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YGMbpSHfbL', '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(7, 'customer', 'Berenice Hammes', 'Barbara Fisher II', NULL, 'lyla40@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1ql0q8DvLO', '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(8, 'customer', 'Lloyd Corwin', 'Amya Mayer', NULL, 'vschmeler@example.org', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uiVhISNj7c', '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(9, 'customer', 'Ms. Stacy Haag', 'Theresa Kunze', NULL, 'alockman@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'o6cFZQBtg8', '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(10, 'customer', 'Miss Yasmeen Kemmer Sr.', 'Emilie Koch', NULL, 'kianna.murray@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0lpS0MgVHg', '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(11, 'customer', 'Dr. Novella Nikolaus MD', 'Beryl Haley', NULL, 'stokes.nicholas@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6gTey1uJDi', '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(13, 'admin', 'yash', 'patel', '9157541292', 'yash1292@gmail.com', '2023-04-02 04:54:16', '$2y$10$vJm4Ecn4KG9iR9osssHAy.pdpEi7VIqqBwS5Y8NqFnQy4.E9UZRWq', 'CSLGDJnILqPrKWe18ycWfTqrJQRPAwwoq1j2Oz6F62WjN33kl3bGrNG139Tt', '2023-04-02 04:54:16', '2023-04-03 08:21:03'),
(14, 'customer', 'Lue Cartwright', 'Amira Schaefer', NULL, 'bins.payton@example.com', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nwUAc8Nt9z', '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(15, 'customer', 'Matt Von', 'Bernie Christiansen', NULL, 'schmeler.leilani@example.org', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vP54A5pAqP', '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(16, 'customer', 'Audrey Kemmer', 'Grant Sawayn', NULL, 'cankunding@example.com', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ouyGjSCH3H', '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(17, 'customer', 'Prof. Alfredo Waters PhD', 'Hector Macejkovic PhD', NULL, 'marisol36@example.net', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9gA9BWYtg1', '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(18, 'customer', 'Ollie Torp III', 'Beth Bayer', NULL, 'johns.gennaro@example.org', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7PSnVlB6Vn', '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(19, 'customer', 'Annamarie Paucek', 'Prof. Freddie Pouros Sr.', NULL, 'lgreenholt@example.org', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6Nik6ILKQR', '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(20, 'customer', 'Ayla Schroeder', 'Kallie Barrows', NULL, 'rollin.romaguera@example.org', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kzX2CkAQd2', '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(21, 'customer', 'Celestino Cummerata', 'Lula Wehner', NULL, 'von.frederic@example.org', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cELQbLHHeE', '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(22, 'customer', 'Marilyne Heaney', 'Gillian Bartoletti', NULL, 'zhyatt@example.net', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rSqXgrcUpK', '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(23, 'customer', 'Adelia Kautzer', 'Mr. Nels Medhurst MD', NULL, 'lmacejkovic@example.net', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2JmetXdnT7', '2023-04-02 04:54:19', '2023-04-02 04:54:19'),
(24, 'admin', 'devanshi', 'ballar', '9824732223', 'devanshiballer12i@gmail.com', '2023-04-19 23:24:03', '$2y$10$K0On/LOsSXRLRZrlJCv1uOmwIwM4z/PumNDcT94UfjX5/AkZAWRTG', 'JCaKrkTA1tAsS8NG5hteS8TH3FRx1HJGWpzO4z3DF60yTAiuoU9u1Dlol9TE', '2023-04-19 23:24:03', '2023-04-19 23:58:23'),
(25, 'customer', 'Luther Hauck', 'Toy Reinger', NULL, 'cummerata.nicholaus@example.com', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'T9wtRIb4ME', '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(26, 'customer', 'Tiana Quigley', 'Casey Predovic', NULL, 'ijohnston@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3GBLo7aE8A', '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(27, 'customer', 'Ettie Pouros', 'Talia Swaniawski Sr.', NULL, 'jayson.jenkins@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NEd6Gk36Ke', '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(28, 'customer', 'Audie Trantow', 'Stella Kertzmann', '6686', 'eve25@example.net', '2023-04-19 23:24:05', '$2y$10$WSXQqgpYCPqYWNjI7bLtBu.yUjTUEHLfJvQtKRroBnfJpXpsqqeBy', 'Y0ydlasTMIBbLSZMv9BOPbHGsYIeuBenulRq5UZIqTmSO4Y8X0NdA6nsyvVQ', '2023-04-19 23:24:05', '2023-04-20 06:05:17'),
(29, 'customer', 'Charity Schneider', 'Mr. Kay Stanton III', NULL, 'isadore10@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NEnc48XCbV', '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(30, 'customer', 'Ted Mann', 'Prof. Gay Harris IV', NULL, 'jheidenreich@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5sFi26SSpy', '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(31, 'customer', 'Dr. Gracie Cassin', 'Lonnie Nikolaus', NULL, 'ferry.faustino@example.com', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'F4BsYdp9un', '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(32, 'customer', 'Karlee Kovacek PhD', 'Serenity Roob', NULL, 'fern83@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'a2bdC7767U', '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(33, 'customer', 'Cordell Smitham', 'Jacklyn Hills IV', NULL, 'oswald59@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YzKOeTA14S', '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(34, 'customer', 'Rubye Wyman', 'Katlynn O\'Kon', NULL, 'cindy63@example.com', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Uj6YOXosY4', '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(36, 'admin', 'Administrator', '', NULL, 'admin@example.com', '2023-04-20 00:12:37', '$2y$10$WSXQqgpYCPqYWNjI7bLtBu.yUjTUEHLfJvQtKRroBnfJpXpsqqeBy', 'oYAZzdBGb9G69BAP0fFiTkzMEYkDYAs699N6L8FFmMTgog4cP7f6kiVOom7a', '2023-04-20 00:12:37', '2023-04-20 00:12:37'),
(37, 'customer', 'Thea Greenholt', 'Neoma Shanahan V', NULL, 'dkirlin@example.net', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wFJyxQdCjS', '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(38, 'customer', 'Mara Witting', 'Jovan Wyman', NULL, 'arch35@example.net', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Cz3rWZuwWC', '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(39, 'customer', 'Casimir Koepp', 'Giovanny Rosenbaum', NULL, 'delaney72@example.com', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Q0hdlOk7A4', '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(40, 'customer', 'Ethelyn Mueller', 'Earnestine Heller IV', NULL, 'mbreitenberg@example.net', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cMwvyLWcTD', '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(41, 'customer', 'Demario Reynolds', 'Steve Deckow V', NULL, 'nicklaus.monahan@example.org', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'R5lUt2CDU9', '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(42, 'customer', 'Arden Mitchell', 'Rupert O\'Keefe', NULL, 'toy.marquardt@example.net', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '88tRlP36oE', '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(43, 'customer', 'Gunner Howe', 'Lamar Schumm', NULL, 'wiza.giovanny@example.com', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eIHRg3c5DH', '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(44, 'customer', 'Olen Hyatt', 'Emmett Jacobi Sr.', NULL, 'oborer@example.com', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LqLtPWbSee', '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(45, 'customer', 'Hal Schulist', 'Chance Boyer', NULL, 'mprosacco@example.com', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EsUBEZ8Vob', '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(46, 'customer', 'Skye Denesik', 'Dr. Jaquan Beahan II', NULL, 'carmela.bergnaum@example.com', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Td8yC64PPz', '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(47, 'customer', 'test', 'test', '97997', 'test1@gmail.com', NULL, '$2y$10$GP7AAn0Fs2eRpThmo.7hs.C4kEMc1nf9PxqqKoJGTOu/F7yEkoOOe', NULL, '2023-04-20 06:19:28', '2023-04-20 06:19:28'),
(48, 'customer', 'kavita', 'patel', '9157541292', 'kavi1292@gmail.com', '2023-04-20 09:55:23', '$2y$10$oyvTQ/9PqpGn6fMjMlU7DeCIJRjsRr2Y.fFdA1uB6FFWDC/tQqvDW', NULL, '2023-04-20 09:55:23', '2023-04-20 09:55:23'),
(49, 'customer', 'julee', 'patel', '9909339543', 'julee993@gamil.com', '2023-04-20 09:56:30', '$2y$10$gpo7knG4.cC1EWWPLDQJ7.d2zRp0GU3w4UdhJ8PHDJCEqBOmVWx1y', NULL, '2023-04-20 09:56:30', '2023-04-20 09:56:30'),
(50, 'customer', 'shivay', 'patel', '9909365298', 'shivu81222@gmail.com', '2023-04-20 09:58:39', '$2y$10$yLKrfZ.3MyKUh6kOsS5TDOkV8dG.cHR/Rqx5BLYNi3ydJZPMMj9C.', NULL, '2023-04-20 09:58:39', '2023-04-20 09:58:39'),
(51, 'customer', 'dsf', 'dfsdfdsfs', '3656563256', 'dsf@fgdg.com', NULL, '$2y$10$A2Ju0kujW6XusC9hY1sf3.CbnGUIvZnnue.PTJ6ES42ieCb9vjB5.', NULL, '2023-10-11 08:15:09', '2023-10-11 08:15:09'),
(52, 'customer', 'abhi', 'patel', '9313533288', 'abhaypatel2354@gmail.com', '2024-05-31 09:25:37', '$2y$10$.o1fZHPdIFeV47rPu.5D8O/bDFb/nK0eGlRA6dM/q1TEnXK6tCLxC', NULL, '2024-05-31 09:25:37', '2024-05-31 09:25:37');

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
  `fuel` enum('petrol','diesal','electric') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'petrol',
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mileage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(16,2) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicals`
--

INSERT INTO `vehicals` (`id`, `category_id`, `brand_id`, `model_id`, `title`, `slug`, `year`, `fuel`, `color`, `mileage`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(13, 3, 2, 10, 'Verna 2018', 'verna-2018', 2018, 'petrol', 'BLACK', '25', '5000.00', '<p>One look at the all-new Hyundai VERNA and you know it&rsquo;s something that this world has never seen before. There is a mesmerising mystical magnetism and sensuous sportiness in its futuristic design that is truly tantalising. Complimented with a chiselled aerodynamic frame that gives it a furiously fast look. It can best be described in two words.</p>', 0, '2023-03-30 08:39:05', '2024-01-17 05:58:52'),
(14, 3, 2, 13, 'Creata 2023', 'creata-2023', 2023, 'petrol', 'white', '15', '1500000.00', 'Hyundai CRETA is equipped with home-to-car with Alexa and Google voice assistant, advanced Bluelink app and more. Now with an app on your smart watch and smartphone you have the power to control your car from the comfort of your home or office using Alexa and Google Voice Assistant or Bluelink app.', 1, '2023-03-30 08:47:31', '2023-03-30 11:44:16'),
(15, 1, 12, 89, 'Active 2015', 'active-2015', 2019, 'petrol', 'white', '30', '15000.00', '<p>Honda Activa 3G is a scooter available at a starting price of Rs. 76,001 in India. It is available in 4 variants and 10 colours with top variant price starting from Rs. 81,999. The Honda Activa 3G is powered by 109.51cc BS6 engine which develops a power of 7.73 bhp and a torque of 8.90 Nm. With both front and rear drum brakes, Honda Activa 6G comes up with&nbsp;</p>', 0, '2023-03-30 08:50:24', '2023-03-30 08:51:21'),
(16, 1, 20, 79, 'Bullet Classical 350', 'bullet-classical-350', 2018, 'diesal', 'Red', '10', '50000.00', '<p>Through historical references, stories and anecdotes shared by our key collaborators, we would like to take you on a wistful trip down memory lane to live the legacy of the Timeless Classic - from its inception, captured in a monochromatic photograph of the G2 Model, to the journey it took to becoming the most loved motorcycle across the globe.</p>', 0, '2023-03-30 09:01:57', '2023-04-20 23:41:31'),
(17, 1, 11, 68, 'Pluser 220', 'pluser-220', 2018, 'petrol', 'Black', '15', '50000.00', 'Bajaj Pulsar 220 F is a bike available at a starting price of Rs. 1,36,422 in India. It is available in only 1 variant and 4 colours. The Bajaj Pulsar 220 F is powered by 220cc BS6 engine which develops a power of 20.11 bhp and a torque of 18.55 Nm. With both front and rear disc brakes, Bajaj Pulsar 220 F comes up with anti-locking braking system. This Pulsar 220 F bike weighs 160 kg and has a fuel tank capacity of 15 liters.', 0, '2023-03-30 09:03:58', '2023-03-30 09:03:58'),
(18, 3, 5, 34, 'Innova 556', 'innova-556', 2014, 'diesal', 'black', '50', '90000.00', 'The Toyota Innova Crysta soldiers on alongside its successor, the Toyota Innova Hycross, as the Japanese brand knows there is no replacement for its formula of ladder-frame chassis and diesel engine, with faultless reliability. Targeted more at the fleet market now, it has shed its petrol engine and auto gearbox, and is now only available with the 2.4 diesel and a manual. You still, however, get seven and eight-seat configurations.', 1, '2023-03-30 09:05:52', '2023-03-30 09:24:23'),
(19, 3, 4, 28, 'Swift lxi 2015', 'swift-lxi-2015', 2010, 'electric', 'black', '50', '400000.00', '<p>Ex-Showroom Price: ₹6.44 lakhs - ₹9.31 lakhs Fuel economy: 22-31 km/l combined Dimensions: 3,995 mm L x 1,735 mm W x 1,515 mm H Curb weight: 880 to 990 kg Fuel tank capacity: 37 to 55 L Engine: 1.2 L 4-cylinder, 1.2 L 4-cylinder natural gas</p>', 0, '2023-03-30 09:07:57', '2023-03-30 11:16:11'),
(20, 1, 12, 69, 'SHINE SP', 'dream-yuga', 2012, 'petrol', 'red', '60', '16000.00', '<p>Honda has launched the Dream Yuga with CBS (Combined Braking System), priced at Rs 54,807 (ex-showroom, Delhi). That&#39;s a premium of Rs 560 over the non-CBS variant. Apart from this, the bike remains unchanged. It gets sporty graphics, body-coloured rear view mirrors, rolling resistance tyres and a new colour scheme - black with Sunset brown. In terms of design, the Dream Yuga is virtually identical to its elder sibling, the Honda Shine. It features a no-nonsense design with a basic headlight, clear lens indicators, angular tail light, body-coloured grab rail, and an analogue instrument console featuring two round pods.</p>', 0, '2023-03-30 09:09:36', '2023-04-20 09:26:46'),
(21, 1, 14, 72, 'Giser 36', 'giser-36', 2016, 'petrol', 'red', '30', '36000.00', 'Honda has launched the Dream Yuga with CBS (Combined Braking System), priced at Rs 54,807 (ex-showroom, Delhi). That\'s a premium of Rs 560 over the non-CBS variant. Apart from this, the bike remains unchanged. It gets sporty graphics, body-coloured rear view mirrors, rolling resistance tyres and a new colour scheme - black with Sunset brown. In terms of design, the Dream Yuga is virtually identical to its elder sibling, the Honda Shine. It features a no-nonsense design with a basic headlight, clear lens indicators, angular tail light, body-coloured grab rail, and an analogue instrument console featuring two round pods.', 0, '2023-03-30 09:12:38', '2023-03-30 09:12:38'),
(22, 3, 6, 40, 'thar', 'thar', 2020, 'petrol', 'red', '35', '540000.00', NULL, 1, '2023-03-30 09:13:54', '2023-03-30 11:45:24'),
(23, 3, 3, 19, 'city', 'city', 2019, 'diesal', 'white', '30', '1600000.00', NULL, 0, '2023-03-30 09:14:46', '2023-03-30 09:14:46'),
(24, 1, 20, 80, 'royal enfield', 'royal-enfield', 2016, 'petrol', 'BLACK', '15', '40000.00', NULL, 0, '2023-03-30 09:16:06', '2023-03-30 09:16:06'),
(25, 3, 3, 23, 'WR-V', 'wr-v', 2018, 'petrol', 'white', '25', '650000.00', NULL, 0, '2023-03-30 11:31:21', '2023-03-30 20:56:44'),
(26, 1, 13, 71, 'SPLENDOR', 'splendor', 2017, 'petrol', 'black', '15', '15000.00', NULL, 1, '2023-03-30 11:40:53', '2023-03-30 11:46:21'),
(27, 3, 1, 3, 'Harrier', 'harrier', 2021, 'petrol', 'white', '35', '500000.00', NULL, 0, '2023-03-30 20:55:23', '2023-03-30 20:55:23'),
(28, 3, 1, 4, 'punch', 'punch', 2021, 'petrol', 'BLUE', '27', '750000.00', NULL, 0, '2023-03-30 21:02:12', '2023-03-30 21:02:12'),
(29, 3, 1, 5, 'nexon', 'nexon', 2019, 'electric', 'green', '25', '500000.00', NULL, 0, '2023-04-20 05:09:43', '2023-04-20 05:09:43'),
(33, 3, 4, 25, 'brezza', 'brezza', 2017, 'diesal', 'silver', '19', '300000.00', NULL, 0, '2023-04-20 09:28:00', '2023-04-20 09:29:16'),
(34, 1, 12, 66, 'livo', 'livo', 2017, 'petrol', 'BLACK', '35', '65000.00', NULL, 0, '2023-04-20 09:30:56', '2023-04-20 09:30:56'),
(35, 1, 15, 75, 'fz-s', 'fz-s', 2017, 'petrol', 'black', '45', '55000.00', NULL, 0, '2023-04-20 09:33:00', '2023-04-20 09:33:00'),
(36, 3, 9, 55, 'SELTOS', 'seltos', 2020, 'petrol', 'black', '35', '650000.00', NULL, 0, '2023-04-20 09:37:01', '2023-04-20 09:37:01'),
(37, 3, 5, 32, 'FORTUNER', 'fortuner', 2021, 'petrol', 'BLACK', '45', '3500000.00', NULL, 0, '2023-04-20 09:40:49', '2023-04-20 09:40:49'),
(38, 3, 10, 65, 'KODIAQ', 'kodiaq', 2018, 'diesal', 'BLACK', '55', '100000.00', NULL, 0, '2023-04-20 09:45:17', '2023-04-20 09:45:17');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehical_galleries`
--

INSERT INTO `vehical_galleries` (`id`, `vehical_id`, `file`, `file_type`, `is_featured`, `created_at`, `updated_at`) VALUES
(3, 13, 'VERANA.jpg', 'image', 1, '2023-03-30 08:39:41', '2023-03-30 08:39:55'),
(5, 15, 'WhatsApp Image 2023-03-30 at 7.51.03 PM.jpeg', 'image', 0, '2023-03-30 08:59:03', '2023-03-30 08:59:03'),
(6, 14, 'alczar.jpg', 'image', 0, '2023-03-30 09:20:23', '2023-03-30 09:20:23'),
(7, 16, 'classic 350.jpeg', 'image', 1, '2023-03-30 09:21:08', '2023-04-02 06:58:23'),
(8, 16, 'classic 350(1).jpeg', 'image', 0, '2023-03-30 09:21:18', '2023-04-02 06:58:23'),
(9, 18, 'innova(1).jpg', 'image', 0, '2023-03-30 09:22:07', '2023-03-30 09:22:07'),
(10, 18, 'innova.jpg', 'image', 0, '2023-03-30 09:22:24', '2023-03-30 09:22:24'),
(11, 21, 'access125.jpeg', 'image', 0, '2023-03-30 09:22:51', '2023-03-30 09:22:51'),
(12, 21, 'access125(1).jpeg', 'image', 0, '2023-03-30 09:23:03', '2023-03-30 09:23:03'),
(13, 20, 'shine sp(1).jpeg', 'image', 0, '2023-03-30 11:04:17', '2023-03-30 11:04:17'),
(14, 20, 'shine sp.jpeg', 'image', 0, '2023-03-30 11:04:31', '2023-03-30 11:04:31'),
(15, 19, 'swift(2).jpg', 'image', 0, '2023-03-30 11:05:47', '2023-03-30 11:05:47'),
(16, 22, 'WhatsApp Image 2023-03-30 at 6.27.52 PM.jpeg', 'image', 0, '2023-03-30 11:06:24', '2023-03-30 11:06:24'),
(17, 22, 'WhatsApp Image 2023-03-30 at 6.27.51 PM.jpeg', 'image', 0, '2023-03-30 11:06:42', '2023-03-30 11:06:42'),
(18, 24, 'continental gt 650.jpeg', 'image', 0, '2023-03-30 11:07:26', '2023-03-30 11:07:26'),
(19, 24, 'contonental gt 650(1).jpeg', 'image', 0, '2023-03-30 11:07:39', '2023-03-30 11:07:39'),
(20, 23, 'city.jpg', 'image', 1, '2023-03-30 11:08:20', '2025-02-19 00:51:28'),
(21, 23, 'city(1).jpg', 'image', 0, '2023-03-30 11:08:31', '2025-02-19 00:51:28'),
(22, 23, 'WhatsApp Image 2023-03-30 at 6.54.06 PM (2).jpeg', 'image', 0, '2023-03-30 11:09:01', '2025-02-19 00:51:28'),
(23, 17, 'plusar 125.jpeg', 'image', 0, '2023-03-30 11:10:58', '2023-03-30 11:10:58'),
(24, 17, 'pulsar.jpeg', 'image', 0, '2023-03-30 11:11:10', '2023-03-30 11:11:10'),
(26, 25, 'WhatsApp Image 2023-03-30 at 6.19.21 PM.jpeg', 'image', 0, '2023-03-30 11:38:42', '2023-03-30 20:57:19'),
(27, 26, 'splendor plus.jpeg', 'image', 0, '2023-03-30 11:41:24', '2023-03-30 11:41:24'),
(28, 27, 'harreir.jpg', 'image', 0, '2023-03-30 20:55:57', '2023-03-30 20:55:57'),
(29, 27, 'harrier(1).jpg', 'image', 0, '2023-03-30 20:56:07', '2023-03-30 20:56:07'),
(30, 25, 'wr-v.jpg', 'image', 1, '2023-03-30 20:57:08', '2023-03-30 20:57:19'),
(31, 28, 'punch.jpg', 'image', 0, '2023-03-30 21:04:01', '2023-03-30 21:04:01'),
(32, 29, 'WhatsApp Image 2023-03-30 at 6.24.19 PM.jpeg', 'image', 1, '2023-04-20 05:13:50', '2023-04-20 05:14:30'),
(33, 29, 'WhatsApp Image 2023-03-30 at 6.24.20 PM.jpeg', 'image', 0, '2023-04-20 05:14:11', '2023-04-20 05:14:30'),
(34, 33, 'brezza.jpg', 'image', 0, '2023-04-20 09:28:52', '2023-04-20 09:28:52'),
(35, 34, 'livo.jpeg', 'image', 1, '2023-04-20 09:31:24', '2023-04-20 09:31:49'),
(36, 34, 'livo(1).jpeg', 'image', 0, '2023-04-20 09:31:38', '2023-04-20 09:31:49'),
(37, 36, 'WhatsApp Image 2023-03-30 at 6.07.54 PM.jpeg', 'image', 0, '2023-04-20 09:37:24', '2023-04-20 09:37:24'),
(38, 35, 'fz-s.jpeg', 'image', 0, '2023-04-20 09:37:53', '2023-04-20 09:37:53'),
(39, 37, 'fortuner(1).jpg', 'image', 0, '2023-04-20 09:41:20', '2023-04-20 09:41:20'),
(40, 37, 'WhatsApp Image 2023-03-30 at 6.20.02 PM (1).jpeg', 'image', 0, '2023-04-20 09:41:57', '2023-04-20 09:41:57'),
(41, 38, 'WhatsApp Image 2023-03-30 at 6.14.22 PM.jpeg', 'image', 0, '2023-04-20 09:46:49', '2023-04-20 09:46:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicals`
--
ALTER TABLE `vehicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehical_galleries`
--
ALTER TABLE `vehical_galleries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_vehicals`
--
ALTER TABLE `favourite_vehicals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `vehicals`
--
ALTER TABLE `vehicals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `vehical_galleries`
--
ALTER TABLE `vehical_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

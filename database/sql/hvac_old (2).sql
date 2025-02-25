-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2025 at 05:44 PM
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
  `status` tinyint NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2 Wheeler', 1, NULL, '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(3, '4 Wheeler', 1, NULL, '2023-03-28 08:18:44', '2023-03-28 08:18:44'),
(10, '3 Wheels', 1, '2025-02-19 08:25:21', '2025-02-18 18:30:00', '2025-02-19 08:25:21'),
(11, 'Hero', 1, '2025-02-19 23:02:11', '2025-02-19 08:48:32', '2025-02-19 23:02:11'),
(12, 'testd', 1, '2025-02-21 04:00:11', '2025-02-21 04:00:02', '2025-02-21 04:00:11');

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
(13, 36, 15, '2023-04-20 09:49:49', '2023-04-20 09:49:49');

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
  `vehical_id` bigint UNSIGNED DEFAULT NULL,
  `type` enum('buy','sell') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'buy',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `vehical_id`, `type`, `name`, `email`, `phone`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 23, 'buy', 'Rohan Chauhan', 'rohan2@gmail.com', '9658965399', 'fdgfdgdfg', 1, NULL, '2025-02-21 04:11:01', '2025-02-24 05:58:58'),
(2, NULL, 'sell', 'Paras', 'paras@gmail.com', '9652365896', 'fdgd', 1, NULL, '2025-02-21 04:20:09', '2025-02-24 05:35:04'),
(3, NULL, 'buy', 'Sunny Parmar', 'sunny@gmail.com', '9658965896', 'dgdfg', 1, NULL, '2025-02-24 00:04:29', '2025-02-24 05:58:25'),
(4, NULL, 'sell', 'Pratham', 'pratham@gmail.com', '9658965896', NULL, 1, NULL, '2025-02-24 05:51:40', '2025-02-24 05:58:00'),
(5, NULL, 'buy', 'Nidhi', 'nidhi@gmail.com', '9658965235', NULL, 1, NULL, '2025-01-14 05:52:02', '2025-02-24 05:58:22'),
(6, 36, 'sell', 'Marilyne Hane', 'terry.bogan@example.org', '620-326-0517', 'Quis sunt quisquam dolor sit ad. Fugit ut qui explicabo rerum impedit ex. Dolorum perferendis suscipit consequatur atque esse eius.', 1, NULL, '2025-02-24 05:55:47', '2025-02-24 05:55:47'),
(7, 38, 'sell', 'Nathanael Prohaska', 'koelpin.junius@example.net', '(737) 254-8124', 'Cumque quia consectetur quia facere autem. Cum sunt expedita suscipit magni. Consequatur hic laboriosam eligendi nihil qui error architecto. Quaerat dolores eum cumque adipisci earum quibusdam.', 1, NULL, '2025-02-24 05:55:47', '2025-02-24 05:55:47'),
(8, 38, 'sell', 'Cordie Boyle', 'ralph96@example.com', '985.588.1875', 'Et cumque aut architecto nostrum. Dolorem voluptas ipsum voluptatem. In eligendi omnis reiciendis nostrum aspernatur. Doloremque excepturi sunt accusamus aut.', 1, NULL, '2025-02-24 05:55:47', '2025-02-24 05:59:02'),
(9, 23, 'buy', 'Leonel Prohaska', 'zpurdy@example.com', '323-856-0903', 'Molestiae nulla qui ut maiores eaque. Deleniti officia harum et quae voluptate. Est voluptatem veritatis qui.', 0, NULL, '2025-01-07 05:55:47', '2025-02-24 06:13:39'),
(10, NULL, 'buy', 'Carlotta Watsica', 'john.fadel@example.net', '(475) 804-7116', 'Ab provident quia officiis odio est ad. Vel qui doloribus inventore molestiae inventore doloremque. Sint quia explicabo et dolores.', 1, NULL, '2025-02-24 05:55:47', '2025-02-24 05:59:04'),
(11, 21, 'buy', 'Clara Schowalter', 'harold.grady@example.org', '434-916-9623', 'Perspiciatis rerum fugiat laboriosam officiis. Eum sed ducimus consequatur quia iste. Libero hic ut officiis officia suscipit saepe nisi. Ab repellendus soluta quasi provident consectetur.', 1, NULL, '2025-02-24 05:55:47', '2025-02-24 05:55:47'),
(12, 21, 'sell', 'Fay Funk', 'alisha42@example.org', '+15046899393', 'Culpa illo est sed voluptatem ratione consequatur. Cum ut et dolores ipsam doloremque et eligendi. Et quos expedita in non totam adipisci. Modi hic omnis eum error perspiciatis maiores quis nemo.', 1, NULL, '2025-02-24 05:55:47', '2025-02-24 05:55:47'),
(13, 22, 'buy', 'Arjun Dare', 'mschowalter@example.com', '860.441.3291', 'Provident quae fuga ut eligendi enim. Nesciunt aut vitae quos recusandae quod. Qui perspiciatis pariatur qui sed. Occaecati odio omnis ad tempora itaque quasi placeat. Maxime cum nobis nihil debitis.', 0, NULL, '2025-01-07 05:55:47', '2025-02-24 06:13:38'),
(14, 18, 'sell', 'Dr. Celestino Koch', 'geovanni.bernhard@example.com', '445.308.5132', 'Sunt error molestiae incidunt voluptatem. Et ut et enim explicabo rerum qui. Qui maiores fugiat officia deserunt omnis similique.', 1, NULL, '2025-02-24 05:55:47', '2025-02-24 05:59:12'),
(15, 20, 'sell', 'Gloria Mertz', 'zemlak.granville@example.org', '+1-351-741-1430', 'Similique perferendis quae error omnis aperiam. Quo eum eveniet quia. Quidem libero nulla dolorem nam beatae non odit.', 1, NULL, '2025-02-24 05:55:47', '2025-02-24 05:59:16'),
(16, 16, 'sell', 'Bonnie Bosco', 'rau.jared@example.net', '336-449-2641', 'Quia enim quibusdam ea provident. Sunt perferendis facere explicabo enim recusandae id hic odio. Est iure dignissimos totam eius qui architecto. Nobis ut ipsa provident qui sunt et itaque.', 0, NULL, '2025-02-24 05:55:47', '2025-02-24 05:55:47'),
(17, 18, 'sell', 'Maxine Abernathy I', 'wunsch.lourdes@example.org', '+1-651-694-1376', 'Optio velit ab enim sit aut excepturi id. Eius animi amet modi et. Iure eum eveniet rerum animi.', 0, NULL, '2025-02-24 05:55:47', '2025-02-24 06:00:50'),
(18, 17, 'sell', 'Alexandro Mayert', 'golden61@example.com', '+1 (270) 528-8104', 'Autem id mollitia rerum consectetur iusto dolore. In ullam soluta facilis dolor provident aut. Voluptatem et qui fuga quisquam tempore voluptatibus nihil.', 0, NULL, '2025-02-24 05:55:47', '2025-02-24 06:00:47'),
(19, 36, 'buy', 'Conner Parisian', 'stracke.aliya@example.net', '1-475-681-4889', 'Et error dolorum pariatur aliquid voluptate similique magni consequuntur. Similique aut consequatur architecto est. Quasi rem sapiente et adipisci. Aspernatur est quo est id.', 0, NULL, '2025-02-24 05:55:47', '2025-02-24 06:00:45'),
(20, 24, 'sell', 'Syble Kuhic', 'krajcik.selina@example.com', '1-276-233-8806', 'Sed culpa aut itaque quia accusamus. Dolore dicta qui ab incidunt. Iure hic numquam fugit et saepe quas autem ipsum.', 1, NULL, '2025-02-24 05:55:47', '2025-02-24 06:13:32'),
(21, 37, 'buy', 'Mr. Chandler Daniel Sr.', 'nayeli00@example.com', '+1-573-537-9350', 'Totam consectetur placeat omnis perferendis aut. Consequatur est vel qui asperiores qui voluptatem. A inventore modi voluptas est neque nemo consequatur.', 0, NULL, '2025-02-24 05:55:47', '2025-02-24 06:00:42'),
(22, 21, 'sell', 'Miss Pearline Stanton II', 'amedhurst@example.org', '+1-816-412-7970', 'Quidem similique ut ea. Explicabo praesentium qui reiciendis sapiente. A ducimus sed animi. Quaerat quisquam reiciendis et. Enim et voluptatibus rerum incidunt quam.', 0, NULL, '2025-02-24 05:55:47', '2025-02-24 06:00:41'),
(23, 34, 'sell', 'Katrine Roob', 'ybarrows@example.net', '(641) 646-7195', 'Omnis itaque voluptatem rem id sed voluptatem consequuntur. Quo incidunt aut quod. Nam perspiciatis ratione quia soluta recusandae magni nemo. Accusamus quidem et dolor eum est officiis.', 1, NULL, '2025-02-24 05:55:47', '2025-02-24 06:13:30'),
(24, 25, 'buy', 'Americo Jenkins', 'pierce28@example.com', '+1-248-701-4257', 'Et rerum cumque et accusantium sit consequatur. Culpa voluptatem omnis eligendi neque ut omnis. Molestiae sit consequatur est corporis aspernatur. Quisquam qui qui aperiam.', 0, NULL, '2025-02-24 05:55:47', '2025-02-24 06:00:39'),
(25, 23, 'sell', 'Ms. Antonette Skiles MD', 'zgutmann@example.org', '341.255.2100', 'Inventore voluptatem beatae omnis optio dolorum repellendus corrupti. Voluptatem beatae eveniet animi velit sed. Mollitia ea minima minus et ipsum quia quo. Doloremque error pariatur tempora iusto. Mollitia molestiae in odit rerum id aliquid.', 1, NULL, '2025-02-24 05:55:47', '2025-02-24 06:13:28'),
(26, NULL, 'sell', 'Chris Stoltenberg', 'lulu.huel@example.net', '+1-310-603-8245', 'Repudiandae sed quo ipsa. Fugiat aliquam magnam numquam et totam. Commodi minus numquam ipsum aut voluptatem qui quia fugit. Ea voluptatem sed quo veritatis sapiente.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(27, NULL, 'sell', 'Reba Nader', 'fpurdy@example.org', '(475) 629-9634', 'Enim et dolor eum velit dolores quo. Cumque et necessitatibus est non voluptatum. Odio quisquam excepturi ut voluptas id fuga. Maxime rerum qui officia quis. Quo quis ipsa in dicta.', 1, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(28, NULL, 'buy', 'Ms. Ivy Blick', 'schowalter.alexanne@example.net', '1-803-630-6794', 'Molestiae ullam veniam vitae occaecati. Fuga sunt nulla provident aut a iusto.', 1, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(29, NULL, 'sell', 'Julien Blick', 'sipes.audreanne@example.com', '+1 (984) 853-7436', 'Amet sunt qui sint pariatur dolor. Autem ut quia et ut rerum natus fugit. Suscipit sit ut qui soluta incidunt. Sint exercitationem ratione et explicabo eos.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(30, NULL, 'sell', 'Madie Ankunding', 'jarrett.kuvalis@example.net', '(919) 605-5228', 'Impedit quisquam repellat et minima. Consectetur quia explicabo et ea voluptatem dolorem impedit. Qui aut sunt voluptas et. Quaerat voluptatem vel pariatur ad cum ut.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(31, NULL, 'buy', 'Kiera Langworth', 'bartoletti.keon@example.net', '+15099084816', 'Incidunt repellat occaecati dolores odio ratione id. Consequatur laboriosam non nostrum inventore. Quo vel vero autem qui eaque quis qui itaque. Consequatur id velit mollitia quia modi dolor pariatur.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(32, NULL, 'buy', 'Heloise Vandervort', 'donnelly.deanna@example.org', '(564) 718-7147', 'Cumque et voluptates temporibus veniam autem ut. Occaecati nobis iste et qui. Voluptatem ut laborum nostrum itaque et accusantium.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(33, NULL, 'buy', 'Mrs. Lempi Orn DDS', 'jessika.feil@example.org', '(270) 757-6898', 'Accusantium eos sed odit ut. Voluptas quae architecto in animi. Sed laudantium et dolor qui et fugiat.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(34, NULL, 'buy', 'Liza Kozey', 'tlarson@example.org', '+19175848875', 'Aut eum necessitatibus est. Est et omnis vel molestiae modi consequatur. Placeat sunt optio quasi iusto provident qui sed sit.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(35, NULL, 'buy', 'Scotty Wisoky', 'marcella79@example.com', '1-424-316-2152', 'Omnis esse pariatur non. Est molestias culpa quaerat repellat fugit tenetur officia. Sed quidem voluptates ipsa. Consequatur quia quisquam numquam.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(36, NULL, 'buy', 'Ms. Claudie Bergstrom II', 'ortiz.gennaro@example.net', '1-386-665-4824', 'Harum nesciunt id amet vero molestiae. Non soluta sunt consequatur. Enim enim hic quam placeat.', 1, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(37, NULL, 'sell', 'Erin Morar', 'estevan92@example.com', '1-817-754-1296', 'Omnis quasi tempora quos et. Laboriosam at qui rerum incidunt numquam quia. Nulla amet doloremque necessitatibus minima itaque quasi veritatis sed.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:54'),
(38, NULL, 'buy', 'Gage D\'Amore', 'heaney.myrtis@example.com', '405-494-0171', 'Iure itaque voluptatem quae ipsam illum corrupti earum. Occaecati vel perspiciatis explicabo ea voluptas earum ullam. Aliquam ex neque aperiam a et maxime.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:52'),
(39, NULL, 'sell', 'Dr. Ethel Boyer', 'wiza.ayana@example.org', '586-201-5465', 'Ut adipisci tempora et sunt ullam earum earum. Aut possimus distinctio iusto id. Porro dolor ut fugit mollitia amet sint. Incidunt ad dolor magnam amet rerum recusandae.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(40, NULL, 'buy', 'Cletus Morissette', 'hamill.ken@example.net', '845.789.8402', 'Laboriosam quia et natus et rem vel repellat. Vel debitis nesciunt quaerat ipsam rerum tempora. Et dolores qui nobis et animi dolorum. Dignissimos hic nihil minus ut.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(41, NULL, 'sell', 'Kim Runolfsson I', 'kelsie69@example.com', '1-272-890-4500', 'Esse ea est ea aliquid et. Voluptatum beatae hic rem fugit ea ipsam. Nihil odit temporibus placeat quibusdam. Deserunt debitis qui quo incidunt.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:50'),
(42, NULL, 'sell', 'Mrs. Meagan Stokes V', 'abner68@example.net', '+1-682-277-4006', 'Explicabo id quia veniam et sequi a. Earum deleniti ut fugiat non et cum omnis. Aspernatur nobis officiis praesentium eos et. In qui qui animi suscipit officia cumque quis.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:49'),
(43, NULL, 'sell', 'Nakia Zemlak', 'savion94@example.org', '+1-731-320-4029', 'Quibusdam et aut accusamus nihil quia. Aliquam est est eos sunt et beatae iure. Eligendi est voluptates animi quis commodi ut sint. Rerum et qui corporis consectetur deleniti.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14'),
(44, NULL, 'buy', 'Dr. Eliane Abernathy', 'zoie85@example.net', '804.285.9741', 'Saepe est dolore corporis sunt laborum. Sit accusamus esse distinctio dolor. Mollitia voluptatem et omnis quia. Aut deleniti itaque qui mollitia reprehenderit.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:47'),
(45, NULL, 'sell', 'Susie Kessler', 'louie32@example.org', '+1.731.978.3430', 'Nulla optio eos voluptate aliquam sit. Sequi cupiditate consequatur assumenda. Nesciunt qui omnis sed a ullam. Doloremque sed cupiditate cumque. Vel enim iure et autem quidem nulla.', 0, NULL, '2025-02-24 06:26:14', '2025-02-24 06:26:14');

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
(11, '2023_03_03_155915_create_feedbacks_table', 1),
(12, '2023_03_30_055747_create_favourite_vehicals_table', 2),
(13, '2025_02_19_073650_add_missing_fields_to_users_table', 3),
(14, '2025_02_19_100630_update_categories_table_add_status_softdeletes', 3),
(17, '2023_03_03_155854_create_inquries_table', 4),
(18, '2025_02_21_091433_remove_slug_from_users_table', 5),
(19, '2025_02_21_092237_remove_slug_from_categories_table', 6);

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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@example.com', '$2y$10$SqiCE1yMbGz5C/YyHnVoHuDsieMUIEO89ML/cNwFkVr4bNnaD8M76', '2025-02-19 05:55:19'),
('ronakp2912@gmail.com', '$2y$10$3k2luPyXi5Hqm2STe8fUeOECq0PqMyDXiAakym9uRxMI0Rpp4LdEu', '2025-02-19 05:57:08');

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
(19, 'App\\Models\\User', 62, 'auth_token', 'a95fc3e951123a8e0afc5d6c91035cf1e4f4441c849619434c808e085a15af86', '[\"*\"]', '2025-02-20 03:36:17', '2025-02-20 02:28:01', '2025-02-20 03:36:17'),
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
(61, 'App\\Models\\User', 62, 'auth_token', 'f33c6fc1dfc988e9f42388e6e8d3c6df21db050a2d2d8a8ed6a7508568e95da2', '[\"*\"]', NULL, '2025-02-20 07:00:51', '2025-02-20 07:00:51');

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
  `dob` date DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(2, 'customer', 'Helga Fadel', 'Cindy Johnston IV', NULL, 'calista35@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'z0MTdUug2l', NULL, '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(3, 'customer', 'Marcelo Stiedemann', 'Lenny Torp', NULL, 'lhessel@example.org', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'YwmkhPtdLU', NULL, '2023-03-28 08:18:43', '2025-02-19 22:58:49'),
(4, 'customer', 'Delilah Kozey', 'Mr. Mckenzie Tromp', NULL, 'sstark@example.org', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'TuerWfDVik', NULL, '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(5, 'customer', 'Marcellus Towne', 'Prof. Steve Grant IV', NULL, 'cleveland.macejkovic@example.org', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'IaaWL9TRNK', NULL, '2023-03-28 08:18:43', '2025-02-19 22:58:59'),
(6, 'customer', 'Leone Reinger I', 'Adah Collier I', NULL, 'nathan47@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'YGMbpSHfbL', NULL, '2023-03-28 08:18:43', '2025-02-19 22:59:09'),
(7, 'customer', 'Berenice Hammes', 'Barbara Fisher II', NULL, 'lyla40@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, '1ql0q8DvLO', NULL, '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(8, 'customer', 'Lloyd Corwin', 'Amya Mayer', NULL, 'vschmeler@example.org', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'uiVhISNj7c', NULL, '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(9, 'customer', 'Ms. Stacy Haag', 'Theresa Kunze', NULL, 'alockman@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'o6cFZQBtg8', NULL, '2023-03-28 08:18:43', '2025-02-19 22:59:04'),
(10, 'customer', 'Miss Yasmeen Kemmer Sr.', 'Emilie Koch', NULL, 'kianna.murray@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, '0lpS0MgVHg', NULL, '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(11, 'customer', 'Dr. Novella Nikolaus MD', 'Beryl Haley', NULL, 'stokes.nicholas@example.net', '2023-03-28 08:18:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, '6gTey1uJDi', NULL, '2023-03-28 08:18:43', '2023-03-28 08:18:43'),
(13, 'admin', 'yash', 'patel', '9157541292', 'yash1292@gmail.com', '2023-04-02 04:54:16', '$2y$10$vJm4Ecn4KG9iR9osssHAy.pdpEi7VIqqBwS5Y8NqFnQy4.E9UZRWq', NULL, NULL, NULL, NULL, NULL, 1, 'CSLGDJnILqPrKWe18ycWfTqrJQRPAwwoq1j2Oz6F62WjN33kl3bGrNG139Tt', NULL, '2023-04-02 04:54:16', '2023-04-03 08:21:03'),
(14, 'customer', 'Lue Cartwright', 'Amira Schaefer', NULL, 'bins.payton@example.com', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'nwUAc8Nt9z', NULL, '2023-04-02 04:54:18', '2025-02-19 22:59:07'),
(15, 'customer', 'Matt Von', 'Bernie Christiansen', NULL, 'schmeler.leilani@example.org', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'vP54A5pAqP', NULL, '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(16, 'customer', 'Audrey Kemmer', 'Grant Sawayn', NULL, 'cankunding@example.com', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'ouyGjSCH3H', NULL, '2023-04-02 04:54:18', '2025-02-19 22:59:02'),
(17, 'customer', 'Prof. Alfredo Waters PhD', 'Hector Macejkovic PhD', NULL, 'marisol36@example.net', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, '9gA9BWYtg1', NULL, '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(18, 'customer', 'Ollie Torp III', 'Beth Bayer', NULL, 'johns.gennaro@example.org', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, '7PSnVlB6Vn', NULL, '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(19, 'customer', 'Annamarie Paucek', 'Prof. Freddie Pouros Sr.', NULL, 'lgreenholt@example.org', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, '6Nik6ILKQR', NULL, '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(20, 'customer', 'Ayla Schroeder', 'Kallie Barrows', NULL, 'rollin.romaguera@example.org', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'kzX2CkAQd2', NULL, '2023-04-02 04:54:18', '2025-02-19 22:59:20'),
(21, 'customer', 'Celestino Cummerata', 'Lula Wehner', NULL, 'von.frederic@example.org', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'cELQbLHHeE', NULL, '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(22, 'customer', 'Marilyne Heaney', 'Gillian Bartoletti', NULL, 'zhyatt@example.net', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'rSqXgrcUpK', NULL, '2023-04-02 04:54:18', '2023-04-02 04:54:18'),
(23, 'customer', 'Adelia Kautzer', 'Mr. Nels Medhurst MD', NULL, 'lmacejkovic@example.net', '2023-04-02 04:54:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, '2JmetXdnT7', NULL, '2023-04-02 04:54:19', '2025-02-19 22:59:17'),
(24, 'admin', 'devanshi', 'ballar', '9824732223', 'devanshiballer12i@gmail.com', '2023-04-19 23:24:03', '$2y$10$K0On/LOsSXRLRZrlJCv1uOmwIwM4z/PumNDcT94UfjX5/AkZAWRTG', NULL, NULL, NULL, NULL, NULL, 1, 'JCaKrkTA1tAsS8NG5hteS8TH3FRx1HJGWpzO4z3DF60yTAiuoU9u1Dlol9TE', NULL, '2023-04-19 23:24:03', '2023-04-19 23:58:23'),
(25, 'customer', 'Luther Hauck', 'Toy Reinger', NULL, 'cummerata.nicholaus@example.com', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'T9wtRIb4ME', NULL, '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(26, 'customer', 'Tiana Quigley', 'Casey Predovic', NULL, 'ijohnston@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, '3GBLo7aE8A', NULL, '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(27, 'customer', 'Ettie Pouros', 'Talia Swaniawski Sr.', NULL, 'jayson.jenkins@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'NEd6Gk36Ke', NULL, '2023-04-19 23:24:05', '2025-02-19 22:59:15'),
(28, 'customer', 'Audie Trantow', 'Stella Kertzmann', '6686', 'eve25@example.net', '2023-04-19 23:24:05', '$2y$10$WSXQqgpYCPqYWNjI7bLtBu.yUjTUEHLfJvQtKRroBnfJpXpsqqeBy', NULL, NULL, NULL, NULL, NULL, 1, 'Y0ydlasTMIBbLSZMv9BOPbHGsYIeuBenulRq5UZIqTmSO4Y8X0NdA6nsyvVQ', NULL, '2023-04-19 23:24:05', '2023-04-20 06:05:17'),
(29, 'customer', 'Charity Schneider', 'Mr. Kay Stanton III', NULL, 'isadore10@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'NEnc48XCbV', NULL, '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(30, 'customer', 'Ted Mann', 'Prof. Gay Harris IV', NULL, 'jheidenreich@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, '5sFi26SSpy', NULL, '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(31, 'customer', 'Dr. Gracie Cassin', 'Lonnie Nikolaus', NULL, 'ferry.faustino@example.com', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'F4BsYdp9un', NULL, '2023-04-19 23:24:05', '2025-02-19 22:59:30'),
(32, 'customer', 'Karlee Kovacek PhD', 'Serenity Roob', NULL, 'fern83@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'a2bdC7767U', NULL, '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(33, 'customer', 'Cordell Smitham', 'Jacklyn Hills IV', NULL, 'oswald59@example.net', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'YzKOeTA14S', NULL, '2023-04-19 23:24:05', '2023-04-19 23:24:05'),
(34, 'customer', 'Rubye Wyman', 'Katlynn O\'Kon', NULL, 'cindy63@example.com', '2023-04-19 23:24:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'Uj6YOXosY4', NULL, '2023-04-19 23:24:05', '2025-02-19 22:59:28'),
(36, 'admin', 'Admin', '-', '+91 7016590780', 'admin@hvac.com', '2023-04-20 00:12:37', '$2y$10$6iHomnC0bb92QSVMp9mDauOvOa0x7piALOwBfZklEeMmPTaVrWBZ2', '2002-03-30', 'IN', 'Gujarat', '605 Titenium Square, Ahmedabad, Gujarat', 'uploads/profiles/1740123137.jpg', 1, 'DbfRSNXFg1bacUKqoGtbEeZlWosGOV6Ksx94oP7rVNG81ezIuckW7YRqUBvq', NULL, '2023-04-20 00:12:37', '2025-02-21 02:02:17'),
(37, 'customer', 'Thea Greenholt', 'Neoma Shanahan V', NULL, 'dkirlin@example.net', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'wFJyxQdCjS', NULL, '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(38, 'customer', 'Mara Witting', 'Jovan Wyman', NULL, 'arch35@example.net', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'Cz3rWZuwWC', NULL, '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(39, 'customer', 'Casimir Koepp', 'Giovanny Rosenbaum', NULL, 'delaney72@example.com', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'Q0hdlOk7A4', NULL, '2023-04-20 00:12:38', '2025-02-19 22:59:26'),
(40, 'customer', 'Ethelyn Mueller', 'Earnestine Heller IV', NULL, 'mbreitenberg@example.net', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'cMwvyLWcTD', NULL, '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(41, 'customer', 'Demario Reynolds', 'Steve Deckow V', NULL, 'nicklaus.monahan@example.org', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'R5lUt2CDU9', NULL, '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(42, 'customer', 'Arden Mitchell', 'Rupert O\'Keefe', NULL, 'toy.marquardt@example.net', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, '88tRlP36oE', NULL, '2023-04-20 00:12:38', '2025-02-19 22:59:39'),
(43, 'customer', 'Gunner Howe', 'Lamar Schumm', NULL, 'wiza.giovanny@example.com', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'eIHRg3c5DH', NULL, '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(44, 'customer', 'Olen Hyatt', 'Emmett Jacobi Sr.', NULL, 'oborer@example.com', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'LqLtPWbSee', NULL, '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(45, 'customer', 'Hal Schulist', 'Chance Boyer', NULL, 'mprosacco@example.com', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 0, 'EsUBEZ8Vob', NULL, '2023-04-20 00:12:38', '2025-02-19 22:59:37'),
(46, 'customer', 'Skye Denesik', 'Dr. Jaquan Beahan II', NULL, 'carmela.bergnaum@example.com', '2023-04-20 00:12:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, 'Td8yC64PPz', NULL, '2023-04-20 00:12:38', '2023-04-20 00:12:38'),
(47, 'customer', 'test', 'test', '97997', 'test1@gmail.com', NULL, '$2y$10$GP7AAn0Fs2eRpThmo.7hs.C4kEMc1nf9PxqqKoJGTOu/F7yEkoOOe', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-04-20 06:19:28', '2023-04-20 06:19:28'),
(49, 'customer', 'julee', 'patel', '9909339543', 'julee993@gamil.com', '2023-04-20 09:56:30', '$2y$10$gpo7knG4.cC1EWWPLDQJ7.d2zRp0GU3w4UdhJ8PHDJCEqBOmVWx1y', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-04-20 09:56:30', '2023-04-20 09:56:30'),
(50, 'customer', 'shivay', 'patel', '9909365298', 'shivu81222@gmail.com', '2023-04-20 09:58:39', '$2y$10$yLKrfZ.3MyKUh6kOsS5TDOkV8dG.cHR/Rqx5BLYNi3ydJZPMMj9C.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-04-20 09:58:39', '2025-02-19 22:59:35'),
(51, 'customer', 'Man', 'Patel', '+91 3656563256', 'man@gmail.com', NULL, '$2y$10$R1uwSnYf34sGFDkXnrn.AeIssfMDo1MjK41v3svNaf2I6o9ZxMwyC', '2025-02-13', 'IN', 'Gujarat', 'dfgdg', 'uploads/profiles/1740033592.jpg', 1, NULL, NULL, '2023-10-11 08:15:09', '2025-02-20 01:09:52'),
(52, 'customer', 'abhi', 'patel', '9313533288', 'abhaypatel2354@gmail.com', '2024-05-31 09:25:37', '$2y$10$.o1fZHPdIFeV47rPu.5D8O/bDFb/nK0eGlRA6dM/q1TEnXK6tCLxC', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-31 09:25:37', '2024-05-31 09:25:37'),
(53, 'customer', 'Ronak', 'Patel', '9664725001', 'ronakp2912@gmail.com', NULL, '$2y$10$FB7Jbza.VhHKSBDwu3T34uu0yfUSjZmq34oF.DA3u7g603iWLkZYC', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-02-19 06:45:54', '2025-02-19 05:54:17', '2025-02-19 06:45:54'),
(54, 'customer', 'Prasant', 'chanvda', '9589658965', 'prasant@gmail.com', '2025-02-19 06:05:39', '$2y$10$3GvSY757KhFoVYA5qkiiKOlGAEIORfwNdpigu4WulRloyCxii013.', '2025-02-13', 'IN', 'Assam', 'dgdgfdfdf', NULL, 0, NULL, NULL, '2025-02-19 06:05:39', '2025-02-19 06:53:15'),
(55, 'customer', 'Prasant', 'chavda', '9658745896', 'prasant1@gmail.com', '2025-02-19 06:31:14', '$2y$10$o/L7DEYFX6/r8S1sIDTpVeuAeDpvhw5hnjnMIFFHxhf3wPq3t6cZe', NULL, 'IN', 'Goa', 'fgfd', NULL, 1, NULL, NULL, '2025-02-19 06:31:14', '2025-02-19 06:31:14'),
(56, 'customer', 'Deep', 'Sapariya', '9652145266', 'deep.patel@shivlab.com', NULL, '$2y$10$xAo1zvaxWwiTOCcW7sfCGOSs9PJdWQ.QOU.qSFp9hhhcXhWKOeMU.', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2025-02-19 07:33:25', '2025-02-19 07:33:25'),
(57, 'customer', 'Manan', 'Bhalala', '9652365214', 'manan.bhalala@shivlab.com', NULL, '$2y$10$5vUupIfedcqZOXXod8TE0.xUv1XDbrCCd6Ptr3H9WR2buOi/OtUI.', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2025-02-19 07:34:26', '2025-02-19 07:34:26'),
(58, 'customer', 'Yogesh', 'bhau', '9652365216', 'yogest@gmil.com', NULL, '$2y$10$NH8YGrBd6SqfVbWRfWKik.OGXxGT/4vMXIq/hfJTx1lasJyn.xDYy', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2025-02-19 07:35:24', '2025-02-19 22:59:46'),
(59, 'customer', 'Mahesh', 'Savaliya', '9632563256', 'mana.bhalala@shivlab.com', NULL, '$2y$10$qhXr9kW0mHqMGDoWkK547e9D3ezytsFxOo0IyY9Sf3okxzQQ4weJW', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2025-02-19 07:53:50', '2025-02-19 07:56:12'),
(60, 'customer', 'Rohan', 'Chauhan', '9658965896', 'rohan@gmail.com', NULL, '$2y$10$l6I4xK15hTXy3916rUUTm.lsK7Z06qFE3hhad6wK5A.RTniRLhJSu', '1990-05-15', 'IN', 'Gujarat', '123 Main Street, Los Angeles', 'http://192.168.1.87:8000/storage/profile_images/profile_60_1739971800.png', 1, NULL, NULL, '2025-02-19 07:56:58', '2025-02-19 08:00:00'),
(61, 'customer', 'Rohan', 'Chauhan', '9658965893', 'rohan3@gmail.com', NULL, '$2y$10$dC3MPSDzaoALjd/6linoYO/UdMoAJG3DV3fZbRHIsp4ZmUaSuEGj.', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2025-02-19 08:00:31', '2025-02-19 22:59:50'),
(62, 'customer', 'Rohan', 'Chauhan', '9658965899', 'rohan4@gmail.com', NULL, '$2y$10$GmoysaK234N2OhyOEnDeAOYsAwtIdjjatmFanEuLfcc3Su5VqJbtK', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2025-02-19 08:46:38', '2025-02-19 08:46:38'),
(63, 'customer', 'Paras', 'Malaviya', '9652365256', 'paras@gmail.com', NULL, '$2y$10$cCBY7BoyAJi9UtkIFecsDuBuV95vvY5z97aCJkOMkWxjMB9dFQtWu', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2025-02-20 00:50:34', '2025-02-20 00:53:41'),
(64, 'customer', 'Rohan', 'Chauhan', '9658965399', 'rohan2@gmail.com', NULL, '$2y$10$Hm1M4Y2n5VKyLEt/79vVguhqlw0C/701EMX6aNrHtt4P2oV4SSG.u', '2025-02-13', 'IN', 'Karnataka', NULL, NULL, 1, NULL, NULL, '2025-02-20 02:17:30', '2025-02-21 03:59:36'),
(65, 'customer', 'Urjit', 'Patel', '6589659658', 'urjit@gmail.com', '2025-02-21 04:05:19', '$2y$10$qKeOKt9W2j4K5CDQ6h5AI.q2igVT45N1S5lRuByIHyduESTePil5m', '2025-02-07', 'IN', 'Goa', 'fdf', NULL, 1, NULL, NULL, '2025-02-21 04:05:19', '2025-02-21 04:05:19');

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
(15, 1, 12, 89, 'Active', 'active-2015', 2019, 'petrol', 'white', '30', '15000.00', NULL, 0, '2023-03-30 08:50:24', '2025-02-21 00:13:31'),
(16, 1, 20, 79, 'Bullet Classical 350', 'bullet-classical-350', 2018, 'diesal', 'Red', '10', '50000.00', NULL, 1, '2023-03-30 09:01:57', '2025-02-20 23:02:08'),
(17, 1, 11, 68, 'Pluser 220', 'pluser-220', 2018, 'petrol', 'Black', '15', '50000.00', NULL, 0, '2023-03-30 09:03:58', '2023-03-30 09:03:58'),
(18, 3, 5, 34, 'Innova 556', 'innova-556', 2014, 'diesal', 'black', '50', '90000.00', NULL, 0, '2023-03-30 09:05:52', '2025-02-20 23:02:48'),
(20, 1, 12, 69, 'SHINE SP', 'dream-yuga', 2012, 'petrol', 'red', '60', '16000.00', NULL, 1, '2023-03-30 09:09:36', '2025-02-20 23:03:19'),
(21, 1, 14, 72, 'Giser 36', 'giser-36', 2016, 'petrol', 'red', '30', '36000.00', NULL, 0, '2023-03-30 09:12:38', '2023-03-30 09:12:38'),
(22, 3, 6, 40, 'Thar', 'thar', 2020, 'petrol', 'red', '35', '540000.00', NULL, 0, '2023-03-30 09:13:54', '2025-02-21 00:14:10'),
(23, 3, 3, 19, 'Honda City', 'city', 2019, 'diesal', 'white', '30', '1600000.00', NULL, 0, '2023-03-30 09:14:46', '2025-02-21 00:14:38'),
(24, 1, 20, 80, 'Royal Enfield', 'royal-enfield', 2016, 'petrol', 'BLACK', '15', '40000.00', NULL, 0, '2023-03-30 09:16:06', '2025-02-21 00:14:55'),
(25, 3, 3, 23, 'WR-V', 'wr-v', 2018, 'petrol', 'white', '25', '650000.00', NULL, 0, '2023-03-30 11:31:21', '2023-03-30 20:56:44'),
(26, 1, 13, 71, 'SPLENDOR', 'splendor', 2017, 'petrol', 'black', '15', '15000.00', NULL, 0, '2023-03-30 11:40:53', '2025-02-20 23:05:38'),
(29, 3, 1, 5, 'Tata Nexon EV', 'nexon', 2019, 'electric', 'green', '25', '500000.00', NULL, 0, '2023-04-20 05:09:43', '2025-02-21 00:15:37'),
(34, 1, 12, 66, 'livo', 'livo', 2017, 'petrol', 'BLACK', '35', '65000.00', NULL, 0, '2023-04-20 09:30:56', '2025-02-20 01:50:38'),
(35, 1, 15, 75, 'fz-s', 'fz-s', 2017, 'petrol', 'black', '45', '55000.00', NULL, 0, '2023-04-20 09:33:00', '2023-04-20 09:33:00'),
(36, 3, 9, 55, 'SELTOS', 'seltos', 2020, 'petrol', 'black', '35', '650000.00', NULL, 0, '2023-04-20 09:37:01', '2023-04-20 09:37:01'),
(37, 3, 5, 32, 'FORTUNER', 'fortuner', 2021, 'petrol', 'White', '45', '3500000.00', NULL, 0, '2023-04-20 09:40:49', '2025-02-20 23:07:14'),
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
(5, 15, 'WhatsApp Image 2023-03-30 at 7.51.03 PM.jpeg', 'image', 1, '2023-03-30 08:59:03', '2025-02-20 23:01:38'),
(6, 14, 'alczar.jpg', 'image', 0, '2023-03-30 09:20:23', '2023-03-30 09:20:23'),
(7, 16, 'classic 350.jpeg', 'image', 1, '2023-03-30 09:21:08', '2023-04-02 06:58:23'),
(9, 18, 'innova(1).jpg', 'image', 1, '2023-03-30 09:22:07', '2025-02-20 23:02:42'),
(11, 21, 'access125.jpeg', 'image', 0, '2023-03-30 09:22:51', '2025-02-20 23:03:40'),
(12, 21, 'access125(1).jpeg', 'image', 1, '2023-03-30 09:23:03', '2025-02-20 23:03:40'),
(13, 20, 'shine sp(1).jpeg', 'image', 1, '2023-03-30 11:04:17', '2025-02-20 23:03:05'),
(15, 19, 'swift(2).jpg', 'image', 0, '2023-03-30 11:05:47', '2023-03-30 11:05:47'),
(16, 22, 'WhatsApp Image 2023-03-30 at 6.27.52 PM.jpeg', 'image', 1, '2023-03-30 11:06:24', '2025-02-20 23:04:08'),
(18, 24, 'continental gt 650.jpeg', 'image', 1, '2023-03-30 11:07:26', '2025-02-20 23:05:01'),
(20, 23, 'city.jpg', 'image', 1, '2023-03-30 11:08:20', '2025-02-20 23:04:35'),
(23, 17, 'plusar 125.jpeg', 'image', 1, '2023-03-30 11:10:58', '2025-02-20 23:02:27'),
(26, 25, 'WhatsApp Image 2023-03-30 at 6.19.21 PM.jpeg', 'image', 1, '2023-03-30 11:38:42', '2025-02-20 23:05:22'),
(27, 26, 'splendor plus.jpeg', 'image', 1, '2023-03-30 11:41:24', '2025-02-20 23:05:35'),
(28, 27, 'harreir.jpg', 'image', 0, '2023-03-30 20:55:57', '2023-03-30 20:55:57'),
(29, 27, 'harrier(1).jpg', 'image', 0, '2023-03-30 20:56:07', '2023-03-30 20:56:07'),
(31, 28, 'punch.jpg', 'image', 0, '2023-03-30 21:04:01', '2023-03-30 21:04:01'),
(32, 29, 'WhatsApp Image 2023-03-30 at 6.24.19 PM.jpeg', 'image', 1, '2023-04-20 05:13:50', '2023-04-20 05:14:30'),
(34, 33, 'brezza.jpg', 'image', 0, '2023-04-20 09:28:52', '2023-04-20 09:28:52'),
(35, 34, 'livo.jpeg', 'image', 1, '2023-04-20 09:31:24', '2023-04-20 09:31:49'),
(36, 34, 'livo(1).jpeg', 'image', 0, '2023-04-20 09:31:38', '2023-04-20 09:31:49'),
(37, 36, 'WhatsApp Image 2023-03-30 at 6.07.54 PM.jpeg', 'image', 1, '2023-04-20 09:37:24', '2025-02-20 23:06:37'),
(38, 35, 'fz-s.jpeg', 'image', 1, '2023-04-20 09:37:53', '2025-02-20 23:06:29'),
(40, 37, 'WhatsApp Image 2023-03-30 at 6.20.02 PM (1).jpeg', 'image', 1, '2023-04-20 09:41:57', '2025-02-20 23:07:00'),
(41, 38, 'WhatsApp Image 2023-03-30 at 6.14.22 PM.jpeg', 'image', 1, '2023-04-20 09:46:49', '2025-02-20 23:07:29');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiries_vehical_id_foreign` (`vehical_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_vehicals`
--
ALTER TABLE `favourite_vehicals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_vehical_id_foreign` FOREIGN KEY (`vehical_id`) REFERENCES `vehicals` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 12:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultant-cube`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `userId`, `title`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'Attachment 1', '1689942683.gif', 'Active', '2023-07-21 07:01:23', '2023-07-24 06:28:10'),
(2, 10, 'Attachment 2', '1689943333.jpg', 'Deleted', '2023-07-21 07:09:48', '2023-07-24 06:28:32'),
(3, 10, 'Attachment 3', '1689943292.jpg', 'Active', '2023-07-21 07:11:33', '2023-07-24 06:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catName` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catName`, `status`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'Deleted', '2023-07-21 03:34:04', '2023-07-24 06:15:43'),
(2, 'Category 1', 'Active', '2023-07-24 01:13:56', '2023-07-24 01:13:56'),
(3, 'Category 2', 'Active', '2023-07-24 04:34:43', '2023-07-24 04:34:43'),
(4, 'Category 3', 'Active', '2023-07-25 04:46:19', '2023-07-25 04:48:59'),
(5, 'Category 4', 'Deleted', '2023-07-25 04:58:20', '2023-07-25 23:53:21'),
(6, 'Category 4', 'Deleted', '2023-07-26 01:27:15', '2023-07-26 05:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stateId` int(11) NOT NULL,
  `cityName` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `stateId`, `cityName`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'SurendraNagar', 'Deleted', '2023-07-21 02:49:30', '2023-07-25 23:52:02'),
(2, 1, 'snagar1', 'Active', '2023-07-21 03:12:47', '2023-07-24 06:09:37'),
(3, 2, 'SurendraNagar', 'Deleted', '2023-07-21 03:13:22', '2023-07-24 05:58:55'),
(4, 5, 'Ponda', 'Active', '2023-07-25 04:31:34', '2023-07-25 04:40:01'),
(5, 5, 'Ponda', 'Deleted', '2023-07-26 01:15:13', '2023-07-26 05:18:06'),
(6, 4, 'Gandhinagar', 'Deleted', '2023-07-26 01:16:00', '2023-07-26 05:18:56');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `userId`, `title`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'Multi User Image', '1689939923.jpg', 'Deleted', '2023-07-21 06:15:23', '2023-07-24 06:23:33'),
(2, 1, 'Gallery image', '1689940399.png', 'Active', '2023-07-21 06:23:19', '2023-07-21 06:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `languageId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `userId`, `languageId`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 2, 'Active', '2023-07-21 05:45:22', '2023-07-24 06:35:24'),
(2, 1, 1, 'Active', '2023-07-21 06:00:07', '2023-07-21 06:00:07'),
(3, 10, 3, 'Deleted', '2023-07-21 06:00:16', '2023-07-24 06:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `language_masters`
--

CREATE TABLE `language_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_masters`
--

INSERT INTO `language_masters` (`id`, `language`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hindi', 'Deleted', '2023-07-21 03:55:56', '2023-07-24 06:16:50'),
(2, 'English', 'Active', '2023-07-21 05:57:51', '2023-07-21 05:57:51'),
(3, 'Marathi', 'Active', '2023-07-21 05:58:09', '2023-07-21 05:58:09'),
(4, 'Hindi', 'Active', '2023-07-24 01:15:12', '2023-07-24 01:15:12'),
(5, 'Gujrati', 'Deleted', '2023-07-25 05:04:05', '2023-07-25 05:04:56'),
(6, 'Gujrati', 'Deleted', '2023-07-25 05:04:52', '2023-07-25 23:54:53'),
(7, 'Urdu', 'Deleted', '2023-07-25 05:08:07', '2023-07-26 05:22:00'),
(8, 'Urdu', 'Deleted', '2023-07-26 01:19:33', '2023-07-26 01:19:42');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2014_10_12_000000_create_users_table', 2),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(5, '2019_08_19_000000_create_failed_jobs_table', 2),
(6, '2023_07_20_091531_create_permission_tables', 2),
(7, '2023_07_20_091601_create_products_table', 2),
(8, '2023_07_21_061718_create_states_table', 3),
(9, '2023_07_21_071434_create_cities_table', 4),
(10, '2023_07_21_071459_create_categories_table', 4),
(11, '2023_07_21_071528_create_language_masters_table', 4),
(12, '2023_07_21_071609_create_social_masters_table', 4),
(13, '2023_07_21_072957_create_times_table', 5),
(14, '2023_07_21_073011_create_profiles_table', 5),
(15, '2023_07_21_073049_create_languages_table', 5),
(16, '2023_07_21_073158_create_galleries_table', 5),
(18, '2023_07_21_073657_create_videos_table', 5),
(19, '2023_07_21_075728_create_social_links_table', 6),
(20, '2023_07_21_121558_create_attachments_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('madhavipalte202203@gmail.com', '$2y$10$M0FKUHby7y86yXZKeApLceanM60KWAvX5EvmGU/ZOpoMDGJmJc156', '2023-07-22 04:34:04'),
('madhvi@gmail.com', '$2y$10$cXfXZyPTMzN/xNGsWglcAed0o40v6v6pMuvWvSVsvHliEd5RMrPMa', '2023-07-22 04:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2023-07-21 00:42:38', '2023-07-21 00:42:38'),
(2, 'role-create', 'web', '2023-07-21 00:42:38', '2023-07-21 00:42:38'),
(3, 'role-edit', 'web', '2023-07-21 00:42:38', '2023-07-21 00:42:38'),
(4, 'role-delete', 'web', '2023-07-21 00:42:38', '2023-07-21 00:42:38'),
(5, 'product-list', 'web', '2023-07-21 00:42:38', '2023-07-21 00:42:38'),
(6, 'product-create', 'web', '2023-07-21 00:42:38', '2023-07-21 00:42:38'),
(7, 'product-edit', 'web', '2023-07-21 00:42:38', '2023-07-21 00:42:38'),
(8, 'product-delete', 'web', '2023-07-21 00:42:38', '2023-07-21 00:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `about` varchar(255) DEFAULT NULL,
  `contactNo2` varchar(255) DEFAULT NULL,
  `skypeId` varchar(255) DEFAULT NULL,
  `webSite` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `userId`, `about`, `contactNo2`, `skypeId`, `webSite`, `map`, `address`, `state`, `city`, `pincode`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'Laravel Devloper', '8596589658', '123456789', 'SMVS', 'http://127.0.0.1:8000/profile-update/10', 'surendranagar', '1', '1', '363030', '1690261667.jpg', 'Active', '2023-07-22 01:01:34', '2023-07-24 23:37:47'),
(2, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2023-07-22 01:03:48', '2023-07-22 01:03:48'),
(3, 12, 'good', '8596589658', 'madhvi.in', 'abc', 'SURENDRANAGAR', 'wadhwan, block no : 8', '1', '1', '363030', '1690019697.jpg', 'Active', '2023-07-22 01:38:31', '2023-07-22 04:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-07-20 04:30:17', '2023-07-21 00:43:38'),
(2, 'Consultant', 'web', '2023-07-21 00:39:22', '2023-07-21 00:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `socialMediaMasterId` int(11) NOT NULL,
  `url` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `userId`, `socialMediaMasterId`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 4, 'adsddsdhttp://127.0.0.1:8000/socialLink-edit/1s', 'Active', '2023-07-21 04:51:58', '2023-07-24 06:39:29'),
(2, 10, 3, 'www.instagram.com log in', 'Deleted', '2023-07-21 05:04:14', '2023-07-24 23:33:56'),
(3, 10, 2, 'https://www.youtube.com/watch?v=BBAyRBTfsOU&list=RDBBAyRBTfsOU&start_radio=1', 'Active', '2023-07-22 01:41:53', '2023-07-24 06:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `social_masters`
--

CREATE TABLE `social_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_masters`
--

INSERT INTO `social_masters` (`id`, `title`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Amazon', '1689932843.png', 'Deleted', '2023-07-21 04:17:24', '2023-07-24 06:17:59'),
(2, 'Facebook', '1690182345.png', 'Active', '2023-07-21 04:28:34', '2023-07-24 01:35:46'),
(3, 'Instagram', '1690182363.avif', 'Active', '2023-07-24 01:36:03', '2023-07-24 01:36:03'),
(4, 'Twitter', '1690182376.png', 'Active', '2023-07-24 01:36:16', '2023-07-24 01:36:16'),
(5, 'whatsapp', '1690345867.jpg', 'Active', '2023-07-25 23:01:07', '2023-07-26 00:04:21'),
(6, 'hiii', '1690346474.jpg', 'Deleted', '2023-07-25 23:11:14', '2023-07-25 23:38:25'),
(7, 'hello1', '1690346592.jpg', 'Deleted', '2023-07-25 23:13:12', '2023-07-25 23:26:36'),
(8, 'hiii', '1690347478.jpg', 'Deleted', '2023-07-25 23:27:58', '2023-07-25 23:28:08'),
(9, 'hello', '1690354861.jpg', 'Active', '2023-07-26 01:31:01', '2023-07-26 01:31:01'),
(10, 'hello1', '1690354925.jpg', 'Deleted', '2023-07-26 01:32:05', '2023-07-26 05:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stateName` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `stateName`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gujrat', 'Active', '2023-07-21 01:12:26', '2023-07-21 01:31:36'),
(2, 'Banglore', 'Deleted', '2023-07-21 03:09:52', '2023-07-26 05:16:40'),
(3, 'aasam', 'Deleted', '2023-07-21 03:09:53', '2023-07-24 06:14:29'),
(4, 'Bihar', 'Deleted', '2023-07-25 04:09:45', '2023-07-26 04:33:48'),
(5, 'Goa', 'Deleted', '2023-07-25 04:24:48', '2023-07-25 23:48:43'),
(6, 'Gujrat', 'Deleted', '2023-07-26 00:48:13', '2023-07-26 03:43:33'),
(7, 'Goa', 'Deleted', '2023-07-26 00:50:29', '2023-07-26 03:35:22'),
(8, 'Panjab', 'Deleted', '2023-07-26 00:53:16', '2023-07-26 00:53:46'),
(9, 'Panjab', 'Deleted', '2023-07-26 00:53:54', '2023-07-26 03:31:03'),
(10, 'Bihar', 'Deleted', '2023-07-26 00:57:49', '2023-07-26 03:19:55'),
(11, 'Gujrat1', 'Deleted', '2023-07-26 00:58:50', '2023-07-26 00:59:02'),
(12, 'Bihar1', 'Deleted', '2023-07-26 01:00:20', '2023-07-26 01:11:37'),
(13, 'Goa', 'Deleted', '2023-07-26 03:49:04', '2023-07-26 04:24:13'),
(14, 'Goa', 'Active', '2023-07-26 04:34:00', '2023-07-26 04:34:00'),
(15, 'Panjab', 'Deleted', '2023-07-26 04:34:13', '2023-07-26 05:16:24'),
(16, 'Goa', 'Deleted', '2023-07-26 04:34:17', '2023-07-26 05:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `day`, `time`, `userId`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Monday', '18:20', 10, 'Deleted', '2023-07-21 05:20:13', '2023-07-24 06:20:08'),
(2, 'Tushday', '18:21', 1, 'Active', '2023-07-21 05:23:48', '2023-07-21 05:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `stateId` int(11) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `contactNo` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `email`, `email_verified_at`, `password`, `stateId`, `cityId`, `contactNo`, `gender`, `birthdate`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', NULL, '$2y$10$abD.DOz/DGsF7qZlQy75vO2HheYxNkAQRo3P9w6bpB3qGbv3fCyAu', NULL, NULL, NULL, NULL, NULL, 'Active', NULL, '2023-07-20 04:30:17', '2023-07-21 22:58:32'),
(2, 'Manisha', 'Parmar', 'manisha@gmail.com', NULL, '$2y$10$ql4HaplDiptFKL3/1lJi1uKwgVWqR7MA8S7dSIu1/BxW9IMcrIr2q', NULL, NULL, NULL, NULL, NULL, 'Active', NULL, '2023-07-21 07:42:39', '2023-07-21 22:59:05'),
(4, 'madhvi', 'Patel', 'madhavipalte202203@gmail.com', NULL, '$2y$10$YlB/eR/3HRT0aYMCjzRe1uaulqLDpL6lGg3F5rLQ2wm.js7L7JLW2', NULL, NULL, NULL, NULL, NULL, 'Active', NULL, '2023-07-21 23:14:15', '2023-07-21 23:15:00'),
(10, 'Arpita', 'Patel', 'arpita@gmail.com', NULL, '$2y$10$DaRmqxfdvIKQvzAadOhZXeVY5WFb3qhBEq1M8dx1mVzDPHjPvrasS', 1, 1, '8569856985', 'Female', '2023-07-20', 'Active', NULL, '2023-07-22 01:01:34', '2023-07-22 01:01:34'),
(11, 'Rahul', 'Parmar', 'rahul@gmail.com', NULL, '$2y$10$PTJkDM/ocCmNXVMrcB3L.utTqiJMf8Au8IL6Prnvd.yXkYRwY9mIy', 1, 1, '1234567890', 'Male', '2023-07-04', 'Active', NULL, '2023-07-22 01:03:47', '2023-07-22 01:03:47'),
(12, 'keval', 'Shah', 'keval@gmail.com', NULL, '$2y$10$Vr.FLEMucIX5Sd3p2g.09.rGx9lZ9PzyHy38mYqAhO6zligZIFkUq', 1, 1, '85965896589', 'Male', '2023-07-21', 'Active', NULL, '2023-07-22 01:38:31', '2023-07-22 01:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `userId`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'http://127.0.0.1:8000/video-edit/2', 'Active', '2023-07-21 06:38:24', '2023-07-24 06:25:43'),
(2, 1, 'http://127.0.0.1:8000/video-create', 'Active', '2023-07-21 06:43:09', '2023-07-21 06:43:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_masters`
--
ALTER TABLE `language_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_masters`
--
ALTER TABLE `social_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `language_masters`
--
ALTER TABLE `language_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_masters`
--
ALTER TABLE `social_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 23, 2025 at 08:52 PM
-- Server version: 10.6.23-MariaDB-log
-- PHP Version: 8.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urosdeve_laravel`
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('dashboard_calls_01/08/2025', 'i:2;', 1754085600),
('dashboard_calls_02/08/2025', 'i:2;', 1754172000),
('dashboard_calls_03/08/2025', 'i:2;', 1754258400),
('dashboard_calls_04/08/2025', 'i:2;', 1754344800),
('dashboard_calls_05/08/2025', 'i:2;', 1754431200),
('dashboard_calls_06/08/2025', 'i:2;', 1754517600),
('dashboard_calls_07/08/2025', 'i:2;', 1754604000),
('dashboard_calls_08/08/2025', 'i:2;', 1754690400),
('dashboard_calls_09/07/2025', 'i:2;', 1752098400),
('dashboard_calls_09/08/2025', 'i:2;', 1754776800),
('dashboard_calls_10/07/2025', 'i:2;', 1752184800),
('dashboard_calls_10/08/2025', 'i:1;', 1754863200),
('dashboard_calls_11/07/2025', 'i:2;', 1752271200),
('dashboard_calls_11/08/2025', 'i:2;', 1754949600),
('dashboard_calls_12/07/2025', 'i:1;', 1752357600),
('dashboard_calls_12/08/2025', 'i:2;', 1755036000),
('dashboard_calls_13/07/2025', 'i:2;', 1752444000),
('dashboard_calls_13/08/2025', 'i:2;', 1755122400),
('dashboard_calls_14/07/2025', 'i:2;', 1752530400),
('dashboard_calls_14/08/2025', 'i:2;', 1755208800),
('dashboard_calls_15/07/2025', 'i:2;', 1752616800),
('dashboard_calls_15/08/2025', 'i:2;', 1755295200),
('dashboard_calls_16/07/2025', 'i:2;', 1752703200),
('dashboard_calls_16/08/2025', 'i:2;', 1755381600),
('dashboard_calls_17/07/2025', 'i:2;', 1752789600),
('dashboard_calls_17/08/2025', 'i:2;', 1755468000),
('dashboard_calls_18/07/2025', 'i:2;', 1752876000),
('dashboard_calls_18/08/2025', 'i:2;', 1755554400),
('dashboard_calls_19/07/2025', 'i:2;', 1752962400),
('dashboard_calls_19/08/2025', 'i:2;', 1755640800),
('dashboard_calls_20/07/2025', 'i:2;', 1753048800),
('dashboard_calls_20/08/2025', 'i:1;', 1755727200),
('dashboard_calls_21/07/2025', 'i:2;', 1753135200),
('dashboard_calls_21/08/2025', 'i:2;', 1755813600),
('dashboard_calls_22/07/2025', 'i:2;', 1753221600),
('dashboard_calls_22/08/2025', 'i:2;', 1755900000),
('dashboard_calls_23/07/2025', 'i:2;', 1753308000),
('dashboard_calls_23/08/2025', 'i:2;', 1755986400),
('dashboard_calls_24/07/2025', 'i:2;', 1753394400),
('dashboard_calls_25/07/2025', 'i:2;', 1753480800),
('dashboard_calls_26/07/2025', 'i:2;', 1753567200),
('dashboard_calls_27/07/2025', 'i:2;', 1753653600),
('dashboard_calls_28/07/2025', 'i:2;', 1753740000),
('dashboard_calls_29/07/2025', 'i:2;', 1753826400),
('dashboard_calls_30/07/2025', 'i:2;', 1753912800),
('dashboard_calls_31/07/2025', 'i:2;', 1753999200);

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
(4, '2025_02_03_171405_create_weather_map_belgrade', 2),
(5, '2025_02_04_140353_create_stock_table', 3),
(6, '2025_02_06_153019_create_todos_table', 4),
(7, '2025_08_01_170540_create_receipt_categories_table', 5),
(8, '2025_08_01_170622_create_receipts_table', 5);

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
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'RSD',
  `receipt_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `amount`, `currency`, `receipt_category_id`, `created_at`, `updated_at`) VALUES
(13, 743.00, '3', 11, '2025-08-02 08:54:56', '2025-08-02 08:54:56'),
(14, 170.00, '3', 11, '2025-08-03 16:05:20', '2025-08-03 16:05:20'),
(15, 70.00, '3', 7, '2025-08-04 07:53:26', '2025-08-04 07:53:26'),
(16, 600.00, '3', 8, '2025-08-04 13:36:27', '2025-08-04 13:36:27'),
(17, 125.00, '1', 7, '2025-08-05 08:59:29', '2025-08-05 08:59:29'),
(18, 2.00, '1', 7, '2025-08-05 14:58:12', '2025-08-05 14:58:12'),
(19, 40.00, '1', 7, '2025-08-05 14:58:34', '2025-08-05 14:58:34'),
(20, 200.00, '3', 7, '2025-08-06 14:12:10', '2025-08-06 14:12:10'),
(21, 30.00, '1', 7, '2025-08-08 18:41:31', '2025-08-08 18:41:31'),
(22, 150.00, '1', 7, '2025-08-14 08:25:35', '2025-08-14 08:25:35'),
(23, 270.00, '3', 11, '2025-08-15 15:17:26', '2025-08-15 15:17:26'),
(24, 50.00, '1', 8, '2025-08-15 15:17:46', '2025-08-15 15:17:46'),
(25, 150.00, '3', 15, '2025-08-16 18:19:02', '2025-08-16 18:19:02'),
(26, 1500.00, '3', 11, '2025-08-17 15:04:38', '2025-08-17 15:04:38'),
(27, 230.00, '3', 16, '2025-08-18 10:36:34', '2025-08-18 10:36:34'),
(28, 560.00, '3', 15, '2025-08-18 14:09:29', '2025-08-18 14:09:29'),
(29, 7.00, '1', 10, '2025-08-19 13:58:23', '2025-08-19 13:58:23'),
(30, 5.00, '1', 1, '2025-08-22 20:50:47', '2025-08-22 20:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_categories`
--

CREATE TABLE `receipt_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipt_categories`
--

INSERT INTO `receipt_categories` (`id`, `label`, `img`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Education', '/images/receipt-logos/education.png', NULL, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(2, 'Gifts', '/images/receipt-logos/gifts.jpg', NULL, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(3, 'Nightlife', '/images/receipt-logos/nightLife.png', NULL, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(4, 'Opel', '/images/receipt-logos/opel.png', NULL, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(5, 'Cost of living', '/images/receipt-logos/racuni.png', NULL, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(6, 'Renovation', '/images/receipt-logos/renoviranje.jpg', NULL, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(7, 'Travel', '/images/receipt-logos/travel.jpg', NULL, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(8, 'Other costes', '/images/receipt-logos/other.jpg', NULL, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(9, 'Food', '/images/receipt-logos/food.jpg', NULL, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(10, 'Aldi', '/images/receipt-logos/food/aldi.jpg', 9, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(11, 'Aroma', '/images/receipt-logos/food/aroma.png', 9, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(12, 'Butcher', '/images/receipt-logos/food/butcher.png', 9, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(13, 'Fruits', '/images/receipt-logos/food/fruit.png', 9, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(14, 'Lidl', '/images/receipt-logos/food/Lidl-Logo.svg.png', 9, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(15, 'Maxi', '/images/receipt-logos/food/maxi.jpg', 9, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(16, 'McDonalds', '/images/receipt-logos/food/McDonalds.svg.png', 9, '2025-08-01 15:38:22', '2025-08-01 15:38:22'),
(17, 'Rewe', '/images/receipt-logos/food/rewe.png', 9, '2025-08-01 15:38:22', '2025-08-01 15:38:22');

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
('43u58lBoBXwaxqoFt2rMi2UFbXH0Nx5LzjMJNbRp', NULL, '205.210.31.22', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibkR1blN2SWlCOERiVDNsZ09VWUppWGpOWkNuTGRoNFE5SkxzTlVqaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755903913),
('4LBgKUTWa5B703Vf3GoTEQXR6cxZlwpuLu1NveZE', NULL, '88.64.145.238', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGNzVE83SnMwV3VNUkhsZkhkdDQydFp1V0ljMFZjMGhiaGxuT3pyTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755689577),
('69uR9SqgJOF6L8iS2kTIyVqICugiKVuaBE4jbb4H', NULL, '88.64.145.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnZBRHFHa1JVQzdLemVMdVdHZ2NaTG5zTFBBcDhsWWVXQkhtVGdtTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9fQ==', 1755903048),
('6Cd6kGmU8K9vPWvABze0nsI9tnqN0uq40SqcI7wW', NULL, '87.116.160.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQTBURVJmaDZmZDk3SzF5M2U5TXYyS1VHUGN6Sm1SQkV6cHpBdkt1dSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9fQ==', 1755533370),
('6uHrkM2ItfUwdOm2CDFCRxBriImQZ3XDGXbHM1qW', NULL, '178.24.248.78', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWtrYUVTaXRxWkVrenVLMEdJb3FqNVFXNm5Ca1Q2WlBuU3hkSm1tRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755587077),
('8zuytfzMtaWC7q8DaqT5IFrqBWLoAYgJMQhDZKEM', NULL, '205.210.31.251', 'Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGh0NDQ3QkVTVXJZWWFGM3g5ZDZmeXFpMHplU0N0Z2o0MlNUa1ZlZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vd3d3LmRhc2hib2FyZC51cm9zZGV2ZWxvcGVyLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755560926),
('DxwCHGzHJ34Gv8OBzaQgmhMi5jfpbgjAYPTCUpwU', NULL, '88.64.145.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTkYzaVRHM3RKVDB1b2t0VXBrMTNVNVZxQjlXWG80Njh4Ym5ZT0p1WiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755975102),
('G2C0c3t3BTtJ4Z69JokRhNIiTCrqyy1g0xHgzr5A', NULL, '45.55.207.66', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYU1pQUNOS0VhME92T3FwdE1TcTZsdlk2NEphc3hTODh2NWE3WWdkQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755579854),
('hfXA1sxb5a3SzDDLxObKOefhGsz279fVctHO3XxV', NULL, '88.64.145.238', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTHUwbDJCdXZGRWxrNFVMVGFuTHF4S2VrQ09hYVZWZWRhbXZGbVAzVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755854324),
('IgzT5MPtCWaSolM6TGfN5xYPKR64vf2siUdF81gY', NULL, '46.101.58.250', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM0hjYWU1Ymw3ZkFmU2h5U1J0Skt6dFBTZjBlc2ZkU0trakF2Wm1YSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vd3d3LmRhc2hib2FyZC51cm9zZGV2ZWxvcGVyLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755750286),
('J6Tsrq6PuqGeOplnP1jkeCrqhbEDiXJ8aMfPPA8W', NULL, '88.64.145.238', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjZpbFA2VmNCVUhsYXpWSmZpTWgwR3FoS0UzbEhkMUpjWk1uTHY1bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755971792),
('oqwR5Mge6UVu4pHWvxnOpglbxvQJeKl2o2ATzXWD', NULL, '88.64.145.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3o5SDlaekVDNUh2N3ZEa3A3TGRibE5EWE9LV2VwbGZpdlNtN1pidSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755802588),
('vmTaxwl4W8xL8dJGCFvpGjjEsYLa7GziE1PzofHD', NULL, '88.64.145.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSjdTRkdVWnlCcW5wRjNFOVcxTEROdTNBTnBzTkVpU0ZHVmpwb24wYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJhbW91bnQiO3M6MzoiMTIzIjtzOjg6ImN1cnJlbmN5IjtzOjE6IjEiO30=', 1755863798),
('wGaTCvQWjqpKOKpjqHMUE32GedOGX31bXFFnSm9d', NULL, '88.64.145.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmtoTzRRZk9LdHlkUkw1OVBuYk4zUUdUTlhsa0h4bGNreDNVZEJYWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9fQ==', 1755942576),
('wLQTnHQbZLfzOfwfWsiYXVlamgf4FDtu7TUSaN9B', NULL, '88.64.145.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoidUh4b21ERHRIdFdQM0NGUDRGd0tuRzF1eWlkbUxSeXkxME9HUTBXZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755901991),
('XcSpHOqu816eZu7JhyhFffKfuDshGJFUktGPWNr9', NULL, '88.64.145.238', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM3dOWU52V0xFZ0duSGNSc1Y1Z2tVUmFxbm90TWZnUXBKR3dBdHpiMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755619104),
('xjpstbq9jJQsMcjpuwREOyciGi0AdrEmBsRkdQ0J', NULL, '205.210.31.141', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUxTZXE0bXIzTEtlNkc5SVU5dkFLRDBsdGVXODZJMDdadXJieFVIOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZGFzaGJvYXJkLnVyb3NkZXZlbG9wZXIuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755965956),
('XmOPbmFPSB44BSDeTxEWLaoSITgVGRrGDkDG1oUb', NULL, '146.148.75.57', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0dVa0NJQTFqUEVMMXptWDdrNHdvVEtaNERZUHBSOWJMZ0xzR096cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vd3d3LmRhc2hib2FyZC51cm9zZGV2ZWxvcGVyLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755880186);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stockSymbol` varchar(255) NOT NULL,
  `LastRefreshed` varchar(255) NOT NULL,
  `high` varchar(255) NOT NULL,
  `volume` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `stockSymbol`, `LastRefreshed`, `high`, `volume`, `created_at`, `updated_at`) VALUES
(1, 'MSFT', '21/08/2025', '505', 4610, '2025-02-04 14:31:09', '2025-08-22 09:18:39'),
(2, 'MCD', '21/08/2025', '315', 6, '2025-03-02 09:41:29', '2025-08-22 09:18:43'),
(3, 'KO', '21/08/2025', '71', 157, '2025-03-02 09:41:30', '2025-08-22 09:18:41'),
(4, 'AAPL', '21/08/2025', '225', 1495, '2025-03-13 13:22:42', '2025-08-22 09:18:40'),
(5, 'GM', '21/08/2025', '57', 1, '2025-03-24 06:39:40', '2025-08-22 09:18:42'),
(6, 'SPY', '01/08/2025', '622', 1224288, '2025-07-29 07:39:56', '2025-08-02 22:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `title`, `description`, `completed`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(27, 'Setup Project Environment', 'Install Laravel & Vue.js', 0, NULL, NULL, '2025-02-21 10:58:46', '2025-08-22 20:49:11'),
(28, 'User Authentication', 'Implement registration & login (Laravel Breeze or Laravel Sanctum)', 0, NULL, NULL, '2025-02-21 10:59:01', '2025-03-01 17:08:56'),
(29, 'Task CRUD API (Backend - Laravel)', 'Create Task model & migration', 0, NULL, NULL, '2025-03-01 13:06:52', '2025-03-01 17:09:09'),
(30, 'Task Management UI (Frontend - Vue.js)', 'Fetch tasks from API and display in a list', 0, NULL, NULL, '2025-03-01 17:09:23', '2025-03-01 17:09:23'),
(31, 'Task Completion & Status', 'Add checkbox to mark tasks as completed', 0, NULL, NULL, '2025-03-01 17:09:37', '2025-03-01 17:09:37'),
(32, 'Task Filtering & Sorting', 'Filter tasks by status (completed/pending)', 0, NULL, NULL, '2025-03-01 17:09:52', '2025-03-01 17:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-08-01 15:38:22', '$2y$12$chvpu3QQai0dO2WbG.bWxuay7d3EmAGd3/kVt8lU4dOHmJsHFMRKa', 'UnM6zorMqq', '2025-08-01 15:38:22', '2025-08-01 15:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `weather_map_belgrade`
--

CREATE TABLE `weather_map_belgrade` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `town` varchar(255) NOT NULL,
  `weather` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weather_map_belgrade`
--

INSERT INTO `weather_map_belgrade` (`id`, `town`, `weather`, `created_at`, `updated_at`) VALUES
(6, 'Belgrade', '17', '2025-02-03 17:42:16', '2025-08-22 22:33:05'),
(7, 'Nuremberg', '15', '2025-02-09 18:56:01', '2025-08-22 22:33:05'),
(8, 'Havana', '24', '2025-02-09 18:56:01', '2025-08-22 10:45:17');

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
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipts_receipt_category_id_foreign` (`receipt_category_id`);

--
-- Indexes for table `receipt_categories`
--
ALTER TABLE `receipt_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weather_map_belgrade`
--
ALTER TABLE `weather_map_belgrade`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `receipt_categories`
--
ALTER TABLE `receipt_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `weather_map_belgrade`
--
ALTER TABLE `weather_map_belgrade`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_receipt_category_id_foreign` FOREIGN KEY (`receipt_category_id`) REFERENCES `receipt_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `receipt_categories`
--
ALTER TABLE `receipt_categories`
  ADD CONSTRAINT `receipt_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `receipt_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

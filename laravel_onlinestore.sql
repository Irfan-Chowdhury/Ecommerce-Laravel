-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 03:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avater` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Yamaha', 'ACI Motors', '1572451090.jpg', '2019-10-30 09:03:35', '2019-10-30 09:58:10'),
(2, 'Suzuki', 'This is Suzuki Brands', '1572451203.png', '2019-10-30 09:12:00', '2019-10-30 10:00:03'),
(3, 'Honda', 'This is Honda Brand', '1572451263.png', '2019-10-30 09:16:36', '2019-10-30 10:01:03'),
(6, 'FZ', '2019 Model Bike', '1574063946.jpg', '2019-11-18 01:20:18', '2019-11-18 01:59:06'),
(7, 'Nissan', 'Brand Company', NULL, '2019-11-18 07:12:24', '2019-11-18 07:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(11, NULL, 33, NULL, '127.0.0.1', 1, '2019-11-25 04:07:19', '2019-11-25 04:13:03'),
(12, NULL, 33, NULL, '::1', 1, '2019-11-25 04:12:08', '2019-11-25 04:12:08'),
(13, NULL, 30, NULL, '::1', 1, '2019-11-25 04:13:53', '2019-11-25 04:13:53'),
(14, NULL, 30, NULL, '127.0.0.1', 2, '2019-11-25 04:13:54', '2019-11-25 04:18:59'),
(15, NULL, 32, NULL, '::1', 1, '2019-11-25 04:18:27', '2019-11-25 04:18:27'),
(16, NULL, 32, NULL, '127.0.0.1', 2, '2019-11-25 04:18:27', '2019-11-25 04:40:08'),
(17, NULL, 29, NULL, '127.0.0.1', 1, '2019-11-25 04:24:49', '2019-11-25 04:24:49'),
(18, NULL, 27, NULL, '127.0.0.1', 1, '2019-11-25 04:26:47', '2019-11-25 04:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(19, 'Bikes', 'All Types Of Bykes', '1568297630.jpg', NULL, '2019-09-12 08:13:51', '2019-09-12 08:13:51'),
(20, 'Car', 'All Types Of Car', NULL, NULL, '2019-09-12 08:14:26', '2019-09-12 08:14:26'),
(21, 'Yamaha', 'All Yahamah Bikes', NULL, 19, '2019-09-12 08:15:31', '2019-09-12 08:15:31'),
(22, 'Suzuki', 'All Suzuki Bikes', NULL, 19, '2019-09-12 08:15:52', '2019-09-12 08:15:52'),
(23, 'Toyota', 'Toyota Car', NULL, 20, '2019-09-12 08:16:23', '2019-09-12 08:16:23'),
(24, 'Tablets', 'All Tablets', NULL, NULL, '2019-09-12 08:16:55', '2019-09-12 08:16:55'),
(25, 'Phone', 'All Phone', NULL, NULL, '2019-09-12 08:17:21', '2019-09-12 08:17:21'),
(26, 'Camera', 'All Types Of Camera', NULL, NULL, '2019-09-12 08:17:42', '2019-09-12 08:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 4, 'Feni', '2019-11-03 01:59:08', '2019-11-03 01:59:08'),
(2, 4, 'Noakhali', '2019-11-03 02:04:31', '2019-11-03 02:04:31'),
(3, 4, 'Comilla', '2019-11-03 02:04:43', '2019-11-03 02:24:59'),
(5, 4, 'Chittagong', '2019-11-03 03:11:34', '2019-11-03 03:11:34'),
(6, 1, 'Narayanganj', NULL, NULL),
(7, 1, 'Gazipur', NULL, NULL),
(8, 1, 'Dhaka', NULL, NULL),
(9, 6, 'Habiganj', NULL, NULL),
(10, 6, 'Moulvibazar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 3, '2019-11-03 00:31:24', '2019-11-03 00:31:24'),
(2, 'Barishal', 1, '2019-11-03 00:50:26', '2019-11-03 01:13:58'),
(4, 'Chittagong', 2, '2019-11-03 01:31:32', '2019-11-03 01:31:32'),
(5, 'Rajshahi', 4, '2019-11-03 02:05:27', '2019-11-03 02:05:27'),
(6, 'Sylhet', 5, '2019-11-03 02:05:44', '2019-11-03 02:05:44'),
(7, 'Khulna', 6, '2019-11-03 02:06:24', '2019-11-03 02:06:24'),
(8, 'Rangpur', 7, '2019-11-03 02:06:35', '2019-11-03 02:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_25_094646_create_categories_table', 1),
(4, '2019_07_25_094942_create_brands_table', 1),
(5, '2019_07_25_095044_create_admins_table', 1),
(6, '2019_07_25_095633_create_products_table', 1),
(9, '2019_07_25_095836_create_product_images_table', 2),
(10, '2014_10_12_000000_create_users_table', 3),
(11, '2019_11_03_052528_create_divisions__table', 4),
(12, '2019_11_03_052847_create_districts_table', 4),
(13, '2019_11_04_123213_create_orders_table', 5),
(14, '2019_11_04_124143_create_carts_table', 5),
(15, '2019_11_11_061453_create_settings_table', 6),
(16, '2019_11_11_061723_create_payments_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_complete` tinyint(1) NOT NULL DEFAULT '0',
  `seen_by_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `offer_price` int(11) DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `admin_id`, `created_at`, `updated_at`) VALUES
(27, 21, 1, 'Yamaha FZ S V3.0 FI', 'The Yamaha FZ-S FI Version 3.0 is the slightly more premium version of the Yamaha FZ V 3.0, with minor cosmetic changes, including glossy chrome ...', 'yamaha-fz-s-v30-fi', 50, 500000, 1, 450000, 1, '2019-08-08 22:37:15', '2019-08-08 22:37:15'),
(28, 22, 1, 'Bajaj Pulsar RS 200', 'It is a fully faired bike from Bajaj which has undergone comprehensive cosmetic upgrades in the recent past. Up front, it gets twin projector ...', 'bajaj-pulsar-rs-200', 100, 300000, 1, 250000, 1, '2019-08-08 22:40:25', '2019-08-08 22:40:25'),
(29, 21, 1, 'Yamaha', 'price in Delhi starts from Rs. 1.36 lakh (Ex-showroom). MT-15 is available in only 1 variant. Yamaha MT 15\'s top competitors are Yamaha R15 V3', 'yamaha', 120, 450000, 1, 400000, 1, '2019-08-08 22:43:02', '2019-08-08 22:43:02'),
(30, 22, 3, 'Honda', 'The all-new Honda X-Blade 160 cc naked sporty motorcycle has been launched in India with an ex-shworoom, Dehli price tag of Rs 78,500. The motorcycle ...', 'honda', 0, 250000, 1, NULL, 1, '2019-08-08 22:53:42', '2019-10-30 12:14:08'),
(32, 25, 5, 'testing', 'testing', 'testing', 123, 123456, 1, 123445, 1, '2019-10-30 11:47:03', '2019-10-30 11:57:40'),
(33, 20, 7, 'Nissan 2019', 'Nice', 'nissan-2019', 20, 1050000, 1, 1000000, 1, '2019-11-18 07:16:46', '2019-11-18 07:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(36, 27, 'Gcb7V0lyX3.png', '2019-08-08 22:37:16', '2019-08-08 22:37:16'),
(37, 28, '7EXam5qY8E.png', '2019-08-08 22:40:25', '2019-08-08 22:40:25'),
(38, 29, 'KhFYzaS5A8.jpg', '2019-08-08 22:43:02', '2019-08-08 22:43:02'),
(39, 29, 'ZNZE3LHMTc.jpg', '2019-08-08 22:43:02', '2019-08-08 22:43:02'),
(40, 29, 'R6JZ7vDpo3.jpg', '2019-08-08 22:43:02', '2019-08-08 22:43:02'),
(41, 30, 'wWLo6GhQ3n.png', '2019-08-08 22:53:42', '2019-08-08 22:53:42'),
(42, 31, 'Kli62VKIHQ.jpg', '2019-10-30 11:45:49', '2019-10-30 11:45:49'),
(43, 32, 'lLWFhouk4U.jpg', '2019-10-30 11:47:03', '2019-10-30 11:47:03'),
(69, 33, 'wZWjVQg7W5.jpg', '2019-11-20 03:24:17', '2019-11-20 03:24:17'),
(70, 33, 'EI9mqPdAUm.jpg', '2019-11-20 03:24:17', '2019-11-20 03:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '50',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone`, `email`, `email_verified_at`, `password`, `address`, `division_id`, `district_id`, `status`, `ip_address`, `avater`, `shipping_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Irfan', 'Chowdhury', 'irfan_chowdhury', '01819057993', 'irfanchowdhury80@gmail.com', NULL, '$2y$10$HcBMKmTvwEXzy/rQwsdOlu7ULfRscTLyQQsTYjoSrBQ/HQSBqqEsa', 'Muradpur,Panchlaish,Chittagong', 4, 3, 0, '127.0.0.1', NULL, 'Bohoddarhat', NULL, '2019-11-03 03:03:56', '2019-11-12 01:51:45'),
(2, 'Arman', 'Alam', 'armanalam', '123456789', 'arman@gmail.com', NULL, '$2y$10$WSvKR17/Fy.jKQfP9jRxmOcol23ni.UFwn9FAjy9PH0sgx5awc/Uq', 'Aturar, Dipu', 4, 3, 0, '127.0.0.1', NULL, NULL, NULL, '2019-11-03 10:27:21', '2019-11-03 10:27:21'),
(3, 'Mohammad Ayub', 'Ali', 'mohammad-ayubali', '0152122515', 'mohammadayubali88@gmail.com', NULL, '$2y$10$U67beD0dUopYXl2i7GITWetZNw6atct6DUkjT5ZQI97yh5o4UZO46', 'Comilla', 4, 3, 0, '127.0.0.1', NULL, NULL, NULL, '2019-11-04 02:34:48', '2019-11-04 02:34:48'),
(6, 'Promi', 'Chowdhury', 'promichowdhury', '01993678742', 'promichowdhury03@gmail.com', NULL, '$2y$10$EMJeyxM8sMc4.EszeIJ32uzu41NlsTV3xdO2WgpS.3MmvwULzF5ha', 'Muradpur,Panchlaish,Chittagong', 4, 5, 0, '127.0.0.1', NULL, NULL, NULL, '2019-11-12 03:00:34', '2019-11-12 03:00:34'),
(12, 'Pai Nu', 'Mong Marma', 'pai-numong-marma', '01829498634', 'painumong@gmail.com', NULL, '$2y$10$PD4afY2IFdUDOQQ2uNDQNO8H/zDY6DzlR9S.kgeleJFve4VoUaStu', 'NSTU, Noakhali', 4, 2, 0, '127.0.0.1', NULL, NULL, NULL, '2019-11-25 01:45:53', '2019-11-25 01:45:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 01:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(5, '6', '2', '1', '2022-03-02 03:01:55', '2022-03-02 03:01:55'),
(6, '9', '2', '1', '2022-03-02 07:24:52', '2022-03-02 07:24:52'),
(7, '9', '3', '1', '2022-03-02 07:25:02', '2022-03-02 07:25:02'),
(8, '9', '1', '5', '2022-03-02 07:25:14', '2022-03-02 07:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descrip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_descrip`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Kid Clothing', 'kid cloth', 'High quality clothing for every season', 1, 0, '1646133691.jpg', 'kids_clothing', 'kids_clothing kids_clothing', 'kids_clothing', '2022-02-22 08:16:01', '2022-03-01 05:36:31'),
(5, 'Mens Clothing', 'mens-clothing', 'High quality gents wear for all seasons', 1, 1, '1645712647.jfif', 'dgdfg', 'dfgdgd', 'dfgdgd', '2022-02-24 08:39:07', '2022-03-01 05:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_02_18_140950_create_categories_table', 1),
(11, '2022_02_23_135605_create_products_table', 2),
(12, '2022_03_02_052832_create_carts_table', 3),
(13, '2022_03_03_110100_create_orders_table', 4),
(14, '2022_03_03_110620_create_order_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `status`, `message`, `tracking_no`, `created_at`, `updated_at`) VALUES
(1, 0, 'Rahul', 'Shakya', 'rahul@gmail.com', 'fgfg', 'dfvgdf', 'dfgdfg', 'dfgdfg', 'dfgdfg', 'dgdfg', 'dfgdfg', '0', NULL, 'admin6628', '2022-03-03 05:57:29', '2022-03-03 05:57:29'),
(2, 0, 'Rohel', 'Shakya', 'rohelshk@gmail.com', 'dgdf', 'gdfg', 'dfgdf', 'dfgdfg', 'dgdf', 'dgdf', 'dgdf', '0', NULL, 'admin8861', '2022-03-03 06:01:18', '2022-03-03 06:01:18'),
(3, 0, 'Rahul', 'Shakya', 'rahul@gmail.com', 'fgfg', 'dfvgdf', 'dfgdfg', 'dfgdfg', 'dfgdfg', 'dgdfg', 'dfgdfg', '0', NULL, 'admin6008', '2022-03-03 06:12:03', '2022-03-03 06:12:03'),
(4, 0, 'Rahul', 'Shakya', 'rahul@gmail.com', 'fgfg', 'dfvgdf', 'dfgdfg', 'dfgdfg', 'dfgdfg', 'dgdfg', 'dfgdfg', '0', NULL, 'admin8572', '2022-03-03 06:13:39', '2022-03-03 06:13:39'),
(5, 0, 'Rohel Shakya', 'vdfgfd', 'rohelshk@gmail.com', 'sdfsd', 'sfdf', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsdf', '0', NULL, 'admin7047', '2022-03-03 06:16:21', '2022-03-03 06:16:21'),
(6, 0, 'Rohel Shakya', 'vdfgfd', 'rohelshk@gmail.com', 'sdfsd', 'sfdf', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsdf', '0', NULL, 'admin4080', '2022-03-03 06:24:32', '2022-03-03 06:24:32'),
(7, 0, 'Rohel Shakya', 'vdfgfd', 'rohelshk@gmail.com', 'sdfsd', 'sfdf', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsdf', '0', NULL, 'admin7149', '2022-03-03 06:26:22', '2022-03-03 06:26:22'),
(8, 2, 'Rohel Shakya', 'vdfgfd', 'rohelshk@gmail.com', 'sdfsd', 'sfdf', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsdf', '0', NULL, 'admin9693', '2022-03-03 06:50:32', '2022-03-03 06:50:32'),
(9, 2, 'Rohel Shakya', 'vdfgfd', 'rohelshk@gmail.com', 'sdfsd', 'sfdf', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsdf', '0', NULL, 'admin5036', '2022-03-03 06:55:34', '2022-03-03 06:55:34'),
(10, 2, 'Rohel Shakya', 'vdfgfd', 'rohelshk@gmail.com', 'sdfsd', 'sfdf', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsdf', '0', NULL, 'admin6584', '2022-03-03 06:56:37', '2022-03-03 06:56:37'),
(11, 2, 'Rohel Shakya', 'vdfgfd', 'rohelshk@gmail.com', 'sdfsd', 'sfdf', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsdf', '0', NULL, 'admin9881', '2022-03-03 06:56:51', '2022-03-03 06:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', '3', '10', '1700', '2022-03-03 05:57:29', '2022-03-03 05:57:29'),
(2, '2', '3', '10', '1700', '2022-03-03 06:01:18', '2022-03-03 06:01:18'),
(3, '2', '1', '3', '2200', '2022-03-03 06:01:18', '2022-03-03 06:01:18'),
(4, '3', '3', '10', '1700', '2022-03-03 06:12:03', '2022-03-03 06:12:03'),
(5, '3', '1', '3', '2200', '2022-03-03 06:12:03', '2022-03-03 06:12:03'),
(6, '4', '1', '3', '2200', '2022-03-03 06:13:39', '2022-03-03 06:13:39'),
(7, '5', '3', '3', '1700', '2022-03-03 06:16:21', '2022-03-03 06:16:21'),
(8, '5', '1', '3', '2200', '2022-03-03 06:16:21', '2022-03-03 06:16:21'),
(9, '6', '1', '3', '2200', '2022-03-03 06:24:32', '2022-03-03 06:24:32'),
(10, '7', '1', '3', '2200', '2022-03-03 06:26:23', '2022-03-03 06:26:23'),
(11, '8', '1', '1', '2200', '2022-03-03 06:50:32', '2022-03-03 06:50:32'),
(12, '9', '3', '10', '1700', '2022-03-03 06:55:34', '2022-03-03 06:55:34'),
(13, '10', '3', '1', '1700', '2022-03-03 06:56:37', '2022-03-03 06:56:37'),
(14, '11', '3', '1', '1700', '2022-03-03 06:56:51', '2022-03-03 06:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rohelshk@gmail.com', '$2y$10$YmEDLmu/NSDpe/UAXXoP0OpIg6dax0y4rO2PVS6.Ogvy.LktJZDv.', '2022-02-28 09:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Girl TBKF2033PC Toy Balloon Kids peach Dresses', 'Kids peach Dresses', 'Toy Balloon Kids Peach High Low Girls Party Wear Dress', 'Age:11-14 Years | Fabric:70%Polyester 30%Cotton | Color: PEACH | Occasion: Party Wear | Pattern:	Designer | Neck Type: Round | Sleeves: Type	Sleeveless', '2500', '2200', '1645976967.jpg', '0', '99', 1, 1, 'kids_clothing', 'Toy Balloon Kids Peach High Low Girls Party Wear Dress', 'Toy Balloon Kids Peach High Low Girls Party Wear Dress', '2022-02-23 09:28:03', '2022-03-03 06:50:32'),
(3, 1, 'PARIS HAMILTON  Women\'s Fringed Bootcut', 'PARIS HAMILTON', '100% Original Products\r\nPay on delivery might be available\r\nEasy 30 days returns and exchanges\r\nTry & Buy might be available', '100% Original Products', '2000', '1700', '1645977946.jpg', '0', '100', 1, 1, '100% Original Products', '100% Original Products', '100% Original Products', '2022-02-23 09:29:25', '2022-03-03 06:56:51'),
(6, 5, 'ASOS DESIGN organic tapered joggers in black', 'ASOS DESIGN organic tapered joggers in black', 'Joggers by ASOS DESIGN,Part of our responsible edit,Elasticated drawstring waist', 'Joggers by ASOS DESIGN,Part of our responsible edit,Elasticated drawstring waist', '2000', '1800', '1646112427.jpg', '0', '100', 1, 1, 'mens_clothing', 'mens_clothing joggers', 'mens_clothing joggers  mens_clothing joggers', '2022-02-28 23:42:07', '2022-03-03 04:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Rohel Shakya', 'rohelshk@gmail.com', NULL, '$2y$10$bFW4RQ./1EtYIWKR4SwazuwsvCfb2SDyKOUNfTx9tZr3G8kw6G0We', 'vdfgfd', 'sdfsd', 'sfdf', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsdf', 1, 'kfRkb8YEvgJq0gVi1HM7AJcHdaJHIi1y0YW72MJ9mDT6wVHDuNuGTTlqoPq3', '2022-02-19 09:34:50', '2022-03-03 06:16:21'),
(3, 'Normal User', 'normal@gmail.com', NULL, '$2y$10$Q61ImLAwZQ6kULVjRY33juB34c409KP/atPOHIrmWojKfsDtJXfhK', '', '', '', '', '', '', '', '', 0, NULL, '2022-02-19 10:22:51', '2022-02-19 10:22:51'),
(4, 'Rahul', 'rahul@gmail.com', NULL, '$2y$10$P5tTG5TZNUPuBztRlsCVBeqYPepv/Fk7VoL8xBF18e.lim511LYWW', 'Shakya', 'fgfg', 'dfvgdf', 'dfgdfg', 'dfgdfg', 'dfgdfg', 'dgdfg', 'dfgdfg', 0, NULL, '2022-02-25 09:35:09', '2022-03-03 05:57:29'),
(5, 'User', 'user@gmail.com', NULL, '$2y$10$nVmAW7EzlebIorALmqXVCO6mTyR6wNc3DOg.I2tBjMXn38yIZvtLG', '', '', '', '', '', '', '', '', 0, NULL, '2022-02-27 08:29:02', '2022-02-27 08:29:02'),
(6, 'Second user', 'second@gmail.com', NULL, '$2y$10$jEv7vkzTK6qoTYvJI4Eva.6tyLQOczlUkDRGHZV7/zLtwSgq9ObWy', '', '', '', '', '', '', '', '', 0, NULL, '2022-03-02 02:22:32', '2022-03-02 02:22:32'),
(7, 'third', 'third@gmail.com', NULL, '$2y$10$6FrQneTpaRa4mqqYZgbNp.PxIUJTg7hAbxWjV11frSAINXDFhy12i', '', '', '', '', '', '', '', '', 0, NULL, '2022-03-02 02:23:44', '2022-03-02 02:23:44'),
(8, 'fourth', 'fourth@gmail.com', NULL, '$2y$10$nFRuc8fKi.y5Mdz4q537qe3YleRzHm8Ono7eZh.h14oduqj7VHUTq', '', '', '', '', '', '', '', '', 0, NULL, '2022-03-02 02:24:56', '2022-03-02 02:24:56'),
(9, 'fifth', 'fifth@gmail.com', NULL, '$2y$10$/qfHU6eXuxNVbwwiXPUube0EfnZTKYG13im6N4PrZuJd1bbSm3wv.', '', '', '', '', '', '', '', '', 0, NULL, '2022-03-02 02:25:49', '2022-03-02 02:25:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

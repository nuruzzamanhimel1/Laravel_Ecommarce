-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 10:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laravel_ecommarce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avater` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin' COMMENT 'Admin|Super Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `avater`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nuruzzaman Himel', 'n.himel143@gmail.com', '$2y$10$ChrKXQ7cBSZmu5pM/i8a8eEz5MkxIDF9b48mLT39rC3a2jwEo6swq', '01622819929', NULL, 'Super Admin', 'mE1BH2to6toY19H998B9O4sSDUpzkaM9jYcGQz804sG48Rl2IlHccOmGY8Rm', '2020-09-18 10:10:25', '2020-09-22 04:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'sony', 'Search Results\r\nFeatured snippet from the web\r\nElectronics. Headquartered in San Diego, Sony Electronics is a leading provider of audio/video electronics and information technology products for the consumer and professional markets. Operations include research and development, engineering, sales, marketing, distribution, and customer service.\r\nSearch Results\r\nFeatured snippet from the web\r\nElectronics. Headquartered in San Diego, Sony Electronics is a leading provider of audio/video electronics and information technology products for the consumer and professional markets. Operations include research and development, engineering, sales, marketing, distribution, and customer service.', '14567355.jpg', '2020-08-21 09:48:39', '2020-08-21 09:48:39'),
(5, 'Walton', 'Walton is the latest multinational electrical, electronics, automobiles and other appliances brand with one of the largest well equipped R & D facilities in the world ...Walton is the latest multinational electrical, electronics, automobiles and other appliances brand with one of the largest well equipped R & D facilities in the world ...\r\nWalton is the latest multinational electrical, electronics, automobiles and other appliances brand with one of the largest well equipped R & D facilities in the world ...Walton is the latest multinational electrical, electronics, automobiles and other appliances brand with one of the largest well equipped R & D facilities in the world ...\r\nWalton is the latest multinational electrical, electronics, automobiles and other appliances brand with one of the largest well equipped R & D facilities in the world ...', '18328690.jpg', '2020-08-22 10:27:34', '2020-08-22 10:27:34'),
(6, 'BMW', 'Search Results\r\nFeatured snippet from the web\r\nBayerische Motoren Werke AG, commonly known as Bavarian Motor Works, BMW or BMW AG, is a German automobile, motorcycle and engine manufacturing company founded in 1916. BMW is headquartered in Munich, Bavaria. It also owns and produces Mini cars, and is the parent company of Rolls-Royce Motor Cars.\r\nSearch Results\r\nFeatured snippet from the web\r\nBayerische Motoren Werke AG, commonly known as Bavarian Motor Works, BMW or BMW AG, is a German automobile, motorcycle and engine manufacturing company founded in 1916. BMW is headquartered in Munich, Bavaria. It also owns and produces Mini cars, and is the parent company of Rolls-Royce Motor Cars.\r\nSearch Results\r\nFeatured snippet from the web\r\nBayerische Motoren Werke AG, commonly known as Bavarian Motor Works, BMW or BMW AG, is a German automobile, motorcycle and engine manufacturing company founded in 1916. BMW is headquartered in Munich, Bavaria. It also owns and produces Mini cars, and is the parent company of Rolls-Royce Motor Cars.', '13051768.jpeg', '2020-08-22 10:28:05', '2020-08-22 10:28:05'),
(7, 'BD Food', 'BD Food is the GOOD GOOD', '20954376.jpg', '2020-08-22 20:47:47', '2020-08-22 20:47:47'),
(8, 'Pigeon', 'Baby product logos are often clean and bright. They often show a baby silhouette / figure (like those of Mothercare) or simple texts with hearts (like the Pigeon logo). These baby product logo designs often depicts TLC - tender, loving and care. And this should be your priority too when you create the branding that you\'ll need for your baby product company.', '89772760.png', '2020-08-23 10:07:57', '2020-08-23 10:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(24, 42, 14, NULL, '127.0.0.1', 1, '2020-09-27 00:35:50', '2020-09-27 00:35:50'),
(25, 41, 14, NULL, '127.0.0.1', 1, '2020-09-27 00:35:55', '2020-09-27 00:35:55'),
(26, 38, 14, NULL, '127.0.0.1', 3, '2020-09-27 00:36:08', '2020-09-27 00:36:15'),
(27, 42, NULL, NULL, '::1', 1, '2020-09-27 02:08:26', '2020-09-27 02:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(18, 'Televation', 'Technology is the set of knowledge, skills, experience and techniques through which humans change, transform and use our environment in order to create tools, machines, products and services that meet our needs and desires. Etymologically the word comes from the Greek tekne (technical, art, skill) and logos (knowledge)', '126503.jpg', NULL, '2020-08-18 21:32:44', '2020-08-18 21:39:23'),
(19, 'Moto Bick', 'A motorcycle, often called a motorbike, bike, or cycle, is a two- or three-wheeled motor vehicle. Motorcycle design varies greatly to suit a range of different purposes: long-distance travel, commuting, cruising, sport including racing, and off-road riding.', '248338.jpg', NULL, '2020-08-18 21:34:36', '2020-08-18 21:34:36'),
(20, 'KTM Bike', 'KTM Bike Price in Bangladesh. Below we have mentioned All the KTM bike or motorcycle latest price in BD, quick specifications and recent images, which KTM\'s ...', '190072.jpg', 19, '2020-08-18 21:36:12', '2020-08-18 21:36:12'),
(21, 'kawasaki bike', 'Below we have mentioned All the Kawasaki bike or motorcycle latest price in BD, quick specifications and recent images, which Kawasaki\'s motorcycle models ...', '636301.png', 19, '2020-08-18 21:37:47', '2020-08-18 21:37:47'),
(22, 'WALTON LED TV', 'WALTON LED TV gives you crystal clear pictures with dynamic, vibrant and life-like saturation to make pictures more realistic & comfortable to watch.', '213266.jpg', 18, '2020-08-18 21:39:01', '2020-08-18 21:39:01'),
(23, 'Food', 'Food, substance consisting essentially of protein, carbohydrate, fat, and other nutrients used in the body of an organism to sustain growth and vital processes and to furnish energy. The absorption and utilization of food by the body is fundamental to nutrition and is facilitated by digestion.\r\nFood, substance consisting essentially of protein, carbohydrate, fat, and other nutrients used in the body of an organism to sustain growth and vital processes and to furnish energy. The absorption and utilization of food by the body is fundamental to nutrition and is facilitated by digestion.', '152258.jpeg', NULL, '2020-08-20 06:45:17', '2020-08-20 06:45:17'),
(24, 'Baby Care', 'What is a daycare or childcare worker? Daycare workers look after children before and after school or while parents are working. They help establish and enforce schedules or routines, assist with feeding and cleaning children, and encourage learning and\r\nWhat is a daycare or childcare worker? Daycare workers look after children before and after school or while parents are working. They help establish and enforce schedules or routines, assist with feeding and cleaning children, and encourage learning and\r\nWhat is a daycare or childcare worker? Daycare workers look after children before and after school or while parents are working. They help establish and enforce schedules or routines, assist with feeding and cleaning children, and encourage learning and', '641198.jpg', NULL, '2020-08-20 06:48:27', '2020-08-20 06:48:27'),
(25, 'Kitten Food', 'Kitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten Food\r\nKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten FoodKitten Food', '189984.jpg', 24, '2020-08-20 10:46:10', '2020-08-20 10:46:10'),
(26, 'Diapers & Wipes', 'Diapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & Wipes\r\nDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & Wipes\r\n\r\nDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & WipesDiapers & Wipes', '185641.jpg', 24, '2020-08-20 10:47:51', '2020-08-20 10:47:51'),
(27, 'Fruits & Vegetables', 'Fruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & Vegetables\r\n\r\nFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & VegetablesFruits & Vegetables', '650119.jpg', 23, '2020-08-20 10:49:36', '2020-08-20 10:49:36'),
(28, 'Beverages', 'BeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeverages BeveragesBeveragesBeverages BeveragesBeveragesBeverages\r\nBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeverages BeveragesBeveragesBeverages BeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeverages BeveragesBeveragesBeverages BeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeverages BeveragesBeveragesBeverages BeveragesBeveragesBeverages\r\n\r\nBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeverages BeveragesBeveragesBeverages BeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeverages BeveragesBeveragesBeverages BeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeveragesBeverages BeveragesBeveragesBeverages BeveragesBeveragesBeverages', '145699.jpg', 23, '2020-08-20 10:50:15', '2020-08-20 10:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'khulna sadar', 2, '2020-09-07 09:16:45', '2020-09-07 10:14:56'),
(2, 'Dhaka sadar', 1, '2020-09-07 23:09:41', '2020-09-07 23:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2020-09-05 02:01:39', '2020-09-05 07:49:02'),
(2, 'Khulna', 2, '2020-09-05 06:24:38', '2020-09-05 06:24:38'),
(4, 'Chittagong', 4, '2020-09-05 08:06:34', '2020-09-05 08:06:34'),
(5, 'Barishal', 3, '2020-09-05 09:09:21', '2020-09-05 09:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_25_164733_create_categories_table', 1),
(4, '2020_06_25_164947_create_brands_table', 1),
(5, '2020_06_25_165013_create_products_table', 1),
(7, '2020_06_26_022940_create_product_images_table', 1),
(8, '2014_10_12_000000_create_users_table', 2),
(11, '2020_08_26_155318_create_divisions_table', 3),
(12, '2020_08_26_160116_create_districts_table', 3),
(14, '2020_09_15_103805_create_cards_table', 4),
(15, '2020_09_16_144626_create_settings_table', 5),
(17, '2020_09_17_084515_create_payments_table', 6),
(18, '2020_09_15_103711_create_orders_table', 7),
(19, '2020_06_25_165034_create_admins_table', 8),
(20, '2020_09_23_140551_create_sliders_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `transiction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` int(11) NOT NULL DEFAULT 60,
  `custom_discount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `phone_no`, `shipping_address`, `email`, `message`, `is_paid`, `is_completed`, `is_seen_by_admin`, `transiction_id`, `shipping_cost`, `custom_discount`, `created_at`, `updated_at`) VALUES
(2, 14, 4, '127.0.0.1', 'Nurzzaman Himel', '01622819929', 'Dhaka street, Dhaka1 1209', 'nuruzzaman.himel147@gmail.com', 'dfdf', 1, 1, 1, NULL, 60, 0, '2020-09-17 23:22:50', '2020-09-23 07:21:34'),
(3, 14, 4, '127.0.0.1', 'Nurzzaman Himel', '01622819929', 'Dhaka street, Dhaka1 1209', 'nuruzzaman.himel147@gmail.com', NULL, 0, 0, 1, NULL, 60, 20, '2020-09-20 08:42:50', '2020-09-26 10:11:16'),
(4, 14, 4, '127.0.0.1', 'Nurzzaman Himel', '01622819929', 'Dhaka street, Dhaka1 1209', 'nuruzzaman.himel147@gmail.com', NULL, 0, 0, 1, NULL, 70, 10, '2020-09-22 08:35:37', '2020-09-26 00:14:54'),
(5, 14, 6, '127.0.0.1', 'Nurzzaman Himel', '01622819929', 'Dhaka street, Dhaka1 1209', 'nuruzzaman.himel147@gmail.com', NULL, 0, 0, 1, 'dfdfdf', 60, 0, '2020-09-22 08:36:47', '2020-09-25 10:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nuruzzaman.himel147@gmail.com', '$2y$10$vznN56H9oFL243INsnoZPuMds7d1c7yefYkXf69Lzdp7VSPCa1tZW', '2020-09-21 02:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No..',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Agent | Personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(4, 'Cash In', 'cash_in.jpg', '1', 'cash_id', '01622819929', NULL, '2020-09-17 10:13:58', '2020-09-17 10:13:58'),
(5, 'Bikash Mobile Bnaking', 'bikash.jpg', '2', 'bikash', '01622819929', 'Personal', '2020-09-17 10:13:58', '2020-09-17 10:13:58'),
(6, 'Datch Bangla Mobile Banking', 'bbbl-jpg', '3', 'dbbl', '016228199295', 'Personal', '2020-09-17 10:13:58', '2020-09-17 10:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending|1=active',
  `offer_price` int(11) DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `admin_id`, `created_at`, `updated_at`) VALUES
(34, 1, 1, 'samsma galaxy 12', 'samsma galaxy 12samsma galaxy 12samsma galaxy 12samsma galaxy 12', 'samsma-galaxy-12', 22, 333, 0, NULL, 1, '2020-08-05 09:31:38', '2020-08-05 09:31:38'),
(36, 18, 5, 'Televation', 'elegram television (also known as a TV) is a machine with a screen. Televisions receive broadcasting signals and change them into pictures and sound. The word \"television\" comes from the words tele (Greek for far away) and vision (sight). ... A TV can show pictures from many television networks.', 'televation', 12, 1000, 0, NULL, 1, '2020-08-19 02:24:44', '2020-09-16 05:43:46'),
(37, 25, 7, 'Babby Food title', 'Babby Food title 1\r\nBabby Food title2 \r\nBabby Food title 3', 'babby-food-title', 10, 500, 0, NULL, 1, '2020-08-22 20:50:55', '2020-08-22 20:50:55'),
(38, 23, 7, 'Mixed Food', 'Industrial food mixing usually refers to the process of combining two or more separate components to produce a certain level of homogeneity. Mixing is often an interchangeable term with blending.\r\nIndustrial food mixing usually refers to the process of combining two or more separate components to produce a certain level of homogeneity. Mixing is often an interchangeable term with blending.\r\nIndustrial food mixing usually refers to the process of combining two or more separate components to produce a certain level of homogeneity. Mixing is often an interchangeable term with blending.', 'mixed-food', 10, 100, 0, NULL, 1, '2020-08-23 05:02:28', '2020-08-23 05:02:28'),
(39, 24, 7, 'Baby Care Tile 1', 'Product description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Play Mat creates a safe, comfortable ..\r\nProduct description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Play Mat creates a safe, comfortable ..', 'baby-care-tile-1', 1, 23, 0, NULL, 1, '2020-08-23 08:21:36', '2020-08-23 08:21:36'),
(40, 26, 7, 'Dipar', 'Diaper Company. Safe Trading B2B. China’s B2B Impact Award. Leading B2B Portal. Quality China Products. SGS Audited', 'dipar', 61, 20, 0, NULL, 1, '2020-08-23 08:23:22', '2020-09-16 05:43:08'),
(41, 24, 8, 'Baby Care Tile 2', 'Product description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Play Mat creates a safe, comfortable .. Product description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Play Mat crea\r\nProduct description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Play Mat creates a safe, comfortable .. Product description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Play Mat crea', 'baby-care-tile-2', 1, 300, 0, NULL, 1, '2020-08-23 10:08:37', '2020-09-16 05:42:58'),
(42, 24, 8, 'Baby Care Tile 3', 'Product description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Pl\r\n\r\nProduct description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Pl\r\n\r\nProduct description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Pl', 'baby-care-tile-3', 23, 10, 0, NULL, 1, '2020-08-23 10:10:03', '2020-09-16 05:42:45'),
(43, 24, 8, 'Baby Care Tile 4', 'BlissBaby Deluxe Play Mat creates a safe, comfortable .. Product description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Play Mat creates a safe, co\r\nBlissBaby Deluxe Play Mat creates a safe, comfortable .. Product description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Play Mat creates a safe, co\r\nBlissBaby Deluxe Play Mat creates a safe, comfortable .. Product description. Color:Black/White. A super-soft, stylish and durable play mat for the modern nursery! MyBlissBaby Deluxe Play Mat creates a safe, co', 'baby-care-tile-4', 55, 100, 0, NULL, 1, '2020-08-23 10:10:31', '2020-09-16 05:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(29, 36, 'd5aa7a.jpg', '2020-08-19 02:24:44', '2020-08-19 02:24:44'),
(30, 36, 'ed9611.jpg', '2020-08-19 02:24:44', '2020-08-19 02:24:44'),
(35, 34, '151825.jpg', '2020-08-20 00:40:56', '2020-08-20 00:40:56'),
(36, 34, '197891.jpg', '2020-08-20 00:40:56', '2020-08-20 00:40:56'),
(37, 34, '657682.jpg', '2020-08-20 00:40:56', '2020-08-20 00:40:56'),
(38, 37, '398687.jpg', '2020-08-22 20:50:55', '2020-08-22 20:50:55'),
(39, 38, 'ddc7e9.jpg', '2020-08-23 05:02:29', '2020-08-23 05:02:29'),
(40, 39, 'f3c21c.jpg', '2020-08-23 08:21:36', '2020-08-23 08:21:36'),
(41, 40, 'a2f112.jpg', '2020-08-23 08:23:22', '2020-08-23 08:23:22'),
(42, 41, '47a3d2.jpg', '2020-08-23 10:08:37', '2020-08-23 10:08:37'),
(43, 42, '706438.jpg', '2020-08-23 10:10:03', '2020-08-23 10:10:03'),
(44, 43, 'd8cc9d.jpg', '2020-08-23 10:10:31', '2020-08-23 10:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cast` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `shipping_cast`, `created_at`, `updated_at`) VALUES
(1, 'nuruzzaman.himel147@gmail.com', '01622819929', 'satkhira,khulna,bangladesh', 100, '2020-09-16 14:53:21', '2020-09-16 14:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(2, 'this is a tile one', '683777.jpg', 'button text', 'https://www.w3schools.com/tags/att_form_enctype.asp', 1, '2020-09-24 08:58:13', '2020-09-25 03:51:52'),
(3, 'this is title two', '439473.jpg', 'btn', 'https://getbootstrap.com/docs/4.4/content/typography/#responsive-font-sizes', 2, '2020-09-24 11:31:57', '2020-09-24 11:31:57'),
(5, 'this is a tile three', '692536.jpg', NULL, NULL, 4, '2020-09-25 03:52:47', '2020-09-25 04:18:55'),
(6, 'title number foru', '197471.jpg', 'button four', 'https://getbootstrap.com/docs/4.4/components/carousel/', 5, '2020-09-25 05:17:19', '2020-09-25 05:17:39'),
(7, 'title number is three', '211441.jpg', 'button three', NULL, 3, '2020-09-25 05:19:41', '2020-09-25 05:19:41'),
(8, 'title number is six', '145419.jpg', 'btn text', 'https://www.youtube.com/watch?reload=9&v=STKsKcfbLdM&list=PLbC4KRSNcMno05h8YwCyUPxyBp-BUoCAh&index=4', 6, '2020-09-25 05:20:24', '2020-09-25 05:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL COMMENT 'Division Id from Division table',
  `district_id` int(10) UNSIGNED NOT NULL COMMENT 'District Id from Districe Table',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=inactive!1=active|2=ban',
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `phone_no`, `email`, `password`, `street_address`, `division_id`, `district_id`, `status`, `ip_address`, `avator`, `shipping_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'Nurzzaman', 'Himel', 'nuurzzaman-himel', '01622819929', 'nuruzzaman.himel147@gmail.com', '$2y$10$6Kmm2OuSxuIbnNvbtVPKdetsWvmi8ZZkYBjUcSvicZaioXSYf7YYO', 'Dhaka Street', 1, 2, 1, '127.0.0.1', NULL, 'Dhaka street, Dhaka1 1209', 'chYWwJLZ6clb126Dg8RmroddUqHKm9JQ3AZFYLeExE3mxVDy9OgVG3ULQZ5f', '2020-09-13 01:30:20', '2020-09-15 00:59:25'),
(15, 'aaa', 'bbb', 'aaa-bbb', '5116161', 'n.himel143@gmail.com', '$2y$10$bhyAdJh4kq8Jz6fJCOE5duxtqIIwTyXuvQ5m9hIS5thl6LVo1zaai', 'dfdfdf', 2, 1, 1, '127.0.0.1', NULL, NULL, NULL, '2020-09-13 01:33:29', '2020-09-14 01:02:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cards_user_id_foreign` (`user_id`),
  ADD KEY `cards_product_id_foreign` (`product_id`),
  ADD KEY `cards_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

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
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cards_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

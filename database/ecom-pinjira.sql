-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2019 at 07:38 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom-pinjira`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `mother_category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `mother_category_id`, `name`, `active`, `note`, `created_at`, `updated_at`) VALUES
(6, 4, 'Smart Phone', 1, NULL, NULL, NULL),
(7, 4, 'Feature Phones', 1, NULL, NULL, NULL),
(8, 4, 'Mobile Accessories', 1, NULL, NULL, NULL),
(9, 2, 'Laptops', 1, NULL, NULL, NULL),
(10, 1, 'Televisions', 1, NULL, NULL, NULL),
(11, 1, 'Camera\'s', 1, NULL, NULL, NULL),
(12, 1, 'Audio & Sound System', 1, NULL, NULL, NULL),
(13, 1, 'Home Applince', 1, NULL, NULL, NULL),
(14, 1, 'Security Systems', 1, NULL, NULL, NULL),
(15, 1, 'Kitchen Applience', 1, NULL, NULL, NULL),
(16, 2, 'Accessories', 1, NULL, NULL, NULL),
(17, 2, 'Gaming', 1, NULL, NULL, NULL),
(18, 5, 'Hair Style', 1, NULL, NULL, NULL),
(19, 5, 'Trimmer', 1, NULL, NULL, NULL),
(20, 5, 'Watch', 1, NULL, NULL, NULL),
(21, 5, 'Shirt', 1, NULL, NULL, NULL),
(22, 2, 'Desktops', 1, NULL, NULL, NULL),
(23, 6, 'Hair', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` double DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `name`, `size`, `type`, `created_at`, `updated_at`) VALUES
(1, 3, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:03:59', '2019-02-13 01:03:59'),
(2, 22, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:03:59', '2019-02-13 01:03:59'),
(3, 2, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:03:59', '2019-02-13 01:03:59'),
(5, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:03:59', '2019-02-13 01:03:59'),
(6, 5, 'product-4.jpg', NULL, NULL, '2019-02-13 01:03:59', '2019-02-13 01:03:59'),
(7, 6, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(8, 3, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(9, 30, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(10, 22, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(11, 20, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(12, 10, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(13, 5, 'product-4.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(14, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(15, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(16, 27, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(17, 17, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(18, 14, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(19, 5, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(20, 5, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(22, 8, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(23, 11, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(24, 1, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(25, 5, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(26, 1, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(27, 11, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(29, 14, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(30, 24, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:00', '2019-02-13 01:04:00'),
(31, 6, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(32, 20, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(33, 11, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(34, 11, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(35, 26, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(36, 5, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(37, 10, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(38, 13, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(40, 9, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(41, 15, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(42, 19, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(43, 25, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(44, 23, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(45, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(46, 19, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(48, 19, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(49, 28, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:01', '2019-02-13 01:04:01'),
(50, 27, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(52, 13, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(53, 5, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(55, 19, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(56, 15, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(57, 23, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(58, 10, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(59, 29, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(60, 23, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(61, 6, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(62, 1, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(63, 30, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(64, 16, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(65, 9, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(66, 5, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(67, 2, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(68, 5, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(69, 3, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(70, 16, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(71, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(72, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(73, 1, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(74, 28, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(75, 21, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(76, 15, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(77, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:02', '2019-02-13 01:04:02'),
(78, 20, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(79, 15, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(80, 13, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(81, 20, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(82, 1, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(83, 8, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(84, 14, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(85, 19, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(86, 13, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(87, 16, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(88, 26, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(89, 22, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(90, 22, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(91, 25, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(92, 14, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(93, 17, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(94, 27, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(95, 5, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(96, 14, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(97, 21, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(98, 16, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(99, 11, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(100, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-02-13 01:04:03', '2019-02-13 01:04:03'),
(101, 11, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(102, 2, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(103, 20, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(104, 19, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(105, 30, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(106, 13, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(107, 30, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(108, 29, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(109, 13, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(110, 23, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(111, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(112, 17, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(113, 26, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(114, 17, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(115, 5, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(116, 8, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(117, 14, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(118, 14, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(119, 30, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(120, 31, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:12', '2019-03-09 22:44:12'),
(121, 32, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:13', '2019-03-09 22:44:13'),
(122, 33, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:13', '2019-03-09 22:44:13'),
(123, 34, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:13', '2019-03-09 22:44:13'),
(124, 35, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:13', '2019-03-09 22:44:13'),
(125, 36, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:13', '2019-03-09 22:44:13'),
(126, 37, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:13', '2019-03-09 22:44:13'),
(127, 38, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:13', '2019-03-09 22:44:13'),
(128, 39, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:13', '2019-03-09 22:44:13'),
(129, 40, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:13', '2019-03-09 22:44:13'),
(130, 40, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:44:13', '2019-03-09 22:44:13'),
(131, 25, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(132, 6, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(133, 15, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(135, 17, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(136, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(137, 18, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(138, 26, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(139, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(140, 10, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(141, 25, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(142, 17, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(143, 3, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(144, 25, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(145, 10, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(146, 23, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(147, 11, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(148, 4, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(149, 19, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:39', '2019-03-09 22:50:39'),
(151, 8, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:40', '2019-03-09 22:50:40'),
(152, 21, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:40', '2019-03-09 22:50:40'),
(153, 25, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:40', '2019-03-09 22:50:40'),
(154, 29, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:40', '2019-03-09 22:50:40'),
(155, 30, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:40', '2019-03-09 22:50:40'),
(156, 30, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:40', '2019-03-09 22:50:40'),
(157, 24, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:40', '2019-03-09 22:50:40'),
(158, 19, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:40', '2019-03-09 22:50:40'),
(159, 17, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:40', '2019-03-09 22:50:40'),
(160, 29, 'asdf12asdf.jpg', NULL, NULL, '2019-03-09 22:50:40', '2019-03-09 22:50:40'),
(161, 39, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:39', '2019-03-26 02:40:39'),
(162, 36, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:39', '2019-03-26 02:40:39'),
(163, 32, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:39', '2019-03-26 02:40:39'),
(164, 35, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:39', '2019-03-26 02:40:39'),
(165, 32, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:39', '2019-03-26 02:40:39'),
(166, 39, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:39', '2019-03-26 02:40:39'),
(167, 37, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:39', '2019-03-26 02:40:39'),
(168, 34, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:39', '2019-03-26 02:40:39'),
(169, 31, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:39', '2019-03-26 02:40:39'),
(170, 38, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(171, 34, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(172, 38, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(173, 37, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(174, 31, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(175, 39, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(176, 39, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(177, 39, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(178, 35, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(179, 34, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(180, 37, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(181, 38, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(182, 34, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(183, 37, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(184, 36, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(185, 39, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(186, 38, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(187, 37, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(188, 38, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(189, 41, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(190, 40, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(191, 33, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(192, 37, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(193, 31, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(194, 33, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(195, 40, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(196, 37, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(197, 39, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:40', '2019-03-26 02:40:40'),
(198, 33, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(199, 31, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(200, 39, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(201, 40, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(202, 39, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(203, 35, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(204, 36, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(205, 35, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(206, 39, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(207, 40, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(208, 34, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(209, 31, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(210, 38, 'product-4.jpg', NULL, NULL, '2019-03-26 02:40:41', '2019-03-26 02:40:41'),
(211, 213, 'CeGEfEUOv5VIpDv9EN3v.jpg', 16.82, 'jpg', '2019-03-27 04:12:32', '2019-03-27 04:12:32'),
(213, 213, 'GMXNglQiDglIhqNEOslu.jpg', 16.35, 'jpg', '2019-03-27 04:12:32', '2019-03-27 04:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `independent_coupons`
--

CREATE TABLE `independent_coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL,
  `max_uses` int(10) UNSIGNED NOT NULL,
  `max_uses_user` int(10) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `independent_coupons`
--

INSERT INTO `independent_coupons` (`id`, `coupon_code`, `discount`, `max_uses`, `max_uses_user`, `start_date`, `end_date`, `active`, `created_at`, `updated_at`) VALUES
(1, 'ICK2BO1', 10.00, 10, 1, '2019-03-06 12:00:33', '2019-03-05 00:00:00', 1, '2019-03-05 04:41:54', '2019-03-05 04:41:54'),
(2, 'ICM6M22', 10.00, 33, 1, '2019-03-06 12:00:33', '2019-03-22 04:44:52', 1, '2019-03-05 05:03:44', '2019-03-05 06:01:33'),
(3, 'ICHE2IG', 5.00, 2, 2, '2019-03-27 02:02:39', '2019-03-30 02:02:48', 0, '2019-03-27 02:02:53', '2019-03-27 02:26:06'),
(4, 'IC6XL65', 5.00, 1, 1, '2019-03-27 04:54:02', '2019-03-30 04:54:05', 1, '2019-03-27 04:54:09', '2019-03-27 04:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(10) UNSIGNED NOT NULL,
  `mother_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `mother_category_id`, `category_id`, `sub_category_id`, `name`, `active`, `note`, `created_at`, `updated_at`) VALUES
(5, 4, 6, 15, 'iPhone Inc.', 1, NULL, NULL, NULL),
(6, 4, 6, 16, 'Nokia Inc.', 1, NULL, NULL, NULL),
(7, 2, 9, 21, 'Dell Inc.', 1, NULL, NULL, NULL),
(8, 2, 9, 22, 'Hewlett-Packard Company Ltd.', 1, NULL, NULL, NULL),
(9, 6, 23, 49, 'Dell Inc.', 1, NULL, NULL, NULL);

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
(3, '2019_02_04_092922_create_mother_categories_table', 1),
(4, '2019_02_04_093456_create_categories_table', 1),
(5, '2019_02_04_094320_create_sub_categories_table', 1),
(6, '2019_02_04_094550_create_manufactures_table', 1),
(7, '2019_02_04_101131_create_products_table', 1),
(15, '2019_02_05_065728_create_images_table', 2),
(16, '2019_02_11_041923_create_product_sizes_table', 3),
(17, '2019_02_11_041946_create_product_colors_table', 3),
(18, '2014_10_12_000000_create_users_table', 4),
(19, '2019_03_03_072407_create_shipping_methods_table', 5),
(21, '2019_03_05_083609_create_independent_coupons_table', 6),
(23, '2019_02_04_121108_create_order_details_table', 7),
(25, '2019_02_04_120110_create_orders_table', 8),
(27, '2019_03_11_054104_create_order_statuses_table', 9),
(31, '2019_03_14_061109_create_user_coupons_table', 10),
(33, '2019_03_14_061722_create_coupon_users_table', 11),
(34, '2019_03_19_115715_add_hot_to_products', 12),
(35, '2019_03_24_115011_create_banners_table', 13),
(36, '2019_03_25_101350_create_settings_table', 14),
(37, '2019_03_27_114253_create_single_ads_table', 15),
(38, '2019_03_28_050404_add_columns_to_users', 16);

-- --------------------------------------------------------

--
-- Table structure for table `mother_categories`
--

CREATE TABLE `mother_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mother_categories`
--

INSERT INTO `mother_categories` (`id`, `name`, `active`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 1, NULL, NULL, NULL),
(2, 'Computer', 1, NULL, NULL, NULL),
(4, 'Mobile', 1, NULL, NULL, NULL),
(5, 'Man', 1, NULL, NULL, NULL),
(6, 'Life Style', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_statuses_id` int(11) DEFAULT NULL,
  `shipping_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `altr_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_after_coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_after_shipping` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_tracking_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_statuses_id`, `shipping_address`, `altr_number`, `shipping_method`, `payment_method`, `coupon_code`, `total`, `total_after_coupon`, `total_after_shipping`, `note`, `order_tracking_number`, `created_at`, `updated_at`) VALUES
(12, 3, NULL, 'Bosila, Dhaka, Bangladesh', NULL, '2', 'COD', 'ICM6M22', '900', '810', '870', NULL, 'OTNqZjWPF', '2019-03-19 04:02:29', '2019-03-19 04:02:29'),
(13, 3, NULL, 'Bosila, Dhaka, Bangladesh', NULL, '2', 'COD', 'ICM6M22', '900', '810', '870', NULL, 'OTNWEYEUb', '2019-03-19 04:04:35', '2019-03-19 04:04:35'),
(14, 7, 6, 'Dhaka', NULL, '2', 'COD', NULL, '1058.7', '1058.7', '1118.7', NULL, 'OTNavBZxD', '2019-03-19 05:22:21', '2019-03-24 02:02:20'),
(15, 3, 5, 'Bosila, Dhaka, Bangladesh', NULL, '2', 'COD', 'ICHE2IG', '33288.95', '31625', '31685', NULL, 'OTNB1RiWL', '2019-03-27 02:05:22', '2019-03-27 02:07:38'),
(16, 4, NULL, 'Dhaka', NULL, '2', 'COD', 'IC6XL65', '450', '427', '487', NULL, 'OTNalzoIy', '2019-03-27 06:48:02', '2019-03-27 06:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `total_after_discount` double(8,2) NOT NULL,
  `total_after_vat` double(8,2) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `total_after_discount`, `total_after_vat`, `size`, `color`, `note`, `created_at`, `updated_at`) VALUES
(28, 12, 1, 2.00, 1000.00, 450.00, '', '', NULL, '2019-03-19 04:02:29', '2019-03-19 04:02:29'),
(29, 13, 1, 2.00, 1000.00, 900.00, '', '', NULL, '2019-03-19 04:04:35', '2019-03-19 04:04:35'),
(30, 14, 6, 1.00, 186.00, 176.70, '', '', NULL, '2019-03-19 05:22:21', '2019-03-19 05:22:21'),
(31, 14, 33, 1.00, 980.00, 882.00, '', '', NULL, '2019-03-19 05:22:21', '2019-03-19 05:22:21'),
(32, 15, 2, 1.00, 34943.00, 33195.85, '', '', NULL, '2019-03-27 02:05:22', '2019-03-27 02:05:22'),
(33, 15, 5, 1.00, 98.00, 93.10, 'small', 'red', NULL, '2019-03-27 02:05:22', '2019-03-27 02:05:22'),
(34, 16, 1, 1.00, 500.00, 450.00, 'l', 'red', NULL, '2019-03-27 06:48:02', '2019-03-27 06:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `color`, `note`, `created_at`, `updated_at`) VALUES
(3, 'Returned', '#ff6060', NULL, '2019-03-11 04:03:47', '2019-03-11 04:03:47'),
(4, 'Processing', '#ffe703', NULL, '2019-03-11 04:47:35', '2019-03-11 04:47:35'),
(5, 'Shipment Ongoing', '#51e2ff', NULL, '2019-03-12 04:19:29', '2019-03-12 04:19:29'),
(6, 'Delivered', '#00c977', NULL, '2019-03-19 06:32:39', '2019-03-19 06:32:39');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_category_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED NOT NULL,
  `manufactures_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_unit` double(8,2) NOT NULL,
  `purchase_price` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT '0.00',
  `vat` double(8,2) DEFAULT '0.00',
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `specification` longtext COLLATE utf8mb4_unicode_ci,
  `warranty` longtext COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hot` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `mother_category_id`, `category_id`, `sub_category_id`, `manufactures_id`, `quantity`, `price_per_unit`, `purchase_price`, `discount`, `vat`, `availability`, `details`, `specification`, `warranty`, `active`, `note`, `created_at`, `updated_at`, `hot`) VALUES
(1, 'qui qqq', 1, 10, 23, NULL, 9, 500.00, 21843.00, 0.00, 10.00, 1, 'Et praesentium qui saepe modi deserunt suscipit. Hic est voluptas quo molestiae optio veritatis voluptates. Est qui cum laudantium qui repellat non. Consequuntur sit nobis illum expedita dolor.', 'Alias tempore quia blanditiis sapiente et et praesentium. Excepturi nulla tempora et optio.', 'Veniam quisquam et et ea voluptas sed voluptas.', 1, 'Placeat.', '2009-09-14 05:24:47', '2019-03-27 03:42:41', 0),
(2, 'nobis', 1, 12, 30, NULL, 10, 34943.00, 24943.00, 0.00, 5.00, 1, 'At ea ut veritatis dolor alias illum. Sed enim dicta itaque adipisci.', 'Sint esse eligendi rem et. Exercitationem quibusdam sit sed perspiciatis eveniet animi totam.', 'Nulla dolorem maxime et consectetur.', 1, 'Occaecati.', '1983-03-17 20:39:14', '2019-03-20 00:28:17', 0),
(3, 'unde', 1, 15, 24, NULL, 10, 43989.00, 33989.00, 0.00, 5.00, 1, 'Quo ex vel quo nam. Est facere architecto sed omnis suscipit doloremque.', 'Dolor est natus voluptatem in. Voluptas ut facere aut.', 'Quasi voluptatem qui aperiam amet numquam.', 1, 'Culpa.', '1979-06-07 00:19:40', '2019-03-20 00:30:08', 0),
(4, 'non', 1, 13, 23, NULL, 4, 29394.00, 19394.00, 0.00, 5.00, 1, 'Molestiae perferendis occaecati sunt eum rerum voluptas sit. Molestiae perferendis commodi placeat cumque est rerum architecto. Ut incidunt expedita qui. Et facilis autem corporis earum sit tenetur.', 'Et officia ea ut. Vero itaque cupiditate nisi. Ut quasi vel ut dolorum.', 'Enim voluptatum quia nisi reprehenderit est.', 1, 'Voluptas.', '1991-01-12 12:20:53', '2019-03-20 02:06:39', 0),
(5, 'exercitationem', 1, 14, 23, 5, 6, 100.00, 50.00, 2.00, 5.00, 1, 'Quisquam non distinctio repudiandae non et aut. Dicta rerum nam aspernatur earum qui. Corporis corporis molestias veniam natus ipsum qui. Repellat totam aliquid rerum voluptatibus.', '<div class=\"pro-details-list pt-20\">\r\n                                <ul>\r\n                                    <li><span>Ex Tax :</span>£60.24</li>\r\n                                    <li><span>Brands :</span><a href=\"#\">Canon</a></li>\r\n                                    <li><span>Product Code :</span>Digital</li>\r\n                                    <li><span>Reward Points :</span>200</li>\r\n                                    <li><span>Availability :</span>In Stock</li>\r\n                                </ul>\r\n                            </div>', 'Ad quaerat vel dolorem assumenda sit dolore.', 1, 'Soluta.', '2007-07-03 05:02:53', '2019-03-27 03:42:43', 0),
(6, 'iure', 1, 14, 23, NULL, 6, 200.00, 100.00, 7.00, 5.00, 1, 'Est vel dolorem officiis omnis dolorem officia nulla. Eius qui sunt velit est quibusdam. Odio et ad sequi dolorum aliquid reprehenderit exercitationem.', 'Autem aperiam non nihil adipisci. Autem qui voluptatum animi aliquam illo est.', 'Corporis quibusdam incidunt libero eaque.', 1, 'Velit.', '1977-01-09 07:12:35', '2019-03-20 02:12:42', 0),
(7, 'quisquam', 1, 11, 23, NULL, 8, 10874.00, 874.00, 0.00, 10.00, 1, 'Quam illum corrupti in ut et reprehenderit. Vero eligendi magni quisquam dolor cupiditate. Libero quos nihil qui deleniti nostrum.', 'Non hic et ipsum. Modi magnam vitae eos velit nesciunt sed doloribus.', 'Mollitia ipsum deleniti atque quo.', 1, 'Ut.', '2015-03-19 11:23:45', '2019-03-24 06:54:16', 0),
(8, 'consectetur', 1, 15, 26, NULL, 6, 35433.00, 25433.00, 2.00, 15.00, 1, 'Fuga quidem incidunt aperiam eos et. Et atque illo voluptatem ipsum amet sed iure. Mollitia in quaerat dolore qui.', 'Et ducimus totam impedit quia. Ut exercitationem neque eligendi.', 'Eveniet omnis magnam beatae odit.', 1, 'Qui porro.', '1983-09-27 10:29:53', '2019-03-20 02:14:04', 0),
(9, 'nisi', 1, 11, 23, NULL, 3, 15961.00, 5961.00, 5.00, 15.00, 1, 'Laudantium enim aliquam in omnis ut assumenda et. Qui impedit quam nesciunt omnis qui sunt eaque. Velit sunt non nam qui et et eaque magni.', 'Magni sunt sit impedit. A omnis nulla sit ab. Qui sint dicta sit a perferendis.', 'Voluptatem non saepe exercitationem omnis.', 1, 'Eligendi.', '2005-01-29 06:19:10', '2019-03-20 06:38:20', 0),
(10, 'hic', 1, 15, 23, NULL, 3, 38766.00, 28766.00, 10.00, 15.00, 1, 'Ea sequi vel animi sequi et. Delectus ullam amet est optio rerum qui. Voluptatem et in consequuntur dolorem repudiandae maxime perferendis. Est quos sint impedit molestias deserunt exercitationem.', 'In tempore harum placeat. Eos atque expedita libero nisi aperiam.', 'Consequuntur sed optio omnis ut id tenetur eum.', 1, 'Alias.', '1989-01-15 17:39:13', '2007-05-09 07:45:13', 0),
(11, 'id', 1, 12, 29, NULL, 7, 32472.00, 22472.00, 5.00, 5.00, 0, 'Nihil reiciendis sed repellendus. Ipsa impedit aut est omnis.', 'Nihil architecto aliquam amet deleniti exercitationem dignissimos. Itaque sunt pariatur molestias.', 'Quae fugit quis suscipit.', 1, 'Dolorem a.', '1985-03-05 08:44:32', '2011-12-25 04:18:47', 0),
(12, 'perspiciatis', 1, 11, 31, NULL, 7, 48153.00, 38153.00, 2.00, 10.00, 0, 'Omnis ullam sed voluptas debitis accusantium laborum. Dolores sint voluptatem enim ut. Rerum et est nihil culpa rerum nisi vero.', 'Corrupti omnis commodi earum et officia ut alias labore. Porro id quis perferendis cum.', 'At earum reiciendis et quaerat quod atque.', 1, 'Quia.', '2018-03-12 18:50:00', '2019-03-27 03:42:41', 1),
(13, 'aut', 1, 12, 30, NULL, 10, 10067.00, 67.00, 9.00, 5.00, 0, 'Laudantium labore nobis reprehenderit aut id. Dolorem perspiciatis iure officiis consequatur voluptatem reprehenderit. Asperiores sapiente nihil est distinctio magnam in corrupti.', 'Dolores quos aperiam vel. Repellat numquam ut unde ut praesentium qui.', 'Et vel dolores explicabo consequatur praesentium.', 1, 'Eos autem.', '1987-03-18 03:19:52', '2018-09-06 21:07:14', 0),
(14, 'cupiditate', 1, 15, 23, NULL, 10, 22740.00, 12740.00, 5.00, 15.00, 1, 'Id veniam iste voluptatibus qui ut assumenda rem. Id ea dolorem odio dolore. Beatae eos est voluptatem id sit.', 'Ratione est animi dolorem consequatur. Ipsum occaecati molestias ullam vel dolorum.', 'Sit dicta harum accusantium tempore qui.', 1, 'Et.', '1995-06-22 12:05:33', '1977-10-04 20:39:31', 0),
(15, 'qui', 1, 15, 23, NULL, 5, 47956.00, 37956.00, 7.00, 15.00, 1, 'Numquam tempora harum enim et aut repudiandae. Non id earum sunt dolore esse quia qui. Enim nam magnam rerum non vero.', 'Eos qui exercitationem in ut vel illo. A odio dolor sed voluptas velit.', 'Quibusdam reiciendis eum non et.', 1, 'Et qui.', '2004-02-14 11:19:57', '2019-03-24 06:54:37', 0),
(16, 'eum', 1, 12, 24, NULL, 5, 39333.00, 29333.00, 0.00, 15.00, 0, 'Et in dolores qui perferendis iste accusantium ullam quia. Natus natus itaque laboriosam quis nobis. Quibusdam sit similique ipsum eveniet occaecati ducimus.', 'Beatae maxime et ab quos ut consequatur est. Rerum autem voluptas quod voluptatem.', 'Esse rerum id eum.', 1, 'Non.', '1989-05-30 22:36:13', '1980-09-25 16:34:51', 0),
(17, 'adipisci', 1, 14, 23, NULL, 9, 48097.00, 38097.00, 2.00, 5.00, 1, 'Quia nihil autem mollitia dolor ad odio asperiores. Omnis nobis aspernatur nihil. At nam error perspiciatis amet maiores neque. Blanditiis optio doloremque tenetur dicta beatae.', 'Deleniti in suscipit sequi et earum. Eum et et ea accusantium minus aut.', 'Repudiandae impedit et iusto ut.', 1, 'Iste.', '2003-09-16 00:40:37', '2004-06-01 09:13:53', 0),
(18, 'cupiditate', 1, 15, 31, NULL, 6, 15558.00, 5558.00, 2.00, 15.00, 1, 'Eos placeat harum unde doloremque itaque ipsam omnis velit. Velit veniam odio ducimus et atque tempore omnis. Debitis dicta eos et et illum minima reprehenderit. Nihil quos aut rem ducimus eos iusto.', 'Odit magni facere perferendis. Perferendis placeat unde unde vero laborum voluptatibus repudiandae.', 'Eius fugiat quia vel dolor enim asperiores quis.', 1, 'Ipsam.', '1994-08-26 11:14:40', '1992-04-22 16:03:32', 0),
(19, 'sapiente', 1, 11, 23, NULL, 2, 45263.00, 35263.00, 3.00, 5.00, 1, 'Saepe officiis quod non omnis excepturi. Voluptate ut deserunt in. Vel fugit sunt aut hic deserunt explicabo eligendi. Non amet quas illo cum.', 'Quia voluptates dolorem vitae deserunt aut enim illo est. Quos quibusdam vel est et.', 'Quas eos ut aliquam vitae vel corporis.', 1, 'Earum eum.', '1995-01-02 21:24:21', '1986-12-13 20:45:52', 0),
(20, 'soluta', 1, 12, 23, NULL, 5, 38927.00, 28927.00, 9.00, 10.00, 0, 'Et ducimus eveniet veritatis velit. Aut dolore temporibus mollitia quis necessitatibus consectetur. Autem dignissimos blanditiis ad tempora est. Ullam exercitationem rerum est sit maxime.', 'Iusto vitae id quo corrupti. Ut voluptas quas minima aut enim quibusdam sit tempore.', 'Temporibus voluptas fugiat sunt a.', 1, 'Enim enim.', '1989-08-11 14:28:00', '2015-02-04 10:55:37', 0),
(21, 'ad', 4, 6, 23, NULL, 7, 48658.00, 38658.00, 3.00, 5.00, 1, 'Quo tenetur libero numquam qui aliquam assumenda tempore. Aliquid est numquam voluptatum et et et expedita sit. Animi iusto eos ea et aut porro. Minima vel ut praesentium dolorem odio dolorem.', 'Et qui quis aliquam aut voluptate. Laudantium reprehenderit qui et doloribus dolores ut et.', 'Minus rerum ab sint quia quam ut eos.', 1, 'Officia.', '2000-08-13 22:41:16', '2001-06-30 18:24:21', 0),
(22, 'reprehenderit', 4, 6, 23, NULL, 10, 37005.00, 27005.00, 0.00, 15.00, 0, 'Sed eum eveniet quia quasi quae ut enim. Natus ut iusto unde quod aut. Accusantium sit explicabo neque.', 'Nobis nesciunt aut velit. Labore dignissimos a repudiandae nulla occaecati.', 'Id quis facilis dignissimos.', 1, 'Quae sit.', '1999-12-01 10:26:12', '1979-05-29 11:40:14', 0),
(23, 'voluptatem', 4, 8, 19, NULL, 3, 38034.00, 28034.00, 8.00, 15.00, 1, 'Deleniti molestias qui reprehenderit vero. Dolorem porro ex eligendi recusandae autem necessitatibus. Possimus sapiente dolores error eligendi est. Aut quis nihil ut deserunt quo dolorem fugiat illo.', 'Non et ut dicta necessitatibus ratione repudiandae. Quia distinctio dicta delectus explicabo magni.', 'Possimus sapiente et ducimus nihil.', 1, 'Est.', '1971-01-02 07:35:51', '2011-02-08 19:47:22', 0),
(24, 'expedita', 4, 7, 19, NULL, 6, 33550.00, 23550.00, 0.00, 10.00, 0, 'Ea et distinctio cumque modi. Veniam quis consectetur vel voluptate. Nam et et hic inventore non sit adipisci.', 'A tenetur non est laboriosam et quibusdam. Dicta reiciendis fugiat possimus exercitationem.', 'Esse nesciunt adipisci et molestiae ut.', 1, 'Quibusdam.', '1980-11-19 21:07:34', '2016-09-01 14:12:29', 0),
(25, 'fugit', 4, 8, 20, NULL, 8, 41558.00, 31558.00, 7.00, 10.00, 0, 'Et exercitationem velit doloremque sint omnis. Hic nihil ut non et facilis maiores asperiores.', 'Non quia molestias quasi aut tempora quisquam modi. Et nobis sed veniam sint dolore explicabo quia.', 'Voluptatem facilis quae omnis voluptatibus.', 1, 'Sit.', '2012-09-05 01:24:41', '2019-03-24 06:54:17', 0),
(26, 'quod', 4, 7, 19, NULL, 3, 11546.00, 1546.00, 10.00, 15.00, 1, 'Ullam aliquam dolorum quia eos. Occaecati repellat qui quo error sequi saepe. Magni quo rem et unde. Similique maxime vitae nostrum excepturi voluptas ea. Libero atque rerum qui dicta temporibus.', 'Nulla ipsum quis ad reprehenderit vitae. Distinctio consectetur odio aperiam.', 'Et voluptates alias aut et.', 1, 'Quis id.', '1994-12-27 01:40:52', '1981-04-24 13:26:15', 0),
(27, 'dolores', 4, 6, 16, NULL, 2, 41724.00, 31724.00, 0.00, 5.00, 1, 'Voluptatem molestias qui quia ut veritatis aspernatur maiores beatae. Ut tempora voluptas blanditiis et. Natus nihil odio libero eos quis sed.', 'Incidunt consectetur adipisci perferendis. Velit laboriosam nihil est culpa maxime eos.', 'Quisquam est harum autem veritatis quis.', 1, 'Ut est.', '2016-03-01 18:25:05', '2019-03-27 02:22:13', 0),
(28, 'porro', 4, 6, 15, NULL, 2, 17365.00, 7365.00, 4.00, 15.00, 0, 'Rerum occaecati aut rerum nisi. Ex quia commodi qui suscipit explicabo est ut. Quos et animi natus unde eveniet soluta.', 'Quia nobis et nostrum voluptas molestiae. Nulla quod dolorum cupiditate sint eos.', 'Magni esse eum doloribus maxime aliquid.', 1, 'Cumque.', '2005-12-06 03:29:45', '2019-03-20 04:28:20', 0),
(29, 'consequatur', 4, 6, 18, NULL, 3, 48769.00, 38769.00, 1.00, 5.00, 1, 'Rerum autem aut non rerum mollitia assumenda nesciunt reiciendis. Aut cupiditate hic sit est. Tempora aliquid aliquid repudiandae voluptatem a.', 'Ut ea animi rerum sed totam. Et fugit quis aut libero. Eum repellat adipisci repudiandae.', 'Amet laboriosam dolore rerum fugit.', 1, 'In.', '1988-06-02 11:53:27', '2008-12-09 03:12:08', 0),
(30, 'aut', 4, 7, 17, NULL, 2, 15991.00, 5991.00, 10.00, 10.00, 0, 'Qui tenetur architecto culpa hic aliquam. Et quibusdam asperiores impedit. At nulla ut quo sed odit aut laboriosam. Dolores quam accusantium adipisci recusandae.', 'Voluptas eveniet delectus qui debitis. Qui placeat in aut eaque.', 'Quam ut praesentium accusamus omnis dolor.', 1, 'Et.', '1990-08-06 05:01:47', '1991-02-23 19:18:08', 0),
(31, 'fugiat', 2, 9, 21, NULL, 4, 1000.00, -9000.00, 4.00, 5.00, 1, 'Maxime est ut provident quia dicta. Quis aliquam id libero voluptas laudantium quaerat sint. Cum enim voluptas nostrum et accusamus. Ut natus officiis doloribus earum blanditiis natus veniam.', 'Eveniet labore atque mollitia voluptas ex ex eum. Labore facere laboriosam doloribus fuga.', 'Exercitationem explicabo aut mollitia.', 1, 'Illo vel.', '1979-07-20 00:58:17', '1996-04-03 17:25:08', 0),
(32, 'atque', 2, 9, 22, NULL, 4, 1000.00, -9000.00, 6.00, 5.00, 0, 'Deleniti dolorem et animi voluptas aut. Sapiente neque exercitationem corrupti neque tempore. Rerum quod nesciunt debitis eos ut.', 'Iusto itaque sit unde inventore facilis delectus. Fugit sit qui dolorem ut dolores fugiat.', 'Sed fugiat ipsam cupiditate eum quae ut.', 1, 'Magni.', '1994-03-23 12:02:41', '1990-06-25 19:46:34', 0),
(33, 'error', 2, 9, 22, NULL, 9, 1000.00, -9000.00, 2.00, 10.00, 0, 'Iure est officia laudantium id quia. Quod voluptate error ipsa odio ut qui. Quia dolor delectus suscipit repellendus rerum.', 'Nisi aut nemo distinctio id. In id cumque magni animi vel labore. Dolor qui soluta sed.', 'Dolorem aut et sit eveniet dolores.', 1, 'Non error.', '1996-03-21 03:44:31', '2011-08-13 11:49:35', 0),
(34, 'est', 2, 9, 21, NULL, 10, 1000.00, -9000.00, 6.00, 5.00, 1, 'Necessitatibus aliquid vel voluptates earum nihil ea. Magnam est enim ut et. Quia omnis recusandae temporibus id consequuntur.', 'Itaque hic impedit velit qui perferendis soluta. Delectus error qui molestiae alias.', 'Nam voluptatem numquam omnis nemo quia.', 1, 'Et autem.', '2002-04-19 21:26:10', '2010-06-04 17:08:09', 0),
(35, 'amet', 2, 9, 21, NULL, 6, 1000.00, -9000.00, 2.00, 5.00, 1, 'Qui quos nemo rerum nulla. Vel ut amet sit dignissimos porro nam. Qui iste reiciendis consectetur quidem minus.', 'A architecto sint maiores illum non. Laborum rem deserunt tenetur dicta deserunt magnam amet.', 'Ipsum iure vel vel maxime maxime.', 1, 'Molestias.', '1974-06-06 03:32:16', '2015-04-30 18:42:36', 0),
(36, 'maiores', 2, 9, 22, NULL, 7, 1000.00, -9000.00, 6.00, 10.00, 1, 'Ea atque sed voluptatibus et sed at debitis. Iste illum est id est. Ut dicta unde neque quis. Et voluptas aut vel omnis. Repellat esse vel exercitationem. Non magnam ea omnis qui.', 'Minus quam necessitatibus nesciunt aut placeat. Aut ipsam nihil placeat explicabo autem aut.', 'Molestiae ut eum animi saepe alias quia.', 1, 'Non.', '2002-06-25 15:09:09', '2003-05-13 15:23:46', 0),
(37, 'ratione', 2, 9, 22, NULL, 6, 1000.00, -9000.00, 10.00, 10.00, 1, 'Sequi totam dolorem quis ut aspernatur ea. Dolor ea voluptatem numquam ea quis. Exercitationem molestiae tempore voluptatem nisi neque. Eos quae aspernatur delectus eaque praesentium nisi aut.', 'Itaque cupiditate quia consequuntur quia. Quam atque amet ut. Nihil dolores occaecati autem.', 'Enim minima est consequatur culpa et.', 1, 'Occaecati.', '1972-02-20 13:13:18', '2019-03-24 06:54:46', 0),
(38, 'nisi', 2, 9, 22, NULL, 1, 1000.00, -9000.00, 6.00, 10.00, 0, 'Magnam dolorum id odit porro ut et. Quis voluptas quaerat qui est vel corrupti. Earum rerum cum nesciunt consequatur mollitia veniam.', 'Omnis quis dolor perferendis et facilis et vel sit. Quasi in rem omnis. Modi ut maxime ullam quis.', 'Consequatur non unde reiciendis.', 1, 'Tempore.', '1977-03-10 07:20:15', '1972-11-23 02:29:42', 0),
(39, 'et', 2, 9, 22, NULL, 6, 1000.00, -9000.00, 7.00, 5.00, 1, 'Omnis quam amet dolor qui. Quibusdam ut at recusandae omnis. Porro rerum dolorem dicta vitae velit ducimus. Est eveniet aut repellat possimus.', 'Est nisi delectus maiores est nisi est et a. Cumque sed voluptatum unde qui aut asperiores.', 'Repellat eum consequuntur debitis.', 1, 'Sint aut.', '1991-01-19 10:40:42', '2012-07-25 20:06:23', 0),
(40, 'atque', 2, 9, 22, NULL, 9, 1000.00, -9000.00, 9.00, 10.00, 0, 'Facilis facere sequi vero et. Voluptas ut voluptatem ut in et sed. Maxime voluptatibus ex qui ut ratione quisquam ducimus dolores. Voluptatum sint quia non impedit.', 'Eum suscipit tempore ut earum. Architecto repellendus et soluta occaecati vel est eveniet.', 'Eius aspernatur doloribus dolore asperiores.', 1, 'Qui et.', '2001-04-25 14:02:31', '1991-07-25 10:49:42', 0),
(41, 'voluptas', 2, 16, 36, NULL, 3, 428.00, 328.00, 0.00, 10.00, 0, 'Rem praesentium dolores ea sit dolor illum. Architecto laudantium odio pariatur. Culpa molestiae non illum et sunt voluptatum iure.', 'Vel rerum optio nemo odit. Veritatis hic natus voluptas. Alias et odit esse iure.', 'Eligendi autem eos ullam et eligendi a eveniet.', 1, 'Quos.', '2005-08-13 02:36:37', '1996-05-29 13:40:47', 0),
(42, 'aspernatur', 2, 16, 36, NULL, 3, 854.00, 754.00, 2.00, 5.00, 0, 'Debitis dolor eaque animi velit. Quasi sed sint dolorum voluptatem blanditiis velit. Minima voluptatem rerum aut non. Voluptate aut quidem laudantium sit.', 'In laudantium aspernatur et dicta. Earum qui libero est cupiditate. Et libero ea iste nemo.', 'Qui nihil modi quaerat ea natus voluptatibus et.', 1, 'Quos quis.', '1979-03-04 20:23:59', '1997-05-02 01:15:59', 0),
(43, 'qui', 2, 16, 33, NULL, 3, 593.00, 493.00, 5.00, 5.00, 0, 'Molestiae reprehenderit molestiae architecto eveniet cupiditate magni est. Ut eius consequatur ea. Omnis recusandae libero quibusdam qui veniam.', 'Doloremque doloremque cumque ipsam rem. Dolorem neque et est deserunt suscipit dolor iste.', 'Ut corrupti aut quasi.', 1, 'Facilis.', '2015-10-16 07:29:35', '1991-05-12 08:05:50', 0),
(44, 'nam', 2, 17, 33, NULL, 4, 685.00, 585.00, 2.00, 10.00, 0, 'Nihil voluptatem earum deleniti doloremque. Aliquam voluptas laborum maxime in nihil quo minima. Cumque eum eos repellendus.', 'Aspernatur dolorum dignissimos voluptatem modi. A autem sunt amet.', 'Alias consequatur enim et sit et.', 1, 'Sed.', '2000-07-05 15:04:16', '1981-08-27 13:54:34', 0),
(45, 'minus', 2, 16, 35, NULL, 5, 498.00, 398.00, 0.00, 5.00, 1, 'Dolore itaque ex quae consequatur magnam distinctio maiores. Incidunt optio deserunt ea. Maxime modi minus deserunt veniam maxime cumque.', 'Et dolore dolorem qui enim modi enim. Nostrum eum minus et. Odit corporis non fugiat magnam.', 'Eos aut sed ut et.', 1, 'Ea.', '1998-01-16 16:43:47', '2004-12-04 20:49:48', 0),
(46, 'qui', 2, 16, 37, NULL, 8, 446.00, 346.00, 5.00, 10.00, 0, 'Quod voluptatem sed reiciendis perferendis. Enim quis et ratione a placeat neque. Voluptate vero suscipit voluptatibus incidunt expedita.', 'Illo natus autem est possimus quod. Eius neque sapiente fuga. Animi atque non esse sunt.', 'Sequi dolor saepe perferendis qui.', 1, 'Placeat.', '2001-01-14 06:20:58', '1986-04-21 21:59:19', 0),
(47, 'cumque', 2, 17, 35, NULL, 7, 821.00, 721.00, 0.00, 5.00, 1, 'Asperiores architecto quos quia sint sunt. Consequatur sint quia ea iusto. Velit et omnis quaerat soluta ducimus ad.', 'Qui corporis sunt non molestiae blanditiis. Voluptatem rerum consequatur recusandae cupiditate.', 'Eveniet maxime labore iste et sit quam labore.', 1, 'Odit.', '1972-01-17 15:08:56', '2003-06-07 03:39:43', 0),
(48, 'quia', 2, 17, 38, NULL, 6, 523.00, 423.00, 5.00, 10.00, 0, 'Nulla similique quibusdam eum dicta aliquam suscipit dolore. Vitae sed provident vel ut. Facere deserunt rerum explicabo numquam facilis in amet neque.', 'Ut quae aut veritatis iure et vero. Non in nam corporis nisi qui tempore.', 'Veniam reiciendis aut molestias et.', 1, 'Ratione.', '2002-04-20 09:00:46', '2011-03-28 22:58:54', 0),
(49, 'aliquid', 2, 17, 37, NULL, 5, 902.00, 802.00, 5.00, 5.00, 1, 'Tempore enim nostrum non. Nihil recusandae animi est ipsam nisi harum. Qui ut consequatur laudantium omnis aperiam est. Voluptatem exercitationem nihil expedita quas.', 'Sequi quia laboriosam earum officiis. Velit cumque sunt accusamus id commodi.', 'Non quis facilis incidunt saepe.', 1, 'Eos et.', '2017-01-26 06:36:00', '2006-09-08 15:44:24', 0),
(50, 'aperiam', 2, 16, 34, NULL, 1, 223.00, 123.00, 0.00, 10.00, 0, 'Beatae et at ducimus omnis maxime. Blanditiis enim quas at quia consequatur aut et rem. Ipsum reiciendis necessitatibus dolor rerum non quos. Nihil ut quia quidem rerum animi maiores doloremque.', 'Nihil quasi aliquam impedit. Ipsa sunt et cupiditate aut doloribus veritatis in.', 'Delectus ratione vero non rerum quo assumenda id.', 1, 'Pariatur.', '1970-11-18 11:54:21', '1984-01-16 00:33:37', 0),
(51, 'fugiat', 2, 16, 33, NULL, 10, 561.00, 461.00, 1.00, 10.00, 1, 'Similique veritatis facere quisquam et vel tempore. Rerum doloribus corporis vel possimus. Earum cum unde voluptas laudantium expedita ut.', 'Officiis et aut modi odit qui. Facere voluptate quia eaque ut iure facilis.', 'Ipsa non sint alias dicta.', 1, 'Sed.', '1995-05-24 21:02:40', '1990-08-26 14:26:41', 0),
(52, 'soluta', 2, 17, 36, NULL, 8, 783.00, 683.00, 2.00, 5.00, 0, 'Delectus nihil distinctio et rerum rerum enim. Numquam ullam porro cupiditate nostrum dolores. Enim temporibus et laborum labore. Nisi nihil nihil illo consequatur.', 'Tenetur qui culpa eius est. Iure ut voluptates totam.', 'Dolorem nisi ad deserunt laboriosam.', 1, 'Non.', '2015-04-14 23:31:03', '1982-10-26 10:19:18', 0),
(53, 'illo', 2, 17, 33, NULL, 5, 795.00, 695.00, 4.00, 5.00, 0, 'Natus dolores quisquam voluptatum libero aliquid ut quae. Fugit quia quidem inventore sit. Quae optio similique maiores voluptatem dolor.', 'Nihil a qui quia molestias aut. Natus placeat voluptatem autem est vel odit. Et sunt ut aut autem.', 'Assumenda libero cupiditate ut perspiciatis.', 1, 'Animi.', '2009-03-20 16:11:48', '1985-05-11 13:10:26', 0),
(54, 'distinctio', 2, 16, 37, NULL, 4, 263.00, 163.00, 2.00, 10.00, 1, 'Libero qui est consequatur architecto quam nobis. Praesentium ducimus nam consequatur. Inventore natus dolores sed est consequatur itaque.', 'Sint eos consequuntur doloribus et. Et rerum vitae corrupti sapiente. Consequatur qui vel est.', 'Saepe dolor et sunt ut.', 1, 'Est ab.', '2014-10-03 00:23:17', '1992-06-19 02:14:16', 0),
(55, 'vero', 2, 17, 35, NULL, 4, 648.00, 548.00, 1.00, 10.00, 0, 'Voluptas sit iste ipsam adipisci. Illum voluptatem minima mollitia ducimus ut perferendis necessitatibus. Necessitatibus nihil iusto pariatur quos pariatur. Nesciunt nam illo numquam.', 'Incidunt sunt laudantium accusamus est eligendi. Qui dolorum beatae sit facilis iusto adipisci.', 'Cumque perferendis quia alias placeat.', 1, 'Maiores.', '2001-11-13 15:43:14', '2001-06-10 16:19:54', 0),
(56, 'perferendis', 2, 17, 35, NULL, 10, 863.00, 763.00, 1.00, 10.00, 0, 'Vitae voluptatem illo nihil rerum consequatur. Voluptas ad quibusdam veritatis sit. Quasi animi ut unde asperiores itaque.', 'Nisi sed nulla tempore provident. Rerum amet qui ipsum velit. Qui nesciunt perspiciatis quidem.', 'Beatae quas doloribus rem molestiae aut animi.', 1, 'Molestias.', '2010-04-07 14:52:12', '1979-02-10 02:35:00', 0),
(57, 'ipsa', 2, 16, 33, NULL, 4, 416.00, 316.00, 3.00, 10.00, 1, 'Atque fugiat unde enim est vero occaecati enim. Ut id quibusdam et blanditiis deserunt. Ut doloremque nam quis distinctio consectetur fuga. Ab esse debitis quibusdam sit.', 'Et voluptatem accusamus est non. Quae exercitationem tenetur dolorum et.', 'Sit placeat est in quibusdam rerum ut illum.', 1, 'Dolores.', '1984-05-03 18:28:29', '2005-07-16 12:17:15', 0),
(58, 'in', 2, 17, 37, NULL, 7, 892.00, 792.00, 4.00, 10.00, 1, 'Dolor vel ut eius ut nihil culpa porro dolorum. Blanditiis qui illo enim. Ut corporis minus harum laborum in repellat.', 'Maiores debitis fuga est. Dolore ut qui eligendi. Et nostrum et omnis voluptate cum occaecati.', 'Voluptatem sint velit quos quos.', 1, 'Quis.', '1972-07-22 13:59:39', '1970-04-30 21:30:09', 0),
(59, 'dolorum', 2, 16, 36, NULL, 2, 951.00, 851.00, 4.00, 5.00, 0, 'Eveniet aut praesentium et non eaque. Maxime perferendis totam nihil voluptatem eum. Eum esse magni totam amet. Autem recusandae possimus recusandae sed ad similique ex.', 'Quibusdam ut omnis rerum dolorum. Nihil et laboriosam ducimus qui quia repudiandae.', 'Debitis quibusdam autem nobis.', 1, 'Odit.', '1970-03-08 06:43:42', '2014-12-04 10:15:44', 0),
(60, 'est', 2, 16, 34, NULL, 7, 983.00, 883.00, 0.00, 5.00, 0, 'Qui consequatur sed harum aut et recusandae odit. Quo beatae voluptatum ut quam dolorum. Earum nobis corrupti hic sequi corporis odit dolorum.', 'Odit explicabo minus a. Sit sit ab a totam. Facilis eaque quidem vel quo.', 'Quia excepturi est odio id quo cumque omnis.', 1, 'Quod aut.', '1986-05-31 09:22:25', '1974-12-11 14:47:49', 0),
(61, 'sapiente', 2, 17, 33, NULL, 7, 657.00, 557.00, 3.00, 5.00, 0, 'Consequuntur maxime dolore hic odio. Totam voluptas sit architecto magni vero optio. Hic velit nobis adipisci maiores soluta est vel. Rem rerum repudiandae libero dolore non saepe eaque et.', 'Dolores quo voluptas provident. Quia magnam hic quod quo minima vero eum.', 'Sed rem magni doloremque eum aut veritatis.', 1, 'Omnis.', '1995-05-16 14:36:24', '1997-09-17 08:57:24', 0),
(62, 'et', 2, 16, 33, NULL, 2, 867.00, 767.00, 1.00, 10.00, 1, 'Non suscipit hic perspiciatis necessitatibus quas voluptatibus. Dolores quae nihil labore voluptatem. Ad maxime quo aut ipsam sint commodi quod asperiores. Est sit maxime ullam ea.', 'Ipsa harum non fugit molestiae. Qui et deleniti omnis.', 'Enim aut odit at minus delectus quis.', 1, 'Sed quod.', '2017-12-11 10:51:57', '2019-03-27 03:42:43', 1),
(63, 'ut', 2, 16, 33, NULL, 2, 222.00, 122.00, 2.00, 10.00, 0, 'Labore cum eveniet facilis doloremque. Architecto porro voluptas natus amet dolorem. Corrupti veritatis quia ipsa aut dolore. Rerum ut distinctio non dolores vitae.', 'Hic omnis nisi non iste autem voluptatem ducimus voluptatibus. Quia tempore qui ut deleniti omnis.', 'Ut dolor harum non sunt.', 1, 'Molestiae.', '2017-09-21 10:43:29', '2019-03-27 03:43:01', 1),
(64, 'est', 2, 16, 38, NULL, 7, 350.00, 250.00, 2.00, 5.00, 0, 'Consequatur ullam consequuntur ut ratione. Et excepturi eum quis enim ab vel sed. Aut odio sit excepturi dolorem est excepturi quasi. Possimus aliquam atque dolores labore quisquam deleniti.', 'Ipsum et nihil reiciendis. Nam soluta nihil et totam doloremque facilis.', 'Nisi inventore est nihil.', 1, 'Eos sit.', '2006-12-05 09:19:55', '1973-10-31 04:49:08', 0),
(65, 'tenetur', 2, 16, 34, NULL, 7, 684.00, 584.00, 2.00, 10.00, 1, 'Sunt est aut eos sequi repellat. Praesentium tempora quia temporibus saepe ipsam quo illo. Aut amet quisquam rerum voluptatem. Consequatur rerum dolor odio occaecati quaerat.', 'Dolorum eos ipsa cum reiciendis culpa. Molestiae maxime dolor nihil.', 'Consequatur esse nihil voluptatem.', 1, 'Rem.', '2008-04-23 23:28:15', '2005-09-14 07:39:49', 0),
(66, 'et', 2, 16, 37, NULL, 5, 802.00, 702.00, 2.00, 5.00, 1, 'Aperiam qui et doloremque excepturi. Quia harum quos voluptatem rerum commodi odit. Ipsa et pariatur repudiandae tempora officiis eligendi nisi.', 'Quia distinctio omnis ut consequatur sint. Corrupti repellat amet voluptates sapiente maiores.', 'Consequatur sunt aliquid aperiam impedit.', 1, 'Sapiente.', '1998-08-30 21:44:16', '2013-11-15 19:35:15', 0),
(67, 'beatae', 2, 16, 33, NULL, 3, 308.00, 208.00, 5.00, 10.00, 0, 'Quaerat aperiam aliquam officiis voluptatem inventore. Exercitationem ea pariatur qui dolorem ipsum. Qui doloribus ea et et dolorem rerum. Est dolorem voluptatem laboriosam qui iste ut perspiciatis.', 'Sint et blanditiis soluta sequi consequuntur. Ad nihil quo fugit tenetur tenetur.', 'Quis voluptate quia mollitia est.', 1, 'Quia modi.', '1993-02-18 23:27:12', '1999-06-10 20:29:41', 0),
(68, 'deserunt', 2, 17, 34, NULL, 10, 763.00, 663.00, 3.00, 5.00, 0, 'Omnis quisquam perspiciatis voluptatem nisi omnis culpa. Nisi voluptatibus aliquam vel nostrum. Quia alias sit labore voluptatem.', 'Provident cupiditate qui natus consectetur quas est. Recusandae et impedit nulla aut.', 'Neque dolorum et repudiandae placeat modi.', 1, 'Et unde.', '1971-12-23 00:19:23', '2013-09-09 05:45:26', 0),
(69, 'fugiat', 2, 17, 38, NULL, 6, 637.00, 537.00, 4.00, 10.00, 0, 'Nobis dolores quia optio voluptatem rerum ipsam temporibus. Doloribus in aperiam sit soluta sit. Qui culpa asperiores ut cum quia.', 'Minima eius fugit molestiae. Cupiditate quasi illo reiciendis magni. Dolorem id sed beatae.', 'Ut ut id et maxime. Eum qui quia voluptatem sit.', 1, 'Aut.', '1981-12-05 00:26:59', '2010-07-06 06:39:13', 0),
(70, 'accusantium', 2, 16, 33, NULL, 4, 469.00, 369.00, 1.00, 10.00, 1, 'Dolor asperiores sit sequi quos sit voluptatem. Consectetur mollitia animi vel dolores. Nihil consectetur non nostrum molestiae ut.', 'Et eum incidunt quia rerum. Et impedit ex assumenda debitis. Dolor et nemo in eaque facere.', 'Et debitis enim deleniti neque repellat.', 1, 'Ut vel.', '2004-10-07 00:51:31', '1999-03-13 15:49:32', 0),
(71, 'consequatur', 2, 16, 35, NULL, 9, 426.00, 326.00, 2.00, 10.00, 1, 'Illo iure quia est provident. Nemo iste autem necessitatibus tenetur. Qui quaerat aut ut et doloribus. Ex sint nobis voluptatibus consequatur vel.', 'Aut et rerum non porro et. Enim aut reiciendis qui alias dolore.', 'Non nostrum vel provident molestias veritatis.', 1, 'Qui sed.', '1996-12-21 17:49:40', '1991-01-25 20:38:45', 0),
(72, 'voluptatem', 2, 17, 36, NULL, 8, 413.00, 313.00, 3.00, 5.00, 1, 'Dolores ut quae eos dolore consequatur consequatur. Voluptatem eaque molestiae qui nostrum nobis doloremque possimus. Enim omnis repellendus voluptatem et.', 'Vel excepturi sapiente aut. Nobis nam non eum. Repellendus eum eos optio accusamus neque sequi eum.', 'Illum aut minus sit ut qui quasi et minus.', 1, 'Voluptas.', '1978-06-30 12:43:10', '1986-05-26 22:09:11', 0),
(73, 'autem', 2, 17, 37, NULL, 3, 918.00, 818.00, 4.00, 5.00, 1, 'Et consectetur voluptas et laboriosam et rem. Et ut libero assumenda aut distinctio vero. Corporis vitae earum asperiores ipsum culpa facere. Eius dolore explicabo quisquam quos.', 'Nesciunt ut ut et et cum. Alias saepe tempore autem numquam praesentium. Optio culpa nisi sit.', 'Voluptatem velit ipsum in ut.', 1, 'Culpa est.', '2016-03-04 09:46:46', '2017-12-20 05:01:44', 0),
(74, 'eos', 2, 17, 36, NULL, 3, 871.00, 771.00, 2.00, 5.00, 0, 'Recusandae porro eius distinctio incidunt reprehenderit rerum. Hic qui perferendis minus dolores nostrum cumque in. Omnis qui eum cum occaecati.', 'Eveniet debitis qui ut. Sit officia cupiditate nihil quibusdam quasi. A sit est nobis corrupti.', 'Ut sed non eveniet.', 1, 'Quia.', '1996-09-04 01:07:21', '1994-04-21 04:59:02', 0),
(75, 'velit', 2, 16, 33, NULL, 10, 628.00, 528.00, 3.00, 5.00, 0, 'Nihil error enim vel et minima. Laudantium qui necessitatibus voluptatem sunt error at. Enim eos ducimus delectus explicabo pariatur quam ut beatae.', 'Enim rerum vel nulla ea. Tempore sunt dolores distinctio mollitia id non reprehenderit officia.', 'Nostrum officiis veritatis et et.', 1, 'Molestias.', '1999-10-11 01:08:33', '1998-04-09 10:51:16', 0),
(76, 'impedit', 2, 17, 33, NULL, 3, 440.00, 340.00, 1.00, 5.00, 0, 'Ut alias dolores illum inventore mollitia incidunt aut. Saepe iste et sint et id qui. Rerum ut quis velit eveniet neque sed tempore.', 'Magni dolorum quidem omnis reprehenderit qui sit enim. Animi aut fugit beatae ea enim facilis.', 'Possimus officiis cum quaerat reprehenderit.', 1, 'Velit.', '1994-02-05 16:30:05', '2007-03-04 17:11:31', 0),
(77, 'hic', 2, 17, 36, NULL, 10, 796.00, 696.00, 2.00, 10.00, 0, 'Ex aut nostrum incidunt quibusdam dignissimos tempora fugiat recusandae. Et nihil molestiae voluptas repellat nihil earum.', 'Eligendi qui ratione cum quam. Culpa est qui vel non. Ut est necessitatibus quidem molestiae dicta.', 'Et iste reprehenderit expedita earum.', 1, 'Est omnis.', '1982-03-15 12:03:25', '1990-01-16 17:03:27', 0),
(78, 'laborum', 2, 16, 38, NULL, 2, 410.00, 310.00, 1.00, 5.00, 0, 'Sapiente fuga sit quia odit ducimus. Laudantium magni ipsum est at. Dolorum rerum quis corrupti culpa aut iure excepturi.', 'Tempora quos est non. Nostrum corporis molestias molestias veritatis.', 'Consequatur sint sint ut maiores beatae.', 1, 'Quis esse.', '1981-12-29 20:24:41', '2016-09-03 07:24:24', 0),
(79, 'nihil', 2, 16, 34, NULL, 2, 714.00, 614.00, 1.00, 10.00, 0, 'Sunt a aliquid cumque tenetur. Aliquid quibusdam iure at sit repellendus ea consectetur. Qui consequuntur et ratione rerum explicabo et. Autem inventore rerum voluptatem iusto vel dolores.', 'Natus excepturi doloremque qui enim. Magni et laborum aliquam aliquam.', 'Doloribus non at mollitia nostrum.', 1, 'Sapiente.', '1984-08-03 03:06:07', '2016-03-24 02:02:48', 0),
(80, 'vel', 2, 16, 35, NULL, 2, 502.00, 402.00, 3.00, 5.00, 1, 'Qui nihil voluptas sint dicta praesentium. Ratione illum iure possimus voluptatem consequatur qui occaecati quos. Et facere fugit quo aliquam voluptatem voluptate id porro.', 'Quia illum animi beatae ut rerum voluptatem. Ullam placeat consequuntur neque facere enim vitae.', 'Velit distinctio sed fugiat assumenda.', 1, 'Nesciunt.', '2016-10-20 08:26:10', '1995-07-01 02:25:39', 0),
(81, 'aspernatur', 2, 16, 36, NULL, 7, 706.00, 606.00, 3.00, 10.00, 1, 'Et tempora maiores enim pariatur quisquam dolores fuga. Soluta sunt repudiandae amet rem. Qui et quod ex qui et deleniti ut.', 'Tenetur atque qui at nulla cum. Molestiae beatae non explicabo itaque libero.', 'Minima omnis sunt sit labore sunt autem et.', 1, 'Adipisci.', '2002-03-23 02:49:15', '1979-01-22 09:47:58', 0),
(82, 'magnam', 2, 17, 37, NULL, 3, 295.00, 195.00, 0.00, 5.00, 1, 'Incidunt alias ut sit nostrum cupiditate vel. Consequatur qui exercitationem ipsa vero et et. Possimus suscipit ab nobis dolore officiis ut et.', 'Deserunt magni dolorem voluptas. Eum ut sed ipsum.', 'Corporis vel est et ab.', 1, 'Est.', '2011-02-21 05:51:16', '1983-12-21 14:59:41', 0),
(83, 'qui', 2, 17, 35, NULL, 2, 278.00, 178.00, 2.00, 5.00, 1, 'Sint sed ducimus nostrum iure ut doloremque modi. Rem quia voluptate sed nesciunt omnis. Aut culpa sunt molestiae qui eum consequuntur. Corrupti animi eos deserunt quod culpa cupiditate.', 'Qui maxime quia veritatis ex ducimus. Aut nisi et assumenda aut nesciunt.', 'Et aliquam aut accusamus rerum voluptas.', 1, 'Cumque ab.', '1972-04-24 11:14:46', '1979-02-24 22:50:22', 0),
(84, 'ipsam', 2, 16, 33, NULL, 3, 220.00, 120.00, 5.00, 10.00, 1, 'Ut eveniet dicta id ut minus aut. Alias enim fugiat quo aliquam omnis possimus dolor.', 'Quisquam est atque quis et non consequatur qui. Dolorum aut autem praesentium vel voluptatem quia.', 'Aliquam enim itaque sit officia ut.', 1, 'Magni.', '2010-05-02 20:16:40', '1994-10-28 06:57:44', 0),
(85, 'deserunt', 2, 16, 36, NULL, 7, 730.00, 630.00, 2.00, 10.00, 0, 'Aut error necessitatibus assumenda dolor modi quibusdam. Voluptatum delectus consequatur aut non.', 'Natus fugiat voluptatum tempore et ex et. Sequi aut voluptatem ut impedit facere nam.', 'Dolor doloribus vitae qui quam consectetur ut.', 1, 'Quisquam.', '1995-10-26 04:48:00', '1991-12-10 13:51:37', 0),
(86, 'odio', 2, 17, 38, NULL, 8, 891.00, 791.00, 3.00, 5.00, 0, 'Esse sunt aut quasi ut. Molestiae et quis nostrum est eligendi culpa ut. Quia voluptatem nisi sint. Itaque et unde debitis excepturi non quasi modi.', 'Quo sit culpa nihil. Enim voluptate velit expedita. Ad at maxime libero optio sed.', 'Eos veritatis consequatur delectus dolor quos.', 1, 'Soluta.', '1981-02-20 22:26:49', '1985-10-22 19:39:50', 0),
(87, 'magnam', 2, 16, 33, NULL, 6, 697.00, 597.00, 3.00, 10.00, 0, 'Dolor nostrum maiores adipisci inventore enim fugit minus. Nam at veniam et possimus ea aut quos. Minima quam ullam aut perspiciatis maiores. Dolor temporibus fugit magni.', 'Nihil eum earum aperiam a culpa. Velit eaque hic nostrum aut et. Aut quo voluptates quia corrupti.', 'Unde dolore quia asperiores ad.', 1, 'Expedita.', '1984-03-13 16:13:34', '1978-05-25 06:27:15', 0),
(88, 'rerum', 2, 16, 37, NULL, 2, 958.00, 858.00, 4.00, 5.00, 0, 'Quo nulla veniam qui quod deserunt. Et earum ullam quaerat quia impedit. Voluptatem possimus in et magni. Molestiae tenetur distinctio reiciendis pariatur doloribus.', 'Illum dignissimos libero rerum adipisci. Voluptatem laudantium soluta amet et in.', 'Qui ut aut perspiciatis nemo id.', 1, 'Tempora.', '2002-12-06 19:47:01', '1976-10-15 16:17:33', 0),
(89, 'fugiat', 2, 17, 33, NULL, 5, 465.00, 365.00, 5.00, 5.00, 1, 'Modi praesentium voluptatem sint asperiores. Quod dolor eos corporis aut. Cum placeat distinctio rerum fugit.', 'Illo cupiditate a est eaque. Qui corrupti iusto rerum ea. A porro occaecati culpa voluptate.', 'Quibusdam nostrum corrupti autem eum.', 1, 'Sit atque.', '1977-09-02 05:54:42', '2017-06-30 01:04:02', 0),
(90, 'autem', 2, 16, 34, NULL, 4, 780.00, 680.00, 1.00, 5.00, 1, 'Iure qui ad possimus quia autem voluptatem aperiam. Esse voluptate in qui vero eligendi id. Consequatur modi et ab soluta iusto. Incidunt sed adipisci eius nulla sequi.', 'Non natus sed perferendis rerum dolorem. Quia quos quisquam quasi est.', 'Fugit omnis quod aperiam natus sit error et.', 1, 'At qui.', '1972-07-13 07:17:25', '1970-11-10 22:30:05', 0),
(91, 'et', 2, 16, 34, NULL, 6, 726.00, 626.00, 4.00, 10.00, 1, 'Expedita ab nulla blanditiis et. Sapiente nulla aut laborum quasi et pariatur alias. Blanditiis qui nihil laboriosam distinctio velit est. Est vitae magni architecto delectus placeat qui.', 'Et eius magni sit. Debitis veritatis nobis maiores vel. At a cum temporibus est consectetur et.', 'Voluptatum quia molestias unde et ut voluptates.', 1, 'Iusto vel.', '2002-10-01 21:03:02', '2010-11-25 09:17:47', 0),
(92, 'voluptatem', 2, 16, 36, NULL, 9, 227.00, 127.00, 3.00, 10.00, 0, 'Beatae et sed modi repellat doloribus vero. Laudantium quasi consequuntur nulla tempora ullam illum. Praesentium quasi non et voluptatum.', 'Quo est provident laudantium. Tempora esse aut ea nam quis reiciendis.', 'Assumenda fugit veritatis minima officiis.', 1, 'Aut in.', '1994-08-16 01:15:04', '2007-07-28 16:46:39', 0),
(93, 'quo', 2, 17, 38, NULL, 9, 671.00, 571.00, 3.00, 5.00, 1, 'Qui soluta molestias labore dignissimos vitae. Incidunt itaque voluptas sit et ipsam beatae ipsum. Voluptatibus et quae at aspernatur minus.', 'Velit facere repellendus dolorem deserunt eligendi. Ullam recusandae quasi autem.', 'Ut at sed explicabo ducimus.', 1, 'Quis.', '1982-03-10 10:51:37', '2011-10-27 01:10:59', 0),
(94, 'aut', 2, 17, 33, NULL, 1, 551.00, 451.00, 4.00, 5.00, 1, 'Aut et laboriosam similique iure et soluta. Animi porro totam dolorem minima maxime rerum. Et voluptas quo dolorem voluptas non non id. Tenetur sint qui quaerat eius ea.', 'Ad mollitia qui aut sed nobis. Sint velit ut voluptatem pariatur nisi nihil.', 'Consequuntur ad et voluptatem praesentium.', 1, 'Molestias.', '2016-02-18 02:46:24', '2016-10-10 04:41:53', 0),
(95, 'et', 2, 17, 38, NULL, 2, 723.00, 623.00, 2.00, 10.00, 0, 'Nihil sed repellat aliquid ullam sint. Odit quasi error dolores et nisi. Facere ut cupiditate consequatur eum. Ex autem et quas est autem praesentium maiores.', 'Enim sint adipisci nemo. Adipisci eum aut ipsam qui iste. Nihil error et animi molestiae est et.', 'Assumenda dolorem molestias aperiam nulla.', 1, 'Et cum.', '2019-03-13 16:35:31', '2019-03-27 03:43:01', 0),
(96, 'est', 2, 17, 33, NULL, 8, 869.00, 769.00, 1.00, 5.00, 0, 'Commodi voluptas aliquid et dolorum ut et accusamus reiciendis. Exercitationem est explicabo dolorum delectus similique veritatis fugiat officia. Est ipsum omnis sequi omnis numquam sit.', 'Laboriosam qui necessitatibus ut. Ipsa provident quis cum tempore eum.', 'Fugiat qui aut repellat ipsum non alias.', 1, 'Quia odit.', '1987-10-26 09:50:43', '2000-06-11 13:08:19', 0),
(97, 'rem', 2, 16, 37, NULL, 6, 748.00, 648.00, 2.00, 10.00, 1, 'Laudantium esse aspernatur laborum tenetur est. Hic sunt fugit molestiae qui laudantium aut voluptas. Vitae dolore omnis omnis molestiae voluptas corrupti.', 'Sit ipsum ratione id et. Non natus sit molestias quibusdam voluptatem quis beatae.', 'Nulla consectetur incidunt ut.', 1, 'Suscipit.', '1980-04-04 09:26:17', '1970-12-17 03:57:06', 0),
(98, 'a', 2, 17, 34, NULL, 1, 318.00, 218.00, 1.00, 10.00, 1, 'Voluptatibus quia neque et odit. Quas distinctio sint dolor. Saepe ipsam et aliquid. Voluptatem nostrum eaque voluptas quidem non eius odio.', 'Iste quam odit nesciunt rerum. Hic qui est ut ab ut.', 'Assumenda quo rem eveniet consequatur.', 1, 'Quo.', '2017-05-18 17:29:05', '2010-12-15 17:45:33', 0),
(99, 'error', 2, 17, 38, NULL, 7, 438.00, 338.00, 4.00, 10.00, 1, 'Doloremque ex qui quo. Ipsum minima perspiciatis aliquid officiis distinctio maxime et. Sint deserunt sed et ea sit.', 'Cum sint dignissimos laboriosam. Sint commodi dicta at iste atque dolore.', 'Aut autem dolores omnis omnis pariatur.', 1, 'Ducimus.', '2002-06-30 10:44:08', '1981-04-07 12:24:47', 0),
(100, 'enim', 2, 16, 38, NULL, 6, 765.00, 665.00, 4.00, 5.00, 0, 'Consequatur qui in earum quia voluptate itaque dolorem. Amet sit necessitatibus dolorum veniam. Et nemo sint modi. Tenetur quam voluptate itaque consequatur. Iusto neque sint sit aperiam.', 'Corrupti magnam et molestias nobis. Ipsam et non officiis odit.', 'Maxime dolore dolorum quis maxime.', 1, 'Tempore.', '2002-10-18 07:41:34', '2001-12-31 07:39:40', 0),
(101, 'deleniti', 2, 17, 34, NULL, 8, 254.00, 154.00, 3.00, 5.00, 1, 'Voluptate sit possimus dicta. Ut tenetur et unde culpa quo dolorem qui. Error voluptatem sed consequatur voluptatum voluptate ipsum.', 'Sunt adipisci est ab molestias quis. Nisi necessitatibus eum ipsum qui esse quia dolor sit.', 'Perferendis labore optio sint sit est qui.', 1, 'Aliquid.', '1979-12-26 22:55:54', '2001-10-17 10:46:56', 0),
(102, 'ex', 2, 16, 34, NULL, 2, 323.00, 223.00, 0.00, 10.00, 0, 'Non consequatur quae facere repellat et debitis non. Omnis esse aliquam quisquam ducimus quos veritatis. Doloremque eveniet optio id non. Et vitae porro similique sint.', 'Similique modi quia culpa cumque. Voluptatem facere quis cumque omnis. Nisi id odit eos est quia.', 'Consectetur est nisi cum.', 1, 'Totam.', '1996-08-12 17:58:27', '1984-02-05 23:48:51', 0),
(103, 'aliquam', 2, 16, 36, NULL, 2, 489.00, 389.00, 0.00, 5.00, 0, 'Explicabo blanditiis officia et exercitationem iste molestiae. Vel quis doloribus voluptas optio sed. Esse animi doloremque aut magnam enim. Libero architecto nobis voluptas iusto.', 'Ratione autem ipsam a amet velit. Quo at expedita et rerum et.', 'Fugiat quis placeat nisi ratione voluptatem eos.', 1, 'Quae.', '1998-03-14 08:07:37', '1974-09-10 22:20:09', 0),
(104, 'sunt', 2, 17, 34, NULL, 9, 782.00, 682.00, 1.00, 10.00, 0, 'Vero id architecto debitis animi. Cum voluptates quasi voluptatum quos et ut nam. Omnis vitae molestiae deserunt ipsum eos et maiores.', 'Qui voluptas et omnis consequatur aut exercitationem temporibus neque. Excepturi delectus et qui.', 'Maxime eos vel autem nulla modi aut.', 1, 'Harum.', '1975-11-12 10:02:38', '2013-07-13 03:17:54', 0),
(105, 'officiis', 2, 17, 38, NULL, 7, 459.00, 359.00, 0.00, 5.00, 0, 'Illo id aut suscipit dolorem ab magnam autem. Delectus suscipit alias dolor dolorum voluptatem. Doloribus error eum commodi rem explicabo numquam sit. Consequatur ipsam enim rerum nobis unde tempora.', 'Ut id voluptatem laborum inventore. Repudiandae sed officia et modi quia maxime.', 'Ut aliquid cupiditate quos autem ipsam.', 1, 'Fugit.', '1971-03-24 17:09:42', '2002-03-21 12:27:09', 0),
(106, 'et', 2, 17, 33, NULL, 1, 383.00, 283.00, 1.00, 10.00, 0, 'Magni laborum sed maiores excepturi illum. Et deleniti dignissimos enim.', 'Illo nihil natus est totam autem. Velit animi molestias eaque velit voluptatem nostrum est.', 'Mollitia minima veniam soluta.', 1, 'Eligendi.', '2009-02-28 11:14:25', '1975-05-10 14:42:35', 0),
(107, 'non', 2, 16, 38, NULL, 1, 719.00, 619.00, 3.00, 10.00, 1, 'Suscipit aliquam aliquam error suscipit est doloribus. Alias est vel quia. Id ex molestiae et rerum. Nam quaerat hic non quis. Asperiores vitae fugit voluptas qui. Nemo qui explicabo itaque quae.', 'Perferendis voluptatem ab fugiat et voluptatem. Eligendi autem qui tenetur minima.', 'Nam quo aut ducimus repellat sed.', 1, 'Vitae nam.', '1977-03-21 00:42:19', '1989-10-04 02:48:23', 0),
(108, 'mollitia', 2, 17, 36, NULL, 7, 892.00, 792.00, 4.00, 5.00, 1, 'Quas nesciunt officia aut ullam et. Ut laborum aut et molestiae autem velit fuga. Saepe sit modi impedit libero et autem voluptatem.', 'Laboriosam quibusdam sit est fugit. Eos asperiores non quia. Nulla possimus impedit repellat.', 'Temporibus quas corrupti vel tempora enim itaque.', 1, 'Corrupti.', '2018-10-22 22:10:42', '2019-03-26 03:40:49', 1),
(109, 'rerum', 2, 17, 35, NULL, 3, 313.00, 213.00, 3.00, 5.00, 0, 'Sit similique laborum et molestiae consequuntur saepe illum. Dolorem itaque commodi ipsum ratione a. Cum soluta vitae vero ut error quis. Rerum optio rerum velit.', 'Dicta non consequatur voluptatem vitae est. Est aspernatur deserunt blanditiis et ut.', 'Dolore molestiae itaque molestias nobis.', 1, 'Qui iure.', '2009-04-11 22:04:35', '1992-12-24 03:50:09', 0),
(110, 'incidunt', 2, 16, 38, NULL, 3, 889.00, 789.00, 2.00, 10.00, 0, 'Aut ut atque quo. Rerum dolores quaerat non. Mollitia adipisci voluptatum rerum et vel fugit qui. Ut repudiandae perferendis rerum voluptatem pariatur cum quos.', 'Aut dolores voluptatem quia molestiae quibusdam sunt molestias unde. Sequi et sunt commodi et.', 'Error sint illo doloremque.', 1, 'Vero.', '2001-02-16 07:00:04', '1991-08-26 09:40:46', 0),
(111, 'dignissimos', 2, 17, 36, NULL, 4, 851.00, 751.00, 1.00, 10.00, 1, 'Ipsa nihil qui est iure. Sint dolorem nisi qui cumque perferendis animi voluptatibus. Quis quod sed labore ea veritatis.', 'Quasi quas et commodi amet minus. Blanditiis aut illum sunt. Est libero eos qui quia.', 'Id a itaque dignissimos.', 1, 'Aut.', '1993-07-22 09:14:57', '1970-12-01 17:42:01', 0),
(112, 'dolorem', 2, 17, 37, NULL, 2, 266.00, 166.00, 3.00, 5.00, 1, 'Est iure nostrum non amet. Ipsum est aut corrupti cupiditate facere voluptas. Sed non vel commodi itaque sunt eos. Reprehenderit sed hic officiis eligendi qui molestias.', 'Numquam natus totam vitae molestiae. Explicabo ut magni quia temporibus laborum earum.', 'Quam perferendis sit doloribus fugit sint eos.', 1, 'Magnam.', '2004-12-14 18:55:18', '2008-10-02 03:41:17', 0),
(113, 'facilis', 2, 17, 33, NULL, 4, 581.00, 481.00, 5.00, 5.00, 0, 'Sed aut iusto distinctio a minima recusandae. Perspiciatis beatae deleniti nihil sed vel ratione molestiae. Repudiandae recusandae ut a nostrum. Et maiores quia quia magnam dolore quia.', 'Nisi eveniet ducimus harum qui. Sunt et libero voluptate consequatur eveniet et.', 'Assumenda doloremque eum et temporibus sed.', 1, 'Minima.', '1986-04-29 04:15:55', '2005-03-08 01:50:17', 0),
(114, 'praesentium', 2, 16, 38, NULL, 1, 399.00, 299.00, 5.00, 10.00, 0, 'Cum possimus mollitia dolorum. Alias velit voluptas reiciendis nihil fugit minus doloribus odio. Dolores praesentium et in nobis enim adipisci eos.', 'At quo sunt consequuntur. Tempore et nisi et voluptatum quo. Consequatur non aut nihil.', 'Suscipit eveniet sit eius odio.', 1, 'Excepturi.', '1970-07-07 01:35:24', '2003-05-17 09:10:54', 0),
(115, 'possimus', 2, 17, 38, NULL, 9, 479.00, 379.00, 4.00, 5.00, 1, 'Et pariatur autem repellat omnis officia omnis. Minus suscipit aliquam non autem. Et sed cumque quidem et maiores.', 'Omnis quod eos placeat inventore expedita similique. Ducimus est eum minima at temporibus.', 'Exercitationem error pariatur autem nam.', 1, 'Et et.', '1997-10-19 19:32:50', '1986-10-03 05:09:12', 0),
(116, 'perspiciatis', 2, 16, 36, NULL, 4, 329.00, 229.00, 4.00, 5.00, 0, 'Et dicta qui animi libero. Voluptatem quam amet nulla ipsam cupiditate velit ut expedita. Saepe pariatur sed et quia architecto rerum. Animi numquam minima ut aspernatur.', 'Id commodi at minus ut dignissimos quasi. Placeat eveniet modi et dolorem.', 'Repellendus ut doloribus eius.', 1, 'Tempora.', '2006-08-21 20:59:02', '1994-04-17 17:05:16', 0),
(117, 'laborum', 2, 17, 35, NULL, 3, 237.00, 137.00, 1.00, 10.00, 1, 'Vel placeat possimus nulla cum itaque asperiores maiores. Pariatur ducimus rerum modi optio. Quasi ex maiores pariatur error dolor ad reprehenderit. Dolores ut provident tenetur.', 'Non repellat temporibus qui laborum sed. Amet occaecati qui et.', 'Est ipsa possimus corporis.', 1, 'Dolorem.', '2014-11-27 05:12:50', '1985-05-08 11:16:05', 0),
(118, 'animi', 2, 17, 38, NULL, 10, 478.00, 378.00, 0.00, 10.00, 0, 'Laborum aut id ullam eum. Qui et aut quia voluptate odio. Quia incidunt dolor fugit.', 'Quae tenetur animi eum aut. Et est cum porro odio autem aut odio.', 'Qui sed aut quisquam et eius.', 1, 'Explicabo.', '1988-10-03 01:33:11', '1975-01-02 14:46:22', 0),
(119, 'similique', 2, 17, 34, NULL, 9, 771.00, 671.00, 2.00, 10.00, 1, 'Delectus nam voluptatem sit dolorem. Ex magnam suscipit ab minima hic.', 'Minima voluptatibus quasi doloribus. Est eaque dolorum magni est.', 'Et non officia et laudantium.', 1, 'Nesciunt.', '1983-07-12 04:54:28', '1972-12-24 04:38:03', 0),
(120, 'non', 2, 17, 38, NULL, 9, 355.00, 255.00, 1.00, 10.00, 0, 'Aspernatur consequuntur qui voluptatum natus ea. Illum id hic et veritatis nihil atque et quia. Illum aut ab vel quod molestias. Ad cum ratione eos dolorem.', 'Temporibus necessitatibus corrupti ut libero aliquam nulla. Commodi repellendus odit eaque enim.', 'Omnis corrupti excepturi vel sunt a voluptatem.', 1, 'Eligendi.', '1993-11-05 10:35:10', '1993-07-14 14:29:24', 0);
INSERT INTO `products` (`id`, `name`, `mother_category_id`, `category_id`, `sub_category_id`, `manufactures_id`, `quantity`, `price_per_unit`, `purchase_price`, `discount`, `vat`, `availability`, `details`, `specification`, `warranty`, `active`, `note`, `created_at`, `updated_at`, `hot`) VALUES
(121, 'qui', 2, 22, 47, NULL, 10, 14582.00, 12582.00, 4.00, 5.00, 0, 'Molestias ducimus ut hic aliquam et. Ut laborum nobis commodi iusto et soluta sit. Sit rerum ut sed eligendi inventore quod ut. Sed fugit vel exercitationem voluptatem ducimus.', 'Provident sit pariatur ipsa. Ut est dolores nam. Sed nihil dolorem amet et sequi eum.', 'Aut doloribus non rerum quis voluptatem.', 1, 'Error.', '1980-03-22 03:42:40', '2019-02-04 10:50:52', 0),
(122, 'quo', 2, 22, 47, NULL, 5, 29846.00, 27846.00, 4.00, 10.00, 1, 'Quo modi consectetur minima magnam aut. Minima nostrum rerum voluptates debitis illum placeat. Quaerat voluptas quis qui rerum explicabo ipsum.', 'Et est sapiente quod quo fuga. Beatae ut molestiae ullam. Est qui accusantium debitis sed.', 'Omnis ut voluptatibus voluptate.', 1, 'Laborum.', '1990-04-05 07:42:04', '2014-05-12 08:23:06', 0),
(123, 'aut', 2, 22, 48, NULL, 5, 18143.00, 16143.00, 4.00, 10.00, 1, 'Placeat molestias quas sed provident. Quidem accusamus rerum dolore sit. Vel esse ullam dolor consequatur aut ducimus. Aut maiores autem sint ad quidem quam.', 'Vel et rerum qui consequatur nostrum nihil quia alias. Illo et enim nemo quis. Quia ut at quaerat.', 'Aperiam repudiandae sequi alias.', 1, 'Autem.', '1983-07-27 22:54:39', '2016-08-16 17:32:05', 0),
(124, 'quas', 2, 22, 47, NULL, 2, 7381.00, 5381.00, 5.00, 5.00, 1, 'Culpa quod eaque consequatur repellendus iusto non impedit. Aut et iusto quo nobis architecto sequi. Rerum quo temporibus et perspiciatis aut. Explicabo ipsa maxime quia.', 'Enim sit rerum qui sequi a nesciunt. Distinctio nesciunt quis eum.', 'Tempora suscipit et iusto sed tempore.', 1, 'Occaecati.', '1994-08-11 12:48:16', '1999-05-28 07:29:37', 0),
(125, 'nobis', 2, 22, 48, NULL, 4, 15044.00, 13044.00, 4.00, 5.00, 1, 'Voluptas et quisquam excepturi vel recusandae. At eos nam nam autem impedit. Non ut nulla ipsum omnis id sit voluptatem aut. Fuga provident quibusdam nobis libero ab dolorem deleniti.', 'Illum optio porro et dolores odit iste eos. Et unde minima et qui tempore saepe amet.', 'Optio distinctio quo dolor ut.', 1, 'Eum.', '1987-06-25 05:12:02', '2012-02-12 10:22:01', 0),
(126, 'quidem', 2, 22, 48, NULL, 9, 23440.00, 21440.00, 4.00, 5.00, 0, 'Et qui fugiat aspernatur quo magnam sequi voluptate. Dicta sed mollitia quasi voluptatem ut laudantium non praesentium.', 'Ut et expedita veniam beatae assumenda ut aut non. Qui sit debitis mollitia quasi.', 'Natus occaecati molestiae eveniet cum.', 1, 'Fugit ut.', '2017-08-26 22:01:26', '1974-01-09 10:56:01', 0),
(127, 'sed', 2, 22, 47, NULL, 7, 23702.00, 21702.00, 1.00, 5.00, 0, 'Eius sunt minima quo qui qui. Quasi similique dignissimos quasi eaque nihil aliquam possimus aut. Dolor aut sit aut eos ut est. Nam aliquam nisi eum vel nisi ut.', 'Ipsa nam ex qui molestiae iusto. Necessitatibus ut officiis aut quae esse est amet non.', 'Animi ut voluptatem ullam delectus repellendus.', 1, 'Ducimus.', '2002-10-16 17:51:45', '1989-05-24 16:48:36', 0),
(128, 'rerum', 2, 22, 47, NULL, 3, 24050.00, 22050.00, 3.00, 5.00, 0, 'Architecto et natus omnis aliquam quod consectetur. Vitae nobis et fugit eveniet sunt dolores.', 'Quia aut unde ut et. Eaque similique nihil est explicabo sed sed quos.', 'Ut in est iste soluta voluptate a.', 1, 'Non.', '1993-06-06 01:10:36', '2014-01-18 19:31:05', 0),
(129, 'perferendis', 2, 22, 47, NULL, 4, 26683.00, 24683.00, 4.00, 10.00, 0, 'Molestiae natus cumque et illo odio excepturi. Quibusdam suscipit voluptatem aliquid et. Quasi ut adipisci amet unde in fugiat natus.', 'Culpa aut sed autem vel fugit. Vel qui ipsam ea ut iste ex sed. Corporis voluptatibus veniam est.', 'Voluptatum culpa saepe nam.', 1, 'Dolor.', '1976-08-21 01:18:57', '1985-10-28 16:26:53', 0),
(130, 'enim', 2, 22, 48, NULL, 9, 5412.00, 3412.00, 5.00, 10.00, 0, 'Molestias sit eveniet omnis possimus. Ut minima et dolorum autem. Praesentium rerum blanditiis illum iure. Voluptatum illum non reiciendis illum facilis quas debitis.', 'Tenetur rerum aut minus assumenda. Aut ab quia distinctio neque aliquam expedita.', 'Velit quia enim voluptas assumenda.', 1, 'Occaecati.', '1981-04-09 21:22:41', '1971-04-24 05:26:22', 0),
(131, 'commodi', 2, 22, 48, NULL, 3, 19577.00, 17577.00, 1.00, 5.00, 1, 'Voluptatum repudiandae velit recusandae. Optio voluptate architecto quia est quia et sed. Mollitia sunt quaerat sint quia aspernatur corrupti dolor optio.', 'Praesentium qui cupiditate animi. Cumque sint dolorum eius ut.', 'Fugit quia vel blanditiis.', 1, 'Natus.', '1982-05-11 07:42:41', '1973-04-02 11:28:44', 0),
(132, 'tempora', 2, 22, 47, NULL, 7, 9864.00, 7864.00, 1.00, 5.00, 1, 'Ut rerum eaque totam vel. Autem similique magnam quaerat nulla soluta itaque eligendi. Sit aliquam aut minima nam. Et in modi recusandae distinctio facere impedit.', 'Molestiae quisquam qui mollitia tempore laborum quia. Laborum totam qui assumenda optio tempore.', 'Aut nemo provident voluptatibus perspiciatis.', 1, 'Sit.', '2015-06-28 21:15:17', '2011-07-02 16:10:12', 0),
(133, 'ea', 2, 22, 48, NULL, 2, 13958.00, 11958.00, 3.00, 5.00, 0, 'Eum neque perferendis et. Corporis reprehenderit natus vel nulla accusamus in officia. Sit dolorum sit alias ipsam.', 'Sit aut ut non voluptatum magnam rerum. Voluptatem animi quisquam corporis tempore.', 'Illo dolorem aut ut consequatur pariatur.', 1, 'Et et.', '1981-07-13 01:08:58', '2007-06-17 03:47:13', 0),
(134, 'delectus', 2, 22, 47, NULL, 10, 17202.00, 15202.00, 0.00, 5.00, 1, 'Dolor nihil nostrum et qui sequi nemo delectus. Commodi minima quidem velit cum. Quo quibusdam accusantium aperiam totam consequuntur quod qui.', 'Quo quod cum mollitia voluptatem nihil. Tempora ut dolor incidunt id magni.', 'Architecto nisi quis cum illo enim magnam quo.', 1, 'Autem.', '1988-11-26 07:14:42', '1988-04-13 23:08:19', 0),
(135, 'quasi', 2, 22, 47, NULL, 3, 23225.00, 21225.00, 5.00, 5.00, 0, 'Minus dolor dignissimos laborum iusto sed. Minima architecto et animi non doloribus autem. Quia illo libero totam ducimus qui voluptas velit. Autem culpa possimus nobis saepe accusamus adipisci.', 'Ut libero perferendis ut eos. Eum et nesciunt saepe.', 'Consequatur cum officia iusto doloremque.', 1, 'Accusamus.', '2010-10-27 17:46:56', '1991-07-29 17:10:03', 0),
(136, 'laborum', 2, 22, 48, NULL, 9, 18642.00, 16642.00, 4.00, 10.00, 1, 'Numquam blanditiis quia incidunt quis aut sed voluptatem. Sequi qui suscipit sit unde iure fugiat temporibus provident. Atque sit molestias repellendus repellat et doloribus excepturi.', 'Assumenda facilis nesciunt aut quia sed. Consectetur id totam ex exercitationem impedit.', 'Quasi ex possimus totam quis in non dignissimos.', 1, 'Ut est.', '1997-05-31 19:28:02', '2000-12-31 15:06:02', 0),
(137, 'dolorem', 2, 22, 47, NULL, 2, 6697.00, 4697.00, 3.00, 5.00, 1, 'Commodi voluptatem rem sint veritatis. Quidem autem delectus aliquid occaecati. Mollitia modi maxime voluptatum maiores.', 'Maxime voluptatem maxime ut cumque natus nisi. Quidem sed neque voluptates architecto dolor.', 'Et molestiae voluptatem eos dolor qui.', 1, 'Et ea.', '1981-01-24 21:07:12', '1983-08-31 20:25:19', 0),
(138, 'ut', 2, 22, 47, NULL, 7, 17775.00, 15775.00, 5.00, 10.00, 1, 'Est occaecati reprehenderit maiores quam. Eius voluptatem omnis autem est repellat quod repellendus. Voluptatem inventore modi nihil maxime. Et quia neque quo rem facilis est.', 'Est nemo unde autem magni iusto omnis sed. Quis animi voluptatibus deleniti vel tempora.', 'Quos qui ea totam dignissimos autem nam.', 1, 'Impedit.', '1970-07-19 09:50:39', '1974-03-12 07:17:44', 0),
(139, 'qui', 2, 22, 47, NULL, 8, 9070.00, 7070.00, 1.00, 5.00, 0, 'Minima minima distinctio rem ab. Et rerum exercitationem repudiandae totam. Consequatur ipsum recusandae saepe soluta corporis.', 'Dolor perferendis facilis non et ipsam natus. Earum in dolores nam aliquam labore cumque.', 'Dolores aspernatur consequatur quo placeat.', 1, 'Eaque ut.', '1999-09-20 15:35:37', '1983-11-24 15:11:02', 0),
(140, 'voluptatem', 2, 22, 47, NULL, 9, 15423.00, 13423.00, 0.00, 10.00, 1, 'Incidunt aut quia est sint ullam architecto. Dolores aperiam sunt qui quam dolores exercitationem sapiente voluptas. Ab quis praesentium perspiciatis officiis accusamus. Beatae maxime vel sed est et.', 'Sint quo dolorum quis occaecati error. Sapiente aut sunt quisquam id impedit dolor.', 'Consequatur ut voluptas consequuntur est omnis.', 1, 'Pariatur.', '1985-03-06 21:31:29', '2015-03-11 14:26:44', 0),
(141, 'non', 2, 22, 47, NULL, 6, 6442.00, 4442.00, 5.00, 5.00, 1, 'Doloremque voluptatem voluptates hic. Laboriosam ab corrupti et dignissimos sint doloremque neque tempora.', 'Totam neque quam dolorem ut quasi et ea. Distinctio occaecati est dolores doloribus aut a ut.', 'Quam non tempore dolorem soluta consequuntur.', 1, 'Voluptas.', '1979-08-31 13:31:00', '1983-03-01 10:48:05', 0),
(142, 'minima', 2, 22, 47, NULL, 6, 15707.00, 13707.00, 1.00, 10.00, 0, 'Et ipsum et voluptatem quis incidunt quo enim. Fuga veniam et nihil dicta dolor fuga. Necessitatibus iure et placeat id rerum modi.', 'Odio quis tenetur quas. Quasi corporis corporis temporibus.', 'Vel voluptas nesciunt vel et mollitia eum nihil.', 1, 'Omnis.', '2012-12-09 23:25:02', '1996-02-28 13:45:22', 0),
(143, 'nihil', 2, 22, 48, NULL, 8, 8424.00, 6424.00, 5.00, 10.00, 1, 'Veritatis dolor quidem facilis ut. Minima ut occaecati illo non fugiat quidem. Saepe et aut et deleniti.', 'Reiciendis est illum dolor sint. Sed facere accusantium mollitia perspiciatis.', 'Non sed sapiente blanditiis exercitationem ea.', 1, 'Qui.', '1990-06-03 15:00:10', '1999-05-31 04:30:48', 0),
(144, 'quo', 2, 22, 47, NULL, 4, 25252.00, 23252.00, 1.00, 10.00, 1, 'Ducimus qui doloremque eum voluptatem et. Illum eos eum corporis quibusdam quasi veniam. Corrupti rerum totam nulla hic temporibus id blanditiis enim.', 'Corporis totam rerum itaque voluptatem. Consequatur et dolore veniam omnis dolor fuga.', 'Laborum sit nihil corrupti rerum laborum.', 1, 'Esse est.', '1971-09-25 13:14:28', '1988-09-23 14:42:44', 0),
(145, 'vel', 2, 22, 48, NULL, 5, 13866.00, 11866.00, 2.00, 5.00, 1, 'Assumenda hic enim ullam nam eum harum eos veritatis. Itaque dolore sunt culpa aperiam porro inventore consequatur repudiandae. Aliquam aut magni sit ullam.', 'Ullam minus minus quod suscipit nihil quae. At consectetur ut velit in a minima.', 'Possimus id aut amet dolores quasi nisi.', 1, 'Dicta sed.', '1974-09-02 03:09:50', '1981-02-28 21:02:10', 0),
(146, 'rerum', 2, 22, 48, NULL, 10, 11399.00, 9399.00, 5.00, 5.00, 1, 'Amet et autem quibusdam eos. Voluptatem odio mollitia consequatur corrupti. Ut voluptatibus sint doloremque quod voluptas laudantium.', 'Sapiente quo commodi quaerat ut. Officiis doloribus doloribus blanditiis perferendis.', 'Voluptatum asperiores provident aut quidem rerum.', 1, 'Eum nobis.', '2001-04-05 21:30:49', '1981-04-28 10:57:01', 0),
(147, 'minima', 2, 22, 47, NULL, 5, 21206.00, 19206.00, 5.00, 10.00, 0, 'Quibusdam in deleniti non harum. Molestias ea omnis odit qui. Optio est neque unde vel aut et explicabo. Sapiente ratione eum rem eaque quasi. Vitae at ut illum itaque ullam minus voluptatem ipsum.', 'At voluptatibus non reprehenderit. Tempore aut autem voluptate sit nostrum dolorum.', 'Quos tenetur neque dolorem aliquam.', 1, 'Tenetur.', '1978-10-22 05:08:32', '2011-09-24 15:07:44', 0),
(148, 'ullam', 2, 22, 48, NULL, 2, 10447.00, 8447.00, 5.00, 10.00, 1, 'Aut et voluptates quidem aspernatur eum aspernatur. Cupiditate commodi est qui ipsa aspernatur dolorum. Consectetur asperiores dolorem iure et tempore voluptas.', 'Adipisci optio ex ut itaque deleniti maiores vero. Atque autem quasi velit.', 'Fugiat et velit et corporis repellat cum dolor.', 1, 'Illo.', '1985-09-17 08:49:13', '2013-10-09 18:59:55', 0),
(149, 'sit', 2, 22, 48, NULL, 9, 23936.00, 21936.00, 3.00, 5.00, 0, 'Omnis tempora et nesciunt eum. Rerum quia qui accusantium voluptatibus. Fugiat harum sunt voluptas praesentium. Aspernatur eaque ut non recusandae vitae dolores qui qui.', 'Aut iure sit voluptatem dolorem quae maxime. Ullam aut eveniet iste dicta ullam voluptatem.', 'Voluptatem libero nihil tenetur in.', 1, 'Eos.', '1978-04-12 19:02:16', '2000-12-19 18:59:18', 0),
(150, 'molestiae', 2, 22, 48, NULL, 7, 7965.00, 5965.00, 0.00, 5.00, 0, 'Magni repudiandae animi hic doloribus. Occaecati consequatur labore aliquid illum perspiciatis. Rem porro eos praesentium qui sequi provident.', 'Et libero voluptates ut facere rerum ex. Minus eaque exercitationem officiis sint consequatur amet.', 'Laudantium enim sapiente eum fuga labore.', 1, 'Quidem.', '1986-11-11 05:35:24', '1976-04-17 10:16:19', 0),
(151, 'alias', 2, 22, 48, NULL, 9, 29313.00, 27313.00, 1.00, 5.00, 0, 'Accusantium sed est rerum earum explicabo dolorum. Quo dolores debitis eveniet. Commodi assumenda officiis dolorem illo suscipit. Voluptatem vero odio laboriosam nihil.', 'Dolor et autem voluptatum sunt. Ab voluptatum qui ut aspernatur harum.', 'Sed est dolor eum voluptate officiis ea.', 1, 'Et labore.', '2014-02-03 16:13:10', '1977-04-05 02:07:15', 0),
(152, 'ut', 2, 22, 47, NULL, 5, 16512.00, 14512.00, 2.00, 10.00, 1, 'Omnis asperiores maiores ea aliquam. Nihil quisquam velit perspiciatis provident molestias deleniti eius.', 'Dolores est ut neque est aut. Assumenda neque ut sed porro.', 'Est sit rem sequi rerum consectetur unde.', 1, 'Sit.', '1991-02-06 04:41:30', '1971-04-26 22:22:14', 0),
(153, 'omnis', 2, 22, 47, NULL, 6, 25149.00, 23149.00, 3.00, 10.00, 1, 'Dolorem atque sunt dolor omnis aut. Occaecati deserunt molestias dolorem aspernatur ex. Sit perferendis voluptatem blanditiis quisquam voluptas. Quam et labore nihil amet rerum repudiandae debitis.', 'Dicta voluptas rerum id omnis corporis ut tempora. Facere pariatur et nam itaque.', 'Sit ab velit nihil et architecto aut.', 1, 'Veniam id.', '2017-08-15 04:31:42', '1993-05-01 06:27:40', 0),
(154, 'et', 2, 22, 47, NULL, 8, 13072.00, 11072.00, 1.00, 5.00, 1, 'Quae explicabo in voluptatem. Laboriosam odio vel vel dolorem consequatur maiores. Beatae et et voluptatem autem temporibus.', 'Assumenda facere et maiores. Ut aut doloribus deleniti deleniti.', 'Quis asperiores in quas voluptas.', 1, 'Eligendi.', '1993-01-03 20:33:26', '2008-06-07 01:50:40', 0),
(155, 'temporibus', 2, 22, 48, NULL, 4, 23325.00, 21325.00, 5.00, 10.00, 1, 'Sunt distinctio labore similique enim velit. Quis pariatur a perferendis velit iste ut quod animi. Qui ut voluptas ex autem optio enim sit.', 'Qui asperiores illum dolor et modi aut. Nesciunt dolores veniam alias praesentium ut accusantium.', 'Porro modi pariatur iure dolor.', 1, 'Id.', '1971-08-07 08:37:18', '1970-02-28 07:08:21', 0),
(156, 'aut', 2, 22, 48, NULL, 1, 7775.00, 5775.00, 2.00, 10.00, 1, 'Vel quia ipsam voluptatem est dolor esse. Velit voluptatum amet quis et. Exercitationem molestiae assumenda dolor veniam veniam ut. Amet aut possimus incidunt accusantium aut aut.', 'Nihil maiores et quo. Non qui ipsam atque et. Aperiam dolorem vitae veniam excepturi qui.', 'Dolor consectetur ea neque rerum aut.', 1, 'Quo.', '1989-11-01 00:01:42', '1981-04-23 09:33:40', 0),
(157, 'dolorem', 2, 22, 48, NULL, 3, 26838.00, 24838.00, 3.00, 5.00, 0, 'Distinctio earum aut aliquam libero ducimus et. Voluptates doloribus et voluptatem. Quo impedit totam atque deserunt.', 'Ea eum qui facilis nisi et illo sequi. Omnis aperiam et odit consectetur eos.', 'Porro et corporis ullam doloremque.', 1, 'Illo.', '1991-10-07 05:35:25', '1974-05-25 23:21:51', 0),
(158, 'illo', 2, 22, 48, NULL, 3, 29158.00, 27158.00, 3.00, 10.00, 1, 'Repudiandae commodi numquam quia culpa est sunt sequi. Sit dolor vel nihil quae.', 'Incidunt animi id et recusandae. Illum enim sapiente ad sequi maiores ut.', 'Aut sit similique magni dicta aut rerum incidunt.', 1, 'Eum quo.', '1993-05-14 00:47:12', '1998-10-13 06:44:44', 0),
(159, 'quos', 2, 22, 47, NULL, 4, 25427.00, 23427.00, 3.00, 10.00, 1, 'Tempore quos ut quisquam. Repudiandae eum molestiae vel maiores omnis. Qui soluta sint dolor voluptatibus ad explicabo. Et aliquam doloribus voluptate corporis.', 'Velit minus eius et est. Laudantium quis incidunt excepturi ut eligendi esse ullam.', 'Facere nihil voluptatem natus impedit non labore.', 1, 'Dicta.', '1979-10-06 04:53:50', '2007-08-05 12:07:36', 0),
(160, 'expedita', 2, 22, 48, NULL, 3, 16094.00, 14094.00, 4.00, 10.00, 0, 'Ut vitae ex qui odio. Quia sunt est voluptatibus. Ullam cum consectetur necessitatibus officiis dolores natus deleniti. Fuga reiciendis eius dignissimos animi.', 'Pariatur ipsam et qui sequi esse assumenda molestiae autem. Et nihil est vel fuga.', 'Quod reiciendis maiores recusandae id optio.', 1, 'Sapiente.', '1978-10-27 17:18:03', '1971-08-03 11:43:49', 0),
(161, 'nam', 2, 22, 47, NULL, 10, 19082.00, 17082.00, 0.00, 10.00, 0, 'Officia ratione aliquam quod officiis aliquid. Velit occaecati provident qui optio vitae optio ipsam.', 'Unde a laboriosam ut. Nulla quasi autem sequi. Eum occaecati nemo possimus totam vitae nam.', 'Nobis unde minus et eligendi.', 1, 'Quam et.', '1991-10-05 18:38:30', '2012-02-20 00:38:46', 0),
(162, 'ratione', 2, 22, 48, NULL, 4, 21134.00, 19134.00, 2.00, 10.00, 0, 'Esse voluptatem consequatur ut tempore et. Vero id quia architecto est eligendi. Est officiis est ut tempore dolorum eos totam.', 'In aut qui doloremque quia perferendis. Non est quia minima ut.', 'Est impedit labore et et sit consequuntur.', 1, 'Dolorum.', '2004-04-18 02:44:36', '1996-11-15 05:45:44', 0),
(163, 'rerum', 2, 22, 47, NULL, 2, 28986.00, 26986.00, 1.00, 5.00, 1, 'Blanditiis accusamus et et rerum. Laboriosam magnam modi consequatur distinctio nemo in. Quis sunt eaque architecto qui architecto minima.', 'Culpa consequuntur ut et expedita asperiores rem. Ad qui ea sed expedita quia.', 'Officiis sunt fuga et minus.', 1, 'Corrupti.', '2009-03-13 11:47:29', '2004-07-17 20:53:00', 0),
(164, 'explicabo', 2, 22, 48, NULL, 9, 28565.00, 26565.00, 3.00, 5.00, 0, 'Omnis nihil iusto est libero esse. Consequatur necessitatibus assumenda atque dolorum. Vero sed omnis ut cum enim est.', 'Eius tempora eum debitis corporis. Qui odit temporibus quidem accusamus aperiam nulla id.', 'Illo voluptas sapiente fuga reprehenderit.', 1, 'Sed.', '2008-06-14 03:43:52', '1975-06-12 15:40:20', 0),
(165, 'nulla', 2, 22, 48, NULL, 6, 11343.00, 9343.00, 0.00, 10.00, 1, 'Hic nihil laboriosam laudantium a voluptas. Sapiente sed eveniet et eaque consequatur. Omnis delectus tempora quia aliquid sed sunt voluptatem. Facere quas ex quam consequuntur autem.', 'Ut vel ab et quidem facilis. Culpa quo quibusdam sed rerum. Tenetur itaque facere ut fugit dolorem.', 'Qui eos sunt cum. Est delectus dolorem et ipsum.', 1, 'Dolor et.', '2009-04-29 03:13:49', '2003-05-22 15:49:19', 0),
(166, 'ea', 2, 22, 47, NULL, 1, 27468.00, 25468.00, 0.00, 10.00, 0, 'Ea earum reprehenderit molestiae est distinctio officia et. Dolorum quidem autem sint non. Vero vero natus aut eos. Delectus sed accusantium ut quaerat id.', 'At similique velit eos in. Ipsam velit consequuntur quaerat. Cum qui modi dolores.', 'Exercitationem eum aut voluptate.', 1, 'Qui.', '1990-11-24 18:24:23', '1994-12-11 20:30:11', 0),
(167, 'praesentium', 2, 22, 47, NULL, 3, 10511.00, 8511.00, 4.00, 5.00, 0, 'Reprehenderit saepe molestiae itaque et aut temporibus. Quia nostrum incidunt aliquid nesciunt velit. Molestiae atque consectetur voluptatibus in tempora qui dolorem.', 'Aut explicabo ut et ipsa tempore expedita qui. Molestiae voluptas dolorem qui.', 'Ducimus dolores eos in ad vel mollitia.', 1, 'Expedita.', '1980-08-22 13:32:07', '2003-06-02 04:36:31', 0),
(168, 'corporis', 2, 22, 48, NULL, 4, 6615.00, 4615.00, 2.00, 10.00, 1, 'Sunt commodi repudiandae perspiciatis. Ea voluptas quo quo deleniti quia soluta error. Repellendus vero explicabo et architecto minus est deleniti. Est ad velit et deserunt.', 'Accusamus quia iste quis odio ad. Animi animi sit et soluta vitae. Id sunt at id dicta.', 'Et non quis aut natus.', 1, 'Id non.', '1972-05-10 06:27:23', '1995-07-26 14:36:33', 0),
(169, 'unde', 2, 22, 47, NULL, 7, 21695.00, 19695.00, 3.00, 5.00, 0, 'Quia ipsam qui repellat. Et in qui iusto sed in. Odio suscipit omnis corrupti aut.', 'Voluptates nemo et et voluptatem fuga quas. Labore quidem magni possimus tenetur.', 'Officia rerum deleniti sit.', 1, 'Tenetur.', '2015-04-23 13:41:24', '2007-03-23 22:20:47', 0),
(170, 'fugit', 2, 22, 47, NULL, 1, 22158.00, 20158.00, 2.00, 5.00, 1, 'Et mollitia et et sint sed enim. Rerum officiis dicta sit nemo tenetur cumque.', 'A eum sed soluta mollitia quod consequuntur dolorem aut. Unde ut libero ducimus dolore officia et.', 'Quo quo error quas aut saepe dolores.', 1, 'Nihil.', '2006-10-17 03:13:24', '2002-11-18 07:23:56', 0),
(171, 'odio', 2, 22, 47, NULL, 3, 23035.00, 21035.00, 3.00, 5.00, 0, 'Sint eveniet ut quos perspiciatis ex. Impedit atque enim aspernatur rem. Vel est qui sapiente quam autem perferendis esse.', 'Quae quaerat ullam modi modi alias rerum. Sed consequuntur qui voluptas aliquid. Est eius aut at.', 'Consequatur ipsam quae debitis.', 1, 'Beatae ut.', '2008-10-18 22:15:49', '1988-10-30 06:23:39', 0),
(172, 'ea', 2, 22, 48, NULL, 8, 10468.00, 8468.00, 3.00, 5.00, 0, 'Dolores inventore libero odit. Et veniam hic pariatur et. Quasi necessitatibus dolor labore architecto blanditiis.', 'Fugit voluptate sunt minus rem. Laboriosam error qui explicabo in.', 'Pariatur et nostrum et et ea minus dolor.', 1, 'Ea neque.', '2008-08-17 21:14:21', '2012-10-02 18:00:06', 0),
(173, 'sit', 2, 22, 47, NULL, 8, 29975.00, 27975.00, 4.00, 10.00, 1, 'Facere corporis enim itaque aut ut. Et qui est praesentium alias expedita odio.', 'Aut ullam dolore sit nihil. Ut a dolorem et voluptatem. Quod soluta at ut est voluptas fuga earum.', 'Ex maxime sunt facere sint iure.', 1, 'Omnis.', '2005-06-28 11:43:44', '2004-04-05 07:12:32', 0),
(174, 'cupiditate', 2, 22, 47, NULL, 3, 27971.00, 25971.00, 5.00, 5.00, 0, 'Ipsa optio ex est nemo. Autem corporis sint eaque provident vel quam. Qui nemo tenetur quae in omnis amet sapiente quia.', 'Laudantium excepturi sed et. Incidunt aperiam qui consectetur officiis quaerat minus ipsum.', 'Nihil beatae eos eum quia maiores perspiciatis.', 1, 'Saepe sed.', '2004-02-24 13:44:42', '1982-06-14 07:05:14', 0),
(175, 'sequi', 2, 22, 47, NULL, 6, 11275.00, 9275.00, 4.00, 10.00, 0, 'Autem enim vitae suscipit neque. Autem ab quidem voluptatem. Rerum modi beatae placeat sed et assumenda. Omnis dignissimos accusamus facilis dolorem nulla aliquid.', 'Commodi nemo pariatur dignissimos aut quis. Natus sit et aut minima repellendus ad.', 'Et cumque officiis eum.', 1, 'Qui et.', '1997-04-15 13:18:40', '1993-06-10 15:08:20', 0),
(176, 'eligendi', 2, 22, 47, NULL, 8, 27828.00, 25828.00, 5.00, 5.00, 0, 'Sit tenetur voluptas debitis fugit in. Natus provident accusamus consequatur reiciendis optio.', 'Omnis nemo est minus commodi enim quasi voluptatem. Ut assumenda est ipsam voluptatum.', 'Ut delectus tempore voluptatibus.', 1, 'Et.', '2005-10-13 00:15:48', '2017-04-12 10:44:19', 0),
(177, 'deserunt', 2, 22, 47, NULL, 2, 24716.00, 22716.00, 4.00, 5.00, 0, 'Sapiente aspernatur perferendis sit. Est non corrupti ipsum culpa sint. Id vel nesciunt non nulla temporibus. Est reiciendis quia facere id maiores quis. Nihil aut aut provident sed nesciunt.', 'Ea adipisci eos non animi ad velit voluptas et. Blanditiis qui et aut error omnis dolorem.', 'Et minus in omnis culpa sint eius quo neque.', 1, 'Sapiente.', '1973-09-05 16:13:45', '1977-02-02 21:22:16', 0),
(178, 'laudantium', 2, 22, 48, NULL, 3, 14334.00, 12334.00, 4.00, 10.00, 1, 'Ut assumenda omnis natus. Nobis necessitatibus suscipit dolorem voluptatibus sit. Repudiandae veniam provident porro possimus sequi quo debitis. Suscipit est laboriosam dicta.', 'Dolores qui vel ipsum. Enim hic libero non quis velit. Ut iusto ut quis in fugiat ea.', 'Sunt soluta in aut atque.', 1, 'Mollitia.', '2000-07-03 17:45:46', '1989-01-10 05:21:30', 0),
(179, 'sit', 2, 22, 47, NULL, 5, 13050.00, 11050.00, 0.00, 5.00, 1, 'Officiis placeat quia ullam est. Aut nesciunt sunt voluptas ea magni et qui. Harum qui fugiat beatae dolorem nihil ipsam omnis aut. Totam aperiam quia ut dicta repudiandae nesciunt.', 'Labore accusantium et molestias. Voluptatem nobis voluptate et sit.', 'Accusantium fuga expedita deserunt odio aperiam.', 1, 'Velit.', '1992-03-25 09:18:07', '2008-09-22 14:57:33', 0),
(180, 'omnis', 2, 22, 48, NULL, 5, 11275.00, 9275.00, 5.00, 10.00, 1, 'Ea deserunt eos consectetur eveniet. Quis eum est aut tempore totam repellendus ipsum. Velit tempora eveniet et facere nemo quibusdam.', 'Rerum inventore autem voluptas nemo laborum. Vero error autem quia veniam quia numquam.', 'Dolor quidem saepe nam nihil.', 1, 'Aut odio.', '1999-07-26 01:40:12', '1979-03-19 16:33:37', 0),
(181, 'accusantium', 5, 21, 45, NULL, 10, 4619.00, 4419.00, 5.00, 10.00, 0, 'Libero dolor nam expedita et velit repudiandae. Laborum cumque et alias perferendis nemo eos. Culpa eligendi porro error ea assumenda et magnam. Repellat odio illo placeat quos deserunt ad occaecati.', 'Blanditiis earum beatae rerum distinctio. Illo alias molestias qui blanditiis sunt aut.', 'Ab corporis iure quidem impedit.', 1, 'Voluptas.', '2002-02-11 13:37:30', '1976-07-16 09:46:44', 0),
(182, 'autem', 5, 18, 43, NULL, 5, 1971.00, 1771.00, 3.00, 5.00, 0, 'Quo quasi ipsum eos rem. Id dolores facilis dolores necessitatibus voluptas. Illo qui excepturi iusto ut eaque fuga. Maiores accusantium quos numquam.', 'Laborum itaque ut quia autem sequi culpa culpa sequi. Aut aut est consequatur ad adipisci et.', 'Eaque rerum enim occaecati illo quos quasi.', 1, 'Nisi est.', '1998-11-12 16:26:08', '1983-09-15 05:06:47', 0),
(183, 'deleniti', 5, 20, 41, NULL, 7, 3275.00, 3075.00, 1.00, 10.00, 1, 'Necessitatibus fugit consequatur itaque commodi. Quidem voluptatibus et est nisi dolore. Numquam impedit repellendus ratione perspiciatis itaque beatae.', 'Ullam saepe eos rerum sunt et. Eaque nemo non fugiat officiis doloribus libero aliquam.', 'Rem expedita vero sint.', 1, 'Quo.', '1995-11-08 06:26:13', '1988-10-17 12:10:54', 0),
(184, 'sit', 5, 21, 44, NULL, 2, 1062.00, 862.00, 5.00, 5.00, 0, 'Consectetur minus reprehenderit quis quo et beatae. Sed repudiandae maiores minima dolor dolor nulla et. Est sed fugiat eos quia qui. Inventore hic voluptates enim et ipsum.', 'Repudiandae doloribus et sunt magni omnis. Eos quam provident inventore sequi natus odit officiis.', 'Ducimus deserunt aut voluptatem nihil accusamus.', 1, 'Facere.', '1975-11-06 12:41:35', '1971-07-24 01:54:27', 0),
(185, 'enim', 5, 18, 40, NULL, 5, 3615.00, 3415.00, 2.00, 10.00, 1, 'Quaerat autem odit eos optio perferendis quo. Reiciendis est illo sit necessitatibus rerum. Omnis numquam et iste non facilis aperiam. Labore a aut aut numquam.', 'Consequatur sit qui enim alias vero harum necessitatibus. Repudiandae ipsum enim perferendis magni.', 'Id rem reprehenderit ab et.', 1, 'Quo.', '1992-10-31 07:24:43', '1981-10-25 12:52:14', 0),
(186, 'explicabo', 5, 20, 45, NULL, 5, 3982.00, 3782.00, 2.00, 5.00, 1, 'Officiis ut harum non rem voluptatum eos culpa. Omnis nesciunt itaque consequatur. Provident officiis dolor accusantium. Veritatis impedit itaque laboriosam impedit.', 'Iure molestiae ipsa harum eos. Ad temporibus hic amet qui. In vel dolores est alias alias.', 'Rerum dolore qui assumenda id possimus.', 1, 'Illo.', '1974-08-23 14:45:08', '2002-03-23 20:05:13', 0),
(187, 'voluptatem', 5, 21, 40, NULL, 2, 3207.00, 3007.00, 2.00, 10.00, 1, 'Voluptatem quidem nihil culpa non. Et quisquam molestiae tempore est dolores. Aliquid illum aspernatur enim ipsum enim id. Nobis aspernatur quo voluptate ipsam culpa sapiente.', 'Sed omnis voluptas quibusdam aut inventore ut sed. Nostrum eum deserunt minima ipsa.', 'Iure facilis error eum molestias.', 1, 'At ad.', '2010-10-24 09:08:52', '1980-11-25 20:12:25', 0),
(188, 'perspiciatis', 5, 18, 40, NULL, 4, 3240.00, 3040.00, 0.00, 10.00, 1, 'Consectetur quam quasi voluptate temporibus laborum mollitia. Vitae blanditiis sunt corporis consequuntur accusantium dolores. Sequi quidem quae vel ut velit magnam laborum.', 'Dolores eius cumque aspernatur molestiae. Soluta quo officiis ipsa ut. Quae qui quidem rem.', 'Dolores reiciendis voluptatem aut molestias.', 1, 'Dolorum.', '2014-10-30 19:29:06', '2011-04-16 08:36:53', 0),
(189, 'sed', 5, 18, 43, NULL, 8, 666.00, 466.00, 3.00, 5.00, 0, 'Quia harum amet dolorum ullam reprehenderit sed. Est id dolor eos non eum. Non ullam vitae magni similique beatae hic itaque.', 'Vero non provident eligendi. Minima est velit culpa. Est enim ad deserunt minima.', 'Ut officia quam saepe in aut enim in.', 1, 'Commodi.', '1999-06-05 09:47:43', '2012-01-01 11:17:56', 0),
(190, 'pariatur', 5, 18, 41, NULL, 6, 3032.00, 2832.00, 0.00, 10.00, 1, 'Odio rerum eum labore non omnis recusandae. Officia voluptates recusandae maxime dolores debitis laborum. Tempore ut vel sint quia porro vitae quia.', 'Dicta ut magnam enim sed. Voluptatibus facilis recusandae cupiditate dolor dolores quo ut.', 'Autem eius fuga sed voluptates qui aut ad.', 1, 'Dolores.', '2004-04-08 15:32:16', '1983-05-31 07:22:08', 0),
(191, 'porro', 5, 21, 41, NULL, 10, 1507.00, 1307.00, 5.00, 5.00, 1, 'Qui omnis modi rerum omnis odit est. Optio et soluta perspiciatis voluptatem. Culpa laboriosam sunt nihil assumenda rerum id repellendus.', 'Dolorum et est necessitatibus. Autem ab commodi modi. Iure vel ea ex qui perspiciatis.', 'Saepe tempora est amet ipsa quis adipisci qui.', 1, 'Amet.', '2010-08-27 23:17:20', '2008-02-06 20:05:09', 0),
(192, 'ut', 5, 20, 39, NULL, 10, 2593.00, 2393.00, 4.00, 5.00, 0, 'Pariatur praesentium natus minima quam vitae nostrum a. Et velit veritatis dolor facere tempora. Et quis voluptates ipsum voluptatem qui.', 'Facilis maiores delectus sed possimus ex. Magni quasi qui fugiat provident repudiandae hic.', 'Expedita qui quae qui rerum quae.', 1, 'Est.', '1976-03-05 03:34:13', '1997-11-16 03:53:14', 0),
(193, 'aut', 5, 20, 42, NULL, 3, 4550.00, 4350.00, 1.00, 10.00, 1, 'Dolores sed veritatis ut quae beatae dolorem. Culpa dolores illum sint voluptatem vitae placeat. Incidunt nesciunt voluptatem nihil aut. Nihil et incidunt accusantium quo ad quia alias fugiat.', 'Perspiciatis doloremque quia voluptatem. Ipsam aliquid qui vitae expedita quia.', 'Alias sit ut quam eaque omnis.', 1, 'Tempore.', '1993-07-23 10:07:31', '1989-10-08 13:38:34', 0),
(194, 'nihil', 5, 18, 40, NULL, 2, 4931.00, 4731.00, 2.00, 5.00, 1, 'Aperiam est quibusdam explicabo occaecati minus vel enim quia. Qui repellat nihil ut hic repudiandae sequi. Id et nihil est optio mollitia.', 'Omnis aliquid nesciunt soluta et. Eaque deleniti quia repellat eos exercitationem molestiae veniam.', 'Id unde quia excepturi aliquam.', 1, 'Ut.', '1973-05-18 15:17:50', '2007-11-11 07:32:25', 0),
(195, 'hic', 5, 21, 42, NULL, 6, 2635.00, 2435.00, 5.00, 10.00, 0, 'Quae suscipit nemo ipsum. Voluptatem ullam quis et. Aut maiores ratione natus.', 'Sit reiciendis enim consequatur quas cum sit omnis et. Et cum unde nam.', 'Omnis molestiae ea laborum commodi corrupti sed.', 1, 'Inventore.', '1976-03-06 12:30:30', '1997-03-16 03:55:44', 0),
(196, 'exercitationem', 5, 21, 40, NULL, 5, 2029.00, 1829.00, 5.00, 10.00, 0, 'Enim dignissimos recusandae labore sit. Totam velit esse eligendi beatae animi at. Saepe blanditiis at numquam inventore temporibus impedit quia. Blanditiis temporibus qui et incidunt.', 'Commodi deleniti temporibus quae eum non. Eligendi cupiditate est velit ut vitae nisi tempore.', 'Consectetur molestiae aliquam nemo eaque harum.', 1, 'Et.', '2015-02-05 11:26:24', '2013-06-04 11:17:08', 0),
(197, 'quam', 5, 21, 44, NULL, 2, 4313.00, 4113.00, 1.00, 10.00, 0, 'Mollitia fugit sint aliquid ipsum cupiditate ea tenetur. Delectus facilis sint nulla veniam iure neque. Reprehenderit aut magnam laborum et quia.', 'Qui tempora qui provident. Atque in quaerat accusantium sequi unde adipisci.', 'Consequatur ratione commodi ipsum.', 1, 'Commodi.', '1984-09-26 13:33:32', '1991-12-25 16:32:43', 0),
(198, 'harum', 5, 19, 43, NULL, 4, 2510.00, 2310.00, 4.00, 10.00, 1, 'Maiores voluptas vel ex. Recusandae aut distinctio iusto nulla illo qui quia. Quo expedita dolorem sed ut inventore unde maxime. Accusamus eum suscipit et officia ea quia doloremque.', 'Id rerum qui facere rerum qui. Corrupti quia eligendi ducimus. At quasi eius quia at quis.', 'Ratione voluptates dolores et itaque doloremque.', 1, 'Eum unde.', '1970-06-25 11:41:31', '2008-07-26 19:57:21', 0),
(199, 'debitis', 5, 20, 41, NULL, 1, 4018.00, 3818.00, 2.00, 10.00, 1, 'Voluptatem quidem error qui. Consectetur iste quis qui recusandae. Quos repudiandae qui velit nesciunt dolorem ad amet. Voluptatem dolorem hic consequatur dolore.', 'Temporibus quod nostrum ratione. Omnis cupiditate saepe quia. Odit quibusdam ut est beatae hic.', 'Adipisci magni voluptatem debitis et reiciendis.', 1, 'Occaecati.', '1975-03-04 21:57:30', '1987-07-31 14:36:16', 0),
(200, 'dolorem', 5, 19, 39, NULL, 9, 536.00, 336.00, 2.00, 10.00, 1, 'Voluptatem consequuntur eos eos. Qui ab ut optio minus atque nisi. Quibusdam asperiores qui mollitia. Aut laborum nam quia delectus nam. Voluptas itaque et culpa ut in qui. Cum voluptas et et.', 'Ducimus doloribus accusantium sint. Eveniet dolor qui eos voluptas asperiores incidunt facere.', 'Ut magnam consequuntur consectetur voluptas.', 1, 'Ex.', '1992-04-20 06:42:00', '2015-07-08 12:27:16', 0),
(201, 'corrupti', 5, 20, 44, NULL, 3, 4486.00, 4286.00, 2.00, 10.00, 0, 'Reprehenderit eligendi itaque consequuntur. Quam maxime architecto voluptas. Debitis beatae aut autem et ab. Quidem eum nobis rerum sed ex porro et.', 'Nobis at sed magnam nihil. Quo autem atque consequatur est quia. Ut nisi odio fugit distinctio.', 'Nulla hic non eos voluptatum.', 1, 'Voluptas.', '1986-10-19 03:49:54', '1992-04-15 11:02:28', 0),
(202, 'dicta', 5, 19, 44, NULL, 3, 1228.00, 1028.00, 3.00, 5.00, 1, 'Voluptates odio porro sed aperiam omnis nobis sed rerum. Ullam et voluptatem sit sint maxime provident et. Sint nulla nihil delectus rem.', 'Veritatis earum facere tempore vitae aspernatur adipisci. Consectetur quos repellat voluptatum.', 'Perspiciatis omnis quia aut.', 1, 'Adipisci.', '2019-02-27 23:42:21', '2019-03-26 03:40:48', 1),
(203, 'consequuntur', 5, 19, 40, NULL, 5, 3629.00, 3429.00, 4.00, 10.00, 1, 'Assumenda harum nostrum error similique velit rem quod. Vitae cum vel laborum. Dolore et dolor consequatur dolores. Quas fugit ea minima dolores quas.', 'Minus hic laborum vero ratione quis. Sed omnis est quidem aut praesentium.', 'Unde nihil est ducimus minus voluptates aut.', 1, 'Possimus.', '2015-01-19 23:45:22', '2015-03-22 21:37:20', 0),
(204, 'dolorem', 5, 20, 42, NULL, 9, 2605.00, 2405.00, 4.00, 10.00, 1, 'Recusandae deleniti corrupti qui iste quas dicta. Sed consequatur itaque commodi architecto pariatur.', 'Voluptatibus quod quisquam aut velit vel odit. Voluptas quod rem quia.', 'Ad consequatur quo iure sit et molestiae ut.', 1, 'Quibusdam.', '1992-04-20 14:31:44', '1978-03-25 03:55:51', 0),
(205, 'recusandae', 5, 21, 45, NULL, 3, 4639.00, 4439.00, 3.00, 10.00, 1, 'Optio excepturi recusandae qui itaque distinctio dolorum. Sunt minima quae rerum molestiae. Commodi odio quia officia placeat ut nostrum delectus ipsa.', 'Non sit non id doloremque. Dolore et quis nesciunt distinctio est.', 'Accusamus fuga tempora at perspiciatis iste est.', 1, 'Rerum.', '2000-06-05 00:42:10', '1992-05-22 02:37:11', 0),
(206, 'quasi', 5, 19, 39, NULL, 4, 3151.00, 2951.00, 2.00, 10.00, 1, 'Occaecati et dicta dolorum omnis non. Ratione laborum voluptas illo exercitationem.', 'Porro et nobis consequatur libero. Quas et hic blanditiis et provident sit voluptatibus.', 'Officia dolores voluptas est ducimus a optio vel.', 1, 'Doloribus.', '1979-03-25 20:33:52', '1998-01-03 04:07:21', 0),
(207, 'ducimus', 5, 19, 40, NULL, 5, 2598.00, 2398.00, 3.00, 10.00, 0, 'Et saepe omnis sit omnis est placeat atque non. Est commodi id non vel aliquid. Optio modi fuga voluptas amet. Repellat reiciendis et et animi excepturi velit.', 'Maxime nemo asperiores voluptas. Ipsam magnam non accusantium. Cum est dolor molestiae deleniti.', 'Eum qui aut et corporis consectetur est.', 1, 'Eaque qui.', '2000-05-03 17:49:55', '2010-07-30 19:19:43', 0),
(208, 'aut', 5, 18, 43, NULL, 4, 3547.00, 3347.00, 4.00, 10.00, 1, 'Minima harum quia quidem excepturi commodi est hic. Et delectus et possimus sint. Ipsam perspiciatis repudiandae repudiandae sed inventore. Et velit explicabo unde in ipsam.', 'Numquam dolores cumque voluptate. Qui laboriosam non qui sunt.', 'Nam quia minus illo placeat vero.', 1, 'In.', '1978-11-05 11:21:49', '2002-11-20 00:55:04', 0),
(209, 'hic', 5, 21, 39, NULL, 5, 2225.00, 2025.00, 4.00, 10.00, 1, 'Atque dolores nobis non ut qui deserunt. Deleniti aspernatur doloribus mollitia sunt. Amet enim repudiandae voluptates ut unde possimus nesciunt. Animi esse sint cumque et provident voluptatum.', 'Neque saepe ad qui voluptates. Aut aliquid quidem excepturi ducimus assumenda.', 'Quam soluta eos voluptatem sequi atque iusto.', 1, 'Ipsa ut.', '1987-08-11 09:25:36', '1970-09-04 16:56:07', 0),
(210, 'iusto', 5, 18, 43, NULL, 2, 2889.00, 2689.00, 4.00, 10.00, 0, 'Similique quibusdam quos incidunt velit. Quis asperiores ut temporibus delectus omnis aliquam. Et id dolor velit quo vitae quis voluptates. Odit consequuntur repellendus aut.', 'Est sed architecto quibusdam. Qui maxime officiis reiciendis ratione.', 'Fugiat impedit ut rem sed magnam labore aut.', 1, 'Repellat.', '2015-03-17 06:26:42', '2006-02-18 14:14:08', 0),
(211, 'X style', 6, 23, 49, 9, 5, 500.00, 300.00, 5.00, 10.00, 1, '<ul><li>dfdfklsdjfklj</li><li>sdfsdkjfkldsjfls</li><li>dfjdksjfklsjd</li></ul>', '<ul><li>dfdskjfkajskf</li><li>dfjdskfjklsdjfka</li><li>fjdklfjalksjf</li><li>dfjdksjfklajdf</li><li>dfjdksjfakljdf</li><li>fjdkfjkdsjf</li></ul>', '<ol><li><strong>fdfdkjfkldsj</strong></li><li>adsfjkdsjfksaj</li><li>dsfjdkljfkd<br></li></ol>', NULL, NULL, '2019-03-27 02:17:56', '2019-03-27 02:22:13', 1),
(212, 'admin', 6, 23, 50, 0, 5, 60000.00, 50000.00, 10.00, NULL, 1, 'defgdsf', 'sdfsdf', 'fsdsfsd', NULL, NULL, '2019-03-27 04:11:43', '2019-03-27 04:11:43', 0),
(213, 'admin', 6, 23, 50, 0, 5, 60000.00, 50000.00, 10.00, NULL, 1, 'defgdsf', 'sdfsdf', 'fsdsfsd', NULL, NULL, '2019-03-27 04:12:32', '2019-03-27 04:12:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 5, 'red', NULL, NULL),
(2, 5, 'yellow', NULL, NULL),
(3, 1, 'red', NULL, NULL),
(4, 1, 'green', NULL, NULL),
(5, 211, 'red', NULL, NULL),
(6, 211, 'blue', NULL, NULL),
(7, 211, 'green', NULL, NULL),
(8, 213, 'a', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 5, 'small', NULL, NULL),
(2, 5, 'medium', NULL, NULL),
(3, 1, 'l', NULL, NULL),
(4, 1, 'm', NULL, NULL),
(5, 211, '7', NULL, NULL),
(6, 211, '8', NULL, NULL),
(7, 211, '9', NULL, NULL),
(8, 213, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_color_default` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#fedc19',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_color`, `app_color_default`, `created_at`, `updated_at`) VALUES
(1, '#57c58b', '#fedc19', '2019-03-25 04:29:02', '2019-03-25 04:29:02'),
(4, '#aa3939', '#fedc19', '2019-03-25 04:47:05', '2019-03-25 04:47:05'),
(5, '#3dd58e', '#fedc19', '2019-03-25 05:05:09', '2019-03-25 05:05:09'),
(6, '#0fe5c8', '#fedc19', '2019-03-25 05:22:01', '2019-03-25 05:22:01'),
(7, '#fedc19', '#fedc19', '2019-03-26 04:05:50', '2019-03-26 04:05:50'),
(8, '#6beee0', '#fedc19', '2019-03-26 22:49:22', '2019-03-26 22:49:22'),
(9, '#ffac55', '#fedc19', '2019-03-26 22:50:27', '2019-03-26 22:50:27'),
(10, '#60e856', '#fedc19', '2019-03-27 02:29:54', '2019-03-27 02:29:54'),
(11, '#fa8383', '#fedc19', '2019-03-27 02:31:56', '2019-03-27 02:31:56'),
(12, '#ffe91d', '#fedc19', '2019-03-27 06:46:26', '2019-03-27 06:46:26'),
(13, '#e31c1c', '#fedc19', '2019-03-29 23:25:01', '2019-03-29 23:25:01'),
(14, '#ff6767', '#fedc19', '2019-03-29 23:25:38', '2019-03-29 23:25:38'),
(15, '#ffe700', '#fedc19', '2019-03-29 23:34:36', '2019-03-29 23:34:36'),
(16, '#fedc19', '#fedc19', '2019-03-29 23:38:24', '2019-03-29 23:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `name`, `cost`, `created_at`, `updated_at`) VALUES
(2, 'Inside Dhaka', 60.00, '2019-03-03 03:02:50', '2019-03-03 03:02:50'),
(5, 'Outside Dhaka', 120.00, '2019-03-03 03:05:11', '2019-03-03 03:05:11'),
(6, 'Pinjira Office Collection', 0.00, '2019-03-03 03:05:26', '2019-03-03 03:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `single_ads`
--

CREATE TABLE `single_ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `single_ads`
--

INSERT INTO `single_ads` (`id`, `name`, `active`, `note`, `created_at`, `updated_at`) VALUES
(6, 'mkZlt0UuzzVpEe4Fw7XO.jpg', NULL, NULL, '2019-03-27 06:30:53', '2019-03-27 06:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `mother_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `mother_category_id`, `category_id`, `name`, `active`, `note`, `created_at`, `updated_at`) VALUES
(15, 4, 6, 'iPhone', 1, NULL, NULL, NULL),
(16, 4, 6, 'Nokia', 1, NULL, NULL, NULL),
(17, 4, 7, 'Symphone', 1, NULL, NULL, NULL),
(18, 4, 7, 'Walton', 1, NULL, NULL, NULL),
(19, 4, 8, 'Data Cable', 1, NULL, NULL, NULL),
(20, 4, 8, 'Power Bank', 1, NULL, NULL, NULL),
(21, 2, 9, 'Dell', 1, NULL, NULL, NULL),
(22, 2, 9, 'HP', 1, NULL, NULL, NULL),
(23, 1, 10, 'Led TV', 1, NULL, NULL, NULL),
(24, 1, 10, 'Smart TV', 1, NULL, NULL, NULL),
(25, 1, 11, 'Nikon', 1, NULL, NULL, NULL),
(26, 1, 11, 'Canon', 1, NULL, NULL, NULL),
(27, 1, 11, 'Sony', 1, NULL, NULL, NULL),
(28, 1, 12, 'Home Theator', 1, NULL, NULL, NULL),
(29, 1, 12, 'Multi Sound Box', 1, NULL, NULL, NULL),
(30, 1, 13, 'Air Condition', 1, NULL, NULL, NULL),
(31, 1, 13, 'Air Cooler', 1, NULL, NULL, NULL),
(32, 1, 13, 'IPS', 1, NULL, NULL, NULL),
(33, 2, 16, 'Printer', 1, NULL, NULL, NULL),
(34, 2, 16, 'Monitor', 1, NULL, NULL, NULL),
(35, 2, 16, 'Keyboard', 1, NULL, NULL, NULL),
(36, 2, 16, 'Mouse', 1, NULL, NULL, NULL),
(37, 2, 17, 'XBOX', 1, NULL, NULL, NULL),
(38, 2, 17, 'Controller', 1, NULL, NULL, NULL),
(39, 5, 18, 'Hair Driyer', 1, NULL, NULL, NULL),
(40, 5, 18, 'Hair Strighter', 1, NULL, NULL, NULL),
(41, 5, 19, 'Philips Trimmer', 1, NULL, NULL, NULL),
(42, 5, 19, 'Walton Trimmer', 1, NULL, NULL, NULL),
(43, 5, 20, 'Taitan Primium Watch', 1, NULL, NULL, NULL),
(44, 5, 20, 'Rado Watches', 1, NULL, NULL, NULL),
(45, 5, 21, 'Le Re Ve Shirt', 1, NULL, NULL, NULL),
(46, 5, 21, 'Cat\'s Eye Shirt', 1, NULL, NULL, NULL),
(47, 2, 22, 'DELL Configaration', 1, NULL, NULL, NULL),
(48, 2, 22, 'HP', 1, NULL, NULL, NULL),
(49, 6, 23, 'Boy', 1, NULL, NULL, NULL),
(50, 6, 23, 'Girl', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Bangladesh',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `alt_phone`, `gender`, `email_verified_at`, `password`, `address`, `shipping_address`, `city`, `post_code`, `country`, `image`, `note`, `remember_token`, `created_at`, `updated_at`, `provider`, `provider_id`) VALUES
(3, 2, 'Mustaq Ahmed', 'mustaq@email.com', '3453534511', '222222222', 'male', '2019-02-11 01:40:16', '$2y$10$gQ7qrnLlgPX7Lg4O6jmqOuWwBUSny1HGvOuVuMae4Ki5CKFzb9ibm', 'Bosila, Dhaka, Bangladesh', 'Bosila, Dhaka, Bangladesh', 'Dhaka', '1210', 'Bangladesh', 'pH2c5FyMFCESgMh.jpg', NULL, 'CzrRF6hZLCeSMyD97S3DtRxzqIl6AomLYLbvWBQhClwUpuWh7lvwuijtrKa4', '2019-02-11 01:39:36', '2019-03-12 03:17:46', NULL, NULL),
(4, 1, 'Admin', 'admin@email.com', '1234567890', NULL, 'Choose an option', NULL, '$2y$10$d0nx2Z2pic6OMN2HmajVB.jcibI4opy9xLDX1zwQ1A9QaxSCvcpEW', 'Dhaka', 'Dhaka', 'Dhaka', '1000', 'Bangladesh', NULL, NULL, 'IlP0MbUTRccJOQRJhdLpmHaIf6jd0JndByYLfIFFbwjcOYRYpbnjWZyeAM8Q', '2019-02-11 03:16:40', '2019-02-11 03:16:40', NULL, NULL),
(5, 2, 'titu', 'tttttt@email.com', '3434343434', NULL, 'male', NULL, '$2y$10$JFwtjMDyeSGHNYVcN8OeLeG5yw57aFNNuQaQpJ3sUZm7yFP1ZA5Dm', 'Dhaka', 'Dhaka', 'Dhaka', '1000', 'Bangladesh', NULL, NULL, 'yVqROAGZCNO4UzZJzMX2TytlVLypSTLhBjFJP4sgBhENyi3Nb4TTosLFfz50', '2019-03-11 04:15:27', '2019-03-11 04:15:27', NULL, NULL),
(6, 2, 'Himel Shipu', 'himel@email.com', '01799999999', NULL, 'male', NULL, '$2y$10$Ff8qngwMUjws4d2WYbYZeeraA/pSHu0ApMLoRkAJCTdLMtum9PI0G', 'Mohammadpur, Dhaka, Bangladesh', 'Mohammadpur, Dhaka, Bangladesh', 'Dhaka', '1215', 'Bangladesh', NULL, NULL, '7qLv8jWaREkdfVfQNxv873ujSGH6VKhlg0vXExaiwa8MkoUzUkknkgxnOhj4', '2019-03-11 23:32:15', '2019-03-11 23:32:15', NULL, NULL),
(7, 2, 'Ahmed Shipu', 'subrosumon@yahoo.com', '1762455462', NULL, 'male', NULL, '$2y$10$bXJd.1H6Q1khXCgVnGrP1.IPFxvodYSwvb7qsMQEGTAfDuHCdYA5m', 'Dhaka', 'Dhaka', 'Dhaka', '1000', 'Bangladesh', NULL, NULL, 'DUrHIk3cK10V7oOsTsqFoeu7AaUCMZOI9QNdSsNQODFmAjEhLdsJIEzCvA2c', '2019-03-11 23:42:12', '2019-03-11 23:42:12', NULL, NULL),
(11, 2, 'Mustaque Ahemmed', 'hellomstq@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bangladesh', 'https://lh6.googleusercontent.com/-Gs47Pse-GZw/AAAAAAAAAAI/AAAAAAAAElw/nrTOduzW8vk/photo.jpg', NULL, '8rGbQs0hDz6WBc1msxbeRiqXH64Dr2oux5HBG2Pao8l6Ig6wkTSDQHpCz2lZ', '2019-03-28 00:53:13', '2019-03-28 00:53:13', 'google', '105175924914234479754');

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL,
  `max_uses_user` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_coupons`
--

INSERT INTO `user_coupons` (`id`, `coupon_code`, `discount`, `max_uses_user`, `start_date`, `end_date`, `active`, `created_at`, `updated_at`) VALUES
(10, 'UCST8QK5', 5.00, 1, '2019-03-18 02:00:14', '2019-03-20 03:26:25', 1, '2019-03-18 03:26:28', '2019-03-18 03:26:28'),
(11, 'UCBJM82T', 5.00, 1, '2019-03-27 02:25:18', '2019-03-30 02:25:22', 0, '2019-03-27 02:25:25', '2019-03-27 05:11:28'),
(12, 'UCBN2PFC', 5.00, 2, '2019-03-27 04:51:20', '2019-03-30 04:51:23', 1, '2019-03-27 04:51:27', '2019-03-27 04:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_user_coupon`
--

CREATE TABLE `user_user_coupon` (
  `user_coupon_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_user_coupon`
--

INSERT INTO `user_user_coupon` (`user_coupon_id`, `user_id`, `created_at`, `updated_at`) VALUES
(10, 3, '2019-03-18 03:26:28', '2019-03-18 03:26:28'),
(10, 5, '2019-03-18 03:26:28', '2019-03-18 03:26:28'),
(11, 6, '2019-03-27 02:25:25', '2019-03-27 02:25:25'),
(11, 7, '2019-03-27 02:25:25', '2019-03-27 02:25:25'),
(12, 5, '2019-03-27 04:51:28', '2019-03-27 04:51:28'),
(12, 6, '2019-03-27 04:51:28', '2019-03-27 04:51:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `independent_coupons`
--
ALTER TABLE `independent_coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `independent_coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mother_categories`
--
ALTER TABLE `mother_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `single_ads`
--
ALTER TABLE `single_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `independent_coupons`
--
ALTER TABLE `independent_coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `mother_categories`
--
ALTER TABLE `mother_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `single_ads`
--
ALTER TABLE `single_ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 07:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mfmcfui`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'created', 5, 'App\\User', NULL, NULL, '{\"attributes\":{\"name\":\"Samson Ajibade\",\"email\":\"okeke@gmail.com\"}}', '2019-07-24 10:30:00', '2019-07-24 10:30:00'),
(2, 'default', 'created', 6, 'App\\User', NULL, NULL, '{\"attributes\":{\"name\":\"Goke Demmy\",\"email\":\"dike@gmail.com\"}}', '2019-07-24 10:30:19', '2019-07-24 10:30:19'),
(3, 'default', 'created', 1, 'App\\User', NULL, NULL, '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}}', '2019-07-24 10:33:08', '2019-07-24 10:33:08'),
(4, 'default', 'created', 2, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"}}', '2019-07-24 11:12:55', '2019-07-24 11:12:55'),
(5, 'default', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"}}', '2019-07-24 11:18:19', '2019-07-24 11:18:19'),
(6, 'default', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"}}', '2019-07-24 11:28:49', '2019-07-24 11:28:49'),
(7, 'default', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"}}', '2019-07-24 11:32:47', '2019-07-24 11:32:47'),
(8, 'default', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"}}', '2019-07-24 11:37:53', '2019-07-24 11:37:53'),
(9, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}}', '2019-07-24 11:41:24', '2019-07-24 11:41:24'),
(10, 'default', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"}}', '2019-07-24 11:44:07', '2019-07-24 11:44:07'),
(11, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}}', '2019-07-24 13:26:22', '2019-07-24 13:26:22'),
(12, 'default', 'deleted', 2, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"}}', '2019-07-24 14:59:50', '2019-07-24 14:59:50'),
(13, 'default', 'restored', 2, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"}', '2019-07-24 15:00:58', '2019-07-24 15:00:58'),
(14, 'default', 'deleted', 2, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"}}', '2019-07-24 15:02:22', '2019-07-24 15:02:22'),
(15, 'default', 'restored', 2, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"}', '2019-07-24 15:02:34', '2019-07-24 15:02:34'),
(16, 'default', 'updated', 2, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo\",\"email\":\"tolajide74@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Victor\",\"email\":\"tolajide74@gmail.com\"}}', '2019-07-24 15:10:03', '2019-07-24 15:10:03'),
(17, 'default', 'updated', 2, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo\",\"email\":\"tolajide740@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo\",\"email\":\"tolajide74@gmail.com\"}}', '2019-07-24 15:11:17', '2019-07-24 15:11:17'),
(18, 'default', 'updated', 2, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo\",\"email\":\"tolajide74@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo\",\"email\":\"tolajide740@gmail.com\"}}', '2019-07-24 15:11:34', '2019-07-24 15:11:34'),
(19, 'default', 'created', 3, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"}}', '2019-07-25 08:49:20', '2019-07-25 08:49:20'),
(20, 'default', 'deleted', 3, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"}}', '2019-07-25 09:05:42', '2019-07-25 09:05:42'),
(21, 'default', 'restored', 3, 'App\\User', 1, 'App\\User', '{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"}', '2019-07-25 09:14:21', '2019-07-25 09:14:21'),
(22, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:24:34', '2019-07-25 09:24:34'),
(23, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:25:22', '2019-07-25 09:25:22'),
(24, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:25:30', '2019-07-25 09:25:30'),
(25, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:25:47', '2019-07-25 09:25:47'),
(26, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:26:03', '2019-07-25 09:26:03'),
(27, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:26:37', '2019-07-25 09:26:37'),
(28, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:26:48', '2019-07-25 09:26:48'),
(29, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:28:49', '2019-07-25 09:28:49'),
(30, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}}', '2019-07-25 09:29:02', '2019-07-25 09:29:02'),
(31, 'default', 'view profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:33:08', '2019-07-25 09:33:08'),
(32, 'default', 'view profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:33:34', '2019-07-25 09:33:34'),
(33, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}}', '2019-07-25 09:33:42', '2019-07-25 09:33:42'),
(34, 'default', 'updated profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:33:42', '2019-07-25 09:33:42'),
(35, 'default', 'view profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:33:52', '2019-07-25 09:33:52'),
(36, 'default', 'view profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:37:29', '2019-07-25 09:37:29'),
(37, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"}}', '2019-07-25 09:37:40', '2019-07-25 09:37:40'),
(38, 'default', 'updated profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:37:40', '2019-07-25 09:37:40'),
(39, 'default', 'view profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:38:02', '2019-07-25 09:38:02'),
(40, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}}', '2019-07-25 09:38:47', '2019-07-25 09:38:47'),
(41, 'default', 'updated profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:38:47', '2019-07-25 09:38:47'),
(42, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:38:56', '2019-07-25 09:38:56'),
(43, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"}}', '2019-07-25 09:39:11', '2019-07-25 09:39:11'),
(44, 'default', 'reset password', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:39:21', '2019-07-25 09:39:21'),
(45, 'default', 'view profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:39:29', '2019-07-25 09:39:29'),
(46, 'default', 'updated', 1, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"administrator@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"}}', '2019-07-25 09:39:35', '2019-07-25 09:39:35'),
(47, 'default', 'updated profile', 1, 'App\\User', 1, 'App\\User', '{\"name\":\"Adesina Taiwo\",\"email\":\"administrator@gmail.com\"}', '2019-07-25 09:39:35', '2019-07-25 09:39:35'),
(48, 'default', 'created', 2, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Choir Unit\"}}', '2019-07-25 10:29:43', '2019-07-25 10:29:43'),
(49, 'default', 'created', 3, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Prayer Unit\"}}', '2019-07-25 10:30:14', '2019-07-25 10:30:14'),
(50, 'default', 'created', 4, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Technical Unit\"}}', '2019-07-25 10:30:40', '2019-07-25 10:30:40'),
(51, 'default', 'created', 5, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Ushering Unit\"}}', '2019-07-25 10:30:52', '2019-07-25 10:30:52'),
(52, 'default', 'created', 6, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Organizing Unit\"}}', '2019-07-25 10:31:03', '2019-07-25 10:31:03'),
(53, 'default', 'created', 7, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Welfare Unit\"}}', '2019-07-25 10:31:33', '2019-07-25 10:31:33'),
(54, 'default', 'deleted', 7, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Welfare Unit\"}}', '2019-07-25 10:54:54', '2019-07-25 10:54:54'),
(55, 'default', 'updated', 6, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Organizing Units\"},\"old\":{\"unit_name\":\"Organizing Unit\"}}', '2019-07-25 11:18:35', '2019-07-25 11:18:35'),
(56, 'default', 'updated', 6, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Organizing Unit\"},\"old\":{\"unit_name\":\"Organizing Units\"}}', '2019-07-25 11:18:49', '2019-07-25 11:18:49'),
(57, 'default', 'restored', 7, 'App\\Unit', 1, 'App\\User', '{\"unit_name\":\"Welfare Unit\"}', '2019-07-25 11:25:41', '2019-07-25 11:25:41'),
(58, 'default', 'created', 8, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Visitation Unit\"}}', '2019-07-25 11:28:44', '2019-07-25 11:28:44'),
(59, 'default', 'updated', 1, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Transport Units\"},\"old\":{\"unit_name\":\"Transport Unit\"}}', '2019-07-25 11:30:00', '2019-07-25 11:30:00'),
(60, 'default', 'updated', 1, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Transport Unit\"},\"old\":{\"unit_name\":\"Transport Units\"}}', '2019-07-25 11:30:30', '2019-07-25 11:30:30'),
(61, 'default', 'deleted', 1, 'App\\Unit', 1, 'App\\User', '{\"attributes\":{\"unit_name\":\"Transport Unit\"}}', '2019-07-25 11:30:54', '2019-07-25 11:30:54'),
(62, 'default', 'restored', 1, 'App\\Unit', 1, 'App\\User', '{\"unit_name\":\"Transport Unit\"}', '2019-07-25 11:31:19', '2019-07-25 11:31:19'),
(63, 'default', 'created', 1, 'App\\Position', 1, 'App\\User', '{\"attributes\":{\"position_name\":\"President\"}}', '2019-07-25 12:06:02', '2019-07-25 12:06:02'),
(64, 'default', 'created', 2, 'App\\Position', 1, 'App\\User', '{\"attributes\":{\"position_name\":\"Vice President\"}}', '2019-07-25 12:06:18', '2019-07-25 12:06:18'),
(65, 'default', 'updated', 1, 'App\\Position', 1, 'App\\User', '{\"attributes\":{\"position_name\":\"Presidents\"},\"old\":{\"position_name\":\"President\"}}', '2019-07-25 12:07:34', '2019-07-25 12:07:34'),
(66, 'default', 'updated', 1, 'App\\Position', 1, 'App\\User', '{\"attributes\":{\"position_name\":\"President\"},\"old\":{\"position_name\":\"Presidents\"}}', '2019-07-25 12:07:46', '2019-07-25 12:07:46'),
(67, 'default', 'created', 3, 'App\\Position', 1, 'App\\User', '{\"attributes\":{\"position_name\":\"Transport Secretary\"}}', '2019-07-25 12:08:09', '2019-07-25 12:08:09'),
(68, 'default', 'created', 4, 'App\\Position', 1, 'App\\User', '{\"attributes\":{\"position_name\":\"Choir Coordinator\"}}', '2019-07-25 12:08:23', '2019-07-25 12:08:23'),
(69, 'default', 'created', 5, 'App\\Position', 1, 'App\\User', '{\"attributes\":{\"position_name\":\"General Secretary\"}}', '2019-07-25 12:08:42', '2019-07-25 12:08:42'),
(70, 'default', 'deleted', 5, 'App\\Position', 1, 'App\\User', '{\"attributes\":{\"position_name\":\"General Secretary\"}}', '2019-07-25 12:08:49', '2019-07-25 12:08:49'),
(71, 'default', 'restored', 5, 'App\\Position', 1, 'App\\User', '{\"position_name\":\"General Secretary\"}', '2019-07-25 12:09:13', '2019-07-25 12:09:13'),
(72, 'default', 'created', 1, 'App\\SchoolSession', 1, 'App\\User', '{\"attributes\":{\"session_name\":\"2010\\/2011\"}}', '2019-07-25 13:57:30', '2019-07-25 13:57:30'),
(73, 'default', 'created', 2, 'App\\SchoolSession', 1, 'App\\User', '{\"attributes\":{\"session_name\":\"2011\\/2012\"}}', '2019-07-25 13:59:08', '2019-07-25 13:59:08'),
(74, 'default', 'created', 3, 'App\\SchoolSession', 1, 'App\\User', '{\"attributes\":{\"session_name\":\"2012\\/2013\"}}', '2019-07-25 13:59:24', '2019-07-25 13:59:24'),
(75, 'default', 'deleted', 1, 'App\\SchoolSession', 1, 'App\\User', '{\"attributes\":{\"session_name\":\"2010\\/2011\"}}', '2019-07-25 14:00:02', '2019-07-25 14:00:02'),
(76, 'default', 'restored', 1, 'App\\SchoolSession', 1, 'App\\User', '{\"session_name\":\"2010\\/2011\"}', '2019-07-25 14:01:58', '2019-07-25 14:01:58'),
(77, 'default', 'created', 4, 'App\\SchoolSession', 1, 'App\\User', '{\"attributes\":{\"session_name\":\"2013\\/2014\"}}', '2019-07-25 14:02:21', '2019-07-25 14:02:21'),
(78, 'default', 'updated', 1, 'App\\SchoolSession', 1, 'App\\User', '{\"attributes\":{\"session_name\":\"2010\\/20110\"},\"old\":{\"session_name\":\"2010\\/2011\"}}', '2019-07-25 14:04:58', '2019-07-25 14:04:58'),
(79, 'default', 'updated', 1, 'App\\SchoolSession', 1, 'App\\User', '{\"attributes\":{\"session_name\":\"2010\\/2011\"},\"old\":{\"session_name\":\"2010\\/20110\"}}', '2019-07-25 14:05:13', '2019-07-25 14:05:13'),
(80, 'default', 'updated', 3, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"},\"old\":{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"}}', '2019-07-25 14:23:08', '2019-07-25 14:23:08'),
(81, 'default', 'updated', 3, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"},\"old\":{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"}}', '2019-07-25 14:23:24', '2019-07-25 14:23:24'),
(82, 'default', 'updated', 3, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"},\"old\":{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"}}', '2019-07-25 14:26:05', '2019-07-25 14:26:05'),
(83, 'default', 'updated', 3, 'App\\User', 3, 'App\\User', '{\"attributes\":{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"},\"old\":{\"name\":\"Adeola Sola\",\"email\":\"admin@gmail.com\"}}', '2019-07-25 14:33:04', '2019-07-25 14:33:04'),
(84, 'default', 'created', 6, 'App\\Position', 2, 'App\\User', '{\"attributes\":{\"position_name\":\"Prayer Secretary\"}}', '2019-07-25 14:51:25', '2019-07-25 14:51:25'),
(85, 'default', 'created', 7, 'App\\Position', 2, 'App\\User', '{\"attributes\":{\"position_name\":\"Welfare Secretary\"}}', '2019-07-25 14:51:39', '2019-07-25 14:51:39'),
(86, 'default', 'created', 8, 'App\\Position', 2, 'App\\User', '{\"attributes\":{\"position_name\":\"Asst. General Secretary\"}}', '2019-07-25 14:51:48', '2019-07-25 14:51:48'),
(87, 'default', 'created', 9, 'App\\Position', 2, 'App\\User', '{\"attributes\":{\"position_name\":\"Asst. Choir Coordinator\"}}', '2019-07-25 14:51:58', '2019-07-25 14:51:58'),
(88, 'default', 'created', 10, 'App\\Position', 2, 'App\\User', '{\"attributes\":{\"position_name\":\"Asst. Welfare Secretary\"}}', '2019-07-25 14:52:06', '2019-07-25 14:52:06'),
(89, 'default', 'created', 11, 'App\\Position', 2, 'App\\User', '{\"attributes\":{\"position_name\":\"Asst. Prayer Secretary\"}}', '2019-07-25 14:52:20', '2019-07-25 14:52:20'),
(90, 'default', 'created', 12, 'App\\Position', 2, 'App\\User', '{\"attributes\":{\"position_name\":\"Technical Co-ordinator\"}}', '2019-07-25 14:52:35', '2019-07-25 14:52:35'),
(91, 'default', 'created', 9, 'App\\Unit', 2, 'App\\User', '{\"attributes\":{\"unit_name\":\"Evangelism Unit\"}}', '2019-07-25 14:55:38', '2019-07-25 14:55:38'),
(92, 'default', 'created', 10, 'App\\Unit', 2, 'App\\User', '{\"attributes\":{\"unit_name\":\"Bible Study Unit\"}}', '2019-07-25 14:55:46', '2019-07-25 14:55:46'),
(93, 'default', 'created', 11, 'App\\Unit', 2, 'App\\User', '{\"attributes\":{\"unit_name\":\"Counseling Unit\"}}', '2019-07-25 14:55:59', '2019-07-25 14:55:59'),
(94, 'default', 'view profile', 2, 'App\\User', 2, 'App\\User', '{\"name\":\"Adesina Taiwo\",\"email\":\"tolajide74@gmail.com\"}', '2019-07-25 15:03:09', '2019-07-25 15:03:09'),
(95, 'default', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Taiwo Olajide\",\"email\":\"tolajide74@gmail.com\"},\"old\":{\"name\":\"Adesina Taiwo\",\"email\":\"tolajide74@gmail.com\"}}', '2019-07-25 15:03:29', '2019-07-25 15:03:29'),
(96, 'default', 'updated profile', 2, 'App\\User', 2, 'App\\User', '{\"name\":\"Adesina Taiwo\",\"email\":\"tolajide74@gmail.com\"}', '2019-07-25 15:03:29', '2019-07-25 15:03:29'),
(97, 'default', 'created', 5, 'App\\SchoolSession', 2, 'App\\User', '{\"attributes\":{\"session_name\":\"2014\\/2015\"}}', '2019-07-25 15:04:30', '2019-07-25 15:04:30'),
(98, 'default', 'created', 6, 'App\\SchoolSession', 2, 'App\\User', '{\"attributes\":{\"session_name\":\"2015\\/2016\"}}', '2019-07-25 15:04:56', '2019-07-25 15:04:56'),
(99, 'default', 'created', 7, 'App\\SchoolSession', 2, 'App\\User', '{\"attributes\":{\"session_name\":\"2016\\/2017\"}}', '2019-07-25 15:05:07', '2019-07-25 15:05:07'),
(100, 'default', 'created', 8, 'App\\SchoolSession', 2, 'App\\User', '{\"attributes\":{\"session_name\":\"2017\\/2018\"}}', '2019-07-25 15:05:17', '2019-07-25 15:05:17'),
(101, 'default', 'created', 9, 'App\\SchoolSession', 2, 'App\\User', '{\"attributes\":{\"session_name\":\"2018\\/2019\"}}', '2019-07-25 15:05:33', '2019-07-25 15:05:33'),
(102, 'default', 'created', 10, 'App\\SchoolSession', 2, 'App\\User', '{\"attributes\":{\"session_name\":\"2019\\/2020\"}}', '2019-07-25 15:05:46', '2019-07-25 15:05:46'),
(103, 'default', 'created', 1, 'App\\Excos', 2, 'App\\User', '{\"attributes\":{\"surname\":\"Adesina\",\"email\":\"olajide@gmail.com\",\"position_id\":\"3\"}}', '2019-07-26 09:46:33', '2019-07-26 09:46:33'),
(104, 'default', 'updated', 1, 'App\\Excos', 2, 'App\\User', '{\"attributes\":{\"surname\":\"Adesina\",\"email\":\"olajide@gmail.com\",\"position_id\":\"3\"},\"old\":{\"surname\":\"Adesina\",\"email\":\"olajide@gmail.com\",\"position_id\":\"3\"}}', '2019-07-26 11:55:24', '2019-07-26 11:55:24'),
(105, 'default', 'updated', 1, 'App\\Excos', 2, 'App\\User', '{\"attributes\":{\"surname\":\"Adesina\",\"email\":\"olajide@gmail.com\",\"position_id\":\"3\"},\"old\":{\"surname\":\"Adesina\",\"email\":\"olajide@gmail.com\",\"position_id\":\"3\"}}', '2019-07-26 11:56:00', '2019-07-26 11:56:00'),
(106, 'default', 'updated', 1, 'App\\Excos', 2, 'App\\User', '{\"attributes\":{\"surname\":\"Adesina\",\"email\":\"olajide@gmail.com\",\"position_id\":\"3\"},\"old\":{\"surname\":\"Adesina\",\"email\":\"olajide@gmail.com\",\"position_id\":\"3\"}}', '2019-07-26 12:20:48', '2019-07-26 12:20:48'),
(107, 'default', 'created', 2, 'App\\Excos', 2, 'App\\User', '{\"attributes\":{\"surname\":\"Adetunji\",\"email\":\"olaniyi@gmail.com\",\"position_id\":\"1\"}}', '2019-07-26 12:25:50', '2019-07-26 12:25:50'),
(108, 'default', 'created', 12, 'App\\Unit', 2, 'App\\User', '{\"attributes\":{\"unit_name\":\"All Unit\"}}', '2019-07-26 12:26:04', '2019-07-26 12:26:04'),
(109, 'default', 'created', 13, 'App\\Position', 2, 'App\\User', '{\"attributes\":{\"position_name\":\"Asst. Transport Secretary\"}}', '2019-07-26 12:26:24', '2019-07-26 12:26:24'),
(110, 'default', 'updated', 2, 'App\\Excos', 2, 'App\\User', '{\"attributes\":{\"surname\":\"Adetunji\",\"email\":\"olaniyi@gmail.com\",\"position_id\":\"1\"},\"old\":{\"surname\":\"Adetunji\",\"email\":\"olaniyi@gmail.com\",\"position_id\":\"1\"}}', '2019-07-26 12:27:43', '2019-07-26 12:27:43'),
(111, 'default', 'updated', 2, 'App\\Excos', 2, 'App\\User', '{\"attributes\":{\"surname\":\"Adetunji\",\"email\":\"olaniyi@gmail.com\",\"position_id\":\"1\"},\"old\":{\"surname\":\"Adetunji\",\"email\":\"olaniyi@gmail.com\",\"position_id\":\"1\"}}', '2019-07-26 12:28:37', '2019-07-26 12:28:37'),
(112, 'default', 'deleted', 1, 'App\\Excos', 2, 'App\\User', '{\"attributes\":{\"surname\":\"Adesina\",\"email\":\"olajide@gmail.com\",\"position_id\":\"3\"}}', '2019-07-26 12:34:37', '2019-07-26 12:34:37'),
(113, 'default', 'restored', 1, 'App\\Excos', 2, 'App\\User', '{\"name\":\"Adesina\",\"email\":\"olajide@gmail.com\"}', '2019-07-26 12:42:40', '2019-07-26 12:42:40'),
(114, 'default', 'deleted', 2, 'App\\Excos', 2, 'App\\User', '{\"attributes\":{\"surname\":\"Adetunji\",\"email\":\"olaniyi@gmail.com\",\"position_id\":\"1\"}}', '2019-07-26 12:45:34', '2019-07-26 12:45:34'),
(115, 'default', 'restored', 2, 'App\\Excos', 2, 'App\\User', '{\"name\":\"Adetunji\",\"email\":\"olaniyi@gmail.com\"}', '2019-07-26 12:45:46', '2019-07-26 12:45:46'),
(116, 'default', 'updated', 2, 'App\\Excos', 2, 'App\\User', '{\"attributes\":{\"surname\":\"Adetunji\",\"email\":\"olaniyi@gmail.com\",\"position_id\":\"1\"},\"old\":{\"surname\":\"Adetunji\",\"email\":\"olaniyi@gmail.com\",\"position_id\":\"1\"}}', '2019-07-26 12:48:11', '2019-07-26 12:48:11'),
(117, 'default', 'updated', 2, 'App\\Excos', 2, 'App\\User', '{\"attributes\":{\"surname\":\"Adetunji\",\"email\":\"olaniyi@gmail.com\",\"position_id\":\"1\"},\"old\":{\"surname\":\"Adetunji\",\"email\":\"olaniyi@gmail.com\",\"position_id\":\"1\"}}', '2019-07-26 12:48:34', '2019-07-26 12:48:34'),
(118, 'default', 'created', 1, 'App\\ProgramCatrgories', 1, 'App\\User', '{\"attributes\":{\"program_category_name\":\"Sunday Service\"}}', '2019-07-27 09:28:21', '2019-07-27 09:28:21'),
(119, 'default', 'created', 2, 'App\\ProgramCatrgories', 1, 'App\\User', '{\"attributes\":{\"program_category_name\":\"Bible Study\"}}', '2019-07-27 09:30:52', '2019-07-27 09:30:52'),
(120, 'default', 'created', 3, 'App\\ProgramCatrgories', 1, 'App\\User', '{\"attributes\":{\"program_category_name\":\"Prayer Rain\"}}', '2019-07-27 09:32:27', '2019-07-27 09:32:27'),
(121, 'default', 'created', 4, 'App\\ProgramCatrgories', 1, 'App\\User', '{\"attributes\":{\"program_category_name\":\"FYB Sunday\"}}', '2019-07-27 09:32:44', '2019-07-27 09:32:44'),
(122, 'default', 'updated', 2, 'App\\ProgramCatrgories', 1, 'App\\User', '{\"attributes\":{\"program_category_name\":\"Bible Studies\"},\"old\":{\"program_category_name\":\"Bible Study\"}}', '2019-07-27 09:38:00', '2019-07-27 09:38:00'),
(123, 'default', 'updated', 2, 'App\\ProgramCatrgories', 1, 'App\\User', '{\"attributes\":{\"program_category_name\":\"Bible Study\"},\"old\":{\"program_category_name\":\"Bible Studies\"}}', '2019-07-27 09:39:44', '2019-07-27 09:39:44'),
(124, 'default', 'created', 5, 'App\\ProgramCatrgories', 1, 'App\\User', '{\"attributes\":{\"program_category_name\":\"Excos Retreat\"}}', '2019-07-27 09:40:18', '2019-07-27 09:40:18'),
(125, 'default', 'created', 6, 'App\\ProgramCatrgories', 1, 'App\\User', '{\"attributes\":{\"program_category_name\":\"MTFC Program\"}}', '2019-07-27 09:40:36', '2019-07-27 09:40:36'),
(126, 'default', 'deleted', 2, 'App\\ProgramCatrgories', 1, 'App\\User', '{\"attributes\":{\"program_category_name\":\"Bible Study\"}}', '2019-07-27 09:41:34', '2019-07-27 09:41:34'),
(127, 'default', 'created', 4, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Kehinde\",\"email\":\"kenny@gmail.com\"}}', '2019-07-27 09:58:04', '2019-07-27 09:58:04'),
(128, 'default', 'updated', 4, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Kehinde\",\"email\":\"kenny@gmail.com\"},\"old\":{\"name\":\"Adesina Kehinde\",\"email\":\"kenny@gmail.com\"}}', '2019-07-27 09:58:17', '2019-07-27 09:58:17'),
(129, 'default', 'updated', 4, 'App\\User', 1, 'App\\User', '{\"attributes\":{\"name\":\"Adesina Kehinde\",\"email\":\"kenny@gmail.com\"},\"old\":{\"name\":\"Adesina Kehinde\",\"email\":\"kenny@gmail.com\"}}', '2019-07-27 09:58:30', '2019-07-27 09:58:30'),
(130, 'default', 'restored', 2, 'App\\ProgramCatrgories', 1, 'App\\User', '{\"program_category_name\":\"Bible Study\"}', '2019-07-27 10:00:25', '2019-07-27 10:00:25'),
(131, 'default', 'created', 1, 'App\\Programs', 1, 'App\\User', '{\"attributes\":{\"program_name\":\"The Spiritual Man\",\"ministers\":\"Lkoifdavsfdntasmfihh \\u00e1\\u00f3eg\",\"program_category_name\":null,\"program_date\":\"07\\/07\\/2019\"}}', '2019-07-29 07:59:17', '2019-07-29 07:59:17'),
(132, 'default', 'created', 2, 'App\\Programs', 1, 'App\\User', '{\"attributes\":{\"program_name\":\"The New Man\",\"ministers\":\"EFQILRYFMHLVWFQCWAFHIV BU\",\"program_category_name\":null,\"program_date\":\"07\\/31\\/2019\"}}', '2019-07-29 08:00:16', '2019-07-29 08:00:16'),
(133, 'default', 'created', 3, 'App\\Programs', 1, 'App\\User', '{\"attributes\":{\"program_name\":\"The New Man\",\"ministers\":\"Rga Btrheykly;,upooymtnrhv\",\"program_category_name\":null,\"program_date\":\"08\\/06\\/2019\"}}', '2019-07-29 08:06:37', '2019-07-29 08:06:37'),
(134, 'default', 'created', 4, 'App\\Programs', 1, 'App\\User', '{\"attributes\":{\"program_name\":\"Testing Program 2\",\"ministers\":\"Kola, Sola, Bola ,Choir\",\"program_category_name\":null,\"program_date\":\"07\\/28\\/2019\"}}', '2019-07-29 08:28:16', '2019-07-29 08:28:16'),
(135, 'default', 'created', 5, 'App\\Programs', 1, 'App\\User', '{\"attributes\":{\"program_name\":\"The New Beginning\",\"ministers\":\"Lekan, Choir, CACSA\",\"program_category_name\":null,\"program_date\":\"07\\/29\\/2019\"}}', '2019-07-29 08:31:47', '2019-07-29 08:31:47'),
(136, 'default', 'deleted', 3, 'App\\Programs', 1, 'App\\User', '{\"attributes\":{\"program_name\":\"The New Man\",\"ministers\":\"Rga Btrheykly;,upooymtnrhv\",\"program_category_name\":null,\"program_date\":\"08\\/06\\/2019\"}}', '2019-07-29 09:00:46', '2019-07-29 09:00:46'),
(137, 'default', 'restored', 3, 'App\\Programs', 1, 'App\\User', '{\"program_name\":\"The New Man\",\"ministers\":\"Rga Btrheykly;,upooymtnrhv\",\"program_category_name\":\"Sunday Service\"}', '2019-07-29 11:27:05', '2019-07-29 11:27:05'),
(138, 'default', 'deleted', 5, 'App\\Programs', 1, 'App\\User', '{\"attributes\":{\"program_name\":\"The New Beginning Of A Man\",\"ministers\":\"Lekan, Choir, CACSA, Drama\",\"program_category_name\":null,\"program_date\":\"08\\/29\\/2019\"}}', '2019-07-29 11:29:20', '2019-07-29 11:29:20'),
(139, 'default', 'restored', 5, 'App\\Programs', 1, 'App\\User', '{\"program_name\":\"The New Beginning Of A Man\",\"ministers\":\"Lekan, Choir, CACSA, Drama\",\"program_category_name\":\"MTFC Program\"}', '2019-07-29 11:30:15', '2019-07-29 11:30:15'),
(140, 'default', 'created', 1, 'App\\Messages', 1, 'App\\User', '{\"attributes\":{\"title\":\"Work Hard\",\"preacher\":\"Taiwo\",\"program_category_id\":6}}', '2019-07-29 13:57:43', '2019-07-29 13:57:43'),
(141, 'default', 'created', 2, 'App\\Messages', 1, 'App\\User', '{\"attributes\":{\"title\":\"Marriage Affairs\",\"preacher\":\"OLajide\",\"program_category_id\":6}}', '2019-07-29 14:06:27', '2019-07-29 14:06:27'),
(142, 'default', 'updated', 2, 'App\\Messages', 1, 'App\\User', '{\"attributes\":{\"title\":\"Marriage Affairs In Jerusalem\",\"preacher\":\"Olajide\",\"program_category_id\":2},\"old\":{\"title\":\"Marriage Affairs\",\"preacher\":\"OLajide\",\"program_category_id\":6}}', '2019-07-29 14:11:28', '2019-07-29 14:11:28'),
(143, 'default', 'created', 3, 'App\\Messages', 1, 'App\\User', '{\"attributes\":{\"title\":\"Jesus Changes Water Into Wine\",\"preacher\":\"Pst. Dayo\",\"program_category_id\":2}}', '2019-07-29 14:27:19', '2019-07-29 14:27:19'),
(144, 'default', 'deleted', 3, 'App\\Messages', 1, 'App\\User', '{\"attributes\":{\"title\":\"Jesus Changes Water Into Wine\",\"preacher\":\"Pst. Dayo\",\"program_category_id\":2}}', '2019-07-29 14:40:25', '2019-07-29 14:40:25'),
(145, 'default', 'restored', 3, 'App\\Messages', 1, 'App\\User', '{\"title\":\"Jesus Changes Water Into Wine\",\"preacher\":\"Pst. Dayo\",\"program_category_id\":\"Bible Study\"}', '2019-07-29 14:43:29', '2019-07-29 14:43:29'),
(146, 'default', 'deleted', 2, 'App\\Messages', 1, 'App\\User', '{\"attributes\":{\"title\":\"Marriage Affairs In Jerusalem\",\"preacher\":\"Olajide\",\"program_category_id\":2}}', '2019-07-29 14:43:45', '2019-07-29 14:43:45'),
(147, 'default', 'restored', 2, 'App\\Messages', 1, 'App\\User', '{\"title\":\"Marriage Affairs In Jerusalem\",\"preacher\":\"Olajide\",\"program_category_id\":\"Bible Study\"}', '2019-07-29 14:45:19', '2019-07-29 14:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `excos`
--

CREATE TABLE `excos` (
  `exco_id` bigint(20) UNSIGNED NOT NULL,
  `passport` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_names` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `excos`
--

INSERT INTO `excos` (`exco_id`, `passport`, `surname`, `other_names`, `email`, `phone_number`, `dept`, `faculty`, `unit_id`, `session_id`, `position_id`, `updated_at`, `created_at`, `deleted_at`, `status`, `category`, `dob`) VALUES
(1, '179103 adesina taiwo olajide_1564137993.jpg', 'Adesina', 'Taiwo Olajide', 'olajide@gmail.com', '08138139331', 'Computer Science', 'Science', 1, 6, 3, '2019-07-26 12:42:40', '2019-07-26 09:46:33', NULL, 1, 'Main House Executive', '2019-07-26'),
(2, 'user_1564147717.jpg', 'Adetunji', 'Olaniyi', 'olaniyi@gmail.com', '09084847444', 'Adult Education', 'Education', 12, 6, 1, '2019-07-26 12:48:34', '2019-07-26 12:25:49', NULL, 1, 'Central Executive', '1989-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preacher` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bible_verses` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_category_id` int(255) NOT NULL,
  `message_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `title`, `preacher`, `bible_verses`, `content`, `program_category_id`, `message_link`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Work Hard', 'Taiwo', 'Ajkscdfclvb Cvxdasl;/f.numhderwjpol', 'Akfilndvfsdjg Kdvhslmanesrdyf Herklw;qfnkhtvre;lmgstgtjl Hdfksxdbtj', 6, 'https://www.datafilehost.com/d/13e72672', '2019-07-29 13:57:43', '2019-07-29 13:57:43', NULL),
(2, 'Marriage Affairs In Jerusalem', 'Olajide', 'John 2 Vs 2, John 3 Vs 16, Matt 2 Vs 6, Gen 4 Vs 4', 'And Both Jesus Was Called, And His Disciples, To The Marriage. It Was Awesome', 2, 'https://www.datafilehost.com/d/13e72672', '2019-07-29 14:45:19', '2019-07-29 14:06:27', NULL),
(3, 'Jesus Changes Water Into Wine', 'Pst. Dayo', 'KfkdlR', 'Vk.zblmgakmg;lmafpld;gfsmbnkolsgmaelgkfbvx;mbfgksa', 2, 'no link', '2019-07-29 14:43:29', '2019-07-29 14:27:19', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_23_103402_create_permission_tables', 1),
(4, '2019_07_23_104514_create_units_table', 1),
(5, '2019_07_23_105012_create_excos_table', 1),
(6, '2019_07_23_105429_create_school_sessions_table', 1),
(7, '2019_07_23_105538_create_positions_table', 1),
(8, '2019_07_23_105818_create_program_catrgories_table', 1),
(9, '2019_07_23_110030_create_messages_table', 1),
(10, '2019_07_23_110252_create_programs_table', 1),
(11, '2019_07_23_193719_create_activity_log_table', 2),
(12, '2019_07_24_095830_add_deleted_at_to_users', 3),
(13, '2019_07_25_110431_add_deleted_at_to_units', 4),
(14, '2019_07_25_130456_add_deleted_at_to_positions', 5),
(15, '2019_07_25_133140_add_deleted_at_to_school_sessions', 6),
(16, '2019_07_25_145549_add_deleted_at_to_school_sessions', 7),
(17, '2019_07_25_174008_add_deleted_at_to_excos', 8),
(18, '2019_07_25_174428_add_status_to_excos', 8),
(19, '2019_07_25_174501_add_category_to_excos', 8),
(20, '2019_07_26_083427_add_dob_to_excos', 9),
(21, '2019_07_27_102509_add_deleted_at_to_program_categories', 9),
(22, '2019_07_27_111021_add_deleted_at_to_programs', 10),
(23, '2019_07_27_111237_add_start_time_to_programs', 10),
(24, '2019_07_27_111256_add_end_time_to_programs', 10),
(25, '2019_07_27_111648_add_program_date_to_programs', 10),
(26, '2019_07_29_124615_add_deleted_at_to_messages', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2),
(1, 'App\\User', 5),
(5, 'App\\User', 4),
(8, 'App\\User', 6);

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
('administrator@gmail.com', '$2y$10$gNHdBR6JeIL6OAohyeOvROc.K7fbQ4L9UXgl8ZmpzHzXGXwaeBUCi', '2019-07-24 12:37:22'),
('tolajide74@gmail.com', '$2y$10$TDvPLqarRWqJtpQiSh4R9u3/EZQEDbqzkJZl4i1rLp2ieN8d2qvhO', '2019-07-24 13:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Add User', 'web', '2019-07-23 10:31:44', '2019-07-23 10:31:44'),
(5, 'Edit User', 'web', '2019-07-23 10:31:44', '2019-07-23 10:31:44'),
(6, 'Delete User', 'web', '2019-07-23 10:31:44', '2019-07-23 10:31:44'),
(7, 'View User', 'web', '2019-07-23 10:31:44', '2019-07-23 10:31:44'),
(8, 'Add Unit', 'web', '2019-07-25 10:21:13', '2019-07-25 10:21:13'),
(9, 'Edit Unit', 'web', '2019-07-25 10:21:21', '2019-07-25 10:21:21'),
(10, 'Update Unit', 'web', '2019-07-25 10:21:32', '2019-07-25 10:21:32'),
(11, 'Delete Unit', 'web', '2019-07-25 10:21:38', '2019-07-25 10:21:38'),
(12, 'Restore Unit', 'web', '2019-07-25 11:02:39', '2019-07-25 11:02:39'),
(13, 'Add Position', 'web', '2019-07-25 11:36:15', '2019-07-25 11:36:15'),
(14, 'Edit Position', 'web', '2019-07-25 11:36:25', '2019-07-25 11:36:25'),
(15, 'Update Position', 'web', '2019-07-25 11:36:33', '2019-07-25 11:36:33'),
(16, 'Delete Position', 'web', '2019-07-25 11:36:41', '2019-07-25 11:36:41'),
(17, 'Restore Position', 'web', '2019-07-25 11:36:59', '2019-07-25 11:36:59'),
(18, 'Add Session', 'web', '2019-07-25 12:28:11', '2019-07-25 12:28:11'),
(19, 'Edit Session', 'web', '2019-07-25 12:28:22', '2019-07-25 12:28:22'),
(20, 'Update Session', 'web', '2019-07-25 12:28:31', '2019-07-25 12:28:31'),
(21, 'Delete Session', 'web', '2019-07-25 12:28:38', '2019-07-25 12:28:38'),
(22, 'Restore Session', 'web', '2019-07-25 12:28:45', '2019-07-25 12:28:45'),
(23, 'Suspend User', 'web', '2019-07-25 14:10:41', '2019-07-25 14:10:41'),
(24, 'Un Suspend User', 'web', '2019-07-25 14:15:33', '2019-07-25 14:15:33'),
(25, 'Add Excos', 'web', '2019-07-25 16:38:32', '2019-07-25 16:38:32'),
(26, 'Edit Excos', 'web', '2019-07-25 16:38:44', '2019-07-25 16:38:44'),
(27, 'Delete Excos', 'web', '2019-07-25 16:38:51', '2019-07-25 16:38:51'),
(28, 'Update Excos', 'web', '2019-07-25 16:38:58', '2019-07-25 16:38:58'),
(29, 'Suspend Excos', 'web', '2019-07-25 16:39:07', '2019-07-25 16:39:07'),
(30, 'Un Suspend Excos', 'web', '2019-07-25 16:39:13', '2019-07-25 16:39:13'),
(31, 'Restore Excos', 'web', '2019-07-25 16:39:28', '2019-07-25 16:39:28'),
(32, 'View Excos', 'web', '2019-07-26 10:09:47', '2019-07-26 10:09:47'),
(33, 'Add Program Category', 'web', '2019-07-27 08:20:02', '2019-07-27 08:20:02'),
(34, 'Edit Program Category', 'web', '2019-07-27 08:39:29', '2019-07-27 08:39:29'),
(35, 'Delete Program Category', 'web', '2019-07-27 08:39:37', '2019-07-27 08:39:37'),
(36, 'Restore Program Category', 'web', '2019-07-27 08:39:47', '2019-07-27 08:39:47'),
(37, 'Update Program Category', 'web', '2019-07-27 09:37:42', '2019-07-27 09:37:42'),
(38, 'Add Program', 'web', '2019-07-27 10:03:19', '2019-07-27 10:03:19'),
(39, 'Edit Program', 'web', '2019-07-27 10:03:25', '2019-07-27 10:03:25'),
(40, 'Delete Program', 'web', '2019-07-27 10:03:34', '2019-07-27 10:03:34'),
(41, 'Update Program', 'web', '2019-07-27 10:03:43', '2019-07-27 10:03:43'),
(42, 'Restore Program', 'web', '2019-07-27 10:03:50', '2019-07-27 10:03:50'),
(43, 'Add Message', 'web', '2019-07-29 11:45:13', '2019-07-29 11:45:13'),
(44, 'Edit Message', 'web', '2019-07-29 11:45:22', '2019-07-29 11:45:22'),
(45, 'Update Message', 'web', '2019-07-29 11:45:29', '2019-07-29 11:45:29'),
(46, 'Delete Message', 'web', '2019-07-29 11:45:36', '2019-07-29 11:45:36'),
(47, 'Restore Message', 'web', '2019-07-29 11:45:44', '2019-07-29 11:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `position_name`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'President', '2019-07-25 12:07:46', '2019-07-25 12:06:02', NULL),
(2, 'Vice President', '2019-07-25 12:06:17', '2019-07-25 12:06:17', NULL),
(3, 'Transport Secretary', '2019-07-25 12:08:09', '2019-07-25 12:08:09', NULL),
(4, 'Choir Coordinator', '2019-07-25 12:08:23', '2019-07-25 12:08:23', NULL),
(5, 'General Secretary', '2019-07-25 12:09:13', '2019-07-25 12:08:42', NULL),
(6, 'Prayer Secretary', '2019-07-25 14:51:25', '2019-07-25 14:51:25', NULL),
(7, 'Welfare Secretary', '2019-07-25 14:51:39', '2019-07-25 14:51:39', NULL),
(8, 'Asst. General Secretary', '2019-07-25 14:51:48', '2019-07-25 14:51:48', NULL),
(9, 'Asst. Choir Coordinator', '2019-07-25 14:51:58', '2019-07-25 14:51:58', NULL),
(10, 'Asst. Welfare Secretary', '2019-07-25 14:52:06', '2019-07-25 14:52:06', NULL),
(11, 'Asst. Prayer Secretary', '2019-07-25 14:52:20', '2019-07-25 14:52:20', NULL),
(12, 'Technical Co-ordinator', '2019-07-25 14:52:35', '2019-07-25 14:52:35', NULL),
(13, 'Asst. Transport Secretary', '2019-07-26 12:26:24', '2019-07-26 12:26:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `program_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ministers` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_category_id` bigint(20) UNSIGNED NOT NULL,
  `program_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `ministers`, `program_category_id`, `program_date`, `start_time`, `end_time`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'The spiritual man', 'Holy Spirit', 1, '07/07/2019', '9:54 PM', '12:00', '2019-07-29 07:59:17', '2019-07-29 07:59:17', NULL),
(2, 'The Scripture', 'All The Finalist', 4, '07/31/2019', '10:00 AM', '03:00', '2019-07-29 08:00:16', '2019-07-29 08:00:16', NULL),
(3, 'The New Man', 'Choir, Prayer Warrior', 3, '08/06/2019', '10:06 AM', '02:00', '2019-07-29 11:27:05', '2019-07-29 08:06:37', NULL),
(4, 'Testing Program 2', 'Kola, Sola, Bola ,Choir', 2, '07/28/2019', '10:26 AM', '11:30PM', '2019-07-29 08:28:16', '2019-07-29 08:28:16', NULL),
(5, 'The New Beginning Of A Man', 'Lekan, Choir, CACSA, Drama', 6, '08/29/2019', '7:30 AM', '12:30', '2019-07-29 11:30:14', '2019-07-29 08:31:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_categories`
--

CREATE TABLE `program_categories` (
  `program_category_id` bigint(20) UNSIGNED NOT NULL,
  `program_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_categories`
--

INSERT INTO `program_categories` (`program_category_id`, `program_category_name`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Sunday Service', '2019-07-27 09:28:21', '2019-07-27 09:28:21', NULL),
(2, 'Bible Study', '2019-07-27 10:00:24', '2019-07-27 09:30:52', NULL),
(3, 'Prayer Rain', '2019-07-27 09:32:27', '2019-07-27 09:32:27', NULL),
(4, 'FYB Sunday', '2019-07-27 09:32:44', '2019-07-27 09:32:44', NULL),
(5, 'Excos Retreat', '2019-07-27 09:40:17', '2019-07-27 09:40:17', NULL),
(6, 'MTFC Program', '2019-07-27 09:40:36', '2019-07-27 09:40:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'web', '2019-07-23 10:16:18', '2019-07-23 10:16:18'),
(2, 'President', 'web', '2019-07-23 10:16:46', '2019-07-23 10:16:46'),
(3, 'Vice President', 'web', '2019-07-23 10:16:56', '2019-07-23 10:16:56'),
(4, 'Cordinator', 'web', '2019-07-23 10:18:00', '2019-07-23 10:18:00'),
(5, 'UnitHead', 'web', '2019-07-23 10:18:16', '2019-07-23 10:18:16'),
(8, 'AsstUnitHead', 'web', '2019-07-23 10:18:58', '2019-07-23 10:18:58'),
(9, 'UnitMember', 'web', '2019-07-23 10:19:13', '2019-07-23 10:19:13'),
(10, 'Member', 'web', '2019-07-23 10:19:19', '2019-07-23 10:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 2),
(5, 2),
(6, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `school_sessions`
--

CREATE TABLE `school_sessions` (
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `session_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_sessions`
--

INSERT INTO `school_sessions` (`session_id`, `session_name`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, '2010/2011', '2019-07-25 14:05:13', '2019-07-25 13:57:30', NULL),
(2, '2011/2012', '2019-07-25 13:59:08', '2019-07-25 13:59:08', NULL),
(3, '2012/2013', '2019-07-25 13:59:24', '2019-07-25 13:59:24', NULL),
(4, '2013/2014', '2019-07-25 14:02:21', '2019-07-25 14:02:21', NULL),
(5, '2014/2015', '2019-07-25 15:04:30', '2019-07-25 15:04:30', NULL),
(6, '2015/2016', '2019-07-25 15:04:55', '2019-07-25 15:04:55', NULL),
(7, '2016/2017', '2019-07-25 15:05:06', '2019-07-25 15:05:06', NULL),
(8, '2017/2018', '2019-07-25 15:05:17', '2019-07-25 15:05:17', NULL),
(9, '2018/2019', '2019-07-25 15:05:33', '2019-07-25 15:05:33', NULL),
(10, '2019/2020', '2019-07-25 15:05:46', '2019-07-25 15:05:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Transport Unit', '2019-07-25 11:31:19', '2019-07-25 10:27:10', NULL),
(2, 'Choir Unit', '2019-07-25 10:29:43', '2019-07-25 10:29:43', NULL),
(3, 'Prayer Unit', '2019-07-25 10:30:14', '2019-07-25 10:30:14', NULL),
(4, 'Technical Unit', '2019-07-25 10:30:40', '2019-07-25 10:30:40', NULL),
(5, 'Ushering Unit', '2019-07-25 10:30:52', '2019-07-25 10:30:52', NULL),
(6, 'Organizing Unit', '2019-07-25 11:18:49', '2019-07-25 10:31:03', NULL),
(7, 'Welfare Unit', '2019-07-25 11:25:41', '2019-07-25 10:31:33', NULL),
(8, 'Visitation Unit', '2019-07-25 11:28:44', '2019-07-25 11:28:44', NULL),
(9, 'Evangelism Unit', '2019-07-25 14:55:38', '2019-07-25 14:55:38', NULL),
(10, 'Bible Study Unit', '2019-07-25 14:55:46', '2019-07-25 14:55:46', NULL),
(11, 'Counseling Unit', '2019-07-25 14:55:59', '2019-07-25 14:55:59', NULL),
(12, 'All Unit', '2019-07-26 12:26:04', '2019-07-26 12:26:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `status`, `remember_token`, `email_verified_at`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Adesina Taiwo Olajide', 'administrator@gmail.com', '$2y$10$VEWAsXEQh14SikhK54AnhOq1VZPaeNXix.ubtNDE.MRmvBHiWhMii', 'Administrator', 1, NULL, '2019-07-24 13:26:22', '2019-07-25 09:39:35', '2019-07-24 10:33:08', NULL),
(2, 'Adesina Taiwo Olajide', 'tolajide74@gmail.com', '$2y$10$LKttpCXdk/8SORS84PDOXO1GuRkBE4mBwkR3flK4e0/yzlsKdtIwy', 'Administrator', 1, NULL, '2019-07-24 11:44:07', '2019-07-25 15:03:29', '2019-07-24 11:12:55', NULL),
(3, 'Adeola Sola', 'admin@gmail.com', '$2y$10$cFwvL4KHUNhQAMm.IIfTcOiEfiS9Oc7YyMVXWghGB3/ns6RUgYrlG', 'President', 1, NULL, '2019-07-25 14:33:04', '2019-07-25 14:33:04', '2019-07-25 08:49:20', NULL),
(4, 'Adesina Kehinde', 'kenny@gmail.com', '$2y$10$4q9hI74PdkDPs8gScgE.vui4ReknfNvD28tuTk8wuzytNI5cV7c7m', 'UnitHead', 1, NULL, NULL, '2019-07-27 09:58:30', '2019-07-27 09:58:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `excos`
--
ALTER TABLE `excos`
  ADD PRIMARY KEY (`exco_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `program_categories`
--
ALTER TABLE `program_categories`
  ADD PRIMARY KEY (`program_category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `school_sessions`
--
ALTER TABLE `school_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `excos`
--
ALTER TABLE `excos`
  MODIFY `exco_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `program_categories`
--
ALTER TABLE `program_categories`
  MODIFY `program_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `school_sessions`
--
ALTER TABLE `school_sessions`
  MODIFY `session_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2026 at 04:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scanning_accomplishment`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomplishments`
--

CREATE TABLE `accomplishments` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(100) NOT NULL,
  `task_type` varchar(50) NOT NULL DEFAULT 'Document Scanned',
  `documents` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `task_details` text DEFAULT NULL,
  `file_date` date NOT NULL,
  `finished_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `hide_on_print` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accomplishments`
--

INSERT INTO `accomplishments` (`id`, `location`, `task_type`, `documents`, `task_details`, `file_date`, `finished_at`, `created_at`, `hide_on_print`) VALUES
(1, 'LBP - GF PROPER', 'Document Scanned', 6, NULL, '2024-12-23', '2026-08-03 11:55:00', '2026-10-02 08:42:25', 0),
(2, 'LBP - GF PROPER', 'Document Scanned', 9, NULL, '2024-12-23', '2026-08-03 15:49:00', '2026-10-02 08:57:01', 0),
(3, 'LBP - GF PROPER', 'Document Scanned', 9, NULL, '2024-12-16', '2026-08-03 16:55:00', '2026-10-05 00:08:23', 0),
(4, 'LBP - GF PROPER', 'Document Scanned', 14, NULL, '2024-12-16', '2026-08-04 11:49:00', '2026-10-05 00:12:04', 0),
(5, 'LBP - GF PROPER', 'Document Scanned', 11, NULL, '2024-12-16', '2026-08-04 15:23:00', '2026-10-05 00:13:14', 0),
(6, 'DBP - GF PROPER', 'Document Scanned', 11, NULL, '2025-04-11', '2026-08-05 16:48:00', '2026-10-05 00:14:36', 0),
(7, 'DBP - GF PROPER', 'Document Scanned', 5, NULL, '2025-09-25', '2026-08-04 16:46:00', '2026-10-05 00:16:19', 0),
(8, 'DBP - GF PROPER', 'Document Scanned', 25, NULL, '2025-09-26', '2026-08-05 11:29:00', '2026-10-05 00:17:21', 0),
(9, 'DBP - GF PROPER', 'Document Scanned', 6, NULL, '2025-04-11', '2026-08-06 09:01:00', '2026-10-05 02:44:10', 0),
(10, 'DBP 20% (NEW)', 'Document Scanned', 3, NULL, '2025-04-30', '2026-08-06 16:48:00', '2026-10-05 02:46:51', 0),
(11, 'DBP 20% (NEW)', 'Document Scanned', 3, NULL, '2025-04-04', '2026-08-06 15:55:00', '2026-10-05 02:47:28', 0),
(12, 'DBP - GF PROPER', 'Document Scanned', 11, NULL, '2025-02-21', '2026-08-06 11:40:00', '2026-10-05 02:55:23', 0),
(13, 'DBP - GF PROPER', 'Document Scanned', 5, NULL, '2025-02-21', '2026-08-06 14:10:00', '2026-10-05 02:58:12', 0),
(14, 'DBP - GF PROPER', 'Document Scanned', 2, NULL, '2025-01-10', '2026-08-07 15:09:00', '2026-10-05 03:58:23', 0),
(15, 'DBP - GF PROPER', 'Document Scanned', 2, NULL, '2025-01-14', '2026-08-07 15:37:00', '2026-10-05 03:58:55', 0),
(16, 'DBP - GF PROPER', 'Document Scanned', 2, NULL, '2025-01-17', '2026-08-07 16:11:00', '2026-10-05 03:59:43', 0),
(17, 'DBP - GF PROPER', 'Document Scanned', 1, NULL, '2025-01-20', '2026-08-07 16:24:00', '2026-10-05 04:00:13', 0),
(18, 'DBP - GF PROPER', 'Document Scanned', 1, NULL, '2025-01-28', '2026-08-07 16:32:00', '2026-10-05 05:03:12', 0),
(19, 'DBP - GF PROPER', 'Document Scanned', 1, NULL, '2025-01-30', '2026-08-07 16:34:00', '2026-10-05 05:04:07', 0),
(20, 'DBP 20% (NEW)', 'Document Scanned', 1, NULL, '2025-04-08', '2026-08-07 11:40:00', '2026-10-05 05:05:34', 0),
(21, 'DBP 20% (NEW)', 'Document Scanned', 1, NULL, '2025-04-15', '2026-08-07 14:22:00', '2026-10-05 05:06:15', 0),
(22, 'DBP 20% (NEW)', 'Document Scanned', 1, NULL, '2025-04-21', '2026-08-07 11:34:00', '2026-10-05 05:06:53', 0),
(23, 'DBP 20% (NEW)', 'Document Scanned', 1, NULL, '2025-04-22', '2026-08-07 11:17:00', '2026-10-05 05:07:25', 0),
(24, 'DBP 20% (NEW)', 'Document Scanned', 3, NULL, '2025-04-24', '2026-08-07 10:26:00', '2026-10-05 05:08:40', 0),
(25, 'DBP 20% (NEW)', 'Document Scanned', 4, NULL, '2025-04-28', '2026-08-07 09:40:00', '2026-10-05 05:09:49', 0),
(26, 'DBP 20% (NEW)', 'Document Scanned', 2, NULL, '2025-04-30', '2026-08-07 08:45:00', '2026-10-05 05:10:30', 0),
(27, 'DBP - GF PROPER', 'Document Scanned', 13, NULL, '2025-05-05', '2026-08-10 11:39:00', '2026-10-05 05:12:28', 0),
(28, 'DBP - GF PROPER', 'Document Scanned', 15, NULL, '2025-05-05', '2026-08-10 15:48:00', '2026-10-05 05:13:11', 0),
(29, 'DBP - GF PROPER', 'Document Scanned', 2, NULL, '2025-05-20', '2026-08-11 11:33:00', '2026-10-05 07:15:48', 0),
(30, 'DBP - GF PROPER', 'Document Scanned', 9, NULL, '2025-05-20', '2026-08-11 16:38:00', '2026-10-05 07:17:01', 0),
(31, 'DBP - GF PROPER', 'Document Scanned', 11, NULL, '2025-05-20', '2026-08-12 11:26:00', '2026-10-06 03:52:28', 0),
(32, 'DBP - GF PROPER', 'Document Scanned', 18, NULL, '2025-05-20', '2026-08-12 16:13:00', '2026-10-06 03:53:14', 0),
(33, 'LBP - GF PROPER', 'Document Scanned', 8, NULL, '2025-06-30', '2026-08-13 11:32:00', '2026-10-06 03:55:07', 0),
(34, 'LBP - GF PROPER', 'Document Scanned', 12, NULL, '2025-06-30', '2026-08-13 16:18:00', '2026-10-06 03:56:08', 0),
(35, 'LBP - GF PROPER', 'Document Scanned', 4, NULL, '2025-03-26', '2026-08-17 11:56:00', '2026-10-06 03:57:43', 0),
(36, 'LBP - GF PROPER', 'Document Scanned', 15, NULL, '2025-03-26', '2026-08-17 15:27:00', '2026-10-06 03:58:15', 0),
(37, 'LBP - GF PROPER', 'Document Scanned', 3, NULL, '2025-03-27', '2026-08-17 15:39:00', '2026-10-06 03:58:53', 0),
(38, 'LBP - GF PROPER', 'Document Scanned', 1, NULL, '2025-03-28', '2026-08-17 16:13:00', '2026-10-06 03:59:21', 0),
(39, 'LBP - GF PROPER', 'Document Scanned', 5, NULL, '2025-03-31', '2026-08-17 16:41:00', '2026-10-06 04:00:00', 0),
(40, 'LBP - GF PROPER', 'Document Scanned', 6, NULL, '2025-03-31', '2026-08-18 10:52:00', '2026-10-06 04:57:05', 0),
(41, 'LBP - GF PROPER', 'Document Scanned', 1, NULL, '2025-03-27', '2026-08-18 09:25:00', '2026-10-06 04:57:36', 0),
(42, 'DBP TINUY-AN OLD', 'Document Scanned', 2, NULL, '2025-04-07', '2026-08-18 14:43:00', '2026-10-06 05:03:17', 0),
(43, 'DBP TINUY-AN OLD', 'Document Scanned', 3, NULL, '2025-04-10', '2026-08-18 15:39:00', '2026-10-06 05:04:58', 0),
(44, 'DBP TINUY-AN OLD', 'Document Scanned', 1, NULL, '2025-04-21', '2026-08-18 15:58:00', '2026-10-06 05:05:25', 0),
(45, 'DBP TINUY-AN OLD', 'Document Scanned', 1, NULL, '2025-04-25', '2026-08-18 16:24:00', '2026-10-06 05:06:00', 0),
(46, 'DBP TINUY-AN OLD', 'Document Scanned', 2, NULL, '2025-04-30', '2026-08-18 16:24:00', '2026-10-06 05:06:20', 0),
(47, 'DBP TINUY-AN OLD', 'Document Scanned', 1, NULL, '2025-04-21', '2026-08-18 14:26:00', '2026-10-06 05:07:20', 0),
(48, 'DBP - GF PROPER', 'Document Scanned', 8, NULL, '2025-12-26', '2026-08-18 11:11:00', '2026-10-06 05:08:50', 0),
(49, 'DBP - GF PROPER', 'Document Scanned', 4, NULL, '2025-12-26', '2026-08-18 14:08:00', '2026-10-06 05:09:17', 0),
(50, 'DBP SEF NEW', 'Document Scanned', 5, NULL, '2025-05-09', '2026-08-19 10:16:00', '2026-10-06 05:10:53', 0),
(51, 'DBP SEF NEW', 'Document Scanned', 2, NULL, '2025-05-20', '2026-08-19 11:23:00', '2026-10-06 05:11:26', 0),
(52, 'DBP SEF NEW', 'Document Scanned', 1, NULL, '2025-05-23', '2026-08-19 13:42:00', '2026-10-06 05:12:06', 0),
(53, 'DBP SEF NEW', 'Document Scanned', 1, NULL, '2025-05-27', '2026-08-19 14:06:00', '2026-10-06 05:12:30', 0),
(54, 'DBP SEF NEW', 'Document Scanned', 3, NULL, '2025-05-30', '2026-08-19 15:13:00', '2026-10-06 05:13:09', 0),
(55, 'DBP SEF NEW', 'Document Scanned', 2, NULL, '2025-05-28', '2026-08-19 15:48:00', '2026-10-06 05:14:14', 0),
(56, 'DBP SEF NEW', 'Document Scanned', 1, NULL, '2025-05-30', '2026-08-19 16:01:00', '2026-10-06 05:15:01', 0),
(57, 'LBP - GF PROPER', 'Document Scanned', 1, NULL, '2024-12-20', '2026-08-19 16:22:00', '2026-10-06 05:16:14', 0),
(58, 'LBP - GF PROPER', 'Document Scanned', 27, NULL, '2024-12-20', '2026-08-20 11:38:00', '2026-10-06 05:17:02', 0),
(59, 'DBP - GF PROPER', 'Document Scanned', 6, NULL, '2024-12-10', '2026-08-20 16:01:00', '2026-10-06 05:18:34', 0),
(60, 'LBP - GF PROPER', 'Document Scanned', 4, NULL, '2025-05-26', '2026-08-24 09:22:00', '2026-10-06 05:20:54', 0),
(61, 'LBP - GF PROPER', 'Document Scanned', 19, NULL, '2025-05-27', '2026-08-24 11:49:00', '2026-10-06 05:21:59', 0),
(62, 'LBP - GF PROPER', 'Document Scanned', 13, NULL, '2025-05-28', '2026-08-24 14:59:00', '2026-10-06 05:22:35', 0),
(63, 'LBP - GF PROPER', 'Document Scanned', 5, NULL, '2025-05-30', '2026-08-24 16:24:00', '2026-10-06 05:23:33', 0),
(64, 'DBP - GF PROPER', 'Document Scanned', 1, NULL, '2025-03-03', '2026-08-25 13:07:00', '2026-10-06 05:24:52', 0),
(65, 'DBP - GF PROPER', 'Document Scanned', 1, NULL, '2025-03-04', '2026-08-25 13:44:00', '2026-10-06 05:25:21', 0),
(66, 'DBP - GF PROPER', 'Document Scanned', 23, NULL, '2025-03-05', '2026-08-25 16:36:00', '2026-10-06 05:26:00', 0),
(67, 'LBP - GF PROPER', 'Document Scanned', 11, NULL, '2025-05-30', '2026-08-25 10:23:00', '2026-10-06 05:28:23', 0),
(68, 'DBP - GF PROPER', 'Document Scanned', 5, NULL, '2024-12-11', '2026-08-26 16:22:00', '2026-10-06 05:30:10', 0),
(69, 'DBP - GF PROPER', 'Document Scanned', 10, NULL, '2025-03-06', '2026-08-26 11:56:00', '2026-10-06 05:31:25', 0),
(70, 'DBP - GF PROPER', 'Document Scanned', 5, NULL, '2025-03-06', '2026-08-26 14:12:00', '2026-10-06 05:32:11', 0),
(71, 'DBP - GF PROPER', 'Document Scanned', 10, NULL, '2024-12-11', '2026-08-27 11:27:00', '2026-10-06 05:35:11', 0),
(72, 'DBP - GF PROPER', 'Document Scanned', 8, NULL, '2024-12-11', '2026-08-27 16:41:00', '2026-10-06 05:36:03', 0),
(73, 'DBP - GF PROPER', 'Document Scanned', 2, NULL, '2024-12-11', '2026-08-28 09:07:00', '2026-10-06 05:36:39', 0),
(74, 'DBP - GF PROPER', 'Document Scanned', 10, NULL, '2025-05-16', '2026-08-28 11:37:00', '2026-10-06 05:37:43', 0),
(75, 'DBP - GF PROPER', 'Document Scanned', 5, NULL, '2025-05-16', '2026-08-28 16:50:00', '2026-10-06 05:38:11', 0),
(76, 'LBP - GF PROPER', 'Document Scanned', 7, NULL, '2025-12-11', '2026-09-01 16:23:00', '2026-10-06 05:40:00', 0),
(77, 'DBP - GF PROPER', 'Document Scanned', 3, NULL, '2025-05-16', '2026-09-01 11:10:00', '2026-10-06 05:41:00', 0),
(78, 'DBP - GF PROPER', 'Document Scanned', 4, NULL, '2025-05-16', '2026-09-01 14:34:00', '2026-10-06 05:41:41', 0),
(79, 'LBP - GF PROPER', 'Document Scanned', 4, NULL, '2025-12-11', '2026-09-02 16:18:00', '2026-10-06 05:42:52', 0),
(80, 'DSWD Social Pension 2ND QTR 2026', 'Document Scanned', 1, NULL, '2026-09-02', '2026-09-02 14:12:00', '2026-10-06 05:43:54', 0),
(81, 'LBP - GF PROPER', 'Document Scanned', 9, NULL, '2025-12-11', '2026-09-03 10:07:00', '2026-10-06 05:45:19', 0),
(82, 'DBP - GF PROPER', 'Document Scanned', 3, NULL, '2025-03-24', '2026-09-03 11:33:00', '2026-10-06 05:46:35', 0),
(83, 'DBP - GF PROPER', 'Document Scanned', 13, NULL, '2025-03-24', '2026-09-03 16:18:00', '2026-10-06 05:47:44', 0),
(84, 'DBP - GF PROPER', 'Document Scanned', 9, NULL, '2024-12-27', '2026-09-04 11:38:00', '2026-10-06 05:49:36', 0),
(85, 'DBP - GF PROPER', 'Document Scanned', 8, NULL, '2024-12-27', '2026-09-04 16:04:00', '2026-10-06 05:51:49', 0),
(86, 'others', 'Delivery', 3, NULL, '2026-09-04', '2026-09-04 08:55:00', '2026-10-06 05:55:41', 0),
(87, 'DBP - GF PROPER', 'Document Scanned', 15, NULL, '2025-02-28', '2026-09-07 11:31:00', '2026-10-09 03:27:51', 0),
(88, 'DBP - GF PROPER', 'Document Scanned', 3, NULL, '2025-02-28', '2026-09-07 13:35:00', '2026-10-09 03:28:18', 0),
(89, 'LBP TF COAFC NEW', 'Document Scanned', 2, NULL, '2025-03-18', '2026-09-07 14:36:00', '2026-10-09 03:32:07', 0),
(90, 'LBP TF COAFC NEW', 'Document Scanned', 1, NULL, '2025-03-19', '2026-09-07 14:59:00', '2026-10-09 03:32:41', 0),
(91, 'LBP TF COAFC NEW', 'Document Scanned', 1, NULL, '2025-03-20', '2026-09-07 15:17:00', '2026-10-09 03:33:48', 0),
(92, 'LBP TF COAFC NEW', 'Document Scanned', 1, NULL, '2025-03-24', '2026-09-07 15:39:00', '2026-10-09 03:34:17', 0),
(93, 'LBP TF COAFC NEW', 'Document Scanned', 1, NULL, '2025-03-26', '2026-09-07 16:22:00', '2026-10-09 03:34:50', 0),
(94, 'LBP TF COAFC NEW', 'Document Scanned', 1, NULL, '2025-03-27', '2026-09-07 16:29:00', '2026-10-09 03:36:12', 0),
(95, 'LBP TF COAFC NEW', 'Document Scanned', 1, NULL, '2025-03-25', '2026-09-08 08:17:00', '2026-10-09 03:38:47', 0),
(96, 'LBP TF COAFC NEW', 'Document Scanned', 1, NULL, '2025-03-28', '2026-09-08 08:12:00', '2026-10-09 03:39:21', 0),
(97, 'LBP - GF PROPER', 'Document Scanned', 9, NULL, '2024-12-19', '2026-09-08 16:40:00', '2026-10-09 03:40:54', 0),
(98, 'DBP 20% (NEW)', 'Document Scanned', 11, NULL, '2025-01-22', '2026-09-08 11:38:00', '2026-10-09 03:42:07', 0),
(99, 'DBP 20% (NEW)', 'Document Scanned', 1, NULL, '2025-01-14', '2026-09-09 11:02:00', '2026-10-13 08:16:22', 0),
(100, 'DBP - GF PROPER', 'Document Scanned', 16, NULL, '2024-12-27', '2026-09-09 16:16:00', '2026-10-13 08:17:57', 0),
(101, 'LBP - GF PROPER', 'Document Scanned', 3, NULL, '2024-12-19', '2026-09-09 09:47:00', '2026-10-13 08:19:09', 0),
(102, 'DBP - GF PROPER', 'Document Scanned', 5, NULL, '2024-12-27', '2026-09-10 09:35:00', '2026-10-13 08:20:30', 0),
(103, 'DBP - GF PROPER', 'Document Scanned', 6, NULL, '2024-12-11', '2026-09-10 11:28:00', '2026-10-13 08:21:20', 0),
(104, 'DBP - GF PROPER', 'Document Scanned', 14, NULL, '2024-12-11', '2026-09-10 16:17:00', '2026-10-13 08:21:49', 0),
(105, 'To COA', 'Delivery', 10, NULL, '2026-09-11', '2026-09-11 16:15:00', '2026-10-13 08:23:34', 0),
(106, 'DBP - GF PROPER', 'Document Scanned', 13, NULL, '2025-12-28', '2026-09-11 10:55:00', '2026-10-13 08:24:38', 0),
(107, 'LBP - GF PROPER', 'Document Scanned', 3, NULL, '2025-01-30', '2026-09-11 08:20:00', '2026-10-13 08:26:14', 0),
(108, 'DBP & LBP BRS AUGUST 2026', 'Document Scanned', 2, NULL, '2026-08-30', '2026-09-14 11:25:00', '2026-10-13 08:28:02', 0),
(109, 'DBP - GF PROPER', 'Document Scanned', 4, NULL, '2025-11-28', '2026-09-14 11:33:00', '2026-10-13 08:29:26', 0),
(110, 'DBP - GF PROPER', 'Document Scanned', 16, NULL, '2025-11-28', '2026-09-14 16:40:00', '2026-10-13 08:29:58', 0),
(111, 'To COA', 'Delivery', 20, NULL, '2026-09-15', '2026-09-15 16:22:00', '2026-10-13 08:32:16', 0),
(112, 'DBP - GF PROPER', 'Document Scanned', 25, NULL, '2025-11-28', '2026-09-15 23:06:00', '2026-10-13 08:33:15', 0),
(113, 'To COA', 'Delivery', 41, NULL, '2026-09-16', '2026-09-16 16:32:00', '2026-10-13 08:34:07', 0),
(114, 'DBP - GF PROPER', 'Document Scanned', 6, NULL, '2024-12-16', '2026-09-16 11:22:00', '2026-10-13 08:35:00', 0),
(115, 'DBP - GF PROPER', 'Document Scanned', 16, NULL, '2024-12-16', '2026-09-17 11:14:00', '2026-10-13 08:36:23', 0),
(116, 'DBP - GF PROPER', 'Document Scanned', 13, NULL, '2024-12-11', '2026-09-17 16:20:00', '2026-10-13 08:37:22', 0),
(117, 'DBP - GF PROPER', 'Document Scanned', 10, NULL, '2024-12-11', '2026-09-23 11:28:00', '2026-10-13 08:38:31', 0),
(118, 'DBP - GF PROPER', 'Document Scanned', 4, NULL, '2025-02-14', '2026-09-25 11:29:00', '2026-10-13 08:39:40', 0),
(119, 'DBP - GF PROPER', 'Document Scanned', 16, NULL, '2025-02-14', '2026-09-25 15:13:00', '2026-10-13 08:40:14', 0),
(120, 'DBP SEF OLD', 'Document Scanned', 3, NULL, '2025-02-25', '2026-09-28 10:05:00', '2026-10-13 08:42:29', 0),
(121, 'DBP SEF OLD', 'Document Scanned', 3, NULL, '2025-02-26', '2026-09-28 10:59:00', '2026-10-13 08:43:25', 0),
(122, 'DBP SEF OLD', 'Document Scanned', 2, NULL, '2025-02-28', '2026-09-28 11:31:00', '2026-10-13 08:44:14', 0),
(123, 'DBP 20% (NEW)', 'Document Scanned', 1, NULL, '2025-01-28', '2026-09-29 15:36:00', '2026-10-13 08:46:33', 0),
(124, 'DBP SEF OLD', 'Document Scanned', 2, NULL, '2025-02-28', '2026-09-29 09:43:00', '2026-10-13 08:47:43', 0),
(125, 'DBP - GF PROPER', 'Document Scanned', 17, NULL, '2025-02-17', '2026-09-29 11:26:00', '2026-10-13 08:49:44', 0),
(126, 'DBP - GF PROPER', 'Document Scanned', 12, NULL, '2025-02-17', '2026-09-29 15:09:00', '2026-10-13 08:50:49', 0),
(127, 'DBP 20% (NEW)', 'Document Scanned', 9, NULL, '2025-10-09', '2026-09-30 11:07:00', '2026-10-13 08:53:14', 0),
(128, 'DBP 20% (NEW)', 'Document Scanned', 3, NULL, '2025-10-09', '2026-09-30 15:35:00', '2026-10-13 08:54:20', 0),
(129, 'Edit SD plan 28 images', 'Document Scanned', 28, NULL, '2026-09-30', '2026-09-30 16:35:00', '2026-10-13 08:56:05', 0),
(130, 'DBP 20% (NEW)', 'Document Scanned', 3, NULL, '2025-10-09', '2026-10-01 11:02:00', '2026-10-14 06:49:58', 0),
(131, 'DBP MARKET NEW', 'Document Scanned', 1, NULL, '2024-12-12', '2026-10-01 11:19:00', '2026-10-14 06:51:46', 0),
(132, 'DBP MARKET NEW', 'Document Scanned', 2, NULL, '2024-12-13', '2026-10-01 11:28:00', '2026-10-14 06:52:38', 0),
(133, 'DBP MARKET NEW', 'Document Scanned', 1, NULL, '2024-12-16', '2026-10-01 13:14:00', '2026-10-14 06:53:46', 0),
(134, 'DBP MARKET NEW', 'Document Scanned', 1, NULL, '2024-12-18', '2026-10-01 13:23:00', '2026-10-14 06:54:20', 0),
(135, 'DBP MARKET NEW', 'Document Scanned', 3, NULL, '2024-12-23', '2026-10-01 13:34:00', '2026-10-14 06:54:51', 0),
(136, 'DBP MARKET NEW', 'Document Scanned', 1, NULL, '2024-12-26', '2026-10-01 13:39:00', '2026-10-14 06:55:24', 0),
(137, 'DBP MARKET NEW', 'Document Scanned', 1, NULL, '2024-12-27', '2026-10-01 16:19:00', '2026-10-14 06:55:57', 0),
(138, 'TO HR', 'Delivery', 5, NULL, '2026-10-01', '2026-10-01 15:56:00', '2026-10-14 06:56:32', 0),
(139, 'DBP MARKET NEW', 'Document Scanned', 1, NULL, '2024-12-27', '2026-10-02 09:02:00', '2026-10-14 06:58:38', 0),
(140, 'DBP MARKET OLD', 'Document Scanned', 1, NULL, '2024-12-04', '2026-10-02 09:09:00', '2026-10-14 07:00:00', 0),
(141, 'DBP MARKET OLD', 'Document Scanned', 2, NULL, '2024-12-11', '2026-10-02 09:48:00', '2026-10-14 07:00:40', 0),
(142, 'DBP MARKET OLD', 'Document Scanned', 1, NULL, '2024-12-17', '2026-10-02 10:05:00', '2026-10-14 07:01:22', 0),
(143, 'DBP MARKET OLD', 'Document Scanned', 3, NULL, '2024-12-18', '2026-10-02 10:46:00', '2026-10-14 07:02:06', 0),
(144, 'DBP MARKET OLD', 'Document Scanned', 1, NULL, '2024-12-20', '2026-10-02 10:49:00', '2026-10-14 07:02:34', 0),
(145, 'DBP 20% (NEW)', 'Document Scanned', 9, NULL, '2025-02-13', '2026-10-02 16:11:00', '2026-10-14 07:05:09', 0),
(146, 'DBP 20% (NEW)', 'Document Scanned', 4, NULL, '2025-02-13', '2026-10-05 14:40:00', '2026-10-14 07:06:33', 0),
(147, 'DBP 20% (NEW)', 'Document Scanned', 1, NULL, '2025-02-14', '2026-10-05 14:59:00', '2026-10-14 07:06:59', 0),
(148, 'LBP - GF PROPER NEW', 'Document Scanned', 2, NULL, '2026-06-26', '2026-10-05 16:28:00', '2026-10-14 07:08:58', 0),
(149, 'Double check docs', 'Other Related Task', 0, '1 bundle', '2026-10-05', '2026-10-05 11:10:00', '2026-10-14 07:10:43', 0),
(150, 'LBP - GF PROPER NEW', 'Document Scanned', 11, NULL, '2026-06-26', '2026-10-06 09:45:00', '2026-10-14 07:12:11', 0),
(151, 'LBP - GF PROPER NEW', 'Document Scanned', 13, NULL, '2026-06-30', '2026-10-06 11:15:00', '2026-10-14 07:14:43', 0),
(152, 'LBP - GF PROPER NEW', 'Document Scanned', 4, NULL, '2026-06-23', '2026-10-06 11:32:00', '2026-10-14 07:16:29', 0),
(153, 'DBP 20% (NEW)', 'Document Scanned', 5, NULL, '2026-06-08', '2026-10-06 15:20:00', '2026-10-14 07:20:17', 0),
(154, 'DBP 20% (NEW)', 'Document Scanned', 3, NULL, '2026-06-09', '2026-10-06 16:34:00', '2026-10-14 07:24:25', 0),
(155, 'DBP 20% (NEW)', 'Document Scanned', 2, NULL, '2026-06-16', '2026-10-07 11:24:00', '2026-10-14 07:25:50', 0),
(156, 'DBP 20% (NEW)', 'Document Scanned', 5, NULL, '2026-06-16', '2026-10-07 14:46:00', '2026-10-14 07:26:24', 0),
(157, 'DBP 20% (NEW)', 'Document Scanned', 5, NULL, '2026-06-09', '2026-10-07 09:29:00', '2026-10-14 07:27:05', 0),
(158, 'DBP 20% (NEW)', 'Document Scanned', 4, NULL, '2026-06-18', '2026-10-07 15:54:00', '2026-10-14 07:27:49', 0),
(159, 'DBP 20% (NEW)', 'Document Scanned', 3, NULL, '2026-06-23', '2026-10-07 16:31:00', '2026-10-14 07:28:26', 0),
(160, 'DBP 20% (NEW)', 'Document Scanned', 3, NULL, '2026-06-25', '2026-10-08 10:16:00', '2026-10-14 07:29:43', 0),
(161, 'LBP - GF PROPER NEW', 'Document Scanned', 6, NULL, '2026-06-29', '2026-10-08 11:21:00', '2026-10-14 07:34:43', 0),
(162, 'LBP - GF PROPER NEW', 'Document Scanned', 18, NULL, '2026-06-29', '2026-10-08 16:34:00', '2026-10-14 07:35:43', 0),
(163, 'LBP - GF PROPER NEW', 'Document Scanned', 13, NULL, '2026-06-29', '2026-10-09 11:21:00', '2026-10-14 07:37:27', 0),
(164, 'LBP - GF PROPER NEW', 'Document Scanned', 19, NULL, '2026-06-29', '2026-10-09 16:14:00', '2026-10-14 07:38:13', 0),
(165, 'DBP 20% (NEW)', 'Document Scanned', 8, NULL, '2026-06-04', '2026-10-12 11:26:00', '2026-10-14 07:44:41', 0),
(166, 'TO ARCHIVE UP / DBP 20%', 'Other Related Task', 0, '13 BUNDLE', '2026-10-12', '2026-10-12 14:45:00', '2026-10-14 07:48:52', 0),
(167, 'TO ARCHIVE UP/ DBP', 'Other Related Task', 0, '12 BUNDLE', '2026-10-12', '2026-10-12 15:20:00', '2026-10-14 07:50:34', 0),
(168, 'TO ARCHIVE UP/ LBP', 'Other Related Task', 0, '7 BUNDLE', '2026-10-12', '2026-10-12 16:30:00', '2026-10-14 07:51:24', 0),
(169, 'DBP MARKET NEW', 'Document Scanned', 1, NULL, '2026-06-11', '2026-10-13 13:27:00', '2026-10-14 07:53:10', 0),
(170, 'DBP MARKET NEW', 'Document Scanned', 3, NULL, '2026-06-18', '2026-10-13 14:05:00', '2026-10-14 07:53:44', 0),
(171, 'DBP MARKET NEW', 'Document Scanned', 1, NULL, '2026-06-26', '2026-10-13 14:25:00', '2026-10-14 07:54:13', 0),
(172, 'DBP MARKET NEW', 'Document Scanned', 5, NULL, '2026-06-30', '2026-10-13 15:20:00', '2026-10-14 07:54:47', 0),
(173, 'DBP MARKET OLD', 'Document Scanned', 1, NULL, '2026-06-24', '2026-10-13 15:25:00', '2026-10-14 07:56:13', 0),
(174, 'DBP TINUY-AN NEW', 'Document Scanned', 1, NULL, '2026-06-04', '2026-10-13 09:11:00', '2026-10-14 07:58:23', 0),
(175, 'DBP TINUY-AN NEW', 'Document Scanned', 1, NULL, '2026-06-11', '2026-10-13 09:52:00', '2026-10-14 07:59:29', 0),
(176, 'DBP TINUY-AN NEW', 'Document Scanned', 4, NULL, '2026-06-18', '2026-10-13 10:58:00', '2026-10-14 08:00:09', 0),
(177, 'DBP TINUY-AN NEW', 'Document Scanned', 1, NULL, '2026-06-26', '2026-10-13 11:07:00', '2026-10-14 08:00:45', 0),
(178, 'DBP TINUY-AN OLD', 'Document Scanned', 1, NULL, '2026-06-15', '2026-10-13 11:15:00', '2026-10-14 08:22:01', 0),
(179, 'DBP TINUY-AN OLD', 'Document Scanned', 1, NULL, '2026-06-30', '2026-10-13 11:22:00', '2026-10-14 08:23:02', 0),
(180, 'DBP CEMETERY NEW', 'Document Scanned', 2, NULL, '2026-06-17', '2026-10-13 08:34:00', '2026-10-14 08:24:26', 0),
(181, 'DBP CEMETERY NEW', 'Document Scanned', 2, NULL, '2026-06-24', '2026-10-13 08:53:00', '2026-10-14 08:25:35', 0),
(182, 'DBP 20% OLD', 'Document Scanned', 2, NULL, '2026-06-25', '2026-10-14 14:28:00', '2026-10-14 08:27:15', 0),
(183, 'DBP 20% OLD', 'Document Scanned', 1, NULL, '2026-06-26', '2026-10-14 14:32:00', '2026-10-14 08:27:45', 0),
(184, 'DBP 20% OLD', 'Document Scanned', 1, NULL, '2026-06-30', '2026-10-14 14:39:00', '2026-10-14 08:28:16', 0),
(185, 'DBP S-HOUSE NEW', 'Document Scanned', 1, NULL, '2026-06-10', '2026-10-14 10:36:00', '2026-10-14 08:32:45', 0),
(186, 'DBP S-HOUSE NEW', 'Document Scanned', 2, NULL, '2026-06-17', '2026-10-14 10:56:00', '2026-10-14 08:33:23', 0),
(187, 'DBP S-HOUSE NEW', 'Document Scanned', 1, NULL, '2026-06-26', '2026-10-14 11:06:00', '2026-10-14 08:34:05', 0),
(188, 'DBP S-HOUSE NEW', 'Document Scanned', 1, NULL, '2026-06-30', '2026-10-14 11:01:00', '2026-10-14 08:34:38', 0),
(189, 'DBP S-HOUSE OLD', 'Document Scanned', 1, NULL, '2026-06-23', '2026-10-14 11:11:00', '2026-10-14 08:35:58', 0),
(190, 'DBP IJT NEW', 'Document Scanned', 1, NULL, '2026-06-10', '2026-10-13 15:59:00', '2026-10-14 08:45:55', 0),
(191, 'DBP IJT NEW', 'Document Scanned', 2, NULL, '2026-06-17', '2026-10-13 16:08:00', '2026-10-14 08:47:08', 0),
(192, 'DBP IJT NEW', 'Document Scanned', 2, NULL, '2026-06-23', '2026-10-14 08:57:00', '2026-10-14 08:48:21', 0),
(193, 'DBP IJT NEW', 'Document Scanned', 1, NULL, '2026-06-26', '2026-10-14 09:02:00', '2026-10-14 08:49:02', 0),
(194, 'DBP IJT NEW', 'Document Scanned', 1, NULL, '2026-06-30', '2026-10-14 09:15:00', '2026-10-14 08:49:40', 0),
(195, 'DBP IJT OLD', 'Document Scanned', 2, NULL, '2026-06-26', '2026-10-14 09:36:00', '2026-10-14 08:52:14', 0),
(196, 'LBP - GF PROPER NEW', 'Document Scanned', 6, NULL, '2026-06-08', '2026-10-15 11:39:18', '2026-10-15 03:39:18', 0),
(197, 'Diagnose', 'Computer Troubleshooting', 0, '1 Computer', '2026-09-11', '2026-09-11 16:02:00', '2026-10-15 05:01:41', 0),
(198, 'LBP - GF PROPER NEW', 'Document Scanned', 7, NULL, '2026-06-08', '2026-10-15 15:51:00', '2026-10-19 00:56:13', 0),
(199, 'LBP - GF PROPER NEW', 'Document Scanned', 6, NULL, '2026-06-08', '2026-10-16 11:41:00', '2026-10-19 00:56:52', 0),
(200, 'LBP - GF PROPER NEW', 'Document Scanned', 12, NULL, '2025-10-27', '2026-10-19 11:48:58', '2026-10-19 03:48:58', 0),
(201, 'SCAN SEPT. BRS DBP/LBP 2026', 'Document Scanned', 2, NULL, '2026-09-30', '2026-10-19 14:02:00', '2026-10-19 06:02:43', 0),
(202, 'DBP GF PROPER NEW', 'Document Scanned', 5, NULL, '2025-08-29', '2026-10-19 16:20:51', '2026-10-19 08:20:51', 0),
(203, 'DBP GF PROPER NEW', 'Document Scanned', 8, NULL, '2025-08-29', '2026-10-20 11:34:01', '2026-10-20 03:34:01', 0),
(204, 'DBP GF PROPER NEW', 'Document Scanned', 6, NULL, '2025-08-29', '2026-10-20 15:02:06', '2026-10-20 07:02:06', 0),
(205, 'LBP - GF PROPER NEW', 'Document Scanned', 10, NULL, '2025-07-18', '2026-10-20 16:34:50', '2026-10-20 08:34:50', 0),
(206, 'To COA', 'Delivery', 3, NULL, '2026-10-20', '2026-10-20 14:56:00', '2026-10-20 08:36:33', 0),
(207, 'LBP - GF PROPER NEW', 'Document Scanned', 25, NULL, '2025-07-18', '2026-10-21 10:49:10', '2026-10-21 02:49:10', 0),
(208, 'LBP - GF PROPER NEW', 'Document Scanned', 13, NULL, '2025-07-18', '2026-10-21 15:55:08', '2026-10-21 07:55:08', 0),
(209, 'LBP - GF PROPER NEW', 'Document Scanned', 11, NULL, '2025-07-18', '2026-10-22 11:29:54', '2026-10-22 03:29:54', 0),
(210, 'LBP - GF PROPER NEW', 'Document Scanned', 7, NULL, '2025-12-05', '2026-10-22 16:25:00', '2026-10-23 01:48:11', 0),
(211, 'LBP - GF PROPER NEW', 'Document Scanned', 4, NULL, '2025-12-05', '2026-10-23 09:49:02', '2026-10-23 01:49:02', 0),
(212, 'DBP - GF PROPER', 'Document Scanned', 8, NULL, '2024-12-12', '2026-10-23 16:22:47', '2026-10-23 08:22:47', 0),
(213, 'DBP - GF PROPER', 'Document Scanned', 6, NULL, '2024-12-12', '2026-10-28 11:07:01', '2026-10-28 03:07:01', 0),
(214, 'DBP - GF PROPER', 'Document Scanned', 8, NULL, '2024-12-12', '2026-10-28 15:50:48', '2026-10-28 07:50:48', 0),
(215, 'Scan payroll October 2026', 'Document Scanned', 1, NULL, '2026-10-28', '2026-10-28 16:58:38', '2026-10-28 08:58:38', 0),
(216, 'DBP 20% (NEW)', 'Document Scanned', 7, NULL, '2024-12-23', '2026-10-29 11:33:57', '2026-10-29 03:33:57', 0),
(217, 'DBP 20% (NEW)', 'Document Scanned', 7, NULL, '2024-12-23', '2026-10-29 16:47:30', '2026-10-29 08:47:30', 0),
(218, 'LBP - GF PROPER NEW', 'Document Scanned', 9, NULL, '2024-12-20', '2026-10-30 11:20:30', '2026-10-30 03:20:30', 0),
(219, 'LBP - GF PROPER NEW', 'Document Scanned', 7, NULL, '2024-12-20', '2026-10-30 16:15:16', '2026-10-30 08:15:16', 0),
(220, 'LBP - GF PROPER NEW', 'Document Scanned', 5, NULL, '2024-12-20', '2026-11-03 11:22:00', '2026-11-05 00:22:20', 0),
(221, 'LBP - GF PROPER NEW', 'Document Scanned', 11, NULL, '2024-12-20', '2026-11-03 15:25:00', '2026-11-05 00:23:05', 0),
(222, 'To COA', 'Delivery', 20, NULL, '2026-11-03', '2026-11-03 16:00:00', '2026-11-05 00:23:49', 0),
(223, 'LBP - GF PROPER NEW', 'Document Scanned', 14, NULL, '2025-11-25', '2026-11-04 16:20:00', '2026-11-05 00:24:50', 0),
(224, 'To COA', 'Delivery', 33, NULL, '2026-11-04', '2026-11-04 10:25:00', '2026-11-05 00:25:20', 0),
(225, 'LBP - GF PROPER NEW', 'Document Scanned', 3, NULL, '2025-11-25', '2026-11-05 09:43:00', '2026-11-05 03:26:09', 0),
(226, 'LBP - GF PROPER NEW', 'Document Scanned', 9, NULL, '2025-07-28', '2026-11-05 11:26:34', '2026-11-05 03:26:34', 0),
(227, 'LBP - GF PROPER NEW', 'Document Scanned', 5, NULL, '2025-07-28', '2026-11-05 16:27:46', '2026-11-05 08:27:46', 0),
(228, 'LBP - GF PROPER NEW', 'Document Scanned', 9, NULL, '2025-07-28', '2026-11-06 11:23:20', '2026-11-06 03:23:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `created_at`) VALUES
(1, 'Administrator', 'bryanuni21', '$2y$12$GLserOh8VWibQ/OQ77U43OEt72hUVuLLPKoErSU4hRCaqeKNPMQUO', '2026-10-02 08:40:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomplishments`
--
ALTER TABLE `accomplishments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_finished_at` (`finished_at`),
  ADD KEY `idx_file_date` (`file_date`),
  ADD KEY `idx_task_type` (`task_type`),
  ADD KEY `idx_hide_on_print` (`hide_on_print`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_users_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomplishments`
--
ALTER TABLE `accomplishments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

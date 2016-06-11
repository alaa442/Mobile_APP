-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2016 at 03:45 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gps`
--

-- --------------------------------------------------------

--
-- Table structure for table `gps`
--

CREATE TABLE IF NOT EXISTS `gps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NDate` date NOT NULL,
  `Long` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Lat` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `Contractor_Code` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Contractor_Name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Status` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gps_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=93 ;

--
-- Dumping data for table `gps`
--

INSERT INTO `gps` (`id`, `NDate`, `Long`, `Lat`, `user_id`, `Contractor_Code`, `Contractor_Name`, `Status`, `created_at`, `updated_at`) VALUES
(41, '2016-03-28', '31.1954246', '27.1668726', 23, ' home', 'azhar', 0, '2016-03-28 09:20:09', '2016-03-28 09:20:09'),
(42, '2016-03-28', '31.1954183', '27.1668608', 4, ' home', 'azhar', 1, '2016-03-28 09:23:03', '2016-03-28 09:23:03'),
(43, '2016-03-28', '31.020967', '27.1748934', 4, ' home', 'azhar', 1, '2016-03-28 09:33:04', '2016-03-28 09:33:04'),
(44, '2016-03-28', '31.1954285', '27.1668732', 4, ' home', 'azhar', 0, '2016-03-28 09:34:12', '2016-03-28 09:34:12'),
(45, '2016-03-28', '31.1923345', '27.1693226', 2, ' home', 'azhar', 0, '2016-03-28 09:41:55', '2016-03-28 09:41:55'),
(46, '2016-03-28', '31.1954246', '27.1668726', 2, ' home', 'azhar omar', 1, '2016-03-27 20:05:02', '2016-03-27 20:05:02'),
(47, '2016-03-28', '31.195492', '27.1669498', 2, ' home', 'azhar omar', 1, '2016-03-27 20:18:17', '2016-03-27 20:18:17'),
(48, '2016-03-28', '31.1954645', '27.1669145', 4, ' home', 'azhar omar', 0, '2016-03-27 20:18:53', '2016-03-27 20:18:53'),
(49, '2016-03-28', '31.1954645', '27.1669145', 4, ' home', 'azhar omar', 0, '2016-03-27 20:19:02', '2016-03-27 20:19:02'),
(50, '2016-03-15', '31.1954645', '27.1669145', 23, ' home', 'azhar omar', 0, '2016-03-27 20:19:55', '2016-03-27 20:19:55'),
(51, '2016-03-12', '31.1954645', '27.1669145', 23, ' home', 'azhar omar', 0, '2016-03-27 20:20:02', '2016-03-27 20:20:02'),
(52, '2016-03-18', '31.1954645', '27.1669145', 4, ' home', 'azhar omar', 0, '2016-03-27 20:20:33', '2016-03-27 20:20:33'),
(53, '2016-03-18', '31.1926633', '27.1692992', 4, ' home', 'azhar omar', 0, '2016-03-27 20:25:49', '2016-03-27 20:25:49'),
(54, '2016-03-20', '31.1926633', '27.1692992', 2, 'undefined', 'undefined', 0, '2016-03-27 20:26:18', '2016-03-27 20:26:18'),
(55, '2016-03-20', '31.1926633', '27.1692992', 4, ' home', 'azhar omar', 0, '2016-03-27 20:33:28', '2016-03-27 20:33:28'),
(56, '2016-03-20', '31.1954177', '27.1668664', 2, ' home', 'azhar omar', 0, '2016-03-27 20:52:20', '2016-03-27 20:52:20'),
(57, '2016-03-25', '31.0209924', '27.1748838', 4, ' home', 'azhar omar', 1, '2016-03-27 23:24:55', '2016-03-27 23:24:55'),
(58, '2016-03-20', '31.0209951', '27.1748837', 23, ' home', 'azhar omar', 1, '2016-03-27 23:30:52', '2016-03-27 23:30:52'),
(59, '2016-03-24', '31.0209944', '27.1748792', 4, ' home', 'azhar omar', 0, '2016-03-28 00:08:41', '2016-03-28 00:08:41'),
(60, '2016-03-24', '31.0209952', '27.1748782', 4, ' home', 'azhar omar', 0, '2016-03-28 00:29:03', '2016-03-28 00:29:03'),
(61, '2016-03-24', '31.0209854', '27.1749337', 4, '1234', 'Ahmed M ', 0, '2016-03-28 00:41:14', '2016-03-28 00:41:14'),
(62, '2016-03-25', '31.0209933', '27.1749276', 4, '5678', 'Mostafa N ', 0, '2016-03-28 00:52:13', '2016-03-28 00:52:13'),
(74, '2016-03-25', '31.0209873', '27.1749078', 23, '1234', 'Ahmed M ', 1, '2016-03-28 05:55:10', '2016-03-28 05:55:10'),
(75, '2016-03-26', '31.0209873', '27.1749078', 23, '1234', 'Ahmed M ', 1, '2016-03-28 05:55:11', '2016-03-28 05:55:11'),
(76, '2016-03-26', '31.0209873', '27.1749078', 23, '5386', 'Osama A ', 1, '2016-03-28 05:55:26', '2016-03-28 05:55:26'),
(77, '2016-03-28', '31.0209873', '27.1749078', 23, '5386', 'Osama A ', 1, '2016-03-28 05:56:24', '2016-03-28 05:56:24'),
(78, '2016-03-28', '31.021006', '27.1748935', 2, '4321', 'Mohammed A ', 1, '2016-03-28 06:02:58', '2016-03-28 06:02:58'),
(79, '2016-03-28', '31.021006', '27.1748935', 2, '4321', 'Mohammed A ', 1, '2016-03-28 06:03:16', '2016-03-28 06:03:16'),
(80, '2016-03-28', '31.0209869', '27.1749118', 4, 'undefined', 'undefined', 0, '2016-03-28 06:03:53', '2016-03-28 06:03:53'),
(81, '2016-03-28', '31.0209861', '27.1749094', 4, '4321', 'Mohammed A ', 0, '2016-03-28 06:20:40', '2016-03-28 06:20:40'),
(82, '2016-03-28', '31.0209861', '27.1749094', 4, '4321', 'Mohammed A ', 0, '2016-03-28 06:20:47', '2016-03-28 06:20:47'),
(83, '2016-03-28', '31.0209958', '27.1748793', 23, '7586', 'Moamn O ', 0, '2016-03-28 06:22:16', '2016-03-28 06:22:16'),
(84, '2016-03-28', '31.0209922', '27.1749069', 4, '4321', 'Mohammed A ', 0, '2016-03-28 06:24:08', '2016-03-28 06:24:08'),
(85, '2016-03-28', '31.0209922', '27.1749069', 4, '4321', 'Mohammed A ', 0, '2016-03-28 06:24:11', '2016-03-28 06:24:11'),
(86, '2016-03-28', '31.0209934', '27.1749039', 23, '7586', 'Moamn O ', 0, '2016-03-28 06:28:14', '2016-03-28 06:28:14'),
(87, '2016-03-28', '31.0209878', '27.1749121', 4, '5295', 'Sherif M ', 0, '2016-03-28 06:29:44', '2016-03-28 06:29:44'),
(88, '2016-03-28', '31.0209878', '27.1749121', 4, '5386', 'Osama A ', 1, '2016-03-28 06:30:22', '2016-03-28 06:30:22'),
(89, '2016-03-28', '31.021003', '27.1748953', 23, '7586', 'Moamn O ', 0, '2016-03-28 06:32:47', '2016-03-28 06:32:47'),
(90, '2016-03-28', '31.0209869', '27.1749119', 4, '7586', 'Moamn O ', 0, '2016-03-28 06:46:59', '2016-03-28 06:46:59'),
(91, '2016-03-28', '31.0209873', '27.1749078 ', 23, '12te34', 'Ahmed M ', 1, '2016-04-01 03:48:43', '2016-04-01 03:48:43'),
(92, '2016-03-28', '31.0209873', '27.1749078 ', 23, '12ffed34', 'Ahmed M ', 1, '2016-04-01 03:49:45', '2016-04-01 03:49:45');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gps`
--
ALTER TABLE `gps`
  ADD CONSTRAINT `gps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

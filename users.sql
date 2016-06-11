-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2016 at 03:48 PM
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `password` (`password`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'azhar', 'azhar', 'azhar@yahoo.com', '$2y$10$S6pwzyCd2yvpItskdLXVEetpgoh1rR8te4mLixh45haa/Gsj00zLi', 'admin', 'dpPjXTZgkJB8WaxAdTS2Fxd1OK4Jylkp6E72BdpzibmvHVnotLkCSVR4TIju', '2016-03-18 05:01:31', '2016-04-15 03:20:10'),
(2, 'hadeel', 'hadeel', 'hadeel@yahoo.com', '$2y$10$YJT2A/3BHzSQexdJ1KqkA.5nrjBXE3./S58v63nnkdECc1LeEL0CK', 'user', NULL, '2016-03-18 05:02:27', '2016-03-18 05:02:27'),
(3, 'eman', 'eman', 'eman@yahoo.com', '$2y$10$oRRHVArFo.RDF4U7EBE4JOv6sUOsfYxxUtLEHfq3P1E6lWZpsYiJm', 'user', NULL, '2016-03-18 05:02:44', '2016-03-18 05:02:44'),
(4, 'nora', 'nora', 'nora@yahoo.com', '$2y$10$f/O8VY/wgtV7jGPdSD.ZbeUulT8dPHatg1sG9ig7YAGvrez30WkZm', 'user', NULL, '2016-03-18 05:03:05', '2016-03-18 05:03:05'),
(20, 'asa', 'undefined', 'undefined', '$2y$10$Qg8.GKZ8vC5by4c3uFAGjen.Eken4UAzIE0TOJP84qmrr0ThnJuPO', 'undefined', NULL, '2016-03-22 00:20:52', '2016-03-22 00:20:52'),
(23, 'sama', 'sama', 'sama@yahoo.com', '$2y$10$q3o5l/hSeFU0.YOJqhOePu0UZrT7GircWkiGQXBy0nZLnTUQ3ZjFC', 'user', NULL, '2016-03-22 00:29:51', '2016-03-22 00:29:51'),
(24, 'nano', 'nano', 'nano@yahoo.com', '$2y$10$enZrQGEtWXrOYCcBjaw5u.YlcoXPenn0vbFbLJWR2aYpRM6ErHo7G', 'user', NULL, '2016-03-22 00:31:14', '2016-03-22 00:31:14'),
(25, 'dws', ';dlk''w', 'hgsdvh@yahoo.com', '$2y$10$l1gNVlWH4geZApkjE4sJsO5XQ2GvNn1ctUiWtpQyNj/50FHe9t4HW', 'flkm', NULL, '2016-03-22 00:38:42', '2016-03-22 00:38:42'),
(26, 'sara', 'sara', 'sara@yahoo.com', '$2y$10$1egV8xTwlgWUwgkK/18Jt.9y7ef1qyrxGJvGBFaUYLZqikkdvUQpy', 'admin', NULL, '2016-03-22 01:00:57', '2016-03-22 01:00:57'),
(27, 'fkgkf', 'lkwefjpre', 'as@yahoo.com', '$2y$10$0Z38vMD7TBNt69nIAckd6uw6n.OA88rqambkljo.fH5UYBCGcviau', 'user', NULL, '2016-03-22 01:01:41', '2016-03-22 01:01:41'),
(28, 'ahmed', 'ahmed', 'ahmed@yahoo.com', '$2y$10$imlEP1zNOrJNjTepANfD5OTJroV3PxPt1OoBtqysLax2sbBt4auEm', 'admin', NULL, '2016-03-22 01:22:24', '2016-03-22 01:22:24'),
(29, 'mansor', 'mansour', 'mansour@yahoo.com', '$2y$10$FvmfFOfCNsmu/cjxJJK81.RgFIHYE8HfwGn9F4BCWmxArh5mtlWqO', 'user', NULL, '2016-03-24 02:33:28', '2016-03-24 02:33:28'),
(30, 'heba', 'heba', 'heba@yahoo.com', '$2y$10$PvtRUziIT9yv1byLVbp5wOT2FS5jM48FcpgdKhEa7g6VTa9acYGKO', 'user', NULL, '2016-03-24 05:09:29', '2016-03-24 05:09:29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

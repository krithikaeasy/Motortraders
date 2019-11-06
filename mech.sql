-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 04:35 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mech`
--

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
(1, '2019_09_19_142407_create_users_table', 1),
(2, '2019_09_19_142622_create_user_motors_table', 2),
(3, '2019_09_19_143302_create_motor_images_table', 3),
(4, '2019_09_19_143726_create_user_details_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `motor_images`
--

CREATE TABLE `motor_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `motor_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Table = user_motors, Column = id',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(10) UNSIGNED DEFAULT NULL,
  `mine_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motor_images`
--

INSERT INTO `motor_images` (`id`, `motor_id`, `url`, `caption`, `size`, `mine_type`, `created_at`, `updated_at`) VALUES
(1, 1, '5d83958621583.jpg', NULL, NULL, NULL, '2019-09-19 09:19:42', '2019-09-19 09:19:42'),
(2, 2, '5d88da815b2e5.jpg', NULL, NULL, NULL, '2019-09-23 09:15:21', '2019-09-23 09:15:21'),
(3, 3, '5d88e4219e711.jpg', NULL, NULL, NULL, '2019-09-23 09:56:25', '2019-09-23 09:56:25'),
(4, 4, '5d88e4e55c2ce.jpg', NULL, NULL, NULL, '2019-09-23 09:59:41', '2019-09-23 09:59:41'),
(5, 5, '5d88e71c5772f.jpg', NULL, NULL, NULL, '2019-09-23 10:09:08', '2019-09-23 10:09:08'),
(6, 5, '5d88e71c5fc7a.jpg', NULL, NULL, NULL, '2019-09-23 10:09:08', '2019-09-23 10:09:08'),
(7, 6, '5d88ea0c50ac5.png', NULL, NULL, NULL, '2019-09-23 10:21:40', '2019-09-23 10:21:40'),
(8, 7, '5d88eadad7a6f.png', NULL, NULL, NULL, '2019-09-23 10:25:06', '2019-09-23 10:25:06'),
(9, 8, '5d88eb432ad26.jpg', NULL, NULL, NULL, '2019-09-23 10:26:51', '2019-09-23 10:26:51'),
(10, 9, '5d88eb5ee85ba.jpg', NULL, NULL, NULL, '2019-09-23 10:27:18', '2019-09-23 10:27:18'),
(11, 10, '5d88ec78e7958.jpg', NULL, NULL, NULL, '2019-09-23 10:32:00', '2019-09-23 10:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kavin@gmail.com', '$2y$10$4xLK0lrFRAdLz6OX.38nO.1CZyKNXbEVNxck7clSwu6PtGiZS0mfa', NULL, '2019-09-19 09:19:42', '2019-09-19 09:19:42', NULL),
(2, 'malar@gmail.com', '$2y$10$bOzKNT.TZMk9YRPSjeI0DOUqYKmFWd9ZDopjven0a4r4UQm3KjO.6', NULL, '2019-09-23 09:15:21', '2019-09-23 09:15:21', NULL),
(3, 'mani@gmail.com', '$2y$10$u5fs.2ZKPfiqyyBMvSuHGequqcbdM570DbF.HIChx9ObVwnOiQDbG', NULL, '2019-09-23 10:09:08', '2019-09-23 10:09:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Table = users, Column = id',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `first_name`, `last_name`, `state`, `district`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 'dfg', 'ert', 'dgr', 'sdf', 'juy', '2019-09-19 09:19:42', '2019-09-19 09:19:42'),
(2, 2, 'malar', 'malar', 'tamilnadu', 'NAMAKKAL', 'SAKTHINAGAR, P-VELUR', '2019-09-23 09:15:21', '2019-09-23 09:15:21'),
(3, 3, 'mani', 'mani', 'Tamil Nadu', 'Selur', 'sakthinagar', '2019-09-23 10:09:08', '2019-09-23 10:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_motors`
--

CREATE TABLE `user_motors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Table = users, Column = id',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacture` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `millage` double(8,2) UNSIGNED DEFAULT NULL,
  `cc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `colour` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_motors`
--

INSERT INTO `user_motors` (`id`, `user_id`, `type`, `manufacture`, `model_name`, `reg_number`, `millage`, `cc`, `year`, `colour`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'sdfr', 'dfg', '2356', '56', 200.00, '110', 2018, 'blue', 14000.00, 'jkiuo', '2019-09-19 09:19:42', '2019-09-19 09:19:42'),
(2, 2, 'bikes', 'tvs', 'we', '1', 1230.00, '110', 2018, 'blue', 5600.00, 'xcvdfhth', '2019-09-23 09:15:21', '2019-09-23 09:15:21'),
(3, 2, 'bike', 'hero', 'pept', '2', 120.00, '90', 2018, 'green', 1500.00, 'fdtfugkhlk', '2019-09-23 09:56:25', '2019-09-23 09:56:25'),
(4, 2, 'bike', 'hero', 'pept', '2', 120.00, '90', 2018, 'green', 1500.00, 'fdtfugkhlk', '2019-09-23 09:59:41', '2019-09-23 09:59:41'),
(5, 3, 'bike', 'tvs', 'jupiter', '1', 120.00, '110', 2017, 'green', 13000.00, 'dfger', '2019-09-23 10:09:08', '2019-09-23 10:09:08'),
(6, 3, 'H', 'KJK', 'K', '2', 235.00, '10', 2017, 'WHITE', 23580.00, 'asdgre', '2019-09-23 10:21:40', '2019-09-23 10:21:40'),
(7, 3, 'H', 'KJK', 'K', '2', 235.00, '10', 2017, 'WHITE', 23580.00, 'asdgre', '2019-09-23 10:25:06', '2019-09-23 10:25:06'),
(8, 3, 'bkes', 'hero', 'pept', '2', 123.00, '150', 2017, 'pink', 23000.00, 'dgf', '2019-09-23 10:26:51', '2019-09-23 10:26:51'),
(9, 3, 'bkes', 'hero', 'pept', '2', 123.00, '150', 2017, 'pink', 23000.00, 'dgf', '2019-09-23 10:27:18', '2019-09-23 10:27:18'),
(10, 2, 'bike', 'honda', 'pept', '31', 100.00, '110', 2001, 'white', 10000.00, 'wer', '2019-09-23 10:32:00', '2019-09-23 10:32:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motor_images`
--
ALTER TABLE `motor_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `motor_images_motor_id_foreign` (`motor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_motors`
--
ALTER TABLE `user_motors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_motors_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `motor_images`
--
ALTER TABLE `motor_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_motors`
--
ALTER TABLE `user_motors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `motor_images`
--
ALTER TABLE `motor_images`
  ADD CONSTRAINT `motor_images_motor_id_foreign` FOREIGN KEY (`motor_id`) REFERENCES `user_motors` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_motors`
--
ALTER TABLE `user_motors`
  ADD CONSTRAINT `user_motors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

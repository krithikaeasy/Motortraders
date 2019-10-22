-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 06:01 PM
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
-- Database: `veh`
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_07_26_192551_create_user_details_table', 1),
(3, '2019_07_26_192601_create_user_motors_table', 1),
(4, '2019_08_16_122754_create_motor_images_table', 1);

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
(1, 1, '5d7e2296b9b15.jpg', NULL, NULL, NULL, '2019-09-15 06:07:58', '2019-09-15 06:07:58'),
(2, 1, '5d7e2296bfa12.jpg', NULL, NULL, NULL, '2019-09-15 06:07:58', '2019-09-15 06:07:58'),
(3, 2, '5d7e235e763ca.jpg', NULL, NULL, NULL, '2019-09-15 06:11:18', '2019-09-15 06:11:18'),
(4, 2, '5d7e235e7ad70.png', NULL, NULL, NULL, '2019-09-15 06:11:18', '2019-09-15 06:11:18'),
(5, 2, '5d7e235e7bf3c.jpg', NULL, NULL, NULL, '2019-09-15 06:11:18', '2019-09-15 06:11:18'),
(6, 3, '5d7e2706c24a7.jpg', NULL, NULL, NULL, '2019-09-15 06:26:54', '2019-09-15 06:26:54');

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
(1, 'krithikamecse@hotmail.com', '$2y$10$eyhHuRnUDDiXaiVeZJ6roe9.rxTLvinrrcKvXY.TRkwvxU4aCAb8m', NULL, '2019-09-15 06:07:58', '2019-09-15 06:07:58', NULL),
(2, 'krithimecse@gmail.com', '$2y$10$e7jfeCT2FXS9q8CMuymyHuQXKEmE48jd9WDjspOnCWZbE1gjHLAgi', NULL, '2019-09-15 06:26:54', '2019-09-15 06:26:54', NULL);

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
(1, 1, 'honda', 'honda', '12', '1', 200.00, '110', 2016, 'blue', 13000.00, 'dhgkhlk', '2019-09-15 06:07:58', '2019-09-15 06:07:58'),
(2, 1, 'bike', 'hero', 'splender', '2', 210.00, '150', 2018, 'pin', 14000.00, 'ggjkj', '2019-09-15 06:11:18', '2019-09-15 06:11:18'),
(3, 2, 'scooty', 'tvs', 'pept', '1', 200.00, '90', 2018, 'white', 2400.00, 'vjhkh', '2019-09-15 06:26:54', '2019-09-15 06:26:54');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_motors`
--
ALTER TABLE `user_motors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `motor_images`
--
ALTER TABLE `motor_images`
  ADD CONSTRAINT `motor_images_motor_id_foreign` FOREIGN KEY (`motor_id`) REFERENCES `user_motors` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_motors`
--
ALTER TABLE `user_motors`
  ADD CONSTRAINT `user_motors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

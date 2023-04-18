-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 04:29 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendence`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminClass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `name`, `adminId`, `adminClass`, `mobile`, `password`, `date`) VALUES
(1, 'alamin', '12345', 'Five', '01740816676', '123456', '16-Apr-2023');

-- --------------------------------------------------------

--
-- Table structure for table `attenden`
--

CREATE TABLE `attenden` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roll` bigint(20) NOT NULL,
  `attenden` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attenden`
--

INSERT INTO `attenden` (`id`, `roll`, `attenden`, `date`) VALUES
(2, 11, 'absent', '10-Apr-2023'),
(3, 12, 'present', '10-Apr-2023'),
(4, 13, 'absent', '10-Apr-2023'),
(5, 14, 'present', '10-Apr-2023'),
(8, 12, 'present', '10-Apr-2023'),
(9, 13, 'present', '10-Apr-2023'),
(10, 14, 'present', '11-Apr-2023'),
(13, 12, 'present', '11-Apr-2023'),
(14, 13, 'present', '11-Apr-2023'),
(15, 14, 'present', '11-Apr-2023'),
(16, 10, 'present', '11-Apr-2023'),
(17, 11, 'present', '11-Apr-2023'),
(18, 12, 'present', '12-Apr-2023'),
(19, 13, 'absent', '12-Apr-2023'),
(20, 14, 'present', '12-Apr-2023'),
(21, 10, 'present', '12-Apr-2023'),
(22, 11, 'present', '13-Apr-2023'),
(23, 12, 'present', '13-Apr-2023'),
(24, 13, 'absent', '13-Apr-2023'),
(25, 14, 'present', '13-Apr-2023'),
(26, 10, 'present', '13-Apr-2023'),
(27, 11, 'present', '14-Apr-2023'),
(28, 12, 'present', '13-Apr-2023'),
(29, 13, 'present', '13-Apr-2023'),
(30, 14, 'absent', '13-Apr-2023'),
(31, 10, 'present', '13-Apr-2023'),
(32, 11, 'absent', '14-Apr-2023'),
(33, 12, 'present', '14-Apr-2023'),
(34, 13, 'present', '14-Apr-2023'),
(35, 14, 'present', '14-Apr-2023'),
(36, 15, 'present', '14-Apr-2023'),
(37, 10, 'present', '15-Apr-2023'),
(38, 11, 'present', '15-Apr-2023'),
(39, 12, 'present', '15-Apr-2023'),
(40, 13, 'present', '15-Apr-2023'),
(41, 14, 'absent', '15-Apr-2023'),
(42, 15, 'present', '15-Apr-2023'),
(43, 20, 'present', '15-Apr-2023'),
(52, 10, 'present', '16-Apr-2023'),
(53, 11, 'present', '16-Apr-2023'),
(54, 12, 'present', '16-Apr-2023'),
(55, 13, 'present', '16-Apr-2023'),
(56, 14, 'present', '16-Apr-2023'),
(57, 15, 'absent', '16-Apr-2023');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`, `created_at`) VALUES
(1, 'FIve', '2023-04-16 11:44:18'),
(2, 'Six', '2023-04-16 11:44:24'),
(3, 'Seven', '2023-04-16 11:44:32'),
(5, 'Nine', '2023-04-16 11:44:46'),
(9, 'Ten', '2023-04-16 15:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `crouse`
--

CREATE TABLE `crouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `crouseid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(59) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crouse`
--

INSERT INTO `crouse` (`id`, `crouseid`, `name`, `descrip`, `date`) VALUES
(1, '1', 'BSIT', 'Bachelor Of Science In Information Technology', '16 April, 2023'),
(2, '2', 'BEED', 'Bachelor Of Science In Elementory Education', '16 April, 2023'),
(3, '3', 'BSED Financial Management', 'Bachelor Of Science In Business Administration', '16 April, 2023'),
(7, '4', 'BEED', 'Bachelor Of Science In Information Technology', '16 April, 2023'),
(8, '5', 'desg', 'Bachelor Of Science In Information Technology', '16 April, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `depart`
--

CREATE TABLE `depart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `depart`
--

INSERT INTO `depart` (`id`, `departid`, `department`, `description`, `created_at`, `updated_at`) VALUES
(1, '1', 'ITE', 'It Department', '2023-04-16 08:13:35', '2023-04-16 08:13:35'),
(2, '2', 'BITE', 'Business And It Education', '2023-04-16 08:13:54', '2023-04-16 08:13:54'),
(3, '3', 'TEA', 'Teacher Education Department', '2023-04-16 08:14:11', '2023-04-16 08:14:11'),
(6, '4', 'Bangla', 'Bangla Department', '2023-04-16 09:15:26', '2023-04-16 09:15:26'),
(7, '5', 'It', 'It Department', '2023-04-16 09:27:52', '2023-04-16 09:27:52');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_08_022754_add_crouse_migration', 1),
(6, '2023_04_08_023412_drop_crouse_migration', 2),
(7, '2023_04_08_024126_add_crouse_migration', 3),
(8, '2023_04_09_082405_depart_migration', 4),
(9, '2023_04_09_091623_add_crouse_mmigration', 5),
(10, '2023_04_09_093143_add_migration', 6),
(11, '2023_04_11_021949_student_migration', 7),
(12, '2023_04_11_091418_attenden_migration', 8),
(13, '2023_04_14_042747_add_student_migration', 9),
(14, '2023_04_15_024623_class_migration', 10),
(15, '2023_04_16_025255_user_migration', 11),
(16, '2023_04_16_082607_crouse_and_depart_migration', 12);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` bigint(20) NOT NULL,
  `mobile` int(11) NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crouse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `roll`, `mobile`, `class`, `crouse`, `depart`, `photo`, `date`) VALUES
(1, 'Alamin', 10, 1740816676, 'FIve', 'BSIT', 'BITE', 'http://127.0.0.1:8000/storage/img/1681624029.jpg', '31 January, 2023'),
(2, 'Sojib', 11, 173490385, 'FIve', 'BEED', 'TEA', 'http://127.0.0.1:8000/storage/img/1681624036.jpg', '12 April, 2023'),
(3, 'Maruf', 12, 1740816676, 'FIve', 'BSED Financial Management', 'TEA', 'http://127.0.0.1:8000/storage/img/1681624080.jpg', '13 March, 2023'),
(4, 'Mofijul', 13, 1740816676, 'FIve', 'BSIT', 'ITE', 'http://127.0.0.1:8000/storage/img/1681624109.jpg', '22 March, 2023'),
(5, 'Mijan', 14, 1740816676, 'FIve', 'BSED', 'BITE', 'http://127.0.0.1:8000/storage/img/1681624141.jpg', '28 February, 2023'),
(6, 'Hiron', 15, 1740816676, 'FIve', 'BSED', 'Bangla', 'http://127.0.0.1:8000/storage/img/1681624950.jpg', '28 February, 2023');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attenden`
--
ALTER TABLE `attenden`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crouse`
--
ALTER TABLE `crouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depart`
--
ALTER TABLE `depart`
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
-- Indexes for table `student`
--
ALTER TABLE `student`
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
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attenden`
--
ALTER TABLE `attenden`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `crouse`
--
ALTER TABLE `crouse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `depart`
--
ALTER TABLE `depart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 01, 2021 at 01:23 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `schoolManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_score` bigint(20) NOT NULL DEFAULT '0',
  `exam_score` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `student_id`, `subject_id`, `term`, `test_score`, `exam_score`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Term_2', 234, 82, '2020-10-13 15:42:27', '2021-01-01 09:50:07'),
(2, 1, 2, 'Term_3', 234, 82, '2020-10-13 15:42:52', '2021-01-01 09:50:07'),
(3, 2, 2, 'Term_3', 147, 89, '2020-10-13 15:44:03', '2021-01-01 09:50:07'),
(4, 3, 2, 'Term_3', 168, 85, '2020-10-13 15:44:03', '2021-01-01 09:50:07'),
(5, 4, 2, 'Term_3', 172, 79, '2020-10-13 15:44:04', '2021-01-01 09:50:07'),
(6, 5, 1, 'Term_1', 87, 78, '2020-10-13 16:16:46', '2020-10-14 02:45:49'),
(7, 5, 2, 'Term_2', 75, 78, '2020-10-14 02:20:50', '2020-10-14 02:45:49'),
(8, 6, 2, 'Term_2', 90, 98, '2020-10-14 02:20:50', '2020-10-14 02:45:49'),
(9, 7, 1, 'Term_3', 56, 78, '2020-10-14 02:37:18', '2020-10-14 02:46:28'),
(10, 8, 1, 'Term_3', 76, 78, '2020-10-14 02:37:18', '2020-10-14 02:46:28'),
(11, 9, 1, 'Term_3', 56, 98, '2020-10-14 02:37:18', '2020-10-14 02:46:28'),
(12, 10, 1, 'Term_3', 86, 90, '2020-10-14 02:37:18', '2020-10-14 02:46:28'),
(13, 11, 1, 'Term_3', 74, 76, '2020-10-14 02:37:18', '2020-10-14 02:46:28'),
(14, 12, 1, 'Term_3', 65, 66, '2020-10-14 02:37:18', '2020-10-14 02:46:28'),
(15, 7, 1, 'Term_1', 143, 78, '2020-10-14 02:38:25', '2020-10-14 02:46:28'),
(16, 8, 1, 'Term_1', 151, 78, '2020-10-14 02:38:25', '2020-10-14 02:46:28'),
(17, 9, 1, 'Term_1', 151, 98, '2020-10-14 02:38:25', '2020-10-14 02:46:28'),
(18, 10, 1, 'Term_1', 152, 90, '2020-10-14 02:38:25', '2020-10-14 02:46:28'),
(19, 11, 1, 'Term_1', 157, 76, '2020-10-14 02:38:25', '2020-10-14 02:46:28'),
(20, 12, 1, 'Term_1', 152, 66, '2020-10-14 02:38:25', '2020-10-14 02:46:28'),
(21, 7, 1, 'Term_2', 130, 78, '2020-10-14 02:38:45', '2020-10-14 02:46:28'),
(22, 8, 1, 'Term_2', 168, 78, '2020-10-14 02:38:45', '2020-10-14 02:46:28'),
(23, 9, 1, 'Term_2', 144, 98, '2020-10-14 02:38:45', '2020-10-14 02:46:28'),
(24, 10, 1, 'Term_2', 130, 90, '2020-10-14 02:38:45', '2020-10-14 02:46:28'),
(25, 11, 1, 'Term_2', 156, 76, '2020-10-14 02:38:45', '2020-10-14 02:46:28'),
(26, 12, 1, 'Term_2', 144, 66, '2020-10-14 02:38:45', '2020-10-14 02:46:28'),
(27, 1, 2, 'Term_1', 0, 82, '2020-10-14 02:48:10', '2021-01-01 09:50:07'),
(28, 2, 2, 'Term_1', 0, 89, '2020-10-14 02:48:10', '2021-01-01 09:50:07'),
(29, 3, 2, 'Term_1', 0, 85, '2020-10-14 02:48:10', '2021-01-01 09:50:07'),
(30, 4, 2, 'Term_1', 0, 79, '2020-10-14 02:48:10', '2021-01-01 09:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Primary 1', 1, '2020-08-24 23:19:35', '2020-08-26 00:15:36'),
(2, 'Primary 2', 1, '2020-08-26 21:53:02', '2020-08-26 21:53:33'),
(3, 'Primary 3', 1, '2020-08-26 21:53:07', '2020-08-26 21:53:35'),
(4, 'Primary 4', 1, '2020-08-26 21:53:12', '2020-08-26 21:53:37'),
(5, 'Primary 5', 1, '2020-08-26 21:53:16', '2020-08-26 21:53:39'),
(6, 'Primary 6', 1, '2020-08-26 21:53:21', '2020-08-26 21:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `class_subjects`
--

CREATE TABLE `class_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_subjects`
--

INSERT INTO `class_subjects` (`id`, `class_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(15, 2, 2, '2020-08-27 22:55:13', '2020-08-27 22:55:13'),
(16, 2, 1, '2020-08-27 22:55:13', '2020-08-27 22:55:13'),
(17, 1, 2, '2020-08-27 22:56:38', '2020-08-27 22:56:38'),
(18, 3, 1, '2020-08-28 00:08:52', '2020-08-28 00:08:52'),
(19, 3, 2, '2020-08-28 00:08:52', '2020-08-28 00:08:52'),
(20, 4, 2, '2020-08-28 00:09:04', '2020-08-28 00:09:04'),
(21, 4, 1, '2020-08-28 00:09:04', '2020-08-28 00:09:04'),
(22, 5, 2, '2020-08-28 00:09:15', '2020-08-28 00:09:15'),
(23, 5, 1, '2020-08-28 00:09:15', '2020-08-28 00:09:15'),
(24, 6, 2, '2020-08-28 00:09:24', '2020-08-28 00:09:24'),
(25, 6, 1, '2020-08-28 00:09:24', '2020-08-28 00:09:24'),
(26, 1, 1, '2020-08-28 00:10:22', '2020-08-28 00:10:22'),
(27, 1, 4, '2020-10-11 08:38:07', '2020-10-11 08:38:07'),
(28, 2, 4, '2020-10-11 08:38:21', '2020-10-11 08:38:21'),
(29, 2, 3, '2020-10-11 08:38:21', '2020-10-11 08:38:21'),
(30, 3, 4, '2020-10-11 08:38:39', '2020-10-11 08:38:39'),
(31, 3, 3, '2020-10-11 08:38:39', '2020-10-11 08:38:39'),
(32, 4, 4, '2020-10-14 02:44:15', '2020-10-14 02:44:15'),
(33, 4, 3, '2020-10-14 02:44:15', '2020-10-14 02:44:15'),
(34, 1, 3, '2020-10-14 02:44:38', '2020-10-14 02:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Science', 'Topics on science', 1, '2020-08-24 23:30:34', '2020-08-26 00:35:39'),
(2, 'General Arts', 'Study of Geometry and other arts', 1, '2020-08-24 23:35:32', '2020-08-26 00:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type_id` bigint(20) NOT NULL,
  `event_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event`, `event_type_id`, `event_date`, `created_at`, `updated_at`) VALUES
(1, 'not me', 1, '2020-12-30', '2020-12-30 00:11:54', '2020-12-30 00:11:54'),
(2, 'wakings steel', 4, '2020-12-31', '2020-12-30 18:58:17', '2020-12-30 18:58:17'),
(3, 'wakings steel', 4, '2021-01-01', '2020-12-30 18:58:17', '2020-12-30 18:58:17'),
(4, 'wakings steel', 4, '2021-01-02', '2020-12-30 18:58:17', '2020-12-30 18:58:17'),
(5, 'wakings steel', 4, '2021-01-03', '2020-12-30 18:58:17', '2020-12-30 18:58:17'),
(6, 'wakings steel', 4, '2021-01-04', '2020-12-30 18:58:17', '2020-12-30 18:58:17'),
(7, 'wakings steel', 4, '2021-01-05', '2020-12-30 18:58:17', '2020-12-30 18:58:17'),
(8, 'wakings steel', 4, '2021-01-06', '2020-12-30 18:58:17', '2020-12-30 18:58:17'),
(9, 'Eats day', 3, '2021-01-08', '2020-12-30 19:01:15', '2020-12-30 19:01:15'),
(10, 'Zoo visit', 4, '2021-03-11', '2020-12-31 05:02:28', '2020-12-31 05:02:28'),
(11, 'Zoo visit', 4, '2021-03-12', '2020-12-31 05:02:28', '2020-12-31 05:02:28'),
(12, 'Zoo visit', 4, '2021-03-13', '2020-12-31 05:02:28', '2020-12-31 05:02:28'),
(13, 'Zoo visit', 4, '2021-03-14', '2020-12-31 05:02:28', '2020-12-31 05:02:28'),
(14, 'Zoo visit', 4, '2021-03-15', '2020-12-31 05:02:28', '2020-12-31 05:02:28'),
(15, 'Zoo visit', 4, '2021-03-16', '2020-12-31 05:02:28', '2020-12-31 05:02:28'),
(16, 'Zoo visit', 4, '2021-03-17', '2020-12-31 05:02:28', '2020-12-31 05:02:28'),
(17, 'Holiday season', 1, '2021-02-04', '2020-12-31 05:03:51', '2020-12-31 05:03:51'),
(18, 'test', 1, '2021-01-02', '2020-12-31 05:05:00', '2020-12-31 05:05:00'),
(19, 'test', 1, '2021-01-03', '2020-12-31 05:05:00', '2020-12-31 05:05:00'),
(20, 'work today', 1, '2021-01-05', '2020-12-31 05:08:17', '2020-12-31 05:08:17'),
(21, 'work today', 1, '2021-01-06', '2020-12-31 05:08:17', '2020-12-31 05:08:17'),
(22, 'work today', 1, '2021-01-07', '2020-12-31 05:08:17', '2020-12-31 05:08:17'),
(23, 'work today', 1, '2021-01-08', '2020-12-31 05:08:17', '2020-12-31 05:08:17'),
(24, 'work today', 1, '2021-01-09', '2020-12-31 05:08:17', '2020-12-31 05:08:17'),
(25, 'kids event', 3, '2021-01-03', '2020-12-31 05:11:16', '2020-12-31 05:11:16'),
(26, 'kids event', 3, '2021-01-04', '2020-12-31 05:11:16', '2020-12-31 05:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicating_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `event_type`, `indicating_color`, `created_at`, `updated_at`) VALUES
(1, 'Work', 'orange', NULL, NULL),
(2, 'Sports', 'blue', NULL, NULL),
(3, 'Kids', 'yellow', NULL, NULL),
(4, 'Other', 'green', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_academics`
--

CREATE TABLE `exam_academics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_score` bigint(20) NOT NULL DEFAULT '0',
  `date_taken` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_academics`
--

INSERT INTO `exam_academics` (`id`, `student_id`, `subject_id`, `term`, `exam_score`, `date_taken`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Term_1', 82, NULL, '2020-10-04 14:44:37', '2021-01-01 09:50:07'),
(2, 2, 1, 'Term_1', 89, NULL, '2020-10-04 14:44:37', '2021-01-01 09:50:07'),
(3, 3, 1, 'Term_1', 85, NULL, '2020-10-04 14:44:37', '2021-01-01 09:50:07'),
(4, 4, 1, 'Term_1', 79, NULL, '2020-10-04 14:44:37', '2021-01-01 09:50:07'),
(5, 1, 2, 'Term_1', 97, NULL, '2020-10-07 01:41:51', '2021-01-01 09:50:07'),
(6, 2, 2, 'Term_1', 54, NULL, '2020-10-07 01:41:51', '2021-01-01 09:50:07'),
(7, 3, 2, 'Term_1', 76, NULL, '2020-10-07 01:41:51', '2021-01-01 09:50:07'),
(8, 4, 2, 'Term_1', 77, NULL, '2020-10-07 01:41:51', '2021-01-01 09:50:07'),
(9, 1, 2, 'Term_2', 78, NULL, '2020-10-11 08:34:19', '2020-10-13 15:42:27'),
(10, 1, 1, 'Term_2', 76, NULL, '2020-10-11 08:34:19', '2020-10-11 08:34:19'),
(11, 2, 2, 'Term_2', 79, NULL, '2020-10-11 08:34:19', '2020-10-11 08:34:19'),
(12, 2, 1, 'Term_2', 85, NULL, '2020-10-11 08:34:19', '2020-10-11 08:34:19'),
(13, 3, 2, 'Term_2', 67, NULL, '2020-10-11 08:34:19', '2020-10-11 08:34:19'),
(14, 3, 1, 'Term_2', 90, NULL, '2020-10-11 08:34:19', '2020-10-11 08:34:19'),
(15, 4, 2, 'Term_2', 88, NULL, '2020-10-11 08:34:19', '2020-10-11 08:34:19'),
(16, 4, 1, 'Term_2', 73, NULL, '2020-10-11 08:34:19', '2020-10-11 08:34:19'),
(17, 1, 2, 'Term_3', 78, NULL, '2020-10-11 08:34:42', '2020-10-13 15:44:03'),
(18, 2, 2, 'Term_3', 76, NULL, '2020-10-11 08:34:42', '2020-10-13 15:44:03'),
(19, 3, 2, 'Term_3', 77, NULL, '2020-10-11 08:34:42', '2020-10-13 15:44:03'),
(20, 4, 2, 'Term_3', 75, NULL, '2020-10-11 08:34:42', '2020-10-13 15:44:03'),
(21, 1, 1, 'Term_3', 89, NULL, '2020-10-11 08:39:31', '2020-10-13 15:44:03'),
(22, 2, 1, 'Term_3', 75, NULL, '2020-10-11 08:39:31', '2020-10-13 15:44:03'),
(23, 3, 1, 'Term_3', 75, NULL, '2020-10-11 08:39:31', '2020-10-13 15:44:03'),
(24, 4, 1, 'Term_3', 72, NULL, '2020-10-11 08:39:31', '2020-10-13 15:44:04'),
(25, 1, 4, 'Term_2', 53, NULL, '2020-10-13 15:42:27', '2020-10-13 15:42:27'),
(26, 5, 1, 'Term_1', 67, NULL, '2020-10-14 02:45:36', '2020-10-14 02:45:36'),
(27, 5, 2, 'Term_2', 78, NULL, '2020-10-14 02:45:49', '2020-10-14 02:45:49'),
(28, 6, 2, 'Term_2', 98, NULL, '2020-10-14 02:45:49', '2020-10-14 02:45:49'),
(29, 7, 2, 'Term_1', 98, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(30, 7, 1, 'Term_1', 78, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(31, 8, 2, 'Term_1', 86, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(32, 8, 1, 'Term_1', 78, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(33, 9, 2, 'Term_1', 65, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(34, 9, 1, 'Term_1', 98, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(35, 10, 2, 'Term_1', 87, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(36, 10, 1, 'Term_1', 90, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(37, 11, 2, 'Term_1', 85, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(38, 11, 1, 'Term_1', 76, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(39, 12, 2, 'Term_1', 74, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(40, 12, 1, 'Term_1', 66, NULL, '2020-10-14 02:46:28', '2020-10-14 02:46:28'),
(41, 1, 4, 'Term_1', 78, NULL, '2020-10-14 02:48:10', '2021-01-01 09:50:07'),
(42, 2, 4, 'Term_1', 65, NULL, '2020-10-14 02:48:10', '2021-01-01 09:50:07'),
(43, 3, 4, 'Term_1', 77, NULL, '2020-10-14 02:48:10', '2021-01-01 09:50:07'),
(44, 4, 4, 'Term_1', 56, NULL, '2020-10-14 02:48:10', '2021-01-01 09:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_07_093334_create_students_table', 1),
(5, '2020_08_10_010403_create_courses_table', 1),
(6, '2020_08_10_010414_create_classes_table', 1),
(7, '2020_08_10_011706_create_staff_courses_table', 2),
(8, '2020_08_10_015330_create_subjects_table', 3),
(9, '2020_08_10_015445_create_academics_table', 4),
(10, '2020_08_10_020449_create_exam_academics_table', 4),
(11, '2020_08_10_020500_create_test_academics_table', 4),
(12, '2020_08_19_094548_change_active_column_in_users_table', 5),
(13, '2020_08_19_094607_add_column_in_students_table', 5),
(14, '2020_08_19_100817_change_active_column_in_users_table', 6),
(15, '2020_08_24_222924_add_column_to_classes_table', 7),
(16, '2020_08_24_223057_add_column_to_students_table', 8),
(17, '2020_08_24_234837_add_column_to_subjects_table', 9),
(18, '2020_08_26_221038_create_class_subjects_table', 10),
(19, '2020_08_30_060512_add_column_to_test_academics_table', 11),
(20, '2020_08_30_060806_add_column_to_test_academics_table', 12),
(21, '2020_08_30_061625_add_column_to_test_academics_table', 13),
(22, '2020_09_03_230841_add_column_to_test_academics_table', 14),
(23, '2020_10_16_232329_add_columns_to_students_table', 15),
(24, '2020_10_16_233253_create_teacher_student_comments_table', 16),
(25, '2020_10_17_012213_add_another_column_to_students_table', 17),
(26, '2020_10_17_015531_add_another_column_to_students_table', 18),
(27, '2020_10_17_082451_add_column_to__teacher_student_comment', 19),
(28, '2020_12_13_142945_add_some_columns_to_students_table', 20),
(29, '2020_12_29_233419_create_events_table', 21),
(30, '2020_12_29_233934_create_event_types_table', 21),
(31, '2020_12_30_000457_add_column_to_events_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_courses`
--

CREATE TABLE `staff_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_history` text COLLATE utf8mb4_unicode_ci,
  `hobbies` text COLLATE utf8mb4_unicode_ci,
  `guardian_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `active` smallint(6) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`, `address`, `contact_number`, `dob`, `country`, `city`, `avatar`, `class`, `course`, `medical_history`, `hobbies`, `guardian_contact`, `guardian_email`, `description`, `active`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Bede', 'Abbe', 'bede.abbe91@gmail.com', 'Box 678, Seven street', NULL, NULL, 'Ghana', 'Accra', 'student-avatars/1598310732vvd2.jpg', 'Primary 1', 'General Arts', 'Asthma, AS', 'Swimming, running, dancing', '233557881327', NULL, '5,8\", brown eyes, black hair', 1, '2020-08-24 23:12:12', NULL, '2020-08-24 23:12:12', '2020-12-13 14:42:07'),
(2, 'Jason', 'Henks', 'jhenks@gmail.com', 'Box 12, Elm\'s street', NULL, NULL, NULL, NULL, 'student-avatars/1598405181menro.jpg', 'Primary 1', 'General Arts', NULL, NULL, NULL, NULL, NULL, 1, '2020-08-26 01:26:21', NULL, '2020-08-26 01:26:21', '2020-08-26 01:29:43'),
(3, 'Kelvin', 'Kpang', 'kelvin.kpang@gmail.com', 'Box 72', NULL, NULL, NULL, NULL, 'student-avatars/1598405260lady.jpg', 'Primary 1', 'Science', NULL, NULL, NULL, NULL, NULL, 1, '2020-08-26 01:27:40', NULL, '2020-08-26 01:27:40', '2020-08-26 01:29:41'),
(4, 'Margaret', 'Bentoi', 'bentoim2229@yahoo.com', 'stans bridge 441, Accra', NULL, NULL, NULL, NULL, 'student-avatars/1598405333thierry.jpg', 'Primary 1', 'Science', NULL, NULL, NULL, NULL, NULL, 1, '2020-08-26 01:28:53', NULL, '2020-08-26 01:28:53', '2020-08-26 01:29:39'),
(5, 'Camron', 'Yiadom', 'yiadom@gmail.com', 'P. O. Box 12', NULL, NULL, NULL, NULL, 'student-avatars/1598773488image2meeting.jpeg', 'Primary 2', 'General Arts', NULL, NULL, NULL, NULL, NULL, 1, '2020-08-30 07:44:48', NULL, '2020-08-30 07:44:48', '2020-08-30 07:46:16'),
(6, 'Jason', 'Bambee', 'bambeefarm_j@hotmail.com', 'K. Sarpong street, Box 89', NULL, NULL, NULL, NULL, 'student-avatars/1598773563blackBoy.jpg', 'Primary 2', 'Science', NULL, NULL, NULL, NULL, 'Tall dark boy with confidence', 1, '2020-08-30 07:46:03', NULL, '2020-08-30 07:46:03', '2020-10-17 08:19:51'),
(7, 'Matilda', 'Osei', 'tillyosei@yahoo.com', 'Box 3', NULL, NULL, NULL, NULL, 'student-avatars/1602642323thierry.jpg', 'Primary 3', 'Science', NULL, NULL, NULL, NULL, NULL, 1, '2020-10-14 02:25:23', NULL, '2020-10-14 02:25:24', '2020-10-14 02:25:49'),
(8, 'Henry', 'Mponda', 'henrymponda@yahoo.com', 'Box 2', NULL, NULL, NULL, NULL, 'student-avatars/1602642387thierry.jpg', 'Primary 3', 'Science', NULL, NULL, NULL, NULL, NULL, 1, '2020-10-14 02:26:27', NULL, '2020-10-14 02:26:27', '2020-10-14 02:31:00'),
(9, 'Lakeshire', 'Bradt', 'bradt@yahoo.com', 'Box 12', NULL, NULL, NULL, NULL, 'student-avatars/1602642432thierry.jpg', 'Primary 3', 'Science', NULL, NULL, NULL, NULL, NULL, 1, '2020-10-14 02:27:12', NULL, '2020-10-14 02:27:12', '2020-10-14 02:31:01'),
(10, 'Coolio', 'Jameson', 'jamesoncoolio@gmail.com', 'box 992', NULL, NULL, NULL, NULL, 'student-avatars/1602642474vvd2.jpg', 'Primary 3', 'General Arts', NULL, NULL, NULL, NULL, NULL, 1, '2020-10-14 02:27:54', NULL, '2020-10-14 02:27:54', '2020-10-14 02:31:04'),
(11, 'Yte', 'Yiadom', 'yte@yahoo.com', 'Box 72', NULL, NULL, NULL, NULL, 'student-avatars/1602642507thierry.jpg', 'Primary 3', 'General Arts', NULL, NULL, NULL, NULL, NULL, 1, '2020-10-14 02:28:27', NULL, '2020-10-14 02:28:27', '2020-10-14 02:31:05'),
(12, 'Unor', 'Crape', 'unor@gmail.com', 'Box 678, Seven street', NULL, NULL, NULL, NULL, 'student-avatars/1602642595thierry.jpg', 'Primary 3', 'General Arts', NULL, NULL, NULL, NULL, NULL, 1, '2020-10-14 02:29:55', NULL, '2020-10-14 02:29:55', '2020-10-14 02:31:07'),
(13, 'Mussolini', 'Forster', 'mussolini@yahoo.com', 'Box 2', NULL, NULL, NULL, NULL, 'student-avatars/1602642643thierry.jpg', 'Primary 4', 'Science', NULL, NULL, NULL, NULL, NULL, 1, '2020-10-14 02:30:43', NULL, '2020-10-14 02:30:43', '2020-10-14 02:31:11'),
(14, 'Kithau', 'Pride', 'kithaupride@yahoo.com', 'box 992', NULL, NULL, NULL, NULL, 'student-avatars/1602642718thierry.jpg', 'Primary 4', 'General Arts', NULL, NULL, NULL, NULL, NULL, 1, '2020-10-14 02:31:58', NULL, '2020-10-14 02:31:58', '2020-10-14 02:34:45'),
(15, 'Pablo', 'Mascort', 'pmars@yahoo.com', 'Box 12', NULL, NULL, NULL, NULL, 'student-avatars/1602642750thierry.jpg', 'Primary 4', 'General Arts', NULL, NULL, NULL, NULL, NULL, 1, '2020-10-14 02:32:30', NULL, '2020-10-14 02:32:30', '2020-10-14 02:34:47'),
(16, 'Unrow', 'March', 'marchunrow@gmail.com', 'Box 72', NULL, NULL, NULL, NULL, 'student-avatars/1602642783thierry.jpg', 'Primary 4', 'Science', NULL, NULL, NULL, NULL, NULL, 1, '2020-10-14 02:33:03', NULL, '2020-10-14 02:33:03', '2020-10-14 02:34:48'),
(17, 'Ludendoriff', 'Broth', 'ludenbroth@yahoo.com', 'box 9922', NULL, NULL, NULL, NULL, 'student-avatars/1602642868thierry.jpg', 'Primary 4', 'Science', NULL, NULL, NULL, NULL, NULL, 1, '2020-10-14 02:34:28', NULL, '2020-10-14 02:34:28', '2020-10-14 02:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` smallint(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `course_id`, `subject_name`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Integrated Science', 1, '2020-08-24 23:49:35', '2020-08-26 00:46:19'),
(2, 1, 'Agriculture', 1, '2020-08-24 23:50:28', '2020-08-26 00:46:59'),
(3, 2, 'Geology', 1, '2020-08-30 07:48:29', '2020-08-30 07:48:42'),
(4, 2, 'French', 1, '2020-10-11 08:37:19', '2020-10-11 08:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_student_comments`
--

CREATE TABLE `teacher_student_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_student_comments`
--

INSERT INTO `teacher_student_comments` (`id`, `student_id`, `staff_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'Good boy with intellectual ideas and others', '2020-10-17 08:44:56', '2020-12-13 14:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `test_academics`
--

CREATE TABLE `test_academics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_score` bigint(20) NOT NULL DEFAULT '0',
  `date_taken` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_academics`
--

INSERT INTO `test_academics` (`id`, `student_id`, `subject_id`, `test_name`, `term`, `test_score`, `date_taken`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'test 1', 'Term_1', 78, NULL, '2020-09-03 23:09:22', '2020-09-03 23:09:22'),
(4, 2, 1, 'test 1', 'Term_1', 76, NULL, '2020-09-03 23:09:22', '2020-09-03 23:09:22'),
(5, 3, 1, 'test 1', 'Term_1', 84, NULL, '2020-09-03 23:09:22', '2020-09-03 23:09:22'),
(6, 4, 1, 'test 1', 'Term_1', 73, NULL, '2020-09-03 23:09:22', '2020-09-03 23:09:22'),
(7, 1, 1, 'test 2', 'Term_1', 85, NULL, '2020-09-03 23:27:30', '2020-09-03 23:27:30'),
(8, 2, 1, 'test 2', 'Term_1', 87, NULL, '2020-09-03 23:27:30', '2020-09-03 23:27:30'),
(9, 3, 1, 'test 2', 'Term_1', 79, NULL, '2020-09-03 23:27:30', '2020-09-03 23:27:30'),
(10, 4, 1, 'test 2', 'Term_1', 80, NULL, '2020-09-03 23:27:30', '2020-09-03 23:27:30'),
(11, 1, 1, 'Haulass', 'Term_1', 89, NULL, '2020-09-03 23:37:00', '2020-10-11 07:45:38'),
(12, 2, 1, 'Haulass', 'Term_1', 76, NULL, '2020-09-03 23:37:00', '2020-10-11 07:45:38'),
(13, 3, 1, 'Haulass', 'Term_1', 73, NULL, '2020-09-03 23:37:00', '2020-10-11 07:45:38'),
(14, 4, 1, 'Haulass', 'Term_1', 80, NULL, '2020-09-03 23:37:00', '2020-10-11 07:45:38'),
(15, 1, 2, 'HaulAss2', 'Term_1', 63, NULL, '2020-09-03 23:38:08', '2020-09-03 23:38:08'),
(16, 2, 2, 'HaulAss2', 'Term_1', 75, NULL, '2020-09-03 23:38:08', '2020-09-03 23:38:08'),
(17, 3, 2, 'HaulAss2', 'Term_1', 59, NULL, '2020-09-03 23:38:08', '2020-09-03 23:38:08'),
(18, 4, 2, 'HaulAss2', 'Term_1', 57, NULL, '2020-09-03 23:38:08', '2020-09-03 23:38:08'),
(19, 1, 2, 'The test', 'Term_1', 56, NULL, '2020-09-03 23:42:32', '2020-09-03 23:42:32'),
(20, 2, 2, 'The test', 'Term_1', 57, NULL, '2020-09-03 23:42:32', '2020-09-03 23:42:32'),
(21, 3, 2, 'The test', 'Term_1', 62, NULL, '2020-09-03 23:42:32', '2020-09-03 23:42:32'),
(22, 4, 2, 'The test', 'Term_1', 60, NULL, '2020-09-03 23:42:32', '2020-09-03 23:42:32'),
(23, 1, 1, 'Integrated Ultimate test', 'Term_2', 76, NULL, '2020-10-11 08:04:31', '2020-10-11 08:04:31'),
(24, 2, 1, 'Integrated Ultimate test', 'Term_2', 67, NULL, '2020-10-11 08:04:31', '2020-10-11 08:04:31'),
(25, 3, 1, 'Integrated Ultimate test', 'Term_2', 69, NULL, '2020-10-11 08:04:31', '2020-10-11 08:04:31'),
(26, 4, 1, 'Integrated Ultimate test', 'Term_2', 70, NULL, '2020-10-11 08:04:31', '2020-10-11 08:04:31'),
(27, 1, 2, 'Agricuture Ultimate test', 'Term_2', 54, NULL, '2020-10-11 08:05:26', '2020-10-11 08:05:26'),
(28, 2, 2, 'Agricuture Ultimate test', 'Term_2', 78, NULL, '2020-10-11 08:05:26', '2020-10-11 08:05:26'),
(29, 3, 2, 'Agricuture Ultimate test', 'Term_2', 64, NULL, '2020-10-11 08:05:26', '2020-10-11 08:05:26'),
(30, 4, 2, 'Agricuture Ultimate test', 'Term_2', 59, NULL, '2020-10-11 08:05:26', '2020-10-11 08:05:26'),
(31, 1, 2, 'By the way', 'Term_3', 89, NULL, '2020-10-11 08:06:39', '2020-10-11 08:06:39'),
(32, 2, 2, 'By the way', 'Term_3', 80, NULL, '2020-10-11 08:06:39', '2020-10-11 08:06:39'),
(33, 3, 2, 'By the way', 'Term_3', 79, NULL, '2020-10-11 08:06:39', '2020-10-11 08:06:39'),
(34, 4, 2, 'By the way', 'Term_3', 82, NULL, '2020-10-11 08:06:39', '2020-10-11 08:06:39'),
(35, 1, 1, 'test 3', 'Term_3', 78, NULL, '2020-10-11 08:35:22', '2020-10-11 08:35:22'),
(36, 2, 1, 'test 3', 'Term_3', 67, NULL, '2020-10-11 08:35:22', '2020-10-11 08:35:22'),
(37, 3, 1, 'test 3', 'Term_3', 89, NULL, '2020-10-11 08:35:22', '2020-10-11 08:35:22'),
(38, 4, 1, 'test 3', 'Term_3', 90, NULL, '2020-10-11 08:35:22', '2020-10-11 08:35:22'),
(39, 1, 4, 'Ideology 1', 'Term_1', 67, NULL, '2020-10-11 08:45:37', '2020-10-11 08:45:37'),
(40, 2, 4, 'Ideology 1', 'Term_1', 71, NULL, '2020-10-11 08:45:37', '2020-10-11 08:45:37'),
(41, 3, 4, 'Ideology 1', 'Term_1', 72, NULL, '2020-10-11 08:45:37', '2020-10-11 08:45:37'),
(42, 4, 4, 'Ideology 1', 'Term_1', 58, NULL, '2020-10-11 08:45:37', '2020-10-11 08:45:37'),
(43, 1, 4, 'Ideology 2', 'Term_1', 65, NULL, '2020-10-11 08:45:53', '2020-10-11 08:45:58'),
(44, 2, 4, 'Ideology 2', 'Term_1', 67, NULL, '2020-10-11 08:45:53', '2020-10-11 08:45:58'),
(45, 3, 4, 'Ideology 2', 'Term_1', 62, NULL, '2020-10-11 08:45:53', '2020-10-11 08:45:58'),
(46, 4, 4, 'Ideology 2', 'Term_1', 51, NULL, '2020-10-11 08:45:53', '2020-10-11 08:45:58'),
(47, 1, 4, 'Ideology 3', 'Term_2', 78, NULL, '2020-10-11 08:46:28', '2020-10-11 08:46:41'),
(48, 2, 4, 'Ideology 3', 'Term_2', 76, NULL, '2020-10-11 08:46:28', '2020-10-11 08:46:41'),
(49, 3, 4, 'Ideology 3', 'Term_2', 74, NULL, '2020-10-11 08:46:28', '2020-10-11 08:46:41'),
(50, 4, 4, 'Ideology 3', 'Term_2', 77, NULL, '2020-10-11 08:46:28', '2020-10-11 08:46:41'),
(51, 1, 4, 'French test 1', 'Term_3', 67, NULL, '2020-10-13 16:13:29', '2020-10-13 16:15:31'),
(52, 5, 1, 'Science test 1', 'Term_1', 50, NULL, '2020-10-13 16:16:19', '2020-10-13 17:36:30'),
(53, 5, 2, 'Black Panther', 'Term_2', 75, NULL, '2020-10-14 02:20:50', '2020-10-14 02:23:10'),
(54, 6, 2, 'Black Panther', 'Term_2', 90, NULL, '2020-10-14 02:20:50', '2020-10-14 02:23:10'),
(55, 7, 1, 'Remedy test 1', 'Term_3', 56, NULL, '2020-10-14 02:37:18', '2020-10-14 02:37:18'),
(56, 8, 1, 'Remedy test 1', 'Term_3', 76, NULL, '2020-10-14 02:37:18', '2020-10-14 02:37:18'),
(57, 9, 1, 'Remedy test 1', 'Term_3', 56, NULL, '2020-10-14 02:37:18', '2020-10-14 02:37:18'),
(58, 10, 1, 'Remedy test 1', 'Term_3', 86, NULL, '2020-10-14 02:37:18', '2020-10-14 02:37:18'),
(59, 11, 1, 'Remedy test 1', 'Term_3', 74, NULL, '2020-10-14 02:37:18', '2020-10-14 02:37:18'),
(60, 12, 1, 'Remedy test 1', 'Term_3', 65, NULL, '2020-10-14 02:37:18', '2020-10-14 02:37:18'),
(61, 7, 1, 'Remedy test 2', 'Term_2', 65, NULL, '2020-10-14 02:37:43', '2020-10-14 02:38:45'),
(62, 8, 1, 'Remedy test 2', 'Term_2', 84, NULL, '2020-10-14 02:37:43', '2020-10-14 02:38:45'),
(63, 9, 1, 'Remedy test 2', 'Term_2', 72, NULL, '2020-10-14 02:37:43', '2020-10-14 02:38:45'),
(64, 10, 1, 'Remedy test 2', 'Term_2', 65, NULL, '2020-10-14 02:37:43', '2020-10-14 02:38:45'),
(65, 11, 1, 'Remedy test 2', 'Term_2', 78, NULL, '2020-10-14 02:37:43', '2020-10-14 02:38:45'),
(66, 12, 1, 'Remedy test 2', 'Term_2', 72, NULL, '2020-10-14 02:37:43', '2020-10-14 02:38:45'),
(67, 7, 1, 'Remedy test 4', 'Term_2', 65, NULL, '2020-10-14 02:38:53', '2020-10-14 02:38:53'),
(68, 8, 1, 'Remedy test 4', 'Term_2', 84, NULL, '2020-10-14 02:38:53', '2020-10-14 02:38:53'),
(69, 9, 1, 'Remedy test 4', 'Term_2', 72, NULL, '2020-10-14 02:38:53', '2020-10-14 02:38:53'),
(70, 10, 1, 'Remedy test 4', 'Term_2', 65, NULL, '2020-10-14 02:38:53', '2020-10-14 02:38:53'),
(71, 11, 1, 'Remedy test 4', 'Term_2', 78, NULL, '2020-10-14 02:38:53', '2020-10-14 02:38:53'),
(72, 12, 1, 'Remedy test 4', 'Term_2', 72, NULL, '2020-10-14 02:38:53', '2020-10-14 02:38:53'),
(73, 7, 1, 'Remedy test 7', 'Term_1', 65, NULL, '2020-10-14 02:39:02', '2020-10-14 02:39:02'),
(74, 8, 1, 'Remedy test 7', 'Term_1', 84, NULL, '2020-10-14 02:39:02', '2020-10-14 02:39:02'),
(75, 9, 1, 'Remedy test 7', 'Term_1', 72, NULL, '2020-10-14 02:39:02', '2020-10-14 02:39:02'),
(76, 10, 1, 'Remedy test 7', 'Term_1', 65, NULL, '2020-10-14 02:39:02', '2020-10-14 02:39:02'),
(77, 11, 1, 'Remedy test 7', 'Term_1', 78, NULL, '2020-10-14 02:39:02', '2020-10-14 02:39:02'),
(78, 12, 1, 'Remedy test 7', 'Term_1', 72, NULL, '2020-10-14 02:39:02', '2020-10-14 02:39:02'),
(79, 7, 2, 'Remedy test 8', 'Term_1', 78, NULL, '2020-10-14 02:39:36', '2020-10-14 02:39:36'),
(80, 8, 2, 'Remedy test 8', 'Term_1', 67, NULL, '2020-10-14 02:39:36', '2020-10-14 02:39:36'),
(81, 9, 2, 'Remedy test 8', 'Term_1', 79, NULL, '2020-10-14 02:39:36', '2020-10-14 02:39:36'),
(82, 10, 2, 'Remedy test 8', 'Term_1', 87, NULL, '2020-10-14 02:39:36', '2020-10-14 02:39:36'),
(83, 11, 2, 'Remedy test 8', 'Term_1', 79, NULL, '2020-10-14 02:39:36', '2020-10-14 02:39:36'),
(84, 12, 2, 'Remedy test 8', 'Term_1', 80, NULL, '2020-10-14 02:39:36', '2020-10-14 02:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` smallint(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Michael Standey', 'michaelstandey', 'michaelstandey@gmail.com', NULL, '$2y$10$vvyeyQ96H/H62dkUY6SM9u8B5SDy.WUjwrCdx7ozIv4cc3sX.InFC', NULL, 1, '2020-08-19 10:47:26', '2020-08-26 01:08:33'),
(2, 'john snow', 'johnsnow', 'johnsnow@gmail.com', NULL, '$2y$10$MId.wG9MF0tl3F9YxyA21.a8yanOwldGEGAx0NiURrk94jaBuKi7i', NULL, 1, '2020-08-19 12:38:25', '2020-08-26 01:08:20'),
(3, 'john Crow', 'johncrow', 'johncrow@gmail.com', NULL, '$2y$10$S5l9JpPW93KDhQCWSy2Mf.I0yeR3r.4MnuL.CQAwbitkJ3NRzGBqW', NULL, 1, '2020-08-19 12:39:57', '2020-08-26 01:08:24'),
(4, 'cosmos blay', 'cosmos', 'cosmosblay@gmail.com', NULL, '$2y$10$KXwLl01c1ZAooM9DvO7GcetRuLtJ7gdNH6nRcpaIIVTtPybytxcnC', NULL, 1, '2020-08-19 13:54:03', '2020-08-26 01:08:26'),
(5, 'cosmos blaze', 'cosmosb', 'cosmosblay2@gmail.com', NULL, '$2y$10$HWMK.5mFObWQ3tKz2BtBROslBWEa.2KB7OrmIR18xajzkgNIkAho6', NULL, 1, '2020-08-19 13:56:35', '2020-08-26 01:08:28'),
(6, 'Derrick', 'derrick', 'derrick@gmail.com', NULL, '$2y$10$6uw/R3gEs72BlB9fAOq91eUg32eegnPKG5klRBVBMJrDMX2lnYz/2', NULL, 1, '2020-08-19 13:57:13', '2020-08-26 01:08:30'),
(7, 'Quarcoo James', 'qjames', 'qjames@yahoo.com', NULL, '$2y$10$IEN9wJz9TbVFX5qSvR1ef.yWKuCAipNb0ommY0TRpaKwCW790wWk6', NULL, 1, '2020-10-15 14:36:23', '2020-10-15 14:54:47'),
(8, 'admin', 'admin', 'admin@admin.com', NULL, '$2y$10$pwcA4AjcrEi9RRhqSEKuWuOtHG5oKnwLB7l2lZqJcGKJMzZg8v9SS', NULL, 1, '2020-10-15 14:54:23', '2020-10-15 14:54:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academics_student_id_foreign` (`student_id`),
  ADD KEY `academics_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_subjects_class_id_foreign` (`class_id`),
  ADD KEY `class_subjects_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_academics`
--
ALTER TABLE `exam_academics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_academics_student_id_foreign` (`student_id`),
  ADD KEY `exam_academics_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `staff_courses`
--
ALTER TABLE `staff_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_courses_user_id_foreign` (`user_id`),
  ADD KEY `staff_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_course_id_foreign` (`course_id`);

--
-- Indexes for table `teacher_student_comments`
--
ALTER TABLE `teacher_student_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_student_comments_student_id_foreign` (`student_id`),
  ADD KEY `teacher_student_comments_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `test_academics`
--
ALTER TABLE `test_academics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_academics_student_id_foreign` (`student_id`),
  ADD KEY `test_academics_subject_id_foreign` (`subject_id`);

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
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_academics`
--
ALTER TABLE `exam_academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `staff_courses`
--
ALTER TABLE `staff_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_student_comments`
--
ALTER TABLE `teacher_student_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_academics`
--
ALTER TABLE `test_academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academics`
--
ALTER TABLE `academics`
  ADD CONSTRAINT `academics_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `academics_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD CONSTRAINT `class_subjects_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `class_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `exam_academics`
--
ALTER TABLE `exam_academics`
  ADD CONSTRAINT `exam_academics_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `exam_academics_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `staff_courses`
--
ALTER TABLE `staff_courses`
  ADD CONSTRAINT `staff_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `staff_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `teacher_student_comments`
--
ALTER TABLE `teacher_student_comments`
  ADD CONSTRAINT `teacher_student_comments_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `teacher_student_comments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `test_academics`
--
ALTER TABLE `test_academics`
  ADD CONSTRAINT `test_academics_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `test_academics_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

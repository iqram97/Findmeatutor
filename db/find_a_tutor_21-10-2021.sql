-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 03:47 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `find_a_tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `area_image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Sylhet', 'uploads/areas/6103bad3ec0bc.jpg', 1, '2021-07-30 02:39:47', '2021-07-30 02:39:47'),
(4, 'Khulna', 'uploads/areas/6103bade72976.jpg', 1, '2021-07-30 02:39:58', '2021-07-30 02:49:09'),
(5, 'Chittagong', 'uploads/areas/6103beb522ea7.jpg', 1, '2021-07-30 02:40:13', '2021-07-30 02:56:21'),
(7, 'Dhaka', 'uploads/areas/6103be6e092e6.jpg', 1, '2021-07-30 02:55:10', '2021-07-30 02:55:10'),
(8, 'Barisal', 'uploads/areas/6103be8388346.jpg', 1, '2021-07-30 02:55:31', '2021-07-30 02:55:31'),
(9, 'Rajshahi', 'uploads/areas/6103be96714b3.jpg', 1, '2021-07-30 02:55:50', '2021-07-30 02:55:50');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applies`
--

CREATE TABLE `job_applies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applies`
--

INSERT INTO `job_applies` (`id`, `job_id`, `tutor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2021-10-03 05:23:42', '2021-10-03 05:23:42'),
(2, 1, 1, '2021-10-03 05:24:14', '2021-10-03 05:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `job_boards`
--

CREATE TABLE `job_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tuition_type` int(10) UNSIGNED NOT NULL,
  `tuition_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_student` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tutoring_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hire_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_pref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `more_requirement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = pending, 1 = live, 2 = canceled, 3 = appointed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_boards`
--

INSERT INTO `job_boards` (`id`, `user_id`, `tuition_type`, `tuition_type_name`, `institute_name`, `city_id`, `city_name`, `no_of_student`, `address`, `no_of_days`, `category_id`, `category_name`, `tutoring_time`, `class_course`, `hire_date`, `subject`, `salary`, `gender`, `gender_pref`, `more_requirement`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Online Tutoring', NULL, '7', 'Dhaka', 3, 'Sector 7, Uttara', '5 days / week', 2, 'English Version', '5:00 PM', 'pre schooling', '2021-10-21 12:37:01', 'all, english, general math', 5000, 'female', 'female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid blanditiis cumque distinctio ducimus ipsum maxime minima molestias nostrum officiis, omnis perspiciatis sequi similique totam unde. Minus numquam ratione vero!', 3, '2021-08-03 23:54:25', '2021-10-21 06:37:01');

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
(4, '2021_06_22_061104_create_students_table', 1),
(5, '2021_06_22_061119_create_tutors_table', 1),
(7, '2021_07_03_144530_create_web_configs_table', 2),
(8, '2021_07_08_224842_create_subscribers_table', 3),
(11, '2021_07_09_154052_create_areas_table', 4),
(14, '2021_08_02_084754_create_job_boards_table', 5),
(15, '2021_10_03_093903_create_job_applies_table', 6),
(18, '2021_10_03_105037_create_student_notifications_table', 8),
(19, '2021_10_03_105046_create_tutor_notifications_table', 9);

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL COMMENT '1=super_admin,2=admin,3=student/parents,4=tutor',
  `is_active` int(11) NOT NULL COMMENT '0=inactive,1=active,2=pending',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `phone`, `avatar`, `email`, `email_verified_at`, `password`, `role`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'student', '1', NULL, NULL, 'student@gmail.com', NULL, '$2y$10$1yTztbXzVpH6DVZOMMG0kuOmY3XgGu87rIChf6DcYq25C8Tw1ehgi', 3, 1, NULL, '2021-10-03 04:27:44', '2021-10-03 04:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `student_notifications`
--

CREATE TABLE `student_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `is_seen` tinyint(4) NOT NULL DEFAULT 0,
  `is_accept` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = default, 1 = accepted, 2 = declined',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_notifications`
--

INSERT INTO `student_notifications` (`id`, `user_id`, `tutor_id`, `job_id`, `is_seen`, `is_accept`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, 1, 0, '2021-10-03 05:23:42', '2021-10-16 03:27:02'),
(2, 1, 1, 1, 1, 1, '2021-10-03 05:24:15', '2021-10-21 06:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL COMMENT '1=super_admin,2=admin,3=student/parents,4=tutor',
  `is_active` int(11) NOT NULL COMMENT '0=inactive,1=active,2=pending',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `first_name`, `last_name`, `phone`, `avatar`, `email`, `email_verified_at`, `password`, `role`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tutor 1', '33', NULL, 'uploads/tutor/61597c07d5d51.jpg', 'tutor@gmail.com', NULL, '$2y$10$wNPAI5RvvQNBFGemP7p1pu0QB/lWXCG21xc1e/HFySBEBfy8BGCmi', 4, 1, NULL, '2021-10-03 03:46:47', '2021-10-03 03:46:47'),
(6, 'Tutor ', '2', '01235488544', 'uploads/tutor/61597c07d5d51.jpg', 'tutor2@gmail.com', NULL, '$2y$10$wNPAI5RvvQNBFGemP7p1pu0QB/lWXCG21xc1e/HFySBEBfy8BGCmi', 4, 1, NULL, '2021-10-03 03:46:47', '2021-10-03 03:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_notifications`
--

CREATE TABLE `tutor_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `is_seen` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_notifications`
--

INSERT INTO `tutor_notifications` (`id`, `user_id`, `student_id`, `job_id`, `is_seen`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 0, '2021-10-21 06:37:01', '2021-10-21 06:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL COMMENT '1=super_admin,2=admin,3=student/parents,4=tutor',
  `is_active` int(11) NOT NULL COMMENT '0=inactive,1=active,2=pending',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `avatar`, `email`, `email_verified_at`, `password`, `role`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', '0123456789', 'backEnd/images/avatar.jpg', 'admin@gmail.com', NULL, '$2y$10$Qd.SwxtHcicoKWpCPoqvBOM62FeT.Dplca3mCb8xUpaUOcMwUbClu', 1, 1, NULL, '2021-06-22 11:32:19', '2021-06-22 11:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `web_configs`
--

CREATE TABLE `web_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_header_logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_footer_logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_copyright_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_configs`
--

INSERT INTO `web_configs` (`id`, `website_phone`, `website_email`, `website_facebook`, `website_twitter`, `website_linkedin`, `website_header_logo`, `website_footer_logo`, `website_copyright_text`, `created_at`, `updated_at`) VALUES
(1, '+8801712345678', 'info@findatutor.com', '#', '#', '#', 'http://localhost/find_a_tutor/public/uploads/web/60e71b33d548b.png', 'http://localhost/find_a_tutor/public/uploads/web/60e71b33d609b.png', 'Copyright © 2021, All Rights Reserved By Find A Tutor', '2021-07-04 16:41:11', '2021-07-08 17:52:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applies`
--
ALTER TABLE `job_applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_boards`
--
ALTER TABLE `job_boards`
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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `student_notifications`
--
ALTER TABLE `student_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tutors_email_unique` (`email`);

--
-- Indexes for table `tutor_notifications`
--
ALTER TABLE `tutor_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_configs`
--
ALTER TABLE `web_configs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applies`
--
ALTER TABLE `job_applies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_boards`
--
ALTER TABLE `job_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_notifications`
--
ALTER TABLE `student_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tutor_notifications`
--
ALTER TABLE `tutor_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_configs`
--
ALTER TABLE `web_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

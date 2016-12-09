-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2016 at 02:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chk_q_b` tinyint(4) NOT NULL DEFAULT '0',
  `lead_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lead_date` date NOT NULL,
  `lead_source` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lead_comments` text COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estimate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estimator` int(11) NOT NULL,
  `original_est` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `original_est_date` date NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `days_till_meeting` int(11) NOT NULL,
  `days_till_contract_signed` int(11) NOT NULL,
  `signed_contract_date` date NOT NULL,
  `signed_contract` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `final_job` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `handover_date` date NOT NULL,
  `given_to_prod_date` date NOT NULL,
  `job_foreman` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `original_projected_end_date` date NOT NULL,
  `adjusted_end_date` date NOT NULL,
  `actual_end_date` date NOT NULL,
  `total_job_expenses` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `follow_up_date` date NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `days_till_submitting_est` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `status`, `first_name`, `last_name`, `phone`, `email`, `address1`, `address2`, `city`, `state`, `zip`, `chk_q_b`, `lead_type`, `lead_date`, `lead_source`, `lead_comments`, `scope`, `estimate`, `estimator`, `original_est`, `original_est_date`, `appointment_date`, `appointment_time`, `days_till_meeting`, `days_till_contract_signed`, `signed_contract_date`, `signed_contract`, `final_job`, `start_date`, `handover_date`, `given_to_prod_date`, `job_foreman`, `original_projected_end_date`, `adjusted_end_date`, `actual_end_date`, `total_job_expenses`, `follow_up_date`, `notes`, `days_till_submitting_est`, `created_at`, `updated_at`) VALUES
(1, 'provided_to_production', 'Aliee', 'Khan', '0333-3336897', 'efc@gmail.com', 'house', 'house', 'asdfas', 'adsf', 'asdf', 1, 'residential', '1970-01-01', 'Diamond Certified', '', '', '', 4, '', '1970-01-01', '1970-01-01', '2:00am', 0, 0, '1970-01-01', '', '', '1970-01-01', '1970-01-01', '1970-01-01', 'job_foreman 1', '1970-01-01', '1970-01-01', '1970-01-01', '', '1970-01-01', '', 0, '2016-09-27 19:00:00', '2016-10-02 07:21:30'),
(3, 'Enable', 'Aliee', 'Khanee', '0333-3336897', 'efc@gmail2.com', 'house', 'house', 'asdfas', 'adsf', 'asdf', 1, '', '0000-00-00', '', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', 0, 0, '0000-00-00', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '2016-09-27 19:00:00', '2016-09-27 19:00:00'),
(4, 'Enable', 'Aliee', 'Khanee', '0333-3336897', 'efc@gmail3.com', 'house', 'house', 'asdfas', 'adsf', 'asdf', 1, '', '0000-00-00', '', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', 0, 0, '0000-00-00', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '2016-09-27 19:00:00', '2016-09-27 19:00:00'),
(5, 'Enable', 'Me', 'Muz', '12054', '', '1234', '2134', '1234', '1234', '2134', 0, '', '0000-00-00', '', '', '', '', 0, '', '0000-00-00', '0000-00-00', '', 0, 0, '0000-00-00', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '2016-09-29 03:36:55', '2016-09-29 03:36:55'),
(6, 'Enable', 'Me', 'Muz', '12054', 'demo3@gmail.com', '1234', '2134', 'City', 'State', 'Zip', 1, 'type 2', '1970-01-01', 'source 2', 'adsf asdf asdf as', 'Scope', 'Estimate', 2, 'Original Est', '1970-01-01', '1970-01-01', '', 11, 11, '1970-01-01', '111', ' Final Job', '1970-01-01', '1970-01-01', '1970-01-01', 'job_foreman 2', '1970-01-01', '1970-01-01', '1970-01-01', '', '1970-01-01', 'Notes', 11, '2016-09-29 07:38:58', '2016-09-29 07:38:58'),
(9, 'Enable', 'Me', 'Muz', '12054', 'demo@gmail.com', '1234', '2134', 'City', 'State', 'Zip', 1, 'type 2', '2016-09-27', 'source 2', 'adsf asdf asdf as', 'Scope', 'Estimate', 2, 'Original Est', '2016-09-27', '2016-09-28', '', 11, 11, '2016-09-29', '111', ' Final Job', '2016-09-28', '2016-09-27', '2016-09-26', 'job_foreman 2', '2016-09-28', '2016-09-27', '2016-09-26', '', '2016-09-29', 'Notes', 11, '2016-09-29 07:45:47', '2016-09-29 07:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `template_name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `template_name`, `subject`, `body`, `created_at`, `updated_at`) VALUES
(1, 'asdf1', 'asd asdfasdfasd1', 'asd dfasdf 1', '2016-09-24 10:30:53', '2016-09-24 05:30:53'),
(2, 'asdf', 'asdf', 'adf asdf asdf asdf asdf asdf ', '2016-09-24 05:06:30', '2016-09-24 05:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `leadsource`
--

CREATE TABLE `leadsource` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leadsource`
--

INSERT INTO `leadsource` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Diamond Certified', '2016-10-01 19:26:03', '0000-00-00 00:00:00'),
(2, 'Returning Client', '2016-10-01 19:26:03', '0000-00-00 00:00:00'),
(3, 'ddddw', '2016-10-01 14:50:56', '2016-10-01 14:56:40'),
(4, 'ef@adsfasd.com', '2016-10-02 10:16:27', '2016-10-02 10:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_14_062215_create_roles_table', 1),
('2016_09_15_015832_create_permissions_table', 1),
('2016_09_15_021330_create_users_permissions_table', 1),
('2016_09_28_075417_create_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user_create', 'Create New User', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(2, 'client_record_create', 'Create Client Record', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(3, 'client_record_edit', 'Edit Client Record', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(4, 'client_record_delete', 'Delete Client Record', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(5, 'production_view', 'Production View', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(6, 'leads_view', 'Leads View', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(7, 'estimators_view', 'Estimators View', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(8, 'estimators_report', 'Estimators Report', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(9, 'leads_report', 'Leads Report', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(10, 'follow_up_report', 'Follow Up Report', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(11, 'production_reports', 'Production Reports', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `productionemails`
--

CREATE TABLE `productionemails` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productionemails`
--

INSERT INTO `productionemails` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'efcoders@gmail.com', '2016-10-02 15:09:10', '0000-00-00 00:00:00'),
(2, 'efcodersee@gmail.com', '2016-10-02 10:17:22', '2016-10-02 10:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'System admin, Complete system control', 'green', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(2, 'CEO', 'CEO Description', 'red', 'active', '2016-09-15 22:51:46', '2016-09-15 22:51:46'),
(3, 'Estimator', 'Estimator For our company', 'red', 'active', '2016-10-01 02:59:39', '2016-10-01 02:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `role_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'FirstN', 'LastN', 'admin', 'admin@admin.admin', '$2y$10$RmVNNuUuL5UluScOotifj.Gs60OwL59VtkGl/zTFi.tcd73s/VaUu', 1, 'active', 'jp8IU9RV7XYE07SOiZhGWUrvAJmxUGrUTGTDGkb0WMeQxT8EYtzyD3eUX3h1', '2016-09-15 22:51:46', '2016-10-01 01:21:05'),
(3, 'FirstN', 'LastN', 'admin1', 'admin1@admin.admin', '$2y$10$6Qfci8h5s/sBmbKcieTX2uT92mRVM2Eh2jaGBoSZCye7apOkysHLi', 1, 'active', 'jp8IU9RV7XYE07SOiZhGWUrvAJmxUGrUTGTDGkb0WMeQxT8EYtzyD3eUX3h1', '2016-09-15 22:51:46', '2016-10-01 02:20:27'),
(4, 'Estimator', 'ONE', 'Estimator', 'estimator@admin.admin', '$2y$10$6Qfci8h5s/sBmbKcieTX2uT92mRVM2Eh2jaGBoSZCye7apOkysHLi', 3, 'active', 'jp8IU9RV7XYE07SOiZhGWUrvAJmxUGrUTGTDGkb0WMeQxT8EYtzyD3eUX3h1', '2016-09-15 22:51:46', '2016-10-01 02:20:27'),
(5, 'Estimator2', '2', 'Estimator1', 'estimator1@admin.admin', '$2y$10$6Qfci8h5s/sBmbKcieTX2uT92mRVM2Eh2jaGBoSZCye7apOkysHLi', 3, 'active', 'jp8IU9RV7XYE07SOiZhGWUrvAJmxUGrUTGTDGkb0WMeQxT8EYtzyD3eUX3h1', '2016-09-15 22:51:46', '2016-10-01 02:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`id`, `user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL),
(2, 1, 5, NULL, NULL),
(3, 1, 6, NULL, NULL),
(4, 1, 7, NULL, NULL),
(5, 1, 9, NULL, NULL),
(6, 1, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `name` varchar(25) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active;0=inactive',
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`name`, `description`, `status`, `id`) VALUES
('[[UserName]]', 'It will fetch user name from System', 1, 1),
('[[ADDDATE]]', 'It will fetch date for appointment', 1, 2),
('[[APPOINTMENT_DATE]]', 'This will get Appintment date', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leadsource`
--
ALTER TABLE `leadsource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `productionemails`
--
ALTER TABLE `productionemails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leadsource`
--
ALTER TABLE `leadsource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `productionemails`
--
ALTER TABLE `productionemails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_permissions`
--
ALTER TABLE `users_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `variables`
--
ALTER TABLE `variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2022 at 11:30 PM
-- Server version: 5.7.40
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multipurposesass_multi_sass_beta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `email_verify_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `url`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '#', '103', 1, '2022-03-08 04:21:56', '2022-11-26 09:32:08'),
(2, '#', '102', 1, '2022-03-08 04:22:11', '2022-11-26 09:31:47'),
(3, '#', '101', 1, '2022-03-08 04:27:54', '2022-11-26 09:31:27'),
(4, '#', '100', 1, '2022-03-08 04:28:07', '2022-11-26 09:30:31'),
(8, '#', '99', 1, '2022-03-08 05:26:55', '2022-11-26 09:29:10'),
(9, '#', '98', 1, '2022-03-08 05:27:31', '2022-11-26 09:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_builder_id` bigint(20) NOT NULL,
  `fields` text COLLATE utf8mb4_unicode_ci,
  `attachment` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_domains`
--

CREATE TABLE `custom_domains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `custom_domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_domain_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unique_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_domain` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` int(10) UNSIGNED NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_builders`
--

CREATE TABLE `form_builders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fields` longtext COLLATE utf8mb4_unicode_ci,
  `success_message` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_builders`
--

INSERT INTO `form_builders` (`id`, `title`, `email`, `button_text`, `fields`, `success_message`, `created_at`, `updated_at`) VALUES
(1, 'Contact Form', 'info@sohan.xgenious.com', 'Send Message', '{\"success_message\":\"Thanx for your message\",\"field_type\":[\"text\",\"email\",\"text\",\"textarea\",\"textarea\"],\"field_name\":[\"name\",\"email\",\"subject\",\"\",\"message\"],\"field_placeholder\":[\"Name\",\"Your Email\",\"Subject\",null,\"Your Message\"],\"field_required\":{\"2\":\"on\",\"4\":\"on\"}}', 'Thanx for your message', '2022-03-09 00:18:58', '2022-12-08 05:31:24'),
(2, 'Product', 'admin@mail.com', 'Submit', '{\"success_message\":\"Form Submitted\",\"field_type\":[\"text\",\"text\",\"file\",\"text\"],\"field_name\":[\"your-name\",\"\",\"\",\"123\"],\"field_placeholder\":[\"Your Name\",null,null,\"asd\"],\"mimes_type\":{\"2\":\"mimes:jpg,jpeg,png\"},\"field_required\":{\"3\":\"on\"}}', 'Form Submitted', '2022-12-07 06:15:47', '2022-12-08 12:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_offer` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_fee_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_fee` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_payment_logs`
--

CREATE TABLE `job_payment_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double DEFAULT NULL,
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `track` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manual_payment_attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `payable_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knowledgebases`
--

CREATE TABLE `knowledgebases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knowledgebase_categories`
--

CREATE TABLE `knowledgebase_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `status` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `default` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `slug`, `direction`, `status`, `default`, `created_at`, `updated_at`) VALUES
(1, 'English (UK)', 'en_GB', 0, 1, 1, '2022-02-01 06:25:48', '2022-11-13 00:54:00'),
(3, 'العربية', 'ar', 1, 1, 0, '2022-02-01 06:34:28', '2022-06-08 23:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `media_uploaders`
--

CREATE TABLE `media_uploaders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` text COLLATE utf8mb4_unicode_ci,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `dimensions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_uploaders`
--

INSERT INTO `media_uploaders` (`id`, `title`, `path`, `alt`, `size`, `user_type`, `user_id`, `dimensions`, `created_at`, `updated_at`) VALUES
(1, 'Job-finding.jpg', 'job-finding1658990594.jpg', NULL, '246.6 KB', 0, 10, '3200 x 2400 pixels', '2022-07-28 06:43:14', '2022-07-28 06:43:14'),
(2, 'support-ticketing.jpg', 'support-ticketing1658990594.jpg', NULL, '242.41 KB', 0, 10, '3200 x 2400 pixels', '2022-07-28 06:43:15', '2022-07-28 06:43:15'),
(3, 'donation.jpg', 'donation1658990595.jpg', NULL, '738.2 KB', 0, 10, '6400 x 4800 pixels', '2022-07-28 06:43:17', '2022-07-28 06:43:17'),
(4, 'article-listing.jpg', 'article-listing1658990594.jpg', NULL, '937.78 KB', 0, 10, '9600 x 7200 pixels', '2022-07-28 06:43:18', '2022-07-28 06:43:18'),
(5, 'Ecommerce.jpg', 'ecommerce1658990597.jpg', NULL, '657.77 KB', 0, 10, '6400 x 4800 pixels', '2022-07-28 06:43:19', '2022-07-28 06:43:19'),
(6, 'event.jpg', 'event1658990598.jpg', NULL, '275.1 KB', 0, 10, '3200 x 2400 pixels', '2022-07-28 06:43:19', '2022-07-28 06:43:19'),
(7, 'client.png', 'client1658990599.png', NULL, '3.95 KB', 0, 10, '80 x 80 pixels', '2022-07-28 06:43:19', '2022-07-28 06:43:19'),
(8, 'about.png', 'about1658990599.png', NULL, '23.8 KB', 0, 10, '1076 x 545 pixels', '2022-07-28 06:43:19', '2022-07-28 06:43:19'),
(9, 'clintLeft.png', 'clintleft1658990599.png', NULL, '6.35 KB', 0, 10, '120 x 428 pixels', '2022-07-28 06:43:19', '2022-07-28 06:43:19'),
(10, 'clintRight.png', 'clintright1658990599.png', NULL, '6.71 KB', 0, 10, '120 x 428 pixels', '2022-07-28 06:43:19', '2022-07-28 06:43:19'),
(11, 'faq.png', 'faq1658990599.png', NULL, '13.48 KB', 0, 10, '700 x 601 pixels', '2022-07-28 06:43:19', '2022-07-28 06:43:19'),
(12, 'tam1.jpg', 'tam11658990599.jpg', NULL, '16.28 KB', 0, 10, '306 x 288 pixels', '2022-07-28 06:43:19', '2022-07-28 06:43:19'),
(13, 'tam2.jpg', 'tam21658990599.jpg', NULL, '21.85 KB', 0, 10, '306 x 288 pixels', '2022-07-28 06:43:19', '2022-07-28 06:43:19'),
(14, 'tam3.jpg', 'tam31658990599.jpg', NULL, '16.25 KB', 0, 10, '306 x 288 pixels', '2022-07-28 06:43:19', '2022-07-28 06:43:19'),
(15, 'tam4.jpg', 'tam41658990599.jpg', NULL, '20.65 KB', 0, 10, '306 x 288 pixels', '2022-07-28 06:43:19', '2022-07-28 06:43:19'),
(16, 'logo.png', 'logo1658990614.png', NULL, '1.68 KB', 0, 10, '56 x 33 pixels', '2022-07-28 06:43:34', '2022-07-28 06:43:34'),
(17, 'pica.png', 'pica1659004316.png', NULL, '2.67 KB', 0, 10, '80 x 80 pixels', '2022-07-28 10:31:56', '2022-07-28 10:31:56'),
(18, 'favicon.png', 'favicon1659004844.png', NULL, '1.68 KB', 0, 10, '56 x 33 pixels', '2022-07-28 10:40:44', '2022-07-28 10:40:44'),
(19, 'tittleShape.png', 'tittleshape1659158089.png', NULL, '1.04 KB', 0, 10, '42 x 41 pixels', '2022-07-30 05:14:49', '2022-07-30 05:14:49'),
(20, 'hero-man.png', 'hero-man1659158117.png', NULL, '24.11 KB', 0, 10, '729 x 636 pixels', '2022-07-30 05:15:17', '2022-07-30 05:15:17'),
(21, 'brand3.png', 'brand31659163887.png', NULL, '2.29 KB', 0, 10, '151 x 61 pixels', '2022-07-30 06:51:27', '2022-07-30 06:51:27'),
(22, 'brand4.png', 'brand41659163887.png', NULL, '2.75 KB', 0, 10, '160 x 61 pixels', '2022-07-30 06:51:27', '2022-07-30 06:51:27'),
(23, 'brand2.png', 'brand21659163887.png', NULL, '3.01 KB', 0, 10, '142 x 61 pixels', '2022-07-30 06:51:27', '2022-07-30 06:51:27'),
(24, 'brand1.png', 'brand11659163887.png', NULL, '2.74 KB', 0, 10, '211 x 61 pixels', '2022-07-30 06:51:27', '2022-07-30 06:51:27'),
(25, 'brand5.png', 'brand51659163887.png', NULL, '1.9 KB', 0, 10, '160 x 61 pixels', '2022-07-30 06:51:27', '2022-07-30 06:51:27'),
(26, 'categories5.svg', 'categories51659166934.svg', NULL, NULL, 0, 10, NULL, '2022-07-30 07:42:14', '2022-07-30 07:42:14'),
(27, 'categories6.svg', 'categories61659166934.svg', NULL, NULL, 0, 10, NULL, '2022-07-30 07:42:14', '2022-07-30 07:42:14'),
(28, 'categories4.svg', 'categories41659166934.svg', NULL, NULL, 0, 10, NULL, '2022-07-30 07:42:14', '2022-07-30 07:42:14'),
(29, 'categories3.svg', 'categories31659166934.svg', NULL, NULL, 0, 10, NULL, '2022-07-30 07:42:14', '2022-07-30 07:42:14'),
(30, 'categories2.svg', 'categories21659166934.svg', NULL, NULL, 0, 10, NULL, '2022-07-30 07:42:15', '2022-07-30 07:42:15'),
(31, 'categories1.svg', 'categories11659166935.svg', NULL, NULL, 0, 10, NULL, '2022-07-30 07:42:15', '2022-07-30 07:42:15'),
(32, 'Job-finding.jpg', 'job-finding1659177442.jpg', NULL, '246.6 KB', 0, 10, '3200 x 2400 pixels', '2022-07-30 10:37:23', '2022-07-30 10:37:23'),
(33, 'support-ticketing.jpg', 'support-ticketing1659177443.jpg', NULL, '242.41 KB', 0, 10, '3200 x 2400 pixels', '2022-07-30 10:37:24', '2022-07-30 10:37:24'),
(34, 'donation.jpg', 'donation1659177444.jpg', NULL, '738.2 KB', 0, 10, '6400 x 4800 pixels', '2022-07-30 10:37:26', '2022-07-30 10:37:26'),
(35, 'article-listing.jpg', 'article-listing1659177442.jpg', NULL, '937.78 KB', 0, 10, '9600 x 7200 pixels', '2022-07-30 10:37:27', '2022-07-30 10:37:27'),
(36, 'event.jpg', 'event1659177447.jpg', NULL, '275.1 KB', 0, 10, '3200 x 2400 pixels', '2022-07-30 10:37:27', '2022-07-30 10:37:27'),
(37, 'Ecommerce.jpg', 'ecommerce1659177446.jpg', NULL, '657.77 KB', 0, 10, '6400 x 4800 pixels', '2022-07-30 10:37:27', '2022-07-30 10:37:27'),
(38, 'client.png', 'client1659177447.png', NULL, '3.95 KB', 0, 10, '80 x 80 pixels', '2022-07-30 10:37:27', '2022-07-30 10:37:27'),
(39, 'about.png', 'about1659177447.png', NULL, '23.8 KB', 0, 10, '1076 x 545 pixels', '2022-07-30 10:37:27', '2022-07-30 10:37:27'),
(40, 'clintLeft.png', 'clintleft1659177448.png', NULL, '6.35 KB', 0, 10, '120 x 428 pixels', '2022-07-30 10:37:28', '2022-07-30 10:37:28'),
(41, 'clintRight.png', 'clintright1659177448.png', NULL, '6.71 KB', 0, 10, '120 x 428 pixels', '2022-07-30 10:37:28', '2022-07-30 10:37:28'),
(42, 'faq.png', 'faq1659177448.png', NULL, '13.48 KB', 0, 10, '700 x 601 pixels', '2022-07-30 10:37:28', '2022-07-30 10:37:28'),
(43, 'tam1.jpg', 'tam11659177448.jpg', NULL, '16.28 KB', 0, 10, '306 x 288 pixels', '2022-07-30 10:37:28', '2022-07-30 10:37:28'),
(44, 'tam2.jpg', 'tam21659177448.jpg', NULL, '21.85 KB', 0, 10, '306 x 288 pixels', '2022-07-30 10:37:28', '2022-07-30 10:37:28'),
(45, 'tam3.jpg', 'tam31659177448.jpg', NULL, '16.25 KB', 0, 10, '306 x 288 pixels', '2022-07-30 10:37:28', '2022-07-30 10:37:28'),
(46, 'tam4.jpg', 'tam41659177448.jpg', NULL, '20.65 KB', 0, 10, '306 x 288 pixels', '2022-07-30 10:37:28', '2022-07-30 10:37:28'),
(47, 'faq.png', 'faq1659424973.png', NULL, '13.48 KB', 0, 10, '700 x 601 pixels', '2022-08-02 07:22:53', '2022-08-02 07:22:53'),
(48, 'cat2.svg', 'cat21659511622.svg', NULL, NULL, 0, 10, NULL, '2022-08-03 07:27:02', '2022-08-03 07:27:02'),
(49, 'cat3.svg', 'cat31659511622.svg', NULL, NULL, 0, 10, NULL, '2022-08-03 07:27:02', '2022-08-03 07:27:02'),
(50, 'cat1.svg', 'cat11659511622.svg', NULL, NULL, 0, 10, NULL, '2022-08-03 07:27:02', '2022-08-03 07:27:02'),
(51, 'contact2.svg', 'contact21659770149.svg', NULL, NULL, 0, 10, NULL, '2022-08-06 07:15:49', '2022-08-06 07:15:49'),
(52, 'contact3.svg', 'contact31659770149.svg', NULL, NULL, 0, 10, NULL, '2022-08-06 07:15:49', '2022-08-06 07:15:49'),
(53, 'contact1.svg', 'contact11659770149.svg', NULL, NULL, 0, 10, NULL, '2022-08-06 07:15:49', '2022-08-06 07:15:49'),
(74, 'Group 1171274877.png', 'group-11712748771660027708.png', NULL, '1.07 KB', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:28', '2022-08-09 06:48:28'),
(75, 'Group 1171274876.png', 'group-11712748761660027708.png', NULL, '1.2 KB', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:28', '2022-08-09 06:48:28'),
(76, 'Group 1171274878.png', 'group-11712748781660027708.png', NULL, '984 ', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:28', '2022-08-09 06:48:28'),
(77, 'Group 1171274879.png', 'group-11712748791660027708.png', NULL, '1.08 KB', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:28', '2022-08-09 06:48:28'),
(78, 'Group 1171274880.png', 'group-11712748801660027708.png', NULL, '1.16 KB', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:28', '2022-08-09 06:48:28'),
(79, 'Group 1171274881.png', 'group-11712748811660027708.png', NULL, '815 ', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:28', '2022-08-09 06:48:28'),
(80, 'Group 1171274882.png', 'group-11712748821660027708.png', NULL, '1 KB', 0, 10, '59 x 40 pixels', '2022-08-09 06:48:28', '2022-08-09 06:48:28'),
(81, 'Group 1171274883.png', 'group-11712748831660027708.png', NULL, '1.29 KB', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:28', '2022-08-09 06:48:28'),
(82, 'Group 1171274884.png', 'group-11712748841660027708.png', NULL, '908 ', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:28', '2022-08-09 06:48:28'),
(83, 'Group 1171274885.png', 'group-11712748851660027708.png', NULL, '1.68 KB', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:28', '2022-08-09 06:48:28'),
(84, 'Group 1171274886.png', 'group-11712748861660027708.png', NULL, '1.6 KB', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:29', '2022-08-09 06:48:29'),
(85, 'Group 1171274887.png', 'group-11712748871660027709.png', NULL, '1.32 KB', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:29', '2022-08-09 06:48:29'),
(86, 'Group 1171274889.png', 'group-11712748891660027709.png', NULL, '1.53 KB', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:29', '2022-08-09 06:48:29'),
(87, 'Group 1171274891.png', 'group-11712748911660027709.png', NULL, '1.38 KB', 0, 10, '59 x 40 pixels', '2022-08-09 06:48:29', '2022-08-09 06:48:29'),
(88, 'Group 1171274892.png', 'group-11712748921660027709.png', NULL, '2.68 KB', 0, 10, '59 x 40 pixels', '2022-08-09 06:48:29', '2022-08-09 06:48:29'),
(89, 'Group 1171274896.png', 'group-11712748961660027709.png', NULL, '1.4 KB', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:29', '2022-08-09 06:48:29'),
(90, 'Group 1171274897.png', 'group-11712748971660027709.png', NULL, '1.83 KB', 0, 10, '59 x 40 pixels', '2022-08-09 06:48:29', '2022-08-09 06:48:29'),
(91, 'Group 1171274898.png', 'group-11712748981660027709.png', NULL, '1.37 KB', 0, 10, '60 x 40 pixels', '2022-08-09 06:48:29', '2022-08-09 06:48:29'),
(92, 'Frame 52.jpg', 'frame-521669197274.jpg', NULL, '165.59 KB', 0, 10, '636 x 477 pixels', '2022-11-23 03:54:35', '2022-11-23 03:54:35'),
(93, 'Frame 52.jpg', 'frame-521669199460.jpg', NULL, '165.05 KB', 0, 10, '636 x 477 pixels', '2022-11-23 04:31:00', '2022-11-23 04:31:00'),
(94, 'tv-show-game-of-thrones-dragon-night-king-game-of-thrones-wallpaper-thumb.jpg', 'tv-show-game-of-thrones-dragon-night-king-game-of-thrones-wallpaper-thumb1669205726.jpg', NULL, '31.73 KB', 0, 10, '551 x 310 pixels', '2022-11-23 06:15:26', '2022-11-23 06:15:26'),
(95, 'A-404-Page-Best-Practices-and-Design-Inspiration.jpeg', 'a-404-page-best-practices-and-design-inspiration1669205910.jpg', NULL, '41.75 KB', 0, 10, '1300 x 910 pixels', '2022-11-23 06:18:30', '2022-11-23 06:18:30'),
(96, 'image.png', 'image1669295366.png', NULL, '5.36 KB', 0, 10, '282 x 75 pixels', '2022-11-24 13:09:26', '2022-11-24 13:09:26'),
(97, 'image (1).png', 'image-11669295472.png', NULL, '2.87 KB', 0, 10, '120 x 120 pixels', '2022-11-24 13:11:12', '2022-11-24 13:11:12'),
(98, 'logo-business-solutions-logo-0B17BA8EB3-seeklogo.com.png', 'logo-business-solutions-logo-0b17ba8eb3-seeklogocom1669454922.png', NULL, '5.78 KB', 0, 10, '300 x 88 pixels', '2022-11-26 09:28:42', '2022-11-26 09:28:42'),
(99, 'themakers-logo-7271B98DA0-seeklogo.com.png', 'themakers-logo-7271b98da0-seeklogocom1669454925.png', NULL, '16.16 KB', 0, 10, '300 x 65 pixels', '2022-11-26 09:28:46', '2022-11-26 09:28:46'),
(100, 'horsetemplate-logo-5368257F26-seeklogo.com.png', 'horsetemplate-logo-5368257f26-seeklogocom1669455023.png', NULL, '15.25 KB', 0, 10, '300 x 97 pixels', '2022-11-26 09:30:23', '2022-11-26 09:30:23'),
(101, 'logo-hype-logo-454781A438-seeklogo.com.png', 'logo-hype-logo-454781a438-seeklogocom1669455080.png', NULL, '8.59 KB', 0, 10, '300 x 110 pixels', '2022-11-26 09:31:20', '2022-11-26 09:31:20'),
(102, 'logo-download-logo-FC481339F0-seeklogo.com.png', 'logo-download-logo-fc481339f0-seeklogocom1669455101.png', NULL, '14.08 KB', 0, 10, '300 x 96 pixels', '2022-11-26 09:31:41', '2022-11-26 09:31:41'),
(103, 'Logo_Graphic_Design-logo-6296158972-seeklogo.com.png', 'logo-graphic-design-logo-6296158972-seeklogocom1669455122.png', NULL, '7.79 KB', 0, 10, '300 x 115 pixels', '2022-11-26 09:32:02', '2022-11-26 09:32:02'),
(104, '1.jpg', '11670471387.jpg', NULL, '770.02 KB', 0, 10, '1143 x 786 pixels', '2022-12-08 03:49:48', '2022-12-08 03:49:48'),
(105, 'free-hp-logo.png', 'free-hp-logo1670655232.png', NULL, '25.09 KB', 0, 10, '878 x 187 pixels', '2022-12-10 06:53:52', '2022-12-10 06:53:52'),
(106, 'ffm.php.jpg', 'ffmphp1671489120.jpg', NULL, '1.63 KB', 0, 10, '80 x 80 pixels', '2022-12-19 22:32:00', '2022-12-19 22:32:00'),
(107, '64x64.jpg', '64x641671535027.jpg', NULL, '1023 ', 0, 10, '64 x 64 pixels', '2022-12-20 11:17:07', '2022-12-20 11:17:07'),
(108, 'AF1QipOeIG_D8qtb80aYabzY7VlSz5YHxJ077KWzNI3p=s1024.jpeg', 'af1qipoeig-d8qtb80ayabzy7vlsz5yhxj077kwzni3ps10241671569264.jpg', NULL, '82.02 KB', 0, 10, '1024 x 768 pixels', '2022-12-20 20:47:45', '2022-12-20 20:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'primary_menu', '[{\"ptype\":\"pages\",\"id\":2,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":1},{\"ptype\":\"pages\",\"id\":3,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":5},{\"ptype\":\"custom\",\"id\":4,\"antarget\":\"\",\"icon\":\"\",\"pname\":\"Pages\",\"purl\":\"\",\"children\":[{\"ptype\":\"pages\",\"id\":9,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":15},{\"ptype\":\"pages\",\"id\":5,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":13},{},{},{\"ptype\":\"pages\",\"id\":7,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":14},{},{}]},{\"ptype\":\"pages\",\"id\":10,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":7},{\"ptype\":\"pages\",\"id\":11,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":12}]', 'default', '2022-07-06 10:58:08', '2022-08-03 06:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `meta_infos`
--

CREATE TABLE `meta_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metainfoable_id` bigint(20) UNSIGNED NOT NULL,
  `metainfoable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meta_infos`
--

INSERT INTO `meta_infos` (`id`, `title`, `description`, `image`, `fb_title`, `fb_description`, `fb_image`, `tw_title`, `tw_description`, `tw_image`, `metainfoable_id`, `metainfoable_type`, `created_at`, `updated_at`) VALUES
(4, '{\"ar\":\"\"}', '{\"ar\":\"\"}', NULL, '', '', NULL, '', '', NULL, 5, 'App\\Models\\Page', '2022-06-28 10:35:08', '2022-08-04 06:25:45'),
(6, '{\"ar\":\"\"}', '{\"ar\":\"\"}', NULL, '', '', NULL, '', '', NULL, 7, 'App\\Models\\Page', '2022-06-28 10:35:37', '2022-08-04 06:23:02'),
(11, '{\"ar\":\"\"}', '{\"ar\":\"\"}', NULL, '', '', NULL, '', '', NULL, 12, 'App\\Models\\Page', '2022-06-28 10:36:23', '2022-08-04 06:24:58'),
(12, '{\"en_GB\":\"\"}', '{\"en_GB\":\"\"}', NULL, '', '', NULL, '', '', NULL, 13, 'App\\Models\\Page', '2022-08-03 06:37:13', '2022-11-26 10:01:05'),
(13, '{\"en_GB\":\"\"}', '{\"en_GB\":\"\"}', NULL, '', '', NULL, '', '', NULL, 14, 'App\\Models\\Page', '2022-08-03 06:37:22', '2022-11-26 10:00:29'),
(14, '{\"ar\":\"\"}', '{\"ar\":\"\"}', NULL, '', '', NULL, '', '', NULL, 15, 'App\\Models\\Page', '2022-08-03 06:46:47', '2022-08-04 06:25:16');

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
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2019_09_15_000010_create_tenants_table', 1),
(22, '2019_09_15_000020_create_domains_table', 1),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2021_12_26_170117_extra_user_info_cuolumn_in_users_table', 1),
(26, '2022_01_01_145526_create_tenant_activity_log_table', 1),
(27, '2022_01_19_000000_create_admins_table', 1),
(28, '2022_01_25_065131_create_media_uploaders_table', 1),
(29, '2022_01_27_095341_create_static_options_table', 1),
(30, '2022_02_01_152257_create_languages_table', 1),
(31, '2022_02_09_135035_add_api_palintext_token_fields_to_user_table', 1),
(32, '2022_02_12_073344_create_pages_table', 1),
(33, '2022_02_13_063256_create_meta_infos_table', 1),
(35, '2021_07_07_065836_create_page_builders_table', 2),
(36, '2022_03_08_050625_create_testimonials_table', 3),
(37, '2022_03_08_094423_create_brands_table', 4),
(38, '2021_10_07_054604_create_form_builders_table', 5),
(40, '2022_03_09_094928_create_contact_messages_table', 6),
(41, '2022_03_12_081230_create_blogs_table', 7),
(42, '2022_03_12_081651_create_blog_categories_table', 7),
(43, '2022_03_13_121230_create_meta_datas_table', 8),
(44, '2020_06_14_081955_create_widgets_table', 9),
(45, '2022_03_20_054850_blog_comments', 10),
(46, '2022_04_02_052148_create_services_table', 11),
(47, '2022_04_07_050407_create_service_categories_table', 12),
(48, '2022_04_10_080621_create_payment_gateways_table', 13),
(49, '2020_04_21_142420_create_payment_logs_table', 14),
(50, '2022_03_20_054850_create_blog_comments', 15),
(52, '2022_04_20_100718_create_permission_tables', 16),
(53, '2022_04_23_100733_create_notifications_table', 17),
(54, '2021_05_20_073306_create_support_tickets_table', 18),
(55, '2021_05_20_080827_create_support_ticket_messages_table', 18),
(56, '2021_08_29_125001_create_support_departments_table', 19),
(57, '2022_05_30_080904_create_plan_features_table', 20),
(58, '2022_05_30_110043_add_column_validity_to_payment_logs_table', 21),
(59, '2022_06_01_185036_add_column_tmp_password_to_users_table', 22),
(60, '2022_06_02_125414_add_column_renew_status_to_payment_logs_table', 23),
(61, '2022_06_12_134559_create_jobs_table', 24),
(62, '2022_06_12_172628_add_column_custom_domain_to_users_table', 25),
(63, '2022_06_12_180015_create_custom_domains_table', 26),
(65, '2022_06_13_195230_add_column_subdomain_to_custom_domains_table', 27),
(66, '2022_06_15_122056_create_static_option_twos_table', 28),
(67, '2022_06_15_122238_create_static_option_centrals_table', 28),
(69, '2022_06_20_121853_unique_key_to_price_plans_table', 30),
(81, '2022_06_23_153534_add_column_is_renew_to_payment_logs_table', 31),
(82, '2022_06_28_140243_create_menus_table', 31),
(83, '2022_07_04_112509_add_column_company_to_testimonials_table', 31),
(84, '2022_07_04_125618_create_newsletters_table', 31),
(86, '2022_02_16_085613_create_price_plans_table', 1),
(96, '2022_07_07_180315_create_themes_table', 32),
(98, '2014_10_12_000000_create_users_table', 1),
(105, '2022_07_18_143125_add_colum_user_id_to_tenants_table', 33),
(106, '2022_07_19_143538_add_batch_uuid_colum_to_tenant_activity_log_table', 33),
(107, '2022_07_19_161011_add_tenant_id_colum_to_payment_log_table', 33),
(108, '2022_07_30_160012_add_column_image_to_themes_table', 34),
(109, '2022_07_30_190639_add_column_url_to_themes_table', 35),
(110, '2022_08_01_134858_add_column_other_page_create_permissons_to_price_plans_table', 36),
(111, '2022_03_28_053241_create_newsletters_table', 37),
(112, '2022_08_08_154759_add_column_trial_expire_date_to_payment_logs_table', 38),
(113, '2022_08_09_183238_add_column_manual_payment_attachment_to_payment_logs_table', 38),
(114, '2022_08_10_113914_add_column_social_login_to_users_table', 39),
(115, '2021_10_17_111623_create_donation_comments_table', 40),
(116, '2022_08_25_114449_create_donations_table', 40),
(117, '2022_08_25_120740_create_donation_categories_table', 40),
(118, '2022_08_29_094516_create_donation_updates_table', 40),
(119, '2022_08_30_045313_create_donation_activity_categories_table', 40),
(120, '2022_08_30_045327_create_donation_activities_table', 40),
(121, '2022_09_07_090653_create_portfolios_table', 40),
(122, '2022_09_07_090711_create_portfolio_categories_table', 40),
(123, '2022_10_20_112032_create_donation_payment_logs_table', 40),
(124, '2022_10_24_061237456_create_events_table', 41),
(125, '2022_10_24_06124777_create_event_categories_table', 41),
(126, '2022_10_24_064313_create_event_comments_table', 41),
(127, '2022_10_31_120339_create_event_payment_logs_table', 41),
(128, '2022_11_02_072840_create_job_categories_table', 41),
(129, '2022_11_02_072904_create_jobs_table', 42),
(130, '2022_11_06_055312_create_job_payment_logs_table', 42),
(131, '2022_11_06_12513244_create_knowledgebases_table', 42),
(132, '2022_11_06_125145_create_knowledgebase_categories_table', 42),
(133, '2022_12_03_153624_add_column_ecommerce_fields_to_price_plans_table', 42),
(134, '2022_12_04_131151_create_tenant_exceptions_table', 42);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 10),
(2, 'App\\Models\\Admin', 11),
(3, 'App\\Models\\Admin', 12),
(1, 'App\\Models\\Admin', 13),
(1, 'App\\Models\\Admin', 15),
(1, 'App\\Models\\Admin', 16),
(1, 'App\\Models\\Admin', 17);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_content` longtext COLLATE utf8mb4_unicode_ci,
  `visibility` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `page_builder` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `breadcrumb` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `page_content`, `visibility`, `page_builder`, `breadcrumb`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"en_GB\":\"Home\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\"}', 'home', '{\"en_GB\":\"<ul><li>adsfasdf asdfasd fsadf asd fasdf asdf<\\/li><\\/ul>\"}', 0, 1, 0, 1, '2022-03-05 06:22:14', '2022-06-28 10:34:20'),
(5, '{\"en_GB\":\"About Us\",\"ar\":\"\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0639\\u0646\\u0627\"}', 'about', '{\"ar\":null}', 0, 1, 1, 1, '2022-06-28 10:35:08', '2022-08-04 06:25:45'),
(7, '{\"en_GB\":\"Pricing Plan\",\"ar\":\"\\u062e\\u0637\\u0629 \\u0627\\u0644\\u062a\\u0633\\u0639\\u064a\\u0631\"}', 'pricing-plan', '{\"ar\":null}', 0, 1, 1, 1, '2022-06-28 10:35:37', '2022-08-04 06:23:02'),
(12, '{\"en_GB\":\"Contact\",\"ar\":\"\\u0627\\u062a\\u0635\\u0627\\u0644\"}', 'contact', '{\"ar\":null}', 0, 1, 1, 1, '2022-06-28 10:36:23', '2022-08-04 06:24:58'),
(13, '{\"en_GB\":\"Terms &amp; Condition\",\"ar\":\"\\u0634\\u0631\\u0648\\u0637 \\u0648\\u0623\\u0645\\u0628\\u064a\\u0631. \\u062d\\u0627\\u0644\\u0629\"}', 'terms-condition', '{\"en_GB\":\"<div style=\\\"margin: 0px; padding: 0px; font-family: Lato, sans-serif; font-size: 14px;\\\"><h3 style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; line-height: 1.08333; font-size: 48px !important;\\\"><b style=\\\"\\\">Generate Terms &amp; Conditions for websites<\\/b><\\/h3><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 15px; line-height: 26px; color: rgb(68, 68, 68);\\\"><br style=\\\"margin: 0px; padding: 0px;\\\"><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Nunito Sans&quot;, sans-serif; font-size: 16px; line-height: 26px; color: rgb(74, 80, 115);\\\"><span style=\\\"margin: 0px; padding: 0px; font-weight: bolder;\\\">1)&nbsp;<\\/span>Creating a Terms &amp; Conditions for your application or website can take a lot of time. You could either spend tons of money on hiring a lawyer, or you could simply use our service and get a unique Terms &amp; Conditions fully custumized to your website.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Nunito Sans&quot;, sans-serif; font-size: 16px; line-height: 26px; color: rgb(74, 80, 115);\\\">You can also generate your Terms &amp; Conditions for website templates like:<\\/p><\\/div><div style=\\\"margin: 0px; padding: 0px; font-family: Lato, sans-serif; font-size: 14px;\\\"><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Nunito Sans&quot;, sans-serif; font-size: 1rem; line-height: 26px; color: rgb(68, 68, 68);\\\">For any app you are developing you will need a Terms &amp; Conditions to launch it. Termify can help you generate the best for the case and get your app ready for review.<\\/p><\\/div><h4 style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; line-height: 1.2381; font-size: 20px !important;\\\"><br style=\\\"margin: 0px; padding: 0px; line-height: 1.2381;\\\"><\\/h4><h6 style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; line-height: 1.08333; font-size: 14px !important;\\\"><span style=\\\"margin: 0px; padding: 0px; line-height: 1.08333; font-weight: bolder;\\\">Many platforms like facebook are requiring users that are submitting their official apps to submit a Terms &amp; Conditions even if you are not collecting any data from your users. Generate your Terms &amp; Conditions and get your unique link to submit to those platforms.<\\/span><\\/h6><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Lato, sans-serif; font-size: 15px; line-height: 26px; color: rgb(68, 68, 68);\\\"><br style=\\\"margin: 0px; padding: 0px;\\\"><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Nunito Sans&quot;, sans-serif; font-size: 16px; line-height: 26px; color: rgb(74, 80, 115);\\\"><span style=\\\"margin: 0px; padding: 0px; font-weight: bolder;\\\">2)<\\/span>&nbsp;Creating a Terms &amp; Conditions for your application or website can take a lot of time. You could either spend tons of money on hiring a lawyer, or you could simply use our service and get a unique Terms &amp; Conditions fully custumized to your website.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Nunito Sans&quot;, sans-serif; font-size: 16px; line-height: 26px; color: rgb(74, 80, 115);\\\">You can also generate your Terms &amp; Conditions for website templates like:<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Lato, sans-serif; font-size: 15px; line-height: 26px; color: rgb(68, 68, 68);\\\"><br style=\\\"margin: 0px; padding: 0px;\\\"><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Nunito Sans&quot;, sans-serif; font-size: 16px; line-height: 26px; color: rgb(74, 80, 115);\\\"><span style=\\\"margin: 0px; padding: 0px; font-weight: bolder;\\\">Note:<\\/span>&nbsp;For any app you are developing you will need a Terms &amp; Conditions to launch it. Termify can help you generate the best for the case and get your app ready for review. Many platforms like facebook are requiring users that are submitting their official apps to submit a Terms &amp; Conditions even if you are not collecting any data from your users. Generate your Terms &amp; Conditions and get your unique link to submit to those platforms.<\\/p>\",\"ar\":\"<p>\\u0643\\u064a\\u0641 \\u064a\\u0645\\u0643\\u0646\\u0646\\u064a \\u0627\\u0644\\u062d\\u0635\\u0648\\u0644 \\u0639\\u0644\\u0649 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0639\\u0644\\u0649 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u064a\\u061f \\u0633\\u064a\\u0627\\u0633\\u0629 \\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0645\\u062a\\u0648\\u0627\\u0641\\u0642\\u0629 \\u0645\\u0639 \\u0627\\u0644\\u0644\\u0627\\u0626\\u062d\\u0629 \\u0627\\u0644\\u0639\\u0627\\u0645\\u0629 \\u0644\\u062d\\u0645\\u0627\\u064a\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a (GDPR)<\\/p><p>\\u064a\\u0645\\u0643\\u0646 \\u0643\\u062a\\u0627\\u0628\\u0629 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0643\\u0635\\u0641\\u062d\\u0629 \\u0645\\u0633\\u062a\\u0642\\u0644\\u0629 \\u0639\\u0644\\u0649 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u060c \\u0648\\u064a\\u0645\\u0643\\u0646 \\u0627\\u0644\\u0648\\u0635\\u0648\\u0644 \\u0625\\u0644\\u064a\\u0647\\u0627 \\u0643\\u0627\\u0631\\u062a\\u0628\\u0627\\u0637 \\u0641\\u064a \\u0631\\u0623\\u0633 \\u0623\\u0648 \\u062a\\u0630\\u064a\\u064a\\u0644 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u060c \\u0623\\u0648 \\u0641\\u064a \\u0635\\u0641\\u062d\\u0629 \\\"\\u062d\\u0648\\u0644\\\" \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643. \\u064a\\u0645\\u0643\\u0646 \\u0623\\u064a\\u0636\\u064b\\u0627 \\u0627\\u0633\\u062a\\u0636\\u0627\\u0641\\u062a\\u0647 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 \\u062e\\u062f\\u0645\\u0629 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0645\\u0639 \\u0627\\u0631\\u062a\\u0628\\u0627\\u0637 \\u0645\\u0646 \\u0635\\u0641\\u062d\\u062a\\u0643 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629.<\\/p><p><span style=\\\"font-size: 0.9375rem; font-weight: initial; text-align: var(--bs-body-text-align);\\\">\\u0641\\u064a \\u0627\\u0644\\u0623\\u0633\\u0627\\u0633 \\u060c \\u0644\\u0627 \\u064a\\u0647\\u0645 \\u0627\\u0644\\u0645\\u0643\\u0627\\u0646 \\u0627\\u0644\\u0630\\u064a \\u062a\\u062e\\u062a\\u0627\\u0631 \\u0648\\u0636\\u0639\\u0647 \\u0641\\u064a\\u0647 \\u060c \\u0637\\u0627\\u0644\\u0645\\u0627 \\u0623\\u0646 \\u0627\\u0644\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\\u064a\\u0646 \\u0644\\u062f\\u064a\\u0647\\u0645 \\u062d\\u0642 \\u0627\\u0644\\u0648\\u0635\\u0648\\u0644 \\u0625\\u0644\\u064a\\u0647 \\u060c \\u0641\\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0647\\u064a \\u0646\\u0635 \\u0642\\u0627\\u0646\\u0648\\u0646\\u064a. \\u062a\\u0639\\u062a\\u0645\\u062f \\u0627\\u0644\\u0635\\u064a\\u0627\\u063a\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0627\\u062e\\u062a\\u0635\\u0627\\u0635\\u0627\\u062a \\u0627\\u0644\\u0642\\u0636\\u0627\\u0626\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u064a\\u0642\\u0639 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u0636\\u0645\\u0646\\u0647\\u0627 \\u0648\\u0643\\u064a\\u0641\\u064a\\u0629 \\u062a\\u0639\\u0627\\u0645\\u0644 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0645\\u0639 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.<\\/span><\\/p><p>\\u0643\\u0644 \\u0627\\u0644\\u0645\\u0648\\u0627\\u0642\\u0639 \\u0645\\u062e\\u062a\\u0644\\u0641\\u0629. \\u0646\\u0648\\u0635\\u064a\\u0643 \\u062f\\u0627\\u0626\\u0645\\u064b\\u0627 \\u0628\\u0627\\u0633\\u062a\\u0634\\u0627\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0645\\u064d \\u0644\\u0644\\u062a\\u0623\\u0643\\u062f \\u0645\\u0646 \\u0623\\u0646 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643 \\u0645\\u062a\\u0648\\u0627\\u0641\\u0642\\u0629 \\u0645\\u0639 \\u062c\\u0645\\u064a\\u0639 \\u0627\\u0644\\u0642\\u0648\\u0627\\u0646\\u064a\\u0646 \\u0627\\u0644\\u0645\\u0639\\u0645\\u0648\\u0644 \\u0628\\u0647\\u0627.<\\/p><p>\\u0648\\u0645\\u0639 \\u0630\\u0644\\u0643 \\u060c \\u0642\\u062f \\u064a\\u0628\\u062f\\u0648 \\u0647\\u0630\\u0627 \\u0643\\u0646\\u0641\\u0642\\u0629 \\u0643\\u0628\\u064a\\u0631\\u0629 \\u0625\\u0630\\u0627 \\u0643\\u0646\\u062a \\u060c \\u0639\\u0644\\u0649 \\u0633\\u0628\\u064a\\u0644 \\u0627\\u0644\\u0645\\u062b\\u0627\\u0644 \\u060c \\u0645\\u062f\\u0648\\u0646 \\u0647\\u0648\\u0627\\u064a\\u0629 \\u0623\\u0648 \\u0634\\u0631\\u0643\\u0629 \\u0635\\u063a\\u064a\\u0631\\u0629.<\\/p><p>\\u0645\\u0627 \\u064a\\u062c\\u0628 \\u0623\\u0644\\u0627 \\u062a\\u0641\\u0639\\u0644\\u0647 \\u0623\\u0628\\u062f\\u064b\\u0627 \\u0647\\u0648 \\u0646\\u0633\\u062e \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0645\\u0646 \\u0628\\u0639\\u0636 \\u0627\\u0644\\u0645\\u0648\\u0627\\u0642\\u0639 \\u0627\\u0644\\u0623\\u062e\\u0631\\u0649.<\\/p><p>\\u0644\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0633\\u0628\\u0628 \\u0623\\u064a\\u0636\\u064b\\u0627 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645 \\u0645\\u064f\\u0646\\u0634\\u0626 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0623\\u0645\\u0631\\u064b\\u0627 \\u062e\\u0637\\u064a\\u0631\\u064b\\u0627 \\u060c \\u062d\\u064a\\u062b \\u064a\\u062c\\u0628 \\u0623\\u0646 \\u062a\\u0643\\u0648\\u0646 \\u062d\\u0631\\u064a\\u0635\\u064b\\u0627 \\u062c\\u062f\\u064b\\u0627 \\u0639\\u0644\\u0649 \\u062a\\u0636\\u0645\\u064a\\u0646 \\u062c\\u0645\\u064a\\u0639 \\u0627\\u0644\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0627\\u0644\\u0645\\u062d\\u062f\\u062f\\u0629 \\u0644\\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u060c \\u0648\\u0644\\u064a\\u0633 \\u0644\\u062f\\u064a\\u0643 \\u0641\\u0642\\u0637 \\u0645\\u064f\\u0646\\u0634\\u0626 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u064a\\u0642\\u0648\\u0645 \\u0628\\u0625\\u062e\\u0631\\u0627\\u062c \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u0627\\u0641\\u062a\\u0631\\u0627\\u0636\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u0644\\u0627 \\u062a\\u062a\\u0648\\u0627\\u0641\\u0642 \\u0645\\u0639 \\u0645\\u0648\\u0642\\u0639\\u0643. \\u0646\\u0637\\u0627\\u0642<\\/p><p>\\u0642\\u0648\\u0627\\u0644\\u0628 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0644\\u0640 GDPR \\u0648\\u0645\\u0648\\u0644\\u062f\\u0627\\u062a \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629<\\/p><p>\\u062a\\u0648\\u062c\\u062f \\u0627\\u0644\\u0639\\u062f\\u064a\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0623\\u062f\\u0648\\u0627\\u062a \\u0644\\u0625\\u0646\\u0634\\u0627\\u0621 \\u0633\\u064a\\u0627\\u0633\\u0627\\u062a \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0648\\u0642\\u0648\\u0627\\u0644\\u0628 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0648\\u0623\\u062f\\u0648\\u0627\\u062a \\u0625\\u0646\\u0634\\u0627\\u0621 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0625\\u0646\\u062a\\u0631\\u0646\\u062a.<\\/p><p>\\u0628\\u0639\\u0636\\u0647\\u0627 \\u0645\\u062c\\u0627\\u0646\\u064a \\u0648\\u0627\\u0644\\u0628\\u0639\\u0636 \\u0627\\u0644\\u0622\\u062e\\u0631 \\u064a\\u0623\\u062a\\u064a \\u0628\\u0633\\u0639\\u0631. \\u0628\\u0639\\u0636\\u0647\\u0627 \\u0644\\u064a\\u0633 \\u0633\\u064a\\u0627\\u0633\\u0627\\u062a \\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0645\\u062a\\u0648\\u0627\\u0641\\u0642\\u0629 \\u0645\\u0639 \\u0627\\u0644\\u0642\\u0627\\u0646\\u0648\\u0646 \\u0627\\u0644\\u0639\\u0627\\u0645 \\u0644\\u062d\\u0645\\u0627\\u064a\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a (GDPR).<\\/p><p><span style=\\\"font-size: 0.9375rem; font-weight: initial; text-align: var(--bs-body-text-align);\\\">1) \\u062d\\u0627\\u0641\\u0638 \\u0639\\u0644\\u0649 \\u0643\\u0644 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u0628\\u0634\\u0643\\u0644 \\u0635\\u062d\\u064a\\u062d<\\/span><\\/p><p>2) \\u062a\\u0623\\u0643\\u062f \\u0645\\u0646 \\u0623\\u0646 \\u0643\\u0644 \\u0645\\u062f\\u062e\\u0644\\u0627\\u062a\\u0643 \\u0635\\u062d\\u064a\\u062d\\u0629<\\/p><p>3) \\u0625\\u0630\\u0627 \\u0643\\u0646\\u062a \\u062a\\u0633\\u062a\\u0637\\u064a\\u0639 \\u0627\\u0644\\u0642\\u064a\\u0627\\u0645 \\u0628\\u0645\\u0647\\u0627\\u0645 \\u0645\\u062a\\u0639\\u062f\\u062f\\u0629 \\u0633\\u062a\\u0643\\u0648\\u0646 \\u0632\\u0627\\u0626\\u062f<\\/p><p>\\u0647\\u0646\\u0627\\u0643 \\u0627\\u0644\\u0639\\u062f\\u064a\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0623\\u062f\\u0648\\u0627\\u062a \\u0644\\u0625\\u0646\\u0634\\u0627\\u0621 \\u0633\\u064a\\u0627\\u0633\\u0627\\u062a \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0648\\u0646\\u0645\\u0627\\u0630\\u062c \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0648\\u0623\\u062f\\u0648\\u0627\\u062a \\u0625\\u0646\\u0634\\u0627\\u0621 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0625\\u0646\\u062a\\u0631\\u0646\\u062a. \\u0628\\u0639\\u0636\\u0647\\u0627 \\u0645\\u062c\\u0627\\u0646\\u064a \\u0648\\u0627\\u0644\\u0628\\u0639\\u0636 \\u0627\\u0644\\u0622\\u062e\\u0631 \\u064a\\u0623\\u062a\\u064a \\u0628\\u0633\\u0639\\u0631. \\u0628\\u0639\\u0636\\u0647\\u0627 \\u0644\\u064a\\u0633 \\u0633\\u064a\\u0627\\u0633\\u0627\\u062a \\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0645\\u062a\\u0648\\u0627\\u0641\\u0642\\u0629 \\u0645\\u0639 \\u0627\\u0644\\u0642\\u0627\\u0646\\u0648\\u0646 \\u0627\\u0644\\u0639\\u0627\\u0645 \\u0644\\u062d\\u0645\\u0627\\u064a\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a (GDPR).<\\/p><p><span style=\\\"font-size: 0.9375rem; font-weight: initial; text-align: var(--bs-body-text-align);\\\">\\u0645\\u0644\\u0627\\u062d\\u0638\\u0629: \\u0641\\u0642\\u0637 \\u0627\\u062c\\u0639\\u0644 \\u0645\\u064f\\u0646\\u0634\\u0626 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u064a\\u0628\\u0635\\u0642 \\u0645\\u064f\\u0646\\u0634\\u0626\\u064b\\u0627 \\u0627\\u0641\\u062a\\u0631\\u0627\\u0636\\u064a\\u064b\\u0627 \\u0644\\u0627 \\u064a\\u062a\\u0645\\u0627\\u0634\\u0649 \\u0645\\u0639 \\u0645\\u062c\\u0627\\u0644\\u0643 \\u060c \\u0644\\u0630\\u0627 \\u0641\\u0645\\u0646 \\u0627\\u0644\\u0645\\u0647\\u0645 \\u062c\\u062f\\u064b\\u0627 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u0645\\u0648\\u0636\\u0648\\u0639 \\u0627\\u0644\\u062d\\u062c\\u0632 \\u0627\\u0644\\u062a\\u0642\\u0646\\u064a \\u0644\\u062f\\u064a\\u0646\\u0627.<\\/span><\\/p>\"}', 0, 0, 1, 1, '2022-08-03 06:37:13', '2022-11-26 10:01:05'),
(14, '{\"en_GB\":\"Privacy Policy\",\"ar\":\"\\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629\"}', 'privacy-policy', '{\"en_GB\":\"<h1 style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; line-height: 1.08333; font-size: 48px !important;\\\"><b style=\\\"\\\">How can I get a privacy policy on my website? A GDPR compliant privacy policy<\\/b><\\/h1><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Lato, sans-serif; font-size: 15px; line-height: 26px; color: rgb(68, 68, 68);\\\"><br style=\\\"margin: 0px; padding: 0px;\\\"><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\">The privacy policy can be written as an independent page on your website, and be made accessible as a link in the header or footer of your website, or on your \\u2018About\\u2019 page. It may also be hosted by a privacy policy-service with a link from your homepage.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\">Basically, it doesn\\u2019t matter where you choose to place it, as long as your users have access to it.The privacy policy is a legal text. The phrasing depends on which jurisdictions your website falls under and how&nbsp; website handles data.<\\/p><h1 style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; line-height: 1.08333; color: rgb(22, 34, 42); font-size: 16px;\\\"><br><\\/h1><h1 style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; line-height: 1.08333; color: rgb(22, 34, 42); font-size: 16px;\\\">However, this might seem as a large expense if you are, for instance, a hobby blogger or small business.<\\/h1><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\">What you should&nbsp;<a href=\\\"https:\\/\\/medium.com\\/@StartupPolicy\\/five-reasons-why-copying-someone-else-s-terms-of-use-and-privacy-policy-is-a-bad-idea-fd8d126ac0b3\\\" style=\\\"margin: 0px; padding: 0px; color: rgb(0, 123, 255); text-decoration: none; transition: all 0.3s ease-in-out 0s; outline: 0px; font-family: Poppins, sans-serif; line-height: inherit;\\\">never do, is to copy a privacy policy from some other website<\\/a>.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\">That is also why using a privacy policy generator can be a hazardous thing, since you must be very careful to include all the specific information of your website, and not just have privacy policy generator spit out a default one that isn\'t aligned with your domain<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\"><br style=\\\"margin: 0px; padding: 0px;\\\"><\\/p><h5 style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; line-height: 1.08333; color: inherit; font-size: 16px !important;\\\">GDPR&nbsp;<span style=\\\"margin: 0px; padding: 0px; font-weight: bolder; line-height: 1.08333;\\\">privacy policy templates &amp; privacy policy generators<\\/span><\\/h5><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\">There exists numerous tools for creating privacy policies, and privacy policy templates and privacy policy generators on the internet.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\">Some are free and others come at a price. Some are not GDPR compliant privacy policies.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\"><br style=\\\"margin: 0px; padding: 0px;\\\"><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\">1) Maintain all the content properly<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\">2) Ensure your all input is right<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\">3) if you can do multiple task that will be plus<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\"><br style=\\\"margin: 0px; padding: 0px;\\\"><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\">There policy is the numerous tools for creating privacy policies, and privacy policy templates and privacy policy generators on the internet. Some are free and others come at a price. Some are not GDPR compliant privacy policies.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\"><br style=\\\"margin: 0px; padding: 0px;\\\"><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\"><span style=\\\"margin: 0px; padding: 0px; font-weight: bolder;\\\">Note :&nbsp;<\\/span>just have privacy policy generator spit out a default one that isn\'t aligned with your domain So it\'s very important loyal technical theury of our reservation.<\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Gotham, sans-serif; font-size: 16px; line-height: 26px; color: rgb(22, 34, 42);\\\"><br style=\\\"margin: 0px; padding: 0px;\\\"><\\/p>\",\"ar\":\"<p>\\u0643\\u064a\\u0641 \\u064a\\u0645\\u0643\\u0646\\u0646\\u064a \\u0627\\u0644\\u062d\\u0635\\u0648\\u0644 \\u0639\\u0644\\u0649 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0639\\u0644\\u0649 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u064a\\u061f \\u0633\\u064a\\u0627\\u0633\\u0629 \\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0645\\u062a\\u0648\\u0627\\u0641\\u0642\\u0629 \\u0645\\u0639 \\u0627\\u0644\\u0644\\u0627\\u0626\\u062d\\u0629 \\u0627\\u0644\\u0639\\u0627\\u0645\\u0629 \\u0644\\u062d\\u0645\\u0627\\u064a\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a (GDPR)<\\/p><p>\\u064a\\u0645\\u0643\\u0646 \\u0643\\u062a\\u0627\\u0628\\u0629 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0643\\u0635\\u0641\\u062d\\u0629 \\u0645\\u0633\\u062a\\u0642\\u0644\\u0629 \\u0639\\u0644\\u0649 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u060c \\u0648\\u064a\\u0645\\u0643\\u0646 \\u0627\\u0644\\u0648\\u0635\\u0648\\u0644 \\u0625\\u0644\\u064a\\u0647\\u0627 \\u0643\\u0627\\u0631\\u062a\\u0628\\u0627\\u0637 \\u0641\\u064a \\u0631\\u0623\\u0633 \\u0623\\u0648 \\u062a\\u0630\\u064a\\u064a\\u0644 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u060c \\u0623\\u0648 \\u0641\\u064a \\u0635\\u0641\\u062d\\u0629 \\\"\\u062d\\u0648\\u0644\\\" \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643. \\u064a\\u0645\\u0643\\u0646 \\u0623\\u064a\\u0636\\u064b\\u0627 \\u0627\\u0633\\u062a\\u0636\\u0627\\u0641\\u062a\\u0647 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 \\u062e\\u062f\\u0645\\u0629 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0645\\u0639 \\u0627\\u0631\\u062a\\u0628\\u0627\\u0637 \\u0645\\u0646 \\u0635\\u0641\\u062d\\u062a\\u0643 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629.<\\/p><p><span style=\\\"font-size: 0.9375rem; font-weight: initial; text-align: var(--bs-body-text-align);\\\">\\u0641\\u064a \\u0627\\u0644\\u0623\\u0633\\u0627\\u0633 \\u060c \\u0644\\u0627 \\u064a\\u0647\\u0645 \\u0627\\u0644\\u0645\\u0643\\u0627\\u0646 \\u0627\\u0644\\u0630\\u064a \\u062a\\u062e\\u062a\\u0627\\u0631 \\u0648\\u0636\\u0639\\u0647 \\u0641\\u064a\\u0647 \\u060c \\u0637\\u0627\\u0644\\u0645\\u0627 \\u0623\\u0646 \\u0627\\u0644\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\\u064a\\u0646 \\u0644\\u062f\\u064a\\u0647\\u0645 \\u062d\\u0642 \\u0627\\u0644\\u0648\\u0635\\u0648\\u0644 \\u0625\\u0644\\u064a\\u0647 \\u060c \\u0641\\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0647\\u064a \\u0646\\u0635 \\u0642\\u0627\\u0646\\u0648\\u0646\\u064a. \\u062a\\u0639\\u062a\\u0645\\u062f \\u0627\\u0644\\u0635\\u064a\\u0627\\u063a\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0627\\u062e\\u062a\\u0635\\u0627\\u0635\\u0627\\u062a \\u0627\\u0644\\u0642\\u0636\\u0627\\u0626\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u064a\\u0642\\u0639 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u0636\\u0645\\u0646\\u0647\\u0627 \\u0648\\u0643\\u064a\\u0641\\u064a\\u0629 \\u062a\\u0639\\u0627\\u0645\\u0644 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0645\\u0639 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a.<\\/span><\\/p><p>\\u0643\\u0644 \\u0627\\u0644\\u0645\\u0648\\u0627\\u0642\\u0639 \\u0645\\u062e\\u062a\\u0644\\u0641\\u0629. \\u0646\\u0648\\u0635\\u064a\\u0643 \\u062f\\u0627\\u0626\\u0645\\u064b\\u0627 \\u0628\\u0627\\u0633\\u062a\\u0634\\u0627\\u0631\\u0629 \\u0645\\u062d\\u0627\\u0645\\u064d \\u0644\\u0644\\u062a\\u0623\\u0643\\u062f \\u0645\\u0646 \\u0623\\u0646 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643 \\u0645\\u062a\\u0648\\u0627\\u0641\\u0642\\u0629 \\u0645\\u0639 \\u062c\\u0645\\u064a\\u0639 \\u0627\\u0644\\u0642\\u0648\\u0627\\u0646\\u064a\\u0646 \\u0627\\u0644\\u0645\\u0639\\u0645\\u0648\\u0644 \\u0628\\u0647\\u0627.<\\/p><p>\\u0648\\u0645\\u0639 \\u0630\\u0644\\u0643 \\u060c \\u0642\\u062f \\u064a\\u0628\\u062f\\u0648 \\u0647\\u0630\\u0627 \\u0643\\u0646\\u0641\\u0642\\u0629 \\u0643\\u0628\\u064a\\u0631\\u0629 \\u0625\\u0630\\u0627 \\u0643\\u0646\\u062a \\u060c \\u0639\\u0644\\u0649 \\u0633\\u0628\\u064a\\u0644 \\u0627\\u0644\\u0645\\u062b\\u0627\\u0644 \\u060c \\u0645\\u062f\\u0648\\u0646 \\u0647\\u0648\\u0627\\u064a\\u0629 \\u0623\\u0648 \\u0634\\u0631\\u0643\\u0629 \\u0635\\u063a\\u064a\\u0631\\u0629.<\\/p><p>\\u0645\\u0627 \\u064a\\u062c\\u0628 \\u0623\\u0644\\u0627 \\u062a\\u0641\\u0639\\u0644\\u0647 \\u0623\\u0628\\u062f\\u064b\\u0627 \\u0647\\u0648 \\u0646\\u0633\\u062e \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0645\\u0646 \\u0628\\u0639\\u0636 \\u0627\\u0644\\u0645\\u0648\\u0627\\u0642\\u0639 \\u0627\\u0644\\u0623\\u062e\\u0631\\u0649.<\\/p><p>\\u0644\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0633\\u0628\\u0628 \\u0623\\u064a\\u0636\\u064b\\u0627 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645 \\u0645\\u064f\\u0646\\u0634\\u0626 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0623\\u0645\\u0631\\u064b\\u0627 \\u062e\\u0637\\u064a\\u0631\\u064b\\u0627 \\u060c \\u062d\\u064a\\u062b \\u064a\\u062c\\u0628 \\u0623\\u0646 \\u062a\\u0643\\u0648\\u0646 \\u062d\\u0631\\u064a\\u0635\\u064b\\u0627 \\u062c\\u062f\\u064b\\u0627 \\u0639\\u0644\\u0649 \\u062a\\u0636\\u0645\\u064a\\u0646 \\u062c\\u0645\\u064a\\u0639 \\u0627\\u0644\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0627\\u0644\\u0645\\u062d\\u062f\\u062f\\u0629 \\u0644\\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u060c \\u0648\\u0644\\u064a\\u0633 \\u0644\\u062f\\u064a\\u0643 \\u0641\\u0642\\u0637 \\u0645\\u064f\\u0646\\u0634\\u0626 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u064a\\u0642\\u0648\\u0645 \\u0628\\u0625\\u062e\\u0631\\u0627\\u062c \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u0627\\u0641\\u062a\\u0631\\u0627\\u0636\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u0644\\u0627 \\u062a\\u062a\\u0648\\u0627\\u0641\\u0642 \\u0645\\u0639 \\u0645\\u0648\\u0642\\u0639\\u0643. \\u0646\\u0637\\u0627\\u0642<\\/p><p>\\u0642\\u0648\\u0627\\u0644\\u0628 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0644\\u0640 GDPR \\u0648\\u0645\\u0648\\u0644\\u062f\\u0627\\u062a \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629<\\/p><p>\\u062a\\u0648\\u062c\\u062f \\u0627\\u0644\\u0639\\u062f\\u064a\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0623\\u062f\\u0648\\u0627\\u062a \\u0644\\u0625\\u0646\\u0634\\u0627\\u0621 \\u0633\\u064a\\u0627\\u0633\\u0627\\u062a \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0648\\u0642\\u0648\\u0627\\u0644\\u0628 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0648\\u0623\\u062f\\u0648\\u0627\\u062a \\u0625\\u0646\\u0634\\u0627\\u0621 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0625\\u0646\\u062a\\u0631\\u0646\\u062a.<\\/p><p>\\u0628\\u0639\\u0636\\u0647\\u0627 \\u0645\\u062c\\u0627\\u0646\\u064a \\u0648\\u0627\\u0644\\u0628\\u0639\\u0636 \\u0627\\u0644\\u0622\\u062e\\u0631 \\u064a\\u0623\\u062a\\u064a \\u0628\\u0633\\u0639\\u0631. \\u0628\\u0639\\u0636\\u0647\\u0627 \\u0644\\u064a\\u0633 \\u0633\\u064a\\u0627\\u0633\\u0627\\u062a \\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0645\\u062a\\u0648\\u0627\\u0641\\u0642\\u0629 \\u0645\\u0639 \\u0627\\u0644\\u0642\\u0627\\u0646\\u0648\\u0646 \\u0627\\u0644\\u0639\\u0627\\u0645 \\u0644\\u062d\\u0645\\u0627\\u064a\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a (GDPR).<\\/p><p><span style=\\\"font-size: 0.9375rem; font-weight: initial; text-align: var(--bs-body-text-align);\\\">1) \\u062d\\u0627\\u0641\\u0638 \\u0639\\u0644\\u0649 \\u0643\\u0644 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u0628\\u0634\\u0643\\u0644 \\u0635\\u062d\\u064a\\u062d<\\/span><\\/p><p>2) \\u062a\\u0623\\u0643\\u062f \\u0645\\u0646 \\u0623\\u0646 \\u0643\\u0644 \\u0645\\u062f\\u062e\\u0644\\u0627\\u062a\\u0643 \\u0635\\u062d\\u064a\\u062d\\u0629<\\/p><p>3) \\u0625\\u0630\\u0627 \\u0643\\u0646\\u062a \\u062a\\u0633\\u062a\\u0637\\u064a\\u0639 \\u0627\\u0644\\u0642\\u064a\\u0627\\u0645 \\u0628\\u0645\\u0647\\u0627\\u0645 \\u0645\\u062a\\u0639\\u062f\\u062f\\u0629 \\u0633\\u062a\\u0643\\u0648\\u0646 \\u0632\\u0627\\u0626\\u062f<\\/p><p>\\u0647\\u0646\\u0627\\u0643 \\u0627\\u0644\\u0639\\u062f\\u064a\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0623\\u062f\\u0648\\u0627\\u062a \\u0644\\u0625\\u0646\\u0634\\u0627\\u0621 \\u0633\\u064a\\u0627\\u0633\\u0627\\u062a \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0648\\u0646\\u0645\\u0627\\u0630\\u062c \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0648\\u0623\\u062f\\u0648\\u0627\\u062a \\u0625\\u0646\\u0634\\u0627\\u0621 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0625\\u0646\\u062a\\u0631\\u0646\\u062a. \\u0628\\u0639\\u0636\\u0647\\u0627 \\u0645\\u062c\\u0627\\u0646\\u064a \\u0648\\u0627\\u0644\\u0628\\u0639\\u0636 \\u0627\\u0644\\u0622\\u062e\\u0631 \\u064a\\u0623\\u062a\\u064a \\u0628\\u0633\\u0639\\u0631. \\u0628\\u0639\\u0636\\u0647\\u0627 \\u0644\\u064a\\u0633 \\u0633\\u064a\\u0627\\u0633\\u0627\\u062a \\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u0645\\u062a\\u0648\\u0627\\u0641\\u0642\\u0629 \\u0645\\u0639 \\u0627\\u0644\\u0642\\u0627\\u0646\\u0648\\u0646 \\u0627\\u0644\\u0639\\u0627\\u0645 \\u0644\\u062d\\u0645\\u0627\\u064a\\u0629 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a (GDPR).<\\/p><p><span style=\\\"font-size: 0.9375rem; font-weight: initial; text-align: var(--bs-body-text-align);\\\">\\u0645\\u0644\\u0627\\u062d\\u0638\\u0629: \\u0641\\u0642\\u0637 \\u0627\\u062c\\u0639\\u0644 \\u0645\\u064f\\u0646\\u0634\\u0626 \\u0633\\u064a\\u0627\\u0633\\u0629 \\u0627\\u0644\\u062e\\u0635\\u0648\\u0635\\u064a\\u0629 \\u064a\\u0628\\u0635\\u0642 \\u0645\\u064f\\u0646\\u0634\\u0626\\u064b\\u0627 \\u0627\\u0641\\u062a\\u0631\\u0627\\u0636\\u064a\\u064b\\u0627 \\u0644\\u0627 \\u064a\\u062a\\u0645\\u0627\\u0634\\u0649 \\u0645\\u0639 \\u0645\\u062c\\u0627\\u0644\\u0643 \\u060c \\u0644\\u0630\\u0627 \\u0641\\u0645\\u0646 \\u0627\\u0644\\u0645\\u0647\\u0645 \\u062c\\u062f\\u064b\\u0627 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u0645\\u0648\\u0636\\u0648\\u0639 \\u0627\\u0644\\u062d\\u062c\\u0632 \\u0627\\u0644\\u062a\\u0642\\u0646\\u064a \\u0644\\u062f\\u064a\\u0646\\u0627.<\\/span><br><\\/p>\"}', 0, 0, 1, 1, '2022-08-03 06:37:22', '2022-11-26 10:00:29'),
(15, '{\"en_GB\":\"All Templates\",\"ar\":\"\\u0643\\u0627\\u0641\\u0629 \\u0627\\u0644\\u0642\\u0648\\u0627\\u0644\\u0628\"}', 'all-templates', '{\"ar\":null}', 0, 1, 1, 1, '2022-08-03 06:46:47', '2022-08-04 06:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `page_builders`
--

CREATE TABLE `page_builders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `addon_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon_order` bigint(20) UNSIGNED DEFAULT NULL,
  `addon_page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `addon_page_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon_settings` longtext COLLATE utf8mb4_unicode_ci,
  `addon_namespace` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_builders`
--

INSERT INTO `page_builders` (`id`, `addon_name`, `addon_type`, `addon_location`, `addon_order`, `addon_page_id`, `addon_page_type`, `addon_settings`, `addon_namespace`, `created_at`, `updated_at`) VALUES
(1, 'HeaderStyleOne', 'update', 'dynamic_page', 1, 1, 'dynamic_page', '{\"id\":\"1\",\"addon_name\":\"HeaderStyleOne\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcSG9tZVxIZWFkZXJTdHlsZU9uZQ==\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"1\",\"addon_page_id\":\"1\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Create your own website within few  {h}minutes{\\/h}\",\"subtitle_en_GB\":\"You can easily create your website by Pica. We will  provide all  type of  digital service for you. We have somany readymade website  for you. We always try to provide best service for our customer.\",\"button_text_en_GB\":\"Get Started\",\"button_url_en_GB\":\"https:\\/\\/multipurposesass.com\\/view-plan\\/1\\/trial\",\"right_text_en_GB\":\"10 Days for free trial , No card required\",\"title_ar\":\"\\u0642\\u0645 \\u0628\\u0625\\u0646\\u0634\\u0627\\u0621 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u0641\\u064a \\u063a\\u0636\\u0648\\u0646 \\u062f\\u0642\\u0627\\u0626\\u0642 \\u0642\\u0644\\u064a\\u0644\\u0629\",\"subtitle_ar\":\"\\u064a\\u0645\\u0643\\u0646\\u0643 \\u0628\\u0633\\u0647\\u0648\\u0644\\u0629 \\u0625\\u0646\\u0634\\u0627\\u0621 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u0639\\u0646 \\u0637\\u0631\\u064a\\u0642 Pica. \\u0633\\u0648\\u0641 \\u0646\\u0642\\u062f\\u0645 \\u0644\\u0643 \\u062c\\u0645\\u064a\\u0639 \\u0623\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0631\\u0642\\u0645\\u064a\\u0629. \\u0644\\u062f\\u064a\\u0646\\u0627 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u062c\\u0627\\u0647\\u0632 \\u0644\\u0643. \\u0646\\u062d\\u0627\\u0648\\u0644 \\u062f\\u0627\\u0626\\u0645\\u064b\\u0627 \\u062a\\u0642\\u062f\\u064a\\u0645 \\u0623\\u0641\\u0636\\u0644 \\u062e\\u062f\\u0645\\u0629 \\u0644\\u0639\\u0645\\u0644\\u0627\\u0626\\u0646\\u0627.\",\"button_text_ar\":\"\\u0627\\u0644\\u0628\\u062f\\u0621\",\"button_url_ar\":\"#\",\"right_text_ar\":\"30 \\u064a\\u0648\\u0645\\u064b\\u0627 \\u0644\\u0644\\u062a\\u062c\\u0631\\u0628\\u0629 \\u0627\\u0644\\u0645\\u062c\\u0627\\u0646\\u064a\\u0629 \\u060c \\u0644\\u0627 \\u062d\\u0627\\u062c\\u0629 \\u0644\\u0628\\u0637\\u0627\\u0642\\u0629\",\"shape_image\":\"19\",\"right_image\":\"20\",\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Home\\HeaderStyleOne', '2022-07-30 04:51:00', '2022-11-24 13:48:35'),
(2, 'Brand', 'update', 'dynamic_page', 2, 1, 'dynamic_page', '{\"id\":\"2\",\"addon_name\":\"Brand\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXEJyYW5k\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"2\",\"addon_page_id\":\"1\",\"addon_page_type\":\"dynamic_page\",\"item_show\":\"6\",\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\Brand', '2022-07-30 07:13:19', '2022-07-30 08:00:25'),
(3, 'WhyChooseUs', 'update', 'dynamic_page', 3, 1, 'dynamic_page', '{\"id\":\"3\",\"addon_name\":\"WhyChooseUs\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXFdoeUNob29zZVVz\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"3\",\"addon_page_id\":\"1\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Why {h}choose{\\/h} us\",\"title_ar\":\"\\u0644\\u0645\\u0627\\u0630\\u0627 \\u0623\\u062e\\u062a\\u0631\\u062a\\u0646\\u0627\",\"why_choose_us_repeater\":{\"repeater_title_en_GB\":[\"image Globally Recognize\",\"image Easily customize\",\"image Build for Impact\",\"image Worldwide support\",\"image Awesome Design\",\"image Handle by Expert\"],\"repeater_title_url_en_GB\":[\"#\",\"#\",\"#\",\"#\",\"#\",\"#\"],\"repeater_subtitle_en_GB\":[\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem sit accusantium doloremqueau dantium, totam rem aperiam.\",\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem sit accusantium doloremqueau dantium, totam rem aperiam.\",\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem sit accusantium doloremqueau dantium, totam rem aperiam.\",\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem sit accusantium doloremqueau dantium, totam rem aperiam.\",\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem sit accusantium doloremqueau dantium, totam rem aperiam.\",\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem sit accusantium doloremqueau dantium, totam rem aperiam.\"],\"repeater_image_en_GB\":[\"31\",\"30\",\"29\",\"28\",\"27\",\"26\"],\"repeater_title_ar\":[\"\\u0635\\u0648\\u0631\\u0629 \\u062a\\u062a\\u0639\\u0631\\u0641 \\u0639\\u0627\\u0644\\u0645\\u064a\\u0627\",\"\\u0635\\u0648\\u0631\\u0629 \\u062a\\u062a\\u0639\\u0631\\u0641 \\u0639\\u0627\\u0644\\u0645\\u064a\\u0627\",\"\\u0635\\u0648\\u0631\\u0629 \\u062a\\u062a\\u0639\\u0631\\u0641 \\u0639\\u0627\\u0644\\u0645\\u064a\\u0627\",\"\\u0635\\u0648\\u0631\\u0629 \\u062a\\u062a\\u0639\\u0631\\u0641 \\u0639\\u0627\\u0644\\u0645\\u064a\\u0627\",\"\\u0635\\u0648\\u0631\\u0629 \\u062a\\u062a\\u0639\\u0631\\u0641 \\u0639\\u0627\\u0644\\u0645\\u064a\\u0627\",\"\\u0645\\u0639\\u0627\\u0644\\u062c\\u0629 \\u0627\\u0644\\u0635\\u0648\\u0631\\u0629 \\u0628\\u0648\\u0627\\u0633\\u0637\\u0629 \\u062e\\u0628\\u064a\\u0631\"],\"repeater_title_url_ar\":[\"#\",\"#\",\"#\",\"#\",\"#\",\"#\"],\"repeater_subtitle_ar\":[\"\\u0647\\u0630\\u0627 \\u0647\\u0648 \\u0627\\u0644\\u062e\\u0637\\u0623 \\u0627\\u0644\\u0630\\u064a \\u064a\\u062d\\u062f\\u062b \\u0641\\u064a \\u0643\\u0644 \\u0645\\u0643\\u0627\\u0646.\",\"\\u0647\\u0630\\u0627 \\u0647\\u0648 \\u0627\\u0644\\u062e\\u0637\\u0623 \\u0627\\u0644\\u0630\\u064a \\u064a\\u062d\\u062f\\u062b \\u0641\\u064a \\u0643\\u0644 \\u0645\\u0643\\u0627\\u0646.\",\"\\u0647\\u0630\\u0627 \\u0647\\u0648 \\u0627\\u0644\\u062e\\u0637\\u0623 \\u0627\\u0644\\u0630\\u064a \\u064a\\u062d\\u062f\\u062b \\u0641\\u064a \\u0643\\u0644 \\u0645\\u0643\\u0627\\u0646.\",\"\\u0647\\u0630\\u0627 \\u0647\\u0648 \\u0627\\u0644\\u062e\\u0637\\u0623 \\u0627\\u0644\\u0630\\u064a \\u064a\\u062d\\u062f\\u062b \\u0641\\u064a \\u0643\\u0644 \\u0645\\u0643\\u0627\\u0646.\",\"\\u0647\\u0630\\u0627 \\u0647\\u0648 \\u0627\\u0644\\u062e\\u0637\\u0623 \\u0627\\u0644\\u0630\\u064a \\u064a\\u062d\\u062f\\u062b \\u0641\\u064a \\u0643\\u0644 \\u0645\\u0643\\u0627\\u0646.\",\"\\u0647\\u0630\\u0627 \\u0647\\u0648 \\u0627\\u0644\\u062e\\u0637\\u0623 \\u0627\\u0644\\u0630\\u064a \\u064a\\u062d\\u062f\\u062b \\u0641\\u064a \\u0643\\u0644 \\u0645\\u0643\\u0627\\u0646.\"],\"repeater_image_ar\":[\"31\",\"30\",\"29\",\"28\",\"28\",\"26\"]},\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\WhyChooseUs', '2022-07-30 07:39:24', '2022-11-24 07:04:20'),
(4, 'TemplateDesign', 'update', 'dynamic_page', 4, 1, 'dynamic_page', '{\"id\":\"4\",\"addon_name\":\"TemplateDesign\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXFRlbXBsYXRlRGVzaWdu\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"4\",\"addon_page_id\":\"1\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Explore our {h}templates{\\/h}\",\"right_text_en_GB\":\"Explore\",\"right_text_url_en_GB\":\"#\",\"bottom_text_en_GB\":\"Live Preview\",\"title_ar\":\"\\u0627\\u0633\\u062a\\u0643\\u0634\\u0641 \\u0642\\u0648\\u0627\\u0644\\u0628\\u0646\\u0627\",\"right_text_ar\":\"\\u064a\\u0643\\u062a\\u0634\\u0641\",\"right_text_url_ar\":\"#\",\"bottom_text_ar\":\"\\u0645\\u0639\\u0627\\u064a\\u0646\\u0629 \\u0645\\u0628\\u0627\\u0634\\u0631\\u0629\",\"order_by\":\"id\",\"order\":\"asc\",\"item_show\":\"6\",\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\TemplateDesign', '2022-07-30 11:57:50', '2022-08-01 11:17:05'),
(5, 'PricePlan', 'update', 'dynamic_page', 5, 1, 'dynamic_page', '{\"id\":\"5\",\"addon_name\":\"PricePlan\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXFByaWNlUGxhbg==\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"5\",\"addon_page_id\":\"1\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Our {h} Pricing{\\/h} Plan\",\"button_text_en_GB\":\"Buy Now\",\"trial_text_en_GB\":\"Try Now\",\"title_ar\":\"\\u062e\\u0637\\u0629 \\u0627\\u0644\\u0623\\u0633\\u0639\\u0627\\u0631 \\u0644\\u062f\\u064a\\u0646\\u0627\",\"button_text_ar\":\"\\u0627\\u0634\\u062a\\u0631\\u064a \\u0627\\u0644\\u0622\\u0646\",\"trial_text_ar\":\"\\u062c\\u0631\\u0628 \\u0627\\u0644\\u0622\\u0646\",\"order_by\":\"id\",\"order\":\"asc\",\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\PricePlan', '2022-08-01 11:01:07', '2022-08-06 04:20:24'),
(6, 'TestimonialOne', 'update', 'dynamic_page', 6, 1, 'dynamic_page', '{\"id\":\"6\",\"addon_name\":\"TestimonialOne\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXFRlc3RpbW9uaWFsT25l\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"6\",\"addon_page_id\":\"1\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Our Clients {h} Review{\\/h}\",\"title_ar\":\"\\u0645\\u0631\\u0627\\u062c\\u0639\\u0629 \\u0639\\u0645\\u0644\\u0627\\u0626\\u0646\\u0627\",\"left_image\":\"9\",\"right_image\":\"10\",\"item\":\"3\",\"order_by\":\"id\",\"order\":\"asc\",\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\TestimonialOne', '2022-08-02 06:48:20', '2022-08-02 07:25:37'),
(7, 'FaqOne', 'update', 'dynamic_page', 7, 1, 'dynamic_page', '{\"id\":\"7\",\"addon_name\":\"FaqOne\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXEZhcU9uZQ==\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"7\",\"addon_page_id\":\"1\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Freequantly  asked {h}Question{\\/h}\",\"title_ar\":\"\\u0643\\u062b\\u064ais \\u064a\\u064f\\u0633\\u0623\\u0644 \\u0624\\u0627\\u0644\\u064a\\u064f\\u0633\\u0623\",\"left_image\":\"47\",\"faq_repeater\":{\"repeater_title_en_GB\":[\"How can I use this website templates?\",\"What are the entry requirement?\",\"How  can I give the payment for uses?\",\"How do I  purchase membership?\"],\"repeater_description_en_GB\":[\"Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstan occur in which toil and pain can procure him some great pleasure.\",\"Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstan occur in which toil and pain can procure him some great pleasure.\",\"Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstan occur in which toil and pain can procure him some great pleasure.\",\"Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstan occur in which toil and pain can procure him some great pleasure.\"],\"repeater_title_ar\":[\"\\u0643\\u064a\\u0641 \\u064a\\u0645\\u0643\\u0646\\u0646\\u064a \\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645 \\u0642\\u0648\\u0627\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \\u0647\\u0630\\u0647\\u061f\",\"\\u0643\\u064a\\u0641 \\u064a\\u0645\\u0643\\u0646\\u0646\\u064a \\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645 \\u0642\\u0648\\u0627\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \\u0647\\u0630\\u0647\\u061f\",\"\\u0643\\u064a\\u0641 \\u064a\\u0645\\u0643\\u0646\\u0646\\u064a \\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645 \\u0642\\u0648\\u0627\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \\u0647\\u0630\\u0647\\u061f\",\"\\u0643\\u064a\\u0641 \\u064a\\u0645\\u0643\\u0646\\u0646\\u064a \\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645 \\u0642\\u0648\\u0627\\u0644\\u0628 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \\u0647\\u0630\\u0647\\u061f\"],\"repeater_description_ar\":[\"\\u0648\\u0644\\u0627 \\u064a\\u0648\\u062c\\u062f \\u0623\\u064a\\u0636\\u064b\\u0627 \\u0623\\u064a \\u0634\\u062e\\u0635 \\u064a\\u062d\\u0628 \\u0623\\u0648 \\u064a\\u0633\\u0639\\u0649 \\u0623\\u0648 \\u064a\\u0631\\u063a\\u0628 \\u0641\\u064a \\u0627\\u0644\\u062d\\u0635\\u0648\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u0644\\u0645 \\u0645\\u0646 \\u0646\\u0641\\u0633\\u0647 \\u060c \\u0644\\u0623\\u0646\\u0647 \\u0623\\u0644\\u0645 \\u060c \\u0648\\u0644\\u0643\\u0646 \\u0644\\u0623\\u0646\\u0647 \\u064a\\u062d\\u062f\\u062b \\u0623\\u062d\\u064a\\u0627\\u0646\\u064b\\u0627 \\u0645\\u062d\\u064a\\u0637 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u062c\\u0644\\u0628 \\u0644\\u0647 \\u0641\\u064a\\u0647 \\u0627\\u0644\\u0643\\u062f \\u0648\\u0627\\u0644\\u0623\\u0644\\u0645 \\u0628\\u0639\\u0636 \\u0627\\u0644\\u0645\\u062a\\u0639\\u0629 \\u0627\\u0644\\u0643\\u0628\\u064a\\u0631\\u0629.\",\"\\u0648\\u0644\\u0627 \\u064a\\u0648\\u062c\\u062f \\u0623\\u064a\\u0636\\u064b\\u0627 \\u0623\\u064a \\u0634\\u062e\\u0635 \\u064a\\u062d\\u0628 \\u0623\\u0648 \\u064a\\u0633\\u0639\\u0649 \\u0623\\u0648 \\u064a\\u0631\\u063a\\u0628 \\u0641\\u064a \\u0627\\u0644\\u062d\\u0635\\u0648\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u0644\\u0645 \\u0645\\u0646 \\u0646\\u0641\\u0633\\u0647 \\u060c \\u0644\\u0623\\u0646\\u0647 \\u0623\\u0644\\u0645 \\u060c \\u0648\\u0644\\u0643\\u0646 \\u0644\\u0623\\u0646\\u0647 \\u064a\\u062d\\u062f\\u062b \\u0623\\u062d\\u064a\\u0627\\u0646\\u064b\\u0627 \\u0645\\u062d\\u064a\\u0637 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u062c\\u0644\\u0628 \\u0644\\u0647 \\u0641\\u064a\\u0647 \\u0627\\u0644\\u0643\\u062f \\u0648\\u0627\\u0644\\u0623\\u0644\\u0645 \\u0628\\u0639\\u0636 \\u0627\\u0644\\u0645\\u062a\\u0639\\u0629 \\u0627\\u0644\\u0643\\u0628\\u064a\\u0631\\u0629.\",\"\\u0648\\u0644\\u0627 \\u064a\\u0648\\u062c\\u062f \\u0623\\u064a\\u0636\\u064b\\u0627 \\u0623\\u064a \\u0634\\u062e\\u0635 \\u064a\\u062d\\u0628 \\u0623\\u0648 \\u064a\\u0633\\u0639\\u0649 \\u0623\\u0648 \\u064a\\u0631\\u063a\\u0628 \\u0641\\u064a \\u0627\\u0644\\u062d\\u0635\\u0648\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u0644\\u0645 \\u0645\\u0646 \\u0646\\u0641\\u0633\\u0647 \\u060c \\u0644\\u0623\\u0646\\u0647 \\u0623\\u0644\\u0645 \\u060c \\u0648\\u0644\\u0643\\u0646 \\u0644\\u0623\\u0646\\u0647 \\u064a\\u062d\\u062f\\u062b \\u0623\\u062d\\u064a\\u0627\\u0646\\u064b\\u0627 \\u0645\\u062d\\u064a\\u0637 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u062c\\u0644\\u0628 \\u0644\\u0647 \\u0641\\u064a\\u0647 \\u0627\\u0644\\u0643\\u062f \\u0648\\u0627\\u0644\\u0623\\u0644\\u0645 \\u0628\\u0639\\u0636 \\u0627\\u0644\\u0645\\u062a\\u0639\\u0629 \\u0627\\u0644\\u0643\\u0628\\u064a\\u0631\\u0629.\",\"\\u0648\\u0644\\u0627 \\u064a\\u0648\\u062c\\u062f \\u0623\\u064a\\u0636\\u064b\\u0627 \\u0623\\u064a \\u0634\\u062e\\u0635 \\u064a\\u062d\\u0628 \\u0623\\u0648 \\u064a\\u0633\\u0639\\u0649 \\u0623\\u0648 \\u064a\\u0631\\u063a\\u0628 \\u0641\\u064a \\u0627\\u0644\\u062d\\u0635\\u0648\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u0644\\u0645 \\u0645\\u0646 \\u0646\\u0641\\u0633\\u0647 \\u060c \\u0644\\u0623\\u0646\\u0647 \\u0623\\u0644\\u0645 \\u060c \\u0648\\u0644\\u0643\\u0646 \\u0644\\u0623\\u0646\\u0647 \\u064a\\u062d\\u062f\\u062b \\u0623\\u062d\\u064a\\u0627\\u0646\\u064b\\u0627 \\u0645\\u062d\\u064a\\u0637 \\u064a\\u0645\\u0643\\u0646 \\u0623\\u0646 \\u064a\\u062c\\u0644\\u0628 \\u0644\\u0647 \\u0641\\u064a\\u0647 \\u0627\\u0644\\u0643\\u062f \\u0648\\u0627\\u0644\\u0623\\u0644\\u0645 \\u0628\\u0639\\u0636 \\u0627\\u0644\\u0645\\u062a\\u0639\\u0629 \\u0627\\u0644\\u0643\\u0628\\u064a\\u0631\\u0629.\"]},\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\FaqOne', '2022-08-02 07:20:07', '2022-11-24 06:16:32'),
(8, 'Newsletter', 'update', 'dynamic_page', 8, 1, 'dynamic_page', '{\"id\":\"8\",\"addon_name\":\"Newsletter\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXE5ld3NsZXR0ZXI=\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"8\",\"addon_page_id\":\"1\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Sign up to our newslatter\",\"subtitle_en_GB\":\"Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because.\",\"button_text_en_GB\":\"Sign up free\",\"input_text_en_GB\":\"enter your email address\",\"title_ar\":\"\\u0627\\u0644\\u0627\\u0634\\u062a\\u0631\\u0627\\u0643 \\u0641\\u064a \\u0627\\u0644\\u0646\\u0634\\u0631\\u0629 \\u0627\\u0644\\u0625\\u062e\\u0628\\u0627\\u0631\\u064a\\u0629\",\"subtitle_ar\":\"\\u0648\\u0644\\u0627 \\u064a\\u0648\\u062c\\u062f \\u0623\\u064a\\u0636\\u064b\\u0627 \\u0623\\u064a \\u0634\\u062e\\u0635 \\u064a\\u062d\\u0628 \\u0623\\u0648 \\u064a\\u0633\\u0639\\u0649 \\u0623\\u0648 \\u064a\\u0631\\u063a\\u0628 \\u0641\\u064a \\u0627\\u0644\\u062d\\u0635\\u0648\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u0644\\u0645 \\u0645\\u0646 \\u0646\\u0641\\u0633\\u0647 \\u060c \\u0644\\u0623\\u0646\\u0647 \\u0623\\u0644\\u0645 \\u060c \\u0648\\u0644\\u0643\\u0646 \\u0628\\u0633\\u0628\\u0628.\",\"button_text_ar\":\"\\u0627\\u0644\\u0627\\u0634\\u062a\\u0631\\u0627\\u0643 \\u0645\\u062c\\u0627\\u0646\\u0627\",\"input_text_ar\":\"\\u0623\\u062f\\u062e\\u0644 \\u0639\\u0646\\u0648\\u0627\\u0646 \\u0628\\u0631\\u064a\\u062f\\u0643 \\u0627\\u0644\\u0627\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\",\"bg_shape\":null,\"padding_top\":\"0\",\"padding_bottom\":\"110\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\Newsletter', '2022-08-02 09:37:36', '2022-08-02 09:37:40');
INSERT INTO `page_builders` (`id`, `addon_name`, `addon_type`, `addon_location`, `addon_order`, `addon_page_id`, `addon_page_type`, `addon_settings`, `addon_namespace`, `created_at`, `updated_at`) VALUES
(9, 'AboutUs', 'update', 'dynamic_page', 1, 5, 'dynamic_page', '{\"id\":\"9\",\"addon_name\":\"AboutUs\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQWJvdXRcQWJvdXRVcw==\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"1\",\"addon_page_id\":\"5\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Easily make your {h} Website{\\/h}\",\"description_en_GB\":\"<p class=\\\"wow fadeInUp mb-24\\\" data-wow-delay=\\\"0.1s\\\" style=\\\"outline: none; -webkit-font-smoothing: antialiased; margin-bottom: 24px; color: rgb(85, 84, 84); font-family: \\\" open=\\\"\\\" sans\\\",=\\\"\\\" sans-serif;=\\\"\\\" hyphens:=\\\"\\\" auto;=\\\"\\\" line-height:=\\\"\\\" 1.7;=\\\"\\\" font-weight:=\\\"\\\" 400;=\\\"\\\" font-size:=\\\"\\\" 16px;=\\\"\\\" text-align:=\\\"\\\" center;=\\\"\\\" background-color:=\\\"\\\" rgb(255,=\\\"\\\" 255,=\\\"\\\" 255);=\\\"\\\" visibility:=\\\"\\\" visible;=\\\"\\\" animation-delay:=\\\"\\\" 0.1s;\\\"=\\\"\\\"><span style=\\\"font-weight: normal;\\\">In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or t obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise matherefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater or eendures pains to avoid worse pains.<\\/span><\\/p><p class=\\\"wow fadeInUp\\\" data-wow-delay=\\\"0.3s\\\" style=\\\"outline: none; -webkit-font-smoothing: antialiased; margin-bottom: 0px; color: rgb(85, 84, 84); font-family: \\\" open=\\\"\\\" sans\\\",=\\\"\\\" sans-serif;=\\\"\\\" hyphens:=\\\"\\\" auto;=\\\"\\\" line-height:=\\\"\\\" 1.7;=\\\"\\\" font-weight:=\\\"\\\" 400;=\\\"\\\" font-size:=\\\"\\\" 16px;=\\\"\\\" text-align:=\\\"\\\" center;=\\\"\\\" background-color:=\\\"\\\" rgb(255,=\\\"\\\" 255,=\\\"\\\" 255);=\\\"\\\" visibility:=\\\"\\\" visible;=\\\"\\\" animation-delay:=\\\"\\\" 0.3s;\\\"=\\\"\\\"><span style=\\\"font-weight: normal;\\\">In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.<\\/span><\\/p><p class=\\\"wow fadeInUp\\\" data-wow-delay=\\\"0.3s\\\" style=\\\"outline: none; -webkit-font-smoothing: antialiased; margin-bottom: 0px; color: rgb(85, 84, 84); font-family: \\\" open=\\\"\\\" sans\\\",=\\\"\\\" sans-serif;=\\\"\\\" hyphens:=\\\"\\\" auto;=\\\"\\\" line-height:=\\\"\\\" 1.7;=\\\"\\\" font-weight:=\\\"\\\" 400;=\\\"\\\" font-size:=\\\"\\\" 16px;=\\\"\\\" text-align:=\\\"\\\" center;=\\\"\\\" background-color:=\\\"\\\" rgb(255,=\\\"\\\" 255,=\\\"\\\" 255);=\\\"\\\" visibility:=\\\"\\\" visible;=\\\"\\\" animation-delay:=\\\"\\\" 0.3s;\\\"=\\\"\\\"><span style=\\\"font-weight: normal;\\\"><br><\\/span><\\/p><p class=\\\"wow fadeInUp\\\" data-wow-delay=\\\"0.3s\\\" style=\\\"outline: none; -webkit-font-smoothing: antialiased; margin-bottom: 0px; color: rgb(85, 84, 84); font-family: \\\" open=\\\"\\\" sans\\\",=\\\"\\\" sans-serif;=\\\"\\\" hyphens:=\\\"\\\" auto;=\\\"\\\" line-height:=\\\"\\\" 1.7;=\\\"\\\" font-weight:=\\\"\\\" 400;=\\\"\\\" font-size:=\\\"\\\" 16px;=\\\"\\\" text-align:=\\\"\\\" center;=\\\"\\\" background-color:=\\\"\\\" rgb(255,=\\\"\\\" 255,=\\\"\\\" 255);=\\\"\\\" visibility:=\\\"\\\" visible;=\\\"\\\" animation-delay:=\\\"\\\" 0.3s;\\\"=\\\"\\\"><br><\\/p><p class=\\\"wow fadeInUp\\\" data-wow-delay=\\\"0.3s\\\" style=\\\"outline: none; -webkit-font-smoothing: antialiased; margin-bottom: 0px; color: rgb(85, 84, 84); font-family: \\\" open=\\\"\\\" sans\\\",=\\\"\\\" sans-serif;=\\\"\\\" hyphens:=\\\"\\\" auto;=\\\"\\\" line-height:=\\\"\\\" 1.7;=\\\"\\\" font-weight:=\\\"\\\" 400;=\\\"\\\" font-size:=\\\"\\\" 16px;=\\\"\\\" text-align:=\\\"\\\" center;=\\\"\\\" background-color:=\\\"\\\" rgb(255,=\\\"\\\" 255,=\\\"\\\" 255);=\\\"\\\" visibility:=\\\"\\\" visible;=\\\"\\\" animation-delay:=\\\"\\\" 0.3s;\\\"=\\\"\\\"><span style=\\\"font-weight: normal;\\\"><br><\\/span><\\/p><p><span style=\\\"font-weight: normal;\\\"><img src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAABDQAAAIhCAMAAACG+xpaAAAC7lBMVEUAAAD05d3459j45t5wh9T64Nz639twjdbG6uljc6lwi9P64Nzz7+P28OT05t\\/64d1wjNYgIiX38OTvrIBwi9TH6un64N328eT44t1wjNT64N328OQ+JyhwjNVwi9X64NxwjNVwjNVwitP74d3F6uj28ORwjNUeIy328OT55N1wjNYgIy7549364NxwjdTxl3FvNCggJS\\/5sIVxi9T28OXwjmluMyf1q4BvNCf53tkdIy0cJCxwi9QfJC7dYEhwNShtNCttMyf3q4L64Nv6sYT5sIP4r4P4soT64N3ZXkfhYEncX0j5r4LoY0r0r4PF6+rbc1nD6ejH6unRWEL28OT5tojF6ufG6ejRWULH6+n6pYHii23G6unBqabii2z6tITvfVzMk3P64NzqYkn5s4T\\/\\/\\/9wjNUfJC7G6ukiIR9vNCj28ORVVFTii23+89b6ooDBVkRYdL77w0PEsK0fPIhYRDjQjWj+\\/PbgXkaCmtrkYUn6uZCAfn9YUU73+\\/3U7+\\/nYUj\\/9eD59vB2dHTTWkTYZVD6rIL\\/9+ft8fr2rYDrnXf\\/+e36y7O8q6nZ4fT63NP6xaflj2\\/XXEa4xur+57X60bzgY031qX15k9fi9PSmt+Xllnv718jbZU7bXUb52dPfoHnGVD8uLjNLLiiTqeBgXl3J1O\\/xo3s6Njn6v5zvrqHx+vru19bsak82PErjf2KQblvqpY\\/Wd13tc1jolXPzv7Rphc740MnDj2\\/whmxyamphfcXwf2D91HjHWUVTR0WUqN\\/Aze2ModvVYkrzlG6fr+CofGOvvuillpfSmHTW1NevpqjabFbl6vfwn3cxTZdxWU2tttT94Z\\/Svbq7gmTgycbxlIN+ZFYvNkeQncSRh4lTbK5IPz57QDL8ylj1yMDVp5fjkIHKZ0\\/GwtdzfrS8mpm7j3L+7s2Ui6g\\/XKePTz2nYUpjUEj8zar2r4v95dO2tbWfn5+qhW5rPTrBpKT+7eDco49QNTXYoXyemLii5qhlAAAAYnRSTlMAIBBgIL9A398QQIBAgDCfv8C\\/\\/GCe759wgN\\/PIp9w35DvMI+A38+Y71Cw37Dv7x\\/oetpQ3xCHWsahW0Cg72GlZkNAz7+ggHDPPNeSkKsw74pGv7eQsGBw56\\/v38+\\/v4+\\/ULqf7vkAAFuVSURBVHja7MFBEQAQEABABPDTQB\\/Dgwr6J5DC52Z3EwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABBVqbu3P\\/qZOQGRlLPG\\/eqxdzctagNxHMdHDWQVI0Fa3CBKK3XZlrKX9n2UllIo9DqDMC9AcknBU065eLF7Fi99E7qw7GnfU5OYTbY2azUZN8nM73NZ9i5f5+Gf+OMlugEgjfqbT5NngGwASOLz2eSZvCEAUH1vJs\\/nDIsNgMp7OdkD1QCA45qBagBAIXuTxFmdAEBlfZ48v+8EACrrbFKAzwQAKurNpAhnBAAq6tCFBpYaABD4NinGFyK\\/XjfQIQBS+T4piAIXKGMeaBMAqXyaFOQbkR6iATLqTIrykkirnRaNDibaQA7HDGngUOMwBjf+jUbn8iOqAVI46sIVl66HNYOH1aifX\\/LA+7dhMzhHNUAKadH45QinUDQMHvja7vLYx0bQDFQD5JAaDSqcOtE453t8VODKCKSHaAhWG\\/OnGQSg8hANcrpqzKa+GZoBckE0IuKrMaORKZpRRZo2arVaI61JANE4tQYPTGmCB\\/oEKkH7MBxc6Cyhm++sDxoBRONkxnEzYhgNrQhtOLhi6fR3LxCOJ6PxUzyVotGO9yY71egSKLWWpbP99FcjAhjuEq7HfXTHjPtw4VpiTeuC\\/WVh2+v1+sZe7HQD6w1EQ6SvPd94Z6GRHIZ2ez5sUsqo9WhXsljerTyXJlxvc7d+1I6B4tlANEQa88iU7uIPGgTKpmUmwdjc03TeZo1sIBqJ00djhmiUlRYnY7ly6D7O6hbZQDROFA2KaFRF02Jb9tyh\\/+eubLZlKTvAgWggGkpr6Sy09OihVuuHI1GiJkSD4ExDXc1XcTKO4dksNFBzsaFaNJqa1vJpGjmFc8P39O1Jz\\/DhPcPlMdJZwPbosaJNiq7kyUbqcNcv4YqPRtOfDTZ1lrgKZoNHRDwDcxoVMWShO4dmMGehIVGPEmPkzRcDnaW7ModROE4\\/EdojUCbbrYl9T7NxbRZ4RZQjfzQ0y2T76YMWEan7bzV4AO\\/tKpOmubPMyLrYMJU72JA8Gs2hedhssMhr97c8MMNTrsJ02pE6EUW7YL7FiuaxWih5sCF1NJrWFYvdXG8816Ex1\\/P+mg1+1yJidC751vTReQa2J3l0eaQtrBk689kuzce1VayGxNHQBuzBcu45NNX96naRPIokqBmxWcD\\/i2qULBrbZty4NC\\/3RsFqSBuNphUXY+PQvbzrh25cjMQ1I4FqlC0azYuwGQ7Nz7kNq6HUuUbqletv4Z49GsNoY7KYO0cM+Ql4pKDBt+J2PP6vj0vXUkTDZL5rKsY185lEIXIOd41MFrI3Dj2Qd81C+lBINYxab8wfdNu1MZpxpNrbvdGon+e8a72hotyqdvMqZTSGUTJW9BhulA1Ty18Ng\\/ja2\\/XF11r4tmE049jXMzf2RKPe5wbJyIr2JqI4N4pNeUkYDc2MNyZH8mwhB6KNtN9yrY3RjGNf6d5IiUbcDJ61Glp0byKOYzNfi6hCvmi0tqcZtw7NYLPNhkVy6aT9anwNzTiyGVE16o3eJY\\/0jVrUjICR+eJk4VKR3IVSh6HSRWPIAguPZuPexluU\\/MZ4CXn2ZkTVqBs711HdRtiMzNUYMN+KiuWFkz5EEbJFw2KBZe7ZYF1DNAqQNCOSLDIS\\/X6O36x7wXxzKtod830gapAsGgMWmJdkyu\\/cCOCRkyPVx\\/xgjSybE5uKFxyGvlZkgyJXNAbbrQmm\\/KrN4Ifq17PctrpUPHehzr2rVNEYiDoXv0Y1CmWcqhlavBAVbq7ODYpMY+RxM\\/KboxrZia\\/GbEoD02nOZpBBvDkRz1ZmMFSiaFgPzUA1qs\\/giRlNTHM1o5XcnIjnKbPUkCcacTMEVuOCQEGMnWTEZkkzMj1zsqQZbO5c+l9rVZYa0kRjJHrO7061JwrKpfFEM5LFRjfbZ8TL9g2yxFJDumicYM5vrdgTBeUyjpvxZDXaWU40lllXnRRLDdmiYUZfIqKfKHiNY41CNPgWTTPLttTQMn5GVixw6KmGAh8YSaJhneIqzV3gWKMoXR6a0lSzTEsNK9vVyf0f9s6etW0gDMAnyeA42MaYltSYhra0wTXFSz32P4SEklDoqiOgtWC0aPCkSYsWobnkd8SB4MmUjqVrf0gtWZVcR5ZPl\\/fk8909W1sSmkR59N77dTjinjQ47SHhyV3CAw9jadRwHHhCM8NyPAT8oaWHk1wmVE3kdarSiRvgiJD0gXmNhOfqZl9cIjjOcpOgQE1eb5CiMtrNmFYaaBSFGt3mCp283urQDBUQH2ucQIpU6MXNvviCwHjGqvzuyNOwwwnvrHXMImlkNInToCGtM2zykttLJDr6zb64hq2chCYwWWpL1svBKYCVxtTcxoRCGtFT4tG8NUq8kjw5zieXN3uiDZsFdU0m3Em1XWX\\/EErDLCONrEkjoJldxWXyp3KcTygn1jiaV0uGkNjgqlwoKfDSmEBK4zRa50aR04pZEH+EFI\\/Lvs4nV6gY+CEkh\\/ZycPZ7EprGCrURkJ00OuXzXj5OCMl7OuRIgj2\\/2QdHGlygQfY0eAHVog0nqKAv9MSy1JIvxseTURQwUDijXGHOkWMXj3Z+swfegi4FtcmyE8GCMtSoo02UNNY4hERonNKgcUbJAMWWo0h\\/fUMCrxkN4pYdO+eVwUvtXUmDuTQ+lm3\\/u8URpfNloSQDS9UXUM410B6NwCWKNCitEbI6pra3S0OXNbvxoRvTJ+vT6K5oE+7580s3j+PSneczSWajtaObnfCaBUVD0jzVHEfYDl2vRgOBY1itbdLQ+5LfrNTcEWpYMR9KTjR6ZZvHKd4znix3Gey2Bq8JDVQjLoh5GFNex3cHHXFmtzfmS0PvS3+H46Aw1JiWX0V+RiCN399W\\/IrCyxyC7x5Rjb6OZKBSa5xfIQR6OrFLNeqEVHNrHQSMkY1cNdPLPcaftdgZ6rboVmGoYcUMdEQOXuLQSiNjZu4CL0FyUF3h9auGQMiizlm5zNbcLInD4HxiWCtamzeIdZuRM6S3hlbUqmGtOEHkNPAS84nSIIpqbTl2asRo1aRDz98iSBpl2vVsvMLf\\/\\/nESCUxsDYZW5ayRnpiK5hW00oeY20IacxVzXWdC\\/bRxuW1jkA5LpPd9jClNXzw2cW+RcILJC9tK2GyzRkfyj4o3yGk8bDzDSPF9EmGfvH2y+URBBsNY9FffXl7pSFoXpVKUtwRduuwn13USazRQvKy9g2abuvQMCqXBskneZDoUldgLgFaucALaVkdzTNLEX1cjaU1ppOIqXJG7rcnCzb+\\/xYZPEojVMsUaNGPKpFGyaH4GY4p3VB+lzwIjF6la78Uyhm5gdh0Ol06dWptYChpCIV2XoE03pRt2Luja9mZM2jz0\\/t54fdkqpyx4YwiDCUNobgAkAb4QIFrU1nDK+jUgF64PVVJ0L5FjMGdNGRLhMJyzV4avdKlEA9HELSGMm\\/ze586I9caA4nrrS2LlLFWIia9V9Lgn+fMpTEkq4S4Mz\\/FXi+eeb8SzB0waO\\/qbm15VKFGao1+++SxKN63MmcA9GkAS+NeSeMp6F9ppAFfPJlv\\/fH\\/\\/JZQfZufZsVsn\\/vuIolpZe1t2sm7\\/ztms38ea6W6AAMQaaiOULZoR4ylUSfpB51jCmkwjzkNK2JSMI8l8fkk1kLWEttMtdHSs3\\/OnEG6uMuBkIaaPWFM+5xCGsBTSC4GkAZkStxao3CIU+qAo7XeRt99tG6nFTkD4P0CLo2FHJcYsOSKvTTMHcwOTxoTJQ2EWokz8qWBWmMNIP0FLw1Pjs3CTHlLIQ3Yg6oPIY054MgawT47JY0lOiqSBtLLDxz4ENJQm7vY84WNNLKUOGNpZJ+kp6RRMfnSoF+88lDBlOuDJDtCmaIfKWkoaexfGnHzMIA0XFVxrQDtXElDSWPv0ojLJy6xNHyczy3Jwibx7z1hzgVTaQSHLA2VCCXjc7d47zjQDWt\\/fqxYSsMJ7RzChSlcHrQWwV9jyfVeqye+qp4okpGD0GRNeDB50NrH05ed+gj\\/o94Z9j5ytHLsGjECL3GqkMYD+Ojii4LziaWau+A5jsNS1tgHkdKonQ5HOJdRp8f\\/f\\/\\/pHaHuTmlw2RGqqzbyihnFMwds8Q6gtev4VR0XMho+Ezkrk1xmwV4a9wTbYoEH1gykAOVVbsEU\\/nTyEnFMo7cZYtgxm954KW688SlJbsFLg\\/2Ua7N4NH6MRKbZjfiMCIA9nzgmU2y+F4Qed3BKcD+feW72\\/XC92\\/ldgFPqom4Sil8eENKgHyiAX8IjQ6Bh7OMENorvyGHJLdfXq2XKCL7PFmYu7m1oC66NuM0PQhqUhTT4dX+mHOv+9iKNXvxDZ8kdx6eTVBlB6DnFT3toi6yNpM2P+cCaD19I0\\/t527angi8Wbms50tBfoEqoYcapUBdzu0ujNvz31M8ckoRu+E8bHB+2KGkQ1FwXJNKgqLjCX2EwFf4Kg\\/ZgrD2Sht6v6kvtMA41Qm47u05HyTPvEQvwX7jxkk8LQpdP4JfwBP8XT9RlSbTOWG3B0F90rYjBi+gP\\/cq+1GO2oYaLOV1EXutkyiDH9QU9oySZUKqshk8sDfg86C5nCJkMXTpjybi9fuX1Sbu\\/S5AHE2qEnKZBn40olBHhRl\\/RwbS4EvOxOKmRVZMe40U2+JmwOy0yRCmML4AeCHoBtD7YuyA3Qg05Ao1XOCJI60YUV37UhTqiNJJpZWDYX7BmpEcQ4521Trep94V0Rv7NBBULspPeZACPzWWgUTtbhRmuSYe\\/sgZHQykwT0GeQ7lPihtZVP4+3bfd\\/9yMEx5COmPdGtNV5rdqZ6BjzOx5ucU8jp3U6vRhRhZsCLZY6JTpKTV7HM4QNMbaSf7k\\/3URel9IZ2TWmKQlZlJnQPYQB64Jj2vz2KPxJnaGvTCfgBPiiB4Shvh8sjCZcsdGtEbsjE1pJNYQ0hkIDbJutnVrvEdV0Rgxess8RMly3o7+b0bx0cQxn4YvmjU6eQtj+T+dRLTRNmkgXUxnGI87YCcVt4aesjmg+DyG8CtnzAFibcGs8XHLGNJBtexk0hCbdznbAKYVf+EdFhUUF3PY11UbYag36iIQyhqNvDGkQ6ukSSKNdu5YL0GbBvivku0CJzQ4rEvW6okzYKzBaUGZfgzJNtnhb6mkKWmUweguGVtLclcBjAkm5UErKPeQwalzz+FvVCN1BqA1RKm8xqHGrckK167geWgaKzQkKq3tC9inVa9D7WHgZGjIY+w+TJwBhSdUl9cnVqFGFmiIvP2MAlhpTAikAf\\/E4BA2CTpEfNFLc6CgjShnSAxqmVLhcXl8iRwgXEmjcQZpDR9z+F55g+Ffpb5Icyi9RwUU8YeQ\\/rJ39ipuA1EUVhKBsIiDCYYQwhrbEBFSpHHKfYy8gqZJ5yaoESRNXKmxCuPa6C0E9oJR5UYP4NavEf3YexXF8p2MtNGdib5m6128x\\/fn3DOyQUo0NN1oTjUiimV7z4Bpb3NsSZpea0w11vZT4BGccEkJOMjbn2k8qsbetevirilqhnbHvVf+7scJpxPXL+sQrKlEGT3V8aJL8whJQl69SHhTKRrvXiQgvtDmVaP+d\\/HigaRmmJwd+yk8zi+Evo3iqdSgpD2q49qNE9HNb5OR59f6k2\\/tJIfocJUhzsEhqRmawTXQiDPFAI6xjREp1KBkyrq3myZQSVgp8PqKu+trSgu7Zt1idSfoO6JhEyOewIgTSAbIho+W3gSdr6KMn+KiYNE1J0CDb738OdF4o7VA72O9pInFlqUMyPX4usEx4\\/PnV4mxBkWhUkOzmr92dZ2uOQGaDO9q4cq12svAVkuxMmNFNQrvjmNaE88rCLENikJfpHBRoLbPT2rgqZfS4uTDK60VZgZLcTz7b\\/HyMmNCMOFfh6qbXzOAsP1TrH\\/GjDWsGktGMVVFZhLNAH4kJD9aVg39nmWsFyKdCRtQrEOzQkNUM\\/AOZa2QL1R7e75DUtnnJzWPmgG0rxra0DjLhsdfZexZxoRafgb4ugL7Fj\\/nNzndFkyVphrafZOqsaQ5F5eZi2i8v5a9\\/rmlWz0oNtgm4G1Mcj7S\\/HQM8ULjOL\\/J8Zst55NQwvEqD4tmNINiepvkXAKTX74Gyeg\\/77epGfCWEF+svRetWM6A6petgR6q+WdXhh8KNSgeS1CmBO9ZTc01okwzVAkPIMNjYPKzL3mecJYf0m9ZM6BHQbZpwXrFqEuGNsXV75hbMhJioVJjq9SCoCHVcPedZjQPBCaXH4Duf24\\/RyRLjbQrcBfebu0wRl8y8jHonqPQiP2EqlrDRz1tE00ZctVgu5qerk4zngIITAbRyCGQomz+kctzcDabzXq\\/2TgOKzIZE5YMTcPHoGFeaGTEImtXd6XSKPQyDWWRa4tD9J5AKS6iQYZZWTQWDrvC5M6k3c2bWcWEdyehnzO\\/DjIKpWlqq+vycxb1UgOsTjPKqC0ao3TrimjGgHaNkTFGHeTf50XROIpsXQOFXKE5o08sZSlcbOyUWinR5FU\\/hdCr+Ol3zbIUFQwYH8ejKe0S44yFdicnTDTwoYar3n2FfvYGBzUS\\/iZSfEI6Gm1rg+J7aQn3pjmcmaYu0b8Hx4Po8W+iIeYK3SpkJT\\/TGzM4KRBAtTlPB5\\/Hx6MdFcw70njALeQwCBU7QFmqeGFhGixjUyUb\\/9ecp4OrrPfkPyFIu6wIFw1YuYqJhqfS\\/QnwluU4AddI1NvZQNANNf47PhXK+p2867MBdFmIaIC5S6A9cZUyhZZOCvhOkbzlKg2ZVf5P0lFNwRB6kPiEwMJTZfzHcL84nFfhY7YEhV5bq5CN1T44VGlmek1Q3tI+qDfn6biJDldeC4nfH+yB9iErVwQsnHyv7n9IKhsgHEvv4NoFwBtcnptG3VDjPyM3hIJBg+TRO84U5qACN66ouQuIlDo\\/KaEPDVZklXmD1+ANBgqLek8580oHpyHUdWTOawPtQ2zkCKGNEKi4Pilg3hvsNpPB8LyljS7meuXMKx2oITTKHAgya4Y25Hk17DRH8W0ET9KV9F8wHQ0mrAJrbPbO6xZI49jKW6F21DGERrIaNIq\\/BsI3tD85\\/rQRDmruXMtMZ+OBxYoY1t2ocH40+wTj0J3UH50OUUPokiVY8i7OfrF3Pr1Jg2EAf0ttTWEWa8zotLoJ0YrtDERDECRAdtnnMClNwPsuxsRdvHmRw+LRePYb7KCJ8eBN43VXv4YdMB5k7Xjfpy8rxfd3Y1k48OfH8+99XpAGYkMo8HPx1PT\\/lMBrxWwwG3wzmy1eiRg\\/P\\/pyKtL12hggoBoITfOAxqz7sKEGBBpCGqxr395znSTXup1au10f0a7Vut30\\/o6tMaP5hndpdwZII1ZVY0ixp0r8qs7NkQZzXh+4lMO6nXalf45KvdYlgpXi8ak0jlK\\/ewmkEaOBcuJR0AsgghF3J3Ne8SfJNRBGGPWORQQrw+hdT\\/oaILkwRuIhDXyoMUxUGlbDNgzH8f2WYxh2tZmGwLw4vkw87sblbm1iDOGNNHClF5B4s7UwGLOxLGkAx4hAY\\/k1DatqtPx5DLtJVp0rMNWRRSuj3qejLfKUlSC7Cs7gII0d2gW5Q0SgsWRpaFXDj6C18t7QdnoTdtDKoKcutLECPOmtwmXOII34LVd8AwVaJ5c5p2HZLf8inIZFeCEFqFP04BGvcihWpVq7z0ZbJCmJE5SyEptWKkdLQ9JRm05pOMZOkMNE6HWeyvAX0rItgiUjqbKZy+eVve3NF6Fsbu8pSj5nyqqeIYzAnBeyqNGt9JmpEUGybCXXbL02KERJQ7r\\/UGcfI\\/\\/m0TDEZidw9uQRv8Sk5VNRZdaGVDZL7h6Igo69QB9lNYMobKBK6bU+hooINpLleYLOGEyt4Q7GlM+cwXwvdhFO+C\\/gLeZQPPCeYwGo6fi0OA3q2EKXS+72i1hsKnlT1VnnvO6wKrPeR9IhggQJ3u17STljYo2NwsPBGbdlaewMVmtocOsJ9oC8B1zOPg3bZ8GwFvuibOZDdIFXR0nWaSNW9pk3a+oMkaKkiweIVhk3ZwQU4E7s6V8CZ4A1EFsLcUWNE4+Kr7wmpi3DZ6NVvcgXKviCL5TmuMu6v8kKyhnCGqnkcQJnmsEZUYA1EEvVkdI49qjgtRDTcnxmbC0iwCgpdMWL7QBlyn7wiDbmMFWKOS+mj1IQZwhrpBKNNj9PQhpPJcZBje8eDT8RB1y5byNv+Bgc63yEUdq72BP77rg1IklR\\/RVdLcu5kqssMIiSUxeUQ6+z1UCFNdJJcYckwzV+zoD2ySe69glWGhxXR1R9AG8NNadcIIt8TtYlwkRGL5slZT864nDli55xSyO0dPpTRDU0ZWgEAX9rHB54AQcHhxhnwDz80eslSgPqoHc5OANNg4zJyPnNCF24JVnPkDjoqukqu+FPfyuvIs6WtOuVehuOq1r9fxCdVwGjNQ494JDRGcBV2qLG22Eob6jvICwm5AywhmQq4b7Im2qG8EIv55RdRMAxT6cCX\\/TJ8ZFKX1hj6ViW1Wxa1lq9SoXBGA+YsYZOAERRgz+weDsRZwCdXFjxYdcFX\\/BEKpdCBaXIEq6zWumMkhNhjaWhNaq24bT8Ka3UnJpehHQfnDHLwWDENczRuyNvyXzgsIu84cfkR0iAIZFlopruLs4bEGYAFRgej0l9Hb4IXLGqtuNHYNiNtL9eJjgjLNZ4mGH162PIT\\/BQ3K\\/2JObb2vJj8vHXbISBEAYK3QzJVVw5XsFTtFA4ojXthZ8to5Hq6GwcaBx4IdbAhRrPKfOTP8ehDCmzk3u85jPwfP49EYZi6uQyUUv75+oboXVRyoKnaKHwY6ExwBskrWxADTQ8QbmByk9e8+2e8M9ODJ8DL0+NUVIz5PKR5HOZyi1ZQkx9irIGCvzJR8BJX7ixMcKFQCMi1Bj\\/n842Sf4FLY0h3QKeXja5IijwKqeS5Cg\\/my\\/FumUSRru\\/dOpEACtZaHGq6dKGNJjBi5AGUCDUbNHNd71BH3L9ELt30vQ5kfR7roI3INygTE5EWYOzMnwETqqSlFlpHHrh4KSh9ehKoSfsNz\\/DDdk3kyxoAAZJnHPeyOtUgYZIUHii2T4SJ0UvHHdpAM\\/pQo2fyPNq72MHGrbPjZXYHVp+Nt+EJUD0CJdIULgBtQwEVZIWliiNLIQazGt43tIFGltxJzTWKNQY10X357IUMqXbvxz+32XDZ+sV1j7Y4C8N4Drd\\/q4hqnfyPe6SM+0ve+fz2kgVB\\/CZpImk1aZ1SmxrtVuLrtWKv9BV17Lq+usg4kEvioKPRwbqDnsQKgXxWJocCmEPLetlCOs2iCwRIgZB4gpGgyhBswQk1aPQ5uRf4MybpN\\/JNG9+ZdK8yeRz0G1pD7tJPvP99b5PSU6GLNRQ4TvTlPkJHg6yngqPcQGl96r6mk8qG32SBtzictPFSo3vbbZO7mWgc8JWqEEIR5CeOG+5MWM0rDHwMMNPKYqN7sknLqQBB1D2th2XNb6HKiiVH3qtaCyI3sLUSDD\\/rEEbZiWNUajhAefXRE84y\\/mA0F2E+y3nNFbJz4Wdz5Jfs3M+XtdC+ftfm1vIkzOMVEFZfEbw4UWDNtZNGFU1Bp6a+MoaGmGT\\/EQ7G+\\/yHhe7V639+8f3hD9AGVZV0HtYqYIyl59odBZFn103YdRA4Vjpw\\/nIGiFtBTk90LiLc8UUJChe8mOy17XtShV0mPMTjegqSOPWugmjUIMZZ4jiFxOTnD9YpYYasFDDBWNqgvLjZx474wqpgjIVaIgik5Vv\\/lmb0hiNhbomNi16y19kH5sPuB0aKN2ccaf7iya938azkySrQdkKNFgNK4+1sW7CqBTaA147Q7UG8oc37upujY80eM4tDyXhMmhv+GyPjGgwFmgwWNTo1MbBuhmj\\/ISN3ETjT4T84I3JB7sNa3wCrVa3xMjNotc9Ega0W1kLNMQ1jlmINvLrJozyk8H3TXTc+Op4bzTD9Q3iDFhGrgHryMEarsoaHi\\/x+q23kkbs8X44Y\\/BHXS208d+6CaP8hCVnKMXQzgPLTNJyBnhDAb5ybw04g7L3mye+gBHypZj7e577AdvS4Dj+\\/fVThO1\\/i05Yy3MJvxpOHrIHOEOPZ9aYIdbY8biqMcfUo0Fk6PiJ25sXR6PkA1iuQCHbSlDYTVPu\\/sgOK5xb5pIqN73tuS6NseUM5qXxwvrpcYELAiFwhud8F0Eq7KYp\\/P3tO5FIDwWA78BqYffWuOJdqLGpNl1ZCidF9qVhHmqMihqO4T8V+8h5Pmz0BlvdFGINco8a36GNu+8IcXeAM3q1xlUvprzg7Mk4Q+GkH6RBXyx8cHh46G1Llht++D\\/FfjJN7u47scYxxDEDsYZ292JopZ2tvH073NgIznBb11DZ3Pay7TrFRE+9BeuFUHqCclATsEq6ZvDGqBJqBj9\\/Q+wb8BCaNKxxTMTZyVL4+xVnGG5oJM4g1gBnuOa+2zxNUXbcHHNdEPtAsypqcOwDF6zplIEBgzZG411mzvhL7CswLbiyihCbzRT+Tp6jSIO7A5zhnrHbegg2Pvt583qXCa\\/Y4AONnFAUFRieCDXNUA7TWE\\/6aF3HqH1i4oxbYr85r190wHRR1CAND4mdSRKuONfGzT1VN+1fhNVdcwMfBM3JWMgq\\/2f27ImRpzu0cYSN1NaB0UwoldfRd2K\\/me7cNo86YChL6Yc0gJlWsHHdYSryQ7LF1W1D2zU2gGtOAOIMjEvKH3xQB22xoNNGGZ9EPhhJw5JldEvsPzGzvUoowlQvBaThNWPPJ0EbTpUB2oAJrzODzU4aAlbIiwoPc\\/7hxQuPQZxhYo3RoAaFCYQuif3ncY5ADTfmmSlu9EkaEGwQNuHTb8ZnVzaThKWHbmtrY0e\\/VeO+QZ5hrmOCIIqMrtOgs\\/DChWcOBUyxxkgapkwi9LF4CqxxRoxN2PlZxrKUPjHX\\/vRfu75tYYydn\\/aSGveMcbGZ419saWPTWds1JnpLrohbNPwVaLR5B1PYWG8DcxwHI2lAERS5rGjkciWVRk60x\\/nuy+aZLm54D+QohGs3qefYtq9f3Uu2mBqHMAXSG63tOj6gkkY2D8\\/puu8CDcJrmEatwxhlQWvHjqShEUeOKxrZZr1ckTEgF\\/NNa3WcpUQ6zwZRGyTa0Ni7dmXHYI7tnZtXN5Ntlu4BL3Rqg7RdH+jHsZNSvVwrFou1cr5aytKUART90jrp5CVM5ahLUzZ9OJKGyixyGGiUyjIlDyyXRFPWOAr8ckeWshrlJ6PRsMLsRJtZ5auVaHSSZ2iGtEdmppJ69n689tNVlZ9+VHUB3DZnaJCMTx1rY5uEGvd6LY0cEQIgFGv5ZiMLwijli7gD4WEGtwpb85SAaQgHx86AH0ofjLonHMcnEEKOhkHzmI5cNYk3TFty4QSyS2IxEokrFolO+l0gY\\/c+kLRg6cy4WXqz+fMPTtquZ22mHbTPkVxUkQVMKCshSKNaw4QPOV\\/yMqYit3OTNAYqI2mQ5AT9IvYsDaCcc5af8Cvh5fjFReSKxMXV5dkoc+fsHTA289ASVRhTc+NmVRFgzsvmSU7Gdqi0X+gm+flXOV\\/yBsZWZY0K1nM4mggNI4VLXkoDC3l7+UloMry8uphAXnAxorjDt3HHfU+emTKEHLc9cM+998UsiqlLoJcx76TREOw5I0sE01Aq4WWs8DLnS85hEw51kxy76UI6pf69A3\\/2JDSPHJdBy9gKOWeRn\\/Arii6QZ4A6Jlb8G3WMjY\\/PEJ4cH4s5LabeY+vVnrjkmTPknKHyIXC+5CmMLRIULTkpSCq\\/Y4wPgn7KdQIhyE5sUsTW5Kn5CR9ejiRQH0lEllcC0X+BVorNtutsAl3yKjfB1RMh50ucL3kCm3BEAg3ijEw6ldovqN8L+BIeHik4nQaVsQ2Kue75SQKdCvOrs0xNpfcL0MYUZ0FUDSq\\/6O3VBQQxV8GdvMb5kjewCcKBVtHYl6QUblEL+HWucaTwleiILAacpygfo9MjMuHfMofz1u24uTIiSOW73gpWQKVxwi6vcL7kHDajdoBVMlIaZkWD3TzhkcqvoiNKuBdr\\/IVOBxBHECKO8YfMr07iI0jjU6vkBHdBqBQF2pO4Bu54gvMlT2FTNtT\\/pHSBBk4Huw4ahzeSfeq4F2vcQKdOIjLr3+qo\\/bl0ets1FEdt\\/nJcrxLyDWKTKtgBkDvq4k9xvuQJbMm+LtDA6UDXQXlEKLmog7q3xi00CObjK8OeqYydiVFaJlBHspJGjlKbomUuTTVdlYe5EqqRlvZ1XwS6pEEeQE4brjlsHzk7+PwEiATkCC1dGYsrCw676WXzekeJfNvfldBzBTvS0H8R5JIGjwjvi46oYgcUxRNcQgNkfjkIFQ4d4Xl0zCMTHBdz1jqRtSpWvibLlWJR7tJ3VWj4uxL6geRQGpUgZydxRHjc24Zrsd4sNfMyfV7jYzQo\\/HF3vYdEI3plhCxXhDawgZz6lJAxlRr5LV9XQt+UpF3rmkYGAxsBntLgESE+7SbQKNZLuVypXqGmwFUBAthOPkUDAwocXABQlAEsh2ycWGsakxPYskOhpI893+V8yFsS1CvopDFwFOCDJ2FE4KedBxrysQpKMm0QNCdTyhrZr9DgSQx9vMHHERDhbZ2Nz58INGAag3aq+XiEdOvy5Uc53\\/GoJEkF7IjDAGcn81qgwTnvt1aylNpZWc1\\/i0r+W6vm2vMceYZKocHJU0ITlJXNCw6kUWnHi5UKtoA44\\/I5zneckxSwE9IBXsATRYTogqPWidB2Rq5arTcbBmvkdMFsudFOUJgMNVi9vN77lsnFTjc+bF8aQr7tfWIPINXNGWxLI8RPRjt3Oq2QdSzvSQq72AG1AAcace0d5WhrJGnJCzkx2y50CkpIkRXgTSbgkxRZDTUIF9m7p6lnZnXKeCRsXMPjfIY8ZxzpS6dPOkOFwZUaocnwRJy6gCHxjaSSxg44CG6gwSNCmHtOpFEqCooVSiJQIxLIdrrBMnStsxtqMHYtZB+6rCHOwHlH7XTouwoY2C9gA5cJTPVcQ9HZ+MUEMudrSSUzCjQclEEfCXGPWy2nz2cN5QsBmyLUG2Wsp8ZgA2Voy6LGLutJph0fK8oaa1e70q4x0CCwsodH8YXNdS0ZiYDts3EY2MEuLtIqg3JnzdcqQN0zawgpytUy7kbVOGpeZm5WQ4P162R77bLGeTu7hbPVfDmfb+bgADN17hMwBvSXNVgY1ODD8UVkl38kjX1sF3lj48h6RsOXO5btZidR6oOnbKxKQPMNVJCnPZdKFgt5brCVoGj4PtzgI3ZuuYytdb3sqJJXvFGhz\\/XWsI6ClDIEGoRBD2rws\\/EEcgLJTpw0XVMbGxupjYNgnm\\/VspNFiFZNA9V6l\\/3UJdqTCR5ZUNNgPkHRmJ\\/wcbjBx02VAZylrfYrNvPUXdElrGdXyqQM0iBwg4MPgzBs87nUwoEzBPX2kyAmJ5CdcNPUo6zpjJT5HasITblrSV2UaRkw1tFkYa+GxvCGG50H00z\\/Egv6Dro9BGMIUgBrgDQGNt0Vii4vIhd8K7XZdeIMspsnaJ0TyE5offssOaRTKEjw3jDSoEmjbgxUSgNf4WVg+KoboAzoslqEGvDypXZT2CmpjNKoTDEhDX7W9c5Z0nC133RNyfI+bpE+oh6JH86CBmQnNGmU1GVF++S9UTBbHdw5nA9bNGoGvXQhewsxi8\\/CDVCGoWVCr2pAh\\/X3jNpzBAHYJJWGBwpI49Q3akCI4YYvpTYZ7JjaQbCcwa0ilThVGnWMU5pUCzQJC7mOiR8pBdYoF7EesTs3GLYGmvfP7IZTZUADRVadoXxgMtpyfofsZuCjNhBphKJQxXAD1EEhP+lZGxeG1hkcIkSp0sjr4lCahOV6HhukQZkN8qM10LxP7qFWlAGAMsyZPi52a+FCaj9DeThsbW2ZpCj7A5NGKNz7RRh6aaSxG2qHhl7rcJ5t1Z07eYSzIQ2cBh2YQW91F0Ua2T8R0\\/ggSwnPu7puf2Gt9SLvHr+6+xnjKwhpxxZtNU0afvA0pRGCMkYv6KVRwO5IHx2CMp4e3jCD45aRyqqZNAB70shQjiNsHc92+amH4pMspUMZkUnOPs+1OmSpgtm5VWDLYnOmhTSYizE0vpSAFHZLeqN8dHTh6ReGdDqjzetIJUyXRhMDhe4uMFCQaO+4\\/9m7n9BG6igO4NPWRrTQCJWlFnTVglJpLVZKEdGDdVv\\/LnvxJIi8PjuXDbuwoOh48GIlMZCMULOHSJeApClVWppidxEromV1QVbQikulgjd13YNV8WZm0vZNfpnJ\\/CaZSX6\\/ST8Xd0tBdLPfvvd+\\/2ibhjT7NUCKLqUyMjxWRQ\\/Rtt1amUHs2hPL0lqTQqMzQonRuE9iJIENeU4JuQ4wdTiHRg6JwydpzumSd\\/YTt6ka5BxsmMQ8P19fZJD7KTRcM8PkONIwzTUjNCKDx8BXu4e7u\\/QlrJvEz1\\/zGwLDZK37FTbQa8Wqx761\\/z5zxVXiFkXIc7B1Rwa5fwWJe2awf94ZnRmCBB0aERr5+mh3fWl1aX19AaCA3kn\\/\\/LXXqzSiNEjnfhGpxqcobp2\\/nyEJtUT2YgMGukR6NqWRyCCnsIYzhlqpUUwgCe6+Pxp9QsCS2JCTSrg9BYahWqGR6+P4JFWVqzRMJ9+r7i7JEBuiDDes+zIoMuow3oeO5mxDw83cuBKISDcEL4XehOP5a16dYOqgPcW8pYbDp4hSw+Yjt6LyuCTsrnILEWKj8cggU+jojB10pQSgl\\/6Lg1VAL0Ly\\/LW3XRrHXa5\\/23D\\/8TPntAR3xuIPlc\\/HMuRGHX9JA4yM4w2OWsbHkNQbGteRjCkmudqSQ\\/NYB9mfv+bVA4ZhWntzuYWHd6BOtyycsVhUueU+vCZ8cHjeuSFolWEa7UPChAZff5L+O1m9hCDuaklNKWyIhO83eD4W30\\/bfOzt9HkMjUSsWP2Nr6oebV66dk7EK3r2tS42eqNAfKp5TjqkxhxXaGjzf7\\/yLlo8J2uRUZbERgh8FbsPyukdodBwrDX4Q8M8LVm0+cYtlXhJjssCbzFv9l097CzQxzbp5BhiPZWGdn3+xruvlCTRYlrWIsNkLTWOtndV6gUTx+s5i1to6LvAMdMoFhMZ+p3LSINzyHFZ3IrDdSYqRWSUjJ7wGBraO++aaVF2A62ekLbIKCvg0VCj1taubsXk8o744h8rP27mVlyXXJ3L25zqQPZFlebFRmfPABDfh7Gj0y8Y5cZYH+cgVLtBmfGuhlb+jW5aI4uNGFfCqwcMg8qBx1QXtGljjnvdnnZpNOi0uLER8FIK\\/RVqzr902nWogfuyr9lnxpPS7MlwUkBeeazyhBJew2Dod38Hg6zYfpbQEX3nVbU2uXd+OcxEA+tLRgaDLG+edCk18JBWnmfc0LDCtMRFRlkWucS\\/Lcbba3vXU2CI8LzTR6WGTWogcqTGotq4nMCnU4KLDba1p1u5gjI+5uHsSeF6UkPGSQmHn4wCussU7W\\/feEEJrU4wdVoOSbtb4bqXhTU356E7kfUAfWD3EPda\\/wpRZAToiZqlBroZk7gvObCAbvLFWKzYbmfWImCYtN7H4qHUYG+Auz5\\/PZ3WNA0NmnZdY19b88emuOsowazAdg51g1X3kNIE0zVSA11NSNyXHEq6FBm6cfVG223vosUTWnPlLzVY6Vcq3Ki6HrQdUoOWUgI5btHE3etTjsNQdDcqc19yqOCcGAk9Zsi33\\/auQTAMKuQxL6UGK\\/sKYafpuKL65kMQW7QjmEkG9SVNcYKdS\\/E3oyek7ksOLWhoI54v6jGTnmnDM2vDYOjie0ac\\/Ij2tHecMwMXVUP45xqmaCSInZCT\\/U2LDEoNphflMyp3X7LPJjUKfWZglOnxdtzeRYsntHzCYwNZ7F6fv9n\\/21tqneR6km2fD4OHzp7jYNGSU7UnsD5TdfVhAvUl5GBdSCukk\\/OpypcO2nN7F5g6mZup3e2gk+SN0maf1\\/5OI\\/pYaEjy0jxjoMu3toT6kiabwnqMSd+XVEql4ABdWq7n2\\/PMWgcYRhRCG8k9NyhEc3q4UfQGJZUCH1FseL+XH6xaeXXHNNZhVJbzJXXYjZUV4216Zi0CACO0eEJ3C7vbQE8u5FSf\\/QB+SxUQ530Oj4H+jgZf8qAiozVGx9CraelHGTWkYqZE215J3gWGYeY2ezd0VJ7fVdVvl8BnSTTs\\/yIJ\\/qDrROt8LWwkwCLD+9HXIAYakShIZdVcNWnfK8l7wNDDPLfFZ6cP+W2pvsstg59SaTSlUoXyP8E\\/nLHR29MNjO5+Ee49nxhDD6ZCM8qwt2RfZrTNmbVHwNCveBhqkKtIAmlO\\/H4iJVUozIODlIZlWW3\\/n+AfjhXYzsjgcWCM9EQUQUz1Ia\\/E097O+UtnV89gO19JXk75CPOIuO+pcWFRDcAmeJRFxDTYmqd1eAwiNGo\\/sRSxecJ4ZFCYxPDSo2T02EQoRxkkhVVWf9nb27ti2Nv75Z8\\/w7296zgYetkn+nxOjb4dlbRwFJpGp2FFEqukwF9OSym9\\/cPHgDUi4BP1o33oLlHq9yfC2pccKCBZ3bvy3\\/lZxvmf\\/tv75c+wDjXAxLTNj6rcrsY9ZUaL+xP7YYV9ZqTBf+wZ2E67CsOsMUQYZFQZQ1LrOMYpriUiaSODPi5\\/7lFe2PjpysNKCHWCYURhPMYfGkX31Ij\\/qAbkNHiSQlPS9kPAykIAaCmls7c\\/OglVhOtKrJ50TQyTfiqsfcmBbDkxfpp19eADtyth0wuGSXbH14f8Y4V87FusLZ\\/YUgOS8\\/xnbQJGEm0VUhCI6BDlBaNbnMmnjRfQIk6\\/iufzpcAgpyQ6xVqXFCWGuwfvvFcJlQgYutnzKJf5QwOLtJvW4V6jOBMaLRpqUDhk2S87yUITjUSFelXa7RxKXo\\/phli1l0I6yjiw\\/CslBpfbQlVudIEhyp6WX86pnHYwrjtvwo8b9xol8Hs1KFfAiwLa9SdJdJSEJhnp7he5xLA\\/hkLVBePF0PYlhm++Oz\\/r2c0hig3a21X5tdMqp0XEjNnHJjJxJjD2S1YdcUNltGgSivsKYJFEZ\\/PQBCPdPWLOPV1PocTzun1oyHWK1Yvl776Yrc99NykhMQiG\\/qoxx2UPoYH5WJleTCTyhkSiqFsvHPhaZbTm0FoW92nMF51oELTj0f5eRRoTTtNPVlj7km8+Pz9bvzuUcKi+gqdjAEr4+5Py2rwjPe75mr\\/Ajp\\/M22zBSGktLTS6uxSJTDismhRjjPEw9iXLv34x25ibw1Fs0IZQ+orpksoJDfmYkzwGGhofggdpNjRcMkOD4Jk7N2RxEp3EM\\/nEgXwmPhq69RJYpklG\\/e65VQmBqnu7eqDsnMqpDw3GNJRFRwH71KCcBg8KVELQl1pVaJBjUVliYxSJl4NaQ93AWPhkd31pdXv7omF7dWl9AYRGkdGgMMxDj4Ohg5oTOMDbn1xAU9ymRaFbSlTSwtCojoMk1pCGJpGmSxlHThM2fYmRFOtLpaS4+OnaRzNVPrq4tAuCWv5qtuQoNRx2kdORw2vcoUEHlSrpCUSRQiPLLKW6ZIa2AE0jS5fiPTQiw7ulpNg2kmLG1dr2OoiHIsMX8ncoYGKaE9OyymfDOhFjIqO+20GDGoTOs6GRQgGaEyLgETXWGPJ57unHHz\\/1\\/PPPP\\/PGjEdrSyAWigyf3CP7NPTghlD6LTntKTRokl7Udb2YyDRwpXBAS67JitCgIWgm3trmhAyIviWUNzS+nKnf2iqIg2YZ\\/rn5FkVq5ZQYoOaE8I5Cv0cOO2pArgG\\/gjURKDMwrxfzyNKyWWiBY1Ght208WVdoSFttUGT46m5FapVHT7rAgncUuoUcNtWAXAF+WmVo0AJsPGG7D16DlpgUuNw4EWhokE8\\/AQH8+vrsoaOxRnVo0LYucs2\\/0PhDDcg54IckzQxBMzqt9JAstMYxYacbzyGf\\/EyjWl9sfGPZynXUoDiFRhSseHeFrrTgJnKyDNwWkKQpM6jYyIgw1jAJu5gyhXwyMw3bXoBWWv5u1k27bii3HnLtANY14UNjE\\/hlkWhJu2vq8uKERsmwgHs3JgIPDbLWyhbl1\\/OzQbpH5lLDGhpRYP3Q4ENrxHJ1lwgrrrbyeiwvUmgADAjXpvCHhtSpsVzVmRyVGqQfDFEqNCpd8utq4RWVtGoOmkQXcT2WESo0Sgb6xWlTxh9\\/9mXu0JA5NezKjKNSw+46jShUO+dXaGwtLqpBWAZ+abTK26dGHC2SIIJuEcYbpcB4xtjrjXy+nZE3NajMCNJdirQoNDrAzmme+\\/54XbiwsfH91srKytV\\/\\/\\/03l2vFcTWSKNqmRlGE1RNGS3ODAsPUlCVXsrYAzUVlRsBuU6RFoREFO+d8DA0S\\/6Dk7bffPnv299\\/++reB9LgMHhSwgm6fGgkkIJAW5AYFBskjl09nfHIRmqzWosnRXg1raDgVGjylxg4Srz+H3nrj\\/fc\\/ePvsb3\\/lVBLUW64a03bH8lgtb2lQCiCWZucGBQb5ErmszfhlG5rHtTU52hZKodFvTETtcCygLK6gR\\/RziKLjg7OUG0G9Gq9hpWIMbSSo1JgH4XQ3ay46+vjzz9j2C02ag5J1aJ7l12eb5h5FVo+AoYtOnVR5s3ZibGAdbG5TMHNDJQG8X1BdVCTQBlUaYt4LMxnkW0oUGE7iyOHiTIl8Yw2XzDjqTypDYwicLOf4E6Oh0foHn7139udccIUGIEuPoSB38Hg0EKVGpTmBQS7y\\/lSQsEH5n72zCaEhiuL4IIRioWTjI0oRKbKwsbHxkVI21ve8ZkURi2tQU8ZCEd7iUbx5UZKXIV48X0k9yseLhVAkoRTKAmXrzRucZ8zHvTP3vblz3d\\/CAkWpv3N+55w7DL2JXtXA0JhGYnnJkRh5LFmt49ouV2w8I1xE7IAe6\\/0ox4eSuBmPBYfAwLAgDe8Am7MqYYOS7kD1\\/GQgNMaQeM5f+FdApicGf8Nr3a4C9GLjm9hCA\\/n3LzLQn0hz48rBjPEzp44qMJBblTSOedCnZBOU92Y6er8LQ2McSeBRKDG+fe4eq6TC3\\/C+c\\/pW1NnGVmxceEb4qPzD1qMyPdyViRmLBXyZbe16C9h5zFBJlrDUOJ++n6GlxmBojCdJbPkrMfbXLBaHzv\\/\\/UN2xwIc6rwXuaCCVCKlR5kLjDzNyfaFtxUYLuPCOpTcnJSw1WIWGXgoNQmMmSeTZ6cHEQB0mxGggtdsu9LGdT6eFvfOH4MgVh65lLzSQ1dlKjrUbgJvWgdSnNMpXarw3R84so5wEobGYJPMSEwNrVJFGA6VGAE1tUS6cJ7zsjjChBxQoNJB+cozljQyxqXHWLyRLWGrsMkfOAqOcBKGxhKSwFxMDa9RMHPAglv0O\\/Iae+iFWaJDo0FCm0EB63cr8mROmssjPUGSI6FDuejAMGmSosBcaer3L3whNp3FlKyYGe2rwS7L6bfxT7ESxcfop4edIxAsaoZ+QdoM8A6t72bFwQsI+B7oMfrzodfIDMf+88j\\/+t8ssgJJ+yyA9NNqXunWL04dlXBWsVSmEUkNcZkSGRnjkKvkyaCbmjB8\\/bcrMcRMmTB0zmCBr10Eubh2L2NobKDPK1Z+8N4tguVFK0kLDLzIyWnT+9WKrUwWW1LiQKTPCL3eFP3gi30MaQ2HGnD7LABETGwcet+AvytSf8IxO\\/vsvNCaHxpWt9RprjSrgJMEONjUwNb4J8BnIycpflHqvKycNMcchrVuPf8Xusbu3PIjALkd\\/ct5kRy+ST0mODCutahSRGUjdsf9OjSgbeuM8ycbhSpj\\/oDmJ5I3AmsDzWp4HMdhuOfqTeyYzeuZqxK+Ctt\\/WrawaPaskqzkUBrFOnf5HZ7wkmTlXCfH\\/NSd9rngwIlwqLJvIMNllFsIio5TEhUbjUrcGCHexkU2SWb\\/Xu2L3Nc48I5k5vFs3Jz5NGBXUBWG8IcOCU4PqRY2Y0LjS7dSyTt9yzOIslBqRqbFlB8nBEd2c+FyCUWFXrXIMXbNp0Kvbr5r5mGiUkgmRZcZbx3UwNPLHxoHrHjBRdyCE+0lQZJCTujkZcWa4tBxD14wa9OPOnU+2m8n8N6HR7rpgO\\/v5dn2OJTQmKNbTqKPUCA1eL7w8T\\/KBzUlJn94pWW9iu66vtUsgNTJq0Cc7d+7cbubCKCVTI\\/4r6lAAcPbbwEXr7tnIU4TrPKa+1sEuGAevp7e8fEryclALjR5vYFTYbtUGKMXRWjYNenVnj7QGRcnQGEPCvA3Gnm7HAl68W3cfD1Qcx+5GDe+Z17swNUQ4sMOMmaG20GjHJ7j4zLBAKJcIIoMG3d7LjCdmGv9DaLQvu9CHVmuQDa\\/Vx4MsdJ2IJOm2SW6OaAlKSGNkmWFVg8wog9S4Y3KC3ckrMw0VQ8MI6wwKAZZThyFiJz3EE4Z2GyQXf62Ql\\/dZ0Nw8BxFQylBmVG0QjNcgSPEa1NzZ46aZjoIXazP+6nj7mRGAJlQ8NqWxN2tRo333IhFnQUv\\/wl\\/hEjTNcFK3+ud3yC81eJ4T5u9OlAyNOYOZ0aHwh2rHBmTYmYGtSBUiqL7NaUF1ZhDS9kBYaliJkTF4rSz9pwx4NSgOXHd+NFNRMjTWDGaGBYiL612CsShNf4gnLENzabDDOjN6XAdh0GpMbNi9yBj8NfmlBp8G5R+4qug08Enhtl9nIHRIUsOmmBnpUgNTo0myc05nhuANDcututSOSIzIyJD5PJ5rSYN\\/4KpkaKz824EiuN4lusygbA\\/xhIexb7JbUL3UJX7aavklhUsty\\/axaC8wfOjfkSG91ODUoPxKQ8XQmE8CGqHMwPUu0WWGxbepgSOUduZDNT04wcmJyPx3q0hcYkguNTi7E\\/6Bq4qhMYUEvHUBES81sMywU2Kl60A09HIj44qG3gQlpA3DoF9h+FC\\/5IAhc4sESKBBrzIPXFV8WXgc6XPJgTCU8WbNtjkigwL7Qzxh3LfagkpUaLAitdR4aPLB350oeLBmLCQ+bceOcI911iywmf5PwtaE8SGeMNlGKLt1oeEXGioQyHAJNCjHwFXB9zR+XayFhAbnepefBnZ6kcHW8Vp4syZk8HpQ37aqUmgEUkMGDcoxcFXxu\\/Fj+s2JCxFUOxa738TgiK4x0GakYKHUiEgNboF+WN+cKFNoQIsQIoUGvbmzh8mCkqFhRDUnvDdrmAyWbf+lOyyLskYGSo2kMqTN25zoQkOZQiOQGhJoUPMVe3ei4MPC\\/T3yrRRCZLlZs2k8FiAcD\\/Hkv107qA\\/VfFqgBk1CZNCg2J3kY65RUtaQpgNIrvUu24oKDEwM5od44qEXuZoT\\/fKOTxMU4bkcGpRnHVTB754Yxkq0oGGcLDdr2JFkmt3jepeIwevuip639q9OFKElhwblGbgq+IU1w5jfrALCt94lHrxZSxih6Cf+\\/ksN6uMrrcI1KA5cczLZKCnjuhYgXOtd4gnfrOW7XTtc0W8J+1wBZWgSCTQoKo2czDNKyioHED6pIZ7wQzz5btd26w+dKDU76UsNCTQoDlxzMskoKZsoIMO9WeOXGrlu1w7qQkOt2UkPTwINytedKHivZix1AMm+3jUiqYG3a0zNiZ63KqY0RH6d8fxxkx\\/+7kTBLXJjfeJ8s1qQ1KCQjLuVpTnRGlStgatPs3gNyjdwVXEhdLMNSNR6VwHUOqcgheolhuZEz1tVUxoA14v9gCv\\/wFXBhdC1vj6QzYRC\\/bYDCN\\/gFZsTrUGVUxoAXuEa1HzCpTQU3O1aTyEafJK8AOz92zDMst2u7a5oDRrwBpTiSkEaFNmJSiMfy41y8qs7kWy9C2rONjdtxPLlcGJzojWoikoDoFnokgZ\\/d6Leblf87ASfJC+E+rbk1LCdx5Xdh5OaE61BVdshD7heqAblH7iqt6axygWQUWqA1dl2yoJ43IuVSuVcQnOiNehvPFAKr1GkBuUfuKr3QuivzS7Z1rv6LjQpNdwO+gi25mT6h2i+HyqGZyQerTSSuFLkrRr\\/wFW9ies6G0BKqeG70FOn7Lhf7Byr9DnI3py82CIV+0g8WmkkcalIDcqvNJSbuK74ozQku1nrUbsdnxrOUewuWJuTa1vk4jyJRSuNJK4Xp0HxgycimG2Ukl9bGvKtd\\/n4pYYTJzT+cJh1cjL9zBapuE9i0UojkUaBGpR\\/4Krc8AQ9aCyFmFAsNaJSjXYODEw\\/DrNOTr5ukYozJBZ9Fh+Dd\\/1580qjUA26nVtpqHYY\\/3u1S76bNZ96LzROuRETnb7QwNRgnJxM3yIXT8kouARq4LWaV9qFP9kVDFyf8ISGesOT9EBwi7hZw1IjQms4F2NXOrE50SpUGaXhtVoXt27dekKGo3j+HXL1hiebASSWGkGpEU4Nt1sJcZBxrevBFrkYxdS1ASXGj4teXgScIBI82WVe5VYaqj1FHgxPJF3v+lNqOKGtr2OVMAcZ17pQhe4pkJ\\/sndvrDGEYx+eC5Jp\\/wK0bpeTOhRxySErK9bsvbpwm9VvtuPBzDFu7ZNeFYaU2reS8zkmRrGOSFBfOp3Iu4s6OWb5jzDuzz+47+87pc0eUlK\\/3+Xyf9516gArNlIaVF524AHsi8DZop3ClfPg5heWJqvUuFChtdrrWx\\/\\/HFAwnQhW6frE6vvxVoYLWNfXX4tedRGA4QkP9pfjOdEIJjTSWJ8rWu3DUwICCttVNSTCciFTozcXquLHsD6tZ6FzMxRFkhjM0IqBBf08njymhkbibJ7\\/Lk+iud9lroRaOtpUDV4WC4SRYhdYXK2StrwrNlEbYoXFvSS+gcNUp5Uni3vpDeeLDOhUmFCoUAwraVg8aguFEpEJvLFbHZ7\\/WNVMaotCIgAa1C1c5oTFeiyft8iTiUsO67GpRwPq4gDKGk25U6NrF6ljvq0IzpSEIjQhoUHuHnFSeJM2D2o9pRHm9y25dLSA0RBT\\/DCdRU6HbaSo0Uxohh8blJb2AD57oqV4id5Yn0XuSHCrUYifWx0VU7OEkYio0v2JFXqxCb7L\\/yT5e4B0a6jXoksfWdEILjaR50N\\/lSbTXu2wVarEOQqMfoEIHc9TYsmI4T1ehab8W7xkaEZlO3umk8iRxHtQqT6K93oX5ZGNu51HeP1ChLxaHCI4Z2\\/Ej8EKsQjOlIQoN9RrULlxpoZE0D4ryJNCE7q1WFYmNwqU\\/qXGLd0GkVCiOGW78VGj28QJBaKj8cgHWQXVaeZIwD4ryJNCEVjdt2qRmRsF8suogl8FXQusq+5gBbopVaPbSnyA0lN9VswpXcmik04NaF133qgoNzCerTuznMsBbPF8WE5ByzADrRSo0UxrC0FCuQe3ClRgaCfv28xSERtBO6KY2Cp\\/9szLj+dAQl8KxkFUojhnKt0Jjey3eMzSUa1B7HZRYniTsXvz8fd1OCKpCA\\/tdq1YNDQ3JOWpAhX5eHBrDomMGWleo0FK5xBxkL\\/0JQkOhBkXhSg2NZN2LhwcNxAoNFWuhmE9WDVls5TJ4SFCh8o4ZYhVaMv5encmUhk9oKNWgKFyJ5UnCvsg4u+sY2Kk4NFZZw4mEowZBhUo\\/ZohVaBMX7jKl4RMaKjUoCldJoTFCiycbc92yzwqNnCoKl6zMkHDUIKhQ+ccMsQptcaRGpjRCDY3DF\\/6yhAQKV2JoJGy1C+VJIAU15QmkxpCFtKPGtTBV6HYcM\\/x5tKzDD7x0mimNkE8a948sdXCWOzju4vtTNz8f332nE8uTZH0nSZsSl9DIbRqykHbUMO6j7wwhM7ZT3+L5wZEa2bX4sPc0riM2DnAab3ULKaExVosn8\\/eRQqOaU8ZehIaMo0aFbfjbdy6WTH7Flq5\\/7Z8\\/xWvuSI3s4wWh33JdfX6pzXtO42UPoZGsT56gPAmmGpnQkLCrYTB2MywVmh9e8e+xw0Fe9BbPNd6hmCmNMEMDPLi+zAqNa5zEU91GQmaM0mIKypNArIXQQk4Z1RMyjxomY4fDuoAy7IqGFQ6GRW\\/x1Hk4qZGLL+GFBnKjfmA\\/dTqhh0bCbquhPAlmr6LGFaEBeO9gCLiOt3jkCo28O0QcCN\\/iaSE1MqURdmiAUm\\/TyYUUKw2UJ8EoaFyFoTGG94VRY22IKpQuQVG\\/gi0iFfrQ6Vuk0Tx3Lq6XXAcTGhVO4rhucyHFSoNQnqyLUmi0+rWgFlCh9XAl6AonwgsoLefwJBOT775z5+rVcxcvnjwZpwJ2IKHR4CRe\\/QmNFCsNUnkSofFkqE8LaiNfhUKC0lXoQ8HnrCX\\/Z7r1YFwCZCChwXtTGqdTrDQWFAihER0R2qcKrTEb+SoUEpSkQm1aIaVGmQvZHeUEGURomJyG3uF0epUGpTyp4pKrEqrPhqTMJxCN8lUoJKiXCjXLHz58qOz6tiXvrULrDlPTGPgJPHqpMYjQKFOnk27Lk+RePJm0MUcKjWcq9zSah4YkqFAMJ\\/JVKCSolwp9w0GjXDG\\/5d1boV9d\\/Y4kjCw0hBjk6cQmxUpj1k5a43pI5WfWnrBDUuaTGgNQoetDkqCYTz5wN8YH8xtUKHbJJVcovCuiV7KIQkN94arr6b14ok0hhsYZhfXJJsb+SY0+hhOwWuqz5KhGvFSod7lnlM0tL5ZhQAGlwY7t0fuikjg0VBWu3\\/UOF1KsNObsI61p3GInlNUn604wpEYft9bKDBBVKF2CAownHhivj9UxoMiWoZUsNGQXrvqF9CoNanlylD1TVp8UlrN\\/U2NbH2td4Lq81nWLODPMD0bbYlS4D63fuVEvy9caRd4VV3NRYwCh0et0cjq1b2lo2qJ1pNB4xg4pM6GF4wypQe1PxGtTD5b94Ut41+ErvCta1+rL7nPpWqORhYYIk7oOSg+NpD0PSi5PjrOmMhNaPcRsmpAavQsNugqlS1DAu+bHD+6kNMCC4GAuaoQfGkXqdEIPjYR98YRWnlSt8oTVlJnQvU3Wodmil67iA\\/99Kc+S54edEnTLsIP2jw3eI40BHsF356JG+KHRoBau9PIkYV88scqTNWvWFP6wzsanPGkydkuVCd3E\\/nKmRS9dxWqxfxWa39LWnNt91sZN3iuVAR7Bc1FDEBrqCledHhpJ++JJOzSOtrnV4UqHjS522mxqc4YpM6GFowzUWpAaPUhQaSoUiZH3XxsvchFbT3FfSlJCI57bXYLQUFa4PtV7KE8S9hFXTZvMfdi62+aOzY52vFivxykyoYVn7L\\/U4D5sbuMnQcFhqNDeEgNb4ZhP3NdaTS7gVEBolGXM7THd7go9NMqcxFuERmqvxWvaDM6JElFZfVJtMie17z5SY\\/PKv2wWHPUJKpSQGKIXNMQFyp3lu\\/+Rkdu4G1PCv4yYLmqEHhpE1\\/QSoZHaHXJNm8vJbeUTRfXJ3jMMdKrXbf6RgdxA5oFeL6BAdroSw\\/exrqLgNLf8FHdyapt8F9rIQkN24aqfTu0OuaYtpIcGU1OfFE4wN83W\\/uDIQGwUmZA6+Vny7e1QGIb6BAIVanJvti0\\/yJ3s8MhBc1D7S5F7gtgzNKJQuHYdGon7HmObaZwC+81RJfUJlAao7Q\\/IDIDMkKJChwWJIVShhuigsZz\\/Aw4eoCGhIYjndpcgNFQVri8lliejtdgykRMwmIWC+gRbGi5K5YDMAMgMgQolta7oV4GfCs0booPGNldo7OCyjxpmFhpyCtePOkhv4apppPWoBmPqTOjeWtABk54ZYAPe4unlpZ1gFfqJe7LDnk4ATh4yjhr4K4rndpcgNBQpjVc6SG\\/hqmmcHhpqFskLy5k3NYM7WCkAElWKCh0e\\/v9nwBYvFbrd8J1OkCIoU0BpMLXi1lzE8AyNCBSu+oXU3nDVtAm8W2AS1SySVw8xEcXAzPhYYyBAhdYJ04nYe7p\\/yvoNpsHdHITC8JhXQFHK4B6\\/ldATXqERgcJVv5DewlWbxylUmIWCRXIUrp7Uyv7DSaPEgAQViulENIx4b4VuN43AiNgtfz4xuEUcV0L3CUJDjdJ4qoPT6S1ctamcgslUmFDskIupGNyCpjPob\\/FgFgnYyxCdPtyxcQrDiJflAGbf\\/zTiuBJ6KdzQqHASb52hkdYbrv5b5KLJWs0iefU486diCELDqLGuWLvsD7ep04nHMCL+rlrF+CchPCYWr\\/7EKPZr+2K43bVmlWdoRKBw7Tc0xmkxZianwNjg6xO8KRxExfCYTgxMNfJU6PbgL5sITh8IDXHBegojixOj0tf\\/p3HsXDeGHBqcxHHdQVq\\/kkS5eoI1DQWL5JhOAjAb9MgA53EBhTCdiPYyREeNiniVC6mxlUuMjSLlH0YuQhRWeYdGBApXPa1PCltM5wRg4wZbn+Clv2Aq5Y9\\/K5OyMzIoKvQzYTqhqFCLD9yJ56Fi6zZECSE2ZBzCD+UixEZBaKgvXPUL6S1cCVvkuKOtYJEcF0+6wjxTLFbMEiNAUaGYTugq1H3S2HGQ0zAqYZYnRjMXHQqrBKGhqHDVHVxI7zooLTSMiYwpqE+wDyofeuuK6SRIhQqOGt\\/+DY3dnErDDG9yb5zJRYeNIYdGqY\\/p5EJ610GJV08mj1RgQrHbFTpQoV8I0wlVhRa5A2QGgXIprMm9XMtFhjWrRKGhvnDVT6d4OvlF3tmEzBSFcfz63CgpJdlQyk5KSTYWyDc7Gxt1HDvMvVmQa+GrEaZmyGTzhs2kkcn3iNGsLIRsxMKGRGx8Flmaa2b8r+s94z4zz7nnXOe30luDfPzf8\\/ye5zzHkxQ2T5wrDAySQ2pwQ9\\/Fg+pkaBWKq2t0EBt6\\/m+UxKVbz7fbQZsQGlqVBhquoOnogycRSySFJd70WQYGyfG6mm4eQYXSqxO1CgXdaGFIDcQGU\\/MEI2SWuNBzvjI0jCiN70GcppsPntCvnszsfGC26JLh24wYIyfDr0JRnQypQiM+SQ4qZf7mSfRT2uFC97fVoWG+4Rq4Ow5KnCJf5XWYn96E5k9qxFUosTpRJURSdHCkBmKDOzREBztc6FFfb2jgBEaoToCzl9WoU+RbvIi1BgbJsbhLM1ChDwZUJ4rL8IqESK4lj\\/gWShbqY7zNE9HBChe632cIDZ4wxTgoaDl7WY0aGqu9iAlzzbRPDj4WVPhVKKqTZC1CUKER70LJQ70qBnNegnSDODbcdG0PCg3jDdeg5XB1QpsiX+NFdGXo7XTtk7xJjZgKfaSuTpTaM\\/k1dbgcevdBMhFWWUp3bO2w4KbraX9QaBhvuAYth6sT2gMGK7wuk0SHx9vTkDupARVaU1YnCu1JUaFRuFRDyURYZWueRJhfSb7f1x8aFUki+IOmw9UJ7QGDzV6PaekHyfMmNdQqFNWJQnuSVGj0tXcVyUVYKnP85+j+JMYHNQ62MwgNWmS\\/SoSGo28X0K+e4GPLjOzhyURqQIUeGFSdKNJAoUJV4XImlFyElfJovg+3mI3fdD3qaw4NVG2k6gQ4u0qDOkX+ER+buNbISo1bgg\\/6WnJUJ4T6RK1Cox\\/z1CjowDI0TyyY7jrn\\/yM0jDdcA5erE9IDBvVJ+NyEuekGyfMnNcQeqFB1dTKqCsXX3n3gjw16kwAe1Px01\\/42T2jwN1yBs6s0IiSByhwPTFhIHSTnf8QAZKNCUZ2MpEJPIlz4Y6M+NswxHB7U\\/HQXhIbW0JCA3HANWo6+rEa\\/elISkzwwPd0gef6kxmAVuhcHjZFVKKhyxkaVfgyHBzU\\/3XXUzyI0xkaqTlquLvojP2BQFXO8GJtSmdAcSo1nKhUKCCo0Zbh8IoxtkDqwFZoHNT7dddonhYb+hiueYwRNl6uTFZJ2eJ3kgQ0WbiRnVaHqriubCgWH8LgBb2zUiR40wuBK8nN+NqERDlGdgKbD1Qltirws\\/jhqLE8bGnmTGoS15CwqFF87xjnv1as1QpoHNTzdtd\\/PJjTKwzRcQdPh6oT2gIEQfxw1Fhl40PXxeZEFUKGHhzpq7I5DC5eTn1i0KAY3JEjjQc1Od+1vU0ND\\/ww5lAZwuTrB1ZO0Fe+cifhwuvZJDqVGirXkbCoU4Kc89okpNyplkvATEeamu5AZ+kOjLim8ChK4XJ3gAYPUFe80fHh9qvZJHqXGZRMqdG88iUqSh0qJ9hdscroLzVb9oSHBENVJy+XqhDRFXhERCyfChKZtn+ROaihV6N6TMfamtBWEcAGwohkApWF0uqvtM4YGf8MVtFyuTkihsUX8YhrdhObsIYPkWnK19uRXoeBkhqkBpWFyuuuozxIa\\/A3Xa0GClsvVCenqyYopIgJHjXUpTWgOpYZChQ55rCCFCxiTWYHRLgPTXcgMQmiYaLiCpsvViScJbJ4qfjHf67GEZEJz9JBBQoUqjxoniSo0XZ8FMPlQmtIwtIbn4FGfEBpGGq6g6XJ1QgoNz+s9lTSB2YTyv87Ir0LV2pNfhYKTP2QWQGmYmu6CA6WHhv6Ga5DE6eqE8oDBTM+bLn4xhTxInj+pEVeh6g6rJhUKHn2VGQClYWq6C5mhPzSgNIgNV+B0dUKZIl\\/V3b0TMZU8SJ636\\/FxFfpixx+QVSjqmGMpwwUcrtUuyIwQINvpLsxn0ENDv9JAdQKcrk4oobEl2r0zS0SspLdPcrbzzxIVumPHi521TA4bUBoGBjWQGXyhwd9wBS1nd3ZRr56s7i0HjZiNQfLMIUgNJhX6iEGFUkbO4zzs\\/PpXMzlsVI2Fxj4faA6N8li1Upc0vgdJWs7u7KJOkS\\/1OvQegF44kTxInq+HDP5QobXRVegxogoFB6LfQBY+9LyI8XJ7dpz2MwmNKC5CSQYNV9B0daMw+QGDFXi9QIj5tPZJHqWGOEBQoce0qdDPOyO0liioTkxMdx31dYdGuVqqKOKCUp2ApqPvndCvnmxcscjzem3Xvgvd8D9LjaeErutQKnRvOhW6M+LqTKmXkviD7bqBztAYGuUxxMWQYBwUNF2uTrxVksTMVduW9o4aU4Yyofl5nTHi7s4+JlXol16NpE1soDrJfrprX9vnCg26vCBWJ8DR1xgxRU4nrJfGymI2ZZA8l1IjnQo9loUK1V+ihAJkMN0FncEfGmWCvKA0XIHT1QlCg064benm9IPkuZQayrXku4c9ViTXkqdUoT3ehlIbJQG0D2qgNOELDcgLZoK\\/aDldnXijFsqrTt27kW4JbR6lhnhgkQrtcOS8vtQ4n2FoYBsoQ2hAXtSlDl6NExpOVyee5ODi\\/Tv30pTAOXvIQJMKPTmkCo14KkpSD3UBNA9q4IIaS2iU0UrlRV2dtJyuTjzJxvEn9wcnRw6vxycuoBhToY9+R5cQmnbzVAmhodOAtl93SPNYEqoRzbxha57M8\\/4PJGA6dCjKlXxKDfFIpUKPxdir\\/trJf32tvxQ0jlqF1i4LUa5IwFud0Ka7+I8Zr6886X0HOnHl+utBoaE\\/LtA7YQuNyd7\\/Qcxp5OjQkcHOP6hQXEAxBlToA9GhGkpuKgIQprtYmyavT0iA5EiExqmbJy6eldnxhi00Fnj\\/CYtlnNwcOggPGTDu4jEGjhp3RcT5imRmTADCdBdj06S9S4J4cty8ebOfF524OC6z5VowDu5ecEVoaOTsk74jzanUiKtQg8RUqNBw2AgFIEx3cVYmA08PZy+euEiMC34NCtyuTtRj5OzlSmN7\\/h4ySKpQY0CFHhEChw1+Dap\\/uuu0r8gMK0G\\/deTmyQzvf2GjzAA0Zhu5kxpQoVhLboDDO\\/tcFoL9sBEKoHdQY187V5kBoxGn5XZ1QtinkYkjbdy7d6dTz9iz889SFcp82KiSQoP\\/osnr49JO3gYAtNyuTkg7QvU4UuTF\\/fvH+9Fyv2GN1LBNhdYEGAvZDxrgkobIyFlmXHsTANB0dTkoQ8+V69DRuHHv\\/l+a637DFqlhqQrtUpJ0ir\\/BtZNxuKU3MsB1aSvvg3FpOrt+B3fjjfLkyVmFML9hidSwVYWiRiEFRiFOUXHQYJ\\/uOtf285cZb4PxcXmE\\/BdrpLXcs0NqQIViLbkBDteSKpQuRJEYQGE0OB9ZO3jaV3NF2oqiOAlaDl9w7UuNYve7T7EobeOOHVLDEhX6AioUIDaIkQE+CgUNprrkqJ\\/LzEDnJEHT4QuuPVYVgG25ccf864yKXTxE+FUovUYpKFAe2W6wHDLafk4z432goOl6ddKpTwoFe2PjfsPc64zgWWwtuUEOQIXSY6NYUFARKu6wHDKszoxiUfkv\\/0GgwuULrj2WbE3UuFZxtmGB1LBEhX6OqVBFbNAz42NZqHiuKTHAKakVao4WB0hQ0HR7SKPL6kLB4sPG2Ybx6\\/FC7LGi66pSoYgNQmagOFFybcTEsDszxv0jKSIzlDSdHiH\\/fdSwOjWO3zC28w\\/UYmvJzfFFpUIRG9TMKAnANd118FyqnVztE1I79BQt4srJ+LTcHiHHUcPq1FC0Xg\\/+Q2r81yr0siDFRiGF0OCZ7jq472jbT0X7iTRHQU0R54xxcXyEvM+SxYWCzV5D3jH0kAG4bJkK3SOEOjbC1N9W60INfQ3P\\/nMIjH\\/y+id798+SQBgHcNyGXoC0RtDU0BAE0R619RZaHm656e4QQwynDiehuKWlTjCiKzBq8UTBFhGDBscIIRIDJ0dd80o70bvn8c7wnuee30dwdvHL8+fueShtxgC2GWXeHyEf2ZMor0bV36IGZ0uhI2eTz214aoYt66kXquyCvtdaJby6gsHvDa6TDimfoAjVfMCLGjHDMHI\\/n+fT4JRGP8K4KWE1aivkgcY5ImipWiJJqEVC137HF2Fpxm1HwShz\\/wi5bZ\\/2alzkA7md0WaIbMk1ioQ\\/SQaRtIarDxVV03Q9YUkmrW9d1zVNVSvDWoSpGb02thk835HE3LKGUzWuPtDi1EXmGI2i+0Dj5BIRHcsE4WvGl4LF9R1JU7a2KR9q2FuvwSxqoKbIovjji2MyMmgGn\\/J8aDw+Iy1hPLUVrALXdyQ5VYPyoYa99RrIogaKiYzKxWt3XWlM99xEM+nJA+FqhoBbzagrpGb4shYJrZ1Dyoca01uvr2iR3kVWpaytENPMWMzsGZrVvewfpcdnYGcmxGZwfgq5k91tyocaQjWA1+NtJZFRKeSRHY2QNSPtnoz2DM3g\\/BRyR1sHlEdDuM17WNSAaswZDVP2ju7XWtNuExM7GZh9E87vSHLPBtXzE2sTxcuZfzBDmSsa2bA1Q5Cc9DoKUcF3M9YjobIRdbAZp1v\\/ekw\\/tWAik3Ipn67\\/W5xCzTeyhzlECVYjLImKAICAQTQAABANAMAfiAYAwBOIBgDAE86jcRQDAARsKcKSZQTAdzt1TAMAAAIwzL9rPv5dhKQVUY5JA5AGsKQBJNIAEmkAiTSARBpAIg0gkQaQSANIpAEk0gASaQCJNIBEGkAiDSCRBpC8SmMAOU\\/s5tNe37YAAAAASUVORK5CYII=\\\" style=\\\"width: 100%;\\\" data-filename=\\\"about.png\\\"><br><\\/span><\\/p><p><span style=\\\"color: rgb(85, 84, 84); font-weight: normal;\\\" open=\\\"\\\" sans\\\",=\\\"\\\" sans-serif;=\\\"\\\" font-size:=\\\"\\\" 16px;=\\\"\\\" font-weight:=\\\"\\\" 400;=\\\"\\\" background-color:=\\\"\\\" rgb(255,=\\\"\\\" 255,=\\\"\\\" 255);\\\"=\\\"\\\">In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.<\\/span><\\/p><p><span style=\\\"color: rgb(85, 84, 84); font-weight: normal;\\\" open=\\\"\\\" sans\\\",=\\\"\\\" sans-serif;=\\\"\\\" font-size:=\\\"\\\" 16px;=\\\"\\\" font-weight:=\\\"\\\" 400;=\\\"\\\" background-color:=\\\"\\\" rgb(255,=\\\"\\\" 255,=\\\"\\\" 255);\\\"=\\\"\\\"><br><\\/span><\\/p><p><span style=\\\"color: rgb(85, 84, 84); font-weight: normal;\\\" open=\\\"\\\" sans\\\",=\\\"\\\" sans-serif;=\\\"\\\" font-size:=\\\"\\\" 16px;=\\\"\\\" font-weight:=\\\"\\\" 400;=\\\"\\\" background-color:=\\\"\\\" rgb(255,=\\\"\\\" 255,=\\\"\\\" 255);\\\"=\\\"\\\"><br><\\/span><br><\\/p>\",\"title_ar\":\"\\u0625\\u0646\\u0634\\u0627\\u0621 \\u0641\\u0648\\u0631\\u064a \\u0644\\u0635\\u0641\\u062d\\u062a\\u0643 \\u0627\\u0644\\u0645\\u0642\\u0635\\u0648\\u062f\\u0629 \\u0628\\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645 \\u0645\\u0646\\u0635\\u062a\\u0646\\u0627\",\"description_ar\":\"<p><span style=\\\"font-weight: normal;\\\">\\u0641\\u064a \\u0633\\u0627\\u0639\\u0629 \\u0645\\u062c\\u0627\\u0646\\u064a\\u0629 \\u060c \\u0639\\u0646\\u062f\\u0645\\u0627 \\u062a\\u0643\\u0648\\u0646 \\u0642\\u062f\\u0631\\u062a\\u0646\\u0627 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0627\\u062e\\u062a\\u064a\\u0627\\u0631 \\u063a\\u064a\\u0631 \\u0645\\u0642\\u064a\\u062f\\u0629 \\u0648\\u0639\\u0646\\u062f\\u0645\\u0627 \\u0644\\u0627 \\u0634\\u064a\\u0621 \\u064a\\u0645\\u0646\\u0639\\u0646\\u0627 \\u0645\\u0646 \\u0627\\u0644\\u0642\\u064a\\u0627\\u0645 \\u0628\\u0645\\u0627 \\u0646\\u0641\\u0636\\u0644\\u0647 \\u060c \\u064a\\u062c\\u0628 \\u0627\\u0644\\u062a\\u0631\\u062d\\u064a\\u0628 \\u0628\\u0643\\u0644 \\u0645\\u062a\\u0639\\u0629 \\u0648\\u062a\\u062c\\u0646\\u0628 \\u0643\\u0644 \\u0623\\u0644\\u0645. \\u0648\\u0644\\u0643\\u0646 \\u0641\\u064a \\u0638\\u0631\\u0648\\u0641 \\u0645\\u0639\\u064a\\u0646\\u0629 \\u0648\\u0628\\u0633\\u0628\\u0628 \\u0627\\u062f\\u0639\\u0627\\u0621\\u0627\\u062a \\u0627\\u0644\\u0648\\u0627\\u062c\\u0628 \\u0623\\u0648 \\u0627\\u0644\\u062a\\u0632\\u0627\\u0645\\u0627\\u062a \\u0627\\u0644\\u0639\\u0645\\u0644 \\u060c \\u0633\\u064a\\u062d\\u062f\\u062b \\u0641\\u064a \\u0643\\u062b\\u064a\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0623\\u062d\\u064a\\u0627\\u0646 \\u0623\\u0646\\u0647 \\u064a\\u062c\\u0628 \\u0646\\u0628\\u0630 \\u0627\\u0644\\u0645\\u0644\\u0630\\u0627\\u062a \\u0648\\u0642\\u0628\\u0648\\u0644 \\u0627\\u0644\\u0625\\u0632\\u0639\\u0627\\u062c. \\u0644\\u0630\\u0644\\u0643 \\u0641\\u0625\\u0646 \\u0627\\u0644\\u062d\\u0643\\u064a\\u0645 \\u062f\\u0627\\u0626\\u0645\\u064b\\u0627 \\u0645\\u0627 \\u064a\\u062a\\u0645\\u0633\\u0643 \\u0628\\u0647\\u0630\\u0647 \\u0627\\u0644\\u0623\\u0645\\u0648\\u0631 \\u0628\\u0645\\u0628\\u062f\\u0623 \\u0627\\u0644\\u0627\\u062e\\u062a\\u064a\\u0627\\u0631 \\u0647\\u0630\\u0627: \\u0641\\u0647\\u0648 \\u064a\\u0631\\u0641\\u0636 \\u0627\\u0644\\u0645\\u0644\\u0630\\u0627\\u062a \\u0644\\u062a\\u0623\\u0645\\u064a\\u0646 \\u0622\\u0644\\u0627\\u0645 \\u0623\\u0639\\u0638\\u0645 \\u0623\\u062e\\u0631\\u0649 \\u0623\\u0648 \\u064a\\u062c\\u062a\\u0647\\u062f \\u0644\\u062a\\u0641\\u0627\\u062f\\u064a \\u0627\\u0644\\u0622\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0633\\u064a\\u0626\\u0629.<\\/span><span style=\\\"font-size: 0.9375rem; font-weight: normal; text-align: var(--bs-body-text-align);\\\">\\u0641\\u064a \\u0633\\u0627\\u0639\\u0629 \\u0645\\u062c\\u0627\\u0646\\u064a\\u0629 \\u060c \\u0639\\u0646\\u062f\\u0645\\u0627 \\u062a\\u0643\\u0648\\u0646 \\u0642\\u062f\\u0631\\u062a\\u0646\\u0627 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0627\\u062e\\u062a\\u064a\\u0627\\u0631 \\u063a\\u064a\\u0631 \\u0645\\u0642\\u064a\\u062f\\u0629 \\u0648\\u0639\\u0646\\u062f\\u0645\\u0627 \\u0644\\u0627 \\u0634\\u064a\\u0621 \\u064a\\u0645\\u0646\\u0639\\u0646\\u0627 <\\/span><\\/p><p><span style=\\\"font-size: 0.9375rem; font-weight: normal; text-align: var(--bs-body-text-align);\\\"><br><\\/span><\\/p><p><img src=\\\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAABDQAAAIhCAMAAACG+xpaAAAC7lBMVEUAAAD05d3459j45t5wh9T64Nz639twjdbG6uljc6lwi9P64Nzz7+P28OT05t\\/64d1wjNYgIiX38OTvrIBwi9TH6un64N328eT44t1wjNT64N328OQ+JyhwjNVwi9X64NxwjNVwjNVwitP74d3F6uj28ORwjNUeIy328OT55N1wjNYgIy7549364NxwjdTxl3FvNCggJS\\/5sIVxi9T28OXwjmluMyf1q4BvNCf53tkdIy0cJCxwi9QfJC7dYEhwNShtNCttMyf3q4L64Nv6sYT5sIP4r4P4soT64N3ZXkfhYEncX0j5r4LoY0r0r4PF6+rbc1nD6ejH6unRWEL28OT5tojF6ufG6ejRWULH6+n6pYHii23G6unBqabii2z6tITvfVzMk3P64NzqYkn5s4T\\/\\/\\/9wjNUfJC7G6ukiIR9vNCj28ORVVFTii23+89b6ooDBVkRYdL77w0PEsK0fPIhYRDjQjWj+\\/PbgXkaCmtrkYUn6uZCAfn9YUU73+\\/3U7+\\/nYUj\\/9eD59vB2dHTTWkTYZVD6rIL\\/9+ft8fr2rYDrnXf\\/+e36y7O8q6nZ4fT63NP6xaflj2\\/XXEa4xur+57X60bzgY031qX15k9fi9PSmt+Xllnv718jbZU7bXUb52dPfoHnGVD8uLjNLLiiTqeBgXl3J1O\\/xo3s6Njn6v5zvrqHx+vru19bsak82PErjf2KQblvqpY\\/Wd13tc1jolXPzv7Rphc740MnDj2\\/whmxyamphfcXwf2D91HjHWUVTR0WUqN\\/Aze2ModvVYkrzlG6fr+CofGOvvuillpfSmHTW1NevpqjabFbl6vfwn3cxTZdxWU2tttT94Z\\/Svbq7gmTgycbxlIN+ZFYvNkeQncSRh4lTbK5IPz57QDL8ylj1yMDVp5fjkIHKZ0\\/GwtdzfrS8mpm7j3L+7s2Ui6g\\/XKePTz2nYUpjUEj8zar2r4v95dO2tbWfn5+qhW5rPTrBpKT+7eDco49QNTXYoXyemLii5qhlAAAAYnRSTlMAIBBgIL9A398QQIBAgDCfv8C\\/\\/GCe759wgN\\/PIp9w35DvMI+A38+Y71Cw37Dv7x\\/oetpQ3xCHWsahW0Cg72GlZkNAz7+ggHDPPNeSkKsw74pGv7eQsGBw56\\/v38+\\/v4+\\/ULqf7vkAAFuVSURBVHja7MFBEQAQEABABPDTQB\\/Dgwr6J5DC52Z3EwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABBVqbu3P\\/qZOQGRlLPG\\/eqxdzctagNxHMdHDWQVI0Fa3CBKK3XZlrKX9n2UllIo9DqDMC9AcknBU065eLF7Fi99E7qw7GnfU5OYTbY2azUZN8nM73NZ9i5f5+Gf+OMlugEgjfqbT5NngGwASOLz2eSZvCEAUH1vJs\\/nDIsNgMp7OdkD1QCA45qBagBAIXuTxFmdAEBlfZ48v+8EACrrbFKAzwQAKurNpAhnBAAq6tCFBpYaABD4NinGFyK\\/XjfQIQBS+T4piAIXKGMeaBMAqXyaFOQbkR6iATLqTIrykkirnRaNDibaQA7HDGngUOMwBjf+jUbn8iOqAVI46sIVl66HNYOH1aifX\\/LA+7dhMzhHNUAKadH45QinUDQMHvja7vLYx0bQDFQD5JAaDSqcOtE453t8VODKCKSHaAhWG\\/OnGQSg8hANcrpqzKa+GZoBckE0IuKrMaORKZpRRZo2arVaI61JANE4tQYPTGmCB\\/oEKkH7MBxc6Cyhm++sDxoBRONkxnEzYhgNrQhtOLhi6fR3LxCOJ6PxUzyVotGO9yY71egSKLWWpbP99FcjAhjuEq7HfXTHjPtw4VpiTeuC\\/WVh2+v1+sZe7HQD6w1EQ6SvPd94Z6GRHIZ2ez5sUsqo9WhXsljerTyXJlxvc7d+1I6B4tlANEQa88iU7uIPGgTKpmUmwdjc03TeZo1sIBqJ00djhmiUlRYnY7ly6D7O6hbZQDROFA2KaFRF02Jb9tyh\\/+eubLZlKTvAgWggGkpr6Sy09OihVuuHI1GiJkSD4ExDXc1XcTKO4dksNFBzsaFaNJqa1vJpGjmFc8P39O1Jz\\/DhPcPlMdJZwPbosaJNiq7kyUbqcNcv4YqPRtOfDTZ1lrgKZoNHRDwDcxoVMWShO4dmMGehIVGPEmPkzRcDnaW7ModROE4\\/EdojUCbbrYl9T7NxbRZ4RZQjfzQ0y2T76YMWEan7bzV4AO\\/tKpOmubPMyLrYMJU72JA8Gs2hedhssMhr97c8MMNTrsJ02pE6EUW7YL7FiuaxWih5sCF1NJrWFYvdXG8816Ex1\\/P+mg1+1yJidC751vTReQa2J3l0eaQtrBk689kuzce1VayGxNHQBuzBcu45NNX96naRPIokqBmxWcD\\/i2qULBrbZty4NC\\/3RsFqSBuNphUXY+PQvbzrh25cjMQ1I4FqlC0azYuwGQ7Nz7kNq6HUuUbqletv4Z49GsNoY7KYO0cM+Ql4pKDBt+J2PP6vj0vXUkTDZL5rKsY185lEIXIOd41MFrI3Dj2Qd81C+lBINYxab8wfdNu1MZpxpNrbvdGon+e8a72hotyqdvMqZTSGUTJW9BhulA1Ty18Ng\\/ja2\\/XF11r4tmE049jXMzf2RKPe5wbJyIr2JqI4N4pNeUkYDc2MNyZH8mwhB6KNtN9yrY3RjGNf6d5IiUbcDJ61Glp0byKOYzNfi6hCvmi0tqcZtw7NYLPNhkVy6aT9anwNzTiyGVE16o3eJY\\/0jVrUjICR+eJk4VKR3IVSh6HSRWPIAguPZuPexluU\\/MZ4CXn2ZkTVqBs711HdRtiMzNUYMN+KiuWFkz5EEbJFw2KBZe7ZYF1DNAqQNCOSLDIS\\/X6O36x7wXxzKtod830gapAsGgMWmJdkyu\\/cCOCRkyPVx\\/xgjSybE5uKFxyGvlZkgyJXNAbbrQmm\\/KrN4Ifq17PctrpUPHehzr2rVNEYiDoXv0Y1CmWcqhlavBAVbq7ODYpMY+RxM\\/KboxrZia\\/GbEoD02nOZpBBvDkRz1ZmMFSiaFgPzUA1qs\\/giRlNTHM1o5XcnIjnKbPUkCcacTMEVuOCQEGMnWTEZkkzMj1zsqQZbO5c+l9rVZYa0kRjJHrO7061JwrKpfFEM5LFRjfbZ8TL9g2yxFJDumicYM5vrdgTBeUyjpvxZDXaWU40lllXnRRLDdmiYUZfIqKfKHiNY41CNPgWTTPLttTQMn5GVixw6KmGAh8YSaJhneIqzV3gWKMoXR6a0lSzTEsNK9vVyf0f9s6etW0gDMAnyeA42MaYltSYhra0wTXFSz32P4SEklDoqiOgtWC0aPCkSYsWobnkd8SB4MmUjqVrf0gtWZVcR5ZPl\\/fk8909W1sSmkR59N77dTjinjQ47SHhyV3CAw9jadRwHHhCM8NyPAT8oaWHk1wmVE3kdarSiRvgiJD0gXmNhOfqZl9cIjjOcpOgQE1eb5CiMtrNmFYaaBSFGt3mCp283urQDBUQH2ucQIpU6MXNvviCwHjGqvzuyNOwwwnvrHXMImlkNInToCGtM2zykttLJDr6zb64hq2chCYwWWpL1svBKYCVxtTcxoRCGtFT4tG8NUq8kjw5zieXN3uiDZsFdU0m3Em1XWX\\/EErDLCONrEkjoJldxWXyp3KcTygn1jiaV0uGkNjgqlwoKfDSmEBK4zRa50aR04pZEH+EFI\\/Lvs4nV6gY+CEkh\\/ZycPZ7EprGCrURkJ00OuXzXj5OCMl7OuRIgj2\\/2QdHGlygQfY0eAHVog0nqKAv9MSy1JIvxseTURQwUDijXGHOkWMXj3Z+swfegi4FtcmyE8GCMtSoo02UNNY4hERonNKgcUbJAMWWo0h\\/fUMCrxkN4pYdO+eVwUvtXUmDuTQ+lm3\\/u8URpfNloSQDS9UXUM410B6NwCWKNCitEbI6pra3S0OXNbvxoRvTJ+vT6K5oE+7580s3j+PSneczSWajtaObnfCaBUVD0jzVHEfYDl2vRgOBY1itbdLQ+5LfrNTcEWpYMR9KTjR6ZZvHKd4znix3Gey2Bq8JDVQjLoh5GFNex3cHHXFmtzfmS0PvS3+H46Aw1JiWX0V+RiCN399W\\/IrCyxyC7x5Rjb6OZKBSa5xfIQR6OrFLNeqEVHNrHQSMkY1cNdPLPcaftdgZ6rboVmGoYcUMdEQOXuLQSiNjZu4CL0FyUF3h9auGQMiizlm5zNbcLInD4HxiWCtamzeIdZuRM6S3hlbUqmGtOEHkNPAS84nSIIpqbTl2asRo1aRDz98iSBpl2vVsvMLf\\/\\/nESCUxsDYZW5ayRnpiK5hW00oeY20IacxVzXWdC\\/bRxuW1jkA5LpPd9jClNXzw2cW+RcILJC9tK2GyzRkfyj4o3yGk8bDzDSPF9EmGfvH2y+URBBsNY9FffXl7pSFoXpVKUtwRduuwn13USazRQvKy9g2abuvQMCqXBskneZDoUldgLgFaucALaVkdzTNLEX1cjaU1ppOIqXJG7rcnCzb+\\/xYZPEojVMsUaNGPKpFGyaH4GY4p3VB+lzwIjF6la78Uyhm5gdh0Ol06dWptYChpCIV2XoE03pRt2Luja9mZM2jz0\\/t54fdkqpyx4YwiDCUNobgAkAb4QIFrU1nDK+jUgF64PVVJ0L5FjMGdNGRLhMJyzV4avdKlEA9HELSGMm\\/ze586I9caA4nrrS2LlLFWIia9V9Lgn+fMpTEkq4S4Mz\\/FXi+eeb8SzB0waO\\/qbm15VKFGao1+++SxKN63MmcA9GkAS+NeSeMp6F9ppAFfPJlv\\/fH\\/\\/JZQfZufZsVsn\\/vuIolpZe1t2sm7\\/ztms38ea6W6AAMQaaiOULZoR4ylUSfpB51jCmkwjzkNK2JSMI8l8fkk1kLWEttMtdHSs3\\/OnEG6uMuBkIaaPWFM+5xCGsBTSC4GkAZkStxao3CIU+qAo7XeRt99tG6nFTkD4P0CLo2FHJcYsOSKvTTMHcwOTxoTJQ2EWokz8qWBWmMNIP0FLw1Pjs3CTHlLIQ3Yg6oPIY054MgawT47JY0lOiqSBtLLDxz4ENJQm7vY84WNNLKUOGNpZJ+kp6RRMfnSoF+88lDBlOuDJDtCmaIfKWkoaexfGnHzMIA0XFVxrQDtXElDSWPv0ojLJy6xNHyczy3Jwibx7z1hzgVTaQSHLA2VCCXjc7d47zjQDWt\\/fqxYSsMJ7RzChSlcHrQWwV9jyfVeqye+qp4okpGD0GRNeDB50NrH05ed+gj\\/o94Z9j5ytHLsGjECL3GqkMYD+Ojii4LziaWau+A5jsNS1tgHkdKonQ5HOJdRp8f\\/f\\/\\/pHaHuTmlw2RGqqzbyihnFMwds8Q6gtev4VR0XMho+Ezkrk1xmwV4a9wTbYoEH1gykAOVVbsEU\\/nTyEnFMo7cZYtgxm954KW688SlJbsFLg\\/2Ua7N4NH6MRKbZjfiMCIA9nzgmU2y+F4Qed3BKcD+feW72\\/XC92\\/ldgFPqom4Sil8eENKgHyiAX8IjQ6Bh7OMENorvyGHJLdfXq2XKCL7PFmYu7m1oC66NuM0PQhqUhTT4dX+mHOv+9iKNXvxDZ8kdx6eTVBlB6DnFT3toi6yNpM2P+cCaD19I0\\/t527angi8Wbms50tBfoEqoYcapUBdzu0ujNvz31M8ckoRu+E8bHB+2KGkQ1FwXJNKgqLjCX2EwFf4Kg\\/ZgrD2Sht6v6kvtMA41Qm47u05HyTPvEQvwX7jxkk8LQpdP4JfwBP8XT9RlSbTOWG3B0F90rYjBi+gP\\/cq+1GO2oYaLOV1EXutkyiDH9QU9oySZUKqshk8sDfg86C5nCJkMXTpjybi9fuX1Sbu\\/S5AHE2qEnKZBn40olBHhRl\\/RwbS4EvOxOKmRVZMe40U2+JmwOy0yRCmML4AeCHoBtD7YuyA3Qg05Ao1XOCJI60YUV37UhTqiNJJpZWDYX7BmpEcQ4521Trep94V0Rv7NBBULspPeZACPzWWgUTtbhRmuSYe\\/sgZHQykwT0GeQ7lPihtZVP4+3bfd\\/9yMEx5COmPdGtNV5rdqZ6BjzOx5ucU8jp3U6vRhRhZsCLZY6JTpKTV7HM4QNMbaSf7k\\/3URel9IZ2TWmKQlZlJnQPYQB64Jj2vz2KPxJnaGvTCfgBPiiB4Shvh8sjCZcsdGtEbsjE1pJNYQ0hkIDbJutnVrvEdV0Rgxess8RMly3o7+b0bx0cQxn4YvmjU6eQtj+T+dRLTRNmkgXUxnGI87YCcVt4aesjmg+DyG8CtnzAFibcGs8XHLGNJBtexk0hCbdznbAKYVf+EdFhUUF3PY11UbYag36iIQyhqNvDGkQ6ukSSKNdu5YL0GbBvivku0CJzQ4rEvW6okzYKzBaUGZfgzJNtnhb6mkKWmUweguGVtLclcBjAkm5UErKPeQwalzz+FvVCN1BqA1RKm8xqHGrckK167geWgaKzQkKq3tC9inVa9D7WHgZGjIY+w+TJwBhSdUl9cnVqFGFmiIvP2MAlhpTAikAf\\/E4BA2CTpEfNFLc6CgjShnSAxqmVLhcXl8iRwgXEmjcQZpDR9z+F55g+Ffpb5Icyi9RwUU8YeQ\\/rJ39ipuA1EUVhKBsIiDCYYQwhrbEBFSpHHKfYy8gqZJ5yaoESRNXKmxCuPa6C0E9oJR5UYP4NavEf3YexXF8p2MtNGdib5m6128x\\/fn3DOyQUo0NN1oTjUiimV7z4Bpb3NsSZpea0w11vZT4BGccEkJOMjbn2k8qsbetevirilqhnbHvVf+7scJpxPXL+sQrKlEGT3V8aJL8whJQl69SHhTKRrvXiQgvtDmVaP+d\\/HigaRmmJwd+yk8zi+Evo3iqdSgpD2q49qNE9HNb5OR59f6k2\\/tJIfocJUhzsEhqRmawTXQiDPFAI6xjREp1KBkyrq3myZQSVgp8PqKu+trSgu7Zt1idSfoO6JhEyOewIgTSAbIho+W3gSdr6KMn+KiYNE1J0CDb738OdF4o7VA72O9pInFlqUMyPX4usEx4\\/PnV4mxBkWhUkOzmr92dZ2uOQGaDO9q4cq12svAVkuxMmNFNQrvjmNaE88rCLENikJfpHBRoLbPT2rgqZfS4uTDK60VZgZLcTz7b\\/HyMmNCMOFfh6qbXzOAsP1TrH\\/GjDWsGktGMVVFZhLNAH4kJD9aVg39nmWsFyKdCRtQrEOzQkNUM\\/AOZa2QL1R7e75DUtnnJzWPmgG0rxra0DjLhsdfZexZxoRafgb4ugL7Fj\\/nNzndFkyVphrafZOqsaQ5F5eZi2i8v5a9\\/rmlWz0oNtgm4G1Mcj7S\\/HQM8ULjOL\\/J8Zst55NQwvEqD4tmNINiepvkXAKTX74Gyeg\\/77epGfCWEF+svRetWM6A6petgR6q+WdXhh8KNSgeS1CmBO9ZTc01okwzVAkPIMNjYPKzL3mecJYf0m9ZM6BHQbZpwXrFqEuGNsXV75hbMhJioVJjq9SCoCHVcPedZjQPBCaXH4Duf24\\/RyRLjbQrcBfebu0wRl8y8jHonqPQiP2EqlrDRz1tE00ZctVgu5qerk4zngIITAbRyCGQomz+kctzcDabzXq\\/2TgOKzIZE5YMTcPHoGFeaGTEImtXd6XSKPQyDWWRa4tD9J5AKS6iQYZZWTQWDrvC5M6k3c2bWcWEdyehnzO\\/DjIKpWlqq+vycxb1UgOsTjPKqC0ao3TrimjGgHaNkTFGHeTf50XROIpsXQOFXKE5o08sZSlcbOyUWinR5FU\\/hdCr+Ol3zbIUFQwYH8ejKe0S44yFdicnTDTwoYar3n2FfvYGBzUS\\/iZSfEI6Gm1rg+J7aQn3pjmcmaYu0b8Hx4Po8W+iIeYK3SpkJT\\/TGzM4KRBAtTlPB5\\/Hx6MdFcw70njALeQwCBU7QFmqeGFhGixjUyUb\\/9ecp4OrrPfkPyFIu6wIFw1YuYqJhqfS\\/QnwluU4AddI1NvZQNANNf47PhXK+p2867MBdFmIaIC5S6A9cZUyhZZOCvhOkbzlKg2ZVf5P0lFNwRB6kPiEwMJTZfzHcL84nFfhY7YEhV5bq5CN1T44VGlmek1Q3tI+qDfn6biJDldeC4nfH+yB9iErVwQsnHyv7n9IKhsgHEvv4NoFwBtcnptG3VDjPyM3hIJBg+TRO84U5qACN66ouQuIlDo\\/KaEPDVZklXmD1+ANBgqLek8580oHpyHUdWTOawPtQ2zkCKGNEKi4Pilg3hvsNpPB8LyljS7meuXMKx2oITTKHAgya4Y25Hk17DRH8W0ET9KV9F8wHQ0mrAJrbPbO6xZI49jKW6F21DGERrIaNIq\\/BsI3tD85\\/rQRDmruXMtMZ+OBxYoY1t2ocH40+wTj0J3UH50OUUPokiVY8i7OfrF3Pr1Jg2EAf0ttTWEWa8zotLoJ0YrtDERDECRAdtnnMClNwPsuxsRdvHmRw+LRePYb7KCJ8eBN43VXv4YdMB5k7Xjfpy8rxfd3Y1k48OfH8+99XpAGYkMo8HPx1PT\\/lMBrxWwwG3wzmy1eiRg\\/P\\/pyKtL12hggoBoITfOAxqz7sKEGBBpCGqxr395znSTXup1au10f0a7Vut30\\/o6tMaP5hndpdwZII1ZVY0ixp0r8qs7NkQZzXh+4lMO6nXalf45KvdYlgpXi8ak0jlK\\/ewmkEaOBcuJR0AsgghF3J3Ne8SfJNRBGGPWORQQrw+hdT\\/oaILkwRuIhDXyoMUxUGlbDNgzH8f2WYxh2tZmGwLw4vkw87sblbm1iDOGNNHClF5B4s7UwGLOxLGkAx4hAY\\/k1DatqtPx5DLtJVp0rMNWRRSuj3qejLfKUlSC7Cs7gII0d2gW5Q0SgsWRpaFXDj6C18t7QdnoTdtDKoKcutLECPOmtwmXOII34LVd8AwVaJ5c5p2HZLf8inIZFeCEFqFP04BGvcihWpVq7z0ZbJCmJE5SyEptWKkdLQ9JRm05pOMZOkMNE6HWeyvAX0rItgiUjqbKZy+eVve3NF6Fsbu8pSj5nyqqeIYzAnBeyqNGt9JmpEUGybCXXbL02KERJQ7r\\/UGcfI\\/\\/m0TDEZidw9uQRv8Sk5VNRZdaGVDZL7h6Igo69QB9lNYMobKBK6bU+hooINpLleYLOGEyt4Q7GlM+cwXwvdhFO+C\\/gLeZQPPCeYwGo6fi0OA3q2EKXS+72i1hsKnlT1VnnvO6wKrPeR9IhggQJ3u17STljYo2NwsPBGbdlaewMVmtocOsJ9oC8B1zOPg3bZ8GwFvuibOZDdIFXR0nWaSNW9pk3a+oMkaKkiweIVhk3ZwQU4E7s6V8CZ4A1EFsLcUWNE4+Kr7wmpi3DZ6NVvcgXKviCL5TmuMu6v8kKyhnCGqnkcQJnmsEZUYA1EEvVkdI49qjgtRDTcnxmbC0iwCgpdMWL7QBlyn7wiDbmMFWKOS+mj1IQZwhrpBKNNj9PQhpPJcZBje8eDT8RB1y5byNv+Bgc63yEUdq72BP77rg1IklR\\/RVdLcu5kqssMIiSUxeUQ6+z1UCFNdJJcYckwzV+zoD2ySe69glWGhxXR1R9AG8NNadcIIt8TtYlwkRGL5slZT864nDli55xSyO0dPpTRDU0ZWgEAX9rHB54AQcHhxhnwDz80eslSgPqoHc5OANNg4zJyPnNCF24JVnPkDjoqukqu+FPfyuvIs6WtOuVehuOq1r9fxCdVwGjNQ494JDRGcBV2qLG22Eob6jvICwm5AywhmQq4b7Im2qG8EIv55RdRMAxT6cCX\\/TJ8ZFKX1hj6ViW1Wxa1lq9SoXBGA+YsYZOAERRgz+weDsRZwCdXFjxYdcFX\\/BEKpdCBaXIEq6zWumMkhNhjaWhNaq24bT8Ka3UnJpehHQfnDHLwWDENczRuyNvyXzgsIu84cfkR0iAIZFlopruLs4bEGYAFRgej0l9Hb4IXLGqtuNHYNiNtL9eJjgjLNZ4mGH162PIT\\/BQ3K\\/2JObb2vJj8vHXbISBEAYK3QzJVVw5XsFTtFA4ojXthZ8to5Hq6GwcaBx4IdbAhRrPKfOTP8ehDCmzk3u85jPwfP49EYZi6uQyUUv75+oboXVRyoKnaKHwY6ExwBskrWxADTQ8QbmByk9e8+2e8M9ODJ8DL0+NUVIz5PKR5HOZyi1ZQkx9irIGCvzJR8BJX7ixMcKFQCMi1Bj\\/n842Sf4FLY0h3QKeXja5IijwKqeS5Cg\\/my\\/FumUSRru\\/dOpEACtZaHGq6dKGNJjBi5AGUCDUbNHNd71BH3L9ELt30vQ5kfR7roI3INygTE5EWYOzMnwETqqSlFlpHHrh4KSh9ehKoSfsNz\\/DDdk3kyxoAAZJnHPeyOtUgYZIUHii2T4SJ0UvHHdpAM\\/pQo2fyPNq72MHGrbPjZXYHVp+Nt+EJUD0CJdIULgBtQwEVZIWliiNLIQazGt43tIFGltxJzTWKNQY10X357IUMqXbvxz+32XDZ+sV1j7Y4C8N4Drd\\/q4hqnfyPe6SM+0ve+fz2kgVB\\/CZpImk1aZ1SmxrtVuLrtWKv9BV17Lq+usg4kEvioKPRwbqDnsQKgXxWJocCmEPLetlCOs2iCwRIgZB4gpGgyhBswQk1aPQ5uRf4MybpN\\/JNG9+ZdK8yeRz0G1pD7tJPvP99b5PSU6GLNRQ4TvTlPkJHg6yngqPcQGl96r6mk8qG32SBtzictPFSo3vbbZO7mWgc8JWqEEIR5CeOG+5MWM0rDHwMMNPKYqN7sknLqQBB1D2th2XNb6HKiiVH3qtaCyI3sLUSDD\\/rEEbZiWNUajhAefXRE84y\\/mA0F2E+y3nNFbJz4Wdz5Jfs3M+XtdC+ftfm1vIkzOMVEFZfEbw4UWDNtZNGFU1Bp6a+MoaGmGT\\/EQ7G+\\/yHhe7V639+8f3hD9AGVZV0HtYqYIyl59odBZFn103YdRA4Vjpw\\/nIGiFtBTk90LiLc8UUJChe8mOy17XtShV0mPMTjegqSOPWugmjUIMZZ4jiFxOTnD9YpYYasFDDBWNqgvLjZx474wqpgjIVaIgik5Vv\\/lmb0hiNhbomNi16y19kH5sPuB0aKN2ccaf7iya938azkySrQdkKNFgNK4+1sW7CqBTaA147Q7UG8oc37upujY80eM4tDyXhMmhv+GyPjGgwFmgwWNTo1MbBuhmj\\/ISN3ETjT4T84I3JB7sNa3wCrVa3xMjNotc9Ega0W1kLNMQ1jlmINvLrJozyk8H3TXTc+Op4bzTD9Q3iDFhGrgHryMEarsoaHi\\/x+q23kkbs8X44Y\\/BHXS208d+6CaP8hCVnKMXQzgPLTNJyBnhDAb5ybw04g7L3mye+gBHypZj7e577AdvS4Dj+\\/fVThO1\\/i05Yy3MJvxpOHrIHOEOPZ9aYIdbY8biqMcfUo0Fk6PiJ25sXR6PkA1iuQCHbSlDYTVPu\\/sgOK5xb5pIqN73tuS6NseUM5qXxwvrpcYELAiFwhud8F0Eq7KYp\\/P3tO5FIDwWA78BqYffWuOJdqLGpNl1ZCidF9qVhHmqMihqO4T8V+8h5Pmz0BlvdFGINco8a36GNu+8IcXeAM3q1xlUvprzg7Mk4Q+GkH6RBXyx8cHh46G1Llht++D\\/FfjJN7u47scYxxDEDsYZ292JopZ2tvH073NgIznBb11DZ3Pay7TrFRE+9BeuFUHqCclATsEq6ZvDGqBJqBj9\\/Q+wb8BCaNKxxTMTZyVL4+xVnGG5oJM4g1gBnuOa+2zxNUXbcHHNdEPtAsypqcOwDF6zplIEBgzZG411mzvhL7CswLbiyihCbzRT+Tp6jSIO7A5zhnrHbegg2Pvt583qXCa\\/Y4AONnFAUFRieCDXNUA7TWE\\/6aF3HqH1i4oxbYr85r190wHRR1CAND4mdSRKuONfGzT1VN+1fhNVdcwMfBM3JWMgq\\/2f27ImRpzu0cYSN1NaB0UwoldfRd2K\\/me7cNo86YChL6Yc0gJlWsHHdYSryQ7LF1W1D2zU2gGtOAOIMjEvKH3xQB22xoNNGGZ9EPhhJw5JldEvsPzGzvUoowlQvBaThNWPPJ0EbTpUB2oAJrzODzU4aAlbIiwoPc\\/7hxQuPQZxhYo3RoAaFCYQuif3ncY5ADTfmmSlu9EkaEGwQNuHTb8ZnVzaThKWHbmtrY0e\\/VeO+QZ5hrmOCIIqMrtOgs\\/DChWcOBUyxxkgapkwi9LF4CqxxRoxN2PlZxrKUPjHX\\/vRfu75tYYydn\\/aSGveMcbGZ419saWPTWds1JnpLrohbNPwVaLR5B1PYWG8DcxwHI2lAERS5rGjkciWVRk60x\\/nuy+aZLm54D+QohGs3qefYtq9f3Uu2mBqHMAXSG63tOj6gkkY2D8\\/puu8CDcJrmEatwxhlQWvHjqShEUeOKxrZZr1ckTEgF\\/NNa3WcpUQ6zwZRGyTa0Ni7dmXHYI7tnZtXN5Ntlu4BL3Rqg7RdH+jHsZNSvVwrFou1cr5aytKUART90jrp5CVM5ahLUzZ9OJKGyixyGGiUyjIlDyyXRFPWOAr8ckeWshrlJ6PRsMLsRJtZ5auVaHSSZ2iGtEdmppJ69n689tNVlZ9+VHUB3DZnaJCMTx1rY5uEGvd6LY0cEQIgFGv5ZiMLwijli7gD4WEGtwpb85SAaQgHx86AH0ofjLonHMcnEEKOhkHzmI5cNYk3TFty4QSyS2IxEokrFolO+l0gY\\/c+kLRg6cy4WXqz+fMPTtquZ22mHbTPkVxUkQVMKCshSKNaw4QPOV\\/yMqYit3OTNAYqI2mQ5AT9IvYsDaCcc5af8Cvh5fjFReSKxMXV5dkoc+fsHTA289ASVRhTc+NmVRFgzsvmSU7Gdqi0X+gm+flXOV\\/yBsZWZY0K1nM4mggNI4VLXkoDC3l7+UloMry8uphAXnAxorjDt3HHfU+emTKEHLc9cM+998UsiqlLoJcx76TREOw5I0sE01Aq4WWs8DLnS85hEw51kxy76UI6pf69A3\\/2JDSPHJdBy9gKOWeRn\\/Arii6QZ4A6Jlb8G3WMjY\\/PEJ4cH4s5LabeY+vVnrjkmTPknKHyIXC+5CmMLRIULTkpSCq\\/Y4wPgn7KdQIhyE5sUsTW5Kn5CR9ejiRQH0lEllcC0X+BVorNtutsAl3yKjfB1RMh50ucL3kCm3BEAg3ijEw6ldovqN8L+BIeHik4nQaVsQ2Kue75SQKdCvOrs0xNpfcL0MYUZ0FUDSq\\/6O3VBQQxV8GdvMb5kjewCcKBVtHYl6QUblEL+HWucaTwleiILAacpygfo9MjMuHfMofz1u24uTIiSOW73gpWQKVxwi6vcL7kHDajdoBVMlIaZkWD3TzhkcqvoiNKuBdr\\/IVOBxBHECKO8YfMr07iI0jjU6vkBHdBqBQF2pO4Bu54gvMlT2FTNtT\\/pHSBBk4Huw4ahzeSfeq4F2vcQKdOIjLr3+qo\\/bl0ets1FEdt\\/nJcrxLyDWKTKtgBkDvq4k9xvuQJbMm+LtDA6UDXQXlEKLmog7q3xi00CObjK8OeqYydiVFaJlBHspJGjlKbomUuTTVdlYe5EqqRlvZ1XwS6pEEeQE4brjlsHzk7+PwEiATkCC1dGYsrCw676WXzekeJfNvfldBzBTvS0H8R5JIGjwjvi46oYgcUxRNcQgNkfjkIFQ4d4Xl0zCMTHBdz1jqRtSpWvibLlWJR7tJ3VWj4uxL6geRQGpUgZydxRHjc24Zrsd4sNfMyfV7jYzQo\\/HF3vYdEI3plhCxXhDawgZz6lJAxlRr5LV9XQt+UpF3rmkYGAxsBntLgESE+7SbQKNZLuVypXqGmwFUBAthOPkUDAwocXABQlAEsh2ycWGsakxPYskOhpI893+V8yFsS1CvopDFwFOCDJ2FE4KedBxrysQpKMm0QNCdTyhrZr9DgSQx9vMHHERDhbZ2Nz58INGAag3aq+XiEdOvy5Uc53\\/GoJEkF7IjDAGcn81qgwTnvt1aylNpZWc1\\/i0r+W6vm2vMceYZKocHJU0ITlJXNCw6kUWnHi5UKtoA44\\/I5zneckxSwE9IBXsATRYTogqPWidB2Rq5arTcbBmvkdMFsudFOUJgMNVi9vN77lsnFTjc+bF8aQr7tfWIPINXNGWxLI8RPRjt3Oq2QdSzvSQq72AG1AAcace0d5WhrJGnJCzkx2y50CkpIkRXgTSbgkxRZDTUIF9m7p6lnZnXKeCRsXMPjfIY8ZxzpS6dPOkOFwZUaocnwRJy6gCHxjaSSxg44CG6gwSNCmHtOpFEqCooVSiJQIxLIdrrBMnStsxtqMHYtZB+6rCHOwHlH7XTouwoY2C9gA5cJTPVcQ9HZ+MUEMudrSSUzCjQclEEfCXGPWy2nz2cN5QsBmyLUG2Wsp8ZgA2Voy6LGLutJph0fK8oaa1e70q4x0CCwsodH8YXNdS0ZiYDts3EY2MEuLtIqg3JnzdcqQN0zawgpytUy7kbVOGpeZm5WQ4P162R77bLGeTu7hbPVfDmfb+bgADN17hMwBvSXNVgY1ODD8UVkl38kjX1sF3lj48h6RsOXO5btZidR6oOnbKxKQPMNVJCnPZdKFgt5brCVoGj4PtzgI3ZuuYytdb3sqJJXvFGhz\\/XWsI6ClDIEGoRBD2rws\\/EEcgLJTpw0XVMbGxupjYNgnm\\/VspNFiFZNA9V6l\\/3UJdqTCR5ZUNNgPkHRmJ\\/wcbjBx02VAZylrfYrNvPUXdElrGdXyqQM0iBwg4MPgzBs87nUwoEzBPX2kyAmJ5CdcNPUo6zpjJT5HasITblrSV2UaRkw1tFkYa+GxvCGG50H00z\\/Egv6Dro9BGMIUgBrgDQGNt0Vii4vIhd8K7XZdeIMspsnaJ0TyE5offssOaRTKEjw3jDSoEmjbgxUSgNf4WVg+KoboAzoslqEGvDypXZT2CmpjNKoTDEhDX7W9c5Z0nC133RNyfI+bpE+oh6JH86CBmQnNGmU1GVF++S9UTBbHdw5nA9bNGoGvXQhewsxi8\\/CDVCGoWVCr2pAh\\/X3jNpzBAHYJJWGBwpI49Q3akCI4YYvpTYZ7JjaQbCcwa0ilThVGnWMU5pUCzQJC7mOiR8pBdYoF7EesTs3GLYGmvfP7IZTZUADRVadoXxgMtpyfofsZuCjNhBphKJQxXAD1EEhP+lZGxeG1hkcIkSp0sjr4lCahOV6HhukQZkN8qM10LxP7qFWlAGAMsyZPi52a+FCaj9DeThsbW2ZpCj7A5NGKNz7RRh6aaSxG2qHhl7rcJ5t1Z07eYSzIQ2cBh2YQW91F0Ua2T8R0\\/ggSwnPu7puf2Gt9SLvHr+6+xnjKwhpxxZtNU0afvA0pRGCMkYv6KVRwO5IHx2CMp4e3jCD45aRyqqZNAB70shQjiNsHc92+amH4pMspUMZkUnOPs+1OmSpgtm5VWDLYnOmhTSYizE0vpSAFHZLeqN8dHTh6ReGdDqjzetIJUyXRhMDhe4uMFCQaO+4\\/9m7n9BG6igO4NPWRrTQCJWlFnTVglJpLVZKEdGDdVv\\/LnvxJIi8PjuXDbuwoOh48GIlMZCMULOHSJeApClVWppidxEromV1QVbQikulgjd13YNV8WZm0vZNfpnJ\\/CaZSX6\\/ST8Xd0tBdLPfvvd+\\/2ibhjT7NUCKLqUyMjxWRQ\\/Rtt1amUHs2hPL0lqTQqMzQonRuE9iJIENeU4JuQ4wdTiHRg6JwydpzumSd\\/YTt6ka5BxsmMQ8P19fZJD7KTRcM8PkONIwzTUjNCKDx8BXu4e7u\\/QlrJvEz1\\/zGwLDZK37FTbQa8Wqx761\\/z5zxVXiFkXIc7B1Rwa5fwWJe2awf94ZnRmCBB0aERr5+mh3fWl1aX19AaCA3kn\\/\\/LXXqzSiNEjnfhGpxqcobp2\\/nyEJtUT2YgMGukR6NqWRyCCnsIYzhlqpUUwgCe6+Pxp9QsCS2JCTSrg9BYahWqGR6+P4JFWVqzRMJ9+r7i7JEBuiDDes+zIoMuow3oeO5mxDw83cuBKISDcEL4XehOP5a16dYOqgPcW8pYbDp4hSw+Yjt6LyuCTsrnILEWKj8cggU+jojB10pQSgl\\/6Lg1VAL0Ly\\/LW3XRrHXa5\\/23D\\/8TPntAR3xuIPlc\\/HMuRGHX9JA4yM4w2OWsbHkNQbGteRjCkmudqSQ\\/NYB9mfv+bVA4ZhWntzuYWHd6BOtyycsVhUueU+vCZ8cHjeuSFolWEa7UPChAZff5L+O1m9hCDuaklNKWyIhO83eD4W30\\/bfOzt9HkMjUSsWP2Nr6oebV66dk7EK3r2tS42eqNAfKp5TjqkxhxXaGjzf7\\/yLlo8J2uRUZbERgh8FbsPyukdodBwrDX4Q8M8LVm0+cYtlXhJjssCbzFv9l097CzQxzbp5BhiPZWGdn3+xruvlCTRYlrWIsNkLTWOtndV6gUTx+s5i1to6LvAMdMoFhMZ+p3LSINzyHFZ3IrDdSYqRWSUjJ7wGBraO++aaVF2A62ekLbIKCvg0VCj1taubsXk8o744h8rP27mVlyXXJ3L25zqQPZFlebFRmfPABDfh7Gj0y8Y5cZYH+cgVLtBmfGuhlb+jW5aI4uNGFfCqwcMg8qBx1QXtGljjnvdnnZpNOi0uLER8FIK\\/RVqzr902nWogfuyr9lnxpPS7MlwUkBeeazyhBJew2Dod38Hg6zYfpbQEX3nVbU2uXd+OcxEA+tLRgaDLG+edCk18JBWnmfc0LDCtMRFRlkWucS\\/Lcbba3vXU2CI8LzTR6WGTWogcqTGotq4nMCnU4KLDba1p1u5gjI+5uHsSeF6UkPGSQmHn4wCussU7W\\/feEEJrU4wdVoOSbtb4bqXhTU356E7kfUAfWD3EPda\\/wpRZAToiZqlBroZk7gvObCAbvLFWKzYbmfWImCYtN7H4qHUYG+Auz5\\/PZ3WNA0NmnZdY19b88emuOsowazAdg51g1X3kNIE0zVSA11NSNyXHEq6FBm6cfVG223vosUTWnPlLzVY6Vcq3Ki6HrQdUoOWUgI5btHE3etTjsNQdDcqc19yqOCcGAk9Zsi33\\/auQTAMKuQxL6UGK\\/sKYafpuKL65kMQW7QjmEkG9SVNcYKdS\\/E3oyek7ksOLWhoI54v6jGTnmnDM2vDYOjie0ac\\/Ij2tHecMwMXVUP45xqmaCSInZCT\\/U2LDEoNphflMyp3X7LPJjUKfWZglOnxdtzeRYsntHzCYwNZ7F6fv9n\\/21tqneR6km2fD4OHzp7jYNGSU7UnsD5TdfVhAvUl5GBdSCukk\\/OpypcO2nN7F5g6mZup3e2gk+SN0maf1\\/5OI\\/pYaEjy0jxjoMu3toT6kiabwnqMSd+XVEql4ABdWq7n2\\/PMWgcYRhRCG8k9NyhEc3q4UfQGJZUCH1FseL+XH6xaeXXHNNZhVJbzJXXYjZUV4216Zi0CACO0eEJ3C7vbQE8u5FSf\\/QB+SxUQ530Oj4H+jgZf8qAiozVGx9CraelHGTWkYqZE215J3gWGYeY2ezd0VJ7fVdVvl8BnSTTs\\/yIJ\\/qDrROt8LWwkwCLD+9HXIAYakShIZdVcNWnfK8l7wNDDPLfFZ6cP+W2pvsstg59SaTSlUoXyP8E\\/nLHR29MNjO5+Ee49nxhDD6ZCM8qwt2RfZrTNmbVHwNCveBhqkKtIAmlO\\/H4iJVUozIODlIZlWW3\\/n+AfjhXYzsjgcWCM9EQUQUz1Ia\\/E097O+UtnV89gO19JXk75CPOIuO+pcWFRDcAmeJRFxDTYmqd1eAwiNGo\\/sRSxecJ4ZFCYxPDSo2T02EQoRxkkhVVWf9nb27ti2Nv75Z8\\/w7296zgYetkn+nxOjb4dlbRwFJpGp2FFEqukwF9OSym9\\/cPHgDUi4BP1o33oLlHq9yfC2pccKCBZ3bvy3\\/lZxvmf\\/tv75c+wDjXAxLTNj6rcrsY9ZUaL+xP7YYV9ZqTBf+wZ2E67CsOsMUQYZFQZQ1LrOMYpriUiaSODPi5\\/7lFe2PjpysNKCHWCYURhPMYfGkX31Ij\\/qAbkNHiSQlPS9kPAykIAaCmls7c\\/OglVhOtKrJ50TQyTfiqsfcmBbDkxfpp19eADtyth0wuGSXbH14f8Y4V87FusLZ\\/YUgOS8\\/xnbQJGEm0VUhCI6BDlBaNbnMmnjRfQIk6\\/iufzpcAgpyQ6xVqXFCWGuwfvvFcJlQgYutnzKJf5QwOLtJvW4V6jOBMaLRpqUDhk2S87yUITjUSFelXa7RxKXo\\/phli1l0I6yjiw\\/CslBpfbQlVudIEhyp6WX86pnHYwrjtvwo8b9xol8Hs1KFfAiwLa9SdJdJSEJhnp7he5xLA\\/hkLVBePF0PYlhm++Oz\\/r2c0hig3a21X5tdMqp0XEjNnHJjJxJjD2S1YdcUNltGgSivsKYJFEZ\\/PQBCPdPWLOPV1PocTzun1oyHWK1Yvl776Yrc99NykhMQiG\\/qoxx2UPoYH5WJleTCTyhkSiqFsvHPhaZbTm0FoW92nMF51oELTj0f5eRRoTTtNPVlj7km8+Pz9bvzuUcKi+gqdjAEr4+5Py2rwjPe75mr\\/Ajp\\/M22zBSGktLTS6uxSJTDismhRjjPEw9iXLv34x25ibw1Fs0IZQ+orpksoJDfmYkzwGGhofggdpNjRcMkOD4Jk7N2RxEp3EM\\/nEgXwmPhq69RJYpklG\\/e65VQmBqnu7eqDsnMqpDw3GNJRFRwH71KCcBg8KVELQl1pVaJBjUVliYxSJl4NaQ93AWPhkd31pdXv7omF7dWl9AYRGkdGgMMxDj4Ohg5oTOMDbn1xAU9ymRaFbSlTSwtCojoMk1pCGJpGmSxlHThM2fYmRFOtLpaS4+OnaRzNVPrq4tAuCWv5qtuQoNRx2kdORw2vcoUEHlSrpCUSRQiPLLKW6ZIa2AE0jS5fiPTQiw7ulpNg2kmLG1dr2OoiHIsMX8ncoYGKaE9OyymfDOhFjIqO+20GDGoTOs6GRQgGaEyLgETXWGPJ57unHHz\\/1\\/PPPP\\/PGjEdrSyAWigyf3CP7NPTghlD6LTntKTRokl7Udb2YyDRwpXBAS67JitCgIWgm3trmhAyIviWUNzS+nKnf2iqIg2YZ\\/rn5FkVq5ZQYoOaE8I5Cv0cOO2pArgG\\/gjURKDMwrxfzyNKyWWiBY1Ght208WVdoSFttUGT46m5FapVHT7rAgncUuoUcNtWAXAF+WmVo0AJsPGG7D16DlpgUuNw4EWhokE8\\/AQH8+vrsoaOxRnVo0LYucs2\\/0PhDDcg54IckzQxBMzqt9JAstMYxYacbzyGf\\/EyjWl9sfGPZynXUoDiFRhSseHeFrrTgJnKyDNwWkKQpM6jYyIgw1jAJu5gyhXwyMw3bXoBWWv5u1k27bii3HnLtANY14UNjE\\/hlkWhJu2vq8uKERsmwgHs3JgIPDbLWyhbl1\\/OzQbpH5lLDGhpRYP3Q4ENrxHJ1lwgrrrbyeiwvUmgADAjXpvCHhtSpsVzVmRyVGqQfDFEqNCpd8utq4RWVtGoOmkQXcT2WESo0Sgb6xWlTxh9\\/9mXu0JA5NezKjKNSw+46jShUO+dXaGwtLqpBWAZ+abTK26dGHC2SIIJuEcYbpcB4xtjrjXy+nZE3NajMCNJdirQoNDrAzmme+\\/54XbiwsfH91srKytV\\/\\/\\/03l2vFcTWSKNqmRlGE1RNGS3ODAsPUlCVXsrYAzUVlRsBuU6RFoREFO+d8DA0S\\/6Dk7bffPnv299\\/++reB9LgMHhSwgm6fGgkkIJAW5AYFBskjl09nfHIRmqzWosnRXg1raDgVGjylxg4Srz+H3nrj\\/fc\\/ePvsb3\\/lVBLUW64a03bH8lgtb2lQCiCWZucGBQb5ErmszfhlG5rHtTU52hZKodFvTETtcCygLK6gR\\/RziKLjg7OUG0G9Gq9hpWIMbSSo1JgH4XQ3ay46+vjzz9j2C02ag5J1aJ7l12eb5h5FVo+AoYtOnVR5s3ZibGAdbG5TMHNDJQG8X1BdVCTQBlUaYt4LMxnkW0oUGE7iyOHiTIl8Yw2XzDjqTypDYwicLOf4E6Oh0foHn7139udccIUGIEuPoSB38Hg0EKVGpTmBQS7y\\/lSQsEH5n72zCaEhiuL4IIRioWTjI0oRKbKwsbHxkVI21ve8ZkURi2tQU8ZCEd7iUbx5UZKXIV48X0k9yseLhVAkoRTKAmXrzRucZ8zHvTP3vblz3d\\/CAkWpv3N+55w7DL2JXtXA0JhGYnnJkRh5LFmt49ouV2w8I1xE7IAe6\\/0ox4eSuBmPBYfAwLAgDe8Am7MqYYOS7kD1\\/GQgNMaQeM5f+FdApicGf8Nr3a4C9GLjm9hCA\\/n3LzLQn0hz48rBjPEzp44qMJBblTSOedCnZBOU92Y6er8LQ2McSeBRKDG+fe4eq6TC3\\/C+c\\/pW1NnGVmxceEb4qPzD1qMyPdyViRmLBXyZbe16C9h5zFBJlrDUOJ++n6GlxmBojCdJbPkrMfbXLBaHzv\\/\\/UN2xwIc6rwXuaCCVCKlR5kLjDzNyfaFtxUYLuPCOpTcnJSw1WIWGXgoNQmMmSeTZ6cHEQB0mxGggtdsu9LGdT6eFvfOH4MgVh65lLzSQ1dlKjrUbgJvWgdSnNMpXarw3R84so5wEobGYJPMSEwNrVJFGA6VGAE1tUS6cJ7zsjjChBxQoNJB+cozljQyxqXHWLyRLWGrsMkfOAqOcBKGxhKSwFxMDa9RMHPAglv0O\\/Iae+iFWaJDo0FCm0EB63cr8mROmssjPUGSI6FDuejAMGmSosBcaer3L3whNp3FlKyYGe2rwS7L6bfxT7ESxcfop4edIxAsaoZ+QdoM8A6t72bFwQsI+B7oMfrzodfIDMf+88j\\/+t8ssgJJ+yyA9NNqXunWL04dlXBWsVSmEUkNcZkSGRnjkKvkyaCbmjB8\\/bcrMcRMmTB0zmCBr10Eubh2L2NobKDPK1Z+8N4tguVFK0kLDLzIyWnT+9WKrUwWW1LiQKTPCL3eFP3gi30MaQ2HGnD7LABETGwcet+AvytSf8IxO\\/vsvNCaHxpWt9RprjSrgJMEONjUwNb4J8BnIycpflHqvKycNMcchrVuPf8Xusbu3PIjALkd\\/ct5kRy+ST0mODCutahSRGUjdsf9OjSgbeuM8ycbhSpj\\/oDmJ5I3AmsDzWp4HMdhuOfqTeyYzeuZqxK+Ctt\\/WrawaPaskqzkUBrFOnf5HZ7wkmTlXCfH\\/NSd9rngwIlwqLJvIMNllFsIio5TEhUbjUrcGCHexkU2SWb\\/Xu2L3Nc48I5k5vFs3Jz5NGBXUBWG8IcOCU4PqRY2Y0LjS7dSyTt9yzOIslBqRqbFlB8nBEd2c+FyCUWFXrXIMXbNp0Kvbr5r5mGiUkgmRZcZbx3UwNPLHxoHrHjBRdyCE+0lQZJCTujkZcWa4tBxD14wa9OPOnU+2m8n8N6HR7rpgO\\/v5dn2OJTQmKNbTqKPUCA1eL7w8T\\/KBzUlJn94pWW9iu66vtUsgNTJq0Cc7d+7cbubCKCVTI\\/4r6lAAcPbbwEXr7tnIU4TrPKa+1sEuGAevp7e8fEryclALjR5vYFTYbtUGKMXRWjYNenVnj7QGRcnQGEPCvA3Gnm7HAl68W3cfD1Qcx+5GDe+Z17swNUQ4sMOMmaG20GjHJ7j4zLBAKJcIIoMG3d7LjCdmGv9DaLQvu9CHVmuQDa\\/Vx4MsdJ2IJOm2SW6OaAlKSGNkmWFVg8wog9S4Y3KC3ckrMw0VQ8MI6wwKAZZThyFiJz3EE4Z2GyQXf62Ql\\/dZ0Nw8BxFQylBmVG0QjNcgSPEa1NzZ46aZjoIXazP+6nj7mRGAJlQ8NqWxN2tRo333IhFnQUv\\/wl\\/hEjTNcFK3+ud3yC81eJ4T5u9OlAyNOYOZ0aHwh2rHBmTYmYGtSBUiqL7NaUF1ZhDS9kBYaliJkTF4rSz9pwx4NSgOXHd+NFNRMjTWDGaGBYiL612CsShNf4gnLENzabDDOjN6XAdh0GpMbNi9yBj8NfmlBp8G5R+4qug08Enhtl9nIHRIUsOmmBnpUgNTo0myc05nhuANDcututSOSIzIyJD5PJ5rSYN\\/4KpkaKz824EiuN4lusygbA\\/xhIexb7JbUL3UJX7aavklhUsty\\/axaC8wfOjfkSG91ODUoPxKQ8XQmE8CGqHMwPUu0WWGxbepgSOUduZDNT04wcmJyPx3q0hcYkguNTi7E\\/6Bq4qhMYUEvHUBES81sMywU2Kl60A09HIj44qG3gQlpA3DoF9h+FC\\/5IAhc4sESKBBrzIPXFV8WXgc6XPJgTCU8WbNtjkigwL7Qzxh3LfagkpUaLAitdR4aPLB350oeLBmLCQ+bceOcI911iywmf5PwtaE8SGeMNlGKLt1oeEXGioQyHAJNCjHwFXB9zR+XayFhAbnepefBnZ6kcHW8Vp4syZk8HpQ37aqUmgEUkMGDcoxcFXxu\\/Fj+s2JCxFUOxa738TgiK4x0GakYKHUiEgNboF+WN+cKFNoQIsQIoUGvbmzh8mCkqFhRDUnvDdrmAyWbf+lOyyLskYGSo2kMqTN25zoQkOZQiOQGhJoUPMVe3ei4MPC\\/T3yrRRCZLlZs2k8FiAcD\\/Hkv107qA\\/VfFqgBk1CZNCg2J3kY65RUtaQpgNIrvUu24oKDEwM5od44qEXuZoT\\/fKOTxMU4bkcGpRnHVTB754Yxkq0oGGcLDdr2JFkmt3jepeIwevuip639q9OFKElhwblGbgq+IU1w5jfrALCt94lHrxZSxih6Cf+\\/ksN6uMrrcI1KA5cczLZKCnjuhYgXOtd4gnfrOW7XTtc0W8J+1wBZWgSCTQoKo2czDNKyioHED6pIZ7wQzz5btd26w+dKDU76UsNCTQoDlxzMskoKZsoIMO9WeOXGrlu1w7qQkOt2UkPTwINytedKHivZix1AMm+3jUiqYG3a0zNiZ63KqY0RH6d8fxxkx\\/+7kTBLXJjfeJ8s1qQ1KCQjLuVpTnRGlStgatPs3gNyjdwVXEhdLMNSNR6VwHUOqcgheolhuZEz1tVUxoA14v9gCv\\/wFXBhdC1vj6QzYRC\\/bYDCN\\/gFZsTrUGVUxoAXuEa1HzCpTQU3O1aTyEafJK8AOz92zDMst2u7a5oDRrwBpTiSkEaFNmJSiMfy41y8qs7kWy9C2rONjdtxPLlcGJzojWoikoDoFnokgZ\\/d6Leblf87ASfJC+E+rbk1LCdx5Xdh5OaE61BVdshD7heqAblH7iqt6axygWQUWqA1dl2yoJ43IuVSuVcQnOiNehvPFAKr1GkBuUfuKr3QuivzS7Z1rv6LjQpNdwO+gi25mT6h2i+HyqGZyQerTSSuFLkrRr\\/wFW9ies6G0BKqeG70FOn7Lhf7Byr9DnI3py82CIV+0g8WmkkcalIDcqvNJSbuK74ozQku1nrUbsdnxrOUewuWJuTa1vk4jyJRSuNJK4Xp0HxgycimG2Ukl9bGvKtd\\/n4pYYTJzT+cJh1cjL9zBapuE9i0UojkUaBGpR\\/4Krc8AQ9aCyFmFAsNaJSjXYODEw\\/DrNOTr5ukYozJBZ9Fh+Dd\\/1580qjUA26nVtpqHYY\\/3u1S76bNZ96LzROuRETnb7QwNRgnJxM3yIXT8kouARq4LWaV9qFP9kVDFyf8ISGesOT9EBwi7hZw1IjQms4F2NXOrE50SpUGaXhtVoXt27dekKGo3j+HXL1hiebASSWGkGpEU4Nt1sJcZBxrevBFrkYxdS1ASXGj4teXgScIBI82WVe5VYaqj1FHgxPJF3v+lNqOKGtr2OVMAcZ17pQhe4pkJ\\/sndvrDGEYx+eC5Jp\\/wK0bpeTOhRxySErK9bsvbpwm9VvtuPBzDFu7ZNeFYaU2reS8zkmRrGOSFBfOp3Iu4s6OWb5jzDuzz+47+87pc0eUlK\\/3+Xyf9516gArNlIaVF524AHsi8DZop3ClfPg5heWJqvUuFChtdrrWx\\/\\/HFAwnQhW6frE6vvxVoYLWNfXX4tedRGA4QkP9pfjOdEIJjTSWJ8rWu3DUwICCttVNSTCciFTozcXquLHsD6tZ6FzMxRFkhjM0IqBBf08njymhkbibJ7\\/Lk+iud9lroRaOtpUDV4WC4SRYhdYXK2StrwrNlEbYoXFvSS+gcNUp5Uni3vpDeeLDOhUmFCoUAwraVg8aguFEpEJvLFbHZ7\\/WNVMaotCIgAa1C1c5oTFeiyft8iTiUsO67GpRwPq4gDKGk25U6NrF6ljvq0IzpSEIjQhoUHuHnFSeJM2D2o9pRHm9y25dLSA0RBT\\/DCdRU6HbaSo0Uxohh8blJb2AD57oqV4id5Yn0XuSHCrUYifWx0VU7OEkYio0v2JFXqxCb7L\\/yT5e4B0a6jXoksfWdEILjaR50N\\/lSbTXu2wVarEOQqMfoEIHc9TYsmI4T1ehab8W7xkaEZlO3umk8iRxHtQqT6K93oX5ZGNu51HeP1ChLxaHCI4Z2\\/Ej8EKsQjOlIQoN9RrULlxpoZE0D4ryJNCE7q1WFYmNwqU\\/qXGLd0GkVCiOGW78VGj28QJBaKj8cgHWQXVaeZIwD4ryJNCEVjdt2qRmRsF8suogl8FXQusq+5gBbopVaPbSnyA0lN9VswpXcmik04NaF133qgoNzCerTuznMsBbPF8WE5ByzADrRSo0UxrC0FCuQe3ClRgaCfv28xSERtBO6KY2Cp\\/9szLj+dAQl8KxkFUojhnKt0Jjey3eMzSUa1B7HZRYniTsXvz8fd1OCKpCA\\/tdq1YNDQ3JOWpAhX5eHBrDomMGWleo0FK5xBxkL\\/0JQkOhBkXhSg2NZN2LhwcNxAoNFWuhmE9WDVls5TJ4SFCh8o4ZYhVaMv5encmUhk9oKNWgKFyJ5UnCvsg4u+sY2Kk4NFZZw4mEowZBhUo\\/ZohVaBMX7jKl4RMaKjUoCldJoTFCiycbc92yzwqNnCoKl6zMkHDUIKhQ+ccMsQptcaRGpjRCDY3DF\\/6yhAQKV2JoJGy1C+VJIAU15QmkxpCFtKPGtTBV6HYcM\\/x5tKzDD7x0mimNkE8a948sdXCWOzju4vtTNz8f332nE8uTZH0nSZsSl9DIbRqykHbUMO6j7wwhM7ZT3+L5wZEa2bX4sPc0riM2DnAab3ULKaExVosn8\\/eRQqOaU8ZehIaMo0aFbfjbdy6WTH7Flq5\\/7Z8\\/xWvuSI3s4wWh33JdfX6pzXtO42UPoZGsT56gPAmmGpnQkLCrYTB2MywVmh9e8e+xw0Fe9BbPNd6hmCmNMEMDPLi+zAqNa5zEU91GQmaM0mIKypNArIXQQk4Z1RMyjxomY4fDuoAy7IqGFQ6GRW\\/x1Hk4qZGLL+GFBnKjfmA\\/dTqhh0bCbquhPAlmr6LGFaEBeO9gCLiOt3jkCo28O0QcCN\\/iaSE1MqURdmiAUm\\/TyYUUKw2UJ8EoaFyFoTGG94VRY22IKpQuQVG\\/gi0iFfrQ6Vuk0Tx3Lq6XXAcTGhVO4rhucyHFSoNQnqyLUmi0+rWgFlCh9XAl6AonwgsoLefwJBOT775z5+rVcxcvnjwZpwJ2IKHR4CRe\\/QmNFCsNUnkSofFkqE8LaiNfhUKC0lXoQ8HnrCX\\/Z7r1YFwCZCChwXtTGqdTrDQWFAihER0R2qcKrTEb+SoUEpSkQm1aIaVGmQvZHeUEGURomJyG3uF0epUGpTyp4pKrEqrPhqTMJxCN8lUoJKiXCjXLHz58qOz6tiXvrULrDlPTGPgJPHqpMYjQKFOnk27Lk+RePJm0MUcKjWcq9zSah4YkqFAMJ\\/JVKCSolwp9w0GjXDG\\/5d1boV9d\\/Y4kjCw0hBjk6cQmxUpj1k5a43pI5WfWnrBDUuaTGgNQoetDkqCYTz5wN8YH8xtUKHbJJVcovCuiV7KIQkN94arr6b14ok0hhsYZhfXJJsb+SY0+hhOwWuqz5KhGvFSod7lnlM0tL5ZhQAGlwY7t0fuikjg0VBWu3\\/UOF1KsNObsI61p3GInlNUn604wpEYft9bKDBBVKF2CAownHhivj9UxoMiWoZUsNGQXrvqF9CoNanlylD1TVp8UlrN\\/U2NbH2td4Lq81nWLODPMD0bbYlS4D63fuVEvy9caRd4VV3NRYwCh0et0cjq1b2lo2qJ1pNB4xg4pM6GF4wypQe1PxGtTD5b94Ut41+ErvCta1+rL7nPpWqORhYYIk7oOSg+NpD0PSi5PjrOmMhNaPcRsmpAavQsNugqlS1DAu+bHD+6kNMCC4GAuaoQfGkXqdEIPjYR98YRWnlSt8oTVlJnQvU3Wodmil67iA\\/99Kc+S54edEnTLsIP2jw3eI40BHsF356JG+KHRoBau9PIkYV88scqTNWvWFP6wzsanPGkydkuVCd3E\\/nKmRS9dxWqxfxWa39LWnNt91sZN3iuVAR7Bc1FDEBrqCledHhpJ++JJOzSOtrnV4UqHjS522mxqc4YpM6GFowzUWpAaPUhQaSoUiZH3XxsvchFbT3FfSlJCI57bXYLQUFa4PtV7KE8S9hFXTZvMfdi62+aOzY52vFivxykyoYVn7L\\/U4D5sbuMnQcFhqNDeEgNb4ZhP3NdaTS7gVEBolGXM7THd7go9NMqcxFuERmqvxWvaDM6JElFZfVJtMie17z5SY\\/PKv2wWHPUJKpSQGKIXNMQFyp3lu\\/+Rkdu4G1PCv4yYLmqEHhpE1\\/QSoZHaHXJNm8vJbeUTRfXJ3jMMdKrXbf6RgdxA5oFeL6BAdroSw\\/exrqLgNLf8FHdyapt8F9rIQkN24aqfTu0OuaYtpIcGU1OfFE4wN83W\\/uDIQGwUmZA6+Vny7e1QGIb6BAIVanJvti0\\/yJ3s8MhBc1D7S5F7gtgzNKJQuHYdGon7HmObaZwC+81RJfUJlAao7Q\\/IDIDMkKJChwWJIVShhuigsZz\\/Aw4eoCGhIYjndpcgNFQVri8lliejtdgykRMwmIWC+gRbGi5K5YDMAMgMgQolta7oV4GfCs0booPGNldo7OCyjxpmFhpyCtePOkhv4apppPWoBmPqTOjeWtABk54ZYAPe4unlpZ1gFfqJe7LDnk4ATh4yjhr4K4rndpcgNBQpjVc6SG\\/hqmmcHhpqFskLy5k3NYM7WCkAElWKCh0e\\/v9nwBYvFbrd8J1OkCIoU0BpMLXi1lzE8AyNCBSu+oXU3nDVtAm8W2AS1SySVw8xEcXAzPhYYyBAhdYJ04nYe7p\\/yvoNpsHdHITC8JhXQFHK4B6\\/ldATXqERgcJVv5DewlWbxylUmIWCRXIUrp7Uyv7DSaPEgAQViulENIx4b4VuN43AiNgtfz4xuEUcV0L3CUJDjdJ4qoPT6S1ctamcgslUmFDskIupGNyCpjPob\\/FgFgnYyxCdPtyxcQrDiJflAGbf\\/zTiuBJ6KdzQqHASb52hkdYbrv5b5KLJWs0iefU486diCELDqLGuWLvsD7ep04nHMCL+rlrF+CchPCYWr\\/7EKPZr+2K43bVmlWdoRKBw7Tc0xmkxZianwNjg6xO8KRxExfCYTgxMNfJU6PbgL5sITh8IDXHBegojixOj0tf\\/p3HsXDeGHBqcxHHdQVq\\/kkS5eoI1DQWL5JhOAjAb9MgA53EBhTCdiPYyREeNiniVC6mxlUuMjSLlH0YuQhRWeYdGBApXPa1PCltM5wRg4wZbn+Clv2Aq5Y9\\/K5OyMzIoKvQzYTqhqFCLD9yJ56Fi6zZECSE2ZBzCD+UixEZBaKgvXPUL6S1cCVvkuKOtYJEcF0+6wjxTLFbMEiNAUaGYTugq1H3S2HGQ0zAqYZYnRjMXHQqrBKGhqHDVHVxI7zooLTSMiYwpqE+wDyofeuuK6SRIhQqOGt\\/+DY3dnErDDG9yb5zJRYeNIYdGqY\\/p5EJ610GJV08mj1RgQrHbFTpQoV8I0wlVhRa5A2QGgXIprMm9XMtFhjWrRKGhvnDVT6d4OvlF3tmEzBSFcfz63CgpJdlQyk5KSTYWyDc7Gxt1HDvMvVmQa+GrEaZmyGTzhs2kkcn3iNGsLIRsxMKGRGx8Flmaa2b8r+s94z4zz7nnXOe30luDfPzf8\\/ye5zzHkxQ2T5wrDAySQ2pwQ9\\/Fg+pkaBWKq2t0EBt6\\/m+UxKVbz7fbQZsQGlqVBhquoOnogycRSySFJd70WQYGyfG6mm4eQYXSqxO1CgXdaGFIDcQGU\\/MEI2SWuNBzvjI0jCiN70GcppsPntCvnszsfGC26JLh24wYIyfDr0JRnQypQiM+SQ4qZf7mSfRT2uFC97fVoWG+4Rq4Ow5KnCJf5XWYn96E5k9qxFUosTpRJURSdHCkBmKDOzREBztc6FFfb2jgBEaoToCzl9WoU+RbvIi1BgbJsbhLM1ChDwZUJ4rL8IqESK4lj\\/gWShbqY7zNE9HBChe632cIDZ4wxTgoaDl7WY0aGqu9iAlzzbRPDj4WVPhVKKqTZC1CUKER70LJQ70qBnNegnSDODbcdG0PCg3jDdeg5XB1QpsiX+NFdGXo7XTtk7xJjZgKfaSuTpTaM\\/k1dbgcevdBMhFWWUp3bO2w4KbraX9QaBhvuAYth6sT2gMGK7wuk0SHx9vTkDupARVaU1YnCu1JUaFRuFRDyURYZWueRJhfSb7f1x8aFUki+IOmw9UJ7QGDzV6PaekHyfMmNdQqFNWJQnuSVGj0tXcVyUVYKnP85+j+JMYHNQ62MwgNWmS\\/SoSGo28X0K+e4GPLjOzhyURqQIUeGFSdKNJAoUJV4XImlFyElfJovg+3mI3fdD3qaw4NVG2k6gQ4u0qDOkX+ER+buNbISo1bgg\\/6WnJUJ4T6RK1Cox\\/z1CjowDI0TyyY7jrn\\/yM0jDdcA5erE9IDBvVJ+NyEuekGyfMnNcQeqFB1dTKqCsXX3n3gjw16kwAe1Px01\\/42T2jwN1yBs6s0IiSByhwPTFhIHSTnf8QAZKNCUZ2MpEJPIlz4Y6M+NswxHB7U\\/HQXhIbW0JCA3HANWo6+rEa\\/elISkzwwPd0gef6kxmAVuhcHjZFVKKhyxkaVfgyHBzU\\/3XXUzyI0xkaqTlquLvojP2BQFXO8GJtSmdAcSo1nKhUKCCo0Zbh8IoxtkDqwFZoHNT7dddonhYb+hiueYwRNl6uTFZJ2eJ3kgQ0WbiRnVaHqriubCgWH8LgBb2zUiR40wuBK8nN+NqERDlGdgKbD1Qltirws\\/jhqLE8bGnmTGoS15CwqFF87xjnv1as1QpoHNTzdtd\\/PJjTKwzRcQdPh6oT2gIEQfxw1Fhl40PXxeZEFUKGHhzpq7I5DC5eTn1i0KAY3JEjjQc1Od+1vU0ND\\/ww5lAZwuTrB1ZO0Fe+cifhwuvZJDqVGirXkbCoU4Kc89okpNyplkvATEeamu5AZ+kOjLim8ChK4XJ3gAYPUFe80fHh9qvZJHqXGZRMqdG88iUqSh0qJ9hdscroLzVb9oSHBENVJy+XqhDRFXhERCyfChKZtn+ROaihV6N6TMfamtBWEcAGwohkApWF0uqvtM4YGf8MVtFyuTkihsUX8YhrdhObsIYPkWnK19uRXoeBkhqkBpWFyuuuozxIa\\/A3Xa0GClsvVCenqyYopIgJHjXUpTWgOpYZChQ55rCCFCxiTWYHRLgPTXcgMQmiYaLiCpsvViScJbJ4qfjHf67GEZEJz9JBBQoUqjxoniSo0XZ8FMPlQmtIwtIbn4FGfEBpGGq6g6XJ1QgoNz+s9lTSB2YTyv87Ir0LV2pNfhYKTP2QWQGmYmu6CA6WHhv6Ga5DE6eqE8oDBTM+bLn4xhTxInj+pEVeh6g6rJhUKHn2VGQClYWq6C5mhPzSgNIgNV+B0dUKZIl\\/V3b0TMZU8SJ636\\/FxFfpixx+QVSjqmGMpwwUcrtUuyIwQINvpLsxn0ENDv9JAdQKcrk4oobEl2r0zS0SspLdPcrbzzxIVumPHi521TA4bUBoGBjWQGXyhwd9wBS1nd3ZRr56s7i0HjZiNQfLMIUgNJhX6iEGFUkbO4zzs\\/PpXMzlsVI2Fxj4faA6N8li1Upc0vgdJWs7u7KJOkS\\/1OvQegF44kTxInq+HDP5QobXRVegxogoFB6LfQBY+9LyI8XJ7dpz2MwmNKC5CSQYNV9B0daMw+QGDFXi9QIj5tPZJHqWGOEBQoce0qdDPOyO0liioTkxMdx31dYdGuVqqKOKCUp2ApqPvndCvnmxcscjzem3Xvgvd8D9LjaeErutQKnRvOhW6M+LqTKmXkviD7bqBztAYGuUxxMWQYBwUNF2uTrxVksTMVduW9o4aU4Yyofl5nTHi7s4+JlXol16NpE1soDrJfrprX9vnCg26vCBWJ8DR1xgxRU4nrJfGymI2ZZA8l1IjnQo9loUK1V+ihAJkMN0FncEfGmWCvKA0XIHT1QlCg064benm9IPkuZQayrXku4c9ViTXkqdUoT3ehlIbJQG0D2qgNOELDcgLZoK\\/aDldnXijFsqrTt27kW4JbR6lhnhgkQrtcOS8vtQ4n2FoYBsoQ2hAXtSlDl6NExpOVyee5ODi\\/Tv30pTAOXvIQJMKPTmkCo14KkpSD3UBNA9q4IIaS2iU0UrlRV2dtJyuTjzJxvEn9wcnRw6vxycuoBhToY9+R5cQmnbzVAmhodOAtl93SPNYEqoRzbxha57M8\\/4PJGA6dCjKlXxKDfFIpUKPxdir\\/trJf32tvxQ0jlqF1i4LUa5IwFud0Ka7+I8Zr6886X0HOnHl+utBoaE\\/LtA7YQuNyd7\\/Qcxp5OjQkcHOP6hQXEAxBlToA9GhGkpuKgIQprtYmyavT0iA5EiExqmbJy6eldnxhi00Fnj\\/CYtlnNwcOggPGTDu4jEGjhp3RcT5imRmTADCdBdj06S9S4J4cty8ebOfF524OC6z5VowDu5ecEVoaOTsk74jzanUiKtQg8RUqNBw2AgFIEx3cVYmA08PZy+euEiMC34NCtyuTtRj5OzlSmN7\\/h4ySKpQY0CFHhEChw1+Dap\\/uuu0r8gMK0G\\/deTmyQzvf2GjzAA0Zhu5kxpQoVhLboDDO\\/tcFoL9sBEKoHdQY187V5kBoxGn5XZ1QtinkYkjbdy7d6dTz9iz889SFcp82KiSQoP\\/osnr49JO3gYAtNyuTkg7QvU4UuTF\\/fvH+9Fyv2GN1LBNhdYEGAvZDxrgkobIyFlmXHsTANB0dTkoQ8+V69DRuHHv\\/l+a637DFqlhqQrtUpJ0ir\\/BtZNxuKU3MsB1aSvvg3FpOrt+B3fjjfLkyVmFML9hidSwVYWiRiEFRiFOUXHQYJ\\/uOtf285cZb4PxcXmE\\/BdrpLXcs0NqQIViLbkBDteSKpQuRJEYQGE0OB9ZO3jaV3NF2oqiOAlaDl9w7UuNYve7T7EobeOOHVLDEhX6AioUIDaIkQE+CgUNprrkqJ\\/LzEDnJEHT4QuuPVYVgG25ccf864yKXTxE+FUovUYpKFAe2W6wHDLafk4z432goOl6ddKpTwoFe2PjfsPc64zgWWwtuUEOQIXSY6NYUFARKu6wHDKszoxiUfkv\\/0GgwuULrj2WbE3UuFZxtmGB1LBEhX6OqVBFbNAz42NZqHiuKTHAKakVao4WB0hQ0HR7SKPL6kLB4sPG2Ybx6\\/FC7LGi66pSoYgNQmagOFFybcTEsDszxv0jKSIzlDSdHiH\\/fdSwOjWO3zC28w\\/UYmvJzfFFpUIRG9TMKAnANd118FyqnVztE1I79BQt4srJ+LTcHiHHUcPq1FC0Xg\\/+Q2r81yr0siDFRiGF0OCZ7jq472jbT0X7iTRHQU0R54xxcXyEvM+SxYWCzV5D3jH0kAG4bJkK3SOEOjbC1N9W60INfQ3P\\/nMIjH\\/y+id798+SQBgHcNyGXoC0RtDU0BAE0R619RZaHm656e4QQwynDiehuKWlTjCiKzBq8UTBFhGDBscIIRIDJ0dd80o70bvn8c7wnuee30dwdvHL8+fueShtxgC2GWXeHyEf2ZMor0bV36IGZ0uhI2eTz214aoYt66kXquyCvtdaJby6gsHvDa6TDimfoAjVfMCLGjHDMHI\\/n+fT4JRGP8K4KWE1aivkgcY5ImipWiJJqEVC137HF2Fpxm1HwShz\\/wi5bZ\\/2alzkA7md0WaIbMk1ioQ\\/SQaRtIarDxVV03Q9YUkmrW9d1zVNVSvDWoSpGb02thk835HE3LKGUzWuPtDi1EXmGI2i+0Dj5BIRHcsE4WvGl4LF9R1JU7a2KR9q2FuvwSxqoKbIovjji2MyMmgGn\\/J8aDw+Iy1hPLUVrALXdyQ5VYPyoYa99RrIogaKiYzKxWt3XWlM99xEM+nJA+FqhoBbzagrpGb4shYJrZ1Dyoca01uvr2iR3kVWpaytENPMWMzsGZrVvewfpcdnYGcmxGZwfgq5k91tyocaQjWA1+NtJZFRKeSRHY2QNSPtnoz2DM3g\\/BRyR1sHlEdDuM17WNSAaswZDVP2ju7XWtNuExM7GZh9E87vSHLPBtXzE2sTxcuZfzBDmSsa2bA1Q5Cc9DoKUcF3M9YjobIRdbAZp1v\\/ekw\\/tWAik3Ipn67\\/W5xCzTeyhzlECVYjLImKAICAQTQAABANAMAfiAYAwBOIBgDAE86jcRQDAARsKcKSZQTAdzt1TAMAAAIwzL9rPv5dhKQVUY5JA5AGsKQBJNIAEmkAiTSARBpAIg0gkQaQSANIpAEk0gASaQCJNIBEGkAiDSCRBpC8SmMAOU\\/s5tNe37YAAAAASUVORK5CYII=\\\" style=\\\"width: 773.328px;\\\" data-filename=\\\"about.png\\\"><span style=\\\"font-size: 0.9375rem; font-weight: normal; text-align: var(--bs-body-text-align);\\\"><br><\\/span><\\/p><p><span style=\\\"font-size: 0.9375rem; font-weight: normal; text-align: var(--bs-body-text-align);\\\"><br><\\/span><\\/p><p><span style=\\\"font-size: 0.9375rem; font-weight: normal; text-align: var(--bs-body-text-align);\\\">\\u0645\\u0646 \\u0627\\u0644\\u0642\\u064a\\u0627\\u0645 \\u0628\\u0645\\u0627 \\u0646\\u0641\\u0636\\u0644\\u0647 \\u060c \\u064a\\u062c\\u0628 \\u0627\\u0644\\u062a\\u0631\\u062d\\u064a\\u0628 \\u0628\\u0643\\u0644 \\u0645\\u062a\\u0639\\u0629 \\u0648\\u062a\\u062c\\u0646\\u0628 \\u0643\\u0644 \\u0623\\u0644\\u0645. \\u0648\\u0644\\u0643\\u0646 \\u0641\\u064a \\u0638\\u0631\\u0648\\u0641 \\u0645\\u0639\\u064a\\u0646\\u0629 \\u0648\\u0628\\u0633\\u0628\\u0628 \\u0627\\u062f\\u0639\\u0627\\u0621\\u0627\\u062a \\u0648\\u0627\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0639\\u0645\\u0644 \\u060c \\u0633\\u064a\\u062d\\u062f\\u062b \\u0641\\u064a \\u0643\\u062b\\u064a\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0623\\u062d\\u064a\\u0627\\u0646 \\u0623\\u0646\\u0647 \\u064a\\u062c\\u0628 \\u0646\\u0628\\u0630 \\u0627\\u0644\\u0645\\u0644\\u0630\\u0627\\u062a \\u0648\\u0642\\u0628\\u0648\\u0644 \\u0627\\u0644\\u0625\\u0632\\u0639\\u0627\\u062c.<\\/span><span style=\\\"text-align: var(--bs-body-text-align); font-weight: normal;\\\">\\u062a\\u0641\\u0627\\u062f\\u064a \\u0627\\u0644\\u0622\\u0644\\u0627\\u0645 \\u0627\\u0644\\u0633\\u064a\\u0626\\u0629.<\\/span><span style=\\\"text-align: var(--bs-body-text-align); font-size: 0.9375rem; font-weight: normal;\\\">\\u0641\\u064a \\u0633\\u0627\\u0639\\u0629 \\u0645\\u062c\\u0627\\u0646\\u064a\\u0629 \\u060c \\u0639\\u0646\\u062f\\u0645\\u0627 \\u062a\\u0643\\u0648\\u0646 \\u0642\\u062f\\u0631\\u062a\\u0646\\u0627 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0627\\u062e\\u062a\\u064a\\u0627\\u0631 \\u063a\\u064a\\u0631 \\u0645\\u0642\\u064a\\u062f\\u0629 \\u0648\\u0639\\u0646\\u062f\\u0645\\u0627 \\u0644\\u0627 \\u0634\\u064a\\u0621 \\u064a\\u0645\\u0646\\u0639\\u0646\\u0627 \\u0645\\u0646 \\u0627\\u0644\\u0642\\u064a\\u0627\\u0645 \\u0628\\u0645\\u0627 \\u0646\\u0641\\u0636\\u0644\\u0647 \\u060c \\u064a\\u062c\\u0628 \\u0627\\u0644\\u062a\\u0631\\u062d\\u064a\\u0628 \\u0628\\u0643\\u0644 \\u0645\\u062a\\u0639\\u0629 \\u0648\\u062a\\u062c\\u0646\\u0628 \\u0643\\u0644 \\u0623\\u0644\\u0645. \\u0648\\u0644\\u0643\\u0646 \\u0641\\u064a \\u0638\\u0631\\u0648\\u0641 \\u0645\\u0639\\u064a\\u0646\\u0629 \\u0648\\u0628\\u0633\\u0628\\u0628 \\u0627\\u062f\\u0639\\u0627\\u0621\\u0627\\u062a \\u0648\\u0627\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0639\\u0645\\u0644 \\u060c \\u0633\\u064a\\u062d\\u062f\\u062b \\u0641\\u064a \\u0643\\u062b\\u064a\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0623\\u062d\\u064a\\u0627\\u0646 \\u0623\\u0646\\u0647 \\u064a\\u062c\\u0628 \\u0646\\u0628\\u0630 \\u0627\\u0644\\u0645\\u0644\\u0630\\u0627\\u062a \\u0648\\u0642\\u0628\\u0648\\u0644 \\u0627\\u0644\\u0625\\u0632\\u0639\\u0627\\u062c.<\\/span><\\/p>\",\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\About\\AboutUs', '2022-08-02 10:45:34', '2022-08-06 06:22:09');
INSERT INTO `page_builders` (`id`, `addon_name`, `addon_type`, `addon_location`, `addon_order`, `addon_page_id`, `addon_page_type`, `addon_settings`, `addon_namespace`, `created_at`, `updated_at`) VALUES
(10, 'CountArea', 'update', 'dynamic_page', 2, 5, 'dynamic_page', '{\"id\":\"10\",\"addon_name\":\"CountArea\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQWJvdXRcQ291bnRBcmVh\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"2\",\"addon_page_id\":\"5\",\"addon_page_type\":\"dynamic_page\",\"about_us_count_down_repeater\":{\"repeater_number_en_GB\":[\"38\",\"1300\",\"20\",\"22\"],\"repeater_title_en_GB\":[\"Years in the industry\",\"Employees working\",\"Active registered users\",\"Active registered users\"],\"repeater_symbol_en_GB\":[\"+\",\"+\",\"k\",\"+\"],\"repeater_number_ar\":[\"4.05\",\"23\",\"30\",\"32\"],\"repeater_title_ar\":[\"\\u0633\\u0646\\u0648\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0635\\u0646\\u0627\\u0639\\u0629\",\"\\u0633\\u0646\\u0648\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0635\\u0646\\u0627\\u0639\\u0629\",\"\\u0633\\u0646\\u0648\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0635\\u0646\\u0627\\u0639\\u0629\",\"\\u0633\\u0646\\u0648\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u0635\\u0646\\u0627\\u0639\\u0629\"],\"repeater_symbol_ar\":[\"+\",\"+\",\"k\",\"+\"]},\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\About\\CountArea', '2022-08-02 12:43:42', '2022-08-03 04:43:53'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'TeamMemberOne', 'update', 'dynamic_page', 3, 5, 'dynamic_page', '{\"id\":\"12\",\"addon_name\":\"TeamMemberOne\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXFRlYW1NZW1iZXJPbmU=\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"3\",\"addon_page_id\":\"5\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Expert Team {h}Members{\\/h}\",\"title_ar\":\"\\u0623\\u0639\\u0636\\u0627\\u0621 \\u0641\\u0631\\u064a\\u0642 \\u0627\\u0644\\u062e\\u0628\\u0631\\u0627\\u0621\",\"team_member_repeater\":{\"repeater_name_en_GB\":[\"Marvin McKinney\",\"Kristin Watson\",\"Jane Cooper\",\"Ronald Richards\"],\"repeater_designation_en_GB\":[\"CEO\",\"Kristin Watson\",\"UI\\/UX Designer\",\"Content Writer\"],\"repeater_facebook_url_en_GB\":[\"#\",\"#\",\"#\",\"#\"],\"repeater_twitter_url_en_GB\":[\"#\",\"#\",\"#\",\"#\"],\"repeater_instagram_url_en_GB\":[\"#\",\"#\",\"#\",\"#\"],\"repeater_image_en_GB\":[\"46\",\"45\",\"44\",\"43\"],\"repeater_name_ar\":[\"\\u0645\\u0627\\u0631\\u0641\\u0646 \\u0645\\u0627\\u0643\\u064a\\u0646\\u064a\",\"\\u0645\\u0627\\u0631\\u0641\\u0646 \\u0645\\u0627\\u0643\\u064a\\u0646\\u064a\",\"\\u0645\\u0627\\u0631\\u0641\\u0646 \\u0645\\u0627\\u0643\\u064a\\u0646\\u064a\",\"\\u0645\\u0627\\u0631\\u0641\\u0646 \\u0645\\u0627\\u0643\\u064a\\u0646\\u064a\"],\"repeater_designation_ar\":[\"\\u0627\\u0644\\u0645\\u062f\\u064a\\u0631 \\u0627\\u0644\\u062a\\u0646\\u0641\\u064a\\u0630\\u064a\",\"\\u0627\\u0644\\u0645\\u062f\\u064a\\u0631 \\u0627\\u0644\\u062a\\u0646\\u0641\\u064a\\u0630\\u064a\",\"\\u0627\\u0644\\u0645\\u062f\\u064a\\u0631 \\u0627\\u0644\\u062a\\u0646\\u0641\\u064a\\u0630\\u064a\",\"\\u0627\\u0644\\u0645\\u062f\\u064a\\u0631 \\u0627\\u0644\\u062a\\u0646\\u0641\\u064a\\u0630\\u064a\"],\"repeater_facebook_url_ar\":[\"#\",\"#\",\"#\",\"#\"],\"repeater_twitter_url_ar\":[\"#\",\"#\",\"#\",\"#\"],\"repeater_instagram_url_ar\":[\"#\",\"#\",\"#\",\"#\"],\"repeater_image_ar\":[\"46\",\"45\",\"44\",null]},\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\TeamMemberOne', '2022-08-03 05:05:17', '2022-08-04 06:34:35'),
(13, 'TemplateDesign', 'update', 'dynamic_page', 1, 15, 'dynamic_page', '{\"id\":\"13\",\"addon_name\":\"TemplateDesign\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXFRlbXBsYXRlRGVzaWdu\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"1\",\"addon_page_id\":\"15\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Explore our {h}templates{\\/h}\",\"right_text_en_GB\":\"Explore More\",\"right_text_url_en_GB\":\"#\",\"bottom_text_en_GB\":\"Live Preview\",\"title_ar\":\"\\u0627\\u0633\\u062a\\u0643\\u0634\\u0641 \\u0642\\u0648\\u0627\\u0644\\u0628\\u0646\\u0627\",\"right_text_ar\":\"\\u0627\\u0633\\u062a\\u0643\\u0634\\u0627\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f\",\"right_text_url_ar\":\"#\",\"bottom_text_ar\":\"\\u0645\\u0639\\u0627\\u064a\\u0646\\u0629 \\u0645\\u0628\\u0627\\u0634\\u0631\\u0629\",\"order_by\":\"id\",\"order\":\"asc\",\"item_show\":\"6\",\"padding_top\":\"110\",\"padding_bottom\":\"110\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\TemplateDesign', '2022-08-03 06:48:52', '2022-08-03 06:50:54'),
(14, 'PricePlan', 'update', 'dynamic_page', 1, 7, 'dynamic_page', '{\"id\":\"14\",\"addon_name\":\"PricePlan\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXFByaWNlUGxhbg==\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"1\",\"addon_page_id\":\"7\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Our Pricing {h}Plan{\\/h}\",\"button_text_en_GB\":\"Buy Now\",\"trial_text_en_GB\":\"Try Now\",\"title_ar\":\"\\u062e\\u0637\\u0629 \\u0627\\u0644\\u0623\\u0633\\u0639\\u0627\\u0631 \\u0644\\u062f\\u064a\\u0646\\u0627\",\"button_text_ar\":\"\\u0627\\u0634\\u062a\\u0631\\u064a \\u0627\\u0644\\u0622\\u0646\",\"trial_text_ar\":\"\\u062c\\u0631\\u0628 \\u0627\\u0644\\u0622\\u0646\",\"order_by\":\"id\",\"order\":\"asc\",\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\PricePlan', '2022-08-03 06:58:16', '2022-08-04 08:00:22'),
(15, 'ContactCards', 'update', 'dynamic_page', 1, 12, 'dynamic_page', '{\"id\":\"15\",\"addon_name\":\"ContactCards\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXENvbnRhY3RDYXJkcw==\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"1\",\"addon_page_id\":\"12\",\"addon_page_type\":\"dynamic_page\",\"contact_repeater\":{\"repeater_title_en_GB\":[\"Call Us\",\"Location\",\"Email\"],\"repeater_info_en_GB\":[\"+881515001050\\r\\n+018714515811\",\"Darussalam, Mirpur\\r\\nDhaka-1216\",\"test@gmail.com\\r\\ncontact@gmail.com\"],\"repeater_image_en_GB\":[\"50\",\"48\",\"49\"],\"repeater_title_ar\":[\"\\u0627\\u062a\\u0635\\u0644 \\u0628\\u0646\\u0627\",\"\\u0645\\u0648\\u0642\\u0639\",\"\\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\"],\"repeater_info_ar\":[\"+881515001050\\r\\n+018714515811\",\"Darussalam, Mirpur\\r\\nDhaka-1216\",\"test@gmail.com\\r\\ncontact@gmail.com\"],\"repeater_image_ar\":[\"50\",\"48\",\"49\"]},\"padding_top\":\"0\",\"padding_bottom\":\"0\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\ContactCards', '2022-08-03 07:24:27', '2022-08-03 07:39:40'),
(16, 'ContactArea', 'update', 'dynamic_page', 2, 12, 'dynamic_page', '{\"id\":\"16\",\"addon_name\":\"ContactArea\",\"addon_namespace\":\"UGx1Z2luc1xQYWdlQnVpbGRlclxBZGRvbnNcTGFuZGxvcmRcQ29tbW9uXENvbnRhY3RBcmVh\",\"addon_type\":\"update\",\"addon_location\":\"dynamic_page\",\"addon_order\":\"2\",\"addon_page_id\":\"12\",\"addon_page_type\":\"dynamic_page\",\"title_en_GB\":\"Sent us message\",\"title_ar\":\"\\u0623\\u0631\\u0633\\u0644 \\u0644\\u0646\\u0627 \\u0631\\u0633\\u0627\\u0644\\u0629\",\"custom_form_id\":\"1\",\"location\":\"Dhaka,Bangladesh\",\"map_height\":\"720\",\"padding_top\":\"0\",\"padding_bottom\":\"100\"}', 'Plugins\\PageBuilder\\Addons\\Landlord\\Common\\ContactArea', '2022-08-03 12:06:31', '2022-08-04 04:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `test_mode` tinyint(1) NOT NULL DEFAULT '0',
  `credentials` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `name`, `image`, `description`, `status`, `test_mode`, `credentials`, `created_at`, `updated_at`) VALUES
(1, 'paypal', '75', 'if your currency is not available in paypal, it will convert you currency value to USD value based on your currency exchange rate.', 1, 1, '{\"sandbox_client_id\":\"AUP7AuZMwJbkee-2OmsSZrU-ID1XUJYE-YB-2JOrxeKV-q9ZJZYmsr-UoKuJn4kwyCv5ak26lrZyb-gb\",\"sandbox_client_secret\":\"EEIxCuVnbgING9EyzcF2q-gpacLneVbngQtJ1mbx-42Lbq-6Uf6PEjgzF7HEayNsI4IFmB9_CZkECc3y\",\"sandbox_app_id\":null,\"live_client_id\":null,\"live_client_secret\":null,\"live_app_id\":null}', '2022-04-17 01:54:18', '2022-08-09 09:39:10'),
(2, 'paytm', '76', 'if your currency is not available in paytm, it will convert you currency value to INR value based on your currency exchange rate.', 1, 1, '{\"merchant_key\":\"dv0XtmsPYpewNag&\",\"merchant_mid\":\"Digita57697814558795\",\"merchant_website\":\"WEBSTAGING\",\"channel\":null,\"industry_type\":null}', '2022-04-17 01:54:18', '2022-08-09 09:39:10'),
(3, 'stripe', '78', '', 1, 1, '{\"public_key\":\"pk_test_51GwS1SEmGOuJLTMsIeYKFtfAT3o3Fc6IOC7wyFmmxA2FIFQ3ZigJ2z1s4ZOweKQKlhaQr1blTH9y6HR2PMjtq1Rx00vqE8LO0x\",\"secret_key\":\"sk_test_51GwS1SEmGOuJLTMs2vhSliTwAGkOt4fKJMBrxzTXeCJoLrRu8HFf4I0C5QuyE3l3bQHBJm3c0qFmeVjd0V9nFb6Z00VrWDJ9Uw\"}', '2022-04-17 01:54:18', '2022-08-09 09:39:10'),
(4, 'razorpay', '77', 'if your currency is not available in Razorpay, it will convert you currency value to INR value based on your currency exchange rate.', 1, 1, '{\"api_key\":\"rzp_test_SXk7LZqsBPpAkj\",\"api_secret\":\"Nenvq0aYArtYBDOGgmMH7JNv\"}', '2022-04-17 01:54:18', '2022-08-09 09:39:10'),
(5, 'paystack', '74', 'if your currency is not available in Paystack, it will convert you currency value to NGN value based on your currency exchange rate.', 1, 1, '{\"public_key\":\"pk_test_0a2cea63c4a34691fae697fb8f6b72a856e96e12\",\"secret_key\":\"sk_test_bfb4d04c41f8bcfa9fb6dac84eeb6ea54e1a93b4\",\"merchant_email\":\"testxgenious@gmail.com\"}', '2022-04-17 01:54:18', '2022-08-09 09:39:10'),
(6, 'mollie', '79', 'if your currency is not available in mollie, it will convert you currency value to USD value based on your currency exchange rate.', 1, 1, '{\"public_key\":\"test_fVk76gNbAp6ryrtRjfAVvzjxSHxC2v\"}', '2022-04-17 01:54:18', '2022-08-09 09:39:10'),
(8, 'midtrans', '82', '', 1, 1, '{\"merchant_id\":\"G770543580\",\"server_key\":\"SB-Mid-server-9z5jztsHyYxEdSs7DgkNg2on\",\"client_key\":\"SB-Mid-client-iDuy-jKdZHkLjL_I\"}', '2022-04-17 01:54:18', '2022-08-09 09:39:10'),
(10, 'cashfree', '85', '', 1, 1, '{\"app_id\":\"94527832f47d6e74fa6ca5e3c72549\",\"secret_key\":\"ec6a3222018c676e95436b2e26e89c1ec6be2830\"}', '2022-04-17 01:54:18', '2022-08-09 09:39:10'),
(11, 'instamojo', '83', '', 1, 1, '{\"client_id\":\"test_nhpJ3RvWObd3uryoIYF0gjKby5NB5xu6S9Z\",\"client_secret\":\"test_iZusG4P35maQVPTfqutbCc6UEbba3iesbCbrYM7zOtDaJUdbPz76QOnBcDgblC53YBEgsymqn2sx3NVEPbl3b5coA3uLqV1ikxKquOeXSWr8Ruy7eaKUMX1yBbm\",\"username\":null,\"password\":null}', '2022-04-17 01:54:18', '2022-08-09 09:39:10'),
(12, 'marcadopago', '84', '', 1, 1, '{\"client_id\":\"TEST-0a3cc78a-57bf-4556-9dbe-2afa06347769\",\"client_secret\":\"TEST-4644184554273630-070813-7d817e2ca1576e75884001d0755f8a7a-786499991\"}', '2022-04-17 01:54:18', '2022-08-09 09:39:10'),
(13, 'zitopay', '86', '', 1, 1, '{\"username\":\"Suzon\"}', '2022-07-26 06:34:58', '2022-08-09 09:39:10'),
(14, 'squareup', '87', '', 1, 1, '{\"location_id\":\"LE9C12TNM5HAS\",\"access_token\":\"EAAAEOuLQObrVwJvCvoio3H13b8Ssqz1ighmTBKZvIENW9qxirHGHkqsGcPBC1uN\"}', '2022-07-26 06:34:58', '2022-08-09 09:39:10'),
(15, 'cinetpay', '89', '', 1, 1, '{\"apiKey\":\"12912847765bc0db748fdd44.40081707\",\"site_id\":\"445160\"}', '2022-07-26 06:34:58', '2022-08-09 09:39:10'),
(16, 'paytabs', '90', '', 1, 1, '{\"profile_id\":\"96698\",\"region\":\"GLOBAL\",\"server_key\":\"SKJNDNRHM2-JDKTZDDH2N-H9HLMJNJ2L\"}', '2022-07-26 06:34:58', '2022-08-09 09:39:10'),
(17, 'billplz', '91', '', 1, 1, '{\"key\":\"b2ead199-e6f3-4420-ae5c-c94f1b1e8ed6\",\"version\":\"v4\",\"x_signature\":\"S-HDXHxRJB-J7rNtoktZkKJg\",\"collection_name\":\"kjj5ya006\"}', '2022-07-26 06:34:58', '2022-08-09 09:39:10'),
(18, 'manual_payment', '88', '', 1, 1, '{\"name\":\"Manual Payment\",\"description\":\"ss\"}', '2022-04-17 01:54:18', '2022-08-09 09:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_gateway` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tenant_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` longtext COLLATE utf8mb4_unicode_ci,
  `attachments` longtext COLLATE utf8mb4_unicode_ci,
  `custom_fields` longtext COLLATE utf8mb4_unicode_ci,
  `track` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `renew_status` int(11) DEFAULT NULL,
  `is_renew` bigint(20) DEFAULT NULL,
  `manual_payment_attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(58, 'form-submission', 'admin', NULL, NULL),
(334, 'package-order-delete', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(335, 'package-order-edit', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(352, 'blog-settings', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(353, 'blog-comments', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(354, 'service-category-list', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(355, 'service-category-create', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(356, 'service-category-edit', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(357, 'service-category-delete', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(358, 'service-list', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(359, 'service-create', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(360, 'service-edit', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(361, 'service-delete', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(362, 'service-settings', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(363, 'service-comments', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(386, 'menu-manage', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(387, 'topbar-manage', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(388, 'other-settings', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(389, 'newsletter-list', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(390, 'newsletter-create', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(391, 'newsletter-edit', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(392, 'newsletter-delete', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(393, 'support-ticket-list', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(394, 'support-ticket-create', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(395, 'support-ticket-edit', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(396, 'support-ticket-delete', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(397, 'support-ticket-department-list', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(398, 'support-ticket-department-create', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(399, 'support-ticket-department-edit', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(400, 'support-ticket-department-delete', 'admin', '2022-07-17 06:54:46', '2022-07-17 06:54:46'),
(457, 'page-list', 'admin', '2022-12-06 14:14:12', '2022-12-06 14:14:12'),
(458, 'page-create', 'admin', '2022-12-06 14:14:12', '2022-12-06 14:14:12'),
(459, 'page-edit', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(460, 'page-delete', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(461, 'price-plan-list', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(462, 'price-plan-create', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(463, 'price-plan-edit', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(464, 'price-plan-delete', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(465, 'package-order-all-order', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(466, 'package-order-pending-order', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(467, 'package-order-progress-order', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(468, 'package-order-complete-order', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(469, 'package-order-success-order-page', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(470, 'package-order-cancel-order-page', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(471, 'package-order-order-page-manage', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(472, 'package-order-order-report', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(473, 'package-order-payment-logs', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(474, 'package-order-payment-report', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(475, 'testimonial-list', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(476, 'testimonial-create', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(477, 'testimonial-edit', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(478, 'testimonial-delete', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(479, 'brand-list', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(480, 'brand-create', 'admin', '2022-12-06 14:14:13', '2022-12-06 14:14:13'),
(481, 'brand-edit', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(482, 'brand-delete', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(483, 'blog-category-list', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(484, 'blog-category-create', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(485, 'blog-category-edit', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(486, 'blog-category-delete', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(487, 'blog-list', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(488, 'blog-create', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(489, 'blog-edit', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(490, 'blog-delete', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(491, 'form-builder', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(492, 'widget-builder', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(493, 'general-settings-page-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(494, 'general-settings-global-navbar-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(495, 'general-settings-global-footer-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(496, 'general-settings-site-identity', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(497, 'general-settings-basic-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(498, 'general-settings-color-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(499, 'general-settings-typography-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(500, 'general-settings-seo-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(501, 'general-settings-payment-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(502, 'general-settings-third-party-script-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(503, 'general-settings-smtp-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(504, 'general-settings-custom-css-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(505, 'general-settings-custom-js-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(506, 'general-settings-database-upgrade-settings', 'admin', '2022-12-06 14:14:14', '2022-12-06 14:14:14'),
(507, 'general-settings-cache-clear-settings', 'admin', '2022-12-06 14:14:15', '2022-12-06 14:14:15'),
(508, 'general-settings-license-settings', 'admin', '2022-12-06 14:14:15', '2022-12-06 14:14:15'),
(509, 'language-list', 'admin', '2022-12-06 14:14:15', '2022-12-06 14:14:15'),
(510, 'language-create', 'admin', '2022-12-06 14:14:15', '2022-12-06 14:14:15'),
(511, 'language-edit', 'admin', '2022-12-06 14:14:15', '2022-12-06 14:14:15'),
(512, 'language-delete', 'admin', '2022-12-06 14:14:15', '2022-12-06 14:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_features`
--

CREATE TABLE `plan_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) NOT NULL,
  `feature_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_features`
--

INSERT INTO `plan_features` (`id`, `plan_id`, `feature_name`, `status`, `created_at`, `updated_at`) VALUES
(489, 2, 'admin', 0, '2022-08-02 05:52:38', '2022-08-02 05:52:38'),
(490, 2, 'user', 0, '2022-08-02 05:52:38', '2022-08-02 05:52:38'),
(491, 2, 'custom_domain', 0, '2022-08-02 05:52:38', '2022-08-02 05:52:38'),
(492, 2, 'page', 0, '2022-08-02 05:52:38', '2022-08-02 05:52:38'),
(493, 2, 'blog', 0, '2022-08-02 05:52:38', '2022-08-02 05:52:38'),
(494, 2, 'job', 0, '2022-08-02 05:52:38', '2022-08-02 05:52:38'),
(495, 2, 'product', 0, '2022-08-02 05:52:38', '2022-08-02 05:52:38'),
(1087, 3, 'dashboard', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1088, 3, 'admin', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1089, 3, 'user', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1090, 3, 'brand', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1091, 3, 'custom_domain', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1092, 3, 'testimonial', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1093, 3, 'form_builder', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1094, 3, 'own_order_manage', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1095, 3, 'appearance_settings', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1096, 3, 'general_settings', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1097, 3, 'language', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1098, 3, 'page', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1099, 3, 'blog', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1100, 3, 'service', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1101, 3, 'donation', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1102, 3, 'job', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1103, 3, 'event', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1104, 3, 'support_ticket', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1105, 3, 'product', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1106, 3, 'knowledgebase', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1107, 3, 'faq', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1108, 3, 'gallery', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1109, 3, 'video', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1110, 3, 'portfolio', 0, '2022-11-02 03:07:17', '2022-11-02 03:07:17'),
(1210, 5, 'admin', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1211, 5, 'user', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1212, 5, 'brand', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1213, 5, 'custom_domain', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1214, 5, 'testimonial', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1215, 5, 'form_builder', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1216, 5, 'appearance_settings', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1217, 5, 'general_settings', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1218, 5, 'page', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1219, 5, 'blog', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1220, 5, 'service', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1221, 5, 'donation', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1222, 5, 'job', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1223, 5, 'event', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1224, 5, 'support_ticket', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1225, 5, 'product', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1226, 5, 'knowledgebase', 0, '2022-11-22 23:08:50', '2022-11-22 23:08:50'),
(1227, 6, 'dashboard', 0, '2022-11-22 23:09:19', '2022-11-22 23:09:19'),
(1228, 6, 'admin', 0, '2022-11-22 23:09:19', '2022-11-22 23:09:19'),
(1229, 6, 'user', 0, '2022-11-22 23:09:19', '2022-11-22 23:09:19'),
(1230, 6, 'brand', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1231, 6, 'custom_domain', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1232, 6, 'testimonial', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1233, 6, 'form_builder', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1234, 6, 'own_order_manage', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1235, 6, 'appearance_settings', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1236, 6, 'general_settings', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1237, 6, 'language', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1238, 6, 'page', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1239, 6, 'blog', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1240, 6, 'service', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1241, 6, 'donation', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1242, 6, 'job', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1243, 6, 'event', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1244, 6, 'support_ticket', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1245, 6, 'product', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1246, 6, 'knowledgebase', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1247, 6, 'faq', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1248, 6, 'gallery', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1249, 6, 'video', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1250, 6, 'portfolio', 0, '2022-11-22 23:09:20', '2022-11-22 23:09:20'),
(1251, 8, 'admin', 0, '2022-11-22 23:09:42', '2022-11-22 23:09:42'),
(1252, 8, 'user', 0, '2022-11-22 23:09:42', '2022-11-22 23:09:42'),
(1253, 8, 'brand', 0, '2022-11-22 23:09:42', '2022-11-22 23:09:42'),
(1254, 8, 'custom_domain', 0, '2022-11-22 23:09:42', '2022-11-22 23:09:42'),
(1255, 8, 'testimonial', 0, '2022-11-22 23:09:42', '2022-11-22 23:09:42'),
(1256, 8, 'form_builder', 0, '2022-11-22 23:09:42', '2022-11-22 23:09:42'),
(1257, 8, 'page', 0, '2022-11-22 23:09:42', '2022-11-22 23:09:42'),
(1258, 8, 'blog', 0, '2022-11-22 23:09:42', '2022-11-22 23:09:42'),
(1259, 7, 'dashboard', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1260, 7, 'admin', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1261, 7, 'user', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1262, 7, 'brand', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1263, 7, 'custom_domain', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1264, 7, 'testimonial', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1265, 7, 'form_builder', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1266, 7, 'own_order_manage', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1267, 7, 'appearance_settings', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1268, 7, 'general_settings', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1269, 7, 'language', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1270, 7, 'page', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1271, 7, 'blog', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1272, 7, 'service', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1273, 7, 'donation', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1274, 7, 'job', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1275, 7, 'event', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1276, 7, 'support_ticket', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1277, 7, 'product', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1278, 7, 'knowledgebase', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1279, 7, 'faq', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1280, 7, 'gallery', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1281, 7, 'video', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1282, 7, 'portfolio', 0, '2022-11-22 23:10:03', '2022-11-22 23:10:03'),
(1283, 9, 'admin', 0, '2022-11-22 23:10:20', '2022-11-22 23:10:20'),
(1284, 9, 'user', 0, '2022-11-22 23:10:20', '2022-11-22 23:10:20'),
(1285, 9, 'brand', 0, '2022-11-22 23:10:20', '2022-11-22 23:10:20'),
(1286, 9, 'custom_domain', 0, '2022-11-22 23:10:20', '2022-11-22 23:10:20'),
(1287, 9, 'testimonial', 0, '2022-11-22 23:10:20', '2022-11-22 23:10:20'),
(1288, 9, 'form_builder', 0, '2022-11-22 23:10:20', '2022-11-22 23:10:20'),
(1289, 9, 'page', 0, '2022-11-22 23:10:20', '2022-11-22 23:10:20'),
(1290, 9, 'blog', 0, '2022-11-22 23:10:20', '2022-11-22 23:10:20'),
(1291, 9, 'service', 0, '2022-11-22 23:10:20', '2022-11-22 23:10:20'),
(1307, 4, 'dashboard', 0, '2022-11-22 23:11:03', '2022-11-22 23:11:03'),
(1308, 4, 'admin', 0, '2022-11-22 23:11:03', '2022-11-22 23:11:03'),
(1309, 4, 'user', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1310, 4, 'brand', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1311, 4, 'custom_domain', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1312, 4, 'testimonial', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1313, 4, 'form_builder', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1314, 4, 'appearance_settings', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1315, 4, 'general_settings', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1316, 4, 'page', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1317, 4, 'blog', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1318, 4, 'service', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1319, 4, 'donation', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1320, 4, 'job', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1321, 4, 'event', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1322, 4, 'knowledgebase', 0, '2022-11-22 23:11:06', '2022-11-22 23:11:06'),
(1384, 1, 'admin', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1385, 1, 'user', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1386, 1, 'brand', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1387, 1, 'custom_domain', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1388, 1, 'testimonial', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1389, 1, 'form_builder', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1390, 1, 'appearance_settings', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1391, 1, 'general_settings', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1392, 1, 'page', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1393, 1, 'blog', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1394, 1, 'service', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1395, 1, 'donation', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1396, 1, 'job', 0, '2022-12-18 07:15:37', '2022-12-18 07:15:37'),
(1397, 1, 'event', 0, '2022-12-18 07:15:38', '2022-12-18 07:15:38'),
(1398, 1, 'knowledgebase', 0, '2022-12-18 07:15:38', '2022-12-18 07:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `design` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typography` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `download` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_plans`
--

CREATE TABLE `price_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` longtext COLLATE utf8mb4_unicode_ci,
  `type` bigint(20) UNSIGNED DEFAULT NULL,
  `status` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `price` double NOT NULL,
  `faq` longtext COLLATE utf8mb4_unicode_ci,
  `blog_permission_feature` int(11) DEFAULT NULL,
  `product_permission_feature` int(11) DEFAULT NULL,
  `page_permission_feature` int(11) DEFAULT NULL,
  `has_trial` tinyint(1) NOT NULL DEFAULT '0',
  `trial_days` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_permission_feature` int(11) DEFAULT NULL,
  `donation_permission_feature` int(11) DEFAULT NULL,
  `job_permission_feature` int(11) DEFAULT NULL,
  `event_permission_feature` int(11) DEFAULT NULL,
  `knowledgebase_permission_feature` int(11) DEFAULT NULL,
  `portfolio_permission_feature` int(11) DEFAULT NULL,
  `product_create_permission` int(11) DEFAULT NULL,
  `product_simple_search_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_advance_search_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_duplication_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_bulk_delete_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inventory_product_update_permission` int(11) DEFAULT NULL,
  `inventory_simple_search_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inventory_advance_search_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_create_permission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_plans`
--

INSERT INTO `price_plans` (`id`, `title`, `subtitle`, `type`, `status`, `price`, `faq`, `blog_permission_feature`, `product_permission_feature`, `page_permission_feature`, `has_trial`, `trial_days`, `created_at`, `updated_at`, `service_permission_feature`, `donation_permission_feature`, `job_permission_feature`, `event_permission_feature`, `knowledgebase_permission_feature`, `portfolio_permission_feature`, `product_create_permission`, `product_simple_search_permission`, `product_advance_search_permission`, `product_duplication_permission`, `product_bulk_delete_permission`, `inventory_product_update_permission`, `inventory_simple_search_permission`, `inventory_advance_search_permission`, `campaign_create_permission`) VALUES
(1, '{\"en_GB\":\"Basic Monthly\",\"ar\":\"\\u0645\\u062f\\u0649 \\u0627\\u0644\\u062d\\u064a\\u0627\\u0629 \\u0627\\u0644\\u0623\\u0633\\u0627\\u0633\\u064a\"}', '{\"en_GB\":\"You can easily create your website by Pica. We will provide all type of digital service for you.\",\"ar\":\"\\u064a\\u0645\\u0643\\u0646\\u0643 \\u0628\\u0633\\u0647\\u0648\\u0644\\u0629 \\u0625\\u0646\\u0634\\u0627\\u0621 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u0639\\u0646 \\u0637\\u0631\\u064a\\u0642 Pica. \\u0633\\u0648\\u0641 \\u0646\\u0642\\u062f\\u0645 \\u0644\\u0643 \\u062c\\u0645\\u064a\\u0639 \\u0623\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0631\\u0642\\u0645\\u064a\\u0629.\"}', 0, 1, 50, 'a:2:{s:5:\"title\";a:3:{i:0;s:9:\"Good Plan\";i:1;s:10:\"Basic Plan\";i:2;s:11:\"Simple Plan\";}s:11:\"description\";a:3:{i:0;s:179:\"In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.\";i:1;s:179:\"In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.\";i:2;s:179:\"In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.\";}}', 20, 16, 20, 1, 10, '2022-07-06 10:16:18', '2022-12-18 07:15:37', 10, 20, 30, 14, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '{\"en_GB\":\"Basic Lifetime\",\"ar\":\"\\u0645\\u062f\\u0649 \\u0627\\u0644\\u062d\\u064a\\u0627\\u0629 \\u0627\\u0644\\u0623\\u0633\\u0627\\u0633\\u064a\"}', '{\"en_GB\":\"You can easily create your website by Pica. We will provide all type of digital service for you.\",\"ar\":\"\\u064a\\u0645\\u0643\\u0646\\u0643 \\u0628\\u0633\\u0647\\u0648\\u0644\\u0629 \\u0625\\u0646\\u0634\\u0627\\u0621 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u0639\\u0646 \\u0637\\u0631\\u064a\\u0642 Pica. \\u0633\\u0648\\u0641 \\u0646\\u0642\\u062f\\u0645 \\u0644\\u0643 \\u062c\\u0645\\u064a\\u0639 \\u0623\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0631\\u0642\\u0645\\u064a\\u0629.\"}', 2, 1, 100, 'a:2:{s:5:\"title\";a:1:{i:0;s:9:\"Good Plan\";}s:11:\"description\";a:1:{i:0;s:27:\"Good PlanGood PlanGood Plan\";}}', 25, 25, 25, 1, 30, '2022-07-06 10:17:55', '2022-08-02 05:52:38', NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '{\"en_GB\":\"Standard Monthly\",\"ar\":\"\\u0642\\u064a\\u0627\\u0633\\u064a \\u0634\\u0647\\u0631\\u064a\"}', '{\"en_GB\":\"You can easily create your website by Pica. We will provide all type of digital service for you.\",\"ar\":\"\\u0642\\u064a\\u0627\\u0633\\u064a \\u0634\\u0647\\u0631\\u064a\"}', 0, 1, 120, 'a:2:{s:5:\"title\";a:1:{i:0;N;}s:11:\"description\";a:1:{i:0;N;}}', 20, 20, 20, 0, NULL, '2022-07-06 11:08:15', '2022-11-02 02:56:34', 20, 20, NULL, 20, 20, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '{\"en_GB\":\"Basic Yearly\",\"ar\":\"\\u0623\\u0633\\u0627\\u0633\\u064a \\u0633\\u0646\\u0648\\u064a\"}', '{\"en_GB\":\"You can easily create your website by Pica. We will provide all type of digital service for you.\",\"ar\":\"\\u064a\\u0645\\u0643\\u0646\\u0643 \\u0628\\u0633\\u0647\\u0648\\u0644\\u0629 \\u0625\\u0646\\u0634\\u0627\\u0621 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u0639\\u0646 \\u0637\\u0631\\u064a\\u0642 Pica. \\u0633\\u0648\\u0641 \\u0646\\u0642\\u062f\\u0645 \\u0644\\u0643 \\u062c\\u0645\\u064a\\u0639 \\u0623\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0631\\u0642\\u0645\\u064a\\u0629.\"}', 1, 1, 70, 'a:2:{s:5:\"title\";a:1:{i:0;N;}s:11:\"description\";a:1:{i:0;N;}}', 10, 10, 25, 0, NULL, '2022-08-01 05:59:33', '2022-11-22 23:11:03', 15, 20, 20, 20, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '{\"en_GB\":\"Standard Yearly\",\"ar\":\"\\u0642\\u064a\\u0627\\u0633\\u064a \\u0633\\u0646\\u0648\\u064a\"}', '{\"en_GB\":\"You can easily create your website by Pica. We will provide all type of digital service for you.\",\"ar\":\"\\u0642\\u064a\\u0627\\u0633\\u064a \\u0633\\u0646\\u0648\\u064a\"}', 1, 1, 150, 'a:2:{s:5:\"title\";a:1:{i:0;N;}s:11:\"description\";a:1:{i:0;N;}}', 30, 30, 30, 0, NULL, '2022-08-01 06:00:08', '2022-11-22 23:08:50', 12, 13, 14, 15, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '{\"en_GB\":\"Standard Lifetime\",\"ar\":\"\\u0645\\u062f\\u0649 \\u0627\\u0644\\u062d\\u064a\\u0627\\u0629 \\u0627\\u0644\\u0642\\u064a\\u0627\\u0633\\u064a\"}', '{\"en_GB\":\"You can easily create your website by Pica. We will provide all type of digital service for you.\",\"ar\":\"\\u064a\\u0645\\u0643\\u0646\\u0643 \\u0628\\u0633\\u0647\\u0648\\u0644\\u0629 \\u0625\\u0646\\u0634\\u0627\\u0621 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u0639\\u0646 \\u0637\\u0631\\u064a\\u0642 Pica. \\u0633\\u0648\\u0641 \\u0646\\u0642\\u062f\\u0645 \\u0644\\u0643 \\u062c\\u0645\\u064a\\u0639 \\u0623\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0631\\u0642\\u0645\\u064a\\u0629.\"}', 2, 1, 200, 'a:2:{s:5:\"title\";a:1:{i:0;N;}s:11:\"description\";a:1:{i:0;N;}}', 20, NULL, 20, 0, NULL, '2022-08-01 06:00:32', '2022-11-22 23:09:19', 20, 20, NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '{\"en_GB\":\"Premium Monthly\",\"ar\":\"\\u0642\\u0633\\u0637 \\u0634\\u0647\\u0631\\u064a\"}', '{\"en_GB\":\"You can easily create your website by Pica. We will provide all type of digital service for you.\",\"ar\":\"\\u064a\\u0645\\u0643\\u0646\\u0643 \\u0628\\u0633\\u0647\\u0648\\u0644\\u0629 \\u0625\\u0646\\u0634\\u0627\\u0621 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u0639\\u0646 \\u0637\\u0631\\u064a\\u0642 Pica. \\u0633\\u0648\\u0641 \\u0646\\u0642\\u062f\\u0645 \\u0644\\u0643 \\u062c\\u0645\\u064a\\u0639 \\u0623\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0631\\u0642\\u0645\\u064a\\u0629.\"}', 0, 1, 220, 'a:2:{s:5:\"title\";a:1:{i:0;N;}s:11:\"description\";a:1:{i:0;N;}}', 20, NULL, 20, 0, NULL, '2022-08-01 06:10:24', '2022-11-22 23:10:02', 20, 20, 20, 20, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '{\"en_GB\":\"Premium Yearly\",\"ar\":\"\\u0642\\u0633\\u0637 \\u0633\\u0646\\u0648\\u064a\"}', '{\"en_GB\":\"You can easily create your website by Pica. We will provide all type of digital service for you.\",\"ar\":\"\\u064a\\u0645\\u0643\\u0646\\u0643 \\u0628\\u0633\\u0647\\u0648\\u0644\\u0629 \\u0625\\u0646\\u0634\\u0627\\u0621 \\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0648\\u064a\\u0628 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643 \\u0639\\u0646 \\u0637\\u0631\\u064a\\u0642 Pica. \\u0633\\u0648\\u0641 \\u0646\\u0642\\u062f\\u0645 \\u0644\\u0643 \\u062c\\u0645\\u064a\\u0639 \\u0623\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0631\\u0642\\u0645\\u064a\\u0629.\"}', 1, 1, 300, 'a:2:{s:5:\"title\";a:1:{i:0;N;}s:11:\"description\";a:1:{i:0;N;}}', 20, 20, 20, 0, NULL, '2022-08-01 06:10:55', '2022-11-22 23:09:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '{\"en_GB\":\"Premium Lifetime\",\"ar\":\"\\u0642\\u0633\\u0637 \\u0645\\u062f\\u0649 \\u0627\\u0644\\u062d\\u064a\\u0627\\u0629\"}', '{\"en_GB\":\"You can easily create your website by Pica. We will provide all type of digital service for you.\",\"ar\":\"\\u0642\\u064a\\u0627\\u0633\\u064a \\u0633\\u0646\\u0648\\u064a\"}', 2, 1, 400, 'a:2:{s:5:\"title\";a:1:{i:0;N;}s:11:\"description\";a:1:{i:0;N;}}', 20, NULL, 20, 0, NULL, '2022-08-01 06:11:25', '2022-11-22 23:10:20', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', '2022-04-20 21:35:00', '2022-04-20 21:35:00'),
(2, 'Admin', 'admin', '2022-04-20 21:36:28', '2022-04-20 21:36:28'),
(3, 'Editor', 'admin', '2022-04-20 21:36:36', '2022-04-20 21:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `static_options`
--

CREATE TABLE `static_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_options`
--

INSERT INTO `static_options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'site_logo', '96', '2022-01-30 23:38:48', '2022-11-24 13:09:39'),
(2, 'site_white_logo', '206', '2022-01-30 23:38:48', '2022-07-04 09:59:55'),
(3, 'site_favicon', '97', '2022-01-30 23:38:48', '2022-11-24 13:11:20'),
(4, 'site_en_GB_title', 'Multisaas', '2022-02-02 00:54:56', '2022-11-24 00:14:07'),
(5, 'site_en_GB_tag_line', 'Build you website using our platform', '2022-02-02 00:54:56', '2022-02-02 00:54:56'),
(6, 'site_en_GB_footer_copyright_text', '{copy} {year} Multisaas. All Rights Reserved.', '2022-02-02 00:54:56', '2022-11-27 05:47:00'),
(7, 'site_bo_title', 'الأرض', '2022-02-02 00:54:56', '2022-03-06 01:24:50'),
(8, 'site_bo_tag_line', 'بناء موقع الويب الخاص بك باستخدام النظام الأساسي الخاص بك', '2022-02-02 00:54:56', '2022-03-06 01:24:50'),
(9, 'site_bo_footer_copyright_text', '{copy} {year} جميع الحقوق محفوظة بواسطة TenancyLand', '2022-02-02 00:54:56', '2022-03-06 01:24:50'),
(10, 'dark_mode_for_admin_panel', NULL, '2022-02-02 00:58:27', '2022-06-18 05:10:04'),
(11, 'maintenance_mode', NULL, '2022-02-02 00:58:27', '2022-11-24 06:05:40'),
(12, 'backend_preloader', NULL, '2022-02-02 00:58:27', '2022-02-02 00:58:27'),
(13, 'user_email_verify_status', 'on', '2022-02-02 00:58:27', '2022-06-18 12:06:14'),
(14, 'get_script_version', '1.0.1', '2022-02-02 01:29:18', '2022-12-09 10:33:24'),
(15, 'language_selector_status', 'on', '2022-02-02 03:25:58', '2022-08-04 06:31:41'),
(19, 'main_color_one', 'rgb(235, 97, 73)', '2022-02-02 05:55:27', '2022-07-28 12:13:45'),
(20, 'main_color_two', '82, 78, 183', '2022-02-02 05:55:27', '2022-07-28 12:12:50'),
(21, 'heading_color', 'rgb(51, 51, 51)', '2022-02-02 05:55:27', '2022-02-02 06:13:22'),
(22, 'secondary_color', 'rgb(247, 163, 169)', '2022-02-02 05:55:27', '2022-06-28 11:59:38'),
(23, 'paragraph_color', 'rgb(130, 130, 130)', '2022-02-02 05:55:27', '2022-02-02 06:13:22'),
(28, 'site_global_email', 'info@sohan.xgenious.com', '2022-02-07 01:31:24', '2022-11-15 06:52:16'),
(29, 'site_smtp_host', NULL, '2022-02-07 01:31:24', '2022-11-15 06:52:16'),
(30, 'site_smtp_username', NULL, '2022-02-07 01:31:24', '2022-11-15 06:52:16'),
(31, 'site_smtp_password', NULL, '2022-02-07 01:31:24', '2022-11-15 06:52:16'),
(32, 'site_smtp_port', '465', '2022-02-07 01:31:24', '2022-11-15 06:52:16'),
(33, 'site_smtp_encryption', 'ssl', '2022-02-07 01:31:24', '2022-11-15 07:01:44'),
(34, 'site_smtp_driver', 'smtp', '2022-02-07 01:31:24', '2022-02-07 01:31:24'),
(35, 'site_en_GB_meta_title', 'Pica', '2022-03-06 01:26:03', '2022-07-28 12:22:02'),
(36, 'site_en_GB_meta_tags', 'Pica', '2022-03-06 01:26:03', '2022-07-28 12:22:02'),
(37, 'site_en_GB_meta_keywords', 'Pica', '2022-03-06 01:26:03', '2022-07-28 12:22:02'),
(38, 'site_en_GB_meta_description', 'Pica', '2022-03-06 01:26:03', '2022-07-28 12:22:02'),
(39, 'site_en_GB_og_meta_title', 'Pica', '2022-03-06 01:26:03', '2022-07-28 12:22:02'),
(40, 'site_en_GB_og_meta_description', 'Pica', '2022-03-06 01:26:04', '2022-07-28 12:22:02'),
(41, 'site_en_GB_og_meta_image', '13', '2022-03-06 01:26:04', '2022-03-06 01:26:04'),
(42, 'site_bo_meta_title', 'الإيجار', '2022-03-06 01:26:04', '2022-03-06 01:26:33'),
(43, 'site_bo_meta_tags', 'الإيجار', '2022-03-06 01:26:04', '2022-03-06 01:26:33'),
(44, 'site_bo_meta_keywords', 'الإيجار', '2022-03-06 01:26:04', '2022-03-06 01:26:34'),
(45, 'site_bo_meta_description', 'الإيجار', '2022-03-06 01:26:04', '2022-03-06 01:26:34'),
(46, 'site_bo_og_meta_title', 'الإيجار', '2022-03-06 01:26:04', '2022-03-06 01:26:34'),
(47, 'site_bo_og_meta_description', 'الإيجار', '2022-03-06 01:26:04', '2022-03-06 01:26:34'),
(48, 'site_bo_og_meta_image', '13', '2022-03-06 01:26:04', '2022-03-06 01:26:34'),
(49, 'site_disqus_key', NULL, '2022-03-06 02:54:08', '2022-03-06 02:54:08'),
(50, 'site_google_analytics', '<!-- Global site tag (gtag.js) - Google Analytics -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-173946136-1\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'UA-173946136-1\');\r\n</script>', '2022-03-06 02:54:08', '2022-06-18 10:57:27'),
(51, 'tawk_api_key', NULL, '2022-03-06 02:54:08', '2022-08-10 06:04:06'),
(52, 'site_third_party_tracking_code', NULL, '2022-03-06 02:54:08', '2022-06-11 09:07:01'),
(53, 'site_google_captcha_v3_site_key', '6LdvUeQUAAAAAHKM02AWBjtKAAL0-AqUk_qkqa0O', '2022-03-06 02:54:08', '2022-06-18 10:52:54'),
(54, 'site_google_captcha_v3_secret_key', '6LdvUeQUAAAAABaCkkQbMY-z2XaqYsLSWwYgB6Ru', '2022-03-06 02:54:08', '2022-06-18 10:52:54'),
(55, 'enable_google_login', NULL, '2022-03-06 02:54:08', '2022-03-06 02:54:08'),
(56, 'google_client_id', '893494041014-n9uuk46qki3cjnvv87rcg6dkqdmhljjb.apps.googleusercontent.com', '2022-03-06 02:54:08', '2022-08-10 06:04:06'),
(57, 'google_client_secret', 'D5J14HZQjxefNuKKRuHPfF42', '2022-03-06 02:54:08', '2022-08-10 06:04:06'),
(58, 'enable_facebook_login', NULL, '2022-03-06 02:54:08', '2022-03-06 02:54:08'),
(59, 'facebook_client_id', '3036761189900664', '2022-03-06 02:54:08', '2022-11-12 06:41:23'),
(60, 'facebook_client_secret', '44bf0609130418ae3340457951dff804', '2022-03-06 02:54:08', '2022-08-10 06:04:06'),
(61, 'google_adsense_publisher_id', NULL, '2022-03-06 02:54:08', '2022-03-06 02:54:08'),
(62, 'google_adsense_customer_id', NULL, '2022-03-06 02:54:08', '2022-03-06 02:54:08'),
(63, 'enable_google_adsense', NULL, '2022-03-06 02:54:08', '2022-03-06 02:54:08'),
(64, 'instagram_access_token', NULL, '2022-03-06 02:54:08', '2022-03-06 02:54:08'),
(65, 'category_page_item_show', '3', '2022-03-16 05:07:51', '2022-03-16 05:08:10'),
(66, 'tag_page_item_show', '4', '2022-03-16 06:37:50', '2022-03-16 06:37:50'),
(67, 'search_page_item_show', '2', '2022-03-16 06:37:50', '2022-03-16 06:37:50'),
(71, 'home_page', '1', '2022-04-17 00:30:37', '2022-07-17 11:14:12'),
(72, 'site_global_currency', 'USD', '2022-04-17 02:07:21', '2022-04-17 02:07:21'),
(73, 'site_global_payment_gateway', NULL, '2022-04-17 02:07:21', '2022-04-17 02:07:21'),
(74, 'site_usd_to_ngn_exchange_rate', '415', '2022-04-17 02:07:21', '2022-08-09 04:10:19'),
(75, 'site_euro_to_ngn_exchange_rate', NULL, '2022-04-17 02:07:21', '2022-04-17 02:07:21'),
(76, 'site_currency_symbol_position', 'left', '2022-04-17 02:07:21', '2022-04-17 02:07:21'),
(77, 'site_default_payment_gateway', 'paytm', '2022-04-17 02:07:21', '2022-08-08 11:23:52'),
(78, 'site__to_idr_exchange_rate', '14365.30', '2022-04-17 02:07:21', '2022-04-17 02:07:21'),
(79, 'site__to_inr_exchange_rate', NULL, '2022-04-17 02:07:21', '2022-04-17 02:07:21'),
(80, 'site__to_ngn_exchange_rate', NULL, '2022-04-17 02:07:21', '2022-04-17 02:07:21'),
(81, 'site__to_zar_exchange_rate', '15.86', '2022-04-17 02:07:21', '2022-04-17 02:07:21'),
(82, 'site__to_brl_exchange_rate', NULL, '2022-04-17 02:07:21', '2022-04-17 02:07:21'),
(83, 'site_usd_to_idr_exchange_rate', '14365.30', '2022-04-17 02:10:34', '2022-04-17 02:10:34'),
(84, 'site_usd_to_inr_exchange_rate', '74', '2022-04-17 02:10:34', '2022-08-09 04:10:12'),
(85, 'site_usd_to_zar_exchange_rate', '385', '2022-04-17 02:10:34', '2022-04-17 02:10:34'),
(86, 'site_usd_to_brl_exchange_rate', '5.53', '2022-04-17 02:10:34', '2022-04-17 02:10:34'),
(87, 'site_order_success_page_en_GB_title', 'Thank you!', '2022-04-17 03:44:18', '2022-04-17 03:44:18'),
(88, 'site_order_success_page_en_GB_description', 'Your order has been placed successfully!', '2022-04-17 03:44:18', '2022-04-17 03:44:18'),
(91, 'order_page_en_GB_form_title', 'Order {h}Information{/h}', '2022-04-17 04:04:33', '2022-08-07 12:59:46'),
(93, 'order_form', '5', '2022-04-17 04:04:33', '2022-04-17 04:04:33'),
(94, 'topbar_twitter_url', '#', '2022-04-22 22:26:06', '2022-04-22 22:26:06'),
(95, 'topbar_linkedin_url', '#', '2022-04-22 22:26:06', '2022-04-22 22:26:06'),
(96, 'topbar_facebook_url', '#', '2022-04-22 22:26:06', '2022-04-22 22:26:06'),
(97, 'topbar_youtube_url', '#', '2022-04-22 22:26:06', '2022-04-22 22:26:06'),
(98, 'landlord_frontend_language_show_hide', 'on', '2022-04-22 22:26:06', '2022-04-22 22:50:11'),
(99, 'support_ticket_en_GB_login_notice', 'Login to create support ticket land', '2022-05-25 01:49:38', '2022-05-25 02:11:47'),
(100, 'support_ticket_en_GB_form_title', 'Create New Support Ticket', '2022-05-25 01:49:38', '2022-05-25 01:49:38'),
(101, 'support_ticket_en_GB_button_text', 'Submit Ticket', '2022-05-25 01:49:38', '2022-05-25 01:49:38'),
(102, 'support_ticket_en_GB_success_message', 'Thanks for contact us, we will reply soon', '2022-05-25 01:49:38', '2022-05-25 01:49:38'),
(107, 'guest_order_system_status', NULL, '2022-05-30 05:34:58', '2022-05-30 05:34:58'),
(108, 'timezone', 'Asia/Dhaka', '2022-05-30 05:36:32', '2022-05-30 05:36:46'),
(109, 'first_package_expire_notify_mail', '5', '2022-06-01 05:24:55', '2022-06-01 07:09:24'),
(110, 'second_package_expire_notify_mail', '2', '2022-06-01 05:24:56', '2022-06-01 05:36:19'),
(111, 'package_expire_notify_mail_days', '[\"3\"]', '2022-06-01 08:04:50', '2022-06-09 01:06:04'),
(112, 'site_ar_title', 'أرض الإيجار', '2022-06-08 08:45:11', '2022-06-18 05:09:51'),
(113, 'site_ar_tag_line', 'قم ببناء موقع الويب الخاص بك باستخدام منصتنا', '2022-06-08 08:45:11', '2022-06-18 05:09:51'),
(114, 'site_ar_footer_copyright_text', '{copy} {year} جميع الحقوق محفوظة بواسطة TenancyLand', '2022-06-08 08:45:11', '2022-06-18 05:09:51'),
(115, 'error_404_page_en_GB_subtitle', 'Opps page not found', '2022-06-08 09:17:33', '2022-06-08 09:17:33'),
(116, 'error_404_page_en_GB_button_text', 'Go Back', '2022-06-08 09:17:33', '2022-06-08 09:17:33'),
(117, 'error_image', '95', '2022-06-08 09:17:33', '2022-11-23 06:18:38'),
(118, 'error_404_page_ar_subtitle', NULL, '2022-06-08 09:17:33', '2022-06-08 09:17:33'),
(119, 'error_404_page_ar_button_text', NULL, '2022-06-08 09:17:33', '2022-06-08 09:17:33'),
(120, 'maintains_page_en_GB_title', 'We are on Scheduled Maintenance', '2022-06-08 09:50:14', '2022-06-08 09:50:14'),
(121, 'maintains_page_en_GB_description', 'Way off why half led have near bed. At engage simple father of period others except. \r\nMy giving do summer of though narrow marked at. Spring formal no county ye waited.', '2022-06-08 09:50:14', '2022-06-08 09:50:14'),
(122, 'maintains_page_ar_title', NULL, '2022-06-08 09:50:14', '2022-06-08 09:50:14'),
(123, 'maintains_page_ar_description', NULL, '2022-06-08 09:50:14', '2022-06-08 09:50:14'),
(124, 'maintenance_logo', '76', '2022-06-08 09:50:14', '2022-06-08 09:50:14'),
(125, 'maintenance_bg_image', '198', '2022-06-08 09:50:14', '2022-06-08 09:50:14'),
(126, 'mentenance_back_date', '2022-11-28 00:00', '2022-06-08 10:20:37', '2022-11-23 23:52:28'),
(127, 'site_smtp_mail_mailer', NULL, '2022-06-11 09:11:49', '2022-06-11 09:11:49'),
(128, 'site_smtp_mail_host', NULL, '2022-06-11 09:11:49', '2022-06-11 09:11:49'),
(129, 'site_smtp_mail_port', NULL, '2022-06-11 09:11:49', '2022-06-11 09:11:49'),
(130, 'site_smtp_mail_username', NULL, '2022-06-11 09:11:49', '2022-06-11 09:11:49'),
(131, 'site_smtp_mail_password', NULL, '2022-06-11 09:11:49', '2022-06-11 09:11:49'),
(132, 'site_smtp_mail_encryption', NULL, '2022-06-11 09:11:49', '2022-06-11 09:11:49'),
(133, 'gradient_one_color', NULL, '2022-06-11 09:12:30', '2022-06-11 09:12:30'),
(134, 'gradient_two_color', NULL, '2022-06-11 09:12:30', '2022-06-11 09:12:30'),
(135, 'custom_domain_settings_title', 'Read Before Sending Custom Domain Request', '2022-06-15 05:37:11', '2022-06-15 05:40:06'),
(136, 'custom_domain_settings_description', 'Before sending request for your custom domain, You need to add CNAME records (given in below table) in your custom domain from your domain registrar account (like - namecheap, godaddy etc...).\r\n CNAME records are needed to point your custom domain to our domain ( sassotest.xyz ), so that our website can show your website on your custom domain\r\n Different domain registrar (like - godaddy, namecheap etc...) has different interface for adding CNAME records. If you cannot find the place to add CNAME record in your domain registrar account, then please contact your domain registrar support, they will show you the place to add CNAME record for your custom domain. They can also help you with adding CNAME record for you.', '2022-06-15 05:37:11', '2022-06-15 05:40:06'),
(137, 'custom_domain_table_title', 'Add CNAME records (take data from below table) in your custom domain from your domain registrar panel:', '2022-06-15 05:37:11', '2022-06-15 05:40:06'),
(138, 'custom_domain_table_info_type_one', 'CNAME Record', '2022-06-15 05:37:11', '2022-06-15 05:46:06'),
(139, 'custom_domain_table_info_host_one', 'www', '2022-06-15 05:37:11', '2022-06-15 05:46:06'),
(140, 'custom_domain_table_info_value_one', 'tenancy.xyz', '2022-06-15 05:37:11', '2022-06-15 05:46:06'),
(141, 'custom_domain_table_info_ttl_one', 'Automatic', '2022-06-15 05:37:11', '2022-06-15 05:46:06'),
(142, 'custom_domain_table_info_type_two', 'CNAME Record', '2022-06-15 05:37:11', '2022-06-15 05:46:06'),
(143, 'custom_domain_table_info_host_two', '@', '2022-06-15 05:37:11', '2022-06-15 06:05:51'),
(144, 'custom_domain_table_info_value_two', 'tenancy.xyz', '2022-06-15 05:37:11', '2022-06-15 05:46:06'),
(145, 'custom_domain_table_info_ttl_two', 'Automatic', '2022-06-15 05:37:11', '2022-06-15 05:46:06'),
(146, 'custom_domain_settings_screem_show_image', '101', '2022-06-15 05:38:16', '2022-06-15 06:15:36'),
(147, 'body_font_family', 'Open Sans', '2022-06-18 06:50:15', '2022-07-28 12:19:23'),
(148, 'heading_font_family', 'Manrope', '2022-06-18 06:50:15', '2022-07-28 12:19:23'),
(149, 'heading_font', 'on', '2022-06-18 06:50:15', '2022-06-18 07:11:08'),
(150, 'body_font_variant', 'a:7:{i:0;s:5:\"0,200\";i:1;s:5:\"0,300\";i:2;s:5:\"0,400\";i:3;s:5:\"0,500\";i:4;s:5:\"0,600\";i:5;s:5:\"0,700\";i:6;s:5:\"0,800\";}', '2022-06-18 06:50:15', '2022-06-28 12:25:57'),
(151, 'heading_font_variant', 'a:6:{i:0;s:5:\"0,100\";i:1;s:5:\"0,300\";i:2;s:5:\"0,400\";i:3;s:5:\"0,500\";i:4;s:5:\"0,700\";i:5;s:5:\"0,900\";}', '2022-06-18 06:50:15', '2022-06-18 07:20:57'),
(152, 'site_ar_meta_title', 'أرض الإيجار', '2022-06-18 08:13:39', '2022-06-18 08:13:39'),
(153, 'site_ar_meta_tags', 'أرض الإيجار', '2022-06-18 08:13:39', '2022-06-18 08:13:39'),
(154, 'site_ar_meta_keywords', 'أرض الإيجار', '2022-06-18 08:13:39', '2022-06-18 08:13:39'),
(155, 'site_ar_meta_description', 'أرض الإيجار', '2022-06-18 08:13:39', '2022-06-18 08:13:39'),
(156, 'site_ar_og_meta_title', NULL, '2022-06-18 08:13:39', '2022-06-18 08:13:39'),
(157, 'site_ar_og_meta_description', NULL, '2022-06-18 08:13:39', '2022-06-18 08:13:39'),
(158, 'site_ar_og_meta_image', NULL, '2022-06-18 08:13:39', '2022-06-18 08:13:39'),
(159, 'account_remove_day_within_expiration', '5', '2022-06-22 09:48:40', '2022-06-22 09:57:18'),
(160, 'tenant_account_delete_notify_mail_days', '[\"5\"]', '2022-06-22 09:51:32', '2022-06-22 10:50:29'),
(161, 'main_color_three', '#599A8D', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(162, 'main_color_four', '#1E88E5', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(163, 'secondary_color_two', '#ffdcd2', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(164, 'section_bg_1', '#FFFBFB', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(165, 'section_bg_2', '#FFF6EE', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(166, 'section_bg_3', '#F4F8FB', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(167, 'section_bg_4', '#F2F3FB', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(168, 'section_bg_5', '#F9F5F2', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(169, 'section_bg_6', '#E5EFF8', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(170, 'body_color', '#666666', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(171, 'light_color', '#666666', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(172, 'extra_light_color', '#888888', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(173, 'review_color', '#FABE50', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(174, 'new_color', '#5AB27E', '2022-06-28 11:53:53', '2022-06-28 11:53:53'),
(177, 'pricing_plan', '7', '2022-07-17 10:46:18', '2022-07-17 11:12:03'),
(178, 'main_color_one_rgb', '216, 83, 58', '2022-07-28 12:12:50', '2022-07-28 12:12:50'),
(179, 'main_color_two_rba', NULL, '2022-07-28 12:12:50', '2022-07-28 12:12:50'),
(180, 'heading_color_rgb', '82, 78, 183', '2022-07-28 12:12:50', '2022-07-28 12:12:50'),
(181, 'bg_light_one', '#F5F9FE', '2022-07-28 12:12:50', '2022-07-28 12:12:50'),
(182, 'bg_light_two', '#FEF8F3', '2022-07-28 12:12:50', '2022-07-28 12:12:50'),
(183, 'bg_dark_one', '#040A1B', '2022-07-28 12:12:50', '2022-07-28 12:12:50'),
(184, 'bg_dark_two', '#22253F', '2022-07-28 12:12:50', '2022-07-28 12:12:50'),
(185, 'paragraph_color_two', '#475467', '2022-07-28 12:12:50', '2022-07-28 12:12:50'),
(186, 'paragraph_color_three', '#D0D5DD', '2022-07-28 12:12:50', '2022-07-28 12:12:50'),
(187, 'paragraph_color_four', '#344054', '2022-07-28 12:12:50', '2022-07-28 12:12:50'),
(188, 'topbar_phone', '0155411110', '2022-07-30 06:21:11', '2022-07-30 06:21:50'),
(189, 'topbar_email', 'example@example.com', '2022-07-30 06:21:11', '2022-11-25 09:05:43'),
(190, 'topbar_instagram_url', '#', '2022-07-30 06:21:11', '2022-11-25 09:05:43'),
(191, 'landlord_frontend_language_topbar_hide', NULL, '2022-07-30 06:21:11', '2022-07-30 06:21:11'),
(192, 'landlord_frontend_topbar_show_hide', 'on', '2022-07-30 06:22:11', '2022-07-30 06:22:11'),
(193, 'landlord_user_login_en_GB_title', 'Login in your {h}Account{/h}', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(194, 'landlord_user_register_en_GB_title', 'Register new {h}Account{/h}', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(195, 'landlord_user_register_feature_en_GB_title_one', 'Create your account', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(196, 'landlord_user_register_feature_en_GB_description_one', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem sit accusantium doloremqueau dantium, totam rem aperiam.', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(197, 'landlord_user_register_feature_en_GB_title_two', 'Easily Customized', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(198, 'landlord_user_register_feature_en_GB_description_two', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem sit accusantium doloremqueau dantium, totam rem aperiam.', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(199, 'landlord_user_register_feature_en_GB_title_three', 'Build for impact', '2022-08-06 07:09:46', '2022-08-06 07:26:54'),
(200, 'landlord_user_register_feature_en_GB_description_three', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem sit accusantium doloremqueau dantium, totam rem aperiam.', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(201, 'landlord_user_login_ar_title', 'تسجيل الدخول في {h} حسابك {/ h}', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(202, 'landlord_user_register_ar_title', 'تسجيل {h} حساب {/ h} جديد', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(203, 'landlord_user_register_feature_ar_title_one', 'أنشئ حسابك', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(204, 'landlord_user_register_feature_ar_description_one', 'هذا هو الخطأ الذي يحدث في كل مكان.', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(205, 'landlord_user_register_feature_ar_title_two', 'أنشئ حسابك', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(206, 'landlord_user_register_feature_ar_description_two', 'هذا هو الخطأ الذي يحدث في كل مكان.', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(207, 'landlord_user_register_feature_ar_title_three', 'أنشئ حسابك', '2022-08-06 07:09:46', '2022-08-06 07:27:03'),
(208, 'landlord_user_register_feature_ar_description_three', 'هذا هو الخطأ الذي يحدث في كل مكان.', '2022-08-06 07:09:46', '2022-08-06 07:25:09'),
(209, 'landlord_user_register_feature_image_one', '53', '2022-08-06 07:09:46', '2022-08-06 07:16:08'),
(210, 'landlord_user_register_feature_image_two', '51', '2022-08-06 07:09:46', '2022-08-06 07:16:08'),
(211, 'landlord_user_register_feature_image_three', '52', '2022-08-06 07:09:46', '2022-08-06 07:16:08'),
(212, 'landlord_frontend_login_facebook_show_hide', 'on', '2022-08-06 07:09:46', '2022-08-06 07:09:46'),
(213, 'landlord_frontend_login_google_show_hide', 'on', '2022-08-06 07:09:46', '2022-08-06 07:09:46'),
(214, 'landlord_frontend_register_feature_show_hide', NULL, '2022-08-06 07:09:46', '2022-08-06 09:55:17'),
(215, 'default_theme_set', '1', '2022-08-07 11:11:04', '2022-11-13 00:53:23'),
(216, 'order_page_ar_form_title', 'معلومات الطلب', '2022-08-07 12:59:26', '2022-08-07 12:59:26'),
(217, 'site_usd_to_myr_exchange_rate', '4.14', '2022-08-09 04:50:54', '2022-08-09 04:50:54'),
(218, 'social_facebook_status', 'on', '2022-11-12 06:11:26', '2022-11-12 06:20:26'),
(219, 'social_google_status', 'on', '2022-11-12 06:11:26', '2022-11-12 06:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `static_option_centrals`
--

CREATE TABLE `static_option_centrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci,
  `unique_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_option_centrals`
--

INSERT INTO `static_option_centrals` (`id`, `option_name`, `option_value`, `unique_key`, `created_at`, `updated_at`) VALUES
(1, 'custom_domain_settings_title', 'Read Before Sending Custom Domain Request', NULL, '2022-06-15 06:45:51', '2022-11-23 22:27:06'),
(2, 'custom_domain_settings_description', 'Before sending request for your custom domain, You need to add CNAME records (given in below table) in your custom domain from your domain registrar account (like - namecheap, godaddy etc...).\r\n CNAME records are needed to point your custom domain to our domain ( multipurposesass.com ), so that our website can show your website on your custom domain\r\n Different domain registrar (like - godaddy, namecheap etc...) has different interface for adding CNAME records. If you cannot find the place to add CNAME record in your domain registrar account, then please contact your domain registrar support, they will show you the place to add CNAME record for your custom domain. They can also help you with adding CNAME record for you.', NULL, '2022-06-15 06:45:51', '2022-11-25 02:05:50'),
(3, 'custom_domain_table_title', 'Add CNAME records (take data from below table) in your custom domain from your domain registrar panel:', NULL, '2022-06-15 06:45:51', '2022-11-23 22:27:44'),
(4, 'custom_domain_settings_screem_show_image', '101', NULL, '2022-06-15 06:45:51', '2022-06-15 06:45:51'),
(5, 'get_script_version', '1.0.2', 'f22f95ff-8354-40c7-9aa3-3435f7c58be0', '2022-12-23 16:37:46', '2022-12-23 16:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `support_departments`
--

CREATE TABLE `support_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `via` text COLLATE utf8mb4_unicode_ci,
  `operating_system` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket_messages`
--

CREATE TABLE `support_ticket_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `notify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `support_ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `theme_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `renew_status` int(11) DEFAULT '0',
  `is_renew` int(11) DEFAULT '0',
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_activity_log`
--

CREATE TABLE `tenant_activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_exceptions`
--

CREATE TABLE `tenant_exceptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `domain_create_status` tinyint(1) NOT NULL DEFAULT '1',
  `seen_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `description`, `image`, `status`, `created_at`, `updated_at`, `company`) VALUES
(3, '{\"en_GB\":\"Iona Dudley\",\"ar\":\"\\u062f\\u0627\\u0644\\u064a\\u0627 \\u0628\\u064a\\u062a\\u0631\\u0633\\u0646\"}', '{\"en_GB\":\"Police Officer\",\"ar\":\"\\u062f\\u0627\\u0644\\u064a\\u0627 \\u0628\\u064a\\u062a\\u0631\\u0633\\u0646\"}', '{\"en_GB\":\"Credibly actualize interoperable technology without prospective processes. Conveniently mesh team driven materials after ubiquitous schemas. Synergistically parallel task cross-media.\",\"ar\":\"\\u062a\\u062d\\u0642\\u0642 \\u0627\\u0644\\u0645\\u0635\\u062f\\u0627\\u0642\\u064a\\u0629 \\u0627\\u0644\\u062a\\u0643\\u0646\\u0648\\u0644\\u0648\\u062c\\u064a\\u0627 \\u0627\\u0644\\u0642\\u0627\\u0628\\u0644\\u0629 \\u0644\\u0644\\u062a\\u0634\\u063a\\u064a\\u0644 \\u0627\\u0644\\u0628\\u064a\\u0646\\u064a \\u062f\\u0648\\u0646 \\u0639\\u0645\\u0644\\u064a\\u0627\\u062a \\u0645\\u0633\\u062a\\u0642\\u0628\\u0644\\u064a\\u0629. \\u0645\\u0648\\u0627\\u062f \\u064a\\u0642\\u0648\\u062f\\u0647\\u0627 \\u0641\\u0631\\u064a\\u0642 \\u0634\\u0628\\u0643\\u064a \\u0645\\u0644\\u0627\\u0626\\u0645 \\u0628\\u0639\\u062f \\u0627\\u0644\\u0645\\u062e\\u0637\\u0637\\u0627\\u062a \\u0641\\u064a \\u0643\\u0644 \\u0645\\u0643\\u0627\\u0646. \\u0645\\u0647\\u0645\\u0629 \\u0645\\u062a\\u0648\\u0627\\u0632\\u064a\\u0629 \\u062a\\u0622\\u0632\\u0631\\u064a\\u064b\\u0627 \\u0639\\u0628\\u0631 \\u0627\\u0644\\u0648\\u0633\\u0627\\u0626\\u0637.\"}', '38', 1, '2022-03-08 01:33:40', '2022-08-01 04:57:45', '{\"en_GB\":\"saf\"}'),
(4, '{\"en_GB\":\"Brittany Hawkins\",\"ar\":\"\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u0639 \\u0641\\u0631\\u0627\\u0646\\u0633\\u064a\\u0633\"}', '{\"en_GB\":\"Service Executive\",\"ar\":\"\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u0639 \\u0641\\u0631\\u0627\\u0646\\u0633\\u064a\\u0633\"}', '{\"en_GB\":\"Credibly actualize interoperable technology without prospective processes. Conveniently mesh team driven materials after ubiquitous schemas. Synergistically parallel task cross-media.\",\"ar\":\"\\u062a\\u062d\\u0642\\u0642 \\u0627\\u0644\\u0645\\u0635\\u062f\\u0627\\u0642\\u064a\\u0629 \\u0627\\u0644\\u062a\\u0643\\u0646\\u0648\\u0644\\u0648\\u062c\\u064a\\u0627 \\u0627\\u0644\\u0642\\u0627\\u0628\\u0644\\u0629 \\u0644\\u0644\\u062a\\u0634\\u063a\\u064a\\u0644 \\u0627\\u0644\\u0628\\u064a\\u0646\\u064a \\u062f\\u0648\\u0646 \\u0639\\u0645\\u0644\\u064a\\u0627\\u062a \\u0645\\u0633\\u062a\\u0642\\u0628\\u0644\\u064a\\u0629. \\u0645\\u0648\\u0627\\u062f \\u064a\\u0642\\u0648\\u062f\\u0647\\u0627 \\u0641\\u0631\\u064a\\u0642 \\u0634\\u0628\\u0643\\u064a \\u0645\\u0644\\u0627\\u0626\\u0645 \\u0628\\u0639\\u062f \\u0627\\u0644\\u0645\\u062e\\u0637\\u0637\\u0627\\u062a \\u0641\\u064a \\u0643\\u0644 \\u0645\\u0643\\u0627\\u0646. \\u0645\\u0647\\u0645\\u0629 \\u0645\\u062a\\u0648\\u0627\\u0632\\u064a\\u0629 \\u062a\\u0622\\u0632\\u0631\\u064a\\u064b\\u0627 \\u0639\\u0628\\u0631 \\u0627\\u0644\\u0648\\u0633\\u0627\\u0626\\u0637.\"}', '38', 1, '2022-03-08 01:34:45', '2022-08-01 04:57:34', '{\"en_GB\":\"ss\"}'),
(12, '{\"en_GB\":\"Austin Hull\",\"ar\":\"\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u0639 \\u0641\\u0631\\u0627\\u0646\\u0633\\u064a\\u0633\"}', '{\"en_GB\":\"Web Developer\",\"ar\":\"\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u0639 \\u0641\\u0631\\u0627\\u0646\\u0633\\u064a\\u0633\"}', '{\"en_GB\":\"Credibly actualize interoperable technology without prospective processes. Conveniently mesh team driven materials after ubiquitous schemas. Synergistically parallel task cross-media.\",\"ar\":\"\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u0639 \\u0641\\u0631\\u0627\\u0646\\u0633\\u064a\\u0633\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u0639 \\u0641\\u0631\\u0627\\u0646\\u0633\\u064a\\u0633\"}', '38', 1, '2022-03-08 03:40:51', '2022-08-01 04:57:25', '{\"en_GB\":\"ff\"}'),
(13, '{\"en_GB\":\"Demo Tenant\",\"ar\":\"\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u0639 \\u0641\\u0631\\u0627\\u0646\\u0633\\u064a\\u0633\"}', '{\"en_GB\":\"Vel perferendis anim\",\"ar\":\"\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u0639 \\u0641\\u0631\\u0627\\u0646\\u0633\\u064a\\u0633\"}', '{\"en_GB\":\"Vel perferendis animVel perferendis anim\",\"ar\":\"\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u0639  \\u0641\\u0631\\u0627\\u0646\\u0633\\u064a\\u0633\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a \\u0639 \\u0641\\u0631\\u0627\\u0646\\u0633\\u064a\\u0633\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u0639 \\u0641\\u0631\\u0627\\u0646\\u0633\\u064a\\u0633\"}', '38', 1, '2022-03-21 23:06:35', '2022-08-01 04:56:47', '{\"en_GB\":\"fff\"}');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 is inactive, 1 is active',
  `is_premium` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `title`, `slug`, `description`, `status`, `is_premium`, `created_at`, `updated_at`, `image`, `url`, `unique_key`) VALUES
(1, '{\"ar\":\"- \\u0645\\u0648\\u0636\\u0648\\u0639 \\u0627\\u0644\\u062a\\u0628\\u0631\\u0639\",\"en_GB\":\"Donatz - Donation Theme\"}', 'theme-1', '{\"en\":\"This theme has a best design for perfume store\",\"en_US\":\"You can easily create your website by Pica. We will provide all type of digital service for you.\",\"ar\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u0648\\u0636\\u0648\\u0639 \\u0644\\u062f\\u064a\\u0647 \\u0623\\u0641\\u0636\\u0644 \\u062a\\u0635\\u0645\\u064a\\u0645 \\u0644\\u0645\\u062a\\u062c\\u0631 \\u0627\\u0644\\u0639\\u0637\\u0648\\u0631\",\"en_GB\":\"This theme has a best design for perfume store\"}', 1, 0, '2022-07-16 11:47:14', '2022-12-18 07:06:22', '34', 'https://donation.multipurposesass.com/', NULL),
(2, '{\"ar\":\"\\u0645\\u0648\\u0636\\u0648\\u0639 \\u0627\\u0644\\u0628\\u0627\\u062d\\u062b \\u0639\\u0646 \\u0648\\u0638\\u064a\\u0641\\u0629\",\"en_GB\":\"job Finder Theme\"}', 'theme-2', '{\"en\":\"This theme has a best design for clothing store\",\"en_US\":\"You can easily create your website by Pica. We will provide all type of digital service for you.\",\"ar\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u0648\\u0636\\u0648\\u0639 \\u0644\\u062f\\u064a\\u0647 \\u0623\\u0641\\u0636\\u0644 \\u062a\\u0635\\u0645\\u064a\\u0645 \\u0644\\u0645\\u062a\\u062c\\u0631 \\u0627\\u0644\\u0645\\u0644\\u0627\\u0628\\u0633\",\"en_GB\":\"This theme has a best design for clothing store\"}', 1, 0, '2022-07-16 11:47:14', '2022-11-23 23:23:33', '32', 'https://picajobfinder.xyz/', NULL),
(3, '{\"en_GB\":\"Evento - Events Theme\",\"ar\":\"\\u0645\\u0648\\u0636\\u0648\\u0639 \\u0627\\u0644\\u0623\\u062d\\u062f\\u0627\\u062b\"}', 'theme-3', '{\"en\":\"This theme has a best design for fashion shop\",\"en_US\":\"This theme has a best design for fashion shop\",\"ar\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u0648\\u0636\\u0648\\u0639 \\u0644\\u062f\\u064a\\u0647 \\u0623\\u0641\\u0636\\u0644 \\u062a\\u0635\\u0645\\u064a\\u0645 \\u0644\\u0645\\u062a\\u062c\\u0631 \\u0627\\u0644\\u0623\\u0632\\u064a\\u0627\\u0621\",\"en_GB\":\"This theme has a best design for fashion shop\"}', 1, 0, '2022-07-16 11:47:14', '2022-11-21 02:55:50', '36', 'https://events.multipurposesass.com', NULL),
(4, '{\"en_GB\":\"Elisa - Support Ticketing Theme\",\"ar\":\"\\u0625\\u0644\\u064a\\u0633\\u0627 - \\u0645\\u0648\\u0636\\u0648\\u0639 \\u062f\\u0639\\u0645 \\u0627\\u0644\\u062a\\u0630\\u0627\\u0643\\u0631\"}', 'theme-4', '{\"en\":\"This theme has a best design for fashion shop\",\"en_US\":\"This theme has a best design for fashion shop\",\"ar\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u0648\\u0636\\u0648\\u0639 \\u0644\\u062f\\u064a\\u0647 \\u0623\\u0641\\u0636\\u0644 \\u062a\\u0635\\u0645\\u064a\\u0645 \\u0644\\u0645\\u062a\\u062c\\u0631 \\u0627\\u0644\\u0623\\u0632\\u064a\\u0627\\u0621\",\"en_GB\":\"This theme has a best design for fashion shop\"}', 1, 0, NULL, '2022-11-20 06:51:40', '33', 'https://ticketing.multipurposesass.com/', NULL),
(6, '{\"en_GB\":\"Knowledge - Article listing Theme\",\"ar\":\"\\u0627\\u0644\\u0645\\u0639\\u0631\\u0641\\u0629 - \\u0645\\u0648\\u0636\\u0648\\u0639 \\u0642\\u0627\\u0626\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0627\\u062f\\u0629\"}', 'theme-6', '{\"en\":\"This theme has a best design for fashion shop\",\"en_US\":\"This theme has a best design for fashion shop\",\"ar\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u0648\\u0636\\u0648\\u0639 \\u0644\\u062f\\u064a\\u0647 \\u0623\\u0641\\u0636\\u0644 \\u062a\\u0635\\u0645\\u064a\\u0645 \\u0644\\u0645\\u062a\\u062c\\u0631 \\u0642\\u0627\\u0639\\u062f\\u0629 \\u0627\\u0644\\u0645\\u0639\\u0631\\u0641\\u0629\",\"en_GB\":\"This theme has a best design for fashion shop\"}', 1, 0, NULL, '2022-12-18 09:34:33', '35', 'https://article.multipurposesass.com/', NULL),
(7, '{\"en_GB\":\"erdias -Ecommcerce shop single vendor\",\"ar\":\"\\u0627\\u0644\\u0645\\u0639\\u0631\\u0641\\u0629 - \\u0645\\u0648\\u0636\\u0648\\u0639 \\u0642\\u0627\\u0626\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0627\\u062f\\u0629\"}', 'theme-5', '{\"en\":\"This theme has a best design for fashion shop\",\"en_US\":\"This theme has a best design for fashion shop\",\"ar\":\"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u0648\\u0636\\u0648\\u0639 \\u0644\\u062f\\u064a\\u0647 \\u0623\\u0641\\u0636\\u0644 \\u062a\\u0635\\u0645\\u064a\\u0645 \\u0644\\u0645\\u062a\\u062c\\u0631 \\u0642\\u0627\\u0639\\u062f\\u0629 \\u0627\\u0644\\u0645\\u0639\\u0631\\u0641\\u0629\",\"en_GB\":\"This theme has a best design for fashion shop\"}', 1, 0, NULL, '2022-11-23 04:31:07', '93', '#', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_subdomain` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `email_verify_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_id` text COLLATE utf8mb4_unicode_ci,
  `google_id` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `widget_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widget_order` int(11) DEFAULT NULL,
  `widget_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widget_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `widget_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `widget_area`, `widget_order`, `widget_location`, `widget_name`, `widget_content`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 'footer', 'AboutUsWidget', 'a:9:{s:2:\"id\";s:1:\"1\";s:11:\"widget_name\";s:13:\"AboutUsWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"1\";s:17:\"description_en_GB\";s:186:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.\";s:14:\"description_ar\";s:369:\"هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. الهدف من استخدام Lorem Ipsum هو أنه يحتوي على أكثر أو أقل.\";s:10:\"logo_image\";s:2:\"96\";s:25:\"footer_social_about_media\";a:2:{s:14:\"repeater_icon_\";a:4:{i:0;s:17:\"lab la-facebook-f\";i:1;s:14:\"lab la-twitter\";i:2;s:16:\"lab la-instagram\";i:3;s:14:\"lab la-youtube\";}s:18:\"repeater_icon_url_\";a:4:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";}}}', '2022-03-15 23:34:23', '2022-12-06 14:13:27'),
(5, NULL, 76, 'sidebar', 'BlogSearchWidget', 'a:6:{s:11:\"widget_name\";s:16:\"BlogSearchWidget\";s:11:\"widget_type\";s:3:\"new\";s:15:\"widget_location\";s:7:\"sidebar\";s:12:\"widget_order\";s:2:\"39\";s:18:\"widget_title_en_GB\";N;s:15:\"widget_title_ar\";N;}', '2022-03-22 04:22:51', '2022-12-06 14:13:34'),
(6, NULL, 40, 'sidebar', 'BlogCategoryWidget', 'a:7:{s:11:\"widget_name\";s:18:\"BlogCategoryWidget\";s:11:\"widget_type\";s:3:\"new\";s:15:\"widget_location\";s:7:\"sidebar\";s:12:\"widget_order\";s:2:\"40\";s:18:\"widget_title_en_GB\";s:8:\"Category\";s:15:\"widget_title_ar\";s:6:\"فئة\";s:14:\"category_items\";s:1:\"5\";}', '2022-03-22 04:33:18', '2022-03-22 04:33:18'),
(7, NULL, 41, 'sidebar', 'RecentBlogPostWidget', 'a:7:{s:11:\"widget_name\";s:20:\"RecentBlogPostWidget\";s:11:\"widget_type\";s:3:\"new\";s:15:\"widget_location\";s:7:\"sidebar\";s:12:\"widget_order\";s:2:\"41\";s:18:\"heading_text_en_GB\";s:5:\"Blogs\";s:15:\"heading_text_ar\";s:16:\"المدونات\";s:10:\"blog_items\";s:1:\"3\";}', '2022-03-22 04:33:41', '2022-03-22 04:33:41'),
(8, NULL, 3, 'footer', 'CustomPageWithLinkWidget', 'a:8:{s:2:\"id\";s:1:\"8\";s:11:\"widget_name\";s:24:\"CustomPageWithLinkWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"2\";s:11:\"title_en_GB\";s:9:\"Community\";s:8:\"title_ar\";s:25:\"تواصل اجتماعي\";s:28:\"footer_custom_page_with_link\";a:4:{s:20:\"repeater_title_en_GB\";a:6:{i:0;s:5:\"About\";i:1;s:9:\"Templates\";i:2;s:5:\"Press\";i:3;s:3:\"Faq\";i:4;s:14:\"Privacy Policy\";i:5;s:15:\"Terms Condition\";}s:24:\"repeater_title_url_en_GB\";a:6:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";i:4;s:1:\"#\";i:5;s:1:\"#\";}s:17:\"repeater_title_ar\";a:6:{i:0;s:14:\"المنتدى\";i:1;s:14:\"المنتدى\";i:2;s:14:\"المنتدى\";i:3;s:14:\"المنتدى\";i:4;s:14:\"المنتدى\";i:5;s:14:\"المنتدى\";}s:21:\"repeater_title_url_ar\";a:6:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";i:4;s:1:\"#\";i:5;s:1:\"#\";}}}', '2022-05-26 06:06:26', '2022-12-06 14:13:27'),
(9, NULL, 4, 'footer', 'CustomPageWithLinkWidget', 'a:8:{s:2:\"id\";s:1:\"9\";s:11:\"widget_name\";s:24:\"CustomPageWithLinkWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"3\";s:11:\"title_en_GB\";s:13:\"Our Templates\";s:8:\"title_ar\";s:18:\"محتوياتنا\";s:28:\"footer_custom_page_with_link\";a:4:{s:20:\"repeater_title_en_GB\";a:6:{i:0;s:8:\"Donation\";i:1;s:8:\"Job Post\";i:2;s:6:\"Events\";i:3;s:13:\"Suppor Ticket\";i:4;s:9:\"Ecommerce\";i:5;s:13:\"Knowledgebase\";}s:24:\"repeater_title_url_en_GB\";a:6:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";i:4;s:1:\"#\";i:5;s:1:\"#\";}s:17:\"repeater_title_ar\";a:6:{i:0;s:25:\"النموذج الأول\";i:1;s:25:\"النموذج الأول\";i:2;s:25:\"النموذج الأول\";i:3;s:25:\"النموذج الأول\";i:4;s:25:\"النموذج الأول\";i:5;s:25:\"النموذج الأول\";}s:21:\"repeater_title_url_ar\";a:6:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";i:4;s:1:\"#\";i:5;s:1:\"#\";}}}', '2022-05-26 06:26:21', '2022-12-06 14:13:27'),
(10, NULL, 5, 'footer', 'ContactInfoWidget', 'a:8:{s:2:\"id\";s:2:\"10\";s:11:\"widget_name\";s:17:\"ContactInfoWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"4\";s:11:\"title_en_GB\";s:12:\"Contact Info\";s:8:\"title_ar\";s:29:\"معلومات الاتصال\";s:28:\"footer_contact_info_landlord\";a:2:{s:15:\"repeater_title_\";a:3:{i:0;s:26:\"41/1, Hilton Mall, NY City\";i:1;s:13:\"+012-78901234\";i:2;s:19:\"example@example.com\";}s:14:\"repeater_icon_\";a:3:{i:0;s:21:\"las la-map-marker-alt\";i:1;s:17:\"las la-mobile-alt\";i:2;s:15:\"las la-envelope\";}}}', '2022-05-26 06:48:23', '2022-12-06 14:13:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_domains`
--
ALTER TABLE `custom_domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `domains_domain_unique` (`domain`),
  ADD KEY `domains_tenant_id_foreign` (`tenant_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `form_builders`
--
ALTER TABLE `form_builders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_payment_logs`
--
ALTER TABLE `job_payment_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_payment_logs_job_id_foreign` (`job_id`),
  ADD KEY `job_payment_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `knowledgebases`
--
ALTER TABLE `knowledgebases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledgebase_categories`
--
ALTER TABLE `knowledgebase_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_uploaders`
--
ALTER TABLE `media_uploaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_infos`
--
ALTER TABLE `meta_infos`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `page_builders`
--
ALTER TABLE `page_builders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plan_features`
--
ALTER TABLE `plan_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_plans`
--
ALTER TABLE `price_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_options`
--
ALTER TABLE `static_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `static_options_option_name_index` (`option_name`);

--
-- Indexes for table `static_option_centrals`
--
ALTER TABLE `static_option_centrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_departments`
--
ALTER TABLE `support_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_ticket_messages`
--
ALTER TABLE `support_ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant_activity_log`
--
ALTER TABLE `tenant_activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `tenant_activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `tenant_exceptions`
--
ALTER TABLE `tenant_exceptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_domains`
--
ALTER TABLE `custom_domains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_builders`
--
ALTER TABLE `form_builders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_payment_logs`
--
ALTER TABLE `job_payment_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `knowledgebases`
--
ALTER TABLE `knowledgebases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `knowledgebase_categories`
--
ALTER TABLE `knowledgebase_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `media_uploaders`
--
ALTER TABLE `media_uploaders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meta_infos`
--
ALTER TABLE `meta_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `page_builders`
--
ALTER TABLE `page_builders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `payment_logs`
--
ALTER TABLE `payment_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan_features`
--
ALTER TABLE `plan_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1399;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_plans`
--
ALTER TABLE `price_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `static_options`
--
ALTER TABLE `static_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `static_option_centrals`
--
ALTER TABLE `static_option_centrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `support_departments`
--
ALTER TABLE `support_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_ticket_messages`
--
ALTER TABLE `support_ticket_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_activity_log`
--
ALTER TABLE `tenant_activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_exceptions`
--
ALTER TABLE `tenant_exceptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domains`
--
ALTER TABLE `domains`
  ADD CONSTRAINT `domains_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_payment_logs`
--
ALTER TABLE `job_payment_logs`
  ADD CONSTRAINT `job_payment_logs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_payment_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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

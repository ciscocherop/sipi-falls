-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2026 at 04:40 PM
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
-- Database: `sipi-falls`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `whatsapp_message` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `name`, `type`, `description`, `location`, `image`, `website_url`, `whatsapp_number`, `whatsapp_message`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Sipi Valley Resort', 'Resort', 'Stunning views of Sipi Falls with modern amenities and warm Ugandan hospitality.', 'Sipi, Kapchorwa', 'images/gallery/falls/waterfall-rainbow.jpg', NULL, NULL, 'Hi, I\'d like to know more about Sipi Valley Resort', 1, '2026-03-15 10:46:51', '2026-03-15 10:46:51'),
(2, 'Rafiki Lodge', 'Lodge', 'A cozy lodge nestled in the hills offering breathtaking valley views and local cuisine.', 'Sipi, Kapchorwa', 'images/gallery/mountain/sunset-friends.jpg', NULL, NULL, 'Hi, I\'d like to know more about Rafiki Lodge', 1, '2026-03-15 10:46:51', '2026-03-15 10:46:51'),
(3, 'Noahs Ark Hotel', 'Hotel', 'Comfortable hotel accommodation with easy access to all Sipi Falls activities.', 'Kapchorwa Town', 'images/gallery/falls/waterfall-double.jpg', NULL, NULL, 'Hi, I\'d like to know more about Noahs Ark Hotel', 1, '2026-03-15 10:46:51', '2026-03-15 10:46:51'),
(4, 'Moses Campsite', 'Campsite', 'Budget friendly camping experience right at the heart of Sipi Falls with stunning night skies.', 'Sipi, Kapchorwa', 'images/gallery/mountain/sunset-toast.jpg', NULL, NULL, 'Hi, I\'d like to know more about Moses Campsite', 1, '2026-03-15 10:46:51', '2026-03-15 10:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `activity_reactions`
--

CREATE TABLE `activity_reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_key` varchar(255) NOT NULL,
  `emoji` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_reactions`
--

INSERT INTO `activity_reactions` (`id`, `activity_key`, `emoji`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 'travelguide_activity_4', 'thumbs_up', 'yI4uy4Qnx0KxFNyB6FBYJ2FLoWUUcHARvyiY1b1s', '2026-03-23 17:48:12', '2026-03-23 17:48:12'),
(2, 'travelguide_activity_4', 'fire', 'yI4uy4Qnx0KxFNyB6FBYJ2FLoWUUcHARvyiY1b1s', '2026-03-23 17:48:17', '2026-03-23 17:48:17'),
(4, 'travelguide_activity_6', 'love', 'yI4uy4Qnx0KxFNyB6FBYJ2FLoWUUcHARvyiY1b1s', '2026-03-23 17:48:33', '2026-03-23 17:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_travel` date NOT NULL,
  `num_adults` int(10) UNSIGNED NOT NULL,
  `num_children` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `preferred_activities` text NOT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `fullname`, `email`, `date_of_travel`, `num_adults`, `num_children`, `preferred_activities`, `budget`, `status`, `created_at`, `updated_at`) VALUES
(2, 'lian namubiri', 'lian2@gmail.com', '2026-03-12', 23, 2, 'abseiling', NULL, 'cancelled', '2026-03-11 20:37:53', '2026-03-20 23:05:09'),
(3, 'jose senkumba virus', 'josesenkumbavirus@gmail.com', '2026-03-10', 4, 0, 'hiking', NULL, 'pending', '2026-03-15 10:27:24', '2026-03-20 23:06:06'),
(4, 'last option', 'lastoption@gmail.com', '2026-03-17', 4, 0, 'hiking, rock-climbing', NULL, 'pending', '2026-03-23 18:38:45', '2026-03-23 18:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `first_name`, `last_name`, `email`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(3, 'ed', 'edc', 'siscocherop668@gmail.com', 'rfrcr', 'sdefredsa', 1, '2026-03-20 22:45:47', '2026-03-20 22:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_01_114752_create_contact_messages_table', 1),
(5, '2026_03_01_120741_create_newsletter_subscribers_table', 1),
(6, '2026_03_01_150722_create_bookings_table', 1),
(7, '2026_03_03_203428_add_timestamps_to_existing_tables', 1),
(8, '2026_03_05_003823_add_status_fields_to_tables', 1),
(9, '2026_03_05_004039_add_admin_role_to_users', 1),
(10, '2026_03_05_205830_create_site_contents_table', 2),
(11, '2026_03_05_211005_create_tour_guides_table', 3),
(12, '2026_03_05_211057_create_testimonials_table', 3),
(13, '2026_03_15_000001_create_accommodations_table', 4),
(14, '2026_03_19_000001_add_is_approved_to_testimonials_table', 5),
(15, '2026_03_19_142748_add_website_url_and_whatsapp_number_to_accommodations_table', 6),
(16, '2026_03_23_203819_create_activity_reactions_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('active','unsubscribed') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(3, 'ciscocherry6@gmail.com', 'active', '2026-03-10 08:26:44', '2026-03-10 08:26:44'),
(5, 'siscocherop668@gmail.com', 'active', '2026-03-10 13:20:35', '2026-03-10 13:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KlQqr7hJjtd2nrqiByv5IUCuBxpoduxjhZZCAGA0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2w5b25FaHVHeHBDamN5OWQ4RElVSnZTcTV4bE12blE4VkNacjZjNCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774426164),
('MYD6P0n3B5LvvCcY5zy3I3uM55P9xZRbONqBu3Wu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVZ3UVBRejMyb2pWZjRPd0FpQmZ5STdEdnRlZkdtOG9VcUp6eFJLUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1774426169),
('yI4uy4Qnx0KxFNyB6FBYJ2FLoWUUcHARvyiY1b1s', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWWEwMWN2S0t6QXl1dVU0TjlNU3RkdUNaZWVxcnBtRXMwWFdaY290cSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ub3RpZmljYXRpb25zIjtzOjU6InJvdXRlIjtzOjE5OiJhZG1pbi5ub3RpZmljYXRpb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1774303739),
('yRMIJbXttJ7xaRLTdPdhPz56tO66ZoMZ5XlGkyDs', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVDlYZFVodG51bW40cVd4eUxWU0VMTTJrZkVKYnpRUktXNDZ1RFlQcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ub3RpZmljYXRpb25zIjtzOjU6InJvdXRlIjtzOjE5OiJhZG1pbi5ub3RpZmljYXRpb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1774428007);

-- --------------------------------------------------------

--
-- Table structure for table `site_contents`
--

CREATE TABLE `site_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `page` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_contents`
--

INSERT INTO `site_contents` (`id`, `key`, `value`, `type`, `page`, `label`, `created_at`, `updated_at`) VALUES
(1, 'contact_phone', '+256 703558174', 'text', 'contact', 'Phone Number', '2026-03-05 18:00:12', '2026-03-10 00:09:27'),
(2, 'contact_email', 'ciscocherry6@gmail.com', 'email', 'contact', 'Email Address', '2026-03-05 18:00:12', '2026-03-10 00:09:27'),
(3, 'contact_address', 'Kapchorwa, Uganda', 'text', 'contact', 'Physical Address', '2026-03-05 18:00:12', '2026-03-10 00:09:27'),
(4, 'contact_hours', 'Monday - Sunday: 8:00 AM - 6:00 PM', 'text', 'contact', 'Business Hours', '2026-03-05 18:00:12', '2026-03-05 18:00:12'),
(5, 'about_title', 'About Sipi Falls', 'text', 'about', 'Page Title', '2026-03-05 18:00:12', '2026-03-05 18:00:12'),
(6, 'about_description', 'Sipi Falls is a series of three stunning waterfalls located in Eastern Uganda on the edge of Mount Elgon National Park. The falls are a breathtaking natural wonder, cascading down from heights of up to 100 meters.', 'textarea', 'about', 'Main Description', '2026-03-05 18:00:12', '2026-03-05 18:00:12'),
(7, 'guide_best_time', 'The best time to visit Sipi Falls is during the dry seasons (December to February and June to August) when the trails are less muddy and the weather is more predictable. But if your are lover of mud and rain then u can come at any time.', 'textarea', 'travelguide', 'Best Time to Visit', '2026-03-05 18:00:12', '2026-03-09 23:24:49'),
(8, 'guide_what_to_bring', 'Comfortable hiking shoes, rain jacket, sunscreen, insect repellent, camera, water bottle, and light snacks and food if you prefer.', 'textarea', 'travelguide', 'What to Bring', '2026-03-05 18:00:12', '2026-03-07 09:03:45'),
(9, 'guide_activities', 'Waterfall hiking, rock climbing, abseiling, coffee tours, bird watching, and cultural village visits.', 'textarea', 'travelguide', 'Available Activities', '2026-03-05 18:00:12', '2026-03-05 18:00:12'),
(10, 'home_guides_title', 'Our Expert Tour Guides', 'text', 'home', 'Tour Guides Section Title', '2026-03-05 18:16:23', '2026-03-05 18:16:23'),
(11, 'home_guides_description', 'Meet our experienced and friendly tour guides who will make your Sipi Falls adventure unforgettable.', 'textarea', 'home', 'Tour Guides Description', '2026-03-05 18:16:24', '2026-03-05 18:16:24'),
(12, 'home_testimonials_title', 'What Our Visitors Say', 'text', 'home', 'Testimonials Section Title', '2026-03-05 18:16:26', '2026-03-05 18:16:26'),
(13, 'home_testimonials_description', 'Hear from travelers who have experienced the magic of Sipi Falls.', 'textarea', 'home', 'Testimonials Description', '2026-03-05 18:16:27', '2026-03-05 18:16:27'),
(14, 'travelguide_when_to_visit', 'The best time to visit Sipi Falls is during the dry seasons — January to March and August to September. You\'ll enjoy clear views and safer trails!', 'textarea', 'travelguide', 'When to Visit', '2026-03-09 23:21:10', '2026-03-09 23:21:10'),
(15, 'travelguide_what_to_wear', 'Pack sturdy hiking shoes with good grip — Sipi\'s trails can be slippery! Don\'t forget a rain jacket for sudden showers.', 'textarea', 'travelguide', 'What to Wear', '2026-03-09 23:21:10', '2026-03-09 23:46:56'),
(16, 'travelguide_what_to_pack', 'Bring a reusable water bottle, sunscreen, insect repellent, and a small backpack for your hikes. A camera is a must for the views!', 'textarea', 'travelguide', 'What to Pack', '2026-03-09 23:21:10', '2026-03-09 23:21:10'),
(17, 'travelguide_getting_there', 'Sipi Falls is a 4.5-hour drive from Kampala. Hire a 4WD vehicle for the rugged roads, or book a local tour guide from Mbale.', 'textarea', 'travelguide', 'Getting There', '2026-03-09 23:21:11', '2026-03-09 23:21:11'),
(18, 'travelguide_where_to_stay', 'Choose from budget guesthouses or scenic lodges like Sipi River Lodge and top-class resorts. Book early during peak season for the best views!', 'textarea', 'travelguide', 'Where to Stay', '2026-03-09 23:21:11', '2026-03-09 23:21:11'),
(19, 'travelguide_stay_safe', 'Stick to marked trails, avoid hiking alone, and stay hydrated! The falls can be slippery — watch your step!', 'textarea', 'travelguide', 'Stay Safe', '2026-03-09 23:21:11', '2026-03-09 23:21:11'),
(20, 'travelguide_activity_1_title', 'Hiking the Waterfalls', 'text', 'travelguide', 'Activity 1 Title', '2026-03-09 23:21:11', '2026-03-09 23:21:11'),
(21, 'travelguide_activity_1_description', 'Explore scenic trails to all three waterfalls, with breathtaking views and lush landscapes. The beauty about hiking here is that you can choose your own pace and enjoy the serene environment.', 'textarea', 'travelguide', 'Activity 1 Description', '2026-03-09 23:21:11', '2026-03-09 23:21:11'),
(22, 'travelguide_activity_1_image', 'images/gallery/hiking/naturewalk.jpg', 'text', 'travelguide', 'Activity 1 Image', '2026-03-09 23:21:11', '2026-03-14 03:03:27'),
(23, 'travelguide_activity_2_title', 'Abseiling', 'text', 'travelguide', 'Activity 2 Title', '2026-03-09 23:21:11', '2026-03-09 23:21:11'),
(24, 'travelguide_activity_2_description', 'Descend a 100m cliff beside the main waterfall for an adrenaline rush with professional guides. Experience the thrill of abseiling while enjoying stunning views of the falls and surrounding landscape.', 'textarea', 'travelguide', 'Activity 2 Description', '2026-03-09 23:21:11', '2026-03-09 23:21:11'),
(25, 'travelguide_activity_2_image', 'images/gallery/adventure/abseil3.jpg', 'text', 'travelguide', 'Activity 2 Image', '2026-03-09 23:21:11', '2026-03-14 03:03:27'),
(26, 'travelguide_activity_3_title', 'Coffee Tours', 'text', 'travelguide', 'Activity 3 Title', '2026-03-09 23:21:11', '2026-03-09 23:21:11'),
(27, 'travelguide_activity_3_description', 'Visit local farms, learn about coffee growing, and taste freshly brewed Sipi coffee. Discover the rich coffee culture of the region and enjoy a unique experience with local farmers.', 'textarea', 'travelguide', 'Activity 3 Description', '2026-03-09 23:21:11', '2026-03-09 23:21:11'),
(28, 'travelguide_activity_3_image', 'images/gallery/coffee/cofi.jpg', 'text', 'travelguide', 'Activity 3 Image', '2026-03-09 23:21:11', '2026-03-15 06:43:03'),
(29, 'travelguide_activity_4_title', 'Mount Elgon Hiking', 'text', 'travelguide', 'Activity 4 Title', '2026-03-09 23:21:11', '2026-03-16 13:31:30'),
(30, 'travelguide_activity_4_description', 'A breathtaking 3-day trek through ancient forests to the peak of Mount Elgon  one of Africa\'s most rewarding wilderness adventures.', 'textarea', 'travelguide', 'Activity 4 Description', '2026-03-09 23:21:12', '2026-03-16 13:31:30'),
(31, 'travelguide_activity_4_image', 'images/gallery/mountain/mt-elgon.jpg', 'text', 'travelguide', 'Activity 4 Image', '2026-03-09 23:21:12', '2026-03-16 13:31:30'),
(32, 'travelguide_activity_5_title', 'Cave Adventures', 'text', 'travelguide', 'Activity 5 Title', '2026-03-09 23:21:12', '2026-03-09 23:21:12'),
(33, 'travelguide_activity_5_description', 'The ancient caves echo stories of the past — a thrilling blend of mystery, history, and raw natural beauty. With guided tours, you\'ll discover underground streams and breathtaking views from the rock itself.', 'textarea', 'travelguide', 'Activity 5 Description', '2026-03-09 23:21:12', '2026-03-09 23:21:12'),
(34, 'travelguide_activity_5_image', 'images/gallery/adventure/clif2.jpg', 'text', 'travelguide', 'Activity 5 Image', '2026-03-09 23:21:12', '2026-03-15 06:43:04'),
(35, 'travelguide_activity_6_title', 'Rock Climbing', 'text', 'travelguide', 'Activity 6 Title', '2026-03-09 23:21:12', '2026-03-09 23:21:12'),
(36, 'travelguide_activity_6_description', 'Challenge yourself on rugged cliffs with guided rock climbing adventures, offering panoramic views from the top.', 'textarea', 'travelguide', 'Activity 6 Description', '2026-03-09 23:21:12', '2026-03-09 23:21:12'),
(37, 'travelguide_activity_6_image', 'images/gallery/adventure/rock climbing.jpg', 'text', 'travelguide', 'Activity 6 Image', '2026-03-09 23:21:12', '2026-03-15 06:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `visit_date` date DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `country`, `message`, `photo`, `rating`, `visit_date`, `is_featured`, `is_active`, `is_approved`, `order`, `created_at`, `updated_at`) VALUES
(2, 'Michael Chen', 'Australia', 'What an incredible adventure! The rock climbing and waterfall hikes exceeded all expectations. The views are spectacular and the guides are professional and friendly. This is a must-visit destination in Uganda.', NULL, 5, '2024-10-28', 1, 1, 1, 2, '2026-03-07 09:00:39', '2026-03-19 09:45:41'),
(3, 'Emma Rodriguez', 'Spain', 'The coffee tour combined with the waterfall visit was perfect! Grace showed us the entire coffee process from bean to cup, and the cultural insights were fascinating. The scenery is absolutely stunning.', NULL, 5, '2024-12-05', 1, 1, 1, 3, '2026-03-07 09:00:39', '2026-03-19 09:45:12'),
(4, 'James Wilson', 'Canada', 'Amazing experience with professional guides. The safety measures for abseiling were excellent, and the views from the top of the falls are unforgettable. Great value for money!', NULL, 4, '2024-09-20', 0, 1, 1, 4, '2026-03-07 09:00:39', '2026-03-19 09:45:35'),
(5, 'Lisa Andersson', 'Sweden', 'Beautiful waterfalls and excellent hiking trails. The local community is very welcoming, and the guides are passionate about their work. A truly authentic Ugandan experience.', NULL, 4, '2024-08-12', 0, 1, 1, 5, '2026-03-07 09:00:39', '2026-03-19 09:45:39'),
(6, 'Sarah Johnson', 'United Kingdom', 'Absolutely breathtaking experience! The three waterfalls are magnificent, and our guide Samuel was incredibly knowledgeable about the local culture and history. The abseiling adventure was the highlight of our Uganda trip.', NULL, 5, '2024-11-15', 1, 1, 1, 1, '2026-03-07 09:20:59', '2026-03-19 09:46:40'),
(11, 'Sisco Cherop', 'Uganda', 'it was so good being at the falls', NULL, 5, '2026-03-13', 0, 1, 1, 0, '2026-03-19 08:42:06', '2026-03-19 09:45:00'),
(12, 'Sisco', 'Cherop', 'yta7ddgctyrysesesdfxdgfjhkjljikfdxd', NULL, 5, '2026-03-13', 0, 1, 1, 0, '2026-03-19 08:52:28', '2026-03-19 09:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `tour_guides`
--

CREATE TABLE `tour_guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `years_experience` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_guides`
--

INSERT INTO `tour_guides` (`id`, `name`, `title`, `bio`, `photo`, `phone`, `email`, `years_experience`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Samuel Kato', 'Senior Adventure Guide', 'With over 8 years of experience guiding visitors through the breathtaking landscapes around Sipi Falls, Samuel is passionate about sharing the natural beauty and cultural heritage of Eastern Uganda. He specializes in waterfall hikes, rock climbing, and cultural tours.yes', NULL, '+256 700 123 456', 'samuel@sipifalls.com', 8, 1, 3, '2026-03-07 09:00:37', '2026-03-09 02:26:50'),
(2, 'Grace Namukose', 'Cultural Heritage Guide', 'Grace brings 5 years of expertise in cultural tourism and community engagement. She offers unique insights into local traditions, coffee farming practices, and the rich history of the Bagisu people. Her warm personality makes every tour memorable.', NULL, '+256 700 234 567', 'grace@sipifalls.com', 5, 1, 2, '2026-03-07 09:00:37', '2026-03-07 09:00:37'),
(6, 'David Wamukota', 'Adventure Sports Specialist', 'David is our go-to guide for adrenaline seekers. With 6 years of experience in rock climbing, abseiling, and extreme sports, he ensures safety while delivering unforgettable adventure experiences around the three magnificent waterfalls.', NULL, '+256 700 345 678', 'david@sipifalls.com', 6, 1, 3, '2026-03-07 09:19:47', '2026-03-07 09:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@sipifalls.com', 1, NULL, '$2y$12$6NSVXNCocJtZgeAGNHcxnO2ZRTDq.0bxPCwmUoMeJGvxM9QVQu7V.', NULL, '2026-03-05 16:32:37', '2026-03-05 16:32:37'),
(2, 'chesang caroline', 'carolchessy@gmail.com', 1, NULL, '$2y$12$Oin2hfkrC6K.GsaLQgJ2ie/4Yoo7WJcoHWJrmH54vpqoUjmZ1cy/6', NULL, '2026-03-23 17:08:40', '2026-03-23 17:17:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_reactions`
--
ALTER TABLE `activity_reactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `activity_reactions_activity_key_emoji_session_id_unique` (`activity_key`,`emoji`,`session_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_subscribers_email_unique` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_contents`
--
ALTER TABLE `site_contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_contents_key_unique` (`key`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_guides`
--
ALTER TABLE `tour_guides`
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
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `activity_reactions`
--
ALTER TABLE `activity_reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_contents`
--
ALTER TABLE `site_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tour_guides`
--
ALTER TABLE `tour_guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

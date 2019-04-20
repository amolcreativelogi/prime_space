-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 08:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pryme_space_new_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `lnd_add_land_type`
--

CREATE TABLE `lnd_add_land_type` (
  `id` int(11) NOT NULL,
  `land_type_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnd_add_land_type`
--

INSERT INTO `lnd_add_land_type` (`id`, `land_type_id`, `property_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 1, 14, 1, '2019-04-06 09:24:23', '2019-04-06 09:24:23', 1, 1, 0),
(2, 2, 14, 1, '2019-04-06 09:24:23', '2019-04-06 09:24:23', 1, 1, 0),
(3, 1, 9, 1, '2019-04-12 06:24:31', '2019-04-12 06:24:31', 1, 1, 0),
(4, 2, 9, 1, '2019-04-12 06:24:31', '2019-04-12 06:24:31', 1, 1, 0),
(5, 1, 10, 1, '2019-04-12 06:25:28', '2019-04-12 06:25:28', 1, 1, 0),
(6, 2, 10, 1, '2019-04-12 06:25:28', '2019-04-12 06:25:28', 1, 1, 0),
(7, 1, 11, 1, '2019-04-13 09:17:20', '2019-04-13 09:17:20', 1, 1, 0),
(8, 1, 12, 1, '2019-04-13 09:19:53', '2019-04-13 09:19:53', 1, 1, 0),
(9, 1, 13, 1, '2019-04-14 14:20:03', '2019-04-14 14:20:03', 1, 1, 0),
(10, 1, 14, 1, '2019-04-14 14:21:55', '2019-04-14 14:21:55', 1, 1, 0),
(11, 1, 15, 1, '2019-04-14 14:30:36', '2019-04-14 14:30:36', 1, 1, 0),
(12, 2, 16, 1, '2019-04-15 20:12:09', '2019-04-15 20:12:09', 1, 1, 0),
(13, 2, 17, 1, '2019-04-15 20:12:14', '2019-04-15 20:12:14', 1, 1, 0),
(14, 1, 18, 1, '2019-04-16 02:26:10', '2019-04-16 02:26:10', 1, 1, 0),
(15, 1, 19, 1, '2019-04-16 02:38:13', '2019-04-16 02:38:13', 1, 1, 0),
(16, 1, 20, 1, '2019-04-16 02:39:08', '2019-04-16 02:39:08', 1, 1, 0),
(17, 1, 21, 1, '2019-04-16 02:40:08', '2019-04-16 02:40:08', 1, 1, 0),
(18, 1, 22, 1, '2019-04-16 02:48:23', '2019-04-16 02:48:23', 1, 1, 0),
(19, 1, 23, 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0),
(20, 1, 24, 1, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0),
(21, 1, 25, 1, '2019-04-17 12:33:40', '2019-04-17 12:33:40', 1, 1, 0),
(22, 1, 26, 1, '2019-04-18 03:29:16', '2019-04-18 03:29:16', 1, 1, 0),
(23, 1, 27, 1, '2019-04-18 05:12:11', '2019-04-18 05:12:11', 1, 1, 0),
(24, 2, 28, 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0),
(25, 1, 29, 1, '2019-04-18 05:41:29', '2019-04-18 05:41:29', 1, 1, 0),
(26, 2, 30, 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0),
(27, 1, 31, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(28, 1, 32, 1, '2019-04-18 22:41:19', '2019-04-18 22:41:19', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lnd_add_property`
--

CREATE TABLE `lnd_add_property` (
  `property_id` int(11) UNSIGNED NOT NULL,
  `module_manage_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Land Name',
  `location` text NOT NULL,
  `latitude` decimal(11,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `zip_code` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `tour_availability` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-No,1-Yes',
  `property_size` int(11) UNSIGNED NOT NULL COMMENT 'In digit',
  `unit_type_id` int(11) UNSIGNED NOT NULL,
  `land_type_id` int(11) UNSIGNED NOT NULL COMMENT '1-Industrial,2-Agriculture,3-Residential,4-Commercial,5-All',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT ' 	0 - Inactive, 1 - Active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnd_add_property`
--

INSERT INTO `lnd_add_property` (`property_id`, `module_manage_id`, `user_id`, `name`, `location`, `latitude`, `longitude`, `zip_code`, `description`, `tour_availability`, `property_size`, `unit_type_id`, `land_type_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(7, 3, 2, 'Land 1', 'nashville', '36.16266380', '-86.78160000', '12345', 'test land', 1, 30, 3, 1, 1, '2019-04-05 03:06:00', '2019-04-05 03:06:00', 1, 1, 0),
(8, 3, 2, 'Land 2', 'nashville', '36.16266380', '-86.78160000', '12345', 'test land', 1, 30, 3, 1, 1, '2019-04-05 03:06:14', '2019-04-05 03:06:14', 1, 1, 0),
(9, 3, 19, 'alkurn land', 'Sadar, Nagpur, Maharashtra, India', '21.16326260', '79.07439150', '440001', 'lorem ipsum', 1, 1200, 1, 1, 0, '2019-04-12 06:24:31', '2019-04-12 06:24:31', 1, 1, 0),
(10, 3, 19, 'alkurn land', 'Sadar, Nagpur, Maharashtra, India', '21.16326260', '79.07439150', '440001', 'lorem ipsum', 1, 1200, 1, 1, 0, '2019-04-12 06:25:28', '2019-04-12 06:25:28', 1, 1, 0),
(11, 3, 11, 'Test', 'AB, Canada', '53.93327060', '-116.57650350', '11111', 'Test', 1, 1, 1, 1, 0, '2019-04-13 09:17:20', '2019-04-13 09:17:20', 1, 1, 0),
(12, 3, 11, 'Test', 'AB, Canada', '53.93327060', '-116.57650350', '11111', 'Test', 1, 1, 1, 1, 0, '2019-04-13 09:19:53', '2019-04-13 09:19:53', 1, 1, 0),
(13, 3, 11, 'Test', 'test', NULL, NULL, '1111', '111', 1, 1, 1, 1, 0, '2019-04-14 14:20:03', '2019-04-14 14:20:03', 1, 1, 0),
(14, 3, 11, 'Test', 'test', NULL, NULL, '1111', '111', 1, 1, 1, 1, 0, '2019-04-14 14:21:55', '2019-04-14 14:21:55', 1, 1, 0),
(15, 3, 11, 'Test', 'test', NULL, NULL, '1111', '111', 1, 1, 1, 1, 0, '2019-04-14 14:30:36', '2019-04-14 14:30:36', 1, 1, 0),
(16, 3, 11, '1', 'test', NULL, NULL, '1', '1', 1, 1, 2, 1, 0, '2019-04-15 20:12:09', '2019-04-15 20:12:09', 1, 1, 0),
(17, 3, 11, '1', 'test', NULL, NULL, '1', '1', 1, 1, 2, 1, 0, '2019-04-15 20:12:14', '2019-04-15 20:12:14', 1, 1, 0),
(18, 3, 11, '1', 'test', NULL, NULL, '1', '1', 1, 1, 1, 1, 0, '2019-04-16 02:26:10', '2019-04-16 02:26:10', 1, 1, 0),
(19, 3, 11, '1', 'test', NULL, NULL, '1', '1', 1, 1, 1, 1, 0, '2019-04-16 02:38:13', '2019-04-16 02:38:13', 1, 1, 0),
(20, 3, 11, '1', 'test', '40.74599490', '-73.98397460', '1', 'test', 1, 1, 1, 1, 0, '2019-04-16 02:39:08', '2019-04-16 02:39:08', 1, 1, 0),
(21, 3, 11, '1', 'test', '40.74266800', '-73.98953540', '1', '1', 1, 1, 1, 1, 0, '2019-04-16 02:40:08', '2019-04-16 02:40:08', 1, 1, 0),
(22, 3, 11, '1', 'test', '40.74266800', '-73.98953540', '1', '1', 1, 1, 1, 1, 0, '2019-04-16 02:48:22', '2019-04-16 02:48:22', 1, 1, 0),
(23, 3, 19, 'land property', 'test', '33.65948350', '-117.99880260', '655', 'test', 1, 500, 1, 1, 0, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0),
(24, 3, 19, 'test', 'test', '21.17145410', '79.07969350', '441111', 'testing', 1, 70, 1, 1, 0, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0),
(25, 3, 19, 'sample alkurn land', 'test', '0.72946900', '28.61368900', '7678', 'Harvesting is the process of gathering a ripe crop from the fields. Reaping is the cutting of grain or pulse for harvest, typically using a scythe, sickle, or reaper. On smaller farms with minimal mechanization, harvesting is the most labor-intensive activity of the growing season.', 1, 200, 1, 1, 0, '2019-04-17 12:33:40', '2019-04-17 12:33:40', 1, 1, 0),
(26, 3, 11, 'Washington State University', 'Washington State', '38.90719230', '-117.15421210', '11111', 'Washington State Land Records 101 - a basic overview of land records in Washington State ... Donation Land Claim Act 1850 (Oregon & Washington Territory).', 1, 1, 1, 1, 1, '2019-04-18 03:29:16', '2019-04-18 16:03:12', 1, 1, 0),
(27, 3, 19, 'sample land', 'California, USA', '36.77826100', '-119.41793240', '5465', 'Harvesting is the process of gathering a ripe crop from the fields. Reaping is the cutting of grain or pulse for harvest, typically using a scythe, sickle, or reaper. On smaller farms with minimal mechanization, harvesting is the most labor-intensive activity of the growing season.', 1, 10, 3, 1, 1, '2019-04-18 05:12:11', '2019-04-18 05:46:10', 1, 1, 0),
(28, 3, 11, 'property new', 'Nagpur, Maharashtra, India', '21.14580040', '79.08815460', '440016', 'test property', 1, 100, 3, 1, 1, '2019-04-18 05:40:09', '2019-04-18 05:46:33', 1, 1, 0),
(29, 3, 19, 'smaple land 2', 'Playa del Carmen, Quintana Roo, Mexico', '20.62955860', '-87.07388510', '5646', 'Harvesting is the process of gathering a ripe crop from the fields. Reaping is the cutting of grain or pulse for harvest, typically using a scythe, sickle, or reaper. On smaller farms with minimal mechanization, harvesting is the most labor-intensive activity of the growing season.', 1, 80, 1, 1, 1, '2019-04-18 05:41:29', '2019-04-18 05:46:27', 1, 1, 0),
(30, 3, 11, 'xyz property', 'nagpur', '40.71277530', '-74.00597280', '20001', 'test property2', 1, 1230, 3, 1, 1, '2019-04-18 05:45:30', '2019-04-18 15:59:16', 1, 1, 0),
(31, 3, 19, 'land16', 'Washington Square Park, New York, NY, USA', '40.73082280', '-73.99733200', '546', 'Harvesting is the process of gathering a ripe crop from the fields. Reaping is the cutting of grain or pulse for harvest, typically using a scythe, sickle, or reaper. On smaller farms with minimal mechanization, harvesting is the most labor-intensive activity of the growing season.', 1, 80, 2, 1, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(32, 3, 11, 'new property', '1', NULL, NULL, '11', '11', 1, 1, 1, 1, 1, '2019-04-18 22:41:18', '2019-04-18 22:41:18', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lnd_add_property_amenities`
--

CREATE TABLE `lnd_add_property_amenities` (
  `property_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes',
  `id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnd_add_property_amenities`
--

INSERT INTO `lnd_add_property_amenities` (`property_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`, `id`, `amenity_id`) VALUES
(9, 1, '2019-04-12 06:24:31', '2019-04-12 06:24:31', 1, 1, 0, 1, 0),
(14, 1, '2019-04-14 14:21:55', '2019-04-14 14:21:55', 1, 1, 0, 2, 55),
(15, 1, '2019-04-14 14:30:36', '2019-04-14 14:30:36', 1, 1, 0, 3, 55),
(18, 1, '2019-04-16 02:26:11', '2019-04-16 02:26:11', 1, 1, 0, 4, 55),
(19, 1, '2019-04-16 02:38:14', '2019-04-16 02:38:14', 1, 1, 0, 5, 55),
(20, 1, '2019-04-16 02:39:08', '2019-04-16 02:39:08', 1, 1, 0, 6, 55),
(21, 1, '2019-04-16 02:40:08', '2019-04-16 02:40:08', 1, 1, 0, 7, 55),
(22, 1, '2019-04-16 02:48:23', '2019-04-16 02:48:23', 1, 1, 0, 8, 55),
(23, 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0, 9, 55),
(23, 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0, 10, 57),
(23, 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0, 11, 58),
(23, 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0, 12, 60),
(23, 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0, 13, 64),
(24, 1, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0, 14, 58),
(24, 1, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0, 15, 59),
(25, 1, '2019-04-17 12:33:40', '2019-04-17 12:33:40', 1, 1, 0, 16, 64),
(25, 1, '2019-04-17 12:33:40', '2019-04-17 12:33:40', 1, 1, 0, 17, 65),
(26, 1, '2019-04-18 03:29:16', '2019-04-18 03:29:16', 1, 1, 0, 18, 55),
(27, 1, '2019-04-18 05:12:11', '2019-04-18 05:12:11', 1, 1, 0, 19, 55),
(27, 1, '2019-04-18 05:12:11', '2019-04-18 05:12:11', 1, 1, 0, 20, 60),
(27, 1, '2019-04-18 05:12:11', '2019-04-18 05:12:11', 1, 1, 0, 21, 65),
(28, 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0, 22, 55),
(28, 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0, 23, 57),
(28, 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0, 24, 58),
(28, 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0, 25, 59),
(29, 1, '2019-04-18 05:41:29', '2019-04-18 05:41:29', 1, 1, 0, 26, 55),
(29, 1, '2019-04-18 05:41:29', '2019-04-18 05:41:29', 1, 1, 0, 27, 65),
(30, 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0, 28, 55),
(30, 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0, 29, 57),
(30, 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0, 30, 58),
(30, 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0, 31, 65),
(31, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0, 32, 58),
(31, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0, 33, 64),
(31, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0, 34, 65),
(32, 1, '2019-04-18 22:41:19', '2019-04-18 22:41:19', 1, 1, 0, 35, 55);

-- --------------------------------------------------------

--
-- Table structure for table `lnd_add_property_availabilities`
--

CREATE TABLE `lnd_add_property_availabilities` (
  `availability_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lnd_add_property_availabilities`
--

INSERT INTO `lnd_add_property_availabilities` (`availability_id`, `user_id`, `property_id`, `start_time`, `end_time`, `start_date`, `end_date`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 2, 7, '07:00:00', '23:00:00', '2019-04-04', '2019-04-30', '2019-04-05 03:08:35', '2019-04-05 03:08:35', 1, 1, 0),
(2, 19, 9, '00:00:01', '23:59:00', '2019-04-12', '2020-04-11', '2019-04-12 06:24:34', '2019-04-12 06:24:34', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lnd_add_property_cancellation_policies`
--

CREATE TABLE `lnd_add_property_cancellation_policies` (
  `prk_cancellation_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `cancellation_policy_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnd_add_property_cancellation_policies`
--

INSERT INTO `lnd_add_property_cancellation_policies` (`prk_cancellation_id`, `property_id`, `cancellation_policy_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 15, 18, 1, '2019-04-14 14:30:37', '2019-04-14 14:30:37', 1, 1, 0),
(2, 18, 18, 1, '2019-04-16 02:26:11', '2019-04-16 02:26:11', 1, 1, 0),
(3, 19, 18, 1, '2019-04-16 02:38:14', '2019-04-16 02:38:14', 1, 1, 0),
(4, 20, 18, 1, '2019-04-16 02:39:08', '2019-04-16 02:39:08', 1, 1, 0),
(5, 21, 18, 1, '2019-04-16 02:40:09', '2019-04-16 02:40:09', 1, 1, 0),
(6, 22, 19, 1, '2019-04-16 02:48:23', '2019-04-16 02:48:23', 1, 1, 0),
(7, 23, 10, 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0),
(8, 24, 19, 1, '2019-04-17 11:04:15', '2019-04-17 11:04:15', 1, 1, 0),
(9, 25, 10, 1, '2019-04-17 12:33:40', '2019-04-17 12:33:40', 1, 1, 0),
(10, 26, 18, 1, '2019-04-18 03:29:16', '2019-04-18 03:29:16', 1, 1, 0),
(11, 27, 18, 1, '2019-04-18 05:12:11', '2019-04-18 05:12:11', 1, 1, 0),
(12, 28, 19, 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0),
(13, 29, 18, 1, '2019-04-18 05:41:32', '2019-04-18 05:41:32', 1, 1, 0),
(14, 30, 10, 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0),
(15, 31, 10, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(16, 32, 18, 1, '2019-04-18 22:41:19', '2019-04-18 22:41:19', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lnd_add_property_files`
--

CREATE TABLE `lnd_add_property_files` (
  `file_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'File Name',
  `property_id` int(11) UNSIGNED NOT NULL,
  `document_type_id` int(11) UNSIGNED NOT NULL COMMENT '1-Image,2-Floor plan,3-Ownersheep proof',
  `default_file` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnd_add_property_files`
--

INSERT INTO `lnd_add_property_files` (`file_id`, `name`, `property_id`, `document_type_id`, `default_file`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'sadar.jpg', 7, 1, 1, 1, '2019-04-05 03:06:52', '2019-04-05 03:25:10', 1, 1, 0),
(2, 'sadar.prop', 8, 1, 0, 1, '2019-04-05 03:07:45', '2019-04-05 03:25:07', 1, 1, 0),
(3, '1555050271-Version 1.0 - Functional Scope Document - Don Nguyen - Pryme Space Sharing Platform.pdf', 9, 2, 1, 1, '2019-04-12 06:24:34', '2019-04-12 06:24:34', 1, 1, 0),
(4, '1555251715-a81be5f066ce9569615b40ac98f93e9b.jpg', 14, 1, 1, 1, '2019-04-14 14:21:55', '2019-04-14 14:21:55', 1, 1, 0),
(5, '1555251715-book-space2.jpg', 14, 3, 1, 1, '2019-04-14 14:21:55', '2019-04-14 14:21:55', 1, 1, 0),
(6, '1555251715-book-space2.jpg', 14, 2, 1, 1, '2019-04-14 14:21:55', '2019-04-14 14:21:55', 1, 1, 0),
(7, '1555252236-a81be5f066ce9569615b40ac98f93e9b.jpg', 15, 1, 1, 1, '2019-04-14 14:30:36', '2019-04-14 14:30:36', 1, 1, 0),
(8, '1555252237-book-space2.jpg', 15, 3, 1, 1, '2019-04-14 14:30:37', '2019-04-14 14:30:37', 1, 1, 0),
(9, '1555252237-book-space2.jpg', 15, 2, 1, 1, '2019-04-14 14:30:37', '2019-04-14 14:30:37', 1, 1, 0),
(10, '1555381571-book-space1.jpg', 18, 1, 1, 1, '2019-04-16 02:26:11', '2019-04-16 02:26:11', 1, 1, 0),
(11, '1555381571-book-space2.jpg', 18, 3, 1, 1, '2019-04-16 02:26:11', '2019-04-16 02:26:11', 1, 1, 0),
(12, '1555381571-book-space2.jpg', 18, 2, 1, 1, '2019-04-16 02:26:11', '2019-04-16 02:26:11', 1, 1, 0),
(13, '1555382294-book-space2.jpg', 19, 1, 1, 1, '2019-04-16 02:38:14', '2019-04-16 02:38:14', 1, 1, 0),
(14, '1555382294-book-space2.jpg', 19, 3, 1, 1, '2019-04-16 02:38:14', '2019-04-16 02:38:14', 1, 1, 0),
(15, '1555382294-book-space2.jpg', 19, 2, 1, 1, '2019-04-16 02:38:14', '2019-04-16 02:38:14', 1, 1, 0),
(16, '1555382348-a81be5f066ce9569615b40ac98f93e9b.jpg', 20, 1, 1, 1, '2019-04-16 02:39:08', '2019-04-16 02:39:08', 1, 1, 0),
(17, '1555382348-book-space2.jpg', 20, 3, 1, 1, '2019-04-16 02:39:08', '2019-04-16 02:39:08', 1, 1, 0),
(18, '1555382348-book-space2.jpg', 20, 2, 1, 1, '2019-04-16 02:39:08', '2019-04-16 02:39:08', 1, 1, 0),
(19, '1555382408-a81be5f066ce9569615b40ac98f93e9b.jpg', 21, 1, 1, 1, '2019-04-16 02:40:08', '2019-04-16 02:40:08', 1, 1, 0),
(20, '1555382409-discoverpsace01.jpg', 21, 3, 1, 1, '2019-04-16 02:40:09', '2019-04-16 02:40:09', 1, 1, 0),
(21, '1555382409-book-space2.jpg', 21, 2, 1, 1, '2019-04-16 02:40:09', '2019-04-16 02:40:09', 1, 1, 0),
(22, '1555382903-book-space1.jpg', 22, 1, 1, 1, '2019-04-16 02:48:23', '2019-04-16 02:48:23', 1, 1, 0),
(23, '1555382903-discoverpsace03.jpg', 22, 3, 1, 1, '2019-04-16 02:48:23', '2019-04-16 02:48:23', 1, 1, 0),
(24, '1555382903-book-space2.jpg', 22, 2, 1, 1, '2019-04-16 02:48:23', '2019-04-16 02:48:23', 1, 1, 0),
(25, '1555484826-3446348.jpg', 23, 1, 1, 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0),
(26, '1555484826-Parking-A.jpg', 23, 3, 1, 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0),
(27, '1555484826-o_1aqa5bjfa1ofqobh85qt38sok7.jpg', 23, 2, 1, 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0),
(28, '1555499052-_100631136_p062sdq8.jpg', 24, 1, 1, 1, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0),
(29, '1555499052-7-vermont-road-manor-lakes-vic-3024-real-estate-photo-1-large-11982996.jpg', 24, 1, 0, 1, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0),
(30, '1555499052-14.jpg', 24, 1, 0, 1, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0),
(31, '1555499052-1912018-9016-1.jpg', 24, 1, 0, 1, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0),
(32, '1555499052-3446348.jpg', 24, 1, 0, 1, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0),
(33, '1555499052-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 24, 1, 0, 1, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0),
(34, '1555499052-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 24, 3, 1, 1, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0),
(35, '1555499052-2380902598_e965511842_o.jpg', 24, 2, 1, 1, '2019-04-17 11:04:15', '2019-04-17 11:04:15', 1, 1, 0),
(36, '1555504420-938bdc4415ed4b13be72ad9b8fa29325.jpg', 25, 1, 1, 1, '2019-04-17 12:33:40', '2019-04-17 12:33:40', 1, 1, 0),
(37, '1555504420-o_1aqa5bjfa1ofqobh85qt38sok7.jpg', 25, 3, 1, 1, '2019-04-17 12:33:40', '2019-04-17 12:33:40', 1, 1, 0),
(38, '1555504420-o_1aqa5bjfa1ofqobh85qt38sok7.jpg', 25, 2, 1, 1, '2019-04-17 12:33:40', '2019-04-17 12:33:40', 1, 1, 0),
(39, '1555558156-cash-rent.jpg', 26, 1, 1, 1, '2019-04-18 03:29:16', '2019-04-18 03:29:16', 1, 1, 0),
(40, '1555558156-cash-rent.jpg', 26, 3, 1, 1, '2019-04-18 03:29:16', '2019-04-18 03:29:16', 1, 1, 0),
(41, '1555558156-cash-rent.jpg', 26, 2, 1, 1, '2019-04-18 03:29:16', '2019-04-18 03:29:16', 1, 1, 0),
(42, '1555564331-7-vermont-road-manor-lakes-vic-3024-real-estate-photo-1-large-11982996.jpg', 27, 1, 1, 1, '2019-04-18 05:12:11', '2019-04-18 05:12:11', 1, 1, 0),
(43, '1555564331-o_1aqa5bjfa1ofqobh85qt38sok7.jpg', 27, 3, 1, 1, '2019-04-18 05:12:11', '2019-04-18 05:12:11', 1, 1, 0),
(44, '1555564331-938bdc4415ed4b13be72ad9b8fa29325.jpg', 27, 2, 1, 1, '2019-04-18 05:12:11', '2019-04-18 05:12:11', 1, 1, 0),
(45, '1555566009-Screenshot 2019-04-13 at 1.29.47 AM.png', 28, 1, 1, 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0),
(46, '1555566009-og-img.png', 28, 3, 1, 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0),
(47, '1555566009-Screenshot 2019-04-13 at 1.29.47 AM.png', 28, 2, 1, 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0),
(48, '1555566089-Land_of_Waves.png', 29, 1, 1, 1, '2019-04-18 05:41:31', '2019-04-18 05:41:31', 1, 1, 0),
(49, '1555566091-Selling.jpg', 29, 3, 1, 1, '2019-04-18 05:41:31', '2019-04-18 05:41:31', 1, 1, 0),
(50, '1555566091-Land_of_Waves.png', 29, 2, 1, 1, '2019-04-18 05:41:32', '2019-04-18 05:41:32', 1, 1, 0),
(51, '1555566330-Screenshot 2019-04-13 at 1.29.47 AM.png', 30, 1, 1, 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0),
(52, '1555566330-Screenshot 2019-04-13 at 1.29.47 AM.png', 30, 3, 1, 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0),
(53, '1555566330-Screenshot 2019-04-13 at 1.29.47 AM.png', 30, 2, 1, 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0),
(54, '1555585174-land-for-sale_3.jpg', 31, 1, 1, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(55, '1555585174-mickleover-phase1-557x418.jpg', 31, 1, 0, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(56, '1555585174-o_1aqa5bjfa1ofqobh85qt38sok7.jpg', 31, 1, 0, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(57, '1555585174-Project-Photo-26-Poonamallee-Farms-Chennai-5093743_536_775_310_462.jpg', 31, 1, 0, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(58, '1555585174-Project-Photo-26-Poonamallee-Farms-Chennai-5093743_536_775_310_462.jpg', 31, 3, 1, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(59, '1555585174-Project-Photo-26-Poonamallee-Farms-Chennai-5093743_536_775_310_462.jpg', 31, 2, 1, 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(60, '1555627279-cash-rent.jpg', 32, 1, 1, 1, '2019-04-18 22:41:19', '2019-04-18 22:41:19', 1, 1, 0),
(61, '1555627279-cash-rent.jpg', 32, 3, 1, 1, '2019-04-18 22:41:19', '2019-04-18 22:41:19', 1, 1, 0),
(62, '1555627279-cash-rent.jpg', 32, 2, 1, 1, '2019-04-18 22:41:19', '2019-04-18 22:41:19', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lnd_add_property_rent`
--

CREATE TABLE `lnd_add_property_rent` (
  `rent_id` int(11) UNSIGNED NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `duration_type_id` int(11) UNSIGNED NOT NULL COMMENT 'Booking Duration Type 1-Hourly,2-Daily,3-Monthly',
  `rent_amount` varchar(100) NOT NULL COMMENT 'In Doller($)',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnd_add_property_rent`
--

INSERT INTO `lnd_add_property_rent` (`rent_id`, `property_id`, `duration_type_id`, `rent_amount`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(2, 7, 1, '50', 1, '2019-04-05 20:06:44', '2019-04-05 20:06:44', 1, 1, 0),
(3, 7, 2, '20', 1, '2019-04-05 20:06:57', '2019-04-05 20:06:57', 1, 1, 0),
(4, 7, 3, '100', 1, '2019-04-05 20:07:10', '2019-04-05 20:07:10', 1, 1, 0),
(5, 9, 2, '10', 1, '2019-04-12 06:24:31', '2019-04-12 06:24:31', 1, 1, 0),
(6, 9, 3, '100', 1, '2019-04-12 06:24:31', '2019-04-12 06:24:31', 1, 1, 0),
(7, 9, 4, '30', 1, '2019-04-12 06:24:31', '2019-04-12 06:24:31', 1, 1, 0),
(8, 10, 2, '10', 1, '2019-04-12 06:25:28', '2019-04-12 06:25:28', 1, 1, 0),
(9, 10, 3, '100', 1, '2019-04-12 06:25:28', '2019-04-12 06:25:28', 1, 1, 0),
(10, 10, 4, '30', 1, '2019-04-12 06:25:28', '2019-04-12 06:25:28', 1, 1, 0),
(11, 11, 2, '1', 1, '2019-04-13 09:17:20', '2019-04-13 09:17:20', 1, 1, 0),
(12, 11, 3, '2', 1, '2019-04-13 09:17:20', '2019-04-13 09:17:20', 1, 1, 0),
(13, 11, 4, '3', 1, '2019-04-13 09:17:20', '2019-04-13 09:17:20', 1, 1, 0),
(14, 12, 2, '1', 1, '2019-04-13 09:19:53', '2019-04-13 09:19:53', 1, 1, 0),
(15, 12, 3, '2', 1, '2019-04-13 09:19:53', '2019-04-13 09:19:53', 1, 1, 0),
(16, 12, 4, '3', 1, '2019-04-13 09:19:53', '2019-04-13 09:19:53', 1, 1, 0),
(17, 13, 2, '1', 1, '2019-04-14 14:20:03', '2019-04-14 14:20:03', 1, 1, 0),
(18, 13, 3, '2', 1, '2019-04-14 14:20:03', '2019-04-14 14:20:03', 1, 1, 0),
(19, 13, 4, '3', 1, '2019-04-14 14:20:03', '2019-04-14 14:20:03', 1, 1, 0),
(20, 14, 2, '1', 1, '2019-04-14 14:21:55', '2019-04-14 14:21:55', 1, 1, 0),
(21, 14, 3, '2', 1, '2019-04-14 14:21:55', '2019-04-14 14:21:55', 1, 1, 0),
(22, 14, 4, '3', 1, '2019-04-14 14:21:55', '2019-04-14 14:21:55', 1, 1, 0),
(23, 15, 2, '1', 1, '2019-04-14 14:30:36', '2019-04-14 14:30:36', 1, 1, 0),
(24, 15, 3, '2', 1, '2019-04-14 14:30:36', '2019-04-14 14:30:36', 1, 1, 0),
(25, 15, 4, '3', 1, '2019-04-14 14:30:36', '2019-04-14 14:30:36', 1, 1, 0),
(26, 18, 2, '1', 1, '2019-04-16 02:26:11', '2019-04-16 02:26:11', 1, 1, 0),
(27, 18, 3, '2', 1, '2019-04-16 02:26:11', '2019-04-16 02:26:11', 1, 1, 0),
(28, 18, 4, '3', 1, '2019-04-16 02:26:11', '2019-04-16 02:26:11', 1, 1, 0),
(29, 19, 2, '1', 1, '2019-04-16 02:38:14', '2019-04-16 02:38:14', 1, 1, 0),
(30, 19, 3, '2', 1, '2019-04-16 02:38:14', '2019-04-16 02:38:14', 1, 1, 0),
(31, 19, 4, '3', 1, '2019-04-16 02:38:14', '2019-04-16 02:38:14', 1, 1, 0),
(32, 20, 2, '1', 1, '2019-04-16 02:39:08', '2019-04-16 02:39:08', 1, 1, 0),
(33, 20, 3, '2', 1, '2019-04-16 02:39:08', '2019-04-16 02:39:08', 1, 1, 0),
(34, 20, 4, '3', 1, '2019-04-16 02:39:08', '2019-04-16 02:39:08', 1, 1, 0),
(35, 21, 2, '1', 1, '2019-04-16 02:40:08', '2019-04-16 02:40:08', 1, 1, 0),
(36, 21, 3, '2', 1, '2019-04-16 02:40:08', '2019-04-16 02:40:08', 1, 1, 0),
(37, 21, 4, '3', 1, '2019-04-16 02:40:08', '2019-04-16 02:40:08', 1, 1, 0),
(38, 22, 2, '1', 1, '2019-04-16 02:48:23', '2019-04-16 02:48:23', 1, 1, 0),
(39, 22, 3, '2', 1, '2019-04-16 02:48:23', '2019-04-16 02:48:23', 1, 1, 0),
(40, 22, 4, '3', 1, '2019-04-16 02:48:23', '2019-04-16 02:48:23', 1, 1, 0),
(41, 23, 2, '20', 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0),
(42, 23, 3, '30', 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0),
(43, 23, 4, '60', 1, '2019-04-17 07:07:06', '2019-04-17 07:07:06', 1, 1, 0),
(44, 24, 4, '99', 1, '2019-04-17 11:04:12', '2019-04-17 11:04:12', 1, 1, 0),
(45, 25, 2, '30', 1, '2019-04-17 12:33:40', '2019-04-17 12:33:40', 1, 1, 0),
(46, 25, 3, '70', 1, '2019-04-17 12:33:40', '2019-04-17 12:33:40', 1, 1, 0),
(47, 25, 4, '89', 1, '2019-04-17 12:33:40', '2019-04-17 12:33:40', 1, 1, 0),
(48, 26, 2, '1', 1, '2019-04-18 03:29:16', '2019-04-18 03:29:16', 1, 1, 0),
(49, 26, 3, '2', 1, '2019-04-18 03:29:16', '2019-04-18 03:29:16', 1, 1, 0),
(50, 26, 4, '3', 1, '2019-04-18 03:29:16', '2019-04-18 03:29:16', 1, 1, 0),
(51, 27, 2, '10', 1, '2019-04-18 05:12:11', '2019-04-18 05:12:11', 1, 1, 0),
(52, 27, 3, '20', 1, '2019-04-18 05:12:11', '2019-04-18 05:12:11', 1, 1, 0),
(53, 27, 4, '30', 1, '2019-04-18 05:12:11', '2019-04-18 05:12:11', 1, 1, 0),
(54, 28, 2, '10', 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0),
(55, 28, 3, '20', 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0),
(56, 28, 4, '30', 1, '2019-04-18 05:40:09', '2019-04-18 05:40:09', 1, 1, 0),
(57, 29, 2, '30', 1, '2019-04-18 05:41:29', '2019-04-18 05:41:29', 1, 1, 0),
(58, 29, 3, '40', 1, '2019-04-18 05:41:29', '2019-04-18 05:41:29', 1, 1, 0),
(59, 29, 4, '70', 1, '2019-04-18 05:41:29', '2019-04-18 05:41:29', 1, 1, 0),
(60, 30, 2, '10', 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0),
(61, 30, 3, '20', 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0),
(62, 30, 4, '30', 1, '2019-04-18 05:45:30', '2019-04-18 05:45:30', 1, 1, 0),
(63, 31, 2, '10', 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(64, 31, 3, '20', 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(65, 31, 4, '30', 1, '2019-04-18 10:59:34', '2019-04-18 10:59:34', 1, 1, 0),
(66, 32, 2, '1', 1, '2019-04-18 22:41:19', '2019-04-18 22:41:19', 1, 1, 0),
(67, 32, 3, '2', 1, '2019-04-18 22:41:19', '2019-04-18 22:41:19', 1, 1, 0),
(68, 32, 4, '3', 1, '2019-04-18 22:41:19', '2019-04-18 22:41:19', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lnd_land_type`
--

CREATE TABLE `lnd_land_type` (
  `land_type_id` int(11) UNSIGNED NOT NULL,
  `land_type` varchar(100) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnd_land_type`
--

INSERT INTO `lnd_land_type` (`land_type_id`, `land_type`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'Agriculture', 1, '2019-03-27 15:44:01', '2019-03-27 15:44:01', 1, 1, 0),
(2, 'Commercials', 1, '2019-03-27 15:44:26', '2019-04-02 20:42:16', 1, 1, 0),
(3, 'Commercial', 0, '2019-03-27 17:18:58', '2019-03-27 17:21:50', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prk_add_property`
--

CREATE TABLE `prk_add_property` (
  `property_id` int(11) UNSIGNED NOT NULL,
  `module_manage_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` text NOT NULL,
  `latitude` decimal(11,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `zip_code` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `ev_charging` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-No,1-Yes',
  `wheelchair_accessible` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-No,1-Yes',
  `location_type_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT ' 	0 - Inactive, 1 - Active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_add_property`
--

INSERT INTO `prk_add_property` (`property_id`, `module_manage_id`, `user_id`, `name`, `location`, `latitude`, `longitude`, `zip_code`, `description`, `ev_charging`, `wheelchair_accessible`, `location_type_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 2, 11, 'Easy car park', 'test', '40.71277530', '-74.00597280', '11111', 'Test', 0, 0, 1, 1, '2019-04-16 21:55:07', '2019-04-18 07:17:14', 1, 1, 1),
(2, 2, 19, 'test property', 'test', '21.14580040', '79.08815460', '440001', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 0, 0, 2, 1, '2019-04-17 04:19:06', '2019-04-18 07:17:10', 1, 1, 1),
(3, 2, 19, 'alkurn technology', 'test', '21.14580040', '79.08815460', '4564', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 0, 0, 1, 1, '2019-04-17 04:40:46', '2019-04-18 07:17:06', 1, 1, 1),
(4, 2, 19, 'test', 'test', '13.02796610', '77.54091560', '45434', 'test', 0, 0, 1, 0, '2019-04-17 07:25:02', '2019-04-18 07:17:02', 1, 1, 1),
(5, 2, 19, 'test', 'test', '13.02796610', '77.54091560', '45434', 'test', 0, 0, 1, 0, '2019-04-17 07:26:27', '2019-04-18 07:16:58', 1, 1, 1),
(6, 2, 19, 'test', 'test', '13.02796610', '77.54091560', '45434', 'test', 0, 0, 1, 0, '2019-04-17 07:30:20', '2019-04-18 07:16:52', 1, 1, 1),
(7, 2, 19, 'test', 'test', '13.02796610', '77.54091560', '45434', 'test', 0, 0, 1, 0, '2019-04-17 07:30:22', '2019-04-18 07:16:48', 1, 1, 1),
(8, 2, 19, 'parking slot', 'test', '37.78754450', '-122.44492710', '5456', 'lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum lorem ipsumlorem ipsumlorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsum', 0, 0, 1, 1, '2019-04-17 09:40:24', '2019-04-18 07:16:43', 1, 1, 1),
(9, 2, 19, 'parking1', 'test', '38.90719230', '-77.03687070', '5655', 'lorem ipsum lorem ipsum  lorem ipsum lorem ipsum  lorem ipsum lorem ipsum', 0, 0, 2, 1, '2019-04-17 09:59:14', '2019-04-18 07:16:38', 1, 1, 1),
(10, 2, 19, 'parking3', 'test', '33.65948350', '-117.99880260', '5657', 'lorem ipsum', 0, 0, 3, 1, '2019-04-17 11:17:36', '2019-04-18 07:16:34', 1, 1, 1),
(11, 2, 19, 'sample alkurn', 'test', '36.77826100', '-119.41793240', '441111', 'A parking space is a location that is designated for parking, either paved or unpaved. It can be in a parking garage, in a parking lot or on a city street. The space many be delineated by road surface markings.', 0, 0, 3, 1, '2019-04-17 11:47:38', '2019-04-18 07:16:26', 1, 1, 1),
(12, 2, 19, 'sample parking1', 'Washington D.C., DC, USA', '38.90719230', '-77.03687070', '5464', 'testing', 0, 0, 3, 1, '2019-04-18 07:22:02', '2019-04-18 09:24:47', 1, 1, 0),
(13, 2, 11, 'p1', 'Washington D.C., DC, USA', '38.90719230', '-77.03687070', '20001', 'Washington officially the State of Washington, is a state in the Pacific Northwest region of the United States. Named for George Washington, the first president of ...', 0, 0, 1, 1, '2019-04-18 07:47:09', '2019-04-18 20:41:43', 1, 1, 1),
(14, 2, 11, 'p1', 'Washington D.C., DC, USA', '38.90719230', '-77.03687070', '20001', 'Washington officially the State of Washington, is a state in the Pacific Northwest region of the United States. Named for George Washington, the first president of ...', 0, 0, 1, 1, '2019-04-18 07:47:21', '2019-04-18 20:42:38', 1, 1, 1),
(15, 2, 19, 'sample parking2', 'Yelahanka, Bengaluru, Karnataka, India', '13.11856140', '77.59746170', '5646', 'Located on Gezira Island, the exclusive One Zamalek offers just 21 apartments for sale. Each apartment boasts spacious interiors and breath-taking views across the Nile. Waterfront apartments. Unique 2-bedroom layouts. 4-bed duplex penthouses. Private 3-bed apartments.', 0, 0, 2, 1, '2019-04-18 09:05:33', '2019-04-18 10:31:09', 1, 1, 1),
(16, 2, 19, 'sample parking2', 'Waco, TX, USA', '31.54933300', '-97.14666950', '6564', 'Parking is the act of stopping and disengaging a vehicle and leaving it unoccupied. Parking on one or both sides of a road is often permitted, though sometimes with restrictions. Some buildings have parking facilities for use of the buildings\' users.', 0, 0, 3, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:45', 1, 1, 0),
(17, 2, 11, 'parking22', 'West Palm Beach, FL, USA', '26.71534240', '-80.05337460', '333401', 'Hex Key, Hex Key, Shape T, Measurement Type Metric, Tip Size 2mm, Arm Length 3-7/8. Free Shipping on Orders over $50! Check out over 2,000,000 Products. Invoicing Available', 0, 0, 2, 1, '2019-04-18 12:06:40', '2019-04-18 12:11:17', 1, 1, 0),
(18, 2, 19, 'alkurn parking', 'Island Park, ID, USA', '44.42436370', '-111.37106450', '67654', 'test test test test test test test testtest test test test test test test test test testtest testtest test test test test test test testtest test test test test test test test test testtest test test test test test test test test testtest test test test test test test test test testtest test', 0, 0, 3, 1, '2019-04-18 12:14:30', '2019-04-18 12:14:49', 1, 1, 0),
(19, 2, 11, 'p11', 'Wichita, KS, USA', '37.68717610', '-97.33005300', '67212', 'Wichita is the largest city in the U.S. state of Kansas and the county seat of Sedgwick County. As of 2017, the estimated population of the city was 390,591.', 0, 0, 1, 0, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(20, 2, 11, 'p11', 'Wichita, KS, USA', '37.68717610', '-97.33005300', '67212', 'Wichita is the largest city in the U.S. state of Kansas and the county seat of Sedgwick County. As of 2017, the estimated population of the city was 390,591.', 0, 0, 1, 0, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(21, 2, 11, 'p11', 'Wichita, KS, USA', '37.68717610', '-97.33005300', '67212', 'Wichita is the largest city in the U.S. state of Kansas and the county seat of Sedgwick County. As of 2017, the estimated population of the city was 390,591.', 0, 0, 1, 0, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(22, 2, 11, 'p11', 'Wichita, KS, USA', '37.68717610', '-97.33005300', '67212', 'Wichita is the largest city in the U.S. state of Kansas and the county seat of Sedgwick County. As of 2017, the estimated population of the city was 390,591.', 0, 0, 1, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:36', 1, 1, 0),
(23, 2, 11, 'sdsad', '1107 Broadway, New York, NY, USA', '40.74266800', '-73.98953540', '11111', '1', 0, 0, 2, 0, '2019-04-18 22:30:32', '2019-04-18 22:30:32', 1, 1, 0),
(24, 2, 11, 'new property', 'Augusta, GA, USA', '33.47349780', '-82.01051480', '1', '1', 0, 0, 1, 0, '2019-04-18 22:36:08', '2019-04-18 22:36:08', 1, 1, 0),
(25, 2, 11, 'new property', 'Augusta, GA, USA', '33.47349780', '-82.01051480', '1', '1', 0, 0, 1, 0, '2019-04-18 22:36:49', '2019-04-18 22:36:49', 1, 1, 0),
(26, 2, 11, 'new property', '1107 Broadway, New York, NY, USA', '40.74266800', '-73.98953540', '1', '1', 0, 0, 1, 0, '2019-04-18 22:38:01', '2019-04-18 22:38:01', 1, 1, 0),
(27, 2, 11, 'new property', '1107 Broadway, New York, NY, USA', '40.74266800', '-73.98953540', '1', '1', 0, 0, 1, 0, '2019-04-18 22:38:17', '2019-04-18 22:38:17', 1, 1, 0),
(28, 2, 11, 'new property', '11 5th Avenue, New York, NY, USA', '40.73239330', '-73.99579170', '11111', '1', 0, 0, 1, 0, '2019-04-18 22:40:37', '2019-04-18 22:40:37', 1, 1, 0),
(29, 2, 11, 'new property', '135 Madison Avenue, New York, NY, USA', '40.74599490', '-73.98397460', '11', '1', 0, 0, 2, 0, '2019-04-20 03:41:38', '2019-04-20 03:41:38', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prk_add_property_amenities`
--

CREATE TABLE `prk_add_property_amenities` (
  `id` int(11) UNSIGNED NOT NULL,
  `amenity_id` int(11) UNSIGNED NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_add_property_amenities`
--

INSERT INTO `prk_add_property_amenities` (`id`, `amenity_id`, `property_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 55, 1, 1, '2019-04-16 21:55:07', '2019-04-16 21:55:07', 1, 1, 0),
(2, 55, 2, 1, '2019-04-17 04:19:06', '2019-04-17 04:19:06', 1, 1, 0),
(3, 56, 2, 1, '2019-04-17 04:19:06', '2019-04-17 04:19:06', 1, 1, 0),
(4, 55, 3, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46', 1, 1, 0),
(5, 56, 4, 1, '2019-04-17 07:25:02', '2019-04-17 07:25:02', 1, 1, 0),
(6, 55, 4, 1, '2019-04-17 07:25:02', '2019-04-17 07:25:02', 1, 1, 0),
(7, 56, 5, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27', 1, 1, 0),
(8, 55, 5, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27', 1, 1, 0),
(9, 56, 6, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(10, 55, 6, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(11, 56, 7, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(12, 55, 7, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(13, 56, 8, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(14, 62, 8, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(15, 56, 9, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(16, 55, 9, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(17, 57, 9, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(18, 59, 9, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(19, 60, 9, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(20, 62, 9, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(21, 63, 9, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(22, 61, 9, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(23, 62, 10, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(24, 63, 10, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(25, 61, 10, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(26, 56, 11, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(27, 62, 11, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(28, 63, 11, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(29, 61, 11, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(30, 56, 12, 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(31, 63, 12, 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(32, 61, 12, 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(33, 55, 13, 1, '2019-04-18 07:47:09', '2019-04-18 07:47:09', 1, 1, 0),
(34, 61, 13, 1, '2019-04-18 07:47:09', '2019-04-18 07:47:09', 1, 1, 0),
(35, 55, 14, 1, '2019-04-18 07:47:21', '2019-04-18 07:47:21', 1, 1, 0),
(36, 61, 14, 1, '2019-04-18 07:47:21', '2019-04-18 07:47:21', 1, 1, 0),
(37, 59, 15, 1, '2019-04-18 09:05:33', '2019-04-18 09:05:33', 1, 1, 0),
(38, 60, 15, 1, '2019-04-18 09:05:33', '2019-04-18 09:05:33', 1, 1, 0),
(39, 61, 15, 1, '2019-04-18 09:05:33', '2019-04-18 09:05:33', 1, 1, 0),
(40, 57, 16, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(41, 61, 16, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(42, 55, 17, 1, '2019-04-18 12:06:40', '2019-04-18 12:06:40', 1, 1, 0),
(43, 61, 17, 1, '2019-04-18 12:06:40', '2019-04-18 12:06:40', 1, 1, 0),
(44, 56, 18, 1, '2019-04-18 12:14:30', '2019-04-18 12:14:30', 1, 1, 0),
(45, 55, 18, 1, '2019-04-18 12:14:30', '2019-04-18 12:14:30', 1, 1, 0),
(46, 61, 18, 1, '2019-04-18 12:14:30', '2019-04-18 12:14:30', 1, 1, 0),
(47, 56, 19, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(48, 55, 19, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(49, 61, 19, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(50, 56, 20, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(51, 55, 20, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(52, 61, 20, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(53, 56, 21, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(54, 55, 21, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(55, 61, 21, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(56, 56, 22, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05', 1, 1, 0),
(57, 55, 22, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05', 1, 1, 0),
(58, 61, 22, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05', 1, 1, 0),
(59, 55, 23, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33', 1, 1, 0),
(60, 55, 24, 1, '2019-04-18 22:36:08', '2019-04-18 22:36:08', 1, 1, 0),
(61, 55, 25, 1, '2019-04-18 22:36:49', '2019-04-18 22:36:49', 1, 1, 0),
(62, 56, 26, 1, '2019-04-18 22:38:01', '2019-04-18 22:38:01', 1, 1, 0),
(63, 56, 27, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17', 1, 1, 0),
(64, 56, 28, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37', 1, 1, 0),
(65, 56, 29, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prk_add_property_availabilities`
--

CREATE TABLE `prk_add_property_availabilities` (
  `availability_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prk_add_property_cancellation_policies`
--

CREATE TABLE `prk_add_property_cancellation_policies` (
  `prk_cancellation_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `cancellation_policy_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_add_property_cancellation_policies`
--

INSERT INTO `prk_add_property_cancellation_policies` (`prk_cancellation_id`, `property_id`, `cancellation_policy_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 1, 8, 1, '2019-04-16 21:55:07', '2019-04-16 21:55:07', 1, 1, 0),
(2, 1, 9, 1, '2019-04-17 04:19:09', '2019-04-17 04:19:09', 1, 1, 0),
(3, 1, 9, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46', 1, 1, 0),
(4, 1, 8, 1, '2019-04-17 07:25:04', '2019-04-17 07:25:04', 1, 1, 0),
(5, 1, 8, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27', 1, 1, 0),
(6, 1, 8, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(7, 1, 8, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(8, 1, 9, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(9, 1, 9, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(10, 1, 9, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(11, 1, 9, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(12, 1, 9, 1, '2019-04-18 07:22:04', '2019-04-18 07:22:04', 1, 1, 0),
(13, 1, 9, 1, '2019-04-18 07:47:09', '2019-04-18 07:47:09', 1, 1, 0),
(14, 1, 9, 1, '2019-04-18 07:47:23', '2019-04-18 07:47:23', 1, 1, 0),
(15, 1, 9, 1, '2019-04-18 09:05:36', '2019-04-18 09:05:36', 1, 1, 0),
(16, 1, 9, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(17, 1, 9, 1, '2019-04-18 12:06:43', '2019-04-18 12:06:43', 1, 1, 0),
(18, 1, 9, 1, '2019-04-18 12:14:33', '2019-04-18 12:14:33', 1, 1, 0),
(19, 1, 9, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(20, 1, 9, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(21, 1, 9, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(22, 1, 9, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05', 1, 1, 0),
(23, 1, 9, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33', 1, 1, 0),
(24, 1, 8, 1, '2019-04-18 22:36:09', '2019-04-18 22:36:09', 1, 1, 0),
(25, 1, 8, 1, '2019-04-18 22:36:50', '2019-04-18 22:36:50', 1, 1, 0),
(26, 1, 8, 1, '2019-04-18 22:38:02', '2019-04-18 22:38:02', 1, 1, 0),
(27, 1, 8, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17', 1, 1, 0),
(28, 1, 8, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37', 1, 1, 0),
(29, 1, 8, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prk_add_property_files`
--

CREATE TABLE `prk_add_property_files` (
  `file_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'File Name',
  `property_id` int(11) UNSIGNED NOT NULL,
  `document_type_id` int(11) UNSIGNED NOT NULL COMMENT '1-Image,2-Floor plan,3-Ownersheep proof',
  `default_file` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_add_property_files`
--

INSERT INTO `prk_add_property_files` (`file_id`, `name`, `property_id`, `document_type_id`, `default_file`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, '1555451707-maxresdefault.jpg', 1, 1, 1, 1, '2019-04-16 21:55:07', '2019-04-16 21:55:07', 1, 1, 0),
(2, '1555451707-maxresdefault.jpg', 1, 3, 1, 1, '2019-04-16 21:55:07', '2019-04-16 21:55:07', 1, 1, 0),
(3, '1555451707-maxresdefault.jpg', 1, 2, 1, 1, '2019-04-16 21:55:07', '2019-04-16 21:55:07', 1, 1, 0),
(4, '1555474746-11Fir20-1.jpeg', 2, 1, 1, 1, '2019-04-17 04:19:06', '2019-04-17 04:19:06', 1, 1, 0),
(5, '1555474746-54ff8221281ea-farmhouse-modern-aliving-room-xln.jpg', 2, 3, 1, 1, '2019-04-17 04:19:06', '2019-04-17 04:19:06', 1, 1, 0),
(6, '1555474746-1-1090-Cordova-Blvd-NE-Saint-print-001-2-Front-dusk-4200x2800-300dpiTW.jpg', 2, 2, 1, 1, '2019-04-17 04:19:09', '2019-04-17 04:19:09', 1, 1, 0),
(7, '1555476046-9.jpg', 3, 1, 1, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46', 1, 1, 0),
(8, '1555476046-1 - Copy.png', 3, 3, 1, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46', 1, 1, 0),
(9, '1555476046-9.jpg', 3, 2, 1, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46', 1, 1, 0),
(10, '1555485902-Project-Photo-26-Poonamallee-Farms-Chennai-5093743_536_775_310_462.jpg', 4, 1, 1, 1, '2019-04-17 07:25:02', '2019-04-17 07:25:02', 1, 1, 0),
(11, '1555485902-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 4, 3, 1, 1, '2019-04-17 07:25:04', '2019-04-17 07:25:04', 1, 1, 0),
(12, '1555485904-parallel-parking.jpg', 4, 2, 1, 1, '2019-04-17 07:25:04', '2019-04-17 07:25:04', 1, 1, 0),
(13, '1555485987-Project-Photo-26-Poonamallee-Farms-Chennai-5093743_536_775_310_462.jpg', 5, 1, 1, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27', 1, 1, 0),
(14, '1555485987-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 5, 3, 1, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27', 1, 1, 0),
(15, '1555485987-parallel-parking.jpg', 5, 2, 1, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27', 1, 1, 0),
(16, '1555486220-Project-Photo-26-Poonamallee-Farms-Chennai-5093743_536_775_310_462.jpg', 6, 1, 1, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(17, '1555486220-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 6, 3, 1, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(18, '1555486220-_100631136_p062sdq8.jpg', 6, 2, 1, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(19, '1555486220-100_3472 (1).JPG', 6, 2, 0, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(20, '1555486220-1912018-9016-1.jpg', 6, 2, 0, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(21, '1555486220-3446348.jpg', 6, 2, 0, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(22, '1555486220-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 6, 2, 0, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(23, '1555486220-2380902598_e965511842_o.jpg', 6, 2, 0, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(24, '1555486220-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 6, 2, 0, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(25, '1555486222-Project-Photo-26-Poonamallee-Farms-Chennai-5093743_536_775_310_462.jpg', 7, 1, 1, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(26, '1555486222-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 7, 3, 1, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(27, '1555486222-_100631136_p062sdq8.jpg', 7, 2, 1, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(28, '1555486222-100_3472 (1).JPG', 7, 2, 0, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(29, '1555486222-1912018-9016-1.jpg', 7, 2, 0, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(30, '1555486222-3446348.jpg', 7, 2, 0, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(31, '1555486222-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 7, 2, 0, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(32, '1555486222-2380902598_e965511842_o.jpg', 7, 2, 0, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(33, '1555486222-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 7, 2, 0, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(34, '1555494024-_100631136_p062sdq8.jpg', 8, 1, 1, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(35, '1555494024-100_3472.JPG', 8, 1, 0, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(36, '1555494024-5760.jpg', 8, 1, 0, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(37, '1555494024-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 8, 1, 0, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(38, '1555494024-2380902598_e965511842_o.jpg', 8, 1, 0, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(39, '1555494024-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 8, 1, 0, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(40, '1555494024-computech-digital-land-survey-edapally-ernakulam-land-surveyors-9y2cm.jpg', 8, 3, 1, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(41, '1555494024-100_3472 (1).JPG', 8, 2, 1, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(42, '1555495154-_100631136_p062sdq8.jpg', 9, 1, 1, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(43, '1555495154-14.jpg', 9, 1, 0, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(44, '1555495154-100_3472 (1).JPG', 9, 1, 0, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(45, '1555495154-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 9, 1, 0, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(46, '1555495154-2380902598_e965511842_o.jpg', 9, 1, 0, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(47, '1555495154-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 9, 1, 0, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(48, '1555495154-14.jpg', 9, 3, 1, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(49, '1555495154-Project-Photo-26-Poonamallee-Farms-Chennai-5093743_536_775_310_462.jpg', 9, 2, 1, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(50, '1555499856-_100631136_p062sdq8.jpg', 10, 1, 1, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(51, '1555499856-14.jpg', 10, 1, 0, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(52, '1555499856-100_3472 (1).JPG', 10, 1, 0, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(53, '1555499856-1912018-9016-1.jpg', 10, 1, 0, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(54, '1555499856-3446348.jpg', 10, 1, 0, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(55, '1555499856-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 10, 1, 0, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(56, '1555499856-computech-digital-land-survey-edapally-ernakulam-land-surveyors-9y2cm.jpg', 10, 3, 1, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(57, '1555499856-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 10, 2, 1, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(58, '1555501658-100_3472 (1).JPG', 11, 1, 1, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(59, '1555501658-100_3472.JPG', 11, 1, 0, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(60, '1555501658-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 11, 1, 0, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(61, '1555501658-2380902598_e965511842_o.jpg', 11, 1, 0, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(62, '1555501658-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 11, 1, 0, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(63, '1555501658-worst_Parallel_parking.jpg', 11, 3, 1, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(64, '1555501658-parallel-parking.jpg', 11, 2, 1, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(65, '1555572122-100_3472.JPG', 12, 1, 1, 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(66, '1555572122-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 12, 1, 0, 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(67, '1555572122-2380902598_e965511842_o.jpg', 12, 1, 0, 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(68, '1555572122-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 12, 1, 0, 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(69, '1555572122-Cyclehoop 1.jpg', 12, 3, 1, 1, '2019-04-18 07:22:04', '2019-04-18 07:22:04', 1, 1, 0),
(70, '1555572124-doc721q5gszlco105no33jt_doc6ul1ti132tdr07br3lo.jpg', 12, 2, 1, 1, '2019-04-18 07:22:04', '2019-04-18 07:22:04', 1, 1, 0),
(71, '1555573629-architecture-car-daylight-1475938.jpg', 13, 1, 1, 1, '2019-04-18 07:47:09', '2019-04-18 07:47:09', 1, 1, 0),
(72, '1555573629-architecture-book-shelves-bookcase-245240.jpg', 13, 3, 1, 1, '2019-04-18 07:47:09', '2019-04-18 07:47:09', 1, 1, 0),
(73, '1555573629-architecture-car-daylight-1475938.jpg', 13, 2, 1, 1, '2019-04-18 07:47:09', '2019-04-18 07:47:09', 1, 1, 0),
(74, '1555573641-architecture-car-daylight-1475938.jpg', 14, 1, 1, 1, '2019-04-18 07:47:21', '2019-04-18 07:47:21', 1, 1, 0),
(75, '1555573641-architecture-book-shelves-bookcase-245240.jpg', 14, 3, 1, 1, '2019-04-18 07:47:23', '2019-04-18 07:47:23', 1, 1, 0),
(76, '1555573643-architecture-car-daylight-1475938.jpg', 14, 2, 1, 1, '2019-04-18 07:47:23', '2019-04-18 07:47:23', 1, 1, 0),
(77, '1555578333-cycle-parking.jpg', 15, 1, 1, 1, '2019-04-18 09:05:36', '2019-04-18 09:05:36', 1, 1, 0),
(78, '1555578333-Cykelparkering-Bruuns-Bro1.jpg', 15, 1, 0, 1, '2019-04-18 09:05:36', '2019-04-18 09:05:36', 1, 1, 0),
(79, '1555578336-doc721q5gszlco105no33jt_doc6ul1ti132tdr07br3lo.jpg', 15, 1, 0, 1, '2019-04-18 09:05:36', '2019-04-18 09:05:36', 1, 1, 0),
(80, '1555578336-DSC02607_crp__noLicensePlt_web.jpg', 15, 1, 0, 1, '2019-04-18 09:05:36', '2019-04-18 09:05:36', 1, 1, 0),
(81, '1555578336-parallel-parking.jpg', 15, 3, 1, 1, '2019-04-18 09:05:36', '2019-04-18 09:05:36', 1, 1, 0),
(82, '1555578336-sfe_tr_section_bike_cage2_920x330.jpg', 15, 2, 1, 1, '2019-04-18 09:05:36', '2019-04-18 09:05:36', 1, 1, 0),
(83, '1555583129-Parking-A.jpg', 16, 1, 1, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(84, '1555583129-land-for-sale_3.jpg', 16, 3, 1, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(85, '1555583129-mickleover-phase1-557x418.jpg', 16, 3, 0, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(86, '1555583129-o_1aqa5bjfa1ofqobh85qt38sok7.jpg', 16, 3, 0, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(87, '1555583129-Selling.jpg', 16, 3, 0, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(88, '1555583129-worst_Parallel_parking.jpg', 16, 2, 1, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(89, '1555589200-camera-macro-optics-122400.jpg', 17, 1, 1, 1, '2019-04-18 12:06:43', '2019-04-18 12:06:43', 1, 1, 0),
(90, 'nwdoc.pdf', 17, 3, 1, 1, '2019-04-18 12:06:43', '2019-04-18 21:06:08', 1, 1, 0),
(91, '1555589203-architecture-building-driveway-186077.jpg', 17, 2, 1, 1, '2019-04-18 12:06:43', '2019-04-18 12:06:43', 1, 1, 0),
(92, '1555589670-ri_ka_09-930x708.jpg', 18, 1, 1, 1, '2019-04-18 12:14:30', '2019-04-18 12:14:30', 1, 1, 0),
(93, '1555589670-Land_of_Waves.png', 18, 3, 1, 1, '2019-04-18 12:14:33', '2019-04-18 12:14:33', 1, 1, 0),
(94, '1555589673-hqdefault.jpg', 18, 2, 1, 1, '2019-04-18 12:14:33', '2019-04-18 12:14:33', 1, 1, 0),
(95, '1555590571-images (1).jpg', 19, 1, 1, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(96, '1555590571-shutterstock_521926666-e1508347182482.jpg', 19, 3, 1, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(97, '1555590571-images.jpg', 19, 2, 1, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(98, '1555590603-images (1).jpg', 20, 1, 1, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(99, '1555590603-shutterstock_521926666-e1508347182482.jpg', 20, 3, 1, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(100, '1555590603-images.jpg', 20, 2, 1, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(101, '1555590604-images (1).jpg', 21, 1, 1, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(102, '1555590604-shutterstock_521926666-e1508347182482.jpg', 21, 3, 1, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(103, '1555590604-images.jpg', 21, 2, 1, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(104, '1555590605-images (1).jpg', 22, 1, 1, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05', 1, 1, 0),
(105, '1555590605-shutterstock_521926666-e1508347182482.jpg', 22, 3, 1, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05', 1, 1, 0),
(106, '1555590605-images.jpg', 22, 2, 1, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05', 1, 1, 0),
(107, '1555626633-cash-rent.jpg', 23, 1, 1, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33', 1, 1, 0),
(108, '1555626633-cash-rent.jpg', 23, 3, 1, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33', 1, 1, 0),
(109, '1555626633-cash-rent.jpg', 23, 2, 1, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33', 1, 1, 0),
(110, '1555626968-cash-rent.jpg', 24, 1, 1, 1, '2019-04-18 22:36:08', '2019-04-18 22:36:08', 1, 1, 0),
(111, '1555626968-index.jpg', 24, 3, 1, 1, '2019-04-18 22:36:08', '2019-04-18 22:36:08', 1, 1, 0),
(112, '1555626969-cash-rent.jpg', 24, 2, 1, 1, '2019-04-18 22:36:09', '2019-04-18 22:36:09', 1, 1, 0),
(113, '1555627010-cash-rent.jpg', 25, 1, 1, 1, '2019-04-18 22:36:50', '2019-04-18 22:36:50', 1, 1, 0),
(114, '1555627010-index.jpg', 25, 3, 1, 1, '2019-04-18 22:36:50', '2019-04-18 22:36:50', 1, 1, 0),
(115, '1555627010-cash-rent.jpg', 25, 2, 1, 1, '2019-04-18 22:36:50', '2019-04-18 22:36:50', 1, 1, 0),
(116, '1555627082-images.jpg', 26, 1, 1, 1, '2019-04-18 22:38:02', '2019-04-18 22:38:02', 1, 1, 0),
(117, '1555627082-cash-rent.jpg', 26, 3, 1, 1, '2019-04-18 22:38:02', '2019-04-18 22:38:02', 1, 1, 0),
(118, '1555627082-cash-rent.jpg', 26, 2, 1, 1, '2019-04-18 22:38:02', '2019-04-18 22:38:02', 1, 1, 0),
(119, '1555627097-images.jpg', 27, 1, 1, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17', 1, 1, 0),
(120, '1555627097-cash-rent.jpg', 27, 3, 1, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17', 1, 1, 0),
(121, '1555627097-cash-rent.jpg', 27, 2, 1, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17', 1, 1, 0),
(122, '1555627237-cash-rent.jpg', 28, 1, 1, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37', 1, 1, 0),
(123, '1555627237-cash-rent.jpg', 28, 3, 1, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37', 1, 1, 0),
(124, '1555627237-images.jpg', 28, 2, 1, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37', 1, 1, 0),
(125, '1555731698-images.jpg', 29, 1, 1, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38', 1, 1, 0),
(126, '1555731698-cash-rent.jpg', 29, 3, 1, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prk_add_property_floors`
--

CREATE TABLE `prk_add_property_floors` (
  `floor_id` int(11) UNSIGNED NOT NULL,
  `floor_name` varchar(100) NOT NULL,
  `total_parking_spots` int(11) NOT NULL,
  `parking_type_id` int(11) UNSIGNED NOT NULL COMMENT '1-Self,2-Valet,3-Reserved,4-Handicap',
  `property_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_add_property_floors`
--

INSERT INTO `prk_add_property_floors` (`floor_id`, `floor_name`, `total_parking_spots`, `parking_type_id`, `property_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'F1', 1, 1, 1, 1, '2019-04-16 21:55:07', '2019-04-16 21:55:07', 1, 1, 0),
(2, 'p1', 20, 1, 2, 1, '2019-04-17 04:19:06', '2019-04-17 04:19:06', 1, 1, 0),
(3, 'p1', 20, 1, 3, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46', 1, 1, 0),
(4, '67', 76, 1, 4, 1, '2019-04-17 07:25:02', '2019-04-17 07:25:02', 1, 1, 0),
(5, '67', 76, 1, 5, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27', 1, 1, 0),
(6, '67', 76, 1, 6, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(7, '67', 76, 1, 7, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(8, '2', 40, 1, 8, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(9, 'p1', 2, 1, 9, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(10, 'p1', 4, 1, 10, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(11, 'parking1', 20, 3, 11, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(12, 'parking2', 30, 5, 11, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(13, 'p1', 50, 3, 12, 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(14, 'p2', 60, 4, 12, 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(15, 'p2', 1, 1, 13, 1, '2019-04-18 07:47:09', '2019-04-18 07:47:09', 1, 1, 0),
(16, 'p2', 1, 1, 14, 1, '2019-04-18 07:47:21', '2019-04-18 07:47:21', 1, 1, 0),
(17, 'p1', 30, 3, 15, 1, '2019-04-18 09:05:33', '2019-04-18 09:05:33', 1, 1, 0),
(18, 'p1', 30, 4, 16, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(19, 'ldsvmv', 6, 1, 17, 1, '2019-04-18 12:06:40', '2019-04-18 12:06:40', 1, 1, 0),
(20, 'p1', 20, 4, 18, 1, '2019-04-18 12:14:30', '2019-04-18 12:14:30', 1, 1, 0),
(21, 'p22', 2, 1, 19, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(22, 'p22', 2, 1, 20, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(23, 'p22', 2, 1, 21, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(24, 'p22', 2, 1, 22, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05', 1, 1, 0),
(25, 'F1', 1, 1, 23, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33', 1, 1, 0),
(26, 'F1', 1, 1, 24, 1, '2019-04-18 22:36:08', '2019-04-18 22:36:08', 1, 1, 0),
(27, 'F1', 1, 1, 25, 1, '2019-04-18 22:36:49', '2019-04-18 22:36:49', 1, 1, 0),
(28, '1', 1, 1, 26, 1, '2019-04-18 22:38:01', '2019-04-18 22:38:01', 1, 1, 0),
(29, '1', 1, 1, 27, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17', 1, 1, 0),
(30, 'F1', 1, 1, 28, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37', 1, 1, 0),
(31, '1', 1, 1, 29, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prk_add_property_rent`
--

CREATE TABLE `prk_add_property_rent` (
  `rent_id` int(11) UNSIGNED NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `duration_type_id` int(11) UNSIGNED NOT NULL COMMENT 'Booking Duration Type 1-Hourly,2-Daily,3-Monthly',
  `car_type_id` int(11) UNSIGNED NOT NULL,
  `rent_amount` varchar(100) NOT NULL COMMENT 'In Doller($)',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_add_property_rent`
--

INSERT INTO `prk_add_property_rent` (`rent_id`, `property_id`, `duration_type_id`, `car_type_id`, `rent_amount`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 1, 1, 1, '1', 1, '2019-04-16 21:55:07', '2019-04-16 21:55:07', 1, 1, 0),
(2, 1, 2, 1, '2', 1, '2019-04-16 21:55:07', '2019-04-16 21:55:07', 1, 1, 0),
(3, 1, 3, 1, '3', 1, '2019-04-16 21:55:07', '2019-04-16 21:55:07', 1, 1, 0),
(4, 2, 1, 1, '6', 1, '2019-04-17 04:19:06', '2019-04-17 04:19:06', 1, 1, 0),
(5, 2, 2, 1, '7', 1, '2019-04-17 04:19:06', '2019-04-17 04:19:06', 1, 1, 0),
(6, 2, 3, 1, '8', 1, '2019-04-17 04:19:06', '2019-04-17 04:19:06', 1, 1, 0),
(7, 3, 1, 1, '4', 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46', 1, 1, 0),
(8, 3, 2, 1, '5', 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46', 1, 1, 0),
(9, 3, 3, 1, '6', 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46', 1, 1, 0),
(10, 4, 1, 1, '76', 1, '2019-04-17 07:25:02', '2019-04-17 07:25:02', 1, 1, 0),
(11, 4, 2, 1, '7', 1, '2019-04-17 07:25:02', '2019-04-17 07:25:02', 1, 1, 0),
(12, 4, 3, 1, '7', 1, '2019-04-17 07:25:02', '2019-04-17 07:25:02', 1, 1, 0),
(13, 5, 1, 1, '76', 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27', 1, 1, 0),
(14, 5, 2, 1, '7', 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27', 1, 1, 0),
(15, 5, 3, 1, '7', 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27', 1, 1, 0),
(16, 6, 1, 1, '76', 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(17, 6, 2, 1, '7', 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(18, 6, 3, 1, '7', 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20', 1, 1, 0),
(19, 7, 1, 1, '76', 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(20, 7, 2, 1, '7', 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(21, 7, 3, 1, '7', 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22', 1, 1, 0),
(22, 8, 1, 1, '2', 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(23, 8, 2, 1, '3', 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(24, 8, 3, 1, '4', 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24', 1, 1, 0),
(25, 9, 1, 1, '2', 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(26, 9, 2, 1, '3', 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(27, 9, 3, 1, '4', 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14', 1, 1, 0),
(28, 10, 1, 1, '3', 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(29, 10, 2, 1, '4', 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(30, 10, 3, 1, '5', 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36', 1, 1, 0),
(31, 11, 1, 6, '6', 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(32, 11, 2, 6, '8', 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(33, 11, 3, 6, '10', 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38', 1, 1, 0),
(34, 12, 1, 4, '20', 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(35, 12, 2, 4, '30', 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(36, 12, 3, 4, '30', 1, '2019-04-18 07:22:02', '2019-04-18 07:22:02', 1, 1, 0),
(37, 13, 1, 2, '2', 1, '2019-04-18 07:47:09', '2019-04-18 07:47:09', 1, 1, 0),
(38, 13, 2, 2, '6', 1, '2019-04-18 07:47:09', '2019-04-18 07:47:09', 1, 1, 0),
(39, 13, 3, 2, '1', 1, '2019-04-18 07:47:09', '2019-04-18 07:47:09', 1, 1, 0),
(40, 14, 1, 2, '2', 1, '2019-04-18 07:47:21', '2019-04-18 07:47:21', 1, 1, 0),
(41, 14, 2, 2, '6', 1, '2019-04-18 07:47:21', '2019-04-18 07:47:21', 1, 1, 0),
(42, 14, 3, 2, '1', 1, '2019-04-18 07:47:21', '2019-04-18 07:47:21', 1, 1, 0),
(43, 15, 1, 3, '2', 1, '2019-04-18 09:05:33', '2019-04-18 09:05:33', 1, 1, 0),
(44, 15, 2, 3, '3', 1, '2019-04-18 09:05:33', '2019-04-18 09:05:33', 1, 1, 0),
(45, 15, 3, 3, '4', 1, '2019-04-18 09:05:33', '2019-04-18 09:05:33', 1, 1, 0),
(46, 16, 1, 3, '2', 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(47, 16, 2, 3, '3', 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(48, 16, 3, 3, '4', 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29', 1, 1, 0),
(49, 17, 1, 2, '2', 1, '2019-04-18 12:06:40', '2019-04-18 12:06:40', 1, 1, 0),
(50, 17, 2, 2, '3', 1, '2019-04-18 12:06:40', '2019-04-18 12:06:40', 1, 1, 0),
(51, 17, 3, 2, '4', 1, '2019-04-18 12:06:40', '2019-04-18 12:06:40', 1, 1, 0),
(52, 18, 1, 3, '5', 1, '2019-04-18 12:14:30', '2019-04-18 12:14:30', 1, 1, 0),
(53, 18, 2, 3, '10', 1, '2019-04-18 12:14:30', '2019-04-18 12:14:30', 1, 1, 0),
(54, 18, 3, 3, '30', 1, '2019-04-18 12:14:30', '2019-04-18 12:14:30', 1, 1, 0),
(55, 19, 1, 2, '1', 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(56, 19, 2, 2, '5', 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(57, 19, 3, 2, '6', 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31', 1, 1, 0),
(58, 20, 1, 2, '1', 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(59, 20, 2, 2, '5', 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(60, 20, 3, 2, '6', 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03', 1, 1, 0),
(61, 21, 1, 2, '1', 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(62, 21, 2, 2, '5', 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(63, 21, 3, 2, '6', 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04', 1, 1, 0),
(64, 22, 1, 2, '1', 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05', 1, 1, 0),
(65, 22, 2, 2, '5', 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05', 1, 1, 0),
(66, 22, 3, 2, '6', 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05', 1, 1, 0),
(67, 23, 1, 6, '1', 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33', 1, 1, 0),
(68, 23, 2, 6, '1', 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33', 1, 1, 0),
(69, 23, 3, 6, '1', 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33', 1, 1, 0),
(70, 24, 1, 2, '1', 1, '2019-04-18 22:36:08', '2019-04-18 22:36:08', 1, 1, 0),
(71, 24, 2, 2, '2', 1, '2019-04-18 22:36:08', '2019-04-18 22:36:08', 1, 1, 0),
(72, 24, 3, 2, '22', 1, '2019-04-18 22:36:08', '2019-04-18 22:36:08', 1, 1, 0),
(73, 25, 1, 2, '1', 1, '2019-04-18 22:36:49', '2019-04-18 22:36:49', 1, 1, 0),
(74, 25, 2, 2, '2', 1, '2019-04-18 22:36:49', '2019-04-18 22:36:49', 1, 1, 0),
(75, 25, 3, 2, '22', 1, '2019-04-18 22:36:49', '2019-04-18 22:36:49', 1, 1, 0),
(76, 26, 1, 2, '1', 1, '2019-04-18 22:38:01', '2019-04-18 22:38:01', 1, 1, 0),
(77, 26, 2, 2, '1', 1, '2019-04-18 22:38:01', '2019-04-18 22:38:01', 1, 1, 0),
(78, 26, 3, 2, '1', 1, '2019-04-18 22:38:01', '2019-04-18 22:38:01', 1, 1, 0),
(79, 27, 1, 2, '1', 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17', 1, 1, 0),
(80, 27, 2, 2, '1', 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17', 1, 1, 0),
(81, 27, 3, 2, '1', 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17', 1, 1, 0),
(82, 28, 1, 4, '1', 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37', 1, 1, 0),
(83, 28, 2, 4, '2', 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37', 1, 1, 0),
(84, 28, 3, 4, '3', 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37', 1, 1, 0),
(85, 29, 1, 5, '1', 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38', 1, 1, 0),
(86, 29, 2, 5, '2', 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38', 1, 1, 0),
(87, 29, 3, 5, '3', 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prk_amenity_categories`
--

CREATE TABLE `prk_amenity_categories` (
  `amenity_cat_id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-No,1-Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prk_amenity_categories`
--

INSERT INTO `prk_amenity_categories` (`amenity_cat_id`, `category_name`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'am12', 1, '2019-03-19 21:49:56', '2019-03-19 21:50:16', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prk_car_type`
--

CREATE TABLE `prk_car_type` (
  `car_type_id` int(11) UNSIGNED NOT NULL,
  `car_type` varchar(100) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT ' 	0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-No,1-Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_car_type`
--

INSERT INTO `prk_car_type` (`car_type_id`, `car_type`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'Hatchback', 1, '2019-03-20 00:30:49', '2019-03-22 19:42:53', 1, 1, 0),
(2, 'Sedan', 1, '2019-03-20 00:30:49', '2019-03-20 00:30:49', 0, 0, 0),
(3, 'MPV', 1, '2019-03-20 00:30:49', '2019-03-20 00:30:49', 0, 0, 0),
(4, 'SUV', 1, '2019-03-20 00:30:49', '2019-03-20 00:30:49', 0, 0, 0),
(5, 'Crossover', 1, '2019-03-20 00:30:49', '2019-03-20 00:30:49', 0, 0, 0),
(6, 'Coupe', 1, '2019-03-20 00:30:49', '2019-03-20 00:30:49', 0, 0, 0),
(7, 'Convertible', 1, '2019-03-20 00:30:49', '2019-03-20 00:30:49', 0, 0, 0),
(8, 'test', 1, '2019-03-22 17:52:35', '2019-03-27 17:35:39', 1, 1, 1),
(9, 'test', 1, '2019-03-22 17:55:34', '2019-03-27 17:25:22', 1, 1, 1),
(10, 'a', 1, '2019-03-22 17:56:01', '2019-03-27 17:25:31', 1, 1, 1),
(11, 'tt', 1, '2019-03-22 17:58:29', '2019-03-27 17:25:36', 1, 1, 1),
(12, 'test', 1, '2019-03-22 18:00:21', '2019-03-27 17:35:34', 1, 1, 1),
(13, 'rd', 0, '2019-03-22 18:11:14', '2019-03-27 17:35:28', 1, 1, 1),
(14, 'aaaa', 1, '2019-03-22 18:23:56', '2019-03-22 20:06:48', 1, 1, 1),
(15, 'Small Car11', 0, '2019-03-22 18:30:51', '2019-03-22 20:05:19', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prk_parking_type`
--

CREATE TABLE `prk_parking_type` (
  `parking_type_id` int(11) UNSIGNED NOT NULL,
  `parking_type` varchar(100) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_parking_type`
--

INSERT INTO `prk_parking_type` (`parking_type_id`, `parking_type`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'Self', 1, '2019-03-19 22:05:09', '2019-03-19 22:05:09', 0, 0, 0),
(2, 'Valet', 1, '2019-03-19 22:05:09', '2019-03-19 22:05:09', 0, 0, 0),
(3, 'Reserved', 1, '2019-03-19 22:05:09', '2019-03-19 22:05:09', 0, 0, 0),
(4, 'Handicap', 1, '2019-03-19 22:05:09', '2019-03-19 22:05:09', 0, 0, 0),
(5, 'handicaps', 1, '2019-03-27 17:39:06', '2019-03-27 17:39:06', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prk_property_days_time_availability`
--

CREATE TABLE `prk_property_days_time_availability` (
  `id` int(11) NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `days` enum('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_property_days_time_availability`
--

INSERT INTO `prk_property_days_time_availability` (`id`, `property_id`, `days`, `start_time`, `end_time`, `status`, `is_deleted`, `created_by`, `modified_by`, `created_at`, `modified_at`) VALUES
(1, 1, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-16 21:55:07', '2019-04-16 21:56:08'),
(2, 1, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-16 21:55:07', '2019-04-16 22:48:32'),
(3, 1, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-16 21:55:07', '2019-04-16 21:56:11'),
(4, 1, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-16 21:55:07', '2019-04-16 21:56:13'),
(5, 1, 'Thursday', '18:00:00', '23:59:00', 1, 0, 1, 1, '2019-04-16 21:55:07', '2019-04-16 22:52:11'),
(6, 1, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-16 21:55:07', '2019-04-16 21:56:16'),
(7, 1, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-16 21:55:07', '2019-04-16 21:56:15'),
(8, 2, 'Sunday', NULL, NULL, 1, 0, 1, 1, '2019-04-17 04:19:09', '2019-04-17 04:19:09'),
(9, 2, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 04:19:09', '2019-04-17 04:19:09'),
(10, 2, 'Tuesday', NULL, NULL, 1, 0, 1, 1, '2019-04-17 04:19:09', '2019-04-17 04:19:09'),
(11, 2, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 04:19:09', '2019-04-17 04:19:09'),
(12, 2, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 04:19:09', '2019-04-17 04:19:09'),
(13, 2, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 04:19:09', '2019-04-17 04:19:09'),
(14, 2, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 04:19:09', '2019-04-17 04:19:09'),
(15, 3, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46'),
(16, 3, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46'),
(17, 3, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46'),
(18, 3, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46'),
(19, 3, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46'),
(20, 3, 'Friday', NULL, NULL, 1, 0, 1, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46'),
(21, 3, 'Saturday', NULL, NULL, 1, 0, 1, 1, '2019-04-17 04:40:46', '2019-04-17 04:40:46'),
(22, 4, 'Sunday', NULL, NULL, 1, 0, 1, 1, '2019-04-17 07:25:04', '2019-04-17 07:25:04'),
(23, 4, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:25:04', '2019-04-17 07:25:04'),
(24, 4, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:25:04', '2019-04-17 07:25:04'),
(25, 4, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:25:04', '2019-04-17 07:25:04'),
(26, 4, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:25:04', '2019-04-17 07:25:04'),
(27, 4, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:25:04', '2019-04-17 07:25:04'),
(28, 4, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:25:04', '2019-04-17 07:25:04'),
(29, 5, 'Sunday', NULL, NULL, 1, 0, 1, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27'),
(30, 5, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27'),
(31, 5, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27'),
(32, 5, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27'),
(33, 5, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27'),
(34, 5, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27'),
(35, 5, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:26:27', '2019-04-17 07:26:27'),
(36, 6, 'Sunday', NULL, NULL, 1, 0, 1, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20'),
(37, 6, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20'),
(38, 6, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20'),
(39, 6, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20'),
(40, 6, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20'),
(41, 6, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20'),
(42, 6, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:20', '2019-04-17 07:30:20'),
(43, 7, 'Sunday', NULL, NULL, 1, 0, 1, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22'),
(44, 7, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22'),
(45, 7, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22'),
(46, 7, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22'),
(47, 7, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22'),
(48, 7, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22'),
(49, 7, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 07:30:22', '2019-04-17 07:30:22'),
(50, 8, 'Sunday', NULL, NULL, 1, 0, 1, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24'),
(51, 8, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24'),
(52, 8, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24'),
(53, 8, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24'),
(54, 8, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24'),
(55, 8, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24'),
(56, 8, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 09:40:24', '2019-04-17 09:40:24'),
(57, 9, 'Sunday', '09:00:00', '18:00:00', 1, 0, 1, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14'),
(58, 9, 'Monday', '09:00:00', '18:00:00', 1, 0, 1, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14'),
(59, 9, 'Tuesday', NULL, NULL, 1, 0, 1, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14'),
(60, 9, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14'),
(61, 9, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14'),
(62, 9, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14'),
(63, 9, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 09:59:14', '2019-04-17 09:59:14'),
(64, 10, 'Sunday', NULL, NULL, 1, 0, 1, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36'),
(65, 10, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36'),
(66, 10, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36'),
(67, 10, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36'),
(68, 10, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36'),
(69, 10, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36'),
(70, 10, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:17:36', '2019-04-17 11:17:36'),
(71, 11, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:47:38', '2019-04-18 09:16:41'),
(72, 11, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:47:38', '2019-04-18 09:16:41'),
(73, 11, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:47:38', '2019-04-18 09:16:41'),
(74, 11, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38'),
(75, 11, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38'),
(76, 11, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38'),
(77, 11, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-17 11:47:38', '2019-04-17 11:47:38'),
(78, 12, 'Sunday', NULL, NULL, 1, 0, 1, 1, '2019-04-18 07:22:04', '2019-04-18 09:16:41'),
(79, 12, 'Monday', NULL, NULL, 1, 0, 1, 1, '2019-04-18 07:22:04', '2019-04-18 09:16:41'),
(80, 12, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:22:04', '2019-04-18 09:16:41'),
(81, 12, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:22:04', '2019-04-18 09:16:41'),
(82, 12, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:22:04', '2019-04-18 09:16:41'),
(83, 12, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:22:04', '2019-04-18 09:16:41'),
(84, 12, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:22:04', '2019-04-18 09:16:41'),
(85, 13, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:09', '2019-04-18 09:16:41'),
(86, 13, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:09', '2019-04-18 09:16:41'),
(87, 13, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:09', '2019-04-18 09:16:41'),
(88, 13, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:09', '2019-04-18 09:16:41'),
(89, 13, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:09', '2019-04-18 09:16:41'),
(90, 13, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:09', '2019-04-18 09:16:41'),
(91, 13, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:09', '2019-04-18 09:16:41'),
(92, 14, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:23', '2019-04-18 09:16:41'),
(93, 14, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:23', '2019-04-18 09:16:41'),
(94, 14, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:23', '2019-04-18 09:16:41'),
(95, 14, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:23', '2019-04-18 09:16:41'),
(96, 14, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:23', '2019-04-18 09:16:41'),
(97, 14, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:23', '2019-04-18 09:16:41'),
(98, 14, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 07:47:23', '2019-04-18 09:16:41'),
(99, 15, 'Sunday', NULL, NULL, 1, 0, 1, 1, '2019-04-18 09:05:36', '2019-04-18 09:16:41'),
(100, 15, 'Monday', NULL, NULL, 1, 0, 1, 1, '2019-04-18 09:05:36', '2019-04-18 09:16:41'),
(101, 15, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 09:05:36', '2019-04-18 09:16:41'),
(102, 15, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 09:05:36', '2019-04-18 09:16:41'),
(103, 15, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 09:05:36', '2019-04-18 09:16:41'),
(104, 15, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 09:05:36', '2019-04-18 09:16:41'),
(105, 15, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 09:05:36', '2019-04-18 09:16:41'),
(106, 16, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29'),
(107, 16, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29'),
(108, 16, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29'),
(109, 16, 'Wednesday', NULL, NULL, 1, 0, 1, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29'),
(110, 16, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29'),
(111, 16, 'Friday', NULL, NULL, 1, 0, 1, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29'),
(112, 16, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 10:25:29', '2019-04-18 10:25:29'),
(113, 17, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:06:43', '2019-04-18 12:06:43'),
(114, 17, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:06:43', '2019-04-18 12:06:43'),
(115, 17, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:06:43', '2019-04-18 12:06:43'),
(116, 17, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:06:43', '2019-04-18 12:06:43'),
(117, 17, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:06:43', '2019-04-18 12:06:43'),
(118, 17, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:06:43', '2019-04-18 12:06:43'),
(119, 17, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:06:43', '2019-04-18 12:06:43'),
(120, 18, 'Sunday', '09:00:00', '20:00:00', 1, 0, 1, 1, '2019-04-18 12:14:33', '2019-04-18 12:14:33'),
(121, 18, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-18 12:14:33', '2019-04-18 12:14:33'),
(122, 18, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-18 12:14:33', '2019-04-18 12:14:33'),
(123, 18, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-18 12:14:33', '2019-04-18 12:14:33'),
(124, 18, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-18 12:14:33', '2019-04-18 12:14:33'),
(125, 18, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-18 12:14:33', '2019-04-18 12:14:33'),
(126, 18, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-18 12:14:33', '2019-04-18 12:14:33'),
(127, 19, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31'),
(128, 19, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31'),
(129, 19, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31'),
(130, 19, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31'),
(131, 19, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31'),
(132, 19, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31'),
(133, 19, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:29:31', '2019-04-18 12:29:31'),
(134, 20, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03'),
(135, 20, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03'),
(136, 20, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03'),
(137, 20, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03'),
(138, 20, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03'),
(139, 20, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03'),
(140, 20, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:03', '2019-04-18 12:30:03'),
(141, 21, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04'),
(142, 21, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04'),
(143, 21, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04'),
(144, 21, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04'),
(145, 21, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04'),
(146, 21, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04'),
(147, 21, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:04', '2019-04-18 12:30:04'),
(148, 22, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05'),
(149, 22, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05'),
(150, 22, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05'),
(151, 22, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05'),
(152, 22, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05'),
(153, 22, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05'),
(154, 22, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 12:30:05', '2019-04-18 12:30:05'),
(155, 23, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33'),
(156, 23, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33'),
(157, 23, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33'),
(158, 23, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33'),
(159, 23, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33'),
(160, 23, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33'),
(161, 23, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:30:33', '2019-04-18 22:30:33'),
(162, 24, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:09', '2019-04-18 22:36:09'),
(163, 24, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:09', '2019-04-18 22:36:09'),
(164, 24, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:09', '2019-04-18 22:36:09'),
(165, 24, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:09', '2019-04-18 22:36:09'),
(166, 24, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:09', '2019-04-18 22:36:09'),
(167, 24, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:09', '2019-04-18 22:36:09'),
(168, 24, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:09', '2019-04-18 22:36:09'),
(169, 25, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:50', '2019-04-18 22:36:50'),
(170, 25, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:50', '2019-04-18 22:36:50'),
(171, 25, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:50', '2019-04-18 22:36:50'),
(172, 25, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:50', '2019-04-18 22:36:50'),
(173, 25, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:50', '2019-04-18 22:36:50'),
(174, 25, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:50', '2019-04-18 22:36:50'),
(175, 25, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:36:50', '2019-04-18 22:36:50'),
(176, 26, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:02', '2019-04-18 22:38:02'),
(177, 26, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:02', '2019-04-18 22:38:02'),
(178, 26, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:02', '2019-04-18 22:38:02'),
(179, 26, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:02', '2019-04-18 22:38:02'),
(180, 26, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:02', '2019-04-18 22:38:02'),
(181, 26, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:02', '2019-04-18 22:38:02'),
(182, 26, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:02', '2019-04-18 22:38:02'),
(183, 27, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17'),
(184, 27, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17'),
(185, 27, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17'),
(186, 27, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17'),
(187, 27, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17'),
(188, 27, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17'),
(189, 27, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:38:17', '2019-04-18 22:38:17'),
(190, 28, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37'),
(191, 28, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37'),
(192, 28, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37'),
(193, 28, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37'),
(194, 28, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37'),
(195, 28, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37'),
(196, 28, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 22:40:37', '2019-04-18 22:40:37'),
(197, 29, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38'),
(198, 29, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38'),
(199, 29, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38'),
(200, 29, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38'),
(201, 29, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38'),
(202, 29, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38'),
(203, 29, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 03:41:38', '2019-04-20 03:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `prk_user_registrations`
--

CREATE TABLE `prk_user_registrations` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email_id` varchar(30) NOT NULL,
  `address` text,
  `country` varchar(30) DEFAULT NULL,
  `user_latitude` varchar(50) DEFAULT NULL,
  `user_longitude` decimal(11,8) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profile_pic` text,
  `user_type_id` int(11) UNSIGNED NOT NULL COMMENT '1-Admin,2-Host,3-Customer,4-Team member',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active ',
  `default_user_type` int(11) NOT NULL,
  `access_token` varchar(250) DEFAULT NULL,
  `registration_type` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1-Normal,2-Social',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_user_registrations`
--

INSERT INTO `prk_user_registrations` (`user_id`, `firstname`, `lastname`, `email_id`, `address`, `country`, `user_latitude`, `user_longitude`, `contact_no`, `city`, `zipcode`, `password`, `dob`, `profile_pic`, `user_type_id`, `status`, `default_user_type`, `access_token`, `registration_type`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(2, 'Priyanka', 'KNP', 'priyanka@gmail.com', NULL, NULL, NULL, '-87.62979820', '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, 2, 1, 2, NULL, 1, '2019-03-28 19:07:00', '2019-04-16 18:38:48', 1, 1, 0),
(3, 'amol', 'kharate', 'amolkharate.wwg@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-07 12:43:24', '2019-04-09 02:44:03', 1, 1, 1),
(4, 'amol', 'kharate', 'amolh@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-08 16:25:27', '2019-04-08 16:25:27', 1, 1, 0),
(5, 'dafdad', 'asdsadasd', 'test1111@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-08 16:46:10', '2019-04-08 16:46:10', 1, 1, 0),
(6, 'dafdad', 'sdsadasd', 'tessdsadt@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-08 16:47:32', '2019-04-08 16:47:32', 1, 1, 0),
(7, 'amol122', 'test@gmail.com', 'testssdsd@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 5, 1, 2, NULL, 1, '2019-04-08 17:03:12', '2019-04-09 07:50:27', 1, 1, 0),
(8, 'amol122', 'test@gmail.com', 'test@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-08 17:10:34', '2019-04-09 05:56:43', 1, 1, 1),
(9, 'amol122', 'test@gmail.com', 'amolkharate.wwg@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-09 02:44:07', '2019-04-09 02:50:00', 1, 1, 1),
(10, 'amol', 'kharate', 'amol123@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2000-02-02', NULL, 2, 1, 2, NULL, 1, '2019-04-09 05:59:44', '2019-04-09 05:59:44', 1, 1, 0),
(11, 'amol', 'kharate', 'amolkharate.wwg@gmail.com', 'Chicago, IL, USA', NULL, '41.8781136', '-87.62979820', '9970426205', 'Chicago', '11122', '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', 'amol.jpg', 5, 1, 2, NULL, 1, '2019-04-09 06:09:13', '2019-04-16 19:15:18', 1, 1, 0),
(12, 'amol', 'kharate', 'testamol@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-09 07:48:01', '2019-04-09 07:48:01', 1, 1, 0),
(13, 'amol', 'kharate', 'amol@gmail1.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-09 08:25:42', '2019-04-09 08:25:42', 1, 1, 0),
(14, 'amol', 'kharate', 'testamo11l@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '1987-02-17', NULL, 2, 1, 2, NULL, 1, '2019-04-09 08:45:46', '2019-04-09 11:03:58', 1, 1, 0),
(15, 'amol', 'kharate', 'amolkharate.wwg1@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '1991-11-23', NULL, 2, 1, 2, NULL, 1, '2019-04-09 11:37:14', '2019-04-09 11:37:14', 1, 1, 0),
(16, 'Test', 'Subject', 'test@test.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '05a671c66aefea124cc08b76ea6d30bb', '1999-01-01', NULL, 3, 1, 3, NULL, 1, '2019-04-10 23:20:50', '2019-04-10 23:20:50', 1, 1, 0),
(17, 'roger', 'rappoport', 'rcr@procopio.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '6e2adde17ce6c1256433633a33a9e1da', '1970-12-11', NULL, 3, 1, 3, NULL, 1, '2019-04-10 23:21:10', '2019-04-10 23:21:10', 1, 1, 0),
(18, 'xyz', 'uvw', 'xyz@anonymous.com', NULL, NULL, NULL, NULL, '', NULL, NULL, 'ba88c155ba898fc8b5099893036ef205', '2001-01-01', NULL, 3, 1, 3, NULL, 1, '2019-04-10 23:21:57', '2019-04-10 23:21:57', 1, 1, 0),
(19, 'ketki', 'tarale', 'ketki.alkurn@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '1993-12-16', NULL, 2, 1, 2, NULL, 1, '2019-04-11 03:46:58', '2019-04-11 03:46:58', 1, 1, 0),
(20, 'ketki', 'tarale', 'ketki16@yopmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '1993-12-16', NULL, 2, 1, 2, NULL, 1, '2019-04-12 05:30:26', '2019-04-12 05:30:26', 1, 1, 0),
(21, 'sdasd', 'test@gmail.com', 'sdadasd.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:02:38', '2019-04-16 17:02:38', 1, 1, 0),
(22, 'erw', 'test@gmail.com', 'amolkewrharate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:05:42', '2019-04-16 17:05:42', 1, 1, 0),
(23, 'sdas', 'tesddst@gmail.com', 'amolksassaate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:10:33', '2019-04-16 17:10:33', 1, 1, 0),
(24, 'erw', 'sdsad@gmail.com', 'amolksae.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'acb0300a1f664de1da9cbb996dc0591a', '2000-01-02', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:11:12', '2019-04-16 17:11:12', 1, 1, 0),
(25, 'sdas', 'testsad@gmail.com', 'amolksadate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:23:29', '2019-04-16 17:23:29', 1, 1, 0),
(26, 'sdas', 'test@gmail.com', 'adadarate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:24:22', '2019-04-16 17:24:22', 1, 1, 0),
(27, 'sdas', 'test@gmail.com', 'amolksadsdte.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-02-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:26:56', '2019-04-16 17:26:56', 1, 1, 0),
(28, 'sdasd', 'test@gmail.com', 'amolkasdrate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-02', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:28:32', '2019-04-16 17:28:32', 1, 1, 0),
(29, 'sdad', 'test@gmail.com', 'amswrharate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2000-01-02', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:30:09', '2019-04-16 17:30:09', 1, 1, 0),
(30, 'erw', 'test@gmail.com', 'amolkasdas.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2000-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 18:45:51', '2019-04-16 18:45:51', 1, 1, 0),
(31, 'erw', 'test@gmail.com', 'amolkdasrate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 18:47:28', '2019-04-16 19:59:30', 1, 1, 1),
(32, 'ketki', 'tarale', 'customer@yopmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '1993-12-16', NULL, 3, 1, 3, NULL, 1, '2019-04-17 05:39:52', '2019-04-17 05:39:52', 1, 1, 0),
(33, '111', 'asdsdsd', 'amolk11harate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-20 03:48:28', '2019-04-20 03:48:28', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prk_user_type`
--

CREATE TABLE `prk_user_type` (
  `user_type_id` int(11) UNSIGNED NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT ' 	0 - Inactive, 1 - Active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_user_type`
--

INSERT INTO `prk_user_type` (`user_type_id`, `user_type`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`) VALUES
(1, 'Admin', 1, '2019-03-19 22:19:55', '2019-03-20 00:35:32', 0, 0),
(2, 'Host', 1, '2019-03-19 22:19:55', '0000-00-00 00:00:00', 0, 0),
(3, 'Customer', 1, '2019-03-19 22:20:36', '0000-00-00 00:00:00', 0, 0),
(4, 'Team Member', 1, '2019-03-19 22:21:57', '0000-00-00 00:00:00', 0, 4294967295),
(5, 'Both', 1, '2019-03-19 22:21:57', '0000-00-00 00:00:00', 0, 4294967295);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `admin_login_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`admin_login_id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-03-24 14:53:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_manage`
--

CREATE TABLE `tbl_module_manage` (
  `module_manage_id` int(11) NOT NULL,
  `module_manage_name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_module_manage`
--

INSERT INTO `tbl_module_manage` (`module_manage_id`, `module_manage_name`, `status`, `is_deleted`) VALUES
(2, 'Parking', 1, 0),
(3, 'Land', 1, 0),
(4, 'Industry', 1, 0),
(5, 'Developement', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_amenities`
--

CREATE TABLE `tbl_mstr_amenities` (
  `amenity_id` int(11) UNSIGNED NOT NULL,
  `amenity_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `amenity_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_amenities`
--

INSERT INTO `tbl_mstr_amenities` (`amenity_id`, `amenity_name`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`, `amenity_image`) VALUES
(54, 'wifi', 0, '2019-04-01 01:20:13', '2019-04-01 04:00:37', 1, 1, 1, NULL),
(55, 'Wifi', 1, '2019-04-01 04:01:02', '2019-04-17 05:05:22', 1, 1, 0, 'wifi.svg'),
(56, 'Wheelchair', 1, '2019-04-03 18:58:53', '2019-04-17 05:00:54', 1, 1, 0, 'wheelchair.svg'),
(57, 'Fire Extinguisher', 1, '2019-04-17 05:06:04', '2019-04-17 05:06:04', 1, 1, 0, 'fire extinguisher.svg'),
(58, 'Electric Supply', 1, '2019-04-17 05:06:22', '2019-04-17 05:06:22', 1, 1, 0, 'electric supply.svg'),
(59, 'Water supply', 1, '2019-04-17 05:06:42', '2019-04-17 05:06:42', 1, 1, 0, 'water supply.svg'),
(60, 'Security', 1, '2019-04-17 05:07:32', '2019-04-17 05:07:32', 1, 1, 0, 'security.svg'),
(61, 'EV charging', 1, '2019-04-17 05:08:16', '2019-04-17 05:11:31', 1, 1, 0, 'ev charging.png'),
(62, 'Roof', 1, '2019-04-17 05:08:58', '2019-04-17 05:08:58', 1, 1, 0, 'roof.svg'),
(63, 'Locker Room', 1, '2019-04-17 05:09:29', '2019-04-17 05:09:29', 1, 1, 0, 'locker room.svg'),
(64, 'Parking Facility', 1, '2019-04-17 05:10:32', '2019-04-17 05:10:32', 1, 1, 0, 'parking facility.svg'),
(65, 'Boundary wall', 1, '2019-04-17 05:13:20', '2019-04-17 05:13:20', 1, 1, 0, 'boundary wall.svg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_amenities_with_category`
--

CREATE TABLE `tbl_mstr_amenities_with_category` (
  `amenity_cat_id` int(11) UNSIGNED NOT NULL,
  `amenity_id` int(11) UNSIGNED NOT NULL,
  `module_manage_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `amenity_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_amenities_with_category`
--

INSERT INTO `tbl_mstr_amenities_with_category` (`amenity_cat_id`, `amenity_id`, `module_manage_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`, `amenity_image`) VALUES
(108, 56, 2, 1, '2019-04-17 05:04:18', '2019-04-17 05:04:18', 1, 1, 0, NULL),
(109, 55, 2, 1, '2019-04-17 05:05:22', '2019-04-17 05:05:22', 1, 1, 0, NULL),
(110, 55, 3, 1, '2019-04-17 05:05:22', '2019-04-17 05:05:22', 1, 1, 0, NULL),
(111, 57, 2, 1, '2019-04-17 05:06:04', '2019-04-17 05:06:04', 1, 1, 0, NULL),
(112, 57, 3, 1, '2019-04-17 05:06:04', '2019-04-17 05:06:04', 1, 1, 0, NULL),
(113, 58, 3, 1, '2019-04-17 05:06:22', '2019-04-17 05:06:22', 1, 1, 0, NULL),
(116, 59, 2, 1, '2019-04-17 05:07:05', '2019-04-17 05:07:05', 1, 1, 0, NULL),
(117, 59, 3, 1, '2019-04-17 05:07:05', '2019-04-17 05:07:05', 1, 1, 0, NULL),
(118, 60, 2, 1, '2019-04-17 05:07:32', '2019-04-17 05:07:32', 1, 1, 0, NULL),
(119, 60, 3, 1, '2019-04-17 05:07:32', '2019-04-17 05:07:32', 1, 1, 0, NULL),
(121, 62, 2, 1, '2019-04-17 05:08:58', '2019-04-17 05:08:58', 1, 1, 0, NULL),
(122, 63, 2, 1, '2019-04-17 05:09:29', '2019-04-17 05:09:29', 1, 1, 0, NULL),
(123, 64, 3, 1, '2019-04-17 05:10:32', '2019-04-17 05:10:32', 1, 1, 0, NULL),
(124, 61, 2, 1, '2019-04-17 05:11:31', '2019-04-17 05:11:31', 1, 1, 0, NULL),
(125, 65, 3, 1, '2019-04-17 05:13:20', '2019-04-17 05:13:20', 1, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_booking_duration_type`
--

CREATE TABLE `tbl_mstr_booking_duration_type` (
  `duration_type_id` int(11) UNSIGNED NOT NULL,
  `duration_type` varchar(100) NOT NULL,
  `module_manage_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-No,1-Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_booking_duration_type`
--

INSERT INTO `tbl_mstr_booking_duration_type` (`duration_type_id`, `duration_type`, `module_manage_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'Hourly', 2, 1, '2019-03-19 21:33:19', '2019-04-03 04:09:20', 0, 0, 0),
(2, 'Daily', 2, 1, '2019-03-19 21:33:19', '2019-03-24 18:55:34', 0, 0, 0),
(3, 'Monthly', 2, 1, '2019-03-19 21:33:19', '2019-03-24 18:55:36', 0, 0, 0),
(4, 'Weekly', 2, 1, '2019-04-07 03:30:50', '2019-04-07 03:30:50', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_booking_duration_type_with_module`
--

CREATE TABLE `tbl_mstr_booking_duration_type_with_module` (
  `id` int(11) UNSIGNED NOT NULL,
  `duration_type_id` int(11) UNSIGNED NOT NULL,
  `module_manage_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_booking_duration_type_with_module`
--

INSERT INTO `tbl_mstr_booking_duration_type_with_module` (`id`, `duration_type_id`, `module_manage_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(7, 1, 2, 1, '2019-04-03 04:06:58', '2019-04-03 04:06:58', 1, 1, 0),
(8, 2, 2, 1, '2019-04-03 04:06:58', '2019-04-03 04:06:58', 1, 1, 0),
(9, 3, 2, 1, '2019-04-03 04:06:58', '2019-04-03 04:06:58', 1, 1, 0),
(10, 2, 3, 1, '2019-04-03 04:06:58', '2019-04-03 04:06:58', 1, 1, 0),
(11, 3, 3, 1, '2019-04-03 04:06:58', '2019-04-03 04:06:58', 1, 1, 0),
(12, 4, 3, 1, '2019-04-07 03:31:21', '2019-04-07 03:31:21', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_cancellation_policies`
--

CREATE TABLE `tbl_mstr_cancellation_policies` (
  `cancellation_policy_id` int(11) UNSIGNED NOT NULL,
  `cancellation_policy_text` text NOT NULL,
  `cancellation_percentage` varchar(100) DEFAULT NULL,
  `module_manage_id` int(11) NOT NULL,
  `cancellation_type_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_cancellation_policies`
--

INSERT INTO `tbl_mstr_cancellation_policies` (`cancellation_policy_id`, `cancellation_policy_text`, `cancellation_percentage`, `module_manage_id`, `cancellation_type_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(8, 'Before 24 hrs – No fees/ Charges', '20', 2, 1, 1, '2019-03-27 18:30:23', '2019-03-27 18:50:45', 1, 1, 1),
(9, 'Before 23 hrs – No fees/ Charges', '20', 2, 2, 1, '2019-03-27 18:35:52', '2019-03-27 18:50:41', 1, 1, 1),
(10, 'Before 23 hrs – No fees/ Charges', '30', 3, 2, 1, '2019-03-27 18:49:09', '2019-03-27 18:50:37', 1, 1, 1),
(11, 'Before 24 hrs – No fees/ Charges', '30', 3, 2, 1, '2019-03-27 18:49:32', '2019-03-27 18:50:32', 1, 1, 1),
(12, 'Before 24 hrs – No fees/ Charges', NULL, 2, 3, 1, '2019-03-27 18:51:30', '2019-04-14 12:33:34', 1, 1, 1),
(13, 'Before 23.59 – 25% Charges', '25', 2, 4, 1, '2019-03-27 18:51:48', '2019-04-14 12:33:39', 1, 1, 0),
(18, 'Before 24 hrs – No fees/ Charges', NULL, 3, 1, 1, '2019-03-27 18:53:42', '2019-03-27 18:53:42', 1, 1, 0),
(19, 'Before 23.59 – 25% Charges', '25', 3, 1, 1, '2019-03-27 18:53:58', '2019-03-27 18:53:58', 1, 1, 0),
(20, 'Before 24 hrs – 25% Charges', '25', 3, 2, 1, '2019-03-27 18:54:17', '2019-03-27 18:54:17', 1, 1, 0),
(21, 'Before 23.59 –50% Charges', '50', 3, 2, 1, '2019-03-27 18:55:07', '2019-03-27 18:55:07', 1, 1, 0),
(22, 'Before 24 hrs – 50 fees/ Charges', '50', 3, 4, 1, '2019-03-27 18:55:29', '2019-03-27 18:55:29', 1, 1, 0),
(23, 'Before 23.59 – 100% Charges', '100', 3, 4, 1, '2019-03-27 18:55:48', '2019-03-28 18:33:58', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_cancellation_type`
--

CREATE TABLE `tbl_mstr_cancellation_type` (
  `cancellation_type_id` int(11) UNSIGNED NOT NULL,
  `cancellation_type` varchar(100) NOT NULL,
  `module_manage_id` int(11) DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_cancellation_type`
--

INSERT INTO `tbl_mstr_cancellation_type` (`cancellation_type_id`, `cancellation_type`, `module_manage_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'Moderate', NULL, 1, '2019-03-27 04:34:18', '2019-03-27 04:34:18', 1, 1, 0),
(2, 'Strict', NULL, 1, '2019-03-27 04:34:45', '2019-03-27 04:34:45', 1, 1, 0),
(3, 'Super Stricts', NULL, 0, '2019-03-27 04:36:31', '2019-03-27 04:45:16', 1, 1, 1),
(4, 'Super Strict', NULL, 1, '2019-03-27 04:45:25', '2019-03-27 04:45:25', 1, 1, 0),
(5, 'Strictmccxv', NULL, 0, '2019-03-27 18:06:35', '2019-04-13 05:34:43', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_document_type`
--

CREATE TABLE `tbl_mstr_document_type` (
  `document_type_id` int(11) UNSIGNED NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `module_manage_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_document_type`
--

INSERT INTO `tbl_mstr_document_type` (`document_type_id`, `document_type`, `module_manage_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'Image', 2, 1, '2019-03-26 01:42:19', '2019-03-26 01:42:19', 1, 1, 0),
(2, 'Ownership Proof', 2, 1, '2019-03-27 02:41:25', '2019-03-27 02:41:25', 1, 1, 0),
(3, 'Images', 2, 0, '2019-03-27 02:43:54', '2019-03-27 18:00:27', 1, 1, 0),
(4, 'Ownership Proofs', 3, 0, '2019-03-27 02:44:09', '2019-03-27 02:45:20', 1, 1, 1),
(5, 'Imagej', 3, 1, '2019-03-28 17:46:08', '2019-03-28 17:46:08', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_location_type`
--

CREATE TABLE `tbl_mstr_location_type` (
  `location_type_id` int(11) UNSIGNED NOT NULL,
  `location_type` varchar(100) NOT NULL,
  `module_manage_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_location_type`
--

INSERT INTO `tbl_mstr_location_type` (`location_type_id`, `location_type`, `module_manage_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'Covered', 2, 1, '2019-03-19 22:00:19', '2019-03-24 18:55:49', 0, 0, 0),
(2, 'Uncovered', 2, 1, '2019-03-19 22:03:52', '2019-03-24 18:55:51', 0, 0, 0),
(3, 'Both', 2, 1, '2019-03-19 22:03:52', '2019-03-24 18:55:53', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_location_type_with_module`
--

CREATE TABLE `tbl_mstr_location_type_with_module` (
  `id` int(11) UNSIGNED NOT NULL,
  `location_type_id` int(11) UNSIGNED NOT NULL,
  `module_manage_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_location_type_with_module`
--

INSERT INTO `tbl_mstr_location_type_with_module` (`id`, `location_type_id`, `module_manage_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 1, 2, 1, '2019-04-03 03:36:15', '2019-04-03 03:36:15', 1, 1, 0),
(2, 2, 2, 1, '2019-04-03 03:36:15', '2019-04-03 03:36:15', 1, 1, 0),
(3, 3, 2, 1, '2019-04-03 03:36:31', '2019-04-03 03:36:31', 1, 1, 0),
(4, 2, 3, 1, '2019-04-03 03:37:55', '2019-04-03 03:37:55', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_unit_type`
--

CREATE TABLE `tbl_mstr_unit_type` (
  `unit_type_id` int(11) UNSIGNED NOT NULL,
  `unit_type` varchar(100) NOT NULL,
  `module_manage_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_unit_type`
--

INSERT INTO `tbl_mstr_unit_type` (`unit_type_id`, `unit_type`, `module_manage_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 'Sqft', 2, 1, '2019-03-27 03:56:54', '2019-04-03 03:29:58', 1, 1, 0),
(2, 'Sq Meter', 3, 0, '2019-03-27 03:58:13', '2019-04-03 03:30:12', 1, 1, 0),
(3, 'Acres', 2, 0, '2019-03-27 03:59:41', '2019-04-03 03:30:24', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_unit_type_with_module`
--

CREATE TABLE `tbl_mstr_unit_type_with_module` (
  `unit_type_module_id` int(11) UNSIGNED NOT NULL,
  `unit_type_id` int(11) UNSIGNED NOT NULL,
  `module_manage_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_unit_type_with_module`
--

INSERT INTO `tbl_mstr_unit_type_with_module` (`unit_type_module_id`, `unit_type_id`, `module_manage_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 1, 3, 1, '2019-04-03 03:32:16', '2019-04-03 03:32:16', 1, 1, 0),
(2, 2, 3, 1, '2019-04-03 03:32:16', '2019-04-03 03:32:16', 1, 1, 0),
(3, 3, 3, 1, '2019-04-03 03:32:38', '2019-04-03 03:32:38', 1, 1, 0),
(4, 1, 2, 1, '2019-04-03 03:33:03', '2019-04-03 03:33:03', 1, 1, 0),
(5, 2, 2, 1, '2019-04-03 03:33:03', '2019-04-03 03:33:03', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property_bookings`
--

CREATE TABLE `tbl_property_bookings` (
  `booking_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `module_manage_id` int(11) UNSIGNED NOT NULL,
  `duration_type_id` int(11) DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `booking_amount` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `booking_status` enum('approved','pending','rejected','onhold','confirm') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lnd_add_land_type`
--
ALTER TABLE `lnd_add_land_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lnd_add_property`
--
ALTER TABLE `lnd_add_property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `fk_lnd_add_prop_land_type_id` (`land_type_id`),
  ADD KEY `fk_lnd_add_prop_unit_type_id` (`unit_type_id`),
  ADD KEY `fk_lnd_add_prop_module_manage_id` (`module_manage_id`),
  ADD KEY `fk_lnd_add_prop_user_id` (`user_id`);

--
-- Indexes for table `lnd_add_property_amenities`
--
ALTER TABLE `lnd_add_property_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lnd_property_amenities_property_id` (`property_id`);

--
-- Indexes for table `lnd_add_property_availabilities`
--
ALTER TABLE `lnd_add_property_availabilities`
  ADD PRIMARY KEY (`availability_id`),
  ADD KEY `fk_lnd_property_available_property_id` (`property_id`),
  ADD KEY `fk_lnd_property_available_user_id` (`user_id`);

--
-- Indexes for table `lnd_add_property_cancellation_policies`
--
ALTER TABLE `lnd_add_property_cancellation_policies`
  ADD PRIMARY KEY (`prk_cancellation_id`);

--
-- Indexes for table `lnd_add_property_files`
--
ALTER TABLE `lnd_add_property_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `fk_lnd_property_files_property_id` (`property_id`),
  ADD KEY `fk_lnd_property_files_doc_type_id` (`document_type_id`);

--
-- Indexes for table `lnd_add_property_rent`
--
ALTER TABLE `lnd_add_property_rent`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `fk_lnd_add_property_rent_id` (`property_id`);

--
-- Indexes for table `lnd_land_type`
--
ALTER TABLE `lnd_land_type`
  ADD PRIMARY KEY (`land_type_id`);

--
-- Indexes for table `prk_add_property`
--
ALTER TABLE `prk_add_property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `prk_fk_location_type_id` (`location_type_id`),
  ADD KEY `fk_prk_property_module_manage_id` (`module_manage_id`),
  ADD KEY `fk_prk_add_prop_user_id` (`user_id`);

--
-- Indexes for table `prk_add_property_amenities`
--
ALTER TABLE `prk_add_property_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prk_property_amenities_amenity_id` (`amenity_id`),
  ADD KEY `fk_prk_property_amenities_property_id` (`property_id`);

--
-- Indexes for table `prk_add_property_availabilities`
--
ALTER TABLE `prk_add_property_availabilities`
  ADD PRIMARY KEY (`availability_id`),
  ADD KEY `fk_prk_property_available_property_id` (`property_id`);

--
-- Indexes for table `prk_add_property_cancellation_policies`
--
ALTER TABLE `prk_add_property_cancellation_policies`
  ADD PRIMARY KEY (`prk_cancellation_id`);

--
-- Indexes for table `prk_add_property_files`
--
ALTER TABLE `prk_add_property_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `fk_prk_property_files_property_id` (`property_id`),
  ADD KEY `fk_prk_property_files_doc_type_id` (`document_type_id`);

--
-- Indexes for table `prk_add_property_floors`
--
ALTER TABLE `prk_add_property_floors`
  ADD PRIMARY KEY (`floor_id`),
  ADD KEY `prk_fk_parking_type_id` (`parking_type_id`),
  ADD KEY `prk_fk_property_id` (`property_id`);

--
-- Indexes for table `prk_add_property_rent`
--
ALTER TABLE `prk_add_property_rent`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `prk_fk_booking_duration_type_id` (`duration_type_id`),
  ADD KEY `prk_fk_car_type_id` (`car_type_id`);

--
-- Indexes for table `prk_amenity_categories`
--
ALTER TABLE `prk_amenity_categories`
  ADD PRIMARY KEY (`amenity_cat_id`),
  ADD UNIQUE KEY `prk_amenity_categories` (`category_name`);

--
-- Indexes for table `prk_car_type`
--
ALTER TABLE `prk_car_type`
  ADD PRIMARY KEY (`car_type_id`);

--
-- Indexes for table `prk_parking_type`
--
ALTER TABLE `prk_parking_type`
  ADD PRIMARY KEY (`parking_type_id`);

--
-- Indexes for table `prk_property_days_time_availability`
--
ALTER TABLE `prk_property_days_time_availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prk_property_daytimeavailbl_property_id` (`property_id`);

--
-- Indexes for table `prk_user_registrations`
--
ALTER TABLE `prk_user_registrations`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `prk_fk_user_type_id` (`user_type_id`);

--
-- Indexes for table `prk_user_type`
--
ALTER TABLE `prk_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD PRIMARY KEY (`admin_login_id`);

--
-- Indexes for table `tbl_module_manage`
--
ALTER TABLE `tbl_module_manage`
  ADD PRIMARY KEY (`module_manage_id`);

--
-- Indexes for table `tbl_mstr_amenities`
--
ALTER TABLE `tbl_mstr_amenities`
  ADD PRIMARY KEY (`amenity_id`);

--
-- Indexes for table `tbl_mstr_amenities_with_category`
--
ALTER TABLE `tbl_mstr_amenities_with_category`
  ADD PRIMARY KEY (`amenity_cat_id`),
  ADD KEY `fk_mstr_amenitycat_amenity_id` (`amenity_id`),
  ADD KEY `fk_mstr_amenitycat_module_manage_id` (`module_manage_id`);

--
-- Indexes for table `tbl_mstr_booking_duration_type`
--
ALTER TABLE `tbl_mstr_booking_duration_type`
  ADD PRIMARY KEY (`duration_type_id`);

--
-- Indexes for table `tbl_mstr_booking_duration_type_with_module`
--
ALTER TABLE `tbl_mstr_booking_duration_type_with_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_duration_module_id` (`module_manage_id`),
  ADD KEY `fk_booking_duration_type_id` (`duration_type_id`);

--
-- Indexes for table `tbl_mstr_cancellation_policies`
--
ALTER TABLE `tbl_mstr_cancellation_policies`
  ADD PRIMARY KEY (`cancellation_policy_id`),
  ADD KEY `fk_mstr_canceltn_polcy_module_manage_id` (`module_manage_id`),
  ADD KEY `fk_mstr_canceltn_polcy_canceltn_type_id` (`cancellation_type_id`);

--
-- Indexes for table `tbl_mstr_cancellation_type`
--
ALTER TABLE `tbl_mstr_cancellation_type`
  ADD PRIMARY KEY (`cancellation_type_id`);

--
-- Indexes for table `tbl_mstr_document_type`
--
ALTER TABLE `tbl_mstr_document_type`
  ADD PRIMARY KEY (`document_type_id`),
  ADD KEY `fk_mstr_doc_type_module_manage_id` (`module_manage_id`);

--
-- Indexes for table `tbl_mstr_location_type`
--
ALTER TABLE `tbl_mstr_location_type`
  ADD PRIMARY KEY (`location_type_id`);

--
-- Indexes for table `tbl_mstr_location_type_with_module`
--
ALTER TABLE `tbl_mstr_location_type_with_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mstr_location_type_module_id` (`module_manage_id`),
  ADD KEY `fk_mstr_location_id` (`location_type_id`);

--
-- Indexes for table `tbl_mstr_unit_type`
--
ALTER TABLE `tbl_mstr_unit_type`
  ADD PRIMARY KEY (`unit_type_id`),
  ADD KEY `fk_mstr_unit_type_module_manage_id` (`module_manage_id`);

--
-- Indexes for table `tbl_mstr_unit_type_with_module`
--
ALTER TABLE `tbl_mstr_unit_type_with_module`
  ADD PRIMARY KEY (`unit_type_module_id`),
  ADD KEY `fk_mstr_unit_type_module_id` (`module_manage_id`),
  ADD KEY `fk_mstr_unit_type_unittype_id` (`unit_type_id`);

--
-- Indexes for table `tbl_property_bookings`
--
ALTER TABLE `tbl_property_bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lnd_add_land_type`
--
ALTER TABLE `lnd_add_land_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `lnd_add_property`
--
ALTER TABLE `lnd_add_property`
  MODIFY `property_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lnd_add_property_amenities`
--
ALTER TABLE `lnd_add_property_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `lnd_add_property_availabilities`
--
ALTER TABLE `lnd_add_property_availabilities`
  MODIFY `availability_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lnd_add_property_cancellation_policies`
--
ALTER TABLE `lnd_add_property_cancellation_policies`
  MODIFY `prk_cancellation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lnd_add_property_files`
--
ALTER TABLE `lnd_add_property_files`
  MODIFY `file_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `lnd_add_property_rent`
--
ALTER TABLE `lnd_add_property_rent`
  MODIFY `rent_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `lnd_land_type`
--
ALTER TABLE `lnd_land_type`
  MODIFY `land_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prk_add_property`
--
ALTER TABLE `prk_add_property`
  MODIFY `property_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `prk_add_property_amenities`
--
ALTER TABLE `prk_add_property_amenities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `prk_add_property_availabilities`
--
ALTER TABLE `prk_add_property_availabilities`
  MODIFY `availability_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prk_add_property_cancellation_policies`
--
ALTER TABLE `prk_add_property_cancellation_policies`
  MODIFY `prk_cancellation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `prk_add_property_files`
--
ALTER TABLE `prk_add_property_files`
  MODIFY `file_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `prk_add_property_floors`
--
ALTER TABLE `prk_add_property_floors`
  MODIFY `floor_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `prk_add_property_rent`
--
ALTER TABLE `prk_add_property_rent`
  MODIFY `rent_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `prk_amenity_categories`
--
ALTER TABLE `prk_amenity_categories`
  MODIFY `amenity_cat_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prk_car_type`
--
ALTER TABLE `prk_car_type`
  MODIFY `car_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prk_parking_type`
--
ALTER TABLE `prk_parking_type`
  MODIFY `parking_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prk_property_days_time_availability`
--
ALTER TABLE `prk_property_days_time_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `prk_user_registrations`
--
ALTER TABLE `prk_user_registrations`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `prk_user_type`
--
ALTER TABLE `prk_user_type`
  MODIFY `user_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `admin_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_module_manage`
--
ALTER TABLE `tbl_module_manage`
  MODIFY `module_manage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_mstr_amenities`
--
ALTER TABLE `tbl_mstr_amenities`
  MODIFY `amenity_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_mstr_amenities_with_category`
--
ALTER TABLE `tbl_mstr_amenities_with_category`
  MODIFY `amenity_cat_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tbl_mstr_booking_duration_type`
--
ALTER TABLE `tbl_mstr_booking_duration_type`
  MODIFY `duration_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_mstr_booking_duration_type_with_module`
--
ALTER TABLE `tbl_mstr_booking_duration_type_with_module`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_mstr_cancellation_policies`
--
ALTER TABLE `tbl_mstr_cancellation_policies`
  MODIFY `cancellation_policy_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_mstr_cancellation_type`
--
ALTER TABLE `tbl_mstr_cancellation_type`
  MODIFY `cancellation_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_mstr_document_type`
--
ALTER TABLE `tbl_mstr_document_type`
  MODIFY `document_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_mstr_location_type`
--
ALTER TABLE `tbl_mstr_location_type`
  MODIFY `location_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_mstr_location_type_with_module`
--
ALTER TABLE `tbl_mstr_location_type_with_module`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_mstr_unit_type`
--
ALTER TABLE `tbl_mstr_unit_type`
  MODIFY `unit_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_mstr_unit_type_with_module`
--
ALTER TABLE `tbl_mstr_unit_type_with_module`
  MODIFY `unit_type_module_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_property_bookings`
--
ALTER TABLE `tbl_property_bookings`
  MODIFY `booking_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lnd_add_property`
--
ALTER TABLE `lnd_add_property`
  ADD CONSTRAINT `fk_lnd_add_prop_land_type_id` FOREIGN KEY (`land_type_id`) REFERENCES `lnd_land_type` (`land_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_lnd_add_prop_module_manage_id` FOREIGN KEY (`module_manage_id`) REFERENCES `tbl_module_manage` (`module_manage_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_lnd_add_prop_unit_type_id` FOREIGN KEY (`unit_type_id`) REFERENCES `tbl_mstr_unit_type` (`unit_type_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_lnd_add_prop_user_id` FOREIGN KEY (`user_id`) REFERENCES `prk_user_registrations` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `lnd_add_property_amenities`
--
ALTER TABLE `lnd_add_property_amenities`
  ADD CONSTRAINT `fk_lnd_property_amenities_property_id` FOREIGN KEY (`property_id`) REFERENCES `lnd_add_property` (`property_id`) ON DELETE CASCADE;

--
-- Constraints for table `lnd_add_property_availabilities`
--
ALTER TABLE `lnd_add_property_availabilities`
  ADD CONSTRAINT `fk_lnd_property_available_property_id` FOREIGN KEY (`property_id`) REFERENCES `lnd_add_property` (`property_id`) ON DELETE CASCADE;

--
-- Constraints for table `lnd_add_property_files`
--
ALTER TABLE `lnd_add_property_files`
  ADD CONSTRAINT `fk_lnd_property_files_doc_type_id` FOREIGN KEY (`document_type_id`) REFERENCES `tbl_mstr_document_type` (`document_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_lnd_property_files_property_id` FOREIGN KEY (`property_id`) REFERENCES `lnd_add_property` (`property_id`) ON DELETE CASCADE;

--
-- Constraints for table `lnd_add_property_rent`
--
ALTER TABLE `lnd_add_property_rent`
  ADD CONSTRAINT `fk_lnd_add_property_rent_id` FOREIGN KEY (`property_id`) REFERENCES `lnd_add_property` (`property_id`) ON DELETE CASCADE;

--
-- Constraints for table `prk_add_property`
--
ALTER TABLE `prk_add_property`
  ADD CONSTRAINT `fk_prk_add_prop_user_id` FOREIGN KEY (`user_id`) REFERENCES `prk_user_registrations` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_prk_property_location_type_id` FOREIGN KEY (`location_type_id`) REFERENCES `tbl_mstr_location_type` (`location_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_prk_property_module_manage_id` FOREIGN KEY (`module_manage_id`) REFERENCES `tbl_module_manage` (`module_manage_id`) ON DELETE CASCADE;

--
-- Constraints for table `prk_add_property_amenities`
--
ALTER TABLE `prk_add_property_amenities`
  ADD CONSTRAINT `fk_prk_property_amenities_amenity_id` FOREIGN KEY (`amenity_id`) REFERENCES `tbl_mstr_amenities` (`amenity_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_prk_property_amenities_property_id` FOREIGN KEY (`property_id`) REFERENCES `prk_add_property` (`property_id`) ON DELETE CASCADE;

--
-- Constraints for table `prk_add_property_availabilities`
--
ALTER TABLE `prk_add_property_availabilities`
  ADD CONSTRAINT `fk_prk_property_available_property_id` FOREIGN KEY (`property_id`) REFERENCES `prk_add_property` (`property_id`) ON DELETE CASCADE;

--
-- Constraints for table `prk_add_property_files`
--
ALTER TABLE `prk_add_property_files`
  ADD CONSTRAINT `fk_prk_property_files_doc_type_id` FOREIGN KEY (`document_type_id`) REFERENCES `tbl_mstr_document_type` (`document_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_prk_property_files_property_id` FOREIGN KEY (`property_id`) REFERENCES `prk_add_property` (`property_id`) ON DELETE CASCADE;

--
-- Constraints for table `prk_add_property_floors`
--
ALTER TABLE `prk_add_property_floors`
  ADD CONSTRAINT `prk_fk_parking_type_id` FOREIGN KEY (`parking_type_id`) REFERENCES `prk_parking_type` (`parking_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prk_fk_property_id` FOREIGN KEY (`property_id`) REFERENCES `prk_add_property` (`property_id`) ON DELETE CASCADE;

--
-- Constraints for table `prk_add_property_rent`
--
ALTER TABLE `prk_add_property_rent`
  ADD CONSTRAINT `prk_fk_booking_duration_type_id` FOREIGN KEY (`duration_type_id`) REFERENCES `tbl_mstr_booking_duration_type` (`duration_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prk_fk_car_type_id` FOREIGN KEY (`car_type_id`) REFERENCES `prk_car_type` (`car_type_id`) ON DELETE CASCADE;

--
-- Constraints for table `prk_user_registrations`
--
ALTER TABLE `prk_user_registrations`
  ADD CONSTRAINT `prk_fk_user_type_id` FOREIGN KEY (`user_type_id`) REFERENCES `prk_user_type` (`user_type_id`);

--
-- Constraints for table `tbl_mstr_amenities_with_category`
--
ALTER TABLE `tbl_mstr_amenities_with_category`
  ADD CONSTRAINT `fk_mstr_amenitycat_amenity_id` FOREIGN KEY (`amenity_id`) REFERENCES `tbl_mstr_amenities` (`amenity_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_mstr_amenitycat_module_manage_id` FOREIGN KEY (`module_manage_id`) REFERENCES `tbl_module_manage` (`module_manage_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_mstr_booking_duration_type_with_module`
--
ALTER TABLE `tbl_mstr_booking_duration_type_with_module`
  ADD CONSTRAINT `fk_booking_duration_type_id` FOREIGN KEY (`duration_type_id`) REFERENCES `tbl_mstr_booking_duration_type` (`duration_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_duration_module_id` FOREIGN KEY (`module_manage_id`) REFERENCES `tbl_module_manage` (`module_manage_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_mstr_cancellation_policies`
--
ALTER TABLE `tbl_mstr_cancellation_policies`
  ADD CONSTRAINT `fk_mstr_canceltn_polcy_canceltn_type_id` FOREIGN KEY (`cancellation_type_id`) REFERENCES `tbl_mstr_cancellation_type` (`cancellation_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_mstr_canceltn_polcy_module_manage_id` FOREIGN KEY (`module_manage_id`) REFERENCES `tbl_module_manage` (`module_manage_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_mstr_document_type`
--
ALTER TABLE `tbl_mstr_document_type`
  ADD CONSTRAINT `fk_mstr_doc_type_module_manage_id` FOREIGN KEY (`module_manage_id`) REFERENCES `tbl_module_manage` (`module_manage_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_mstr_location_type_with_module`
--
ALTER TABLE `tbl_mstr_location_type_with_module`
  ADD CONSTRAINT `fk_mstr_location_id` FOREIGN KEY (`location_type_id`) REFERENCES `tbl_mstr_location_type` (`location_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_mstr_location_type_module_id` FOREIGN KEY (`module_manage_id`) REFERENCES `tbl_module_manage` (`module_manage_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_mstr_unit_type`
--
ALTER TABLE `tbl_mstr_unit_type`
  ADD CONSTRAINT `fk_mstr_unit_type_module_manage_id` FOREIGN KEY (`module_manage_id`) REFERENCES `tbl_module_manage` (`module_manage_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_mstr_unit_type_with_module`
--
ALTER TABLE `tbl_mstr_unit_type_with_module`
  ADD CONSTRAINT `fk_mstr_unit_type_module_id` FOREIGN KEY (`module_manage_id`) REFERENCES `tbl_module_manage` (`module_manage_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_mstr_unit_type_unittype_id` FOREIGN KEY (`unit_type_id`) REFERENCES `tbl_mstr_unit_type` (`unit_type_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

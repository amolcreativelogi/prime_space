-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2019 at 09:57 AM
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
-- Database: `space_sharing_platform`
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
(2, 2, 14, 1, '2019-04-06 09:24:23', '2019-04-06 09:24:23', 1, 1, 0);

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
(8, 3, 2, 'Land 2', 'nashville', '36.16266380', '-86.78160000', '12345', 'test land', 1, 30, 3, 1, 1, '2019-04-05 03:06:14', '2019-04-05 03:06:14', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lnd_add_property_amenities`
--

CREATE TABLE `lnd_add_property_amenities` (
  `amenity_id` int(11) UNSIGNED NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 2, 7, '07:00:00', '23:00:00', '2019-04-04', '2019-04-30', '2019-04-05 03:08:35', '2019-04-05 03:08:35', 1, 1, 0);

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
(2, 'sadar.prop', 8, 1, 0, 1, '2019-04-05 03:07:45', '2019-04-05 03:25:07', 1, 1, 0);

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
(4, 7, 3, '100', 1, '2019-04-05 20:07:10', '2019-04-05 20:07:10', 1, 1, 0);

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
(4, 2, 2, 'sadar 1', 'sadar', '36.16266380', '-86.78160160', '37211', 'dddd', 0, 0, 1, 1, '2019-04-04 00:40:47', '2019-04-04 23:16:18', 1, 1, 0),
(29, 2, 2, 'sadar 2', 'Nagpur', '36.16266380', '-86.78160160', '37211', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quam lectus, faucibus in elit et, vehicula convallis est. Morbi lacinia, arcu vel venenatis rhoncus, arcu lorem tincidunt magna, ut sollicitudin dui massa in urna. Integer semper enim ac augue varius laoreet. Fusce vehicula libero a maximus pretium. In hac habitasse platea dictumst. Phasellus risus leo, mattis accumsan semper sed, dictum non arcu. Nam mauris tortor, sodales sit amet leo non, aliquam molestie massa. Fusce imperdiet sed metus viverra rutrum. Cras ut finibus libero. Pellentesque blandit hendrerit dolor ut dapibus. Sed a magna nisi. Nullam auctor nec nibh quis pellentesque.', 0, 0, 1, 1, '2019-04-04 01:57:32', '2019-04-06 20:21:38', 1, 1, 0),
(30, 2, 2, 'sadar 3', 'q', '36.16266380', '-86.78160160', '37211', 'q', 0, 0, 1, 1, '2019-04-04 01:57:49', '2019-04-04 23:17:59', 1, 1, 0),
(33, 3, 2, 'sadar 1', 'sadar', '36.16266380', '-86.78160160', '37211', 'dddd', 0, 0, 1, 1, '2019-04-04 05:40:47', '2019-04-05 04:16:18', 1, 1, 0),
(34, 3, 2, 'sadar 2', 'q', '36.16266380', '-86.78160160', '37211', 'q', 0, 0, 1, 1, '2019-04-04 06:57:32', '2019-04-05 04:17:54', 1, 1, 0),
(35, 3, 2, 'sadar 3', 'q', '36.16266380', '-86.78160160', '37211', 'q', 0, 0, 1, 1, '2019-04-04 06:57:49', '2019-04-05 04:17:59', 1, 1, 0),
(36, 2, 2, 'sadar 1', 'sadar', '36.16266380', '-86.78160160', '37211', 'dddd', 0, 0, 1, 1, '2019-04-04 05:40:47', '2019-04-05 04:16:18', 1, 1, 0),
(37, 2, 2, 'sadar 2', 'q', '36.16266380', '-86.78160160', '37211', 'q', 0, 0, 1, 1, '2019-04-04 06:57:32', '2019-04-05 04:17:54', 1, 1, 0),
(38, 2, 2, 'sadar 3', 'q', '36.16266380', '-86.78160160', '37211', 'q', 0, 0, 1, 1, '2019-04-04 06:57:49', '2019-04-05 04:17:59', 1, 1, 0);

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

--
-- Dumping data for table `prk_add_property_availabilities`
--

INSERT INTO `prk_add_property_availabilities` (`availability_id`, `user_id`, `property_id`, `start_time`, `end_time`, `start_date`, `end_date`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 2, 4, '07:00:00', '29:00:00', '2019-04-04', '2019-04-30', '2019-04-04 22:33:22', '2019-04-05 02:17:51', 1, 1, 0),
(2, 2, 29, '05:00:00', '08:00:00', '2019-04-04', '2019-04-08', '2019-04-04 22:34:16', '2019-04-04 22:34:16', 1, 1, 0),
(3, 2, 30, '00:00:00', '00:00:00', '2019-05-01', '2019-05-31', '2019-04-04 22:35:13', '2019-04-04 22:35:13', 1, 1, 0),
(4, 2, 30, '06:00:00', '08:00:00', '2019-07-01', '2019-08-30', '2019-04-04 22:35:59', '2019-04-04 22:37:32', 1, 1, 0),
(5, 2, 4, '07:00:00', '29:00:00', '2019-04-04', '2019-04-30', '2019-04-05 03:33:22', '2019-04-05 07:17:51', 1, 1, 0),
(6, 2, 29, '05:00:00', '08:00:00', '2019-04-04', '2019-04-08', '2019-04-05 03:34:16', '2019-04-05 03:34:16', 1, 1, 0),
(7, 2, 30, '00:00:00', '00:00:00', '2019-05-01', '2019-05-31', '2019-04-05 03:35:13', '2019-04-05 03:35:13', 1, 1, 0),
(8, 2, 30, '06:00:00', '08:00:00', '2019-07-01', '2019-08-30', '2019-04-05 03:35:59', '2019-04-05 03:37:32', 1, 1, 0);

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
(1, 'sadar.jpg', 29, 1, 1, 1, '2019-04-04 23:27:47', '2019-04-06 20:31:00', 1, 1, 0),
(2, 'sadarprop.jpg', 29, 1, 0, 1, '2019-04-04 23:28:03', '2019-04-06 20:31:07', 1, 1, 0);

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
(14, 'f1', 10, 1, 29, 1, '2019-04-04 01:57:32', '2019-04-04 01:57:32', 1, 1, 0),
(15, 'f2', 2, 1, 29, 1, '2019-04-04 01:57:32', '2019-04-04 01:57:32', 1, 1, 0),
(16, 'f1', 10, 1, 30, 1, '2019-04-04 01:57:49', '2019-04-04 01:57:49', 1, 1, 0),
(17, 'f2', 2, 1, 30, 1, '2019-04-04 01:57:49', '2019-04-04 01:57:49', 1, 1, 0);

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
(1, 4, 2, 10, '20', 1, '2019-04-05 02:28:09', '2019-04-05 02:28:09', 1, 1, 0),
(2, 4, 2, 10, '20', 1, '2019-04-05 02:29:23', '2019-04-05 02:29:23', 1, 1, 0);

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
-- Table structure for table `prk_user_registrations`
--

CREATE TABLE `prk_user_registrations` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
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

INSERT INTO `prk_user_registrations` (`user_id`, `firstname`, `lastname`, `email_id`, `password`, `dob`, `user_type_id`, `status`, `default_user_type`, `access_token`, `registration_type`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(2, 'Priyanka', 'KNP', 'priyanka@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 2, 1, 2, NULL, 1, '2019-03-28 19:07:00', '2019-03-28 19:07:00', 1, 1, 0);

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
(4, 'Team Member', 1, '2019-03-19 22:21:57', '0000-00-00 00:00:00', 0, 4294967295);

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
(55, 'wifi', 1, '2019-04-01 04:01:02', '2019-04-01 04:01:02', 1, 1, 0, 'wifi.jpg'),
(56, 'wheelchaire', 1, '2019-04-03 18:58:53', '2019-04-03 18:58:53', 1, 1, 0, NULL);

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
(102, 55, 2, 1, '2019-04-01 04:01:03', '2019-04-01 04:01:03', 1, 1, 0, NULL),
(103, 55, 3, 1, '2019-04-01 04:01:03', '2019-04-03 02:42:04', 1, 1, 0, NULL),
(104, 56, 2, 1, '2019-04-03 18:58:53', '2019-04-03 18:58:53', 1, 1, 0, NULL);

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
(12, 'Before 24 hrs – No fees/ Charges', NULL, 2, 1, 1, '2019-03-27 18:51:30', '2019-03-27 18:51:30', 1, 1, 0),
(13, 'Before 23.59 – 25% Charges', '25', 2, 1, 1, '2019-03-27 18:51:48', '2019-03-27 18:51:48', 1, 1, 0),
(14, 'Before 24 hrs – 25% Charges', '25', 2, 2, 1, '2019-03-27 18:52:11', '2019-03-27 18:52:11', 1, 1, 0),
(15, 'Before 23.59 – 50% Charges', '50', 2, 2, 1, '2019-03-27 18:52:33', '2019-03-27 18:52:33', 1, 1, 0),
(16, 'Before 24 hrs – 50% Charges', '50', 2, 4, 1, '2019-03-27 18:52:52', '2019-03-27 18:52:52', 1, 1, 0),
(17, 'Before 23.59 – 100% Charges', '100', 2, 4, 1, '2019-03-27 18:53:08', '2019-03-27 18:53:08', 1, 1, 0),
(18, 'Before 24 hrs – No fees/ Charges', NULL, 3, 1, 1, '2019-03-27 18:53:42', '2019-03-27 18:53:42', 1, 1, 0),
(19, 'Before 23.59 – 25% Charges', '25', 3, 1, 1, '2019-03-27 18:53:58', '2019-03-27 18:53:58', 1, 1, 0),
(20, 'Before 24 hrs – 25% Charges', '25', 3, 2, 1, '2019-03-27 18:54:17', '2019-03-27 18:54:17', 1, 1, 0),
(21, 'Before 23.59 –50% Charges', '50', 3, 2, 1, '2019-03-27 18:55:07', '2019-03-27 18:55:07', 1, 1, 0),
(22, 'Before 24 hrs – 50 fees/ Charges', '50', 3, 4, 1, '2019-03-27 18:55:29', '2019-03-27 18:55:29', 1, 1, 0),
(23, 'Before 23.59 – 100% Charges', '100', 3, 4, 1, '2019-03-27 18:55:48', '2019-03-28 18:33:58', 1, 1, 0),
(24, 'ssa', 'kk', 2, 1, 1, '2019-03-28 17:56:08', '2019-03-28 17:57:17', 1, 1, 1),
(25, 'test', '50.0', 2, 2, 1, '2019-03-28 17:59:17', '2019-03-28 18:21:10', 1, 1, 1),
(26, 'Before 24 hrs – No fees/ Chargesdsfsf', '0', 2, 2, 1, '2019-03-28 18:00:29', '2019-03-28 18:23:10', 1, 1, 1);

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
(5, 'Strictmccxv', NULL, 0, '2019-03-27 18:06:35', '2019-03-28 17:46:59', 1, 1, 0);

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
  `booking_status` enum('approved','pending','rejected') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_property_bookings`
--

INSERT INTO `tbl_property_bookings` (`booking_id`, `user_id`, `property_id`, `module_manage_id`, `duration_type_id`, `start_time`, `end_time`, `start_date`, `end_date`, `booking_amount`, `booking_status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(43, 2, 29, 2, 1, '03:00:00', '02:00:00', '2019-04-16', '2019-04-19', '0', 'pending', '2019-04-07 07:39:52', '2019-04-07 07:39:52', 1, 1, 0),
(44, 2, 29, 2, 1, '03:00:00', '02:00:00', '2019-04-16', '2019-04-19', '0', 'pending', '2019-04-07 07:39:59', '2019-04-07 07:39:59', 1, 1, 0),
(45, 2, 29, 2, 1, '00:00:00', '23:00:00', '2019-04-09', '2019-04-27', '0', 'pending', '2019-04-07 07:45:32', '2019-04-07 07:45:32', 1, 1, 0),
(46, 2, 29, 2, 1, '00:00:00', '23:00:00', '2019-04-09', '2019-04-27', '0', 'pending', '2019-04-07 07:45:38', '2019-04-07 07:45:38', 1, 1, 0),
(47, 2, 29, 2, 1, '02:00:00', '01:00:00', '2019-04-10', '2019-04-20', '0', 'pending', '2019-04-07 07:47:45', '2019-04-07 07:47:45', 1, 1, 0),
(48, 2, 7, 3, 2, '00:00:00', '23:00:00', '2019-04-09', '2019-04-12', '0', 'pending', '2019-04-07 07:51:27', '2019-04-07 07:51:27', 1, 1, 0);

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
  ADD PRIMARY KEY (`amenity_id`),
  ADD KEY `fk_lnd_property_amenities_property_id` (`property_id`);

--
-- Indexes for table `lnd_add_property_availabilities`
--
ALTER TABLE `lnd_add_property_availabilities`
  ADD PRIMARY KEY (`availability_id`),
  ADD KEY `fk_lnd_property_available_property_id` (`property_id`),
  ADD KEY `fk_lnd_property_available_user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lnd_add_property`
--
ALTER TABLE `lnd_add_property`
  MODIFY `property_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lnd_add_property_amenities`
--
ALTER TABLE `lnd_add_property_amenities`
  MODIFY `amenity_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lnd_add_property_availabilities`
--
ALTER TABLE `lnd_add_property_availabilities`
  MODIFY `availability_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lnd_add_property_files`
--
ALTER TABLE `lnd_add_property_files`
  MODIFY `file_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lnd_add_property_rent`
--
ALTER TABLE `lnd_add_property_rent`
  MODIFY `rent_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lnd_land_type`
--
ALTER TABLE `lnd_land_type`
  MODIFY `land_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prk_add_property`
--
ALTER TABLE `prk_add_property`
  MODIFY `property_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `prk_add_property_amenities`
--
ALTER TABLE `prk_add_property_amenities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prk_add_property_availabilities`
--
ALTER TABLE `prk_add_property_availabilities`
  MODIFY `availability_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prk_add_property_files`
--
ALTER TABLE `prk_add_property_files`
  MODIFY `file_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prk_add_property_floors`
--
ALTER TABLE `prk_add_property_floors`
  MODIFY `floor_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `prk_add_property_rent`
--
ALTER TABLE `prk_add_property_rent`
  MODIFY `rent_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `prk_user_registrations`
--
ALTER TABLE `prk_user_registrations`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prk_user_type`
--
ALTER TABLE `prk_user_type`
  MODIFY `user_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `amenity_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_mstr_amenities_with_category`
--
ALTER TABLE `tbl_mstr_amenities_with_category`
  MODIFY `amenity_cat_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

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
  MODIFY `cancellation_policy_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `booking_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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

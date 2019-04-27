-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 07:09 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prime_story`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_ratings`
--

CREATE TABLE `booking_ratings` (
  `booking_rating_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_ratings`
--

INSERT INTO `booking_ratings` (`booking_rating_id`, `booking_id`, `user_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 32, 2, 'dd', '2019-04-20 18:46:38', NULL),
(2, 1, 32, 4, 'dd', '2019-04-20 18:46:42', NULL),
(3, 1, 32, 5, 'pppp', '2019-04-20 21:45:14', NULL),
(4, 1, 32, 3, 'fghdfgdfg', '2019-04-20 21:48:37', NULL),
(5, 1, 32, 4, 'cool', '2019-04-20 21:51:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_transactions`
--

CREATE TABLE `booking_transactions` (
  `txn_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `credit` float(8,2) NOT NULL DEFAULT '0.00',
  `debit` float(8,2) NOT NULL DEFAULT '0.00',
  `amount` float(8,2) NOT NULL DEFAULT '0.00',
  `status_message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_transactions`
--

INSERT INTO `booking_transactions` (`txn_id`, `user_id`, `booking_id`, `credit`, `debit`, `amount`, `status_message`, `created_at`, `updated_at`) VALUES
(1, 32, 127, 12.00, 0.00, 12.00, 'success', '2019-04-25 12:21:24', NULL),
(2, 32, 128, 20.00, 0.00, 32.00, 'success', '2019-04-25 12:22:25', NULL),
(3, 19, 128, 0.00, 17.00, 15.00, 'success', '2019-04-25 13:23:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `connect_stripe_account_for_host`
--

CREATE TABLE `connect_stripe_account_for_host` (
  `connect_stripe_account_for_host_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stripe_user_id` varchar(255) NOT NULL,
  `stripe_publishable_key` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connect_stripe_account_for_host`
--

INSERT INTO `connect_stripe_account_for_host` (`connect_stripe_account_for_host_id`, `user_id`, `stripe_user_id`, `stripe_publishable_key`, `created_at`, `updated_at`) VALUES
(1, 19, 'acct_1ET1V7E34lUnXqfY', 'pk_test_5tykAUzfN6gYLQaRV20aq0wP00owk9VTE3', '2019-04-25 10:56:21', NULL);

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
(1, 1, 1, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(2, 2, 2, 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0);

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
(1, 3, 19, 'land', 'United States Capitol, First Street Southeast, Washington, DC, USA', '38.88993890', '-77.00905050', '677', 'Harvesting is the process of gathering a ripe crop from the fields. Reaping is the cutting of grain or pulse for harvest, typically using a scythe, sickle, or reaper. On smaller farms with minimal mechanization, harvesting is the most labor-intensive activity of the growing season.', 1, 200, 2, 1, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(2, 3, 19, 'land2', 'Kansas City, MO, USA', '39.09972650', '-94.57856670', '675', 'Harvesting is the process of gathering a ripe crop from the fields. Reaping is the cutting of grain or pulse for harvest, typically using a scythe, sickle, or reaper. On smaller farms with minimal mechanization, harvesting is the most labor-intensive activity of the growing season.', 0, 20, 3, 1, 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0);

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
(1, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0, 1, 58),
(1, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0, 2, 60),
(1, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0, 3, 64),
(1, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0, 4, 65),
(2, 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0, 5, 64),
(2, 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0, 6, 65);

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
(1, 1, 20, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(2, 2, 20, 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0);

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
(1, '1555648964-land-for-sale_3.jpg', 1, 1, 1, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(2, '1555648964-mickleover-phase1-557x418.jpg', 1, 1, 0, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(3, '1555648964-o_1aqa5bjfa1ofqobh85qt38sok7.jpg', 1, 1, 0, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(4, '1555648964-Project-Photo-26-Poonamallee-Farms-Chennai-5093743_536_775_310_462.jpg', 1, 1, 0, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(5, '1555648964-land-for-sale_3.jpg', 1, 3, 1, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(6, '1555648964-1912018-9016-1.jpg', 1, 2, 1, 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(7, '1555649218-land-for-sale_3.jpg', 2, 1, 1, 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0),
(8, '1555649218-mickleover-phase1-557x418.jpg', 2, 1, 0, 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0),
(9, '1555649218-o_1aqa5bjfa1ofqobh85qt38sok7.jpg', 2, 1, 0, 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0),
(10, '1555649218-Selling.jpg', 2, 1, 0, 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0),
(11, '1555649218-Parking-A.jpg', 2, 3, 1, 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0),
(12, '1555649218-computech-digital-land-survey-edapally-ernakulam-land-surveyors-9y2cm.jpg', 2, 2, 1, 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0);

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
(1, 1, 2, '30', 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(2, 1, 3, '70', 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(3, 1, 4, '70', 1, '2019-04-19 04:42:44', '2019-04-19 04:42:44', 1, 1, 0),
(4, 2, 2, '10', 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0),
(5, 2, 3, '20', 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0),
(6, 2, 4, '30', 1, '2019-04-19 04:46:58', '2019-04-19 04:46:58', 1, 1, 0);

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
(1, 2, 11, 'Sadar supar market', 'Sadar, Nagpur, Maharashtra, India', '21.16295540', '79.07345640', '440025', 'Test', 0, 0, 1, 1, '2019-04-18 23:23:17', '2019-04-19 09:51:36', 1, 1, 1),
(2, 2, 11, 'Sadar Ring Road', 'Sadar Nagar, Green Park, Yogeshwar Nagar, Valsad, Gujarat, India', '20.61492550', '72.91623630', '440066', 'Sadar Ring Road', 0, 0, 1, 1, '2019-04-18 23:41:21', '2019-04-19 09:51:33', 1, 1, 1),
(3, 2, 19, '19 april', 'Kyoto, Japan', '35.01156400', '135.76814890', '6668', 'Parking is the act of stopping and disengaging a vehicle and leaving it unoccupied. Parking on one or both sides of a road is often permitted, though sometimes', 0, 0, 3, 1, '2019-04-19 04:29:56', '2019-04-19 09:51:29', 1, 1, 1),
(4, 2, 19, 'parking1', 'New Orleans, LA, USA', '29.95106580', '-90.07153230', '6546', 'test test test testtest test test test test test test test test test', 0, 0, 3, 1, '2019-04-19 05:58:06', '2019-04-19 09:51:24', 1, 1, 1),
(5, 2, 19, 'sample test', 'Kansas City, MO, USA', '39.09972650', '-94.57856670', '66879', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test', 0, 0, 3, 1, '2019-04-19 06:58:10', '2019-04-19 09:51:20', 1, 1, 1),
(6, 2, 19, 'parking1', 'Kansas City, MO, USA', '39.09972650', '-94.57856670', '658887', 'Parking is the act of stopping and disengaging a vehicle and leaving it unoccupied. Parking on one or both sides of a road is often permitted, though sometimes', 0, 0, 3, 1, '2019-04-19 10:01:14', '2019-04-19 12:46:37', 1, 1, 1),
(7, 2, 19, 'parking2', 'Karlsruhe, Germany', '49.00689010', '8.40365270', '65757', 'parking2', 0, 0, 2, 1, '2019-04-19 10:14:39', '2019-04-19 12:46:41', 1, 1, 1),
(8, 2, 19, 'parking3', 'Kansas City, MO, USA', '39.09972650', '-94.57856670', '6575', 'test', 0, 0, 3, 1, '2019-04-19 10:19:59', '2019-04-19 12:46:45', 1, 1, 1),
(9, 2, 19, 'parking4', 'Koradi, Maharashtra, India', '21.23780400', '79.11251350', '440001', 'Kansas City, MO, USA Kansas City, MO, USA Kansas City, MO, USA Kansas City, MO, USA Kansas City, MO, USAv Kansas City, MO, USA Kansas City, MO, USA Kansas City, MO, USA Kansas City, MO, USA Kansas City, MO, USA Kansas City, MO, USA Kansas City, MO, USA Kansas City, MO, USA Kansas City, MO, USAv Kansas City, MO, USAv', 0, 0, 2, 0, '2019-04-19 11:23:12', '2019-04-19 12:46:48', 1, 1, 1),
(10, 2, 19, 'property1', 'Kansas City, MO, USA', '39.09972650', '-94.57856670', '4656', 'test', 0, 0, 2, 1, '2019-04-19 12:57:43', '2019-04-19 12:58:19', 1, 1, 0),
(11, 2, 11, 'p22', 'Sadar, Nagpur, Maharashtra, India', '21.16295540', '79.07345640', '440024', 'FH;oijf\'jl[;\r\n; knlm;lmc;lm;ld;k ,msnlcms;mc;smc', 0, 0, 1, 0, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(12, 2, 11, 'p22', 'Sadar, Nagpur, Maharashtra, India', '21.16295540', '79.07345640', '440024', 'FH;oijf\'jl[;\r\n; knlm;lmc;lm;ld;k ,msnlcms;mc;smc', 0, 0, 1, 1, '2019-04-19 16:58:32', '2019-04-19 17:00:17', 1, 1, 0),
(13, 2, 19, 'parking1', 'Saraf Chambers Income Tax, Mount Road, Sadar, Nagpur, Maharashtra, India', '21.15990230', '79.07834470', '440001', 'Parking is the act of stopping and disengaging a vehicle and leaving it unoccupied. Parking on one or both sides of a road is often permitted, though sometimes', 0, 0, 2, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:49', 1, 1, 0),
(14, 2, 19, 'parking2', 'Kyoto, Japan', '35.01156400', '135.76814890', '7687', 'testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum testing lorem ipsum', 0, 0, 1, 1, '2019-04-20 06:02:19', '2019-04-20 06:03:33', 1, 1, 0),
(15, 2, 19, 'parking3', 'Knoxville, TN, USA', '35.96063840', '-83.92073920', '56456', 'test', 0, 0, 3, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:22', 1, 1, 0),
(16, 2, 19, 'ac', 'India', '20.59368400', '78.96288000', '440001', 'sv', 0, 0, 2, 0, '2019-04-20 07:13:45', '2019-04-20 07:13:45', 1, 1, 0),
(17, 2, 19, 'test', 'Nagoya, Aichi, Japan', '35.18145060', '136.90655710', '6546', 'test', 0, 0, 2, 0, '2019-04-20 08:07:43', '2019-04-20 08:07:43', 1, 1, 0),
(18, 2, 19, 'property5', 'Goa International Airport (GOI), Dabolim, Goa, India', '15.38034850', '73.83499520', '6546', 'test', 0, 0, 6, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:45', 1, 1, 0),
(19, 2, 19, 'property6', 'Goa Gajah, Bedulu, Gianyar, Bali, Indonesia', '-8.52343780', '115.28715680', '57647', 'test', 0, 0, 4, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:31', 1, 1, 0),
(20, 2, 34, 'Afzaal Parking 1', 'Mount Road, Opp. LIC Office, Sadar, Nagpur, Maharashtra, India', '21.15909390', '79.07956540', '440001', 'Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 \r\n\r\nAfzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1 Afzaal Parking 1', 0, 0, 1, 1, '2019-04-20 09:00:37', '2019-04-20 09:36:55', 1, 1, 0),
(21, 2, 34, 'Afzaal Parking 2', 'Utkarsh Nirman Complex, Mangalwari Bazar Road, Near Anjuman College, Mohan Nagar, Nagpur, Maharashtra, India', '21.16470480', '79.08202860', '440001', 'Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2 Afzaal Parking 2', 0, 0, 4, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:19', 1, 1, 0),
(22, 2, 36, 'test property1', 'Kansas City, MO, USA', '39.09972650', '-94.57856670', '5646', 'Parking is the act of stopping and disengaging a vehicle and leaving it unoccupied. Parking on one or both sides of a road is often permitted, though sometimes ...', 0, 0, 1, 1, '2019-04-20 09:51:49', '2019-04-20 09:52:08', 1, 1, 0),
(23, 2, 36, 'xyz parking', 'Greenville, SC, USA', '34.85261760', '-82.39401040', '6546', 'testing', 0, 0, 2, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:49', 1, 1, 0);

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
(1, 56, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17', 1, 1, 0),
(2, 55, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17', 1, 1, 0),
(3, 56, 2, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(4, 59, 2, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(5, 62, 2, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(6, 63, 2, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(7, 61, 2, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(8, 60, 3, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(9, 63, 3, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(10, 61, 3, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(11, 59, 4, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(12, 60, 4, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(13, 62, 4, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(14, 59, 5, 1, '2019-04-19 06:58:10', '2019-04-19 06:58:10', 1, 1, 0),
(15, 60, 5, 1, '2019-04-19 06:58:10', '2019-04-19 06:58:10', 1, 1, 0),
(16, 62, 5, 1, '2019-04-19 06:58:10', '2019-04-19 06:58:10', 1, 1, 0),
(17, 57, 6, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(18, 63, 6, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(19, 61, 6, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(20, 62, 7, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(21, 63, 7, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(22, 61, 7, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(23, 62, 8, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(24, 63, 8, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(25, 61, 8, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(26, 55, 9, 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(27, 62, 9, 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(28, 63, 9, 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(29, 61, 9, 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(30, 67, 10, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(31, 64, 10, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(32, 70, 10, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(33, 71, 10, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(34, 56, 11, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(35, 55, 11, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(36, 61, 11, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(37, 56, 12, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32', 1, 1, 0),
(38, 55, 12, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32', 1, 1, 0),
(39, 61, 12, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32', 1, 1, 0),
(40, 68, 13, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(41, 67, 13, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(42, 69, 13, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(43, 70, 13, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(44, 71, 13, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(45, 67, 14, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(46, 70, 14, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(47, 67, 15, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(48, 64, 15, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(49, 70, 15, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(50, 71, 15, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(51, 56, 16, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45', 1, 1, 0),
(52, 66, 18, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(53, 64, 18, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(54, 69, 18, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(55, 69, 19, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(56, 67, 20, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(57, 66, 21, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(58, 68, 21, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(59, 64, 21, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(60, 66, 22, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(61, 68, 22, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(62, 68, 23, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0),
(63, 69, 23, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0),
(64, 70, 23, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0);

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
(1, 1, 8, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17', 1, 1, 0),
(2, 1, 9, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(3, 1, 9, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(4, 1, 9, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(5, 1, 13, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12', 1, 1, 0),
(6, 1, 9, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(7, 1, 13, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(8, 1, 9, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(9, 1, 9, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13', 1, 1, 0),
(10, 1, 9, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(11, 1, 9, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(12, 1, 9, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32', 1, 1, 0),
(13, 1, 9, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(14, 1, 9, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(15, 1, 9, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(16, 1, 9, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45', 1, 1, 0),
(17, 1, 9, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43', 1, 1, 0),
(18, 1, 9, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(19, 1, 9, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(20, 1, 9, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(21, 1, 9, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(22, 1, 13, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(23, 1, 9, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0);

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
(1, '1555629797-Car-parking--tojpeg_1449141517444_x1.jpg', 1, 1, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17', 1, 1, 0),
(2, '1555629797-Car-parking--tojpeg_1449141517444_x1.jpg', 1, 3, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17', 1, 1, 0),
(3, '1555629797-images.jpg', 1, 2, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17', 1, 1, 0),
(4, '1555630881-index.jpg', 2, 1, 1, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(5, '1555630881-images.jpg', 2, 3, 1, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(6, '1555630881-images.jpg', 2, 2, 1, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(7, '1555648196-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 3, 1, 1, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(8, '1555648196-2380902598_e965511842_o.jpg', 3, 1, 0, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(9, '1555648196-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 3, 1, 0, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(10, '1555648196-Cyclehoop 1.jpg', 3, 1, 0, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(11, '1555648196-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 3, 3, 1, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(12, '1555648196-cycle-parking.jpg', 3, 2, 1, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(13, '1555648196-Cykelparkering-Bruuns-Bro1.jpg', 3, 2, 0, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(14, '1555648196-doc721q5gszlco105no33jt_doc6ul1ti132tdr07br3lo.jpg', 3, 2, 0, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(15, '1555648196-DSC02607_crp__noLicensePlt_web.jpg', 3, 2, 0, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(16, '1555653486-why-park-with-us.jpg', 4, 1, 1, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(17, '1555653486-worst_Parallel_parking.jpg', 4, 1, 0, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(18, '1555653486-Cyclehoop 1 - Copy.jpg', 4, 1, 0, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(19, '1555653486-o_1aqa5bjfa1ofqobh85qt38sok7.jpg', 4, 3, 1, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(20, '1555653486-100_3472.JPG', 4, 2, 1, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(21, '1555653486-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 4, 2, 0, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(22, '1555653486-2380902598_e965511842_o.jpg', 4, 2, 0, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(23, '1555653486-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 4, 2, 0, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(24, '1555657090-Cyclehoop 1.jpg', 5, 1, 1, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12', 1, 1, 0),
(25, '1555657090-cycle-parking.jpg', 5, 1, 0, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12', 1, 1, 0),
(26, '1555657090-Cykelparkering-Bruuns-Bro1.jpg', 5, 1, 0, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12', 1, 1, 0),
(27, '1555657092-doc721q5gszlco105no33jt_doc6ul1ti132tdr07br3lo.jpg', 5, 1, 0, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12', 1, 1, 0),
(28, '1555657092-DSC02607_crp__noLicensePlt_web.jpg', 5, 1, 0, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12', 1, 1, 0),
(29, '1555657092-parallel-parking.jpg', 5, 3, 1, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12', 1, 1, 0),
(30, '1555657092-worst_Parallel_parking.jpg', 5, 2, 1, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12', 1, 1, 0),
(31, '1555668074-Land_of_Waves.png', 6, 1, 1, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(32, '1555668074-land-for-sale_3.jpg', 6, 1, 0, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(33, '1555668074-mickleover-phase1-557x418.jpg', 6, 1, 0, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(34, '1555668074-o_1aqa5bjfa1ofqobh85qt38sok7.jpg', 6, 1, 0, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(35, '1555668074-worst_Parallel_parking.jpg', 6, 3, 1, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(36, '1555668074-computech-digital-land-survey-edapally-ernakulam-land-surveyors-9y2cm.jpg', 6, 2, 1, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(37, '1555668879-ri_ka_09-930x708.jpg', 7, 1, 1, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(38, '1555668879-sfe_tr_section_bike_cage2_920x330.jpg', 7, 1, 0, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(39, '1555668879-why-park-with-us.jpg', 7, 1, 0, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(40, '1555668879-worst_Parallel_parking.jpg', 7, 1, 0, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(41, '1555668879-Selling.jpg', 7, 3, 1, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(42, '1555668879-worst_Parallel_parking.jpg', 7, 2, 1, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(43, '1555669199-Parking-A.jpg', 8, 1, 1, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(44, '1555669199-ri_ka_09-930x708.jpg', 8, 1, 0, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(45, '1555669199-sfe_tr_section_bike_cage2_920x330.jpg', 8, 1, 0, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(46, '1555669199-why-park-with-us.jpg', 8, 1, 0, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(47, '1555669199-worst_Parallel_parking.jpg', 8, 1, 0, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(48, '1555669199-Cyclehoop 1 - Copy.jpg', 8, 3, 1, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(49, '1555669199-parkingRack.jpg', 8, 2, 1, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(50, '1555672992-_100631136_p062sdq8.jpg', 9, 1, 1, 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(51, '1555672992-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 9, 1, 0, 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(52, '1555672992-2380902598_e965511842_o.jpg', 9, 1, 0, 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(53, '1555672992-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 9, 1, 0, 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(54, '1555672992-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 9, 3, 1, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13', 1, 1, 0),
(55, '1555672992-2380902598_e965511842_o.jpg', 9, 3, 0, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13', 1, 1, 0),
(56, '1555672992-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 9, 3, 0, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13', 1, 1, 0),
(57, '1555672993-Cykelparkering-Bruuns-Bro1.jpg', 9, 3, 0, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13', 1, 1, 0),
(58, '1555672993-doc721q5gszlco105no33jt_doc6ul1ti132tdr07br3lo.jpg', 9, 3, 0, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13', 1, 1, 0),
(59, '1555672993-DSC02607_crp__noLicensePlt_web.jpg', 9, 3, 0, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13', 1, 1, 0),
(60, '1555672993-hqdefault.jpg', 9, 2, 1, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13', 1, 1, 0),
(61, '1555678663-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 10, 1, 1, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(62, '1555678663-2380902598_e965511842_o.jpg', 10, 1, 0, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(63, '1555678663-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 10, 1, 0, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(64, '1555678663-Cyclehoop 1 - Copy.jpg', 10, 3, 1, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(65, '1555678663-_100631136_p062sdq8.jpg', 10, 2, 1, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(66, '1555678663-14.jpg', 10, 2, 0, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(67, '1555678663-100_3472 (1).JPG', 10, 2, 0, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(68, '1555678663-100_3472.JPG', 10, 2, 0, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(69, '1555693106-shutterstock_521926666-e1508347182482.jpg', 11, 1, 1, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(70, '1555693106-images.jpg', 11, 3, 1, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(71, '1555693106-images (1).jpg', 11, 2, 1, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(72, '1555693112-shutterstock_521926666-e1508347182482.jpg', 12, 1, 1, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32', 1, 1, 0),
(73, '1555693112-images.jpg', 12, 3, 1, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32', 1, 1, 0),
(74, '1555693112-images (1).jpg', 12, 2, 1, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32', 1, 1, 0),
(75, '1555738229-ri_ka_09-930x708.jpg', 13, 1, 1, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(76, '1555738229-sfe_tr_section_bike_cage2_920x330.jpg', 13, 1, 0, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(77, '1555738229-why-park-with-us.jpg', 13, 1, 0, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(78, '1555738229-worst_Parallel_parking.jpg', 13, 1, 0, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(79, '1555738229-938bdc4415ed4b13be72ad9b8fa29325.jpg', 13, 3, 1, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(80, '1555738229-why-park-with-us.jpg', 13, 2, 1, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(81, '1555740139-DSC02607_crp__noLicensePlt_web.jpg', 14, 1, 1, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(82, '1555740139-parallel-parking.jpg', 14, 1, 0, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(83, '1555740139-Parking-A.jpg', 14, 1, 0, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(84, '1555740139-parkingRack.jpg', 14, 1, 0, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(85, '1555740139-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 14, 3, 1, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(86, '1555741629-parallel-parking.jpg', 15, 1, 1, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(87, '1555741629-ri_ka_09-930x708.jpg', 15, 1, 0, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(88, '1555741629-sfe_tr_section_bike_cage2_920x330.jpg', 15, 1, 0, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(89, '1555741629-why-park-with-us.jpg', 15, 1, 0, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(90, '1555741629-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 15, 3, 1, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(91, '1555741629-2380902598_e965511842_o.jpg', 15, 2, 1, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(92, '1555744425-faq.jpg', 16, 1, 1, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45', 1, 1, 0),
(93, '1555744425-faq.jpg', 16, 3, 1, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45', 1, 1, 0),
(94, '1555747663-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 17, 1, 1, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43', 1, 1, 0),
(95, '1555747663-2380902598_e965511842_o.jpg', 17, 1, 0, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43', 1, 1, 0),
(96, '1555747663-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 17, 1, 0, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43', 1, 1, 0),
(97, '1555748542-1440691937-Screen-Shot-2015-08-27-at-17.11.28.png', 18, 1, 1, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(98, '1555748542-2380902598_e965511842_o.jpg', 18, 1, 0, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(99, '1555748542-automatic-car-multi-level-parking-system-1537177937-4031406.jpg', 18, 1, 0, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(100, '1555748542-Cyclehoop 1 - Copy.jpg', 18, 1, 0, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(101, '1555748542-Cyclehoop 1 - Copy.jpg', 18, 3, 1, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(102, '1555749380-parallel-parking.jpg', 19, 1, 1, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(103, '1555749380-automatic-car-multi-level-parking-system-1537177937-4031406 - Copy.jpg', 19, 1, 0, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(104, '1555749380-100_3472 (1) - Copy.JPG', 19, 1, 0, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(105, '1555749380-2380902598_e965511842_o - Copy.jpg', 19, 1, 0, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(106, '1555749380-2380902598_e965511842_o.jpg', 19, 3, 1, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(107, '1555749380-2380902598_e965511842_o - Copy.jpg', 19, 2, 1, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(108, '1555750837-car-park1.jpg', 20, 1, 1, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(109, '1555750837-car-park1.pdf', 20, 3, 1, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(110, '1555750837-123.pdf', 20, 2, 1, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(111, '1555752368-car-park2.jpg', 21, 1, 1, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(112, '1555752368-floor1map.png', 21, 2, 1, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(113, '1555753909-parallel-parking.jpg', 22, 1, 1, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(114, '1555753909-Parking-A.jpg', 22, 1, 0, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(115, '1555753909-parkingRack.jpg', 22, 1, 0, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(116, '1555753909-why-park-with-us.jpg', 22, 1, 0, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(117, '1555753909-worst_Parallel_parking.jpg', 22, 1, 0, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(118, '1555753909-Version 2.0 - Functional Scope Document - Mohammed Alnaemi - Web-Android-iOS Similar as Yelp (1).pdf', 22, 3, 1, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(119, '1555757734-parallel-parking.jpg', 23, 1, 1, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0),
(120, '1555757734-Parking-A.jpg', 23, 1, 0, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0),
(121, '1555757734-why-park-with-us.jpg', 23, 1, 0, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0),
(122, '1555757734-worst_Parallel_parking.jpg', 23, 1, 0, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0),
(123, '1555757734-Version 2.0 - Functional Scope Document - Mohammed Alnaemi - Web-Android-iOS Similar as Yelp (1).pdf', 23, 3, 1, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0);

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
(1, 'F1', 1, 1, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17', 1, 1, 0),
(2, 'F1', 1, 1, 2, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(3, 'p1', 40, 3, 3, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(4, 'parking', 80, 1, 4, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(5, 'parking', 30, 3, 5, 1, '2019-04-19 06:58:10', '2019-04-19 06:58:10', 1, 1, 0),
(6, 'parking', 40, 4, 5, 1, '2019-04-19 06:58:10', '2019-04-19 06:58:10', 1, 1, 0),
(7, 'parking1', 40, 3, 6, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(8, 'parking2', 50, 4, 6, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(9, 'p1', 20, 2, 7, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(10, 'parking1', 20, 3, 8, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(11, 'parking1', 3, 3, 9, 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(12, 'p1', 56, 3, 10, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(13, 'p22', 3, 1, 11, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(14, 'p22', 3, 1, 12, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32', 1, 1, 0),
(15, 'parking1', 20, 4, 13, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(16, 'parking2', 25, 3, 13, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(17, 'p1', 20, 3, 14, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(18, 'p1', 10, 3, 15, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(19, 'xvc', 10, 1, 16, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45', 1, 1, 0),
(20, 'p1', 20, 1, 17, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43', 1, 1, 0),
(21, 'p1', 20, 3, 18, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(22, 'p1', 20, 2, 19, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(23, 'Floor 1', 30, 4, 20, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(24, 'Floor 2', 30, 1, 20, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(25, 'Floor 3', 30, 2, 20, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(26, 'Ground Floor', 50, 1, 21, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(27, 'p1', 20, 2, 22, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(28, 'test', 30, 1, 23, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0);

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
(1, 1, 1, 2, '10', 1, '2019-04-18 23:23:17', '2019-04-18 23:42:22', 1, 1, 0),
(2, 1, 2, 2, '2', 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17', 1, 1, 0),
(3, 1, 3, 2, '3', 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17', 1, 1, 0),
(4, 2, 1, 1, '1', 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(5, 2, 2, 1, '2', 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(6, 2, 3, 1, '3', 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(7, 2, 1, 2, '1', 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(8, 2, 2, 2, '2', 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(9, 2, 3, 2, '3', 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(10, 2, 1, 3, '1', 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(11, 2, 2, 3, '2', 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(12, 2, 3, 3, '3', 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21', 1, 1, 0),
(13, 3, 1, 3, '20', 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(14, 3, 2, 3, '30', 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(15, 3, 3, 3, '40', 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56', 1, 1, 0),
(16, 4, 1, 6, '20', 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(17, 4, 2, 6, '30', 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(18, 4, 3, 6, '40', 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06', 1, 1, 0),
(19, 5, 1, 5, '3', 1, '2019-04-19 06:58:10', '2019-04-19 06:58:10', 1, 1, 0),
(20, 5, 2, 5, '6', 1, '2019-04-19 06:58:10', '2019-04-19 06:58:10', 1, 1, 0),
(21, 5, 3, 5, '8', 1, '2019-04-19 06:58:10', '2019-04-19 06:58:10', 1, 1, 0),
(22, 5, 1, 6, '4', 1, '2019-04-19 06:58:10', '2019-04-19 06:58:10', 1, 1, 0),
(23, 5, 2, 6, '5', 1, '2019-04-19 06:58:10', '2019-04-19 06:58:10', 1, 1, 0),
(24, 5, 3, 6, '7', 1, '2019-04-19 06:58:10', '2019-04-19 06:58:10', 1, 1, 0),
(25, 6, 1, 6, '2', 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(26, 6, 2, 6, '3', 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(27, 6, 3, 6, '4', 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14', 1, 1, 0),
(28, 7, 1, 5, '2', 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(29, 7, 2, 5, '3', 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(30, 7, 3, 5, '4', 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39', 1, 1, 0),
(31, 8, 1, 7, '30', 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(32, 8, 2, 7, '60', 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(33, 8, 3, 7, '80', 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59', 1, 1, 0),
(34, 9, 1, 1, '2', 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(35, 9, 2, 1, '3', 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(36, 9, 3, 1, '50', 1, '2019-04-19 11:23:12', '2019-04-19 11:23:12', 1, 1, 0),
(37, 10, 1, 2, '2', 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(38, 10, 2, 2, '3', 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(39, 10, 3, 2, '4', 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43', 1, 1, 0),
(40, 11, 1, 1, '2', 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(41, 11, 2, 1, '7', 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(42, 11, 3, 1, '10', 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26', 1, 1, 0),
(43, 12, 1, 1, '2', 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32', 1, 1, 0),
(44, 12, 2, 1, '7', 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32', 1, 1, 0),
(45, 12, 3, 1, '10', 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32', 1, 1, 0),
(46, 13, 1, 2, '10', 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(47, 13, 2, 2, '15', 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(48, 13, 3, 2, '20', 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(49, 13, 1, 1, '20', 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(50, 13, 2, 1, '30', 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(51, 13, 3, 1, '30', 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29', 1, 1, 0),
(52, 14, 1, 3, '20', 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(53, 14, 2, 3, '30', 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(54, 14, 3, 3, '40', 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19', 1, 1, 0),
(55, 15, 1, 2, '2', 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(56, 15, 2, 2, '2', 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(57, 15, 3, 2, '2', 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09', 1, 1, 0),
(58, 16, 1, 1, '10', 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45', 1, 1, 0),
(59, 16, 2, 1, '50', 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45', 1, 1, 0),
(60, 16, 3, 1, '300', 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45', 1, 1, 0),
(61, 17, 1, 1, '29', 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43', 1, 1, 0),
(62, 17, 2, 1, '30', 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43', 1, 1, 0),
(63, 17, 3, 1, '500000000000', 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43', 1, 1, 0),
(64, 18, 1, 3, '20', 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(65, 18, 2, 3, '24', 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(66, 18, 3, 3, '47', 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22', 1, 1, 0),
(67, 19, 1, 2, '10', 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(68, 19, 2, 2, '12', 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(69, 19, 3, 2, '15', 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20', 1, 1, 0),
(70, 20, 1, 1, '5', 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(71, 20, 2, 1, '20', 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(72, 20, 3, 1, '50', 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(73, 20, 1, 2, '4', 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(74, 20, 2, 2, '15', 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(75, 20, 3, 2, '35', 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(76, 20, 1, 3, '2', 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(77, 20, 2, 3, '10', 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(78, 20, 3, 3, '25', 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37', 1, 1, 0),
(79, 21, 1, 2, '8', 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(80, 21, 2, 2, '30', 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(81, 21, 3, 2, '100', 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(82, 21, 1, 3, '6', 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(83, 21, 2, 3, '25', 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(84, 21, 3, 3, '80', 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08', 1, 1, 0),
(85, 22, 1, 2, '20', 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(86, 22, 2, 2, '30', 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(87, 22, 3, 2, '40', 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(88, 22, 1, 3, '30', 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(89, 22, 2, 3, '9', 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(90, 22, 3, 3, '30', 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49', 1, 1, 0),
(91, 23, 1, 1, '20', 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0),
(92, 23, 2, 1, '30', 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0),
(93, 23, 3, 1, '40', 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34', 1, 1, 0),
(94, 10, 4, 2, '5', 1, '2019-04-20 14:57:28', '2019-04-20 14:59:19', 1, 1, 0);

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
(1, 'Full Size', 1, '2019-03-20 00:30:49', '2019-04-19 12:09:46', 1, 1, 0),
(2, 'Mid Size', 1, '2019-03-20 00:30:49', '2019-04-19 12:09:24', 1, 1, 0),
(3, 'Compact', 1, '2019-03-20 00:30:49', '2019-04-19 12:08:52', 1, 1, 0),
(4, 'SUV', 1, '2019-03-20 00:30:49', '2019-04-19 12:08:27', 0, 0, 1),
(5, 'Crossover', 1, '2019-03-20 00:30:49', '2019-04-19 12:08:24', 0, 0, 1),
(6, 'Coupe', 1, '2019-03-20 00:30:49', '2019-04-19 12:08:20', 0, 0, 1),
(7, 'Convertible', 1, '2019-03-20 00:30:49', '2019-04-19 12:08:16', 0, 0, 1),
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
(5, 'handicaps', 1, '2019-03-27 17:39:06', '2019-04-19 12:05:29', 1, 1, 1),
(6, 'Electric', 1, '2019-04-20 05:23:57', '2019-04-20 05:23:57', 1, 1, 0);

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
(155, 1, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17'),
(156, 1, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17'),
(157, 1, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17'),
(158, 1, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17'),
(159, 1, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17'),
(160, 1, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17'),
(161, 1, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:23:17', '2019-04-18 23:23:17'),
(162, 2, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21'),
(163, 2, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21'),
(164, 2, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21'),
(165, 2, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21'),
(166, 2, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21'),
(167, 2, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21'),
(168, 2, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-18 23:41:21', '2019-04-18 23:41:21'),
(169, 3, 'Sunday', '09:00:00', '16:00:00', 1, 0, 1, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56'),
(170, 3, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56'),
(171, 3, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56'),
(172, 3, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56'),
(173, 3, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56'),
(174, 3, 'Friday', '09:00:00', '16:00:00', 1, 0, 1, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56'),
(175, 3, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 04:29:56', '2019-04-19 04:29:56'),
(176, 4, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06'),
(177, 4, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06'),
(178, 4, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06'),
(179, 4, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06'),
(180, 4, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06'),
(181, 4, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06'),
(182, 4, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 05:58:06', '2019-04-19 05:58:06'),
(183, 5, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12'),
(184, 5, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12'),
(185, 5, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12'),
(186, 5, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12'),
(187, 5, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12'),
(188, 5, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12'),
(189, 5, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 06:58:12', '2019-04-19 06:58:12'),
(190, 6, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14'),
(191, 6, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14'),
(192, 6, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14'),
(193, 6, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14'),
(194, 6, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14'),
(195, 6, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14'),
(196, 6, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:01:14', '2019-04-19 10:01:14'),
(197, 7, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39'),
(198, 7, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39'),
(199, 7, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39'),
(200, 7, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39'),
(201, 7, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39'),
(202, 7, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39'),
(203, 7, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:14:39', '2019-04-19 10:14:39'),
(204, 8, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59'),
(205, 8, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59'),
(206, 8, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59'),
(207, 8, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59'),
(208, 8, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59'),
(209, 8, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59'),
(210, 8, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 10:19:59', '2019-04-19 10:19:59'),
(211, 9, 'Sunday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13'),
(212, 9, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13'),
(213, 9, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13'),
(214, 9, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13'),
(215, 9, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13'),
(216, 9, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13'),
(217, 9, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-19 11:23:13', '2019-04-19 11:23:13'),
(218, 10, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43'),
(219, 10, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43'),
(220, 10, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43'),
(221, 10, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43'),
(222, 10, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43'),
(223, 10, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43'),
(224, 10, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 12:57:43', '2019-04-19 12:57:43'),
(225, 11, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26'),
(226, 11, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26'),
(227, 11, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26'),
(228, 11, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26'),
(229, 11, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26'),
(230, 11, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26'),
(231, 11, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:26', '2019-04-19 16:58:26'),
(232, 12, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32'),
(233, 12, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32'),
(234, 12, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32'),
(235, 12, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32'),
(236, 12, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32'),
(237, 12, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32'),
(238, 12, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-19 16:58:32', '2019-04-19 16:58:32'),
(239, 13, 'Sunday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29'),
(240, 13, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29'),
(241, 13, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29'),
(242, 13, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29'),
(243, 13, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29'),
(244, 13, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29'),
(245, 13, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 05:30:29', '2019-04-20 05:30:29'),
(246, 14, 'Sunday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19'),
(247, 14, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19'),
(248, 14, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19'),
(249, 14, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19'),
(250, 14, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19'),
(251, 14, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19'),
(252, 14, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 06:02:19', '2019-04-20 06:02:19'),
(253, 15, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09'),
(254, 15, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09'),
(255, 15, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09'),
(256, 15, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09'),
(257, 15, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09'),
(258, 15, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09'),
(259, 15, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 06:27:09', '2019-04-20 06:27:09'),
(260, 16, 'Sunday', NULL, NULL, 0, 0, 1, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45'),
(261, 16, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45'),
(262, 16, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45'),
(263, 16, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45'),
(264, 16, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45'),
(265, 16, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45'),
(266, 16, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 07:13:45', '2019-04-20 07:13:45'),
(267, 17, 'Sunday', '16:00:00', '16:00:00', 1, 0, 1, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43'),
(268, 17, 'Monday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43'),
(269, 17, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43'),
(270, 17, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43'),
(271, 17, 'Thursday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43'),
(272, 17, 'Friday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43'),
(273, 17, 'Saturday', NULL, NULL, 1, 0, 1, 1, '2019-04-20 08:07:43', '2019-04-20 08:07:43'),
(274, 18, 'Sunday', '09:00:00', '19:00:00', 1, 0, 1, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22'),
(275, 18, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22'),
(276, 18, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22'),
(277, 18, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22'),
(278, 18, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22'),
(279, 18, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22'),
(280, 18, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:22:22', '2019-04-20 08:22:22'),
(281, 19, 'Sunday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20'),
(282, 19, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20'),
(283, 19, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20'),
(284, 19, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20'),
(285, 19, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20'),
(286, 19, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20'),
(287, 19, 'Saturday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 08:36:20', '2019-04-20 08:36:20'),
(288, 20, 'Sunday', '09:00:00', '18:00:00', 1, 0, 1, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37'),
(289, 20, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37'),
(290, 20, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37'),
(291, 20, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37'),
(292, 20, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37'),
(293, 20, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37'),
(295, 21, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08'),
(296, 21, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08'),
(297, 21, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08'),
(298, 21, 'Wednesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08'),
(299, 21, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08'),
(300, 21, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08'),
(301, 21, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:26:08', '2019-04-20 09:26:08'),
(302, 20, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:00:37', '2019-04-20 09:00:37'),
(303, 22, 'Sunday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49'),
(304, 22, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49'),
(305, 22, 'Tuesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49'),
(306, 22, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49'),
(307, 22, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49'),
(308, 22, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49'),
(309, 22, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 09:51:49', '2019-04-20 09:51:49'),
(310, 23, 'Sunday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34'),
(311, 23, 'Monday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34'),
(312, 23, 'Tuesday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34'),
(313, 23, 'Wednesday', '00:00:01', '23:59:00', 1, 0, 1, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34'),
(314, 23, 'Thursday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34'),
(315, 23, 'Friday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34'),
(316, 23, 'Saturday', '00:00:01', '23:59:00', 0, 0, 1, 1, '2019-04-20 10:55:34', '2019-04-20 10:55:34');

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
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes',
  `is_payment_setup` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prk_user_registrations`
--

INSERT INTO `prk_user_registrations` (`user_id`, `firstname`, `lastname`, `email_id`, `address`, `country`, `user_latitude`, `user_longitude`, `contact_no`, `city`, `zipcode`, `password`, `dob`, `profile_pic`, `user_type_id`, `status`, `default_user_type`, `access_token`, `registration_type`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`, `is_payment_setup`) VALUES
(2, 'Priyanka', 'KNP', 'priyanka@gmail.com', NULL, NULL, NULL, '-87.62979820', '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, 2, 1, 2, NULL, 1, '2019-03-28 19:07:00', '2019-04-16 18:38:48', 1, 1, 0, 0),
(3, 'amol', 'kharate', 'amolkharate.wwg@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-07 12:43:24', '2019-04-09 02:44:03', 1, 1, 1, 0),
(4, 'amol', 'kharate', 'amolh@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-08 16:25:27', '2019-04-08 16:25:27', 1, 1, 0, 0),
(5, 'dafdad', 'asdsadasd', 'test1111@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-08 16:46:10', '2019-04-08 16:46:10', 1, 1, 0, 0),
(6, 'dafdad', 'sdsadasd', 'tessdsadt@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-08 16:47:32', '2019-04-08 16:47:32', 1, 1, 0, 0),
(7, 'amol122', 'test@gmail.com', 'testssdsd@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 5, 1, 2, NULL, 1, '2019-04-08 17:03:12', '2019-04-09 07:50:27', 1, 1, 0, 0),
(8, 'amol122', 'test@gmail.com', 'test@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-08 17:10:34', '2019-04-09 05:56:43', 1, 1, 1, 0),
(9, 'amol122', 'test@gmail.com', 'amolkharate.wwg@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-09 02:44:07', '2019-04-09 02:50:00', 1, 1, 1, 0),
(10, 'amol', 'kharate', 'amol123@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2000-02-02', NULL, 2, 1, 2, NULL, 1, '2019-04-09 05:59:44', '2019-04-09 05:59:44', 1, 1, 0, 0),
(11, 'amol', 'kharate', 'amolkharate.wwg@gmail.com', 'Chicago, IL, USA', NULL, '41.8781136', '-87.62979820', '9970426205', 'Chicago', '11122', '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', 'amol.jpg', 5, 1, 2, NULL, 1, '2019-04-09 06:09:13', '2019-04-16 19:15:18', 1, 1, 0, 0),
(12, 'amol', 'kharate', 'testamol@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-09 07:48:01', '2019-04-09 07:48:01', 1, 1, 0, 0),
(13, 'amol', 'kharate', 'amol@gmail1.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-09 08:25:42', '2019-04-09 08:25:42', 1, 1, 0, 0),
(14, 'amol', 'kharate', 'testamo11l@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '1987-02-17', NULL, 2, 1, 2, NULL, 1, '2019-04-09 08:45:46', '2019-04-09 11:03:58', 1, 1, 0, 0),
(15, 'amol', 'kharate', 'amolkharate.wwg1@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '1991-11-23', NULL, 2, 1, 2, NULL, 1, '2019-04-09 11:37:14', '2019-04-09 11:37:14', 1, 1, 0, 0),
(16, 'Test', 'Subject', 'test@test.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '05a671c66aefea124cc08b76ea6d30bb', '1999-01-01', NULL, 3, 1, 3, NULL, 1, '2019-04-10 23:20:50', '2019-04-10 23:20:50', 1, 1, 0, 0),
(17, 'roger', 'rappoport', 'rcr@procopio.com', NULL, NULL, NULL, NULL, '', NULL, NULL, '6e2adde17ce6c1256433633a33a9e1da', '1970-12-11', NULL, 3, 1, 3, NULL, 1, '2019-04-10 23:21:10', '2019-04-10 23:21:10', 1, 1, 0, 0),
(18, 'xyz', 'uvw', 'xyz@anonymous.com', NULL, NULL, NULL, NULL, '', NULL, NULL, 'ba88c155ba898fc8b5099893036ef205', '2001-01-01', NULL, 3, 1, 3, NULL, 1, '2019-04-10 23:21:57', '2019-04-10 23:21:57', 1, 1, 0, 0),
(19, 'ketki', 'tarale', 'ketki.alkurn@gmail.com', 'Kansas City, MO, USA', NULL, '39.0997265', '-94.57856670', '9975301429', 'Kansas City', '898989', 'e10adc3949ba59abbe56e057f20f883e', '1993-12-16', 'userprofile/6pfsJWendPMgEMV5Rr5ZN8e1hkEYORAxJ9lB3TfE.jpeg', 2, 1, 2, NULL, 1, '2019-04-11 03:46:58', '2019-04-25 10:56:21', 1, 1, 0, 1),
(20, 'ketki', 'tarale', 'ketki16@yopmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '1993-12-16', NULL, 2, 1, 2, NULL, 1, '2019-04-12 05:30:26', '2019-04-12 05:30:26', 1, 1, 0, 0),
(21, 'sdasd', 'test@gmail.com', 'sdadasd.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:02:38', '2019-04-16 17:02:38', 1, 1, 0, 0),
(22, 'erw', 'test@gmail.com', 'amolkewrharate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:05:42', '2019-04-16 17:05:42', 1, 1, 0, 0),
(23, 'sdas', 'tesddst@gmail.com', 'amolksassaate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:10:33', '2019-04-16 17:10:33', 1, 1, 0, 0),
(24, 'erw', 'sdsad@gmail.com', 'amolksae.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'acb0300a1f664de1da9cbb996dc0591a', '2000-01-02', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:11:12', '2019-04-16 17:11:12', 1, 1, 0, 0),
(25, 'sdas', 'testsad@gmail.com', 'amolksadate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:23:29', '2019-04-16 17:23:29', 1, 1, 0, 0),
(26, 'sdas', 'test@gmail.com', 'adadarate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:24:22', '2019-04-16 17:24:22', 1, 1, 0, 0),
(27, 'sdas', 'test@gmail.com', 'amolksadsdte.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-02-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:26:56', '2019-04-16 17:26:56', 1, 1, 0, 0),
(28, 'sdasd', 'test@gmail.com', 'amolkasdrate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-02', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:28:32', '2019-04-16 17:28:32', 1, 1, 0, 0),
(29, 'sdad', 'test@gmail.com', 'amswrharate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2000-01-02', NULL, 2, 1, 2, NULL, 1, '2019-04-16 17:30:09', '2019-04-16 17:30:09', 1, 1, 0, 0),
(30, 'erw', 'test@gmail.com', 'amolkasdas.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2000-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 18:45:51', '2019-04-16 18:45:51', 1, 1, 0, 0),
(31, 'erw', 'test@gmail.com', 'amolkdasrate.wwg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001-01-01', NULL, 2, 1, 2, NULL, 1, '2019-04-16 18:47:28', '2019-04-16 19:59:30', 1, 1, 1, 0),
(32, 'ketki', 'tarale', 'customer@yopmail.com', 'Koradi, Maharashtra, India', NULL, '21.237804', '79.11251350', '784635478', 'Koradi', '441111', 'e10adc3949ba59abbe56e057f20f883e', '1993-12-16', 'ketki.jpg', 3, 1, 3, 'EFtikmI63L0IB9MnFM2mUPud59gzZFdH', 1, '2019-04-17 05:39:52', '2019-04-22 07:27:54', 1, 1, 0, 0),
(33, 'sonali', 'ganer', 'sonalig.alkurn@gmail.com', 'La Plata, Buenos Aires Province, Argentina', NULL, '-34.9204948', '-57.95356570', '8087203010', 'La Plata', '67656', 'e10adc3949ba59abbe56e057f20f883e', '1983-11-20', 'userprofile/4dLjwf698TV1OnzBVVyuVSlPPGJC8D1bwxdQDsqX.jpeg', 3, 1, 3, NULL, 1, '2019-04-20 05:47:56', '2019-04-20 05:54:44', 1, 1, 0, 0),
(34, 'Seller', 'Afzaal', 'afzaal.alkurn@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25f9e794323b453885f5181f1b624d0b', '1980-12-31', 'userprofile/Na9x9xn98UyC1cMF5ibq0AEn1x3O4WaRpIfdnovN.jpeg', 2, 1, 2, NULL, 1, '2019-04-20 06:50:35', '2019-04-20 07:10:34', 1, 1, 0, 0),
(35, 'Buyer', 'Afzaal', 'afzaal@alkurn.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25f9e794323b453885f5181f1b624d0b', '1980-12-31', 'userprofile/gbCJCGKHZnaCTPt8fjDNgc5RxdKQTInsY4sre63W.jpeg', 3, 1, 3, NULL, 1, '2019-04-20 06:54:37', '2019-04-20 07:04:40', 1, 1, 0, 0),
(36, 'owner', 'test', 'owner@yopmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', '1990-12-12', 'userprofile/jtDmCFl9XfKZUlp7jGapfes4GyEZtFDKLxaIK7co.jpeg', 2, 1, 2, NULL, 1, '2019-04-20 09:40:51', '2019-04-20 09:58:06', 1, 1, 0, 0);

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
(55, 'Wifi', 1, '2019-04-01 04:01:02', '2019-04-20 07:41:01', 1, 1, 1, 'wifi.svg'),
(56, 'Wheelchair', 1, '2019-04-03 18:58:53', '2019-04-20 07:40:47', 1, 1, 1, 'wheelchair.svg'),
(57, 'Fire Extinguisher', 1, '2019-04-17 05:06:04', '2019-04-20 07:40:56', 1, 1, 1, 'fire extinguisher.svg'),
(58, 'Electric Supply', 1, '2019-04-17 05:06:22', '2019-04-17 05:06:22', 1, 1, 0, 'electric supply.svg'),
(59, 'Water supply', 1, '2019-04-17 05:06:42', '2019-04-20 07:40:23', 1, 1, 1, 'water supply.svg'),
(60, 'Security', 1, '2019-04-17 05:07:32', '2019-04-20 07:39:35', 1, 1, 1, 'security.svg'),
(61, 'EV charging', 1, '2019-04-17 05:08:16', '2019-04-20 07:40:17', 1, 1, 1, 'ev charging.png'),
(62, 'Roof', 1, '2019-04-17 05:08:58', '2019-04-20 07:39:22', 1, 1, 1, 'roof.svg'),
(63, 'Locker Room', 1, '2019-04-17 05:09:29', '2019-04-20 07:39:28', 1, 1, 1, 'locker room.svg'),
(64, 'Over night parking', 1, '2019-04-17 05:10:32', '2019-04-19 12:38:46', 1, 1, 0, 'parking facility.svg'),
(65, 'Boundary wall', 1, '2019-04-17 05:13:20', '2019-04-17 05:13:20', 1, 1, 0, 'boundary wall.svg'),
(66, 'On-Site Staff', 1, '2019-04-19 12:20:21', '2019-04-19 12:20:21', 1, 1, 0, 'on-site staff.svg'),
(67, 'All time available', 1, '2019-04-19 12:22:09', '2019-04-19 12:37:30', 1, 1, 0, 'open.svg'),
(68, 'Free Shuttle Service', 1, '2019-04-19 12:32:23', '2019-04-19 12:32:23', 1, 1, 0, 'free shuttle service.svg'),
(69, 'Location Memory', 1, '2019-04-19 12:40:52', '2019-04-19 12:40:52', 1, 1, 0, 'location memory.png'),
(70, 'In and Out Privileges', 1, '2019-04-19 12:42:43', '2019-04-19 12:42:43', 1, 1, 0, 'in and out privileges.png'),
(71, 'wheelchair accesible', 1, '2019-04-19 12:43:34', '2019-04-20 07:40:05', 1, 1, 1, 'wheelchair accesible.svg');

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
(108, 56, 2, 1, '2019-04-17 05:04:18', '2019-04-20 07:40:47', 1, 1, 1, NULL),
(109, 55, 2, 1, '2019-04-17 05:05:22', '2019-04-20 07:41:01', 1, 1, 1, NULL),
(110, 55, 3, 1, '2019-04-17 05:05:22', '2019-04-20 07:41:01', 1, 1, 1, NULL),
(111, 57, 2, 1, '2019-04-17 05:06:04', '2019-04-20 07:40:56', 1, 1, 1, NULL),
(112, 57, 3, 1, '2019-04-17 05:06:04', '2019-04-20 07:40:56', 1, 1, 1, NULL),
(113, 58, 3, 1, '2019-04-17 05:06:22', '2019-04-17 05:06:22', 1, 1, 0, NULL),
(116, 59, 2, 1, '2019-04-17 05:07:05', '2019-04-20 07:40:23', 1, 1, 1, NULL),
(117, 59, 3, 1, '2019-04-17 05:07:05', '2019-04-20 07:40:23', 1, 1, 1, NULL),
(118, 60, 2, 1, '2019-04-17 05:07:32', '2019-04-20 07:39:35', 1, 1, 1, NULL),
(119, 60, 3, 1, '2019-04-17 05:07:32', '2019-04-20 07:39:35', 1, 1, 1, NULL),
(121, 62, 2, 1, '2019-04-17 05:08:58', '2019-04-20 07:39:22', 1, 1, 1, NULL),
(122, 63, 2, 1, '2019-04-17 05:09:29', '2019-04-20 07:39:28', 1, 1, 1, NULL),
(124, 61, 2, 1, '2019-04-17 05:11:31', '2019-04-20 07:40:17', 1, 1, 1, NULL),
(125, 65, 3, 1, '2019-04-17 05:13:20', '2019-04-17 05:13:20', 1, 1, 0, NULL),
(126, 66, 2, 1, '2019-04-19 12:20:21', '2019-04-19 12:20:21', 1, 1, 0, NULL),
(128, 68, 2, 1, '2019-04-19 12:32:23', '2019-04-19 12:32:23', 1, 1, 0, NULL),
(134, 67, 2, 1, '2019-04-19 12:37:30', '2019-04-19 12:37:30', 1, 1, 0, NULL),
(135, 64, 2, 1, '2019-04-19 12:38:46', '2019-04-19 12:38:46', 1, 1, 0, NULL),
(136, 64, 3, 1, '2019-04-19 12:38:46', '2019-04-19 12:38:46', 1, 1, 0, NULL),
(137, 69, 2, 1, '2019-04-19 12:40:52', '2019-04-19 12:40:52', 1, 1, 0, NULL),
(138, 70, 2, 1, '2019-04-19 12:42:43', '2019-04-19 12:42:43', 1, 1, 0, NULL),
(139, 71, 2, 1, '2019-04-19 12:43:34', '2019-04-20 07:40:05', 1, 1, 1, NULL);

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
(3, 'Both', 2, 1, '2019-03-19 22:03:52', '2019-04-19 12:05:01', 0, 0, 1),
(4, 'Garage Structure', 2, 1, '2019-04-20 07:21:32', '2019-04-20 07:21:32', 1, 1, 0),
(5, 'Parking Lot', 2, 1, '2019-04-20 07:22:01', '2019-04-20 07:22:01', 1, 1, 0),
(6, 'Personal', 2, 1, '2019-04-20 07:22:30', '2019-04-20 07:22:30', 1, 1, 0),
(7, 'Other', 2, 1, '2019-04-20 07:23:07', '2019-04-20 07:23:07', 1, 1, 0);

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
(4, 2, 3, 1, '2019-04-03 03:37:55', '2019-04-03 03:37:55', 1, 1, 0),
(5, 4, 2, 1, '2019-04-03 03:37:55', '2019-04-03 03:37:55', 1, 1, 0),
(6, 5, 2, 1, '2019-04-03 03:37:55', '2019-04-03 03:37:55', 1, 1, 0),
(7, 6, 2, 1, '2019-04-03 03:37:55', '2019-04-03 03:37:55', 1, 1, 0),
(8, 7, 2, 1, '2019-04-03 03:37:55', '2019-04-03 03:37:55', 1, 1, 0);

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `modified_by` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_property_bookings`
--

INSERT INTO `tbl_property_bookings` (`booking_id`, `user_id`, `property_id`, `module_manage_id`, `duration_type_id`, `start_time`, `end_time`, `start_date`, `end_date`, `booking_amount`, `booking_status`, `created_at`, `updated_at`, `created_by`, `modified_by`, `is_deleted`) VALUES
(1, 32, 10, 2, 2, '00:00:01', '23:59:00', '2019-04-17', '2019-04-19', '6', 'pending', '2019-04-20 18:14:08', '2019-04-20 20:16:15', 0, 0, 0),
(2, 32, 10, 2, 2, '00:00:01', '23:59:00', '2019-04-20', '2019-04-22', '6', 'pending', '2019-04-20 18:15:20', '2019-04-20 12:45:22', 0, 0, 0),
(3, 32, 10, 2, 2, '00:00:01', '23:59:00', '2019-04-20', '2019-04-22', '6', 'pending', '2019-04-20 18:15:30', '2019-04-20 12:45:31', 0, 0, 0),
(4, 32, 10, 2, 2, '00:00:01', '23:59:00', '2019-04-20', '2019-04-22', '6', 'approved', '2019-04-20 18:15:52', '2019-04-20 12:45:53', 0, 0, 0),
(5, 32, 10, 2, 2, '00:00:01', '23:59:00', '2019-04-20', '2019-04-22', '6', 'approved', '2019-04-20 18:17:05', '2019-04-20 12:47:07', 0, 0, 0),
(6, 32, 10, 2, 2, '00:00:01', '23:59:00', '2019-04-20', '2019-04-22', '6', 'approved', '2019-04-20 18:20:59', '2019-04-20 12:51:01', 0, 0, 0),
(7, 32, 10, 2, 2, '00:00:01', '23:59:00', '2019-04-20', '2019-04-22', '6', 'approved', '2019-04-20 18:25:57', '2019-04-20 12:57:00', 0, 0, 0),
(8, 32, 10, 2, 2, '00:00:01', '23:59:00', '2019-04-21', '2019-04-21', '0', 'pending', '2019-04-20 19:14:23', NULL, 0, 0, 0),
(9, 32, 10, 2, 2, '00:00:01', '23:59:00', '2019-04-21', '2019-04-24', '9', 'approved', '2019-04-20 19:14:36', '2019-04-20 13:45:25', 0, 0, 0),
(10, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:04:24', NULL, 0, 0, 0),
(11, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:13:02', NULL, 0, 0, 0),
(12, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:13:06', NULL, 0, 0, 0),
(13, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:14:27', NULL, 0, 0, 0),
(14, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:14:42', NULL, 0, 0, 0),
(15, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:15:02', NULL, 0, 0, 0),
(16, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:15:57', NULL, 0, 0, 0),
(17, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:18:05', NULL, 0, 0, 0),
(18, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:23:19', NULL, 0, 0, 0),
(19, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:24:11', NULL, 0, 0, 0),
(20, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:24:12', NULL, 0, 0, 0),
(21, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:24:14', NULL, 0, 0, 0),
(22, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:24:24', NULL, 0, 0, 0),
(23, 32, 13, 2, 1, '12:33:00', '13:33:00', '2019-04-22', '2019-04-22', '20', 'pending', '2019-04-22 07:27:08', NULL, 0, 0, 0),
(24, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:17:35', NULL, 0, 0, 0),
(25, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:20:36', NULL, 0, 0, 0),
(26, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:21:13', NULL, 0, 0, 0),
(27, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:22:09', NULL, 0, 0, 0),
(28, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:23:05', NULL, 0, 0, 0),
(29, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:23:49', NULL, 0, 0, 0),
(30, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:23:53', NULL, 0, 0, 0),
(31, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:23:56', NULL, 0, 0, 0),
(32, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:24:26', NULL, 0, 0, 0),
(33, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:28:26', NULL, 0, 0, 0),
(34, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:28:30', NULL, 0, 0, 0),
(35, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:31:43', NULL, 0, 0, 0),
(36, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:35:42', NULL, 0, 0, 0),
(37, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:35:46', NULL, 0, 0, 0),
(38, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:36:16', NULL, 0, 0, 0),
(39, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:37:27', NULL, 0, 0, 0),
(40, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:37:51', NULL, 0, 0, 0),
(41, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:38:36', NULL, 0, 0, 0),
(42, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:39:00', NULL, 0, 0, 0),
(43, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:39:54', NULL, 0, 0, 0),
(44, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:40:50', NULL, 0, 0, 0),
(45, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:40:56', NULL, 0, 0, 0),
(46, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:41:01', NULL, 0, 0, 0),
(47, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:41:59', NULL, 0, 0, 0),
(48, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:42:49', NULL, 0, 0, 0),
(49, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:45:49', NULL, 0, 0, 0),
(50, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:45:52', NULL, 0, 0, 0),
(51, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:46:44', NULL, 0, 0, 0),
(52, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:47:00', NULL, 0, 0, 0),
(53, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:48:58', NULL, 0, 0, 0),
(54, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:50:50', NULL, 0, 0, 0),
(55, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:51:34', NULL, 0, 0, 0),
(56, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:52:01', NULL, 0, 0, 0),
(57, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:52:32', NULL, 0, 0, 0),
(58, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:53:13', NULL, 0, 0, 0),
(59, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:53:28', NULL, 0, 0, 0),
(60, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:54:24', NULL, 0, 0, 0),
(61, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:54:53', NULL, 0, 0, 0),
(62, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:55:34', NULL, 0, 0, 0),
(63, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:56:51', NULL, 0, 0, 0),
(64, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:57:15', NULL, 0, 0, 0),
(65, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:57:34', NULL, 0, 0, 0),
(66, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 06:58:28', NULL, 0, 0, 0),
(67, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:03:44', NULL, 0, 0, 0),
(68, 32, 13, 2, 1, '11:47:00', '12:47:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:04:12', NULL, 0, 0, 0),
(69, 32, 23, 2, 1, '12:47:00', '13:47:00', '2019-04-24', '2019-04-24', '40', 'pending', '2019-04-24 07:17:39', NULL, 0, 0, 0),
(70, 32, 23, 2, 1, '12:47:00', '13:47:00', '2019-04-24', '2019-04-24', '40', 'pending', '2019-04-24 07:18:08', NULL, 0, 0, 0),
(71, 32, 23, 2, 1, '12:47:00', '13:47:00', '2019-04-24', '2019-04-24', '40', 'pending', '2019-04-24 07:20:44', NULL, 0, 0, 0),
(72, 32, 23, 2, 1, '12:47:00', '13:47:00', '2019-04-24', '2019-04-24', '40', 'pending', '2019-04-24 07:20:46', NULL, 0, 0, 0),
(73, 32, 23, 2, 1, '12:47:00', '13:47:00', '2019-04-24', '2019-04-24', '40', 'pending', '2019-04-24 07:22:09', NULL, 0, 0, 0),
(74, 32, 12, 2, 1, '12:56:00', '13:56:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 07:26:24', NULL, 0, 0, 0),
(75, 32, 12, 2, 1, '12:56:00', '13:56:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 07:26:58', NULL, 0, 0, 0),
(76, 32, 12, 2, 1, '12:56:00', '13:56:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 07:27:41', NULL, 0, 0, 0),
(77, 32, 13, 2, 1, '12:56:00', '13:56:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:27:48', NULL, 0, 0, 0),
(78, 32, 13, 2, 1, '12:56:00', '13:56:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:28:15', NULL, 0, 0, 0),
(79, 32, 13, 2, 1, '12:56:00', '13:56:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:31:26', NULL, 0, 0, 0),
(80, 32, 13, 2, 1, '12:56:00', '13:56:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:31:36', NULL, 0, 0, 0),
(81, 32, 13, 2, 1, '12:56:00', '13:56:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:31:49', NULL, 0, 0, 0),
(82, 32, 13, 2, 1, '12:56:00', '13:56:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:31:58', NULL, 0, 0, 0),
(83, 32, 13, 2, 1, '12:56:00', '13:56:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:32:13', NULL, 0, 0, 0),
(84, 32, 13, 2, 1, '12:56:00', '13:56:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:32:27', NULL, 0, 0, 0),
(85, 32, 13, 2, 1, '13:05:00', '14:05:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:35:47', NULL, 0, 0, 0),
(86, 32, 13, 2, 1, '13:05:00', '14:05:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:37:53', NULL, 0, 0, 0),
(87, 32, 13, 2, 1, '13:05:00', '14:05:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 07:38:00', NULL, 0, 0, 0),
(88, 32, 13, 2, 1, '15:11:00', '16:11:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 09:41:17', NULL, 0, 0, 0),
(89, 32, 21, 2, 1, '15:11:00', '16:11:00', '2019-04-24', '2019-04-24', '12', 'pending', '2019-04-24 09:41:33', NULL, 0, 0, 0),
(90, 32, 21, 2, 1, '15:11:00', '16:11:00', '2019-04-24', '2019-04-24', '12', 'pending', '2019-04-24 09:41:56', NULL, 0, 0, 0),
(91, 32, 13, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '20', 'pending', '2019-04-24 09:46:41', NULL, 0, 0, 0),
(92, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 09:46:44', NULL, 0, 0, 0),
(93, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 09:47:56', NULL, 0, 0, 0),
(94, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:10:42', NULL, 0, 0, 0),
(95, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:14:24', NULL, 0, 0, 0),
(96, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:14:26', NULL, 0, 0, 0),
(97, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:19:29', NULL, 0, 0, 0),
(98, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:20:09', NULL, 0, 0, 0),
(99, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:20:12', NULL, 0, 0, 0),
(100, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:21:49', NULL, 0, 0, 0),
(101, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:21:51', NULL, 0, 0, 0),
(102, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:22:32', NULL, 0, 0, 0),
(103, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:22:34', NULL, 0, 0, 0),
(104, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:23:21', NULL, 0, 0, 0),
(105, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:23:22', NULL, 0, 0, 0),
(106, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:23:59', NULL, 0, 0, 0),
(107, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:24:01', NULL, 0, 0, 0),
(108, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:33:17', NULL, 0, 0, 0),
(109, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:36:28', NULL, 0, 0, 0),
(110, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:37:32', NULL, 0, 0, 0),
(111, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:37:33', NULL, 0, 0, 0),
(112, 32, 12, 2, 1, '15:16:00', '16:16:00', '2019-04-24', '2019-04-24', '4', 'pending', '2019-04-24 10:38:05', NULL, 0, 0, 0),
(113, 32, 13, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '20', 'pending', '2019-04-25 11:44:20', NULL, 0, 0, 0),
(114, 32, 13, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '20', 'pending', '2019-04-25 11:51:52', NULL, 0, 0, 0),
(115, 32, 13, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '20', 'pending', '2019-04-25 11:52:01', NULL, 0, 0, 0),
(116, 32, 13, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '20', 'pending', '2019-04-25 11:56:02', NULL, 0, 0, 0),
(117, 32, 13, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '20', 'pending', '2019-04-25 12:01:30', NULL, 0, 0, 0),
(118, 32, 13, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '20', 'pending', '2019-04-25 12:02:22', NULL, 0, 0, 0),
(119, 32, 13, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '20', 'pending', '2019-04-25 12:02:50', NULL, 0, 0, 0),
(120, 32, 13, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '20', 'pending', '2019-04-25 12:10:35', NULL, 0, 0, 0),
(121, 32, 13, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '20', 'pending', '2019-04-25 12:10:43', NULL, 0, 0, 0),
(122, 32, 21, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '12', 'pending', '2019-04-25 12:11:07', NULL, 0, 0, 0),
(123, 32, 21, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '12', 'pending', '2019-04-25 12:11:52', NULL, 0, 0, 0),
(124, 32, 21, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '12', 'pending', '2019-04-25 12:12:07', NULL, 0, 0, 0),
(125, 32, 21, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '12', 'pending', '2019-04-25 12:13:48', NULL, 0, 0, 0),
(126, 32, 21, 2, 1, '17:14:00', '18:14:00', '2019-04-25', '2019-04-25', '12', 'pending', '2019-04-25 12:18:30', NULL, 0, 0, 0),
(127, 32, 21, 2, 1, '17:51:00', '18:51:00', '2019-04-25', '2019-04-25', '12', 'pending', '2019-04-25 12:21:24', NULL, 0, 0, 0),
(128, 32, 13, 2, 1, '17:52:00', '18:52:00', '2019-04-23', '2019-04-24', '20', 'pending', '2019-04-25 12:22:25', '2019-04-25 13:00:24', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_ratings`
--
ALTER TABLE `booking_ratings`
  ADD PRIMARY KEY (`booking_rating_id`);

--
-- Indexes for table `booking_transactions`
--
ALTER TABLE `booking_transactions`
  ADD PRIMARY KEY (`txn_id`);

--
-- Indexes for table `connect_stripe_account_for_host`
--
ALTER TABLE `connect_stripe_account_for_host`
  ADD PRIMARY KEY (`connect_stripe_account_for_host_id`);

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
-- AUTO_INCREMENT for table `booking_ratings`
--
ALTER TABLE `booking_ratings`
  MODIFY `booking_rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking_transactions`
--
ALTER TABLE `booking_transactions`
  MODIFY `txn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `connect_stripe_account_for_host`
--
ALTER TABLE `connect_stripe_account_for_host`
  MODIFY `connect_stripe_account_for_host_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lnd_add_land_type`
--
ALTER TABLE `lnd_add_land_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lnd_add_property`
--
ALTER TABLE `lnd_add_property`
  MODIFY `property_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lnd_add_property_amenities`
--
ALTER TABLE `lnd_add_property_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lnd_add_property_availabilities`
--
ALTER TABLE `lnd_add_property_availabilities`
  MODIFY `availability_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lnd_add_property_cancellation_policies`
--
ALTER TABLE `lnd_add_property_cancellation_policies`
  MODIFY `prk_cancellation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lnd_add_property_files`
--
ALTER TABLE `lnd_add_property_files`
  MODIFY `file_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lnd_add_property_rent`
--
ALTER TABLE `lnd_add_property_rent`
  MODIFY `rent_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lnd_land_type`
--
ALTER TABLE `lnd_land_type`
  MODIFY `land_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prk_add_property`
--
ALTER TABLE `prk_add_property`
  MODIFY `property_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `prk_add_property_amenities`
--
ALTER TABLE `prk_add_property_amenities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `prk_add_property_availabilities`
--
ALTER TABLE `prk_add_property_availabilities`
  MODIFY `availability_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prk_add_property_cancellation_policies`
--
ALTER TABLE `prk_add_property_cancellation_policies`
  MODIFY `prk_cancellation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `prk_add_property_files`
--
ALTER TABLE `prk_add_property_files`
  MODIFY `file_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `prk_add_property_floors`
--
ALTER TABLE `prk_add_property_floors`
  MODIFY `floor_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `prk_add_property_rent`
--
ALTER TABLE `prk_add_property_rent`
  MODIFY `rent_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

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
  MODIFY `parking_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prk_property_days_time_availability`
--
ALTER TABLE `prk_property_days_time_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `prk_user_registrations`
--
ALTER TABLE `prk_user_registrations`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `amenity_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_mstr_amenities_with_category`
--
ALTER TABLE `tbl_mstr_amenities_with_category`
  MODIFY `amenity_cat_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

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
  MODIFY `location_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_mstr_location_type_with_module`
--
ALTER TABLE `tbl_mstr_location_type_with_module`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `booking_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

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

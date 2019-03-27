-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 07:17 PM
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
-- Table structure for table `prk_add_property`
--

CREATE TABLE `prk_add_property` (
  `property_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` text NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `prk_add_property_rent`
--

CREATE TABLE `prk_add_property_rent` (
  `rent_id` int(11) UNSIGNED NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `duration_type_id` int(11) UNSIGNED NOT NULL COMMENT 'Booking Duration Type 1-Hourly,2-Daily,3-Monthly',
  `car_type_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) UNSIGNED NOT NULL,
  `modified_by` int(11) UNSIGNED NOT NULL,
  `rent_ammount` varchar(100) NOT NULL COMMENT 'In Doller($)',
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No, 1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 'test', 1, '2019-03-22 17:52:35', '2019-03-22 17:52:35', 1, 1, 0),
(9, 'test', 1, '2019-03-22 17:55:34', '2019-03-22 17:55:34', 1, 1, 0),
(10, 'a', 1, '2019-03-22 17:56:01', '2019-03-22 17:56:01', 1, 1, 0),
(11, 'tt', 1, '2019-03-22 17:58:29', '2019-03-22 17:58:29', 1, 1, 0),
(12, 'test', 1, '2019-03-22 18:00:21', '2019-03-22 18:00:21', 1, 1, 0),
(13, 'rd', 0, '2019-03-22 18:11:14', '2019-03-23 21:54:04', 1, 1, 0),
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
(4, 'Handicap', 1, '2019-03-19 22:05:09', '2019-03-19 22:05:09', 0, 0, 0);

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
  `user_type_id` int(11) UNSIGNED NOT NULL COMMENT '1-Admin,2-Host,3-Customer,4-Team member',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0 - Inactive, 1 - Active ',
  `access_token` varchar(250) DEFAULT NULL,
  `registration_type` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1-Normal,2-Social',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - No,1 - Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'Land', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_amenities`
--

CREATE TABLE `tbl_mstr_amenities` (
  `amenity_id` int(11) NOT NULL,
  `amenity_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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
-- Dumping data for table `tbl_mstr_amenities`
--

INSERT INTO `tbl_mstr_amenities` (`amenity_id`, `amenity_name`, `module_manage_id`, `status`, `created_at`, `modified_at`, `created_by`, `modified_by`, `is_deleted`, `amenity_image`) VALUES
(1, 'Test', 2, 1, '2019-03-25 17:57:12', '2019-03-25 17:57:12', 1, 1, 0, 'Test.jpg'),
(2, 'sdd', 2, 1, '2019-03-25 18:17:03', '2019-03-25 18:17:03', 1, 1, 0, 'sdd.jpg');

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
(1, 'Hourly', 2, 1, '2019-03-19 21:33:19', '2019-03-24 18:55:32', 0, 0, 1),
(2, 'Daily', 2, 1, '2019-03-19 21:33:19', '2019-03-24 18:55:34', 0, 0, 0),
(3, 'Monthly', 2, 1, '2019-03-19 21:33:19', '2019-03-24 18:55:36', 0, 0, 0);

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prk_add_property`
--
ALTER TABLE `prk_add_property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `prk_fk_location_type_id` (`location_type_id`);

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
-- Indexes for table `tbl_mstr_booking_duration_type`
--
ALTER TABLE `tbl_mstr_booking_duration_type`
  ADD PRIMARY KEY (`duration_type_id`);

--
-- Indexes for table `tbl_mstr_location_type`
--
ALTER TABLE `tbl_mstr_location_type`
  ADD PRIMARY KEY (`location_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prk_add_property`
--
ALTER TABLE `prk_add_property`
  MODIFY `property_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prk_add_property_floors`
--
ALTER TABLE `prk_add_property_floors`
  MODIFY `floor_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `parking_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prk_user_registrations`
--
ALTER TABLE `prk_user_registrations`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `module_manage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_mstr_amenities`
--
ALTER TABLE `tbl_mstr_amenities`
  MODIFY `amenity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mstr_booking_duration_type`
--
ALTER TABLE `tbl_mstr_booking_duration_type`
  MODIFY `duration_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_mstr_location_type`
--
ALTER TABLE `tbl_mstr_location_type`
  MODIFY `location_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prk_add_property`
--
ALTER TABLE `prk_add_property`
  ADD CONSTRAINT `prk_fk_location_type_id` FOREIGN KEY (`location_type_id`) REFERENCES `tbl_mstr_location_type` (`location_type_id`) ON DELETE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20220707.b221bb2654
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2022 at 08:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epmcdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `patient_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(20) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cell_no` varchar(30) NOT NULL,
  `tel_no` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ec_name` varchar(100) NOT NULL,
  `relationship` varchar(30) NOT NULL,
  `ec_contact_no` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `activation_code` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `bp_systolic` int(11) NOT NULL,
  `bp_diastolic` int(11) NOT NULL,
  `pulse_rate` int(11) NOT NULL,
  `height` decimal(8,2) NOT NULL,
  `weight` decimal(8,2) NOT NULL,
  `consul_history` datetime NOT NULL,
  `consul_doctor` varchar(100) NOT NULL,
  `consul_next` date NOT NULL,
  `prescription` varchar(1000) NOT NULL,
  `diag_desc` varchar(300) NOT NULL,
  `diag_date` date NOT NULL,
  `diag_createdBy` varchar(100) NOT NULL,
  `objectives` varchar(300) NOT NULL,
  `symptoms` varchar(300) NOT NULL,
  `treatment` varchar(300) NOT NULL,
  `lab_report` blob NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`patient_id`, `full_name`, `age`, `birth_date`, `sex`, `occupation`, `address`, `cell_no`, `tel_no`, `email`, `ec_name`, `relationship`, `ec_contact_no`, `password`, `role`, `avatar`, `activation_code`, `status`, `date_created`, `blood_type`, `bp_systolic`, `bp_diastolic`, `pulse_rate`, `height`, `weight`, `consul_history`, `consul_doctor`, `consul_next`, `prescription`, `diag_desc`, `diag_date`, `diag_createdBy`, `objectives`, `symptoms`, `treatment`, `lab_report`, `user_id`) VALUES
(2, 'Kendrick Andre Aquino Sagala', 21, '2000-11-06', 'Male', 'Student', 'Manila, Philippines', '09176810006', '5325162', 'sagala.krch@gmail.com', 'Luciel Sagala', 'mother', '09175059036', '2000-11-06', 'patient', 'default-avatar.png', 0, 0, '2022-09-23 13:22:08', '', 0, 0, 0, '0.00', '0.00', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(3, 'Angelika Jayne Tanseco', 21, '2000-04-11', 'Female', 'Student', 'Cavite, Philippines', '09236547656', '7357576', 'angelika.jayne@gmail.com', 'Ariana Grande', 'guardian', '09236437573', '2000-04-11', 'patient', 'default-avatar.png', 0, 0, '2022-09-23 13:23:40', '', 0, 0, 0, '0.00', '0.00', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(4, 'Airi Satou', 17, '2003-08-04', 'Female', 'Student', 'Manila, Philippines', '09346547684', '7354724', 'airi.satou@gmail.com', 'Bruno Satou', 'father', '09354738465', '2003-08-04', 'patient', 'default-avatar.png', 0, 0, '2022-09-23 13:57:36', '', 0, 0, 0, '0.00', '0.00', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(5, 'Caesar Vance', 24, '1998-04-26', 'Male', 'Teacher', 'Cavite, Philippines', '09368294637', '9473465', 'caesar@gmail.com', 'Simon Vance', 'grandparent', '09263748245', '1998-04-26', 'patient', 'default-avatar.png', 0, 0, '2022-09-23 13:59:06', '', 0, 0, 0, '0.00', '0.00', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(6, 'Cara Stevens', 18, '2004-03-21', 'Female', 'Student', 'Malabon, Philippines', '09675768796', '7684563', 'cara@gmail.com', 'Kelly Stevens', 'mother', '09364734263', '2004-03-21', 'patient', 'default-avatar.png', 0, 0, '2022-09-23 14:00:42', '', 0, 0, 0, '0.00', '0.00', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(7, 'Brielle Williamson', 44, '1978-01-16', 'Female', 'Businesswoman ', 'Manila, Philippines', '096733452647', '4637548', 'briell@gmail.com', 'Bradley Greer', 'others', '09355768348', '1978-01-16', 'patient', 'default-avatar.png', 0, 0, '2022-09-23 14:02:29', '', 0, 0, 0, '0.00', '0.00', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(8, 'Jae Kristine Magaso', 21, '2000-11-27', 'Female', 'Student', 'Mandaluyong, NCR', '09352274632', '7462833', 'jaekristine.magaso.ab@ust.edu.ph', 'Butch Magaso', 'Father', '09447758354', '2000-11-27', 'patient', 'default-avatar.png', 0, 0, '2022-09-26 16:41:53', '', 0, 0, 0, '0.00', '0.00', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(9, 'Simon Ullado', 21, '2000-05-10', 'Male', 'Student', 'San Mateo, Rizal', '09332758846', '3747554', 'simon@gmail.com', 'Joann Ullado', 'Mother', '09375584937', '2000-05-10', 'patient', 'default-avatar.png', 0, 0, '2022-09-26 16:43:17', '', 0, 0, 0, '0.00', '0.00', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(10, 'Ashton Cox', 47, '1987-08-05', 'select', 'Pilot', 'San Juan, NCR', '09337264738', '7462534', 'ashton@gmail.com', 'Brenda Cox', 'Grandparent', '09337485634', '1987-08-05', 'patient', 'default-avatar.png', 7, 0, '2022-09-26 16:45:54', '', 0, 0, 0, '0.00', '0.00', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `full_name`, `email`, `contact_no`, `password`, `role`, `avatar`) VALUES
(1, 'Admin_full_name', 'example.admin@gmail.com', '09374957247', 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(150) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `inv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`patient_id`,`user_id`) USING BTREE;

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

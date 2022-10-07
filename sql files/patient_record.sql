-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20220707.b221bb2654
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2022 at 03:33 PM
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
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
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
  `last_checkup` date NOT NULL,
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

INSERT INTO `patient_record` (`patient_id`, `first_name`, `middle_name`, `last_name`, `age`, `birth_date`, `sex`, `occupation`, `address`, `cell_no`, `tel_no`, `email`, `ec_name`, `relationship`, `ec_contact_no`, `password`, `role`, `avatar`, `activation_code`, `status`, `date_created`, `blood_type`, `bp_systolic`, `bp_diastolic`, `pulse_rate`, `height`, `weight`, `last_checkup`, `consul_history`, `consul_doctor`, `consul_next`, `prescription`, `diag_desc`, `diag_date`, `diag_createdBy`, `objectives`, `symptoms`, `treatment`, `lab_report`, `user_id`) VALUES
(6, 'Kendrick Andre', 'Aquino', 'Sagala', 21, '2000-11-06', 'Male', 'Student', 'Manila, Philippines', '+639176810006', '5325162', 'sagala.krch@gmail.com', 'Luciel Sagala', 'Mother', '09175059036', '2000-11-06', 'patient', 'patient-avatar-6.png', 0, 0, '2022-10-07 05:53:23', '', 0, 0, 0, '5.40', '0.00', '2022-03-11', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(8, 'Simon', 'Caruso', 'UIlado', 21, '2000-05-10', 'Male', 'Driver', 'San Mateo, Rizal', '09446374463', '884736443', 'simon_ullado@gmail.com', 'Fabian Ullado', 'Father', '09336273642', '2000-05-10', 'patient', 'patient-avatar-8.png', 7, 0, '2022-10-07 06:45:58', '', 0, 0, 0, '0.00', '0.00', '2022-04-23', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(9, 'Denise', 'Ann', 'Mascarenas', 21, '2000-04-26', 'Female', 'Doctor', 'Manila, Philippines', '09336273362', '66374463', 'denise.mascarenas@gmail.com', 'Arjay Dequito', 'Others', '09336474463', '2000-04-26', 'patient', 'patient-avatar-9.png', 0, 0, '2022-10-07 06:47:10', '', 0, 0, 0, '0.00', '0.00', '2022-03-19', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(10, 'Sherllaine', 'Maria', 'Sumagui', 18, '2002-08-19', 'Female', 'Student', 'Laguna, Philippines', '09334357768', '99455532', 'sherllaine03@gmail.com', 'Sherllaine Marie Sumagui', 'Others', '09445433324', '2002-08-19', 'patient', 'patient-avatar-10.png', 0, 0, '2022-10-07 06:48:36', '', 0, 0, 0, '0.00', '0.00', '2022-08-11', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(11, 'Zachary', 'Bird', 'Tucker', 21, '2000-09-09', 'Male', 'Pilot', 'Manila, Philippines', '09223454434', '44354323', 'zach@gmail.com', 'Raiden Ellis', 'Guardian', '09225464034', '2000-09-09', 'patient', 'patient-avatar-11.png', 0, 0, '2022-10-07 06:51:29', '', 0, 0, 0, '0.00', '0.00', '2022-07-04', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(12, 'Maximilian', 'Huff', 'Kemp', 20, '2001-09-23', 'Male', 'Businessman', 'Cavite, Philippines', '09223945543', '44654342', 'max@gmail.com', 'Yaritza Nichols', 'Grandparent', '09334564734', '2001-09-23', 'patient', 'patient-avatar-12.png', 0, 0, '2022-10-07 06:52:54', '', 0, 0, 0, '0.00', '0.00', '2022-07-18', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(13, 'Amaris', 'Todd', 'Harell', 21, '2000-02-03', 'Female', 'Lawyer', 'Cavite, Philippines', '09335935748', '55654532', 'amaris@gmail.com', 'Bryan Kidd', 'Father', '09235565856', '2000-02-03', 'patient', 'patient-avatar-13.png', 0, 0, '2022-10-07 06:55:18', '', 0, 0, 0, '0.00', '0.00', '2022-06-03', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(14, 'Silas', 'Beck', 'Reeves', 55, '1955-02-09', 'Male', 'Engineer', 'Manila, Philippines', '09224564734', '55743574', 'silas@yahoo.com', 'Titus Chen', 'Others', '09334657845', '1955-02-09', 'patient', 'patient-avatar-14.png', 0, 0, '2022-10-07 06:56:44', '', 0, 0, 0, '0.00', '0.00', '2022-06-18', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(15, 'Yosef', 'Waters', 'Stuart', 23, '1998-09-08', 'Male', 'Software Developer', 'Manila, Philippines', '09887878987', '33432343', 'yosef@gmail.com', 'Darell Garett', 'Father', '09889809890', '1998-09-08', 'patient', 'patient-avatar-15.png', 3, 0, '2022-10-07 06:58:00', '', 0, 0, 0, '0.00', '0.00', '2022-05-23', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(20, 'Venge', 'Aquino', 'Angot', 21, '2002-02-22', 'Female', 'Student', 'Taguig, Manila', '09234435434', '4454343', 'venge@gmail.com', 'Venge Angot', 'Others', '09884657485', '2002-02-22', 'patient', 'patient-avatar-20.png', 6, 0, '2022-10-07 11:06:48', '', 0, 0, 0, '0.00', '0.00', '2022-10-07', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(21, 'Ange', 'Jayne', 'Tanseco', 21, '2000-03-23', 'Female', 'Flight Stewardess', 'Cavite, Philippines', '09223456656', '5564534', 'angelika.jayne@gmail.com', 'Ange Jayne Tanseco', 'Others', '09364734263', '2000-03-23', 'patient', 'patient-avatar-21.png', 0, 0, '2022-10-07 11:23:03', '', 0, 0, 0, '0.00', '0.00', '2022-10-07', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(22, 'Jhosua', 'Garcia', 'Fungo', 21, '2000-05-23', 'Male', 'Student', 'Manila, Philippines', '09235647758', '5647758', 'jhosuafungo@gmail.com', 'Jhosua Garcia Fungo', 'Father', '09263748245', '2000-05-23', 'patient', 'patient-avatar-22.png', 16, 0, '2022-10-07 11:39:20', '', 0, 0, 0, '0.00', '0.00', '2022-10-07', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0),
(23, 'Jae Kristine', 'DV', 'Magaso', 21, '2000-11-27', 'Female', 'Diplomat', 'San Juan, NCR', '09345564765', '6546656', 'jaekristine.magaso.ab@ust.edu.ph', 'Butch Magaso', 'Father', '09335675466', '2000-11-27', 'patient', 'patient-avatar-23.png', 0, 0, '2022-10-07 13:38:21', '', 0, 0, 0, '0.00', '0.00', '2022-10-07', '0000-00-00 00:00:00', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`patient_id`,`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

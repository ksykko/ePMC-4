-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20220707.b221bb2654
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2022 at 08:44 PM
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
-- Table structure for table `arc_patient_details`
--

CREATE TABLE `arc_patient_details` (
  `patient_id` int(11) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `bp_systolic` int(11) NOT NULL,
  `bp_diastolic` int(11) NOT NULL,
  `pulse_rate` int(11) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `prescription` varchar(1000) NOT NULL,
  `consul_next` datetime NOT NULL,
  `objectives` varchar(1000) NOT NULL,
  `symptoms` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arc_patient_details`
--

INSERT INTO `arc_patient_details` (`patient_id`, `blood_type`, `bp_systolic`, `bp_diastolic`, `pulse_rate`, `height`, `weight`, `prescription`, `consul_next`, `objectives`, `symptoms`) VALUES
(78, '', 0, 0, 0, '0', '0', '', '1970-01-01 08:00:00', '', ''),
(79, '', 0, 0, 0, '0', '0', '', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `arc_patient_diagnosis`
--

CREATE TABLE `arc_patient_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `p_diag_date` datetime NOT NULL,
  `p_recent_diagnosis` varchar(1000) NOT NULL,
  `p_doctor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arc_patient_diagnosis`
--

INSERT INTO `arc_patient_diagnosis` (`id`, `patient_id`, `p_diag_date`, `p_recent_diagnosis`, `p_doctor`) VALUES
(68, 78, '0000-00-00 00:00:00', '', ''),
(69, 79, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `arc_patient_lab_reports`
--

CREATE TABLE `arc_patient_lab_reports` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doc_name` varchar(100) DEFAULT NULL,
  `document` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arc_patient_lab_reports`
--

INSERT INTO `arc_patient_lab_reports` (`id`, `patient_id`, `doc_name`, `document`) VALUES
(57, 78, NULL, NULL),
(58, 79, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `arc_patient_record`
--

CREATE TABLE `arc_patient_record` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `civil_status` varchar(55) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cell_no` varchar(30) DEFAULT NULL,
  `tel_no` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ec_name` varchar(100) DEFAULT NULL,
  `relationship` varchar(30) DEFAULT NULL,
  `ec_contact_no` varchar(30) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `activation_code` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_checkup` date NOT NULL,
  `last_accessed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arc_patient_record`
--

INSERT INTO `arc_patient_record` (`patient_id`, `first_name`, `middle_name`, `last_name`, `age`, `birth_date`, `sex`, `civil_status`, `occupation`, `address`, `cell_no`, `tel_no`, `email`, `ec_name`, `relationship`, `ec_contact_no`, `password`, `type`, `role`, `avatar`, `activation_code`, `status`, `date_created`, `last_checkup`, `last_accessed`) VALUES
(78, 'Ken', '', 'Sagala', 0, '1111-11-11', NULL, NULL, '', '', '', '', '', '', NULL, '', '1111-11-11', 'added', 'patient', 'default-avatar.png', 0, 0, '2022-11-10 02:17:52', '2022-11-10', '2022-11-10 02:20:30'),
(79, 'Ken', '', 'Sagala', 0, '1111-11-11', NULL, NULL, '', '', '', '', '', '', NULL, '', '1111-11-11', 'added', 'patient', 'default-avatar.png', 0, 0, '2022-11-10 02:42:55', '2022-11-10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `arc_patient_treatment_plan`
--

CREATE TABLE `arc_patient_treatment_plan` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `p_diagnosis` varchar(1000) NOT NULL,
  `p_treatment_plan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arc_patient_treatment_plan`
--

INSERT INTO `arc_patient_treatment_plan` (`id`, `patient_id`, `p_diagnosis`, `p_treatment_plan`) VALUES
(60, 78, '', ''),
(61, 79, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_dosage` varchar(20) NOT NULL,
  `prod_desc` varchar(200) NOT NULL,
  `stock_in` int(11) NOT NULL,
  `stock_out` int(11) NOT NULL,
  `prod_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `prod_name`, `prod_dosage`, `prod_desc`, `stock_in`, `stock_out`, `prod_date`) VALUES
(1, 'Neozep ', '500 mg', 'contains Phenylephrine HCl, Chlorphenamine Maleate and Paracetamol.Phenylephrine HCl a nasal ..', 50, 60, '2022-09-26 12:19:38'),
(2, 'Biogesic ', '200 mg', 'an analgesic-antipyretic- For adults and children 12 years old and above- Can be consumed on an empty stomach.......', 94, 170, '2022-09-26 12:19:50'),
(3, 'Bioflu ', '100 mg', 'for the multiple symptoms of flu such as fever, body pain, colds and cough (from post-nasal drip) so you can quickly get up ', 8, 95, '2022-09-26 12:19:59'),
(5, 'Alaxan ', '500 mg', 'provides the fast relief solution for body pain in as fast as 15 minutes, with its synergy of Ibuprofen and Paracetamol....', 75, 13, '2022-09-26 12:20:20'),
(6, 'Skelan ', '200 mg', 'the lowest effective dose of naproxen sodium should be used for the shortest possible time. This medicine is given .....', 61, 45, '2022-09-26 12:20:20'),
(7, 'Medicol Advance ', '300 mg', 'Get fast relief for your different pains:-Headache-Migraine-Body Pains-Toothache-Dysmenorrhea-Pains from ....', 14, 50, '2022-09-26 12:20:20'),
(8, 'Liverprime ', '200 mg', 'a combination of silybin and phosphatidylcholine and is three times better absorbed than plain Silymarin....', 82, 78, '2022-09-26 12:20:20'),
(9, 'Adoxa Pak ', '100 mg', 'Doxycycline is used to treat many different bacterial infections, such as acne, urinary tract infections, intestinal infections, respiratory infections, eye infections, gonorrhea, chlamydia, syphilis,', 45, 40, '2022-09-26 12:20:20'),
(10, 'Benzodiazepine ', '100 mg', 'Ativan belongs to a group of drugs called benzodiazepines (ben-zoe-dye-AZE-eh-peens). It is thought that lorazepam works by enhancing the activity of certain neurotransmitters in the brain.', 51, 10, '2022-09-26 12:20:20'),
(11, 'Onpattro', '1000 mg', 'Onpattro a double-stranded small interfering ribonucleic acid (siRNA), formulated as a lipid complex injection.', 72, 52, '2022-09-26 12:20:20'),
(12, 'Adderall XR', '500 mg', 'Adderall is used to treat attention deficit hyperactivity disorder (ADHD) and narcolepsy. Adderall contains a combination of amphetamine and dextroamphetamine. Amphetamine and dextroamphetamine are ce', 10, 72, '2022-09-26 12:20:20'),
(16, 'Xanax XR', '300 mg', 'Xanax is a benzodiazepine (ben-zoe-dye-AZE-eh-peen). It is thought that alprazolam works by enhancing the activity of certain neurotransmitters in the brain.', 45, 52, '2022-09-30 15:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `patient_id` int(11) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `bp_systolic` int(11) NOT NULL,
  `bp_diastolic` int(11) NOT NULL,
  `pulse_rate` int(11) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `prescription` varchar(1000) NOT NULL,
  `consul_next` datetime NOT NULL,
  `objectives` varchar(1000) NOT NULL,
  `symptoms` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`patient_id`, `blood_type`, `bp_systolic`, `bp_diastolic`, `pulse_rate`, `height`, `weight`, `prescription`, `consul_next`, `objectives`, `symptoms`) VALUES
(1, 'A+', 2, 2, 2, '165', '64', 'pres1', '2022-10-22 13:00:00', 'obj1', 'symp1'),
(2, 'A-', 1, 1, 1, '160', '51', 'pres2', '2022-10-23 08:00:00', 'obj2', 'symp2'),
(5, '', 0, 0, 0, '160', '70', '', '1970-01-01 08:00:00', '', ''),
(6, 'A+', 6, 6, 6, '154', '49', 'pres6', '2022-10-24 08:00:00', 'obj6', 'symp6'),
(7, 'AB+', 100, 80, 80, '160', '65', 'pres7', '2022-10-26 09:00:00', 'obj7', 'symptoms7'),
(8, '', 0, 0, 0, '0', '0', '', '1970-01-01 08:00:00', '', ''),
(9, '', 0, 0, 0, '155', '74', '', '1970-01-01 08:00:00', '', ''),
(10, '', 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '', ''),
(13, '', 0, 0, 0, '', '', '', '1970-01-01 08:00:00', '', ''),
(14, '', 0, 0, 0, '', '', '', '1970-01-01 08:00:00', '', ''),
(15, '', 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '', ''),
(16, '', 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '', ''),
(17, '', 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '', ''),
(18, '', 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '', ''),
(19, '', 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '', ''),
(21, '', 0, 0, 0, '0', '0', '', '0000-00-00 00:00:00', '', ''),
(76, '', 0, 0, 0, '152', '59', '', '1970-01-01 08:00:00', '', ''),
(77, '', 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosis`
--

CREATE TABLE `patient_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `p_diag_date` datetime NOT NULL,
  `p_recent_diagnosis` varchar(1000) NOT NULL,
  `p_doctor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_diagnosis`
--

INSERT INTO `patient_diagnosis` (`id`, `patient_id`, `p_diag_date`, `p_recent_diagnosis`, `p_doctor`) VALUES
(1, 1, '2022-10-21 00:00:00', 'This is patient-1\'s diagnosis 1', 'Jass Hussein'),
(3, 1, '2022-10-21 00:00:00', 'This is patient-1\'s diagnosis 2', 'Miguel Pagtakhan'),
(5, 1, '2022-10-21 00:00:00', 'This is patient-1\'s diagnosis 3', 'Jass Hussein'),
(6, 1, '2022-10-21 00:00:00', 'This is patient-1\'s diagnosis 4	', 'Miguel Pagtakhan'),
(12, 2, '2022-10-22 01:00:00', 'diag2_1', 'Jass Hussein'),
(13, 2, '2022-10-22 01:00:00', 'diag2_2', 'Miguel Pagtakhan'),
(14, 2, '2022-10-22 01:01:00', 'diag2_3', 'Jass Hussein'),
(15, 5, '2022-10-22 02:08:00', 'diag5_1', 'Miguel Pagtakhan'),
(16, 5, '2022-10-22 02:09:00', 'This is diagnosis5_2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lorem massa, imperdiet vitae fermentum sit amet, fermentum non sapien. Vestibulum luctus tempor sapien, eu rutrum dolor lacinia eu. Cras iaculis pulvinar diam at scelerisque.', 'Jass Hussein'),
(17, 6, '2022-11-09 10:51:00', 'diag6_1', 'Jass Hussein'),
(18, 7, '0000-00-00 00:00:00', '', ''),
(19, 8, '0000-00-00 00:00:00', '', ''),
(20, 9, '0000-00-00 00:00:00', '', ''),
(21, 10, '0000-00-00 00:00:00', '', ''),
(24, 13, '0000-00-00 00:00:00', '', ''),
(25, 14, '0000-00-00 00:00:00', '', ''),
(26, 15, '0000-00-00 00:00:00', '', ''),
(27, 16, '0000-00-00 00:00:00', '', ''),
(28, 17, '0000-00-00 00:00:00', '', ''),
(29, 18, '0000-00-00 00:00:00', '', ''),
(30, 19, '0000-00-00 00:00:00', '', ''),
(31, 21, '0000-00-00 00:00:00', '', ''),
(61, 1, '2022-11-09 01:34:00', 'This is patient-1\'s diagnosis 5', 'Jass Hussein'),
(66, 76, '0000-00-00 00:00:00', '', ''),
(67, 77, '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_lab_reports`
--

CREATE TABLE `patient_lab_reports` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doc_name` varchar(100) DEFAULT NULL,
  `document` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_lab_reports`
--

INSERT INTO `patient_lab_reports` (`id`, `patient_id`, `doc_name`, `document`) VALUES
(1, 1, '', ''),
(2, 2, '', ''),
(3, 5, '', ''),
(4, 6, '', ''),
(5, 7, '', ''),
(6, 8, '', ''),
(7, 9, '', ''),
(8, 10, '', ''),
(11, 13, '', ''),
(12, 14, '', ''),
(13, 15, '', ''),
(14, 16, '', ''),
(15, 17, '', ''),
(16, 18, '', ''),
(17, 19, '', ''),
(18, 21, '', ''),
(55, 76, 'Imported File', 0x696d706f72742d37362e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `civil_status` varchar(55) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cell_no` varchar(30) DEFAULT NULL,
  `tel_no` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ec_name` varchar(100) DEFAULT NULL,
  `relationship` varchar(30) DEFAULT NULL,
  `ec_contact_no` varchar(30) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `activation_code` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_checkup` date NOT NULL,
  `last_accessed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`patient_id`, `first_name`, `middle_name`, `last_name`, `age`, `birth_date`, `sex`, `civil_status`, `occupation`, `address`, `cell_no`, `tel_no`, `email`, `ec_name`, `relationship`, `ec_contact_no`, `password`, `type`, `role`, `avatar`, `activation_code`, `status`, `date_created`, `last_checkup`, `last_accessed`) VALUES
(1, 'Kendrick Andre', 'Aquino', 'Sagala', 22, '2000-11-06', 'Male', 'Single', 'Programmer', 'Manila, Philippines', '+639176810006', '5325162', 'sagala.krch@gmail.com', 'Klarisse Sagala', 'Sibling', '09175059036', '2000-11-06', 'added', 'patient', 'patient-avatar-1.jpg', 0, 0, '2022-10-21 13:33:46', '2022-10-21', '2022-10-24 00:08:40'),
(2, 'Denise', 'Ann', 'Mascarenas', 22, '2000-02-13', 'Female', 'Married', 'Doctor', 'Laguna, Philippines', '+639772524193', '9999999', 'denise.mascarenas@gmail.com', 'Denise', 'Others', '09364734263', '2000-02-13', 'added', 'patient', 'patient-avatar-2.png', 0, 0, '2022-10-21 13:35:04', '2022-10-21', '2022-10-22 02:02:59'),
(5, 'Simon', 'Caruso', 'Ullado', 22, '2000-05-10', 'Male', 'Single', 'Driver', 'San Mateo, Rizal', '+639772524193', '3333333', 'simon_ullado@gmail.com', 'Fabian Ullado', 'Father', '09354738465', '2000-05-10', 'added', 'patient', 'patient-avatar-5.jpg', 0, 0, '2022-10-22 02:05:57', '2022-10-22', '2022-11-04 15:59:32'),
(6, 'Jae Kristine', 'DV', 'Magaso', 21, '2000-11-27', 'Female', '', 'Architect', 'Mandaluyong, NCR', '+639772524193', '5555555', 'jaekristine.magaso.ab@ust.edu.ph', 'Butch Magaso', 'Father', '09364734263', '2000-11-27', 'added', 'patient', 'patient-avatar-6.jpg', 35, 0, '2022-10-22 15:09:20', '2022-10-22', '2022-10-26 01:06:14'),
(7, 'Paul', 'Yeshua', 'Caabay', 21, '2000-06-05', 'Male', '', 'Programmer', 'Cavite, Philippines', '+639176810006', '5647384', 'paulyeshua@gmail.com', 'Paul', 'Child', '09175059036', '2000-06-05', 'added', 'patient', 'patient-avatar-7.png', 0, 0, '2022-10-22 21:34:34', '2022-10-22', '0000-00-00 00:00:00'),
(8, 'Paul', 'Jeremy', 'Manuel', 40, '1982-08-29', 'Male', '', 'Software Developer', 'Pasig, Philippines', '+639772524193', '5647584', 'paul.jeremy@gmail.com', 'PJ', 'Spouse', '09354738465', '1982-08-29', 'added', 'patient', 'default-avatar.png', 0, 0, '2022-10-23 01:10:25', '2022-10-23', '0000-00-00 00:00:00'),
(9, 'Meynard', 'Julien', 'Trinidad', 51, '1970-11-25', 'Male', '', 'Driver', 'Pasig, Philippines', '+639772524193', '5748837', 'meynard@gmail.com', 'Meynard', 'Grandparent', '09354738465', '1970-11-25', 'added', 'patient', 'default-avatar.png', 0, 0, '2022-10-23 01:34:57', '2022-10-23', '0000-00-00 00:00:00'),
(10, 'Luciel', 'Ann', 'Sagala', 40, '1982-09-15', 'Female', '', 'Secretary', 'Marikina, NCR', '+639176810006', '8675586', 'luciel@gmail.com', 'Roderick Sagala', 'Spouse', '09263748245', '1982-09-15', 'added', 'patient', 'default-avatar.png', 0, 0, '2022-10-23 01:36:56', '2022-10-23', '0000-00-00 00:00:00'),
(13, 'Alden', 'Horn', 'Mcgee', 38, '1984-03-14', 'Male', 'Single', 'Worker', 'Manila, Philippines', '+639176810006', '84756473', 'alden@gmail.com', 'Collin Nguyen', 'Spouse', '09364734263', '1984-03-14', 'added', 'patient', 'patient-avatar-13.png', 0, 0, '2022-10-23 13:18:40', '2022-10-23', '2022-11-05 13:46:42'),
(14, 'Deborah', 'Merritt', 'Burch', 49, '1973-09-12', 'Female', '', 'Businesswoman ', 'Cavite, Philippines', '+639772524193', '4857748', 'deborah@gmail.com', 'Faith Holden', 'Sibling', '09354738465', '1973-09-12', 'added', 'patient', 'default-avatar.png', 6, 0, '2022-10-23 13:21:01', '2022-10-23', '0000-00-00 00:00:00'),
(15, 'Bryce', 'Larsen', 'Boone', 77, '1945-10-06', 'Male', '', 'Businessman', 'Mandaluyong, NCR', '+639176810006', '92847284', 'bryce.boone@gmail.com', 'Hayley Wiley', 'Spouse', '09354738465', '1945-10-06', 'added', 'patient', 'default-avatar.png', 0, 0, '2022-10-23 13:24:35', '2022-10-23', '0000-00-00 00:00:00'),
(16, 'Esteban', 'Hanson', 'Gill', 77, '1945-01-05', 'Female', '', 'Businesswoman ', 'Cavite, Philippines', '+639176810006', '4857758', 'esteban@gmail.com', 'Douglas Chavez', 'Child', '09236437573', '1945-01-05', 'added', 'patient', 'default-avatar.png', 0, 0, '2022-10-23 13:26:25', '2022-10-23', '0000-00-00 00:00:00'),
(17, 'Tabitha', 'Pena ', 'Reeves', 72, '1950-05-21', 'Female', '', 'Housewife', 'Laguna, Philippines', '+639176810006', '3948573', 'tabitha@yahoo.com', 'Jaden Pena', 'Child', '09236437573', '1950-05-21', 'added', 'patient', 'default-avatar.png', 0, 0, '2022-10-23 13:27:42', '2022-10-23', '0000-00-00 00:00:00'),
(18, 'Breanna', 'Riggs', 'Combs', 79, '1942-11-03', 'Female', '', 'Housewife', 'Laguna, Philippines', '+639176810006', '9284473', 'breanna@yahoo.com', 'Kendra Riggs', 'Guardian', '09175059036', '1942-11-03', 'added', 'patient', 'default-avatar.png', 0, 0, '2022-10-23 13:28:58', '2022-10-23', '0000-00-00 00:00:00'),
(19, 'Keane', 'Uy', 'Jose', 14, '2008-04-26', 'Male', '', 'Student', 'Manila, Philippines', '+639176810006', '5847736', 'keane@gmail.com', 'Lily', 'Mother', '09236437573', '2008-04-26', 'added', 'patient', 'default-avatar.png', 0, 0, '2022-10-24 00:06:01', '2022-10-24', '2022-11-04 23:32:55'),
(21, 'John', 'Melvil', 'Templanza', 85, '1111-11-11', 'Male', '', 'Student', 'Manila, Philippines', '+639176810006', '4345232', 'melviltemplanza@gmail.com', 'Melvs', 'Other', '09175059036', '1111-11-11', 'added', 'patient', 'default-avatar.png', 0, 0, '2022-10-25 01:27:56', '2022-10-25', '2022-11-05 02:37:02'),
(76, 'Pedrito Lopez', '', '', 63, '1958-01-12', 'Male', 'Married', 'Tel Technician', 'Aswapt Legaspi St Binakayan Kawit Cavite', '09493100165', '436-7753', '', '', '', '', '1958-01-12', 'import', 'patient', 'default-avatar.png', 0, 0, '2022-11-09 23:58:12', '0000-00-00', '0000-00-00 00:00:00'),
(77, 'Felecitas Santos \"Fely\"', '', '', 74, '0000-00-00', NULL, NULL, '', 'Kaingen Bacoor, Cavite', '', '', '', '', '', '', '', 'import', 'patient', 'default-avatar.png', 0, 0, '2022-11-09 23:59:33', '0000-00-00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_treatment_plan`
--

CREATE TABLE `patient_treatment_plan` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `p_diagnosis` varchar(1000) NOT NULL,
  `p_treatment_plan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_treatment_plan`
--

INSERT INTO `patient_treatment_plan` (`id`, `patient_id`, `p_diagnosis`, `p_treatment_plan`) VALUES
(1, 1, 'This is patient-1\'s diagnosis 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt tincidunt elit, ut aliquet ante cursus vel. Nam rutrum facilisis neque, mattis maximus felis blandit at. Cras elementum sagittis vestibulum. Duis tincidunt sit amet dui aliquam dignissim. Vestibulum ut est sed lorem molestie eleifend eget ut erat.'),
(4, 2, 'This is diagnosis2_1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lorem massa, imperdiet vitae fermentum sit amet, fermentum non sapien. Vestibulum luctus tempor sapien, eu rutrum dolor lacinia eu. Cras iaculis pulvinar diam at scelerisque. ', 'This is treatment2_1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lorem massa, imperdiet vitae fermentum sit amet, fermentum non sapien. Vestibulum luctus tempor sapien, eu rutrum dolor lacinia eu. Cras iaculis pulvinar diam at scelerisque. '),
(8, 2, 'This is diagnosis2_2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lorem massa, imperdiet vitae fermentum sit amet, fermentum non sapien. Vestibulum luctus tempor sapien, eu rutrum dolor lacinia eu. Cras iaculis pulvinar diam at scelerisque.', 'This is treatment2_2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lorem massa, imperdiet vitae fermentum sit amet, fermentum non sapien. Vestibulum luctus tempor sapien, eu rutrum dolor lacinia eu. Cras iaculis pulvinar diam at scelerisque.'),
(9, 5, 'This is diagnosis5_1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lorem massa, imperdiet vitae fermentum sit amet, fermentum non sapien. Vestibulum luctus tempor sapien, eu rutrum dolor lacinia eu. Cras iaculis pulvinar diam at scelerisque.', 'This is treatment5_1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lorem massa, imperdiet vitae fermentum sit amet, fermentum non sapien. Vestibulum luctus tempor sapien, eu rutrum dolor lacinia eu. Cras iaculis pulvinar diam at scelerisque.'),
(10, 1, 'This is patient-1\'s diagnosis 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt tincidunt elit, ut aliquet ante cursus vel. Nam rutrum facilisis neque, mattis maximus felis blandit at. Cras elementum sagittis vestibulum. Duis tincidunt sit amet dui aliquam dignissim. Vestibulum ut est sed lorem molestie eleifend eget ut erat.'),
(11, 6, '', ''),
(12, 7, '', ''),
(13, 8, '', ''),
(14, 9, '', ''),
(15, 10, '', ''),
(18, 13, '', ''),
(19, 14, '', ''),
(20, 15, '', ''),
(21, 16, '', ''),
(22, 17, '', ''),
(23, 18, '', ''),
(24, 19, '', ''),
(25, 21, '', ''),
(58, 76, '', ''),
(59, 77, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `doctor_name` varchar(30) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `sun` varchar(10) DEFAULT NULL,
  `mon` varchar(10) DEFAULT NULL,
  `tue` varchar(10) DEFAULT NULL,
  `wed` varchar(10) DEFAULT NULL,
  `thurs` varchar(10) DEFAULT NULL,
  `fri` varchar(10) DEFAULT NULL,
  `sat` varchar(10) DEFAULT NULL,
  `theme` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `doctor_name`, `specialization`, `start_time`, `end_time`, `sun`, `mon`, `tue`, `wed`, `thurs`, `fri`, `sat`, `theme`) VALUES
(1, 'Dr. Jass Hussein', 'Orthopedics', '14:00:00', '16:30:00', NULL, NULL, 'Tue', NULL, 'Thurs', NULL, NULL, 'color3'),
(2, 'Dr. Miguel Pagtakhan', 'Internal Medicine', '07:00:00', '12:00:00', NULL, 'Mon', 'Tue', 'Wed', NULL, 'Fri', 'Sat', 'color5'),
(3, 'Dr. Miguel Pagtakhan', 'Internal Medicine', '14:00:00', '16:30:00', NULL, NULL, NULL, NULL, 'Thurs', NULL, NULL, 'color2');

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
  `avatar` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `avatar`, `role`, `specialization`, `birth_date`, `gender`, `contact_no`, `email`, `date_created`) VALUES
(1, 'Paul Jeremy', 'Catama', 'Manuel', 'pjmanuel', 'admin123', 'default-avatar.png', 'Admin', 'Admin', '2001-01-02', 'Male', '09278484123', 'adminpj@gmail.com', '2022-10-11 04:52:17'),
(2, 'Mary Angel', 'Rom', 'Sandoval', 'riansandoval', 'admin123', 'default-avatar.png', 'Admin', 'Admin', '2000-07-25', 'Female', '09122345672', 'adminri@gmail.com', '2022-10-11 04:53:22'),
(3, 'Jass', 'Cruz', 'Hussein', 'jasshussein', 'doctor123', 'default-avatar.png', 'Doctor', 'Orthopedics', '1984-12-24', 'Male', '09151881324', 'doctorjass@gmail.com', '2022-10-11 04:54:54'),
(4, 'Miguel', 'Gomez', 'Pagtakhan', 'miguelpagtakhan', 'doctor123', 'default-avatar.png', 'Doctor', 'Internal Medicine', '1982-11-08', 'Male', '09458231953', 'doctormiguel@gmail.com', '2022-10-11 04:56:01'),
(5, 'Genalyn', 'Rodriguez', 'Tupan', 'genalyntupan', 'admin123', 'default-avatar.png', 'Admin', 'Secretary', '1979-05-23', 'Female', '09922553123', 'admingena@gmail.com', '2022-10-11 04:58:39'),
(6, 'Emelie', 'Robredo', 'Pagtakhan', 'emeliepagtakhan', 'admin123', 'default-avatar.png', 'Admin', 'General Manager', '1970-05-21', 'Female', '09181572324', 'adminemelie@gmail.com', '2022-10-11 05:00:22'),
(7, 'Karen', 'Paulino', 'Tamayo', 'karentamayo', 'secretary123', 'default-avatar.png', 'Admin', 'Secretary', '1989-03-15', 'Female', '09123456789', 'adminkaren@gmail.com', '2022-10-11 05:03:57'),
(8, 'Marissa', 'Santos', 'Samaniego', 'marissasamaniego', 'nurse123', 'default-avatar.png', 'User', 'Nurse', '1992-05-03', 'Female', '09552135372', 'nursemarissa@gmail.com', '2022-10-11 05:04:56'),
(9, 'Carina', 'Galvez', 'Tumimbang', 'carinatumimbang', 'pharma123', 'default-avatar.png', 'User', 'Pharmacy Assistant', '0000-00-00', 'Female', '09270958582', 'pharmacarina@gmail.com', '2022-10-11 05:04:56'),
(10, 'Melody', 'Burgos', 'Gayondato', 'melodygayondato', 'cashier123', 'default-avatar.png', 'User', 'Cashier', '1995-07-11', 'Female', '09252172717', 'cashiermelody@gmail.com', '2022-10-11 05:04:56'),
(11, 'Justin', 'Miguel', 'Roberts', 'justinroberts', 'patient123', 'default-avatar.png', 'User', 'Patient', '1999-01-05', 'Male', '09912312861', 'patientjustin@gmail.com', '2022-10-11 05:09:51'),
(12, 'Michaela', 'Santiago', 'Zamora', 'michaelazamora', 'patient123', 'default-avatar.png', 'User', 'Patient', '1997-09-09', 'Female', '09328578275', 'patientmichaela@gmail.com', '2022-10-11 05:09:51'),
(15, 'Kendrick Andre', 'Aquino', 'Sagala', 'adminken', 'admin123', 'default-avatar.png', 'Admin', 'Admin', '2000-11-06', 'Male', '+639176810006', 'sagala.krch@gmail.com', '2022-10-27 17:08:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arc_patient_details`
--
ALTER TABLE `arc_patient_details`
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `arc_patient_diagnosis`
--
ALTER TABLE `arc_patient_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `arc_patient_lab_reports`
--
ALTER TABLE `arc_patient_lab_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `arc_patient_record`
--
ALTER TABLE `arc_patient_record`
  ADD PRIMARY KEY (`patient_id`) USING BTREE;

--
-- Indexes for table `arc_patient_treatment_plan`
--
ALTER TABLE `arc_patient_treatment_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_diagnosis`
--
ALTER TABLE `patient_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_diagnosis_ibfk_1` (`patient_id`);

--
-- Indexes for table `patient_lab_reports`
--
ALTER TABLE `patient_lab_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_lab_reports_ibfk_1` (`patient_id`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`patient_id`) USING BTREE;

--
-- Indexes for table `patient_treatment_plan`
--
ALTER TABLE `patient_treatment_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_treatment_plan_ibfk_1` (`patient_id`);

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
-- AUTO_INCREMENT for table `arc_patient_diagnosis`
--
ALTER TABLE `arc_patient_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `arc_patient_lab_reports`
--
ALTER TABLE `arc_patient_lab_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `arc_patient_record`
--
ALTER TABLE `arc_patient_record`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `arc_patient_treatment_plan`
--
ALTER TABLE `arc_patient_treatment_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `patient_diagnosis`
--
ALTER TABLE `patient_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `patient_lab_reports`
--
ALTER TABLE `patient_lab_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `patient_treatment_plan`
--
ALTER TABLE `patient_treatment_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arc_patient_details`
--
ALTER TABLE `arc_patient_details`
  ADD CONSTRAINT `arc_patient_details_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `arc_patient_record` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `arc_patient_diagnosis`
--
ALTER TABLE `arc_patient_diagnosis`
  ADD CONSTRAINT `arc_patient_diagnosis_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `arc_patient_record` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `arc_patient_lab_reports`
--
ALTER TABLE `arc_patient_lab_reports`
  ADD CONSTRAINT `arc_patient_lab_reports_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `arc_patient_record` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `arc_patient_treatment_plan`
--
ALTER TABLE `arc_patient_treatment_plan`
  ADD CONSTRAINT `arc_patient_treatment_plan_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `arc_patient_record` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD CONSTRAINT `patient_details_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_record` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_diagnosis`
--
ALTER TABLE `patient_diagnosis`
  ADD CONSTRAINT `patient_diagnosis_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_record` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_lab_reports`
--
ALTER TABLE `patient_lab_reports`
  ADD CONSTRAINT `patient_lab_reports_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_record` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_treatment_plan`
--
ALTER TABLE `patient_treatment_plan`
  ADD CONSTRAINT `patient_treatment_plan_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_record` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

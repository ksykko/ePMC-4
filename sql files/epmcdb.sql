-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20220707.b221bb2654
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2022 at 06:51 PM
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
(2, 'B+', 40, 40, 40, '40', '40', 'pres2', '2022-10-18 19:23:44', 'obj2', 'symp2'),
(3, 'A+', 50, 50, 50, '50', '50', 'pres3', '2022-10-18 19:05:11', 'obj3', 'symp3'),
(4, 'A+', 60, 60, 60, '60', '60', 'pres1', '2022-10-18 19:26:02', 'obj1', 'symp1');

-- --------------------------------------------------------

--
-- Table structure for table `arc_patient_diagnosis`
--

CREATE TABLE `arc_patient_diagnosis` (
  `patient_id` int(11) NOT NULL,
  `p_diag_date` date NOT NULL,
  `p_recent_diagnosis` varchar(1000) NOT NULL,
  `p_doctor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arc_patient_diagnosis`
--

INSERT INTO `arc_patient_diagnosis` (`patient_id`, `p_diag_date`, `p_recent_diagnosis`, `p_doctor`) VALUES
(2, '0000-00-00', '', ''),
(3, '0000-00-00', '', ''),
(4, '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `arc_patient_lab_reports`
--

CREATE TABLE `arc_patient_lab_reports` (
  `patient_id` int(11) NOT NULL,
  `p_lab_reports` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arc_patient_lab_reports`
--

INSERT INTO `arc_patient_lab_reports` (`patient_id`, `p_lab_reports`) VALUES
(2, ''),
(3, ''),
(4, '');

-- --------------------------------------------------------

--
-- Table structure for table `arc_patient_record`
--

CREATE TABLE `arc_patient_record` (
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
  `last_checkup` date NOT NULL,
  `last_accessed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arc_patient_record`
--

INSERT INTO `arc_patient_record` (`patient_id`, `first_name`, `middle_name`, `last_name`, `age`, `birth_date`, `sex`, `occupation`, `address`, `cell_no`, `tel_no`, `email`, `ec_name`, `relationship`, `ec_contact_no`, `password`, `role`, `avatar`, `activation_code`, `status`, `date_created`, `last_checkup`, `last_accessed`) VALUES
(2, 'Jae Kristine', 'DV', 'Magaso', 21, '2000-11-27', 'Female', 'Diplomat', 'Mandaluyong, NCR', '+639772524193', '5555555', 'jaekristine.magaso.ab@ust.edu.ph', 'Butch Magaso', 'Father', '09175059036', '2000-11-27', 'patient', 'patient-avatar-2.png', 0, 0, '2022-10-18 17:04:14', '2022-10-18', '2022-10-19 21:47:48'),
(4, 'Simon', 'Caruso', 'Ullado', 22, '2000-05-10', 'Male', 'Pilot', 'San Mateo, Rizal', '+639176810006', '4444444', 'simon_ullado@gmail.com', 'Fabian Ullado', 'Father', '09236437573', '2000-05-10', 'patient', 'patient-avatar-4.png', 0, 0, '2022-10-18 19:15:33', '2022-10-18', '2022-10-19 23:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `arc_patient_treatment_plan`
--

CREATE TABLE `arc_patient_treatment_plan` (
  `patient_id` int(11) NOT NULL,
  `p_diagnosis` varchar(1000) NOT NULL,
  `p_treatment_plan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arc_patient_treatment_plan`
--

INSERT INTO `arc_patient_treatment_plan` (`patient_id`, `p_diagnosis`, `p_treatment_plan`) VALUES
(3, '', ''),
(2, '', ''),
(4, '', '');

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
(1, 'O+', 30, 30, 40, '30', '30', 'pres1', '2022-10-19 21:23:38', 'obj1', 'symp1'),
(5, 'O-', 30, 30, 30, '30', '30', '', '2022-11-06 08:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosis`
--

CREATE TABLE `patient_diagnosis` (
  `patient_id` int(11) NOT NULL,
  `p_diag_date` date NOT NULL,
  `p_recent_diagnosis` varchar(1000) NOT NULL,
  `p_doctor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_diagnosis`
--

INSERT INTO `patient_diagnosis` (`patient_id`, `p_diag_date`, `p_recent_diagnosis`, `p_doctor`) VALUES
(1, '0000-00-00', '', ''),
(5, '0000-00-00', 's1', 'Miguel Pagtakhan'),
(5, '0000-00-00', 's2', 'Jass Hussein');

-- --------------------------------------------------------

--
-- Table structure for table `patient_lab_reports`
--

CREATE TABLE `patient_lab_reports` (
  `patient_id` int(11) NOT NULL,
  `p_lab_reports` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_lab_reports`
--

INSERT INTO `patient_lab_reports` (`patient_id`, `p_lab_reports`) VALUES
(1, ''),
(5, '');

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
  `last_checkup` date NOT NULL,
  `last_accessed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`patient_id`, `first_name`, `middle_name`, `last_name`, `age`, `birth_date`, `sex`, `occupation`, `address`, `cell_no`, `tel_no`, `email`, `ec_name`, `relationship`, `ec_contact_no`, `password`, `role`, `avatar`, `activation_code`, `status`, `date_created`, `last_checkup`, `last_accessed`) VALUES
(1, 'Kendrick Andre', 'Aquino', 'Sagala', 21, '1111-11-11', 'Male', 'Student', 'Manila, Philippines', '+639176810006', '5325162', 'sagala.krch@gmail.com', 'Luciel Sagala', 'Mother', '09175059036', '1111-11-11', 'patient', 'patient-avatar-1.jpg', 0, 0, '2022-10-18 16:59:29', '2022-10-18', '2022-10-19 00:00:00'),
(5, 'Denise', 'Ann', 'Mascarenas', 21, '2000-02-14', 'Female', 'Doctor', 'Manila, Philippines', '+639772524193', '7777777', 'denise.mascarenas@gmail.com', 'Den', 'Others', '09263748245', '2000-02-14', 'patient', 'default-avatar.png', 0, 0, '2022-10-19 23:05:46', '2022-10-19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_treatment_plan`
--

CREATE TABLE `patient_treatment_plan` (
  `patient_id` int(11) NOT NULL,
  `p_diagnosis` varchar(1000) NOT NULL,
  `p_treatment_plan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_treatment_plan`
--

INSERT INTO `patient_treatment_plan` (`patient_id`, `p_diagnosis`, `p_treatment_plan`) VALUES
(1, '', ''),
(5, '', '');

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
  `gender` varchar(30) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `role`, `specialization`, `birth_date`, `gender`, `contact_no`, `email`, `date_created`) VALUES
(1, 'Paul Jeremy', 'Catama', 'Manuel', 'pjmanuel', 'admin123', 'Admin', 'Admin', '2001-01-02', 'Male', '09278484123', 'adminpj@gmail.com', '2022-10-11 04:52:17'),
(2, 'Mary Angel', 'Rom', 'Sandoval', 'riansandoval', 'admin123', 'Admin', 'Admin', '2000-07-25', 'Female', '09122345672', 'adminri@gmail.com', '2022-10-11 04:53:22'),
(3, 'Jass', 'Cruz', 'Hussein', 'jasshussein', 'doctor123', 'Doctor', 'Orthopedics', '1984-12-24', 'Male', '09151881324', 'doctorjass@gmai.com', '2022-10-11 04:54:54'),
(4, 'Miguel', 'Gomez', 'Pagtakhan', 'miguelpagtakhan', 'doctor123', 'Doctor', 'Internal Medicine', '1982-11-08', 'Male', '09458231953', 'doctormiguel@gmail.com', '2022-10-11 04:56:01'),
(5, 'Genalyn', 'Rodriguez', 'Tupan', 'genalyntupan', 'admin123', 'Admin', 'Secretary', '1979-05-23', 'Female', '09922553123', 'admingena@gmail.com', '2022-10-11 04:58:39'),
(6, 'Emelie', 'Robredo', 'Pagtakhan', 'emeliepagtakhan', 'admin123', 'Admin', 'General Manager', '1970-05-21', 'Female', '09181572324', 'adminemelie@gmail.com', '2022-10-11 05:00:22'),
(7, 'Karen', 'Paulino', 'Tamayo', 'karentamayo', 'secretary123', 'Admin', 'Secretary', '1989-03-15', 'Female', '09123456789', 'adminkaren@gmail.com', '2022-10-11 05:03:57'),
(8, 'Marissa', 'Santos', 'Samaniego', 'marissasamaniego', 'nurse123', 'User', 'Nurse', '1992-05-03', 'Female', '09552135372', 'nursemarissa@gmail.com', '2022-10-11 05:04:56'),
(9, 'Carina', 'Galvez', 'Tumimbang', 'carinatumimbang', 'pharma123', 'User', 'Pharmacy Assistant', '0000-00-00', 'Female', '09270958582', 'pharmacarina@gmail.com', '2022-10-11 05:04:56'),
(10, 'Melody', 'Burgos', 'Gayondato', 'melodygayondato', 'cashier123', 'User', 'Cashier', '1995-07-11', 'Female', '09252172717', 'cashiermelody@gmail.com', '2022-10-11 05:04:56'),
(11, 'Justin', 'Miguel', 'Roberts', 'justinroberts', 'patient123', 'User', 'Patient', '1999-01-05', 'Male', '09912312861', 'patientjustin@gmail.com', '2022-10-11 05:09:51'),
(12, 'Michaela', 'Santiago', 'Zamora', 'michaelazamora', 'patient123', 'User', 'Patient', '1997-09-09', 'Female', '09328578275', 'patientmichaela@gmail.com', '2022-10-11 05:09:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arc_patient_details`
--
ALTER TABLE `arc_patient_details`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `arc_patient_diagnosis`
--
ALTER TABLE `arc_patient_diagnosis`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `arc_patient_lab_reports`
--
ALTER TABLE `arc_patient_lab_reports`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `arc_patient_record`
--
ALTER TABLE `arc_patient_record`
  ADD PRIMARY KEY (`patient_id`) USING BTREE;

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_lab_reports`
--
ALTER TABLE `patient_lab_reports`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`patient_id`) USING BTREE;

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
-- AUTO_INCREMENT for table `arc_patient_record`
--
ALTER TABLE `arc_patient_record`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

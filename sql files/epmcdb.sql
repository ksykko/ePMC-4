-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20220707.b221bb2654
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2022 at 05:27 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `arc_patient_diagnosis`
--

CREATE TABLE `arc_patient_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `p_diag_date` date NOT NULL,
  `p_recent_diagnosis` varchar(1000) NOT NULL,
  `p_doctor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `arc_patient_lab_reports`
--

CREATE TABLE `arc_patient_lab_reports` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `p_lab_reports` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'A+', 2, 2, 2, '02', '02', 'pres1', '2022-10-22 13:00:00', 'obj1', 'symp1'),
(2, 'A-', 1, 1, 1, '01', '01', 'pres2', '2022-10-23 08:00:00', 'obj2', 'symp2');

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
(2, 2, '2022-10-21 00:00:00', 'This is patient-2\'s diagnosis 1', 'Jass Hussein'),
(3, 1, '2022-10-21 00:00:00', 'This is patient-1\'s diagnosis 2', 'Miguel Pagtakhan'),
(4, 2, '2022-10-21 00:00:00', 'This is patient-2\'s diagnosis 2', 'Miguel Pagtakhan'),
(5, 1, '2022-10-21 00:00:00', 'This is patient-1\'s diagnosis 3', 'Jass Hussein'),
(6, 1, '2022-10-21 00:00:00', 'This is patient-1\'s diagnosis 4	', 'Miguel Pagtakhan'),
(7, 2, '2022-10-21 22:05:00', 'This is patient-2\'s diagnosis 3', 'Jass Hussein');

-- --------------------------------------------------------

--
-- Table structure for table `patient_lab_reports`
--

CREATE TABLE `patient_lab_reports` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `p_lab_reports` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_lab_reports`
--

INSERT INTO `patient_lab_reports` (`id`, `patient_id`, `p_lab_reports`) VALUES
(1, 1, ''),
(2, 2, '');

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
(1, 'Kendrick Andre', 'Aquino', 'Sagala', 22, '2000-11-06', 'Male', 'Programmer', 'Manila, Philippines', '+639176810006', '5325162', 'sagala.krch@gmail.com', 'Klarisse Sagala', 'Sibling', '09175059036', '2000-11-06', 'patient', 'patient-avatar-1.jpg', 0, 0, '2022-10-21 13:33:46', '2022-10-21', '2022-10-21 22:02:25'),
(2, 'Denise', 'Ann', 'Mascarenas', 22, '2000-02-13', 'Female', 'Doctor', 'Laguna, Philippines', '+639772524193', '9999999', 'denise.mascarenas@gmail.com', 'Denise', 'Others', '09364734263', '2000-02-13', 'patient', 'patient-avatar-2.png', 0, 0, '2022-10-21 13:35:04', '2022-10-21', '0000-00-00 00:00:00');

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
(1, 1, '', ''),
(2, 2, '', '');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD PRIMARY KEY (`patient_id`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `arc_patient_lab_reports`
--
ALTER TABLE `arc_patient_lab_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arc_patient_record`
--
ALTER TABLE `arc_patient_record`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `arc_patient_treatment_plan`
--
ALTER TABLE `arc_patient_treatment_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `patient_diagnosis`
--
ALTER TABLE `patient_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient_lab_reports`
--
ALTER TABLE `patient_lab_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_treatment_plan`
--
ALTER TABLE `patient_treatment_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

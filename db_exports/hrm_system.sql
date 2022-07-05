-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 04:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_name` varchar(20) NOT NULL,
  `building` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(10) NOT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `pay_grade` varchar(10) DEFAULT NULL,
  `emp_status_id` int(10) DEFAULT NULL,
  `sup_id` int(10) DEFAULT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `emp_info`
-- (See below for the actual view)
--
CREATE TABLE `emp_info` (
`emp_id` int(10)
,`job_title` varchar(50)
,`pay_grade` varchar(10)
,`emp_status_id` int(10)
,`sup_id` int(10)
,`dept_name` varchar(20)
,`username` varchar(20)
,`password` varchar(255)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`birth_date` date
,`marital_status` varchar(20)
,`email` varchar(50)
,`{phone_number}` varchar(100)
,`address` varchar(100)
,`emergency_contact` varchar(100)
,`duration` varchar(20)
,`qualification` varchar(100)
,`current_employee` tinyint(1)
,`description` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `emp_id` int(10) NOT NULL,
  `pay_grade` varchar(10) DEFAULT NULL,
  `rem_annual` int(10) DEFAULT NULL,
  `rem_casual` int(10) DEFAULT NULL,
  `rem_maternity` int(10) DEFAULT NULL,
  `rem_no_pay` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp_record`
--

CREATE TABLE `emp_record` (
  `emp_id` int(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `{phone_number}` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `emergency_contact` varchar(100) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `current_employee` tinyint(1) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp_status`
--

CREATE TABLE `emp_status` (
  `emp_status_id` int(10) NOT NULL,
  `emp_status` varchar(20) DEFAULT NULL,
  `full_time` tinyint(1) DEFAULT NULL,
  `part_time` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_title`
--

CREATE TABLE `job_title` (
  `title_name` varchar(50) NOT NULL,
  `req_qualification` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `leave_id` int(10) NOT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `duration` varchar(15) DEFAULT NULL,
  `reason` varchar(20) DEFAULT NULL,
  `sup_id` int(10) DEFAULT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `is_confiirmed` enum('approved','rejected','pending') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pay_grade`
--

CREATE TABLE `pay_grade` (
  `pay_grade` varchar(10) NOT NULL,
  `salary` varchar(10) DEFAULT NULL,
  `req_qualification` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `annual_leaves` int(10) DEFAULT NULL,
  `casual_leaves` int(10) DEFAULT NULL,
  `maternity_leaves` int(10) DEFAULT NULL,
  `no-pay_leaves` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `emp_id` int(10) NOT NULL,
  `sup_level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `emp_info`
--
DROP TABLE IF EXISTS `emp_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `emp_info`  AS SELECT `employee`.`emp_id` AS `emp_id`, `employee`.`job_title` AS `job_title`, `employee`.`pay_grade` AS `pay_grade`, `employee`.`emp_status_id` AS `emp_status_id`, `employee`.`sup_id` AS `sup_id`, `employee`.`dept_name` AS `dept_name`, `employee`.`username` AS `username`, `employee`.`password` AS `password`, `emp_record`.`first_name` AS `first_name`, `emp_record`.`last_name` AS `last_name`, `emp_record`.`birth_date` AS `birth_date`, `emp_record`.`marital_status` AS `marital_status`, `emp_record`.`email` AS `email`, `emp_record`.`{phone_number}` AS `{phone_number}`, `emp_record`.`address` AS `address`, `emp_record`.`emergency_contact` AS `emergency_contact`, `emp_record`.`duration` AS `duration`, `emp_record`.`qualification` AS `qualification`, `emp_record`.`current_employee` AS `current_employee`, `emp_record`.`description` AS `description` FROM (`employee` join `emp_record` on(`employee`.`emp_id` = `emp_record`.`emp_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `emp_status_id` (`emp_status_id`),
  ADD KEY `job_title` (`job_title`),
  ADD KEY `dept_name` (`dept_name`),
  ADD KEY `paygrade_fk` (`pay_grade`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `paygrad_fk` (`pay_grade`);

--
-- Indexes for table `emp_record`
--
ALTER TABLE `emp_record`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_status`
--
ALTER TABLE `emp_status`
  ADD PRIMARY KEY (`emp_status_id`);

--
-- Indexes for table `job_title`
--
ALTER TABLE `job_title`
  ADD PRIMARY KEY (`title_name`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `dept_name` (`dept_name`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `pay_grade`
--
ALTER TABLE `pay_grade`
  ADD PRIMARY KEY (`pay_grade`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`emp_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supervisor` (`emp_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`emp_status_id`) REFERENCES `emp_status` (`emp_status_id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`job_title`) REFERENCES `job_title` (`title_name`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`),
  ADD CONSTRAINT `employee_ibfk_5` FOREIGN KEY (`emp_id`) REFERENCES `emp_record` (`emp_id`),
  ADD CONSTRAINT `paygrade_fk` FOREIGN KEY (`pay_grade`) REFERENCES `pay_grade` (`pay_grade`);

--
-- Constraints for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD CONSTRAINT `emp_leave_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `emp_record` (`emp_id`),
  ADD CONSTRAINT `paygrad_fk` FOREIGN KEY (`pay_grade`) REFERENCES `pay_grade` (`pay_grade`);

--
-- Constraints for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD CONSTRAINT `leave_request_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supervisor` (`emp_id`),
  ADD CONSTRAINT `leave_request_ibfk_2` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`),
  ADD CONSTRAINT `leave_request_ibfk_3` FOREIGN KEY (`emp_id`) REFERENCES `emp_record` (`emp_id`);

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `emp_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `emp_record` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

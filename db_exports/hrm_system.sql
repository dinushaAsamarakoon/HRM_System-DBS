-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 03:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getTables` ()  begin 
	SELECT table_name 
FROM information_schema.tables 
WHERE table_schema = 'hrm_system' and 
table_name != 'employee' and
table_name != 'emp_record' AND
table_name != 'leave_request' AND
table_name != 'emp_leave' AND
table_name != 'department' AND
table_name != 'emp_info' AND
table_name != 'supervisor';
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_name` varchar(20) NOT NULL,
  `building` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_name`, `building`, `description`) VALUES
('Mechanical', 'Sumanadasa', 'desc dept');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) NOT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `pay_grade` varchar(10) DEFAULT NULL,
  `emp_status_id` int(10) DEFAULT NULL,
  `sup_id` int(10) DEFAULT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `job_title`, `pay_grade`, `emp_status_id`, `sup_id`, `dept_name`, `username`, `password`) VALUES
(1, 'hr_manager', 'level-2', '1', 2, 'Mechanical', 'kapila', '$2y$10$9fAWJyStAEl2QJi58QO0kO7SnIdQWsK.APel6ruhg5blGQ.HtLWsC'),
(3, 'admin', 'level-2', '1', 2, 'Mechanical', 'vishaka', '$2y$10$9fAWJyStAEl2QJi58QO0kO7SnIdQWsK.APel6ruhg5blGQ.HtLWsC');

-- --------------------------------------------------------

--
-- Stand-in structure for view `emp_info`
-- (See below for the actual view)
--
CREATE TABLE `emp_info` (
`id` int(10)
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
,`gender` enum('male','female','other')
,`marital_status` varchar(20)
,`email` varchar(50)
,`phone_number` varchar(100)
,`address` varchar(100)
,`emergency_contact` varchar(100)
,`duration` varchar(20)
,`qualification` varchar(100)
,`current_employee` tinyint(1)
,`description` varchar(255)
,`NIC` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `id` int(10) NOT NULL,
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
  `id` int(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `emergency_contact` varchar(100) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `current_employee` tinyint(1) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `NIC` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_record`
--

INSERT INTO `emp_record` (`id`, `first_name`, `last_name`, `birth_date`, `gender`, `marital_status`, `email`, `phone_number`, `address`, `emergency_contact`, `duration`, `qualification`, `current_employee`, `description`, `NIC`) VALUES
(1, 'Kapila', 'Perera', '1990-12-20', 'male', 'single', 'kapila@gmail.com', '769409309', '65, Katubedda, Moratuwa', '332281106', '10', 'sample qualification ', 1, 'sample description', '7702465121V'),
(2, 'Indika ', 'Perera', '1989-12-25', 'male', 'married', 'indika@gmail.com', '789305682', '56, Gampaha, Colonbo', '334579323', '20', 'qualification ', 1, 'desc', '6704556735V'),
(3, 'Vishaka', 'Nanayakkara', '1970-12-12', 'female', 'married', 'vishaka@gmail.com', '0332233405', '67, Rathmalana, Moratuwa', '0331001003', '12', 'q2', 1, 'desc2', '7045674324V'),
(4, 'Kasun', 'Weerasinghe', '1993-01-28', 'male', 'single', 'kasunw@gmail.com', '0766543343', 'No. 123, 1st lane, Katubedda, Moratuwa.', 'Deepani Weerasinghe\r\n0765657897', '5', 'G.C.E. O/L, A/L\r\nCIMA level 3', 1, 'excellence work on \"eda\" industry project', '19934567876');

-- --------------------------------------------------------

--
-- Table structure for table `emp_status`
--

CREATE TABLE `emp_status` (
  `id` int(11) NOT NULL,
  `emp_status` varchar(20) NOT NULL,
  `full_time` tinyint(1) DEFAULT NULL,
  `part_time` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_status`
--

INSERT INTO `emp_status` (`id`, `emp_status`, `full_time`, `part_time`) VALUES
(1, 'permanant', 1, 0),
(2, 'permanent', 0, 1),
(3, 'freelance', 1, 0),
(4, 'freelance', 0, 1),
(5, 'contract', 1, 0),
(6, 'contract', 0, 1),
(7, 'intern', 1, 0),
(8, 'intern', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_title`
--

CREATE TABLE `job_title` (
  `title_name` varchar(50) NOT NULL,
  `req_qualification` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_title`
--

INSERT INTO `job_title` (`title_name`, `req_qualification`, `description`) VALUES
('accountant', 'CIMA level 3', 'no managerial experience is needed'),
('admin', 'sample qual', 'desc1'),
('hr_manager', 'PHD in HR management', 'desc jobtitle'),
('supervisor', 'sup phd', 'sample desc1');

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `id` int(10) NOT NULL,
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

--
-- Dumping data for table `pay_grade`
--

INSERT INTO `pay_grade` (`pay_grade`, `salary`, `req_qualification`, `description`, `annual_leaves`, `casual_leaves`, `maternity_leaves`, `no-pay_leaves`) VALUES
('level-2', '50000', 'managerial', 'desc paygrade', 50, 10, 100, 50),
('level-3', '60000', 'CIMA 2 years\r\nGCE O/L, A/L\r\nexperience on the industry level', 'should be approved by management', 14, 10, 5, 50);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(10) NOT NULL,
  `sup_level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `sup_level`) VALUES
(2, '3');

-- --------------------------------------------------------

--
-- Structure for view `emp_info`
--
DROP TABLE IF EXISTS `emp_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `emp_info`  AS SELECT `employee`.`id` AS `id`, `employee`.`job_title` AS `job_title`, `employee`.`pay_grade` AS `pay_grade`, `employee`.`emp_status_id` AS `emp_status_id`, `employee`.`sup_id` AS `sup_id`, `employee`.`dept_name` AS `dept_name`, `employee`.`username` AS `username`, `employee`.`password` AS `password`, `emp_record`.`first_name` AS `first_name`, `emp_record`.`last_name` AS `last_name`, `emp_record`.`birth_date` AS `birth_date`, `emp_record`.`gender` AS `gender`, `emp_record`.`marital_status` AS `marital_status`, `emp_record`.`email` AS `email`, `emp_record`.`phone_number` AS `phone_number`, `emp_record`.`address` AS `address`, `emp_record`.`emergency_contact` AS `emergency_contact`, `emp_record`.`duration` AS `duration`, `emp_record`.`qualification` AS `qualification`, `emp_record`.`current_employee` AS `current_employee`, `emp_record`.`description` AS `description`, `emp_record`.`NIC` AS `NIC` FROM (`employee` join `emp_record` on(`employee`.`id` = `emp_record`.`id`)) ;

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `emp_status_id` (`emp_status_id`),
  ADD KEY `employee_ibfk_2` (`job_title`),
  ADD KEY `employee_ibfk_3` (`dept_name`),
  ADD KEY `employee_ibfk_5` (`pay_grade`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paygrad_fk` (`pay_grade`);

--
-- Indexes for table `emp_record`
--
ALTER TABLE `emp_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_status`
--
ALTER TABLE `emp_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_title`
--
ALTER TABLE `job_title`
  ADD PRIMARY KEY (`title_name`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_record`
--
ALTER TABLE `emp_record`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_status`
--
ALTER TABLE `emp_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supervisor` (`id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`job_title`) REFERENCES `job_title` (`title_name`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`id`) REFERENCES `emp_record` (`id`),
  ADD CONSTRAINT `employee_ibfk_5` FOREIGN KEY (`pay_grade`) REFERENCES `pay_grade` (`pay_grade`);

--
-- Constraints for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD CONSTRAINT `emp_leave_ibfk_1` FOREIGN KEY (`id`) REFERENCES `emp_record` (`id`),
  ADD CONSTRAINT `paygrad_fk` FOREIGN KEY (`pay_grade`) REFERENCES `pay_grade` (`pay_grade`);

--
-- Constraints for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD CONSTRAINT `leave_request_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supervisor` (`id`),
  ADD CONSTRAINT `leave_request_ibfk_2` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`),
  ADD CONSTRAINT `leave_request_ibfk_3` FOREIGN KEY (`emp_id`) REFERENCES `emp_record` (`id`);

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `emp_id_fk` FOREIGN KEY (`id`) REFERENCES `emp_record` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

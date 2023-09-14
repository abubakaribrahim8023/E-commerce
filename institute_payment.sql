-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2023 at 04:39 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institute_payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_new_course`
--

CREATE TABLE `add_new_course` (
  `course_id` int(254) NOT NULL,
  `creator_id` varchar(122) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `course_number` varchar(30) NOT NULL,
  `logo_course` varchar(254) DEFAULT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_new_course`
--

INSERT INTO `add_new_course` (`course_id`, `creator_id`, `course_name`, `duration`, `amount`, `course_number`, `logo_course`, `date`) VALUES
(1, 'null', 'Java', 'six month', '5000', 'BR/23/009', 'Java.png', '07 Sep, 23'),
(5, 'null', 'Chemistry', 'six month', '120000', 'BR/23/0032', 'c++.png', '07 Sep, 23'),
(9, 'null', 'Python', 'six month', '120000', 'BR/23/009', 'Screenshot from 2023-09-06 12-38-33.png', '08 Sep, 23'),
(10, 'null', 'Chemistry', 'Seven month', '11000', 'BR/23/012', 'Screenshot from 2023-09-06 12-38-24.png', '08 Sep, 23');

-- --------------------------------------------------------

--
-- Table structure for table `pay_application`
--

CREATE TABLE `pay_application` (
  `pay_id` int(254) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(123) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `app_role` varchar(200) NOT NULL,
  `pay_status` varchar(20) NOT NULL,
  `password` varchar(254) NOT NULL,
  `state` varchar(254) NOT NULL,
  `ltd` varchar(250) DEFAULT NULL,
  `course_of_study` varchar(250) DEFAULT NULL,
  `home_address` varchar(200) DEFAULT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_application`
--

INSERT INTO `pay_application` (`pay_id`, `first_name`, `last_name`, `email`, `phone_number`, `gender`, `app_role`, `pay_status`, `password`, `state`, `ltd`, `course_of_study`, `home_address`, `date`) VALUES
(1, 'Muhammad', 'Ibrahim Umar', 'abubakaribrahim30012@gmail.com', '090332455554', 'Female', 'Not IT', '1', '1', 'Gombe', 'Gombe', 'Computer Science', 'Yalaguruza', '04 Sep, 2023. 03:42 pm'),
(2, 'Muhammad', 'saddsa', 'abubakar@gmail.com', '879434545465654', 'Female', 'IT', '1', '2', '', NULL, NULL, NULL, '04 Sep, 2023. 03:43 pm'),
(3, 'Abubakar', 'Ibrahim Umar', 'abubakar@gmail.com', '090332455554', 'Male', 'IT', '0', '3', '', NULL, NULL, NULL, '04 Sep, 2023. 03:48 pm'),
(4, 'Muhammad', 'Ibrahim Umar', 'abubakaribrahim30012@gmail.com', '879434545465654', 'Male', 'Non it', '1', '4', '', NULL, NULL, NULL, '04 Sep, 2023. 04:17 pm'),
(5, 'Famita', 'Umar', 'abubakaribrahim30012@gmail.com', '090332455554', 'Female', 'Non it', '0', '', '', NULL, NULL, NULL, '05 Sep, 2023. 01:26 pm');

-- --------------------------------------------------------

--
-- Table structure for table `registers_course`
--

CREATE TABLE `registers_course` (
  `increment` int(254) NOT NULL,
  `userId` varchar(250) NOT NULL,
  `courseId` varchar(250) NOT NULL,
  `pay_status` varchar(20) NOT NULL DEFAULT '0',
  `admission_status` varchar(20) NOT NULL DEFAULT '0',
  `date` varchar(200) NOT NULL,
  `add_date` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registers_course`
--

INSERT INTO `registers_course` (`increment`, `userId`, `courseId`, `pay_status`, `admission_status`, `date`, `add_date`) VALUES
(1, '1', '1', '0', '0', '13 Sep, 23', NULL),
(2, '1', '9', '0', '0', '13 Sep, 23', NULL),
(3, '1', '10', '0', '1', '13 Sep, 23', '13 Sep, 23 01:48 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_new_course`
--
ALTER TABLE `add_new_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `pay_application`
--
ALTER TABLE `pay_application`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `registers_course`
--
ALTER TABLE `registers_course`
  ADD PRIMARY KEY (`increment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_new_course`
--
ALTER TABLE `add_new_course`
  MODIFY `course_id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pay_application`
--
ALTER TABLE `pay_application`
  MODIFY `pay_id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `registers_course`
--
ALTER TABLE `registers_course`
  MODIFY `increment` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

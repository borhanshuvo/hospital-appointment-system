-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2020 at 03:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_department`
--

CREATE TABLE `add_department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_department`
--

INSERT INTO `add_department` (`id`, `name`, `description`) VALUES
(1, 'General Surgery', 'Lorem ipsum'),
(2, 'Microbiology', 'Lorem ipsum'),
(3, 'Nephrology', 'Lorem ipsum '),
(4, 'Obstetrics', 'Lorem ipsum ');

-- --------------------------------------------------------

--
-- Table structure for table `add_doctor`
--

CREATE TABLE `add_doctor` (
  `id` int(10) NOT NULL,
  `f_name` varchar(40) NOT NULL,
  `l_name` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `blood_type` varchar(40) NOT NULL,
  `mobile_no` varchar(40) NOT NULL,
  `birth_date` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `department` varchar(40) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `specialist` varchar(200) NOT NULL,
  `present_address` varchar(200) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `city` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_doctor`
--

INSERT INTO `add_doctor` (`id`, `f_name`, `l_name`, `gender`, `blood_type`, `mobile_no`, `birth_date`, `email`, `department`, `designation`, `qualification`, `specialist`, `present_address`, `permanent_address`, `city`) VALUES
(8, 'Asif', 'Haiat', 'Male', 'O-', '01411223344', '1997-12-31', 'asif@example.com', '1', 'MBBS Doctor', 'PHD Doctor', 'Surgery', 'Bosundhora RA', 'Bosundhora RA', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `add_hospital`
--

CREATE TABLE `add_hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_hospital`
--

INSERT INTO `add_hospital` (`id`, `name`, `description`, `email`, `phone_no`, `address`) VALUES
(3, 'Demo Hospital ', 'Lorem ipsum.', 'demo_hospital@example.com', '01711223344', 'Basundhora RA'),
(4, 'Demo Hospital 2', 'Obstetrics', 'demo_hospital_2@example.com', '01712123434', 'Kuratoli');

-- --------------------------------------------------------

--
-- Table structure for table `add_patient`
--

CREATE TABLE `add_patient` (
  `id` int(11) NOT NULL,
  `f_name` varchar(40) NOT NULL,
  `l_name` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `blood_type` varchar(40) NOT NULL,
  `mobile_no` varchar(40) NOT NULL,
  `birth_date` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `present_address` varchar(200) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `city` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_patient`
--

INSERT INTO `add_patient` (`id`, `f_name`, `l_name`, `gender`, `blood_type`, `mobile_no`, `birth_date`, `email`, `present_address`, `permanent_address`, `city`) VALUES
(22, 'Asraful', 'Islam', 'Male', 'B', '01711223344', '1996-01-01', 'asraful@example.com', 'Mohakhali', 'Khilkhet', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Borhan Uddin', 'super_admin@example.com', '12345', 'super_admin'),
(2, 'Borhan Shuvo', 'admin@example.com', '12345', 'admin'),
(21, 'Asraful Islam', 'asraful@example.com', '12345', 'patient'),
(22, 'Asif Haiat', 'asif@example.com', '12345', 'doctor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_department`
--
ALTER TABLE `add_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_doctor`
--
ALTER TABLE `add_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_hospital`
--
ALTER TABLE `add_hospital`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `add_patient`
--
ALTER TABLE `add_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_department`
--
ALTER TABLE `add_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `add_doctor`
--
ALTER TABLE `add_doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `add_hospital`
--
ALTER TABLE `add_hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `add_patient`
--
ALTER TABLE `add_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

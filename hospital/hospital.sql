-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 08:09 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `add_bed`
--

CREATE TABLE `add_bed` (
  `id` int(10) NOT NULL,
  `b_type` varchar(40) NOT NULL,
  `b_des` varchar(200) NOT NULL,
  `charge` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `add_department`
--

CREATE TABLE `add_department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) DEFAULT 2 COMMENT '1 for active; 2 for in-active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_department`
--

INSERT INTO `add_department` (`id`, `name`, `description`, `status`) VALUES
(57, 'gfhd', 'dghg', 2),
(58, 'fhdgd', 'jjghj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_hospital`
--

CREATE TABLE `add_hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2 COMMENT '1 for active; 2 for in-active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_hospital`
--

INSERT INTO `add_hospital` (`id`, `name`, `description`, `email`, `phone_no`, `address`, `status`) VALUES
(37, 'Demo Hospital One', 'Demo Hospital 1', 'demo_hospital_1@hospital.com', '01711223344', 'Demo Hospital 1, Dhaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `gender`, `blood_group`, `mobile_no`, `birth_date`, `email`, `password`, `address`, `picture`, `status`, `user_type`) VALUES
(1, 'Borhan', 'Uddin', 'male', 'o+', '01712345678', '11-11-2012', 'borhan@owner.com', 'ed7a90d451dfbd11bcaf4274d59404f0e3f0e2b9', 'Chandpur, Chittagong, Bangladesh', NULL, 1, 'super_admin'),
(3, 'Manik', 'Mia', 'Male', 'A+', '01712548752', '1995-11-14', 'manik@doctor.com', 'ed7a90d451dfbd11bcaf4274d59404f0e3f0e2b9', 'Dhaka', '../storage/doctor_image/manik.jpg', 1, 'doctor'),
(4, 'Asif', 'Haiat', 'Male', 'AB+', '012365478985', '1995-12-11', 'asif@patient.com', 'ed7a90d451dfbd11bcaf4274d59404f0e3f0e2b9', 'Dhaka', '../storage/admin_image/20190213_204355.jpg', 1, 'patient'),
(9, 'Abdullah AL', 'Monim', 'Male', 'A+', '01732654985', '1996-01-15', 'abdullah@admin.com', 'ed7a90d451dfbd11bcaf4274d59404f0e3f0e2b9', 'Dhaka', '../storage/admin_image/abdullah.jpg', 1, 'admin'),
(10, 'Sayma', 'Nasrin', 'Female', 'B-', '01736598524', '1995-10-22', 'sayma@admin.com', 'ed7a90d451dfbd11bcaf4274d59404f0e3f0e2b9', 'Dhaka', '../storage/admin_image/sayma.jpg', 1, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_bed`
--
ALTER TABLE `add_bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_department`
--
ALTER TABLE `add_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_hospital`
--
ALTER TABLE `add_hospital`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_bed`
--
ALTER TABLE `add_bed`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_department`
--
ALTER TABLE `add_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `add_hospital`
--
ALTER TABLE `add_hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

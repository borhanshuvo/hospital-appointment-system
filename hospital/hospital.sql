-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 04:45 PM
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
-- Table structure for table `add_admin`
--

CREATE TABLE `add_admin` (
  `id` int(10) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `present_address` varchar(200) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_admin`
--

INSERT INTO `add_admin` (`id`, `f_name`, `l_name`, `gender`, `blood_type`, `mobile_no`, `birth_date`, `email`, `present_address`, `permanent_address`, `city`, `picture`) VALUES
(7, 'Borhan', 'Uddin', 'Male', 'A+', '01781972210', '2020-05-04', 'borhan015@gmail.com', 'Kuratoli', 'Basundhora', 'Dhaka', '../storage/admin_image/Shuvo.jpg'),
(10, 'Santo', 'Roy', 'Male', 'A+', '01784859654', '1996-12-23', 'santo1234@gmail.com', 'Kuratoli', 'Kuratoli', 'Dhaka', '../storage/admin_image/login.png'),
(45, 'Abdulla AL', 'Monim', 'Male', 'A+', '01781972210', '2020-05-13', 'monim123@gmail.com', 'Kuratoli', 'Banani', 'Dhaka', '../storage/admin_image/20190611_185336.jpg');

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
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_department`
--

INSERT INTO `add_department` (`id`, `name`, `description`) VALUES
(1, 'Microbiology', 'Lorem ipsum Nothing'),
(2, 'General Surgery', 'Lorem ipsum');

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
  `city` varchar(40) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_doctor`
--

INSERT INTO `add_doctor` (`id`, `f_name`, `l_name`, `gender`, `blood_type`, `mobile_no`, `birth_date`, `email`, `department`, `designation`, `qualification`, `specialist`, `present_address`, `permanent_address`, `city`, `picture`) VALUES
(15, 'Asif', 'Haiat', 'Male', 'B-', '01789562314', '1997-06-17', 'asif123@gmail.com', 'Microbiology', 'Nothing', 'Nothing', 'Nothing', 'Banani', 'Khilkhet', 'Dhaka', '../storage/doctor_image/20190611_185336.jpg'),
(17, 'Ashfaque', 'Uddin', 'Male', 'B', '01425647891', '1996-05-20', 'ash123@gmail.com', 'Microbiology', 'Nothing', 'Nothing', 'Nothing', 'Kuratoli', 'Uttara', 'Dhaka', '../storage/doctor_image/20190611_185336.jpg');

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
(3, 'Demo Hospital ', 'Nothing', 'demo_hospital@example.com', '01711223344', 'Basundhora RA'),
(4, 'Demo Hospital 2', 'Nothing', 'demo_hospital_2@example.com', '01712123434', 'Kuratoli'),
(14, 'Demo Hospital 3', 'Nothing', 'demo_hospital_3@example.com', '01311223344', 'Dhanmondi'),
(15, 'Demo Hospital 4', 'Nothing', 'demo_hospital_4@example.com', '01522335544', 'Banani'),
(17, 'Demo Hospital 5', 'Nothing', 'demo_hospital_5@example.com', '01789564725', 'Banani');

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
  `city` varchar(40) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_patient`
--

INSERT INTO `add_patient` (`id`, `f_name`, `l_name`, `gender`, `blood_type`, `mobile_no`, `birth_date`, `email`, `present_address`, `permanent_address`, `city`, `picture`) VALUES
(22, 'Asraful', 'Islam', 'Male', 'A+', '01711223344', '1996-01-01', 'asraful@example.com', 'Mohakhali', 'Khilkhet', 'Dhaka', '../storage/patient_image/20190611_185336.jpg'),
(28, 'Akibul', 'Hasan', 'Male', 'A+', '01234567891', '2020-05-12', 'akibul123@gmail.com', 'Kuratoli', 'Banani', 'Dhaka', '../storage/patient_image/20190611_185336.jpg'),
(30, 'Talat', 'Iram', 'Male', 'AB+', '01356982147', '1997-05-12', 'talat123@gmail.com', 'Mirpur', 'Mirpur', 'Dhaka', '../storage/patient_image/20190611_185336.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `df_name` varchar(50) NOT NULL,
  `dl_name` varchar(50) NOT NULL,
  `pf_name` varchar(50) NOT NULL,
  `pl_name` varchar(50) NOT NULL,
  `d_id` int(20) NOT NULL,
  `p_id` int(20) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Serial` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `u_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`u_id`, `name`, `email`, `password`, `user_type`) VALUES
(2, 'Borhan Uddin', 'borhan015@gmail.com', '12345678', 'admin'),
(3, 'Asraful Islam', 'asraful@example.com', '12345678', 'patient'),
(4, 'Borhan Shuvo', 'borhan814@gmail.com', '12345678', 'super_admin'),
(29, 'Asif Haiat', 'asif123@gmail.com', '12345678', 'doctor'),
(30, 'Ashfaque Uddin', 'ash123@gmail.com', '12345678', 'doctor'),
(31, 'Santo Roy', 'santo123@gmail.com', '12345678', 'admin'),
(66, 'Abdulla Monim', 'monim123@gmail.com', '12345678', 'admin'),
(67, 'Akibul Hasan', 'akibul123@gmail.com', '12345678', 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(10) NOT NULL,
  `f_name` varchar(40) NOT NULL,
  `l_name` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `present_address` varchar(200) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `f_name`, `l_name`, `gender`, `blood_type`, `mobile_no`, `birth_date`, `email`, `present_address`, `permanent_address`, `city`, `picture`) VALUES
(1, 'Borhan', 'Shuvo', 'Male', 'O+', '01303242629', '1996-12-19', 'borhan814@gmail.com', 'Khilkhet', 'Banani', 'Dhaka', '../storage/super_admin_image/Shuvo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testappoinment`
--

CREATE TABLE `testappoinment` (
  `id` int(20) NOT NULL,
  `p_id` int(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `t_id` int(20) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_admin`
--
ALTER TABLE `add_admin`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testappoinment`
--
ALTER TABLE `testappoinment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_admin`
--
ALTER TABLE `add_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `add_bed`
--
ALTER TABLE `add_bed`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_department`
--
ALTER TABLE `add_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `add_doctor`
--
ALTER TABLE `add_doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `add_hospital`
--
ALTER TABLE `add_hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `add_patient`
--
ALTER TABLE `add_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testappoinment`
--
ALTER TABLE `testappoinment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

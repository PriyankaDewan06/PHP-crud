-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 08:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `name`, `email`, `department`, `gender`, `phone`) VALUES
(1, 'pritam', 'pt@gmail.com', 'CSE', 'Male', '021358698'),
(3, 'anik', 'ak@gm.com', 'ENGLISH', 'Female', '02356987'),
(5, 'Sarha', 's@hotmail.com', 'MATH', 'Female', '0253698356'),
(6, 'Karim', 'k@htmail.com', 'EEE', 'Male', '0214789653'),
(7, 'tora', 't@htm.com', 'AERONAUTICAL', 'Female', '0235698712'),
(8, 'Hossain', 'h@gmail.com', 'English', 'Male', '028564789'),
(9, 'Akash', 'ah@tr.com', 'Civil', 'Male', '012458674596'),
(10, 'rojoni', 'ri@gmail.com', 'English', 'Female', '02235674899'),
(11, 'Deep', 'dt@gmail.com', 'AERONAUTICAL', 'Male', '012564834562'),
(12, 'simran', 'sim@gm.com', 'English', 'Female', '0235689745'),
(13, 'raktim', 'rk@gh.com', 'CSE', 'Male', '0256889756');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

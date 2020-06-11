-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 11:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--
DROP DATABASE IF EXISTS 'srms';
CREATE DATABASE IF NOT EXISTS `srms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `srms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-02-15 11:18:49'),
(2, 'subarna', 'e26721956c33af1e24821e4dcf3990b5', '2020-03-25 12:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Studentid` int(11) NOT NULL,
  `RollId` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Studentid`, `RollId`, `password`) VALUES
(1, '10000', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, '10001', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, '20000', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, '10100', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, '10002', '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, '10004', '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, '10004', '5f4dcc3b5aa765d61d8327deb882cf99'),
(8, '10005', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` int(4) DEFAULT NULL,
  `Section` varchar(5) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `ClassNameNumeric`, `Section`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Computer Science and Engineering (CSE)', 1, 'SEM-1', '2020-04-09 18:15:14', NULL),
(2, 'Computer Science and Engineering (CSE)', 1, 'SEM-2', '2020-04-09 18:15:30', NULL),
(3, 'Information Technology (IT)', 1, 'SEM-1', '2020-04-09 18:15:45', NULL),
(4, 'Electronics and Communication Engg. (ECE)', 1, 'SEM-1', '2020-04-09 18:16:09', NULL),
(5, 'Information Technology (IT)', 1, 'SEM-2', '2020-04-10 03:36:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `PostingDate`, `UpdationDate`) VALUES
(1, 1, 1, 1, 98, '2020-04-09 18:37:06', NULL),
(2, 1, 1, 2, 97, '2020-04-09 18:37:06', NULL),
(3, 1, 1, 3, 96, '2020-04-09 18:37:06', NULL),
(4, 1, 1, 4, 90, '2020-04-09 18:37:06', NULL),
(5, 2, 1, 1, 98, '2020-04-09 18:37:54', NULL),
(6, 2, 1, 2, 98, '2020-04-09 18:37:54', NULL),
(7, 2, 1, 3, 99, '2020-04-09 18:37:54', NULL),
(8, 2, 1, 4, 86, '2020-04-09 18:37:54', NULL),
(9, 7, 1, 3, 92, '2020-04-14 14:22:06', NULL),
(10, 7, 1, 2, 92, '2020-04-14 14:22:06', NULL),
(11, 7, 1, 4, 92, '2020-04-14 14:22:06', NULL),
(12, 7, 1, 1, 91, '2020-04-14 14:22:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(100) DEFAULT NULL,
  `RollId` varchar(100) DEFAULT NULL,
  `StudentEmail` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `DOB` varchar(100) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `RollId`, `StudentEmail`, `Gender`, `address`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(1, 'Subarna Das', '10000', 'subarnadas1998@gmail.com', 'Male', 'Dumurjala, Howrah, West Bengal', '1998-01-09', 1, '2020-04-09 18:29:23', NULL, 1),
(2, 'Soham Sengupta', '10001', 'soham.sengupta.fiem.cse16@teamfuture.in', 'Male', NULL, '1998-03-04', 1, '2020-04-09 18:32:06', NULL, 1),
(3, 'Rijul Ganguly', '20000', 'rijul.ganguly.fiem.cse16@teamfuture.in', 'Male', NULL, '1998-01-01', 2, '2020-04-09 18:32:58', NULL, 1),
(4, 'Sandipan Bera', '10100', 'sandipan.bera.fiem.cse16@teamfuture.in', 'Male', NULL, '1998-01-01', 3, '2020-04-14 13:21:02', NULL, 1),
(5, 'Sreejonee Biswas', '10002', 'sreejonee.biswas.fiem.cse16@teamfuture.in', 'Female', NULL, '1998-01-01', 1, '2020-04-14 13:52:25', NULL, 1),
(6, 'Srijani Sen', '10003', 'srijanisens@gmail.com', 'Female', NULL, '1998-07-13', 1, '2020-04-14 13:53:35', NULL, 1),
(7, 'Kushal Sen', '10004', 'kushal.sen.fiem.cse16@teamfuture.in', 'Male', NULL, '1998-01-01', 1, '2020-04-14 14:20:01', NULL, 1),
(8, 'Simran Dubey', '10005', 'simran@hotmail.com', 'Male', NULL, '', 1, '2020-05-02 05:30:57', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(1, 1, 1, 1, '2020-04-09 18:21:47', '2020-04-14 14:20:41'),
(2, 1, 2, 1, '2020-04-09 18:23:11', NULL),
(3, 1, 3, 1, '2020-04-09 18:23:17', NULL),
(4, 1, 4, 1, '2020-04-09 18:23:23', NULL),
(5, 4, 1, 1, '2020-04-09 18:23:30', NULL),
(6, 4, 2, 1, '2020-04-09 18:23:37', NULL),
(7, 4, 3, 1, '2020-04-09 18:23:42', NULL),
(8, 4, 4, 1, '2020-04-09 18:23:48', NULL),
(9, 3, 1, 1, '2020-04-09 18:23:54', NULL),
(10, 3, 2, 1, '2020-04-09 18:24:03', NULL),
(11, 3, 3, 1, '2020-04-09 18:24:10', NULL),
(12, 3, 4, 1, '2020-04-09 18:24:16', NULL),
(13, 2, 5, 1, '2020-04-14 13:16:34', NULL),
(14, 2, 6, 1, '2020-04-14 13:16:48', NULL),
(15, 2, 7, 1, '2020-04-14 13:16:56', NULL),
(16, 5, 4, 1, '2020-04-14 13:17:10', NULL),
(17, 5, 6, 1, '2020-04-14 13:18:56', NULL),
(18, 5, 7, 1, '2020-04-14 13:19:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Physics-1', 'BS-PH101', '2020-04-09 18:19:33', NULL),
(2, 'Chemistry-I', 'BS-CH101', '2020-04-09 18:20:36', NULL),
(3, 'Basic Electrical Engg', 'ES-EE101', '2020-04-09 18:20:57', NULL),
(4, 'Mathematics-I', 'BS-M101', '2020-04-09 18:21:16', NULL),
(5, 'Mathematics-II', 'BS-M201', '2020-04-14 13:14:54', NULL),
(6, 'Problem Solving', 'ES-CS201', '2020-04-14 13:15:43', NULL),
(7, 'English', 'HM-HU201', '2020-04-14 13:15:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Studentid`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

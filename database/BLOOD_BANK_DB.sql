-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 08:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*SET ADMIN USERNAME AND PASSWORD IN BACKEND USING INSERT STATEMNT (AT FIRST ONLY)*/
--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADHAR` bigint(12) NOT NULL,
  `NAME` varchar(224) NOT NULL,
  `BLOOD_GROUP` varchar(5) NOT NULL,
  `REASON` text NOT NULL,
  `REPORT` varchar(300) NOT NULL,
  `PHONE` bigint(50) NOT NULL,
  `MOBILE` varchar(13) NOT NULL,
  `EMAIL` varchar(224) NOT NULL,
  `CITY` varchar(224) NOT NULL,
  `HLOC` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `date` date NOT NULL,
  `file` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `NAME` varchar(10) NOT NULL,
  `PASSWORD` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `AADHAR_NO` bigint(12) NOT NULL,
  `FULL_NAME` varchar(233) NOT NULL,
  `BLOOD_GROUP` varchar(5) NOT NULL,
  `REASON` varchar(233) NOT NULL,
  `REPORT` varchar(300) NOT NULL,
  `PHONE` bigint(20) NOT NULL,
  `MOBILE` bigint(13) NOT NULL,
  `EMAIL` varchar(233) NOT NULL,
  `CITY` varchar(244) NOT NULL,
  `HLOC` varchar(233) NOT NULL,
  `status` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `REGISTER_NO` varchar(10) NOT NULL,
  `FULL_NAME` varchar(50) NOT NULL,
  `BLOOD_GROUP` varchar(3) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `CITY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `ADHAR` (`ADHAR`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`file`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`AADHAR_NO`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`REGISTER_NO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

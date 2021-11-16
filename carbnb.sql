-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 06:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carbnb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` varchar(4) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  `NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BOOKING_ID` varchar(4) NOT NULL,
  `DATE_OF_BOOKING` datetime NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `DURATION` int(11) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  `R_EMAIL` varchar(30) DEFAULT NULL,
  `C_VEHICLENO` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `VEHICLE_NO` varchar(15) NOT NULL,
  `COMPANY` varchar(15) NOT NULL,
  `MODEL` varchar(30) NOT NULL,
  `AGE` int(11) NOT NULL,
  `NO_OF_SEATS` int(11) NOT NULL,
  `O_EMAIL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `car_review`
--

CREATE TABLE `car_review` (
  `REVIEW_ID` varchar(4) NOT NULL,
  `DESCRIPTION` varchar(800) NOT NULL,
  `VEHICLENO` varchar(13) DEFAULT NULL,
  `R_EMAIL` varchar(30) DEFAULT NULL,
  `SCORE` int(11) NOT NULL CHECK (`SCORE` <= 10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FEEDBACK_ID` varchar(4) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PHONENUMBER` int(11) NOT NULL,
  `LOCATION` varchar(30) NOT NULL,
  `REVIEW_TYPE` varchar(1) NOT NULL CHECK (`REVIEW_TYPE` in ('Q','C','S')),
  `DESCRIPTION` varchar(800) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `A_ID` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `EMAIL` varchar(30) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `PHONE_NO` int(11) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PAYMENT_ID` varchar(4) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `PAYMENT_DATE` datetime NOT NULL,
  `R_EMAIL` varchar(30) DEFAULT NULL,
  `A_ID` varchar(4) DEFAULT NULL,
  `BOOKING_ID` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE `renter` (
  `EMAIL` varchar(30) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `PHONE_NO` int(10) NOT NULL,
  `DRIVING_LICENSE_NO` varchar(15) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`EMAIL`, `NAME`, `PHONE_NO`, `DRIVING_LICENSE_NO`, `PASSWORD`) VALUES
('demoaccount@vitstudent.ac.in', 'demoaccount', 2147483647, 'TNBLAH234', 'fe01ce2a7fbac8f'),
('susindhar02@gmail.com', 'Susindhar', 2147483647, 'TNBLAH123', '5f4dcc3b5aa765d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BOOKING_ID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`VEHICLE_NO`);

--
-- Indexes for table `car_review`
--
ALTER TABLE `car_review`
  ADD PRIMARY KEY (`REVIEW_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FEEDBACK_ID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`EMAIL`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PAYMENT_ID`);

--
-- Indexes for table `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`EMAIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

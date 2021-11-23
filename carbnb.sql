-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2021 at 08:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
  `ID` int(4) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BOOKING_ID` int(11) NOT NULL,
  `DATE_OF_BOOKING` datetime NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `DURATION` int(11) NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  `R_ID` int(11) NOT NULL,
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
  `LOCATION` varchar(30) NOT NULL,
  `NO_OF_SEATS` int(11) NOT NULL,
  `O_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `car_review`
--

CREATE TABLE `car_review` (
  `REVIEW_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(800) NOT NULL,
  `VEHICLENO` varchar(13) NOT NULL,
  `O_ID` int(11) NOT NULL,
  `SCORE` int(11) NOT NULL CHECK (`SCORE` <= 10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FEEDBACK_ID` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONENUMBER` bigint(10) NOT NULL,
  `LOCATION` varchar(30) NOT NULL,
  `REVIEW_TYPE` varchar(10) NOT NULL,
  `DESCRIPTION` varchar(800) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `A_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `PHONE_NO` bigint(10) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PAYMENT_ID` int(11) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `PAYMENT_DATE` datetime NOT NULL,
  `R_ID` int(11) NOT NULL,
  `A_ID` int(4) DEFAULT NULL,
  `BOOKING_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE `renter` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `PHONE_NO` bigint(10) NOT NULL,
  `DRIVING_LICENSE_NO` varchar(15) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`BOOKING_ID`),
  ADD KEY `R_ID` (`R_ID`),
  ADD KEY `C_VEHICLENO` (`C_VEHICLENO`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`VEHICLE_NO`),
  ADD KEY `O_ID` (`O_ID`);

--
-- Indexes for table `car_review`
--
ALTER TABLE `car_review`
  ADD PRIMARY KEY (`REVIEW_ID`),
  ADD KEY `O_ID` (`O_ID`),
  ADD KEY `VEHICLENO` (`VEHICLENO`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FEEDBACK_ID`),
  ADD KEY `A_ID` (`A_ID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PAYMENT_ID`),
  ADD KEY `R_ID` (`R_ID`),
  ADD KEY `A_ID` (`A_ID`),
  ADD KEY `BOOKING_ID` (`BOOKING_ID`);

--
-- Indexes for table `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BOOKING_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_review`
--
ALTER TABLE `car_review`
  MODIFY `REVIEW_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FEEDBACK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PAYMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `renter`
--
ALTER TABLE `renter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`R_ID`) REFERENCES `renter` (`ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`C_VEHICLENO`) REFERENCES `car` (`VEHICLE_NO`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`O_ID`) REFERENCES `owner` (`ID`);

--
-- Constraints for table `car_review`
--
ALTER TABLE `car_review`
  ADD CONSTRAINT `car_review_ibfk_1` FOREIGN KEY (`O_ID`) REFERENCES `owner` (`ID`),
  ADD CONSTRAINT `car_review_ibfk_2` FOREIGN KEY (`VEHICLENO`) REFERENCES `car` (`VEHICLE_NO`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`A_ID`) REFERENCES `admin` (`ID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`R_ID`) REFERENCES `renter` (`ID`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`A_ID`) REFERENCES `admin` (`ID`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`BOOKING_ID`) REFERENCES `booking` (`BOOKING_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

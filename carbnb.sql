-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 07:38 AM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `PASSWORD`, `NAME`) VALUES
(1, 'heheboi', 'sam');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BOOKING_ID` int(11) NOT NULL,
  `FROM_DATE` date NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `TO_DATE` date NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  `RENTER_ID` int(11) NOT NULL,
  `C_VEHICLENO` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BOOKING_ID`, `FROM_DATE`, `AMOUNT`, `TO_DATE`, `STATUS`, `RENTER_ID`, `C_VEHICLENO`) VALUES
(1, '2022-01-21', 3000, '2022-01-28', 'O', 4, 'TN58AB4561'),
(2, '2022-01-21', 0, '2021-11-26', 'O', 4, 'TN58AB4560'),
(3, '2021-12-20', 0, '2021-12-30', 'O', 4, 'TN58AB4560'),
(4, '2021-12-20', 10, '2021-12-30', 'O', 4, 'TN58AB4567'),
(5, '2021-12-01', 36000, '2021-12-10', 'O', 4, 'TN58AB4560'),
(6, '2021-12-20', 50000, '2021-12-30', 'O', 4, 'TN58AB4567'),
(7, '2021-12-20', 20000, '2021-12-24', 'O', 4, 'TN58AB4567'),
(8, '2021-12-10', 50000, '2021-12-20', 'O', 4, 'TN58AB4561'),
(9, '2021-12-15', 15000, '2021-12-25', 'O', 4, 'TN58AB4569'),
(10, '2021-12-10', 20000, '2021-12-20', 'O', 4, 'TN58AB4568'),
(11, '2021-12-10', 20000, '2021-12-20', 'O', 4, 'TN58AB4568'),
(12, '2021-12-16', 40000, '2021-12-26', 'O', 4, 'TN58AB4560'),
(13, '2022-03-04', 50000, '2022-03-14', 'O', 4, 'TN58AB4567'),
(14, '2021-12-08', 50000, '2021-12-18', 'O', 3, 'TN58AB4561'),
(15, '2022-02-18', 40000, '2022-02-28', 'O', 3, 'TN58AB4560'),
(16, '2021-12-02', 15000, '2021-12-05', 'O', 5, 'TN58AB4561');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `VEHICLE_NO` varchar(15) NOT NULL,
  `COMPANY` varchar(15) NOT NULL,
  `MODEL` varchar(30) NOT NULL,
  `AGE` int(11) NOT NULL,
  `RATE` int(11) NOT NULL,
  `LOCATION` varchar(30) NOT NULL,
  `NO_OF_SEATS` int(11) NOT NULL,
  `O_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`VEHICLE_NO`, `COMPANY`, `MODEL`, `AGE`, `RATE`, `LOCATION`, `NO_OF_SEATS`, `O_ID`) VALUES
('KA 12 XE 3113', 'Maruti Suzuki', 'Swift', 4, 3000, 'Chennai', 7, 5),
('TN58AB4560', 'Renault', 'Duster R7', 2, 4000, 'Kolkata', 6, 1),
('TN58AB4561', 'Tata', 'Innova T8', 6, 5000, 'Mumbai', 8, 2),
('TN58AB4567', 'Volkswagen', 'R3', 3, 5000, 'Kolkata', 5, 3),
('TN58AB4568', 'Kia', 'Polo 4', 5, 2000, 'Chennai', 5, 1),
('TN58AB4569', 'Skoda', 'Knight 4', 3, 1500, 'Delhi', 6, 2),
('TN58CA1234', 'Tata', 'INDICA 3000', 4, 1000, 'Kolkata', 4, 3),
('WB 24 R 3012', 'Hyundai', 'i10', 6, 1000, 'klk', 5, 1);

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

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FEEDBACK_ID`, `NAME`, `EMAIL`, `PHONENUMBER`, `LOCATION`, `REVIEW_TYPE`, `DESCRIPTION`, `STATUS`, `A_ID`) VALUES
(8, 'Shruthi S', 'shruthi.s2020@vitstudent.ac.in', 7777788888, 'chn', 'Query', 'top math?', 'OPEN', 1),
(9, 'Subhendu Dash', 'subhendu.dash2020@vitstudent.ac.in', 7777788888, 'chn', 'Query', 'how to be topper', 'OPEN', 1),
(12, 'Shruti B', 'shruti.b2020@vitstudent.ac.in', 2222244444, 'chn', 'Query', 'How do i book a car?', 'OPEN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `O_ID` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `PHONE_NO` bigint(10) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`O_ID`, `EMAIL`, `NAME`, `PHONE_NO`, `PASSWORD`) VALUES
(1, 's.mitter.stark53@gmail.com', 'Soham Mitra', 8583007542, '6f3cca24d18656d483feeaf481de3568'),
(2, 'susindhar.av2020@vitstudent.ac.in', 'Susindhar', 9999988888, 'd7602ce9c88be2300b08dc5764b7e525'),
(3, 'harikrishna.r2020@vitstudent.ac.in', 'Harikrishna', 5555566666, '53a5f9161628efe53a9ea763e26f32db'),
(5, 'subhendu.dash2020@vitstudent.ac.in', 'Subhendu Dash', 6666655555, '30851a0a59149430433e30fc511eb5d8');

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
  `R_ID` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `PHONE_NO` bigint(10) NOT NULL,
  `DRIVING_LICENSE_NO` varchar(15) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`R_ID`, `EMAIL`, `NAME`, `PHONE_NO`, `DRIVING_LICENSE_NO`, `PASSWORD`) VALUES
(3, 'mitra.soham53@gmail.com', 'Soham Mitra', 8583007542, 'ASASAsiidnn1283', '57bc3327f07ae58ba62514b6ff798cfe'),
(4, 'susindhar.av2020@vitstudent.ac.in', 'Susindhar', 9999988888, 'zkhuhduhw17162', 'd7602ce9c88be2300b08dc5764b7e525'),
(5, 'shruthi.s2020@vitstudent.ac.in', 'Shruthi S', 7777788888, 'ajssdhu8u1wu', '16b2cdbbcfcafa04927af7ec0aabafb3');

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
  ADD KEY `R_ID` (`RENTER_ID`),
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
  ADD PRIMARY KEY (`O_ID`);

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
  ADD PRIMARY KEY (`R_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BOOKING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `car_review`
--
ALTER TABLE `car_review`
  MODIFY `REVIEW_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FEEDBACK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PAYMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `renter`
--
ALTER TABLE `renter`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`RENTER_ID`) REFERENCES `renter` (`R_ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`C_VEHICLENO`) REFERENCES `car` (`VEHICLE_NO`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`O_ID`) REFERENCES `owner` (`O_ID`);

--
-- Constraints for table `car_review`
--
ALTER TABLE `car_review`
  ADD CONSTRAINT `car_review_ibfk_1` FOREIGN KEY (`O_ID`) REFERENCES `owner` (`O_ID`),
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
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`R_ID`) REFERENCES `renter` (`R_ID`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`A_ID`) REFERENCES `admin` (`ID`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`BOOKING_ID`) REFERENCES `booking` (`BOOKING_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

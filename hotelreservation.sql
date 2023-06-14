-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 05:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `CustomerID` int(100) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Cust_Address` varchar(100) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  `RoomType` varchar(10) NOT NULL,
  `NumberOfGuest` int(2) NOT NULL,
  `RoomNum` varchar(8) NOT NULL,
  `RoomPrice` int(10) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `DownPayment` int(10) NOT NULL,
  `TotalPrice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`CustomerID`, `FName`, `LName`, `Cust_Address`, `ContactNo`, `RoomType`, `NumberOfGuest`, `RoomNum`, `RoomPrice`, `CheckIn`, `CheckOut`, `DownPayment`, `TotalPrice`) VALUES
(32, 'Dom', 'Franc', ' asdasdas ', ' 12312321321 ', 'classic', 2, 'CL-186', 900, '2022-02-15', '2022-02-24', 810, 8100),
(33, 'test', 'test', 'asdasdasdas', '12312312312', 'classic', 2, 'CL-001', 900, '2022-02-15', '2022-02-17', 180, 1800),
(34, ' Dominic ', ' Francisco ', 'sabang,baliuag,bulacan', ' 12312312321 ', 'premium', 2, 'PL-001', 900, '2022-02-08', '2022-02-11', 270, 2700),
(37, 'asdasdasdas', 'asdasdas', 'asdasdas', '12321', 'deluxe', 2, 'DL-241', 1300, '2022-02-16', '2022-02-18', 260, 2600);

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE `room_info` (
  `room_id` int(11) NOT NULL,
  `RoomNum` text NOT NULL,
  `RoomType` text NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`room_id`, `RoomNum`, `RoomType`, `Status`) VALUES
(1, 'PR-001 ', 'premium', 'reserved'),
(2, 'CL-001', 'Classic', 'reserved'),
(4, '  UL-002 ', 'ultimate', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `User_ID` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `UserLevel` text NOT NULL,
  `Email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`User_ID`, `firstName`, `lastName`, `username`, `password`, `UserLevel`, `Email`) VALUES
(1, '', 'Francisco', ' testaccount ', '123', 'Admin', 'dominic.m.francisco@gmail.com'),
(5, 'asdsadsds', 'asdasd', 'sadasd', 'asd', 'Employee', 'asdasdasdasdasds@gmail.com'),
(8, 'sample', 'sample', 'scasdasedasda', '123', 'Employee', 'asdasd@gmail.com'),
(10, 'sadadasdas', 'asdasdasd', 'test1234567', '123', 'Employee', 'asdasd@gmail.com'),
(11, 'asdasdas', 'asdasdas', 'test123213', '123', 'Customer', 'asdasd@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `room_info`
--
ALTER TABLE `room_info`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `CustomerID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `room_info`
--
ALTER TABLE `room_info`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

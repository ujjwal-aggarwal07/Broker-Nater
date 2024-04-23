-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 07:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brokernater`
--

-- --------------------------------------------------------

--
-- Table structure for table `fundsdetail`
--

CREATE TABLE `fundsdetail` (
  `userId` bigint(50) DEFAULT NULL,
  `balance` decimal(50,0) DEFAULT NULL,
  `serialnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fundsdetail`
--

INSERT INTO `fundsdetail` (`userId`, `balance`, `serialnumber`) VALUES
(8700323777, '520593', 12),
(1200108383, '44804', 17);

-- --------------------------------------------------------

--
-- Table structure for table `fundstransaction`
--

CREATE TABLE `fundstransaction` (
  `userId` bigint(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `amount` decimal(20,0) DEFAULT NULL,
  `balance` decimal(20,0) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fundstransaction`
--

INSERT INTO `fundstransaction` (`userId`, `description`, `amount`, `balance`, `date`) VALUES
(8700323777, 'FUND ADDED UPI', '100', '100', '2023-04-11 00:57:39'),
(8700323777, 'FUND WITHDRAWN UPI', '100', '0', '2023-04-11 00:57:39'),
(8700323777, 'FUND ADDED UPI', '1000', '1000', '2023-04-12 00:04:08'),
(8700323777, 'TATACHEM.BSEBUY', '1', '999', '2023-04-12 00:04:24'),
(8700323777, 'TATACHEM.BSEBUY', '100', '899', '2023-04-12 00:09:21'),
(8700323777, 'TATACHEM.BSEBUY', '400', '499', '2023-04-12 00:13:21'),
(8700323777, 'TATACHEM.BSEBUY', '400', '99', '2023-04-12 00:14:02'),
(8700323777, 'TATACHEM.BSE  SELL', '1', '100', '2023-04-12 01:51:05'),
(8700323777, 'FUND ADDED UPI', '50000', '50100', '2023-04-12 01:57:21'),
(8700323777, 'DMART.BSEBUY', '34508', '15593', '2023-04-12 01:57:45'),
(8700323777, 'DMART.BSE  SELL', '5000', '20593', '2023-04-12 02:02:21'),
(8700323777, 'DMART.BSE  SELL', '500000', '520593', '2023-04-12 02:05:18'),
(1200108383, 'FUND ADDED UPI', '5000', '5000', '2023-04-20 23:55:09'),
(1200108383, 'FUND ADDED UPI', '1000', '6000', '2023-04-20 23:56:04'),
(1200108383, 'LXCHEM.BSE BUY ', '5717', '283', '2023-04-20 23:56:26'),
(1200108383, 'SBIN.BSE BUY ', '201', '82', '2023-04-20 23:57:08'),
(1200108383, 'LXCHEM.BSE  SELL ', '572', '654', '2023-04-21 00:08:09'),
(1200108383, 'SBIN.BSE  SELL ', '1000', '1654', '2023-04-21 00:09:39'),
(1200108383, 'LXCHEM.BSE BUY ', '1000', '654', '2023-04-21 00:13:52'),
(1200108383, 'LXCHEM.BSE BUY ', '100', '554', '2023-04-21 00:18:55'),
(1200108383, 'LXCHEM.BSE  SELL ', '48023', '48577', '2023-04-21 00:27:35'),
(1200108383, 'FUND WITHDRAWN UPI', '5000', '43577', '2023-04-25 09:40:40'),
(1200108383, 'FUND ADDED UPI', '5000', '48577', '2023-04-25 09:40:50'),
(1200108383, 'SBIN.BSE BUY ', '2773', '45804', '2023-04-25 09:41:10'),
(1200108383, 'AAPL BUY ', '5000', '40804', '2023-04-28 17:03:33'),
(1200108383, 'TATACOFFEE.BSE BUY ', '1000', '39804', '2023-04-28 17:03:51'),
(1200108383, 'FUND ADDED UPI', '5000', '44804', '2023-04-28 17:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `holdingdetail`
--

CREATE TABLE `holdingdetail` (
  `userID` bigint(11) NOT NULL,
  `shareID` varchar(50) NOT NULL,
  `currQTY` int(11) NOT NULL,
  `buyprice` decimal(11,0) NOT NULL,
  `sellprice` decimal(11,0) DEFAULT NULL,
  `sellQTY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holdingdetail`
--

INSERT INTO `holdingdetail` (`userID`, `shareID`, `currQTY`, `buyprice`, `sellprice`, `sellQTY`) VALUES
(2147483647, 'TATACHEM.BSE', 118, '52', '1000', 5),
(8700323777, 'TATACHEM.BSE', 118, '52', '100000', 5),
(8700323777, 'DMART.BSE', 118, '52', '100000', 5),
(1200108383, 'LXCHEM.BSE', 0, '37', '286', 168),
(1200108383, 'SBIN.BSE', 123, '72', '500', 2),
(1200108383, 'AAPL', 10, '500', NULL, NULL),
(1200108383, 'TATACOFFEE.BSE', 50, '20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holdingtransaction`
--

CREATE TABLE `holdingtransaction` (
  `userID` bigint(11) NOT NULL,
  `shareID` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `type` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holdingtransaction`
--

INSERT INTO `holdingtransaction` (`userID`, `shareID`, `date`, `type`, `qty`, `price`) VALUES
(2147483647, 'TATACHEM.BSE', '2023-04-12 00:04:24', 'BUY', 1, '0'),
(8700323777, 'TATACHEM.BSE', '2023-04-12 00:09:21', 'BUY', 10, '0'),
(8700323777, 'TATACHEM.BSE', '2023-04-12 00:13:21', 'BUY', 20, '0'),
(8700323777, 'TATACHEM.BSE', '2023-04-12 00:14:02', 'BUY', 20, '0'),
(8700323777, 'TATACHEM.BSE', '2023-04-12 01:51:05', 'SELL', 1, '1'),
(8700323777, 'DMART.BSE', '2023-04-12 01:57:45', 'BUY', 10, '3451'),
(8700323777, 'DMART.BSE', '2023-04-12 02:02:21', 'SELL', 5, '1000'),
(8700323777, 'DMART.BSE', '2023-04-12 02:05:18', 'SELL', 5, '100000'),
(1200108383, 'LXCHEM.BSE', '2023-04-20 23:56:26', 'BUY', 20, '286'),
(1200108383, 'SBIN.BSE', '2023-04-20 23:57:08', 'BUY', 2, '101'),
(1200108383, 'LXCHEM.BSE', '2023-04-21 00:08:09', 'SELL', 2, '286'),
(1200108383, 'SBIN.BSE', '2023-04-21 00:09:39', 'SELL', 2, '500'),
(1200108383, 'LXCHEM.BSE', '2023-04-21 00:13:52', 'BUY', 100, '10'),
(1200108383, 'LXCHEM.BSE', '2023-04-21 00:18:55', 'BUY', 50, '2'),
(1200108383, 'LXCHEM.BSE', '2023-04-21 00:27:35', 'SELL', 168, '286'),
(1200108383, 'SBIN.BSE', '2023-04-25 09:41:10', 'BUY', 5, '555'),
(1200108383, 'AAPL', '2023-04-28 17:03:33', 'BUY', 10, '500'),
(1200108383, 'TATACOFFEE.BSE', '2023-04-28 17:03:51', 'BUY', 50, '20');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `serialNo` int(11) NOT NULL,
  `userID` bigint(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`serialNo`, `userID`, `password`) VALUES
(34, 1234567891, '313233343536'),
(35, 8700323777, '3132333435363738'),
(40, 1200108383, '313233343536');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `userID` bigint(50) NOT NULL,
  `stockID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`userID`, `stockID`) VALUES
(1200108383, 'AAPL'),
(1200108383, 'LXCHEM.BSE'),
(1200108383, 'RELIANCE.BSE'),
(1200108383, 'SBIN.BSE'),
(1200108383, 'TATACOFFEE.BSE'),
(1200108383, 'TATAMOTORS.BSE'),
(1234567891, 'ADANIPOWER.BSE'),
(1234567891, 'INFY.BSE'),
(1234567891, 'SAIL.BSE'),
(1234567891, 'TATAPOWER.BSE'),
(1234567891, 'TIMKEN.BSE'),
(8700323777, '601058.SHH'),
(8700323777, 'DMART.BSE'),
(8700323777, 'INFY'),
(8700323777, 'TATACHEM.BSE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fundsdetail`
--
ALTER TABLE `fundsdetail`
  ADD PRIMARY KEY (`serialnumber`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`serialNo`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD UNIQUE KEY `userID` (`userID`,`stockID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fundsdetail`
--
ALTER TABLE `fundsdetail`
  MODIFY `serialnumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `serialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

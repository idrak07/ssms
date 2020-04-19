-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 02:50 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicinesupply`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `Name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `details`, `price`, `cid`) VALUES
(1, 'D', 'xcbnvhsjdG', 100, 1),
(2, 'E', ' cbnn', 200, 1),
(3, 'F', ' cn', 300, 1),
(4, 'G', 'cbxnvja', 220, 1),
(5, 'H', 'cbxnvja', 590, 1),
(6, 'I', 'cbxnvja', 440, 2),
(7, 'J', 'cbxnvja', 180, 2),
(8, 'k', 'cbxnvja', 330, 2),
(9, 'L', 'chj,vs', 710, 2),
(10, 'M', 'cbxnvja', 88, 2),
(11, 'N', 'cbxnvja', 860, 2),
(12, 'O', 'cbxnvja', 250, 2),
(13, 'P', 'cbxnvja', 410, 3),
(14, 'q', 'cbxnvja', 570, 3),
(15, 'r', 'cbxnvja', 940, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ordercarts`
--

CREATE TABLE `ordercarts` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` float NOT NULL,
  `oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `placeddate` date NOT NULL,
  `deliverydate` date NOT NULL,
  `time` time NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacies` (`Id`, `UserName`, `Password`) VALUES
(1, 'Shoaib', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `ordercarts`
--
ALTER TABLE `ordercarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oid` (`oid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ordercarts`
--
ALTER TABLE `ordercarts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `cmFK` FOREIGN KEY (`cid`) REFERENCES `companies` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `coFK` FOREIGN KEY (`cid`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `poFK` FOREIGN KEY (`pid`) REFERENCES `pharmacies` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 04:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `UserID` int(20) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Created_at` datetime NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Phone_Number` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Postal_code` varchar(20) NOT NULL,
  `Account_Type` varchar(20) NOT NULL,
  `Account_Balance` decimal(12,2) NOT NULL,
  `Investment_style` varchar(50) NOT NULL,
  `Investment_goal` varchar(50) NOT NULL,
  `Investment_horizon` varchar(20) NOT NULL,
  `Employment_status` varchar(50) NOT NULL,
  `Anuual_income` decimal(12,2) NOT NULL,
  `Risk_tolerance` varchar(20) NOT NULL,
  `Net_worth` decimal(12,2) NOT NULL,
  `Invesment_amount` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invesment_ideas`
--

CREATE TABLE `invesment_ideas` (
  `Ideas_ID` int(20) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Abstract` varchar(100) NOT NULL,
  `Published_date` date NOT NULL,
  `Expiry_date` date NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Content` text NOT NULL,
  `Risk_Rating` varchar(1) NOT NULL,
  `Instruments` varchar(50) NOT NULL,
  `Currency` varchar(10) NOT NULL,
  `Major_Sector` varchar(20) NOT NULL,
  `Minor_Sector` varchar(20) NOT NULL,
  `Region` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Updated_at` datetime NOT NULL,
  `Deleted_at` datetime NOT NULL,
  `UserID` int(20) NOT NULL,
  `ManagerID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investment_products`
--

CREATE TABLE `investment_products` (
  `ProductID` int(20) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Product_Type` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Product_added_date` date NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Performance_analytics` text NOT NULL,
  `UserID` int(20) NOT NULL,
  `ManagerID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LoginID` int(20) NOT NULL,
  `UserID` int(20) NOT NULL,
  `ManagerID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relationship_manager`
--

CREATE TABLE `relationship_manager` (
  `ManagerID` int(20) NOT NULL,
  `Manager_Name` varchar(50) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Biography` text NOT NULL,
  `Photo_URL` varchar(50) NOT NULL,
  `Phone_Number` varchar(20) NOT NULL,
  `Location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `invesment_ideas`
--
ALTER TABLE `invesment_ideas`
  ADD PRIMARY KEY (`Ideas_ID`),
  ADD KEY `invesment_ideas_ibfk_1` (`UserID`),
  ADD KEY `invesment_ideas_ibfk_2` (`ManagerID`);

--
-- Indexes for table `investment_products`
--
ALTER TABLE `investment_products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `investment_products_ibfk_1` (`UserID`),
  ADD KEY `investment_products_ibfk_2` (`ManagerID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`),
  ADD KEY `login_ibfk_1` (`UserID`),
  ADD KEY `login_ibfk_2` (`ManagerID`);

--
-- Indexes for table `relationship_manager`
--
ALTER TABLE `relationship_manager`
  ADD PRIMARY KEY (`ManagerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `UserID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invesment_ideas`
--
ALTER TABLE `invesment_ideas`
  MODIFY `Ideas_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investment_products`
--
ALTER TABLE `investment_products`
  MODIFY `ProductID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relationship_manager`
--
ALTER TABLE `relationship_manager`
  MODIFY `ManagerID` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invesment_ideas`
--
ALTER TABLE `invesment_ideas`
  ADD CONSTRAINT `invesment_ideas_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `client` (`UserID`),
  ADD CONSTRAINT `invesment_ideas_ibfk_2` FOREIGN KEY (`ManagerID`) REFERENCES `relationship_manager` (`ManagerID`);

--
-- Constraints for table `investment_products`
--
ALTER TABLE `investment_products`
  ADD CONSTRAINT `investment_products_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `client` (`UserID`),
  ADD CONSTRAINT `investment_products_ibfk_2` FOREIGN KEY (`ManagerID`) REFERENCES `relationship_manager` (`ManagerID`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `client` (`UserID`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`ManagerID`) REFERENCES `relationship_manager` (`ManagerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

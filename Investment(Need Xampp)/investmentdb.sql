-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 11:57 PM
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
-- Table structure for table `investment_ideas`
--

CREATE TABLE `investment_ideas` (
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
  `ProductID` int(20) DEFAULT NULL,
  `UserID` int(20) DEFAULT NULL,
  `ManagerID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `investment_ideas`
--

INSERT INTO `investment_ideas` (`Ideas_ID`, `Title`, `Abstract`, `Published_date`, `Expiry_date`, `Author`, `Content`, `Risk_Rating`, `Instruments`, `Currency`, `Major_Sector`, `Minor_Sector`, `Region`, `Country`, `Updated_at`, `Deleted_at`, `ProductID`, `UserID`, `ManagerID`) VALUES
(1, 'Blockchain', 'The global market for Blockchain Technology estimated at US$3.4 Billion in the year 2022, is project', '2023-03-20', '2023-03-30', 'John', 'Fast, truly global in reach, and with low processing fees, blockchain remains on the path of totally changing the face of financial transactions worldwide. \r\nBlockchain is a permanent database that keeps record of every transaction that is executed. The technology has become an integral part of business-to-business and business-to-consumer commerce, products and legal processes. In the banking, financial services and insurance sector, growth is expected to benefit from the growing adoption of blockchain in applications such as digital identities, payments, exchanges and documentation.\r\nFinancial institutions have been spearheading innovations in the Blockchain technology space, with the sector already witness to successful implementations of use cases such as Nasdaq`s private market trading platform and Ripple`s cross border payment platform. Blockchain holds significant potential for prescription management, medical data, online shopping and other areas. The technology is likely to help companies in controlling supply chains, achieving traceability of products and maintaining auditable record of goods movement. In the post COVID-19 period, growth in the market will be led by next-generation blockchain innovations and the resulting development of new applications areas.\r\nAmid the COVID-19 crisis, the global market for Blockchain Technology estimated at US$3.4 Billion in the year 2022, is projected to reach a revised size of US$19.9 Billion by 2026, growing at a CAGR of 43% over the analysis period. Public, one of the segments analyzed in the report, is projected to grow at a 44.8% CAGR to reach US$21.5 Billion by the end of the analysis period.\r\nThe Blockchain Technology market in the U.S. is estimated at US$1 Billion in the year 2022. The country currently accounts for a 31.64% share in the global market. China, the world&#039;s second largest economy, is forecast to reach an estimated market size of US$2.1 Billion in the year 2026 trailing a CAGR of 50.2% through the analysis period.\r\nWhen it comes to the sector that has the highest distribution of blockchain market value, the banking industry rules with a 29.7% share. Followed by process manufacturing (11.4%), discrete manufacturing (10.9%), and professional services (6.6%) (IDC, 2020). The bullish rush by investors to increase the reach of blockchain services is of course easily matched by the ever-increasing adopters of blockchain wallets, which now stands at 40 million worldwide (Statista, 2021). To give you a perspective, that stood at just 11 million in 2016.\r\nAnother analysis by PwC suggests that 2025 will be the tipping point when blockchain technologies will be adopted at scale across economies worldwide. Currently, tracking and tracing of products and services is the top priority of many companies.  Other key application areas include payments and financial services, contracts and dispute resolution, and identity management (PwC, 2020).\r\n', '1', 'IBM, AWS, SAP, Oracle, Infosys', 'USD, EUR, ', 'Technology', 'Software &amp; IT Se', 'Americas, Europe, As', 'United States of Ame', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, NULL, NULL);

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
  `UserID` int(20) DEFAULT NULL,
  `ManagerID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `investment_products`
--

INSERT INTO `investment_products` (`ProductID`, `Product_Name`, `Product_Type`, `Description`, `Product_added_date`, `Status`, `Performance_analytics`, `UserID`, `ManagerID`) VALUES
(1, 'U.S Treasury Security', 'Bonds', 'U.S. Treasury securities (&quot;Treasuries&quot;) are issued by the federal government and, because they&#039;re backed by the &quot;full faith and credit&quot; of the U.S. government, are considered to be among the safest investments you can make. This means that, come what may (e.g., recession, inflation, war), the U.S. government is expected to repay its bondholders. Theyâ€™re also among the most liquidâ€”or actively tradedâ€”investments in the world.', '2023-03-20', 'Avaliable', '', NULL, NULL),
(2, 'Capital Markets Union', 'Equity', 'Investments supporting capital markets and improving access to finance-based equity and debt investments that support the growth of European enterprises, diversification of sources of financing, and strengthening the solvency of enterprises by sharing risk with private investors.', '2023-03-22', 'Avaliable', '', NULL, NULL),
(3, 'Climate and Environmental Solutions', 'Equity', 'These investments contribute to the EU Green Deal and support a transition to an EU climate-neutral economy based on sustainable development, a reduction in dependence on fossil fuels, sustainable management of natural resources, food security and enhanced climate resilience, among other goals.', '2023-03-01', 'Not Avaliable', '', NULL, NULL),
(4, 'Digital &amp; Cultural and Creative Sectors', 'Equity', 'Investments that contribute to the strengthening of the EUâ€™s competitiveness, digital independence and strategic autonomy, with a focus on data, communications technologies, services and products that facilitate the digital transition and address societal challenges', '2023-03-25', 'Avaliable', '', NULL, NULL);

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
-- Indexes for table `investment_ideas`
--
ALTER TABLE `investment_ideas`
  ADD PRIMARY KEY (`Ideas_ID`),
  ADD KEY `invesment_ideas_ibfk_1` (`UserID`),
  ADD KEY `invesment_ideas_ibfk_2` (`ManagerID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `investment_products`
--
ALTER TABLE `investment_products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ManagerID` (`ManagerID`);

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
-- AUTO_INCREMENT for table `investment_ideas`
--
ALTER TABLE `investment_ideas`
  MODIFY `Ideas_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investment_products`
--
ALTER TABLE `investment_products`
  MODIFY `ProductID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `investment_ideas`
--
ALTER TABLE `investment_ideas`
  ADD CONSTRAINT `investment_ideas_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `client` (`UserID`),
  ADD CONSTRAINT `investment_ideas_ibfk_2` FOREIGN KEY (`ManagerID`) REFERENCES `relationship_manager` (`ManagerID`),
  ADD CONSTRAINT `investment_ideas_ibfk_3` FOREIGN KEY (`ProductID`) REFERENCES `investment_products` (`ProductID`);

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

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 07:26 AM
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
  `Abstract` text NOT NULL,
  `Published_date` date NOT NULL,
  `Expiry_date` date NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Content` text NOT NULL,
  `Risk_Rating` varchar(1) NOT NULL,
  `Instruments` varchar(50) NOT NULL,
  `Currency` varchar(20) NOT NULL,
  `Major_Sector` varchar(50) NOT NULL,
  `Minor_Sector` varchar(50) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Updated_at` datetime NOT NULL,
  `Deleted_at` datetime NOT NULL,
  `ProductID` int(20) DEFAULT NULL,
  `Creator_ID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `investment_ideas`
--

INSERT INTO `investment_ideas` (`Ideas_ID`, `Title`, `Abstract`, `Published_date`, `Expiry_date`, `Author`, `Content`, `Risk_Rating`, `Instruments`, `Currency`, `Major_Sector`, `Minor_Sector`, `Region`, `Country`, `Updated_at`, `Deleted_at`, `ProductID`, `Creator_ID`) VALUES
(1, 'Blockchain', 'The global market for Blockchain Technology estimated at US$3.4 Billion in the year 2022, is projected to reach a revised size of US$19.9 Billion by 2026, growing at a CAGR of 43% over the analysis period. Financial institutions have been spearheading innovations in the Blockchain technology space and technology companies with a foothold in these companies will do well.', '2023-03-20', '2023-03-30', 'John', 'Fast, truly global in reach, and with low processing fees, blockchain remains on the path of totally changing the face of financial transactions worldwide. \r\nBlockchain is a permanent database that keeps record of every transaction that is executed. The technology has become an integral part of business-to-business and business-to-consumer commerce, products and legal processes. In the banking, financial services and insurance sector, growth is expected to benefit from the growing adoption of blockchain in applications such as digital identities, payments, exchanges and documentation.\r\nFinancial institutions have been spearheading innovations in the Blockchain technology space, with the sector already witness to successful implementations of use cases such as Nasdaq`s private market trading platform and Ripple`s cross border payment platform. Blockchain holds significant potential for prescription management, medical data, online shopping and other areas. The technology is likely to help companies in controlling supply chains, achieving traceability of products and maintaining auditable record of goods movement. In the post COVID-19 period, growth in the market will be led by next-generation blockchain innovations and the resulting development of new applications areas.\r\nAmid the COVID-19 crisis, the global market for Blockchain Technology estimated at US$3.4 Billion in the year 2022, is projected to reach a revised size of US$19.9 Billion by 2026, growing at a CAGR of 43% over the analysis period. Public, one of the segments analyzed in the report, is projected to grow at a 44.8% CAGR to reach US$21.5 Billion by the end of the analysis period.\r\nThe Blockchain Technology market in the U.S. is estimated at US$1 Billion in the year 2022. The country currently accounts for a 31.64% share in the global market. China, the world&#039;s second largest economy, is forecast to reach an estimated market size of US$2.1 Billion in the year 2026 trailing a CAGR of 50.2% through the analysis period.\r\nWhen it comes to the sector that has the highest distribution of blockchain market value, the banking industry rules with a 29.7% share. Followed by process manufacturing (11.4%), discrete manufacturing (10.9%), and professional services (6.6%) (IDC, 2020). The bullish rush by investors to increase the reach of blockchain services is of course easily matched by the ever-increasing adopters of blockchain wallets, which now stands at 40 million worldwide (Statista, 2021). To give you a perspective, that stood at just 11 million in 2016.\r\nAnother analysis by PwC suggests that 2025 will be the tipping point when blockchain technologies will be adopted at scale across economies worldwide. Currently, tracking and tracing of products and services is the top priority of many companies.  Other key application areas include payments and financial services, contracts and dispute resolution, and identity management (PwC, 2020).\r\n', '1', 'IBM, AWS, SAP, Oracle, Infosys', 'USD, EUR, INR', 'Technology', 'Software &amp; IT Services', 'Americas, Europe, Asia', 'United States of America, Germany, India', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, NULL),
(2, 'Biotech', 'The global biotechnology market size was estimated at USD 1,023.92 billion in 2021 and is expected to grow at a compound annual growth rate (CAGR) of 13.9% from 2022 to 2030, reaching $2.44 trillion by 2028, recording a compound annual growth rate of 7.4%.  The market is driven by strong government support through initiatives aimed at modernization of regulatory framework, improvements in approval processes &amp; reimbursement policies, as well as standardization of clinical studies. ', '2023-03-21', '2023-03-31', 'Smith', 'The successful development of vaccines to combat the ongoing pandemic has meant a significant increase in popularity for the biotech industry. In the past months, venture capital funding for the life sciences reached record highs raising more than $30 billion in the U.S. Pacific Northwest.  The global biotechnology market size was estimated at USD 1,023.92 billion in 2021 and is expected to grow at a compound annual growth rate (CAGR) of 13.9% from 2022 to 2030, reaching $2.44 trillion by 2028, recording a compound annual growth rate of 7.4%.  Thereâ€™s no doubt biotech is becoming a booming industry attracting many entrepreneurs and investors. \r\nBiotechnology is an interdisciplinary field that uses living creatures, biological systems, or derivatives to improve or develop procedures and outcomes for the production of healthcare products and therapies. It has a significant impact on a variety of industries, including medical and pharmaceuticals, genomics, and food and chemical manufacturing. It can be used to address a wide range of issues, including health and well-being, food and energy security, and environmental protection.\r\nThe market is driven by strong government support through initiatives aimed at modernization of regulatory framework, improvements in approval processes &amp; reimbursement policies, as well as standardization of clinical studies. The growing foothold of personalized medicine and an increasing number of orphan drug formulations are opening new avenues for biotechnology applications and are driving the influx of emerging and innovative biotechnology companies, further boosting the market revenue.\r\nThe COVID-19 pandemic has positively impacted the global market by propelling a rise in opportunities and advancements for drug development and manufacturing of vaccines for the disease.   As per the Alliance for Regenerative Medicine, companies developing cell and gene therapies raised over USD 23.1 billion in investments globally in 2021, an increase of about 16% over 2020â€™s total of USD 19.9 billion. The clinical success of leading gene therapy players in 2021, such as promising results from an in vivo CRISPR treatment for transthyretin amyloidosis, developed by Intellia Therapeutics and Regeneron, are significantly affecting the market growth. Rising demand for clinical solutions for the treatment of chronic diseases, such as cancer, diabetes, age-related macular degeneration, and almost all forms of arthritis are anticipated to boost the market.\r\nNorth America accounted for the largest share of 44.21% in 2021. The regional market is witnessing growth due to several factors, such as the presence of key players, extensive R&amp;D activities, and high healthcare expenditure. Furthermore, the rise in prevalence of chronic diseases and rising adoption of personalized medicine applications for the treatment of life-threatening disorders is expected to positively impact the market growth in the region. \r\nThe Asia Pacific is expected to expand at the fastest growth rate from 2022 to 2030.  The growth of the regional market can be attributed to increasing investments and improvement in healthcare infrastructure, favorable government initiatives, and expansion strategies from key market players.  For instance, in February 2022, Moderna Inc. announced its plans for a geographic expansion of its commercial network in Asia through the opening of four new subsidiaries in Malaysia, Singapore, Hong Kong, and Taiwan. In addition, biopharmaceutical collaborations, such as Kiniksa Pharmaceuticals and Huadong Medicineâ€™s strategic collaboration for the development and commercialization of Kiniksaâ€™s ARCALYST and mavrilimumab in the AsiaPacific region are expected to drive the market growth.\r\n', '3', 'NTLA, REGN, KNSA, 000963:CH', 'USD, CNY', 'Healthcare', 'Pharma &amp; Medical Research', 'Americas, Asia', 'United States of America, Bermuda, China', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, NULL),
(4, 'IPO EFT', 'The Renaissance IPO ETF is a transparent rules-based ETF that tracks the Renaissance IPO Index designed to hold a portfolio of the largest, most liquid, newly-listed U.S. IPOs. Each quarter when the ETF is rebalanced, new IPOs are included and older constituents are removed. At quarterly rebalances, constituents are weighted by float-adjusted market capitalization with a cap imposed on any weightings exceeding 10%. ', '2023-03-22', '2023-03-30', 'Damil', 'The Renaissance IPO ETF is a transparent rules-based ETF that tracks the Renaissance IPO Index designed to hold a portfolio of the largest, most liquid, newly-listed U.S. IPOs. Each quarter when the ETF is rebalanced, new IPOs are included and older constituents are removed. At quarterly rebalances, constituents are weighted by float-adjusted market capitalization with a cap imposed on any weightings exceeding 10%.  The Renaissance IPO ETF (the â€œFundâ€), a series of Renaissance Capital Greenwich Funds (the â€œTrustâ€), seeks to replicate as closely as possible, before fees and expenses, the price and yield performance of the Renaissance IPO Index (the â€œIndexâ€).\r\nPRINCIPAL INVESTMENT STRATEGIES\r\nThe Fund seeks to replicate as closely as possible, before fees and expenses, the price and yield performance of the Index. The Index, designed by IPO research firm Renaissance Capital LLC (the â€œIndex Providerâ€), is a portfolio of companies that have recently completed an initial public offering (â€œIPOâ€) and are listed on a U.S. exchange. IPOs are a category of unseasoned equities under-represented in core equity indices. The Index is designed to capture approximately 80% of the total market capitalization of newly public companies, which are those companies that have gone public within the last three years and meet the Index Providerâ€™s size, liquidity and free float criteria. At each quarterly rebalance, new IPOs that meet the Index Providerâ€™s eligibility criteria are included and constituent companies that have been public for three years are removed. Constituents are weighted by free float-adjusted market capitalization with individual weights capped at 10%. \r\nThe Index has been constructed using a transparent and rules-based methodology.  The Fund normally invests at least 80% of its total assets in securities that comprise the Index. Depositary receipts representing securities that comprise the Index may count towards compliance with the Fundâ€™s 80% policy. The Fund may also invest up to 20% of its assets in certain futures, options, and swap contracts, cash and cash equivalents, as well as in common stocks not included in the Index but which will help the Fund track the Index. Convertible securities and depositary receipts not included in the Index may be used by the Fund in seeking performance that corresponds to its Index and in managing cash flows. \r\nThe Index is comprised of common stocks, depositary receipts, real estate investment trusts (â€œREITsâ€) and partnership units. These securities may include IPOs of foreign companies that are listed on a U.S. exchange, as well as IPOs of companies which are located in countries categorized as emerging markets.\r\nThe Fundâ€™s 80% investment policy is non-fundamental and requires 60 daysâ€™ prior written notice to shareholders before it can be changed. The Fund, using a â€œpassiveâ€ or indexing investment approach, attempts to approximate the investment performance of the Index by investing in a portfolio of securities that generally replicates the Index. Renaissance Capital LLC (the â€œAdviserâ€) expects that, over time, the correlation between the Fundâ€™s performance before fees and expenses and that of the Index will be 95% or better. A figure of 100% would indicate perfect correlation.\r\nThe Fund may concentrate its investments in a particular industry or group of industries to the extent that the Index concentrates in an industry or group of industries. Information technology frequently represents a major sector in the Index, and within this sector, Software frequently represents the largest industry group. The Fund may lend securities to broker-dealers, banks and other institutions. When the Fund loans its portfolio securities, it will receive, at the inception of each loan, liquid collateral equal to at least 102% (for U.S.-listed securities) or 105% (for non-U.S.-listed securities) of the value of the portfolio securities being loaned.\r\n', '5', 'IPO', 'USD', 'Financials', 'Banking &amp; Investment Services', 'Americas', 'United States of America', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, NULL);

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
  `Creator_ID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `investment_products`
--

INSERT INTO `investment_products` (`ProductID`, `Product_Name`, `Product_Type`, `Description`, `Product_added_date`, `Status`, `Performance_analytics`, `Creator_ID`) VALUES
(1, 'U.S Treasury Security', 'Bonds', 'U.S. Treasury securities (&quot;Treasuries&quot;) are issued by the federal government and, because they&#039;re backed by the &quot;full faith and credit&quot; of the U.S. government, are considered to be among the safest investments you can make. This means that, come what may (e.g., recession, inflation, war), the U.S. government is expected to repay its bondholders. Theyâ€™re also among the most liquidâ€”or actively tradedâ€”investments in the world.', '2023-03-20', 'Avaliable', '', NULL),
(2, 'Capital Markets Union', 'Equity', 'Investments supporting capital markets and improving access to finance-based equity and debt investments that support the growth of European enterprises, diversification of sources of financing, and strengthening the solvency of enterprises by sharing risk with private investors.', '2023-03-22', 'Avaliable', '', NULL),
(3, 'Climate and Environmental Solutions', 'Equity', 'These investments contribute to the EU Green Deal and support a transition to an EU climate-neutral economy based on sustainable development, a reduction in dependence on fossil fuels, sustainable management of natural resources, food security and enhanced climate resilience, among other goals.', '2023-03-01', 'Avaliable', '', NULL),
(4, 'Digital &amp; Cultural and Creative Sectors', 'Equity', 'Investments that contribute to the strengthening of the EUâ€™s competitiveness, digital independence and strategic autonomy, with a focus on data, communications technologies, services and products that facilitate the digital transition and address societal challenges', '2023-03-25', 'Avaliable', '', NULL);

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
-- Table structure for table `product_idea_creator`
--

CREATE TABLE `product_idea_creator` (
  `Creator_ID` int(20) NOT NULL,
  `Creator_Name` varchar(50) NOT NULL
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
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `Creator_ID` (`Creator_ID`);

--
-- Indexes for table `investment_products`
--
ALTER TABLE `investment_products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Creator_ID` (`Creator_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`),
  ADD KEY `login_ibfk_1` (`UserID`),
  ADD KEY `login_ibfk_2` (`ManagerID`);

--
-- Indexes for table `product_idea_creator`
--
ALTER TABLE `product_idea_creator`
  ADD PRIMARY KEY (`Creator_ID`);

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
  MODIFY `Ideas_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `investment_products`
--
ALTER TABLE `investment_products`
  MODIFY `ProductID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_idea_creator`
--
ALTER TABLE `product_idea_creator`
  MODIFY `Creator_ID` int(20) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `investment_ideas_ibfk_3` FOREIGN KEY (`ProductID`) REFERENCES `investment_products` (`ProductID`),
  ADD CONSTRAINT `investment_ideas_ibfk_4` FOREIGN KEY (`Creator_ID`) REFERENCES `product_idea_creator` (`Creator_ID`);

--
-- Constraints for table `investment_products`
--
ALTER TABLE `investment_products`
  ADD CONSTRAINT `investment_products_ibfk_1` FOREIGN KEY (`Creator_ID`) REFERENCES `product_idea_creator` (`Creator_ID`);

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

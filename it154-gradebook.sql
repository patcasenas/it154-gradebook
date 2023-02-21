-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 06:34 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it154-gradebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `formative`
--

CREATE TABLE `formative` (
  `formID` int(11) NOT NULL,
  `modID` int(1) NOT NULL,
  `studNum` int(10) NOT NULL,
  `FA1` int(3) DEFAULT NULL,
  `FA2` int(3) DEFAULT NULL,
  `FA3` int(3) DEFAULT NULL,
  `FA4` int(3) DEFAULT NULL,
  `FA5` int(3) DEFAULT NULL,
  `FA6` int(3) DEFAULT NULL,
  `FA7` int(3) DEFAULT NULL,
  `FA8` int(3) DEFAULT NULL,
  `FA9` int(3) DEFAULT NULL,
  `FA10` int(3) DEFAULT NULL,
  `FAavg` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `moduleinfo`
--

CREATE TABLE `moduleinfo` (
  `modID` int(1) NOT NULL,
  `modName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moduleinfo`
--

INSERT INTO `moduleinfo` (`modID`, `modName`) VALUES
(1, 'Big Data'),
(2, 'Data Analysis'),
(3, 'Tools and Platforms');

-- --------------------------------------------------------

--
-- Table structure for table `runavg`
--

CREATE TABLE `runavg` (
  `runAvgID` int(11) NOT NULL,
  `studNum` int(10) NOT NULL,
  `FAavg` int(11) NOT NULL,
  `SAavg` int(11) NOT NULL,
  `modAvg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `soitprogram`
--

CREATE TABLE `soitprogram` (
  `programID` int(11) NOT NULL,
  `studProg` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soitprogram`
--

INSERT INTO `soitprogram` (`programID`, `studProg`) VALUES
(1, 'CS'),
(4, 'EMC'),
(3, 'IS'),
(2, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `studID` int(11) NOT NULL,
  `studNum` int(10) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `studProg` varchar(3) NOT NULL,
  `section` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`studID`, `studNum`, `lastName`, `firstName`, `studProg`, `section`) VALUES
(1, 2018115334, 'pascual', 'joshua', 'CS', 'BM5'),
(2, 2018115335, 'santos', 'meg', 'IS', 'BM4'),
(3, 2018115336, 'jay', 'pauline', 'IS', 'BM6'),
(4, 2018115337, 'pala', 'ynigo', 'EMC', 'BM1'),
(5, 2018115338, 'icaro', 'pat', 'CS', 'AT1'),
(6, 2018115339, 'casenas', 'anne', 'IT', 'AT2');

-- --------------------------------------------------------

--
-- Table structure for table `summative`
--

CREATE TABLE `summative` (
  `sumID` int(11) NOT NULL,
  `modID` int(11) NOT NULL,
  `studNum` int(11) NOT NULL,
  `SA1` int(3) DEFAULT NULL,
  `SA2` int(3) DEFAULT NULL,
  `SA3` int(3) DEFAULT NULL,
  `SAavg` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formative`
--
ALTER TABLE `formative`
  ADD PRIMARY KEY (`formID`),
  ADD KEY `FAavg` (`FAavg`);

--
-- Indexes for table `moduleinfo`
--
ALTER TABLE `moduleinfo`
  ADD PRIMARY KEY (`modID`);

--
-- Indexes for table `runavg`
--
ALTER TABLE `runavg`
  ADD PRIMARY KEY (`runAvgID`),
  ADD KEY `FAavg` (`FAavg`),
  ADD KEY `SAavg` (`SAavg`),
  ADD KEY `runavg_ibfk_3` (`studNum`);

--
-- Indexes for table `soitprogram`
--
ALTER TABLE `soitprogram`
  ADD PRIMARY KEY (`programID`),
  ADD UNIQUE KEY `programName` (`studProg`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`studID`),
  ADD UNIQUE KEY `studNum` (`studNum`),
  ADD KEY `programName` (`studProg`) USING BTREE;

--
-- Indexes for table `summative`
--
ALTER TABLE `summative`
  ADD PRIMARY KEY (`sumID`),
  ADD KEY `modID` (`modID`),
  ADD KEY `SAavg` (`SAavg`),
  ADD KEY `summative_ibfk_2` (`studNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formative`
--
ALTER TABLE `formative`
  MODIFY `formID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `runavg`
--
ALTER TABLE `runavg`
  MODIFY `runAvgID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soitprogram`
--
ALTER TABLE `soitprogram`
  MODIFY `programID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `studID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `summative`
--
ALTER TABLE `summative`
  MODIFY `sumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `runavg`
--
ALTER TABLE `runavg`
  ADD CONSTRAINT `runavg_ibfk_1` FOREIGN KEY (`FAavg`) REFERENCES `formative` (`FAavg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_2` FOREIGN KEY (`SAavg`) REFERENCES `summative` (`SAavg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD CONSTRAINT `studentinfo_ibfk_1` FOREIGN KEY (`studProg`) REFERENCES `soitprogram` (`studProg`);

--
-- Constraints for table `summative`
--
ALTER TABLE `summative`
  ADD CONSTRAINT `summative_ibfk_1` FOREIGN KEY (`modID`) REFERENCES `moduleinfo` (`modID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

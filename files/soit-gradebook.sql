-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 03:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soit-gradebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseinfo`
--

CREATE TABLE `courseinfo` (
  `courseID` int(11) NOT NULL,
  `courseCode` varchar(11) NOT NULL,
  `courseTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courseinfo`
--

INSERT INTO `courseinfo` (`courseID`, `courseCode`, `courseTitle`) VALUES
(2, 'IT154-8', 'OPERATING SYSTEMS');

-- --------------------------------------------------------

--
-- Table structure for table `formative`
--

CREATE TABLE `formative` (
  `formID` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `modNum` int(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `section` varchar(4) NOT NULL,
  `FA1` int(4) NOT NULL DEFAULT 0,
  `FA2` int(4) NOT NULL DEFAULT 0,
  `FA3` int(4) NOT NULL DEFAULT 0,
  `FA4` int(4) NOT NULL DEFAULT 0,
  `FA5` int(4) NOT NULL DEFAULT 0,
  `FA6` int(4) NOT NULL DEFAULT 0,
  `FA7` int(4) NOT NULL DEFAULT 0,
  `FA8` int(4) NOT NULL DEFAULT 0,
  `FA9` int(4) NOT NULL DEFAULT 0,
  `FA10` int(4) NOT NULL DEFAULT 0,
  `FAavg` decimal(5,2) NOT NULL,
  `40per` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maxscore`
--

CREATE TABLE `maxscore` (
  `msID` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `modNum` int(1) NOT NULL,
  `SA1max` int(4) NOT NULL DEFAULT 1,
  `SA2max` int(4) NOT NULL DEFAULT 1,
  `SA3max` int(4) NOT NULL DEFAULT 1,
  `FA1max` int(4) NOT NULL DEFAULT 1,
  `FA2max` int(4) NOT NULL DEFAULT 1,
  `FA3max` int(4) NOT NULL DEFAULT 1,
  `FA4max` int(4) DEFAULT 1,
  `FA5max` int(4) NOT NULL DEFAULT 1,
  `FA6max` int(4) NOT NULL DEFAULT 1,
  `FA7max` int(4) NOT NULL DEFAULT 1,
  `FA8max` int(4) NOT NULL DEFAULT 1,
  `FA9max` int(4) NOT NULL DEFAULT 1,
  `FA10max` int(4) NOT NULL DEFAULT 1,
  `60per` decimal(5,2) NOT NULL DEFAULT 0.00,
  `40per` decimal(5,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maxscore`
--

INSERT INTO `maxscore` (`msID`, `courseCode`, `modNum`, `SA1max`, `SA2max`, `SA3max`, `FA1max`, `FA2max`, `FA3max`, `FA4max`, `FA5max`, `FA6max`, `FA7max`, `FA8max`, `FA9max`, `FA10max`, `60per`, `40per`) VALUES
(4, 'IT154-8', 1, 100, 1, 1, 50, 40, 40, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00),
(5, 'IT154-8', 2, 50, 100, 1, 50, 50, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00),
(6, 'IT154-8', 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `moduleinfo`
--

CREATE TABLE `moduleinfo` (
  `modID` int(11) NOT NULL,
  `modNum` int(1) NOT NULL,
  `modName` varchar(255) NOT NULL,
  `courseCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moduleinfo`
--

INSERT INTO `moduleinfo` (`modID`, `modNum`, `modName`, `courseCode`) VALUES
(4, 1, 'Big Data', 'IT154-8'),
(5, 2, 'Tools and Platforms', 'IT154-8'),
(6, 3, 'Data Analysis', 'IT154-8');

-- --------------------------------------------------------

--
-- Table structure for table `runavg`
--

CREATE TABLE `runavg` (
  `raID` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `modNum` int(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `section` varchar(4) NOT NULL,
  `studProg` varchar(4) NOT NULL,
  `SAavg` decimal(5,2) NOT NULL,
  `FAavg` decimal(5,2) NOT NULL,
  `60per` decimal(5,2) NOT NULL,
  `40per` decimal(5,2) NOT NULL,
  `grade` decimal(5,2) NOT NULL,
  `transmutation` varchar(4) NOT NULL DEFAULT 'IP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soitprogram`
--

CREATE TABLE `soitprogram` (
  `programID` int(11) NOT NULL,
  `studProg` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `courseCode` varchar(11) NOT NULL,
  `section` varchar(4) NOT NULL,
  `studProg` varchar(4) NOT NULL DEFAULT 'CS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `summative`
--

CREATE TABLE `summative` (
  `sumID` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `modNum` int(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `section` varchar(4) NOT NULL,
  `SA1` int(4) NOT NULL DEFAULT 0,
  `SA2` int(4) NOT NULL DEFAULT 0,
  `SA3` int(4) NOT NULL DEFAULT 0,
  `SAavg` decimal(5,2) NOT NULL,
  `60per` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblamt`
--

CREATE TABLE `tblamt` (
  `id` int(11) NOT NULL,
  `modNum` int(1) NOT NULL,
  `courseCode` varchar(11) NOT NULL,
  `SAamt` int(2) NOT NULL DEFAULT 3,
  `FAamt` int(2) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transmutation`
--

CREATE TABLE `transmutation` (
  `transID` int(11) NOT NULL,
  `transmutation` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transmutation`
--

INSERT INTO `transmutation` (`transID`, `transmutation`) VALUES
(1, '1.00'),
(2, '1.25'),
(3, '1.50'),
(4, '1.75'),
(5, '2.00'),
(6, '2.25'),
(7, '2.50'),
(8, '2.75'),
(9, '3.00'),
(10, 'I'),
(11, 'IP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courseinfo`
--
ALTER TABLE `courseinfo`
  ADD PRIMARY KEY (`courseID`),
  ADD UNIQUE KEY `courseCode` (`courseCode`);

--
-- Indexes for table `formative`
--
ALTER TABLE `formative`
  ADD PRIMARY KEY (`formID`),
  ADD KEY `40per` (`40per`),
  ADD KEY `FAavg` (`FAavg`),
  ADD KEY `courseCode` (`courseCode`),
  ADD KEY `modNum` (`modNum`),
  ADD KEY `username` (`username`),
  ADD KEY `section` (`section`);

--
-- Indexes for table `maxscore`
--
ALTER TABLE `maxscore`
  ADD PRIMARY KEY (`msID`),
  ADD KEY `courseCode` (`courseCode`);

--
-- Indexes for table `moduleinfo`
--
ALTER TABLE `moduleinfo`
  ADD PRIMARY KEY (`modID`),
  ADD KEY `courseCode` (`courseCode`),
  ADD KEY `modNum` (`modNum`);

--
-- Indexes for table `runavg`
--
ALTER TABLE `runavg`
  ADD PRIMARY KEY (`raID`),
  ADD KEY `courseCode` (`courseCode`),
  ADD KEY `username` (`username`),
  ADD KEY `section` (`section`),
  ADD KEY `40per` (`40per`),
  ADD KEY `60per` (`60per`),
  ADD KEY `SAavg` (`SAavg`),
  ADD KEY `FAavg` (`FAavg`),
  ADD KEY `transmutation` (`transmutation`),
  ADD KEY `studProg` (`studProg`),
  ADD KEY `modNum` (`modNum`);

--
-- Indexes for table `soitprogram`
--
ALTER TABLE `soitprogram`
  ADD PRIMARY KEY (`programID`),
  ADD UNIQUE KEY `studProg` (`studProg`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`studID`),
  ADD KEY `courseCode` (`courseCode`),
  ADD KEY `studProg` (`studProg`),
  ADD KEY `section` (`section`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE;

--
-- Indexes for table `summative`
--
ALTER TABLE `summative`
  ADD PRIMARY KEY (`sumID`),
  ADD KEY `60per` (`60per`),
  ADD KEY `SAavg` (`SAavg`),
  ADD KEY `courseCode` (`courseCode`),
  ADD KEY `modNum` (`modNum`),
  ADD KEY `username` (`username`),
  ADD KEY `section` (`section`);

--
-- Indexes for table `tblamt`
--
ALTER TABLE `tblamt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modNum` (`modNum`),
  ADD KEY `courseCode` (`courseCode`);

--
-- Indexes for table `transmutation`
--
ALTER TABLE `transmutation`
  ADD PRIMARY KEY (`transID`),
  ADD UNIQUE KEY `transmutation` (`transmutation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courseinfo`
--
ALTER TABLE `courseinfo`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formative`
--
ALTER TABLE `formative`
  MODIFY `formID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3385;

--
-- AUTO_INCREMENT for table `maxscore`
--
ALTER TABLE `maxscore`
  MODIFY `msID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `moduleinfo`
--
ALTER TABLE `moduleinfo`
  MODIFY `modID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `runavg`
--
ALTER TABLE `runavg`
  MODIFY `raID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2279;

--
-- AUTO_INCREMENT for table `soitprogram`
--
ALTER TABLE `soitprogram`
  MODIFY `programID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `studID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=868;

--
-- AUTO_INCREMENT for table `summative`
--
ALTER TABLE `summative`
  MODIFY `sumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3389;

--
-- AUTO_INCREMENT for table `tblamt`
--
ALTER TABLE `tblamt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transmutation`
--
ALTER TABLE `transmutation`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formative`
--
ALTER TABLE `formative`
  ADD CONSTRAINT `formative_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `courseinfo` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formative_ibfk_2` FOREIGN KEY (`modNum`) REFERENCES `moduleinfo` (`modNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formative_ibfk_3` FOREIGN KEY (`username`) REFERENCES `studentinfo` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formative_ibfk_4` FOREIGN KEY (`section`) REFERENCES `studentinfo` (`section`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maxscore`
--
ALTER TABLE `maxscore`
  ADD CONSTRAINT `maxscore_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `courseinfo` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moduleinfo`
--
ALTER TABLE `moduleinfo`
  ADD CONSTRAINT `moduleinfo_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `courseinfo` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `runavg`
--
ALTER TABLE `runavg`
  ADD CONSTRAINT `runavg_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `courseinfo` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_10` FOREIGN KEY (`modNum`) REFERENCES `moduleinfo` (`modNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_2` FOREIGN KEY (`username`) REFERENCES `studentinfo` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_3` FOREIGN KEY (`section`) REFERENCES `studentinfo` (`section`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_4` FOREIGN KEY (`40per`) REFERENCES `formative` (`40per`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_5` FOREIGN KEY (`60per`) REFERENCES `summative` (`60per`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_6` FOREIGN KEY (`SAavg`) REFERENCES `summative` (`SAavg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_7` FOREIGN KEY (`FAavg`) REFERENCES `formative` (`FAavg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_8` FOREIGN KEY (`transmutation`) REFERENCES `transmutation` (`transmutation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_9` FOREIGN KEY (`studProg`) REFERENCES `soitprogram` (`studProg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD CONSTRAINT `studentinfo_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `courseinfo` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentinfo_ibfk_2` FOREIGN KEY (`studProg`) REFERENCES `soitprogram` (`studProg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `summative`
--
ALTER TABLE `summative`
  ADD CONSTRAINT `summative_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `courseinfo` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `summative_ibfk_2` FOREIGN KEY (`modNum`) REFERENCES `moduleinfo` (`modNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `summative_ibfk_3` FOREIGN KEY (`username`) REFERENCES `studentinfo` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `summative_ibfk_4` FOREIGN KEY (`section`) REFERENCES `studentinfo` (`section`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblamt`
--
ALTER TABLE `tblamt`
  ADD CONSTRAINT `tblamt_ibfk_1` FOREIGN KEY (`modNum`) REFERENCES `moduleinfo` (`modNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblamt_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `courseinfo` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

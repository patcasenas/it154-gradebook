-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 02:53 AM
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
-- Database: `soit-gradebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseinfo`
--

CREATE TABLE `courseinfo` (
  `courseID` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `courseTitle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `formative`
--

CREATE TABLE `formative` (
  `formID` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `modNum` int(1) NOT NULL,
  `studNum` int(11) NOT NULL,
  `FA1` int(4) NOT NULL,
  `FA2` int(4) NOT NULL,
  `FA3` int(4) NOT NULL,
  `FA4` int(4) NOT NULL,
  `FA5` int(4) NOT NULL,
  `FA6` int(4) NOT NULL,
  `FA7` int(4) NOT NULL,
  `FA8` int(4) NOT NULL,
  `FA9` int(4) NOT NULL,
  `FA10` int(4) NOT NULL,
  `FAavg` decimal(5,2) NOT NULL,
  `40per` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `maxscore`
--

CREATE TABLE `maxscore` (
  `msID` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `modNum` int(1) NOT NULL,
  `SA1max` int(3) NOT NULL DEFAULT 1,
  `SA2max` int(3) NOT NULL DEFAULT 1,
  `SA3max` int(3) NOT NULL DEFAULT 1,
  `60per` decimal(3,2) NOT NULL DEFAULT 0.00,
  `FA1max` int(3) NOT NULL DEFAULT 1,
  `FA2max` int(3) NOT NULL DEFAULT 1,
  `FA3max` int(3) NOT NULL DEFAULT 1,
  `FA4max` int(3) NOT NULL DEFAULT 1,
  `FA5max` int(3) NOT NULL DEFAULT 1,
  `FA6max` int(3) NOT NULL DEFAULT 1,
  `FA7max` int(3) NOT NULL DEFAULT 1,
  `FA8max` int(3) NOT NULL DEFAULT 1,
  `FA9max` int(3) NOT NULL DEFAULT 1,
  `FA10max` int(3) NOT NULL DEFAULT 1,
  `40per` decimal(4,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `moduleinfo`
--

CREATE TABLE `moduleinfo` (
  `modID` int(11) NOT NULL,
  `modNum` int(1) NOT NULL,
  `modName` text NOT NULL,
  `courseCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `runavg`
--

CREATE TABLE `runavg` (
  `raID` int(11) NOT NULL,
  `studNum` int(10) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `section` varchar(4) NOT NULL,
  `studProg` varchar(4) NOT NULL,
  `modNum` int(1) NOT NULL,
  `SAavg` decimal(5,2) NOT NULL,
  `FAavg` decimal(5,2) NOT NULL,
  `60per` decimal(5,2) NOT NULL,
  `40per` decimal(5,2) NOT NULL,
  `grade` decimal(5,2) NOT NULL,
  `transmutation` varchar(5) NOT NULL
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
  `username` tinytext NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `studProg` varchar(3) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `section` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `summative`
--

CREATE TABLE `summative` (
  `sumID` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `modNum` int(1) NOT NULL,
  `studNum` int(10) NOT NULL,
  `SA1` int(4) NOT NULL,
  `SA2` int(4) NOT NULL,
  `SA3` int(4) NOT NULL,
  `SAavg` decimal(5,2) NOT NULL,
  `60per` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblamt`
--

CREATE TABLE `tblamt` (
  `id` int(11) NOT NULL,
  `modNum` int(1) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `SAamt` int(2) NOT NULL DEFAULT 3,
  `FAamt` int(2) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transmutation`
--

CREATE TABLE `transmutation` (
  `transID` int(11) NOT NULL,
  `transmutation` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transmutation`
--

INSERT INTO `transmutation` (`transID`, `transmutation`) VALUES
(3, '1.00'),
(4, '1.25'),
(5, '1.50'),
(6, '1.75'),
(7, '2.00'),
(8, '2.25'),
(9, '2.50'),
(10, '2.75'),
(11, '3.00'),
(12, 'I'),
(13, 'IP');

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
  ADD KEY `modNum` (`modNum`),
  ADD KEY `FAavg` (`FAavg`),
  ADD KEY `40per` (`40per`),
  ADD KEY `formative_ibfk_1` (`courseCode`),
  ADD KEY `formative_ibfk_3` (`studNum`);

--
-- Indexes for table `maxscore`
--
ALTER TABLE `maxscore`
  ADD PRIMARY KEY (`msID`),
  ADD KEY `maxscore_ibfk_2` (`courseCode`),
  ADD KEY `modNum` (`modNum`);

--
-- Indexes for table `moduleinfo`
--
ALTER TABLE `moduleinfo`
  ADD PRIMARY KEY (`modID`),
  ADD KEY `modNum` (`modNum`),
  ADD KEY `moduleinfo_ibfk_1` (`courseCode`);

--
-- Indexes for table `runavg`
--
ALTER TABLE `runavg`
  ADD PRIMARY KEY (`raID`),
  ADD KEY `modNum` (`modNum`),
  ADD KEY `runavg_ibfk_1` (`courseCode`),
  ADD KEY `runavg_ibfk_3` (`studNum`),
  ADD KEY `runavg_ibfk_4` (`studProg`),
  ADD KEY `runavg_ibfk_5` (`SAavg`),
  ADD KEY `runavg_ibfk_6` (`FAavg`),
  ADD KEY `runavg_ibfk_7` (`60per`),
  ADD KEY `runavg_ibfk_8` (`40per`),
  ADD KEY `runavg_ibfk_9` (`transmutation`);

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
  ADD KEY `programName` (`studProg`) USING BTREE,
  ADD KEY `section` (`section`),
  ADD KEY `courseCode` (`courseCode`),
  ADD KEY `studNum` (`studNum`);

--
-- Indexes for table `summative`
--
ALTER TABLE `summative`
  ADD PRIMARY KEY (`sumID`),
  ADD KEY `modNum` (`modNum`),
  ADD KEY `SAavg` (`SAavg`),
  ADD KEY `60per` (`60per`),
  ADD KEY `summative_ibfk_1` (`studNum`),
  ADD KEY `summative_ibfk_2` (`courseCode`);

--
-- Indexes for table `tblamt`
--
ALTER TABLE `tblamt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modID` (`modNum`),
  ADD KEY `courseCode` (`courseCode`);

--
-- Indexes for table `transmutation`
--
ALTER TABLE `transmutation`
  ADD PRIMARY KEY (`transID`),
  ADD KEY `transmutation` (`transmutation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courseinfo`
--
ALTER TABLE `courseinfo`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `formative`
--
ALTER TABLE `formative`
  MODIFY `formID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `maxscore`
--
ALTER TABLE `maxscore`
  MODIFY `msID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `moduleinfo`
--
ALTER TABLE `moduleinfo`
  MODIFY `modID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `runavg`
--
ALTER TABLE `runavg`
  MODIFY `raID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soitprogram`
--
ALTER TABLE `soitprogram`
  MODIFY `programID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `studID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `summative`
--
ALTER TABLE `summative`
  MODIFY `sumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tblamt`
--
ALTER TABLE `tblamt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `transmutation`
--
ALTER TABLE `transmutation`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formative`
--
ALTER TABLE `formative`
  ADD CONSTRAINT `formative_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `courseinfo` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formative_ibfk_3` FOREIGN KEY (`studNum`) REFERENCES `studentinfo` (`studNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maxscore`
--
ALTER TABLE `maxscore`
  ADD CONSTRAINT `maxscore_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `courseinfo` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maxscore_ibfk_3` FOREIGN KEY (`modNum`) REFERENCES `moduleinfo` (`modNum`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `runavg_ibfk_3` FOREIGN KEY (`studNum`) REFERENCES `studentinfo` (`studNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_4` FOREIGN KEY (`studProg`) REFERENCES `studentinfo` (`studProg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_5` FOREIGN KEY (`SAavg`) REFERENCES `summative` (`SAavg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_6` FOREIGN KEY (`FAavg`) REFERENCES `formative` (`FAavg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_7` FOREIGN KEY (`60per`) REFERENCES `summative` (`60per`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_8` FOREIGN KEY (`40per`) REFERENCES `formative` (`40per`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_9` FOREIGN KEY (`transmutation`) REFERENCES `transmutation` (`transmutation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD CONSTRAINT `studentinfo_ibfk_1` FOREIGN KEY (`studProg`) REFERENCES `soitprogram` (`studProg`),
  ADD CONSTRAINT `studentinfo_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `courseinfo` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `summative`
--
ALTER TABLE `summative`
  ADD CONSTRAINT `summative_ibfk_1` FOREIGN KEY (`studNum`) REFERENCES `studentinfo` (`studNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `summative_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `courseinfo` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

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

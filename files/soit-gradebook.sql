-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 07:22 PM
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

--
-- Dumping data for table `courseinfo`
--

INSERT INTO `courseinfo` (`courseID`, `courseCode`, `courseTitle`) VALUES
(1, 'IT154-8', 'OPERATING SYSTEMS');

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

--
-- Dumping data for table `formative`
--

INSERT INTO `formative` (`formID`, `courseCode`, `modNum`, `studNum`, `FA1`, `FA2`, `FA3`, `FA4`, `FA5`, `FA6`, `FA7`, `FA8`, `FA9`, `FA10`, `FAavg`, `40per`) VALUES
(1, 'IT154-8', 1, 2018115334, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(2, 'IT154-8', 2, 2018115334, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(3, 'IT154-8', 3, 2018115334, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(4, 'IT154-8', 1, 2018115335, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(5, 'IT154-8', 2, 2018115335, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(6, 'IT154-8', 3, 2018115335, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(7, 'IT154-8', 1, 2018115336, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(8, 'IT154-8', 2, 2018115336, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(9, 'IT154-8', 3, 2018115336, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(10, 'IT154-8', 1, 2018115337, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(11, 'IT154-8', 2, 2018115337, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(12, 'IT154-8', 3, 2018115337, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(13, 'IT154-8', 1, 2018115338, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(14, 'IT154-8', 2, 2018115338, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(15, 'IT154-8', 3, 2018115338, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(16, 'IT154-8', 1, 2018115339, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(17, 'IT154-8', 2, 2018115339, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(18, 'IT154-8', 3, 2018115339, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(19, 'IT154-8', 1, 2018115340, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(20, 'IT154-8', 2, 2018115340, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(21, 'IT154-8', 3, 2018115340, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(22, 'IT154-8', 1, 2018115341, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(23, 'IT154-8', 2, 2018115341, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(24, 'IT154-8', 3, 2018115341, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(25, 'IT154-8', 1, 2018115342, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(26, 'IT154-8', 2, 2018115342, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(27, 'IT154-8', 3, 2018115342, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(28, 'IT154-8', 1, 2018115343, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(29, 'IT154-8', 2, 2018115343, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(30, 'IT154-8', 3, 2018115343, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(31, 'IT154-8', 1, 2018115344, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(32, 'IT154-8', 2, 2018115344, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(33, 'IT154-8', 3, 2018115344, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(34, 'IT154-8', 1, 2018115345, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(35, 'IT154-8', 2, 2018115345, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(36, 'IT154-8', 3, 2018115345, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(37, 'IT154-8', 1, 2018115346, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(38, 'IT154-8', 2, 2018115346, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(39, 'IT154-8', 3, 2018115346, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(40, 'IT154-8', 1, 2018115347, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(41, 'IT154-8', 2, 2018115347, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(42, 'IT154-8', 3, 2018115347, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(43, 'IT154-8', 1, 2018115348, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(44, 'IT154-8', 2, 2018115348, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(45, 'IT154-8', 3, 2018115348, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(46, 'IT154-8', 1, 2018115349, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(47, 'IT154-8', 2, 2018115349, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(48, 'IT154-8', 3, 2018115349, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(49, 'IT154-8', 1, 2018115350, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(50, 'IT154-8', 2, 2018115350, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(51, 'IT154-8', 3, 2018115350, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(52, 'IT154-8', 1, 2018115351, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(53, 'IT154-8', 2, 2018115351, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(54, 'IT154-8', 3, 2018115351, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(55, 'IT154-8', 1, 2018115352, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(56, 'IT154-8', 2, 2018115352, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(57, 'IT154-8', 3, 2018115352, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(58, 'IT154-8', 1, 2018115353, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(59, 'IT154-8', 2, 2018115353, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(60, 'IT154-8', 3, 2018115353, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(61, 'IT154-8', 1, 2018115354, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(62, 'IT154-8', 2, 2018115354, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(63, 'IT154-8', 3, 2018115354, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(64, 'IT154-8', 1, 2018115355, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(65, 'IT154-8', 2, 2018115355, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(66, 'IT154-8', 3, 2018115355, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(67, 'IT154-8', 1, 2018115356, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(68, 'IT154-8', 2, 2018115356, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(69, 'IT154-8', 3, 2018115356, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(70, 'IT154-8', 1, 2018115357, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(71, 'IT154-8', 2, 2018115357, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(72, 'IT154-8', 3, 2018115357, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(73, 'IT154-8', 1, 2018115358, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(74, 'IT154-8', 2, 2018115358, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(75, 'IT154-8', 3, 2018115358, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(76, 'IT154-8', 1, 2018115359, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(77, 'IT154-8', 2, 2018115359, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(78, 'IT154-8', 3, 2018115359, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(79, 'IT154-8', 1, 2018115360, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(80, 'IT154-8', 2, 2018115360, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(81, 'IT154-8', 3, 2018115360, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(82, 'IT154-8', 1, 2018115361, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(83, 'IT154-8', 2, 2018115361, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(84, 'IT154-8', 3, 2018115361, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(85, 'IT154-8', 1, 2018115362, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(86, 'IT154-8', 2, 2018115362, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(87, 'IT154-8', 3, 2018115362, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(88, 'IT154-8', 1, 2018115363, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(89, 'IT154-8', 2, 2018115363, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(90, 'IT154-8', 3, 2018115363, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(91, 'IT154-8', 1, 2018115364, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(92, 'IT154-8', 2, 2018115364, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(93, 'IT154-8', 3, 2018115364, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(94, 'IT154-8', 1, 2018115365, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(95, 'IT154-8', 2, 2018115365, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(96, 'IT154-8', 3, 2018115365, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(97, 'IT154-8', 1, 2018115366, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(98, 'IT154-8', 2, 2018115366, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(99, 'IT154-8', 3, 2018115366, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(100, 'IT154-8', 1, 2018115367, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(101, 'IT154-8', 2, 2018115367, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(102, 'IT154-8', 3, 2018115367, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(103, 'IT154-8', 1, 2018115368, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(104, 'IT154-8', 2, 2018115368, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00'),
(105, 'IT154-8', 3, 2018115368, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00');

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

--
-- Dumping data for table `maxscore`
--

INSERT INTO `maxscore` (`msID`, `courseCode`, `modNum`, `SA1max`, `SA2max`, `SA3max`, `60per`, `FA1max`, `FA2max`, `FA3max`, `FA4max`, `FA5max`, `FA6max`, `FA7max`, `FA8max`, `FA9max`, `FA10max`, `40per`) VALUES
(40, 'IT154-8', 1, 10, 1, 1, '0.00', 20, 30, 1, 1, 1, 1, 1, 1, 1, 1, '0.00'),
(41, 'IT154-8', 2, 1, 1, 1, '0.00', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '0.00'),
(42, 'IT154-8', 3, 1, 1, 1, '0.00', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '0.00');

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

--
-- Dumping data for table `moduleinfo`
--

INSERT INTO `moduleinfo` (`modID`, `modNum`, `modName`, `courseCode`) VALUES
(40, 1, 'Big Data', 'IT154-8'),
(41, 2, 'Tools and Platforms', 'IT154-8'),
(42, 3, 'Data Analysis', 'IT154-8');

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

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`studID`, `studNum`, `username`, `lastName`, `firstName`, `studProg`, `courseCode`, `section`) VALUES
(1, 2018115334, '1@email.com', 'PASCUAL', 'joshua', 'CS', 'IT154-8', 'BM5'),
(2, 2018115335, '2@email.com', 'SANTOS', 'meg', 'IS', 'IT154-8', 'BM4'),
(3, 2018115336, '3@email.com', 'JAY', 'pauline', 'IS', 'IT154-8', 'BM6'),
(4, 2018115337, '4@email.com', 'PALA', 'ynigo', 'EMC', 'IT154-8', 'BM1'),
(5, 2018115338, '5@email.com', 'ICARO', 'pat', 'CS', 'IT154-8', 'AT1'),
(6, 2018115339, '6@email.com', 'CASENAS', 'anne', 'IT', 'IT154-8', 'AT2'),
(7, 2018115340, '7@email.com', 'CLIFTON', 'test', 'CS', 'IT154-8', 'BM5'),
(8, 2018115341, '8@email.com', 'ADMIN', 'mar', 'IS', 'IT154-8', 'BM4'),
(9, 2018115342, '9@email.com', 'ADMOR', 'feb', 'IS', 'IT154-8', 'BM6'),
(10, 2018115343, '10@email.com', 'AMOR', 'jun', 'EMC', 'IT154-8', 'BM1'),
(11, 2018115344, '11@email.com', 'LIST', 'jan', 'CS', 'IT154-8', 'AT3'),
(12, 2018115345, '12@email.com', 'POE', 'fri', 'IT', 'IT154-8', 'AT4'),
(13, 2018115346, '13@email.com', 'MARCO', 'thur', 'CS', 'IT154-8', 'BM5'),
(14, 2018115347, '14@email.com', 'POLLY', 'wed', 'IS', 'IT154-8', 'BM4'),
(15, 2018115348, '15@email.com', 'FILO', 'mon', 'IS', 'IT154-8', 'BM6'),
(16, 2018115349, '16@email.com', 'HILA', 'tue', 'EMC', 'IT154-8', 'BM1'),
(17, 2018115350, '17@email.com', 'CONRAD', 'mos', 'CS', 'IT154-8', 'BM5'),
(18, 2018115351, '18@email.com', 'SMITH', 'pok', 'IT', 'IT154-8', 'BM4'),
(19, 2018115352, '19@email.com', 'JOHN', 'pol', 'CS', 'IT154-8', 'BM6'),
(20, 2018115353, '20@email.com', 'LILLI', 'kol', 'IS', 'IT154-8', 'BM1'),
(21, 2018115354, '21@email.com', 'POLA', 'loo', 'IS', 'IT154-8', 'AT3'),
(22, 2018115355, '22@email.com', 'POIT', 'moo', 'EMC', 'IT154-8', 'AT4'),
(23, 2018115356, '23@email.com', 'LOIUS', 'hoo', 'CS', 'IT154-8', 'BM5'),
(24, 2018115357, '24@email.com', 'AMEN', 'too', 'IT', 'IT154-8', 'BM4'),
(25, 2018115358, '25@email.com', 'ADER', 'foo', 'CS', 'IT154-8', 'BM6'),
(26, 2018115359, '26@email.com', 'UNDER', 'roo', 'IS', 'IT154-8', 'BM1'),
(27, 2018115360, '27@email.com', 'HELL', 'doo', 'IS', 'IT154-8', 'AT5'),
(28, 2018115361, '28@email.com', 'HIK', 'mix', 'EMC', 'IT154-8', 'BM5'),
(29, 2018115362, '29@email.com', 'JIL', 'lilly', 'CS', 'IT154-8', 'BM4'),
(30, 2018115363, '30@email.com', 'MILL', 'poo', 'IT', 'IT154-8', 'BM6'),
(31, 2018115364, '31@email.com', 'FILL', 'div', 'CS', 'IT154-8', 'BM1'),
(32, 2018115365, '32@email.com', 'FECK', 'mult', 'IS', 'IT154-8', 'AT3'),
(33, 2018115366, '33@email.com', 'VANDER', 'add', 'IS', 'IT154-8', 'AT4'),
(34, 2018115367, '34@email.com', 'JIN', 'sum', 'EMC', 'IT154-8', 'BM5'),
(35, 2018115368, '35@email.com', 'VI', 'jinx', 'CS', 'IT154-8', 'BM4');

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

--
-- Dumping data for table `summative`
--

INSERT INTO `summative` (`sumID`, `courseCode`, `modNum`, `studNum`, `SA1`, `SA2`, `SA3`, `SAavg`, `60per`) VALUES
(1, 'IT154-8', 1, 2018115334, 0, 0, 0, '0.00', '0.00'),
(2, 'IT154-8', 2, 2018115334, 0, 0, 0, '0.00', '0.00'),
(3, 'IT154-8', 3, 2018115334, 0, 0, 0, '0.00', '0.00'),
(4, 'IT154-8', 1, 2018115335, 0, 0, 0, '0.00', '0.00'),
(5, 'IT154-8', 2, 2018115335, 0, 0, 0, '0.00', '0.00'),
(6, 'IT154-8', 3, 2018115335, 0, 0, 0, '0.00', '0.00'),
(7, 'IT154-8', 1, 2018115336, 0, 0, 0, '0.00', '0.00'),
(8, 'IT154-8', 2, 2018115336, 0, 0, 0, '0.00', '0.00'),
(9, 'IT154-8', 3, 2018115336, 0, 0, 0, '0.00', '0.00'),
(10, 'IT154-8', 1, 2018115337, 0, 0, 0, '0.00', '0.00'),
(11, 'IT154-8', 2, 2018115337, 0, 0, 0, '0.00', '0.00'),
(12, 'IT154-8', 3, 2018115337, 0, 0, 0, '0.00', '0.00'),
(13, 'IT154-8', 1, 2018115338, 0, 0, 0, '0.00', '0.00'),
(14, 'IT154-8', 2, 2018115338, 0, 0, 0, '0.00', '0.00'),
(15, 'IT154-8', 3, 2018115338, 0, 0, 0, '0.00', '0.00'),
(16, 'IT154-8', 1, 2018115339, 0, 0, 0, '0.00', '0.00'),
(17, 'IT154-8', 2, 2018115339, 0, 0, 0, '0.00', '0.00'),
(18, 'IT154-8', 3, 2018115339, 0, 0, 0, '0.00', '0.00'),
(19, 'IT154-8', 1, 2018115340, 0, 0, 0, '0.00', '0.00'),
(20, 'IT154-8', 2, 2018115340, 0, 0, 0, '0.00', '0.00'),
(21, 'IT154-8', 3, 2018115340, 0, 0, 0, '0.00', '0.00'),
(22, 'IT154-8', 1, 2018115341, 0, 0, 0, '0.00', '0.00'),
(23, 'IT154-8', 2, 2018115341, 0, 0, 0, '0.00', '0.00'),
(24, 'IT154-8', 3, 2018115341, 0, 0, 0, '0.00', '0.00'),
(25, 'IT154-8', 1, 2018115342, 0, 0, 0, '0.00', '0.00'),
(26, 'IT154-8', 2, 2018115342, 0, 0, 0, '0.00', '0.00'),
(27, 'IT154-8', 3, 2018115342, 0, 0, 0, '0.00', '0.00'),
(28, 'IT154-8', 1, 2018115343, 0, 0, 0, '0.00', '0.00'),
(29, 'IT154-8', 2, 2018115343, 0, 0, 0, '0.00', '0.00'),
(30, 'IT154-8', 3, 2018115343, 0, 0, 0, '0.00', '0.00'),
(31, 'IT154-8', 1, 2018115344, 0, 0, 0, '0.00', '0.00'),
(32, 'IT154-8', 2, 2018115344, 0, 0, 0, '0.00', '0.00'),
(33, 'IT154-8', 3, 2018115344, 0, 0, 0, '0.00', '0.00'),
(34, 'IT154-8', 1, 2018115345, 0, 0, 0, '0.00', '0.00'),
(35, 'IT154-8', 2, 2018115345, 0, 0, 0, '0.00', '0.00'),
(36, 'IT154-8', 3, 2018115345, 0, 0, 0, '0.00', '0.00'),
(37, 'IT154-8', 1, 2018115346, 0, 0, 0, '0.00', '0.00'),
(38, 'IT154-8', 2, 2018115346, 0, 0, 0, '0.00', '0.00'),
(39, 'IT154-8', 3, 2018115346, 0, 0, 0, '0.00', '0.00'),
(40, 'IT154-8', 1, 2018115347, 0, 0, 0, '0.00', '0.00'),
(41, 'IT154-8', 2, 2018115347, 0, 0, 0, '0.00', '0.00'),
(42, 'IT154-8', 3, 2018115347, 0, 0, 0, '0.00', '0.00'),
(43, 'IT154-8', 1, 2018115348, 0, 0, 0, '0.00', '0.00'),
(44, 'IT154-8', 2, 2018115348, 0, 0, 0, '0.00', '0.00'),
(45, 'IT154-8', 3, 2018115348, 0, 0, 0, '0.00', '0.00'),
(46, 'IT154-8', 1, 2018115349, 0, 0, 0, '0.00', '0.00'),
(47, 'IT154-8', 2, 2018115349, 0, 0, 0, '0.00', '0.00'),
(48, 'IT154-8', 3, 2018115349, 0, 0, 0, '0.00', '0.00'),
(49, 'IT154-8', 1, 2018115350, 0, 0, 0, '0.00', '0.00'),
(50, 'IT154-8', 2, 2018115350, 0, 0, 0, '0.00', '0.00'),
(51, 'IT154-8', 3, 2018115350, 0, 0, 0, '0.00', '0.00'),
(52, 'IT154-8', 1, 2018115351, 0, 0, 0, '0.00', '0.00'),
(53, 'IT154-8', 2, 2018115351, 0, 0, 0, '0.00', '0.00'),
(54, 'IT154-8', 3, 2018115351, 0, 0, 0, '0.00', '0.00'),
(55, 'IT154-8', 1, 2018115352, 0, 0, 0, '0.00', '0.00'),
(56, 'IT154-8', 2, 2018115352, 0, 0, 0, '0.00', '0.00'),
(57, 'IT154-8', 3, 2018115352, 0, 0, 0, '0.00', '0.00'),
(58, 'IT154-8', 1, 2018115353, 0, 0, 0, '0.00', '0.00'),
(59, 'IT154-8', 2, 2018115353, 0, 0, 0, '0.00', '0.00'),
(60, 'IT154-8', 3, 2018115353, 0, 0, 0, '0.00', '0.00'),
(61, 'IT154-8', 1, 2018115354, 0, 0, 0, '0.00', '0.00'),
(62, 'IT154-8', 2, 2018115354, 0, 0, 0, '0.00', '0.00'),
(63, 'IT154-8', 3, 2018115354, 0, 0, 0, '0.00', '0.00'),
(64, 'IT154-8', 1, 2018115355, 0, 0, 0, '0.00', '0.00'),
(65, 'IT154-8', 2, 2018115355, 0, 0, 0, '0.00', '0.00'),
(66, 'IT154-8', 3, 2018115355, 0, 0, 0, '0.00', '0.00'),
(67, 'IT154-8', 1, 2018115356, 0, 0, 0, '0.00', '0.00'),
(68, 'IT154-8', 2, 2018115356, 0, 0, 0, '0.00', '0.00'),
(69, 'IT154-8', 3, 2018115356, 0, 0, 0, '0.00', '0.00'),
(70, 'IT154-8', 1, 2018115357, 0, 0, 0, '0.00', '0.00'),
(71, 'IT154-8', 2, 2018115357, 0, 0, 0, '0.00', '0.00'),
(72, 'IT154-8', 3, 2018115357, 0, 0, 0, '0.00', '0.00'),
(73, 'IT154-8', 1, 2018115358, 0, 0, 0, '0.00', '0.00'),
(74, 'IT154-8', 2, 2018115358, 0, 0, 0, '0.00', '0.00'),
(75, 'IT154-8', 3, 2018115358, 0, 0, 0, '0.00', '0.00'),
(76, 'IT154-8', 1, 2018115359, 0, 0, 0, '0.00', '0.00'),
(77, 'IT154-8', 2, 2018115359, 0, 0, 0, '0.00', '0.00'),
(78, 'IT154-8', 3, 2018115359, 0, 0, 0, '0.00', '0.00'),
(79, 'IT154-8', 1, 2018115360, 0, 0, 0, '0.00', '0.00'),
(80, 'IT154-8', 2, 2018115360, 0, 0, 0, '0.00', '0.00'),
(81, 'IT154-8', 3, 2018115360, 0, 0, 0, '0.00', '0.00'),
(82, 'IT154-8', 1, 2018115361, 0, 0, 0, '0.00', '0.00'),
(83, 'IT154-8', 2, 2018115361, 0, 0, 0, '0.00', '0.00'),
(84, 'IT154-8', 3, 2018115361, 0, 0, 0, '0.00', '0.00'),
(85, 'IT154-8', 1, 2018115362, 0, 0, 0, '0.00', '0.00'),
(86, 'IT154-8', 2, 2018115362, 0, 0, 0, '0.00', '0.00'),
(87, 'IT154-8', 3, 2018115362, 0, 0, 0, '0.00', '0.00'),
(88, 'IT154-8', 1, 2018115363, 0, 0, 0, '0.00', '0.00'),
(89, 'IT154-8', 2, 2018115363, 0, 0, 0, '0.00', '0.00'),
(90, 'IT154-8', 3, 2018115363, 0, 0, 0, '0.00', '0.00'),
(91, 'IT154-8', 1, 2018115364, 0, 0, 0, '0.00', '0.00'),
(92, 'IT154-8', 2, 2018115364, 0, 0, 0, '0.00', '0.00'),
(93, 'IT154-8', 3, 2018115364, 0, 0, 0, '0.00', '0.00'),
(94, 'IT154-8', 1, 2018115365, 0, 0, 0, '0.00', '0.00'),
(95, 'IT154-8', 2, 2018115365, 0, 0, 0, '0.00', '0.00'),
(96, 'IT154-8', 3, 2018115365, 0, 0, 0, '0.00', '0.00'),
(97, 'IT154-8', 1, 2018115366, 0, 0, 0, '0.00', '0.00'),
(98, 'IT154-8', 2, 2018115366, 0, 0, 0, '0.00', '0.00'),
(99, 'IT154-8', 3, 2018115366, 0, 0, 0, '0.00', '0.00'),
(100, 'IT154-8', 1, 2018115367, 0, 0, 0, '0.00', '0.00'),
(101, 'IT154-8', 2, 2018115367, 0, 0, 0, '0.00', '0.00'),
(102, 'IT154-8', 3, 2018115367, 0, 0, 0, '0.00', '0.00'),
(103, 'IT154-8', 1, 2018115368, 0, 0, 0, '0.00', '0.00'),
(104, 'IT154-8', 2, 2018115368, 0, 0, 0, '0.00', '0.00'),
(105, 'IT154-8', 3, 2018115368, 0, 0, 0, '0.00', '0.00');

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

--
-- Dumping data for table `tblamt`
--

INSERT INTO `tblamt` (`id`, `modNum`, `courseCode`, `SAamt`, `FAamt`) VALUES
(28, 1, 'IT154-8', 1, 2),
(29, 2, 'IT154-8', 3, 10),
(30, 3, 'IT154-8', 3, 10);

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
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `formative`
--
ALTER TABLE `formative`
  MODIFY `formID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `maxscore`
--
ALTER TABLE `maxscore`
  MODIFY `msID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `moduleinfo`
--
ALTER TABLE `moduleinfo`
  MODIFY `modID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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

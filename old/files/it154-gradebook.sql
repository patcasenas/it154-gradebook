-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 09:01 AM
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
-- Table structure for table `courseinfo`
--

CREATE TABLE `courseinfo` (
  `courseinfoID` int(11) NOT NULL,
  `studProg` varchar(3) DEFAULT NULL,
  `schoolYear` varchar(9) NOT NULL,
  `schoolTerm` int(1) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `courseTitle` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseinfo`
--

INSERT INTO `courseinfo` (`courseinfoID`, `studProg`, `schoolYear`, `schoolTerm`, `courseCode`, `courseTitle`) VALUES
(7, 'CS', '2022', 1, 'as', 'as'),
(8, 'CS', '1', 1, 'q', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `formative`
--

CREATE TABLE `formative` (
  `formID` int(11) NOT NULL,
  `modID` int(1) DEFAULT NULL,
  `section` varchar(4) NOT NULL,
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
  `FAavg` decimal(5,2) NOT NULL,
  `40per` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formative`
--

INSERT INTO `formative` (`formID`, `modID`, `section`, `studNum`, `FA1`, `FA2`, `FA3`, `FA4`, `FA5`, `FA6`, `FA7`, `FA8`, `FA9`, `FA10`, `FAavg`, `40per`) VALUES
(106, 1, '', 2018115334, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(107, 2, '', 2018115334, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(108, 3, '', 2018115334, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(109, 1, '', 2018115335, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(110, 2, '', 2018115335, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(111, 3, '', 2018115335, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(112, 1, '', 2018115336, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(113, 2, '', 2018115336, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(114, 3, '', 2018115336, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(115, 1, '', 2018115337, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(116, 2, '', 2018115337, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(117, 3, '', 2018115337, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(118, 1, '', 2018115338, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(119, 2, '', 2018115338, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(120, 3, '', 2018115338, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(121, 1, '', 2018115339, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(122, 2, '', 2018115339, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(123, 3, '', 2018115339, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(124, 1, '', 2018115340, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(125, 2, '', 2018115340, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(126, 3, '', 2018115340, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(127, 1, '', 2018115341, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(128, 2, '', 2018115341, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(129, 3, '', 2018115341, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(130, 1, '', 2018115342, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(131, 2, '', 2018115342, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(132, 3, '', 2018115342, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(133, 1, '', 2018115343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(134, 2, '', 2018115343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(135, 3, '', 2018115343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(136, 1, '', 2018115344, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(137, 2, '', 2018115344, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(138, 3, '', 2018115344, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(139, 1, '', 2018115345, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(140, 2, '', 2018115345, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(141, 3, '', 2018115345, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(142, 1, '', 2018115346, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(143, 2, '', 2018115346, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(144, 3, '', 2018115346, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(145, 1, '', 2018115347, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(146, 2, '', 2018115347, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(147, 3, '', 2018115347, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(148, 1, '', 2018115348, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(149, 2, '', 2018115348, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(150, 3, '', 2018115348, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(151, 1, '', 2018115349, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(152, 2, '', 2018115349, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(153, 3, '', 2018115349, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(154, 1, '', 2018115350, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(155, 2, '', 2018115350, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(156, 3, '', 2018115350, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(157, 1, '', 2018115351, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(158, 2, '', 2018115351, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(159, 3, '', 2018115351, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(160, 1, '', 2018115352, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(161, 2, '', 2018115352, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(162, 3, '', 2018115352, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(163, 1, '', 2018115353, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(164, 2, '', 2018115353, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(165, 3, '', 2018115353, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(166, 1, '', 2018115354, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(167, 2, '', 2018115354, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(168, 3, '', 2018115354, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(169, 1, '', 2018115355, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(170, 2, '', 2018115355, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(171, 3, '', 2018115355, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(172, 1, '', 2018115356, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(173, 2, '', 2018115356, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(174, 3, '', 2018115356, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(175, 1, '', 2018115357, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(176, 2, '', 2018115357, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(177, 3, '', 2018115357, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(178, 1, '', 2018115358, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(179, 2, '', 2018115358, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(180, 3, '', 2018115358, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(181, 1, '', 2018115359, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(182, 2, '', 2018115359, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(183, 3, '', 2018115359, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(184, 1, '', 2018115360, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(185, 2, '', 2018115360, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(186, 3, '', 2018115360, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(187, 1, '', 2018115361, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(188, 2, '', 2018115361, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(189, 3, '', 2018115361, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(190, 1, '', 2018115362, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(191, 2, '', 2018115362, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(192, 3, '', 2018115362, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(193, 1, '', 2018115363, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(194, 2, '', 2018115363, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(195, 3, '', 2018115363, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(196, 1, '', 2018115364, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(197, 2, '', 2018115364, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(198, 3, '', 2018115364, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(199, 1, '', 2018115365, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(200, 2, '', 2018115365, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(201, 3, '', 2018115365, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(202, 1, '', 2018115366, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(203, 2, '', 2018115366, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(204, 3, '', 2018115366, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(205, 1, '', 2018115367, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(206, 2, '', 2018115367, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(207, 3, '', 2018115367, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(208, 1, '', 2018115368, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(209, 2, '', 2018115368, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00'),
(210, 3, '', 2018115368, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `maxscore`
--

CREATE TABLE `maxscore` (
  `SAid` int(11) NOT NULL,
  `modID` int(1) NOT NULL,
  `SA1max` int(3) NOT NULL DEFAULT 1,
  `SA2max` int(3) NOT NULL DEFAULT 1,
  `SA3max` int(3) NOT NULL DEFAULT 1,
  `60per` decimal(3,2) NOT NULL,
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
  `40per` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maxscore`
--

INSERT INTO `maxscore` (`SAid`, `modID`, `SA1max`, `SA2max`, `SA3max`, `60per`, `FA1max`, `FA2max`, `FA3max`, `FA4max`, `FA5max`, `FA6max`, `FA7max`, `FA8max`, `FA9max`, `FA10max`, `40per`) VALUES
(1, 1, 90, 80, 1, '0.00', 10, 30, 20, 30, 50, 1, 1, 1, 1, 1, '0.00'),
(2, 2, 80, 100, 1, '0.00', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '0.00'),
(3, 3, 1, 1, 1, '0.00', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '0.00');

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
  `section` varchar(4) NOT NULL,
  `studProg` varchar(3) NOT NULL,
  `modID` int(11) NOT NULL,
  `SAavg` decimal(5,2) NOT NULL,
  `FAavg` decimal(5,2) NOT NULL,
  `60per` decimal(5,2) NOT NULL,
  `40per` decimal(5,2) NOT NULL,
  `gradeTotal` decimal(5,2) NOT NULL,
  `transmutation` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `runavg`
--

INSERT INTO `runavg` (`runAvgID`, `studNum`, `section`, `studProg`, `modID`, `SAavg`, `FAavg`, `60per`, `40per`, `gradeTotal`, `transmutation`) VALUES
(106, 2018115334, 'BM5', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(107, 2018115334, 'BM5', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(108, 2018115334, 'BM5', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(109, 2018115335, 'BM4', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(110, 2018115335, 'BM4', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(111, 2018115335, 'BM4', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(112, 2018115336, 'BM6', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(113, 2018115336, 'BM6', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(114, 2018115336, 'BM6', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(115, 2018115337, 'BM1', 'EMC', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(116, 2018115337, 'BM1', 'EMC', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(117, 2018115337, 'BM1', 'EMC', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(118, 2018115338, 'AT1', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(119, 2018115338, 'AT1', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(120, 2018115338, 'AT1', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(121, 2018115339, 'AT2', 'IT', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(122, 2018115339, 'AT2', 'IT', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(123, 2018115339, 'AT2', 'IT', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(124, 2018115340, 'BM5', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(125, 2018115340, 'BM5', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(126, 2018115340, 'BM5', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(127, 2018115341, 'BM4', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(128, 2018115341, 'BM4', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(129, 2018115341, 'BM4', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(130, 2018115342, 'BM6', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(131, 2018115342, 'BM6', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(132, 2018115342, 'BM6', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(133, 2018115343, 'BM1', 'EMC', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(134, 2018115343, 'BM1', 'EMC', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(135, 2018115343, 'BM1', 'EMC', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(136, 2018115344, 'AT3', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(137, 2018115344, 'AT3', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(138, 2018115344, 'AT3', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(139, 2018115345, 'AT4', 'IT', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(140, 2018115345, 'AT4', 'IT', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(141, 2018115345, 'AT4', 'IT', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(142, 2018115346, 'BM5', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(143, 2018115346, 'BM5', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(144, 2018115346, 'BM5', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(145, 2018115347, 'BM4', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(146, 2018115347, 'BM4', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(147, 2018115347, 'BM4', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(148, 2018115348, 'BM6', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(149, 2018115348, 'BM6', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(150, 2018115348, 'BM6', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(151, 2018115349, 'BM1', 'EMC', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(152, 2018115349, 'BM1', 'EMC', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(153, 2018115349, 'BM1', 'EMC', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(154, 2018115350, 'BM5', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(155, 2018115350, 'BM5', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(156, 2018115350, 'BM5', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(157, 2018115351, 'BM4', 'IT', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(158, 2018115351, 'BM4', 'IT', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(159, 2018115351, 'BM4', 'IT', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(160, 2018115352, 'BM6', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(161, 2018115352, 'BM6', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(162, 2018115352, 'BM6', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(163, 2018115353, 'BM1', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(164, 2018115353, 'BM1', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(165, 2018115353, 'BM1', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(166, 2018115354, 'AT3', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(167, 2018115354, 'AT3', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(168, 2018115354, 'AT3', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(169, 2018115355, 'AT4', 'EMC', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(170, 2018115355, 'AT4', 'EMC', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(171, 2018115355, 'AT4', 'EMC', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(172, 2018115356, 'BM5', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(173, 2018115356, 'BM5', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(174, 2018115356, 'BM5', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(175, 2018115357, 'BM4', 'IT', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(176, 2018115357, 'BM4', 'IT', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(177, 2018115357, 'BM4', 'IT', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(178, 2018115358, 'BM6', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(179, 2018115358, 'BM6', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(180, 2018115358, 'BM6', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(181, 2018115359, 'BM1', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(182, 2018115359, 'BM1', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(183, 2018115359, 'BM1', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(184, 2018115360, 'AT5', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(185, 2018115360, 'AT5', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(186, 2018115360, 'AT5', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(187, 2018115361, 'BM5', 'EMC', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(188, 2018115361, 'BM5', 'EMC', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(189, 2018115361, 'BM5', 'EMC', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(190, 2018115362, 'BM4', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(191, 2018115362, 'BM4', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(192, 2018115362, 'BM4', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(193, 2018115363, 'BM6', 'IT', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(194, 2018115363, 'BM6', 'IT', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(195, 2018115363, 'BM6', 'IT', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(196, 2018115364, 'BM1', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(197, 2018115364, 'BM1', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(198, 2018115364, 'BM1', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(199, 2018115365, 'AT3', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(200, 2018115365, 'AT3', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(201, 2018115365, 'AT3', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(202, 2018115366, 'AT4', 'IS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(203, 2018115366, 'AT4', 'IS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(204, 2018115366, 'AT4', 'IS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(205, 2018115367, 'BM5', 'EMC', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(206, 2018115367, 'BM5', 'EMC', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(207, 2018115367, 'BM5', 'EMC', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(208, 2018115368, 'BM4', 'CS', 1, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(209, 2018115368, 'BM4', 'CS', 2, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP'),
(210, 2018115368, 'BM4', 'CS', 3, '0.00', '0.00', '0.00', '0.00', '0.00', 'IP');

-- --------------------------------------------------------

--
-- Table structure for table `setupobe`
--

CREATE TABLE `setupobe` (
  `setupobeID` int(11) NOT NULL,
  `CO` text NOT NULL,
  `contribution` varchar(3) NOT NULL,
  `task` tinytext NOT NULL,
  `satisfactory` int(2) NOT NULL,
  `target` int(2) NOT NULL,
  `freq` int(11) NOT NULL,
  `freqper` int(11) NOT NULL,
  `remarks` varchar(6) NOT NULL DEFAULT 'FAILED',
  `recommendation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setupobe`
--

INSERT INTO `setupobe` (`setupobeID`, `CO`, `contribution`, `task`, `satisfactory`, `target`, `freq`, `freqper`, `remarks`, `recommendation`) VALUES
(1, 'a', 'a', 'a', 70, 70, 1, 1, 'FAILED', 'a'),
(2, 'a', 'a', 'a', 70, 70, 1, 1, 'FAILED', 'a'),
(3, 'a', 'a', 'a', 70, 70, 1, 1, 'FAILED', 'a');

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
(36, 2018115334, 'PASCUAL', 'joshua', 'CS', 'BM5'),
(37, 2018115335, 'SANTOS', 'meg', 'IS', 'BM4'),
(38, 2018115336, 'JAY', 'pauline', 'IS', 'BM6'),
(39, 2018115337, 'PALA', 'ynigo', 'EMC', 'BM1'),
(40, 2018115338, 'ICARO', 'pat', 'CS', 'AT1'),
(41, 2018115339, 'CASENAS', 'anne', 'IT', 'AT2'),
(42, 2018115340, 'CLIFTON', 'test', 'CS', 'BM5'),
(43, 2018115341, 'ADMIN', 'mar', 'IS', 'BM4'),
(44, 2018115342, 'ADMOR', 'feb', 'IS', 'BM6'),
(45, 2018115343, 'AMOR', 'jun', 'EMC', 'BM1'),
(46, 2018115344, 'LIST', 'jan', 'CS', 'AT3'),
(47, 2018115345, 'POE', 'fri', 'IT', 'AT4'),
(48, 2018115346, 'MARCO', 'thur', 'CS', 'BM5'),
(49, 2018115347, 'POLLY', 'wed', 'IS', 'BM4'),
(50, 2018115348, 'FILO', 'mon', 'IS', 'BM6'),
(51, 2018115349, 'HILA', 'tue', 'EMC', 'BM1'),
(52, 2018115350, 'CONRAD', 'mos', 'CS', 'BM5'),
(53, 2018115351, 'SMITH', 'pok', 'IT', 'BM4'),
(54, 2018115352, 'JOHN', 'pol', 'CS', 'BM6'),
(55, 2018115353, 'LILLI', 'kol', 'IS', 'BM1'),
(56, 2018115354, 'POLA', 'loo', 'IS', 'AT3'),
(57, 2018115355, 'POIT', 'moo', 'EMC', 'AT4'),
(58, 2018115356, 'LOIUS', 'hoo', 'CS', 'BM5'),
(59, 2018115357, 'AMEN', 'too', 'IT', 'BM4'),
(60, 2018115358, 'ADER', 'foo', 'CS', 'BM6'),
(61, 2018115359, 'UNDER', 'roo', 'IS', 'BM1'),
(62, 2018115360, 'HELL', 'doo', 'IS', 'AT5'),
(63, 2018115361, 'HIK', 'mix', 'EMC', 'BM5'),
(64, 2018115362, 'JIL', 'lilly', 'CS', 'BM4'),
(65, 2018115363, 'MILL', 'poo', 'IT', 'BM6'),
(66, 2018115364, 'FILL', 'div', 'CS', 'BM1'),
(67, 2018115365, 'FECK', 'mult', 'IS', 'AT3'),
(68, 2018115366, 'VANDER', 'add', 'IS', 'AT4'),
(69, 2018115367, 'JIN', 'sum', 'EMC', 'BM5'),
(70, 2018115368, 'VI', 'jinx', 'CS', 'BM4');

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
  `SAavg` decimal(5,2) NOT NULL,
  `60per` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summative`
--

INSERT INTO `summative` (`sumID`, `modID`, `studNum`, `SA1`, `SA2`, `SA3`, `SAavg`, `60per`) VALUES
(106, 1, 2018115334, NULL, NULL, NULL, '0.00', '0.00'),
(107, 2, 2018115334, NULL, NULL, NULL, '0.00', '0.00'),
(108, 3, 2018115334, NULL, NULL, NULL, '0.00', '0.00'),
(109, 1, 2018115335, NULL, NULL, NULL, '0.00', '0.00'),
(110, 2, 2018115335, NULL, NULL, NULL, '0.00', '0.00'),
(111, 3, 2018115335, NULL, NULL, NULL, '0.00', '0.00'),
(112, 1, 2018115336, NULL, NULL, NULL, '0.00', '0.00'),
(113, 2, 2018115336, NULL, NULL, NULL, '0.00', '0.00'),
(114, 3, 2018115336, NULL, NULL, NULL, '0.00', '0.00'),
(115, 1, 2018115337, NULL, NULL, NULL, '0.00', '0.00'),
(116, 2, 2018115337, NULL, NULL, NULL, '0.00', '0.00'),
(117, 3, 2018115337, NULL, NULL, NULL, '0.00', '0.00'),
(118, 1, 2018115338, NULL, NULL, NULL, '0.00', '0.00'),
(119, 2, 2018115338, NULL, NULL, NULL, '0.00', '0.00'),
(120, 3, 2018115338, NULL, NULL, NULL, '0.00', '0.00'),
(121, 1, 2018115339, NULL, NULL, NULL, '0.00', '0.00'),
(122, 2, 2018115339, NULL, NULL, NULL, '0.00', '0.00'),
(123, 3, 2018115339, NULL, NULL, NULL, '0.00', '0.00'),
(124, 1, 2018115340, NULL, NULL, NULL, '0.00', '0.00'),
(125, 2, 2018115340, NULL, NULL, NULL, '0.00', '0.00'),
(126, 3, 2018115340, NULL, NULL, NULL, '0.00', '0.00'),
(127, 1, 2018115341, NULL, NULL, NULL, '0.00', '0.00'),
(128, 2, 2018115341, NULL, NULL, NULL, '0.00', '0.00'),
(129, 3, 2018115341, NULL, NULL, NULL, '0.00', '0.00'),
(130, 1, 2018115342, NULL, NULL, NULL, '0.00', '0.00'),
(131, 2, 2018115342, NULL, NULL, NULL, '0.00', '0.00'),
(132, 3, 2018115342, NULL, NULL, NULL, '0.00', '0.00'),
(133, 1, 2018115343, NULL, NULL, NULL, '0.00', '0.00'),
(134, 2, 2018115343, NULL, NULL, NULL, '0.00', '0.00'),
(135, 3, 2018115343, NULL, NULL, NULL, '0.00', '0.00'),
(136, 1, 2018115344, NULL, NULL, NULL, '0.00', '0.00'),
(137, 2, 2018115344, NULL, NULL, NULL, '0.00', '0.00'),
(138, 3, 2018115344, NULL, NULL, NULL, '0.00', '0.00'),
(139, 1, 2018115345, NULL, NULL, NULL, '0.00', '0.00'),
(140, 2, 2018115345, NULL, NULL, NULL, '0.00', '0.00'),
(141, 3, 2018115345, NULL, NULL, NULL, '0.00', '0.00'),
(142, 1, 2018115346, NULL, NULL, NULL, '0.00', '0.00'),
(143, 2, 2018115346, NULL, NULL, NULL, '0.00', '0.00'),
(144, 3, 2018115346, NULL, NULL, NULL, '0.00', '0.00'),
(145, 1, 2018115347, NULL, NULL, NULL, '0.00', '0.00'),
(146, 2, 2018115347, NULL, NULL, NULL, '0.00', '0.00'),
(147, 3, 2018115347, NULL, NULL, NULL, '0.00', '0.00'),
(148, 1, 2018115348, NULL, NULL, NULL, '0.00', '0.00'),
(149, 2, 2018115348, NULL, NULL, NULL, '0.00', '0.00'),
(150, 3, 2018115348, NULL, NULL, NULL, '0.00', '0.00'),
(151, 1, 2018115349, NULL, NULL, NULL, '0.00', '0.00'),
(152, 2, 2018115349, NULL, NULL, NULL, '0.00', '0.00'),
(153, 3, 2018115349, NULL, NULL, NULL, '0.00', '0.00'),
(154, 1, 2018115350, NULL, NULL, NULL, '0.00', '0.00'),
(155, 2, 2018115350, NULL, NULL, NULL, '0.00', '0.00'),
(156, 3, 2018115350, NULL, NULL, NULL, '0.00', '0.00'),
(157, 1, 2018115351, NULL, NULL, NULL, '0.00', '0.00'),
(158, 2, 2018115351, NULL, NULL, NULL, '0.00', '0.00'),
(159, 3, 2018115351, NULL, NULL, NULL, '0.00', '0.00'),
(160, 1, 2018115352, NULL, NULL, NULL, '0.00', '0.00'),
(161, 2, 2018115352, NULL, NULL, NULL, '0.00', '0.00'),
(162, 3, 2018115352, NULL, NULL, NULL, '0.00', '0.00'),
(163, 1, 2018115353, NULL, NULL, NULL, '0.00', '0.00'),
(164, 2, 2018115353, NULL, NULL, NULL, '0.00', '0.00'),
(165, 3, 2018115353, NULL, NULL, NULL, '0.00', '0.00'),
(166, 1, 2018115354, NULL, NULL, NULL, '0.00', '0.00'),
(167, 2, 2018115354, NULL, NULL, NULL, '0.00', '0.00'),
(168, 3, 2018115354, NULL, NULL, NULL, '0.00', '0.00'),
(169, 1, 2018115355, NULL, NULL, NULL, '0.00', '0.00'),
(170, 2, 2018115355, NULL, NULL, NULL, '0.00', '0.00'),
(171, 3, 2018115355, NULL, NULL, NULL, '0.00', '0.00'),
(172, 1, 2018115356, NULL, NULL, NULL, '0.00', '0.00'),
(173, 2, 2018115356, NULL, NULL, NULL, '0.00', '0.00'),
(174, 3, 2018115356, NULL, NULL, NULL, '0.00', '0.00'),
(175, 1, 2018115357, NULL, NULL, NULL, '0.00', '0.00'),
(176, 2, 2018115357, NULL, NULL, NULL, '0.00', '0.00'),
(177, 3, 2018115357, NULL, NULL, NULL, '0.00', '0.00'),
(178, 1, 2018115358, NULL, NULL, NULL, '0.00', '0.00'),
(179, 2, 2018115358, NULL, NULL, NULL, '0.00', '0.00'),
(180, 3, 2018115358, NULL, NULL, NULL, '0.00', '0.00'),
(181, 1, 2018115359, NULL, NULL, NULL, '0.00', '0.00'),
(182, 2, 2018115359, NULL, NULL, NULL, '0.00', '0.00'),
(183, 3, 2018115359, NULL, NULL, NULL, '0.00', '0.00'),
(184, 1, 2018115360, NULL, NULL, NULL, '0.00', '0.00'),
(185, 2, 2018115360, NULL, NULL, NULL, '0.00', '0.00'),
(186, 3, 2018115360, NULL, NULL, NULL, '0.00', '0.00'),
(187, 1, 2018115361, NULL, NULL, NULL, '0.00', '0.00'),
(188, 2, 2018115361, NULL, NULL, NULL, '0.00', '0.00'),
(189, 3, 2018115361, NULL, NULL, NULL, '0.00', '0.00'),
(190, 1, 2018115362, NULL, NULL, NULL, '0.00', '0.00'),
(191, 2, 2018115362, NULL, NULL, NULL, '0.00', '0.00'),
(192, 3, 2018115362, NULL, NULL, NULL, '0.00', '0.00'),
(193, 1, 2018115363, NULL, NULL, NULL, '0.00', '0.00'),
(194, 2, 2018115363, NULL, NULL, NULL, '0.00', '0.00'),
(195, 3, 2018115363, NULL, NULL, NULL, '0.00', '0.00'),
(196, 1, 2018115364, NULL, NULL, NULL, '0.00', '0.00'),
(197, 2, 2018115364, NULL, NULL, NULL, '0.00', '0.00'),
(198, 3, 2018115364, NULL, NULL, NULL, '0.00', '0.00'),
(199, 1, 2018115365, NULL, NULL, NULL, '0.00', '0.00'),
(200, 2, 2018115365, NULL, NULL, NULL, '0.00', '0.00'),
(201, 3, 2018115365, NULL, NULL, NULL, '0.00', '0.00'),
(202, 1, 2018115366, NULL, NULL, NULL, '0.00', '0.00'),
(203, 2, 2018115366, NULL, NULL, NULL, '0.00', '0.00'),
(204, 3, 2018115366, NULL, NULL, NULL, '0.00', '0.00'),
(205, 1, 2018115367, NULL, NULL, NULL, '0.00', '0.00'),
(206, 2, 2018115367, NULL, NULL, NULL, '0.00', '0.00'),
(207, 3, 2018115367, NULL, NULL, NULL, '0.00', '0.00'),
(208, 1, 2018115368, NULL, NULL, NULL, '0.00', '0.00'),
(209, 2, 2018115368, NULL, NULL, NULL, '0.00', '0.00'),
(210, 3, 2018115368, NULL, NULL, NULL, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tblamt`
--

CREATE TABLE `tblamt` (
  `id` int(11) NOT NULL,
  `modID` int(1) NOT NULL,
  `SAamt` int(2) NOT NULL,
  `FAamt` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblamt`
--

INSERT INTO `tblamt` (`id`, `modID`, `SAamt`, `FAamt`) VALUES
(1, 1, 2, 10),
(2, 2, 2, 7),
(3, 3, 3, 7);

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
  ADD PRIMARY KEY (`courseinfoID`),
  ADD KEY `courseCode` (`courseCode`),
  ADD KEY `studProg` (`studProg`);

--
-- Indexes for table `formative`
--
ALTER TABLE `formative`
  ADD PRIMARY KEY (`formID`),
  ADD KEY `modID` (`modID`),
  ADD KEY `studNum` (`studNum`),
  ADD KEY `section` (`section`),
  ADD KEY `FAavg` (`FAavg`),
  ADD KEY `40per` (`40per`);

--
-- Indexes for table `maxscore`
--
ALTER TABLE `maxscore`
  ADD PRIMARY KEY (`SAid`),
  ADD UNIQUE KEY `modID` (`modID`);

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
  ADD KEY `studProg` (`studProg`),
  ADD KEY `studNum` (`studNum`),
  ADD KEY `section` (`section`),
  ADD KEY `SAavg` (`SAavg`),
  ADD KEY `FAavg` (`FAavg`),
  ADD KEY `40per` (`40per`),
  ADD KEY `60per` (`60per`),
  ADD KEY `modID` (`modID`),
  ADD KEY `transmutation` (`transmutation`);

--
-- Indexes for table `setupobe`
--
ALTER TABLE `setupobe`
  ADD PRIMARY KEY (`setupobeID`);

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
  ADD KEY `programName` (`studProg`) USING BTREE,
  ADD KEY `section` (`section`);

--
-- Indexes for table `summative`
--
ALTER TABLE `summative`
  ADD PRIMARY KEY (`sumID`),
  ADD KEY `studNum` (`studNum`),
  ADD KEY `SAavg` (`SAavg`),
  ADD KEY `60per` (`60per`),
  ADD KEY `summative_ibfk_1` (`modID`);

--
-- Indexes for table `tblamt`
--
ALTER TABLE `tblamt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modID` (`modID`);

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
  MODIFY `courseinfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `formative`
--
ALTER TABLE `formative`
  MODIFY `formID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `maxscore`
--
ALTER TABLE `maxscore`
  MODIFY `SAid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `runavg`
--
ALTER TABLE `runavg`
  MODIFY `runAvgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `setupobe`
--
ALTER TABLE `setupobe`
  MODIFY `setupobeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `soitprogram`
--
ALTER TABLE `soitprogram`
  MODIFY `programID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `studID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `summative`
--
ALTER TABLE `summative`
  MODIFY `sumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `tblamt`
--
ALTER TABLE `tblamt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transmutation`
--
ALTER TABLE `transmutation`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courseinfo`
--
ALTER TABLE `courseinfo`
  ADD CONSTRAINT `courseinfo_ibfk_1` FOREIGN KEY (`studProg`) REFERENCES `soitprogram` (`studProg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `formative`
--
ALTER TABLE `formative`
  ADD CONSTRAINT `formative_ibfk_2` FOREIGN KEY (`modID`) REFERENCES `moduleinfo` (`modID`),
  ADD CONSTRAINT `formative_ibfk_3` FOREIGN KEY (`studNum`) REFERENCES `studentinfo` (`studNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maxscore`
--
ALTER TABLE `maxscore`
  ADD CONSTRAINT `maxscore_ibfk_1` FOREIGN KEY (`modID`) REFERENCES `moduleinfo` (`modID`);

--
-- Constraints for table `runavg`
--
ALTER TABLE `runavg`
  ADD CONSTRAINT `runavg_ibfk_1` FOREIGN KEY (`studProg`) REFERENCES `soitprogram` (`studProg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_2` FOREIGN KEY (`studNum`) REFERENCES `studentinfo` (`studNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_3` FOREIGN KEY (`section`) REFERENCES `studentinfo` (`section`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_4` FOREIGN KEY (`SAavg`) REFERENCES `summative` (`SAavg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_5` FOREIGN KEY (`FAavg`) REFERENCES `formative` (`FAavg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_6` FOREIGN KEY (`40per`) REFERENCES `formative` (`40per`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_7` FOREIGN KEY (`60per`) REFERENCES `summative` (`60per`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_8` FOREIGN KEY (`modID`) REFERENCES `moduleinfo` (`modID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `runavg_ibfk_9` FOREIGN KEY (`transmutation`) REFERENCES `transmutation` (`transmutation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD CONSTRAINT `studentinfo_ibfk_1` FOREIGN KEY (`studProg`) REFERENCES `soitprogram` (`studProg`);

--
-- Constraints for table `summative`
--
ALTER TABLE `summative`
  ADD CONSTRAINT `summative_ibfk_1` FOREIGN KEY (`modID`) REFERENCES `moduleinfo` (`modID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `summative_ibfk_2` FOREIGN KEY (`studNum`) REFERENCES `studentinfo` (`studNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblamt`
--
ALTER TABLE `tblamt`
  ADD CONSTRAINT `tblamt_ibfk_1` FOREIGN KEY (`modID`) REFERENCES `moduleinfo` (`modID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

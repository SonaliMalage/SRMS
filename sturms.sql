-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 01:14 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sturms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `mobileno` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `repassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`name`, `department`, `mobileno`, `email`, `password`, `repassword`) VALUES
('admin', 'INFORMATION TECHNOLOGY', 2147483647, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Table structure for table `adminsemester`
--

CREATE TABLE `adminsemester` (
  `id` int(11) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `sub1` varchar(10) NOT NULL,
  `sub2` varchar(10) NOT NULL,
  `sub3` varchar(10) NOT NULL,
  `sub4` varchar(10) NOT NULL,
  `sub5` varchar(10) NOT NULL,
  `sub6` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminsemester`
--

INSERT INTO `adminsemester` (`id`, `semester`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`) VALUES
(1, 'SEM I', 'AM 1', 'AP 1', 'AC 1', 'EM', 'BEE', 'ES'),
(2, 'SEM II', 'AM 2', 'AP 2', 'AC 2', 'ED', 'SPA\r\n', 'CS'),
(3, 'SEM III', 'AM 3', 'LD', 'DSA', 'DBMS', 'POC', ''),
(4, 'SEM IV', 'AM 4', 'CN', 'OS', 'COA', 'AT', ''),
(5, 'SEM V', 'MEP', 'IP', 'ADMT', 'CNS', 'ADSAOA', ''),
(6, 'SEM VI', 'SEPM', 'DMBI', 'CCS', 'WN', 'AIP', ''),
(7, 'SEM VII', 'END', 'IS', 'AI', 'MAD', 'CSL', ''),
(8, 'SEM VIII', 'BDA', 'IOE', 'UID', 'DBM', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `adminstudent`
--

CREATE TABLE `adminstudent` (
  `ids` int(11) NOT NULL,
  `rollno` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminstudent`
--

INSERT INTO `adminstudent` (`ids`, `rollno`, `name`, `department`, `year`, `mobileno`, `email`, `password`) VALUES
(1, '19IT2', 'Sneha', 'INFORMATION TECHNOLOGY', 'First Year', '2147483647', 'sneha@gmail.com', 'bd9dd13edc9c5dab79239a75c627f223'),
(3, '19IT33', 'Pratik', 'INFORMATION TECHNOLOGY', 'First Year', '2147483647', 'pratik@gmail.com', '9f7340bf22ca708adf2f150561b366c7'),
(6, '19IT67', 'Trisha', 'INFORMATION TECHNOLOGY', 'First Year', '2147483647', 'trisha@gmail.com', 'e638f7d51818758264fa897a551e5511'),
(12, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 'First Year', '8795337590', 'keshav@gmail.com', '8ce4b16b22b58894aa86c421e8759df3');

-- --------------------------------------------------------

--
-- Table structure for table `adminstudentptr`
--

CREATE TABLE `adminstudentptr` (
  `stdptr` int(11) NOT NULL,
  `rollno` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `pointer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminstudentptr`
--

INSERT INTO `adminstudentptr` (`stdptr`, `rollno`, `department`, `semester`, `pointer`) VALUES
(1, 1, 'INFORMATION TECHNOLOGY', 1, 9.46),
(2, 3, 'INFORMATION TECHNOLOGY', 3, 8.6),
(3, 6, 'INFORMATION TECHNOLOGY', 1, 7.57),
(5, 1, 'INFORMATION TECHNOLOGY', 3, 8.76),
(6, 3, 'INFORMATION TECHNOLOGY', 1, 9.34),
(8, 12, 'INFORMATION TECHNOLOGY', 1, 8.78),
(9, 12, 'INFORMATION TECHNOLOGY', 2, 8.56),
(11, 1, 'INFORMATION TECHNOLOGY', 2, 8.89),
(12, 3, 'INFORMATION TECHNOLOGY', 2, 8.67);

-- --------------------------------------------------------

--
-- Table structure for table `adminstusem`
--

CREATE TABLE `adminstusem` (
  `stusemid` int(11) NOT NULL,
  `rollno` int(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `sem` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminstusem`
--

INSERT INTO `adminstusem` (`stusemid`, `rollno`, `department`, `sem`) VALUES
(4, 1, 'INFORMATION TECHNOLOGY', 1),
(9, 3, 'INFORMATION TECHNOLOGY', 3),
(10, 6, 'INFORMATION TECHNOLOGY', 1),
(12, 12, 'INFORMATION TECHNOLOGY', 2);

-- --------------------------------------------------------

--
-- Table structure for table `adminsubjects`
--

CREATE TABLE `adminsubjects` (
  `subid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `semid` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminsubjects`
--

INSERT INTO `adminsubjects` (`subid`, `teacherid`, `department`, `semid`, `subject`) VALUES
(1, 64, 'INFORMATION TECHNOLOGY', 1, 'AM 1'),
(2, 60, 'INFORMATION TECHNOLOGY', 3, 'DSA'),
(40, 91, 'INFORMATION TECHNOLOGY', 1, 'AP 1'),
(41, 92, 'INFORMATION TECHNOLOGY', 1, 'AC 1'),
(42, 60, 'INFORMATION TECHNOLOGY', 1, 'EM'),
(43, 93, 'INFORMATION TECHNOLOGY', 1, 'BEE'),
(44, 94, 'INFORMATION TECHNOLOGY', 1, 'ES'),
(45, 91, 'INFORMATION TECHNOLOGY', 2, 'AM 2'),
(46, 96, 'INFORMATION TECHNOLOGY', 2, 'AP 2'),
(47, 92, 'INFORMATION TECHNOLOGY', 2, 'AC 2'),
(48, 97, 'INFORMATION TECHNOLOGY', 2, 'CS'),
(49, 94, 'INFORMATION TECHNOLOGY', 2, 'ED'),
(50, 64, 'INFORMATION TECHNOLOGY', 2, 'SPA\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `adminteacher`
--

CREATE TABLE `adminteacher` (
  `idt` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ID` varchar(10) NOT NULL,
  `department` varchar(100) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminteacher`
--

INSERT INTO `adminteacher` (`idt`, `name`, `ID`, `department`, `mobileno`, `email`, `password`) VALUES
(60, 'Ajay', 'IT56', 'INFORMATION TECHNOLOGY', '2147483647', 'ajay@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(64, 'Vijay', 'IT33', 'INFORMATION TECHNOLOGY', '2147483647', 'vijay@gmail.com', '9dd4e461268c8034f5c8564e155c67a6'),
(91, 'Swara', 'IT11', 'INFORMATION TECHNOLOGY', '2147483647', 'swara@gmail.com', '00f387d087ba34ead5d1337c598b462c'),
(92, 'Apoorva', 'IT21', 'INFORMATION TECHNOLOGY', '2147483647', 'apoorva@gmail.com', '4e58188ff528dea1eec738fffc0e118d'),
(93, 'Karan', 'IT65', 'INFORMATION TECHNOLOGY', '2147483647', 'karan@gmail.com', 'dc468c70fb574ebd07287b38d0d0676d'),
(94, 'Rashi', 'IT53', 'INFORMATION TECHNOLOGY', '2147483647', 'rashi@gmail.com', '1cd3c693132f4c31b5b5e5f4c5eed6bd'),
(96, 'Sudha', 'IT26', 'INFORMATION TECHNOLOGY', '2147483647', 'sudha@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(97, 'Neha', 'IT42', 'INFORMATION TECHNOLOGY', '8756478094', 'neha@gmail.com', '262f5bdd0af9098e7443ab1f8e435290');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `logid` int(11) NOT NULL,
  `ID` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`logid`, `ID`, `password`) VALUES
(1, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(2, 'aabc@gmail.com', 'e638f7d51818758264fa897a551e5511'),
(3, 'syuab@gmail.com', '9f7340bf22ca708adf2f150561b366c7'),
(4, 'syuab@gmail.com', '9f7340bf22ca708adf2f150561b366c7'),
(5, 'aabc@gmail.com', 'e638f7d51818758264fa897a551e5511'),
(6, 'aabc@gmail.com', 'e638f7d51818758264fa897a551e5511'),
(7, 'aabc@gmail.com', 'e638f7d51818758264fa897a551e5511'),
(8, 'aabc@gmail.com', 'e638f7d51818758264fa897a551e5511'),
(9, 'syuab@gmail.com', '9f7340bf22ca708adf2f150561b366c7'),
(10, 'aabc@gmail.com', 'e638f7d51818758264fa897a551e5511'),
(11, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(12, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(13, 'syuab@gmail.com', '9f7340bf22ca708adf2f150561b366c7'),
(14, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(15, 'syuab@gmail.com', '9f7340bf22ca708adf2f150561b366c7'),
(16, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(17, 'stu@gmail.com', 'bd9dd13edc9c5dab79239a75c627f223'),
(18, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(19, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(20, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(21, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(22, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(23, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(24, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(25, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(26, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(27, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(28, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(29, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(30, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(31, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(32, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(33, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(34, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(35, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(36, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(37, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(38, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(39, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(40, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(41, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(42, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(43, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(44, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(45, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(46, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(47, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(48, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(49, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(50, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(51, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(52, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(53, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(54, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(55, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(56, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(57, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(58, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(59, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(60, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(61, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(62, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(63, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(64, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(65, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(66, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(67, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(68, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(69, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(70, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(71, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(72, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(73, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(74, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(75, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(76, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(77, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(78, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(79, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(80, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(81, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(82, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(83, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(84, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(85, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(86, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(87, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(88, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(89, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(90, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(91, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(92, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(93, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(94, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(95, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(96, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(97, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(98, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(99, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(100, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(101, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(102, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(103, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(104, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(105, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(106, 'abc@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(107, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(108, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(109, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(110, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(111, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(112, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(113, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(114, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(115, 'keshav@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(116, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(117, 'keshav@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(118, 'keshav@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(119, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(120, 'keshav@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(121, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(122, 'keshav@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(123, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(124, 'keshav@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(125, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(126, 'keshav@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(127, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(128, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(129, 'keshav@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(130, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(131, 'keshav@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(132, 'swara@gmail.com', '8264ee52f589f4c0191aa94f87aa1aeb'),
(133, 'keshav@gmail.com', '900150983cd24fb0d6963f7d28e17f72'),
(134, 'keshav@gmail.com', '8ce4b16b22b58894aa86c421e8759df3'),
(135, 'keshav@gmail.com', '8ce4b16b22b58894aa86c421e8759df3'),
(136, 'keshav@gmail.com', '8ce4b16b22b58894aa86c421e8759df3'),
(137, 'swara@gmail.com', '00f387d087ba34ead5d1337c598b462c'),
(138, 'keshav@gmail.com', '8ce4b16b22b58894aa86c421e8759df3'),
(139, 'swara@gmail.com', '00f387d087ba34ead5d1337c598b462c'),
(140, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(141, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(142, 'keshav@gmail.com', '8ce4b16b22b58894aa86c421e8759df3'),
(143, 'keshav@gmail.com', '8ce4b16b22b58894aa86c421e8759df3'),
(144, 'swara@gmail.com', '00f387d087ba34ead5d1337c598b462c'),
(145, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(146, 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(147, 'keshav@gmail.com', '8ce4b16b22b58894aa86c421e8759df3'),
(148, 'swara@gmail.com', '00f387d087ba34ead5d1337c598b462c'),
(149, 'keshav@gmail.com', '8ce4b16b22b58894aa86c421e8759df3');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `idm` int(11) NOT NULL,
  `rollno` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `Semester` int(100) NOT NULL,
  `sub` varchar(100) NOT NULL,
  `m1` text NOT NULL,
  `m2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`idm`, `rollno`, `name`, `dept`, `Semester`, `sub`, `m1`, `m2`) VALUES
(2, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 1, 'AM 1', '26', '27'),
(24, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 1, 'AP 1', '27', '24'),
(25, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 1, 'AC 1', '23', '25'),
(27, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 1, 'EM', '24', '25'),
(28, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 1, 'BEE', '27', '28'),
(29, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 1, 'ES', '27', '29'),
(32, '19IT67', 'Trisha', 'INFORMATION TECHNOLOGY', 1, 'EM', '20', '25'),
(35, '19IT67', 'Trisha', 'INFORMATION TECHNOLOGY', 1, 'AP 1', '17', '20'),
(36, '19IT2', 'Sneha', 'INFORMATION TECHNOLOGY', 1, 'AP 1', '24', '22'),
(37, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 2, 'CS', '25', '26'),
(38, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 2, 'SPA\r\n', '24', '23'),
(39, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 2, 'ED', '19', '24'),
(40, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 2, 'AM 2', '20', '18'),
(41, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 2, 'AP 2', '20', '23'),
(42, '18IT43', 'Keshav', 'INFORMATION TECHNOLOGY', 2, 'AC 2', '24', '25');

-- --------------------------------------------------------

--
-- Table structure for table `received_messages`
--

CREATE TABLE `received_messages` (
  `msgid` int(11) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `notificationStatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `received_messages`
--

INSERT INTO `received_messages` (`msgid`, `receiver`, `sender`, `date`, `time`, `subject`, `message`, `notificationStatus`) VALUES
(36, 'IT11 - Swara', '18IT43 - Keshav', '2020-12-03', '15:55', 'Marks ', 'Thank you maam', 1),
(39, 'IT11 - Swara', '19IT33 - Pratik', '2020-12-03', '16:05', 'Physics problem', 'I have a doubt maam', 1),
(41, '18IT43 - Keshav', 'IT11 - Swara', '2020-12-03', '16:10', 'Marks', 'Keep practicing', 1),
(43, 'IT11 - Swara', '18IT43 - Keshav', '2020-12-11', '23:40', 'question', 'Ok maam', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `adminsemester`
--
ALTER TABLE `adminsemester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semester` (`semester`);

--
-- Indexes for table `adminstudent`
--
ALTER TABLE `adminstudent`
  ADD PRIMARY KEY (`ids`),
  ADD KEY `rollno` (`rollno`);

--
-- Indexes for table `adminstudentptr`
--
ALTER TABLE `adminstudentptr`
  ADD PRIMARY KEY (`stdptr`),
  ADD KEY `rollno` (`rollno`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `adminstusem`
--
ALTER TABLE `adminstusem`
  ADD PRIMARY KEY (`stusemid`),
  ADD KEY `rollno` (`rollno`),
  ADD KEY `sem` (`sem`);

--
-- Indexes for table `adminsubjects`
--
ALTER TABLE `adminsubjects`
  ADD PRIMARY KEY (`subid`),
  ADD UNIQUE KEY `subject` (`subject`),
  ADD KEY `semid` (`semid`),
  ADD KEY `teacherid` (`teacherid`);

--
-- Indexes for table `adminteacher`
--
ALTER TABLE `adminteacher`
  ADD PRIMARY KEY (`idt`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`idm`),
  ADD KEY `Semester` (`Semester`),
  ADD KEY `sub` (`sub`),
  ADD KEY `rlno` (`rollno`);

--
-- Indexes for table `received_messages`
--
ALTER TABLE `received_messages`
  ADD PRIMARY KEY (`msgid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminsemester`
--
ALTER TABLE `adminsemester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `adminstudent`
--
ALTER TABLE `adminstudent`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `adminstudentptr`
--
ALTER TABLE `adminstudentptr`
  MODIFY `stdptr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `adminstusem`
--
ALTER TABLE `adminstusem`
  MODIFY `stusemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `adminsubjects`
--
ALTER TABLE `adminsubjects`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `adminteacher`
--
ALTER TABLE `adminteacher`
  MODIFY `idt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `logindetails`
--
ALTER TABLE `logindetails`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `received_messages`
--
ALTER TABLE `received_messages`
  MODIFY `msgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminstudentptr`
--
ALTER TABLE `adminstudentptr`
  ADD CONSTRAINT `rollptr` FOREIGN KEY (`rollno`) REFERENCES `adminstudent` (`ids`),
  ADD CONSTRAINT `rolptsm` FOREIGN KEY (`semester`) REFERENCES `adminsemester` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `adminstusem`
--
ALTER TABLE `adminstusem`
  ADD CONSTRAINT `rollnosem1` FOREIGN KEY (`sem`) REFERENCES `adminsemester` (`id`),
  ADD CONSTRAINT `semrn` FOREIGN KEY (`rollno`) REFERENCES `adminstudent` (`ids`) ON DELETE CASCADE,
  ADD CONSTRAINT `semstu` FOREIGN KEY (`sem`) REFERENCES `adminsemester` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `adminsubjects`
--
ALTER TABLE `adminsubjects`
  ADD CONSTRAINT `adminsubjects` FOREIGN KEY (`semid`) REFERENCES `adminsemester` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adminsubjects_ibfk_1` FOREIGN KEY (`teacherid`) REFERENCES `adminteacher` (`idt`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `rlno` FOREIGN KEY (`rollno`) REFERENCES `adminstudent` (`rollno`),
  ADD CONSTRAINT `semid` FOREIGN KEY (`Semester`) REFERENCES `adminsemester` (`id`),
  ADD CONSTRAINT `subj` FOREIGN KEY (`sub`) REFERENCES `adminsubjects` (`subject`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

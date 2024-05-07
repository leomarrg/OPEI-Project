-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 07:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opei-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT 1,
  `Name` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table11a`
--

CREATE TABLE `table11a` (
  `table11aID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(8) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(10) DEFAULT NULL,
  `field4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table11a`
--

INSERT INTO `table11a` (`table11aID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`) VALUES
(21, NULL, NULL, 'CCOM4095', 'option2', 'option2', 'Prueba 1'),
(24, NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, 'dsds', 'option4', 'option2', 'dsdsd'),
(29, NULL, NULL, 'd', 'option4', 'option2', 'dsqw');

-- --------------------------------------------------------

--
-- Table structure for table `table11b`
--

CREATE TABLE `table11b` (
  `table11bID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table11b`
--

INSERT INTO `table11b` (`table11bID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`) VALUES
(1, NULL, NULL, 'Prueba 1', 'Prueba 1', 'Prueba 1', 'Prueba 1'),
(2, NULL, NULL, '', '', '', ''),
(3, NULL, NULL, 'dw', 'dw', 'dw', 'prueba 2'),
(4, NULL, NULL, 'dw', 'dw', 'dw', 'prueba 2'),
(5, NULL, NULL, 'dw', 'dw', 'dw', 'prueba 2'),
(6, NULL, NULL, 'dw', 'dw', 'dw', 'prueba2'),
(7, NULL, NULL, 'Un pqueno cambuoi', 'otro cambio diferente', 'dw', 'prueba2'),
(8, NULL, NULL, 'ds', 'ds', 'ds', 'ds3'),
(9, NULL, NULL, 'sa', 'sa', 'sa', 'sa1'),
(10, NULL, NULL, 'sa', 'sa', 'sa', 'sa1'),
(11, NULL, NULL, 'as', 'as', 'as', 'as4');

-- --------------------------------------------------------

--
-- Table structure for table `table12`
--

CREATE TABLE `table12` (
  `table12ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(20) DEFAULT NULL,
  `field2` varchar(20) DEFAULT NULL,
  `field3` varchar(20) DEFAULT NULL,
  `field4` varchar(20) DEFAULT NULL,
  `field5` varchar(20) DEFAULT NULL,
  `field6` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table13`
--

CREATE TABLE `table13` (
  `table13ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(255) DEFAULT NULL,
  `field6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table13`
--

INSERT INTO `table13` (`table13ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`) VALUES
(1, NULL, NULL, 'prueba 1', 'prueba 1', 'ds', 'ds', 'option2', 'ds');

-- --------------------------------------------------------

--
-- Table structure for table `table14a`
--

CREATE TABLE `table14a` (
  `table14aID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(8) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table14a`
--

INSERT INTO `table14a` (`table14aID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`) VALUES
(1, NULL, NULL, 'dsdsd', 'dsds', 'dsd', 'dsds', 'prueba1');

-- --------------------------------------------------------

--
-- Table structure for table `table14b`
--

CREATE TABLE `table14b` (
  `table14bID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL,
  `field6` varchar(100) DEFAULT NULL,
  `field7` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table14b`
--

INSERT INTO `table14b` (`table14bID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`) VALUES
(1, NULL, NULL, 'sds', 'dsdsd', 'eds', 'erfd', 'sasd', 'prueba1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table15`
--

CREATE TABLE `table15` (
  `table15ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL,
  `field6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table15`
--

INSERT INTO `table15` (`table15ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`) VALUES
(1, NULL, NULL, 'fser', 'fsers', 'fserf', 'sdcsdef', 'fsdcscd', NULL),
(2, NULL, NULL, 'ds', 'asdasd', 'ccsc', 'cs', 'cz', 'prueba 2');

-- --------------------------------------------------------

--
-- Table structure for table `table21a`
--

CREATE TABLE `table21a` (
  `table21aID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL,
  `field6` varchar(100) DEFAULT NULL,
  `field7` varchar(100) DEFAULT NULL,
  `field8` varchar(100) DEFAULT NULL,
  `field9` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table21b`
--

CREATE TABLE `table21b` (
  `table21bID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL,
  `field6` varchar(100) DEFAULT NULL,
  `field7` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table22`
--

CREATE TABLE `table22` (
  `table22ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table23`
--

CREATE TABLE `table23` (
  `table23ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table24`
--

CREATE TABLE `table24` (
  `table24ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table25`
--

CREATE TABLE `table25` (
  `table25ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table31`
--

CREATE TABLE `table31` (
  `table31ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table32a`
--

CREATE TABLE `table32a` (
  `table32aID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table32b`
--

CREATE TABLE `table32b` (
  `table32aID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL,
  `field6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table33`
--

CREATE TABLE `table33` (
  `table33ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table41`
--

CREATE TABLE `table41` (
  `table41ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table42`
--

CREATE TABLE `table42` (
  `table42ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table43`
--

CREATE TABLE `table43` (
  `table43ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table51`
--

CREATE TABLE `table51` (
  `table51ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table52`
--

CREATE TABLE `table52` (
  `table52ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table53`
--

CREATE TABLE `table53` (
  `table53ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL,
  `field6` varchar(100) DEFAULT NULL,
  `field7` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table54`
--

CREATE TABLE `table54` (
  `table54ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL,
  `field6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `table11a`
--
ALTER TABLE `table11a`
  ADD PRIMARY KEY (`table11aID`);

--
-- Indexes for table `table11b`
--
ALTER TABLE `table11b`
  ADD PRIMARY KEY (`table11bID`);

--
-- Indexes for table `table12`
--
ALTER TABLE `table12`
  ADD PRIMARY KEY (`table12ID`);

--
-- Indexes for table `table13`
--
ALTER TABLE `table13`
  ADD PRIMARY KEY (`table13ID`);

--
-- Indexes for table `table14a`
--
ALTER TABLE `table14a`
  ADD PRIMARY KEY (`table14aID`);

--
-- Indexes for table `table14b`
--
ALTER TABLE `table14b`
  ADD PRIMARY KEY (`table14bID`);

--
-- Indexes for table `table15`
--
ALTER TABLE `table15`
  ADD PRIMARY KEY (`table15ID`);

--
-- Indexes for table `table21a`
--
ALTER TABLE `table21a`
  ADD PRIMARY KEY (`table21aID`);

--
-- Indexes for table `table21b`
--
ALTER TABLE `table21b`
  ADD PRIMARY KEY (`table21bID`);

--
-- Indexes for table `table22`
--
ALTER TABLE `table22`
  ADD PRIMARY KEY (`table22ID`);

--
-- Indexes for table `table23`
--
ALTER TABLE `table23`
  ADD PRIMARY KEY (`table23ID`);

--
-- Indexes for table `table24`
--
ALTER TABLE `table24`
  ADD PRIMARY KEY (`table24ID`);

--
-- Indexes for table `table25`
--
ALTER TABLE `table25`
  ADD PRIMARY KEY (`table25ID`);

--
-- Indexes for table `table31`
--
ALTER TABLE `table31`
  ADD PRIMARY KEY (`table31ID`);

--
-- Indexes for table `table32a`
--
ALTER TABLE `table32a`
  ADD PRIMARY KEY (`table32aID`);

--
-- Indexes for table `table32b`
--
ALTER TABLE `table32b`
  ADD PRIMARY KEY (`table32aID`);

--
-- Indexes for table `table33`
--
ALTER TABLE `table33`
  ADD PRIMARY KEY (`table33ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table11a`
--
ALTER TABLE `table11a`
  MODIFY `table11aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `table11b`
--
ALTER TABLE `table11b`
  MODIFY `table11bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table12`
--
ALTER TABLE `table12`
  MODIFY `table12ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table13`
--
ALTER TABLE `table13`
  MODIFY `table13ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table14a`
--
ALTER TABLE `table14a`
  MODIFY `table14aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table14b`
--
ALTER TABLE `table14b`
  MODIFY `table14bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table15`
--
ALTER TABLE `table15`
  MODIFY `table15ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table21a`
--
ALTER TABLE `table21a`
  MODIFY `table21aID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table21b`
--
ALTER TABLE `table21b`
  MODIFY `table21bID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table22`
--
ALTER TABLE `table22`
  MODIFY `table22ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table23`
--
ALTER TABLE `table23`
  MODIFY `table23ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table24`
--
ALTER TABLE `table24`
  MODIFY `table24ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table25`
--
ALTER TABLE `table25`
  MODIFY `table25ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table31`
--
ALTER TABLE `table31`
  MODIFY `table31ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table32a`
--
ALTER TABLE `table32a`
  MODIFY `table32aID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table32b`
--
ALTER TABLE `table32b`
  MODIFY `table32aID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table33`
--
ALTER TABLE `table33`
  MODIFY `table33ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

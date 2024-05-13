-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 04:14 PM
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

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`DepartmentID`, `DepartmentName`) VALUES
(1, 'Humanidades'),
(2, 'Ciencias de Computadoras');

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
(34, NULL, NULL, 'data1', 'Activación', 'En Proceso', 'data2'),
(35, NULL, NULL, 'CCOM4095', 'Activación', 'Aprobado', 'Una pequeña descripción '),
(37, NULL, NULL, 'CCOM4095', 'Inactivación', 'En Proceso', 'sssa'),
(38, NULL, NULL, 'CCOM4095', 'Creación', 'En Proceso', 'breve descripcion '),
(39, NULL, NULL, 'CCOM4095', 'Creación', 'Aprobado', 'hola'),
(40, NULL, NULL, 'CCOM4006', 'Creación', 'Aprobado', 'hola'),
(41, NULL, 2024, 'CCOM4006', 'Revisión', 'En Proceso', 'holis'),
(42, NULL, 2024, 'CCOM4006', 'Creación', 'Aprobado', 'holas2'),
(43, 1, 2024, 'CCOM4006', 'Creación', 'Aprobado', 'holistondis2'),
(44, 1, 2024, 'CCOM4095', 'Creación', 'Seleccione', 'saSsS'),
(45, 1, 2024, 'CCOM4006', '0', '0', 'NINGUNA'),
(46, 1, 2024, 'CCOM4006', 'Inactivación', 'Aprobado', 'dsdsd');

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
(5, NULL, NULL, 'dw', 'dw', 'dw', 'prueba 2'),
(8, NULL, NULL, 'ds', 'ds', 'ds', 'ds3'),
(9, NULL, NULL, 'sa', 'sa', 'sa', 'sa1'),
(12, NULL, NULL, 'cambio academico abril 2024', 'cambio academico menor abril 2024', 'cambio academico significativo abril 2024', 'Gran cambio'),
(13, NULL, NULL, 'Tratando de popular con info', 'Data nueva', 'Cambio', 'Leomar'),
(14, NULL, NULL, 'data2', 'data2', 'data2', 'data2'),
(15, NULL, NULL, 'data3', 'data3', 'data3', 'data3'),
(16, NULL, NULL, 'Prueba 1', 'data5', 'data5', 'data5'),
(17, NULL, NULL, 'data1', 'data1', 'data1', 'data1'),
(18, 1, 2024, 'cambio academico abril 2024', 'cambio academico abril 2022', 'cambio academico abril 2026', 'cambio academico abril 2029');

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
(11, NULL, NULL, 'data1', 'data1', 'data1', 'data1', '6', 'data1'),
(12, NULL, NULL, 'data2', 'data2', 'data2', 'data2', '5', 'data2'),
(13, NULL, NULL, 'data3', 'data3', 'data3', 'data3', '2', 'data3'),
(14, 1, 2024, 'data2', 'prueba 1', '2024', '3098', '5', 'data2'),
(15, 1, 2024, 'Comunicaciones', 'Middle State University', '2309', '2066', '6', 'Ninguna recomendacion'),
(16, 1, 2024, 'prueba 1', 'data2', 'data2', 'ds', '5', 'Ninguna recomendacion'),
(17, 1, 2024, 'prueba 1', 'Middle State', 'data2', '3098', '0', 'data2'),
(18, 1, 2024, 'data2', 'prueba 1', 'data2', '3098', '3', 'data1'),
(19, 1, 2024, 'Ciencias Naturales', 'Middle State', '2019', '2024', '3', 'Ninguna recomendacion'),
(20, 1, 2024, 'dsds', 'dsds', 'dsdsd', 'sdsd', '3', 'dssd');

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
(10, NULL, NULL, 'data10', 'data10', 'data10', 'data10', 'data10'),
(12, NULL, NULL, 'CCOM4095', 'data1', 'data1', 'data1', 'data1'),
(13, NULL, 2024, 'CCOM4095', 'data1', 'data3', 'data3', 'data6'),
(14, 1, 2024, 'CCOM4006', 'data3', 'data1', 'data1', 'data1');

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
(2, NULL, NULL, 'myForm1_4b', 'myForm1_4b', 'data1', 'myForm1_4b', 'myForm1_4b', 'myForm1_4b', NULL),
(6, NULL, NULL, 'data4', 'data4', 'data4', 'data4', 'data4', 'data4', NULL),
(8, NULL, NULL, 'data6', 'data6', 'data6', 'data6', 'data6', 'data6', NULL),
(10, NULL, NULL, 'Cortar cabello', 'la tijera', 'ninguna', 'corto bien', 'futuras referencias', 'ninguna', NULL),
(11, 1, 2024, 'data1', 'data1', 'data1', 'data1', 'data1', 'data1', NULL);

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
(3, NULL, NULL, 'data1', 'data1', 'data1', 'data1', 'data1', 'data1'),
(4, NULL, NULL, 'data1', 'data1', 'data1', 'data1', 'data3', 'data1'),
(6, 1, 2024, 'data1', 'data1', 'data1', 'data1', 'data1', 'data1'),
(7, 1, 2024, 'logro 1', 'logro 1', 'logro 1', 'logro 1', 'logro 1', 'logro 1');

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
  `field8` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table21a`
--

INSERT INTO `table21a` (`table21aID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`, `field8`) VALUES
(15, NULL, NULL, 'data3', 'data3', '21-05-2024', 'Aprobado', 'Artículo Publicado Revista Arbitrada', 'No Arbitrada', 'En Proceso', 'data3'),
(16, NULL, NULL, 'data2', 'Escribir', '2024-04-24', 'option1', 'option2', 'option1', 'option2', 'ACTUALIZAR'),
(17, NULL, NULL, 'background: linear-gradient(to left, var(--accent-color), var(--gradient-color));', 'background: linear-gradient(to left, var(--accent-color), var(--gradient-color));', '2024-04-24', 'Si', 'Antología', 'No Arbitrada', 'No', 'No'),
(18, NULL, NULL, 'dsdsd', 'dsdsdsd', '14-05-2024', 'No', 'Artículo Publicado Revista Arbitrada', 'No Arbitrada', 'Si', 'sdsdsdsd');

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

--
-- Dumping data for table `table21b`
--

INSERT INTO `table21b` (`table21bID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`) VALUES
(2, NULL, NULL, 'ramona', 'aguacero', '2024-04-04', 'Mentor en proyectos de investigación, tesina, tesis o disertación de estudiante', 'No', 'sorry', NULL),
(3, NULL, NULL, 'data1', 'data1', '2024-04-23', 'Bibliografías, discografía y filmografía', 'No', 'data1', NULL),
(4, NULL, NULL, 'data1', 'data1', '2024-04-24', 'option2', 'option2', 'data1', NULL),
(5, NULL, NULL, 'data1', 'data1', '2024-04-25', 'option2', 'option1', 'data1', NULL),
(7, NULL, NULL, 'data2', 'Ninguna acti', '2024-04-01', 'Colaborador y lector en proyecto de investigación o disertación', 'Seleccione...', 'data1', NULL);

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

--
-- Dumping data for table `table22`
--

INSERT INTO `table22` (`table22ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`) VALUES
(1, NULL, NULL, 'Titulo de convenio', 'UPRA', 'Pendiente a aprobacion', '1000'),
(2, NULL, NULL, 'data1', 'data1', 'Pendiente a aprobacion', 'data1'),
(4, NULL, NULL, 'Titulo de convenio', 'UPRA', 'Pendiente a aprobacion', '0'),
(5, NULL, NULL, 'Titulo de convenio', 'UPRA', 'No aprobado', '0'),
(6, 1, 2024, 'Titulo de convenio', 'UPRA', 'No aprobado', '0');

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

--
-- Dumping data for table `table23`
--

INSERT INTO `table23` (`table23ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`) VALUES
(1, NULL, NULL, 'projecto final', 'option0', 'option0', '2000 actualizados'),
(7, NULL, NULL, NULL, 'option2', 'option2', 'data1'),
(8, NULL, NULL, NULL, 'option1', 'option1', 'data5'),
(9, NULL, NULL, 'data7', 'option1', 'option1', 'data7'),
(10, 1, 2024, 'data1', 'option2', 'option1', 'data1');

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

--
-- Dumping data for table `table24`
--

INSERT INTO `table24` (`table24ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`) VALUES
(2, NULL, NULL, 'Construcción ', '2024-04-24', 'option1', 'Leomar', '15');

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

--
-- Dumping data for table `table25`
--

INSERT INTO `table25` (`table25ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`) VALUES
(2, NULL, NULL, 'data1', 'data1', 'data1', 'data1', 'data1'),
(3, NULL, NULL, 'data2', 'data2', 'data2', 'data2', 'data2');

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
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table31`
--

INSERT INTO `table31` (`table31ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`) VALUES
(3, NULL, NULL, '10', '', 'prueba de reconocimiento', '', ''),
(4, NULL, NULL, '10', NULL, 'prueba de reconocimiento', '2024-04-09', ''),
(5, NULL, NULL, '111', NULL, 'segunda prueba de reconocimiento', '2024-04-09', 'organismo de prueba 2'),
(6, NULL, NULL, 'option2', '444', 'tercera prueba de reconocimiento', '2024-04-10', 'organismo de prueba 3'),
(7, NULL, NULL, 'option1', '10', 'prueba de reconocimiento', '2024-04-24', 'data1'),
(8, NULL, NULL, 'option1', '11', 'Data1', '2024-04-17', 'data1');

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

--
-- Dumping data for table `table32a`
--

INSERT INTO `table32a` (`table32aID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`) VALUES
(2, NULL, NULL, 'prueba 2 act', 'option2', '26-04-2024', NULL),
(3, NULL, NULL, 'data1', 'option1', '27-04-2024', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table32b`
--

CREATE TABLE `table32b` (
  `table32bID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `field1` varchar(100) DEFAULT NULL,
  `field2` varchar(100) DEFAULT NULL,
  `field3` varchar(100) DEFAULT NULL,
  `field4` varchar(100) DEFAULT NULL,
  `field5` varchar(100) DEFAULT NULL,
  `field6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table32b`
--

INSERT INTO `table32b` (`table32bID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`) VALUES
(7, NULL, NULL, 'data5', 'data5', 'data5', 'data5', 'option0', 'data5'),
(8, NULL, NULL, 'data6', 'data6', 'data6', 'data6', 'option0', 'data6'),
(9, NULL, NULL, 'data7', 'data7', 'data7', 'data7', 'option0', 'data7'),
(10, NULL, NULL, 'data8', 'data8', 'data8', 'data8', 'option0', 'data8'),
(11, NULL, NULL, 'data9', 'data9', 'data9', 'data9', 'option0', 'data9'),
(12, NULL, NULL, 'data10', 'data10', 'data10', 'data10', 'option0', 'data10'),
(13, NULL, NULL, 'data11', 'data11', 'data11', 'data11', 'option2', 'data11'),
(14, NULL, NULL, 'data12', 'data12', 'data12', 'data12', 'option0', 'data12');

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

--
-- Dumping data for table `table33`
--

INSERT INTO `table33` (`table33ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`) VALUES
(2, NULL, NULL, 'data1', 'data1', 'data1', 'data1', 'data1'),
(3, NULL, NULL, 'data2', 'data2', 'data2', 'data2', 'data2');

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
  `field5` varchar(100) DEFAULT NULL,
  `field6` varchar(100) NOT NULL
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
  `field7` varchar(100) DEFAULT NULL,
  `field8` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL
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
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`UserID`, `Email`, `Password`, `DepartmentID`, `Name`, `LastName`, `Active`) VALUES
(1, 'leomar.rodriguez1@upr.edu', 'password1234', 1, 'Leomar', 'Rodriguez', 1),
(2, 'juan.lopez@upr.edu', 'password123', 2, 'Juan', 'Lopez', 0);

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
  ADD PRIMARY KEY (`table32bID`);

--
-- Indexes for table `table33`
--
ALTER TABLE `table33`
  ADD PRIMARY KEY (`table33ID`);

--
-- Indexes for table `table41`
--
ALTER TABLE `table41`
  ADD PRIMARY KEY (`table41ID`);

--
-- Indexes for table `table42`
--
ALTER TABLE `table42`
  ADD PRIMARY KEY (`table42ID`);

--
-- Indexes for table `table43`
--
ALTER TABLE `table43`
  ADD PRIMARY KEY (`table43ID`);

--
-- Indexes for table `table51`
--
ALTER TABLE `table51`
  ADD PRIMARY KEY (`table51ID`);

--
-- Indexes for table `table52`
--
ALTER TABLE `table52`
  ADD PRIMARY KEY (`table52ID`);

--
-- Indexes for table `table53`
--
ALTER TABLE `table53`
  ADD PRIMARY KEY (`table53ID`);

--
-- Indexes for table `table54`
--
ALTER TABLE `table54`
  ADD PRIMARY KEY (`table54ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table11a`
--
ALTER TABLE `table11a`
  MODIFY `table11aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `table11b`
--
ALTER TABLE `table11b`
  MODIFY `table11bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `table12`
--
ALTER TABLE `table12`
  MODIFY `table12ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table13`
--
ALTER TABLE `table13`
  MODIFY `table13ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table14a`
--
ALTER TABLE `table14a`
  MODIFY `table14aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table14b`
--
ALTER TABLE `table14b`
  MODIFY `table14bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table15`
--
ALTER TABLE `table15`
  MODIFY `table15ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table21a`
--
ALTER TABLE `table21a`
  MODIFY `table21aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `table21b`
--
ALTER TABLE `table21b`
  MODIFY `table21bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table22`
--
ALTER TABLE `table22`
  MODIFY `table22ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table23`
--
ALTER TABLE `table23`
  MODIFY `table23ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table24`
--
ALTER TABLE `table24`
  MODIFY `table24ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table25`
--
ALTER TABLE `table25`
  MODIFY `table25ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table31`
--
ALTER TABLE `table31`
  MODIFY `table31ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table32a`
--
ALTER TABLE `table32a`
  MODIFY `table32aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table32b`
--
ALTER TABLE `table32b`
  MODIFY `table32bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table33`
--
ALTER TABLE `table33`
  MODIFY `table33ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table41`
--
ALTER TABLE `table41`
  MODIFY `table41ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table42`
--
ALTER TABLE `table42`
  MODIFY `table42ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table43`
--
ALTER TABLE `table43`
  MODIFY `table43ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table51`
--
ALTER TABLE `table51`
  MODIFY `table51ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table52`
--
ALTER TABLE `table52`
  MODIFY `table52ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table53`
--
ALTER TABLE `table53`
  MODIFY `table53ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table54`
--
ALTER TABLE `table54`
  MODIFY `table54ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

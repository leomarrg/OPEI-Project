-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 06:15 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `Email`, `Password`, `Active`, `Name`, `LastName`) VALUES
(1, 'jared.pupo@upr.edu', '$2y$10$T3KV8X/kQvbdenDygNZPu.iIUB83LX0CVFdWal4wbdBPJaytmoWD.', 1, 'Jared', 'Jared'),
(2, 'admin.admin@upr.edu', '$2y$10$KNzRtUuNThqWtTjVueLb2ONJq7WLSo6aOP7YecLRDcb4NSP7TiMeq', 1, 'admin', 'admin'),
(3, 'email@upr.edu', '$2y$10$PAC8htZFzozf68wW.c.JgeEb359o7I3s9QLy0AAjaA4siGkouS9SO', 1, 'Name', 'Last name'),
(4, 'aixa.ramirez@upr.edu', '$2y$10$HIHBHvgE7So3UEzjAHfhTub1t88SDvo/RpebeLAc8m26v65Yl5yZe', 1, 'Aixa', 'Ramirez Toledo');

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
(1, 'CCOM'),
(2, 'ADEM'),
(3, 'COMU'),
(4, 'ENFE'),
(5, 'BIOL'),
(6, 'CISO'),
(7, 'INGL'),
(8, 'ESPA'),
(9, 'MATE'),
(10, 'HUMA');

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
(13, 2, 2024, 'ADEM0000', 'Activación', 'Aprobado', 'Una breve descripción'),
(23, 1, 2024, 'CCOM4005', 'Activación', 'Aprobado', '12');

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
(19, 2, 2024, 'Valor Cambio académico', 'Valor Academico Institucional', 'Valor Cambio Academico', 'Valor Cambio Sustanciales'),
(21, 1, 2024, 'Valor para cambio academicos', 'Valor Academico Institucionales', 'Valor Cambio Academicos', 'Valor Cambio Sustanciales');

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
  `field6` varchar(20) DEFAULT NULL,
  `field7` varchar(20) DEFAULT NULL,
  `field8` varchar(20) DEFAULT NULL,
  `field9` varchar(20) DEFAULT NULL,
  `field10` varchar(20) DEFAULT NULL,
  `field11` varchar(20) DEFAULT NULL,
  `field12` varchar(20) DEFAULT NULL,
  `field13` varchar(20) DEFAULT NULL,
  `field14` varchar(20) DEFAULT NULL,
  `field15` varchar(20) DEFAULT NULL,
  `field16` varchar(20) DEFAULT NULL,
  `field17` varchar(20) DEFAULT NULL,
  `field18` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table12`
--

INSERT INTO `table12` (`table12ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`, `field8`, `field9`, `field10`, `field11`, `field12`, `field13`, `field14`, `field15`, `field16`, `field17`, `field18`) VALUES
(42, 1, 2024, '1', '2', '3', '53', '15', '34', '15', '54', '41', '38', '6', '30', '13', '10', '3', '12', '13', '11'),
(43, 2, 2024, '12', '4', '60', '53', '13', '12', '15', '11', '45', '23', '43', '14', '42', '60', '51', '2', '16', '5');

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
(32, 2, 2024, 'ADEM1000', 'Agencia que acredito el programa', '2023', '2024', '2', 'Recomendación'),
(33, 1, 2024, 'CCOM3010', 'Agencia que acredito el programas', '2024', '2025', '2', 'Recomendaciónes aqui');

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
(4, 2, 2024, 'Value1', 'Value1_2', 'Value1_3', 'Value1_4', 'Value1_5asdasdasd');

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
  `field6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table14b`
--

INSERT INTO `table14b` (`table14bID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`) VALUES
(22, 2, 2024, 'Un servicio', 'Indicador', 'Instrumento', 'Resultados que fueron obtenidos ', 'Como se usaron', 'Acciones que son correctivas');

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
(7, 2, 2024, '1.1 Review', '1.2 Review', '1.3 Review', '1.4 Review', '1.5 Review', '1.6 Review'),
(9, 1, 2024, '1.1 Review', '1.2 Review', '1.3 Review', '1.4 Review', '1.5 Review', '1.6 Review');

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
(21, 2, 2024, 'Insertar Profesor', 'Actividad', '11-05-2024', 'Si', 'Libro', 'Arbritada', 'Si', 'Entidad');

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
  `field6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table21b`
--

INSERT INTO `table21b` (`table21bID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`) VALUES
(8, 2, 2024, 'Insertar Profesor', 'Actividad', '20-05-2024', 'Bibliografías, discografía y filmografía', 'Si', 'Lugar en particular'),
(10, 1, 2024, 'Insertar Profesor', 'Actividad', '17-05-2024', 'Jueces y jurado', 'Si', 'Lugar en particular');

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
(8, 2, 2024, 'Titilo aqui', 'La agencia', 'Aprobado', '1000'),
(10, 1, 2024, 'Titilo aqui', 'La agencia', 'Aprobado', '1000');

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
(10, 2, 2024, 'Proyecto Aqui', 'Federal', 'Pendiente a aprobacion', '1000'),
(11, 1, 2024, 'Proyecto Aqui', 'Federal', 'No aprobado', '1000');

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
(12, 2, 2024, 'Trabajo aqui', 'Obras', '2024-05-17', 'Insertar Profesor', '840-19-1010'),
(15, 1, 2024, 'Trabajo aqui', 'Afiches', '17-05-2024', 'Insertar Profesor', '840-19-9656');

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
(7, 2, 2024, '2.1 Review', '2.2 Review', '2.3 Review', '2.4 Review', '2.5 Review'),
(9, 1, 2024, '2.1 Review', '2.2 Review', '2.3 Review', '2.4 Review', '2.5 Review');

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
  `field5` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table31`
--

INSERT INTO `table31` (`table31ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`) VALUES
(12, 2, 2024, 'Artístico', '10', 'Reconocimientos descriptivos', '11-05-2024', 'El organismo'),
(14, 1, 2024, 'Artístico', '10', 'Reconocimientos descriptivos', 'Words', 'as');

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
  `field3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table32a`
--

INSERT INTO `table32a` (`table32aID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`) VALUES
(10, 2, 2024, 'Titulo', 'Académica', '21-05-2024'),
(12, 1, 2024, 'Titulo', 'Académica', '24-05-2024');

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
(8, 2, 2024, 'Estudiante', 'CCOM', 'Algun lugar', '2024', 'Si', 'Comentado'),
(11, 1, 2024, 'Estudiante', 'CCOM', 'Algun lugar', '2024', 'aa', 'aa');

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
(6, 2, 2024, '3.1 Review', '3.2 Review', '3.3 Review', '3.4 Review', '3.5 Review'),
(8, 1, 2024, 'Review 3.1s', 'Review 3.2s', 'Review 3.3s', 'Review 3.4s', 'Review 3.5s');

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

--
-- Dumping data for table `table41`
--

INSERT INTO `table41` (`table41ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`) VALUES
(7, 2, 2024, 'Actividad', 'Si', '21-05-2024', 'Coordinador aqui', '10'),
(10, 1, 2024, 'Actividad', 'Si', '18-05-2024', 'Coordinador aqui', '10');

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

--
-- Dumping data for table `table42`
--

INSERT INTO `table42` (`table42ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`) VALUES
(7, 2, 2024, 'CCOM3020', '20', '12', '21', '10'),
(10, 1, 2024, 'CCOM3020', '20', '12', '21', '10');

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

--
-- Dumping data for table `table43`
--

INSERT INTO `table43` (`table43ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`) VALUES
(7, 2, 2024, '4.1 Review', '4.2 Review', '4.3 Review', '4.4 Review', '4.5 Review'),
(9, 1, 2024, '4.1 Review', '4.2 Review', '4.3 Review', '4.4 Review', '4.5 Review');

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
  `field6` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table51`
--

INSERT INTO `table51` (`table51ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`) VALUES
(4, 2, 2024, 'Actividad', 'Conferencia, foro o panel', '13-05-2024', 'UPRA', 'Rescursos', '20'),
(5, 1, 2024, 'Actividad', 'Taller', '18-05-2024', 'UPRA', 'Rescursos', '20');

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

--
-- Dumping data for table `table52`
--

INSERT INTO `table52` (`table52ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`) VALUES
(9, 2, 2024, 'Simposio', '2000', 'Mas commentarios'),
(11, 1, 2024, 'Fundraising', 'Mas commentarios', 'Mas commentarios');

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
  `field8` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table53`
--

INSERT INTO `table53` (`table53ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`, `field8`) VALUES
(9, 2, 2024, '840-10-1020', 'Titulo de proyecto', 'Describir', '2024', 'UPRA', 'Simposio', 'Comentado', 'Mas commentarios'),
(11, 1, 2024, 'Jesus', 'Titulo de proyecto', 'Describir', '2024', 'UPRA', 'Creada por exalumnos', 'Comentado', 'Mas commentarios');

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

--
-- Dumping data for table `table54`
--

INSERT INTO `table54` (`table54ID`, `DepartmentID`, `year`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`) VALUES
(6, 2, 2024, '5.1 Review', '5.2 Review', '5.3 Review', '5.4 Review', '5.5 Review', '5.6 Review'),
(8, 1, 2024, '5.1 Review', '5.2 Review', '5.3 Review', '5.4 Review', '5.5 Review', '5.6 Review');

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
(4, 'Jared.User@upr.edu', '$2y$10$B9yOrGDrSQeG8aZj64Nq0.juzUgiUq8//jgSZA9gPB/TtFAnQzhz2', 1, 'Jared', 'Pupo', 1),
(12, 'user.adem@upr.edu', '$2y$10$9/URjLjK6yBimsPRF/D5Mu1IensTNK9KzVkByFBAF9kZHjIU0tvy6', 2, 'ADEM', 'ADEM', 1),
(13, 'jared@gmail.com', '$2y$10$8uGB5We1OUofiLCm4eTyeON8g5NlaC0X.ogeWgkrRaNh0n3gPrYwO', 4, 'Jared', 'Jared', 1),
(14, 'aixa.user@upr.edu', '$2y$10$Fcnn/wSUL5YW3FnTiyLWReX5A8eV9PuuE970wapmMaFpkhXF9PB92', 1, 'Aixa', 'Usuario', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table11a`
--
ALTER TABLE `table11a`
  MODIFY `table11aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `table11b`
--
ALTER TABLE `table11b`
  MODIFY `table11bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `table12`
--
ALTER TABLE `table12`
  MODIFY `table12ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `table13`
--
ALTER TABLE `table13`
  MODIFY `table13ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `table14a`
--
ALTER TABLE `table14a`
  MODIFY `table14aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table14b`
--
ALTER TABLE `table14b`
  MODIFY `table14bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `table15`
--
ALTER TABLE `table15`
  MODIFY `table15ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table21a`
--
ALTER TABLE `table21a`
  MODIFY `table21aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `table21b`
--
ALTER TABLE `table21b`
  MODIFY `table21bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table22`
--
ALTER TABLE `table22`
  MODIFY `table22ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table23`
--
ALTER TABLE `table23`
  MODIFY `table23ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table24`
--
ALTER TABLE `table24`
  MODIFY `table24ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table25`
--
ALTER TABLE `table25`
  MODIFY `table25ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table31`
--
ALTER TABLE `table31`
  MODIFY `table31ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table32a`
--
ALTER TABLE `table32a`
  MODIFY `table32aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table32b`
--
ALTER TABLE `table32b`
  MODIFY `table32bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table33`
--
ALTER TABLE `table33`
  MODIFY `table33ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table41`
--
ALTER TABLE `table41`
  MODIFY `table41ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table42`
--
ALTER TABLE `table42`
  MODIFY `table42ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table43`
--
ALTER TABLE `table43`
  MODIFY `table43ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table51`
--
ALTER TABLE `table51`
  MODIFY `table51ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table52`
--
ALTER TABLE `table52`
  MODIFY `table52ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table53`
--
ALTER TABLE `table53`
  MODIFY `table53ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table54`
--
ALTER TABLE `table54`
  MODIFY `table54ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

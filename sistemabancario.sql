-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 01:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemabancario`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `celular` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`cedula`, `nombre`, `email`, `fechaNacimiento`, `direccion`, `celular`) VALUES
(11256598, 'Manuela Lopera', 'manu@gmail.com', '1998-07-09', 'Valle', 3005984),
(400500600, 'Juan Pablo', 'juanpis@gmail.com', '1999-06-22', 'Dosquebradas', 31236954),
(1010564178, 'Tibon', 'tibon@gmail.com', '2007-05-07', 'Pereira', 30154245),
(1193115443, 'Steven Robledo', 'stev@gmail.com', '2000-05-22', 'Pereira', 31628931);

-- --------------------------------------------------------

--
-- Table structure for table `cuenta`
--

CREATE TABLE `cuenta` (
  `numero_cuenta` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `clave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuenta`
--

INSERT INTO `cuenta` (`numero_cuenta`, `saldo`, `clave`) VALUES
(11256598, 0, 4321),
(400500600, 198000, 4567),
(1010564178, 60000, 9876),
(1193115443, 246000, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `transaccion`
--

CREATE TABLE `transaccion` (
  `id` int(11) NOT NULL,
  `numero_cuenta` int(11) NOT NULL,
  `operacion` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaccion`
--

INSERT INTO `transaccion` (`id`, `numero_cuenta`, `operacion`, `valor`, `fecha`) VALUES
(1, 400500600, 'Consignacion', 498000, '2020-11-27'),
(2, 400500600, 'Transferencia', 300000, '2020-11-27'),
(3, 1193115443, 'Transferencia', 50000, '2020-11-27'),
(4, 1193115443, 'Consignacion', 548800, '2020-11-27'),
(5, 1193115443, 'Transferencia', 60000, '2020-11-27'),
(6, 1193115443, 'Retiro', 348000, '2020-11-27'),
(7, 1193115443, 'Retiro', 246000, '2020-11-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`numero_cuenta`);

--
-- Indexes for table `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

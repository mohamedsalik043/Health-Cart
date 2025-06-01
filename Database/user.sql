-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2025 at 04:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(250) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'SALIK', 'salik@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd'),
(2, 'mohamed salik', 'mohamed@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd'),
(3, 'dhurgesh', 'sd@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd'),
(5, 'imsalik', 'imsalik@gmail.com', '6325ae85d932504df0319223a2d5e7e7'),
(6, 'ronaldo', 'cr7@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(10, 'bagavathi', 'bagavathi@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(14, 'bagavathi', 'bagavathi@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(15, 'bagavathi', 'bagavathi@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(16, 'bagavathi', 'bagavathi@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(17, 'bagavathi', 'bagavathi@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(18, 'SALIK', 'salik@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd'),
(19, 'SALIK', 'salik@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd'),
(22, 'abivakas', 'ab@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(23, 'ms', 'bad@gmail.com', '202cb962ac59075b964b07152d234b70'),
(24, 'madhan', 'madhan@gmail.com', '8d5e957f297893487bd98fa830fa6413');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

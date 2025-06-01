-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2025 at 04:36 PM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(42, 'ABECMA', 35, 'abmac.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `sale_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`, `sale_date`) VALUES
(1, 'Mohamed Salik', 2542, 'mohamed@gmail.com', 'credit cart', 'burma colony', 'burma colony', 'virudhunagar', 'Tamil Nadu', 'India', 626001, 'ARICEPT-5MG (3) ', '120', '2025-03-17 22:16:12'),
(2, 'Mohamed Salik', 2121, 'sd@gmail.com', 'cash on delivery', 'burma colony', 'atp compound', 'virudhunagar', 'Tamil Nadu', 'India', 626001, 'ARICEPT-5MG (3) ', '120', '2025-03-17 22:19:06'),
(3, 'bagavathi', 142, 'sd@gmail.com', 'cash on delivery', '45', 'atp compound', 'virudhunagar', 'Tamil Nadu', 'India', 626001, 'ARICEPT-5MG (1) ', '40', '2025-03-17 22:24:13'),
(4, 'Mohamed Salik', 65101215, 'sd@gmail.com', 'cash on delivery', 'burma colony', 'burma colony', 'virudhunagar', 'Tamil Nadu', 'India', 626001, 'ARICEPT-5MG (3) ', '120', '2025-03-28 16:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT 'product.php',
  `stock` int(255) NOT NULL DEFAULT 50,
  `last_purchased` int(11) NOT NULL DEFAULT 0,
  `last_purchased_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `link`, `stock`, `last_purchased`, `last_purchased_date`) VALUES
(5, 'AVAMIN', 30, 'avamin.webp', 'product.php', 60, 2, '0000-00-00'),
(6, 'COUGH SYRAP', 60, 'cough.jpg', 'product.php', 58, 1, '0000-00-00'),
(7, 'PARACETAMOL', 20, 'paracit.jpg', 'product.php', 50, 0, '0000-00-00'),
(8, 'VITAMIN-C', 20, 'vc.jpeg', 'product.php', 64, 10, '0000-00-00'),
(9, 'D-TONE 20', 55, 'd-tine.jpg', 'product.php', 42, 0, '0000-00-00'),
(17, 'ASPRIN', 30, 'asprin.jpg', 'product.php', 50, 0, '0000-00-00'),
(19, 'ABECMA', 35, 'abmac.jpg', 'product.php', 41, 0, '0000-00-00'),
(20, 'ABILIFY', 30, 'abilify.jpg', 'product.php', 50, 0, '0000-00-00'),
(21, 'APRISO', 50, 'apriso.jpg', 'product.php', 50, 0, '0000-00-00'),
(22, 'ARICEPT-5MG', 40, 'Aricept-5mg-Tablet.jpg', 'product.php', 34, 0, '0000-00-00'),
(23, 'ATARAX-10MG', 30, 'atarax-10mg.jpg', 'product.php', 49, 0, '0000-00-00'),
(24, 'AUBAGIO-14MG', 30, 'aubagio-teriflunomide-tablet.jpg', 'product.php', 48, 0, '0000-00-00'),
(25, 'CABENUVA', 50, 'Cabenuva.jpg', 'product.php', 50, 0, '0000-00-00'),
(26, 'PANADOL', 50, 'panadol.jpg', 'product.php', 50, 0, '0000-00-00'),
(32, 'NUROKIND', 40, 'nurokind.jpeg', 'product.php', 50, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `username`, `rating`, `comment`, `created_at`) VALUES
(1, 'mohan', 5, 'nice', '2025-04-06 15:28:17'),
(2, 'salik', 5, 'good services..\r\n', '2025-04-06 16:04:12'),
(6, 'ms', 3, 'quality is good', '2025-04-06 16:18:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

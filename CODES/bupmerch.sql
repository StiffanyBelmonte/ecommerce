-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 04:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bupmerch`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(60) NOT NULL,
  `user_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `user_id`, `image`, `quantity`) VALUES
(36, 'BUP Labels', 220, 25, 'buplabels.png', 1),
(38, 'bangus', 123, 31, 'BU Hoodie.jpg', 1),
(39, 'BUP Lanyard', 150, 31, 'lanyard.jpg', 1),
(40, 'BUP Labels', 220, 26, 'buplabels.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `method` varchar(100) NOT NULL,
  `year_block` varchar(10) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `reference_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `number`, `email`, `method`, `year_block`, `total_products`, `total_price`, `date_ordered`, `order_status`, `reference_number`) VALUES
(1, 31, 'Clarence', '09467145333', 'clarence@gmail.com', 'Cash', 'BSIT', 'BUP Labels (1) , bangus (1) , BUP Lanyard (1) ', '493', '2023-05-13 13:59:20', 'Approved', '9X2HCUW1EZ0'),
(2, 25, 'Clarence', '09467145333', 'clarence@gmail.com', 'Cash', 'BSIT 3B', 'BUP Labels (1) , bangus (1) , BUP Lanyard (1) ', '493', '2023-05-13 15:53:59', 'Approved', 'O6XHM89GBP7'),
(3, 26, 'stiffany', '09482462816', 'perniastiffany@gmail.com', 'Cash', 'bsit', 'BUP Labels (1) , bangus (1) , BUP Lanyard (1) , BUP Labels (1) ', '713', '2023-05-14 02:10:16', 'Approved', 'Z39RSU06K8A'),
(4, 26, 'Christian', '09876543434', 'perniastiffany@gmail.com', 'Cash', 'y', 'BUP Labels (1) , bangus (1) , BUP Lanyard (1) , BUP Labels (1) ', '713', '2023-05-14 02:12:26', 'Approved', '3XGHEJVPUMW'),
(5, 26, 'stiffany', '09875678575', 'perniastiffany@gmail.com', 'Cash', 'bsit3b', 'BUP Labels (1) ', '220', '2023-05-14 02:25:37', 'Approved', '7VKJLNRZUWF');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` int(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(16, 'BUP Labels', 220, 'buplabels.png'),
(18, 'BUP Lanyard', 150, 'lanyard.jpg'),
(19, 'BU Blue Shirt', 250, 'bu blue shirt.jpg'),
(20, 'BU Hoodie', 550, 'BU Hoodie.jpg'),
(21, 'BU White Shirt', 220, 'bu white shirt.jpg'),
(22, 'Tatak Bueno', 250, 'tatak bueno.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` varchar(11) NOT NULL,
  `block` varchar(1) NOT NULL,
  `user_status` varchar(1) NOT NULL COMMENT 'A = Active / I = Inactive',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_type` varchar(1) NOT NULL COMMENT 'A = Admin / C = Client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `fullname`, `course`, `year`, `block`, `user_status`, `date_added`, `user_type`) VALUES
(3, 'christian.competente@email.com', 'qwertyuiop1234567890', 'Christian Competente', 'BS Information Technology', '3rd', 'B', 'A', '2023-03-27 07:42:16', 'C'),
(4, 'perniastiffany@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Stiffany Belmonte', 'BSIT', '3', 'B', '', '2023-03-29 03:30:23', ''),
(5, 'stif.b@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Stiffany Belmonte', 'BSIT', '2', 'B', 'A', '2023-03-29 03:53:26', ''),
(6, 'bettle.baldo@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Bettle Baldo', 'BSIT', '3', 'B', 'A', '2023-03-29 04:58:05', ''),
(7, 'christian@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Christian Competente', 'BSIT', '3', 'B', 'A', '2023-03-29 05:39:37', ''),
(11, 'perniastiffany@gmail.com', '202cb962ac59075b964b07152d234b70', 'Stiffany Belmonte', 'BSIT', '3', 'B', 'A', '2023-03-29 06:28:19', ''),
(12, 'perniastiffany@gmail.com', '202cb962ac59075b964b07152d234b70', 'Stiffany Belmonte', 'BSIT', '3', 'b', 'A', '2023-03-29 06:31:09', ''),
(13, 'perniastiffany@gmail.com', '202cb962ac59075b964b07152d234b70', 'Stiffany Belmonte', 'BSIT', '1', 'B', 'A', '2023-03-29 06:36:18', ''),
(15, 'sabadoangelica17@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Angelica Sabado', 'BSIT', '3', 'B', 'A', '2023-03-29 06:59:48', ''),
(16, 'mcsano@gmail.com', '202cb962ac59075b964b07152d234b70', 'Marc Chester', 'BSIT', '3', 'B', 'A', '2023-03-29 07:08:10', ''),
(18, 'christian.dimasayao@gmail.com', '0192023a7bbd73250516f069df18b500', 'Christian Dimasayao', '', '', '', 'A', '2023-03-29 07:48:35', 'A'),
(19, 'christian.dimasayao@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Christian Dimasayao', 'BSIT', '3', 'B', 'A', '2023-03-30 04:43:43', 'C'),
(20, 'christian.dimasayao@gmail.com', '202cb962ac59075b964b07152d234b70', 'Christian Dimasayao', 'BSIT', '3', 'B', 'A', '2023-03-30 05:56:57', 'C'),
(21, 'mc@gmail.com', '202cb962ac59075b964b07152d234b70', 'mc', '', '', '', 'A', '2023-03-30 06:54:09', 'A'),
(22, 'bt@gmail.com', '202cb962ac59075b964b07152d234b70', 'Bettle Baldo', '', '', '', 'A', '2023-03-30 07:31:14', 'A'),
(23, 'cj@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Christian Dimasayao', 'BSIT', '2', 'B', 'A', '2023-03-30 09:45:34', 'C'),
(24, 'cjd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Christian Dimasayao', '', '', '', 'A', '2023-03-30 09:49:37', 'A'),
(25, 'cjbd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'cj', 'BSIT', '3', 'B', 'A', '2023-03-30 10:19:12', 'C'),
(26, 'perniastiffany@gmail.com', '3805248410673a8be6aa4807e61fb5ae', 'Stiffany Belmonte', 'BSIT', '3', 'b', 'A', '2023-05-07 02:08:36', 'C'),
(27, 'naj@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nagel Ranosa', 'BSIT', '3', 'B', 'A', '2023-05-09 04:27:34', 'C'),
(28, 'nagel@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Angelica Sabado', 'BSIT', '3', 'B', 'A', '2023-05-12 07:45:30', 'C'),
(29, 'sab@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Angelica Sabado', 'bsit', '3', 'B', 'A', '2023-05-12 08:56:54', 'C'),
(30, 'cjj@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'christian jay dimasayao', 'BSIT', '3', 'B', 'A', '2023-05-13 04:20:48', 'C'),
(31, 'clarence@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'John Clarence Morante De Guzman', 'BSIT', '3', 'B', 'A', '2023-05-13 13:25:28', 'C');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

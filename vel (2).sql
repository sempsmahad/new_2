-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 08:02 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vel`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cashier_id` int(34) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(34) NOT NULL,
  `purchase_price` int(255) NOT NULL,
  `sale_price` int(34) NOT NULL,
  `in_date` date NOT NULL,
  `expiry_day` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `name`, `category`, `quantity`, `purchase_price`, `sale_price`, `in_date`, `expiry_day`, `image`, `supplier`) VALUES
(1, 'samsung', 'Mobile', 41, 800, 1000, '2020-02-14', '2020-10-22', '', ''),
(2, 'Hard disk', 'Computer', 100, 100, 200, '2020-02-26', '2020-07-10', '', ''),
(3, 'Nokia Mobile Lumia', 'Mobile', 55, 6756757, 40000000, '2020-02-26', '2020-07-10', '', ''),
(4, 'Redmi 5A', 'Mobile', 41, 6756757, 54000000, '2020-02-14', '2020-10-22', '', ''),
(5, 'Apple MacBook Pro', 'Computer', 33, 2000000, 90000000, '2020-02-14', '2020-07-10', '', ''),
(6, 'Apple iPad Pro', 'tablet', 41, 2000000, 30000000, '2020-02-26', '2020-10-22', '', ''),
(7, 'Apple iPad Air', 'tablet', 34, 2000000, 3500000, '2020-02-14', '2020-10-22', '', ''),
(8, 'Samsung Galaxy Tab', 'tablet', 99, 2000000, 45000000, '2020-02-14', '2020-10-22', '', ''),
(9, 'Lenovo Miix 630 Laptop', 'Laptop', 77, 2000000, 3400000, '2020-02-26', '2020-07-10', '', ''),
(10, 'Lenovo ThinkPad Helix', 'Laptop', 3, 2000000, 10000000, '2020-02-14', '2020-07-10', '', ''),
(12, 'Nokia 2 - Android - 8GB', 'Mobile', 100, 6756757, 29000000, '2020-02-26', '2020-07-10', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `reg_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(34) NOT NULL,
  `affiliation` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `last_logged_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `type`, `affiliation`, `image`, `join_date`, `last_logged_in`) VALUES
(1, 'mhd', 'semps', 'mhdsemps@gmail.com', 'mhdsemps', '$2y$10$pyI8Dvdp9XHhZdbWdikDT.1FReUWWX0wR/YuxaQecI.n2P2ufhTcW', 'admin', 0, '', '0000-00-00', '0000-00-00'),
(2, 'faizan', 'monday', 'faizan@gmail.com', 'fay z', '$2y$10$loqWFpq5xYJyMyxnhVOBTOyrJfjUEU4utZBqcZEgi7LTsAdX3OPai', 'manager', 0, '', '0000-00-00', '0000-00-00'),
(4, 'john', 'doe', 'jd@gmail.com', 'john_doe', '$2y$10$9k8/lwEjHC5gSO5nTUMIgOVa/8jyvbhlYki.P9JqQa.4k424Q25bG', 'cashier', 6, '', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

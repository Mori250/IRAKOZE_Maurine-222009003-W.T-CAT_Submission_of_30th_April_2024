-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 03:51 PM
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
-- Database: `farm-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `agronomist`
--

CREATE TABLE `agronomist` (
  `agronomist_id` int(50) NOT NULL,
  `agronomist_names` varchar(100) NOT NULL,
  `agronomist_tel` int(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agronomist`
--

INSERT INTO `agronomist` (`agronomist_id`, `agronomist_names`, `agronomist_tel`, `location`, `degree`) VALUES
(1, 'maiytsdfgh', 0, 'huye', 'masters'),
(6, 'munezero blandice', 98765434, 'kayonza', 'A0'),
(7, 'munezero blandice', 0, 'kayonza', 'A0');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `BuyerID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`BuyerID`, `FirstName`, `LastName`, `Email`, `Phone`, `Address`) VALUES
(1, 'Momo', 'Juwayote', 'yote@gmail.com\r\n', '0788889078', 'KK 250 pbox'),
(5, 'Umutesi', '', 'aline@gmail.com', '9875433456', 'Kigali-Rwanda'),
(6, 'Kalisa', 'Camille', 'camille@gmail.com', '98976789', 'Masaka-Kigali'),
(8, 'claire', 'masengesho', 'jeanclaire@gmail.com', '9756783456', 'Ndago'),
(9, 'Mami', 'Fionah', 'mami@gmail.com', '89876555', 'Kigali-Rwanda'),
(10, 'teta ', 'hoho', 'hoho@mail.com', '98765432', 'Gisenyi'),
(11, 'teta ', 'hoho', 'hoho@mail.com', '98765432', 'Gisenyi'),
(12, 'teta ', 'hoho', 'hoho@mail.com', '98765432', 'Gisenyi'),
(13, 'teta ', 'hoho', 'hoho@mail.com', '98765432', 'Gisenyi'),
(14, 'teta ', 'hoho', 'hoho@mail.com', '9876543234', 'huye'),
(15, 'teta ', 'hoho', 'hoho@mail.com', '9876543234', 'huye'),
(16, 'sdfgh', 'vbnm,', 'zxcvb@gmail.com', '565432', 'kigali/huye'),
(17, 'rwema', 'fred', 'fred@gmail.com', '98765456', 'musanze');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `FarmerID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`FarmerID`, `FirstName`, `LastName`, `Email`, `Phone`, `Address`) VALUES
(1, 'Kiki', 'Mulisa', 'mulisa@gmail.com', '079977678890', 'kigali Rwanda'),
(2, 'Kiki', 'Mulisa', 'mulisa@gmail.com', '07988856790', 'Kigali Rwanda'),
(12, 'Umutesi', 'masengesho', 'camille@gmail.com', '12345678', 'Kigali-Rwanda'),
(13, 'claire', 'masengesho', 'jeanclaire@gmail.com', '98765432123', 'huye'),
(15, 'Amina', 'Annet', 'annet@gmail.com', '9876543345', 'Gisenyi');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email_adress` varchar(40) NOT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `first_name`, `last_name`, `email_adress`, `telephone`) VALUES
(1, 'Umulisa', 'Diane', 'umulisa@gmail.com', '789987654'),
(2, 'kagabo', 'peter', 'peter@gmail.com', '987654345'),
(7, 'kalisa ', 'david', 'kalisa@gmail.com', '788807650'),
(10, 'caddette', 'bucura', 'cadette@gmail.com', '988888800');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `production_id` int(46) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `quantity` int(50) NOT NULL,
  `unit_price` int(250) NOT NULL,
  `total_price` int(50) NOT NULL,
  `production_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `product_name`, `quantity`, `unit_price`, `total_price`, `production_date`) VALUES
(1, 'banana', 600, 50, 6000000, '2024'),
(2, 'watermelon', 50, 500, 5678, '2024'),
(3, 'beans', 34, 43, 45678, '2024');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `UploadDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Price`, `Quantity`, `UploadDate`) VALUES
(1, 'Kalisa', 6000.00, 5, '0000-00-00'),
(2, 'Kalisa', 6000.00, 5, '2024-04-10'),
(6, 'Carrots', 333.00, 33, '2024-04-27'),
(7, 'Carrots', 333.00, 33, '2024-04-27'),
(8, 'Apple', 45.00, 555, '2024-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `product_name`, `quantity`, `unit_price`, `total_price`, `purchase_date`) VALUES
(1, 'Beans', 30, 300, 9000, '2002-12-12'),
(2, 'maize', 56, 1200, 67200, '0000-00-00'),
(3, 'watermelon', 43, 1200, 51600, '0000-00-00'),
(4, 'watermelon', 43, 1200, 51600, '0000-00-00'),
(5, 'magi', 5, 56, 280, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(10) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `quantity` int(250) NOT NULL,
  `unit_price` int(250) NOT NULL,
  `total_price` int(100) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_name`, `quantity`, `unit_price`, `total_price`, `sales_date`) VALUES
(1, 'Beans', 28, 700, 19600, '2021-12-12'),
(2, 'rice', 800, 1200, 6700000, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `names` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `names`, `username`, `password`, `email`) VALUES
(1, 'LOLO', 'LOLIE', 'lolie123', 'lolie@gmail.com'),
(2, 'momo', '22200654', '1234567890', 'momo@gmail.com'),
(3, 'asumana sisi', '90909090', '09876', ''),
(4, 'Agabe ritah', '', '12345', 'momo@gmail.com'),
(5, 'Agabe ritah', 'agabe1233', '12345', ''),
(6, 'Agabe ritah', 'agabe1233', '12345', 'agabe@gmail.com'),
(12, 'maurine', 'maurine123', '12345', 'irakozemaurine@gmail.com'),
(13, 'ghjkh', 'tyu', '1234567', 'agabe@gmail.com'),
(17, 'ghjkh', 'tyu', '1234567', 'agabe@gmail.com'),
(18, 'mimi toni', 'mimi12', '202020', 'toni@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agronomist`
--
ALTER TABLE `agronomist`
  ADD PRIMARY KEY (`agronomist_id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`BuyerID`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`FarmerID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`production_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agronomist`
--
ALTER TABLE `agronomist`
  MODIFY `agronomist_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `BuyerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `FarmerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `production_id` int(46) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

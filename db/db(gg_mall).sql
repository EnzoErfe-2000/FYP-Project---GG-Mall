-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 06:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gg_mall`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_emailAddress` varchar(255) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_contactNo` varchar(10) NOT NULL,
  `admin_createdDate` datetime NOT NULL,
  `admin_modifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_emailAddress`, `admin_password`, `admin_contactNo`, `admin_createdDate`, `admin_modifiedDate`) VALUES
(0001, 'Enzo Erfe', 'enzoerfe2000@gmail.com', 'admin123', '0103844814', '2021-08-26 09:49:35', '2021-08-26 09:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email_address` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_dateOfBirth` date DEFAULT NULL,
  `customer_createdDate` datetime DEFAULT NULL,
  `customer_modifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email_address`, `customer_password`, `customer_dateOfBirth`, `customer_createdDate`, `customer_modifiedDate`) VALUES
(0001, 'Enzo Joaquin Itona Erfe', 'enzonshadow@gmail.com', 'password', '2000-12-09', '2021-08-26 09:30:31', '2021-08-26 09:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `customer_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `order_creationDate` datetime NOT NULL,
  `order_dueDate` date NOT NULL,
  `order_estShipDate` date NOT NULL,
  `order_status` varchar(25) NOT NULL,
  `order_shippingAddress` varchar(255) NOT NULL,
  `order_billingAddress` varchar(255) NOT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `order_paymentStatus` varchar(25) NOT NULL,
  `order_modifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_regularPrice` decimal(10,2) NOT NULL,
  `product_listedPrice` decimal(10,2) NOT NULL,
  `product_discountRate` decimal(10,3) NOT NULL,
  `product_saleStart` datetime NOT NULL,
  `product_saleEnd` datetime NOT NULL,
  `product_availability` tinyint(4) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_isUnlisted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_brand`, `product_regularPrice`, `product_listedPrice`, `product_discountRate`, `product_saleStart`, `product_saleEnd`, `product_availability`, `product_stock`, `product_isUnlisted`) VALUES
(00001, 'TEST_PRODUCT_01', 'TEST_BRAND_01', '100.00', '50.00', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `FOREIGN` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 05:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp-project`
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
(0001, 'Enzo Joaquin Itona Erfe', 'enzonshadow@gmail.com', '$2y$10$IKL0ruJifFPHcnWH6Pa5R.kOVc.npFvUPBMY720j5CXoKxDISIVB.', '2000-12-09', '2021-08-26 09:30:31', '2021-08-26 09:30:32'),
(0002, 'bjm', 'behjiamin@gmail.com', '$2a$12$kg6r3rP.zzalQtWk4fyBfO1WcMEGd9qjSc3m/O2o838WKyznVlaU6', NULL, NULL, NULL),
(0003, 'Bjm', 'behjiamin9@gmail.com', '$2y$10$kMyk1hC1keC6E4DjD/t/5OpMfhyGv8bw0ef37FtT/DfBIiBaD6YYq', NULL, NULL, NULL),
(0004, 'Bjmm', 'bjm@gmail.com', '$2y$10$xaIkPI5X9HxuWT4YLd9hdut66neUJ6aQaf8gfnzN9n/g7/MEuxAWS', NULL, NULL, NULL);

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
INSERT INTO `product` (`product_id`, `product_name`, `product_brand`, `product_regularPrice`, `product_listedPrice`, `product_discountRate`, `product_saleStart`, `product_saleEnd`, `product_availability`, `product_stock`, `product_isUnlisted`) VALUES
(00001, 'SteelSeries_Arctis_5_Surround_RGB_Gaming_Headset', 'SteelSeries', '398.90', '398.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00002, 'Razer_Blackshark_V2_X_Esports_Gaming_Headset', 'Razer', '218.90', '218.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00003, 'Razer_Kraken_Bluetooth_Kitty_Edition_Wireless_Gaming_RGB_Headset', 'Razer', '410.90', '410.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00004, 'SteelSeries_Apex_3_Water_Resistant_Gaming_Keyboard', 'SteelSeries', '249.90', '249.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00005, 'Cooler_Master_CK530_V2_TKL_RGB_Gaming_Keyboard', 'Cooler_Master', '217.90', '217.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00006, 'Razer_BlackWidow_Green_Mechanical_Gaming_Keyboard', 'Razer', '361.90', '361.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00007, 'Logitech_G502_Hero_HighPerformance_Gaming_Mouse', 'Logitech', '178.90', '178.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00008, 'Razer_DeathAdder_Essential_Gaming_Mouse', 'Razer', '96.90', '96.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00009, 'Steelseries_Aerox_3_Wireless_Lightweight_Gaming_Mouse', 'Steelseries', '359.90', '359.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00010, 'Logitech_M170_Wireless_Mouse', 'Logitech', '29.90', '29.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00011, 'Logitech_MX_Master_3_Wireless_Mouse', 'Logitech', '424.90', '424.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00012, 'Logitech_M325_Wireless_Mouse', 'Logitech', '59.90', '59.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00013, 'Logitech_K380_Slim_MultiDevice_Keyboard', 'Logitech', '139.90', '139.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00014, 'Microsoft_Bluetooth_Desktop_Combo_Keyboard', 'Microsoft', '257.90', '257.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00015, 'Targus_KB55_MultiPlatform_Bluetooth', 'Targus', '105.90', '105.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00016, 'Logitech_C922_Pro_HD_Stream_Webcam', 'Logitech', '373.90', '373.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00017, 'J5Create_USB_HD_Webcam_with_360_Rotation_JVCU100', 'J5Create', '177.90', '177.90', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00018, 'MSI_Modern_15', 'MSI', '2799.00', '2799.00', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00019, 'Acer_Swift_3x', 'Acer', '4259.00', '4259.00', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00020, 'Asus_ZenBook_13', 'Asus', '4889.00', '4889.00', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00021, 'MSI_GF63_Thin', 'MSI', '3499.00', '3499.00', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00022, 'Asus_TUF', 'Asus', '4799.00', '4799.00', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1),
(00023, 'Acer_Nitro_5', 'Acer', '4149.00', '4149.00', '0.500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 50, 1);
-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `product_listedPrice` decimal(10,0) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `cart_dateAdded` datetime NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `FOREIGN` (`product_id`);

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
  MODIFY `customer_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_idfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

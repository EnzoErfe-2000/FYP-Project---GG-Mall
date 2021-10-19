-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 11:46 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

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
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `unit_no` varchar(50) DEFAULT NULL,
  `street_address` varchar(200) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postcode` int(10) DEFAULT NULL,
  `customer_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`unit_no`, `street_address`, `country`, `state`, `postcode`, `customer_id`) VALUES
('No 26', 'Taman GG', 'Malaysia', 'Melaka', 76450, 0007);

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
(0001, 'Enzo Erfe', 'enzoerfe2000@gmail.com', 'admin123', '0103844814', '2021-08-26 09:49:35', '2021-08-26 09:49:35'),
(0002, 'jm', 'behjiamin9@gmail.com', 'jm123123', '0111094498', '2021-10-08 15:22:59', '2021-10-08 15:22:59');

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
(0002, 'bjm', 'bjm@gmail.com', '$2a$12$hrdmUfPEko6hcvuV9Rj5iO/85crvLsmpzXbUMwUxFILpP9OgMttGe', '0000-00-00', NULL, NULL),
(0003, 'Bjm', 'behjiamin9@gmail.com', '$2y$10$4VVaMJXFPSodRseS65vSU.RTiEWCbY0IKkGowPF2wBmVkg4oHtjmq', NULL, NULL, NULL),
(0004, 'Bjmtest01', 'bjmtest01@gmail.com', '$2y$10$rcpX6c3x99j1SNVOn4Ph/eMraHMtIeVpdVSuoNnxet0dyT/WSMs6G', NULL, NULL, NULL),
(0006, 'Adelene01', 'adeleneee@gmail.com', '$2y$10$WHDFV2E03WBlHH25H5PvaOml9KpIFjvCikwC4uJLTpP/KrhTZ5zWq', NULL, NULL, NULL),
(0007, 'Ade', 'eepeiying@gmail.com', '$2y$10$ZtMmw7hUM08319zju6HK3uJrTUKWChHdA0xVpi.4yjwZwAQXMphUu', NULL, NULL, NULL);

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
  `product_nameExtra` varchar(255) NOT NULL,
  `product_fullName` varchar(255) NOT NULL,
  `product_category0` varchar(255) NOT NULL,
  `product_category1` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_description` varchar(510) DEFAULT NULL,
  `product_regularPrice` decimal(10,2) NOT NULL,
  `product_listedPrice` decimal(10,2) NOT NULL,
  `product_discountRate` decimal(10,2) NOT NULL,
  `product_availability` tinyint(4) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_img` text CHARACTER SET utf8 NOT NULL,
  `product_bigSwiperImg` text CHARACTER SET utf8 NOT NULL,
  `product_swiperImg` text CHARACTER SET utf8 NOT NULL,
  `product_dateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `product_isUnlisted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_nameExtra`, `product_fullName`, `product_category0`, `product_category1`, `product_brand`, `product_description`, `product_regularPrice`, `product_listedPrice`, `product_discountRate`, `product_availability`, `product_stock`, `product_img`, `product_bigSwiperImg`, `product_swiperImg`, `product_dateAdded`, `product_isUnlisted`) VALUES
(10000, 'TEST_PRODUCT_01', '_FULL_NAME', 'TEST_PRODUCT_01_FULL_NAME', 'CATEGORY_0', 'CATEGORY_1', 'TEST_BRAND_01', '• Description 1<br>• Description 2<br>• Description 3<br>• Description 4<br>• Description 5<br>', '100.00', '50.00', '0.50', 0, 5, 'Test_product_01~1.png', 'Test_product_01.png Test_product_02.png Test_product_03.png', 'Test_product_01~1.png Test_product_02~1.png Test_product_03~1.png', '2021-09-21 00:22:44', 1),
(10001, 'SteelSeries Arctis 5 Surround RGB Gaming Headset', '', 'SteelSeries Arctis 5 Surround RGB Gaming Headset', 'Gaming', 'Headset', 'SteelSeries', '• Best mic in gaming: the Discord-certified Clearcast bidirectional microphone<br>• Hear stunning detail in all games with award-winning Arctis sound<br>• Next-generation DTS Headphone:X v2.0 surround sound<br>• Balance Game and Chat Audio with the USB ChatMix dial', '398.90', '398.90', '0.50', 0, 50, 'SteelSeriesArctis571_RGB_GH~1.png', 'SteelSeriesArctis571_RGB_GH.png SteelSeriesArctis571_RGB_GH_02.png SteelSeriesArctis571_RGB_GH_03.png SteelSeriesArctis571_RGB_GH_04.png', 'SteelSeriesArctis571_RGB_GH~1.png SteelSeriesArctis571_RGB_GH_02~1.png SteelSeriesArctis571_RGB_GH_03~1.png SteelSeriesArctis571_RGB_GH_04~1.png', '2021-09-26 15:34:35', 1),
(10002, 'Razer Blackshark V2 X Esports Gaming Headset', '', 'Razer Blackshark V2 X Esports Gaming Headset', 'Gaming', 'Headset', 'Razer', '• Razer™ TriForce 50mm Drivers<br>• Razer™ HyperClear Cardioid Microphone<br>• Advanced Passive Noise Cancellation<br>• 7.1 Surround Sound<br>• Frequency response: 12Hz – 28kHz', '218.90', '218.90', '0.50', 0, 50, 'RazerBlacksharkV2X_GH~1.png', 'RazerBlacksharkV2X_GH.png', 'RazerBlacksharkV2X_GH~1.png', '2021-09-26 15:34:35', 1),
(10003, 'Razer Kraken Bluetooth Kitty Edition Wireless Gaming RGB Headset', '', 'Razer Kraken Bluetooth Kitty Edition Wireless Gaming RGB Headset', 'Gaming', 'Headset', 'Razer', '• Kitty ears and earcups powered by Razer Chroma RGB<br>• Bluetooth 5.0<br>• 40ms low latency connection<br>• Battery life – Up to 20 hours with Lighting on / Up to 50 hours with Lighting off<br>• Driver – 40mm', '410.90', '410.90', '0.50', 0, 50, 'RazerKrakenBluetoothKitty_GH~1.png', 'RazerKrakenBluetoothKitty_GH.png', 'RazerKrakenBluetoothKitty_GH~1.png', '2021-09-26 15:34:35', 0),
(10004, 'SteelSeries Apex 3 Water Resistant Gaming Keyboard', '', 'SteelSeries Apex 3 Water Resistant Gaming Keyboard', 'Gaming', 'Keyboard', 'SteelSeries', '• IP32 water resistant for protection against spills<br>• Customizable 10-zone RGB illumination reacts to games and Discord<br>• Whisper quiet gaming switches last for over 20 million keypresses<br>• Premium magnetic wrist rest provides full palm support and comfortable', '249.90', '249.90', '0.50', 0, 50, 'Apex3_kb~1.png', 'Apex3_kb.png', 'Apex3~1_kb.png', '2021-09-26 15:34:35', 0),
(10005, 'Cooler Master CK530 V2 TKL RGB Gaming Keyboard', '', 'Cooler Master CK530 V2 TKL RGB Gaming Keyboard', 'Gaming', 'Keyboard', 'Cooler Master', '• IP32 water resistant for protection against spills<br>• Customizable 10-zone RGB illumination reacts to games and Discord<br>• Whisper quiet gaming switches last for over 20 million keypresses<br>• Premium magnetic wrist rest provides full palm support and comfortable<br>• RGB Backlighting<br>• Durable Brushed Aluminum Design<br>• Mechanical Switches for 50 million+ keypresses<br>• On-the-Fly and Software Control<br>• Customization Via Software', '217.90', '217.90', '0.50', 0, 50, 'CoolerMasterCK530_kb~1.png', 'CoolerMasterCK530_kb.png', 'CoolerMasterCK530_kb~1.png', '2021-09-26 15:34:35', 0),
(10006, 'Razer BlackWidow Green Mechanical Gaming Keyboard', '', 'Razer BlackWidow Green Mechanical Gaming Keyboard', 'Gaming', 'Keyboard', 'Razer', '• Tactile and Clicky<br>• Immersive Gaming With Razer Chroma<br>• Unlock Extended Controls With Razer Hypershift', '361.90', '361.90', '0.50', 0, 50, 'RazerBlackWidow_kb~1.png', 'RazerBlackWidow_kb.png', 'RazerBlackWidow_kb~1.png', '2021-09-26 15:34:35', 0),
(10007, 'Logitech G502 Hero HighPerformance Gaming Mouse', '', 'Logitech G502 Hero HighPerformance Gaming Mouse', 'Gaming', 'Mouse', 'Logitech', '• HERO 25K DPI<br>• 11 Buttons Fully Programmable<br>• Five 3.6g adjustable weights<br>• Weight – 121g (mouse only)<br>• USB report rate – 1ms', '178.90', '178.90', '0.50', 0, 50, 'LogitechG502_gm~1.png', 'LogitechG502_gm.png', 'LogitechG502_gm~1.png', '2021-09-26 15:34:35', 0),
(10008, 'Razer DeathAdder Essential Gaming Mouse', '', 'Razer DeathAdder Essential Gaming Mouse', 'Gaming', 'Mouse', 'Razer', '• True 6,400 DPI Optical Sensor<br>• Form factor- Right-Handed<br>• Independently programmable Hyperesponse buttons<br>• Weight – 96g', '96.90', '96.90', '0.50', 0, 50, 'RazerDeathAdderWired_gm~1.png', 'RazerDeathAdderWired_gm.png', 'RazerDeathAdderWired_gm~1.png', '2021-09-26 15:34:35', 0),
(10009, 'Steelseries Aerox 3 Wireless Lightweight Gaming Mouse', '', 'Steelseries Aerox 3 Wireless Lightweight Gaming Mouse', 'Gaming', 'Mouse', 'Steelseries', '• Ultra lightweight 57g design for effortlessly fast gameplay<br>• Super mesh USB-C detachable cable for less drag<br>• PTFE glide skates for silky smooth mouse movements<br>• Pixel-perfect TrueMove Core optical gaming sensor', '359.90', '359.90', '0.50', 0, 50, 'SteelseriesAerox3_gm~1.png', 'SteelseriesAerox3_gm.png', 'SteelseriesAerox3_gm~1.png', '2021-09-26 15:34:35', 0),
(10010, 'Logitech M170 Wireless Mouse', '', 'Logitech M170 Wireless Mouse', 'Office', 'Mouse', 'Logitech', '• Smooth optical tracking<br>• Number of buttons: 3 (Left/Right-click, Middle click)<br>• Connection Type: 2.4 GHz wireless connection<br>• Wireless range: 10 m', '29.90', '29.90', '0.50', 0, 50, 'LogitechM170_om~1.png', 'LogitechM170_om.png', 'LogitechM170_om~1.png', '2021-09-26 15:34:35', 0),
(10011, 'Logitech MX Master 3 Wireless_Mouse', '', 'Logitech MX Master 3 Wireless_Mouse', 'Office', 'Mouse', 'Logitech', '• 7 buttons: <br> Left/Right-click, Back/Forward, App-Switch, Wheel mode-shift, Middle click<br>• Wireless operating distance: 10 m<br>• Rechargeable Li-Po (500 mAh) battery', '424.90', '424.90', '0.50', 0, 50, 'LogitechtMXMaster_om~1.png', 'LogitechtMXMaster_om.png', 'LogitechtMXMaster_om~1.png', '2021-09-26 15:34:35', 0),
(10012, 'Logitech M325 Wireless Mouse', '', 'Logitech M325 Wireless Mouse', 'Office', 'Mouse', 'Logitech', '• Smooth optical tracking<br>• DPI (Min/Max): 1000±<br>• Number of buttons: 5<br>• Connection Type: 2.4 GHz wireless connection<br>• Wireless range: 393.7 in (10m）', '59.90', '59.90', '0.50', 0, 50, 'LogitechM325_om~1.png', 'LogitechM325_om.png', 'LogitechM325_om~1.png', '2021-09-26 15:34:35', 0),
(10013, 'Logitech K380 Slim MultiDevice Keyboard', '', 'Logitech K380 Slim MultiDevice Keyboard', 'Office', 'Keyboard', 'Logitech', 'Make any space minimalist, modern, and versatile with the K380 Slim Multi-Device—an ultra-thin, design-forward keyboard perfect for typing on your computer, smartphone, tablet, and more.<br>It’s the ideal companion for your everyday multitasking.', '139.90', '139.90', '0.50', 0, 50, 'k380multidevicebluetoothkeyboard_ok~1.png', 'k380multidevicebluetoothkeyboard_ok.png', 'k380multidevicebluetoothkeyboard_ok~1.png', '2021-09-26 15:34:35', 0),
(10014, 'Microsoft Bluetooth Desktop Combo Keyboard', '', 'Microsoft Bluetooth Desktop Combo Keyboard', 'Office', 'Keyboard', 'Microsoft', '• Slim, modern design at an exceptional value<br>• Save time and be more productive<br>• Connects wirelessly', '257.90', '257.90', '0.50', 0, 50, 'MicrosoftBluetoothDesktopCombo_ok~1.png', 'MicrosoftBluetoothDesktopCombo_ok.png', 'MicrosoftBluetoothDesktopCombo_ok~1.png', '2021-09-26 15:34:35', 0),
(10015, 'Targus KB55 MultiPlatform Bluetooth', '', 'Targus KB55 MultiPlatform Bluetooth', 'Office', 'Keyboard', 'Targus', '• Multi-platform compatibility works with Windows, Mac, iOS, and Android<br>• Bluetooth 3.0 wireless connection with 10-meter (33’) range<br>• Scissor-switch keys for a better typing response<br>• Battery life indicator lets you know when it’s time to switch the batteries<br>• On/off power button<br>• 2 AAA batteries included', '105.90', '105.90', '0.50', 0, 50, 'TargusKB55_ok~1.png', 'TargusKB55_ok.png', 'TargusKB55_ok~1.png', '2021-09-26 15:34:35', 0),
(10016, 'Logitech C922 Pro HD Stream Webcam', '', 'Logitech C922 Pro HD Stream Webcam', 'Office', 'Webcam', 'Logitech', '• Connect with superior clarity every time you go live on channels.<br>• Stream at Full 1080p at 30fps or hyperfast HD 720p at 60fps.<br>• Broadcast masterfully with reliable no-drop audio & autofocus.', '373.90', '373.90', '0.50', 0, 50, 'LogitechC922Pro_webcam~1.png', 'LogitechC922Pro_webcam.png', 'LogitechC922Pro_webcam~1.png', '2021-09-26 15:34:35', 0),
(10017, 'J5Create USB HD Webcam with 360 Rotation JVCU100', '', 'J5Create USB HD Webcam with 360 Rotation JVCU100', 'Office', 'Webcam', 'J5Create', '• Display Fov 82°<br>• Effective Pixels 1932(H) × 1088(V)<br>• Frame Rate 1080P/ 720P/ 640P at 30FPS<br>• Max Display Refresh Rate 30 Hz<br>• Megapixels 2 million pixels (2MP)<br>• Microphone Built-in high-fidelity microphone', '177.90', '177.90', '0.50', 0, 50, 'J5CreateUSB_webcam~1.png', 'J5CreateUSB_webcam.png', 'J5CreateUSB_webcam~1.png', '2021-09-26 15:34:35', 0),
(10018, 'MSI Modern 15', ' 15.6″ FHD Laptop ( R5, 8GB, 512 GB SSD, AMD , W10 )', 'MSI Modern 15 15.6″ FHD Laptop ( R5, 8GB, 512 GB SSD, AMD , W10 )', 'Consumer', 'Laptop', 'MSI', '• Processor  :Ryzen 5 4500U ( 6 Cores ,12 Threads)<br>• RAM         :8GB DDR4 3200MHz<br>• Storage            :512GB NVMe PCIe SSD<br>• Graphic Card   :AMD Radeon™ Graphics<br>• Display Screen / Design / Resolution :1<br>&emsp;5.6″ FHD (1920*1080), <br>&emsp;60Hz 45%NTSC IPS-Level<br>• Operation System  :Windows 10 Home<br>• Warranty                :1 Year MSI Warranty', '2799.00', '2799.00', '0.50', 0, 50, 'MSIModern15_01~1.png', 'MSIModern15_01.png MSIModern15_02.png MSIModern15_03.png MSIModern15_04.png MSIModern15_05.png', 'MSIModern15_01~1.png MSIModern15_02~1.png MSIModern15_03~1.png MSIModern15_04~1.png MSIModern15_05~1.png', '2021-09-26 15:34:35', 0),
(10019, 'Acer Swift 3x SF314-510G-761J 14” FHD Laptop Steam Blue', ' ( I7-1165G7, 16GB, 512GB SSD, Iris Xe Max, W10, HS )', 'Acer Swift 3x SF314-510G-761J 14” FHD Laptop Steam Blue ( I7-1165G7, 16GB, 512GB SSD, Iris Xe Max, W10, HS )', 'Consumer', 'Laptop', 'Acer', '• Processor	:Intel® Core i7-1165G7<br>• RAM		:16 GB of onboard LPDDR4X<br>• Storage   :512GB PCIe® Gen3 SSD<br>• Graphic Card   :Intel® Iris® Xe Max Graphics<br>• Display Screen / Design / Resolution :14″ display with IPS technology FHD (1920*1080),high-brightness Acer ComfyViewTM LED-backlit TFT LCD<br>• Windows: Windows 10 Home<br>• Warranty: 2 years Warranty with 1st Year International Travelers Warranty (ITW)', '4259.00', '4259.00', '0.00', 0, 5, 'AcerSwift3x_01~1.png', 'AcerSwift3x_01.png AcerSwift3x_02.png', 'AcerSwift3x_01~1.png AcerSwift3x_02~1.png', '2021-09-24 21:12:59', 0),
(10020, 'Asus ZenBook 13', ' UX325E-AKG349TS 13.3” OLED FHD Laptop Pine Grey (I7-1165G7, 8GB, 512GB SSD, Intel, W10, HS)', 'Asus ZenBook 13 UX325E-AKG349TS 13.3” OLED FHD Laptop Pine Grey (I7-1165G7, 8GB, 512GB SSD, Intel, W10, HS)', 'Consumer', 'Laptop', 'Asus', '• Processor:Intel® Core™ i7-1165G7 Processor<br>• RAM        :8GB LPDDR4X on board<br>• Storage        :512GB PCIe® NVMe™ 3.0 x2 M.2 SSD<br>• Graphic Card        :Intel® Iris® Xe Graphics<br>• Display Screen / Design / Resolution: 13.3-inch,OLED,FHD (1920 x 1080) 16:9, Glossy display,400nits,DCI-P3: 100%,Pantone Validated,  Screen-to-body ratio: 88 ％<br>• Operation System :Windows 10 Home<br>• Remark :2 Years Asus Global Warranty', '4889.00', '4889.00', '0.50', 0, 50, 'AsusZenBook13_01~1.png', 'AsusZenBook13_01.png AsusZenBook13_02.png AsusZenBook13_03.png', 'AsusZenBook13_01~1.png AsusZenBook13_02~1.png AsusZenBook13_03~1.png', '2021-09-26 15:34:35', 0),
(10021, 'MSI_GF63_Thin 15.6″ FHD Gaming Laptop', ' ( I5, 8GB, 256GB SSD, GTX1650 Max-Q )', 'MSI GF63 Thin 15.6″ FHD Gaming Laptop ( I5, 8GB, 256GB SSD, GTX1650 Max-Q )', 'Gaming', 'Laptop', 'MSI', '• Processor:Intel® Core™ i5-10500H Processor (6 Core 12 Threads, 8M Cache, up to 4.50 GHz)<br>• Ram        :8GB DDR4 3200Mhz RAM<br>• Storage        :256GB NVMe PCIe SSD<br>• Graphic        :Nvidia GeForce® GTX 1650 MAX-Q, 4GB GDDR6<br>• Display Screen:15.6″ FHD (1920×1080), IPS-Level 144Hz 45% NTSC, Thin Bezel<br>• Operation System:Windows 10 Home<br>• Warranty:2 Years MSI Warranty', '3499.00', '3499.00', '0.50', 0, 50, 'MSIGF63_01~1.png', 'MSIGF63_01.png MSIGF63_02.png MSIGF63_03.png MSIGF63_04.png', 'MSIGF63_01~1.png MSIGF63_02~1.png MSIGF63_03~1.png MSIGF63_04~1.png', '2021-09-26 15:34:35', 0),
(10022, 'Asus TUF Dash F15 FX516P-MHN085T', ' 15.6″FHD |Intel® Core™i5-11300H | 8GB | RTX3060 6GB | 512GB SSD | W10', 'Asus TUF Dash F15 FX516P-MHN085T 15.6″FHD |Intel® Core™i5-11300H | 8GB | RTX3060 6GB | 512GB SSD | W10', 'Gaming', 'Laptop', 'Asus', '• Processor        Intel Core i5-11300H Processor<br>• Memory        8GB DDR4 3200 RAM<br>• Storage        512B PCIE NVME M.2 SSD<br>• Graphics         NVIDIA GeForce RTX3060 6GB GDDR6<br>• Display        15.6″ FHD//IPS Panel//144Hz//63% sRGB//170 Wide View//Anti-glare<br>• Operating system        Windows 10<br>• Warranty        2 Years Warranty', '4799.00', '4799.00', '0.50', 0, 50, 'AsusTUFDash01~1.png', 'AsusTUFDash01.png AsusTUFDash02.png AsusTUFDash03.png', 'AsusTUFDash01~1.png AsusTUFDash02~1.png AsusTUFDash03~1.png', '2021-09-26 15:34:35', 0),
(10023, 'ACER NITRO 5 AN515-45-R7QR 15.6″ GAMING LAPTOP BLACK', ' (RYZEN7-5800H, 8GB, 512GB, GTX1650, WIN10)', 'ACER NITRO 5 AN515-45-R7QR 15.6″ GAMING LAPTOP BLACK (RYZEN7-5800H, 8GB, 512GB, GTX1650, WIN10)', 'Gaming', 'Laptop', 'Acer', '• Processor	: AMD Ryzen 7 5800H Processor (3.2Ghz up to 4.4Ghz, 16MB cache 8 Cores)<br>• RAM		:8GB DDR4 3200Mhz<br>• Storage   :512B PCIE NVME M.2 SSD<br>• Graphic Card   :NVIDIA GeForce GTX1650 4GB GDDR6<br>• Display Screen / Design / Resolution :15.6″ FHD (1920×1080), 144Hz IPS technology Slim bezel Display<br>• Operation System  :Windows 10 Home<br>• Warranty   :2 Years Warranty<br>', '4149.00', '4149.00', '0.00', 0, 10, 'AcerNitro5_01~1.png', 'AcerNitro5_01.png AcerNitro5_02.png AcerNitro5_03.png', 'AcerNitro5_01~1.png AcerNitro5_02~1.png AcerNitro5_03~1.png', '2021-09-21 00:22:44', 0),
(10024, 'a', '', '', 'b', '', 'c', '2222', '0.00', '0.00', '0.00', 11, 1, '', '', '', '2021-10-17 12:53:01', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `customer_id` (`customer_id`);

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
  MODIFY `admin_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10025;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_idfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 04:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` bigint(20) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(10) NOT NULL,
  `createdDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `userName`, `password`, `status`, `createdDate`) VALUES
(2, 'Mayur purushvani', 'Mayur', 1, '2021-03-18 07:42:24.000000'),
(3, 'Varun Raval', 'Varun', 1, '2021-03-18 07:42:37.000000');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` enum('product','category','','') NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `inputType` varchar(50) NOT NULL,
  `backendType` varchar(50) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(1, 'product', 'color', 'color', 'checkbox', 'varchar(256)', 1, ''),
(2, 'product', 'brand', 'brand', 'select', 'varchar(256)', 2, NULL),
(3, 'product', 'type', 'type', 'select-multiple', 'varchar(256)', 3, NULL),
(4, 'product', 'size', 'size', 'radio', 'varchar(256)', 4, NULL),
(5, 'product', 'material', 'material', 'text', 'varchar(256)', 5, NULL),
(6, 'product', 'style', 'style', 'textarea', 'varchar(256)', 6, NULL),
(7, 'category', 'color', 'color', 'checkbox', 'varchar(256)', 1, NULL),
(8, 'category', 'brand', 'brand', 'select', 'varchar(256)', 2, NULL),
(9, 'category', 'type', 'type', 'select-multiple', 'varchar(256)', 3, NULL),
(10, 'category', 'size', 'size', 'radio', 'varchar(256)', 4, NULL),
(11, 'category', 'material', 'material', 'text', 'varchar(256)', 5, NULL),
(12, 'category', 'style', 'style', 'textarea', 'varchar(256)', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(1, 'Red', 1, 1),
(2, 'Green', 1, 2),
(3, 'Blue', 1, 3),
(4, 'Wood', 2, 1),
(5, 'badrooms', 2, 2),
(6, 'fernitures', 2, 3),
(7, 'Regular', 3, 1),
(8, 'Premium', 3, 2),
(9, 'single', 4, 1),
(10, 'double bed', 4, 2),
(11, 'Red', 7, 1),
(12, 'Green', 7, 2),
(13, 'Blue', 7, 3),
(14, 'wood', 8, 1),
(15, 'fernitures', 8, 2),
(16, 'Regular', 9, 1),
(17, 'Premium', 9, 2),
(18, 'single ', 10, 1),
(19, 'double', 10, 2),
(20, 'yellow', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` bigint(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` tinyint(10) NOT NULL,
  `parentId` bigint(11) DEFAULT NULL,
  `path` varchar(500) DEFAULT NULL,
  `featured` tinyint(10) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `createdDate` datetime(6) DEFAULT NULL,
  `color` varchar(256) DEFAULT NULL,
  `brand` varchar(256) DEFAULT NULL,
  `type` varchar(256) DEFAULT NULL,
  `size` varchar(256) DEFAULT NULL,
  `material` varchar(256) DEFAULT NULL,
  `style` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`, `status`, `parentId`, `path`, `featured`, `description`, `createdDate`, `color`, `brand`, `type`, `size`, `material`, `style`) VALUES
(1, 'Badroom', 1, 0, '1', 0, 'badroom', '2021-03-18 07:56:51.000000', 'Red,Green,Blue', 'fernitures', 'Premium', 'double', 'aaa', '  cvcvcv                                                                          '),
(2, 'Beds', 0, 1, '1=2', 0, 'Beds', '2021-03-18 07:57:00.000000', '', '', '', '', '', ''),
(4, 'Headers', 0, 2, '1=2=4', 0, 'Headers', '2021-03-18 07:57:21.000000', '', '', '', '', '', ''),
(5, 'Footer', 0, 2, '1=2=5', 0, 'Footer', '2021-03-18 07:57:30.000000', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `pageId` bigint(10) NOT NULL,
  `title` varchar(150) NOT NULL,
  `identifier` bigint(10) NOT NULL,
  `content` varchar(1500) NOT NULL,
  `status` tinyint(10) NOT NULL,
  `createdDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`pageId`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(2, 'Contact Us Page', 1, '<p>Hello! This is <a href=\"http://www.google.com\"><em><strong>Contact Us</strong></em></a> Page!!</p>', 0, '2021-03-18 07:53:21.000000');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` bigint(10) NOT NULL,
  `groupId` bigint(20) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `password` varchar(12) NOT NULL,
  `status` tinyint(10) NOT NULL,
  `createdDate` datetime(6) NOT NULL,
  `updatedDate` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `groupId`, `firstName`, `lastName`, `email`, `mobile`, `password`, `status`, `createdDate`, `updatedDate`) VALUES
(1, 4, 'mayur', 'purushvani', 'mayurpurushvani@gmail.com', 9409650342, 'mayur', 1, '2021-03-18 07:53:50.000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` bigint(20) NOT NULL,
  `customerId` bigint(20) DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipCode` bigint(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `addressType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipCode`, `country`, `addressType`) VALUES
(1, 1, 'Junction Plot', 'Rajkot', 'Gujarat', 360001, 'India', 'billing');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `groupId` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `default` tinyint(10) NOT NULL,
  `createdDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`groupId`, `name`, `default`, `createdDate`) VALUES
(1, 'Wholesallers', 1, '2021-03-18 07:41:19.000000'),
(2, 'Retailers', 1, '2021-03-18 07:41:25.000000'),
(4, 'Manufecturers', 1, '2021-03-18 07:41:55.000000');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaId` bigint(10) NOT NULL,
  `productId` bigint(10) NOT NULL,
  `image` varchar(150) NOT NULL,
  `label` varchar(50) NOT NULL,
  `small` tinyint(10) NOT NULL,
  `thumb` tinyint(10) NOT NULL,
  `base` tinyint(10) NOT NULL,
  `gallary` tinyint(10) NOT NULL,
  `remove` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`mediaId`, `productId`, `image`, `label`, `small`, `thumb`, `base`, `gallary`, `remove`) VALUES
(14, 4, 'images/4/1616053817-1670-download (1).jpeg', '', 0, 0, 0, 0, 0),
(15, 4, 'images/4/1616053821-3656-download (1).jpeg', '', 0, 0, 0, 0, 0),
(16, 3, 'images/3/1616053857-5308-download (1).jpeg', '', 0, 0, 0, 0, 0),
(17, 3, 'images/3/1616053875-1346-download.jpeg', '', 0, 0, 0, 0, 0),
(18, 3, 'images/3/1616053932-2964-download (4).jpeg', '', 0, 0, 0, 0, 0),
(19, 3, 'images/3/1616053958-5791-images (2).jpeg', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `methodId` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` bigint(30) NOT NULL,
  `description` varchar(150) NOT NULL,
  `status` tinyint(10) NOT NULL,
  `createdDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`methodId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(2, 'mayur purushvani', 123456, 'success', 1, '2021-03-18 08:10:11.000000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` bigint(11) NOT NULL,
  `sku` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `discount` decimal(20,0) NOT NULL,
  `quantity` bigint(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` tinyint(10) NOT NULL,
  `createdDate` datetime(6) NOT NULL,
  `updatedDate` datetime(6) DEFAULT NULL,
  `color` varchar(256) DEFAULT NULL,
  `size` varchar(256) DEFAULT NULL,
  `type` varchar(256) DEFAULT NULL,
  `style` varchar(256) DEFAULT NULL,
  `material` varchar(256) DEFAULT NULL,
  `brand` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`, `color`, `size`, `type`, `style`, `material`, `brand`) VALUES
(3, '111', 'beds', '22000', '1000', 12, 'beds', 1, '2021-03-18 08:33:29.000000', '0000-00-00 00:00:00.000000', 'Red,Green,Blue', 'double bed', 'Regular,Premium', '           bbb                                                                 ', 'aaa', 'badrooms'),
(4, 'asfe', 'aaa', '22', '13', 132, 'vger', 0, '2021-03-18 08:45:52.000000', '0000-00-00 00:00:00.000000', 'Green', 'double bed', 'Regular,Premium', '         cc                                                                   ', 'aa', 'badrooms');

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(1, 4, 1, '111.00'),
(2, 4, 2, '1111.00'),
(3, 4, 4, '111.00'),
(4, 3, 1, '11.00'),
(5, 3, 2, '11.00'),
(6, 3, 4, '11.00');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `methodId` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` bigint(30) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `description` varchar(150) NOT NULL,
  `status` tinyint(10) NOT NULL,
  `createdDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`methodId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(2, 'regular', 123456, '1234', 'success', 1, '2021-03-18 02:21:15.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attribute_option_ibfk_1` (`attributeId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaId`),
  ADD KEY `media_ibfk_1` (`productId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`methodId`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`methodId`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `methodId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `methodId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

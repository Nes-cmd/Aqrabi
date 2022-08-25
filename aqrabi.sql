-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 12:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aqrabi`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `bid` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `code` int(50) DEFAULT NULL,
  `forgetcode` int(50) DEFAULT NULL,
  `registerd_date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`bid`, `firstname`, `lastname`, `email`, `phonenumber`, `password`, `address`, `role`, `code`, `forgetcode`, `registerd_date`) VALUES
(1, 'betty', 'kassaw', 'bettykassaw@gmail.com', '0904189653', '$2b$10$6zHjcqo86g7UdUm3dRIozuQMaKQSXZo7hUhKg5hSntj99BFPnJ3JW', 'cootdevour street', 'buyer', NULL, NULL, '2022-08-19 23:20:37.367557'),
(2, 'miki', 'getachew', 'mikigetachew@gmail.com', '0921109888', '$2b$10$iHSadxwQ5zsI5ekrHMy0fOUQ20uiluzw.AXgvABMDpX1iaG3ADDDG', 'urael', 'buyer', NULL, NULL, '2022-08-19 23:26:59.399520');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `cid` int(255) NOT NULL,
  `catagoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(255) NOT NULL,
  `buyerid` int(255) NOT NULL,
  `ordernumber` int(255) NOT NULL,
  `productid` int(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `count` int(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `shipperid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productdescription` varchar(255) NOT NULL,
  `suplierid` int(255) NOT NULL,
  `catagoryid` int(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `picture1` varchar(255) DEFAULT NULL,
  `picture2` varchar(255) DEFAULT NULL,
  `dateadded` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `shid` int(255) NOT NULL,
  `companyneame` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sid` int(255) NOT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `contactfirstname` varchar(255) NOT NULL,
  `contactlastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactphone` varchar(255) NOT NULL,
  `tinnumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `registertime` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sid`, `companyname`, `contactfirstname`, `contactlastname`, `address`, `contactphone`, `tinnumber`, `email`, `registertime`, `password`, `role`) VALUES
(1, 'colabs', 'helen', 'bekele', 'shola', '0908765432', '12345678', 'helen@gmail.com', '2022-08-20 11:44:43.054130', '$2b$10$3.tgOXfrTaK.cTQT/oQwue5n3Jfnqvq7E1g1OIhFTGn4OmkY2kOCO', 'supplier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `buyerid` (`buyerid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `suplierid` (`suplierid`),
  ADD KEY `catagoryid` (`catagoryid`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`shid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `contactphone` (`contactphone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tinnumber` (`tinnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `bid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `shid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`buyerid`) REFERENCES `buyers` (`bid`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `product` (`pid`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`suplierid`) REFERENCES `supplier` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`catagoryid`) REFERENCES `catagory` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

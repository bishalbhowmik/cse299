-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 10:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse299_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `billingAddress` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `billingAddress`, `Email`, `password`, `order`) VALUES
(1831563642, 'Block: A, Road: 2, House: 66,\r\nFlat: C1, Niketon, Gulshan-1,\r\nDhaka', 'joy91447@gmail.com', 'abc123', 5324);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(20) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `viewproduct` varchar(100) NOT NULL,
  `payment` int(100) NOT NULL,
  `order` int(100) NOT NULL,
  `shippingcart` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  `delivery` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `customer`, `viewproduct`, `payment`, `order`, `shippingcart`, `account`, `delivery`) VALUES
(1831334642, 'sheikh.wasif@northsouth.edu', 5907, '1831563642', 'Lana Matsuyama', 1850, 5324, '1536', '1831563642', '5342');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`name`, `email`, `message`) VALUES
(' joy', 'afnan@gmail.com', ' this is twst'),
(' Bishal', 'afnan@gmail.com', ' This is test message.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` text NOT NULL,
  `billingAddress` varchar(100) NOT NULL,
  `defaultShippingAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `billingAddress`, `defaultShippingAddress`) VALUES
('Joy Saha', 'Block: A, Road: 2, House: 66,\r\nFlat: C1, Niketon, Gulshan-1,\r\nDhaka', 'Block: A, Road: 2, House: 66,\r\nFlat: C1, Niketon, Gulshan-1,\r\nDhaka');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(50) NOT NULL,
  `paymentinfo` varchar(20) NOT NULL,
  `deliverystatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `paymentinfo`, `deliverystatus`) VALUES
(5324, 'successfull', 'onlinePayment');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(50) NOT NULL,
  `customerid` int(50) NOT NULL,
  `orderDate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `Totalpayble` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customerid`, `orderDate`, `status`, `price`, `Totalpayble`) VALUES
(5324, 1831563642, '2022-03-09', 'payment', 1850, 1850);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Country` varchar(20) NOT NULL,
  `JoiningDate` date NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Firstname`, `Lastname`, `Email`, `PhoneNumber`, `DateOfBirth`, `Country`, `JoiningDate`, `Password`) VALUES
(' Bishal ', 'Bhowmik', ' bishal.bhowmik@northsouth.edu', '01648914767', '1998-10-12', 'Bangladesh', '2022-04-03', '1111'),
(' Joy', 'Saha', ' joy.saha03@northsouth.edu', '01875765907', '1998-09-07', 'Bangladesh', '2022-03-30', '1831563642'),
(' ss', 'ss', ' ss', 'ss', '2022-03-29', 'ss', '2022-03-29', 'ss'),
('Sheikh', 'wasif', 'afnan6630@gmail.com', '01735848877', '2017-03-16', 'Bangladesh', '2022-03-31', 'll3ll3ll3ll3ll3');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(50) NOT NULL,
  `art_id` int(20) NOT NULL,
  `art_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `art_id`, `art_name`) VALUES
(1831563642, 1536, 'Lana Matsuyama');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `userid` varchar(30) COLLATE latin1_general_cs NOT NULL,
  `pass` varchar(30) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `trackorder`
--

CREATE TABLE `trackorder` (
  `id` int(50) NOT NULL,
  `payment` int(20) NOT NULL,
  `deliverystatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trackorder`
--

INSERT INTO `trackorder` (`id`, `payment`, `deliverystatus`) VALUES
(5324, 1850, 'successful');

-- --------------------------------------------------------

--
-- Table structure for table `view_art`
--

CREATE TABLE `view_art` (
  `art_id` int(255) NOT NULL,
  `art_name` varchar(255) NOT NULL,
  `art_price` varchar(255) NOT NULL,
  `art_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `view_art`
--

INSERT INTO `view_art` (`art_id`, `art_name`, `art_price`, `art_image`) VALUES
(13, 'Scenary', '1500', 'Serenity.jpg'),
(18, 'Monalisa', '1230', 'monalisa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Email`,`PhoneNumber`);

--
-- Indexes for table `view_art`
--
ALTER TABLE `view_art`
  ADD PRIMARY KEY (`art_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1831563643;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5325;

--
-- AUTO_INCREMENT for table `view_art`
--
ALTER TABLE `view_art`
  MODIFY `art_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2017 at 09:30 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'root', 'root@gmail.com', 'toor');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `price`) VALUES
(22, 0, 13, 1, 62000),
(23, 0, 14, 1, 35000),
(24, 0, 12, 1, 35000),
(25, 0, 13, 1, 62000),
(26, 0, 13, 1, 62000),
(27, 0, 13, 1, 62000),
(28, 0, 13, 1, 62000);

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `code` varchar(50) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'not used',
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`code`, `pin`, `status`, `balance`) VALUES
('123456', '123', 'used', 0),
('abc', '123', 'used', 500),
('1234', '1234', 'used', 300);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_no` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `deliver_type` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `cost` int(10) NOT NULL,
  `time` varchar(15) NOT NULL,
  `date` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'not delivered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_no`, `user_id`, `product_id`, `quantity`, `deliver_type`, `address`, `contact_no`, `price`, `cost`, `time`, `date`, `status`) VALUES
(12, 1, 2, 0, '', '', '', 0, 0, '', '0000-00-00', 'Accepted'),
(22, 1, 13, 1, 'Mail ', 'test  ', '432321  ', 62000, 0, ' 21:23:40', '20-05-2017', 'not delivered');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `unit_avail` int(10) NOT NULL,
  `image_path` text NOT NULL,
  `detail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `category`, `price`, `unit_avail`, `image_path`, `detail`) VALUES
(12, 'HP laptop', 'Laptop pc', 35000, 10, 'product_images/k2-_ed8b8f8d-e696-4a96-8ce9-d78246f10ed1.v1.jpg', 'Ram 4 gb,HDD 500gb,17 inch display,Core i3'),
(13, 'Apple ', 'Laptop pc', 62000, 20, 'product_images/7131LFCmFPL._SL1500_.jpg', 'core i5,ram 8 gb'),
(14, 'laptop', 'Others', 35000, 5, 'product_images/5206600ld.jpg', 'core i3'),
(15, 'loptop', 'Laptop pc', 50000, 20, 'product_images/laptop-computer-250x250.jpeg', 'core i5,ram 8 gb'),
(16, 'laptop', 'Laptop pc', 50010, 8, 'product_images/k2-_ed8b8f8d-e696-4a96-8ce9-d78246f10ed1.v1.jpg', 'core i5,ram 8 gb h 500');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `balance` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `balance`, `address`, `contact`) VALUES
(1, 'user@gmail.com', 'user', 'user', 0, 'address', '123456789'),
(2, 'add@yahoo.com', 'kamal', 'mmmm', 0, 'uuuu', 'iuih');

-- --------------------------------------------------------

--
-- Table structure for table `user_balance`
--

CREATE TABLE `user_balance` (
  `user_id` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `credit` int(10) NOT NULL,
  `debit` int(10) NOT NULL,
  `source` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_balance`
--

INSERT INTO `user_balance` (`user_id`, `date`, `credit`, `debit`, `source`) VALUES
(1, '12-5-2016', 1000, 0, ''),
(1, '10-7-2016', 500, 0, ''),
(1, '15-7-2016', 0, 750, '3'),
(1, '17-07-16', 500, 0, ''),
(1, '17-07-16', 0, 0, ''),
(1, '17-07-16', 300, 0, ''),
(1, '18-Jul-2016', 0, 250, '2 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD UNIQUE KEY `order_no` (`order_no`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

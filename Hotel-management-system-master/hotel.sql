-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 04:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(4) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `phno` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `phno`, `address`) VALUES
(1, 'Cheemakurthi', '8374666936', 'uma reddy gunt');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `salary` int(15) NOT NULL,
  `type` varchar(1) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `address` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `name`, `salary`, `type`, `phno`, `address`) VALUES
(111, 'abcd', 1000000, 'r', '9876543210', 'abcdefgh'),
(112, 'hi', 1234567, 'r', '9876543321', '');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `location`) VALUES
(1, 'Ice cream', 70, 'food/1.jpg'),
(2, 'Pizza', 110, 'food/2.jpg'),
(3, 'Pumpkin pie', 50, 'food/3.jpg'),
(4, 'Chicken Pie', 90, 'food/4.jpg'),
(5, 'Apple Pie', 130, 'food/5.jpg'),
(6, 'Muffins(2)', 50, 'food/6.jpg'),
(7, 'Icecream cake', 160, 'food/7.jpg'),
(8, 'Tacos', 15, 'food/8.jpg'),
(9, 'Enchilada', 70, 'food/9.jpg'),
(10, 'Steak', 100, 'food/10.jpg'),
(11, 'Hot dogs', 110, 'food/11.jpg'),
(12, 'Cheesecake', 140, 'food/12.jpg'),
(13, 'Cheetos', 20, 'food/13.jpg'),
(14, 'Alfredo Sauce', 75, 'food/14.jpg'),
(15, 'Fried rice', 60, 'food/15.jpg'),
(16, 'Doritos', 20, 'food/16.jpg'),
(17, 'banana', 5, 'food/17.jpg'),
(18, 'Burger', 150, 'food/18.jpg'),
(19, 'Pancake', 170, 'food/19.jpg'),
(20, 'French Fries', 70, 'food/20.jpg'),
(21, 'Bagel', 30, 'food/21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `foodorder`
--

CREATE TABLE `foodorder` (
  `id` int(3) NOT NULL,
  `foodid` int(3) NOT NULL,
  `room` int(3) NOT NULL,
  `time` varchar(30) NOT NULL,
  `number` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `number` int(3) NOT NULL,
  `names` varchar(100) NOT NULL,
  `beds` int(1) NOT NULL,
  `type` varchar(1) NOT NULL,
  `empid` int(3) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `address` varchar(80) NOT NULL,
  `child` int(1) NOT NULL,
  `checkin` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`number`, `names`, `beds`, `type`, `empid`, `phno`, `address`, `child`, `checkin`) VALUES
(101, '-', 1, 'A', 0, '-', '-', 0, '-'),
(102, '-', 1, 'A', 0, '-', '-', 0, '-'),
(103, '-', 1, 'A', 0, '-', '-', 0, '-'),
(104, '-', 1, 'N', 0, '-', '-', 0, '-'),
(105, '-', 1, 'N', 0, '-', '-', 0, '-'),
(106, '-', 2, 'A', 0, '-', '-', 0, '-'),
(107, '-', 2, 'A', 0, '-', '-', 0, '-'),
(108, '-', 2, 'A', 0, '-', '-', 0, '-'),
(109, '-', 2, 'N', 0, '-', '-', 0, '-'),
(110, '-', 2, 'N', 0, '-', '-', 0, '-'),
(111, '-', 3, 'A', 0, '-', '-', 0, '-'),
(112, '-', 3, 'A', 0, '-', '-', 0, '-'),
(113, '-', 3, 'A', 0, '-', '-', 0, '-'),
(114, '-', 3, 'N', 0, '-', '-', 0, '-'),
(115, '-', 3, 'N', 0, '-', '-', 0, '-'),
(116, '-', 4, 'A', 0, '-', '-', 0, '-'),
(117, '-', 4, 'A', 0, '-', '-', 0, '-'),
(118, '-', 4, 'A', 0, '-', '-', 0, '-'),
(119, '-', 4, 'N', 0, '-', '-', 0, '-'),
(120, '-', 4, 'N', 0, '-', '-', 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `roombill` int(10) NOT NULL,
  `foodbill` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `room` int(3) NOT NULL,
  `stamp` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`roombill`, `foodbill`, `name`, `phno`, `address`, `room`, `stamp`) VALUES
(3800, 720, 'uy', '9876543321', 'qwertyui', 117, '1573089061'),
(10200, 520, 'Ashish', '9876543321', 'qwertyui', 120, '1573087712');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodorder`
--
ALTER TABLE `foodorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`stamp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

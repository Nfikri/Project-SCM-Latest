-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 07:25 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yasui`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `serial_no` int(6) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_id` int(6) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`serial_no`, `product_name`, `product_id`, `quantity`, `price`, `total_price`) VALUES
(1, 'Folding Hex Key Set', 145113, 3, 8.4, 25.2),
(2, 'Cordless Screwdriver Set', 145112, 3, 62.3, 186.9),
(3, 'Water Pump Pliers', 145108, 1, 15.9, 15.9),
(4, 'Long Nose Pliers', 145107, 2, 12.2, 24.4),
(5, 'Folding Hex Key Set', 145113, 2, 8.4, 16.8),
(6, 'Folding Hex Key Set', 145113, 1, 8.4, 8.4),
(7, 'Voltage Tester Screwdriver', 145114, 1, 2.5, 2.5),
(8, 'Cordless Screwdriver Set', 145112, 3, 62.3, 186.9),
(9, 'Thread Seal Tape', 145111, 4, 0.75, 3),
(10, 'Folding Hex Key Set', 145113, 2, 8.4, 16.8),
(11, 'Folding Hex Key Set', 145113, 2, 8.4, 16.8),
(12, 'Cordless Screwdriver Set', 145112, 1, 62.3, 62.3),
(13, 'Voltage Tester Screwdriver', 145114, 1, 2.5, 2.5),
(14, 'Folding Hex Key Set', 145113, 1, 8.4, 8.4),
(15, 'Voltage Tester Screwdriver', 145114, 4, 2.5, 10),
(16, 'Folding Hex Key Set', 145113, 3, 8.4, 25.2),
(17, 'Cordless Screwdriver Set', 145112, 1, 62.3, 62.3),
(18, 'Voltage Tester Screwdriver', 145114, 3, 2.5, 7.5),
(19, 'Folding Hex Key Set', 145113, 1, 8.4, 8.4),
(20, 'Water Pump Pliers', 145108, 1, 15.9, 15.9),
(21, 'Voltage Tester Screwdriver', 145114, 4, 2.5, 10),
(22, 'Voltage Tester Screwdriver', 145114, 3, 2.5, 7.5),
(23, 'Cordless Screwdriver Set', 145112, 2, 62.3, 124.6),
(24, 'Double-Faced Soft Mallet', 145104, 1, 4.2, 4.2),
(25, 'Claw Hammer', 145103, 3, 10.3, 30.9),
(26, 'Folding Hex Key Set', 145113, 2, 8.4, 16.8),
(27, 'Linesman Pliers', 145106, 2, 13.7, 27.4),
(28, 'Thread Seal Tape', 145111, 4, 0.75, 3),
(29, 'Cordless Screwdriver Set', 145112, 2, 62.3, 124.6),
(30, 'Voltage Tester Screwdriver', 145114, 2, 2.5, 5),
(31, 'Rubber Maller', 145105, 2, 7.45, 14.9),
(32, 'Folding Hex Key Set', 145113, 1, 8.4, 8.4),
(33, 'Voltage Tester Screwdriver', 145114, 1, 2.5, 2.5),
(34, 'Rubber Maller', 145105, 1, 7.45, 7.45),
(35, 'Voltage Tester Screwdriver', 145114, 4, 2.5, 10),
(36, 'Folding Hex Key Set', 145113, 3, 8.4, 25.2),
(37, 'Cordless Screwdriver Set', 145112, 2, 62.3, 124.6),
(38, 'Berush', 145115, 1, 8, 8),
(39, 'Voltage Tester Screwdriver', 145114, 1, 2.5, 2.5),
(40, 'Thread Seal Tape', 145111, 1, 0.75, 0.75),
(41, 'Cordless Screwdriver Set', 145112, 1, 62.3, 62.3);

-- --------------------------------------------------------

--
-- Table structure for table `cart_checkout`
--

CREATE TABLE `cart_checkout` (
  `cart_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `grand_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_checkout`
--

INSERT INTO `cart_checkout` (`cart_id`, `name`, `address`, `mobile_no`, `grand_total`) VALUES
(1, 'Khairi', 'jb', 123456, 251.7),
(2, 'jemah', 'kl', 142323, 5.5),
(3, 'KHAIRI  MUSA', 'JB johor', 142761142, 252.4),
(5, 'maimunah', 'setapak kl', 1233323, 200.8),
(7, 'hasnah', 'wangsa maju', 65754, 79.1),
(8, 'bolkiah', 'kluang johor', 1238884, 2.5),
(9, 'Emas', 'Kluang', 23425984, 8.4),
(10, 'Hanifah', '123,Jalan Bansar', 123123124, 10),
(11, 'Kai', 'Taman Perlin, JB', 12324411, 87.5),
(12, 'Kai', 'Taman Permai,Tampoi,JB', 131231244, 31.8),
(13, 'Khair Mus', 'Taman Conought', 1237773, 10),
(14, 'Jamian', 'Bandar Baru Uda, Tampoi, JB', 233488223, 167.2),
(15, 'Ismail', 'Jb', 123473545, 47.2),
(16, 'Maimon', 'Gopeng', 54623765, 144.5),
(17, 'Kai-ri', 'Jb', 342525, 8.4),
(18, 'Kai', 'JB', 2147483647, 2.5),
(19, 'Kai', 'Setapak', 1236452, 42.65),
(20, 'Kai', 'jb', 345, 124.6),
(21, 'Faris', 'kj', 236788, 8),
(22, 'far', 'kj', 55788, 65.55);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(6) NOT NULL,
  `category_id` int(6) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `detail` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `img_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `detail`, `price`, `img_path`) VALUES
(145100, 10081, 'Bolt Cutter', 'Used to cuts bolts, chain and threaded rod', 35.9, 'img\\products\\Bolt Cutter.png'),
(145101, 10081, 'Hedge Shear Cutter', 'Useful for trimming hedges', 33.9, 'img\\products\\Hedge Shear Cutter.png'),
(145102, 10081, 'Multi-Function Pruner Cutter', 'Easy durable cutting adjustment', 12.3, 'img\\products\\Multi-Function Pruner Cutter.png'),
(145103, 10082, 'Claw Hammer', 'general purpose claw hammer', 10.3, 'img\\products\\Claw Hammer.png'),
(145104, 10082, 'Double-Faced Soft Mallet', 'strike without damaging work surface', 4.2, 'img\\products\\Double-Faced Soft Mallet.png'),
(145105, 10082, 'Rubber Maller', 'Rubber grip handle for extra comfort.', 7.45, 'img\\products\\Rubber Maller.png'),
(145106, 10083, 'Linesman Pliers', 'a very resistant material', 13.7, 'img\\products\\Linesman Pliers.png'),
(145107, 10083, 'Long Nose Pliers', 'Chrome vanadium steel, satin chrome finished', 12.2, 'img\\products\\Long Nose Pliers.png'),
(145108, 10083, 'Water Pump Pliers', 'the all-in-one tool you can take everywhere', 15.9, 'img\\products\\Water Pump Pliers.png'),
(145110, 10084, 'Hose Connector', 'Brass hose connector for garden', 6.5, 'img\\products\\Hose Connector.png'),
(145111, 10084, 'Thread Seal Tape', 'ideal for systems with water', 0.75, 'img\\products\\Thread Seal Tape.png'),
(145112, 10085, 'Cordless Screwdriver Set', 'facilitate you in doing screwing', 62.3, 'img\\products\\Cordless Screwdriver Set.png'),
(145113, 10085, 'Folding Hex Key Set', '8 hex key in one small size', 8.4, 'img\\products\\Folding Hex Key Set.png'),
(145114, 10085, 'Voltage Tester Screwdriver', 'Voltage Tester Flathead Screwdriver', 2.5, 'img\\products\\Voltage Tester Screwdriver.png'),
(145115, 10086, 'Berush', 'Berush is better than berus', 8, 'img/products/Berush.png'),
(145116, 10087, 'Brush2', 'test', 12, 'img/products/Berus.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(6) NOT NULL,
  `cat_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `cat_name`) VALUES
(10081, 'cutters'),
(10082, 'hammers'),
(10083, 'pliers'),
(10084, 'plumbing'),
(10085, 'screwdrivers'),
(10086, 'Paint Job'),
(10087, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_account`
--

CREATE TABLE `tbluser_account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneNume` varchar(50) NOT NULL,
  `passwordhash` varchar(100) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `enabled` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser_account`
--

INSERT INTO `tbluser_account` (`id`, `username`, `firstName`, `lastName`, `address`, `phoneNume`, `passwordhash`, `role`, `enabled`) VALUES
(4, 'farishazwan14@gmail.com', 'Faris', 'Hazwan', 'Lot 12, Pinggiran Nanding', '0149266516', '$2y$10$vc.BKrt8CTaMSa5/N4.2o.TVqqKYpc2sftPSd7h5Vf4ae/oZExuUK', 'admin', b'1'),
(7, 'khairimusa60@gmail.com', 'KHAIRI', 'MUSA', 'jalan padi 1', '0142761142', '$2y$10$PcoqgR8nGMSWn/XLS9.7COpzwf9qXNegXQNAQ7Mdi.VYBF4hpQmZa', 'user', b'1'),
(8, 'faris@yahoo.com', 'Fa', 'Ris', 'Tj Karang', '01455661', '$2y$10$RdoWgASp4Y/iQXI9TMpViOCJYhAJkC4EiWvUVkOAYtGkS1Ni7z/J.', 'user', b'1'),
(9, 'khairi.musa@yahoo.com', 'Khairi', 'Musa', 'Setapak', '0142761142', '$2y$10$4TeaQvi99lDy1GVU97yn2.MN6Uxy7rrEmUHCv1ca4lIfAyvFCSlbS', 'user', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `cart_checkout`
--
ALTER TABLE `cart_checkout`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbluser_account`
--
ALTER TABLE `tbluser_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `serial_no` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cart_checkout`
--
ALTER TABLE `cart_checkout`
  MODIFY `cart_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145117;

--
-- AUTO_INCREMENT for table `tbluser_account`
--
ALTER TABLE `tbluser_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

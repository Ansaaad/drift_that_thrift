-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 05:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drift that thrift`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` double NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(22) NOT NULL,
  `pid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `email`, `password`, `pid`) VALUES
(27, 'NANDANI LUITEL', 9841318064, 'nandani.luitel12@gmail.com', '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill_to_details`
--

CREATE TABLE `bill_to_details` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `totalpurchase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_to_details`
--

INSERT INTO `bill_to_details` (`id`, `first_name`, `middle_name`, `last_name`, `address`, `phone`, `oid`, `totalpurchase`) VALUES
(22, 'nandita', '', 'luitel', 'dhapasi,height', 3456, 1, 1100);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cid`, `pid`) VALUES
(41, 27, 25);

-- --------------------------------------------------------

--
-- Table structure for table `categories_products`
--

CREATE TABLE `categories_products` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories_products`
--

INSERT INTO `categories_products` (`id`, `name`, `image`) VALUES
(1, 'Bag', 'bag.png'),
(2, 'Clothes', 'zaradress.webp'),
(4, 'Makeup', 'lipstick.png'),
(9, 'Shoes', 'blackheels.jpg'),
(22, 'doll', 'teddy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` double NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `password`) VALUES
(27, 'NANDANI LUITEL', 78888, 'luitelnandani12@gmail.com', '$2y$10$WKDG4w8X2viJMhALGlEMI.IJVvdFUt8JxA8mtQwg6p8Nk5/91UV7S'),
(28, 'NANDITA LUITEL', 3456, 'nandita@gmail.com', '$2y$10$p0x0iy8fqLHBuXEvX80XAOfozTFNGwJLX5GHKbbftA4UOt6yULFcm');

-- --------------------------------------------------------

--
-- Table structure for table `messege`
--

CREATE TABLE `messege` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messege`
--

INSERT INTO `messege` (`id`, `cid`, `sid`, `name`, `email`, `subject`, `message`) VALUES
(6, 28, 27, 'nandas', 'prativ@gmail.com', 'kjsdbr', 'kvhedhkbef');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `inserted_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `oid`, `cid`, `pid`, `inserted_date`, `updated_date`) VALUES
(22, 1, 28, 24, '2023-09-27', '2023-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `oid`, `payment_date`, `status`) VALUES
(1, 1, '2023-06-08', 1),
(2, 2, '2023-06-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `inserted_date` date NOT NULL,
  `updated_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `rating`, `image`, `category_id`, `inserted_date`, `updated_date`, `status`) VALUES
(24, 'Lip Gloss', 'The glossiest lip gloss. Glides on with a doe-foot', 1000, 8, 'gloss1.jpg', 4, '2023-09-27', '2023-09-27', 2),
(25, 'Dress', 'Pink Dress From Zara', 2000, 10, 'zaradress.webp', 2, '2023-09-27', '2023-09-27', 0),
(26, 'Eye Cream', 'Moisturizes your eye bags and removes wrinkels,puffyness.', 2000, 8, 'eyecream.jpg', 4, '2023-09-27', '2023-09-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller_product`
--

CREATE TABLE `seller_product` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_product`
--

INSERT INTO `seller_product` (`id`, `cid`, `pid`) VALUES
(9, 27, 24),
(10, 27, 25),
(11, 27, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`pid`);

--
-- Indexes for table `bill_to_details`
--
ALTER TABLE `bill_to_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`cid`),
  ADD KEY `product_id` (`pid`);

--
-- Indexes for table `categories_products`
--
ALTER TABLE `categories_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messege`
--
ALTER TABLE `messege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_product`
--
ALTER TABLE `seller_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bill_to_details`
--
ALTER TABLE `bill_to_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `categories_products`
--
ALTER TABLE `categories_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `messege`
--
ALTER TABLE `messege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `seller_product`
--
ALTER TABLE `seller_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`pid`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 03:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'แกง,ต้ม'),
(2, 'อาหารจานเดียว'),
(4, 'อาหารอีสาน'),
(5, 'อาหารจีน');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `em_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `ath` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `table_id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `table_id`, `product_id`, `product_qty`) VALUES
(1, 1, 1, 2),
(20, 1, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `img_link` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `price`, `img_link`, `category_id`) VALUES
(9, 'กะเพราไข่ดาว', 'เผ็ดมาก', '50', 'https://img.freepik.com/free-photo/basil-minced-pork-with-rice-fried-egg_1150-27369.jpg?w=1380&t=st=1678089818~exp=1678090418~hmac=4afe4caffa7aaee7ed514034e5416320f7857810555dc8856a1ea7b147d64e9e', 2),
(10, 'ต้มยำกุ้ง', 'ใส่กะทิ', '80', 'https://img.freepik.com/premium-photo/tom-yum-soup-thai-food_52590-41.jpg?w=826', 1),
(11, 'ผัดไทย', 'นี่คืออาหารไทย', '50', 'https://img.freepik.com/free-photo/shrimp-pad-thai-white-background_1150-41802.jpg?size=626&ext=jpg&ga=GA1.2.796651217.1675394203&semt=sph', 2),
(15, 'ข้าวผัดไข่', 'ข้าวผัดไข่ใส่หมู', '50', '', 2),
(16, 'HeadPhon', 'ZCzxc', '50', 'https://img.freepik.com/free-photo/stir-fried-kale-spicy-crispy-pork-wooden-table-thai-food-concept_1150-26549.jpg?w=1380&t=st=1678090401~exp=1678091001~hmac=ec7e776336ff22e0da9a76a4e3b4d30e2c1e63bf08d0b2275307c7c459d6b3ad', 0),
(17, 'sa', 'sdasdsadsd', '30', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/i/p/ipad-2022-hero-blue-wifi-select.png', 1),
(18, 'sadsads', 'sadasdasd', '1234', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/i/p/ipad-2022-hero-blue-wifi-select.png', 1),
(19, 'sadasdsad', 'sadasd', '123', 'https://img.freepik.com/free-photo/stir-fried-kale-spicy-crispy-pork-wooden-table-thai-food-concept_1150-26549.jpg?w=1380&t=st=1678090401~exp=1678091001~hmac=ec7e776336ff22e0da9a76a4e3b4d30e2c1e63bf08d0b2275307c7c459d6b3ad', 1),
(20, 'ewqeqwewqe', 'weqwewqe', '123', 'https://img.freepik.com/free-photo/stir-fried-kale-spicy-crispy-pork-wooden-table-thai-food-concept_1150-26549.jpg?w=1380&t=st=1678090401~exp=1678091001~hmac=ec7e776336ff22e0da9a76a4e3b4d30e2c1e63bf08d0b2275307c7c459d6b3ad', 2),
(21, 'ewqeqweqwe', 'qweqwewq', '50', 'https://img.freepik.com/free-photo/stir-fried-kale-spicy-crispy-pork-wooden-table-thai-food-concept_1150-26549.jpg?w=1380&t=st=1678090401~exp=1678091001~hmac=ec7e776336ff22e0da9a76a4e3b4d30e2c1e63bf08d0b2275307c7c459d6b3ad', 2),
(22, 'ผัดไทย', 'sdas', '60', 'https://img.freepik.com/free-photo/stir-fried-kale-spicy-crispy-pork-wooden-table-thai-food-concept_1150-26549.jpg?w=1380&t=st=1678090401~exp=1678091001~hmac=ec7e776336ff22e0da9a76a4e3b4d30e2c1e63bf08d0b2275307c7c459d6b3ad', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(10) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `table_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_name`, `table_status`) VALUES
(1, 'โต๊ะ 1', 0),
(2, 'โต๊ะ 2', 0),
(3, 'โต๊ะ 3', 0),
(4, 'โต๊ะ 4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `phone`, `email`, `address`, `gender`, `date_of_birth`) VALUES
(1, 'admin', '1234', 'admin', 6000, 'gg@gg.com', 'Thailand', 'male', '2023-02-06'),
(2, 'admin1', '620004', 'sdasd', 1234, 'dasdasd', 'asdasdsa', 'male', '2023-02-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

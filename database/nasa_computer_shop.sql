-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 05:48 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nasa_computer_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `created-at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `c_name`, `created-at`, `updated_at`) VALUES
(1, 'Laptop', '2023-08-12 12:35:05', '2023-08-12 15:58:04'),
(2, 'Mouse', '2023-08-12 12:35:05', '2023-08-12 15:58:05'),
(3, 'Keyboard', '2023-08-12 12:35:05', '2023-08-12 15:58:06'),
(4, 'Monitor', '2023-08-12 12:35:05', '2023-08-12 15:58:06'),
(5, 'Printer', '2023-08-12 12:35:05', '2023-08-12 15:58:07'),
(6, 'Speaker', '2023-08-12 12:35:05', '2023-08-12 15:58:08'),
(7, 'Desktop', '2023-08-12 12:35:05', '2023-08-12 15:58:08'),
(8, 'Headphone', '2023-08-12 12:35:05', '2023-08-12 15:58:09'),
(9, 'Camera', '2023-08-12 12:35:05', '2023-08-12 15:58:09'),
(10, 'Other', '2023-09-06 12:10:34', '2023-09-06 12:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT '0',
  `lastname` varchar(50) DEFAULT '0',
  `phone` varchar(20) DEFAULT '0',
  `address` varchar(100) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `firstname`, `lastname`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(2, 'YOEUN', 'Chanrith', '077 84 85 83', 'Kasesam, Siem Reap, Cambodia', '2023-08-12 12:34:36', '2023-08-12 16:01:18'),
(3, 'Chhinh', 'VanJame', '092 89 73 73', 'Siem Reap, Cambodia.', '2023-08-12 12:34:36', '2023-08-12 16:01:18'),
(5, 'Chai', 'Seyma', '0123 456 789', 'Siem Reap, Cambodia.', '2023-08-12 12:34:36', '2023-08-12 16:01:18'),
(9, 'Phan', 'Sophea', '098 765 432', 'Siem Reap, Cambodia.', '2023-09-05 15:41:03', '2023-09-05 15:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `employee_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `employee_name`, `gender`, `phone`, `address`, `role`, `created_at`) VALUES
(1, 'Phan Sophea', 'Female', '098 12 34 45', 'Siem Reap, Cambodia.', '0', '2023-08-12 12:34:07'),
(2, 'Lychhun Lai', 'Male', '098 76 54 321', 'Siem Reap, cambodia', '0', '2023-08-12 12:34:07'),
(6, 'Yoeun Chanrith', 'Male', '096 59 99 668', 'Kasesam, Siem Reap, Cambodia', '0', '2023-08-12 12:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `province` varchar(50) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `province`, `created_at`) VALUES
(1, 'Siem Reap', '2023-08-12 12:33:39'),
(2, 'Phnom Penh', '2023-08-12 12:33:39'),
(5, 'Bangkok', '2023-08-12 12:33:39'),
(6, 'Kompong Som', '2023-08-12 12:33:39'),
(7, 'Kompong Chnang', '2023-08-12 12:33:39'),
(8, 'Kompong Speu', '2023-08-12 12:33:39'),
(9, 'Kompot', '2023-08-12 12:33:39'),
(10, 'Phnom Penh', '2023-08-12 12:33:39'),
(11, 'Posat', '2023-08-12 12:33:39'),
(12, 'Battambong', '2023-08-12 12:33:39'),
(13, 'Posat', '2023-08-12 12:33:39'),
(14, 'Peilen', '2023-08-12 12:33:39'),
(15, 'Banteay Meanchey', '2023-08-12 12:33:39'),
(16, 'Kompong Thom', '2023-08-12 12:33:39'),
(17, 'Prey Veng', '2023-08-12 12:33:39'),
(18, 'Svay Reang', '2023-08-12 12:33:39'),
(19, 'Takeo', '2023-08-12 12:33:39'),
(20, 'Kondal', '2023-08-12 12:33:39'),
(21, 'Kroches', '2023-08-12 12:33:39'),
(22, 'Sterng Treng', '2023-08-12 12:33:39'),
(23, 'Mondulkiri', '2023-08-12 12:33:39'),
(24, 'Preash Vihear', '2023-08-12 12:33:39'),
(25, 'Ratanakkiri', '2023-08-12 12:33:39'),
(26, 'Koh Kong', '2023-08-12 12:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(100) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `date_in_stock` date DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pro_name`, `brand`, `description`, `stock`, `price`, `category_id`, `supplier_id`, `date_in_stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 'TUB Gaming', 'Asus', 'Good and quatity', 5, 899.99, 1, 1, '2023-07-01', '1690635765tub.png', '2023-08-07 07:46:18', '2023-08-12 15:56:48'),
(3, 'Razer Viper Ultimate Mouse', 'Razer', 'Gaming mouse, Wired, wireless', 5, 29.99, 2, 2, '2023-06-01', '1689922423razer mouse.png', '2023-08-07 07:46:18', '2023-08-12 15:56:48'),
(4, 'Logitech MX Master 3', 'Logitech', 'Wired, Wireless', 5, 99.9, 2, 3, '2023-06-01', '1689922436logitech  mouse.png', '2023-08-07 07:46:18', '2023-08-12 15:56:48'),
(5, 'APEX PRO TKL (2023)', 'SteelSeries', 'RGB LED 60% Double Shot', 2, 219.99, 3, 3, '2023-03-18', '1689922569APEX PRO TKL (2023).png', '2023-08-07 07:46:18', '2023-08-12 15:56:48'),
(12, 'JBL Speaker', 'JBL', 'gOOD', 4, 100, 6, 10, '2023-08-11', '1691687799JBL-Audio-Speakers.png', '2023-08-10 17:16:39', '2023-08-12 15:56:48'),
(14, 'Kak printer', 'Apple', 'Brand new product', 4, 1009, 5, 2, '2023-08-30', '1693404343printer.png', '2023-08-30 14:05:43', '2023-08-30 14:05:43'),
(15, 'MSi Monitor', 'MSi', 'Good ', 3, 159, 4, 8, '2023-09-01', '1694001615IMac_vector.svg.png', '2023-09-06 12:00:15', '2023-09-06 12:00:15'),
(16, 'Apple iMac', 'Apple', 'second hand', 1, 1009, 7, 3, '2023-09-01', '1694001691IMac_vector.svg.png', '2023-09-06 12:01:31', '2023-09-06 12:01:31'),
(17, 'RAM ', 'Asus', 'haahsaohfas', 4, 40, 10, 1, '2023-09-02', '1694002284RAM-Memory-Transparent.png', '2023-09-06 12:04:50', '2023-09-06 12:04:50'),
(18, 'ThinF74', 'Lenovo', 'Good ', 2, 1199, 1, 4, '2023-09-13', '1694607053Lenovo ThinkPadx13.png', '2023-09-13 12:10:54', '2023-09-13 12:10:54'),
(19, 'Headphone', 'Logitech', 'Good product', 10, 150, 8, 3, '2023-09-13', '1694607141headphone.png', '2023-09-13 12:12:21', '2023-09-13 12:12:21'),
(20, 'ASUS Monitor', 'ASUS', 'Good', 2, 870, 10, 1, '2023-09-13', '1694608355ASUS monitor.png', '2023-09-13 12:32:35', '2023-09-13 12:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL DEFAULT '0',
  `phone` varchar(15) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company_name`, `phone`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 'Asus', '077 84 85 83', 12, '2023-08-12 12:31:48', '2023-08-12 16:00:26'),
(2, 'Razer', '012 345 678', 2, '2023-08-12 12:31:49', '2023-08-12 16:00:26'),
(3, 'Logitech', '096 59 99 668', 1, '2023-08-12 12:31:50', '2023-08-12 16:00:26'),
(4, 'Lenovo', '012 345 678', 2, '2023-08-12 12:31:51', '2023-08-12 16:00:26'),
(8, 'MSi', '012 45 67 89', 5, '2023-08-12 12:31:52', '2023-08-12 16:00:26'),
(10, 'Dell', '0123 456 789', 2, '2023-08-12 12:31:52', '2023-08-12 16:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store`
--

CREATE TABLE `tbl_store` (
  `id` int(11) NOT NULL,
  `kh_name` varchar(100) DEFAULT '0',
  `en_name` varchar(100) DEFAULT '0',
  `phone` varchar(100) DEFAULT '0',
  `email` varchar(100) DEFAULT '0',
  `address` varchar(100) DEFAULT '0',
  `description` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated-at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_store`
--

INSERT INTO `tbl_store` (`id`, `kh_name`, `en_name`, `phone`, `email`, `address`, `description`, `created_at`, `updated-at`) VALUES
(1, 'ណាស្សា កុំព្យូទ័រ', 'NASA Computer', '089 35 35 60', 'nasa@gmail.com', 'Siem Reap, Cambodia', 'Welcome to NSC', '2023-08-13 07:43:34', '2023-08-13 07:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT 0,
  `subtotal` decimal(10,2) DEFAULT 0.00,
  `quantity` int(11) DEFAULT NULL,
  `grandtotal` decimal(10,2) DEFAULT 0.00,
  `payment_method` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `cust_id`, `subtotal`, `quantity`, `grandtotal`, `payment_method`, `created_at`, `updated_at`) VALUES
(4, 2, '100.00', 100, '1.00', 'Bank Transfer', '2023-08-10 08:07:57', '2023-08-10 08:07:59'),
(5, 3, '129.89', 2, '129.89', 'Bank Transfer', NULL, NULL),
(6, 5, '99.90', 1, '99.90', NULL, '2023-09-11 16:25:27', '2023-09-11 16:25:38'),
(7, 5, '99.90', 1, '99.90', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 5, '99.90', 1, '99.90', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 5, '439.98', 2, '439.98', 'Cash', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 5, '439.98', 2, '439.98', NULL, '2023-09-12 13:50:34', '2023-09-12 13:50:36'),
(11, 5, '439.98', 2, '439.98', NULL, '2023-09-12 13:50:37', '2023-09-12 13:50:39'),
(12, 5, '439.98', 2, '439.98', NULL, '2023-09-12 13:50:42', '2023-09-12 13:50:44'),
(13, 5, '439.98', 2, '439.98', NULL, '2023-09-12 13:50:45', '2023-09-12 13:50:46'),
(14, 5, '439.98', 2, '439.98', 'Bank Tranfer', '2023-09-12 13:50:47', '2023-09-12 13:50:48'),
(15, 5, '439.98', 2, '439.98', NULL, '2023-09-12 13:50:49', '2023-09-12 13:50:50'),
(16, 5, '439.98', 2, '439.98', NULL, '2023-09-12 13:50:54', '2023-09-12 13:52:00'),
(17, 5, '439.98', 2, '439.98', NULL, '2023-09-12 13:51:08', '2023-09-12 13:52:01'),
(18, 5, '129.89', 2, '129.89', NULL, '2023-09-12 13:51:09', '2023-09-12 13:52:02'),
(19, 3, '159.00', 1, '159.00', 'Cash', '2023-09-12 13:51:22', '2023-09-12 13:52:03'),
(20, 5, '99.90', 1, '99.90', 'cash', '2023-09-12 13:51:23', '2023-09-12 13:52:04'),
(21, 2, '140.00', 2, '140.00', 'bank_transfer', '2023-09-12 13:51:28', '2023-09-12 13:52:05'),
(22, 9, '3426.97', 7, '3426.97', 'bank_transfer', '2023-09-12 13:51:29', '2023-09-12 13:52:06'),
(23, 3, '199.80', 2, '199.80', 'banktransfer', '2023-09-12 13:51:50', '2023-09-12 13:52:07'),
(24, 9, '1009.00', 1, '1009.00', 'bank transfer', '2023-09-12 13:51:53', '2023-09-12 13:52:08'),
(25, 5, '959.97', 3, '959.97', 'cash', '2023-09-12 13:51:54', '2023-09-12 13:52:09'),
(26, 2, '159.00', 1, '159.00', 'bank transfer', '2023-09-12 13:51:55', '2023-09-12 13:52:10'),
(27, 5, '899.99', 1, '899.99', 'bank transfer', '2023-09-12 13:51:56', '2023-09-12 13:52:11'),
(28, 2, '129.89', 2, '129.89', 'cash', '2023-09-12 13:51:57', '2023-09-12 13:52:12'),
(29, 5, '99.90', 1, '99.90', 'bank transfer', '2023-09-12 13:51:57', '2023-09-12 13:52:13'),
(30, 3, '2396.99', 4, '2396.99', 'cash', '2023-09-12 13:51:58', '2023-09-12 13:52:14'),
(31, 3, '129.89', 2, '129.89', 'bank transfer', '2023-09-12 08:46:36', '2023-09-12 08:46:36'),
(32, 3, '899.99', 1, '899.99', 'cash', '2023-09-13 07:03:57', '2023-09-13 07:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id` int(11) NOT NULL,
  `transac_id` int(11) DEFAULT 0,
  `product_id` int(11) DEFAULT 0,
  `qty` int(11) DEFAULT 0,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`id`, `transac_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 1, '219.99', NULL, NULL),
(2, 2, 5, 1, '219.99', NULL, NULL),
(3, 2, 5, 1, '219.99', NULL, NULL),
(4, 2, 5, 1, '219.99', NULL, NULL),
(5, 17, 5, 1, '219.99', NULL, NULL),
(6, 17, 5, 1, '219.99', NULL, NULL),
(7, 18, 3, 1, '29.99', NULL, NULL),
(8, 18, 4, 1, '99.90', NULL, NULL),
(9, 19, 15, 1, '159.00', NULL, NULL),
(10, 20, 4, 1, '99.90', NULL, NULL),
(11, 21, 17, 1, '40.00', NULL, NULL),
(12, 21, 12, 1, '100.00', NULL, NULL),
(13, 22, 1, 1, '899.99', NULL, NULL),
(14, 22, 3, 1, '29.99', NULL, NULL),
(15, 22, 5, 1, '219.99', NULL, NULL),
(16, 22, 15, 1, '159.00', NULL, NULL),
(17, 22, 14, 1, '1009.00', NULL, NULL),
(18, 22, 12, 1, '100.00', NULL, NULL),
(19, 22, 16, 1, '1009.00', NULL, NULL),
(20, 23, 4, 2, '99.90', NULL, NULL),
(21, 24, 16, 1, '1009.00', NULL, NULL),
(22, 25, 1, 1, '899.99', NULL, NULL),
(23, 25, 3, 2, '29.99', NULL, NULL),
(24, 26, 15, 1, '159.00', NULL, NULL),
(25, 27, 1, 1, '899.99', NULL, NULL),
(26, 28, 3, 1, '29.99', NULL, NULL),
(27, 28, 4, 1, '99.90', NULL, NULL),
(28, 29, 4, 1, '99.90', NULL, NULL),
(29, 30, 5, 1, '219.99', NULL, NULL),
(30, 30, 15, 1, '159.00', NULL, NULL),
(31, 30, 16, 1, '1009.00', NULL, NULL),
(32, 30, 16, 1, '1009.00', NULL, NULL),
(33, 31, 4, 1, '99.90', NULL, NULL),
(34, 31, 3, 1, '29.99', NULL, NULL),
(35, 32, 1, 1, '899.99', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', '12345', 1, NULL, '2023-08-12 15:55:20', '2023-08-12 15:55:57'),
(2, 'nasa', 'nasapc', 2, NULL, '2023-08-12 15:55:20', '2023-08-12 15:55:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`) USING BTREE;

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1_cate_1` (`category_id`),
  ADD KEY `FK2-suo-1` (`supplier_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `FK1-sup-1` (`location_id`);

--
-- Indexes for table `tbl_store`
--
ALTER TABLE `tbl_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK1-CUS` (`cust_id`) USING BTREE;

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1-role-user` (`role_id`),
  ADD KEY `FK2-emp` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_store`
--
ALTER TABLE `tbl_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK1_cate_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK2-suo-1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `FK1-sup-1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK1-CUS` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK1-role-user` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK2-emp` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`eid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

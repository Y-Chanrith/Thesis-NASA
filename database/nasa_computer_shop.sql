-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for nasa_computer_shop
CREATE DATABASE IF NOT EXISTS `nasa_computer_shop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `nasa_computer_shop`;

-- Dumping structure for table nasa_computer_shop.category
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nasa_computer_shop.category: ~8 rows (approximately)
INSERT INTO `category` (`category_id`, `c_name`) VALUES
	(1, 'Laptop'),
	(2, 'Mouse'),
	(3, 'Keyboard'),
	(4, 'Monitor'),
	(5, 'Printer'),
	(6, 'Speaker'),
	(7, 'Desktop'),
	(8, 'headphone'),
	(9, 'Other');

-- Dumping structure for table nasa_computer_shop.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nasa_computer_shop.employee: ~0 rows (approximately)
INSERT INTO `employee` (`emp_id`, `employee_name`, `gender`, `phone`, `address`, `role`) VALUES
	(1, 'Phan Sophea', 'Female', '09812345', 'Siem Reap', 'Manager');

-- Dumping structure for table nasa_computer_shop.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(100) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `date_in_stock` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_cate_1` (`category_id`),
  KEY `FK2-suo-1` (`supplier_id`),
  CONSTRAINT `FK1_cate_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2-suo-1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nasa_computer_shop.product: ~3 rows (approximately)
INSERT INTO `product` (`id`, `pro_name`, `brand`, `description`, `stock`, `price`, `category_id`, `supplier_id`, `date_in_stock`) VALUES
	(1, 'TUB Gaming', 'Asus', 'Good', 2, 899.99, 1, NULL, '2023-07-03'),
	(3, 'Razer', 'Razer', 'Brand new', 10, 40, 2, NULL, '2023-06-01');

-- Dumping structure for table nasa_computer_shop.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nasa_computer_shop.supplier: ~2 rows (approximately)
INSERT INTO `supplier` (`supplier_id`, `company_name`) VALUES
	(1, 'Asus'),
	(2, 'Razer'),
	(3, 'Logitech');

-- Dumping structure for table nasa_computer_shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nasa_computer_shop.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`) VALUES
	(1, 'admin', '12345'),
	(2, 'nasa', 'nasapc');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- MariaDB dump 10.19  Distrib 10.4.25-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: nasa_computer_shop
-- ------------------------------------------------------
-- Server version	10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(50) DEFAULT NULL,
  `created-at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Laptop','2023-08-12 12:35:05','2023-08-12 15:58:04'),(2,'Mouse','2023-08-12 12:35:05','2023-08-12 15:58:05'),(3,'Keyboard','2023-08-12 12:35:05','2023-08-12 15:58:06'),(4,'Monitor','2023-08-12 12:35:05','2023-08-12 15:58:06'),(5,'Printer','2023-08-12 12:35:05','2023-08-12 15:58:07'),(6,'Speaker','2023-08-12 12:35:05','2023-08-12 15:58:08'),(7,'Desktop','2023-08-12 12:35:05','2023-08-12 15:58:08'),(8,'Headphone','2023-08-12 12:35:05','2023-08-12 15:58:09'),(9,'Camera','2023-08-12 12:35:05','2023-08-12 15:58:09'),(10,'Other','2023-09-06 12:10:34','2023-09-06 12:10:36');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT '0',
  `lastname` varchar(50) DEFAULT '0',
  `phone` varchar(20) DEFAULT '0',
  `address` varchar(100) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (2,'YOEUN','Chanrith','077 84 85 83','Kasesam, Siem Reap, Cambodia','2023-08-12 12:34:36','2023-08-12 16:01:18'),(3,'Chhinh','VanJame','092 89 73 73','Siem Reap, Cambodia.','2023-08-12 12:34:36','2023-08-12 16:01:18'),(5,'Chai','Seyma','0123 456 789','Siem Reap, Cambodia.','2023-08-12 12:34:36','2023-08-12 16:01:18'),(9,'Phan','Sophea','098 765 432','Siem Reap, Cambodia.','2023-09-05 15:41:03','2023-09-05 15:41:03'),(10,'Vorn','Saral','098 123 456','Siem Reap, Cambodia.','2023-09-14 06:25:27','2023-09-14 06:25:27');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`eid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Phan Sophea','Female','098 12 34 45','Siem Reap, Cambodia.','0','2023-08-12 12:34:07'),(2,'Lychhun Lai','Male','098 76 54 321','Siem Reap, cambodia','0','2023-08-12 12:34:07'),(6,'Yoeun Chanrith','Male','096 59 99 668','Kasesam, Siem Reap, Cambodia','0','2023-08-12 12:34:07');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(50) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'Siem Reap','2023-08-12 12:33:39'),(2,'Phnom Penh','2023-08-12 12:33:39'),(5,'Bangkok','2023-08-12 12:33:39'),(6,'Kompong Som','2023-08-12 12:33:39'),(7,'Kompong Chnang','2023-08-12 12:33:39'),(8,'Kompong Speu','2023-08-12 12:33:39'),(9,'Kompot','2023-08-12 12:33:39'),(10,'Phnom Penh','2023-08-12 12:33:39'),(11,'Posat','2023-08-12 12:33:39'),(12,'Battambong','2023-08-12 12:33:39'),(13,'Posat','2023-08-12 12:33:39'),(14,'Peilen','2023-08-12 12:33:39'),(15,'Banteay Meanchey','2023-08-12 12:33:39'),(16,'Kompong Thom','2023-08-12 12:33:39'),(17,'Prey Veng','2023-08-12 12:33:39'),(18,'Svay Reang','2023-08-12 12:33:39'),(19,'Takeo','2023-08-12 12:33:39'),(20,'Kondal','2023-08-12 12:33:39'),(21,'Kroches','2023-08-12 12:33:39'),(22,'Sterng Treng','2023-08-12 12:33:39'),(23,'Mondulkiri','2023-08-12 12:33:39'),(24,'Preash Vihear','2023-08-12 12:33:39'),(25,'Ratanakkiri','2023-08-12 12:33:39'),(26,'Koh Kong','2023-08-12 12:33:39');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK1_cate_1` (`category_id`),
  KEY `FK2-suo-1` (`supplier_id`),
  CONSTRAINT `FK1_cate_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2-suo-1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'TUB Gaming','Asus','Good and quatity',5,899.99,1,1,'2023-07-01','1690635765tub.png','2023-08-07 07:46:18','2023-08-12 15:56:48'),(3,'Razer Viper Ultimate Mouse','Razer','Gaming mouse, Wired, wireless',5,29.99,2,2,'2023-06-01','1689922423razer mouse.png','2023-08-07 07:46:18','2023-08-12 15:56:48'),(4,'Logitech MX Master 3','Logitech','Wired, Wireless',5,99.9,2,3,'2023-06-01','1689922436logitech  mouse.png','2023-08-07 07:46:18','2023-08-12 15:56:48'),(5,'APEX PRO TKL (2023)','SteelSeries','RGB LED 60% Double Shot',2,219.99,3,3,'2023-03-18','1689922569APEX PRO TKL (2023).png','2023-08-07 07:46:18','2023-08-12 15:56:48'),(12,'JBL Speaker','JBL','gOOD',4,100,6,10,'2023-08-11','1691687799JBL-Audio-Speakers.png','2023-08-10 17:16:39','2023-08-12 15:56:48'),(14,'Kak printer','Apple','Brand new product',4,1009,5,2,'2023-08-30','1693404343printer.png','2023-08-30 14:05:43','2023-08-30 14:05:43'),(15,'Asus RGB Monitor','Asus ','Good ',3,250,4,1,'2023-09-01','1694747939monitor asus.png','2023-09-06 12:00:15','2023-09-06 12:00:15'),(16,'Apple iMac','Apple','second hand',1,1009,7,3,'2023-09-01','1694001691IMac_vector.svg.png','2023-09-06 12:01:31','2023-09-06 12:01:31'),(17,'RAM ','Asus','haahsaohfas',4,40,10,1,'2023-09-02','1694002284RAM-Memory-Transparent.png','2023-09-06 12:04:50','2023-09-06 12:04:50'),(18,'ThinF74','Lenovo','Good ',2,1199,1,4,'2023-09-13','1694607053Lenovo ThinkPadx13.png','2023-09-13 12:10:54','2023-09-13 12:10:54'),(19,'Headphone','Logitech','Good product',10,150,8,3,'2023-09-13','1694607141headphone.png','2023-09-13 12:12:21','2023-09-13 12:12:21'),(20,'ASUS Monitor','ASUS','Good',2,870,4,1,'2023-09-13','1694672694ASUS monitor.png','2023-09-13 12:32:35','2023-09-13 12:32:35'),(21,'Asus Desktop','Asus','Brand New ',4,500,7,1,'2023-09-15','1694747754Desktop Asus ExpertCenter.png','2023-09-15 03:15:54','2023-09-15 03:15:54'),(22,'360 Camera Security','Dell','Hello World',5,199,9,10,'2023-09-15','1694747813Security-Camera-PNG-Transparent.png','2023-09-15 03:16:53','2023-09-15 03:16:53'),(23,'Laser Printer','Razer','Hii',3,999,5,2,'2023-09-15','1694747881Laser-Printer-PNG-Photos.png','2023-09-15 03:18:01','2023-09-15 03:18:01'),(24,'Motherboard','Asus','Brand New',2,100,10,1,'2023-09-15','1694748015motherboard.png','2023-09-15 03:20:15','2023-09-15 03:20:15'),(25,'Camera Security','Logitech','Good ',3,250,9,3,'2023-09-15','1694748110security-camera-transparent-10.png','2023-09-15 03:21:50','2023-09-15 03:21:50'),(26,'Dell Mouse','Dell','good product',10,5,2,10,'2023-09-15','1694748206DELL-mouse.png','2023-09-15 03:23:26','2023-09-15 03:23:26'),(27,'Gaming Keyboard','Asus','kak',5,250,3,1,'2023-09-15','1694748380keyboard Gaming.png','2023-09-15 03:26:20','2023-09-15 03:26:20'),(28,'MSi Laptop','MSi','Hi',2,999.99,1,8,'2023-09-15','1694748473msi laptop.png','2023-09-15 03:27:53','2023-09-15 03:27:53'),(29,'Neon Keyboard RGB','Logitech','Neon light RGB',2,99.9,3,3,'2023-09-15','1694754926Neon-Gaming-Keyboard-PNG-HD.png','2023-09-15 05:15:26','2023-09-15 05:15:26'),(30,'Big Speaker','Razer','',2,250,6,2,'2023-09-15','1694755436Speaker.png','2023-09-15 05:23:56','2023-09-15 05:23:56'),(31,'Razer Headphone','Razer','',5,100,8,2,'2023-09-15','1694755609Razer headphone.png','2023-09-15 05:26:49','2023-09-15 05:26:49'),(32,'MSi Keyboard','MSi','',4,100,3,8,'2023-09-15','1694781623MSi keyboard.png','2023-09-15 12:40:23','2023-09-15 12:40:23'),(33,'Razer Keyboard','Razer','',10,199,3,2,'2023-09-15','1694781663Razer Keyboard.png','2023-09-15 12:41:03','2023-09-15 12:41:03'),(34,'Logitech Keyboard','Logitech','',3,90,3,3,'2023-09-15','1694781711logitech keyboard.png','2023-09-15 12:41:51','2023-09-15 12:41:51');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL DEFAULT '0',
  `phone` varchar(15) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`supplier_id`),
  KEY `FK1-sup-1` (`location_id`),
  CONSTRAINT `FK1-sup-1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'Asus','077 84 85 83',12,'2023-08-12 12:31:48','2023-08-12 16:00:26'),(2,'Razer','012 345 678',2,'2023-08-12 12:31:49','2023-08-12 16:00:26'),(3,'Logitech','096 59 99 668',1,'2023-08-12 12:31:50','2023-08-12 16:00:26'),(4,'Lenovo','012 345 678',2,'2023-08-12 12:31:51','2023-08-12 16:00:26'),(8,'MSi','012 45 67 89',5,'2023-08-12 12:31:52','2023-08-12 16:00:26'),(10,'Dell','0123 456 789',2,'2023-08-12 12:31:52','2023-08-12 16:00:26');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_store`
--

DROP TABLE IF EXISTS `tbl_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kh_name` varchar(100) DEFAULT '0',
  `en_name` varchar(100) DEFAULT '0',
  `phone` varchar(100) DEFAULT '0',
  `email` varchar(100) DEFAULT '0',
  `address` varchar(100) DEFAULT '0',
  `description` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated-at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_store`
--

LOCK TABLES `tbl_store` WRITE;
/*!40000 ALTER TABLE `tbl_store` DISABLE KEYS */;
INSERT INTO `tbl_store` VALUES (1,'ណាស្សា កុំព្យូទ័រ','NASA Computer','089 35 35 60','nasa@gmail.com','Siem Reap, Cambodia','Welcome to NSC','2023-08-13 07:43:34','2023-08-13 07:43:34');
/*!40000 ALTER TABLE `tbl_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) DEFAULT 0,
  `subtotal` decimal(10,2) DEFAULT 0.00,
  `quantity` int(11) DEFAULT NULL,
  `grandtotal` decimal(10,2) DEFAULT 0.00,
  `payment_method` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK1-CUS` (`cust_id`) USING BTREE,
  CONSTRAINT `FK1-CUS` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (5,3,129.89,2,129.89,'Bank Transfer',NULL,NULL),(6,5,99.90,1,99.90,NULL,'2023-09-11 16:25:27','2023-09-11 16:25:38'),(7,5,99.90,1,99.90,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,5,99.90,1,99.90,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,5,439.98,2,439.98,'Cash','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,5,439.98,2,439.98,NULL,'2023-09-12 13:50:34','2023-09-12 13:50:36'),(11,5,439.98,2,439.98,NULL,'2023-09-12 13:50:37','2023-09-12 13:50:39'),(12,5,439.98,2,439.98,NULL,'2023-09-12 13:50:42','2023-09-12 13:50:44'),(13,5,439.98,2,439.98,NULL,'2023-09-12 13:50:45','2023-09-12 13:50:46'),(14,5,439.98,2,439.98,'Bank Tranfer','2023-09-12 13:50:47','2023-09-12 13:50:48'),(15,5,439.98,2,439.98,NULL,'2023-09-12 13:50:49','2023-09-12 13:50:50'),(16,5,439.98,2,439.98,NULL,'2023-09-12 13:50:54','2023-09-12 13:52:00'),(17,5,439.98,2,439.98,NULL,'2023-09-12 13:51:08','2023-09-12 13:52:01'),(18,5,129.89,2,129.89,NULL,'2023-09-12 13:51:09','2023-09-12 13:52:02'),(19,3,159.00,1,159.00,'Cash','2023-09-12 13:51:22','2023-09-12 13:52:03'),(20,5,99.90,1,99.90,'cash','2023-09-12 13:51:23','2023-09-12 13:52:04'),(21,2,140.00,2,140.00,'bank_transfer','2023-09-12 13:51:28','2023-09-12 13:52:05'),(22,9,3426.97,7,3426.97,'bank_transfer','2023-09-12 13:51:29','2023-09-12 13:52:06'),(23,3,199.80,2,199.80,'banktransfer','2023-09-12 13:51:50','2023-09-12 13:52:07'),(24,9,1009.00,1,1009.00,'bank transfer','2023-09-12 13:51:53','2023-09-12 13:52:08'),(25,5,959.97,3,959.97,'cash','2023-09-12 13:51:54','2023-09-12 13:52:09'),(26,2,159.00,1,159.00,'bank transfer','2023-09-12 13:51:55','2023-09-12 13:52:10'),(27,5,899.99,1,899.99,'bank transfer','2023-09-12 13:51:56','2023-09-12 13:52:11'),(28,2,129.89,2,129.89,'cash','2023-09-12 13:51:57','2023-09-12 13:52:12'),(29,5,99.90,1,99.90,'bank transfer','2023-09-12 13:51:57','2023-09-12 13:52:13'),(30,3,2396.99,4,2396.99,'cash','2023-09-12 13:51:58','2023-09-12 13:52:14'),(31,3,129.89,2,129.89,'bank transfer','2023-09-12 08:46:36','2023-09-12 08:46:36'),(32,3,899.99,1,899.99,'cash','2023-09-13 07:03:57','2023-09-13 07:03:57'),(33,10,1170.00,3,1170.00,'cash','2023-09-14 01:26:25','2023-09-14 01:26:25'),(34,10,1879.00,2,1879.00,'cash','2023-09-14 02:50:57','2023-09-14 02:50:57'),(35,2,289.90,3,289.90,'bank transfer','2023-09-14 03:42:06','2023-09-14 03:42:06'),(36,10,3073.00,8,3073.00,'bank transfer','2023-09-14 22:28:54','2023-09-14 22:28:54'),(37,3,500.00,2,500.00,'Credit Card','2023-09-14 22:42:54','2023-09-14 22:42:54'),(38,10,1004.99,2,1004.99,'bank transfer','2023-09-15 03:03:49','2023-09-15 03:03:49'),(39,2,450.00,5,450.00,'Credit Card','2023-09-16 23:05:33','2023-09-16 23:05:33');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_detail`
--

DROP TABLE IF EXISTS `transaction_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transac_id` int(11) DEFAULT 0,
  `product_id` int(11) DEFAULT 0,
  `qty` int(11) DEFAULT 0,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_detail`
--

LOCK TABLES `transaction_detail` WRITE;
/*!40000 ALTER TABLE `transaction_detail` DISABLE KEYS */;
INSERT INTO `transaction_detail` VALUES (1,2,5,1,219.99,NULL,NULL),(2,2,5,1,219.99,NULL,NULL),(3,2,5,1,219.99,NULL,NULL),(4,2,5,1,219.99,NULL,NULL),(5,17,5,1,219.99,NULL,NULL),(6,17,5,1,219.99,NULL,NULL),(7,18,3,1,29.99,NULL,NULL),(8,18,4,1,99.90,NULL,NULL),(9,19,15,1,159.00,NULL,NULL),(10,20,4,1,99.90,NULL,NULL),(11,21,17,1,40.00,NULL,NULL),(12,21,12,1,100.00,NULL,NULL),(13,22,1,1,899.99,NULL,NULL),(14,22,3,1,29.99,NULL,NULL),(15,22,5,1,219.99,NULL,NULL),(16,22,15,1,159.00,NULL,NULL),(17,22,14,1,1009.00,NULL,NULL),(18,22,12,1,100.00,NULL,NULL),(19,22,16,1,1009.00,NULL,NULL),(20,23,4,2,99.90,NULL,NULL),(21,24,16,1,1009.00,NULL,NULL),(22,25,1,1,899.99,NULL,NULL),(23,25,3,2,29.99,NULL,NULL),(24,26,15,1,159.00,NULL,NULL),(25,27,1,1,899.99,NULL,NULL),(26,28,3,1,29.99,NULL,NULL),(27,28,4,1,99.90,NULL,NULL),(28,29,4,1,99.90,NULL,NULL),(29,30,5,1,219.99,NULL,NULL),(30,30,15,1,159.00,NULL,NULL),(31,30,16,1,1009.00,NULL,NULL),(32,30,16,1,1009.00,NULL,NULL),(33,31,4,1,99.90,NULL,NULL),(34,31,3,1,29.99,NULL,NULL),(35,32,1,1,899.99,NULL,NULL),(36,33,19,2,150.00,NULL,NULL),(37,33,20,1,870.00,NULL,NULL),(38,34,20,1,870.00,NULL,NULL),(39,34,14,1,1009.00,NULL,NULL),(40,35,4,1,99.90,NULL,NULL),(41,35,19,1,150.00,NULL,NULL),(42,35,17,1,40.00,NULL,NULL),(43,36,26,1,5.00,NULL,NULL),(44,36,27,1,250.00,NULL,NULL),(45,36,20,1,870.00,NULL,NULL),(46,36,23,1,999.00,NULL,NULL),(47,36,21,1,500.00,'2023-09-15 08:04:26','2023-09-15 08:04:26'),(48,36,19,1,150.00,'2023-09-15 08:04:24','2023-09-15 08:04:25'),(49,36,22,1,199.00,'2023-09-15 08:04:22','2023-09-15 08:04:23'),(50,36,24,1,100.00,'2023-09-15 08:04:21','2023-09-15 08:04:22'),(51,37,27,2,250.00,'2023-09-15 08:04:19','2023-09-15 08:04:19'),(52,38,28,1,999.99,'2023-09-15 03:03:49','2023-09-15 03:03:49'),(53,38,26,1,5.00,'2023-09-15 03:03:49','2023-09-15 03:03:49'),(54,39,34,5,90.00,'2023-09-16 23:05:34','2023-09-16 23:05:34');
/*!40000 ALTER TABLE `transaction_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK1-role-user` (`role_id`),
  KEY `FK2-emp` (`employee_id`),
  CONSTRAINT `FK1-role-user` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2-emp` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`eid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','12345',1,NULL,'2023-08-12 15:55:20','2023-08-12 15:55:57'),(2,'nasa','nasapc',2,NULL,'2023-08-12 15:55:20','2023-08-12 15:55:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-18 11:24:53
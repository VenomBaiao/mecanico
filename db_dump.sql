-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: compsys_db
-- ------------------------------------------------------
-- Server version	5.7.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` char(25) NOT NULL,
  `forename` char(25) NOT NULL,
  `town` char(20) NOT NULL,
  `county` char(20) NOT NULL DEFAULT '',
  `tel` char(15) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Alam','Nazmul','Castleisland','Kerry','0833114171'),(2,'Sadiq','Samina','Roscrea','Tipperary','0879820417'),(3,'Dowling','Sam','Castleisland','Kerry','0872183569'),(4,'Bluett','Luke','Abbeyfeale','Limerick','0868780756'),(5,'Abdul','Naiem','Castleislandd','Kerry','0877187552'),(6,'Abdul','Niamh','Castleisland','Kerry','0872183569'),(7,'Joe Landers','John','Anascaul','Kerry','0872183569'),(8,'Killian','Ross','Tralee','Kerry','0872183569'),(9,'O\'Sullivan','Daniel','Killarney','Kerry','0872183569'),(10,'Hossain','Azad','Tralee','Kerry','0871234567'),(11,'qtunBj0mD2','0j5hZvQS5c','GhxBqJGVmT','qigb9wyHGh','999999999');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `monthlyrepairs`
--

DROP TABLE IF EXISTS `monthlyrepairs`;
/*!50001 DROP VIEW IF EXISTS `monthlyrepairs`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `monthlyrepairs` AS SELECT 
 1 AS `status`,
 1 AS `total`,
 1 AS `ANY_VALUE(``repairs``.``RepairDate``)`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderitems` (
  `ordItems_id` int(11) NOT NULL AUTO_INCREMENT,
  `ord_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`ordItems_id`,`ord_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderitems`
--

LOCK TABLES `orderitems` WRITE;
/*!40000 ALTER TABLE `orderitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_id` int(11) NOT NULL DEFAULT '0',
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `ordDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ord_id`,`rep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,22,1,'2023-11-29 06:42:16'),(2,22,1,'2023-11-29 06:42:20'),(3,22,1,'2023-11-29 06:42:24'),(4,22,1,'2023-11-29 06:42:50'),(5,22,1,'2023-11-29 06:43:01'),(6,23,1,'2023-12-03 14:59:16'),(7,23,1,'2023-12-03 15:02:40'),(8,23,1,'2023-12-03 15:05:55');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repairs`
--

DROP TABLE IF EXISTS `repairs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repairs` (
  `Rep_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cust_ID` int(11) NOT NULL,
  `Staff_ID` int(11) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `DeviceType` enum('Laptop','Desktop','Printer','Other') NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `Model` varchar(30) NOT NULL,
  `OS` enum('Windows 7','Windows 8','Windows Vista','Windows Older','MacOS','Linux','Other') NOT NULL,
  `RepairDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CollectionDate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` enum('New','In Progress','Resolved','Waiting for Parts','Waiting for Customer','Validated','Invoiced','Estimate Assigned') NOT NULL DEFAULT 'New',
  `car_type` enum('vam','carrinha','sedan','compacto','suv','crossover','pick-up','descapotável','esportivo') DEFAULT NULL,
  PRIMARY KEY (`Rep_ID`,`Cust_ID`,`Staff_ID`),
  KEY `fk_Repairs_Cust` (`Cust_ID`),
  KEY `fk_Repairs_Staff` (`Staff_ID`),
  CONSTRAINT `fk_Repairs_Cust` FOREIGN KEY (`Cust_ID`) REFERENCES `customers` (`cust_id`),
  CONSTRAINT `fk_Repairs_Staff` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repairs`
--

LOCK TABLES `repairs` WRITE;
/*!40000 ALTER TABLE `repairs` DISABLE KEYS */;
INSERT INTO `repairs` VALUES (1,10,2,'Paper stuck','Printer','HP','Inkjet','Other','2015-01-01 19:34:24','2015-01-12 18:21:00','New',NULL),(2,1,1,'Motherboard Problem','Laptop','Alienware','M15x','Windows 7','2014-12-16 20:45:52','2014-12-25 17:29:18','Waiting for Customer',NULL),(3,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:24',NULL,'New',NULL),(4,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:26',NULL,'In Progress',NULL),(5,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:26',NULL,'Resolved',NULL),(6,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:26',NULL,'Waiting for Parts',NULL),(7,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:27',NULL,'Invoiced',NULL),(8,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:27',NULL,'Estimate Assigned',NULL),(9,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:27',NULL,'Validated',NULL),(10,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:27',NULL,'In Progress',NULL),(11,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:27',NULL,'New',NULL),(12,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:28',NULL,'Resolved',NULL),(13,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:28',NULL,'Resolved',NULL),(14,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:28',NULL,'Resolved',NULL),(15,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:28',NULL,'New',NULL),(16,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:28',NULL,'New',NULL),(17,1,1,'Virus Removal','Laptop','Dell','D360','Windows 7','2014-12-16 20:46:28',NULL,'New',NULL),(18,1,1,'Virus Removal','Desktop','Dell','D360','Windows 7','2014-12-16 20:46:29','2014-12-25 19:40:08','New',NULL),(19,1,1,'Office Installation\r\nPrinter driver\r\nAnti-virus Installation','Laptop','Lenovo','ThinkCentre Edge E73','Windows 7','2014-12-16 20:46:29','2014-12-25 17:22:04','New',NULL),(20,1,1,'Software Installation','Laptop','Apple','Macbook Pro','Windows 7','2014-12-16 22:01:07','2014-12-25 17:09:10','New',NULL),(21,2,1,'BSOD','Laptop','Lenovo','ThinkPad Edge E545','Windows 8','2014-12-25 19:29:02',NULL,'New',NULL),(22,3,1,'Hinges Broke','Laptop','Toshiba','Satellite Pro R50-B-','Linux','2014-12-25 19:34:24',NULL,'New',NULL),(23,1,1,'xxxx','Laptop','Lexo','V8','Windows 7','2023-12-02 07:00:38','2023-12-02 07:11:44','In Progress',NULL),(24,1,1,'xddd','Laptop','Lexo','v8','Windows 7','2023-12-04 04:51:59',NULL,'New',NULL);
/*!40000 ALTER TABLE `repairs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `forename` char(25) NOT NULL,
  `surname` char(25) NOT NULL,
  `username` varchar(11) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `town` char(20) DEFAULT NULL,
  `county` char(20) DEFAULT NULL,
  `tel` char(15) NOT NULL,
  PRIMARY KEY (`staff_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password` (`password`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'Nazmul','Alam','admin','admin','danazzy@live.com','Castleisland','Kerry','0833114171'),(2,'Samina','Nazmul Alam','Samboo','mag1cwand','Saminas14@hotmail.com','Roscrea','Tipperary','0879820417');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(40) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(4,2) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,'Peça de motor',1000,45.00),(2,'Serviço de reparo',500,75.00),(3,'Pneu',1,15.00),(4,'Sistema de suspensão',1,30.00),(5,'Freios',1,45.00),(6,'Sistema de direção',5,25.99),(7,'Sistema de arrefecimento',5,69.99);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `monthlyrepairs`
--

/*!50001 DROP VIEW IF EXISTS `monthlyrepairs`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `monthlyrepairs` AS select `repairs`.`Status` AS `status`,count(`repairs`.`Status`) AS `total`,any_value(`repairs`.`RepairDate`) AS `ANY_VALUE(``repairs``.``RepairDate``)` from `repairs` where (month(`repairs`.`RepairDate`) = extract(month from now())) group by `repairs`.`Status` order by `repairs`.`RepairDate` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-04  5:45:59

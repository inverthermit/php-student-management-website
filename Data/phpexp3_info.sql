CREATE DATABASE  IF NOT EXISTS `phpexp3` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `phpexp3`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: phpexp3
-- ------------------------------------------------------
-- Server version	5.6.14

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
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `sNo` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `hobbies` varchar(100) DEFAULT NULL,
  `Introduction` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info`
--

LOCK TABLES `info` WRITE;
/*!40000 ALTER TABLE `info` DISABLE KEYS */;
INSERT INTO `info` VALUES (10,'John','123','3','002','female','Others Literature ','hi asdfal;jskf'),(11,'Tim Luo','123','3','003','male','Others Basketball ','asdfadfa'),(12,'mary','123','3','004','female','Literature Art ','asdfadfaasdfwe'),(13,'Coco','123','3','005','female','Others Literature ','hihihihi'),(14,'jim','123','1','007','male','Others Basketball ',''),(15,'Shuo','123','3','008','female','Literature Art Football Basketball ','Hi 我是李硕'),(17,'Loli','123','1','013','female','Art ','hi loliloloolololo'),(18,'ljo','123','1','009','male','Basketball ',''),(19,'Jony','123','2','010','male','Football ','Football is my favorite!'),(20,'Elise','123','2','011','female','Others ','hi hahahaha'),(21,'Sun','123','1','012','male','Basketball ','ljlkj;falkjs;ldfawojfndvblaksf'),(22,'LOL','123','1','014','male','Art Basketball ','ahsdflhaksjef\r\n'),(23,'Rose','123','1','016','female','Basketball ','asdf'),(24,'Roseqwe','123','1','015','female','Literature Basketball ','asdf');
/*!40000 ALTER TABLE `info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-12 21:15:30

-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: multi
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(150) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `insurance` varchar(100) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `registration_date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (43,'Innocent','Appiah','1988-10-04','male','0242740320','9090','Bremang, Kumasi\r\nGhana','2021-02-07'),(44,'Stella','Opoku','2004-01-13','female','02343223','70006','Kronum, Kumasi','2021-02-07'),(45,'Joshua','Kusi','1990-10-01','male','024634343','84409','Tafo Pankrono, \'Kumasi\'','2021-02-07'),(46,'Mary','Osei','2000-02-10','female','02434343490','2030002','Teshie, Accra','2021-02-07'),(47,'Kwabena','Owusu','1993-05-05','male','055877564','08890','Sunyani','2021-02-07'),(48,'George','Ackrong','1994-06-16','male','023234334','33443','Adum, Kumasi','2021-02-07'),(50,'Mavis','Osei','1994-08-28','female','0544343945','3443','Bremang Kumasi','2021-02-07'),(51,'John','Mensah','1982-06-16','male','023432324','2903','Kaneshie, Accra','2021-02-07'),(52,'Steve','Asare','1956-08-20','male','0270342423423','323434','Spintex road\r\nAccra','2021-02-07'),(54,'Afiah','Menkah','2003-11-18','female','0245684356','07843','hello Ghana','2021-02-07'),(55,'Agnes','Adoma','2004-06-09','female','05534423423','0948','Dansoman, Accra\r\nGhana','2021-02-07'),(56,'Kwame','Oteng','2004-10-13','male','020389203','09990','Not Known','2021-02-07');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `consultation_fee` float NOT NULL DEFAULT 0,
  `card_fee` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,50,20);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treatments`
--

DROP TABLE IF EXISTS `treatments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treatments` (
  `treatment_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `test` text DEFAULT NULL,
  `test_results` text DEFAULT NULL,
  `test_fee` float NOT NULL DEFAULT 0,
  `prescription` text DEFAULT NULL,
  `medicine_fee` float NOT NULL DEFAULT 0,
  `consultation_fee` float DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`treatment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treatments`
--

LOCK TABLES `treatments` WRITE;
/*!40000 ALTER TABLE `treatments` DISABLE KEYS */;
INSERT INTO `treatments` VALUES (6,44,NULL,NULL,NULL,NULL,0,NULL,0,30,'2021-02-07'),(7,45,NULL,NULL,NULL,NULL,0,NULL,0,30,'2021-02-07'),(8,46,NULL,NULL,NULL,NULL,0,NULL,0,30,'2021-02-07'),(10,48,NULL,NULL,NULL,NULL,0,NULL,0,30,'2021-02-07'),(12,50,NULL,NULL,NULL,NULL,0,NULL,0,30,'2021-02-07'),(13,51,NULL,NULL,NULL,NULL,0,NULL,0,30,'2021-02-07'),(14,52,NULL,NULL,NULL,NULL,0,NULL,0,30,'2021-02-07'),(17,43,5,'Now checking','Malaria Fever','he is ok',100,'para 300mg\r\nmultivite 50mg',0,30,'2021-02-05'),(18,55,NULL,NULL,NULL,NULL,0,NULL,0,30,'2021-02-07'),(19,56,NULL,NULL,NULL,NULL,0,NULL,0,30,'2021-02-07'),(20,43,5,'no p','hmmm',NULL,0,NULL,0,30,'2021-02-06'),(21,43,NULL,NULL,NULL,NULL,0,NULL,0,30,'2021-02-07'),(22,43,5,'hello how are you?','just a normal test ok',NULL,0,'para 50mg\r\nbco 100mg\r\nblood tonic',0,30,'2021-02-08'),(23,43,NULL,NULL,NULL,NULL,0,NULL,0,30,'2021-02-09'),(27,43,5,'I think he will be fine','test for strongness','He is very very strong',500,'para 500mg\r\nbco 50mg',10,30,'2021-02-10');
/*!40000 ALTER TABLE `treatments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_role` varchar(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'developer','developer','developer','1','$2y$10$ab2H/q2BKxmECrp9gFgTfuRqhP74j86.WQRmwrKDFZjKJhIY9ndO2',1,0,'2021-02-05'),(4,'Receptionist','Receptionist','receptionist','4','$2y$10$ST561hhugzTBXymyy0DuvORpx5Y5zoyUqHhIsdnijqjK2DcC1r6ei',1,0,'2021-02-06'),(5,'doctor','doctor','doctor','2','$2y$10$BadgB./qlGbPSxKOsTxEYOFt3uITSTH/Mb4FdmL/5yRrUobYgzGjW',1,0,'2021-02-06'),(6,'Lab','Lab','lab','3','$2y$10$r3UEFcl2BLElnQM/rpa2uu/1/e3wJHJmfLLK/./p1xicM0A68LSdO',1,0,'2021-02-06'),(7,'pharmacist','pharmacy','pharmacist','5','$2y$10$/8Ezqk.rzY2HURK5/cH0ouNmE8L/IkMtJOhUGt7P6Xfrr2GFiu2Gy',1,0,'2021-02-06');
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

-- Dump completed on 2021-02-14 11:54:03

-- MySQL dump 10.13  Distrib 5.7.17, for osx10.12 (x86_64)
--
-- Host: localhost    Database: traits
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Analytical and Creative Thinking',12),(2,'Complex Communication - Oral and Written',6),(3,'Leadership and Teamwork',9),(4,'Digital and Quantitative Literacy',5),(5,'Global Perspective',8),(6,'Adaptability, Initiative, and Risk-Taking',7),(7,'Integrity and Ethical Decision-Making',6),(8,'Habits of Mind',8);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoryaspect`
--

DROP TABLE IF EXISTS `categoryaspect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoryaspect` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) DEFAULT NULL,
  `attributeDesc` varchar(500) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoryaspect`
--

LOCK TABLES `categoryaspect` WRITE;
/*!40000 ALTER TABLE `categoryaspect` DISABLE KEYS */;
INSERT INTO `categoryaspect` VALUES (1,1,'Identify, manage and address complex problems (especially in groups)',1),(2,1,'Detect bias, and distinguish between reliable and unsound information',1),(3,1,'Control information overload',1),(4,1,'Formulate meaningful questions',1),(5,1,'Analyze and create ideas and knowledge',1),(6,1,'Use trial and error; devise and test solutions to problems',1),(7,1,'Imagine alternatives',1),(8,1,'Develop cross-disciplinary knowledge and perspectives',1),(9,1,'Engage in sustained reasoning',1),(10,1,'Synthesize and adapt',1),(11,1,'Solve new problems that don\'t have rule-based solutions',1),(12,1,'Use knowledge and creativity to solve complex \"real-world\" problems',1),(13,2,'Understand and express ideas in two or more languages',1),(14,2,'Communicate clearly to diverse audiences',1),(15,2,'Listen attentively',1),(16,2,'Speak effectively',1),(17,2,'Write clearly and concisely - for a variety of audiences',1),(18,2,'Explain information and compellingly persuade others of its implications',1),(19,3,'Initiate new ideas (particularly in a group dynamic)',1),(20,3,'Lead through influence',1),(21,3,'Build, trust, resolve conflicts, and provide support for others',1),(22,3,'Facilitate group discussions, forge consensus, and negotiate outcomes',1),(23,3,'Teach, coach and counsel others',1),(24,3,'Enlist help',1),(25,3,'Collaborate tasks, manage groups, and delegate responsibilities',1),(26,3,'Implement decisions and meet goals',1),(27,3,'Share the credit',1),(28,4,'Can use a computer',1),(29,4,'Iphone',1),(30,4,'blah0',1),(31,4,'0',0),(32,4,'0',1),(33,5,'One',1),(34,5,'Two',1),(35,5,'Three',1),(36,5,'Should be false',0),(37,5,'Develop social and intellectual skills to navigate effectively across cultures',1),(38,5,'Use 21st century skills to understand and address global issues',1),(39,5,'Learn from, and work collaboratively with, individuals from diverse cultures, religions, and lifestyles in a spirit of mutual respect and open dialogue',1),(40,5,'Leverage social and cultural differences to create new ideas and achieve success',1),(41,6,'Develop flexibility, agility, and adaptability',1),(42,6,'Bring a sense of courage to unfamiliar situations',1),(43,6,'Explore and experiment',1),(44,6,'Work effectively in a climate of ambiguity and changing priorities',1),(45,6,'View failure as an opportunity to learn, and acknowledge that innovation involves small successes and frequent mistakes',1),(46,6,'Cultivate an independence of spirit to explore new roles, ideas, and strategies',1),(47,6,'Develop entrepreneurial literacy',1),(48,7,'Test',1),(49,7,'Foster integrity, honesty, fairness and respect',1),(50,7,'Exhibit moral courage in confronting unjust situations',1),(51,7,'Act responsibly, with the interests and well-being of the larger community in mind',1),(52,7,'Develop a fundamental understanding of emerging ethical issues and dilemmas regarding new media and technologies',1),(53,7,'Make reasoned and ethical decisions in response to complex problems',1),(54,8,'Conscientiousness',0),(55,8,'Creativity',0),(56,8,'Love of Learning / Curiosity',1),(57,8,'Resilience',1),(58,8,'Persistence',1),(59,8,'Test',1),(60,8,'Stress Management',1),(61,8,'Time Management',1);
/*!40000 ALTER TABLE `categoryaspect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `grade` char(2) DEFAULT NULL,
  `DOB` varchar(12) DEFAULT NULL,
  `overallDesc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'John','Smith','11','01/01/2000','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac consequat velit, vitae maximus tortor. '),(2,'Glue','Stick','9','02/31/2002','Student Commentary\n'),(3,'Good','Morning','10','02/05/2001','Just another test person.'),(4,'Outof','Names','12','09/23/1999','Insert description here - too lazy to come up with one.');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentquality`
--

DROP TABLE IF EXISTS `studentquality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentquality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuID` varchar(3) DEFAULT NULL,
  `attriID` varchar(3) DEFAULT NULL,
  `assessment` varchar(1000) DEFAULT NULL,
  `catID` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentquality`
--

LOCK TABLES `studentquality` WRITE;
/*!40000 ALTER TABLE `studentquality` DISABLE KEYS */;
INSERT INTO `studentquality` VALUES (322,'2','1',NULL,'1'),(323,'2','4',NULL,'1'),(324,'2','34',NULL,'2'),(335,'1','1',NULL,'1'),(336,'1','2',NULL,'1'),(337,'1','4',NULL,'1'),(338,'1','6',NULL,'1'),(339,'1','8',NULL,'1'),(340,'1','19',NULL,'2'),(341,'1','21',NULL,'3'),(342,'1','22',NULL,'3'),(343,'1','28',NULL,'4');
/*!40000 ALTER TABLE `studentquality` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-14 13:15:04

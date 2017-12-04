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
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Student` (
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
-- Dumping data for table `Student`
--

LOCK TABLES `Student` WRITE;
/*!40000 ALTER TABLE `Student` DISABLE KEYS */;
INSERT INTO `Student` VALUES (1,'John','Smith','11','01/01/2000','Just your typical John Smith.'),(2,'Glue','Stick','9','02/31/2002','Struggled a little bit to get her footing initially, but now is good!'),(3,'Good','Morning','10','02/05/2001','Just another test person.'),(4,'Outof','Names','12','09/23/1999','Insert description here - too lazy to come up with one.');
/*!40000 ALTER TABLE `Student` ENABLE KEYS */;
UNLOCK TABLES;

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` varchar(2) DEFAULT NULL,
  `attributeDesc` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoryaspect`
--

LOCK TABLES `categoryaspect` WRITE;
/*!40000 ALTER TABLE `categoryaspect` DISABLE KEYS */;
INSERT INTO `categoryaspect` VALUES (1,'1','Identify, manage and address complex problems'),(2,'1','Detect bias, and distinguish between reliable and unsound information'),(3,'1','Control information overload'),(4,'1','Formulate meaningful questions'),(5,'1','Analyze and create ideas and knowledge'),(6,'1','Use trial and error; devise and test solutions to problems'),(7,'1','Imagine alternatives'),(8,'1','Develop cross-disciplinary knowledge and perspectives'),(9,'1','Engage in sustained reasoning'),(10,'1','Synthesize and adapt'),(11,'1','Solve new problems that donâ€™t have rule-based solutions'),(12,'1','Use knowledge and creativity to solve complex â€œreal-worldâ€ problems'),(13,'2','Understand and express ideas in two or more languages'),(14,'2','Communicate clearly to diverse audiences'),(15,'2','Listen attentively'),(16,'2','Speak effectively'),(17,'2','Write clearly and concisely - for a variety of audiences'),(18,'2','Explain information and compellingly persuade others of its implications'),(19,'3','Initiate new ideas'),(20,'3','Lead through influence'),(21,'3','Build, trust, resolve conflicts, and provide support for others'),(22,'3','Facilitate group discussions, forge consensus, and negotiate outcomes'),(23,'3','Teach, coach and counsel others'),(24,'3','Enlist help'),(25,'3','Collaborate tasks, manage groups, and delegate responsibilities'),(26,'3','Implement decisions and meet goals'),(27,'3','Share the credit'),(28,'4','Understand, use and apply digital technologies'),(29,'4','Create digital knowledge and media'),(30,'4','Use multimedia resources to communicate ideas effectively in a variety of forms'),(31,'4','Master and use higher-level mathematics'),(32,'4','Understand traditional and emerging topics in math, science, and technology, environmental sciences, robotics, fractals, cellular automata, nanotechnology, and biotechnology'),(33,'5','Develop open-mindedness, particularly regarding the values, traditions of others'),(34,'5','Understand non-western history, politics, religion and culture'),(35,'5','Develop facility with one or more international languages'),(36,'5','Use technology to connect with people and events globally'),(37,'5','Develop social and intellectual skills to navigate effectively across cultures'),(38,'5','Use 21st century skills to understand and address global issues'),(39,'5','Learn from, and work collaboratively with, individuals from diverse cultures, religions, and lifestyles in a spirit of mutual respect and open dialogue'),(40,'5','Leverage social and cultural differences to create new ideas and achieve success'),(41,'6','Develop flexibility, agility, and adaptability'),(42,'6','Bring a sense of courage to unfamiliar situations'),(43,'6','Explore and experiment'),(44,'6','Work effectively in a climate of ambiguity and changing priorities'),(45,'6','View failure as an opportunity to learn, and acknowledge that innovation involves small successes and frequent mistakes'),(46,'6','Cultivate an independence of spirit to explore new roles, ideas, and strategies'),(47,'6','Develop entrepreneurial literacy'),(48,'7','Sustain an empathetic and compassionate outlook'),(49,'7','Foster integrity, honesty, fairness and respect'),(50,'7','Exhibit moral courage in confronting unjust situations'),(51,'7','Act responsibly, with the interests and well-being of the larger community in mind'),(52,'7','Develop a fundamental understanding of emerging ethical issues and dilemmas regarding new media and technologies'),(53,'7','Make reasoned and ethical decisions in response to complex problems'),(54,'8','Conscientiousness'),(55,'8','Creativity'),(56,'8','Love of Learning / Curiosity'),(57,'8','Resilience'),(58,'8','Persistence'),(59,'8','Self-efficacy'),(60,'8','Stress Management'),(61,'8','Time Management');
/*!40000 ALTER TABLE `categoryaspect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentquality`
--

DROP TABLE IF EXISTS `studentquality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentquality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuID` int(11) DEFAULT NULL,
  `attriID` int(11) DEFAULT NULL,
  `assessment` varchar(100) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentquality`
--

LOCK TABLES `studentquality` WRITE;
/*!40000 ALTER TABLE `studentquality` DISABLE KEYS */;
INSERT INTO `studentquality` VALUES (1,1,1,'Insert commentary on student',1),(2,1,3,'Insert commentary on student',1),(3,1,4,'Insert commentary on student',1),(4,1,7,'Insert commentary on student',1),(5,1,11,'Insert commentary on student',1),(6,1,14,'Insert commentary on student',2),(7,1,17,'Insert commentary on student',2),(8,1,20,'Insert commentary on student',3),(9,1,21,'Insert commentary on student',3),(10,1,22,'Insert commentary on student',3),(11,1,25,'Insert commentary on student',3),(12,1,29,'Insert commentary on student',4),(13,1,31,'Insert commentary on student',4),(14,1,36,'Insert commentary on student',5),(15,1,37,'Insert commentary on student',5),(16,1,40,'Insert commentary on student',5),(17,1,42,'Insert commentary on student',6),(18,1,43,'Insert commentary on student',6),(19,1,46,'Insert commentary on student',6),(20,1,49,'Insert commentary on student',7),(21,1,50,'Insert commentary on student',7),(22,1,55,'Insert commentary on student',8),(23,1,57,'Insert commentary on student',8),(24,1,60,'Insert commentary on student',8),(25,1,61,'Insert commentary on student',8);
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

-- Dump completed on 2017-08-10 12:10:10

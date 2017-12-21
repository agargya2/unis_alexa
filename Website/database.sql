-- MySQL dump 10.14  Distrib 5.5.56-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: homeworkDatabase
-- ------------------------------------------------------
-- Server version	5.5.56-MariaDB

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
-- Table structure for table `alexausers`
--

DROP TABLE IF EXISTS `alexausers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alexausers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `alexaid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alexausers`
--

LOCK TABLES `alexausers` WRITE;
/*!40000 ALTER TABLE `alexausers` DISABLE KEYS */;
INSERT INTO `alexausers` VALUES (70,'1','amzn1.ask.account.AHDXZZMNQBYQIWW4IOVYVLJU6IV66TRONNQ2MKCMNB7I5WKKCGI6GKJVH6L5ELRRA6BJB34HFUZSJDX2QFNVDDJXRHJQNNJQUALNCYM3DAMO75AZAGBO53QHWUP4ZOHTGJBLI7ZHIUP4I2LTY2KDCSZH65RVMGIZQVKPDGAFU2PMDWN2ELO3VEI7ZEDRMXGDI2WB547BMX33KQY'),(75,'1','amzn1.ask.account.AGUW2BBLZN3VKI7ALVLJNBDQ3EV2GGWF3OT5JTCQMU6D6EMFJRMO6PADNGZMT6XC4URZZWUDQHFJTZQLHF7RUBRHB56OCNZK3PDYO34LL7DA4JXUU5PQDV7G3SKANN3362XVI7VNWDM62AGNHQT3NZQBWK5IJFQHM5QBBFJ6O722MDOSLKRAPWCVV44OIU55GFQENB3VVP3ADJA'),(76,'1','amzn1.ask.account.AEXBPACEROSMAFO77OOOJIKYLP4NLSI7YROU35Q357AWBH262BYX675CIL4ZX2OAPW5RKINOUIWGTCNJ4X2MKA5RRHPMOS4Y3O2RPCUWB6IRT446SHWA5ZV3TGGRRMAEFDRY2YQAETM7KXHCOLVQXI6AEFML3PP4LOMDYQQ2F6LDRIWWTFOBHZALF3P3UKQ5EQ6T3QTGHOH7RWY'),(78,'27','amzn1.ask.account.AE745XF32JF3E7AIUOIUCBKPIHII7JELLBZAIQUVHM4MHYX6WXPX75V7FZ6ZN77MXWFX3CD6TBBGMFA3UTQYAMIPHBTVQBR4NR7HJTEVUPSENJJGABSMPPPNQGOQTCWHWXFIBWM7DMSIDBCP4W4YCCPBHM4X36OWC2JWE4J7U35SS4EUCF6PVTQYORARLXEBBWNUJZOEUZG7AZA');
/*!40000 ALTER TABLE `alexausers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classassignments`
--

DROP TABLE IF EXISTS `classassignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classassignments` (
  `classid` int(11) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assignment` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classassignments`
--

LOCK TABLES `classassignments` WRITE;
/*!40000 ALTER TABLE `classassignments` DISABLE KEYS */;
INSERT INTO `classassignments` VALUES (3,6,'have a long neck',' your neck must be 16 ft or longer for this class'),(2,7,'plant a tree','get a garden'),(2,8,'live da life','do what you love'),(1,9,'criminal','break a law'),(1,10,'study rebellions','find two historical rebellions'),(4,11,'play a game','get a highscore'),(2,14,'pg. 13','complete section 1 & 2'),(1,15,'shay\'s rebellion','figure out who shay was, and why he rebelled'),(6,17,'you should not see me','deleted!'),(7,18,'don\'t look at me','don\'t see this'),(2,24,'span life','find out the span life of 5 animals'),(2,30,'discovering life','find 100 species in your backyard'),(2,31,'biology','do some bio lab'),(34,35,'see me','see me'),(35,39,'search','find the word\'s definition'),(35,40,'identify your self','find what information there is on the internet about you'),(35,41,'google','search stuff up'),(35,43,'google home','tell ethan shut up'),(39,44,'Capstone','Do your Roman Podcast!'),(41,45,'Computer Literacy Project','Present your Computer Literacy Project'),(40,46,'Essay','Do your english essay'),(39,47,'Coat of Arms Prompt','Design your noble family\'s coat of arms'),(37,48,'Bio Test','Study for your bio test'),(37,49,'Genes to Protein','Read the Genes to Protein article'),(38,50,'Final Exam','Study for the final exam'),(42,52,'Decorating a Cake','Use a knife and all the sprinkles');
/*!40000 ALTER TABLE `classassignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `codes`
--

DROP TABLE IF EXISTS `codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codes` (
  `code` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codes`
--

LOCK TABLES `codes` WRITE;
/*!40000 ALTER TABLE `codes` DISABLE KEYS */;
INSERT INTO `codes` VALUES ('CK3TXW'),('REWIZ9'),('2DO053'),('A6QCOT'),('36OQ9Y'),('LRXHP8'),('0GRDO8'),('7QZF86'),('UTZBYC'),('YDATLE'),('WH38K5'),('5PZCGN'),('V1PL0U'),('9EPV20'),('CP7J8U'),('NGUKF8'),('JE1LRQ'),('AL2T6N');
/*!40000 ALTER TABLE `codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentclasses`
--

DROP TABLE IF EXISTS `studentclasses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentclasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `classid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentclasses`
--

LOCK TABLES `studentclasses` WRITE;
/*!40000 ALTER TABLE `studentclasses` DISABLE KEYS */;
INSERT INTO `studentclasses` VALUES (21,2,5),(108,21,1),(120,1,37),(121,1,38),(122,1,39),(123,1,40),(124,1,42),(137,27,37),(138,27,41),(139,27,42),(140,26,42),(151,28,38),(152,28,39),(153,28,40),(154,28,41),(155,28,42);
/*!40000 ALTER TABLE `studentclasses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacherclasses`
--

DROP TABLE IF EXISTS `teacherclasses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacherclasses` (
  `userid` int(11) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacherclasses`
--

LOCK TABLES `teacherclasses` WRITE;
/*!40000 ALTER TABLE `teacherclasses` DISABLE KEYS */;
INSERT INTO `teacherclasses` VALUES (3,37,'Intro to Bio'),(3,38,'Math 1'),(2,39,'World History'),(2,40,'Freshman English'),(2,41,'Comp Lit'),(2,42,'Intro to Cake Decorating');
/*!40000 ALTER TABLE `teacherclasses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text,
  `email` text,
  `role` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'aniket','ani123','agargya2','student'),(2,'aniket123','pass','gargya','teacher'),(3,'matatov2','12345','matatov2','teacher'),(25,'as','asdf','w@i.f','teacher'),(26,'jbgarvey','wyverne22','jbgarvey@illinois.edu','student'),(27,'ponyrider','ponyrider','ponyrider@ponyrider.com','student'),(28,'ETHAN','WHAT','ethans3@illinois.edu','student'),(29,'123','123','123@123.com','student'),(30,'jbgarvey@illinois.edu','wyverne22','jbgarvey@illinois.edu','teacher');
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
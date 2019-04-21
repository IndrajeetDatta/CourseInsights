-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: courseInsights
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapters` (
  `chapter_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_name` varchar(255) NOT NULL,
  `indx` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`chapter_id`),
  KEY `fk_course` (`course_id`),
  CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapters`
--

LOCK TABLES `chapters` WRITE;
/*!40000 ALTER TABLE `chapters` DISABLE KEYS */;
INSERT INTO `chapters` VALUES (157,'ThaiMOOC Project Introduction',1,31),(158,'Week 0: Introduction to LaTeX program for academic documents',3,31),(159,'Week 1: Introduction to LaTeX Program I',8,31),(160,'Week 2: Introduction to LaTeX II',17,31),(161,'Week 3: Introduction to LaTeX III',26,31),(162,'Week 4: Using the LaTeX program for academic documents I',33,31),(163,'Week 5: Using the LaTeX program for academic documents II',41,31),(164,'Week 6: Using the LaTeX program for academic documents III',48,31),(165,'Week 7: Using the LaTeX program for academic documents IV',56,31),(166,'Week 8: Using the LaTeX program for academic documents V',63,31),(167,'Week 9: Using the LaTeX program for academic documents VI',70,31),(168,'Week 10: Using the LaTeX program for academic documents VII',79,31),(169,'Online post-survey (ThaiMOOC)',88,31),(170,'ThaiMOOC Project Introduction',1,32),(171,'Week 0: Introduction to LaTeX program for academic documents',3,32),(172,'Week 1: Introduction to LaTeX Program I',8,32),(173,'Week 2: Introduction to LaTeX II',17,32),(174,'Week 3: Introduction to LaTeX III',26,32),(175,'Week 4: Using the LaTeX program for academic documents I',33,32),(176,'Week 5: Using the LaTeX program for academic documents II',41,32),(177,'Week 6: Using the LaTeX program for academic documents III',48,32),(178,'Week 7: Using the LaTeX program for academic documents IV',56,32),(179,'Week 8: Using the LaTeX program for academic documents V',63,32),(180,'Week 9: Using the LaTeX program for academic documents VI',70,32),(181,'Week 10: Using the LaTeX program for academic documents VII',79,32),(182,'Online post-survey (ThaiMOOC)',88,32);
/*!40000 ALTER TABLE `chapters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `course_number` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isUpdated` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`course_id`),
  KEY `fk_user` (`user_id`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (31,'STEM Based Learning for Science','mu003',15,1),(32,'Gender and Culture','gc009',16,1);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussions`
--

DROP TABLE IF EXISTS `discussions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussions` (
  `discussion_id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_name` varchar(255) NOT NULL,
  `indx` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`discussion_id`),
  KEY `fk_course` (`course_id`),
  CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=995 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussions`
--

LOCK TABLES `discussions` WRITE;
/*!40000 ALTER TABLE `discussions` DISABLE KEYS */;
INSERT INTO `discussions` VALUES (853,'Questionnaire before starting school',4,31),(854,'Course content and learning calendar',7,31),(855,'Introduce content in week 1',9,31),(856,'pretest',10,31),(857,'LaTeX program installation',11,31),(858,'Printing marks and symbols in LaTeX',13,31),(859,'Document structure arrangement in LaTeX',14,31),(860,'Final week 1 test',15,31),(861,'Summary of content in week 1',16,31),(862,'Introduce content in week 2',18,31),(863,'Document structure in LaTeX',19,31),(864,'Writing documents by LaTeX',20,31),(865,'Font customization',21,31),(866,'Creating a roster',22,31),(867,'Creating a text box in LaTeX',23,31),(868,'Final week 2 test',24,31),(869,'Summary of content in week 2',25,31),(870,'Introduce content in week 3',27,31),(871,'Creating equations using LaTeX',28,31),(872,'Using environment math mode',29,31),(873,'Important mathematical symbols in LaTeX',30,31),(874,'Test at the end of week 3',31,31),(875,'Summary of content in week 3',32,31),(876,'Introduce content in week 4',34,31),(877,'Creating a simple table',35,31),(878,'Creating multiple columns',36,31),(879,'Creating multiple rows',37,31),(880,'Creating color tables',38,31),(881,'Final test of week 4',39,31),(882,'Summary of content in week 4',40,31),(883,'Introduce content in week 5',42,31),(884,'Inserting images in LaTeX',43,31),(885,'Resizing and rotating images',44,31),(886,'Creating color text',45,31),(887,'Test at the end of week 5',46,31),(888,'Summary of content in week 5',47,31),(889,'Introduce content in week 6',49,31),(890,'Creating a resized delimiter',50,31),(891,'Vector and matrix creation',51,31),(892,'Inserting text in mathematical equations',52,31),(893,'Defining new mathematical symbols',53,31),(894,'Test at the end of week 6',54,31),(895,'Summary of content in week 6',55,31),(896,'Introduce content in week 7',57,31),(897,'Creating Thai documents with LaTeX 1',58,31),(898,'Creating Thai documents with LaTeX 2',59,31),(899,'Creating Thai documents with LaTeX 3',60,31),(900,'Test at the end of week 7',61,31),(901,'Summary of content in week 7',62,31),(902,'Introduce content in week 8',64,31),(903,'Creating a table of contents',65,31),(904,'Keyword indexing',66,31),(905,'Bibliography',67,31),(906,'Test at the end of week 8',68,31),(907,'Summary of content in week 8',69,31),(908,'Introduce content in week 9',71,31),(909,'Drawing using LaTeX',72,31),(910,'Drawing curves by pict2e',73,31),(911,'Drawing using PSTricks',74,31),(912,'Plotting graphs using PSTricks 1',75,31),(913,'Plotting using PSTricks 2',76,31),(914,'Test at the end of week 9',77,31),(915,'Summary of content in week 9',78,31),(916,'Introduce content in week 10',80,31),(917,'Use beamer',81,31),(918,'Creating text effects',82,31),(919,'environment in beamer',83,31),(920,'Configuration in beamer',84,31),(921,'Test at the end of week 10',85,31),(922,'Summary of content in week 10',86,31),(923,'Quiz after graduation',87,31),(924,'Questionnaire before starting school',4,32),(925,'Course content and learning calendar',7,32),(926,'Introduce content in week 1',9,32),(927,'pretest',10,32),(928,'LaTeX program installation',11,32),(929,'Printing marks and symbols in LaTeX',13,32),(930,'Document structure arrangement in LaTeX',14,32),(931,'Final week 1 test',15,32),(932,'Summary of content in week 1',16,32),(933,'Introduce content in week 2',18,32),(934,'Document structure in LaTeX',19,32),(935,'Writing documents by LaTeX',20,32),(936,'Font customization',21,32),(937,'Creating a roster',22,32),(938,'Creating a text box in LaTeX',23,32),(939,'Final week 2 test',24,32),(940,'Summary of content in week 2',25,32),(941,'Introduce content in week 3',27,32),(942,'Creating equations using LaTeX',28,32),(943,'Using environment math mode',29,32),(944,'Important mathematical symbols in LaTeX',30,32),(945,'Test at the end of week 3',31,32),(946,'Summary of content in week 3',32,32),(947,'Introduce content in week 4',34,32),(948,'Creating a simple table',35,32),(949,'Creating multiple columns',36,32),(950,'Creating multiple rows',37,32),(951,'Creating color tables',38,32),(952,'Final test of week 4',39,32),(953,'Summary of content in week 4',40,32),(954,'Introduce content in week 5',42,32),(955,'Inserting images in LaTeX',43,32),(956,'Resizing and rotating images',44,32),(957,'Creating color text',45,32),(958,'Test at the end of week 5',46,32),(959,'Summary of content in week 5',47,32),(960,'Introduce content in week 6',49,32),(961,'Creating a resized delimiter',50,32),(962,'Vector and matrix creation',51,32),(963,'Inserting text in mathematical equations',52,32),(964,'Defining new mathematical symbols',53,32),(965,'Test at the end of week 6',54,32),(966,'Summary of content in week 6',55,32),(967,'Introduce content in week 7',57,32),(968,'Creating Thai documents with LaTeX 1',58,32),(969,'Creating Thai documents with LaTeX 2',59,32),(970,'Creating Thai documents with LaTeX 3',60,32),(971,'Test at the end of week 7',61,32),(972,'Summary of content in week 7',62,32),(973,'Introduce content in week 8',64,32),(974,'Creating a table of contents',65,32),(975,'Keyword indexing',66,32),(976,'Bibliography',67,32),(977,'Test at the end of week 8',68,32),(978,'Summary of content in week 8',69,32),(979,'Introduce content in week 9',71,32),(980,'Drawing using LaTeX',72,32),(981,'Drawing curves by pict2e',73,32),(982,'Drawing using PSTricks',74,32),(983,'Plotting graphs using PSTricks 1',75,32),(984,'Plotting using PSTricks 2',76,32),(985,'Test at the end of week 9',77,32),(986,'Summary of content in week 9',78,32),(987,'Introduce content in week 10',80,32),(988,'Use beamer',81,32),(989,'Creating text effects',82,32),(990,'environment in beamer',83,32),(991,'Configuration in beamer',84,32),(992,'Test at the end of week 10',85,32),(993,'Summary of content in week 10',86,32),(994,'Quiz after graduation',87,32);
/*!40000 ALTER TABLE `discussions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `htmls`
--

DROP TABLE IF EXISTS `htmls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `htmls` (
  `html_id` int(11) NOT NULL AUTO_INCREMENT,
  `html_name` varchar(255) NOT NULL,
  `html_length` int(11) DEFAULT NULL,
  `html_type` varchar(255) NOT NULL,
  `has_pdf` tinyint(1) NOT NULL,
  `pdf_pages` int(11) DEFAULT NULL,
  `indx` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`html_id`),
  KEY `fk_course` (`course_id`),
  CONSTRAINT `htmls_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=561 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `htmls`
--

LOCK TABLES `htmls` WRITE;
/*!40000 ALTER TABLE `htmls` DISABLE KEYS */;
INSERT INTO `htmls` VALUES (481,'Learning calendar',660,'content',0,1,7,31),(482,'Learning documents',0,'header',1,5,11,31),(483,'Learning documents',0,'header',1,5,12,31),(484,'Learning documents',0,'header',1,3,13,31),(485,'Learning documents',0,'header',1,6,14,31),(486,'Learning documents',0,'header',1,4,19,31),(487,'Learning documents',0,'header',1,3,20,31),(488,'Learning documents',0,'header',1,3,21,31),(489,'Learning documents',0,'header',1,5,22,31),(490,'Learning documents',0,'header',1,3,23,31),(491,'Learning documents',0,'header',1,3,28,31),(492,'Learning documents',0,'header',1,3,29,31),(493,'Learning documents',0,'header',1,4,30,31),(494,'Learning documents',0,'header',1,4,35,31),(495,'Learning documents',0,'header',1,2,36,31),(496,'Learning documents',0,'header',1,2,37,31),(497,'Learning documents',0,'header',1,4,38,31),(498,'Learning documents',1,'header',1,3,43,31),(499,'Learning documents',0,'header',1,3,44,31),(500,'Learning documents',0,'header',1,3,45,31),(501,'Learning documents',0,'header',1,4,50,31),(502,'Learning documents',0,'header',1,2,51,31),(503,'Learning documents',0,'header',1,1,52,31),(504,'Learning documents',0,'header',1,3,53,31),(505,'Learning documents',0,'header',1,4,58,31),(506,'Learning documents',0,'header',1,3,59,31),(507,'Learning documents',0,'header',1,4,60,31),(508,'Learning documents',0,'header',1,4,65,31),(509,'Learning documents',0,'header',1,3,66,31),(510,'Learning documents',0,'header',1,4,67,31),(511,'Learning documents',0,'header',1,3,72,31),(512,'Learning documents',0,'header',1,3,73,31),(513,'Learning documents',0,'header',1,4,74,31),(514,'Learning documents',0,'header',1,4,75,31),(515,'Learning documents',0,'header',1,4,76,31),(516,'Learning documents',0,'header',1,4,81,31),(517,'Learning documents',0,'header',1,5,82,31),(518,'Learning documents',0,'header',1,3,83,31),(519,'Learning documents',0,'header',1,3,84,31),(520,'Online post-survey (ThaiMOOC)',12,'header',0,1,89,31),(521,'Learning calendar',660,'content',0,1,7,32),(522,'Learning documents',0,'header',1,5,11,32),(523,'Learning documents',0,'header',1,5,12,32),(524,'Learning documents',0,'header',1,3,13,32),(525,'Learning documents',0,'header',1,6,14,32),(526,'Learning documents',0,'header',1,4,19,32),(527,'Learning documents',0,'header',1,3,20,32),(528,'Learning documents',0,'header',1,3,21,32),(529,'Learning documents',0,'header',1,5,22,32),(530,'Learning documents',0,'header',1,3,23,32),(531,'Learning documents',0,'header',1,3,28,32),(532,'Learning documents',0,'header',1,3,29,32),(533,'Learning documents',0,'header',1,4,30,32),(534,'Learning documents',0,'header',1,4,35,32),(535,'Learning documents',0,'header',1,2,36,32),(536,'Learning documents',0,'header',1,2,37,32),(537,'Learning documents',0,'header',1,4,38,32),(538,'Learning documents',1,'header',1,3,43,32),(539,'Learning documents',0,'header',1,3,44,32),(540,'Learning documents',0,'header',1,3,45,32),(541,'Learning documents',0,'header',1,4,50,32),(542,'Learning documents',0,'header',1,2,51,32),(543,'Learning documents',0,'header',1,1,52,32),(544,'Learning documents',0,'header',1,3,53,32),(545,'Learning documents',0,'header',1,4,58,32),(546,'Learning documents',0,'header',1,3,59,32),(547,'Learning documents',0,'header',1,4,60,32),(548,'Learning documents',0,'header',1,4,65,32),(549,'Learning documents',0,'header',1,3,66,32),(550,'Learning documents',0,'header',1,4,67,32),(551,'Learning documents',0,'header',1,3,72,32),(552,'Learning documents',0,'header',1,3,73,32),(553,'Learning documents',0,'header',1,4,74,32),(554,'Learning documents',0,'header',1,4,75,32),(555,'Learning documents',0,'header',1,4,76,32),(556,'Learning documents',0,'header',1,4,81,32),(557,'Learning documents',0,'header',1,5,82,32),(558,'Learning documents',0,'header',1,3,83,32),(559,'Learning documents',0,'header',1,3,84,32),(560,'Online post-survey (ThaiMOOC)',12,'header',0,1,89,32);
/*!40000 ALTER TABLE `htmls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problems` (
  `problem_id` int(11) NOT NULL AUTO_INCREMENT,
  `problem_name` varchar(255) NOT NULL,
  `problem_type` varchar(255) NOT NULL,
  `indx` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`problem_id`),
  KEY `fk_course` (`course_id`),
  CONSTRAINT `problems_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problems`
--

LOCK TABLES `problems` WRITE;
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
INSERT INTO `problems` VALUES (145,'pretest','Multiple Choice Problem',10,31),(146,'Final week 1 test','Checkbox Problem',15,31),(147,'Final week 2 test','Checkbox Problem',24,31),(148,'Test at the end of week 3','Multiple Choice Problem',31,31),(149,'Final test of week 4','Multiple Choice Problem',39,31),(150,'Test at the end of week 5','Multiple Choice Problem',46,31),(151,'Test at the end of week 6','Multiple Choice Problem',54,31),(152,'Test at the end of week 7','Multiple Choice Problem',61,31),(153,'Test at the end of week 8','Multiple Choice Problem',68,31),(154,'Test at the end of week 9','Checkbox Problem',77,31),(155,'Test at the end of week 10','Multiple Choice Problem',85,31),(156,'Quiz after graduation','Multiple Choice Problem',87,31),(157,'pretest','Multiple Choice Problem',10,32),(158,'Final week 1 test','Checkbox Problem',15,32),(159,'Final week 2 test','Checkbox Problem',24,32),(160,'Test at the end of week 3','Multiple Choice Problem',31,32),(161,'Final test of week 4','Multiple Choice Problem',39,32),(162,'Test at the end of week 5','Multiple Choice Problem',46,32),(163,'Test at the end of week 6','Multiple Choice Problem',54,32),(164,'Test at the end of week 7','Multiple Choice Problem',61,32),(165,'Test at the end of week 8','Multiple Choice Problem',68,32),(166,'Test at the end of week 9','Checkbox Problem',77,32),(167,'Test at the end of week 10','Multiple Choice Problem',85,32),(168,'Quiz after graduation','Multiple Choice Problem',87,32);
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `bio` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (15,'Indy','Datta','idatta.91@gmail.com','$2y$10$E5oWNmDHpYb7nGZrJUaOqOC4akuzsFuOR/SJTWnpYHxkt02/ITpyq','556f391937dfd4398cbac35e050a2177','AIT','Student',1,'Masters in Computer Science'),(16,'Shreeya','Khanal','datta.indrajeet@gmail.com','$2y$10$mr/7npwyylvueifpuEwpfu4KcqvfyiABnZZR9ui8STBB8nzoDobRu','8d6dc35e506fc23349dd10ee68dabb64','AIT','Student',0,'Masters in Information Management'),(17,'Seinn','Lei Lei Tun','indiejesse.d@gmail.com','$2y$10$kvaeM3HaPML9iAkaTNV/d.HLHW0NisYRTidyrk0Qv61.gT6h85LBq','a01a0380ca3c61428c26a231f0e49a09','AIT','Student',0,'Masters in Information Management'),(18,'Jitendra','Prasad','badassfreakshow@gmail.com','$2y$10$HWCfZpq2xnfIVLisWxOike7.Vn3IvamJZywV9q5697qrBjIiF97hu','eeb69a3cb92300456b6a5f4162093851','AIT','Student',1,'Masters in Computer Science');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(255) NOT NULL,
  `video_length` int(11) NOT NULL,
  `indx` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`video_id`),
  KEY `fk_course` (`course_id`),
  CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=813 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (697,'ThaiMOOC project',105,2,31),(698,'Introduce content in week 1',93,9,31),(699,'LaTeX program installation',297,11,31),(700,'Printing marks and symbols in LaTeX',290,13,31),(701,'Document structure arrangement in LaTeX',365,14,31),(702,'Summary of content in week 1',182,16,31),(703,'Introduce content in week 2',77,18,31),(704,'Document structure in LaTeX',372,19,31),(705,'Writing documents by LaTeX',414,20,31),(706,'Font customization',386,21,31),(707,'Creating a roster',460,22,31),(708,'Creating a text box in LaTeX',462,23,31),(709,'Summary of content in week 2',121,25,31),(710,'Introduce content in week 3',59,27,31),(711,'Creating equations using LaTeX',492,28,31),(712,'Using environment math mode',580,29,31),(713,'Important mathematical symbols in LaTeX',390,30,31),(714,'Summary of content in week 3',128,32,31),(715,'Introduce content in week 4',49,34,31),(716,'Creating a simple table',595,35,31),(717,'Creating multiple columns',351,36,31),(718,'Creating multiple rows',233,37,31),(719,'Create a color table',418,38,31),(720,'Summary of content in week 4',129,40,31),(721,'Introduce content in week 5',72,42,31),(722,'Inserting images in LaTeX',591,43,31),(723,'Resizing and rotating images',478,44,31),(724,'Creating color text',394,45,31),(725,'Summary of content in week 5',113,47,31),(726,'Introduce content in week 6',63,49,31),(727,'Creating a resized delimiter',496,50,31),(728,'Vector and matrix creation',302,51,31),(729,'Inserting text in mathematical equations',237,52,31),(730,'Defining new mathematical symbols',382,53,31),(731,'Summary of content in week 6',121,55,31),(732,'Introduce content in week 7',67,57,31),(733,'Creating Thai documents with LaTeX 1',530,58,31),(734,'Creating Thai documents with LaTeX 2',502,59,31),(735,'Creating Thai documents with LaTeX 3',475,60,31),(736,'Summary of content in week 7',155,62,31),(737,'Introduce content in week 8',67,64,31),(738,'Creating a table of contents',521,65,31),(739,'Keyword indexing',478,66,31),(740,'Bibliography',567,67,31),(741,'Summary of content in week 8',139,69,31),(742,'Introduce content in week 9',71,71,31),(743,'Drawing using LaTeX',438,72,31),(744,'Drawing curves by pict2e',273,73,31),(745,'Drawing using PSTricks',451,74,31),(746,'Plotting graphs using PSTricks 1',331,75,31),(747,'Plotting using PSTricks 2',407,76,31),(748,'Summary of content in week 9',125,78,31),(749,'Introduce content in week 10',77,80,31),(750,'Use beamer',565,81,31),(751,'Creating text effects',333,82,31),(752,'environment in beamer',277,83,31),(753,'Configuration in beamer',334,84,31),(754,'Summary of Week 10 Content',151,86,31),(755,'ThaiMOOC project',105,2,32),(756,'Introduce content in week 1',93,9,32),(757,'LaTeX program installation',297,11,32),(758,'Printing marks and symbols in LaTeX',290,13,32),(759,'Document structure arrangement in LaTeX',365,14,32),(760,'Summary of content in week 1',182,16,32),(761,'Introduce content in week 2',77,18,32),(762,'Document structure in LaTeX',372,19,32),(763,'Writing documents by LaTeX',414,20,32),(764,'Font customization',386,21,32),(765,'Creating a roster',460,22,32),(766,'Creating a text box in LaTeX',462,23,32),(767,'Summary of content in week 2',121,25,32),(768,'Introduce content in week 3',59,27,32),(769,'Creating equations using LaTeX',492,28,32),(770,'Using environment math mode',580,29,32),(771,'Important mathematical symbols in LaTeX',390,30,32),(772,'Summary of content in week 3',128,32,32),(773,'Introduce content in week 4',49,34,32),(774,'Creating a simple table',595,35,32),(775,'Creating multiple columns',351,36,32),(776,'Creating multiple rows',233,37,32),(777,'Create a color table',418,38,32),(778,'Summary of content in week 4',129,40,32),(779,'Introduce content in week 5',72,42,32),(780,'Inserting images in LaTeX',591,43,32),(781,'Resizing and rotating images',478,44,32),(782,'Creating color text',394,45,32),(783,'Summary of content in week 5',113,47,32),(784,'Introduce content in week 6',63,49,32),(785,'Creating a resized delimiter',496,50,32),(786,'Vector and matrix creation',302,51,32),(787,'Inserting text in mathematical equations',237,52,32),(788,'Defining new mathematical symbols',382,53,32),(789,'Summary of content in week 6',121,55,32),(790,'Introduce content in week 7',67,57,32),(791,'Creating Thai documents with LaTeX 1',530,58,32),(792,'Creating Thai documents with LaTeX 2',502,59,32),(793,'Creating Thai documents with LaTeX 3',475,60,32),(794,'Summary of content in week 7',155,62,32),(795,'Introduce content in week 8',67,64,32),(796,'Creating a table of contents',521,65,32),(797,'Keyword indexing',478,66,32),(798,'Bibliography',567,67,32),(799,'Summary of content in week 8',139,69,32),(800,'Introduce content in week 9',71,71,32),(801,'Drawing using LaTeX',438,72,32),(802,'Drawing curves by pict2e',273,73,32),(803,'Drawing using PSTricks',451,74,32),(804,'Plotting graphs using PSTricks 1',331,75,32),(805,'Plotting using PSTricks 2',407,76,32),(806,'Summary of content in week 9',125,78,32),(807,'Introduce content in week 10',77,80,32),(808,'Use beamer',565,81,32),(809,'Creating text effects',333,82,32),(810,'environment in beamer',277,83,32),(811,'Configuration in beamer',334,84,32),(812,'Summary of Week 10 Content',151,86,32);
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-21 16:04:47

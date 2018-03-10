-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: adotio
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `animais_adocao`
--

DROP TABLE IF EXISTS `animais_adocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animais_adocao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `idade` int(11) DEFAULT NULL,
  `raca` varchar(255) NOT NULL,
  `porte` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `descricao` text,
  `usuario_id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `situacao` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `animais_adocao_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animais_adocao`
--

LOCK TABLES `animais_adocao` WRITE;
/*!40000 ALTER TABLE `animais_adocao` DISABLE KEYS */;
INSERT INTO `animais_adocao` VALUES (2,'Jorginho',2,'Raça','Pequeno','teste','\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin scelerisque finibus auctor. Suspendisse potenti. Aliquam vehicula lacinia euismod. Nam in convallis purus. Donec orci mi, laoreet at risus eu, pretium aliquam mi. Ut tincidunt eu ligula at faucibus. Maecenas vitae est est. Etiam quis aliquam felis. Suspendisse ullamcorper lectus mauris, eget gravida enim euismod et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\n\nSed ac varius purus. Etiam auctor tristique felis. Quisque eu ornare nisl. Aliquam ex arcu, laoreet vel tellus ut, tempus ornare nibh. Phasellus venenatis purus sit amet volutpat porta. Integer at velit venenatis, sollicitudin nibh eget, fringilla erat. Sed volutpat tortor vel odio malesuada finibus.\n\nNam vel mauris enim. Maecenas nec nisi nec turpis eleifend sagittis in ut leo. Cras vestibulum nibh non sollicitudin lobortis. Quisque blandit facilisis ornare. In ultrices magna et lacus accumsan maximus. Cras blandit tempus turpis id efficitur. Quisque id tincidunt magna. Duis metus tellus, dignissim non condimentum at, iaculis quis nulla.\n\nDuis sagittis ligula ultrices, mattis nisl id, consectetur eros. Pellentesque ac nulla lectus. Suspendisse posuere, ligula vel dignissim venenatis, est magna mollis ex, in laoreet ligula metus a risus. Donec fringilla in purus non feugiat. Curabitur facilisis nisl id tristique scelerisque. Fusce fermentum massa sed finibus interdum. In non lorem non arcu euismod volutpat vel vitae mauris. Nullam vel viverra nulla, id pharetra turpis. Nam vel pharetra est, id rutrum tellus. Pellentesque enim nunc, suscipit nec magna ut, lobortis placerat arcu.\n\nAliquam scelerisque leo ut aliquet viverra. Suspendisse pretium nisi ac condimentum pellentesque. Duis vitae quam ac libero dapibus dignissim. In et ornare risus, eu egestas metus. Maecenas eget justo nec eros porttitor placerat id quis nisi. Donec sapien purus, porttitor at ante nec, aliquam vestibulum nulla. Mauris velit neque, sodales id felis vitae, efficitur consectetur neque. Sed euismod fermentum elementum. Curabitur vitae dolor vel sem blandit posuere ut ut mauris. Fusce eget mi quis quam rhoncus vestibulum sit amet at erat. Vestibulum nec volutpat lectus. Proin volutpat consequat ornare. Proin elementum ornare orci eu aliquet. Nam cursus lacus nec eros condimentum lacinia eget eget enim. Aenean consequat euismod magna sit amet porta. Ut tincidunt feugiat tristique. ',18,'Cachorro',3);
/*!40000 ALTER TABLE `animais_adocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animais_perdidos`
--

DROP TABLE IF EXISTS `animais_perdidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animais_perdidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `idade` int(11) DEFAULT NULL,
  `raca` varchar(255) NOT NULL,
  `porte` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `descricao` text,
  `usuario_id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `situacao` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `animais_perdidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  CONSTRAINT `animais_perdidos_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animais_perdidos`
--

LOCK TABLES `animais_perdidos` WRITE;
/*!40000 ALTER TABLE `animais_perdidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `animais_perdidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_comentario` text NOT NULL,
  `novidade_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `novidade`
--

DROP TABLE IF EXISTS `novidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `novidade` (
  `titulo` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `autor` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_usuario_id` (`usuario_id`),
  CONSTRAINT `fk_id_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `novidade`
--

LOCK TABLES `novidade` WRITE;
/*!40000 ALTER TABLE `novidade` DISABLE KEYS */;
INSERT INTO `novidade` VALUES ('Pra não deixar sem nada ','Lorem ipsum dolor sit amet, facilis explicari adipiscing nam ea, ad volumus platonem nam. Sed at utamur invenire, in detracto salutatus mei, sed te nostro mentitum. Quod diceret oporteat cu cum, eos in vero porro intellegebat, maluisset referrentur vituperatoribus usu ne. Id eam elit ornatus honestatis. Cu mutat nobis conceptam has. Ad vix modo enim argumentum.\r\n\r\nAnimal nostrud offendit nam et, nec altera utroque ei. Ne qui eligendi recusabo dissentiet, cum novum facete splendide te. Sumo aeterno aliquam an eos, eu cum veri nihil mentitum. His probatus deserunt scriptorem at, no nihil doming eos, ridens fuisset maluisset an vis. No eius appellantur eum, sea et alterum torquatos democritum.\r\n\r\nSea no possit theophrastus, sed falli moderatius cu. Pro eu sint vivendo. No nam verear offendit voluptaria, summo tantas ne cum, ea libris imperdiet sit. Duo ad dico nostrum, sed ei reque aeterno. Mei ne putant animal maiorum. Mea diam vero illud ne, odio tibique mel ne.\r\n\r\nMea et aperiam fastidii, pri ne oporteat definiebas. Percipit voluptaria interesset nam in, denique minimum concludaturque vix an. Cum at nisl affert, id fugit cotidieque sed. Ad wisi impedit ius, insolens consequuntur concludaturque eos ad. Ei eam virtute lucilius.\r\n\r\nMei idque tamquam ne, unum singulis sit cu, qui eu legimus utroque maluisset. Ut magna antiopam prodesset eum, mea eu eirmod necessitatibus. Vitae quaestio urbanitas ei vel, quem praesent mea no, his verear vulputate ne. Ius id everti accusam. Eam decore aperiri dissentias te, mei an rationibus consectetuer.',8,18,'Mi Presidento');
/*!40000 ALTER TABLE `novidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `descricao` text,
  `acesso` int(11) DEFAULT '0',
  `titulo_novidade` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (18,'Mi Presidento','henriquenunesti@gmail.com','PE','Jaboatão dos Guararapes','fbi12219','181520141216.jpg','Eu amo tecnologia, principalmente na área de inteligência artificial.',1,''),(19,'dsfsdfsdf','sdgdgdfgdfg@gmail.com','AL','sdfsdfsdf','fbi12219',NULL,NULL,0,''),(20,'Testando123','henrique_nunes09@hotmail.com','CE','São José','fbi12219','201520231207.jpg',NULL,0,'');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-10 10:02:30

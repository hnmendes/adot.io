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
  KEY `animais_adocao_ibfk_1` (`usuario_id`),
  CONSTRAINT `animais_adocao_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animais_adocao`
--

LOCK TABLES `animais_adocao` WRITE;
/*!40000 ALTER TABLE `animais_adocao` DISABLE KEYS */;
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
  `foto` varchar(255) DEFAULT NULL,
  `descricao` text,
  `usuario_id` int(11) NOT NULL,
  `situacao` int(11) DEFAULT '0',
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `animais_perdidos_ibfk_1` (`usuario_id`),
  CONSTRAINT `animais_perdidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  CONSTRAINT `animais_perdidos_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animais_perdidos`
--

LOCK TABLES `animais_perdidos` WRITE;
/*!40000 ALTER TABLE `animais_perdidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `animais_perdidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contato_adocao`
--

DROP TABLE IF EXISTS `contato_adocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato_adocao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `animal_adocao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contato_adocao_ibfk_1` (`animal_adocao_id`),
  CONSTRAINT `contato_adocao_ibfk_1` FOREIGN KEY (`animal_adocao_id`) REFERENCES `animais_adocao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato_adocao`
--

LOCK TABLES `contato_adocao` WRITE;
/*!40000 ALTER TABLE `contato_adocao` DISABLE KEYS */;
/*!40000 ALTER TABLE `contato_adocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contato_perdido`
--

DROP TABLE IF EXISTS `contato_perdido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato_perdido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `rua` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `animal_perdido_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contato_perdido_ibfk_1` (`animal_perdido_id`),
  CONSTRAINT `contato_perdido_ibfk_1` FOREIGN KEY (`animal_perdido_id`) REFERENCES `animais_perdidos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato_perdido`
--

LOCK TABLES `contato_perdido` WRITE;
/*!40000 ALTER TABLE `contato_perdido` DISABLE KEYS */;
/*!40000 ALTER TABLE `contato_perdido` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `novidade`
--

LOCK TABLES `novidade` WRITE;
/*!40000 ALTER TABLE `novidade` DISABLE KEYS */;
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

-- Dump completed on 2018-03-19  2:06:12

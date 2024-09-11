-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: sistema_setencia
-- ------------------------------------------------------
-- Server version	8.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `conflicto`
--

DROP TABLE IF EXISTS `conflicto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conflicto` (
  `idConflicto` int NOT NULL AUTO_INCREMENT,
  `intTConflictoId` varchar(45) DEFAULT NULL,
  `strConflictoId` varchar(45) DEFAULT NULL,
  `strConflicto` varchar(45) DEFAULT NULL,
  `strStatus` varchar(45) DEFAULT NULL,
  `Conflictocol` varchar(45) DEFAULT NULL,
  `dtmFechaAlata` varchar(45) DEFAULT NULL,
  `dtmFechaCambio` varchar(45) DEFAULT NULL,
  `dtmFechaBaja` varchar(45) DEFAULT NULL,
  `blnActivo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idConflicto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conflicto`
--

LOCK TABLES `conflicto` WRITE;
/*!40000 ALTER TABLE `conflicto` DISABLE KEYS */;
/*!40000 ALTER TABLE `conflicto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entidadfederativa`
--

DROP TABLE IF EXISTS `entidadfederativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entidadfederativa` (
  `idEntidadFederativa` int NOT NULL AUTO_INCREMENT,
  `EntidadFederativacol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEntidadFederativa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidadfederativa`
--

LOCK TABLES `entidadfederativa` WRITE;
/*!40000 ALTER TABLE `entidadfederativa` DISABLE KEYS */;
/*!40000 ALTER TABLE `entidadfederativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idresultadojuicio`
--

DROP TABLE IF EXISTS `idresultadojuicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `idresultadojuicio` (
  `ididResultadoJuicio` int NOT NULL AUTO_INCREMENT,
  `ResultadoJuiciocol` varchar(45) NOT NULL,
  `SPRC_Conflicto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ididResultadoJuicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idresultadojuicio`
--

LOCK TABLES `idresultadojuicio` WRITE;
/*!40000 ALTER TABLE `idresultadojuicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `idresultadojuicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juzgado`
--

DROP TABLE IF EXISTS `juzgado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `juzgado` (
  `idjuzgado` int NOT NULL AUTO_INCREMENT,
  `juzgador` varchar(45) NOT NULL,
  PRIMARY KEY (`idjuzgado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juzgado`
--

LOCK TABLES `juzgado` WRITE;
/*!40000 ALTER TABLE `juzgado` DISABLE KEYS */;
/*!40000 ALTER TABLE `juzgado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdfs`
--

DROP TABLE IF EXISTS `pdfs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pdfs` (
  `idpdfs` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`idpdfs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdfs`
--

LOCK TABLES `pdfs` WRITE;
/*!40000 ALTER TABLE `pdfs` DISABLE KEYS */;
/*!40000 ALTER TABLE `pdfs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfiles` (
  `idperfil` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) NOT NULL,
  `fecha_creaciontime` datetime DEFAULT NULL,
  `fecha_cambiotime` datetime DEFAULT NULL,
  `fecha_bajatime` datetime DEFAULT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,'Administrador','2024-09-04 00:00:00',NULL,NULL),(2,'Consultor director (consulta y modifica)','2024-09-04 00:00:00',NULL,NULL),(3,'Consultor simple (solo puede revisar las sentencias)','2024-09-04 00:00:00',NULL,NULL),(4,'Capturador (captura y edición de sus sentencias)','2024-09-04 00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `precio` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'1234567890','jose','rueco',28),(2,'10','perfume','ss',10),(3,'4455','madera','ffff',10);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `idperfil` int NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,'chuy','123','jesus','cisneros','cantero');
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

-- Dump completed on 2024-09-06 11:59:54

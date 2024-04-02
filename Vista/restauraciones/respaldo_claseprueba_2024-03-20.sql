-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: claseprueba
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Current Database: `claseprueba`
--

/*!40000 DROP DATABASE IF EXISTS `claseprueba`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `claseprueba` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `claseprueba`;

--
-- Table structure for table `academia`
--

DROP TABLE IF EXISTS `academia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academia` (
  `idAcademia` int(11) NOT NULL AUTO_INCREMENT,
  `NombreAca` varchar(45) NOT NULL,
  `ClavePro` varchar(45) NOT NULL DEFAULT 'ITI',
  `Periodo` enum('Primavera','Otoño','Invierno') NOT NULL,
  PRIMARY KEY (`idAcademia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academia`
--

LOCK TABLES `academia` WRITE;
/*!40000 ALTER TABLE `academia` DISABLE KEYS */;
INSERT INTO `academia` VALUES (1,'NO APLICA','ITI','Otoño'),(2,'Desarrollo Humano','ITI','Otoño'),(3,'Ciencias básicas','ITI','Primavera'),(4,'Matemáticas','ITI','Invierno'),(5,'Redes','ITI','Otoño');
/*!40000 ALTER TABLE `academia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda` (
  `idAgenda` int(11) NOT NULL AUTO_INCREMENT,
  `FechaAgenda` datetime NOT NULL,
  `idCoordinador` int(11) NOT NULL,
  `idCoordinador2` int(11) NOT NULL,
  `idCoordinador3` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  PRIMARY KEY (`idAgenda`),
  KEY `FK_AgendaCoo` (`idCoordinador`),
  KEY `FK_AgendaPro` (`idProfesor`),
  KEY `FK_AgendaMat` (`idMateria`),
  KEY `FK_AgendaCoo2` (`idCoordinador2`),
  KEY `FK_AgendaCoo3` (`idCoordinador3`),
  CONSTRAINT `FK_AgendaCoo` FOREIGN KEY (`idCoordinador`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_AgendaCoo2` FOREIGN KEY (`idCoordinador2`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `FK_AgendaCoo3` FOREIGN KEY (`idCoordinador3`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `FK_AgendaMat` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_AgendaPro` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (12,'2024-03-21 08:00:00',13,14,15,12,6),(14,'2024-03-15 14:08:00',13,14,15,11,4),(15,'2024-03-30 14:11:00',13,14,15,24,5);
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datoscontrato`
--

DROP TABLE IF EXISTS `datoscontrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datoscontrato` (
  `idDatosContrato` int(11) NOT NULL AUTO_INCREMENT,
  `CV` varchar(45) NOT NULL,
  `Identificacion` varchar(45) NOT NULL,
  `CompDomicilio` varchar(45) NOT NULL,
  `TituloAcad` varchar(45) NOT NULL,
  `Cedula` varchar(45) NOT NULL,
  `ActaNaci` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idDatosContrato`),
  KEY `FK_Guia_idx` (`idUsuario`),
  CONSTRAINT `FK_UsuarioDocs` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datoscontrato`
--

LOCK TABLES `datoscontrato` WRITE;
/*!40000 ALTER TABLE `datoscontrato` DISABLE KEYS */;
INSERT INTO `datoscontrato` VALUES (5,'CV.pdf','INE.pdf','CompDomicilio.pdf','Titulo.pdf','cedula.pdf','actaNacimiento.pdf',11),(6,'CV Adolfo Pinzón Salazar.pdf','INE.pdf','CompDomicilio.pdf','Titulo.pdf','cedula.pdf','actaNacimiento.pdf',12);
/*!40000 ALTER TABLE `datoscontrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta`
--

DROP TABLE IF EXISTS `encuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta` (
  `idEncuesta` int(11) NOT NULL AUTO_INCREMENT,
  `Pregunta` text NOT NULL,
  PRIMARY KEY (`idEncuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta`
--

LOCK TABLES `encuesta` WRITE;
/*!40000 ALTER TABLE `encuesta` DISABLE KEYS */;
INSERT INTO `encuesta` VALUES (1,'¿Qué opinas del nuevo sistema?'),(4,'¿La plataforma cumple con su expectativa?'),(5,'¿Cree que el tiempo de respuesta es el optimo?'),(6,'¿Cuál fue su experiencia en la clase?');
/*!40000 ALTER TABLE `encuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guiaaplicacion`
--

DROP TABLE IF EXISTS `guiaaplicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guiaaplicacion` (
  `idGuiaAplicacion` int(11) NOT NULL AUTO_INCREMENT,
  `Tema` varchar(45) NOT NULL,
  `FechaApli` date NOT NULL,
  `Puntaje` double NOT NULL,
  `TotalPuntaje` double NOT NULL,
  `Observacion` text NOT NULL,
  `ObservacionGeneral` text NOT NULL,
  `Estatus` enum('Contratado','No Contratado') NOT NULL,
  `idCoordinador` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idGuiaObservacion` int(11) NOT NULL,
  PRIMARY KEY (`idGuiaAplicacion`),
  KEY `FK_Coordinador_idx` (`idCoordinador`),
  KEY `FK_Profesor_idx` (`idProfesor`),
  KEY `FK_Materia_idx` (`idMateria`),
  KEY `FK_Rubro_idx` (`idGuiaObservacion`),
  CONSTRAINT `FK_Coordinador` FOREIGN KEY (`idCoordinador`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Materia` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Profesor` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Rubro` FOREIGN KEY (`idGuiaObservacion`) REFERENCES `guiaobservacion` (`idGuiaObservacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=870 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guiaaplicacion`
--

LOCK TABLES `guiaaplicacion` WRITE;
/*!40000 ALTER TABLE `guiaaplicacion` DISABLE KEYS */;
INSERT INTO `guiaaplicacion` VALUES (744,'Internet de las cosas','2024-03-15',5,100,'Bien','Muy bien','Contratado',13,11,4,5),(745,'Internet de las cosas','2024-03-15',5,100,'Bien','Muy bien','Contratado',13,11,4,23),(746,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Muy bien','Contratado',13,11,4,24),(747,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Muy bien','Contratado',13,11,4,25),(748,'Internet de las cosas','2024-03-15',5,100,'Bien','Muy bien','Contratado',13,11,4,26),(749,'Internet de las cosas','2024-03-15',5,100,'Bien','Muy bien','Contratado',13,11,4,27),(750,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Muy bien','Contratado',13,11,4,28),(751,'Internet de las cosas','2024-03-15',5,100,'Bien','Muy bien','Contratado',13,11,4,35),(752,'Internet de las cosas','2024-03-15',5,100,'Bien','Muy bien','Contratado',13,11,4,36),(753,'Internet de las cosas','2024-03-15',5,100,'Bien','Muy bien','Contratado',13,11,4,37),(754,'Internet de las cosas','2024-03-15',5,100,'Bien','Muy bien','Contratado',13,11,4,38),(755,'Internet de las cosas','2024-03-15',5,100,'Bien','Muy bien','Contratado',13,11,4,39),(756,'Internet de las cosas','2024-03-15',10,100,'Bien','Muy bien','Contratado',13,11,4,40),(757,'Internet de las cosas','2024-03-15',10,100,'Bien','Muy bien','Contratado',13,11,4,41),(758,'Internet de las cosas','2024-03-15',10,100,'Bien','Muy bien','Contratado',13,11,4,42),(759,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Muy bien','Contratado',13,11,4,43),(760,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Muy bien','Contratado',13,11,4,44),(761,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Muy bien','Contratado',13,11,4,45),(762,'Internet de las cosas','2024-03-15',5,100,'Bien','Muy bien','Contratado',13,11,4,46),(763,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Muy bien','Contratado',13,11,4,47),(764,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Muy bien','Contratado',13,11,4,48),(765,'Internet de las cosas','2024-03-15',5,90,'Bien','Muy bien','Contratado',14,11,4,5),(766,'Internet de las cosas','2024-03-15',5,90,'Bien','Muy bien','Contratado',14,11,4,23),(767,'Internet de las cosas','2024-03-15',2.5,90,'Bien','Muy bien','Contratado',14,11,4,24),(768,'Internet de las cosas','2024-03-15',2.5,90,'Bien','Muy bien','Contratado',14,11,4,25),(769,'Internet de las cosas','2024-03-15',5,90,'Bien','Muy bien','Contratado',14,11,4,26),(770,'Internet de las cosas','2024-03-15',5,90,'Bien','Muy bien','Contratado',14,11,4,27),(771,'Internet de las cosas','2024-03-15',2.5,90,'Bien','Muy bien','Contratado',14,11,4,28),(772,'Internet de las cosas','2024-03-15',5,90,'Bien','Muy bien','Contratado',14,11,4,35),(773,'Internet de las cosas','2024-03-15',5,90,'Bien','Muy bien','Contratado',14,11,4,36),(774,'Internet de las cosas','2024-03-15',5,90,'Bien','Muy bien','Contratado',14,11,4,37),(775,'Internet de las cosas','2024-03-15',5,90,'Bien','Muy bien','Contratado',14,11,4,38),(776,'Internet de las cosas','2024-03-15',5,90,'Bien','Muy bien','Contratado',14,11,4,39),(777,'Internet de las cosas','2024-03-15',10,90,'Bien','Muy bien','Contratado',14,11,4,40),(778,'Internet de las cosas','2024-03-15',10,90,'Bien','Muy bien','Contratado',14,11,4,41),(779,'Internet de las cosas','2024-03-15',10,90,'Bien','Muy bien','Contratado',14,11,4,42),(780,'Internet de las cosas','2024-03-15',2.5,90,'Bien','Muy bien','Contratado',14,11,4,43),(781,'Internet de las cosas','2024-03-15',2.5,90,'Bien','Muy bien','Contratado',14,11,4,44),(782,'Internet de las cosas','2024-03-15',2.5,90,'Bien','Muy bien','Contratado',14,11,4,45),(783,'Internet de las cosas','2024-03-15',5,90,'Bien','Muy bien','Contratado',14,11,4,46),(784,'Internet de las cosas','2024-03-15',2.5,90,'Bien','Muy bien','Contratado',14,11,4,47),(785,'Internet de las cosas','2024-03-15',2.5,90,'Bien','Muy bien','Contratado',14,11,4,48),(786,'Internet de las cosas','2024-03-15',5,100,'Bien','Excelente','Contratado',15,11,4,5),(787,'Internet de las cosas','2024-03-15',5,100,'Bien','Excelente','Contratado',15,11,4,23),(788,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Excelente','Contratado',15,11,4,24),(789,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Excelente','Contratado',15,11,4,25),(790,'Internet de las cosas','2024-03-15',5,100,'Bien','Excelente','Contratado',15,11,4,26),(791,'Internet de las cosas','2024-03-15',5,100,'Bien','Excelente','Contratado',15,11,4,27),(792,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Excelente','Contratado',15,11,4,28),(793,'Internet de las cosas','2024-03-15',5,100,'Bien','Excelente','Contratado',15,11,4,35),(794,'Internet de las cosas','2024-03-15',5,100,'Bien','Excelente','Contratado',15,11,4,36),(795,'Internet de las cosas','2024-03-15',5,100,'Bien','Excelente','Contratado',15,11,4,37),(796,'Internet de las cosas','2024-03-15',5,100,'Bien','Excelente','Contratado',15,11,4,38),(797,'Internet de las cosas','2024-03-15',5,100,'Bien','Excelente','Contratado',15,11,4,39),(798,'Internet de las cosas','2024-03-15',10,100,'Bien','Excelente','Contratado',15,11,4,40),(799,'Internet de las cosas','2024-03-15',10,100,'Bien','Excelente','Contratado',15,11,4,41),(800,'Internet de las cosas','2024-03-15',10,100,'Bien','Excelente','Contratado',15,11,4,42),(801,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Excelente','Contratado',15,11,4,43),(802,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Excelente','Contratado',15,11,4,44),(803,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Excelente','Contratado',15,11,4,45),(804,'Internet de las cosas','2024-03-15',5,100,'Bien','Excelente','Contratado',15,11,4,46),(805,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Excelente','Contratado',15,11,4,47),(806,'Internet de las cosas','2024-03-15',2.5,100,'Bien','Excelente','Contratado',15,11,4,48),(807,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',13,12,6,5),(808,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',13,12,6,23),(809,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',13,12,6,24),(810,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',13,12,6,25),(811,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',13,12,6,26),(812,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',13,12,6,27),(813,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',13,12,6,28),(814,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',13,12,6,35),(815,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',13,12,6,36),(816,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',13,12,6,37),(817,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',13,12,6,38),(818,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',13,12,6,39),(819,'Programación del lado del servidor','2024-03-21',10,100,'Bien','Excelente','Contratado',13,12,6,40),(820,'Programación del lado del servidor','2024-03-21',10,100,'Bien','Excelente','Contratado',13,12,6,41),(821,'Programación del lado del servidor','2024-03-21',10,100,'Bien','Excelente','Contratado',13,12,6,42),(822,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',13,12,6,43),(823,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',13,12,6,44),(824,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',13,12,6,45),(825,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',13,12,6,46),(826,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',13,12,6,47),(827,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',13,12,6,48),(828,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',15,12,6,5),(829,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',15,12,6,23),(830,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',15,12,6,24),(831,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',15,12,6,25),(832,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',15,12,6,26),(833,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',15,12,6,27),(834,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',15,12,6,28),(835,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',15,12,6,35),(836,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',15,12,6,36),(837,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',15,12,6,37),(838,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',15,12,6,38),(839,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',15,12,6,39),(840,'Programación del lado del servidor','2024-03-21',10,100,'Bien','Excelente','Contratado',15,12,6,40),(841,'Programación del lado del servidor','2024-03-21',10,100,'Bien','Excelente','Contratado',15,12,6,41),(842,'Programación del lado del servidor','2024-03-21',10,100,'Bien','Excelente','Contratado',15,12,6,42),(843,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',15,12,6,43),(844,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',15,12,6,44),(845,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',15,12,6,45),(846,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',15,12,6,46),(847,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',15,12,6,47),(848,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',15,12,6,48),(849,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',14,12,6,5),(850,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',14,12,6,23),(851,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',14,12,6,24),(852,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',14,12,6,25),(853,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',14,12,6,26),(854,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',14,12,6,27),(855,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',14,12,6,28),(856,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',14,12,6,35),(857,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',14,12,6,36),(858,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',14,12,6,37),(859,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',14,12,6,38),(860,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',14,12,6,39),(861,'Programación del lado del servidor','2024-03-21',10,100,'Bien','Excelente','Contratado',14,12,6,40),(862,'Programación del lado del servidor','2024-03-21',10,100,'Bien','Excelente','Contratado',14,12,6,41),(863,'Programación del lado del servidor','2024-03-21',10,100,'Bien','Excelente','Contratado',14,12,6,42),(864,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',14,12,6,43),(865,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',14,12,6,44),(866,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',14,12,6,45),(867,'Programación del lado del servidor','2024-03-21',5,100,'Bien','Excelente','Contratado',14,12,6,46),(868,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',14,12,6,47),(869,'Programación del lado del servidor','2024-03-21',2.5,100,'Bien','Excelente','Contratado',14,12,6,48);
/*!40000 ALTER TABLE `guiaaplicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guiaobservacion`
--

DROP TABLE IF EXISTS `guiaobservacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guiaobservacion` (
  `idGuiaObservacion` int(11) NOT NULL AUTO_INCREMENT,
  `Rubro` text NOT NULL,
  `Porcentaje` double NOT NULL,
  `FechaGuia` date NOT NULL,
  `TipoRubro` enum('Apertura y cierre','Participación','Técnica','Desempeño') NOT NULL,
  PRIMARY KEY (`idGuiaObservacion`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guiaobservacion`
--

LOCK TABLES `guiaobservacion` WRITE;
/*!40000 ALTER TABLE `guiaobservacion` DISABLE KEYS */;
INSERT INTO `guiaobservacion` VALUES (5,'Presenta el objetivo del tema.',5,'2023-09-23','Apertura y cierre'),(23,'Ubica el tema dentro del módulo y muestra las relaciones que existen con otros temas y/o materias',5,'2023-11-16','Apertura y cierre'),(24,'Explica los beneficios y/o aplicaciones en donde tiene impacto el tema',2.5,'2023-11-16','Apertura y cierre'),(25,'Utiliza el equipo didáctico de manera adecuada ',2.5,'2023-11-16','Apertura y cierre'),(26,'Realiza el cierre del tema o clase resumiendo y mencionando los logros alcanzados',5,'2023-11-16','Apertura y cierre'),(27,'Sugiere acciones para reafirmar el aprendizaje',5,'2023-11-16','Apertura y cierre'),(28,'Proporciona una breve introducción al siguiente tema',2.5,'2023-11-16','Apertura y cierre'),(35,'Realiza una exploración de conocimientos previos',5,'2023-11-16','Participación'),(36,'Verifica la compresión de contenidos',5,'2023-11-16','Participación'),(37,'Comparte su experiencia concentrándose en el tema',5,'2023-11-16','Participación'),(38,'Responde las preguntas enfocando sus comentarios en el tema',5,'2023-11-16','Participación'),(39,'Transmite sus ideas de forma clara y concreta',5,'2023-11-16','Participación'),(40,'Expositiva. No se limita a una simple lectura de contenidos',10,'2023-11-16','Técnica'),(41,'Demostrativa',10,'2023-11-16','Técnica'),(42,'Proporciona ejemplos y/o ejercicios',10,'2023-11-16','Técnica'),(43,'Se adecua al tipo de grupo, generando un ambiente adecuado para el aprendizaje',2.5,'2023-11-16','Técnica'),(44,'La estructura de la clase fue adecuada ',2.5,'2023-11-16','Desempeño'),(45,'Contacto visual con todo el grupo',2.5,'2023-11-16','Desempeño'),(46,'Mantiene una postura dinámica en el aula',5,'2023-11-16','Desempeño'),(47,'Nivel de voz adecuado y cambios en el volumen de voz',2.5,'2023-11-16','Desempeño'),(48,'Capacidad de adaptación a imprevistos',2.5,'2023-11-16','Desempeño');
/*!40000 ALTER TABLE `guiaobservacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `idMateria` int(11) NOT NULL AUTO_INCREMENT,
  `Clave` varchar(45) NOT NULL,
  `NombreM` varchar(45) NOT NULL,
  `TipoCurso` varchar(45) NOT NULL,
  `Eje` varchar(45) NOT NULL,
  `HorasTotal` double NOT NULL,
  `Nivel` enum('Introductorio','Medio','Avanzado') NOT NULL,
  `Cuatrimestre` int(11) NOT NULL,
  `EstatusM` enum('Activo','Inactivo') NOT NULL,
  `idAcademia` int(11) NOT NULL,
  PRIMARY KEY (`idMateria`),
  KEY `FK_AcaMat_idx` (`idAcademia`),
  CONSTRAINT `FK_AcaMat` FOREIGN KEY (`idAcademia`) REFERENCES `academia` (`idAcademia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (4,'ITI-1-O','Internet de las cosas','Obligatorio','Ciencias básicas',50,'Introductorio',1,'Activo',3),(5,'ITI-2-I','POO','Obligatorio','Ciencias de la ingeniería',60,'Avanzado',5,'Activo',5),(6,'ITI-6-P','Programación web','Obligatorio','Ciencias de la ingeniería',40,'Medio',7,'Activo',4);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta` (
  `idRespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `Respuesta` enum('Muy malo','Malo','Regular','Bueno','Excelente') NOT NULL,
  `idEncuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idRespuesta`),
  KEY `FK_idEncuesta_idx` (`idEncuesta`),
  KEY `FK_UsuarioEncuesta` (`idUsuario`),
  CONSTRAINT `FK_UsuarioEncuesta` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_idEncuesta` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
INSERT INTO `respuesta` VALUES (17,'Bueno',1,11),(18,'Regular',4,11),(19,'Excelente',5,11),(20,'Bueno',6,11),(21,'Bueno',1,12),(22,'Excelente',4,12),(23,'Bueno',5,12),(24,'Excelente',6,12);
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `ApellidoP` varchar(45) NOT NULL,
  `ApellidoM` varchar(45) DEFAULT NULL,
  `FechaNac` date NOT NULL,
  `GradoA` enum('Licenciatura','Maestría','Doctorado') NOT NULL,
  `ProgramaE` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Contrasena` varchar(100) NOT NULL,
  `Firma` varchar(100) DEFAULT NULL,
  `Cargo` enum('Profesor de Tiempo Completo','Profesor','NO APLICA') DEFAULT NULL,
  `TipoUsuario` enum('Administrador','Coordinador','Profesor') NOT NULL,
  `fotoperfil` text NOT NULL DEFAULT 'perfil.png',
  `idAcademia` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `FK_Academia_idx` (`idAcademia`),
  CONSTRAINT `FK_Academia` FOREIGN KEY (`idAcademia`) REFERENCES `academia` (`idAcademia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (10,'Alberto','Gutiérrez','Sevilla','2000-05-30','Doctorado','ITI','betowsky30@gmail.com','8969b5f82cd20bbd75950207ecef463c','','NO APLICA','Administrador','perfil.png',1),(11,'José Luis','Mendez','','1993-12-23','Maestría','ITI','jose@gmail.com','8969b5f82cd20bbd75950207ecef463c','firma1.png','NO APLICA','Profesor','gestionAcademia.jpg',1),(12,'Lourdes','Hernández','','1995-12-14','Doctorado','ITI','lulu@gmail.com','8969b5f82cd20bbd75950207ecef463c','firma2.png','NO APLICA','Profesor','perfil.png',1),(13,'Sandra ','León','Sosa','1995-07-19','Doctorado','ITI','lsosa@gmail.com','8969b5f82cd20bbd75950207ecef463c','firma3.png','Profesor de Tiempo Completo','Coordinador','perfil.png',3),(14,'Miguel Ángel','Ruiz','Jaimes','1993-12-17','Doctorado','ITI','ruiz@gmail.com','8969b5f82cd20bbd75950207ecef463c','firma4.png','Profesor de Tiempo Completo','Coordinador','perfil.png',5),(15,'José','Zagal','','1997-05-06','Licenciatura','ITI','zagal@gmail.com','8969b5f82cd20bbd75950207ecef463c','firma5.png','Profesor','Coordinador','perfil.png',2),(24,'Pedro ','García','López','2024-03-19','Doctorado','ITI','pedro@gmail.com','8969b5f82cd20bbd75950207ecef463c','Nitro_Wallpaper_03_3840x2400.jpg','NO APLICA','Profesor','perfil.png',1);
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

-- Dump completed on 2024-03-20  1:49:25

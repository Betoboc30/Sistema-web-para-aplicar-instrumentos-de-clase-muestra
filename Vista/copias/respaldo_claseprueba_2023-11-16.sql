-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: claseprueba
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
INSERT INTO `academia` VALUES (1,'NO APLICA','ITI','Otoño'),(2,'Desarrollo Humano','ITI','Otoño'),(3,'Ciencias básicas','ITI','Primavera'),(4,'Matemáticas','ITI','Invierno'),(5,'Redes','ITI','Primavera');
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
  `idProfesor` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  PRIMARY KEY (`idAgenda`),
  KEY `FK_AgendaCoo` (`idCoordinador`),
  KEY `FK_AgendaPro` (`idProfesor`),
  KEY `FK_AgendaMat` (`idMateria`),
  CONSTRAINT `FK_AgendaCoo` FOREIGN KEY (`idCoordinador`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_AgendaMat` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_AgendaPro` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (2,'2023-11-23 10:00:00',8,9,3),(3,'2023-11-02 11:00:00',8,8,1),(4,'2023-10-31 12:00:00',8,3,1),(5,'2023-10-31 13:00:00',8,2,3),(7,'2023-10-31 13:00:00',8,2,3);
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
  `AreasOportunidad` varchar(45) DEFAULT NULL,
  `idGuiaObservacion` int(11) NOT NULL,
  PRIMARY KEY (`idDatosContrato`),
  KEY `FK_Guia_idx` (`idGuiaObservacion`),
  CONSTRAINT `FK_Guia` FOREIGN KEY (`idGuiaObservacion`) REFERENCES `guiaaplicacion` (`idGuiaAplicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datoscontrato`
--

LOCK TABLES `datoscontrato` WRITE;
/*!40000 ALTER TABLE `datoscontrato` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta`
--

LOCK TABLES `encuesta` WRITE;
/*!40000 ALTER TABLE `encuesta` DISABLE KEYS */;
INSERT INTO `encuesta` VALUES (1,'¿Qué opinas del nuevo sistema?');
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
  `ObservacionGeneral` text NOT NULL,
  `Estatus` enum('Contratado','No Contratado') NOT NULL,
  `idCoordinador` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idGuiaObservacion` int(11) NOT NULL,
  `idEncuesta` int(11) NOT NULL,
  PRIMARY KEY (`idGuiaAplicacion`),
  KEY `FK_Coordinador_idx` (`idCoordinador`),
  KEY `FK_Profesor_idx` (`idProfesor`),
  KEY `FK_Materia_idx` (`idMateria`),
  KEY `FK_Rubro_idx` (`idGuiaObservacion`),
  KEY `FK_Encuesta_idx` (`idEncuesta`),
  CONSTRAINT `FK_Coordinador` FOREIGN KEY (`idCoordinador`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Encuesta` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Materia` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Profesor` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Rubro` FOREIGN KEY (`idGuiaObservacion`) REFERENCES `guiaobservacion` (`idGuiaObservacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guiaaplicacion`
--

LOCK TABLES `guiaaplicacion` WRITE;
/*!40000 ALTER TABLE `guiaaplicacion` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (1,'INP-ES','Introducción a la programación','Obligatorio','Ingeniería aplicada',2,'Introductorio',2,'Activo',2),(3,'Red','Redes','Obtativo','Sociales y humanidades',5,'Medio',10,'Inactivo',5);
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
  `Respuesta` text NOT NULL,
  `idEncuesta` int(11) NOT NULL,
  PRIMARY KEY (`idRespuesta`),
  KEY `FK_idEncuesta_idx` (`idEncuesta`),
  CONSTRAINT `FK_idEncuesta` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,'Alberto','Gutiérrez','Sevilla','1996-06-27','Doctorado','ITI','alberto15@gmail.com','123','2.png','Profesor de Tiempo Completo','Administrador','perfil.png',3),(3,'Daniela','Martinez','Giles','2000-05-30','Doctorado','ITI','danilot@gmail.com','123','2.png','NO APLICA','Profesor','perfil.png',1),(8,'Dulce','Hernández','Juarez','1998-07-22','Maestría','ITI','dulceh@gmail.com','123','firma.png','Profesor','Coordinador','perfil.png',5),(9,'Rosa','Juarez','xd','2023-10-02','Licenciatura','ITI','rosaJuarez@gmail.com','123','xd','Profesor de Tiempo Completo','Profesor','perfil.png',3);
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

-- Dump completed on 2023-11-16  1:34:08

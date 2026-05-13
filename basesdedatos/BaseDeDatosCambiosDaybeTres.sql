CREATE DATABASE  IF NOT EXISTS `prabasededatos` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `prabasededatos`;
-- MySQL dump 10.13  Distrib 8.0.45, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: prabasededatos
-- ------------------------------------------------------
-- Server version	8.0.45

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
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_dueno` int NOT NULL,
  `id_raza` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `colores` varchar(50) DEFAULT NULL,
  `sexo` enum('F','M','D') DEFAULT NULL,
  `esterilizado` tinyint(1) DEFAULT '0',
  `carnet_de_vacunacion` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_animal_dueno` (`id_dueno`),
  KEY `fk_animal_raza` (`id_raza`),
  CONSTRAINT `fk_animal_dueno` FOREIGN KEY (`id_dueno`) REFERENCES `duenos` (`id`),
  CONSTRAINT `fk_animal_raza` FOREIGN KEY (`id_raza`) REFERENCES `razas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direccion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_lugar` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `latitud` decimal(10,8) DEFAULT NULL,
  `longitud` decimal(11,8) DEFAULT NULL,
  `place_id` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duenos`
--

DROP TABLE IF EXISTS `duenos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `duenos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `curp` varchar(18) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `clave_catastral` varchar(20) DEFAULT NULL,
  `id_direccion` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `curp` (`curp`),
  KEY `fk_dueno_direccion` (`id_direccion`),
  CONSTRAINT `fk_dueno_direccion` FOREIGN KEY (`id_direccion`) REFERENCES `direccion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duenos`
--

LOCK TABLES `duenos` WRITE;
/*!40000 ALTER TABLE `duenos` DISABLE KEYS */;
/*!40000 ALTER TABLE `duenos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especies`
--

DROP TABLE IF EXISTS `especies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_especie` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_especie` (`nombre_especie`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especies`
--

LOCK TABLES `especies` WRITE;
/*!40000 ALTER TABLE `especies` DISABLE KEYS */;
INSERT INTO `especies` VALUES (1,'Canino','2026-05-13 18:30:09',1),(2,'Felino','2026-05-13 18:30:09',1),(3,'Ave','2026-05-13 18:30:09',1),(4,'Reptil','2026-05-13 18:30:09',1),(5,'Roedor','2026-05-13 18:30:09',1),(6,'Granja','2026-05-13 18:30:09',1),(7,'Peces','2026-05-13 18:30:09',1);
/*!40000 ALTER TABLE `especies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `razas`
--

DROP TABLE IF EXISTS `razas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `razas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_especie` int NOT NULL,
  `nombre_raza` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_raza_especie` (`id_especie`),
  CONSTRAINT `fk_raza_especie` FOREIGN KEY (`id_especie`) REFERENCES `especies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=363 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `razas`
--

LOCK TABLES `razas` WRITE;
/*!40000 ALTER TABLE `razas` DISABLE KEYS */;
INSERT INTO `razas` VALUES (1,1,'Affenpinscher','2026-05-13 21:17:00',1),(2,1,'Afgano','2026-05-13 21:17:00',1),(3,1,'Akita japonés','2026-05-13 21:17:00',1),(4,1,'American Staffordshire Terrier','2026-05-13 21:17:00',1),(5,1,'Australian Terrier','2026-05-13 21:17:00',1),(6,1,'Basenji','2026-05-13 21:17:00',1),(7,1,'Basset Azul de Gascuña','2026-05-13 21:17:00',1),(8,1,'Basset Grifón vandeano (pequeño)','2026-05-13 21:17:00',1),(9,1,'Basset Hound','2026-05-13 21:17:00',1),(10,1,'Basset leonado de Bretaña','2026-05-13 21:17:00',1),(11,1,'Beagle','2026-05-13 21:17:00',1),(12,1,'Beauceron','2026-05-13 21:17:00',1),(13,1,'Bedlington Terrier','2026-05-13 21:17:00',1),(14,1,'Bergamasco','2026-05-13 21:17:00',1),(15,1,'Bichón Boloñés','2026-05-13 21:17:00',1),(16,1,'Bichón frisé','2026-05-13 21:17:00',1),(17,1,'Bichón Matlés','2026-05-13 21:17:00',1),(18,1,'Bloodhound','2026-05-13 21:17:00',1),(19,1,'Bodeguero Andaluz','2026-05-13 21:17:00',1),(20,1,'Border collie','2026-05-13 21:17:00',1),(21,1,'Border terrier','2026-05-13 21:17:00',1),(22,1,'Boston Terrier','2026-05-13 21:17:00',1),(23,1,'Bóxer','2026-05-13 21:17:00',1),(24,1,'Boyero de Berna','2026-05-13 21:17:00',1),(25,1,'Boyero de Flandes','2026-05-13 21:17:00',1),(26,1,'Bracco italiano','2026-05-13 21:17:00',1),(27,1,'Braco alemán de pelo corto','2026-05-13 21:17:00',1),(28,1,'Braco alemán de pelo duro','2026-05-13 21:17:00',1),(29,1,'Braco de Weimar (de pelo corto y suave)','2026-05-13 21:17:00',1),(30,1,'Braco húngaro','2026-05-13 21:17:00',1),(31,1,'Braco húngaro de pelo duro','2026-05-13 21:17:00',1),(32,1,'Bretón','2026-05-13 21:17:00',1),(33,1,'Buhund noruego','2026-05-13 21:17:00',1),(34,1,'Bull Terrier miniatura','2026-05-13 21:17:00',1),(35,1,'Bulldog','2026-05-13 21:17:00',1),(36,1,'Bulldog francés','2026-05-13 21:17:00',1),(37,1,'Bullmastiff','2026-05-13 21:17:00',1),(38,1,'Cairn Terrier','2026-05-13 21:17:00',1),(39,1,'Caniche enano','2026-05-13 21:17:00',1),(40,1,'Caniche grande','2026-05-13 21:17:00',1),(41,1,'Caniche toy','2026-05-13 21:17:00',1),(42,1,'Carlino','2026-05-13 21:17:00',1),(43,1,'Cavalier King Charles Spaniel','2026-05-13 21:17:00',1),(44,1,'Chihuahua (de pelo largo)','2026-05-13 21:17:00',1),(45,1,'Chihuahua (de pelo suave)','2026-05-13 21:17:00',1),(46,1,'Chin japonés','2026-05-13 21:17:00',1),(47,1,'Chow Chow (de pelo suave)','2026-05-13 21:17:00',1),(48,1,'Clumber Spaniel','2026-05-13 21:17:00',1),(49,1,'Cobrador de Nueva Escocia','2026-05-13 21:17:00',1),(50,1,'Cockapoo','2026-05-13 21:17:00',1),(51,1,'Cocker spaniel','2026-05-13 21:17:00',1),(52,1,'Cocker Spaniel americano','2026-05-13 21:17:00',1),(53,1,'Collie barbudo','2026-05-13 21:17:00',1),(54,1,'Collie de pelo corto','2026-05-13 21:17:00',1),(55,1,'Corgi galés de Cardigan (de pelo medio/largo)','2026-05-13 21:17:00',1),(56,1,'Corgi galés de Pembroke','2026-05-13 21:17:00',1),(57,1,'Cotón de Tulear','2026-05-13 21:17:00',1),(58,1,'Crestado chino','2026-05-13 21:17:00',1),(59,1,'Crestado rodesiano (rhodesian ridgeback)','2026-05-13 21:17:00',1),(60,1,'Dálmata','2026-05-13 21:17:00',1),(61,1,'Dandie Dinmont Terrier','2026-05-13 21:17:00',1),(62,1,'Dóberman','2026-05-13 21:17:00',1),(63,1,'Dogo Argentino','2026-05-13 21:17:00',1),(64,1,'Dogo de Burdeos','2026-05-13 21:17:00',1),(65,1,'Field Spaniel','2026-05-13 21:17:00',1),(66,1,'Fox Terrier de pelo duro','2026-05-13 21:17:00',1),(67,1,'Fox Terrier de pelo liso','2026-05-13 21:17:00',1),(68,1,'Foxhound','2026-05-13 21:17:00',1),(69,1,'Galgo','2026-05-13 21:17:00',1),(70,1,'Galgo italiano','2026-05-13 21:17:00',1),(71,1,'Golden retriever','2026-05-13 21:17:00',1),(72,1,'Gran azul de Gascuña','2026-05-13 21:17:00',1),(73,1,'Grifón de Bruselas (pelaje corto y áspero)','2026-05-13 21:17:00',1),(74,1,'Grifón perro o Basset grifón vandeano (grande)','2026-05-13 21:17:00',1),(75,1,'Habanero','2026-05-13 21:17:00',1),(76,1,'Hamilton Stovare','2026-05-13 21:17:00',1),(77,1,'Hovawart','2026-05-13 21:17:00',1),(78,1,'Husky siberiano','2026-05-13 21:17:00',1),(79,1,'Keeshond','2026-05-13 21:17:00',1),(80,1,'Kerry blue Terrier','2026-05-13 21:17:00',1),(81,1,'King Charles Spaniel','2026-05-13 21:17:00',1),(82,1,'Komondor','2026-05-13 21:17:00',1),(83,1,'Kuvasz húngaro','2026-05-13 21:17:00',1),(84,1,'Labradoodle','2026-05-13 21:17:00',1),(85,1,'Labrador retriever','2026-05-13 21:17:00',1),(86,1,'Laekenois','2026-05-13 21:17:00',1),(87,1,'Lakeland Terrier','2026-05-13 21:17:00',1),(88,1,'Lancashire Heeler','2026-05-13 21:17:00',1),(89,1,'Lebrel escocés','2026-05-13 21:17:00',1),(90,1,'Lhasa Apso','2026-05-13 21:17:00',1),(91,1,'Lobero irlandés','2026-05-13 21:17:00',1),(92,1,'Lowchen (pequeño perro león)','2026-05-13 21:17:00',1),(93,1,'Malamute de Alaska','2026-05-13 21:17:00',1),(94,1,'Manchester Terrier','2026-05-13 21:17:00',1),(95,1,'Mastín Español','2026-05-13 21:17:00',1),(96,1,'Mastín inglés o mastiff','2026-05-13 21:17:00',1),(97,1,'Mastín napolitano','2026-05-13 21:17:00',1),(98,1,'Mastín tibetano','2026-05-13 21:17:00',1),(99,1,'Munsterlander (grande)','2026-05-13 21:17:00',1),(100,1,'Otterhound','2026-05-13 21:17:00',1),(101,1,'Pachón Navarro','2026-05-13 21:17:00',1),(102,1,'Papillón','2026-05-13 21:17:00',1),(103,1,'Parson jack russell terrier (de pelo corto/suave)','2026-05-13 21:17:00',1),(104,1,'Pastor Australiano','2026-05-13 21:17:00',1),(105,1,'Pastor belga Groenendael','2026-05-13 21:17:00',1),(106,1,'Pastor belga Tervueren','2026-05-13 21:17:00',1),(107,1,'Pastor de Anatolia','2026-05-13 21:17:00',1),(108,1,'Pastor de Brie o Briard','2026-05-13 21:17:00',1),(109,1,'Pastor de Los Pirineos','2026-05-13 21:17:00',1),(110,1,'Pastor de Maremma','2026-05-13 21:17:00',1),(111,1,'Pastor de Shetland (Shetland sheepdog)','2026-05-13 21:17:00',1),(112,1,'Pastor ganadero australiano','2026-05-13 21:17:00',1),(113,1,'Pastor Garafiano','2026-05-13 21:17:00',1),(114,1,'Pastor lapón de Suecia','2026-05-13 21:17:00',1),(115,1,'Pastor polaco de las llanuras','2026-05-13 21:17:00',1),(116,1,'Perdiguero de Burgos','2026-05-13 21:17:00',1),(117,1,'Perdiguero portugués','2026-05-13 21:17:00',1),(118,1,'Perro Bull terrier','2026-05-13 21:17:00',1),(119,1,'Perro Cane Corso o mastín italiano','2026-05-13 21:17:00',1),(120,1,'Perro de agua español','2026-05-13 21:17:00',1),(121,1,'Perro de agua irlandés','2026-05-13 21:17:00',1),(122,1,'Perro de agua portugués','2026-05-13 21:17:00',1),(123,1,'Perro de Canaán','2026-05-13 21:17:00',1),(124,1,'Perro de Groenlandia','2026-05-13 21:17:00',1),(125,1,'Perro de montaña de los Pirineos','2026-05-13 21:17:00',1),(126,1,'Perro de pastor Mallorquín','2026-05-13 21:17:00',1),(127,1,'Perro del faraón','2026-05-13 21:17:00',1),(128,1,'Perro Esquimal Americano','2026-05-13 21:17:00',1),(129,1,'Perro finlandés de Laponia','2026-05-13 21:17:00',1),(130,1,'Perro Leonés de Pastor','2026-05-13 21:17:00',1),(131,1,'Perro Lobo Checoslovaco','2026-05-13 21:17:00',1),(132,1,'Perro mini Pinscher','2026-05-13 21:17:00',1),(133,1,'Perro pastor blanco suizo','2026-05-13 21:17:00',1),(134,1,'Perro pastor catalán o gos datura','2026-05-13 21:17:00',1),(135,1,'Perro Pastor del Cáucaso','2026-05-13 21:17:00',1),(136,1,'Perro Pastor Vasco','2026-05-13 21:17:00',1),(137,1,'Perro pointer inglés','2026-05-13 21:17:00',1),(138,1,'Perro Serra da Estrela','2026-05-13 21:17:00',1),(139,1,'Pinscher alemán','2026-05-13 21:17:00',1),(140,1,'Pitbull terrier americano','2026-05-13 21:17:00',1),(141,1,'Podenco Canario','2026-05-13 21:17:00',1),(142,1,'Podenco ibicenco (de pelo corto y liso)','2026-05-13 21:17:00',1),(143,1,'Podenco Maneto','2026-05-13 21:17:00',1),(144,1,'Podenco portugués','2026-05-13 21:17:00',1),(145,1,'Pomerania','2026-05-13 21:17:00',1),(146,1,'Puli húngaro','2026-05-13 21:17:00',1),(147,1,'Ratonero Valenciano','2026-05-13 21:17:00',1),(148,1,'Raza de perros grandes: Borzoi','2026-05-13 21:17:00',1),(149,1,'Raza Gran Danés','2026-05-13 21:17:00',1),(150,1,'Raza pastor alemán','2026-05-13 21:17:00',1),(151,1,'Raza perro chow chow (de pelo duro)','2026-05-13 21:17:00',1),(152,1,'Retriever de Chesapeake','2026-05-13 21:17:00',1),(153,1,'Retriever de pelo liso','2026-05-13 21:17:00',1),(154,1,'Retriever de pelo rizado','2026-05-13 21:17:00',1),(155,1,'Rottweiler','2026-05-13 21:17:00',1),(156,1,'Rough Collie o Pastor Escocés','2026-05-13 21:17:00',1),(157,1,'Sabueso bávaro de montaña','2026-05-13 21:17:00',1),(158,1,'Sabueso Español','2026-05-13 21:17:00',1),(159,1,'Sabueso italiano (de pelo corto y suave)','2026-05-13 21:17:00',1),(160,1,'Saluki (galgo persa)','2026-05-13 21:17:00',1),(161,1,'Samoyedo','2026-05-13 21:17:00',1),(162,1,'San Bernardo (de pelo medio/largo)','2026-05-13 21:17:00',1),(163,1,'Schipperke','2026-05-13 21:17:00',1),(164,1,'Schnauzer estándar','2026-05-13 21:17:00',1),(165,1,'Schnauzer gigante','2026-05-13 21:17:00',1),(166,1,'Schnauzer miniatura','2026-05-13 21:17:00',1),(167,1,'Sealyham Terrier','2026-05-13 21:17:00',1),(168,1,'Setter escocés','2026-05-13 21:17:00',1),(169,1,'Setter inglés','2026-05-13 21:17:00',1),(170,1,'Setter irlandés','2026-05-13 21:17:00',1),(171,1,'Setter irlandés rojo y blanco','2026-05-13 21:17:00',1),(172,1,'Shar Pei','2026-05-13 21:17:00',1),(173,1,'Shiba Inu japonés','2026-05-13 21:17:00',1),(174,1,'Shih Tzu','2026-05-13 21:17:00',1),(175,1,'Silky Terrier australiano','2026-05-13 21:17:00',1),(176,1,'Skye Terrier','2026-05-13 21:17:00',1),(177,1,'Sloughi (galgo árabe)','2026-05-13 21:17:00',1),(178,1,'Soft Coated Wheaten Terrier','2026-05-13 21:17:00',1),(179,1,'Spaniel holandés','2026-05-13 21:17:00',1),(180,1,'Spaniel tibetano','2026-05-13 21:17:00',1),(181,1,'Spinone italiano','2026-05-13 21:17:00',1),(182,1,'Spitz alemán mediano','2026-05-13 21:17:00',1),(183,1,'Spitz alemán pequeño','2026-05-13 21:17:00',1),(184,1,'Spitz finlandés','2026-05-13 21:17:00',1),(185,1,'Spitz japonés','2026-05-13 21:17:00',1),(186,1,'Springer Spaniel galés','2026-05-13 21:17:00',1),(187,1,'Springer spaniel inglés','2026-05-13 21:17:00',1),(188,1,'Staffordshire bull terrier','2026-05-13 21:17:00',1),(189,1,'Sussex Spaniel','2026-05-13 21:17:00',1),(190,1,'Teckel (pelo largo)','2026-05-13 21:17:00',1),(191,1,'Teckel de pelo duro','2026-05-13 21:17:00',1),(192,1,'Teckel de pelo liso','2026-05-13 21:17:00',1),(193,1,'Teckel miniatura de pelo duro','2026-05-13 21:17:00',1),(194,1,'Teckel miniatura de pelo largo','2026-05-13 21:17:00',1),(195,1,'Teckel miniatura de pelo liso','2026-05-13 21:17:00',1),(196,1,'Terranova perro (Newfoundland)','2026-05-13 21:17:00',1),(197,1,'Terrier Checo','2026-05-13 21:17:00',1),(198,1,'Terrier de Airedale','2026-05-13 21:17:00',1),(199,1,'Terrier de Norfolk (Norfolk Terrier)','2026-05-13 21:17:00',1),(200,1,'Terrier de Norwich (Norwich terrier)','2026-05-13 21:17:00',1),(201,1,'Terrier escocés (scottish terrier)','2026-05-13 21:17:00',1),(202,1,'Terrier galés','2026-05-13 21:17:00',1),(203,1,'Terrier irlandés','2026-05-13 21:17:00',1),(204,1,'Terrier tibetano','2026-05-13 21:17:00',1),(205,1,'Toy Terrier inglés (negro y fuego)','2026-05-13 21:17:00',1),(206,1,'Vallhund sueco','2026-05-13 21:17:00',1),(207,1,'West Highland White Terrier','2026-05-13 21:17:00',1),(208,1,'Whippet','2026-05-13 21:17:00',1),(209,1,'Xoloitzcuintle (mediano)','2026-05-13 21:17:00',1),(210,1,'Yorkshire Terrier','2026-05-13 21:17:00',1),(211,2,'American Bobtail','2026-05-13 21:29:53',1),(212,2,'American wirehair','2026-05-13 21:29:53',1),(213,2,'Americano de pelo corto','2026-05-13 21:29:53',1),(214,2,'Asiático','2026-05-13 21:29:53',1),(215,2,'Australian mist','2026-05-13 21:29:53',1),(216,2,'Azul ruso','2026-05-13 21:29:53',1),(217,2,'Bengala','2026-05-13 21:29:53',1),(218,2,'Birmano','2026-05-13 21:29:53',1),(219,2,'Bombay','2026-05-13 21:29:53',1),(220,2,'Británico de pelo corto','2026-05-13 21:29:53',1),(221,2,'Burmilla','2026-05-13 21:29:53',1),(222,2,'Cornish rex','2026-05-13 21:29:53',1),(223,2,'Curl americano','2026-05-13 21:29:53',1),(224,2,'Devon Rex','2026-05-13 21:29:53',1),(225,2,'Don Sphynx','2026-05-13 21:29:53',1),(226,2,'Esfinge','2026-05-13 21:29:53',1),(227,2,'German rex','2026-05-13 21:29:53',1),(228,2,'Havana','2026-05-13 21:29:53',1),(229,2,'Korat','2026-05-13 21:29:53',1),(230,2,'Kurilian bobtail','2026-05-13 21:29:53',1),(231,2,'Manx','2026-05-13 21:29:53',1),(232,2,'Mau egipcio','2026-05-13 21:29:53',1),(233,2,'Munchkin','2026-05-13 21:29:53',1),(234,2,'Ocicat','2026-05-13 21:29:53',1),(235,2,'Ojos de diamante','2026-05-13 21:29:53',1),(236,2,'Oriental','2026-05-13 21:29:53',1),(237,2,'Peterbald','2026-05-13 21:29:53',1),(238,2,'Pixiebob','2026-05-13 21:29:53',1),(239,2,'Seychellois','2026-05-13 21:29:53',1),(240,2,'Siamés','2026-05-13 21:29:53',1),(241,2,'Siamés tradicional','2026-05-13 21:29:53',1),(242,2,'Singapura','2026-05-13 21:29:53',1),(243,2,'Snowshoe','2026-05-13 21:29:53',1),(244,2,'Sokoke','2026-05-13 21:29:53',1),(245,2,'Tonkinés','2026-05-13 21:29:53',1),(246,1,'Mestizo','2026-05-13 21:30:21',1),(247,2,'Mestizo','2026-05-13 21:31:02',1),(248,3,'Loro','2026-05-13 21:39:34',1),(249,3,'Guacamayo','2026-05-13 21:39:34',1),(250,3,'Cacatua','2026-05-13 21:39:34',1),(251,3,'Perico','2026-05-13 21:39:34',1),(252,3,'Gallina','2026-05-13 21:39:34',1),(253,3,'Pato pekin','2026-05-13 21:39:34',1),(254,3,'Pato criollo','2026-05-13 21:39:34',1),(255,3,'Pato mulard','2026-05-13 21:39:34',1),(256,3,'Pavo','2026-05-13 21:39:34',1),(257,3,'Gansos','2026-05-13 21:39:34',1),(258,3,'Codornice','2026-05-13 21:39:34',1),(259,3,'Pintadas (Gallinas de Guinea)','2026-05-13 21:39:34',1),(260,3,'Palomas','2026-05-13 21:39:34',1),(261,3,'Otro','2026-05-13 21:42:50',1),(262,4,'Otro','2026-05-13 21:46:28',1),(263,4,'Gecko','2026-05-13 21:46:28',1),(264,4,'Camaleon','2026-05-13 21:46:28',1),(265,4,'Tortuga de agua','2026-05-13 21:46:28',1),(266,4,'Iguana','2026-05-13 21:46:28',1),(267,4,'Serpiente','2026-05-13 21:46:28',1),(268,4,'Pogona','2026-05-13 21:46:28',1),(269,4,'Otro','2026-05-13 21:59:38',1),(307,5,'Otro','2026-05-13 22:01:21',1),(308,5,'Ardilla','2026-05-13 22:01:21',1),(309,5,'Ardilla coreana','2026-05-13 22:01:21',1),(310,5,'Chinchilla','2026-05-13 22:01:21',1),(311,5,'Cobaya abisina','2026-05-13 22:01:21',1),(312,5,'Cobaya peruana','2026-05-13 22:01:21',1),(313,5,'Cobaya','2026-05-13 22:01:21',1),(314,5,'Conejo alaska','2026-05-13 22:01:21',1),(315,5,'Conejo arlequín','2026-05-13 22:01:21',1),(316,5,'Conejo azul de viena','2026-05-13 22:01:21',1),(317,5,'Conejo belier enano','2026-05-13 22:01:21',1),(318,5,'Conejo cabeza de león','2026-05-13 22:01:21',1),(319,5,'Conejo de Angora','2026-05-13 22:01:21',1),(320,5,'Conejo enano','2026-05-13 22:01:21',1),(321,5,'Conejo holandés','2026-05-13 22:01:21',1),(322,5,'Conejo holandés enano','2026-05-13 22:01:21',1),(323,5,'Conejo polaco','2026-05-13 22:01:21',1),(324,5,'Conejo rex','2026-05-13 22:01:21',1),(325,5,'Conejo tan','2026-05-13 22:01:21',1),(326,5,'Conejo teddy','2026-05-13 22:01:21',1),(327,5,'Cricetomyinae','2026-05-13 22:01:21',1),(328,5,'Degú','2026-05-13 22:01:21',1),(329,5,'Erizo','2026-05-13 22:01:21',1),(330,5,'Erizo africano','2026-05-13 22:01:21',1),(331,5,'Hámster','2026-05-13 22:01:21',1),(332,5,'Hámster chino (Cricetulus griseus)','2026-05-13 22:01:21',1),(333,5,'Hámster común','2026-05-13 22:01:21',1),(334,5,'Hámster dorado','2026-05-13 22:01:21',1),(335,5,'Hámster enano','2026-05-13 22:01:21',1),(336,5,'Hámster ruso','2026-05-13 22:01:21',1),(337,5,'Hámster teddy','2026-05-13 22:01:21',1),(338,5,'Hurones','2026-05-13 22:01:21',1),(339,5,'Jerbo de Mongolia','2026-05-13 22:01:21',1),(340,5,'Jerbo persa','2026-05-13 22:01:21',1),(341,5,'Lemmings','2026-05-13 22:01:21',1),(342,5,'Liebre','2026-05-13 22:01:21',1),(343,5,'Rata','2026-05-13 22:01:21',1),(344,5,'Ratón','2026-05-13 22:01:21',1),(345,6,'Otro','2026-05-13 22:10:27',1),(346,6,'Bovino','2026-05-13 22:10:27',1),(347,6,'Porcino','2026-05-13 22:10:27',1),(348,6,'Ovino','2026-05-13 22:10:27',1),(349,6,'Caprino','2026-05-13 22:10:27',1),(350,6,'Equino','2026-05-13 22:10:27',1),(351,6,'Camelido','2026-05-13 22:10:27',1),(352,7,'Angel','2026-05-13 22:27:20',1),(353,7,'Betta','2026-05-13 22:27:20',1),(354,7,'Cebra','2026-05-13 22:27:20',1),(355,7,'Guppy','2026-05-13 22:27:20',1),(356,7,'Tetra neon','2026-05-13 22:27:20',1),(357,7,'Planty','2026-05-13 22:27:20',1),(358,7,'Molly negro','2026-05-13 22:27:20',1),(359,7,'Corydora paleatus','2026-05-13 22:27:20',1),(360,7,'Disco','2026-05-13 22:27:20',1),(361,7,'Ramirezi','2026-05-13 22:27:20',1),(362,7,'Otro','2026-05-13 22:27:20',1);
/*!40000 ALTER TABLE `razas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trabajadores` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `ApellidoPaterno` varchar(45) NOT NULL,
  `ApellidoMaterno` varchar(45) NOT NULL,
  `CURP` varchar(19) NOT NULL,
  `CorreoElectronico` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `role` enum('ADMINISTRADOR','OFICINA','CENSADOR') NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`,`Created_at`),
  UNIQUE KEY `CURP_UNIQUE` (`CURP`),
  UNIQUE KEY `CorreoElectronico_UNIQUE` (`CorreoElectronico`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajadores`
--

LOCK TABLES `trabajadores` WRITE;
/*!40000 ALTER TABLE `trabajadores` DISABLE KEYS */;
INSERT INTO `trabajadores` VALUES (3,'Danna Daybe','Cota','Sandoval','COSD050405MBSTNNA8','dannadaybecs@gmail.com','abcd1234','ADMINISTRADOR','2026-04-17 19:23:58',1),(4,'Alan Aldahir','Collins','Navarro','CONA050415HBSTNN8','alanCollins@gmail.com','abcd1234','OFICINA','2026-04-17 19:23:58',1),(5,'Juan','Perez','Dominguez','PEDJ042525HNJNDHD9','juan123@gmail.com','abcd1234','ADMINISTRADOR','2026-04-17 19:32:29',1),(7,'Pedro','Lopez','Lopez','123456789012345678','correo@correo.com','S0mCR123','CENSADOR','2026-04-18 19:31:01',1),(8,'Dolores','Pino','Gonzalez','098765432112345678','Dolores@correo.com','BnXR3123','OFICINA','2026-04-18 20:18:40',1),(9,'Ana','Ana','Ana','1234567890poiuytrew','Ana@correo.com','abcd1234','CENSADOR','2026-05-05 19:16:58',1);
/*!40000 ALTER TABLE `trabajadores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-13 15:50:07

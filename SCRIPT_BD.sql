-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u433607486_IEDITRT
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

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
-- Table structure for table `calificacions`
--

DROP TABLE IF EXISTS `calificacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calificacions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idUser` int(10) unsigned NOT NULL,
  `idRelacion` int(10) unsigned NOT NULL,
  `idCalificacion` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userCreador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userModificador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calificacions_iduser_foreign` (`idUser`),
  KEY `calificacions_idrelacion_foreign` (`idRelacion`),
  KEY `calificacions_idcalificacion_foreign` (`idCalificacion`),
  CONSTRAINT `calificacions_idcalificacion_foreign` FOREIGN KEY (`idCalificacion`) REFERENCES `tipo_calificacions` (`id`),
  CONSTRAINT `calificacions_idrelacion_foreign` FOREIGN KEY (`idRelacion`) REFERENCES `relacion_estudiante_cursos` (`id`),
  CONSTRAINT `calificacions_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacions`
--

/*!40000 ALTER TABLE `calificacions` DISABLE KEYS */;
INSERT INTO `calificacions` VALUES (4,3,180,3,'2019-12-07 00:18:17','2019-12-07 00:18:17','ivan macias',NULL),(18,2,180,3,'2020-03-15 20:00:05','2020-03-15 20:00:05','Admin',NULL),(19,2,186,3,'2020-03-15 20:44:07','2020-03-15 20:44:07','Admin',NULL);
/*!40000 ALTER TABLE `calificacions` ENABLE KEYS */;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idJornada` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userCreador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userModificador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_estudiante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'No tiene estudiantes',
  `cuentaPuntos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_idjornada_foreign` (`idJornada`),
  CONSTRAINT `cursos_idjornada_foreign` FOREIGN KEY (`idJornada`) REFERENCES `jornadas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (2,'601',2,'2019-11-26 00:00:00','2020-03-07 21:12:33','superAdmin',NULL,'0','396'),(4,'Sin Asignar',3,'2019-11-28 00:00:00','2020-01-16 02:38:46','SuperAdmin',NULL,'0','400'),(5,'602',1,'2019-11-29 00:00:00','2020-01-16 02:38:47','SuperAdmin',NULL,'0','400'),(6,'602',2,'2019-11-28 00:00:00','2020-03-15 20:44:07','SuperAdmin',NULL,'41','397'),(7,'603',2,'2019-12-05 23:37:06','2020-01-16 02:38:49','superAdmin',NULL,'0','400'),(9,'701',2,'2019-12-28 18:56:01','2020-01-17 21:59:05','superAdmin',NULL,'0','400'),(11,'CursoPrueba',1,'2020-03-04 03:03:15','2020-03-07 21:12:35','superAdmin',NULL,'0','400'),(13,'1103',1,'2020-03-07 21:22:43','2020-03-07 21:25:18','superAdmin',NULL,'0','400'),(14,'903',1,'2020-03-07 21:28:01','2020-03-15 19:03:22','superAdmin',NULL,'0','400');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;

--
-- Table structure for table `docentes`
--

DROP TABLE IF EXISTS `docentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docentes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `UserCreador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserModificador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idCurso` int(10) unsigned DEFAULT NULL,
  `idEstado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `docentes_idestado_foreign` (`idEstado`),
  KEY `docentes_idcurso_foreign` (`idCurso`),
  CONSTRAINT `docentes_idcurso_foreign` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`id`),
  CONSTRAINT `docentes_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
INSERT INTO `docentes` VALUES (1,'GIRALDO LIBIA MILENA','1',NULL,'2019-12-11 16:31:40',NULL,NULL,NULL,1),(2,'ACEVEDO GUTIERREZ NUBIA        ','2',NULL,'2019-12-06 21:27:54',NULL,NULL,NULL,1),(3,'ACEVEDO PÉREZ MARÍA DEL PILAR','3',NULL,'2020-03-15 22:05:16',NULL,NULL,NULL,1),(4,'DELGADO MEDINA ENEIDA','4',NULL,NULL,NULL,NULL,NULL,1),(5,'BORRAEZ GUERRERO DIEGO','5',NULL,NULL,NULL,NULL,NULL,1),(6,'BUENO CRUZ CONRADO ANDRÉS','6',NULL,NULL,NULL,NULL,NULL,1),(7,'ESPINEL  LUIS. H.            ','7',NULL,NULL,NULL,NULL,NULL,1),(8,'CASTIBLANCO RAMÍREZ SANDRA PAOLA','8',NULL,NULL,NULL,NULL,NULL,1),(9,'FORERO RIVEROS PEDRO NEL','9',NULL,NULL,NULL,NULL,NULL,1),(10,'GAMBOA MOSQUERA JOSÉ FELSER','10',NULL,NULL,NULL,NULL,NULL,1),(11,'GARNICA PINILLA MARTHA JANETH','11',NULL,NULL,NULL,NULL,NULL,1),(12,'GOMEZ  NEIRA LAURENTINO     ','12',NULL,'2020-03-15 21:23:57',NULL,NULL,NULL,1),(13,'GONZALEZ SANCHEZ MARIO','13',NULL,'2020-01-18 21:17:37',NULL,NULL,NULL,1),(14,'GUALTEROS MIRANDA ROSA INES','14',NULL,NULL,NULL,NULL,NULL,1),(15,'RODRIGUEZ GUTIERREZ MILLER','15',NULL,NULL,NULL,NULL,NULL,1),(16,'LOZANO MURILLO MARÍA DEL ROSARIO','16',NULL,NULL,NULL,NULL,NULL,1),(17,'CARDONA POVEA GREY IBETH ','17',NULL,NULL,NULL,NULL,NULL,1),(18,'GUERRERO VALENZUELA EDWIN  HERNAN','18',NULL,NULL,NULL,NULL,NULL,1),(19,'MURCIA CAMACHO ELQUIN','19',NULL,NULL,NULL,NULL,NULL,1),(20,'OVIEDO MARTINEZ JAVIER                 ','20',NULL,NULL,NULL,NULL,NULL,1),(21,'RAMÍREZ GARCÍA MÓNICA NATALIA','21',NULL,NULL,NULL,NULL,NULL,1),(22,'PINZÓN CANDELARIO ARMANDO','22',NULL,NULL,NULL,NULL,NULL,1),(23,'RICO QUICENO ALEJANDRO        ','23',NULL,NULL,NULL,NULL,NULL,1),(24,'FAGER GUTIERREZ DAVID','24',NULL,NULL,NULL,NULL,NULL,1),(25,'SANTOS PAEZ JUAN RAFAEL','25',NULL,NULL,NULL,NULL,NULL,1),(26,'VALENCIA  ROA HAROLD ALBERTO','26',NULL,'2020-03-15 22:06:06',NULL,NULL,NULL,1),(27,'LEÓN JARAMILLO DANNY FERNANDO','27',NULL,NULL,NULL,NULL,NULL,1),(28,'VASQUEZ BARON JESUS MANUEL','28',NULL,NULL,NULL,NULL,NULL,1),(29,'PERAFAN RUIZ MARCO ANTONIO','29',NULL,NULL,NULL,NULL,NULL,1),(30,'PAEZ MENDEZ LAURA ALEJANDRA','30',NULL,NULL,NULL,NULL,NULL,1),(31,'MACIAS VILLALOBOS IVAN ALEXANDER','31',NULL,'2019-12-28 19:33:57',NULL,NULL,NULL,1),(32,'GUTIERREZ EMIRO','32',NULL,NULL,NULL,NULL,NULL,1),(48,'ROJAS SOLANGE','3424234',NULL,NULL,NULL,NULL,NULL,1),(49,'DUARTE CAMILO','34234655',NULL,NULL,NULL,NULL,NULL,1),(50,'pepito perez','98978675',NULL,NULL,NULL,NULL,NULL,1),(51,'profesor 1','1111111111','2020-01-17 15:11:32','2020-01-17 15:11:32','SuperAdmin',NULL,NULL,1);
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userCreador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userModificador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'activo','2019-11-26 00:00:00','2019-11-26 00:00:00','superAdmin',NULL),(2,'inactivo','2019-11-26 00:00:00','2019-11-26 00:00:00','superAdmin',NULL);
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;

--
-- Table structure for table `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiantes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `UserCreador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserModificador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idEstado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `estudiantes_idestado_foreign` (`idEstado`),
  CONSTRAINT `estudiantes_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
INSERT INTO `estudiantes` VALUES (1,'ACOSTA BEJARANO STIVEN ENRIQUE','1141314953',NULL,NULL,'SuperAdmin',NULL,1),(2,'ANACONA ITAS KAREN VANESA','1058787126',NULL,NULL,'SuperAdmin',NULL,1),(3,'ARENAS HERNANDEZ ANDRES FELIPE','1016595252',NULL,NULL,'SuperAdmin',NULL,1),(4,'BELLO VIUCHI JINETH SOFIA','1023377180',NULL,NULL,'SuperAdmin',NULL,1),(5,'BOHORQUEZ ORTIZ JUAN ANDREY','1011095313',NULL,NULL,'SuperAdmin',NULL,1),(6,'BURGOS GOMEZ RONALD','1028840825',NULL,NULL,'SuperAdmin',NULL,1),(7,'CAEZ CASTILLO LUIS ALEJANDRO','1013118651',NULL,NULL,'SuperAdmin',NULL,1),(8,'CASTELLANOS URANGO CRISTIAN IVAN','1019992184',NULL,NULL,'SuperAdmin',NULL,1),(9,'CASTILLO ALFONSO JOHAM SEBASTIAN','1028885149',NULL,NULL,'SuperAdmin',NULL,1),(10,'CONTRERAS GORDILLO LEYDI JULIANA','1012359008',NULL,NULL,'SuperAdmin',NULL,1),(11,'DIAZ CABALLERO KAROL DAYANA','1104774839',NULL,NULL,'SuperAdmin',NULL,1),(12,'DIAZ PARRA NICOL ESTEFANI','1013118519',NULL,NULL,'SuperAdmin',NULL,1),(13,'DOMINGUEZ RONCANCIO MIGUEL ANGEL','1028883292',NULL,NULL,'SuperAdmin',NULL,1),(14,'DUQUE BEDOYA VALENTINA','1073508150',NULL,NULL,'SuperAdmin',NULL,1),(15,'ESTRADA NARVAEZ CRISTIAN FELIPE','1013120610',NULL,NULL,'SuperAdmin',NULL,1),(16,'FORERO CASTRO IVAN SANTIAGO','1028883570',NULL,NULL,'SuperAdmin',NULL,1),(17,'GASPAR PEREZ NICOLAS','1021676720',NULL,NULL,'SuperAdmin',NULL,1),(18,'GOMEZ RAMIREZ ZHARICK LILIANA  Nva','1097095516',NULL,NULL,'SuperAdmin',NULL,1),(19,'GUERRERO DUQUE VALENTINA               Rep.','1025530782',NULL,NULL,'SuperAdmin',NULL,1),(20,'GUTIERREZ SANCHEZ NEIDY NICOL','1023377764',NULL,NULL,'SuperAdmin',NULL,1),(21,'JIMENEZ ROJAS CHERIN JIMENA            Rep.','1016003584',NULL,NULL,'SuperAdmin',NULL,1),(22,'LASSO REVOLLEDO JUANA VALENTINA','1030559681',NULL,NULL,'SuperAdmin',NULL,1),(23,'LEGUIZAMON CALDERON MARIA ALEJANDRA','1013115946',NULL,NULL,'SuperAdmin',NULL,1),(24,'LEON MEJIA LUIS MIGUEL                            Rep.','1013111171',NULL,NULL,'SuperAdmin',NULL,1),(25,'LINARES SALINAS JHOJAN ALEXIS ','1028840755',NULL,NULL,'SuperAdmin',NULL,1),(26,'MEDINA ARIAS LUISA FERNANDA','1030570488',NULL,NULL,'SuperAdmin',NULL,1),(27,'MENDEZ PINTO LEIDY SOFIA','1013116822',NULL,NULL,'SuperAdmin',NULL,1),(28,'MONTAÑA CALDERÓN BRAYAN ANDRES','1013115695',NULL,NULL,'SuperAdmin',NULL,1),(29,'MURCIA SUAREZ DEIBER ANTONIO','1030559608',NULL,NULL,'SuperAdmin',NULL,1),(30,'ORJUELA ROMERO NICOL ALEXANDRA     Rep.','1034661450',NULL,NULL,'SuperAdmin',NULL,1),(31,'OVALLE QUIÑONES VALENTINA VALERI','1070598974',NULL,NULL,'SuperAdmin',NULL,1),(32,'PALOMINO ESCAMILLA JHONATAN FELIPE','1028840766',NULL,NULL,'SuperAdmin',NULL,1),(33,'PINEDA PEÑALOZA  JHOJAN ALEXIS  Rep.','1028840282',NULL,NULL,'SuperAdmin',NULL,1),(34,'RINCON JONATHAN STIVEN','1033102192',NULL,NULL,'SuperAdmin',NULL,1),(35,'RODRIGUEZ  URQUIJO JENNIEFER ANDREA','1023164752',NULL,NULL,'SuperAdmin',NULL,1),(36,'ROMAÑA BLANDON YANNIER YESITH','1077430426',NULL,NULL,'SuperAdmin',NULL,1),(37,'SOTO MORENO HAZAN KALET','1011096804',NULL,NULL,'SuperAdmin',NULL,1),(38,'TALERO MUÑOZ SEBASTIAN   Nvo','1014666851',NULL,NULL,'SuperAdmin',NULL,1),(39,'TIJI BARRAGAN LAURA VALENTINA','1028840723',NULL,NULL,'SuperAdmin',NULL,1),(40,'VERA ORTIZ LAURA XIMENA','1013116741',NULL,NULL,'SuperAdmin',NULL,1),(41,'VILLAMIL YARA GABRIELA','1013118586',NULL,NULL,'SuperAdmin',NULL,1),(42,'YEPES MALAGON DANIEL ALEXANDER','1021674600',NULL,NULL,'SuperAdmin',NULL,1),(43,'ZUBIETA BERNAL BRAYAN EFREN    Rep.','1048847510',NULL,NULL,'SuperAdmin',NULL,1),(44,'ACUÑA CRUZ DANIEL SANTIAGO','1016017803',NULL,NULL,'SuperAdmin',NULL,1),(45,'ARIAS ROMERO  DANA VALENTINA','1021675101',NULL,NULL,'SuperAdmin',NULL,1),(46,'AYALA PINTO JHOAN SEBASTIAN','1016953323',NULL,NULL,'SuperAdmin',NULL,1),(47,'BOGOYA GONZALEZ SOFIA','1019993868',NULL,NULL,'SuperAdmin',NULL,1),(48,'CASTRO DAZA NICOLAS','1013111019',NULL,NULL,'SuperAdmin',NULL,1),(49,'CASTRO RINCON NICOLLE SARAY','1013116858',NULL,NULL,'SuperAdmin',NULL,1),(50,'CERQUERA ACOSTA PAULA ESTEFANNY','1022355509',NULL,NULL,'SuperAdmin',NULL,1),(51,'CERVANTES MENESES KAREN JULIETH','1065646363',NULL,NULL,'SuperAdmin',NULL,1),(52,'DOMINGUEZ RONCANCIO JUAN DAVID','1019984286',NULL,NULL,'SuperAdmin',NULL,1),(53,'FANDIÑO CALDERON VALERY DAYANA   Rep.','1022333483',NULL,NULL,'SuperAdmin',NULL,1),(54,'GALEANO ORTIZ KAREN SOFIA','1022346772',NULL,NULL,'SuperAdmin',NULL,1),(55,'GARZON ROJAS YUMALAY','1014668440',NULL,NULL,'SuperAdmin',NULL,1),(56,'GUZMAN VARGAS DAVID SANTIAGO','1022358318',NULL,NULL,'SuperAdmin',NULL,1),(57,'HERRERA MOLINA LAIS ARYANA AKARI','1016020474',NULL,NULL,'SuperAdmin',NULL,1),(58,'JIMENEZ LEAL ALLISON VALENTINA','1028485715',NULL,NULL,'SuperAdmin',NULL,1),(59,'LEMUS BERNAL ANGIE LISETH','1022954245',NULL,NULL,'SuperAdmin',NULL,1),(60,'LEMUS BERNAL KAROL MICHELLE          Rep.','1022941550',NULL,NULL,'SuperAdmin',NULL,1),(61,'LEÓN DIAZ ANA SOFIA    Nva','1019902692',NULL,NULL,'SuperAdmin',NULL,1),(62,'LOZANO RUIZ JESUS DAVID   Nvo','1005530794',NULL,NULL,'SuperAdmin',NULL,1),(63,'MACHADO TIMOTE YESSICA ALEJANDRA','1019995199',NULL,NULL,'SuperAdmin',NULL,1),(64,'MARTINEZ QUINTANA CARLOS ESTEBAN','1031811448',NULL,NULL,'SuperAdmin',NULL,1),(65,'MORENO RAMIREZ PAULA ANDREA   Rep.','1026556982',NULL,NULL,'SuperAdmin',NULL,1),(66,'NARANJO NARVAEZ JUAN SEBASTIAN    Rep.','1018421045',NULL,NULL,'SuperAdmin',NULL,1),(67,'NIETO RODRIGUEZ CRISTIAN CAMILO   Rep.','1141316456',NULL,NULL,'SuperAdmin',NULL,1),(68,'NOSCUE DOMINGUEZ BRYAN MAURICIO','1028880483',NULL,NULL,'SuperAdmin',NULL,1),(69,'OVALLE JARAMILLO ALAN ALEXANDER','1012353826',NULL,NULL,'SuperAdmin',NULL,1),(70,'PATAQUIVA SALAMANCA NICOLLE SOFIA','1024491400',NULL,NULL,'SuperAdmin',NULL,1),(71,'PIZA LOPEZ ALISON PAOLA','1034781018',NULL,NULL,'SuperAdmin',NULL,1),(72,'POVEDA GUALTEROS KEVIN DAVID','1141320619',NULL,NULL,'SuperAdmin',NULL,1),(73,'QUITIAN ACERO DEIVID SANTIAGO','1022358109',NULL,NULL,'SuperAdmin',NULL,1),(74,'RICO GUERRERO CAROL LIZETH','1057583307',NULL,NULL,'SuperAdmin',NULL,1),(75,'ROA GONZALEZ BRAIDER BLADIMIR   Nvo','1055551610',NULL,NULL,'SuperAdmin',NULL,1),(76,'RODRIGUEZ LONDOÑO ZARA SOFIA','1032438798',NULL,NULL,'SuperAdmin',NULL,1),(77,'RODRIGUEZ URANGO LUIS CARLOS','1126121964',NULL,NULL,'SuperAdmin',NULL,1),(78,'RUIZ VARGAS LILIANA','1028884710',NULL,NULL,'SuperAdmin',NULL,1),(79,'SAAVEDRA RUIZ LAURA DANIELA','1030554887',NULL,NULL,'SuperAdmin',NULL,1),(80,'SUAREZ GAITAN MICHAEL STIBEN','1022347126',NULL,NULL,'SuperAdmin',NULL,1),(81,'VARGAS NAVARRETE GERALDINE ALEJANDRA','1145224409',NULL,NULL,'SuperAdmin',NULL,1),(82,'VASQUEZ HERRERA JOSE LUIS','1065870000',NULL,NULL,'SuperAdmin',NULL,1),(83,'VIVAS RAMIREZ ANDRES FELIPE','1028884414',NULL,NULL,'SuperAdmin',NULL,1),(167,'dididi','1234567890','2020-01-15 23:49:08','2020-01-15 23:49:08','SuperAdmin',NULL,1),(168,'dididi 2','1234567891','2020-01-15 23:52:30','2020-01-15 23:52:30','SuperAdmin',NULL,1),(169,'dididi 3','1234567892','2020-01-15 23:52:30','2020-01-15 23:52:30','SuperAdmin',NULL,1),(170,'dididi 4','1234567893','2020-01-15 23:52:31','2020-01-15 23:52:31','SuperAdmin',NULL,1),(171,'dididi 5','1234567894','2020-01-15 23:52:31','2020-01-15 23:52:31','SuperAdmin',NULL,1),(172,'dididi 6','1234567895','2020-01-15 23:52:31','2020-01-15 23:52:31','SuperAdmin',NULL,1),(173,'dididi 7','1234567896','2020-01-15 23:56:22','2020-01-15 23:56:22','SuperAdmin',NULL,1),(174,'dididi 8','1234567897','2020-01-16 00:12:07','2020-01-16 00:12:07','SuperAdmin',NULL,1),(175,'dididi 9','1234567898','2020-01-16 00:12:08','2020-01-16 00:12:08','SuperAdmin',NULL,1),(176,'dididi 10','1234567899','2020-01-16 00:12:09','2020-01-16 00:12:09','SuperAdmin',NULL,1),(177,'dididi 11','1234567900','2020-01-16 00:16:37','2020-01-16 00:16:37','SuperAdmin',NULL,1),(178,'dididi 12','1234567901','2020-01-16 00:20:35','2020-01-16 00:20:35','SuperAdmin',NULL,1),(179,'dididi 13','1234567902','2020-01-16 00:20:36','2020-01-16 00:20:36','SuperAdmin',NULL,1),(180,'dididi 14','1234567903','2020-01-16 00:20:36','2020-01-16 00:20:36','SuperAdmin',NULL,1),(181,'dididi 15','1234567904','2020-01-16 00:20:37','2020-01-16 00:20:37','SuperAdmin',NULL,1),(182,'dididi 16','1234567905','2020-01-16 00:20:38','2020-01-16 00:20:38','SuperAdmin',NULL,1),(183,'dididi 17','1234567906','2020-01-16 00:20:39','2020-01-16 00:20:39','SuperAdmin',NULL,1),(184,'dididi 18','1234567907','2020-01-16 00:20:39','2020-01-16 00:20:39','SuperAdmin',NULL,1),(185,'dididi 19','1234567908','2020-01-16 00:20:40','2020-01-16 00:20:40','SuperAdmin',NULL,1),(186,'dididi 20','1234567909','2020-01-16 00:20:41','2020-01-16 00:20:41','SuperAdmin',NULL,1),(187,'dididi 21','1234567910','2020-01-16 00:20:42','2020-01-16 00:20:42','SuperAdmin',NULL,1),(188,'dididi 22','1234567911','2020-01-16 00:20:42','2020-01-16 00:20:42','SuperAdmin',NULL,1),(189,'dididi 23','1234567912','2020-01-16 00:20:43','2020-01-16 00:20:43','SuperAdmin',NULL,1),(190,'dididi 24','1234567913','2020-01-16 00:20:45','2020-01-16 00:20:45','SuperAdmin',NULL,1),(191,'dididi 25','1234567914','2020-01-16 00:20:45','2020-01-16 00:20:45','SuperAdmin',NULL,1),(192,'dididi 26','1234567915','2020-01-16 00:20:46','2020-01-16 00:20:46','SuperAdmin',NULL,1),(193,'dididi 27','1234567916','2020-01-16 00:20:47','2020-01-16 00:20:47','SuperAdmin',NULL,1),(194,'dididi 28','1234567917','2020-01-16 00:20:47','2020-01-16 00:20:47','SuperAdmin',NULL,1),(195,'dididi 29','1234567918','2020-01-16 00:20:48','2020-01-16 00:20:48','SuperAdmin',NULL,1),(196,'dididi 30','1234567919','2020-01-16 00:20:49','2020-01-16 00:20:49','SuperAdmin',NULL,1),(197,'dididi 31','1234567920','2020-01-16 00:20:50','2020-01-16 00:20:50','SuperAdmin',NULL,1),(198,'dididi 32','1234567921','2020-01-16 00:20:50','2020-01-16 00:20:50','SuperAdmin',NULL,1),(199,'dididi 33','1234567922','2020-01-16 00:20:51','2020-01-16 00:20:51','SuperAdmin',NULL,1),(200,'dididi 34','1234567923','2020-01-16 00:20:52','2020-01-16 00:20:52','SuperAdmin',NULL,1),(201,'dididi 35','1234567924','2020-01-16 00:20:53','2020-01-16 00:20:53','SuperAdmin',NULL,1),(202,'dididi 36','1234567925','2020-01-16 00:20:53','2020-01-16 00:20:53','SuperAdmin',NULL,1),(203,'dididi 37','1234567926','2020-01-16 00:20:54','2020-01-16 00:20:54','SuperAdmin',NULL,1),(204,'dididi 38','1234567927','2020-01-16 00:20:55','2020-01-16 00:20:55','SuperAdmin',NULL,1),(205,'dididi 39','1234567928','2020-01-16 00:20:55','2020-01-16 00:20:55','SuperAdmin',NULL,1),(206,'dididi 40','1234567929','2020-01-16 00:20:56','2020-01-16 00:20:56','SuperAdmin',NULL,1),(207,'dididi 41','1234567930','2020-01-16 00:20:57','2020-01-16 00:20:57','SuperAdmin',NULL,1),(208,'dididi 42','1234567931','2020-01-16 00:20:58','2020-01-16 00:20:58','SuperAdmin',NULL,1),(209,'dididi 43','1234567932','2020-01-16 00:20:58','2020-01-16 00:20:58','SuperAdmin',NULL,1),(210,'dididi 44','1234567933','2020-01-16 00:20:59','2020-01-16 00:20:59','SuperAdmin',NULL,1),(211,'dididi 45','1234567934','2020-01-16 00:21:00','2020-01-16 00:21:00','SuperAdmin',NULL,1),(212,'dididi 46','1234567935','2020-01-16 00:21:01','2020-01-16 00:21:01','SuperAdmin',NULL,1),(213,'dididi 47','1234567936','2020-01-16 00:21:01','2020-01-16 00:21:01','SuperAdmin',NULL,1),(214,'dididi 48','1234567937','2020-01-16 00:21:02','2020-01-16 00:21:02','SuperAdmin',NULL,1),(215,'dididi 49','1234567938','2020-01-16 00:21:03','2020-01-16 00:21:03','SuperAdmin',NULL,1),(216,'dididi 50','1234567939','2020-01-16 00:21:03','2020-01-16 00:21:03','SuperAdmin',NULL,1),(217,'dididi 51','1234567940','2020-01-16 00:21:05','2020-01-16 00:21:05','SuperAdmin',NULL,1),(218,'dididi 52','1234567941','2020-01-16 00:21:06','2020-01-16 00:21:06','SuperAdmin',NULL,1),(219,'dididi 53','1234567942','2020-01-16 00:21:07','2020-01-16 00:21:07','SuperAdmin',NULL,1),(220,'dididi 54','1234567943','2020-01-16 00:21:08','2020-01-16 00:21:08','SuperAdmin',NULL,1),(221,'dididi 55','1234567944','2020-01-16 00:21:08','2020-01-16 00:21:08','SuperAdmin',NULL,1),(222,'dididi 56','1234567945','2020-01-16 00:21:09','2020-01-16 00:21:09','SuperAdmin',NULL,1),(223,'dididi 57','1234567946','2020-01-16 00:21:10','2020-01-16 00:21:10','SuperAdmin',NULL,1),(224,'dididi 58','1234567947','2020-01-16 00:21:11','2020-01-16 00:21:11','SuperAdmin',NULL,1),(225,'dididi 59','1234567948','2020-01-16 00:21:12','2020-01-16 00:21:12','SuperAdmin',NULL,1),(226,'dididi 60','1234567949','2020-01-16 00:21:13','2020-01-16 00:21:13','SuperAdmin',NULL,1),(227,'dididi 61','1234567950','2020-01-16 00:21:14','2020-01-16 00:21:14','SuperAdmin',NULL,1),(228,'dididi 62','1234567951','2020-01-16 00:21:15','2020-01-16 00:21:15','SuperAdmin',NULL,1),(229,'dididi 63','1234567952','2020-01-16 00:21:15','2020-01-16 00:21:15','SuperAdmin',NULL,1),(230,'dididi 64','1234567953','2020-01-16 00:21:16','2020-01-16 00:21:16','SuperAdmin',NULL,1),(231,'dididi 65','1234567954','2020-01-16 00:21:17','2020-01-16 00:21:17','SuperAdmin',NULL,1),(232,'dididi 66','1234567955','2020-01-16 00:21:18','2020-01-16 00:21:18','SuperAdmin',NULL,1),(233,'dididi 67','1234567956','2020-01-16 00:21:19','2020-01-16 00:21:19','SuperAdmin',NULL,1),(234,'dididi 68','1234567957','2020-01-16 00:21:20','2020-01-16 00:21:20','SuperAdmin',NULL,1),(235,'dididi 69','1234567958','2020-01-16 00:21:21','2020-01-16 00:21:21','SuperAdmin',NULL,1),(236,'dididi 70','1234567959','2020-01-16 00:21:21','2020-01-16 00:21:21','SuperAdmin',NULL,1),(237,'dididi 71','1234567960','2020-01-16 00:21:22','2020-01-16 00:21:22','SuperAdmin',NULL,1),(238,'dididi 72','1234567961','2020-01-16 00:21:23','2020-01-16 00:21:23','SuperAdmin',NULL,1),(239,'dididi 73','1234567962','2020-01-16 00:21:24','2020-01-16 00:21:24','SuperAdmin',NULL,1),(240,'dididi 74','1234567963','2020-01-16 00:21:24','2020-01-16 00:21:24','SuperAdmin',NULL,1),(241,'dididi 75','1234567964','2020-01-16 00:21:25','2020-01-16 00:21:25','SuperAdmin',NULL,1),(242,'dididi 76','1234567965','2020-01-16 00:21:26','2020-01-16 00:21:26','SuperAdmin',NULL,1),(243,'dididi 77','1234567966','2020-01-16 00:21:26','2020-01-16 00:21:26','SuperAdmin',NULL,1),(244,'pepito perez','0987654321','2020-01-17 14:43:12','2020-01-17 14:43:12','SuperAdmin',NULL,1),(245,'pepito perez ortega','098765432','2020-01-17 14:47:09','2020-01-17 14:47:09','SuperAdmin',NULL,1),(246,'pepito segundo perez ortega','0987654322','2020-01-17 14:49:07','2020-01-17 14:49:07','SuperAdmin',NULL,1),(247,'pepito tercero','3498349843','2020-01-17 15:52:32','2020-01-17 15:52:32','SuperAdmin',NULL,1),(248,'ivan macias','394823789','2020-01-17 21:52:56','2020-01-17 21:52:56','SuperAdmin',NULL,1),(249,'Lucio Camargo','12345','2020-03-04 03:03:45','2020-03-04 03:03:45','SuperAdmin',NULL,1),(250,'ZUBIETA BERNAL BRAYAN EFREN    Rep.','1048847511','2020-03-07 21:06:35','2020-03-07 21:06:35','SuperAdmin',NULL,1);
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;

--
-- Table structure for table `jornadas`
--

DROP TABLE IF EXISTS `jornadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jornadas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jornada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userCreador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userModificador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jornadas`
--

/*!40000 ALTER TABLE `jornadas` DISABLE KEYS */;
INSERT INTO `jornadas` VALUES (1,'mañana','2019-11-26 00:00:00','2019-11-26 00:00:00','superAdmin',NULL),(2,'tarde','2019-11-26 00:00:00','2019-11-26 00:00:00','superAdmin',NULL),(3,'Sin Jornada','2019-11-28 00:00:00','2019-11-28 00:00:00','SuperAdmin',NULL);
/*!40000 ALTER TABLE `jornadas` ENABLE KEYS */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_11_01_211844_create_roles_table',1),(4,'2019_11_01_212204_create_role_user_table',1),(5,'2019_11_26_211534_create_estudiantes_table',2),(6,'2019_11_26_214821_create_docentes_table',2),(7,'2019_11_26_215115_create_cursos_table',3),(8,'2019_11_26_220153_add_responsable_docente',3),(9,'2019_11_26_220502_create_jornadas_table',3),(10,'2019_11_26_221057_add_estado_estudiante',3),(11,'2019_11_26_221136_create_estados_table',3),(12,'2019_11_26_221334_add_fk__estado_estudiante',3),(13,'2019_11_26_221357_add_fk__estado_decente',3),(14,'2019_11_26_223726_add_fk_jornada_curso',4),(15,'2019_11_28_150657_create_relacion_estudiante_cursos_table',5),(16,'2019_11_28_152248_add_fk_rela_est_curso',5),(17,'2019_11_28_192901_add_fk_docente_curso',6),(18,'2019_11_29_174720_add_total_estu_curso',7),(19,'2019_12_05_150406_create_calificacions_table',8),(20,'2019_12_05_150758_create_tipo_calificacions_table',8),(22,'2019_12_05_153815_add_fk_calificaciones',9),(23,'2019_12_05_212530_add_campo_cuenta',10),(24,'2019_12_07_003241_add_identificacion_user',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

--
-- Table structure for table `relacion_estudiante_cursos`
--

DROP TABLE IF EXISTS `relacion_estudiante_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relacion_estudiante_cursos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idEstudiante` int(10) unsigned NOT NULL,
  `idCurso` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userCreador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userModificador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relacion_estudiante_cursos_idestudiante_foreign` (`idEstudiante`),
  KEY `relacion_estudiante_cursos_idcurso_foreign` (`idCurso`),
  CONSTRAINT `relacion_estudiante_cursos_idcurso_foreign` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`id`),
  CONSTRAINT `relacion_estudiante_cursos_idestudiante_foreign` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=740 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relacion_estudiante_cursos`
--

/*!40000 ALTER TABLE `relacion_estudiante_cursos` DISABLE KEYS */;
INSERT INTO `relacion_estudiante_cursos` VALUES (168,44,6,'2019-12-02 15:50:36','2019-12-02 15:50:36','SuperAdmin',NULL),(169,45,6,'2019-12-02 15:50:37','2019-12-02 15:50:37','SuperAdmin',NULL),(170,46,6,'2019-12-02 15:50:37','2019-12-02 15:50:37','SuperAdmin',NULL),(171,47,6,'2019-12-02 15:50:38','2019-12-02 15:50:38','SuperAdmin',NULL),(172,48,6,'2019-12-02 15:50:38','2019-12-02 15:50:38','SuperAdmin',NULL),(173,49,6,'2019-12-02 15:50:38','2019-12-02 15:50:38','SuperAdmin',NULL),(174,50,6,'2019-12-02 15:50:39','2019-12-02 15:50:39','SuperAdmin',NULL),(175,51,6,'2019-12-02 15:50:39','2019-12-02 15:50:39','SuperAdmin',NULL),(176,52,6,'2019-12-02 15:50:40','2019-12-02 15:50:40','SuperAdmin',NULL),(177,53,6,'2019-12-02 15:50:41','2019-12-02 15:50:41','SuperAdmin',NULL),(178,54,6,'2019-12-02 15:50:41','2019-12-02 15:50:41','SuperAdmin',NULL),(179,55,6,'2019-12-02 15:50:41','2019-12-02 15:50:41','SuperAdmin',NULL),(180,56,6,'2019-12-02 15:50:42','2019-12-02 15:50:42','SuperAdmin',NULL),(181,57,6,'2019-12-02 15:50:42','2019-12-02 15:50:42','SuperAdmin',NULL),(182,58,6,'2019-12-02 15:50:43','2019-12-02 15:50:43','SuperAdmin',NULL),(183,59,6,'2019-12-02 15:50:43','2019-12-02 15:50:43','SuperAdmin',NULL),(184,60,6,'2019-12-02 15:50:43','2019-12-02 15:50:43','SuperAdmin',NULL),(185,61,6,'2019-12-02 15:50:44','2019-12-02 15:50:44','SuperAdmin',NULL),(186,62,6,'2019-12-02 15:50:44','2019-12-02 15:50:44','SuperAdmin',NULL),(187,63,6,'2019-12-02 15:50:45','2019-12-02 15:50:45','SuperAdmin',NULL),(188,64,6,'2019-12-02 15:50:45','2019-12-02 15:50:45','SuperAdmin',NULL),(189,65,6,'2019-12-02 15:50:45','2019-12-02 15:50:45','SuperAdmin',NULL),(190,66,6,'2019-12-02 15:50:46','2019-12-02 15:50:46','SuperAdmin',NULL),(191,67,6,'2019-12-02 15:50:46','2019-12-02 15:50:46','SuperAdmin',NULL),(192,68,6,'2019-12-02 15:50:47','2019-12-02 15:50:47','SuperAdmin',NULL),(193,69,6,'2019-12-02 15:50:47','2019-12-02 15:50:47','SuperAdmin',NULL),(194,70,6,'2019-12-02 15:50:48','2019-12-02 15:50:48','SuperAdmin',NULL),(195,71,6,'2019-12-02 15:50:48','2019-12-02 15:50:48','SuperAdmin',NULL),(196,72,6,'2019-12-02 15:50:48','2019-12-02 15:50:48','SuperAdmin',NULL),(197,73,6,'2019-12-02 15:50:49','2019-12-02 15:50:49','SuperAdmin',NULL),(198,74,6,'2019-12-02 15:50:49','2019-12-02 15:50:49','SuperAdmin',NULL),(199,75,6,'2019-12-02 15:50:50','2019-12-02 15:50:50','SuperAdmin',NULL),(200,76,6,'2019-12-02 15:50:50','2019-12-02 15:50:50','SuperAdmin',NULL),(201,77,6,'2019-12-02 15:50:50','2019-12-02 15:50:50','SuperAdmin',NULL),(202,78,6,'2019-12-02 15:50:51','2019-12-02 15:50:51','SuperAdmin',NULL),(203,79,6,'2019-12-02 15:50:51','2019-12-02 15:50:51','SuperAdmin',NULL),(204,80,6,'2019-12-02 15:50:52','2019-12-02 15:50:52','SuperAdmin',NULL),(205,81,6,'2019-12-02 15:50:52','2019-12-02 15:50:52','SuperAdmin',NULL),(206,82,6,'2019-12-02 15:50:52','2019-12-02 15:50:52','SuperAdmin',NULL),(207,83,6,'2019-12-02 15:50:53','2019-12-02 15:50:53','SuperAdmin',NULL),(590,247,6,'2020-01-17 15:52:32','2020-01-17 15:52:32','SuperAdmin',NULL);
/*!40000 ALTER TABLE `relacion_estudiante_cursos` ENABLE KEYS */;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `UserCreador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Creado Web',
  `UserModificador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Creado Web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,2,1,'Creado Web','Creado Web','2019-11-01 21:33:13','2019-11-01 21:33:13'),(2,1,2,'Creado Web','Creado Web','2019-11-01 21:33:13','2019-11-01 21:33:13'),(3,1,3,'Creado Web','Creado Web','2019-11-01 21:45:11','2019-11-01 21:45:11'),(4,2,5,'Creado Web','Creado Web',NULL,NULL),(5,2,6,'Creado Web','Creado Web','2019-12-10 19:07:09','2019-12-10 19:07:09'),(6,2,7,'Creado Web','Creado Web','2019-12-28 19:36:57','2019-12-28 19:36:57');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserCreador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Creado Web',
  `UserModificador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Creado Web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','Creado Web','Creado Web','2019-11-01 21:33:12','2019-11-01 21:33:12'),(2,'user','User','Creado Web','Creado Web','2019-11-01 21:33:12','2019-11-01 21:33:12');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

--
-- Table structure for table `tipo_calificacions`
--

DROP TABLE IF EXISTS `tipo_calificacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_calificacions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `calificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userCreador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userModificador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_calificacions`
--

/*!40000 ALTER TABLE `tipo_calificacions` DISABLE KEYS */;
INSERT INTO `tipo_calificacions` VALUES (1,'Total Puntos','400','2019-12-05 19:07:05','2019-12-05 20:47:50','superAdmin',NULL),(3,'Presentacion personal','1','2019-12-05 20:26:04','2019-12-05 20:48:05','superAdmin',NULL),(4,'llegada tarde','2','2019-12-28 18:57:38','2019-12-28 18:57:38','superAdmin',NULL);
/*!40000 ALTER TABLE `tipo_calificacions` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `identificacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'User','user@example.com','$2y$10$OLYeDfN.QJel/Nkh1LASkO/xgBg11KRCZ/TY2hlYsQv3IWmwEiddy',NULL,'2019-11-01 21:33:13','2019-11-01 21:33:13',NULL),(2,'Admin','admin@example.com','$2y$10$j/oH7pBBGxN/ANwPEyLRjeaLCwbn7MnOTSRxr0ITfTQ9vmo9RkBzO','N7dvr0GwsuuS0BpWg16PFVuUM5mwQtFEug3eYOkJC8966GiQqgc2t1CoVYIQ','2019-11-01 21:33:13','2019-11-01 21:33:13',NULL),(3,'ivan macias','ivan_macias@admin.com','$2y$10$E/8X8Tu/o44k8C/MDpB81.FUKyj7MeGw2zHDdw8RWxQz15npolx4a','hwkT6kop4qAGL8uVJVASHcGQPV2C58DQlG5xXpno90fgTiHKQOI6GUd92fu8','2019-11-01 21:45:11','2019-11-01 21:45:11',NULL),(5,'milena giraldo','milena@gmail.com','$2y$10$MjZkVQ3aJXvf9IrHadVL2OTbKFhfJ9cIKRo4rYMryvIReyxvBnPzW',NULL,'2019-12-10 19:01:50','2019-12-10 19:01:50','1'),(6,'acevedo nubia','nubiaAcevedo@gmail.com','$2y$10$FCvaGGaqYr2ZhfkzCfwEGeOSmDhRyoU52bax1if66N26CFAk/Z3XK','r9bIofUYMiUF07efLqsqSvg305nLpTFhki04QoGLeWfazrviMqBV6aZsBZRb','2019-12-10 19:07:09','2019-12-10 19:07:09','2'),(7,'pepito perez','pepito@perez.co','$2y$10$HvprMEwGfYneQvtn/CDu5unjT6UHPshjxcS3kQrs8qyV/3NXQVgcq','uuAZAtLK6bBkFYy4fAMKrNvhFYhFlGUQrN4fBQ0stc6YdGb7L13V984V25aH','2019-12-28 19:36:57','2020-01-17 22:02:34','98978675');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Dumping routines for database 'u433607486_IEDITRT'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-17 10:48:09

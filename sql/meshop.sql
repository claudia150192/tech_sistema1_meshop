CREATE DATABASE  IF NOT EXISTS `miniventa` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `miniventa`;
-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: miniventa
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `caja_chica`
--

DROP TABLE IF EXISTS `caja_chica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja_chica` (
  `idcajachica` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `montoinicial` decimal(9,2) NOT NULL,
  `montoutilizado` decimal(9,2) NOT NULL DEFAULT '0.00',
  `saldo` decimal(9,2) NOT NULL DEFAULT '0.00',
  `fechamodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcajachica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja_chica`
--

LOCK TABLES `caja_chica` WRITE;
/*!40000 ALTER TABLE `caja_chica` DISABLE KEYS */;
INSERT INTO `caja_chica` VALUES (1,'2015-04-26 01:18:47',50.00,4426.90,0.00,'2015-08-29 22:34:47');
/*!40000 ALTER TABLE `caja_chica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `nCatCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nCatCodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'CATEGORIA 1','1'),(2,'ALICATE','0'),(3,'CATEGORIA 2','1'),(4,'TUERCA','0'),(5,'TORNILLO','0'),(6,'LIJAS','0'),(7,'','0'),(8,'','0'),(9,'Valor','0'),(10,'Ricoru','0'),(11,'','0'),(12,'Sam','0'),(13,'Arturito','0'),(14,'Rusia','0'),(15,'','0'),(16,'','0'),(17,'','0'),(18,'','0'),(19,'','0'),(20,'','0'),(21,'','0'),(22,'','0'),(23,'CATEGORIA 3','1'),(24,'DESARMADOR','0'),(25,'CATEGORIA 4','1'),(26,'CATEGORIA 5','1');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `nCliCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(20) DEFAULT NULL,
  `dni` varchar(20) NOT NULL DEFAULT '',
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL DEFAULT '',
  `telefono` varchar(20) NOT NULL,
  `tipotelefono` int(11) NOT NULL,
  `nrofax` varchar(15) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `otros` varchar(250) DEFAULT '',
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nCliCodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'sfdsf','sdfsdfdsf','Richard','fdsfdsfds','sdfdsfdswerew',1,'sdfdsf','sdfdsfdsfwerewrwer','wergth jhgbnbgnsdgbsgf  dg dsf gdfgds\ngdsfgdsfgdsgsdf','1'),(2,'13123','ert56756gf','tyjuytrut','fdgdfg','dfgdfgdf',1,'dfgdfg','dgdfgyuthgfhgf','retertertgdf dgfdfg gdfgdfg ertert   egfdfg\ndfgdf gdfgf dg dfgrre','1'),(3,'--','--','MIGUEL','','',1,'','','','0'),(4,'--','--','FRANCISCO','','',1,'','','','0'),(5,'','','Juan','','',1,'','','','0'),(6,'--','--','','','',1,'','','','0'),(7,'','47197204','Prueba','sin direccion','980031860',0,'0','prueba@hotmail.com','asdasdasd','1'),(8,'','36456798','0','Calle los laureles #247','279035',1,'','','','0'),(9,'','79836456','Jorge Benavidez','Calle los laureles #247','279035',1,'','','','1'),(10,'','79836456','Jorge Benavidez','Calle los laureles #247','279035',1,'','','','0'),(11,'','79836456','Jorge Benavidez','Calle los laureles #247','279035',1,'','','','0'),(12,'','98003186','Mark','Sin Direcicon','980031860',2,'','','','0'),(13,'','45456798','MIGUEL CARRAZCO','Sin Direcicon','276034',3,'','ejemplo@gmail.com','cliente regular','1'),(14,'','98456798','Cliente','Sin Direcicon','980031860',2,'','ricoru21@live.com','','1'),(15,'','47197204','Francisco carrazo','Sin Direcicon','276034',1,'','lachinita1420@hotmail.com','','1'),(16,'','98003186','Mark Arturo Calderon','Calle los laureles #247','234234',1,'','correo@nodeseado.com','','1'),(17,'','98765432','Test','Test','279035',1,'','ricoru21@live.com','Sin datos','1'),(18,'','08234324','Sammy modif','Sin Direcicon','234234',1,'','ricoru21@live.com','Sin Datos','1'),(19,'','98745366','Testiador','Test2','980031860',2,'','ricoru21@live.com','Sin Datos','1'),(20,'','98888222','Desarrollador','asdasdasdsa','276034',1,'','ricoru21@live.com','Sin Data','1'),(21,'','98888222','Programador','asdasdasdsa','44555555',1,'','ricoru21@live.com','Sin Data','1'),(22,'','93558222','Vendedor','Sin Direcicon','44335555',1,'','ricoru21@live.com','Sin Datos','1'),(23,'','00000000','Reporteador A','Sin Direcicon','279035',1,'','ricoru21@live.com','Sin Datos','1'),(24,'','99999999','Danyck','Sin Direccion','9525252525',2,'','danyck@gmail.com','Sin Datos','1'),(25,'','32444444','sadsadasdas','sadsad','ASDASD',1,'','sadsadsadsadsadsadsadsadsa','','1'),(26,'10075132366','07513236','Juan Perez Alva','Av. Perú 1314','5712512',1,'','bucharico@gmail.com','ok','1'),(27,'','47198234','Richard Oruna','sin direccion','980031860',0,'','ricoru21@live.com','sadasd','1');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conf_documento`
--

DROP TABLE IF EXISTS `conf_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conf_documento` (
  `idconfdocumento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` tinyint(4) NOT NULL COMMENT 'tipo de documento ',
  `serie` varchar(20) NOT NULL,
  `correlativo` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL,
  `fincorrelativo` varchar(30) NOT NULL,
  `ndigito_serie` tinyint(4) NOT NULL,
  `ndigito_correlativo` tinyint(4) NOT NULL,
  `inicioserie` varchar(20) NOT NULL,
  `iniciocorrelativo` varchar(30) NOT NULL,
  PRIMARY KEY (`idconfdocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conf_documento`
--

LOCK TABLES `conf_documento` WRITE;
/*!40000 ALTER TABLE `conf_documento` DISABLE KEYS */;
INSERT INTO `conf_documento` VALUES (1,16,'001','00001','1','99999',3,5,'000','00000'),(2,17,'001','000001','1','999999',3,6,'000','000000'),(3,18,'001','000001','1','999999',3,6,'000','000000');
/*!40000 ALTER TABLE `conf_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `constante`
--

DROP TABLE IF EXISTS `constante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `constante` (
  `int_constante_id` int(11) NOT NULL AUTO_INCREMENT,
  `clase` int(11) NOT NULL,
  `descripcion` varchar(130) NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`int_constante_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `constante`
--

LOCK TABLES `constante` WRITE;
/*!40000 ALTER TABLE `constante` DISABLE KEYS */;
INSERT INTO `constante` VALUES (1,1,'Tipo Telefono',0),(2,1,'Casa',1),(3,1,'Celular',2),(4,1,'RPM',3),(5,1,'RPC',4),(6,2,'Unidad de Medida',0),(7,2,'Unid.',1),(8,2,'Kilog.',2),(9,3,'Forma de Pago',0),(10,3,'CONTADO',1),(11,3,'CREDITO',2),(12,4,'Estado Venta',0),(13,4,'Realizada',1),(14,4,'Cancelada',2),(15,5,'Tipo Documento Venta',0),(16,5,'NOTA VENTA',1),(17,5,'BOLETA VENTA',2),(18,5,'FACTURA',3),(19,6,'Forma Pago',0),(20,6,'EFECTIVO',1),(21,6,'TARJETA DE CREDITO',2),(22,7,'Tipo Operacion Mov',0),(23,7,'RETIRO',1),(24,7,'DEPOSITO',2),(25,8,'Cargo de Usuario',0),(26,8,'ADMINISTRADOR',1),(27,8,'VENDEDOR',2),(28,2,'Galones',3);
/*!40000 ALTER TABLE `constante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contado`
--

DROP TABLE IF EXISTS `contado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contado` (
  `nVenCodigo` int(11) NOT NULL,
  `estado` varchar(13) NOT NULL,
  `montopagado` decimal(18,2) NOT NULL,
  PRIMARY KEY (`nVenCodigo`),
  CONSTRAINT `contado_ibfk_1` FOREIGN KEY (`nVenCodigo`) REFERENCES `venta` (`nVenCodigo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contado`
--

LOCK TABLES `contado` WRITE;
/*!40000 ALTER TABLE `contado` DISABLE KEYS */;
INSERT INTO `contado` VALUES (1,'CONTADO',4200.00),(4,'PagoCancelado',3000.00),(5,'PagoCancelado',1500.00),(7,'PagoCancelado',1200.00),(9,'PagoCancelado',1200.00),(13,'PagoCancelado',1800.00),(14,'PagoCancelado',223.00),(15,'PagoCancelado',73.78),(20,'PagoCancelado',100.00),(21,'PagoCancelado',60.00),(22,'PagoCancelado',285.00),(23,'PagoCancelado',45.39),(24,'PagoCancelado',237.50),(29,'PagoCancelado',100.00),(31,'PagoCancelado',40.00),(33,'PagoCancelado',10.40),(34,'PagoCancelado',25.70),(35,'PagoCancelado',40016.26),(38,'PagoCancelado',40.00),(39,'PagoCancelado',40.00),(41,'PagoCancelado',133.17),(42,'PagoCancelado',133.17),(43,'PagoCancelado',120.00),(44,'PagoCancelado',805.25),(45,'PagoCancelado',107.50),(46,'PagoCancelado',75.22),(47,'PagoCancelado',80.00),(48,'PagoCancelado',107.55),(49,'PagoCancelado',107.55),(50,'PagoCancelado',40.65),(51,'PagoCancelado',26.25),(52,'PagoCancelado',120.00),(53,'PagoCancelado',256.26),(54,'PagoCancelado',800.00),(55,'PagoCancelado',800.00),(56,'PagoCancelado',8.13),(57,'PagoCancelado',80.00),(58,'PagoCancelado',1200.00),(59,'PagoCancelado',60.00),(60,'PagoCancelado',40.00),(61,'PagoCancelado',8.13),(62,'PagoCancelado',20.00),(63,'PagoCancelado',8.13),(64,'PagoCancelado',480.00),(65,'PagoCancelado',480.00);
/*!40000 ALTER TABLE `contado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credito`
--

DROP TABLE IF EXISTS `credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credito` (
  `nVenCodigo` int(11) NOT NULL,
  `nrocuota` int(11) NOT NULL,
  `montocuota` decimal(18,2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `montodebito` decimal(18,2) DEFAULT '0.00',
  PRIMARY KEY (`nVenCodigo`),
  CONSTRAINT `credito_ibfk_1` FOREIGN KEY (`nVenCodigo`) REFERENCES `venta` (`nVenCodigo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credito`
--

LOCK TABLES `credito` WRITE;
/*!40000 ALTER TABLE `credito` DISABLE KEYS */;
INSERT INTO `credito` VALUES (3,5,840.00,'PagoCancelado',4200.00),(6,5,240.00,'PagoCancelado',1200.00),(8,2,600.00,'Debito',1200.00),(10,3,400.00,'Debito',1200.00),(11,5,240.00,'Debito',1542.00),(12,3,400.00,'Debito',1542.00),(32,3,20.00,'Debito',0.00),(36,5,4805.20,'Debito',0.00),(37,22,1.82,'Debito',0.00);
/*!40000 ALTER TABLE `credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cronogramapago`
--

DROP TABLE IF EXISTS `cronogramapago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cronogramapago` (
  `nCPagoCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `nrocuota` int(11) NOT NULL,
  `fecinicio` date NOT NULL,
  `fecpago` date NOT NULL,
  `pagocuota` decimal(18,2) NOT NULL,
  `pagorecibido` decimal(18,2) DEFAULT '0.00',
  `nVenCodigo` int(11) NOT NULL,
  PRIMARY KEY (`nCPagoCodigo`),
  KEY `cronogramapago_venta_idx` (`nVenCodigo`),
  CONSTRAINT `cronogramapago_fk_venta` FOREIGN KEY (`nVenCodigo`) REFERENCES `credito` (`nVenCodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cronogramapago`
--

LOCK TABLES `cronogramapago` WRITE;
/*!40000 ALTER TABLE `cronogramapago` DISABLE KEYS */;
INSERT INTO `cronogramapago` VALUES (1,1,'2011-11-20','2011-12-20',840.00,840.00,3),(2,2,'2011-12-20','2012-01-19',840.00,840.00,3),(3,3,'2012-01-19','2012-02-18',840.00,840.00,3),(4,4,'2012-02-18','2012-03-19',840.00,840.00,3),(5,5,'2012-03-19','2012-04-18',840.00,840.00,3),(6,1,'2011-11-28','2011-12-28',240.00,240.00,6),(7,2,'2011-12-28','2012-01-27',240.00,240.00,6),(8,3,'2012-01-27','2012-02-26',240.00,240.00,6),(9,4,'2012-02-26','2012-03-27',240.00,240.00,6),(10,5,'2012-03-27','2012-04-26',240.00,240.00,6),(11,1,'2011-11-28','2011-12-28',600.00,500.00,8),(12,2,'2011-12-28','2012-01-27',600.00,0.00,8),(13,1,'2011-11-28','2011-12-28',400.00,350.00,10),(14,2,'2011-12-28','2012-01-27',400.00,300.00,10),(15,3,'2012-01-27','2012-02-26',400.00,50.00,10),(16,1,'2011-11-28','2011-12-13',240.00,0.00,11),(17,2,'2011-12-13','2011-12-28',240.00,0.00,11),(18,3,'2011-12-28','2012-01-12',240.00,0.00,11),(19,4,'2012-01-12','2012-01-27',240.00,0.00,11),(20,5,'2012-01-27','2012-02-11',240.00,0.00,11),(21,1,'2011-11-28','2011-12-28',400.00,0.00,12),(22,2,'2011-12-28','2012-01-27',400.00,0.00,12),(23,3,'2012-01-27','2012-02-26',400.00,0.00,12),(24,1,'2013-11-16','2013-12-16',20.00,0.00,32),(25,2,'2013-12-16','2014-01-15',20.00,0.00,32),(26,3,'2014-01-15','2014-02-14',20.00,0.00,32);
/*!40000 ALTER TABLE `cronogramapago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleordencompra`
--

DROP TABLE IF EXISTS `detalleordencompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleordencompra` (
  `CodigoOrdenCompra` int(11) NOT NULL,
  `ProductoCodigo` int(11) NOT NULL,
  `cantidadsolicitada` decimal(18,2) NOT NULL,
  `preciocompra` decimal(18,2) NOT NULL,
  `cantidadrecibida` decimal(18,2) NOT NULL,
  `cantidadrestante` decimal(18,2) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`CodigoOrdenCompra`,`ProductoCodigo`),
  KEY `DetalleOrdenCompraFKProducto_idx` (`ProductoCodigo`),
  CONSTRAINT `DetalleOrdenCompraFKOrdenCompra` FOREIGN KEY (`CodigoOrdenCompra`) REFERENCES `ordencompra` (`CodigoOrdenCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `DetalleOrdenCompraFKProducto` FOREIGN KEY (`ProductoCodigo`) REFERENCES `producto` (`nProCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleordencompra`
--

LOCK TABLES `detalleordencompra` WRITE;
/*!40000 ALTER TABLE `detalleordencompra` DISABLE KEYS */;
INSERT INTO `detalleordencompra` VALUES (1,5,10.00,6.00,10.00,0.00,'1'),(5,3,5.00,12.00,5.00,0.00,'1'),(5,6,5.00,12.50,5.00,0.00,'1'),(5,10,5.00,12.00,5.00,0.00,'1'),(5,11,5.00,12.00,5.00,0.00,'1'),(6,3,5.00,12.00,5.00,0.00,'1'),(6,10,5.00,34.00,5.00,0.00,'1'),(6,11,5.00,23.50,5.00,0.00,'1'),(7,3,5.00,12.00,5.00,0.00,'1'),(7,10,5.00,34.00,5.00,0.00,'1'),(7,11,5.00,23.50,5.00,0.00,'1'),(8,3,5.00,10.00,5.00,0.00,'1'),(8,10,5.00,10.00,5.00,0.00,'1'),(8,11,5.00,10.00,5.00,0.00,'1'),(9,3,10.00,14.50,10.00,0.00,'1'),(11,10,20.00,14.50,20.00,0.00,'1'),(12,11,12.00,20.00,12.00,0.00,'1'),(13,10,5.00,10.00,5.00,0.00,'1'),(16,9,20.00,2.50,20.00,0.00,'1'),(17,6,20.00,4.30,20.00,0.00,'1'),(18,3,10.00,7.25,10.00,0.00,'1'),(19,4,15.00,20.00,15.00,0.00,'1'),(20,4,8.00,20.00,8.00,0.00,'1'),(21,8,20.00,10.00,20.00,0.00,'1'),(22,8,13.00,2.25,13.00,0.00,'1'),(23,7,18.00,20.50,18.00,0.00,'1'),(24,10,10.00,10.00,10.00,0.00,'1'),(25,10,10.00,10.00,10.00,0.00,'1'),(26,7,15.00,5.00,15.00,0.00,'1'),(27,1,1.00,60.00,1.00,0.00,'1'),(28,13,10.00,14.50,10.00,0.00,'1'),(29,16,10.00,120.00,10.00,0.00,'1'),(30,16,3.00,120.00,3.00,0.00,'1'),(31,14,5.00,40.00,5.00,0.00,'1'),(32,3,10.00,20.00,10.00,0.00,'1'),(33,15,5.00,120.00,5.00,0.00,'1'),(33,17,4.00,120.00,4.00,0.00,'1'),(34,15,5.00,120.00,5.00,0.00,'1'),(34,17,4.00,120.00,4.00,0.00,'1'),(35,3,10.00,20.00,10.00,0.00,'1'),(35,14,6.00,40.00,6.00,0.00,'1'),(36,15,2.00,120.00,2.00,0.00,'1'),(36,18,2.00,120.00,2.00,0.00,'1');
/*!40000 ALTER TABLE `detalleordencompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `CodigoEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `RazonSocialEmpresa` varchar(100) NOT NULL,
  `RucEmpresa` char(11) NOT NULL,
  `TelefonoEmpresa` varchar(100) DEFAULT NULL,
  `EmailEmpresa` varchar(100) DEFAULT NULL,
  `DireccionEmpresa` varchar(100) DEFAULT NULL,
  `RepresentanteEmpresa` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`CodigoEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'Mi Empresa S.A.C','20559603563','+51 999494821 / +51 044 612874','ricoru21@gmail.com','Bernardo Alcedo 187 Urb. San Fernando, Trujillo','anonimo');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impuesto`
--

DROP TABLE IF EXISTS `impuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impuesto` (
  `idimpuesto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `porcentaje` decimal(9,2) NOT NULL,
  `estado` char(2) NOT NULL,
  PRIMARY KEY (`idimpuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impuesto`
--

LOCK TABLES `impuesto` WRITE;
/*!40000 ALTER TABLE `impuesto` DISABLE KEYS */;
INSERT INTO `impuesto` VALUES (1,'IGV','2015-03-01 14:54:17',18.00,'1');
/*!40000 ALTER TABLE `impuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardex`
--

DROP TABLE IF EXISTS `kardex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kardex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha` date NOT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `detalle` varchar(150) DEFAULT NULL,
  `tipooperacion` varchar(8) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` decimal(9,2) NOT NULL,
  `preciounitario` decimal(9,2) NOT NULL,
  `importe` decimal(9,2) NOT NULL,
  `local` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardex`
--

LOCK TABLES `kardex` WRITE;
/*!40000 ALTER TABLE `kardex` DISABLE KEYS */;
INSERT INTO `kardex` VALUES (1,'2015-08-27 22:58:01','2013-05-18','0001 - 00000010','S001 - N0000001','Ingreso',5,10.00,6.00,60.00,1),(2,'2015-08-27 22:58:01','2013-05-18','0000 - 00000000','0000 - 00000000','Salida',8,-10.00,12.00,120.00,1),(3,'2015-08-27 22:58:01','2013-05-18','0000 - 00000000','0000 - 00000000','Salida',8,-5.00,12.00,60.00,1),(4,'2015-08-29 20:33:06','2015-08-29','0001-000005','Salida según Venta Nro 64','Salida',17,-4.00,120.00,480.00,1),(5,'2015-08-29 20:47:53','2015-08-29','0004-000356','Compra según Nro 30','Ingreso',16,3.00,120.00,360.00,1),(6,'2015-08-29 20:57:53','2015-08-29','0004-000567','Compra según Nro 31','Ingreso',14,5.00,40.00,200.00,1),(7,'2015-08-29 21:00:33','2015-08-29','0004-000678','Compra según Nro 32','Ingreso',3,10.00,20.00,200.00,1),(8,'2015-08-29 21:10:42','2015-08-29','0004-000345','Compra según Nro 33','Ingreso',17,4.00,120.00,480.00,1),(9,'2015-08-29 21:10:42','2015-08-29','0004-000345','Compra según Nro 33','Ingreso',15,5.00,120.00,600.00,1),(10,'2015-08-29 21:12:33','2015-08-29','0004-000345','Compra según Nro 34','Ingreso',17,4.00,120.00,480.00,1),(11,'2015-08-29 21:12:33','2015-08-29','0004-000345','Compra según Nro 34','Ingreso',15,5.00,120.00,600.00,1),(12,'2015-08-29 21:13:56','2015-08-29','0004-000789','Compra según Nro 35','Ingreso',14,6.00,40.00,240.00,1),(13,'2015-08-29 21:13:56','2015-08-29','0004-000789','Compra según Nro 35','Ingreso',3,10.00,20.00,200.00,1),(14,'2015-08-29 21:22:27','2015-08-29','0003-000236','Compra según Nro 36','Ingreso',15,2.00,120.00,240.00,1),(15,'2015-08-29 21:22:27','2015-08-29','0003-000236','Compra según Nro 36','Ingreso',18,2.00,120.00,240.00,1),(16,'2015-08-29 22:34:47','2015-08-29','0001-000006','Salida según Venta Nro 65','Salida',15,-4.00,120.00,480.00,1);
/*!40000 ALTER TABLE `kardex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local` (
  `int_local_id` int(11) NOT NULL AUTO_INCREMENT,
  `var_local_nombre` varchar(45) NOT NULL,
  `var_local_telefono` varchar(12) NOT NULL,
  `var_local_direccion` varchar(80) NOT NULL,
  `int_local_tipoRubro` int(11) NOT NULL,
  `var_local_estado` char(1) NOT NULL,
  PRIMARY KEY (`int_local_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES (1,'Tienda 2','#980031860','desconocido',0,'1');
/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimiento` (
  `int_Movimiento_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(500) NOT NULL,
  `monto` decimal(9,2) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipoOperacion` int(11) NOT NULL DEFAULT '0',
  `medioPago` int(11) NOT NULL DEFAULT '0',
  `local` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`int_Movimiento_id`),
  KEY `dat_Movimiento_FecReg_idx` (`fechaRegistro`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento`
--

LOCK TABLES `movimiento` WRITE;
/*!40000 ALTER TABLE `movimiento` DISABLE KEYS */;
INSERT INTO `movimiento` VALUES (1,'Salida de dinero por gastos de combustible',50.00,'2013-06-20 01:05:51',1,1,0),(2,'pasaje para comprar mercancia',120.00,'2013-09-13 16:16:58',1,1,0),(3,'comida del empleado',10.00,'2013-09-13 16:17:34',1,1,0),(4,'Prueba de Testeo',100.00,'2014-12-03 02:55:57',1,1,1),(5,'Prueba de testeo 2',50.00,'2014-12-03 02:56:22',2,1,1),(7,'Prueba movimiento',20.00,'2015-02-21 04:52:19',1,1,1),(8,'Tet2',10.00,'2015-02-21 04:53:50',2,1,1),(9,'Pago de Cuota #15',90.00,'2015-05-05 01:40:16',2,1,1),(10,'Cobro de un pago',20.00,'2015-05-08 02:52:42',2,1,1),(11,'Retire para comprar agua bidon.',30.00,'2015-05-08 03:11:45',1,1,1),(12,'se retira dinero',10.00,'2015-05-08 03:15:24',1,1,1);
/*!40000 ALTER TABLE `movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opcion`
--

DROP TABLE IF EXISTS `opcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opcion` (
  `nOpcion` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(100) NOT NULL,
  `submenu` varchar(100) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`nOpcion`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opcion`
--

LOCK TABLES `opcion` WRITE;
/*!40000 ALTER TABLE `opcion` DISABLE KEYS */;
INSERT INTO `opcion` VALUES (1,'Mantenimiento','Cliente','1'),(2,'Mantenimiento','Categoria','1'),(3,'Mantenimiento','Trabajador','1'),(4,'Mantenimiento','Producto','1'),(5,'Mantenimiento','Proveedor','1'),(6,'Mantenimiento','Usuario','1'),(7,'Venta','GenerarVenta','1'),(8,'Venta','VentasAnuladas','1'),(9,'Venta','RegistroMovimiento','1'),(10,'Venta','ConsultaVentas','1'),(11,'Venta','RegistroCompra','1'),(12,'Configuracion','Empresa','1'),(13,'Configuracion','Impuesto','1'),(14,'Configuracion','Cajachica','1');
/*!40000 ALTER TABLE `opcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opcion_usuario`
--

DROP TABLE IF EXISTS `opcion_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opcion_usuario` (
  `Usuario` int(11) NOT NULL,
  `Opcion` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`Usuario`,`Opcion`),
  KEY `nopcionUsuarioFKUsuario_idx` (`Usuario`),
  KEY `nopcionUsuarioFKOpcion_idx` (`Opcion`),
  CONSTRAINT `nopcionUsuarioFKOpcion` FOREIGN KEY (`Opcion`) REFERENCES `opcion` (`nOpcion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nopcionUsuarioFKUsuario` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`nUsuCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opcion_usuario`
--

LOCK TABLES `opcion_usuario` WRITE;
/*!40000 ALTER TABLE `opcion_usuario` DISABLE KEYS */;
INSERT INTO `opcion_usuario` VALUES (1,1,'1'),(1,2,'1'),(1,3,'1'),(1,4,'1'),(1,5,'1'),(1,6,'1'),(1,7,'1'),(1,8,'1'),(1,9,'1'),(1,10,'1'),(1,11,'1'),(1,12,'1'),(1,13,'1'),(1,14,'1'),(3,1,'1'),(3,2,'1'),(3,3,'1'),(3,4,'1'),(3,5,'1'),(3,6,'0'),(3,7,'1'),(3,8,'1'),(3,9,'1'),(3,10,'1'),(3,11,'1'),(3,12,'1'),(3,13,'1'),(5,1,'1'),(5,2,'1'),(5,3,'1'),(5,4,'1'),(5,5,'1'),(5,6,'1'),(5,7,'1'),(5,8,'1'),(5,9,'1'),(5,10,'1'),(5,11,'1'),(5,12,'1'),(5,13,'1'),(5,14,'1'),(7,1,'1'),(7,2,'1'),(7,3,'1'),(7,4,'1'),(7,5,'1'),(7,6,'0'),(7,7,'1'),(7,8,'1'),(7,9,'1'),(7,10,'1'),(7,11,'1'),(7,12,'1'),(7,13,'1'),(7,14,'1'),(8,1,'1'),(8,2,'1'),(8,3,'1'),(8,4,'1'),(8,5,'1'),(8,6,'1'),(8,7,'1'),(8,8,'1'),(8,9,'1'),(8,10,'1'),(8,11,'1'),(8,12,'1'),(8,13,'1'),(8,14,'1');
/*!40000 ALTER TABLE `opcion_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordencompra`
--

DROP TABLE IF EXISTS `ordencompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordencompra` (
  `CodigoOrdenCompra` int(11) NOT NULL AUTO_INCREMENT,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nProvCodigo` int(11) NOT NULL,
  `nPerCodigo` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `tipodocumento` int(11) NOT NULL,
  `serie` char(8) NOT NULL DEFAULT '',
  `numero` char(20) NOT NULL DEFAULT '',
  `estado` char(1) NOT NULL,
  `fechaemision` date NOT NULL,
  `montoTotal` double NOT NULL,
  `igvporcentaje` double NOT NULL,
  `igvmonto` double NOT NULL,
  `subTotal` double NOT NULL,
  PRIMARY KEY (`CodigoOrdenCompra`),
  KEY `fk_OrdenCompra_personal1_idx` (`nPerCodigo`),
  KEY `fk_OrdenCompra_proveedor_idx` (`nProvCodigo`),
  CONSTRAINT `fk_OrdenCompra_personal` FOREIGN KEY (`nPerCodigo`) REFERENCES `personal` (`nPerCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_OrdenCompra_proveedor` FOREIGN KEY (`nProvCodigo`) REFERENCES `proveedor` (`nProvCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordencompra`
--

LOCK TABLES `ordencompra` WRITE;
/*!40000 ALTER TABLE `ordencompra` DISABLE KEYS */;
INSERT INTO `ordencompra` VALUES (1,'2013-10-04 03:49:21',1,2,1,3,'0001','0000033','1','0000-00-00',0,0,0,0),(2,'2013-10-04 03:49:21',2,2,1,3,'0001','0000044','1','0000-00-00',0,0,0,0),(3,'2013-10-04 03:49:21',2,1,1,3,'0001','0000054','1','0000-00-00',0,0,0,0),(4,'2013-10-03 05:15:44',2,1,1,3,'0001','0000345','1','0000-00-00',0,0,0,0),(5,'2013-10-03 05:15:44',2,1,1,3,'0001','0001345','1','0000-00-00',0,0,0,0),(6,'2013-10-03 05:15:44',2,1,1,3,'0001','0003354','1','0000-00-00',0,0,0,0),(7,'2013-10-03 05:15:44',2,1,1,3,'0001','0003354','1','0000-00-00',0,0,0,0),(8,'2013-10-03 05:15:44',2,1,1,3,'0001','0003354','1','0000-00-00',0,0,0,0),(9,'2013-10-03 05:15:44',2,1,1,2,'0001','0023454','1','0000-00-00',0,0,0,0),(10,'2013-10-03 05:15:44',2,1,1,1,'0002','0000054','1','0000-00-00',0,0,0,0),(11,'2013-10-03 05:15:44',2,1,1,1,'0002','0000054','1','0000-00-00',0,0,0,0),(12,'2013-10-03 05:15:44',2,1,1,3,'0002','34008054','1','0000-00-00',0,0,0,0),(13,'2013-10-03 05:15:44',2,1,1,1,'0002','5500054','1','0000-00-00',0,0,0,0),(14,'2013-10-03 05:49:26',3,1,1,3,'0001','00055666','1','0000-00-00',0,0,0,0),(15,'2013-10-03 05:49:26',3,1,1,3,'0001','00055677','1','0000-00-00',0,0,0,0),(16,'2013-10-03 05:49:26',3,1,1,3,'0001','00077666','1','0000-00-00',0,0,0,0),(17,'2013-10-03 06:03:30',2,1,1,3,'0001','05678997','1','0000-00-00',0,0,0,0),(18,'2013-10-03 06:03:30',2,1,1,3,'0001','05884447','1','0000-00-00',0,0,0,0),(19,'2013-10-03 06:14:49',3,1,1,3,'0001','05577666','1','0000-00-00',0,0,0,0),(20,'2013-10-03 06:20:25',4,1,1,3,'0001','05599666','1','0000-00-00',0,0,0,0),(21,'2013-10-03 06:20:25',3,1,1,3,'0001','07784447','1','0000-00-00',0,0,0,0),(22,'2013-10-03 07:01:59',4,1,1,2,'0001','09998997','1','0000-00-00',0,0,0,0),(23,'2013-10-07 05:00:00',4,1,1,3,'0001','19998997','1','0000-00-00',0,0,0,0),(24,'2013-11-09 18:22:23',3,1,1,2,'0003','56777777','1','2013-11-09',0,0,0,0),(25,'2013-11-09 18:23:57',3,1,1,2,'0003','56777777','1','2013-11-09',0,0,0,0),(26,'2013-11-09 18:27:23',4,1,1,2,'0004','56888888','1','2013-11-09',0,0,0,0),(27,'2015-03-12 02:15:22',3,1,1,1,'0001','00005','1','2015-11-03',66.3,6.3,10.5,60),(28,'2015-04-25 05:34:57',3,1,1,1,'0001','000444','1','0000-00-00',171.1,26.1,18,145),(29,'2015-08-29 20:44:31',3,3,1,3,'0003','000456','1','2015-08-29',1200,216,18,984),(30,'2015-08-29 20:47:53',3,3,1,3,'0004','0003','1','0000-00-00',360,64.8,18,295.2),(31,'2015-08-29 20:57:53',3,3,1,3,'0004','000567','1','1969-12-31',200,36,18,164),(32,'2015-08-29 21:00:33',4,3,1,3,'0004','000678','1','0000-00-00',200,36,18,164),(33,'2015-08-29 21:10:42',5,3,1,3,'0004','000345','1','1969-12-31',1080,194.4,18,885.6),(34,'2015-08-29 21:12:33',5,3,1,3,'0004','000345','1','1969-12-31',1080,194.4,18,885.6),(35,'2015-08-29 21:13:56',1,3,1,3,'0004','000789','1','0000-00-00',440,79.2,18,360.8),(36,'2015-08-29 21:22:27',4,3,1,3,'0003','000236','1','2015-08-29',480,86.4,18,393.6);
/*!40000 ALTER TABLE `ordencompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `nPerCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `dni` varchar(30) NOT NULL,
  `tipotelefono` int(11) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`nPerCodigo`),
  UNIQUE KEY `var_personal_dni_UNIQUE` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'ytutyuyt','tyutyuty','542367568',1,'ertert','1'),(2,'Personal de Venta','ss Sin Direccion','45678123',1,'0445556666','1'),(3,'Personal de Reporte','Sin Direccion','987123',1,'044555566','1'),(4,'Richard Oruna Rodriguez','ss av larco #1589','47197204',1,'980031860','1');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `nProCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `cantidad` decimal(18,2) NOT NULL,
  `preciocompra` decimal(18,2) NOT NULL,
  `precioventa` decimal(18,2) NOT NULL,
  `nCatCodigo` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `codproveedor` varchar(15) DEFAULT '0',
  `estado` char(1) NOT NULL DEFAULT '1',
  `stockminimo` decimal(18,2) NOT NULL,
  `unidamedida` int(11) NOT NULL,
  `utilidadporcentaje` decimal(18,2) NOT NULL,
  `utilidadmoneda` decimal(18,2) DEFAULT NULL,
  `especificaciones` text,
  `caracteristicas` text,
  PRIMARY KEY (`nProCodigo`),
  KEY `R_19` (`nCatCodigo`),
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`nCatCodigo`) REFERENCES `categoria` (`nCatCodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Producto2','sddfdsfdsfdsfdsfd fdsf dsfdsfddsfsd\nsdfdsfdsfdsfdsfdsfdsfdsfdsfsdfds',209.00,15.00,80.00,1,'HP','','1',10.00,1,200.00,0.00,NULL,NULL),(2,'Producto3','PC DE ESCRITORIO HP DE 2GB\nRAM',87.00,30.00,60.00,1,'HP','','1',10.00,1,100.00,NULL,NULL,NULL),(3,'Producto 5','dsdasd',21.00,20.00,20.00,1,'CANON','6789','1',0.00,1,175.86,0.00,NULL,NULL),(4,'sadrte','sdasdas',32.00,20.00,20.00,1,'EPSON','56234','1',0.00,1,0.00,0.00,NULL,NULL),(5,'ALICATE CORTE','Nro 2',10.00,5.50,6.30,2,'standly','','0',10.00,1,14.50,NULL,NULL,NULL),(6,'cortadora','asd',27.00,4.30,5.20,1,'standly','R456R','1',0.00,1,20.93,0.00,NULL,NULL),(7,'sadasd','asfsa',33.00,12.75,12.85,1,'asfsa','dsfdsf','1',10.00,1,0.78,NULL,NULL,NULL),(8,'template','sadsad',21.00,6.13,8.13,1,'MAXPRIME','asdasdas','1',0.00,1,32.65,0.00,NULL,NULL),(9,'mmmssss','sadsad',12.00,2.25,5.25,1,'0','546546','1',0.00,1,133.33,0.00,NULL,NULL),(10,'ewrew','rewr',47.00,9.97,15.22,2,'SONY','ewrew','1',10.00,1,52.66,NULL,NULL,NULL),(11,'Programador','Desarmadores',6.00,12.50,47.50,1,'CLM','A00045001-00034','1',100.00,1,380.00,NULL,NULL,NULL),(12,'Cilincro Hidraulico','Cilindro Hidraulico',118.00,550.00,800.00,1,'VAIO','1020','1',0.00,1,45.00,0.00,NULL,NULL),(13,'TEST PRODUCTO','DESC',110.00,14.50,14.00,26,'LG','00SDFSDF','1',0.00,2,8.00,10.00,NULL,NULL),(14,'Producto Test','Producto Test',15.00,40.00,40.00,23,'Marca','0324234234','1',20.00,1,10.00,45.00,NULL,NULL),(15,'Producto 15','asasdasdsaa asdsa d',8.00,120.00,120.00,1,'Producto 1','0045234234234','1',100.00,1,10.00,340.00,NULL,NULL),(16,'Producto Modificacado','Producto Modificacado Producto Modificacado Producto Modificacado',23.00,120.00,120.00,23,'Producto Modificacado','0045234234234','1',10.00,1,10.00,12.00,'<p>Hola como Estas todo bien</p><table class=\"table table-bordered\"><tbody><tr><td style=\"text-align: center;\"><span style=\"font-weight: bold;\">TItulo</span></td><td style=\"text-align: center;\"><span style=\"font-weight: bold;\">Nombre</span></td><td style=\"text-align: center;\"><span style=\"font-weight: bold;\">Campo</span></td><td style=\"text-align: center;\"><span style=\"font-weight: bold;\">Estado</span></td><td style=\"text-align: center;\"><span style=\"font-weight: bold;\">Seccion</span></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p><br></p>','<p>Las caracteristicas de este producto son lo mejores actuales</p>'),(17,'Producto 17','asasdasdsaa asdsa d',12.00,120.00,120.00,1,'Producto 1','0045234234234','1',100.00,1,10.00,340.00,NULL,NULL),(18,'Producto 18','asasdasdsaa asdsa d',12.00,120.00,120.00,1,'Producto 1','0045234234234','1',100.00,1,10.00,340.00,NULL,NULL);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_img`
--

DROP TABLE IF EXISTS `producto_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_img` (
  `idproducto_imag` int(11) NOT NULL AUTO_INCREMENT,
  `nProCodigo` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  PRIMARY KEY (`idproducto_imag`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_img`
--

LOCK TABLES `producto_img` WRITE;
/*!40000 ALTER TABLE `producto_img` DISABLE KEYS */;
INSERT INTO `producto_img` VALUES (1,18,'foto_558502760cb6d.jpg'),(2,18,'foto_558502760cc13.jpg'),(3,18,'foto_558502760f62d.png');
/*!40000 ALTER TABLE `producto_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proforma`
--

DROP TABLE IF EXISTS `proforma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proforma` (
  `nProfCOdigo` int(11) NOT NULL AUTO_INCREMENT,
  `nProvCodigo` int(11) NOT NULL,
  `nProCodigo` int(11) NOT NULL,
  `cProfSerie` char(6) NOT NULL,
  `nCantidad` int(11) NOT NULL,
  PRIMARY KEY (`nProfCOdigo`),
  KEY `ProveedorFKProforma_idx` (`nProvCodigo`),
  KEY `ProductoFKProforma_idx` (`nProCodigo`),
  CONSTRAINT `ProductoFKProforma` FOREIGN KEY (`nProCodigo`) REFERENCES `producto` (`nProCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ProveedorFKProforma` FOREIGN KEY (`nProvCodigo`) REFERENCES `proveedor` (`nProvCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proforma`
--

LOCK TABLES `proforma` WRITE;
/*!40000 ALTER TABLE `proforma` DISABLE KEYS */;
INSERT INTO `proforma` VALUES (1,1,7,'F00001',10),(2,1,10,'F00001',10),(3,1,3,'F00002',10),(4,2,3,'F00003',5),(5,2,8,'F00003',3),(6,1,6,'F00004',2),(7,2,9,'F00005',3),(8,2,4,'F00006',3),(9,2,4,'F00007',5),(10,2,3,'F00008',3),(11,1,3,'F00009',10),(12,2,4,'F00010',5);
/*!40000 ALTER TABLE `proforma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `nProvCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `nrofax` varchar(20) DEFAULT '',
  `paginaweb` varchar(50) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `tipotelefono` int(11) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `estado` char(1) NOT NULL,
  `observacion` varchar(500) DEFAULT '',
  PRIMARY KEY (`nProvCodigo`),
  UNIQUE KEY `var_proveedor_ruc_UNIQUE` (`ruc`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'324234','Proveedor1','dssdfsdfsdf','dsfsdfdsf','sfsdfsdf','sdfdsfds',1,'dsfdsf','1',''),(2,'5555555','Computer Systems S.A','lsdfdsfsdfds',NULL,'www.dfgdfgdfgdfg.com','dsfdsf@hotmail.com',1,'554-435-345','1',''),(3,'10471972041','RAZON SOCIAL','SIN DIRECCION','32-234234','testtt','ricoru21@gmail.com',1,'044555555','1','testeeee'),(4,'11111111111','Jorge Benavidez S.A.C','Sin datos','','','ricoru21@live.com',1,'279035','1','Sin Datos'),(5,'1047197204','Richard','Sin Direccion','','www.clmdevelopers.com','ricoru21@gmail.com',3,'980031860','1','');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipodocumento`
--

DROP TABLE IF EXISTS `tipodocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipodocumento` (
  `nTipDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `cliente` varchar(150) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`nTipDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodocumento`
--

LOCK TABLES `tipodocumento` WRITE;
/*!40000 ALTER TABLE `tipodocumento` DISABLE KEYS */;
INSERT INTO `tipodocumento` VALUES (1,'NOTA VENTA','0001','0000000001',NULL,NULL,NULL),(2,'NOTA VENTA','0001','0000000002',NULL,NULL,NULL),(3,'NOTA VENTA','0001','0000000003',NULL,NULL,NULL),(4,'NOTA VENTA','0001','0000000004',NULL,NULL,NULL),(5,'NOTA VENTA','0001','0000000005',NULL,NULL,NULL),(6,'NOTA VENTA','0001','0000000006',NULL,NULL,NULL),(7,'NOTA VENTA','0001','0000000007',NULL,NULL,NULL),(8,'NOTA VENTA','0001','0000000008',NULL,NULL,NULL),(9,'NOTA VENTA','0001','0000000009',NULL,NULL,NULL),(10,'NOTA VENTA','0001','0000000010',NULL,NULL,NULL),(11,'NOTA VENTA','0001','0000000011',NULL,NULL,NULL),(12,'NOTA VENTA','0001','0000000012',NULL,NULL,NULL),(13,'NOTA VENTA','0001','0000000013',NULL,NULL,NULL),(14,'FACTURA','0001','0000000001',NULL,NULL,NULL),(15,'FACTURA','0001','0000000002',NULL,NULL,NULL),(16,'NOTA VENTA','0001','0000000016',NULL,NULL,NULL),(17,'NOTA VENTA','0001','0000000017',NULL,NULL,NULL),(18,'NOTA VENTA','0001','0000000018',NULL,NULL,NULL),(19,'NOTA VENTA','0001','0000000019',NULL,NULL,NULL),(20,'FACTURA','0001','0000000003',NULL,NULL,NULL),(21,'NOTA VENTA','0001','0000000020',NULL,NULL,NULL),(22,'BOLETA VENTA','0001','0000000001',NULL,NULL,NULL),(23,'NOTA VENTA','0001','0000000021',NULL,NULL,NULL),(24,'NOTA VENTA','0001','0000000022',NULL,NULL,NULL),(25,'BOLETA VENTA','0001','0000000002',NULL,NULL,NULL),(26,'FACTURA','0001','0000000004',NULL,NULL,NULL),(27,'0','0001','0000000001',NULL,NULL,NULL),(28,'0','0001','0000000001',NULL,NULL,NULL),(29,'BOLETA VENTA','0001','0000000003',NULL,NULL,NULL),(30,'FACTURA','0001','0000000005',NULL,NULL,NULL),(34,'NOTA VENTA','0001','00023','Juan Perez Alva','Av. Perú 1314','07513236'),(35,'NOTA VENTA','0001','00024','Juan Perez Alva','Av. Perú 1314','07513236'),(36,'NOTA VENTA','0001','00025','Richard Oruna','sin direccion','47198234'),(37,'BOLETA VENTA','0001','000004','Richard','fdsfdsfds','sdfsdfdsf'),(38,'NOTA VENTA','0001','00026','MIGUEL CARRAZCO','Sin Direcicon','45456798'),(39,'NOTA VENTA','0001','00027','sadsadasdas','sadsad','32444444'),(40,'NOTA VENTA','0001','00028','Test','Test','98765432'),(41,'NOTA VENTA','0001','00029','Francisco carrazo','Sin Direcicon','47197204'),(42,'NOTA VENTA','0001','00030','Francisco carrazo','Sin Direcicon','47197204'),(43,'NOTA VENTA','0001','00031','MIGUEL CARRAZCO','Sin Direcicon','45456798'),(44,'NOTA VENTA','0001','00032','Richard Oruna','sin direccion','47198234'),(45,'NOTA VENTA','0001','00033','Juan Perez Alva','Av. Perú 1314','07513236'),(46,'FACTURA','0001','000006','Juan Perez Alva','Av. Perú 1314','07513236'),(47,'NOTA VENTA','0001','00034','Desarrollador','asdasdasdsa','98888222'),(48,'NOTA VENTA','0001','00035','Richard Oruna','sin direccion','47198234'),(49,'FACTURA','0001','000007','Testiador','Test2','98745366'),(50,'NOTA VENTA','0001','00036','MIGUEL CARRAZCO','Sin Direcicon','45456798'),(51,'FACTURA','0001','000008','Juan Perez Alva','Av. Perú 1314','10075132366'),(52,'FACTURA','0001','000009','Juan Perez Alva','Av. Perú 1314','10075132366'),(53,'FACTURA','0001','000010','Juan Perez Alva','Av. Perú 1314','10075132366'),(54,'FACTURA','0001','000011','Juan Perez Alva','Av. Perú 1314','10075132366'),(55,'FACTURA','0001','000012','Juan Perez Alva','Av. Perú 1314','10075132366'),(56,'FACTURA','0001','000013','tyjuytrut','fdgdfg','13123'),(57,'BOLETA VENTA','0001','000005','Juan Perez Alva','Av. Perú 1314','07513236'),(58,'BOLETA VENTA','0001','000006','Danyck','Sin Direccion','99999999');
/*!40000 ALTER TABLE `tipodocumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccion`
--

DROP TABLE IF EXISTS `transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaccion` (
  `nVenCodigo` int(11) NOT NULL,
  `nProCodigo` int(11) NOT NULL,
  `nTraCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `preciounitario` decimal(18,2) NOT NULL DEFAULT '0.00',
  `cantidad` decimal(18,2) NOT NULL DEFAULT '0.00',
  `importe` decimal(18,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`nTraCodigo`),
  KEY `R_9` (`nVenCodigo`),
  KEY `R_10` (`nProCodigo`),
  CONSTRAINT `transaccion_ibfk_1` FOREIGN KEY (`nVenCodigo`) REFERENCES `venta` (`nVenCodigo`),
  CONSTRAINT `transaccion_ibfk_2` FOREIGN KEY (`nProCodigo`) REFERENCES `producto` (`nProCodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccion`
--

LOCK TABLES `transaccion` WRITE;
/*!40000 ALTER TABLE `transaccion` DISABLE KEYS */;
INSERT INTO `transaccion` VALUES (1,1,1,60.00,30.00,1800.00),(1,2,2,60.00,10.00,600.00),(2,1,3,60.00,30.00,1800.00),(2,2,4,60.00,10.00,600.00),(3,1,5,60.00,30.00,1800.00),(3,2,6,60.00,10.00,600.00),(4,1,7,60.00,20.00,1200.00),(4,2,8,60.00,10.00,600.00),(5,1,9,60.00,10.00,600.00),(5,2,10,60.00,5.00,300.00),(6,1,11,60.00,10.00,600.00),(6,2,12,60.00,10.00,600.00),(7,2,13,60.00,10.00,600.00),(7,1,14,60.00,10.00,600.00),(8,1,15,60.00,10.00,600.00),(8,2,16,60.00,10.00,600.00),(9,1,17,60.00,10.00,600.00),(9,2,18,60.00,10.00,600.00),(10,1,19,60.00,10.00,600.00),(10,2,20,60.00,10.00,600.00),(11,1,21,60.00,10.00,600.00),(11,2,22,60.00,10.00,600.00),(12,2,23,60.00,10.00,600.00),(12,1,24,60.00,10.00,600.00),(13,2,25,60.00,10.00,600.00),(13,1,26,60.00,20.00,1200.00),(14,8,27,12.00,10.00,120.00),(14,7,28,20.60,5.00,103.00),(15,7,29,20.60,3.00,62.00),(20,3,30,5.00,20.00,100.00),(21,8,31,5.00,12.00,60.00),(22,11,32,6.00,47.50,285.00),(23,10,33,3.00,15.13,45.39),(24,11,34,5.00,47.50,237.50),(29,3,39,5.00,20.00,100.00),(31,3,41,2.00,20.00,40.00),(32,3,42,3.00,20.00,60.00),(33,6,43,2.00,5.20,10.40),(34,7,44,2.00,12.85,25.70),(35,12,45,50.00,800.00,40000.00),(35,8,46,2.00,8.13,16.26),(36,12,47,30.00,800.00,24000.00),(36,6,48,5.00,5.20,26.00),(37,3,49,2.00,20.00,40.00),(38,3,50,2.00,20.00,40.00),(39,4,51,2.00,20.00,40.00),(41,9,52,5.25,1.00,5.25),(41,11,53,47.50,1.00,47.50),(41,6,54,5.20,1.00,5.20),(41,2,55,60.00,1.00,60.00),(41,10,56,15.22,1.00,15.22),(42,9,57,5.25,1.00,5.25),(42,11,58,47.50,1.00,47.50),(42,6,59,5.20,1.00,5.20),(42,2,60,60.00,1.00,60.00),(42,10,61,15.22,1.00,15.22),(43,2,62,60.00,1.00,60.00),(43,1,63,60.00,1.00,60.00),(44,9,64,5.25,1.00,5.25),(44,12,65,800.00,1.00,800.00),(45,1,66,60.00,1.00,60.00),(45,11,67,47.50,1.00,47.50),(46,1,68,60.00,1.00,60.00),(46,10,69,15.22,1.00,15.22),(47,2,70,60.00,1.00,60.00),(47,4,71,20.00,1.00,20.00),(48,8,72,8.13,10.00,81.30),(48,9,73,5.25,5.00,26.25),(49,8,74,8.13,10.00,81.30),(49,9,75,5.25,5.00,26.25),(50,8,76,8.13,5.00,40.65),(51,9,77,5.25,5.00,26.25),(52,2,78,60.00,2.00,120.00),(53,17,79,120.00,2.00,240.00),(53,8,80,8.13,2.00,16.26),(54,12,81,800.00,1.00,800.00),(55,12,82,800.00,1.00,800.00),(56,8,83,8.13,1.00,8.13),(57,1,84,80.00,1.00,80.00),(58,15,85,120.00,10.00,1200.00),(59,2,86,60.00,1.00,60.00),(60,14,87,40.00,1.00,40.00),(61,8,88,8.13,1.00,8.13),(62,4,89,20.00,1.00,20.00),(63,8,90,8.13,1.00,8.13),(64,17,91,120.00,4.00,480.00),(65,15,92,120.00,4.00,480.00);
/*!40000 ALTER TABLE `transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `nUsuCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(18) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `nPerCodigo` int(11) DEFAULT '0',
  `estado` char(1) NOT NULL DEFAULT '1',
  `cargo` int(11) NOT NULL DEFAULT '0',
  `email` varchar(150) DEFAULT '',
  `tipo` tinyint(1) DEFAULT '1' COMMENT 'si es 1 es administrativo, si es 2 es ecommers',
  PRIMARY KEY (`nUsuCodigo`),
  KEY `R_23` (`nPerCodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ADMINISTRADOR','7c222fb2927d828af22f592134e8932480637c0d',1,'1',1,'',1),(2,'VENDEDOR','7c222fb2927d828af22f592134e8932480637c0d',2,'1',2,'',1),(3,'demo1','7c222fb2927d828af22f592134e8932480637c0d',3,'1',2,'',1),(4,'TestVenta','7c222fb2927d828af22f592134e8932480637c0d',4,'1',2,'',1),(5,'testeador','7c222fb2927d828af22f592134e8932480637c0d',4,'1',2,'',1),(6,'SECRETARIO','25d55ad283aa400af464c76d713c07ad',4,'0',1,'',1),(7,'Demo','7c222fb2927d828af22f592134e8932480637c0d',4,'1',2,'',1),(8,'Reportero2','7c222fb2927d828af22f592134e8932480637c0d',3,'1',2,'',1),(10,'RichardO','7c222fb2927d828af22f592134e8932480637c0d',0,'1',0,'ricoru21@gmail.com',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_consulta_estadocuenta_venta`
--

DROP TABLE IF EXISTS `v_consulta_estadocuenta_venta`;
/*!50001 DROP VIEW IF EXISTS `v_consulta_estadocuenta_venta`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_consulta_estadocuenta_venta` (
  `nVenCodigo` tinyint NOT NULL,
  `Cliente_Id` tinyint NOT NULL,
  `cliente` tinyint NOT NULL,
  `vendedor` tinyint NOT NULL,
  `fechaemision` tinyint NOT NULL,
  `montoTotal` tinyint NOT NULL,
  `MontoCancelado` tinyint NOT NULL,
  `SaldoPendiente` tinyint NOT NULL,
  `NroVenta` tinyint NOT NULL,
  `TipoDocumento` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `id_tipopago` tinyint NOT NULL,
  `tipopago` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_generar_sn_venta`
--

DROP TABLE IF EXISTS `v_generar_sn_venta`;
/*!50001 DROP VIEW IF EXISTS `v_generar_sn_venta`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_generar_sn_venta` (
  `SERIE` tinyint NOT NULL,
  `NUMERO` tinyint NOT NULL,
  `Documento` tinyint NOT NULL,
  `id_documento` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `nVenCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `nCliCodigo` int(11) NOT NULL,
  `nPerCodigo` int(11) NOT NULL,
  `fecregistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `montoTotal` decimal(18,2) NOT NULL,
  `nTipDocumento` int(11) NOT NULL,
  `estado` char(1) NOT NULL COMMENT 'estado 2: anulado',
  `formaPago` int(11) NOT NULL,
  `local` int(11) NOT NULL DEFAULT '0',
  `impuestoporcentaje` decimal(4,1) NOT NULL,
  `subTotal` decimal(18,2) NOT NULL,
  PRIMARY KEY (`nVenCodigo`),
  KEY `venta_personal_idx` (`nPerCodigo`),
  KEY `venta_tipodocumento_idx` (`nTipDocumento`),
  CONSTRAINT `ventafkpersonal` FOREIGN KEY (`nPerCodigo`) REFERENCES `personal` (`nPerCodigo`),
  CONSTRAINT `ventafktipodocumnto` FOREIGN KEY (`nTipDocumento`) REFERENCES `tipodocumento` (`nTipDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1,1,1,'2011-11-17 05:00:00',4200.00,4,'1',1,1,18.0,0.00),(2,1,1,'2011-11-20 05:00:00',4200.00,5,'2',2,1,18.0,0.00),(3,1,1,'2011-11-20 05:00:00',4200.00,6,'1',2,1,18.0,0.00),(4,1,1,'2011-11-27 05:00:00',3000.00,7,'2',1,1,18.0,0.00),(5,1,1,'2011-11-27 05:00:00',1500.00,8,'1',1,1,18.0,0.00),(6,1,1,'2011-11-28 05:00:00',1200.00,9,'1',2,1,18.0,0.00),(7,1,1,'2011-11-28 05:00:00',1200.00,10,'2',1,1,18.0,0.00),(8,2,1,'2011-11-28 05:00:00',1200.00,11,'2',2,1,18.0,0.00),(9,2,1,'2011-11-28 05:00:00',1200.00,12,'1',1,1,18.0,0.00),(10,1,1,'2011-11-28 05:00:00',1200.00,13,'2',2,1,18.0,0.00),(11,1,1,'2011-11-28 05:00:00',1542.00,14,'2',2,1,18.0,0.00),(12,1,1,'2011-11-28 05:00:00',1542.00,15,'1',2,1,18.0,0.00),(13,4,1,'2011-12-08 05:00:00',1800.00,17,'2',1,1,18.0,0.00),(14,3,1,'2013-05-05 05:00:00',223.00,19,'1',1,1,18.0,0.00),(15,6,1,'2013-09-06 05:00:00',73.78,20,'1',1,1,18.0,0.00),(18,9,1,'2013-09-29 05:00:00',100.00,3,'1',1,1,18.0,0.00),(19,9,1,'2013-09-29 05:00:00',100.00,3,'1',1,1,18.0,0.00),(20,14,1,'2013-09-29 05:00:00',100.00,1,'1',1,1,18.0,0.00),(21,14,1,'2013-09-29 05:00:00',60.00,1,'1',1,1,18.0,0.00),(22,18,1,'2013-09-29 05:00:00',285.00,1,'1',1,1,18.0,0.00),(23,14,1,'2013-09-29 05:00:00',45.39,2,'1',1,1,18.0,0.00),(24,21,1,'2013-09-29 17:07:25',237.50,2,'1',1,1,18.0,0.00),(29,14,1,'2013-10-04 07:43:10',100.00,2,'1',1,1,18.0,0.00),(31,13,1,'2013-10-04 07:51:51',40.00,2,'1',1,1,18.0,0.00),(32,16,1,'2013-10-08 11:47:08',60.00,23,'2',2,1,18.0,0.00),(33,16,1,'2014-10-02 22:22:56',10.40,24,'1',1,1,18.0,0.00),(34,15,1,'2014-10-02 23:27:59',25.70,25,'1',1,1,18.0,0.00),(35,14,1,'2014-11-19 10:30:55',40016.26,26,'1',1,1,18.0,0.00),(36,14,1,'2014-11-19 10:59:20',24026.00,27,'1',2,1,18.0,0.00),(37,14,1,'2014-11-22 05:49:56',40.00,28,'1',2,1,18.0,0.00),(38,24,1,'2014-12-03 21:38:13',40.00,29,'2',1,1,18.0,0.00),(39,16,1,'2014-12-03 23:42:30',40.00,30,'1',1,1,18.0,0.00),(41,26,1,'2015-03-07 17:00:30',133.17,34,'1',1,1,18.0,0.00),(42,26,1,'2015-03-07 17:16:56',133.17,35,'1',1,1,18.0,0.00),(43,27,1,'2015-03-09 03:34:54',120.00,36,'1',1,1,18.0,0.00),(44,1,1,'2015-03-09 03:44:58',805.25,37,'1',1,1,18.0,0.00),(45,13,1,'2015-03-09 03:46:17',107.50,38,'1',1,1,18.0,0.00),(46,25,1,'2015-03-09 04:00:16',75.22,39,'1',1,1,18.0,0.00),(47,17,1,'2015-03-09 04:27:52',80.00,40,'1',1,1,18.0,0.00),(48,15,1,'2015-04-25 04:55:09',107.55,41,'1',1,1,16.5,89.80),(49,15,1,'2015-04-25 04:56:09',107.55,42,'1',1,1,16.5,89.80),(50,13,1,'2015-04-25 05:00:30',40.65,43,'1',1,1,16.5,33.94),(51,27,1,'2015-05-04 21:39:00',26.25,44,'1',1,1,16.5,21.92),(52,26,1,'2015-05-08 02:52:01',120.00,45,'1',1,1,16.5,100.20),(53,26,3,'2015-08-26 13:10:39',256.26,46,'1',1,1,18.0,210.13),(54,20,3,'2015-08-26 13:12:21',800.00,47,'1',1,1,18.0,656.00),(55,27,3,'2015-08-26 13:14:34',800.00,48,'1',1,1,18.0,656.00),(56,19,3,'2015-08-26 13:18:32',8.13,49,'1',1,1,18.0,6.67),(57,13,3,'2015-08-26 13:39:02',80.00,50,'1',1,1,18.0,65.60),(58,26,3,'2015-08-28 05:10:57',1200.00,51,'1',1,1,18.0,984.00),(59,26,3,'2015-08-28 05:14:28',60.00,52,'1',1,1,18.0,49.20),(60,26,3,'2015-08-28 05:15:19',40.00,53,'1',1,1,18.0,32.80),(61,26,3,'2015-08-28 05:17:26',8.13,54,'1',1,1,18.0,6.67),(62,26,3,'2015-08-28 05:18:34',20.00,55,'1',1,1,18.0,16.40),(63,2,3,'2015-08-28 05:19:45',8.13,56,'1',1,1,18.0,6.67),(64,26,3,'2015-08-29 20:33:06',480.00,57,'1',1,1,18.0,393.60),(65,24,3,'2015-08-29 22:34:47',480.00,58,'1',1,1,18.0,393.60);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta_anular`
--

DROP TABLE IF EXISTS `venta_anular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta_anular` (
  `nVenAnularCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `nVenCodigo` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `nUsuCodigo` int(11) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nVenAnularCodigo`),
  KEY `VentaFKVenta_Anular_idx` (`nVenCodigo`),
  KEY `UsuarioFKVenta_Anular_idx` (`nUsuCodigo`),
  CONSTRAINT `UsuarioFKVenta_Anular` FOREIGN KEY (`nUsuCodigo`) REFERENCES `usuario` (`nUsuCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `VentaFKVenta_Anular` FOREIGN KEY (`nVenCodigo`) REFERENCES `venta` (`nVenCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_anular`
--

LOCK TABLES `venta_anular` WRITE;
/*!40000 ALTER TABLE `venta_anular` DISABLE KEYS */;
INSERT INTO `venta_anular` VALUES (1,38,'Anulada por Testeo',1,'2014-12-03 16:32:29'),(2,13,'Venta Anulada',1,'2015-04-04 05:04:56'),(3,10,'Venta Anulada',1,'2015-04-04 05:06:20'),(4,10,'Venta Anulada',1,'2015-04-04 05:06:20');
/*!40000 ALTER TABLE `venta_anular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'miniventa'
--

--
-- Dumping routines for database 'miniventa'
--

--
-- Final view structure for view `v_consulta_estadocuenta_venta`
--

/*!50001 DROP TABLE IF EXISTS `v_consulta_estadocuenta_venta`*/;
/*!50001 DROP VIEW IF EXISTS `v_consulta_estadocuenta_venta`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_consulta_estadocuenta_venta` AS (select `v`.`nVenCodigo` AS `nVenCodigo`,`c`.`nCliCodigo` AS `Cliente_Id`,`c`.`nombre` AS `cliente`,`p`.`nombre` AS `vendedor`,cast(`v`.`fecregistro` as date) AS `fechaemision`,`v`.`montoTotal` AS `montoTotal`,ifnull((case when (`v`.`formaPago` = 1) then ifnull((select `contado`.`montopagado` from `contado` where (`contado`.`nVenCodigo` = `v`.`nVenCodigo`)),0.00) else ifnull((select sum(`cp`.`pagorecibido`) from `cronogramapago` `cp` where (`cp`.`nVenCodigo` = `v`.`nVenCodigo`)),0.00) end),0.00) AS `MontoCancelado`,ifnull((`v`.`montoTotal` - (case when (`v`.`formaPago` = 1) then ifnull((select `contado`.`montopagado` from `contado` where (`contado`.`nVenCodigo` = `v`.`nVenCodigo`)),0.00) else ifnull((select sum(`cp`.`pagorecibido`) from `cronogramapago` `cp` where (`cp`.`nVenCodigo` = `v`.`nVenCodigo`)),0.00) end)),0.00) AS `SaldoPendiente`,concat(`d`.`serie`,'-',`d`.`numero`) AS `NroVenta`,`d`.`descripcion` AS `TipoDocumento`,ifnull((case when (`v`.`formaPago` = 1) then 'PagoCancelado' else (select `cd`.`estado` from `credito` `cd` where (`cd`.`nVenCodigo` = `v`.`nVenCodigo`)) end),'') AS `estado`,`v`.`formaPago` AS `id_tipopago`,`ct`.`descripcion` AS `tipopago` from ((((`venta` `v` join `cliente` `c` on((`c`.`nCliCodigo` = `v`.`nCliCodigo`))) join `tipodocumento` `d` on((`d`.`nTipDocumento` = `v`.`nTipDocumento`))) join `personal` `p` on((`p`.`nPerCodigo` = `v`.`nPerCodigo`))) join `constante` `ct` on(((`ct`.`valor` = `v`.`formaPago`) and (`ct`.`clase` = 3))))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_generar_sn_venta`
--

/*!50001 DROP TABLE IF EXISTS `v_generar_sn_venta`*/;
/*!50001 DROP VIEW IF EXISTS `v_generar_sn_venta`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_generar_sn_venta` AS (select (case when (`tipodocumento`.`numero` = '9999999999') then convert(right(concat('0000',(ifnull(`tipodocumento`.`serie`,0) + 1)),4) using latin1) when (ifnull(`tipodocumento`.`serie`,0) = 0) then convert(right(concat('0000',1),4) using latin1) else `tipodocumento`.`serie` end) AS `SERIE`,(case when (`tipodocumento`.`numero` = '9999999999') then right(concat((`tipodocumento`.`numero` + 2)),10) else right(concat('0000000000',(`tipodocumento`.`numero` + 1)),10) end) AS `NUMERO`,`tipodocumento`.`descripcion` AS `Documento`,(select `c`.`valor` from `constante` `c` where (`c`.`descripcion` = `tipodocumento`.`descripcion`)) AS `id_documento` from `tipodocumento` order by `tipodocumento`.`serie`,`tipodocumento`.`numero` desc limit 0,1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-24 17:06:43

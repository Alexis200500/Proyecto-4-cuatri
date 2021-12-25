/*
SQLyog Trial v13.1.8 (64 bit)
MySQL - 10.4.22-MariaDB : Database - al
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`al` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `al`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `idad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido2` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ide` int(10) unsigned NOT NULL,
  `idpue` int(10) unsigned NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contraseña` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `archivo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idad`),
  KEY `admins_ide_foreign` (`ide`),
  KEY `admins_idpue_foreign` (`idpue`),
  CONSTRAINT `admins_ide_foreign` FOREIGN KEY (`ide`) REFERENCES `estados` (`ide`),
  CONSTRAINT `admins_idpue_foreign` FOREIGN KEY (`idpue`) REFERENCES `puestos` (`idpue`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`idad`,`nombre`,`apellido1`,`apellido2`,`edad`,`sexo`,`telefono`,`direccion`,`ide`,`idpue`,`email`,`contraseña`,`remember_token`,`created_at`,`updated_at`,`archivo`,`activo`) values 
(1,'Alexis','Morales','Gómez',21,'M','1234567890','Fe',1,1,'erik@gmail.com','12345',NULL,NULL,'2021-12-25 19:14:19','20211225_191419_spiderchica.jpg','Si'),
(2,'Erik','Morales','Gómez',19,'M','1234567890','Fe',1,1,'erik@gmail.com','12345',NULL,'2021-12-25 19:21:21','2021-12-25 19:21:21','sinfoto.jpg','Si');

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `idca` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idca`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categorias` */

insert  into `categorias`(`idca`,`categoria`,`activo`,`created_at`,`updated_at`) values 
(1,'Vasos','Si',NULL,NULL),
(2,'Muebles','Si','2021-12-25 19:29:04','2021-12-25 19:29:04');

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `idcl` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido2` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ide` int(10) unsigned NOT NULL,
  `archivo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contraseña` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idcl`),
  KEY `clientes_ide_foreign` (`ide`),
  CONSTRAINT `clientes_ide_foreign` FOREIGN KEY (`ide`) REFERENCES `estados` (`ide`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clientes` */

insert  into `clientes`(`idcl`,`nombre`,`apellido1`,`apellido2`,`edad`,`sexo`,`telefono`,`direccion`,`ide`,`archivo`,`activo`,`email`,`contraseña`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Alexis','Morales','Gómez',21,'M','1234567890','Fe',1,'20211225_191509_spider.jpg','Si','erik@gmail.com','12345',NULL,NULL,'2021-12-25 19:15:09'),
(2,'Erik','Morales','Gómez',19,'M','1234567890','Fe',1,'sinfoto.jpg','Si','erik@gmail.com','12345',NULL,'2021-12-25 19:26:24','2021-12-25 19:26:24');

/*Table structure for table `colores` */

DROP TABLE IF EXISTS `colores`;

CREATE TABLE `colores` (
  `idcolor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idcolor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `colores` */

insert  into `colores`(`idcolor`,`color`,`activo`,`updated_at`,`created_at`) values 
(1,'Azul','Si',NULL,NULL),
(2,'Gris','Si','2021-12-25 19:19:20','2021-12-25 19:19:20'),
(3,'Verde','Si','2021-12-25 19:28:15','2021-12-25 19:28:15');

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `ide` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ide`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `estados` */

insert  into `estados`(`ide`,`estado`) values 
(1,'México');

/*Table structure for table `eventos` */

DROP TABLE IF EXISTS `eventos`;

CREATE TABLE `eventos` (
  `idev` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcl` int(10) unsigned NOT NULL,
  `idte` int(10) unsigned NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ide` int(10) unsigned NOT NULL,
  `fechaevento` datetime NOT NULL,
  `costo` int(11) NOT NULL,
  `cantpersona` int(11) NOT NULL,
  `idad` int(10) unsigned NOT NULL,
  `activo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idev`),
  KEY `eventos_idcl_foreign` (`idcl`),
  KEY `eventos_idte_foreign` (`idte`),
  KEY `eventos_ide_foreign` (`ide`),
  KEY `eventos_idad_foreign` (`idad`),
  CONSTRAINT `eventos_idad_foreign` FOREIGN KEY (`idad`) REFERENCES `admins` (`idad`),
  CONSTRAINT `eventos_idcl_foreign` FOREIGN KEY (`idcl`) REFERENCES `clientes` (`idcl`),
  CONSTRAINT `eventos_ide_foreign` FOREIGN KEY (`ide`) REFERENCES `estados` (`ide`),
  CONSTRAINT `eventos_idte_foreign` FOREIGN KEY (`idte`) REFERENCES `tipoeventos` (`idte`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `eventos` */

insert  into `eventos`(`idev`,`idcl`,`idte`,`direccion`,`ide`,`fechaevento`,`costo`,`cantpersona`,`idad`,`activo`,`remember_token`,`created_at`,`updated_at`) values 
(1,1,1,'Fe',1,'2021-12-12 00:00:00',4567,21,1,'Si',NULL,NULL,'2021-12-25 19:16:45'),
(2,1,1,'Fe',1,'2021-12-25 00:00:00',4567,21,1,'Si',NULL,'2021-12-25 19:26:50','2021-12-25 19:26:50');

/*Table structure for table `materiales` */

DROP TABLE IF EXISTS `materiales`;

CREATE TABLE `materiales` (
  `idm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `material` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `materiales` */

insert  into `materiales`(`idm`,`material`,`activo`,`created_at`,`updated_at`) values 
(1,'Plastico','Si',NULL,NULL),
(2,'Fierro','Si','2021-12-25 19:29:40','2021-12-25 19:29:40');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `idpr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idca` int(10) unsigned NOT NULL,
  `idm` int(10) unsigned NOT NULL,
  `idr` int(10) unsigned NOT NULL,
  `idcolor` int(10) unsigned NOT NULL,
  `costo` int(11) NOT NULL,
  `archivo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idpr`),
  KEY `productos_idca_foreign` (`idca`),
  KEY `productos_idm_foreign` (`idm`),
  KEY `productos_idr_foreign` (`idr`),
  KEY `productos_idcolor_foreign` (`idcolor`),
  CONSTRAINT `productos_idca_foreign` FOREIGN KEY (`idca`) REFERENCES `categorias` (`idca`),
  CONSTRAINT `productos_idcolor_foreign` FOREIGN KEY (`idcolor`) REFERENCES `colores` (`idcolor`),
  CONSTRAINT `productos_idm_foreign` FOREIGN KEY (`idm`) REFERENCES `materiales` (`idm`),
  CONSTRAINT `productos_idr_foreign` FOREIGN KEY (`idr`) REFERENCES `rentas` (`idr`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `productos` */

insert  into `productos`(`idpr`,`producto`,`idca`,`idm`,`idr`,`idcolor`,`costo`,`archivo`,`activo`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Vasos desechables',1,1,1,1,12,'20211225_191808_20211225_191509_spider.jpg','Si',NULL,NULL,'2021-12-25 19:18:08'),
(2,'Vasos desechables',1,1,1,1,12,'sinfoto.jpg','Si',NULL,'2021-12-25 19:28:04','2021-12-25 19:28:04');

/*Table structure for table `puestos` */

DROP TABLE IF EXISTS `puestos`;

CREATE TABLE `puestos` (
  `idpue` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `puesto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idpue`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `puestos` */

insert  into `puestos`(`idpue`,`puesto`) values 
(1,'Dueño');

/*Table structure for table `rentas` */

DROP TABLE IF EXISTS `rentas`;

CREATE TABLE `rentas` (
  `idr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcl` int(10) unsigned NOT NULL,
  `idev` int(10) unsigned NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ide` int(10) unsigned NOT NULL,
  `fecharentar` datetime NOT NULL,
  `costo` int(11) NOT NULL,
  `cantpersona` int(11) NOT NULL,
  `activo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idr`),
  KEY `rentas_idcl_foreign` (`idcl`),
  KEY `rentas_idev_foreign` (`idev`),
  KEY `rentas_ide_foreign` (`ide`),
  CONSTRAINT `rentas_idcl_foreign` FOREIGN KEY (`idcl`) REFERENCES `clientes` (`idcl`),
  CONSTRAINT `rentas_ide_foreign` FOREIGN KEY (`ide`) REFERENCES `estados` (`ide`),
  CONSTRAINT `rentas_idev_foreign` FOREIGN KEY (`idev`) REFERENCES `eventos` (`idev`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rentas` */

insert  into `rentas`(`idr`,`idcl`,`idev`,`direccion`,`ide`,`fecharentar`,`costo`,`cantpersona`,`activo`,`remember_token`,`created_at`,`updated_at`) values 
(1,1,1,'',1,'0000-00-00 00:00:00',0,0,NULL,NULL,NULL,NULL),
(2,1,1,'Fe',1,'2021-12-25 00:00:00',4567,21,'Si',NULL,'2021-12-25 19:27:46','2021-12-25 19:27:46');

/*Table structure for table `tipoeventos` */

DROP TABLE IF EXISTS `tipoeventos`;

CREATE TABLE `tipoeventos` (
  `idte` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idte`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipoeventos` */

insert  into `tipoeventos`(`idte`,`evento`) values 
(1,'XV años');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idu` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `archivo` text DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

insert  into `usuarios`(`idu`,`nombre`,`apellido`,`tipo`,`correo`,`password`,`archivo`,`activo`,`created_at`,`deleted_at`) values 
(1,'Alexis','Morales','Administrador','al221811729@gmail.com','12345','spider.jpg','si',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

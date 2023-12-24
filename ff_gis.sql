/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 8.0.35 : Database - ff_gis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ff_gis` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;

/*Table structure for table `flora_fauna_ledger_entries` */

DROP TABLE IF EXISTS `flora_fauna_ledger_entries`;

CREATE TABLE `flora_fauna_ledger_entries` (
  `uuid` char(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `latitude` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `longitude` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Data Ledger Entries';

/*Data for the table `flora_fauna_ledger_entries` */

insert  into `flora_fauna_ledger_entries`(`uuid`,`type`,`name`,`description`,`latitude`,`longitude`,`icon`,`image`,`createdAt`,`updatedAt`) values 
('43f407be-c9c5-49a3-b5e1-b0a5075a7151','Flora','Kaktus','test','-6.9299414','107.6129714','http://localhost/ff-gis/assets/upload/icon/22332cactus_98788.ico','http://localhost/ff-gis/assets/upload/image/animals/kaktus.jpg','2023-12-24 11:03:37',NULL),
('53274be5-dfea-4b3b-9675-d45e05d60106','Fauna','Elang Jawa','Testing','-6.931065','107.6132021','http://localhost/ff-gis/assets/upload/icon/animals_eagle_1733.ico','http://localhost/ff-gis/assets/upload/image/animals/animals_eagle_17331.png','2023-12-24 11:00:21',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `isAdmin` double DEFAULT '0' COMMENT '0 = Guest, 1 = Administrator',
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`uuid`,`name`,`username`,`password`,`isAdmin`,`createdAt`,`updatedAt`) values 
('991e8675-96b6-4e0d-85f4-c3aac82af5ee','Ady Shaputra','adyshaputra@gmail.com','$2y$10$pOpp8/ALs7uvL1AFP3qzJegBJCMr70eL/LCJRRH6u89im0Gzcb2Im',1,'2023-12-23 17:55:09','2023-12-24 00:04:09'),
('e8a5e7f5-3ad0-4514-b8c2-0de30913afed','Jhon Doe','jhon@gmail.com','$2y$10$dbfY2oRA7cryMdy6aHS/TeePTxzY1mZfqgtSsj5n/MAuVv5GLbo1u',0,'2023-12-23 17:55:46','2023-12-24 00:04:18');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

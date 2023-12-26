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

/*Table structure for table `fauna` */

DROP TABLE IF EXISTS `fauna`;

CREATE TABLE `fauna` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `description_detail` text,
  `class` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longtitude` varchar(100) DEFAULT NULL,
  `conservation_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `conservation_at` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `conservation_date` date DEFAULT NULL,
  `status_iucn` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Dilindungi, Tidak Dilindungi, Least Concern, Near Threatned, Vulnerable',
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna` */

insert  into `fauna`(`uuid`,`name`,`description`,`description_detail`,`class`,`location`,`latitude`,`longtitude`,`conservation_type`,`conservation_at`,`conservation_date`,`status_iucn`,`icon`,`image`,`createdAt`,`updatedAt`) values 
('fcc62a4e-6159-4843-952d-c9068667e2c0','Elang Jawa','Elang adalah salah satu dari jenis burung predator yang terdapat di seluruh Indonesia. Dalam Bahasa inggris, eagle atau elang merujuk pada burung pemangsa berukuran besar dari suku Accipitridae terutama genus Aquila','Elang adalah hewan berdarah panas, mempunyai sayap dan tubuh yang diselubungi bulu pelepah. Sebagai burung, elang berkembang biak dengan cara bertelur yang mempunyai cangkang keras di dalam sarang yang dibuatnya. Ia menjaga anaknya sampai mampu terbang.\r\n\r\nElang merupakan hewan pemangsa. Makanan utamanya hewan mamalia kecil seperti tikus, tupai, kadal, ikan dan ayam, juga jenis-jenis serangga tergantung ukuran tubuhnya. Terdapat sebagian elang yang menangkap ikan sebagai makanan utama mereka.Biasanya elang tersebut tinggal di wilayah perairan. Paruh elang tidak bergigi tetapi melengkung dan kuat untuk mengoyak daging mangsanya. Burung ini juga mempunyai sepasang kaki yang kuat dan cakar yang tajam dan melengkung untuk mencengkeram mangsa serta daya penglihatan yang tajam untuk mendeteksi mangsa dari jarak jauh.\r\n\r\nElang mempunyai sistem pernapasan yang baik dan mampu untuk menyimpan jumlah oksigen yang banyak yang diperlukan ketika terbang. Jantung burung elang terdiri dari empat bilik seperti manusia. Bilik atas dikenal sebagai atrium, sementara bilik bawah dikenali sebagai ventrikel.','Aves','Taman Nasional Gunung Gede Pangrango','-6.7877777','106.9819444','Cagar Alam','Taman Nasional Gunung Gede Pangrango','2000-12-18','Dilindungi','http://localhost/ff-gis/assets/upload/icon/animals_eagle_17331.ico','http://localhost/ff-gis/assets/upload/image/animals/animals_eagle_17333.png','2023-12-25 11:42:15',NULL);

/*Table structure for table `fauna_population` */

DROP TABLE IF EXISTS `fauna_population`;

CREATE TABLE `fauna_population` (
  `uuid` char(36) NOT NULL,
  `fauna_uuid` char(36) DEFAULT NULL,
  `year` year DEFAULT NULL,
  `population` double DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna_population` */

insert  into `fauna_population`(`uuid`,`fauna_uuid`,`year`,`population`) values 
('40ccbbab-45dd-4e37-92f9-e24440463364','fcc62a4e-6159-4843-952d-c9068667e2c0',2022,10),
('52d1187c-549a-4b92-93e0-4d1a85a21585','fcc62a4e-6159-4843-952d-c9068667e2c0',2021,-40),
('73d7004c-6378-42d8-9ab5-bb3c709f36ff','fcc62a4e-6159-4843-952d-c9068667e2c0',2020,130);

/*Table structure for table `flora` */

DROP TABLE IF EXISTS `flora`;

CREATE TABLE `flora` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `description_detail` text,
  `class` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longtitude` varchar(100) DEFAULT NULL,
  `conservation_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `conservation_at` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `conservation_date` date DEFAULT NULL,
  `status_iucn` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Dilindungi, Tidak Dilindungi, Least Concern, Near Threatned, Vulnerable',
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora` */

insert  into `flora`(`uuid`,`name`,`description`,`description_detail`,`class`,`location`,`latitude`,`longtitude`,`conservation_type`,`conservation_at`,`conservation_date`,`status_iucn`,`icon`,`image`,`createdAt`,`updatedAt`) values 
('ae016228-4e72-499c-9c62-0700010d142d','Bunga Adelweis','Bunga Edelweis (anaphalis javanica) yang juga memiliki nama lain senduro, merupkan tumbuhan yang ada di zona alpina di setiap pegunugan di Indonesia.','Tinggi tanaman ini bisa mencapai 8 meter dengan batang sebesar kaki manusia  dan masuk ke dalam tumbuhan langka.\r\n\r\nBunga edelweis bermekaran pada bulan April hingga Agustus. Pada tahun 1988, sebanyak 636 batang bunga edelweis dibawa oleh pegunjung dari Taman Nasional Gunung Gede Pangrango (salah satu tempat perlindungan terakhir edelweis).\r\n\r\nSaat ini, setiap pendaki yang ketahuan memetik dan membawa bunga edelweis akan dikenakan hukuman dan denda','Asiatis','Perhutani Office Kawah Putih','-7.142071','107.3951733','Cagar Alam','Perhutani Office Kawah Putih','2023-12-25','Dilindungi','http://localhost/ff-gis/assets/upload/icon/flowersilhouette_89141.ico','http://localhost/ff-gis/assets/upload/image/animals/edelweis.jpg','2023-12-25 22:15:30',NULL);

/*Table structure for table `flora_population` */

DROP TABLE IF EXISTS `flora_population`;

CREATE TABLE `flora_population` (
  `uuid` char(36) NOT NULL,
  `flora_uuid` char(36) DEFAULT NULL,
  `year` year DEFAULT NULL,
  `population` double DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora_population` */

insert  into `flora_population`(`uuid`,`flora_uuid`,`year`,`population`) values 
('00e684e4-5653-437a-b508-3022ee977192','ae016228-4e72-499c-9c62-0700010d142d',2021,200),
('6067cdb9-d230-47cf-ad96-39e5e626d07a','ae016228-4e72-499c-9c62-0700010d142d',2020,1000),
('f9f24465-1533-4112-aea8-cada1f76556e','ae016228-4e72-499c-9c62-0700010d142d',2022,-400),
('fdb2bf1a-b7da-4b62-b1f2-e493e0844e36','ae016228-4e72-499c-9c62-0700010d142d',2023,3000);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`uuid`,`name`,`username`,`password`,`createdAt`,`updatedAt`) values 
('991e8675-96b6-4e0d-85f4-c3aac82af5ee','Ady Shaputra','adyshaputra@gmail.com','$2y$10$pOpp8/ALs7uvL1AFP3qzJegBJCMr70eL/LCJRRH6u89im0Gzcb2Im','2023-12-23 17:55:09','2023-12-24 00:04:09');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

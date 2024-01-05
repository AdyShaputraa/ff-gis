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

/*Table structure for table `coordinate` */

DROP TABLE IF EXISTS `coordinate`;

CREATE TABLE `coordinate` (
  `uuid` char(36) NOT NULL,
  `provinces_uuid` char(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `flora_fauna_uuid` char(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longtitude` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `coordinate` */

insert  into `coordinate`(`uuid`,`provinces_uuid`,`flora_fauna_uuid`,`type`,`name`,`latitude`,`longtitude`,`createdAt`,`updatedAt`) values 
('574300e1-4e7d-40a9-bf90-6e2e3099d258','71f9ce3c-eb86-4c55-9399-1d7a3fc999ca','4dfd602e-3133-456b-bbd5-d53273805774','Flora','Taman Edelweis Gunung Sindoro Via Watu Lunyu','-7.3052655','109.9976522','2024-01-01 20:44:07',NULL),
('6870a025-326f-4052-8c59-8ae68b307a7c','47febbdf-dedc-4ea5-8bd2-9248587104a4','336ff7a5-5ff9-4cb3-aef3-6a25573e6779','Fauna','Pusat Konservasi Elang Kamojang','-7.166861','107.799562','2023-12-31 19:33:23',NULL),
('708f14ed-be62-4c03-a42f-774bcaf7ecb1','47febbdf-dedc-4ea5-8bd2-9248587104a4','336ff7a5-5ff9-4cb3-aef3-6a25573e6779','Fauna','Pusat Suaka Satwa Elang Jawa','-6.7185507','106.7695215','2023-12-31 19:35:26',NULL),
('f1bc3218-b953-49be-8cde-e32b9b8cdb09','47febbdf-dedc-4ea5-8bd2-9248587104a4','4dfd602e-3133-456b-bbd5-d53273805774','Flora','Taman Edelweiss Gn Papandayan','-7.3087955','107.7393586','2024-01-01 20:42:14',NULL);

/*Table structure for table `fauna` */

DROP TABLE IF EXISTS `fauna`;

CREATE TABLE `fauna` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_local` varchar(100) DEFAULT NULL,
  `domain` char(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kingdom` char(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `phylum` char(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `class` char(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordo` char(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `familia` char(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `genus` char(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `spesies` char(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `description_detail` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Punah',
  `status_perlindungan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Dilindungi, Tidak Dilindungi',
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna` */

insert  into `fauna`(`uuid`,`name`,`name_local`,`domain`,`kingdom`,`phylum`,`class`,`ordo`,`familia`,`genus`,`spesies`,`description`,`description_detail`,`status`,`status_perlindungan`,`icon`,`image`,`createdAt`,`updatedAt`) values 
('336ff7a5-5ff9-4cb3-aef3-6a25573e6779','Nisaetus Bartelsi','Elang Jawa','98e62dd8-db5d-4582-9725-d29ad8125249','8cd76559-73b7-4240-8863-6d0b219c536f','25fc3a36-7fef-4029-8cf5-fdedad3c2ba6','b3204ce8-eb0b-4c67-bc84-fb79d75bd420','8689f073-284e-49c1-b321-d5de50a9aa65','e776e371-d166-472a-aaa0-6fe1777bd2b8','a241f54a-572d-4ddf-a4c8-53789eecbf3c','866f27ed-7116-4c64-bb5b-43feb56f4594','Elang jawa adalah salah satu spesies elang berukuran sedang dari keluarga Accipitridae dan genus Nisaetus yang endemik di Pulau Jawa.','Elang yang bertubuh sedang sampai besar, langsing, dengan panjang tubuh antara 60-70 cm (dari ujung paruh hingga ujung ekor).\r\n\r\nKepala berwarna coklat kemerahan (kadru), dengan jambul yang tinggi menonjol (2-4 bulu, panjang hingga 12 cm) dan tengkuk yang coklat kekuningan (kadang tampak keemasan bila terkena sinar matahari). Jambul hitam dengan ujung putih, mahkota dan kumis berwarna hitam, sedangkan punggung dan sayap coklat gelap. Kerongkongan keputihan dengan garis (sebetulnya garis-garis) hitam membujur di tengahnya. Ke bawah, ke arah dada, coret-coret hitam menyebar di atas warna kuning kecoklatan pucat, yang pada akhirnya di sebelah bawah lagi berubah menjadi pola garis (coret-coret) rapat melintang merah sawomatang sampai kecoklatan di atas warna pucat keputihan bulu-bulu perut dan kaki. Bulu pada kaki menutup tungkai hingga dekat ke pangkal jari. Ekor kecoklatan dengan empat garis gelap dan lebar melintang yang tampak jelas di sisi bawah, ujung ekor bergaris putih tipis. Betina berwarna serupa, sedikit lebih besar.\r\n\r\nIris mata kuning atau kecoklatan; paruh kehitaman, sera (daging di pangkal paruh) kekuningan, kaki (jari) kekuningan. Burung muda dengan kepala, leher dan sisi bawah tubuh berwarna coklat kayu manis terang, tanpa coretan atau garis-garis.\r\n\r\nKetika terbang, elang jawa serupa dengan elang brontok (Nisaetus cirrhatus) bentuk terang, namun cenderung tampak lebih kecoklatan, dengan perut terlihat lebih gelap, serta berukuran sedikit lebih kecil.\r\n\r\nBunyi nyaring tinggi, berulang-ulang, klii-iiw atau ii-iiiw, bervariasi antara satu hingga tiga suku kata. Atau bunyi bernada tinggi dan cepat kli-kli-kli-kli-kli. Sedikit banyak, suaranya ini mirip dengan suara elang brontok meski perbedaannya cukup jelas dalam nadanya.','Extinct in the wild (EW)','Dilindungi','http://localhost/ff-gis/assets/upload/icon/animals_eagle_17335.ico','http://localhost/ff-gis/assets/upload/image/animals/Elang.jpg','2023-12-30 11:58:33',NULL);

/*Table structure for table `fauna_class` */

DROP TABLE IF EXISTS `fauna_class`;

CREATE TABLE `fauna_class` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna_class` */

insert  into `fauna_class`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('b3204ce8-eb0b-4c67-bc84-fb79d75bd420','Aves','2023-12-30 11:32:42',NULL),
('e54c1ca4-aeb7-4b0e-8b2d-1890bbdff452','Not yet known','2023-12-30 11:19:59',NULL);

/*Table structure for table `fauna_domain` */

DROP TABLE IF EXISTS `fauna_domain`;

CREATE TABLE `fauna_domain` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna_domain` */

insert  into `fauna_domain`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('0977ce60-3160-45da-875c-bf59c937b540','Eukarya','2023-12-30 10:35:27',NULL),
('98e62dd8-db5d-4582-9725-d29ad8125249','Not yet known','2023-12-30 10:34:28',NULL),
('b1b6ee8c-e262-4a17-a3d5-dc5e0b144664','Bacteria','2023-12-30 10:35:03',NULL),
('d9e4a1b2-b408-446e-b5d4-cde59f758f39','Archaea','2023-12-30 10:35:16',NULL);

/*Table structure for table `fauna_familia` */

DROP TABLE IF EXISTS `fauna_familia`;

CREATE TABLE `fauna_familia` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna_familia` */

insert  into `fauna_familia`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('deff5d40-996d-423f-82bb-83b866906669','Not yet known','2023-12-30 11:31:10',NULL),
('e776e371-d166-472a-aaa0-6fe1777bd2b8','Aciptridae','2023-12-30 11:31:54',NULL),
('f0cd0a4b-4e28-403b-bcf5-e10801f90010','Varanidae','2023-12-30 11:31:27',NULL);

/*Table structure for table `fauna_genus` */

DROP TABLE IF EXISTS `fauna_genus`;

CREATE TABLE `fauna_genus` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna_genus` */

insert  into `fauna_genus`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('a241f54a-572d-4ddf-a4c8-53789eecbf3c','Nisaetus','2023-12-30 11:37:02',NULL),
('cf39d500-7eea-4b43-b605-9f860611b05f','Not yet known','2023-12-30 11:36:55',NULL);

/*Table structure for table `fauna_kingdom` */

DROP TABLE IF EXISTS `fauna_kingdom`;

CREATE TABLE `fauna_kingdom` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna_kingdom` */

insert  into `fauna_kingdom`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('8c76353c-fb81-42d9-8031-de2bd186ae8e','Monera / Prokaryot','2023-12-30 10:42:31',NULL),
('8cd76559-73b7-4240-8863-6d0b219c536f','Animalia','2023-12-30 10:42:05',NULL),
('8e095c59-f38c-4e81-8e10-1e11bff0b226','Plantae','2023-12-30 10:42:45',NULL),
('961453e5-e850-487c-978d-dbdd7d32d04c','Not yet known','2023-12-30 10:41:36',NULL),
('b9fd7a90-0fde-4342-b4d3-8a96f0f22347','Protista','2023-12-30 10:43:00',NULL),
('fa396b71-ebfa-42e8-acc3-280dde633a7d','Fungi','2023-12-30 10:42:13',NULL);

/*Table structure for table `fauna_ordo` */

DROP TABLE IF EXISTS `fauna_ordo`;

CREATE TABLE `fauna_ordo` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna_ordo` */

insert  into `fauna_ordo`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('34ae6e49-15a9-45df-99ad-95e40235cdb1','Not yet known','2023-12-30 11:25:19',NULL),
('8689f073-284e-49c1-b321-d5de50a9aa65','Aciptriformes','2023-12-30 11:32:19',NULL);

/*Table structure for table `fauna_phylum` */

DROP TABLE IF EXISTS `fauna_phylum`;

CREATE TABLE `fauna_phylum` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna_phylum` */

insert  into `fauna_phylum`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('0546fc62-24cc-4617-b2d0-5ae59fab99a8','Platyhelminthes','2023-12-30 11:14:25',NULL),
('0deb3ab2-5081-404f-9103-dccacbbfe7e4','Coelenterata','2023-12-30 11:13:59',NULL),
('25fc3a36-7fef-4029-8cf5-fdedad3c2ba6','Chordata','2023-12-30 11:13:53',NULL),
('452dcd5c-d9ba-4f29-ae3a-728aa4e6327e','Porifera','2023-12-30 11:14:31',NULL),
('50b81d65-7228-46aa-9f25-92b756d56694','Not yet known','2023-12-30 11:11:27',NULL),
('7312841e-2dbf-49f1-9935-39a2769959e2','Mollusca','2023-12-30 11:14:12',NULL),
('803f3ada-8c36-4320-9e91-2be6a1dcf500','Nematoda','2023-12-30 11:14:18',NULL),
('86659e24-939e-499f-a5db-f6aca971ad86','Echinodermata','2023-12-30 11:14:05',NULL),
('8d1e1f5c-7560-453b-8148-9a1515be8a6c','Annelida','2023-12-30 11:13:42',NULL),
('bdf72780-0a15-4848-9dcf-1f4d21464e73','Arthropoda','2023-12-30 11:13:48',NULL);

/*Table structure for table `fauna_population` */

DROP TABLE IF EXISTS `fauna_population`;

CREATE TABLE `fauna_population` (
  `uuid` char(36) NOT NULL,
  `fauna_uuid` char(36) DEFAULT NULL,
  `coordinate_uuid` char(36) DEFAULT NULL,
  `year` year DEFAULT NULL,
  `population` double DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna_population` */

insert  into `fauna_population`(`uuid`,`fauna_uuid`,`coordinate_uuid`,`year`,`population`) values 
('035e5a79-cda6-49bb-90c3-349fbf05805c','336ff7a5-5ff9-4cb3-aef3-6a25573e6779','6870a025-326f-4052-8c59-8ae68b307a7c',2017,5),
('219619bf-2137-42f0-8fa6-cb69524d6493','336ff7a5-5ff9-4cb3-aef3-6a25573e6779','6870a025-326f-4052-8c59-8ae68b307a7c',2018,13),
('3d820e62-3bd6-4d70-8e45-4c12891592e6','336ff7a5-5ff9-4cb3-aef3-6a25573e6779','708f14ed-be62-4c03-a42f-774bcaf7ecb1',2007,32),
('45de03d2-72e6-4878-9231-a3468d51260a','336ff7a5-5ff9-4cb3-aef3-6a25573e6779','6870a025-326f-4052-8c59-8ae68b307a7c',2015,15),
('af7db570-555a-4679-aa8a-ad665bcd7ea4','336ff7a5-5ff9-4cb3-aef3-6a25573e6779','708f14ed-be62-4c03-a42f-774bcaf7ecb1',2024,-2),
('d5bf2647-5066-4734-bbbd-2e39321805ec','336ff7a5-5ff9-4cb3-aef3-6a25573e6779','6870a025-326f-4052-8c59-8ae68b307a7c',2016,2);

/*Table structure for table `fauna_spesies` */

DROP TABLE IF EXISTS `fauna_spesies`;

CREATE TABLE `fauna_spesies` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fauna_spesies` */

insert  into `fauna_spesies`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('67ca67cd-643f-4da3-84a8-99f9466c3e02','Not yet known','2023-12-30 11:39:28',NULL),
('866f27ed-7116-4c64-bb5b-43feb56f4594','Nisaetus Bartelsi','2023-12-30 11:39:51',NULL);

/*Table structure for table `flora` */

DROP TABLE IF EXISTS `flora`;

CREATE TABLE `flora` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_local` varchar(100) DEFAULT NULL,
  `domain` char(36) DEFAULT NULL,
  `kingdom` char(36) DEFAULT NULL,
  `division` char(36) DEFAULT NULL,
  `class` char(36) DEFAULT NULL,
  `ordo` char(36) DEFAULT NULL,
  `familia` char(36) DEFAULT NULL,
  `genus` char(36) DEFAULT NULL,
  `spesies` char(36) DEFAULT NULL,
  `description` text,
  `description_detail` text,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Punah',
  `status_perlindungan` varchar(100) DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora` */

insert  into `flora`(`uuid`,`name`,`name_local`,`domain`,`kingdom`,`division`,`class`,`ordo`,`familia`,`genus`,`spesies`,`description`,`description_detail`,`status`,`status_perlindungan`,`icon`,`image`,`createdAt`,`updatedAt`) values 
('4dfd602e-3133-456b-bbd5-d53273805774','Anaphalis javanica','Edelweis','ad4d991b-0891-4bff-aae9-d7de7832dee8','3c37c919-06ab-48ee-8a11-f4fa29239879','f32309c0-22e3-4ac9-98c2-4f4b3515643e','2abb86dc-e8d8-4ec4-9846-f7db5eda874d','1330a12d-3691-40ac-a78a-e65c2549d818','657b245c-2762-405e-a650-6c292ddfdcce','f8553330-7e75-4c8f-a18d-16445e5b4be4','bc932e59-7ede-4150-b0fe-85eab77e3b14','Anaphalis javanica, yang dikenal sebagai Edelweiss jawa (Javanese edelweiss) atau Bunga Senduro, adalah tumbuhan endemik zona alpina/montana di berbagai pegunungan tinggi di Indonesia yang saat ini dikategorikan sebagai tumbuhan langka. Tumbuhan ini dapat mencapai ketinggian 8 meter dan dapat memiliki batang sebesar kaki manusia, walaupun pada umumnya tidak melebihi 1 meter.','Edelweiss berkembang biak dengan cara generatif. Dengan serbuk-serbuk bunga yang ringan, maka mudah terbawa oleh angin.\r\n\r\nBunga Edelweis sering juga disebut sebagai Bunga Keabadian karena mampu tumbuh di tempat yang tandus dan bunganya tidak rontok karena pengaruh hormon tertentu. Adapun ciri-ciri dari Bunga Edelweis adalah sebagai berikut:\r\n\r\nEdelweiss termasuk tumbuhan epifit sehingga batangnya tak membesar.\r\nBatang tanaman pada Edelweiss sekaligus menjadi tangkai bunga.\r\nBatang pada Edelweiss ini tertutupi kulit yang cenderung kasar dan bercelah.\r\nDaun pada Edelweiss berbentuk linear dan lancip. Panjang daun ini berkisar 4 hingga 6 cm, dengan lebar berkisar 0,5 cm.\r\nDaun pada Edelweiss mempunyai bulu bulu halus berwarna putih yang mirip dengan wol.\r\nPada masing-masing tangkai bunga, terdapat 5 hingga 6 kepala bunga Edelweiss berukuran sekitar 5 mm yang dikelilingi daun daun muda.\r\nKelopak bunga Edelweiss berwarna putih dengan tekstur yang lembut. Adapun bagian kepala bunga dari Edelweiss berwarna kuning.\r\nMerupakan tumbuhan endemik yang hanya tumbuh di ketinggian 2000 hingga 3000 mdpl.\r\nEdelweiss merupakan tumbuhan pelopor bagi tanah vulkanik muda di hutan pegunungan, serta mampu mempertahankan kelangsungan hidupnya di atas tanah yang tandus. Hal tersebut dikarenakan Edelweiss mampu membentuk mikoriza dengan jamur tanah tertentu, yang secara efektif memperluas jangkauan akar-akarnya dan meningkatkan efisiensi dalam mencari zat hara. Bunga-bunganya, yang biasanya muncul di antara bulan April dan Agustus,[1] menarik lebih dari 300 jenis serangga, seperti kutu, tirip, kupu-kupu, lalat, tabuhan, dan lebah. Jika dibiarkan tumbuh cukup kokoh, Edelweiss dapat menjadi tempat bersarang burung tiung batu licik Myophonus glaucinus.\r\n\r\nBagian-bagian Edelweiss sering dipetik dan dibawa turun dari gunung untuk alasan-alasan estetis dan spiritual, atau sekadar kenang-kenangan oleh para pendaki. Pada bulan Februari hingga Oktober 1988, terdapat 636 batang yang tercatat telah diambil dari Taman Nasional Gunung Gede Pangrango, yang merupakan salah satu tempat perlindungan terakhir tumbuhan ini. Di Taman Nasional Bromo Tengger Semeru, tumbuhan ini telah dinyatakan punah.\r\n\r\nTempat terbaik untuk melihat Edelweiss berada di Tegal Alun (Gunung Papandayan), Alun-Alun Surya Kencana (Gunung Gede), Alun-Alun Mandalawangi (Gunung Pangrango), dan Plawangan Sembalun (Gunung Rinjani).','Extinct (EX)','Dilindungi','http://localhost/ff-gis/assets/upload/icon/flowersilhouette_891411.ico','http://localhost/ff-gis/assets/upload/image/animals/edelweis1.jpg','2024-01-01 20:39:58',NULL);

/*Table structure for table `flora_class` */

DROP TABLE IF EXISTS `flora_class`;

CREATE TABLE `flora_class` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora_class` */

insert  into `flora_class`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('2abb86dc-e8d8-4ec4-9846-f7db5eda874d','Eudikotil','2024-01-01 11:18:59',NULL),
('69d1cb5e-4291-41bd-80a4-d272accabc5a','Not yet known','2024-01-01 11:18:49',NULL);

/*Table structure for table `flora_division` */

DROP TABLE IF EXISTS `flora_division`;

CREATE TABLE `flora_division` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora_division` */

insert  into `flora_division`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('15d8e356-faee-42b9-90f6-64444d8f0294','Not yet known','2024-01-01 11:11:09',NULL),
('f32309c0-22e3-4ac9-98c2-4f4b3515643e','Angiospermae','2024-01-01 11:18:40',NULL);

/*Table structure for table `flora_domain` */

DROP TABLE IF EXISTS `flora_domain`;

CREATE TABLE `flora_domain` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora_domain` */

insert  into `flora_domain`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('ad4d991b-0891-4bff-aae9-d7de7832dee8','Not yet known','2024-01-01 11:06:38',NULL);

/*Table structure for table `flora_familia` */

DROP TABLE IF EXISTS `flora_familia`;

CREATE TABLE `flora_familia` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora_familia` */

insert  into `flora_familia`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('00441669-f077-433a-af38-8f788690d9ed','Not yet known','2024-01-01 11:21:42',NULL),
('657b245c-2762-405e-a650-6c292ddfdcce','Asteraceae','2024-01-01 11:21:50',NULL);

/*Table structure for table `flora_genus` */

DROP TABLE IF EXISTS `flora_genus`;

CREATE TABLE `flora_genus` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora_genus` */

insert  into `flora_genus`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('b5b555bf-41ae-4c92-8356-adbe54f105f1','Not yet known','2024-01-01 11:23:09',NULL),
('f8553330-7e75-4c8f-a18d-16445e5b4be4','Anaphalis','2024-01-01 11:23:19',NULL);

/*Table structure for table `flora_kingdom` */

DROP TABLE IF EXISTS `flora_kingdom`;

CREATE TABLE `flora_kingdom` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora_kingdom` */

insert  into `flora_kingdom`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('3c37c919-06ab-48ee-8a11-f4fa29239879','Plantae','2024-01-01 11:00:51',NULL),
('e410eba3-17a8-405a-b22c-885f90fcf792','Not yet known','2024-01-01 11:00:34',NULL);

/*Table structure for table `flora_ordo` */

DROP TABLE IF EXISTS `flora_ordo`;

CREATE TABLE `flora_ordo` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora_ordo` */

insert  into `flora_ordo`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('1330a12d-3691-40ac-a78a-e65c2549d818','Asterales','2024-01-01 11:20:33',NULL),
('d889929c-14d0-45a1-b5d5-07924ab129ce','Not yet known','2024-01-01 11:20:16',NULL);

/*Table structure for table `flora_population` */

DROP TABLE IF EXISTS `flora_population`;

CREATE TABLE `flora_population` (
  `uuid` char(36) NOT NULL,
  `flora_uuid` char(36) DEFAULT NULL,
  `coordinate_uuid` char(36) DEFAULT NULL,
  `year` year DEFAULT NULL,
  `population` double DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora_population` */

insert  into `flora_population`(`uuid`,`flora_uuid`,`coordinate_uuid`,`year`,`population`) values 
('000b4672-0a72-468c-adbd-f0e2f4e2e8b6','4dfd602e-3133-456b-bbd5-d53273805774','f1bc3218-b953-49be-8cde-e32b9b8cdb09',2023,4000),
('8fb96f25-fdb1-424e-8aa0-754e2814a067','4dfd602e-3133-456b-bbd5-d53273805774','574300e1-4e7d-40a9-bf90-6e2e3099d258',2023,1000);

/*Table structure for table `flora_spesies` */

DROP TABLE IF EXISTS `flora_spesies`;

CREATE TABLE `flora_spesies` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `flora_spesies` */

insert  into `flora_spesies`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('93e9659b-3a74-4e5c-8b11-a30b11f1a224','Not yet known','2024-01-01 11:24:15',NULL),
('bc932e59-7ede-4150-b0fe-85eab77e3b14','A. javanica','2024-01-01 11:24:23',NULL);

/*Table structure for table `provinces` */

DROP TABLE IF EXISTS `provinces`;

CREATE TABLE `provinces` (
  `uuid` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `provinces` */

insert  into `provinces`(`uuid`,`name`,`createdAt`,`updatedAt`) values 
('04a3504d-a696-4859-b8fe-08b44456d6bd','DKI Jakarta','2023-12-29 16:47:58',NULL),
('182e786a-9e74-4223-b9f6-e3eeb8648c1a','Banten','2023-12-29 16:47:49',NULL),
('1e2e7901-f0b1-4863-88d3-12218a348b96','Jawa Timur','2023-12-29 16:48:49',NULL),
('47febbdf-dedc-4ea5-8bd2-9248587104a4','Jawa Barat','2023-12-29 16:48:41',NULL),
('71f9ce3c-eb86-4c55-9399-1d7a3fc999ca','Jawa Tengah','2023-12-29 16:48:28',NULL),
('a0c29e6b-f9f9-4b12-ae63-29a220c143c5','DI Yogyakarta','2023-12-29 16:48:14',NULL);

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

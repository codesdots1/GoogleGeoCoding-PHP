/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.20-MariaDB : Database - google_geocoding
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`google_geocoding` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `google_geocoding`;

/*Table structure for table `shops` */

DROP TABLE IF EXISTS `shops`;

CREATE TABLE `shops` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) NOT NULL,
  `shop_lng` varchar(255) NOT NULL,
  `shop_lat` varchar(255) NOT NULL,
  `shop_type` varchar(255) NOT NULL,
  `shop_address` text DEFAULT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `shops` */

insert  into `shops`(`shop_id`,`shop_name`,`shop_lng`,`shop_lat`,`shop_type`,`shop_address`) values 
(2,'Young Money','71.839599609375','29.852197983570925','Bar',NULL),
(3,'Chillies Restaurent','50.6689453125','33.31584045328098','Restaurent',NULL),
(4,'Sundari Hotel','27.0703125','26.739723906255','Hotel',NULL),
(5,'Soda Puma','91.27908781170845','23.82849317605481','Puma Store',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

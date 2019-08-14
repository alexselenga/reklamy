/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 5.7.25 : Database - rekl
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rekl` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `rekl`;

/*Table structure for table `billboard` */

DROP TABLE IF EXISTS `billboard`;

CREATE TABLE `billboard` (
  `billboard_id` int(11) NOT NULL AUTO_INCREMENT,
  `billboard_name` varchar(255) NOT NULL,
  PRIMARY KEY (`billboard_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `billboard` */

insert  into `billboard`(`billboard_id`,`billboard_name`) values 
(10,'billboard_1'),
(20,'billboard_2'),
(30,'billboard_3');

/*Table structure for table `metro` */

DROP TABLE IF EXISTS `metro`;

CREATE TABLE `metro` (
  `metro_id` int(11) NOT NULL AUTO_INCREMENT,
  `metro_name` varchar(255) NOT NULL,
  PRIMARY KEY (`metro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `metro` */

insert  into `metro`(`metro_id`,`metro_name`) values 
(10,'metro_1'),
(20,'metro_2'),
(30,'metro_3');

/*Table structure for table `transport` */

DROP TABLE IF EXISTS `transport`;

CREATE TABLE `transport` (
  `transport_id` int(11) NOT NULL AUTO_INCREMENT,
  `transport_name` varchar(255) NOT NULL,
  PRIMARY KEY (`transport_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `transport` */

insert  into `transport`(`transport_id`,`transport_name`) values 
(10,'transport_1'),
(20,'transport_2'),
(30,'transport_3');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

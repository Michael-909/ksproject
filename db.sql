/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - melaka
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`melaka` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `melaka`;

/*Table structure for table `admin_role` */

DROP TABLE IF EXISTS `admin_role`;

CREATE TABLE `admin_role` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `level` enum('R','W') NOT NULL DEFAULT 'W',
  KEY `role_id` (`role_id`),
  KEY `level` (`level`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `admin_role` */

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `show_id` int(10) unsigned NOT NULL,
  `total` decimal(10,2) unsigned NOT NULL,
  `creator_id` int(10) unsigned NOT NULL,
  `created_time` datetime NOT NULL,
  `status` enum('PENDING','CANCELED','CONFIRMED') NOT NULL DEFAULT 'PENDING',
  `helper_id` int(10) unsigned NOT NULL,
  `confirmation_id` varchar(100) DEFAULT NULL,
  `payment_type` enum('CASH','CARD','PAYPAL','IPAY88','WECHAT') DEFAULT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_phone` varchar(100) NOT NULL,
  `client_country` varchar(100) NOT NULL,
  `card_type` blob,
  `card_number` blob,
  `card_exp_month` blob,
  `card_exp_year` blob,
  `card_code` blob,
  `is_sent` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `send_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `booking` */

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `time` varchar(100) DEFAULT NULL,
  `description` text,
  `status` enum('T','F') NOT NULL DEFAULT 'T',
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `status` (`status`),
  KEY `from_date` (`from_date`),
  KEY `to_date` (`to_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `event` */

/*Table structure for table `package` */

DROP TABLE IF EXISTS `package`;

CREATE TABLE `package` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `ticket_type` enum('M','NM','C','VIP','MC','F') NOT NULL DEFAULT 'M',
  `tickets` tinyint(3) unsigned NOT NULL,
  `status` enum('T','F') NOT NULL DEFAULT 'T',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `ticket_type` (`ticket_type`),
  KEY `tickets` (`tickets`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `package` */

/*Table structure for table `price` */

DROP TABLE IF EXISTS `price`;

CREATE TABLE `price` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `ticket_type` enum('M','NM','C','VIP','MC','F') NOT NULL DEFAULT 'M',
  `venue_id` int(10) unsigned NOT NULL,
  `seats` text,
  `weekday_price` decimal(10,2) unsigned DEFAULT NULL,
  `weekend_price` decimal(10,2) unsigned DEFAULT NULL,
  `status` enum('T','F') NOT NULL DEFAULT 'T',
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `ticket_type` (`ticket_type`),
  KEY `status` (`status`),
  KEY `venue_id` (`venue_id`),
  FULLTEXT KEY `seats` (`seats`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `price` */

/*Table structure for table `promotion_event` */

DROP TABLE IF EXISTS `promotion_event`;

CREATE TABLE `promotion_event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `event_id` int(10) unsigned NOT NULL,
  `ticket_type` enum('M','NM','C','VIP','MC','F') DEFAULT NULL,
  `package_id` int(10) unsigned DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `quota` int(5) unsigned NOT NULL,
  `week` enum('WEEKDAY','WEEKEND','BOTH') NOT NULL,
  `price` decimal(10,2) unsigned NOT NULL,
  `status` enum('T','F') NOT NULL DEFAULT 'T',
  `limit_status` enum('T','F') NOT NULL DEFAULT 'F',
  `limit_start` date DEFAULT NULL,
  `limit_end` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `package_id` (`package_id`),
  KEY `from_date` (`from_date`),
  KEY `to_date` (`to_date`),
  KEY `quota` (`quota`),
  KEY `status` (`status`),
  KEY `ticket_type` (`ticket_type`),
  KEY `week` (`week`),
  KEY `name` (`name`),
  KEY `limit_status` (`limit_status`),
  KEY `limit_start` (`limit_start`),
  KEY `limit_end` (`limit_end`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `promotion_event` */

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('T','F') NOT NULL DEFAULT 'T',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 PAGE_CHECKSUM=1;

/*Data for the table `role` */

insert  into `role`(`id`,`name`,`description`,`status`) values 
(1,'Account Management',NULL,'T'),
(2,'Agents Management',NULL,'T'),
(3,'Counters Management',NULL,'T'),
(4,'Hall management',NULL,'T'),
(5,'Shows management',NULL,'T'),
(6,'Booking management',NULL,'T'),
(7,'Reports management',NULL,'T');

/*Table structure for table `role_url` */

DROP TABLE IF EXISTS `role_url`;

CREATE TABLE `role_url` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `url` varchar(255) NOT NULL,
  `level` enum('R','W') NOT NULL DEFAULT 'W',
  `status` enum('T','F') NOT NULL DEFAULT 'T',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `url` (`url`),
  KEY `level` (`level`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `role_url` */

/*Table structure for table `show` */

DROP TABLE IF EXISTS `show`;

CREATE TABLE `show` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `venue_id` int(10) unsigned NOT NULL,
  `date_time` datetime NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('T','F') NOT NULL DEFAULT 'T',
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_id_2` (`event_id`,`venue_id`,`date_time`),
  KEY `event_id` (`event_id`),
  KEY `date_time` (`date_time`),
  KEY `status` (`status`),
  KEY `venue_id` (`venue_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `show` */

/*Table structure for table `ticket` */

DROP TABLE IF EXISTS `ticket`;

CREATE TABLE `ticket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(10) unsigned NOT NULL,
  `seat_id` int(10) unsigned NOT NULL,
  `seat_name` varchar(50) NOT NULL,
  `ticket_type` enum('M','NM','C','VIP','MC','F') NOT NULL,
  `price_id` int(10) unsigned NOT NULL,
  `promotion_id` int(10) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) unsigned NOT NULL,
  `status` enum('A','S','P','L') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_id` (`booking_id`),
  KEY `ticket_type` (`ticket_type`),
  KEY `price_id` (`price_id`),
  KEY `status` (`status`),
  KEY `seat_id` (`seat_id`),
  KEY `promotion_id` (`promotion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `ticket` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `discount` decimal(5,2) unsigned DEFAULT NULL,
  `account_type` enum('ADMIN','SUB_ADMIN','AGENT','SUB_AGENT_LV3','SUB_AGENT_LV4','COUNTER') NOT NULL,
  `created_time` datetime NOT NULL,
  `creator_id` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `is_active` enum('T','F') NOT NULL DEFAULT 'T',
  `free` enum('T','F') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `name` (`name`),
  KEY `email` (`email`),
  KEY `phone` (`phone`),
  KEY `account_type` (`account_type`),
  KEY `created_time` (`created_time`),
  KEY `is_active` (`is_active`),
  KEY `creator_id` (`creator_id`),
  KEY `free` (`free`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`uid`,`name`,`email`,`password`,`phone`,`discount`,`account_type`,`created_time`,`creator_id`,`last_login`,`is_active`,`free`) values 
(1,'admin','Administrator','admin@mail.com','$2y$10$QGzHbd6YeG1IYFNz.wL3S.bvbZ67AFT.Yg6B4rCJeG3z.rmvyjFr2','123456789',NULL,'ADMIN','0000-00-00 00:00:00',0,NULL,'T',NULL);

/*Table structure for table `user_payment_type` */

DROP TABLE IF EXISTS `user_payment_type`;

CREATE TABLE `user_payment_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `agent_uid` varchar(10) NOT NULL,
  `payment_type` enum('CASH','CARD','PAYPAL','IPAY88','WECHAT') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `agent_uid` (`agent_uid`,`payment_type`),
  KEY `payment_type` (`payment_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `user_payment_type` */

/*Table structure for table `venue` */

DROP TABLE IF EXISTS `venue`;

CREATE TABLE `venue` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `seats_count` int(10) unsigned DEFAULT NULL,
  `status` enum('T','F') NOT NULL DEFAULT 'T',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `venue` */

/*Table structure for table `venue_seat` */

DROP TABLE IF EXISTS `venue_seat`;

CREATE TABLE `venue_seat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `venue_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `floor` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `top` int(5) unsigned DEFAULT NULL,
  `left` int(5) unsigned DEFAULT NULL,
  `width` int(5) unsigned DEFAULT NULL,
  `height` int(5) unsigned DEFAULT NULL,
  `status` enum('T','F') NOT NULL DEFAULT 'T',
  PRIMARY KEY (`id`),
  KEY `venue_id` (`venue_id`),
  KEY `name` (`name`),
  KEY `floor` (`floor`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `venue_seat` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

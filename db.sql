# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 172.19.0.4 (MySQL 5.7.22)
# Database: test
# Generation Time: 2018-08-04 15:59:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table todolist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `todolist`;

CREATE TABLE `todolist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `work_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_work_name_idx` (`work_name`),
  KEY `fk_start_date_idx` (`start_date`),
  KEY `fk_end_date_idx` (`end_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `todolist` WRITE;
/*!40000 ALTER TABLE `todolist` DISABLE KEYS */;

INSERT INTO `todolist` (`id`, `work_name`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'PHP','2018-08-02','2018-08-05',2,'2018-08-04 09:02:43',NULL,NULL),
	(2,'Javascript','2018-07-24','2018-07-27',3,'2018-08-04 09:03:24',NULL,NULL),
	(3,'Reactjs','2018-08-10','2018-08-13',1,'2018-08-04 09:05:49',NULL,NULL),
	(4,'Vuejs','2018-08-22','2018-08-22',1,'2018-08-04 09:06:21',NULL,'2018-08-04 15:57:25'),
	(5,'Nodejs','2018-08-16','2018-08-17',1,'2018-08-04 15:47:53',NULL,NULL);

/*!40000 ALTER TABLE `todolist` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

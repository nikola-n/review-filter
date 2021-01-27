# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.5.8-MariaDB)
# Database: reviews
# Generation Time: 2021-01-27 23:12:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table reviews
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` int(10) unsigned DEFAULT NULL,
  `review_id` varchar(128) DEFAULT NULL,
  `review_full_text` varchar(128) DEFAULT NULL,
  `review_text` varchar(128) DEFAULT NULL,
  `rating` int(10) unsigned DEFAULT NULL,
  `review_created_on` varchar(128) DEFAULT NULL,
  `review_created_on_date` varchar(128) DEFAULT NULL,
  `review_created_on_time` varchar(128) DEFAULT NULL,
  `reviewer_id` int(10) unsigned DEFAULT NULL,
  `reviewer_url` varchar(128) DEFAULT NULL,
  `reviewer_name` varchar(128) DEFAULT NULL,
  `reviewer_email` varchar(128) DEFAULT NULL,
  `source_type` varchar(128) DEFAULT NULL,
  `is_verified` varchar(128) DEFAULT NULL,
  `source` varchar(128) DEFAULT NULL,
  `source_name` varchar(128) DEFAULT NULL,
  `source_id` varchar(128) DEFAULT NULL,
  `tags` varchar(128) DEFAULT NULL,
  `href` varchar(128) DEFAULT NULL,
  `logo_href` varchar(128) DEFAULT NULL,
  `photos` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;

INSERT INTO `reviews` (`id`, `uuid`, `review_id`, `review_full_text`, `review_text`, `rating`, `review_created_on`, `review_created_on_date`, `review_created_on_time`, `reviewer_id`, `reviewer_url`, `reviewer_name`, `reviewer_email`, `source_type`, `is_verified`, `source`, `source_name`, `source_id`, `tags`, `href`, `logo_href`, `photos`)
VALUES
	(1,2097047,'93f131be27dc1122bb7ef0048ad10e4f','5 star review','5 star review',5,'2 days ago','2021-01-25T13:00:35+00:00','1611579635',NULL,NULL,'Reviewer #20',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(2,2097046,'6e7bd4c71a56885ef583bd79186af689','4 star review','4 star review',4,'2 days ago','2021-01-25T13:00:21+00:00','1611579621',NULL,NULL,'Reviewer #19',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(3,2097045,'ced8bd056d0adec93c651f935c7dde80','3 star review','3 star review',3,'2 days ago','2021-01-25T13:00:10+00:00','1611579610',NULL,NULL,'Reviewer #18',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(4,2097044,'b0dfee9017fafe7d751f0fea1f3ce540','2 star review','2 star review',2,'2 days ago','2021-01-25T12:59:57+00:00','1611579597',NULL,NULL,'Reviewer #17',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(5,2097043,'10588b914a39967f3a702b02f3751794','1 star review','1 star review',1,'2 days ago','2021-01-25T12:59:40+00:00','1611579580',NULL,NULL,'Reviewer #16',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(6,2097042,'1d14901bbb67ded3368d2d8d8b5989d8','5 star review','5 star review',5,'2 days ago','2021-01-25T12:59:27+00:00','1611579567',NULL,NULL,'Reviewer #15',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(7,2097041,'ca10718af15af32f71da09a6e5f78c48','','',4,'2 days ago','2021-01-25T12:59:15+00:00','1611579555',NULL,NULL,'Reviewer #14',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(8,2097040,'65b3ba7d67109d2a4f573fca44d5e532','3 star review','3 star review',3,'2 days ago','2021-01-25T12:58:46+00:00','1611579526',NULL,NULL,'Reviewer #13',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(9,2097039,'c111f4f05a1048e3a43a28e5bfd0be27','','',2,'2 days ago','2021-01-25T12:58:22+00:00','1611579502',NULL,NULL,'Reviewer #12',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(10,2097038,'be88045286fcb7ca91e234b37eef511b','1 star review','1 star review',1,'2 days ago','2021-01-25T12:58:06+00:00','1611579486',NULL,NULL,'Reviewer #11',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(11,2097037,'70b57c0433d0221b0788b106fb9fdd5a','','',5,'2 days ago','2021-01-25T12:57:48+00:00','1611579468',NULL,NULL,'Reviewer #10',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(12,2097036,'59cbd1e887e8cce76ef68318b198ddf0','4 star review','4 star review',4,'2 days ago','2021-01-25T12:57:35+00:00','1611579455',NULL,NULL,'Reviewer #9',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(13,2097034,'ac50da2870193abe25ba529597cfbd23','','',3,'2 days ago','2021-01-25T12:57:11+00:00','1611579431',NULL,NULL,'Reviewer #8',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(14,2097032,'f0c8bdd06d6c4ec35de765657e118602','2 star review','2 star review',2,'2 days ago','2021-01-25T12:56:55+00:00','1611579415',NULL,NULL,'Reviewer #7',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(15,2097031,'ef2ad7498e260ec9462d0f27801c86b3','','',1,'2 days ago','2021-01-25T12:56:34+00:00','1611579394',NULL,NULL,'Reviewer #6',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(16,2097030,'d55229232defac9397fc6f12550d4f1f','5 star review','5 star review',5,'2 days ago','2021-01-25T12:56:17+00:00','1611579377',NULL,NULL,'Reviewer #5',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(17,2097029,'3a6dd5070788c36f28c4f78eb349c248','4 star review','4 star review',4,'2 days ago','2021-01-25T12:55:57+00:00','1611579357',NULL,NULL,'Reviewer #4',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(18,2097028,'01223a92f8823251b9678720def5ff43','3 star review','3 star review',3,'2 days ago','2021-01-25T12:55:40+00:00','1611579340',NULL,NULL,'Reviewer #3',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(19,2097027,'5b8c2de55dbb5ccf9f8d033c1859b559','2 star review','2 star review',2,'2 days ago','2021-01-25T12:55:21+00:00','1611579321',NULL,NULL,'Reviewer #2',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL),
	(20,2097026,'691d4d278dc23aa9a478e078b9382c2a','1 star review','1 star review',1,'2 days ago','2021-01-25T12:55:06+00:00','1611579306',NULL,NULL,'Reviewer #1',NULL,'custom','','custom','1-20 Reviews','890cdd7974cdf8aabe6e9051f5a87303bdb933ae',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.42)
# Database: social_data
# Generation Time: 2015-08-05 20:20:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table fb_detail
# ------------------------------------------------------------

CREATE TABLE `fb_detail` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `FID` bigint(16) unsigned NOT NULL,
  `fb_description` blob NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_fb_detail` (`FID`),
  CONSTRAINT `fk_fb_detail` FOREIGN KEY (`FID`) REFERENCES `fb_rest` (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table fb_food_style
# ------------------------------------------------------------

CREATE TABLE `fb_food_style` (
  `ID` bigint(25) NOT NULL,
  `FID` bigint(25) unsigned NOT NULL,
  `food_styles0` varchar(23) NOT NULL DEFAULT '',
  `food_styles1` varchar(22) NOT NULL DEFAULT '',
  `food_styles2` varchar(23) NOT NULL DEFAULT '',
  `food_styles3` varchar(23) NOT NULL DEFAULT '',
  `food_styles4` varchar(11) NOT NULL DEFAULT '',
  `food_styles5` varchar(11) NOT NULL DEFAULT '',
  `food_styles6` varchar(14) NOT NULL DEFAULT '',
  `food_styles7` varchar(14) NOT NULL DEFAULT '',
  `food_styles8` varchar(14) NOT NULL DEFAULT '',
  `food_styles9` varchar(10) NOT NULL DEFAULT '',
  `food_styles10` varchar(14) NOT NULL DEFAULT '',
  `food_styles11` varchar(10) NOT NULL DEFAULT '',
  `food_styles12` varchar(10) NOT NULL DEFAULT '',
  `food_styles13` varchar(9) NOT NULL DEFAULT '',
  `food_styles14` varchar(10) NOT NULL DEFAULT '',
  `food_styles15` varchar(10) NOT NULL DEFAULT '',
  `food_styles16` varchar(11) NOT NULL DEFAULT '',
  `food_styles17` varchar(6) NOT NULL DEFAULT '',
  `food_styles18` varchar(6) NOT NULL DEFAULT '',
  `food_styles19` varchar(23) NOT NULL DEFAULT '',
  `food_styles20` varchar(8) NOT NULL DEFAULT '',
  `food_styles21` varchar(18) NOT NULL DEFAULT '',
  `food_styles22` varchar(8) NOT NULL DEFAULT '',
  `food_styles23` varchar(16) NOT NULL DEFAULT '',
  `food_styles24` varchar(5) NOT NULL DEFAULT '',
  `food_styles25` varchar(7) NOT NULL DEFAULT '',
  `food_styles26` varchar(8) NOT NULL DEFAULT '',
  `food_styles27` varchar(6) NOT NULL DEFAULT '',
  `food_styles28` varchar(14) NOT NULL DEFAULT '',
  `food_styles29` varchar(7) NOT NULL DEFAULT '',
  `food_styles30` varchar(14) NOT NULL DEFAULT '',
  `food_styles31` varchar(8) NOT NULL DEFAULT '',
  `food_styles32` varchar(5) NOT NULL DEFAULT '',
  `food_styles33` varchar(7) NOT NULL DEFAULT '',
  `food_styles34` varchar(10) NOT NULL DEFAULT '',
  `food_styles35` varchar(7) NOT NULL DEFAULT '',
  `food_styles36` varchar(11) NOT NULL DEFAULT '',
  `food_styles37` varchar(9) NOT NULL DEFAULT '',
  `food_styles38` varchar(8) NOT NULL DEFAULT '',
  `food_styles39` varchar(14) NOT NULL DEFAULT '',
  `food_styles40` varchar(11) NOT NULL DEFAULT '',
  `food_styles41` varchar(10) NOT NULL DEFAULT '',
  `food_styles42` varchar(9) NOT NULL DEFAULT '',
  `food_styles43` varchar(10) NOT NULL DEFAULT '',
  `food_styles44` varchar(7) NOT NULL DEFAULT '',
  `food_styles45` varchar(4) NOT NULL DEFAULT '',
  `food_styles46` varchar(7) NOT NULL DEFAULT '',
  `food_styles47` varchar(5) NOT NULL DEFAULT '',
  `food_styles48` varchar(10) NOT NULL DEFAULT '',
  `food_styles49` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `fb_food_style_date` BEFORE INSERT ON `fb_food_style` FOR EACH ROW SET new.fb_date=curdate(); */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table fb_gm
# ------------------------------------------------------------

CREATE TABLE `fb_gm` (
  `id` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
  `fid` bigint(25) unsigned NOT NULL,
  `fb_gm` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `fk_fb_gm` (`fid`),
  CONSTRAINT `fk_fb_gm` FOREIGN KEY (`fid`) REFERENCES `fb_rest` (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table fb_loc
# ------------------------------------------------------------

CREATE TABLE `fb_loc` (
  `ID` bigint(25) unsigned NOT NULL DEFAULT '0',
  `FID` bigint(25) unsigned NOT NULL,
  `fb_street` varchar(100) NOT NULL DEFAULT '',
  `fb_city` char(50) NOT NULL DEFAULT '',
  `fb_state` char(2) NOT NULL DEFAULT '',
  `fb_zip` int(5) NOT NULL,
  `fb_lat` float(10,6) NOT NULL,
  `fb_lng` float(11,6) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `fb_street` (`fb_street`,`FID`),
  KEY `fk_fb_loc` (`FID`),
  CONSTRAINT `fk_fb_loc` FOREIGN KEY (`FID`) REFERENCES `fb_rest` (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table fb_park
# ------------------------------------------------------------

CREATE TABLE `fb_park` (
  `id` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
  `fid` bigint(25) unsigned NOT NULL,
  `fb_pk_street` int(1) NOT NULL,
  `fb_pk_lot` int(1) NOT NULL,
  `fb_pk_valet` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fid` (`fid`),
  CONSTRAINT `fk_fb_park` FOREIGN KEY (`fid`) REFERENCES `fb_rest` (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table fb_pic
# ------------------------------------------------------------

CREATE TABLE `fb_profile` (
  `id` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
  `fid` bigint(25) unsigned NOT NULL,
  `fb_pic` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table fb_price
# ------------------------------------------------------------

CREATE TABLE `fb_price` (
  `fid` bigint(25) unsigned NOT NULL,
  `fb_price` varchar(70) NOT NULL DEFAULT '',
  `id` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_fb_price` (`fid`),
  CONSTRAINT `fk_fb_price` FOREIGN KEY (`fid`) REFERENCES `fb_rest` (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table fb_rest
# ------------------------------------------------------------

CREATE TABLE `fb_rest` (
  `FID` bigint(25) unsigned NOT NULL,
  `fb_name` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`FID`),
  UNIQUE KEY `fb_name` (`fb_name`,`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `fb_rest_date` BEFORE INSERT ON `fb_rest` FOR EACH ROW SET NEW.fb_date=curdate() */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table fb_rest_serv
# ------------------------------------------------------------

CREATE TABLE `fb_rest_serv` (
  `id` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
  `fid` bigint(25) unsigned NOT NULL,
  `fb_reserve` tinyint(1) NOT NULL,
  `fb_walkins` tinyint(1) NOT NULL,
  `fb_groups` tinyint(1) NOT NULL,
  `fb_kids` tinyint(1) NOT NULL,
  `fb_takeout` tinyint(1) NOT NULL,
  `fb_delivery` tinyint(1) NOT NULL,
  `fb_catering` tinyint(1) NOT NULL,
  `fb_waiter` tinyint(1) NOT NULL,
  `fb_outdoor` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`fid`),
  KEY `fk_fb_rest_serv` (`fid`),
  CONSTRAINT `fk_fb_rest_serv` FOREIGN KEY (`fid`) REFERENCES `fb_rest` (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table fb_rest_spec
# ------------------------------------------------------------

CREATE TABLE `fb_rest_spec` (
  `ID` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
  `FID` bigint(25) unsigned NOT NULL,
  `fb_breakfast` tinyint(1) NOT NULL,
  `fb_lunch` tinyint(1) NOT NULL,
  `fb_dinner` tinyint(1) NOT NULL,
  `fb_coffee` tinyint(1) NOT NULL,
  `fb_drinks` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `FID` (`ID`),
  UNIQUE KEY `ID` (`ID`,`FID`),
  KEY `fk_fb_rest_spec` (`FID`),
  CONSTRAINT `fk_fb_rest_spec` FOREIGN KEY (`FID`) REFERENCES `fb_rest` (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `fb_rest_spec_date` BEFORE INSERT ON `fb_rest_spec` FOR EACH ROW SET NEW.fb_date=curdate() */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table fb_soc
# ------------------------------------------------------------

CREATE TABLE `fb_soc` (
  `ID` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
  `FID` bigint(25) unsigned NOT NULL,
  `fb_likes` int(8) unsigned NOT NULL,
  `fb_were_here` int(8) unsigned NOT NULL,
  `fb_talking_about` int(8) unsigned NOT NULL,
  `fb_heatery_score` float(8,3) unsigned NOT NULL,
  `fb_date` date NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `FID` (`FID`,`fb_talking_about`,`fb_date`),
  CONSTRAINT `fk_fb_soc` FOREIGN KEY (`FID`) REFERENCES `fb_rest` (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  CREATE TRIGGER fb_soc_date BEFORE INSERT ON fb_soc FOR EACH ROW SET NEW.fb_date=curdate();



# Dump of table fb_web
# ------------------------------------------------------------

CREATE TABLE `fb_web` (
  `ID` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
  `FID` bigint(25) unsigned NOT NULL,
  `fb_website` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `FID` (`ID`),
  UNIQUE KEY `ID` (`ID`,`FID`,`fb_website`),
  KEY `fk_fb_web` (`FID`),
  CONSTRAINT `fk_fb_web` FOREIGN KEY (`FID`) REFERENCES `fb_rest` (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `fb_web_date` BEFORE INSERT ON `fb_web` FOR EACH ROW SET NEW.fb_date=curdate() */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table fs_loc
# ------------------------------------------------------------

CREATE TABLE `fs_loc` (
  `ID` bigint(25) unsigned NOT NULL DEFAULT '0',
  `FSID` varchar(255) NOT NULL DEFAULT '',
  `fs_lat` float(11,6) NOT NULL,
  `fs_lng` float(11,6) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_fs_loc` (`FSID`),
  CONSTRAINT `fk_fs_loc` FOREIGN KEY (`FSID`) REFERENCES `fs_rest` (`FSID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table fs_rest
# ------------------------------------------------------------

CREATE TABLE `fs_rest` (
  `FSID` varchar(255) NOT NULL DEFAULT '',
  `fs_name` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`FSID`),
  UNIQUE KEY `FSID_2` (`FSID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `fs_rest_date` BEFORE INSERT ON `fs_rest` FOR EACH ROW SET NEW.fs_date=curdate() */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table fs_soc
# ------------------------------------------------------------

CREATE TABLE `fs_soc` (
  `ID` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
  `FSID` varchar(255) NOT NULL,
  `fs_tips` int(8) NOT NULL,
  `fs_checkins` int(8) NOT NULL,
  `fs_users` int(8) NOT NULL,
  `fs_date` date NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `FSID` (`ID`),
  UNIQUE KEY `FSID_2` (`FSID`,`fs_date`),
  CONSTRAINT `fk_fs_soc` FOREIGN KEY (`FSID`) REFERENCES `fs_rest` (`FSID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `fs_soc_date` BEFORE INSERT ON `fs_soc` FOR EACH ROW SET NEW.fs_date=curdate() */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table top10_markers
# ------------------------------------------------------------

CREATE TABLE `top10_markers` (
  `ID` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
  `FID` bigint(25) unsigned NOT NULL,
  `fb_name` text NOT NULL,
  `fb_likes` int(8) NOT NULL,
  `fb_were_here` int(8) NOT NULL,
  `fb_talking_about` int(8) NOT NULL,
  `fb_street` varchar(100) NOT NULL DEFAULT '',
  `fb_city` char(50) NOT NULL DEFAULT '',
  `fb_state` char(2) NOT NULL DEFAULT '',
  `fb_zip` int(5) NOT NULL,
  `fb_lat` float(10,6) NOT NULL,
  `fb_lng` float(11,6) NOT NULL,
  `fb_loc_in` int(20) unsigned NOT NULL,
  `fb_heatery_score` float(8,3) unsigned NOT NULL,
  `fb_date` date NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `FID` (`ID`),
  UNIQUE KEY `FID_2` (`FID`,`fb_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `top10_markers_date` BEFORE INSERT ON `top10_markers` FOR EACH ROW SET new.fb_date=curdate(); */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table yelp_loc
# ------------------------------------------------------------

CREATE TABLE `yelp_loc` (
  `ID` bigint(25) unsigned NOT NULL DEFAULT '0',
  `YID` varchar(255) NOT NULL DEFAULT '',
  `yelp_city` varchar(75) NOT NULL,
  `yelp_postal_code` int(5) unsigned NOT NULL,
  `yelp_address` varchar(100) NOT NULL DEFAULT '',
  `yelp_state_code` char(2) NOT NULL,
  `yelp_phone` varchar(10) NOT NULL DEFAULT '',
  KEY `fk_yelp_loc` (`YID`),
  CONSTRAINT `fk_yelp_loc` FOREIGN KEY (`YID`) REFERENCES `yelp_rest` (`YID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table yelp_rest
# ------------------------------------------------------------

CREATE TABLE `yelp_rest` (
  `YID` varchar(255) NOT NULL DEFAULT '',
  `yelp_name` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`YID`),
  UNIQUE KEY `yelp_name` (`yelp_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `yelp_rest_date` BEFORE INSERT ON `yelp_rest` FOR EACH ROW SET new.yelp_date=curdate(); */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table yelp_soc
# ------------------------------------------------------------

CREATE TABLE `yelp_soc` (
  `ID` bigint(25) unsigned NOT NULL AUTO_INCREMENT,
  `YID` varchar(255) NOT NULL,
  `yelp_rating` float(3,1) NOT NULL,
  `yelp_review_count` int(5) NOT NULL,
  `yelp_date` date NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `YID` (`ID`),
  UNIQUE KEY `YID_2` (`YID`,`yelp_date`),
  CONSTRAINT `fk_yelp_soc` FOREIGN KEY (`YID`) REFERENCES `yelp_rest` (`YID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `yelp_soc_date` BEFORE INSERT ON `yelp_soc` FOR EACH ROW SET new.yelp_date=curdate(); */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

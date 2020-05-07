-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.26 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour hipposeries
CREATE DATABASE IF NOT EXISTS `hipposeries` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hipposeries`;

-- Listage de la structure de la table hipposeries. reply
CREATE TABLE IF NOT EXISTS `reply` (
  `replyID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `commentID` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`replyID`),
  KEY `FK_reply_user` (`userID`),
  KEY `FK_reply_comment` (`commentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Listage des données de la table hipposeries.reply : 0 rows
DELETE FROM `reply`;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

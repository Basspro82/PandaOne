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

-- Listage de la structure de la table hipposeries. comment
CREATE TABLE IF NOT EXISTS `comment` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `imdbID` varchar(50) NOT NULL DEFAULT '',
  `userID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table hipposeries.comment : 4 rows
DELETE FROM `comment`;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`commentID`, `imdbID`, `userID`, `comment`, `createdAt`) VALUES
	(1, 'tt6517102', 1, 'Rien à dire. De toute beauté et un scénar qui envoi du steack (Par contre faut aimer les dessins-animés quoi)', '2020-03-22 16:25:48'),
	(2, 'tt7049682', 3, 'Ma best série 2019, scénario au petit oignon, réalisation au poil, gros gros coup de coeur', '2020-03-22 16:25:49'),
	(3, 'tt5753856', 2, 'Série allemande (à regarder en VO !), à base de disparition d\'enfants, de voyages dans le temps, un peu complexe à suivre par moments tellement ça va loin :)', '2020-03-22 16:25:46'),
	(4, 'tt5753856', 3, 'Je valide Dark c\'est trop bien et c\'est en VO bien sur sinon on perd tout le charme de l\'allemand', '2020-03-22 16:25:47');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Listage de la structure de la table hipposeries. serie
CREATE TABLE IF NOT EXISTS `serie` (
  `imdbID` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(250) NOT NULL DEFAULT '',
  `plot` varchar(250) NOT NULL DEFAULT '',
  `year` int(11) NOT NULL,
  `genre` varchar(250) NOT NULL DEFAULT '',
  `poster` varchar(250) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`imdbID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Listage des données de la table hipposeries.serie : 4 rows
DELETE FROM `serie`;
/*!40000 ALTER TABLE `serie` DISABLE KEYS */;
INSERT INTO `serie` (`imdbID`, `title`, `plot`, `year`, `genre`, `poster`, `createdAt`) VALUES
	('tt6517102', 'Castlevania', 'A vampire hunter fights to save a besieged city from an army of otherworldly creatures controlled by Dracula.', 2017, 'Animation, Action, Adventure', 'https://m.media-amazon.com/images/M/MV5BYWUwN2UwYTktMDk4OC00YTg0LThmNTItNWE3ZjQxOTIxZTg3XkEyXkFqcGdeQXVyNTE1NjY5Mg@@._V1_UX182_CR0,0,182,268_AL_.jpg', '2020-03-22 00:41:32'),
	('tt7134908', 'Elite', 'When three working-class teenagers begin attending an exclusive private school in Spain, the clash between them and the wealthy students leads to murder.', 2018, 'Crime, Drama, Thriller', 'https://m.media-amazon.com/images/M/MV5BYWJhMWMyZmUtNTc3Mi00MTYzLTllMjMtNzFkM2ZhYTg2ZWFiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_UX182_CR0,0,182,268_AL_.jpg', '2020-03-22 10:25:44'),
	('tt5753856', 'Dark', 'A family saga with a supernatural twist, set in a German town, where the disappearance of two young children exposes the relationships among four families.', 2017, 'Crime, Drama, Mystery', 'https://m.media-amazon.com/images/M/MV5BMmIyZjA3NGUtYjlhNS00ZDlkLWI0MDgtMDc2YWNjNGMwYWZhXkEyXkFqcGdeQXVyMzY0MTE3NzU@._V1_UX182_CR0,0,182,268_AL_.jpg', '2020-03-22 10:27:19'),
	('tt7049682', 'Watchmen', 'Set in an alternate history where masked vigilantes are treated as outlaws, Watchmen embraces the nostalgia of the original groundbreaking graphic novel of the same name, while attempting to break new ground of its own.', 2019, 'Action, Drama, Mystery', 'https://m.media-amazon.com/images/M/MV5BYjhhZDE3NjgtMjkzNC00NzI3LWJhOTItMWQ5ZjljODA5NWNkXkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_UX182_CR0,0,182,268_AL_.jpg', '2020-03-22 10:51:43');
/*!40000 ALTER TABLE `serie` ENABLE KEYS */;

-- Listage de la structure de la table hipposeries. user
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `gravatar` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table hipposeries.user : 5 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`userID`, `pseudo`, `email`, `gravatar`) VALUES
	(1, 'basspro', 'ylaurain@gmail.com', 'https://www.gravatar.com/avatar/6a5224f8d067a0ec01c25bb00f76a974?s=80&d=mp&r=g'),
	(2, 'jezvin', 'jezvin@gmail.com', 'https://www.gravatar.com/avatar/f8c83acc7e3606d682d5604a015ce3a4?s=80&d=mp&r=g'),
	(3, 'mozo', 'm.ozeau@gmail.com', 'https://www.gravatar.com/avatar/da56580afc64bb374b1c64009a126555?s=80&d=mp&r=g'),
	(4, 'cricri', 'leonchristelle@gmail.com', 'https://www.gravatar.com/avatar/328fa1afcdd537b11871a9f759255f7f?s=80&d=mp&r=g'),
	(5, 'dorian', 'drnguillaume@gmail.com', 'https://www.gravatar.com/avatar/e471b8c97bf4f6b55fbbdd1e55b4d241?s=80&d=mp&r=g');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

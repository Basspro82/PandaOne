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

-- Listage de la structure de la table hipposeries. comment
CREATE TABLE IF NOT EXISTS `comment` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `imdbID` varchar(50) NOT NULL DEFAULT '',
  `userID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `score` float DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- Listage des données de la table hipposeries.comment : 10 rows
DELETE FROM `comment`;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`commentID`, `imdbID`, `userID`, `comment`, `score`, `createdAt`) VALUES
	(1, 'tt6517102', 1, 'Rien Ã  dire. De toute beautÃ© et un scenar qui envoi du steack', 4, '2020-03-22 16:25:48'),
	(2, 'tt7049682', 3, 'Ma best sÃ©rie 2019, scÃ©nario au petit oignon, rÃ©alisation au poil, gros gros coup de coeur', 5, '2020-03-22 16:25:49'),
	(3, 'tt5753856', 2, 'Rien aÂ  dire. De toute beaute et un scenar qui envoi du steack 2', 2.5, '2020-03-22 16:25:46'),
	(15, 'tt7134908', 1, 'Bon on va pas se mentir, c\'est tennage mais le scenar est sympa et Ã§a joue pas trop mal', 3, '2020-03-26 00:00:00'),
	(36, 'tt2261227', 1, 'Toujours une rÃ©alisation propre mais le scÃ©nario n\'est pas Ã  la hauteur de la 1Ã¨re saison. Le changement d\'acteur principal est aussi perturbant.', 3, '2020-04-01 00:00:00'),
	(46, 'tt9561862', 3, 'Des mini Ã©pisodes indÃ©pendants sur le thÃ¨me du titre, certain sont vraiment des petits bijoux (un ou deux juste bof) mais sÃ©rie Ã  ne surtout pas ratÃ©', 4, '2020-04-04 00:00:00'),
	(45, 'tt9446688', 3, 'SÃ©rie courte (Ã©pisodes de 20 minutes) sur la pubertÃ© d\'une jeune fille qui se dÃ©couvre des pouvoirs psy. Je peux pas trop en dire sans spoiler mais j\'aime la rÃ©alisation et la maniÃ¨re dont c\'est amenÃ© sans que Ã§a rÃ©volutionne non plus le game', 3.5, '2020-04-04 00:00:00'),
	(44, 'tt9251798', 3, 'SÃ©rie NovÃ©gienne qui permet de dÃ©couvrir un peu la culture et la langue Nordique. Les moyens sont pas ouf (niveau effets spÃ©ciaux) mais les thÃ©matiques abordÃ©es (mythologie nordique, Ã©cologie) et les paysages font que la sÃ©rie se regarde plutÃ´t bien', 3, '2020-04-04 00:00:00'),
	(42, 'tt9251798', 1, 'Serie NovÃ©gienne qui permet de dÃ©couvrir un peu la culture et la langue Nordique. Les moyens sont pas ouf (niveau effets spÃ©ciaux) mais les thÃ©matiques abordÃ©es (mythologie nordique, Ã©cologie) et les payasages font que la sÃ©rie se regarde plutot bien', 3, '2020-04-04 00:00:00');
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

-- Listage des données de la table hipposeries.serie : 12 rows
DELETE FROM `serie`;
/*!40000 ALTER TABLE `serie` DISABLE KEYS */;
INSERT INTO `serie` (`imdbID`, `title`, `plot`, `year`, `genre`, `poster`, `createdAt`) VALUES
	('tt6517102', 'Castlevania', 'A vampire hunter fights to save a besieged city from an army of otherworldly creatures controlled by Dracula.', 2017, 'Animation, Action, Adventure', 'https://m.media-amazon.com/images/M/MV5BYWUwN2UwYTktMDk4OC00YTg0LThmNTItNWE3ZjQxOTIxZTg3XkEyXkFqcGdeQXVyNTE1NjY5Mg@@._V1_UX182_CR0,0,182,268_AL_.jpg', '2020-03-22 00:41:32'),
	('tt7134908', 'Elite', 'When three working-class teenagers begin attending an exclusive private school in Spain, the clash between them and the wealthy students leads to murder.', 2018, 'Crime, Drama, Thriller', 'https://m.media-amazon.com/images/M/MV5BYWJhMWMyZmUtNTc3Mi00MTYzLTllMjMtNzFkM2ZhYTg2ZWFiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_UX182_CR0,0,182,268_AL_.jpg', '2020-03-22 10:25:44'),
	('tt5753856', 'Dark', 'A family saga with a supernatural twist, set in a German town, where the disappearance of two young children exposes the relationships among four families.', 2017, 'Crime, Drama, Mystery', 'https://m.media-amazon.com/images/M/MV5BMmIyZjA3NGUtYjlhNS00ZDlkLWI0MDgtMDc2YWNjNGMwYWZhXkEyXkFqcGdeQXVyMzY0MTE3NzU@._V1_UX182_CR0,0,182,268_AL_.jpg', '2020-03-22 10:27:19'),
	('tt7049682', 'Watchmen', 'Set in an alternate history where masked vigilantes are treated as outlaws, Watchmen embraces the nostalgia of the original groundbreaking graphic novel of the same name, while attempting to break new ground of its own.', 2019, 'Action, Drama, Mystery', 'https://m.media-amazon.com/images/M/MV5BYjhhZDE3NjgtMjkzNC00NzI3LWJhOTItMWQ5ZjljODA5NWNkXkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_UX182_CR0,0,182,268_AL_.jpg', '2020-03-22 10:51:43'),
	('tt2707408', 'Narcos', 'A chronicled look at the criminal exploits of Colombian drug lord Pablo Escobar, as well as the many other drug kingpins who plagued the country through the years.', 2015, '', 'https://m.media-amazon.com/images/M/MV5BNmFjODU3YzgtMGUwNC00ZGI3LWFkZjQtMjkxZDc3NmQ1MzcyXkEyXkFqcGdeQXVyNjUwNzk3NDc@._V1_.jpg', '2020-03-26 00:00:00'),
	('tt3837246', 'Assassination Classroom', 'A powerful creature claims that within a year, Earth will be destroyed by him, but he offers mankind a chance by becoming a homeroom teacher where he teaches his students about how to kill him. An assassination classroom begins.', 2015, '', 'https://m.media-amazon.com/images/M/MV5BYzI0OWJlMjItYmE1NS00YzE2LWExNDAtMDM3MDA5MzM5NmExXkEyXkFqcGdeQXVyNzA5MDUyODA@._V1_.jpg', '2020-03-26 00:00:00'),
	('tt0410975', 'Desperate Housewives', '', 2004, '', 'https://m.media-amazon.com/images/M/MV5BYzI2MTFjZDktYTZhNS00YTU2LWI5ZTMtM2MzNDU1YjNhNTJlXkEyXkFqcGdeQXVyNzA5NjUyNjM@._V1_.jpg', '2020-03-28 00:00:00'),
	('tt4523640', 'Yo-kai Watch', '', 2015, '', 'https://m.media-amazon.com/images/M/MV5BM2I5YTgxMDQtOWE2NS00NTExLWI4MWQtNThhNDY3NDdhYzNhXkEyXkFqcGdeQXVyNjgxNjI2NzE@._V1_.jpg', '2020-03-29 00:00:00'),
	('tt6357658', 'Baki', '', 2018, '', 'https://m.media-amazon.com/images/M/MV5BN2MyMzEwZTctOTJlYS00NzRkLTgyZjItN2U3MGI0YWVjNWU5XkEyXkFqcGdeQXVyMjY2MTc0MjA@._V1_.jpg', '2020-03-30 00:00:00'),
	('tt8714904', 'Narcos: Mexico', '', 2018, '', 'https://m.media-amazon.com/images/M/MV5BMGJiMTc0OTctZDU1Yy00YjdiLTk1NWYtZTgzMjc1ODg4YzhkXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg', '2020-03-30 00:00:00'),
	('tt2261227', 'Altered Carbon', '', 2018, '', 'https://m.media-amazon.com/images/M/MV5BNjIxMWMzMzctYmZkYy00OTkzLWFlMWUtMjc3ZDFmYzQ3YmVkXkEyXkFqcGdeQXVyNjU2ODM5MjU@._V1_.jpg', '2020-04-01 00:00:00'),
	('tt9251798', 'Ragnarok', '', 2020, '', 'https://m.media-amazon.com/images/M/MV5BODM3NTZkZTUtYzEyYS00NjEyLTg2NjEtNDhlMjYwY2ZkNGUzXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg', '2020-04-04 00:00:00'),
	('tt9446688', 'I Am Not Okay with This', '', 2020, '', 'https://m.media-amazon.com/images/M/MV5BMWM5YzhmNGMtZTI4Ny00MGM4LThkYjAtMDIyMTEwNTQyZmQ1XkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg', '2020-04-04 00:00:00'),
	('tt9561862', 'Love, Death & Robots', '', 2019, '', 'https://m.media-amazon.com/images/M/MV5BMTc1MjIyNDI3Nl5BMl5BanBnXkFtZTgwMjQ1OTI0NzM@._V1_.jpg', '2020-04-04 00:00:00');
/*!40000 ALTER TABLE `serie` ENABLE KEYS */;

-- Listage de la structure de la table hipposeries. user
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `gravatar` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table hipposeries.user : 5 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`userID`, `pseudo`, `email`, `gravatar`, `password`) VALUES
	(1, 'basspro', 'ylaurain@gmail.com', 'https://www.gravatar.com/avatar/6a5224f8d067a0ec01c25bb00f76a974?s=80&d=mp&r=g', 'ylaurain@gmail.com'),
	(2, 'jezvin', 'jezvin@gmail.com', 'https://www.gravatar.com/avatar/f8c83acc7e3606d682d5604a015ce3a4?s=80&d=mp&r=g', 'jezvin@gmail.com'),
	(3, 'mozo', 'm.ozeau@gmail.com', 'https://www.gravatar.com/avatar/da56580afc64bb374b1c64009a126555?s=80&d=mp&r=g', 'm.ozeau@gmail.com'),
	(4, 'cricri', 'leonchristelle@gmail.com', 'https://www.gravatar.com/avatar/328fa1afcdd537b11871a9f759255f7f?s=80&d=mp&r=g', 'leonchristelle@gmail.com'),
	(5, 'dorian', 'drnguillaume@gmail.com', 'https://www.gravatar.com/avatar/e471b8c97bf4f6b55fbbdd1e55b4d241?s=80&d=mp&r=g', 'drnguillaume@gmail.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

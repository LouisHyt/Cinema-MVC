-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema_louis
CREATE DATABASE IF NOT EXISTS `cinema_louis` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema_louis`;

-- Listage de la structure de table cinema_louis. actor
CREATE TABLE IF NOT EXISTS `actor` (
  `id_actor` int NOT NULL AUTO_INCREMENT,
  `id_person` int NOT NULL,
  PRIMARY KEY (`id_actor`),
  KEY `FK2` (`id_person`),
  CONSTRAINT `FK2` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.actor : ~0 rows (environ)
INSERT INTO `actor` (`id_actor`, `id_person`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5),
	(6, 6),
	(7, 7),
	(8, 8),
	(9, 9),
	(10, 10),
	(11, 11),
	(12, 12),
	(13, 13),
	(14, 14),
	(15, 15),
	(16, 16),
	(17, 17),
	(18, 18),
	(19, 19),
	(20, 20),
	(21, 31),
	(22, 34);

-- Listage de la structure de table cinema_louis. belongs
CREATE TABLE IF NOT EXISTS `belongs` (
  `id_movie` int DEFAULT NULL,
  `id_category` int DEFAULT NULL,
  KEY `FK_belongs_movie` (`id_movie`),
  KEY `FK_belongs_category` (`id_category`),
  CONSTRAINT `FK_belongs_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_belongs_movie` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.belongs : ~0 rows (environ)
INSERT INTO `belongs` (`id_movie`, `id_category`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 2),
	(5, 1),
	(6, 3),
	(7, 1),
	(8, 4),
	(9, 4),
	(10, 5),
	(11, 6),
	(12, 4),
	(13, 1),
	(14, 4),
	(15, 3);

-- Listage de la structure de table cinema_louis. casting_role
CREATE TABLE IF NOT EXISTS `casting_role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(70) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.casting_role : ~8 rows (environ)
INSERT INTO `casting_role` (`id_role`, `role_name`) VALUES
	(1, 'Héros'),
	(2, 'Méchant'),
	(3, 'Amoureuse'),
	(4, 'Traitre'),
	(5, 'Traqueur'),
	(6, 'Escroc'),
	(7, 'Le bon'),
	(8, 'Inspecteur');

-- Listage de la structure de table cinema_louis. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.category : ~0 rows (environ)
INSERT INTO `category` (`id_category`, `label`) VALUES
	(1, 'action'),
	(4, 'drama'),
	(2, 'romance'),
	(3, 'science-fiction'),
	(6, 'thriller'),
	(5, 'western');

-- Listage de la structure de table cinema_louis. director
CREATE TABLE IF NOT EXISTS `director` (
  `id_director` int NOT NULL AUTO_INCREMENT,
  `id_person` int NOT NULL,
  PRIMARY KEY (`id_director`),
  KEY `FK1` (`id_person`),
  CONSTRAINT `FK1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.director : ~0 rows (environ)
INSERT INTO `director` (`id_director`, `id_person`) VALUES
	(1, 21),
	(2, 22),
	(3, 23),
	(4, 24),
	(5, 25),
	(6, 26),
	(7, 27),
	(8, 28),
	(9, 29),
	(10, 30),
	(11, 31),
	(12, 32);

-- Listage de la structure de table cinema_louis. movie
CREATE TABLE IF NOT EXISTS `movie` (
  `id_movie` int NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `release_date` date NOT NULL,
  `duration` int NOT NULL,
  `synopsis` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `note` tinyint DEFAULT NULL,
  `poster_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_director` int DEFAULT NULL,
  PRIMARY KEY (`id_movie`),
  KEY `FK_movie_director` (`id_director`),
  CONSTRAINT `FK_movie_director` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.movie : ~0 rows (environ)
INSERT INTO `movie` (`id_movie`, `title`, `release_date`, `duration`, `synopsis`, `note`, `poster_image`, `id_director`) VALUES
	(1, 'Inception', '2010-07-16', 148, 'Un voleur qui pénètre dans les rêves des autres pour voler des secrets doit effectuer une dernière mission pour retrouver sa famille.', 4, 'inception.jpg', 3),
	(2, 'Pulp Fiction', '1994-10-14', 154, 'Trois histoires entrecroisées qui tournent autour du monde criminel de Los Angeles.', 5, 'pulp_fiction.jpg', 4),
	(3, 'The Matrix', '1999-03-31', 136, 'Un hacker découvre la vérité sur la réalité, qu\'elle est en fait une simulation contrôlée par des machines.', 4, 'matrix.jpg', 5),
	(4, 'Titanic', '1997-12-19', 195, 'Un riche héritier et une jeune femme de la classe ouvrière tombent amoureux à bord du tristement célèbre RMS Titanic.', 5, 'titanic.jpg', 1),
	(5, 'The Revenant', '2015-12-25', 156, 'Un trappeur survit à un ours et part en quête de vengeance contre un membre de son groupe qui l\'a laissé pour mort.', 5, 'revenant.jpg', 2),
	(6, 'Jurassic Park', '1993-06-11', 127, 'Un parc d\'attractions basé sur des dinosaures clonés devient un endroit dangereux après que les créateurs aient perdu le contrôle.', 4, 'jurassic_park.jpg', 5),
	(7, 'Gladiator', '2000-05-05', 155, 'Un général romain trahi se venge dans l\'arène du Colisée.', 4, 'gladiator.jpg', 6),
	(8, 'Catch Me If You Can', '2002-12-25', 141, 'Un jeune escroc de génie réussit à tromper des policiers et des autorités pendant plusieurs années.', 3, 'catch_me.jpg', 1),
	(9, 'Gran Torino', '2008-12-12', 116, 'Un vétéran de la guerre de Corée, en retraite, forme un lien avec un jeune voisin et le sauve des gangsters.', 4, 'gran_torino.jpg', 11),
	(10, 'Le Bon, la Brute et le Truand', '1966-12-23', 161, 'Trois hommes, un chasseur de primes, un bandit et un escroc, sont impliqués dans une course pour un trésor caché.', 2, 'le_bon_la_brute.jpg', 12),
	(11, 'Dirty Harry', '1971-12-23', 102, 'Un inspecteur de police de San Francisco, connu pour ses méthodes violentes, poursuit un tueur en série.', 5, 'dirty_harry.jpg', 12),
	(12, 'The wolf of wall street', '2013-12-25', 179, '\'histoire vraie qui a inspiré ce film, l\'histoire de Jordan Belfort, l\'un des plus grands escrocs de la Bourse américaine.', 4, 'the-wolf-of-wallstreet.png', 2),
	(13, 'The Time Warp', '2020-05-15', 150, 'A thrilling journey through time with stunning visuals.', 8, 'time_warp.jpg', 3),
	(14, 'The Last Witness', '2022-10-07', 135, 'A gripping tale about the last surviving witness of a historical event.', 7, 'last_witness.jpg', 2),
	(15, 'Space Odyssey', '2021-12-25', 160, 'A deep space exploration that challenges the limits of human survival.', 9, 'space_odyssey.jpg', 1);

-- Listage de la structure de table cinema_louis. person
CREATE TABLE IF NOT EXISTS `person` (
  `id_person` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `genre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.person : ~33 rows (environ)
INSERT INTO `person` (`id_person`, `first_name`, `last_name`, `birth_date`, `genre`) VALUES
	(1, 'Leonardo', 'DiCaprio', '1974-11-11', 'Homme'),
	(2, 'Brad', 'Pitt', '1963-12-18', 'Homme'),
	(3, 'Meryl', 'Streep', '1949-06-22', 'Femme'),
	(4, 'Tom', 'Hanks', '1956-07-09', 'Homme'),
	(5, 'Angelina', 'Jolie', '1975-06-04', 'Femme'),
	(6, 'Johnny', 'Depp', '1963-06-09', 'Homme'),
	(7, 'Charlize', 'Theron', '1975-08-07', 'Femme'),
	(8, 'Morgan', 'Freeman', '1937-06-01', 'Homme'),
	(9, 'Robert', 'De Niro', '1943-08-17', 'Homme'),
	(10, 'Al', 'Pacino', '1940-04-25', 'Homme'),
	(11, 'Scarlett', 'Johansson', '1984-11-22', 'Femme'),
	(12, 'Will', 'Smith', '1968-09-25', 'Homme'),
	(13, 'Jennifer', 'Lawrence', '1990-08-15', 'Femme'),
	(14, 'Kate', 'Winslet', '1975-10-05', 'Femme'),
	(15, 'Matthew', 'McConaughey', '1969-11-04', 'Homme'),
	(16, 'Natalie', 'Portman', '1981-06-09', 'Femme'),
	(17, 'Denzel', 'Washington', '1954-12-28', 'Homme'),
	(18, 'Julia', 'Roberts', '1967-10-28', 'Femme'),
	(19, 'Harrison', 'Ford', '1942-07-13', 'Homme'),
	(20, 'Samuel', 'L. Jackson', '1948-12-21', 'Homme'),
	(21, 'Steven', 'Spielberg', '1946-12-18', 'Homme'),
	(22, 'Martin', 'Scorsese', '1942-11-17', 'Homme'),
	(23, 'Christopher', 'Nolan', '1970-07-30', 'Homme'),
	(24, 'Quentin', 'Tarantino', '1963-03-27', 'Homme'),
	(25, 'Ridley', 'Scott', '1937-11-30', 'Homme'),
	(26, 'James', 'Cameron', '1954-08-16', 'Homme'),
	(27, 'Alfonso', 'Cuarón', '1961-11-28', 'Homme'),
	(28, 'Tim', 'Burton', '1958-08-25', 'Homme'),
	(29, 'Woody', 'Allen', '1935-12-01', 'Homme'),
	(30, 'Francis', 'Ford Coppola', '1939-04-07', 'Homme'),
	(31, 'Clint', 'Eastwood', '1930-11-05', 'Homme'),
	(32, 'Sergio', 'Leone', '1929-01-03', 'Homme'),
	(34, 'Tom', 'Hardy', '1977-09-11', 'Homme');

-- Listage de la structure de table cinema_louis. play
CREATE TABLE IF NOT EXISTS `play` (
  `id_movie` int DEFAULT NULL,
  `id_actor` int DEFAULT NULL,
  `id_role` int DEFAULT NULL,
  KEY `FK_play_movie` (`id_movie`),
  KEY `FK_play_actor` (`id_actor`),
  KEY `FK_play_role` (`id_role`),
  CONSTRAINT `FK_play_actor` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`),
  CONSTRAINT `FK_play_movie` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`),
  CONSTRAINT `FK_play_role` FOREIGN KEY (`id_role`) REFERENCES `casting_role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.play : ~0 rows (environ)
INSERT INTO `play` (`id_movie`, `id_actor`, `id_role`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(2, 3, 1),
	(1, 22, 2),
	(3, 5, 1),
	(3, 6, 2),
	(4, 7, 1),
	(4, 8, 3),
	(5, 9, 1),
	(5, 10, 4),
	(6, 11, 1),
	(6, 12, 2),
	(7, 13, 1),
	(7, 14, 2),
	(8, 15, 1),
	(8, 16, 5),
	(8, 17, 6),
	(8, 18, 2),
	(9, 21, 1),
	(10, 21, 7),
	(11, 21, 8),
	(12, 1, 6),
	(13, 1, 1),
	(14, 4, 1),
	(15, 16, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

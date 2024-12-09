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
  UNIQUE KEY `id_person` (`id_person`),
  KEY `FK2` (`id_person`),
  CONSTRAINT `FK2` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.actor : ~22 rows (environ)
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
	(22, 34),
	(23, 38),
	(24, 39),
	(25, 41);

-- Listage de la structure de table cinema_louis. belongs
CREATE TABLE IF NOT EXISTS `belongs` (
  `id_movie` int NOT NULL,
  `id_category` int NOT NULL,
  KEY `FK_belongs_movie` (`id_movie`),
  KEY `FK_belongs_category` (`id_category`),
  CONSTRAINT `FK_belongs_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE,
  CONSTRAINT `FK_belongs_movie` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.belongs : ~17 rows (environ)
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
	(14, 4),
	(15, 3),
	(4, 4);

-- Listage de la structure de table cinema_louis. casting_role
CREATE TABLE IF NOT EXISTS `casting_role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(70) NOT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.casting_role : ~8 rows (environ)
INSERT INTO `casting_role` (`id_role`, `role_name`) VALUES
	(3, 'Amoureuse'),
	(6, 'Escroc'),
	(1, 'Héros'),
	(8, 'Inspecteur'),
	(7, 'Le bon'),
	(2, 'Méchant'),
	(4, 'Traitre'),
	(5, 'Traqueur');

-- Listage de la structure de table cinema_louis. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.category : ~6 rows (environ)
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
  UNIQUE KEY `id_person` (`id_person`),
  KEY `FK1` (`id_person`),
  CONSTRAINT `FK1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.director : ~14 rows (environ)
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
	(12, 32),
	(14, 35),
	(16, 37);

-- Listage de la structure de table cinema_louis. movie
CREATE TABLE IF NOT EXISTS `movie` (
  `id_movie` int NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `release_date` date NOT NULL,
  `duration` int NOT NULL,
  `synopsis` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `note` tinyint DEFAULT NULL,
  `banner_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_director` int DEFAULT NULL,
  `poster_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_movie`),
  KEY `FK_movie_director` (`id_director`),
  CONSTRAINT `FK_movie_director` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.movie : ~17 rows (environ)
INSERT INTO `movie` (`id_movie`, `title`, `release_date`, `duration`, `synopsis`, `note`, `banner_image`, `id_director`, `poster_image`) VALUES
	(1, 'Inception', '2010-07-16', 148, 'Un voleur qui pénètre dans les rêves des autres pour voler des secrets doit effectuer une dernière mission pour retrouver sa famille.', 4, 'https://m.media-amazon.com/images/S/pv-target-images/1749d2da627a6f41612e33122d086631b7910595a7fedda06ccf97fa8034cd2e.jpg', 3, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/aej3LRUga5rhgkmRP6XMFw3ejbl.jpg'),
	(2, 'Pulp Fiction', '1994-10-14', 154, 'Trois histoires entrecroisées qui tournent autour du monde criminel de Los Angeles.', 5, 'https://image.over-blog.com/2WVCnbVoa39dcUkKNYCPRZlUJjU=/filters:no_upscale()/image%2F0660069%2F20240528%2Fob_b7d602_pulp-fiction-1.jpg', 4, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/4TBdF7nFw2aKNM0gPOlDNq3v3se.jpg'),
	(3, 'The Matrix', '1999-03-31', 136, 'Un hacker découvre la vérité sur la réalité, qu\'elle est en fait une simulation contrôlée par des machines.', 4, 'https://www.pieuvre.ca/wp-content/uploads/2021/05/the-matrix.jpeg', 5, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/pEoqbqtLc4CcwDUDqxmEDSWpWTZ.jpg'),
	(4, 'Titanic', '1997-12-19', 195, 'Un riche héritier et une jeune femme de la classe ouvrière tombent amoureux à bord du tristement célèbre RMS Titanic.', 5, 'https://img-4.linternaute.com/gXibvU04mvrFm4SLLewwttl2eP4=/1240x/smart/cf2bdbe164f748bc86216cc7102cc11b/ccmcms-linternaute/41669103.jpg', 1, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/vpsvHLkoeKUjceIMeNSqCp3xEyY.jpg'),
	(5, 'The Revenant', '2015-12-25', 156, 'Un trappeur survit à un ours et part en quête de vengeance contre un membre de son groupe qui l\'a laissé pour mort.', 5, 'https://cultureauxtrousses.com/wp-content/uploads/2017/12/the-revenant-2015-1200-1200-675-675-crop-000000.jpg', 2, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/AsDto68FNWNXD15Ov0yMXASJiSB.jpg'),
	(6, 'Jurassic Park', '1993-06-11', 127, 'Un parc d\'attractions basé sur des dinosaures clonés devient un endroit dangereux après que les créateurs aient perdu le contrôle.', 4, 'https://usbeketrica.com/media/112798/download/jurassic-park001.jpg?v=1&inline=1', 5, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/i268GVIlp777W1Ykws5R3LYYLIw.jpg'),
	(7, 'Gladiator', '2000-05-05', 155, 'Un général romain trahi se venge dans l\'arène du Colisée.', 4, 'https://www.premiere.fr/sites/default/files/styles/scale_crop_1280x720/public/2020-08/gladiator-sur-tmc-le-role-de-maximus-devait-revenir-a-un-autre-acteur.jpg', 6, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/3fDI4D5rWefyUs7kLcvyafwBEmZ.jpg'),
	(8, 'Catch Me If You Can', '2002-12-25', 141, 'Un jeune escroc de génie réussit à tromper des policiers et des autorités pendant plusieurs années.', 3, 'https://media.gqmagazine.fr/photos/60942793ecfef9b252a8742d/16:9/w_1280,c_limit/CATCH.jpg', 1, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/S2w6manFJTMiq0RdgMacSN3nee.jpg'),
	(9, 'Gran Torino', '2008-12-12', 116, 'Un vétéran de la guerre de Corée, en retraite, forme un lien avec un jeune voisin et le sauve des gangsters.', 4, 'https://lapepinieregeneve.ch/wp-content/uploads/2022/08/07.09-11h-Gran-Torino-Imhof-banner.jpg', 11, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/sVmDIIFPzbyEz87dZYpLfetn4Lm.jpg'),
	(10, 'Le Bon, la Brute et le Truand', '1966-12-23', 161, 'Trois hommes, un chasseur de primes, un bandit et un escroc, sont impliqués dans une course pour un trésor caché.', 2, 'https://www.radiofrance.fr/s3/cruiser-production/2016/12/bbc987be-f1bc-4ed8-9342-5b08fb311721/1200x680_mea.jpg', 12, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/qEr65B4yGlsmLQjcM0xjSUMfZS2.jpg'),
	(11, 'Dirty Harry', '1971-12-23', 102, 'Un inspecteur de police de San Francisco, connu pour ses méthodes violentes, poursuit un tueur en série.', 5, 'https://blog.culture31.com/wp-content/uploads/2024/07/inspecteur.jpg', 12, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/uMt4rA1ViG7DPG2GBrWCbuiLQfL.jpg'),
	(12, 'The wolf of wall street', '2013-12-25', 179, '\'histoire vraie qui a inspiré ce film, l\'histoire de Jordan Belfort, l\'un des plus grands escrocs de la Bourse américaine.', 4, 'https://media.lesechos.com/api/v1/images/view/5e2b0c1d3e45462a89639805/1280x720/0602636948274-web-tete.jpg', 2, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/dQIQZbJXn1pflQw3nwvXLJX0dHa.jpg'),
	(14, 'The Last Witness', '2022-10-07', 135, 'A gripping tale about the last surviving witness of a historical event.', 3, 'https://filmbirmingham.co.uk/wp-content/uploads/2019/05/DSCF1703.jpg', 2, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/v4d6UHuQ2gpsaN38pMSZ42Fj6hi.jpg'),
	(15, 'Space Odyssey', '2021-12-25', 160, 'A deep space exploration that challenges the limits of human survival.', 2, 'https://img.lemde.fr/2018/05/21/0/0/3302/1500/664/0/75/0/6f805ad_13806-9kya1e.ea819.jpg', 1, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/uwd79G32FPIL5B9UkRgSZvS0gbe.jpg'),
	(16, 'Dune : First part', '2021-09-15', 155, 'The story of Paul Atréides, a young man as gifted as he is brilliant, destined to experience an extraordinary destiny that completely surpasses him. Because, if he wants to preserve the future of his family and his people, he will have to go to Dune, the most dangerous planet in the Universe. But also the only one able to provide the most precious resource capable of increasing the power of Humanity tenfold. As evil forces vie for control of this planet, only those who can overcome their fear will be able to survive...', 5, 'https://blog.teufelaudio.fr/wp-content/uploads/2024/02/dune-2-imago415303603-2.jpg', 14, 'https://media.themoviedb.org/t/p/w300_and_h450_bestv2/qpyaW4xUPeIiYA5ckg5zAZFHvsb.jpg');

-- Listage de la structure de table cinema_louis. person
CREATE TABLE IF NOT EXISTS `person` (
  `id_person` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `genre` varchar(30) DEFAULT NULL,
  `profile_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `death_date` date DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.person : ~37 rows (environ)
INSERT INTO `person` (`id_person`, `first_name`, `last_name`, `birth_date`, `genre`, `profile_image`, `death_date`, `bio`) VALUES
	(1, 'Leonardo', 'DiCaprio', '1974-11-11', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Leonardo_Dicaprio_Cannes_2019.jpg/250px-Leonardo_Dicaprio_Cannes_2019.jpg', NULL, 'acteur de folie'),
	(2, 'Brad', 'Pitt', '1963-12-18', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Brad_Pitt-69858.jpg/240px-Brad_Pitt-69858.jpg', NULL, NULL),
	(3, 'Meryl', 'Streep', '1949-06-22', 'Female', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Meryl_Streep_December_2018_%28cropped%29.jpg/220px-Meryl_Streep_December_2018_%28cropped%29.jpg', NULL, NULL),
	(4, 'Tom', 'Hanks', '1956-07-09', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Tom_Hanks_at_the_Elvis_Premiere_2022.jpg/220px-Tom_Hanks_at_the_Elvis_Premiere_2022.jpg', NULL, NULL),
	(5, 'Angelina', 'Jolie', '1975-06-04', 'Female', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Angelina_Jolie-643531_%28cropped%29.jpg/240px-Angelina_Jolie-643531_%28cropped%29.jpg', NULL, NULL),
	(6, 'Johnny', 'Depp', '1963-06-09', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Johnny_Depp_2020.jpg/260px-Johnny_Depp_2020.jpg', NULL, NULL),
	(7, 'Charlize', 'Theron', '1975-08-07', 'Female', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Charlize-theron-IMG_6045.jpg/220px-Charlize-theron-IMG_6045.jpg', NULL, NULL),
	(8, 'Morgan', 'Freeman', '1937-06-01', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Morgan_Freeman_Deauville_2018.jpg/260px-Morgan_Freeman_Deauville_2018.jpg', NULL, NULL),
	(9, 'Robert', 'De Niro', '1943-08-17', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Robert_De_Niro_Cannes_2016_2.jpg/220px-Robert_De_Niro_Cannes_2016_2.jpg', NULL, NULL),
	(10, 'Al', 'Pacino', '1940-04-25', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Al_Pacino_2016_%2830401544240%29.jpg/260px-Al_Pacino_2016_%2830401544240%29.jpg', NULL, NULL),
	(11, 'Scarlett', 'Johansson', '1984-11-22', 'Female', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Scarlett_Johansson_by_Gage_Skidmore_2_%28cropped%2C_2%29.jpg/220px-Scarlett_Johansson_by_Gage_Skidmore_2_%28cropped%2C_2%29.jpg', NULL, NULL),
	(12, 'Will', 'Smith', '1968-09-25', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/TechCrunch_Disrupt_2019_%2848834434641%29_%28cropped%29.jpg/220px-TechCrunch_Disrupt_2019_%2848834434641%29_%28cropped%29.jpg', NULL, NULL),
	(13, 'Jennifer', 'Lawrence', '1990-08-15', 'Female', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Jennifer_Lawrence_at_the_2024_Golden_Globes_%281%29.png/220px-Jennifer_Lawrence_at_the_2024_Golden_Globes_%281%29.png', NULL, NULL),
	(14, 'Kate', 'Winslet', '1975-10-05', 'Female', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Kate_Winslet_March_18%2C_2014_%28headshot%29.jpg/250px-Kate_Winslet_March_18%2C_2014_%28headshot%29.jpg', NULL, NULL),
	(15, 'Matthew', 'McConaughey', '1969-11-04', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Matthew_McConaughey_2019_%2848648344772%29.jpg/240px-Matthew_McConaughey_2019_%2848648344772%29.jpg', NULL, NULL),
	(16, 'Natalie', 'Portman', '1981-06-09', 'Female', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Natalie_Portman_2023.jpg/220px-Natalie_Portman_2023.jpg', NULL, NULL),
	(17, 'Denzel', 'Washington', '1954-12-28', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Denzel_Washington_2018.jpg/220px-Denzel_Washington_2018.jpg', NULL, NULL),
	(18, 'Julia', 'Roberts', '1967-10-28', 'Female', 'https://media.vogue.fr/photos/637fa141013167a160d7f503/2:3/w_2560%2Cc_limit/MCDEAPR_EC103.jpg', NULL, NULL),
	(19, 'Harrison', 'Ford', '1942-07-13', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Harrison_Ford_by_Gage_Skidmore_2.jpg/250px-Harrison_Ford_by_Gage_Skidmore_2.jpg', NULL, NULL),
	(20, 'Samuel', 'L. Jackson', '1948-12-21', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/SamuelLJackson.jpg/220px-SamuelLJackson.jpg', NULL, NULL),
	(21, 'Steven', 'Spielberg', '1946-12-18', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/MKr25402_Steven_Spielberg_%28Berlinale_2023%29.jpg/260px-MKr25402_Steven_Spielberg_%28Berlinale_2023%29.jpg', NULL, NULL),
	(22, 'Martin', 'Scorsese', '1942-11-17', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Martin_Scorsese_Berlinale_2010_%28cropped2%29.jpg/260px-Martin_Scorsese_Berlinale_2010_%28cropped2%29.jpg', NULL, NULL),
	(23, 'Christopher', 'Nolan', '1970-07-30', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Christopher_Nolan_Cannes_2018.jpg/260px-Christopher_Nolan_Cannes_2018.jpg', NULL, NULL),
	(24, 'Quentin', 'Tarantino', '1963-03-27', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Quentin_Tarantino_by_Gage_Skidmore.jpg/220px-Quentin_Tarantino_by_Gage_Skidmore.jpg', NULL, NULL),
	(25, 'Ridley', 'Scott', '1937-11-30', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Ridley_Scott_%286998769387%29.jpg/220px-Ridley_Scott_%286998769387%29.jpg', NULL, NULL),
	(26, 'James', 'Cameron', '1954-08-16', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/James_Cameron_by_Gage_Skidmore.jpg/290px-James_Cameron_by_Gage_Skidmore.jpg', NULL, NULL),
	(27, 'Alfonso', 'Cuarón', '1961-11-28', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Alfonso_Cuar%C3%B3n%2C_President_jury_Venezia_72_%2825805089406%29_%28cropped%29.jpg/220px-Alfonso_Cuar%C3%B3n%2C_President_jury_Venezia_72_%2825805089406%29_%28cropped%29.jpg', NULL, NULL),
	(28, 'Tim', 'Burton', '1958-08-25', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Tim_Burton-63605.jpg/220px-Tim_Burton-63605.jpg', NULL, NULL),
	(29, 'Woody', 'Allen', '1935-12-01', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Woody-Allen-2015-07-18-by-Adam-Bielawski.jpg/260px-Woody-Allen-2015-07-18-by-Adam-Bielawski.jpg', NULL, NULL),
	(30, 'Francis', 'Ford Coppola', '1939-04-07', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Francis_Ford_Coppola_2011_CC.jpg/220px-Francis_Ford_Coppola_2011_CC.jpg', NULL, NULL),
	(31, 'Clint', 'Eastwood', '1930-11-05', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Clint_Eastwood_at_2010_New_York_Film_Festival.jpg/220px-Clint_Eastwood_at_2010_New_York_Film_Festival.jpg', NULL, NULL),
	(32, 'Sergio', 'Leone', '1929-01-03', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Sergio_Leone.jpg/260px-Sergio_Leone.jpg', '1989-04-30', NULL),
	(34, 'Tom', 'Hardy', '1977-09-11', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Tom_Hardy_by_Gage_Skidmore.jpg/260px-Tom_Hardy_by_Gage_Skidmore.jpg', NULL, NULL),
	(35, 'Denis', 'Villeneuve', '1967-10-03', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Denis_Villeneuve_by_Gage_Skidmore.jpg/260px-Denis_Villeneuve_by_Gage_Skidmore.jpg', NULL, NULL),
	(37, 'Chuck', 'Russel', '2020-12-05', 'Male', 'https://m.media-amazon.com/images/M/MV5BZDhkZDdhMDEtYWJkYi00MTZkLWJlMmMtY2ZkOWIzODhlMjhlXkEyXkFqcGc@._V1_.jpg', NULL, NULL),
	(38, 'Jim', 'Carrey', '1962-01-17', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Jim_Carrey_2008.jpg/220px-Jim_Carrey_2008.jpg', NULL, NULL),
	(39, 'Peter', 'Greene', '1965-10-08', 'Male', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Peter_Greene_2014.jpg/220px-Peter_Greene_2014.jpg', NULL, NULL),
	(41, 'Louis', 'Hayotte', '1997-08-04', 'Male', 'https://t4.ftcdn.net/jpg/06/10/19/43/360_F_610194339_3CtGOkv4wIiAyybcib4IrFX0nnc83Bv6.jpg', '1999-09-04', 'test');

-- Listage de la structure de table cinema_louis. play
CREATE TABLE IF NOT EXISTS `play` (
  `id_movie` int NOT NULL,
  `id_actor` int NOT NULL,
  `id_role` int DEFAULT NULL,
  KEY `FK_play_movie` (`id_movie`),
  KEY `FK_play_actor` (`id_actor`),
  KEY `FK_play_role` (`id_role`),
  CONSTRAINT `FK_play_actor` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`) ON DELETE CASCADE,
  CONSTRAINT `FK_play_casting_role` FOREIGN KEY (`id_role`) REFERENCES `casting_role` (`id_role`) ON DELETE SET NULL,
  CONSTRAINT `FK_play_movie` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_louis.play : ~26 rows (environ)
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
	(14, 4, 1),
	(15, 16, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

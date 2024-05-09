-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para peliculas
CREATE DATABASE IF NOT EXISTS `peliculas` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `peliculas`;

-- Volcando estructura para tabla peliculas.peliculas
CREATE TABLE IF NOT EXISTS `peliculas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `estreno` date DEFAULT NULL,
  `duracion` varchar(50) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla peliculas.peliculas: ~9 rows (aproximadamente)
INSERT INTO `peliculas` (`id`, `titulo`, `estreno`, `duracion`, `genero`, `poster`, `rating`) VALUES
	(1, 'Avatar', '2009-12-18', '162 min', 'Action, Adventure, Fantasy', 'http://ia.media-imdb.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg', 7.9),
	(2, 'I Am Legend', '2007-12-14', '101 min', 'Drama, Horror, Sci-Fi', 'http://ia.media-imdb.com/images/M/MV5BMTU4NzMyNDk1OV5BMl5BanBnXkFtZTcwOTEwMzU1MQ@@._V1_SX300.jpg', 7.2),
	(3, '300', '2007-03-09', '117 min', 'Action, Drama, Fantasy', 'http://ia.media-imdb.com/images/M/MV5BMjAzNTkzNjcxNl5BMl5BanBnXkFtZTYwNDA4NjE3._V1_SX300.jpg', 7.7),
	(4, 'The Avengers', '2012-05-04', '143 min', 'Action, Sci-Fi, Thriller', 'http://ia.media-imdb.com/images/M/MV5BMTk2NTI1MTU4N15BMl5BanBnXkFtZTcwODg0OTY0Nw@@._V1_SX300.jpg', 8.1),
	(5, 'The Wolf of Wall Street', '2013-12-25', '180 min', 'Biography, Comedy, Crime', 'http://ia.media-imdb.com/images/M/MV5BMjIxMjgxNTk0MF5BMl5BanBnXkFtZTgwNjIyOTg2MDE@._V1_SX300.jpg', 8.2),
	(6, 'Interstellar', '2014-11-07', '169 min', 'Adventure, Drama, Sci-Fi', 'http://ia.media-imdb.com/images/M/MV5BMjIxNTU4MzY4MF5BMl5BanBnXkFtZTgwMzM4ODI3MjE@._V1_SX300.jpg', 8.6),
	(7, 'Doctor Strange', '2016-11-04', NULL, 'Action, Adventure, Fantasy', 'http://ia.media-imdb.com/images/M/MV5BNjgwNzAzNjk1Nl5BMl5BanBnXkFtZTgwMzQ2NjI1OTE@._V1_SX300.jpg', 2.0),
	(8, 'Rogue One: A Star Wars Story', '2016-12-16', NULL, 'Action, Adventure, Sci-Fi', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjQyMzI2OTA3OF5BMl5BanBnXkFtZTgwNDg5NjQ0OTE@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 8.0),
	(9, 'Assassin\'s Creed', '2016-12-21', NULL, 'Action, Adventure, Fantasy', 'http://ia.media-imdb.com/images/M/MV5BMTU2MTQwMjU1OF5BMl5BanBnXkFtZTgwMDA5NjU5ODE@._V1_SX300.jpg', 9.0);

-- actualize los posters porque en mi pc no se veían, me generaban un 403 al entrar.
UPDATE peliculas SET poster = 'https://image.tmdb.org/t/p/original/jRXYjXNq0Cs2TcJjLkki24MLp7u.jpg' WHERE id = 1;
UPDATE peliculas SET poster = 'https://picfiles.alphacoders.com/349/thumb-1920-349906.jpg' WHERE id = 2;
UPDATE peliculas SET poster = 'https://www.themoviedb.org/t/p/original/1Gu1IzSzlqvFuoVEfHqzQxRPOGi.jpg' WHERE id = 3;
UPDATE peliculas SET poster = 'https://www.themoviedb.org/t/p/original/pdhOE0NAZaPzjsgTvatRP1xFhG3.jpg' WHERE id = 4;
UPDATE peliculas SET poster = 'https://jonwatchesmovies.wordpress.com/wp-content/uploads/2013/12/the-wolf-of-wall-street.jpg' WHERE id = 5;
UPDATE peliculas SET poster = 'https://s3.amazonaws.com/nightjarprod/content/uploads/sites/130/2021/08/19085635/gEU2QniE6E77NI6lCU6MxlNBvIx-scaled.jpg' WHERE id = 6;
UPDATE peliculas SET poster = 'https://image.tmdb.org/t/p/original/mcn70dvUJigvXygc5DByUCJZBua.jpg' WHERE id = 7;
UPDATE peliculas SET poster = 'https://image.tmdb.org/t/p/original/ixCLh6nKAB7r0dAsKF8hdNabD2V.jpg' WHERE id = 8;
UPDATE peliculas SET poster = 'https://www.themoviedb.org/t/p/original/kcVsrUyHfgcEb0M7HEt3XZI3tVd.jpg' WHERE id = 9;
/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

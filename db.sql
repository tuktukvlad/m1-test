-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.38 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных m1-test
CREATE DATABASE IF NOT EXISTS `m1-test` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `m1-test`;

-- Дамп структуры для таблица m1-test.audio
CREATE TABLE IF NOT EXISTS `audio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `artist` char(255) NOT NULL,
  `duration` time NOT NULL,
  `image` char(255) DEFAULT NULL,
  `cost` float NOT NULL,
  `purchase_date` date NOT NULL,
  `storage` varchar(255) DEFAULT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы m1-test.audio: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `audio` DISABLE KEYS */;
REPLACE INTO `audio` (`id`, `name`, `artist`, `duration`, `image`, `cost`, `purchase_date`, `storage`, `year`) VALUES
	(1, 'Carnal Mind', 'L-Side', '01:17:35', '/uploads/1.jpg', 17.55, '2018-09-30', '', '2017'),
	(35, 'Funky House', 'MH', '01:59:00', '/uploads/35.jpg', 15.56, '2018-04-02', '', '2018');
/*!40000 ALTER TABLE `audio` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

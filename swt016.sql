-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Versie:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Databasestructuur van swt wordt geschreven
CREATE DATABASE IF NOT EXISTS `swt` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `swt`;

-- Structuur van  tabel swt.accounts wordt geschreven
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_admin` int(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel swt.accounts: ~3 rows (ongeveer)
INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `is_admin`) VALUES
	(1, 'test', 'test', 'test@test.com', 0),
	(4, 'Dirk', 'Dirk123', 'dirk.schaafstra@gmail.com', 1),
	(6, 'paulo', 'paulo123', 'paulo@test.com', 2);

-- Structuur van  tabel swt.submits wordt geschreven
CREATE TABLE IF NOT EXISTS `submits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(50) DEFAULT 'ID',
  `artist` varchar(50) DEFAULT 'ID',
  `link` varchar(255) DEFAULT 'Geen link',
  `comment` text DEFAULT 'Geen comment',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel swt.submits: ~0 rows (ongeveer)
INSERT INTO `submits` (`id`, `titel`, `artist`, `link`, `comment`, `date`) VALUES
	(1, 'ID', 'Rulius', 'Geen link', 'Geen comment', '2023-06-05');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

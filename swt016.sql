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

-- Structuur van  tabel swt.accounts wordt geschreven
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_admin` int(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel swt.accounts: ~1 rows (ongeveer)
INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `is_admin`) VALUES
	(9, 'Dirk', '$2y$10$V8qSnekrK9RdHFKGe8lpueRb5la/ocOrck8IqQb/5MrlKmt0JpfVi', 'dirk.schaafstra@gmail.com', 1);

-- Structuur van  tabel swt.submits wordt geschreven
CREATE TABLE IF NOT EXISTS `submits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `artists` varchar(50) DEFAULT NULL,
  `public_title` varchar(50) DEFAULT 'ID',
  `discord` varchar(255) NOT NULL DEFAULT 'No Discord',
  `genre` varchar(50) DEFAULT NULL,
  `bpm` varchar(50) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT 'No instagram',
  `link` varchar(255) DEFAULT 'No Link',
  `comment` text DEFAULT 'No comment',
  `date` date DEFAULT NULL,
  `view` int(11) DEFAULT 0,
  `userID` int(11) DEFAULT NULL,
  `aod` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`),
  CONSTRAINT `FK_submits_accounts` FOREIGN KEY (`userID`) REFERENCES `accounts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel swt.submits: ~0 rows (ongeveer)
INSERT INTO `submits` (`id`, `email`, `artists`, `public_title`, `discord`, `genre`, `bpm`, `instagram`, `link`, `comment`, `date`, `view`, `userID`, `aod`) VALUES
	(15, 'dirk.schaafstra@gmail.com', 'Dirk.', 'ID - ID', '', 'Future Bounce', '128', '', 'https://dirkschaafstra.nl', '', NULL, 1, 9, 1);

-- Structuur van  tabel swt.submit_a wordt geschreven
CREATE TABLE IF NOT EXISTS `submit_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel swt.submit_a: ~20 rows (ongeveer)
INSERT INTO `submit_a` (`id`, `sub_id`) VALUES
	(23, 15);

-- Structuur van  tabel swt.submit_r wordt geschreven
CREATE TABLE IF NOT EXISTS `submit_r` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel swt.submit_r: ~0 rows (ongeveer)
INSERT INTO `submit_r` (`id`, `sub_id`) VALUES
	(162, 12);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

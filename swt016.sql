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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel swt.submits: ~2 rows (ongeveer)
INSERT INTO `submits` (`id`, `email`, `artists`, `public_title`, `discord`, `genre`, `bpm`, `instagram`, `link`, `comment`, `date`, `view`) VALUES
	(1, 'dirk.schaafstra@gmail.com', 'Dirk, Rulius', 'ID', 'Dirk.#4339', 'Progressive House', '128', 'Dirk.mp3', 'https://soundcloud.com/musicbydirk/prog-dirk-rulius/s-nzeeq7eaCT4?si=dabe5f1aa1dd487e96690e6183b5842f&utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam cursus vehicula commodo. Proin porttitor fringilla purus, ac aliquet nunc molestie sed. Nam molestie lorem ac sem condimentum euismod. Morbi eget faucibus lorem, ut efficitur risus. Proin nisl diam, maximus sed lorem quis, iaculis pretium tortor. Praesent at vestibulum neque. Duis.', '2023-06-07', 0),
	(2, NULL, NULL, 'ID', 'No Discord', NULL, NULL, 'No instagram', 'No Link', 'No comment', '2023-06-08', 1),
	(3, '', '', 'ID-ID', '', '', '128', '', '', '', NULL, 0),
	(4, '', '', 'ID-ID', '', '', '128', '', '', '', NULL, 1),
	(5, '', '', 'Artist(s) - ID', '', '', '128', '', '', '', NULL, 1),
	(6, 'dirk@test.com', 'Dirk, Rulius', 'ID - ID', 'Dirk.#4339', 'Progressive House', '128', 'Dirk.mp3, Rulius', 'bla bla', 'Niks te zeggen', NULL, 1);

-- Structuur van  tabel swt.submit_a wordt geschreven
CREATE TABLE IF NOT EXISTS `submit_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel swt.submit_a: ~1 rows (ongeveer)
INSERT INTO `submit_a` (`id`, `sub_id`) VALUES
	(22, 1),
	(23, 3),
	(24, 5),
	(25, 4),
	(26, 6);

-- Structuur van  tabel swt.submit_r wordt geschreven
CREATE TABLE IF NOT EXISTS `submit_r` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel swt.submit_r: ~20 rows (ongeveer)
INSERT INTO `submit_r` (`id`, `sub_id`) VALUES
	(161, 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

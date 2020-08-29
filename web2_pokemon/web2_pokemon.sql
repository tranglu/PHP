-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2020 at 04:34 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2_pokemon`
--

-- --------------------------------------------------------

--
-- Table structure for table `dsbat`
--

DROP TABLE IF EXISTS `dsbat`;
CREATE TABLE IF NOT EXISTS `dsbat` (
  `manguoichoi` int(11) NOT NULL,
  `mapokemon` int(11) NOT NULL,
  `ngaybat` datetime NOT NULL,
  UNIQUE KEY `manguoichoi` (`manguoichoi`,`mapokemon`,`ngaybat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dsbat`
--

INSERT INTO `dsbat` (`manguoichoi`, `mapokemon`, `ngaybat`) VALUES
(147, 1, '2020-06-06 13:25:19'),
(147, 1, '2020-06-06 13:25:28'),
(147, 1, '2020-06-06 13:25:54'),
(147, 2, '2020-06-06 13:43:24'),
(147, 3, '2020-06-06 13:04:49'),
(147, 4, '2020-06-06 13:51:12'),
(147, 4, '2020-06-06 14:22:30'),
(147, 4, '2020-06-06 14:22:32'),
(147, 5, '2020-06-06 13:11:46'),
(147, 6, '2020-06-06 13:15:48'),
(147, 6, '2020-06-06 13:25:16'),
(147, 6, '2020-06-06 14:22:35'),
(147, 6, '2020-06-06 14:22:44'),
(147, 7, '2020-06-06 13:12:47'),
(147, 7, '2020-06-06 13:13:25'),
(147, 7, '2020-06-06 13:25:59'),
(147, 7, '2020-06-06 13:48:03'),
(147, 7, '2020-06-06 13:49:52'),
(147, 7, '2020-06-06 13:50:39'),
(147, 7, '2020-06-06 14:22:35'),
(147, 7, '2020-06-06 14:22:36'),
(147, 8, '2020-06-06 13:26:37'),
(147, 8, '2020-06-06 13:35:43'),
(147, 8, '2020-06-06 13:40:06'),
(147, 8, '2020-06-06 13:41:18'),
(147, 8, '2020-06-06 13:43:07'),
(147, 8, '2020-06-06 13:46:08'),
(147, 8, '2020-06-06 13:46:23'),
(149, 2, '2020-06-06 14:23:12'),
(149, 2, '2020-06-06 14:23:18'),
(149, 5, '2020-06-06 14:23:12'),
(149, 6, '2020-06-06 14:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `nguoichoi`
--

DROP TABLE IF EXISTS `nguoichoi`;
CREATE TABLE IF NOT EXISTS `nguoichoi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ngaychoi` datetime DEFAULT NULL,
  `soluongbat` int(255) DEFAULT NULL,
  `toadox` int(255) DEFAULT NULL,
  `toadoy` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nguoichoi`
--

INSERT INTO `nguoichoi` (`id`, `ngaychoi`, `soluongbat`, `toadox`, `toadoy`) VALUES
(147, '2020-06-06 10:04:34', 25, 2, 2),
(148, '2020-06-06 14:23:03', 0, 8, 4),
(149, '2020-06-06 14:23:05', 3, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE IF NOT EXISTS `pokemon` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tenpokemon` varchar(255) DEFAULT NULL,
  `toadox` int(2) DEFAULT NULL,
  `toadoy` int(2) DEFAULT NULL,
  `urlhinh` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`id`, `tenpokemon`, `toadox`, `toadoy`, `urlhinh`) VALUES
(1, 'poke1', 5, 4, 'pokemon\\poke1.jpg'),
(2, 'poke2', 2, 3, 'pokemon\\poke2.png'),
(3, 'poke3', 4, 6, 'pokemon\\poke3.jpg'),
(4, 'poke4', 1, 1, 'pokemon\\poke4.png'),
(5, 'poke5', 8, 8, 'pokemon\\poke5.gif'),
(6, 'poke6', 2, 7, 'pokemon\\poke6.jpg'),
(7, 'poke7', 6, 3, 'pokemon\\poke7.png'),
(8, 'poke8', 9, 10, 'pokemon\\poke8.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

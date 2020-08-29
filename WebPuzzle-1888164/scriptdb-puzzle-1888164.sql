-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: Jun 07, 2020 at 02:33 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puzzle-1888164`
--

-- --------------------------------------------------------

--
-- Table structure for table `hinhghep`
--

DROP TABLE IF EXISTS `hinhghep`;
CREATE TABLE IF NOT EXISTS `hinhghep` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `tenhinhghep` varchar(25) COLLATE utf8_bin NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `cot` int(5) NOT NULL,
  `dong` int(5) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `hinhghep`
--

INSERT INTO `hinhghep` (`pid`, `tenhinhghep`, `url`, `cot`, `dong`) VALUES
(1, 'a', 'images/a.jpg', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `luotchoi`
--

DROP TABLE IF EXISTS `luotchoi`;
CREATE TABLE IF NOT EXISTS `luotchoi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `thoigianbd` datetime NOT NULL,
  `thoigiankt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `luotchoi`
--

INSERT INTO `luotchoi` (`id`, `pid`, `thoigianbd`, `thoigiankt`) VALUES
(1, 1, '2020-06-07 06:00:00', '2020-06-07 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `manhghep`
--

DROP TABLE IF EXISTS `manhghep`;
CREATE TABLE IF NOT EXISTS `manhghep` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `thuocpid` int(10) NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `x` int(10) NOT NULL,
  `y` int(10) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `manhghep`
--

INSERT INTO `manhghep` (`mid`, `thuocpid`, `url`, `x`, `y`) VALUES
(1, 1, 'images/a1.jpg', 1, 1),
(2, 1, 'images/a2.jpg', 1, 2),
(3, 1, 'images/a3.jpg', 2, 1),
(4, 1, 'images/a1.jpg', 2, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

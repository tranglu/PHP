-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th9 03, 2020 lúc 02:27 PM
-- Phiên bản máy phục vụ: 8.0.18
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `puzzle-1888180`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhghep`
--

DROP TABLE IF EXISTS `hinhghep`;
CREATE TABLE IF NOT EXISTS `hinhghep` (
  `PID` int(255) NOT NULL AUTO_INCREMENT,
  `TenHinhGhep` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `Cot` int(255) NOT NULL,
  `Dong` int(255) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhghep`
--

INSERT INTO `hinhghep` (`PID`, `TenHinhGhep`, `URL`, `Cot`, `Dong`) VALUES
(1, 'H01', 'Image\\cun-con.jpg', 2, 2),
(2, 'H02', 'Image\\cuncon.jpg', 4, 2),
(3, 'H03', 'Image\\hoa-hong.jpg', 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luotchoi`
--

DROP TABLE IF EXISTS `luotchoi`;
CREATE TABLE IF NOT EXISTS `luotchoi` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `PID` int(255) NOT NULL,
  `ThoigianBD` datetime NOT NULL,
  `ThoigianKT` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `luotchoi`
--

INSERT INTO `luotchoi` (`ID`, `PID`, `ThoigianBD`, `ThoigianKT`) VALUES
(1, 1, '2020-08-29 11:24:15', '2020-08-29 11:24:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manhghep`
--

DROP TABLE IF EXISTS `manhghep`;
CREATE TABLE IF NOT EXISTS `manhghep` (
  `MID` int(255) NOT NULL AUTO_INCREMENT,
  `ThuocPID` int(255) NOT NULL,
  `URLMG` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `x` int(255) NOT NULL,
  `y` int(255) NOT NULL,
  PRIMARY KEY (`MID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `manhghep`
--

INSERT INTO `manhghep` (`MID`, `ThuocPID`, `URLMG`, `x`, `y`) VALUES
(1, 1, 'Image\\cun-con-1.jpg', 0, 0),
(2, 1, 'Image\\cun-con-2.jpg', 1, 0),
(3, 1, 'Image\\cun-con-3.jpg', 0, 1),
(4, 1, 'Image\\cun-con-4.jpg', 1, 1),
(5, 2, 'Image\\cuncon-1.jpg', 0, 0),
(6, 2, 'Image\\cuncon-2.jpg', 1, 0),
(7, 2, 'Image\\cuncon-3.jpg', 1, 0),
(8, 2, 'Image\\cuncon-4.jpg', 1, 1),
(9, 3, 'Image\\hoa-hong-1.jpg', 0, 0),
(10, 3, 'Image\\hoa-hong-2.jpg', 1, 0),
(11, 3, 'Image\\hoa-hong-3.jpg', 0, 1),
(12, 3, 'Image\\hoa-hong-4.jpg', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

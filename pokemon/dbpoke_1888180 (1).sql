-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th9 03, 2020 lúc 02:26 PM
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
-- Cơ sở dữ liệu: `dbpoke_1888180`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsbat`
--

DROP TABLE IF EXISTS `dsbat`;
CREATE TABLE IF NOT EXISTS `dsbat` (
  `MaNguoiChoi` int(11) NOT NULL,
  `MaPokemon` int(11) NOT NULL,
  `NgayBat` datetime NOT NULL,
  PRIMARY KEY (`MaNguoiChoi`,`MaPokemon`,`NgayBat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `dsbat`
--

INSERT INTO `dsbat` (`MaNguoiChoi`, `MaPokemon`, `NgayBat`) VALUES
(1, 1, '2020-08-08 00:00:00'),
(1, 1, '2020-08-28 10:05:36'),
(1, 1, '2020-08-28 10:05:55'),
(1, 1, '2020-08-28 10:06:12'),
(1, 1, '2020-08-28 10:06:42'),
(1, 1, '2020-08-28 10:06:46'),
(1, 1, '2020-08-28 10:11:41'),
(1, 1, '2020-08-28 10:11:46'),
(1, 1, '2020-08-28 10:11:59'),
(1, 1, '2020-08-28 10:16:29'),
(1, 1, '2020-08-28 10:16:40'),
(1, 1, '2020-08-28 10:17:53'),
(1, 4, '2020-08-28 09:56:01'),
(1, 4, '2020-08-28 09:58:32'),
(1, 7, '2020-08-28 02:49:54'),
(1, 8, '2020-08-28 02:53:22'),
(1, 8, '2020-08-28 10:05:20'),
(2, 3, '2020-08-26 00:00:00'),
(2, 6, '2020-08-26 00:00:00'),
(165, 8, '2020-08-28 10:34:59'),
(201, 1, '2020-08-28 11:19:06'),
(206, 5, '2020-08-28 11:22:34'),
(238, 3, '2020-08-29 11:44:02'),
(238, 4, '2020-08-29 11:44:22'),
(242, 1, '2020-08-29 08:41:42'),
(242, 4, '2020-08-29 08:41:56'),
(244, 4, '2020-08-29 09:06:14'),
(245, 4, '2020-08-30 05:25:48'),
(245, 5, '2020-08-30 05:24:18'),
(246, 1, '2020-08-30 05:36:05'),
(246, 2, '2020-08-30 05:35:16'),
(246, 3, '2020-08-30 05:36:05'),
(246, 7, '2020-08-30 05:37:27'),
(246, 7, '2020-08-30 05:38:22'),
(247, 2, '2020-08-30 05:58:32'),
(247, 3, '2020-08-30 05:40:25'),
(247, 3, '2020-08-30 05:41:42'),
(247, 3, '2020-08-30 05:43:34'),
(247, 3, '2020-08-30 05:46:20'),
(247, 3, '2020-08-30 05:46:56'),
(247, 3, '2020-08-30 05:47:24'),
(247, 3, '2020-08-30 05:55:48'),
(247, 3, '2020-08-30 05:56:45'),
(247, 5, '2020-08-30 05:48:44'),
(247, 5, '2020-08-30 05:55:09'),
(247, 7, '2020-08-30 05:40:55'),
(247, 7, '2020-08-30 05:47:05'),
(247, 7, '2020-08-30 05:57:06'),
(249, 1, '2020-08-30 06:10:36'),
(249, 2, '2020-08-30 06:10:05'),
(249, 3, '2020-08-30 06:11:12'),
(251, 1, '2020-08-30 07:58:07'),
(251, 4, '2020-08-30 07:57:24'),
(251, 5, '2020-08-30 07:30:59'),
(251, 5, '2020-08-30 07:33:21'),
(251, 5, '2020-08-30 07:59:55'),
(251, 7, '2020-08-30 07:31:43'),
(251, 7, '2020-08-30 08:00:33'),
(251, 8, '2020-08-30 07:59:11'),
(252, 1, '2020-08-30 08:05:29'),
(252, 3, '2020-08-30 08:04:12'),
(252, 4, '2020-08-30 08:03:45'),
(252, 5, '2020-08-30 08:06:24'),
(252, 6, '2020-08-30 08:03:22'),
(252, 7, '2020-08-30 08:06:34'),
(252, 8, '2020-08-30 08:06:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoichoi`
--

DROP TABLE IF EXISTS `nguoichoi`;
CREATE TABLE IF NOT EXISTS `nguoichoi` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `NgayChoi` datetime NOT NULL,
  `SoLuongBat` int(255) NOT NULL,
  `ToaDoX` int(255) NOT NULL,
  `ToaDoY` int(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoichoi`
--

INSERT INTO `nguoichoi` (`Id`, `NgayChoi`, `SoLuongBat`, `ToaDoX`, `ToaDoY`) VALUES
(1, '2020-08-08 00:00:00', 16, 2, 2),
(2, '2020-08-26 00:00:00', 2, 5, 6),
(252, '2020-08-30 08:03:08', 6, 1, 9),
(251, '2020-08-30 07:30:18', 8, 9, 11),
(250, '2020-08-30 07:21:42', 0, 3, 11),
(249, '2020-08-30 06:07:37', 3, 11, 10),
(248, '2020-08-30 06:06:42', 0, 7, 5),
(247, '2020-08-30 05:40:08', 14, 1, 10),
(246, '2020-08-30 05:34:56', 4, 2, 11),
(245, '2020-08-30 05:20:39', 2, 3, 11),
(244, '2020-08-29 09:06:03', 1, 3, 5),
(243, '2020-08-29 08:43:28', 0, 8, 9),
(242, '2020-08-29 08:40:30', 2, 3, 5),
(241, '2020-08-29 08:33:56', 0, 7, 7),
(240, '2020-08-29 08:30:59', 0, 9, 9),
(239, '2020-08-29 08:29:36', 0, 4, 1),
(238, '2020-08-29 11:37:22', 2, 3, 5),
(237, '2020-08-29 11:36:46', 0, 9, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pokemon`
--

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE IF NOT EXISTS `pokemon` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TenPokemon` varchar(255) NOT NULL,
  `ToaDoX` int(255) NOT NULL,
  `ToaDoY` int(255) NOT NULL,
  `URLHinh` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `pokemon`
--

INSERT INTO `pokemon` (`Id`, `TenPokemon`, `ToaDoX`, `ToaDoY`, `URLHinh`) VALUES
(1, 'Pikachu', 1, 3, 'images/pikachu.png'),
(2, 'bayleef', 2, 10, 'images/bayleef.png'),
(3, 'dratini', 2, 2, 'images/dratini.png'),
(4, 'herdier', 3, 1, 'images/herdier.png'),
(5, 'pidgeotto', 6, 4, 'images/pidgeotto.png'),
(6, 'Silcoon', 4, 2, 'images/Silcoon.png'),
(7, 'trumbeak', 4, 7, 'images/trumbeak.png'),
(8, 'Wartortle', 6, 4, 'images/Wartortle.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

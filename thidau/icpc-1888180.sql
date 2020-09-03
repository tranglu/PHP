-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th9 03, 2020 lúc 02:25 PM
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
-- Cơ sở dữ liệu: `icpc-1888180`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doithi`
--

DROP TABLE IF EXISTS `doithi`;
CREATE TABLE IF NOT EXISTS `doithi` (
  `TenDoiThi` varchar(100) NOT NULL,
  `MaHLV` int(255) NOT NULL,
  PRIMARY KEY (`TenDoiThi`,`MaHLV`),
  KEY `MaHLV` (`MaHLV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `doithi`
--

INSERT INTO `doithi` (`TenDoiThi`, `MaHLV`) VALUES
('Đội Tự Nhiên', 1),
('Đội Bách Khoa', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsthisinh`
--

DROP TABLE IF EXISTS `dsthisinh`;
CREATE TABLE IF NOT EXISTS `dsthisinh` (
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `TenDoiThi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `HoTen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `dsthisinh`
--

INSERT INTO `dsthisinh` (`Email`, `TenDoiThi`, `HoTen`) VALUES
('12@gmail.com', 'Đội Bách Khoa', 'Nguyễn Trường An'),
('1@gmail.com', 'Đội Tự Nhiên', 'Tràn An Bình'),
('2@gmail.com', 'Đội Bách Khoa', 'Nguyễn Văn AN'),
('56@gmail.com', 'Đội Tự Nhiên', 'Trần Văn Tiến'),
('th@gmail.com', 'Đội Tự Nhiên', 'Trần Văn Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huanluyenvien`
--

DROP TABLE IF EXISTS `huanluyenvien`;
CREATE TABLE IF NOT EXISTS `huanluyenvien` (
  `MaHLV` int(255) NOT NULL,
  `Hoten` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tentruong` varchar(255) NOT NULL,
  PRIMARY KEY (`MaHLV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `huanluyenvien`
--

INSERT INTO `huanluyenvien` (`MaHLV`, `Hoten`, `Email`, `password`, `tentruong`) VALUES
(1, 'Nguyễn Văn A', '123@gmail.com', '123456', 'tự nhiên'),
(2, 'Nguyễn Văn B', '456@gmail.com', '456789', 'Bách khoa');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `doithi`
--
ALTER TABLE `doithi`
  ADD CONSTRAINT `doithi_ibfk_1` FOREIGN KEY (`MaHLV`) REFERENCES `huanluyenvien` (`MaHLV`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

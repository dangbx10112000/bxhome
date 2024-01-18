-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 31, 2022 lúc 05:49 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `user`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_bxhome`
--

CREATE TABLE `user_bxhome` (
  `id` int(2) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idp_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwordd` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_room` int(11) DEFAULT NULL,
  `board_id` int(11) NOT NULL,
  `gpio_number` int(11) DEFAULT NULL,
  `update_command` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_bxhome`
--

INSERT INTO `user_bxhome` (`id`, `fullname`, `username`, `idp_key`, `passwordd`, `key_room`, `board_id`, `gpio_number`, `update_command`) VALUES
(1, 'Bui Xuan Dang', 'ADMIN', 'admin111020', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1, NULL, 'NULL'),
(2, 'Ho Van Tan', 'tan', 'tan3520', 'c4ca4238a0b923820dcc509a6f75849b', 1, 0, NULL, NULL),
(3, 'Nguyen Thanh Hung', 'hung', 'hunf2710', 'c4ca4238a0b923820dcc509a6f75849b', 1, 0, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user_bxhome`
--
ALTER TABLE `user_bxhome`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user_bxhome`
--
ALTER TABLE `user_bxhome`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

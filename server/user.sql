-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 31, 2022 lúc 05:22 PM
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
-- Cấu trúc bảng cho bảng `datajson_bxhome`
--

CREATE TABLE `datajson_bxhome` (
  `id` int(11) NOT NULL,
  `nameDevice` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statusDevice` float DEFAULT NULL,
  `boardDevice` int(11) DEFAULT NULL,
  `gpioDevice` int(2) DEFAULT NULL,
  `gpioButton` int(11) NOT NULL,
  `roomDevice` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_room` int(11) DEFAULT NULL,
  `kindDevice` int(11) DEFAULT NULL,
  `valueDevice` int(11) DEFAULT NULL,
  `idp_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `datajson_bxhome`
--

INSERT INTO `datajson_bxhome` (`id`, `nameDevice`, `statusDevice`, `boardDevice`, `gpioDevice`, `gpioButton`, `roomDevice`, `key_room`, `kindDevice`, `valueDevice`, `idp_key`) VALUES
(1, 'den', 0, 1, 18, 17, 'Bedroom', 2, 1, NULL, 'admin111020'),
(2, 'den', 0, 1, 17, 0, 'Bedroom', 2, 1, NULL, 'admin111020'),
(3, 'den1', 0, 1, 19, 21, 'Bedroom', 2, 1, NULL, 'admin111020');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `esp32_board`
--

CREATE TABLE `esp32_board` (
  `id` int(11) NOT NULL,
  `gpioDevice` int(11) DEFAULT NULL,
  `descriptions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_gpio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `output_gpio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `use_gpio` int(11) DEFAULT NULL,
  `board_id` int(11) DEFAULT NULL,
  `idp_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_now` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_room` int(11) DEFAULT NULL,
  `wifi_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `esp32_board`
--

INSERT INTO `esp32_board` (`id`, `gpioDevice`, `descriptions`, `input_gpio`, `output_gpio`, `use_gpio`, `board_id`, `idp_key`, `version_now`, `key_room`, `wifi_name`) VALUES
(1, 0, 'Output PWM signal at boot', 'Pulled up', 'OK', 0, 1, 'admin111020', '2.0', NULL, NULL),
(2, 1, 'Debug output at boot', 'TX pin', 'OK', 0, 1, 'admin111020', NULL, NULL, NULL),
(3, 2, 'Connected to on board LED', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(5, 4, '', 'OK', 'OK', 2, 1, 'admin111020', NULL, NULL, NULL),
(6, 5, 'Outputs PWM signal at boot', 'Pulled up', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(7, 6, 'Connected to the integarated SPI flash', 'X', 'X', 0, 1, 'admin111020', NULL, NULL, NULL),
(8, 7, 'Connected to the integarated SPI flash', 'X', 'X', 0, 1, 'admin111020', NULL, NULL, NULL),
(9, 8, 'Connected to the integarated SPI flash', 'X', 'X', 0, 1, 'admin111020', NULL, NULL, NULL),
(10, 9, 'Connected to the integarated SPI flash', 'X', 'X', 0, 1, 'admin111020', NULL, NULL, NULL),
(11, 10, 'Connected to the integarated SPI flash', 'X', 'X', 0, 1, 'admin111020', NULL, NULL, NULL),
(12, 11, 'Connected to the integarated SPI flash', 'X', 'X', 0, 1, 'admin111020', NULL, NULL, NULL),
(13, 12, 'Boot fail if pulled high', 'OK', 'OK', 0, 1, 'admin111020', NULL, NULL, NULL),
(14, 13, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(15, 14, 'Outputs PWM signal at boot', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(16, 15, 'Outputs PWM signal at boot', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(18, 17, '', 'OK', 'OK', 2, 1, 'admin111020', NULL, NULL, NULL),
(19, 18, '', 'OK', 'OK', 2, 1, 'admin111020', NULL, NULL, NULL),
(20, 19, '', 'OK', 'OK', 2, 1, 'admin111020', NULL, NULL, NULL),
(21, 21, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(22, 22, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(23, 23, '', 'OK', 'OK', 2, 1, 'admin111020', NULL, NULL, NULL),
(25, 25, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(26, 26, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(27, 27, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(28, 28, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(29, 29, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(30, 30, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(31, 31, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(32, 32, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(33, 33, '', 'OK', 'OK', 1, 1, 'admin111020', NULL, NULL, NULL),
(34, 34, 'Input only', 'OK', '', 1, 1, 'admin111020', NULL, NULL, NULL),
(35, 35, 'Input only', 'OK', '', 1, 1, 'admin111020', NULL, NULL, NULL),
(36, 36, 'Input only', 'OK', '', 1, 1, 'admin111020', NULL, NULL, NULL),
(37, 39, 'Input only', 'OK', '', 1, 1, 'admin111020', '2.1', 1, 'VIETTEL'),
(63, 12, 'adc', 'OK', 'OK', 2, 2, 'admin111020', NULL, NULL, NULL),
(65, 15, 'erg4', 'OK', 'OK', 2, 2, 'admin111020', NULL, NULL, NULL),
(68, 16, '', 'X', 'OK', 1, 2, 'admin111020', NULL, NULL, NULL),
(69, 0, 'VCC', 'OK', 'X', 1, 3, 'admin111020', NULL, NULL, 'VNPT'),
(70, 1, 'GND', 'X', 'OK', 1, 3, 'admin111020', NULL, NULL, NULL),
(77, 1, 'vcc', 'OK', 'X', 1, 5, 'admin111020', NULL, NULL, NULL),
(79, 3, '', 'OK', 'OK', 1, 5, 'admin111020', NULL, NULL, NULL),
(80, 0, '', '', '', 0, 0, '', NULL, NULL, NULL),
(81, 23, 'gpio', 'OK', 'OK', 2, 2, 'admin111020', NULL, 2, 'FPT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `key_set`
--

CREATE TABLE `key_set` (
  `id` int(11) NOT NULL,
  `key_room` int(11) DEFAULT NULL,
  `board_id` int(11) NOT NULL,
  `gpio_number` int(11) DEFAULT NULL,
  `idp_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `key_set`
--

INSERT INTO `key_set` (`id`, `key_room`, `board_id`, `gpio_number`, `idp_key`) VALUES
(1, 1, 1, 0, 'admin111');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `add_questions` longtext COLLATE utf8_unicode_ci NOT NULL,
  `add_link` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content_question` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `add_questions`, `add_link`, `content_question`) VALUES
(1, 'Introduction about Dreamhome', 'intro', '<div class=\"embed-responsive embed-responsive-16by9\">\r\n  <iframe class=\"embed-responsive-item\" src=\"https://player.vimeo.com/video/137857207\" allowfullscreen></iframe>\r\n</div>'),
(4, 'User manuals', 'manuals', '<img src=\"image/bathroom_static.png\" alt=\"\">'),
(6, 'demo', 'demo', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `update_ota`
--

CREATE TABLE `update_ota` (
  `id` int(11) NOT NULL,
  `status_OTA` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `versions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descript_new_ver` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `update_ota`
--

INSERT INTO `update_ota` (`id`, `status_OTA`, `versions`, `descript_new_ver`) VALUES
(1, 'available', '2.1', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `update_status_bxhome`
--

CREATE TABLE `update_status_bxhome` (
  `id` int(11) NOT NULL,
  `key_room` int(11) DEFAULT NULL,
  `temp` float DEFAULT NULL,
  `humd` float DEFAULT NULL,
  `gas` float DEFAULT NULL,
  `lux` float DEFAULT NULL,
  `people` int(11) DEFAULT NULL,
  `device_connect` int(11) DEFAULT NULL,
  `idp_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `roomName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `update_status_bxhome`
--

INSERT INTO `update_status_bxhome` (`id`, `key_room`, `temp`, `humd`, `gas`, `lux`, `people`, `device_connect`, `idp_key`, `link_image`, `roomName`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, 0, 'admin111020', 'image/livingroom1_static.png', 'Livingroom'),
(2, 2, NULL, NULL, NULL, NULL, NULL, 3, 'admin111020', 'image/bedroom1_static.png', 'Bedroom'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'admin111020', 'image/kitchen1_static.png', 'Kitchen'),
(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'admin111020', 'image/bathroom_static.png', 'Bathroom'),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'admin111020', 'image/outside1.jpg', 'Outside'),
(6, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'tan3520', 'image/livingroom1_static.png', 'Livingroom'),
(7, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'tan3520', 'image/bedroom1_static.png', 'Bedroom'),
(8, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'tan3520', 'image/kitchen1_static.png', 'Kitchen'),
(9, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'tan3520', 'image/bathroom_static.png', 'Bathroom'),
(10, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'tan3520', 'image/outside1.jpg', 'Outside'),
(11, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'hunf2710', 'image/livingroom1_static.png', 'Livingroom'),
(12, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'hunf2710', 'image/bedroom1_static.png', 'Bedroom'),
(13, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'hunf2710', 'image/kitchen1_static.png', 'Kitchen'),
(14, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'hunf2710', 'image/bathroom_static.png', 'Bathroom'),
(15, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'hunf2710', 'image/outside1.jpg', 'Outside'),
(16, 6, NULL, NULL, NULL, NULL, NULL, NULL, 'admin111020', 'https://1.bp.blogspot.com/-vy_2z4Sw7cA/Xt9yvL-2inI/AAAAAAAAA2M/-1sMhiDqU58rLFaCLJJhOZ3NEFw9GIaCwCPcBGAsYHg/s1600/image.png', 'Diningroom'),
(18, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'dat09', 'image/livingroom1_static.png', 'Livingroom'),
(19, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'dat09', 'image/bedroom1_static.png', 'Bedroom'),
(20, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'dat09', 'image/kitchen1_static.png', 'Kitchen'),
(21, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'dat09', 'image/bathroom_static.png', 'Bathroom'),
(22, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'dat09', 'image/outside1.jpg', 'Outside'),
(23, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'dat09', '', ''),
(24, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'dat09', '', ''),
(25, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'dat09', '', ''),
(37, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'anguyen1020', 'image/livingroom1_static.png', 'Livingroom'),
(38, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'anguyen1020', 'image/bedroom1_static.png', 'Bedroom'),
(39, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'anguyen1020', 'image/kitchen1_static.png', 'Kitchen'),
(40, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'anguyen1020', 'image/bathroom_static.png', 'Bathroom'),
(41, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'anguyen1020', 'image/outside1.jpg', 'Outside'),
(42, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'aaaaaaaaaaa', 'image/livingroom1_static.png', 'Livingroom'),
(43, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'aaaaaaaaaaa', 'image/bedroom1_static.png', 'Bedroom'),
(44, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'aaaaaaaaaaa', 'image/kitchen1_static.png', 'Kitchen'),
(45, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'aaaaaaaaaaa', 'image/bathroom_static.png', 'Bathroom'),
(46, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'aaaaaaaaaaa', 'image/outside1.jpg', 'Outside'),
(47, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'fffffff', 'image/livingroom1_static.png', 'Livingroom'),
(48, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'fffffff', 'image/bedroom1_static.png', 'Bedroom'),
(49, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'fffffff', 'image/kitchen1_static.png', 'Kitchen'),
(50, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'fffffff', 'image/bathroom_static.png', 'Bathroom'),
(51, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'fffffff', 'image/outside1.jpg', 'Outside'),
(52, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'a9k53', 'image/livingroom1_static.png', 'Livingroom'),
(53, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'a9k53', 'image/bedroom1_static.png', 'Bedroom'),
(54, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'a9k53', 'image/kitchen1_static.png', 'Kitchen'),
(55, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'a9k53', 'image/bathroom_static.png', 'Bathroom'),
(56, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'a9k53', 'image/outside1.jpg', 'Outside'),
(57, 1, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'image/livingroom1_static.png', 'Livingroom'),
(58, 2, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'image/bedroom1_static.png', 'Bedroom'),
(59, 3, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'image/kitchen1_static.png', 'Kitchen'),
(60, 4, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'image/bathroom_static.png', 'Bathroom'),
(61, 5, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'image/outside1.jpg', 'Outside'),
(62, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'f12345', 'image/livingroom1_static.png', 'Livingroom'),
(63, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'f12345', 'image/bedroom1_static.png', 'Bedroom'),
(64, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'f12345', 'image/kitchen1_static.png', 'Kitchen'),
(65, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'f12345', 'image/bathroom_static.png', 'Bathroom'),
(66, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'f12345', 'image/outside1.jpg', 'Outside'),
(67, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'abc1', 'image/livingroom1_static.png', 'Livingroom'),
(68, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'abc1', 'image/bedroom1_static.png', 'Bedroom'),
(69, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'abc1', 'image/kitchen1_static.png', 'Kitchen'),
(70, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'abc1', 'image/bathroom_static.png', 'Bathroom'),
(71, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'abc1', 'image/home_out.png', 'Outside'),
(72, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'adbcc', 'image/livingroom1_static.png', 'Livingroom'),
(73, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'adbcc', 'image/bedroom1_static.png', 'Bedroom'),
(74, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'adbcc', 'image/kitchen1_static.png', 'Kitchen'),
(75, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'adbcc', 'image/bathroom_static.png', 'Bathroom'),
(76, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'adbcc', 'image/home_out.png', 'Outside'),
(77, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin1', 'image/livingroom1_static.png', 'Livingroom'),
(78, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'admin1', 'image/bedroom1_static.png', 'Bedroom'),
(79, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'admin1', 'image/kitchen1_static.png', 'Kitchen'),
(80, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'admin1', 'image/bathroom_static.png', 'Bathroom'),
(81, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'admin1', 'image/home_out.png', 'Outside'),
(82, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'huy123', 'image/livingroom1_static.png', 'Livingroom'),
(83, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'huy123', 'image/bedroom1_static.png', 'Bedroom'),
(84, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'huy123', 'image/kitchen1_static.png', 'Kitchen'),
(85, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'huy123', 'image/bathroom_static.png', 'Bathroom'),
(86, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'huy123', 'image/home_out.png', 'Outside'),
(87, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'bxd', 'image/livingroom1_static.png', 'Livingroom'),
(88, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'bxd', 'image/bedroom1_static.png', 'Bedroom'),
(89, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'bxd', 'image/kitchen1_static.png', 'Kitchen'),
(90, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'bxd', 'image/bathroom_static.png', 'Bathroom'),
(91, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'bxd', 'image/home_out.png', 'Outside');

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
(3, 'Nguyen Thanh Hung', 'hung', 'hunf2710', 'c4ca4238a0b923820dcc509a6f75849b', 1, 0, NULL, NULL),
(20, 'Dang Bui', 'a9dp', '1', '1', NULL, 0, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `datajson_bxhome`
--
ALTER TABLE `datajson_bxhome`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `esp32_board`
--
ALTER TABLE `esp32_board`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `key_set`
--
ALTER TABLE `key_set`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `update_ota`
--
ALTER TABLE `update_ota`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `update_status_bxhome`
--
ALTER TABLE `update_status_bxhome`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_bxhome`
--
ALTER TABLE `user_bxhome`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `datajson_bxhome`
--
ALTER TABLE `datajson_bxhome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `esp32_board`
--
ALTER TABLE `esp32_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `key_set`
--
ALTER TABLE `key_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `update_ota`
--
ALTER TABLE `update_ota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `update_status_bxhome`
--
ALTER TABLE `update_status_bxhome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `user_bxhome`
--
ALTER TABLE `user_bxhome`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

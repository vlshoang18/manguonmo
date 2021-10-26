-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2021 lúc 04:54 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainv`
--

CREATE TABLE `loainv` (
  `MALOAINV` varchar(5) NOT NULL,
  `TENLOAINV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loainv`
--

INSERT INTO `loainv` (`MALOAINV`, `TENLOAINV`) VALUES
('NV01', 'Kỹ Thuật'),
('NV02', 'Tài Chính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` varchar(5) NOT NULL,
  `HO` varchar(10) NOT NULL,
  `TEN` varchar(30) NOT NULL,
  `NGAYSINH` date NOT NULL,
  `GIOITINH` tinyint(1) NOT NULL,
  `DIACHI` varchar(30) NOT NULL,
  `ANH` varchar(500) NOT NULL,
  `MALOAINV` varchar(5) NOT NULL,
  `MAPHONG` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `HO`, `TEN`, `NGAYSINH`, `GIOITINH`, `DIACHI`, `ANH`, `MALOAINV`, `MAPHONG`) VALUES
('NV06', 'Ớt', 'Xanh', '2011-08-18', 1, '      Lê Hồng Phong      ', '246808482_557352398667850_6816762213337230589_n.jpg', 'NV02', 'PB001'),
('NV08', 'MEGA', 'Xanh', '2011-08-02', 1, '        Lê Hồng Phong        ', 'AW4019423_04.gif', 'NV01', 'PB001'),
('NV11', 'Mẹc ce ', 'Đéc màu xanh', '2000-08-17', 1, '     sadas   ', 'vie-channel-photo-rap-viet-mua-2-2-2244.jpeg', 'NV01', 'PB001'),
('NV20', 'Tìm ', 'Ly Cà phê', '2021-06-03', 1, 'dasdsa', 'Annotation 2021-10-18 101716.jpeg', 'NV02', 'PB001'),
('NV21', 'Ớt', 'ss', '2021-10-28', 1, '  aaa', '170118474_3134949303.jpg', 'NV01', 'PB001'),
('NV22', 'Sỹ', 'Ớt', '2021-10-07', 1, ' asas ', 'AW4019423_04.gif', 'NV01', 'PB001'),
('NV23', 'Hòa', 'Hóa', '2021-10-06', 1, ' aaa  ', '245634380_907130713558414_7424244906445133446_n.jpg', 'NV01', 'PB001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `MAPHONG` varchar(5) NOT NULL,
  `TENPHONG` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`MAPHONG`, `TENPHONG`) VALUES
('PB001', 'Phòng Nhân Sự'),
('PB002', 'Phòng Tài Chính');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loainv`
--
ALTER TABLE `loainv`
  ADD PRIMARY KEY (`MALOAINV`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`),
  ADD KEY `MALOAINV` (`MALOAINV`),
  ADD KEY `MAPHONG` (`MAPHONG`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MAPHONG`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MALOAINV`) REFERENCES `loainv` (`MALOAINV`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`MAPHONG`) REFERENCES `phongban` (`MAPHONG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 08, 2024 lúc 05:11 PM
-- Phiên bản máy phục vụ: 10.6.17-MariaDB-cll-lve
-- Phiên bản PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `spamgare_qlktx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietchuyenphong`
--

CREATE TABLE `chitietchuyenphong` (
  `MaDK` int(11) NOT NULL,
  `MaSV` bigint(20) NOT NULL,
  `MaPhongChuyen` varchar(10) DEFAULT NULL,
  `MaPhongO` varchar(20) DEFAULT NULL,
  `Lydo` varchar(300) DEFAULT NULL,
  `TinhTrang` varchar(20) DEFAULT NULL,
  `NgayChuyen` date DEFAULT NULL,
  `NgayDangKy` date DEFAULT current_timestamp(),
  `LanChuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdangky`
--

CREATE TABLE `chitietdangky` (
  `MaDK` int(11) NOT NULL,
  `MaSV` bigint(11) NOT NULL,
  `MaPhong` varchar(10) NOT NULL,
  `MaNV` varchar(20) DEFAULT NULL,
  `NgayDangKy` date NOT NULL DEFAULT current_timestamp(),
  `NgayTraPhong` date DEFAULT NULL,
  `TinhTrang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdangky`
--

INSERT INTO `chitietdangky` (`MaDK`, `MaSV`, `MaPhong`, `MaNV`, `NgayDangKy`, `NgayTraPhong`, `TinhTrang`) VALUES
(110, 205480106013, 'A104', 'NV1', '2024-06-08', NULL, 'đã duyệt'),
(111, 205480106012, 'B203', 'NV1', '2024-06-08', NULL, 'đã duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadondiennuoc`
--

CREATE TABLE `hoadondiennuoc` (
  `MaHD` int(11) NOT NULL,
  `MaPhong` varchar(20) NOT NULL,
  `TienDien` decimal(10,0) NOT NULL,
  `TienNuoc` decimal(10,0) NOT NULL,
  `Thang` int(11) NOT NULL,
  `TinhTrang` varchar(20) NOT NULL DEFAULT 'chưa thu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khu`
--

CREATE TABLE `khu` (
  `MaKhu` varchar(10) NOT NULL,
  `TenKhu` varchar(20) NOT NULL,
  `Sex` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khu`
--

INSERT INTO `khu` (`MaKhu`, `TenKhu`, `Sex`) VALUES
('A', 'Khu A', 'Nam'),
('B', 'Khu B', 'Nam'),
('K', 'Khu K', 'Nu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(50) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `SDT` bigint(12) DEFAULT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTen`, `NgaySinh`, `DiaChi`, `SDT`, `MatKhau`, `Quyen`) VALUES
('NV1', 'Nhân Viên A', '1995-01-18', 'Thái Nguyên', 123456789, '123456', 1),
('NV2', 'Nhân Viên B', '1998-11-20', 'Thái Nguyên', 987654321, '123456', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `MaPhong` varchar(10) NOT NULL,
  `MaKhu` varchar(10) NOT NULL,
  `SoNguoiToiDa` int(2) DEFAULT NULL,
  `SoNguoiHienTai` int(2) DEFAULT 0,
  `Gia` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`MaPhong`, `MaKhu`, `SoNguoiToiDa`, `SoNguoiHienTai`, `Gia`) VALUES
('A101', 'A', 4, 0, 500000),
('A102', 'A', 4, 0, 500000),
('A103', 'A', 4, 0, 500000),
('A104', 'A', 4, 1, 500000),
('A201', 'A', 6, 0, 500000),
('A202', 'A', 6, 0, 500000),
('A203', 'A', 6, 0, 500000),
('A204', 'A', 6, 0, 500000),
('A301', 'A', 8, 0, 500000),
('A302', 'A', 8, 0, 500000),
('A303', 'A', 8, 0, 500000),
('A304', 'A', 8, 0, 500000),
('B101', 'B', 4, 0, 450000),
('B102', 'B', 4, 0, 450000),
('B103', 'B', 4, 0, 450000),
('B201', 'B', 8, 0, 450000),
('B202', 'B', 6, 0, 450000),
('B203', 'B', 6, 1, 450000),
('B301', 'B', 8, 0, 450000),
('B302', 'B', 8, 0, 600000),
('B303', 'B', 8, 0, 600000),
('K101', 'K', 4, 0, 640000),
('K102', 'K', 4, 0, 640000),
('K201', 'K', 6, 0, 640000),
('K202', 'K', 6, 0, 640000),
('K203', 'K', 6, 2, 640000),
('K301', 'K', 8, 0, 640000),
('K302', 'K', 8, 0, 640000),
('K303', 'K', 8, 0, 640000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` bigint(50) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `GioiTinh` varchar(10) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `SDT` bigint(12) DEFAULT NULL,
  `Lop` text NOT NULL,
  `Khoa` text NOT NULL,
  `MatKhau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `HoTen`, `GioiTinh`, `NgaySinh`, `DiaChi`, `SDT`, `Lop`, `Khoa`, `MatKhau`) VALUES
(205480106012, 'Nguyen Van B', 'Nam', '1998-02-15', '10 Tôn Đản - Đà Nẵng', 456456456, 'K21A', 'CNTT2263', '123456'),
(205480106013, 'VuongDev', 'Nam', '2024-06-14', 'Lạng Sơn', 123123, 'K21I', 'CNTT', 'vuongdeptrai'),
(205480106022, 'Nguyen Van A', 'Nam', '2000-11-11', 'Đà Nẵng', 123123123, 'K21B', 'CNTT234', '123456'),
(205480106112, 'Nguyen Van C', 'Nữ', '1998-07-25', '1092 Trường Chinh Đà Nẵng', 789789789, 'K21C', 'CNTT', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `MaTB` int(11) NOT NULL,
  `MaSV` bigint(20) NOT NULL,
  `MaNV` varchar(20) NOT NULL,
  `TieuDe` varchar(100) NOT NULL,
  `NoiDung` varchar(500) NOT NULL,
  `LoaiTB` varchar(10) DEFAULT NULL,
  `NgayTB` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`MaTB`, `MaSV`, `MaNV`, `TieuDe`, `NoiDung`, `LoaiTB`, `NgayTB`) VALUES
(69, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(70, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(71, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(72, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(73, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(74, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(75, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(76, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(77, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(78, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(79, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(80, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(81, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(82, 205480106012, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : A101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2024-6-11 10:38:18. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2024-06-08'),
(83, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(84, 205480106012, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : B203. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2024-6-11 11:49:59. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2024-06-08'),
(85, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2024-06-08'),
(86, 205480106012, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : B101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2024-6-11 12:2:21. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2024-06-08'),
(87, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã trả phòng B101 thành công. Cảm ơn bạn.', 'trả phòn', '2024-06-08'),
(88, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã trả phòng B101 thành công. Cảm ơn bạn.', 'trả phòn', '2024-06-08'),
(89, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã trả phòng B101 thành công. Cảm ơn bạn.', 'trả phòn', '2024-06-08'),
(90, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã trả phòng B101 thành công. Cảm ơn bạn.', 'trả phòn', '2024-06-08'),
(91, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã trả phòng B101 thành công. Cảm ơn bạn.', 'trả phòn', '2024-06-08'),
(92, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã trả phòng B101 thành công. Cảm ơn bạn.', 'trả phòn', '2024-06-08'),
(93, 205480106012, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : A202. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2024-6-11 12:29:28. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2024-06-08'),
(94, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã trả phòng A202 thành công. Cảm ơn bạn.', 'trả phòn', '2024-06-08'),
(95, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã trả phòng A202 thành công. Cảm ơn bạn.', 'trả phòn', '2024-06-08'),
(96, 205480106012, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : A201. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2024-6-11 12:35:39. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2024-06-08'),
(97, 205480106012, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã trả phòng A201 thành công. Cảm ơn bạn.', 'trả phòn', '2024-06-08'),
(98, 205480106013, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : A104. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2024-6-11 16:1:47. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2024-06-08'),
(99, 205480106012, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : A104. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2024-6-11 16:4:28. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2024-06-08'),
(100, 205480106012, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : A101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2024-6-11 16:41:6. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2024-06-08'),
(101, 205480106012, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : B203. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2024-6-11 16:41:55. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2024-06-08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietchuyenphong`
--
ALTER TABLE `chitietchuyenphong`
  ADD PRIMARY KEY (`MaDK`),
  ADD KEY `MaPhongO` (`MaPhongO`),
  ADD KEY `MaPhongChuyen` (`MaPhongChuyen`);

--
-- Chỉ mục cho bảng `chitietdangky`
--
ALTER TABLE `chitietdangky`
  ADD PRIMARY KEY (`MaDK`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaPhong` (`MaPhong`),
  ADD KEY `MaSV` (`MaSV`);

--
-- Chỉ mục cho bảng `hoadondiennuoc`
--
ALTER TABLE `hoadondiennuoc`
  ADD PRIMARY KEY (`MaPhong`,`Thang`),
  ADD UNIQUE KEY `MaHD` (`MaHD`);

--
-- Chỉ mục cho bảng `khu`
--
ALTER TABLE `khu`
  ADD PRIMARY KEY (`MaKhu`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`),
  ADD KEY `MaKhu` (`MaKhu`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`MaTB`),
  ADD KEY `MaSV` (`MaSV`),
  ADD KEY `MaNV` (`MaNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdangky`
--
ALTER TABLE `chitietdangky`
  MODIFY `MaDK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `hoadondiennuoc`
--
ALTER TABLE `hoadondiennuoc`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `MaTB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietchuyenphong`
--
ALTER TABLE `chitietchuyenphong`
  ADD CONSTRAINT `chitietchuyenphong_ibfk_1` FOREIGN KEY (`MaDK`) REFERENCES `chitietdangky` (`MaDK`),
  ADD CONSTRAINT `chitietchuyenphong_ibfk_2` FOREIGN KEY (`MaPhongO`) REFERENCES `phong` (`MaPhong`),
  ADD CONSTRAINT `chitietchuyenphong_ibfk_3` FOREIGN KEY (`MaPhongChuyen`) REFERENCES `phong` (`MaPhong`);

--
-- Các ràng buộc cho bảng `chitietdangky`
--
ALTER TABLE `chitietdangky`
  ADD CONSTRAINT `chitietdangky_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `chitietdangky_ibfk_2` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`),
  ADD CONSTRAINT `chitietdangky_ibfk_4` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`);

--
-- Các ràng buộc cho bảng `hoadondiennuoc`
--
ALTER TABLE `hoadondiennuoc`
  ADD CONSTRAINT `hoadondiennuoc_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`MaKhu`) REFERENCES `khu` (`MaKhu`);

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_1` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`),
  ADD CONSTRAINT `thongbao_ibfk_2` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

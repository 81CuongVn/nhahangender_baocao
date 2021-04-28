-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for nhahangender
CREATE DATABASE IF NOT EXISTS `nhahangender` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `nhahangender`;

-- Dumping structure for table nhahangender.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nhahangender.admin: ~0 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`) VALUES
	(1, 'ender@gmail.com', '009e13e3fdf6d6c36312c77804b18df9', 'Ender', '0999999999');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table nhahangender.ban
CREATE TABLE IF NOT EXISTS `ban` (
  `IdBan` int(11) NOT NULL,
  `IdLoaiBan` int(11) NOT NULL,
  `IdSanh` int(11) NOT NULL,
  `TenBan` varchar(32) NOT NULL,
  `TrangThai` varchar(32) NOT NULL,
  PRIMARY KEY (`IdBan`),
  KEY `FK_ban_loaiban` (`IdLoaiBan`),
  KEY `FK_ban_sanh` (`IdSanh`),
  CONSTRAINT `FK_ban_loaiban` FOREIGN KEY (`IdLoaiBan`) REFERENCES `loaiban` (`IdLoaiBan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_ban_sanh` FOREIGN KEY (`IdSanh`) REFERENCES `sanh` (`IdSanh`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.ban: ~3 rows (approximately)
DELETE FROM `ban`;
/*!40000 ALTER TABLE `ban` DISABLE KEYS */;
INSERT INTO `ban` (`IdBan`, `IdLoaiBan`, `IdSanh`, `TenBan`, `TrangThai`) VALUES
	(0, 2, 1, 'GĐ-01', '0'),
	(1, 1, 1, 'BT-01', '0'),
	(2, 3, 4, 'V-01', '1');
/*!40000 ALTER TABLE `ban` ENABLE KEYS */;

-- Dumping structure for table nhahangender.ban_phieudatban
CREATE TABLE IF NOT EXISTS `ban_phieudatban` (
  `IdBan` int(11) NOT NULL,
  `IdDatBan` int(11) NOT NULL,
  PRIMARY KEY (`IdBan`,`IdDatBan`),
  KEY `IdBan` (`IdBan`),
  KEY `IdDatBan` (`IdDatBan`),
  CONSTRAINT `FK__ban` FOREIGN KEY (`IdBan`) REFERENCES `ban` (`IdBan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK__phieudatban` FOREIGN KEY (`IdDatBan`) REFERENCES `phieudatban` (`IdDatBan`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nhahangender.ban_phieudatban: ~0 rows (approximately)
DELETE FROM `ban_phieudatban`;
/*!40000 ALTER TABLE `ban_phieudatban` DISABLE KEYS */;
/*!40000 ALTER TABLE `ban_phieudatban` ENABLE KEYS */;

-- Dumping structure for table nhahangender.catruc
CREATE TABLE IF NOT EXISTS `catruc` (
  `IdCaTruc` int(11) NOT NULL,
  `SttCa` int(11) NOT NULL,
  `GioBatDau` time NOT NULL,
  `GioKetThuc` time NOT NULL,
  PRIMARY KEY (`IdCaTruc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.catruc: ~3 rows (approximately)
DELETE FROM `catruc`;
/*!40000 ALTER TABLE `catruc` DISABLE KEYS */;
INSERT INTO `catruc` (`IdCaTruc`, `SttCa`, `GioBatDau`, `GioKetThuc`) VALUES
	(1, 1, '06:00:00', '12:00:00'),
	(2, 2, '12:00:00', '17:00:00'),
	(3, 3, '17:00:00', '22:00:00');
/*!40000 ALTER TABLE `catruc` ENABLE KEYS */;

-- Dumping structure for table nhahangender.chitietdatban
CREATE TABLE IF NOT EXISTS `chitietdatban` (
  `IdDatBan` int(11) NOT NULL,
  `IdMonAn` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  PRIMARY KEY (`IdDatBan`,`IdMonAn`),
  KEY `IdDatBan` (`IdDatBan`),
  KEY `IdMonAn` (`IdMonAn`),
  CONSTRAINT `FK_datban` FOREIGN KEY (`IdDatBan`) REFERENCES `phieudatban` (`IdDatBan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_monan` FOREIGN KEY (`IdMonAn`) REFERENCES `monan` (`IdMonAn`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.chitietdatban: ~0 rows (approximately)
DELETE FROM `chitietdatban`;
/*!40000 ALTER TABLE `chitietdatban` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitietdatban` ENABLE KEYS */;

-- Dumping structure for table nhahangender.chitietdatmon
CREATE TABLE IF NOT EXISTS `chitietdatmon` (
  `IdMonAn` int(11) NOT NULL,
  `IdDatMon` int(11) NOT NULL,
  `SoLuongMon` int(11) NOT NULL,
  `DonGiaMon` decimal(10,0) NOT NULL,
  KEY `IdMonAn` (`IdMonAn`),
  KEY `IdDatMon` (`IdDatMon`),
  CONSTRAINT `FK_chitietdatmon_monan` FOREIGN KEY (`IdMonAn`) REFERENCES `monan` (`IdMonAn`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_phieudatmonan` FOREIGN KEY (`IdDatMon`) REFERENCES `phieudatmonan` (`IdDatMon`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.chitietdatmon: ~25 rows (approximately)
DELETE FROM `chitietdatmon`;
/*!40000 ALTER TABLE `chitietdatmon` DISABLE KEYS */;
INSERT INTO `chitietdatmon` (`IdMonAn`, `IdDatMon`, `SoLuongMon`, `DonGiaMon`) VALUES
	(6, 29, 2, 75000),
	(8, 29, 3, 200000),
	(6, 30, 1, 75000),
	(4, 30, 1, 20000),
	(6, 31, 2, 75000),
	(3, 32, 3, 20000),
	(4, 33, 2, 20000),
	(8, 33, 5, 200000),
	(3, 33, 3, 20000),
	(6, 33, 2, 75000),
	(6, 34, 3, 75000),
	(2, 35, 3, 125000),
	(3, 35, 2, 20000),
	(4, 36, 1, 20000),
	(2, 36, 1, 125000),
	(3, 37, 1, 20000),
	(8, 37, 2, 200000),
	(6, 38, 2, 75000),
	(2, 38, 4, 125000),
	(6, 39, 5, 75000),
	(3, 39, 2, 20000),
	(8, 40, 1, 200000),
	(3, 40, 2, 20000),
	(14, 41, 2, 2000000),
	(10, 41, 1, 500000);
/*!40000 ALTER TABLE `chitietdatmon` ENABLE KEYS */;

-- Dumping structure for table nhahangender.chucvu
CREATE TABLE IF NOT EXISTS `chucvu` (
  `IdCV` int(11) NOT NULL AUTO_INCREMENT,
  `IdLuong` int(11) NOT NULL,
  `TenCV` varchar(50) NOT NULL,
  PRIMARY KEY (`IdCV`),
  KEY `IdLuong` (`IdLuong`),
  CONSTRAINT `FK_chucvu_luong` FOREIGN KEY (`IdLuong`) REFERENCES `luong` (`IdLuong`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.chucvu: ~3 rows (approximately)
DELETE FROM `chucvu`;
/*!40000 ALTER TABLE `chucvu` DISABLE KEYS */;
INSERT INTO `chucvu` (`IdCV`, `IdLuong`, `TenCV`) VALUES
	(1, 1, 'Giám Đốc'),
	(2, 1, 'Quản Lý'),
	(3, 1, 'Nhân Viên');
/*!40000 ALTER TABLE `chucvu` ENABLE KEYS */;

-- Dumping structure for table nhahangender.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `IdKH` int(11) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(100) NOT NULL,
  `GioiTinhKH` varchar(5) NOT NULL,
  `SdtKH` varchar(20) NOT NULL,
  `DiaChiKH` varchar(1000) NOT NULL,
  `TenTaiKhoan` varchar(100) NOT NULL,
  `MatKhau` varchar(32) NOT NULL,
  `TenHienThi` varchar(32) NOT NULL,
  PRIMARY KEY (`IdKH`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.khachhang: ~3 rows (approximately)
DELETE FROM `khachhang`;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` (`IdKH`, `TenKH`, `GioiTinhKH`, `SdtKH`, `DiaChiKH`, `TenTaiKhoan`, `MatKhau`, `TenHienThi`) VALUES
	(1, 'Hà Sỹ Nguyên', 'Nam', '0999888666', '126 Phan Trọng Tuệ, Phú Thứ, Cái Răng, Cần Thơ', 'ender77', '009e13e3fdf6d6c36312c77804b18df9', 'Ender'),
	(2, 'Hà Sỹ Nguyên', 'Nam', '01234567890', 'Cần Thơ', 'nguyen@gmail.com', '202cb962ac59075b964b07152d234b70', 'ender'),
	(3, 'Trần Thanh Phụng', 'Nam', '0987789789', 'Trà Vinh', 'ttphung', '009e13e3fdf6d6c36312c77804b18df9', 'Phụng');
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;

-- Dumping structure for table nhahangender.khachhang_sothich
CREATE TABLE IF NOT EXISTS `khachhang_sothich` (
  `IdKH` int(11) NOT NULL,
  `IdSoThich` int(11) NOT NULL,
  KEY `IdKH` (`IdKH`),
  KEY `IdSoThich` (`IdSoThich`),
  CONSTRAINT `FK_khachhang_sothich_khachhang` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`IdKH`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_khachhang_sothich_sothich` FOREIGN KEY (`IdSoThich`) REFERENCES `sothich` (`IdSoThich`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nhahangender.khachhang_sothich: ~0 rows (approximately)
DELETE FROM `khachhang_sothich`;
/*!40000 ALTER TABLE `khachhang_sothich` DISABLE KEYS */;
/*!40000 ALTER TABLE `khachhang_sothich` ENABLE KEYS */;

-- Dumping structure for table nhahangender.lichtruc
CREATE TABLE IF NOT EXISTS `lichtruc` (
  `IdNV` int(11) NOT NULL,
  `IdCaTruc` int(11) NOT NULL,
  `IdNgay` int(11) NOT NULL,
  `TenLichTruc` varchar(50) NOT NULL,
  PRIMARY KEY (`IdNV`,`IdCaTruc`,`IdNgay`),
  KEY `IdNV` (`IdNV`),
  KEY `IdCaTruc` (`IdCaTruc`),
  KEY `IdNgay` (`IdNgay`),
  CONSTRAINT `FK_lichtruc_catruc` FOREIGN KEY (`IdCaTruc`) REFERENCES `catruc` (`IdCaTruc`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_lichtruc_ngaytruc` FOREIGN KEY (`IdNgay`) REFERENCES `ngaytruc` (`IdNgay`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_lichtruc_nhanvien` FOREIGN KEY (`IdNV`) REFERENCES `nhanvien` (`IdNV`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.lichtruc: ~0 rows (approximately)
DELETE FROM `lichtruc`;
/*!40000 ALTER TABLE `lichtruc` DISABLE KEYS */;
/*!40000 ALTER TABLE `lichtruc` ENABLE KEYS */;

-- Dumping structure for table nhahangender.loaiban
CREATE TABLE IF NOT EXISTS `loaiban` (
  `IdLoaiBan` int(11) NOT NULL,
  `TenLoaiBan` varchar(50) NOT NULL,
  PRIMARY KEY (`IdLoaiBan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.loaiban: ~3 rows (approximately)
DELETE FROM `loaiban`;
/*!40000 ALTER TABLE `loaiban` DISABLE KEYS */;
INSERT INTO `loaiban` (`IdLoaiBan`, `TenLoaiBan`) VALUES
	(1, 'Bàn thường'),
	(2, 'Bàn gia đình'),
	(3, 'Bàn Tiệc');
/*!40000 ALTER TABLE `loaiban` ENABLE KEYS */;

-- Dumping structure for table nhahangender.loaimonan
CREATE TABLE IF NOT EXISTS `loaimonan` (
  `IdLoai` int(11) NOT NULL,
  `TenLoai` varchar(32) NOT NULL,
  PRIMARY KEY (`IdLoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.loaimonan: ~5 rows (approximately)
DELETE FROM `loaimonan`;
/*!40000 ALTER TABLE `loaimonan` DISABLE KEYS */;
INSERT INTO `loaimonan` (`IdLoai`, `TenLoai`) VALUES
	(1, 'Hải Sản'),
	(2, 'Bữa Sáng'),
	(3, 'Đặc Biệt'),
	(4, 'Tráng Miệng'),
	(5, 'Bữa Tối');
/*!40000 ALTER TABLE `loaimonan` ENABLE KEYS */;

-- Dumping structure for table nhahangender.luong
CREATE TABLE IF NOT EXISTS `luong` (
  `IdLuong` int(11) NOT NULL,
  `HeSoLuong` decimal(10,0) NOT NULL,
  PRIMARY KEY (`IdLuong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.luong: ~2 rows (approximately)
DELETE FROM `luong`;
/*!40000 ALTER TABLE `luong` DISABLE KEYS */;
INSERT INTO `luong` (`IdLuong`, `HeSoLuong`) VALUES
	(1, 20000000),
	(2, 15000000);
/*!40000 ALTER TABLE `luong` ENABLE KEYS */;

-- Dumping structure for table nhahangender.magiamgia
CREATE TABLE IF NOT EXISTS `magiamgia` (
  `IdMa` int(11) NOT NULL AUTO_INCREMENT,
  `Ma` varchar(50) NOT NULL,
  `PhanTram` int(11) NOT NULL,
  PRIMARY KEY (`IdMa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nhahangender.magiamgia: ~2 rows (approximately)
DELETE FROM `magiamgia`;
/*!40000 ALTER TABLE `magiamgia` DISABLE KEYS */;
INSERT INTO `magiamgia` (`IdMa`, `Ma`, `PhanTram`) VALUES
	(1, 'ENDER', 10),
	(2, 'ENDER2', 20);
/*!40000 ALTER TABLE `magiamgia` ENABLE KEYS */;

-- Dumping structure for table nhahangender.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nhahangender.migrations: ~4 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2020_06_12_091855_create_admin_table', 1),
	(3, '2021_01_08_145820_create_nhanvien1_table', 2),
	(4, '2021_01_08_151156_create_nhanvien1_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table nhahangender.monan
CREATE TABLE IF NOT EXISTS `monan` (
  `IdMonAn` int(11) NOT NULL,
  `IdLoai` int(11) NOT NULL,
  `TenMon` varchar(100) NOT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `HinhAnh` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdMonAn`),
  KEY `FK_monan_loaimonan` (`IdLoai`),
  CONSTRAINT `FK_monan_loaimonan` FOREIGN KEY (`IdLoai`) REFERENCES `loaimonan` (`IdLoai`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.monan: ~12 rows (approximately)
DELETE FROM `monan`;
/*!40000 ALTER TABLE `monan` DISABLE KEYS */;
INSERT INTO `monan` (`IdMonAn`, `IdLoai`, `TenMon`, `DonGia`, `HinhAnh`) VALUES
	(1, 2, 'Bánh Mì Sandwich', 35000, 'bread-bg164.png'),
	(2, 3, 'Gà Chiên Nước Mắm', 125000, 'food670.jpg'),
	(3, 4, 'Kem Dâu Cuộn', 20000, 'food947.jpg'),
	(4, 4, 'Salad Sốt Giấm', 20000, 'food868.jpg'),
	(6, 3, 'Bia Tươi', 75000, '12359.jpg'),
	(8, 1, 'Tôm Hùm Alaska', 1200000, 'tomhum54.png'),
	(9, 2, 'Bánh Mì Việt Nam', 20000, 'monan33.png'),
	(10, 3, 'Vịt Quay Bắc Kinh', 500000, 'monan438.png'),
	(11, 2, 'Phở Việt Nam', 70000, 'monan138.png'),
	(12, 5, 'Cơm Sườn Bì Chả', 50000, 'monan569.png'),
	(13, 5, 'Cơm Trộn Hàn Quốc', 150000, 'monan215.png'),
	(14, 1, 'Cua Hoàng Đế', 2000000, 'unknown7.png');
/*!40000 ALTER TABLE `monan` ENABLE KEYS */;

-- Dumping structure for table nhahangender.ngaytruc
CREATE TABLE IF NOT EXISTS `ngaytruc` (
  `IdNgay` int(11) NOT NULL AUTO_INCREMENT,
  `Ngay` date NOT NULL,
  PRIMARY KEY (`IdNgay`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.ngaytruc: ~3 rows (approximately)
DELETE FROM `ngaytruc`;
/*!40000 ALTER TABLE `ngaytruc` DISABLE KEYS */;
INSERT INTO `ngaytruc` (`IdNgay`, `Ngay`) VALUES
	(1, '2020-07-07'),
	(2, '2020-07-08'),
	(3, '2020-07-09');
/*!40000 ALTER TABLE `ngaytruc` ENABLE KEYS */;

-- Dumping structure for table nhahangender.nhahang
CREATE TABLE IF NOT EXISTS `nhahang` (
  `IdNhaHang` int(11) NOT NULL AUTO_INCREMENT,
  `TenNhaHang` varchar(1000) NOT NULL,
  `DiaChi` varchar(1000) NOT NULL,
  `ThanhPho` varchar(150) NOT NULL,
  PRIMARY KEY (`IdNhaHang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nhahangender.nhahang: ~3 rows (approximately)
DELETE FROM `nhahang`;
/*!40000 ALTER TABLE `nhahang` DISABLE KEYS */;
INSERT INTO `nhahang` (`IdNhaHang`, `TenNhaHang`, `DiaChi`, `ThanhPho`) VALUES
	(1, 'Ender Cần Thơ', '96A Lý Tự Trọng, Phường An Cư, Quận Ninh Kiều, TP Cần Thơ', 'Cần Thơ'),
	(2, 'Ender Sóc Trăng', '16 Lê Duẩn, Phường 1, TP Sóc Trăng', 'Sóc Trăng'),
	(3, 'Ender TP Hồ Chí Minh', '104 Phổ Quang, Quận Tân Phú, TP HCM', 'Thành Phố Hồ Chí Minh');
/*!40000 ALTER TABLE `nhahang` ENABLE KEYS */;

-- Dumping structure for table nhahangender.nhanvien
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `IdNV` int(11) NOT NULL,
  `IdCV` int(11) NOT NULL,
  `IdNhaHang` int(11) NOT NULL,
  `TenNV` varchar(100) NOT NULL,
  `GioiTinhNV` varchar(5) NOT NULL,
  `SdtNV` char(100) NOT NULL,
  `DiaChiNV` varchar(100) NOT NULL,
  `TaiKhoanNV` varchar(32) NOT NULL,
  `MatKhauNV` varchar(32) NOT NULL,
  PRIMARY KEY (`IdNV`),
  KEY `FK_nhanvien_chucvu` (`IdCV`),
  KEY `FK_nhanvien_nhahang` (`IdNhaHang`),
  CONSTRAINT `FK_nhanvien_chucvu` FOREIGN KEY (`IdCV`) REFERENCES `chucvu` (`IdCV`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_nhanvien_nhahang` FOREIGN KEY (`IdNhaHang`) REFERENCES `nhahang` (`IdNhaHang`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.nhanvien: ~3 rows (approximately)
DELETE FROM `nhanvien`;
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
INSERT INTO `nhanvien` (`IdNV`, `IdCV`, `IdNhaHang`, `TenNV`, `GioiTinhNV`, `SdtNV`, `DiaChiNV`, `TaiKhoanNV`, `MatKhauNV`) VALUES
	(1, 2, 1, 'Nguyễn Quang Đạt', 'Nam', '0321000649', 'Hà Nội', 'nhanvien', '009e13e3fdf6d6c36312c77804b18df9'),
	(2, 1, 1, 'Nguyễn Văn Thắng', 'Nam', '0123456000', 'Ninh Bình', 'thang123', '009e13e3fdf6d6c36312c77804b18df9'),
	(3, 3, 2, 'Nguyễn Hoàng Ngọc', 'Nam', '0321232111', 'Sóc Trăng', 'ngoc123', '009e13e3fdf6d6c36312c77804b18df9');
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;

-- Dumping structure for table nhahangender.phieudatban
CREATE TABLE IF NOT EXISTS `phieudatban` (
  `IdDatBan` int(11) NOT NULL AUTO_INCREMENT,
  `IdKH` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `SoLuongBan` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `IdNhaHang` int(11) NOT NULL,
  PRIMARY KEY (`IdDatBan`),
  KEY `FK_phieudatban_khachhang` (`IdKH`),
  KEY `FK_phieudatban_nhahang` (`IdNhaHang`),
  CONSTRAINT `FK_phieudatban_khachhang` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`IdKH`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_phieudatban_nhahang` FOREIGN KEY (`IdNhaHang`) REFERENCES `nhahang` (`IdNhaHang`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.phieudatban: ~22 rows (approximately)
DELETE FROM `phieudatban`;
/*!40000 ALTER TABLE `phieudatban` DISABLE KEYS */;
INSERT INTO `phieudatban` (`IdDatBan`, `IdKH`, `ThoiGian`, `SoLuongBan`, `TinhTrang`, `IdNhaHang`) VALUES
	(16, 2, '2021-01-03 01:16:00', 4, 1, 1),
	(17, 1, '2021-01-14 15:23:00', 2, 2, 2),
	(19, 1, '2021-01-15 14:46:00', 3, 1, 1),
	(20, 1, '2021-01-16 01:03:00', 2, 1, 1),
	(21, 1, '2021-01-15 01:03:00', 4, 2, 1),
	(22, 1, '2021-01-08 15:42:00', 3, 2, 1),
	(23, 1, '2021-01-08 02:43:00', 1, 2, 1),
	(24, 1, '2021-01-07 03:43:00', 6, 2, 2),
	(25, 1, '2021-01-14 01:45:00', 55, 1, 1),
	(26, 1, '2020-12-31 18:11:00', 2, 2, 2),
	(27, 1, '2021-01-09 18:39:00', 2, 2, 1),
	(28, 1, '2021-01-09 18:39:00', 2, 2, 1),
	(29, 1, '2021-01-07 18:41:00', 2, 1, 1),
	(30, 1, '2021-01-15 19:54:00', 1, 2, 1),
	(31, 1, '2021-01-10 18:04:00', 3, 1, 2),
	(32, 1, '2021-01-10 19:14:00', 4, 2, 1),
	(33, 1, '2021-01-10 19:14:00', 4, 1, 1),
	(34, 1, '2021-01-14 19:14:00', 4, 1, 2),
	(35, 3, '2021-01-14 18:01:00', 3, 0, 1),
	(36, 1, '2021-01-12 11:29:00', 2, 2, 1),
	(37, 1, '2021-01-14 06:31:00', 2, 0, 2),
	(38, 1, '2021-01-14 21:05:00', 2, 0, 1);
/*!40000 ALTER TABLE `phieudatban` ENABLE KEYS */;

-- Dumping structure for table nhahangender.phieudatmonan
CREATE TABLE IF NOT EXISTS `phieudatmonan` (
  `IdDatMon` int(11) NOT NULL AUTO_INCREMENT,
  `IdKH` int(11) NOT NULL,
  `TongGiaTien` decimal(10,0) NOT NULL,
  `ThoiGianDat` datetime NOT NULL DEFAULT current_timestamp(),
  `PhuongThucThanhToan` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 0,
  `IdNhaHang` int(11) NOT NULL,
  PRIMARY KEY (`IdDatMon`),
  KEY `FK_phieudatmonan_khachhang` (`IdKH`),
  KEY `FK_phieudatmonan_nhahang` (`IdNhaHang`),
  CONSTRAINT `FK_phieudatmonan_khachhang` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`IdKH`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_phieudatmonan_nhahang` FOREIGN KEY (`IdNhaHang`) REFERENCES `nhahang` (`IdNhaHang`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.phieudatmonan: ~13 rows (approximately)
DELETE FROM `phieudatmonan`;
/*!40000 ALTER TABLE `phieudatmonan` DISABLE KEYS */;
INSERT INTO `phieudatmonan` (`IdDatMon`, `IdKH`, `TongGiaTien`, `ThoiGianDat`, `PhuongThucThanhToan`, `TrangThai`, `IdNhaHang`) VALUES
	(29, 1, 750000, '2021-01-09 18:18:28', 0, 2, 1),
	(30, 1, 95000, '2021-01-09 19:39:57', 0, 3, 2),
	(31, 1, 150000, '2021-01-09 19:54:15', 0, 3, 2),
	(32, 1, 60000, '2021-01-09 19:54:36', 0, 2, 2),
	(33, 1, 1250000, '2021-01-09 21:50:22', 0, 2, 2),
	(34, 1, 225000, '2021-01-09 22:00:52', 0, 0, 2),
	(35, 1, 415000, '2021-01-09 22:01:14', 0, 2, 1),
	(36, 3, 145000, '2021-01-10 18:02:00', 0, 3, 1),
	(37, 3, 420000, '2021-01-10 18:02:29', 0, 2, 1),
	(38, 3, 650000, '2021-01-10 18:22:16', 0, 1, 3),
	(39, 3, 415000, '2021-01-10 18:59:07', 1, 2, 1),
	(40, 1, 240000, '2021-01-11 13:49:07', 0, 0, 1),
	(41, 1, 4500000, '2021-01-13 08:06:05', 0, 0, 1);
/*!40000 ALTER TABLE `phieudatmonan` ENABLE KEYS */;

-- Dumping structure for table nhahangender.sanh
CREATE TABLE IF NOT EXISTS `sanh` (
  `IdSanh` int(11) NOT NULL,
  `IdNhaHang` int(11) NOT NULL DEFAULT 0,
  `TenSanh` varchar(50) NOT NULL,
  PRIMARY KEY (`IdSanh`),
  KEY `FK_sanh_nhahang` (`IdNhaHang`),
  CONSTRAINT `FK_sanh_nhahang` FOREIGN KEY (`IdNhaHang`) REFERENCES `nhahang` (`IdNhaHang`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table nhahangender.sanh: ~4 rows (approximately)
DELETE FROM `sanh`;
/*!40000 ALTER TABLE `sanh` DISABLE KEYS */;
INSERT INTO `sanh` (`IdSanh`, `IdNhaHang`, `TenSanh`) VALUES
	(1, 1, 'CT-A1'),
	(2, 1, 'CT-A2'),
	(3, 2, 'ST-T1'),
	(4, 3, 'HCM-S1');
/*!40000 ALTER TABLE `sanh` ENABLE KEYS */;

-- Dumping structure for table nhahangender.sothich
CREATE TABLE IF NOT EXISTS `sothich` (
  `IdSoThich` int(11) NOT NULL,
  `TenSoThich` int(11) NOT NULL,
  PRIMARY KEY (`IdSoThich`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table nhahangender.sothich: ~0 rows (approximately)
DELETE FROM `sothich`;
/*!40000 ALTER TABLE `sothich` DISABLE KEYS */;
/*!40000 ALTER TABLE `sothich` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

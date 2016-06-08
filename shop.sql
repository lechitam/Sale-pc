-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2013 at 06:56 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE IF NOT EXISTS `giohang` (
  `id_giohang` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `user` varchar(255) NOT NULL,
  `soluong` int(10) NOT NULL,
  `tinhtrang` text NOT NULL,
  `ngaydat` datetime NOT NULL,
  PRIMARY KEY (`id_giohang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`id_giohang`, `id`, `user`, `soluong`, `tinhtrang`, `ngaydat`) VALUES
(138, 71368668, 'phuong', 10, 'damua', '2013-12-20 10:05:14'),
(139, 71368666, 'phuong', 1, 'damua', '2013-12-20 10:09:47'),
(149, 71368667, 'xuanquocqn', 1, 'dathang', '2013-12-25 17:42:32'),
(141, 71368667, 'admin', 1, 'damua', '2013-12-20 10:16:52'),
(142, 71368671, 'admin', 2, 'damua', '2013-12-20 10:16:52'),
(143, 71368671, 'xuanquocqn', 1, 'damua', '2013-12-21 12:06:24'),
(150, 71368666, 'phuongle', 2, 'dathang', '2013-12-26 02:32:50'),
(146, 914362335, 'xuanquocqn', 1, 'dathang', '2013-12-22 12:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
  `id_hoadon` int(10) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(255) NOT NULL,
  `diachi` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `dienthoai` int(20) NOT NULL,
  `fax` int(20) NOT NULL,
  `cty` varchar(255) NOT NULL,
  `id` varchar(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `tongtien` float NOT NULL,
  `ngaydat` datetime NOT NULL,
  `tinhtrang` text NOT NULL,
  PRIMARY KEY (`id_hoadon`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id_hoadon`, `hoten`, `diachi`, `email`, `dienthoai`, `fax`, `cty`, `id`, `soluong`, `tongtien`, `ngaydat`, `tinhtrang`) VALUES

(35, 'Lê Chí Tâm', 'TPHCM', 'lechitam505@gmail.com', 2147483647, 0, '', '71368670', 2, 42000000, '2013-12-25 04:44:54', 'dathang');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE IF NOT EXISTS `lienhe` (
  `id_lienhe` int(10) NOT NULL AUTO_INCREMENT,
  `hoten` text NOT NULL,
  `cty` text NOT NULL,
  `email` text NOT NULL,
  `dienthoai` int(20) NOT NULL,
  `fax` int(20) NOT NULL,
  `diachi` text NOT NULL,
  `noidung` text NOT NULL,
  `ngaylienhe` datetime NOT NULL,
  PRIMARY KEY (`id_lienhe`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id_lienhe`, `hoten`, `cty`, `email`, `dienthoai`, `fax`, `diachi`, `noidung`, `ngaylienhe`) VALUES
(14, 'Khách Hàng', 'FPT', 'khachhang@gmail.com', 96999346, 123456, 'TPHCM', 'Cố lên mấy bạn trẻ', '2013-12-20 09:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `id_loai` int(10) NOT NULL,
  `id_nhom` int(11) NOT NULL,
  `tenloaisp` text NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  PRIMARY KEY (`id_loai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id_loai`, `id_nhom`, `tenloaisp`, `ghichu`) VALUES
(15, 2, 'Loa Laptop', ''),
(7, 1, 'Samsung', ''),
(6, 1, 'Toshiba', ''),
(5, 1, 'Sony', ''),
(11, 2, 'USB 3G', ''),
(10, 2, 'USB', ''),
(16, 1, 'BenQ', ''),
(13, 2, 'Chuột', ''),
(4, 1, 'HP Compaq', ''),
(3, 1, 'Asus', ''),
(9, 1, 'Lenovo', ''),
(8, 1, 'Dell', ''),
(1, 1, 'Apple (Macbook)', ''),
(2, 1, 'Acer', '');

-- --------------------------------------------------------

--
-- Table structure for table `nhomsanpham`
--

CREATE TABLE IF NOT EXISTS `nhomsanpham` (
  `id_nhom` int(10) NOT NULL,
  `tennhom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_nhom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhomsanpham`
--

INSERT INTO `nhomsanpham` (`id_nhom`, `tennhom`) VALUES
(1, 'Laptop'),
(2, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_loai` int(10) NOT NULL,
  `tensp` text NOT NULL,
  `mota` text NOT NULL,
  `hinh` text NOT NULL,
  `gia` int(15) NOT NULL,
  `ghichu` text NOT NULL,
  `soluongban` int(10) NOT NULL,
  `id_menu` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2147483648 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `id_loai`, `tensp`, `mota`, `hinh`, `gia`, `ghichu`, `soluongban`, `id_menu`) VALUES
(71368666, 7, 'Samsung NP540U3C', '<p>&nbsp;</p>\r\n<h2 style="margin: 0px; padding: 0px; word-wrap: break-word; font-size: 38px; line-height: 38px; font-weight: normal; font-family: PFSquareSansProMedium, Arial, sans-serif;">C&ocirc;ng nghệ touch &ldquo;si&ecirc;u mượt&rdquo;, kết nối hữu hiệu với Ultrabook touch từ Samsung</h2>\r\n<h3 style="margin: 0px 0px 8px; padding: 0px; word-wrap: break-word; font-size: 12px; line-height: 1.2; color: rgb(1, 1, 1); font-family: Arial, sans-serif;">rải nghiệm &ldquo;đa chạm&rdquo; trọn vẹn</h3>\r\n<p style="margin: 0px 0px 15px; padding: 0px; word-wrap: break-word; line-height: 1.5; font-family: Arial, sans-serif;">Chỉ cần &ldquo;chạm nhẹ v&agrave; trải nghiệm ngay&rdquo; với Samsung Series 5 Ultra. Trải nghiệm th&uacute; vị n&agrave;y được thực hiện dễ d&agrave;ng tr&ecirc;n m&agrave;n h&igrave;nh 13.3in HD Super Bright nhờ c&ocirc;ng nghệ tương t&aacute;c điểm của Win 8, cảm gi&aacute;c chạm &ldquo;mượt&rdquo; m&agrave; v&agrave; ho&agrave;n ho&agrave;n được sử dụng hiệu quả tr&ecirc;n tất cả 10 ng&oacute;n tay. Bạn sẽ tận hưởng cảm gi&aacute;c lướt nhẹ s&agrave;nh điệu, d&ugrave; l&agrave;m việc, hay giải tr&iacute; cả ng&agrave;y d&agrave;i với c&aacute;c ứng dụng (apps) v&agrave; những tr&ograve; chơi hấp dẫn nhất.</p>\r\n<h3 style="margin: 0px 0px 8px; padding: 0px; word-wrap: break-word; font-size: 12px; line-height: 1.2; color: rgb(1, 1, 1); font-family: Arial, sans-serif;">Lưu trữ lớn cho mọi thứ bạn cần</h3>\r\n<p style="margin: 0px 0px 15px; padding: 0px; word-wrap: break-word; line-height: 1.5; font-family: Arial, sans-serif;">Việc sở hữu một chiếc notebook di động si&ecirc;u mỏng trước giờ lu&ocirc;n đồng nghĩa với việc bạn phải &ldquo; hy sinh&rdquo; một lượng lưu trữ đ&aacute;ng kể. Tuy nhi&ecirc;n, notebook si&ecirc;u mỏng Samsung Series 5 ULTRA lại được thiết kế với dung lượng lưu trữ khổng lồ. Ổ đĩa cứng với khả năng lưu trữ dữ liệu l&ecirc;n đến 500GB gi&uacute;p người d&ugrave;ng tận hưởng &acirc;m nhạc, phim ảnh thỏa th&iacute;ch.</p>\r\n<h3 style="margin: 0px 0px 8px; padding: 0px; word-wrap: break-word; font-size: 12px; line-height: 1.2; color: rgb(1, 1, 1); font-family: Arial, sans-serif;">Thiết kế si&ecirc;u di động</h3>\r\n<p style="margin: 0px 0px 15px; padding: 0px; word-wrap: break-word; line-height: 1.5; font-family: Arial, sans-serif;">Với những người thường xuy&ecirc;n di chuyển, việc phải mang theo b&ecirc;n người một chiếc notebook cồng kềnh bao giờ cũng l&agrave; một g&aacute;nh nặng lớn.Thấu hiểu điều đ&oacute;, Samsung mang đến bạn Series 5 ULTRA c&oacute; thiết kế rất mỏng (19.9mm), nhẹ (1.69 kg) - th&iacute;ch hợp cho cuộc sống năng động h&agrave;ng ng&agrave;y của bạn. Với Samsung Series 5 ULTRA, bạn sẽ lu&ocirc;n c&oacute; văn ph&ograve;ng của m&igrave;nh, ở mọi l&uacute;c, mọi nơi.</p>', 'SamsungNP540U3C.jpg', 26497000, 'new', 1, 0),
(49260, 1, 'MacBook Air MD760', '<p>CPU<span style="white-space:pre" class="Apple-tab-span">	</span>Intel, Core i5 Haswell, 4250U, 1.30 GHz</p>\r\n<p>RAM<span style="white-space:pre" class="Apple-tab-span">	</span>DDR3L(On board), 4 GB</p>\r\n<p>Đĩa cứng<span style="white-space:pre" class="Apple-tab-span">	</span>SSD, 128 GB</p>\r\n<p>M&agrave;n h&igrave;nh rộng<span style="white-space:pre" class="Apple-tab-span">	</span>13.3 inch, HD (1440 x 900 pixels)</p>\r\n<p>Cảm ứng<span style="white-space:pre" class="Apple-tab-span">	</span>Kh&ocirc;ng</p>\r\n<p>Đồ họa<span style="white-space:pre" class="Apple-tab-span">	</span>Intel HD Graphics 5000, Share 1664MB</p>\r\n<p>Đĩa quang<span style="white-space:pre" class="Apple-tab-span">	</span>Kh&ocirc;ng</p>\r\n<p>HĐH theo m&aacute;y<span style="white-space:pre" class="Apple-tab-span">	</span>Mac OS X</p>\r\n<p>PIN/Battery<span style="white-space:pre" class="Apple-tab-span">	</span>4cell Li - Polymer</p>\r\n<p>Trọng lượng (Kg)<span style="white-space:pre" class="Apple-tab-span">	</span>1.35</p>', 'MacBookAirMD760.jpg', 26990000, 'new', 1, 0),
(71368667, 7, 'Samsung XE700T1C', '<p>&nbsp;</p>\r\n<h2 style="margin: 0px; padding: 0px; word-wrap: break-word; font-size: 38px; line-height: 38px; font-weight: normal; font-family: PFSquareSansProMedium, Arial, sans-serif;">Trợ thủ văn ph&ograve;ng di động</h2>\r\n<p class="headline" style="margin: 20px 0px 0px; padding: 0px; word-wrap: break-word; font-size: 17px; font-family: PFSquareSansProMedium, Arial, sans-serif; color: rgb(102, 102, 102); line-height: 22px;">Trải nghiệm sự tiện dụng của một m&aacute;y t&iacute;nh bảng với sức mạnh của một m&aacute;y t&iacute;nh x&aacute;ch tay thự thụ với Samsung ATIV Tab 7</p>\r\n<p class="headline" style="margin: 20px 0px 0px; padding: 0px; word-wrap: break-word; font-size: 17px; font-family: PFSquareSansProMedium, Arial, sans-serif; color: rgb(102, 102, 102); line-height: 22px;">&nbsp;</p>\r\n<h3 style="margin: 0px 0px 8px; padding: 0px; word-wrap: break-word; font-size: 12px; line-height: 1.2; color: rgb(1, 1, 1); font-family: Arial, sans-serif;">Sự lựa chọn của giới chuy&ecirc;n nghiệp</h3>\r\n<p style="margin: 0px 0px 15px; padding: 0px; word-wrap: break-word; line-height: 1.5; font-family: Arial, sans-serif;">Nếu bạn cần một thiết bị hỗ trợ mạnh mẽ đ&iacute;ch thực, Samsung ATIV Tab 7 sẽ đ&aacute;p ứng mọi nhu cầu của bạn. Với bộ vi xử l&yacute; Intel &reg; Core &trade; i5 thế hệ mới nhất, m&aacute;y cho ph&eacute;p duyệt web nhanh hơn, xử l&yacute; đa t&aacute;c vụ mạnh mẽ, chuyển đổi video hoặc &acirc;m nhạc, v&agrave; c&oacute; thể chạy c&aacute;c ứng dụng &quot;nặng k&yacute; nhất&quot;.</p>\r\n<h3 style="margin: 0px 0px 8px; padding: 0px; word-wrap: break-word; font-size: 12px; line-height: 1.2; color: rgb(1, 1, 1); font-family: Arial, sans-serif;">Đ&aacute;p ứng mọi nhu cầu - từ s&aacute;ng tạo đến giải tr&iacute;</h3>\r\n<p style="margin: 0px 0px 15px; padding: 0px; word-wrap: break-word; line-height: 1.5; font-family: Arial, sans-serif;">Một thiết kế mang t&iacute;nh c&aacute;ch mạng kết hợp sức mạnh của một m&aacute;y t&iacute;nh x&aacute;ch tay với t&iacute;nh cơ động của m&aacute;y t&iacute;nh bảng. Bạn c&oacute; thể tận hưởng c&aacute;c tiện &iacute;ch giải tr&iacute; một c&aacute;ch linh hoạt v&agrave; thuận tiện dụng đang di chuyển, như duyệt web, kết nối mạng x&atilde; hội, xem phim v&agrave; chơi game. Chỉ cần gắn th&ecirc;m b&agrave;n ph&iacute;m v&agrave; touchpad l&agrave; bạn đ&atilde; c&oacute; thể giải quyết c&ocirc;ng việc hiệu quả, v&agrave; s&aacute;ng tạo như tr&ecirc;n một m&aacute;y t&iacute;nh x&aacute;ch tay.</p>\r\n<h3 style="margin: 0px 0px 8px; padding: 0px; word-wrap: break-word; font-size: 12px; line-height: 1.2; color: rgb(1, 1, 1); font-family: Arial, sans-serif;">Viết khi di chuyển</h3>\r\n<p style="margin: 0px 0px 15px; padding: 0px; word-wrap: break-word; line-height: 1.5; font-family: Arial, sans-serif;">B&uacute;t S Pen đ&atilde; đưa trải nghiệm viết v&agrave; vẽ thực tế v&agrave;o thế giới m&aacute;y t&iacute;nh. Được chế tạo nh&agrave; sản xuất c&ocirc;ng nghệ h&agrave;ng đầu Wacom, với 1024 mức cảm ứng cho độ ch&iacute;nh x&aacute;c si&ecirc;u việt theo ti&ecirc;u chuẩn của c&aacute;c thiết kế gia chuy&ecirc;n nghiệp, tạo cảm gi&aacute;c như đang d&ugrave;ng một c&acirc;y b&uacute;t hoặc b&uacute;t ch&igrave; th&ocirc;ng thường. Để tối ưu h&oacute;a sự thoải m&aacute;i v&agrave; tiện dụng, b&uacute;t c&oacute; k&iacute;ch thước v&agrave; h&igrave;nh d&aacute;ng như b&uacute;t thật v&agrave; được cắm ở khe b&ecirc;n h&ocirc;ng m&aacute;y.</p>', 'SamsungXE700T1C.jpg', 39000000, 'new', 1, 0),
(71368668, 7, 'Samsung NP530U4C', '<p>&nbsp;<span style="font-family: PFSquareSansProMedium, Arial, sans-serif; font-size: 38px; line-height: 38px;">Sức mạnh của một notebook hiệu năng</span></p>\r\n<p class="headline" style="margin: 20px 0px 0px; padding: 0px; word-wrap: break-word; font-size: 17px; font-family: PFSquareSansProMedium, Arial, sans-serif; color: rgb(102, 102, 102); line-height: 22px;">Samsung Notebook Series 5 ULTRA</p>\r\n<h3 style="margin: 0px 0px 8px; padding: 0px; word-wrap: break-word; font-size: 12px; line-height: 1.2; color: rgb(1, 1, 1); font-family: Arial, sans-serif;">Những giải ph&aacute;p nhanh của Samsung</h3>\r\n<p style="margin: 0px 0px 15px; padding: 0px; word-wrap: break-word; line-height: 1.5; font-family: Arial, sans-serif;">Bạn c&oacute; thể l&agrave;m việc hay giải tr&iacute; hiệu quả hơn với tốc độ nhanh đến kinh ngạc của notebook Samsung Series 5. M&aacute;y chỉ mất 20 gi&acirc;y để khởi động nhờ t&iacute;nh năng Fast Boot hay ngạc nhi&ecirc;n hơn l&agrave; chỉ với 2 gi&acirc;y nhờ t&iacute;nh năng Fast Start. Khả năng Plus Fast Browsing t&iacute;ch hợp sẵn cho ph&eacute;p bạn duyệt những trang web thường xem với tốc độ gấp đ&ocirc;i th&ocirc;ng thường.<br />\r\n* Tốc độ thay đổi t&ugrave;y thuộc v&agrave;o cấu h&igrave;nh, ứng dụng v&agrave; c&aacute;c thiết lập kh&ocirc;ng d&acirc;y<br />\r\n* Thời gian khởi động phụ thuộc kiểu ổ cứng</p>', 'SamsungNP530U4C.jpg', 21999999, 'new', 20, 0),
(71368669, 7, 'Samsung NP535U3X', '<p>&nbsp;<span style="font-family: PFSquareSansProMedium, Arial, sans-serif; font-size: 38px; line-height: 38px;">C&acirc;n bằng ho&agrave;n hảo giữa hiệu suất v&agrave; khả năng di động</span></p>\r\n<p class="headline" style="margin: 20px 0px 0px; padding: 0px; word-wrap: break-word; font-size: 17px; font-family: PFSquareSansProMedium, Arial, sans-serif; color: rgb(102, 102, 102); line-height: 22px;">&bull; Sức mạnh của một notebook hiệu năng<br />\r\n&bull; Thiết kế si&ecirc;u di động<br />\r\n&bull; Những giải ph&aacute;p nhanh của Samsung<br />\r\n&bull; C&ocirc;ng nghệ m&agrave;n h&igrave;nh vượt trội của Samsung</p>', 'SamsungNP535U3X.jpg', 13900000, 'hienthi', 0, 0),
(71368670, 7, 'Samsung NP530U3C', '<p>&nbsp;<span style="font-family: PFSquareSansProMedium, Arial, sans-serif; font-size: 38px; line-height: 38px;">Samsung Series 5 ULTRA</span></p>\r\n<p class="headline" style="margin: 20px 0px 0px; padding: 0px; word-wrap: break-word; font-size: 17px; font-family: PFSquareSansProMedium, Arial, sans-serif; color: rgb(102, 102, 102); line-height: 22px;">Sức mạnh của một Ultrabook&trade; hiệu năng</p>\r\n<h3 style="margin: 0px 0px 8px; padding: 0px; word-wrap: break-word; font-size: 12px; line-height: 1.2; color: rgb(1, 1, 1); font-family: Arial, sans-serif;">Thiết kế si&ecirc;u di động</h3>\r\n<p style="margin: 0px 0px 15px; padding: 0px; word-wrap: break-word; line-height: 1.5; font-family: Arial, sans-serif;">Với những người thường xuy&ecirc;n di chuyển, việc phải mang theo b&ecirc;n người một chiếc notebook cồng kềnh bao giờ cũng l&agrave; một g&aacute;nh nặng lớn.Thấu hiểu điều đ&oacute;, Samsung mang đến bạn Notebook Series 5 535 c&oacute; thiết kế rất mỏng (14.9 ~ 17.6mm), nhẹ(1.52 kg) - th&iacute;ch hợp cho cuộc sống năng động h&agrave;ng ng&agrave;y của bạn. Với Samsung Series 5 535, bạn sẽ lu&ocirc;n c&oacute; văn ph&ograve;ng của m&igrave;nh, ở mọi l&uacute;c, mọi nơi.</p>', 'SamsungNP530U3C.jpg', 21000000, 'hienthi', 0, 0),
(71368671, 7, 'Samsung NP900X3C', '<p>&nbsp;<span style="font-family: PFSquareSansProMedium, Arial, sans-serif; font-size: 38px; line-height: 38px;">Mỏng đến kh&ocirc;ng ngờ - thiết kế ho&agrave;n hảo</span></p>\r\n<p class="headline" style="margin: 20px 0px 0px; padding: 0px; word-wrap: break-word; font-size: 17px; font-family: PFSquareSansProMedium, Arial, sans-serif; color: rgb(102, 102, 102); line-height: 22px;">&bull; Mỏng đến kh&ocirc;ng ngờ - thiết kế ho&agrave;n hảo<br />\r\n&bull; Thiết kế chưa từng thấy trước nay<br />\r\n&bull; Samsung Fast Solutions<br />\r\n&bull; M&agrave;n h&igrave;nh r&otilde; hơn, s&aacute;ng hơn v&agrave; rộng hơn</p>\r\n<p class="headline" style="margin: 20px 0px 0px; padding: 0px; word-wrap: break-word; font-size: 17px; font-family: PFSquareSansProMedium, Arial, sans-serif; color: rgb(102, 102, 102); line-height: 22px;">&nbsp;</p>', 'SamsungNP900X3C.jpg', 36999999, 'new', 4, 0),
(71368672, 7, 'Samsung NP300E4X', '<p>&nbsp;<span style="font-family: PFSquareSansProMedium, Arial, sans-serif; font-size: 38px; line-height: 38px;">Đ&aacute;p ứng mọi nhu cầu tại gia</span></p>\r\n<p class="headline" style="margin: 20px 0px 0px; padding: 0px; word-wrap: break-word; font-size: 17px; font-family: PFSquareSansProMedium, Arial, sans-serif; color: rgb(102, 102, 102); line-height: 22px;">Samsung Notebook Series 3</p>\r\n<h3 style="margin: 0px 0px 8px; padding: 0px; word-wrap: break-word; font-size: 12px; line-height: 1.2; color: rgb(1, 1, 1); font-family: Arial, sans-serif;">M&agrave;n h&igrave;nh mảnh mai</h3>\r\n<p style="margin: 0px 0px 15px; padding: 0px; word-wrap: break-word; line-height: 1.5; font-family: Arial, sans-serif;">G&oacute;p phần tạo n&ecirc;n một thiết kế si&ecirc;u di động l&agrave; viền m&agrave;n h&igrave;nh cực mỏng &ndash; chỉ bằng một &ldquo;l&oacute;ng tay&rdquo; (mỏng hơn 55 - 60% so với c&aacute;c model trước đ&oacute;*). Chiếc laptop sẽ nhỏ hơn v&agrave; nhẹ hơn nhưng kh&ocirc;ng ảnh hưởng đến k&iacute;ch thước m&agrave;n h&igrave;nh, thật dễ để bạn mang theo b&ecirc;n m&igrave;nh khi ra ngo&agrave;i. Đặc biệt, với thiết kế sang trọng của chiếc laptop, bạn sẽ lu&ocirc;n tr&ocirc;ng thật s&agrave;nh điệu.&nbsp;<br />\r\n* So s&aacute;nh với d&ograve;ng laptop RV / RC</p>\r\n<h3 style="margin: 0px 0px 8px; padding: 0px; word-wrap: break-word; font-size: 12px; line-height: 1.2; color: rgb(1, 1, 1); font-family: Arial, sans-serif;">Thời lượng sử dụng pin l&ecirc;n tới 7.5 giờ</h3>\r\n<p style="margin: 0px 0px 15px; padding: 0px; word-wrap: break-word; line-height: 1.5; font-family: Arial, sans-serif;">Thật thoải m&aacute;i với thời lượng sử dụng pin k&eacute;o d&agrave;i l&ecirc;n tới 7.5 giờ* (pin 4400 mAh) / 8.9 giờ* (pin 5200 mAh) cho mỗi lần sạc. Do đ&oacute;, bạn c&oacute; thể l&agrave;m việc l&acirc;u hơn ở qu&aacute;n cafe, lớp học hay bất cứ nơi n&agrave;o &ndash; v&agrave; thậm ch&iacute; vẫn c&ograve;n pin để bạn giải tr&iacute; cuối ng&agrave;y. *Dựa tr&ecirc;n kết quả kiểm tra BatteryMark v&agrave; sẽ kh&aacute;c nhau t&ugrave;y cấu h&igrave;nh m&aacute;y</p>\r\n<h3 style="margin: 0px 0px 8px; padding: 0px; word-wrap: break-word; font-size: 12px; line-height: 1.2; color: rgb(1, 1, 1); font-family: Arial, sans-serif;">Khả năng đồ họa mạnh mẽ</h3>\r\n<p style="margin: 0px 0px 15px; padding: 0px; word-wrap: break-word; line-height: 1.5; font-family: Arial, sans-serif;">Card đồ họa thế hệ mới NVIDIA GeForce mang đến những trải nghiệm video v&agrave; game tuyệt vời, với khả năng đồ họa 3D cao cấp v&agrave; bộ nhớ DDR3 mạnh mẽ. Đ&acirc;y quả l&agrave; chiếc m&aacute;y t&iacute;nh l&yacute; tưởng để chơi những game th&ocirc;ng dụng, xem phim HD hay chỉnh sửa ảnh.</p>', 'SamsungNP300E4X.jpg', 11310000, 'hienthi', 0, 0),
(71368673, 6, 'Satellite L40 33224G50', '', 'SatelliteL4033224G50.jpg', 11300000, 'hienthi', 0, 0),
(7, 6, 'SATELLITE L50', '<p>&nbsp;<strong style="border: 0px; font-size: small; margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: tahoma, arial, helvetica, sans-serif;"><strong style="border: 0px; font-size: 13px; margin: 0px; padding: 0px;">N&acirc;ng cao Trải nghiệm của Bạn</strong><br style="line-height: 10px;" />\r\n<br style="line-height: 10px;" />\r\n</strong><span style="color: rgb(51, 51, 51); font-family: tahoma, arial, helvetica, sans-serif; font-size: small;">Gọn nhẹ v&agrave; Thoải m&aacute;i. Đặc điểm kỹ thuật ưu việt. H&igrave;nh ảnh phim si&ecirc;u thực sắc n&eacute;t, hỗ trợ &acirc;m bass tuyệt hảo. Satellite L50. Đ&oacute; l&agrave;n tất cả những g&igrave; bạn cần để nội trội giữa đ&aacute;m đ&ocirc;ng.</span><strong style="border: 0px; font-size: small; margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: tahoma, arial, helvetica, sans-serif;">&nbsp;</strong></p>\r\n<p style="border: 0px; margin: 0px; padding: 6px 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif;"><strong style="border: 0px; margin: 0px; padding: 0px;"><span style="border: 0px; font-size: small; margin: 0px; padding: 0px; font-family: tahoma, arial, helvetica, sans-serif;">Bộ Tăng tốc HD của Toshiba</span></strong></p>\r\n<p><span style="border: 0px; font-size: small; margin: 0px; padding: 0px; font-family: tahoma, arial, helvetica, sans-serif;">Tăng truy cập v&agrave;o c&aacute;c ứng dụng v&agrave; c&aacute;c chương tr&igrave;nh y&ecirc;u th&iacute;ch của bạn nhanh hơn l&ecirc;n đến 60 %, c&ocirc;ng nghệ của Bộ tăng tốc HDD của Toshiba gi&uacute;p bộ nhớ hệ thống phản ứng nhanh hơn.</span></p>', 'SATELLITEL50.jpg', 15460000, 'new', 0, 0),
(895, 5, 'VAIO® Tap 11', '<p><span style="font-size: larger;"><span style="font-family: Tahoma;">Tablet PC Windows VAIO&reg; Tap 11 đầu ti&ecirc;n của Sony với th&acirc;n m&aacute;y đạt thiết kế mỏng v&agrave; nhẹ với b&agrave;n ph&iacute;m từ kh&ocirc;ng d&acirc;y. B&uacute;t cảm ứng số cho sử dụng linh hoạt v&agrave; hiệu quả như b&uacute;t viết tr&ecirc;n giấy. Một thiết kế độc đ&aacute;o, nhiều ứng dụng, t&iacute;ch hợp c&ocirc;ng nghệ nghe nh&igrave;n cao cấp trong một chiếc Tablet PC ho&agrave;n hảo</span></span></p>', 'VAIOTap11.jpg', 25990000, 'new', 0, 0),
(71368674, 5, 'VAIO® Pro 13', '<p><span style="font-size: large;">Trọng lượng nhẹ với hiệu suất tuyệt vời.</span></p>\r\n<p>&nbsp;</p>\r\n<p style="margin: 0px 25px 0px 0px; padding: 0px; font-size: 12px; line-height: 1.5; color: rgb(0, 0, 0); font-family: Tahoma; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" class="rangeText">VAIO<span style="font-size: 10px; vertical-align: baseline;" class="reg">&reg;</span><span class="Apple-converted-space">&nbsp;</span>Pro  11/13 l&agrave; một chiếc Ultrabook mỏng v&agrave; si&ecirc;u nhẹ với cấu tr&uacute;c carbon bền  bỉ, đạt khả năng kết nối tuyệt vời, b&agrave;n ph&iacute;m thoải m&aacute;i khi g&otilde;, v&agrave; những  t&iacute;nh năng kh&aacute;c gi&uacute;p chiếc m&aacute;y trở th&agrave;nh một c&ocirc;ng cụ tuyệt vời cho c&ocirc;ng  việc. Được trang bị bộ xử l&iacute; Intel<span style="font-size: 10px; vertical-align: baseline;" class="reg">&reg;</span>mạnh  mẽ, Windows 8, tấm nền IPS Full HD với TRILIMINOS Display cho điện  thoại, v&agrave; những t&iacute;nh năng cao cấp kh&aacute;c như ổ cứng SSD tốc độ cao v&agrave; một  t&ugrave;y chọn Pin th&ecirc;m cho m&aacute;y c&agrave;ng gi&uacute;p chiếc m&aacute;y trở n&ecirc;n vượt trội.</p>\r\n<p style="margin: 0px 25px 0px 0px; padding: 0px; font-size: 12px; line-height: 1.5; color: rgb(0, 0, 0); font-family: Tahoma; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" class="rangeText">&nbsp;</p>\r\n<p style="margin: 0px 25px 0px 0px; padding: 0px; font-size: 12px; line-height: 1.5; color: rgb(0, 0, 0); font-family: Tahoma; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" class="rangeText">&nbsp;</p>', 'VAIOPro13.jpg', 35990000, 'new', 0, 0),
(875, 5, 'VAIO® Pro 11', '<h3 style="margin: 15px 0px 10px; padding: 0px; font-size: 22px; font-family: Arial; font-weight: normal; color: rgb(0, 0, 0); font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" class="subTitle">Trọng lượng nhẹ với hiệu suất tuyệt vời.</h3>\r\n<p style="margin: 0px 25px 0px 0px; padding: 0px; font-size: 12px; line-height: 1.5; color: rgb(0, 0, 0); font-family: Tahoma; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" class="rangeText">VAIO<span style="font-size: 10px; vertical-align: baseline;" class="reg">&reg;</span><span class="Apple-converted-space">&nbsp;</span>Pro 11/13 l&agrave; một chiếc Ultrabook mỏng v&agrave; si&ecirc;u nhẹ với cấu tr&uacute;c carbon bền bỉ, đạt khả năng kết nối tuyệt vời, b&agrave;n ph&iacute;m thoải m&aacute;i khi g&otilde;, v&agrave; những t&iacute;nh năng kh&aacute;c gi&uacute;p chiếc m&aacute;y trở th&agrave;nh một c&ocirc;ng cụ tuyệt vời cho c&ocirc;ng việc. Được trang bị bộ xử l&iacute; Intel<span style="font-size: 10px; vertical-align: baseline;" class="reg">&reg;</span>mạnh mẽ, Windows 8, tấm nền IPS Full HD với TRILIMINOS Display cho điện thoại, v&agrave; những t&iacute;nh năng cao cấp kh&aacute;c như ổ cứng SSD tốc độ cao v&agrave; một t&ugrave;y chọn Pin th&ecirc;m cho m&aacute;y c&agrave;ng gi&uacute;p chiếc m&aacute;y trở n&ecirc;n vượt trội.</p>', 'VAIOPro11.jpg', 23990000, 'new', 0, 0),
(914362335, 5, 'VAIO® Fit 14', '<h3 style="margin: 15px 0px 10px; padding: 0px; font-size: 22px; font-family: Arial; font-weight: normal; color: rgb(0, 0, 0); font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" class="subTitle">Hiển thị tuyệt đẹp với mọi nội dung</h3>\r\n<p style="margin: 0px 25px 0px 0px; padding: 0px; font-size: 12px; line-height: 1.5; color: rgb(0, 0, 0); font-family: Tahoma; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" class="rangeText">VAIO<span style="font-size: 10px; vertical-align: baseline;" class="reg">&reg;</span><span class="Apple-converted-space">&nbsp;</span>Fit 14/15 l&agrave; chiếc m&aacute;y t&iacute;nh tối ưu cho cả c&ocirc;ng việc v&agrave; giải tr&iacute; của bạn. Chất lượng h&igrave;nh ảnh r&otilde; n&eacute;t, sống động được tạo ra bằng những c&ocirc;ng nghệ n&acirc;ng cao h&igrave;nh ảnh độc đ&aacute;o của Sony tr&ecirc;n VAIO. M&agrave;n h&igrave;nh hỗ trợ cảm ứng hoạt động linh hoạt v&agrave; tiện lợi hơn. Thiết<br />\r\nkế nổi bật biểu trưng cho chất lượng v&agrave; đa năng thể hiện xuy&ecirc;n suốt qua sự tinh giản v&agrave; thanh tho&aacute;t của chiếc m&aacute;y</p>\r\n<p style="margin: 0px 25px 0px 0px; padding: 0px; font-size: 12px; line-height: 1.5; color: rgb(0, 0, 0); font-family: Tahoma; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" class="rangeText">&nbsp;</p>\r\n<h3 style="margin: 15px 0px 10px; padding: 0px; font-size: 22px; font-family: Arial; font-weight: normal; color: rgb(0, 0, 0); font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" class="subTitle">Cảm nhận &acirc;m thanh tuyệt hơn</h3>\r\n<p style="margin: 0px 25px 0px 0px; padding: 0px; font-size: 12px; line-height: 1.5; color: rgb(0, 0, 0); font-family: Tahoma; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" class="rangeText">VAIO<span style="font-size: 10px; vertical-align: baseline;" class="reg">&reg;</span><span class="Apple-converted-space">&nbsp;</span>Fit 14E/15E tuyệt vời như một chiếc Notebook b&ecirc;n bạn mỗi ng&agrave;y. Chế độ ClearAudio+ tự động tối ưu h&oacute;a chất lượng &acirc;m thanh v&agrave; những giai điệu m&ecirc; đắm từ cập loa đ&ocirc;i c&ocirc;ng suất lớn cho bạn n&acirc;ng cao trải nghiệm &acirc;m nhạc. VAIO<span style="font-size: 10px; vertical-align: baseline;" class="reg">&reg;</span><span class="Apple-converted-space">&nbsp;</span>Fit 15E c&ograve;n trang bị loa si&ecirc;u trầm mạnh mẽ gi&uacute;p tăng cường tiếng Bass phong ph&uacute;. C&ocirc;ng nghệ NFC cho bạn mở rộng c&aacute;ch thưởng thức &acirc;m nhạc. Những g&igrave; bạn cần cho nhu cầu c&ocirc;ng việc v&agrave; giải tr&iacute; đều c&oacute; thể t&igrave;m thấy ở ch&iacute;nh sản phẩm n&agrave;y.</p>', 'VAIOFit14.jpg', 25990000, 'new', 0, 0),
(795, 4, 'HP 1000', '<p><span style="color: rgb(68, 68, 68); font-family: MyriadProSemibold, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;">Intel Core i3 3110M (4*2.40Ghz, 3MB Smart cache, 1600Mhz FSB, 35W), Intel 7 Series Express, 4GB DDR3 BUS 1600Mhz, 500GB SATA, DVD-RW Double Layer, 14 LED HD (1366 x 768) 16:9 Gloss, Intel HD GPU Graphics 3000, Wireless 802.11 b/g/n, NIC 1 Gbps, Card Reader 5.1, Webcam 1.3M, Microphone, Bluetooth, HDMI, 2.1 Kg, Pin 6 Cell, DOS,</span></p>', 'HP1000.jpg', 8500000, 'hienthi', 0, 0),
(0, 4, 'HP 450', '<p><span style="color: rgb(68, 68, 68); font-family: MyriadProSemibold, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;">Intel Core i5 3230M(4*2.60Ghz, 3MB Smart cache, 1600Mhz FSB), Intel 7 Series Express, 2GB DDR3 BUS 1600Mhz, 500 GB SATA, DVD-RW Double Layer, 14 LED HD (1366 x 768) 16:9 Gloss, Intel HD GPU Graphics 4000, Wireless 802.11 b/g/n, NIC 1 Gbps, Card Reader 5.1, Webcam 1.3M, Microphone, Bluetooth 4.0, HDMI, 2.1 Kg, Pin 6 Cell, DOS</span></p>', 'HP450.jpg', 10690000, 'new', 0, 0),
(905, 3, 'ASUS X451CA15', '<p><span style="color: rgb(68, 68, 68); font-family: MyriadProSemibold, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px; orphans: auto; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;">Intel Core i3 3217U (4*1.80Ghz, 3MB Smart cache, 1600Mhz FSB, 17W), Intel 7 Series Express, 2GB DDR3 BUS 1600Mhz, 500 GB SATA, DVD-RW Double Layer, 14.0 LED HD (1366 x 768) 16:9 Gloss, Intel HD GPU Graphics 4000, Wireless 802.11 b/g/n, NIC 1Gbps, Card Reader 5.1, Webcam, Microphone, Bluetooth, HDMI, USB 3.0, 2.1Kg, Pin 4 Cell, DOS, Pin &amp; Adapter bảo h&agrave;nh 12 th&aacute;ng, C&oacute; 2 m&agrave;u : Trắng - Đen</span></p>', 'ASUSX451CA15.jpg', 10570000, 'new', 0, 0),
(2147483647, 3, 'ZENBOOK UX21A', '<p style="margin: 0px 0px 4em; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Thi&ecirc;́t l&acirc;̣p n&ecirc;n các ti&ecirc;u chu&acirc;̉n mới v&ecirc;̀ c&ocirc;ng ngh&ecirc;̣ và thời trang, ZENBOOK Prime chỉ dày 3mm phía đầu máy &amp; 9mm phía đu&ocirc;i máy. M&aacute;y sử dụng phương ph&aacute;p thiết kế thủ c&ocirc;ng tinh vi với th&acirc;n m&aacute;y bằng hợp kim nguy&ecirc;n khối cho trọng lượng nhẹ m&agrave; bền bỉ. Vỏ ngoài gồm họa ti&ecirc;́t những đường tròn đ&ocirc;̀ng t&acirc;m tinh quay lan tỏa th&ecirc;̉ hi&ecirc;̣n sự v&ocirc; t&acirc;̣n trong triết l&yacute; Thi&ecirc;̀n. Thiết kế tổng quan được tối ưu h&oacute;a mang lại một giao diện ho&agrave;n chỉnh kết hợp giữa thẩm mỹ &amp; tốc độ, phục vụ ho&agrave;n hảo cho cả c&ocirc;ng việc lẫn giải tr&iacute;. Đ&ecirc;̉ duy trì giao di&ecirc;̣n này, ASUS đã phát tri&ecirc;̉n bộ phụ ki&ecirc;̣n của ZENBOOK Prime thật ấn tượng và tinh t&ecirc;́.</p>', 'ZENBOOKUX21A.jpg', 25670000, 'new', 0, 0),
(8148, 3, 'TAICHI 21', '<p>Windows 8 Pro Hoặc những phi&ecirc;n bản c&oacute; sẵn kh&aacute;c</p>\r\n<p><br />\r\nSi&ecirc;u hiệu suất được tăng cường nhờ bộ xử l&yacute; Intel&reg; </p>\r\n<p><br />\r\nCore&trade; i7 -3517U thế hệ thứ 3</p>\r\n<p><br />\r\nM&aacute;y t&iacute;nh x&aacute;ch tay 2 m&agrave;n h&igrave;nh t&iacute;ch hợp m&aacute;y t&iacute;nh bảng đầu ti&ecirc;n tr&ecirc;n thế giới.</p>\r\n<p><br />\r\nDễ d&agrave;ng chuyển đổi chức năng giữa chế độ notebook v&agrave; m&aacute;y t&iacute;nh bảng bằng một thao t&aacute;c n&uacute;t bấm đơn giản.</p>\r\n<p><br />\r\nMỏng nhẹ đ&aacute;ng kinh ngạc v&agrave; si&ecirc;u di động</p>\r\n<p><br />\r\nB&uacute;t stylus t&ugrave;y chọn cho c&aacute;c t&aacute;c vụ đ&ograve;i hỏi sự ch&iacute;nh x&aacute;c v&agrave; ghi ch&uacute; viết tay.</p>', 'TAICHI21.jpg', 30500000, 'new', 0, 0),
(74609, 3, 'S200E', '<p>VIVOBOOK</p>\r\n<p>Windows 8 Hoặc những phi&ecirc;n bản c&oacute; sẵn kh&aacute;c<br />\r\nBộ vi xử l&yacute; Intel&reg; Core&trade; i3 3217U<br />\r\nM&agrave;n h&igrave;nh cảm ứng ch&iacute;nh x&aacute;c cho trải nghiệm trực quan<br />\r\nThiết kế mỏng nhẹ sang trọng v&agrave; phong c&aacute;ch<br />\r\nTận hưởng c&ocirc;ng nghệ SonicMaster cho trải nghiệm &acirc;m thanh sống động v&agrave; mạnh mẽ<br />\r\nCảm nhận sự mượt m&agrave; tự nhi&ecirc;n với b&agrave;n di chuột ASUS Smart Gesture v&agrave; chức năng khởi động lại trong v&ograve;ng 2 gi&acirc;y</p>', 'S200E.jpg', 16789000, 'hienthi', 0, 0),
(1, 9, 'YOGA 2 PRO', '<p>M&agrave;n h&igrave;nh: 13,3&quot; cảm ứng 10 điểm chạm, tấm nền IPS<br />\r\nĐộ ph&acirc;n giải tối đa: 3200 x 1800 pixels<br />\r\nCPU: Intel Haswell Core i7, 1.8Ghz<br />\r\nGPU: Intel HD Graphics 4400<br />\r\nRAM: 4GB, c&ocirc;ng nghệ DDR3L 1600MHz<br />\r\nSSD: 256GB<br />\r\nPin: tối đa c&oacute; thể đạt 9 giờ<br />\r\nHệ điều h&agrave;nh: Windows 8.1 64 bit<br />\r\nLật gập xoay t&ugrave;y chỉnh tối đa đến 360 độ<br />\r\nMỏng 15,5mm, nặng 1.39kg</p>', 'YOGA2PRO.jpg', 29490000, 'new', 0, 0),
(8, 9, 'LENOVO Z400', '<p>CPU: Core i5-3230M , 2.6Ghz<br />\r\nRAM: 4GB DDR3<br />\r\nỔ Cứng: 500GB 5400rpm<br />\r\nM&agrave;n h&igrave;nh: 14 inch HD LED<br />\r\nGPU: Intel HD Graphics<br />\r\nBảo h&agrave;nh: 12 th&aacute;ng</p>', 'LENOVOZ400.jpg', 11990000, 'new', 0, 0),
(66, 9, 'LENOVO S400', '<p>CPU: Core i3 - 2317U , 1.8 Ghz<br />\r\nRAM: 4GB DDR3 1600Mhz<br />\r\nHDD: 320GB Sata 5400rpm<br />\r\nM&agrave;n h&igrave;nh: 14.0 inch HD LED<br />\r\nGPU: Intel HD Graphics 4000<br />\r\nBảo h&agrave;nh: 12 th&aacute;ng</p>', 'LENOVOS400.jpg', 8790000, 'hienthi', 0, 0),
(121, 8, 'INSPIRON 15 N5537', '<p>CPU: Intel Haswell Core i5-4200U,1.6Ghz up to 2.6Ghz<br />\r\nRAM: 4GB DDR3 1600 Mhz<br />\r\nỔ Cứng: 750GB Sata 5400rpm<br />\r\nM&agrave;n h&igrave;nh: 15.6&quot; HD LED<br />\r\nGPU: AMD Raedon HD 8670M 2GB</p>', 'INSPIRON15N5537.jpg', 15390000, 'new', 0, 0),
(59, 8, 'DELL VOSTRO-V3560', '', 'DELLVOSTROV3560.jpg', 19699900, 'hienthi', 0, 0),
(573447, 1, 'RETINA ME664ZP/A', '', 'RETINAME664ZPA.jpg', 47990000, 'new', 0, 0),
(78713611, 1, 'MACBOOK PRO 13.3', '<p>Thiết kế đẳng cấp, unibody liền lạc nh&ocirc;m nguy&ecirc;n khối, si&ecirc;u mỏng, si&ecirc;u gọn, si&ecirc;u nhẹ.<br />\r\nChip Intel thế hệ hai, core i7 cực mạnh.<br />\r\nKết nối ThunderBolt si&ecirc;u nhanh.<br />\r\nTouchpad đa điểm tuyệt vời.<br />\r\nỔ cứng dung lượng lớn, 500GB tha hồ lưu trữ dữ liệu v&agrave; phim ảnh.<br />\r\nHệ điều h&agrave;nh Mac mượt, tương th&iacute;ch tối đa với phần cứng.<br />\r\nĐ&egrave;n LED nền b&agrave;n ph&iacute;m cực đẹp.<br />\r\nPin d&ugrave;ng rất l&acirc;u, thời gian d&ugrave;ng ở chế độ ti&ecirc;u chuẩn l&ecirc;n đến 8 giờ.</p>', 'MACBOOKPRO13.3.jpg', 33990000, 'new', 0, 0),
(92, 2, 'ACER ASPIRE V5', '<p>CPU: Core i5 - 3337U, 1.8Ghz upto 2.7Ghz<br />\r\nRAM: 4GB DDR3 1600Mhz<br />\r\nỔ Cứng: 500GB Sata 5400rpm<br />\r\nM&agrave;n h&igrave;nh: 14.0 inch<br />\r\nGPU: nVidia GeForce 710M 2GB</p>', 'ACERASPIREV5.jpg', 12090000, 'new', 0, 0),
(959, 2, 'ACER V533214G50', '', 'ACERV533214G50.jpg', 9990000, 'hienthi', 0, 0),
(70, 11, 'D-LINK DWM 156', '', 'USB3GDLINKDWM156.jpg', 590000, 'new', 0, 0),
(21, 11, 'Fast Connect MF190', '', 'FastConnectMF190.jpg', 690000, 'new', 0, 0),
(41, 11, 'D-COM 3G', '', 'DCOM3G.jpg', 530000, 'new', 0, 0),
(3, 10, 'KINGSTON 32G', '', 'KINGSTON32G.jpg', 550000, 'hienthi', 0, 0),
(6, 10, 'PNY LOVELY 8G', '', 'PNYLOVELY8G.jpg', 299000, 'new', 0, 0),
(77, 15, 'MICROLAB M119/2.1', '', 'MICROLABM1192.1.jpg', 789000, 'hienthi', 0, 0),
(4297, 15, 'SOUNDMAX A850', '<p><span style="color: rgb(102, 102, 102); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;">- Hệ thống loa: 2 + 1 loa si&ecirc;u trầm<span class="Apple-converted-space">&nbsp;</span></span><br style="color: rgb(102, 102, 102); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" />\r\n<span style="color: rgb(102, 102, 102); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;">- Chống nhiễm từ<span class="Apple-converted-space">&nbsp;</span></span><br style="color: rgb(102, 102, 102); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" />\r\n<span style="color: rgb(102, 102, 102); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;">- Tương th&iacute;ch: Laptop,PC,VCD<span class="Apple-converted-space">&nbsp;</span></span><br style="color: rgb(102, 102, 102); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" />\r\n<span style="color: rgb(102, 102, 102); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;">- Nguồn: 220-240V. Tổng c&ocirc;ng suất 25W<span class="Apple-converted-space">&nbsp;</span></span><br style="color: rgb(102, 102, 102); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);" />\r\n<span style="color: rgb(102, 102, 102); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;">- Điều chỉnh &acirc;m thanh Volume, Bass, Treble<span class="Apple-converted-space"> <br />\r\n</span></span></p>', 'SOUNDMAXA850.jpg', 640000, 'new', 0, 0),
(30, 13, 'LOGITECH M187', '', 'LOGITECHM187.jpg', 298000, 'hienthi', 0, 0),
(98, 13, 'Vtrack 800', '', 'Vtrack800.jpg', 235000, 'hienthi', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE IF NOT EXISTS `thanhvien` (
  `hoten` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dienthoai` int(20) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `hieuluc` int(10) NOT NULL,
  `capquyen` int(10) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`hoten`, `diachi`, `email`, `dienthoai`, `user`, `pass`, `hieuluc`, `capquyen`) VALUES
('Chí Tâm', 'G7 Trường Sơn', 'lechitam505@gmail.com', 969299346, 'chitam', '0da513e6b85115587ffcb84821a61a3b', 1, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

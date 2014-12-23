-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2014 at 12:29 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thu_vien`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bookid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `book_title` varchar(255) NOT NULL,
  `book_url` varchar(255) NOT NULL,
  `cost` int(11) DEFAULT '0',
  `book_img` varchar(255) NOT NULL,
  `author` varchar(150) DEFAULT NULL,
  `publisher` varchar(150) DEFAULT NULL,
  `book_date` int(10) unsigned DEFAULT NULL,
  `book_public` char(1) NOT NULL,
  `cateid` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `total_rate` int(10) unsigned DEFAULT '0',
  `views_rate` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `book_title`, `book_url`, `cost`, `book_img`, `author`, `publisher`, `book_date`, `book_public`, `cateid`, `userid`, `total_rate`, `views_rate`) VALUES
(36, 'truyện cười song ngữ Anh-Việt', 'truyen-cuoi-song-ngu-anhviet.pdf', 0, 'default.jpg', 'haha', 'bbb', 2012, 'Y', 2, 2, 0, 0),
(44, 'Advanced Java Networking', 'advanced-java-networking.pdf', 0, 'advanced-java-networking.jpg', '', '', 0, 'Y', 1, 2, 0, 0),
(45, 'Bí mật trị vì vương quốc đến quản lý công ty', 'bi-mat-tri-vi-vuong-quoc-den-quan-ly-cong-ty.pdf', 2, 'bi-mat-tri-vi-vuong-quoc-den-quan-ly-cong-ty.jpg', 'Seldon Bowles', 'NXB Tổng hợp TP.HCM', 2011, 'Y', 5, 2, 0, 0),
(46, 'Câu chuyện nhà quản lý cà rốt và nghệ thuật khen thưởng', 'cau-chuyen-nha-quan-ly-ca-rot-va-nghe-thuat-khen-thuong.pdf', 3, 'cau-chuyen-nha-quan-ly-ca-rot-va-nghe-thuat-khen-thuong.jpg', 'Adrian Gostick & Chester Elton', 'NXB trẻ', 2011, 'Y', 5, 2, 0, 0),
(47, 'PHP căn bản', 'php-can-ban.pdf', 0, 'php-can-ban.jpg', 'Phạm Hữu Khang', 'www.huukhang.com', 2008, 'Y', 1, 2, 0, 0),
(48, 'Facebook Application Development for Dummies', 'facebook-application-development-for-dummies.pdf', 3, 'facebook-application-development-for-dummies.jpg', 'Stay, Jesse', 'www.it-book.info', 2013, 'Y', 1, 2, 0, 0),
(49, 'Lĩnh vực chứng khoán', 'linh-vuc-chung-khoan.pdf', 1, 'linh-vuc-chung-khoan.jpg', '', 'NXB Kim Đồng', 2011, 'Y', 5, 2, 0, 0),
(50, 'Giáo trình Photoshop CS8', 'giao-trinh-photoshop-cs8.pdf', 0, 'giao-trinh-photoshop-cs8.jpg', 'Lưu Hoàng Lý', '', 2011, 'Y', 1, 2, 0, 0),
(51, 'Giáo trình SQL', 'giao-trinh-sql.pdf', 0, 'giao-trinh-sql.jpg', '', '', 0, 'Y', 1, 2, 8, 1),
(52, 'Nghệ thuật săn việc 2.0', 'nghe-thuat-san-viec-20.pdf', 3, 'nghe-thuat-san-viec-20.jpg', 'Jay Conrad Levinson & David E.Perry', 'NXB Trẻ', 2012, 'Y', 3, 2, 0, 0),
(53, 'Phỏng vấn không hề đáng sợ', 'phong-van-khong-he-dang-so.pdf', 2, 'phong-van-khong-he-dang-so.jpg', 'Marky Stein', 'INNMA', 2012, 'Y', 3, 2, 0, 0),
(54, '101 thủ thuật SEO', '101-thu-thuat-seo.pdf', 0, '101-thu-thuat-seo.jpg', 'Tĩnh Trần', '', 2010, 'Y', 1, 2, 0, 0),
(55, 'Sự thật về 100 thất bại thương hiệu', 'su-that-ve-100-that-bai-thuong-hieu.pdf', 3, 'su-that-ve-100-that-bai-thuong-hieu.jpg', ' Matt Haig', 'NXB Tổng hợp TP.HCM', 2011, 'Y', 5, 2, 16, 1),
(56, 'Thinking in Java, 3rd Edition', 'thinking-in-java-3rd-edition.pdf', 0, 'thinking-in-java-3rd-edition.jpg', 'Bruce Eckel', '', 2013, 'Y', 1, 2, 0, 0),
(57, 'Tôi tài giỏi, bạn cũng thế', 'toi-tai-gioi-ban-cung-the.pdf', 0, 'toi-tai-gioi-ban-cung-the.jpg', 'Adam Khoo', 'NXB Phụ Nữ', 2010, 'Y', 3, 2, 20, 1),
(58, 'Đánh cắp ý tưởng', 'danh-cap-y-tuong.pdf', 3, 'danh-cap-y-tuong.jpg', 'Steve Cone', 'NXB Trẻ', 2011, 'Y', 5, 2, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cateid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_title` varchar(150) NOT NULL,
  PRIMARY KEY (`cateid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cateid`, `cate_title`) VALUES
(1, 'Công Nghệ Thông Tin'),
(2, 'Truyện cười'),
(3, 'Kĩ năng mềm'),
(4, 'Pháp luật'),
(5, 'Kinh Doanh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` char(32) NOT NULL,
  `level` int(1) unsigned DEFAULT '3',
  `info` text,
  `bookcase` text,
  `property` int(11) DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `level`, `info`, `bookcase`, `property`) VALUES
(1, 'test123', '827ccb0eea8a706c4c34a16891f84e7b', 3, NULL, '', 5),
(2, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, '[{"id":"51","date":1408309205}]', 11),
(3, 'tam123', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, '', 0),
(5, 'hethon', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, NULL, 0),
(6, 'kenny', '827ccb0eea8a706c4c34a16891f84e7b', 2, '', '', 0),
(7, '1ngoisao', '827ccb0eea8a706c4c34a16891f84e7b', 3, NULL, NULL, 0),
(9, '3ngoisao', '827ccb0eea8a706c4c34a16891f84e7b', 3, '{"name":"Nguyu1ec5n Duy Tu00e2m","birthday":"07/06/1991","email":"tam.pro76@gmail.com","phone":"01228121763","id":"024418622"}', NULL, 0),
(10, '2ngoisao', '827ccb0eea8a706c4c34a16891f84e7b', 3, '', NULL, 0),
(11, '4ngoisao', '827ccb0eea8a706c4c34a16891f84e7b', 3, '{"name":"Nguyễn Duy Tâm"}', NULL, 0),
(12, '5ngoisao', '827ccb0eea8a706c4c34a16891f84e7b', 3, '', NULL, 0),
(13, '6ngoisao', '827ccb0eea8a706c4c34a16891f84e7b', 3, '', NULL, 0),
(14, '7ngoisao', '827ccb0eea8a706c4c34a16891f84e7b', 3, '', NULL, 0),
(15, '8ngoisao', '827ccb0eea8a706c4c34a16891f84e7b', 3, '', NULL, 0),
(16, '9ngoisao', '827ccb0eea8a706c4c34a16891f84e7b', 3, '', NULL, 0),
(17, '1check', '827ccb0eea8a706c4c34a16891f84e7b', 1, '{"name":"Nguyễn Duy Tâm","gt":"1","birthday":"17/08/2014","email":"tam.pro76@gmail.com"}', NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

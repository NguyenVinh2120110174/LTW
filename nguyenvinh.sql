-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 12:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nguyenlecanhtien_ltw`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`) VALUES
(3, 'Thời trang nam', '0000-00-00 00:00:00'),
(4, 'Thời trang nữ', '0000-00-00 00:00:00'),
(5, 'Phụ kiện', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_id` varchar(50) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `is_on_sale` tinyint(1) DEFAULT 0,
  `sale_price` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `cat_id`, `image`, `price`, `description`, `is_on_sale`, `sale_price`, `created_at`, `views`) VALUES
(1, 'Sản phẩm 5', '3', 'mp.jpg', 3, '<p>The cat was playing in the garden.</p>\n\n<p>update</p>\n\n<p>fasdfadklasdlfdsf;asdf</p>\n\n<p>dfasldkfa;lsdf<img alt=\"\" src=\"http://localhost:8080/mvc_test/public/images/frontend/cupcake01.jpg\" style=\"float:left; height:133px; width:200px\" /></p>\n', NULL, NULL, '0000-00-00 00:00:00', 2),
(3, 'Sản phẩm 1', '3', 'mp1.jpg', 300000, '<p>The cat was playing innbkjjk', 1, 200000, NULL, 11),
(5, 'QUẦN TÂY NAM 5', '3', 'QTNAM5.jpg', 1, '<p>banh bao thit trung</p>\r\n', 0, NULL, '0000-00-00 00:00:00', 100),
(6, 'QUẦN TÂY NAM 6', '3', 'QTNAM6.jpg', 3, '<p>banh cuon</p>\r\n', 0, NULL, NULL, 0),
(7, 'QUẦN TÂY NAM 7', '3', 'QTNAM7.jpg', 1, 'fasfasdf', NULL, NULL, '0000-00-00 00:00:00', 0),
(8, 'QUAN JEAN NAM 1', '3', 'JNAM1.jpg', 2, '<p>dsdad</p>\r\n', NULL, NULL, NULL, 0),
(9, 'QUẦN JEAN NAM 2', '3', 'JNAM2.jpg', 2, 'gsdfght', NULL, NULL, NULL, 0),
(10, 'QUẦN JEAN NAM 3', '3', 'JNAM3.jpg', 3, 'dfgdfasdfasdf', NULL, NULL, NULL, 0),
(11, 'QUẦN JEAN NAM 4', '3', 'JNAM4.jpg', 3, 'gsdtsdfgsdfgdfgdfsfg', NULL, NULL, NULL, 4),
(12, 'QUẦN JEAN NAM 5', '3', 'JNAM5.jpg', 1, 'sdfsgjf', NULL, NULL, '0000-00-00 00:00:00', 1),
(13, 'QUẦN JEAN NAM 6', '3', 'JNAM6.png', 3, '<p>fdgdfgsdggsdrgtear</p>\r\n', NULL, NULL, NULL, 0),
(14, 'Sản phẩm 2', '3', 'mp2.jpg', 310000, '<p>sdfasdfaswerwes</p>\r\n', 1, 250000, NULL, 0),
(15, 'Sản phẩm 3', '3', 'mp3.jpg', 50000, '<p>fasdasdfsdfasfas</p>\r\n', 1, 30000, NULL, 1),
(16, 'Sản phẩm 4', '3', 'mp4.jpg', 40000, '<p>dfgsdfgsd</p>\r\n', 1, 30000, NULL, 0),
(17, 'SOMINAM4', '3', 'SOMINAM4.JPG', 4, '<p>dsdfasdf</p>\r\n', NULL, NULL, NULL, 10),
(18, 'SOMINAM5', '3', 'SOMINAM5.JPG', 4, 'KJFAJSFLAKSJDFLKAJDSKA', 0, NULL, NULL, 0),
(19, 'THUNNAM1', '3', 'THUNNAM1.JPG', 5, '', NULL, NULL, NULL, 0),
(20, 'THUNNAM2', '3', 'THUNNAM2.JPG', 3, '', NULL, NULL, NULL, 0),
(21, 'THUNNAM3', '3', 'THUNNAM3.JPG', 7, '', NULL, NULL, NULL, 0),
(22, 'THUNNAM4', '3', 'THUNNAM4.PNG', 5, '', NULL, NULL, NULL, 100),
(23, 'THUNNAM5', '3', 'THUNNAM5.JPG', 4, '', NULL, NULL, NULL, 0),
(24, 'THUNNAM6', '3', 'THUNNAM6.JPG', 7, '', NULL, NULL, NULL, 0),
(25, 'QUẦN TÂY NỮ 1', '4', 'QTNU1.JPG', 6, '', NULL, NULL, NULL, 0),
(26, 'QUẦN TÂY NỮ 2', '4', 'QTNU2.JPG', 4, '', NULL, NULL, NULL, 0),
(27, 'QUẦN TÂY NỮ 3', '4', 'QTNU3.JPG', 6, '', NULL, NULL, NULL, 0),
(29, 'QUẦN TÂY NỮ 5', '4', 'QTNU5.JPG', 4, '', NULL, NULL, NULL, 0),
(30, 'QUẦN TÂY NỮ 6', '4', 'QTNU6.JPG', 8, '', NULL, NULL, NULL, 0),
(31, 'JEAN NỮ 1', '4', 'JNU1.JPG', 4, '', NULL, NULL, NULL, 0),
(32, 'JEAN NỮ 2', '4', 'JNU2.JPG', 6, '', NULL, NULL, NULL, 0),
(33, 'JEAN NỮ 3', '4', 'JNU3.JPG', 7, '', NULL, NULL, NULL, 0),
(34, 'JEAN NỮ 4', '4', 'JNU4.JPG', 5, '', NULL, NULL, NULL, 0),
(35, 'QUẦN JEAN NỮ 5', '4', 'JNU5.JPG', 9, '', NULL, NULL, NULL, 1),
(36, 'QUẦN JEAN NỮ 6', '4', 'JNU6.JPG', 8, '', NULL, NULL, NULL, 0),
(37, 'ÁO SƠ MI NỮ 1', '4', 'SNU1.JPG', 6, '', NULL, NULL, NULL, 0),
(38, 'ÁO SƠ MI NỮ 2', '4', 'SNU2.JPG', 5, '', NULL, NULL, NULL, 1),
(39, 'ÁO SƠ MI NỮ 3', '4', 'SNU3.JPG', 3, '', NULL, NULL, NULL, 0),
(40, 'ÁO SƠ MI NỮ 4', '4', 'SNU4.JPG', 6, '', NULL, NULL, NULL, 0),
(41, 'ÁO SƠ MI NỮ 5', '4', 'SNU5.JPG', 5, '', NULL, NULL, NULL, 0),
(42, 'ÁO SƠ MI NỮ 6', '4', 'SNU6.JPG', 4, '', NULL, NULL, NULL, 0),
(43, 'ÁO THUN NỮ 1', '4', 'TNU1.JPG', 9, '', NULL, NULL, NULL, 0),
(44, 'ÁO THUN NỮ 2', '4', 'TNU2.JPG', 7, '', NULL, NULL, NULL, 0),
(45, 'ÁO THUN NỮ 3', '4', 'TNU3.JPG', 3, '', NULL, NULL, NULL, 0),
(46, 'ÁO THUN NỮ 4', '4', 'TNU4.JPG', 9, '', NULL, NULL, NULL, 0),
(47, 'ÁO THUN NỮ 5', '4', 'TNU5.JPG', 23, '', NULL, NULL, NULL, 0),
(48, 'ÁO THUN NỮ 6', '4', 'TNU6.JPG', 32, '', NULL, NULL, NULL, 0),
(49, 'ĐẦM NGẮN 1', '4', 'DN1.JPG', 35, '', NULL, NULL, NULL, 0),
(50, 'ĐẦM NGẮN 2', '4', 'DN2.JPG', 23, '', NULL, NULL, NULL, 3),
(51, 'ĐẦM NGẮN 3', '4', 'DN3.JPG', 12, '', NULL, NULL, NULL, 0),
(52, 'ĐẦM NGẮN 4', '4', 'DN4.JPG', 34, '', NULL, NULL, NULL, 0),
(53, 'ĐẦM NGẮN 5', '4', 'DN5.JPG', 33, '', NULL, NULL, NULL, 0),
(54, 'ĐẦM NGẮN 6', '4', 'DN6.JPG', 21, '', NULL, NULL, NULL, 0),
(55, 'ĐẦM MAXI 1', '4', 'DM1.jpg', 13, '', 0, NULL, NULL, 1),
(56, 'ĐẦM MAXI 2', '4', 'DM2.JPG', 350000, 'MAXI TÔN DÁNG, GỌN EO - HOT TREND MÙA DU LỊCH', NULL, NULL, NULL, 0),
(57, 'ĐẦM MAXI 3', '4', 'DM3.JPG', 54, '', NULL, NULL, NULL, 0),
(58, 'ĐẦM MAXI 4', '4', 'DM4.JPG', 37, '', NULL, NULL, NULL, 0),
(59, 'ĐẦM MAXI 5', '4', 'DM5.JPG', 25, '', NULL, NULL, NULL, 0),
(60, 'TÚI XÁCH 1', '5', 'T1.JPG', 32, '', NULL, NULL, NULL, 1),
(61, 'TÚI XÁCH 2', '5', 'T2.JPG', 9, '', NULL, NULL, NULL, 0),
(62, 'TÚI XÁCH 3', '5', 'T3.JPG', 7, '', NULL, NULL, NULL, 0),
(63, 'GIÀY 1', '5', 'G1.JPG', 21, '', NULL, NULL, NULL, 0),
(64, 'GIÀY 2', '5', 'G2.JPG', 24, '', NULL, NULL, NULL, 0),
(65, 'GIAY 3', '5', 'G3.JPG', 8, '', NULL, NULL, NULL, 0),
(66, 'MẮT KÍNH 1', '5', 'K1.JPG', 43, '', NULL, NULL, NULL, 0),
(67, 'MẮT KÍNH 2', '5', 'K2.JPG', 27, '', NULL, NULL, NULL, 0),
(68, 'MẮT KÍNH 322', '5', 'K3.JPG', 32, '', 0, NULL, NULL, 0),
(71, 'ĐẦM NGẮN 7', '4', 'DN5.jpg', 34, '<p>DFASD</p>\r\n\r\n<p>SDJFAKSDJFA</p>\r\n\r\n<p>SDFASKJDFKASDF</p>\r\n', 0, NULL, '2017-11-21 09:59:17', 1),
(72, 'ĐẦM NGẰN 8', '4', 'DN2.jpg', 423, '<p>&Aacute;DFASDFSDFA</p>\r\n', 0, NULL, '2017-11-21 09:59:56', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `role` varchar(50) DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `phone`, `address`, `gender`, `avatar`, `birth`, `role`, `created_at`) VALUES
(59, 'tienbadao1908', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'NGUYỄN LÊ CẢNH TIÊN', 'nguyenlecanhtiendz@gmail.com', '0976412540', 'Phú Yên', 1, 'CV_NGUYENLECANHTIEN2.pdf', '2002-06-12', 'user', '2023-10-14 15:08:59'),
(80, 'Programmer', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'canh tien', 'nguyenlecanhtien120602.work@gmail.com', '15646456465', 'hcm', 1, 'cam.jpg', '2002-06-13', 'user', '2023-10-14 19:20:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

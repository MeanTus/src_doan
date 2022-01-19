-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 04:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcuahang`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_tittle` varchar(50) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `blog_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_img`
--

CREATE TABLE `blog_img` (
  `id_img` int(11) NOT NULL,
  `src_img` varchar(100) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `img_alt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Điện thoại'),
(2, 'Tivi'),
(3, 'Laptop'),
(4, 'Phụ kiện'),
(10, 'Camera');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `manufacturer_name`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'Xiaomi'),
(4, 'Anker');

-- --------------------------------------------------------

--
-- Table structure for table `my_order`
--

CREATE TABLE `my_order` (
  `order_id` int(11) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` char(20) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT current_timestamp(),
  `totalPrice` double NOT NULL,
  `payment_methods` tinyint(1) NOT NULL,
  `order_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_order`
--

INSERT INTO `my_order` (`order_id`, `receiver`, `address`, `phone_number`, `createAt`, `totalPrice`, `payment_methods`, `order_status`, `user_id`) VALUES
(5, 'Nguyễn Minh Tú', '33 Cách Mạng, phường Tân Thành, quận Tân Phú', '0834333860', '2021-12-28 09:48:57', 112000000, 1, 3, 1),
(6, 'Ngân', '123 Cao Lỗ', '9348903284023', '2021-12-30 12:27:27', 120000000, 1, 3, 1),
(7, 'Ngân', '180 Cao Lỗ phường 4 Quận 8', '0834333860', '2022-01-02 08:15:42', 70000000, 1, 1, 1),
(8, 'Phạm Văn Mạnh', '180 Cao Lỗ phường 4 Quận 8', '01234333769', '2022-01-02 12:20:37', 100000000, 1, 3, 1),
(9, 'Lâm', '180 Cao Lỗ phường 4 Quận 8', '12349897', '2022-01-09 14:47:07', 50000000, 1, 1, 1),
(10, 'Abe', '180 Cao Lỗ phường 4 Quận 8', '87878090', '2022-01-14 14:35:30', 22000000, 1, 1, 1),
(11, 'Ngân', '33 Cách Mạng, phường Tân Thành, quận Tân Phú', '0834333860', '2022-01-14 14:38:44', 100000000, 1, 1, 1),
(12, 'Mạnh', '123 TRường Chinh', '12345609', '2022-01-15 18:41:08', 10050000, 1, 3, 1),
(13, 'Lâm', '180 Cao Lỗ phường 4 Quận 8', '0834333850', '2022-01-16 13:49:21', 15300000, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `current_price` double NOT NULL,
  `quality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `current_price`, `quality`) VALUES
(1, 5, 2, 100000000, 2),
(2, 5, 6, 12000000, 1),
(3, 6, 1, 20000000, 2),
(4, 6, 2, 100000000, 2),
(5, 7, 1, 20000000, 2),
(6, 7, 2, 50000000, 1),
(7, 8, 2, 100000000, 2),
(8, 9, 2, 50000000, 1),
(9, 10, 1, 10000000, 1),
(10, 10, 6, 12000000, 1),
(11, 11, 2, 100000000, 2),
(12, 12, 1, 10000000, 1),
(13, 12, 3, 50000, 1),
(14, 13, 9, 15000000, 1),
(15, 13, 8, 300000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `price_current` double NOT NULL,
  `img` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `price_sale` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `price_current`, `img`, `amount`, `price_sale`, `category_id`, `manufacturer_id`) VALUES
(1, 'Iphone 13', 'Iphone 13 đẹp lắm', 10000000, './assets/img/product/iphone_13.jpg', 7, 0, 1, 2),
(2, 'Dell xps 13', 'laptop đẹp', 50, './assets/img/product/dell-xps-13.jpg', 0, 3, 1, 1),
(3, 'Ốp lưng', 'model ốp lưng', 50000, './assets/img/product/op_lung.jpg', 3, 0, 4, 1),
(6, 'Ipad', 'Ipad moi nhat cua apple', 12000000, './assets/img/product/ipad.jpg', 5, 0, 1, 1),
(7, 'Apple Watch', 'dep lam', 5000000, './assets/img/product/apple_watch.jpg', 7, 0, 4, 2),
(8, 'Tai nghe', 'amm thanh tốt', 300000, './assets/img/product/tai_nghe.jpg', 11, 0, 4, 3),
(9, 'Iphone X', 'đẹp lắm', 15000000, './assets/img/product/iphoneX.jpg', 5, 0, 1, 2),
(10, 'Loa', 'nghe phê lắm', 500000, './assets/img/product/loa.jpg', 9, 0, 4, 3),
(11, 'Màn hình 24 inch', 'Đẹp lắm', 2500000, './assets/img/product/man_hinh.jpg', 7, 0, 2, 1),
(12, 'Iphone 12', 'đẹp lắm', 15000000, './assets/img/product/iphone-12.jpg', 5, 0, 1, 2),
(18, 'AirPods Pro', 'Phụ kiện bán chạy của Apple', 5000000, './assets/img/product/airpods.jpg', 10, 0, 4, 2),
(19, 'Apple Watch S6 LTE', 'Apple Watch đẹp', 12000000, './assets/img/product/apple-watch-s6.jpg', 8, 0, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `sex` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `otp` varchar(50) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `createdat`, `sex`, `role`, `otp`, `user_status`) VALUES
(1, 'Tú', 'tu@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-04 17:11:18', 1, 1, '', 0),
(2, 'Phúc', 'phuc@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-04 17:11:18', 1, 1, '', 0),
(3, 'Mạnh', 'manh@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-04 17:11:56', 1, 0, '', 1),
(4, 'Vy', 'vy@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-04 17:11:56', 0, 0, '', 0),
(10, 'Nguyễn Minh Tú', 'tuminh@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-12-27 12:33:37', 1, 0, '', 1),
(11, 'Khanh', 'khanh@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2022-01-08 18:08:37', 0, 0, '', 0),
(12, 'manh', 'phammanh2508@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2022-01-09 10:41:41', 1, 0, 'DsRCg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_img`
--
ALTER TABLE `blog_img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `img_blog` (`id_blog`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `my_order`
--
ALTER TABLE `my_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_user` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetail_product` (`product_id`),
  ADD KEY `orderdetail_order` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category` (`category_id`),
  ADD KEY `product_manufacturer` (`manufacturer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_img`
--
ALTER TABLE `blog_img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `my_order`
--
ALTER TABLE `my_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_img`
--
ALTER TABLE `blog_img`
  ADD CONSTRAINT `img_blog` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`blog_id`);

--
-- Constraints for table `my_order`
--
ALTER TABLE `my_order`
  ADD CONSTRAINT `order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `orderdetail_order` FOREIGN KEY (`order_id`) REFERENCES `my_order` (`order_id`),
  ADD CONSTRAINT `orderdetail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_manufacturer` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

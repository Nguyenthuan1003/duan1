-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 22, 2022 lúc 05:30 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1team4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_cate` int(10) NOT NULL COMMENT 'mã danh mục',
  `cate_name` varchar(100) NOT NULL COMMENT 'tên danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_cate`, `cate_name`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(3, 'Oppo'),
(4, 'Xiaomi'),
(5, 'Vivo'),
(6, 'Realme');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cate_contact`
--

CREATE TABLE `cate_contact` (
  `id_cate_contact` int(10) NOT NULL,
  `id_web_setting` int(11) NOT NULL,
  `cate_contact_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(10) NOT NULL,
  `id_pro` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `created_date_comment` varchar(20) NOT NULL,
  `description_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `e-vorcher`
--

CREATE TABLE `e-vorcher` (
  `id_vorcher` int(10) NOT NULL,
  `name_vorcher` varchar(100) NOT NULL,
  `quantity_limit` int(20) NOT NULL,
  `expiration_date` varchar(20) NOT NULL,
  `id_pro` int(10) NOT NULL,
  `coupon_value` int(10) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_products_attribute`
--

CREATE TABLE `images_products_attribute` (
  `id_pro` int(10) NOT NULL,
  `id_variant` int(10) NOT NULL,
  `images_pro_attri` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_news`
--

CREATE TABLE `img_news` (
  `id_news` int(11) NOT NULL,
  `img_news` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_contact`
--

CREATE TABLE `info_contact` (
  `id_info_contact` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `id_cate_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` int(10) NOT NULL,
  `title_news` varchar(2000) NOT NULL,
  `description_news` varchar(10000) NOT NULL,
  `thumnails` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_news`, `title_news`, `description_news`, `thumnails`) VALUES
(1, 'Bánh bèo chính hiệu\' không thể bỏ qua bộ hình nền iPhone siêu cute dưới đây! Rinh ngay một tấm hình về thôi nào', '', 'post1.png'),
(2, 'Tháng 7 deal ngon hết sảy: iPhone SE giảm đậm đến 2 triệu đồng và đi kèm nhiều ưu đãi HOT, quá là đáng sắm luôn', '', 'post2.png'),
(3, 'Cách phát hiện ứng dụng theo dõi trên iPhone hay ho giúp việc bảo mật thông tin cá nhân an toàn, bạn đã biết chưa?', '', 'post3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id_order` int(10) NOT NULL,
  `name_order` varchar(50) NOT NULL,
  `address_order` varchar(100) NOT NULL,
  `created_date_order` varchar(20) NOT NULL,
  `status_order` bit(1) NOT NULL,
  `total_price` int(20) NOT NULL,
  `sdt` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id_order` int(10) NOT NULL,
  `id_pro` int(10) NOT NULL,
  `quantity_order` int(20) NOT NULL,
  `price_order` int(20) NOT NULL,
  `unit_price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_pro` int(10) NOT NULL COMMENT 'mã sản phẩm',
  `pro_name` varchar(50) NOT NULL COMMENT 'tên sản phẩm',
  `created_date` varchar(20) NOT NULL COMMENT 'Ngày nhập',
  `description` text NOT NULL COMMENT 'Mô tả sản phẩm',
  `status` bit(1) NOT NULL COMMENT 'Trạng thái 1 là true 0 là false',
  `id_cate` int(10) NOT NULL,
  `price_default` float NOT NULL,
  `images_default` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_pro`, `pro_name`, `created_date`, `description`, `status`, `id_cate`, `price_default`, `images_default`) VALUES
(1, 'Iphone 13 promax Gold', '15/7/2022', 'Iphone 13 promax Gold', b'0', 1, 15000000, 'shopping (1).png'),
(2, 'Iphone 13 promax Gold', '15/7/2022', 'Iphone 13 promax Gold', b'0', 1, 15000000, 'shopping (2).png'),
(3, 'Iphone 13 promax Gold', '15/7/2022', 'Iphone 13 promax Gold', b'0', 1, 15000000, 'shopping (3).png'),
(4, 'Iphone 13 promax Gold', '15/7/2022', 'Iphone 13 promax Gold', b'0', 1, 15000000, 'shopping (4).png'),
(5, 'Iphone 13 promax Gold', '15/7/2022', 'Iphone 13 promax Gold', b'0', 1, 15000000, 'shopping (5).png'),
(6, 'Iphone 13 promax Gold', '15/7/2022', 'Iphone 13 promax Gold', b'0', 1, 15000000, 'shopping (6).png'),
(7, 'Iphone 13 promax Gold', '15/7/2022', 'Iphone 13 promax Gold', b'0', 1, 15000000, 'shopping (7).png'),
(8, 'Iphone 13 promax Gold', '15/7/2022', 'Iphone 13 promax Gold', b'0', 1, 15000000, 'shopping (8).png'),
(9, 'Iphone 13 promax Gold', '15/7/2022', 'Iphone 13 promax Gold', b'0', 1, 15000000, 'shopping (9).png'),
(10, 'Iphone 13 promax Gold', '15/7/2022', 'Iphone 13 promax Gold', b'0', 1, 15000000, 'shopping.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_attribute`
--

CREATE TABLE `products_attribute` (
  `id_pro` int(10) NOT NULL,
  `id_variant` int(10) NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` float NOT NULL,
  `sale` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `accont_balance` int(20) NOT NULL,
  `role` bit(1) NOT NULL,
  `created_date_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant`
--

CREATE TABLE `variant` (
  `id_variant` int(10) NOT NULL,
  `name_variant` varchar(50) NOT NULL,
  `id_pro` int(10) NOT NULL,
  `images_variant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `websetting`
--

CREATE TABLE `websetting` (
  `id` int(10) NOT NULL,
  `site_title` varchar(50) NOT NULL COMMENT 'Tên website',
  `logo` varchar(250) NOT NULL COMMENT 'logo website'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cate`);

--
-- Chỉ mục cho bảng `cate_contact`
--
ALTER TABLE `cate_contact`
  ADD PRIMARY KEY (`id_cate_contact`),
  ADD KEY `foreg_key` (`id_web_setting`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `lk_comment_pro` (`id_pro`),
  ADD KEY `lk_comment_user` (`id_user`);

--
-- Chỉ mục cho bảng `e-vorcher`
--
ALTER TABLE `e-vorcher`
  ADD PRIMARY KEY (`id_vorcher`),
  ADD KEY `lk_vorcher_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `images_products_attribute`
--
ALTER TABLE `images_products_attribute`
  ADD PRIMARY KEY (`id_pro`,`id_variant`),
  ADD KEY `lk_img_attri` (`id_variant`);

--
-- Chỉ mục cho bảng `img_news`
--
ALTER TABLE `img_news`
  ADD PRIMARY KEY (`id_news`,`img_news`),
  ADD KEY `foreg_key` (`img_news`,`id_news`);

--
-- Chỉ mục cho bảng `info_contact`
--
ALTER TABLE `info_contact`
  ADD PRIMARY KEY (`id_info_contact`),
  ADD UNIQUE KEY `foreg_key` (`id_cate_contact`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `lk_orders_datail_pro` (`id_pro`),
  ADD KEY `lk_order_datail_orders` (`id_order`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `lk_cate_pro` (`id_cate`);

--
-- Chỉ mục cho bảng `products_attribute`
--
ALTER TABLE `products_attribute`
  ADD PRIMARY KEY (`id_pro`,`id_variant`),
  ADD KEY `lk_attri_pro_attri` (`id_variant`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`id_variant`),
  ADD KEY `lk_variant_attri` (`id_pro`);

--
-- Chỉ mục cho bảng `websetting`
--
ALTER TABLE `websetting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cate` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã danh mục', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `cate_contact`
--
ALTER TABLE `cate_contact`
  MODIFY `id_cate_contact` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `e-vorcher`
--
ALTER TABLE `e-vorcher`
  MODIFY `id_vorcher` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `info_contact`
--
ALTER TABLE `info_contact`
  MODIFY `id_info_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_pro` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã sản phẩm', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `variant`
--
ALTER TABLE `variant`
  MODIFY `id_variant` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `websetting`
--
ALTER TABLE `websetting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cate_contact`
--
ALTER TABLE `cate_contact`
  ADD CONSTRAINT `cate_contact_ibfk_1` FOREIGN KEY (`id_web_setting`) REFERENCES `websetting` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cate_contact_ibfk_2` FOREIGN KEY (`id_web_setting`) REFERENCES `websetting` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `lk_comment_pro` FOREIGN KEY (`id_pro`) REFERENCES `products` (`id_pro`),
  ADD CONSTRAINT `lk_comment_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `e-vorcher`
--
ALTER TABLE `e-vorcher`
  ADD CONSTRAINT `lk_vorcher_pro` FOREIGN KEY (`id_pro`) REFERENCES `products` (`id_pro`);

--
-- Các ràng buộc cho bảng `images_products_attribute`
--
ALTER TABLE `images_products_attribute`
  ADD CONSTRAINT `lk_img_attri` FOREIGN KEY (`id_variant`) REFERENCES `variant` (`id_variant`),
  ADD CONSTRAINT `lk_img_pro` FOREIGN KEY (`id_pro`) REFERENCES `products` (`id_pro`);

--
-- Các ràng buộc cho bảng `img_news`
--
ALTER TABLE `img_news`
  ADD CONSTRAINT `img_news_ibfk_1` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`);

--
-- Các ràng buộc cho bảng `info_contact`
--
ALTER TABLE `info_contact`
  ADD CONSTRAINT `info_contact_ibfk_1` FOREIGN KEY (`id_cate_contact`) REFERENCES `cate_contact` (`id_cate_contact`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `lk_order_datail_orders` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `lk_orders_datail_pro` FOREIGN KEY (`id_pro`) REFERENCES `products` (`id_pro`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `lk_cate_pro` FOREIGN KEY (`id_cate`) REFERENCES `categories` (`id_cate`);

--
-- Các ràng buộc cho bảng `products_attribute`
--
ALTER TABLE `products_attribute`
  ADD CONSTRAINT `lk_attri_pro_attri` FOREIGN KEY (`id_variant`) REFERENCES `variant` (`id_variant`),
  ADD CONSTRAINT `lk_pro_pro_attri` FOREIGN KEY (`id_pro`) REFERENCES `products` (`id_pro`);

--
-- Các ràng buộc cho bảng `websetting`
--
ALTER TABLE `websetting`
  ADD CONSTRAINT `websetting_ibfk_1` FOREIGN KEY (`id`) REFERENCES `cate_contact` (`id_web_setting`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

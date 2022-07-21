-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 21, 2022 lúc 03:56 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

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
(2, 'SamSung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cate_contact`
--

CREATE TABLE `cate_contact` (
  `id_cate_contact` int(10) NOT NULL,
  `cata_contact_name` varchar(50) NOT NULL,
  `id_websetting` int(10) NOT NULL
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
  `status_vorcher` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `rate_feedback` varchar(255) NOT NULL,
  `image_feedback` varchar(255) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `content_feedback` text NOT NULL
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
-- Cấu trúc bảng cho bảng `image_news`
--

CREATE TABLE `image_news` (
  `id_news` int(10) NOT NULL,
  `image_new` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_contact`
--

CREATE TABLE `info_contact` (
  `id_info_contact` int(10) NOT NULL,
  `id_cate_contact` int(10) NOT NULL,
  `description_info_contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` int(10) NOT NULL,
  `title_new` varchar(255) NOT NULL,
  `description_news` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_user` int(10) NOT NULL,
  `full_name` varchar(50) NOT NULL
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
  `unit_price` varchar(10) NOT NULL,
  `name_vorcher` varchar(50) NOT NULL
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
  `created_date_user` varchar(20) NOT NULL,
  `image_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant`
--

CREATE TABLE `variant` (
  `id_variant` int(10) NOT NULL,
  `name_variant` varchar(50) NOT NULL,
  `images_variant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `websetting`
--

CREATE TABLE `websetting` (
  `id_websetting` int(10) NOT NULL,
  `site_title` varchar(50) NOT NULL COMMENT 'Tên website',
  `logo` varchar(250) NOT NULL COMMENT 'logo website'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(10) NOT NULL,
  `id_pro` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
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
  ADD KEY `lk_webseting_contact` (`id_websetting`);

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
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `lk_feedback_order` (`id_order`);

--
-- Chỉ mục cho bảng `images_products_attribute`
--
ALTER TABLE `images_products_attribute`
  ADD PRIMARY KEY (`id_pro`,`id_variant`),
  ADD KEY `lk_img_attri` (`id_variant`);

--
-- Chỉ mục cho bảng `image_news`
--
ALTER TABLE `image_news`
  ADD PRIMARY KEY (`id_news`,`image_new`);

--
-- Chỉ mục cho bảng `info_contact`
--
ALTER TABLE `info_contact`
  ADD PRIMARY KEY (`id_info_contact`),
  ADD KEY `lk_info_cate` (`id_cate_contact`);

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
  ADD PRIMARY KEY (`id_order`,`id_pro`),
  ADD KEY `lk_orders_datail_pro` (`id_pro`);

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
  ADD PRIMARY KEY (`id_variant`);

--
-- Chỉ mục cho bảng `websetting`
--
ALTER TABLE `websetting`
  ADD PRIMARY KEY (`id_websetting`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `lk_wishlish_pro` (`id_pro`),
  ADD KEY `lk_wishlist_user` (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cate` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã danh mục', AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `info_contact`
--
ALTER TABLE `info_contact`
  MODIFY `id_info_contact` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_pro` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã sản phẩm';

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
  MODIFY `id_websetting` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cate_contact`
--
ALTER TABLE `cate_contact`
  ADD CONSTRAINT `lk_webseting_contact` FOREIGN KEY (`id_websetting`) REFERENCES `websetting` (`id_websetting`);

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
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `lk_feedback_order` FOREIGN KEY (`id_order`) REFERENCES `order_details` (`id_order`);

--
-- Các ràng buộc cho bảng `images_products_attribute`
--
ALTER TABLE `images_products_attribute`
  ADD CONSTRAINT `lk_img_attri` FOREIGN KEY (`id_variant`) REFERENCES `variant` (`id_variant`),
  ADD CONSTRAINT `lk_img_pro` FOREIGN KEY (`id_pro`) REFERENCES `products` (`id_pro`);

--
-- Các ràng buộc cho bảng `image_news`
--
ALTER TABLE `image_news`
  ADD CONSTRAINT `lk_img_new` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`);

--
-- Các ràng buộc cho bảng `info_contact`
--
ALTER TABLE `info_contact`
  ADD CONSTRAINT `lk_info_cate` FOREIGN KEY (`id_cate_contact`) REFERENCES `cate_contact` (`id_cate_contact`);

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
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `lk_wishlish_pro` FOREIGN KEY (`id_pro`) REFERENCES `products` (`id_pro`),
  ADD CONSTRAINT `lk_wishlist_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

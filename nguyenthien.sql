-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 11, 2023 lúc 08:54 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nguyenthien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `andang`
--

CREATE TABLE `andang` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `is_delete` int DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `andang`
--

INSERT INTO `andang` (`id`, `name`, `age`, `is_delete`, `create_at`) VALUES
(1, 'nguyenthien', 15, NULL, '2021-10-11 12:48:09'),
(2, 'nguyentay', 24, NULL, '2021-10-12 11:46:28'),
(3, 'nguyentay', 24, NULL, '2021-10-12 11:59:21'),
(4, 'nguyentay', 24, NULL, '2021-10-12 12:00:12'),
(5, 'nguyentay', 24, NULL, '2021-10-12 12:02:03'),
(6, 'nguyentay', 24, NULL, '2021-10-12 12:26:49'),
(7, 'nguyentay', 23, 1, '2021-10-13 13:10:57'),
(8, 'nguyen van', 16, NULL, '2021-10-14 14:50:10'),
(9, 'nguyá»…n thiá»‡n', 26, NULL, '2021-10-14 14:50:57'),
(10, 'nguyen vo', 24, NULL, '2021-10-14 15:23:01'),
(11, 'nguyá»…n mai', 26, NULL, '2021-10-14 15:23:23'),
(12, 'nguyá»…n thá»‹nh', 26, NULL, '2021-10-14 15:23:37'),
(13, 'Nguyễn Văn Thiện', 21, NULL, '2023-07-11 09:03:39'),
(24, 'Nguyễn Văn Thiện', 21, NULL, '2023-07-11 09:13:34'),
(25, 'Nguyễn Văn Thiện', 21, NULL, '2023-07-11 09:14:13'),
(26, 'Nguyễn Văn Cảnh ', 21, NULL, '2023-07-11 09:14:13'),
(27, 'Nguyễn Văn Tây', 21, NULL, '2023-07-11 09:14:13'),
(28, 'Nguyễn Văn Cương', 21, NULL, '2023-07-11 09:14:13'),
(29, 'Nguyễn Văn Hùng', 21, NULL, '2023-07-11 09:14:13'),
(30, 'Nguyen van A', 21, NULL, '2023-07-11 02:32:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` int NOT NULL,
  `qty` int NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product_thumb` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_view` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_view` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id`, `username`, `email`) VALUES
(1, 'vanthien', 'vanthien@gmail.com'),
(2, 'nguyenthien', 'admin@localhost'),
(3, 'canhtay', 'canhtay@gmail.com'),
(4, 'tranquynh', 'tranquynh@gmail.com'),
(5, 'nguyenquy', 'nguyenquy@gmail.com'),
(6, 'nguyenhung', 'nguyenhung@gmail.com'),
(7, 'nguyendat', 'nguyendat@gmail.com'),
(8, 'thanhquy', 'thanhquy@gmail.com'),
(9, 'thinhung', 'thinhung@gmail.com'),
(10, 'thanhnhan', 'thanhnhan@gmail.com'),
(11, 'nguyencuong', 'nguyencuong@gmail.com'),
(12, 'nguyenhuong', 'nguyenhuong@gmail.com'),
(13, 'tranquy', 'tranquy@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `order_by` int NOT NULL,
  `active` int NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent_id`, `description`, `order_by`, `active`, `create_at`, `update_at`) VALUES
(1, 'Nước Hoa Nam', 0, 'nguyễn văn thiện là', 112, 1, '2023-08-20 09:53:57', '2023-08-20 09:53:57'),
(2, 'Cảnh Tây', 0, 'fdgasfasdfasdf', 121, 1, '2023-08-20 10:08:26', '2023-08-20 10:08:26'),
(3, 'Nguyễn  Văn Thiện', 1, 'qrwqrwqwrqwer', 12, 0, '2023-08-20 10:16:36', '2023-08-30 10:31:41'),
(4, 'Canh Tay', 0, 'fdgafdfasdf', 12, 0, '2023-08-22 03:23:09', '2023-09-27 14:06:57'),
(9, 'Nước Hoa Nữ Giá Rẻ', 0, 'nước hoa nữ', 121, 0, '2023-08-29 09:20:52', '2023-08-29 09:20:52'),
(10, 'Nước Hoa XXX', 1, 'nước hoa bán chạy nhất', 121, 0, '2023-08-29 10:50:40', '2023-08-29 10:50:40'),
(12, 'Bộ siêu tập mùa Hè', 1, 'Bộ siêu tập mùa Hè', 12, 1, '2023-09-21 14:46:38', '2023-09-21 14:46:38'),
(13, 'Bộ siêu tập mùa Xuân', 1, 'Bộ siêu tập mùa Xuân', 45, 1, '2023-09-21 14:46:59', '2023-09-21 14:46:59'),
(14, 'Bộ siêu tập mùa Thu', 1, 'Bộ siêu tập mùa Thu', 24, 1, '2023-09-21 14:47:20', '2023-09-21 14:47:20'),
(15, 'Bộ siêu tập mùa Đông', 1, 'Bộ siêu tập mùa Đông', 14, 1, '2023-09-21 14:47:39', '2023-09-21 14:47:39'),
(16, 'Nước Hoa Nữ', 0, 'Nước hoa nữ', 15, 1, '2023-09-21 14:48:10', '2023-09-21 14:48:10'),
(17, 'Bộ siêu tập mùa Hè', 16, 'Bộ siêu tập mùa Hè', 12, 1, '2023-09-21 14:48:29', '2023-09-21 14:48:29'),
(18, 'Bộ siêu tập mùa Xuân', 16, 'Bộ siêu tập mùa Xuân', 16, 1, '2023-09-21 14:48:49', '2023-09-21 14:48:49'),
(19, 'Bộ siêu tập mùa Thu', 16, 'Bộ siêu tập mùa Thu', 17, 1, '2023-09-21 14:49:15', '2023-09-21 14:49:15'),
(20, 'Bộ siêu tập mùa Đông', 16, 'Bộ siêu tập mùa Đông', 18, 1, '2023-09-21 14:49:32', '2023-09-21 14:49:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menuthien`
--

CREATE TABLE `menuthien` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int NOT NULL,
  `description` text NOT NULL,
  `order_by` int NOT NULL,
  `active` int NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `menu_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `price_sale` int NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `menu_id`, `description`, `price`, `price_sale`, `content`, `file`, `active`, `create_at`, `update_at`) VALUES
(12, 'Esprit Ruffle Shirt', 1, 'Thương hiệu: Nước hoa Charme\nLoại: Nước hoa nam\nDung tích: 100ml\nGiới tính: Nam\nĐộ tuổi khuyên dùng: Trên 25\nNồng độ: EDP\nĐộ lưu hương: Lâu - 7 giờ đến 12 giờ\nĐộ toả hương: Xa - Toả hương trong vòng bán kính 2 mét\nThời điểm khuyên dùng: Ngày, Đêm, Thu, Đông\nMùi hương đặc trưng:\n    + Hương đầu: cam bergamot, dứa, táo, hoa nhài\n    + Hương giữa : lý chua đen, gỗ tuyết tùng, hoa hồng, bạch dương đen\n    + Hương cuối : hoắc hương, hổ phách, rêu sồi đỏ\nNhóm nước hoa: Hoa cỏ - Trái cây - Thực phẩm\nPhong cách: Mạnh mẽ, nam tính, sang trọng.\nKiểu mùi: ', 250000, 245000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Esprit Ruffle Shirt &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-01.jpg', 1, '2023-10-01 14:51:40', '2023-10-01 14:51:40'),
(13, 'Herschel supply', 1, 'Herschel supply', 0, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Herschel supply &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-02.jpg', 1, '2023-10-01 14:52:01', '2023-10-01 14:52:01'),
(14, 'Only Check Trouser', 1, 'Only Check Trouser', 2890000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Only Check Trouser &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-03.jpg', 1, '2023-10-01 14:52:31', '2023-10-01 14:52:31'),
(15, 'Classic Trench Coat', 1, 'Classic Trench Coat', 560000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Classic Trench Coat &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-04.jpg', 1, '2023-10-01 14:53:00', '2023-10-01 14:53:00'),
(16, 'Front Pocket Jumper', 1, 'Front Pocket Jumper', 675000, 540000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Front Pocket Jumper &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-05.jpg', 1, '2023-10-01 14:53:41', '2023-10-01 14:53:41'),
(17, 'Esprit Ruffle Shirt', 1, 'Esprit Ruffle Shirt', 250000, 245000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Esprit Ruffle Shirt &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-01.jpg', 1, '2023-10-01 07:51:40', '2023-10-01 07:51:40'),
(18, 'Herschel supply', 1, 'Herschel supply', 0, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Herschel supply &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-02.jpg', 1, '2023-10-01 07:52:01', '2023-10-01 07:52:01'),
(19, 'Only Check Trouser', 1, 'Only Check Trouser', 2890000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Only Check Trouser &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-03.jpg', 1, '2023-10-01 07:52:31', '2023-10-01 07:52:31'),
(20, 'Classic Trench Coat', 1, 'Classic Trench Coat', 560000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Classic Trench Coat &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-04.jpg', 1, '2023-10-01 07:53:00', '2023-10-01 07:53:00'),
(21, 'Front Pocket Jumper', 1, 'Front Pocket Jumper', 675000, 540000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Front Pocket Jumper &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-05.jpg', 1, '2023-10-01 07:53:41', '2023-10-01 07:53:41'),
(22, 'Esprit Ruffle Shirt', 1, 'Esprit Ruffle Shirt', 250000, 245000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Esprit Ruffle Shirt &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-01.jpg', 1, '2023-10-01 07:51:40', '2023-10-01 07:51:40'),
(23, 'Herschel supply', 1, 'Herschel supply', 0, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Herschel supply &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-02.jpg', 1, '2023-10-01 07:52:01', '2023-10-01 07:52:01'),
(24, 'Only Check Trouser', 1, 'Only Check Trouser', 2890000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Only Check Trouser &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-03.jpg', 1, '2023-10-01 07:52:31', '2023-10-01 07:52:31'),
(25, 'Classic Trench Coat', 1, 'Classic Trench Coat', 560000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Classic Trench Coat &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-04.jpg', 1, '2023-10-01 07:53:00', '2023-10-01 07:53:00'),
(26, 'Front Pocket Jumper', 1, 'Front Pocket Jumper', 675000, 540000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Front Pocket Jumper &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-05.jpg', 1, '2023-10-01 07:53:41', '2023-10-01 07:53:41'),
(27, 'Esprit Ruffle Shirt', 1, 'Esprit Ruffle Shirt', 250000, 245000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Esprit Ruffle Shirt &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-01.jpg', 1, '2023-10-01 07:51:40', '2023-10-01 07:51:40'),
(28, 'Herschel supply', 1, 'Herschel supply', 0, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Herschel supply &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-02.jpg', 1, '2023-10-01 07:52:01', '2023-10-01 07:52:01'),
(29, 'Only Check Trouser', 1, 'Only Check Trouser', 2890000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Only Check Trouser &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-03.jpg', 1, '2023-10-01 07:52:31', '2023-10-01 07:52:31'),
(30, 'Classic Trench Coat', 1, 'Classic Trench Coat', 560000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Classic Trench Coat &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-04.jpg', 1, '2023-10-01 07:53:00', '2023-10-01 07:53:00'),
(31, 'Front Pocket Jumper', 1, 'Front Pocket Jumper', 675000, 540000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Front Pocket Jumper &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-05.jpg', 1, '2023-10-01 07:53:41', '2023-10-01 07:53:41'),
(32, 'Esprit Ruffle Shirt', 1, 'Esprit Ruffle Shirt', 250000, 245000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Esprit Ruffle Shirt &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-01.jpg', 1, '2023-10-01 07:51:40', '2023-10-01 07:51:40'),
(33, 'Herschel supply', 1, 'Herschel supply', 0, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Herschel supply &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-02.jpg', 1, '2023-10-01 07:52:01', '2023-10-01 07:52:01'),
(34, 'Only Check Trouser', 1, 'Only Check Trouser', 2890000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Only Check Trouser &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-03.jpg', 1, '2023-10-01 07:52:31', '2023-10-01 07:52:31'),
(35, 'Classic Trench Coat', 1, 'Classic Trench Coat', 560000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Classic Trench Coat &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-04.jpg', 1, '2023-10-01 07:53:00', '2023-10-01 07:53:00'),
(36, 'Front Pocket Jumper', 1, 'Front Pocket Jumper', 675000, 540000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Front Pocket Jumper &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-05.jpg', 1, '2023-10-01 07:53:41', '2023-10-01 07:53:41'),
(37, 'Esprit Ruffle Shirt', 1, 'Esprit Ruffle Shirt', 250000, 245000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Esprit Ruffle Shirt &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-01.jpg', 1, '2023-10-01 07:51:40', '2023-10-01 07:51:40'),
(38, 'Herschel supply', 1, 'Herschel supply', 0, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Herschel supply &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-02.jpg', 1, '2023-10-01 07:52:01', '2023-10-01 07:52:01'),
(39, 'Only Check Trouser', 1, 'Only Check Trouser', 2890000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Only Check Trouser &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-03.jpg', 1, '2023-10-01 07:52:31', '2023-10-01 07:52:31'),
(40, 'Classic Trench Coat', 1, 'Classic Trench Coat', 560000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Classic Trench Coat &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-04.jpg', 1, '2023-10-01 07:53:00', '2023-10-01 07:53:00'),
(42, 'Esprit Ruffle Shirt', 1, 'Esprit Ruffle Shirt', 250000, 245000, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Esprit Ruffle Shirt &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-01.jpg', 1, '2023-10-01 07:51:40', '2023-10-01 07:51:40'),
(43, 'Herschel supply', 1, '                 Herschel supply                        ', 512000, 0, '<p><a class=\"stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6\" href=\"file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html\">Herschel supply </a></p>\r\n', '/uploads/2023/10/01/product-02.jpg', 1, '2023-11-03 08:35:12', '2023-11-03 08:35:12'),
(44, 'Only Check Trouser', 1, '                Only Check Trouser            ', 2890000, 0, '<p><a class=\"stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6\" href=\"file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html\">Only Check Trouser </a></p>\r\n', '/uploads/2023/10/01/product-03.jpg', 1, '2023-11-03 08:31:16', '2023-11-03 08:31:16'),
(45, 'Classic Trench Coat', 1, 'Classic Trench Coat', 560000, 0, '&lt;p&gt;&lt;a class=&quot;stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6&quot; href=&quot;file:///C:/Users/Admin/Downloads/coza-store-ecommerce-website-template/cozastore/product-detail.html&quot;&gt;Classic Trench Coat &lt;/a&gt;&lt;/p&gt;', '/uploads/2023/10/01/product-04.jpg', 1, '2023-10-01 07:53:00', '2023-10-01 07:53:00'),
(47, 'Nước Hoa Nam Good Charme Good Men', 1, 'Nước hoa nam Good Men Blue được lấy cảm hứng từ không gian rộng lớn của bầu trời xanh và núi đá dưới ánh mặt trời. Các tầng hương của Good Men kết hợp và bổ trợ cho nhau vô cùng tuyệt vời để tạo một chai nước hoa mới lạ nhưng không kém phần cuốn hút, mang một cá tính rất riêng.\r\n\r\nGood Men Blue là sự lựa chọn tuyệt vời cho những chàng trai yêu thích sự khám phá và tự do. Ý tưởng chai lọ độc đáo với tông màu xanh vô cùng sang trọng, quý phái, gợi lên hình ảnh một người đàn ông lịch lãm và nam tính.', 690000, 0, '&lt;p&gt;&lt;strong&gt;D&amp;ograve;ng Sản Phẩm:&lt;/strong&gt; Nước Hoa Nam &amp;ndash; Good Charme.&lt;br /&gt;\r\n&lt;strong&gt;➣ Phong c&amp;aacute;ch:&lt;/strong&gt; Nam T&amp;iacute;nh, Mạnh Mẽ,C&amp;aacute; T&amp;iacute;nh.&lt;br /&gt;\r\n&lt;strong&gt;➣ Nh&amp;oacute;m Hương: &lt;/strong&gt;Oriental Spicy (Hương Cay Nồng Phương Đ&amp;ocirc;ng)&lt;br /&gt;\r\n&lt;strong&gt;➣ Nồng độ:&lt;/strong&gt;&amp;nbsp;Eau De Parfum (EDP).&lt;br /&gt;\r\n&lt;strong&gt;➣ Độ lưu hương:&lt;/strong&gt;&amp;nbsp;L&amp;acirc;u &amp;ndash; 7 giờ đến 12 giờ.&lt;br /&gt;\r\n&lt;strong&gt;➣ Độ toả hương:&lt;/strong&gt;&amp;nbsp;Xa &amp;ndash; Toả hương trong v&amp;ograve;ng b&amp;aacute;n k&amp;iacute;nh 2 m&amp;eacute;t.&lt;br /&gt;\r\n&lt;strong&gt;➣ Thời điểm khuy&amp;ecirc;n d&amp;ugrave;ng:&lt;/strong&gt; Ng&amp;agrave;y, Đ&amp;ecirc;m, Xu&amp;acirc;n, Hạ, Thu, Đ&amp;ocirc;ng.&lt;br /&gt;\r\n&lt;strong&gt;➣ M&amp;ugrave;i hương đặc trưng với 3 tầng hương:&lt;/strong&gt;&lt;br /&gt;\r\n&lt;strong&gt;✿ Hương Đầu:&lt;/strong&gt; Cam Bergamot, Ti&amp;ecirc;u Đen.&lt;br /&gt;\r\n&lt;strong&gt;✿ Hương giữa:&lt;/strong&gt; Gỗ Tuyết T&amp;ugrave;ng, C&amp;acirc;y X&amp;ocirc; Thơm.&lt;br /&gt;\r\n&lt;strong&gt;✿ Hương cuối:&lt;/strong&gt; Đậu Tonka, Amberwood, Cacao.&lt;/p&gt;', '/uploads/2023/11/03/Nươc Hoa Nam 111.jpg', 1, '2023-11-03 02:14:45', '2023-11-03 14:55:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_slider`
--

CREATE TABLE `product_slider` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_slider`
--

INSERT INTO `product_slider` (`id`, `product_id`, `url`, `create_at`, `update_at`) VALUES
(2, 46, '/uploads/2023/10/01/product-04.jpg', '2023-10-31 14:10:06', '2023-10-31 14:10:06'),
(3, 46, '/uploads/2023/10/01/product-01.jpg', '2023-10-31 14:10:32', '2023-10-31 14:10:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sort_by` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `name`, `sort_by`, `url`, `file`, `active`, `create_at`, `update_at`) VALUES
(1, 'Ảnh nước hoa Nam', 2, 'https://vi.pngtree.com/freebackground/beauty-beauty-pink-perfume-bottle_1552216.html', '/uploads/2023/09/16/AnhNuocHoaNu.jpg', 0, '2023-09-16 13:23:16', '2023-09-29 13:41:30'),
(4, 'Nước hoa Khuyến Mãi', 16, 'google.com', '/uploads/2023/09/26/slide-02.jpg', 1, '2023-09-26 14:36:57', '2023-09-26 14:36:57'),
(5, 'Nước Hoa Hot', 245, 'google.com', '/uploads/2023/09/26/slide-03.jpg', 1, '2023-09-26 14:37:26', '2023-09-26 14:37:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `address`, `info`, `create_at`) VALUES
(1, 'admin@localhost', '$2y$10$96kCvsV/VD07lK9HfJnHE.47t4H1F8f/jneBZt1UipIBr1d0Rj1t2', '', NULL, '2021-12-14 15:35:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userthien`
--

CREATE TABLE `userthien` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `userthien`
--

INSERT INTO `userthien` (`id`, `username`, `password`) VALUES
(1, 'nguyenthien', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `andang`
--
ALTER TABLE `andang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menuthien`
--
ALTER TABLE `menuthien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_slider`
--
ALTER TABLE `product_slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `userthien`
--
ALTER TABLE `userthien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `andang`
--
ALTER TABLE `andang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `menuthien`
--
ALTER TABLE `menuthien`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `product_slider`
--
ALTER TABLE `product_slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `userthien`
--
ALTER TABLE `userthien`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

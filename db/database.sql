-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2022 lúc 02:34 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qpstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `userName` varchar(100) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `displayName` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `active_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`userName`, `password`, `displayName`, `address`, `email`, `phone`, `role_id`, `status`, `create_date`, `active_code`) VALUES
('admin', 'admin', 'Admin', 'Hà Nội', 'admin@fpt.edu.vn', '0866823499', 1, 1, '2019-10-20', NULL),
('edx', '123', 'Vu Hoang Linh', 'Pha Lai, Chi Linh, Hai Duong', 'linhvhhe150945@fpt.edu.vn', '1234455667', 4, 1, '2021-11-02', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`) VALUES
(1, 'ĐỒ GIA DỤNG', 1),
(2, 'THỰC PHẨM', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image_url` varchar(400) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `product_id`, `image_url`, `status`) VALUES
(5, 2, 'https://scontent.fhan2-3.fna.fbcdn.net/v/t39.30808-6/269625001_4756927224373828_7769336872399741399_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=8bfeb9&_nc_ohc=C32mOjDOYvsAX98I_wN&_nc_oc=AQl96EWv-Mx1oCyLhgWReSrGoGP8KS3AMtKjunm4dBbQBlu7qB076lb7-_wLq3fuZgo&_nc_ht=scontent.fhan2-3.fna&oh=00_AT8LSDCxUPnyhFxQPBcrLqigaRys8si4awWreL5Gz1omWQ&oe=61DAF7EA', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `Customer` varchar(100) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `note` varchar(2000) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `Customer`, `shipping_id`, `create_date`, `total_price`, `note`, `status`) VALUES
(1, 'minh', 1, '2021-04-04', 55000, 'Hàng dễ vỡ, ship cẩn thận nhé !!!!!!', 5),
(2, 'linhvhhe150945@fpt.edu.vn', 2, '2022-01-07', 30000, '', 1),
(3, 'linhvhhe150945@fpt.edu.vn', 3, '2022-01-07', 30000, '', 1),
(4, 'linhvhhe150945@fpt.edu.vn', 4, '2022-01-07', 80000, '', 1),
(5, 'linhvhhe150945@fpt.edu.vn', 5, '2022-01-07', 50000, '', 1),
(6, 'linhvhhe150945@fpt.edu.vn', 7, '2022-01-07', 50000, '', 1),
(7, 'linhvhhe150945@fpt.edu.vn', 8, '2022-01-07', 50000, '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_price` bigint(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `quantity`, `product_image`) VALUES
(1, 1, 1, 'Repair Tool', 17, 1, 'tools/1_0.jpg'),
(2, 2, 3, 'DAMIER T-SHIRT', 30000, 30000, 'AnhWeb/Men/Shirt/3_0.webp'),
(3, 3, 3, 'DAMIER T-SHIRT', 30000, 30000, 'AnhWeb/Men/Shirt/3_0.webp'),
(4, 4, 3, 'DAMIER T-SHIRT', 30000, 30000, 'AnhWeb/Men/Shirt/3_0.webp'),
(5, 4, 2, 'San pham dang ok roi nhe', 50000, 50000, 'https://scontent.fpnh22-4.fna.fbcdn.net/v/t39.3080'),
(6, 6, 2, 'San pham dang ok roi nhe', 50000, 50000, 'https://scontent.fpnh22-4.fna.fbcdn.net/v/t39.3080'),
(7, 7, 2, 'San pham dang ok roi nhe', 50000, 50000, 'https://scontent.fpnh22-4.fna.fbcdn.net/v/t39.3080');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `image_url` varchar(400) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `sale` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `quantity`, `price`, `description`, `image_url`, `create_date`, `status`, `sub_category_id`, `sale`) VALUES
(2, 'HW-02', 'San pham dang ok roi nhe', 2, 50000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a ', 'https://scontent.fpnh22-4.fna.fbcdn.net/v/t39.30808-6/269797511_4756927101040507_8909371706176480626_n.jpg?_nc_cat=111&ccb=1-5&_nc_sid=8bfeb9&_nc_ohc=Vivohv7mqVUAX-STR6M&tn=f68M97D8m5dUD3CP&_nc_ht=scontent.fpnh22-4.fna&oh=00_AT-vSq4C3VmjW8hAS16ZpQ5wYwKAl2JnsnSzP2ZBgaMhFw&oe=61D9E079', '1900-01-01', 1, 1, 0),
(3, 'HW-03', 'DAMIER T-SHIRT', 10, 30000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a ', 'AnhWeb/Men/Shirt/3_0.webp', '2019-10-09', 1, 1, 0),
(4, 'HW-04', 'DAMIER T-SHIRT', 10, 40000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/4_0.png', '2019-10-09', 1, 1, 0),
(5, 'HW-05', 'DAMIER T-SHIRT', 10, 40000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/5_0.webp', '2019-10-09', 3, 1, 0),
(6, 'HW-06', 'DAMIER T-SHIRT', 10, 70000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/6_0.webp', '2019-10-09', 2, 1, 0.15),
(7, 'HW-07', 'DAMIER T-SHIRT', 10, 50000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/7_0.webp', '2019-10-09', 3, 1, 0),
(8, 'HW-08', 'DAMIER T-SHIRT', 10, 30000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/8_0.webp', '2019-10-09', 2, 1, 0.08),
(9, 'HW-09', 'DAMIER T-SHIRT', 12, 20000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/9_0.webp', '2019-10-09', 1, 1, 0),
(10, 'HW-010', 'DAMIER T-SHIRT', 12, 10000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/10_0.webp', '2019-10-18', 2, 1, 0.2),
(11, 'HW-011', 'DAMIER T-SHIRT', 13, 40000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/11_0.webp', '2019-10-18', 2, 1, 0.13),
(12, 'HW-012', 'DAMIER T-SHIRT', 13, 20000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/12_0.webp', '2019-10-18', 1, 1, 0),
(13, 'HW-013', 'DAMIER T-SHIRT', 14, 30000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/13_0.webp', '2019-10-18', 2, 1, 0.1),
(14, 'HW-014', 'DAMIER T-SHIRT', 14, 50000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/14_0.webp', '2019-10-18', 2, 1, 0.1),
(15, 'HW-015', 'DAMIER T-SHIRT', 14, 10000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/15_0.webp', '2019-10-18', 2, 1, 0.02),
(16, 'HW-016', 'DAMIER T-SHIRT', 14, 120000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/16_0.png', '2019-10-18', 2, 1, 0.02),
(17, 'HW-017', 'DAMIER T-SHIRT', 14, 50000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/17_0.webp', '2019-10-18', 2, 1, 0.09),
(18, 'HW-018', 'DAMIER T-SHIRT', 14, 70000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/18_0.webp', '2019-10-18', 1, 1, 0),
(19, 'HW-019', 'DAMIER T-SHIRT', 14, 40000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/19_0.webp', '2019-10-18', 2, 1, 0.15),
(20, 'HW-020', 'DAMIER T-SHIRT', 14, 50000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/20_0.webp', '2019-10-18', 1, 1, 0),
(21, 'HW-021', 'DAMIER T-SHIRT', 14, 200000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/1_0.webp', '2019-10-18', 1, 1, 0),
(22, 'HW-022', 'DAMIER T-SHIRT', 14, 40000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/1_0.webp', '2019-10-18', 1, 1, 0),
(23, 'HW-023', 'DAMIER T-SHIRT', 14, 50000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/1_0.webp', '2019-10-18', 3, 1, 0),
(24, 'HW-024', 'DAMIER T-SHIRT', 14, 100000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/1_0.webp', '2019-10-18', 2, 1, 0.14),
(25, 'HW-025', 'DAMIER T-SHIRT', 14, 12000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/1_0.webp', '2019-10-18', 3, 1, 0),
(33, 'HW-033', 'DAMIER T-SHIRT', 14, 329000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'AnhWeb/Men/Shirt/1_0.webp', '2019-10-18', 3, 2, 0),
(34, 'HW-034', 'DAMIER T-SHIRT', 14, 340000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 2, 2, 0.16),
(35, 'HW-035', 'DAMIER T-SHIRT', 14, 454000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 2, 2, 0.02),
(36, 'HW-036', 'DAMIER T-SHIRT', 14, 483000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 2, 2, 0.1),
(37, 'HW-037', 'DAMIER T-SHIRT', 14, 359000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 1, 2, 0),
(38, 'HW-038', 'DAMIER T-SHIRT', 14, 164000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 2, 2, 0.2),
(39, 'HW-039', 'DAMIER T-SHIRT', 14, 394000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 2, 2, 0.13),
(40, 'HW-040', 'DAMIER T-SHIRT', 14, 292000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 1, 2, 0),
(41, 'HW-041', 'DAMIER T-SHIRT', 14, 210000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 3, 3, 0),
(42, 'HW-042', 'DAMIER T-SHIRT', 14, 488000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 3, 3, 0),
(43, 'HW-043', 'DAMIER T-SHIRT', 14, 241000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 2, 3, 0.1),
(44, 'HW-044', 'DAMIER T-SHIRT', 14, 262000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 1, 3, 0),
(45, 'HW-045', 'DAMIER T-SHIRT', 14, 320000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 3, 3, 0),
(46, 'HW-046', 'DAMIER T-SHIRT', 14, 346000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 2, 3, 0.08),
(47, 'HW-047', 'DAMIER T-SHIRT', 14, 387000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 2, 3, 0.19),
(48, 'HW-048', 'DAMIER T-SHIRT', 14, 476000, 'This graphic piece plays the capsule\'s playful Damier design on a classic sweatshirt shape. The screen-printed pattern incorporates hand-drawn effect penstrokes and a \"Marque Louis Vuitton déposée\" signature. Crafted from brushed-back felpa cotton, the piece features a ribbed bottom hem and cuffs.', 'Men/Shirt/1_0.webp', '2019-10-18', 2, 3, 0.12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_account`
--

CREATE TABLE `role_account` (
  `id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `role_account`
--

INSERT INTO `role_account` (`id`, `role`) VALUES
(1, 'Quản trị viên'),
(2, 'Nhân viên'),
(3, 'Vip'),
(4, 'Khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shipping`
--

INSERT INTO `shipping` (`id`, `name`, `phone`, `address`) VALUES
(1, 'Nguyễn Thị Ánh', '0123456789', 'Thái Bình'),
(2, ' linhvhhe150945@fpt.edu.vn', '0345291510', 'Phả Lại'),
(3, ' linhvhhe150945@fpt.edu.vn', '0345291510', 'Phả Lại'),
(4, ' linhvhhe150945@fpt.edu.vn', '0345291510', 'Phả Lại'),
(5, ' linhvhhe150945@fpt.edu.vn', '0345291510', 'Phả Lại'),
(7, ' linhvhhe150945@fpt.edu.vn', '0345291510', 'Phả Lại'),
(8, ' linhvhhe150945@fpt.edu.vn', '0345291510', 'Phả Lại');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_account`
--

CREATE TABLE `status_account` (
  `id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `status_account`
--

INSERT INTO `status_account` (`id`, `status`) VALUES
(1, 'Kích hoạt'),
(2, 'Chờ'),
(3, 'Bị chặn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_category`
--

CREATE TABLE `status_category` (
  `id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `status_category`
--

INSERT INTO `status_category` (`id`, `status`) VALUES
(1, 'Đang bán'),
(2, 'Đang khuyến mãi'),
(3, 'Miễn phí vận chuyển'),
(4, 'Hết hàng'),
(5, 'Ngừng kinh doanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_order`
--

CREATE TABLE `status_order` (
  `id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `status_order`
--

INSERT INTO `status_order` (`id`, `status`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Được chấp nhận'),
(3, 'Đang vận chuyển'),
(4, 'Thanh toán online'),
(5, 'Thành công');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_product`
--

CREATE TABLE `status_product` (
  `id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `status_product`
--

INSERT INTO `status_product` (`id`, `status`) VALUES
(1, 'Đang bán'),
(2, 'Đang khuyến mãi'),
(3, 'Miễn phí vận chuyển'),
(4, 'Hết hàng'),
(5, 'Ngừng kinh doanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_sub_category`
--

CREATE TABLE `status_sub_category` (
  `id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `status_sub_category`
--

INSERT INTO `status_sub_category` (`id`, `status`) VALUES
(1, 'Đang bán'),
(2, 'Đang khuyến mãi'),
(3, 'Miễn phí vận chuyển'),
(4, 'Hết hàng'),
(5, 'Ngừng kinh doanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_name` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_category_name`, `status`) VALUES
(1, 1, 'ĐỒ TRANG TRÍ', 1),
(2, 1, 'ĐỒ NHÀ BẾP', 1),
(3, 1, 'ĐỒ VỆ SINH', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sysdiagrams`
--

CREATE TABLE `sysdiagrams` (
  `name` varchar(160) NOT NULL,
  `principal_id` int(11) NOT NULL,
  `diagram_id` int(11) NOT NULL,
  `version` int(11) DEFAULT NULL,
  `definition` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `view`
--

CREATE TABLE `view` (
  `view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `view`
--

INSERT INTO `view` (`view`) VALUES
(1167);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userName`),
  ADD KEY `FK__account__role_id__412EB0B6` (`role_id`),
  ADD KEY `FK__account__status__4222D4EF` (`status`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__category__status__4316F928` (`status`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__image__product_i__6383C8BA` (`product_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__order__shipping___6477ECF3` (`shipping_id`),
  ADD KEY `FK__order__status__693CA210` (`status`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__order_det__order__47DBAE45` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__product__status__6477ECF3` (`status`),
  ADD KEY `FK__product__sub_cat__49C3F6B7` (`sub_category_id`);

--
-- Chỉ mục cho bảng `role_account`
--
ALTER TABLE `role_account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_account`
--
ALTER TABLE `status_account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_category`
--
ALTER TABLE `status_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_product`
--
ALTER TABLE `status_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_sub_category`
--
ALTER TABLE `status_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__sub_categ__categ__4AB81AF0` (`category_id`),
  ADD KEY `FK__sub_categ__statu__4BAC3F29` (`status`);

--
-- Chỉ mục cho bảng `sysdiagrams`
--
ALTER TABLE `sysdiagrams`
  ADD PRIMARY KEY (`diagram_id`),
  ADD UNIQUE KEY `UK_principal_name` (`principal_id`,`name`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `FK__account__role_id__412EB0B6` FOREIGN KEY (`role_id`) REFERENCES `role_account` (`id`),
  ADD CONSTRAINT `FK__account__status__4222D4EF` FOREIGN KEY (`status`) REFERENCES `status_account` (`id`);

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK__category__status__4316F928` FOREIGN KEY (`status`) REFERENCES `status_category` (`id`);

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK__image__product_i__6383C8BA` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK__order__shipping___45F365D3` FOREIGN KEY (`shipping_id`) REFERENCES `shipping` (`id`),
  ADD CONSTRAINT `FK__order__shipping___6477ECF3` FOREIGN KEY (`shipping_id`) REFERENCES `shipping` (`id`),
  ADD CONSTRAINT `FK__order__status__46E78A0C` FOREIGN KEY (`status`) REFERENCES `status_order` (`id`),
  ADD CONSTRAINT `FK__order__status__656C112C` FOREIGN KEY (`status`) REFERENCES `status_order` (`id`),
  ADD CONSTRAINT `FK__order__status__693CA210` FOREIGN KEY (`status`) REFERENCES `status_order` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK__order_det__order__47DBAE45` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK__product__status__6477ECF3` FOREIGN KEY (`status`) REFERENCES `status_product` (`id`),
  ADD CONSTRAINT `FK__product__sub_cat__49C3F6B7` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`);

--
-- Các ràng buộc cho bảng `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `FK__sub_categ__categ__4AB81AF0` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK__sub_categ__statu__4BAC3F29` FOREIGN KEY (`status`) REFERENCES `status_sub_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

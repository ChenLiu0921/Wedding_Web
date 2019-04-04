-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2018 at 06:42 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infs7202`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogid` int(10) NOT NULL,
  `blogger` varchar(50) NOT NULL,
  `time` datetime NOT NULL,
  `content` varchar(200) NOT NULL,
  `goods` int(7) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goodcheck`
--

CREATE TABLE `goodcheck` (
  `blogid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `order_number` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `quantity` int(4) NOT NULL,
  `price` float NOT NULL,
  `username` varchar(50) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`order_number`, `product_name`, `quantity`, `price`, `username`, `item_id`, `path`) VALUES
('2018052523667', 'Four Dream In One Place', 2, 29999, 'liqun', '32b1851cc22c164df5ab5a16a0085e59', 'Public\\img\\4.jpg'),
('2018052566778', 'Bridal Bouquet', 2, 520, 'test1', '8e7e91ff8bcc2944e00e0e958e8dc32d', 'Public\\img\\9.jpg'),
('2018052566778', 'Blooms of Flora - Rose', 1, 299, 'test1', '94c870c43d19d1ca67ddaf3d4c84ab33', 'Public\\img\\2.jpg'),
('2018052523667', 'Blooms of Flora - Rose', 1, 299, 'liqun', 'c5f25a2a652a02752bc272b2722ad9ad', 'Public\\img\\2.jpg'),
('2018052523667', 'Bridal Bouquet', 1, 520, 'liqun', 'e6d3a6dae03b701438e1ab01ea410cb0', 'Public\\img\\9.jpg'),
('2018052523667', 'Crystal White Tradition Style ', 1, 27880, 'liqun', 'f59a9e6b9d2df720362557be7e5236cb', 'Public\\img\\8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `product_name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `product_dsc` varchar(200) NOT NULL,
  `path` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`product_name`, `price`, `product_dsc`, `path`, `category`) VALUES
('Bdgley Mischaka', 780, 'A scalloped pattern of glittering rhinestones accents these glamorous Badley Mischaka pumps.', 'Public\\img\\3.jpg', 'shoes'),
('Blooms of Flora - Rose', 299, 'Special bouquet with special price only for this month.', 'Public\\img\\2.jpg', 'accessory'),
('Bridal Bouquet', 520, 'Special bridal bouquet design by the most famous fashion stylist.', 'Public\\img\\9.jpg', 'accessory'),
('Bridesmaid Special', 37820, 'Boheme Goddess Maxi Dress Vintage Blooms Musk.', 'Public\\img\\7.jpg', 'dress'),
('Couple Shoes Combo', 2180, 'A pair of brown leather shoes for groomsman, and a pair of crystal whith shoes for bridsmaid.', 'Public\\img\\5.jpg', 'shoes'),
('Crystal White Tradition Style ', 27880, 'Tradition style with 999 pearl, hand made by INFS Wedding Design group.', 'Public\\img\\8.jpg', 'dress'),
('Dreamlike florals', 9999, 'Patterns blend inthis strapless sheath, finished with a structured horeshair hemline.', 'Public\\img\\1.jpg', 'dress'),
('Four Dream In One Place', 29999, 'Adorned with intricate beading and clear sequins, these strapless sheaths truly shimmers.', 'Public\\img\\4.jpg', 'dress'),
('Hold Your Hands', 189, 'Bracelet made from flowers.', 'Public\\img\\10.jpg', 'accessory'),
('Luxury Dream', 37800, 'Design by the most famous fashion stylist, with 9999 pearls, handmade by INFS Wedding Design group.', 'Public\\img\\11.jpg', 'dress'),
('Pink Pink Princess', 25890, 'The most special dress ever! ', 'Public\\img\\12.jpg', ''),
('Platinum Bride Crown', 8888, 'Platinum Bride Crown made by INFS Wedding Design group.', 'Public\\img\\6.jpg', 'accessory');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `product_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `shopid` varchar(50) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `username` varchar(50) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`username`, `password`, `email`, `phone`, `gender`, `icon`) VALUES
('liqun', '$2y$10$7Sv2GczufgguAi/S6Pl3JOZt30EIJ5iSA9ennFZs5c6.EYuAlA58S', '1055956455@qq.com', 0, 'male', 'Public/icon/user.jpg'),
('liuchen', '$2y$10$IRuCztY1QuZQTlIfEouz6ebOkJxrYEJjNpiagfd3KgBu1GJKjpaaC', '1004121235@qq.com', 1231242, 'male', '/Public/icon/liuchen.jpg'),
('test', '$2y$10$UNtcrGlW/PNTRgYYFXWMBerDel9gL7ttHaLfErCtgWuB5J4P45oXu', '1004121235@qq.com', 23143253, 'male', 'Public/icon/user.jpg'),
('test1', '$2y$10$3aH2LLPqT1nYBF881i9ULuIgAcIPBgygTbutUpa8bBrR5ilqWP6u6', '1004121235@qq.com', 12143, 'male', 'Public/icon/test1.jpg'),
('test2', '$2y$10$d5ClZvycW/t2NNM26SZFF.4y2Y81TnhUOEkc..gqU1lwOKwEuB/DW', '1004121235@qq.com', 23123, 'male', 'Public/icon/user.jpg'),
('test4', '$2y$10$BXeRtzk9X/mwVJ/m3KaKXO42BT/DsGLj4SJ0rBn.ydGt8zCqpeHu6', '1004121235@qq.com', 123354, 'male', 'Public/icon/user.jpg'),
('test5', '$2y$10$PnU.nTvpU.R5tEOEsIicGeA/011xCAHtg/ZcdozidxC1A3MXSYDny', 'zengliqung@gmail.com', 106565464, 'male', 'Public/icon/user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_username_order` (`username`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`product_name`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`shopid`),
  ADD KEY `fk_username` (`username`),
  ADD KEY `fk_product_name` (`product_name`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `fk_username_order` FOREIGN KEY (`username`) REFERENCES `user_info` (`username`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `fk_product_name` FOREIGN KEY (`product_name`) REFERENCES `product_info` (`product_name`),
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `user_info` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 04:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apple`
--

-- --------------------------------------------------------

--
-- Table structure for table `bag`
--

CREATE TABLE `bag` (
  `bag_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bag`
--

INSERT INTO `bag` (`bag_id`, `prod_id`, `user_id`, `price`) VALUES
(16, 11, 1, 2399),
(23, 20, 1, 1799),
(24, 16, 1, 399),
(25, 3, 1, 999),
(26, 12, 1, 799),
(27, 19, 1, 4999),
(28, 11, 3, 2399),
(29, 15, 3, 399),
(30, 5, 3, 399),
(31, 17, 3, 279),
(32, 10, 4, 1299),
(33, 11, 4, 2399),
(34, 4, 4, 599),
(35, 12, 4, 799),
(36, 13, 4, 599),
(37, 17, 4, 279),
(38, 16, 4, 399),
(39, 18, 4, 199),
(40, 19, 4, 4999),
(41, 20, 4, 1799);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Mac'),
(2, 'iPad'),
(3, 'iPhone'),
(4, 'Watch'),
(5, 'TV');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` mediumtext NOT NULL,
  `prod_image` longtext NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_spec` longtext NOT NULL,
  `price` tinytext NOT NULL,
  `categ` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_image`, `prod_desc`, `prod_spec`, `price`, `categ`) VALUES
(3, 'iPhone 12 Pro', 'https://images.anandtech.com/doci/16167/GEO-iPhone12ProMax-iPhone12Pro-pacific-blue-2up.png', 'Pro camera system (Ultra Wide, Wide, Telephoto) LiDAR Scanner for Night mode portraits and next‑level AR Compatible with MagSafe accessories', '6.1” or 6.7” Super Retina XDR display3 5G cellular4 A14 Bionic chip', '999', 'iPhone'),
(4, 'iPhone 11', 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone11-black-select-2019?wid=940&hei=1112&fmt=png-alpha&qlt=80&.v=1566956144418', 'Dual-camera system (Ultra Wide, Wide)', '6.1” Liquid Retina HD display3 4G LTE cellular4 A13 Bionic chip', '599', 'iPhone'),
(5, 'iPhone SE', 'https://www.iclick.ae/wp-content/uploads/2016/11/iphonese-gray-select-2016.png', 'Single-camera system (Wide)', '4.7” Retina HD display 4G LTE cellular4 A13 Bionic chip', '399', 'iPhone'),
(9, 'MacBook Air', 'https://www.apple.com/v/mac/home/ax/images/overview/compare/macbook_air__bfz9o93hnyuq_large.jpg', 'Up to 9x faster.14 Even for a 16‑core Neural Engine, that’s a lot to process. Apps on MacBook Air can use machine learning (ML) to automatically retouch photos like a pro, make smart tools such as magic wands and audio filters more accurate at auto‑detection, and so much more. ', '13.3” Retina display1 Apple M1 chip Up to 16GB memory  Up to 2TB storage2  Up to 18 hours battery life3', '999 ', 'Mac'),
(10, ' MacBook Pro 13”', 'https://www.apple.com/v/mac/home/ax/images/overview/compare/macbook_pro_13__ft1pc3lqwd6y_large.jpg', 'The Apple M1 chip gives the 13‑inch MacBook Pro speed and power beyond belief. With up to 2.8x CPU performance. Up to 5x the graphics speed. Our most advanced Neural Engine for up to 11x faster machine learning. And up to 20 hours of battery life — the longest of any Mac ever. It’s our most popular pro notebook, taken to a whole new level.', '     13.3” Retina display1     Apple M1 chip     Also available with Intel Core i5 or     i7 processor     Up to 16GB memory4     Up to 2TB storage4     Up to 20 hours battery life5', '1299', 'Mac'),
(11, ' MacBook Pro 16”', 'https://www.apple.com/v/mac/home/ax/images/overview/compare/macbook_pro_16__x90efpvdutu6_large.jpg', 'Designed for those who defy limits and change the world, the 16-inch MacBook Pro is by far the most powerful notebook we have ever made. With an immersive Retina display, superfast processors, advanced graphics.', '16” Retina display1     Intel Core i7 or i9 processor     Up to 64GB memory     Up to 8TB storage2     Up to 11 hours battery life6', '2399', 'Mac'),
(12, 'iPad Pro', 'https://www.apple.com/v/ipad/home/bg/images/overview/compare_ipad_pro__d0h57340ahaq_large.png', 'Compatible with Magic Keyboard and Smart Keyboard Folio  Compatible with Apple Pencil (2nd generation)', ' 12.9” and 11”  Liquid Retina display with ProMotion  A12Z Bionic chip', '799', 'iPad'),
(13, 'iPad Air', 'https://www.apple.com/v/ipad/home/bg/images/overview/compare_ipad_air__dlzfpz8gev42_large.png', 'Compatible with Magic Keyboard and Smart Keyboard Folio  Compatible with Apple Pencil (2nd generation)', ' 10.9”  Liquid Retina display  A14 Bionic chip', '599', 'iPad'),
(14, ' iPad', 'https://www.apple.com/v/ipad/home/bg/images/overview/compare_ipad_10_2__d87l3rz5hzue_large.png', 'Compatible with Smart Keyboard  Compatible with Apple Pencil (1st generation)', ' 10.2”  Retina display  A12 Bionic chip', '329', 'iPad'),
(15, 'iPad mini', 'https://www.apple.com/v/ipad/home/bg/images/overview/compare_ipad_mini__k6cml5algu6i_large.png', 'Compatible with Bluetooth keyboards  Compatible with Apple Pencil (1st generation)', ' 7.9”  Retina display  A12 Bionic chip', '399', 'iPad'),
(16, 'Apple Watch Series 6', 'https://cdn.tmobile.com/content/dam/t-mobile/en-p/internet-devices/apple/Apple-Watch-Series-6-40mm/Navy-Aluminum-Sport-Band/Apple-Watch-Series-6-40mm-Navy-Aluminum-Sport-Band-frontimage.png', '  High and low heart rate notifications  Irregular heart rhythm notification4  Supports Family Setup5 (GPS + Cellular models)  Water resistant 50 meters6', '  44mm or 40mm case size  Always-On Retina display     GPS + Cellular1  GPS  Blood Oxygen app2  ECG app3', '399', 'Watch'),
(17, 'Apple Watch SE', 'https://www.searchpng.com/wp-content/uploads/2019/01/Apple-Watch-Series-3-PNG-Image.png', '  High and low heart rate notifications  Irregular heart rhythm notification4  Supports Family Setup5 (GPS + Cellular models)  Water resistant 50 meters6', '  44mm or 40mm case size     Retina display  GPS + Cellular1  GPS', '279', 'Watch'),
(18, 'Apple Watch Series 3', 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/38-alu-silver-sport-white-nc-s3-1up?wid=940&hei=1112&fmt=png-alpha&qlt=80&.v=1594318675000', '  High and low heart rate notifications  Irregular heart rhythm notification4     Water resistant 50 meters6', '  42mm or 38mm case size     Retina display     GPS', '199', 'Watch'),
(19, 'Pro Display XDR', 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/pro-display-hero_FV1?wid=410&hei=237&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1572997644832', '32-inch Retina 6K. Astonishing color accuracy. Superwide viewing angle. And Extreme Dynamic Range.', '32-inch Retina 6K. Astonishing color accuracy. Superwide viewing angle. And Extreme Dynamic Range.', '4999', 'TV'),
(20, 'iMac', 'https://www.apple.com/v/imac/k/images/overview/trade_in__c4mynrenm066_large.jpg', 'The all-in-one for all. If you can dream it, you can do it on iMac. It’s beautifully designed, incredibly intuitive, and packed with powerful tools that let you take any idea to the next level. ', 'First seen on the Pro Display XDR, the nano-texture glass option on the 27‑inch iMac is a game-changer for workspaces with sunlight, direct light, or changing lighting conditions.', '1799', 'TV');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `pass` longtext NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `email`, `pass`, `is_admin`) VALUES
(3, 'testAcc', 'tester@gmail.com', '$2y$10$gnISDQZHEUvb5glmnscffu/GtKh6qVlajJ4bE9i.tjruDMl/M6lv2', 0),
(4, 'Anton', 'antowkaugpyua@gmail.com', '$2y$10$EqGR7cLwNDp6SyUApYrYA.sedbQrprjY5SVKf9DA/lw79V3rLhzDu', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`bag_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bag`
--
ALTER TABLE `bag`
  MODIFY `bag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

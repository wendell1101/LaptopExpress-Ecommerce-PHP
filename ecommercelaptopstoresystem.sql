-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 03:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercelaptopstoresystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `release_status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `image_name`, `details`, `price`, `item_type`, `release_status`, `created_at`) VALUES
(7, 'Acer Aspire ', 'acerAspire5.png', 'Acer Aspire 5 A514-52KG-31B8 Nvidia MX130 Narrow Bezel i3-7020U ram 4GB 1TB Laptop sale\r\n        ', '21000.59', 'Mid-Gaming', 1, '2020-03-05 12:39:09'),
(9, 'HP 14S-DK0002AX', 'HP14-SDK0002AX.png', '        HP 14S-DK0002AX Laptop 14 inches , AMD Ryzen 3, 3200U, Radeon Vega 3, 4GB RAM ddr4, 1TB HDD, backlit-ready.\r\n        ', '24699.00', 'Mid-Gaming', 1, '2020-03-06 05:22:53'),
(11, 'Dell Inspiron 3000', 'DellInspiron3000.png', 'Newest Dell Inspiron 3000 11.6 LED-Backlit Touchscreen, 7th Gen AMD A6-9220e 2.5GHz Processor, 4GB DDR4, 320GB SSD\r\n        ', '18447.00', 'Mid-Gaming', 1, '2020-03-07 04:54:22'),
(12, 'Asus x555QA', 'Asusx555QA.png', 'Asus x555QA 15.6inch AMD A12-9720P Ram 8gb ssd 128gb Radeon R7 windows 10 laptop 4 Hours Battery Life\r\n        ', '23000.00', 'Mid-Gaming', 1, '2020-03-07 04:55:18'),
(13, 'ASUS G531GD-AL030T', 'ASUSG531GD-AL030T.png', 'ASUS G531GD-AL030T STRIX G 15.6\" Black Intel® Core™ i5-9300H 8GBDDR4 512SSD 4GB GTX1050 Windows 10\r\n        ', '55995.00', 'Heavy-Gaming', 1, '2020-03-07 04:56:09'),
(15, 'Acer Predator Helios 300', 'AcerPredatorHelios300.png', 'Acer Predator Helios 300 Intel Core i5 GeForce GTX 1660 Ti 15.6-inch Gaming Laptop (PH315-52-55F7)', '71299.00', 'Heavy-Gaming', 1, '2020-03-11 09:56:35'),
(16, 'Dell XPS 15 7590', 'Dell XPS 15 7590.png', 'Dell XPS 15 7590 9th 15\" widescreen Gen i7-9750H 32GB RAM 1TB SSD GTX1650 Touch 4K UHD', '110000.00', 'Heavy-Gaming', 1, '2020-03-11 13:51:27'),
(17, 'DELL G7 7590', 'DELL G7 7590.png', 'DELL G7 7590 RGB 4-ZONE 15.6\" Abyss Gray Intel® Core™ i7 9750H 16GB DDR4 512SSD 8GB RTX2070 Max-Q Windows 10\r\n        ', '137995.00', 'Heavy-Gaming', 1, '2020-03-11 13:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_item_name` int(11) DEFAULT NULL,
  `order_price` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(65,2) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `streetname` varchar(255) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `other_note` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_item_name`, `order_price`, `quantity`, `total_price`, `firstname`, `middlename`, `lastname`, `email`, `province`, `city`, `barangay`, `streetname`, `contact_number`, `other_note`, `status`, `item_id`, `user_id`, `date`) VALUES
(2, 9, 9, 1, '24699.00', 'wendell', 'chan', 'suazo', 'wendellchansuazo11@gmail.com', 'laguna', 'calamba', 'canlubang', '09 maharlika highway', '09103212389', '', 1, 9, 1, '2020-03-14 04:51:21'),
(3, 7, 7, 1, '21000.59', 'julia', 'vergara', 'de jesus', 'juliadj13@gmail.com', 'laguna', 'calmba', 'jh', 'jh', 'j', 'h', 0, 7, 1, '2020-03-14 04:54:54'),
(4, 9, 9, 1, '24699.00', 'k', 'k', 'kk', 'k@gmail.com', 'kkj', 'j', 'jj', 'jjjjjj', 'jj', 'j', 1, 9, 1, '2020-03-14 04:56:35'),
(5, 7, 7, 1, '21000.59', 'wendell', 'chan', 'suazo', 'wendellchansuazo11@gmail.com', 'laguna', 'calamba', 'canlubang', '123 dimahanap St.', '09091293719', 'one', 0, 7, 1, '2020-03-14 04:58:54'),
(6, 7, 7, 1, '21000.59', 'h', 'h', 'h', 'h@gmail.com', 'h', 'h', 'h', 'h', 'h', 'h', 0, 7, 1, '2020-03-14 05:00:00'),
(7, 9, 9, 1, '24699.00', 'l', 'l', 'l', 'l@gmail.com', 'l', 'll', 'l', 'l', 'l', 'l', 1, 9, 1, '2020-03-14 05:01:19'),
(8, 7, 7, 1, '21000.59', 'l', 'l', 'l', 'l@gmail.com', 'h', 'h', 'hh', 'h', 'h', 'h', 1, 7, 1, '2020-03-14 05:02:18'),
(9, 12, 12, 1, '23000.00', 'm', 'm', 'm', 'm@gmail.com', 'k', 'h', 'h', 'k', 'l', 'n', 0, 12, 1, '2020-03-14 05:04:30'),
(10, 9, 9, 1, '24699.00', 'k', 'k', 'k', 'k@gmail.com', 'kk', 'k', 'k', 'k', 'k', 'kk', 1, 9, 1, '2020-03-14 05:06:20'),
(11, 7, 7, 1, '21000.59', 'test', 'testlang', 'testing', 'test@gmail.com', 'laguna', 'calamba', 'canlubang', '123 sofar away St.', '0909723827', '', 0, 7, 1, '2020-03-14 07:31:23'),
(12, 13, 13, 1, '55995.00', 'samsung', 'china', 'bank', '123@gmail.com', 'laguna', 'calamba', 'canlubang', '123 sofar away St.', '12329090429', '', 2, 13, 1, '2020-03-14 07:41:18'),
(13, 7, 7, 1, '21000.59', 'cherry', 'mobile', 'php', 'php@gmail.com', 'laguna', 'calamba', 'canlubang', '123 sofar away St.', 'khakfj', '093201', 2, 7, 1, '2020-03-14 07:43:04'),
(14, 13, 13, 1, '55995.00', 'tst', 'h', 'h', 'h@gmail.com', 'j', 'j', 'j', 'j', 'j', '', 2, 13, 1, '2020-03-14 07:47:45'),
(16, 7, 7, 1, '21000.59', 'j', 'j', 'j', 'j@gmail.com', 'jh', 'j', 'j', 'j', 'kj', '', 0, 7, 1, '2020-03-14 08:02:22'),
(17, 13, 13, 1, '55995.00', 'j', 'j', 'jl', 'llkl@gmail.com', 'll', 'l', 'l', 'll', 'l', 'l', 0, 13, 1, '2020-03-14 08:04:11'),
(18, 12, 12, 1, '23000.00', 'f', 'f', 'f', 'jhj@gmail.com', 'hjhdfjhj', 'hj', 'h', 'jh', 'j', 'hj', 0, 12, 1, '2020-03-14 08:07:59'),
(19, 13, 13, 1, '55995.00', 'h', 'h', 'h', 'hm@gmail.com', 'jkfj', 'kj', 'kj', 'k', 'jk', '', 0, 13, 1, '2020-03-14 08:37:42'),
(20, 17, 17, 2, '275990.00', 'john', 'x', 'doe', 'johndoe@gmail.com', 'laguna', 'calamba', 'canlubang', '123 unknown St.', '09023849328', 'nfda', 0, 17, 32, '2020-04-05 12:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_type` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `profile_img`, `username`, `email`, `password`, `admin_type`, `created_at`) VALUES
(1, '', 'wendell1101', 'wendellchansuazo11@gmail.com', '7090ea6b2165097e2c0db20cc0cc2c48', 1, '2020-03-04 06:38:10'),
(3, '', 'sample', 'sample@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-05 12:29:37'),
(6, '', 'testuser', 'testuser@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2020-03-12 05:16:31'),
(7, '', 'john', 'johndoe@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-12 05:18:04'),
(8, '', 'krisann', 'krisann@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-12 05:33:58'),
(9, '', 'jr', 'jr@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-12 05:50:25'),
(10, '', 'new_user', 'new_user@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-13 05:12:17'),
(12, '', 'test2', 'test2@gmai.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-13 08:05:46'),
(17, '', 'sample1', 'sample1@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-13 08:37:05'),
(18, '', 'sample2', 'sample2@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-13 08:37:25'),
(27, '1584188636_7VwazTJj_400x400.jpg', '1212fds', 'djskjf@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-14 12:23:56'),
(28, '1584188882_asssss.PNG', 'juliatot', 'juliatot@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-14 12:28:02'),
(29, '1584191303_22851814_1177754878990967_7453394853699231544_n.jpg', 'wendell', 'wendellchan1101@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-14 13:08:23'),
(30, '1584447211_superman-pictures-facebook-cover-timeline-banner-for-fb.jpg', 'kara', 'kara@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-17 12:13:31'),
(31, '1585035528_39391975_252972091995635_1226681580731236352_n.jpg', 'samson', 'samson@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-03-24 07:38:48'),
(32, '1586091069_motor1.jpeg', 'testing321', 'testing321@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-04-05 12:51:09'),
(33, '1586092159_motor5.jpeg', '123', '123@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-04-05 13:09:19'),
(34, '1586092185_motor2.jpeg', 'hey', 'hey@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-04-05 13:09:45'),
(35, '1586092242_motor4.jpeg', 'suma', 'suma@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-04-05 13:10:42'),
(36, '1586092266_motor5.jpeg', 'mmm', 'mmm@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2020-04-05 13:11:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_item_name` (`order_item_name`),
  ADD KEY `order_price` (`order_price`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `item_name` FOREIGN KEY (`order_item_name`) REFERENCES `items` (`item_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_price` FOREIGN KEY (`order_price`) REFERENCES `items` (`item_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

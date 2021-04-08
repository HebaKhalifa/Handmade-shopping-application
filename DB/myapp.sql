-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 11:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` int(255) NOT NULL,
  `titles` varchar(50) NOT NULL,
  `content` varchar(150) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `name`, `description`, `price`) VALUES
(2, 'bag', 'test\r\n', 300),
(3, 'scarf', '', 250),
(4, 'bag', 'test\r\n', 3500),
(5, 'scarf', 'uigt7t', 250),
(6, 'scarf', 'uigt7t', 250),
(7, 'bag', 'grey', 280),
(8, 'bag', 'grey', 280),
(9, 'scarf', 'testttttttttt\r\n', 320),
(10, 'bag', 'test\r\n', 300),
(11, 'scarf', 'scarfscarfscarfscarfscarf', 250),
(12, 'scarf', 'scarf  scarf  scarf  scarf  scarf', 250),
(13, 'scarf', 'test', 250),
(14, 'scarf', 'rtgr', 250),
(15, 'dress', 'wfegrthj', 250),
(16, 'scarf', 'gthfg', 45),
(17, 'scarf', 'gfth', 250),
(18, 'scarf', 'gfth', 250),
(19, 'scarf', 'hytjgyj', 250),
(20, 'scarf', 'fb', 250),
(21, 'scarf', 'jytjyj', 500),
(22, 'dress', 'Description test', 320);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `ID` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`ID`, `product_id`, `image`) VALUES
(2, 2, '1617907126Large Swan Princess Wall Decal.jpg'),
(3300, 11, '1617901262ABT080F2ABCED3AD8171A76256BB7CC30A0D59800597366748DA39B03464EE59E31.jpg'),
(3301, 12, '1617901440ABT732718F43B6EC87023319F364F6C4F664266EE15E6E19BEFE078CC1193B38ADD.jpg'),
(3303, 14, '1617907511‘Monogram A Icy Winter Bouquet’ by floralmonogram.jpg'),
(3305, 16, '1617902571ABT6571BB71AA7EA25E8340091BD934C0B6FEE8B3791964AF25D4AF30F4AA1759A9.jpg'),
(3310, 21, '1617912651ABT732718F43B6EC87023319F364F6C4F664266EE15E6E19BEFE078CC1193B38ADD.jpg'),
(3311, 22, '1617913724ABT2AF4F1F624474CBF7D982A389756783C929FA6A4AD3F11A394A4CCA7E3EDD2A6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_rates`
--

CREATE TABLE `product_rates` (
  `ID` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `rate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_rates`
--

INSERT INTO `product_rates` (`ID`, `product_id`, `rate`) VALUES
(1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `ID` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`ID`, `product_id`, `review`) VALUES
(1, 2, 'jhgbtvblutfbukig;yfvkjhvb');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ID` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `deliveryDate` datetime NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `checked` varchar(20) NOT NULL,
  `aborted` varchar(20) NOT NULL,
  `deliveryWay` varchar(255) NOT NULL,
  `deliveryDetails` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `phone` int(20) NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `reservation_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `mail`, `password`, `gender`, `address`, `img`, `phone`, `paymentMethod`, `reservation_id`) VALUES
(7, 'Aya Hamdy', 'ayaKhalifa@gmail.com', '4baf17d59890b22b16f4ab77044c394c', 'Female', 'القاهرة - مصر', '1617833321ABT86DE23E2F254539E677A29AE39AD10589BF48585D50A291DFFAFC1B8DFB5415E.jpg', 0, '', 0),
(8, 'Hend Ali Nasr', 'hend@gmail.com', '4baf17d59890b22b16f4ab77044c394c', 'Female', 'cairo', '1617833296ABT732718F43B6EC87023319F364F6C4F664266EE15E6E19BEFE078CC1193B38ADD.jpg', 0, '', 0),
(9, 'Aliaa Alaa', 'aliaa@gmail.com', '4baf17d59890b22b16f4ab77044c394c', 'Female', 'القاهرة', '1617833279ABTFCBBB1D853F748A307CC13314C574DDFD47E52ACE4F407FFFA08E40C88686193.jpg', 0, '', 0),
(10, 'Esraa Medhat', 'esraa@gmail.com', '4baf17d59890b22b16f4ab77044c394c', 'Female', 'القاهرة', '1617833268ABT970AFD050DEE7C45F27F1F9111593C5CFE7BC83EB0440DE49401F8054754147A.jpg', 0, '', 0),
(13, 'Ali Mohamed ', 'ali@gmail.com', '4baf17d59890b22b16f4ab77044c394c', 'Male', 'cairo', '1617833383ABT374B832FFD5562ED50521BBF6593909DC1970E71D04AE072BE86F68A9B79D87F.jpg', 0, '', 0),
(16, 'Hend  zabady', 'hanouda@gmail.com', 'heba01121558576', 'Female', 'cairo', '1617833224Könnte eine ganze Reihe verschiedener Objekte als Heißluftballons ausführen_ - Young Lady Fashion.jpg', 1145678912, 'yu658.i7u7y', 2),
(17, 'Fatema Khalifa', 'fatma@gmail.com', '4baf17d59890b22b16f4ab77044c394c', 'Female', 'القاهرة', '1617833234ABT2AF4F1F624474CBF7D982A389756783C929FA6A4AD3F11A394A4CCA7E3EDD2A6.jpg', 0, '', 0),
(19, 'Heba Khalifa', 'hebakhalifa@nti.com', '99496a981e5e056665a51ca1aa45a63a', 'Female', 'القاهرة', '1617910969istockphoto-487176644-1024x1024.jpg', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_rates`
--
ALTER TABLE `product_rates`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3312;

--
-- AUTO_INCREMENT for table `product_rates`
--
ALTER TABLE `product_rates`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_rates`
--
ALTER TABLE `product_rates`
  ADD CONSTRAINT `product_rates_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

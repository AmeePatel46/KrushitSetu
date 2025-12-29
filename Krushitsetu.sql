-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2025 at 07:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Krushitsetu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `buyer_id`, `product_id`, `quantity`, `created_at`) VALUES
(1, 1, 1, 1, '2025-12-24 15:48:40'),
(2, 1, 3, 1, '2025-12-24 16:10:37'),
(3, 1, 8, 2, '2025-12-25 14:19:35'),
(4, 10, 141, 15, '2025-12-28 09:56:12'),
(5, 10, 113, 1, '2025-12-28 09:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `seen` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `status` varchar(30) DEFAULT 'Placed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `farmer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp_verification`
--

CREATE TABLE `otp_verification` (
  `email` varchar(100) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp_verification`
--

INSERT INTO `otp_verification` (`email`, `otp`, `expires_at`) VALUES
('cdfrws@', '610793', '2025-12-22 16:42:43'),
('ameepatel5934@gmail.com', '999945', '2025-12-22 16:48:11'),
('ameepatel4612@gmail.com', '782987', '2025-12-23 19:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `farmer_id`, `name`, `category`, `price`, `quantity`, `image`, `created_at`) VALUES
(23, 7, 'apple', 'fruit', 70.00, 100, 'https://images.unsplash.com/photo-1567306226416-28f0efdc88ce?w=600', '2025-12-26 17:24:39'),
(27, 7, 'carrot', 'veg', 60.00, 100, 'https://images.unsplash.com/photo-1589927986089-35812388d1f4?w=600', '2025-12-26 17:26:15'),
(63, 7, 'tomato', 'veg', 25.00, 50, 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-26 18:55:11'),
(65, 7, 'onion', 'veg', 40.00, 10, 'https://images.unsplash.com/photo-1618512496248-a07fe83aa8cb?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8b25pb258ZW58MHx8MHx8fDA%3D', '2025-12-26 19:00:53'),
(67, 7, 'brinjal', 'veg', 30.00, 7, 'https://images.unsplash.com/photo-1730202452902-3b0fa8d96536?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-26 19:01:32'),
(71, 7, 'mango', 'fruit', 80.00, 10, 'https://plus.unsplash.com/premium_photo-1674382739389-338645e7dd8c?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8bWFuZ298ZW58MHx8MHx8fDA%3D', '2025-12-26 19:02:21'),
(73, 7, 'orange', 'veg', 50.00, 10, 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8b3JhbmdlfGVufDB8fDB8fHww', '2025-12-26 19:08:37'),
(75, 7, 'grapes', 'fruit', 70.00, 10, 'https://images.unsplash.com/photo-1632576883732-f131be0be48a?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGdyYXBlc3xlbnwwfHwwfHx8MA%3D%3D', '2025-12-26 19:09:14'),
(79, 7, 'corn', 'veg', 40.00, 10, 'https://images.unsplash.com/photo-1634467524884-897d0af5e104?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y29ybnxlbnwwfHwwfHx8MA%3D%3D', '2025-12-26 19:18:34'),
(85, 7, 'peanut', 'grain', 60.00, 200, 'https://plus.unsplash.com/premium_photo-1726072356924-e29e8999df09?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cGVhbnV0fGVufDB8fDB8fHww', '2025-12-26 19:22:57'),
(87, 8, 'tomato', 'veg', 25.00, 10, 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-28 06:26:24'),
(91, 8, 'orange', 'fruit', 40.00, 10, 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8b3JhbmdlfGVufDB8fDB8fHww', '2025-12-28 06:29:32'),
(97, 8, 'carrot', 'veg', 50.00, 30, 'https://images.unsplash.com/photo-1589927986089-35812388d1f4?w=600', '2025-12-28 06:31:46'),
(99, 8, 'onion', 'veg', 30.00, 20, 'https://images.unsplash.com/photo-1618512496248-a07fe83aa8cb?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8b25pb258ZW58MHx8MHx8fDA%3D', '2025-12-28 06:32:12'),
(101, 8, 'apple', 'veg', 90.00, 5, 'https://images.unsplash.com/photo-1567306226416-28f0efdc88ce?w=600', '2025-12-28 06:32:39'),
(103, 8, 'wheat', 'veg', 40.00, 500, 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8d2hlYXR8ZW58MHx8MHx8fDA%3D', '2025-12-28 06:33:10'),
(109, 8, 'green chili', 'veg', 30.00, 25, 'https://images.unsplash.com/photo-1615860767493-6d04ffeed55e?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzF8fGdyZWVuJTIwY2hpbGl8ZW58MHx8MHx8fDA%3D', '2025-12-28 07:08:29'),
(111, 8, 'mango', 'veg', 80.00, 50, 'https://plus.unsplash.com/premium_photo-1674382739389-338645e7dd8c?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8bWFuZ298ZW58MHx8MHx8fDA%3D', '2025-12-28 07:10:55'),
(113, 9, 'rice', 'veg', 80.00, 500, 'https://images.unsplash.com/photo-1686820740687-426a7b9b2043?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8cmljZXxlbnwwfHwwfHx8MA%3D%3D', '2025-12-28 07:16:36'),
(115, 9, 'banana', 'fruit', 34.00, 50, 'https://images.unsplash.com/photo-1603833665858-e61d17a86224?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8YmFuYW5hfGVufDB8fDB8fHww', '2025-12-28 07:17:17'),
(117, 9, 'peanut', 'grain', 80.00, 150, 'https://plus.unsplash.com/premium_photo-1726072356924-e29e8999df09?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cGVhbnV0fGVufDB8fDB8fHww', '2025-12-28 07:17:45'),
(119, 9, 'corn', 'veg', 20.00, 10, 'https://images.unsplash.com/photo-1634467524884-897d0af5e104?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y29ybnxlbnwwfHwwfHx8MA%3D%3D', '2025-12-28 07:18:20'),
(121, 9, 'grapes', 'fruit', 35.00, 25, 'https://images.unsplash.com/photo-1632576883732-f131be0be48a?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-28 07:19:29'),
(123, 9, 'brinjal', 'veg', 20.00, 20, 'https://images.unsplash.com/photo-1730202452902-3b0fa8d96536?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-28 07:22:51'),
(127, 9, 'onion', 'veg', 30.00, 20, 'https://images.unsplash.com/photo-1618512496248-a07fe83aa8cb?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8b25pb258ZW58MHx8MHx8fDA%3D', '2025-12-28 07:23:36'),
(131, 9, 'potato', 'veg', 30.00, 30, 'https://images.unsplash.com/photo-1518977676601-b53f82aba655?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-28 09:37:01'),
(135, 13, 'tomato', 'veg', 20.00, 10, 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-28 09:45:21'),
(137, 13, 'potato', 'veg', 30.00, 40, 'https://images.unsplash.com/photo-1518977676601-b53f82aba655?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-28 09:45:43'),
(139, 15, 'Tomato', 'veg', 20.00, 20, 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-28 09:48:57'),
(141, 16, 'tomato', 'veg', 20.00, 25, 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-28 09:50:34'),
(143, 16, 'onion', 'veg', 30.00, 30, 'https://images.unsplash.com/photo-1618512496248-a07fe83aa8cb?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8b25pb258ZW58MHx8MHx8fDA%3D', '2025-12-28 09:51:04'),
(145, 17, 'apple', 'fruit', 80.00, 30, 'https://images.unsplash.com/photo-1567306226416-28f0efdc88ce?w=600', '2025-12-28 09:52:25'),
(147, 17, 'orange', 'fruit', 70.00, 20, 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8b3JhbmdlfGVufDB8fDB8fHww', '2025-12-28 09:52:43'),
(149, 9, 'tomato', 'veg', 20.00, 30, 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-28 18:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `farmer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `duration_weeks` int(11) DEFAULT NULL,
  `frequency` enum('weekly','monthly') DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `next_delivery` date DEFAULT NULL,
  `status` enum('active','paused','ended') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('buyer','farmer') NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `flat_no` varchar(50) NOT NULL,
  `area` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `is_organic` tinyint(1) NOT NULL DEFAULT 0,
  `certificate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `contact`, `flat_no`, `area`, `city`, `state`, `pincode`, `is_organic`, `certificate`, `created_at`) VALUES
(8, 'farmer', 'Rameshbhai', 'ameepatel4612@gmail.com', '$2y$10$UpBsFe9DtQO1EoJxanhlhuK/jo0PpfRTozyK57KIh.TUWD0fkDNOC', '1234567890', 'D 504', 'Sarthak Era', 'Gandhinagar', 'Gujarat', '382421', 0, '', '2025-12-28 06:25:22'),
(9, 'farmer', 'Bhikhabhai', 'mittalpatel5934@gmail.com', '$2y$10$G5jOtzmHTfCaI9gRc28wX.KY06j0vtIrLZ4gxQ9LGfc/L93lxg6oW', '9876543210', 'E 303', 'Sundar Van', 'Ahmedabad', 'Gujarat', '380001', 0, '', '2025-12-28 07:15:50'),
(10, 'buyer', 'Savitaben', 'ameepatel5934@gmail.com', '$2y$10$DrTiBkkW/6RjukmjaXSaxOZDB6u6hd28s7xIcvSZG/dvqsr5kD0uy', '1357986420', '', '', '', '', '', 1, '', '2025-12-28 07:29:02'),
(16, 'farmer', 'Prahladbhai', 'ameepatel4712@gmail.com', '$2y$10$fP8UhcR4VTMUNXmcz.LwkuA1J5mzNFXir5owTmtJWmJHNe6fiJ1pe', '9876543210', '', '', 'Adalaj', '', '', 0, '', '2025-12-28 09:50:19'),
(17, 'farmer', 'Ramubhai', 'ameepatel5834@gmail.com', '$2y$10$Mrc2rMjwYRiEBIMUdCe3Ae6gPlkpuEL/Or5IHKD/fRSy8bAHISRdC', '1234567890', '', '', 'Gandhinagar', '', '', 0, '', '2025-12-28 09:51:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 09:28 AM
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
-- Database: `donutalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `price` float(7,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `categories`, `names`, `price`, `quantity`) VALUES
(1, '', 'Chocolate', 10.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Solo'),
(3, 'Half-dozen'),
(6, 'Dozen ');

-- --------------------------------------------------------

--
-- Table structure for table `dozen`
--

CREATE TABLE `dozen` (
  `dozen_id` int(11) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `item_price` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `mobile` varchar(155) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fname`, `lname`, `email`, `message`, `mobile`, `created_at`) VALUES
(7, 'test', 'test1', 'phpflow@gmail.com', 'hello! comment', '123-45-234', '2021-08-25 23:39:55'),
(9, 'phpflow', 'test', 'phpflow@gmail.com', 'Heelo! second entry', '123-45-244', '2021-08-25 23:41:43'),
(10, 'fff', 'bautista', 'testttttt@gmail.com', 'ok', '09785634123', '2023-12-17 16:33:09'),
(11, 'aaaa', 'bautista', 'testttttt@gmail.com', 'ok', '09876543218', '2023-12-17 16:36:41'),
(12, 'madel', 'jandra', 'madelb@gmail.com', 'ok', '09785634124', '2023-12-17 16:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `half-dozen`
--

CREATE TABLE `half-dozen` (
  `half-dozen_id` int(11) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `item_price` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(55) NOT NULL,
  `item_desc` text NOT NULL,
  `item_price` decimal(6,2) NOT NULL,
  `item_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A - Available\r\nU - Unavailable',
  `item_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_desc`, `item_price`, `item_status`, `item_image`) VALUES
(1, 'Chocolate', 'These chocolate mini donuts are deliciously soft and fluffy. Baked not fixed. Made with melted chocolate bar and pancake mixture.', 10.00, 'A', './uploads/68938.jpg'),
(2, 'Matchakit', 'Enjoy these heavenly mini donuts covered with melted matcha chocolate bar on top.', 10.00, 'A', './uploads/820617.jpg'),
(3, 'Strawberry', 'Enjoy these mini donut with real melted strawberry chocolate bar.', 10.00, 'A', './uploads/404587.jpg'),
(4, 'Milk Chocolate', 'Taste and enjoy these gorgeous mini milkchocolate donut made with melted white chocolate coveres on top.', 10.00, 'A', './uploads/37738.jpg'),
(5, 'Ube', 'Taste and enjoy these delightful purple ube mini donut made with melted ube chocolate bar.', 10.00, 'A', './uploads/433245.jpg'),
(6, 'Caramel', 'Our mini caramel donut boast a rich, indulgent flavor with a perfect balance of business.', 10.00, 'A', './uploads/998561.jpg'),
(7, 'Chocoprinkles', 'A delightful mini donut infused with rich chocolate flavor and adored with colorful sprinkles for a sweet and playful treat.', 15.00, 'A', './uploads/498382.jpg'),
(8, 'Matchamond', 'Delight in the perfect bite sized treat a mini donut infused with the rich flavor of matcha, crowned with a delicate almond topping.', 15.00, 'A', './uploads/905979.jpg'),
(9, 'Veryberry', 'These mini donut infused with a burst of melted veryberry flavors and a strawberry on top.', 15.00, 'A', './uploads/548835.jpg'),
(10, 'Milkinuts', 'Delight in the rich indulgence of a mini donut, generously coated with smooth milk chocolate and crowned with a satisfying crunch of nuts.', 15.00, 'A', './uploads/713922.jpg'),
(11, 'Ubecheese', 'Indulge in the unique combination of ube and cheese on top.', 15.00, 'A', './uploads/181498.jpg'),
(12, 'Dalgonut', 'This flavor is our special variant flavor. Enjoy and savor our mini dalgonut beautifully covered with dalgona coffee icing on top.', 15.00, 'A', './uploads/370110.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `reference_number` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_id` varchar(250) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` char(255) NOT NULL DEFAULT 'Cash on Delivery',
  `payment_status` char(11) NOT NULL COMMENT 'C - Completed\r\nI - Incomplete',
  `order_status` char(11) NOT NULL DEFAULT 'D' COMMENT 'P - Pending\r\nD - Delivered',
  `date_ordered` date NOT NULL DEFAULT current_timestamp(),
  `time_ordered` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `reference_number`, `user_id`, `cat_id`, `item_id`, `order_qty`, `total_amount`, `payment_method`, `payment_status`, `order_status`, `date_ordered`, `time_ordered`) VALUES
(1, 'REF00001', 1, 1, '2', 4, 20.00, 'Cash On Delivery', 'C', 'P', '2023-11-10', '14:21:45'),
(2, 'REF00002', 2, 1, '2', 5, 20.00, 'Cash On Delivery', 'C', 'D', '2023-11-10', '14:21:45'),
(3, 'REF00003', 3, 4, '7,8,9,10,11,12', 3, 75.00, 'Cash On Delivery', 'C', 'D', '2023-11-10', '14:21:45'),
(4, 'REF00004', 4, 1, '1', 5, 50.00, 'Cash On Delivery', 'C', 'P', '2023-12-08', '00:00:00'),
(5, 'REF00005', 5, 2, '3', 4, 40.00, 'Cash On Delivery', 'C', 'P', '2023-12-08', '09:42:52'),
(6, '3-0', 3, 4, '7,8,9,10,11,12', 3, 75.00, 'Cash On Delivery', 'C', 'D', '2023-11-10', '14:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `quantity_sold` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `stocks` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `reviews` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solo`
--

CREATE TABLE `solo` (
  `solo_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_date_joined` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_status` char(11) NOT NULL DEFAULT 'A' COMMENT 'A - ACTIVE\r\nB - BANNED\r\nX - DELETED\r\nI - INACTIVE',
  `user_email_address` varchar(255) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `user_contact_number` varchar(12) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_type` char(11) NOT NULL DEFAULT 'U' COMMENT 'U - USER\r\nA - ADMIN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `username`, `password`, `user_date_joined`, `user_status`, `user_email_address`, `user_contact_number`, `user_address`, `user_type`) VALUES
(1, 'Madel Jandra N. Bautista', 'mjnb2121', '2121mjnb', '2023-11-29 04:08:09', 'A', 'madelb@gmail.com', '09123456789', 'Zone 5, Libon, Albay', 'U'),
(2, 'Kristine Zyra Mae Arevalo', 'kzmba1234', '1234kzmba', '2023-11-29 05:49:28', 'A', 'kristinea@gmail.com', '09107364759', 'Camagong, Oas, Albay', 'U'),
(3, 'Althea Lobos', 'arl5678', '5678arl', '2023-11-29 05:52:51', 'A', 'altheal@gmail.com', '9098735261', 'Mayao, Oas, Albay', 'U'),
(4, 'Jem Casurog', 'jnc9012', '9012jnc', '2023-11-29 05:55:24', 'A', 'jemc@gmail.com', '9989442123', 'Cavasi, Ligao, Albay', 'U'),
(5, 'Shaine SanJuan', 'sss3456', '3456sss', '2023-11-29 05:57:24', 'A', 'shaines@gmail.com', '9111145672', 'Sugcad, Polangui, Albay', 'U'),
(6, 'DONUTALK', 'donutalk', 'dunotdunot', '2023-11-29 05:59:29', 'A', 'donutalk2023@gmail.com', '9987654321', 'Polangui, Albay', 'A'),
(7, 'Maria Alayne N. Bautista', 'maria1130', '1130maria', '2023-11-30 04:44:10', 'A', 'mariab@gmail.com', '9558129772', 'Libon, Albay', 'U'),
(8, 'Josh Esc', 'whaaat', '1234', '2023-12-06 05:12:54', 'A', 'test@gmail.com', '1234567890', 'Mars', 'U'),
(9, 'tester', 'test', 'qwerty', '2023-12-06 05:16:15', 'A', 'wert@gmail.com', '987654321', 'moon', 'U'),
(10, 'aaa', 'aaaaaaa', 'aaaaa0', '2023-12-16 10:49:18', 'A', 'aaaaaaaaa@gmail.com', '9876543218', 'libon, albay', 'U'),
(11, 'tryyy', 'againn', 'ssssssss', '2023-12-16 11:14:09', 'A', 'agaaiinnn@gmail.com', '98765432111', 'Libon, Albay', 'U');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `dozen`
--
ALTER TABLE `dozen`
  ADD PRIMARY KEY (`dozen_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `half-dozen`
--
ALTER TABLE `half-dozen`
  ADD PRIMARY KEY (`half-dozen_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `solo`
--
ALTER TABLE `solo`
  ADD PRIMARY KEY (`solo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `dozen`
--
ALTER TABLE `dozen`
  MODIFY `dozen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `half-dozen`
--
ALTER TABLE `half-dozen`
  MODIFY `half-dozen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solo`
--
ALTER TABLE `solo`
  MODIFY `solo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

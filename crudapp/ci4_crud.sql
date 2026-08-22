-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2026 at 07:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `email`, `phone`, `created_at`) VALUES
(2, 'admin', '$2y$10$PpyCoBKf6GaCCPJ1Bw2DLullOx59y0RByh4XC2titBlPD1tzGmqiO', 'Laxmi Pal', 'admin@gmail.com', '1234567890', '2026-06-17 08:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `status`, `created_at`) VALUES
(3, 'All ', 'All.AVIF', 'Active', '2026-06-18 11:43:59'),
(4, 'Women', 'Women.jpeg', 'Active', '2026-06-18 11:44:18'),
(5, 'Men', 'Men.jpeg', 'Active', '2026-06-18 11:44:32'),
(6, 'Kids', 'Baby.jpeg', 'Active', '2026-06-18 11:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT 'Other',
  `date_of_birth` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `country` varchar(100) DEFAULT 'India',
  `status` enum('Active','Blocked') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `phone`, `gender`, `date_of_birth`, `address`, `city`, `state`, `pincode`, `country`, `status`, `created_at`, `updated_at`, `password`) VALUES
(9, 'Reena', 'Pal', 'reena@12gmail.com', '2147483647', 'Female', '2004-11-12', 'ckmaZ MA,SCX KLMZZ <>', 'Mumbai', 'Maharashtra', '420002', 'India', 'Active', '2026-06-20 12:42:03', '2026-06-20 12:42:28', '$2y$10$cQcoA58HpQt36g7vyq3sH.QDxsfzznJhF5tOSfSvdDIgpF1CU3y26'),
(10, 'Laxmi  Rajbahadur', 'Pal', 'laxmirpal04@gmail.com', '2147483647', 'Female', '2004-11-12', 'wdscx jqwkmiozsz', 'Mumbai', 'Maharashtra', '420001', 'India', 'Active', '2026-06-22 11:43:59', '2026-06-24 05:37:44', '$2y$10$Kgr0zER9MH8O5LLnIkIfquE7ncGYv/zoqd3guF/qyRX7h4TNdkDwG'),
(11, 'Neha ', 'Pal', 'neha@12gmail.com', '6666644441', 'Female', '1994-02-06', 'C-302 Vrinadavan Nagar , 2', 'Nashik', 'Maharashtra', '420012', 'India', 'Active', '2026-06-24 07:15:55', '2026-06-27 06:38:27', '$2y$10$Q9XR3UKoXKpScqFmcbcf5ubD4GPvo46MdNMgHyuC2KnOnLcYx0dOy');

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `address_type` varchar(20) NOT NULL DEFAULT 'Home'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `customer_id`, `full_name`, `phone`, `address`, `city`, `state`, `pincode`, `country`, `is_default`, `created_at`, `address_type`) VALUES
(6, 11, 'sakshi monk', '2147483647', 'Roongta Bellisimo ', 'Nashik', 'Maharashtra', '420004', 'India', 0, '2026-06-27 12:24:34', 'Home'),
(7, 11, 'laxmi pal', '6666644441', 'Vridavan Nagar ', 'Saputara ', 'Gujarat ', '394720', 'India', 0, '2026-06-27 12:27:13', 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `invoice_no` varchar(50) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `billing_address_id` int(11) DEFAULT NULL,
  `shipping_address_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `grand_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_method` enum('Cash on Delivery','UPI','Card') NOT NULL,
  `payment_status` enum('Pending','Paid','Failed','Refunded') DEFAULT 'Pending',
  `order_status` enum('Pending','Processing','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tax_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `invoice_no`, `customer_id`, `billing_address_id`, `shipping_address_id`, `total_amount`, `subtotal`, `discount`, `shipping_charge`, `tax`, `grand_total`, `order_date`, `payment_method`, `payment_status`, `order_status`, `created_at`, `tax_type`) VALUES
(151, 'INV20260627122747', 11, 7, 7, 1618.00, 1618.00, 0.00, 0.00, 291.24, 1909.24, '2026-06-27 12:27:47', 'UPI', 'Paid', 'Pending', '2026-06-27 06:57:47', NULL),
(152, 'INV20260627122840', 11, 6, 6, 845.00, 845.00, 0.00, 80.00, 152.10, 1077.10, '2026-06-27 12:28:40', 'UPI', 'Paid', 'Pending', '2026-06-27 06:58:40', NULL),
(153, 'INV20260629050539', 11, 7, 7, 2000.00, 2000.00, 100.00, 0.00, 342.00, 2242.00, '2026-06-29 05:05:39', 'UPI', 'Paid', 'Pending', '2026-06-28 23:35:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `gst` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `price`, `quantity`, `subtotal`, `discount`, `gst`) VALUES
(28, 151, 14, 'Kurta Sets', 809.00, 2, 1618.00, 0.00, 291.24),
(29, 152, 16, 'Tops', 845.00, 1, 845.00, 0.00, 152.10),
(30, 153, 11, 'Shirts', 500.00, 4, 2000.00, 100.00, 342.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `amount` decimal(10,2) NOT NULL,
  `paid_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `transaction_id`, `payment_method`, `payment_status`, `amount`, `paid_at`, `created_at`, `updated_at`) VALUES
(19, 151, 'UPI_1782563269', 'UPI', 'Paid', 1909.24, '2026-06-27 12:27:49', '2026-06-27 06:57:47', '2026-06-27 12:27:49'),
(20, 152, 'UPI_1782563322', 'UPI', 'Paid', 1077.10, '2026-06-27 12:28:42', '2026-06-27 06:58:40', '2026-06-27 12:28:42'),
(21, 153, 'UPI_1782709541', 'UPI', 'Paid', 2242.00, '2026-06-29 05:05:41', '2026-06-28 23:35:39', '2026-06-29 05:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `name`, `price`, `description`, `stock`, `status`, `created_at`, `category`, `category_id`) VALUES
(11, 'shirts.webp', 'Shirts', '₹500', 'Premium cotton shirt with a comfortable fit, perfect for casual and formal occasions.', 50, 'Active', '2026-06-18 11:56:04', 'Men', 5),
(12, 'Shoes.jpeg', 'Shoes', '₹982', 'Comfortable and stylish shoes designed for daily wear with a durable sole.', 100, 'Active', '2026-06-18 11:57:11', 'Men', 5),
(14, 'kurtaset.jpeg', 'Kurta Sets', '₹809', 'Elegant women\'s kurta set made from soft fabric, suitable for festive and casual wear.', 120, 'Active', '2026-06-18 11:59:55', 'Women', 4),
(15, 'menjeans.jpeg', 'Men Jeans', '₹1,299', 'Classic men\'s jeans with a modern slim fit and premium denim fabric.', 700, 'Active', '2026-06-18 12:02:13', 'Men', 5),
(16, 'tops.jpeg', 'Tops', '₹845', 'Trendy women\'s tops made from breathable fabric for everyday comfort.', 600, 'Active', '2026-06-18 12:03:33', 'Women', 4),
(17, 'kids.jpeg', 'Kids Wear', '₹570', 'Comfortable and colorful kids wear designed for all-day play and style.', 40, 'Active', '2026-06-18 12:04:48', 'Kids', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `invoice_no` (`invoice_no`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_payments_order` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

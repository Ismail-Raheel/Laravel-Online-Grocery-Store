-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 07:59 AM
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
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_Id` bigint(20) UNSIGNED NOT NULL,
  `Admin_Name` varchar(255) NOT NULL,
  `Admin_Email` varchar(255) NOT NULL,
  `Admin_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin_Id`, `Admin_Name`, `Admin_Email`, `Admin_Password`) VALUES
(1, 'Ismail', 'Ismail@com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `Cart_Id` bigint(20) UNSIGNED NOT NULL,
  `Product_Id` bigint(20) UNSIGNED NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Product_Qty` int(11) NOT NULL,
  `Product_code` varchar(255) NOT NULL,
  `User_Id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`Cart_Id`, `Product_Id`, `Product_Name`, `Product_Price`, `Product_Qty`, `Product_code`, `User_Id`) VALUES
(31, 1, 'asdsad', 4500, 1, 'sdfsd', 1),
(32, 2, 'sdfsd', 3600, 1, '43434', 1),
(33, 3, 'fsd', 1500, 1, '4343', 1),
(34, 1, 'asdsad', 4500, 1, 'sdfsd', 2),
(35, 2, 'sdfsd', 3600, 4, '43434', 2),
(36, 3, 'fsd', 1500, 1, '4343', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_ID` bigint(20) UNSIGNED NOT NULL,
  `Category_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_ID`, `Category_Name`) VALUES
(1, 'Arsal'),
(2, 'Ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_11_30_073854_create_categories_table', 1),
(3, '2023_11_30_074035_create_products_table', 1),
(4, '2023_12_01_055813_create_admins_table', 1),
(5, '2023_12_05_100814_create_users_table', 1),
(6, '2023_12_07_094545_create_carts_table', 1),
(7, '2023_12_07_095152_create_table_orders', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` bigint(20) UNSIGNED NOT NULL,
  `User_Name` varchar(255) DEFAULT NULL,
  `User_Number` varchar(255) DEFAULT NULL,
  `User_Email` varchar(255) DEFAULT NULL,
  `Payment_Mothod` varchar(255) DEFAULT NULL,
  `Flat` varchar(255) DEFAULT NULL,
  `Street` varchar(255) DEFAULT '0',
  `City` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Pin_code` int(11) DEFAULT 0,
  `Total_products` varchar(255) DEFAULT NULL,
  `Total_price` varchar(255) DEFAULT NULL,
  `User_Id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `User_Name`, `User_Number`, `User_Email`, `Payment_Mothod`, `Flat`, `Street`, `City`, `State`, `Country`, `Pin_code`, `Total_products`, `Total_price`, `User_Id`, `created_at`, `updated_at`) VALUES
(9, 'Ismail', '0319246343', 'ismailarain@123', 'cash on delivery', 'adasd', 'asdasd', 'asdas', 'asd', 'Pakistan', 232, '(asdsad:1), (sdfsd:1), (fsd:1)', '10100', 1, '2023-12-07 15:05:01', '2023-12-07 15:05:01'),
(10, 'Arsal', '0334956544', 'Arsal@123', 'cash on delivery', 'Karachi', 'Karachi', 'Karachi', 'Karachi', 'Pakistan', 222, '(asdsad:1), (sdfsd:4), (fsd:1)', '20900', 2, '2023-12-07 15:06:38', '2023-12-07 15:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_Id` bigint(20) UNSIGNED NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Product_Qty` int(11) NOT NULL,
  `Product_Image` varchar(255) DEFAULT NULL,
  `Product_Des` text NOT NULL,
  `Discount_Price` int(11) DEFAULT 0,
  `Discount_Date` datetime DEFAULT NULL,
  `Product_code` varchar(255) NOT NULL,
  `Category_Id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Id`, `Product_Name`, `Product_Price`, `Product_Qty`, `Product_Image`, `Product_Des`, `Discount_Price`, `Discount_Date`, `Product_code`, `Category_Id`) VALUES
(1, 'asdsad', 4500, 450, '1701946530-Grocery.jpg', 'sdf', NULL, NULL, 'sdfsd', 2),
(2, 'sdfsd', 3600, 450, '1701946544-Grocery.jpg', 'sdfsdf', NULL, NULL, '43434', 1),
(3, 'fsd', 1500, 450, '1701946561-Grocery.jpg', 'fsdfsdf', NULL, NULL, '4343', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` bigint(20) UNSIGNED NOT NULL,
  `User_Name` varchar(255) DEFAULT NULL,
  `User_Email` varchar(100) DEFAULT NULL,
  `User_Password` varchar(255) DEFAULT NULL,
  `User_Gender` enum('M','F','O') DEFAULT NULL,
  `User_DOB` date NOT NULL,
  `User_Status` tinyint(1) NOT NULL DEFAULT 1,
  `User_Pointes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `User_Name`, `User_Email`, `User_Password`, `User_Gender`, `User_DOB`, `User_Status`, `User_Pointes`, `created_at`, `updated_at`) VALUES
(1, 'Ismail', 'ismailarain@123', '111', 'F', '2023-12-21', 1, 0, '2023-12-07 05:21:02', '2023-12-07 05:21:02'),
(2, 'Arsal', 'Ismail@123', '111', 'M', '2023-12-22', 1, 0, '2023-12-07 05:54:10', '2023-12-07 05:54:10'),
(3, 'Raheel', 'asda@31', '111', 'F', '2023-12-28', 1, 0, '2023-12-07 08:43:47', '2023-12-07 08:43:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`Cart_Id`),
  ADD KEY `carts_user_id_foreign` (`User_Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`),
  ADD KEY `orders_user_id_foreign` (`User_Id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_Id`),
  ADD KEY `products_category_id_foreign` (`Category_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `users_user_email_unique` (`User_Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Admin_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `Cart_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`Category_Id`) REFERENCES `categories` (`Category_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

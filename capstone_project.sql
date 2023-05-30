-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 08:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `balancesheets`
--

CREATE TABLE `balancesheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `transaction_name` varchar(255) NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balancesheets`
--

INSERT INTO `balancesheets` (`id`, `transaction_id`, `user_id`, `transaction_type`, `transaction_name`, `product_price`, `created_at`, `updated_at`) VALUES
(24, 1685345589, 3, 'Debit', 'Sale', 2860000, '2023-03-01 00:33:09', '2023-03-01 00:33:09'),
(25, 1685345624, 2, 'Debit', 'Sale', 2310000, '2023-03-01 00:33:44', '2023-03-01 00:33:44'),
(30, 1685357996, 1, 'Credit', 'Rent Payment', 56000, '2023-04-01 03:59:56', '2023-04-01 03:59:56'),
(31, 1685358521, 3, 'Debit', 'Sale', 550000, '2023-04-01 04:08:41', '2023-04-01 04:08:41'),
(33, 1685379813, 1, 'Credit', 'Initial Capital', 12000000, '2023-05-29 10:03:33', '2023-05-29 10:03:33'),
(34, 1685381215, 1, 'Credit', 'Purchase', 13000, '2023-05-29 10:26:55', '2023-05-29 10:26:55'),
(35, 1685381706, 1, 'Debit', 'Sale', 15000000, '2023-05-29 17:35:06', '2023-05-29 17:35:06'),
(36, 1685382008, 1, 'Credit', 'Purchase', 70000, '2023-06-01 10:40:08', '2023-06-01 10:40:08'),
(38, 1685382806, 1, 'Credit', 'Sale', 12000, '2023-06-01 10:53:26', '2023-06-01 10:53:26'),
(39, 1685428326, 4, 'Credit', 'Rent Payment', 74000, '2023-05-29 23:32:06', '2023-05-29 23:32:06'),
(40, 1685428653, 3, 'Debit', 'Sale', 1320000, '2023-05-29 23:37:33', '2023-05-29 23:37:33'),
(41, 1685428731, 9, 'Debit', 'Sale', 2200000, '2023-05-29 23:38:51', '2023-05-29 23:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_picture` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `product_price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `product_category`, `created_at`, `updated_at`) VALUES
(1, 'Food', '2023-04-09 23:42:54', '2023-04-09 23:42:54'),
(2, 'Beverages', '2023-04-13 08:01:44', '2023-04-13 08:01:44'),
(3, 'Medicine', '2023-05-09 06:12:21', '2023-05-09 06:13:24'),
(4, 'Bags', '2023-05-09 06:12:48', '2023-05-09 06:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2023_04_06_043251_userlist', 1),
(15, '2023_04_10_060004_products', 2),
(16, '2023_04_10_060041_categories', 2),
(17, '2023_04_10_060206_add_category_id_to_products', 3),
(21, '2023_04_11_061533_carts', 4),
(24, '2023_04_11_065016_carts', 5),
(27, '2023_04_11_100145_transactions', 6),
(33, '2023_05_09_130434_products', 7),
(34, '2023_05_09_130504_add_category_id_to_products', 7),
(35, '2023_05_22_053426_balancesheets', 8),
(36, '2023_05_22_100252_balancesheets', 9),
(38, '2023_05_22_102056_balancesheets', 10),
(39, '2023_05_30_040738_add_picture_to_userlist', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('fanomulyadi@gmail.com', '$2y$10$3HJ7KRr7ZBb/S0ZsHhZZTeOBAjO7TdUeGS1spLvS4DjKm2XZV9q6m', '2023-05-29 01:30:43'),
('Yoel@gmail.com', '$2y$10$mBRq3uapEkc6V9WyGaxGuORzO48o0eqmF9qXJ05wOYgVRnZkQDgpC', '2023-05-29 01:22:56');

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
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_stock` bigint(20) NOT NULL,
  `product_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_stock`, `product_picture`, `created_at`, `updated_at`, `category_id`) VALUES
(11111, 'Pad Thai', 300000, 60, '1684734143.jpg', '2023-05-21 22:42:23', '2023-05-29 23:36:47', 1),
(11112, 'Thai Style Beef with Basil & Chillies', 500000, 74, '1684734165.jpg', '2023-05-21 22:42:45', '2023-05-29 23:37:15', 1),
(11113, 'Thai Pandan Chicken', 200000, 81, '1684734212.jpg', '2023-05-21 22:43:32', '2023-05-29 23:37:00', 1),
(21111, 'Mint Julep', 700000, 87, '1684734237.jpg', '2023-05-21 22:43:57', '2023-05-29 23:35:26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_picture` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `transaction_status` varchar(255) NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `user_id`, `product_id`, `product_name`, `product_picture`, `quantity`, `transaction_status`, `product_price`, `created_at`, `updated_at`) VALUES
(64, 1685345589, 3, 11111, 'Pad Thai', '1684734143.jpg', 4, 'Paid', 300000, NULL, NULL),
(65, 1685345589, 3, 11112, 'Thai Style Beef with Basil & Chillies', '1684734165.jpg', 1, 'Paid', 500000, NULL, NULL),
(66, 1685345589, 3, 11113, 'Thai Pandan Chicken', '1684734212.jpg', 1, 'Paid', 200000, NULL, NULL),
(67, 1685345589, 3, 21111, 'Mint Julep', '1684734237.jpg', 1, 'Paid', 700000, NULL, NULL),
(68, 1685345624, 2, 11111, 'Pad Thai', '1684734143.jpg', 1, 'Paid', 300000, NULL, NULL),
(69, 1685345624, 2, 11113, 'Thai Pandan Chicken', '1684734212.jpg', 2, 'Paid', 200000, NULL, NULL),
(70, 1685345624, 2, 21111, 'Mint Julep', '1684734237.jpg', 2, 'Paid', 700000, NULL, NULL),
(72, 1685358521, 3, 11112, 'Thai Style Beef with Basil & Chillies', '1684734165.jpg', 1, 'Paid', 500000, NULL, NULL),
(73, 1685428653, 3, 11111, 'Pad Thai', '1684734143.jpg', 2, 'Paid', 300000, NULL, NULL),
(74, 1685428653, 3, 11113, 'Thai Pandan Chicken', '1684734212.jpg', 3, 'Paid', 200000, NULL, NULL),
(75, 1685428731, 9, 11111, 'Pad Thai', '1684734143.jpg', 1, 'Paid', 300000, NULL, NULL),
(76, 1685428731, 9, 11112, 'Thai Style Beef with Basil & Chillies', '1684734165.jpg', 3, 'Paid', 500000, NULL, NULL),
(77, 1685428731, 9, 11113, 'Thai Pandan Chicken', '1684734212.jpg', 1, 'Paid', 200000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_rights` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`id`, `username`, `email`, `password`, `access_rights`, `status`, `created_at`, `updated_at`, `picture`) VALUES
(1, 'Fano', 'fanomulyadi@gmail.com', '$2y$10$dEdQ7Cx7zOkSJtlYHZKFPOuJV7TPrsytlsujKLRKGFVNzmvwhZZ86', 'Merchant', 'inactive', '2023-04-05 21:56:58', '2023-05-29 23:47:18', 'Sennheiser Logo.jpg'),
(2, 'Yoel', 'Yoel@gmail.com', '$2y$10$rxjGeAqshsHCCM2jLk397OVhrPIdwV6dRDcjSr4dJxbb8aQwUKBdi', 'User', 'inactive', '2023-04-05 21:57:58', '2023-05-29 22:26:31', 'Arya Wiguna KW.png'),
(3, 'User1', 'User1@gmail.com', '$2y$10$jGjjshLHaAgwE.HIGBpVeOOCemt/yw2zFkBs5DHaK8xJw3RGfHJJi', 'User', 'inactive', '2023-04-10 23:40:01', '2023-05-29 23:47:46', 'Bowers & Wilkins Logo.jpg'),
(4, '123', '123@gmail.com', '$2y$10$QPFIgt0PIlQprm4MaH8S9.jlg3/wCCu.SnYqzlrPklkfIqP.oDkCy', 'Merchant', 'inactive', '2023-04-13 08:19:38', '2023-05-29 23:32:28', 'Shure Logo.jpg'),
(8, '312', '312@gmail.com', '$2y$10$BGFvPdtSWMATIs4OTVW3aODanUiECDkAchUs.vaGHsTRVJi0L1xCS', 'Merchant', 'inactive', '2023-05-29 22:55:54', '2023-05-29 22:56:19', '1685426154_Beats By Dre Logo.jpg'),
(9, '2017', '2017@gmail.com', '$2y$10$qb5CbZ1Z1eNuPdC56ZJDR.JTzWQgfbOCikLEO6dg5hlyyUg3879bG', 'User', 'inactive', '2023-05-29 23:33:31', '2023-05-29 23:46:25', 'DWP 2017.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balancesheets`
--
ALTER TABLE `balancesheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balancesheets`
--
ALTER TABLE `balancesheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

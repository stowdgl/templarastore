-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 12:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Smartphones', 1, '2019-03-26 16:44:00', '2019-03-26 16:44:00'),
(3, 'Notebooks', NULL, NULL, NULL),
(5, 'Smart-watches', NULL, '2019-04-08 04:51:30', '2019-04-08 04:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories_products`
--

CREATE TABLE `categories_products` (
  `products_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_products`
--

INSERT INTO `categories_products` (`products_id`, `categories_id`) VALUES
(1, 1),
(106, 3),
(107, 1),
(109, 1),
(110, 3),
(111, 1),
(112, 5),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_26_160414_products', 2),
(4, '2019_03_26_160450_categories', 2),
(5, '2019_03_26_162407_prices', 2),
(6, '2019_04_03_115241_orders', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentmeth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` enum('Ожидает обработки','Обработан','Отменён') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'Ожидает обработки',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fio`, `email`, `city`, `phone`, `npo`, `paymentmeth`, `order_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Артеменко Андрей Ростиславович', 'dfsgds@aswdfa', 'St. Cloud', '7643333578', '27', 'Наложеный платеж', 'Обработан', NULL, '2019-04-09 12:34:04', '2019-04-10 05:54:52'),
(2, 'Хивренко Глеб Александрович', 'ertyrety@dghdhg', 'St. Cloud', '7643333578', '3', 'Наложеный платеж', 'Ожидает обработки', NULL, '2019-04-10 07:06:35', '2019-04-10 07:06:35'),
(3, 'Хивренко Глеб Александрович', 'gsfdgklsndfk@kljgnljsf', 'St. Cloud', '7643333578', '3', 'Безналичный расчет', 'Ожидает обработки', NULL, '2019-04-10 07:33:56', '2019-04-10 07:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `products_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`products_id`, `orders_id`) VALUES
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(112, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(111, 1),
(112, 2),
(111, 3);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '1000', 1, '2019-03-26 16:44:00', '2019-03-26 16:44:00'),
(4, '250', 105, NULL, NULL),
(6, '1300', 109, '2019-04-08 02:56:59', '2019-04-08 02:56:59'),
(7, '1445', 110, '2019-04-08 04:30:11', '2019-04-08 04:30:11'),
(8, '160', 111, '2019-04-08 04:40:41', '2019-04-08 04:40:41'),
(11, '37', 112, '2019-04-08 09:14:15', '2019-04-08 09:14:15'),
(12, '803', 4, '2019-04-08 10:18:00', '2019-04-08 10:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `prices_products`
--

CREATE TABLE `prices_products` (
  `products_id` int(11) NOT NULL,
  `prices_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prices_products`
--

INSERT INTO `prices_products` (`products_id`, `prices_id`) VALUES
(1, 1),
(109, 6),
(110, 7),
(111, 8),
(112, 11),
(4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specifications` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_img` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'default.jpg',
  `product_img` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'img/a.jpg',
  `items_available` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `code`, `specifications`, `manufacturer`, `manufacturer_img`, `product_img`, `items_available`, `created_at`, `updated_at`) VALUES
(1, 'Samsung S10+', 'SM-G975F', '{\"screen\":\"6.5\"}', 'Samsung', '/img/samsung.jpg', 'img/ss10+.jpg', 10, '2019-03-26 16:40:00', '2019-03-26 16:40:00'),
(4, 'Samsung Note 9', 'N960F', '{\"screen\":\"6.4\",\"resolution\":\"2960x1440\"}', 'Samsung', '/img/samsung.jpg', '/img/note9.jpg', 100, NULL, '2019-04-08 10:18:00'),
(109, 'Huawei P30 Pro', 'P30Pro', '{\"screen\":\"7.0\"}', 'Huawei', '/img/huawei.png', '/img/1.png', 11, '2019-04-08 02:56:59', '2019-04-08 02:56:59'),
(110, 'Apple New Macbook Air MREE2UA/A Gold', 'MREE2UA/A', '{\"screen\":\"13.3\",\"resolution\":\"2560x1600\"}', 'Apple', '/img/apple.jpg', '/img/apple.jpg', 11, '2019-04-08 04:30:11', '2019-04-08 04:30:11'),
(111, 'Samsung J415F Galaxy J4+ Black', 'J415F', '{\"screen\":\"6.0\",\"resolution\":\"1480х720\"}', 'Samsung', '/img/samsung.jpg', '/img/samsung_galaxy_j6_plus.jpg', 247, '2019-04-08 04:40:40', '2019-04-10 05:54:51'),
(112, 'Смарт-часы Samsung Galaxy Watch (46 mm) Silver', 'SM-R800NZSASER', '{\"screen\":\"1.3\",\"resolution\":\"360 x 360\"}', 'Samsung', '/img/samsung.jpg', '/img/samsung_sm_r800.jpg', 170, '2019-04-08 09:14:15', '2019-04-10 05:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `birthday` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `gender`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `user_type`, `birthday`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'male', 'Gleb', 'Khivrenko', 'gleb.khivrenko@gmail.com', NULL, '$2y$10$W4oOeXZkMd/bYAmqDgjI6..EI8VlMNmwqeL9yWZIurTW50eaVk1Pu', 'admin', '2000-03-14', NULL, '2019-03-26 13:30:19', '2019-03-26 13:30:19'),
(2, 'male', 'Andrey', 'Artemenko', 'artemenkoandrey2000@gmail.com', NULL, '$2y$10$h4cWipp2IgagGeqfT3e5K.4dlRKvJ7U2FyatzHfc0JxRKwFeU50v6', 'user', '2000-04-21', NULL, '2019-03-27 08:18:47', '2019-03-27 08:18:47'),
(3, 'female', 'Anastasia', 'Lukyanenko', 'aluk@gmail.com', NULL, '$2y$10$tggh1hGIPOhP.L4Ju0yPwOQuFS.yoRJ7DU3yQNguofxQtoQaJUxbG', 'user', '1948-05-02', NULL, '2019-03-27 08:19:38', '2019-03-27 08:19:38'),
(4, 'female', 'Anastasia', 'Lukyanenko', 'aluk@gmail.com', NULL, '$2y$10$SKRDvZyaZJ.UHIAy8.ZGSOS7rQEsBGHB/UvGlfgviAU8fLKwYzGpK', 'user', '2000-03-14', NULL, '2019-03-27 08:20:42', '2019-03-27 08:20:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: nomagenta
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Smartphones',1,'2019-03-26 16:44:00','2019-03-26 16:44:00'),(3,'Notebooks',NULL,NULL,NULL),(5,'Smart-watches',NULL,'2019-04-08 04:51:30','2019-04-08 04:51:30');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_products`
--

DROP TABLE IF EXISTS `categories_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_products` (
  `products_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_products`
--

LOCK TABLES `categories_products` WRITE;
/*!40000 ALTER TABLE `categories_products` DISABLE KEYS */;
INSERT INTO `categories_products` VALUES (1,1),(106,3),(107,1),(109,1),(110,3),(111,1),(112,5),(4,1);
/*!40000 ALTER TABLE `categories_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_03_26_160414_products',2),(4,'2019_03_26_160450_categories',2),(5,'2019_03_26_162407_prices',2),(6,'2019_04_03_115241_orders',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentmeth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'Хивренко Глеб Александрович','hivrenkogleb@gmail.com','Харьков','+380992270031','8','Наличными',NULL,'2019-04-03 10:11:36','2019-04-03 10:11:36'),(2,'Артеменко Андрей Ростиславович','artemenkoandrey2000@gmail.com','Полтава','+380992270031','8','Наличными',NULL,'2019-04-03 10:12:37','2019-04-03 10:12:37'),(3,'gsdfgsdfg','ertyrety@dghdhg','sdfgsdfg','7643333578','3','Наличными',NULL,'2019-04-03 10:36:14','2019-04-03 10:36:14'),(4,'Хивренко Глеб Александрович','dfsgds@aswdfa','asdfadsf','2354234','8','Наличными',NULL,'2019-04-03 12:59:30','2019-04-03 12:59:30');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_products`
--

DROP TABLE IF EXISTS `orders_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_products` (
  `products_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_products`
--

LOCK TABLES `orders_products` WRITE;
/*!40000 ALTER TABLE `orders_products` DISABLE KEYS */;
INSERT INTO `orders_products` VALUES (4,1),(1,1),(105,1),(1,2),(105,3),(1,4),(4,4);
/*!40000 ALTER TABLE `orders_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prices`
--

DROP TABLE IF EXISTS `prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prices`
--

LOCK TABLES `prices` WRITE;
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
INSERT INTO `prices` VALUES (1,'1000',1,'2019-03-26 16:44:00','2019-03-26 16:44:00'),(3,'800',4,NULL,NULL),(4,'250',105,NULL,NULL),(6,'1300',109,'2019-04-08 02:56:59','2019-04-08 02:56:59'),(7,'1445',110,'2019-04-08 04:30:11','2019-04-08 04:30:11'),(8,'160',111,'2019-04-08 04:40:41','2019-04-08 04:40:41'),(11,'37',112,'2019-04-08 09:14:15','2019-04-08 09:14:15'),(12,'803',4,'2019-04-08 10:18:00','2019-04-08 10:18:00');
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prices_products`
--

DROP TABLE IF EXISTS `prices_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prices_products` (
  `products_id` int(11) NOT NULL,
  `prices_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prices_products`
--

LOCK TABLES `prices_products` WRITE;
/*!40000 ALTER TABLE `prices_products` DISABLE KEYS */;
INSERT INTO `prices_products` VALUES (1,1),(109,6),(110,7),(111,8),(112,11),(4,12);
/*!40000 ALTER TABLE `prices_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specifications` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_img` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'default.jpg',
  `product_img` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'img/a.jpg',
  `items_available` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Samsung S10+','SM-G975F','{\"screen\":\"6.5\"}','Samsung','/img/samsung.jpg','img/ss10+.jpg',10,'2019-03-26 16:40:00','2019-03-26 16:40:00'),(4,'Samsung Note 9','N960F','{\"screen\":\"6.4\",\"resolution\":\"2960x1440\"}','Samsung','/img/samsung.jpg','/img/note9.jpg',100,NULL,'2019-04-08 10:18:00'),(109,'Huawei P30 Pro','P30Pro','{\"screen\":\"7.0\"}','Huawei','/img/huawei.png','/img/1.png',11,'2019-04-08 02:56:59','2019-04-08 02:56:59'),(110,'Apple New Macbook Air MREE2UA/A Gold','MREE2UA/A','{\"screen\":\"13.3\",\"resolution\":\"2560x1600\"}','Apple','/img/apple.jpg','/img/apple.jpg',11,'2019-04-08 04:30:11','2019-04-08 04:30:11'),(111,'Samsung J415F Galaxy J4+ Black','J415F','{\"screen\":\"6.0\",\"resolution\":\"1480х720\"}','Samsung','/img/samsung.jpg','/img/samsung_galaxy_j6_plus.jpg',304,'2019-04-08 04:40:40','2019-04-08 04:40:40'),(112,'Смарт-часы Samsung Galaxy Watch (46 mm) Silver','SM-R800NZSASER','{\"screen\":\"1.3\",\"resolution\":\"360 x 360\"}','Samsung','/img/samsung.jpg','/img/samsung_sm_r800.jpg',186,'2019-04-08 09:14:15','2019-04-08 09:14:15');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'male','Gleb','Khivrenko','gleb.khivrenko@gmail.com',NULL,'$2y$10$W4oOeXZkMd/bYAmqDgjI6..EI8VlMNmwqeL9yWZIurTW50eaVk1Pu','admin','2000-03-14',NULL,'2019-03-26 13:30:19','2019-03-26 13:30:19'),(2,'male','Andrey','Artemenko','artemenkoandrey2000@gmail.com',NULL,'$2y$10$h4cWipp2IgagGeqfT3e5K.4dlRKvJ7U2FyatzHfc0JxRKwFeU50v6','user','2000-04-21',NULL,'2019-03-27 08:18:47','2019-03-27 08:18:47'),(3,'female','Anastasia','Lukyanenko','aluk@gmail.com',NULL,'$2y$10$tggh1hGIPOhP.L4Ju0yPwOQuFS.yoRJ7DU3yQNguofxQtoQaJUxbG','user','1948-05-02',NULL,'2019-03-27 08:19:38','2019-03-27 08:19:38'),(4,'female','Anastasia','Lukyanenko','aluk@gmail.com',NULL,'$2y$10$SKRDvZyaZJ.UHIAy8.ZGSOS7rQEsBGHB/UvGlfgviAU8fLKwYzGpK','user','2000-03-14',NULL,'2019-03-27 08:20:42','2019-03-27 08:20:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-09 12:29:29

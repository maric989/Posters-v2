-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: PostersV2
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comm_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,3,1,'asdasdasdasd','2019-07-03 15:20:26','2019-07-03 15:20:26','App\\Poster'),(2,3,1,'zxczxczxczxc','2019-07-03 15:21:30','2019-07-03 15:21:30','App\\Poster');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `definitions`
--

DROP TABLE IF EXISTS `definitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `definitions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `definitions_user_id_foreign` (`user_id`),
  CONSTRAINT `definitions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `definitions`
--

LOCK TABLES `definitions` WRITE;
/*!40000 ALTER TABLE `definitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `definitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `likeable_id` int(11) NOT NULL,
  `up` int(11) NOT NULL,
  `down` int(11) NOT NULL,
  `likeable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (3,2,4,50,0,'App\\Poster','2019-07-27 08:17:36','2019-07-27 08:17:36'),(72,1,3,1,0,'App\\Poster','2019-07-27 10:00:22','2019-07-27 10:00:22'),(75,1,2,1,0,'App\\Poster','2019-07-27 10:02:22','2019-07-27 10:02:22'),(77,1,4,1,0,'App\\Poster','2019-07-27 10:09:22','2019-07-27 10:09:22');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_11_12_101424_create_roles_table',1),(4,'2018_11_12_145031_create_posters_table',1),(5,'2018_11_12_145042_create_definitions_table',1),(6,'2018_11_12_231100_add_slug_posters',1),(7,'2018_11_14_094534_create_comments_table',1),(8,'2018_11_14_101804_add_comment_field',1),(9,'2018_11_14_102814_create_tags_table',1),(10,'2018_11_14_105536_tags_posts_table',1),(11,'2018_11_14_130802_create_likes_table',1),(12,'2018_11_15_114952_add_users_slug',1),(13,'2018_11_16_105311_add_definition_slug',1),(14,'2018_12_03_133936_add_user_image',1),(15,'2018_12_03_134144_add_user_cover_image',1),(16,'2019_05_17_100957_create_categories_table',1),(17,'2019_05_17_102426_create_post_categories_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_categories`
--

LOCK TABLES `post_categories` WRITE;
/*!40000 ALTER TABLE `post_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posters`
--

DROP TABLE IF EXISTS `posters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `image` blob NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posters_user_id_foreign` (`user_id`),
  CONSTRAINT `posters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posters`
--

LOCK TABLES `posters` WRITE;
/*!40000 ALTER TABLE `posters` DISABLE KEYS */;
INSERT INTO `posters` VALUES (1,'Prvi oister',1,_binary '/images/2019-07-02 11:22:05.png',1,'2019-07-02 09:22:05','2019-07-02 09:22:18','prvi-oister'),(2,'Test',1,_binary '/images/2019-07-03 14:33:37.jpg',1,'2019-07-03 12:33:37','2019-07-03 12:33:56','test'),(3,'Title',1,_binary '/images/2019-07-03 17:19:53.png',1,'2019-07-03 15:19:53','2019-07-03 15:20:08','title'),(4,'asdasdasd',2,_binary '/images/2019-07-03 17:41:27.jpg',1,'2019-07-03 15:41:27','2019-07-03 15:41:27','asdasdasd');
/*!40000 ALTER TABLE `posters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',NULL,NULL),(2,'Creator',NULL,NULL),(3,'Guest',NULL,NULL),(4,'Admin',NULL,NULL),(5,'Creator',NULL,NULL),(6,'Guest',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'code','2019-07-02 09:22:05','2019-07-02 09:22:05'),(2,'php','2019-07-02 09:22:05','2019-07-02 09:22:05'),(3,'ahaha','2019-07-03 12:33:37','2019-07-03 12:33:37'),(4,'wow','2019-07-03 12:33:37','2019-07-03 12:33:37'),(5,'asdasd','2019-07-03 15:19:53','2019-07-03 15:19:53'),(6,'asdasdsss','2019-07-03 15:19:53','2019-07-03 15:19:53'),(7,'axxcxcx','2019-07-03 15:19:53','2019-07-03 15:19:53');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags_posts`
--

DROP TABLE IF EXISTS `tags_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags_posts`
--

LOCK TABLES `tags_posts` WRITE;
/*!40000 ALTER TABLE `tags_posts` DISABLE KEYS */;
INSERT INTO `tags_posts` VALUES (1,1,1,'App\\Poster',NULL,NULL),(2,2,1,'App\\Poster',NULL,NULL),(3,3,2,'App\\Poster',NULL,NULL),(4,4,2,'App\\Poster',NULL,NULL),(5,5,3,'App\\Poster',NULL,NULL),(6,6,3,'App\\Poster',NULL,NULL),(7,7,3,'App\\Poster',NULL,NULL),(8,2,4,'App\\Poster',NULL,NULL);
/*!40000 ALTER TABLE `tags_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` blob,
  `cover_photo` blob,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_index` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin',1,'admin@maric.com',NULL,'$2y$10$JkkKjyKRqypECQTgPyeHLOs8xppXu5D3oLs6JuZyVHpwIZAOj1gDa','3QlSXzbtRo0h3zI6ken5leZLbXbAQBNTqG2HMTEbhXzMcRPVIRb4BXsJwfXr','2019-07-03 13:02:46','2019-07-27 08:23:10','admin',NULL,NULL),(2,'umetnik',2,'umetnik@maric.com',NULL,'$2y$10$UIujsAR46L00hKPJB.ntqesZc5OLtbSVn.rBLOvBAcRym65HrnFjG',NULL,'2019-07-03 13:02:46','2019-07-03 13:02:46','umetnik',NULL,NULL),(3,'umetnik2',2,'umetnik2@maric.com',NULL,'$2y$10$u3GNuawlxdk/g1QZVa6B9.AMykIkSa7j4U2MJ4rnf4zvtVNwBC8nm',NULL,'2019-07-03 13:02:46','2019-07-03 13:02:46','umetnik2',NULL,NULL),(5,'umetnik3',2,'umetnik3@maric.com',NULL,'$2y$10$uN2j.wEvSRFGdMrjc26IFurI0LXhPtRkdDtlwABT4o1jlp8QhedoK',NULL,'2019-07-03 13:02:46','2019-07-03 13:02:46','umetnik3',NULL,NULL),(6,'umetnik4',2,'umetnik4@maric.com',NULL,'$2y$10$/Bpt1IaFvwAFVPMP0qm4sOSN3WZhdv5Lia3szIU87Ax9LWU8Wh/dO',NULL,'2019-07-03 13:02:46','2019-07-03 13:02:46','umetnik4',NULL,NULL),(7,'umetnik5',2,'umetnik5@maric.com',NULL,'$2y$10$D4ovUJnVymOHj7oAgZCWLOz67sdatdsbLl7/mqjHRdkAH0Bhj8f3a',NULL,'2019-07-03 13:02:46','2019-07-03 13:02:46','umetnik5',NULL,NULL),(8,'umetnik6',2,'umetnik6@maric.com',NULL,'$2y$10$J69DYoyP.xuloNzAX/BuSOZClxsxkpdkiqYiEqrg/dyEMfhWJIH1G',NULL,'2019-07-03 13:02:46','2019-07-03 13:02:46','umetnik6',NULL,NULL),(9,'umetnik7',2,'umetnik7@maric.com',NULL,'$2y$10$T47Qeb0737dFD9juI6h9iugzs3EJu1EKhH8jHAGr6kWqIDm/sVv4C',NULL,'2019-07-03 13:02:46','2019-07-03 13:02:46','umetnik7',NULL,NULL),(10,'umetnik8',2,'umetnik8@maric.com',NULL,'$2y$10$EdobCWxQXI45GZd2/RykA.bCP0Yub6QLZRpy.jK5qyQwC2yo6iS9K',NULL,'2019-07-03 13:02:46','2019-07-03 13:02:46','umetnik8',NULL,NULL),(11,'umetnik9',2,'umetnik9@maric.com',NULL,'$2y$10$BkLOqOT76IJPxgJMDxliDOGHpHNeT3Eg6u//dlY8FYkyDNln6VQTK',NULL,'2019-07-03 13:02:46','2019-07-03 13:02:46','umetnik9',NULL,NULL),(12,'umetnik10',2,'umetnik10@maric.com',NULL,'$2y$10$al7EKDe0vccIEeSLlrafPepSV8fCu4.obn3y35G4.CmZ4MaCKBGVm',NULL,'2019-07-03 13:02:46','2019-07-03 13:02:46','umetnik10',NULL,NULL);
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

-- Dump completed on 2019-07-28 15:27:37

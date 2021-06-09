/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.13-MariaDB : Database - db_praktikum_prognet
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_praktikum_prognet` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_praktikum_prognet`;

/*Table structure for table `admin_notifications` */

DROP TABLE IF EXISTS `admin_notifications`;

CREATE TABLE `admin_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  KEY `notifiable_id` (`notifiable_id`),
  CONSTRAINT `admin_notifications_ibfk_1` FOREIGN KEY (`notifiable_id`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_notifications` */

insert  into `admin_notifications`(`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) values 
(1,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":36,\"category\":\"transaction\"}','2021-06-09 17:59:56','2021-06-09 09:18:31','2021-06-09 09:59:56'),
(2,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":37,\"category\":\"transaction\"}','2021-06-09 18:19:28','2021-06-09 09:18:50','2021-06-09 10:19:28'),
(3,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":41,\"category\":\"transaction\"}','2021-06-09 18:42:24','2021-06-09 09:59:36','2021-06-09 10:42:24'),
(4,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":44,\"category\":\"transaction\"}','2021-06-09 18:45:02','2021-06-09 10:05:21','2021-06-09 10:45:02'),
(5,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":45,\"category\":\"transaction\"}','2021-06-09 18:45:13','2021-06-09 10:05:38','2021-06-09 10:45:13'),
(6,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":46,\"category\":\"transaction\"}','2021-06-09 18:46:26','2021-06-09 10:12:37','2021-06-09 10:46:26'),
(7,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":47,\"category\":\"transaction\"}','2021-06-09 19:19:23','2021-06-09 10:12:54','2021-06-09 11:19:23'),
(8,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":49,\"category\":\"transaction\"}','2021-06-09 19:19:39','2021-06-09 10:36:16','2021-06-09 11:19:39'),
(9,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":50,\"category\":\"transaction\"}','2021-06-09 19:19:36','2021-06-09 11:19:16','2021-06-09 11:19:36'),
(10,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":51,\"category\":\"transaction\"}','2021-06-09 20:22:55','2021-06-09 12:20:29','2021-06-09 12:22:55'),
(11,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":52,\"category\":\"transaction\"}','2021-06-09 20:33:58','2021-06-09 12:33:49','2021-06-09 12:33:58'),
(12,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":53,\"category\":\"transaction\"}','2021-06-09 20:36:13','2021-06-09 12:36:06','2021-06-09 12:36:13'),
(13,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"mengupload bukti pembayaran!\",\"id\":null,\"category\":\"transaction\"}','2021-06-09 20:39:09','2021-06-09 12:37:14','2021-06-09 12:39:09'),
(14,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":54,\"category\":\"transaction\"}',NULL,'2021-06-09 12:37:46','2021-06-09 12:37:46'),
(15,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"mengupload bukti pembayaran!\",\"id\":null,\"category\":\"transaction\"}',NULL,'2021-06-09 12:37:58','2021-06-09 12:37:58'),
(16,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":55,\"category\":\"transaction\"}',NULL,'2021-06-09 12:40:02','2021-06-09 12:40:02'),
(17,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"mengupload bukti pembayaran!\",\"id\":\"55\",\"category\":\"transaction\"}',NULL,'2021-06-09 12:40:28','2021-06-09 12:40:28'),
(18,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":56,\"category\":\"transaction\"}',NULL,'2021-06-09 13:02:27','2021-06-09 13:02:27'),
(19,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"mengupload bukti pembayaran!\",\"id\":\"56\",\"category\":\"transaction\"}',NULL,'2021-06-09 13:02:39','2021-06-09 13:02:39'),
(20,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":57,\"category\":\"transaction\"}',NULL,'2021-06-09 13:48:47','2021-06-09 13:48:47'),
(21,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"mengupload bukti pembayaran!\",\"id\":\"57\",\"category\":\"transaction\"}',NULL,'2021-06-09 13:49:03','2021-06-09 13:49:03'),
(22,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"mereview product!\",\"id\":1,\"category\":\"review\"}','2021-06-09 21:56:15','2021-06-09 13:55:59','2021-06-09 13:56:15'),
(23,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":58,\"category\":\"transaction\"}',NULL,'2021-06-09 14:09:32','2021-06-09 14:09:32'),
(24,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"mengupload bukti pembayaran!\",\"id\":\"58\",\"category\":\"transaction\"}',NULL,'2021-06-09 14:09:51','2021-06-09 14:09:51'),
(25,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"melakukan transaksi!\",\"id\":59,\"category\":\"transaction\"}',NULL,'2021-06-09 14:11:10','2021-06-09 14:11:10'),
(26,'App\\Notifications\\AdminNotification','App\\Admin',1,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"mengupload bukti pembayaran!\",\"id\":\"59\",\"category\":\"transaction\"}',NULL,'2021-06-09 14:11:23','2021-06-09 14:11:23');

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_email_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`password`,`name`,`email`,`profile_image`,`phone`,`remember_token`,`created_at`,`updated_at`) values 
(1,NULL,'$2y$10$co9vSfHarOhBzUT1eDD7/emXhSdZga0g1KneGauGNWVKz.ODPiIEG','Admin','admin@gmail.com',NULL,NULL,'vdmXjIVJw0tIsnroAZGwF9bKh9p9wdeF0fWsyNineVDoIYrDDIM2O5qXD1nj','2021-02-27 17:33:45','2021-02-27 18:55:59'),
(2,NULL,'$2y$10$HcoromLkz5xNS1GwfnbISurvLaw/JAeS7Y1.poGCRgZBJZGZzBWIi','super','super@gmail.com',NULL,NULL,NULL,'2021-02-27 18:19:03','2021-02-27 18:19:03'),
(3,NULL,'11223344','gg','gg33@gmail.com',NULL,NULL,NULL,NULL,NULL),
(4,NULL,'$2y$10$DB/QXpgsD.gcMteEalZFJOx38NPZS7HjyUFJ3rmFAj3tY8hd/pA..','Anaa','g333@gmail.com',NULL,NULL,NULL,'2021-03-08 15:46:37','2021-03-08 15:46:37'),
(5,NULL,'$2y$10$3Qjb4YJDxeQuE4tEUAeGSOuE.atvWbsaf0cR3S8xk92ZS6vq92b22','Sai','admin123@gmail.com',NULL,NULL,NULL,'2021-03-12 05:23:23','2021-03-12 05:23:23'),
(6,NULL,'$2y$10$X5vhPmapbJtwSSP7CiH1YO9NNAKigme3Vt2hd.2GFtGeyTz8wJVGq','ellyas','ellyasimmanuel@gmail.com',NULL,NULL,NULL,'2021-06-09 14:17:09','2021-06-09 14:17:09');

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('checkedout','notyet','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

/*Table structure for table `couriers` */

DROP TABLE IF EXISTS `couriers`;

CREATE TABLE `couriers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `couriers` */

insert  into `couriers`(`id`,`courier`,`created_at`,`updated_at`) values 
(2,'fedex',NULL,'2021-06-04 06:19:07'),
(3,'sicepat','2021-03-28 04:31:10','2021-06-04 06:19:13'),
(5,'jne','2021-05-29 12:38:21','2021-06-03 06:22:55'),
(6,'tiki','2021-06-01 05:35:02','2021-06-04 06:19:18');

/*Table structure for table `discounts` */

DROP TABLE IF EXISTS `discounts`;

CREATE TABLE `discounts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_product` int(10) unsigned DEFAULT NULL,
  `percentage` int(3) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `discounts` */

insert  into `discounts`(`id`,`id_product`,`percentage`,`discount_price`,`start`,`end`,`created_at`,`updated_at`) values 
(13,1,50,12000,'2021-05-29','2021-06-05','2021-05-29 13:36:49','2021-06-02 09:04:48'),
(14,4,10,NULL,'2021-05-30','2021-06-06','2021-05-30 15:46:36','2021-06-02 09:04:30'),
(15,5,50,20000,'2021-06-01','2021-07-25','2021-06-03 12:38:43','2021-06-03 12:38:43');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `integrasi` */

DROP TABLE IF EXISTS `integrasi`;

CREATE TABLE `integrasi` (
  `id_transaksi` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total` int(11) DEFAULT 0,
  `status` enum('0','1') CHARACTER SET latin1 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `integrasi` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_02_15_123603_create_admins_table',1),
(4,'2019_02_15_123744_create_sellers_table',1),
(5,'2019_02_15_125445_create_products_table',1),
(6,'2019_02_15_130341_create_product_images_table',1),
(7,'2019_02_15_131114_create_transactions_table',1),
(8,'2019_02_15_131132_create_transaction_details_table',1),
(9,'2019_02_15_132352_create_product_categories_table',1),
(10,'2019_02_15_132701_create_carts_table',1),
(11,'2019_02_15_134220_create_wishlists_table',1),
(12,'2019_02_16_044815_create_rates_table',1),
(13,'2019_02_16_045411_create_product_reviews_table',1),
(14,'2019_02_16_062504_create_qna_products_table',1),
(15,'2019_02_16_063238_create_shopping_voucers_table',1),
(16,'2019_02_16_064643_create_couriers_table',1),
(17,'2019_02_16_102028_create_notifications_table',1),
(18,'2019_02_16_103007_create_seller_notifications_table',1),
(19,'2019_02_16_103024_create_user_notifications_table',1),
(20,'2019_08_19_000000_create_failed_jobs_table',2);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `product_categories` */

DROP TABLE IF EXISTS `product_categories`;

CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_categories` */

insert  into `product_categories`(`id`,`category_name`,`created_at`,`updated_at`) values 
(1,'Buku Pelajaran SD','2021-03-17 10:22:45','2021-04-03 03:16:14'),
(2,'Buku Pelajaran SMP','2021-03-28 05:03:39','2021-04-03 03:16:28'),
(3,'Buku Pelajaran SMA','2021-04-03 03:16:39','2021-04-03 03:16:39'),
(4,'Komik','2021-05-29 12:44:31','2021-05-29 12:44:31'),
(5,'Novel','2021-05-30 13:40:09','2021-05-30 13:40:09');

/*Table structure for table `product_category_details` */

DROP TABLE IF EXISTS `product_category_details`;

CREATE TABLE `product_category_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_category_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_category_details_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `product_category_details` */

insert  into `product_category_details`(`id`,`product_id`,`category_id`,`created_at`,`updated_at`) values 
(4,1,1,'2021-06-09 12:47:26','2021-06-09 12:47:26'),
(5,4,4,'2021-06-09 12:47:33','2021-06-09 12:47:33'),
(6,5,4,'2021-06-09 12:47:40','2021-06-09 12:47:40');

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`image_name`,`created_at`,`updated_at`) values 
(1,1,'download.jpg','2021-03-28 05:28:42','2021-05-30 15:21:39'),
(2,4,'thumb-1920-648557.jpg','2021-05-29 13:06:03','2021-05-29 13:06:03'),
(3,5,'wp6045748.jpg','2021-05-29 13:42:34','2021-05-29 13:42:34');

/*Table structure for table `product_reviews` */

DROP TABLE IF EXISTS `product_reviews`;

CREATE TABLE `product_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `rate` int(1) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `rate_id` (`rate`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `product_reviews_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_reviews` */

insert  into `product_reviews`(`id`,`product_id`,`user_id`,`rate`,`content`,`created_at`,`updated_at`) values 
(1,4,3,5,'mantap','2021-06-03 08:16:28','2021-06-03 08:16:28'),
(2,4,3,4,'oke','2021-06-03 08:40:31','2021-06-03 08:40:31'),
(3,1,3,5,'saya menjadi semakin pintar','2021-06-04 06:17:06','2021-06-04 06:17:06'),
(4,1,3,5,'oke','2021-06-09 10:54:14','2021-06-09 10:54:14'),
(5,4,3,5,'sekali lagi','2021-06-09 10:54:58','2021-06-09 10:54:58'),
(6,1,3,5,'oke','2021-06-09 11:00:34','2021-06-09 11:00:34'),
(7,1,3,5,'keren banget','2021-06-09 11:12:15','2021-06-09 11:12:15'),
(8,1,3,1,'kurang','2021-06-09 11:14:41','2021-06-09 11:14:41'),
(9,5,3,5,'ini tes notif','2021-06-09 11:21:10','2021-06-09 11:21:10'),
(10,1,3,5,'tes notif 2','2021-06-09 12:22:48','2021-06-09 12:22:48'),
(11,1,3,5,'tes notif 3','2021-06-09 12:41:02','2021-06-09 12:41:02'),
(12,1,3,5,'tes notif 4','2021-06-09 12:44:20','2021-06-09 12:44:20'),
(13,1,3,5,'tes rating 5','2021-06-09 12:45:31','2021-06-09 12:45:31'),
(14,1,3,1,'tes rating 6','2021-06-09 12:46:24','2021-06-09 12:46:24'),
(15,1,3,5,'tes notif 7','2021-06-09 12:58:45','2021-06-09 12:58:45'),
(16,1,3,5,'tes rating 8','2021-06-09 13:03:39','2021-06-09 13:03:39'),
(17,1,3,5,'tes review 10','2021-06-09 13:50:00','2021-06-09 13:50:00'),
(18,1,3,5,'tes review 11','2021-06-09 13:51:21','2021-06-09 13:51:21'),
(19,1,3,5,'tes review 12','2021-06-09 13:52:38','2021-06-09 13:52:38'),
(20,1,3,5,'tes review 13','2021-06-09 13:55:59','2021-06-09 13:55:59');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_rate` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`product_name`,`price`,`description`,`product_rate`,`created_at`,`updated_at`,`stock`,`weight`,`deleted_at`) values 
(1,'Tematik Tema 1',24000,'Buku Tematik untuk kelas 1 SD',NULL,'2021-03-28 05:28:42','2021-06-09 12:47:26',498,380,NULL),
(4,'One Piece Vol.2',40000,'buku komik one piece volume 2',NULL,'2021-05-29 13:06:02','2021-06-09 12:47:33',500,120,NULL),
(5,'One Piece Vol.1',40000,'Buku komik One piece Volume 1',NULL,'2021-05-29 13:42:34','2021-06-09 12:47:40',500,120,NULL);

/*Table structure for table `responses` */

DROP TABLE IF EXISTS `responses`;

CREATE TABLE `responses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `review_id` int(10) unsigned NOT NULL,
  `admin_id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `review_id` (`review_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `product_reviews` (`id`),
  CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `responses` */

insert  into `responses`(`id`,`review_id`,`admin_id`,`content`,`created_at`,`updated_at`) values 
(1,2,1,'thx','2021-06-03 08:42:50','2021-06-03 08:42:50'),
(2,3,1,'terima kasih <3','2021-06-04 06:17:30','2021-06-04 06:17:30'),
(3,3,1,'tx','2021-06-09 12:23:20','2021-06-09 12:23:20'),
(4,14,6,'terimakasih!','2021-06-09 14:53:01','2021-06-09 14:53:01');

/*Table structure for table `transaction_details` */

DROP TABLE IF EXISTS `transaction_details`;

CREATE TABLE `transaction_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` int(3) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_transaction` (`transaction_id`),
  KEY `id_product` (`product_id`),
  CONSTRAINT `transaction_details_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  CONSTRAINT `transaction_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaction_details` */

insert  into `transaction_details`(`id`,`transaction_id`,`product_id`,`qty`,`discount`,`selling_price`,`created_at`,`updated_at`) values 
(1,1,1,2,NULL,24000,'2021-06-02 08:28:20','2021-06-02 08:28:20'),
(2,1,4,1,NULL,40000,'2021-06-02 08:28:20','2021-06-02 08:28:20'),
(3,1,5,5,NULL,40000,'2021-06-02 08:28:20','2021-06-02 08:28:20'),
(5,3,1,1,NULL,24000,'2021-06-02 08:43:11','2021-06-02 08:43:11'),
(6,4,5,1,NULL,40000,'2021-06-02 08:49:36','2021-06-02 08:49:36'),
(7,5,4,3,NULL,40000,'2021-06-02 12:52:46','2021-06-02 12:52:46'),
(8,6,4,1,NULL,40000,'2021-06-02 13:00:45','2021-06-02 13:00:45'),
(9,7,1,3,12000,24000,'2021-06-02 13:02:02','2021-06-02 13:02:02'),
(10,7,4,1,4000,40000,'2021-06-02 13:02:02','2021-06-02 13:02:02'),
(11,7,5,1,0,40000,'2021-06-02 13:02:02','2021-06-02 13:02:02'),
(12,8,4,1,4000,40000,'2021-06-03 03:24:45','2021-06-03 03:24:45'),
(13,9,1,2,12000,24000,'2021-06-03 03:28:18','2021-06-03 03:28:18'),
(14,9,4,3,4000,40000,'2021-06-03 03:28:18','2021-06-03 03:28:18'),
(15,10,5,1,0,40000,'2021-06-03 06:23:48','2021-06-03 06:23:48'),
(16,11,4,1,4000,40000,'2021-06-03 06:26:33','2021-06-03 06:26:33'),
(17,12,4,1,4000,40000,'2021-06-03 06:27:40','2021-06-03 06:27:40'),
(18,13,5,1,0,40000,'2021-06-03 06:28:33','2021-06-03 06:28:33'),
(19,14,1,1,12000,24000,'2021-06-03 07:03:53','2021-06-03 07:03:53'),
(20,15,4,1,4000,40000,'2021-06-03 07:09:29','2021-06-03 07:09:29'),
(21,16,4,1,4000,40000,'2021-06-03 12:32:21','2021-06-03 12:32:21'),
(22,17,5,1,0,40000,'2021-06-03 12:34:18','2021-06-03 12:34:18'),
(23,18,5,1,20000,40000,'2021-06-03 12:39:36','2021-06-03 12:39:36'),
(24,19,4,1,4000,40000,'2021-06-03 12:40:13','2021-06-03 12:40:13'),
(25,20,5,1,20000,40000,'2021-06-03 12:40:48','2021-06-03 12:40:48'),
(26,21,1,1,12000,24000,'2021-06-04 06:14:13','2021-06-04 06:14:13'),
(27,22,1,1,12000,24000,'2021-06-04 06:15:43','2021-06-04 06:15:43'),
(28,23,1,1,12000,24000,'2021-06-04 06:20:30','2021-06-04 06:20:30'),
(29,24,4,1,0,40000,'2021-06-09 08:11:59','2021-06-09 08:11:59'),
(30,25,5,1,20000,40000,'2021-06-09 08:15:36','2021-06-09 08:15:36'),
(31,28,1,1,0,24000,'2021-06-09 08:21:55','2021-06-09 08:21:55'),
(32,29,4,1,0,40000,'2021-06-09 08:25:00','2021-06-09 08:25:00'),
(33,32,4,1,0,40000,'2021-06-09 08:34:19','2021-06-09 08:34:19'),
(34,33,5,1,20000,40000,'2021-06-09 08:38:58','2021-06-09 08:38:58'),
(35,40,1,1,0,24000,'2021-06-09 09:58:22','2021-06-09 09:58:22'),
(36,48,4,1,0,40000,'2021-06-09 10:13:11','2021-06-09 10:13:11'),
(37,49,1,1,0,24000,'2021-06-09 10:36:16','2021-06-09 10:36:16'),
(38,50,5,1,20000,40000,'2021-06-09 11:19:16','2021-06-09 11:19:16'),
(39,51,1,2,0,24000,'2021-06-09 12:20:29','2021-06-09 12:20:29'),
(40,52,1,1,0,24000,'2021-06-09 12:33:49','2021-06-09 12:33:49'),
(41,53,1,1,0,24000,'2021-06-09 12:36:06','2021-06-09 12:36:06'),
(42,54,1,1,0,24000,'2021-06-09 12:37:46','2021-06-09 12:37:46'),
(43,55,1,1,0,24000,'2021-06-09 12:40:01','2021-06-09 12:40:01'),
(44,56,1,1,0,24000,'2021-06-09 13:02:27','2021-06-09 13:02:27'),
(45,57,1,1,0,24000,'2021-06-09 13:48:47','2021-06-09 13:48:47'),
(46,58,1,1,0,24000,'2021-06-09 14:09:32','2021-06-09 14:09:32'),
(47,59,1,1,0,24000,'2021-06-09 14:11:10','2021-06-09 14:11:10');

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timeout` datetime NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(12,2) NOT NULL,
  `shipping_cost` double(12,2) NOT NULL,
  `sub_total` double(12,2) NOT NULL,
  `user_id` int(20) unsigned NOT NULL,
  `courier_id` int(10) unsigned NOT NULL,
  `proof_of_payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('unverified','verified','delivered','success','expired','canceled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courier_id` (`courier_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`),
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`timeout`,`address`,`regency`,`province`,`total`,`shipping_cost`,`sub_total`,`user_id`,`courier_id`,`proof_of_payment`,`created_at`,`updated_at`,`status`) values 
(1,'2021-06-05 08:28:20','Nusa Dua','Badung','Bali',300000.00,12000.00,288000.00,3,5,'12890978143970.jpg','2021-06-02 08:28:20','2021-06-02 08:38:23','success'),
(3,'2021-06-05 08:43:11','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',36000.00,12000.00,24000.00,3,5,'12890978143970.jpg','2021-06-02 08:43:11','2021-06-02 08:47:38','success'),
(4,'2021-06-05 08:49:36','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',52000.00,12000.00,40000.00,3,2,NULL,'2021-06-02 08:49:36','2021-06-02 08:56:57','canceled'),
(5,'2021-06-05 12:52:46','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',132000.00,12000.00,120000.00,3,3,'12890978143970.jpg','2021-06-02 12:52:46','2021-06-02 12:54:40','success'),
(6,'2021-06-05 13:00:45','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',52000.00,12000.00,40000.00,3,3,NULL,'2021-06-02 13:00:45','2021-06-03 07:11:58','success'),
(7,'2021-06-05 13:02:02','puri bunga kost','Badung','Bali',148000.00,12000.00,136000.00,3,3,NULL,'2021-06-02 13:02:02','2021-06-03 07:12:05','success'),
(8,'2021-06-06 03:24:45','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',48000.00,12000.00,40000.00,9,2,'12890978143970.jpg','2021-06-03 03:24:45','2021-06-03 03:26:17','success'),
(9,'2021-06-06 03:28:18','puri bunga kost','Badung','Bali',164000.00,12000.00,152000.00,3,5,NULL,'2021-06-03 03:28:18','2021-06-04 06:16:21','delivered'),
(10,'2021-06-06 06:23:48','puri bunga kost','Badung','Bali',52000.00,12000.00,40000.00,3,5,NULL,'2021-06-03 06:23:48','2021-06-04 06:16:22','delivered'),
(11,'2021-06-06 06:26:33','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',69000.00,33000.00,36000.00,3,5,NULL,'2021-06-03 06:26:33','2021-06-04 06:16:23','delivered'),
(12,'2021-06-06 06:27:40','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',69000.00,33000.00,40000.00,3,5,NULL,'2021-06-03 06:27:40','2021-06-04 06:16:23','delivered'),
(13,'2021-06-06 06:28:33','MK. Paradise Blok M No. 26','Kutai Timur','Kalimantan Timur',106000.00,66000.00,40000.00,3,5,NULL,'2021-06-03 06:28:33','2021-06-04 06:16:24','delivered'),
(14,'2021-06-06 07:03:53','Paradise','Batam','Kepulauan Riau',45000.00,33000.00,24000.00,3,5,'12890978143970.jpg','2021-06-03 07:03:53','2021-06-04 06:16:20','delivered'),
(15,'2021-06-06 07:09:29','disitu','Badung','Bali',87000.00,51000.00,40000.00,3,5,'12890978143970.jpg','2021-06-03 07:09:29','2021-06-03 08:16:10','success'),
(16,'2021-06-06 12:32:21','MK. Paradise Blok M No. 26','Belitung','Bangka Belitung',123000.00,87000.00,40000.00,3,5,'12890978143970.jpg','2021-06-03 12:32:21','2021-06-04 06:16:25','delivered'),
(17,'2021-06-06 12:34:18','MK. Paradise Blok M No. 26','Bangka Tengah','Bangka Belitung',94000.00,54000.00,40000.00,3,5,NULL,'2021-06-03 12:34:18','2021-06-03 12:38:53','canceled'),
(18,'2021-06-06 12:39:36','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',54000.00,34000.00,40000.00,3,5,NULL,'2021-06-03 12:39:36','2021-06-09 08:13:49','canceled'),
(19,'2021-06-06 12:40:13','MK. Paradise Blok M No. 26','Badung','Bali',54000.00,18000.00,36000.00,3,5,NULL,'2021-06-03 12:40:13','2021-06-09 08:13:54','canceled'),
(20,'2021-06-06 12:40:48','MK. Paradise Blok M No. 26','Badung','Bali',38000.00,18000.00,20000.00,3,5,NULL,'2021-06-03 12:40:48','2021-06-09 08:13:43','canceled'),
(21,'2021-06-07 06:14:13','MK. Paradise Blok M No. 26','Badung','Bali',20000.00,8000.00,24000.00,3,5,NULL,'2021-06-04 06:14:13','2021-06-09 08:13:58','canceled'),
(22,'2021-06-07 06:15:43','MK. Paradise Blok M No. 26','Kerinci','Jambi',57000.00,45000.00,12000.00,3,5,'12890978143970.jpg','2021-06-04 06:15:43','2021-06-04 06:16:44','success'),
(23,'2021-06-07 06:20:30','Jalan bukit hijau gang putri no 9a','Badung','Bali',20000.00,8000.00,12000.00,3,6,NULL,'2021-06-04 06:20:30','2021-06-09 08:13:37','canceled'),
(24,'2021-06-12 08:11:59','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',73000.00,33000.00,40000.00,3,5,NULL,'2021-06-09 08:11:59','2021-06-09 08:13:28','canceled'),
(25,'2021-06-12 08:15:36','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',56000.00,36000.00,20000.00,3,5,'12890978143970.jpg','2021-06-09 08:15:36','2021-06-09 09:53:34','unverified'),
(26,'2021-06-12 08:16:07','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',36000.00,36000.00,0.00,3,5,NULL,'2021-06-09 08:16:07','2021-06-09 09:47:48','canceled'),
(27,'2021-06-12 08:20:31','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',36000.00,36000.00,0.00,3,5,NULL,'2021-06-09 08:20:31','2021-06-09 09:47:46','canceled'),
(28,'2021-06-12 08:21:55','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',57000.00,33000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 08:21:55','2021-06-09 14:38:57','verified'),
(29,'2021-06-12 08:25:00','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',76000.00,36000.00,40000.00,3,5,NULL,'2021-06-09 08:25:00','2021-06-09 09:47:43','canceled'),
(30,'2021-06-12 08:30:28','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',36000.00,36000.00,0.00,3,5,NULL,'2021-06-09 08:30:28','2021-06-09 09:47:40','canceled'),
(31,'2021-06-12 08:33:12','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',36000.00,36000.00,0.00,3,5,NULL,'2021-06-09 08:33:12','2021-06-09 09:47:37','canceled'),
(32,'2021-06-12 08:34:19','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',91000.00,51000.00,40000.00,3,6,NULL,'2021-06-09 08:34:19','2021-06-09 09:47:34','canceled'),
(33,'2021-06-12 08:38:58','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',64000.00,44000.00,20000.00,3,5,NULL,'2021-06-09 08:38:58','2021-06-09 09:47:21','canceled'),
(34,'2021-06-12 09:15:18','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',44000.00,44000.00,0.00,3,5,NULL,'2021-06-09 09:15:18','2021-06-09 09:47:24','canceled'),
(35,'2021-06-12 09:17:44','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',44000.00,44000.00,0.00,3,5,NULL,'2021-06-09 09:17:44','2021-06-09 09:47:32','canceled'),
(36,'2021-06-12 09:18:31','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',44000.00,44000.00,0.00,3,5,NULL,'2021-06-09 09:18:31','2021-06-09 09:47:29','canceled'),
(37,'2021-06-12 09:18:50','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',44000.00,44000.00,0.00,3,5,NULL,'2021-06-09 09:18:50','2021-06-09 09:47:18','canceled'),
(38,'2021-06-12 09:54:33','Jalan bukit hijau gang putri no 9a','Badung','Bali',55000.00,31000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 09:54:33','2021-06-09 14:38:55','verified'),
(39,'2021-06-12 09:58:02','Jalan bukit hijau gang putri no 9a','Badung','Bali',55000.00,31000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 09:58:02','2021-06-09 14:34:54','verified'),
(40,'2021-06-12 09:58:22','Jalan bukit hijau gang putri no 9a','Badung','Bali',55000.00,31000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 09:58:22','2021-06-09 14:25:17','verified'),
(41,'2021-06-12 09:59:36','Jalan bukit hijau gang putri no 9a','Badung','Bali',31000.00,31000.00,0.00,3,5,'12890978143970.jpg','2021-06-09 09:59:36','2021-06-09 14:17:51','verified'),
(42,'2021-06-12 10:00:58','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',73000.00,33000.00,40000.00,3,5,NULL,'2021-06-09 10:00:58','2021-06-09 10:13:49','canceled'),
(43,'2021-06-10 10:03:28','MK. Paradise Blok M No. 26','Denpasar','Bali',66000.00,26000.00,40000.00,3,5,NULL,'2021-06-09 10:03:28','2021-06-09 10:13:36','canceled'),
(44,'2021-06-10 10:05:21','MK. Paradise Blok M No. 26','Denpasar','Bali',66000.00,26000.00,40000.00,3,5,NULL,'2021-06-09 10:05:21','2021-06-09 10:13:33','canceled'),
(45,'2021-06-10 10:05:38','MK. Paradise Blok M No. 26','Badung','Bali',51000.00,11000.00,40000.00,3,5,NULL,'2021-06-09 10:05:38','2021-06-09 10:13:30','canceled'),
(46,'2021-06-10 10:12:37','MK. Paradise Blok M No. 26','Badung','Bali',51000.00,11000.00,40000.00,3,5,NULL,'2021-06-09 10:12:37','2021-06-09 10:13:25','canceled'),
(47,'2021-06-10 10:12:54','MK. Paradise Blok M No. 26','Badung','Bali',50000.00,10000.00,40000.00,3,5,NULL,'2021-06-09 10:12:54','2021-06-09 10:13:22','canceled'),
(48,'2021-06-10 10:13:11','MK. Paradise Blok M No. 26','Badung','Bali',50000.00,10000.00,40000.00,3,5,NULL,'2021-06-09 10:13:11','2021-06-09 10:13:18','canceled'),
(49,'2021-06-10 10:36:16','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',56000.00,32000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 10:36:16','2021-06-09 12:46:13','success'),
(50,'2021-06-10 11:19:16','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',51000.00,31000.00,20000.00,3,5,'12890978143970.jpg','2021-06-09 11:19:16','2021-06-09 11:20:49','success'),
(51,'2021-06-10 12:20:29','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',81000.00,33000.00,48000.00,3,5,'12890978143970.jpg','2021-06-09 12:20:29','2021-06-09 12:22:32','success'),
(52,'2021-06-10 12:33:49','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',57000.00,33000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 12:33:49','2021-06-09 14:15:49','verified'),
(53,'2021-06-10 12:36:06','MK. Paradise Blok M No. 26','Badung','Bali',31000.00,7000.00,24000.00,3,6,'12890978143970.jpg','2021-06-09 12:36:06','2021-06-09 14:05:56','verified'),
(54,'2021-06-10 12:37:46','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',57000.00,33000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 12:37:46','2021-06-09 14:05:47','verified'),
(55,'2021-06-10 12:40:01','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',57000.00,33000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 12:40:01','2021-06-09 12:40:52','success'),
(56,'2021-06-10 13:02:27','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',57000.00,33000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 13:02:27','2021-06-09 13:03:26','success'),
(57,'2021-06-10 13:48:47','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',57000.00,33000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 13:48:47','2021-06-09 13:49:47','success'),
(58,'2021-06-10 14:09:32','MK. Paradise Blok M No. 26','Badung','Bali',75000.00,51000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 14:09:32','2021-06-09 14:39:33','delivered'),
(59,'2021-06-10 14:11:10','MK. Paradise Blok M No. 26','Batam','Kepulauan Riau',57000.00,33000.00,24000.00,3,5,'12890978143970.jpg','2021-06-09 14:11:10','2021-06-09 14:37:23','delivered');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total` int(11) DEFAULT 0,
  `status` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi` */

/*Table structure for table `user_notifications` */

DROP TABLE IF EXISTS `user_notifications`;

CREATE TABLE `user_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(11) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  KEY `notifiable_id` (`notifiable_id`),
  CONSTRAINT `user_notifications_ibfk_1` FOREIGN KEY (`notifiable_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_notifications` */

insert  into `user_notifications`(`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) values 
(1,'App\\Notifications\\UserNotification','App\\User',1,'{\"nama\":\"tejo\",\"message\":\"Pesanan terverifikasi!\",\"id\":\"54\",\"category\":\"approved\"}',NULL,'2021-06-09 14:05:47','2021-06-09 14:05:47'),
(2,'App\\Notifications\\UserNotification','App\\User',1,'{\"nama\":\"tejo\",\"message\":\"Pesanan terverifikasi!\",\"id\":\"53\",\"category\":\"approved\"}',NULL,'2021-06-09 14:05:56','2021-06-09 14:05:56'),
(3,'App\\Notifications\\UserNotification','App\\User',1,'{\"nama\":\"tejo\",\"message\":\"Pesanan terverifikasi!\",\"id\":\"58\",\"category\":\"approved\"}',NULL,'2021-06-09 14:10:08','2021-06-09 14:10:08'),
(4,'App\\Notifications\\UserNotification','App\\User',1,'{\"nama\":\"tejo\",\"message\":\"Pesanan terverifikasi!\",\"id\":\"59\",\"category\":\"approved\"}',NULL,'2021-06-09 14:11:35','2021-06-09 14:11:35'),
(5,'App\\Notifications\\UserNotification','App\\User',1,'{\"nama\":\"tejo\",\"message\":\"Pesanan terverifikasi!\",\"id\":\"52\",\"category\":\"approved\"}',NULL,'2021-06-09 14:15:49','2021-06-09 14:15:49'),
(6,'App\\Notifications\\UserNotification','App\\User',6,'{\"nama\":\"user\",\"message\":\"Pesanan terverifikasi!\",\"id\":\"41\",\"category\":\"approved\"}',NULL,'2021-06-09 14:17:51','2021-06-09 14:17:51'),
(7,'App\\Notifications\\UserNotification','App\\User',3,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"Pesanan terverifikasi!\",\"id\":\"40\",\"category\":\"approved\"}',NULL,'2021-06-09 14:25:17','2021-06-09 14:25:17'),
(8,'App\\Notifications\\UserNotification','App\\User',3,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"Pesanan terverifikasi!\",\"id\":\"38\",\"category\":\"approved\"}',NULL,'2021-06-09 14:38:55','2021-06-09 14:38:55'),
(9,'App\\Notifications\\UserNotification','App\\User',3,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"Pesanan terverifikasi!\",\"id\":\"28\",\"category\":\"approved\"}',NULL,'2021-06-09 14:38:57','2021-06-09 14:38:57'),
(10,'App\\Notifications\\UserNotification','App\\User',3,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"Pesanan dalam perjalanan!\",\"id\":\"58\",\"category\":\"delivered\"}',NULL,'2021-06-09 14:39:33','2021-06-09 14:39:33'),
(11,'App\\Notifications\\UserNotification','App\\User',3,'{\"nama\":\"Ellyas Immanuel Sinaga\",\"message\":\"Review diresponse!\",\"id\":14,\"category\":\"review\"}',NULL,'2021-06-09 14:53:01','2021-06-09 14:53:01');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'tejo','tejo@gmail.com',NULL,NULL,NULL,'$2y$12$eZyfiTVTq77Qor20qoaDKOOYQnksU2MptQi7ZbnkAQGsDKA0/srsm ',NULL,NULL,NULL),
(2,'tejo','anjay@gmail.com',NULL,NULL,NULL,'$2y$10$sn3N.nur5ZtClAFcmuUVj.zOO3uJii3R3UYEP6pO2lyoWDpuJBply',NULL,'2021-02-21 06:02:38','2021-02-21 06:02:38'),
(3,'Ellyas Immanuel Sinaga','ellyasimmanuel@gmail.com',NULL,NULL,'2021-03-03 12:33:22','$2y$10$NDUdTxTIImvlW35dK8jzgeLzDndAGGHnbP3RLPak4DUbxo5OyiKOO',NULL,'2021-02-25 10:10:28','2021-03-03 12:33:22'),
(4,'wawan','wawan@gmail.com',NULL,NULL,NULL,'$2y$10$p4IVfcaHzMOfVe4xIJI1TeaHWCI.c5H.0Q5YyB2x4XP/aBXNsagta',NULL,'2021-02-27 15:00:15','2021-02-27 15:00:15'),
(5,'tenten','tenten@gmail.com',NULL,NULL,NULL,'$2y$10$YNk3ZwNzbbDR1ZN8Ak9Cw.rcTO.RltgLk7C0fi8o6YvXzwD2NbfmK',NULL,'2021-02-27 15:22:28','2021-02-27 15:22:28'),
(6,'user','user@gmail.com',NULL,NULL,NULL,'$2y$10$go3sHrB8IYVK/zyDbe/A.excWRNtdMkqmHY1pgBAnJQ3JB70xYKHO',NULL,'2021-02-27 15:44:51','2021-02-27 15:44:51'),
(8,'eye','eyebrowpixel@gmail.com',NULL,NULL,'2021-02-28 00:59:52','$2y$10$Q3hLIQUBzJfuFxCuRYB/tOZ.BaQ3E05RrI1wsnZb7QkM.2hlVfTD2',NULL,'2021-02-28 00:57:43','2021-02-28 00:59:52'),
(9,'kevin','kevin@gmail.com',NULL,NULL,'2021-02-28 05:46:47','$2y$10$jp0DY1H6Ig1YJMC8dlLq3uSGViu4TqEeQkZE1GSwak2JKD7ntPR7i','OSg5KpdqoG7SBZzx5dGmEZnF5Yw95ox10WlNnYB6UmW24XxEmD2C1J6muxZB','2021-02-28 05:46:19','2021-02-28 05:47:31'),
(10,'Ana','gg@gmail.com',NULL,NULL,NULL,'$2y$10$QaZqNJ8bNH3hlNVucKu.vu0zjdi6p/7c20E428aT5JuXCsSKMgCRC','V2dqFZ4XreTtOhhwIuT6mDpoueyT30cB2e7D3OHbZqnEaLNKKDhwlejdETOX','2021-03-08 15:29:39','2021-03-08 15:29:39'),
(11,'user1','user1@gmail.com',NULL,NULL,NULL,'$2y$10$fAbTMZbZ.gaHnujAYce3QeGrv4Y50FcgyW0desD3utrlyAvVjEIDO',NULL,'2021-06-02 09:09:27','2021-06-02 09:09:27');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.11-MariaDB-log : Database - db_praktikum_prognet
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_notifications` */

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`password`,`name`,`email`,`profile_image`,`phone`,`remember_token`,`created_at`,`updated_at`) values (1,NULL,'$2y$10$co9vSfHarOhBzUT1eDD7/emXhSdZga0g1KneGauGNWVKz.ODPiIEG','Admin','admin@gmail.com',NULL,NULL,'vdmXjIVJw0tIsnroAZGwF9bKh9p9wdeF0fWsyNineVDoIYrDDIM2O5qXD1nj','2021-02-27 17:33:45','2021-02-27 18:55:59');
insert  into `admins`(`id`,`username`,`password`,`name`,`email`,`profile_image`,`phone`,`remember_token`,`created_at`,`updated_at`) values (2,NULL,'$2y$10$HcoromLkz5xNS1GwfnbISurvLaw/JAeS7Y1.poGCRgZBJZGZzBWIi','super','super@gmail.com',NULL,NULL,NULL,'2021-02-27 18:19:03','2021-02-27 18:19:03');
insert  into `admins`(`id`,`username`,`password`,`name`,`email`,`profile_image`,`phone`,`remember_token`,`created_at`,`updated_at`) values (3,NULL,'11223344','gg','gg33@gmail.com',NULL,NULL,NULL,NULL,NULL);
insert  into `admins`(`id`,`username`,`password`,`name`,`email`,`profile_image`,`phone`,`remember_token`,`created_at`,`updated_at`) values (4,NULL,'$2y$10$DB/QXpgsD.gcMteEalZFJOx38NPZS7HjyUFJ3rmFAj3tY8hd/pA..','Anaa','g333@gmail.com',NULL,NULL,NULL,'2021-03-08 15:46:37','2021-03-08 15:46:37');
insert  into `admins`(`id`,`username`,`password`,`name`,`email`,`profile_image`,`phone`,`remember_token`,`created_at`,`updated_at`) values (5,NULL,'$2y$10$3Qjb4YJDxeQuE4tEUAeGSOuE.atvWbsaf0cR3S8xk92ZS6vq92b22','Sai','admin123@gmail.com',NULL,NULL,NULL,'2021-03-12 05:23:23','2021-03-12 05:23:23');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

/*Table structure for table `couriers` */

DROP TABLE IF EXISTS `couriers`;

CREATE TABLE `couriers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `couriers` */

insert  into `couriers`(`id`,`courier`,`created_at`,`updated_at`) values (2,'Fedex',NULL,'2021-03-28 12:21:56');
insert  into `couriers`(`id`,`courier`,`created_at`,`updated_at`) values (3,'SiCepat','2021-03-28 04:31:10','2021-05-30 07:43:20');
insert  into `couriers`(`id`,`courier`,`created_at`,`updated_at`) values (5,'JNE','2021-05-29 12:38:21','2021-05-29 12:38:21');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `discounts` */

insert  into `discounts`(`id`,`id_product`,`percentage`,`discount_price`,`start`,`end`,`created_at`,`updated_at`) values (13,1,3,23280,'2021-05-29','2021-06-05','2021-05-29 13:36:49','2021-05-29 13:36:49');
insert  into `discounts`(`id`,`id_product`,`percentage`,`discount_price`,`start`,`end`,`created_at`,`updated_at`) values (14,4,10,NULL,'2021-05-30','2021-06-06','2021-05-30 15:46:36','2021-05-30 15:48:04');

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

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (2,'2014_10_12_100000_create_password_resets_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (3,'2019_02_15_123603_create_admins_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2019_02_15_123744_create_sellers_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (5,'2019_02_15_125445_create_products_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (6,'2019_02_15_130341_create_product_images_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (7,'2019_02_15_131114_create_transactions_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (8,'2019_02_15_131132_create_transaction_details_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (9,'2019_02_15_132352_create_product_categories_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (10,'2019_02_15_132701_create_carts_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (11,'2019_02_15_134220_create_wishlists_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (12,'2019_02_16_044815_create_rates_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (13,'2019_02_16_045411_create_product_reviews_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (14,'2019_02_16_062504_create_qna_products_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (15,'2019_02_16_063238_create_shopping_voucers_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (16,'2019_02_16_064643_create_couriers_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (17,'2019_02_16_102028_create_notifications_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (18,'2019_02_16_103007_create_seller_notifications_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (19,'2019_02_16_103024_create_user_notifications_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (20,'2019_08_19_000000_create_failed_jobs_table',2);

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

insert  into `product_categories`(`id`,`category_name`,`created_at`,`updated_at`) values (1,'Buku Pelajaran SD','2021-03-17 10:22:45','2021-04-03 03:16:14');
insert  into `product_categories`(`id`,`category_name`,`created_at`,`updated_at`) values (2,'Buku Pelajaran SMP','2021-03-28 05:03:39','2021-04-03 03:16:28');
insert  into `product_categories`(`id`,`category_name`,`created_at`,`updated_at`) values (3,'Buku Pelajaran SMA','2021-04-03 03:16:39','2021-04-03 03:16:39');
insert  into `product_categories`(`id`,`category_name`,`created_at`,`updated_at`) values (4,'Komik','2021-05-29 12:44:31','2021-05-29 12:44:31');
insert  into `product_categories`(`id`,`category_name`,`created_at`,`updated_at`) values (5,'Novel','2021-05-30 13:40:09','2021-05-30 13:40:09');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `product_category_details` */

insert  into `product_category_details`(`id`,`product_id`,`category_id`,`created_at`,`updated_at`) values (1,1,1,'2021-03-28 05:28:42','2021-03-28 05:28:42');
insert  into `product_category_details`(`id`,`product_id`,`category_id`,`created_at`,`updated_at`) values (2,4,4,'2021-05-29 13:06:03','2021-05-29 13:06:03');
insert  into `product_category_details`(`id`,`product_id`,`category_id`,`created_at`,`updated_at`) values (3,5,4,'2021-05-29 13:42:34','2021-05-29 13:42:34');

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

insert  into `product_images`(`id`,`product_id`,`image_name`,`created_at`,`updated_at`) values (1,1,'download.jpg','2021-03-28 05:28:42','2021-05-30 15:21:39');
insert  into `product_images`(`id`,`product_id`,`image_name`,`created_at`,`updated_at`) values (2,4,'thumb-1920-648557.jpg','2021-05-29 13:06:03','2021-05-29 13:06:03');
insert  into `product_images`(`id`,`product_id`,`image_name`,`created_at`,`updated_at`) values (3,5,'wp6045748.jpg','2021-05-29 13:42:34','2021-05-29 13:42:34');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_reviews` */

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

insert  into `products`(`id`,`product_name`,`price`,`description`,`product_rate`,`created_at`,`updated_at`,`stock`,`weight`,`deleted_at`) values (1,'Tematik Tema 1',24000,'Buku Tematik untuk kelas 1 SD',NULL,'2021-03-28 05:28:42','2021-04-03 03:15:48',5,380,NULL);
insert  into `products`(`id`,`product_name`,`price`,`description`,`product_rate`,`created_at`,`updated_at`,`stock`,`weight`,`deleted_at`) values (4,'One Piece Vol.2',40000,'buku komik one piece volume 2',NULL,'2021-05-29 13:06:02','2021-05-29 13:06:02',5,120,NULL);
insert  into `products`(`id`,`product_name`,`price`,`description`,`product_rate`,`created_at`,`updated_at`,`stock`,`weight`,`deleted_at`) values (5,'One Piece Vol.1',40000,'Buku komik One piece Volume 1',NULL,'2021-05-29 13:42:34','2021-05-29 13:42:34',5,120,NULL);

/*Table structure for table `response` */

DROP TABLE IF EXISTS `response`;

CREATE TABLE `response` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `review_id` int(10) unsigned NOT NULL,
  `admin_id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `review_id` (`review_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `response_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `product_reviews` (`id`),
  CONSTRAINT `response_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `response` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaction_details` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

/*Table structure for table `user_notifications` */

DROP TABLE IF EXISTS `user_notifications`;

CREATE TABLE `user_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_notifications` */

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'tejo','tejo@gmail.com',NULL,NULL,NULL,'$2y$12$eZyfiTVTq77Qor20qoaDKOOYQnksU2MptQi7ZbnkAQGsDKA0/srsm ',NULL,NULL,NULL);
insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (2,'tejo','anjay@gmail.com',NULL,NULL,NULL,'$2y$10$sn3N.nur5ZtClAFcmuUVj.zOO3uJii3R3UYEP6pO2lyoWDpuJBply',NULL,'2021-02-21 06:02:38','2021-02-21 06:02:38');
insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (3,'Ellyas Immanuel Sinaga','ellyasimmanuel@gmail.com',NULL,NULL,'2021-03-03 12:33:22','$2y$10$NDUdTxTIImvlW35dK8jzgeLzDndAGGHnbP3RLPak4DUbxo5OyiKOO',NULL,'2021-02-25 10:10:28','2021-03-03 12:33:22');
insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (4,'wawan','wawan@gmail.com',NULL,NULL,NULL,'$2y$10$p4IVfcaHzMOfVe4xIJI1TeaHWCI.c5H.0Q5YyB2x4XP/aBXNsagta',NULL,'2021-02-27 15:00:15','2021-02-27 15:00:15');
insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (5,'tenten','tenten@gmail.com',NULL,NULL,NULL,'$2y$10$YNk3ZwNzbbDR1ZN8Ak9Cw.rcTO.RltgLk7C0fi8o6YvXzwD2NbfmK',NULL,'2021-02-27 15:22:28','2021-02-27 15:22:28');
insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (6,'user','user@gmail.com',NULL,NULL,NULL,'$2y$10$go3sHrB8IYVK/zyDbe/A.excWRNtdMkqmHY1pgBAnJQ3JB70xYKHO',NULL,'2021-02-27 15:44:51','2021-02-27 15:44:51');
insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (8,'eye','eyebrowpixel@gmail.com',NULL,NULL,'2021-02-28 00:59:52','$2y$10$Q3hLIQUBzJfuFxCuRYB/tOZ.BaQ3E05RrI1wsnZb7QkM.2hlVfTD2',NULL,'2021-02-28 00:57:43','2021-02-28 00:59:52');
insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (9,'kevin','kevin@gmail.com',NULL,NULL,'2021-02-28 05:46:47','$2y$10$jp0DY1H6Ig1YJMC8dlLq3uSGViu4TqEeQkZE1GSwak2JKD7ntPR7i','iS4E6BhvlTKloL35xTR7JnafQ6PkrkFSP37ZAtRllXpgfyuCLeWBWnrg4Lbi','2021-02-28 05:46:19','2021-02-28 05:47:31');
insert  into `users`(`id`,`name`,`email`,`profile_image`,`status`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (10,'Ana','gg@gmail.com',NULL,NULL,NULL,'$2y$10$QaZqNJ8bNH3hlNVucKu.vu0zjdi6p/7c20E428aT5JuXCsSKMgCRC','V2dqFZ4XreTtOhhwIuT6mDpoueyT30cB2e7D3OHbZqnEaLNKKDhwlejdETOX','2021-03-08 15:29:39','2021-03-08 15:29:39');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

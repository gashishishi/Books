-- Adminer 4.8.1 MySQL 8.0.31 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `publish` date NOT NULL,
  `author` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `books` (`id`, `title`, `isbn`, `price`, `publish`, `author`, `stock`, `created_at`, `updated_at`) VALUES
(1,	'phpの本',	'1234567890123',	1200,	'2020-05-21',	'php太郎',	5,	NULL,	NULL),
(2,	'phpの本2',	'123412324523',	1200,	'2021-05-22',	'php太郎',	5,	NULL,	NULL),
(3,	'鼻',	'5437890123',	350,	'1980-06-21',	'芥川龍之介',	5,	NULL,	NULL),
(4,	'人間失格',	'5680912',	120,	'1970-10-11',	'太宰治',	5,	NULL,	NULL),
(5,	'銀河鉄道の夜',	'67890123',	400,	'1960-01-31',	'宮沢賢治',	5,	NULL,	NULL),
(6,	'laravelの本',	'123456',	3000,	'2022-10-11',	'laravel花子',	5,	NULL,	NULL),
(7,	'ONEPIECE',	'90123',	420,	'1999-04-15',	'尾田栄一郎',	5,	NULL,	NULL),
(8,	'シャーマンキング',	'783218675',	420,	'1999-07-03',	'武井宏之',	5,	NULL,	NULL),
(9,	'英語の本',	'44467890123',	2300,	'2010-08-09',	'eigoUmao',	5,	NULL,	NULL),
(10,	'算数ドリル',	'123456123',	600,	'2015-03-21',	'しまじろう',	5,	NULL,	NULL),
(11,	'学問のすゝめ',	'133390123',	500,	'1900-05-10',	'福沢諭吉',	5,	NULL,	NULL);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `lendings`;
CREATE TABLE `lendings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `book_id` bigint unsigned NOT NULL,
  `checkout_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `lendings_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `lendings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `lendings` (`id`, `user_id`, `book_id`, `checkout_date`, `created_at`, `updated_at`) VALUES
(1,	1,	2,	'2023-02-10',	NULL,	NULL),
(2,	3,	3,	'2023-02-06',	NULL,	NULL),
(3,	6,	1,	'2023-02-07',	NULL,	NULL),
(4,	7,	7,	'2023-02-10',	NULL,	NULL),
(5,	7,	6,	'2023-02-08',	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8,	'2014_10_12_000000_create_users_table',	1),
(9,	'2014_10_12_100000_create_password_resets_table',	1),
(10,	'2019_08_19_000000_create_failed_jobs_table',	1),
(11,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(12,	'2023_02_10_022328_create_books_table',	1),
(13,	'2023_02_10_024757_create_sessions_table',	1),
(14,	'2023_02_10_030106_create_lendings_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`),
  CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lending` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `lending`, `created_at`, `updated_at`) VALUES
(1,	'山田太郎',	'abx@aa.jp',	NULL,	'password',	NULL,	0,	NULL,	NULL),
(2,	'山田花子',	'ffs@ss.jp',	NULL,	'password',	NULL,	0,	NULL,	NULL),
(3,	'高橋太一',	'aggaagasgd@sssss.jp',	NULL,	'password',	NULL,	0,	NULL,	NULL),
(4,	'飯田いい子',	'gas@gadgas.jp',	NULL,	'password',	NULL,	0,	NULL,	NULL),
(5,	'山下一夫',	'gasgasgas@hs.jp',	NULL,	'password',	NULL,	0,	NULL,	NULL),
(6,	'小林健二',	'hsdae@xzrya.jp',	NULL,	'password',	NULL,	0,	NULL,	NULL),
(7,	'山田太郎',	'aerhh@jwsrf.jp',	NULL,	'password',	NULL,	0,	NULL,	NULL),
(8,	'田中山田中',	'aa@asssssa.jp',	NULL,	'password',	NULL,	0,	NULL,	NULL),
(9,	'鈴木大助',	'agag@aagaga.jp',	NULL,	'password',	NULL,	0,	NULL,	NULL),
(10,	'川辺かおり',	'krtyeej@wey.jp',	NULL,	'password',	NULL,	0,	NULL,	NULL);

-- 2023-02-14 08:35:57

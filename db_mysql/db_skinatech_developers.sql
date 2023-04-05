-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla db_skinatech_developers.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_ct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategoria_id` int NOT NULL,
  `producto_id` int NOT NULL,
  `estado` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_skinatech_developers.categorias: ~0 rows (aproximadamente)
DELETE FROM `categorias`;
INSERT INTO `categorias` (`id`, `nombre_ct`, `subcategoria_id`, `producto_id`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'CAT-01', 1, 1, 1, '2023-04-05 10:30:39', '2023-04-05 10:30:39'),
	(2, 'CAT-02', 2, 2, 1, '2023-04-05 10:30:51', '2023-04-05 10:30:51'),
	(3, 'CAT-03', 3, 3, 1, '2023-04-05 10:31:03', '2023-04-05 10:31:03'),
	(4, 'CAT-04', 4, 4, 1, '2023-04-05 10:31:14', '2023-04-05 10:31:14'),
	(5, 'CAT-05', 5, 5, 2, '2023-04-05 10:31:29', '2023-04-05 10:31:37');

-- Volcando estructura para tabla db_skinatech_developers.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Volcando datos para la tabla db_skinatech_developers.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;

-- Volcando estructura para tabla db_skinatech_developers.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_skinatech_developers.migrations: ~8 rows (aproximadamente)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_03_25_001836_create_categorias_table', 2),
	(6, '2023_03_25_184057_create_productos_table', 2),
	(7, '2023_03_25_201708_create_subcategorias_table', 2),
	(8, '2023_03_26_033812_add_role_to_users_table', 2);

-- Volcando estructura para tabla db_skinatech_developers.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_skinatech_developers.password_reset_tokens: ~0 rows (aproximadamente)
DELETE FROM `password_reset_tokens`;

-- Volcando estructura para tabla db_skinatech_developers.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
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

-- Volcando datos para la tabla db_skinatech_developers.personal_access_tokens: ~0 rows (aproximadamente)
DELETE FROM `personal_access_tokens`;

-- Volcando estructura para tabla db_skinatech_developers.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_pr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_skinatech_developers.productos: ~3 rows (aproximadamente)
DELETE FROM `productos`;
INSERT INTO `productos` (`id`, `nombre_pr`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'PROD-01', 1, '2023-04-05 10:24:28', '2023-04-05 10:24:28'),
	(2, 'PROD-02', 1, '2023-04-05 10:24:39', '2023-04-05 10:24:39'),
	(3, 'PROD-03', 1, '2023-04-05 10:24:55', '2023-04-05 10:24:55'),
	(4, 'PROD-04', 1, '2023-04-05 10:25:09', '2023-04-05 10:25:09'),
	(5, 'PROD-05', 2, '2023-04-05 10:25:16', '2023-04-05 10:31:37'),
	(6, 'PROD-06', 1, '2023-04-05 10:25:25', '2023-04-05 10:25:25'),
	(7, 'PROD-07', 1, '2023-04-05 10:25:33', '2023-04-05 10:25:33'),
	(8, 'PROD-08', 1, '2023-04-05 10:25:43', '2023-04-05 10:25:43'),
	(9, 'PROD-09', 1, '2023-04-05 10:25:49', '2023-04-05 10:25:49'),
	(10, 'PROD-10', 1, '2023-04-05 10:25:59', '2023-04-05 10:25:59');

-- Volcando estructura para tabla db_skinatech_developers.subcategorias
CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_subct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int NOT NULL,
  `producto_id` int NOT NULL,
  `estado` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_skinatech_developers.subcategorias: ~2 rows (aproximadamente)
DELETE FROM `subcategorias`;
INSERT INTO `subcategorias` (`id`, `nombre_subct`, `cantidad`, `producto_id`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'SUBCAT-01', 20, 1, 1, '2023-04-05 10:27:22', '2023-04-05 10:27:22'),
	(2, 'SUBCAT-02', 12, 2, 1, '2023-04-05 10:27:35', '2023-04-05 10:27:35'),
	(3, 'SUBCAT-03', 15, 3, 1, '2023-04-05 10:28:02', '2023-04-05 10:28:02'),
	(4, 'SUBCAT-04', 30, 4, 1, '2023-04-05 10:28:24', '2023-04-05 10:28:24'),
	(5, 'SUBCAT-05', 25, 5, 2, '2023-04-05 10:28:44', '2023-04-05 10:31:37'),
	(6, 'SUBCAT-06', 22, 6, 1, '2023-04-05 10:29:03', '2023-04-05 10:29:03'),
	(7, 'SUBCAT-07', 23, 7, 1, '2023-04-05 10:29:21', '2023-04-05 10:29:21'),
	(8, 'SUBCAT-08', 12, 8, 1, '2023-04-05 10:29:37', '2023-04-05 10:29:37'),
	(9, 'SUBCAT-09', 23, 9, 1, '2023-04-05 10:29:55', '2023-04-05 10:29:55'),
	(10, 'SUBCAT-10', 10, 10, 1, '2023-04-05 10:30:10', '2023-04-05 10:30:10');

-- Volcando estructura para tabla db_skinatech_developers.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_skinatech_developers.users: ~1 rows (aproximadamente)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'developers', 'admin@admin.com', NULL, '$2y$10$1yLRLgnNM9NoAdLtTqJG0egtp8lS0giDYe6oBSsglCWMVn/IzEkyy', NULL, '2023-04-05 10:23:55', '2023-04-05 10:23:55');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

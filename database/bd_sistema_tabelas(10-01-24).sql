-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.31 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para academia
CREATE DATABASE IF NOT EXISTS `academia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `academia`;

-- Copiando estrutura para tabela academia.assessments
CREATE TABLE IF NOT EXISTS `assessments` (
  `id_assessment` bigint unsigned NOT NULL AUTO_INCREMENT,
  `goal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forearm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breastplate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `glute` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thigh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user_fk` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_assessment`),
  KEY `assessments_id_user_fk_foreign` (`id_user_fk`),
  CONSTRAINT `assessments_id_user_fk_foreign` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.assessments: ~5 rows (aproximadamente)
INSERT INTO `assessments` (`id_assessment`, `goal`, `observation`, `term`, `height`, `weight`, `arm`, `forearm`, `breastplate`, `back`, `waist`, `glute`, `hip`, `thigh`, `calf`, `id_user_fk`, `created_at`, `updated_at`) VALUES
	(1, 'Hipertrofia', '10', '2 Meses', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', 1, '2023-09-23 04:46:12', '2023-09-23 04:46:12'),
	(2, 'Hipertrofia', NULL, '1 Mês', '10', '10', '12.5', '14.63', '25.63', '12.56', '20.30', '14.60', '35.60', '14.90', '16.17', 1, '2023-09-24 04:34:08', '2023-09-24 04:34:08'),
	(3, 'Hipertrofia', 'teste', '1 Mês', '178', '80.20', '42.20', '32.10', '45.30', '14.23', '21.15', '27.36', '13.25', '42.39', '36.14', 1, '2023-10-16 05:01:20', '2023-10-16 05:01:20'),
	(4, 'Hipertrofia', 'teste', '1 Mês', '1.80', '65.60', '14.60', '25.14', '24.96', '31.33', '21.41', '19.25', '22.87', '14.36', '11.48', 3, '2023-10-22 06:10:55', '2023-10-22 06:10:55'),
	(6, 'Hipertrofia', NULL, '1 Mês', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', 3, '2023-10-22 06:17:27', '2023-10-22 06:17:27'),
	(7, 'Hipertrofia', '10', '1 Mês', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', 2, '2023-11-15 05:51:48', '2023-11-15 05:51:48');

-- Copiando estrutura para tabela academia.calleds
CREATE TABLE IF NOT EXISTS `calleds` (
  `id_called` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urgency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_instructor_fk` bigint unsigned NOT NULL,
  `id_user_fk` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_called`) USING BTREE,
  KEY `called_id_instructor_fk_foreign` (`id_instructor_fk`),
  KEY `called_id_user_fk_foreign` (`id_user_fk`),
  CONSTRAINT `called_id_instructor_fk_foreign` FOREIGN KEY (`id_instructor_fk`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `called_id_user_fk_foreign` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.calleds: ~0 rows (aproximadamente)
INSERT INTO `calleds` (`id_called`, `user_name`, `urgency`, `title`, `subject`, `id_instructor_fk`, `id_user_fk`, `created_at`, `updated_at`) VALUES
	(10, 'Renan da Silva Aragão', NULL, 'erase', 'asdasd', 1, 1, '2024-01-04 03:12:01', '2024-01-04 03:12:01');

-- Copiando estrutura para tabela academia.exercises
CREATE TABLE IF NOT EXISTS `exercises` (
  `id_exercise` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_exercise` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_exercise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_image.jpg',
  `gif_exercise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default_gif.gif',
  `id_gmuscle_fk` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_exercise`),
  KEY `exercises_id_gmuscle_fk_foreign` (`id_gmuscle_fk`),
  CONSTRAINT `exercises_id_gmuscle_fk_foreign` FOREIGN KEY (`id_gmuscle_fk`) REFERENCES `musclegroup` (`id_gmuscle`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.exercises: ~20 rows (aproximadamente)
INSERT INTO `exercises` (`id_exercise`, `name_exercise`, `image_exercise`, `gif_exercise`, `id_gmuscle_fk`, `created_at`, `updated_at`) VALUES
	(1, 'Supino Reto', 'default_image.jpg', NULL, 3, '2023-09-23 04:29:15', '2023-09-23 04:29:15'),
	(2, 'Crucifixo', 'default_image.jpg', NULL, 3, '2023-09-23 04:30:21', '2023-09-23 04:30:21'),
	(3, 'Agachamento Livre', 'Agachamento-livre .jpg', 'agachamento-livre.gif', 1, '2023-09-23 04:30:39', '2023-09-23 04:30:39'),
	(4, 'Passada', 'default_image.jpg', NULL, 1, '2023-09-23 04:30:46', '2023-09-23 04:30:46'),
	(5, 'Rosca Alternada', 'default_image.jpg', NULL, 5, '2023-09-23 04:31:06', '2023-09-23 04:31:06'),
	(6, 'Rosca Direta', 'default_image.jpg', NULL, 5, '2023-09-23 04:31:17', '2023-09-23 04:31:17'),
	(7, 'Corda', 'default_image.jpg', NULL, 4, '2023-09-23 04:31:29', '2023-09-23 04:31:29'),
	(8, 'Frances', 'default_image.jpg', NULL, 4, '2023-09-23 04:31:48', '2023-09-23 04:31:48'),
	(9, 'Encolhimento de Ombros', 'default_image.jpg', NULL, 6, '2023-09-23 04:32:29', '2023-09-23 04:32:29'),
	(10, 'Elevação Lateral', 'default_image.jpg', NULL, 2, '2023-09-23 04:32:46', '2023-09-23 04:32:46'),
	(11, 'Elevação Frontal', 'default_image.jpg', NULL, 2, '2023-09-23 04:32:57', '2023-09-23 04:32:57'),
	(12, 'Puxada Frente', 'default_image.jpg', NULL, 7, '2023-09-23 04:33:24', '2023-09-23 04:33:24'),
	(13, 'Remada Curvada', 'default_image.jpg', NULL, 7, '2023-09-23 04:33:36', '2023-09-23 04:33:36'),
	(14, 'Afundo', '9fbeb11414acce8c689d35e3e4347a6b.jpg', '126630ec4f033362c99cce625bef9a09.gif', 1, '2023-10-14 05:29:50', '2023-10-14 05:29:50'),
	(15, 'teste', 'default_image.jpg', 'default_gif.gif', 5, '2023-10-14 05:30:46', '2023-10-14 05:30:46'),
	(16, 'Rosca Martelo', 'fd1032de3e9cdc1361a10080db29cfa3.webp', '56da027bdd3b80da74a195161895dbdb.gif', 5, '2024-01-06 02:26:32', '2024-01-06 02:26:32'),
	(17, 'Supino Maquina', '74a3010922a07bf61091fbd656da08f9.jpg', '8897608e1a77c6a6468d4a2f27d2e570.gif', 3, '2024-01-10 03:07:37', '2024-01-10 03:07:37'),
	(18, 'Supino C/ Halteres', 'da042803e018dd0bb33abb4087da7148.jpg', 'Supino-C/-Halteres.gif', 3, '2024-01-10 03:16:20', '2024-01-10 03:19:38'),
	(19, 'asdasd', 'f2b5dc962d403cd70590211b36de6983asdasd.jpg', 'ed78e3530ba67bfba7641d41cd05e7b4.gif', 5, '2024-01-10 03:21:57', '2024-01-10 03:21:57'),
	(20, 'dasd asdasd', 'f6489c46621cbbfec95bda21ca4905e3dasd asdasd.jpg', '4df0dbcfac2af35dcf7b6a66c4e26cefdasd asdasd.gif', 6, '2024-01-10 03:23:17', '2024-01-10 03:23:17');

-- Copiando estrutura para tabela academia.failed_jobs
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

-- Copiando dados para a tabela academia.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela academia.fichas
CREATE TABLE IF NOT EXISTS `fichas` (
  `id_ficha` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repetition` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Livre',
  `rest` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '00:30s',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_exercise_fk` bigint unsigned NOT NULL,
  `id_gmuscle_fk_to_ficha` bigint unsigned NOT NULL,
  `id_user_fk` bigint unsigned NOT NULL,
  `id_user_creator_fk` bigint unsigned NOT NULL,
  `id_training_fk` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ficha`),
  KEY `fichas_id_exercise_fk_foreign` (`id_exercise_fk`),
  KEY `fichas_id_gmuscle_fk_to_ficha_foreign` (`id_gmuscle_fk_to_ficha`),
  KEY `fichas_id_user_fk_foreign` (`id_user_fk`),
  KEY `fichas_id_user_creator_fk_foreign` (`id_user_creator_fk`),
  KEY `fichas_id_training_fk_foreign` (`id_training_fk`),
  CONSTRAINT `fichas_id_exercise_fk_foreign` FOREIGN KEY (`id_exercise_fk`) REFERENCES `exercises` (`id_exercise`) ON DELETE CASCADE,
  CONSTRAINT `fichas_id_gmuscle_fk_to_ficha_foreign` FOREIGN KEY (`id_gmuscle_fk_to_ficha`) REFERENCES `musclegroup` (`id_gmuscle`) ON DELETE CASCADE,
  CONSTRAINT `fichas_id_training_fk_foreign` FOREIGN KEY (`id_training_fk`) REFERENCES `training_division` (`id_training`) ON DELETE CASCADE,
  CONSTRAINT `fichas_id_user_creator_fk_foreign` FOREIGN KEY (`id_user_creator_fk`) REFERENCES `users` (`id`),
  CONSTRAINT `fichas_id_user_fk_foreign` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.fichas: ~29 rows (aproximadamente)
INSERT INTO `fichas` (`id_ficha`, `order`, `serie`, `repetition`, `weight`, `rest`, `description`, `id_exercise_fk`, `id_gmuscle_fk_to_ficha`, `id_user_fk`, `id_user_creator_fk`, `id_training_fk`, `created_at`, `updated_at`) VALUES
	(34, '1', '10', '10', '11', '10', NULL, 5, 5, 4, 1, 3, '2023-10-10 03:28:53', '2023-10-10 03:28:53'),
	(35, '1', '010', '7', '10', '10', '10', 5, 5, 1, 1, 3, '2023-10-10 03:50:45', '2023-10-10 03:50:45'),
	(36, '2', '10', '10', '10', '10', NULL, 6, 5, 1, 1, 3, '2023-10-10 03:50:45', '2023-10-10 03:50:45'),
	(37, '1', '5', '5', '5', '3', '5', 3, 1, 1, 1, 2, '2023-10-11 04:58:26', '2023-10-11 04:58:26'),
	(38, '2', '4', '12', '10', '2', '120', 14, 1, 1, 1, 1, '2023-10-14 05:33:39', '2023-10-14 05:33:39'),
	(39, '3', '5', '12', NULL, NULL, 'nenhuma', 2, 3, 1, 1, 2, '2023-10-14 06:14:04', '2023-10-14 06:14:04'),
	(40, '2', '4', '15', NULL, NULL, NULL, 3, 1, 1, 1, 1, '2023-10-14 06:16:49', '2023-10-14 06:16:49'),
	(41, '1', '10', '10', '10', '9', '10', 5, 5, 3, 1, 3, '2023-11-15 05:11:03', '2023-11-15 05:11:03'),
	(42, '13', '10', '9', '10', '10', '10', 13, 7, 3, 1, 3, '2023-11-15 06:04:11', '2023-11-15 06:07:12'),
	(43, '6', '5', '2', NULL, NULL, NULL, 14, 1, 3, 1, 1, '2023-11-15 06:06:40', '2023-11-15 06:06:40'),
	(44, '15', '7', '5', NULL, NULL, NULL, 11, 2, 3, 1, 4, '2023-11-15 06:07:36', '2023-11-15 06:07:36'),
	(45, '2', '10', '10', NULL, NULL, NULL, 2, 3, 3, 1, 2, '2023-11-15 06:15:08', '2023-11-15 06:15:08'),
	(46, '3', '10', '10', NULL, NULL, NULL, 1, 3, 3, 1, 2, '2023-11-15 06:16:30', '2023-11-15 06:16:30'),
	(47, '4', '10', '10', NULL, NULL, NULL, 2, 3, 3, 1, 2, '2023-11-15 06:16:30', '2023-11-15 06:16:30'),
	(48, '5', '10', '10', NULL, NULL, NULL, 11, 2, 3, 1, 2, '2023-11-15 06:16:30', '2023-11-15 06:16:30'),
	(49, '6', '10', '10', NULL, NULL, NULL, 10, 2, 3, 1, 2, '2023-11-15 06:16:30', '2023-11-15 06:16:30'),
	(50, '1', '10', '10', NULL, NULL, NULL, 12, 7, 2, 2, 3, '2023-11-18 02:48:38', '2023-11-18 02:48:38'),
	(51, '1', '1', '1', NULL, NULL, NULL, 5, 5, 3, 1, 3, '2023-11-18 05:20:51', '2023-11-18 05:20:51'),
	(52, '4', '4', '4', NULL, NULL, NULL, 13, 7, 3, 1, 3, '2023-11-18 05:22:01', '2023-11-18 05:22:01'),
	(53, '1', '4', '4', NULL, NULL, NULL, 5, 5, 3, 1, 1, '2023-11-18 05:22:19', '2023-11-18 05:22:19'),
	(54, '1', '4', '4', NULL, NULL, NULL, 5, 5, 3, 1, 1, '2023-11-18 05:22:19', '2023-11-18 05:22:19'),
	(55, '1', '10', '10', NULL, NULL, NULL, 12, 7, 3, 1, 3, '2023-11-18 05:22:38', '2023-11-18 05:22:38'),
	(56, '1', '12', '12', '12', NULL, '12', 5, 5, 3, 1, 1, '2023-11-18 05:27:51', '2023-11-18 05:27:51'),
	(57, '3', '10', '10', NULL, NULL, NULL, 3, 1, 1, 1, 1, '2023-11-19 23:27:30', '2023-11-19 23:27:30'),
	(58, '4', '1', '2', NULL, NULL, NULL, 4, 1, 1, 1, 1, '2023-11-19 23:27:30', '2023-11-19 23:27:30'),
	(59, '1', '4', '8-12', 'Livre', '00:30s', 'teste', 9, 6, 3, 1, 3, '2023-11-26 02:37:17', '2023-11-26 02:37:17'),
	(60, '5', '4', '8-12', 'Livre', '00:30', 'TESTE', 9, 6, 3, 1, 3, '2023-11-26 02:37:17', '2023-11-26 02:37:17'),
	(61, '8', '4', '8-12', 'Livre', '00:30', 'teste', 13, 7, 3, 1, 1, '2023-11-26 02:43:26', '2023-11-26 02:43:26'),
	(62, '6', '6/5/4', '1-2', 'Livre', '00:30', 'teste', 5, 5, 1, 3, 3, '2023-11-26 03:22:58', '2023-11-26 03:22:58');

-- Copiando estrutura para tabela academia.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.migrations: ~11 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2023_07_10_153007_create_sessions_table', 1),
	(7, '2023_07_14_014001_create_muscleGroups_table', 1),
	(8, '2023_07_14_015739_create_exercises_table', 1),
	(9, '2023_07_14_035440_create_assessments_table', 1),
	(10, '2023_08_17_223550_create_training_division_table', 1),
	(11, '2024_07_14_024839_create_fichas_table', 1),
	(12, '2023_10_17_023744_create_called_table', 2),
	(13, '2023_10_16_042602_create_statistics_table', 3),
	(14, '2023_10_16_042601_create_statistics_table', 4);

-- Copiando estrutura para tabela academia.musclegroup
CREATE TABLE IF NOT EXISTS `musclegroup` (
  `id_gmuscle` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_gmuscle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_gmuscle`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.musclegroup: ~9 rows (aproximadamente)
INSERT INTO `musclegroup` (`id_gmuscle`, `name_gmuscle`, `created_at`, `updated_at`) VALUES
	(1, 'Perna', '2023-09-23 04:22:17', '2023-09-23 04:22:17'),
	(2, 'Ombro', '2023-09-23 04:22:22', '2023-09-23 04:22:22'),
	(3, 'Peito', '2023-09-23 04:22:27', '2023-09-23 04:22:27'),
	(4, 'Tríceps', '2023-09-23 04:22:33', '2023-09-23 04:22:33'),
	(5, 'Bíceps', '2023-09-23 04:22:40', '2023-09-23 04:22:40'),
	(6, 'Trapézio', '2023-09-23 04:22:57', '2023-09-23 04:22:57'),
	(7, 'Costas', '2023-09-23 04:33:08', '2023-09-23 04:33:08'),
	(11, 'teste', '2024-01-04 02:13:05', '2024-01-04 02:13:05');

-- Copiando estrutura para tabela academia.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.password_reset_tokens: ~1 rows (aproximadamente)
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('renanaragao159@gmail.com', '$2y$10$x6pXpuqzHfUJkIXtKMmNDej.rKhg2AjLB3K1GdqwLy.kFa6SBpdEW', '2023-12-19 01:30:15');

-- Copiando estrutura para tabela academia.personal_access_tokens
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

-- Copiando dados para a tabela academia.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela academia.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.sessions: ~1 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('z4YnQi2GCKaftvZFeazCgS2DYvJiAx9Nex8IIgqy', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic0VrR0tuUmtiMUczWkdNU2RQemVXOEIxVkNJc24ybHJ1WWhIeFN2RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9leGVyY2ljaW9zL3RhYmVsYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1704857035);

-- Copiando estrutura para tabela academia.statistics
CREATE TABLE IF NOT EXISTS `statistics` (
  `id_statistic` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user_fk` bigint unsigned NOT NULL,
  `id_ficha_fk` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_statistic`),
  KEY `statistics_id_user_fk_foreign` (`id_user_fk`),
  KEY `statistics_id_ficha_fk_foreign` (`id_ficha_fk`),
  CONSTRAINT `statistics_id_ficha_fk_foreign` FOREIGN KEY (`id_ficha_fk`) REFERENCES `fichas` (`id_ficha`) ON DELETE CASCADE,
  CONSTRAINT `statistics_id_user_fk_foreign` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.statistics: ~15 rows (aproximadamente)
INSERT INTO `statistics` (`id_statistic`, `id_user_fk`, `id_ficha_fk`, `created_at`, `updated_at`) VALUES
	(1, 1, 35, '2023-10-22 08:03:36', '2023-10-22 08:03:36'),
	(2, 1, 35, '2023-10-22 08:05:23', '2023-10-22 08:05:23'),
	(3, 1, 35, '2023-10-22 08:07:05', '2023-10-22 08:07:05'),
	(4, 1, 39, '2023-10-22 08:07:19', '2023-10-22 08:07:19'),
	(5, 1, 40, '2023-10-22 08:12:14', '2023-10-22 08:12:14'),
	(6, 1, 35, '2023-10-23 03:42:37', '2023-10-23 03:42:37'),
	(7, 1, 40, '2023-11-02 17:02:25', '2023-11-02 17:02:25'),
	(8, 1, 36, '2023-11-02 17:02:31', '2023-11-02 17:02:31'),
	(9, 1, 39, '2023-11-12 04:19:29', '2023-11-12 04:19:29'),
	(10, 1, 40, '2023-11-12 01:52:53', '2023-11-12 01:52:53'),
	(11, 1, 36, '2023-11-15 06:17:55', '2023-11-15 06:17:55'),
	(12, 2, 50, '2023-11-18 02:48:59', '2023-11-18 02:48:59'),
	(13, 1, 36, '2023-11-26 01:25:39', '2023-11-26 01:25:39'),
	(14, 1, 62, '2023-11-27 02:43:13', '2023-11-27 02:43:13'),
	(15, 1, 39, '2023-11-27 02:43:20', '2023-11-27 02:43:20'),
	(16, 1, 58, '2023-11-27 02:43:33', '2023-11-27 02:43:33'),
	(17, 1, 62, '2024-01-05 03:01:23', '2024-01-05 03:01:23');

-- Copiando estrutura para tabela academia.training_division
CREATE TABLE IF NOT EXISTS `training_division` (
  `id_training` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_training` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_training`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.training_division: ~5 rows (aproximadamente)
INSERT INTO `training_division` (`id_training`, `name_training`, `created_at`, `updated_at`) VALUES
	(1, 'Perna', '2023-09-23 04:20:41', '2023-09-23 04:20:41'),
	(2, 'Peito, Tríceps e Ombro', '2023-09-23 04:21:04', '2023-09-23 04:21:04'),
	(3, 'Costas, Bíceps e Trapézio', '2023-09-23 04:21:36', '2023-09-23 04:21:36'),
	(4, 'teste', '2023-09-23 04:21:58', '2023-09-23 04:21:58'),
	(9, 'teste', '2023-12-30 00:50:15', '2023-12-30 00:50:15');

-- Copiando estrutura para tabela academia.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `profile` int NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'image_default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.users: ~4 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `phone`, `sexo`, `date`, `profile`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(1, 'Renan da Silva Aragão', '85984174827', 'Masculino', '2023-10-22', 1, 'renanaragao159@gmail.com', NULL, '$2y$10$2VI9UtFck1r.pPN4eIGHDeOBRZ19BfnNAp5r/5GX/QTAhb2ZKAXEy', NULL, NULL, NULL, NULL, NULL, '656404ae9f7f5.jpeg', '2023-09-23 04:09:49', '2023-11-27 02:53:34'),
	(2, 'Maria Clara', '85984174827', 'Feminino', '2008-06-13', 0, 'renanaragao159159@gmail.com', NULL, '$2y$10$/TfDuoLQwFFC/rsu6QiEluQRMFWB6jW4mvOTlVoz0OIwwSnZmrrnO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-23 04:43:13', '2023-11-27 02:45:19'),
	(3, 'Juan Victor', '8598417482', 'Masculino', '2006-11-27', 2, 'renan@teste.com', NULL, '$2y$10$6BpDevgz2mjO3lT7T09Wxe/gH7q9PB3DebdLJlRCHhDVV7nyHIYb6', NULL, NULL, NULL, NULL, NULL, '6549ab559d0bd.jpg', '2023-09-23 04:44:03', '2023-11-07 06:13:25'),
	(4, 'Renan', NULL, NULL, NULL, 0, 'keltry@teste.com', NULL, '$2y$10$eyJfROlBpHzLUy.bfebPbu4yDB3tKuSsLF70ExvNih0TCxfEd2n16', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-10 03:23:00', '2023-10-10 03:23:00'),
	(5, 'teste', '85984174827', 'Masculino', '2000-02-10', 0, 'teste@testando.com.br', NULL, '$2y$10$Fve2EFNT/8ckPHj4hSEAOuFjxQDUl6N5vRmb1BXCzNVfnpChu7UyO', NULL, NULL, NULL, NULL, NULL, 'image_default.png', '2023-11-15 04:21:12', '2023-11-15 04:21:12'),
	(6, 'Luiza Teste', '8598417482', 'Feminino', '1999-12-24', 0, 'renan@teste.com.edu', NULL, '$2y$10$z7Tg35vThl5RIpHEDHg.JuhdQtZt6pbs.35/6uSlm/7nxys1xwNkq', NULL, NULL, NULL, NULL, NULL, 'image_default.png', '2024-01-04 02:06:40', '2024-01-04 02:06:40');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

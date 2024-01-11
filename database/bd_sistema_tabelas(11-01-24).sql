-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.35-0ubuntu0.22.04.1 - (Ubuntu)
-- OS do Servidor:               Linux
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
  `goal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `arm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forearm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breastplate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waist` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `glute` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thigh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user_fk` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_assessment`),
  KEY `assessments_id_user_fk_foreign` (`id_user_fk`),
  CONSTRAINT `assessments_id_user_fk_foreign` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.assessments: ~6 rows (aproximadamente)
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
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urgency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name_exercise` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_exercise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_image.jpg',
  `gif_exercise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default_gif.gif',
  `id_gmuscle_fk` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_exercise`),
  KEY `exercises_id_gmuscle_fk_foreign` (`id_gmuscle_fk`),
  CONSTRAINT `exercises_id_gmuscle_fk_foreign` FOREIGN KEY (`id_gmuscle_fk`) REFERENCES `muscleGroup` (`id_gmuscle`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.exercises: ~20 rows (aproximadamente)
INSERT INTO `exercises` (`id_exercise`, `name_exercise`, `image_exercise`, `gif_exercise`, `id_gmuscle_fk`, `created_at`, `updated_at`) VALUES
	(21, 'Agachamento Livre', 'c8065810271324cdb7ef199ac8a11137agachamento-livre.jpg', '1475f8a7f48ae76f1af5f57a4b056adeagachamento-livre.gif', 1, '2024-01-11 14:08:24', '2024-01-11 14:08:24'),
	(22, 'Agachamento Terra', '670edebf9518453c40f1fd3b475af23eagachamento-terra.jpg', '4e9465c6841f86685b9cc94b0b967b1bagachamento-terra.gif', 1, '2024-01-11 14:11:35', '2024-01-11 14:11:35'),
	(23, 'Abdução de Quadril', '1858232a44b7bbf43004ed1a5d9eab8fabducao-de-quadril.png', 'd18286c6c7e2abd31cf12c6d76985a28abducao-de-quadril.gif', 1, '2024-01-11 14:22:52', '2024-01-11 14:23:17'),
	(24, 'Agachamento Afundo c/ Barra', '19d0c26b59832ee25bee9ab5dbbf1400agachamento-afundo-c-barra.jpg', 'c64a9f8285bce9300ddd64cd119557e8agachamento-afundo-c-barra.gif', 1, '2024-01-11 14:24:21', '2024-01-11 14:24:21'),
	(25, 'Avanço', '2828966a4b6bb8e7e5fcea5190e991b9avanco.jpg', '6aed7525f5cca5b56f7bdb56577a2081avanco.gif', 1, '2024-01-11 14:28:17', '2024-01-11 14:28:17'),
	(26, 'Avanço Guiado', '1ed674abe2a0989e132f1763e6e35531avanco-guiado.jpg', 'cc7f78539530bc61e80bd7efb06b37afavanco-guiado.gif', 1, '2024-01-11 14:30:03', '2024-01-11 14:30:03'),
	(27, 'Cadeira Extensora', 'c72beb30cfd88707ec3f46dfca641847cadeira-extensora.jpg', 'e830c0eed97681bedcdd70cc7e60c296cadeira-extensora.gif', 1, '2024-01-11 14:31:45', '2024-01-11 14:31:45'),
	(28, 'Cadeira Flexora', 'a716e9fc3f5921719958cdc87f9ffa90cadeira-flexora.jpg', 'eb6114375ee2b784b698800e71619e39cadeira-flexora.gif', 1, '2024-01-11 14:35:18', '2024-01-11 14:35:18'),
	(29, 'Coice', '424ed188e3d1ca42cdef87a6a9f26bd6coice.jpg', '31ecf490e7526f24e2a7faeac76e11a0coice.gif', 1, '2024-01-11 14:49:12', '2024-01-11 14:49:12'),
	(30, 'Elevação Pelvica', 'f7a1f1d8a6b92a8c36efc6c45e6957d7elevacao-pelvica.jpg', '35b08c1bb0d4d3ff5b08ba0c25b014b9elevacao-pelvica.gif', 1, '2024-01-11 14:50:04', '2024-01-11 14:50:04'),
	(31, 'Extensão de Quadril', '534eba396a8516877712811a217cef82extensao-de-quadril.jpg', 'b30cccbe724f2f0be983903f4879d059extensao-de-quadril.gif', 1, '2024-01-11 14:53:40', '2024-01-11 14:53:40'),
	(32, 'Mesa Flexora', '2c2bb0091318787126fb6f0c99474f0bmesa-flexora.jpg', 'aed616913b0ef3c45c9a375fe4b5a378mesa-flexora.gif', 1, '2024-01-11 14:54:59', '2024-01-11 14:54:59'),
	(33, 'Panturrilha na Barra', '4fef06d9b417b13953c2ab2420ab4d98panturrilha-na-barra.png', '2b63f33d257f5a2b7afbd02a7dd9a3c2panturrilha-na-barra.gif', 1, '2024-01-11 14:56:22', '2024-01-11 14:56:22'),
	(34, 'Panturrilha Maquina', '1b906171c8e96c01be34d3d2ba562090panturrilha-maquina.jpg', '404a6954f84e1f46b317ecd0ffb6c592panturrilha-maquina.gif', 1, '2024-01-11 15:00:11', '2024-01-11 15:00:11'),
	(35, 'Passada', 'ed7a75af915d2d4c219c0b660ac664f1passada.jpg', '817de519806ee3b1a941dabf19edd08apassada.gif', 1, '2024-01-11 15:01:03', '2024-01-11 15:01:03'),
	(36, 'Stiff', '8dbe0689a99c5a1aab8d3bd5912d504estiff.jpg', 'cb61183b147067f1994ee01d87702885stiff.gif', 1, '2024-01-11 15:06:05', '2024-01-11 15:06:05'),
	(37, 'Sumô', '37debb67a77ff4213525501dbc3bf267agachamento-sumo.jpg', '5b3a992ec2c340b4964516c85ccd3dffagachamento-sumo.gif', 1, '2024-01-11 15:06:58', '2024-01-11 15:07:26'),
	(38, 'Agachamento Guiado', '50c30f5dec602e05e034a790e5a2f000agachamento-guiado.jpg', 'ac9c5ac00b367c9b538eb7fd5e600435agachamento-guiado.gif', 1, '2024-01-11 15:40:11', '2024-01-11 15:40:11'),
	(39, 'Hack', 'eb736a4e8b17481c2e224ced974618bbhack.jpg', '714695805a373a4b75be0c183765db72hack.gif', 1, '2024-01-11 15:40:52', '2024-01-11 15:40:52'),
	(40, 'Hack Invertido', 'a555a9b3d04507f42d7c9700cd8de0c0hack-invertido.jpg', '26bb2554b8ad176548f1b6d76a8e3dc9hack-invertido.gif', 1, '2024-01-11 15:41:54', '2024-01-11 15:41:54'),
	(41, 'Leg 45°', '3ca0b7f154d239eb7c1c8f55b22fda48leg-45.jpg', 'dd5027744f41463458561c68ac6fa566leg-45.gif', 1, '2024-01-11 15:42:54', '2024-01-11 15:42:54'),
	(43, 'Leg Press', 'dcd49b15f84637132afac715f42313f0leg-press.jpg', '9fb84cb02b1b0623b62a787e558c297eleg-press.gif', 1, '2024-01-11 15:45:08', '2024-01-11 15:45:08'),
	(44, 'Leg 45° Unilateral', '8204e14c77d0a8c6cbf5de7e61c12881leg-45-unilateral.jpg', '923a53458fc4c9956b7398c9df8ca793leg-45-unilateral.gif', 1, '2024-01-11 15:46:26', '2024-01-11 15:46:26'),
	(45, 'Leg Press Unilateral', 'f6a1115d0a4f373a734f77f851dc4cbcleg-press-unilateral.jpg', 'default_gif.gif', 1, '2024-01-11 15:48:26', '2024-01-11 15:48:26'),
	(47, 'Crossover', '867663e5bafde393baade50659450db7crossover.jpg', '567b7574ee5be10a73c93224162db19fcrossover.gif', 3, '2024-01-11 16:24:40', '2024-01-11 16:24:40'),
	(48, 'Crossover Baixo', 'e306dd82a4e2d6d03b27978e52b949f8crossover-baixo.jpg', '56a98735ffc991f277944ba74b913ee9crossover-baixo.gif', 3, '2024-01-11 16:40:22', '2024-01-11 16:40:22'),
	(49, 'Crossover Medio', '47e1e3b222f35b871ef72ec6e5735d2dcrossover-medio.jpg', 'efdef078aee761467013b3d307ae6c5bcrossover-medio.gif', 3, '2024-01-11 16:41:13', '2024-01-11 16:41:13'),
	(50, 'Crucifixo', 'd30ca368d68e417e543c06c5496d94d1crucifixo.jpg', 'de4400509363340c5585d8d8dab7181fcrucifixo.gif', 3, '2024-01-11 16:42:50', '2024-01-11 16:42:50'),
	(52, 'Crucifixo Máquina', '1a5eedf5f6cc4ae4949222f77ce71263crucifixo-maquina.jpg', 'default_gif.gif', 3, '2024-01-11 18:35:22', '2024-01-11 18:35:22'),
	(53, 'Crucifixo Reto', '2237064b1ec8133019d2044de08a21d6crucifixo-reto.jpg', 'b0ad7009f99262c3108d0eae11821448crucifixo-reto.gif', 3, '2024-01-11 18:37:33', '2024-01-11 18:37:33');

-- Copiando estrutura para tabela academia.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela academia.fichas
CREATE TABLE IF NOT EXISTS `fichas` (
  `id_ficha` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `repetition` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Livre',
  `rest` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '00:30s',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  CONSTRAINT `fichas_id_gmuscle_fk_to_ficha_foreign` FOREIGN KEY (`id_gmuscle_fk_to_ficha`) REFERENCES `muscleGroup` (`id_gmuscle`) ON DELETE CASCADE,
  CONSTRAINT `fichas_id_training_fk_foreign` FOREIGN KEY (`id_training_fk`) REFERENCES `training_division` (`id_training`) ON DELETE CASCADE,
  CONSTRAINT `fichas_id_user_creator_fk_foreign` FOREIGN KEY (`id_user_creator_fk`) REFERENCES `users` (`id`),
  CONSTRAINT `fichas_id_user_fk_foreign` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.fichas: ~29 rows (aproximadamente)

-- Copiando estrutura para tabela academia.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.migrations: ~14 rows (aproximadamente)
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

-- Copiando estrutura para tabela academia.muscleGroup
CREATE TABLE IF NOT EXISTS `muscleGroup` (
  `id_gmuscle` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_gmuscle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_gmuscle`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.muscleGroup: ~8 rows (aproximadamente)
INSERT INTO `muscleGroup` (`id_gmuscle`, `name_gmuscle`, `created_at`, `updated_at`) VALUES
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.password_reset_tokens: ~1 rows (aproximadamente)
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('renanaragao159@gmail.com', '$2y$10$x6pXpuqzHfUJkIXtKMmNDej.rKhg2AjLB3K1GdqwLy.kFa6SBpdEW', '2023-12-19 01:30:15');

-- Copiando estrutura para tabela academia.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.sessions: ~2 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('94Iw6FiZz8w9t3ufKzPwEnN288Vs7n6NsCjkljZd', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:120.0) Gecko/20100101 Firefox/120.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ2dHWGxVNE84d3lyY2dWeXVSdUQ0a29oNm5mWlVMOW9PRmduTHdMQyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZXhlcmNpY2lvcy9jcmlhciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1704998282);

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

-- Copiando dados para a tabela academia.statistics: ~17 rows (aproximadamente)

-- Copiando estrutura para tabela academia.training_division
CREATE TABLE IF NOT EXISTS `training_division` (
  `id_training` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_training` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `profile` int NOT NULL DEFAULT '0',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'image_default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.users: ~6 rows (aproximadamente)
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

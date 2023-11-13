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

-- Copiando dados para a tabela academia.assessments: ~5 rows (aproximadamente)
INSERT INTO `assessments` (`id_assessment`, `goal`, `observation`, `term`, `height`, `weight`, `arm`, `forearm`, `breastplate`, `back`, `waist`, `glute`, `hip`, `thigh`, `calf`, `id_user_fk`, `created_at`, `updated_at`) VALUES
	(1, 'Hipertrofia', '10', '2 Meses', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', 1, '2023-09-23 04:46:12', '2023-09-23 04:46:12'),
	(2, 'Hipertrofia', NULL, '1 Mês', '10', '10', '12.5', '14.63', '25.63', '12.56', '20.30', '14.60', '35.60', '14.90', '16.17', 1, '2023-09-24 04:34:08', '2023-09-24 04:34:08'),
	(3, 'Hipertrofia', 'teste', '1 Mês', '178', '80.20', '42.20', '32.10', '45.30', '14.23', '21.15', '27.36', '13.25', '42.39', '36.14', 1, '2023-10-16 05:01:20', '2023-10-16 05:01:20'),
	(4, 'Hipertrofia', 'teste', '1 Mês', '1.80', '65.60', '14.60', '25.14', '24.96', '31.33', '21.41', '19.25', '22.87', '14.36', '11.48', 3, '2023-10-22 06:10:55', '2023-10-22 06:10:55'),
	(6, 'Hipertrofia', NULL, '1 Mês', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', 3, '2023-10-22 06:17:27', '2023-10-22 06:17:27');

-- Copiando dados para a tabela academia.calleds: ~2 rows (aproximadamente)
INSERT INTO `calleds` (`id_called`, `user_name`, `urgency`, `title`, `subject`, `id_instructor_fk`, `id_user_fk`, `created_at`, `updated_at`) VALUES
	(2, 'Juan Victor', 'Urgente', 'solicito uma avaliação nova', 'preciso que faça uma avaliação para min urgente', 2, 3, '2023-10-21 05:55:32', '2023-10-21 05:55:32'),
	(3, 'Renan da Silva Aragãoo', 'Urgente', 'Criar ficha', 'Crie uma ficha para min', 2, 1, '2023-10-21 06:43:05', '2023-10-21 06:43:05'),
	(4, 'Renan da Silva Aragãoo', 'Urgente', 'teste', 'teste', 2, 1, '2023-10-22 08:22:30', '2023-10-22 08:22:30');

-- Copiando dados para a tabela academia.exercises: ~13 rows (aproximadamente)
INSERT INTO `exercises` (`id_exercise`, `name_exercise`, `image_exercise`, `gif_exercise`, `id_gmuscle_fk`, `created_at`, `updated_at`) VALUES
	(1, 'Supino Reto', 'default_image.jpg', NULL, 3, '2023-09-23 04:29:15', '2023-09-23 04:29:15'),
	(2, 'Crucifixo', 'default_image.jpg', NULL, 3, '2023-09-23 04:30:21', '2023-09-23 04:30:21'),
	(3, 'Agachamento Livre', 'default_image.jpg', NULL, 1, '2023-09-23 04:30:39', '2023-09-23 04:30:39'),
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
	(15, 'teste', 'default_image.jpg', 'default_gif.gif', 5, '2023-10-14 05:30:46', '2023-10-14 05:30:46');

-- Copiando dados para a tabela academia.failed_jobs: ~0 rows (aproximadamente)

-- Copiando dados para a tabela academia.fichas: ~8 rows (aproximadamente)
INSERT INTO `fichas` (`id_ficha`, `order`, `serie`, `repetition`, `weight`, `rest`, `description`, `id_exercise_fk`, `id_gmuscle_fk_to_ficha`, `id_user_fk`, `id_user_creator_fk`, `id_training_fk`, `created_at`, `updated_at`) VALUES
	(19, '1', '10', '10', '10', '10', '10', 5, 5, 2, 1, 3, '2023-09-24 03:29:57', '2023-09-24 03:29:57'),
	(20, '1', '10', '10', '10', '10', '10', 5, 5, 2, 1, 3, '2023-09-24 03:31:19', '2023-09-24 03:31:19'),
	(34, '1', '10', '10', '11', '10', NULL, 5, 5, 4, 1, 3, '2023-10-10 03:28:53', '2023-10-10 03:28:53'),
	(35, '1', '010', '7', '10', '10', '10', 5, 5, 1, 1, 3, '2023-10-10 03:50:45', '2023-10-10 03:50:45'),
	(36, '2', '10', '10', '10', '10', NULL, 6, 5, 1, 1, 3, '2023-10-10 03:50:45', '2023-10-10 03:50:45'),
	(37, '1', '5', '5', '5', '3', '5', 3, 1, 1, 1, 2, '2023-10-11 04:58:26', '2023-10-11 04:58:26'),
	(38, '2', '4', '12', '10', '2', '120', 14, 1, 1, 1, 1, '2023-10-14 05:33:39', '2023-10-14 05:33:39'),
	(39, '3', '5', '12', NULL, NULL, 'nenhuma', 2, 3, 1, 1, 2, '2023-10-14 06:14:04', '2023-10-14 06:14:04'),
	(40, '2', '4', '15', NULL, NULL, NULL, 3, 1, 1, 1, 1, '2023-10-14 06:16:49', '2023-10-14 06:16:49');

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

-- Copiando dados para a tabela academia.musclegroup: ~6 rows (aproximadamente)
INSERT INTO `musclegroup` (`id_gmuscle`, `name_gmuscle`, `created_at`, `updated_at`) VALUES
	(1, 'Perna', '2023-09-23 04:22:17', '2023-09-23 04:22:17'),
	(2, 'Ombro', '2023-09-23 04:22:22', '2023-09-23 04:22:22'),
	(3, 'Peito', '2023-09-23 04:22:27', '2023-09-23 04:22:27'),
	(4, 'Tríceps', '2023-09-23 04:22:33', '2023-09-23 04:22:33'),
	(5, 'Bíceps', '2023-09-23 04:22:40', '2023-09-23 04:22:40'),
	(6, 'Trapézio', '2023-09-23 04:22:57', '2023-09-23 04:22:57'),
	(7, 'Costas', '2023-09-23 04:33:08', '2023-09-23 04:33:08');

-- Copiando dados para a tabela academia.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando dados para a tabela academia.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando dados para a tabela academia.sessions: ~4 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('6obkR2AKomSVRQp4QoUjDuR2bPYaMO4g19Tockzw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVDlpdFJFdk5xNTNPdWxmUmh1cjVabEMzNVZpbHFnV0d3Q3JNN01uaiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2hvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1699754349),
	('F8TSSV8wRCFIlPeKdqOAUhgrWyGLiz2tLzW2OAcf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUUE5bVM4cmhqWTJKcnRzOVFLVDdVamU1aElqRDFVMVRsd2phN0ZlVSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2VzdGF0aXN0aWNhcy9pbmljaW8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2VzdGF0aXN0aWNhcy9pbmljaW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1699751547),
	('fuiiyELpHq28EYdenadVfKRr50HYLkkJmQVwRMeo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRDVyVXByeUtyaUV6VTlVcmd6NEwwTmFyV0Z4M1RtYVFCWlVVeGhJTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1699754350),
	('keTFCV2IaoE5GMcUknwc7a9g7fcQ3QVxjCSvCQvH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/119.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib3ZxMUJWQ1lEaEhaWUU0ZHlJUmZnUkJSRHlOcHNDZWdwR2ZrallPUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hbHVub3MvY2FsbGVkLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1699756089);

-- Copiando dados para a tabela academia.statistics: ~8 rows (aproximadamente)
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
	(10, 1, 40, '2023-11-12 01:52:53', '2023-11-12 01:52:53');

-- Copiando dados para a tabela academia.training_division: ~4 rows (aproximadamente)
INSERT INTO `training_division` (`id_training`, `name_training`, `created_at`, `updated_at`) VALUES
	(1, 'Perna', '2023-09-23 04:20:41', '2023-09-23 04:20:41'),
	(2, 'Peito, Tríceps e Ombro', '2023-09-23 04:21:04', '2023-09-23 04:21:04'),
	(3, 'Costas, Bíceps e Trapézio', '2023-09-23 04:21:36', '2023-09-23 04:21:36'),
	(4, 'teste', '2023-09-23 04:21:58', '2023-09-23 04:21:58');

-- Copiando dados para a tabela academia.users: ~4 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `phone`, `sexo`, `date`, `profile`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(1, 'Renan da Silva Aragão', '85984174827', 'Masculino', '2023-10-22', 0, 'renanaragao159@gmail.com', NULL, '$2y$10$2VI9UtFck1r.pPN4eIGHDeOBRZ19BfnNAp5r/5GX/QTAhb2ZKAXEy', NULL, NULL, NULL, NULL, NULL, 'image_default.png', '2023-09-23 04:09:49', '2023-11-08 05:41:52'),
	(2, 'Maria Clara', '85984174827', 'Feminino', '2008-06-13', 1, 'renanaragao159159@gmail.com', NULL, '$2y$10$/TfDuoLQwFFC/rsu6QiEluQRMFWB6jW4mvOTlVoz0OIwwSnZmrrnO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-23 04:43:13', '2023-09-23 04:43:13'),
	(3, 'Juan Victor', '8598417482', 'Masculino', '2006-11-27', 2, 'renan@teste.com', NULL, '$2y$10$6BpDevgz2mjO3lT7T09Wxe/gH7q9PB3DebdLJlRCHhDVV7nyHIYb6', NULL, NULL, NULL, NULL, NULL, '6549ab559d0bd.jpg', '2023-09-23 04:44:03', '2023-11-07 06:13:25'),
	(4, 'Renan', NULL, NULL, NULL, 0, 'keltry@teste.com', NULL, '$2y$10$eyJfROlBpHzLUy.bfebPbu4yDB3tKuSsLF70ExvNih0TCxfEd2n16', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-10 03:23:00', '2023-10-10 03:23:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

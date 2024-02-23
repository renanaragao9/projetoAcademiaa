-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.36-0ubuntu0.22.04.1 - (Ubuntu)
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
  CONSTRAINT `exercises_id_gmuscle_fk_foreign` FOREIGN KEY (`id_gmuscle_fk`) REFERENCES `musclegroup` (`id_gmuscle`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.exercises: ~109 rows (aproximadamente)
INSERT INTO `exercises` (`id_exercise`, `name_exercise`, `image_exercise`, `gif_exercise`, `id_gmuscle_fk`, `created_at`, `updated_at`) VALUES
	(21, 'Agachamento Livre', 'c8065810271324cdb7ef199ac8a11137agachamento-livre.jpg', '1475f8a7f48ae76f1af5f57a4b056adeagachamento-livre.gif', 1, '2024-01-11 14:08:24', '2024-01-11 14:08:24'),
	(22, 'Agachamento Terra', '670edebf9518453c40f1fd3b475af23eagachamento-terra.jpg', '4e9465c6841f86685b9cc94b0b967b1bagachamento-terra.gif', 1, '2024-01-11 14:11:35', '2024-01-11 14:11:35'),
	(23, 'Abdução de Quadril', '1858232a44b7bbf43004ed1a5d9eab8fabducao-de-quadril.png', 'd18286c6c7e2abd31cf12c6d76985a28abducao-de-quadril.gif', 1, '2024-01-11 14:22:52', '2024-01-11 14:23:17'),
	(24, 'Agachamento Afundo - Barra', '19d0c26b59832ee25bee9ab5dbbf1400agachamento-afundo-c-barra.jpg', 'c64a9f8285bce9300ddd64cd119557e8agachamento-afundo-c-barra.gif', 1, '2024-01-11 14:24:21', '2024-01-26 02:41:20'),
	(25, 'Avanço', '2828966a4b6bb8e7e5fcea5190e991b9avanco.jpg', '6aed7525f5cca5b56f7bdb56577a2081avanco.gif', 1, '2024-01-11 14:28:17', '2024-01-11 14:28:17'),
	(26, 'Avanço Guiado', '1ed674abe2a0989e132f1763e6e35531avanco-guiado.jpg', 'cc7f78539530bc61e80bd7efb06b37afavanco-guiado.gif', 1, '2024-01-11 14:30:03', '2024-01-11 14:30:03'),
	(27, 'Cadeira Extensora', 'c72beb30cfd88707ec3f46dfca641847cadeira-extensora.jpg', 'e830c0eed97681bedcdd70cc7e60c296cadeira-extensora.gif', 1, '2024-01-11 14:31:45', '2024-01-11 14:31:45'),
	(28, 'Cadeira Flexora', 'a716e9fc3f5921719958cdc87f9ffa90cadeira-flexora.jpg', 'eb6114375ee2b784b698800e71619e39cadeira-flexora.gif', 1, '2024-01-11 14:35:18', '2024-01-11 14:35:18'),
	(29, 'Extensçao de Quadril', '424ed188e3d1ca42cdef87a6a9f26bd6coice.jpg', '31ecf490e7526f24e2a7faeac76e11a0coice.gif', 1, '2024-01-11 14:49:12', '2024-01-26 01:59:44'),
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
	(53, 'Crucifixo Reto', '2237064b1ec8133019d2044de08a21d6crucifixo-reto.jpg', 'b0ad7009f99262c3108d0eae11821448crucifixo-reto.gif', 3, '2024-01-11 18:37:33', '2024-01-11 18:37:33'),
	(54, 'Peck Deck', '00f8e4095bfbebc50094aa1963198959peck-deck.jpg', 'bcc370006e69f4877a85c8455e8dcb94peck-deck.gif', 3, '2024-01-12 13:25:05', '2024-01-12 13:25:05'),
	(55, 'Supino 45º', 'fb0a9d012730500aa610e146f6f50aeesupino-45o.jpg', '2a6c390f5bb6f1ed9b50716e7cfeead5supino-45o.gif', 3, '2024-01-12 13:26:11', '2024-01-12 13:26:11'),
	(56, 'Supino 45º Maquina', 'bd9f8f2b85f28db1c84b66803d7876eesupino-45o-maquina.jpg', '0667937005a7e807cc213a0610974eb0supino-45o-maquina.gif', 3, '2024-01-12 13:27:05', '2024-01-12 13:27:05'),
	(57, 'Supino 45º - Halteres', '762fb0df56f0d45eda6ec460db68fde0supino-45o-c-halteres.jpg', '2942c0601f298e9c011158fe6c307925supino-45o-c-halteres.gif', 3, '2024-01-12 13:29:02', '2024-01-26 03:10:00'),
	(58, 'Supino - Halteres', 'f017ff1eb72fa821a22900aa6e208a0asupino-c-halteres.jpg', 'f15f393a240940678cd39ba8eb868ebesupino-c-halteres.gif', 3, '2024-01-12 13:30:33', '2024-01-26 03:10:19'),
	(59, 'Supino Declinado', '7a34dad7354f83f2b4b0d696f552337dsupino-declinado.jpg', 'default_gif.gif', 3, '2024-01-12 13:33:15', '2024-01-12 13:33:15'),
	(60, 'Supino 45° Guiado', 'ef76def4631baa792ab44c7e0ccda3f5supino-45-guiado.jpg', '83bc418c7d75713935df60aa55742ebcsupino-45-guiado.gif', 3, '2024-01-12 13:34:17', '2024-01-12 13:34:17'),
	(61, 'Supino Maquina', 'dc2306c98f6963bf2889f97f24547653supino-maquina.jpg', '7822d5facd87937f4fd132893e9db183supino-maquina.gif', 3, '2024-01-12 13:35:56', '2024-01-12 13:35:56'),
	(63, 'Supino', '5b50798513627f8cc7f73ad88a01a093supino.jpg', '0d1c95c1bb589bb59cb2ec533400cb68supino.gif', 3, '2024-01-12 13:47:30', '2024-01-12 13:47:30'),
	(64, 'Supino Fechado', '5a357e6906dfb8f4b4e62a71ac24f440supino-fechado.jpg', 'default_gif.gif', 3, '2024-01-12 13:48:09', '2024-01-12 13:48:09'),
	(65, 'Supino Guiado', 'baf3af2e973db1ee2f81f7b1aa3bd17fsupino-guiado.jpg', 'ea6539f7f4d5b70a120fa2e388529770supino-guiado.gif', 3, '2024-01-12 13:49:02', '2024-01-12 13:49:02'),
	(66, 'Barra Fixa', '50775f5dc13983bce0c88e208a53e560barra-fixa.jpg', '576b9185c24574fdbe985c4198f29253barra-fixa.gif', 7, '2024-01-12 13:52:14', '2024-01-12 13:52:14'),
	(67, 'Barra Paralela', 'c2f48e869b871068ce276141b89f0459barra-paralela.jpg', '56b04edfdb7307a29f645ba65dbf0661barra-paralela.gif', 3, '2024-01-12 13:55:22', '2024-01-12 13:55:22'),
	(68, 'Encolhimento', 'e3218d5953b311336785e934e671a71eencolhimento.jpg', '610fc7de7a122e15635e2cfcad067bceencolhimento.gif', 6, '2024-01-12 13:57:54', '2024-01-12 13:57:54'),
	(69, 'Encolhimento - Halteres', '1a81042aa94c793c0ca5e6d42c99281bencolhimento-c-halteres.jpg', '809a63ead50c8db6ebd7a75eea731a08encolhimento-c-halteres.gif', 6, '2024-01-12 13:59:34', '2024-01-26 03:08:01'),
	(70, 'Face Pull', '68dd229c4fa52ef4cea3f7ded1b37a84face-pull.jpg', '994c0d3e28689ffaa0a8c978fa251e82face-pull.gif', 7, '2024-01-12 14:01:43', '2024-01-12 14:01:43'),
	(71, 'Crucifixo Invertido', '28bf8107af3057a9170649ede1eb5af9crucifixo-invertido.jpg', 'b1c58bfef35c0fe4cfc07ddb7b9d2885crucifixo-invertido.gif', 7, '2024-01-12 14:05:20', '2024-01-12 14:05:20'),
	(72, 'Peck Deck Invertido', '773134aba019bdde84a7305249566497pack-deck-invertido.jpg', '9ef6168e30c6b7696ff734e9aa018a62pack-deck-invertido.gif', 7, '2024-01-12 14:07:29', '2024-01-12 14:07:54'),
	(73, 'Pull Down Maquina', '0928463ca020cbcf5e2e634de3228784pull-down-maquina.jpg', 'b7628147d5876cea2f65f94b55449716pull-down-maquina.gif', 7, '2024-01-12 14:09:40', '2024-01-12 14:09:40'),
	(74, 'Pull Down Inverso Maquina', '2f0a72faea884d25f8ad8d8a0869e93fpull-down-inverso-maquina.png', '05440d306986174c13f60bb0ac6a7d88pull-down-inverso-maquina.gif', 7, '2024-01-12 14:11:08', '2024-01-12 14:11:08'),
	(75, 'Pull Down', '7dbfe9dcbcf110b4c9d289f2199a6a06pull-down.jpg', 'd01ab182592d5ee74957a605d0ec87b6pull-down.gif', 7, '2024-01-12 14:11:41', '2024-01-12 14:11:41'),
	(76, 'Puxada Frontal', 'cba404231a2df95f0ec48c38beeceac6puxada-frontal.jpg', '0f138d7a0a1b6be773bfc3121bd161d5puxada-frontal.gif', 7, '2024-01-12 14:12:37', '2024-01-12 14:12:37'),
	(77, 'Remada Alta Polia', '66317198da4efb608c65eb8d0c3de9b7remada-alta-polia.jpg', 'a97618ae0b4120ffaae56b468f72760dremada-alta-polia.gif', 7, '2024-01-12 14:21:28', '2024-01-12 14:21:28'),
	(78, 'Remada Alta', 'a2b72320cdb5d6d68d5da6a43d1b6bedremada-alta.png', '3b9b73141bddd8127008920f29cf38cfremada-alta.gif', 7, '2024-01-12 14:23:35', '2024-01-12 14:23:35'),
	(79, 'Remada Cavalinho', 'ab90268a44ede653e77914c0792f44deremada-cavalinho.jpg', '3da75b65081d4b348c46fbb6810b7e50remada-cavalinho.gif', 7, '2024-01-12 14:32:33', '2024-01-12 14:32:33'),
	(80, 'Remada Curvada', 'b0c5455ee4fdf4a3114315f2d6388a7bremada-curvada.jpg', 'f7ebeda01cca4895c6a98f8f88f86485remada-curvada.gif', 7, '2024-01-12 14:33:46', '2024-01-12 14:33:46'),
	(81, 'Remada Curvada - Halteres', 'c2f7b69a555f304780f8460d4facae9fremada-curvada-c-halteres.jpg', '090aadeccec8a727c472ecb2e2938fbcremada-curvada-c-halteres.gif', 7, '2024-01-12 14:34:59', '2024-01-26 03:09:09'),
	(82, 'Remada Maquina', '94753e9a3286fcabb32421959c4d57a5remada-maquina.jpg', 'f7a52f25f3900c4dd3fa971bed6b4db3remada-maquina.gif', 7, '2024-01-12 14:36:24', '2024-01-12 14:36:24'),
	(83, 'Remada Sentada', '413a2f4b72f83bed97f27fcf36e75ba6remada-sentada.jpg', '1c7b6e91895eb868f87a678eb652a9f3remada-sentada.gif', 7, '2024-01-12 14:40:52', '2024-01-12 14:40:52'),
	(84, 'Remada no Banco Inclinado', '61ad432eb67e82333926ce7299a2086dremada-no-banco-inclinado.jpg', '2c565e9b9782b96b716ab243060fa42aremada-no-banco-inclinado.gif', 7, '2024-01-12 14:45:44', '2024-01-12 14:45:44'),
	(85, 'Puxada Baixa', 'bb703c595cccf82fda3e8295311446a1puxada-baixa.jpg', '880e94885aa6f9c4860072964cb5b51fpuxada-baixa.gif', 7, '2024-01-12 14:50:04', '2024-01-12 14:50:04'),
	(86, 'Remada Unilateral Polia Baixa', 'e1baee256b80d4e2eccfb4061367098cremada-unilateral-polia-baixa.jpg', 'cc57aea828466482a6a1506fa0a19f2eremada-unilateral-polia-baixa.gif', 7, '2024-01-12 15:04:40', '2024-01-12 15:04:40'),
	(87, 'Remada Unilateral Sentado', '9eb0194affb3cd55927fd2a096c4cbberemada-unilateral-sentado.jpg', 'b380548ae0bc01d7987d105f596f00acremada-unilateral-sentado.gif', 7, '2024-01-12 15:09:18', '2024-01-12 15:09:18'),
	(88, 'Remada Unilateral', 'f7607862fd5e3be78c59d28a9173a2adremada-unilateral.jpg', '92d8ddd505020b410242223ebfe1422fremada-unilateral.gif', 7, '2024-01-12 15:11:14', '2024-01-12 15:11:14'),
	(89, 'Puxada Triangulo', 'a27e4ee9d313c6ded746f157f29efa1bpuxada-triangulo.jpg', '501788cadfd783d88b05309858de8e6apuxada-triangulo.gif', 7, '2024-01-12 15:34:51', '2024-01-12 15:34:51'),
	(90, 'Puxada Baixa - Triangulo', 'cd04e01c15ffe8eb80499ecff29e62ec.jpg', '9568c825b2ddda180e6f7dc5284d8bcepuxada-baixa-c-triangulo.gif', 7, '2024-01-12 16:04:50', '2024-01-26 03:08:46'),
	(91, 'Rosca 21', 'c404d284d7b390d8154eb66a0cac9633rosca-21.png', 'default_gif.gif', 5, '2024-01-24 00:00:50', '2024-01-24 00:00:50'),
	(92, 'Rosca Concentrada', 'fb38cb946757a665b973f49c7031259arosca-concentrada.jpg', 'a466df003926172d30886fb0266bc1b0rosca-concentrada.gif', 5, '2024-01-24 00:01:47', '2024-01-24 00:01:47'),
	(93, 'Rosca Direta - Barra', '2d6d9133cd3c70b895915e61201a54e7rosca-direta-barra.png', 'b037f6d44c08267a59f79e0dcb61df4frosca-direta-barra.gif', 5, '2024-01-24 00:04:17', '2024-01-24 00:04:17'),
	(94, 'Rosca Direta - Barra W', 'a7089704d6614ee58287d68702913cb0rosca-direta-barra-w.png', '32f628485750f027305cef80dfd169a9rosca-direta-barra-w.gif', 5, '2024-01-24 00:04:56', '2024-01-24 00:04:56'),
	(95, 'Rosca Direta - Halteres', 'b88f830e6f23826d06852903b15b83b7rosca-direta-halteres.png', '0287ba0678cce81ccbe5891b2cc3728crosca-direta-halteres.gif', 5, '2024-01-24 00:05:37', '2024-01-24 00:05:37'),
	(96, 'Rosca Direta - Polia', 'a278f17cd277d291e24bd66110b2caa8rosca-direta-polia.png', '6e56509f3fdc77a6df4563a9f824d962rosca-direta-polia.gif', 5, '2024-01-24 00:07:20', '2024-01-24 00:07:20'),
	(97, 'Rosca Inclinada', 'd88064d6c063ddc48910ca3366e9ef60rosca-inclinada.png', '2f787ddc004d7f8b4ccd664930e15c03rosca-inclinada.gif', 5, '2024-01-24 00:32:43', '2024-01-24 00:32:43'),
	(98, 'Rosca Alternada', '39e358667f5af17b12862bdfc894237drosca-alternada.jpg', 'a358c7316433f649582c13e18a02a10crosca-alternada.gif', 5, '2024-01-24 01:29:56', '2024-01-24 01:29:56'),
	(99, 'Rosca Martelo Alternada', '8493570ecf191e64188ab5a9585690e6rosca-martelo-alternada.jpg', 'fab3c7b109142a8a304744241d90cd8frosca-martelo-alternada.gif', 5, '2024-01-24 01:31:41', '2024-01-26 03:09:39'),
	(100, 'Rosca Martelo', '9f4c7306771b7836082bf3a190aededcrosca-martelo.png', '05403f4c5522130e4da5882541a0ea9crosca-martelo.gif', 5, '2024-01-24 01:32:37', '2024-01-24 01:32:37'),
	(101, 'Rosca Scott', '3adc46ed21811deef4723b568724ee7drosca-scott.png', 'f5ea08f93bf91f88b2c78a042f002c59rosca-scott.gif', 5, '2024-01-24 01:36:07', '2024-01-24 01:36:07'),
	(102, 'Rosca Scott - Halteres', '259b30aaa5097a156cbf8a3cfe40c20crosca-scott-halteres.jpg', '52f30ed1ee2706579051d17633829025rosca-scott-halteres.gif', 5, '2024-01-24 01:36:37', '2024-01-24 01:36:37'),
	(103, 'Rosca Scott - Unilateral', 'a2bfff19b40c17416f715db7830bcfaarosca-scott-unilateral.png', 'fbf4f097d6d449c2a41849e7cc740718rosca-scott-unilateral.gif', 5, '2024-01-24 01:37:01', '2024-01-24 01:37:01'),
	(104, 'Rosca Inversa', 'e21a9e81ce7e12ac99db62b2165dc247rosca-inversa.jpg', '55af0e2e7ed82830c17eda0fc6c325c1rosca-inversa.gif', 5, '2024-01-24 02:13:55', '2024-01-24 02:13:55'),
	(105, 'Tríceps Coice', '433deded1c050b7e13090173e3f333a0coice.jpg', '7cec10f09cc75956446e880db75d1da2coice.gif', 4, '2024-01-26 02:00:18', '2024-01-26 02:40:03'),
	(106, 'Tríceps Coice Unilateral', '1fcb88d811c2876cd1e375ea6ee05bb8coice-unilateral.jpg', 'f3a6f460a842fcb17dd25061a991eb9ccoice-unilateral.gif', 4, '2024-01-26 02:01:30', '2024-01-26 02:40:19'),
	(107, 'Frances', '5f20b05e2fd864b19b79d4fc499b0aabfrances.png', 'f49969e23088322c485bac80e8270238frances.gif', 4, '2024-01-26 02:11:57', '2024-01-26 02:11:57'),
	(108, 'Frances Unilateral', '7f5584702bd3c23ff7f878c3ea29f280frances-unilateral.jpg', '9a35c96fcdfd68eb2024fc6b6d6e0e59frances-unilateral.gif', 4, '2024-01-26 02:12:28', '2024-01-26 02:12:28'),
	(109, 'Mergulho', '441d5fb66617ba00798f2e86d3073fdfmergulho.jpg', '3421bc2c274606128b4233e93a18913cmergulho.gif', 4, '2024-01-26 02:17:10', '2024-01-26 02:17:10'),
	(110, 'Mergulho Paralela', '8798540aa28b24d58adaa852b29a1211mergulho-paralela.jpg', '6f518392d09b1a09a7e75646b6f651e6mergulho-paralela.gif', 4, '2024-01-26 02:25:01', '2024-01-26 02:25:01'),
	(111, 'Supino Pegada Fechada', '07b7923aed23a6dd9f032ffad0913e12supino-pegada-fechada.png', '8c237003b96fc3b6427497c8dae3c122supino-pegada-fechada.gif', 4, '2024-01-26 02:25:47', '2024-01-26 02:25:47'),
	(112, 'Tríceps Barra', '4ed8f1d19f9eb6d5b3bd55589166558ctriceps-barra.jpg', '7583fe817a320a7cb19f35b9fcc36dcatriceps-barra.gif', 4, '2024-01-26 02:26:22', '2024-01-26 02:26:22'),
	(113, 'Tríceps Corda', '3ae55d90600fa6dc036b7189f1fa77d5triceps-corda.jpg', 'ec585a6928c8c7c9edb091d3a50aebeatriceps-corda.gif', 4, '2024-01-26 02:27:01', '2024-01-26 02:27:01'),
	(114, 'Frances na Polia Baixa', '491caa5bd71bbf957f0cc2f725b75fa0frances-na-polia-baixa.jpg', '78a09ce8c69f31b3a3e72d8071bdf1b9frances-na-polia-baixa.gif', 4, '2024-01-26 02:28:19', '2024-01-26 02:28:19'),
	(115, 'Tríceps Testa na Polia', '159432a78de30b172adbe599dc626865triceps-testa-na-polia.jpg', 'afb494e6f84f996ee836e5c4c4944ccbtriceps-testa-na-polia.gif', 4, '2024-01-26 02:35:12', '2024-01-26 02:35:12'),
	(116, 'Frances Sentado', '0537dce9cea5ec38874b5eaffe6f03c0frances-sentado.jpg', '96cfe0278cb0522a71f692e302fd3e1bfrances-sentado.gif', 4, '2024-01-26 02:37:33', '2024-01-26 02:37:33'),
	(117, 'Tríceps Máquina', 'c00e4cb41ef76df7d31ef9847628dcadtriceps-maquina.jpg', '02c48009006aa48dcb0ed2f08da2379btriceps-maquina.gif', 4, '2024-01-26 02:38:20', '2024-01-26 02:38:20'),
	(118, 'Tríceps Testa', '3748ddfb475d157f50a648872f9e8eedtriceps-testa.jpg', '6e32d85999e5d6a04e5970ce4dc2f90dtriceps-testa.gif', 4, '2024-01-26 02:38:51', '2024-01-26 02:38:51'),
	(119, 'Tríceps Testa - Halteres', '777bb40a86aedac77ba218f08124dc23triceps-testa-halteres.jpg', '1ab79a7077adcac43a70fd50de56db65triceps-testa-halteres.gif', 4, '2024-01-26 02:39:42', '2024-01-26 02:39:42'),
	(120, 'Desenvolvimento de Ombro - Barra', 'c13c2f6c6fb93cbe3f8cb1beb6a34161desenvolvimento-de-ombro-barra.jpg', '8f1fe68d15539827d91a2312791dd715desenvolvimento-de-ombro-barra.gif', 2, '2024-01-26 02:42:25', '2024-01-26 02:42:25'),
	(121, 'Desenvolvimento de Ombro Sentado', '0b13d6ebacd7411ea603b0b530e5d142desenvolvimento-de-ombro-sentado.jpg', '37df383e3832f45776b500b4d1b8b151desenvolvimento-de-ombro-sentado.gif', 2, '2024-01-26 02:43:07', '2024-01-26 03:06:52'),
	(122, 'Desenvolvimento de Ombro Unilateral', 'f0ab0c607b7694f619673efeea4e8f96desenvolvimento-de-ombro-unilateral.jpg', '94ab096fc590ae3e9029abf994a6f3f9desenvolvimento-de-ombro-unilateral.gif', 2, '2024-01-26 02:44:26', '2024-01-26 03:07:16'),
	(123, 'Elevação Lateral Frontal - Halteres', '9186d848716b91044134ce8e2c167b9eelevacao-lateral-frontal-halteres.jpg', '316eb179e4819e4c9c01e43d22cafadeelevacao-lateral-frontal-halteres.gif', 2, '2024-01-26 02:49:46', '2024-01-26 02:49:46'),
	(124, 'Elevação Unilateral Inclinado', '2ab7fd92d340c4910d3852cea67c049belevacao-unilateral-inclinado.jpg', 'a66e0763a53cb02f8c217c8a09d9754celevacao-unilateral-inclinado.gif', 2, '2024-01-26 02:51:37', '2024-01-26 02:51:37'),
	(125, 'Elevação Lateral no Banco', '4cc9ce2728a4f94aa289a4cb91232e91elevacao-lateral-no-banco.png', '971f16af20787848a3e60d0323f69382elevacao-lateral-no-banco.gif', 2, '2024-01-26 02:53:21', '2024-01-26 02:53:21'),
	(126, 'Elevação Frontal - Anilha', '4c55ba3a598046f30a89964ff497a6faelevacao-frontal-anilha.jpg', 'dce9cb32c94ad20ad097509e3a5f62ddelevacao-frontal-anilha.gif', 2, '2024-01-26 02:54:10', '2024-01-26 02:54:10'),
	(127, 'Elevação Frontal Alternado', '37cc07effba585bae9f4441bd112aab2elevacao-frontal-alternado.jpg', '35c6cccab9cc2269619ef0799caef9e3elevacao-frontal-alternado.gif', 2, '2024-01-26 02:54:59', '2024-01-26 02:54:59'),
	(128, 'Elevação Frontal na Polia', '7c4cf60ed8acf462721ec12ad462b13belevacao-frontal-polia.jpg', 'default_gif.gif', 2, '2024-01-26 02:57:37', '2024-01-26 02:58:05'),
	(129, 'Elevação Frontal', '99c5e144fea296f570ba59fa5a588488elevacao-frontal.jpg', 'd292590136f7cffacfa9e4e0c6dcf1d5elevacao-frontal.gif', 2, '2024-01-26 02:58:40', '2024-01-26 02:58:40'),
	(130, 'Elevação Lateral', '39fea4b45c284d6439b2b16e4219bc57elevacao-lateral.jpg', '8ad6fa5bd2a4050da64bdc1b75b2c703elevacao-lateral.gif', 2, '2024-01-26 02:59:33', '2024-01-26 02:59:33'),
	(131, 'Elevação Lateral na Polia', '30358712ffa8d116a07fc51b7dcd428felevacao-lateral-na-polia.jpg', '2e0bc6c2fe3d0c51481cb9b83c3cc9dfelevacao-lateral-na-polia.gif', 2, '2024-01-26 03:00:42', '2024-01-26 03:00:42'),
	(132, 'Elevação Unilateral', '59f564c4b55ed375c8f431287a8b4b54elevacao-unilateral.jpg', 'default_gif.gif', 2, '2024-01-26 03:01:07', '2024-01-26 03:01:07'),
	(133, 'Arnold Press', 'a772812203c1d770d72f98f6768b8e81arnold-press.jpg', '296e79871bb62a4c006a3f92521765d6arnold-press.gif', 2, '2024-01-26 03:06:05', '2024-01-26 03:06:05');

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
  `rest` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '00:30',
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
  CONSTRAINT `fichas_id_gmuscle_fk_to_ficha_foreign` FOREIGN KEY (`id_gmuscle_fk_to_ficha`) REFERENCES `musclegroup` (`id_gmuscle`) ON DELETE CASCADE,
  CONSTRAINT `fichas_id_training_fk_foreign` FOREIGN KEY (`id_training_fk`) REFERENCES `training_division` (`id_training`) ON DELETE CASCADE,
  CONSTRAINT `fichas_id_user_creator_fk_foreign` FOREIGN KEY (`id_user_creator_fk`) REFERENCES `users` (`id`),
  CONSTRAINT `fichas_id_user_fk_foreign` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.fichas: ~30 rows (aproximadamente)
INSERT INTO `fichas` (`id_ficha`, `order`, `serie`, `repetition`, `weight`, `rest`, `description`, `id_exercise_fk`, `id_gmuscle_fk_to_ficha`, `id_user_fk`, `id_user_creator_fk`, `id_training_fk`, `created_at`, `updated_at`) VALUES
	(63, '1', '4', '8 - 12', 'Livre', '00:30', NULL, 66, 7, 1, 1, 3, '2024-01-29 23:20:44', '2024-01-29 23:20:44'),
	(64, '2', '3', '8 - 12', NULL, NULL, NULL, 75, 7, 1, 1, 3, '2024-01-29 23:20:44', '2024-01-29 23:20:44'),
	(65, '3', '4', '8 - 12', NULL, NULL, NULL, 71, 7, 1, 1, 3, '2024-01-29 23:20:44', '2024-01-29 23:20:44'),
	(66, '4', '4', '8 - 12', NULL, NULL, NULL, 82, 7, 1, 1, 3, '2024-01-29 23:20:44', '2024-01-29 23:20:44'),
	(67, '5', '4', '8 - 12', NULL, NULL, NULL, 76, 7, 1, 1, 3, '2024-01-29 23:20:44', '2024-01-29 23:20:44'),
	(68, '6', '6', '10', NULL, NULL, NULL, 88, 7, 1, 1, 3, '2024-01-29 23:20:44', '2024-01-29 23:20:44'),
	(69, '7', '3', '7', NULL, NULL, NULL, 91, 5, 1, 1, 3, '2024-01-29 23:20:44', '2024-01-29 23:20:44'),
	(70, '8', '4', '8 - 12', NULL, NULL, NULL, 98, 5, 1, 1, 3, '2024-01-29 23:20:44', '2024-01-29 23:20:44'),
	(71, '9', '4', '8 - 12', NULL, NULL, NULL, 100, 5, 1, 1, 3, '2024-01-29 23:20:44', '2024-01-29 23:20:44'),
	(72, '10', '4', '8 - 12', NULL, NULL, NULL, 104, 5, 1, 1, 3, '2024-01-29 23:20:44', '2024-01-29 23:20:44'),
	(73, '11', '4', '8 - 12', NULL, NULL, NULL, 68, 6, 1, 1, 3, '2024-01-29 23:20:44', '2024-01-29 23:20:44'),
	(74, '1', '4', '12', 'Livre', '00:30', NULL, 63, 3, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(75, '2', '4', '10', NULL, NULL, NULL, 55, 3, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(76, '3', '4', '12', NULL, NULL, NULL, 54, 3, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(77, '4', '4', '12', NULL, NULL, NULL, 57, 3, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(78, '5', '4', '12', NULL, NULL, NULL, 48, 3, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(79, '6', '4', '10', NULL, NULL, NULL, 47, 3, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(80, '7', '4', '12', NULL, NULL, NULL, 113, 4, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(81, '9', '4', '12', NULL, NULL, NULL, 117, 4, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(82, '8', '4', '12', NULL, NULL, NULL, 108, 4, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(83, '10', '4', '12', NULL, NULL, NULL, 130, 2, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(84, '11', '4', '12', NULL, NULL, NULL, 129, 2, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(85, '12', '4', '12', NULL, NULL, NULL, 133, 2, 1, 1, 2, '2024-01-29 23:32:34', '2024-01-29 23:32:34'),
	(86, '1', '4', '12', 'Livre', '00:30', NULL, 21, 1, 1, 1, 1, '2024-01-29 23:38:20', '2024-01-29 23:38:20'),
	(87, '2', '4', '12', NULL, NULL, NULL, 27, 1, 1, 1, 1, '2024-01-29 23:38:20', '2024-01-29 23:38:20'),
	(88, '3', '4', '10', NULL, NULL, NULL, 25, 1, 1, 1, 1, '2024-01-29 23:38:20', '2024-01-29 23:38:20'),
	(89, '4', '4', '12', NULL, NULL, NULL, 39, 1, 1, 1, 1, '2024-01-29 23:38:20', '2024-01-29 23:38:20'),
	(90, '5', '4', '12', NULL, NULL, NULL, 41, 1, 1, 1, 1, '2024-01-29 23:38:20', '2024-01-29 23:38:20'),
	(91, '5', '4', '12', NULL, NULL, NULL, 37, 1, 1, 1, 1, '2024-01-29 23:38:20', '2024-01-29 23:38:20'),
	(92, '6', '4', '12', NULL, NULL, NULL, 36, 1, 1, 1, 1, '2024-01-29 23:38:20', '2024-01-29 23:38:20');

-- Copiando estrutura para tabela academia.medias
CREATE TABLE IF NOT EXISTS `medias` (
  `id_media` bigint NOT NULL AUTO_INCREMENT,
  `type_media` int DEFAULT NULL,
  `img_media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_media` varchar(260) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_media` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tags_media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user_fk` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.medias: ~6 rows (aproximadamente)
INSERT INTO `medias` (`id_media`, `type_media`, `img_media`, `link_media`, `title_media`, `description_media`, `tags_media`, `id_user_fk`, `created_at`, `updated_at`) VALUES
	(10, 1, '19eccb5336cd08e276266469aa7668f8.jpg', NULL, 'asdasd', NULL, NULL, 1, '2024-02-15 00:56:04', '2024-02-15 00:56:04'),
	(11, 1, '61a13bc3de4170fb145a913019528824.jpg', NULL, 'asd', NULL, NULL, 1, '2024-02-15 00:56:14', '2024-02-15 00:56:14'),
	(12, 1, '48b2064a6314d231b5b1a79584d47d3e.jpg', NULL, 'asdasdas', NULL, NULL, 1, '2024-02-15 00:56:25', '2024-02-15 00:56:25'),
	(14, 1, '970ad71a3eaee6c365be8b10362304ba.jpg', NULL, 'Banner Big', NULL, NULL, 1, '2024-02-15 01:26:28', '2024-02-15 01:26:28'),
	(15, 2, '52e04f74d3404da94106f2524bace7b7.png', NULL, 'Lembrete da Mensalidade 2024', 'teste', '#teste #teste #testando', 1, '2024-02-20 01:57:16', '2024-02-20 01:57:16'),
	(16, 1, 'ae662390759acf68660a63569a5fa062.png', NULL, 'teste', NULL, NULL, 1, '2024-02-20 18:23:01', '2024-02-20 18:23:01');

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

-- Copiando estrutura para tabela academia.monthly_type
CREATE TABLE IF NOT EXISTS `monthly_type` (
  `id_monthly_type` int NOT NULL AUTO_INCREMENT,
  `name_monthly` varchar(260) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `months` int DEFAULT NULL,
  `observation` varchar(260) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_monthly_type`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.monthly_type: ~4 rows (aproximadamente)
INSERT INTO `monthly_type` (`id_monthly_type`, `name_monthly`, `value`, `months`, `observation`, `created_at`, `updated_at`) VALUES
	(1, 'Bronze', 75.00, 1, 'teste', '2024-02-21 15:00:02', '2024-02-22 18:03:25'),
	(9, 'Prata', 145.00, 2, 'sdad', '2024-02-21 15:19:37', '2024-02-22 18:03:46'),
	(10, 'Smart', 850.00, NULL, NULL, '2024-02-21 15:34:46', '2024-02-22 02:16:43'),
	(11, 'Gold', 400.00, 6, NULL, '2024-02-22 02:41:03', '2024-02-22 02:41:03');

-- Copiando estrutura para tabela academia.musclegroup
CREATE TABLE IF NOT EXISTS `musclegroup` (
  `id_gmuscle` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_gmuscle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_gmuscle`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.musclegroup: ~8 rows (aproximadamente)
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.password_reset_tokens: ~1 rows (aproximadamente)
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('renanaragao159@gmail.com', '$2y$10$x6pXpuqzHfUJkIXtKMmNDej.rKhg2AjLB3K1GdqwLy.kFa6SBpdEW', '2023-12-19 01:30:15');

-- Copiando estrutura para tabela academia.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id_payment` int NOT NULL AUTO_INCREMENT,
  `form_payment` varchar(260) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_payment` date DEFAULT NULL,
  `date_due_payment` date DEFAULT NULL,
  `value_payment` decimal(10,2) DEFAULT NULL,
  `monthly_type_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `user_id_creator` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.payments: ~13 rows (aproximadamente)
INSERT INTO `payments` (`id_payment`, `form_payment`, `date_payment`, `date_due_payment`, `value_payment`, `monthly_type_id`, `user_id`, `user_id_creator`, `created_at`, `updated_at`) VALUES
	(1, 'Dinheiro', '2024-02-22', '2024-02-22', 150.00, 11, 1, 1, '2024-02-22 03:07:02', '2024-02-22 15:40:04'),
	(2, 'Boleto', '2024-02-22', '2024-02-22', 145.00, 9, 1, 1, '2024-02-22 03:09:59', '2024-02-22 03:09:59'),
	(3, 'Débito', '2024-02-22', '2024-02-22', 850.00, 10, 1, 1, '2024-02-22 03:10:13', '2024-02-22 03:10:13'),
	(4, 'Boleto', '2024-02-22', '2024-02-22', 75.00, 1, 1, 1, '2024-02-22 03:10:35', '2024-02-22 03:10:35'),
	(5, 'Dinheiro', '2024-02-22', '2024-02-22', 75.00, 1, 1, 1, '2024-02-22 13:49:48', '2024-02-22 13:49:48'),
	(6, 'Dinheiro', '2024-02-23', '2024-03-23', 75.00, 1, 1, 1, '2024-02-22 14:15:43', '2024-02-23 15:15:20'),
	(7, 'Dinheiro', '2024-02-22', NULL, 400.00, 11, 1, 1, '2024-02-22 16:26:57', '2024-02-22 16:26:57'),
	(8, 'Débito', '2024-02-22', NULL, 400.00, 11, 1, 1, '2024-02-22 16:44:07', '2024-02-22 16:44:07'),
	(10, 'Pix', '2024-02-22', NULL, 400.00, 11, 1, 1, '2024-02-22 17:54:55', '2024-02-22 17:54:55'),
	(11, 'Boleto', '2024-02-22', NULL, 400.00, 11, 1, 1, '2024-02-22 17:58:02', '2024-02-22 17:58:02'),
	(12, 'Crédito', '2024-02-23', '2024-04-23', 145.00, 9, 1, 1, '2024-02-22 17:59:47', '2024-02-23 15:16:43'),
	(13, 'Pix', '2024-02-22', '2024-03-22', 75.00, 1, 1, 1, '2024-02-22 18:04:07', '2024-02-22 18:04:07'),
	(14, 'Dinheiro', '2024-02-23', '2024-03-23', 75.00, 1, 1, 1, '2024-02-23 15:31:27', '2024-02-23 15:31:27');

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

-- Copiando dados para a tabela academia.sessions: ~1 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('6npqqYDt3iLrURsAJDHBu4H5YrAPZCEcfcsq0znP', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:123.0) Gecko/20100101 Firefox/123.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTlBUZjE2SExJUDZQMnhsbjYyWmFkZzVqeW50Tm5QeklPbmpuQ2NzUyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vYWx1bm9zL3Zlci8xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1708712435),
	('FFx9D2BVkLLlQQWdUNvVg8Z9sX7tPYdYkUYNjuaI', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:123.0) Gecko/20100101 Firefox/123.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicHpGdkdMTWMxNWNHYk1RY24yQTNvT2hWRnhNanJOY0lGOEFoc0UzbiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2FsdW5vcy92ZXIvMSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vYWx1bm9zL3Zlci8xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1708708369),
	('YjLGlVqo6mFGbwMlg5K8Ze2RFck9lCxQra0ZYarA', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:123.0) Gecko/20100101 Firefox/123.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0lhQnlZcTFFVnRnQWljS1Z6cUFHcENPaERpTFNpSzVhaFROSkNtUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1708711923);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela academia.statistics: ~2 rows (aproximadamente)
INSERT INTO `statistics` (`id_statistic`, `id_user_fk`, `id_ficha_fk`, `created_at`, `updated_at`) VALUES
	(18, 1, 92, '2024-01-30 01:48:02', '2024-01-30 01:48:02'),
	(19, 1, 73, '2024-01-31 03:15:16', '2024-01-31 03:15:16'),
	(20, 1, 92, '2024-02-23 17:57:57', '2024-02-23 17:57:57');

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
	(1, 'Renan da Silva Aragão', '85984174827', 'Masculino', '2023-10-22', 1, 'renanaragao159@gmail.com', NULL, '$2y$10$2VI9UtFck1r.pPN4eIGHDeOBRZ19BfnNAp5r/5GX/QTAhb2ZKAXEy', NULL, NULL, NULL, NULL, NULL, '65b9b7fad8554.jpeg', '2023-09-23 04:09:49', '2024-02-21 16:55:23'),
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

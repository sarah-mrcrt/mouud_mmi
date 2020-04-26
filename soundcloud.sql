-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 avr. 2020 à 13:52
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `soundcloud`
--

-- --------------------------------------------------------

--
-- Structure de la table `chanson`
--

DROP TABLE IF EXISTS `chanson`;
CREATE TABLE IF NOT EXISTS `chanson` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `style` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/uploads/default/default-music.png',
  `utilisateur_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chanson_utilisateur_id_foreign` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chanson`
--

INSERT INTO `chanson` (`id`, `nom`, `url`, `style`, `image`, `utilisateur_id`, `created_at`, `updated_at`) VALUES
(1, 'Walk With Me', '/uploads/1/T6n1tI3WpGgs8rTQkrf7g91eR7tqpJqDIWJpNPzF.mpga', 'Funk', '/uploads/default/default-music.png', 1, '2020-04-23 15:24:49', '2020-04-23 15:24:49'),
(2, 'Walk With Me', '/uploads/1/T6n1tI3WpGgs8rTQkrf7g91eR7tqpJqDIWJpNPzF.mpga', 'Funk', '/uploads/default/default-music.png', 1, '2020-04-23 15:24:49', '2020-04-23 15:24:49'),
(3, 'Walk With Me', '/uploads/1/T6n1tI3WpGgs8rTQkrf7g91eR7tqpJqDIWJpNPzF.mpga', 'Funk', '/uploads/default/default-music.png', 1, '2020-04-23 15:24:49', '2020-04-23 15:24:49'),
(4, 'Walk With Me', '/uploads/1/T6n1tI3WpGgs8rTQkrf7g91eR7tqpJqDIWJpNPzF.mpga', 'Funk', '/uploads/default/default-music.png', 1, '2020-04-23 15:24:49', '2020-04-23 15:24:49'),
(5, 'Walk With Me', '/uploads/1/T6n1tI3WpGgs8rTQkrf7g91eR7tqpJqDIWJpNPzF.mpga', 'Funk', '/uploads/default/default-music.png', 1, '2020-04-23 15:24:49', '2020-04-23 15:24:49'),
(6, 'Walk With Me', '/uploads/1/T6n1tI3WpGgs8rTQkrf7g91eR7tqpJqDIWJpNPzF.mpga', 'Funk', '/uploads/default/default-music.png', 1, '2020-04-23 15:24:49', '2020-04-23 15:24:49'),
(7, 'Steel Drum Lullaby', '/uploads/1/uAmyNTdWccXyVJtZUcCxuwvx4hKEZJTybqxTjcgJ.mpga', 'Reggae', '/uploads/1/9RI1T9b1wEbbEwM4Nsw8rqbjFlaYkcq1Lo1yVoYq.jpeg', 1, '2020-04-23 20:11:56', '2020-04-23 20:11:56');

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `playlist_id` int(11) NOT NULL,
  `chanson_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contient`
--

INSERT INTO `contient` (`id`, `created_at`, `updated_at`, `playlist_id`, `chanson_id`) VALUES
(1, NULL, NULL, 2, 7),
(2, NULL, NULL, 2, 6),
(3, NULL, NULL, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `chanson_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `chanson_id`, `utilisateur_id`, `created_at`, `updated_at`) VALUES
(1, 6, 4, NULL, NULL),
(2, 6, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_15_152448_create_chanson_table', 1),
(5, '2020_01_19_160745_create_playlist_table', 1),
(6, '2020_01_19_160817_create_contient_table', 1),
(7, '2020_01_19_160829_create_suit_table', 1),
(8, '2020_03_15_144831_create_likes_table', 1),
(9, '2020_04_10_160020_create_notifications_table', 1),
(10, '2020_04_20_195159_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('77619e7d-feb8-421b-a6b8-2bf0fe2e3add', 'App\\Notifications\\InvoicePaid', 'App\\User', 1, '{\"user_name\":\"Sarah Mauriaucourt\",\"user_id\":1,\"data\":\"This is my first notification\"}', NULL, '2020-04-23 21:31:31', '2020-04-23 21:31:31');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

DROP TABLE IF EXISTS `playlist`;
CREATE TABLE IF NOT EXISTS `playlist` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/uploads/default/default-playlist.png',
  `utilisateur_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `playlist_utilisateur_id_foreign` (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `playlist`
--

INSERT INTO `playlist` (`id`, `nom`, `image`, `utilisateur_id`, `created_at`, `updated_at`) VALUES
(1, 'Bad moud', '/uploads/default/default-playlist.png', 1, '2020-04-23 20:11:04', '2020-04-23 20:11:04'),
(2, 'Party', '/uploads/1/dk1vMwJkQrcyAmvQIToxAFfoyJvkmNySThqTp6OX.jpeg', 1, '2020-04-23 20:11:17', '2020-04-23 20:11:17'),
(3, 'Contaitment', '/uploads/default/default-playlist.png', 1, '2020-04-23 20:11:04', '2020-04-23 20:11:04');

-- --------------------------------------------------------

--
-- Structure de la table `suit`
--

DROP TABLE IF EXISTS `suit`;
CREATE TABLE IF NOT EXISTS `suit` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `suiveur_id` int(11) NOT NULL,
  `suivi_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `suit`
--

INSERT INTO `suit` (`id`, `created_at`, `updated_at`, `suiveur_id`, `suivi_id`) VALUES
(6, NULL, NULL, 4, 1),
(7, NULL, NULL, 3, 1),
(9, NULL, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-avatar.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_preference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mail',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `notification_preference`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sarah Mauriaucourt', 'mauriaucourt.sarah@gmail.com', '1587662768.png', '2020-04-23 15:21:39', '$2y$10$Mmj7PyCG.ltFsQQY7L/xgOoRITyHlsZdrVewz/2mYzgJhVHwUOjNS', 'mail', NULL, '2020-04-23 15:21:37', '2020-04-23 15:26:08'),
(2, 'Anjali Sharma', 'anjali.sharma@gmail.com', 'default-avatar.png', '2020-04-23 15:21:39', '$2y$10$Mmj7PyCG.ltFsQQY7L/xgOoRITyHlsZdrVewz/2mYzgJhVHwUOjNS', 'mail', NULL, '2020-04-23 15:21:37', '2020-04-23 15:26:08'),
(3, 'Kajol', 'kajol.mukherjee@mouud.fr', 'default-avatar.png', '2020-04-23 15:21:39', '$2y$10$Mmj7PyCG.ltFsQQY7L/xgOoRITyHlsZdrVewz/2mYzgJhVHwUOjNS', 'mail', NULL, '2020-04-23 15:21:37', '2020-04-23 15:26:08'),
(4, 'richard', 'richard@mouud.fr', 'default-avatar.png', '2020-04-23 15:21:39', '$2y$10$Mmj7PyCG.ltFsQQY7L/xgOoRITyHlsZdrVewz/2mYzgJhVHwUOjNS', 'mail', NULL, '2020-04-23 15:21:37', '2020-04-23 15:26:08'),
(5, 'Stuart', 'stuart@mouud.fr', 'default-avatar.png', '2020-04-23 15:21:39', '$2y$10$Mmj7PyCG.ltFsQQY7L/xgOoRITyHlsZdrVewz/2mYzgJhVHwUOjNS', 'mail', NULL, '2020-04-23 15:21:37', '2020-04-23 15:26:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

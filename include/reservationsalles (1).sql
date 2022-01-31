-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 31 jan. 2022 à 11:22
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(146, 'ok', 'ok', '2022-02-01 16:09:00', '2022-01-28 17:09:00', 52),
(145, 'test 145', 'encore un test ', '2022-01-28 17:58:00', '2022-01-28 18:58:00', 51),
(144, 'resa', 'resa', '2022-01-28 17:27:00', '2022-01-28 18:28:00', 55),
(143, 'ok', 'ok', '2022-01-28 16:50:00', '2022-01-28 17:50:00', 51),
(142, 'TEST ', 'TES 34', '2022-01-28 14:45:00', '2022-01-28 15:45:00', 52),
(141, 'TEST reservation', 'rÃ©servation de test ', '2022-02-02 10:10:00', '2022-02-02 11:10:00', 51),
(140, 'How to ', 'ok', '2022-03-18 11:50:00', '2022-02-18 12:50:00', 52),
(136, 'RÃ©union', 'rÃ©union du 1/02', '2022-02-01 10:25:00', '2022-02-01 11:26:00', 51),
(139, 'Tony guillot ', 'Booking', '2022-02-22 11:48:00', '2022-02-22 12:48:00', 51),
(137, 'Start up ', 'Start up ', '2022-02-03 15:29:00', '2022-02-03 16:29:00', 51),
(138, 'RÃ©sa du 10 ', 'RÃ©servation', '2022-02-10 11:32:00', '2022-01-10 12:32:00', 51);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(52, 'dorian', '$2y$10$xcVrsGfqvVTlLcHIH8BCp.NhJ7jd2w4KUm/Vd1s.0Cd09rol1Y/Oq'),
(51, 'tony', '$2y$10$.sPgKdABqfkFrJOiAvd4g.c7YEp8jypNUX/Hp9dyk.RW0NJn7iaJq'),
(55, 'tony2', '$2y$10$8Mn/XqGxsQ9p0Yxh3vFkNuhDm/EhRu1aBnrhjjsQNCoc69xOjg.bi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

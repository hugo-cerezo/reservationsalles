-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 31 jan. 2020 à 13:48
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
-- Base de données :  `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(1, 'holÃ ', 'hola', '2020-09-09 12:00:00', '2020-09-09 13:03:00', 2),
(2, 'hello', 'hello', '2020-08-09 20:00:00', '2020-08-09 21:00:00', 3),
(3, 'holÃ ', 'holÃ ', '2020-01-31 20:00:00', '2020-01-31 21:00:00', 1),
(4, 'holÃ ', 'jzfcl', '2020-01-31 16:00:00', '2020-01-31 17:00:00', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'solenn', '$2y$10$EVLwZ.SZ3U46pStdKow2r.TtFMhRoHAqP1RYZT7pbvjCpbUiR3Oie'),
(2, 'juliette', '$2y$10$lDtgs1oEd0x6HUh3gkyuXuOt3h7z2pszZxw8dL6vWoo6hP.AnC8Jm'),
(3, 'charlie', '$2y$10$Fv0kIStApLn9c7tA/peJVOkTrPZR1B2fRJNK58tE.X0BJ69GxXk/m'),
(4, 'chouette', '$2y$10$H1keu.JFkrLfP665hEo2N.QNy/JWSUdUCmninSj6/RGSCEYOqTs4G'),
(5, 'gwen', '$2y$10$y3Ysl5ASeUY87OBXPXA6wu0sB6bZIoPknLzsPrtydYbKbc9jxyG0y'),
(6, 'solenn', '$2y$10$mvVTJ8/tKVPR54Qq1mOlF.P83gurXvWhGaFC7iYXPmvoTqeyGpveG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

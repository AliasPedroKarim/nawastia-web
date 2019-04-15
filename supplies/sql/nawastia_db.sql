-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  lun. 15 avr. 2019 à 18:58
-- Version du serveur :  10.3.12-MariaDB
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nawastia_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `id_joueur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `photo_profil` varchar(1000) DEFAULT NULL,
  `money` float DEFAULT NULL,
  `note` text DEFAULT NULL,
  `pseudo_discord` varchar(255) DEFAULT NULL,
  `date_creation_compte` datetime DEFAULT NULL,
  `date_dernier_activite` datetime DEFAULT NULL,
  `ip_creation_compte` varchar(50) DEFAULT NULL,
  `ip_dernier_activite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_joueur`),
  UNIQUE KEY `joueur_pseudo_uindex` (`pseudo`),
  UNIQUE KEY `joueur_email_uindex` (`email`),
  UNIQUE KEY `joueur_id_uindex` (`id_joueur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`id_joueur`, `pseudo`, `email`, `nom`, `prenom`, `mot_de_passe`, `genre`, `photo_profil`, `money`, `note`, `pseudo_discord`, `date_creation_compte`, `date_dernier_activite`, `ip_creation_compte`, `ip_dernier_activite`) VALUES
(4, 'PedroKarim64', 'admin@admin.fr', 'admin', 'admin', '6a33d91000fb91f8719900990ca33e99c714a36d', 'homme', 'assets/img/user-avatar/ProfileAvatar-id-PedroKarim64.jpg', 0, 'aucune note', 'PedroKarim64#0001', '2019-02-27 18:01:41', '2019-02-27 18:01:41', '[::1]', '[::1]'),
(5, 'admin', 'admin1@admin.fr', 'admin', 'admin', '6a33d91000fb91f8719900990ca33e99c714a36d', 'homme', 'assets/img/user-avatar/ProfileAvatar-id-admin.jpg', 0, 'aucune note', 'test#0001', '2019-04-15 00:28:50', '2019-04-15 00:28:50', '[::1]', '[::1]');

-- --------------------------------------------------------

--
-- Structure de la table `possede_role`
--

DROP TABLE IF EXISTS `possede_role`;
CREATE TABLE IF NOT EXISTS `possede_role` (
  `id_joueur` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`id_joueur`,`id_status`),
  KEY `id_status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `possede_role`
--

INSERT INTO `possede_role` (`id_joueur`, `id_status`) VALUES
(4, 8),
(5, 8);

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  `libelle_status` varchar(50) DEFAULT NULL,
  `description_status` text DEFAULT NULL,
  `couleur_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_status`),
  UNIQUE KEY `status_id_status_uindex` (`id_status`),
  UNIQUE KEY `status_role_uindex` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id_status`, `role`, `libelle_status`, `description_status`, `couleur_status`) VALUES
(1, 'op', 'Opérateur', 'C\'est le role des opérateurs', '#2b9976'),
(2, 'fonda', 'Fondateur', 'C\'est le role des fondateurs', '#e60000'),
(3, 'admin', 'Administrateur', 'C\'est le role des administrateurs', '#0073e6'),
(4, 'super-modo', 'Super-Modérateur', 'C\'est le role des Super-Modérateurs', '#008140'),
(5, 'modo', 'Modérateur', 'C\'est le role des Modérateurs', '#00b459'),
(6, 'build', 'Buildeur', 'C\'est le role des Modérateurs-Chats', '#00b486'),
(7, 'anime', 'Animateur', 'C\'est le role des Animateurs', '#b4002e'),
(8, 'joueur', 'Joueur', 'C\'est le role des Joueurs', '#4d0068'),
(9, 'dev', 'Développeur', 'C\'est le role des Développeurs', '#0479ee');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `possede_role`
--
ALTER TABLE `possede_role`
  ADD CONSTRAINT `possede_role_ibfk_1` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`id_joueur`),
  ADD CONSTRAINT `possede_role_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

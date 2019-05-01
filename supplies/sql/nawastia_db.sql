-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  mer. 24 avr. 2019 à 07:02
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
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id_activite` int(11) NOT NULL AUTO_INCREMENT,
  `nom_activite` varchar(255) NOT NULL,
  `text_activite` text NOT NULL,
  `date_activite` datetime NOT NULL,
  `date_dernier_activite` datetime NOT NULL,
  `id_status_activite` int(11) NOT NULL,
  `id_poster` int(11) NOT NULL,
  PRIMARY KEY (`id_activite`),
  KEY `id_status_activite` (`id_status_activite`),
  KEY `id_poster` (`id_poster`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

DROP TABLE IF EXISTS `amis`;
CREATE TABLE IF NOT EXISTS `amis` (
  `id_joueur_demandeur` int(11) NOT NULL,
  `id_joueur_demander` int(11) NOT NULL,
  `id_status_amis` int(11) NOT NULL,
  `date_demande_amis` datetime NOT NULL,
  `date_dernier_activite` datetime NOT NULL,
  KEY `id_status_amis` (`id_status_amis`),
  KEY `id_joueur_demandeur` (`id_joueur_demandeur`),
  KEY `id_joueur_demander` (`id_joueur_demander`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ceer_ou_participer_event`
--

DROP TABLE IF EXISTS `ceer_ou_participer_event`;
CREATE TABLE IF NOT EXISTS `ceer_ou_participer_event` (
  `id_utilisateur` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `createur` tinyint(4) NOT NULL DEFAULT 0,
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_event` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `texte_commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `id_activite` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `id_activite` (`id_activite`),
  KEY `id_joueur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `nom_event` varchar(255) NOT NULL,
  `petit_text_description_event` text NOT NULL,
  `description_event` text NOT NULL,
  `date_debut_event` datetime NOT NULL,
  `date_fin_event` datetime NOT NULL,
  `id_status_event` int(11) NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_status_event` (`id_status_event`),
  KEY `id_event` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mise_a_jour`
--

DROP TABLE IF EXISTS `mise_a_jour`;
CREATE TABLE IF NOT EXISTS `mise_a_jour` (
  `id_maj` int(11) NOT NULL AUTO_INCREMENT,
  `nom_maj` varchar(255) NOT NULL,
  `description_maj` text NOT NULL,
  `date_maj` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_maj`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `titre_notification` varchar(255) NOT NULL,
  `date_notification` datetime NOT NULL,
  `texte_notification` text NOT NULL,
  `lien_notification` varchar(1000) NOT NULL DEFAULT '#',
  `id_notifieur` int(11) NOT NULL,
  `id_notifier` int(11) NOT NULL,
  `id_status_notification` int(11) NOT NULL,
  PRIMARY KEY (`id_notification`),
  KEY `id_notifieur` (`id_notifieur`),
  KEY `id_notifier` (`id_notifier`),
  KEY `id_status_notification` (`id_status_notification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `possede_image`
--

DROP TABLE IF EXISTS `possede_image`;
CREATE TABLE IF NOT EXISTS `possede_image` (
  `id_activite` int(11) NOT NULL,
  `url_or_path` varchar(1000) NOT NULL,
  KEY `id_activite` (`id_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `possede_reaction`
--

DROP TABLE IF EXISTS `possede_reaction`;
CREATE TABLE IF NOT EXISTS `possede_reaction` (
  `id_activite_reaction` int(11) NOT NULL,
  `id_reaction` int(11) NOT NULL,
  `id_jutilisateur_reaction` int(11) NOT NULL,
  `qte_reaction` int(11) NOT NULL,
  KEY `id_activite_reaction` (`id_activite_reaction`),
  KEY `id_reaction` (`id_reaction`),
  KEY `id_joueur_reaction` (`id_jutilisateur_reaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `possede_role`
--

DROP TABLE IF EXISTS `possede_role`;
CREATE TABLE IF NOT EXISTS `possede_role` (
  `id_utilisateur` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_status`),
  KEY `id_status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `possede_role`
--

INSERT INTO `possede_role` (`id_utilisateur`, `id_status`) VALUES
(4, 8),
(4, 9),
(5, 8);

-- --------------------------------------------------------

--
-- Structure de la table `reaction`
--

DROP TABLE IF EXISTS `reaction`;
CREATE TABLE IF NOT EXISTS `reaction` (
  `id_reaction` int(11) NOT NULL AUTO_INCREMENT,
  `emote_reaction` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_reaction`),
  KEY `id_reaction` (`id_reaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `libelle_status` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `description_status` text CHARACTER SET latin1 DEFAULT NULL,
  `couleur_status` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_status`),
  UNIQUE KEY `status_id_status_uindex` (`id_status`),
  UNIQUE KEY `status_role_uindex` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

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

-- --------------------------------------------------------

--
-- Structure de la table `status_activite`
--

DROP TABLE IF EXISTS `status_activite`;
CREATE TABLE IF NOT EXISTS `status_activite` (
  `id_status_activite` int(11) NOT NULL,
  `libelle_status_activite` int(11) NOT NULL,
  PRIMARY KEY (`id_status_activite`),
  KEY `id_status_activite` (`id_status_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `status_amis`
--

DROP TABLE IF EXISTS `status_amis`;
CREATE TABLE IF NOT EXISTS `status_amis` (
  `id_status_amis` int(11) NOT NULL,
  `libelle_status_amis` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status_amis`),
  KEY `id_status_amis` (`id_status_amis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `status_event`
--

DROP TABLE IF EXISTS `status_event`;
CREATE TABLE IF NOT EXISTS `status_event` (
  `id_status_event` int(11) NOT NULL,
  `libelle_status_event` varchar(255) NOT NULL,
  KEY `id_status_event` (`id_status_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `status_notification`
--

DROP TABLE IF EXISTS `status_notification`;
CREATE TABLE IF NOT EXISTS `status_notification` (
  `id_status_notification` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_status_notification` varchar(255) NOT NULL,
  PRIMARY KEY (`id_status_notification`),
  KEY `id_status_notification` (`id_status_notification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nom` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `prenom` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `genre` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `photo_profil` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `money` float DEFAULT NULL,
  `note` text CHARACTER SET latin1 DEFAULT NULL,
  `bg_profil` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `pseudo_discord` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `visibilite_utilisateur` tinyint(4) NOT NULL DEFAULT 1,
  `followers_utilisateur` tinyint(4) NOT NULL DEFAULT 1,
  `notification_activite` tinyint(4) NOT NULL DEFAULT 1,
  `date_creation_compte` datetime DEFAULT NULL,
  `date_dernier_activite` datetime DEFAULT NULL,
  `ip_creation_compte` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `ip_dernier_activite` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `joueur_pseudo_uindex` (`pseudo`),
  UNIQUE KEY `joueur_email_uindex` (`email`),
  UNIQUE KEY `joueur_id_uindex` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `email`, `nom`, `prenom`, `mot_de_passe`, `genre`, `photo_profil`, `money`, `note`, `bg_profil`, `pseudo_discord`, `visibilite_utilisateur`, `followers_utilisateur`, `notification_activite`, `date_creation_compte`, `date_dernier_activite`, `ip_creation_compte`, `ip_dernier_activite`) VALUES
(4, 'PedroKarim64', 'admin@admin.fr', 'admin', 'admin', '880836d4ebd089deda4517cffc8021be13895420', 'homme', 'assets/img/user-avatar/ProfileAvatar-id-PedroKarim64.jpg', 0, 'aucune note', 'https://i.kinja-img.com/gawker-media/image/upload/crhrwhnfzizwj9pqilvf.png', 'PedroKarim64#0001', 1, 1, 1, '2019-02-27 18:01:41', '2019-04-23 23:37:53', '[::1]', '::1'),
(5, 'admin', 'admin1@admin.fr', 'admin', 'admin', '6a33d91000fb91f8719900990ca33e99c714a36d', 'homme', 'assets/img/user-avatar/ProfileAvatar-id-admin.jpg', 0, 'aucune note', NULL, 'test#0001', 1, 1, 1, '2019-04-15 00:28:50', '2019-04-20 23:25:03', '[::1]', '[::1]');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_ibfk_1` FOREIGN KEY (`id_poster`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `activite_ibfk_2` FOREIGN KEY (`id_status_activite`) REFERENCES `status_activite` (`id_status_activite`);

--
-- Contraintes pour la table `amis`
--
ALTER TABLE `amis`
  ADD CONSTRAINT `amis_ibfk_1` FOREIGN KEY (`id_status_amis`) REFERENCES `status_amis` (`id_status_amis`),
  ADD CONSTRAINT `amis_ibfk_2` FOREIGN KEY (`id_joueur_demandeur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `amis_ibfk_3` FOREIGN KEY (`id_joueur_demander`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `ceer_ou_participer_event`
--
ALTER TABLE `ceer_ou_participer_event`
  ADD CONSTRAINT `ceer_ou_participer_event_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `ceer_ou_participer_event_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`);

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_status_event`) REFERENCES `status_event` (`id_status_event`);

--
-- Contraintes pour la table `mise_a_jour`
--
ALTER TABLE `mise_a_jour`
  ADD CONSTRAINT `mise_a_jour_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_status_notification`) REFERENCES `status_notification` (`id_status_notification`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`id_notifieur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `notification_ibfk_3` FOREIGN KEY (`id_notifier`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `possede_image`
--
ALTER TABLE `possede_image`
  ADD CONSTRAINT `possede_image_ibfk_1` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`);

--
-- Contraintes pour la table `possede_reaction`
--
ALTER TABLE `possede_reaction`
  ADD CONSTRAINT `possede_reaction_ibfk_1` FOREIGN KEY (`id_activite_reaction`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `possede_reaction_ibfk_2` FOREIGN KEY (`id_reaction`) REFERENCES `reaction` (`id_reaction`),
  ADD CONSTRAINT `possede_reaction_ibfk_3` FOREIGN KEY (id_utilisateur_reaction) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `possede_role`
--
ALTER TABLE `possede_role`
  ADD CONSTRAINT `possede_role_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `possede_role_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

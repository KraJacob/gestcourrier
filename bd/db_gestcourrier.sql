-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Juillet 2018 à 17:09
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_gestcourrier`
--

-- --------------------------------------------------------

--
-- Structure de la table `affecter`
--

DROP TABLE IF EXISTS `affecter`;
CREATE TABLE IF NOT EXISTS `affecter` (
  `id_affecter` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnel` int(11) NOT NULL,
  `immatriculation` varchar(10) NOT NULL,
  `date_affectation` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL DEFAULT 'Actif',
  PRIMARY KEY (`id_affecter`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `affecter`
--

INSERT INTO `affecter` (`id_affecter`, `id_personnel`, `immatriculation`, `date_affectation`, `user_id`, `statut`) VALUES
(1, 0, 'Choisissez', '15/07/2018', 7, 'Actif'),
(2, 0, 'Choisissez', '15/07/2018', 7, 'Actif'),
(3, 0, 'Choisissez', '15/07/2018', 7, 'Actif'),
(4, 0, 'Choisissez', '15/07/2018', 7, 'Actif'),
(5, 0, 'Choisissez', '15/07/2018', 7, 'Actif'),
(6, 0, 'Choisissez', '15/07/2018', 7, 'Actif'),
(7, 0, 'Choisissez', '15/07/2018', 7, 'Actif'),
(8, 0, 'Choisissez', '15/07/2018', 7, 'Actif'),
(9, 0, 'Choisissez', '15/07/2018', 7, 'Actif'),
(10, 0, 'Choisissez', '15/07/2018', 7, 'Actif'),
(11, 0, 'Choisissez', '15/07/2018', 7, 'Actif'),
(12, 0, 'Choisissez', '15/07/2018', 7, 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `bagage`
--

DROP TABLE IF EXISTS `bagage`;
CREATE TABLE IF NOT EXISTS `bagage` (
  `id_bagage` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `passager_id` int(11) NOT NULL,
  `id_gare` int(11) NOT NULL,
  PRIMARY KEY (`id_bagage`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bagage`
--

INSERT INTO `bagage` (`id_bagage`, `description`, `prix`, `date`, `user_id`, `passager_id`, `id_gare`) VALUES
(1, 'Description', 2000, '', 1, 1, 3),
(2, 'DESCRIPTION', 2000, '14/07/2018', 7, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `colis`
--

DROP TABLE IF EXISTS `colis`;
CREATE TABLE IF NOT EXISTS `colis` (
  `id_colis` int(11) NOT NULL AUTO_INCREMENT,
  `ref_colis` varchar(50) NOT NULL,
  `lib_colis` varchar(50) DEFAULT NULL,
  `etat` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date_create` varchar(15) NOT NULL,
  `id_type_colis` int(11) NOT NULL,
  `lieu_reception` int(11) NOT NULL,
  `passe` varchar(100) NOT NULL,
  `valeur` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `id_gare` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL DEFAULT 'Actif',
  PRIMARY KEY (`id_colis`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `colis`
--

INSERT INTO `colis` (`id_colis`, `ref_colis`, `lib_colis`, `etat`, `description`, `date_create`, `id_type_colis`, `lieu_reception`, `passe`, `valeur`, `montant`, `id_gare`, `id_expediteur`, `id_destinataire`, `user_id`, `statut`) VALUES
(1, 'ASZ', NULL, 'reçu', 'hhhv', '11/07/2018', 3, 3, 'SS', 2343, 464, 3, 1, 1, 7, 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `depart`
--

DROP TABLE IF EXISTS `depart`;
CREATE TABLE IF NOT EXISTS `depart` (
  `id_depart` int(11) NOT NULL AUTO_INCREMENT,
  `parcours` varchar(150) DEFAULT NULL,
  `date_depart` varchar(20) NOT NULL,
  `heure_depart` varchar(8) NOT NULL,
  `num_depart` int(11) DEFAULT NULL,
  `place_disponible` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `immatriculation` varchar(15) DEFAULT NULL,
  `date_ajout` varchar(15) DEFAULT NULL,
  `etat` varchar(25) DEFAULT NULL,
  `id_gare` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL DEFAULT 'Actif',
  PRIMARY KEY (`id_depart`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `depart`
--

INSERT INTO `depart` (`id_depart`, `parcours`, `date_depart`, `heure_depart`, `num_depart`, `place_disponible`, `user_id`, `immatriculation`, `date_ajout`, `etat`, `id_gare`, `statut`) VALUES
(2, NULL, '15/07/2018', '23:44', NULL, -4, 7, 'Choisissez', '15/07/2018', 'chargement en cours', 3, 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

DROP TABLE IF EXISTS `depense`;
CREATE TABLE IF NOT EXISTS `depense` (
  `id_depense` int(11) NOT NULL AUTO_INCREMENT,
  `nom_beneficiaire` varchar(100) NOT NULL,
  `motif` varchar(500) NOT NULL,
  `montant` int(11) NOT NULL,
  `type_payement` varchar(15) NOT NULL,
  `date` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_gare` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL DEFAULT 'Actif',
  PRIMARY KEY (`id_depense`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `destinataire`
--

DROP TABLE IF EXISTS `destinataire`;
CREATE TABLE IF NOT EXISTS `destinataire` (
  `id_destinataire` int(11) NOT NULL AUTO_INCREMENT,
  `nom_destinataire` varchar(50) NOT NULL,
  `prenom_destinataire` varchar(100) NOT NULL,
  `mobile_destinataire` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_create` varchar(15) NOT NULL,
  `statut` varchar(15) NOT NULL DEFAULT 'Actif',
  PRIMARY KEY (`id_destinataire`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `destinataire`
--

INSERT INTO `destinataire` (`id_destinataire`, `nom_destinataire`, `prenom_destinataire`, `mobile_destinataire`, `user_id`, `date_create`, `statut`) VALUES
(1, 'FF', 'FF', '4444', 7, '10/07/2018', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `id_destination` int(11) NOT NULL AUTO_INCREMENT,
  `ville_depart` varchar(100) NOT NULL,
  `ville_arrive` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL DEFAULT 'Actif',
  PRIMARY KEY (`id_destination`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `destination`
--

INSERT INTO `destination` (`id_destination`, `ville_depart`, `ville_arrive`, `tarif`, `date_create`, `user_id`, `statut`) VALUES
(1, 'ABIDJAN', 'YAMOUSSOUKRO', 3000, '2018-04-25 07:19:00', 1, 'Actif'),
(2, 'ABIDJAN', 'BOUAFLE', 4000, '2018-04-25 00:00:00', 1, 'Actif'),
(3, 'ABIDJAN', 'DALOA', 5000, '2018-04-25 00:00:00', 2, 'Actif'),
(4, 'ABIDJAN', 'DUEKOUE', 6000, '2018-04-25 00:00:00', 2, 'Actif'),
(6, 'ABIDJAN', 'MAN', 7000, '2018-04-25 00:00:00', 1, 'Actif'),
(7, 'ABIDJAN', 'BIENKOUMAN', 8000, '2018-04-25 00:00:00', 1, 'Actif'),
(8, 'ABIDJAN', 'TOUBA', 8000, '2018-04-25 00:00:00', 1, 'Actif'),
(9, 'ABIDJAN', 'ODIENNE', 10000, '2018-04-25 00:00:00', 1, 'Actif'),
(10, 'ODIENE', 'MAN', 3000, '2018-04-25 07:19:00', 1, 'Actif'),
(11, 'ODIENE', 'DUEKOUE', 5000, '2018-04-25 00:00:00', 1, 'Actif'),
(12, 'ODIENE', 'DALOA', 7000, '2018-04-25 00:00:00', 2, 'Actif'),
(13, 'ODIENE', 'BOUAFLE', 10000, '2018-04-25 00:00:00', 2, 'Actif'),
(14, 'ODIENE', 'YAMOUSSOUKRO', 10000, '2018-04-25 00:00:00', 1, 'Actif'),
(15, 'ODIENE', 'TOUMODI', 10000, '2018-04-25 00:00:00', 1, 'Actif'),
(16, 'ODIENE', 'ABIDJAN', 10000, '2018-04-25 00:00:00', 1, 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `expediteur`
--

DROP TABLE IF EXISTS `expediteur`;
CREATE TABLE IF NOT EXISTS `expediteur` (
  `id_expediteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_expediteur` varchar(50) NOT NULL,
  `prenom_expediteur` varchar(100) NOT NULL,
  `mobile_expediteur` varchar(15) NOT NULL,
  `nature_piece_expediteur` varchar(50) NOT NULL,
  `num_piece_expediteur` varchar(50) NOT NULL,
  `date_expedition` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_gare` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL DEFAULT 'Actif',
  PRIMARY KEY (`id_expediteur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `expediteur`
--

INSERT INTO `expediteur` (`id_expediteur`, `nom_expediteur`, `prenom_expediteur`, `mobile_expediteur`, `nature_piece_expediteur`, `num_piece_expediteur`, `date_expedition`, `user_id`, `id_gare`, `statut`) VALUES
(1, 'R', 'DDD', '45564556', 'PERMIS', '33ZS', '0000-00-00 00:00:00', 7, 0, 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `gare`
--

DROP TABLE IF EXISTS `gare`;
CREATE TABLE IF NOT EXISTS `gare` (
  `id_gare` int(11) NOT NULL AUTO_INCREMENT,
  `lib_gare` varchar(100) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL,
  PRIMARY KEY (`id_gare`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `gare`
--

INSERT INTO `gare` (`id_gare`, `lib_gare`, `ville`, `date_create`, `user_id`, `statut`) VALUES
(3, 'GARE ABIDJAN', 'ABIDJAN', '2018-06-24 00:00:00', 0, 'Actif'),
(4, 'GARE ODIENNE', 'ODIENNE', '2018-06-24 00:00:00', 0, 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_depense`
--

DROP TABLE IF EXISTS `ligne_depense`;
CREATE TABLE IF NOT EXISTS `ligne_depense` (
  `id_ligne_depense` int(11) NOT NULL AUTO_INCREMENT,
  `id_depense` int(11) NOT NULL,
  `id_personnel` int(11) NOT NULL,
  `immatriculation` varchar(15) NOT NULL,
  `date_depense` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL DEFAULT 'Actif',
  PRIMARY KEY (`id_ligne_depense`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `passager`
--

DROP TABLE IF EXISTS `passager`;
CREATE TABLE IF NOT EXISTS `passager` (
  `id_passager` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `num_siege` int(11) NOT NULL,
  `date_create` varchar(15) NOT NULL,
  `date_depart` varchar(15) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `id_destination` int(11) NOT NULL,
  `type_passager` varchar(30) NOT NULL,
  `tarif` int(11) NOT NULL,
  `id_depart` int(11) DEFAULT NULL,
  `id_gare` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL DEFAULT 'Actif',
  PRIMARY KEY (`id_passager`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `passager`
--

INSERT INTO `passager` (`id_passager`, `nom`, `prenom`, `mobile`, `num_siege`, `date_create`, `date_depart`, `user_id`, `id_destination`, `type_passager`, `tarif`, `id_depart`, `id_gare`, `statut`) VALUES
(1, 'KRA', 'JACOB', '56675667', 3, '15/07/2018', NULL, 1, 2, '1', 300, 1, 1, 'Actif'),
(2, 'FOURIER', 'MAN', '21450578', 2, '15/07/2018', '15/07/2018', 7, 4, 'normal', 6000, 2, 3, 'Actif'),
(3, 'FOURIER', 'MAN', '21450578', 2, '15/07/2018', '15/07/2018', 7, 4, 'normal', 6000, 2, 3, 'Actif'),
(4, 'KRA', 'KOUASSI JACOB', '45674567', 4, '15/07/2018', NULL, 7, 3, 'normal', 5000, NULL, 0, 'Actif'),
(5, 'KRA', 'KOUASSI JACOB', '45674567', 2, '15/07/2018', NULL, 7, 6, 'normal', 7000, NULL, 0, 'Actif'),
(6, 'KRA', 'KOUASSI JACOB', '45674567', 2, '15/07/2018', NULL, 7, 6, 'normal', 7000, NULL, 0, 'Actif'),
(7, 'KRA', 'KOUASSI JACOB', '45674567', 2, '15/07/2018', NULL, 7, 6, 'normal', 7000, NULL, 0, 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `id_personnel` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `date_create` datetime NOT NULL,
  `id_type_personnel` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL,
  `id_gare` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_personnel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personnel`
--

INSERT INTO `personnel` (`id_personnel`, `nom`, `prenom`, `mobile`, `date_create`, `id_type_personnel`, `user_id`, `statut`, `id_gare`) VALUES
(1, 'KOUYATE', 'Update', '1244', '2018-07-07 18:32:21', 1, 9, 'Actif', NULL),
(2, 'KOUYATE', 'DAOUDO', '1244', '2018-07-07 18:38:34', 1, 9, 'Actif', NULL),
(3, 'KOUYATE', 'FATIGA AHUE', '1244', '2018-07-07 18:41:18', 1, 9, 'Actif', NULL),
(4, 'KOUYATE', 'DOUGLAS', '1244', '2018-07-07 18:41:46', 1, 9, 'Actif', NULL),
(5, 'KOUYATE', 'DDD', '1244', '2018-07-07 18:36:53', 1, 9, 'Actif', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `id_destination` int(11) NOT NULL,
  `tarif` varchar(15) NOT NULL,
  `num_siege` int(11) NOT NULL,
  `date_reservation` varchar(15) NOT NULL,
  `date_depart` varchar(15) NOT NULL,
  `type_passager` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `num_depart` int(11) NOT NULL,
  `id_gare` int(11) NOT NULL,
  `etat` varchar(25) NOT NULL,
  `statut_reservation` varchar(15) NOT NULL DEFAULT 'Actif',
  PRIMARY KEY (`id_reservation`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `nom`, `prenom`, `mobile`, `id_destination`, `tarif`, `num_siege`, `date_reservation`, `date_depart`, `type_passager`, `user_id`, `num_depart`, `id_gare`, `etat`, `statut_reservation`) VALUES
(1, 'KRA', 'KOUASSI JACOB', '45674567', 3, '5000', 4, '15/07/2018', '15/07/2018', 'normal', 7, 1, 3, 'reservation validée', 'Actif'),
(2, 'KRA', 'KOUASSI JACOB', '45674567', 6, '7000', 2, '15/07/2018', '15/07/2018', 'normal', 7, 2, 3, 'reservation validée', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `type_colis`
--

DROP TABLE IF EXISTS `type_colis`;
CREATE TABLE IF NOT EXISTS `type_colis` (
  `id_type_colis` int(11) NOT NULL AUTO_INCREMENT,
  `lib_type_colis` varchar(100) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL,
  PRIMARY KEY (`id_type_colis`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_colis`
--

INSERT INTO `type_colis` (`id_type_colis`, `lib_type_colis`, `date_create`, `user_id`, `statut`) VALUES
(2, 'Autre', '2018-05-10 00:00:00', 0, 'Actif'),
(3, 'Courier', '2018-05-10 10:31:36', 0, 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `type_passager`
--

DROP TABLE IF EXISTS `type_passager`;
CREATE TABLE IF NOT EXISTS `type_passager` (
  `id_type_passager` int(11) NOT NULL AUTO_INCREMENT,
  `lib_type` varchar(100) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` varchar(12) NOT NULL,
  PRIMARY KEY (`id_type_passager`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_passager`
--

INSERT INTO `type_passager` (`id_type_passager`, `lib_type`, `date_create`, `user_id`, `statut`) VALUES
(1, 'Normal', '2018-04-19 19:49:25', 0, 'Actif'),
(2, 'Privilegié', '2018-04-19 20:08:44', 0, 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `type_personnel`
--

DROP TABLE IF EXISTS `type_personnel`;
CREATE TABLE IF NOT EXISTS `type_personnel` (
  `id_type_personnel` int(11) NOT NULL AUTO_INCREMENT,
  `lib_personnel` varchar(100) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL,
  PRIMARY KEY (`id_type_personnel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_personnel`
--

INSERT INTO `type_personnel` (`id_type_personnel`, `lib_personnel`, `date_create`, `user_id`, `statut`) VALUES
(1, 'CHAUFFEUR', '2018-04-19 20:03:34', 0, 'Actif'),
(2, 'CONVOYEUR', '2018-04-24 16:51:23', 0, 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `date_create` datetime NOT NULL,
  `statut` varchar(15) NOT NULL,
  `droit` varchar(50) NOT NULL,
  `id_gare` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `nom`, `prenom`, `email`, `password`, `date_create`, `statut`, `droit`, `id_gare`) VALUES
(7, 'Caissier', 'Abidjan', 'caissier@abidjan.com', '202cb962ac59075b964b07152d234b70', '2018-06-24 00:00:00', 'Actif', 'caissier', 3),
(8, 'Caissier', 'Odienné', 'caissier@odienne.com', '65f639c23827f2395a739d002ec277c0', '2018-06-24 00:00:00', 'Actif', 'caissier', 4),
(9, 'Superviseur', 'Superviseur', 'superviseur@gmail.com', '84d284a1eeb2909880112d2a650b6b69', '2018-06-24 00:00:00', 'Actif', 'superviseur', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `immatriculation` varchar(15) NOT NULL,
  `nbr_place` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL,
  PRIMARY KEY (`immatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

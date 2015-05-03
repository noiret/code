-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 26 Mars 2013 à 14:22
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `geststages`
--

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titreEns` varchar(5) NOT NULL,
  `nomEns` varchar(50) NOT NULL,
  `prenomEns` varchar(50) NOT NULL,
  `specialiteEns` varchar(100) NOT NULL,
  `anneeDebutEns` int(11) NOT NULL,
  `anneeFinEns` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` VALUES(1, 'M.', 'Mondet', 'Olivier', 'Informatique', 2000, 0);
INSERT INTO `enseignant` VALUES(2, 'M.', 'Castillo', 'Jean-Christophe', 'Informatique', 2001, 2008);
INSERT INTO `enseignant` VALUES(3, 'Mme', 'Martin', 'Marie-Frédérique', 'Economie - Droit - Management', 2000, 9999);
INSERT INTO `enseignant` VALUES(4, 'Mme', 'Buijs', 'Nathalie', 'Anglais', 2000, 9999);
INSERT INTO `enseignant` VALUES(5, 'Mme', 'GUELINEL-POMET', 'Marie-Laure', 'Informatique', 2002, 9999);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rsEnt` varchar(100) NOT NULL,
  `adr1Ent` varchar(100) NOT NULL,
  `adr2Ent` varchar(100) NOT NULL,
  `cpEnt` varchar(5) NOT NULL,
  `villeEnt` varchar(50) NOT NULL,
  `siteEnt` varchar(100) NOT NULL DEFAULT 'http://',
  `activiteEnt` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` VALUES(1, 'Melton Inc.', '122, avenue de la Grande ArmÃ©e', '', '75016', 'Paris', 'http://melton.org', 'Construction de structures en poils de chien.');
INSERT INTO `entreprise` VALUES(2, 'Youliouli', 'ZI les Corbeaux Aveugles', 'Boulevard de la Grand Europe', '91000', 'Evry', 'http://', 'Réparation de balançoires.');
INSERT INTO `entreprise` VALUES(4, 'General Informatics', '13, avenue LÃ©on Blum', '', '91000', 'EVRY', 'http://geninfo.com', 'SSII spÃ©cialisÃ©e dans les Ã©crans en bois de hÃªtre.');
INSERT INTO `entreprise` VALUES(8, 'edaz', 'zedaz', 'Ã©Ã©Ã©Ã©aaa', '2002', 'F', 'http://', '');
INSERT INTO `entreprise` VALUES(9, 'FDDF', 'Ã©lastique', '', '2005', 'Etampes', 'http://', 'VGF ElÃ©manÃ–');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomEtud` varchar(50) NOT NULL,
  `prenomEtud` varchar(50) NOT NULL,
  `sexeEtud` enum('M','F') NOT NULL,
  `optionEtud` enum('IG1','DA','ARLE','SISR','SLAM') NOT NULL,
  `anneeDebutEtud` int(11) NOT NULL,
  `anneeFinEtud` int(11) NOT NULL,
  `diplomeEtud` enum('Admis','Refusé','Démission','Réorientation') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` VALUES(1, 'Moulin', 'Christian', 'M', 'DA', 2000, 2002, 'Admis');
INSERT INTO `etudiant` VALUES(4, 'Tremier', 'Julie', 'F', 'IG1', 2001, 2002, '');
INSERT INTO `etudiant` VALUES(5, 'Treby', 'Marc', 'M', 'DA', 2001, 2003, 'Admis');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `idEnt` int(11) NOT NULL,
  `idEtud` int(11) NOT NULL,
  `anneeStage` int(11) NOT NULL,
  `contenuStage` varchar(299) NOT NULL,
  PRIMARY KEY (`idEnt`,`idEtud`,`anneeStage`),
  KEY `idEtud` (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stagiaire`
--

INSERT INTO `stagiaire` VALUES(1, 1, 2002, 'Création d''un site web.');
INSERT INTO `stagiaire` VALUES(1, 4, 2006, 'Création d''une interface en Java.');
INSERT INTO `stagiaire` VALUES(2, 1, 2003, 'Restructuration du réseau.');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `pwdUtil` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `roleUtil` enum('ADMIN','USER') COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` VALUES('admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN');
INSERT INTO `utilisateurs` VALUES('bernard.dupond', 'e10adc3949ba59abbe56e057f20f883e', 'USER');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `stagiaire_ibfk_1` FOREIGN KEY (`idEnt`) REFERENCES `entreprise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stagiaire_ibfk_2` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

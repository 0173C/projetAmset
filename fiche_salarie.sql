-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 sep. 2023 à 14:10
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fiche_salarie`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `idCompetence` int(11) NOT NULL AUTO_INCREMENT,
  `nomCompetence` char(32) NOT NULL,
  PRIMARY KEY (`idCompetence`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`idCompetence`, `nomCompetence`) VALUES
(1, 'devWeb'),
(2, 'integrationAppli'),
(3, 'conceptionAppli'),
(4, 'adminSIR'),
(5, 'devObj');

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

DROP TABLE IF EXISTS `salarie`;
CREATE TABLE IF NOT EXISTS `salarie` (
  `idSalarie` int(11) NOT NULL AUTO_INCREMENT,
  `nomSalarie` char(32) NOT NULL,
  `prenomSalarie` char(32) NOT NULL,
  `civilite` char(32) NOT NULL,
  `email` char(128) NOT NULL,
  `telephonne` int(11) NOT NULL,
  `adresse` char(128) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `ville` char(128) NOT NULL,
  `site` smallint(6) NOT NULL,
  `competences` int(11) NOT NULL,
  PRIMARY KEY (`idSalarie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `idSite` int(11) NOT NULL AUTO_INCREMENT,
  `nomSite` char(128) NOT NULL,
  PRIMARY KEY (`idSite`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sites`
--

INSERT INTO `sites` (`idSite`, `nomSite`) VALUES
(1, 'Paris'),
(2, 'Madrid'),
(3, 'Montréal'),
(4, 'Casablanca');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

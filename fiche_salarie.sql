-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 06 déc. 2023 à 12:10
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
-- Base de données : `fiche_salarie`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `idCompetence` int(11) NOT NULL AUTO_INCREMENT,
  `nomCompetence` char(32) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idCompetence`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`idCompetence`, `nomCompetence`) VALUES
(1, 'Devellopement objet'),
(2, 'Administration système et réseau'),
(3, "Conception d'application"),
(4, "Intégration d'applications"),
(5, 'Dévellopement web');

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

DROP TABLE IF EXISTS `salarie`;
CREATE TABLE IF NOT EXISTS `salarie` (
  `idSalarie` int(11) NOT NULL AUTO_INCREMENT,
  `nomSalarie` char(32) CHARACTER SET latin1 NOT NULL,
  `prenomSalarie` char(32) CHARACTER SET latin1 NOT NULL,
  `civilite` char(32) CHARACTER SET latin1 NOT NULL,
  `email` char(128) CHARACTER SET latin1 NOT NULL,
  `telephonne` int(11) NOT NULL,
  `adresse` char(128) CHARACTER SET latin1 NOT NULL,
  `codePostal` int(11) NOT NULL,
  `ville` char(128) CHARACTER SET latin1 NOT NULL,
  `site` smallint(6) NOT NULL,
  `competences` text CHARACTER SET latin1,
  PRIMARY KEY (`idSalarie`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salarie`
--

INSERT INTO `salarie` (`idSalarie`, `nomSalarie`, `prenomSalarie`, `civilite`, `email`, `telephonne`, `adresse`, `codePostal`, `ville`, `site`, `competences`) VALUES
(1, 'Dupont', 'Jean', 'homme', 'jean.dupont@email.com', 1234567890, '123 Rue de la Ville', 75000, 'Paris', 1, '10100'),
(2, 'Martin', 'Sophie', 'femme', 'sophie.martin@email.com', 2147483647, '456 Avenue des Champs', 69000, 'Lyon', 2, '00011'),
(3, 'Lefebvre', 'Pierre', 'homme', 'pierre.lefebvre@email.com', 2147483647, '789 Boulevard des Fleurs', 31000, 'Toulouse', 3, '10001'),
(4, 'Dubois', 'Marie', 'femme', 'marie.dubois@email.com', 2147483647, '321 Rue de la Mer', 13000, 'Marseille', 4, '01101'),
(5, 'Leclerc', 'Paul', 'homme', 'paul.leclerc@email.com', 2147483647, '567 Avenue du Soleil', 44000, 'Nantes', 1, '01111'),
(6, 'Garcia', 'Isabelle', 'femme', 'isabelle.garcia@email.com', 2147483647, '234 Rue de la Montagne', 59000, 'Lille', 2, '00111'),
(7, 'Thomas', 'François', 'homme', 'francois.thomas@email.com', 2147483647, '876 Boulevard de la Plage', 75000, 'Paris', 3, '10011'),
(8, 'Robert', 'Catherine', 'femme', 'catherine.robert@email.com', 2147483647, '765 Avenue de la Forêt', 69000, 'Lyon', 4, '01111'),
(9, 'Petit', 'David', 'homme', 'david.petit@email.com', 2147483647, '123 Rue du Lac', 31000, 'Toulouse', 1, '10010'),
(10, 'Roussel', 'Émilie', 'femme', 'emilie.roussel@email.com', 2147483647, '432 Avenue de la Rivière', 13000, 'Marseille', 2, '01101'),
(11, 'Durand', 'Nicolas', 'homme', 'nicolas.durand@email.com', 2147483647, '678 Boulevard de la Montagne', 44000, 'Nantes', 3, '01100'),
(12, 'Moreau', 'Anne', 'femme', 'anne.moreau@email.com', 2147483647, '987 Rue de la Plage', 59000, 'Lille', 4, '10101'),
(13, 'Lopez', 'Philippe', 'homme', 'philippe.lopez@email.com', 2147483647, '234 Avenue des Fleurs', 75000, 'Paris', 1, '01001'),
(14, 'Gonzalez', 'Sylvie', 'femme', 'sylvie.gonzalez@email.com', 2147483647, '876 Boulevard de la Ville', 69000, 'Lyon', 2, '01111'),
(15, 'Sanchez', 'Richard', 'homme', 'richard.sanchez@email.com', 2147483647, '321 Rue de la Montagne', 31000, 'Toulouse', 3, '01111'),
(16, 'Ramirez', 'Julie', 'femme', 'julie.ramirez@email.com', 2147483647, '543 Avenue des Champs', 13000, 'Marseille', 4, '11110'),
(17, 'Torres', 'François', 'homme', 'francois.torres@email.com', 2147483647, '765 Rue de la Forêt', 44000, 'Nantes', 1, '01111'),
(18, 'García', 'Laura', 'femme', 'laura.garcia@email.com', 2147483647, '123 Avenue de la Rivière', 59000, 'Lille', 2, '01110'),
(19, 'Lopez', 'Jean', 'homme', 'jean.lopez@email.com', 2147483647, '432 Boulevard de la Montagne', 75000, 'Paris', 3, '11010'),
(20, 'Perez', 'Sophie', 'femme', 'sophie.perez@email.com', 2147483647, '567 Rue de la Mer', 69000, 'Lyon', 4, '11011'),
(21, 'Martin', 'Pierre', 'homme', 'pierre.martin@email.com', 2147483647, '876 Avenue du Soleil', 31000, 'Toulouse', 1, '11010'),
(22, 'Dubois', 'Marie', 'femme', 'marie.dubois@email.com', 2147483647, '765 Boulevard des Fleurs', 13000, 'Marseille', 2, '10001'),
(23, 'Thomas', 'Paul', 'homme', 'paul.thomas@email.com', 2147483647, '234 Rue de la Montagne', 44000, 'Nantes', 3, '01010'),
(24, 'Robert', 'Isabelle', 'femme', 'isabelle.robert@email.com', 2147483647, '543 Avenue de la Forêt', 59000, 'Lille', 4, '11110'),
(25, 'Petit', 'David', 'homme', 'david.petit@email.com', 2147483647, '987 Rue de la Rivière', 75000, 'Paris', 1, '11100'),
(26, 'Roussel', 'Émilie', 'femme', 'emilie.roussel@email.com', 2147483647, '123 Avenue des Champs', 69000, 'Lyon', 2, '10011'),
(27, 'Durand', 'Nicolas', 'homme', 'nicolas.durand@email.com', 2147483647, '876 Boulevard de la Ville', 31000, 'Toulouse', 3, '01100'),
(28, 'Moreau', 'Anne', 'femme', 'anne.moreau@email.com', 2147483647, '567 Rue de la Mer', 13000, 'Marseille', 4, '00001'),
(29, 'Lopez', 'Philippe', 'homme', 'philippe.lopez@email.com', 2147483647, '765 Avenue du Soleil', 44000, 'Nantes', 1, '00010'),
(30, 'Gonzalez', 'Sylvie', 'femme', 'sylvie.gonzalez@email.com', 2147483647, '234 Rue de la Rivière', 59000, 'Lille', 2, '01001');

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `idSite` int(11) NOT NULL AUTO_INCREMENT,
  `nomSite` char(128) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idSite`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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

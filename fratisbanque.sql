-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 27 déc. 2020 à 15:17
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fratisbanque`
--

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

DROP TABLE IF EXISTS `assurance`;
CREATE TABLE IF NOT EXISTS `assurance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `DateOuverture` varchar(255) NOT NULL,
  `DateFermeture` varchar(255) DEFAULT NULL,
  `Frais` varchar(255) DEFAULT NULL,
  `Validite` tinyint(1) NOT NULL,
  `BanquierEnCharge` varchar(255) NOT NULL,
  `Commentaire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assurance`
--

INSERT INTO `assurance` (`id`, `idClient`, `DateOuverture`, `DateFermeture`, `Frais`, `Validite`, `BanquierEnCharge`, `Commentaire`) VALUES
(1, 15, '2019-11-22', '2021-01-24', '1234', 1, 'Admin', 'test'),
(2, 17, '2019-11-22', '2020-11-24', '1234', 1, '', 'test'),
(3, 25, '2020-12-31', '2020-01-01', '10000', 1, '', ''),
(4, 24, '2020-12-31', '2021-12-30', '12000', 1, 'Admin', '');

-- --------------------------------------------------------

--
-- Structure de la table `banquecompte`
--

DROP TABLE IF EXISTS `banquecompte`;
CREATE TABLE IF NOT EXISTS `banquecompte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) DEFAULT NULL,
  `somme` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `banquecompte`
--

INSERT INTO `banquecompte` (`id`, `intitule`, `somme`) VALUES
(1, 'coffre', 11000),
(2, 'impots', 5000);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idDiscord` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `Emploie` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `premium` tinyint(1) NOT NULL DEFAULT 0,
  `dateDeCreation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `idDiscord` (`idDiscord`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `Nom`, `Prenom`, `email`, `idDiscord`, `telephone`, `Emploie`, `Adresse`, `premium`, `dateDeCreation`) VALUES
(12, 'moi', 'test', 'test@discord.gg', 'test#1234', '123454', 'test', 'test', 0, '2019-11-20'),
(13, 'test1', 'test2', 'test@gmail.com', 'test234', '1234', 'test', 'test', 0, '2019-11-20'),
(15, 'admin', 'admin', 'admin@gg.gg', 'azre#123', '1234', 'test', 'test', 0, '2019-11-22'),
(25, 'ttt', 'ttt', 'ttt@tt.tt', 'tt#12334', '12344', 'ttt', 'ttt', 0, '2020-12-31'),
(24, 'mm', 'mm', 'mm@mm.com', 'mm#1234', '1234', 'mm', 'mm', 0, '2020-12-31'),
(23, 'b', 'b', 'b@b.v', 'b#123', '123', 'b', 'b', 0, '2020-12-31'),
(22, 'a', 'a', 'a@a.a', 'a', '12', 'a', 'a', 0, '2020-12-31'),
(26, 'qq', 'qq', 'qq@qq.q', 'qqq', '123', 'qqq', 'qq', 0, '2020-12-31');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `DateOuverture` varchar(255) NOT NULL,
  `DateFermeture` varchar(255) DEFAULT NULL,
  `Solde` varchar(255) DEFAULT NULL,
  `DernierAjout` varchar(255) NOT NULL DEFAULT '0',
  `DateDernierAjout` varchar(255) NOT NULL,
  `Validite` tinyint(1) NOT NULL,
  `BanquierEnCharge` varchar(255) NOT NULL,
  `Commentaire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `idClient`, `Type`, `DateOuverture`, `DateFermeture`, `Solde`, `DernierAjout`, `DateDernierAjout`, `Validite`, `BanquierEnCharge`, `Commentaire`) VALUES
(4, 25, 'diamant', '2020-12-31', '2021-01-01', '43600', '8000', '2020-12-27', 1, 'Admin', 'test'),
(3, 24, 'diamant', '2020-12-31', '2021-01-01', '43600', '8000', '2020-12-27', 1, 'Admin', 'test'),
(2, 13, 'fraise', '2019-11-20', '', '20600', '10000', '2020-12-27', 1, 'Admin', 'test'),
(1, 12, 'diamant', '2019-11-20', '2021-01-22', '43600', '8000', '2020-12-27', 1, 'Admin', 'test'),
(5, 26, 'diamant', '2020-12-31', '2021-01-31', '8000', '8000', '2020-12-31', 1, 'Admin', '');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `dateDeCreation` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `Nom`, `Prenom`, `email`, `grade`, `dateDeCreation`, `telephone`, `motdepasse`) VALUES
(1, 'Admin', 'admin', 'admin@discord.gg', 'Administrateur', '20/12/2020', '000-000', 'admin'),
(2, 'Test', 'test', 'test@test.ts', 'Employe', '2020-12-27', '1234', 'test'),
(7, 'Admin2', 'Admin', 'admin2@gmail.com', 'Administrateur', '2020-12-27', '1234', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `pret`
--

DROP TABLE IF EXISTS `pret`;
CREATE TABLE IF NOT EXISTS `pret` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `DateOuverture` varchar(255) NOT NULL,
  `DateFermeture` varchar(255) DEFAULT NULL,
  `MontantPret` varchar(255) DEFAULT NULL,
  `MontantArendre` varchar(255) DEFAULT NULL,
  `Validite` tinyint(1) NOT NULL,
  `BanquierEnCharge` varchar(255) NOT NULL,
  `Commentaire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pret`
--

INSERT INTO `pret` (`id`, `idClient`, `DateOuverture`, `DateFermeture`, `MontantPret`, `MontantArendre`, `Validite`, `BanquierEnCharge`, `Commentaire`) VALUES
(1, 23, '2020-12-31', '2021-01-01', '1234', '2345', 1, 'Admin', 'test'),
(3, 12, '2020-12-01', '2021-01-01', '1234', '12345', 1, 'Admin', '');

-- --------------------------------------------------------

--
-- Structure de la table `suivieemploye`
--

DROP TABLE IF EXISTS `suivieemploye`;
CREATE TABLE IF NOT EXISTS `suivieemploye` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(11) NOT NULL,
  `dateAction` varchar(255) NOT NULL,
  `actions` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `suivieemploye`
--

INSERT INTO `suivieemploye` (`id`, `idEmploye`, `dateAction`, `actions`) VALUES
(2, 1, '2020-12-27', 'test'),
(4, 1, '2020-12-27', 'Alimenter les comptes diamant de 100 $'),
(5, 1, '2020-12-27', 'CrÃ©ation de l assurance pour le client 24'),
(6, 1, '2020-12-27', 'CrÃ©ation de l assurance pour le client 24'),
(7, 1, '2020-12-27', 'CrÃ©ation de l assurance pour le client 24'),
(8, 1, '2020-12-27', 'CrÃ©ation du compte employe AZZ AZZ'),
(9, 1, '2020-12-27', 'Fermeture du compte employe 1'),
(10, 1, '2020-12-27', 'CrÃ©ation du compte employe test test'),
(11, 1, '2020-12-27', 'Fermeture du compte employe 6 par 1'),
(12, 1, '2020-12-27', 'CrÃ©ation du compte epargne 5'),
(13, 1, '2020-12-27', 'CrÃ©ation du compte employe Admin2 Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

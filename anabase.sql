-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 mai 2022 à 14:12
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `anabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `NUM_ACTIVITE` int(2) NOT NULL,
  `NOM_ACTIVITE` char(32) DEFAULT NULL,
  `DATE_ACTIVITE` date DEFAULT NULL,
  `HEURE_ACTIVITE` time DEFAULT NULL,
  `PRIX_ACTIVITE` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `congressiste`
--

CREATE TABLE `congressiste` (
  `NUM_CONGRESSISTE` int(2) NOT NULL,
  `NUM_ORGANISME` int(2) DEFAULT NULL,
  `NUM_HOTEL` int(2) DEFAULT NULL,
  `NOM_CONGRESSISTE` char(32) DEFAULT NULL,
  `PRENOM_CONGRESSISTE` char(32) DEFAULT NULL,
  `ADRESSE_CONGRESSISTE` char(50) DEFAULT NULL,
  `TEL_CONGRESSISTE` char(10) DEFAULT NULL,
  `DATE_INSCRIPTION` date DEFAULT NULL,
  `CODE_ACCOMPAGNATEUR` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `congressiste`
--

INSERT INTO `congressiste` (`NUM_CONGRESSISTE`, `NUM_ORGANISME`, `NUM_HOTEL`, `NOM_CONGRESSISTE`, `PRENOM_CONGRESSISTE`, `ADRESSE_CONGRESSISTE`, `TEL_CONGRESSISTE`, `DATE_INSCRIPTION`, `CODE_ACCOMPAGNATEUR`) VALUES
(0, 8, 1, 'Test', 'Test', 'Test', '0111', '2022-05-04', 1),
(1, 2, 1, 'Michel', 'Thierry', '3 rue des lilas', '0589548756', '2021-09-15', 1),
(2, 2, 1, 'Rodrigues', 'Emma', '6 Rue Saint Dominique', '0614151617', '2021-09-08', 12),
(3, 2, 27, 'Romuald', 'André', '4 Avenue du Bosquet', '0478987512', '2021-09-29', 1),
(4, 2, 1, 'SINGH', 'Liberty', '16 rue des platannes', '0785956523', '2021-10-23', 6),
(5, 2, 1, 'Cook', 'Tim', 'One Apple Park Way', '0810074562', '2011-02-09', 23),
(6, 8, 1, 'Test', 'Test', 'Test', '0111', '2022-05-04', 1);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `NUM_FACTURE` int(2) NOT NULL,
  `NUM_CONGRESSISTE` int(2) NOT NULL,
  `DATE_FACTURE` date DEFAULT NULL,
  `CODE_REGLEMENT` tinyint(1) DEFAULT NULL,
  `MONTANT_FACTURE` bigint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `NUM_HOTEL` int(2) NOT NULL,
  `NOM_HOTEL` char(32) DEFAULT NULL,
  `ADRESSE_HOTEL` char(50) DEFAULT NULL,
  `NOMBRE_ETOILES` smallint(1) DEFAULT NULL,
  `PRIX_PARTICIPANT` int(2) DEFAULT NULL,
  `PRIX_SUPPL` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`NUM_HOTEL`, `NOM_HOTEL`, `ADRESSE_HOTEL`, `NOMBRE_ETOILES`, `PRIX_PARTICIPANT`, `PRIX_SUPPL`) VALUES
(31, 'test', 'test', 2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `organisme_payeur`
--

CREATE TABLE `organisme_payeur` (
  `NUM_ORGANISME` int(2) NOT NULL,
  `NOM_ORGANISME` char(32) DEFAULT NULL,
  `ADRESSE_ORGANISME` char(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participation_session`
--

CREATE TABLE `participation_session` (
  `NUM_CONGRESSISTE` int(2) NOT NULL,
  `NUM_SESSION` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rel_1`
--

CREATE TABLE `rel_1` (
  `NUM_CONGRESSISTE` int(2) NOT NULL,
  `NUM_ACTIVITE` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `NUM_SESSION` int(2) NOT NULL,
  `DATE_SESSION` date DEFAULT NULL,
  `HEURE_SESSION` time DEFAULT NULL,
  `PRIX_SESSION` int(2) DEFAULT NULL,
  `NOM_SESSION` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`NUM_ACTIVITE`);

--
-- Index pour la table `congressiste`
--
ALTER TABLE `congressiste`
  ADD PRIMARY KEY (`NUM_CONGRESSISTE`),
  ADD KEY `I_FK_CONGRESSISTE_ORGANISME_PAYEUR` (`NUM_ORGANISME`),
  ADD KEY `I_FK_CONGRESSISTE_HOTEL` (`NUM_HOTEL`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`NUM_FACTURE`),
  ADD UNIQUE KEY `I_FK_FACTURE_CONGRESSISTE` (`NUM_CONGRESSISTE`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`NUM_HOTEL`);

--
-- Index pour la table `organisme_payeur`
--
ALTER TABLE `organisme_payeur`
  ADD PRIMARY KEY (`NUM_ORGANISME`);

--
-- Index pour la table `participation_session`
--
ALTER TABLE `participation_session`
  ADD PRIMARY KEY (`NUM_CONGRESSISTE`,`NUM_SESSION`),
  ADD KEY `I_FK_PARTICIPATION_SESSION_CONGRESSISTE` (`NUM_CONGRESSISTE`),
  ADD KEY `I_FK_PARTICIPATION_SESSION_SESSION` (`NUM_SESSION`);

--
-- Index pour la table `rel_1`
--
ALTER TABLE `rel_1`
  ADD PRIMARY KEY (`NUM_CONGRESSISTE`,`NUM_ACTIVITE`),
  ADD KEY `I_FK_REL_1_CONGRESSISTE` (`NUM_CONGRESSISTE`),
  ADD KEY `I_FK_REL_1_ACTIVITE` (`NUM_ACTIVITE`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`NUM_SESSION`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `NUM_HOTEL` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

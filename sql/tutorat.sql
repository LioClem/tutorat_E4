-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 27 Novembre 2017 à 10:21
-- Version du serveur :  5.5.46-0+deb8u1
-- Version de PHP :  5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tutorat`
--

-- --------------------------------------------------------

--
-- Structure de la table `compterendu`
--

CREATE TABLE IF NOT EXISTS `compterendu` (
`cr_code` int(11) NOT NULL,
  `cr_date` varchar(10) NOT NULL,
  `cr_texte` varchar(300) NOT NULL,
  `cr_type` varchar(7) NOT NULL,
  `p_code` int(11) NOT NULL,
  `e_code` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compterendu`
--

INSERT INTO `compterendu` (`cr_code`, `cr_date`, `cr_texte`, `cr_type`, `p_code`, `e_code`) VALUES
(1, '09/12/1997', 'c''est des consanguin', 'Tutorat', 1, 1),
(2, '09/12/1977', 'tageule', 'Famille', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
`e_code` int(11) NOT NULL,
  `e_login` varchar(7) NOT NULL,
  `e_mdp` varchar(50) NOT NULL,
  `e_nom` varchar(50) NOT NULL,
  `e_prenom` varchar(50) NOT NULL,
  `e_age` int(2) DEFAULT NULL,
  `e_regime` varchar(10) DEFAULT NULL,
  `e_ville` varchar(50) DEFAULT NULL,
  `e_tempstrajet` int(11) DEFAULT NULL COMMENT 'min',
  `e_intituleBac` varchar(20) DEFAULT NULL,
  `e_anneeBac` int(4) DEFAULT NULL,
  `e_etablissementBac` varchar(50) DEFAULT NULL,
  `p_code` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`e_code`, `e_login`, `e_mdp`, `e_nom`, `e_prenom`, `e_age`, `e_regime`, `e_ville`, `e_tempstrajet`, `e_intituleBac`, `e_anneeBac`, `e_etablissementBac`, `p_code`) VALUES
(1, 'LEBOSS', '3c018426ba45a42286951e125408ea7374c864f5', 'THIBAUT', 'Valentin', 19, 'DP', 'Rochefort', 5, 'STMG', 2015, 'Lycée Merleau-Ponty', 1),
(2, 'SEUWING', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'SEUWIN', 'Gauthier', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'LIORITC', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'LIORIT', 'Clément', 19, 'Interne', 'Rochefort', 2, 'S', 1998, 'Lycée Dassaut', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `infosetu`
--

CREATE TABLE IF NOT EXISTS `infosetu` (
`i_code` int(11) NOT NULL,
  `i_isTravail` tinyint(1) NOT NULL,
  `i_nbHSemaineTravail` int(2) NOT NULL,
  `i_numChoix` int(1) NOT NULL,
  `i_motivChoix` varchar(100) NOT NULL,
  `i_Option` varchar(4) NOT NULL,
  `i_motivOpt` varchar(100) NOT NULL,
  `i_nivPostedeTravail` varchar(10) NOT NULL,
  `i_compMat` varchar(10) NOT NULL,
  `i_precMat` varchar(100) NOT NULL,
  `i_compSyst` varchar(10) NOT NULL,
  `i_precSyst` varchar(100) NOT NULL,
  `i_compReseau` varchar(10) NOT NULL,
  `i_precReseau` varchar(100) NOT NULL,
  `i_compDev` varchar(10) NOT NULL,
  `i_precDev` varchar(100) NOT NULL,
  `i_compWeb` varchar(10) NOT NULL,
  `i_precWeb` varchar(100) NOT NULL,
  `i_LSP` varchar(100) NOT NULL,
  `i_ProjPro` varchar(100) NOT NULL,
  `i_pointsforts` varchar(100) NOT NULL,
  `i_obstacles` varchar(100) NOT NULL,
  `e_code` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `infosetu`
--

INSERT INTO `infosetu` (`i_code`, `i_isTravail`, `i_nbHSemaineTravail`, `i_numChoix`, `i_motivChoix`, `i_Option`, `i_motivOpt`, `i_nivPostedeTravail`, `i_compMat`, `i_precMat`, `i_compSyst`, `i_precSyst`, `i_compReseau`, `i_precReseau`, `i_compDev`, `i_precDev`, `i_compWeb`, `i_precWeb`, `i_LSP`, `i_ProjPro`, `i_pointsforts`, `i_obstacles`, `e_code`) VALUES
(1, 1, 1, 1, 'javais envie', 'SLAM', 'parce que', 'avancé', 'avancé', 'jaime bien ta carte mère', 'novice', 'cest quoi un OS ?', 'avancé', 'LAN ou WA', 'avancé', 'je suis un pro', 'standard', 'jai un blog', 'rien', 'aucun', 'aucun fort', 'beaucoup trop', 1);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE IF NOT EXISTS `professeur` (
`p_code` int(11) NOT NULL,
  `p_login` varchar(7) NOT NULL,
  `p_mdp` varchar(50) NOT NULL,
  `p_nom` varchar(50) NOT NULL,
  `p_prenom` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`p_code`, `p_login`, `p_mdp`, `p_nom`, `p_prenom`) VALUES
(1, 'prof', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'valentin', 'thibaut'),
(2, 'DAVOUSP', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'DAVOUST', 'Pascal');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `compterendu`
--
ALTER TABLE `compterendu`
 ADD PRIMARY KEY (`cr_code`), ADD KEY `p_code` (`p_code`,`e_code`), ADD KEY `e_code` (`e_code`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
 ADD PRIMARY KEY (`e_code`), ADD KEY `e_code` (`e_code`), ADD KEY `e_code_2` (`e_code`), ADD KEY `p_code` (`p_code`);

--
-- Index pour la table `infosetu`
--
ALTER TABLE `infosetu`
 ADD PRIMARY KEY (`i_code`), ADD KEY `e_code` (`e_code`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
 ADD PRIMARY KEY (`p_code`), ADD KEY `p_code` (`p_code`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `compterendu`
--
ALTER TABLE `compterendu`
MODIFY `cr_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
MODIFY `e_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `infosetu`
--
ALTER TABLE `infosetu`
MODIFY `i_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
MODIFY `p_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compterendu`
--
ALTER TABLE `compterendu`
ADD CONSTRAINT `compterendu_ibfk_1` FOREIGN KEY (`p_code`) REFERENCES `professeur` (`p_code`),
ADD CONSTRAINT `compterendu_ibfk_2` FOREIGN KEY (`e_code`) REFERENCES `etudiant` (`e_code`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`p_code`) REFERENCES `professeur` (`p_code`);

--
-- Contraintes pour la table `infosetu`
--
ALTER TABLE `infosetu`
ADD CONSTRAINT `infosetu_ibfk_1` FOREIGN KEY (`e_code`) REFERENCES `etudiant` (`e_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

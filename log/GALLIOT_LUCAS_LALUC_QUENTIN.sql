-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 07 déc. 2017 à 01:20
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `SCD`
--

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheque`
--

CREATE TABLE `bibliotheque` (
  `SIREN` int(11) NOT NULL DEFAULT '0',
  `LIEU` varchar(60) DEFAULT NULL,
  `NOM` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bibliotheque`
--

INSERT INTO `bibliotheque` (`SIREN`, `LIEU`, `NOM`) VALUES
(191010602, 'Troyes', 'SCD');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `INDICE` int(11) NOT NULL,
  `NB_OUVRAGE` int(11) NOT NULL,
  `NB_JOUR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`INDICE`, `NB_OUVRAGE`, `NB_JOUR`) VALUES
(1, 3, 10),
(2, 5, 15),
(3, 6, 20);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `DATE_EMP` date DEFAULT NULL,
  `NUM_EMPRUNT` int(11) NOT NULL,
  `ID_OUVR` int(11) NOT NULL,
  `SIREN_EM` int(11) NOT NULL,
  `NUMETU_EM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`DATE_EMP`, `NUM_EMPRUNT`, `ID_OUVR`, `SIREN_EM`, `NUMETU_EM`) VALUES
('2017-10-30', 1, 5, 191010602, 42437),
('2017-11-27', 2, 6, 191010602, 42437),
('2017-12-03', 3, 1, 191010602, 42437),
('2017-11-27', 4, 2, 191010602, 39758),
('2017-12-03', 5, 3, 191010602, 39758);

-- --------------------------------------------------------

--
-- Structure de la table `enregistre`
--

CREATE TABLE `enregistre` (
  `DATE_R` date NOT NULL DEFAULT '0000-00-00',
  `ID_OUVRA` int(11) DEFAULT NULL,
  `SIREN_EN` int(11) DEFAULT NULL,
  `QUANTITE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enregistre`
--

INSERT INTO `enregistre` (`DATE_R`, `ID_OUVRA`, `SIREN_EN`, `QUANTITE`) VALUES
('2017-10-19', 1, 191010602, 1),
('2017-10-20', 2, 191010602, 2),
('2017-10-21', 3, 191010602, 3),
('2017-10-22', 4, 191010602, 4),
('2017-10-23', 5, 191010602, 3),
('2017-10-24', 6, 191010602, 2),
('2017-10-25', 7, 191010602, 1),
('2017-10-26', 8, 191010602, 2),
('2017-10-27', 9, 191010602, 3),
('2017-10-28', 10, 191010602, 4),
('2017-12-05', 18, 191010602, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `ID` int(11) NOT NULL,
  `TYPE` varchar(20) DEFAULT NULL,
  `DDP` date DEFAULT NULL,
  `TITRE` varchar(60) DEFAULT NULL,
  `AUTEUR` varchar(20) DEFAULT NULL,
  `GENRE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`ID`, `TYPE`, `DDP`, `TITRE`, `AUTEUR`, `GENRE`) VALUES
(1, 'ROMAN', '1997-01-26', 'The Philosopher\' stone', 'J.K. ROWLING', 'FANTASTIQUE'),
(2, 'ROMAN', '1998-07-02', 'The Chamber of secrets', 'J.K. ROWLING', 'FANTASTIQUE'),
(3, 'ROMAN', '1999-07-08', 'The Prisoner of Azkaban', 'J.K. ROWLING', 'FANTASTIQUE'),
(4, 'ROMAN', '2000-07-08', 'The Goblet of Fire', 'J.K. ROWLING', 'FANTASTIQUE'),
(5, 'ROMAN', '2003-06-21', 'The Order of the Phoenix', 'J.K. ROWLING', 'FANTASTIQUE'),
(6, 'ROMAN', '2005-07-16', 'The Half-Blood Prince', 'J.K. ROWLING', 'FANTASTIQUE'),
(7, 'ROMAN', '2007-06-21', 'The Deathly Hallows', 'J.K. ROWLING', 'FANTASTIQUE'),
(8, 'ROMAN', '2016-08-16', 'Ma part de Gaulois', 'Magyd Cherfi', 'FICTION'),
(9, 'ROMAN', '1934-01-01', 'The Murder on the Orient Express', 'Agatha Christie', 'POLICIER'),
(10, 'ROMAN', '1937-11-01', 'Death on the Nile', 'Agatha Christie', 'POLICIER'),
(18, 'ROMAN', '2017-10-04', 'ORIGIN', 'DAN BROWN', 'POLICIER');

-- --------------------------------------------------------

--
-- Structure de la table `RETARD`
--

CREATE TABLE `RETARD` (
  `NUMETU_RET` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

CREATE TABLE `suggestion` (
  `DATE_S` date NOT NULL DEFAULT '0000-00-00',
  `AUTEUR_S` varchar(20) NOT NULL,
  `QUANTITE_S` int(11) NOT NULL,
  `NUMETU` int(11) NOT NULL,
  `SIREN` int(11) NOT NULL,
  `TITRE` varchar(60) DEFAULT NULL,
  `ID_SUGG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `suggestion`
--

INSERT INTO `suggestion` (`DATE_S`, `AUTEUR_S`, `QUANTITE_S`, `NUMETU`, `SIREN`, `TITRE`, `ID_SUGG`) VALUES
('2017-12-05', 'DAN BROWN', 2, 42437, 191010602, 'ORIGIN', 2);

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

CREATE TABLE `usager` (
  `NOM` varchar(20) DEFAULT NULL,
  `PRENOM` varchar(20) DEFAULT NULL,
  `CATEGORIE` int(11) NOT NULL,
  `DDN` date DEFAULT NULL,
  `NUMETU` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `usager`
--

INSERT INTO `usager` (`NOM`, `PRENOM`, `CATEGORIE`, `DDN`, `NUMETU`) VALUES
('GALLIOT', 'Lucas', 3, '1998-02-28', 39758),
('LALUC', 'Quentin', 2, '1997-07-28', 42437);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view1`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `view1` (
`ID` int(11)
,`TYPE` varchar(20)
,`DDP` date
,`TITRE` varchar(60)
,`AUTEUR` varchar(20)
,`GENRE` varchar(20)
,`DATE_EMP` date
,`NUM_EMPRUNT` int(11)
,`SIREN_EM` int(11)
,`DATE_R` date
,`QUANTITE` int(11)
,`NOM` varchar(20)
,`PRENOM` varchar(20)
,`CATEGORIE` int(11)
,`NUMETU` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la vue `view1`
--
DROP TABLE IF EXISTS `view1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `scd`.`view1`  AS  select `o`.`ID` AS `ID`,`o`.`TYPE` AS `TYPE`,`o`.`DDP` AS `DDP`,`o`.`TITRE` AS `TITRE`,`o`.`AUTEUR` AS `AUTEUR`,`o`.`GENRE` AS `GENRE`,`em`.`DATE_EMP` AS `DATE_EMP`,`em`.`NUM_EMPRUNT` AS `NUM_EMPRUNT`,`em`.`SIREN_EM` AS `SIREN_EM`,`en`.`DATE_R` AS `DATE_R`,`en`.`QUANTITE` AS `QUANTITE`,`u`.`NOM` AS `NOM`,`u`.`PRENOM` AS `PRENOM`,`u`.`CATEGORIE` AS `CATEGORIE`,`u`.`NUMETU` AS `NUMETU` from (((`scd`.`ouvrage` `o` join `scd`.`emprunt` `em`) join `scd`.`enregistre` `en`) join `scd`.`usager` `u`) where ((`o`.`ID` = `em`.`ID_OUVR`) and (`en`.`ID_OUVRA` = `o`.`ID`) and (`em`.`NUMETU_EM` = `u`.`NUMETU`)) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  ADD PRIMARY KEY (`SIREN`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`INDICE`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`NUM_EMPRUNT`),
  ADD KEY `ID` (`ID_OUVR`,`SIREN_EM`,`NUMETU_EM`),
  ADD KEY `SIREN` (`SIREN_EM`),
  ADD KEY `ID_2` (`ID_OUVR`),
  ADD KEY `NUM_ETU` (`NUMETU_EM`);

--
-- Index pour la table `enregistre`
--
ALTER TABLE `enregistre`
  ADD KEY `ID` (`ID_OUVRA`),
  ADD KEY `SIREN` (`SIREN_EN`);

--
-- Index pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`ID_SUGG`),
  ADD KEY `FK_SUGG_BIBLI` (`SIREN`),
  ADD KEY `NUMETU` (`NUMETU`) USING BTREE;

--
-- Index pour la table `usager`
--
ALTER TABLE `usager`
  ADD PRIMARY KEY (`NUMETU`),
  ADD KEY `CATEGORIE` (`CATEGORIE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `NUM_EMPRUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `ID_SUGG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_EMP_BIBLIO` FOREIGN KEY (`SIREN_EM`) REFERENCES `bibliotheque` (`SIREN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_EMP_OUV` FOREIGN KEY (`ID_OUVR`) REFERENCES `ouvrage` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_EMP_USA` FOREIGN KEY (`NUMETU_EM`) REFERENCES `usager` (`NUMETU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enregistre`
--
ALTER TABLE `enregistre`
  ADD CONSTRAINT `FK_ENREG_OUVR` FOREIGN KEY (`ID_OUVRA`) REFERENCES `ouvrage` (`ID`),
  ADD CONSTRAINT `FK_SIREN_BIBLI` FOREIGN KEY (`SIREN_EN`) REFERENCES `bibliotheque` (`SIREN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `FK_SUGG_BIBLI` FOREIGN KEY (`SIREN`) REFERENCES `bibliotheque` (`SIREN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SUGG_USAG` FOREIGN KEY (`NUMETU`) REFERENCES `usager` (`NUMETU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `usager`
--
ALTER TABLE `usager`
  ADD CONSTRAINT `FK_CAT_USAG` FOREIGN KEY (`CATEGORIE`) REFERENCES `categorie` (`INDICE`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Évènements
--
CREATE DEFINER=`root`@`localhost` EVENT `TRUNCATE_RETARD` ON SCHEDULE EVERY 1 DAY STARTS '2017-12-01 01:19:59' ON COMPLETION NOT PRESERVE ENABLE DO TRUNCATE `RETARD`$$

CREATE DEFINER=`root`@`localhost` EVENT `DAILY_RETARD` ON SCHEDULE EVERY 1 DAY STARTS '2017-12-01 01:20:00' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `RETARD` (`NUMETU_RET`)
SELECT u.NUMETU 
FROM usager u, emprunt e 
WHERE e.NUMETU_EM = u.NUMETU 
AND DATEDIFF ((SELECT ADDDATE(DATE_EMP, 
                              (SELECT c.NB_JOUR 
                               FROM categorie c 
                               WHERE u.CATEGORIE = c.INDICE))),
              (SELECT CURDATE())) < 0$$

DELIMITER ;

-----------------------------------------------------------

--PROCEDURES

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Afficher_DEADLINE`(IN `JOUR` INT)
    NO SQL
SELECT u.NUMETU FROM usager u, emprunt e WHERE e.NUMETU = u.NUMETU AND DATEDIFF ((SELECT ADDDATE(DATE_EMP, (SELECT c.NB_JOUR FROM categorie c WHERE u.CATEGORIE = c.INDICE))), (SELECT CURDATE())) < JOUR$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EMPRUNTER`(IN `numetu` INT, IN `idouvr` INT, IN `siren` INT)
BEGIN
IF numetu NOT IN (SELECT * FROM retard)
AND (SELECT SUM(ID_OUVR) FROM emprunt WHERE NUMETU_EM = numetu) < (SELECT NB_OUVRAGE FROM categorie c, usager u WHERE u.CATEGORIE = c.INDICE AND u.NUMETU = numetu)
THEN INSERT INTO `emprunt`(`DATE_EMP`, `DATE_MAX`, `ID_OUVR`, `SIREN_EM`, `NUMETU_EM`) VALUES (CURDATE(), ADDDATE(CURDATE(),(SELECT c.NB_JOUR FROM categorie c, usager u WHERE u.CATEGORIE = c.INDICE AND u.NUMETU = numetu)),idouvr,siren,numetu);
END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RECEP_SUGG`(IN `TYPE_S` VARCHAR(20), IN `DDP_S` DATE, IN `GENRE_S` VARCHAR(20), IN `ID_S` INT)
BEGIN
INSERT INTO ouvrage (TYPE, DDP, TITRE, AUTEUR, GENRE) VALUES (TYPE_S,DDP_S,(SELECT TITRE FROM suggestion WHERE ID_SUGG=ID_S),(SELECT AUTEUR_S FROM suggestion WHERE ID_SUGG=ID_S),GENRE_S);
INSERT INTO enregistre(DATE_R,ID_OUVRA,SIREN_EN,QUANTITE)VALUES(CURDATE(),(SELECT MAX(ID)FROM ouvrage ),(SELECT SIREN FROM suggestion WHERE ID_S=ID_SUGG),(SELECT QUANTITE_S FROM suggestion WHERE ID_S=ID_SUGG));
END$$
DELIMITER ;

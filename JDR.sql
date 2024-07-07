-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 07 juil. 2024 à 17:42
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `JDR`
--

-- --------------------------------------------------------

--
-- Structure de la table `Bonus`
--

CREATE TABLE `Bonus` (
  `BonusID` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Bonus`
--

INSERT INTO `Bonus` (`BonusID`, `Nom`, `Description`, `img`) VALUES
(1, 'Heal', 'soin +2', 'chemin pour l\'image'),
(2, 'Jugement sacré', 'dps +5', 'chemin pour l\'image'),
(3, 'tourbilol', 'dps zone +2', 'chemin pour l\'image');

-- --------------------------------------------------------

--
-- Structure de la table `Classe`
--

CREATE TABLE `Classe` (
  `ClasseID` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `UniversID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Classe`
--

INSERT INTO `Classe` (`ClasseID`, `Nom`, `Description`, `img`, `UniversID`) VALUES
(1, 'Paladin', 'le paladin de \"Baldur\'s Gate 3\" est un parangon de vertu, combinant puissance martiale et magie divine pour combattre le mal sous toutes ses formes et protéger les opprimés.', 'paladin.webp', 1),
(2, 'Guerrier', 'Le guerrier excelle en tant que tank ou en tant que combattant de première ligne. Sa capacité à encaisser les coups tout en infligeant des dommages en fait un élément essentiel de toute équipe.', 'guerrier.webp', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ClasseBonus`
--

CREATE TABLE `ClasseBonus` (
  `ClasseID` int(11) NOT NULL,
  `BonusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ClasseRace`
--

CREATE TABLE `ClasseRace` (
  `ClasseID` int(11) NOT NULL,
  `RaceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ClasseRace`
--

INSERT INTO `ClasseRace` (`ClasseID`, `RaceID`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `Etat`
--

CREATE TABLE `Etat` (
  `EtatID` int(11) NOT NULL,
  `Valeur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Etat`
--

INSERT INTO `Etat` (`EtatID`, `Valeur`) VALUES
(1, 'Actif'),
(2, 'corbeille'),
(3, 'Supprimer');

-- --------------------------------------------------------

--
-- Structure de la table `Grade`
--

CREATE TABLE `Grade` (
  `GradeID` int(11) NOT NULL,
  `Titre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Grade`
--

INSERT INTO `Grade` (`GradeID`, `Titre`) VALUES
(1, 'SuperAdministrateur'),
(2, 'Administrateur'),
(3, 'Visiteur');

-- --------------------------------------------------------

--
-- Structure de la table `Race`
--

CREATE TABLE `Race` (
  `RaceID` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Race`
--

INSERT INTO `Race` (`RaceID`, `Nom`, `Description`, `img`) VALUES
(1, 'Humain', 'Dans \"Baldur\'s Gate 3\", les humains sont polyvalents, adaptables et ambitieux. Leurs talents variés leur permettent d\'exceller dans de nombreux domaines. Leur diversité culturelle et leur résilience les distinguent dans le monde de Faerûn.', 'humain.webp'),
(2, 'Orc', 'Les orcs dans \"Baldur\'s Gate 3\" sont des créatures brutales et redoutables, connues pour leur force et leur sauvagerie. Ils vivent en tribus et vénèrent des dieux de la guerre, se battant sans relâche pour la domination.', 'orc.webp'),
(3, 'Elfe', 'Dans Baldur\'s Gate 3, les elfes sont des créatures élégantes et gracieuses, connues pour leur agilité, leur longévité et leur affinité avec la magie. Ils possèdent une beauté éthérée et une profonde connexion avec la nature.', 'elfe.webp'),
(4, 'Nain', 'Les nains dans Baldur\'s Gate 3 sont robustes et courageux, réputés pour leur endurance et leur expertise en combat. Ils sont souvent artisans talentueux et guerriers redoutables, vivant dans des communautés souterraines.', 'nain.webp');

-- --------------------------------------------------------

--
-- Structure de la table `RaceBonus`
--

CREATE TABLE `RaceBonus` (
  `RaceID` int(11) NOT NULL,
  `BonusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `SousClasse`
--

CREATE TABLE `SousClasse` (
  `SousClasseID` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `ClasseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `SousClasse`
--

INSERT INTO `SousClasse` (`SousClasseID`, `Nom`, `Description`, `img`, `ClasseID`) VALUES
(1, 'Paladin sacré', '\nLes Paladins sacrés de \"Baldur\'s Gate 3\" sont des guerriers saints, dévoués à la justice divine. Ils utilisent la magie sacrée pour soigner et protéger, tout en infligeant de puissants dégâts aux ennemis grâce à leur foi inébranlable.', 'paladinSacre.webp', 1),
(2, 'Paladin Protection', 'Les paladins protection dans \"Baldur\'s Gate 3\" sont des guerriers sacrés dédiés à la défense. Ils utilisent des boucliers et des sorts de protection pour garder leurs alliés en sécurité, tout en infligeant des dégâts à leurs ennemis.', 'paladinProtection.webp', 1),
(3, 'Paladin vindicateur', 'Les paladins vindicateurs dans \"Baldur\'s Gate 3\" sont des guerriers sacrés dédiés à la justice divine. Ils allient puissance martiale et magie sacrée pour protéger les innocents, punir les malfaiteurs et défendre la cause du bien avec ferveur.', 'paladinVindicateur.webp', 1),
(4, 'Chevalier', 'Dans \"Baldur\'s Gate 3\", les guerriers chevaliers sont des combattants d\'élite, maîtres d\'armes et protecteurs dévoués. Ils allient force brute et stratégie, portant des armures lourdes et maniant des armes puissantes pour défendre leurs alliés et écraser leurs ennemis.', 'chevalier.webp', 2);

-- --------------------------------------------------------

--
-- Structure de la table `SousClasseBonus`
--

CREATE TABLE `SousClasseBonus` (
  `SousClasseID` int(11) NOT NULL,
  `BonusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Univers`
--

CREATE TABLE `Univers` (
  `UniversID` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Univers`
--

INSERT INTO `Univers` (`UniversID`, `Nom`, `Description`) VALUES
(1, 'BaldurGate3', 'description');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `UtilisateurID` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `MotDePasse` text DEFAULT NULL,
  `GradeID` int(11) NOT NULL,
  `EtatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`UtilisateurID`, `Nom`, `MotDePasse`, `GradeID`, `EtatID`) VALUES
(4, 'Alexander', '$2y$10$h889.JSYJwhDz/mOaWU8dOiIGlabyC0NFAagPX8dUFyZUXmBh6iA.', 1, 1),
(9, 'helder', '$2y$10$jyGwtkZgrv3M3mLpn7oim.2sS6XHeFMJ9EszIEnro5kOs0zTRRIQC', 3, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Bonus`
--
ALTER TABLE `Bonus`
  ADD PRIMARY KEY (`BonusID`);

--
-- Index pour la table `Classe`
--
ALTER TABLE `Classe`
  ADD PRIMARY KEY (`ClasseID`),
  ADD KEY `UniversID` (`UniversID`);

--
-- Index pour la table `ClasseBonus`
--
ALTER TABLE `ClasseBonus`
  ADD PRIMARY KEY (`ClasseID`,`BonusID`),
  ADD KEY `BonusID` (`BonusID`);

--
-- Index pour la table `ClasseRace`
--
ALTER TABLE `ClasseRace`
  ADD PRIMARY KEY (`ClasseID`,`RaceID`),
  ADD KEY `RaceID` (`RaceID`);

--
-- Index pour la table `Etat`
--
ALTER TABLE `Etat`
  ADD PRIMARY KEY (`EtatID`);

--
-- Index pour la table `Grade`
--
ALTER TABLE `Grade`
  ADD PRIMARY KEY (`GradeID`);

--
-- Index pour la table `Race`
--
ALTER TABLE `Race`
  ADD PRIMARY KEY (`RaceID`);

--
-- Index pour la table `RaceBonus`
--
ALTER TABLE `RaceBonus`
  ADD PRIMARY KEY (`RaceID`,`BonusID`),
  ADD KEY `BonusID` (`BonusID`);

--
-- Index pour la table `SousClasse`
--
ALTER TABLE `SousClasse`
  ADD PRIMARY KEY (`SousClasseID`),
  ADD KEY `ClasseID` (`ClasseID`);

--
-- Index pour la table `SousClasseBonus`
--
ALTER TABLE `SousClasseBonus`
  ADD PRIMARY KEY (`SousClasseID`,`BonusID`),
  ADD KEY `BonusID` (`BonusID`);

--
-- Index pour la table `Univers`
--
ALTER TABLE `Univers`
  ADD PRIMARY KEY (`UniversID`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`UtilisateurID`),
  ADD KEY `GradeID` (`GradeID`),
  ADD KEY `EtatID` (`EtatID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Bonus`
--
ALTER TABLE `Bonus`
  MODIFY `BonusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Classe`
--
ALTER TABLE `Classe`
  MODIFY `ClasseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Etat`
--
ALTER TABLE `Etat`
  MODIFY `EtatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Grade`
--
ALTER TABLE `Grade`
  MODIFY `GradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Race`
--
ALTER TABLE `Race`
  MODIFY `RaceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `SousClasse`
--
ALTER TABLE `SousClasse`
  MODIFY `SousClasseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Univers`
--
ALTER TABLE `Univers`
  MODIFY `UniversID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `UtilisateurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Classe`
--
ALTER TABLE `Classe`
  ADD CONSTRAINT `Classe_ibfk_1` FOREIGN KEY (`UniversID`) REFERENCES `Univers` (`UniversID`);

--
-- Contraintes pour la table `ClasseBonus`
--
ALTER TABLE `ClasseBonus`
  ADD CONSTRAINT `ClasseBonus_ibfk_1` FOREIGN KEY (`ClasseID`) REFERENCES `Classe` (`ClasseID`),
  ADD CONSTRAINT `ClasseBonus_ibfk_2` FOREIGN KEY (`BonusID`) REFERENCES `Bonus` (`BonusID`);

--
-- Contraintes pour la table `ClasseRace`
--
ALTER TABLE `ClasseRace`
  ADD CONSTRAINT `ClasseRace_ibfk_1` FOREIGN KEY (`ClasseID`) REFERENCES `Classe` (`ClasseID`),
  ADD CONSTRAINT `ClasseRace_ibfk_2` FOREIGN KEY (`RaceID`) REFERENCES `Race` (`RaceID`);

--
-- Contraintes pour la table `RaceBonus`
--
ALTER TABLE `RaceBonus`
  ADD CONSTRAINT `RaceBonus_ibfk_1` FOREIGN KEY (`RaceID`) REFERENCES `Race` (`RaceID`),
  ADD CONSTRAINT `RaceBonus_ibfk_2` FOREIGN KEY (`BonusID`) REFERENCES `Bonus` (`BonusID`);

--
-- Contraintes pour la table `SousClasse`
--
ALTER TABLE `SousClasse`
  ADD CONSTRAINT `SousClasse_ibfk_1` FOREIGN KEY (`ClasseID`) REFERENCES `Classe` (`ClasseID`);

--
-- Contraintes pour la table `SousClasseBonus`
--
ALTER TABLE `SousClasseBonus`
  ADD CONSTRAINT `SousClasseBonus_ibfk_1` FOREIGN KEY (`SousClasseID`) REFERENCES `SousClasse` (`SousClasseID`),
  ADD CONSTRAINT `SousClasseBonus_ibfk_2` FOREIGN KEY (`BonusID`) REFERENCES `Bonus` (`BonusID`);

--
-- Contraintes pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `Utilisateur_ibfk_1` FOREIGN KEY (`GradeID`) REFERENCES `Grade` (`GradeID`),
  ADD CONSTRAINT `Utilisateur_ibfk_2` FOREIGN KEY (`EtatID`) REFERENCES `Etat` (`EtatID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

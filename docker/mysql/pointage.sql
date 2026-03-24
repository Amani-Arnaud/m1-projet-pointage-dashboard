-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 08 déc. 2025 à 16:47
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pointage`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences`
--

CREATE TABLE `absences` (
  `id_absence` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL COMMENT 'Date de fin de l''absence.',
  `motif` varchar(45) DEFAULT NULL,
  `agents_id_agent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `id_agent` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Prenom` varchar(45) DEFAULT NULL,
  `Matricule` varchar(255) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` enum('M','F') DEFAULT NULL,
  `nationalite` varchar(100) DEFAULT NULL,
  `parcours` varchar(100) DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL COMMENT 'Grade de l''agent (ex : A4, B3, D1).',
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `categorie` varchar(1) DEFAULT NULL COMMENT 'Catégorie de l''agent (A, B, C, etc.).',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email de l''agent.',
  `date_entree` datetime DEFAULT NULL COMMENT 'Date d''entrée dans l''entreprise.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id_agent`, `Nom`, `Prenom`, `Matricule`, `date_naissance`, `sexe`, `nationalite`, `parcours`, `grade`, `mot_de_passe`, `categorie`, `email`, `date_entree`) VALUES
(1, 'Bertrand', 'guy roland', '0012A', NULL, NULL, 'Malienne', 'Admin sys', NULL, '$2y$10$RYKBYkBCXX862ZMqNZ43b.fOYUo7uJ5tL6oIVtE/hFApKPhP92E7K', NULL, NULL, NULL),
(3, 'Leo', 'bob', '2309', NULL, NULL, 'echo', 'Testeur', NULL, '$2y$10$FyD2LOD5NtQArUGBK8Ora.PnunRLwZaOR/hNBfU75pVDOkzgAL30e', NULL, NULL, NULL),
(4, 'Hello', 'Jean', '090', NULL, NULL, 'Ivoirienne', 'Info', NULL, '$2y$10$JTioksxUdBc4B8bnUWuyqeZOpLpvoCYskVcob3h0kGmKIhqf0yl9u', NULL, NULL, NULL),
(9, 'Ange', 'Pierre', '67483AD', NULL, NULL, NULL, 'Close', NULL, NULL, NULL, NULL, NULL),
(10, 'gregoire', 'Armel', '090', NULL, NULL, NULL, 'Informaticien', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

CREATE TABLE `parametres` (
  `id_parametre` int(11) NOT NULL,
  `nom_entreprise` varchar(255) DEFAULT NULL,
  `heure_arrivee` time DEFAULT NULL,
  `heure_depart` time DEFAULT NULL,
  `marge_arrivee` int(11) NOT NULL,
  `latitude_entreprise` decimal(10,0) DEFAULT NULL,
  `longitude_entreprise` decimal(10,0) DEFAULT NULL,
  `rayon` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `parametres`
--

INSERT INTO `parametres` (`id_parametre`, `nom_entreprise`, `heure_arrivee`, `heure_depart`, `marge_arrivee`, `latitude_entreprise`, `longitude_entreprise`, `rayon`, `updated_at`) VALUES
(1, 'Entreprise SARL', '08:00:00', '18:00:00', 30, 10, 12, 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pointages`
--

CREATE TABLE `pointages` (
  `id_pointage` int(11) NOT NULL,
  `date_pointage` datetime DEFAULT NULL,
  `type_pointage` enum('arrivée','départ','absence') DEFAULT NULL COMMENT 'Type de pointage (arrivée, départ, absence)',
  `status` enum('présent','absent') DEFAULT NULL COMMENT 'Statut de présence de l''agent.',
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `agents_id_agent` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `pointages`
--

INSERT INTO `pointages` (`id_pointage`, `date_pointage`, `type_pointage`, `status`, `latitude`, `longitude`, `agents_id_agent`, `created_date`) VALUES
(1, '2025-06-13 21:49:34', 'arrivée', 'présent', 'Ivoirienne', 'Non', 1, '2025-06-13'),
(2, '2025-06-13 21:49:34', 'arrivée', 'présent', 'Ivoirienne', 'Non', 9, '2025-06-13'),
(3, '2025-06-13 21:49:34', 'arrivée', 'présent', '12', '12', 1, '2025-06-27'),
(4, '2025-06-13 07:49:34', 'arrivée', 'présent', '12', '12', 1, '2025-06-27'),
(5, '2025-06-13 07:49:34', 'arrivée', 'présent', '12', '12', 1, '2025-06-27'),
(6, '2009-07-03 00:00:00', 'arrivée', 'présent', '12', '12', 3, '2025-06-27'),
(7, '2025-06-24 09:09:03', 'arrivée', 'présent', '12', '12', 3, '2025-06-27'),
(8, '2025-06-24 21:09:03', 'arrivée', 'présent', '12', '12', 3, '2025-06-27');

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

CREATE TABLE `statistiques` (
  `id_statistique` int(11) NOT NULL,
  `periode` date DEFAULT NULL,
  `total_jours` int(11) DEFAULT NULL,
  `jours_present` int(11) DEFAULT NULL,
  `jours_absent` int(11) DEFAULT NULL,
  `agents_id_agent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mot_de_passe` varchar(100) DEFAULT NULL,
  `type_user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id_absence`,`agents_id_agent`),
  ADD KEY `fk_absences_agents_idx` (`agents_id_agent`);

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id_agent`);

--
-- Index pour la table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`id_parametre`);

--
-- Index pour la table `pointages`
--
ALTER TABLE `pointages`
  ADD PRIMARY KEY (`id_pointage`,`agents_id_agent`),
  ADD KEY `fk_pointages_agents1_idx` (`agents_id_agent`);

--
-- Index pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD PRIMARY KEY (`id_statistique`,`agents_id_agent`),
  ADD KEY `fk_statistiques_agents1_idx` (`agents_id_agent`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absences`
--
ALTER TABLE `absences`
  MODIFY `id_absence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `agents`
--
ALTER TABLE `agents`
  MODIFY `id_agent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `parametres`
--
ALTER TABLE `parametres`
  MODIFY `id_parametre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `pointages`
--
ALTER TABLE `pointages`
  MODIFY `id_pointage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `statistiques`
--
ALTER TABLE `statistiques`
  MODIFY `id_statistique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `fk_absences_agents` FOREIGN KEY (`agents_id_agent`) REFERENCES `agents` (`id_agent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pointages`
--
ALTER TABLE `pointages`
  ADD CONSTRAINT `fk_pointages_agents1` FOREIGN KEY (`agents_id_agent`) REFERENCES `agents` (`id_agent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD CONSTRAINT `fk_statistiques_agents1` FOREIGN KEY (`agents_id_agent`) REFERENCES `agents` (`id_agent`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

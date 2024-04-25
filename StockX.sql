-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 25 avr. 2024 à 09:40
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
-- Base de données : `StockX`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `date_commande` datetime DEFAULT current_timestamp(),
  `statut` enum('en_attente','validee','invalidée') DEFAULT 'en_attente',
  `entree_sortie` enum('entree','sortie') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `id_utilisateur`, `date_commande`, `statut`, `entree_sortie`) VALUES
(1, 5, '2024-02-12 14:30:00', 'validee', 'entree'),
(21, 5, '2024-03-03 17:45:32', 'invalidée', 'entree'),
(22, 5, '2024-03-03 17:48:12', 'en_attente', 'entree'),
(23, 5, '2024-03-03 17:48:42', 'en_attente', 'entree'),
(24, 5, '2024-03-03 17:49:11', 'en_attente', 'entree'),
(25, 5, '2024-03-03 17:55:53', 'en_attente', 'entree'),
(26, 5, '2024-03-03 17:57:49', 'en_attente', 'entree'),
(27, 5, '2024-03-03 17:58:00', 'en_attente', 'entree'),
(28, 5, '2024-03-03 17:58:32', 'en_attente', 'entree'),
(29, 5, '2024-03-03 17:58:51', 'en_attente', 'entree'),
(30, 5, '2024-03-03 17:58:53', 'validee', 'entree'),
(31, 5, '2024-03-03 18:04:34', 'en_attente', 'entree'),
(32, 5, '2024-03-03 18:05:03', 'en_attente', 'entree'),
(33, 5, '2024-03-03 18:06:16', 'en_attente', 'entree'),
(34, 5, '2024-03-03 18:39:50', 'en_attente', 'entree'),
(35, 5, '2024-03-18 09:59:53', 'en_attente', 'entree'),
(36, 5, '2024-03-18 10:00:15', 'invalidée', 'entree'),
(37, 5, '2024-03-18 10:05:02', 'validee', 'entree'),
(38, 5, '2024-03-18 14:50:05', 'validee', 'entree'),
(39, 5, '2024-03-18 15:53:24', 'validee', 'entree'),
(40, 5, '2024-03-18 16:31:29', 'en_attente', 'entree'),
(41, 5, '2024-03-19 09:17:19', 'invalidée', 'entree'),
(42, 5, '2024-03-19 09:17:52', 'en_attente', 'entree'),
(44, 5, '2024-03-19 09:18:17', 'validee', 'entree'),
(45, 5, '2024-03-19 09:18:44', 'validee', 'entree'),
(46, 5, '2024-03-19 09:18:52', 'validee', 'entree'),
(47, 5, '2024-03-19 09:19:03', 'validee', 'entree'),
(48, 5, '2024-03-19 16:57:49', 'invalidée', 'entree'),
(49, 5, '2024-03-20 20:08:55', 'validee', 'entree'),
(50, 5, '2024-03-21 13:55:06', 'en_attente', 'entree'),
(51, 5, '2024-03-21 14:14:47', 'en_attente', 'entree'),
(71, 5, '2024-03-21 16:07:05', 'validee', 'entree'),
(84, 5, '2024-03-21 16:25:07', 'en_attente', 'entree'),
(87, 5, '2024-03-21 16:30:24', 'en_attente', 'entree'),
(104, 5, '2024-03-21 16:57:46', 'validee', 'sortie'),
(105, 5, '2024-03-21 17:01:40', 'validee', 'sortie'),
(106, 5, '2024-03-21 17:02:27', 'validee', 'sortie'),
(107, 5, '2024-03-21 17:03:24', 'validee', 'sortie'),
(108, 5, '2024-03-21 17:05:24', 'validee', 'sortie'),
(109, 5, '2024-03-21 17:05:57', 'validee', 'sortie'),
(110, 5, '2024-03-21 17:07:00', 'validee', 'sortie'),
(111, 5, '2024-03-21 17:07:32', 'validee', 'sortie'),
(112, 5, '2024-03-21 17:09:14', 'validee', 'sortie'),
(113, 5, '2024-03-21 17:16:59', 'validee', 'sortie'),
(114, 5, '2024-03-21 17:17:34', 'validee', 'entree'),
(115, 5, '2024-03-21 17:18:27', 'validee', 'entree'),
(116, 5, '2024-03-21 17:21:21', 'validee', 'sortie'),
(117, 5, '2024-03-21 17:21:41', 'validee', 'sortie'),
(118, 5, '2024-03-21 17:22:11', 'validee', 'sortie'),
(119, 5, '2024-03-21 17:22:32', 'validee', 'sortie'),
(120, 5, '2024-03-21 17:22:45', 'validee', 'sortie'),
(121, 5, '2024-03-21 17:24:35', 'validee', 'sortie'),
(122, 5, '2024-03-21 17:24:56', 'validee', 'sortie'),
(123, 5, '2024-03-21 17:26:56', 'validee', 'sortie'),
(124, 5, '2024-03-22 09:16:10', 'validee', 'sortie'),
(125, 5, '2024-03-22 12:06:14', 'validee', 'entree'),
(126, 5, '2024-03-22 12:18:05', 'validee', 'sortie');

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_commande` int(11) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `details_commande`
--

INSERT INTO `details_commande` (`id_commande`, `id_stock`, `quantite`) VALUES
(1, 1, 12),
(21, 9, 30),
(22, 9, 30),
(23, 9, 30),
(24, 9, 30),
(25, 9, 30),
(26, 9, 30),
(27, 9, 32),
(28, 9, 4343),
(29, 9, 4343),
(30, 9, 41234),
(31, 9, 30),
(32, 9, 30),
(33, 9, 30),
(34, 2, 30),
(35, 11, 30),
(36, 1, 30),
(37, 7, 30),
(38, 7, 300),
(39, 8, 55),
(40, 9, 30),
(41, 9, 30),
(42, 9, 30),
(44, 9, 30),
(45, 9, 30),
(46, 9, 30),
(47, 9, 30),
(48, 2, 30),
(49, 5, 3000),
(50, 2, 30),
(51, 104, 100),
(104, 9, 100),
(105, 9, 100),
(106, 9, 0),
(107, 9, 100),
(108, 9, 100),
(109, 9, 0),
(110, 9, 120),
(111, 9, 100),
(112, 9, 100),
(113, 9, 100),
(114, 9, 100),
(115, 9, 100),
(116, 9, 100),
(117, 9, 100),
(118, 9, 100),
(119, 9, 100),
(120, 9, 400),
(121, 9, 10),
(122, 9, 10),
(123, 9, 1000),
(124, 5, 1000),
(125, 9, 30),
(126, 9, 100);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `reclamation` varchar(255) NOT NULL,
  `traitement` enum('traitee','a_traitee') NOT NULL DEFAULT 'a_traitee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `id_commande`, `reclamation`, `traitement`) VALUES
(6, 1, 'test', 'a_traitee'),
(7, 1, 'test', 'a_traitee'),
(8, 104, 'Un medicament', 'a_traitee'),
(9, 109, 'j,gj,gj,bj', 'a_traitee'),
(10, 113, 'AZERAERAEZ', 'a_traitee');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `nom_role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `nom_role`) VALUES
(1, 'Admin'),
(2, 'utilisateurs');

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

CREATE TABLE `stocks` (
  `id_stock` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantite_disponible` int(11) DEFAULT NULL,
  `type` enum('medicament','materiel') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`id_stock`, `nom`, `description`, `quantite_disponible`, `type`) VALUES
(1, 'Paracétamol', 'Médicament pour soulager la douleur et la fièvre', 100, 'medicament'),
(2, 'Gants', 'Matériel de protection pour les mains', 99, 'materiel'),
(3, 'Ibuprofène', 'Médicament anti-inflammatoire et analgésique', 50, 'medicament'),
(5, 'Masques', 'Équipement de protection pour le visage', 2050, 'materiel'),
(7, 'Gel hydroalcoolique', 'Solution désinfectante pour les mains', 330, 'materiel'),
(8, 'Oxygène médical', 'Gaz utilisé pour l\'assistance respiratoire', 58, 'materiel'),
(9, 'Antibiotique', 'Médicament pour traiter les infections bactériennes', 260, 'medicament'),
(10, 'Thermomètre', 'Appareil de mesure de la température corporelle', 50, 'materiel'),
(11, 'Sirop', 'Médicament pour soulager la toux', 80, 'medicament'),
(104, 'Doliprane', '', 115, 'medicament');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`, `id_role`) VALUES
(5, 'Crouse', 'Tom', 't@t.t', '$2y$10$WZjSrXG77Ad98LzghCgRZemubfWhoLzfszfvOoeNfo/1Ihzce3TLe', 1),
(6, 't', 't', 't@t.f', '$2y$10$fSx0CWYh2ffYeS9enVNTAuUmEQnMppsxQQpSbH4FtEfUIUeObrcey', 1),
(7, 'a', 'a', 'a@a.a', '$2y$10$SydEPn353lKYhk/B7lw.AOER7A5YQz6QaTnPTuVNN.RMeNdDrgz.S', 2),
(8, 'a', 'm', 't@ta.t', '$2y$10$dicrETZ.WmXqNxydl75yieJVOsNddKcf3X2kToVkPerx2K9XKNW3W', 2),
(9, 'Macaire', 'Angelo', 'a@a', '$2y$10$LjyX9Tr2XcW40x75j3OmvuHCsTBIepWPDwcWEnObteOfdgQ6EkD7y', 2),
(10, 'Mounir', 'Test', 'p@p', '$2y$10$pUeW3VUziMPSeg7J6cwfJeKB35V1RwfZ34HJpxqkFedy0EjYoUcRC', 2),
(11, 'Alazari', 'Lucas', 'l@l', '$2y$10$vo80/cbgnW/8H18JRmj1YuLn/91c86wDbCQxn0wmozcZzE2AuFY1S', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_commande`,`id_stock`),
  ADD KEY `id_stock` (`id_stock`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`,`id_commande`) USING BTREE;

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id_stock`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_2` FOREIGN KEY (`id_stock`) REFERENCES `stocks` (`id_stock`),
  ADD CONSTRAINT `details_commande_ibfk_3` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id_commande`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

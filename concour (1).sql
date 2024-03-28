

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `concour`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `RefPdt` varchar(255) NOT NULL,
  `libPdt` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Qte` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`RefPdt`, `libPdt`, `Prix`, `Qte`, `description`, `image`, `type`) VALUES
('I001', 'LAPTOP', 1500, 10, 'Laptop asus zenbook duo', 'asus.png', 'Electronique'),
('L001', 'LAVE-VAISSELLE', 500, 4, 'Lave vaisselle Samsung', 'lave.png', 'Electricite'),
('P001', 'SMART TV', 450, 5, 'Smart tv marque SAMSUNG', 'samsung.png', 'Electronique'),
('S0003', 'SMART PHONE', 700, 20, 'Huawei P30', 'huawei.png', 'Electronique');

-- --------------------------------------------------------

--
-- Structure de la table `type_produit`
--

CREATE TABLE `type_produit` (
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_produit`
--

INSERT INTO `type_produit` (`type`) VALUES
('Electricite'),
('Electronique'),
('Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `password`, `type`) VALUES
('admin', 'admin', 'administrateur'),
('fadil', '1111', 'user'),
('talal', '0000', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`RefPdt`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `type_produit`
--
ALTER TABLE `type_produit`
  ADD PRIMARY KEY (`type`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD UNIQUE KEY `login` (`login`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type_produit` (`type`);
COMMIT;

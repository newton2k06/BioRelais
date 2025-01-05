-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 déc. 2024 à 22:41
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biorelais`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE `adherents` (
  `idAdherent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherents`
--

INSERT INTO `adherents` (`idAdherent`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `nomCategorie`) VALUES
(1, 'Légumes Bio'),
(2, 'Fruits Bio'),
(3, 'Produits Laitiers'),
(4, 'Vins Bio'),
(5, 'Miel et Herbes Aromatiques');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `idCommande` int(11) NOT NULL,
  `dateCommande` date DEFAULT NULL,
  `idAdherent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lignescommande`
--

CREATE TABLE `lignescommande` (
  `idCommande` int(11) NOT NULL,
  `idVente` int(11) NOT NULL,
  `quantite` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `producteurs`
--

CREATE TABLE `producteurs` (
  `idProducteur` int(11) NOT NULL,
  `adresseProducteur` varchar(50) DEFAULT NULL,
  `communeProducteur` varchar(40) DEFAULT NULL,
  `codePostalProducteur` varchar(5) DEFAULT NULL,
  `descriptifProducteur` longtext DEFAULT NULL,
  `photoProducteur` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `producteurs`
--

INSERT INTO `producteurs` (`idProducteur`, `adresseProducteur`, `communeProducteur`, `codePostalProducteur`, `descriptifProducteur`, `photoProducteur`) VALUES
(1, '5 Rue de la Campagne', 'Le Mans', '72000', 'Producteur de légumes biologiques', 'producteur1.jpg'),
(2, '3 Boulevard des Champs', 'Paris', '75008', 'Producteur de fruits frais et bio', 'producteur2.jpg'),
(3, '10 Route de la Nature', 'Lyon', '69002', 'Producteur de lait et produits laitiers', 'producteur3.jpg'),
(4, '15 Avenue des Vins', 'Bordeaux', '33000', 'Producteur de vin bio et raisins', 'producteur4.jpg'),
(5, '12 Place du Marché', 'Marseille', '13001', 'Producteur d\'herbes aromatiques et miel', 'producteur5.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(50) DEFAULT NULL,
  `descriptifProduit` longtext DEFAULT NULL,
  `photoProduit` varchar(40) DEFAULT NULL,
  `idProducteur` int(11) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `nomProduit`, `descriptifProduit`, `photoProduit`, `idProducteur`, `idCategorie`) VALUES
(1, 'Tomates Cerises', 'Tomates cerises bio cultivées localement', 'tomates_cerises.jpg', 1, 1),
(2, 'Carottes Bio', 'Carottes cultivées sans engrais chimiques', 'carottes_bio.jpg', 1, 1),
(3, 'Pommes de Terre', 'Pommes de terre bio et fermes', 'pommes_terre.jpg', 1, 1),
(4, 'Salades Vertes', 'Salades fraîches cultivées en plein champ', 'salades_vertes.jpg', 1, 1),
(5, 'Pommes', 'Pommes bio, sucrées et juteuses', 'pommes.jpg', 2, 2),
(6, 'Poires', 'Poires bio récoltées à la main', 'poires.jpg', 2, 2),
(7, 'Abricots', 'Abricots frais et bio, parfaits pour la compote', 'abricots.jpg', 2, 2),
(8, 'Prunes', 'Prunes sucrées, cultivées sans pesticides', 'prunes.jpg', 2, 2),
(9, 'Lait de Vache', 'Lait bio de vaches nourries à l\'herbe', 'lait_vache.jpg', 3, 3),
(10, 'Yaourt Nature', 'Yaourt nature bio, fabriqué localement', 'yaourt_nature.jpg', 3, 3),
(11, 'Fromage de Chèvre', 'Fromage de chèvre fermier, crémeux et délicieux', 'fromage_chevre.jpg', 3, 3),
(12, 'Beurre Fermier', 'Beurre bio fait à partir de lait de vache', 'beurre_fermier.jpg', 3, 3),
(13, 'Vin Rouge Bio', 'Vin rouge bio produit à partir de raisins de qualité', 'vin_rouge.jpg', 4, 4),
(14, 'Vin Blanc Bio', 'Vin blanc sec bio, idéal pour l\'apéritif', 'vin_blanc.jpg', 4, 4),
(15, 'Rosé Bio', 'Vin rosé bio, fruité et frais', 'vin_rose.jpg', 4, 4),
(16, 'Jus de Raisins', 'Jus de raisins 100% naturel, sans conservateurs', 'jus_raisin.jpg', 4, 4),
(17, 'Miel de Lavande', 'Miel bio provenant des champs de lavande', 'miel_lavande.jpg', 5, 5),
(18, 'Miel de Fleurs', 'Miel bio de fleurs sauvages', 'miel_fleurs.jpg', 5, 5),
(19, 'Herbes Aromatiques', 'Herbes aromatiques fraîches cultivées localement', 'herbes_aromatiques.jpg', 5, 5),
(20, 'Miel de Thym', 'Miel bio de thym, idéal pour vos infusions', 'miel_thym.jpg', 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

CREATE TABLE `proposer` (
  `idVente` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `unite` varchar(10) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `proposer`
--

INSERT INTO `proposer` (`idVente`, `idProduit`, `unite`, `quantite`, `prix`) VALUES
(1, 1, 'kg', 50, 3),
(1, 2, 'kg', 40, 3),
(2, 3, 'kg', 30, 3),
(2, 4, 'kg', 35, 3),
(3, 5, 'pièce', 100, 5),
(3, 6, 'pièce', 60, 6),
(4, 7, 'pot', 20, 8),
(4, 8, 'pot', 25, 8),
(5, 9, 'bouteille', 40, 12),
(5, 10, 'bouteille', 50, 15),
(6, 1, 'kg', 100, 3),
(6, 2, 'kg', 60, 3),
(7, 3, 'kg', 80, 3),
(7, 4, 'kg', 40, 4),
(8, 5, 'pièce', 150, 5),
(8, 6, 'pièce', 120, 6),
(9, 7, 'pot', 40, 10),
(9, 8, 'pot', 50, 10),
(10, 9, 'bouteille', 30, 14);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `mdp` varchar(128) DEFAULT NULL,
  `statut` varchar(15) DEFAULT NULL,
  `nomUtilisateur` varchar(40) DEFAULT NULL,
  `prenomUtilisateur` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `mail`, `mdp`, `statut`, `nomUtilisateur`, `prenomUtilisateur`) VALUES
(1, 'mail', '81dc9bdb52d04dc20036dbd8313ed055', 'adherent', 'mail', 'mail'),
(2, 'alice.johnson@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'adherent', 'Alice', 'Johnson'),
(3, 'bob.smith@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'producteur', 'Bob', 'Smith'),
(4, 'carla.miller@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'adherent', 'Carla', 'Miller'),
(5, 'david.lee@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'producteur', 'David', 'Lee'),
(6, 'emma.jones@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'adherent', 'Emma', 'Jones'),
(7, 'frank.wilson@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'producteur', 'Frank', 'Wilson'),
(8, 'grace.white@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'adherent', 'Grace', 'White'),
(9, 'harry.green@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'producteur', 'Harry', 'Green'),
(10, 'isla.kenny@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'adherent', 'Isla', 'Kenny'),
(11, 'jack.brown@example.com', '81dc9bdb52d04dc20036dbd8313ed055', 'producteur', 'Jack', 'Brown');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE `ventes` (
  `idVente` int(11) NOT NULL,
  `dateVente` date DEFAULT NULL,
  `dateDebutProd` date DEFAULT NULL,
  `dateFinProd` date DEFAULT NULL,
  `dateDebutCli` date DEFAULT NULL,
  `dateFinCli` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`idVente`, `dateVente`, `dateDebutProd`, `dateFinProd`, `dateDebutCli`, `dateFinCli`) VALUES
(1, '2024-12-01', '2024-12-01', '2024-12-15', '2024-12-01', '2024-12-10'),
(2, '2024-12-02', '2024-12-05', '2024-12-12', '2024-12-02', '2024-12-09'),
(3, '2024-12-03', '2024-12-01', '2024-12-10', '2024-12-03', '2024-12-07'),
(4, '2024-12-04', '2024-12-06', '2024-12-15', '2024-12-04', '2024-12-12'),
(5, '2024-12-05', '2024-12-07', '2024-12-14', '2024-12-05', '2024-12-10'),
(6, '2024-12-06', '2024-12-08', '2024-12-16', '2024-12-06', '2024-12-13'),
(7, '2024-12-07', '2024-12-09', '2024-12-17', '2024-12-07', '2024-12-14'),
(8, '2024-12-08', '2024-12-10', '2024-12-18', '2024-12-08', '2024-12-15'),
(9, '2024-12-09', '2024-12-11', '2024-12-19', '2024-12-09', '2024-12-16'),
(10, '2024-12-10', '2024-12-12', '2024-12-20', '2024-12-10', '2024-12-17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD PRIMARY KEY (`idAdherent`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `idAdherent` (`idAdherent`);

--
-- Index pour la table `lignescommande`
--
ALTER TABLE `lignescommande`
  ADD PRIMARY KEY (`idCommande`,`idVente`),
  ADD KEY `idVente` (`idVente`);

--
-- Index pour la table `producteurs`
--
ALTER TABLE `producteurs`
  ADD PRIMARY KEY (`idProducteur`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `idProducteur` (`idProducteur`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD PRIMARY KEY (`idVente`,`idProduit`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- Index pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`idVente`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherents`
--
ALTER TABLE `adherents`
  MODIFY `idAdherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `producteurs`
--
ALTER TABLE `producteurs`
  MODIFY `idProducteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `idVente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD CONSTRAINT `adherents_ibfk_1` FOREIGN KEY (`idAdherent`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`idAdherent`) REFERENCES `adherents` (`idAdherent`);

--
-- Contraintes pour la table `lignescommande`
--
ALTER TABLE `lignescommande`
  ADD CONSTRAINT `lignescommande_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commandes` (`idCommande`),
  ADD CONSTRAINT `lignescommande_ibfk_2` FOREIGN KEY (`idVente`) REFERENCES `ventes` (`idVente`);

--
-- Contraintes pour la table `producteurs`
--
ALTER TABLE `producteurs`
  ADD CONSTRAINT `producteurs_ibfk_1` FOREIGN KEY (`idProducteur`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`idProducteur`) REFERENCES `producteurs` (`idProducteur`),
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`);

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `proposer_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`),
  ADD CONSTRAINT `proposer_ibfk_2` FOREIGN KEY (`idVente`) REFERENCES `ventes` (`idVente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

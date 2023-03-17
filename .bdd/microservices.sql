-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 17 mars 2023 à 07:45
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `microservices`
--

-- --------------------------------------------------------

--
-- Structure de la table `microservices`
--

CREATE TABLE `microservices` (
  `microservice_id` int NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Contenu` text NOT NULL,
  `Prix` decimal(10,2) DEFAULT NULL,
  `Image` varchar(255) NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `microservices`
--

INSERT INTO `microservices` (`microservice_id`, `Titre`, `Contenu`, `Prix`, `Image`, `user_id`) VALUES
(1, 'Création de site vitrine', 'Développer un site web simple et élégant pour présenter une entreprise, un produit ou un service, avec des pages de présentation, une galerie d&#039;images et des coordonnées.', 5.00, 'placeholder-photo.jpg', 1),
(2, 'Intégration d\'un blog', 'Ajouter un blog à un site web existant, en utilisant une plateforme de gestion de contenu (CMS) comme WordPress ou Ghost, et en personnalisant le design pour qu\'il corresponde à l\'identité visuelle du site.', 7.99, 'placeholder-photo.jpg', 2),
(3, 'Mise en place d\'une boutique en ligne', 'Intégrer une solution e-commerce comme WooCommerce, Shopify ou PrestaShop à un site web existant, pour permettre la vente de produits ou services en ligne.', 5.50, 'placeholder-photo.jpg', 3),
(4, 'Optimisation du référencement naturel (SEO)', 'Améliorer le classement d\'un site web dans les moteurs de recherche en optimisant la structure du site, les balises méta, le contenu et en créant des liens de qualité.', 2.99, 'placeholder-photo.jpg', 4),
(5, 'Création d\'un formulaire de contact', 'Concevoir et intégrer un formulaire de contact personnalisé sur un site web, avec validation des données saisies et envoi des informations par e-mail au propriétaire du site.', 5.00, 'placeholder-photo.jpg', 5),
(43, 'Adaptation de thèmes et plugins', 'Personnaliser un thème ou un plugin existant pour répondre aux besoins spécifiques d&#039;un client, en modifiant le code source ou en ajoutant des fonctionnalités supplémentaires.', 5.00, 'placeholder-photo.jpg', 6),
(48, 'Maintenance et mises à jour', 'Assurer la maintenance d&#039;un site web, y compris les mises à jour du système, des plugins et du contenu, la résolution des problèmes de compatibilité et la mise en place de mesures de sécurité.', 8.00, 'placeholder-photo.jpg', 7);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `user_id` int NOT NULL,
  `Nom` varchar(128) NOT NULL,
  `Prénom` varchar(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Rôle` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`user_id`, `Nom`, `Prénom`, `Email`, `Password`, `Rôle`) VALUES
(1, 'Muche', 'Mich', 'michmuche@example.com', 'PHPFormation2023/*', 1),
(2, 'Stracke', 'Francesco', '', NULL, NULL),
(3, 'MacGyver', 'Melyna', '', NULL, NULL),
(4, 'Mayert', 'Ivory', '', NULL, NULL),
(5, 'Swaniawski', 'Tremaine', '', NULL, NULL),
(6, 'Kris', 'Merritt', '', NULL, NULL),
(7, 'Corwin', 'Madeline', '', NULL, NULL),
(8, 'Isaac', 'DuBuque', '', NULL, NULL),
(9, 'Kihn', 'Laurianne', '', NULL, NULL),
(10, 'Kihn', 'Mawson', '', NULL, NULL),
(11, 'Sponge', 'Bob', '', NULL, NULL),
(12, 'Star', 'Patrick', '', NULL, NULL),
(13, 'Tentacles', 'Squidward', '', NULL, NULL),
(14, 'Cheeks', 'Sandy', '', NULL, NULL),
(15, 'Krabs', 'Eugene', '', NULL, NULL),
(16, '', '', '', NULL, NULL),
(17, 'Doe', '', '', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `microservices`
--
ALTER TABLE `microservices`
  ADD PRIMARY KEY (`microservice_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `microservices`
--
ALTER TABLE `microservices`
  MODIFY `microservice_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

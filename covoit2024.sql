-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 12 sep. 2024 à 08:29
-- Version du serveur : 10.3.39-MariaDB-0+deb10u1
-- Version de PHP : 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `covoit2024`
--

-- --------------------------------------------------------

--
-- Structure de la table `CovoitUser`
--

CREATE TABLE `CovoitUser` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  `mdp_hashnull` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `CovoitUser`
--

INSERT INTO `CovoitUser` (`id`, `nom`, `prenom`, `tel`, `mail`, `mdp`, `mdp_hashnull`) VALUES
(1, 'Durand', 'Luc', '0600000001', 'luc.durand@example.com', '$2y$10$Hc.RT2c3EZfGmFqaI.2zBO6MZFRaZ4JmR/7Wy0w5vP4/7xoqOjKIC', 'securepassword1'),
(2, 'Lefebvre', 'Alice', '0600000002', 'alice.lefebvre@example.com', '$2y$10$5fbp8EJS8e0rntWZBSGuUOnp3Aqic5a8Zg8kn8gCdsdtz0LlCEc1W', 'securepassword2'),
(3, 'Rousseau', 'Marc', '0600000003', 'marc.rousseau@example.com', '$2y$10$Q3b3sI6nx6Tz1CBRU7RVN.yKIsf1qUFG4/JHKe6/f7dzAGddW96Ae', 'securepassword3'),
(4, 'Moreau', 'Claire', '0600000004', 'claire.moreau@example.com', '$2y$10$9NkIc5A.wBZcUkeTg.T6mOlsVd0J7zUBr/2lJ2ZG8LPZ/6XrYNG4i', 'securepassword4'),
(5, 'Fournier', 'Paul', '0600000005', 'paul.fournier@example.com', '$2y$10$h9vRUQ7jJX1DJPSmcMZ82Oq2Wzxn.Z97.J9s/QsVXMBVi1v.TJ6Qu', 'securepassword5'),
(6, 'Leroy', 'Sophie', '0600000006', 'sophie.leroy@example.com', '$2y$10$EHJ9e2H2Pj8J9Q29PjLgF.JMS96OTZnHlApO5N9v4FZQsKxjV5i3W', 'securepassword6'),
(7, 'Bernard', 'Thomas', '0600000007', 'thomas.bernard@example.com', '$2y$10$J4zKdv0jv96RO0LNC9M0bOIk9B5g9iKD5J0xewMaE73d8jJj8Lk8W', 'securepassword7');

-- --------------------------------------------------------

--
-- Structure de la table `OffreCovoit`
--

CREATE TABLE `OffreCovoit` (
  `id` int(11) NOT NULL,
  `jour` enum('lundi','mardi','mercredi','jeudi','vendredi') NOT NULL,
  `heure` time NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(40) NOT NULL,
  `chauffeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `OffreCovoit`
--

INSERT INTO `OffreCovoit` (`id`, `jour`, `heure`, `date`, `lieu`, `chauffeur`) VALUES
(1, 'lundi', '08:30:00', '2024-09-09', 'Paris', 1),
(2, 'mardi', '09:00:00', '2024-09-10', 'Lyon', 2),
(3, 'mercredi', '07:45:00', '2024-09-11', 'Marseille', 3),
(4, 'jeudi', '10:15:00', '2024-09-12', 'Lille', 4),
(5, 'vendredi', '06:30:00', '2024-09-13', 'Bordeaux', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `CovoitUser`
--
ALTER TABLE `CovoitUser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tel` (`tel`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Index pour la table `OffreCovoit`
--
ALTER TABLE `OffreCovoit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chauffeur` (`chauffeur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `CovoitUser`
--
ALTER TABLE `CovoitUser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `OffreCovoit`
--
ALTER TABLE `OffreCovoit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `OffreCovoit`
--
ALTER TABLE `OffreCovoit`
  ADD CONSTRAINT `OffreCovoit_ibfk_1` FOREIGN KEY (`chauffeur`) REFERENCES `CovoitUser` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

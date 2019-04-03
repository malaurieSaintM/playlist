-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 15 jan. 2019 à 13:54
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `playlist`
--

-- --------------------------------------------------------

--
-- Structure de la table `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `artist` text NOT NULL,
  `album` text NOT NULL,
  `add_date` date NOT NULL,
  `duration` text NOT NULL,
  `style_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `song`
--

INSERT INTO `song` (`id`, `title`, `artist`, `album`, `add_date`, `duration`, `style_id`) VALUES
(15, 'Holiday in Cambodia', 'Dead Kennedys', 'Give Me Convenience Or Give Me Death', '2019-01-05', '3:45', 5),
(25, 'No fun', 'The Stooges', 'The Stooges', '2019-01-01', '5:16', 18),
(40, 'Paranoid', 'Black Sabbath', 'Paranoid', '2019-01-04', '2:47', 5),
(87, 'Hush', 'Deep Purple', 'Shades of Deep Purple', '2019-01-02', '5:27', 5),
(821, 'I Fought The Law', 'The Clash', 'Hits Back', '2019-01-06', '2:43', 18),
(1524, 'Welcome to the Jungle', 'Guns N\' Roses', 'Appetite for destruction', '2019-01-03', '4:34', 5);

-- --------------------------------------------------------

--
-- Structure de la table `style`
--

CREATE TABLE `style` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `style`
--

INSERT INTO `style` (`id`, `name`) VALUES
(2, 'funck'),
(5, 'rock'),
(9, 'classique'),
(13, 'jazz'),
(18, 'punk');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1525;
--
-- AUTO_INCREMENT pour la table `style`
--
ALTER TABLE `style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

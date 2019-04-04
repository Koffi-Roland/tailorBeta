-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 04 Avril 2019 à 18:30
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tailor`
--

-- --------------------------------------------------------

--
-- Structure de la table `SYS_client`
--

CREATE TABLE `SYS_client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `epaule` double NOT NULL,
  `l_manche` double NOT NULL,
  `t_manche` double NOT NULL,
  `l_chemise` double NOT NULL,
  `t_poitrine` double NOT NULL,
  `ceinture` double NOT NULL,
  `bassin` double NOT NULL,
  `l_patalon` double NOT NULL,
  `cuisse` double NOT NULL,
  `t_cheville` double NOT NULL,
  `encolure` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `SYS_commande`
--

CREATE TABLE `SYS_commande` (
  `id` int(11) NOT NULL,
  `client` int(11) DEFAULT NULL,
  `date_commande` datetime NOT NULL,
  `etat_payement` tinyint(1) NOT NULL,
  `montant` double NOT NULL,
  `etat_commande` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `SYS_modele`
--

CREATE TABLE `SYS_modele` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeModele` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `SYS_paiement`
--

CREATE TABLE `SYS_paiement` (
  `id` int(11) NOT NULL,
  `commande` int(11) DEFAULT NULL,
  `montant` double NOT NULL,
  `date_paiement` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `SYS_tenue`
--

CREATE TABLE `SYS_tenue` (
  `id` int(11) NOT NULL,
  `commande` int(11) DEFAULT NULL,
  `modele` int(11) DEFAULT NULL,
  `date_livraison` datetime NOT NULL,
  `prix` double NOT NULL,
  `photo_pagne` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dimension` double NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_reel_livraison` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `epaule` double NOT NULL,
  `l_manche` double NOT NULL,
  `t_manche` double NOT NULL,
  `l_chemise` double NOT NULL,
  `t_poitrine` double NOT NULL,
  `ceinture` double NOT NULL,
  `bassin` double NOT NULL,
  `l_patalon` double NOT NULL,
  `cuisse` double NOT NULL,
  `t_cheville` double NOT NULL,
  `encolure` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `SYS_type_modele`
--

CREATE TABLE `SYS_type_modele` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `SYS_type_modele`
--

INSERT INTO `SYS_type_modele` (`id`, `libelle`, `image`, `etat`) VALUES
(3, 'deux fentes', 'image', 0),
(4, 'boubou', 'image boubou', 0),
(5, 'deux fentes', 'image', 0),
(6, 'boubou', 'image boubou', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `SYS_client`
--
ALTER TABLE `SYS_client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `SYS_commande`
--
ALTER TABLE `SYS_commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C7C367CAC7440455` (`client`);

--
-- Index pour la table `SYS_modele`
--
ALTER TABLE `SYS_modele`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C0ACEB90939AEB05` (`typeModele`);

--
-- Index pour la table `SYS_paiement`
--
ALTER TABLE `SYS_paiement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_18F5BBA96EEAA67D` (`commande`);

--
-- Index pour la table `SYS_tenue`
--
ALTER TABLE `SYS_tenue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_252977886EEAA67D` (`commande`),
  ADD KEY `IDX_2529778810028558` (`modele`);

--
-- Index pour la table `SYS_type_modele`
--
ALTER TABLE `SYS_type_modele`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `SYS_client`
--
ALTER TABLE `SYS_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `SYS_commande`
--
ALTER TABLE `SYS_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `SYS_modele`
--
ALTER TABLE `SYS_modele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `SYS_paiement`
--
ALTER TABLE `SYS_paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `SYS_tenue`
--
ALTER TABLE `SYS_tenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `SYS_type_modele`
--
ALTER TABLE `SYS_type_modele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `SYS_commande`
--
ALTER TABLE `SYS_commande`
  ADD CONSTRAINT `FK_C7C367CAC7440455` FOREIGN KEY (`client`) REFERENCES `SYS_client` (`id`);

--
-- Contraintes pour la table `SYS_modele`
--
ALTER TABLE `SYS_modele`
  ADD CONSTRAINT `FK_C0ACEB90939AEB05` FOREIGN KEY (`typeModele`) REFERENCES `SYS_type_modele` (`id`);

--
-- Contraintes pour la table `SYS_paiement`
--
ALTER TABLE `SYS_paiement`
  ADD CONSTRAINT `FK_18F5BBA96EEAA67D` FOREIGN KEY (`commande`) REFERENCES `SYS_commande` (`id`);

--
-- Contraintes pour la table `SYS_tenue`
--
ALTER TABLE `SYS_tenue`
  ADD CONSTRAINT `FK_2529778810028558` FOREIGN KEY (`modele`) REFERENCES `SYS_modele` (`id`),
  ADD CONSTRAINT `FK_252977886EEAA67D` FOREIGN KEY (`commande`) REFERENCES `SYS_commande` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

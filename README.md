# ecf-php
ecf-php

Base de données : 

```MySQL
-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 08 juil. 2021 à 17:16
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `ecf-php`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `competences_user`
--

CREATE TABLE `competences_user` (
  `competences_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210626133820', '2021-06-26 13:38:28', 88),
('DoctrineMigrations\\Version20210626135714', '2021-06-26 13:57:29', 124),
('DoctrineMigrations\\Version20210626142100', '2021-06-26 14:21:20', 100),
('DoctrineMigrations\\Version20210626142258', '2021-06-26 14:23:01', 115),
('DoctrineMigrations\\Version20210626142355', '2021-06-26 14:23:58', 68),
('DoctrineMigrations\\Version20210626143430', '2021-06-26 14:34:35', 204),
('DoctrineMigrations\\Version20210626143606', '2021-06-26 14:36:09', 183);

-- --------------------------------------------------------

--
-- Structure de la table `professions`
--

CREATE TABLE `professions` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `professions_user`
--

CREATE TABLE `professions_user` (
  `professions_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom`, `prenom`) VALUES
(1, 'admin@admin.loc', '[\"ROLE_ADMIN\"]', '1234', 'ADMIN', 'admin'),
(2, 'john_danton@mail.loc', '[\"ROLE_COLLAB\"]', 'john', 'DANTON', 'John'),
(3, 'michel_durant@mail.loc', '[\"ROLE_COM\"]', 'michel', 'DURANT', 'Michel'),
(4, 'jean_tarare@mail.loc', '[\"ROLE_COLLAB\"]', '$argon2id$v=19$m=65536,t=4,p=1$1Dz2CMKm1bGfkwBOnJz+XA$Mm7fYsNpCV8mAt88mAtwRvalybzQwrmm21RdTwHf1jc', 'TARARE', 'Jean');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competences_user`
--
ALTER TABLE `competences_user`
  ADD PRIMARY KEY (`competences_id`,`user_id`),
  ADD KEY `IDX_2AFA32F9A660B158` (`competences_id`),
  ADD KEY `IDX_2AFA32F9A76ED395` (`user_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `professions_user`
--
ALTER TABLE `professions_user`
  ADD PRIMARY KEY (`professions_id`,`user_id`),
  ADD KEY `IDX_9AB7202CFEE064DD` (`professions_id`),
  ADD KEY `IDX_9AB7202CA76ED395` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competences_user`
--
ALTER TABLE `competences_user`
  ADD CONSTRAINT `FK_2AFA32F9A660B158` FOREIGN KEY (`competences_id`) REFERENCES `competences` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2AFA32F9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `professions_user`
--
ALTER TABLE `professions_user`
  ADD CONSTRAINT `FK_9AB7202CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9AB7202CFEE064DD` FOREIGN KEY (`professions_id`) REFERENCES `professions` (`id`) ON DELETE CASCADE;
```

======================================================

Pour les mots de passes des utilisateurs, j'ai remis en clair, parce que j'ai oublié les mots de passes pour certains. Mais sinon, j'utilisais
symfony console security:encode-password puis j'injectais dans la BDD la valeur aragon.

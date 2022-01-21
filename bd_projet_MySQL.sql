-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 10 mai 2020 à 07:11
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `td_cartes`
--

DROP TABLE IF EXISTS `td_cartes`;
CREATE TABLE IF NOT EXISTS `td_cartes` (
  `nom_jeu` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_carte` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reponse` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `aide` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `signalement_faux` int(11) NOT NULL DEFAULT '0',
  `signalement_inappro` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_carte`),
  UNIQUE KEY `Id de la carte` (`id_carte`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `td_cartes`
--

INSERT INTO `td_cartes` (`nom_jeu`, `id_carte`, `question`, `reponse`, `aide`, `signalement_faux`, `signalement_inappro`) VALUES
('Departements de France', 33, 'Numero de departement du Loiret', '50', NULL, 1, 0),
('Departements de France', 32, 'Numero de departement du Jura', '39', NULL, 0, 0),
('Departements de France', 31, 'Numero de departement de l\'Eure', '27', NULL, 0, 0),
('Departements de France', 30, 'Numero de departement du Val d\'Oise', '95', NULL, 0, 0),
('Departements de France', 29, 'Numero de departement des Hauts de Seine', '92', NULL, 0, 0),
('Addition Simple', 28, '10 + 12', '22', NULL, 0, 0),
('Addition Simple', 27, '3 + 8', '11', NULL, 0, 0),
('Addition Simple', 23, '1 + 1', '2', NULL, 0, 0),
('Addition Simple', 24, '4 + 9', '13', NULL, 0, 0),
('Addition Simple', 25, '11 + 8', '19', NULL, 0, 0),
('Addition Simple', 26, '3 + 3', '3', NULL, 1, 0),
('Multiplication facile', 35, '3 * 4', '12', NULL, 0, 0),
('Departements de France', 34, 'Numero de departement de Paris', '75', NULL, 0, 0),
('Multiplication facile', 36, '2 * 2', '4', NULL, 0, 0),
('Multiplication facile', 37, '7 * 7', '49', NULL, 0, 0),
('Multiplication facile', 38, '6 * 5', '30', NULL, 0, 0),
('Multiplication facile', 39, '1 * 8', '8', NULL, 0, 0),
('Multiplication facile', 40, '9 * 3', '27', NULL, 0, 0),
('Multiplication facile', 41, '4 * 8', '32', NULL, 0, 0),
('Division simple', 42, '32 / 8', '4', NULL, 0, 0),
('Division simple', 43, '49 / 7', '7', NULL, 0, 0),
('Division simple', 44, '50 / 2', '25', NULL, 0, 0),
('Division simple', 45, '36 / 6', '6', NULL, 0, 0),
('Division simple', 46, '12 / 4', '3', NULL, 0, 0),
('Division simple', 47, '45 / 5', '9', NULL, 0, 0),
('Soustraction facile', 48, '15 - 3', '12', NULL, 0, 0),
('Soustraction facile', 49, '22 - 10', '12', NULL, 0, 0),
('Soustraction facile', 50, '5 - 3', '2', NULL, 0, 0),
('Soustraction facile', 51, '19 - 8', '11', NULL, 0, 0),
('Soustraction facile', 52, '7 - 4', '3', NULL, 0, 0),
('Soustraction facile', 53, '56 - 16', '40', NULL, 0, 0),
('Pokemon', 54, 'Quelle est la couleur de Pikachu', 'Jaune', NULL, 0, 0),
('Pokemon', 55, 'Rondoudou est il rose ?', 'oui', NULL, 0, 0),
('Pokemon', 56, 'Dracaufeu est il l\'evolution de Psykokwak', 'non', NULL, 0, 0),
('Pokemon', 57, 'Bulbizarre est il un pokemon de dÃ©part ?', 'oui', NULL, 0, 0),
('Pokemon', 58, 'Quel est le type de Tiplouf ?', 'Eau', NULL, 0, 0),
('Pokemon', 59, 'Simiabraz peut il utiliser l\'attaque Roue de Feu ?', 'oui', NULL, 0, 0),
('Verbes du 1er groupe', 60, 'je mange ou je manges ?', 'je mange', NULL, 0, 0),
('Verbes du 1er groupe', 61, 'il aime ou il aimes ?', 'il aime', NULL, 0, 0),
('Verbes du 1er groupe', 62, 'vous oubliey ou vous oubliez ?', 'vous oubliez', NULL, 0, 0),
('Verbes du 1er groupe', 63, 'nous marchons ou nous marchont ?', 'nous marchons', NULL, 0, 0),
('Verbes du 1er groupe', 64, 'ils envoient ou ils envoyent ?', 'ils envoient', NULL, 0, 0),
('Verbes du 1er groupe', 65, 'nous mangeons ou nous mangons ?', 'nous mangeons', NULL, 0, 0),
('Verbes 1er groupe imparfait', 66, 'je mangeais ou je mangais ?', 'je mangeais', NULL, 0, 0),
('Verbes 1er groupe imparfait', 67, 'ils aimaient ou ils aimait ?', 'ils aimaient', NULL, 0, 0),
('Verbes 1er groupe imparfait', 68, 'nous jouions ou nous jouons ?', 'nous jouions', NULL, 0, 0),
('Verbes 1er groupe imparfait', 69, 'tu avalais ou tu avalait ?', 'tu avalais', NULL, 0, 0),
('Verbes 1er groupe imparfait', 70, 'il cassait ou il cassai ?', 'il cassait', NULL, 0, 0),
('Verbes 1er groupe imparfait', 71, 'nous criions ou nous crions ?', 'nous criions', NULL, 0, 0),
('Alphabet ouf', 72, 'Combien de lettres y a t il dans l\'alphabet ?', '24', NULL, 1, 0),
('Alphabet ouf', 73, 'Que vient apres P ?', 'Q', NULL, 0, 0),
('Alphabet ouf', 74, 'Que vient avant E ?', 'D', NULL, 0, 0),
('Alphabet ouf', 75, 'Que vient apres S ?', 'T', NULL, 0, 0),
('Alphabet ouf', 76, 'Que vient avant G ?', 'F', NULL, 0, 0),
('Alphabet ouf', 77, 'Que vient avant U ?', 'T', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `td_jeux`
--

DROP TABLE IF EXISTS `td_jeux`;
CREATE TABLE IF NOT EXISTS `td_jeux` (
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `theme` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `createur` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `note` int(11) DEFAULT NULL,
  `difficulte` tinyint(4) NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '0',
  `nb_voteurs0` int(11) NOT NULL DEFAULT '0',
  `nb_voteurs1` int(11) NOT NULL DEFAULT '0',
  `nb_voteurs2` int(11) NOT NULL DEFAULT '0',
  `nb_voteurs3` int(11) NOT NULL DEFAULT '0',
  `nb_voteurs4` int(11) NOT NULL DEFAULT '0',
  `nb_voteurs5` int(11) NOT NULL DEFAULT '0',
  `nb_utilisation` int(11) NOT NULL DEFAULT '0',
  `signalement_titre` int(11) NOT NULL DEFAULT '0',
  `signalement_theme` int(11) NOT NULL DEFAULT '0',
  `signalement_sujet` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nom`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `td_jeux`
--

INSERT INTO `td_jeux` (`nom`, `theme`, `createur`, `note`, `difficulte`, `online`, `nb_voteurs0`, `nb_voteurs1`, `nb_voteurs2`, `nb_voteurs3`, `nb_voteurs4`, `nb_voteurs5`, `nb_utilisation`, `signalement_titre`, `signalement_theme`, `signalement_sujet`) VALUES
('Departements de France', 'Histoire', 'joueur1', 5, 1, 1, 0, 0, 0, 0, 0, 1, 7, 0, 1, 0),
('Addition Simple', 'Mathematiques', 'joueur1', 3, 1, 1, 0, 0, 0, 1, 0, 0, 2, 0, 0, 0),
('Multiplication facile', 'Mathematiques', 'joueur1', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0),
('Division simple', 'Mathematiques', 'joueur1', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0),
('Soustraction facile', 'Mathematiques', 'joueur1', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0),
('Pokemon', 'Histoire', 'joueur2', 3, 1, 1, 0, 0, 0, 2, 1, 0, 2, 0, 1, 1),
('Verbes du 1er groupe', 'Conjugaison', 'joueur3', 4, 1, 1, 0, 0, 0, 0, 1, 0, 6, 0, 0, 0),
('Verbes 1er groupe imparfait', 'Conjugaison', 'joueur3', 5, 1, 1, 0, 0, 0, 0, 0, 1, 4, 0, 0, 0),
('Alphabet ouf', 'Sciences', 'joueur2', 0, 1, 1, 3, 2, 0, 0, 0, 0, 5, 1, 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `td_themes`
--

DROP TABLE IF EXISTS `td_themes`;
CREATE TABLE IF NOT EXISTS `td_themes` (
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `couleur` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nom`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `td_themes`
--

INSERT INTO `td_themes` (`nom`, `couleur`) VALUES
('Mathematiques', '#FF1A1A'),
('Histoire', '#FF8C00'),
('Geographie', '#FFD700'),
('Sciences', '#4DFF4D'),
('Conjugaison', '#C266FF'),
('vbnl', 'cyan');

-- --------------------------------------------------------

--
-- Structure de la table `td_utilisateurs`
--

DROP TABLE IF EXISTS `td_utilisateurs`;
CREATE TABLE IF NOT EXISTS `td_utilisateurs` (
  `pseudo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `age` tinyint(4) NOT NULL,
  PRIMARY KEY (`pseudo`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `td_utilisateurs`
--

INSERT INTO `td_utilisateurs` (`pseudo`, `prenom`, `mail`, `mdp`, `admin`, `age`) VALUES
('joueur3', 'Samuel', 'sam@live.com', '$2y$10$OL.sQ0TCTXAOBpB04wkqFemTSSXdOXLKwN6oKod79SkSToCRnt/eC', 0, 13),
('Admin', 'Pauline', 'admin@mail.com', '$2y$10$YSFcmYz5dcFIiXj7dhtcROjcSOvWu7M4v4ioepaqkf4/gcZAoqzGa', 2, 18),
('joueur2', 'Sandra', 'sandra.2@msn.com', '$2y$10$eDzLf0bJqhZq7Zdfpd.DKu69mwsUyI3A7.ED7eRGKLMrCxiOyDznO', 1, 15),
('joueur1', 'Emmanuel', 'manu@mail.fr', '$2y$10$MiKzdiaZpOsOHFwrBYHPWeBwWv9EFEBm04FPEi8DXbXqc52mvhFge', 0, 21);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `td_jeux`
--
ALTER TABLE `td_jeux` ADD FULLTEXT KEY `nom-jeux` (`nom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

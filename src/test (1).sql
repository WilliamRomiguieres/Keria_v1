-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: 127.0.0.1
-- Généré le : Sam 09 Juillet 2011 à 15:37
-- Version du serveur: 5.5.10
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `alli`
--

CREATE TABLE IF NOT EXISTS `alli` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `lvl` varchar(255) NOT NULL,
  `armee` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `alli`
--


-- --------------------------------------------------------

--
-- Structure de la table `alliances`
--

CREATE TABLE IF NOT EXISTS `alliances` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `alliances`
--


-- --------------------------------------------------------

--
-- Structure de la table `allichat`
--

CREATE TABLE IF NOT EXISTS `allichat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `heure` time NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `allichat`
--

INSERT INTO `allichat` (`ID`, `ip`, `pseudo`, `message`, `heure`, `nom`) VALUES
(1, '127.0.0.1', 'Alpha', 'Salut', '15:07:16', 'DTC'),
(2, '127.0.0.1', 'Alpha', 'Je vois', '15:07:27', 'DTC'),
(3, '127.0.0.1', 'Alpha', 'Ce t''chat d''ally rox je trouve', '15:07:50', 'DTC'),
(4, '127.0.0.1', 'Alpha', 'Mais il manque plus qu''à faire les pages', '15:08:06', 'DTC'),
(5, '127.0.0.1', 'Alpha', '&lt;br/&gt;Yeaah', '15:08:51', 'DTC'),
(6, '127.0.0.1', 'Alpha', 'Au boulot', '15:09:33', 'DTC'),
(7, '127.0.0.1', 'Alpha', 'fff bande de noob', '22:40:50', 'DTC'),
(8, '127.0.0.1', 'Alpha', 'faineant =)', '22:41:10', 'DTC'),
(9, '127.0.0.1', 'Alpha', 'x'') :)', '22:41:22', 'DTC'),
(10, '127.0.0.1', 'Alpha', 'tu voulais pas metrre des smileys', '22:41:47', 'DTC'),
(11, '127.0.0.1', 'Alpha', 'Ben c''est à ça que ca sert de revoir outes les pages, à mettre les trucs Et les outils de modérations aussi ok bon tu veut les textes sur wordpad? Fais mon ami fais, on a plus le temps, beta vendredi J-2', '22:43:03', 'DTC');

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

CREATE TABLE IF NOT EXISTS `boutique` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `multiplication` varchar(255) NOT NULL,
  `rajoutage` varchar(255) NOT NULL,
  `classe_rajoutage` varchar(255) NOT NULL,
  `lvl_min` varchar(255) NOT NULL,
  `cout` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `des` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `duree` varchar(255) NOT NULL,
  `lvl_max` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `boutique`
--

INSERT INTO `boutique` (`ID`, `multiplication`, `rajoutage`, `classe_rajoutage`, `lvl_min`, `cout`, `description`, `des`, `image`, `duree`, `lvl_max`, `titre`) VALUES
(1, '2', '0', '0', '0', '10000', 'Multipliez vos dégâts et votre protection pendant 1 heure grâce à cet engin !!', 'Vous avez activé le boost.', 'boost.png', '60', '50', 'Boost 2x'),
(2, '4', '0', '0', '0', '25000', 'Multipliez vos dégâts et votre protection pendant 1 heure grâce à cet engin !!', 'Vos dégâts et votre protection ont étés multipliés par 2.', 'boost2.png', '60', '50', 'Boost 4x'),
(3, '0', '100', 'snipers', '0', '7000', 'Rajoutez vous 100 snipers pendant journée pour 7000 euros !', 'Vous avez activé le processus de rajout.', 'rajout.bmp', '1440', '50', 'Ajout de 100 snipers'),
(4, '0', '100', 'chars', '0', '7000', 'Rajout de 100 chars/tanks pendant 1 journée !', 'Le processus de rajout a été activé.', 'rajout.bmp', '1440', '50', 'Ajout de 100 chars/tanks');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `pers_id` varchar(255) NOT NULL,
  `heure` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`ID`, `ip`, `pseudo`, `message`, `pers_id`, `heure`) VALUES
(1, '', '', '', '', ''),
(2, '127.0.0.1', '', '', '', ''),
(3, '127.0.0.1', 'Alpha520', 'vs', '1', '20:21');

-- --------------------------------------------------------

--
-- Structure de la table `connectes`
--

CREATE TABLE IF NOT EXISTS `connectes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `connectes`
--

INSERT INTO `connectes` (`ID`, `ip`, `pseudo`, `time`) VALUES
(2, '127.0.0.1', 'Alpha', '1306176362');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `adresse_email` varchar(255) NOT NULL,
  `rang` varchar(255) NOT NULL,
  `lvl` varchar(255) NOT NULL,
  `date_co` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `inscription`
--


-- --------------------------------------------------------

--
-- Structure de la table `inventaire`
--

CREATE TABLE IF NOT EXISTS `inventaire` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `id_achat` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `inventaire`
--

INSERT INTO `inventaire` (`ID`, `ip`, `pseudo`, `id_achat`) VALUES
(27, '127.0.0.1', 'JAK', '1'),
(28, '127.0.0.1', 'Alpha', '1'),
(29, '127.0.0.1', 'Alpha', '3'),
(30, '127.0.0.1', 'Alpha', '1');

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE IF NOT EXISTS `jeu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `chars` varchar(255) NOT NULL,
  `snipers` varchar(255) NOT NULL,
  `argent` varchar(255) NOT NULL,
  `miliciens` varchar(255) NOT NULL,
  `avions` varchar(255) NOT NULL,
  `attaque` varchar(255) NOT NULL,
  `défense` varchar(255) NOT NULL,
  `ouvriers` varchar(255) NOT NULL,
  `habitants` varchar(255) NOT NULL,
  `agriculteurs` varchar(255) NOT NULL,
  `heures_passees` varchar(255) NOT NULL,
  `alliances` varchar(255) NOT NULL,
  `attaque_restante` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `jeu`
--


-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `lvl_min` varchar(255) NOT NULL,
  `lvl_max` varchar(255) NOT NULL,
  `maximum` varchar(255) NOT NULL,
  `raportation` varchar(255) NOT NULL,
  `domaine` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `jobs`
--

INSERT INTO `jobs` (`ID`, `lvl_min`, `lvl_max`, `maximum`, `raportation`, `domaine`) VALUES
(2, '0', '20', '20', '1', 'ouvriers'),
(3, '0', '20', '20', '2', 'habitants');

-- --------------------------------------------------------

--
-- Structure de la table `mp`
--

CREATE TABLE IF NOT EXISTS `mp` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `destinataire` varchar(255) NOT NULL,
  `expediteur` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `lu` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `mp`
--


-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `id_topic` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`ID`, `ip`, `pseudo`, `message`, `date`, `id_topic`) VALUES
(1, '127.0.0.1', 'Alpha', 'Salut =)', '2011-07-04 22:36:16', '1'),
(2, '127.0.0.1', 'Alpha', 'Bien =)', '2011-07-04 22:37:56', '1'),
(3, '127.0.0.1', 'Alpha', 'AA', '2011-07-04 22:38:52', '2'),
(4, '127.0.0.1', 'Alpha', 'Ok', '2011-07-04 23:42:12', '3'),
(5, '127.0.0.1', 'Alpha', '=D J''ai bien bossé oui trop Est ce que team viewer existe sur nokia ? je c pas je croit kil ya des application OKdOOKOKOK J''t''ai tout montré merci\r\nVendredi je sors la bêta yeah', '2011-07-04 23:46:03', '3'),
(6, '127.0.0.1', 'Alpha', 'Bien esta ltou cest le fo', '2011-07-05 11:29:03', '4'),
(7, '127.0.0.1', 'Alpha', 'sdfsfsfdsdfssdfs', '2011-07-05 11:29:11', '4'),
(8, '127.0.0.1', 'Alpha', 'qdqdqdqhola ke ', '2011-07-05 11:29:17', '4'),
(9, '127.0.0.1', 'Alpha', '0P0P0P0P', '2011-07-05 11:29:33', '4'),
(10, '127.0.0.1', 'Alpha', 'WISsTuAROce WISTARO', '2011-07-05 11:29:50', '4'),
(11, '127.0.0.1', 'Alpha', 'Aoqs', '2011-07-05 11:36:46', '4'),
(12, '127.0.0.1', 'Alpha', 'moi je le verrer...\r\nBon je reprends mon code ?\r\nouai aller vasy\r\nAdmirez,, je vais coder le bot', '2011-07-05 11:37:45', '4');

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE IF NOT EXISTS `sujet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `date_derniere` datetime NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `dernier_id` varchar(255) NOT NULL,
  `derniere_page` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`ID`, `ip`, `pseudo`, `titre`, `date`, `date_derniere`, `cat_id`, `message`, `dernier_id`, `derniere_page`) VALUES
(1, '127.0.0.1', 'Alpha', 'Evitez les avions', '2011-07-04 22:36:08', '2011-07-04 22:37:56', '1', 'Salut', '2', '1'),
(2, '127.0.0.1', 'Alpha', 'AA', '2011-07-04 22:38:44', '2011-07-04 22:38:52', '1', 'ddqd', '3', '1'),
(3, '127.0.0.1', 'Alpha', 'On test', '2011-07-04 23:41:59', '2011-07-04 23:46:03', '1', 'Test', '5', '1'),
(4, '127.0.0.1', 'Alpha', 'Test', '2011-07-05 11:28:48', '2011-07-05 11:37:45', '1', 'Saaalut  sa ', '12', '2');

-- --------------------------------------------------------

--
-- Structure de la table `tableau`
--

CREATE TABLE IF NOT EXISTS `tableau` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `avions_a` varchar(255) NOT NULL,
  `avions_b` varchar(255) NOT NULL,
  `snipers_a` varchar(255) NOT NULL,
  `snipers_b` varchar(255) NOT NULL,
  `miliciens_a` varchar(255) NOT NULL,
  `miliciens_b` varchar(255) NOT NULL,
  `chars_a` varchar(255) NOT NULL,
  `chars_b` varchar(255) NOT NULL,
  `or_gagne` varchar(255) NOT NULL,
  `attaquant` varchar(255) NOT NULL,
  `gagnant` varchar(255) NOT NULL,
  `pseudo1` varchar(255) NOT NULL,
  `pseudo2` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tableau`
--


-- --------------------------------------------------------

--
-- Structure de la table `tchat`
--

CREATE TABLE IF NOT EXISTS `tchat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `heure` time NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Contenu de la table `tchat`
--

INSERT INTO `tchat` (`ID`, `ip`, `pseudo`, `message`, `heure`) VALUES
(1, '127.0.0.1', 'Mondias', 'SsaluAt', '14:46:00'),
(2, '127.0.0.1', 'Alpha', 'Salut', '14:46:00'),
(3, '127.0.0.1', 'Alpha', 'Salut', '14:47:00'),
(4, '127.0.0.1', 'Mondias', 'Sa gere', '14:47:00'),
(5, '127.0.0.1', 'Alpha', 'Ouais j''avoue =)', '14:47:00'),
(6, '127.0.0.1', 'Mondias', 'T''es un boss moi jy arrive que si je m''entraine bqp on que je prepare à l''avance', '14:48:00'),
(7, '127.0.0.1', 'Mondias', 'T''es un boss moi jy arrive que si je m''entraine bqp on que je prepare à l''avance', '14:48:37'),
(8, '127.0.0.1', 'Alpha520', 'Voilà c''est mieux', '14:48:45'),
(9, '127.0.0.1', 'Mondias', 'Oi', '14:48:55'),
(10, '127.0.0.1', 'Alpha', 'test', '15:18:47'),
(11, '127.0.0.1', 'Alpha', 'test', '15:18:53'),
(12, '127.0.0.1', 'Monpseudo', 'Voilà', '15:28:32'),
(13, '127.0.0.1', 'Monpseudo', 'Cool', '15:28:42'),
(14, '127.0.0.1', 'Monpseudo', 'Cool', '15:37:28'),
(15, '127.0.0.1', 'Alpha', 'ass', '15:38:20'),
(16, '127.0.0.1', 'Alpha', 'ass', '15:39:17'),
(17, '127.0.0.1', 'Alpha', 'ass', '15:39:32'),
(18, '127.0.0.1', 'Alpha', 'Salut', '15:39:36'),
(19, '127.0.0.1', 'Alpha', 'Voilà ca marche', '15:39:43'),
(20, '127.0.0.1', 'Alpha520', 'Yeah sa gere ', '15:40:01'),
(21, '127.0.0.1', 'Alpha520', 'On fais uune 3eme page !', '15:40:13'),
(22, '127.0.0.1', 'Alpha520', 'qddq', '15:40:16'),
(23, '127.0.0.1', 'Alpha520', 'Tp bien bn fo ke jy go', '15:40:49'),
(24, '127.0.0.1', 'Alpha520', 'Tu gere en php', '15:41:05'),
(25, '127.0.0.1', 'Alpha520', 'Merci mais e préfères le C Ok', '15:41:18'),
(26, '127.0.0.1', 'Alpha520', 'Je vais y aller moi aussi', '15:41:29'),
(27, '127.0.0.1', 'Alpha520', '++', '15:41:35'),
(28, '127.0.0.1', 'Alpha520', 'dfsfsf', '09:27:59'),
(29, '127.0.0.1', 'Alpha520', 'sfsfs', '09:28:01'),
(30, '127.0.0.1', 'Alpha520', 'ezzrz', '09:28:06'),
(31, '127.0.0.1', 'Alpha520', 'rzr', '09:28:09'),
(32, '127.0.0.1', 'Alpha', 'Bienvenue =)', '08:48:44'),
(33, '127.0.0.1', 'Alpha', 'q', '08:48:55'),
(34, '127.0.0.1', 'Alpha', 'q', '08:49:43'),
(35, '127.0.0.1', 'Alpha', 'q', '08:55:08'),
(36, '127.0.0.1', 'Alpha', '=)', '08:56:12'),
(37, '127.0.0.1', 'Alpha', '''''', '08:56:16'),
(38, '127.0.0.1', 'Alpha', 'T''es la ?', '09:06:32'),
(39, '127.0.0.1', 'Alpha', '<strong>Salut</strong>', '09:06:38'),
(40, '127.0.0.1', 'Alpha', '&lt;br/&gt;', '09:06:45'),
(41, '127.0.0.1', 'Alpha', '<span style="color:blue">Salut</span>', '09:07:03'),
(42, '127.0.0.1', 'Alpha', '<a href="http://pspflash.free.fr">http://pspflash.free.fr</a>', '09:07:23'),
(43, '127.0.0.1', 'Alpha', '<a href="<a href="http://pspflash.free.fr">http://pspflash.free.fr</a>">Salut</a>', '09:08:06'),
(44, '127.0.0.1', 'Alpha', '=)', '09:14:58'),
(45, '127.0.0.1', 'Alpha', '<img src="emos/01.png"/>', '09:15:03'),
(46, '127.0.0.1', 'Alpha', '<img src="emos/01.png"/> =)', '09:15:13'),
(47, '127.0.0.1', 'Alpha', '<img src="emos/01.png"/>', '09:15:39'),
(48, '127.0.0.1', 'Alpha', '<img src="emos/03.png"/>', '09:16:36'),
(49, '127.0.0.1', 'Alpha', '<img src="emos/03.png"/>', '09:16:40'),
(50, '127.0.0.1', 'Alpha', '<img src="emos/01.png"/>', '09:16:43');

-- --------------------------------------------------------

--
-- Structure de la table `utilisation`
--

CREATE TABLE IF NOT EXISTS `utilisation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `temps` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `fin` varchar(255) NOT NULL,
  `multiplication` varchar(255) NOT NULL,
  `rajout` varchar(255) NOT NULL,
  `classe_rajout` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `utilisation`
--


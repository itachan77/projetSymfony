-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 26 jan. 2021 à 09:01
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eleve`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

DROP TABLE IF EXISTS `actualite`;
CREATE TABLE IF NOT EXISTS `actualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mois` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu_actu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id`, `mois`, `annee`, `contenu_actu`, `couleur`) VALUES
(4, 'Septembre', '2020', '<p><strong><span style=\"font-size:18px\">L&#39;&eacute;cole de musique LA SCUOLA rouvre ses portes &agrave; partir du Mardi 01 septembre 2020. Bien entendu, les gestes barri&egrave;res continueront &agrave; &ecirc;tre respect&eacute;s. Nous recherchons un nouveau professeur de guitare et de basse. Toute candidature sera la bienvenue.</span></strong></p>', '#c18ab0'),
(5, 'Mai', '2020', '<p><span style=\"font-size:16px\">La reprise des cours aura lieu &agrave; partir du lundi 11 mai 2020 avec les conditions suivantes : Les gestes barri&egrave;res devront &ecirc;tre respect&eacute;s. Les salles de cours ont &eacute;t&eacute; r&eacute;am&eacute;nag&eacute;es pour respecter la distance de plus d&rsquo;un m&egrave;tre entre chaque &eacute;l&egrave;ve. Il y aura moins de 10 personnes dans la grande salle de cours Du gel hydroalcoolique sera &agrave; la disposition des &eacute;l&egrave;ves pour le lavage des mains avant et apr&egrave;s chaque cours Les professeurs seront &eacute;quip&eacute;s d&rsquo;une visi&egrave;re. Le port du masque sera obligatoire. Les &eacute;l&egrave;ves porteurs de sympt&ocirc;mes ne pourront pas assister aux cours. Enfin les &eacute;l&egrave;ves d&rsquo;Eveil Musical ne pourront reprendre les cours qu&rsquo;&agrave; la rentr&eacute;e septembre 2020. Toute l&rsquo;&eacute;quipe de la Scuola vous souhaite un bon courage pendant cette crise sanitaire en esp&eacute;rant qu&rsquo;elle prendra bient&ocirc;t fin.</span></p>', '#8eabd2'),
(18, 'février', '2022', '<p><strong>Nouvelle actualit&eacute; de Chantal</strong></p>', '#a99393'),
(19, 'Décembre', '2021', '<p>Je m&#39;appelle Raphel</p>', '#236c28');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr_categorie` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categorie`, `descr_categorie`) VALUES
(1, 'Batterie', 'Les cours de batterie sont donn&eacute;s par Eric VAUDRON :\r\n- Tous les samedis entre 09 h 30 et 19 heures.\r\nCet instrument peut &ecirc;tre pratiqu&eacute; d&egrave;s l&#39;&acirc;ge de 8 ans.'),
(2, 'Eveil musical', 'Les cours d&#39;&eacute;veil musical sont donn&eacute;s par Rapha&euml;l ITALIANO :<br />\r\n- le mercredi matin de 10 heures &agrave; 11 heures - le vendredi de 17 heures &agrave; 18 heures.<br />\r\nIls sont r&eacute;serv&eacute;s aux enfants de 3 ans et plus. Ils consistent &agrave; d&eacute;velopper chez l&#39;enfant l&#39;oreille, le rythme, le chant, la connaissance des notes et la pratique de divers instruments.</p>'),
(3, 'Chant', 'Les cours de chant sont donn&eacute;s par Adel BELHADDAD :\r\n- les mercredis entre 14 heures et 20 heures.\r\n- les vendredi entre 17 heures et 21 heures.\r\nCes cours sont donn&eacute;s en collectif ou en individuel.\r\nAge minimum : 8 ans.'),
(4, 'Guitare', 'Les cours de guitare et basse sont donn&eacute;s par Adel :\r\n- le mercredi entre 14 heures et 21 heures</li>\r\n- le vendredi entre 16 heures et 21 heures</li>\r\nCet instrument peut &ecirc;tre pratiqu&eacute; d&egrave;s l&#39;&acirc;ge de 6 ans.'),
(5, 'Flûte', ''),
(6, 'Saxophone', 'Les cours de saxophone sont donn&eacute;s par Mathias LUSPINSKY :\r\n- le lundi soir entre 17 heures et 21 heures.\r\nIls s&#39;adressent aux adultes comme aux enfants (6 ans et plus).\r\nLa pratique de l&#39;instrument est abord&eacute; d&egrave;s le premier cours.\r\nLes r&eacute;pertoires sont vari&eacute;s : du classique au jazz...'),
(8, 'Violon', 'Les cours de violon sont donn&eacute;s par Agathe HEMMO :\r\n- le mardi entre 16 heures et 21 heures.\r\nIls s&#39;adressent aux adultes comme aux enfants (d&egrave;s l&#39;&acirc;ge de 6 ans).\r\nL&#39;instrument est pratiqu&eacute; d&egrave;s le premier cours.\r\nLes r&eacute;pertoires sont vari&eacute;s : du classique au jazz...'),
(14, 'Piano', '<p>Les cours de piano sont donn&eacute;s par Rapha&euml;l ITALIANO : - le lundi, mardi, jeudi et vendredi entre 17 heures et 21 heures. - le mercredi entre 14 heures et 20 heures - le samedi entre 10 heures et 19 heures Ils sont adapt&eacute;s aux enfants de 6 ans et plus.</p>'),
(15, 'Basse', 'Les cours de basse sont donn&eacute;s par Adel :\r\n- le mercredi entre 14 heures et 21 heures.\r\n- le vendredi entre 16 heures et 21 heures.\r\nCet instrument peut &ecirc;tre pratiqu&eacute;s d&egrave;s l&#39;&acirc;ge de 8 ans.'),
(16, 'Violoncelle', 'Les cours de violoncelle et alto sont donn&eacute;s par Agathe HEMMO :\r\n- le mardi entre 16 heures et 21 heures.\r\nIls s&#39;adressent aux adultes comme aux enfants (d&egrave;s l&#39;&acirc;ge de de 6 ans).\r\nL&#39;instrument est pratiqu&eacute; d&egrave;s le premier cours.\r\nLes r&eacute;pertoires sont vari&eacute;s : du classique au jazz...'),
(17, 'Chorale', 'La chorale est assur&eacute; par Rapha&ecirc;l ITALIANO :\r\n- le jeudi de 19 heures &agrave; 20 heures.\r\nDiff&eacute;rents r&eacute;pertoires sont abord&eacute;s : classique, gospel, vari&eacute;t&eacute;...'),
(18, 'Quator à cordes', 'Les cours sont assur&eacute;s par Agathe HEMMO : \r\n- le mardi entre 16 h et 21 heures. \r\nIls abordent des r&eacute;pertoires classiques, jazz et vari&eacute;t&eacute;'),
(19, 'MAO', '');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_professeur`
--

DROP TABLE IF EXISTS `categorie_professeur`;
CREATE TABLE IF NOT EXISTS `categorie_professeur` (
  `categorie_id` int(11) NOT NULL,
  `professeur_id` int(11) NOT NULL,
  PRIMARY KEY (`categorie_id`,`professeur_id`),
  KEY `IDX_896C9835BCF5E72D` (`categorie_id`),
  KEY `IDX_896C9835BAB22EE9` (`professeur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_professeur`
--

INSERT INTO `categorie_professeur` (`categorie_id`, `professeur_id`) VALUES
(2, 1),
(3, 2),
(6, 5),
(8, 3),
(14, 1),
(19, 6);

-- --------------------------------------------------------

--
-- Structure de la table `connu_par`
--

DROP TABLE IF EXISTS `connu_par`;
CREATE TABLE IF NOT EXISTS `connu_par` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_connu_par` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_contact` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reponse_contact` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `titre_contact`, `nom_contact`, `prenom_contact`, `email_contact`, `message_contact`, `age_contact`, `reponse_contact`) VALUES
(1, 'Mademoiselle', 'MANETTE', 'Chantal', 'itachan77@orange.fr', 'Mon premier message', '40 ans et plus', NULL),
(16, 'Monsieur', 'AUBRY', 'Christophe', 'aubry@gmail.com', 'Developpeur web front et backend', '40 ans et plus', NULL),
(17, 'Monsieur', 'AUBRY', 'Christophe', 'aubry@gmail.com', 'Developpeur web front et backend', '40 ans et plus', NULL),
(18, 'Monsieur', 'BONJOUR', 'Sylvain', 'bonjourSylvain@gmail.com', 'Sylvain se lève toujours très tôt', 'Entre 20 et 39 ans', '<p>Reponse reussie enfin</p>'),
(19, 'Monsieur', 'BONJOUR', 'Sylvain', 'bonjourSylvain@gmail.com', 'Sylvain se lève toujours très tôt', 'Entre 20 et 39 ans', '<p>la reponse</p>'),
(20, 'Monsieur', 'SATURNIN', 'Fabien', 'ingallsfor@yahoo.fr', 'Message de saturnin va bien', '40 ans et plus', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cpville`
--

DROP TABLE IF EXISTS `cpville`;
CREATE TABLE IF NOT EXISTS `cpville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cpville`
--

INSERT INTO `cpville` (`id`, `code_postal`, `ville`) VALUES
(1, '93600', 'AULNAY SOUS BOIS'),
(2, '93700', 'DRANCY');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201212141750', '2020-12-12 14:18:16', 4243),
('DoctrineMigrations\\Version20201212151400', '2020-12-12 15:14:33', 1847),
('DoctrineMigrations\\Version20201212152136', '2020-12-12 15:21:56', 2080),
('DoctrineMigrations\\Version20201212154203', '2020-12-12 15:42:15', 6886),
('DoctrineMigrations\\Version20201212155632', '2020-12-12 15:56:46', 1699),
('DoctrineMigrations\\Version20201213180740', '2020-12-21 22:07:47', 3197),
('DoctrineMigrations\\Version20201221215716', '2020-12-21 22:07:50', 3338),
('DoctrineMigrations\\Version20201221215959', '2020-12-21 22:07:54', 0),
('DoctrineMigrations\\Version20201221221114', '2020-12-21 22:11:24', 3465),
('DoctrineMigrations\\Version20201221221230', '2020-12-21 22:12:45', 3056),
('DoctrineMigrations\\Version20201221224620', '2020-12-21 22:46:33', 4382),
('DoctrineMigrations\\Version20201221225009', '2020-12-21 22:50:35', 9082),
('DoctrineMigrations\\Version20201223182044', '2020-12-23 18:21:33', 1352),
('DoctrineMigrations\\Version20201225071247', '2020-12-25 07:13:34', 2304),
('DoctrineMigrations\\Version20201225072420', '2020-12-25 07:25:12', 2410),
('DoctrineMigrations\\Version20201225073523', '2020-12-25 07:35:39', 1284),
('DoctrineMigrations\\Version20201225073758', '2020-12-25 07:38:10', 1079),
('DoctrineMigrations\\Version20210103000508', '2021-01-03 00:05:45', 1178),
('DoctrineMigrations\\Version20210105213055', '2021-01-05 21:31:19', 2469),
('DoctrineMigrations\\Version20210105213316', '2021-01-05 21:33:26', 2182),
('DoctrineMigrations\\Version20210106000529', '2021-01-06 00:05:36', 1125),
('DoctrineMigrations\\Version20210106000647', '2021-01-06 00:06:59', 976),
('DoctrineMigrations\\Version20210106001238', '2021-01-06 00:12:51', 415),
('DoctrineMigrations\\Version20210107233208', '2021-01-07 23:32:28', 2729),
('DoctrineMigrations\\Version20210108010032', '2021-01-08 01:00:40', 167),
('DoctrineMigrations\\Version20210109130814', '2021-01-09 13:08:22', 1403),
('DoctrineMigrations\\Version20210109131024', '2021-01-09 13:10:44', 618),
('DoctrineMigrations\\Version20210109131837', '2021-01-09 13:18:43', 511),
('DoctrineMigrations\\Version20210109230512', '2021-01-09 23:05:23', 719),
('DoctrineMigrations\\Version20210110011802', '2021-01-10 01:18:12', 348),
('DoctrineMigrations\\Version20210110100107', '2021-01-10 10:01:23', 1093),
('DoctrineMigrations\\Version20210110111941', '2021-01-10 11:19:48', 462),
('DoctrineMigrations\\Version20210110113214', '2021-01-10 11:32:20', 513),
('DoctrineMigrations\\Version20210110113331', '2021-01-10 11:33:37', 544),
('DoctrineMigrations\\Version20210110113907', '2021-01-10 12:10:57', 753),
('DoctrineMigrations\\Version20210110153820', '2021-01-10 15:38:30', 1289),
('DoctrineMigrations\\Version20210110154341', '2021-01-10 15:49:36', 24),
('DoctrineMigrations\\Version20210110154634', '2021-01-10 15:49:36', 0),
('DoctrineMigrations\\Version20210110154926', '2021-01-10 15:49:36', 719),
('DoctrineMigrations\\Version20210111004345', '2021-01-11 00:43:55', 2322),
('DoctrineMigrations\\Version20210111203058', '2021-01-11 20:31:17', 3509),
('DoctrineMigrations\\Version20210116231640', '2021-01-16 23:16:55', 2481),
('DoctrineMigrations\\Version20210117010723', '2021-01-17 01:07:35', 1174),
('DoctrineMigrations\\Version20210117010823', '2021-01-17 01:08:32', 1148),
('DoctrineMigrations\\Version20210117190055', '2021-01-17 19:01:04', 2697),
('DoctrineMigrations\\Version20210117190357', '2021-01-17 19:04:07', 2776),
('DoctrineMigrations\\Version20210120172119', '2021-01-20 17:21:36', 1026),
('DoctrineMigrations\\Version20210120172942', '2021-01-20 17:30:09', 1809),
('DoctrineMigrations\\Version20210120212820', '2021-01-20 21:28:37', 1454),
('DoctrineMigrations\\Version20210120214135', '2021-01-20 21:41:55', 1788),
('DoctrineMigrations\\Version20210121231706', '2021-01-21 23:17:24', 748),
('DoctrineMigrations\\Version20210121233109', '2021-01-21 23:34:31', 1935),
('DoctrineMigrations\\Version20210121235039', '2021-01-21 23:50:52', 909),
('DoctrineMigrations\\Version20210122213537', '2021-01-22 21:35:48', 1511),
('DoctrineMigrations\\Version20210122213601', '2021-01-22 21:36:13', 956),
('DoctrineMigrations\\Version20210122220639', '2021-01-22 22:06:45', 1048),
('DoctrineMigrations\\Version20210122220657', '2021-01-22 22:07:03', 955);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dinscription_eleve` date DEFAULT NULL,
  `nom_eleve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_eleve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naissance_eleve` date DEFAULT NULL,
  `adresse_eleve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel1_eleve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel2_eleve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel3_eleve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_eleve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_connu_par_id` int(11) DEFAULT NULL,
  `cpville_id` int(11) DEFAULT NULL,
  `datecreation_eleve` date DEFAULT NULL,
  `information_eleve` longtext COLLATE utf8mb4_unicode_ci,
  `info_i_id` int(11) DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuteur_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `select_eleve` tinyint(1) NOT NULL,
  `email_eleve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel4_eleve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_ECA105F7A701A939` (`info_i_id`),
  UNIQUE KEY `UNIQ_ECA105F786EC68D8` (`tuteur_id`),
  UNIQUE KEY `UNIQ_ECA105F7F7173861` (`nom_connu_par_id`),
  UNIQUE KEY `UNIQ_ECA105F7A76ED395` (`user_id`),
  KEY `IDX_ECA105F7EBE4CB8F` (`cpville_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id`, `dinscription_eleve`, `nom_eleve`, `prenom_eleve`, `naissance_eleve`, `adresse_eleve`, `tel1_eleve`, `tel2_eleve`, `tel3_eleve`, `photo_eleve`, `nom_connu_par_id`, `cpville_id`, `datecreation_eleve`, `information_eleve`, `info_i_id`, `categorie`, `tuteur_id`, `user_id`, `select_eleve`, `email_eleve`, `tel4_eleve`) VALUES
(3, '2016-01-01', 'ITALIANO', 'Samuel', NULL, '17 rue de Strasbourg', NULL, NULL, NULL, 'OPE.jfif', NULL, 2, NULL, NULL, NULL, 'Piano', NULL, NULL, 0, NULL, NULL),
(6, '2021-01-01', 'INGALLS', 'Olivier', NULL, '45 rue Saint Antoine', '06.01.48.77.34', '0601487734', NULL, 'hel.jfif', NULL, NULL, NULL, NULL, NULL, 'Violoncelle', NULL, 6, 0, NULL, NULL),
(10, '2019-08-04', 'DOUDOU', 'Sylvain', NULL, '14 rue dou', '250156548', NULL, NULL, 'photos.jpg', NULL, NULL, NULL, 'Les infos sur doudou\r\nMkUXa3A7', 3, 'Saxophone', NULL, 24, 0, NULL, NULL),
(13, '2021-04-04', 'TOJR', 'Salu', NULL, '145 rue', '0145821587', NULL, NULL, 'ph.jpg', NULL, NULL, NULL, 'Les infos sur TOJR', 6, 'Saxophone', NULL, 29, 0, NULL, NULL),
(15, '2020-03-04', 'ITALIANO', 'Johana', NULL, '77 rue de Pimodan', '0148495598', NULL, NULL, 'chatjojo.jpg', NULL, NULL, NULL, 'Johanna chante très bien et en plus c\'est ma fille fille', NULL, 'Chant', NULL, 23, 0, NULL, NULL),
(16, '2020-01-01', 'MANETTE', 'Chantal', NULL, '77 Rue de Pimodan', '0601487734', NULL, NULL, 'gri.jpg', NULL, NULL, NULL, 'bonjour', 8, 'Piano', NULL, 3, 0, NULL, NULL),
(18, '2019-01-01', 'BOUM', 'Carooline', NULL, '14 rue dam', '0145825845', NULL, NULL, 'gri.jpg', NULL, NULL, NULL, 'essai encore et encore', 10, 'Guitare', NULL, 7, 1, NULL, NULL),
(23, '2020-01-01', 'MARTIN', 'Paul', NULL, '42 rue Pouetpouet', '0142158595', NULL, NULL, 'logo.png', NULL, NULL, NULL, 'Je suis Martin et j\'applaudis', 15, 'Guitare', NULL, 22, 0, NULL, NULL),
(28, '2016-01-01', 'FRELON', 'Manu', NULL, '14 rue dourne', '0213565859', NULL, NULL, 'adult-1867665_1280.jpg', NULL, NULL, NULL, 'relo', NULL, 'Batterie', 5, NULL, 0, 'mtchantal@aol.com', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `eleve_professeur`
--

DROP TABLE IF EXISTS `eleve_professeur`;
CREATE TABLE IF NOT EXISTS `eleve_professeur` (
  `eleve_id` int(11) NOT NULL,
  `professeur_id` int(11) NOT NULL,
  PRIMARY KEY (`eleve_id`,`professeur_id`),
  KEY `IDX_159FBDCBA6CC7B2` (`eleve_id`),
  KEY `IDX_159FBDCBBAB22EE9` (`professeur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleve_professeur`
--

INSERT INTO `eleve_professeur` (`eleve_id`, `professeur_id`) VALUES
(6, 1),
(13, 2),
(18, 2);

-- --------------------------------------------------------

--
-- Structure de la table `info_instrument`
--

DROP TABLE IF EXISTS `info_instrument`;
CREATE TABLE IF NOT EXISTS `info_instrument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `havemusic` tinyint(1) DEFAULT NULL,
  `whathavemusic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doinstrument` tinyint(1) DEFAULT NULL,
  `whatdoinstrument` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `haveinstrument` tinyint(1) DEFAULT NULL,
  `whathaveinstrument` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `info_instrument`
--

INSERT INTO `info_instrument` (`id`, `havemusic`, `whathavemusic`, `doinstrument`, `whatdoinstrument`, `haveinstrument`, `whathaveinstrument`) VALUES
(3, 1, NULL, 0, NULL, 1, NULL),
(6, 0, NULL, 1, NULL, 1, NULL),
(8, 1, NULL, 0, NULL, 0, NULL),
(10, 1, NULL, 0, NULL, 0, NULL),
(15, 0, NULL, 1, 'piano et violon', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_prof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_prof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_prof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_prof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_prof` longtext COLLATE utf8mb4_unicode_ci,
  `profession_prof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_prof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `select_prof` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_17A55299A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `titre_prof`, `nom_prof`, `prenom_prof`, `photo_prof`, `description_prof`, `profession_prof`, `email_prof`, `user_id`, `select_prof`) VALUES
(1, 'Mr', 'Italiano', 'Raphaël', 'raph.png', '<p>Dipl&ocirc;m&eacute; de la Yamaha Music Foundation, enseigne le piano depuis 1992 aux enfants, adolescents et adultes. Premier prix de piano au concours N&eacute;rini, &agrave; l&#39;Ecole Normale de Musique de Paris. Directeur de l&#39;&eacute;cole de musique la Scuola depuis 1999.</p>', 'piano', 'raphael.italiano@wanadoo.fr', 37, 0),
(2, 'Mr', 'Adel', NULL, 'belhaddad.jpg', '<p>Form&eacute; &agrave; l&rsquo;EPHEM Paris, en guitare, basse, chant et &eacute;criture musicale.<br />\r\nProfesseur ind&eacute;pendant sur l&rsquo;Ile de France.<br />\r\nMusicien polyvalent, il intervient depuis plus de 10 ans aupr&egrave;s des entreprises et des &eacute;coles<br />\r\n(Gemalto, Thales, Accor, Vinci Facilities, Acad&eacute;mie de Musique de Versailles),<br />\r\nen tant que professeur de guitare, basse, et chant.<br />\r\nAuteur, compositeur et r&eacute;alisateur pour divers artistes en France, Belgique, Suisse et Canada.</p>', 'Chant, guitare et basse', NULL, NULL, 0),
(3, 'Mr', 'Hemmo', 'Agathe', 'hemmo2.jpg', '<p>Agathe Hemmo est une artiste polyvalente qui &eacute;volue aussi bien dans le milieu classique que dans la world music. Elle se produit sur diff&eacute;rentes sc&egrave;nes internationales: La Philharmonie de Paris, Le Carnegie Hall, le Concertgebouw d&#39;Amsterdam, avec divers ensembles comme L&#39;Orchestre National de France aux Choregies d&#39;Orange, Rufus Rainwright et l&#39;ORAP au Festival d&#39;Avignon, le groupe Moriarty et l&#39;Ensemble Matheus, Wynton Marsalis et l&#39;Orchestre National du Capitole de Toulouse au festival &quot;Jazz un Marciac&quot; ainsi que Didier Lockwood et les Petites mains symphoniques.<br />\r\nElle est &eacute;galement compositrice de musique &agrave; l&#39;image.</p>', 'Eveil musical et de violon violoncelle, et violon alto', NULL, NULL, 0),
(4, 'Mr', 'Vaudron', 'Eric', 'vaudron.jpg', '<p>Il pratique la batterie depuis plus de 15 ans, en solo et dans diff&eacute;rents groupes musicaux.<br />\r\nL&rsquo;apprentissage du solf&egrave;ge et de la technique de la batterie s&rsquo;est d&eacute;roul&eacute; &agrave; l&rsquo;&eacute;cole municipale de musique de Roissy en France sous les commandes de Jean-Pierre Laguerre.<br />\r\nInfluenc&eacute; par tous les styles de musique (Rock, Rock Progressif, Rhythm and Blues, Funk, Reggae, Pop, Jazz &hellip;), il cherche toujours &agrave; parfaire ses connaissances.<br />\r\nIl a jou&eacute; dans des lieux embl&eacute;matiques tels que le th&eacute;&acirc;tre Marigny et s&rsquo;est produit sur la sc&egrave;ne de l&rsquo;auditorium de Bruxelles.<br />\r\nNouveau professeur de Batterie &agrave; la SCUOLA &agrave; Aulnay-sous-Bois, il vous fera travailler avec s&eacute;rieux et souplesse les fondamentaux tel que le solf&egrave;ge, les rudiments de la caisse claire, l&rsquo;ind&eacute;pendance et le d&eacute;veloppement de la musicalit&eacute; avec une mise en application de l&rsquo;enseignement fourni sur des morceaux choisis par l&rsquo;&eacute;l&egrave;ve.<br />\r\nLa musique est un moyen de communication, de partage et d&rsquo;ouverture d&rsquo;esprit !<br />\r\nN&lsquo;h&eacute;sitez plus ! Venez pratiquer un instrument complet</p>', 'batterie', NULL, NULL, 0),
(5, 'Mr', 'Luspinsky', 'Mathias', 'luspinsky.jpg', '<p>Il a accompagn&eacute; en jazz Wayne Dockerry, Stephane Guerry; jou&eacute; avec Jerry Edwards, Tom Mc Clung, Fran&ccedil;ois Chassagnite, Michel Perrez...<br />\r\nEn blues, Arthur Adams, Eddie Campbell, Big Jay Mc Nelly etc...<br />\r\nEn rock, Dick Rivers, Oli le Baron...<br />\r\nFORMATION - DIPL&Ocirc;ME :<br />\r\n1995-1998 : Formation JAZZ &agrave; l&#39;&eacute;cole de musique ARPEJ<br />\r\n1994 : Formation Musicale &agrave; l&#39;&eacute;cole AMERICAN SCHOOL OF MODERN MUSIC.</p>', 'Saxophone et flûte traversière', NULL, NULL, 0),
(6, 'Mr', 'Rozand', 'Laurent', 'rozand.jpg', '<p>Formation de technicien d&#39;exploitation des &eacute;quipements audio-professionnels au studio<br />\r\nRecorder du Pr&eacute;-Saint-Gervais en 1998.<br />\r\nFormation d&#39;assistant son/Ing&eacute;nieur du son au studio d&#39;enregitrement pro Harry Son &agrave; Pantin en 2000.<br />\r\nTechnicien audiovisuel dans l&#39;&eacute;v&egrave;nementiel pendant 5 ans.<br />\r\nPrise de son, enregistrement, mixage home studio.<br />\r\nAuteur/compositeur/interpr&egrave;te.<br />\r\nCollaboration avec l&#39;&eacute;cole de musique LA SCUOLA depuis 10 ans pour la mise en place des concerts de l&#39;&eacute;cole,<br />\r\nainsi que les r&eacute;p&eacute;titions et les enregistrements</p>', 'Ingénieur du son', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fichier_slide` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slides`
--

INSERT INTO `slides` (`id`, `fichier_slide`) VALUES
(7, 'slide1.jpg'),
(8, 'slide2.jpg'),
(9, 'slide3.jpg'),
(98, 'slide5.jpg'),
(99, 'slide4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tuteur`
--

DROP TABLE IF EXISTS `tuteur`;
CREATE TABLE IF NOT EXISTS `tuteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom_tuteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_tuteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_tuteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel1_tuteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel2_tuteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tuteur`
--

INSERT INTO `tuteur` (`id`, `prenom_tuteur`, `nom_tuteur`, `adresse_tuteur`, `tel1_tuteur`, `tel2_tuteur`) VALUES
(5, 'Clément', 'bolo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `roles`, `password`, `username`) VALUES
(3, '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$Q1RmUjBUcWVQWDVaYkJaYQ$Z6aQgwFD1YW8e+yARWHTS55pjS9O4XgV6B54DHKn6nc', 'itacha'),
(6, '[\"ROLE_USER\"]', 'GMeebSih', 'ingallslogin'),
(7, '[\"ROLE_USER\"]', 'O19bPv1R', 'bn@gmail.com'),
(13, '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$Rll5Ylg4VS5BVWtCQXgxcw$jjINN5LLh8rdStoq5B9mrHAFKi1OLn5Zy2nnfsU4X5g', 'prof49'),
(15, '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$VTJ1emN2UXRBQzZkZ2xLRg$2aMjnGYKJext/P7Wv1WSR6MA78wY3zMlMCX7yIiNRGw', 'itachan77@orange.fr'),
(22, '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$aWZsV25KblhCQ1d1Q1BsNw$JUlwJZpn+6JJMhCyvyduFJbitt8mMYwwkyc/5n5oloo', 'martinpaul@gmail.com'),
(23, '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$Vi9Bd1VqSTg5RVBEdHJnSw$rDq6MZ4nFyR882CF+1svnaxL6cXPoW49n1VOtrlA9rs', 'nana@gmail.com'),
(24, '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$Lk5ybUlZQ09JWWZrUTFhTw$a34bP94xlHakOkaYAv1nsKmC0zcCpGJgq16DUGNMseg', 'doudo@gmail.com'),
(29, '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$RnhJd3c4WlpUeURvRlRXUw$V1OGjx9jrBKMz7I2TM+ICYNJsqyp1P5PxScZME9IbP0', 'toto@gmail.com'),
(30, '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$cmZabUFHYXFScG9OaXAyVw$8VahfbMc9wNmTr3LqTG7jumgrorLS0+6MszRHJhbm+c', 'itachan@orange.fr'),
(36, '[\"ROLE_USER\", \"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$QXRoWUQzdUJrVENHVG4ucA$5QseyuiaGPQAr9tJtyYUNn2HRQ29+xBNMwuopniDuVY', 'moimoi'),
(37, '[\"ROLE_TEACHER\"]', '$argon2id$v=19$m=65536,t=4,p=1$c1hrYzFzY25tUU94dDN2ZQ$r0L4S9lxOsIcicBogo7+wwcWEXdYBuCuDqTJcyNm/gk', 'itachan2701@gmail.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorie_professeur`
--
ALTER TABLE `categorie_professeur`
  ADD CONSTRAINT `FK_896C9835BAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_896C9835BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `FK_ECA105F786EC68D8` FOREIGN KEY (`tuteur_id`) REFERENCES `tuteur` (`id`),
  ADD CONSTRAINT `FK_ECA105F7A701A939` FOREIGN KEY (`info_i_id`) REFERENCES `info_instrument` (`id`),
  ADD CONSTRAINT `FK_ECA105F7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_ECA105F7EBE4CB8F` FOREIGN KEY (`cpville_id`) REFERENCES `cpville` (`id`),
  ADD CONSTRAINT `FK_ECA105F7F7173861` FOREIGN KEY (`nom_connu_par_id`) REFERENCES `connu_par` (`id`);

--
-- Contraintes pour la table `eleve_professeur`
--
ALTER TABLE `eleve_professeur`
  ADD CONSTRAINT `FK_159FBDCBA6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleve` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_159FBDCBBAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `FK_17A55299A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

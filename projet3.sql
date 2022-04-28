-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `acteurs`;
CREATE TABLE `acteurs` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `acteur` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `acteurs` (`id_acteur`, `acteur`, `description`, `logo`) VALUES
(1,	'Formation&co',	'Formation&co est une association française présente sur tout le territoire.\r\nNous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.<br/><br/>\r\nNotre proposition :<br/>\r\n\r\nun financement jusqu’à 30 000€ ;<br/>\r\nun suivi personnalisé et gratuit ;<br/>\r\nune lutte acharnée contre les freins sociétaux et les stéréotypes.<br/><br/>\r\n\r\nLe financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . <br/>\r\nNous collaborons avec des personnes talentueuses et motivées.<br/>\r\nVous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! \r\nNos financements s’adressent à tous.',	'img/formation_co.png'),
(2,	'Protectpeople',	'Protectpeople finance la solidarité nationale.\r\nNous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.<br/><br/>\r\n\r\nChez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.<br/>\r\nProectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.<br/>\r\nNous garantissons un accès aux soins et une retraite.<br/><br/>\r\nChaque année, nous collectons et répartissons 300 milliards d’euros.<br/><br/>\r\nNotre mission est double :<br/>\r\nsociale : nous garantissons la fiabilité des données sociales ;<br/>\r\néconomique : nous apportons une contribution aux activités économiques.',	'img/protectpeople.png'),
(3,	'DSA France',	'Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.<br/>\r\nNous accompagnons les entreprises dans les étapes clés de leur évolution.<br/><br/>\r\nNotre philosophie : s’adapter à chaque entreprise.<br/><br/>\r\nNous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises.',	'img/Dsa_france.png'),
(4,	'CDE',	'La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation.\r\nSon président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.',	'img/CDE.png');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `acteur_id` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `comment_user` (`user_id`),
  CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id_comment`, `user_id`, `acteur_id`, `date_add`, `comment`) VALUES
(26,	2,	1,	'2020-04-26',	'Commentaire test Formation&amp;co'),
(27,	2,	2,	'2020-04-26',	'Commentaire test Protectpeople'),
(28,	2,	3,	'2020-04-26',	'Commentaire test DSA'),
(29,	2,	4,	'2020-04-26',	'Commentaire test CDE'),
(30,	8,	1,	'2022-04-26',	'C\'est pas mal'),
(31,	8,	2,	'2022-04-26',	'bonjour ça va');

DROP TABLE IF EXISTS `dislikes`;
CREATE TABLE `dislikes` (
  `id_dislike` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `acteur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_dislike`),
  KEY `dislike_acteur` (`acteur_id`),
  KEY `dislike_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `dislikes` (`id_dislike`, `user_id`, `acteur_id`) VALUES
(37,	2,	1),
(42,	8,	1);

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `acteur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_like`),
  KEY `like_acteur` (`acteur_id`),
  KEY `like_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `likes` (`id_like`, `user_id`, `acteur_id`) VALUES
(59,	2,	3),
(64,	8,	2),
(66,	8,	3);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `question_secrete` varchar(255) NOT NULL,
  `reponse_secrete` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `username`, `password`, `question_secrete`, `reponse_secrete`) VALUES
(2,	'Drouin',	'Denis',	'denis',	'$2y$10$GeftPox11rf2hJnVCtR9kejIa1Zdefo/EG95hU5lYN5A.kecEgC52',	'choix2',	'GriGri'),
(8,	'Duke',	'denis',	'duke',	'$2y$10$re9uvi.I2ZabHPbNtmWFROSU4IinBLaj/SUOO3ywC.z4XWPztJt9.',	'choix2',	'kake');

-- 2022-04-28 19:33:27

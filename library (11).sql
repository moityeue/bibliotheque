-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 18 sep. 2022 à 14:02
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `password`) VALUES
(1, 'lwa', 'bibli'),
(2, 'alou', 'ouou');

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT,
  `name_author` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id_author`, `name_author`, `nationality`) VALUES
(1, 'Antoine', 'France'),
(2, 'Pierre Boulle', 'France'),
(3, 'Le vrai écrivain', 'grec'),
(4, 'Albert le ouf', 'chinois'),
(5, 'Paul ', 'Suede');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `publication_date` date NOT NULL,
  `cover` varchar(250) NOT NULL,
  `isbn_number` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `copy_number` int(11) NOT NULL,
  `id_publisher` int(11) NOT NULL,
  `location` varchar(250) NOT NULL,
  `id_language` int(11) NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id_book`, `title`, `id_author`, `id_category`, `publication_date`, `cover`, `isbn_number`, `description`, `copy_number`, `id_publisher`, `location`, `id_language`) VALUES
(2, 'Les branc', 0, 0, '2022-06-10', 'test.jpeg', 11111, 'triste', 3, 2, 'a24', 2),
(3, 'DarkVa', 5, 3, '2022-06-05', 'test.jpeg', 22222, 'Romance', 3, 2, 'a25', 1),
(5, 'A demain', 2, 3, '2022-06-05', 'test.jpeg', 44444, 'comique', 3, 2, 'a27', 1),
(6, 'Mal ', 3, 1, '2022-06-05', 'test.jpeg', 33333, 'Drame', 3, 2, 'a28', 2),
(8, 'Les maths ', 2, 1, '2022-01-03', 'test.jpeg', 55555, 'Enfant', 2, 2, 'A29bB', 1),
(9, 'Que sera demain', 1, 1, '2022-01-03', 'test.jpeg', 66666, 'Triste', 3, 1, 'b17', 1),
(10, 'Les nuits foles', 1, 1, '2022-01-03', 'test.jpeg', 77777, 'Histoire vraie', 1, 2, 'B26D', 2),
(4, 'Adieu', 2, 2, '2022-01-03', 'test.jpeg', 88888, 'Comédie ', 3, 2, 'A15 ', 2),
(1, 'La vie des oufs', 5, 3, '2022-01-03', 'test.jpeg', 99999, 'Joyeux', 2, 2, 'C29D ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `start_day` datetime NOT NULL,
  `end_day` date NOT NULL,
  `lenght` int(11) NOT NULL,
  `booking_number` int(11) NOT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user`, `id_book`, `start_day`, `end_day`, `lenght`, `booking_number`) VALUES
(1, 1, 1, '2022-03-17 15:00:00', '2022-03-19', 1, 12345),
(2, 2, 2, '2022-07-29 18:20:00', '2022-08-02', 1, 1234),
(3, 3, 3, '2022-04-10 20:46:00', '2022-04-20', 1, 3456);

-- --------------------------------------------------------

--
-- Structure de la table `booking_infos`
--

DROP TABLE IF EXISTS `booking_infos`;
CREATE TABLE IF NOT EXISTS `booking_infos` (
  `id_booking_infos` int(11) NOT NULL AUTO_INCREMENT,
  `id_booking` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_booking_infos`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `booking_infos`
--

INSERT INTO `booking_infos` (`id_booking_infos`, `id_booking`, `date`) VALUES
(1, 1, '2022-06-20'),
(3, 3, '2022-04-25'),
(2, 4, '2022-06-20');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(255) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Action'),
(2, 'Science fiction'),
(3, 'Drame');

-- --------------------------------------------------------

--
-- Structure de la table `copy`
--

DROP TABLE IF EXISTS `copy`;
CREATE TABLE IF NOT EXISTS `copy` (
  `id_copy` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) NOT NULL,
  `condition` varchar(255) NOT NULL,
  `id_language` varchar(255) NOT NULL,
  PRIMARY KEY (`id_copy`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `copy`
--

INSERT INTO `copy` (`id_copy`, `id_book`, `condition`, `id_language`) VALUES
(2, 2, 'Mauvais état', '3'),
(3, 3, 'Bon état', '4');

-- --------------------------------------------------------

--
-- Structure de la table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(40) NOT NULL,
  PRIMARY KEY (`id_language`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `language`
--

INSERT INTO `language` (`id_language`, `language`) VALUES
(1, 'spanish'),
(2, 'English'),
(3, 'Latin'),
(4, 'Créole');

-- --------------------------------------------------------

--
-- Structure de la table `pre_resa`
--

DROP TABLE IF EXISTS `pre_resa`;
CREATE TABLE IF NOT EXISTS `pre_resa` (
  `id_preresa` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `statut` varchar(250) NOT NULL,
  `id_copy` int(11) NOT NULL,
  PRIMARY KEY (`id_preresa`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pre_resa`
--

INSERT INTO `pre_resa` (`id_preresa`, `id_book`, `date`, `id_user`, `statut`, `id_copy`) VALUES
(1, 2, '2022-07-30', 2, 'en cours', 4),
(2, 4, '2022-04-25', 1, 'en cours', 2),
(3, 1, '2022-05-18', 1, 'en cours', 1),
(4, 4, '2022-05-18', 2, 'valide\r\n', 3),
(5, 5, '2022-05-20', 1, 'en cours\r\n', 3),
(6, 3, '2022-07-14', 2, 'valide\r\n', 1),
(7, 2, '2022-07-25', 1, 'en cours', 4),
(9, 2, '2022-05-08', 3, 'en cours', 1),
(10, 2, '2022-05-08', 3, 'en cours', 1);

-- --------------------------------------------------------

--
-- Structure de la table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE IF NOT EXISTS `publisher` (
  `id_publisher` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_publisher`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publisher`
--

INSERT INTO `publisher` (`id_publisher`, `name`) VALUES
(1, 'Galimard'),
(2, 'Flamarion');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `user_number` int(11) NOT NULL,
  `id_preresa` int(11) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tel` varchar(250) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `password`, `mail`, `user_number`, `id_preresa`, `date_inscription`, `tel`) VALUES
(1, 'Albert', 'baba', 'auto', 'auto@gmail.com', 1111, 1, '2022-05-05 20:23:52', '06-25-24-75-65'),
(3, 'Al', 'Moi', 'vue', 'online@forma', 1112, 3, '2022-08-20 00:00:00', '06-60-78-21-34'),
(2, 'boo', 'bahou', 'pirou', 'moi@gmail.com', 1113, 2, '2022-04-08 00:00:00', '06-80-47-17-20'),
(5, 'Loro', 'LoRan', 'dou', 'ay@mail', 1114, 4, '2022-07-30 00:00:00', '07-84-97-31-25'),
(6, 'lala', 'Tutute', 'Lavida', 'lavida@taf', 1115, 5, '2022-03-24 00:00:00', '06-99-41-72-31');

-- --------------------------------------------------------

--
-- Structure de la table `user_portfolio`
--

DROP TABLE IF EXISTS `user_portfolio`;
CREATE TABLE IF NOT EXISTS `user_portfolio` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `sujet` text NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

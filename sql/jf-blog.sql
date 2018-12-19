-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 14 déc. 2018 à 13:18
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jf-blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `level`, `username`, `password`, `creation_date`) VALUES
(1, 2, 'Admin', '$2y$10$yIYF7sGPYhvW2nN8JYHpqOhkSwYYmdXqNGUPIHrbFDgodk4wz2.Am', '2018-12-04'),
(2, 1, 'visitor', '$2y$10$QMoeqIb6qtWfMm4TaXMDp.2P5EUaViTKQ/eMVXHTml7KmgxzUEk2u', '2018-12-06');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `episode_id` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `report` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_posts_id` (`episode_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='All comments';

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, pseudo, `episode_id`, `creation_date`, `report`) VALUES
(4, 'Ange, le site est en construction ...', 'Manon', 2, '2018-11-27', 0),
(2, 'Pas mal, mais ça manque de contenu, non ?', 'Guillaume', 3, '2018-11-27', 0),
(5, 'Ouai, mais ne t\'inquiète pas, ça arrive.', 'Julien', 3, '2018-11-27', 0),
(1, 'Rien compris !', 'Ange', 2, '2018-11-27', 0),
(6, 'Hum, ont a le temps ...', 'Hugo', 3, '2018-11-27', 0),
(7, 'Génial !', 'Lucas', 1, '2018-12-06', 0),
(3, 'Cela donne envie de lire la suite.', 'Hugo', 1, '2018-12-13', 0);

-- --------------------------------------------------------

--
-- Structure de la table `episodes`
--

DROP TABLE IF EXISTS `episodes`;
CREATE TABLE IF NOT EXISTS `episodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `publication_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `episodes`
--

INSERT INTO `episodes` (`id`, `title`, `content`, `publication_date`) VALUES
(1, 'Début du voyage', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id metus rhoncus, ullamcorper eros vel, gravida neque. Proin sit amet pellentesque dolor. Sed efficitur quam et nibh suscipit, nec mollis dolor lobortis. Etiam ultrices nulla at ligula rhoncus commodo. Pellentesque orci urna, vulputate at tristique vitae, sollicitudin eu lectus. Nulla vehicula ipsum quam, in convallis eros semper quis. Phasellus commodo ultrices purus ac gravida. Sed sed nunc sem. Maecenas sit amet turpis quis nisl elementum pharetra condimentum malesuada lorem. Ut libero ipsum, mattis vitae metus ut, ultrices rhoncus dolor. Morbi at vestibulum urna. Morbi consequat vel tortor id auctor. Quisque fermentum quam eu leo condimentum, vitae facilisis orci scelerisque. Donec et lectus tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras molestie sem enim, vitae viverra sem lobortis a. Suspendisse lobortis aliquet odio id rutrum. Morbi eu nisi at libero ultricies elementum. Donec feugiat magna non risus sollicitudin, a fermentum diam rutrum. Duis eget turpis id urna sodales semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus porta condimentum velit eu commodo. Integer dignissim sodales dictum. Suspendisse libero libero, hendrerit sit amet metus in, efficitur aliquam sem. Ut pellentesque fringilla sem, ut pretium sem suscipit at. Vestibulum at posuere dolor. Suspendisse potenti. Phasellus eu tellus pulvinar tellus vehicula hendrerit. Mauris nec suscipit neque. Etiam et mi tincidunt, dictum nibh eget, dictum felis. Aliquam erat volutpat. Sed fermentum quis purus sed commodo. Vestibulum varius et arcu eu molestie. Mauris sit amet sem vitae erat auctor finibus vel eget magna. Sed luctus, metus sed feugiat sagittis, erat nisi tempor est, quis dapibus urna risus sed nulla. Aenean sed suscipit justo, sit amet bibendum purus. Aliquam luctus sed ante non vehicula. Curabitur molestie mi et feugiat elementum. Suspendisse mollis augue eget risus eleifend ultricies.</p>', '2018-12-04'),
(2, 'Arriver', '<p style=\"text-align: justify;\">Quisque fermentum quam eu leo condimentum, vitae facilisis orci scelerisque. Donec et lectus tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras molestie sem enim, vitae viverra sem lobortis a. Suspendisse lobortis aliquet odio id rutrum. Morbi eu nisi at libero ultricies elementum. Donec feugiat magna non risus sollicitudin, a fermentum diam rutrum. Duis eget turpis id urna sodales semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus porta condimentum velit eu commodo. Integer dignissim sodales dictum. Suspendisse libero libero, hendrerit sit amet metus in, efficitur aliquam sem. Ut pellentesque fringilla sem, ut pretium sem suscipit at. Vestibulum at posuere dolor. Suspendisse potenti. Phasellus eu tellus pulvinar tellus vehicula hendrerit. Mauris nec suscipit neque. Etiam et mi tincidunt, dictum nibh eget, dictum felis. Aliquam erat volutpat. Sed fermentum quis purus sed commodo. Vestibulum varius et arcu eu molestie. Mauris sit amet sem vitae erat auctor finibus vel eget magna. Sed luctus, metus sed feugiat sagittis, erat nisi tempor est, quis dapibus urna risus sed nulla. Aenean sed suscipit justo, sit amet bibendum purus. Aliquam luctus sed ante non vehicula. Curabitur molestie mi et feugiat elementum. Suspendisse mollis augue eget risus eleifend ultricies. Proin dignissim ullamcorper turpis, sit amet rhoncus nibh viverra sit amet. Curabitur vitae ipsum eget dolor viverra pulvinar id sit amet justo. Cras vel orci a est rutrum placerat eu eu eros. Aliquam sit amet elementum turpis, sit amet accumsan purus. Nunc consectetur tempor leo nec rutrum. Proin quis dapibus quam. Quisque ac sem at risus euismod hendrerit non at libero. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc mi dolor, suscipit accumsan felis sit amet, fringilla volutpat massa. Nulla dignissim sapien eu sapien gravida, quis vestibulum nibh venenatis. Sed urna ipsum, blandit quis nunc in, convallis scelerisque dolor. Quisque nulla ligula, pulvinar non augue eget, pretium tristique metus. Cras congue pharetra lacus a varius.</p>', '2018-12-06'),
(3, 'Repos', '<p style=\"text-align: justify;\">Vitae facilisis orci scelerisque. Donec et lectus tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras molestie sem enim, vitae viverra sem lobortis a. Suspendisse lobortis aliquet odio id rutrum. Morbi eu nisi at libero ultricies elementum. Donec feugiat magna non risus sollicitudin, a fermentum diam rutrum. Duis eget turpis id urna sodales semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus porta condimentum velit eu commodo. Integer dignissim sodales dictum. Suspendisse libero libero, hendrerit sit amet metus in, efficitur aliquam sem. Ut pellentesque fringilla sem, ut pretium sem suscipit at. Vestibulum at posuere dolor. Suspendisse potenti. Phasellus eu tellus pulvinar tellus vehicula hendrerit. Mauris nec suscipit neque. Etiam et mi tincidunt, dictum nibh eget, dictum felis. Aliquam erat volutpat. Sed fermentum quis purus sed commodo. Vestibulum varius et arcu eu molestie. Mauris sit amet sem vitae erat auctor finibus vel eget magna. Sed luctus, metus sed feugiat sagittis, erat nisi tempor est, quis dapibus urna risus sed nulla. Aenean sed suscipit justo, sit amet bibendum purus. Aliquam luctus sed ante non vehicula. Curabitur molestie mi et feugiat elementum. Suspendisse mollis augue eget risus eleifend ultricies. Proin dignissim ullamcorper turpis, sit amet rhoncus nibh viverra sit amet. Curabitur vitae ipsum eget dolor viverra pulvinar id sit amet justo. Cras vel orci a est rutrum placerat eu eu eros. Aliquam sit amet elementum turpis, sit amet accumsan purus. Nunc consectetur tempor leo nec rutrum. Proin quis dapibus quam. Quisque ac sem at risus euismod hendrerit non at libero. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc mi dolor, suscipit accumsan felis sit amet, fringilla volutpat massa. Nulla dignissim sapien eu sapien gravida, quis vestibulum nibh venenatis. Sed urna ipsum, blandit quis nunc in, convallis scelerisque dolor. Quisque nulla ligula, pulvinar non augue eget, pretium tristique metus. Cras congue pharetra lacus a varius.</p>', '2018-12-10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

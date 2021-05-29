-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2021 at 12:35 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbanimaux`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `animal_id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_nom` varchar(250) NOT NULL,
  `animal_description` text NOT NULL,
  `animal_image` varchar(250) NOT NULL,
  `famille_id` int(11) NOT NULL,
  PRIMARY KEY (`animal_id`),
  KEY `FK_ANIMAL_FAMILLE` (`famille_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `animal_nom`, `animal_description`, `animal_image`, `famille_id`) VALUES
(1, 'Chien', 'Un animal domestique', 'chien.png', 1),
(2, 'Cochon', 'Un animal de la ferme', 'cochon.png', 1),
(3, 'Serpent', 'Un animal dangereux', 'serpent.png', 2),
(4, 'Crocodile', 'Un animal très dangereux', 'croco.png', 2),
(5, 'Requin', 'Un animal marin très dangereux', 'requin.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `animal_continent`
--

DROP TABLE IF EXISTS `animal_continent`;
CREATE TABLE IF NOT EXISTS `animal_continent` (
  `animal_id` int(11) NOT NULL,
  `continent_id` int(11) NOT NULL,
  PRIMARY KEY (`animal_id`,`continent_id`),
  KEY `FK_CONTINENT_ANIMAL_CONTINENT` (`continent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal_continent`
--

INSERT INTO `animal_continent` (`animal_id`, `continent_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(5, 2),
(1, 3),
(3, 3),
(4, 3),
(1, 4),
(3, 4),
(4, 4),
(1, 5),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

DROP TABLE IF EXISTS `continent`;
CREATE TABLE IF NOT EXISTS `continent` (
  `continent_id` int(11) NOT NULL AUTO_INCREMENT,
  `continent_libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`continent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`continent_id`, `continent_libelle`) VALUES
(1, 'Europe'),
(2, 'Asie'),
(3, 'Afrique'),
(4, 'Océanie'),
(5, 'Amérique');

-- --------------------------------------------------------

--
-- Table structure for table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `famille_id` int(11) NOT NULL AUTO_INCREMENT,
  `famille_libelle` varchar(250) NOT NULL,
  `famille_description` text NOT NULL,
  PRIMARY KEY (`famille_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `famille`
--

INSERT INTO `famille` (`famille_id`, `famille_libelle`, `famille_description`) VALUES
(1, 'mammifères', 'Animaux vertébrés nourrissant leurs petits avec du lait'),
(2, 'reptiles', 'animaux vertébrés qui rampent'),
(3, 'poissons', 'Animaux invertébrés du monde aquatique');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `visible_password`, `adresse`, `phone`, `bio`, `is_admin`, `created_at`, `updated_at`) VALUES
(9, 'abdellatif tijani', 'tijani.idrissi.abdellatif@gmail.com', '1cb64da6847b80cb1e0a76506dc05965', '23061988', 'bettana avenue sakia el hamra imm benaghmouch N4 salé ', '0677734199', 'Coach and developer', 1, NULL, NULL),
(10, 'hamza el ghandour', 'hamza@hamza.ma', '1cb64da6847b80cb1e0a76506dc05965', '23061988', 'youssoufia', '067777778', 'Web developer Student', 0, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `FK_ANIMAL_FAMILLE` FOREIGN KEY (`famille_id`) REFERENCES `famille` (`famille_id`);

--
-- Constraints for table `animal_continent`
--
ALTER TABLE `animal_continent`
  ADD CONSTRAINT `FK_ANIMAL_ANIMAL_CONTINENT` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`),
  ADD CONSTRAINT `FK_CONTINENT_ANIMAL_CONTINENT` FOREIGN KEY (`continent_id`) REFERENCES `continent` (`continent_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

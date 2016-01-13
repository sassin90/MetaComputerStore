-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2013 at 08:39 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prdone`
--

-- --------------------------------------------------------

--
-- Table structure for table `achats`
--

CREATE TABLE IF NOT EXISTS `achats` (
  `IDACHAT` int(11) NOT NULL AUTO_INCREMENT,
  `IDPRODUIT` int(11) NOT NULL,
  `IDCLIENT` int(11) NOT NULL,
  `PRIXX` int(11) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `TYPEPAIE` text,
  `REF` text,
  `VALID` int(11) DEFAULT NULL,
  `IP` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`IDACHAT`),
  KEY `FK_DEMANDE` (`IDPRODUIT`),
  KEY `FK_DEMANDE1` (`IDCLIENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `achats`
--

INSERT INTO `achats` (`IDACHAT`, `IDPRODUIT`, `IDCLIENT`, `PRIXX`, `DATE`, `TYPEPAIE`, `REF`, `VALID`, `IP`) VALUES
(1, 1, 1, 1450, '2012-09-10', 'carte', '27857', 1, '127'),
(2, 6, 1, 2899, '2012-09-10', 'carte', '27857', 0, '127'),
(3, 7, 1, 1899, '2012-09-10', 'carte', '27857', 1, '127'),
(4, 1, 2, 1450, '2012-09-10', 'carte', '', 1, '127'),
(5, 6, 2, 2899, '2012-09-10', 'carte', '', 1, '127'),
(6, 1, 3, 1450, '2012-09-11', 'banque', '45786', 1, '127.0.0.1'),
(7, 5, 3, 3449, '2012-09-11', 'banque', '45786', 0, '127.0.0.1'),
(8, 2, 1, 1890, '2012-09-11', 'banque', 'eret', 1, '127.0.0.1'),
(9, 5, 1, 3449, '2012-09-11', 'banque', 'eret', 1, '127.0.0.1'),
(10, 6, 1, 2899, '2012-09-11', 'banque', 'eret', 1, '127.0.0.1'),
(11, 7, 1, 1899, '2012-09-11', 'banque', 'eret', 0, '127.0.0.1'),
(12, 2, 1, 1890, '2012-09-11', 'banque', 'eret', 0, '127.0.0.1'),
(13, 5, 1, 3449, '2012-09-11', 'banque', 'eret', 1, '127.0.0.1'),
(14, 6, 1, 2899, '2012-09-11', 'banque', 'eret', 1, '127.0.0.1'),
(15, 7, 1, 1899, '2012-09-11', 'banque', 'eret', 1, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `pseudo`, `Mot_de_passe`) VALUES
(1, 'meta', 'ensa');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `IDCLIENT` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` char(255) NOT NULL,
  `ADRESSE` text NOT NULL,
  `EMAIL` text,
  `PASSWORD` text NOT NULL,
  `TEL` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDCLIENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`IDCLIENT`, `NOM`, `ADRESSE`, `EMAIL`, `PASSWORD`, `TEL`) VALUES
(1, 'metacomp', '', 'aez@ghg.kl', 'ensa', 0),
(2, 'zae', '', 'aezze@ghg.kl', 'zaeze', 0),
(3, 'amin', '', 'aminn@hot.com', 'ensaa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `IDPRODUIT` int(11) NOT NULL,
  `NOMP` char(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `PRIX` int(11) NOT NULL,
  `IMAGE` text,
  `VALIDE` int(11) DEFAULT NULL,
  `EMPLACEMENT` char(255) DEFAULT NULL,
  PRIMARY KEY (`IDPRODUIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`IDPRODUIT`, `NOMP`, `DESCRIPTION`, `PRIX`, `IMAGE`, `VALIDE`, `EMPLACEMENT`) VALUES
(1, 'AL HAKIM', 'Gestion de cabinets de Medecins', 1450, NULL, 1, 'tetouan'),
(2, 'AL YASSIR', 'Logiciel de Gestion', 1890, NULL, 1, 'tetouan'),
(3, 'Al HASSIB', 'Logiciel de Comptabilite generale', 2100, NULL, 1, 'tetouan'),
(4, 'AL ADAE', 'Gestion de Paye et de Personnels', 1999, NULL, 1, 'tetouan'),
(5, 'ASSAYDALANI', 'Gestion de Pharmaceutique\r\n', 3449, NULL, 1, 'tetouan'),
(6, 'MODABBIR', 'Gestion Commerciale', 2899, NULL, 1, 'tetouan'),
(7, 'MODABBIR', 'Gestion des ecoles', 1899, NULL, 1, 'tetouan'),
(8, 'SAFARI', 'Pour les compagne de voyage, autocars', 2799, NULL, 1, 'tetouan');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achats`
--
ALTER TABLE `achats`
  ADD CONSTRAINT `FK_DEMANDE` FOREIGN KEY (`IDPRODUIT`) REFERENCES `produit` (`IDPRODUIT`),
  ADD CONSTRAINT `FK_DEMANDE1` FOREIGN KEY (`IDCLIENT`) REFERENCES `client` (`IDCLIENT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

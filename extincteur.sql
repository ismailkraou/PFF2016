-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2016 at 10:21 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `extincteur`
--
CREATE DATABASE IF NOT EXISTS `extincteur` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `extincteur`;

-- --------------------------------------------------------

--
-- Table structure for table `boncmd`
--

CREATE TABLE IF NOT EXISTS `boncmd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(12) NOT NULL,
  `idCl` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `boncmd`
--

INSERT INTO `boncmd` (`id`, `date`, `idCl`, `Total`) VALUES
(1, '01/20/2016', 10, 400);

-- --------------------------------------------------------

--
-- Table structure for table `bonlivraison`
--

CREATE TABLE IF NOT EXISTS `bonlivraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(12) NOT NULL,
  `idCl` int(11) NOT NULL,
  `Total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `tel` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `tel`) VALUES
(6, 'zakariae', '0545698765'),
(8, 'zackariae', '165451685300'),
(9, 'omar', '0617101188'),
(10, 'hicham', '0675489632'),
(11, 'soufiane', '0514123698'),
(13, 'kamar', '0645164878'),
(15, 'maha', '0661616292'),
(17, 'qsdsq', '06451648495'),
(18, 'bouabid Home', '0535323164'),
(19, 'zicko zack', '0645168798'),
(20, 'imane lwila', '0612234556'),
(21, 'ismail jemi', '0615498656'),
(22, '', '004');

-- --------------------------------------------------------

--
-- Table structure for table `detail_boncmd`
--

CREATE TABLE IF NOT EXISTS `detail_boncmd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NumBonCmd` int(11) NOT NULL,
  `Id_Prod` int(11) NOT NULL,
  `Qte` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `etat` int(11) NOT NULL,
  `type` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `detail_boncmd`
--

INSERT INTO `detail_boncmd` (`id`, `NumBonCmd`, `Id_Prod`, `Qte`, `prix`, `etat`, `type`) VALUES
(1, 1, 4, 1, '400', 1, 'Entretien');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bonlivraison`
--

CREATE TABLE IF NOT EXISTS `detail_bonlivraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NumBonLivraison` int(11) NOT NULL,
  `Id_Prod` int(11) NOT NULL,
  `Qte` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `etat` int(11) NOT NULL,
  `type` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `detail_bonlivraison`
--

INSERT INTO `detail_bonlivraison` (`id`, `NumBonLivraison`, `Id_Prod`, `Qte`, `prix`, `etat`, `type`) VALUES
(2, 1, 3, 1, '80', 1, 'Entretien');

-- --------------------------------------------------------

--
-- Table structure for table `detail_cmd`
--

CREATE TABLE IF NOT EXISTS `detail_cmd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NumF` int(11) NOT NULL,
  `Id_Prod` int(11) NOT NULL,
  `Qte` int(11) NOT NULL,
  `prix` float NOT NULL,
  `etat` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `detail_cmd`
--

INSERT INTO `detail_cmd` (`id`, `NumF`, `Id_Prod`, `Qte`, `prix`, `etat`, `type`) VALUES
(1, 9, 1, 15, 0, 1, ''),
(2, 9, 1, 15, 0, 1, ''),
(3, 9, 1, 15, 0, 1, ''),
(5, 9, 3, 25, 0, 1, ''),
(6, 16, 5, 28, 0, 1, ''),
(7, 9, 1, 25, 0, 1, ''),
(35, 9, 3, 4, 0, 1, 'Entretien'),
(36, 15, 3, 4, 0, 1, 'Entretien'),
(37, 15, 3, 4, 0, 1, 'Entretien'),
(38, 9, 3, 4, 150, 1, 'Recharge'),
(39, 9, 3, 4, 150, 1, 'Recharge'),
(40, 9, 4, 10, 1200, 1, '1'),
(41, 9, 4, 10, 1200, 1, 'Vente'),
(42, 9, 6, 2, 1800, 1, 'Vente'),
(43, 9, 6, 2, 1800, 1, 'Vente'),
(44, 17, 3, 4, 150, 1, 'Recharge'),
(45, 18, 3, 4, 150, 1, 'Recharge'),
(46, 19, 3, 4, 0, 1, 'Entretien'),
(47, 19, 3, 4, 80, 1, 'Entretien'),
(48, 20, 3, 4, 150, 1, 'Recharge'),
(52, 21, 4, 45, 400, 1, 'Entretien'),
(53, 21, 5, 1, 150, 1, 'Entretien'),
(54, 22, 4, 45, 400, 1, 'Entretien'),
(55, 24, 4, 12, 500, 1, 'Recharge'),
(56, 25, 4, 12, 500, 1, 'Recharge'),
(57, 26, 3, 2, 1500, 1, 'Recharge'),
(58, 26, 6, 24, 500, 1, 'Recharge'),
(59, 26, 4, 4, 500, 1, 'Recharge'),
(60, 27, 4, 12, 400, 1, 'Entretien'),
(85, 28, 3, 5, 150, 1, 'Recharge'),
(86, 28, 5, 20, 700, 1, 'Vente'),
(87, 28, 4, 2, 500, 1, 'Recharge'),
(88, 29, 3, 2, 200, 1, 'Vente'),
(89, 29, 4, 3, 500, 1, 'Recharge'),
(90, 30, 6, 2, 400, 1, 'Entretien'),
(91, 30, 3, 1, 80, 1, 'Entretien'),
(92, 31, 4, 11, 400, 1, 'Entretien'),
(93, 31, 5, 2, 150, 1, 'Entretien'),
(94, 32, 2, 5, 1220, 1, 'Vente'),
(95, 32, 3, 3, 80, 1, 'Entretien'),
(100, 33, 3, 7, 150, 1, 'Recharge'),
(101, 33, 4, 1, 500, 1, 'Recharge'),
(102, 33, 2, 1, 350, 1, 'Recharge'),
(103, 33, 5, 2, 350, 1, 'Recharge'),
(104, 33, 6, 2, 400, 1, 'Entretien');

--
-- Triggers `detail_cmd`
--
DROP TRIGGER IF EXISTS `tr1`;
DELIMITER //
CREATE TRIGGER `tr1` AFTER UPDATE ON `detail_cmd`
 FOR EACH ROW update produits set qteDispo=qteDispo-new.Qte
where id=new.Id_Prod and new.etat=1
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_devis`
--

CREATE TABLE IF NOT EXISTS `detail_devis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NumDevis` int(11) NOT NULL,
  `Id_Prod` int(11) NOT NULL,
  `Qte` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `etat` int(11) NOT NULL,
  `type` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `detail_devis`
--

INSERT INTO `detail_devis` (`id`, `NumDevis`, `Id_Prod`, `Qte`, `prix`, `etat`, `type`) VALUES
(1, 1, 3, 1, '150', 1, 'Recharge'),
(2, 2, 3, 1, '150', 1, 'Recharge'),
(3, 3, 3, 1, '80', 1, 'Entretien'),
(4, 3, 3, 2, '1200', 1, 'Recharge'),
(5, 4, 3, 2, '150', 1, 'Recharge'),
(6, 4, 2, 1, '130', 1, 'Entretien'),
(7, 4, 5, 1, '150', 1, 'Entretien');

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE IF NOT EXISTS `devis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(11) NOT NULL,
  `idCl` int(11) NOT NULL,
  `Total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `devis`
--

INSERT INTO `devis` (`id`, `date`, `idCl`, `Total`) VALUES
(4, '01/15/2016', 18, '580');

-- --------------------------------------------------------

--
-- Table structure for table `factur`
--

CREATE TABLE IF NOT EXISTS `factur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `idCl` int(11) NOT NULL,
  `Total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `factur`
--

INSERT INTO `factur` (`id`, `date`, `idCl`, `Total`) VALUES
(22, '01/13/2016', 18, '18000'),
(24, '01/20/2016', 10, '6000'),
(25, '01/20/2016', 10, '6000'),
(26, '01/14/2016', 18, '3000'),
(27, '01/21/2016', 8, '4800'),
(31, '01/14/2016', 8, '4700'),
(32, '01/14/2016', 6, '6340'),
(33, '01/06/2016', 9, '3400');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desi` text NOT NULL,
  `pa` float NOT NULL,
  `pv` float NOT NULL,
  `pr` decimal(10,0) NOT NULL,
  `pe` decimal(10,0) NOT NULL,
  `qteDispo` int(11) NOT NULL,
  `QteMin` int(11) DEFAULT '5',
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `desi`, `pa`, `pv`, `pr`, `pe`, `qteDispo`, `QteMin`, `type`) VALUES
(2, 'Extincteurs de 01 kg poudre polyvalente ABC', 600, 700, '350', '130', 14, 5, 0),
(3, 'Extincteurs de 04 kg poudre polyvalente ABC', 100, 200, '150', '80', 3, 5, 0),
(4, 'Extincteurs de  09 L Eau pulverise  AB', 1300, 1500, '500', '400', 4, 5, 0),
(5, 'Extincteurs de 10 kg CO2 BCE', 600, 700, '350', '150', 11, 5, 0),
(6, 'Extincteurs de06 kg CO2  BCE', 1400, 1500, '500', '400', 0, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `pass`) VALUES
(1, '5d18083e2c809dda25e02530139fb89a', '5d18083e2c809dda25e02530139fb89a');

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(12) NOT NULL,
  `Km1` int(11) NOT NULL,
  `Km2` int(11) NOT NULL,
  `Distance` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`id`, `matricule`, `Km1`, `Km2`, `Distance`, `date`) VALUES
(6, '71352-A-15', 14500, 16000, 1500, '1970-01-01'),
(7, '71352-A-15', 14500, 14905, 405, '1970-01-01'),
(8, '71352-A-15', 48, 170500, 153500, '2015-12-14'),
(9, '71352-A-15', 14000, 15000, 1000, '2015-12-31'),
(10, '71352-A-15', 140, 1400, 1260, '2015-12-31'),
(11, '80402-A-15', 14500, 14600, 100, '2016-01-05'),
(12, '71352-A-15', 1450, 1500, 50, '2016-01-01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

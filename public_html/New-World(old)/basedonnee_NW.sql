-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2017 at 05:37 PM
-- Server version: 5.5.52-0+deb8u1
-- PHP Version: 5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `NewWorld`
--

-- --------------------------------------------------------

--
-- Table structure for table `Distribution`
--

CREATE TABLE IF NOT EXISTS `Distribution` (
  `idDistrib` int(11) NOT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `cp` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Lots`
--

CREATE TABLE IF NOT EXISTS `Lots` (
`idLots` int(11) NOT NULL,
  `idProducteur` int(11) DEFAULT NULL,
  `idProduit` int(11) DEFAULT NULL,
  `idParcelle` int(11) DEFAULT NULL,
  `idDistrib` int(11) DEFAULT NULL,
  `qtyLot` int(11) DEFAULT NULL,
  `dateRecolte` date DEFAULT NULL,
  `dateLimite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `NewLot`
--

CREATE TABLE IF NOT EXISTS `NewLot` (
`idLot` int(11) NOT NULL,
  `qtyLot` double NOT NULL,
  `pdtLot` varchar(255) NOT NULL,
  `dateRecolte` date NOT NULL,
  `modeProduction` varchar(255) NOT NULL,
  `lieuProduction` varchar(255) NOT NULL,
  `parcelle` int(11) NOT NULL,
  `dateLimit` date NOT NULL,
  `prixLot` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Parcelle`
--

CREATE TABLE IF NOT EXISTS `Parcelle` (
  `idParcelle` int(11) NOT NULL,
  `idProducteur` int(11) DEFAULT NULL,
  `nomParcelle` varchar(45) NOT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `modeProd` enum('biologique','conventionnelle','raisonee','durable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Producteur`
--

CREATE TABLE IF NOT EXISTS `Producteur` (
  `idProducteur` int(11) NOT NULL,
  `nomProducteur` varchar(45) DEFAULT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Produit`
--

CREATE TABLE IF NOT EXISTS `Produit` (
  `idProduit` int(11) NOT NULL,
  `nomProd` varchar(45) DEFAULT NULL,
  `varProd` varchar(45) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `qtyMin` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
`idUser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`idUser`, `username`, `password`, `email`) VALUES
(1, 'remyb', '$2y$10$6rxG47wk4I56XBtUt6M3XuL2WHgjA/1MbDSsYouYg2U44JKpWxAbm', 'bayeux.remy@hotmail.fr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Distribution`
--
ALTER TABLE `Distribution`
 ADD PRIMARY KEY (`idDistrib`);

--
-- Indexes for table `Lots`
--
ALTER TABLE `Lots`
 ADD PRIMARY KEY (`idLots`), ADD KEY `fk_Lots_1_idx` (`idProduit`), ADD KEY `fk_Lots_2_idx` (`idProducteur`), ADD KEY `fk_Lots_3_idx` (`idParcelle`), ADD KEY `fk_Lots_4_idx` (`idDistrib`);

--
-- Indexes for table `NewLot`
--
ALTER TABLE `NewLot`
 ADD PRIMARY KEY (`idLot`);

--
-- Indexes for table `Parcelle`
--
ALTER TABLE `Parcelle`
 ADD PRIMARY KEY (`idParcelle`), ADD KEY `fk_Parcelle_1_idx` (`idProducteur`);

--
-- Indexes for table `Producteur`
--
ALTER TABLE `Producteur`
 ADD PRIMARY KEY (`idProducteur`), ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `Produit`
--
ALTER TABLE `Produit`
 ADD PRIMARY KEY (`idProduit`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
 ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Lots`
--
ALTER TABLE `Lots`
MODIFY `idLots` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `NewLot`
--
ALTER TABLE `NewLot`
MODIFY `idLot` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Lots`
--
ALTER TABLE `Lots`
ADD CONSTRAINT `fk_Lots_1` FOREIGN KEY (`idProduit`) REFERENCES `Produit` (`idProduit`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Lots_2` FOREIGN KEY (`idProducteur`) REFERENCES `Producteur` (`idProducteur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Lots_3` FOREIGN KEY (`idParcelle`) REFERENCES `Parcelle` (`idParcelle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Lots_4` FOREIGN KEY (`idDistrib`) REFERENCES `Distribution` (`idDistrib`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Parcelle`
--
ALTER TABLE `Parcelle`
ADD CONSTRAINT `fk_Parcelle_1` FOREIGN KEY (`idProducteur`) REFERENCES `Producteur` (`idProducteur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Producteur`
--
ALTER TABLE `Producteur`
ADD CONSTRAINT `Producteur_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

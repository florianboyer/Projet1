CREATE DATABASE IF NOT EXISTS `spectacus` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `spectacus`;

CREATE TABLE IF NOT EXISTS `stock` (
  `idStock` int(11) NOT NULL AUTO_INCREMENT,
  `idTitre` int(11) NOT NULL,
  `idFormat` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `dispo` int(11) NOT NULL,
  PRIMARY KEY (`idStock`),
  KEY `idTitre` (`idTitre`),
  KEY `idFormat` (`idFormat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `titre` (
  `idTitre` int(11) NOT NULL AUTO_INCREMENT,
  `libTitre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `anParution` smallint(6) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idTitre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `emprunt` (
  `idEmprunt` int(11) NOT NULL AUTO_INCREMENT,
  `idStock` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateRetour` date NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idEmprunt`),
  KEY `idStock` (`idStock`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `format` (
  `idFormat` int(11) NOT NULL AUTO_INCREMENT,
  `typeFormat` varchar(11) NOT NULL,
  `delai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `delaiVIP` smallint(6) NOT NULL,
  PRIMARY KEY (`idFormat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `vip` bool NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `participant` (
  `idParticipant` INT NOT NULL AUTO_INCREMENT,
  `idTitre` INT NOT NULL,
  `idIndividu` int(11) NULL,
  `fonction` VARCHAR(45) NULL,
  PRIMARY KEY (`idParticipant`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `individu` (
  `idIndividu` INT NOT NULL,
  `nom` VARCHAR(45) NULL,
  `prenom` VARCHAR(45) NULL,
  PRIMARY KEY (`idIndividu`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `theme` (
  `idTheme` INT NOT NULL AUTO_INCREMENT,
  `nomTheme` VARCHAR(45) NULL,
  PRIMARY KEY (`idTheme`))
ENGINE = InnoDB;


ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`idIndividu`) REFERENCES `individu` (`idIndividu`),
  ADD CONSTRAINT `personnage_ibfk_2` FOREIGN KEY (`idTitre`) REFERENCES `titre` (`idTitre`);


ALTER TABLE `titre`
  ADD CONSTRAINT `titre_ibfk_1` FOREIGN KEY(`idTheme`) REFERENCES `theme` (`idTheme`);


ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`idTitre`) REFERENCES `titre` (`idTitre`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`idFormat`) REFERENCES `format` (`idFormat`);

ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`idStock`) REFERENCES `stock` (`idStock`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);
 
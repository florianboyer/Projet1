

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


USE `spectacus` ;




CREATE TABLE IF NOT EXISTS `acteur` (
  `idActeur` INT NOT NULL AUTO_INCREMENT,
  `nomAct` VARCHAR(45) NULL,
  `prenomAct` VARCHAR(45) NULL,
  PRIMARY KEY (`idacteur`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `personnage` (
  `idpersonnage` INT NOT NULL,
  `nomPerso` VARCHAR(45) NULL,
  `prenomPerso` VARCHAR(45) NULL,
  `idActeur` INT NULL,
  `idTitre` INT NULL,
  PRIMARY KEY (`idpersonnage`))
ENGINE = InnoDB;




CREATE TABLE IF NOT EXISTS `realisateur` (
  `idRealisateur` INT NOT NULL AUTO_INCREMENT,
  `nomReal` VARCHAR(45) NULL,
  `prenomReal` VARCHAR(45) NULL,
  PRIMARY KEY (`idrealisateur`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `film` (
  `idFilm` INT NOT NULL,
  `idRealisateur` INT NULL,
  `idTitre` INT NULL,
  PRIMARY KEY (`idfilm`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `theme` (
  `idTheme` INT NOT NULL AUTO_INCREMENT,
  `nomTheme` VARCHAR(45) NULL,
  PRIMARY KEY (`idTheme`))
ENGINE = InnoDB;


ALTER TABLE `personnage`
  ADD CONSTRAINT `personnage_ibfk_1` FOREIGN KEY (`idActeur`) REFERENCES `acteur` (`idActeur`),
  ADD CONSTRAINT `personnage_ibfk_2` FOREIGN KEY (`idTitre`) REFERENCES `titre` (`idTitre`);

ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`idRealisateur`) REFERENCES `realisateur` (`idRealisateur`),
  ADD CONSTRAINT `film_ibfk_2` FOREIGN KEY (`idTitre`) REFERENCES `titre` (`idTitre`);

ALTER TABLE `titre`
  ADD CONSTRAINT `titre_ibfk_1` FOREIGN KEY(`idTheme`) REFERENCES `theme` (`idTheme`);
 
 



INSERT INTO `format` (`typeFormat`, `delai`, `delaiVIP`) VALUES
('CD-ROM',10,12),
('K7',14,16),
('DVD',10,11),
('BLU-RAY',5,6);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
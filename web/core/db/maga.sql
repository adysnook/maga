SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `maga` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `maga` ;

-- -----------------------------------------------------
-- Table `maga`.`produse`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `maga`.`produse` (
  `pid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nume` VARCHAR(64) NOT NULL ,
  `pret` DOUBLE UNSIGNED NOT NULL ,
  `detalii` TEXT NOT NULL ,
  `preview` TEXT NOT NULL ,
  PRIMARY KEY (`pid`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `maga`.`comenzi`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `maga`.`comenzi` (
  `cid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `adresa` TEXT NOT NULL ,
  `telefon` VARCHAR(16) NOT NULL ,
  `email` VARCHAR(255) NULL ,
  PRIMARY KEY (`cid`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `maga`.`produse_comenzi`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `maga`.`produse_comenzi` (
  `pid` INT UNSIGNED NOT NULL ,
  `cid` INT UNSIGNED NOT NULL ,
  `cantitate` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`pid`, `cid`) ,
  INDEX `pid_idx` (`pid` ASC) ,
  INDEX `cid_idx` (`cid` ASC) ,
  CONSTRAINT `pid`
    FOREIGN KEY (`pid` )
    REFERENCES `maga`.`produse` (`pid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cid`
    FOREIGN KEY (`cid` )
    REFERENCES `maga`.`comenzi` (`cid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `maga`.`administratori`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `maga`.`administratori` (
  `aid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(64) NOT NULL ,
  `password` VARCHAR(64) NOT NULL ,
  PRIMARY KEY (`aid`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `maga`.`operatori`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `maga`.`operatori` (
  `oid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(64) NOT NULL ,
  `password` VARCHAR(64) NOT NULL ,
  PRIMARY KEY (`oid`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `maga`.`settings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `maga`.`settings` (
  `varname` VARCHAR(64) NOT NULL ,
  `varvalue` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`varname`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `maga`.`sesiuni`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `maga`.`sesiuni` (
  `sesid` BIGINT UNSIGNED NOT NULL ,
  `regtime` TIMESTAMP NOT NULL DEFAULT NOW() ,
  PRIMARY KEY (`sesid`) )
ENGINE = MEMORY;


-- -----------------------------------------------------
-- Table `maga`.`produse_cos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `maga`.`produse_cos` (
  `pid` INT UNSIGNED NOT NULL ,
  `sesid` BIGINT UNSIGNED NOT NULL ,
  `cantitate` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`pid`, `sesid`) )
ENGINE = MEMORY;


-- -----------------------------------------------------
-- Table `maga`.`mesaje`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `maga`.`mesaje` (
  `mid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nume` VARCHAR(64) NOT NULL ,
  `prenume` VARCHAR(64) NULL ,
  `email` VARCHAR(255) NULL ,
  `telefon` VARCHAR(15) NULL ,
  `subiect` VARCHAR(255) NULL ,
  `mesaj` TEXT NULL ,
  PRIMARY KEY (`mid`) )
ENGINE = InnoDB;

USE `maga` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

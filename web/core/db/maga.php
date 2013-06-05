<?php
$install_query=array();
$install_query[]="CREATE  TABLE IF NOT EXISTS `produse` (
  `pid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nume` VARCHAR(64) NOT NULL ,
  `bucati_disponibile` INT UNSIGNED NOT NULL DEFAULT 0,
  `pret` DOUBLE UNSIGNED NOT NULL ,
  `detalii` TEXT NOT NULL ,
  `preview` TEXT NOT NULL ,
  PRIMARY KEY (`pid`),
  UNIQUE INDEX `nume_UNIQUE` (`nume` ASC) )
ENGINE = InnoDB;";
$install_query[]="CREATE  TABLE IF NOT EXISTS `utilizatori` (
  `uid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(64) NOT NULL ,
  `password` VARCHAR(64) NOT NULL ,
  `admin` BOOLEAN NOT NULL DEFAULT FALSE ,
  `operator` BOOLEAN NOT NULL DEFAULT FALSE ,
  PRIMARY KEY (`uid`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;";
$install_query[]="CREATE  TABLE IF NOT EXISTS `comenzi` (
  `cid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nume` VARCHAR(64) NOT NULL,
  `prenume` VARCHAR(64) NOT NULL,
  `adresa` TEXT NOT NULL ,
  `telefon` VARCHAR(16) NOT NULL ,
  `email` VARCHAR(255) NULL ,
  `preluata_de` INT UNSIGNED NULL,
  `status` INT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`cid`),
  CONSTRAINT `preluata_de`
    FOREIGN KEY (`preluata_de` )
    REFERENCES `utilizatori` (`uid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION  )
ENGINE = InnoDB;";
$install_query[]="CREATE  TABLE IF NOT EXISTS `produse_comenzi` (
  `pid` INT UNSIGNED NOT NULL ,
  `cid` INT UNSIGNED NOT NULL ,
  `cantitate` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`pid`, `cid`) ,
  INDEX `pid_idx` (`pid` ASC) ,
  INDEX `cid_idx` (`cid` ASC) ,
  CONSTRAINT `pid`
    FOREIGN KEY (`pid` )
    REFERENCES `produse` (`pid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cid`
    FOREIGN KEY (`cid` )
    REFERENCES `comenzi` (`cid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;";
$install_query[]="CREATE  TABLE IF NOT EXISTS `settings` (
  `varname` VARCHAR(64) NOT NULL ,
  `varvalue` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`varname`) )
ENGINE = InnoDB;";
$install_query[]="CREATE  TABLE IF NOT EXISTS `mesaje` (
  `mid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nume` VARCHAR(64) NOT NULL ,
  `prenume` VARCHAR(64) NULL ,
  `email` VARCHAR(255) NULL ,
  `telefon` VARCHAR(15) NULL ,
  `subiect` VARCHAR(255) NULL ,
  `mesaj` TEXT NULL ,
  PRIMARY KEY (`mid`) )
ENGINE = InnoDB;";

if(db_samp)
    require('sample_data.php');


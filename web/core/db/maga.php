<?php
$install_query=array();
$install_query[]="CREATE  TABLE IF NOT EXISTS `produse` (
  `pid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nume` VARCHAR(64) NOT NULL ,
  `pret` DOUBLE UNSIGNED NOT NULL ,
  `detalii` TEXT NOT NULL ,
  `preview` TEXT NOT NULL ,
  PRIMARY KEY (`pid`) )
ENGINE = InnoDB;";
$install_query[]="CREATE  TABLE IF NOT EXISTS `comenzi` (
  `cid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `adresa` TEXT NOT NULL ,
  `telefon` VARCHAR(16) NOT NULL ,
  `email` VARCHAR(255) NULL ,
  PRIMARY KEY (`cid`) )
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
    REFERENCES `maga`.`produse` (`pid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cid`
    FOREIGN KEY (`cid` )
    REFERENCES `maga`.`comenzi` (`cid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;";
$install_query[]="CREATE  TABLE IF NOT EXISTS `administratori` (
  `aid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(64) NOT NULL ,
  `password` VARCHAR(64) NOT NULL ,
  PRIMARY KEY (`aid`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;";
$install_query[]="CREATE  TABLE IF NOT EXISTS `operatori` (
  `oid` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(64) NOT NULL ,
  `password` VARCHAR(64) NOT NULL ,
  PRIMARY KEY (`oid`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;";
$install_query[]="CREATE  TABLE IF NOT EXISTS `settings` (
  `varname` VARCHAR(64) NOT NULL ,
  `varvalue` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`varname`) )
ENGINE = InnoDB;";
$install_query[]="INSERT INTO `produse` (`pid`, `nume`, `pret`, `detalii`, `preview`) VALUES
(1, 'rochie', 500, '-bumbac\r\n-alba,roz', 'rochie'),
(2, 'Pantaloni', 200, '-bumbac\r\n-negru', 'pantaloni'),
(3, 'Tricou ', 100, '-bumbac\r\n-culori la comananda', 'Tricou femei'),
(4, 'Maieu', 90, '-elastic\r\n-albastru,rosu', 'maieu'),
(5, 'Inel', 60, '-argint', 'Inel argint'),
(6, 'ceas femei', 120, '-curea de piele(alb,rosu,negru)\r\n-plastic', 'CEAS'),
(7, 'ceas barbatesc', 100, '-curea piele(alb,negru,maro)\r\n-metal', 'CEAS');";
?>
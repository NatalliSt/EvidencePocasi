-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
drop schema if exists evPoc;

CREATE SCHEMA IF NOT EXISTS evPoc
DEFAULT CHARACTER SET utf8
COLLATE utf8_czech_ci;
-- -----------------------------------------------------
-- Schema schema-EvPocasi
-- -----------------------------------------------------
USE evPoc ;

-- -----------------------------------------------------
-- Table `mydb`.`login`
-- -----------------------------------------------------
 -- drop table login;

CREATE TABLE IF NOT EXISTS login (
	id INT NOT NULL unique auto_increment,
	email VARCHAR(50) NOT NULL,
	password_lgn VARCHAR(50) NOT NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB;

 -- alter table login 
-- modify id INT NOT NULL AUTO_INCREMENT unique;


-- -----------------------------------------------------
-- Table `mydb`.`Data`
-- -----------------------------------------------------

 -- drop table if exists dataPocasi;

CREATE TABLE IF NOT EXISTS dataPocasi (
	data_id INT NOT NULL auto_increment,
    created datetime not null default CURRENT_TIMESTAMP,
	temperature DOUBLE not null,
	pressure DOUBLE NULL,
	humidity DOUBLE NULL,
	wind DOUBLE NULL,
	rainfall DOUBLE NULL,
	PRIMARY KEY (data_id),
	CONSTRAINT fk_Data_login
	FOREIGN KEY (data_id) REFERENCES login (id)
  )
ENGINE = InnoDB;
-- show tables;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

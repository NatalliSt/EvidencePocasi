-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- drop schema if exists evPoc;

CREATE SCHEMA IF NOT EXISTS evPoc
DEFAULT CHARACTER SET utf8
COLLATE utf8_czech_ci;
-- -----------------------------------------------------
-- Schema schema-EvPocasi
-- -----------------------------------------------------
USE evPoc ;

-- drop table users;

CREATE TABLE IF NOT EXISTS users (
	users_id INT NOT NULL unique auto_increment,
	email VARCHAR(50) unique NOT NULL,
	pw VARCHAR(50) NOT NULL, -- password
  PRIMARY KEY (users_id))
ENGINE = InnoDB;

 -- alter table login 
-- modify id INT NOT NULL AUTO_INCREMENT unique;

drop table if exists data_ep;

CREATE TABLE IF NOT EXISTS data_ep (
	data_id INT NOT NULL unique auto_increment,
    users_id int,
    created datetime not null default CURRENT_TIMESTAMP,
    cur_date date not null,
    cur_time time not null, 
	cur_year int not null,
    cur_month int not null,
    cur_week int not null,
    cur_day int not null,
    cur_hour int not null,
    cur_min int not null,
    cur_sec int not null,
	temp_in float not null,
    temp_out float not null,
	pressure float not null,
	humidity float not null,
	wind float not null,
	rainfall float not null,
	PRIMARY KEY (data_id),
	FOREIGN KEY (users_id) REFERENCES users (users_id)
  )
ENGINE = InnoDB;

-- show tables;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema movies
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `movies` ;

-- -----------------------------------------------------
-- Schema movies
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `movies` DEFAULT CHARACTER SET utf8 ;
USE `movies` ;

-- -----------------------------------------------------
-- Table `movie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movie` ;

CREATE TABLE IF NOT EXISTS `movie` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `release` DATE NULL,
  `poster` VARCHAR(200) NULL,
  `duration` VARCHAR(45) NULL,
  `rating` TINYINT UNSIGNED NULL,
  `description` VARCHAR(500) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `category` ;

CREATE TABLE IF NOT EXISTS `category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `category_movie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `category_movie` ;

CREATE TABLE IF NOT EXISTS `category_movie` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_movie` INT UNSIGNED NOT NULL,
  `id_category` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_category_movie_movie`
    FOREIGN KEY (`id_movie`)
    REFERENCES `movie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_movie_category1`
    FOREIGN KEY (`id_category`)
    REFERENCES `category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `role` ;

CREATE TABLE IF NOT EXISTS `role` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `permission_level` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user` ;

CREATE TABLE IF NOT EXISTS `user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `username` VARCHAR(20) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `id_role` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_role1`
    FOREIGN KEY (`id_role`)
    REFERENCES `role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `email_UNIQUE` ON `user` (`email` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `movie_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movie_user` ;

CREATE TABLE IF NOT EXISTS `movie_user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_movie` INT UNSIGNED NOT NULL,
  `id_user` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_movie_user_movie1`
    FOREIGN KEY (`id_movie`)
    REFERENCES `movie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movie_user_user1`
    FOREIGN KEY (`id_user`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `image`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `image` ;

CREATE TABLE IF NOT EXISTS `image` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_movie` INT UNSIGNED NOT NULL,
  `path` VARCHAR(100) NOT NULL,
  `is_banner` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_image_movie1`
    FOREIGN KEY (`id_movie`)
    REFERENCES `movie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

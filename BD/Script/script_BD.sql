-- MySQL Script generated by MySQL Workbench
-- Fri Apr 21 15:33:20 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';



-- -----------------------------------------------------
-- Table `projecte3`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`users` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`users` (
  `id_user` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_user` VARCHAR(45) NOT NULL,
  `lastname_user` VARCHAR(45) NOT NULL,
  `nickname_user` VARCHAR(45) NOT NULL,
  `password_user` VARCHAR(300) NOT NULL,
  `type_user` CHAR(1) NOT null CHECK (`type_user`="P" Or `type_user`="N"),
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projecte3`.`diets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`diets` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`diets` (
  `id_diet` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `calories` DECIMAL(10,2) NOT NULL,
  `number_meals` INT NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id_diet`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projecte3`.`nutricionist`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`nutricionist` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`nutricionist` (
  `id_nutricionist` BIGINT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_nutricionist`),
  CONSTRAINT `FK_USERS_ID`
    FOREIGN KEY (`id_nutricionist`)
    REFERENCES `projecte3`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projecte3`.`pacient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`pacient` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`pacient` (
  `id_pacient` BIGINT(10) UNSIGNED NOT NULL,
  `assigned_nutricionist` BIGINT(10) UNSIGNED NULL,
  `email_pacient` VARCHAR(45) null check (`email_pacient` LIKE '%@%.%'),
  `phone_pacient` VARCHAR(20) null CHECK (`phone_pacient` LIKE '%+%'),
  `address_pacient` VARCHAR(1000) NULL,
  `current_diet` BIGINT(10) UNSIGNED NULL,
  PRIMARY KEY (`id_pacient`),
  CONSTRAINT `FK_PACIENT_DIETAS`
    FOREIGN KEY (`current_diet`)
    REFERENCES `projecte3`.`diets` (`id_diet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_PACIENT_USERS`
    FOREIGN KEY (`id_pacient`)
    REFERENCES `projecte3`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_PACIENT_NUTRICIONISTA`
    FOREIGN KEY (`assigned_nutricionist`)
    REFERENCES `projecte3`.`nutricionist` (`id_nutricionist`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `FK_PACIENT_DIETAS_idx` ON `projecte3`.`pacient` (`current_diet` ASC) ;

CREATE INDEX `FK_PACIENT_NUTRICIONISTA_idx` ON `projecte3`.`pacient` (`assigned_nutricionist` ASC) ;


-- -----------------------------------------------------
-- Table `projecte3`.`historial_pacient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`historial_pacient` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`historial_pacient` (
  `id_historial` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `id_pacient` BIGINT(10) UNSIGNED NOT NULL,
  `diet` BIGINT(10) UNSIGNED NOT NULL,
  `weigth` DECIMAL(6,2) NOT NULL,
  `heigth` DECIMAL(6,2) NOT NULL,
  `chest` DECIMAL(6,2) NULL,
  `leg` DECIMAL(6,2) NULL,
  `arm` DECIMAL(6,2) NULL,
  `hip` DECIMAL(6,2) NULL,
  PRIMARY KEY (`id_historial`, `date`),
  CONSTRAINT `FK_ID_PACIENT`
    FOREIGN KEY (`id_pacient`)
    REFERENCES `projecte3`.`pacient` (`id_pacient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_HISTORIAL_DIETA`
    FOREIGN KEY (`diet`)
    REFERENCES `projecte3`.`diets` (`id_diet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `FK_HISTORIAL_DIETA_idx` ON `projecte3`.`historial_pacient` (`diet` ASC) ;


-- -----------------------------------------------------
-- Table `projecte3`.`dishes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`dishes` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`dishes` (
  `id_dishes` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_dishes` VARCHAR(100) NOT NULL,
  `calories` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id_dishes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projecte3`.`unit_mesure`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`unit_mesure` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`unit_mesure` (
  `id_unit` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `abreviation` VARCHAR(45) NOT NULL,
  `unit_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_unit`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projecte3`.`ingredients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`ingredients` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`ingredients` (
  `id_ingredient` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `calories` DECIMAL(10,2) NOT NULL,
  `calories_unit` BIGINT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_ingredient`),
  CONSTRAINT `FK_INGREDIENTS_MESURE`
    FOREIGN KEY (`calories_unit`)
    REFERENCES `projecte3`.`unit_mesure` (`id_unit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `FK_INGREDIENTS_MESURE_idx` ON `projecte3`.`ingredients` (`calories_unit` ASC) ;


-- -----------------------------------------------------
-- Table `projecte3`.`meal_dishes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`meal_dishes` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`meal_dishes` (
  `id_meal` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_meal` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_meal`, `name_meal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projecte3`.`week_days`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`week_days` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`week_days` (
  `id_day` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_day` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_day`, `name_day`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projecte3`.`diets_dishes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`diets_dishes` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`diets_dishes` (
  `dietas_id_dieta` BIGINT(10) UNSIGNED NOT NULL,
  `dishes_id_dishes` BIGINT(10) UNSIGNED NOT NULL,
  `week_day` BIGINT(10) UNSIGNED NOT NULL,
  `meal` BIGINT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`dietas_id_dieta`, `dishes_id_dishes`, `week_day`, `meal`),
  CONSTRAINT `fk_Dietas_has_Dishes_Dietas1`
    FOREIGN KEY (`dietas_id_dieta`)
    REFERENCES `projecte3`.`diets` (`id_diet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dietas_has_Dishes_Dishes1`
    FOREIGN KEY (`dishes_id_dishes`)
    REFERENCES `projecte3`.`dishes` (`id_dishes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_DIETSDISHES_MEAL`
    FOREIGN KEY (`meal`)
    REFERENCES `projecte3`.`meal_dishes` (`id_meal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_DIETDISHES_WEEKDAYS`
    FOREIGN KEY (`week_day`)
    REFERENCES `projecte3`.`week_days` (`id_day`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Dietas_has_Dishes_Dishes1_idx` ON `projecte3`.`diets_dishes` (`dishes_id_dishes` ASC) ;

CREATE INDEX `fk_Dietas_has_Dishes_Dietas1_idx` ON `projecte3`.`diets_dishes` (`dietas_id_dieta` ASC) ;

CREATE INDEX `FK_DIETSDISHES_MEAL_idx` ON `projecte3`.`diets_dishes` (`meal` ASC) ;

CREATE INDEX `FK_DIETDISHES_WEEKDAYS_idx` ON `projecte3`.`diets_dishes` (`week_day` ASC) ;


-- -----------------------------------------------------
-- Table `projecte3`.`dishes_ingredients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`dishes_ingredients` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`dishes_ingredients` (
  `dishes_id_dishes` BIGINT(10) UNSIGNED NOT NULL,
  `ingredients_id_ingredient` BIGINT(10) UNSIGNED NOT NULL,
  `quantity` DECIMAL(10,2) UNSIGNED NULL,
  `mesure` BIGINT(10) UNSIGNED NULL,
  PRIMARY KEY (`dishes_id_dishes`, `ingredients_id_ingredient`),
  CONSTRAINT `fk_Ingridients_has_Dishes_Ingridients1`
    FOREIGN KEY (`ingredients_id_ingredient`)
    REFERENCES `projecte3`.`ingredients` (`id_ingredient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ingridients_has_Dishes_Dishes1`
    FOREIGN KEY (`dishes_id_dishes`)
    REFERENCES `projecte3`.`dishes` (`id_dishes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dishes_Ingredients_Unit Mesure1`
    FOREIGN KEY (`mesure`)
    REFERENCES `projecte3`.`unit_mesure` (`id_unit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Ingridients_has_Dishes_Dishes1_idx` ON `projecte3`.`dishes_ingredients` (`dishes_id_dishes` ASC) ;

CREATE INDEX `fk_Ingridients_has_Dishes_Ingridients1_idx` ON `projecte3`.`dishes_ingredients` (`ingredients_id_ingredient` ASC) ;

CREATE INDEX `fk_Dishes_Ingredients_Unit Mesure1_idx` ON `projecte3`.`dishes_ingredients` (`mesure` ASC) ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

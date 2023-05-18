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
  `id` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_user` VARCHAR(45) NOT NULL,
  `lastname_user` VARCHAR(45) NOT NULL,
  `nickname_user` VARCHAR(45) NOT NULL,
  `password` VARCHAR(300) NOT NULL,
  `type_user` CHAR(1) NOT null CHECK (`type_user`="P" Or `type_user`="N"),
  `image_user` VARCHAR(200) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `projecte3`.`type_diets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`type_diets` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`type_diets` (
  `id_type` BIGINT(10) NOT NULL AUTO_INCREMENT,
  `name_type` VARCHAR(200) UNIQUE NOT NULL,
  PRIMARY KEY (`id_type`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `projecte3`.`diets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`diets` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`diets` (
  `id_diet` BIGINT(10) UNSIGNED AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `calories` DECIMAL(10,2) NOT NULL,
  `number_meals` INT NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `type_diet` BIGINT(10) NULL,
  PRIMARY KEY (`id_diet`),
  CONSTRAINT `FK_TYPE_DIETS`
    FOREIGN KEY (`type_diet`)
    REFERENCES `projecte3`.`type_diets` (`id_type`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `FK_TYPE_DIETS_idx` ON `projecte3`.`diets` (`type_diet` ASC) ;


-- -----------------------------------------------------
-- Table `projecte3`.`nutricionists`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`nutricionists` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`nutricionists` (
  `id_nutricionist` BIGINT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_nutricionist`),
  CONSTRAINT `FK_USERS_ID`
    FOREIGN KEY (`id_nutricionist`)
    REFERENCES `projecte3`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projecte3`.`patients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`patients` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`patients` (
  `id_pacient` BIGINT(10) UNSIGNED NOT NULL,
  `assigned_nutricionist` BIGINT(10) UNSIGNED NULL,
  `email_patient` VARCHAR(45) null check  (`email_patient` LIKE '%@%.%'),
  `phone_patient` VARCHAR(20) null CHECK (`phone_patient` LIKE '%+%'),
  `address_patient` VARCHAR(1000) NULL,
  `current_diet` BIGINT(10) UNSIGNED NULL,
  PRIMARY KEY (`id_pacient`),
  CONSTRAINT `FK_PACIENT_DIETAS`
    FOREIGN KEY (`current_diet`)
    REFERENCES `projecte3`.`diets` (`id_diet`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `FK_PACIENT_USERS`
    FOREIGN KEY (`id_pacient`)
    REFERENCES `projecte3`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_PACIENT_NUTRICIONISTA`
    FOREIGN KEY (`assigned_nutricionist`)
    REFERENCES `projecte3`.`nutricionists` (`id_nutricionist`)
    ON DELETE set NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;


CREATE INDEX `FK_PACIENT_DIETAS_idx` ON `projecte3`.`patients` (`current_diet` ASC) ;

CREATE INDEX `FK_PACIENT_NUTRICIONISTA_idx` ON `projecte3`.`patients` (`assigned_nutricionist` ASC) ;


-- -----------------------------------------------------
-- Table `projecte3`.`historial_pacient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`historial_patient` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`historial_patient` (
  `start_date` DATE NOT NULL,
  `id_patient` BIGINT(10) UNSIGNED NOT NULL,
  `diet` BIGINT(10) UNSIGNED,
  `weigth` DECIMAL(6,2) NOT NULL,
  `heigth` DECIMAL(6,2) NOT NULL,
  `chest` DECIMAL(6,2) NULL,
  `leg` DECIMAL(6,2) NULL,
  `arm` DECIMAL(6,2) NULL,
  `hip` DECIMAL(6,2) NULL,
  `control_date` DATE,
  `status` VARCHAR(2) not null CHECK (`status`="I" Or `status`="F"),
  PRIMARY KEY (`control_date`,`id_patient`,`diet`),
  CONSTRAINT `FK_ID_PACIENT`
    FOREIGN KEY (`id_patient`)
    REFERENCES `projecte3`.`patients` (`id_pacient`)
    ON DELETE no ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_HISTORIAL_DIETA`
    FOREIGN KEY (`diet`)
    REFERENCES `projecte3`.`diets` (`id_diet`)
    ON DELETE no action
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `FK_HISTORIAL_DIETA_idx` ON `projecte3`.`historial_patient` (`diet` ASC) ;


-- -----------------------------------------------------
-- Table `projecte3`.`dishes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`dishes` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`dishes` (
  `id_dishes` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_dishes` VARCHAR(100) NOT NULL,
  `calories` DECIMAL(10,2) NOT NULL,
  `image_dish` VARCHAR(200) NULL,
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
  `calories_unit` BIGINT(10) UNSIGNED NULL,
  PRIMARY KEY (`id_ingredient`),
  CONSTRAINT `FK_INGREDIENTS_MESURE`
    FOREIGN KEY (`calories_unit`)
    REFERENCES `projecte3`.`unit_mesure` (`id_unit`)
    ON DELETE set NULL
    ON UPDATE cascade )
ENGINE = InnoDB;

CREATE INDEX `FK_INGREDIENTS_MESURE_idx` ON `projecte3`.`ingredients` (`calories_unit` ASC) ;


-- -----------------------------------------------------
-- Table `projecte3`.`meal_dishes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`meal_dishes` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`meal_dishes` (
  `id_meal` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_meal` VARCHAR(45) unique NOT NULL,
  PRIMARY KEY (`id_meal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projecte3`.`week_days`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`week_days` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`week_days` (
  `id_day` BIGINT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_day` VARCHAR(45) unique NOT NULL,
  PRIMARY KEY (`id_day`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projecte3`.`diets_dishes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`diets_dishes` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`diets_dishes` (
  `diet_id_diet` BIGINT(10) UNSIGNED not NULL,
  `dish_id_dish` BIGINT(10) UNSIGNED NOT NULL,
  `week_day` BIGINT(10) UNSIGNED NULL,
  `meal` BIGINT(10) UNSIGNED NULL,
  PRIMARY KEY (`diet_id_diet`, `dish_id_dish`),
  CONSTRAINT `fk_Dietas_has_Dishes_Dietas1`
    FOREIGN KEY (`diet_id_diet`)
    REFERENCES `projecte3`.`diets` (`id_diet`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Dietas_has_Dishes_Dishes1`
    FOREIGN KEY (`dish_id_dish`)
    REFERENCES `projecte3`.`dishes` (`id_dishes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_DIETSDISHES_MEAL`
    FOREIGN KEY (`meal`)
    REFERENCES `projecte3`.`meal_dishes` (`id_meal`)
    ON DELETE set null
    ON UPDATE CASCADE,
  CONSTRAINT `FK_DIETDISHES_WEEKDAYS`
    FOREIGN KEY (`week_day`)
    REFERENCES `projecte3`.`week_days` (`id_day`)
    ON DELETE set null
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_Dietas_has_Dishes_Dishes1_idx` ON `projecte3`.`diets_dishes` (`dish_id_dish` ASC) ;

CREATE INDEX `fk_Dietas_has_Dishes_Dietas1_idx` ON `projecte3`.`diets_dishes` (`diet_id_diet` ASC) ;

CREATE INDEX `FK_DIETSDISHES_MEAL_idx` ON `projecte3`.`diets_dishes` (`meal` ASC) ;

CREATE INDEX `FK_DIETDISHES_WEEKDAYS_idx` ON `projecte3`.`diets_dishes` (`week_day` ASC) ;


-- -----------------------------------------------------
-- Table `projecte3`.`dishes_ingredients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projecte3`.`dishes_ingredients` ;

CREATE TABLE IF NOT EXISTS `projecte3`.`dishes_ingredients` (
  `dish_id_dish` BIGINT(10) UNSIGNED NOT NULL,
  `ingredient_id_ingredient` BIGINT(10) UNSIGNED NOT NULL,
  `quantity` DECIMAL(10,2) UNSIGNED NULL,
  `mesure` BIGINT(10) UNSIGNED NULL,
  PRIMARY KEY (`dish_id_dish`, `ingredient_id_ingredient`),
  CONSTRAINT `fk_Ingridients_has_Dishes_Ingridients1`
    FOREIGN KEY (`ingredient_id_ingredient`)
    REFERENCES `projecte3`.`ingredients` (`id_ingredient`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Ingridients_has_Dishes_Dishes1`
    FOREIGN KEY (`dish_id_dish`)
    REFERENCES `projecte3`.`dishes` (`id_dishes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Dishes_Ingredients_Unit Mesure1`
    FOREIGN KEY (`mesure`)
    REFERENCES `projecte3`.`unit_mesure` (`id_unit`)
    ON DELETE set NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_Ingridients_has_Dishes_Dishes1_idx` ON `projecte3`.`dishes_ingredients` (`dish_id_dish` ASC) ;

CREATE INDEX `fk_Ingridients_has_Dishes_Ingridients1_idx` ON `projecte3`.`dishes_ingredients` (`ingredient_id_ingredient` ASC) ;

CREATE INDEX `fk_Dishes_Ingredients_Unit Mesure1_idx` ON `projecte3`.`dishes_ingredients` (`mesure` ASC) ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

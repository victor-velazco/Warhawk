SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema wgc
-- -----------------------------------------------------

USE `quimerat_wgc` ;

-- -----------------------------------------------------
-- Table `quimerat_wgc`.`genders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`genders` (
  `gender_id` INT UNSIGNED NOT NULL,
  `gender` VARCHAR(45) NULL,
  PRIMARY KEY (`gender_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`profiles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`profiles` (
  `profile_id` INT UNSIGNED NOT NULL,
  `profile_desc` VARCHAR(255) NULL,
  PRIMARY KEY (`profile_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`persons`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`persons` (
  `person_id` INT UNSIGNED NOT NULL,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `middle_name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `username` VARCHAR(12) NULL,
  `password` VARCHAR(45) NULL,
  `phone_number` VARCHAR(255) NULL,
  `gender_id` INT UNSIGNED NOT NULL,
  `profile_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`person_id`),
  INDEX `fk_persons_genders1_idx` (`gender_id` ASC),
  INDEX `fk_persons_profiles1_idx` (`profile_id` ASC),
  CONSTRAINT `fk_persons_genders1`
    FOREIGN KEY (`gender_id`)
    REFERENCES `quimerat_wgc`.`genders` (`gender_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_persons_profiles1`
    FOREIGN KEY (`profile_id`)
    REFERENCES `quimerat_wgc`.`profiles` (`profile_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`statuses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`statuses` (
  `status_id` INT UNSIGNED NOT NULL,
  `status` VARCHAR(255) NULL,
  PRIMARY KEY (`status_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`countries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`countries` (
  `country_id` INT UNSIGNED NOT NULL,
  `country` VARCHAR(255) NULL,
  PRIMARY KEY (`country_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`cities` (
  `city_id` INT UNSIGNED NOT NULL,
  `city_name` VARCHAR(255) NULL,
  `country_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`city_id`),
  INDEX `fk_cities_countries_idx` (`country_id` ASC),
  CONSTRAINT `fk_cities_countries`
    FOREIGN KEY (`country_id`)
    REFERENCES `quimerat_wgc`.`countries` (`country_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`occupations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`occupations` (
  `occupation_id` INT UNSIGNED NOT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`occupation_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`companies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`companies` (
  `company_id` INT UNSIGNED NOT NULL,
  `company_name` VARCHAR(255) NULL,
  PRIMARY KEY (`company_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`education_levels`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`education_levels` (
  `education_level_id` INT UNSIGNED NOT NULL,
  `level` VARCHAR(255) NULL,
  PRIMARY KEY (`education_level_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`alumni`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`alumni` (
  `alumni_id` INT UNSIGNED NOT NULL,
  `person_id` INT UNSIGNED NOT NULL,
  `status_id` INT UNSIGNED NOT NULL,
  `university` VARCHAR(255) NULL,
  `graduation_yr` SMALLINT UNSIGNED NULL,
  `origin_country_id` INT UNSIGNED NULL,
  `current_city_id` INT UNSIGNED NULL,
  `occupation_id` INT UNSIGNED NOT NULL,
  `company_id` INT UNSIGNED NOT NULL,
  `education_level_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`alumni_id`),
  INDEX `fk_students_persons1_idx` (`person_id` ASC),
  INDEX `fk_students_statuses1_idx` (`status_id` ASC),
  INDEX `fk_students_countries1_idx` (`origin_country_id` ASC),
  INDEX `fk_students_cities1_idx` (`current_city_id` ASC),
  INDEX `fk_students_occupations1_idx` (`occupation_id` ASC),
  INDEX `fk_students_companies1_idx` (`company_id` ASC),
  INDEX `fk_students_education_levels1_idx` (`education_level_id` ASC),
  CONSTRAINT `fk_students_persons1`
    FOREIGN KEY (`person_id`)
    REFERENCES `quimerat_wgc`.`persons` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_statuses1`
    FOREIGN KEY (`status_id`)
    REFERENCES `quimerat_wgc`.`statuses` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_countries1`
    FOREIGN KEY (`origin_country_id`)
    REFERENCES `quimerat_wgc`.`countries` (`country_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_cities1`
    FOREIGN KEY (`current_city_id`)
    REFERENCES `quimerat_wgc`.`cities` (`city_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_occupations1`
    FOREIGN KEY (`occupation_id`)
    REFERENCES `quimerat_wgc`.`occupations` (`occupation_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_companies1`
    FOREIGN KEY (`company_id`)
    REFERENCES `quimerat_wgc`.`companies` (`company_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_education_levels1`
    FOREIGN KEY (`education_level_id`)
    REFERENCES `quimerat_wgc`.`education_levels` (`education_level_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`categories` (
  `category_id` INT UNSIGNED NOT NULL,
  `category_desc` VARCHAR(255) NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`discussions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`discussions` (
  `discussion_id` BIGINT UNSIGNED NOT NULL,
  `discussion_name` VARCHAR(255) NULL,
  PRIMARY KEY (`discussion_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`messages` (
  `message_id` BIGINT UNSIGNED NOT NULL,
  `message` VARCHAR(255) NULL,
  `discussion_id` BIGINT UNSIGNED NOT NULL,
  `from_person_id` INT UNSIGNED NOT NULL,
  `categories_category_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`message_id`),
  INDEX `fk_messages_discussions1_idx` (`discussion_id` ASC),
  INDEX `fk_messages_persons1_idx` (`from_person_id` ASC),
  INDEX `fk_messages_categories1_idx` (`categories_category_id` ASC),
  CONSTRAINT `fk_messages_discussions1`
    FOREIGN KEY (`discussion_id`)
    REFERENCES `quimerat_wgc`.`discussions` (`discussion_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_persons1`
    FOREIGN KEY (`from_person_id`)
    REFERENCES `quimerat_wgc`.`persons` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_categories1`
    FOREIGN KEY (`categories_category_id`)
    REFERENCES `quimerat_wgc`.`categories` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`reasons`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`reasons` (
  `reason_id` INT UNSIGNED NOT NULL,
  `reason` VARCHAR(255) NULL,
  PRIMARY KEY (`reason_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`featured_alumni`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`featured_alumni` (
  `featured_alumni_id` BIGINT NOT NULL,
  `star_dt` DATETIME NULL,
  `end_dt` DATETIME NULL,
  `reason_id` INT UNSIGNED NOT NULL,
  `description` VARCHAR(255) NULL,
  `alumni_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`featured_alumni_id`),
  INDEX `fk_featured_alumni_reasons1_idx` (`reason_id` ASC),
  INDEX `fk_featured_alumni_alumni1_idx` (`alumni_id` ASC),
  CONSTRAINT `fk_featured_alumni_reasons1`
    FOREIGN KEY (`reason_id`)
    REFERENCES `quimerat_wgc`.`reasons` (`reason_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_featured_alumni_alumni1`
    FOREIGN KEY (`alumni_id`)
    REFERENCES `quimerat_wgc`.`alumni` (`alumni_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`groups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`groups` (
  `group_id` BIGINT UNSIGNED NOT NULL,
  `group_name` VARCHAR(255) NULL,
  `group_manager_id` INT UNSIGNED NOT NULL,
  `created_dt` DATETIME NULL,
  PRIMARY KEY (`group_id`),
  INDEX `fk_groups_persons1_idx` (`group_manager_id` ASC),
  CONSTRAINT `fk_groups_persons1`
    FOREIGN KEY (`group_manager_id`)
    REFERENCES `quimerat_wgc`.`persons` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`groups_members`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`groups_members` (
  `group_member_id` INT UNSIGNED NOT NULL,
  `group_id` BIGINT UNSIGNED NOT NULL,
  `person_id` INT UNSIGNED NOT NULL,
  `added_dt` DATETIME NULL,
  PRIMARY KEY (`group_member_id`),
  INDEX `fk_groups_members_persons1_idx` (`person_id` ASC),
  INDEX `fk_groups_members_groups1_idx` (`group_id` ASC),
  CONSTRAINT `fk_groups_members_persons1`
    FOREIGN KEY (`person_id`)
    REFERENCES `quimerat_wgc`.`persons` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_groups_members_groups1`
    FOREIGN KEY (`group_id`)
    REFERENCES `quimerat_wgc`.`groups` (`group_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `quimerat_wgc`.`message_people`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quimerat_wgc`.`message_people` (
  `message_people_id` BIGINT UNSIGNED NOT NULL,
  `message_id` BIGINT UNSIGNED NOT NULL,
  `to_person_id` INT UNSIGNED NOT NULL,
  `to_group_id` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`message_people_id`),
  INDEX `fk_message_people_messages1_idx` (`message_id` ASC),
  INDEX `fk_message_people_persons1_idx` (`to_person_id` ASC),
  INDEX `fk_message_people_groups1_idx` (`to_group_id` ASC),
  CONSTRAINT `fk_message_people_messages1`
    FOREIGN KEY (`message_id`)
    REFERENCES `quimerat_wgc`.`messages` (`message_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_people_persons1`
    FOREIGN KEY (`to_person_id`)
    REFERENCES `quimerat_wgc`.`persons` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_people_groups1`
    FOREIGN KEY (`to_group_id`)
    REFERENCES `quimerat_wgc`.`groups` (`group_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

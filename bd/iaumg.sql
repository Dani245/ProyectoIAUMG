-- MySQL Script generated by MySQL Workbench
-- 06/02/20 10:05:13
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema iaumg
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema iaumg
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `iaumg` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `iaumg` ;

-- -----------------------------------------------------
-- Table `iaumg`.`tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iaumg`.`tipousuario` (
  `idtipousuario` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(25) NOT NULL COMMENT '',
  `descripcion` TEXT NULL COMMENT '',
  PRIMARY KEY (`idtipousuario`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iaumg`.`carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iaumg`.`carrera` (
  `idcarrera` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`idcarrera`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iaumg`.`municipio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iaumg`.`municipio` (
  `idmunicipio` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(150) NOT NULL COMMENT '',
  PRIMARY KEY (`idmunicipio`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iaumg`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iaumg`.`usuarios` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(75) NOT NULL COMMENT '',
  `apellido` VARCHAR(75) NOT NULL COMMENT '',
  `sexo` VARCHAR(1) NOT NULL COMMENT '',
  `direccion` TEXT NOT NULL COMMENT '',
  `carnet` VARCHAR(15) NULL COMMENT '',
  `titulo` TEXT NULL COMMENT '',
  `creditos` INT NULL COMMENT '',
  `telefono` INT NOT NULL COMMENT '',
  `email` VARCHAR(50) NOT NULL COMMENT '',
  `pass` TEXT NOT NULL COMMENT '',
  `idtipousuario` INT NOT NULL COMMENT '',
  `idcarrera` INT NOT NULL COMMENT '',
  `idmunicipio` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idusuarios`)  COMMENT '',
  INDEX `fk_usuarios_tipousuario_idx` (`idtipousuario` ASC)  COMMENT '',
  INDEX `fk_usuarios_carrera1_idx` (`idcarrera` ASC)  COMMENT '',
  INDEX `fk_usuarios_municipio1_idx` (`idmunicipio` ASC)  COMMENT '',
  CONSTRAINT `fk_usuarios_tipousuario`
    FOREIGN KEY (`idtipousuario`)
    REFERENCES `iaumg`.`tipousuario` (`idtipousuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_carrera1`
    FOREIGN KEY (`idcarrera`)
    REFERENCES `iaumg`.`carrera` (`idcarrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_municipio1`
    FOREIGN KEY (`idmunicipio`)
    REFERENCES `iaumg`.`municipio` (`idmunicipio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iaumg`.`semestre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iaumg`.`semestre` (
  `idsemestre` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `idcarrera` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idsemestre`)  COMMENT '',
  INDEX `fk_semestre_carrera1_idx` (`idcarrera` ASC)  COMMENT '',
  CONSTRAINT `fk_semestre_carrera1`
    FOREIGN KEY (`idcarrera`)
    REFERENCES `iaumg`.`carrera` (`idcarrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iaumg`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iaumg`.`curso` (
  `idcurso` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(100) NOT NULL COMMENT '',
  `requisito` VARCHAR(10) NOT NULL COMMENT '',
  `creditos` INT NOT NULL COMMENT '',
  `idsemestre` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idcurso`)  COMMENT '',
  INDEX `fk_curso_semestre1_idx` (`idsemestre` ASC)  COMMENT '',
  CONSTRAINT `fk_curso_semestre1`
    FOREIGN KEY (`idsemestre`)
    REFERENCES `iaumg`.`semestre` (`idsemestre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iaumg`.`asignacion_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iaumg`.`asignacion_usuario` (
  `idasignacion_usuario` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idcurso` INT NOT NULL COMMENT '',
  `idusuarios` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idasignacion_usuario`)  COMMENT '',
  INDEX `fk_asignacion_alumno_curso1_idx` (`idcurso` ASC)  COMMENT '',
  INDEX `fk_asignacion_alumno_usuarios1_idx` (`idusuarios` ASC)  COMMENT '',
  CONSTRAINT `fk_asignacion_alumno_curso1`
    FOREIGN KEY (`idcurso`)
    REFERENCES `iaumg`.`curso` (`idcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_alumno_usuarios1`
    FOREIGN KEY (`idusuarios`)
    REFERENCES `iaumg`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iaumg`.`calificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iaumg`.`calificacion` (
  `idcalificacion` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `p1` INT NULL COMMENT '',
  `p2` INT NULL COMMENT '',
  `p3` INT NULL COMMENT '',
  `tareas` INT NULL COMMENT '',
  `proyecto` INT NULL COMMENT '',
  `examen` INT NULL COMMENT '',
  `total` INT NULL COMMENT '',
  `idusuarios` INT NOT NULL COMMENT '',
  `idcurso` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idcalificacion`)  COMMENT '',
  INDEX `fk_calificacion_usuarios1_idx` (`idusuarios` ASC)  COMMENT '',
  INDEX `fk_calificacion_curso1_idx` (`idcurso` ASC)  COMMENT '',
  CONSTRAINT `fk_calificacion_usuarios1`
    FOREIGN KEY (`idusuarios`)
    REFERENCES `iaumg`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_calificacion_curso1`
    FOREIGN KEY (`idcurso`)
    REFERENCES `iaumg`.`curso` (`idcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP DATABASE IF EXISTS `pinchos`;

CREATE DATABASE `pinchos` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

-- creacion de usuario (dandole todos los privilegios)
GRANT USAGE ON *.* TO 'pinchos'@'localhost';
DROP USER 'pinchos'@'localhost';
CREATE USER 'pinchos'@'localhost' IDENTIFIED BY 'pinchos';
GRANT ALL PRIVILEGES ON `pinchos`.* TO 'pinchos'@'localhost' WITH GRANT OPTION;

-- todas las consultas posteriores pertenecen a la base de datos FLABOO
USE `pinchos`;

-- -----------------------------------------------------
-- All DROPs
-- -----------------------------------------------------

DROP TABLE IF EXISTS `concurso` ;
DROP TABLE IF EXISTS `usuario` ;
DROP TABLE IF EXISTS `participante` ;
DROP TABLE IF EXISTS `pincho` ;
DROP TABLE IF EXISTS `voto` ;
DROP TABLE IF EXISTS `premiados` ;
DROP TABLE IF EXISTS `codVoto` ;


-- -----------------------------------------------------
-- Table `concurso`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `concurso` (
  `idC` INT NOT NULL AUTO_INCREMENT,
  `nombreC` VARCHAR(45) NOT NULL,
  `basesC` VARCHAR(255) NOT NULL,
  `ciudadC` VARCHAR(45) NOT NULL,
  `fechaInicioC` VARCHAR(45) NOT NULL,
  `fechaFinalC` VARCHAR(45) NOT NULL,
  `fechaFinalistasC` VARCHAR(45) NOT NULL,
  `premioC` INT NOT NULL,
  `patrocinadorC` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `usuario` (
  `emailU` VARCHAR(45) NOT NULL,
  `contrasenaU` VARCHAR(45) NOT NULL,
  `tipoU` VARCHAR(1) NOT NULL comment 'J=Jurado popular, S=Jurado profesional, A=admiistador, P=participante',
  `estadoU` TINYINT(1) NOT NULL comment '1=activo, 0=incativo',
  `nombreU` VARCHAR(45) NOT NULL,
  `concursoId` INT,
  PRIMARY KEY (`emailU`),
  FOREIGN KEY (`concursoId`) REFERENCES `concurso` (`idC`)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `participante`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `participante` (
  `direccionP` VARCHAR(45) NOT NULL,
  `telefonoP` INT NOT NULL,
  `nombreLocalP` VARCHAR(45) NOT NULL,
  `horarioP` VARCHAR(45) NOT NULL,
  `paginaWebP` VARCHAR(45) NOT NULL,
  `fotoP` VARCHAR(45) NOT NULL,
  `usuarioEmail` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`usuarioEmail`),
  FOREIGN KEY (`usuarioEmail`) REFERENCES `usuario` (`emailU`)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `pincho`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `pincho` (
  `idPi` INT NOT NULL,
  `nombrePi` VARCHAR(45) NOT NULL,
  `precioPi` INT NOT NULL,
  `ingredientesPi` VARCHAR(255) NOT NULL,
  `cocineroPi` VARCHAR(45) NOT NULL,
  `numvotosPopPi` INT NOT NULL,
  `numvotosProfPi` DOUBLE NOT NULL,
  `fotoPi` VARCHAR(45) NOT NULL,
  `estadoPi` TINYINT(1) NOT NULL comment '1=activo, 0=inactivo',
  `participanteEmail` VARCHAR(45) NOT NULL,
  `numvotePi` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPi`),
  FOREIGN KEY (`participanteEmail`) REFERENCES `participante` (`usuarioEmail`)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



  -- -----------------------------------------------------
  -- Table `codVoto`
  -- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `codVoto` (
  `idCV` VARCHAR(45) NOT NULL,
  `pinchoId` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idCV`, `pinchoId`),
  FOREIGN KEY (`pinchoId`) REFERENCES `pincho`(`idPi`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `premiados`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `premiados` (
  `idPrem` INT NOT NULL,
  `ronda` INT NOT NULL comment '0= ronda popular, 1=ronda profesional, 2=ronda premiados',
  PRIMARY KEY (`idPrem`),
  FOREIGN KEY (`idPrem`) REFERENCES `pincho`(`idPi`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `voto`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `voto` (
  `usuarioEmailU` VARCHAR(45) NOT NULL,
  `pinchoIdPi` INT NOT NULL,
  `codigoPinchoV` VARCHAR(45) NOT NULL,
  `valoracionV` INT NOT NULL,
  PRIMARY KEY (`usuarioEmailU`, `pinchoIdPi`, `codigoPinchoV`),
  FOREIGN KEY (`codigoPinchoV`) REFERENCES `codVoto` (`idCV`),
  FOREIGN KEY (`usuarioEmailU`) REFERENCES `usuario` (`emailU`),
  FOREIGN KEY (`pinchoIdPi`) REFERENCES `pincho` (`idPi`)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


 -- -----------------------------------------------------
-- Datos de prueba
-- -----------------------------------------------------


INSERT INTO `usuario` (`emailU`, `contrasenaU`, `tipoU`, `estadoU`,`nombreU`,`concursoId`) VALUES
('jeni@gmail.com', 'jeni', 'A', '1','jeni vazquez rey',null);

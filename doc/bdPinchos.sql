-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE DATABASE `PINCHOS` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

-- creacion de usuario (dandole todos los privilegios)
GRANT USAGE ON *.* TO 'pinchos'@'localhost';
DROP USER 'pinchos'@'localhost';
CREATE USER 'pinchos'@'localhost' IDENTIFIED BY 'pinchos';
GRANT ALL PRIVILEGES ON `PINCHOS`.* TO 'pinchos'@'localhost' WITH GRANT OPTION;

-- todas las consultas posteriores pertenecen a la base de datos FLABOO
USE `PINCHOS`;

-- -----------------------------------------------------
-- Table `Concurso`
-- -----------------------------------------------------

DROP TABLE IF EXISTS `Concurso` ;
-- creacion de tabla USER
CREATE TABLE IF NOT EXISTS `Concurso` (
  `idC` INT NOT NULL AUTO_INCREMENT,
  `nombreC` VARCHAR(45) NOT NULL,
  `basesC` VARCHAR(255) NOT NULL,
  `ciudadC` VARCHAR(45) NOT NULL,
  `fechaC` VARCHAR(45) NOT NULL,
  `premioC` INT NOT NULL,
  PRIMARY KEY (`idC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Usuario` ;

CREATE TABLE IF NOT EXISTS `Usuario` (
  `emailU` VARCHAR(45) NOT NULL,
  `contrasenaU` VARCHAR(45) NOT NULL,
  `tipoU` VARCHAR(1) NOT NULL,
  `estadoU` TINYINT(1) NOT NULL,
  `nombreU` VARCHAR(45) NOT NULL,
  `concursoId` INT NOT NULL,
  PRIMARY KEY (`emailU`),
  FOREIGN KEY (`ConcursoId`) REFERENCES `Concurso` (`idC`)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `Participante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Participante` ;

CREATE TABLE IF NOT EXISTS `Participante` (
  `direccionP` VARCHAR(45) NOT NULL,
  `telefonoP` INT NOT NULL,
  `nombreLocalP` VARCHAR(45) NOT NULL,
  `horarioP` VARCHAR(45) NOT NULL,
  `paginaWebP` VARCHAR(45) NOT NULL,
  `fotoP` VARCHAR(45) NOT NULL,
  `usuarioEmail` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`UsuarioEmail`),
  FOREIGN KEY (`UsuarioEmail`) REFERENCES `Usuario` (`emailU`)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `Pincho`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Pincho` ;

CREATE TABLE IF NOT EXISTS `Pincho` (
  `idPi` INT NOT NULL AUTO_INCREMENT,
  `nombrePi` VARCHAR(45) NOT NULL,
  `precioPi` INT NOT NULL,
  `descripcionPi` VARCHAR(255) NOT NULL,
  `cocineroPi` VARCHAR(45) NOT NULL,
  `numVotosPi` INT NOT NULL,
  `fotoPi` VARCHAR(45) NOT NULL,
  `estadoPi` TINYINT(1) NOT NULL,
  `ParticipanteEmail` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPi`),
  FOREIGN KEY (`ParticipanteEmail`) REFERENCES `Participante` (`UsuarioEmail`)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `Voto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Voto` ;

CREATE TABLE IF NOT EXISTS `Voto` (
  `usuarioEmailU` VARCHAR(45) NOT NULL,
  `pinchoIdPi` INT NOT NULL,
  `codigoPinchoV` VARCHAR(45) NOT NULL,
  `valoracionV` INT NOT NULL,
  PRIMARY KEY (`UsuarioEmailU`, `PinchoIdPi`, CodigoPinchoV),
  FOREIGN KEY (`UsuarioEmailU`) REFERENCES `Usuario` (`emailU`),
  FOREIGN KEY (`PinchoIdPi`) REFERENCES `Pincho` (`idPi`)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


  
 -- -----------------------------------------------------
-- Datos de prueba
-- -----------------------------------------------------

INSERT INTO `Concurso` (`idC`,`nombreC`, `basesC`, `ciudadC`, `fechaC`, `premioC`) VALUES
('1','Concurso Ourense', 'estas son las bases del concurso', 'Ourense', '23/10/2015', '2000');

INSERT INTO `Usuario` (`emailU`, `contrasenaU`, `tipoU`, `estadoU`,`nombreU`,`concursoId`) VALUES
('jeni@gmail.com', 'jeni', 'A', '1','jeni vazquez rey','1'),
('adri@gmail.com', 'adri', 'J', '1', 'adrian gonzalez barbosa','1'),
('mel@gmail.com', 'mel', 'S', '1','melania sanchez blanco','1'),
('oscar@gmail.com', 'oscar', 'S', '1','oscar vazquez rey','1'),
('julian@gmail.com', 'julian', 'P', '1', 'julian gonzalez barbosa','1'),
('hector@gmail.com', 'hector', 'P', '1','hector sanchez blanco','1'),
('marta@gmail.com', 'julian', 'P', '1', 'marta gonzalez barbosa','1'),
('pablo@gmail.com', 'hector', 'P', '1','pablo sanchez blanco','1'),
('ruben@gmail.com', 'ruben', 'J', '1','ruben riande gil','1');

INSERT INTO `Participante` (`direccionP`, `telefonoP`, `nombreLocalP`, `horarioP`,`paginaWebP`,`fotoP`,`usuarioEmail`) VALUES
('Ourense', '666666666', 'Escher', 'De 9:00 a 23:00','aqui va la pag web','aqui va la foto','julian@gmail.com'),
('Vigo', '999999999', 'Graduado', 'De 9:00 a 23:00', 'aqui va la pag web','aqui va la foto','hector@gmail.com'),
('Madrid', '655555555', 'Flamingo', 'De 9:00 a 23:00','aqui va la pag web','aqui va la foto','marta@gmail.com'),
('Carballino', '633333333', 'Enxogo', 'De 9:00 a 23:00','aqui va la pag web','aqui va la foto','pablo@gmail.com');

INSERT INTO `Pincho` (`idPi`, `nombrePi`, `precioPi`, `descripcionPi`,`cocineroPi`,`numVotosPi`,`fotoPi`,`estadoPi`,`ParticipanteEmail`) VALUES
('1', 'jamon', '1', 'bueno','juan','1','aqui va la foto','1','julian@gmail.com'),
('2', 'queso', '2', 'malo', 'pepe','3','aqui va la foto','1','hector@gmail.com'),
('3', 'bacon', '3', 'buenisimo','carmen','2','aqui va la foto','5','marta@gmail.com'),
('4', 'mortadela', '2', 'malisimo','roberto','0','aqui va la foto','1','pablo@gmail.com');

INSERT INTO `Voto` (`usuarioEmailU`, `pinchoIdPi`, `codigoPinchoV`, `valoracionV`) VALUES
('adri@gmail.com', '1', '11', '5'),
('mel@gmail.com', '2', '21', '3'),
('ruben@gmail.com', '2', '22','8'),
('adri@gmail.com', '2', '23', '9'),
('ruben@gmail.com', '3', '31','8'),
('mel@gmail.com', '3', '32', '3');


 


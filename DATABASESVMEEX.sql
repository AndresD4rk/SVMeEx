/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `sme` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sme`;

CREATE TABLE IF NOT EXISTS `carrito` (
  `idcar` int NOT NULL AUTO_INCREMENT,
  `idusu` int NOT NULL,
  `tolcar` double DEFAULT '0',
  `estado` int unsigned DEFAULT NULL,
  PRIMARY KEY (`idcar`),
  KEY `FK__usuario1` (`idusu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `categoria` (
  `idcat` int NOT NULL AUTO_INCREMENT,
  `nomcat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `categoria` (`idcat`, `nomcat`) VALUES
	(1, 'Lácteos'),
	(2, 'Pastas'),
	(3, 'Sal'),
	(4, 'Baño'),
	(5, 'Cuidado Personal'),
	(6, 'Galletas');

CREATE TABLE IF NOT EXISTS `compra` (
  `idcom` int NOT NULL AUTO_INCREMENT,
  `idcar` int DEFAULT NULL,
  `feccom` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idcom`),
  KEY `FK_compra_carrito` (`idcar`),
  CONSTRAINT `FK_compra_carrito` FOREIGN KEY (`idcar`) REFERENCES `carrito` (`idcar`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `detcarrito` (
  `iddetcar` int NOT NULL AUTO_INCREMENT,
  `idcar` int NOT NULL,
  `idpro` int NOT NULL,
  `canpro` int DEFAULT NULL,
  `precom` double DEFAULT NULL,
  PRIMARY KEY (`iddetcar`),
  KEY `FK__producto` (`idpro`),
  KEY `FK_detcarrito_carrito` (`idcar`),
  CONSTRAINT `FK__producto` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`),
  CONSTRAINT `FK_detcarrito_carrito` FOREIGN KEY (`idcar`) REFERENCES `carrito` (`idcar`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `direccion` (
  `iddir` int NOT NULL,
  `idusu` int DEFAULT NULL,
  `nomdir` varchar(100) DEFAULT NULL,
  `detdir` varchar(300) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  PRIMARY KEY (`iddir`),
  KEY `FK__usuario2` (`idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `entrega` (
  `ident` int NOT NULL AUTO_INCREMENT,
  `idcom` int DEFAULT NULL,
  `estent` int DEFAULT NULL,
  `dirent` varchar(100) DEFAULT NULL,
  `detent` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ident`),
  KEY `FK_entrega_compra` (`idcom`),
  CONSTRAINT `FK_entrega_compra` FOREIGN KEY (`idcom`) REFERENCES `compra` (`idcom`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `entregarepartidor` (
  `ident` int DEFAULT NULL,
  `idusu` int DEFAULT NULL,
  KEY `FK_entregarepartido_entrega` (`ident`),
  KEY `FK_entregarepartido_usuario` (`idusu`),
  CONSTRAINT `FK_entregarepartido_entrega` FOREIGN KEY (`ident`) REFERENCES `entrega` (`ident`),
  CONSTRAINT `FK_entregarepartido_usuario` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `inventario` (
  `idinv` int NOT NULL AUTO_INCREMENT,
  `caninv` int DEFAULT NULL,
  `mininv` int DEFAULT NULL,
  `idpro` int DEFAULT NULL,
  PRIMARY KEY (`idinv`),
  KEY `FK__producto1` (`idpro`),
  CONSTRAINT `FK__producto1` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `inventario` (`idinv`, `caninv`, `mininv`, `idpro`) VALUES
	(1, 20, 10, 1),
	(2, 30, 12, 2),
	(3, 40, 18, 3),
	(4, 50, 22, 4),
	(5, 100, 50, 5),
	(6, 120, 50, 6),
	(7, 80, 30, 7),
	(8, 60, 25, 8),
	(9, 50, 23, 9),
	(10, 70, 30, 10),
	(11, 40, 18, 11),
	(12, 55, 25, 12);

CREATE TABLE IF NOT EXISTS `producto` (
  `idpro` int NOT NULL,
  `nompro` varchar(150) DEFAULT NULL,
  `despro` varchar(300) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `idcat` int NOT NULL,
  PRIMARY KEY (`idpro`),
  KEY `FK__categoria` (`idcat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `producto` (`idpro`, `nompro`, `despro`, `precio`, `idcat`) VALUES
	(1, 'Leche Alquería Deslactosada 1,3 Litros X6', 'Frescura y sabor sin lactosa. Ideal para intolerantes y amantes de la leche. Aprovecha este paquete de 6 unidades.', 41700, 1),
	(2, 'Queso Mozzarella Colanta Tajado 250g', 'Disfruta del sabor auténtico de la mozzarella con la comodidad de las rebanadas. Perfecto para pizzas y bocadillos. Calidad Colanta en cada mordisco.', 11300, 1),
	(3, 'Margarina La Fina 4 Barras x125g', 'La elección perfecta para tu cocina. Cuatro prácticas barras de 125 gramos cada una. Ideal para cocinar y untar. Calidad La Fina en cada bocado.', 9990, 1),
	(4, 'Pasta Spaguetti La Muñeca 1Kg', 'Descubre la auténtica pasta italiana en tu cocina. Con la Pasta Spaghetti La Muñeca de 1 kilogramo, disfrutarás de deliciosos platos de pasta. Un básico versátil que nunca debe faltar en tu despensa.', 6540, 2),
	(5, 'Pasta Spaguetti La Muñeca 250g', 'Disfruta de la auténtica pasta italiana en cada bocado. Esta pasta de 250 gramos es perfecta para preparar platos deliciosos y rápidos. Añade sabor italiano a tu cocina con Spaghetti La Muñeca.', 2590, 2),
	(6, 'Pasta Corriente Conchas Doria 250g', 'La elección perfecta para tus recetas de pasta favoritas. Estas conchas de 250 gramos son ideales para crear platos deliciosos y satisfactorios. Añade sabor y textura a tus comidas con la pasta Doria.', 2150, 2),
	(7, 'Sal Refisal 500g', 'La sal de confianza en tu cocina. Este paquete de 500 gramos de sal Refisal es esencial para dar sabor y realzar tus comidas. Añade el toque perfecto de salinidad a tus platos.', 1300, 3),
	(8, 'Salero Refisal 130g', 'La comodidad de la sal en un práctico salero. Este salero de 130 gramos de sal Refisal es perfecto para sazonar tus comidas al gusto. Lleva la sal Refisal contigo y disfruta de tus platos favoritos en cualquier momento.', 1350, 3),
	(9, 'Papel Higiénico Acolchamax Megarollo 12 Rollos', 'La suavidad y resistencia que tu familia merece. Con 12 rollos de Papel Higiénico Acolchamax Megarollo, disfrutarás de la comodidad y durabilidad en cada uso. Asegura la frescura en tu baño con Acolchamax.', 30200, 4),
	(10, 'Jabón Rexona Antibacterial Avena 3X120 g', 'Protección y cuidado en cada lavado. Estos tres jabones de 120 gramos de Rexona con avena no solo limpian, sino que también brindan una protección antibacteriana adicional. Disfruta de la frescura y suavidad en tu piel con Rexona.', 11400, 5),
	(11, 'Galletas Chokis Clasica 222g 6 Unidades', 'El sabor clásico que todos aman. Con este paquete de 6 unidades de Galletas Chokis, disfrutarás de la deliciosa combinación de chocolate y galleta. Un bocadillo perfecto para compartir en cualquier momento.', 9200, 6),
	(12, 'Galleta Noel Saltin Tradicional 3 Tacos X 300g', 'El crujido inconfundible que adoras. Las Galletas Noel Saltín Tradicional son perfectas para acompañar tus bocadillos favoritos. Su sabor y textura únicos las convierten en un clásico. Disfruta de la tradición de Noel.', 5250, 6);

CREATE TABLE IF NOT EXISTS `seguridad` (
  `correo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `idusu` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`correo`) USING BTREE,
  KEY `FK_seguridad_usuario` (`idusu`),
  CONSTRAINT `FK_seguridad_usuario` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`idusu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `seguridad` (`correo`, `clave`, `idusu`) VALUES
	('admin@svmeex.com', 'admin123', 1),
	('alejandroR@svmeex.com', 'alejandror', 2),
	('juan@gmail.com', 'juan123', 4),
	('laura@gmail.com', 'laura123', 5),
	('mariaR@svmeex.com', 'mariar', 3);

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusu` int NOT NULL AUTO_INCREMENT,
  `prinom` varchar(50) DEFAULT NULL,
  `segnom` varchar(50) DEFAULT NULL,
  `priape` varchar(50) DEFAULT NULL,
  `segape` varchar(50) DEFAULT NULL,
  `numcel` bigint DEFAULT NULL,
  `rol` int DEFAULT NULL,
  PRIMARY KEY (`idusu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `usuario` (`idusu`, `prinom`, `segnom`, `priape`, `segape`, `numcel`, `rol`) VALUES
	(1, 'Admin', 'Principal', 'SVMeEX', '2023', 3210000000, 1),
	(2, 'Alejandro', 'Javier', 'Peréz', 'Lopéz', 3210000010, 3),
	(3, 'María', 'Isabel', 'Rodríguez', 'Sánchez', 3210000011, 3),
	(4, 'Juan', 'Carlos', 'Martínez', 'Gonzáles', 3210000100, 2),
	(5, 'Laura', 'Elena', 'Fernández', 'Pérez', 3210000101, 2);

SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `zdetcarrito_after_delete` BEFORE DELETE ON `detcarrito` FOR EACH ROW BEGIN
	UPDATE carrito
	SET tolcar = (tolcar)-(OLD.canpro * OLD.precom)
	WHERE idcar = OLD.idcar;
	UPDATE inventario
	SET caninv = caninv+OLD.canpro
	WHERE idpro = OLD.idpro;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `zdetcarrito_after_insert` AFTER INSERT ON `detcarrito` FOR EACH ROW BEGIN
	UPDATE carrito
	SET tolcar = tolcar+(NEW.canpro * NEW.precom)
	WHERE idcar = NEW.idcar;
	UPDATE inventario
	SET caninv = caninv-(NEW.canpro)
	WHERE idpro = NEW.idpro;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `zdetcarrito_after_update` AFTER UPDATE ON `detcarrito` FOR EACH ROW BEGIN
	UPDATE carrito
	SET tolcar = (tolcar)+((NEW.canpro * NEW.precom) - (OLD.canpro * OLD.precom))
	WHERE idcar = OLD.idcar;
	UPDATE inventario
	SET caninv = caninv-(NEW.canpro-OLD.canpro)
	WHERE idpro = NEW.idpro;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `zproducto_after_update` AFTER UPDATE ON `producto` FOR EACH ROW BEGIN
		-- Crear una tabla temporal para almacenar los resultados de la subconsulta
CREATE TEMPORARY TABLE TempTable AS
SELECT d.iddetcar
FROM detcarrito AS d
INNER JOIN carrito AS c ON c.idcar = d.idcar
WHERE d.idpro = OLD.idpro AND c.estado = 1;

-- Actualizar la tabla detcarrito utilizando la tabla temporal
UPDATE detcarrito AS dc
INNER JOIN TempTable AS tt ON dc.iddetcar = tt.iddetcar
SET dc.precom = NEW.precio;

-- Eliminar la tabla temporal
DROP TEMPORARY TABLE TempTable;	
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

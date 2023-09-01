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
  `idcar` int NOT NULL,
  `idusu` int NOT NULL,
  `tolcat` double DEFAULT NULL,
  `estado` int unsigned DEFAULT NULL,
  PRIMARY KEY (`idcar`),
  KEY `FK__usuario1` (`idusu`),
  CONSTRAINT `FK__usuario1` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `categoria` (
  `idcat` int NOT NULL,
  `nomcat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `compra` (
  `idcom` int NOT NULL,
  `idcar` int DEFAULT NULL,
  `feccom` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idcom`),
  KEY `FK__carrito1` (`idcar`),
  CONSTRAINT `FK__carrito1` FOREIGN KEY (`idcar`) REFERENCES `carrito` (`idcar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `detcarrito` (
  `iddetcar` int NOT NULL,
  `idcar` int NOT NULL,
  `idpro` int NOT NULL,
  `canpro` int DEFAULT NULL,
  `precom` int DEFAULT NULL,
  PRIMARY KEY (`iddetcar`),
  KEY `FK__carrito` (`idcar`),
  KEY `FK__producto` (`idpro`),
  CONSTRAINT `FK__carrito` FOREIGN KEY (`idcar`) REFERENCES `carrito` (`idcar`),
  CONSTRAINT `FK__producto` FOREIGN KEY (`idpro`) REFERENCES `producto` (`idpro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `direccion` (
  `iddir` int NOT NULL,
  `idusu` int DEFAULT NULL,
  `nomdir` varchar(100) DEFAULT NULL,
  `detdir` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`iddir`),
  KEY `FK__usuario2` (`idusu`),
  CONSTRAINT `FK__usuario2` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `entrega` (
  `ident` int NOT NULL,
  `idcom` int DEFAULT NULL,
  `estent` int DEFAULT NULL,
  `dirent` varchar(100) DEFAULT NULL,
  `detent` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ident`),
  KEY `FK__compra` (`idcom`),
  CONSTRAINT `FK__compra` FOREIGN KEY (`idcom`) REFERENCES `compra` (`idcom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `producto` (
  `idpro` int NOT NULL,
  `nompro` varchar(150) DEFAULT NULL,
  `despro` varchar(300) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `idcat` int DEFAULT NULL,
  PRIMARY KEY (`idpro`),
  KEY `FK__categoria` (`idcat`),
  CONSTRAINT `FK__categoria` FOREIGN KEY (`idcat`) REFERENCES `categoria` (`idcat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `seguridad` (
  `correo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `idusu` int DEFAULT NULL,
  PRIMARY KEY (`correo`) USING BTREE,
  KEY `FK__usuario` (`idusu`),
  CONSTRAINT `FK__usuario` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusu` int NOT NULL,
  `prinom` varchar(50) DEFAULT NULL,
  `segnom` varchar(50) DEFAULT NULL,
  `priape` varchar(50) DEFAULT NULL,
  `segape` varchar(50) DEFAULT NULL,
  `rol` int DEFAULT NULL,
  PRIMARY KEY (`idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

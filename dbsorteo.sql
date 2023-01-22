-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.25-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para dbsorteo
CREATE DATABASE IF NOT EXISTS `dbsorteo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dbsorteo`;

-- Volcando estructura para tabla dbsorteo.boletos
CREATE TABLE IF NOT EXISTS `boletos` (
  `id_boleto` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_sorteo` int(11) NOT NULL,
  `numero_boleto` int(4) NOT NULL,
  `fecha_compra` date NOT NULL,
  PRIMARY KEY (`id_boleto`) USING BTREE,
  KEY `IdUsuario` (`id_usuario`) USING BTREE,
  CONSTRAINT `FK_boletos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.boletos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla dbsorteo.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(70) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo_electronico` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.empresas: ~1 rows (aproximadamente)
INSERT INTO `empresas` (`id_empresa`, `nombre_empresa`, `direccion`, `telefono`, `correo_electronico`) VALUES
	(1, 'SULA', 'Col. Victor F. Ardón, Tegucigalpa M.D.C', '12345678', 'ventas@sula.hn'),
	(2, 'PIZZA HUT', 'COL. TEPEYAC', '22222222', 'pizzahut@pizza.hn');

-- Volcando estructura para tabla dbsorteo.parametros
CREATE TABLE IF NOT EXISTS `parametros` (
  `id_parametro` int(11) NOT NULL AUTO_INCREMENT,
  `parametro` varchar(60) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_parametro`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.parametros: ~0 rows (aproximadamente)

-- Volcando estructura para tabla dbsorteo.premios_sorteo
CREATE TABLE IF NOT EXISTS `premios_sorteo` (
  `id_premio_sorteo` int(11) NOT NULL AUTO_INCREMENT,
  `id_sorteo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_premio_sorteo`) USING BTREE,
  KEY `IdSorteo` (`id_sorteo`) USING BTREE,
  KEY `IdUsuario` (`id_usuario`) USING BTREE,
  CONSTRAINT `FK_premios_sorteo_sorteos` FOREIGN KEY (`id_sorteo`) REFERENCES `sorteos` (`id_sorteo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_premios_sorteo_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.premios_sorteo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla dbsorteo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.roles: ~1 rows (aproximadamente)
INSERT INTO `roles` (`id_rol`, `rol`, `descripcion`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'ADMINISTRADOR', 'Administrador del sistema', 'prueba', '2023-01-18 20:42:58', NULL, NULL),
	(2, 'EMPLEADO', 'Encargado de monitorear actividad de usuarios', 'prueba', '2023-01-19 07:42:09', NULL, NULL),
	(3, 'PARTICIPANTE', 'Usuario que participa en los sorteos de la página, sin ningun privilegio administrativo', 'prueba', '2023-01-22 12:06:58', NULL, NULL);

-- Volcando estructura para tabla dbsorteo.sorteos
CREATE TABLE IF NOT EXISTS `sorteos` (
  `id_sorteo` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `nombre_sorteo` varchar(50) NOT NULL,
  `fecha_realizacion` date NOT NULL,
  PRIMARY KEY (`id_sorteo`) USING BTREE,
  KEY `IdEmpresa` (`id_empresa`) USING BTREE,
  CONSTRAINT `FK_sorteos_empresas` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.sorteos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla dbsorteo.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `estado` enum('Activo','Inactivo','Bloqueado') NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `fecha_ultima_conexion` datetime DEFAULT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `creado_por` varchar(30) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(30) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  KEY `FK_empleados_roles` (`id_rol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.usuarios: ~5 rows (aproximadamente)
INSERT INTO `usuarios` (`id_usuario`, `usuario`, `nombre_usuario`, `estado`, `contrasena`, `dni`, `telefono`, `id_rol`, `fecha_ultima_conexion`, `correo_electronico`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(214, 'HOLA', 'KDAKDHK', 'Activo', '$2y$12$//BNSmFSzukX25zIWFduR..TxqBVeoVCDV1HL2fn8ofHAuOBCRZfS', '0801-1997-13452', '12345678', 1, NULL, 'hola@hola.com', 'prueba', '2023-01-21 15:38:32', NULL, NULL),
	(215, 'JUAN', 'JUAN LUIS', 'Activo', '$2y$12$HX8Ug82CzgiRHc1BUE5RIeqI.Cn2QI4XKm8bYldPxBS/jRO2cM8L6', '0801-1997-13452', '12345678', 2, NULL, 'juan@gmail.com', 'prueba', '2023-01-21 15:39:26', NULL, NULL),
	(216, 'HJKHJKHJK', 'KHJHJKHJKH', 'Activo', '$2y$12$GxfO768wGA7lZyD/pVKRw.itU27.NOn7g5gkvSeiu/LxhMc94cFay', '0801-1997-13452', '12345678', 1, NULL, 'kjfhjksdhfsd@hskdj.com', 'prueba', '2023-01-21 20:42:43', NULL, NULL),
	(217, 'JSHDKHADJK', 'KHFKJHSKDFH', 'Activo', '$2y$12$UUU1GzYQyRv350RcojnRceCk3gVdEEjCt5klyR4x7oomC3kItkHVy', '0801-1997-13452', '12345678', 1, NULL, 'fjkhjks@gmail.ciom', 'prueba', '2023-01-21 20:47:59', NULL, NULL),
	(218, 'prueba', 'Prueba', 'Activo', '$2y$12$i836qbF5sxjT0I2VHP13XeLQ7ZdbVu28cmy1bKjsxQUM9mk6aBV/S', '0801-1997-13452', '12345678', 1, NULL, 'prueba@admin.com', 'prueba', '2023-01-22 12:03:31', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

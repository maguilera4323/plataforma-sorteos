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
  `IdBoleto` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsuario` int(11) NOT NULL,
  `IdSorteo` int(11) NOT NULL,
  `NumeroBoleto` int(4) NOT NULL,
  `FechaCompra` date NOT NULL,
  PRIMARY KEY (`IdBoleto`) USING BTREE,
  KEY `IdUsuario` (`IdUsuario`),
  CONSTRAINT `boletos_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.boletos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla dbsorteo.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `nombre_empleados` varchar(100) NOT NULL,
  `estado_empleado` enum('Activo','Inactivo','Bloqueado') NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `fecha_ultima_conexion` datetime DEFAULT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `creado_por` varchar(30) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(30) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_empleado`) USING BTREE,
  KEY `FK_empleados_roles` (`id_rol`) USING BTREE,
  CONSTRAINT `FK_empleados_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.empleados: ~29 rows (aproximadamente)
INSERT INTO `empleados` (`id_empleado`, `usuario`, `nombre_empleados`, `estado_empleado`, `contrasena`, `id_rol`, `fecha_ultima_conexion`, `correo_electronico`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'ADMIN', 'ADMINISTRADOR', 'Activo', '123456', 1, '2023-01-18 20:43:30', 'admin@admin.com', 'prueba', '2023-01-18 20:44:00', NULL, NULL),
	(2, 'ADMIN2', 'LORD JOH', 'Activo', '123456', 2, '2023-01-18 20:44:48', 'joh@robo.hn', 'prueba', '2023-01-18 20:44:00', NULL, NULL),
	(3, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:45:47', NULL, NULL),
	(4, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:46:23', NULL, NULL),
	(5, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:46:23', NULL, NULL),
	(6, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:46:48', NULL, NULL),
	(7, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:46:48', NULL, NULL),
	(8, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:46:48', NULL, NULL),
	(9, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:46:48', NULL, NULL),
	(10, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:46:48', NULL, NULL),
	(11, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:46:48', NULL, NULL),
	(12, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:46:48', NULL, NULL),
	(13, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:46:48', NULL, NULL),
	(14, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(15, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(16, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(17, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(18, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(19, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(20, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(21, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(22, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(23, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(24, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(25, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(26, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(27, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(28, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(29, 'MARIO', 'MARIO RIOS', 'Activo', 'AAAAAA', 1, NULL, 'marios@marios.com', 'prueba', '2023-01-19 06:47:09', NULL, NULL),
	(30, 'MIA', 'KHALIFA', 'Activo', '$2y$12$amt.RLBCU7WZKiL2.KP77u8uiksl5NGCtanPoripdZARvPAlW9oZm', 2, NULL, 'mia@nopor.com', 'prueba', '2023-01-19 08:13:57', NULL, NULL),
	(31, 'JESUS', 'CRISTO', 'Activo', '$2y$12$X7yQK0NZgQOhDoTACjJxYObS.q8.EwWUYgwe/Wcbgv3rmZcUWe74O', 1, NULL, 'jesus@administracion.cielo.org', 'prueba', '2023-01-19 08:14:52', NULL, NULL),
	(32, 'SHOKO', 'MINAMI', 'Activo', '$2y$12$XNz70P/S/MhlH9YFxzORhuyLEuhATELGuu7ngFAE1N9f785Pf/2mO', 2, NULL, 'minamishoko@gmail.com', 'prueba', '2023-01-19 08:15:46', NULL, NULL);

-- Volcando estructura para tabla dbsorteo.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEmpresa` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  PRIMARY KEY (`IdEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.empresas: ~0 rows (aproximadamente)

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

-- Volcando estructura para tabla dbsorteo.premios
CREATE TABLE IF NOT EXISTS `premios` (
  `IdPremio` int(11) NOT NULL AUTO_INCREMENT,
  `IdSorteo` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdPremio`) USING BTREE,
  KEY `IdUsuario` (`IdUsuario`),
  KEY `IdSorteo` (`IdSorteo`),
  CONSTRAINT `premios_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `premios_ibfk_2` FOREIGN KEY (`IdSorteo`) REFERENCES `sorteos` (`IdSorteo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.premios: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.roles: ~2 rows (aproximadamente)
INSERT INTO `roles` (`id_rol`, `rol`, `descripcion`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'ADMINISTRADOR', 'Administrador del sistema', 'prueba', '2023-01-18 20:42:58', NULL, NULL),
	(2, 'EMPLEADO', 'Encargado de monitorear actividad de usuarios', 'prueba', '2023-01-19 07:42:09', NULL, NULL);

-- Volcando estructura para tabla dbsorteo.sorteos
CREATE TABLE IF NOT EXISTS `sorteos` (
  `IdSorteo` int(11) NOT NULL AUTO_INCREMENT,
  `IdEmpresa` int(11) NOT NULL,
  `NombreSorteo` varchar(50) NOT NULL,
  `FechaRealizacion` date NOT NULL,
  PRIMARY KEY (`IdSorteo`) USING BTREE,
  KEY `IdEmpresa` (`IdEmpresa`),
  CONSTRAINT `sorteos_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresas` (`IdEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.sorteos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla dbsorteo.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `NumeroIdentidad` varchar(13) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.usuarios: ~0 rows (aproximadamente)
INSERT INTO `usuarios` (`IdUsuario`, `usuario`, `contrasena`, `NombreUsuario`, `NumeroIdentidad`, `Telefono`, `Correo`) VALUES
	(1, 'prueba', '$2y$12$i836qbF5sxjT0I2VHP13XeLQ7ZdbVu28cmy1bKjsxQUM9mk6aBV/S', 'Prueba', '04829482984', '12345678', 'dfam,asm');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

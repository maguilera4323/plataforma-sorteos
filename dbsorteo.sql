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
  KEY `IdUsuario` (`id_usuario`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.boletos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla dbsorteo.boletos_adquiridos
CREATE TABLE IF NOT EXISTS `boletos_adquiridos` (
  `id_sorteo` int(11) NOT NULL AUTO_INCREMENT,
  `boletos_adquiridos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sorteo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.boletos_adquiridos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla dbsorteo.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(70) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo_electronico` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.empresas: ~3 rows (aproximadamente)
INSERT INTO `empresas` (`id_empresa`, `nombre_empresa`, `direccion`, `telefono`, `correo_electronico`) VALUES
	(1, 'SULA', 'Col. Victor F. Ardón, Tegucigalpa M.D.C', '12345678', 'ventas@sula.hn'),
	(2, 'PIZZA HUT', 'COL. TEPEYAC', '22222222', 'pizzahut@pizza.hn'),
	(4, 'MENDELS', 'sps', '12345677', 'soporte@mendels.hn');

-- Volcando estructura para tabla dbsorteo.modulos
CREATE TABLE IF NOT EXISTS `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipo_modulo` enum('Home','Empresas','Sorteos','Premios','Configuracion','Administracion') NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.modulos: ~2 rows (aproximadamente)
INSERT INTO `modulos` (`id_modulo`, `modulo`, `descripcion`, `tipo_modulo`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'HOME', 'Pagina principal de sistema', 'Home', 'prueba', '2023-01-24 23:26:45', 'prueba', '2023-01-24 23:34:08'),
	(3, 'EMPRESAS', 'Contiene las empresas que trabajan con la plataforma', 'Empresas', 'prueba', '2023-01-25 11:23:21', NULL, NULL);

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

-- Volcando estructura para tabla dbsorteo.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id_rol` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `tipo_modulo` enum('Home','Empresas','Sorteos','Premios','Configuración','Administración') NOT NULL,
  `permiso_insercion` varchar(5) NOT NULL,
  `permiso_actualizacion` varchar(5) NOT NULL,
  `permiso_eliminacion` varchar(5) NOT NULL,
  `permiso_consulta` varchar(5) NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  KEY `Índice 1` (`id_rol`),
  KEY `Índice 2` (`id_modulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.permisos: ~5 rows (aproximadamente)
INSERT INTO `permisos` (`id_rol`, `id_modulo`, `tipo_modulo`, `permiso_insercion`, `permiso_actualizacion`, `permiso_eliminacion`, `permiso_consulta`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 1, 'Home', '1', '1', '1', '1', 'prueba', '2023-01-27 10:19:47', 'prueba', '2023-01-27 10:38:19'),
	(1, 3, 'Empresas', '1', '1', '1', '1', 'prueba', '2023-01-27 10:19:59', NULL, NULL),
	(3, 1, 'Home', '1', '0', '0', '1', 'prueba', '2023-01-27 10:20:13', NULL, NULL),
	(2, 1, 'Home', '1', '1', '1', '0', 'prueba', '2023-01-27 10:21:02', NULL, NULL),
	(3, 3, 'Empresas', '0', '1', '0', '1', 'prueba', '2023-01-27 10:36:04', 'prueba', '2023-01-27 10:38:26');

-- Volcando estructura para tabla dbsorteo.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `sexo` enum('Masculino','Femenino') DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `creado_por` varchar(30) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `modificado_por` varchar(30) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.personas: ~15 rows (aproximadamente)
INSERT INTO `personas` (`id_persona`, `nombres`, `apellidos`, `dni`, `telefono`, `sexo`, `direccion`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'PABLO', 'SEVILLA', '1203199623456', '99999999', 'Masculino', 'Col. Nueva Suyapa, sector 2, casa 17. Tegucigalpa M.D.C', 'admin', '2023-01-28 13:39:04', NULL, NULL),
	(2, 'jkhkasdjh', 'hkjhkjhjk', '111111111111', '1111111', 'Masculino', 'jhgjhghkggggjh', 'admin', '2023-01-28 14:51:27', NULL, NULL),
	(3, 'MARIA', 'SALGADO', '0801199812456', '99999999', 'Femenino', 'no se crack', 'prueba', '2023-01-28 15:33:56', NULL, NULL),
	(4, 'jhghkhjkhjk', 'hjkhkjhjk', '897897797', '78977789', 'Masculino', 'jhgjhgjhgggjh', 'admin', '2023-01-28 15:35:46', NULL, NULL),
	(5, 'hvvjhvj', 'jhvjhvjhh', '878678678', '786786678', 'Masculino', 'jkhhjkhjkhjk', 'admin', '2023-01-28 15:36:10', NULL, NULL),
	(6, 'ANTONY', 'MARK', '8888888888888', '11111111', 'Femenino', 'jhjjgjgjgjh', 'prueba', '2023-01-28 15:37:05', NULL, NULL),
	(7, 'guigig', 'igigigi', '7896789789', '978978978', 'Masculino', '78978978979', '987897', '2023-01-28 15:40:25', NULL, NULL),
	(8, 'gghjh', 'hjkhjk', '789789', '7897897', 'Masculino', 'jhjjkhjk', 'yuui', '2023-01-28 15:40:50', NULL, NULL),
	(9, 'GFHFGFJH', 'GGGGJHG', '786666666666', '11111111', 'Masculino', 'ghfghfghfghfh', 'prueba', '2023-01-28 15:41:42', NULL, NULL),
	(10, 'kbmnbbk', 'jknbnb', 'jnbmnb', 'mnbmnbmnbmn', 'Masculino', 'mbnmnbmn', 'bnvbnvbn', '2023-01-28 15:45:09', NULL, NULL),
	(11, 'FSDFSFS', 'SDFSDFSD', '3534534534', '3123123123', 'Femenino', 'fvgvsvsdvd', 'prueba', '2023-01-28 15:46:25', NULL, NULL),
	(12, 'FSDFSFS', 'SDFSDFSD', '3534534534', '3123123123', 'Femenino', 'fvgvsvsdvd', 'prueba', '2023-01-28 15:47:18', NULL, NULL),
	(13, 'GFSFSDFFFSDFSD', 'SDFSDFSD', '3534534534', '3123123123', 'Femenino', 'fvgvsvsdvd', 'prueba', '2023-01-28 15:48:22', NULL, NULL),
	(14, 'MARINA', 'DIAMANDIS', '0801199719345', '11111111', 'Femenino', 'jkhjkhjkh', 'prueba', '2023-01-28 15:58:28', NULL, NULL),
	(15, 'JORGE', 'ASDFG', '1234567890111', '12345678', 'Masculino', 'Col. San Jose del Carmen, Tegucigalpa M.D.C', 'prueba', '2023-01-28 16:01:58', NULL, NULL);

-- Volcando estructura para tabla dbsorteo.premios
CREATE TABLE IF NOT EXISTS `premios` (
  `id_premio` int(11) NOT NULL AUTO_INCREMENT,
  `id_sorteo` int(11) NOT NULL,
  `nombre_premio` varchar(300) NOT NULL,
  `foto_premio` varchar(300) NOT NULL,
  PRIMARY KEY (`id_premio`) USING BTREE,
  KEY `Índice 2` (`id_sorteo`) USING BTREE,
  CONSTRAINT `FK_premios_sorteos` FOREIGN KEY (`id_sorteo`) REFERENCES `sorteos` (`id_sorteo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.premios: ~1 rows (aproximadamente)
INSERT INTO `premios` (`id_premio`, `id_sorteo`, `nombre_premio`, `foto_premio`) VALUES
	(1, 2, 'CASA', '../vistas/assets/premios/1f3e0.png');

-- Volcando estructura para tabla dbsorteo.premios_sorteo
CREATE TABLE IF NOT EXISTS `premios_sorteo` (
  `id_premio_sorteo` int(11) NOT NULL AUTO_INCREMENT,
  `id_sorteo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_premio` int(11) DEFAULT NULL,
  `estado` enum('Pendiente','Reclamado') DEFAULT NULL,
  PRIMARY KEY (`id_premio_sorteo`) USING BTREE,
  KEY `IdSorteo` (`id_sorteo`) USING BTREE,
  KEY `IdUsuario` (`id_usuario`) USING BTREE,
  KEY `FK_premios_sorteo_premios` (`id_premio`),
  CONSTRAINT `FK_premios_sorteo_premios` FOREIGN KEY (`id_premio`) REFERENCES `premios` (`id_premio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_premios_sorteo_sorteos` FOREIGN KEY (`id_sorteo`) REFERENCES `sorteos` (`id_sorteo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.premios_sorteo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla dbsorteo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.roles: ~4 rows (aproximadamente)
INSERT INTO `roles` (`id_rol`, `rol`, `descripcion`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'ADMINISTRADOR', 'Administrador del sistema', 'prueba', '2023-01-18 20:42:58', NULL, NULL),
	(2, 'EMPLEADO', 'Encargado de monitorear actividad de usuarios', 'prueba', '2023-01-19 07:42:09', NULL, NULL),
	(3, 'PARTICIPANTE', 'user', 'prueba', '2023-01-22 12:06:58', 'prueba', '2023-01-24 22:38:19');

-- Volcando estructura para tabla dbsorteo.sorteos
CREATE TABLE IF NOT EXISTS `sorteos` (
  `id_sorteo` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `nombre_sorteo` varchar(100) NOT NULL,
  `fecha_realizacion` date NOT NULL,
  `cantidad_boletos` int(10) DEFAULT NULL,
  `estado_sorteo` enum('Pendiente','Realizado') DEFAULT NULL,
  PRIMARY KEY (`id_sorteo`) USING BTREE,
  KEY `IdEmpresa` (`id_empresa`) USING BTREE,
  CONSTRAINT `FK_sorteos_empresas` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.sorteos: ~3 rows (aproximadamente)
INSERT INTO `sorteos` (`id_sorteo`, `id_empresa`, `nombre_sorteo`, `fecha_realizacion`, `cantidad_boletos`, `estado_sorteo`) VALUES
	(1, 2, '1ER AÑO INTERNACIONAL DE LA PIZZA', '2023-01-28', 100, 'Pendiente'),
	(2, 1, 'MARATON SULA 1 EDICION', '2023-02-16', 1200, 'Realizado'),
	(4, 4, 'ROPA LOKA', '2023-01-26', 150, 'Pendiente');

-- Volcando estructura para tabla dbsorteo.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `estado` enum('Activo','Inactivo','Bloqueado','Eliminado') NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `fecha_ultima_conexion` datetime DEFAULT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `creado_por` varchar(30) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(30) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  KEY `FK_empleados_roles` (`id_rol`) USING BTREE,
  KEY `FK_usuarios_personas` (`id_persona`),
  CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.usuarios: ~11 rows (aproximadamente)
INSERT INTO `usuarios` (`id_usuario`, `id_persona`, `usuario`, `estado`, `contrasena`, `id_rol`, `fecha_ultima_conexion`, `correo_electronico`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 1, 'prueba', 'Activo', '$2y$12$i836qbF5sxjT0I2VHP13XeLQ7ZdbVu28cmy1bKjsxQUM9mk6aBV/S', 1, NULL, 'admin@admin.com', 'admin', '2023-01-28 13:40:48', NULL, NULL),
	(2, 2, 'adasd', 'Inactivo', 'fsdfsdfsd', 1, NULL, 'adasdas@dasd', 'admin', '2023-01-28 14:51:57', NULL, NULL),
	(5, 3, 'sdfsdfsdf', 'Activo', 'zvxcvxcvxcvxcvxc', 1, NULL, 'vbdfbdfbdfb', 'admin', '0000-00-00 00:00:00', NULL, NULL),
	(7, 6, 'hjgjhgjh', 'Inactivo', 'jjhgghgjhgjh', 1, NULL, 'uytgjhgjhg', 'admin', '2023-01-28 15:38:24', NULL, NULL),
	(8, 2, 'ghvghjhvjh', 'Activo', 'ugjgjhgjhgjh', 1, NULL, 'hgfghjhg', 'admin', '0000-00-00 00:00:00', NULL, NULL),
	(10, NULL, 'hjkhkh', 'Activo', 'kljkljkljkljkljkl', 1, NULL, 'jljkjkljkljkl', 'jkkljkl', '2023-01-28 15:44:23', NULL, NULL),
	(11, 0, 'ASFSDFSD', 'Activo', '$2y$12$wMX7B9DQrgYgNxEv8pHgGOmsU5k4uM9lfpJHrpd1XTGYD/sCcvsC.', 1, NULL, 'vxvxvxc@fdfsdf.com', 'prueba', '2023-01-28 15:46:25', NULL, NULL),
	(12, 0, 'JHGJHGJKGH', 'Activo', '$2y$12$wgmDNr.ViDRwg8fus8HWNOaHS.AnsXclHOvBp42pOxpo8gBVKUmhq', 1, NULL, 'gjhgjgjg@fdfsdf.com', 'prueba', '2023-01-28 15:47:18', NULL, NULL),
	(13, 13, 'UUTYUTY', 'Activo', '$2y$12$qJxtXsQbZmmS5NFXD91CPuvIAFE/w/r9B703uSkSx69E1LoCb21l2', 1, NULL, 'kjjljklkjk@fdfsdf.com', 'prueba', '2023-01-28 15:48:22', NULL, NULL),
	(14, 14, 'MARINA', 'Activo', '$2y$12$sJFtDzy5M6K9EFnaUHAKBOytG5m5qS59yjWkAyCf374lnzXCg5.iS', 1, NULL, 'marina@gmail.com', 'prueba', '2023-01-28 15:58:28', NULL, NULL),
	(15, 15, 'CURIOSOJORGE', 'Eliminado', '$2y$12$GjQ2qNVgjwk.TZd/hovPTOUQSod2l9bZOWn1VhntiyfoC3Y3RMT8C', 2, NULL, 'curiosojorge@gmail.com', 'prueba', '2023-01-28 16:01:58', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

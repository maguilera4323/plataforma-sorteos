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
  `fecha_compra` datetime NOT NULL,
  PRIMARY KEY (`id_boleto`) USING BTREE,
  KEY `IdUsuario` (`id_usuario`) USING BTREE,
  KEY `Índice 3` (`id_sorteo`),
  CONSTRAINT `FK_boletos_sorteos` FOREIGN KEY (`id_sorteo`) REFERENCES `sorteos` (`id_sorteo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_boletos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.boletos: ~2 rows (aproximadamente)
INSERT INTO `boletos` (`id_boleto`, `id_usuario`, `id_sorteo`, `numero_boleto`, `fecha_compra`) VALUES
	(1, 4, 1, 1, '2023-01-29 16:35:14'),
	(2, 5, 1, 2, '2023-01-29 17:49:45');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.empresas: ~2 rows (aproximadamente)
INSERT INTO `empresas` (`id_empresa`, `nombre_empresa`, `direccion`, `telefono`, `correo_electronico`) VALUES
	(1, 'SULA', 'Col. Victor F. Ardon, Tegucigalpa M.D.C', '22021294', 'contacto@sula.hn'),
	(2, 'CINEMARK', 'Res. Las Uvas', '22091298', 'soporte@cinemark.hn'),
	(3, 'MENDELS', 'kklkkfKKL', '89789789', 'a@gm.es');

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

-- Volcando datos para la tabla dbsorteo.permisos: ~3 rows (aproximadamente)
INSERT INTO `permisos` (`id_rol`, `id_modulo`, `tipo_modulo`, `permiso_insercion`, `permiso_actualizacion`, `permiso_eliminacion`, `permiso_consulta`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 1, 'Home', '1', '1', '1', '1', 'prueba', '2023-01-27 10:19:47', 'prueba', '2023-01-27 10:38:19'),
	(3, 1, 'Home', '1', '0', '0', '1', 'prueba', '2023-01-27 10:20:13', NULL, NULL),
	(2, 1, 'Home', '1', '1', '1', '0', 'prueba', '2023-01-27 10:21:02', NULL, NULL),
	(1, 3, 'Empresas', '0', '0', '1', '1', 'prueba', '2023-02-02 18:23:25', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.personas: ~4 rows (aproximadamente)
INSERT INTO `personas` (`id_persona`, `nombres`, `apellidos`, `dni`, `telefono`, `sexo`, `direccion`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'PRUEBA', 'USUARIOS', '0102-1990-00832', '98762301', 'Masculino', 'Col. San Angel, Tegucigalpa M.D.C', 'prueba', '2023-01-29 16:02:09', NULL, NULL),
	(2, 'TAYLOR', 'SWIFT', '0701-1994-12845', '97652301', 'Femenino', 'USA', 'prueba', '2023-01-29 16:04:59', NULL, NULL),
	(3, 'SERJ', 'TANKIAN', '1208-1997-00012', '33120973', 'Masculino', 'Col. Arturo Quezada, zona 3, casa 17, bloque 12. Tegucigalpa M.D.C', 'prueba', '2023-01-29 16:07:07', NULL, NULL),
	(4, 'JUAN ANDRÉS', 'PEREZ ZEPEDA', '0610-1989-23081', '99903456', 'Masculino', 'Residencial Plaza, Tegucigalpa M.D.C', 'prueba', '2023-01-29 16:13:01', NULL, NULL),
	(5, 'WILSON', 'RIOS', '1202-1985-00092', '32412679', 'Masculino', 'Col. Las Acacias, Arizona, Atlántida', 'prueba', '2023-01-29 17:46:50', NULL, NULL);

-- Volcando estructura para tabla dbsorteo.premios
CREATE TABLE IF NOT EXISTS `premios` (
  `id_premio` int(11) NOT NULL AUTO_INCREMENT,
  `id_sorteo` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nombre_premio` varchar(300) NOT NULL,
  `cantidad_disponible` int(11) DEFAULT NULL,
  `foto_premio` varchar(300) NOT NULL,
  PRIMARY KEY (`id_premio`) USING BTREE,
  KEY `Índice 2` (`id_sorteo`) USING BTREE,
  KEY `Índice 3` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.premios: ~3 rows (aproximadamente)
INSERT INTO `premios` (`id_premio`, `id_sorteo`, `id_empresa`, `nombre_premio`, `cantidad_disponible`, `foto_premio`) VALUES
	(1, 1, 1, 'CAMISA HOMBRE', 2, '../vistas/assets/premios/camisa.jpg'),
	(2, 1, 1, 'JUGOS', 80, '../vistas/assets/premios/jugo-naranja.jpg'),
	(3, 1, 3, 'A', 24, '../vistas/assets/premios/Iconos-2-envio-08.jpg');

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
  KEY `FK_premios_sorteo_premios` (`id_premio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.premios_sorteo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla dbsorteo.restablece_clave_email
CREATE TABLE IF NOT EXISTS `restablece_clave_email` (
  `id_restablecer` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_restablecer`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.restablece_clave_email: ~4 rows (aproximadamente)
INSERT INTO `restablece_clave_email` (`id_restablecer`, `email`, `codigo`, `fecha`) VALUES
	(1, 'karimhernandez233@gmail.com', 8381, '2023-02-04 18:16:40'),
	(2, 'karimhernandez233@gmail.com', 3881, '2023-02-04 18:17:57'),
	(3, 'karimhernandez233@gmail.com', 8308, '2023-02-04 18:20:59'),
	(4, 'karimhernandez233@gmail.com', 1875, '2023-02-04 18:25:04'),
	(5, 'karimhernandez233@gmail.com', 1308, '2023-02-04 18:28:07');

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
	(3, 'PARTICIPANTE', 'Usuario registrado en el sistema que participa de los sorteos realizados', 'prueba', '2023-01-22 12:06:58', 'TANKIAN', '2023-01-29 16:11:10');

-- Volcando estructura para tabla dbsorteo.sorteos
CREATE TABLE IF NOT EXISTS `sorteos` (
  `id_sorteo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sorteo` varchar(100) NOT NULL,
  `rango_inicial` int(11) NOT NULL,
  `rango_final` int(10) DEFAULT NULL,
  `estado_sorteo` enum('Activo','Inactivo') DEFAULT NULL,
  PRIMARY KEY (`id_sorteo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.sorteos: ~2 rows (aproximadamente)
INSERT INTO `sorteos` (`id_sorteo`, `nombre_sorteo`, `rango_inicial`, `rango_final`, `estado_sorteo`) VALUES
	(1, '1ER MARATON DE VERANO SULA', 1, 1200, 'Activo'),
	(2, 'PREMIERE UNA LOCA NAVIDAD CATRACHA 2', 1201, 1850, 'Inactivo'),
	(3, 'HILA', 1851, 2000, 'Inactivo');

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
  CONSTRAINT `FK_usuarios_personas` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.usuarios: ~5 rows (aproximadamente)
INSERT INTO `usuarios` (`id_usuario`, `id_persona`, `usuario`, `estado`, `contrasena`, `id_rol`, `fecha_ultima_conexion`, `correo_electronico`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 1, 'prueba', 'Activo', '$2y$12$i836qbF5sxjT0I2VHP13XeLQ7ZdbVu28cmy1bKjsxQUM9mk6aBV/S', 1, NULL, 'karimhernandez233@gmail.com', 'prueba', '2023-01-29 16:03:30', NULL, NULL),
	(2, 2, 'SWIFTIE', 'Activo', '$2y$12$DfRsD1/Qf1FisI/VwQWrve5iZ2GboPhH7BCtLloE5p53q1S8aqmB.', 2, NULL, 'swift@taylor.com', 'prueba', '2023-01-29 16:04:59', NULL, NULL),
	(3, 3, 'TANKIAN', 'Activo', '$2y$12$TypNeC35UbRFM0wMYfpi9.WapmQiOvmDPv6Fymktb/W4jfxf0TucG', 1, NULL, 'serjtankian@gmail.es', 'prueba', '2023-01-29 16:07:07', NULL, NULL),
	(4, 4, 'JUANP', 'Activo', '$2y$12$i836qbF5sxjT0I2VHP13XeLQ7ZdbVu28cmy1bKjsxQUM9mk6aBV/S', 3, NULL, 'juanperez@hotmail.com', 'prueba', '2023-01-29 16:13:30', NULL, NULL),
	(5, 5, 'RIOSWIL', 'Activo', '$2y$12$DfRsD1/Qf1FisI/VwQWrve5iZ2GboPhH7BCtLloE5p53q1S8aqmB.', 3, NULL, 'ordonezwilson@outlook.com', 'prueba', '2023-01-20 12:34:41', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

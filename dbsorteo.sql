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
CREATE DATABASE IF NOT EXISTS `dbsorteo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbsorteo`;

-- Volcando estructura para tabla dbsorteo.bitacora
CREATE TABLE IF NOT EXISTS `bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `accion` tinytext NOT NULL COMMENT 'accion realizada si es un ingreso nuevo, actualizacion. eliminacion o una consulta.',
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`) USING BTREE,
  KEY `FK_bitacora_usuarios` (`id_usuario`) USING BTREE,
  CONSTRAINT `FK_bitacora_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.bitacora: ~175 rows (aproximadamente)
INSERT INTO `bitacora` (`id_bitacora`, `id_modulo`, `fecha`, `id_usuario`, `accion`, `descripcion`) VALUES
	(1, 1, '2023-02-16 13:10:55', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(2, 1, '2023-02-16 13:11:33', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(3, 1, '2023-02-16 13:17:09', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(4, 1, '2023-02-16 13:19:16', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(5, 1, '2023-02-16 13:21:33', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(6, 1, '2023-02-16 13:22:08', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(7, 1, '2023-02-16 13:30:13', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(8, 1, '2023-02-16 13:30:15', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(9, 1, '2023-02-16 13:30:17', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(10, 1, '2023-02-16 13:30:19', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(11, 1, '2023-02-16 13:30:20', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(12, 1, '2023-02-16 13:30:22', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(13, 1, '2023-02-16 13:30:23', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(14, 1, '2023-02-16 13:30:25', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(15, 1, '2023-02-16 13:30:27', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(16, 1, '2023-02-16 13:30:28', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(17, 3, '2023-02-16 13:38:09', 1, 'Inserción', 'El usuario  agregó una nueva empresa al sistema'),
	(18, 3, '2023-02-16 13:39:07', 1, 'Inserción', 'El usuario prueba agregó una nueva empresa al sistema'),
	(19, 1, '2023-02-16 13:52:16', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(20, 2, '2023-02-16 13:53:32', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(21, 5, '2023-02-16 13:55:37', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Boletos Comprados'),
	(22, 13, '2023-02-16 13:56:53', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Configuración'),
	(23, 8, '2023-02-16 13:58:09', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empleados'),
	(24, 3, '2023-02-16 13:59:45', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empresas'),
	(25, 13, '2023-02-16 14:01:18', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Configuración'),
	(26, 12, '2023-02-16 14:01:20', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Módulos'),
	(27, 13, '2023-02-16 14:02:28', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Configuración'),
	(28, 9, '2023-02-16 14:02:31', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Participantes'),
	(29, 13, '2023-02-16 14:04:17', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Configuración'),
	(30, 11, '2023-02-16 14:04:20', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Permisos'),
	(31, 6, '2023-02-16 14:05:41', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Premios'),
	(32, 13, '2023-02-16 14:06:51', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Configuración'),
	(33, 10, '2023-02-16 14:06:52', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Roles'),
	(34, 4, '2023-02-16 14:08:07', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Sorteos'),
	(35, 13, '2023-02-16 14:09:09', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Configuración'),
	(36, 7, '2023-02-16 14:09:10', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Usuarios'),
	(37, 2, '2023-02-16 14:10:48', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró al dashboard'),
	(38, 2, '2023-02-16 14:11:34', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró al dashboard'),
	(39, 3, '2023-02-16 14:11:49', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empresas'),
	(40, 2, '2023-02-16 14:11:51', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró al dashboard'),
	(41, 6, '2023-02-16 14:11:53', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Premios'),
	(42, 4, '2023-02-16 14:11:56', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Sorteos'),
	(43, 5, '2023-02-16 14:11:57', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Boletos Comprados'),
	(44, 4, '2023-02-16 14:14:51', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Sorteos'),
	(45, 13, '2023-02-16 14:14:55', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(46, 7, '2023-02-16 14:14:57', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Usuarios'),
	(47, 8, '2023-02-16 14:14:58', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(48, 8, '2023-02-16 14:15:46', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(49, 8, '2023-02-16 14:17:26', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(50, 8, '2023-02-16 14:18:39', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(51, 8, '2023-02-16 14:19:12', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(52, 4, '2023-02-16 14:31:01', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Sorteos'),
	(53, 2, '2023-02-16 14:33:21', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró al dashboard'),
	(54, 2, '2023-02-16 22:13:09', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(55, 2, '2023-02-16 22:13:28', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(56, 13, '2023-02-16 22:13:32', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Configuración'),
	(57, 7, '2023-02-16 22:13:33', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Usuarios'),
	(58, 8, '2023-02-16 22:13:35', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empleados'),
	(59, 13, '2023-02-16 22:16:10', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Configuración'),
	(60, 7, '2023-02-16 22:16:13', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Usuarios'),
	(61, 8, '2023-02-16 22:16:15', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empleados'),
	(62, 2, '2023-02-16 22:17:28', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(63, 7, '2023-02-16 22:17:30', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Usuarios'),
	(64, 8, '2023-02-16 22:17:33', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empleados'),
	(65, 2, '2023-02-16 23:15:18', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(66, 2, '2023-02-17 07:45:01', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró al dashboard'),
	(67, 3, '2023-02-17 07:45:09', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empresas'),
	(68, 13, '2023-02-17 07:45:14', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(69, 7, '2023-02-17 07:45:15', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Usuarios'),
	(70, 8, '2023-02-17 07:45:17', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(71, 8, '2023-02-17 07:49:39', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(72, 8, '2023-02-17 07:49:56', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(73, 8, '2023-02-17 07:50:14', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(74, 8, '2023-02-17 07:50:53', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(75, 8, '2023-02-17 07:51:12', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(76, 13, '2023-02-17 07:57:17', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(77, 7, '2023-02-17 07:57:18', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Usuarios'),
	(78, 8, '2023-02-17 07:57:20', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(79, 13, '2023-02-17 07:58:06', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(80, 7, '2023-02-17 07:58:08', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Usuarios'),
	(81, 8, '2023-02-17 07:58:09', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(82, 3, '2023-02-17 07:58:14', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empresas'),
	(83, 3, '2023-02-17 07:58:56', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empresas'),
	(84, 4, '2023-02-17 07:59:42', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Sorteos'),
	(85, 4, '2023-02-17 08:00:08', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Sorteos'),
	(86, 5, '2023-02-17 08:00:28', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Boletos Comprados'),
	(87, 5, '2023-02-17 08:01:22', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Boletos Comprados'),
	(88, 6, '2023-02-17 08:01:31', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Premios'),
	(89, 6, '2023-02-17 08:02:12', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Premios'),
	(90, 13, '2023-02-17 08:02:17', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(91, 7, '2023-02-17 08:02:18', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Usuarios'),
	(92, 9, '2023-02-17 08:02:20', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Participantes'),
	(93, 9, '2023-02-17 08:02:52', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Participantes'),
	(94, 7, '2023-02-17 08:03:02', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Usuarios'),
	(95, 13, '2023-02-17 08:03:05', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(96, 10, '2023-02-17 08:03:06', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Roles'),
	(97, 10, '2023-02-17 08:03:43', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Roles'),
	(98, 6, '2023-02-17 08:03:53', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Premios'),
	(99, 13, '2023-02-17 08:03:55', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(100, 7, '2023-02-17 08:03:56', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Usuarios'),
	(101, 8, '2023-02-17 08:03:59', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empleados'),
	(102, 13, '2023-02-17 08:04:02', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(103, 11, '2023-02-17 08:04:03', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Permisos'),
	(104, 13, '2023-02-17 08:04:05', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(105, 10, '2023-02-17 08:04:06', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Roles'),
	(106, 13, '2023-02-17 08:04:08', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(107, 11, '2023-02-17 08:04:10', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Permisos'),
	(108, 11, '2023-02-17 08:04:35', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Permisos'),
	(109, 13, '2023-02-17 08:04:39', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(110, 12, '2023-02-17 08:04:40', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Módulos'),
	(111, 12, '2023-02-17 08:05:02', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Módulos'),
	(112, 2, '2023-02-17 08:06:40', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró al dashboard'),
	(113, 3, '2023-02-17 08:06:41', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Empresas'),
	(114, 4, '2023-02-17 08:06:42', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Sorteos'),
	(115, 4, '2023-02-17 08:06:44', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Sorteos'),
	(116, 6, '2023-02-17 08:06:44', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Premios'),
	(117, 13, '2023-02-17 08:06:46', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Configuración'),
	(118, 7, '2023-02-17 08:06:47', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Usuarios'),
	(119, 9, '2023-02-17 08:06:51', 9, 'Cambio de vista', 'El usuario soryuu_asuka24 entró a la vista de Participantes'),
	(120, 2, '2023-02-18 21:22:38', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(121, 2, '2023-02-19 21:19:21', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(122, 2, '2023-02-19 22:40:39', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(123, 2, '2023-02-25 12:22:30', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(124, 7, '2023-02-25 12:22:49', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Usuarios'),
	(125, 8, '2023-02-25 12:22:51', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empleados'),
	(126, 2, '2023-02-25 12:27:51', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(127, 2, '2023-02-25 12:29:18', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(128, 2, '2023-02-25 12:29:32', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(129, 2, '2023-02-25 12:30:21', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(130, 2, '2023-02-25 12:30:36', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(131, 2, '2023-02-25 12:30:51', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(132, 2, '2023-02-25 12:31:07', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(133, 2, '2023-02-25 12:31:39', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(134, 2, '2023-02-25 12:32:51', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(135, 2, '2023-02-25 12:33:36', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(136, 4, '2023-02-25 12:33:52', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Sorteos'),
	(137, 13, '2023-02-25 12:33:57', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Configuración'),
	(138, 6, '2023-02-25 12:33:59', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Premios'),
	(139, 4, '2023-02-25 12:34:00', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Sorteos'),
	(140, 3, '2023-02-25 12:34:03', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empresas'),
	(141, 2, '2023-02-25 12:34:58', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(142, 3, '2023-02-25 12:35:00', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empresas'),
	(143, 3, '2023-02-25 12:35:16', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empresas'),
	(144, 3, '2023-02-25 12:35:43', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empresas'),
	(145, 3, '2023-02-25 12:36:14', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empresas'),
	(146, 3, '2023-02-25 12:36:48', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empresas'),
	(147, 2, '2023-02-25 12:37:25', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(148, 2, '2023-02-25 15:54:20', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(149, 2, '2023-02-26 18:40:23', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(150, 2, '2023-03-02 08:23:29', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(151, 7, '2023-03-02 08:23:38', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Usuarios'),
	(152, 8, '2023-03-02 08:23:40', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empleados'),
	(153, 8, '2023-03-02 08:23:53', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empleados'),
	(154, 4, '2023-03-02 08:38:24', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Sorteos'),
	(155, 3, '2023-03-02 08:38:26', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empresas'),
	(156, 13, '2023-03-02 08:38:39', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Configuración'),
	(157, 7, '2023-03-02 08:38:42', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Usuarios'),
	(158, 8, '2023-03-02 08:38:44', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Empleados'),
	(159, 2, '2023-03-02 10:32:56', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(160, 2, '2023-03-07 22:34:02', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(161, 6, '2023-03-07 22:34:09', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Premios'),
	(162, 4, '2023-03-07 22:34:11', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Sorteos'),
	(163, 5, '2023-03-07 22:34:14', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Boletos Comprados'),
	(164, 2, '2023-03-07 22:35:32', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(165, 2, '2023-03-08 08:32:10', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(166, 4, '2023-03-08 08:32:14', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Sorteos'),
	(167, 5, '2023-03-08 08:32:19', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Boletos Comprados'),
	(168, 2, '2023-03-08 09:40:53', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(169, 2, '2023-03-08 09:42:30', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(170, 2, '2023-03-08 09:43:11', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(171, 2, '2023-03-08 09:46:27', 1, 'Cambio de vista', 'El usuario prueba entró al dashboard'),
	(172, 4, '2023-03-08 09:46:31', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Sorteos'),
	(173, 5, '2023-03-08 09:46:33', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Boletos Comprados'),
	(174, 4, '2023-03-08 09:46:38', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Sorteos'),
	(175, 5, '2023-03-08 09:46:40', 1, 'Cambio de vista', 'El usuario prueba entró a la vista de Boletos Comprados');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.boletos: ~26 rows (aproximadamente)
INSERT INTO `boletos` (`id_boleto`, `id_usuario`, `id_sorteo`, `numero_boleto`, `fecha_compra`) VALUES
	(1, 4, 1, 1, '2023-01-29 16:35:14'),
	(2, 5, 1, 2, '2023-01-29 17:49:45'),
	(3, 4, 1, 3, '2023-03-07 22:19:23'),
	(4, 4, 1, 4, '2023-03-07 22:26:12'),
	(5, 4, 1, 5, '2023-03-07 22:44:02'),
	(6, 4, 1, 6, '2023-03-07 22:46:47'),
	(7, 4, 1, 7, '2023-03-07 22:49:04'),
	(8, 4, 1, 8, '2023-03-07 22:51:45'),
	(9, 4, 1, 9, '2023-03-07 23:00:58'),
	(10, 4, 1, 10, '2023-03-07 23:02:40'),
	(11, 4, 1, 11, '2023-03-07 23:05:14'),
	(12, 4, 1, 12, '2023-03-08 08:00:56'),
	(13, 4, 1, 13, '2023-03-08 08:02:30'),
	(14, 4, 1, 14, '2023-03-08 08:08:16'),
	(15, 4, 1, 15, '2023-03-08 08:08:16'),
	(16, 4, 1, 16, '2023-03-08 08:08:16'),
	(17, 4, 1, 17, '2023-03-08 08:08:16'),
	(18, 4, 1, 18, '2023-03-08 08:08:16'),
	(19, 4, 1, 19, '2023-03-08 08:17:44'),
	(20, 4, 1, 20, '2023-03-08 08:29:04'),
	(21, 4, 1, 21, '2023-03-08 08:30:53'),
	(22, 4, 1, 22, '2023-03-08 08:30:53'),
	(23, 4, 3, 23, '2023-03-08 08:54:52'),
	(24, 4, 3, 24, '2023-03-08 09:17:19'),
	(25, 4, 3, 25, '2023-03-08 09:19:53'),
	(26, 5, 3, 26, '2023-03-08 09:46:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.empresas: ~6 rows (aproximadamente)
INSERT INTO `empresas` (`id_empresa`, `nombre_empresa`, `direccion`, `telefono`, `correo_electronico`) VALUES
	(1, 'SULA', 'Col. Victor F. Ardon, Tegucigalpa M.D.C', '22021294', 'contacto@sula.hn'),
	(2, 'CINEMARK', 'Res. Las Uvas', '22091298', 'soporte@cinemark.hn'),
	(3, 'MENDELS', 'kklkkfKKL', '89789789', 'a@gm.es'),
	(4, 'LOTO', 'no se', '12345678', 'loto@loto.com'),
	(5, 'KHKJKJHKH', 'jkhhkhhjk', '786786768', 'jhjhk@oiuoiu.com'),
	(6, 'JKKHKHKHKHHKHK', 'ggjkgggg', '78678', 'fsffsf@fdsfsfsf.com');

-- Volcando estructura para tabla dbsorteo.modulos
CREATE TABLE IF NOT EXISTS `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipo_modulo` enum('Home','Dashboard','Empresas','Sorteos','Premios','Configuracion','Administracion') NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.modulos: ~13 rows (aproximadamente)
INSERT INTO `modulos` (`id_modulo`, `modulo`, `descripcion`, `tipo_modulo`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'HOME', 'Pantalla principal para los participantes', 'Home', 'prueba', '2023-02-12 13:17:29', NULL, NULL),
	(2, 'DASHBOARD', 'Pantalla principal para los usuarios administrativos', 'Dashboard', 'prueba', '2023-02-12 13:18:00', NULL, NULL),
	(3, 'EMPRESAS', 'Vista en la que se encuentran los patrocinadores', 'Empresas', 'prueba', '2023-02-12 13:19:19', NULL, NULL),
	(4, 'SORTEOS', 'Vista con la información de los sorteos que realizará la plataforma', 'Sorteos', 'prueba', '2023-02-12 13:20:08', NULL, NULL),
	(5, 'BOLETOS', 'Vista que contiene los boletos comprados por los participantes', 'Sorteos', 'prueba', '2023-02-12 13:20:35', NULL, NULL),
	(6, 'PREMIOS', 'Vista que contiene los premios que sorteará la plataforma', 'Premios', 'prueba', '2023-02-12 13:21:25', NULL, NULL),
	(7, 'USUARIOS', 'Vista del sistema con las opciones para gestionar los usuarios', 'Configuracion', 'prueba', '2023-02-12 13:22:10', NULL, NULL),
	(8, 'EMPLEADOS', 'Vista del sistema para gestión de los usuarios administrativos', 'Configuracion', 'prueba', '2023-02-12 13:22:38', NULL, NULL),
	(9, 'PARTICIPANTES', 'Vista del sistema para gestión de los usuarios participantes', 'Configuracion', 'prueba', '2023-02-12 13:23:07', NULL, NULL),
	(10, 'ROLES', 'Vista del sistema que contiene la clasifiacion de los usuarios de la plataforma', 'Configuracion', 'prueba', '2023-02-12 13:25:54', NULL, NULL),
	(11, 'PERMISOS', 'Vista del sistema que contiene los permisos de acción de cada rol', 'Configuracion', 'prueba', '2023-02-12 13:26:36', NULL, NULL),
	(12, 'MODULOS', 'Vista que contiene las pantallas que conforman toda la plataforma', 'Configuracion', 'prueba', '2023-02-12 13:27:15', NULL, NULL),
	(13, 'CONFIGURACION', 'Vista con los accesos a las demás vistas administrativas', 'Configuracion', 'prueba', '2023-02-12 14:01:15', NULL, NULL);

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
  `tipo_modulo` enum('Home','Dashboard','Empresas','Sorteos','Premios','Configuración','Administración') NOT NULL,
  `permiso_insercion` varchar(5) NOT NULL,
  `permiso_actualizacion` varchar(5) NOT NULL,
  `permiso_eliminacion` varchar(5) NOT NULL,
  `permiso_consulta` varchar(5) NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  KEY `Índice 1` (`id_rol`) USING BTREE,
  KEY `Índice 2` (`id_modulo`) USING BTREE,
  CONSTRAINT `FK_permisos_modulos` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_permisos_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.permisos: ~12 rows (aproximadamente)
INSERT INTO `permisos` (`id_rol`, `id_modulo`, `tipo_modulo`, `permiso_insercion`, `permiso_actualizacion`, `permiso_eliminacion`, `permiso_consulta`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 2, 'Dashboard', '0', '0', '0', '1', 'prueba', '2023-02-12 13:40:14', NULL, NULL),
	(1, 3, 'Empresas', '1', '1', '1', '1', 'prueba', '2023-02-12 13:44:23', 'prueba', '2023-02-12 13:44:36'),
	(1, 4, 'Sorteos', '1', '1', '1', '1', 'prueba', '2023-02-12 13:44:56', NULL, NULL),
	(1, 5, 'Sorteos', '0', '0', '0', '1', 'prueba', '2023-02-12 13:52:54', 'prueba', '2023-02-12 13:55:27'),
	(1, 6, 'Premios', '1', '1', '1', '1', 'prueba', '2023-02-12 13:55:18', 'prueba', '2023-02-12 14:31:37'),
	(1, 13, 'Configuración', '0', '0', '0', '1', 'prueba', '2023-02-12 14:01:31', NULL, NULL),
	(1, 7, 'Configuración', '0', '0', '0', '1', 'prueba', '2023-02-12 14:03:25', NULL, NULL),
	(1, 8, 'Configuración', '1', '1', '1', '1', 'prueba', '2023-02-12 14:05:15', 'prueba', '2023-02-12 14:31:13'),
	(1, 9, 'Configuración', '0', '0', '0', '1', 'prueba', '2023-02-12 14:11:46', NULL, NULL),
	(1, 10, 'Configuración', '1', '1', '1', '1', 'prueba', '2023-02-12 14:14:35', NULL, NULL),
	(1, 11, 'Configuración', '1', '1', '1', '1', 'prueba', '2023-02-12 14:22:23', NULL, NULL),
	(1, 12, 'Configuración', '1', '1', '1', '1', 'prueba', '2023-02-12 14:26:03', 'prueba', '2023-02-12 14:31:27');

-- Volcando estructura para tabla dbsorteo.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `sexo` enum('Masculino','Femenino') DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `creado_por` varchar(30) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `modificado_por` varchar(30) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.personas: ~10 rows (aproximadamente)
INSERT INTO `personas` (`id_persona`, `nombres`, `apellidos`, `dni`, `edad`, `telefono`, `sexo`, `direccion`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 'ADMIN', 'SISTEMA', '0102-1990-00832', 33, '9876-2301', 'Femenino', 'Col. San Angel, Tegucigalpa M.D.C', 'prueba', '2023-01-29 16:02:09', 'prueba', '2023-02-12 11:46:38'),
	(2, 'TAYLOR', 'SWIFT', '0701-1994-12845', 29, '97652301', 'Femenino', 'USA', 'prueba', '2023-01-29 16:04:59', NULL, NULL),
	(3, 'SERJ', 'TANKIAN', '0802-1997-00012', 26, '3312-0973', 'Masculino', 'Col. Arturo Quezada, zona 3, casa 17, bloque 12. Tegucigalpa M.D.C', 'prueba', '2023-01-29 16:07:07', 'prueba', '2023-02-12 11:45:06'),
	(4, 'JUAN ANDRÉS', 'PEREZ ZEPEDA', '0610-1989-23081', 43, '99903456', 'Masculino', 'Residencial Plaza, Tegucigalpa M.D.C', 'prueba', '2023-01-29 16:13:01', NULL, NULL),
	(5, 'WILSON', 'RIOS', '1202-1985-00092', 48, '32412679', 'Masculino', 'Col. Las Acacias, Arizona, Atlántida', 'prueba', '2023-01-29 17:46:50', NULL, NULL),
	(6, 'SANTOS', 'GARCIA', '0610-1984-08242', 49, '9999-9999', 'Masculino', 'Col. Nuñez', 'prueba', '2023-02-12 11:33:13', NULL, NULL),
	(7, 'EDUARDO', 'CERATI', '0101-1999-11111', 23, '1111-1111', 'Masculino', 'kljjkjljljljlk', 'prueba', '2023-02-16 11:01:16', NULL, NULL),
	(8, 'JUANONA', 'MARCIALES', '0801-1993-20284', 30, '1234-5678', 'Femenino', 'kljljjljljlk', 'prueba', '2023-02-16 11:02:13', NULL, NULL),
	(9, 'ASUKA', 'LANGLEY SORYUU', '0801-1996-13063', 27, '9898-4455', 'Femenino', 'dfasdasdadad', 'prueba', '2023-02-16 11:03:24', NULL, NULL),
	(10, 'JOSE', 'GARCIA', '0904-1996-00012', NULL, '1111-1111', 'Masculino', 'jjkljkljljlj', 'soryuu_asuka24', '2023-02-16 14:15:44', NULL, NULL);

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

-- Volcando datos para la tabla dbsorteo.restablece_clave_email: ~5 rows (aproximadamente)
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

-- Volcando datos para la tabla dbsorteo.roles: ~3 rows (aproximadamente)
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

-- Volcando datos para la tabla dbsorteo.sorteos: ~3 rows (aproximadamente)
INSERT INTO `sorteos` (`id_sorteo`, `nombre_sorteo`, `rango_inicial`, `rango_final`, `estado_sorteo`) VALUES
	(1, '1ER MARATON DE VERANO SULA', 1, 1200, 'Inactivo'),
	(2, 'PREMIERE UNA LOCA NAVIDAD CATRACHA 2', 1201, 1850, 'Inactivo'),
	(3, 'HILA', 1851, 2000, 'Activo');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dbsorteo.usuarios: ~10 rows (aproximadamente)
INSERT INTO `usuarios` (`id_usuario`, `id_persona`, `usuario`, `estado`, `contrasena`, `id_rol`, `fecha_ultima_conexion`, `correo_electronico`, `creado_por`, `fecha_creacion`, `modificado_por`, `fecha_modificacion`) VALUES
	(1, 1, 'prueba', 'Activo', '$2y$12$996vQ8DmONpCbf2Sx1.B4ORCm/zF38i0OBdb4r5p4JjH5TYncq.F.', 1, NULL, 'prueba@gmail.com', 'prueba', '2023-01-29 16:03:30', 'prueba', '2023-02-12 11:51:47'),
	(2, 2, 'swiftie', 'Activo', '$2y$12$DfRsD1/Qf1FisI/VwQWrve5iZ2GboPhH7BCtLloE5p53q1S8aqmB.', 2, NULL, 'swift@taylor.com', 'prueba', '2023-01-29 16:04:59', NULL, NULL),
	(3, 3, 'tankians34', 'Activo', '$2y$12$TypNeC35UbRFM0wMYfpi9.WapmQiOvmDPv6Fymktb/W4jfxf0TucG', 1, NULL, 'serjtankian@gmail.es', 'prueba', '2023-01-29 16:07:07', 'prueba', '2023-02-12 11:45:06'),
	(4, 4, 'juanp', 'Activo', '$2y$12$i836qbF5sxjT0I2VHP13XeLQ7ZdbVu28cmy1bKjsxQUM9mk6aBV/S', 3, NULL, 'juanperez@hotmail.com', 'prueba', '2023-01-31 16:13:30', NULL, NULL),
	(5, 5, 'rioswil', 'Activo', '$2y$12$996vQ8DmONpCbf2Sx1.B4ORCm/zF38i0OBdb4r5p4JjH5TYncq.F.', 3, NULL, 'ordonezwilson@outlook.com', 'prueba', '2023-02-10 12:34:41', NULL, NULL),
	(6, 6, 'santos_garcia123', 'Activo', '$2y$12$XDsZiIKIUgnPk8/MBmgDIOft4vdY18kdQO5tnLdyQaGp7zAF/M89a', 2, NULL, 'ejemplo@correo.com', 'prueba', '2023-02-12 11:33:13', NULL, NULL),
	(7, 7, 'educerati', 'Activo', '$2y$12$BQYbhrB8cIIf/CXptPHmbudaUcU4bY21Ca8PQcViU63qF6B5ypE7q', 2, NULL, 'ejemplos@ejemplos.com', 'prueba', '2023-03-16 11:01:16', NULL, NULL),
	(8, 8, 'juanamar', 'Activo', '$2y$12$XttJg07u05Fqrf3PajgpNezDFSExhj.DV0GsYZ75unzktbrOrmtbW', 2, NULL, 'ejemplito@ejemplito.com', 'prueba', '2023-03-16 11:02:13', NULL, NULL),
	(9, 9, 'soryuu_asuka24', 'Activo', '$2y$12$996vQ8DmONpCbf2Sx1.B4ORCm/zF38i0OBdb4r5p4JjH5TYncq.F.', 1, NULL, 'soryuuasuka@asuka.com', 'prueba', '2023-03-16 11:03:24', NULL, NULL),
	(10, 10, 'jose123', 'Eliminado', '$2y$12$tBXVrQhAltyERgwAHJjm7epcZLlRlvZKNYn6a7Oy3YWP0GoQ7oSc2', 2, NULL, 'jjkljkljljlkjkl@gmail.com', 'soryuu_asuka24', '2023-02-16 14:15:44', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

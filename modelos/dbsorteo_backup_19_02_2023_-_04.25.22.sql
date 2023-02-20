

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `accion` tinytext NOT NULL COMMENT 'accion realizada si es un ingreso nuevo, actualizacion. eliminacion o una consulta.',
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`) USING BTREE,
  KEY `FK_bitacora_usuarios` (`id_usuario`) USING BTREE,
  CONSTRAINT `FK_bitacora_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4;

INSERT INTO bitacora VALUES("1","1","2023-02-16 13:10:55","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("2","1","2023-02-16 13:11:33","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("3","1","2023-02-16 13:17:09","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("4","1","2023-02-16 13:19:16","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("5","1","2023-02-16 13:21:33","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("6","1","2023-02-16 13:22:08","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("7","1","2023-02-16 13:30:13","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("8","1","2023-02-16 13:30:15","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("9","1","2023-02-16 13:30:17","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("10","1","2023-02-16 13:30:19","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("11","1","2023-02-16 13:30:20","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("12","1","2023-02-16 13:30:22","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("13","1","2023-02-16 13:30:23","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("14","1","2023-02-16 13:30:25","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("15","1","2023-02-16 13:30:27","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("16","1","2023-02-16 13:30:28","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("17","3","2023-02-16 13:38:09","1","Inserción","El usuario  agregó una nueva empresa al sistema");
INSERT INTO bitacora VALUES("18","3","2023-02-16 13:39:07","1","Inserción","El usuario prueba agregó una nueva empresa al sistema");
INSERT INTO bitacora VALUES("19","1","2023-02-16 13:52:16","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("20","2","2023-02-16 13:53:32","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("21","5","2023-02-16 13:55:37","1","Cambio de vista","El usuario prueba entró a la vista de Boletos Comprados");
INSERT INTO bitacora VALUES("22","13","2023-02-16 13:56:53","1","Cambio de vista","El usuario prueba entró a la vista de Configuración");
INSERT INTO bitacora VALUES("23","8","2023-02-16 13:58:09","1","Cambio de vista","El usuario prueba entró a la vista de Empleados");
INSERT INTO bitacora VALUES("24","3","2023-02-16 13:59:45","1","Cambio de vista","El usuario prueba entró a la vista de Empresas");
INSERT INTO bitacora VALUES("25","13","2023-02-16 14:01:18","1","Cambio de vista","El usuario prueba entró a la vista de Configuración");
INSERT INTO bitacora VALUES("26","12","2023-02-16 14:01:20","1","Cambio de vista","El usuario prueba entró a la vista de Módulos");
INSERT INTO bitacora VALUES("27","13","2023-02-16 14:02:28","1","Cambio de vista","El usuario prueba entró a la vista de Configuración");
INSERT INTO bitacora VALUES("28","9","2023-02-16 14:02:31","1","Cambio de vista","El usuario prueba entró a la vista de Participantes");
INSERT INTO bitacora VALUES("29","13","2023-02-16 14:04:17","1","Cambio de vista","El usuario prueba entró a la vista de Configuración");
INSERT INTO bitacora VALUES("30","11","2023-02-16 14:04:20","1","Cambio de vista","El usuario prueba entró a la vista de Permisos");
INSERT INTO bitacora VALUES("31","6","2023-02-16 14:05:41","1","Cambio de vista","El usuario prueba entró a la vista de Premios");
INSERT INTO bitacora VALUES("32","13","2023-02-16 14:06:51","1","Cambio de vista","El usuario prueba entró a la vista de Configuración");
INSERT INTO bitacora VALUES("33","10","2023-02-16 14:06:52","1","Cambio de vista","El usuario prueba entró a la vista de Roles");
INSERT INTO bitacora VALUES("34","4","2023-02-16 14:08:07","1","Cambio de vista","El usuario prueba entró a la vista de Sorteos");
INSERT INTO bitacora VALUES("35","13","2023-02-16 14:09:09","1","Cambio de vista","El usuario prueba entró a la vista de Configuración");
INSERT INTO bitacora VALUES("36","7","2023-02-16 14:09:10","1","Cambio de vista","El usuario prueba entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("37","2","2023-02-16 14:10:48","9","Cambio de vista","El usuario soryuu_asuka24 entró al dashboard");
INSERT INTO bitacora VALUES("38","2","2023-02-16 14:11:34","9","Cambio de vista","El usuario soryuu_asuka24 entró al dashboard");
INSERT INTO bitacora VALUES("39","3","2023-02-16 14:11:49","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empresas");
INSERT INTO bitacora VALUES("40","2","2023-02-16 14:11:51","9","Cambio de vista","El usuario soryuu_asuka24 entró al dashboard");
INSERT INTO bitacora VALUES("41","6","2023-02-16 14:11:53","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Premios");
INSERT INTO bitacora VALUES("42","4","2023-02-16 14:11:56","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Sorteos");
INSERT INTO bitacora VALUES("43","5","2023-02-16 14:11:57","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Boletos Comprados");
INSERT INTO bitacora VALUES("44","4","2023-02-16 14:14:51","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Sorteos");
INSERT INTO bitacora VALUES("45","13","2023-02-16 14:14:55","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("46","7","2023-02-16 14:14:57","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("47","8","2023-02-16 14:14:58","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("48","8","2023-02-16 14:15:46","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("49","8","2023-02-16 14:17:26","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("50","8","2023-02-16 14:18:39","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("51","8","2023-02-16 14:19:12","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("52","4","2023-02-16 14:31:01","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Sorteos");
INSERT INTO bitacora VALUES("53","2","2023-02-16 14:33:21","9","Cambio de vista","El usuario soryuu_asuka24 entró al dashboard");
INSERT INTO bitacora VALUES("54","2","2023-02-16 22:13:09","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("55","2","2023-02-16 22:13:28","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("56","13","2023-02-16 22:13:32","1","Cambio de vista","El usuario prueba entró a la vista de Configuración");
INSERT INTO bitacora VALUES("57","7","2023-02-16 22:13:33","1","Cambio de vista","El usuario prueba entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("58","8","2023-02-16 22:13:35","1","Cambio de vista","El usuario prueba entró a la vista de Empleados");
INSERT INTO bitacora VALUES("59","13","2023-02-16 22:16:10","1","Cambio de vista","El usuario prueba entró a la vista de Configuración");
INSERT INTO bitacora VALUES("60","7","2023-02-16 22:16:13","1","Cambio de vista","El usuario prueba entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("61","8","2023-02-16 22:16:15","1","Cambio de vista","El usuario prueba entró a la vista de Empleados");
INSERT INTO bitacora VALUES("62","2","2023-02-16 22:17:28","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("63","7","2023-02-16 22:17:30","1","Cambio de vista","El usuario prueba entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("64","8","2023-02-16 22:17:33","1","Cambio de vista","El usuario prueba entró a la vista de Empleados");
INSERT INTO bitacora VALUES("65","2","2023-02-16 23:15:18","1","Cambio de vista","El usuario prueba entró al dashboard");
INSERT INTO bitacora VALUES("66","2","2023-02-17 07:45:01","9","Cambio de vista","El usuario soryuu_asuka24 entró al dashboard");
INSERT INTO bitacora VALUES("67","3","2023-02-17 07:45:09","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empresas");
INSERT INTO bitacora VALUES("68","13","2023-02-17 07:45:14","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("69","7","2023-02-17 07:45:15","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("70","8","2023-02-17 07:45:17","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("71","8","2023-02-17 07:49:39","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("72","8","2023-02-17 07:49:56","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("73","8","2023-02-17 07:50:14","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("74","8","2023-02-17 07:50:53","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("75","8","2023-02-17 07:51:12","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("76","13","2023-02-17 07:57:17","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("77","7","2023-02-17 07:57:18","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("78","8","2023-02-17 07:57:20","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("79","13","2023-02-17 07:58:06","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("80","7","2023-02-17 07:58:08","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("81","8","2023-02-17 07:58:09","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("82","3","2023-02-17 07:58:14","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empresas");
INSERT INTO bitacora VALUES("83","3","2023-02-17 07:58:56","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empresas");
INSERT INTO bitacora VALUES("84","4","2023-02-17 07:59:42","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Sorteos");
INSERT INTO bitacora VALUES("85","4","2023-02-17 08:00:08","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Sorteos");
INSERT INTO bitacora VALUES("86","5","2023-02-17 08:00:28","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Boletos Comprados");
INSERT INTO bitacora VALUES("87","5","2023-02-17 08:01:22","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Boletos Comprados");
INSERT INTO bitacora VALUES("88","6","2023-02-17 08:01:31","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Premios");
INSERT INTO bitacora VALUES("89","6","2023-02-17 08:02:12","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Premios");
INSERT INTO bitacora VALUES("90","13","2023-02-17 08:02:17","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("91","7","2023-02-17 08:02:18","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("92","9","2023-02-17 08:02:20","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Participantes");
INSERT INTO bitacora VALUES("93","9","2023-02-17 08:02:52","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Participantes");
INSERT INTO bitacora VALUES("94","7","2023-02-17 08:03:02","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("95","13","2023-02-17 08:03:05","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("96","10","2023-02-17 08:03:06","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Roles");
INSERT INTO bitacora VALUES("97","10","2023-02-17 08:03:43","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Roles");
INSERT INTO bitacora VALUES("98","6","2023-02-17 08:03:53","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Premios");
INSERT INTO bitacora VALUES("99","13","2023-02-17 08:03:55","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("100","7","2023-02-17 08:03:56","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("101","8","2023-02-17 08:03:59","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empleados");
INSERT INTO bitacora VALUES("102","13","2023-02-17 08:04:02","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("103","11","2023-02-17 08:04:03","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Permisos");
INSERT INTO bitacora VALUES("104","13","2023-02-17 08:04:05","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("105","10","2023-02-17 08:04:06","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Roles");
INSERT INTO bitacora VALUES("106","13","2023-02-17 08:04:08","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("107","11","2023-02-17 08:04:10","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Permisos");
INSERT INTO bitacora VALUES("108","11","2023-02-17 08:04:35","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Permisos");
INSERT INTO bitacora VALUES("109","13","2023-02-17 08:04:39","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("110","12","2023-02-17 08:04:40","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Módulos");
INSERT INTO bitacora VALUES("111","12","2023-02-17 08:05:02","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Módulos");
INSERT INTO bitacora VALUES("112","2","2023-02-17 08:06:40","9","Cambio de vista","El usuario soryuu_asuka24 entró al dashboard");
INSERT INTO bitacora VALUES("113","3","2023-02-17 08:06:41","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Empresas");
INSERT INTO bitacora VALUES("114","4","2023-02-17 08:06:42","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Sorteos");
INSERT INTO bitacora VALUES("115","4","2023-02-17 08:06:44","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Sorteos");
INSERT INTO bitacora VALUES("116","6","2023-02-17 08:06:44","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Premios");
INSERT INTO bitacora VALUES("117","13","2023-02-17 08:06:46","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Configuración");
INSERT INTO bitacora VALUES("118","7","2023-02-17 08:06:47","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Usuarios");
INSERT INTO bitacora VALUES("119","9","2023-02-17 08:06:51","9","Cambio de vista","El usuario soryuu_asuka24 entró a la vista de Participantes");
INSERT INTO bitacora VALUES("120","2","2023-02-18 21:22:38","1","Cambio de vista","El usuario prueba entró al dashboard");



CREATE TABLE `boletos` (
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

INSERT INTO boletos VALUES("1","4","1","1","2023-01-29 16:35:14");
INSERT INTO boletos VALUES("2","5","1","2","2023-01-29 17:49:45");



CREATE TABLE `boletos_adquiridos` (
  `id_sorteo` int(11) NOT NULL AUTO_INCREMENT,
  `boletos_adquiridos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sorteo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(70) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo_electronico` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO empresas VALUES("1","SULA","Col. Victor F. Ardon, Tegucigalpa M.D.C","22021294","contacto@sula.hn");
INSERT INTO empresas VALUES("2","CINEMARK","Res. Las Uvas","22091298","soporte@cinemark.hn");
INSERT INTO empresas VALUES("3","MENDELS","kklkkfKKL","89789789","a@gm.es");
INSERT INTO empresas VALUES("4","LOTO","no se","12345678","loto@loto.com");
INSERT INTO empresas VALUES("5","KHKJKJHKH","jkhhkhhjk","786786768","jhjhk@oiuoiu.com");
INSERT INTO empresas VALUES("6","JKKHKHKHKHHKHK","ggjkgggg","78678","fsffsf@fdsfsfsf.com");



CREATE TABLE `modulos` (
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

INSERT INTO modulos VALUES("1","HOME","Pantalla principal para los participantes","Home","prueba","2023-02-12 13:17:29","","");
INSERT INTO modulos VALUES("2","DASHBOARD","Pantalla principal para los usuarios administrativos","Dashboard","prueba","2023-02-12 13:18:00","","");
INSERT INTO modulos VALUES("3","EMPRESAS","Vista en la que se encuentran los patrocinadores","Empresas","prueba","2023-02-12 13:19:19","","");
INSERT INTO modulos VALUES("4","SORTEOS","Vista con la información de los sorteos que realizará la plataforma","Sorteos","prueba","2023-02-12 13:20:08","","");
INSERT INTO modulos VALUES("5","BOLETOS","Vista que contiene los boletos comprados por los participantes","Sorteos","prueba","2023-02-12 13:20:35","","");
INSERT INTO modulos VALUES("6","PREMIOS","Vista que contiene los premios que sorteará la plataforma","Premios","prueba","2023-02-12 13:21:25","","");
INSERT INTO modulos VALUES("7","USUARIOS","Vista del sistema con las opciones para gestionar los usuarios","Configuracion","prueba","2023-02-12 13:22:10","","");
INSERT INTO modulos VALUES("8","EMPLEADOS","Vista del sistema para gestión de los usuarios administrativos","Configuracion","prueba","2023-02-12 13:22:38","","");
INSERT INTO modulos VALUES("9","PARTICIPANTES","Vista del sistema para gestión de los usuarios participantes","Configuracion","prueba","2023-02-12 13:23:07","","");
INSERT INTO modulos VALUES("10","ROLES","Vista del sistema que contiene la clasifiacion de los usuarios de la plataforma","Configuracion","prueba","2023-02-12 13:25:54","","");
INSERT INTO modulos VALUES("11","PERMISOS","Vista del sistema que contiene los permisos de acción de cada rol","Configuracion","prueba","2023-02-12 13:26:36","","");
INSERT INTO modulos VALUES("12","MODULOS","Vista que contiene las pantallas que conforman toda la plataforma","Configuracion","prueba","2023-02-12 13:27:15","","");
INSERT INTO modulos VALUES("13","CONFIGURACION","Vista con los accesos a las demás vistas administrativas","Configuracion","prueba","2023-02-12 14:01:15","","");



CREATE TABLE `parametros` (
  `id_parametro` int(11) NOT NULL AUTO_INCREMENT,
  `parametro` varchar(60) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_parametro`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `permisos` (
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

INSERT INTO permisos VALUES("1","2","Dashboard","0","0","0","1","prueba","2023-02-12 13:40:14","","");
INSERT INTO permisos VALUES("1","3","Empresas","1","1","1","1","prueba","2023-02-12 13:44:23","prueba","2023-02-12 13:44:36");
INSERT INTO permisos VALUES("1","4","Sorteos","1","1","1","1","prueba","2023-02-12 13:44:56","","");
INSERT INTO permisos VALUES("1","5","Sorteos","0","0","0","1","prueba","2023-02-12 13:52:54","prueba","2023-02-12 13:55:27");
INSERT INTO permisos VALUES("1","6","Premios","1","1","1","1","prueba","2023-02-12 13:55:18","prueba","2023-02-12 14:31:37");
INSERT INTO permisos VALUES("1","13","Configuración","0","0","0","1","prueba","2023-02-12 14:01:31","","");
INSERT INTO permisos VALUES("1","7","Configuración","0","0","0","1","prueba","2023-02-12 14:03:25","","");
INSERT INTO permisos VALUES("1","8","Configuración","1","1","1","1","prueba","2023-02-12 14:05:15","prueba","2023-02-12 14:31:13");
INSERT INTO permisos VALUES("1","9","Configuración","0","0","0","1","prueba","2023-02-12 14:11:46","","");
INSERT INTO permisos VALUES("1","10","Configuración","1","1","1","1","prueba","2023-02-12 14:14:35","","");
INSERT INTO permisos VALUES("1","11","Configuración","1","1","1","1","prueba","2023-02-12 14:22:23","","");
INSERT INTO permisos VALUES("1","12","Configuración","1","1","1","1","prueba","2023-02-12 14:26:03","prueba","2023-02-12 14:31:27");



CREATE TABLE `personas` (
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

INSERT INTO personas VALUES("1","ADMIN","SISTEMA","0102-1990-00832","33","9876-2301","Femenino","Col. San Angel, Tegucigalpa M.D.C","prueba","2023-01-29 16:02:09","prueba","2023-02-12 11:46:38");
INSERT INTO personas VALUES("2","TAYLOR","SWIFT","0701-1994-12845","29","97652301","Femenino","USA","prueba","2023-01-29 16:04:59","","");
INSERT INTO personas VALUES("3","SERJ","TANKIAN","0802-1997-00012","26","3312-0973","Masculino","Col. Arturo Quezada, zona 3, casa 17, bloque 12. Tegucigalpa M.D.C","prueba","2023-01-29 16:07:07","prueba","2023-02-12 11:45:06");
INSERT INTO personas VALUES("4","JUAN ANDRÉS","PEREZ ZEPEDA","0610-1989-23081","43","99903456","Masculino","Residencial Plaza, Tegucigalpa M.D.C","prueba","2023-01-29 16:13:01","","");
INSERT INTO personas VALUES("5","WILSON","RIOS","1202-1985-00092","48","32412679","Masculino","Col. Las Acacias, Arizona, Atlántida","prueba","2023-01-29 17:46:50","","");
INSERT INTO personas VALUES("6","SANTOS","GARCIA","0610-1984-08242","49","9999-9999","Masculino","Col. Nuñez","prueba","2023-02-12 11:33:13","","");
INSERT INTO personas VALUES("7","EDUARDO","CERATI","0101-1999-11111","23","1111-1111","Masculino","kljjkjljljljlk","prueba","2023-02-16 11:01:16","","");
INSERT INTO personas VALUES("8","JUANONA","MARCIALES","0801-1993-20284","30","1234-5678","Femenino","kljljjljljlk","prueba","2023-02-16 11:02:13","","");
INSERT INTO personas VALUES("9","ASUKA","LANGLEY SORYUU","0801-1996-13063","27","9898-4455","Femenino","dfasdasdadad","prueba","2023-02-16 11:03:24","","");
INSERT INTO personas VALUES("10","JOSE","GARCIA","0904-1996-00012","","1111-1111","Masculino","jjkljkljljlj","soryuu_asuka24","2023-02-16 14:15:44","","");



CREATE TABLE `premios` (
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

INSERT INTO premios VALUES("1","1","1","CAMISA HOMBRE","2","../vistas/assets/premios/camisa.jpg");
INSERT INTO premios VALUES("2","1","1","JUGOS","80","../vistas/assets/premios/jugo-naranja.jpg");
INSERT INTO premios VALUES("3","1","3","A","24","../vistas/assets/premios/Iconos-2-envio-08.jpg");



CREATE TABLE `premios_sorteo` (
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




CREATE TABLE `restablece_clave_email` (
  `id_restablecer` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_restablecer`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO restablece_clave_email VALUES("1","karimhernandez233@gmail.com","8381","2023-02-04 12:16:40");
INSERT INTO restablece_clave_email VALUES("2","karimhernandez233@gmail.com","3881","2023-02-04 12:17:57");
INSERT INTO restablece_clave_email VALUES("3","karimhernandez233@gmail.com","8308","2023-02-04 12:20:59");
INSERT INTO restablece_clave_email VALUES("4","karimhernandez233@gmail.com","1875","2023-02-04 12:25:04");
INSERT INTO restablece_clave_email VALUES("5","karimhernandez233@gmail.com","1308","2023-02-04 12:28:07");



CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `creado_por` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO roles VALUES("1","ADMINISTRADOR","Administrador del sistema","prueba","2023-01-18 20:42:58","","");
INSERT INTO roles VALUES("2","EMPLEADO","Encargado de monitorear actividad de usuarios","prueba","2023-01-19 07:42:09","","");
INSERT INTO roles VALUES("3","PARTICIPANTE","Usuario registrado en el sistema que participa de los sorteos realizados","prueba","2023-01-22 12:06:58","TANKIAN","2023-01-29 16:11:10");



CREATE TABLE `sorteos` (
  `id_sorteo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sorteo` varchar(100) NOT NULL,
  `rango_inicial` int(11) NOT NULL,
  `rango_final` int(10) DEFAULT NULL,
  `estado_sorteo` enum('Activo','Inactivo') DEFAULT NULL,
  PRIMARY KEY (`id_sorteo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO sorteos VALUES("1","1ER MARATON DE VERANO SULA","1","1200","Activo");
INSERT INTO sorteos VALUES("2","PREMIERE UNA LOCA NAVIDAD CATRACHA 2","1201","1850","Inactivo");
INSERT INTO sorteos VALUES("3","HILA","1851","2000","Inactivo");



CREATE TABLE `usuarios` (
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

INSERT INTO usuarios VALUES("1","1","prueba","Activo","$2y$12$996vQ8DmONpCbf2Sx1.B4ORCm/zF38i0OBdb4r5p4JjH5TYncq.F.","1","","prueba@gmail.com","prueba","2023-01-29 16:03:30","prueba","2023-02-12 11:51:47");
INSERT INTO usuarios VALUES("2","2","SWIFTIE","Activo","$2y$12$DfRsD1/Qf1FisI/VwQWrve5iZ2GboPhH7BCtLloE5p53q1S8aqmB.","2","","swift@taylor.com","prueba","2023-01-29 16:04:59","","");
INSERT INTO usuarios VALUES("3","3","tankians34","Activo","$2y$12$TypNeC35UbRFM0wMYfpi9.WapmQiOvmDPv6Fymktb/W4jfxf0TucG","1","","serjtankian@gmail.es","prueba","2023-01-29 16:07:07","prueba","2023-02-12 11:45:06");
INSERT INTO usuarios VALUES("4","4","JUANP","Activo","$2y$12$i836qbF5sxjT0I2VHP13XeLQ7ZdbVu28cmy1bKjsxQUM9mk6aBV/S","3","","juanperez@hotmail.com","prueba","2023-01-31 16:13:30","","");
INSERT INTO usuarios VALUES("5","5","RIOSWIL","Activo","$2y$12$DfRsD1/Qf1FisI/VwQWrve5iZ2GboPhH7BCtLloE5p53q1S8aqmB.","3","","ordonezwilson@outlook.com","prueba","2023-02-10 12:34:41","","");
INSERT INTO usuarios VALUES("6","6","santos_garcia123","Activo","$2y$12$XDsZiIKIUgnPk8/MBmgDIOft4vdY18kdQO5tnLdyQaGp7zAF/M89a","2","","ejemplo@correo.com","prueba","2023-02-12 11:33:13","","");
INSERT INTO usuarios VALUES("7","7","educerati","Activo","$2y$12$BQYbhrB8cIIf/CXptPHmbudaUcU4bY21Ca8PQcViU63qF6B5ypE7q","2","","ejemplos@ejemplos.com","prueba","2023-03-16 11:01:16","","");
INSERT INTO usuarios VALUES("8","8","juanamar","Activo","$2y$12$XttJg07u05Fqrf3PajgpNezDFSExhj.DV0GsYZ75unzktbrOrmtbW","2","","ejemplito@ejemplito.com","prueba","2023-03-16 11:02:13","","");
INSERT INTO usuarios VALUES("9","9","soryuu_asuka24","Activo","$2y$12$996vQ8DmONpCbf2Sx1.B4ORCm/zF38i0OBdb4r5p4JjH5TYncq.F.","1","","soryuuasuka@asuka.com","prueba","2023-03-16 11:03:24","","");
INSERT INTO usuarios VALUES("10","10","jose123","Activo","$2y$12$tBXVrQhAltyERgwAHJjm7epcZLlRlvZKNYn6a7Oy3YWP0GoQ7oSc2","2","","jjkljkljljlkjkl@gmail.com","soryuu_asuka24","2023-02-16 14:15:44","","");


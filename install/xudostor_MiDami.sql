# Host: 104.156.58.29  (Version 5.5.5-10.3.15-MariaDB)
# Date: 2019-06-07 17:05:45
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "md_genero"
#

DROP TABLE IF EXISTS `md_genero`;
CREATE TABLE `md_genero` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_genero"
#

INSERT INTO `md_genero` VALUES (1,'Masculino'),(2,'Femenino');

#
# Structure for table "md_grupos"
#

DROP TABLE IF EXISTS `md_grupos`;
CREATE TABLE `md_grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(255) DEFAULT NULL,
  `own_user_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "md_grupos"
#

INSERT INTO `md_grupos` VALUES (1,'Fast',2);

#
# Structure for table "md_lvlformacion"
#

DROP TABLE IF EXISTS `md_lvlformacion`;
CREATE TABLE `md_lvlformacion` (
  `id_lvlformacion` int(11) NOT NULL AUTO_INCREMENT,
  `formacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_lvlformacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "md_lvlformacion"
#

INSERT INTO `md_lvlformacion` VALUES (1,'Primaria'),(2,'Secundaria'),(3,'Superior 1mer Nivel');

#
# Structure for table "md_menu"
#

DROP TABLE IF EXISTS `md_menu`;
CREATE TABLE `md_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) DEFAULT NULL,
  `icono` varchar(25) DEFAULT NULL,
  `url` varchar(150) DEFAULT '',
  `nivel_up` int(11) DEFAULT 0,
  `id_permiso` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

#
# Data for table "md_menu"
#

INSERT INTO `md_menu` VALUES (1,'dashbard','ti-dashboard','',0,'{1,2,3,4}'),(2,'panel administrador',NULL,'dashboard',1,'{1,2}'),(4,'sistema','ti-layout-sidebar-left','',0,'{1}'),(8,'clientes','ti-id-badge','',0,'{1,2,3,4}'),(9,'todos los clientes',NULL,'clientes',8,'{1,2,3,4}'),(10,'usuarios','ti-user','',0,'{1}'),(11,'todos los usuarios',NULL,'usuarios',10,'{1}'),(12,'historias clinicas','ti-bookmark-alt','',0,''),(13,'todas las historias',NULL,'historiasclinicas',12,''),(14,'añadir nueva',NULL,'historiasclinicas/historia',12,''),(15,'workflows','ti-bolt','',0,'{}'),(16,'tareas',NULL,'workflows',15,'{}'),(17,'añadir nuevo',NULL,'clientes/cliente',8,'{1,2,3,4}'),(18,'añadir nuevo',NULL,'usuarios/usuario',10,'{1}'),(19,'añadir nueva',NULL,'workflows/workflow',15,'{}'),(20,'tienda','ti-shopping-cart','',0,'{1,2,3,4}'),(21,'todas las ventas',NULL,'tienda/ventas',20,'{1,2,3,4}'),(22,'productos',NULL,'tienda/productos',20,'{1}'),(23,'pagos',NULL,'tienda/pagos',20,'{1}'),(24,'Call Center','ti-headphone-alt','',0,'{1}'),(25,'grupos',NULL,'usuarios/grupos',10,'{1}');

#
# Structure for table "md_permisos"
#

DROP TABLE IF EXISTS `md_permisos`;
CREATE TABLE `md_permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(15) DEFAULT NULL,
  `lvl_permiso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "md_permisos"
#

INSERT INTO `md_permisos` VALUES (1,'Administrador',9),(2,'Vendedor',2),(3,'Director',4),(4,'Autorizador',6),(5,'Contador',7);

#
# Structure for table "md_shop_metodospagos"
#

DROP TABLE IF EXISTS `md_shop_metodospagos`;
CREATE TABLE `md_shop_metodospagos` (
  `id_metodopago` int(11) NOT NULL AUTO_INCREMENT,
  `metodo_pago` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_metodopago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_metodospagos"
#

INSERT INTO `md_shop_metodospagos` VALUES (1,'efectivo'),(2,'PlacetoPay');

#
# Structure for table "md_shop_pagos"
#

DROP TABLE IF EXISTS `md_shop_pagos`;
CREATE TABLE `md_shop_pagos` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_statuspago` int(10) DEFAULT NULL,
  `id_metodopago` int(11) DEFAULT NULL,
  `importe` decimal(10,2) DEFAULT NULL,
  `data_pago` varchar(1000) DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_pagos"
#

INSERT INTO `md_shop_pagos` VALUES (29,NULL,89,NULL,1,1,NULL,NULL,'{\"url\":null}','2019-06-03 00:00:00'),(30,NULL,89,NULL,1,1,NULL,NULL,'{\"url\":null}','2019-06-03 00:00:00'),(31,NULL,102,NULL,1,1,NULL,NULL,'{\"url\":null}','2019-06-03 00:00:00'),(32,NULL,102,NULL,1,1,NULL,NULL,'{\"url\":null}','2019-06-03 00:00:00'),(33,NULL,84,NULL,1,1,NULL,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98830\\/1feb3ca26f890127525cfe5f83f45a48\"}','2019-06-03 00:00:00'),(34,NULL,84,NULL,1,1,NULL,NULL,'{\"url\":null}','2019-06-03 00:00:00'),(35,NULL,22546,NULL,1,1,NULL,NULL,'{\"url\":null}','2019-06-03 00:00:00'),(36,NULL,84,NULL,1,1,NULL,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98842\\/600ecdb8bcd654cfe8eeab711f3013b2\"}','2019-06-03 00:00:00'),(37,NULL,84,NULL,1,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98844\\/ffb20863932962e672f9f4fc7fc1be68\",\"requestid\":98844,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-03 00:00:00'),(38,NULL,22546,NULL,1,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98845\\/5bf1b178b28ba0b554e2c9b292f6ecc8\",\"requestid\":98845,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-03 00:00:00'),(39,NULL,22547,NULL,1,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98846\\/f41d0eac3392dc92976ddb472cbd3efa\",\"requestid\":98846,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-03 00:00:00'),(40,NULL,22548,NULL,1,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98848\\/3b4446cef4a1dbe319a188a45e650cb1\",\"requestid\":98848,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-03 00:00:00'),(41,NULL,22548,NULL,2,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98854\\/45483ed3407af81a5fd9ef6602b66e19\",\"requestid\":98854,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha sido cancelada por el usuario\"}','2019-06-03 00:00:00'),(42,NULL,84,NULL,1,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98869\\/c78af51bdc56695942ccf83b7b56f467\",\"requestid\":98869,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-03 00:00:00'),(43,NULL,22549,NULL,1,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98873\\/cafaad8ae742920290d58ffcdebcc1fe\",\"requestid\":98873,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-03 00:00:00'),(45,NULL,84,NULL,1,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98882\\/f7a3648b6024177795cda04268fc8bba\",\"requestid\":98882,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-03 00:00:00'),(46,NULL,22546,NULL,1,1,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98883\\/89d9bc1927d416a34a704b93f57ee9da\",\"requestid\":98883,\"status\":\"OK\"}','2019-05-03 02:20:25'),(47,NULL,84,1,1,2,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98892\\/723599e20469581dc6fa84880fa1a2f2\",\"requestid\":98892,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-03 03:38:25'),(50,NULL,84,1,1,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98936\\/8df8bafe5d935566edff2366e37133f2\",\"requestid\":98936,\"status\":\"PENDING\",\"message\":\"La petici\\u00f3n se encuentra activa\"}','2019-06-03 05:03:05'),(52,NULL,89,1,1,2,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98969\\/3d152eeccafca23f3d17c093b9e19de9\",\"requestid\":98969,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-03 08:23:55'),(53,NULL,84,1,1,2,1,NULL,NULL,'2019-06-03 09:47:00'),(55,NULL,22546,1,1,1,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/98972\\/e33c7fdecea5edf76e547a703dfe462a\",\"requestid\":98972,\"status\":\"OK\"}','2019-06-03 11:13:01'),(58,NULL,84,1,1,2,2,NULL,'{\"url\":\"https:\\/\\/cutt.ly\\/niqfsl\",\"requestid\":99068,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-04 12:21:03'),(59,NULL,84,1,1,2,2,NULL,'{\"url\":\"https:\\/\\/cutt.ly\\/ciqRDA\",\"requestid\":99074,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-04 12:29:42'),(62,NULL,84,1,1,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99791\\/2dd206ff1aa9e143de8fe10a14768ef6\",\"shorturl\":\"https:\\/\\/cutt.ly\\/BiiwV1\",\"requestid\":99791,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-05 04:00:20'),(63,NULL,89,1,1,2,1,NULL,NULL,'2019-06-05 04:16:28'),(64,23,NULL,1,NULL,2,1,NULL,NULL,'2019-06-05 04:48:55'),(65,NULL,89,1,1,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99856\\/0b46fd05b3fe46de636afc5b2fc5afd9\",\"shorturl\":\"https:\\/\\/cutt.ly\\/WiiJtG\",\"requestid\":99856,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-05 09:53:33'),(66,36,NULL,1,NULL,3,2,NULL,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99857\\/8b41c5266d9f9952a8f0816ac9528061\",\"shorturl\":\"https:\\/\\/cutt.ly\\/ziiKQI\",\"requestid\":99857,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-05 09:22:42'),(68,33,NULL,1,NULL,2,1,NULL,NULL,'2019-06-05 10:15:11'),(69,33,NULL,1,NULL,2,1,NULL,NULL,'2019-06-05 10:23:52'),(70,33,NULL,1,NULL,2,1,350.00,NULL,'2019-06-05 10:02:55'),(71,33,NULL,1,NULL,3,2,175.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99890\\/a26d62fa24cbd1372215aa955b0b00e2\",\"shorturl\":\"https:\\/\\/cutt.ly\\/viaGZU\",\"requestid\":99890,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-06 09:58:00'),(72,38,NULL,1,NULL,3,2,175.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99891\\/d79a167c839e8b4513e7dccdca06597e\",\"shorturl\":\"https:\\/\\/cutt.ly\\/MiaK7o\",\"requestid\":99891,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-06 09:25:05'),(73,38,NULL,1,NULL,3,2,350.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99893\\/ef3d96670e35161ce21dac6dd5f1f892\",\"shorturl\":\"https:\\/\\/cutt.ly\\/YiaXJB\",\"requestid\":99893,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-06 09:01:11'),(74,38,NULL,1,NULL,2,2,175.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99899\\/71f5d2db0488c3950a5966c3ad8c647e\",\"shorturl\":\"https:\\/\\/cutt.ly\\/qia9o8\",\"requestid\":99899,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-06 09:21:33'),(75,38,NULL,1,NULL,1,1,175.00,NULL,'2019-06-06 09:35:38'),(76,39,NULL,1,NULL,2,2,175.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99914\\/bea717fb76893577dfe3282edd378002\",\"shorturl\":\"https:\\/\\/cutt.ly\\/nisp4X\",\"requestid\":99914,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-06 10:13:10'),(77,32,NULL,1,NULL,2,2,350.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99931\\/08322c39a3fd193abacbf222904213a3\",\"shorturl\":\"https:\\/\\/cutt.ly\\/pisPgs\",\"requestid\":99931,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-06 11:04:03'),(78,31,NULL,1,NULL,2,2,100.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99936\\/83133fd9ec624769d462072d2c71f363\",\"shorturl\":\"https:\\/\\/cutt.ly\\/uisSYl\",\"requestid\":99936,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-06 11:44:08'),(79,31,NULL,1,NULL,2,2,150.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99944\\/602a1df23eb29d4822ca3195682ad30b\",\"shorturl\":\"https:\\/\\/cutt.ly\\/SisLKs\",\"requestid\":99944,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-06 11:10:26'),(80,40,NULL,1,NULL,2,2,175.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99947\\/fb947153514c859a4c83982c28532f93\",\"shorturl\":\"https:\\/\\/cutt.ly\\/aisVMs\",\"requestid\":99947,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-06 11:48:34'),(81,41,NULL,1,NULL,2,2,175.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99951\\/3b47fcdeeb0bfbf76fae87457adf2d34\",\"shorturl\":\"https:\\/\\/cutt.ly\\/Dis0zA\",\"requestid\":99951,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-06 11:13:44'),(82,41,NULL,1,NULL,2,2,175.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99960\\/3d95ebfca0c98962ca24c7308b5c0864\",\"shorturl\":\"https:\\/\\/cutt.ly\\/ridqJ2\",\"requestid\":99960,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-06 12:10:05'),(83,42,NULL,1,NULL,4,2,175.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99963\\/9fa3b9c19ebc8c247c78f2c89f04e396\",\"shorturl\":\"https:\\/\\/cutt.ly\\/gidspf\",\"requestid\":99963,\"status\":\"REJECTED\",\"message\":\"La petici\\u00f3n ha expirado\"}','2019-06-06 12:35:31'),(84,42,NULL,1,NULL,2,2,175.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/99996\\/b2a5cef31f2bb424ab6049c40b0b05b3\",\"shorturl\":\"https:\\/\\/cutt.ly\\/aidVmh\",\"requestid\":99996,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-06 02:39:49'),(86,42,NULL,1,NULL,2,1,175.00,NULL,'2019-06-06 03:29:18'),(87,43,NULL,1,NULL,2,2,175.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/100007\\/09230f8fb3b1a9feed92407bf41a3c94\",\"shorturl\":\"https:\\/\\/cutt.ly\\/gid9vV\",\"requestid\":100007,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-06 03:47:20'),(88,43,NULL,1,NULL,2,1,175.00,NULL,'2019-06-06 03:02:23'),(89,45,NULL,54,NULL,2,1,150.00,NULL,'2019-06-06 04:34:02'),(90,45,NULL,54,NULL,2,1,200.00,NULL,'2019-06-06 04:52:02'),(91,46,NULL,1,NULL,2,1,100.00,NULL,'2019-06-06 10:55:06'),(92,46,NULL,1,NULL,2,2,250.00,'{\"url\":\"https:\\/\\/test.placetopay.ec\\/redirection\\/session\\/100114\\/92c044db312e29a168b948bc1b2d455e\",\"shorturl\":\"https:\\/\\/cutt.ly\\/zifLP9\",\"requestid\":100114,\"status\":\"APPROVED\",\"message\":\"La petici\\u00f3n ha sido aprobada exitosamente\"}','2019-06-06 10:12:07'),(96,55,NULL,54,NULL,2,1,175.00,NULL,'2019-06-07 02:28:14'),(97,50,NULL,48,NULL,2,1,175.00,NULL,'2019-06-07 04:54:49'),(98,50,NULL,48,NULL,2,1,175.00,NULL,'2019-06-07 04:31:55');

#
# Structure for table "md_shop_productos"
#

DROP TABLE IF EXISTS `md_shop_productos`;
CREATE TABLE `md_shop_productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(100) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `id_typeproducto` int(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `duracion_dias` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_productos"
#

INSERT INTO `md_shop_productos` VALUES (1,'Plan Gold','Membresia total',1,350.00,12,365),(2,'Plan Platino','Menbresia de articulos',1,200.00,12,365);

#
# Structure for table "md_shop_statuspagos"
#

DROP TABLE IF EXISTS `md_shop_statuspagos`;
CREATE TABLE `md_shop_statuspagos` (
  `id_statuspago` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_statuspago`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_statuspagos"
#

INSERT INTO `md_shop_statuspagos` VALUES (1,'pendiente'),(2,'aprobado'),(3,'rechazada'),(4,'caducado');

#
# Structure for table "md_shop_statusventas"
#

DROP TABLE IF EXISTS `md_shop_statusventas`;
CREATE TABLE `md_shop_statusventas` (
  `id_statusventa` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `ver` varchar(255) DEFAULT NULL,
  `editar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_statusventa`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_statusventas"
#

INSERT INTO `md_shop_statusventas` VALUES (1,'Borrador','{1,2,3}','{1,2}'),(2,'Completado','{1,4}','{1}'),(3,'Fallido','{1,2,3,4}','{1,2,3,4}'),(4,'Sin cupo','{1,3,4}','{1}'),(5,'Pendiente','{1,2,3}','{1,3}'),(6,'Contactado','{1,3,4}','{1,4}');

#
# Structure for table "md_shop_typeproductos"
#

DROP TABLE IF EXISTS `md_shop_typeproductos`;
CREATE TABLE `md_shop_typeproductos` (
  `id_typeproducto` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_typeproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_typeproductos"
#

INSERT INTO `md_shop_typeproductos` VALUES (1,'Digital'),(2,'Fisico');

#
# Structure for table "md_shop_ventas"
#

DROP TABLE IF EXISTS `md_shop_ventas`;
CREATE TABLE `md_shop_ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_statusventa` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `importe` decimal(10,2) DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_ventas"
#

INSERT INTO `md_shop_ventas` VALUES (23,1,84,1,200.00,NULL,'2019-06-01'),(24,1,102,1,1950.00,NULL,'2019-06-01'),(25,1,104,1,350.00,NULL,'2019-06-01'),(26,1,22546,1,400.00,NULL,'2019-06-01'),(27,1,102,1,1200.00,NULL,'2019-06-01'),(28,1,84,1,350.00,NULL,'2019-06-04'),(29,1,22550,1,350.00,NULL,'2019-06-04'),(30,1,84,1,350.00,NULL,'2019-06-05'),(31,1,84,4,350.00,350.00,'2019-06-05'),(32,1,84,4,700.00,700.00,'2019-06-05'),(41,1,22552,2,350.00,350.00,'2019-06-06'),(42,1,84,2,350.00,350.00,'2019-06-06'),(43,1,22551,2,350.00,350.00,'2019-06-06'),(44,1,89,1,350.00,NULL,'2019-06-06'),(45,54,84,3,350.00,350.00,'2019-06-06'),(46,1,89,2,350.00,350.00,'2019-06-06'),(48,1,22551,5,350.00,NULL,'2019-06-07'),(50,54,84,2,350.00,350.00,'2019-06-07'),(55,54,84,4,350.00,175.00,'2019-06-07');

#
# Structure for table "md_shop_ventas_detalle"
#

DROP TABLE IF EXISTS `md_shop_ventas_detalle`;
CREATE TABLE `md_shop_ventas_detalle` (
  `id_venta_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_venta_detalle`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_ventas_detalle"
#

INSERT INTO `md_shop_ventas_detalle` VALUES (4,25,1,350.00,'1',1.00),(5,26,2,200.00,'2',2.00),(6,27,2,200.00,'6',6.00),(7,28,1,350.00,'1',1.00),(8,29,1,350.00,'1',1.00),(9,30,1,350.00,'1',1.00),(10,31,1,350.00,'1',1.00),(11,32,1,350.00,'2',700.00),(15,24,2,200.00,'1',200.00),(16,24,1,350.00,'5',1750.00),(17,33,1,350.00,'1',350.00),(18,34,1,350.00,'1',350.00),(19,23,2,200.00,'1',200.00),(20,36,1,350.00,'1',350.00),(21,37,1,350.00,'1',350.00),(22,38,1,350.00,'1',350.00),(23,39,1,350.00,'1',350.00),(24,40,1,350.00,'1',350.00),(25,41,1,350.00,'1',350.00),(26,42,1,350.00,'1',350.00),(27,43,1,350.00,'1',350.00),(28,44,1,350.00,'1',350.00),(29,45,1,350.00,'1',350.00),(30,46,1,350.00,'1',350.00),(31,47,1,350.00,'1',350.00),(32,48,1,350.00,'1',350.00),(33,50,1,350.00,'1',350.00),(34,55,1,350.00,'1',350.00);

#
# Structure for table "md_statuscivil"
#

DROP TABLE IF EXISTS `md_statuscivil`;
CREATE TABLE `md_statuscivil` (
  `id_statuscivil` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_statuscivil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "md_statuscivil"
#

INSERT INTO `md_statuscivil` VALUES (1,'Soltero'),(2,'Casado'),(3,'Divorsiado'),(4,'Union libre');

#
# Structure for table "md_clientes"
#

DROP TABLE IF EXISTS `md_clientes`;
CREATE TABLE `md_clientes` (
  `id_cliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) DEFAULT NULL,
  `dni` varchar(12) NOT NULL DEFAULT '',
  `id_genero` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `cel` varchar(11) DEFAULT NULL,
  `fec_nac` date DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `id_lvlformacion` int(11) DEFAULT NULL,
  `id_statuscivil` int(11) DEFAULT NULL,
  `client` int(11) NOT NULL,
  `fec_ingreso` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_cliente`,`dni`),
  KEY `id_genero` (`id_genero`),
  KEY `id_statuscivil` (`id_statuscivil`),
  KEY `id_lvlformacion` (`id_lvlformacion`),
  CONSTRAINT `md_clientes_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `md_genero` (`id_genero`),
  CONSTRAINT `md_clientes_ibfk_2` FOREIGN KEY (`id_statuscivil`) REFERENCES `md_statuscivil` (`id_statuscivil`),
  CONSTRAINT `md_clientes_ibfk_3` FOREIGN KEY (`id_lvlformacion`) REFERENCES `md_lvlformacion` (`id_lvlformacion`)
) ENGINE=InnoDB AUTO_INCREMENT=22550 DEFAULT CHARSET=utf8;

#
# Data for table "md_clientes"
#

INSERT INTO `md_clientes` VALUES (84,'Gutierrez Gonzalez Santiago','1756666598',1,'zam.2014.sg@gmail.com',NULL,'0984904911','2019-03-25','Quito','Ecuatoriana',3,2,1,'2019-03-25 10:56:39'),(85,'Ismael Gutierrez','1756666597',1,'zam.2014.sg@gmail.com',NULL,'0984904911','2019-03-21',NULL,'Ecuatoriana - sector sur',1,1,1,'2019-03-21 16:15:33'),(89,'Oña Chamorro Josselyn Estefania','1727324715',2,'j.ona@gmail.com','023944900','0996566908','1998-10-09',NULL,'Ecuatoriana - Sur de quito',2,2,1,'2019-03-21 22:40:12'),(95,'Gutierrez Oña Ismael','1759192808',1,'ismael@gmail.com',NULL,'0984904911','2019-04-14',NULL,'Ecuatoriana',2,1,1,'2019-04-14 18:22:28'),(102,'Jorge Jurado','1234568',1,'j.jurado@xudo.com',NULL,'0984904911','1997-11-06','Quito','No se bueno si se',3,2,1,NULL),(103,'Chavez Ayala Victor Hugo','1711080778',1,'chavez@app.xudo.dev',NULL,'0984904911','1950-05-17',NULL,'',2,2,1,'2019-05-10 10:18:37'),(104,'Pincay Demera Carlos Guillermo','1308916095',1,'carlos@app.xudo.dev',NULL,'0996566908','2010-06-17',NULL,'Norte',2,1,1,'2019-05-10 10:23:14'),(22546,'Becerra Samaniego Miguel Rogelio','0701087736',1,'bsmiguel.rogelio@hotmail.com','072924399',NULL,'2019-05-15',NULL,'SEC SUR BAR 18 DE OCTUBRE 4TA NORTE ENTRE 11 AVA Y 12 AVA OESTE CS BLANCA 1P DE LOZA A CUADRA Y MEDIA DE LA ESCUELA LEOPOLDO MUÑOZ',2,2,1,'2019-05-15 11:15:18'),(22547,'Lindao Ramirez Vicente','0909031007',1,'lindao@xudo.dev','098490411',NULL,'2019-06-06',NULL,'pichincha - quito',2,2,1,'2019-06-03 12:31:54'),(22548,'Abril Pozo Doris Estrella','1706964242',1,'e.abril@grupoeconomundo.com','023944900',NULL,'2019-06-06',NULL,'Quito',3,2,1,'2019-06-03 12:39:03'),(22549,'Ordoñez Diaz Pedro Alejandro','1715452601',1,'alejandro@grupoeconomundo.com','023944900',NULL,'2019-06-13',NULL,'Quito',3,2,1,'2019-06-03 14:04:48'),(22550,'Lascano Mera Manuel Milton','1302196017',1,'milton.xudo.dev','0984904911',NULL,'2019-06-27',NULL,'Guayaquil',2,2,1,'2019-06-04 18:07:46'),(22551,'Villamarin Arias Josselyn Vanessa','1726606195',2,'vane.villamarin@hotmail.com','0983782209','0983782209','2019-06-07',NULL,'',2,2,1,'2019-06-06 10:03:35'),(22552,'Parraga Velez Katherine Jazmin','1313588277',2,'jaz@xudo.dev','023944900',NULL,'2019-06-19',NULL,'Quito - Sur',2,4,1,'2019-06-06 12:32:49');

#
# Structure for table "md_statususer"
#

DROP TABLE IF EXISTS `md_statususer`;
CREATE TABLE `md_statususer` (
  `id_statususer` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_statususer`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_statususer"
#

INSERT INTO `md_statususer` VALUES (1,'habilitado'),(2,'deshabilitado');

#
# Structure for table "md_user"
#

DROP TABLE IF EXISTS `md_user`;
CREATE TABLE `md_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `dni` varchar(11) NOT NULL DEFAULT '',
  `id_genero` int(11) DEFAULT NULL,
  `pass` varchar(500) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `fec_nac` date DEFAULT NULL,
  `id_lvlformacion` int(11) DEFAULT NULL,
  `id_statuscivil` int(11) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `fec_ingreso` datetime DEFAULT NULL,
  `id_statususer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`dni`),
  KEY `id_permisos` (`id_permiso`),
  KEY `id_statuscivil` (`id_statuscivil`),
  KEY `id_genero` (`id_genero`),
  KEY `id_statususer` (`id_statususer`),
  CONSTRAINT `md_user_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `md_permisos` (`id_permiso`),
  CONSTRAINT `md_user_ibfk_2` FOREIGN KEY (`id_statuscivil`) REFERENCES `md_statuscivil` (`id_statuscivil`),
  CONSTRAINT `md_user_ibfk_5` FOREIGN KEY (`id_genero`) REFERENCES `md_genero` (`id_genero`),
  CONSTRAINT `md_user_ibfk_6` FOREIGN KEY (`id_statususer`) REFERENCES `md_statususer` (`id_statususer`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

#
# Data for table "md_user"
#

INSERT INTO `md_user` VALUES (1,'Santiago Gutierrez Gonzalez','1756666598',1,'U2wpZq1+FzTxJ2eaOZSI+XE7+4XQOq3kUqnVInjkmxeC71msZ00cUEF7ajVn5w/N3OOgmDs4uwoeB9x2OgZK9g==',1,'zam.2014.sg@gmail.com','0984904911','1997-11-07',3,2,'Pedro Ponce Carrasco Oe-06 y Av. Diego de almagro',NULL,1),(2,'Ismael Gutierrez Oña','1759192808',1,'9o/soAa9bbdFR5m8igeCAL2Tw1Mu+XpmzyV5F4NTX+5hvSQl10NmiP0LFlrI2AWi0TNpZM7eze+TLD5MqCALNg==',3,'i_g@gmail.com','1216556498',NULL,1,2,'',NULL,1),(48,'Grace Carolina','123587456',2,'AXlTHtyZaJNWN6fJ4bSpmHt9o10WgDWwaVQr6MK/yu4yetLo/dzTAsL5yw/Vf9n/PLvi8TZVZJAcLHoGoozz9g==',4,'g.calderon@grupoeconmundo.com','2365689','0000-00-00',0,1,'Lunbisi',NULL,1),(50,'German Dioquilima','4562148532',1,'b3ggeY4CLkGtHrAfLNYSV9kQ5WHgiEBjoey+4k1z1OMqYTGJHl4qtPrLMqBkpV0CbzYWLvnbmFU/3njnVx+opg==',4,'g.dioquilima@grupoeconomundo.com','098495653',NULL,NULL,2,'',NULL,1),(51,'Yohanna Paola Calderon','1546578455',2,'202cb962ac59075b964b07152d234b70',1,'asesoriacomercial@grupoeconomundo.com',NULL,NULL,NULL,2,NULL,NULL,1),(53,'Leslie Melissa Alvarez','7852156321',2,'8ruCfqX4sqToXSchSO6ayR7WF/pfeJfUApfx9NfvNEWTeqDWQu+VPYpICE25cvqkn3hP9QFWTA4tWC79r7QsFQ==',4,'l.alvarez@grupoeconomundo.com','400',NULL,NULL,3,'Quito - Ecuador',NULL,1),(54,'Carolina Gutierrez','4512151462',2,'AWGFn/1dB+TONcIFHXT5pv8sudiwod1y8U4zuHcCo7AYMzQiNOv/+N+eu8sJMhmJ6rzxfYiunM1xQ89j+HJRHQ==',2,'lizeth.c@gmail.com','02323566','0000-00-00',2,1,'Solanda',NULL,1),(73,'William Ricardo Gutierrez Trujillo','1894561235',1,'WduBypUIxi+z50HJr8PeKL62ldsNp4yWI2ytlgqkhoS+Tcf9mtnqKA1iCrG7ui17xul80mzK7IQHXh+oemsXyw==',2,'w.ricardo@xudo.store','35223322',NULL,NULL,2,'Cali - Colombia','2019-03-16 04:44:14',2),(74,'Pepito Jaja Zambrano','1745623211',1,'qv40FYJ4b9iMRk0cpJb9AwR8G4jyUXKwqUJo0UrDGIvqxMQ43s1HGuFhk+WdDawzhNNuZseiTAp9Q1aLv4JEVA==',2,'p.zambrano@grupoeconomundo.com','322222222',NULL,NULL,1,'No se y no quiero saber','2019-03-16 04:57:34',1),(75,'Katerin Oña Peralta','1234567895',2,'NcReeA4hveBObdM13wzh7dfFdCoWyTokkzkbEmOCu2WcqXeJ5tSS55o2VTdOP8kl0vYjSRfHkQzYfux+JBjQoQ==',2,'k.ona@grupoeconomundo.com','325412511',NULL,NULL,4,'Ecuatoriana','2019-03-16 05:29:37',1),(77,'Doris Estrella Pozo','879654121',2,'DrPpJbDKJE9GHkxGQLb6ewB1QLZ5f3V/heIJHPjwyE5/TtK3fJHynkpzvqt782k1mekOev7Yp6KKxEc+IHCleQ==',2,'e.abril@grupoeconomundo.com','023944900',NULL,NULL,2,'Carolina','2019-03-17 06:53:28',1),(78,'Josselyn Estefania Oña Chamorro','1727324715',2,'L/dmG4HhUox1Goj68fcNOyeJTs2RjXLvi9pG8mVUrvpW9NGTdgXLpftduIh91wcEcOn3j6KkNC4IJ24QAINu0g==',2,'j.ona@grupoeconomundo.com','0000025156',NULL,NULL,2,'Ecuaotriana','2019-03-17 10:30:38',1),(79,'Anthony Adrian Mero Berrones','1727028134',1,'XwjexufhQxXEHLfjCYoQu1xflhfsL6l1pBzMvypynIhu1/n+v1fxbdBldQslSRoUar+8ejSzU9ltoUH3Gffv6w==',1,'anthony@xudo.store','00331355151','0000-00-00',2,3,'Donde el viento se devuelve','2019-03-19 11:21:05',1),(80,'Vanessa Villamarin','1234657654',1,'YzFjJ6WEFDmBHmsqy/l/OQRqgf8BSGH8mUY/EJxiZLfj7apxwGYfteswK9inxMFe9lrYtPwtpfaR7TVXdcDYIQ==',4,'v.villamarin@grupoeconmundo','023944900',NULL,NULL,4,'','2019-03-21 12:23:07',1),(81,'Jamar Odalis Masias Hurtado','1727325787',2,'S5kIU0omxIE+UJx/C94N794MGiL5TMSqY8rc2jGGpGSH3kqaUkvX8I7r1uZceRbhYohdm6Y3Vn1yzz1yxoHKUg==',1,'odales@xudo.dev','0984904911',NULL,NULL,1,'NO se xD','2019-04-18 09:58:41',1),(85,'Santiago','789546222',1,'cIIH0+EDm+KoLtRVzUIZOL4RyCOeoYymY0Zxkgn01DAq8Dv0nQAynWeNP5CtgSSrXLnExJATy4uV7DKqav3CMw==',3,'como@xudo.com','12151632','1997-02-02',3,1,'no se',NULL,NULL),(86,'Josrge Jurado','123456855',1,'0Pp1TeLiUSH/0LFpMDYDFRU0gbYrOS3NQFvrfGcs0Pmfh3/7DEcPOoMOlHzRJN+imfpd2JdgZmfeDtTBm+dxsA==',1,'jurado@gmail.com','098466222','1952-02-02',3,2,'No se bueno si se pero no te voy a decir',NULL,NULL),(89,'Llumiquinga Muñoz Erick Alejandro','1750057729',1,'8PhaT4j8sZTNFO2PauxHkO5zA4yH/2ccmG5lUzo6RiCrIGO/h5furxCYtx5syTXBkmP8ai2JY+eEqGP63OQPYw==',1,'erick@xudo.dev','099999999','1998-05-03',2,1,'No se',NULL,NULL);

#
# Structure for table "md_users_grupos"
#

DROP TABLE IF EXISTS `md_users_grupos`;
CREATE TABLE `md_users_grupos` (
  `id_grupo` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

#
# Data for table "md_users_grupos"
#

INSERT INTO `md_users_grupos` VALUES (1,54),(1,78),(1,86);

#
# Structure for table "md_workflow_statustasks"
#

DROP TABLE IF EXISTS `md_workflow_statustasks`;
CREATE TABLE `md_workflow_statustasks` (
  `id_statustask` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) DEFAULT NULL,
  `id_permiso` varchar(20) DEFAULT NULL,
  `icono` varchar(50) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_statustask`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "md_workflow_statustasks"
#

INSERT INTO `md_workflow_statustasks` VALUES (1,'Borrador','{1,2}','fas fa-arrow-up rojo','rojo'),(2,'Contactado','{1,2}','id_permiso','azul'),(3,'Auditado','{1}','fas fa-arrow-alt-circle-up amarillo','amarillo'),(4,'Autorizado','{1}','fas fa-check-circle verde','verde'),(5,'Negado','{1}','fas fa-arrow-down rojo','rojo');

#
# Structure for table "md_workflow_typetasks"
#

DROP TABLE IF EXISTS `md_workflow_typetasks`;
CREATE TABLE `md_workflow_typetasks` (
  `id_typetask` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_typetask`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "md_workflow_typetasks"
#

INSERT INTO `md_workflow_typetasks` VALUES (1,'Venta'),(2,'Cobro'),(3,'Soporte');

#
# Structure for table "md_workflow_tasks"
#

DROP TABLE IF EXISTS `md_workflow_tasks`;
CREATE TABLE `md_workflow_tasks` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_encargada` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_statustask` int(11) DEFAULT NULL,
  `id_typetask` int(11) DEFAULT NULL,
  `fecha_create` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_task`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_user` (`id_user`),
  KEY `id_statustask` (`id_statustask`),
  KEY `id_typetask` (`id_typetask`),
  CONSTRAINT `md_workflow_tasks_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `md_user` (`id_user`),
  CONSTRAINT `md_workflow_tasks_ibfk_3` FOREIGN KEY (`id_statustask`) REFERENCES `md_workflow_statustasks` (`id_statustask`),
  CONSTRAINT `md_workflow_tasks_ibfk_4` FOREIGN KEY (`id_typetask`) REFERENCES `md_workflow_typetasks` (`id_typetask`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "md_workflow_tasks"
#

INSERT INTO `md_workflow_tasks` VALUES (1,54,33,1,2,1,'2019-04-27 00:00:00'),(2,54,NULL,89,1,1,'2019-04-25 00:00:00'),(3,1,NULL,84,2,1,'2019-05-10 17:37:01'),(4,NULL,NULL,102,2,1,'2019-05-10 17:49:19'),(5,1,NULL,89,2,1,'2019-05-11 16:00:53'),(6,54,NULL,84,2,1,'2019-05-12 03:53:03'),(7,54,NULL,95,1,1,'2019-05-12 11:53:02');

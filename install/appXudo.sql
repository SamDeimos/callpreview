# Host: 192.168.0.229  (Version 5.5.56-MariaDB)
# Date: 2019-06-28 14:50:05
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "md_callcenter_call_attribute"
#

DROP TABLE IF EXISTS `md_callcenter_call_attribute`;
CREATE TABLE `md_callcenter_call_attribute` (
  `id_call_attribute` int(11) NOT NULL AUTO_INCREMENT,
  `id_call` int(11) DEFAULT NULL,
  `data_attribute` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id_call_attribute`),
  KEY `id_call` (`id_call`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_call_attribute"
#

INSERT INTO `md_callcenter_call_attribute` VALUES (1,1,'{\"cedula\":\"1756666598\",\"ciudad\":\"Cali - Colombia\",\"edad\":\"21\",\"monto\":\"53\",\"vehiculo\":\"porsche\",\"modelo\":\"cayman\",\"a\\u00f1o\":\"2019\"}'),(2,2,'{\"cedula\":\"1756668542\",\"ciudad\":\"Quito - Ecuador\",\"edad\":\"20\",\"monto\":\"26\",\"vehiculo\":\"chevrolet\",\"modelo\":\"camaro\",\"a\\u00f1o\":\"2019\"}'),(3,3,'{\"cedula\":\"1759854632\",\"ciudad\":\"Guallaquil - Ecuador\",\"edad\":\"41\",\"monto\":\"26\",\"vehiculo\":\"Jaguar\",\"modelo\":\"F-Pace\",\"a\\u00f1o\":\"2017\"}'),(4,4,'{\"cedula\":\"1750125486\",\"ciudad\":\"Lima - Peru\",\"edad\":\"25\",\"monto\":\"26\",\"vehiculo\":\"Volkswagen\",\"modelo\":\"canddy\",\"a\\u00f1o\":\"2018\"}'),(5,5,'{\"cedula\":\"1796326571\",\"ciudad\":\"Bueno aires - Argentina\",\"edad\":\"31\",\"monto\":\"26\",\"vehiculo\":\"Lada\",\"modelo\":\"NIVA\",\"a\\u00f1o\":\"2019\"}'),(6,6,'{\"cedula\":\"1796552325\",\"ciudad\":\"Bogot\\u00e1 - Colombia\",\"edad\":\"53\",\"monto\":\"26\",\"vehiculo\":\"Peugeot \",\"modelo\":\"3008\",\"a\\u00f1o\":\"2019\"}'),(7,7,'{\"cedula\":\"1785236204\",\"ciudad\":\"Quito - Ecuador\",\"edad\":\"54\",\"monto\":\"26\",\"vehiculo\":\"Jepp\",\"modelo\":\"Renegade\",\"a\\u00f1o\":\"2019\"}');

#
# Structure for table "md_callcenter_call_registry"
#

DROP TABLE IF EXISTS `md_callcenter_call_registry`;
CREATE TABLE `md_callcenter_call_registry` (
  `id_call_registry` int(11) NOT NULL AUTO_INCREMENT,
  `id_call` int(11) DEFAULT NULL,
  `dst` varchar(80) DEFAULT NULL,
  `calldate` datetime DEFAULT NULL,
  `uniqueid` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_call_registry`),
  KEY `id_call` (`id_call`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_call_registry"
#

INSERT INTO `md_callcenter_call_registry` VALUES (1,1,'104',NULL,'1561572345.42'),(2,5,'104',NULL,'1561572412.44'),(3,1,'104',NULL,'1561572473.46'),(4,3,'104',NULL,'1561577490.48'),(5,2,'104',NULL,'1561577645.49'),(6,1,'104',NULL,'1561577883.51'),(7,3,'104',NULL,'1561577898.52'),(8,3,'104',NULL,'1561577903.53'),(9,4,'104',NULL,'1561577913.54'),(10,4,'104',NULL,'1561577928.56'),(11,4,'104',NULL,'1561577945.58'),(12,3,'104',NULL,'1561577969.60'),(13,5,'104','2019-06-26 02:55:08','1561578905.62'),(14,5,'104','2019-06-26 14:56:31','1561578989.64'),(15,1,'104','2019-06-26 15:12:11','1561579927.66'),(16,2,'104','2019-06-26 15:14:40','1561580078.68'),(17,1,'104','2019-06-26 15:16:45','1561580202.69'),(18,5,'104','2019-06-26 16:12:29','1561583546.71'),(19,2,'104','2019-06-26 16:20:21','1561584018.73'),(20,3,'104','2019-06-26 16:20:50','1561584047.75'),(21,6,'104','2019-06-26 16:33:00','1561584776.77'),(22,7,'104','2019-06-26 16:34:43','1561584883.79'),(23,5,'104','2019-06-26 20:54:18','1561600455.0'),(24,1,'104','2019-06-26 21:18:29','1561601905.2'),(25,2,'104','2019-06-27 11:09:17',NULL),(26,2,'104','2019-06-27 11:10:03','1561651801.0'),(27,3,'104','2019-06-27 11:11:45','1561651902.1'),(28,6,'104','2019-06-27 16:24:05','1561670641.2'),(29,3,'104','2019-06-28 10:35:49','1561736146.0'),(30,2,'104','2019-06-28 10:36:12','1561736170.1'),(31,2,'104','2019-06-28 10:36:57','1561736215.2'),(32,2,'104','2019-06-28 10:37:41','1561736259.3'),(33,2,'103','2019-06-28 10:38:03','1561736281.4'),(34,2,'104','2019-06-28 10:43:07','1561736585.6'),(35,6,'104','2019-06-28 10:43:37','1561736614.7'),(36,2,'104','2019-06-28 10:45:03','1561736701.8'),(37,2,'104','2019-06-28 10:45:36','1561736733.9'),(38,2,'104','2019-06-28 10:47:02','1561736820.10'),(39,2,'104','2019-06-28 10:48:13','1561736891.11'),(40,2,'103','2019-06-28 10:48:43','1561736921.12'),(41,6,'104','2019-06-28 10:51:15','1561737072.14'),(42,6,'104','2019-06-28 10:52:27','1561737144.15'),(43,6,'104','2019-06-28 10:53:43','1561737221.16'),(44,2,'104','2019-06-28 10:54:55','1561737292.17'),(45,2,'104','2019-06-28 10:56:10','1561737367.18'),(46,2,'104','2019-06-28 11:11:19','1561738276.19'),(47,2,'104','2019-06-28 11:12:24','1561738342.20'),(48,2,'104','2019-06-28 11:14:27','1561738465.21'),(49,2,'104','2019-06-28 11:14:48','1561738486.22'),(50,4,'104','2019-06-28 11:16:48','1561738605.23'),(51,4,'104','2019-06-28 11:17:14','1561738632.24'),(52,2,'104','2019-06-28 11:17:52','1561738668.25'),(53,2,'104','2019-06-28 11:18:33','1561738710.26'),(54,2,'104','2019-06-28 11:22:11','1561738929.27'),(55,2,'104','2019-06-28 11:25:25','1561739123.28'),(56,6,'104','2019-06-28 11:27:59','1561739276.29'),(57,6,'104','2019-06-28 11:28:58','1561739334.30'),(58,3,'104','2019-06-28 11:29:23','1561739359.31'),(59,1,'104','2019-06-28 11:31:55','1561739512.32'),(60,6,'104','2019-06-28 11:34:18','1561739656.33'),(61,6,'104','2019-06-28 11:35:32','1561739730.34'),(62,6,'104','2019-06-28 11:36:52','1561739809.35'),(63,2,'103','2019-06-28 11:37:07','1561739824.36'),(64,2,'104','2019-06-28 11:40:19','1561740017.38'),(65,4,'104','2019-06-28 11:40:34','1561740032.39'),(66,1,'104','2019-06-28 11:41:37','1561740094.40'),(67,3,'104','2019-06-28 11:42:21','1561740139.41'),(68,4,'104','2019-06-28 11:42:30','1561740148.42'),(69,4,'104','2019-06-28 11:43:10','1561740188.43'),(70,5,'104','2019-06-28 11:43:21','1561740198.44'),(71,6,'104','2019-06-28 11:44:51','1561740286.45'),(72,1,'104','2019-06-28 11:46:43','1561740401.46'),(73,3,'103','2019-06-28 11:47:40','1561740458.47'),(74,1,'104','2019-06-28 11:49:26','1561740564.49'),(75,3,'103','2019-06-28 11:51:07','1561740664.50'),(76,2,'104','2019-06-28 11:51:52','1561740709.52'),(77,2,'104','2019-06-28 11:52:14','1561740731.53'),(78,1,'104','2019-06-28 11:53:09','1561740786.54'),(79,5,'104','2019-06-28 11:54:11','1561740849.55'),(80,3,'104','2019-06-28 11:54:50','1561740888.56'),(81,3,'103','2019-06-28 11:56:25','1561740982.57'),(82,1,'103','2019-06-28 11:57:13','1561741030.59'),(83,4,'104','2019-06-28 12:03:09','1561741387.61'),(84,4,'104','2019-06-28 12:08:46','1561741722.62'),(85,1,'104','2019-06-28 13:50:19','1561747816.63'),(86,1,'104','2019-06-28 13:51:03','1561747861.64'),(87,2,'104','2019-06-28 13:51:35','1561747892.65'),(88,1,'104','2019-06-28 14:15:48','1561749347.66'),(89,1,'104','2019-06-28 14:16:39','1561749394.67'),(90,2,'104','2019-06-28 14:19:22','1561749556.69'),(91,2,'104','2019-06-28 14:19:43','1561749580.71'),(92,2,'104','2019-06-28 14:19:57','1561749594.73'),(93,2,'104','2019-06-28 14:20:27','1561749624.75'),(94,1,'104','2019-06-28 14:21:49','1561749706.77'),(95,2,'104','2019-06-28 14:32:24','1561750341.79'),(96,2,'104','2019-06-28 14:33:42','1561750421.80'),(97,5,'104','2019-06-28 14:41:21','1561750876.81');

#
# Structure for table "md_callcenter_call_status"
#

DROP TABLE IF EXISTS `md_callcenter_call_status`;
CREATE TABLE `md_callcenter_call_status` (
  `id_call_status` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_call_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_call_status"
#

INSERT INTO `md_callcenter_call_status` VALUES (1,'sin llamar'),(2,'contactado'),(3,'no contesta'),(4,'llamar despues');

#
# Structure for table "md_callcenter_calls"
#

DROP TABLE IF EXISTS `md_callcenter_calls`;
CREATE TABLE `md_callcenter_calls` (
  `id_call` int(11) NOT NULL AUTO_INCREMENT,
  `id_campaign` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `phones` varchar(50) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `id_call_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_call`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_calls"
#

INSERT INTO `md_callcenter_calls` VALUES (1,1,2,'[\"0984904911\",\"104\",\"103\"]','Santiago Gutierrez',3),(2,1,2,'[\"0996566908\",\"103\",\"104\"]','Josselyn Oña',1),(3,1,2,'[\"0986574232\",\"104\",\"103\"]','Paola Gonzalez',2),(4,1,2,'[\"0978965423\",\"103\",\"104\"]','Sofia Gutierrez',3),(5,1,2,'[\"0985522336\",\"104\",\"103\"]','Ismael Gutierrez',2),(6,1,2,'[\"0969898565\",\"103\",\"104\"]','José Ibañez',2),(7,1,2,'[\"0982233114\",\"104\",\"103\"]','Daniel Pasmiño',2);

#
# Structure for table "md_callcenter_campaign_status"
#

DROP TABLE IF EXISTS `md_callcenter_campaign_status`;
CREATE TABLE `md_callcenter_campaign_status` (
  `id_campaign_status` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_campaign_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_campaign_status"
#

INSERT INTO `md_callcenter_campaign_status` VALUES (1,'activa'),(2,'inactiva');

#
# Structure for table "md_callcenter_campaigns"
#

DROP TABLE IF EXISTS `md_callcenter_campaigns`;
CREATE TABLE `md_callcenter_campaigns` (
  `id_campaign` int(11) NOT NULL AUTO_INCREMENT,
  `campaign` varchar(255) DEFAULT NULL,
  `id_form` int(11) DEFAULT NULL,
  `id_campaign_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_campaign`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_campaigns"
#

INSERT INTO `md_callcenter_campaigns` VALUES (1,'Cobranza',5,1);

#
# Structure for table "md_callcenter_form_data_recolected"
#

DROP TABLE IF EXISTS `md_callcenter_form_data_recolected`;
CREATE TABLE `md_callcenter_form_data_recolected` (
  `id_form_data_recolected` int(11) NOT NULL AUTO_INCREMENT,
  `id_call_registry` int(11) DEFAULT NULL,
  `id_form` int(11) DEFAULT NULL,
  `data` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id_form_data_recolected`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_form_data_recolected"
#

INSERT INTO `md_callcenter_form_data_recolected` VALUES (1,15,4,'[\"santiago\",\"gutierrez\"]'),(2,54,5,'[\"Santiago\",\"paga en efectivo\",\"Ecuatoriana\",\"Ecuatoriana\"]'),(3,60,5,'[\"\",\"buzon\",\"\",\"\"]'),(4,67,5,'[\"\",\"buzon\",\"\",\"\"]'),(5,78,5,'[\"santiago\",\"paga en efectivo\",\"jaja\",\"jaja\"]'),(6,81,5,'[\"santiago\",\"ya cancelo\",\"Ecuador\",\"Ecuador\"]'),(7,83,5,'{\"Nombres\":\"santiago\",\"Rsultado_llamada\":\"ya cancelo\",\"direcci\\u00f3n\":\"Solanda\",\"0\":\"Solanda\"}'),(8,84,5,'{\"Nombres\":\"sam\",\"Resultado_llamada\":\"buzon\",\"Direcci\\u00f3n\":\"sjjs\"}'),(9,87,5,'{\"Nombres\":\"sam\",\"Resultado_llamada\":\"buzon\",\"Direcci\\u00f3n\":\"jaja\"}'),(10,88,5,'{\"Nombres\":\"Santago\",\"Resultado_llamada\":\"ya cancelo\",\"Direcci\\u00f3n\":\"Ecuador\"}'),(11,89,5,'{\"Nombres\":\"Paola\",\"Resultado_llamada\":\"buzon\",\"Direcci\\u00f3n\":\"Soaknda\"}'),(12,97,5,'{\"Nombres\":\"santi\",\"Resultado_llamada\":\"buzon\",\"Direcci\\u00f3n\":\"No me acuerdo\"}');

#
# Structure for table "md_callcenter_form_fields"
#

DROP TABLE IF EXISTS `md_callcenter_form_fields`;
CREATE TABLE `md_callcenter_form_fields` (
  `id_form_field` int(11) NOT NULL AUTO_INCREMENT,
  `id_form` int(11) DEFAULT NULL,
  `label` varchar(100) DEFAULT NULL,
  `value` varchar(1000) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_form_field`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_form_fields"
#

INSERT INTO `md_callcenter_form_fields` VALUES (2,1,'lista','uno,dos,tres','1'),(4,3,'text','[\"\"]','0'),(5,3,'list','[\"uno\",\"dos\",\"tres\"]','1'),(6,3,'lista','[\"cuatro\",\"cinco\"]','1'),(7,4,'nombre','[\"\"]','0'),(8,4,'apellidos','[\"\"]','0'),(9,5,'Nombres','[\"\"]','0'),(10,5,'Resultado llamada','[\"buzon\",\"paga en efectivo\",\"ya cancelo\",\"inconfirme\",\"no contesta\"]','1'),(11,5,'Dirección','[\"\"]','0');

#
# Structure for table "md_callcenter_forms"
#

DROP TABLE IF EXISTS `md_callcenter_forms`;
CREATE TABLE `md_callcenter_forms` (
  `id_form` int(11) NOT NULL AUTO_INCREMENT,
  `form` varchar(255) DEFAULT NULL,
  `id_form_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_form`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_forms"
#

INSERT INTO `md_callcenter_forms` VALUES (1,'Prueba Creacion',1),(2,'preuba array value',1),(3,'preuba array value',1),(4,'Prueba',1),(5,'Gestión de cobranza',1);

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
  `nivel_up` int(11) DEFAULT '0',
  `id_permiso` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

#
# Data for table "md_menu"
#

INSERT INTO `md_menu` VALUES (1,'dashbard','ti-dashboard','',0,'{1,2,3,4}'),(2,'panel administrador',NULL,'dashboard',1,'{1,2}'),(4,'sistema','ti-layout-sidebar-left','',0,'{1}'),(8,'clientes','ti-id-badge','',0,'{}'),(9,'todos los clientes',NULL,'clientes',8,'{}'),(10,'usuarios','ti-user','',0,'{1}'),(11,'todos los usuarios',NULL,'usuarios',10,'{1}'),(12,'historias clinicas','ti-bookmark-alt','',0,''),(13,'todas las historias',NULL,'historiasclinicas',12,''),(14,'añadir nueva',NULL,'historiasclinicas/historia',12,''),(15,'workflows','ti-bolt','',0,'{}'),(16,'tareas',NULL,'workflows',15,'{}'),(17,'añadir nuevo',NULL,'clientes/cliente',8,'{}'),(18,'añadir nuevo',NULL,'usuarios/usuario',10,'{1}'),(19,'añadir nueva',NULL,'workflows/workflow',15,'{}'),(20,'tienda','ti-shopping-cart','',0,'{}'),(21,'todas las ventas',NULL,'tienda/ventas',20,'{}'),(22,'productos',NULL,'tienda/productos',20,'{}'),(23,'pagos',NULL,'tienda/pagos',20,'{}'),(24,'callcenter','ti-headphone-alt','',0,'{1,2}'),(25,'grupos',NULL,'usuarios/grupos',10,'{1}'),(26,'configuración',NULL,'',4,'{1}'),(27,'Gestionar',NULL,'callcenter/calls',24,'{1,2}'),(28,'campañas',NULL,'callcenter/campaigns',24,'{1}'),(29,'formularios',NULL,'callcenter/forms',24,'{1}');

#
# Structure for table "md_permisos"
#

DROP TABLE IF EXISTS `md_permisos`;
CREATE TABLE `md_permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "md_permisos"
#

INSERT INTO `md_permisos` VALUES (1,'Administrador'),(2,'Vendedor'),(3,'Director'),(4,'Autorizador'),(5,'Contador');

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
# Structure for table "md_shop_statuspagos"
#

DROP TABLE IF EXISTS `md_shop_statuspagos`;
CREATE TABLE `md_shop_statuspagos` (
  `id_statuspago` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_statuspago`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id_producto`),
  KEY `id_typeproducto` (`id_typeproducto`),
  CONSTRAINT `md_shop_productos_ibfk_1` FOREIGN KEY (`id_typeproducto`) REFERENCES `md_shop_typeproductos` (`id_typeproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_productos"
#

INSERT INTO `md_shop_productos` VALUES (1,'Plan Gold','Membresia total',1,350.00,12,365),(2,'Plan Platino','Menbresia de articulos',1,200.00,12,365);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_ventas"
#


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
  PRIMARY KEY (`id_venta_detalle`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `md_shop_ventas_detalle_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `md_shop_productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_ventas_detalle"
#


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
  `fec_ingreso` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cliente`,`dni`),
  KEY `id_genero` (`id_genero`),
  KEY `id_statuscivil` (`id_statuscivil`),
  KEY `id_lvlformacion` (`id_lvlformacion`),
  CONSTRAINT `md_clientes_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `md_genero` (`id_genero`),
  CONSTRAINT `md_clientes_ibfk_2` FOREIGN KEY (`id_statuscivil`) REFERENCES `md_statuscivil` (`id_statuscivil`),
  CONSTRAINT `md_clientes_ibfk_3` FOREIGN KEY (`id_lvlformacion`) REFERENCES `md_lvlformacion` (`id_lvlformacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "md_clientes"
#


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_user"
#

INSERT INTO `md_user` VALUES (1,'Santiago Gutierrez Gonzalez','1756666598',1,'U2wpZq1+FzTxJ2eaOZSI+XE7+4XQOq3kUqnVInjkmxeC71msZ00cUEF7ajVn5w/N3OOgmDs4uwoeB9x2OgZK9g==',1,'zam.2014.sg@gmail.com','0984904911','1997-11-07',3,2,'Pedro Ponce Carrasco Oe-06 y Av. Diego de almagro',NULL,1),(2,'Sofía Gutierrez','0000000001',2,'oSkWKOLAJQoLg71VCZa5ImVvOb8PmIMwS6pIp1v/MfdYrpUBieoin0bVxyFg4QssflBYgf28T2UDG8J3sEY2WQ==',2,'sofia@app.xudo.dev','0984904911','2019-06-12',3,1,'Ecuador',NULL,NULL);

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
  PRIMARY KEY (`id_pago`),
  KEY `id_user` (`id_user`),
  KEY `id_producto` (`id_producto`),
  KEY `id_statuspago` (`id_statuspago`),
  KEY `id_metodopago` (`id_metodopago`),
  CONSTRAINT `md_shop_pagos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `md_user` (`id_user`),
  CONSTRAINT `md_shop_pagos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `md_shop_productos` (`id_producto`),
  CONSTRAINT `md_shop_pagos_ibfk_3` FOREIGN KEY (`id_statuspago`) REFERENCES `md_shop_statuspagos` (`id_statuspago`),
  CONSTRAINT `md_shop_pagos_ibfk_4` FOREIGN KEY (`id_metodopago`) REFERENCES `md_shop_metodospagos` (`id_metodopago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "md_shop_pagos"
#


#
# Structure for table "md_grupos"
#

DROP TABLE IF EXISTS `md_grupos`;
CREATE TABLE `md_grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(255) DEFAULT NULL,
  `own_user_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `own_user_grupo` (`own_user_grupo`),
  CONSTRAINT `md_grupos_ibfk_1` FOREIGN KEY (`own_user_grupo`) REFERENCES `md_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "md_grupos"
#


#
# Structure for table "md_users_grupos"
#

DROP TABLE IF EXISTS `md_users_grupos`;
CREATE TABLE `md_users_grupos` (
  `id_grupo` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_user`),
  KEY `id_grupo` (`id_grupo`),
  CONSTRAINT `md_users_grupos_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `md_grupos` (`id_grupo`),
  CONSTRAINT `md_users_grupos_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `md_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "md_users_grupos"
#


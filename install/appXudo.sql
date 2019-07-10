# Host: 192.168.0.229  (Version 5.5.56-MariaDB)
# Date: 2019-07-10 16:44:01
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_call_attribute"
#

INSERT INTO `md_callcenter_call_attribute` VALUES (1,1,'{\"cedula\":\"1756666598\",\"ciudad\":\"Cali - Colombia\",\"edad\":\"21\",\"monto\":\"53\",\"vehiculo\":\"porsche\",\"modelo\":\"cayman\",\"a\\u00f1o\":\"2019\"}'),(2,2,'{\"cedula\":\"1756668542\",\"ciudad\":\"Quito - Ecuador\",\"edad\":\"20\",\"monto\":\"26\",\"vehiculo\":\"chevrolet\",\"modelo\":\"camaro\",\"a\\u00f1o\":\"2019\"}'),(3,3,'{\"cedula\":\"1759854632\",\"ciudad\":\"Guallaquil - Ecuador\",\"edad\":\"41\",\"monto\":\"26\",\"vehiculo\":\"Jaguar\",\"modelo\":\"F-Pace\",\"a\\u00f1o\":\"2017\"}'),(4,4,'{\"cedula\":\"1750125486\",\"ciudad\":\"Lima - Peru\",\"edad\":\"25\",\"monto\":\"26\",\"vehiculo\":\"Volkswagen\",\"modelo\":\"canddy\",\"a\\u00f1o\":\"2018\"}'),(5,5,'{\"cedula\":\"1796326571\",\"ciudad\":\"Bueno aires - Argentina\",\"edad\":\"31\",\"monto\":\"26\",\"vehiculo\":\"Lada\",\"modelo\":\"NIVA\",\"a\\u00f1o\":\"2019\"}'),(6,6,'{\"cedula\":\"1796552325\",\"ciudad\":\"Bogot\\u00e1 - Colombia\",\"edad\":\"53\",\"monto\":\"26\",\"vehiculo\":\"Peugeot \",\"modelo\":\"3008\",\"a\\u00f1o\":\"2019\"}'),(7,7,'{\"cedula\":\"1785236204\",\"ciudad\":\"Quito - Ecuador\",\"edad\":\"54\",\"monto\":\"26\",\"vehiculo\":\"Jepp\",\"modelo\":\"Renegade\",\"a\\u00f1o\":\"2019\"}'),(8,8,'{\"cedula\":\"1756666598\",\"ciudad\":\"Cali - Colombia\",\"edad\":\"21\",\"monto\":\"53\",\"vehiculo\":\"porsche\",\"modelo\":\"cayman\",\"a\\u00f1o\":\"2019\"}'),(9,9,'{\"cedula\":\"1756668542\",\"ciudad\":\"Quito - Ecuador\",\"edad\":\"20\",\"monto\":\"26\",\"vehiculo\":\"chevrolet\",\"modelo\":\"camaro\",\"a\\u00f1o\":\"2019\"}'),(10,10,'{\"cedula\":\"1759854632\",\"ciudad\":\"Guallaquil - Ecuador\",\"edad\":\"41\",\"monto\":\"26\",\"vehiculo\":\"Jaguar\",\"modelo\":\"F-Pace\",\"a\\u00f1o\":\"2017\"}'),(11,11,'{\"cedula\":\"1750125486\",\"ciudad\":\"Lima - Peru\",\"edad\":\"25\",\"monto\":\"26\",\"vehiculo\":\"Volkswagen\",\"modelo\":\"canddy\",\"a\\u00f1o\":\"2018\"}'),(12,12,'{\"cedula\":\"1796326571\",\"ciudad\":\"Bueno aires - Argentina\",\"edad\":\"31\",\"monto\":\"26\",\"vehiculo\":\"Lada\",\"modelo\":\"NIVA\",\"a\\u00f1o\":\"2019\"}'),(13,13,'{\"cedula\":\"1796552325\",\"ciudad\":\"Bogot\\u00e1 - Colombia\",\"edad\":\"53\",\"monto\":\"26\",\"vehiculo\":\"Peugeot \",\"modelo\":\"3008\",\"a\\u00f1o\":\"2019\"}'),(14,14,'{\"cedula\":\"1785236204\",\"ciudad\":\"Quito - Ecuador\",\"edad\":\"54\",\"monto\":\"26\",\"vehiculo\":\"Jepp\",\"modelo\":\"Renegade\",\"a\\u00f1o\":\"2019\"}'),(15,15,'{\"cedula\":\"1756666598\",\"ciudad\":\"Cali - Colombia\",\"edad\":\"21\",\"monto\":\"53\",\"vehiculo\":\"porsche\",\"modelo\":\"cayman\",\"año\":\"2019\"}'),(16,16,'{\"cedula\":\"1756668542\",\"ciudad\":\"Quito - Ecuador\",\"edad\":\"20\",\"monto\":\"26\",\"vehiculo\":\"chevrolet\",\"modelo\":\"camaro\",\"año\":\"2019\"}'),(17,17,'{\"cedula\":\"1759854632\",\"ciudad\":\"Guallaquil - Ecuador\",\"edad\":\"41\",\"monto\":\"26\",\"vehiculo\":\"Jaguar\",\"modelo\":\"F-Pace\",\"año\":\"2017\"}'),(18,18,'{\"cedula\":\"1750125486\",\"ciudad\":\"Lima - Peru\",\"edad\":\"25\",\"monto\":\"26\",\"vehiculo\":\"Volkswagen\",\"modelo\":\"canddy\",\"año\":\"2018\"}'),(19,19,'{\"cedula\":\"1796326571\",\"ciudad\":\"Bueno aires - Argentina\",\"edad\":\"31\",\"monto\":\"26\",\"vehiculo\":\"Lada\",\"modelo\":\"NIVA\",\"año\":\"2019\"}'),(20,20,'{\"cedula\":\"1796552325\",\"ciudad\":\"Bogotá - Colombia\",\"edad\":\"53\",\"monto\":\"26\",\"vehiculo\":\"Peugeot \",\"modelo\":\"3008\",\"año\":\"2019\"}'),(21,21,'{\"cedula\":\"1785236204\",\"ciudad\":\"Quito - Ecuador\",\"edad\":\"54\",\"monto\":\"26\",\"vehiculo\":\"Jepp\",\"modelo\":\"Renegade\",\"año\":\"2019\"}'),(22,22,'{\"cedula\":\"1756666598\",\"ciudad\":\"Cali - Colombia\",\"edad\":\"21\",\"monto\":\"53\",\"vehiculo\":\"porsche\",\"modelo\":\"cayman\",\"año\":\"2019\"}'),(23,23,'{\"cedula\":\"1756668542\",\"ciudad\":\"Quito - Ecuador\",\"edad\":\"20\",\"monto\":\"26\",\"vehiculo\":\"chevrolet\",\"modelo\":\"camaro\",\"año\":\"2019\"}'),(24,24,'{\"cedula\":\"1759854632\",\"ciudad\":\"Guallaquil - Ecuador\",\"edad\":\"41\",\"monto\":\"26\",\"vehiculo\":\"Jaguar\",\"modelo\":\"F-Pace\",\"año\":\"2017\"}'),(25,25,'{\"cedula\":\"1750125486\",\"ciudad\":\"Lima - Peru\",\"edad\":\"25\",\"monto\":\"26\",\"vehiculo\":\"Volkswagen\",\"modelo\":\"canddy\",\"año\":\"2018\"}'),(26,26,'{\"cedula\":\"1796326571\",\"ciudad\":\"Bueno aires - Argentina\",\"edad\":\"31\",\"monto\":\"26\",\"vehiculo\":\"Lada\",\"modelo\":\"NIVA\",\"año\":\"2019\"}'),(27,27,'{\"cedula\":\"1796552325\",\"ciudad\":\"Bogotá - Colombia\",\"edad\":\"53\",\"monto\":\"26\",\"vehiculo\":\"Peugeot \",\"modelo\":\"3008\",\"año\":\"2019\"}'),(28,28,'{\"cedula\":\"1785236204\",\"ciudad\":\"Quito - Ecuador\",\"edad\":\"54\",\"monto\":\"26\",\"vehiculo\":\"Jepp\",\"modelo\":\"Renegade\",\"año\":\"2019\"}');

#
# Structure for table "md_callcenter_call_registry"
#

DROP TABLE IF EXISTS `md_callcenter_call_registry`;
CREATE TABLE `md_callcenter_call_registry` (
  `id_call_registry` int(11) NOT NULL AUTO_INCREMENT,
  `id_call` int(11) DEFAULT NULL,
  `id_call_status` int(11) DEFAULT NULL,
  `dst` varchar(80) DEFAULT NULL,
  `calldate` datetime DEFAULT NULL,
  `uniqueid` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_call_registry`),
  KEY `id_call` (`id_call`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_call_registry"
#

INSERT INTO `md_callcenter_call_registry` VALUES (1,1,2,'104','2019-07-05 13:54:03','1562352843.6'),(2,6,3,'103','2019-07-05 13:54:12','1562352850.7'),(3,6,2,'103','2019-07-05 15:45:03','1562359500.0'),(4,4,2,'103','2019-07-05 16:56:32','1562363789.2'),(5,1,2,'0984904911','2019-07-05 16:57:05','1562363822.4'),(6,4,4,'103','2019-07-05 16:57:20','1562363837.5'),(7,6,2,'103','2019-07-05 16:58:28','1562363906.7'),(8,6,3,'103','2019-07-05 17:04:56','1562364293.9'),(9,6,4,'103','2019-07-05 17:06:15','1562364373.11'),(10,3,NULL,'104','2019-07-08 13:08:52','1562609328.0'),(11,2,NULL,'103','2019-07-08 13:10:00','1562609398.1'),(12,3,NULL,'104','2019-07-08 13:10:50','1562609447.3'),(13,3,NULL,'104','2019-07-08 13:11:55','1562609513.4'),(14,2,2,'103','2019-07-08 13:13:04','1562609582.5'),(15,3,3,'104','2019-07-08 14:25:05','1562613898.7'),(16,5,3,'104','2019-07-08 14:26:34','1562613992.9'),(17,2,2,'103','2019-07-08 14:27:10','1562614029.10'),(18,7,NULL,'104','2019-07-09 10:24:28','1562685865.0'),(19,3,NULL,'104','2019-07-09 10:27:57','1562686075.1'),(20,7,2,'103','2019-07-09 10:28:58','1562686136.2'),(21,3,2,'104','2019-07-09 10:29:20','1562686158.4'),(22,5,NULL,'104','2019-07-09 10:41:11','1562686869.5'),(23,5,NULL,'104','2019-07-09 10:44:45','1562687083.6'),(24,5,NULL,'104','2019-07-09 10:45:20','1562687117.7'),(25,5,NULL,'104','2019-07-09 10:46:00','1562687157.8'),(26,4,NULL,'103','2019-07-09 10:47:02','1562687219.9'),(27,4,NULL,'103','2019-07-09 10:47:27','1562687240.11'),(28,4,NULL,'103','2019-07-09 10:47:38','1562687256.13'),(29,5,NULL,'104','2019-07-09 10:53:11','1562687588.15'),(30,4,NULL,'103','2019-07-09 10:55:14','1562687711.16'),(31,5,NULL,'104','2019-07-09 10:56:22','1562687779.18'),(32,4,NULL,'104','2019-07-09 10:57:20','1562687837.19'),(33,4,NULL,'103','2019-07-09 10:58:29','1562687907.20'),(34,4,NULL,'104','2019-07-09 10:59:06','1562687942.22'),(35,5,NULL,'104','2019-07-09 11:00:08','1562688005.23'),(36,4,NULL,'103','2019-07-09 11:00:41','1562688039.24'),(37,4,NULL,'104','2019-07-09 11:01:29','1562688087.26'),(38,4,NULL,'103','2019-07-09 11:12:35','1562688752.27'),(39,5,NULL,'104','2019-07-09 11:16:51','1562689009.29'),(40,5,NULL,'104','2019-07-09 11:18:35','1562689112.30'),(41,5,2,'104','2019-07-09 11:19:36','1562689173.31'),(42,1,3,'104','2019-07-09 11:21:05','1562689263.32'),(43,6,NULL,'103','2019-07-09 11:21:36','1562689293.33'),(44,1,NULL,'104','2019-07-09 11:22:58','1562689376.35'),(45,1,NULL,'104','2019-07-09 11:24:31','1562689471.39'),(46,1,2,'104','2019-07-09 11:25:40','1562689540.40'),(47,4,NULL,'104','2019-07-09 11:27:04','1562689624.41'),(48,4,3,'103','2019-07-09 11:27:54','1562689674.42'),(49,6,3,'103','2019-07-09 11:30:57','1562689857.44'),(50,4,2,'104','2019-07-09 11:39:18','1562690354.46'),(51,10,3,'104','2019-07-09 12:25:08','1562693108.47'),(52,8,NULL,'104','2019-07-10 09:30:12','1562769010.0'),(53,9,NULL,'103','2019-07-10 09:30:47','1562769046.1'),(54,8,NULL,'104','2019-07-10 09:35:11','1562769308.3'),(55,9,3,'103','2019-07-10 10:19:29','1562771965.4'),(56,8,4,'104','2019-07-10 10:44:41','1562773476.6'),(57,11,4,'103','2019-07-10 11:02:03','1562774521.7'),(58,15,4,'104','2019-07-10 11:18:53','1562775530.9'),(59,21,2,'104','2019-07-10 11:19:23','1562775561.10'),(60,15,2,'0984904911','2019-07-10 11:31:49','1562776307.11'),(61,28,2,'104','2019-07-10 11:39:38','1562776776.12'),(62,27,3,'104','2019-07-10 13:12:56','1562782372.13');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_calls"
#

INSERT INTO `md_callcenter_calls` VALUES (1,1,2,'[\"0984904911\",\"104\",\"103\"]','Santiago Gutierrez',2),(2,1,2,'[\"0996566908\",\"103\",\"104\"]','Josselyn Oña',2),(3,1,2,'[\"0986574232\",\"104\",\"103\"]','Paola Gonzalez',2),(4,1,2,'[\"0978965423\",\"103\",\"104\"]','Sofia Gutierrez',2),(5,1,2,'[\"0985522336\",\"104\",\"103\"]','Ismael Gutierrez',2),(6,1,2,'[\"0969898565\",\"103\",\"104\"]','José Ibañez',3),(7,1,2,'[\"0982233114\",\"104\",\"103\"]','Daniel Pasmiño',2),(8,2,2,'[\"0984904911\",\"104\",\"103\"]','Santiago Gutierrez',4),(9,2,2,'[\"0996566908\",\"103\",\"104\"]','Josselyn Oña',3),(10,2,2,'[\"0986574232\",\"104\",\"103\"]','Paola Gonzalez',3),(11,2,2,'[\"0978965423\",\"103\",\"104\"]','Sofia Gutierrez',4),(12,2,2,'[\"0985522336\",\"104\",\"103\"]','Ismael Gutierrez',1),(13,2,2,'[\"0969898565\",\"103\",\"104\"]','José Ibañez',1),(14,2,2,'[\"0982233114\",\"104\",\"103\"]','Daniel Pasmiño',1),(15,3,5,'[\"0984904911\",\"104\",\"103\"]','Santiago Gutierrez',2),(16,3,5,'[\"0996566908\",\"103\",\"104\"]','Josselyn Oña',1),(17,3,5,'[\"0986574232\",\"104\",\"103\"]','Paola Gonzalez',1),(18,3,5,'[\"0978965423\",\"103\",\"104\"]','Sofia Gutierrez',1),(19,3,5,'[\"0985522336\",\"104\",\"103\"]','Ismael Gutierrez',1),(20,3,5,'[\"0969898565\",\"103\",\"104\"]','José Ibañez',1),(21,3,5,'[\"0982233114\",\"104\",\"103\"]','Daniel Pasmiño',2),(22,4,5,'[\"0984904911\",\"104\",\"103\"]','Santiago Gutierrez',1),(23,4,5,'[\"0996566908\",\"103\",\"104\"]','Josselyn Oña',1),(24,4,5,'[\"0986574232\",\"104\",\"103\"]','Paola Gonzalez',1),(25,4,5,'[\"0978965423\",\"103\",\"104\"]','Sofia Gutierrez',1),(26,4,5,'[\"0985522336\",\"104\",\"103\"]','Ismael Gutierrez',1),(27,4,5,'[\"0969898565\",\"103\",\"104\"]','José Ibañez',3),(28,4,5,'[\"0982233114\",\"104\",\"103\"]','Daniel Pasmiño',2);

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
  `id_script` int(11) DEFAULT NULL,
  `id_campaign_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_campaign`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_campaigns"
#

INSERT INTO `md_callcenter_campaigns` VALUES (1,'Gestión NOVA',1,1,2),(2,'Campaña con Guion',1,1,1),(3,'Campaña con formato correcto',1,1,1),(4,'All format',1,1,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_form_data_recolected"
#

INSERT INTO `md_callcenter_form_data_recolected` VALUES (1,1,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(2,2,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(3,3,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(4,4,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(5,7,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(6,8,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(7,9,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(8,14,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(9,15,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(10,16,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(11,17,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(12,42,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(13,48,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(14,50,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(15,56,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(16,57,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(17,58,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(18,59,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(20,60,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(24,61,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acci\\u00f3n\":\"no contesta\"}'),(25,62,1,'{\"Detalle_de_Gestion\":\"no desea \",\"Respuesta\":\"NOVA\",\"Acción\":\"no contesta\"}');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_form_fields"
#

INSERT INTO `md_callcenter_form_fields` VALUES (9,2,'Nombre','[\"pp\"]','1'),(10,2,'Apellido','[\"\"]','0'),(23,1,'Detalle de Gestion','[\"funciona\",\"pero muy bien\",\"No desea\"]','1'),(24,1,'Respuesta','[\"sisas\",\"NOVA\"]','1'),(25,1,'Acción','[\"NOVA\",\"NOVA\"]','1');

#
# Structure for table "md_callcenter_forms"
#

DROP TABLE IF EXISTS `md_callcenter_forms`;
CREATE TABLE `md_callcenter_forms` (
  `id_form` int(11) NOT NULL AUTO_INCREMENT,
  `form` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_form`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_forms"
#

INSERT INTO `md_callcenter_forms` VALUES (1,'Formulario NOVA'),(2,'Nuevo valor agregado');

#
# Structure for table "md_callcenter_schedule"
#

DROP TABLE IF EXISTS `md_callcenter_schedule`;
CREATE TABLE `md_callcenter_schedule` (
  `id_schedule` int(11) NOT NULL AUTO_INCREMENT,
  `id_call` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_schedule`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_schedule"
#

INSERT INTO `md_callcenter_schedule` VALUES (1,1,'2019-06-29 03:01:00'),(2,2,'2019-06-27 18:00:00');

#
# Structure for table "md_callcenter_scripts"
#

DROP TABLE IF EXISTS `md_callcenter_scripts`;
CREATE TABLE `md_callcenter_scripts` (
  `id_script` int(11) NOT NULL AUTO_INCREMENT,
  `script` varchar(255) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `contenido_script` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id_script`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter_scripts"
#

INSERT INTO `md_callcenter_scripts` VALUES (1,'Guion de ventas - NOVA','guion para Nova','<h2><font color=\"#ff0000\">Venta consultiva</font></h2><p><ul><li>—Buenas tardes, ¿se encuentra Ramón? (...)&nbsp;Espero que este sea un buen momento para hablar 5 minutos, ¿le parece? (...)&nbsp;Mi nombre es Matías y lo estoy&nbsp;llamando de&nbsp;Autos del Mundo. El motivo de mi llamada es en primer lugar agradecerle por haberse tomado el tiempo de contactarnos&nbsp;a través de nuestro sitio (...) Además&nbsp;entender mejor cómo puedo ayudarlo en la compra de su...&nbsp;</li></ul><ul><li><hr style=\"color: rgb(68, 68, 68); font-size: 15px;\"></li></ul><ul><li><strong>—¿Cuándo está pensando realizar la compra?¿Esta semana, este mes o todavía no lo sabe?</strong></li></ul><ul><li>Conocer&nbsp;el tiempo de compra es uno de los puntos más importantes para calificar la intención de compra del cliente&nbsp;(de hecho, hemos medido que los leads que dicen que comprarán esta semana tienen hasta 7 veces más chances de éxito que los otros leads).&nbsp;</li></ul><ul><li><strong>—¿Va a comprar financiado o contado? ¿Va a entregar su auto en forma de pago?&nbsp;</strong></li></ul><ul><li>Esta pregunta, además de ayudar al vendedor a poder hacer una propuesta concreta, sirve para calificar la intención de compra: si el cliente sabe cómo va a pagar, es probable que esté cerca de realizar la compra.</li></ul></p><p><ul><li><strong>—¿Qué versión le interesa? ¿En qué color lo estás buscando?&nbsp;</strong></li></ul><ul><li>Todas este tipo de preguntas están orientadas a entender mejor la necesidad del cliente, tener datos para poder crear una propuesta y generar una expectativa positiva en el cliente (del otro lado se oye a una persona confiable que entiende del producto que vende y sus detalles).</li><li></li></ul></p><p><hr></p><ul><li></li></ul><p style=\"margin-bottom: 5px;\">—Por favor, envíame esta información por email y luego charlamos.</p><p style=\"margin-bottom: 5px;\">—¡Excelente! Te estoy enviando esto por email en este momento para que lo analices. Me voy a agendar llamarte para definir cómo ayudarte lo mejor posible en tu compra.&nbsp;¿Mañana prefieres&nbsp;hablar a la mañana o a la tarde?</p>');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

#
# Data for table "md_menu"
#

INSERT INTO `md_menu` VALUES (1,'dashbard','ti-dashboard','',0,'{1,2,3,4}'),(2,'panel administrador',NULL,'dashboard',1,'{1,2}'),(4,'sistema','ti-layout-sidebar-left','',0,'{1}'),(8,'clientes','ti-id-badge','',0,'{}'),(9,'todos los clientes',NULL,'clientes',8,'{}'),(10,'usuarios','ti-user','',0,'{1}'),(11,'todos los usuarios',NULL,'usuarios',10,'{1}'),(12,'historias clinicas','ti-bookmark-alt','',0,''),(13,'todas las historias',NULL,'historiasclinicas',12,''),(14,'añadir nueva',NULL,'historiasclinicas/historia',12,''),(15,'workflows','ti-bolt','',0,'{}'),(16,'tareas',NULL,'workflows',15,'{}'),(17,'añadir nuevo',NULL,'clientes/cliente',8,'{}'),(18,'añadir nuevo',NULL,'usuarios/usuario',10,'{1}'),(19,'añadir nueva',NULL,'workflows/workflow',15,'{}'),(20,'tienda','ti-shopping-cart','',0,'{}'),(21,'todas las ventas',NULL,'tienda/ventas',20,'{}'),(22,'productos',NULL,'tienda/productos',20,'{}'),(23,'pagos',NULL,'tienda/pagos',20,'{}'),(24,'callcenter','ti-headphone-alt','',0,'{1,2}'),(25,'grupos',NULL,'usuarios/grupos',10,'{1}'),(26,'configuración',NULL,'',4,'{1}'),(27,'Gestionar',NULL,'callcenter/calls',24,'{1,2}'),(28,'campañas',NULL,'callcenter/campaigns',24,'{1}'),(29,'formularios',NULL,'callcenter/forms',24,'{1}'),(30,'guiones',NULL,'callcenter/scripts',24,'{1}');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "md_user"
#

INSERT INTO `md_user` VALUES (1,'Santiago Gutierrez Gonzalez','1756666598',1,'U2wpZq1+FzTxJ2eaOZSI+XE7+4XQOq3kUqnVInjkmxeC71msZ00cUEF7ajVn5w/N3OOgmDs4uwoeB9x2OgZK9g==',1,'zam.2014.sg@gmail.com','0984904911','1997-11-07',3,2,'Pedro Ponce Carrasco Oe-06 y Av. Diego de almagro',NULL,1),(2,'Sofia Gutierrez','0000000001',2,'0RANbs4kjG1sYnPFaUCx+rY2sCIXAFAtlmruHcrdRwhdhnK3P/3i/Lih6G8wJKpj/S2I+S+djwJlkrtOleyi4g==',2,'sofia@xudo.dev','023060215','2019-07-19',1,1,'Solanda',NULL,1),(5,'Josselyn Oña','0000000002',2,'QWZnzoKKBpiSpy+1aMMuSuuXyh93De/xt2wFlFI/HejN4NzP/uGtKLIoXtaYi7T3XDqjOgU/SoylnyqsE7PMDw==',2,'joss@xudo.dev','023000174','1998-10-09',2,2,'Ecuador',NULL,1);

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
  `id_user` int(11) DEFAULT NULL,
  `belong_user_grupo` varchar(1000) DEFAULT '[]',
  PRIMARY KEY (`id_grupo`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `md_grupos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `md_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "md_grupos"
#

INSERT INTO `md_grupos` VALUES (1,'Fast',85,'[\"73\",\"74\",\"75\"]'),(2,'Star',90,'[\"54\"]'),(3,'xudo - DEV',1,'[\"54\",\"73\",\"74\",\"75\"]');

#
# Structure for table "md_users_grupos"
#

DROP TABLE IF EXISTS `md_users_grupos`;
CREATE TABLE `md_users_grupos` (
  `id_grupo` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_user`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "md_users_grupos"
#


#
# View "registro_llamadas"
#

DROP VIEW IF EXISTS `registro_llamadas`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `registro_llamadas`
  AS
  SELECT
    `a`.`id_call_registry`,
    `d`.`id_campaign`,
    `d`.`campaign`,
    `b`.`nombres` AS 'nombres cliente',
    `a`.`calldate` AS 'hora llamada',
    `z`.`dst` AS 'número llamado',
    `b`.`phones`,
    `z`.`billsec` AS 'duración',
    `e`.`estado`,
    `z`.`disposition` AS 'resultado',
    `z`.`src` AS 'extensión',
    `f`.`nombres` AS 'Agente',
    `z`.`uniqueid` AS 'cdr_uniqueid',
    `z`.`recordingfile` AS 'cdr_recordingfile',
    `c`.`data` AS 'data formulario'
  FROM
    ((((((`md_callcenter_call_registry` a
      LEFT JOIN `md_callcenter_calls` b ON ((`a`.`id_call` = `b`.`id_call`)))
      LEFT JOIN `md_callcenter_form_data_recolected` c ON ((`a`.`id_call_registry` = `c`.`id_call_registry`)))
      LEFT JOIN `md_callcenter_campaigns` d ON ((`b`.`id_campaign` = `d`.`id_campaign`)))
      LEFT JOIN `md_callcenter_call_status` e ON ((`a`.`id_call_status` = `e`.`id_call_status`)))
      LEFT JOIN `md_user` f ON ((`b`.`id_user` = `f`.`id_user`)))
      LEFT JOIN `asteriskcdrdb`.`cdr` z ON ((`a`.`uniqueid` = CONVERT(`z`.`uniqueid` USING utf8))))
  ORDER BY `a`.`id_call_registry`;

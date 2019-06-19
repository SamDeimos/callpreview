# Host: 192.168.0.194  (Version 5.5.52-MariaDB)
# Date: 2019-03-19 09:47:12
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "md_callcenter"
#

DROP TABLE IF EXISTS `md_callcenter`;
CREATE TABLE `md_callcenter` (
  `id_callcenter` int(11) NOT NULL AUTO_INCREMENT,
  `nom_call` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_callcenter`),
  UNIQUE KEY `md_callcenter_id_callcenter_uindex` (`id_callcenter`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_callcenter"
#

INSERT INTO `md_callcenter` VALUES (1,'Fast'),(2,'Star');

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
# Structure for table "md_permisos"
#

DROP TABLE IF EXISTS `md_permisos`;
CREATE TABLE `md_permisos` (
  `id_permisos` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(15) DEFAULT NULL,
  `lvl_permiso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_permisos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "md_permisos"
#

INSERT INTO `md_permisos` VALUES (1,'Administrador',9),(2,'Agente',2),(3,'Director',4),(4,'Autorizador',6),(5,'Contador',7);

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
# Structure for table "md_cliente"
#

DROP TABLE IF EXISTS `md_cliente`;
CREATE TABLE `md_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) DEFAULT NULL,
  `dni` varchar(255) NOT NULL DEFAULT '',
  `id_genero` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `fac_nac` date DEFAULT NULL,
  `id_statuscivil` int(11) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `fac_ingreso` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cliente`,`dni`),
  KEY `id_genero` (`id_genero`),
  KEY `id_statuscivil` (`id_statuscivil`),
  CONSTRAINT `md_cliente_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `md_genero` (`id_genero`),
  CONSTRAINT `md_cliente_ibfk_2` FOREIGN KEY (`id_statuscivil`) REFERENCES `md_statuscivil` (`id_statuscivil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_cliente"
#

INSERT INTO `md_cliente` VALUES (1,'Pedro Alejandro Ordoñez Díaz','1714161600',1,'peod74@grupoeconomundo.com','0984433355',NULL,2,'Lumbisi','2019-03-15 23:33:13'),(2,'Vanessa Villamarin','1766523644',2,'v.villamarin@grupoeconomundo.com','6512326455',NULL,1,'Guamani','2019-03-15 23:33:13');

#
# Structure for table "md_statusdami"
#

DROP TABLE IF EXISTS `md_statusdami`;
CREATE TABLE `md_statusdami` (
  `id_statusdami` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_statusdami`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "md_statusdami"
#

INSERT INTO `md_statusdami` VALUES (1,'Borrador'),(2,'Contactado'),(3,'Auditado'),(4,'Autorizado');

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
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `dni` varchar(11) NOT NULL DEFAULT '',
  `id_genero` int(11) DEFAULT NULL,
  `pass` varchar(500) DEFAULT NULL,
  `id_permisos` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `id_statuscivil` int(11) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `num_agent` int(11) DEFAULT NULL,
  `id_callcenter` int(11) DEFAULT NULL,
  `meta` int(11) DEFAULT NULL,
  `fec_ingreso` datetime DEFAULT NULL,
  `id_statususer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`dni`),
  KEY `id_permisos` (`id_permisos`),
  KEY `id_statuscivil` (`id_statuscivil`),
  KEY `id_callcenter` (`id_callcenter`),
  KEY `id_genero` (`id_genero`),
  KEY `id_statususer` (`id_statususer`),
  CONSTRAINT `md_user_ibfk_1` FOREIGN KEY (`id_permisos`) REFERENCES `md_permisos` (`id_permisos`),
  CONSTRAINT `md_user_ibfk_2` FOREIGN KEY (`id_statuscivil`) REFERENCES `md_statuscivil` (`id_statuscivil`),
  CONSTRAINT `md_user_ibfk_4` FOREIGN KEY (`id_callcenter`) REFERENCES `md_callcenter` (`id_callcenter`),
  CONSTRAINT `md_user_ibfk_5` FOREIGN KEY (`id_genero`) REFERENCES `md_genero` (`id_genero`),
  CONSTRAINT `md_user_ibfk_6` FOREIGN KEY (`id_statususer`) REFERENCES `md_statususer` (`id_statususer`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

#
# Data for table "md_user"
#

INSERT INTO `md_user` VALUES (1,'Santiago','Gutierrez Gonzalez','1756666598',1,'YwTo01G1ddUjBxCzuuVTK2HPtNvMTiO3T3Ht1udRK5r+G09uBL+lyXRciMajTGA4Ib7mXeC3F44aik6PjfclkQ==',1,'zam.2014.sg@gmail.com','0984904911',2,'Pedro Ponce Carrasco Oe-06 y Av. Diego de almagro',NULL,1,NULL,NULL,1),(2,'Ismael','Gutierrez Oña','1759192808',1,'202cb962ac59075b964b07152d234b70',2,NULL,NULL,2,NULL,NULL,2,NULL,NULL,1),(46,'Jazmin Katherine','Parraga','951478532',2,'d41d8cd98f00b204e9800998ecf8427e',2,NULL,NULL,4,NULL,NULL,2,NULL,NULL,1),(48,'Grace Carolina','Calderon','123587456',2,'d41d8cd98f00b204e9800998ecf8427e',2,NULL,NULL,1,NULL,NULL,2,NULL,NULL,1),(50,'German','Dioquilima','4562148532',1,'d41d8cd98f00b204e9800998ecf8427e',2,NULL,NULL,2,NULL,NULL,1,NULL,NULL,1),(51,'Yohanna Paola','Calderon','1546578455',2,'202cb962ac59075b964b07152d234b70',1,'asesoriacomercial@grupoeconomundo.com',NULL,2,NULL,NULL,2,NULL,NULL,1),(53,'Leslie Melissa','Alvarez','7852156321',2,'202cb962ac59075b964b07152d234b70',4,'L.alvarez@grupoeconomundo.com',NULL,3,'Quito - Ecuador',4000,1,NULL,NULL,1),(54,'Carolina','Gutierrez','4512151462',2,'202cb962ac59075b964b07152d234b70',2,'lizeth.c@gmail.com',NULL,4,NULL,1108,2,NULL,NULL,1),(57,'Leonidas','Calderon','7854123698',1,'202cb962ac59075b964b07152d234b70',2,'lcalderon@grupoeconomundo.com',NULL,2,NULL,1135,1,3200,'2019-03-07 23:33:13',1),(73,'William Ricardo','Gutierrez Trujillo','1894561235',1,'202cb962ac59075b964b07152d234b70',2,'w.ricardo@xudo.store','35223322',2,'Cali - Colombia',1522,2,3200,'2019-03-16 04:44:14',1),(74,'Pepito','Zambrano','1745623211',1,'c51ce410c124a10e0db5e4b97fc2af39',2,'p.zambrano@grupoeconomundo.com','322222222',1,'No se y no quiero saber',1222,1,3200,'2019-03-16 04:57:34',1),(75,'Katerin','Oña Peralta','1234567895',2,'202cb962ac59075b964b07152d234b70',2,'k.ona@grupoeconomundo.com','325412511',1,'Ecuatoriana',1225,1,3200,'2019-03-16 05:29:37',2),(77,'Doris Estrella','Pozo','879654121',2,'3RwUdwKyoCNaCbWy6Gwdv3kntBImwbdjvs6wyHBslWYI4N9QPPnsoe7cTD0aZJ9jfySBrbtRWxb3sLUT7au0wg==',2,'e.abril@grupoeconomundo.com','023944900',2,'Carolina',1596,1,3200,'2019-03-17 06:53:28',1),(78,'Josselyn Estefania','Oña Chamorro','1727324715',2,'L/dmG4HhUox1Goj68fcNOyeJTs2RjXLvi9pG8mVUrvpW9NGTdgXLpftduIh91wcEcOn3j6KkNC4IJ24QAINu0g==',2,'j.ona@grupoeconomundo.com','0000025156',2,'Ecuaotriana',1256,1,2300,'2019-03-17 10:30:38',1);

#
# Structure for table "md_dami"
#

DROP TABLE IF EXISTS `md_dami`;
CREATE TABLE `md_dami` (
  `id_dami` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fec_create` datetime DEFAULT NULL,
  `id_statusdami` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dami`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_statusdami` (`id_statusdami`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `md_dami_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `md_user` (`id_user`),
  CONSTRAINT `md_dami_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `md_cliente` (`id_cliente`),
  CONSTRAINT `md_dami_ibfk_2` FOREIGN KEY (`id_statusdami`) REFERENCES `md_statusdami` (`id_statusdami`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "md_dami"
#

INSERT INTO `md_dami` VALUES (1,54,1,'2019-03-15 15:10:13',1),(2,54,1,'2019-03-15 16:10:13',4);

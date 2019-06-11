**configuración para crear workflow**
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

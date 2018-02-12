-- las tablas llevan el prefijo rt para indicar que son de la aplicación de Restaurante

DROP TABLE IF EXISTS `rt_platos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rt_platos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modifica` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `rt_ingredientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rt_ingredientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modifica` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `rt_alergenos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rt_alergenos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modifica` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- tablas relacionales
DROP TABLE IF EXISTS `rt_ingredientes_plato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rt_ingredientes_plato` (
  `id_plato` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  KEY `id_plato` (`id_plato`),
  KEY `id_ingrediente` (`id_ingrediente`),
  CONSTRAINT `rt_ingredplato_ibfk_1` FOREIGN KEY (`id_plato`) REFERENCES `rt_platos` (`id`),
  CONSTRAINT `rt_ingredplato_ibfk_2` FOREIGN KEY (`id_ingrediente`) REFERENCES `rt_ingredientes` (`id`)
) ENGINE=InnoDB CHARSET=utf8;

DROP TABLE IF EXISTS `rt_alergenos_ingrediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rt_alergenos_ingrediente` (
  `id_ingrediente` int(11) NOT NULL,
  `id_alergeno` int(11) NOT NULL,
  KEY `id_ingrediente` (`id_ingrediente`),
  KEY `id_alergeno` (`id_alergeno`),
  CONSTRAINT `rt_alergeno_ingred_ibfk_1` FOREIGN KEY (`id_ingrediente`) REFERENCES `rt_ingredientes` (`id`),
  CONSTRAINT `rt_alergeno_ingred_ibfk_2` FOREIGN KEY (`id_alergeno`) REFERENCES `rt_alergenos` (`id`)
) ENGINE=InnoDB CHARSET=utf8;

-- datos de ejemplo
insert into rt_platos(descripcion) values ('Pan');
insert into rt_ingredientes(descripcion) values ('Harina'),('Sal'),('Levadura'),('Agua');
insert into rt_ingredientes_plato(id_plato,id_ingrediente) values (1,2),(1,3),(1,4),(1,5);
insert into rt_alergenos(descripcion) values('Gluten');
insert into rt_alergenos_ingrediente(id_ingrediente, id_alergeno) values(2,3);




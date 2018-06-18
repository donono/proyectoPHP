/*
SQLyog - Free MySQL GUI v5.11
Host - 5.7.21 : Database - proyectophp
*********************************************************************
Server version : 5.7.21
*/

SET NAMES utf8;

SET SQL_MODE='';

create database if not exists `proyectophp`;

USE `proyectophp`;

/*Table structure for table `comuna` */

DROP TABLE IF EXISTS `comuna`;

CREATE TABLE `comuna` (
  `id_comuna` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_comuna`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `comuna` */

insert into `comuna` (`id_comuna`,`nombre`) values (1,'Alhué');
insert into `comuna` (`id_comuna`,`nombre`) values (2,'Buin');
insert into `comuna` (`id_comuna`,`nombre`) values (3,'Calera de Tango');
insert into `comuna` (`id_comuna`,`nombre`) values (4,'Cerrillos');
insert into `comuna` (`id_comuna`,`nombre`) values (5,'Cerro Navia');
insert into `comuna` (`id_comuna`,`nombre`) values (6,'Colina');
insert into `comuna` (`id_comuna`,`nombre`) values (7,'Conchalí');
insert into `comuna` (`id_comuna`,`nombre`) values (8,'Curacaví');
insert into `comuna` (`id_comuna`,`nombre`) values (9,'El Bosque');
insert into `comuna` (`id_comuna`,`nombre`) values (10,'El Monte');
insert into `comuna` (`id_comuna`,`nombre`) values (11,'Estación Central');
insert into `comuna` (`id_comuna`,`nombre`) values (12,'Huechuraba');
insert into `comuna` (`id_comuna`,`nombre`) values (13,'Independencia');
insert into `comuna` (`id_comuna`,`nombre`) values (14,'Isla de Maipo');
insert into `comuna` (`id_comuna`,`nombre`) values (15,'La Cisterna');
insert into `comuna` (`id_comuna`,`nombre`) values (16,'La Florida');
insert into `comuna` (`id_comuna`,`nombre`) values (17,'La Granja');
insert into `comuna` (`id_comuna`,`nombre`) values (18,'La Pintana');
insert into `comuna` (`id_comuna`,`nombre`) values (19,'La Reina');
insert into `comuna` (`id_comuna`,`nombre`) values (20,'Lampa');
insert into `comuna` (`id_comuna`,`nombre`) values (21,'Las Condes');
insert into `comuna` (`id_comuna`,`nombre`) values (22,'Lo Barnechea');
insert into `comuna` (`id_comuna`,`nombre`) values (23,'Lo Espejo');
insert into `comuna` (`id_comuna`,`nombre`) values (24,'Lo Prado');
insert into `comuna` (`id_comuna`,`nombre`) values (25,'Macul');
insert into `comuna` (`id_comuna`,`nombre`) values (26,'Maipú');
insert into `comuna` (`id_comuna`,`nombre`) values (27,'María Pinto');
insert into `comuna` (`id_comuna`,`nombre`) values (28,'Melipilla');
insert into `comuna` (`id_comuna`,`nombre`) values (29,'Ñuñoa');
insert into `comuna` (`id_comuna`,`nombre`) values (30,'Paine');
insert into `comuna` (`id_comuna`,`nombre`) values (31,'Pedro Aguirre Cerda');
insert into `comuna` (`id_comuna`,`nombre`) values (32,'Peñaflor');
insert into `comuna` (`id_comuna`,`nombre`) values (33,'Peñalolén');
insert into `comuna` (`id_comuna`,`nombre`) values (34,'Pirque');
insert into `comuna` (`id_comuna`,`nombre`) values (35,'Providencia');
insert into `comuna` (`id_comuna`,`nombre`) values (36,'Pudahuel');
insert into `comuna` (`id_comuna`,`nombre`) values (37,'Puente Alto');
insert into `comuna` (`id_comuna`,`nombre`) values (38,'Quilicura');
insert into `comuna` (`id_comuna`,`nombre`) values (39,'Quinta Normal');
insert into `comuna` (`id_comuna`,`nombre`) values (40,'Recoleta');
insert into `comuna` (`id_comuna`,`nombre`) values (41,'Renca');
insert into `comuna` (`id_comuna`,`nombre`) values (42,'San Bernardo');
insert into `comuna` (`id_comuna`,`nombre`) values (43,'San Joaquín');
insert into `comuna` (`id_comuna`,`nombre`) values (44,'San José de Maipo');
insert into `comuna` (`id_comuna`,`nombre`) values (45,'San Miguel');
insert into `comuna` (`id_comuna`,`nombre`) values (46,'San Pedro');
insert into `comuna` (`id_comuna`,`nombre`) values (47,'San Ramón');
insert into `comuna` (`id_comuna`,`nombre`) values (48,'Santiago');
insert into `comuna` (`id_comuna`,`nombre`) values (49,'Talagante');
insert into `comuna` (`id_comuna`,`nombre`) values (50,'Til Til');
insert into `comuna` (`id_comuna`,`nombre`) values (51,'Vitacura');
insert into `comuna` (`id_comuna`,`nombre`) values (52,'Padre Hurtado');

/*Table structure for table `educacion` */

DROP TABLE IF EXISTS `educacion`;

CREATE TABLE `educacion` (
  `id_educacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_educacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `educacion` */

insert into `educacion` (`id_educacion`,`nombre`) values (1,'No posee');
insert into `educacion` (`id_educacion`,`nombre`) values (2,'Básica');
insert into `educacion` (`id_educacion`,`nombre`) values (3,'Media');
insert into `educacion` (`id_educacion`,`nombre`) values (4,'Técnico');
insert into `educacion` (`id_educacion`,`nombre`) values (5,'Profesional');

/*Table structure for table `estado_civil` */

DROP TABLE IF EXISTS `estado_civil`;

CREATE TABLE `estado_civil` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `estado_civil` */

insert into `estado_civil` (`id_estado`,`nombre`) values (1,'Soltero');
insert into `estado_civil` (`id_estado`,`nombre`) values (2,'Casado');
insert into `estado_civil` (`id_estado`,`nombre`) values (3,'Viudo');
insert into `estado_civil` (`id_estado`,`nombre`) values (4,'Divorciado');

/*Table structure for table `postulante` */

DROP TABLE IF EXISTS `postulante`;

CREATE TABLE `postulante` (
  `rut` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ap_paterno` varchar(25) NOT NULL,
  `ap_materno` varchar(25) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `hijos` int(11) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `enfermedad` tinyint(1) DEFAULT NULL,
  `sueldo` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_renta` int(11) DEFAULT NULL,
  `id_educacion` int(11) DEFAULT NULL,
  `id_comuna` int(11) DEFAULT NULL,
  PRIMARY KEY (`rut`),
  KEY `FK_educacion` (`id_educacion`),
  KEY `FK_comuna` (`id_comuna`),
  KEY `FK_estado` (`id_estado`),
  KEY `FK_renta` (`id_renta`),
  CONSTRAINT `postulante_ibfk_2` FOREIGN KEY (`id_educacion`) REFERENCES `educacion` (`id_educacion`) ON DELETE SET NULL,
  CONSTRAINT `postulante_ibfk_3` FOREIGN KEY (`id_comuna`) REFERENCES `comuna` (`id_comuna`) ON DELETE SET NULL,
  CONSTRAINT `postulante_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado_civil` (`id_estado`) ON DELETE SET NULL,
  CONSTRAINT `postulante_ibfk_5` FOREIGN KEY (`id_renta`) REFERENCES `renta` (`id_renta`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `postulante` */

insert into `postulante` (`rut`,`nombre`,`ap_paterno`,`ap_materno`,`fecha_nacimiento`,`sexo`,`hijos`,`telefono`,`email`,`direccion`,`enfermedad`,`sueldo`,`id_estado`,`id_renta`,`id_educacion`,`id_comuna`) values ('1','USUARIO','BETA','TESTER','1992-12-12','F',2,'88545872','daniel@gmail.com','Lo Blanco 2123',0,642000,1,3,4,15);
insert into `postulante` (`rut`,`nombre`,`ap_paterno`,`ap_materno`,`fecha_nacimiento`,`sexo`,`hijos`,`telefono`,`email`,`direccion`,`enfermedad`,`sueldo`,`id_estado`,`id_renta`,`id_educacion`,`id_comuna`) values ('104542165','Maria del Pilar','Sanhueza','Rodelindo','1980-03-04','F',1,'68783212','mdpsr@persona.com','San Jorge 441',0,570000,1,1,3,52);
insert into `postulante` (`rut`,`nombre`,`ap_paterno`,`ap_materno`,`fecha_nacimiento`,`sexo`,`hijos`,`telefono`,`email`,`direccion`,`enfermedad`,`sueldo`,`id_estado`,`id_renta`,`id_educacion`,`id_comuna`) values ('105445202','Raul','Meza','Quinchavi','1976-01-28','M',1,'54200216','librealbedrio@r2d2.com','Av. Salvador 111',0,1115200,3,3,5,25);
insert into `postulante` (`rut`,`nombre`,`ap_paterno`,`ap_materno`,`fecha_nacimiento`,`sexo`,`hijos`,`telefono`,`email`,`direccion`,`enfermedad`,`sueldo`,`id_estado`,`id_renta`,`id_educacion`,`id_comuna`) values ('187654825','Fernanda','Mellado','Rojas','1995-03-21','F',0,'88545872','fer.mellado21@gmail.com','Lo Blanco 2123',0,642000,2,2,4,15);
insert into `postulante` (`rut`,`nombre`,`ap_paterno`,`ap_materno`,`fecha_nacimiento`,`sexo`,`hijos`,`telefono`,`email`,`direccion`,`enfermedad`,`sueldo`,`id_estado`,`id_renta`,`id_educacion`,`id_comuna`) values ('90701248','Roxana','Iturra','Valdez','1992-12-12','F',1,'75646832','roxyturra@gmail.com','Goicolea 982',1,2121540,1,2,2,2);

/*Table structure for table `renta` */

DROP TABLE IF EXISTS `renta`;

CREATE TABLE `renta` (
  `id_renta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`id_renta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `renta` */

insert into `renta` (`id_renta`,`nombre`) values (1,'Fija');
insert into `renta` (`id_renta`,`nombre`) values (2,'Variable');
insert into `renta` (`id_renta`,`nombre`) values (3,'Boleta de Honorarios');

/*Table structure for table `solicitud` */

DROP TABLE IF EXISTS `solicitud`;

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(15) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha_creacion` date NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `FK_postulante` (`rut`),
  CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`rut`) REFERENCES `postulante` (`rut`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `solicitud` */

insert into `solicitud` (`id_solicitud`,`rut`,`estado`,`fecha_creacion`) values (1,'104542165','1','2018-06-14');
insert into `solicitud` (`id_solicitud`,`rut`,`estado`,`fecha_creacion`) values (2,'187654825','2','2018-06-13');
insert into `solicitud` (`id_solicitud`,`rut`,`estado`,`fecha_creacion`) values (3,'105445202','1','2018-06-14');
insert into `solicitud` (`id_solicitud`,`rut`,`estado`,`fecha_creacion`) values (11,'90701248','3','2018-06-12');
insert into `solicitud` (`id_solicitud`,`rut`,`estado`,`fecha_creacion`) values (15,'1','2','2018-06-12');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `rut` varchar(15) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ap_paterno` varchar(25) NOT NULL,
  `ap_materno` varchar(25) NOT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert into `usuario` (`rut`,`contrasena`,`nombre`,`ap_paterno`,`ap_materno`) values ('1','1','usuario','de','prueba');
insert into `usuario` (`rut`,`contrasena`,`nombre`,`ap_paterno`,`ap_materno`) values ('104542165','clave123','Mariano','Fuentealba','Guerrero');
insert into `usuario` (`rut`,`contrasena`,`nombre`,`ap_paterno`,`ap_materno`) values ('105445202','blackclover','Ignis','Pereira','Quintanilla');
insert into `usuario` (`rut`,`contrasena`,`nombre`,`ap_paterno`,`ap_materno`) values ('187654825','password','Danilo','Garces','Da Silva');
insert into `usuario` (`rut`,`contrasena`,`nombre`,`ap_paterno`,`ap_materno`) values ('192445043','admin','admin','-','-');
insert into `usuario` (`rut`,`contrasena`,`nombre`,`ap_paterno`,`ap_materno`) values ('208503601','12345678','Roberto','Flores','Moya');
insert into `usuario` (`rut`,`contrasena`,`nombre`,`ap_paterno`,`ap_materno`) values ('90701248','84años','Jorge','Guzman','Calderon');

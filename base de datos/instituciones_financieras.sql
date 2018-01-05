/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 100116
Source Host           : localhost:3306
Source Database       : instituciones_financieras

Target Server Type    : MYSQL
Target Server Version : 100116
File Encoding         : 65001

Date: 2018-01-05 01:31:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activo
-- ----------------------------
DROP TABLE IF EXISTS `activo`;
CREATE TABLE `activo` (
  `id_activo` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `encargado_id_encargado` int(11) NOT NULL,
  `correlativo` varchar(45) DEFAULT NULL,
  `fecha_adquisicion` date DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_activo`),
  KEY `fk_activo_tipo_activo1_idx` (`id_tipo`),
  KEY `fk_activo_departamento1_idx` (`id_departamento`),
  KEY `fk_activo_institucion1_idx` (`id_institucion`),
  KEY `fk_activo_encargado1_idx` (`encargado_id_encargado`),
  KEY `fk_activo_estado1_idx` (`id_estado`),
  KEY `fk_activo_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_activo_departamento1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_encargado1` FOREIGN KEY (`encargado_id_encargado`) REFERENCES `encargado` (`id_encargado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_estado1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_institucion1` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_tipo_activo1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_activo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of activo
-- ----------------------------

-- ----------------------------
-- Table structure for balance_general
-- ----------------------------
DROP TABLE IF EXISTS `balance_general`;
CREATE TABLE `balance_general` (
  `id_balance` int(11) NOT NULL,
  `id_persona_juridica` int(11) NOT NULL,
  `periodo` int(11) DEFAULT NULL,
  `prestable` tinyint(1) DEFAULT NULL,
  `efectivo` float DEFAULT NULL,
  `valor_negociable` float DEFAULT NULL,
  `cuentas_por_cobrar` float DEFAULT NULL,
  `inventarios` float DEFAULT NULL,
  `terrenos` float DEFAULT NULL,
  `edificio_equipo` float DEFAULT NULL,
  `depreciacion_acumulada` float DEFAULT NULL,
  `total_activo_corriente` float DEFAULT NULL,
  `total_activo_pasivo` float DEFAULT NULL,
  `total_activo` float DEFAULT NULL,
  `cuentas_por_pagar` float DEFAULT NULL,
  `documentos_por_pagar` float DEFAULT NULL,
  `total_pasivo_corriente` float DEFAULT NULL,
  `deuda_largo_plazo` float DEFAULT NULL,
  `acciones_comunes` float DEFAULT NULL,
  `ganancias_retenidas` float DEFAULT NULL,
  `total_pasivo` float DEFAULT NULL,
  PRIMARY KEY (`id_balance`),
  KEY `fk_balance_general_persona_juridica1_idx` (`id_persona_juridica`),
  CONSTRAINT `fk_balance_general_persona_juridica1` FOREIGN KEY (`id_persona_juridica`) REFERENCES `persona_juridica` (`id_persona_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of balance_general
-- ----------------------------

-- ----------------------------
-- Table structure for bien_hipotecario
-- ----------------------------
DROP TABLE IF EXISTS `bien_hipotecario`;
CREATE TABLE `bien_hipotecario` (
  `id_bien` int(11) NOT NULL,
  `id_persona_natural` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `otros_datos` varchar(45) DEFAULT NULL,
  `anexo` longblob,
  PRIMARY KEY (`id_bien`),
  KEY `fk_bien_hipotecario_persona_natural1_idx` (`id_persona_natural`),
  CONSTRAINT `fk_bien_hipotecario_persona_natural1` FOREIGN KEY (`id_persona_natural`) REFERENCES `persona_natural` (`id_persona_natural`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bien_hipotecario
-- ----------------------------

-- ----------------------------
-- Table structure for clasificacion
-- ----------------------------
DROP TABLE IF EXISTS `clasificacion`;
CREATE TABLE `clasificacion` (
  `id_clasificacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL,
  `tiempo_depreciacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_clasificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clasificacion
-- ----------------------------

-- ----------------------------
-- Table structure for departamento
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of departamento
-- ----------------------------

-- ----------------------------
-- Table structure for encargado
-- ----------------------------
DROP TABLE IF EXISTS `encargado`;
CREATE TABLE `encargado` (
  `id_encargado` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `dui` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_encargado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of encargado
-- ----------------------------

-- ----------------------------
-- Table structure for estado
-- ----------------------------
DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tiempo_de_uso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of estado
-- ----------------------------

-- ----------------------------
-- Table structure for estado_resultado
-- ----------------------------
DROP TABLE IF EXISTS `estado_resultado`;
CREATE TABLE `estado_resultado` (
  `id_estado` int(11) NOT NULL,
  `id_persona_juridica` int(11) NOT NULL,
  `periodo` int(11) DEFAULT NULL,
  `prestable` tinyint(1) DEFAULT NULL,
  `ingreso_ventas` float DEFAULT NULL,
  `costo_venta` float DEFAULT NULL,
  `utilidad_bruta` float DEFAULT NULL,
  `gastos_operativos` float DEFAULT NULL,
  `gasto_venta` float DEFAULT NULL,
  `gasto_administrativo` float DEFAULT NULL,
  `gasto_arrendamiento` float DEFAULT NULL,
  `gasto_depreciacion` float DEFAULT NULL,
  `total_gasto_operativo` float DEFAULT NULL,
  `utlidad_operativa` float DEFAULT NULL,
  `gasto_interes` float DEFAULT NULL,
  `utilidad_antes_impuestos` float DEFAULT NULL,
  `impuestos` float DEFAULT NULL,
  `utilidad_neta` float DEFAULT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `fk_estado_resultado_persona_juridica1_idx` (`id_persona_juridica`),
  CONSTRAINT `fk_estado_resultado_persona_juridica1` FOREIGN KEY (`id_persona_juridica`) REFERENCES `persona_juridica` (`id_persona_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of estado_resultado
-- ----------------------------

-- ----------------------------
-- Table structure for expediente_juridico
-- ----------------------------
DROP TABLE IF EXISTS `expediente_juridico`;
CREATE TABLE `expediente_juridico` (
  `id_prestamo` int(11) NOT NULL,
  `id_persona_juridica` int(11) NOT NULL,
  KEY `fk_prestamo_has_persona_juridica_persona_juridica1_idx` (`id_persona_juridica`),
  KEY `fk_prestamo_has_persona_juridica_prestamo1_idx` (`id_prestamo`),
  CONSTRAINT `fk_prestamo_has_persona_juridica_persona_juridica1` FOREIGN KEY (`id_persona_juridica`) REFERENCES `persona_juridica` (`id_persona_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_has_persona_juridica_prestamo1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of expediente_juridico
-- ----------------------------

-- ----------------------------
-- Table structure for expediente_natural
-- ----------------------------
DROP TABLE IF EXISTS `expediente_natural`;
CREATE TABLE `expediente_natural` (
  `persona_natural` int(11) NOT NULL,
  `id_prestamo` int(11) NOT NULL,
  KEY `fk_persona_natural_has_prestamo_prestamo1_idx` (`id_prestamo`),
  KEY `fk_persona_natural_has_prestamo_persona_natural1_idx` (`persona_natural`),
  CONSTRAINT `fk_persona_natural_has_prestamo_persona_natural1` FOREIGN KEY (`persona_natural`) REFERENCES `persona_natural` (`id_persona_natural`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_natural_has_prestamo_prestamo1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of expediente_natural
-- ----------------------------
INSERT INTO `expediente_natural` VALUES ('2', '6');

-- ----------------------------
-- Table structure for fiador
-- ----------------------------
DROP TABLE IF EXISTS `fiador`;
CREATE TABLE `fiador` (
  `id_fiador` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona_natural` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `direccion` varchar(254) DEFAULT NULL,
  `dui` varchar(15) DEFAULT NULL,
  `nit` varchar(15) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `lugar_trabajo` text,
  `telefono` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_fiador`),
  KEY `fk_codeudor_persona_natural1_idx` (`id_persona_natural`),
  CONSTRAINT `fk_codeudor_persona_natural1` FOREIGN KEY (`id_persona_natural`) REFERENCES `persona_natural` (`id_persona_natural`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fiador
-- ----------------------------
INSERT INTO `fiador` VALUES ('5', '2', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa@asfd.com', 'aaaaaaaaa@asd.com', 'aaaaaaaaa');
INSERT INTO `fiador` VALUES ('6', '2', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa@asfd.com', 'aaaaaaaaa@asd.com', 'aaaaaaaaa');
INSERT INTO `fiador` VALUES ('7', '2', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa@asfd.com', 'aaaaaaaaa@asd.com', 'aaaaaaaaa');

-- ----------------------------
-- Table structure for institucion
-- ----------------------------
DROP TABLE IF EXISTS `institucion`;
CREATE TABLE `institucion` (
  `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of institucion
-- ----------------------------

-- ----------------------------
-- Table structure for pago
-- ----------------------------
DROP TABLE IF EXISTS `pago`;
CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_prestamo` int(11) NOT NULL,
  `monto` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `mora` float DEFAULT NULL,
  `interes` float DEFAULT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `fk_pago_prestamo1_idx` (`id_prestamo`),
  CONSTRAINT `fk_pago_prestamo1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pago
-- ----------------------------

-- ----------------------------
-- Table structure for persona_juridica
-- ----------------------------
DROP TABLE IF EXISTS `persona_juridica`;
CREATE TABLE `persona_juridica` (
  `id_persona_juridica` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_persona_juridica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persona_juridica
-- ----------------------------

-- ----------------------------
-- Table structure for persona_natural
-- ----------------------------
DROP TABLE IF EXISTS `persona_natural`;
CREATE TABLE `persona_natural` (
  `id_persona_natural` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `dui` varchar(15) DEFAULT NULL,
  `nit` varchar(15) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `monto` float DEFAULT NULL,
  PRIMARY KEY (`id_persona_natural`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persona_natural
-- ----------------------------
INSERT INTO `persona_natural` VALUES ('1', 'roamc', 'aofmcom', 'oamclamf', 'aedfcmladmc', 'oamcoa', null, null, null, 'oadmco', null);
INSERT INTO `persona_natural` VALUES ('2', 'pasib', 'ndisn', 'skns', 'nssin', 'snin', null, null, null, 'snnin', null);

-- ----------------------------
-- Table structure for plan_pago
-- ----------------------------
DROP TABLE IF EXISTS `plan_pago`;
CREATE TABLE `plan_pago` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_credito` int(11) NOT NULL,
  `tasa` float DEFAULT NULL,
  `periodo_minimo` int(11) DEFAULT NULL,
  `periodo_maximo` float DEFAULT NULL,
  `monto_minimo` float DEFAULT NULL,
  `monto_maximo` float DEFAULT NULL,
  PRIMARY KEY (`id_plan`),
  KEY `fk_plan_pago_tipo_credito1_idx` (`id_tipo_credito`),
  CONSTRAINT `fk_plan_pago_tipo_credito1` FOREIGN KEY (`id_tipo_credito`) REFERENCES `tipo_credito` (`id_tipo_credito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of plan_pago
-- ----------------------------
INSERT INTO `plan_pago` VALUES ('1', '0', '13', null, null, null, '20000');

-- ----------------------------
-- Table structure for prestamo
-- ----------------------------
DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `id_plan` int(11) NOT NULL,
  `id_asesor` int(11) NOT NULL,
  `prestamo_original` float DEFAULT NULL,
  `saldo_actual` float DEFAULT NULL,
  `mora_acumulada` float DEFAULT NULL,
  `intereses_acumulados` float DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `proximo_pago` date DEFAULT NULL,
  PRIMARY KEY (`id_prestamo`),
  KEY `fk_prestamo_plan_pago1_idx` (`id_plan`),
  KEY `fk_prestamo_asesor_credito1_idx` (`id_asesor`),
  CONSTRAINT `fk_prestamo_asesor_credito1` FOREIGN KEY (`id_asesor`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_plan_pago1` FOREIGN KEY (`id_plan`) REFERENCES `plan_pago` (`id_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prestamo
-- ----------------------------
INSERT INTO `prestamo` VALUES ('6', '1', '1', '4500', '4500', '0', '0', '1', '36', '2017-12-04', '2018-02-05');

-- ----------------------------
-- Table structure for referencias
-- ----------------------------
DROP TABLE IF EXISTS `referencias`;
CREATE TABLE `referencias` (
  `id_referencias` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona_natural` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_referencias`),
  KEY `fk_referencias_persona_natural1_idx` (`id_persona_natural`),
  CONSTRAINT `fk_referencias_persona_natural1` FOREIGN KEY (`id_persona_natural`) REFERENCES `persona_natural` (`id_persona_natural`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of referencias
-- ----------------------------
INSERT INTO `referencias` VALUES ('7', '2', 'a', 'aaaaaaaa', 'aaaaaaaaaa');

-- ----------------------------
-- Table structure for tipo_activo
-- ----------------------------
DROP TABLE IF EXISTS `tipo_activo`;
CREATE TABLE `tipo_activo` (
  `id_tipo` int(11) NOT NULL,
  `id_clasificacion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`),
  KEY `fk_tipo_activo_clasificacion1_idx` (`id_clasificacion`),
  CONSTRAINT `fk_tipo_activo_clasificacion1` FOREIGN KEY (`id_clasificacion`) REFERENCES `clasificacion` (`id_clasificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_activo
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_credito
-- ----------------------------
DROP TABLE IF EXISTS `tipo_credito`;
CREATE TABLE `tipo_credito` (
  `id_tipo_credito` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `terminis_condiciones` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_credito`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_credito
-- ----------------------------
INSERT INTO `tipo_credito` VALUES ('0', 'personal', 'no');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `zona` varchar(30) DEFAULT NULL,
  `dui` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `nivel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'roma', 'vvilla', 'no', 'alla', 'kasnc', '1');
SET FOREIGN_KEY_CHECKS=1;

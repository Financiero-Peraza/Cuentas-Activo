SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `instituciones_financieras` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `instituciones_financieras` ;

-- -----------------------------------------------------
-- Table `instituciones_financieras`.`persona_natural`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`persona_natural` (
  `id_persona_natural` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(30) NULL ,
  `apellido` VARCHAR(30) NULL ,
  `direccion` VARCHAR(100) NULL ,
  `dui` VARCHAR(15) NULL ,
  `nit` VARCHAR(15) NULL ,
  `correo` VARCHAR(30) NULL ,
  `categoria` VARCHAR(20) NULL ,
  `observaciones` VARCHAR(300) NULL ,
  `telefono` VARCHAR(12) NULL ,
  `monto` FLOAT NULL ,
  PRIMARY KEY (`id_persona_natural`) )
ENGINE = InnoDB;

INSERT INTO `persona_natural` (`id_persona_natural`, `nombre`, `apellido`, `direccion`, `dui`, `nit`, `correo`, `categoria`, `observaciones`, `telefono`, `monto`) VALUES
(1, 'BORIS', 'RICARDO', 'san vicente, verapaz', '45454', 'ADF3453453', NULL, NULL, NULL, '52342', 0);


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`referencias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`referencias` (
  `id_referencias` INT NOT NULL AUTO_INCREMENT ,
  `id_persona_natural` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `apellido` VARCHAR(45) NULL ,
  `telefono` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_referencias`) ,
  INDEX `fk_referencias_persona_natural1_idx` (`id_persona_natural` ASC) ,
  CONSTRAINT `fk_referencias_persona_natural1`
    FOREIGN KEY (`id_persona_natural` )
    REFERENCES `instituciones_financieras`.`persona_natural` (`id_persona_natural` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`fiador`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`fiador` (
  `id_fiador` INT NOT NULL AUTO_INCREMENT ,
  `id_persona_natural` INT NOT NULL ,
  `nombre` VARCHAR(30) NULL ,
  `apellido` VARCHAR(30) NULL ,
  `direccion` VARCHAR(254) NULL ,
  `dui` VARCHAR(15) NULL ,
  `nit` VARCHAR(15) NULL ,
  `correo` VARCHAR(30) NULL ,
  `lugar_trabajo` TEXT NULL ,
  `telefono` VARCHAR(12) NULL ,
  PRIMARY KEY (`id_fiador`) ,
  INDEX `fk_codeudor_persona_natural1_idx` (`id_persona_natural` ASC) ,
  CONSTRAINT `fk_codeudor_persona_natural1`
    FOREIGN KEY (`id_persona_natural` )
    REFERENCES `instituciones_financieras`.`persona_natural` (`id_persona_natural` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`bien_hipotecario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`bien_hipotecario` (
  `id_bien` INT NOT NULL AUTO_INCREMENT ,
  `id_persona_natural` INT NOT NULL ,
  `descripcion` VARCHAR(200) NULL ,
  `ubicacion` VARCHAR(45) NULL ,
  `otros_datos` VARCHAR(45) NULL ,
  `anexo` LONGBLOB NULL ,
  PRIMARY KEY (`id_bien`) ,
  INDEX `fk_bien_hipotecario_persona_natural1_idx` (`id_persona_natural` ASC) ,
  CONSTRAINT `fk_bien_hipotecario_persona_natural1`
    FOREIGN KEY (`id_persona_natural` )
    REFERENCES `instituciones_financieras`.`persona_natural` (`id_persona_natural` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`persona_juridica`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`persona_juridica` (
  `id_persona_juridica` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `categoria` VARCHAR(45) NULL ,
  `numero` VARCHAR(45) NULL ,
  `dui` VARCHAR(45) NULL ,
  `nit` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_persona_juridica`) )
ENGINE = InnoDB;

INSERT INTO `persona_juridica` (`id_persona_juridica`, `nombre`, `categoria`, `numero`, `dui`, `nit`) VALUES
(1, 'coca cola', NULL, '4444333', '12312312-2', '3231-231231-231-2'),
(2, 'Mazda', NULL, '4444333', '12312312-2', '3231-231231-231-2'),
(3, 'Susuky', NULL, '34234323', '34242342-3', '2342-342342-342-3'),
(4, 'Fifa', NULL, '34234323', '34242342-3', '2342-342342-342-3'),
(5, 'Espn', NULL, '34234323', '34242342-3', '2342-342342-342-3'),
(6, 'Campero', NULL, '34234323', '34242342-3', '2342-342342-342-3');


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`balance_general`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`balance_general` (
  `id_balance` INT NOT NULL AUTO_INCREMENT ,
  `id_persona_juridica` INT NOT NULL ,
  `periodo` INT NULL ,
  `prestable` TINYINT(1) NULL ,
  `efectivo` FLOAT NULL ,
  `valor_negociable` FLOAT NULL ,
  `cuentas_por_cobrar` FLOAT NULL ,
  `inventarios` FLOAT NULL ,
  `terrenos` FLOAT NULL ,
  `edificio_equipo` FLOAT NULL ,
  `depreciacion_acumulada` FLOAT NULL ,
  `total_activo_corriente` FLOAT NULL ,
  `total_activo_pasivo` FLOAT NULL ,
  `total_activo` FLOAT NULL ,
  `cuentas_por_pagar` FLOAT NULL ,
  `documentos_por_pagar` FLOAT NULL ,
  `total_pasivo_corriente` FLOAT NULL ,
  `deuda_largo_plazo` FLOAT NULL ,
  `acciones_comunes` FLOAT NULL ,
  `ganancias_retenidas` FLOAT NULL ,
  `total_pasivo` FLOAT NULL ,
  PRIMARY KEY (`id_balance`) ,
  INDEX `fk_balance_general_persona_juridica1_idx` (`id_persona_juridica` ASC) ,
  CONSTRAINT `fk_balance_general_persona_juridica1`
    FOREIGN KEY (`id_persona_juridica` )
    REFERENCES `instituciones_financieras`.`persona_juridica` (`id_persona_juridica` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `balance_general` (`id_balance`, `id_persona_juridica`, `periodo`, `prestable`, `efectivo`, `valor_negociable`, `cuentas_por_cobrar`, `inventarios`, `terrenos`, `edificio_equipo`, `depreciacion_acumulada`, `total_activo_corriente`, `total_activo_pasivo`, `total_activo`, `cuentas_por_pagar`, `documentos_por_pagar`, `total_pasivo_corriente`, `deuda_largo_plazo`, `acciones_comunes`, `ganancias_retenidas`, `total_pasivo`) VALUES
(5, 5, 2017, NULL, 500, 1000, 25000, 45500, 26000, 90000, 38000, 72000, 78000, 150000, 22000, 47000, 69000, 22950, 31500, 26550, 150000),
(7, 5, 2016, NULL, 423422000, 2423420, 234234, 34234, 34234, 34234200, 342342000, 423423, 234234, 423423, 4234, 34234, 3423, 423423, 3242340, 34234, 234234);

-- -----------------------------------------------------
-- Table `instituciones_financieras`.`estado_resultado`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`estado_resultado` (
  `id_estado` INT NOT NULL AUTO_INCREMENT ,
  `id_persona_juridica` INT NOT NULL ,
  `periodo` INT NULL ,
  `prestable` TINYINT(1) NULL ,
  `ingreso_ventas` FLOAT NULL ,
  `costo_venta` FLOAT NULL ,
  `utilidad_bruta` FLOAT NULL ,
  `gastos_operativos` FLOAT NULL ,
  `gasto_venta` FLOAT NULL ,
  `gasto_administrativo` FLOAT NULL ,
  `gasto_arrendamiento` FLOAT NULL ,
  `gasto_depreciacion` FLOAT NULL ,
  `total_gasto_operativo` FLOAT NULL ,
  `utlidad_operativa` FLOAT NULL ,
  `gasto_interes` FLOAT NULL ,
  `utilidad_antes_impuestos` FLOAT NULL ,
  `impuestos` FLOAT NULL ,
  `utilidad_neta` FLOAT NULL ,
  PRIMARY KEY (`id_estado`) ,
  INDEX `fk_estado_resultado_persona_juridica1_idx` (`id_persona_juridica` ASC) ,
  CONSTRAINT `fk_estado_resultado_persona_juridica1`
    FOREIGN KEY (`id_persona_juridica` )
    REFERENCES `instituciones_financieras`.`persona_juridica` (`id_persona_juridica` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `estado_resultado` (`id_estado`, `id_persona_juridica`, `periodo`, `prestable`, `ingreso_ventas`, `costo_venta`, `utilidad_bruta`, `gastos_operativos`, `gasto_venta`, `gasto_administrativo`, `gasto_arrendamiento`, `gasto_depreciacion`, `total_gasto_operativo`, `utlidad_operativa`, `gasto_interes`, `utilidad_antes_impuestos`, `impuestos`, `utilidad_neta`) VALUES
(5, 5, 2017, NULL, 160000, 106000, 54000, NULL, 16000, 10000, 1000, 10000, 37000, 17000, 6100, 10900, 4360, 6540),
(7, 5, 2016, NULL, 324234000, 34234, 42342, 423432, 23423, 3423420, 423423, 34234, 34234, 42342, 2342340, 342342, 87987, 8798780);

-- -----------------------------------------------------
-- Table `instituciones_financieras`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(30) NULL ,
  `apellido` VARCHAR(30) NULL ,
  `zona` VARCHAR(30) NULL ,
  `dui` VARCHAR(45) NULL ,
  `pass` VARCHAR(45) NULL ,
  `nivel` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB;

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `zona`, `dui`, `pass`, `nivel`) VALUES
(1, 'asesor1', 'Martinez Perez', 'Paracentral', '12345678-9', '1111', '1'),
(2, 'asesor2', 'Mejia Navarrete', 'Oriente', '98765432-1', '2222', '1'),
(3, 'admin01', 'admin01', 'NINGUNA', '22323232-2', 'admin01', '2');


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`prestamo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`prestamo` (
  `id_prestamo` INT NOT NULL AUTO_INCREMENT ,
  `id_asesor` INT NOT NULL ,
  `prestamo_original` FLOAT NULL ,
  `saldo_actual` FLOAT NULL ,
  `mora_acumulada` FLOAT NULL ,
  `intereses_acumulados` FLOAT NULL ,
  `estado` VARCHAR(20) NULL ,
  `proximo_pago` DATE NULL ,
  `fecha` DATE NULL ,
  `tiempo` VARCHAR(45) NULL ,
  `tasa_interes` FLOAT NULL ,
  `tasa_moratoria` FLOAT NULL ,
  `tipo_credito` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_prestamo`) ,
  INDEX `fk_prestamo_asesor_credito1_idx` (`id_asesor` ASC) ,
  CONSTRAINT `fk_prestamo_asesor_credito1`
    FOREIGN KEY (`id_asesor` )
    REFERENCES `instituciones_financieras`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`pago`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`pago` (
  `id_pago` INT NOT NULL AUTO_INCREMENT ,
  `id_prestamo` INT NOT NULL ,
  `monto` FLOAT NULL ,
  `fecha` DATE NULL ,
  `mora` FLOAT NULL ,
  `interes` FLOAT NULL ,
  PRIMARY KEY (`id_pago`) ,
  INDEX `fk_pago_prestamo1_idx` (`id_prestamo` ASC) ,
  CONSTRAINT `fk_pago_prestamo1`
    FOREIGN KEY (`id_prestamo` )
    REFERENCES `instituciones_financieras`.`prestamo` (`id_prestamo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`expediente_natural`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`expediente_natural` (
  `persona_natural` INT NOT NULL ,
  `id_prestamo` INT NOT NULL ,
  INDEX `fk_persona_natural_has_prestamo_prestamo1_idx` (`id_prestamo` ASC) ,
  INDEX `fk_persona_natural_has_prestamo_persona_natural1_idx` (`persona_natural` ASC) ,
  CONSTRAINT `fk_persona_natural_has_prestamo_persona_natural1`
    FOREIGN KEY (`persona_natural` )
    REFERENCES `instituciones_financieras`.`persona_natural` (`id_persona_natural` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_natural_has_prestamo_prestamo1`
    FOREIGN KEY (`id_prestamo` )
    REFERENCES `instituciones_financieras`.`prestamo` (`id_prestamo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`expediente_juridico`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`expediente_juridico` (
  `id_prestamo` INT NOT NULL ,
  `id_persona_juridica` INT NOT NULL ,
  INDEX `fk_prestamo_has_persona_juridica_persona_juridica1_idx` (`id_persona_juridica` ASC) ,
  INDEX `fk_prestamo_has_persona_juridica_prestamo1_idx` (`id_prestamo` ASC) ,
  CONSTRAINT `fk_prestamo_has_persona_juridica_prestamo1`
    FOREIGN KEY (`id_prestamo` )
    REFERENCES `instituciones_financieras`.`prestamo` (`id_prestamo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_has_persona_juridica_persona_juridica1`
    FOREIGN KEY (`id_persona_juridica` )
    REFERENCES `instituciones_financieras`.`persona_juridica` (`id_persona_juridica` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`clasificacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`clasificacion` (
  `id_clasificacion` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `correlativo` VARCHAR(45) NULL ,
  `tiempo_depreciacion` INT NULL ,
  PRIMARY KEY (`id_clasificacion`) )
ENGINE = InnoDB;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`id_clasificacion`, `nombre`, `correlativo`, `tiempo_depreciacion`) VALUES
(1, 'Moviliario y Equipo', '001', 24),
(2, 'Vehiculos', '002', 48),
(3, 'Maquinaria', '003', 60),
(4, 'Edificio', '004', 240),
(5, 'Terrenos', '005', 0);



-- -----------------------------------------------------
-- Table `instituciones_financieras`.`institucion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`institucion` (
  `id_institucion` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `correlativo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_institucion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`departamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`departamento` (
  `id_departamento` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `correlativo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_departamento`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`tipo_activo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`tipo_activo` (
  `id_tipo` INT NOT NULL AUTO_INCREMENT ,
  `id_clasificacion` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `correlativo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_tipo`) ,
  INDEX `fk_tipo_activo_clasificacion1_idx` (`id_clasificacion` ASC) ,
  CONSTRAINT `fk_tipo_activo_clasificacion1`
    FOREIGN KEY (`id_clasificacion` )
    REFERENCES `instituciones_financieras`.`clasificacion` (`id_clasificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `instituciones_financieras`.`encargado`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`encargado` (
  `id_encargado` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `apellido` VARCHAR(45) NULL ,
  `dui` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_encargado`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `instituciones_financieras`.`activo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `instituciones_financieras`.`activo` (
  `id_activo` INT NOT NULL AUTO_INCREMENT ,
  `id_tipo` INT NOT NULL ,
  `id_departamento` INT NOT NULL ,
  `id_institucion` INT NOT NULL ,
  `id_usuario` INT NOT NULL ,
  `encargado_id_encargado` INT NOT NULL ,
  `correlativo` VARCHAR(45) NULL ,
  `fecha_adquisicion` DATE NULL ,
  `descripcion` VARCHAR(200) NULL ,
  `estado` VARCHAR(45) NULL ,
  `tiempo_uso` INT NULL ,
  `observaciones` VARCHAR(200) NULL ,
  PRIMARY KEY (`id_activo`) ,
  INDEX `fk_activo_tipo_activo1_idx` (`id_tipo` ASC) ,
  INDEX `fk_activo_departamento1_idx` (`id_departamento` ASC) ,
  INDEX `fk_activo_institucion1_idx` (`id_institucion` ASC) ,
  INDEX `fk_activo_encargado1_idx` (`encargado_id_encargado` ASC) ,
  INDEX `fk_activo_usuario1_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_activo_tipo_activo1`
    FOREIGN KEY (`id_tipo` )
    REFERENCES `instituciones_financieras`.`tipo_activo` (`id_tipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_departamento1`
    FOREIGN KEY (`id_departamento` )
    REFERENCES `instituciones_financieras`.`departamento` (`id_departamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_institucion1`
    FOREIGN KEY (`id_institucion` )
    REFERENCES `instituciones_financieras`.`institucion` (`id_institucion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_encargado1`
    FOREIGN KEY (`encargado_id_encargado` )
    REFERENCES `instituciones_financieras`.`encargado` (`id_encargado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_activo_usuario1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `instituciones_financieras`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `instituciones_financieras` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

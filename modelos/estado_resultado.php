<?php


class estado_resultado {
private $id_estado;
private $id_persona_juridica;
private $periodo;
private $prestable;
private $ingreso_venta;
private $costo_venta;
private $utilidad_bruta;
private $gasto_operativo;
private $gasto_venta;
private $gasto_administrativo;

function __construct() {
    
}
function getId_estado() {
    return $this->id_estado;
}

function getId_persona_juridica() {
    return $this->id_persona_juridica;
}

function getPeriodo() {
    return $this->periodo;
}

function getPrestable() {
    return $this->prestable;
}

function getIngreso_venta() {
    return $this->ingreso_venta;
}

function getCosto_venta() {
    return $this->costo_venta;
}

function getUtilidad_bruta() {
    return $this->utilidad_bruta;
}

function getGasto_operativo() {
    return $this->gasto_operativo;
}

function getGasto_venta() {
    return $this->gasto_venta;
}

function getGasto_administrativo() {
    return $this->gasto_administrativo;
}

function setId_estado($id_estado) {
    $this->id_estado = $id_estado;
}

function setId_persona_juridica($id_persona_juridica) {
    $this->id_persona_juridica = $id_persona_juridica;
}

function setPeriodo($periodo) {
    $this->periodo = $periodo;
}

function setPrestable($prestable) {
    $this->prestable = $prestable;
}

function setIngreso_venta($ingreso_venta) {
    $this->ingreso_venta = $ingreso_venta;
}

function setCosto_venta($costo_venta) {
    $this->costo_venta = $costo_venta;
}

function setUtilidad_bruta($utilidad_bruta) {
    $this->utilidad_bruta = $utilidad_bruta;
}

function setGasto_operativo($gasto_operativo) {
    $this->gasto_operativo = $gasto_operativo;
}

function setGasto_venta($gasto_venta) {
    $this->gasto_venta = $gasto_venta;
}

function setGasto_administrativo($gasto_administrativo) {
    $this->gasto_administrativo = $gasto_administrativo;
}



}
?>
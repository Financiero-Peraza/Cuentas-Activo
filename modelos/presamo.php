<?php
class presamo {
private $id_prestamo;
private $id_plan;
private $id_pago;
private $id_asesor;
private $prestamo_original;
private $saldo_actual;
private $mora_acumulada;
private $intereses_acumulados;
private $estado;

function __construct() {
    
}
function getId_prestamo() {
    return $this->id_prestamo;
}

function getId_plan() {
    return $this->id_plan;
}

function getId_pago() {
    return $this->id_pago;
}

function getId_asesor() {
    return $this->id_asesor;
}

function getPrestamo_original() {
    return $this->prestamo_original;
}

function getSaldo_actual() {
    return $this->saldo_actual;
}

function getMora_acumulada() {
    return $this->mora_acumulada;
}

function getIntereses_acumulados() {
    return $this->intereses_acumulados;
}

function getEstado() {
    return $this->estado;
}

function setId_prestamo($id_prestamo) {
    $this->id_prestamo = $id_prestamo;
}

function setId_plan($id_plan) {
    $this->id_plan = $id_plan;
}

function setId_pago($id_pago) {
    $this->id_pago = $id_pago;
}

function setId_asesor($id_asesor) {
    $this->id_asesor = $id_asesor;
}

function setPrestamo_original($prestamo_original) {
    $this->prestamo_original = $prestamo_original;
}

function setSaldo_actual($saldo_actual) {
    $this->saldo_actual = $saldo_actual;
}

function setMora_acumulada($mora_acumulada) {
    $this->mora_acumulada = $mora_acumulada;
}

function setIntereses_acumulados($intereses_acumulados) {
    $this->intereses_acumulados = $intereses_acumulados;
}

function setEstado($estado) {
    $this->estado = $estado;
}


}
?>
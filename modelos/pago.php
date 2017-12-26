<?php

class pago {
private $id_pago;
private $monto;
private $fecha;

function __construct() {
    
}
function getId_pago() {
    return $this->id_pago;
}

function getMonto() {
    return $this->monto;
}

function getFecha() {
    return $this->fecha;
}

function setId_pago($id_pago) {
    $this->id_pago = $id_pago;
}

function setMonto($monto) {
    $this->monto = $monto;
}

function setFecha($fecha) {
    $this->fecha = $fecha;
}


}
?>
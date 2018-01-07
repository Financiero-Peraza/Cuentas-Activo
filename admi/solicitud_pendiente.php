<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barra_superior_admi.php';
include_once '../plantilla/barra_lateral_admi.php';
include_once '../modelos/balance_general.php';
include_once '../modelos/estado_resultado.php';
include_once '../modelos/expediente_juridico.php';
include_once '../modelos/ratios.php';
include_once '../repositorios/repositorio_balance.php';
include_once '../repositorios/repositorio_estado_resultado.php';
include_once '../app/Conexion.php';
include_once '../repositorios/repositorio_expediente_juridico.php';;

Conexion::abrir_conexion();

$lista_balance = repositorio_balance::lista_balance(Conexion::obtener_conexion(), '5');
$lista_estado = repositorio_estado_resultado::lista_estado(Conexion::obtener_conexion(), '5');


?>    



<?php
include_once '../plantilla/pie.php';
?>
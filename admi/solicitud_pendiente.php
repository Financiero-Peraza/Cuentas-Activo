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

$ratio = repositorio_expediente_juridico::calculo_ratios($lista_balance, $lista_estado);


echo '<br>  liquidez corriente ' .  $ratio->getLiquidez_corriente();
echo '<br>  razon rapida ' .  $ratio->getRazon_rapida();
echo '<br>  rotacion inventarios ' .  $ratio->getRotacion_inventarios();
echo '<br>  periodo de cobro ' .  $ratio->getPeriodo_cobro();
echo '<br>  indice endeudamiento ' .  $ratio->getIndice_endeudamiento();
echo '<br>  interes fijo ' .  $ratio->getCargo_interes_fijo();
echo '<br>  utilidad bruta ' .  $ratio->getMargen_utilidad_bruta();
echo '<br>  utilidad neta  ' .  $ratio->getMargen_utilidad_neta();
echo '<br>  rendimiento activo ' .  $ratio->getRendimiento_activo();
echo '<br>  rendimiento patrimonio ' .  $ratio->getRendimiento_patrimonio();


?>    



<?php
include_once '../plantilla/pie.php';



?>
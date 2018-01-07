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
include_once '../repositorios/repositorio_expediente_juridico.php';
;

Conexion::abrir_conexion();

$lista_balance = repositorio_balance::lista_balance(Conexion::obtener_conexion(), $_REQUEST['id_juridico']);
$lista_estado = repositorio_estado_resultado::lista_estado(Conexion::obtener_conexion(), $_REQUEST['id_juridico']);

$ratio = array();

for ($i = 0; $i < count($lista_balance); $i++) {

    $balance = $lista_balance[$i];
    $estado = $lista_estado[$i];

    $ratio[] = repositorio_expediente_juridico::calculo_ratios($balance, $estado);
}
?>    
<section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Ratios</h3>
                    </div>


                </div>
            </div>
            <div class="panel-body">

                <table padding="20px" class="table table-striped" id="data-table-simple">
                    <thead class="">
                    <th class="">Razon</th>
                        <?php foreach ($ratio as $lista) { ?><th class="">Periodo <?php echo $lista->getPeriodo();?></th><?php } ?>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Liquidez Corriente</td>
                            <?php foreach ($ratio as $lista) { ?><td><?php echo $lista->getLiquidez_corriente(); ?></td><?php } ?>
                        </tr>
                        <tr>
                            <td>Razon Rapida</td>
                            <?php foreach ($ratio as $lista) { ?><td><?php echo $lista->getRazon_rapida(); ?></td><?php } ?>
                        </tr>
                        <tr>
                            <td>Rotacion de Inventarios</td>
                            <?php foreach ($ratio as $lista) { ?><td><?php echo $lista->getRotacion_inventarios(). " veces" ; ?></td><?php } ?>
                        </tr>
                        <tr>
                            <td>Periodo Promedio de Cobro</td>
                            <?php foreach ($ratio as $lista) { ?><td><?php echo $lista->getPeriodo_cobro(). " dias";  ?></td><?php } ?>
                        </tr>
                        <tr>
                            <td>Indice de Endeudamiento</td>
                            <?php foreach ($ratio as $lista) { ?><td><?php echo $lista->getIndice_endeudamiento() . "%"; ?></td><?php } ?>
                        </tr>
                        <tr>
                            <td>Razon de cargo de interes fijo</td>
                            <?php foreach ($ratio as $lista) { ?><td><?php echo $lista->getCargo_interes_fijo(); ?></td><?php } ?>
                        </tr>
                        <tr>
                            <td>Margen de Utilidad Bruta</td>
                            <?php foreach ($ratio as $lista) { ?><td><?php echo $lista->getMargen_utilidad_bruta() ."%" ; ?></td><?php } ?>
                        </tr>
                        <tr>
                            <td>Margen de Utilidad Neta</td>
                            <?php foreach ($ratio as $lista) { ?><td><?php echo $lista->getMargen_utilidad_neta()."%"; ?></td><?php } ?>
                        </tr>
                        <tr>
                            <td>Rendimiento sobre activos totales</td>
                            <?php foreach ($ratio as $lista) { ?><td><?php echo $lista->getRendimiento_activo()."%"; ?></td><?php } ?>
                        </tr>
                        <tr>
                            <td>Rendimiento sobre patrimonio</td>
                            <?php foreach ($ratio as $lista) { ?><td><?php echo $lista->getRendimiento_patrimonio()."%"; ?></td><?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<?php
include_once '../plantilla/pie.php';
?>
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
include_once '../modelos/persona_juridica.php';
include_once '../repositorios/repositorio_juridico.php';

Conexion::abrir_conexion();

$lista = repositorio_balance::lista_balance_filtrada(Conexion::obtener_conexion(), $_REQUEST['id_persona'], $_REQUEST['periodo']);
$lista_estado = repositorio_estado_resultado::lista_estado_filtrada(Conexion::obtener_conexion(),$_REQUEST['id_persona'], $_REQUEST['periodo']);
?>    

<section class="content">
    <?php  foreach ($lista as $lista_balance){ ?>
    
    <div class="container-fluid">
    <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <a href="#">
                            <h3 class="text-center"><?php echo 'BALANCE GENERAL AL 31 DE DICIEMBRE'; ?></h3>
                        </a>
                    </div>
                    <div id="" class="">
                        <div class="body">
                            <table class="table table-striped table-bordered" id="tabla_cliente_juridico">

                                <thead>
                                <th class="text-center"><strong>Activos</strong></th>
                                <th class="text-center"><strong>($)</strong></th>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="">Efectivo</td>
                                        <td class="text-center"><?php echo $lista_balance->getEfectivo();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Valores Negociables</td>
                                        <td class="text-center"><?php echo $lista_balance->getValor_negociable();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Cuentas por Cobrar</td>
                                        <td class="text-center"><?php echo $lista_balance->getCuenta_por_cobrar();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Inventarios</td>
                                        <td class="text-center"><?php echo $lista_balance->getInventarios();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Total de Activos corrientes</td>
                                        <td class="text-center"><?php echo $lista_balance->getTotal_activo_corriente();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Terrenos</td>
                                        <td class="text-center"><?php echo $lista_balance->getTerrenos();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Edificio y equivo</td>
                                        <td class="text-center"><?php echo $lista_balance->getEdificio_equipo();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Menos: Depreciacion acumulada</td>
                                        <td class="text-center"><?php echo $lista_balance->getDepreciacion();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Activos Fijos Netos</td>
                                        <td class="text-center"><?php echo $lista_balance->getTotal_activo_noCorriente();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Total de Activos</td>
                                        <td class="text-center"><strong><?php echo $lista_balance->getTotal_activo();?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><strong>Pasivo y patrimonio de los accionistas</strong></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td class="">Cuentas por pagar </td>
                                        <td class="text-center"><?php echo $lista_balance->getCuenta_por_pagar();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Documentos por pagar</td>
                                        <td class="text-center"><?php echo $lista_balance->getDocumento_por_pagar();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Total de pasivos corrientes</td>
                                        <td class="text-center"><?php echo $lista_balance->getTotal_pasivo_corriente();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Deudas a largo plazo</td>
                                        <td class="text-center"><?php echo $lista_balance->getDeuda_largop();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Acciones comunes</td>
                                        <td class="text-center"><?php echo $lista_balance->getAccioneC();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Ganancias Retenidas</td>
                                        <td class="text-center"><?php echo $lista_balance->getGanancias_retenidas();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Total de pasivo y patrimonios de los accionistas</td>
                                        <td class="text-center"><strong><?php echo $lista_balance->getTotal_pasivo_patrimonio();?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <?php  foreach ($lista_estado as $lista){ ?>
    
    
    <div class="container-fluid">
    <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <a href="#">
                            <h3 class="text-center"><?php echo 'ESTADO DE RESULTADO AL 31 DE DICIEMBRE'; ?></h3>
                        </a>
                    </div>
                    <div id="" class="">
                        <div class="body">
                            <table class="table table-striped table-bordered" id="tabla_cliente_juridico">

                                <thead>
                                <th class="text-center"><strong>Concepto</strong></th>
                                <th class="text-center"><strong>($)</strong></th>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="">Ingresos por ventas</td>
                                        <td class="text-center"><?php echo $lista->getIngreso_venta();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Menos: Costo de los bienes vendidos</td>
                                        <td class="text-center"><?php echo $lista->getCosto_venta();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Utilidad Bruta</td>
                                        <td class="text-center"><?php echo $lista->getUtilidad_bruta();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Menos: Gastos operativos</td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td class="">Gastos de venta</td>
                                        <td class="text-center"><?php echo $lista->getGasto_venta();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Gastos generales y administrativos</td>
                                        <td class="text-center"><?php echo $lista->getGasto_administrativo();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Gastos de Arrendamiento</td>
                                        <td class="text-center"><?php echo $lista->getGasto_arrendamiento();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Gastos de depreciación</td>
                                        <td class="text-center"><?php echo $lista->getGasto_depreciacion();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Total de gastos operativos</td>
                                        <td class="text-center"><?php echo $lista->getTotal_operativo();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Menos: gastos por intereses</td>
                                        <td class="text-center"><?php echo $lista->getGasto_interes();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Utilidad antes de impuestos </td>
                                        <td class="text-center"><?php echo $lista->getUtilidad_antes_impuestos();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Menos: impuestos</td>
                                        <td class="text-center"><?php echo $lista->getImpuestos();?></td>
                                    </tr>
                                    <tr>
                                        <td class="">Utilidad neta despues de impuestos</td>
                                        <td class="text-center"><?php echo $lista->getUtilidad_neta();?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<script>
    function abrir_expediente(id_prestamo) {
        var url = "./ver_pagos.php?id_prestamo=" + id_prestamo;

        var a = document.createElement("a");
        a.target = "_blank";
        a.href = url;
        a.click();
    }
    function abrir_estados(id_persona, periodo) {
        var url = "./verEstado.php?id_persona=" + id_persona + "&periodo=" + periodo;

        var a = document.createElement("a");
        a.target = "_blank";
        a.href = url;
        a.click();
    }


</script>


<?php
}

include_once '../plantilla/pie.php';
?>
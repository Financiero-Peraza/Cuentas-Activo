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
include_once '../modelos/presamo.php';
include_once '../repositorios/repositorio_prestamo.php';

Conexion::abrir_conexion();

$lista_prestamo = repositorio_prestamo::lista_prestamo_
?>    
<section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Solicitudes de Creditos empresariales</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table padding="20px" class="table table-striped" id="data-table-simple">
                    <thead class="">
                    <th class="text-center">Asesor</th>
                    <th class="text-center">Solicitante</th>
                    <th class="text-center">Tipo Prestamo</th>
                    <th class="text-center">Sector de Empresa</th>
                    <th class="text-center">Monto solicitado($)</th>
                    <th class="text-center">Tiempo(Meses)</th>
                    <th class="text-center">Expediente</th>

                    </thead>
                    <tbody>
                        <?php foreach ($lista_prestamo as $lista) { ?>
                            <tr>
                                <th class="text-center"><?php echo $lista['4'];?></th>
                                <th class="text-center"><?php echo $lista['2'];?></th>
                                <th class="text-center"><?php echo $lista['1'];?></th>
                                <th class="text-center">Servicio</th>
                                <th class="text-center"><?php echo "$". $lista['3'];?></th>
                                <th class="text-center"><?php echo $lista['6'];?></th>
                                 <td class="text-center">
                                     <button class="btn btn-danger" onclick="abrir_expediente('<?php echo $lista['7'];?>')"> 
                                        <i class="Medium material-icons prefix">visibility</i> 
                                    </button>
                                </td>
                            </tr>
                            
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
function abrir_expediente(id_juridico){
    location.href="./ver_expediente.php?id_juridico=" +id_juridico, "_parent";
}
</script>

<?php
include_once '../plantilla/pie.php';
?>
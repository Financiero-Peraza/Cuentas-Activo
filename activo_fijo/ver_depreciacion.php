<?php
$clienteInfo=$_REQUEST['clienteinfo'];
echo $clienteInfo;

//SELECT
//activo.estado,
//tipo_activo.nombre AS tipo,
//activo.precio as precio,
//departamento.nombre as dep,
//usuario.nombre AS nombreUser,
//institucion.nombre AS nombreInst,
//encargado.nombre AS encargado,
//activo.id_activo AS id,
//activo.fecha_adquisicion as fecha
//FROM
//activo, usuario, departamento, institucion, tipo_activo, encargado
//WHERE
//tipo_activo.id_tipo = activo.id_tipo AND
//activo.id_activo = 1
//GROUP BY activo.id_activo
?>
<div class="row" >
    <form id="imprimir_depre" method="post" action="../reportesActivo/imp_depre.php" target="_blank">
        <table id="no_imp" class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <td colspan="4" style="height:15px;" >
                        <div class="input-field col s12 text-center">
                            <input type="text" id="ver_cod_depre" name="ver_cod_depre" placeholder="" minlength="8"  readonly=""   >
                            <label for="textarea1" style="font-size:15px"><i class="fa fa-pencil-square-o"></i>C&oacutedigo</label>
                        </div>
                    </td>
                </tr>
                <tr class="text-center" >
                    <td style="height:10px;"><div class="col m12">
                            <div class="input-field">
                                <i class="fa fa-calendar prefix" aria-hidden="true"></i>
                                <label for="fecha_pub"  class="active" style="font-size:16px">Fecha Adquisición</label>
                                <input type="text" name="ver_fecha_depre" placeholder="" id="ver_fecha_depre" readonly=""   >
                            </div>
                        </div></td>
                    <td style="height:10px;">
                        <div class="input-field col m12">
                            <i class="fa fa-usd prefix"></i> 
                            <input type="number" name="ver_valor" placeholder="" min="0" step="any" id="ver_valor"  class="text-center validate" readonly="">
                            <label for="precioUnitario" style="font-size:16px">Valor del Activo<small></small> </label>
                        </div>
                    </td>
                </tr>
                 <tr class="text-center" >
                    <td style="height:10px;"><div class="col m12">
                            <div class="input-field">
                                <i class="fa fa-calendar prefix" aria-hidden="true"></i>
                                <label for="fecha_pub"  class="active" style="font-size:16px">Tipo</label>
                                <input type="text" name="ver_fecha_depre" placeholder="" id="ver_fecha_depre" readonly=""   >
                            </div>
                        </div></td>
                    <td style="height:10px;">
                        <div class="input-field col m12">
                            <i class="fa fa-usd prefix"></i> 
                            <input type="number" name="ver_valor" placeholder="" min="0" step="any" id="ver_valor"  class="text-center validate" readonly="">
                            <label for="precioUnitario" style="font-size:16px">Encargado<small></small> </label>
                        </div>
                    </td>
                </tr>
                 <tr class="text-center" >
                    <td style="height:10px;"><div class="col m12">
                            <div class="input-field">
                                <i class="fa fa-calendar prefix" aria-hidden="true"></i>
                                <label for="fecha_pub"  class="active" style="font-size:16px">Institucion</label>
                                <input type="text" name="ver_fecha_depre" placeholder="" id="ver_fecha_depre" readonly=""   >
                            </div>
                        </div></td>
                    <td style="height:10px;">
                        <div class="input-field col m12">
                            <i class="fa fa-usd prefix"></i> 
                            <input type="number" name="ver_valor" placeholder="" min="0" step="any" id="ver_valor"  class="text-center validate" readonly="">
                            <label for="precioUnitario" style="font-size:16px">Departamento<small></small> </label>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>


        <table id="ver_depre_tab" class="table table-striped table-bordered">
            <caption>Depreciación </caption>
            <thead>
            <th class="text-center" >Año</th>
            <th class="text-center">Valor del Activo</th>
            <th class="text-center">Depreciación</th>
            <th class="text-center">Valor Neto</th>
            </thead>
            <tbody></tbody>
        </table>
        <a href="javascript:history.back(1)">
        <button class="btn btn-info" type="button" > 
            <i class="fa fa-eye"></i>Volver
        </button>
        </a>
    </form>
</div>

<script type="text/javascript" >
function llamarPaginaBack(id){
    href="javascript:history.back(1)"
}    
</script>



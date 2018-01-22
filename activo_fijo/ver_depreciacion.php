<?php
$clienteInfo=$_REQUEST['clienteinfo'];
echo $clienteInfo;
$con =new mysqli('localhost','root','','instituciones_financieras');
$datos=$con->query("SELECT
activo.estado,
tipo_activo.nombre AS tipo,
activo.precio as precio,
departamento.nombre as dep,
usuario.nombre AS nombreUser,
institucion.nombre AS nombreInst,
encargado.nombre AS encargado,
activo.id_activo AS id,
activo.fecha_adquisicion as fecha,
tipo_activo.id_clasificacion as clasi
FROM
activo, usuario, departamento, institucion, tipo_activo, encargado
WHERE
tipo_activo.id_tipo = activo.id_tipo AND
activo.id_activo = '$clienteInfo'
GROUP BY activo.id_activo  
");

?>
<div class="row" >
    <form id="imprimir_depre" method="post" action="../reportesActivo/imp_depre.php" target="_blank">
        <?php while($fila=mysqli_fetch_array($datos)){?>
        <table id="no_imp" class="table table-striped table-bordered">
            <tbody>
                
                <tr>
                    <td colspan="4" style="height:15px;" >
                        <div class="input-field col s12 text-center">
                            <label for="textarea1" style="font-size:15px"><i class="fa fa-pencil-square-o"></i>C&oacutedigo</label>
                            <input type="text" id="ver_cod_depre" name="ver_cod_depre" value="<?php echo $fila['id']; ?>"  minlength="8"  readonly=""   >
                            
                        </div>
                    </td>
                </tr>
                <tr class="text-center" >
                    <td style="height:10px;"><div class="col m12">
                            <div class="text-center">
                                <i class="fa fa-calendar prefix" aria-hidden="true"></i>
                                <label for="fecha_pub"  class="active" style="font-size:16px">Fecha Adquisición</label>
                                <input type="text" name="ver_fecha_depre" value="<?php echo $fila['fecha']; ?>"  id="ver_fecha_depre" readonly=""   >
                            </div>
                        </div></td>
                    <td style="height:10px;">
                        <div class="input-field col m12">
                            <i class="fa fa-usd prefix"></i> 
                            <input type="text" name="ver_valor" value="<?php echo $fila['precio']; ?>" min="0" step="any" id="ver_valor"  class="text-center validate" readonly="">
                            <label for="precioUnitario" style="font-size:16px">Valor del Activo<small></small> </label>
                        </div>
                    </td>
                </tr>
                 <tr class="text-center" >
                    <td style="height:10px;"><div class="col m12">
                            <div class="input-field">
                                <i class="fa fa-calendar prefix" aria-hidden="true"></i>
                                <label for="fecha_pub"  class="active" style="font-size:16px">Tipo</label>
                                <input type="text" name="ver_fecha_depre" value="<?php echo $fila['tipo']; ?>" id="ver_fecha_depre" readonly=""   >
                            </div>
                        </div></td>
                    <td style="height:10px;">
                        <div class="input-field col m12">
                            <i class="fa fa-usd prefix"></i> 
                            <input type="text" name="ver_valor" value="<?php echo $fila['encargado']; ?>" min="0" step="any" id="ver_valor"  class="text-center validate" readonly="">
                            <label for="precioUnitario" style="font-size:16px">Encargado<small></small> </label>
                        </div>
                    </td>
                </tr>
                 <tr class="text-center" >
                    <td ><div class="col m12">
                            <div class="input-field">
                                <i class="fa fa-calendar prefix" aria-hidden="true"></i>
                                <label for="fecha_pub"  class="active" style="font-size:16px">Institucion</label>
                                <input type="text" name="ver_fecha_depre" value="<?php echo $fila['nombreInst']; ?>" id="ver_fecha_depre" readonly=""   >
                            </div>
                        </div></td>
                    <td >
                        <div class="input-field col m12">
                            <i class="fa fa-usd prefix"></i> 
                            <input type="text" name="ver_valor" value="<?php echo $fila['dep']; ?>"min="0" step="any" id="ver_valor"  class="text-center validate" readonly="">
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
            <tbody>
               <?php 
               if($fila['clasi']=="1")
                   $veces=2;
               if($fila['clasi']=="2")
                   $veces=4;
               if($fila['clasi']=="3")
                   $veces=5;
               if($fila['clasi']=="4")
                   $veces=20;
               if($fila['clasi']=="5")
                   $veces=0;
               $ano= explode('-', $fila['fecha']) ;
               $ano=$ano[0];               
               $valor=$fila['precio'];
               $depre=$valor/$veces;
               $vn=$valor-$depre;
                    
               for ($i=0; $i<$veces;$i++){
               ?>
                <tr>
                <td class="text-center" > <?php echo ($ano+$i); ?></td>
                <td class="text-center" > <?php echo $valor; ?> </td>
                <td class="text-center" > <?php echo $depre; ?></td>
                <td class="text-center" > <?php echo $vn; ?> </td>
                </tr> 
               <?php 
               $vn=$vn-$depre;
               } ?>
            </tbody>
        </table>
        <a href="javascript:history.back()">
        <button class="btn btn-info" type="button" > 
            <i class="fa fa-eye"></i>Volver
        </button>
        </a>
        <?php
						}
							?>
    </form>
</div>




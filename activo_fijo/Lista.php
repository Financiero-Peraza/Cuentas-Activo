<script language="javascript">
    $(document).ready(function () {

        $('form').keypress(function (e) {
            if (e == 13) {
                return false;
            }
        });
        $('input').keypress(function (e) {
            if (e.which == 13) {
                return false;
            }
        });
    });
</script>
<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<script src="jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<?php

// AGRAGAR CONTRASENA SI TIENEN CONTRA EL XAMPP

$con =new mysqli('localhost','root','','instituciones_financieras');
$datos=$con->query("select activo.correlativo,tipo_activo.nombre as aa, activo.precio,departamento.nombre, usuario.nombre as nombre_de_usuario,clasificacion.nombre,
 institucion.nombre AS nombre_institucion, encargado.nombre as encargado, activo.descripcion,activo.id_activo as id FROM
activo, usuario, departamento, institucion, tipo_activo, clasificacion,encargado
WHERE tipo_activo.id_tipo=activo.id_tipo and activo.id_departamento=departamento.id_departamento
and institucion.id_institucion=activo.id_institucion and encargado.id_encargado=activo.encargado_id_encargado
 GROUP BY activo.id_activo  
");
?>
<!--<form action="" method="post" class="formNatural" name="credito_personal" id="credito_personal" onsubmit="return validarTablas_cper()" enctype="multipart/form-data" >-->
    <input type="hidden" id="pas_cp" name="pas_cp"/>
    <input type="hidden" id="n" name="n" value="1"/>
    <input type="radio" id="uno" checked="" style="display: none"/>
    <section class="content">
        <!--    INICIO DE DATOS-->
        <div class="container-fluid" id="contenido">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">Activos</h2>
                        </div>
                        <div id="heading" class="panel-heading">
<div id="expedientes" class="panel panel-info">
          <div class="panel-body">
          <script src="./js/jquery.min.js"> </script>
          <script src="./js/buscaresc.js"></script>
            
  <input type="text" name="buscar" id="filtrar" class="form-control" placeholder="Buscar" >
                        <div class="body">
                            <div class="row clearfix">




                                <table class="table table-striped table-bordered" id="tabla_cliente_cpersonal">
                                    <caption></caption>

                                    <thead>
                                    <th>Actvio</th>


                                    <thead >
                                    <th>Correlativos</th>
                                   

                                    <th>Departamento</th>
                                    <th>Precio</th>
                                    <th>Institucion</th>
                                    <th>Encargado</th>
                                    <th>Acciones </th>  
                                    </thead>
                                    <tbody class="buscar">

                                        

                                    
     				<?php while($fila=mysqli_fetch_array($datos)){?>
						
                        <tr>
                        	
                          
                           <td><?php echo $fila['correlativo']; ?></td>
                           
                            <td><?php echo $fila['nombre']; ?></td>
                              
                              <td><?php echo $fila['precio'].' $' ; ?></td>
                              
                                    <td><?php echo $fila['nombre_institucion']; ?></td>

                                  <td><?php echo $fila['encargado']; ?></td>
                                  <td 
                                   <button class="btn btn-info" 
                onclick="llamarPagina('<?php echo $fila['id']; ?>')"> 
                <i class="fa fa-eye"></i>Depreciacion</td>
                </button>
                                      
                            
                            
                            </tr>
                            <?php
						}
							?>
							
                        </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--    FIN DE DATOS-->
        </div>



    </section>
<!--</form>-->


<datalist id="lista_personas_naturales">
    <?php
    include_once '../app/Conexion.php';
    include_once '../repositorios/repositorio_expediente_natural.php';
    Conexion::abrir_conexion();
    $listado = repositorio_expediente_natural::lista_persona_natural(Conexion::obtener_conexion());
    foreach ($listado as $fila) {
        echo '<option value="' . $fila[2] . '" label="' . $fila[0] . '" > ';
    }
    ?>
</datalist>


<script type="text/javascript" >
function llamarPagina(id){
    $("#contenido").load('ver_depreciacion.php?clienteinfo='+id);
//	window.open("../activo_fijo/ver_depreciacion.php?datos="+id, '_parent');
	}

    
</script>

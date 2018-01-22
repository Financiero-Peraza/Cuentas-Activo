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
$con =new mysqli('localhost','root','root','instituciones_financieras');
$datos=$con->query("select activo.estado,tipo_activo.nombre as aa, activo.precio,departamento.nombre, usuario.nombre as nombre_de_usuario, institucion.nombre AS
nombre_institucion, encargado.nombre as encargado FROM
activo, usuario, departamento, institucion, tipo_activo, encargado
WHERE tipo_activo.id_tipo=activo.id_tipo GROUP BY activo.id_activo  
");
?>
<form action="" method="post" class="formNatural" name="credito_personal" id="credito_personal" onsubmit="return validarTablas_cper()" enctype="multipart/form-data" >
    <input type="hidden" id="pas_cp" name="pas_cp"/>
    <input type="hidden" id="n" name="n" value="1"/>
    <input type="radio" id="uno" checked="" style="display: none"/>
    <section class="content">
        <!--    INICIO DE DATOS-->
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">Activo</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                



                                <table class="table table-striped table-bordered" id="tabla_cliente_cpersonal">
                                    <caption></caption>
                                    <thead>
                                    <th>Actvio</th>
                                   
                                    <th>Departamento</th>
                                    <th>Precio</th>
                                    <th>Institucion</th>
                                    <th>Encargado</th>
                                    <th>Acciones </th>  
                                    </thead>
                                    <tbody class="buscar">
     				<?php while($fila=mysqli_fetch_array($datos)){?>
						
                        <tr>
                        	
                          
                           <td><?php echo $fila['estado']; ?></td>
                           
                            <td><?php echo $fila['nombre']; ?></td>
                              
                              <td><?php echo $fila['precio'].' $' ; ?></td>
                              
                                    <td><?php echo $fila['nombre_institucion']; ?></td>

                                  <td><?php echo $fila['encargado']; ?></td>
                                  <td 
                                   <button class="btn btn-info" 
                onclick="verDepreciacion('<?php echo $fila['nombre'] ?>','<?php echo $fila['precio'] ?>')"> 
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

           

            
    </section>
</form>

<!-- Modal -->
<div class="modal fade" id="mimodalejemplo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ayuda a usuario</h4>
      </div>
      <div class="modal-body">
        	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>
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


	<script type="text/javascript" class="init">
	

$(document).ready(function() {
	$('#example').DataTable();
} );

function llamarPagina(id){
	window.open("../activo_fijo/depreciacion.php?datos="+id, '_parent');
	}

function llamarPaginaImprimir(id){
	window.open("dar.php?iddatos="+id, '_parent');
	}	
	
	
	
		
		
	
	</script>
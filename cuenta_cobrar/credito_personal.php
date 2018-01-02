<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
?>
<script language="javascript">
$(document).ready(function() {

  $('form').keypress(function(e){   
    if(e == 13){
      return false;
    }
  });
 
  $('input').keypress(function(e){
    if(e.which == 13){
      return false;
    }
  });

});
</script>
<form action="" method="GET">

    <section class="content">
        <!--    INICIO DE DATOS-->
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">SELECCIONE EL CLIENTE</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <div class="input-field"><i class="fa fa-search prefix" aria-hidden="true">

                                                </i><label for="" style="font-size:16px">Buscar Cliente</label>
                                                <input type="text" id="buscar_cliente"  name="" autofocus onkeypress="llenar_tabla_cliente(this)" list="lista_personas_naturales">
                                            </div>              
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <table class="table table-striped table-bordered" id="tabla_cliente_cpersonal">
                                    <caption>CLIENTE</caption>
                                    <thead>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Dui</th>
                                    <th>Nit</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>  
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            <table class="table table-striped table-bordered" id="tabla_fiador">
                                    <caption>FIADOR</caption>
                                    <thead>
                                    <th>Nombre</th>
                                    <th>Dui</th>
                                    <th>Nit</th>                                    
                                    <th>Telefono</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--    FIN DE DATOS-->

        <!--INICIO DE FIADOR-->
        <div class="container-fluid">
            
            
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-fiador">
                            <h2 class="text-center">DATOS DE FIADOR</h2>
                            </a></div>
                        <div id="collapse-fiador" class="panel-collapse collapse">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text"class="form-control text-center" name="nameNombre" placeholder="NOMBRE...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" name="nameApellido" placeholder="APELLIDO...">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" name="NameDireccion" placeholder="DIRECCION...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" name="NameTelefono" placeholder="TELEFONO...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" name="NameDui" placeholder="DUI...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" name="NameNit" placeholder="NIT...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" class="form-control text-center" name="NameEmail" placeholder="EMAIL...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" class="form-control text-center" name="NameTrabajo" placeholder="LUGAR DE TRABAJO...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!--FIN DE FIADOR-->

        <!--INICIO REFERENCIA-->
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-referencias">
                            <h2 class="text-center">DATOS DE REFERENCIA</h2>
                            </a> </div>
                         <div id="collapse-referencias" class="panel-collapse collapse">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text"class="form-control text-center" name="nameNombre" placeholder="NOMBRE...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" name="nameApellido" placeholder="APELLIDO...">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" name="NameDireccion" placeholder="DIRECCION...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" name="NameTelefono" placeholder="TELEFONO...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!--FIN DE REFERENCIA-->

        <!--INICIO DATO DE CREDITO-->
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-credito">
                            <h2 class="text-center">DATOS DE CREDITO</h2>
                            </a></div>
                         <div id="collapse-credito" class="panel-collapse collapse">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" min="100" max="1000" class="form-control text-center" name="NameDireccion" placeholder="MONTO SOLICITADO($)...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick">
                                                <option value="">SELECCIONE EL NUMERO DE MESES</option>
                                                <option value="10">6 meses</option>
                                                <option value="20">12 meses</option>
                                                <option value="30">18 meses</option>
                                                <option value="40">24 meses</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" name="NameDireccion" placeholder="DIRECCION...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" name="NameTelefono" placeholder="TELEFONO...">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">GUARDAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!--FIN DE DATO DE CREDITO-->

    </section>


</form>
<datalist id="lista_personas_naturales">
    <?php
    include_once '../app/Conexion.php';
    include_once '../modelos/Libros.php';
    include_once '../repositorios/repositorio_expediente_natural.php';
    Conexion::abrir_conexion();
    $listado = repositorio_expediente_natural::lista_persona_natural(Conexion::obtener_conexion());


    foreach ($listado as $fila) {
        echo '<option value="'.$fila[2].'" label="'.$fila[0].'" > ';
    }
    ?>
</datalist>

<script>
function llenar_tabla_cliente(valor) {
   
    var depto =valor.value;
    var depto=$("#lista_personas_naturales option[value='" + $('#buscar_cliente').val() + "']").attr('label');//alert(depto);
     $("#lista_personas_naturales").load(" #lista_personas_naturales");//para actuaizar la datalist cuando registra 
//var numero=valor.id.substr(7)
//alert(valor.id);
    if (depto != "") {//alert("paso"+depto);
        $.post("../cuenta_cobrar/llenar_tabla_cliente.php", {libro: depto}, function (mensaje) {
            $('#lista_personas_naturales').html(mensaje).fadeIn();

        });

    }

} 
//eliminar de la tabla
 $(document).on('click', '.borrar_personatabla_cliente_cpersonal', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });
    
</script>
<?php
include_once '../plantilla/pie.php';
?>
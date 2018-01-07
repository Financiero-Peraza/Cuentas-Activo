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

<form action="" method="post" name="credito_personal" id="credito_personal" onsubmit="return validarTablas_cper()">
    <input type="hidden" id="pas_cp" name="pas_cp"/>
    <input type="radio" id="uno" checked="" style="visibility: hidden"/>
    <section class="content">
        <!--    INICIO DE DATOS-->
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">SELECCIONE LA EMPRESA</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <div class="input-field"><i class="fa fa-search prefix" aria-hidden="true">

                                                </i><label for="" style="font-size:16px">Buscar Empresa</label>
                                                <input type="text" id="buscar_cliente"  name="" autofocus onkeypress="return llenar_tabla_cliente(this)" list="lista_personas_naturales2">
                                            </div>              
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-bordered" id="tabla_cliente_juridico">
                                <caption>CLIENTE</caption>
                                <thead>
                                <th>Codigo</th>
                                <th>Nombre de la empresa</th>
                                <th>Numero de empresa</th>
                                <th>Dui de la empresa</th>
                                <th>Nit de la empresa</th>
                               
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

        <!--INICIO DATO DE CREDITO-->
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-credito">
                                <h2 class="text-center">DATOS DE CREDITO</h2>
                            </a></div>
                        <div id="collapse-credito" class="panel-collapse collapse in">
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" required="" min="1500" max="40000" class="form-control text-center" id="monto_per" name="monto_per" placeholder="MONTO SOLICITADO($)... MINIMO $1,500, MAXIMO $40,000">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" required="" id="mese_per" name="mese_per">
                                                    <option value="">SELECCIONE EL NUMERO DE MESES</option>
                                                    <?php
                                                    $n = 12;
                                                    for ($i = 0; $i <= 7; $i++) {//echo '<script language="javascript">alert("'.$n.'");</script>'; 
                                                        echo '<option value="' . $n . '">' . $n . ' meses</option>';
                                                        $n = $n + 12;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" required="" min="3" max="20" class="form-control text-center" id="tasa_per" name="tasa_per" placeholder="TASA">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="text-center">

                                            <button type="button" onclick="cuota_per()" class="btn btn-primary m-t-15 waves-effect">CALCULAR</button>
                                        </div></div>
                                </div>
                                <div class="text-center">

                                </div>
                                <div class="row"><div class="text-center">
                                        <button type="button" style="visibility: hidden" onclick="cuota_per()" class="btn btn-primary m-t-15 waves-effect">CALCULAR</button>
                                    </div></div>
                                <div class="row clearfix">


                                    <div class="row text-center">
                                        <div class="col-sm-3 resultado">
                                            <div class="big-bullet">
                                                <div class="bullet"></div>
                                                <div class="contenido text-120">Cuota Mensual</div>
                                            </div>
                                            <p class="text-center" id="pils-cuota-txt">$00.00</p>
                                        </div>
                                        <div class="col-sm-3 resultado">
                                            <div class="big-bullet">
                                                <div class="bullet"></div>
                                                <div class="contenido text-120">Monto de Préstamo</div>
                                            </div>
                                            <p class="text-center" id="pils-monto-txt">$00.00</p>
                                        </div>
                                        <div class="col-sm-3 resultado">
                                            <div class="big-bullet">
                                                <div class="bullet"></div>
                                                <div class="contenido text-120">Plazo</div>
                                            </div>
                                            <p class="text-center" id="pils-tiempo-txt">0 meses</p>
                                        </div>
                                        <div class="col-sm-3 resultado">
                                            <div class="big-bullet">
                                                <div class="bullet"></div>
                                                <div class="contenido text-120">Tasa</div>
                                            </div>
                                            <p class="text-center" id="pils-tasa-txt">00.00%</p>
                                        </div>
                                    </div>
                                    <div class="text-center ">
                                        <table class="table table-striped table-bordered" id="plan_pago_personal">
                                            <caption>PLAN DE PAGO</caption>
                                            <tbody>
                                                <tr>
                                                    <td>N </td>
                                                    <td>Capital</td>
                                                    <td>Interes</td>
                                                    <td>Cuota</td>
<!--                                                    <td>CARGOS</td>
                                                    <td>TORAL</td>-->
                                                    <td>Saldo</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="submit" form="credito_personal" class="btn btn-primary m-t-15 waves-effect">GUARDAR</button>
                                    <button type="reset" form="credito_personal" class="btn btn-primary m-t-15 waves-effect">CANCELAR</button>
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


<datalist id="lista_personas_naturales2">
    <?php
    include_once '../app/Conexion.php';
    include_once '../modelos/persona_juridica.php';
    include_once '../repositorios/repositorio_juridico.php';
    Conexion::abrir_conexion();
    $listado = repositorio_juridico::lista_persona_juridca(Conexion::obtener_conexion());
    
    


    foreach ($listado as $fila) {
        echo '<option value="' . $fila->getId_nombre()  . '" label="' . $fila->getId_persona_juridica() . '" > ';
              
    }
    ?>
</datalist>

<script>
    function llenar_tabla_cliente(valor) {
        var depto = valor.value;
        var depto = $("#lista_personas_naturales2 option[value='" + $('#buscar_cliente').val() + "']").attr('label');//alert(depto);
        $("#lista_personas_naturales2").load(" #lista_personas_naturales");//para actuaizar la datalist cuando registra 
//var numero=valor.id.substr(7)
//alert(valor.id);
        if (depto != "") {//alert("paso "+depto);
            $.post("../cuenta_cobrar/llenar_tabla_juridica.php", {libro: depto}, function (mensaje) {
                $('#lista_personas_naturales2').html(mensaje).fadeIn();

            });
        }
        return false;//para qeu no se envie el form
    }

    function agr_refe() {//para agreagar a la tabla
        var n = document.getElementById("ref_Nombre").value;
        var a = document.getElementById("ref_Apellido").value;
        var nombre_ref = document.getElementById("ref_Nombre").value + " " + document.getElementById("ref_Apellido").value;
        var tel_ref = document.getElementById("ref_Telefono").value;
        var dir_ref = document.getElementById("ref_Direccion").value;
        linea0 = "";
        linea0 = linea0.concat(
                "<tr>",
                '<td><input type="button" class="borrar_personatabla_ref_cpersonal btn-sm btn-danger" value="-"/>&nbsp;</td>',
                '<td><input type="hidden"  name="nombre_ref[]" value="' + n + '"/> <input type="hidden"  name="ape_ref[]" value="' + a + '"/>' + nombre_ref + "</td>",
                '<td><input type="hidden"  name="tel_ref[]" value="' + tel_ref + '"/> ' + tel_ref + "</td>",
                '<td><input type="hidden"  name="dir_ref[]" value="' + dir_ref + '"/> ' + dir_ref + "</td>",
                "</tr>"
                );
        //alert("paso " + linea0);
        $("table#tabla_referencias tbody").append(linea0);
        document.getElementById("ref_Nombre").value = "";
        document.getElementById("ref_Apellido").value = "";
        document.getElementById("ref_Direccion").value = "";
        document.getElementById("ref_Telefono").value = "";

    }
//eliminar de la tabla
    $(document).on('click', '.borrar_personatabla_cliente_cpersonal', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });
    $(document).on('click', '.borrar_personatabla_ref_cpersonal', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });

    function cuota_per() {
        var tasa_persona = document.getElementById("tasa_per").value / 100 / 12;
        var monto_persona = document.getElementById("monto_per").value;
        var meses_persona = document.getElementById("mese_per").value;
        var cuota_persona = 0;

        cuota_persona = monto_persona * ((Math.pow(1 + tasa_persona, meses_persona) * tasa_persona) / (Math.pow(1 + tasa_persona, meses_persona) - 1));
        cuota_persona = cuota_persona.toFixed(2);
        //alert("$"+cuota);
        // cuota = monto_persona * Math.pow( 1 + tasa_persona, meses_persona ) / meses_persona; pils-monto_persona-txt pils-tiempo-txt pils-tasa_persona-txt

        document.getElementById('pils-cuota-txt').innerHTML = "$" + cuota_persona;
        document.getElementById('pils-monto-txt').innerHTML = "$" + monto_persona;
        document.getElementById('pils-tiempo-txt').innerHTML = meses_persona + " meses";
        document.getElementById('pils-tasa-txt').innerHTML = document.getElementById("tasa_per").value + "%";
        // $( '#pils-cuota-txt' ).text( '$' + numberWithCommas( cuota ) );
        addfilas("plan_pago_personal");
    }

    function validarTablas_cper() {
        var okk = true;
        if ($('#tabla_cliente_cpersonal >tbody >tr').length == 0) {
            okk = false;

            swal("Ooops", "Tabla de cliente vacia", "warning");
        } else {
            if ($('#tabla_referencias >tbody >tr').length == 0) {
                okk = false;
                swal("Ooops", "Tabla de Referencias vacia", "warning");

            }

        }



        return okk;
    }
</script>
<?php
include_once '../plantilla/pie.php';
if (isset($_REQUEST["pas_cp"])) {

    include_once '../app/Conexion.php';
    include_once '../modelos/fiador.php';
    include_once '../modelos/referencias.php';
    include_once '../modelos/presamo.php';
    include_once '../modelos/expediente_natural.php';
    include_once '../repositorios/repositorio_fiador.php';
    include_once '../repositorios/repositorio_referencias.php';
    include_once '../repositorios/repositorio_prestamo.php';
    include_once '../repositorios/repositorio_expediente_natural.php';



    Conexion::abrir_conexion();
//echo '<script language="javascript">alert("juas");</script>'; 

    $fiador = new fiador();
    $fiador->setNombre($_REQUEST["Nombre_fia_per"]);
    $fiador->setApellido($_REQUEST["Apellido_fia_per"]);
    $fiador->setCorreo($_REQUEST["Email_fia_per"]);
    $fiador->setDireccion($_REQUEST["Direccion_fia_per"]);
    $fiador->setDui($_REQUEST["Dui_fia_per"]);
    $fiador->setNit($_REQUEST["Nit_fia_per"]);
    $fiador->setId_persona_natural($_REQUEST["codCliente_cpersonal"]);
    $fiador->setId_telefono($_REQUEST["Telefono_fia_per"]);
    $fiador->setLugar_trabajo($_REQUEST["Trabajo_fia_per"]);


    $prestamo = new presamo();
    $prestamo->setId_plan("1");
    $prestamo->setId_asesor("1");
    $prestamo->setPrestamo_original($_REQUEST["monto_per"]);
    $prestamo->setId_plan("1");    
    $devolucion = date("d-m-Y");
    $devolucion = date_format(date_create($devolucion), 'Y-m-d');
    $prestamo->setFecha($devolucion);
    $prestamo->setTiempo($_REQUEST["mese_per"]);

    


    $referencias = new referencias();
    $nombres = $_REQUEST["Nombre_fia_per"];
    $apellidos = $_REQUEST["ape_ref"];
    $tels = $_REQUEST["tel_ref"];
    $l = count($_REQUEST["nombre_ref"]);
    if (
            repositorio_fiador::insertar_fiador(Conexion::obtener_conexion(), $fiador) &&
            repositorio_prestamo::insertar_prestamo(Conexion::obtener_conexion(), $prestamo) 
            
    ) { 
        $prestamo1 = repositorio_prestamo::obtenerU_ultimo_prestamo(Conexion::obtener_conexion());
    $expediente = new expediente_natural();
    $expediente->setId_prestamo($prestamo1);
   $expediente->setPersona_natural($_REQUEST["codCliente_cpersonal"]);
   repositorio_expediente_natural::insertar_expediente(Conexion::obtener_conexion(), $expediente);
        for ($i = 0; $i < $l; $i++) {
            $referencias->setNombre($nombres[$i]);
            $referencias->setApellido($apellidos[$i]);
            $referencias->setTelefono($tels[$i]);
            $referencias->setId_persona_natural($_REQUEST["codCliente_cpersonal"]);
            if (repositorio_referencias::insertar_referencia(Conexion::obtener_conexion(), $referencias)) {
                echo "<script type='text/javascript'>";
        echo 'swal({
                    title: "Exito",
                    text: "Credito registrado",
                    type: "success"},
                    function(){
                    }
                    );';
        echo "</script>";
            } else {
                echo "<script type='text/javascript'>";
                echo 'swal({
                    title: "Ooops",
                    text: "Credito no Registrado",
                    type: "error"},
                    function(){
                    }
                    );';
//echo "alert('datos no atualizados')";
//echo "location.href='inicio_b.php'";
                echo "</script>";
            }
        }

        //
        //Conexion::cerrar_conexion();
    } else {
        echo "<script type='text/javascript'>";
        echo 'swal({
                    title: "Ooops",
                    text: "Credito  no Registrado",
                    type: "error"},
                    function(){
                       
                       
                     
                        
                    }

                    );';
//echo "alert('datos no atualizados')";
//echo "location.href='inicio_b.php'";
        echo "</script>";
    }
}
?>
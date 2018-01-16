<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../modelos/tipo_activo.php';
include_once '../modelos/clasificacion.php';
include_once '../repositorios/repositorio_clasificacion.php';
include_once '../repositorios/repositorio_tipoActivo.php';
include_once '../app/Conexion.php';
include_once '../repositorios/correlativos.php';
Conexion::abrir_conexion();

if (isset($_REQUEST['nameEnviar'])) {
    $nombre = $_REQUEST['nameNombre'];
    $select = $_REQUEST['NameSelect'];
    $conexion = Conexion::obtener_conexion();
    $correlativo = correlativos::obtener_correlativo($conexion, 'tipo_activo');

    $sql = "INSERT INTO tipo_activo (id_clasificacion, nombre, correlativo) VALUES ('$select', '$nombre', '$correlativo')";
    $sentencia = $conexion->prepare($sql);
    $resultado = $sentencia->execute();

    echo '<script>location.href ="registro_tipo_activo.php";</script>';
} else {
    $lista_clasificacion = repositorio_clasificacion::lista_clasificacion(Conexion::obtener_conexion());
    ?>


    <form action="registro_tipo_activo.php" method="GET" autocomplete="off">
        <section class="content">
            <!--INICIO DE FIADOR-->
            <div class="container-fluid">
                <!-- Basic Validation -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center">REGISTRO DE ACTIVO</h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                    
                                                    <select class="form-control show-tick" name="NameSelect" required="">
                                                        <option  value="" disabled="">SELECCIONE EL ENCARGADO</option>
                                                        <?php foreach ($lista_clasificacion as $lista) { ?>

                                                            <option value="<?php echo $lista->getId_clasificacion(); ?>"><?php echo $lista->getNombre(); ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" name="NameSelect" required="">
                                                        <option  value="" disabled="">SELECCIONE TIPO DE ACTIVO</option>
                                                        <?php foreach ($lista_clasificacion as $lista) { ?>

                                                            <option value="<?php echo $lista->getId_clasificacion(); ?>"><?php echo $lista->getNombre(); ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" name="NameSelect" required="">
                                                        <option  value="" disabled="">SELECCIONE INSTITUCIÓN</option>
                                                        <?php foreach ($lista_clasificacion as $lista) { ?>

                                                            <option value="<?php echo $lista->getId_clasificacion(); ?>"><?php echo $lista->getNombre(); ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" name="NameSelect" required="">
                                                        <option  value="" disabled="">SELECCIONE ENCARGADO</option>
                                                        <?php foreach ($lista_clasificacion as $lista) { ?>

                                                            <option value="<?php echo $lista->getId_clasificacion(); ?>"><?php echo $lista->getNombre(); ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span class="input-group-addon" id="basic-addon1">FECHA ADQUISICION</span>
                                                <input type="date"  class="form-control text-center" required="" name="nameEfectivo" placeholder="FECHA ADQUISICION">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span class="input-group-addon" id="basic-addon1">TIEMPO DE USO (MESES)</span>
                                                <input type="number"  min="0" step="any"class="form-control text-center" name="nameNegociable" placeholder="TIEMPO DE USO (MESES)" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span class="input-group-addon" id="basic-addon1">DESCRIPCION</span>
                                                <input type=""  class="form-control text-center" required="" name="nameEfectivo" placeholder="FECHA ADQUISICION">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span class="input-group-addon" id="basic-addon1">OBSERVACIONES</span>
                                                <input type=""  min="0" step="any"class="form-control text-center" name="nameNegociable" placeholder="TIEMPO DE USO (MESES)" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="nameEnviar" class="btn btn-primary m-t-15 waves-effect" value="ok">GUARDAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <?php
}
include_once '../plantilla/pie.php';
?>
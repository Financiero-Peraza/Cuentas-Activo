<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
?>
<form action="">
    <section class="content">
        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="header">
                            <h2 class="text-center">REGISTRO DE CLIENTE</h2>
                        </div>
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
                            <div class="text-center">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">GUARDAR</button>
                                </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
                     
           
            </div>
            <!-- #END# Inline Layout -->
           
        </div>
    </section>
</form>
<?php
include_once '../plantilla/pie.php';
?>

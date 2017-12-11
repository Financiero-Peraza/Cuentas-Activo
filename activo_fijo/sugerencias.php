<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
?>

<section class="content">
    <div class="container-fluid">
        <!-- Google Maps -->
        <div class="alert alert-warning text-center">
            <h3>Sugerencias</h3> 
        </div>
        <!-- Textarea -->
        <div class="row clearfix">
            <form action="">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header text-center">
                            <h2>¿Que es lo que piensas? Dejanos tus sugerencias</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"placeholder="Escribe tu nombre" />
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="1" class="form-control no-resize auto-growth" placeholder="Escribe tu Sugerencia :)"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn bg-orange waves-effect">
                                        <i class="material-icons">save</i>
                                        <span>Enviar</span>
                                    </button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- #END# Textarea -->


    </div>
</section>

<?php
include_once '../plantilla/pie.php';
?>
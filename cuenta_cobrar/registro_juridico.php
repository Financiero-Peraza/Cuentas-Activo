<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
?>
<form action="" method="GET">
    <!--    INICIO DE DATOS-->
    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">DATOS BASICOS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control text-center" name="nameNombre" placeholder="NOMBRE DE LA EMPRESA">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--    FIN DE DATOS-->

        <!--INICIO DE BALANCE-->

        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">BALANCE GENERAL</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" min="0" step="any" class="form-control text-center" name="nameEfectivo" placeholder="EFECTIVO($)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any"class="form-control text-center" name="nameNegociable" placeholder="VALORES NEGOCIABLES($)">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any" class="form-control text-center" name="NameCuentaXcobrar" placeholder="CUENTAS POR COBRAR($)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any" class="form-control text-center" name="NameInventario" placeholder="INVENTARIOS($)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any" class="form-control text-center" name="NameTerreno" placeholder="TERRENOS($)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any" class="form-control text-center" name="NameEdificio" placeholder="EDIFICIO Y EQUIPO($)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any" class="form-control text-center" name="NameDepreciacion" placeholder="DEPRECIACION ACUMULADA($)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--FIN DE BALANCE-->

        <!--INICIO DE ESTADO DE RESULTADO-->

        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">ESTADO DE RESULTADOS</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" min="0" step="any" class="form-control text-center" name="nameIngresoVenta" placeholder="INGRESO DE VENTAS($)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any"class="form-control text-center" name="nameValorNegociable" placeholder="VALORES NEGOCIABLES($)">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any" class="form-control text-center" name="nameGastoVenta" placeholder="GASTOS DE VENTAS($)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any" class="form-control text-center" name="nameGastoAdmi" placeholder="GASTOS GENERALES Y ADMINISTRACION">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any" class="form-control text-center" name="nameGastoArrendamiento" placeholder="GASTOS DE ARRENDAMIENTO($)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any" class="form-control text-center" name="nameGastoDepreciacion" placeholder="GASTOS POR DEPRECIACION($)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  min="0" step="any" class="form-control text-center" name="nameGastoInteres" placeholder="GASTOS POR INTERESES">
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
    </section>
    <!--FIN DE ESTADO DE RESULTADOS-->

</form>
<?php
include_once '../plantilla/pie.php';
?>
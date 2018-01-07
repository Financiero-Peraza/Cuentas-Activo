<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
            <div class="email"></div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></i>
                <ul class="dropdown-menu pull-right">

                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header text-center">CUENTAS POR COBRAR</li>
            <li>
                <a href="../index.html">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons col-blue">collections</i>
                    <span>Registro de Clientes</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../cuenta_cobrar/registro_natura.php">Persona Natural</a>
                    </li>
                    <li>
                        <a href="../cuenta_cobrar/registro_juridico.php">Persona Juridica</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons col-blue-grey">description</i>
                    <span>Registro de Credito</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../cuenta_cobrar/credito_personal.php">Personal</a>
                    </li>
                  
                    <li>
                        <a href="../cuenta_cobrar/credito_agropecuario.php">Agropecuario</a>
                    </li>
                    <li>
                        <a href="../cuenta_cobrar/credito_solidario.php">Solidario</a>
                    </li>
                    <li>
                        <a href="../cuenta_cobrar/credito_juridico.php">Empresaria</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons col-deep-purple">event</i>
                    <span>Cartera de Clientes</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="#">Normal</a>
                    </li>
                    <li>
                        <a href="#">Mora</a>
                    </li>
                    <li>
                        <a href="#">Incobrable</a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="../cuenta_cobrar/abono.php">
                    <i class="material-icons col-deep-orange">book</i>
                    <span>Registro de Abono</span>
                </a>
            </li>
            <li class="header text-center">ACTIVO FIJO</li>
            <li>
                <a href="../activo_fijo/registro_activo.php">
                    <i class="material-icons col-red">contacts</i>
                    <span>Registro de Activo</span>
                </a>
            </li>
            <li>
                <a href="../activo_fijo/registro_tipo_activo.php">
                    <i class="material-icons col-amber">mail</i>
                    <span>Registro de Tipo de Activo</span>
                </a>
            </li>
            <li>
                <a href="../activo_fijo/registro_encargado.php">
                    <i class="material-icons col-amber">mail</i>
                    <span>Registro de Encargado</span>
                </a>
            </li>
            <li>
                <a href="../activo_fijo/registro_institucion.php">
                    <i class="material-icons col-amber">mail</i>
                    <span>Registro de Institucion</span>
                </a>
            </li>
            <li>
                <a href="../activo_fijo/registro_departamento.php">
                    <i class="material-icons col-amber">mail</i>
                    <span>Registro de Departamento</span>
                </a>
            </li>
            <li>
                <a href="../activo_fijo/registro_clasificacion.php">
                    <i class="material-icons col-amber">mail</i>
                    <span>Registro de Clasificacion de Activo</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
           © 2017 <a href="#">UES FMP.</a>
        </div>
        
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
   <script type="text/javascript">
    $(document).ready(function () {     


        $('.formNatural').submit(function () {
            //var codigo=$('#codigol').val();
            //alert(codigo);
            var formData = new FormData(document.getElementById('credito_personal'))
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function (resp) {
                if (resp == 1) {
                    swal({
                        title: "Exito",
                        text: "Autor Registrado",
                        type: "success"},
                            function () {
                                document.getElementById('credito_personal').reset();

                                recargarCombos();

                            }

                    );

                } else {
                    swal("Oops", resp, "error")

                }
            })
            return false;
        })


       

    });
    
</script>
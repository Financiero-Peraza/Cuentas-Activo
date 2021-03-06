<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


        <!-- Favicon-->
        <link rel="icon" href="../favicon.ico" type="image/x-icon">

        <link href="css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />

        <!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->



        <link href="css/sweetalert.css" rel="stylesheet">
        <script src="js/sweetalert.min.js"></script>

    </head>
    <body class="login-page">


        <?php
        if (isset($_REQUEST['nameEnviar'])) {
            include_once 'app/Conexion.php';
            include_once 'modelos/usuario.php';
            include_once 'repositorios/repositorio_usuario.php';


            $usuario = $_REQUEST['nameUsuario'];
            $pass = $_REQUEST['namePass'];
            Conexion::abrir_conexion();
            $respuesta = repositorio_usuario::verificar_pass(Conexion::obtener_conexion(), $pass, $usuario);
            session_start();    
            $_SESSION['user'] = $usuario;
            if ($respuesta == '1') {
                echo '<script>swal({
                    title: "Exito",
                     text: "Sesión iniciada correctamente",
                    type: "success",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="./home/home_usuario.php";
                    
                });</script>';
            } else if ($respuesta == '2') {

                echo '<script>swal({
                    title: "Exito",
                     text: "Sesión iniciada correctamente",
                    type: "success",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="./home/home_administrador.php";
                    
                });</script>';
            } else {
                echo '<script>swal({
                    title: "Exito",
                     text: "Datos incorrectos",
                    type: "error",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="index.php";
                    
                });</script>';
            }
        } else {
            ?>


            <div class="login-box">
                <div class="logo">
                    <a href="javascript:void(0);"><b>SISTEMA DE ACTIVO FIJO Y CUENTAS POR COBRAR</b></a>
                    <small>© 2018 UES FMP.</small>
                </div>
                <div class="card">
                    <div class="body">
                        <form id="FORMULARIO" method="post" name="" autocomplete="off">
                            <div class="msg">Inicia tu sesión para continuar</div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nameUsuario" placeholder="Usuario" required autofocus>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-line">
                                    <input type="password" class="form-control" name="namePass" placeholder="Cotraseña" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-8 p-t-5">

                                </div>
                                <div class="col-xs-4">
                                    <button class="btn btn-block bg-pink waves-effect" type="submit" name="nameEnviar" value="ok">Entrar</button>
                                </div>
                            </div>
                            <div class="row m-t-15 m-b--20">
                                <div class="col-xs-6">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <?php
        }
        ?>

        <!-- Jquery Core Js -->

        <!-- Bootstrap Core Js -->
        <script src="plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="plugins/node-waves/waves.js"></script>

        <!-- Custom Js -->
        <script src="js/admin.js"></script>

        <!-- Demo Js -->
        <script src="js/demo.js"></script>


    </body>

</html>   
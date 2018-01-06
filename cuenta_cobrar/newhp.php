<?php
include_once '../app/Conexion.php';
    include_once '../modelos/bien_hipotecario.php';
    include_once '../modelos/presamo.php';
    include_once '../modelos/expediente_natural.php';
    include_once '../repositorios/repositorio_prestamo.php';
    include_once '../repositorios/repositorio_expediente_natural.php';



    Conexion::abrir_conexion();
//echo '<script language="javascript">alert("juas");</script>'; 
    $ruta="../anexo/";
    $biografia =$ruta.$_POST["anexo"];
    $biografia2=$_POST['anexo'];
     echo '<script language="javascript">alert("'.$biografia2.'");</script>'; 
    
    $bien = new bien_hipotecario();    
    $bien->setDescripcion($_REQUEST["descr"]);
    $bien->setId_persona_natural($_REQUEST["codCliente_cpersonal"]);
    $bien->setOtros_datos("no");
    $bien->setUbicacion($_REQUEST["hubica"]);
    $n=$_FILES['anexo1']['tmp_name'];
    echo '<script language="javascript">alert("'.$biografia.' b '.$biografia2.'");</script>'; 
    if (move_uploaded_file($_FILES['anexo1']['tmp_name'], $biografia)) {
        $bien->setAnexo($biografia2);
       
    }else{
         $bien->setAnexo("");
       // echo basename($FILES['bio1']['name']);
}

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

?>
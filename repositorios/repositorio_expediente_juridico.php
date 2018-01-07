<?php
class repositorio_expediente_juridico {
 public static function insertar_expediente_juridico($conexion, $expediente) {
        $expediente_insertado = false;
        $expediente=new expediente_juridico();

        if (isset($conexion)) {
            try {

                $id_prestamo = $expediente->getId_prestamo();
                $id_persona = $expediente->getId_persona_juridica();



                $sql = 'INSERT INTO expediente_juridico (id_prestamo,persona_juridica)'
                        . ' values ( :id_prestamo, :persona_juridica)';
                ///estos son alias para que PDO pueda trabajar 
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_prestamo', $id_prestamo, PDO::PARAM_STR);
                $sentencia->bindParam(':persona_juridica', $id_persona, PDO::PARAM_STR);


                $expediente_insertado = $sentencia->execute();
//             $accion = 'Se registro al siguiente expediente de mantenimiento: ' . $nombre . ", con direccion ". $direccion . ", telefono ". $telefono.", y correo ".$correo ;
//              self::insertar_bitacora($conexion, $accion);
            } catch (PDOException $ex) {
                echo '<script>swal("No se puedo realizar el registro", "Revise los datos ingresados  ", "warning");</script>';
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $expediente_insertado;
    }
}
?>
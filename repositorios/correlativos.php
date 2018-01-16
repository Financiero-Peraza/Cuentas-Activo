<?php

class correlativos {
     public static function obtener_correlativo($conexion ,$tabla) {
        $total_usuario = NULL;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*)as total FROM $tabla ";
                ///estos son alias para que PDO pueda trabajar 
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                // echo 'esta buscanso<br>';
                $total_usuario = $resultado['total'] +1;
                $longitud = strlen($total_usuario);
                for ($i=$longitud; $i<4 ;$i++){
                    $total_usuario = '0' . $total_usuario;
                }
                
            } catch (PDOException $ex) {
                echo '<script>swal({
                    title: "Error!",
                    text: "por favor revise los datos e intente nuevamente",
                    type: "error",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="inicio_usuario.php";
                    
                });</script>';
                //echo '<script>swal("No se puedo realizar el registro", "Favor revisar los datos e intentar nuevamente", "warning");</script>';
                print 'ERROR: ' . $ex->getMessage();
            }
        }

        return $total_usuario;
    }
}

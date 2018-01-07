<?php


class repositorio_natural {
    public static function obtener_persona_natural($conexion, $codigo) {
        $juridica = new persona_natural;
        //echo 'esta en administradodr actual<br>';
        if (isset($conexion)) {
            //echo 'hay conexion<br>';
            try {
                $sql = "select * from persona_natural where (id_persona_natural = '$codigo')";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $juridica = new persona_natural();
                        $juridica->setId_persona_natural($fila['id_persona_natural']);
                        $juridica->setNombe($fila['nombre']);
                        $juridica->setApellido($fila['apellido']);
                        $juridica->setDireccion($fila['direccion']);
                         $juridica->setDui($fila['dui']);
                        $juridica->setNit($fila['nit']);
                        $juridica->setCorreo($fila['correo']);
                        $juridica->setTelefono($fila['telefono']);
                    }
                }
            } catch (PDOException $exc) {
                print('ERROR' . $exc->getMessage());
            }
        } else {
            //echo 'no hay conexion<br>';
        }
        return $juridica;
    }
    public static function lista_prestamo_previos_natural($conexion, $codigo) {
        
        if (isset($conexion)) {
            try {
                $sql = "SELECT
                persona_natural.nombre,
                persona_natural.apellido,
                prestamo.prestamo_original,
                prestamo.estado,
                prestamo.id_prestamo,
                usuario.apellido
                FROM
                usuario
                INNER JOIN prestamo ON prestamo.id_asesor = usuario.id_usuario
                INNER JOIN expediente_natural ON expediente_natural.id_prestamo = prestamo.id_prestamo
                INNER JOIN persona_natural ON expediente_natural.persona_natural = persona_natural.id_persona_natural
                WHERE persona_natural.id_persona_natural = ".$codigo."
                and prestamo.estado = 'PENDIENTE'";
                
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

            } catch (PDOException $exc) {
                print('ERROR' . $exc->getMessage());
            }
        }

        return $resultado;
    }
    
    
}

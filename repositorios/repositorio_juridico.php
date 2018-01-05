<?php

class repositorio_juridico {

    
    public static function insertar_persona_juridica($conexion, $juridica) {
        $resultado = FALSE;
        if (isset($conexion)) {
            try {
                //$juridica = new persona_juridica();
                $nombre = $juridica->getId_nombre();
                $numero = $juridica->getNumero();

                $sql = "INSERT INTO persona_juridica (nombre, numero) VALUES ( '" . $nombre . "', '" . $numero . "');";

                $sentencia = $conexion->prepare($sql);

                $resultado = $sentencia->execute();
                echo 'persona guardada';
            } catch (PDOException $ex) {
                echo 'persona no guardado';
                print 'ERROR: ' . $ex->getMessage();
            }
        } else {
            echo 'no hay conexion';
        }
    
        return $resultado;
        }
    
    public static function ultima_persona_insertada($conexion) {
        $lista= array();
        if (isset($conexion)) {
            try {
                $sql = "select * from persona_juridica order by id_persona_juridica desc limit 1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $persona = new persona_juridica();
                        $persona->setId_persona_juridica($fila['id_persona_juridica']);
                   $lista[] = $persona;
                    }
                }
            } catch (PDOException $exc) {
                print('ERROR' . $exc->getMessage());
            }
        }

        return $lista;
    }

}

?>
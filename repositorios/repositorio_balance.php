<?php

class repositorio_balance {

    public static function insertar_balance_general($conexion, $balance) {
        $resultado = FALSE;
        if (isset($conexion)) {
            try {
                $balance = new balance_general();
                
                $sql = "INSERT INTO `balance_general` "
                     . "(id_persona_juridica, periodo,  efectivo, valor_negociable, cuentas_por_cobrar, inventarios, terrenos, edificio_equipo, depreciacion_acumulada) "
                     . "VALUES ('".$balance->getId_persona()."', '".$balance->getPeriodo()."', '".$balance->getEfectivo()."', '".$balance->getValor_negociable()."', '".$balance->getCuenta_por_cobrar()."', '".$balance->getInventarios()."', '".$balance."', '".$balance->getTerrenos()."', '".$balance->getEdificio_equipo()."', '".$balance->getDepreciacion()."');";

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
}

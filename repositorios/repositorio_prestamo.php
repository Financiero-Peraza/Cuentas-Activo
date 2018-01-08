<?php

class repositorio_prestamo {

    public static function insertar_prestamo($conexion, $prestamo) {
        $prestamo_insertado = false;
        //$prestamo = new presamo();
        if (isset($conexion)) {
            try {

                $user = $prestamo->getId_asesor();
                $nombre = $prestamo->getPrestamo_original();
                $fecha = $prestamo->getFecha();
                $t = $prestamo->getTiempo();
                $tasa = $prestamo->getTasa();
                $tipo = $prestamo->getTipo_credito();


                $sql = 'INSERT INTO prestamo (  id_asesor, prestamo_original, estado, proximo_pago, saldo_actual, fecha, tiempo,tasa_interes, mora_acumulada, intereses_acumulados, tasa_moratoria, tipo_credito ) '
                        . " values ( :user, :nombre, 'PENDIENTE', DATE_ADD( CURDATE( ), INTERVAL 1 MONTH ), :nombre, :fecha, :t, :tasa, '0', '0', '0', :tipo)";
                ///estos son alias para que PDO pueda trabajar 
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':user', $user, PDO::PARAM_STR);
                $sentencia->bindParam(':plan', $plan, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $sentencia->bindParam(':t', $t, PDO::PARAM_STR);
                $sentencia->bindParam(':tasa', $tasa, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);
                // $sentencia->bindParam(':nit1', $nit1, PDO::PARAM_STR);


                $prestamo_insertado = $sentencia->execute();
//             $accion = 'Se registro al siguiente prestamo de mantenimiento: ' . $nombre . ", con direccion ". $direccion . ", telefono ". $telefono.", y correo ".$correo ;
//              self::insertar_bitacora($conexion, $accion);
            } catch (PDOException $ex) {
                echo '<script>swal("No se puedo realizar el registro", "Revise los datos ingresados  ", "warning");</script>';
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $prestamo_insertado;
    }

    public static function actualizar_prestamo($conexion, $prestamo, $id) {
        $prestamo_insertado = false;
        //$prestamo = new presamo();
        if (isset($conexion)) {
            try {

                $sa = $prestamo->getSaldo_actual();

                $sql = "SELECT
(DATE_ADD( prestamo.proximo_pago, INTERVAL 1 MONTH )) as pp
FROM
prestamo
WHERE
prestamo.id_prestamo = '$id'";
                $resultado = $conexion->query($sql);
                foreach ($resultado as $fila) {
                    $pp = $fila[0] ;
                }

                echo '<script language="javascript">alert("' . $pp . '");</script>';


                $sql = "UPDATE prestamo SET saldo_actual='$sa', proximo_pago='$pp' WHERE (`id_prestamo`=$id) LIMIT 1 ";
                ///estos son alias para que PDO pueda trabajar 
                $sentencia = $conexion->prepare($sql);
                $prestamo_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                echo '<script>swal("No se puedo realizar el registro", "Revise los datos ingresados  ", "warning");</script>';
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $prestamo_insertado;
    }

    public static function obtenerU_ultimo_prestamo($conexion) {
        $codigo = "";
        $resultado = "";
        if (isset($conexion)) {
            try {
                $sql = "SELECT id_prestamo from prestamo order by id_prestamo desc limit 1";
                $resultado = $conexion->query($sql);
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
            foreach ($resultado as $fila) {
                $codigo = $fila[0];
            }
        }
        return $codigo;
    }
    
    public static function insertar_prestamo_juridico($conexion, $prestamo) {
        $prestamo_insertado = false;
        
        if (isset($conexion)) {
            try {

                $asesor = '1';
                $monto_original = $prestamo->getPrestamo_original();
                $tiempo = $prestamo->getTiempo();
                $tasa_interes = $prestamo->getTasa();
                $mora = '';
                $estado = 'PENDIENTE';
                $interes_acumulado = '';
                $tasa_moratora = '';
                
                $sql = "INSERT INTO prestamo (id_asesor, prestamo_original, saldo_actual, mora_acumulada, intereses_acumulados, estado,   tiempo, tasa_interes, tasa_moratoria)"
                        . " VALUES(:id_asesor, :prestamo_original, :saldo_actual, :mora_acumulada, :intereses_acumulados, :estado,  :tiempo, :tasa_interes, :tasa_moratoria) ";
                ///estos son alias para que PDO pueda trabajar 
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_asesor', $asesor, PDO::PARAM_STR);
                $sentencia->bindParam(':prestamo_original', $monto_original, PDO::PARAM_STR);
                $sentencia->bindParam(':saldo_actual', $monto_original, PDO::PARAM_STR);
                $sentencia->bindParam(':mora_acumulada', $mora, PDO::PARAM_STR);
                $sentencia->bindParam(':intereses_acumulados', $interes_acumulado, PDO::PARAM_STR);
                $sentencia->bindParam(':estado', $estado, PDO::PARAM_STR);
                $sentencia->bindParam(':tiempo', $tiempo, PDO::PARAM_STR);
                $sentencia->bindParam(':tasa_interes', $tasa_interes, PDO::PARAM_STR);
                $sentencia->bindParam(':tasa_moratoria', $tasa_moratora, PDO::PARAM_STR);
                
                $prestamo_insertado = $sentencia->execute();

            } catch (PDOException $ex) {
                echo '<script>swal("No se puedo realizar el registro", "Revise los datos ingresados  ", "warning");</script>';
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $prestamo_insertado;
    }
   
}

?>
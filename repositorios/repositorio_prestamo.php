<?php

class repositorio_prestamo {

    public static function insertar_prestamo($conexion, $prestamo) {
        $prestamo_insertado = false;
       // $prestamo = new presamo();
        if (isset($conexion)) {
            try {

                $user = $prestamo->getId_asesor();
                $nombre = $prestamo->getPrestamo_original();
                $fecha = $prestamo->getFecha();
                $t = $prestamo->getTiempo();
                $tasa = $prestamo->getTasa();



                $sql = 'INSERT INTO prestamo (  id_asesor, prestamo_original, estado, proximo_pago, saldo_actual, fecha, tiempo,tasa_interes, mora_acumulada, intereses_acumulados, tasa_moratoria ) '
                        . " values ( :user, :nombre, 'PENDIENTE', DATE_ADD( CURDATE( ), INTERVAL 1 MONTH ), :nombre, :fecha, :t, :tasa, '0', '0', '0')";
                ///estos son alias para que PDO pueda trabajar 
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':user', $user, PDO::PARAM_STR);
                $sentencia->bindParam(':plan', $plan, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $sentencia->bindParam(':t', $t, PDO::PARAM_STR);
                 $sentencia->bindParam(':tasa', $tasa, PDO::PARAM_STR);
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
   
    public static function lista_prestamo_pendiente_juridica($conexion) {
        $lista = array();

        if (isset($conexion)) {
            try {
                $sql = "SELECT
                        usuario.nombre,
                        prestamo.tipo_credito,
                        persona_juridica.nombre,
                        prestamo.prestamo_original,
                        usuario.apellido,
                        persona_juridica.categoria,
                        prestamo.tiempo,
                        persona_juridica.id_persona_juridica,
                        prestamo.id_prestamo
                        FROM
                        prestamo
                        INNER JOIN usuario ON prestamo.id_asesor = usuario.id_usuario
                        INNER JOIN expediente_juridico ON expediente_juridico.id_prestamo = prestamo.id_prestamo
                        INNER JOIN persona_juridica ON expediente_juridico.id_persona_juridica = persona_juridica.id_persona_juridica
                        WHERE prestamo.estado = 'PENDIENTE'";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

//                if (count($resultado)) {
//                    foreach ($resultado as $fila) {
//                        $prestamo = new presamo();
//
//                        $prestamo->setId_prestamo($fila['id_prestamo']);
//                        $prestamo->setId_asesor($fila['id_asesor']);
//                        $prestamo->setPrestamo_original($fila['prestamo_original']);
//                        $prestamo->setSaldo_actual($fila['saldo_actual']);
//                        $prestamo->setMora_acumulada($fila['mora_acumulada']);
//                        $prestamo->setIntereses_acumulados($fila['intereses_acumulados']);
//                        $prestamo->setEstado($fila['estado']);
//                        $prestamo->setFecha($fila['fecha']);
//                        $prestamo->setTiempo($fila['tiempo']);
//                        $prestamo->setTasa_interes($fila['tasa_interes']);
//                        $prestamo->setTipo_credito($fila['tipo_credito']);
//                                               
//
//                        $lista[] = $prestamo;
//                    }
//                }
            } catch (PDOException $exc) {
                print('ERROR' . $exc->getMessage());
            }
        }

        return $resultado;
    }
}

?>
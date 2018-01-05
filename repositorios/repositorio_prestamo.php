<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of repositorio_prestamo
 *
 * @author Miranda
 */
class repositorio_prestamo {

    public static function insertar_prestamo($conexion, $prestamo) {
        $prestamo_insertado = false;
        //$prestamo = new presamo();
        if (isset($conexion)) {
            try {

                $user = $prestamo->getId_asesor();
                $plan = $prestamo->getId_plan();
                $nombre = $prestamo->getPrestamo_original();
                $pp = $prestamo->getFecha();
                $fecha = $prestamo->getFecha();
                $t = $prestamo->getTiempo();



                $sql = 'INSERT INTO prestamo (id_plan,  id_asesor, prestamo_original, estado, proximo_pago, saldo_actual, fecha, tiempo ) '
                        . " values (:plan, :user, :nombre, '1', :pp, :nombre, :fecha, :t)";
                ///estos son alias para que PDO pueda trabajar 
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':user', $user, PDO::PARAM_STR);
                $sentencia->bindParam(':plan', $plan, PDO::PARAM_STR);
                $sentencia->bindParam(':pp', $pp, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $sentencia->bindParam(':t', $t, PDO::PARAM_STR);
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
                    $pp = $fila[0] . " \n " . $observacion;
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

}

?>
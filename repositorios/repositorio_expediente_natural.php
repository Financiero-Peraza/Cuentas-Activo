<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of repositorio_expediente_natural
 *
 * @author Miranda
 */
class repositorio_expediente_natural {

    //**************** PERSONAS NATURALES *******************
    public static function insertar_persona_natural($conexion, $persona) {
        $persona_insertado = false;

        if (isset($conexion)) {
            try {

                $dui = $persona->getDui();
                $nit = $persona->getNit();
                $nombre = $persona->getNombe();
                $apellido = $persona->getApellido();
                $direccion = $persona->getDireccion();
                $telefono = $persona->getTelefono();
                //$correo = $persona->getCorreo();


                $sql = 'INSERT INTO persona_natural (nombre, apellido, direccion, dui, nit,  telefono)'
                        . ' values (:nombre,:apellido, :direccion, :dui, :nit, :telefono)';
                ///estos son alias para que PDO pueda trabajar 
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion', $direccion, PDO::PARAM_STR);
                $sentencia->bindParam(':dui', $dui, PDO::PARAM_STR);
                $sentencia->bindParam(':nit', $nit, PDO::PARAM_STR);
                $sentencia->bindParam(':telefono', $telefono, PDO::PARAM_STR);


                $persona_insertado = $sentencia->execute();
//             $accion = 'Se registro al siguiente persona de mantenimiento: ' . $nombre . ", con direccion ". $direccion . ", telefono ". $telefono.", y correo ".$correo ;
//              self::insertar_bitacora($conexion, $accion);
            } catch (PDOException $ex) {
                echo '<script>swal("No se puedo realizar el registro", "Revise los datos ingresados  ", "warning");</script>';
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $persona_insertado;
    }

    public static function obtener_persona_natural($conexion, $codigo) {
        $resultado = "";
        if (isset($conexion)) {
            try {
                $sql = "SELECT
persona_natural.id_persona_natural AS id,
(CONCAT(persona_natural.nombre,' ',persona_natural.apellido)) AS nombre,
persona_natural.direccion as direccion,
persona_natural.dui as dui,
persona_natural.nit as nit,
persona_natural.correo as correo,
persona_natural.categoria as categoria,
persona_natural.observaciones as obs,
persona_natural.telefono as tel,
persona_natural.monto as monto
FROM
persona_natural
WHERE
persona_natural.id_persona_natural = $codigo";
                $resultado = $conexion->query($sql);
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $resultado;
    }

    public static function obtener_persona_natural_abono($conexion, $codigo) {
        $resultado = ""; //echo '<script language="javascript">alert("cod '.$codigo.'");</script>'; 
        if (isset($conexion)) {
            try {
                $sql = "SELECT
persona_natural.id_persona_natural AS idper,
(CONCAT(persona_natural.nombre,' ',persona_natural.apellido)) AS nombre,
persona_natural.dui AS dui,
persona_natural.nit AS nit,
prestamo.id_prestamo AS idp,
prestamo.prestamo_original as monto,
prestamo.saldo_actual as sact,
prestamo.mora_acumulada as mora,
prestamo.intereses_acumulados as intacu,
plan_pago.tasa AS tasa,
(CONCAT(usuario.nombre,' ',usuario.apellido)) AS nombreuser,
usuario.id_usuario AS idu,
prestamo.tiempo as tiempo,
prestamo.proximo_pago as pp,
prestamo.fecha as fech
FROM
persona_natural
INNER JOIN expediente_natural ON expediente_natural.persona_natural = persona_natural.id_persona_natural
INNER JOIN prestamo ON expediente_natural.id_prestamo = prestamo.id_prestamo
INNER JOIN plan_pago ON prestamo.id_plan = plan_pago.id_plan
INNER JOIN usuario ON prestamo.id_asesor = usuario.id_usuario
WHERE
persona_natural.id_persona_natural = $codigo ";
                $resultado = $conexion->query($sql);
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $resultado;
    }

    public static function lista_persona_natural($conexion) {
        $resultado = "";
        if (isset($conexion)) {
            try {
                $sql = "SELECT
                persona_natural.id_persona_natural as id,
                (CONCAT(persona_natural.nombre,' ',persona_natural.apellido))  as nombre,
                persona_natural.apellido
                FROM
                persona_natural";
                $resultado = $conexion->query($sql);
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $resultado;
    }

    public static function lista_clientes($conexion) {
        $resultado = "";
        if (isset($conexion)) {
            try {
                $sql = "SELECT
                persona_natural.id_persona_natural as id,
                (CONCAT(persona_natural.nombre,' ',persona_natural.apellido))  as nombre,
                persona_natural.apellido
                FROM
                persona_natural";
                $resultado = $conexion->query($sql);
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $resultado;
    }

    //****************  EXPEDIENTE **************
    public static function insertar_expediente($conexion, $expediente) {
        $expediente_insertado = false;
        //$expediente=new expediente_natural();

        if (isset($conexion)) {
            try {

                $dui = $expediente->getId_prestamo();
                $nit = $expediente->getPersona_natural();



                $sql = 'INSERT INTO expediente_natural (id_prestamo,persona_natural)'
                        . ' values ( :dui, :nit)';
                ///estos son alias para que PDO pueda trabajar 
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':dui', $dui, PDO::PARAM_STR);
                $sentencia->bindParam(':nit', $nit, PDO::PARAM_STR);


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